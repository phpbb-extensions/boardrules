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

class rule_operator_delete_rule_test extends rule_operator_base
{
	/**
	* Test data for the test_delete_rule() function
	*
	* @return array Array of test data
	* @access public
	*/
	public function delete_rule_test_data()
	{
		return array(
			array(
				1, // Delete item 1
				array(
					array('rule_id' => 2, 'rule_left_id' => 1, 'rule_right_id' => 2, 'rule_parent_id' => 0),
					array('rule_id' => 3, 'rule_left_id' => 3, 'rule_right_id' => 4, 'rule_parent_id' => 0),
					array('rule_id' => 4, 'rule_left_id' => 5, 'rule_right_id' => 8, 'rule_parent_id' => 0),
					array('rule_id' => 5, 'rule_left_id' => 6, 'rule_right_id' => 7, 'rule_parent_id' => 4),
				),
			),
			array(
				2, // Delete item 2
				array(
					array('rule_id' => 1, 'rule_left_id' => 1, 'rule_right_id' => 2, 'rule_parent_id' => 0),
					array('rule_id' => 3, 'rule_left_id' => 3, 'rule_right_id' => 4, 'rule_parent_id' => 0),
					array('rule_id' => 4, 'rule_left_id' => 5, 'rule_right_id' => 8, 'rule_parent_id' => 0),
					array('rule_id' => 5, 'rule_left_id' => 6, 'rule_right_id' => 7, 'rule_parent_id' => 4),
				),
			),
			array(
				3, // Delete item 3
				array(
					array('rule_id' => 1, 'rule_left_id' => 1, 'rule_right_id' => 2, 'rule_parent_id' => 0),
					array('rule_id' => 2, 'rule_left_id' => 3, 'rule_right_id' => 4, 'rule_parent_id' => 0),
					array('rule_id' => 4, 'rule_left_id' => 5, 'rule_right_id' => 8, 'rule_parent_id' => 0),
					array('rule_id' => 5, 'rule_left_id' => 6, 'rule_right_id' => 7, 'rule_parent_id' => 4),
				),
			),
			array(
				4, // Delete item 4 (also deletes its nested child, item 5)
				array(
					array('rule_id' => 1, 'rule_left_id' => 1, 'rule_right_id' => 2, 'rule_parent_id' => 0),
					array('rule_id' => 2, 'rule_left_id' => 3, 'rule_right_id' => 4, 'rule_parent_id' => 0),
					array('rule_id' => 3, 'rule_left_id' => 5, 'rule_right_id' => 6, 'rule_parent_id' => 0),
				),
			),
			array(
				5, // Delete item 5
				array(
					array('rule_id' => 1, 'rule_left_id' => 1, 'rule_right_id' => 2, 'rule_parent_id' => 0),
					array('rule_id' => 2, 'rule_left_id' => 3, 'rule_right_id' => 4, 'rule_parent_id' => 0),
					array('rule_id' => 3, 'rule_left_id' => 5, 'rule_right_id' => 6, 'rule_parent_id' => 0),
					array('rule_id' => 4, 'rule_left_id' => 7, 'rule_right_id' => 8, 'rule_parent_id' => 0),
				),
			),
		);
	}

	/**
	* Test deleting rules
	*
	* @dataProvider delete_rule_test_data
	* @access public
	*/
	public function test_delete_rule($rule_id, $expected)
	{
		// Setup the operator class
		$operator = $this->get_rule_operator();

		$operator->delete_rule($rule_id);

		$result = $this->db->sql_query('SELECT rule_id, rule_left_id, rule_right_id, rule_parent_id
			FROM phpbb_boardrules
			ORDER BY rule_id ASC');

		$this->assertEquals($expected, $this->db->sql_fetchrowset($result));
	}

	/**
	* Test data for the test_delete_rules_fails() function
	*
	* @return array Array of test data
	* @access public
	*/
	public function delete_rule_fails_data()
	{
		return array(
			array(10),
		);
	}

	/**
	* Test deleting non-existent rules which should throw an exception
	*
	* @dataProvider delete_rule_fails_data
	* @expectedException \phpbb\boardrules\exception\base
	* @access public
	*/
	public function test_delete_rules_fails($rule_id)
	{
		// Setup the operator class
		$operator = $this->get_rule_operator();

		$operator->delete_rule($rule_id);
	}
}
