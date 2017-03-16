<?php
/**
 *
 * Board Rules extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2017 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\boardrules\migrations\v20x;

class m15_language_iso extends \phpbb\db\migration\container_aware_migration
{
	/**
	 * @inheritDoc
	 */
	static public function depends_on()
	{
		return array(
			'\phpbb\boardrules\migrations\v10x\m7_sample_rule_data',
			'\phpbb\boardrules\migrations\v20x\m14_reparse',
		);
	}

	/**
	 * @inheritDoc
	 */
	public function update_schema()
	{
		return array(
			'change_columns' => array(
				$this->table_prefix . 'boardrules' => array(
					'rule_language' => array('VCHAR:30', ''),
				),
			),
		);
	}

	/**
	 * @inheritDoc
	 */
	public function revert_schema()
	{
		return array(
			'change_columns' => array(
				$this->table_prefix . 'boardrules' => array(
					'rule_language' => array('UINT', ''),
				),
			),
		);
	}

	/**
	 * @inheritDoc
	 */
	public function update_data()
	{
		return array(
			array('custom', array(array($this, 'change_rule_language'))),
		);
	}

	/**
	 * Change rule_language values from lang_id to lang_iso
	 */
	public function change_rule_language()
	{
		// Get installed language identifiers and iso codes
		$sql = 'SELECT lang_id, lang_iso
			FROM ' . LANG_TABLE;
		$result = $this->db->sql_query($sql);
		$rows = $this->db->sql_fetchrowset($result);
		$this->db->sql_freeresult($result);

		// Update the languages in the boardrules table, from id to iso
		if (!empty($rows))
		{
			$this->db->sql_transaction('begin');

			foreach ($rows as $row)
			{
				$sql = 'UPDATE ' . $this->table_prefix . "boardrules
					SET rule_language = '" . $this->db->sql_escape($row['lang_iso']) . "'
					WHERE rule_language = " . (int) $row['lang_id'];
				$this->db->sql_query($sql);
			}

			$this->db->sql_transaction('commit');
		}
	}
}
