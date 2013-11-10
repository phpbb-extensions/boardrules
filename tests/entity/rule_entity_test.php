<?php
/**
*
* @package testing
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\tests\entity;

class rule_entity_test extends \phpbb_test_case
{
	protected function get_rule_entity()
	{
		return new \phpbb\boardrules\entity\rule();
	}

	public function test_title_data()
	{
		return array(
			// sent to set_title(), expected from get_title()
			array('foo', 'foo'),
			array(1, '1'),
			array(null, ''),
		);
	}

	/**
	* Test setting title
	*
	* @dataProvider test_title_data
	*/
	public function test_title($set, $expected)
	{
		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Set the title
		$entity->set_title($set);

		// Assert that the title matches what's expected
		$this->assertSame($title, $entity->get_title());
	}
}
