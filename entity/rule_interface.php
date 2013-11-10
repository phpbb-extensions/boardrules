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
* Interface for a single rule
*
* This describes all of the methods we'll have for a single rule
*/
interface rule_interface
{
	/**
	* Load the data from the database for this rule
	*
	* @param int $id Rule identifier
	* @return rule_interface $this
	* @access public
	* @throws \phpbb\boardrules\exception\out_of_bounds
	*/
	public function load($id);

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
	public function insert($language = '', $left_id = 0, $right_id = 0);

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
	public function save();

	/**
	* Delete this rule
	*
	* @return null
	* @access public
	* @throws \phpbb\boardrules\exception\base
	*/
	public function delete();

	/**
	* Get id
	*
	* @return int Rule identifier
	* @access public
	*/
	public function get_id();

	/**
	* Set id
	*
	* @param int $id Rule identifier
	* @return rule_interface $this
	* @access public
	* @throws \phpbb\boardrules\exception\base
	*/
	public function set_id($id);

	/**
	* Get title
	*
	* @return string
	* @access public
	*/
	public function get_title();

	/**
	* Set title
	*
	* @param string $title
	* @return rule_interface $this
	* @access public
	* @throws \phpbb\boardrules\exception\base
	*/
	public function set_title($title);

	/**
	* Get message for edit
	*
	* @return string
	* @access public
	*/
	public function get_message_for_edit();

	/**
	* Get message for display
	*
	* @return string
	* @access public
	*/
	public function get_message_for_display();

	/**
	* Set message
	*
	* @param string $message
	* @return rule_interface $this
	* @access public
	* @throws \phpbb\boardrules\exception\base
	*/
	public function set_message($message);

	/**
	* Get anchor
	*
	* @return string anchor
	* @access public
	*/
	public function get_anchor();

	/**
	* Set anchor
	*
	* @param string $anchor Anchor text
	* @return rule_interface $this
	* @access public
	* @throws \phpbb\boardrules\exception\base
	*/
	public function set_anchor($anchor);

	/**
	* Get the language identifier
	*
	* @return string language identifier
	* @access public
	*/
	public function get_language();

	/**
	* Get the left identifier (for the tree)
	*
	* @return int left identifier
	* @access public
	*/
	public function get_left_id();

	/**
	* Get the right identifier (for the tree)
	*
	* @return int left identifier
	* @access public
	*/
	public function get_right_id();
}
