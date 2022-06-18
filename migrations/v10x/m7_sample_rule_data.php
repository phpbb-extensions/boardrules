<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\migrations\v10x;

use phpbb\db\migration\container_aware_migration;

/**
* Migration stage 7: Install sample rule data
*/
class m7_sample_rule_data extends container_aware_migration
{
	/**
	* Check if the boardrules table contains any data
	*
	* @return bool True if data exists, false otherwise
	* @access public
	*/
	public function effectively_installed()
	{
		$sql = 'SELECT * FROM ' . $this->table_prefix . 'boardrules';
		$result = $this->db->sql_query_limit($sql, 1);
		$row = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		return $row !== false;
	}

	/**
	* Assign migration file dependencies for this migration
	*
	* @return array Array of migration files
	* @static
	* @access public
	*/
	public static function depends_on()
	{
		return array('\phpbb\boardrules\migrations\v10x\m3_add_schema');
	}

	/**
	* Add or update data in the database
	*
	* @return array Array of table data
	* @access public
	*/
	public function update_data()
	{
		return array(
			array('custom', array(array($this, 'insert_sample_rule_data'))),
		);
	}

	/**
	* Custom function to install sample rule data to the boardrules table in the database
	*
	* @return void
	* @access public
	*/
	public function insert_sample_rule_data()
	{
		/** @var \phpbb\user $user */
		$user = $this->container->get('user');

		/** @var \phpbb\language\language $lang */
		$lang = $this->container->get('language');

		// Get the lang_id of the admin installing board rules
		$lang_id = $user->get_iso_lang_id();

		// Load the installation lang file
		$lang->add_lang('boardrules_install', 'phpbb/boardrules');

		// Define sample rule data
		$sample_rule_data = array(
			array(
				'rule_title'     => $lang->lang('BOARDRULES_SAMPLE_CATEGORY_TITLE'),
				'rule_message'   => $lang->lang('BOARDRULES_SAMPLE_CATEGORY_MESSAGE'),
				'rule_anchor'    => $lang->lang('BOARDRULES_SAMPLE_CATEGORY_ANCHOR'),
				'rule_left_id'   => 1,
				'rule_right_id'  => 4,
				'rule_parent_id' => 0,
				'rule_language'  => $lang_id,
				'rule_parents'   => '',
			),
			array(
				'rule_title'     => $lang->lang('BOARDRULES_SAMPLE_RULE_TITLE'),
				'rule_message'   => $lang->lang('BOARDRULES_SAMPLE_RULE_MESSAGE'),
				'rule_anchor'    => $lang->lang('BOARDRULES_SAMPLE_RULE_ANCHOR'),
				'rule_left_id'   => 2,
				'rule_right_id'  => 3,
				'rule_parent_id' => 1,
				'rule_language'  => $lang_id,
				'rule_parents'   => '',
			),
		);

		// Insert sample rule data
		$this->db->sql_multi_insert($this->table_prefix . 'boardrules', $sample_rule_data);
	}
}
