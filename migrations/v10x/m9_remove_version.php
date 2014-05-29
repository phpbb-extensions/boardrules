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
* Migration stage 9: Remove version from database storage
*/
class m9_update_version extends \phpbb\db\migration\migration
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
		return !isset($this->config['boardrules_version']);
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
		return array('\phpbb\boardrules\migrations\v10x\m8_header_link_option');
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
			array('config.remove', array('boardrules_version')),
		);
	}
}
