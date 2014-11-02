<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\controller;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
* Admin controller
*/
class admin_controller implements admin_interface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var ContainerInterface */
	protected $container;

	/** @var \phpbb\boardrules\operators\rule */
	protected $rule_operator;

	/** @var string phpBB root path */
	protected $root_path;

	/** @var string phpEx */
	protected $php_ext;

	/** string Custom form action */
	protected $u_action;

	/**
	* Constructor
	*
	* @param \phpbb\config\config                 $config          Config object
	* @param \phpbb\db\driver\driver_interface    $db              Database object
	* @param \phpbb\request\request               $request         Request object
	* @param \phpbb\template\template             $template        Template object
	* @param \phpbb\user                          $user            User object
	* @param ContainerInterface                   $container       Service container interface
	* @param \phpbb\boardrules\operators\rule     $rule_operator   Rule operator object
	* @param string                               $root_path       phpBB root path
	* @param string                               $php_ext         phpEx
	* @return \phpbb\boardrules\controller\admin_controller
	* @access public
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\db\driver\driver_interface $db, \phpbb\request\request $request, \phpbb\template\template $template, \phpbb\user $user, ContainerInterface $container, \phpbb\boardrules\operators\rule $rule_operator, $root_path, $php_ext)
	{
		$this->config = $config;
		$this->db = $db;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
		$this->container = $container;
		$this->rule_operator = $rule_operator;
		$this->root_path = $root_path;
		$this->php_ext = $php_ext;
	}

	/**
	* Display the options a user can configure for this extension
	*
	* @return null
	* @access public
	*/
	public function display_options()
	{
		// Create a form key for preventing CSRF attacks
		add_form_key('boardrules_settings');

		// Create an array to collect errors that will be output to the user
		$errors = array();

		// Is the form being submitted to us?
		if ($this->request->is_set_post('submit'))
		{
			// Test if the submitted form is valid
			if (!check_form_key('boardrules_settings'))
			{
				$errors[] = $this->user->lang('FORM_INVALID');
			}

			// If no errors, process the form data
			if (empty($errors))
			{
				// Set the options the user configured
				$this->set_options();

				// Add option settings change action to the admin log
				$phpbb_log = $this->container->get('log');
				$phpbb_log->add('admin', $this->user->data['user_id'], $this->user->ip, 'ACP_BOARDRULES_SETTINGS_LOG');

				// Option settings have been updated and logged
				// Confirm this to the user and provide link back to previous page
				trigger_error($this->user->lang('ACP_BOARDRULES_SETTINGS_CHANGED') . adm_back_link($this->u_action));
			}
		}

		// Set output vars for display in the template
		$this->template->assign_vars(array(
			'S_ERROR'		=> (sizeof($errors)) ? true : false,
			'ERROR_MSG'		=> (sizeof($errors)) ? implode('<br />', $errors) : '',

			'U_ACTION'		=> $this->u_action,

			'S_BOARDRULES_ENABLE'						=> $this->config['boardrules_enable'] ? true : false,
			'S_BOARDRULES_HEADER_LINK'					=> $this->config['boardrules_header_link'] ? true : false,
			'S_BOARDRULES_REQUIRE_AT_REGISTRATION'		=> $this->config['boardrules_require_at_registration'] ? true : false,
		));
	}

	/**
	* Set the options a user can configure
	*
	* @return null
	* @access protected
	*/
	protected function set_options()
	{
		$this->config->set('boardrules_enable', $this->request->variable('boardrules_enable', 0));
		$this->config->set('boardrules_header_link', $this->request->variable('boardrules_header_link', 0));
		$this->config->set('boardrules_require_at_registration', $this->request->variable('boardrules_require_at_registration', 0));
	}

	/**
	* Display the language selection
	*
	* Display the available languages to add/manage board rules from.
	* If there is only one board language, this will just call display_rules().
	*
	* @return null
	* @access public
	*/
	public function display_language_selection()
	{
		// Check if there are any available languages
		$sql = 'SELECT lang_id, lang_iso, lang_local_name
			FROM ' . LANG_TABLE . '
			ORDER BY lang_english_name';
		$result = $this->db->sql_query($sql);
		$rows = $this->db->sql_fetchrowset($result);
		$this->db->sql_freeresult($result);

		// If there are some, build option fields
		if (sizeof($rows) > 1)
		{
			foreach ($rows as $row)
			{
				$this->template->assign_block_vars('options', array(
					'S_LANG_DEFAULT'	=> ($row['lang_iso'] == $this->config['default_lang']) ? true : false,

					'LANG_ID'			=> $row['lang_id'],
					'LANG_LOCAL_NAME'	=> $row['lang_local_name'],
				));
			}

			// Set u_action variable for the template form
			$this->template->assign_var('U_ACTION', $this->u_action);
		}
		else
		{
			// If there is only one available language its index is 0
			// and that language is the default board language.
			// We do not need any loops here to get its id.
			$this->display_rules($rows[0]['lang_id']);
		}
	}

	/**
	* Display the rules
	*
	* @param int $language Language selection identifier; default: 0
	* @param int $parent_id Category to display rules from; default: 0
	* @return null
	* @access public
	*/
	public function display_rules($language = 0, $parent_id = 0)
	{
		// Grab all the rules in the current user's language
		$entities = $this->rule_operator->get_rules($language, $parent_id);

		// Initialize a variable to hold the right_id value
		$last_right_id = 0;

		// Process each rule entity for display
		foreach ($entities as $entity)
		{
			if ($entity->get_left_id() < $last_right_id)
			{
				continue; // The current rule is a child of a previous rule, do not display it
			}

			// Set output block vars for display in the template
			$this->template->assign_block_vars('rules', array(
				'RULE_TITLE'		=> $entity->get_title(),

				'S_IS_CATEGORY'		=> ($entity->get_right_id() - $entity->get_left_id() > 1) ? true : false,

				'U_DELETE'			=> "{$this->u_action}&amp;action=delete&amp;rule_id=" . $entity->get_id(),
				'U_EDIT'			=> "{$this->u_action}&amp;action=edit&amp;rule_id=" . $entity->get_id(),
				'U_MOVE_DOWN'		=> "{$this->u_action}&amp;action=move_down&amp;rule_id=" . $entity->get_id() . '&amp;hash=' . generate_link_hash('down' . $entity->get_id()),
				'U_MOVE_UP'			=> "{$this->u_action}&amp;action=move_up&amp;rule_id=" . $entity->get_id() . '&amp;hash=' . generate_link_hash('up' . $entity->get_id()),
				'U_RULE'			=> "{$this->u_action}&amp;language={$language}&amp;parent_id=" . $entity->get_id(),
			));

			// Store the current right_id value
			$last_right_id = $entity->get_right_id();
		}

		// Prepare rule breadcrumb path navigation
		$entities = $this->rule_operator->get_rule_parents($language, $parent_id);

		// Process each rule entity for breadcrumb display
		foreach ($entities as $entity)
		{
			// Set output block vars for display in the template
			$this->template->assign_block_vars('breadcrumb', array(
				'RULE_TITLE'		=> $entity->get_title(),

				'S_CURRENT_LEVEL'	=> ($entity->get_id() == $parent_id) ? true : false,

				'U_RULE'			=> "{$this->u_action}&amp;language={$language}&amp;parent_id=" . $entity->get_id(),
			));
		}

		// Set output vars for display in the template
		$this->template->assign_vars(array(
			'U_ACTION'		=> "{$this->u_action}&amp;language={$language}&amp;parent_id={$parent_id}",
			'U_ADD_RULE'	=> "{$this->u_action}&amp;language={$language}&amp;parent_id={$parent_id}&amp;action=add",
			'U_MAIN'		=> "{$this->u_action}&amp;language={$language}&amp;parent_id=0",
		));
	}

	/**
	* Add a rule
	*
	* @param int $language Language selection identifier; default: 0
	* @param int $parent_id Category to display rules from; default: 0
	* @return null
	* @access public
	*/
	public function add_rule($language = 0, $parent_id = 0)
	{
		// Add form key
		add_form_key('add_edit_rule');

		// Initiate a rule entity
		$entity = $this->container->get('phpbb.boardrules.entity');

		// Build rule parent pull down menu
		$this->build_parent_select_menu($entity, $language, $parent_id, $mode = 'add');

		// Collect the form data
		$data = array(
			'rule_language'		=> $language,
			'rule_parent_id'	=> $this->request->variable('rule_parent', $parent_id),
			'rule_title'		=> $this->request->variable('rule_title', '', true),
			'rule_anchor'		=> $this->request->variable('rule_anchor', '', true),
			'rule_message'		=> $this->request->variable('rule_message', '', true),
			'bbcode'			=> !$this->request->variable('disable_bbcode', false),
			'magic_url'			=> !$this->request->variable('disable_magic_url', false),
			'smilies'			=> !$this->request->variable('disable_smilies', false),
		);

		// Process the new rule
		$this->add_edit_rule_data($entity, $data);

		// Set output vars for display in the template
		$this->template->assign_vars(array(
			'S_ADD_RULE'		=> true,

			'U_ADD_ACTION'		=> "{$this->u_action}&amp;language={$language}&amp;parent_id={$parent_id}&amp;action=add",
			'U_BACK'			=> "{$this->u_action}&amp;language={$language}&amp;parent_id={$parent_id}",
		));
	}

	/**
	* Edit a rule
	*
	* @param int $rule_id The rule identifier to edit
	* @return null
	* @access public
	*/
	public function edit_rule($rule_id)
	{
		// Add form key
		add_form_key('add_edit_rule');

		// Initiate and load the rule entity
		$entity = $this->container->get('phpbb.boardrules.entity')->load($rule_id);

		// Build rule parent pull down menu
		$this->build_parent_select_menu($entity);

		// Collect the form data
		$data = array(
			'rule_parent_id'=> $this->request->variable('rule_parent', $entity->get_parent_id()),
			'rule_title'	=> $this->request->variable('rule_title', $entity->get_title(), true),
			'rule_anchor'	=> $this->request->variable('rule_anchor', $entity->get_anchor(), true),
			'rule_message'	=> $this->request->variable('rule_message', $entity->get_message_for_edit(), true),
			'bbcode'		=> !$this->request->variable('disable_bbcode', false),
			'magic_url'		=> !$this->request->variable('disable_magic_url', false),
			'smilies'		=> !$this->request->variable('disable_smilies', false),
		);

		// Process the edited rule
		$this->add_edit_rule_data($entity, $data);

		// Set output vars for display in the template
		$this->template->assign_vars(array(
			'S_EDIT_RULE'		=> true,
			'S_IS_CATEGORY'		=> ($entity->get_right_id() - $entity->get_left_id() > 1) ? true : false,

			'U_EDIT_ACTION'		=> "{$this->u_action}&amp;rule_id={$rule_id}&amp;action=edit",
			'U_BACK'			=> "{$this->u_action}&amp;language={$entity->get_language()}&amp;parent_id={$entity->get_parent_id()}",
		));
	}

	/**
	* Process rule data to be added or edited
	*
	* @param object $entity The rule entity object
	* @param array $data The form data to be processed
	* @return null
	* @access protected
	*/
	protected function add_edit_rule_data($entity, $data)
	{
		// Get form's POST actions (submit or preview)
		$submit = $this->request->is_set_post('submit');
		$preview = $this->request->is_set_post('preview');

		// Load posting language file for the BBCode editor
		$this->user->add_lang('posting');

		// Create an array to collect errors that will be output to the user
		$errors = array();

		// Grab the form data's message parsing options (possible values: 1 or 0)
		$message_parse_options = array(
			'bbcode'	=> ($submit || $preview) ? $data['bbcode'] : $entity->message_bbcode_enabled(),
			'magic_url'	=> ($submit || $preview) ? $data['magic_url'] : $entity->message_magic_url_enabled(),
			'smilies'	=> ($submit || $preview) ? $data['smilies'] : $entity->message_smilies_enabled(),
		);

		// Set the message parse options in the entity
		foreach ($message_parse_options as $function => $enabled)
		{
			call_user_func(array($entity, ($enabled ? 'message_enable_' : 'message_disable_') . $function));
		}

		unset($message_parse_options);

		// Grab the form's rule data fields
		$rule_fields = array(
			'title'		=> $data['rule_title'],
			'anchor'	=> $data['rule_anchor'],
			'message'	=> $data['rule_message'],
		);

		// Set the rule's data in the entity
		foreach ($rule_fields as $entity_function => $rule_data)
		{
			try
			{
				// Calling the set_$entity_function on the entity and passing it $rule_data
				call_user_func_array(array($entity, 'set_' . $entity_function), array($rule_data));
			}
			catch (\phpbb\boardrules\exception\base $e)
			{
				// Catch exceptions and add them to errors array
				$errors[] = $e->get_message($this->user);
			}
		}

		unset($rule_fields);

		// If the form has been submitted or previewed
		if ($submit || $preview)
		{
			// Test if the form is valid
			if (!check_form_key('add_edit_rule'))
			{
				$errors[] = $this->user->lang('FORM_INVALID');
			}

			// Do not allow an empty rule title
			if ($entity->get_title() == '')
			{
				$errors[] = $this->user->lang('ACP_RULE_TITLE_EMPTY');
			}
		}

		// Preview
		if ($preview && empty($errors))
		{
			// Set output vars for display in the template
			$this->template->assign_vars(array(
				'S_PREVIEW'					=> $preview,

				'RULE_TITLE_PREVIEW'		=> $entity->get_title(),
				'RULE_MESSAGE_PREVIEW'		=> $entity->get_message_for_display(),
			));
		}

		// Insert or update rule
		if ($submit && empty($errors) && !$preview)
		{
			if ($entity->get_id())
			{
				// Save the edited rule entity to the database
				$entity->save();

				// Change rule parent
				if (isset($data['rule_parent_id']) && ($data['rule_parent_id'] != $entity->get_parent_id()))
				{
					$this->rule_operator->change_parent($entity->get_id(), $data['rule_parent_id']);
				}

				// Show user confirmation of the saved rule and provide link back to the previous page
				trigger_error($this->user->lang('ACP_RULE_EDITED') . adm_back_link("{$this->u_action}&amp;language={$entity->get_language()}&amp;parent_id={$entity->get_parent_id()}"));
			}
			else
			{
				// Add a new rule entity to the database
				$this->rule_operator->add_rule($entity, $data['rule_language'], $data['rule_parent_id']);

				// Show user confirmation of the added rule and provide link back to the previous page
				trigger_error($this->user->lang('ACP_RULE_ADDED') . adm_back_link("{$this->u_action}&amp;language={$data['rule_language']}&amp;parent_id={$data['rule_parent_id']}"));
			}
		}

		// Set output vars for display in the template
		$this->template->assign_vars(array(
			'S_ERROR'			=> (sizeof($errors)) ? true : false,
			'ERROR_MSG'			=> (sizeof($errors)) ? implode('<br />', $errors) : '',

			'RULE_TITLE'		=> $entity->get_title(),
			'RULE_ANCHOR'		=> $entity->get_anchor(),
			'RULE_MESSAGE'		=> $entity->get_message_for_edit(),

			'S_BBCODE_DISABLE_CHECKED'		=> !$entity->message_bbcode_enabled(),
			'S_SMILIES_DISABLE_CHECKED'		=> !$entity->message_smilies_enabled(),
			'S_MAGIC_URL_DISABLE_CHECKED'	=> !$entity->message_magic_url_enabled(),

			'BBCODE_STATUS'			=> $this->user->lang('BBCODE_IS_ON', '<a href="' . append_sid("{$this->root_path}faq.{$this->php_ext}", 'mode=bbcode') . '">', '</a>'),
			'SMILIES_STATUS'		=> $this->user->lang('SMILIES_ARE_ON'),
			'IMG_STATUS'			=> $this->user->lang('IMAGES_ARE_ON'),
			'FLASH_STATUS'			=> $this->user->lang('FLASH_IS_ON'),
			'URL_STATUS'			=> $this->user->lang('URL_IS_ON'),

			'S_BBCODE_ALLOWED'		=> true,
			'S_SMILIES_ALLOWED'		=> true,
			'S_BBCODE_IMG'			=> true,
			'S_BBCODE_FLASH'		=> true,
			'S_LINKS_ALLOWED'		=> true,
		));

		// Assigning custom bbcodes
		include_once($this->root_path . 'includes/functions_display.' . $this->php_ext);

		display_custom_bbcodes();
	}

	/**
	* Delete a rule
	*
	* @param int $rule_id The rule identifier to delete
	* @return null
	* @access public
	*/
	public function delete_rule($rule_id)
	{
		// Initiate and load the rule entity
		$entity = $this->container->get('phpbb.boardrules.entity')->load($rule_id);

		// Use a confirmation box routine when deleting a rule
		if (confirm_box(true))
		{
			// Delete the rule on confirmation
			$this->rule_operator->delete_rule($rule_id);

			// Show user confirmation of the deleted rule and provide link back to the previous page
			trigger_error($this->user->lang('ACP_RULE_DELETED') . adm_back_link("{$this->u_action}&amp;language={$entity->get_language()}&amp;parent_id={$entity->get_parent_id()}"));
		}
		else
		{
			// Request confirmation from the user to delete the rule
			confirm_box(false, $this->user->lang('ACP_DELETE_RULE_CONFIRM'), build_hidden_fields(array(
				'mode' => 'manage',
				'action' => 'delete',
				'rule_id' => $rule_id,
			)));

			// Use a redirect to take the user back to the previous page
			// if the user chose not delete the rule from the confirmation page.
			redirect("{$this->u_action}&amp;language={$entity->get_language()}&amp;parent_id={$entity->get_parent_id()}");
		}
	}

	/**
	* Move a rule up/down
	*
	* @param int $rule_id The rule identifier to move
	* @param string $direction The direction (up|down)
	* @param int $amount The number of places to move the rule
	* @return null
	* @access public
	*/
	public function move_rule($rule_id, $direction, $amount = 1)
	{
		// If the link hash is invalid, stop and show an error message to the user
		if (!check_link_hash($this->request->variable('hash', ''), $direction . $rule_id))
		{
			trigger_error($this->user->lang('FORM_INVALID') . adm_back_link($this->u_action), E_USER_WARNING);
		}

		// Move the rule
		$this->rule_operator->move($rule_id, $direction, $amount);

		// Send a JSON response if an AJAX request was used
		if ($this->request->is_ajax())
		{
			$json_response = new \phpbb\json_response;
			$json_response->send(array('success' => true));
		}

		// Initiate and load the rule entity for no AJAX request
		$entity = $this->container->get('phpbb.boardrules.entity')->load($rule_id);

		// Use a redirect to reload the current page
		redirect("{$this->u_action}&amp;language={$entity->get_language()}&amp;parent_id={$entity->get_parent_id()}");
	}

	/**
	* Send notification to users
	*
	* @param int $rule_id The rule identifier
	* @return null
	* @access public
	*/
	public function send_notification($rule_id)
	{
		// Use a confirmation box routine when sending notifications
		if (confirm_box(true))
		{
			// Increment our notifications sent counter
			$this->config->increment('boardrules_notification', 1);

			// Store the notification data we will use in an array
			$notification_data = array(
				'rule_id'			=> $rule_id,
				'notification_id'	=> $this->config['boardrules_notification'],
			);

			// Create the notification
			$phpbb_notifications = $this->container->get('notification_manager');
			$phpbb_notifications->add_notifications('phpbb.boardrules.notification.type.boardrules', $notification_data);

			// Log the notification
			$phpbb_log = $this->container->get('log');
			$phpbb_log->add('admin', $this->user->data['user_id'], $this->user->ip, 'ACP_BOARDRULES_NOTIFY_LOG');
		}
		else
		{
			// Request confirmation from the user to send notification to all users
			// Build a hidden array of the form data
			confirm_box(false, $this->user->lang('ACP_BOARDRULES_NOTIFY_CONFIRM'), build_hidden_fields(array(
				'action_send_notification' => true,
				'rule_id' => $rule_id,
			)));
		}
	}

	/**
	* Set page url
	*
	* @param string $u_action Custom form action
	* @return null
	* @access public
	*/
	public function set_page_url($u_action)
	{
		$this->u_action = $u_action;
	}

	/**
	* Build pull down menu options of available rule parents
	*
	* @param object $entity The rule entity object
	* @param int $language Language selection identifier; default: 0
	* @param int $parent_id Category to display rules from; default: 0
	* @param string $mode Display menu for add or edit mode
	* @return null
	* @access protected
	*/
	protected function build_parent_select_menu($entity, $language = 0, $parent_id = 0, $mode = 'edit')
	{
		$language = ($mode == 'edit') ? $entity->get_language() : $language;
		$parent_id = ($mode == 'edit') ? $entity->get_parent_id() : $parent_id;

		// Prepare rule pull-down field
		$rule_menu_items = $this->rule_operator->get_rules($language);

		$padding = '';
		$padding_store = array();
		$right = 0;

		// Process each rule menu item for pull-down
		foreach ($rule_menu_items as $rule_menu_item)
		{
			if ($rule_menu_item->get_left_id() < $right)
			{
				$padding .= '&nbsp;&nbsp;';
				$padding_store[$rule_menu_item->get_parent_id()] = $padding;
			}
			else if ($rule_menu_item->get_left_id() > $right + 1)
			{
				$padding = (isset($padding_store[$rule_menu_item->get_parent_id()])) ? $padding_store[$rule_menu_item->get_parent_id()] : '';
			}

			$right = $rule_menu_item->get_right_id();

			// Set output block vars for display in the template
			$this->template->assign_block_vars('rulemenu', array(
				'RULE_ID'			=> $rule_menu_item->get_id(),
				'RULE_TITLE'		=> $padding . $rule_menu_item->get_title(),

				'S_DISABLED'		=> ($mode == 'edit' && (($rule_menu_item->get_left_id() > $entity->get_left_id()) && ($rule_menu_item->get_right_id() < $entity->get_right_id()) || ($rule_menu_item->get_id() == $entity->get_id()))) ? true : false,
				'S_RULE_PARENT'		=> ($rule_menu_item->get_id() == $parent_id) ? true : false,
			));
		}
	}
}
