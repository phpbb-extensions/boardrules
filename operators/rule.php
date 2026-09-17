<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\operators;

/**
* Operator for a set of rules
*/
class rule implements rule_interface
{
	/** @var \phpbb\boardrules\entity\factory */
	protected $entity_factory;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var string */
	protected $boardrules_table;

	/**
	* Nestedset for board rules
	*
	* @var \phpbb\boardrules\operators\nestedset_rules
	*/
	protected $nestedset_rules;

	/** @var \phpbb\boardrules\operators\ruleset_interface */
	protected $ruleset_operator;

	/** @var \phpbb\lock\db */
	protected $lock;

	/**
	* Constructor
	*
	* @param \phpbb\boardrules\entity\factory $entity_factory Rule entity factory
	* @param \phpbb\db\driver\driver_interface $db Database connection
	* @param \phpbb\boardrules\operators\nestedset_rules $nestedset_rules Nestedset object for tree functionality
	* @param \phpbb\boardrules\operators\ruleset_interface $ruleset_operator Ruleset operator object
	* @param \phpbb\lock\db $lock Shared Board Rules tree lock
	* @param string $boardrules_table Board Rules table name
	* @access public
	*/
	public function __construct(\phpbb\boardrules\entity\factory $entity_factory, \phpbb\db\driver\driver_interface $db, \phpbb\boardrules\operators\nestedset_rules $nestedset_rules, \phpbb\boardrules\operators\ruleset_interface $ruleset_operator, \phpbb\lock\db $lock, $boardrules_table)
	{
		$this->entity_factory = $entity_factory;
		$this->db = $db;
		$this->nestedset_rules = $nestedset_rules;
		$this->ruleset_operator = $ruleset_operator;
		$this->lock = $lock;
		$this->boardrules_table = $boardrules_table;
	}

	/**
	 * Create an empty rule entity.
	 *
	 * @return \phpbb\boardrules\entity\rule_interface
	 */
	public function create_rule()
	{
		return $this->entity_factory->create();
	}

	/**
	 * Get one rule by identifier.
	 *
	 * @param int $rule_id Rule identifier
	 * @return \phpbb\boardrules\entity\rule_interface
	 * @throws \phpbb\boardrules\exception\base If the rule is missing or stored data is invalid
	 */
	public function get_rule($rule_id)
	{
		$sql = 'SELECT *
			FROM ' . $this->boardrules_table . '
			WHERE rule_id = ' . (int) $rule_id;
		$result = $this->db->sql_query($sql);
		$row = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		if ($row === false)
		{
			throw new \phpbb\boardrules\exception\out_of_bounds('rule_id');
		}

		return $this->create_rule()->import($row);
	}

	/**
	* Get the rules
	*
	* @param string $language Language selection iso
	* @param int $parent_id Category to display rules from; default: 0
	* @return \phpbb\boardrules\entity\rule_interface[] Rule entities
	* @access public
	* @throws \phpbb\boardrules\exception\base If stored rule data is invalid
	*/
	public function get_rules($language, $parent_id = 0)
	{
		$entities = array();

		// Load all rule data from the database into an array
		$rowset = $this->nestedset_rules
			->use_language($language)
			->get_rules_data($parent_id);

		// Import each rule into an entity, and store them in an array
		foreach ($rowset as $row)
		{
			$entities[] = $this->create_rule()->import($row);
		}

		// Return all rule entities
		return $entities;
	}

	/**
	* Add a rule
	*
	* @param \phpbb\boardrules\entity\rule_interface $entity Rule entity with new data to insert
	* @param string $language Language selection iso
	* @param int $parent_id Category to display rules from; default: 0
	* @return \phpbb\boardrules\entity\rule_interface Added rule entity
	* @access public
	* @throws \InvalidArgumentException If the language is not installed
	* @throws \RuntimeException If the nested-set lock cannot be acquired
	* @throws \phpbb\boardrules\exception\base If the entity or stored data is invalid
	*/
	public function add_rule($entity, $language, $parent_id = 0)
	{
		if ($entity->get_id())
		{
			throw new \phpbb\boardrules\exception\out_of_bounds('rule_id');
		}

		if (!$this->lock->acquire())
		{
			throw new \RuntimeException('RULES_NESTEDSET_LOCK_FAILED_ACQUIRE');
		}

		try
		{
			if ($parent_id && $this->get_rule_language($parent_id) !== (string) $language)
			{
				throw new \phpbb\boardrules\exception\out_of_bounds('new_parent_id');
			}

			// An empty ruleset must enter draft before its first rule is visible.
			$this->ruleset_operator->draft_if_empty($language);

			$data = array_diff_key($entity->get_data(), array('rule_id' => null));
			$data['rule_parent_id'] = 0;
			$data['rule_left_id'] = 0;
			$data['rule_right_id'] = 0;
			$data['rule_parents'] = '';
			$data['rule_language'] = (string) $language;

			$sql = 'INSERT INTO ' . $this->boardrules_table . ' ' . $this->db->sql_build_array('INSERT', $data);
			$this->db->sql_query($sql);
			$rule_id = (int) $this->db->sql_last_inserted_id();

			// Update the tree for the rule in the database
			$this->nestedset_rules
				->use_language($language)
				->add_to_nestedset($rule_id);

			// If a parent id was supplied, update the rule's parent id and tree ids
			if ($parent_id)
			{
				$this->nestedset_rules->change_parent($rule_id, $parent_id);
			}

			return $this->get_rule($rule_id);
		}
		finally
		{
			$this->lock->release();
		}
	}

