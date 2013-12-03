<?php
/**
*
* @package testing
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\tests\entity;

class entity_test extends \phpbb_database_test_case
{
	public function getDataSet()
	{
		return $this->createXMLDataSet(dirname(__FILE__) . '/fixtures/rule.xml');
	}

	public function setUp()
	{
		parent::setUp();

		$this->db = $this->new_dbal();
	}

	public function test_load_data()
	{
		return array(
			// id to search, data which should match
			array(
				1,
				array(
					'rule_id' => 1,
					'rule_language' => 'en',
					'rule_left_id' => 1,
					'rule_right_id' => 2,
					'rule_anchor' => '#',
					'rule_title' => 'title_1',
					'rule_message' => 'message_1',
					'rule_message_bbcode_uid' => '',
					'rule_message_bbcode_bitfield' => '',
					'rule_message_bbcode_options' => '',
				),
			),
			array(
				2,
				array(
					'rule_id' => 2,
					'rule_language' => 'en',
					'rule_left_id' => 3,
					'rule_right_id' => 4,
					'rule_anchor' => '#',
					'rule_title' => 'title_2',
					'rule_message' => 'message_2',
					'rule_message_bbcode_uid' => '',
					'rule_message_bbcode_bitfield' => '',
					'rule_message_bbcode_options' => '',
				),
			),
			array(
				3,
				array(
					'rule_id' => 3,
					'rule_language' => 'en',
					'rule_left_id' => 5,
					'rule_right_id' => 6,
					'rule_anchor' => '#',
					'rule_title' => 'title_3',
					'rule_message' => 'message_3',
					'rule_message_bbcode_uid' => '',
					'rule_message_bbcode_bitfield' => '',
					'rule_message_bbcode_options' => '',
				),
			),
		);
	}

	/**
	* Test loading rules from the database
	*
	* @dataProvider test_load_data
	*/
	public function test_load($id, $data = false)
	{
		// Setup the entity class
		$entity = new \phpbb\boardrules\entity\rule($this->db, 'phpbb_boardrules');

		// Load the entity
		$entity->load($id);

		// Assert that the title matches what's expected
		$this->assertEquals($title, $entity->get_title());
	}

	public function test_load_fails_data()
	{
		return array(
			// id to search
			array(0),
			array(4),
		);
	}

	/**
	* Test loading (non-existant) rules from the database
	*
	* @dataProvider test_load_fails_data
	* @expectedException \phpbb\boardrules\exception\out_of_bounds
	*/
	public function test_load_fails($id)
	{
		// Setup the entity class
		$entity = new \phpbb\boardrules\entity\rule($this->db, 'phpbb_boardrules');

		// Load the entity
		$entity->load($id);
	}
}
