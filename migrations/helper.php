<?php
/**
 *
 * Board Rules extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2017 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\boardrules\migrations;

/**
 * Migration helper
 *
 * This class contains methods that may be shared among
 * board rules' migration classes.
 *
 * @package phpbb\boardrules\migrations
 */
class helper
{
	/**
	 * @var \phpbb\db\driver\driver_interface
	 */
	protected $db;

	/**
	 * @var string The table prefix
	 */
	protected $table_prefix;

	/**
	 * Constructor
	 *
	 * @param \phpbb\db\driver\driver_interface $db
	 * @param string                            $table_prefix
	 */
	public function __construct(\phpbb\db\driver\driver_interface $db, $table_prefix)
	{
		$this->db = $db;
		$this->table_prefix = $table_prefix;
	}

	/**
	 * Change rule_language values from lang_id to lang_iso
	 *
	 * @param string $new_column Name of the column to be updated
	 * @param string $old_column Name of the column with old data
	 */
	public function change_rule_language($new_column, $old_column)
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
					SET $new_column = '" . $this->db->sql_escape($row['lang_iso']) . "'
					WHERE $old_column = '" . $this->db->sql_escape($row['lang_id']) . "'";
				$this->db->sql_query($sql);
			}

			$this->db->sql_transaction('commit');
		}
	}
}
