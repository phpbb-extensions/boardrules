<?php
/**
 *
 * Board Rules extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\boardrules\tests\notification;

class boardrules_test extends \phpbb_test_case
{
	/** @var \phpbb\boardrules\notification\boardrules */
	protected $notification;

	/** @var \phpbb\db\driver\driver_interface|\PHPUnit\Framework\MockObject\MockObject */
	protected $db;

	/** @var \phpbb\language\language|\PHPUnit\Framework\MockObject\MockObject */
	protected $language;

	/** @var \phpbb\notification\manager|\PHPUnit\Framework\MockObject\MockObject */
	protected $manager;

	/** @var \phpbb\controller\helper|\PHPUnit\Framework\MockObject\MockObject */
	protected $helper;

	protected function setUp(): void
	{
		parent::setUp();

		global $phpbb_root_path, $phpEx;

		$this->db = $this->createMock(\phpbb\db\driver\driver_interface::class);
		$this->language = $this->createMock(\phpbb\language\language::class);
		$user = $this->createMock(\phpbb\user::class);
		$auth = $this->createMock(\phpbb\auth\auth::class);
		$this->manager = $this->createMock(\phpbb\notification\manager::class);
		$this->helper = $this->createMock(\phpbb\controller\helper::class);
		$avatar_helper = $this->createMock(\phpbb\avatar\helper::class);

		$this->notification = new \phpbb\boardrules\notification\boardrules(
			$avatar_helper,
			$this->helper,
			$this->db,
			$this->language,
			$user,
			$auth,
			$phpbb_root_path,
			$phpEx,
			'phpbb_user_notifications'
		);
		$this->notification->set_controller_helper($this->helper);

		$property = new \ReflectionProperty(\phpbb\notification\type\base::class, 'notification_manager');
		$property->setAccessible(true);
		$property->setValue($this->notification, $this->manager);
	}

	public function test_metadata_and_delivery_contract(): void
	{
		self::assertSame('phpbb.boardrules.notification.type.boardrules', $this->notification->get_type());
		self::assertFalse($this->notification->is_available());
		self::assertSame(42, $this->notification::get_item_id(array('notification_id' => 42)));
		self::assertSame(0, $this->notification::get_item_parent_id(array('notification_id' => 42)));
		self::assertSame(array(), $this->notification->users_to_query());
		self::assertFalse($this->notification->get_email_template());
		self::assertSame(array(), $this->notification->get_email_template_variables());
	}

	public function test_find_users_excludes_ignored_users_and_frees_result(): void
	{
		$this->db->expects(self::once())
			->method('sql_query')
			->with(self::callback(function ($sql) {
				return strpos($sql, 'FROM ' . USERS_TABLE) !== false
					&& strpos($sql, 'user_type <> ' . USER_IGNORE) !== false;
			}))
			->willReturn('result');
		$this->db->expects(self::exactly(3))
			->method('sql_fetchrow')
			->with('result')
			->willReturnOnConsecutiveCalls(
				array('user_id' => 2),
				array('user_id' => 7),
				false
			);
		$this->db->expects(self::once())->method('sql_freeresult')->with('result');
		$this->manager->expects(self::exactly(2))
			->method('get_default_methods')
			->willReturn(array('notification.method.board'));

		self::assertSame(array(
			2 => array('notification.method.board'),
			7 => array('notification.method.board'),
		), $this->notification->find_users_for_notification(array()));
	}

	public function test_find_users_handles_empty_result(): void
	{
		$this->db->method('sql_query')->willReturn('result');
		$this->db->expects(self::once())->method('sql_fetchrow')->with('result')->willReturn(false);
		$this->db->expects(self::once())->method('sql_freeresult')->with('result');
		$this->manager->expects(self::never())->method('get_default_methods');

		self::assertSame(array(), $this->notification->find_users_for_notification(array()));
	}

	public function test_title_uses_language_service(): void
	{
		$this->language->expects(self::once())
			->method('lang')
			->with('BOARDRULES_NOTIFICATION')
			->willReturn('Board rules changed');

		self::assertSame('Board rules changed', $this->notification->get_title());
	}

	public static function url_data(): array
	{
		return array(
			'without anchor' => array(null, array()),
			'zero anchor is omitted' => array(0, array()),
			'with numeric anchor' => array(12, array('#' => 12)),
			'with string anchor' => array('rule-name', array('#' => 'rule-name')),
		);
	}

	/**
	 * @dataProvider url_data
	 */
	public function test_url($rule_id, array $expected_parameters): void
	{
		$this->set_data('rule_id', $rule_id);
		$this->helper->expects(self::once())
			->method('route')
			->with('phpbb_boardrules_main_controller', $expected_parameters)
			->willReturn('/rules');

		self::assertSame('/rules', $this->notification->get_url());
	}

	public function test_create_insert_array_preserves_rule_id_and_notification_id(): void
	{
		$this->notification->create_insert_array(array(
			'notification_id' => 91,
			'rule_id' => 15,
		));
		$insert = $this->notification->get_insert_array();

		self::assertSame(91, $insert['item_id']);
		self::assertSame(0, $insert['item_parent_id']);
		self::assertSame(array('rule_id' => 15), unserialize($insert['notification_data']));
		self::assertFalse($insert['notification_read']);
		self::assertIsInt($insert['notification_time']);
	}

	protected function set_data($key, $value): void
	{
		$method = new \ReflectionMethod(\phpbb\notification\type\base::class, 'set_data');
		$method->setAccessible(true);
		$method->invoke($this->notification, $key, $value);
	}
}
