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
	 * {@inheritdoc}
	 */
	public function revert_schema()
	{
		return array(
			'change_columns' => array(
				$this->table_prefix . 'boardrules' => array(
					'rule_title' => array('VCHAR:200', ''),
					'rule_anchor' => array('VCHAR:255', ''),
				),
			),
		);
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

			foreach ($bounds as $rule_id => $rule_bounds)
			{
				$sql_data = array(
					'rule_left_id' => $rule_bounds['left_id'],
					'rule_right_id' => $rule_bounds['right_id'],
					'rule_parents' => '',
				);
				if (isset($normalised_roots[$rule_id]))
				{
					$sql_data['rule_parent_id'] = 0;
				}

				$sql = 'UPDATE ' . $table . '
					SET ' . $this->db->sql_build_array('UPDATE', $sql_data) . '
					WHERE rule_id = ' . (int) $rule_id;
				$this->db->sql_query($sql);
			}
		}
	}
}
