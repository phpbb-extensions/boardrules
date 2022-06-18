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
* Migration stage 11: Update the notification type to the new service name
*/
class m11_notification_type_update extends \phpbb\db\migration\migration
{
	/**
	* Check if an updated boardrules notification type already exists
	*
	* @return bool True if notification type exists, false otherwise
	* @access public
	*/
	public function effectively_installed()
	{
		$sql = 'SELECT * FROM ' . $this->table_prefix . "notification_types
			WHERE notification_type_name = 'phpbb.boardrules.notification.type.boardrules'";
		$result = $this->db->sql_query_limit($sql, 1);
		$row = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		return $row !== false;
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
		return array(
			'\phpbb\boardrules\migrations\v10x\m10_notification_counter',
			'\phpbb\db\migration\data\v310\notifications_use_full_name',
		);
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
			array('custom', array(array($this, 'update_notifications_name'))),
		);
	}

	/**
	* Update a boardrules notification type name and state
	*
	* @return void
	* @access public
	*/
	public function update_notifications_name()
	{
		// New notification_type_name and re-enable
		$sql_ary = array(
			'notification_type_name'	=> 'phpbb.boardrules.notification.type.boardrules',
			'notification_type_enabled'	=> 1,
		);

		$sql = 'UPDATE ' . NOTIFICATION_TYPES_TABLE . '
			SET ' . $this->db->sql_build_array('UPDATE', $sql_ary) . "
			WHERE notification_type_name = 'boardrules'";
		$this->db->sql_query($sql);

		$sql = 'UPDATE ' . USER_NOTIFICATIONS_TABLE . "
			SET item_type = '" . $this->db->sql_escape($sql_ary['notification_type_name']) . "'
			WHERE item_type = 'boardrules'";
		$this->db->sql_query($sql);
	}
}
