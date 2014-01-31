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
	* Import data for this rule
	*
	* Used when the data is already loaded externally.
	* Any existing data on this rule is over-written.
	* All data is validated and an exception is thrown if any data is invalid.
	*
	* @param array $data Data array, typically from the database
	* @return rule_interface $this
	* @access public
	* @throws \phpbb\boardrules\exception\base
	*/
	public function import($data);

	/**
	* Insert the rule for the first time
	*
	* Will throw an exception if the rule was already inserted (call save() instead)
	*
	* @param int $language The language identifier
	* @param int $left_id The left id for the tree
	* @param int $right_id The right id for the tree
	* @return rule_interface $this
	* @access public
	* @throws \phpbb\boardrules\exception\base
	*/
	public function insert($language = 0, $left_id = 0, $right_id = 0);

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
	* @param bool $censor_text True to censor the text (Default: true)
	* @return string
	* @access public
	*/
	public function get_message_for_display($censor_text = true);

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
	* Check if bbcode is enabled on the message
	*
	* @return bool
	* @access public
	*/
	public function message_bbcode_enabled();

	/**
	* Enable bbcode on the message
	*
	* @return null
	* @access public
	*/
	public function message_enable_bbcode();

	/**
	* Disable bbcode on the message
	*
	* @return null
	* @access public
	*/
	public function message_disable_bbcode();

	/**
	* Check if magic_url is enabled on the message
	*
	* @return bool
	* @access public
	*/
	public function message_magic_url_enabled();

	/**
	* Enable magic url on the message
	*
	* @return null
	* @access public
	*/
	public function message_enable_magic_url();

	/**
	* Disable magic url on the message
	*
	* @return null
	* @access public
	*/
	public function message_disable_magic_url();

	/**
	* Check if smilies are enabled on the message
	*
	* @return bool
	* @access public
	*/
	public function message_smilies_enabled();

	/**
	* Enable smilies on the message
	*
	* @return null
	* @access public
	*/
	public function message_enable_smilies();

	/**
	* Disable smilies on the message
	*
	* @return null
	* @access public
	*/
	public function message_disable_smilies();

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
