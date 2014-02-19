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
* Tests related to save on rule entity
*/
class rule_entity_save_test extends rule_entity_base
{
	/**
	* Test data for the test_save() function
	*
	* @return array Array of test data
	* @access public
	*/
	public function save_test_data()
	{
		return array(
			array(
				1,
				array(
					'rule_id' => 1,
					'rule_anchor' => 'new_anchor_1',
					'rule_title' => 'new_title_1',
				),
			),
			array(
				2,
				array(
					'rule_id' => 2,
					'rule_anchor' => 'new_anchor_2',
					'rule_title' => 'new_title_2',
				),
			),
		);
	}

	/**
	* Test saving data
	*
	* @dataProvider save_test_data
	* @access public
	*/
	public function test_save($id, $expected)
	{
		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Load the data
		$result = $entity->load($id);

		// Assert the returned value is what we expect
		$this->assertInstanceOf('\phpbb\boardrules\entity\rule', $result);

		// Set some new data
		$entity
			->set_anchor('new_anchor_' . $id)
			->set_title('new_title_' . $id)
			->save();

		// Map the fields to the getters
		$map = array(
			'rule_id'		=> 'get_id',
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
	* Test data for the test_save_fails() function
	*
	* @return array Array of test data
	* @access public
	*/
	public function save_fails_test_data()
	{
		return array(
			// id to search
			array(0),
			array(4),
		);
	}

	/**
	* Test saving to (non-existant) rules from the database
	*
	* @dataProvider save_fails_test_data
	* @expectedException \phpbb\boardrules\exception\out_of_bounds
	*/
	public function test_save_fails($id)
	{
		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Save the entity
		$entity->save($id);
	}
}
