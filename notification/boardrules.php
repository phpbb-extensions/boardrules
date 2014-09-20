<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
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
	/** @var \phpbb\controller\helper */
	protected $helper;

	/**
	* Notification Type Boardrules Constructor
	*
	* @param \phpbb\user_loader $user_loader
	* @param \phpbb\db\driver\driver_interface $db
	* @param \phpbb\cache\driver\driver_interface $cache
	* @param \phpbb\user $user
	* @param \phpbb\auth\auth $auth
	* @param \phpbb\config\config $config
	* @param \phpbb\controller\helper $helper
	* @param string $phpbb_root_path
	* @param string $php_ext
	* @param string $notification_types_table
	* @param string $notifications_table
	* @param string $user_notifications_table
	* @return \phpbb\boardrules\notification\boardrules
	*/
	public function __construct(\phpbb\user_loader $user_loader, \phpbb\db\driver\driver_interface $db, \phpbb\cache\driver\driver_interface $cache, $user, \phpbb\auth\auth $auth, \phpbb\config\config $config, \phpbb\controller\helper $helper, $phpbb_root_path, $php_ext, $notification_types_table, $notifications_table, $user_notifications_table)
	{
		$this->user_loader = $user_loader;
		$this->db = $db;
		$this->cache = $cache;
		$this->user = $user;
		$this->auth = $auth;
		$this->config = $config;
		$this->helper = $helper;

		$this->phpbb_root_path = $phpbb_root_path;
		$this->php_ext = $php_ext;

		$this->notification_types_table = $notification_types_table;
		$this->notifications_table = $notifications_table;
		$this->user_notifications_table = $user_notifications_table;
	}

	/**
	* Get notification type name
	*
	* @return string
	*/
	public function get_type()
	{
		return 'phpbb.boardrules.notification.type.boardrules';
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
	* Get the id of the notification
	*
	* @param array $data The data for the updated rules
	* @return int Id of the notification
	*/
	public static function get_item_id($data)
	{
		return $data['notification_id'];
	}

	/**
	* Get the id of the parent
	*
	* @param array $data The data for the updated rules
	* @return int Id of the parent
	*/
	public static function get_item_parent_id($data)
	{
		// No parent
		return 0;
	}

	/**
	* Find the users who will receive notifications
	*
	* @param array $data The type specific data for the updated rules
	* @param array $options Options for finding users for notification
	* @return array
	*/
	public function find_users_for_notification($data, $options = array())
	{
		// Grab all registered users (excluding bots and guests)
		$sql = 'SELECT user_id
			FROM ' . USERS_TABLE . '
			WHERE user_type <> ' . USER_IGNORE;
		$result = $this->db->sql_query($sql);

		$users = array();
		while ($row = $this->db->sql_fetchrow($result))
		{
			$users[$row['user_id']] = array('');
		}
		$this->db->sql_freeresult($result);

		return $users;
	}

	/**
	* Users needed to query before this notification can be displayed
	*
	* @return array Array of user_ids
	*/
	public function users_to_query()
	{
		return array();
	}

	/**
	* Get the HTML formatted title of this notification
	*
	* @return string
	*/
	public function get_title()
	{
		return $this->user->lang('BOARDRULES_NOTIFICATION');
	}

	/**
	* Get the url to this item
	*
	* @return string URL
	*/
	public function get_url()
	{
		$rule_id = ($this->get_data('rule_id')) ? array('#' => $this->get_data('rule_id')) : array();

		return $this->helper->route('phpbb_boardrules_main_controller', $rule_id);
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
		$this->set_data('rule_id', $data['rule_id']);

		return parent::create_insert_array($data, $pre_create_data);
	}
}
