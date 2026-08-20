<?php
/**
 *
 * Board Rules extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2025 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\boardrules\tests\system;

use PHPUnit\Framework\MockObject\MockObject;
use phpbb\notification\manager;
use phpbb\finder;
use phpbb\db\migrator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use phpbb\boardrules\ext;

class ext_test extends \phpbb_test_case
{
	/** @var ext */
	private $ext;

	/** @var MockObject|manager */
	private $notification_manager;

	/** @var MockObject|ContainerInterface */
	private $container;

	/** @var MockObject|finder */
	private $extension_finder;

	/** @var MockObject|migrator */
	private $migrator;

	protected function setUp(): void
	{
		parent::setUp();
		$this->initialize_mocks();
		$this->create_extension();
	}

	private function initialize_mocks(): void
	{
		$this->notification_manager = $this->createMock(manager::class);
		$this->container = $this->createMock(ContainerInterface::class);
		$this->extension_finder = $this->createMock(finder::class);
		$this->migrator = $this->createMock(migrator::class);
	}

	private function create_extension(): void
	{
		$this->ext = new ext(
			$this->container,
			$this->extension_finder,
			$this->migrator,
			'phpbb/boardrules',
			''
		);
	}

	private function setup_notification_manager(string $method): void
	{
		$this->container->expects($this->once())
			->method('get')
			->with('notification_manager')
			->willReturn($this->notification_manager);

		$this->notification_manager->expects($this->once())
			->method($method)
			->with('phpbb.boardrules.notification.type.boardrules');
	}

	public function test_is_enableable(): void
	{
		$this->assertTrue($this->ext->is_enableable());
	}

	/**
	 * @dataProvider notification_step_provider
	 */
	public function test_notification_steps(string $method, string $step): void
	{
		$this->setup_notification_manager($method);

		$state = $this->ext->$step(false);
		$this->assertEquals('notifications', $state);
	}

	public function notification_step_provider(): array
	{
		return [
			'enable step'  => ['enable_notifications', 'enable_step'],
			'disable step' => ['disable_notifications', 'disable_step'],
			'purge step'   => ['purge_notifications', 'purge_step']
		];
	}

	public function test_enable_step_delegates_after_notification_step(): void
	{
		$this->extension_finder->expects($this->once())
			->method('extension_directory')
			->with('/migrations')
			->willReturnSelf();
		$this->extension_finder->expects($this->once())
			->method('find_from_extension')
			->with('phpbb/boardrules', '')
			->willReturn(array());
		$this->extension_finder->expects($this->once())
			->method('get_classes_from_files')
			->with(array())
			->willReturn(array());
		$this->migrator->expects($this->once())->method('set_migrations')->with(array());
		$this->migrator->expects($this->once())->method('get_migrations')->willReturn(array());
		$this->migrator->expects($this->once())->method('update');
		$this->migrator->expects($this->once())->method('finished')->willReturn(true);

		self::assertFalse($this->ext->enable_step('notifications'));
	}

	public function test_disable_step_delegates_after_notification_step(): void
	{
		self::assertFalse($this->ext->disable_step('notifications'));
	}

	public function test_purge_step_delegates_after_notification_step(): void
	{
		$this->extension_finder->expects($this->once())->method('extension_directory')->willReturnSelf();
		$this->extension_finder->expects($this->once())->method('find_from_extension')->willReturn(array());
		$this->extension_finder->expects($this->once())->method('get_classes_from_files')->willReturn(array());
		$this->migrator->expects($this->once())->method('set_migrations')->with(array());
		$this->migrator->expects($this->once())->method('get_migrations')->willReturn(array());

		self::assertFalse($this->ext->purge_step('notifications'));
	}
}
