<?php
/**
*
* @package Board Rules Extension
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\migrations;

/**
* Migration data
*/
class v_0_0_1_dev extends \phpbb\db\migration\migration
{
	/**
	* Check if this migration data has already been installed
	*
	* @return bool Does table 'boardrules' exist?
	* @access public
	*/
	public function effectively_installed()
	{
		return $this->db_tools->sql_table_exists($this->table_prefix . 'boardrules');
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
		return array('\phpbb\db\migration\data\v310\dev');
	}

	/**
	* Add the rules table schema to the database:
	*    boardrules:
	*        rule_id Rule identifier
	*        rule_language Language selection
	*        rule_left_id The left id for the tree
	*        rule_right_id The right id for the tree
	*        rule_parent_id Category to display rules from
	*        rule_anchor Anchor text
	*        rule_title Rule title
	*        rule_message Rule message
	*        rule_message_bbcode_uid Rule bbcode uid
	*        rule_message_bbcode_bitfield Rule bbcode bitfield
	*        rule_message_bbcode_options Rule bbcode options
	*
	*    boardrules_categories:
	*        category_id Category identifier
	*        category_title Category title
	*
	* @return array Array of table schema
	* @access public
	*/
	public function update_schema()
	{
		return array(
			'add_tables'	=> array(
				$this->table_prefix . 'boardrules'	=> array(
					'COLUMNS'	=> array(
						'rule_id'						=> array('UINT', null, 'auto_increment'),
						'rule_language'					=> array('UINT', 0),
						'rule_left_id'					=> array('UINT', 0),
						'rule_right_id'					=> array('UINT', 0),
						'rule_parent_id'				=> array('UINT', 0),
						'rule_anchor'					=> array('VCHAR:255', ''),
						'rule_title'					=> array('VCHAR:200', ''),
						'rule_message'					=> array('TEXT_UNI', ''),
						'rule_message_bbcode_uid'		=> array('VCHAR:8', ''),
						'rule_message_bbcode_bitfield'	=> array('VCHAR:255', ''),
						'rule_message_bbcode_options'	=> array('UINT:11', 7),
					),
					'PRIMARY_KEY'	=> 'rule_id',
				),
				$this->table_prefix . 'boardrules_categories'	=> array(
					'COLUMNS'	=> array(
						'category_id'					=> array('UINT', null, 'auto_increment'),
						'category_title'				=> array('VCHAR:200', ''),
					),
					'PRIMARY_KEY'	=> 'category_id',
				),
			),
		);
	}

	/**
	* Drop the rules table from the database
	*
	* @return array Array of table schema
	* @access public
	*/
	public function revert_schema()
	{
		return array(
			'drop_tables'	=> array(
				$this->table_prefix . 'boardrules',
				$this->table_prefix . 'boardrules_categories',
			),
		);
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
			array('config.add', array('boardrules_version', '0.0.1-dev')),
		);
	}
}
