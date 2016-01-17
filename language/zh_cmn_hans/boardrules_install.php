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
	'BOARDRULES_SAMPLE_CATEGORY_TITLE'		=> '章程分类样例',
	'BOARDRULES_SAMPLE_CATEGORY_MESSAGE'	=> '这是一个论坛章程的预装分类样例。分类包含相关的规则。分类消息（只显示在这里）不会显示在章程页面。 ',
	'BOARDRULES_SAMPLE_CATEGORY_ANCHOR'		=> 'example-category',

	'BOARDRULES_SAMPLE_RULE_TITLE'			=> '章程样例',
	'BOARDRULES_SAMPLE_RULE_MESSAGE'		=> '这是一条章程样例。你可以编辑或者删除这条章程。',
	'BOARDRULES_SAMPLE_RULE_ANCHOR'			=> 'example-rule',
));
