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
			// id to search, title which should match
			array(1, 'test_1'),
			array(2, 'test_2'),
			array(3, 'test_3'),
		);
	}

	/**
	* Test loading rules from the database
	*
	* @dataProvider test_load_data
	*/
	public function test_load($id, $title = false)
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
