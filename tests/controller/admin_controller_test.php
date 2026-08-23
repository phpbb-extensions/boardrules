<?php
/**
 *
 * Board Rules extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\boardrules\tests\controller;

require_once __DIR__ . '/admin_test_helpers.php';

use phpbb\boardrules\controller\admin_controller;
use phpbb\boardrules\controller\admin_test_state;

class admin_controller_test extends \phpbb_database_test_case
{
	/** @var admin_controller */
	protected $controller;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\boardrules\operators\rule */
	protected $rule_operator;

	/** @var \phpbb\boardrules\operators\ruleset */
	protected $ruleset_operator;

	/** @var \phpbb\template\template|\PHPUnit\Framework\MockObject\MockObject */
	protected $template;

	/** @var \phpbb\request\request|\PHPUnit\Framework\MockObject\MockObject */
	protected $request;

	/** @var \phpbb\notification\manager|\PHPUnit\Framework\MockObject\MockObject */
	protected $notification_manager;

	/** @var \phpbb\log\log|\PHPUnit\Framework\MockObject\MockObject */
	protected $log;

	/** @var array */
	protected $variables = array();

	/** @var array */
	protected $post = array();

	/** @var bool */
	protected $ajax = false;

	/** @var array */
	protected $assigned_vars = array();

	/** @var array */
	protected $blocks = array();

	protected static function setup_extensions()
	{
		return array('phpbb/boardrules');
	}

	public function getDataSet()
	{
		return $this->createXMLDataSet(__DIR__ . '/../operators/fixtures/ruleset.xml');
	}

	protected function setUp(): void
	{
		parent::setUp();

		global $cache, $config, $db, $language, $phpbb_container, $phpbb_dispatcher, $phpbb_path_helper, $phpbb_root_path, $phpEx, $request, $user;

		admin_test_state::reset();
		$this->db = $db = $this->new_dbal();
		$config = $this->config = new \phpbb\config\config(array(
			'boardrules_enable' => 1,
			'boardrules_font_icon' => 'fa-gavel',
			'boardrules_header_link' => 1,
			'boardrules_require_at_registration' => 0,
			'boardrules_list_style' => 'unordered',
			'boardrules_notification' => 4,
			'boardrules.table_lock.boardrules_table' => 0,
			'default_lang' => 'en',
			'sitename' => 'Test board',
		));
		$phpbb_dispatcher = new \phpbb_mock_event_dispatcher();
		$cache = new \phpbb_mock_cache();
		$request = new \phpbb_mock_request();
		$request->overwrite('SCRIPT_NAME', '/app.php', \phpbb\request\request_interface::SERVER);
		$request->overwrite('SCRIPT_FILENAME', 'app.php', \phpbb\request\request_interface::SERVER);
		$request->overwrite('REQUEST_URI', '/app.php', \phpbb\request\request_interface::SERVER);
		$phpbb_path_helper = $this->getMockBuilder(\phpbb\path_helper::class)
			->disableOriginalConstructor()
			->getMock();
		$this->get_test_case_helpers()->set_s9e_services($phpbb_container);

		$loader = new \phpbb\language\language_file_loader($phpbb_root_path, $phpEx);
		$language = new \phpbb\language\language($loader);
		$language->set_default_language('en');
		$language->set_user_language('en');
		$language->add_lang('boardrules_acp', 'phpbb/boardrules');
		$language_loader = $this->createMock(\phpbb\language\language_file_loader::class);
		$language_loader->method('load_extension')
			->willReturnCallback(function ($extension, $component, $locales, &$lang) {
				$lang['BOARDRULES_EXPLAIN'] = 'Fallback for %s.';
			});
		$user = new \phpbb\user($language, '\\phpbb\\datetime');
		$user->data['user_id'] = 2;
		$user->data['user_options'] = 230271;
		$user->style['style_path'] = 'prosilver';
		$user->ip = '127.0.0.1';

		$container = $this->createMock(\Symfony\Component\DependencyInjection\ContainerInterface::class);
		$container->method('get')
			->with('phpbb.boardrules.entity')
			->willReturnCallback(function () {
				return new \phpbb\boardrules\entity\rule($this->db, 'phpbb_boardrules');
			});

		$lock = new \phpbb\lock\db('boardrules.table_lock.boardrules_table', $this->config, $this->db);
		$nestedset = new \phpbb\boardrules\operators\nestedset_rules($this->db, $lock, 'phpbb_boardrules');
		$this->ruleset_operator = new \phpbb\boardrules\operators\ruleset(
			$this->db,
			$lock,
			'phpbb_boardrules',
			'phpbb_boardrules_rulesets'
		);
		$this->rule_operator = new \phpbb\boardrules\operators\rule($container, $nestedset, $this->ruleset_operator, $lock);

		$this->request = $this->createMock(\phpbb\request\request::class);
		$this->request->method('variable')
			->willReturnCallback(function ($name, $default) {
				return array_key_exists($name, $this->variables) ? $this->variables[$name] : $default;
			});
		$this->request->method('is_set_post')
			->willReturnCallback(function ($name) {
				return !empty($this->post[$name]);
			});
		$this->request->method('is_ajax')
			->willReturnCallback(function () {
				return $this->ajax;
			});

		$this->template = $this->createMock(\phpbb\template\template::class);
		$this->template->method('assign_vars')
			->willReturnCallback(function (array $vars) {
				$this->assigned_vars = array_merge($this->assigned_vars, $vars);
			});
		$this->template->method('assign_block_vars')
			->willReturnCallback(function ($block, array $vars) {
				$this->blocks[$block][] = $vars;
			});

		$helper = $this->createMock(\phpbb\controller\helper::class);
		$helper->method('route')->willReturnCallback(function ($route) {
			return '/' . $route;
		});
		$this->log = $this->createMock(\phpbb\log\log::class);
		$this->notification_manager = $this->createMock(\phpbb\notification\manager::class);

		$this->controller = new admin_controller(
			$this->config,
			$container,
			$helper,
			$this->db,
			$language,
			$language_loader,
			$this->log,
			$this->notification_manager,
			$this->request,
			$this->rule_operator,
			$this->ruleset_operator,
			$this->template,
			$user,
			$phpbb_root_path,
			$phpEx
		);
		$this->controller->set_page_url('adm.php?i=boardrules');
	}

	public function test_display_options_without_submission(): void
	{
		$this->controller->display_options();

		self::assertSame(array('boardrules_settings'), admin_test_state::$form_keys);
		self::assertFalse($this->assigned_vars['S_ERROR']);
		self::assertSame('adm.php?i=boardrules', $this->assigned_vars['U_ACTION']);
		self::assertSame('fa-gavel', $this->assigned_vars['BOARDRULES_FONT_ICON']);
		self::assertTrue($this->assigned_vars['S_BOARDRULES_ENABLE']);
		self::assertStringContainsString('"selected":"unordered"', $this->assigned_vars['S_BOARDRULES_LIST_STYLE']);
		self::assertStringContainsString('"compound":"ACP_BOARDRULES_LIST_STYLE_COMPOUND"', $this->assigned_vars['S_BOARDRULES_LIST_STYLE']);
		self::assertStringNotContainsString('"disc":', $this->assigned_vars['S_BOARDRULES_LIST_STYLE']);
	}

	public function test_display_options_rejects_invalid_form(): void
	{
		admin_test_state::$valid_form = false;
		$this->post['submit'] = true;

		$this->controller->display_options();

		self::assertTrue($this->assigned_vars['S_ERROR']);
		self::assertNotSame('', $this->assigned_vars['ERROR_MSG']);
		self::assertSame('fa-gavel', $this->config['boardrules_font_icon']);
	}

	public function test_display_options_valid_submission_updates_settings_and_logs(): void
	{
		$this->post['submit'] = true;
		$this->variables = array(
			'boardrules_font_icon' => 'fa-scale-balanced',
			'boardrules_enable' => 1,
			'boardrules_header_link' => 0,
			'boardrules_require_at_registration' => 1,
			'boardrules_list_style' => 'none',
		);
		$this->log->expects(self::once())
			->method('add')
			->with('admin', 2, '127.0.0.1', 'ACP_BOARDRULES_SETTINGS_LOG');
		$this->setExpectedTriggerError(E_USER_NOTICE, 'ACP_BOARDRULES_SETTINGS_CHANGED');

		$this->controller->display_options();
	}

	public static function options_data(): array
	{
		return array(
			'ordered list and empty icon' => array('', '', ''),
			'unordered list and valid icon' => array('fa-book-open', 'unordered', 'unordered'),
			'compound numbering' => array('fa-list-ol', 'compound', 'compound'),
			'no markers' => array('rules-123', 'none', 'none'),
			'invalid list style falls back' => array('fa-gavel', 'url(javascript:bad)', ''),
		);
	}

	/**
	 * @dataProvider options_data
	 */
	public function test_set_options_validates_and_persists_values($icon, $list_style, $expected_style): void
	{
		$this->variables = array(
			'boardrules_font_icon' => $icon,
			'boardrules_enable' => 0,
			'boardrules_header_link' => 0,
			'boardrules_require_at_registration' => 1,
			'boardrules_list_style' => $list_style,
		);

		$this->invoke_protected('set_options');

		self::assertSame($icon, $this->config['boardrules_font_icon']);
		self::assertSame(0, $this->config['boardrules_enable']);
		self::assertSame(0, $this->config['boardrules_header_link']);
		self::assertSame(1, $this->config['boardrules_require_at_registration']);
		self::assertSame($expected_style, $this->config['boardrules_list_style']);
	}

	public static function invalid_icon_data(): array
	{
		return array(
			'whitespace' => array('fa gavel'),
			'uppercase' => array('FA-GAVEL'),
			'html' => array('<i>'),
			'underscore' => array('fa_gavel'),
		);
	}

	/**
	 * @dataProvider invalid_icon_data
	 */
	public function test_set_options_rejects_unsafe_font_icon($icon): void
	{
		$this->variables['boardrules_font_icon'] = $icon;
		$this->setExpectedTriggerError(E_USER_WARNING, 'ACP_BOARDRULES_FONT_ICON_INVALID|back:adm.php?i=boardrules');

		$this->invoke_protected('set_options');
	}

	public function test_display_language_dashboard_covers_empty_published_and_draft_states(): void
	{
		$this->ruleset_operator->set_published('en', true);
		$this->controller->display_language_dashboard();

		self::assertCount(3, $this->blocks['languages']);
		self::assertTrue($this->blocks['languages'][0]['S_DEFAULT']);
		self::assertTrue($this->blocks['languages'][0]['S_PUBLISHED']);
		self::assertFalse($this->blocks['languages'][0]['S_DRAFT']);
		self::assertTrue($this->blocks['languages'][1]['S_EMPTY']);
		self::assertTrue($this->blocks['languages'][1]['S_CAN_COPY']);
		self::assertTrue($this->assigned_vars['S_LANGUAGE_DASHBOARD']);
	}

	public function test_display_rules_uses_real_tree_and_skips_nested_children(): void
	{
		$this->controller->display_rules('en');

		self::assertCount(3, $this->blocks['language_options']);
		self::assertCount(1, $this->blocks['rules']);
		self::assertSame('General', $this->blocks['rules'][0]['RULE_TITLE']);
		self::assertTrue($this->blocks['rules'][0]['S_IS_CATEGORY']);
		self::assertCount(0, $this->blocks['breadcrumb'] ?? array());
		self::assertSame('English', $this->assigned_vars['CURRENT_LANGUAGE']);
		self::assertSame(3, $this->assigned_vars['CURRENT_RULE_COUNT']);
		self::assertTrue($this->assigned_vars['S_DEFAULT_LANGUAGE']);
		self::assertTrue($this->assigned_vars['S_RULESET_ROOT']);
		self::assertSame('', $this->assigned_vars['BOARDRULES_INTRO_TEXT']);
		self::assertSame('Fallback for Test board.', $this->assigned_vars['BOARDRULES_INTRO_FALLBACK']);
		self::assertSame(array('boardrules_intro', 'add_edit_rule'), admin_test_state::$form_keys);
		self::assertSame(array(
			'boardrules_intro' => '_INTRO',
			'add_edit_rule' => '_ADD_RULE',
		), admin_test_state::$form_key_suffixes);
	}

	public function test_display_rules_escapes_encoded_sitename_once(): void
	{
		$this->config->set('sitename', 'Extension &quot;Development&quot;');

		$this->controller->display_rules('en');

		self::assertSame('Fallback for Extension "Development".', $this->assigned_vars['BOARDRULES_INTRO_FALLBACK']);
	}

	public function test_display_rules_for_parent_builds_breadcrumb_and_direct_children(): void
	{
		$this->controller->display_rules('en', 1);

		self::assertCount(2, $this->blocks['rules']);
		self::assertSame(array('Be kind', 'Stay on topic'), array_column($this->blocks['rules'], 'RULE_TITLE'));
		self::assertSame('General', $this->blocks['breadcrumb'][0]['RULE_TITLE']);
		self::assertTrue($this->blocks['breadcrumb'][0]['S_CURRENT_LEVEL']);
		self::assertFalse($this->assigned_vars['S_RULESET_ROOT']);
	}

	public function test_save_ruleset_intro_persists_and_logs(): void
	{
		$this->variables['boardrules_intro_text'] = '  Custom introduction.  ';
		$this->log->expects(self::once())
			->method('add')
			->with('admin', 2, '127.0.0.1', 'ACP_BOARDRULES_INTRO_LOG', false, array('fr'));
		$this->setExpectedTriggerError(E_USER_NOTICE, 'ACP_BOARDRULES_INTRO_SAVED');

		$this->controller->save_ruleset_intro('fr');
	}

	public function test_save_empty_ruleset_intro_restores_fallback(): void
	{
		$this->ruleset_operator->set_intro_text('fr', 'Custom');
		$this->variables['boardrules_intro_text'] = '   ';
		$this->setExpectedTriggerError(E_USER_NOTICE, 'ACP_BOARDRULES_INTRO_SAVED');

		$this->controller->save_ruleset_intro('fr');
	}

	public function test_save_ruleset_intro_rejects_invalid_form(): void
	{
		admin_test_state::$valid_form = false;
		$this->setExpectedTriggerError(E_USER_WARNING, 'The submitted form was invalid. Try submitting again.');

		$this->controller->save_ruleset_intro('fr');
	}

	public function test_save_ruleset_intro_rejects_unknown_language(): void
	{
		$this->setExpectedTriggerError(E_USER_WARNING, 'ACP_BOARDRULES_INVALID_LANGUAGE');

		$this->controller->save_ruleset_intro('xx');
	}

	public function test_display_rules_rejects_unknown_language(): void
	{
		$this->setExpectedTriggerError(E_USER_WARNING, 'ACP_BOARDRULES_INVALID_LANGUAGE|back:adm.php?i=boardrules');
		$this->controller->display_rules('xx');
	}

	public function test_copy_ruleset_form_only_lists_nonempty_other_languages(): void
	{
		$this->controller->copy_ruleset('fr', 'dashboard');

		self::assertSame(array('copy_ruleset'), admin_test_state::$form_keys);
		self::assertCount(1, $this->blocks['copy_sources']);
		self::assertSame('en', $this->blocks['copy_sources'][0]['LANG_ISO']);
		self::assertTrue($this->blocks['copy_sources'][0]['S_SELECTED']);
		self::assertTrue($this->assigned_vars['S_COPY_RULESET']);
		self::assertSame('Français', $this->assigned_vars['TARGET_LANGUAGE']);
		self::assertSame('adm.php?i=boardrules', $this->assigned_vars['U_BACK']);
	}

	public function test_copy_ruleset_submit_uses_real_operator(): void
	{
		$this->post['submit'] = true;
		$this->variables['source_language'] = 'en';
		$this->log->expects(self::once())->method('add');
		$this->setExpectedTriggerError(E_USER_NOTICE, 'ACP_BOARDRULES_COPY_SUCCESS');

		$this->controller->copy_ruleset('fr');
	}

	public function test_copy_ruleset_reports_renamed_anchor_count(): void
	{
		$this->ruleset_operator->copy('en', 'fr');
		$this->post['submit'] = true;
		$this->variables['source_language'] = 'en';
		$this->setExpectedTriggerError(E_USER_NOTICE, 'ACP_BOARDRULES_COPY_ANCHORS_RENAMED');

		$this->controller->copy_ruleset('fr');
	}

	public function test_copy_ruleset_translates_operator_error(): void
	{
		$this->post['submit'] = true;
		$this->variables['source_language'] = 'de';
		$this->setExpectedTriggerError(E_USER_WARNING, 'ACP_BOARDRULES_COPY_SOURCE_EMPTY');

		$this->controller->copy_ruleset('fr');
	}

	public function test_copy_ruleset_does_not_swallow_unexpected_operator_exception(): void
	{
		$ruleset_operator = $this->getMockBuilder(\phpbb\boardrules\operators\ruleset::class)
			->disableOriginalConstructor()
			->setMethods(array('get_languages', 'copy'))
			->getMock();
		$ruleset_operator->method('get_languages')->willReturn(array(
			array('lang_iso' => 'en', 'lang_local_name' => 'English', 'rule_count' => 3),
			array('lang_iso' => 'fr', 'lang_local_name' => 'Français', 'rule_count' => 0),
		));
		$ruleset_operator->expects(self::once())
			->method('copy')
			->with('en', 'fr')
			->willThrowException(new \Exception('ACP_BOARDRULES_COPY_FAILED'));
		$this->replace_controller_service('ruleset_operator', $ruleset_operator);
		$this->post['submit'] = true;
		$this->variables['source_language'] = 'en';
		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('ACP_BOARDRULES_COPY_FAILED');

		$this->controller->copy_ruleset('fr');
	}

	public function test_copy_ruleset_rejects_invalid_form(): void
	{
		admin_test_state::$valid_form = false;
		$this->post['submit'] = true;
		$this->setExpectedTriggerError(E_USER_WARNING, 'The submitted form was invalid. Try submitting again.|back:adm.php?i=boardrules&amp;language=fr');

		$this->controller->copy_ruleset('fr');
	}

	public function test_copy_ruleset_rejects_unknown_target(): void
	{
		$this->setExpectedTriggerError(E_USER_WARNING, 'ACP_BOARDRULES_COPY_INVALID_LANGUAGE|back:adm.php?i=boardrules');
		$this->controller->copy_ruleset('xx');
	}

	public function test_ruleset_status_confirmation_preserves_dashboard_return(): void
	{
		admin_test_state::$confirm = false;
		$this->controller->set_ruleset_published('en', true, 'dashboard');

		self::assertCount(1, admin_test_state::$confirmations);
		self::assertStringContainsString('return_to=dashboard', admin_test_state::$confirmations[0]['hidden']);
		self::assertSame(array('adm.php?i=boardrules'), admin_test_state::$redirects);
	}

	public function test_ruleset_can_be_published(): void
	{
		$this->log->expects(self::once())->method('add');
		$this->setExpectedTriggerError(E_USER_NOTICE, 'ACP_BOARDRULES_PUBLISH_SUCCESS');
		$this->controller->set_ruleset_published('en', true);
	}

	public function test_default_ruleset_cannot_be_drafted(): void
	{
		$this->setExpectedTriggerError(E_USER_WARNING, 'ACP_BOARDRULES_DEFAULT_CANNOT_DRAFT');
		$this->controller->set_ruleset_published('en', false);
	}

	public function test_empty_ruleset_cannot_be_published(): void
	{
		$this->setExpectedTriggerError(E_USER_WARNING, 'ACP_BOARDRULES_STATUS_CHANGE_EMPTY');
		$this->controller->set_ruleset_published('fr', true);
	}

	public function test_add_rule_initial_form_uses_real_entity(): void
	{
		$this->controller->add_rule('fr');

		self::assertSame(array('add_edit_rule'), admin_test_state::$form_keys);
		self::assertTrue($this->assigned_vars['S_ADD_RULE']);
		self::assertFalse($this->assigned_vars['S_ERROR']);
		self::assertSame('', $this->assigned_vars['RULE_TITLE']);
		self::assertSame(1, admin_test_state::$custom_bbcodes_displayed);
	}

	public function test_add_rule_preview_renders_parsed_content(): void
	{
		$this->post['preview'] = true;
		$this->variables = array(
			'rule_title' => 'Preview title',
			'rule_anchor' => 'preview-anchor',
			'rule_message' => '[b]Preview[/b]',
		);

		$this->controller->add_rule('fr');

		self::assertTrue($this->assigned_vars['S_PREVIEW']);
		self::assertSame('Preview title', $this->assigned_vars['RULE_TITLE_PREVIEW']);
		self::assertStringContainsString('Preview', $this->assigned_vars['RULE_MESSAGE_PREVIEW']);
	}

	public function test_add_rule_collects_validation_errors(): void
	{
		admin_test_state::$valid_form = false;
		$this->post['submit'] = true;
		$this->variables = array(
			'rule_title' => '',
			'rule_anchor' => 'contains space',
		);

		$this->controller->add_rule('fr');

		self::assertTrue($this->assigned_vars['S_ERROR']);
		self::assertStringContainsString('The submitted form was invalid. Try submitting again.', $this->assigned_vars['ERROR_MSG']);
		self::assertStringContainsString('ACP_RULE_TITLE_EMPTY', $this->assigned_vars['ERROR_MSG']);
	}

	public function test_add_rule_submit_inserts_real_rule(): void
	{
		$this->post['submit'] = true;
		$this->variables = array(
			'rule_title' => 'Nouvelle règle',
			'rule_anchor' => 'nouvelle-regle',
			'rule_message' => 'Soyez aimable.',
		);
		$this->setExpectedTriggerError(E_USER_NOTICE, 'ACP_RULE_ADDED');

		$this->controller->add_rule('fr');
	}

	public function test_edit_rule_initial_form_loads_real_entity(): void
	{
		$this->controller->edit_rule(2);

		self::assertTrue($this->assigned_vars['S_EDIT_RULE']);
		self::assertFalse($this->assigned_vars['S_IS_CATEGORY']);
		self::assertSame('Be kind', $this->assigned_vars['RULE_TITLE']);
		self::assertSame('be-kind', $this->assigned_vars['RULE_ANCHOR']);
		self::assertCount(3, $this->blocks['rulemenu']);
		self::assertTrue($this->blocks['rulemenu'][1]['S_DISABLED']);
	}

	public function test_edit_rule_submit_saves_changes(): void
	{
		$this->post['submit'] = true;
		$this->variables = array(
			'rule_title' => 'Be excellent',
			'rule_anchor' => 'be-excellent',
			'rule_message' => 'Updated',
			'rule_parent' => 1,
		);
		$this->setExpectedTriggerError(E_USER_NOTICE, 'ACP_RULE_EDITED');

		$this->controller->edit_rule(2);
	}

	public function test_edit_rule_reports_stale_entity_save(): void
	{
		$entity = $this->mock_entity(2);
		$entity->method('save')->willThrowException(new \phpbb\boardrules\exception\out_of_bounds('rule_id'));
		$this->replace_controller_service('container', $this->entity_container($entity));
		$this->post['submit'] = true;
		$this->setExpectedTriggerError(E_USER_WARNING, 'EXCEPTION_OUT_OF_BOUNDS');

		$this->controller->edit_rule(2);
	}

	public function test_edit_rule_reports_parent_change_failure(): void
	{
		$entity = $this->mock_entity(2);
		$operator = $this->getMockBuilder(\phpbb\boardrules\operators\rule::class)
			->disableOriginalConstructor()
			->getMock();
		$operator->method('change_parent')->willThrowException(new \phpbb\exception\runtime_exception('PARENT_CHANGE_FAILED'));
		$this->replace_controller_service('container', $this->entity_container($entity));
		$this->replace_controller_service('rule_operator', $operator);
		$this->post['submit'] = true;
		$this->variables['rule_parent'] = 3;
		$this->setExpectedTriggerError(E_USER_WARNING, 'PARENT_CHANGE_FAILED');

		$this->controller->edit_rule(2);
	}

	/**
	 * @dataProvider add_rule_operator_error_data
	 */
	public function test_add_rule_reports_operator_errors($exception, $expected): void
	{
		$entity = $this->mock_entity(0);
		$operator = $this->getMockBuilder(\phpbb\boardrules\operators\rule::class)
			->disableOriginalConstructor()
			->getMock();
		$operator->method('add_rule')->willThrowException($exception);
		$this->replace_controller_service('container', $this->entity_container($entity));
		$this->replace_controller_service('rule_operator', $operator);
		$this->post['submit'] = true;
		$this->variables['rule_title'] = 'Valid title';
		$this->setExpectedTriggerError(E_USER_WARNING, $expected);

		$this->controller->add_rule('fr');
	}

	public static function add_rule_operator_error_data(): array
	{
		return array(
			'entity bounds failure' => array(new \phpbb\boardrules\exception\out_of_bounds('rule_id'), 'EXCEPTION_OUT_OF_BOUNDS'),
			'nested-set lock failure' => array(new \phpbb\exception\runtime_exception('RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'), 'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'),
		);
	}

	public function test_delete_rule_requests_confirmation_and_redirects(): void
	{
		admin_test_state::$confirm = false;
		$this->controller->delete_rule(1);

		self::assertCount(1, admin_test_state::$confirmations);
		self::assertStringContainsString('rule_id=1', admin_test_state::$confirmations[0]['hidden']);
		self::assertSame(array('adm.php?i=boardrules&amp;language=en&amp;parent_id=0'), admin_test_state::$redirects);
	}

	public function test_delete_rule_confirmed_deletes_real_tree(): void
	{
		$this->setExpectedTriggerError(E_USER_NOTICE, 'ACP_RULE_DELETED');
		$this->controller->delete_rule(3);
	}

	public function test_delete_rule_reports_operator_failure(): void
	{
		$operator = $this->getMockBuilder(\phpbb\boardrules\operators\rule::class)
			->disableOriginalConstructor()
			->getMock();
		$operator->method('delete_rule')->willThrowException(new \phpbb\exception\runtime_exception('DELETE_FAILED'));
		$this->replace_controller_service('rule_operator', $operator);
		$this->setExpectedTriggerError(E_USER_WARNING, 'DELETE_FAILED');

		$this->controller->delete_rule(3);
	}

	public function test_move_rule_rejects_invalid_hash(): void
	{
		admin_test_state::$valid_link_hash = false;
		$this->setExpectedTriggerError(E_USER_WARNING, 'The submitted form was invalid. Try submitting again.');
		$this->controller->move_rule(2, 'down');
	}

	public function test_move_rule_redirects_to_own_parent(): void
	{
		$this->variables['hash'] = 'hash:down2';
		$this->controller->move_rule(2, 'down');

		self::assertSame(array('adm.php?i=boardrules&amp;language=en&amp;parent_id=1'), admin_test_state::$redirects);
	}

	public function test_move_rule_returns_success_for_ajax_request(): void
	{
		$this->ajax = true;
		\phpbb\json_response::$data = null;

		$this->controller->move_rule(2, 'down');

		self::assertSame(array('success' => true), \phpbb\json_response::$data);
	}

	public function test_move_rule_reports_operator_failure(): void
	{
		$operator = $this->getMockBuilder(\phpbb\boardrules\operators\rule::class)
			->disableOriginalConstructor()
			->getMock();
		$operator->method('move')->willThrowException(new \phpbb\exception\runtime_exception('MOVE_FAILED'));
		$this->replace_controller_service('rule_operator', $operator);
		$this->setExpectedTriggerError(E_USER_WARNING, 'MOVE_FAILED');

		$this->controller->move_rule(2, 'down');
	}

	public function test_send_notification_requests_confirmation(): void
	{
		admin_test_state::$confirm = false;
		$this->controller->send_notification(8);

		self::assertCount(1, admin_test_state::$confirmations);
		self::assertStringContainsString('rule_id=8', admin_test_state::$confirmations[0]['hidden']);
		self::assertSame(4, $this->config['boardrules_notification']);
	}

	public function test_send_notification_increments_counter_and_logs(): void
	{
		$this->notification_manager->expects(self::once())
			->method('add_notifications')
			->with('phpbb.boardrules.notification.type.boardrules', array(
				'rule_id' => 8,
				'notification_id' => 5,
			));
		$this->log->expects(self::once())->method('add');

		$this->controller->send_notification(8);

		self::assertSame(5, $this->config['boardrules_notification']);
	}

	public function test_parent_menu_resets_indentation_after_completed_category(): void
	{
		$sql_ary = array(
			'rule_language' => 'en',
			'rule_left_id' => 7,
			'rule_right_id' => 8,
			'rule_parent_id' => 0,
			'rule_parents' => '',
			'rule_anchor' => 'final',
			'rule_title' => 'Final rule',
			'rule_message' => '',
			'rule_message_bbcode_uid' => '',
			'rule_message_bbcode_bitfield' => '',
			'rule_message_bbcode_options' => 0,
		);
		$this->db->sql_query('INSERT INTO phpbb_boardrules ' . $this->db->sql_build_array('INSERT', $sql_ary));
		$entity = (new \phpbb\boardrules\entity\rule($this->db, 'phpbb_boardrules'))->load(2);

		$this->invoke_protected('build_parent_select_menu', array($entity, 1));

		self::assertSame('Final rule', $this->blocks['rulemenu'][3]['RULE_TITLE']);
		self::assertFalse($this->blocks['rulemenu'][3]['S_DISABLED']);
	}

	protected function mock_entity($id)
	{
		$entity = $this->getMockBuilder(\phpbb\boardrules\entity\rule::class)
			->disableOriginalConstructor()
			->getMock();
		$entity->method('load')->willReturnSelf();
		$entity->method('get_id')->willReturn($id);
		$entity->method('get_language')->willReturn('en');
		$entity->method('get_parent_id')->willReturn(0);
		$entity->method('get_left_id')->willReturn(1);
		$entity->method('get_right_id')->willReturn(2);
		$entity->method('get_title')->willReturn('Title');
		$entity->method('get_anchor')->willReturn('anchor');
		$entity->method('get_message_for_edit')->willReturn('Message');
		$entity->method('get_message_for_display')->willReturn('Message');
		$entity->method('message_bbcode_enabled')->willReturn(true);
		$entity->method('message_magic_url_enabled')->willReturn(true);
		$entity->method('message_smilies_enabled')->willReturn(true);
		return $entity;
	}

	protected function entity_container($entity)
	{
		$container = $this->createMock(\Symfony\Component\DependencyInjection\ContainerInterface::class);
		$container->method('get')->with('phpbb.boardrules.entity')->willReturn($entity);
		return $container;
	}

	protected function replace_controller_service($property, $value): void
	{
		$reflection = new \ReflectionProperty($this->controller, $property);
		$reflection->setAccessible(true);
		$reflection->setValue($this->controller, $value);
	}

	protected function invoke_protected($method, array $arguments = array())
	{
		$reflection = new \ReflectionMethod($this->controller, $method);
		$reflection->setAccessible(true);
		return $reflection->invokeArgs($this->controller, $arguments);
	}
}
