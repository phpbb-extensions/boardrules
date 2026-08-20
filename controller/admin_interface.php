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

/**
* Interface for our admin controller
*
* This describes all of the methods we'll use for the admin front-end of this extension
*/
interface admin_interface
{
	/**
	* Display the options a user can configure for this extension
	*
	* @return void
	* @access public
	*/
	public function display_options();

	/**
	* Display the language dashboard
	*
	* @return void
	* @access public
	*/
	public function display_language_dashboard();

	/**
	 * Display and process the complete ruleset copy form.
	 *
	 * @param string $target_language
	 * @param string $return_to Return destination context
	 * @return void
	 */
	public function copy_ruleset($target_language, $return_to = '');

	/**
	 * Publish or return a language ruleset to draft.
	 *
	 * @param string $language
	 * @param bool $published
	 * @param string $return_to Return destination context
	 * @return void
	 */
	public function set_ruleset_published($language, $published, $return_to = '');

	/**
	* Display the rules
	*
	* @param string $language Language selection iso
	* @param int $parent_id Category to display rules from; default: 0
	* @return void
	* @access public
	*/
	public function display_rules($language, $parent_id = 0);

	/**
	* Add a rule
	*
	* @param string $language Language selection iso
	* @param int $parent_id Category to display rules from; default: 0
	* @return void
	* @access public
	*/
	public function add_rule($language, $parent_id = 0);

	/**
	* Edit a rule
	*
	* @param int $rule_id The rule identifier to edit
	* @return void
	* @access public
	*/
	public function edit_rule($rule_id);

	/**
	* Delete a rule
	*
	* @param int $rule_id The rule identifier to delete
	* @return void
	* @access public
	*/
	public function delete_rule($rule_id);

	/**
	* Move a rule up/down
	*
	* @param int $rule_id The rule identifier to move
	* @param string $direction The direction (up|down)
	* @param int $amount The number of places to move the rule
	* @return void
	* @access public
	*/
	public function move_rule($rule_id, $direction, $amount = 1);

	/**
	* Send notification to users
	*
	* @param int $rule_id The rule identifier
	* @return void
	* @access public
	*/
	public function send_notification($rule_id);

	/**
	* Set page url
	*
	* @param string $u_action Custom form action
	* @return void
	* @access public
	*/
	public function set_page_url($u_action);
}
