<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2026 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\operators;

class ruleset implements ruleset_interface
{
	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\lock\db */
	protected $lock;

	/** @var string */
	protected $boardrules_table;

	/** @var string */
	protected $rulesets_table;

	/**
	 * @param \phpbb\db\driver\driver_interface $db
	 * @param \phpbb\lock\db $lock
	 * @param string $boardrules_table
	 * @param string $rulesets_table
	 */
	public function __construct(\phpbb\db\driver\driver_interface $db, \phpbb\lock\db $lock, $boardrules_table, $rulesets_table)
	{
		$this->db = $db;
		$this->lock = $lock;
		$this->boardrules_table = $boardrules_table;
		$this->rulesets_table = $rulesets_table;
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_languages()
	{
		$languages = array();

		$sql = 'SELECT lang_iso, lang_local_name, lang_english_name
			FROM ' . LANG_TABLE . '
			ORDER BY lang_english_name';
		$result = $this->db->sql_query($sql);
		while ($row = $this->db->sql_fetchrow($result))
		{
			$row['rule_count'] = 0;
			$row['published'] = true;
			$languages[$row['lang_iso']] = $row;
		}
		$this->db->sql_freeresult($result);

		$sql = 'SELECT rule_language, COUNT(rule_id) AS rule_count
			FROM ' . $this->boardrules_table . '
			GROUP BY rule_language';
		$result = $this->db->sql_query($sql);
		while ($row = $this->db->sql_fetchrow($result))
		{
			if (isset($languages[$row['rule_language']]))
			{
				$languages[$row['rule_language']]['rule_count'] = (int) $row['rule_count'];
			}
		}
		$this->db->sql_freeresult($result);

		$sql = 'SELECT language_iso, rules_published
			FROM ' . $this->rulesets_table;
		$result = $this->db->sql_query($sql);
		while ($row = $this->db->sql_fetchrow($result))
		{
			if (isset($languages[$row['language_iso']]))
			{
				$languages[$row['language_iso']]['published'] = (bool) $row['rules_published'];
			}
		}
		$this->db->sql_freeresult($result);

		return array_values($languages);
	}

	/**
	 * {@inheritdoc}
	 */
	public function copy($source_language, $target_language)
	{
		$source_language = (string) $source_language;
		$target_language = (string) $target_language;

		if ($source_language === $target_language || !$this->language_exists($source_language) || !$this->language_exists($target_language))
		{
			throw new \InvalidArgumentException('ACP_BOARDRULES_COPY_INVALID_LANGUAGE');
		}

		if (!$this->lock->acquire())
		{
			throw new \RuntimeException('RULES_NESTEDSET_LOCK_FAILED_ACQUIRE');
		}

		$transaction_started = false;
		try
		{
			$this->db->sql_transaction('begin');
			$transaction_started = true;

			$source_rules = $this->get_rules_data($source_language);
			if (empty($source_rules))
			{
				throw new \InvalidArgumentException('ACP_BOARDRULES_COPY_SOURCE_EMPTY');
			}

			$id_map = array();
			// Board Rules uses one nested-set coordinate space for all languages.
			// Append copied rules after the table's final bound to keep IDs unique.
			$right_id_offset = $this->get_max_right_id();
			$used_anchors = $this->get_anchors($target_language);
			$reserved_anchors = array();
			foreach ($source_rules as $source_rule)
			{
				if ($source_rule['rule_anchor'] !== '')
				{
					$reserved_anchors[utf8_strtolower($source_rule['rule_anchor'])] = true;
				}
			}
			$renamed_anchors = 0;

			foreach ($source_rules as $row)
			{
				$source_id = (int) $row['rule_id'];
				$source_parent_id = (int) $row['rule_parent_id'];

				unset($row['rule_id']);
				$row['rule_language'] = $target_language;
				$row['rule_parent_id'] = $source_parent_id ? $id_map[$source_parent_id] : 0;
				$row['rule_left_id'] = (int) $row['rule_left_id'] + $right_id_offset;
				$row['rule_right_id'] = (int) $row['rule_right_id'] + $right_id_offset;
				$row['rule_parents'] = '';

				$unique_anchor = $this->make_unique_anchor($row['rule_anchor'], $used_anchors, $reserved_anchors);
				if ($unique_anchor !== $row['rule_anchor'])
				{
					$renamed_anchors++;
					$row['rule_anchor'] = $unique_anchor;
				}

				$sql = 'INSERT INTO ' . $this->boardrules_table . ' ' . $this->db->sql_build_array('INSERT', $row);
				$this->db->sql_query($sql);
				$id_map[$source_id] = (int) $this->db->sql_nextid();
			}

			$this->save_published_state($target_language, false);
			$this->db->sql_transaction('commit');
			$transaction_started = false;
		}
		catch (\Exception $e)
		{
			if ($transaction_started)
			{
				$this->db->sql_transaction('rollback');
			}
			throw $e;
		}
		finally
		{
			$this->lock->release();
		}

		return array(
			'rule_count' => count($source_rules),
			'renamed_anchors' => $renamed_anchors,
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function is_published($language)
	{
		$sql = 'SELECT rules_published
			FROM ' . $this->rulesets_table . "
			WHERE language_iso = '" . $this->db->sql_escape($language) . "'";
		$result = $this->db->sql_query_limit($sql, 1);
		$published = $this->db->sql_fetchfield('rules_published');
		$this->db->sql_freeresult($result);

		// Rules were always published before draft status was added, so rules
		// without a saved status must still be treated as published.
		return $published === false ? true : (bool) $published;
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_intro_text($language)
	{
		$sql = 'SELECT rules_intro_text
			FROM ' . $this->rulesets_table . "
			WHERE language_iso = '" . $this->db->sql_escape($language) . "'";
		$result = $this->db->sql_query_limit($sql, 1);
		$intro_text = $this->db->sql_fetchfield('rules_intro_text');
		$this->db->sql_freeresult($result);

		return $intro_text === false ? '' : utf8_decode_ncr((string) $intro_text);
	}

	/**
	 * {@inheritdoc}
	 */
	public function set_intro_text($language, $intro_text)
	{
		if (!$this->language_exists($language))
		{
			throw new \InvalidArgumentException('ACP_BOARDRULES_INVALID_LANGUAGE');
		}

		$this->save_ruleset_value($language, 'rules_intro_text', utf8_encode_ncr((string) $intro_text));
	}

	/**
	 * {@inheritdoc}
	 */
	public function set_published($language, $published)
	{
		if (!$this->language_exists($language))
		{
			throw new \InvalidArgumentException('ACP_BOARDRULES_INVALID_LANGUAGE');
		}

		if ($this->get_rule_count($language) === 0)
		{
			throw new \InvalidArgumentException('ACP_BOARDRULES_STATUS_CHANGE_EMPTY');
		}

		$this->save_published_state($language, (bool) $published);
	}

	/**
	 * @param string $language
	 * @return bool
	 */
	protected function language_exists($language)
	{
		$sql = 'SELECT lang_id
			FROM ' . LANG_TABLE . "
			WHERE lang_iso = '" . $this->db->sql_escape($language) . "'";
		$result = $this->db->sql_query_limit($sql, 1);
		$exists = (bool) $this->db->sql_fetchfield('lang_id');
		$this->db->sql_freeresult($result);

		return $exists;
	}

	/**
	 * @param string $language
	 * @return int
	 */
	protected function get_rule_count($language)
	{
		$sql = 'SELECT COUNT(rule_id) AS rule_count
			FROM ' . $this->boardrules_table . "
			WHERE rule_language = '" . $this->db->sql_escape($language) . "'";
		$result = $this->db->sql_query($sql);
		$count = (int) $this->db->sql_fetchfield('rule_count');
		$this->db->sql_freeresult($result);

		return $count;
	}

	/**
	 * @return int
	 */
	protected function get_max_right_id()
	{
		$sql = 'SELECT MAX(rule_right_id) AS max_right_id
			FROM ' . $this->boardrules_table;
		$result = $this->db->sql_query($sql);
		$max_right_id = (int) $this->db->sql_fetchfield('max_right_id');
		$this->db->sql_freeresult($result);

		return $max_right_id;
	}

	/**
	 * @param string $language
	 * @return array
	 */
	protected function get_anchors($language)
	{
		$anchors = array();
		$sql = 'SELECT rule_anchor
			FROM ' . $this->boardrules_table . "
			WHERE rule_language = '" . $this->db->sql_escape($language) . "'
				AND rule_anchor <> ''";
		$result = $this->db->sql_query($sql);
		while ($row = $this->db->sql_fetchrow($result))
		{
			$anchors[utf8_strtolower($row['rule_anchor'])] = true;
		}
		$this->db->sql_freeresult($result);

		return $anchors;
	}

	/**
	 * Make an anchor unique within the target language.
	 *
	 * @param string $anchor
	 * @param array $used_anchors
	 * @param array $reserved_anchors
	 * @return string
	 */
	protected function make_unique_anchor($anchor, array &$used_anchors, array $reserved_anchors)
	{
		if ($anchor === '')
		{
			return '';
		}

		$candidate = $anchor;
		$suffix_number = 2;
		while (isset($used_anchors[utf8_strtolower($candidate)]) || ($candidate !== $anchor && isset($reserved_anchors[utf8_strtolower($candidate)])))
		{
			$suffix = '-' . $suffix_number++;
			$candidate = utf8_substr($anchor, 0, 255 - utf8_strlen($suffix)) . $suffix;
		}

		$used_anchors[utf8_strtolower($candidate)] = true;

		return $candidate;
	}

	/**
	 * @param string $language
	 * @return array
	 */
	protected function get_rules_data($language)
	{
		$rules = array();
		$sql = 'SELECT *
			FROM ' . $this->boardrules_table . "
			WHERE rule_language = '" . $this->db->sql_escape($language) . "'
			ORDER BY rule_left_id ASC";
		$result = $this->db->sql_query($sql);
		while ($row = $this->db->sql_fetchrow($result))
		{
			$rules[] = $row;
		}
		$this->db->sql_freeresult($result);

		return $rules;
	}

	/**
	 * @param string $language
	 * @param bool $published
	 * @return void
	 */
	protected function save_published_state($language, $published)
	{
		$this->save_ruleset_value($language, 'rules_published', (int) $published);
	}

	/**
	 * Save one language-level ruleset value without changing the others.
	 *
	 * @param string $language
	 * @param string $column
	 * @param mixed $value
	 * @return void
	 */
	protected function save_ruleset_value($language, $column, $value)
	{
		$sql = 'SELECT language_iso
			FROM ' . $this->rulesets_table . "
			WHERE language_iso = '" . $this->db->sql_escape($language) . "'";
		$result = $this->db->sql_query_limit($sql, 1);
		$exists = (bool) $this->db->sql_fetchfield('language_iso');
		$this->db->sql_freeresult($result);

		if ($exists)
		{
			$sql = 'UPDATE ' . $this->rulesets_table . '
				SET ' . $this->db->sql_build_array('UPDATE', array($column => $value)) . "
				WHERE language_iso = '" . $this->db->sql_escape($language) . "'";
		}
		else
		{
			$sql_data = array(
				'language_iso' => $language,
				'rules_published' => 1,
				'rules_intro_text' => '',
			);
			$sql_data[$column] = $value;
			$sql = 'INSERT INTO ' . $this->rulesets_table . ' ' . $this->db->sql_build_array('INSERT', $sql_data);
		}

		$this->db->sql_query($sql);
	}
}
