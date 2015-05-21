<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\tests\functional;

/**
* @group functional
*/
class admin_controller_test extends boardrules_functional_base
{
	/**
	 * Test Board Rules ACP module appears
	 */
	public function test_acp_module()
	{
		$this->login();
		$this->admin_login();

		// Load Pages ACP page
		$crawler = self::request('GET', "adm/index.php?i=\phpbb\boardrules\acp\boardrules_module&mode=manage&language=1&sid={$this->sid}");

		// Assert Board Rules module appears in sidebar
		$this->assertContainsLang('ACP_BOARDRULES', $crawler->filter('.menu-block')->text());
		$this->assertContainsLang('ACP_BOARDRULES_MANAGE', $crawler->filter('#activemenu')->text());

		// Assert Board Rules display appears
		$this->assertContainsLang('ACP_BOARDRULES_MANAGE', $crawler->filter('#main')->text());
		$this->assertContainsLang('ACP_BOARDRULES_MANAGE_EXPLAIN', $crawler->filter('#main')->text());

		// Return $crawler for use in @depends functions
		return $crawler;
	}

	/**
	 * Test Board Rules ACP Create Rule
	 *
	 * @depends test_acp_module
	 */
	public function test_acp_create_rule($crawler)
	{
		// Jump to the create page
		$form = $crawler->selectButton($this->lang('SUBMIT'))->form();
		$crawler = self::submit($form);
		$this->assertContainsLang('ACP_BOARDRULES_CREATE_RULE', $crawler->filter('#main h1')->text());

		// Submit new rule data
		$form = $crawler->selectButton($this->lang('SUBMIT'))->form(array(
			'rule_title'	=> 'Test Rule',
			'rule_anchor'	=> 'test-rule',
			'rule_message'	=> str_repeat('test ', 1000), // 5000 characters
		));
		$crawler = self::submit($form);

		// Assert addition was success
		$this->assertGreaterThan(0, $crawler->filter('.successbox')->count());
		$this->assertContainsLang('ACP_RULE_ADDED', $crawler->text());
	}

	/**
	 * Test Board Rules ACP Edit Rule
	 */
	public function test_acp_edit_rule()
	{
		$this->login();
		$this->admin_login();

		// Edit the rule identified by id 3
		$crawler = self::request('GET', "adm/index.php?i=\phpbb\boardrules\acp\boardrules_module&mode=manage&language=1&action=edit&rule_id=3&sid={$this->sid}");

		// Assert edit page is displayed
		$this->assertContainsLang('ACP_BOARDRULES_EDIT_RULE', $crawler->filter('#main')->text());
		$this->assertContainsLang('ACP_BOARDRULES_EDIT_RULE_EXPLAIN', $crawler->filter('#main')->text());
	}

	/**
	 * Test Board Rules ACP Delete Rule
	 */
	public function test_acp_delete_rule()
	{
		$this->login();
		$this->admin_login();

		// Delete the rule identified by id 3
		$crawler = self::request('GET', "adm/index.php?i=\phpbb\boardrules\acp\boardrules_module&mode=manage&language=1&action=delete&rule_id=3&sid={$this->sid}");

		// Confirm delete
		$form = $crawler->selectButton('confirm')->form();
		$crawler = self::submit($form);

		// Assert deletion was success
		$this->assertGreaterThan(0, $crawler->filter('.successbox')->count());
		$this->assertContainsLang('ACP_RULE_DELETED', $crawler->text());
	}
}
