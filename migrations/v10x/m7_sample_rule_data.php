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

/**
* Migration stage 7: Install sample rule data
*/
class m7_sample_rule_data extends \phpbb\db\migration\migration
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

		return $row != false;
	}

	/**
	* Assign migration file dependencies for this migration
	*
	* @return array Array of migration files
	* @static
	* @access public
	*/
	static public function depends_on()
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
	* @return null
	* @access public
	*/
	public function insert_sample_rule_data()
	{
		global $user;

		// Get the lang_id of the admin installing boar rules
		$lang_id = $user->get_iso_lang_id();

		// Load the installation lang file
		$user->add_lang_ext('phpbb/boardrules', 'boardrules_install');

		// Define sample rule data
		$sample_rule_data = array(
			array(
				'rule_title' => $user->lang('BOARDRULES_SAMPLE_CATEGORY_TITLE'),
				'rule_message' => $user->lang('BOARDRULES_SAMPLE_CATEGORY_MESSAGE'),
				'rule_anchor' => 'example-category',
				'rule_id' => 1,
				'rule_left_id' => 1,
				'rule_right_id' => 4,
				'rule_parent_id' => 0,
				'rule_language' => $lang_id,
				'rule_parents' => '',
			),
			array(
				'rule_title' => $user->lang('BOARDRULES_SAMPLE_RULE_TITLE'),
				'rule_message' => $user->lang('BOARDRULES_SAMPLE_RULE_MESSAGE'),
				'rule_anchor' => 'example-rule',
				'rule_id' => 2,
				'rule_left_id' => 2,
				'rule_right_id' => 3,
				'rule_parent_id' => 1,
				'rule_language' => $lang_id,
				'rule_parents' => '',
			),
		);

		// Insert sample rule data
		$this->db->sql_multi_insert($this->table_prefix . 'boardrules', $sample_rule_data);
	}
}
