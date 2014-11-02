<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2013 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
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
	* @return array Array of rule data entities
	* @access public
	*/
	public function get_rules($language = 0, $parent_id = 0);

	/**
	* Add a rule
	*
	* @param object $entity Rule entity with new data to insert
	* @param int $language Language selection identifier; default: 0
	* @param int $parent_id Category to display rules from; default: 0
	* @return rule_interface Added rule entity
	* @access public
	*/
	public function add_rule($entity, $language = 0, $parent_id = 0);

	/**
	* Delete a rule
	*
	* @param int $rule_id The rule identifier to delete
	* @return null
	* @access public
	* @throws \phpbb\boardrules\exception\out_of_bounds
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
	* @throws \phpbb\boardrules\exception\out_of_bounds
	*/
	public function move($rule_id, $direction, $amount = 1);

	/**
	* Change rule parent
	*
	* @param int $rule_id The current rule identifier
	* @param int $new_parent_id The new rule parent identifier
	* @return null
	* @access public
	* @throws \phpbb\boardrules\exception\out_of_bounds
	*/
	public function change_parent($rule_id, $new_parent_id);

	/**
	* Get a rule's parent rules (for use in breadcrumbs)
	*
	* @param int $language Language selection identifier
	* @param int $parent_id Category to display rules from
	* @return array Array of rule data for a rule's parent rules
	* @access public
	*/
	public function get_rule_parents($language, $parent_id);
}
