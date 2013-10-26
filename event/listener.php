<?php
/**
*
* @package Board Rules Extension
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\event;

/**
* @ignore
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* Event listener
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	/**
	* Assign functions defined in this class to event listeners in the core
	*
	* @return array
	* @access public
	*/
	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup'	=> 'load_language_on_setup',
			'core.page_header'	=> 'add_page_header_link',
		);
	}

	/**
	* Load common board rules language files during user setup
	*
	* @param Event $event
	* @return Event $event
	* @access public
	*/
	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'phpbb/boardrules',
			'lang_set' => 'boardrules',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	/**
	* Create a URL to the board rules controller file for the header linklist
	*
	* @param Event $event
	* @return null
	* @access public
	*/
	public function add_page_header_link($event)
	{
		global $template, $phpbb_container;

		$template->assign_vars(array(
			'U_BOARDRULES' => $phpbb_container->get('controller.helper')->url('board-rules'),
		));
	}
}
