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

class rule_operator_move_test extends rule_operator_base
{
	/**
	* Test data for the test_move_rules() function
	*
	* @return array Array of test data
	*/
	public function move_rules_test_data()
	{
		return array(
			array(
				1,
				'up', // Move item 1 up (not expected to move)
				array(
					array('rule_id' => 1, 'rule_left_id' => 1),
					array('rule_id' => 2, 'rule_left_id' => 3),
					array('rule_id' => 3, 'rule_left_id' => 5),
					array('rule_id' => 4, 'rule_left_id' => 7),
					array('rule_id' => 5, 'rule_left_id' => 8),
				),
			),
			array(
				2,
				'up', // Move item 2 up
				array(
					array('rule_id' => 2, 'rule_left_id' => 1),
					array('rule_id' => 1, 'rule_left_id' => 3),
					array('rule_id' => 3, 'rule_left_id' => 5),
					array('rule_id' => 4, 'rule_left_id' => 7),
					array('rule_id' => 5, 'rule_left_id' => 8),
				),
			),
			array(
				3,
				'up', // Move item 3 up
				array(
					array('rule_id' => 1, 'rule_left_id' => 1),
					array('rule_id' => 3, 'rule_left_id' => 3),
					array('rule_id' => 2, 'rule_left_id' => 5),
					array('rule_id' => 4, 'rule_left_id' => 7),
					array('rule_id' => 5, 'rule_left_id' => 8),
				),
			),
			array(
				4,
				'up', // Move item 4 up (carries its child item 5 along)
				array(
					array('rule_id' => 1, 'rule_left_id' => 1),
					array('rule_id' => 2, 'rule_left_id' => 3),
					array('rule_id' => 4, 'rule_left_id' => 5),
					array('rule_id' => 5, 'rule_left_id' => 6),
					array('rule_id' => 3, 'rule_left_id' => 9),
				),
			),
			array(
				5,
				'up', // Move item 5 up (not expected to move because it's a child of item 4)
				array(
					array('rule_id' => 1, 'rule_left_id' => 1),
					array('rule_id' => 2, 'rule_left_id' => 3),
					array('rule_id' => 3, 'rule_left_id' => 5),
					array('rule_id' => 4, 'rule_left_id' => 7),
					array('rule_id' => 5, 'rule_left_id' => 8),
				),
			),
			array(
				1,
				'down', // Move item 1 down
				array(
					array('rule_id' => 2, 'rule_left_id' => 1),
					array('rule_id' => 1, 'rule_left_id' => 3),
					array('rule_id' => 3, 'rule_left_id' => 5),
					array('rule_id' => 4, 'rule_left_id' => 7),
					array('rule_id' => 5, 'rule_left_id' => 8),
				),
			),
			array(
				2,
				'down', // Move item 2 down
				array(
					array('rule_id' => 1, 'rule_left_id' => 1),
					array('rule_id' => 3, 'rule_left_id' => 3),
					array('rule_id' => 2, 'rule_left_id' => 5),
					array('rule_id' => 4, 'rule_left_id' => 7),
					array('rule_id' => 5, 'rule_left_id' => 8),
				),
			),
			array(
				3,
				'down', // Move item 3 down (moves past 4 and 5 which are nested)
				array(
					array('rule_id' => 1, 'rule_left_id' => 1),
					array('rule_id' => 2, 'rule_left_id' => 3),
					array('rule_id' => 4, 'rule_left_id' => 5),
					array('rule_id' => 5, 'rule_left_id' => 6),
					array('rule_id' => 3, 'rule_left_id' => 9),
				),
			),
			array(
				4,
				'down', // Move item 4 down (not expected to move)
				array(
					array('rule_id' => 1, 'rule_left_id' => 1),
					array('rule_id' => 2, 'rule_left_id' => 3),
					array('rule_id' => 3, 'rule_left_id' => 5),
					array('rule_id' => 4, 'rule_left_id' => 7),
					array('rule_id' => 5, 'rule_left_id' => 8),
				),
			),
			array(
				5,
				'down', // Move item 5 down (not expected to move because it's a child of item 4)
				array(
					array('rule_id' => 1, 'rule_left_id' => 1),
					array('rule_id' => 2, 'rule_left_id' => 3),
					array('rule_id' => 3, 'rule_left_id' => 5),
					array('rule_id' => 4, 'rule_left_id' => 7),
					array('rule_id' => 5, 'rule_left_id' => 8),
				),
			),
		);
	}

	/**
	* Test moving rules up and down
	*
	* @dataProvider move_rules_test_data
	*/
	public function test_move_rules($rule_id, $direction, $expected)
	{
		// Setup the operator class
		$operator = $this->get_rule_operator();

		$operator->move($rule_id, $direction);

		$result = $this->db->sql_query('SELECT rule_id, rule_left_id
			FROM phpbb_boardrules
			ORDER BY rule_left_id ASC');

		self::assertEquals($expected, $this->db->sql_fetchrowset($result));
		$this->db->sql_freeresult($result);
	}

	/**
	* Test data for the test_move_rules_fails() function
	*
	* @return array Array of test data
	*/
	public function move_rules_fails_data()
	{
		return array(
			array(10),
		);
	}

	/**
	* Test moving non-existent rules which should throw an exception
	*
	* @dataProvider move_rules_fails_data
	*/
	public function test_move_rules_fails($rule_id)
	{
		$this->expectException(\phpbb\boardrules\exception\base::class);

		// Setup the operator class
		$operator = $this->get_rule_operator();

		$operator->move($rule_id);
	}
}
