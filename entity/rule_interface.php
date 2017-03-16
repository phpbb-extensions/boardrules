<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2013 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
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
	* @return rule_interface $this object for chaining calls; load()->set()->save()
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
	* @return rule_interface $this object for chaining calls; load()->set()->save()
	* @access public
	* @throws \phpbb\boardrules\exception\base
	*/
	public function import($data);

	/**
	* Insert the rule for the first time
	*
	* Will throw an exception if the rule was already inserted (call save() instead)
	*
	* @param string $language The language iso
	* @return rule_interface $this object for chaining calls; load()->set()->save()
	* @access public
	* @throws \phpbb\boardrules\exception\out_of_bounds
	*/
	public function insert($language);

	/**
	* Save the current settings to the database
	*
	* This must be called before closing or any changes will not be saved!
	* If adding a rule (saving for the first time), you must call insert() or an exception will be thrown
	*
	* @return rule_interface $this object for chaining calls; load()->set()->save()
	* @access public
	* @throws \phpbb\boardrules\exception\out_of_bounds
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
	* Get title
	*
	* @return string Title
	* @access public
	*/
	public function get_title();

	/**
	* Set title
	*
	* @param string $title
	* @return rule_interface $this object for chaining calls; load()->set()->save()
	* @access public
	* @throws \phpbb\boardrules\exception\unexpected_value
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
	* @return rule_interface $this object for chaining calls; load()->set()->save()
	* @access public
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
	* @return rule_interface $this object for chaining calls; load()->set()->save()
	* @access public
	*/
	public function message_enable_bbcode();

	/**
	* Disable bbcode on the message
	*
	* @return rule_interface $this object for chaining calls; load()->set()->save()
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
	* @return rule_interface $this object for chaining calls; load()->set()->save()
	* @access public
	*/
	public function message_enable_magic_url();

	/**
	* Disable magic url on the message
	*
	* @return rule_interface $this object for chaining calls; load()->set()->save()
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
	* @return rule_interface $this object for chaining calls; load()->set()->save()
	* @access public
	*/
	public function message_enable_smilies();

	/**
	* Disable smilies on the message
	*
	* @return rule_interface $this object for chaining calls; load()->set()->save()
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
	* @return rule_interface $this object for chaining calls; load()->set()->save()
	* @access public
	* @throws \phpbb\boardrules\exception\unexpected_value
	*/
	public function set_anchor($anchor);

	/**
	* Get the language iso
	*
	* @return string language iso
	* @access public
	*/
	public function get_language();

	/**
	 * Set the language iso
	 *
	 * @param string $language language iso
	 * @return rule_interface $this object for chaining calls; load()->set()->save()
	 * @access public
	 */
	public function set_language($language);

	/**
	* Get the parent identifier
	*
	* @return int parent identifier
	* @access public
	*/
	public function get_parent_id();

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
	* @return int right identifier
	* @access public
	*/
	public function get_right_id();
}
