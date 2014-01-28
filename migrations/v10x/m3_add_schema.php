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
class m3_add_schema extends \phpbb\db\migration\migration
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
		return array('\phpbb\boardrules\migrations\v10x\m3_add_schema');
	}

	/**
	* Add table columns schema to the database:
	*    boardrules:
	*        rule_parents Basic rule data is serialzed and cached here
	*
	* @return array Array of table columns schema
	* @access public
	*/
	public function update_schema()
	{
		return array(
			'add_columns'		=> array(
				$this->table_prefix . 'boardrules'		=> array(
						'rule_parents'					=> array('MTEXT_UNI', ''),
				),
			),
		);
	}

	/**
	* Drop table columns schema from the database
	*
	* @return array Array of table columns schema
	* @access public
	*/
	public function revert_schema()
	{
		return array(
			'drop_columns'		=> array(
				$this->table_prefix . 'boardrules'		=> array(
					'rule_parents',
				),
			),
		);
	}
}
