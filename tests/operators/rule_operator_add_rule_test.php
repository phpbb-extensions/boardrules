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
	*/
	public function test_add_rule()
	{
		global $phpbb_dispatcher;
		$phpbb_dispatcher = new \phpbb_mock_event_dispatcher();

		// This is needed to set up the s9e text formatter services
		// This can lead to a test failure if PCRE is old.
		$this->get_test_case_helpers()->set_s9e_services();

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
		$language = 'en';
		$parent_id = 1; // using 1 allows us to test the nestability
		$this->ruleset_operator->expects(self::once())
			->method('draft_if_empty')
			->with($language);

		// Setup the operator class
		$operator = $this->get_rule_operator();

		// Add the rule
		$result = $operator->add_rule($entity, $language, $parent_id);

		// Assert the rule was added
		self::assertEquals($test_id, $result->get_id());
		self::assertSame('0', (string) $this->config['nestedset_rules_lock']);
	}

	/**
	 * Test adding a rule cannot race another nested-set write.
	 */
	public function test_add_rule_rejects_when_nestedset_lock_is_held()
	{
		global $phpbb_dispatcher;
		$phpbb_dispatcher = new \phpbb_mock_event_dispatcher();
		$this->get_test_case_helpers()->set_s9e_services();

		$entity = new \phpbb\boardrules\entity\rule($this->db, 'phpbb_boardrules');
		$entity
			->message_disable_bbcode()
			->message_disable_magic_url()
			->message_disable_smilies()
			->set_title('locked_rule')
			->set_anchor('locked-rule')
			->set_message('locked rule');

		$competing_lock = new \phpbb\lock\db('nestedset_rules_lock', $this->config, $this->db);
		self::assertTrue($competing_lock->acquire());
		$this->ruleset_operator->expects(self::never())->method('draft_if_empty');

		try
		{
			$this->get_rule_operator()->add_rule($entity, 'en');
			self::fail('Rule insertion should not run while the nested-set lock is held.');
		}
		catch (\RuntimeException $e)
		{
			self::assertSame('RULES_NESTEDSET_LOCK_FAILED_ACQUIRE', $e->getMessage());
		}
		finally
		{
			$competing_lock->release();
		}

		$result = $this->db->sql_query("SELECT COUNT(rule_id) AS rule_count
			FROM phpbb_boardrules
			WHERE rule_title = 'locked_rule'");
		self::assertSame(0, (int) $this->db->sql_fetchfield('rule_count'));
		$this->db->sql_freeresult($result);
	}
}
