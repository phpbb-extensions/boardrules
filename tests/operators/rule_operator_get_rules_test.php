<?php
/**
*
* @package testing
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
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
	public function test_get_rules_data()
	{
		return array(
			array(
				// language id to search, data which should match
				array(
					1,
					array(
						'rule_id' => 1,
						'rule_language' => 1,
						'rule_left_id' => 1,
						'rule_right_id' => 2,
						'rule_parent_id' => 0,
						'rule_anchor' => '#',
						'rule_title' => 'title_1',
					),
					array(
						'rule_id' => 2,
						'rule_language' => 1,
						'rule_left_id' => 3,
						'rule_right_id' => 4,
						'rule_parent_id' => 0,
						'rule_anchor' => '#',
						'rule_title' => 'title_2',
					),
					array(
						'rule_id' => 3,
						'rule_language' => 1,
						'rule_left_id' => 5,
						'rule_right_id' => 6,
						'rule_parent_id' => 0,
						'rule_anchor' => '#',
						'rule_title' => 'title_3',
					),
				),
			),
		);
	}

	/**
	* Test getting rules from the database
	*
	* @dataProvider test_get_rules_data
	*/
	public function test_get_rules($langauge, $data)
	{
		// Setup the operator class
		$operator = $this->get_rule_operator();

		// Grab the rule data as an array of entities
		$entities = $operator->get_rules($language);

		$entity_data = array();

		foreach ($entities as $entity)
		{
			$entity_data[] = array(
				'rule_id' => $entity->get_id(),
				'rule_language' => $entity->get_language(),
				'rule_left_id' => $entity->get_left_id(),
				'rule_right_id' => $entity->get_right_id(),
				'rule_parent_id' => $entity->get_parent_id(),
				'rule_title' => $entity->get_title(),
				'rule_anchor' => $entity->get_anchor(),
			);
		}

		// Assert that the data matches what's expected
		$this->assertEquals($data, $entity_data);
	}

	/**
	* Test data for the test_get_rules() function
	*
	* @return array Array of test data
	* @access public
	*/
	public function test_get_rules_fails_data()
	{
		return array(
			// language to search
			array(0),
			array(4),
		);
	}

	/**
	* Test getting (non-existant) rules from the database
	*
	* @dataProvider test_get_rules_fails_data
	* @expectedException \phpbb\boardrules\exception\out_of_bounds
	*/
	public function test_get_rules_fails($language)
	{
		// Setup the operator class
		$operator = $this->get_rule_operator();

		// Load the operator
		$operator->get_rules($language);
	}
}
