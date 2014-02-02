<?php
/**
*
* @package Board Rules Extension
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\operators;

/**
* Interface for our rule operator
*
* This describes all of the methods we'll have for working with a set of rules
*/
interface rule_interface
{
	/**
	* Get the rules
	*
	* @param int $language Language selection identifier; default: 0
	* @param int $parent_id Category to display rules from; default: 0
	* @return array Array of rule_interface
	* @access public
	* @throws \phpbb\boardrules\exception\out_of_bounds
	*/
	public function get_rules($language = 0, $parent_id = 0);

	/**
	* Add a rule
	*
	* @param int $language Language selection identifier; default: 0
	* @param int $parent_id Category to display rules from; default: 0
	* @param array $rule_data Rule data to add
	* 								rule_anchor
	* 								rule_title
	* 								rule_message
	* @return rule_interface Added rule entity
	* @access public
	* @throws \phpbb\boardrules\exception\base
	*/
	public function add_rule($language = 0, $parent_id = 0, $rule_data);

	/**
	* Edit a rule
	*
	* @param int $rule_id The rule identifier to edit
	* @param array $rule_data Rule data to edit
	* 								rule_anchor
	* 								rule_title
	* 								rule_message
	* @return rule_interface Edited rule entity
	* @access public
	* @throws \phpbb\boardrules\exception\runtime
	*/
	public function edit_rule($rule_id, $rule_data);

	/**
	* Delete a rule
	*
	* @param int $rule_id The rule identifier to delete
	* @return null
	* @access public
	* @throws \phpbb\boardrules\exception\base
	*/
	public function delete_rule($rule_id);

	/**
	* Move a rule up/down
	*
	* @param int $rule_id The rule identifier to move
	* @param string $direction The direction (up|down)
	* @param int $amount The number of places to move the rule
	* @return null
	* @access public
	* @throws \phpbb\boardrules\exception\base
	*/
	public function move($rule_id, $direction, $amount = 1);
}
