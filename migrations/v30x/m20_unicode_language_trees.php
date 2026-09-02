<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2026 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\migrations\v30x;

class m20_unicode_language_trees extends \phpbb\db\migration\migration
{
	/** @var int Maximum rules updated by one query */
	const UPDATE_BATCH_SIZE = 100;

	/**
	 * {@inheritdoc}
	 */
	public static function depends_on()
	{
		return array('\phpbb\boardrules\migrations\v30x\m19_list_style_options');
	}

	/**
	 * {@inheritdoc}
	 */
	public function update_schema()
	{
		return array(
			'change_columns' => array(
				$this->table_prefix . 'boardrules' => array(
					'rule_title' => array('VCHAR_UNI:200', ''),
					'rule_anchor' => array('VCHAR_UNI:255', ''),
				),
			),
		);
	}

	/**
	 * Keep the changed columns until the initial schema migration drops the table.
	 * Reverting them could fail when existing data no longer fits the old types.
	 *
	 * @return array Array of table schema changes
	 */
	public function revert_schema()
	{
		return array();
	}

	/**
	 * {@inheritdoc}
	 */
	public function update_data()
	{
		return array(
			array('custom', array(array($this, 'renumber_language_trees'))),
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function revert_data()
	{
		return array(
			array('config.remove', array('boardrules.table_lock.boardrules_table')),
		);
	}

	/**
	 * Give every language a contiguous nested-set coordinate space.
	 * Existing hierarchy and sibling order are preserved.
	 *
	 * @return void
	 */
	public function renumber_language_trees()
	{
		$table = $this->table_prefix . 'boardrules';
		$rules_by_language = array();

		$sql = 'SELECT rule_id, rule_language, rule_parent_id, rule_left_id
			FROM ' . $table . '
			ORDER BY rule_language, rule_left_id, rule_id';
		$result = $this->db->sql_query($sql);
		while ($row = $this->db->sql_fetchrow($result))
		{
			$rules_by_language[$row['rule_language']][(int) $row['rule_id']] = array(
				'parent_id' => (int) $row['rule_parent_id'],
				'left_id' => (int) $row['rule_left_id'],
			);
		}
		$this->db->sql_freeresult($result);

		foreach ($rules_by_language as $rules)
		{
			$children = array();
			$roots = array();
			foreach ($rules as $rule_id => $rule)
			{
				$parent_id = $rule['parent_id'];
				if (!$parent_id || $parent_id === $rule_id || !isset($rules[$parent_id]))
				{
					$roots[] = $rule_id;
				}
				else
				{
					$children[$parent_id][] = $rule_id;
				}
			}

			$position = 1;
			$visited = array();
			$bounds = array();
			$normalised_roots = array_fill_keys($roots, true);
			$walk = function ($rule_id) use (&$walk, &$position, &$visited, &$bounds, &$children)
			{
				if (isset($visited[$rule_id]))
				{
					return;
				}

				$visited[$rule_id] = true;
				$bounds[$rule_id]['left_id'] = $position++;
				foreach ($children[$rule_id] ?? array() as $child_id)
				{
					$walk($child_id);
				}
				$bounds[$rule_id]['right_id'] = $position++;
			};

			foreach ($roots as $root_id)
			{
				$walk($root_id);
			}

			// Recover malformed cycles as root-level branches instead of leaving
			// duplicate or zero bounds behind.
			foreach (array_keys($rules) as $rule_id)
			{
				if (!isset($visited[$rule_id]))
				{
					$normalised_roots[$rule_id] = true;
					$walk($rule_id);
				}
			}

			$this->apply_bounds($table, $bounds, $normalised_roots);
		}
	}

	/**
	 * Apply calculated nested-set bounds using portable, bounded updates.
	 *
	 * @param string $table
	 * @param array $bounds
	 * @param array $normalised_roots
	 * @return void
	 */
	protected function apply_bounds($table, array $bounds, array $normalised_roots)
	{
		foreach (array_chunk($bounds, self::UPDATE_BATCH_SIZE, true) as $batch)
		{
			$rule_ids = array();
			$left_cases = array();
			$right_cases = array();
			$normalised_root_ids = array();
			foreach ($batch as $rule_id => $rule_bounds)
			{
				$rule_id = (int) $rule_id;
				$rule_ids[] = $rule_id;
				$left_cases[] = 'WHEN ' . $rule_id . ' THEN ' . (int) $rule_bounds['left_id'];
				$right_cases[] = 'WHEN ' . $rule_id . ' THEN ' . (int) $rule_bounds['right_id'];
				if (isset($normalised_roots[$rule_id]))
				{
					$normalised_root_ids[] = $rule_id;
				}
			}

			$set = array(
				'rule_left_id = CASE rule_id ' . implode(' ', $left_cases) . ' ELSE rule_left_id END',
				'rule_right_id = CASE rule_id ' . implode(' ', $right_cases) . ' ELSE rule_right_id END',
				"rule_parents = ''",
			);
			if (!empty($normalised_root_ids))
			{
				$set[] = 'rule_parent_id = ' . $this->db->sql_case(
					$this->db->sql_in_set('rule_id', $normalised_root_ids),
					0,
					'rule_parent_id'
				);
			}

			$sql = 'UPDATE ' . $table . '
				SET ' . implode(', ', $set) . '
				WHERE ' . $this->db->sql_in_set('rule_id', $rule_ids);
			$this->db->sql_query($sql);
		}
	}
}
