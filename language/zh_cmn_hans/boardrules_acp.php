<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
* @简体中文语言　David Yin <http://www.g2soft.net/>
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	// Settings page
	'ACP_BOARDRULES'						=> '论坛章程',
	'ACP_BOARDRULES_SETTINGS'				=> '章程设置',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> '在这里您可以设置论坛章程的主要参数。',
	'ACP_BOARDRULES_ENABLE'					=> '启用论坛章程',
	'ACP_BOARDRULES_HEADER_LINK'			=> '在页眉显示论坛章程的链接',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> '注册新用户必须同意论坛章程',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> '这个选项会要求新用户在注册时，在“条款”的附近增加一个阅读和同意论坛章程的选项。',
	'ACP_BOARDRULES_NOTIFY'					=> '通知用户',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> '给所有的注册用户发送论坛章程更新的通知。（用户数量较多的话，耗时也多）',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> '您确认要给所有用户都发送通知？',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> '论坛章程设置已改变。',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> '管理章程',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> '在此页，您可以增加，编辑，删除或重新排序分类和章程。一个分类包含一组章程。分类内可以包含无限条章程。',
	'ACP_BOARDRULES_CATEGORY'				=> '章程分类',
	'ACP_BOARDRULES_RULE'					=> '章程',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> '选择语言',
	'ACP_BOARDRULES_CREATE_RULE'			=> '创建章程',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> '使用下面的表单，您可以创建一条新的章程，显示给您的用户。',
	'ACP_BOARDRULES_EDIT_RULE'				=> '编辑章程',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> '使用下面的表单，您能更新现有的章程。',
	'ACP_RULE_SETTINGS'						=> '章程设置',
	'ACP_RULE_PARENT'						=> '父章程',
	'ACP_RULE_NO_PARENT'					=> '没有父章程',
	'ACP_RULE_TITLE'						=> '章程标题',
	'ACP_RULE_TITLE_EXPLAIN'				=> '章程标题会显示在章程页面，章程标题也被用于在管理页面标识你的章程。',
	'ACP_RULE_ANCHOR'						=> '章程锚点',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> '章程锚点是可选的，用于链接指向章程页面。它必须是 URL 友好的（不能包含空格和特殊字符），以字母开头并且必须唯一。',
	'ACP_RULE_MESSAGE'						=> '章程消息',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> '章程消息是显示在章程页面。（分类并不会显示章程消息）',
	'ACP_RULE_MESSAGE_DISABLED'				=> '这是分类，消息编辑器已经禁用。',
	'ACP_ADD_RULE'							=> '创建一条新章程',
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => '您确认要删除这条章程？',
		1 => '您确认要删除这条章程？<br />警告：删除分类会删除所有其包含的章程。',
	),
	'ACP_RULE_ADDED'						=> '成功增加了章程。',
	'ACP_RULE_DELETED'						=> '成功删除了章程。',
	'ACP_RULE_EDITED'						=> '章程编辑成功。',
	'ACP_RULE_TITLE_EMPTY'					=> '您必须输入一个标题。',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> '论坛章程无法锁定，可能已被其它进程锁定了。锁会在超时一个小时后强制释放。 ',
	'RULES_NESTEDSET_INVALID_ITEM'			=> '章程不存在。',
	'RULES_NESTEDSET_INVALID_PARENT'		=> '要求的章程没有父章程。',
));
