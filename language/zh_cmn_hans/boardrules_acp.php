<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
* @简体中文语言　David Yin <https://www.phpbbchinese.com/>
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
	'ACP_BOARDRULES_FONT_ICON'				=> '论坛章程链接图标',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> '输入一个 <strong><a href="%s" target="_blank">Font Awesome</a></strong> 图标的名字，用于顶部的论坛章程链接。留空则不显示图标。',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> '论坛章程链接图标包含不合法字符。',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> '注册新用户必须同意论坛章程',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> '这个选项会要求新用户在注册时，在“条款”的附近增加一个阅读和同意论坛章程的选项。',
	'ACP_BOARDRULES_NOTIFY'					=> '通知用户',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> '给所有的注册用户发送论坛章程更新的通知。（用户数量较多的话，耗时也多）',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> '您确认要给所有用户都发送通知？',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> '论坛章程设置已改变。',
	'ACP_BOARDRULES_LIST_STYLE'				=> '论坛章程列表之样式',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> '选择规则和分类项目的前缀方式。有序列表依次循环使用数字、字母和罗马数字；无序列表依次循环使用实心圆、空心圆和方块；复合编号显示完整的数字层级路径。',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> '字母数字顺序',
	'ACP_BOARDRULES_LIST_STYLE_UNORDERED'	=> '无序列表（实心圆、空心圆、方块）',
	'ACP_BOARDRULES_LIST_STYLE_COMPOUND'	=> '复合编号（1、1.1、1.1.1）',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> '无样式',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> '管理章程',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> '在此页，您可以增加，编辑，删除或重新排序分类和章程。一个分类包含一组章程。分类内可以包含无限条章程。',
	'ACP_BOARDRULES_INTRO'					=> '章程页面介绍',
	'ACP_BOARDRULES_INTRO_EXPLAIN'			=> '自定义向查看 <strong>%s</strong> 章程页面的用户显示的介绍。留空此字段可使用占位文本中显示的默认介绍。',
	'ACP_BOARDRULES_INTRO_SAVE'				=> '保存介绍',
	'ACP_BOARDRULES_INTRO_SAVED'			=> '章程页面介绍已保存。',
	'ACP_BOARDRULES_LANGUAGE_EXPLAIN'		=> '给你的论坛章程选择一个语言。用户会看到您用他们的首选语言所创建的论坛章程。如果您没有用他们的首选语言创建论坛章程，那么他们看到的就是以论坛的默认语言写的章程。',
	'ACP_BOARDRULES_CATEGORY'				=> '章程分类',
	'ACP_BOARDRULES_RULE'					=> '章程',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> '选择语言',
	'ACP_BOARDRULES_LANGUAGES'				=> '论坛章程语言',
	'ACP_BOARDRULES_LANGUAGES_EXPLAIN'		=> '在一个位置管理所有已安装的语言。将整套章程复制到另一种语言，以草稿形式翻译，准备好后再发布。',
	'ACP_BOARDRULES_RULES'					=> '章程',
	'ACP_BOARDRULES_STATUS'					=> '状态',
	'ACP_BOARDRULES_STATUS_EMPTY'			=> '正在使用默认语言',
	'ACP_BOARDRULES_STATUS_NO_RULES'		=> '无章程',
	'ACP_BOARDRULES_STATUS_DRAFT'			=> '草稿',
	'ACP_BOARDRULES_STATUS_PUBLISHED'		=> '已发布',
	'ACP_BOARDRULES_MANAGE_ACTION'			=> '管理',
	'ACP_BOARDRULES_COPY_ACTION'			=> '复制章程',
	'ACP_BOARDRULES_PUBLISH'				=> '发布',
	'ACP_BOARDRULES_SET_DRAFT'				=> '设为草稿',
	'ACP_BOARDRULES_ALL_LANGUAGES'			=> '所有语言',
	'ACP_BOARDRULES_DEFAULT_LANGUAGE'		=> '默认语言',
	'ACP_BOARDRULES_EMPTY_NOTICE'			=> '此语言中没有章程。用户目前看到的是论坛默认语言的章程。',
	'ACP_BOARDRULES_EMPTY_DEFAULT_NOTICE'	=> '论坛默认语言中没有章程。',
	'ACP_BOARDRULES_DRAFT_NOTICE'			=> '用户看不到这些章程。用户目前看到的是论坛默认语言的章程。',
	'ACP_BOARDRULES_DRAFT_DEFAULT_NOTICE'	=> '用户看不到这些章程。请发布它们，使论坛默认章程可用。',
	'ACP_BOARDRULES_COPY_RULESET'			=> '复制语言章程集',
	'ACP_BOARDRULES_COPY_RULESET_EXPLAIN'	=> '将每个分类和章程复制到<strong>%s</strong>。复制的章程将添加到任何现有章程之后，完整的目标章程集在您发布前会保持草稿状态。',
	'ACP_BOARDRULES_COPY_APPEND'			=> '添加到现有章程',
	'ACP_BOARDRULES_COPY_APPEND_EXPLAIN'	=> '目标目前包含 %d 条章程。它们将保持不变，复制的章程将添加到其后。任何冲突的已复制锚点都将获得数字后缀。',
	'ACP_BOARDRULES_COPY_SETTINGS'			=> '复制设置',
	'ACP_BOARDRULES_COPY_SOURCE'			=> '复制来源',
	'ACP_BOARDRULES_COPY_SOURCE_EXPLAIN'	=> '完整的层级结构、顺序、标题、消息、锚点和格式设置都将被复制。',
	'ACP_BOARDRULES_COPY_TARGET'			=> '复制到',
	'ACP_BOARDRULES_RULE_COUNT'				=> '%d 条章程',
	'ACP_BOARDRULES_COPY_INVALID_LANGUAGE'	=> '来源和目标必须是两种不同的已安装语言。',
	'ACP_BOARDRULES_COPY_SOURCE_EMPTY'		=> '所选来源语言中没有可复制的章程。',
	'ACP_BOARDRULES_COPY_SUCCESS'			=> '已将 %1$d 条章程作为草稿复制到%2$s。',
	'ACP_BOARDRULES_COPY_ANCHORS_RENAMED'	=> '%d 个冲突的锚点已使用数字后缀重命名。',
	'ACP_BOARDRULES_INVALID_LANGUAGE'		=> '所选语言尚未安装。',
	'ACP_BOARDRULES_STATUS_CHANGE_EMPTY'	=> '空章程集不能发布或改为草稿。',
	'ACP_BOARDRULES_DEFAULT_CANNOT_DRAFT'	=> '论坛默认语言不能改为草稿。',
	'ACP_BOARDRULES_PUBLISH_CONFIRM'		=> '发布此语言的完整章程集吗？使用此语言的用户将立即看到它。',
	'ACP_BOARDRULES_DRAFT_CONFIRM'			=> '将此语言的完整章程集改为草稿吗？使用此语言的用户将改为看到论坛默认语言的章程。',
	'ACP_BOARDRULES_PUBLISH_SUCCESS'		=> '语言章程集已发布。',
	'ACP_BOARDRULES_DRAFT_SUCCESS'			=> '语言章程集已改为草稿。',
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
