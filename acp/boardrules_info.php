<?php
/**
*
* @package Board Rules Extension
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\acp;

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

class boardrules_info
{
	function module()
	{
		return array(
			'filename'	=> '\phpbb\boardrules\acp\boardrules_module',
			'title'		=> 'ACP_BOARDRULES',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'settings'	=> array('title' => 'ACP_BOARDRULES_SETTINGS', 'auth' => 'acl_a_board', 'cat' => array('ACP_CAT_BOARDRULES')),
				'manage'	=> array('title' => 'ACP_BOARDRULES_MANAGE', 'auth' => 'acl_a_board', 'cat' => array('ACP_CAT_BOARDRULES')),
			),
		);
	}
}
