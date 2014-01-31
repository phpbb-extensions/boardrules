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

	/** @var \phpbb\controller\helper */
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

		$cat_counter = 1; // Numeric counter used for categories
		$rule_counter = 'a'; // Alpha counter used for rules

		// Grab all the rules in the current users language
		$entities = $this->rule_operator->get_rules($this->user->get_iso_lang_id());

		foreach ($entities as $entity)
		{
			// Rule categories
			if ($entity->get_right_id() - $entity->get_left_id() > 1)
			{
				$this->template->assign_block_vars('categories', array(
					'TITLE'		=> $entity->get_title(),
					'U_ANCHOR'	=> $entity->get_anchor() ?: $this->user->lang('BOARDRULES_CATEGORY_ANCHOR', $cat_counter),
				));

				$cat_counter++;
				$rule_counter = 'a';

				continue;
			}

			// Rules
			$this->template->assign_block_vars('categories.rules', array(
				'MESSAGE'	=> $entity->get_message_for_display(),
				'U_ANCHOR'	=> $entity->get_anchor() ?: $this->user->lang('BOARDRULES_RULE_ANCHOR', (($cat_counter - 1) . $rule_counter)),
			));
			
			$rule_counter++;
		}

		$this->template->assign_vars(array(
			'S_BOARDRULES'			=> true,
			'BOARDRULES_EXPLAIN'	=> $this->user->lang('BOARDRULES_EXPLAIN', $this->config['sitename']),
		));

		// Send data to the template fle
		return $this->helper->render('boardrules_controller.html', $this->user->lang('BOARDRULES'));
	}
}
