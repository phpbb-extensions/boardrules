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
	'BOARDRULES_HEADER'			=> '论坛章程',
	'BOARDRULES_EXPLAIN'		=> '公布在这里的章程是为了让所有的会员都能够清楚了解论坛 “ %s” 的各项责任。 所有的成员都遵守这些章程，才能让论坛运行的顺遂，让所有会员和游客都得到良好的体验。',
	'BOARDRULES_CATEGORIES'		=> '章程段落',
	'BOARDRULES_CATEGORY_ANCHOR'=> 'section-%s',
	'BOARDRULES_RULE_ANCHOR'	=> 'rule-%s',
));
