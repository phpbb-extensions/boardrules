<?php
/**
*
* @package testing
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\tests\entity;

class rule_entity_title_test extends rule_entity_base
{
	public function test_title_data()
	{
		return array(
			// sent to set_title(), expected from get_title()
			array('foo', 'foo'),
			array(1, '1'),
			array(null, ''),

			// Maximum length
			array(
				'12345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890',
				'12345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890',
			),
		);
	}

	/**
	* Test setting title
	*
	* @dataProvider test_title_data
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
		$this->assertSame($title, $entity->get_title());
	}

	public function test_title_fails_data()
	{
		return array(
			// title

			// One character more than maximum length
			array(
				'123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901',
			),
		);
	}

	/**
	* Test setting invalid data on the title which should throw an exception
	*
	* @dataProvider test_title_fails_data
	* @expectedException \phpbb\boardrules\exception\base
	*/
	public function test_title_fails($title)
	{
		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Load the entity
		$entity->set_title($title);
	}
}
