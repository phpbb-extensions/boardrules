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
	*/
	public function language_test_data()
	{
		$import_data = $this->get_import_data();

		// Set some data to test other than en from our import data
		$import_data[3]['rule_language'] = 'foo';
		$import_data[4]['rule_language'] = 0;

		return array(
			array(
				$import_data[1],
				'en',
			),
			array(
				$import_data[2],
				'en',
			),
			array(
				$import_data[3],
				'foo',
			),
			array(
				$import_data[4],
				'0',
			),
		);
	}

	/**
	* Test getting language
	*
	* @dataProvider language_test_data
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

	/**
	 * Test setting language
	 *
	 * @dataProvider language_test_data
	 */
	public function test_set_language($data, $language)
	{
		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Assert that the anchor matches what's expected
		if ($language !== 'en')
		{
			$this->expectException('\phpbb\boardrules\exception\unexpected_value');
		}

		// Set the anchor
		$entity->set_language($language);

		// Assert that the anchor matches what's expected
		$this->assertSame($language, $entity->get_language());
	}
}
