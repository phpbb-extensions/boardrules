<?php
/**
*
* @package Board Rules Extension
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\notification;

/**
* Board Rules notifications class
* This class handles notifications for Board Rules
*
* @package notifications
*/
class boardrules extends \phpbb\notification\type\base
{
	/**
	* Get notification type name
	*
	* @return string
	*/
	public function get_type()
	{
		return 'boardrules';
	}

	/**
	* Is this type available to the current user (defines whether or not it will be shown in the UCP Edit notification options)
	*
	* @return bool True/False whether or not this is available to the user
	*/
	public function is_available()
	{
		return false;
	}

	/**
	* Get the id of the rule
	*
	* @param array $data The data for the updated rules
	*/
	public static function get_item_id($data)
	{
		return $data['rule_id'];
	}

	/**
	* Get the id of the parent
	*
	* @param array $data The data for the updated rules
	*/
	public static function get_item_parent_id($data)
	{
		// No parent
		return 0;
	}

	/**
	* Find the users who will receive notifications
	*
	* @param array $data The data for the updated rules
	*
	* @return array
	*/
	public function find_users_for_notification($data, $options = array())
	{
		// Exclude bots and guests
		$sql = 'SELECT group_id
			FROM ' . GROUPS_TABLE . '
			WHERE ' . $this->db->sql_in_set('group_name', array('BOTS', 'GUESTS'));
		$result = $this->db->sql_query($sql);

		$exclude_ids = array();
		while ($row = $this->db->sql_fetchrow($result))
		{
			$exclude_ids[] = $row['group_id'];
		}
		$this->db->sql_freeresult($result);

		// Grab all registered users (excluding bots and guests)
		$sql = 'SELECT user_id
			FROM ' . USERS_TABLE . '
			WHERE ' . $this->db->sql_in_set('group_id', array_map('intval', $exclude_ids), true);
		$result = $this->db->sql_query($sql);

		$users =  array();
		while ($row = $this->db->sql_fetchrow($result))
		{
			$users[$row['user_id']] = array('');
		}
		$this->db->sql_freeresult($result);

		if (empty($users))
		{
			return array();
		}

		return $users;
	}

	/**
	* Users needed to query before this notification can be displayed
	*
	* @return array Array of user_ids
	*/
	public function users_to_query()
	{
		return array($this->get_data('from_user_id'));
	}

	/**
	* Get the HTML formatted title of this notification
	*
	* @return string
	*/
	public function get_title()
	{
		$username = $this->user_loader->get_username($this->get_data('from_user_id'), 'no_profile');

		return $this->user->lang('BOARDRULES_NOTIFICATION', $username);
	}

	/**
	* Get the url to this item
	*
	* @return string URL
	*/
	public function get_url()
	{
		$rule_id = ($this->item_id) ? '#' . $this->item_id : '';

		return $this->phpbb_root_path . 'app.' . $this->php_ext . '/rules' . $rule_id;
	}

	/**
	* Get the user's avatar (the user who caused the notification typically)
	*
	* @return string
	*/
	public function get_avatar()
	{
		return $this->user_loader->get_avatar($this->get_data('from_user_id'));
	}

	/**
	* Get email template
	*
	* @return string|bool
	*/
	public function get_email_template()
	{
		return false;
	}

	/**
	* Get email template variables
	*
	* @return array
	*/
	public function get_email_template_variables()
	{
		return array();
	}

	/**
	* Function for preparing the data for insertion in an SQL query
	* (The service handles insertion)
	*
	* @param array $data The data for the updated rules
	* @param array $pre_create_data Data from pre_create_insert_array()
	*
	* @return array Array of data ready to be inserted into the database
	*/
	public function create_insert_array($data, $pre_create_data = array())
	{
		$this->set_data('from_username', $data['from_username']);
		$this->set_data('from_user_id', $data['from_user_id']);
		$this->set_data('rule_id', $data['rule_id']);

		return parent::create_insert_array($data, $pre_create_data);
	}
}
