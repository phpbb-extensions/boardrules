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

require_once __DIR__ . '/admin_test_helpers.php';

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
				],
				true,
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
				true,
			),
			'A draft language falls back to published default rules' => array(
				200,
				'@phpbb_boardrules/boardrules_controller.html',
				[
					'get_left_id' => 1,
					'get_right_id' => 2,
					'get_anchor' => '',
					'get_title' => 'fallback title',
					'get_message_for_display' => 'fallback content',
				],
				false,
			),
		);
	}

	/**
	* Test controller display
	*
	* @dataProvider display_data
	*/
	public function test_display($status_code, $page_content, $rule_data, $language_published)
	{
		global $config, $user, $phpbb_root_path, $phpEx;

		// Global vars called upon during execution
		$config = new \phpbb\config\config(array('boardrules_enable' => 1, 'default_lang' => 'en'));
		$lang_loader = new \phpbb\language\language_file_loader($phpbb_root_path, $phpEx);
		$lang = new \phpbb\language\language($lang_loader);
		$lang->set_default_language('en');
		$lang->set_user_language('fr');
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
		$rule_operator->expects($language_published ? self::exactly(2) : self::once())
			->method('get_rules')
			->willReturnCallback(function ($language) use ($entity) {
				return $language === 'fr' ? array() : array($entity);
			});

		$ruleset_operator = $this->getMockBuilder('\phpbb\boardrules\operators\ruleset')
			->disableOriginalConstructor()
			->getMock();
		$ruleset_operator->method('is_published')
			->willReturnCallback(function ($language) use ($language_published) {
				return $language === 'fr' ? $language_published : true;
			});
		$ruleset_operator->method('get_intro_text')->willReturn('Custom <intro> & details');

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
		$template->expects(self::once())
			->method('assign_vars')
			->with(self::callback(function ($vars) {
				return $vars['BOARDRULES_EXPLAIN'] === 'Custom &lt;intro&gt; &amp; details';
			}));

		/** @var \phpbb\controller\helper $controller_helper */
		/** @var \phpbb\boardrules\operators\rule $rule_operator */
		/** @var \phpbb\template\template $template */
		$controller = new \phpbb\boardrules\controller\main_controller(
			$config,
			$controller_helper,
			$lang,
			$rule_operator,
			$ruleset_operator,
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

	public function test_display_redirects_when_disabled_and_closes_completed_tree(): void
	{
		global $config, $user, $phpbb_root_path, $phpEx;

		\phpbb\boardrules\controller\admin_test_state::reset();
		$config = new \phpbb\config\config(array(
			'boardrules_enable' => 0,
			'boardrules_list_style' => '',
			'default_lang' => 'en',
			'sitename' => 'Board',
		));
		$loader = new \phpbb\language\language_file_loader($phpbb_root_path, $phpEx);
		$lang = new \phpbb\language\language($loader);
		$lang->set_default_language('en');
		$lang->set_user_language('en');
		$user = new \phpbb\user($lang, '\\phpbb\\datetime');

		$tree_data = array(
			array(1, 4, '', 'Category'),
			array(2, 3, '', 'Nested rule'),
			array(5, 6, '', 'Following rule'),
		);
		$entities = array();
		foreach ($tree_data as $data)
		{
			$entity = $this->getMockBuilder(\phpbb\boardrules\entity\rule::class)
				->disableOriginalConstructor()
				->getMock();
			$entity->method('get_left_id')->willReturn($data[0]);
			$entity->method('get_right_id')->willReturn($data[1]);
			$entity->method('get_anchor')->willReturn($data[2]);
			$entity->method('get_title')->willReturn($data[3]);
			$entity->method('get_message_for_display')->willReturn($data[3] . ' body');
			$entities[] = $entity;
		}

		$rule_operator = $this->getMockBuilder(\phpbb\boardrules\operators\rule::class)
			->disableOriginalConstructor()
			->getMock();
		$rule_operator->method('get_rules')->with('en')->willReturn($entities);
		$ruleset_operator = $this->getMockBuilder(\phpbb\boardrules\operators\ruleset::class)
			->disableOriginalConstructor()
			->getMock();
		$ruleset_operator->method('is_published')->with('en')->willReturn(true);
		$template = $this->createMock(\phpbb\template\template::class);
		$block_var_call = 0;
		$template->expects(self::exactly(5))
			->method('assign_block_vars')
			->willReturnCallback(function ($block, $variables) use (&$block_var_call) {
				$expected = array(
					array('rules', 'TITLE'),
					array('rules', 'TITLE'),
					array('rules', 'S_CLOSE_LIST'),
					array('rules', 'TITLE'),
					array('navlinks', 'U_VIEW_FORUM'),
				);

				self::assertSame($expected[$block_var_call][0], $block);
				self::assertArrayHasKey($expected[$block_var_call][1], $variables);
				if ($expected[$block_var_call][1] === 'S_CLOSE_LIST')
				{
					self::assertSame(array('S_CLOSE_LIST' => true), $variables);
				}
				$block_var_call++;
			});
		$helper = $this->getMockBuilder(\phpbb\controller\helper::class)
			->disableOriginalConstructor()
			->getMock();
		$helper->method('route')->willReturn('/rules');
		$helper->method('render')->willReturn(new \Symfony\Component\HttpFoundation\Response('rules'));

		$controller = new \phpbb\boardrules\controller\main_controller(
			$config,
			$helper,
			$lang,
			$rule_operator,
			$ruleset_operator,
			$template,
			$user,
			$phpbb_root_path,
			$phpEx
		);

		self::assertSame('rules', $controller->display()->getContent());
		self::assertCount(1, \phpbb\boardrules\controller\admin_test_state::$redirects);
		self::assertStringContainsString('index.' . $phpEx, \phpbb\boardrules\controller\admin_test_state::$redirects[0]);
	}

	public static function deep_list_style_data(): array
	{
		return array(
			'ordered' => array(
				'',
				false,
				false,
				false,
			),
			'unordered' => array(
				'unordered',
				true,
				false,
				false,
			),
			'compound' => array(
				'compound',
				false,
				true,
				false,
			),
			'none' => array(
				'none',
				false,
				false,
				true,
			),
		);
	}

	/**
	 * @dataProvider deep_list_style_data
	 */
	public function test_display_assigns_list_mode_and_deep_tree_structure($configured_style, $is_unordered, $is_compound, $is_unstyled): void
	{
		global $config, $user, $phpbb_root_path, $phpEx;

		$config = new \phpbb\config\config(array(
			'boardrules_enable' => 1,
			'boardrules_list_style' => $configured_style,
			'default_lang' => 'en',
			'sitename' => 'Board',
		));
		$loader = new \phpbb\language\language_file_loader($phpbb_root_path, $phpEx);
		$lang = new \phpbb\language\language($loader);
		$lang->set_default_language('en');
		$lang->set_user_language('en');
		$user = new \phpbb\user($lang, '\\phpbb\\datetime');

		$tree_data = array(
			array(1, 22, 'Category 1'),
			array(2, 19, 'Category 2'),
			array(3, 16, 'Category 3'),
			array(4, 15, 'Category 4'),
			array(5, 14, 'Category 5'),
			array(6, 13, 'Category 6'),
			array(7, 12, 'Category 7'),
			array(8, 9, 'Deep rule'),
			array(10, 11, 'Deep sibling rule'),
			array(17, 18, 'Category 2 sibling rule'),
			array(20, 21, 'Category 1 sibling rule'),
			// Gap 23-42 represents nested-set rows belonging to another language.
			array(43, 46, 'Second top-level category'),
			array(44, 45, 'Second category rule'),
		);
		$entities = array();
		foreach ($tree_data as $data)
		{
			$entity = $this->getMockBuilder(\phpbb\boardrules\entity\rule::class)
				->disableOriginalConstructor()
				->getMock();
			$entity->method('get_left_id')->willReturn($data[0]);
			$entity->method('get_right_id')->willReturn($data[1]);
			$entity->method('get_anchor')->willReturn('');
			$entity->method('get_title')->willReturn($data[2]);
			$entity->method('get_message_for_display')->willReturn($data[2] . ' body');
			$entities[] = $entity;
		}

		$rule_operator = $this->getMockBuilder(\phpbb\boardrules\operators\rule::class)
			->disableOriginalConstructor()
			->getMock();
		$rule_operator->method('get_rules')->with('en')->willReturn($entities);
		$ruleset_operator = $this->getMockBuilder(\phpbb\boardrules\operators\ruleset::class)
			->disableOriginalConstructor()
			->getMock();
		$ruleset_operator->method('is_published')->with('en')->willReturn(true);

		$assigned_rules = array();
		$assigned_vars = array();
		$template = $this->createMock(\phpbb\template\template::class);
		$template->method('assign_block_vars')->willReturnCallback(function ($block, $vars) use (&$assigned_rules) {
			if ($block === 'rules')
			{
				$assigned_rules[] = $vars;
			}
		});
		$template->method('assign_vars')->willReturnCallback(function ($vars) use (&$assigned_vars) {
			$assigned_vars = array_merge($assigned_vars, $vars);
		});

		$helper = $this->getMockBuilder(\phpbb\controller\helper::class)
			->disableOriginalConstructor()
			->getMock();
		$helper->method('route')->willReturn('/rules');
		$helper->method('render')->willReturn(new \Symfony\Component\HttpFoundation\Response('rules'));

		$controller = new \phpbb\boardrules\controller\main_controller(
			$config,
			$helper,
			$lang,
			$rule_operator,
			$ruleset_operator,
			$template,
			$user,
			$phpbb_root_path,
			$phpEx
		);
		$controller->display();

		$categories = array();
		$rules = array();
		$items = array();
		$close_count = 0;
		foreach ($assigned_rules as $assigned_rule)
		{
			if (!empty($assigned_rule['S_CLOSE_LIST']))
			{
				$close_count++;
			}
			else if (!empty($assigned_rule['S_IS_CATEGORY']))
			{
				$categories[] = $assigned_rule;
				$items[] = $assigned_rule;
			}
			else
			{
				$rules[] = $assigned_rule;
				$items[] = $assigned_rule;
			}
		}

		self::assertSame(array(1, 2, 3, 4, 5, 6, 7, 1), array_column($categories, 'DEPTH'));
		self::assertSame(array(7, 7, 2, 1, 1), array_column($rules, 'DEPTH'));
		self::assertSame(8, $close_count);
		self::assertSame($is_unordered, $assigned_vars['S_LIST_UNORDERED']);
		self::assertSame($is_compound, $assigned_vars['S_LIST_COMPOUND']);
		self::assertSame($is_unstyled, $assigned_vars['S_LIST_UNSTYLED']);

		if ($configured_style === 'compound')
		{
			self::assertSame(array(
				'1',
				'1.1',
				'1.1.1',
				'1.1.1.1',
				'1.1.1.1.1',
				'1.1.1.1.1.1',
				'1.1.1.1.1.1.1',
				'1.1.1.1.1.1.1.1',
				'1.1.1.1.1.1.1.2',
				'1.1.2',
				'1.2',
				'2',
				'2.1',
			), array_column($items, 'COMPOUND_NUMBER'));
		}
	}
}
