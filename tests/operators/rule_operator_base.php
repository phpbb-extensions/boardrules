<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\tests\operators;

/**
* Base rule operator test (helper)
*/
class rule_operator_base extends \phpbb_database_test_case
{
	/**
	* Define the extensions to be tested
	*
	* @return array vendor/name of extension(s) to test
	* @access static
	*/
	static protected function setup_extensions()
	{
		return array('phpbb/boardrules');
	}

	protected $config, $container, $db, $entity, $nestedset_rules;

	public function getDataSet()
	{
		return $this->createXMLDataSet(dirname(__FILE__) . '/fixtures/rule.xml');
	}

	public function setUp()
	{
		parent::setUp();

		$this->db = $this->new_dbal();
		$db = $this->db;

		// mock container for the entity service
		$this->container = $this->getMock('\Symfony\Component\DependencyInjection\ContainerInterface');
		$this->container->expects($this->any())
			->method('get')
			->with('phpbb.boardrules.entity')
			->will($this->returnCallback(function() use ($db) {
				return new \phpbb\boardrules\entity\rule($db, 'phpbb_boardrules');
			}));

		$this->config = new \phpbb\config\config(array('nestedset_rules_lock' => 0));
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
		return new \phpbb\boardrules\operators\rule($this->container, $this->nestedset_rules);
	}
}
