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
* Migration stage 5: Initial permission
*/
class m5_initial_permission extends \phpbb\db\migration\migration
{
	/**
	* Assign migration file dependencies for this migration
	*
	* @return array Array of migration files
	* @static
	* @access public
	*/
	public static function depends_on()
	{
		return array('\phpbb\boardrules\migrations\v10x\m1_initial_schema');
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
			// Add permission
			array('permission.add', array('a_boardrules', true)),

			// Set permissions
			array('if', array(
				array('permission.role_exists', array('ROLE_ADMIN_FULL')),
				array('permission.permission_set', array('ROLE_ADMIN_FULL', 'a_boardrules')),
			)),
			array('if', array(
				array('permission.role_exists', array('ROLE_ADMIN_STANDARD')),
				array('permission.permission_set', array('ROLE_ADMIN_STANDARD', 'a_boardrules')),
			)),
		);
	}
}
