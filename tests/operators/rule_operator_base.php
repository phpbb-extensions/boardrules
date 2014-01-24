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
	/**
	* Get the rule operator
	*
	* @return \phpbb\boardrules\operators\rule
	* @access protected
	*/
	protected function get_rule_operator()
	{
		return new \phpbb\boardrules\operators\rule(\phpbb\db\driver\driver $db, \phpbb\boardrules\operators\nestedset_rules $nestedset_rules, $boardrules_table);
	}

	public function getDataSet()
	{
		return $this->createXMLDataSet(dirname(__FILE__) . '/fixtures/rule.xml');
	}

	public function setUp()
	{
		parent::setUp();

		$this->db = $this->new_dbal();
	}
}
