<?php
/**
*
* @package Board Rules Extension
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\migrations\v10x;

/**
* Migration stage 1: Initial schema
*/
class m1_initial_schema extends \phpbb\db\migration\migration
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
