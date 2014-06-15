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
* Tests related to language on rule entity
*/
class rule_entity_language_test extends rule_entity_base
{
	/**
	* Test data for the test_language() function
	*
	* @return array Array of test data
	* @access public
	*/
	public function language_test_data()
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
	* @dataProvider language_test_data
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
