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
* Tests related to insert on rule entity
*/
class rule_entity_insert_test extends rule_entity_base
{
	/**
	* Test inserting new rule data
	*
	* @access public
	*/
	public function test_insert()
	{
		// Set a language variable
		$language = 1;

		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Insert a table row
		$result = $entity
			->set_anchor('inserted_anchor')
			->set_title('inserted_title')
			->set_message('inserted_message')
			->insert($language);

		// Assert the returned value is what we expect
		$this->assertInstanceOf('\phpbb\boardrules\entity\rule', $result);

		// Assert that a rule_id of value 5 was created
		$this->assertEquals(5, $result->get_id());
	}

	/**
	* Try inserting a rule that already exists into the database
	* Entities with an exisiting rule_id will fail to insert
	*
	* @expectedException \phpbb\boardrules\exception\out_of_bounds
	* @access public
	*/
	public function test_insert_fails()
	{
		// Set a language variable
		$language = 1;

		// Load some import test data
		$import_data = $this->get_import_data();

		// Setup the entity class
		$entity = $this->get_rule_entity();

		// Import an existing rule entity
		$entity->import($import_data[1]);

		// Try to insert the exisiting rule entity
		$entity->insert($language);
	}
}
