<?php
/**
*
* @package Board Rules Extension
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
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

	/** @var \phpbb\boardrules\operators\rule */
	protected $rule_operator;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/**
	* The database table the rules are stored in
	*
	* @var string
	*/
	protected $boardrules_table;

	/**
	* Constructor
	*
	* @param \phpbb\config\config                $config             Config object
	* @param \phpbb\controller\helper            $helper             Controller helper object
	* @param \phpbb\boardrules\operators\rule    $rule_operator      Rule operator object
	* @param \phpbb\template\template            $template           Template object
	* @param \phpbb\user                         $user               User object
	* @param string                              $boardrules_table   Name of the table used to store boardrules data
	* @return \phpbb\boardrules\controller\main_controller
	* @access public
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\controller\helper $helper, \phpbb\boardrules\operators\rule $rule_operator, \phpbb\template\template $template, \phpbb\user $user, $boardrules_table)
	{
		$this->config = $config;
		$this->helper = $helper;
		$this->rule_operator = $rule_operator;
		$this->template = $template;
		$this->user = $user;
		$this->$boardrules_table = $boardrules_table;
	}

	/**
	* Display the rules page
	*
	* @return Symfony\Component\HttpFoundation\Response A Symfony Response object
	* @access public
	*/
	public function display()
	{
		// Add boardrules controller language file
		$this->user->add_lang_ext('phpbb/boardrules', 'boardrules_controller');

		$last_right_id = null; // Used to help determine when to close nesting structures
		$depth = 0; // Used to track the depth of nesting level
		$cat_counter = 1; // Numeric counter used for categories
		$rule_counter = 'a'; // Alpha counter used for rules

		// Grab all the rules in the current user's language
		$entities = $this->rule_operator->get_rules($this->user->get_iso_lang_id());

		foreach ($entities as $entity)
		{
			if ($entity->get_right_id() - $entity->get_left_id() > 1)
			{
				// Rule categories
				$is_category = true;
				$anchor = $entity->get_anchor() ?: $this->user->lang('BOARDRULES_CATEGORY_ANCHOR', $cat_counter);

				// Increment nesting level depth counter
				$depth++;
				// Increment category counter
				$cat_counter++;
				// Reset rule counter
				$rule_counter = 'a';
			}
			else
			{
				// Rules
				$is_category = false;
				$anchor = $entity->get_anchor() ?: $this->user->lang('BOARDRULES_RULE_ANCHOR', (($cat_counter - 1) . $rule_counter));

				// Increment rule counter
				$rule_counter++;
			}

			// Determine how deeply nested we are and use closing tags as necessary
			$diff = ($last_right_id !== null) ? $entity->get_left_id() - $last_right_id : 1;
			if ($diff > 1)
			{
				for ($i = 1; $i < $diff; $i++)
				{
					$depth--; // decrement the nesting level depth counter
					$this->template->assign_block_vars('rules', array(
						'S_CLOSE_LIST'	=> true,
					));
				}
			}

			// Set last_right_id value with the current item's value
			$last_right_id = $entity->get_right_id();

			// Assign values to template vars for this rule entity
			$this->template->assign_block_vars('rules', array(
				'TITLE'			=> $entity->get_title(),
				'MESSAGE'		=> $entity->get_message_for_display(),
				'U_ANCHOR'		=> $anchor,
 				'S_IS_CATEGORY'	=> $is_category,
			));
		}

		// By this point, if any nested structures are still open, attempt to close them
		if ($depth > 0)
		{
			for ($i = 0; $i < $depth; $i++)
			{
				$this->template->assign_block_vars('rules', array(
					'S_CLOSE_LIST'	=> true,
				));
			}
		}

		// Assign values to template vars for the rules page
		$this->template->assign_vars(array(
			'S_BOARDRULES'			=> true,
			'S_CATEGORIES'			=> ($cat_counter > 1) ? true : false,
			'BOARDRULES_EXPLAIN'	=> $this->user->lang('BOARDRULES_EXPLAIN', $this->config['sitename']),
		));

		// Send all data to the template file
		return $this->helper->render('boardrules_controller.html', $this->user->lang('BOARDRULES'));
	}
}
