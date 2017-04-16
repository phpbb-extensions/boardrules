<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
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
	'BOARDRULES_SAMPLE_CATEGORY_TITLE'		=> 'ルールカテゴリ例',
	'BOARDRULES_SAMPLE_CATEGORY_MESSAGE'	=> 'これは掲示板ルールインストールのカテゴリ例です。カテゴリは関連するルールのグループを含んでいます。カテゴリメッセージ(これみたいな)はルールページ上で表示されません。',
	'BOARDRULES_SAMPLE_CATEGORY_ANCHOR'		=> 'example-category',

	'BOARDRULES_SAMPLE_RULE_TITLE'			=> 'ルール例',
	'BOARDRULES_SAMPLE_RULE_MESSAGE'		=> 'これは掲示板ルールインストールのルール例です。全てが動作しているように見えます。このルールを変更や削除をして自身の掲示板ルールの設定を続けることが出来ます。',
	'BOARDRULES_SAMPLE_RULE_ANCHOR'			=> 'example-rule',
));
