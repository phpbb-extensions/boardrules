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
	*/
	static protected function setup_extensions()
	{
		return array('phpbb/boardrules');
	}

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \PHPUnit_Framework_MockObject_MockObject|\Symfony\Component\DependencyInjection\ContainerInterface */
	protected $container;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\boardrules\operators\nestedset_rules */
	protected $nestedset_rules;

	public function getDataSet()
	{
		return $this->createXMLDataSet(__DIR__ . '/fixtures/rule.xml');
	}

	public function setUp()
	{
		parent::setUp();

		global $config;

		$this->db = $this->new_dbal();
		$db = $this->db;

		// mock container for the entity service
		$this->container = $this->getMockBuilder('\Symfony\Component\DependencyInjection\ContainerInterface')
			->getMock();
		$this->container->expects($this->any())
			->method('get')
			->with('phpbb.boardrules.entity')
			->will($this->returnCallback(function() use ($db) {
				return new \phpbb\boardrules\entity\rule($db, 'phpbb_boardrules');
			}));

		$config = $this->config = new \phpbb\config\config(array('nestedset_rules_lock' => 0));

		$lock = new \phpbb\lock\db('nestedset_rules_lock', $this->config, $this->db);
		$this->nestedset_rules = new \phpbb\boardrules\operators\nestedset_rules($this->db, $lock, 'phpbb_boardrules');
	}

	/**
	* Get the rule operator
	*
	* @return \phpbb\boardrules\operators\rule
	*/
	protected function get_rule_operator()
	{
		return new \phpbb\boardrules\operators\rule($this->container, $this->nestedset_rules);
	}
}
