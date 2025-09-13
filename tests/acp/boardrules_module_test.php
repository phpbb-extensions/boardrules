<?php

namespace phpbb\boardrules\tests\acp;

class boardrules_module_test extends \phpbb_test_case
{
	private const BOARDRULES_ACP = 'boardrules_acp';
	private const PHPBB_BOARDRULES = 'phpbb/boardrules';
	private const TEMPLATE_MANAGE = 'boardrules_manage';
	private const TEMPLATE_SETTINGS = 'boardrules_settings';
	private const DEFAULT_LANGUAGE = 'en';

	/** @var \PHPUnit\Framework\MockObject\MockObject */
	protected $language;

	/** @var \PHPUnit\Framework\MockObject\MockObject */
	protected $admin_controller;

	/** @var \PHPUnit\Framework\MockObject\MockObject */
	protected $request;

	/** @var \phpbb\boardrules\acp\boardrules_module */
	protected $boardrules_module;

	/** @var \phpbb_mock_container_builder */
	protected $container;

	protected function setUp(): void
	{
		parent::setUp();
		$this->initializeMocks();
		$this->setupContainer();
		$this->createBoardrulesModule();
	}

	private function initializeMocks(): void
	{
		$this->language = $this->getMockBuilder('\phpbb\language\language')
			->disableOriginalConstructor()
			->getMock();

		$this->admin_controller = $this->getMockBuilder('\phpbb\boardrules\controller\admin_controller')
			->disableOriginalConstructor()
			->getMock();

		$this->request = $this->getMockBuilder('\phpbb\request\request')
			->disableOriginalConstructor()
			->getMock();
	}

	private function setupContainer(): void
	{
		$this->container = new \phpbb_mock_container_builder();
		$this->container->set('language', $this->language);
		$this->container->set('request', $this->request);
		$this->container->set('phpbb.boardrules.admin.controller', $this->admin_controller);

		global $phpbb_container;
		$phpbb_container = $this->container;
	}

	private function createBoardrulesModule(): void
	{
		$this->boardrules_module = new \phpbb\boardrules\acp\boardrules_module();
	}

	private function setupLanguageExpectation(): void
	{
		$this->language->expects($this->once())
			->method('add_lang')
			->with(self::BOARDRULES_ACP, self::PHPBB_BOARDRULES);
	}

	public function test_settings_mode(): void
	{
		$this->setupLanguageExpectation();
		$this->setupNotificationRequest(false);

		$this->admin_controller->expects($this->once())
			->method('display_options');

		$this->executeModeAndAssert('settings', self::TEMPLATE_SETTINGS, 'ACP_BOARDRULES_SETTINGS');
	}

	public function test_manage_mode_with_empty_language(): void
	{
		$this->setupLanguageExpectation();
		$this->setupEmptyRequestVariables();

		$this->admin_controller->expects($this->once())
			->method('display_language_selection');

		$this->executeModeAndAssert('manage', self::TEMPLATE_MANAGE, 'ACP_BOARDRULES_MANAGE');
	}

	public function test_manage_mode_add_action(): void
	{
		$this->setupLanguageExpectation();
		$this->setupManageRequestVariables('add', self::DEFAULT_LANGUAGE, 1, 0);

		$this->admin_controller->expects($this->once())
			->method('add_rule')
			->with(self::DEFAULT_LANGUAGE, 1);

		$this->executeModeAndAssert('manage', self::TEMPLATE_MANAGE, 'ACP_BOARDRULES_CREATE_RULE');
	}

	public function test_manage_mode_delete_action(): void
	{
		$this->setupLanguageExpectation();
		$this->setupManageRequestVariables('delete', self::DEFAULT_LANGUAGE, 0, 1);

		$this->admin_controller->expects($this->once())
			->method('delete_rule')
			->with(1);

		$this->executeModeAndAssert('manage', self::TEMPLATE_MANAGE, 'ACP_BOARDRULES_MANAGE');
	}

	public function test_manage_mode_edit_action(): void
	{
		$this->setupLanguageExpectation();
		$this->setupManageRequestVariables('edit', self::DEFAULT_LANGUAGE, 0, 1);

		$this->admin_controller->expects($this->once())
			->method('edit_rule')
			->with(1);

		$this->executeModeAndAssert('manage', self::TEMPLATE_MANAGE, 'ACP_BOARDRULES_EDIT_RULE');
	}

	public function test_manage_mode_move_down_action(): void
	{
		$this->setupLanguageExpectation();
		$this->setupManageRequestVariables('move_down', self::DEFAULT_LANGUAGE, 0, 1);

		$this->admin_controller->expects($this->once())
			->method('move_rule')
			->with(1);

		$this->executeModeAndAssert('manage', self::TEMPLATE_MANAGE, 'ACP_BOARDRULES_MANAGE');
	}

	public function test_manage_mode_move_up_action(): void
	{
		$this->setupLanguageExpectation();
		$this->setupManageRequestVariables('move_up', self::DEFAULT_LANGUAGE, 0, 1);

		$this->admin_controller->expects($this->once())
			->method('move_rule')
			->with(1);

		$this->executeModeAndAssert('manage', self::TEMPLATE_MANAGE, 'ACP_BOARDRULES_MANAGE');
	}

	private function setupNotificationRequest(bool $value): void
	{
		$this->request->expects($this->once())
			->method('is_set_post')
			->with('action_send_notification')
			->willReturn($value);
	}

	private function setupEmptyRequestVariables(): void
	{
		$this->request->method('variable')
			->willReturnMap([
				['action', '', ''],
				['language', '', ''],
				['parent_id', 0, 0],
				['rule_id', 0, 0]
			]);
	}

	private function setupManageRequestVariables(string $action, string $language, int $parentId, int $ruleId): void
	{
		$this->request->method('variable')
			->willReturnMap([
				['action', '', false, \phpbb\request\request_interface::REQUEST, $action],
				['language', '', false, \phpbb\request\request_interface::REQUEST, $language],
				['parent_id', 0, false, \phpbb\request\request_interface::REQUEST, $parentId],
				['rule_id', 0, false, \phpbb\request\request_interface::REQUEST, $ruleId]
			]);
	}

	private function executeModeAndAssert(string $mode, string $expectedTemplate, string $expectedTitle): void
	{
		$this->boardrules_module->main(0, $mode);
		$this->assertModuleProperties($expectedTemplate, $expectedTitle);
	}

	private function assertModuleProperties(string $expectedTemplate, string $expectedTitle): void
	{
		$this->assertEquals($expectedTemplate, $this->boardrules_module->tpl_name);
		$this->assertEquals($expectedTitle, $this->boardrules_module->page_title);
	}
}
