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
	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\rc3');
	}

	public function update_data()
	{
		return array(
			array('custom', array(array($this, 'update_notifications_name'))),
		);
	}

	public function revert_data()
	{
		return array(
			array('custom', array(array($this, 'revert_notifications_name'))),
		);
	}

	public function update_notifications_name()
	{
		$sql = 'UPDATE ' . NOTIFICATION_TYPES_TABLE . "
			SET notification_type_name = 'phpbb.boardrules.notification.type.boardrules'
			WHERE notification_type_name = 'boardrules'";
		$this->db->sql_query($sql);

		$sql = 'UPDATE ' . USER_NOTIFICATIONS_TABLE . "
			SET item_type = 'phpbb.boardrules.notification.type.boardrules'
			WHERE item_type = 'boardrules'";
		$this->db->sql_query($sql);
	}

	public function revert_notifications_name()
	{
		$sql = 'UPDATE ' . NOTIFICATION_TYPES_TABLE . "
			SET notification_type_name = 'boardrules'
			WHERE notification_type_name = 'phpbb.boardrules.notification.type.boardrules'";
		$this->db->sql_query($sql);

		$sql = 'UPDATE ' . USER_NOTIFICATIONS_TABLE . "
			SET item_type = 'boardrules'
			WHERE item_type = 'phpbb.boardrules.notification.type.boardrules'";
		$this->db->sql_query($sql);
	}
}
