<?php
/**
*
* @package testing
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\tests\entity;

/**
* Tests related to ids on rule entity
*/
class rule_entity_id_test extends rule_entity_base
{
	/**
	* Test data for the test_id() function
	*
	* @return array Array of test data
	* @access public
	*/
	public function test_id_data()
	{
		return array(
			array(1, 1),
			array(2, 2),
			array(null, 0),
		);
	}

	/**
	* Test getting id
	*
	* @dataProvider test_id_data
	* @access public
	*/
	public function test_id($id, $expected)
	{
		// Setup the entity class
		$entity = $this->get_rule_entity($this->data['rule_id'], $id);

		// Get id
		$result = $entity->get_id();

		// Match expected id with the result
		$this->assertEquals($expected, $result);
	}
}
