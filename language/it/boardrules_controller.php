<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
* @Italian translation by systemcrack http://morfeuscommunity.biz
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
	'BOARDRULES_HEADER'			=> 'Regole del Forum',
	'BOARDRULES_EXPLAIN'		=> 'Queste regole sono comunicati atti a chiarire le varie responsabilità di tutti i membri della comunità qui su %s. Esse devono essere rispettate da tutti al fine di garantire una divertente e produttiva esperienza per tutti gli ospiti e i membri della community.',
	'BOARDRULES_CATEGORIES'		=> 'Regole Sezioni',
	'BOARDRULES_CATEGORY_ANCHOR'=> 'sezione-%s',
	'BOARDRULES_RULE_ANCHOR'	=> 'regola-%s',
));
