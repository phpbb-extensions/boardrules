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
* Migration stage 2: Initial data
*/
class m2_initial_data extends \phpbb\db\migration\migration
{
	/**
	* Check if this migration data has already been installed
	*
	* @return bool Is boardrules_version >= 1.0.0-dev ?
	* @access public
	*/
	public function effectively_installed()
	{
		return version_compare($this->config['boardrules_version'], '1.0.0-dev', '>=');
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
			array('config.add', array('boardrules_version', '1.0.0-dev')),
		);
	}
}