	/**
	 * Persist changes to an existing rule.
	 *
	 * @param \phpbb\boardrules\entity\rule_interface $entity Rule entity
	 * @return \phpbb\boardrules\entity\rule_interface Persisted rule entity
	 * @throws \phpbb\boardrules\exception\base If the entity is missing or persisted data is invalid
	 */
	public function save_rule($entity)
	{
		$rule_id = $entity->get_id();
		if (!$rule_id)
		{
			throw new \phpbb\boardrules\exception\out_of_bounds('rule_id');
		}

		$changes = array_diff_key($entity->get_changes(), array('rule_id' => null));
		if (!empty($changes))
		{
			$sql = 'UPDATE ' . $this->boardrules_table . '
				SET ' . $this->db->sql_build_array('UPDATE', $changes) . '
				WHERE rule_id = ' . $rule_id;
			$this->db->sql_query($sql);
		}

		return $this->get_rule($rule_id);
	}

	/**
	* Delete a rule
	*
	* @param int $rule_id The rule identifier to delete
	* @return void
	* @access public
	* @throws \RuntimeException If the nested-set lock cannot be acquired
	* @throws \phpbb\boardrules\exception\base If the rule is missing or stored data is invalid
	*/
	public function delete_rule($rule_id)
	{
		$rule_id = (int) $rule_id;

		// Try to delete the rule or category from the database
		try
		{
			$language = $this->get_rule_language($rule_id);
			$this->nestedset_rules
				->use_language($language)
				->delete($rule_id);
		}
		catch (\OutOfBoundsException $e)
		{
			throw new \phpbb\boardrules\exception\out_of_bounds('rule_id');
		}
	}

	/**
	* Move a rule up/down
	*
	* @param int $rule_id The rule identifier to move
	* @param string $direction The direction (up|down)
	* @param int $amount The number of places to move the rule
	* @return bool True if the rule moved, false if it was already at the boundary
	* @access public
	* @throws \RuntimeException If the nested-set lock cannot be acquired
	* @throws \phpbb\boardrules\exception\base If the rule is missing or stored data is invalid
	*/
	public function move($rule_id, $direction = 'up', $amount = 1)
	{
		$rule_id = (int) $rule_id;
		$amount = (int) $amount;

		// Try to move the rule or category up/down
		try
		{
			$language = $this->get_rule_language($rule_id);

			return $this->nestedset_rules
				->use_language($language)
				->move($rule_id, (($direction !== 'up') ? -$amount : $amount));
		}
		catch (\OutOfBoundsException $e)
		{
			throw new \phpbb\boardrules\exception\out_of_bounds('rule_id');
		}
	}

	/**
	* Change rule parent
	*
	* @param int $rule_id The current rule identifier
	* @param int $new_parent_id The new rule parent identifier
	* @return void
	* @access public
	* @throws \RuntimeException If the nested-set lock cannot be acquired
	* @throws \phpbb\boardrules\exception\base If either rule is missing or stored data is invalid
	*/
	public function change_parent($rule_id, $new_parent_id)
	{
		$rule_id = (int) $rule_id;
		$new_parent_id = (int) $new_parent_id;

		// Try to change rule parent
		try
		{
			$language = $this->get_rule_language($rule_id);
			if ($new_parent_id && $this->get_rule_language($new_parent_id) !== $language)
			{
				throw new \OutOfBoundsException('RULES_NESTEDSET_INVALID_PARENT');
			}

			$this->nestedset_rules
				->use_language($language)
				->change_parent($rule_id, $new_parent_id);
		}
		catch (\OutOfBoundsException $e)
		{
			$field = (strpos($e->getMessage(), 'INVALID_ITEM') !== false) ? 'rule_id' : 'new_parent_id';

			throw new \phpbb\boardrules\exception\out_of_bounds($field);
		}
	}

	/**
	* Get the language for a rule.
	*
	* @param int $rule_id Rule identifier
	* @return string Language ISO code
	* @throws \phpbb\boardrules\exception\base If the rule is missing or stored data is invalid
	*/
	protected function get_rule_language($rule_id)
	{
		return $this->get_rule($rule_id)->get_language();
	}

	/**
	* Get a rule's parent rules (for use in breadcrumbs)
	*
	* @param string $language Language selection iso
	* @param int $parent_id Category to display rules from
	* @return \phpbb\boardrules\entity\rule_interface[] Parent rule entities
	* @access public
	* @throws \phpbb\boardrules\exception\base If stored rule data is invalid
	*/
	public function get_rule_parents($language, $parent_id)
	{
		$entities = array();

		// Load all parent rule data from the database into an array
		$rowset = $this->nestedset_rules
			->use_language($language)
			->get_path_data($parent_id);

		// Import each rule into an entity, and store them in an array
		foreach ($rowset as $row)
		{
			$entities[] = $this->create_rule()->import($row);
		}
		return $entities;
	}
}
