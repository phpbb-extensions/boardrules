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
* Tests related to parent ids on rule entity
*/
class rule_entity_parent_id_test extends rule_entity_base
{
	/**
	* Test data for the test_id() function
	*
	* @return array Array of test data
	* @access public
	*/
	public function test_id_data()
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
				0,
			),
			array(
				$import_data[4],
				0,
			),
		);
	}

	/**
	* Test getting id
	*
	* @dataProvider test_id_data
	* @access public
	*/
	public function test_id($data, $expected)
	{
		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Set the data
		$entity->import($data);

		// Assert that the id matches what is expected
		$this->assertEquals($expected, $entity->get_parent_id());
	}
}
