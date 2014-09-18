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

require_once dirname(__FILE__) . '/../../../../../includes/functions.php';

class event_listener_test extends \phpbb_test_case
{

	/** @var \phpbb\boardrules\event\listener */
	protected $listener;

	/**
	* Setup test environment
	*
	* @access public
	*/
	public function setUp()
	{
		parent::setUp();

		global $phpbb_dispatcher, $phpbb_root_path, $phpEx;

		// Mock some global classes that may be called during code execution
		$phpbb_dispatcher = new \phpbb_mock_event_dispatcher();

		// Load/Mock classes required by the event listener class
		$this->php_ext = $phpEx;
		$this->config = new \phpbb\config\config(array('enable_mod_rewrite' => '0'));
		$this->template = new \phpbb\boardrules\tests\mock\template();
		$this->user = new \phpbb\user('\phpbb\datetime');

		$request = new \phpbb_mock_request();
		$request->overwrite('SCRIPT_NAME', 'app.php', \phpbb\request\request_interface::SERVER);
		$request->overwrite('SCRIPT_FILENAME', 'app.php', \phpbb\request\request_interface::SERVER);
		$request->overwrite('REQUEST_URI', 'app.php', \phpbb\request\request_interface::SERVER);

		$this->controller_helper = new \phpbb_mock_controller_helper(
			$this->template,
			$this->user,
			$this->config,
			new \phpbb\controller\provider(),
			new \phpbb_mock_extension_manager($phpbb_root_path),
			new \phpbb\symfony_request($request),
			new \phpbb\filesystem(),
			'',
			$phpEx,
			dirname(__FILE__) . '/../../'
		);
	}

	/**
	* Create our event listener
	*
	* @access protected
	*/
	protected function set_listener()
	{
		$this->listener = new \phpbb\boardrules\event\listener(
			$this->config,
			$this->controller_helper,
			$this->template,
			$this->user,
			$this->php_ext
		);
	}

	/**
	* Test the event listener is constructed correctly
	*
	* @access public
	*/
	public function test_construct()
	{
		$this->set_listener();
		$this->assertInstanceOf('\Symfony\Component\EventDispatcher\EventSubscriberInterface', $this->listener);
	}

