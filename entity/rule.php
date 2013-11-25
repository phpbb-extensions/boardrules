<?php
/**
*
* @package Board Rules Extension
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\entity;

/**
* Entity for a single rule
*/
class rule implements rule_interface
{
	/**
	* Data for this entity
	*
	* @var array
	*	rule_id
	*	rule_language
	*	rule_left_id
	*	rule_right_id
	*	rule_anchor
	*	rule_title
	*	rule_message
	*	rule_message_bbcode_uid
	*	rule_message_bbcode_bitfield
	*	rule_message_bbcode_options
	* @access protected
	*/
	protected $data;

	/**
	* Database object
	* @var \phpbb\db\driver\driver
	*/
	protected $db;

	/**
	* User object
	* @var \phpbb\user
	*/
	protected $user;

	/**
	* Board rules table
	* @string
	*/
	protected $board_rules_table;

	/**
	* Constructor
	*
	* @param \phpbb\db\driver\driver	$db		Database object
	* @param \phpbb\user			$user	User object
	*/
	public function __construct(\phpbb\db\driver\driver $db, \phpbb\user $user, $board_rules_table)
	{
		$this->db = $db;
		$this->user = $user;
		$this->board_rules_table = $board_rules_table
	}

	/**
	* Load the data from the database for this rule
	*
	* @param int $id Rule identifier
	* @return rule_interface $this
	* @access public
	* @throws \phpbb\boardrules\exception\out_of_bounds
	*/
	public function load($id)
	{
		$sql = 'SELECT *
			FROM ' . $this->board_rules_table . '
			WHERE rule_id = ' . (int) $id;
		$result = $this->db->sql_query($sql);
		$data = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		if ($data === false)
		{
			// Rule not found
			throw new \phpbb\boardrules\exception\out_of_bounds('NO_RULE');
		}

		return $this->data = $data;
	}

	/**
	* Insert the rule for the first time
	*
	* Will throw an exception if the rule was already inserted (call save() instead)
	*
	* @param string $language The language
	* @param int $left_id The left id for the tree
	* @param int $right_id The right id for the tree
	* @return rule_interface $this
	* @access public
	* @throws \phpbb\boardrules\exception\base
	*/
	public function insert($language = '', $left_id = 0, $right_id = 0)
	{
		$rule_data = array(
			'rule_language'					=> $this->data['rule_language'],
			'rule_left_id'					=> $left_id,
			'rule_right_id'					=> $right_id,
			'rule_anchor'					=> $this->data['rule_anchor'],
			'rule_title'					=> $this->data['rule_title'],
			'rule_message'					=> $this->data['rule_message'],
			'rule_message_bbcode_uid'		=> $this->data['rule_message_bbcode_uid'],
			'rule_message_bbcode_bitfield'	=> $this->data['rule_message_bbcode_bitfield'],
			'rule_message_bbcode_options'	=> $this->data['rule_message_bbcode_options'],
		);

		$sql = 'UPDATE ' . $this->board_rules_table . '
			SET ' . $db->sql_build_array('UPDATE', $rule_data) . "
			WHERE rule_language = " . $language . "
			 AND rule_id = " . $this->data['rule_id'];
		$result = $db->sql_query($sql);

		if (!$result)
		{
			$this->save();

			// Rule no existed
			throw new \phpbb\boardrules\exception\base('RULE_NO_EXISTED');
		}
		$db->sql_freeresult($result);
	}

	/**
	* Save the current settings to the database
	*
	* This must be called before closing or any changes will not be saved!
	* If adding a rule (saving for the first time), you must call insert() or an exeception will be thrown
	*
	* @return rule_interface $this
	* @access public
	* @throws \phpbb\boardrules\exception\base
	*/
	public function save()
	{
		$rule_data = array(
			'rule_language'					=> $this->data['rule_language'],
			'rule_left_id'					=> $this->data['rule_left_id'],
			'rule_right_id'					=> $this->data['rule_right_id'],
			'rule_anchor'					=> $this->data['rule_anchor'],
			'rule_title'					=> $this->data['rule_title'],
			'rule_message'					=> $this->data['rule_message'],
			'rule_message_bbcode_uid'		=> $this->data['rule_message_bbcode_uid'],
			'rule_message_bbcode_bitfield'	=> $this->data['rule_message_bbcode_bitfield'],
			'rule_message_bbcode_options'	=> $this->data['rule_message_bbcode_options'],
		);

		$sql = 'INSERT INTO ' . $this->board_rules_table . ' ' . $db->sql_build_array('INSERT', $rule_data);
		$result = $db->sql_query($sql);

		if (!$result)
		{
			// Rule existed
			throw new \phpbb\boardrules\exception\base('RULE_EXISTED');
		}
	}

	/**
	* Delete this rule
	*
	* @return null
	* @access public
	* @throws \phpbb\boardrules\exception\base
	*/
	public function delete()
	{
		$sql = 'DELETE FROM ' . $this->board_rules_table . '
			WHERE rule_id = ' . $this->data['rule_id'];

		if ($this->db->sql_query($sql))
		{
			// Rule not found
			throw new \phpbb\boardrules\exception\base('NO_RULE');
		}
	}

	/**
	* Get id
	*
	* @return int Rule identifier
	* @access public
	*/
	public function get_id()
	{
		return (isset($this->data['rule_id'])) ? (int) $this->data['rule_id'] : 0;
	}

	/**
	* Get title
	*
	* @return string Title
	* @access public
	*/
	public function get_title()
	{
		return (isset($this->data['rule_title'])) ? (string) $this->data['rule_title'] : '';
	}

	/**
	* Set title
	*
	* @param string $title
	* @return rule_interface $this
	* @access public
	* @throws \phpbb\boardrules\exception\base
	*/
	public function set_title($title)
	{
		// Enforce a string
		$title = (string) $title;

		// We limit the title length to 200 characters
		if (truncate_string($title, 200) != $title)
		{
			throw new \phpbb\boardrules\exception\unexpected_value('TITLE_TOO_LONG');
		}

		// Set the title on our data array
		$this->data['rule_title'] = $title;

		// Return $this; so calls can be chained load()->set()->save()
		return $this;
	}
}
