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
* Tests related to tree ids on rule entity
*/
class rule_entity_right_id_test extends rule_entity_base
{
	/**
	* Test data for the test_right_id() function
	*
	* @return array Array of test data
	* @access public
	*/
	public function test_right_id_data()
	{
		$import_data = $this->get_import_data();

		return array(
			array(
				$import_data[1],
				1,
			),
			array(
				$import_data[2],
				5,
			),
			array(
				$import_data[3],
				4,
			),
			array(
				$import_data[4],
				7,
			),
		);
	}

	/**
	* Test getting id
	*
	* @dataProvider test_right_id_data
	* @access public
	*/
	public function test_right_id($data, $expected)
	{
		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Set the data
		$entity->import($data);

		// Assert that the id matches what is expected
		$this->assertEquals($expected, $entity->get_right_id());
	}
}
