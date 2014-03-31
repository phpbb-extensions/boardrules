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
* Migration stage 5: Initial module
*/
class m5_initial_module extends \phpbb\db\migration\migration
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
		return array('\phpbb\boardrules\migrations\v10x\m5_initial_permission');
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
			array('module.add', array('acp', 'ACP_CAT_DOT_MODS', 'ACP_BOARDRULES')),
			array('module.add', array('acp', 'ACP_BOARDRULES', array(
					'module_basename'	=> '\phpbb\boardrules\acp\boardrules_module',
					'module_langname'	=> 'ACP_BOARDRULES_SETTINGS',
					'module_mode'		=> 'settings',
					'module_auth'		=> 'ext_phpbb/boardrules && acl_a_boardrules',
			))),
			array('module.add', array('acp', 'ACP_BOARDRULES', array(
					'module_basename'	=> '\phpbb\boardrules\acp\boardrules_module',
					'module_langname'	=> 'ACP_BOARDRULES_MANAGE',
					'module_mode'		=> 'manage',
					'module_auth'		=> 'ext_phpbb/boardrules && acl_a_boardrules',
			))),
		);
	}
}
