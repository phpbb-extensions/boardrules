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

class rule_operator_change_parent_test extends rule_operator_base
{
	/**
	* Test data for the test_change_parent() function
	*
	* @return array Array of test data
	* @access public
	*/
	public function change_parent_test_data()
	{
		return array(
			array(
				1,
				2, // Change rule_1 parent from 0 to 2 (rule_2)
				array(
					array('rule_id' => 1, 'rule_parent_id' => 2),
					array('rule_id' => 2, 'rule_parent_id' => 0),
					array('rule_id' => 3, 'rule_parent_id' => 0),
					array('rule_id' => 4, 'rule_parent_id' => 0),
					array('rule_id' => 5, 'rule_parent_id' => 4),
				),
			),
			array(
				5,
				0, // Change rule_5 parent from 4 to 0 (no_parent)
				array(
					array('rule_id' => 1, 'rule_parent_id' => 0),
					array('rule_id' => 2, 'rule_parent_id' => 0),
					array('rule_id' => 3, 'rule_parent_id' => 0),
					array('rule_id' => 4, 'rule_parent_id' => 0),
					array('rule_id' => 5, 'rule_parent_id' => 0),
				),
			),
			array(
				4,
				3, // Change rule_4 parent from 0 to 3 (rule_3)
				array(
					array('rule_id' => 1, 'rule_parent_id' => 0),
					array('rule_id' => 2, 'rule_parent_id' => 0),
					array('rule_id' => 3, 'rule_parent_id' => 0),
					array('rule_id' => 4, 'rule_parent_id' => 3),
					array('rule_id' => 5, 'rule_parent_id' => 4),
				),
			),
		);
	}

	/**
	* Test changing parent identifier
	*
	* @dataProvider change_parent_test_data
	* @access public
	*/
	public function test_change_parent($rule_id, $new_parent_id, $expected)
	{
		// Setup the operator class
		$operator = $this->get_rule_operator();

		$operator->change_parent($rule_id, $new_parent_id);

		$result = $this->db->sql_query('SELECT rule_id, rule_parent_id
			FROM phpbb_boardrules
			ORDER BY rule_id ASC');

		$this->assertEquals($expected, $this->db->sql_fetchrowset($result));
	}

	/**
	* Test data for the test_change_parent_fails() function
	*
	* @return array Array of test data
	* @access public
	*/
	public function change_parent_fails_data()
	{
		return array(
			array(1, 100),
			array(100, 1),
			array(null, 1),
		);
	}

	/**
	* Test moving to non-existent rules which should throw an exception
	*
	* @dataProvider change_parent_fails_data
	* @expectedException \phpbb\boardrules\exception\base
	* @access public
	*/
	public function test_change_parent_fails($rule_id, $new_parent_id)
	{
		// Setup the operator class
		$operator = $this->get_rule_operator();

		$operator->change_parent($rule_id, $new_parent_id);
	}
}
