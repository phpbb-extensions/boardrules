<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
* (Thanks/credit to nickvergessen for desigining these tests)
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\tests\event;

class listener_test extends \phpbb_test_case
{
	/** @var \phpbb\boardrules\event\listener */
	protected $listener;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \PHPUnit\Framework\MockObject\MockObject|\phpbb\controller\helper */
	protected $controller_helper;

	/** @var \phpbb\language\language */
	protected $lang;

	/** @var \PHPUnit\Framework\MockObject\MockObject|\phpbb\template\template */
	protected $template;

	/** @var string */
	protected $php_ext;

	/**
	* Setup test environment
	*/
	protected function setUp(): void
	{
		parent::setUp();

		global $phpbb_root_path, $phpEx;

		// Load/Mock classes required by the event listener class
		$this->php_ext = $phpEx;
		$this->config = new \phpbb\config\config(array('enable_mod_rewrite' => '0'));
		$this->template = $this->getMockBuilder('\phpbb\template\template')
			->getMock();
		$lang_loader = new \phpbb\language\language_file_loader($phpbb_root_path, $phpEx);
		$this->lang = new \phpbb\language\language($lang_loader);

		$this->controller_helper = $this->getMockBuilder('\phpbb\controller\helper')
			->disableOriginalConstructor()
			->getMock();
		$this->controller_helper->expects(self::atMost(1))
			->method('route')
			->willReturnCallback(function ($route, array $params = array()) {
				return $route . '#' . serialize($params);
			})
		;
	}

	/**
	* Create our event listener
	*/
	protected function set_listener()
	{
		$this->listener = new \phpbb\boardrules\event\listener(
			$this->config,
			$this->controller_helper,
			$this->lang,
			$this->template,
			$this->php_ext
		);
	}

	/**
	* Test the event listener is constructed correctly
	*/
	public function test_construct()
	{
		$this->set_listener();
		self::assertInstanceOf('\Symfony\Component\EventDispatcher\EventSubscriberInterface', $this->listener);
	}

	/**
	* Test the event listener is subscribing events
	*/
	public function test_getSubscribedEvents()
	{
		self::assertEquals(array(
			'core.user_setup',
			'core.page_header',
			'core.viewonline_overwrite_location',
			'core.permissions',
		), array_keys(\phpbb\boardrules\event\listener::getSubscribedEvents()));
	}

	/**
	* Data set for test_load_language_on_setup
	*
	* @return array Array of test data
	*/
	public static function load_language_on_setup_data()
	{
		return array(
			array(
				array(),
				array(
					array(
						'ext_name' => 'phpbb/boardrules',
						'lang_set' => 'boardrules_common',
					),
				),
			),
			array(
				array(
					array(
						'ext_name' => 'foo/bar',
						'lang_set' => 'foobar',
					),
				),
				array(
					array(
						'ext_name' => 'foo/bar',
						'lang_set' => 'foobar',
					),
					array(
						'ext_name' => 'phpbb/boardrules',
						'lang_set' => 'boardrules_common',
					),
				),
			),
		);
	}

	/**
	* Test the load_language_on_setup event
	*
	* @dataProvider load_language_on_setup_data
	*/
	public function test_load_language_on_setup($lang_set_ext, $expected_contains)
	{
		$this->set_listener();

		$dispatcher = new \phpbb\event\dispatcher();
		$dispatcher->addListener('core.user_setup', array($this->listener, 'load_language_on_setup'));

		$event_data = array('lang_set_ext');
		$event_data_after = $dispatcher->trigger_event('core.user_setup', compact($event_data));
		extract($event_data_after, EXTR_OVERWRITE);

		foreach ($expected_contains as $expected)
		{
			self::assertContains($expected, $lang_set_ext);
		}
	}

	/**
	* Data set for test_add_page_header_link
	*
	* @return array Array of test data
	*/
	public static function add_page_header_link_data()
	{
		return array(
			array(1, 1, 1, '', array(
				'BOARDRULES_FONT_ICON' => '',
				'S_BOARDRULES_LINK_ENABLED' => true,
				'S_BOARDRULES_AT_REGISTRATION' => true,
				'U_BOARDRULES' => 'phpbb_boardrules_main_controller#a:0:{}',
			)),
			array(1, 1, 0, 'foo', array(
				'BOARDRULES_FONT_ICON' => 'foo',
				'S_BOARDRULES_LINK_ENABLED' => true,
				'S_BOARDRULES_AT_REGISTRATION' => false,
				'U_BOARDRULES' => 'phpbb_boardrules_main_controller#a:0:{}',
			)),
			array(1, 0, 1, 'bar', array(
				'BOARDRULES_FONT_ICON' => 'bar',
				'S_BOARDRULES_LINK_ENABLED' => false,
				'S_BOARDRULES_AT_REGISTRATION' => true,
				'U_BOARDRULES' => 'phpbb_boardrules_main_controller#a:0:{}',
			)),
			array(1, 0, 0, 'foobar', array(
				'BOARDRULES_FONT_ICON' => 'foobar',
				'S_BOARDRULES_LINK_ENABLED' => false,
				'S_BOARDRULES_AT_REGISTRATION' => false,
				'U_BOARDRULES' => 'phpbb_boardrules_main_controller#a:0:{}',
			)),
			array(0, 1, 1, 'barfoo', array(
				'BOARDRULES_FONT_ICON' => 'barfoo',
				'S_BOARDRULES_LINK_ENABLED' => false,
				'S_BOARDRULES_AT_REGISTRATION' => false,
				'U_BOARDRULES' => 'phpbb_boardrules_main_controller#a:0:{}',
			)),
			array(0, 0, 1, '', array(
				'BOARDRULES_FONT_ICON' => '',
				'S_BOARDRULES_LINK_ENABLED' => false,
				'S_BOARDRULES_AT_REGISTRATION' => false,
				'U_BOARDRULES' => 'phpbb_boardrules_main_controller#a:0:{}',
			)),
			array(0, 1, 0, '', array(
				'BOARDRULES_FONT_ICON' => '',
				'S_BOARDRULES_LINK_ENABLED' => false,
				'S_BOARDRULES_AT_REGISTRATION' => false,
				'U_BOARDRULES' => 'phpbb_boardrules_main_controller#a:0:{}',
			)),
			array(0, 0, 0, '', array(
				'BOARDRULES_FONT_ICON' => '',
				'S_BOARDRULES_LINK_ENABLED' => false,
				'S_BOARDRULES_AT_REGISTRATION' => false,
				'U_BOARDRULES' => 'phpbb_boardrules_main_controller#a:0:{}',
			)),
			array(null, null, null, null, array(
				'BOARDRULES_FONT_ICON' => '',
				'S_BOARDRULES_LINK_ENABLED' => false,
				'S_BOARDRULES_AT_REGISTRATION' => false,
				'U_BOARDRULES' => 'phpbb_boardrules_main_controller#a:0:{}',
			)),
		);
	}

