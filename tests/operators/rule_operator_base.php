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
	protected $container, $db, $entity, $nestedset_rules;

	public function getDataSet()
	{
		return $this->createXMLDataSet(dirname(__FILE__) . '/fixtures/rule.xml');
	}

	public function setUp()
	{
		parent::setUp();

		$this->db = $this->new_dbal();

		global $config, $phpbb_container;

		$phpbb_container = $this->container = new phpbb_mock_container_builder();

		$config = $this->config = new \phpbb\config\config(array('nestedset_rules_lock' => 0));
		set_config(null, null, null, $this->config);

		$this->lock = new \phpbb\lock\db('nestedset_rules_lock', $this->config, $this->db);
		$this->nestedset_rules = new \phpbb\boardrules\operators\nestedset_rules($this->db, $this->lock, 'phpbb_boardrules');
	}

	/**
	* Get the rule operator
	*
	* @return \phpbb\boardrules\operators\rule
	* @access protected
	*/
	protected function get_rule_operator()
	{
		return new \phpbb\boardrules\operators\rule($this->container, $this->db, $this->nestedset_rules, 'phpbb_boardrules');
	}
}
