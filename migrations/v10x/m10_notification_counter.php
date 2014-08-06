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
* Migration stage 10: Add a notification counter to the config table
*/
class m10_notification_counter extends \phpbb\db\migration\migration
{
	/**
	* Check if this migration is effectively installed
	*
	* @return bool True if config name does not exist, false otherwise
	* @static
	* @access public
	*/
	public function effectively_installed()
	{
		return isset($this->config['boardrules_notification']);
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
			array('config.add', array('boardrules_notification', 0)),
		);
	}
}
