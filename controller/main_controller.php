<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\controller;

/**
* Main controller
*/
class main_controller implements main_interface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\controller\helper */
	protected $helper;

	/** @var \phpbb\language\language */
	protected $lang;

	/** @var \phpbb\boardrules\operators\rule */
	protected $rule_operator;

	/** @var \phpbb\boardrules\operators\ruleset */
	protected $ruleset_operator;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var string phpBB root path */
	protected $root_path;

	/** @var string phpEx */
	protected $php_ext;

	/**
	* Constructor
	*
	* @param \phpbb\config\config             $config        Config object
	* @param \phpbb\controller\helper         $helper        Controller helper object
	* @param \phpbb\language\language         $lang          Language object
	* @param \phpbb\boardrules\operators\rule $rule_operator Rule operator object
	* @param \phpbb\boardrules\operators\ruleset $ruleset_operator Ruleset operator object
	* @param \phpbb\template\template         $template      Template object
	* @param string                           $root_path     phpBB root path
	* @param string                           $php_ext       phpEx
	* @access public
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\controller\helper $helper, \phpbb\language\language $lang, \phpbb\boardrules\operators\rule $rule_operator, \phpbb\boardrules\operators\ruleset $ruleset_operator, \phpbb\template\template $template, $root_path, $php_ext)
	{
		$this->config = $config;
		$this->helper = $helper;
		$this->lang = $lang;
		$this->rule_operator = $rule_operator;
		$this->ruleset_operator = $ruleset_operator;
		$this->template = $template;
		$this->root_path = $root_path;
		$this->php_ext = $php_ext;
	}

	/**
	* Display the rules page
	*
	* @return \Symfony\Component\HttpFoundation\Response A Symfony Response object
	* @access public
	* @throws \phpbb\boardrules\exception\base If stored rule data is invalid
	*/
	public function display()
	{
		// When board rules are disabled, redirect users back to the forum index
		if (empty($this->config['boardrules_enable']))
		{
			redirect(append_sid("{$this->root_path}index.{$this->php_ext}"));
		}

		// Add boardrules controller language file
		$this->lang->add_lang('boardrules_controller', 'phpbb/boardrules');

		$open_categories = array(); // Right boundaries for categories currently containing the next item
		$cat_counter = 1; // Numeric counter used for categories
		$rule_counter = 'a'; // Alpha counter used for rules
		$list_style = $this->config['boardrules_list_style'];
		$compound_counters = array();

		// Grab all published rules in the current user's language
		$used_language = $this->lang->get_used_language();
		$display_language = $used_language;
		$entities = $this->ruleset_operator->is_published($used_language) ? $this->rule_operator->get_rules($used_language) : array();

		// If no rules were found, it may be because no rules exist in the current user's
		// language, so let's look for rules in the board's default language as a fallback.
		if (empty($entities) && $used_language !== $this->config['default_lang'] && $this->ruleset_operator->is_published($this->config['default_lang']))
		{
			$display_language = $this->config['default_lang'];
			$entities = $this->rule_operator->get_rules($this->config['default_lang']);
		}

		/* @var $entity \phpbb\boardrules\entity\rule */
		foreach ($entities as $entity)
		{
			// Nested-set coordinates are shared by every language. Filtering one language
			// leaves gaps, so close lists by ancestor boundaries rather than ID distance.
			while (!empty($open_categories) && $entity->get_left_id() > end($open_categories))
			{
				array_pop($open_categories);
				$this->template->assign_block_vars('rules', array(
					'S_CLOSE_LIST'	=> true,
				));
			}

			$item_depth = count($open_categories);

			if ($entity->get_right_id() - $entity->get_left_id() > 1)
			{
				// Rule categories
				$is_category = true;
				$anchor = $entity->get_anchor() ?: $this->lang->lang('BOARDRULES_CATEGORY_ANCHOR', $cat_counter);

				// Increment category counter
				$cat_counter++;
				// Reset rule counter
				$rule_counter = 'a';
			}
			else
			{
				// Rules
				$is_category = false;
				$anchor = $entity->get_anchor() ?: $this->lang->lang('BOARDRULES_RULE_ANCHOR', ($cat_counter - 1) . $rule_counter);

				// Increment rule counter
				$rule_counter++;
			}

			// Categories open the list containing their children. Keep their existing
			// one-based display depth; rules use the containing category count.
			$depth = $is_category ? $item_depth + 1 : $item_depth;

			// Build a stable compound number from sibling positions at every nesting level
			$compound_counters = array_slice($compound_counters, 0, $item_depth + 1);
			$compound_counters[$item_depth] = isset($compound_counters[$item_depth]) ? $compound_counters[$item_depth] + 1 : 1;
			$compound_number = implode('.', $compound_counters);

			// Assign values to template vars for this rule entity
			$this->template->assign_block_vars('rules', array(
				'TITLE'			=> $entity->get_title(),
				'MESSAGE'		=> $entity->get_message_for_display(),
				'U_ANCHOR'		=> $anchor,
				'S_IS_CATEGORY'	=> $is_category,
				'DEPTH'			=> $depth,
				'COMPOUND_NUMBER' => $compound_number,
			));

			if ($is_category)
			{
				$open_categories[] = $entity->get_right_id();
			}
		}

		// Close every category still containing the end of the result set.
		while (!empty($open_categories))
		{
			array_pop($open_categories);
			$this->template->assign_block_vars('rules', array(
				'S_CLOSE_LIST'	=> true,
			));
		}

		// Assign values to template vars for the rules page
		$intro_text = $this->ruleset_operator->get_intro_text($display_language);

		$this->template->assign_vars(array(
			'S_BOARD_RULES'			=> true,
			'S_CATEGORIES'			=> $cat_counter > 1,
			'S_LIST_UNORDERED'		=> $list_style === 'unordered',
			'S_LIST_COMPOUND'		=> $list_style === 'compound',
			'S_LIST_UNSTYLED'		=> $list_style === 'none',
			'BOARDRULES_EXPLAIN'	=> $intro_text !== '' ? nl2br(utf8_htmlspecialchars($intro_text)) : $this->lang->lang('BOARDRULES_EXPLAIN', $this->config['sitename']),
		));

		// Assign breadcrumb template vars for the rules page
		$this->template->assign_block_vars('navlinks', array(
			'U_VIEW_FORUM'		=> $this->helper->route('phpbb_boardrules_main_controller'),
			'FORUM_NAME'		=> $this->lang->lang('BOARDRULES'),
		));

		// Send all data to the template file
		return $this->helper->render('@phpbb_boardrules/boardrules_controller.html', $this->lang->lang('BOARDRULES'));
	}
}
