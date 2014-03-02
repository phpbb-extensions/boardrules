<?php
/**
*
* @package Board Rules Extension
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\controller;

/**
* Admin controller
*/
class admin_controller implements admin_interface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\db\driver\driver */
	protected $db;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\boardrules\operators\rule */
	protected $rule_operator;

	/** string Custom form action */
	protected $u_action;

	/**
	* Constructor
	*
	* @param \phpbb\config\config                         $config            Config object
	* @param \phpbb\db\driver\driver                      $db                Database object
	* @param \phpbb\request\request                       $request           Request object
	* @param \phpbb\template\template                     $template          Template object
	* @param \phpbb\boardrules\operators\rule             $rule_operator     Rule operator object
	* @return \phpbb\boardrules\controller\admin_controller
	* @access public
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\db\driver\driver $db, \phpbb\request\request $request, \phpbb\template\template $template, \phpbb\boardrules\operators\rule $rule_operator)
	{
		$this->config = $config;
		$this->db = $db;
		$this->request = $request;
		$this->template = $template;
		$this->rule_operator = $rule_operator;
	}

	/**
	* Display the options a user can configure for this extension
	*
	* @return null
	* @access public
	*/
	public function display_options()
	{
		$this->template->assign_vars(array(
			'BOARDRULES_ENABLE'						=> $this->config['boardrules_enable'] ? true : false,
			'BOARDRULES_REQUIRE_AT_REGISTRATION'	=> $this->config['boardrules_require_at_registration'] ? true : false,
		));
	}

	/**
	* Set the options a user can configure
	*
	* @return null
	* @access public
	*/
	public function set_options()
	{
		$this->config->set('boardrules_enable', $this->request->variable('boardrules_enable', 0));
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

					'LANG_ISO'			=> $row['lang_iso'],
					'LANG_LOCAL_NAME'	=> $row['lang_local_name'],
				));
			}
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

		$last_right_id = 0;

		foreach ($entities as $entity)
		{
			if ($entity->get_left_id() < $last_right_id)
			{
				continue; // The current rule is a child of a previous rule, do not display it
			}

			$this->template->assign_block_vars('rules', array(
				'RULE_TITLE'		=> $entity->get_title(),

				'S_IS_CATEGORY'		=> ($entity->get_right_id() - $entity->get_left_id() > 1) ? true : false,

				'U_DELETE'			=> "{$this->u_action}&amp;action=delete&amp;rule_id=" . $entity->get_id(),
				'U_EDIT'			=> "{$this->u_action}&amp;action=edit&amp;rule_id=" . $entity->get_id(),
				'U_MOVE_DOWN'		=> "{$this->u_action}&amp;action=move_down&amp;rule_id=" . $entity->get_id(),
				'U_MOVE_UP'			=> "{$this->u_action}&amp;action=move_up&amp;rule_id=" . $entity->get_id(),
				'U_RULE'			=> "{$this->u_action}&amp;language={$language}&amp;parent_id=" . $entity->get_id(),
			));

			$last_right_id = $entity->get_right_id();
		}

		// Prepare rule breadcrumb path navigation
		$entities = $this->rule_operator->get_rule_tree_path_data($language, $parent_id);

		foreach ($entities as $entity)
		{
			$this->template->assign_block_vars('breadcrumb', array(
				'RULE_TITLE'		=> $entity->get_title(),

				'S_CURRENT_LEVEL'	=> ($entity->get_id() == $parent_id) ? true : false,

				'U_RULE'			=> "{$this->u_action}&amp;language={$language}&amp;parent_id=" . $entity->get_id(),
			));
		}

		$this->template->assign_vars(array(
			'U_ACTION'		=> "{$this->u_action}&amp;language={$language}&amp;parent_id={$parent_id}",
			'U_ADD_RULE'	=> "{$this->u_action}&amp;language={$language}&amp;parent_id={$parent_id}&amp;action=add",
			'U_MAIN'		=> "{$this->u_action}&amp;language={$language}&amp;parent_id=0",
		));
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
}
