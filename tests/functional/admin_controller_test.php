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
		$crawler = self::request('GET', "adm/index.php?i=\\phpbb\\boardrules\\acp\\boardrules_module&mode=manage&language=en&sid={$this->sid}");

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
	 * Test the per-language rules page introduction editor and public output.
	 */
	public function test_acp_ruleset_intro()
	{
		$this->login();
		$this->admin_login();
		$this->get_db();

		$intro_text = "Welcome to our community. 👋 مرحبًا こんにちは\n<strong>This is plain text.</strong>";
		$crawler = self::request('GET', "adm/index.php?i=\\phpbb\\boardrules\\acp\\boardrules_module&mode=manage&language=en&sid={$this->sid}");
		$form_node = $crawler->filter('#boardrules_intro_form');
		self::assertCount(1, $form_node);
		self::assertSame('true', $form_node->attr('data-ajax'));
		self::assertNotSame('', $form_node->filter('#boardrules_intro_text')->attr('placeholder'));
		self::assertNotSame(
			$form_node->filter('input[name="form_token"]')->attr('value'),
			$crawler->filter('#rules input[name="form_token"]')->attr('value')
		);

		try
		{
			$form = $form_node->selectButton($this->lang('ACP_BOARDRULES_INTRO_SAVE'))->form(array(
				'boardrules_intro_text' => $intro_text,
			));
			$crawler = self::submit($form);
			$this->assertContainsLang('ACP_BOARDRULES_INTRO_SAVED', $crawler->text());

			$result = $this->db->sql_query("SELECT rules_intro_text FROM phpbb_boardrules_rulesets WHERE language_iso = 'en'");
			self::assertSame(utf8_encode_ncr($intro_text), $this->db->sql_fetchfield('rules_intro_text'));
			$this->db->sql_freeresult($result);

			$crawler = self::request('GET', "adm/index.php?i=\\phpbb\\boardrules\\acp\\boardrules_module&mode=manage&language=en&sid={$this->sid}");
			self::assertSame($intro_text, $crawler->filter('#boardrules_intro_text')->text());

		}
		finally
		{
			$this->db->sql_query("UPDATE phpbb_boardrules_rulesets SET rules_intro_text = '' WHERE language_iso = 'en'");
		}
	}

	/**
	 * Test Board Rules ACP Create Rule
	 * @param $crawler \Symfony\Component\DomCrawler\Crawler
	 *
	 * @depends test_acp_module
	 */
	public function test_acp_create_rule($crawler)
	{
		$this->login();
		$this->admin_login();

		// Jump to the create page
		$form = $crawler->selectButton($this->lang('SUBMIT'))->form();
		$crawler = self::submit($form);
		$this->assertContainsLang('ACP_BOARDRULES_CREATE_RULE', $crawler->filter('#main h1')->text());

		// Submit new rule data
		$form = $crawler->selectButton($this->lang('SUBMIT'))->form(array(
			'rule_title'	=> 'Test Rule',
			'rule_anchor'	=> 'test-rule',
			'rule_message'	=> str_repeat('test ', 1000), // 5000 character message
		));
		$crawler = self::submit($form);

		// Assert addition was success
		self::assertGreaterThan(0, $crawler->filter('.successbox')->count());
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
		$crawler = self::request('GET', "adm/index.php?i=\\phpbb\\boardrules\\acp\\boardrules_module&mode=manage&language=en&action=edit&rule_id=3&sid={$this->sid}");

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
		$crawler = self::request('GET', "adm/index.php?i=\\phpbb\\boardrules\\acp\\boardrules_module&mode=manage&language=en&action=delete&rule_id=3&sid={$this->sid}");

		// Confirm delete
		$form = $crawler->selectButton('confirm')->form();
		$crawler = self::submit($form);

		// Assert deletion was success
		self::assertGreaterThan(0, $crawler->filter('.successbox')->count());
		$this->assertContainsLang('ACP_RULE_DELETED', $crawler->text());
	}

	/**
	 * Test Board Rules Notifications
	 */
	public function test_notifications()
	{
		$this->login();
		$this->admin_login();

		// Load Board Rules Settings page
		$crawler = self::request('GET', "adm/index.php?i=\\phpbb\\boardrules\\acp\\boardrules_module&mode=settings&sid={$this->sid}");
		$this->assertContainsLang('ACP_BOARDRULES_SETTINGS', $crawler->filter('#main')->text(), 'The Board Rules settings page failed to load');

		// Send out notifications
		$form = $crawler->selectButton('action_send_notification')->form();
		$crawler = self::submit($form);
		$form = $crawler->selectButton('confirm')->form();
		$crawler = self::submit($form);

		// Assert no error occurred
		$this->assertContainsLang('ACP_BOARDRULES_SETTINGS', $crawler->filter('#main')->text(), 'Failed to successfully send notifications');

		// Assert notifications were sent
		$crawler = self::request('GET', "index.php?&sid={$this->sid}");
		$this->assertContainsLang('BOARDRULES_NOTIFICATION', $crawler->filter('.notification-title')->text(), 'The notification was not found in the notifications list');
	}

	/**
	 * Test Board Rules ACP Settings
	 */
	public function test_acp_settings_and_logs()
	{
		$this->login();
		$this->admin_login();

		$this->add_lang_ext('phpbb/boardrules', 'info_acp_boardrules');
		$crawler = self::request('GET', "adm/index.php?i=-phpbb-boardrules-acp-boardrules_module&mode=settings&sid={$this->sid}");
		$form = $crawler->selectButton('submit')->form();
		$crawler = self::submit($form);
		$this->assertContainsLang('ACP_BOARDRULES_SETTINGS_CHANGED', $crawler->text());

		// Confirm the log entry has been added correctly
		$crawler = self::request('GET', 'adm/index.php?i=acp_logs&mode=admin&sid=' . $this->sid);
		self::assertStringContainsString(strip_tags($this->lang('ACP_BOARDRULES_SETTINGS_LOG')), $crawler->text());
	}

	/**
	* Test Board Rules ACP manage permission
	*/
	public function test_boardrules_acp_permissions()
	{
		$this->login();
		$this->admin_login();

		$this->add_lang_ext('phpbb/boardrules', 'permissions_boardrules');
		$crawler = self::request('GET', "adm/index.php?i=acp_permissions&mode=setting_group_global&sid={$this->sid}");
		$form = $crawler->selectButton('submit')->form();

		// Select Administrative permissions option
		$form->get('type')->setValue('a_');
		$crawler = self::submit($form);

		$this->assertContainsLang('ACL_A_BOARDRULES', $crawler->text());
	}

	/**
	 * Test complete language ruleset copy and publication workflow
	 */
	public function test_language_ruleset_copy_and_publish()
	{
		$this->login();
		$this->admin_login();
		$this->get_db();

		$sql = "SELECT lang_id
			FROM phpbb_lang
			WHERE lang_iso = 'fr'";
		$result = $this->db->sql_query_limit($sql, 1);
		$french_language_id = $this->db->sql_fetchfield('lang_id');
		$this->db->sql_freeresult($result);

		if (!$french_language_id)
		{
			$sql = 'INSERT INTO phpbb_lang ' . $this->db->sql_build_array('INSERT', array(
				'lang_iso' => 'fr',
				'lang_dir' => 'fr',
				'lang_english_name' => 'French',
				'lang_local_name' => 'Français',
				'lang_author' => 'phpBB Limited',
			));
			$this->db->sql_query($sql);
		}

		$this->db->sql_query("DELETE FROM phpbb_boardrules WHERE rule_language = 'fr'");
		$this->db->sql_query("DELETE FROM phpbb_boardrules_rulesets WHERE language_iso = 'fr'");

		$sql = "SELECT COUNT(rule_id) AS rule_count
			FROM phpbb_boardrules
			WHERE rule_language = 'en'";
		$result = $this->db->sql_query($sql);
		$source_count = (int) $this->db->sql_fetchfield('rule_count');
		$this->db->sql_freeresult($result);

		$crawler = self::request('GET', "adm/index.php?i=\\phpbb\\boardrules\\acp\\boardrules_module&mode=manage&language=fr&sid={$this->sid}");
		self::assertCount(1, $crawler->filter('.boardrules-action-bar .boardrules-button'));
		self::assertCount(1, $crawler->filter('.boardrules-action-bar .fa-copy'));
		$this->assertContainsLang('ACP_BOARDRULES_COPY_ACTION', $crawler->filter('.boardrules-action-bar')->text());

		$result = $this->db->sql_query_limit("SELECT rule_anchor FROM phpbb_boardrules WHERE rule_language = 'en' AND rule_anchor <> '' ORDER BY rule_id", 1);
		$conflicting_anchor = $this->db->sql_fetchfield('rule_anchor');
		$this->db->sql_freeresult($result);
		self::assertNotFalse($conflicting_anchor);

		$result = $this->db->sql_query('SELECT MAX(rule_right_id) AS max_right_id FROM phpbb_boardrules');
		$existing_rule_left_id = (int) $this->db->sql_fetchfield('max_right_id') + 1;
		$this->db->sql_freeresult($result);
		$existing_rule_right_id = $existing_rule_left_id + 1;

		$sql = 'INSERT INTO phpbb_boardrules ' . $this->db->sql_build_array('INSERT', array(
			'rule_language' => 'fr',
			'rule_left_id' => $existing_rule_left_id,
			'rule_right_id' => $existing_rule_right_id,
			'rule_parent_id' => 0,
			'rule_parents' => '',
			'rule_anchor' => $conflicting_anchor,
			'rule_title' => 'Existing French rule',
			'rule_message' => '',
			'rule_message_bbcode_uid' => '',
			'rule_message_bbcode_bitfield' => '',
			'rule_message_bbcode_options' => 7,
		));
		$this->db->sql_query($sql);

		$crawler = self::request('GET', "adm/index.php?i=\\phpbb\\boardrules\\acp\\boardrules_module&mode=manage&sid={$this->sid}");
		$this->assertContainsLang('ACP_BOARDRULES_LANGUAGES', $crawler->filter('#main')->text());
		self::assertStringContainsString('Français', $crawler->filter('#main')->text());
		self::assertGreaterThan(0, $crawler->filter('a[href*="return_to=dashboard"]')->count());

		$crawler = self::request('GET', "adm/index.php?i=\\phpbb\\boardrules\\acp\\boardrules_module&mode=manage&action=copy&language=fr&return_to=dashboard&sid={$this->sid}");
		$this->assertContainsLang('ACP_BOARDRULES_COPY_APPEND', $crawler->filter('#main')->text());
		$form = $crawler->selectButton($this->lang('ACP_BOARDRULES_COPY_ACTION'))->form(array(
			'source_language' => 'en',
		));
		$crawler = self::submit($form);
		self::assertGreaterThan(0, $crawler->filter('.successbox')->count());
		self::assertStringContainsString($this->lang('ACP_BOARDRULES_COPY_SUCCESS', $source_count, 'Français'), $crawler->text());
		self::assertStringContainsString($this->lang('ACP_BOARDRULES_COPY_ANCHORS_RENAMED', 1), $crawler->text());
		self::assertStringNotContainsString('language=fr', html_entity_decode($crawler->filter('.successbox a')->attr('href')));

		$crawler = self::request('GET', "adm/index.php?i=\\phpbb\\boardrules\\acp\\boardrules_module&mode=manage&language=fr&sid={$this->sid}");
		$this->assertContainsLang('ACP_BOARDRULES_DRAFT_NOTICE', $crawler->filter('#main')->text());
		self::assertCount(1, $crawler->filter('.boardrules-language-toolbar'));
		self::assertCount(2, $crawler->filter('.boardrules-language-toolbar .boardrules-button'));
		self::assertCount(2, $crawler->filter('.boardrules-action-bar .boardrules-button'));
		self::assertCount(1, $crawler->filter('.boardrules-action-bar .fa-copy'));
		self::assertCount(1, $crawler->filter('.boardrules-action-bar .fa-eye'));
		$this->assertContainsLang('ACP_BOARDRULES_COPY_ACTION', $crawler->filter('.boardrules-action-bar')->text());
		$this->assertContainsLang('ACP_BOARDRULES_PUBLISH', $crawler->filter('.boardrules-action-bar')->text());

		$publish_url = "adm/index.php?i=\\phpbb\\boardrules\\acp\\boardrules_module&mode=manage&action=publish&language=fr&return_to=dashboard&sid={$this->sid}";
		$crawler = self::request('GET', $publish_url);
		$form = $crawler->selectButton('cancel')->form();
		$crawler = self::submit($form);
		$this->assertContainsLang('ACP_BOARDRULES_LANGUAGES', $crawler->filter('#main')->text());

		$crawler = self::request('GET', $publish_url);
		$form = $crawler->selectButton('confirm')->form();
		$crawler = self::submit($form);
		self::assertGreaterThan(0, $crawler->filter('.successbox')->count());
		$this->assertContainsLang('ACP_BOARDRULES_PUBLISH_SUCCESS', $crawler->text());
		self::assertStringNotContainsString('language=fr', html_entity_decode($crawler->filter('.successbox a')->attr('href')));

		$sql = "SELECT rules_published
			FROM phpbb_boardrules_rulesets
			WHERE language_iso = 'fr'";
		$result = $this->db->sql_query($sql);
		self::assertSame(1, (int) $this->db->sql_fetchfield('rules_published'));
		$this->db->sql_freeresult($result);

		$crawler = self::request('GET', "adm/index.php?i=\\phpbb\\boardrules\\acp\\boardrules_module&mode=manage&language=fr&sid={$this->sid}");
		self::assertCount(1, $crawler->filter('.boardrules-action-bar .fa-copy'));
		self::assertCount(1, $crawler->filter('.boardrules-action-bar .fa-eye-slash'));

		$sql = "SELECT COUNT(rule_id) AS rule_count
			FROM phpbb_boardrules
			WHERE rule_language = 'fr'";
		$result = $this->db->sql_query($sql);
		self::assertSame($source_count + 1, (int) $this->db->sql_fetchfield('rule_count'));
		$this->db->sql_freeresult($result);

		$result = $this->db->sql_query("SELECT rule_left_id, rule_right_id FROM phpbb_boardrules WHERE rule_language = 'fr' AND rule_title = 'Existing French rule'");
		$existing_rule = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);
		self::assertSame($existing_rule_left_id, (int) $existing_rule['rule_left_id']);
		self::assertSame($existing_rule_right_id, (int) $existing_rule['rule_right_id']);

		$sql = "SELECT 1 AS anchor_found
			FROM phpbb_boardrules
			WHERE rule_language = 'fr'
				AND rule_anchor = '" . $this->db->sql_escape($conflicting_anchor . '-2') . "'";
		$result = $this->db->sql_query_limit($sql, 1);
		self::assertSame(1, (int) $this->db->sql_fetchfield('anchor_found'));
		$this->db->sql_freeresult($result);

		$crawler = self::request('GET', "adm/index.php?i=\\phpbb\\boardrules\\acp\\boardrules_module&mode=manage&action=draft&language=fr&return_to=dashboard&sid={$this->sid}");
		$form = $crawler->selectButton('confirm')->form();
		$crawler = self::submit($form);
		self::assertGreaterThan(0, $crawler->filter('.successbox')->count());
		$this->assertContainsLang('ACP_BOARDRULES_DRAFT_SUCCESS', $crawler->text());
		self::assertStringNotContainsString('language=fr', html_entity_decode($crawler->filter('.successbox a')->attr('href')));

		$result = $this->db->sql_query("SELECT rules_published FROM phpbb_boardrules_rulesets WHERE language_iso = 'fr'");
		self::assertSame(0, (int) $this->db->sql_fetchfield('rules_published'));
		$this->db->sql_freeresult($result);

		$result = $this->db->sql_query("SELECT rule_id, rule_left_id, rule_right_id, rule_parent_id
			FROM phpbb_boardrules
			WHERE rule_language = 'en'
			ORDER BY rule_id");
		$english_tree = $this->db->sql_fetchrowset($result);
		$this->db->sql_freeresult($result);

		$result = $this->db->sql_query_limit("SELECT rule_id
			FROM phpbb_boardrules
			WHERE rule_language = 'fr'
				AND rule_right_id - rule_left_id > 1
			ORDER BY rule_right_id - rule_left_id DESC", 1);
		$copied_category_id = (int) $this->db->sql_fetchfield('rule_id');
		$this->db->sql_freeresult($result);
		self::assertGreaterThan(0, $copied_category_id);

		$crawler = self::request('GET', "adm/index.php?i=\\phpbb\\boardrules\\acp\\boardrules_module&mode=manage&language=fr&action=delete&rule_id={$copied_category_id}&sid={$this->sid}");
		$form = $crawler->selectButton('confirm')->form();
		$crawler = self::submit($form);
		self::assertGreaterThan(0, $crawler->filter('.successbox')->count());
		$this->assertContainsLang('ACP_RULE_DELETED', $crawler->text());

		$result = $this->db->sql_query("SELECT rule_id, rule_left_id, rule_right_id, rule_parent_id
			FROM phpbb_boardrules
			WHERE rule_language = 'en'
			ORDER BY rule_id");
		self::assertSame($english_tree, $this->db->sql_fetchrowset($result));
		$this->db->sql_freeresult($result);
	}
}
