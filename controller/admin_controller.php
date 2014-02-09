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
class admin controller implements admin_interface
{
	/** @var \phpbb\db\driver\driver */
	protected $db;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\boardrules\entity\rule */
	protected $entity;

	/** @var \phpbb\boardrules\operators\rule */
	protected $rule_operator;

	/**
	* Constructor
	*
	* @param \phpbb\request\request            $request        Request object
	* @param \phpbb\boardrules\entity\rule     $entity         Entity for a single rule
	* @param \phpbb\boardrules\operators\rule  $rule_operator  Operator for a set of rules
	* @return \phpbb\boardrules\controller\admin_controller
	* @access public
	*/
	public function __construct(\phpbb\db\driver\driver $db, \phpbb\request\request $request, \phpbb\boardrules\entity\rule $entity, \phpbb\boardrules\operators\rule $rule_operator)
	{
		$this->db = $db;
		$this->request = $request;
		$this->entity = $entity;
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
	}

	/**
	* Set the options a user can configure
	*
	* @return null
	* @access public
	*/
	public function set_options()
	{
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
		$sql = 'SELECT COUNT(lang_id) as languages_count
			FROM ' . LANG_TABLE;
		$result = $this->db->sql_query($sql);

		// If there are some, build option fields
		if ($this->db->sql_fetchfield('languages_count') > 1)
		{
			language_select();
		}
		else
		{
			$this->display_rules();
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
		$this->rule_operator->get_rules($language, $parent_id);
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
		// Grab the form's message parsing options (possible values: 1 or 0)
		$message_parse_options = array(
			'bbcode' => $this->request->variable('enable_bbcode', 0),
			'magic_url' => $this->request->variable('enable_magic_url', 0),
			'smilies' => $this->request->variable('enable_smilies', 0),
		);

		// Set the message parse options in the entity
		foreach ($message_parse_options as $function => $enabled)
		{
			call_user_func(array($entity, ($enabled ? 'message_enable_' : 'message_disable_') . $function));
		}

		// Set the form's title, anchor and message fields in the entity
		$this->entity
			->set_title($this->request->variable('rule_title', ''))
			->set_anchor($this->request->variable('rule_anchor', ''))
			->set_message($this->request->variable('rule_message', ''));

		// Add the rule entity to the database
		$this->rule_operator->add_rule($language, $parent_id, $entity);
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
		// Initiate and load the rule entity
		$this->entity->load($rule_id);

		// Grab the form's message parsing options (possible values: 1 or 0)
		$message_parse_options = array(
			'bbcode' => $this->request->variable('enable_bbcode', 0),
			'magic_url' => $this->request->variable('enable_magic_url', 0),
			'smilies' => $this->request->variable('enable_smilies',0),
		);

		// Set the message parse options in the entity
		foreach ($message_parse_options as $function => $enabled)
		{
			call_user_func(array($entity, ($enabled ? 'message_enable_' : 'message_disable_') . $function));
		}

		// Set the form's title, anchor and message fields, and save the updated entity
		$this->entity
			->set_title($this->request->variable('rule_title', ''))
			->set_anchor($this->request->variable('rule_anchor', ''))
			->set_message($this->request->variable('rule_message', ''))
			->save();
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
		$this->rule_operator->delete_rule($rule_id);
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
		$this->rule_operator->move($rule_id, $direction, $amount);
	}
}
