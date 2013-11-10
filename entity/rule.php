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
*
* Schema:
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
*/
class rule implements rule_interface
{
	/** @var \phpbb\db\driver */
	protected $db;

	/** @var string Rules Database Table Name */
	protected $rules_table;

	/** @var array Data for this entity */
	protected $data;

	/**
	* Constructor
	*
	* @param \phpbb\db\driver $db
	* @param string $rules_table
	* @return \phpbb\boardrules\entity\rule
	* @access public
	*/
	public function __construct(\phpbb\db\driver $db, $rules_table)
	{
		$this->db = $db;
		$this->rules_table = $rules_table;
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
		// Query to fetch this single item
		$sql = 'SELECT *
			FROM ' . $this->rules_table . '
			WHERE rule_id = ' . (int) $id;

		// Execute the query
		$result = $this->db->sql_query($sql);

		// Store the resulting row in this entity
		$this->data = $this->db->sql_fetchrow($result);

		if ($this->data === false)
		{
			// We were not able to find any row that matches the given id
			throw new \phpbb\boardrules\exception\out_of_bounds($id);
		}

		// Return $this; so calls can be chained load()->set()->save()
		return $this;
	}

	/**
	* Get title
	*
	* @return string
	* @access public
	*/
	public function get_title()
	{
		return (string) $this->data['rule_title'];
	}
}
