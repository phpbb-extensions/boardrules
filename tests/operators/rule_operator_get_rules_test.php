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

class rule_operator_get_rules_test extends rule_operator_base
{
	/**
	* Test data for the test_get_rules() function
	*
	* @return array Array of test rule entities
	* @access public
	*/
	public function get_rules_test_data()
	{
		return array(
			// language id to search, data which should match
			array(
				1,
				array(
					array(
						'rule_id' => 1,
						'rule_language' => 1,
						'rule_left_id' => 1,
						'rule_right_id' => 2,
						'rule_parent_id' => 0,
						'rule_anchor' => 'anchor_1',
						'rule_title' => 'title_1',
					),
					array(
						'rule_id' => 2,
						'rule_language' => 1,
						'rule_left_id' => 3,
						'rule_right_id' => 4,
						'rule_parent_id' => 0,
						'rule_anchor' => 'anchor_2',
						'rule_title' => 'title_2',
					),
					array(
						'rule_id' => 3,
						'rule_language' => 1,
						'rule_left_id' => 5,
						'rule_right_id' => 6,
						'rule_parent_id' => 0,
						'rule_anchor' => 'anchor_3',
						'rule_title' => 'title_3',
					),
					array(
						'rule_id' => 4,
						'rule_language' => 1,
						'rule_left_id' => 7,
						'rule_right_id' => 10,
						'rule_parent_id' => 0,
						'rule_anchor' => 'anchor_4',
						'rule_title' => 'title_4',
					),
					array(
						'rule_id' => 5,
						'rule_language' => 1,
						'rule_left_id' => 8,
						'rule_right_id' => 9,
						'rule_parent_id' => 4,
						'rule_anchor' => 'anchor_5',
						'rule_title' => 'title_5',
					),
				),
			),
		);
	}

	/**
	* Test getting rules from the database
	*
	* @dataProvider get_rules_test_data
	* @access public
	*/
	public function test_get_rules($language, $expected)
	{
		// Setup the operator class
		$operator = $this->get_rule_operator();

		// Grab the rule data as an array of entities
		$entities = $operator->get_rules($language);

		// Map the fields to the getters
		$map = array(
			'rule_id'		=> 'get_id',
			'rule_language'	=> 'get_language',
			'rule_left_id'	=> 'get_left_id',
			'rule_right_id'	=> 'get_right_id',
			'rule_parent_id'=> 'get_parent_id',
			'rule_anchor'	=> 'get_anchor',
			'rule_title'	=> 'get_title',
		);

		// Test through each entity in the array of entities
		$i = 0;
		foreach ($entities as $entity)
		{
			// Go through each field in the data and make sure the function returns
			// what we saved
			foreach ($map as $field => $function)
			{
				$this->assertEquals($expected[$i][$field], $entity->$function());
			}

			$i++;
		}
	}

	/**
	* Test data for the test_get_rules_fails() function
	*
	* @return array Array of test data
	* @access public
	*/
	public function get_rules_fails_test_data()
	{
		return array(
			// language to search, expected result (empty array)
			array(0, array()),
			array(4, array()),
		);
	}

	/**
	* Test getting (non-existant) rules from the database
	*
	* @dataProvider get_rules_fails_test_data
	* @access public
	*/
	public function test_get_rules_fails($language, $expected)
	{
		// Setup the operator class
		$operator = $this->get_rule_operator();

		// Get the rule data
		$result = $operator->get_rules($language);

		// Assert that the result matches what is expected
		$this->assertEquals($expected, $result);
	}
}
