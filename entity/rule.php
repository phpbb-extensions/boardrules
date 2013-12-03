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
		$this->data = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		if ($this->data === false)
		{
			// A rule does not exist
			throw new \phpbb\boardrules\exception\out_of_bounds('RULE_NOT_EXIST');
		}

		return $this;
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
