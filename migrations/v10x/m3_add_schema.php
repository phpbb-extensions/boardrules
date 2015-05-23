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
* Migration stage 3: Additional schema
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
		return array('\phpbb\boardrules\migrations\v10x\m1_initial_schema');
	}

	/**
	* Add table columns schema to the database:
	*    boardrules:
	*        rule_parents Basic rule data is serialised and cached here
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