	/**
	* Test the event listener is subscribing events
	*
	* @access public
	*/
	public function test_getSubscribedEvents()
	{
		$this->assertEquals(array(
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
	* @access public
	*/
	public function load_language_on_setup_data()
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
	* @access public
	*/
	public function test_load_language_on_setup($lang_set_ext, $expected_contains)
	{
		$this->set_listener();

		$dispatcher = new \Symfony\Component\EventDispatcher\EventDispatcher();
		$dispatcher->addListener('core.user_setup', array($this->listener, 'load_language_on_setup'));

		$event_data = array('lang_set_ext');
		$event = new \phpbb\event\data(compact($event_data));
		$dispatcher->dispatch('core.user_setup', $event);

		$lang_set_ext = $event->get_data_filtered($event_data);
		$lang_set_ext = $lang_set_ext['lang_set_ext'];

		foreach ($expected_contains as $expected)
		{
			$this->assertContains($expected, $lang_set_ext);
		}
	}

	/**
	* Data set for test_add_page_header_link
	*
	* @return array Array of test data
	* @access public
	*/
	public function add_page_header_link_data()
	{
		return array(
			array(1, 1, 1, array(
				'S_BOARDRULES_LINK_ENABLED' => true,
				'S_BOARDRULES_AT_REGISTRATION' => true,
				'U_BOARDRULES' => 'app.php/rules',
			)),
			array(1, 1, 0, array(
				'S_BOARDRULES_LINK_ENABLED' => true,
				'S_BOARDRULES_AT_REGISTRATION' => false,
				'U_BOARDRULES' => 'app.php/rules',
			)),
			array(1, 0, 1, array(
				'S_BOARDRULES_LINK_ENABLED' => false,
				'S_BOARDRULES_AT_REGISTRATION' => true,
				'U_BOARDRULES' => 'app.php/rules',
			)),
			array(1, 0, 0, array(
				'S_BOARDRULES_LINK_ENABLED' => false,
				'S_BOARDRULES_AT_REGISTRATION' => false,
				'U_BOARDRULES' => 'app.php/rules',
			)),
			array(0, 1, 1, array(
				'S_BOARDRULES_LINK_ENABLED' => false,
				'S_BOARDRULES_AT_REGISTRATION' => false,
				'U_BOARDRULES' => 'app.php/rules',
			)),
			array(0, 0, 1, array(
				'S_BOARDRULES_LINK_ENABLED' => false,
				'S_BOARDRULES_AT_REGISTRATION' => false,
				'U_BOARDRULES' => 'app.php/rules',
			)),
			array(0, 1, 0, array(
				'S_BOARDRULES_LINK_ENABLED' => false,
				'S_BOARDRULES_AT_REGISTRATION' => false,
				'U_BOARDRULES' => 'app.php/rules',
			)),
			array(0, 0, 0, array(
				'S_BOARDRULES_LINK_ENABLED' => false,
				'S_BOARDRULES_AT_REGISTRATION' => false,
				'U_BOARDRULES' => 'app.php/rules',
			)),
			array(null, null, null, array(
				'S_BOARDRULES_LINK_ENABLED' => false,
				'S_BOARDRULES_AT_REGISTRATION' => false,
				'U_BOARDRULES' => 'app.php/rules',
			)),
		);
	}

	/**
	* Test the add_page_header_link event
	*
	* @dataProvider add_page_header_link_data
	* @access public
	*/
	public function test_add_page_header_link($boardrules_enable, $boardrules_header_link, $boardrules_require_at_registration, $expected)
	{
		$this->config = new \phpbb\config\config(array(
			'boardrules_enable' => $boardrules_enable,
			'boardrules_header_link' => $boardrules_header_link,
			'boardrules_require_at_registration' => $boardrules_require_at_registration,
		));

		$this->set_listener();

		$dispatcher = new \Symfony\Component\EventDispatcher\EventDispatcher();
		$dispatcher->addListener('core.page_header', array($this->listener, 'add_page_header_link'));
		$dispatcher->dispatch('core.page_header');

		$this->assertEquals($expected, $this->template->get_template_vars());
	}

	/**
	* Data set for test_add_permissions
	*
	* @return array Array of test data
	* @access public
	*/
	public function add_permission_data()
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
	* @access public
	*/
	public function test_add_permission($permissions, $expected_contains)
	{
		$this->set_listener();

		$dispatcher = new \Symfony\Component\EventDispatcher\EventDispatcher();
		$dispatcher->addListener('core.permissions', array($this->listener, 'add_permission'));

		$event_data = array('permissions');
		$event = new \phpbb\event\data(compact($event_data));
		$dispatcher->dispatch('core.permissions', $event);

		$permissions = $event->get_data_filtered($event_data);
		$permissions = $permissions['permissions'];

		foreach ($expected_contains as $expected)
		{
			$this->assertContains($expected, $permissions);
		}
	}

	/**
	* Data set for test_viewonline_page
	*
	* @return array Array of test data
	* @access public
	*/
	public function viewonline_page_data()
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
				'app.' . $phpEx . '/rules',
				'BOARDRULES_VIEWONLINE',
			),
		);
	}

	/**
	* Test the viewonline_page event
	*
	* @dataProvider viewonline_page_data
	* @access public
	*/
	public function test_viewonline_page($on_page, $row, $location_url, $location, $expected_location_url, $expected_location)
	{
		$this->set_listener();

		$dispatcher = new \Symfony\Component\EventDispatcher\EventDispatcher();
		$dispatcher->addListener('core.viewonline_overwrite_location', array($this->listener, 'viewonline_page'));

		$event_data = array('on_page', 'row', 'location_url', 'location');
		$event = new \phpbb\event\data(compact($event_data));
		$dispatcher->dispatch('core.viewonline_overwrite_location', $event);

		$event_data_after = $event->get_data_filtered($event_data);
		foreach ($event_data as $expected)
		{
			$this->assertArrayHasKey($expected, $event_data_after);
		}
		extract($event_data_after);

		$this->assertEquals($expected_location_url, $location_url);
		$this->assertEquals($expected_location, $location);
	}
}
