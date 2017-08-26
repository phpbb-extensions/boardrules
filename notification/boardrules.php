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
	 * Set the controller helper
	 *
	 * @param \phpbb\controller\helper $helper
	 * @return void
	 */
	public function set_controller_helper(\phpbb\controller\helper $helper)
	{
		$this->helper = $helper;
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_type()
	{
		return 'phpbb.boardrules.notification.type.boardrules';
	}

	/**
	 * {@inheritdoc}
	 */
	public function is_available()
	{
		return false;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function get_item_id($data)
	{
		return $data['notification_id'];
	}

	/**
	 * {@inheritdoc}
	 */
	public static function get_item_parent_id($data)
	{
		// No parent
		return 0;
	}

	/**
	 * {@inheritdoc}
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
			$users[$row['user_id']] = $this->notification_manager->get_default_methods();
		}
		$this->db->sql_freeresult($result);

		return $users;
	}

	/**
	 * {@inheritdoc}
	 */
	public function users_to_query()
	{
		return array();
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_title()
	{
		return $this->language->lang('BOARDRULES_NOTIFICATION');
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_url()
	{
		$rule_id = $this->get_data('rule_id') ? array('#' => $this->get_data('rule_id')) : array();

		return $this->helper->route('phpbb_boardrules_main_controller', $rule_id);
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_email_template()
	{
		return false;
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_email_template_variables()
	{
		return array();
	}

	/**
	 * {@inheritdoc}
	 */
	public function create_insert_array($data, $pre_create_data = array())
	{
		$this->set_data('rule_id', $data['rule_id']);

		parent::create_insert_array($data, $pre_create_data);
	}
}
