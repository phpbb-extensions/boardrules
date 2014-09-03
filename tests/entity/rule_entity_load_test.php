<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2013 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\tests\entity;

/**
* Tests related to load on rule entity
*/
class rule_entity_load_test extends rule_entity_base
{
	/**
	* Test data for the test_load() function
	*
	* @return array Array of test data
	* @access public
	*/
	public function load_test_data()
	{
		return array(
			// id to search, data which should match
			array(
				1,
				array(
					'rule_id' => 1,
					'rule_language' => 1,
					'rule_left_id' => 1,
					'rule_right_id' => 2,
					'rule_parent_id' => 0,
					'rule_anchor' => 'anchor_1',
					'rule_title' => 'title_1',
					'rule_message' => 'message_1',
				),
			),
			array(
				2,
				array(
					'rule_id' => 2,
					'rule_language' => 1,
					'rule_left_id' => 3,
					'rule_right_id' => 4,
					'rule_parent_id' => 0,
					'rule_anchor' => 'anchor_2',
					'rule_title' => 'title_2',
					'rule_message' => 'message_2',
				),
			),
			array(
				3,
				array(
					'rule_id' => 3,
					'rule_language' => 1,
					'rule_left_id' => 5,
					'rule_right_id' => 6,
					'rule_parent_id' => 0,
					'rule_anchor' => 'anchor_3',
					'rule_title' => 'title_3',
					'rule_message' => 'message_3',
				),
			),
		);
	}

	/**
	* Test loading rules from the database
	*
	* @dataProvider load_test_data
	* @access public
	*/
	public function test_load($id, $data)
	{
		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Set the data
		$result = $entity->load($id);

		// Assert the returned value is what we expect
		$this->assertInstanceOf('\phpbb\boardrules\entity\rule', $result);

		// Map the fields to the getters
		$map = array(
			'rule_id'		=> 'get_id',
			'rule_language'	=> 'get_language',
			'rule_left_id'	=> 'get_left_id',
			'rule_right_id'	=> 'get_right_id',
			'rule_parent_id'=> 'get_parent_id',
			'rule_anchor'	=> 'get_anchor',
			'rule_title'	=> 'get_title',
			'rule_message'	=> 'get_message_for_edit',
		);

		// Go through each field in the data and make sure the function returns
		// what we saved
		foreach ($map as $field => $function)
		{
			$this->assertEquals($data[$field], $entity->$function());
		}
	}

	/**
	* Test data for the test_load_fails() function
	*
	* @return array Array of test data
	* @access public
	*/
	public function load_fails_test_data()
	{
		return array(
			// id to search
			array(0),
			array(10),
		);
	}

	/**
	* Test loading (non-existant) rules from the database
	*
	* @dataProvider load_fails_test_data
	* @expectedException \phpbb\boardrules\exception\out_of_bounds
	* @access public
	*/
	public function test_load_fails($id)
	{
		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Load the entity
		$entity->load($id);
	}
}
