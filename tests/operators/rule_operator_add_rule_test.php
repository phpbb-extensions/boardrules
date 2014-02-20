<?php
/**
*
* @package testing
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
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
		$entity->message_disable_bbcode();
		$entity->message_disable_magic_url();
		$entity->message_disable_smilies();
		$entity
			->set_title('title_added')
			->set_anchor('anchor_added')
			->set_message('message_added');

		// Set up some basic test variables
		$test_id = 6;
		$language = $parent_id = 1; // using 1 allows us to test the nestability

		// Setup the operator class
		$operator = $this->get_rule_operator();

		// Add the rule
		$result = $operator->add_rule($language, $parent_id, $entity);

		// Assert the rule was added
		$this->assertEquals($test_id, $result->get_id());
	}
}
