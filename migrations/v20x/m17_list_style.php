<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2021 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\migrations\v20x;

/**
* Migration stage 17: List style config data
*/
class m17_list_style extends \phpbb\db\migration\migration
{
	/**
	 * Check if this migration needs to be run
	 *
	 * @return bool True if expected config exists, false otherwise
	 * @access public
	 */
	public function effectively_installed()
	{
		return $this->config->offsetExists('boardrules_list_style');
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
			array('config.add', array('boardrules_list_style', '')),
		);
	}
}
