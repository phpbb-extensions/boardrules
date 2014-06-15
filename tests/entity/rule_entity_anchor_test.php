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
* Tests related to anchors on rule entity
*/
class rule_entity_anchor_test extends rule_entity_base
{
	/**
	* Test data for the test_anchor() function
	*
	* @return array Array of test data
	* @access public
	*/
	public function anchor_test_data()
	{
		return array(
			// sent to set_anchor(), expected from get_anchor()
			array('foo', 'foo'),
			array('', ''),
			array(null, ''),

			// Maximum length
			array(
				str_repeat('a', 255),
				str_repeat('a', 255),
			),
		);
	}

	/**
	* Test setting anchor
	*
	* @dataProvider anchor_test_data
	* @access public
	*/
	public function test_anchor($anchor, $expected)
	{
		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Set the anchor
		$result = $entity->set_anchor($anchor);

		// Assert the returned value is what we expect
		$this->assertInstanceOf('\phpbb\boardrules\entity\rule', $result);

		// Assert that the anchor matches what's expected
		$this->assertSame($expected, $entity->get_anchor($anchor));
	}

	/**
	* Test data for the test_anchor_fails() function
	*
	* @return array Array of test data
	* @access public
	*/
	public function anchor_fails_test_data()
	{
		return array(
			// Starts with a non-letter
			array('1foo'),

			// One character more than maximum length
			array(
				str_repeat('a', 256),
			),
		);
	}

	/**
	* Test setting invalid data on the anchor which should throw an exception
	*
	* @dataProvider anchor_fails_test_data
	* @expectedException \phpbb\boardrules\exception\base
	* @access public
	*/
	public function test_anchor_fails($anchor)
	{
		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Load the entity
		$entity->set_anchor($anchor);
	}
}
