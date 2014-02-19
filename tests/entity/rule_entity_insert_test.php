<?php
/**
*
* @package testing
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\tests\entity;

/**
* Tests related to insert on rule entity
*/
class rule_entity_insert_test extends rule_entity_base
{
	/**
	* Test data for the test_insert() function
	*
	* @return array Array of test data
	* @access public
	*/
	public function insert_test_data()
	{
		return array(
			array(
				1,
				array(
					'rule_id' => 4,
					'rule_language' => 1,
					'rule_left_id' => 0,
					'rule_right_id' => 0,
					'rule_parent_id' => 0,
					'rule_anchor' => 'inserted_anchor',
					'rule_title' => 'inserted_title',
					'rule_message' => 'inserted_message',
				),
			),
		);
	}

	/**
	* Test saving data
	*
	* @dataProvider insert_test_data
	* @access public
	*/
	public function test_insert($language, $expected)
	{
		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Insert a table row
		$result = $entity
			->set_anchor('inserted_anchor')
			->set_title('inserted_title')
			->set_message('inserted_message')
			->insert($language);

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
		);

		// Go through each field in the data and make sure the function returns
		// what we saved
		foreach ($map as $field => $function)
		{
			$this->assertEquals($expected[$field], $entity->$function());
		}
	}

	/**
	* Test data for the test_insert_fails() function
	*
	* @return array Array of test data
	* @access public
	*/
	public function insert_fails_test_data()
	{
		$import_data = $this->get_import_data();

		return array(
			array(
				$import_data[1],
				1,
			),
		);
	}

	/**
	* Test inserting on an existing rule in the database
	*
	* @dataProvider insert_fails_test_data
	* @expectedException \phpbb\boardrules\exception\out_of_bounds
	*/
	public function test_insert_fails($data, $language)
	{
		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Set the data
		$entity->import($data);

		// Insert the entity
		$entity->insert($language);
	}
}
