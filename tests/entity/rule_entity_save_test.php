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
	public function save_test_data()
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

	public function test_four_byte_characters_are_encoded_for_storage_and_decoded_on_read()
	{
		$entity = $this->get_rule_entity();
		$entity->load(1)
			->set_anchor('emoji-😀')
			->set_title('Emoji 😀 title')
			->save();

		$result = $this->db->sql_query('SELECT rule_anchor, rule_title
			FROM phpbb_boardrules
			WHERE rule_id = 1');
		$row = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		self::assertSame('emoji-&#128512;', $row['rule_anchor']);
		self::assertSame('Emoji &#128512; title', $row['rule_title']);

		$entity->load(1);
		self::assertSame('emoji-😀', $entity->get_anchor());
		self::assertSame('Emoji 😀 title', $entity->get_title());
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
