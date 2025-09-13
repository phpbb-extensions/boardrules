<?php

namespace phpbb\boardrules\tests\acp;

class boardrules_info_test extends \phpbb_test_case
{
	/** @var \phpbb\boardrules\acp\boardrules_info */
	protected $boardrules_info;

	public function setUp(): void
	{
		parent::setUp();
		$this->boardrules_info = new \phpbb\boardrules\acp\boardrules_info();
	}

	public function test_module()
	{
		$module_data = $this->boardrules_info->module();

		// Test the basic structure
		$this->assertIsArray($module_data);
		$this->assertArrayHasKey('filename', $module_data);
		$this->assertArrayHasKey('title', $module_data);
		$this->assertArrayHasKey('modes', $module_data);

		// Test specific values
		$this->assertEquals('\phpbb\boardrules\acp\boardrules_module', $module_data['filename']);
		$this->assertEquals('ACP_BOARDRULES', $module_data['title']);

		// Test modes array
		$this->assertArrayHasKey('settings', $module_data['modes']);
		$this->assertArrayHasKey('manage', $module_data['modes']);

		// Test settings mode
		$settings = $module_data['modes']['settings'];
		$this->assertEquals('ACP_BOARDRULES_SETTINGS', $settings['title']);
		$this->assertEquals('ext_phpbb/boardrules && acl_a_boardrules', $settings['auth']);
		$this->assertEquals(['ACP_BOARDRULES'], $settings['cat']);

		// Test manage mode
		$manage = $module_data['modes']['manage'];
		$this->assertEquals('ACP_BOARDRULES_MANAGE', $manage['title']);
		$this->assertEquals('ext_phpbb/boardrules && acl_a_boardrules', $manage['auth']);
		$this->assertEquals(['ACP_BOARDRULES'], $manage['cat']);
	}
}
