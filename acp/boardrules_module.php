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

class boardrules_module
{
	var $u_action;

	function main($id, $mode)
	{
		global $db, $user, $auth, $template, $cache, $request;
		global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx, $phpbb_container;

		// Define admin controller
		$admin_controller = $phpbb_container->get('phpbb.boardrules.admin.controller');

		// Requests
		$action = $request->variable('action', '');
		$language = $request->variable('language', 0);
		$parent_id = $request->variable('parent_id', 0);
		$rule_id = $request->variable('rule_id', 0);

		// Send url to admin controller
		$admin_controller->set_page_url($this->u_action);

		switch($action)
		{
		}

		switch($mode)
		{
			case 'settings':
			break;

			case 'manage':
			break;
		}
	}
}
