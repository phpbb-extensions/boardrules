<?php
/**
*
* @package Board Rules Extension
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
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

	/**
	* Constructor
	*
	* @param \phpbb\config\config        $config             Config object
	* @param \phpbb\controller\helper    $controller_helper  Controller helper object
	* @param \phpbb\template\template    $template           Template object
	* @param \phpbb\user                 $user               User object
	* @return \phpbb\boardrules\event\listener
	* @access public
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\controller\helper $controller_helper, \phpbb\template\template $template, \phpbb\user $user)
	{
		$this->config = $config;
		$this->controller_helper = $controller_helper;
		$this->template = $template;
		$this->user = $user;
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
			'core.ucp_register_agreement'	=> 'rules_at_registration',

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
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function add_page_header_link($event)
	{
		$this->template->assign_vars(array(
			'S_BOARDRULES_ENABLED' => (!empty($this->config['boardrules_enable'])) ? true : false,
			'U_BOARDRULES' => $this->controller_helper->route('boardrules_main_controller'),
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
	* Display board rules agreement at registration
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function rules_at_registration($event)
	{
		// Return if board rules are disabled or not required at registration.
		if (empty($this->config['boardrules_enable']) || empty($this->config['boardrules_require_at_registration']))
		{
			return;
		}

		// Reload the language file if the guest has changed languages on the registration page
		if ($event['change_lang'] || $event['user_lang'] != $this->config['default_lang'])
		{
			$this->user->add_lang_ext('phpbb/boardrules', 'boardrules_common');
		}

		$this->template->assign_vars(array(
			'S_BOARDRULES_AT_REGISTRATION' => true,
		));
	}
}
