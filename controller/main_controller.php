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

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var string boardrules table */
	protected $boardrules_table;

	/**
	* Constructor
	*
	* @param \phpbb\config\config        $config             Config object
	* @param \phpbb\controller\helper    $helper             Controller helper object
	* @param \phpbb\template\template    $template           Template object
	* @param \phpbb\user                 $user               User object
	* @param string                      $boardrules_table   Name of the table used to store boardrules data
	* @return \phpbb\boardrules\controller\main_controller
	* @access public
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\user $user, $boardrules_table)
	{
		$this->config = $config;
		$this->helper = $helper;
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

		$this->template->assign_vars(array(
			'S_BOARDRULES'			=> true,
			'BOARDRULES_EXPLAIN'	=> sprintf($this->user->lang['BOARDRULES_EXPLAIN'], $this->config['sitename']),
		));

		// Send data to the template fle
		return $this->helper->render('boardrules_controller.html', $this->user->lang['BOARDRULES']);
	}
}
