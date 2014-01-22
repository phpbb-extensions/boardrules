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
	* @param \phpbb\db\driver\driver    $db                 Database object
	* @param \phpbb\lock\db             $lock               Lock class used to lock the table when moving rules around
	* @param string                     $boardrules_table   Name of the table used to store board rules data
	* @return null
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
	* @throws \phpbb\boardrules\exception\out_of_bounds
	*/
	public function get_rules($language = 0, $parent_id = 0)
	{
		$data = array();

		$rowset = $this->nestedset_rules
			->use_language($language)
			->get_path_and_subtree_data($parent_id);

		foreach ($rowset as $row)
		{
			$data[] = $this->entity->import($row);
		}

		if (empty($data))
		{
			// Rules for the language do not exist
			throw new \phpbb\boardrules\exception\out_of_bounds('rule_language');
		}

		return $data;
	}

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
	public function move($rule_id, $direction = 'up', $amount = 1)
	{
		$this->nestedset_rules->move($rule_id, (($direction != 'up') ? -$amount : $amount));
	}

}
