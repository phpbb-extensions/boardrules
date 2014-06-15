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
* Tests related to titles on rule entity
*/
class rule_entity_title_test extends rule_entity_base
{
	/**
	* Test data for the test_title() function
	*
	* @return array Array of test data
	* @access public
	*/
	public function title_test_data()
	{
		return array(
			// sent to set_title(), expected from get_title()
			array('foo', 'foo'),
			array(1, '1'),
			array(null, ''),

			// Maximum length
			array(
				str_repeat('a', 200),
				str_repeat('a', 200),
			),
		);
	}

	/**
	* Test setting title
	*
	* @dataProvider title_test_data
	* @access public
	*/
	public function test_title($title, $expected)
	{
		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Set the title
		$result = $entity->set_title($title);

		// Assert the returned value is what we expect
		$this->assertInstanceOf('\phpbb\boardrules\entity\rule', $result);

		// Assert that the title matches what's expected
		$this->assertSame($expected, $entity->get_title());
	}

	/**
	* Test data for the test_title_fails() function
	*
	* @return array Array of test data
	* @access public
	*/
	public function title_fails_test_data()
	{
		return array(
			// title

			// One character more than maximum length
			array(
				str_repeat('a', 201),
			),
		);
	}

	/**
	* Test setting invalid data on the title which should throw an exception
	*
	* @dataProvider title_fails_test_data
	* @expectedException \phpbb\boardrules\exception\base
	* @access public
	*/
	public function test_title_fails($title)
	{
		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Load the entity
		$entity->set_title($title);
	}
}
