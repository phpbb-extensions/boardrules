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
	 * Create an empty rule entity.
	 *
	 * @return \phpbb\boardrules\entity\rule_interface
	 */
	public function create_rule();

	/**
	 * Get one rule by identifier.
	 *
	 * @param int $rule_id Rule identifier
	 * @return \phpbb\boardrules\entity\rule_interface
	 * @throws \OutOfBoundsException If the rule is missing
	 * @throws \InvalidArgumentException If stored rule data is invalid
	 */
	public function get_rule($rule_id);

	/**
	* Get the rules
	*
	* @param string $language Language selection iso
	* @param int $parent_id Category to display rules from; default: 0
	* @return \phpbb\boardrules\entity\rule_interface[] Rule entities
	* @access public
	* @throws \InvalidArgumentException If stored rule data is invalid
	*/
	public function get_rules($language, $parent_id = 0);

	/**
	* Add a rule
	*
	* @param \phpbb\boardrules\entity\rule_interface $entity Rule entity with new data to insert
	* @param string $language Language selection iso
	* @param int $parent_id Category to display rules from; default: 0
	* @return \phpbb\boardrules\entity\rule_interface Added rule entity
	* @access public
	* @throws \InvalidArgumentException If language or stored rule data is invalid
	* @throws \LogicException If the entity was already inserted
	* @throws \RuntimeException If the nested-set lock cannot be acquired
	* @throws \OutOfBoundsException If the parent is invalid
	*/
	public function add_rule($entity, $language, $parent_id = 0);

	/**
	 * Persist changes to an existing rule.
	 *
	 * @param \phpbb\boardrules\entity\rule_interface $entity Rule entity
	 * @return \phpbb\boardrules\entity\rule_interface Persisted rule entity
	 * @throws \LogicException If the entity has not been inserted
	 * @throws \OutOfBoundsException If the persisted rule is missing
	 * @throws \InvalidArgumentException If persisted data is invalid
	 */
	public function save_rule($entity);

	/**
	* Delete a rule
	*
	* @param int $rule_id The rule identifier to delete
	* @return void
	* @access public
	* @throws \RuntimeException If the nested-set lock cannot be acquired
	* @throws \OutOfBoundsException If the rule is missing
	*/
	public function delete_rule($rule_id);

	/**
	* Move a rule up/down
	*
	* @param int $rule_id The rule identifier to move
	* @param string $direction The direction (up|down)
	* @param int $amount The number of places to move the rule
	* @return bool True if the rule moved, false if it was already at the boundary
	* @access public
	* @throws \RuntimeException If the nested-set lock cannot be acquired
	* @throws \OutOfBoundsException If the rule is missing
	*/
	public function move($rule_id, $direction, $amount = 1);

	/**
	* Change rule parent
	*
	* @param int $rule_id The current rule identifier
	* @param int $new_parent_id The new rule parent identifier
	* @return void
	* @access public
	* @throws \RuntimeException If the nested-set lock cannot be acquired
	* @throws \OutOfBoundsException If either rule is missing or parent is invalid
	*/
	public function change_parent($rule_id, $new_parent_id);

	/**
	* Get a rule's parent rules (for use in breadcrumbs)
	*
	* @param string $language Language selection iso
	* @param int $parent_id Category to display rules from
	* @return \phpbb\boardrules\entity\rule_interface[] Parent rule entities
	* @access public
	* @throws \InvalidArgumentException If stored rule data is invalid
	*/
	public function get_rule_parents($language, $parent_id);
}
