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
	*/
	public static function display_data(): array
	{
		return array(
			'A rule' => array(
				200,
				'@phpbb_boardrules/boardrules_controller.html',
				[
					'get_left_id' => 1,
					'get_right_id' => 2,
					'get_anchor' => '',
					'get_title' => 'title',
					'get_message_for_display' => 'content',
				]
			),
			'A category' => array(
				200,
				'@phpbb_boardrules/boardrules_controller.html',
				[
					'get_left_id' => 1,
					'get_right_id' => 6,
					'get_anchor' => '',
					'get_title' => 'title',
					'get_message_for_display' => 'content',
				],
			),
		);
	}

	/**
	* Test controller display
	*
	* @dataProvider display_data
	*/
	public function test_display($status_code, $page_content, $rule_data)
	{
		global $config, $user, $phpbb_root_path, $phpEx;

		// Global vars called upon during execution
		$config = new \phpbb\config\config(array('boardrules_enable' => 1));
		$lang_loader = new \phpbb\language\language_file_loader($phpbb_root_path, $phpEx);
		$lang = new \phpbb\language\language($lang_loader);
		$user = new \phpbb\user($lang, '\phpbb\datetime');

		$entity = $this->getMockBuilder('\phpbb\boardrules\entity\rule')
			->disableOriginalConstructor()
			->getMock();

		foreach ($rule_data as $method => $return_value)
		{
			$entity->method($method)->willReturn($return_value);
		}

		// Mock the rule operator and return an empty array for get_rules method
		$rule_operator = $this->getMockBuilder('\phpbb\boardrules\operators\rule')
			->disableOriginalConstructor()
			->getMock();
		$rule_operator->expects(self::exactly(2))
			->method('get_rules')
			->willReturnOnConsecutiveCalls(array(), [$entity]);

		// Mock the controller helper and return render response object
		$controller_helper = $this->getMockBuilder('\phpbb\controller\helper')
			->disableOriginalConstructor()
			->getMock();
		$controller_helper->expects(self::once())
			->method('render')
			->willReturnCallback(function ($template_file, $page_title = '', $status_code = 200, $display_online_list = false) {
				return new \Symfony\Component\HttpFoundation\Response($template_file, $status_code);
			});

		// Mock the template
		$template = $this->getMockBuilder('\phpbb\template\template')
			->getMock();

		/** @var \phpbb\controller\helper $controller_helper */
		/** @var \phpbb\boardrules\operators\rule $rule_operator */
		/** @var \phpbb\template\template $template */
		$controller = new \phpbb\boardrules\controller\main_controller(
			$config,
			$controller_helper,
			$lang,
			$rule_operator,
			$template,
			$user,
			$phpbb_root_path,
			$phpEx
		);

		$response = $controller->display();
		self::assertInstanceOf('\Symfony\Component\HttpFoundation\Response', $response);
		self::assertEquals($status_code, $response->getStatusCode());
		self::assertEquals($page_content, $response->getContent());
	}
}
