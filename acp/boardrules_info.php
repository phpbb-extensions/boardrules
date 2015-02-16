<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardrules\acp;

class boardrules_info
{
	public function module()
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
