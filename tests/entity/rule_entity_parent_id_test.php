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
* Tests related to parent ids on rule entity
*/
class rule_entity_parent_id_test extends rule_entity_base
{
	/**
	* Test data for the test_parent_id() function
	*
	* @return array Array of test data
	* @access public
	*/
	public function parent_id_test_data()
	{
		$import_data = $this->get_import_data();

		return array(
			array(
				$import_data[1],
				0,
			),
			array(
				$import_data[2],
				0,
			),
			array(
				$import_data[3],
				2,
			),
			array(
				$import_data[4],
				0,
			),
		);
	}

	/**
	* Test getting parent_id
	*
	* @dataProvider parent_id_test_data
	* @access public
	*/
	public function test_parent_id($data, $expected)
	{
		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Set the data
		$entity->import($data);

		// Assert that the id matches what is expected
		$this->assertEquals($expected, $entity->get_parent_id());
	}
}
