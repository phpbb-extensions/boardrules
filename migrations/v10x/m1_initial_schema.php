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
* Migration stage 1: Initial schema
*/
class m1_initial_schema extends \phpbb\db\migration\migration
{
	/**
	* Assign migration file dependencies for this migration
	*
	* @return array Array of migration files
	* @static
	* @access public
	*/
	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v31x\v312');
	}

	/**
	* Add the boardrules table schema to the database:
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
			),
		);
	}

	/**
	* Drop the boardrules table schema from the database
	*
	* @return array Array of table schema
	* @access public
	*/
	public function revert_schema()
	{
		return array(
			'drop_tables'	=> array(
				$this->table_prefix . 'boardrules',
			),
		);
	}
}
