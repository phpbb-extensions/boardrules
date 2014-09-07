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
		return array('\phpbb\db\migration\data\v310\notifications_use_full_name');
	}

	public function update_data()
	{
		return array(
			array('custom', array(array($this, 'update_notifications_name'))),
		);
	}

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
