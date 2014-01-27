<?php
/**
*
* @package testing
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\tests\operators;

/**
* Base rule operator test (helper)
*/
class rule_operator_base extends \phpbb_database_test_case
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

	public function getDataSet()
	{
		return $this->createXMLDataSet(dirname(__FILE__) . '/fixtures/rule.xml');
	}

	public function setUp()
	{
		parent::setUp();

		$this->db = $this->new_dbal();

		global $config;

		$config = $this->config = new \phpbb\config\config(array('nestedset_rules_lock' => 0));
		set_config(null, null, null, $this->config);

		$this->lock = new \phpbb\lock\db('nestedset_rules_lock', $this->config, $this->db);
		$this->nestedset_rules = new \phpbb\boardrules\operators\nestedset_rules($this->db, $this->lock, 'phpbb_boardrules');

		$this->entity = new \phpbb\boardrules\entity\rule($this->db, 'phpbb_boardrules');
	}

	/**
	* Get the rule operator
	*
	* @return \phpbb\boardrules\operators\rule
	* @access protected
	*/
	protected function get_rule_operator()
	{
		return new \phpbb\boardrules\operators\rule($this->db, $this->entity, $this->nestedset_rules, 'phpbb_boardrules');
	}

}
