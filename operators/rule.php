<?php
/**
*
* @package Board Rules Extension
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\operators;

/**
* Operator for a a set of rules
*/
class rule implements rule_interface
{
	/** @var \phpbb\db\driver\driver */
	protected $db;

	/**
	* Entity for a single rule
	*
	* @var \phpbb\boardrules\entity\rule
	*/
	protected $entity;

	/**
	* Nestedset for board rules
	*
	* @var \phpbb\boardrules\operators\nestedset_rules
	*/
	protected $nestedset_rules;

	/**
	* The database table the rules are stored in
	*
	* @var string
	*/
	protected $boardrules_table;

	/**
	* Constructor
	*
	* @param \phpbb\db\driver\driver $db Database object
	* @param \phpbb\boardrules\entity\rule $entity Entity object for a single rule
	* @param \phpbb\boardrules\operators\nestedset_rules $nestedset_rules Nestedset object for tree functionality
	* @param string $boardrules_table The database table the rules are stored in
	* @return \phpbb\boardrules\operators\rule
	* @access public
	*/
	public function __construct(\phpbb\db\driver\driver $db, \phpbb\boardrules\entity\rule $entity, \phpbb\boardrules\operators\nestedset_rules $nestedset_rules, $boardrules_table)
	{
		$this->db = $db;
		$this->entity = $entity;
		$this->nestedset_rules = $nestedset_rules;
		$this->boardrules_table = $boardrules_table;
	}

	/**
	* Get the rules
	*
	* @param int $language Language selection identifier; default: 0
	* @param int $parent_id Category to display rules from; default: 0
	* @return array Array of all rules data from the database
	* @access public
	*/
	public function get_rules($language = 0, $parent_id = 0)
	{
		$rule_data = array();

		$rowset = $this->nestedset_rules
			->use_language($language)
			->get_rules_data($parent_id);

		foreach ($rowset as $row)
		{
			$rule_data[] = $this->entity->import($row);
		}

		return $rule_data;
	}

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
	public function add_rule($language = 0, $parent_id = 0, $rule_data)
	{
		// If no rule data was sent to us, throw an exception
		if (empty($rule_data))
		{
			throw new \phpbb\boardrules\exception\base('MISSING_DATA');
		}

		// Add language id to the rule_data array
		$rule_data['rule_language'] = $language;

		// insert the rule_data into the database
		$rule_data_inserted = $this->nestedset_rules->insert($rule_data);

		// Non-categories need to have a parent id
		if ($rule_data_inserted['rule_parent_id'] !== $parent_id)
		{
			$this->nestedset_rules->change_parent($rule_data_inserted['rule_id'], $parent_id);
		}

		return $rule_data_inserted;
	}

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
	public function edit_rule($rule_id, $rule_data)
	{
		$rule_id = (int) $rule_id;
		if (!$rule_id)
		{
			throw new \phpbb\boardrules\exception\runtime('INVALID_ITEM');
		}

		// If no rule data was sent to us, throw an exception
		if (empty($rule_data))
		{
			throw new \phpbb\boardrules\exception\runtime('MISSING_DATA');
		}

		$sql = 'UPDATE ' . $this->boardrules_table . '
			SET ' . $this->db->sql_build_array('UPDATE', $rule_data) . '
			WHERE ' . $this->db->sql_in_set('rule_id', $rule_id);
		$this->db->sql_query($sql);

		$rule_data_edited = $this->nestedset_rules->get_subtree_data($rule_id);

		return $this->entity->import($rule_data_edited[$rule_id]);
	}

	/**
	* Delete a rule
	*
	* @param int $rule_id The rule identifier to delete
	* @return null
	* @access public
	* @throws \phpbb\boardrules\exception\out_of_bounds
	*/
	public function delete_rule($rule_id)
	{
		$rule_id = (int) $rule_id;
		if (!$rule_id)
		{
			throw new \phpbb\boardrules\exception\out_of_bounds(array('rule_id', 'INVALID_ITEM'));
		}

		$this->nestedset_rules->delete($rule_id);
	}

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
	public function move($rule_id, $direction = 'up', $amount = 1)
	{
		$rule_id = (int) $rule_id;
		if (!$rule_id)
		{
			throw new \phpbb\boardrules\exception\out_of_bounds(array('rule_id', 'INVALID_ITEM'));
		}

		$this->nestedset_rules->move($rule_id, (($direction != 'up') ? -$amount : $amount));
	}
}
