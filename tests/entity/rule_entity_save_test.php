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
* Tests related to save on rule entity
*/
class rule_entity_save_test extends rule_entity_base
{
	/**
	* Test data for the test_save() function
	*
	* @return array Array of test data
	*/
	public static function save_test_data()
	{
		return array(
			array(
				1,
				array(
					'rule_id' => 1,
					'rule_anchor' => 'new_anchor_1',
					'rule_title' => 'new_title_1',
				),
			),
			array(
				2,
				array(
					'rule_id' => 2,
					'rule_anchor' => 'new_anchor_2',
					'rule_title' => 'new_title_2',
				),
			),
		);
	}

	/**
	* Test saving data
	*
	* @dataProvider save_test_data
	*/
	public function test_save($id, $expected)
	{
		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Load the data
		$result = $entity->load($id);

		// Assert the returned value is what we expect
		self::assertInstanceOf('\phpbb\boardrules\entity\rule', $result);

		// Set some new data
		$entity
			->set_anchor($expected['rule_anchor'])
			->set_title($expected['rule_title'])
			->save();

		// Re-load the data from the database
		$result = $entity->load($id);

		// Assert expected matches actual
		self::assertEquals($expected['rule_id'], $result->get_id());
		self::assertEquals($expected['rule_anchor'], $result->get_anchor());
		self::assertEquals($expected['rule_title'], $result->get_title());
	}

	/**
	* Test saving to (non-existant) rules from the database
	*
	*/
	public function test_save_fails()
	{
		$this->expectException(\phpbb\boardrules\exception\out_of_bounds::class);

		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Save the entity with no rule ID set
		$entity->save();
	}
}