	/**
	* Test the add_page_header_link event
	*
	* @dataProvider add_page_header_link_data
	*/
	public function test_add_page_header_link($enable, $header_link, $require_at_registration, $font_icon, $expected)
	{
		$this->config = new \phpbb\config\config(array(
			'boardrules_enable' => $enable,
			'boardrules_font_icon' => $font_icon,
			'boardrules_header_link' => $header_link,
			'boardrules_require_at_registration' => $require_at_registration,
		));

		$this->set_listener();

		$this->template->expects(self::once())
			->method('assign_vars')
			->with($expected);

		$dispatcher = new \phpbb\event\dispatcher();
		$dispatcher->addListener('core.page_header', array($this->listener, 'add_page_header_link'));
		$dispatcher->trigger_event('core.page_header');
	}

	/**
	* Data set for test_add_permissions
	*
	* @return array Array of test data
	*/
	public static function add_permission_data()
	{
		return array(
			array(
				array(),
				array(
					array(
						'lang' => 'ACL_A_BOARDRULES',
						'cat' => 'misc',
					),
				),
			),
			array(
				array(
					array(
						'lang' => 'ACL_U_FOOBAR',
						'cat' => 'misc',
					),
				),
				array(
					array(
						'lang' => 'ACL_U_FOOBAR',
						'cat' => 'misc',
					),
					array(
						'lang' => 'ACL_A_BOARDRULES',
						'cat' => 'misc',
					),
				),
			),
		);
	}

	/**
	* Test the add_permission event
	*
	* @dataProvider add_permission_data
	*/
	public function test_add_permission($permissions, $expected_contains)
	{
		$this->set_listener();

		$dispatcher = new \phpbb\event\dispatcher();
		$dispatcher->addListener('core.permissions', array($this->listener, 'add_permission'));

		$event_data = array('permissions');
		$event_data_after = $dispatcher->trigger_event('core.permissions', compact($event_data));
		extract($event_data_after, EXTR_OVERWRITE);

		foreach ($expected_contains as $expected)
		{
			self::assertContains($expected, $permissions);
		}
	}

	/**
	* Data set for test_viewonline_page
	*
	* @return array Array of test data
	*/
	public static function viewonline_page_data()
	{
		global $phpEx;

		return array(
			// test when on_page is index
			array(
				array(
					1 => 'index',
				),
				array(),
				'$location_url',
				'$location',
				'$location_url',
				'$location',
			),
			// test when on_page is app and session_page is NOT for boardrules
			array(
				array(
					1 => 'app',
				),
				array(
					'session_page' => 'app.' . $phpEx . '/foobar'
				),
				'$location_url',
				'$location',
				'$location_url',
				'$location',
			),
			// test when on_page is app and session_page is for boardrules
			array(
				array(
					1 => 'app',
				),
				array(
					'session_page' => 'app.' . $phpEx . '/rules'
				),
				'$location_url',
				'$location',
				'phpbb_boardrules_main_controller#a:0:{}',
				'BOARDRULES_VIEWONLINE',
			),
		);
	}

	/**
	* Test the viewonline_page event
	*
	* @dataProvider viewonline_page_data
	*/
	public function test_viewonline_page($on_page, $row, $location_url, $location, $expected_location_url, $expected_location)
	{
		$this->set_listener();

		$dispatcher = new \phpbb\event\dispatcher();
		$dispatcher->addListener('core.viewonline_overwrite_location', array($this->listener, 'viewonline_page'));

		$event_data = array('on_page', 'row', 'location_url', 'location');
		$event_data_after = $dispatcher->trigger_event('core.viewonline_overwrite_location', compact($event_data));
		extract($event_data_after, EXTR_OVERWRITE);

		self::assertEquals($expected_location_url, $location_url);
		self::assertEquals($expected_location, $location);
	}
}
