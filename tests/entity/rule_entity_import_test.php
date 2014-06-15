<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\tests\entity;

/**
* Tests related to import on rule entity
*/
class rule_entity_import_test extends rule_entity_base
{
	/**
	* Test data for the test_import() function
	*
	* @return array Array of test data
	* @access public
	*/
	public function import_test_data()
	{
		$import_data = $this->get_import_data();

		return array(
			array($import_data[1]),
			array($import_data[2]),
			array($import_data[3]),
			array($import_data[4]),
		);
	}

	/**
	* Test importing data
	*
	* @dataProvider import_test_data
	* @access public
	*/
	public function test_import($data)
	{
		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Set the data
		$result = $entity->import($data);

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
			$this->assertEquals($data[$field], $entity->$function());
		}
	}

	/**
	* Test data for the test_import_fail() function
	*
	* @return array Array of test data
	* @access public
	*/
	public function import_test_fail_data()
	{
		$import_data = $this->get_import_data();

		$data = array();

		// Out of range
		$data[] = array_merge($import_data[1], array(
			'rule_id'	=> -1,
		));

		// Out of range
		$data[] = array_merge($import_data[1], array(
			'rule_language'	=> -1,
		));

		// Out of range
		$data[] = array_merge($import_data[1], array(
			'rule_left_id'	=> -1,
		));

		// Out of range
		$data[] = array_merge($import_data[1], array(
			'rule_right_id'	=> -1,
		));

		// Out of range
		$data[] = array_merge($import_data[1], array(
			'rule_parent_id'=> -1,
		));

		// Out of range
		$data[] = array_merge($import_data[1], array(
			'rule_message_bbcode_options'	=> -1,
		));

		// Too long
		$data[] = array_merge($import_data[1], array(
			'rule_anchor'	=> str_repeat('a', 256),
		));

		// Too long
		$data[] = array_merge($import_data[1], array(
			'rule_title'	=> str_repeat('a', 201),
		));

		// Go through every field and unset it while submitting everything else
		foreach ($import_data[1] as $field => $value)
		{
			$incomplete = $import_data[1];

			// Unset the one field while keeping everything else
			unset($incomplete[$field]);

			$data[] = $incomplete;
		}

		return $data;
	}

	/**
	* Test importing data which will cause exceptions
	*
	* @dataProvider import_test_fail_data
	* @expectedException \phpbb\boardrules\exception\base
	* @access public
	*/
	public function test_import_fail($data)
	{
		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Set the data
		$entity->import($data);
	}
}
