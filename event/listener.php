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

	/** @var \phpbb\language\language */
	protected $lang;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var string phpEx */
	protected $php_ext;

	/**
	* Constructor
	*
	* @param \phpbb\config\config     $config            Config object
	* @param \phpbb\controller\helper $controller_helper Controller helper object
	* @param \phpbb\language\language $lang              Language object
	* @param \phpbb\template\template $template          Template object
	* @param string                   $php_ext           phpEx
	* @access public
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\controller\helper $controller_helper, \phpbb\language\language $lang, \phpbb\template\template $template, $php_ext)
	{
		$this->config = $config;
		$this->controller_helper = $controller_helper;
		$this->lang = $lang;
		$this->template = $template;
		$this->php_ext = $php_ext;
	}

	/**
	* Assign functions defined in this class to event listeners in the core
	*
	* @return array
	* @static
	* @access public
	*/
	public static function getSubscribedEvents()
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
	* @param \phpbb\event\data $event The event object
	* @return void
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
	* Create a URL to the board rules controller file for the header link list
	*
	* @return void
	* @access public
	*/
	public function add_page_header_link()
	{
		$this->template->assign_vars(array(
			'BOARDRULES_FONT_ICON' => $this->config['boardrules_font_icon'],
			'S_BOARDRULES_LINK_ENABLED' => !empty($this->config['boardrules_enable']) && !empty($this->config['boardrules_header_link']),
			'S_BOARDRULES_AT_REGISTRATION' => !empty($this->config['boardrules_enable']) && !empty($this->config['boardrules_require_at_registration']),
			'U_BOARDRULES' => $this->controller_helper->route('phpbb_boardrules_main_controller'),
		));
	}

	/**
	* Add administrative permissions to manage board rules
	*
	* @param \phpbb\event\data $event The event object
	* @return void
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
	* @param \phpbb\event\data $event The event object
	* @return void
	* @access public
	*/
	public function viewonline_page($event)
	{
		if ($event['on_page'][1] === 'app' && strrpos($event['row']['session_page'], 'app.' . $this->php_ext . '/rules') === 0)
		{
			$event['location'] = $this->lang->lang('BOARDRULES_VIEWONLINE');
			$event['location_url'] = $this->controller_helper->route('phpbb_boardrules_main_controller');
		}
	}
}
