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
* Tests related to language on rule entity
*/
class rule_entity_id_test extends rule_entity_base
{
	/**
	* Test data for the test_language() function
	*
	* @return array Array of test data
	* @access public
	*/
	public function test_language_data()
	{
		$import_data = $this->get_import_data();

		// Set some data to test other than 1 from our import data
		$import_data[3]['rule_language'] = 2;
		$import_data[4]['rule_language'] = '7';

		return array(
			array(
				$import_data[1],
				1,
			),
			array(
				$import_data[2],
				1,
			),
			array(
				$import_data[3],
				2,
			),
			array(
				$import_data[4],
				7,
			),
		);
	}

	/**
	* Test getting language
	*
	* @dataProvider test_language_data
	* @access public
	*/
	public function test_language($data, $expected)
	{
		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Set the data
		$entity->import($data);

		// Assert that the language matches what is expected
		$this->assertSame($expected, $entity->get_language());
	}
}
