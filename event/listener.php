<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2013 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\controller\helper */
	protected $controller_helper;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var string phpEx */
	protected $php_ext;

	/**
	* Constructor
	*
	* @param \phpbb\config\config        $config             Config object
	* @param \phpbb\controller\helper    $controller_helper  Controller helper object
	* @param \phpbb\template\template    $template           Template object
	* @param \phpbb\user                 $user               User object
	* @param string                      $php_ext            phpEx
	* @access public
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\controller\helper $controller_helper, \phpbb\template\template $template, \phpbb\user $user, $php_ext)
	{
		$this->config = $config;
		$this->controller_helper = $controller_helper;
		$this->template = $template;
		$this->user = $user;
		$this->php_ext = $php_ext;
	}

	/**
	* Assign functions defined in this class to event listeners in the core
	*
	* @return array
	* @static
	* @access public
	*/
	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup'	=> 'load_language_on_setup',
			'core.page_header'	=> 'add_page_header_link',
			'core.viewonline_overwrite_location'	=> 'viewonline_page',

			// ACP event
			'core.permissions'	=> 'add_permission',
		);
	}

	/**
	* Load common board rules language files during user setup
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'phpbb/boardrules',
			'lang_set' => 'boardrules_common',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	/**
	* Create a URL to the board rules controller file for the header linklist
	*
	* @return null
	* @access public
	*/
	public function add_page_header_link()
	{
		$this->template->assign_vars(array(
			'S_BOARDRULES_LINK_ENABLED' => (!empty($this->config['boardrules_enable']) && !empty($this->config['boardrules_header_link'])) ? true : false,
			'S_BOARDRULES_AT_REGISTRATION' => (!empty($this->config['boardrules_enable']) && !empty($this->config['boardrules_require_at_registration'])) ? true : false,
			'U_BOARDRULES' => $this->controller_helper->route('phpbb_boardrules_main_controller'),
		));
	}

	/**
	* Add administrative permissions to manage board rules
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function add_permission($event)
	{
		$permissions = $event['permissions'];
		$permissions['a_boardrules'] = array('lang' => 'ACL_A_BOARDRULES', 'cat' => 'misc');
		$event['permissions'] = $permissions;
	}

	/**
	* Show users as viewing the Board Rules on Who Is Online page
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function viewonline_page($event)
	{
		if ($event['on_page'][1] == 'app')
		{
			if (strrpos($event['row']['session_page'], 'app.' . $this->php_ext . '/rules') === 0)
			{
				$event['location'] = $this->user->lang('BOARDRULES_VIEWONLINE');
				$event['location_url'] = $this->controller_helper->route('phpbb_boardrules_main_controller');
			}
		}
	}
}
