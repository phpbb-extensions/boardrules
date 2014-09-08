<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\tests\controller;

class main_controller_test extends \phpbb_test_case
{
	/**
	* Test data for the test_display() function
	*
	* @return array Array of test data
	* @access public
	*/
	public function display_data()
	{
		return array(
			array(200, 'boardrules_controller.html'),
		);
	}

	/**
	* Test controller display
	*
	* @dataProvider display_data
	* @access public
	*/
	public function test_display($status_code, $page_content)
	{
		global $config, $user, $phpbb_dispatcher, $phpbb_root_path, $phpEx;

		// Global vars called upon during execution
		$config = new \phpbb\config\config(array('boardrules_enable' => 1));
		set_config(null, null, null, $config);
		$user = new \phpbb\user('\phpbb\datetime');
		$user->data['lang_id'] = 1;
		$phpbb_dispatcher = new \phpbb_mock_event_dispatcher();

		$controller = new \phpbb\boardrules\controller\main_controller(
			$config,
			new \phpbb\boardrules\tests\mock\controller_helper(),
			new \phpbb\boardrules\tests\mock\rule_operator(),
			new \phpbb\boardrules\tests\mock\template(),
			$this->getMock('\phpbb\user', array(), array('\phpbb\datetime')),
			$phpbb_root_path,
			$phpEx
		);

		$response = $controller->display();
		$this->assertInstanceOf('\Symfony\Component\HttpFoundation\Response', $response);
		$this->assertEquals($status_code, $response->getStatusCode());
		$this->assertEquals($page_content, $response->getContent());
	}
}
