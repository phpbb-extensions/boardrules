<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\tests\operators;

class rule_operator_add_rule_test extends rule_operator_base
{
	/**
	* Test adding a rule
	*
	* @access public
	*/
	public function test_add_rule()
	{
		global $phpbb_dispatcher;
		$phpbb_dispatcher = new \phpbb_mock_event_dispatcher();

		// Setup the entity class
		$entity = new \phpbb\boardrules\entity\rule($this->db, 'phpbb_boardrules');

		// Fill the entity with basic data
		$entity
			->message_disable_bbcode()
			->message_disable_magic_url()
			->message_disable_smilies()
			->set_title('title_added')
			->set_anchor('anchor_added')
			->set_message('message_added')
		;

		// Set up some basic test variables
		$test_id = 6;
		$language = $parent_id = 1; // using 1 allows us to test the nestability

		// Setup the operator class
		$operator = $this->get_rule_operator();

		// Add the rule
		$result = $operator->add_rule($entity, $language, $parent_id);

		// Assert the rule was added
		$this->assertEquals($test_id, $result->get_id());
	}
}
