<?php
/**
*
* @package Board Rules Extension
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardrules\acp;

class boardrules_info
{
	function module()
	{
		return array(
			'filename'	=> '\phpbb\boardrules\acp\boardrules_module',
			'title'		=> 'ACP_BOARDRULES',
			'modes'		=> array(
				'settings'	=> array('title' => 'ACP_BOARDRULES_SETTINGS', 'auth' => 'ext_phpbb/boardrules && acl_a_boardrules', 'cat' => array('ACP_BOARDRULES')),
				'manage'	=> array('title' => 'ACP_BOARDRULES_MANAGE', 'auth' => 'ext_phpbb/boardrules && acl_a_boardrules', 'cat' => array('ACP_BOARDRULES')),
			),
		);
	}
}
