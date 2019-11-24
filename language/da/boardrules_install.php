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
	'BOARDRULES_SAMPLE_CATEGORY_TITLE'		=> 'Eksempel på regelkategori',
	'BOARDRULES_SAMPLE_CATEGORY_MESSAGE'	=> 'Dette er et eksempel på en kategori i din boardregler-installation. Kategorier indeholder grupper af relaterede regler. Kategoribeskeder (som denne) vises ikke på regler-siden.',
	'BOARDRULES_SAMPLE_CATEGORY_ANCHOR'		=> 'eksempel-pa-regelkategori',

	'BOARDRULES_SAMPLE_RULE_TITLE'			=> 'Eksempel på regel',
	'BOARDRULES_SAMPLE_RULE_MESSAGE'		=> 'Dette er et eksempel på en regel i din boardregler-installation. Det ser alt sammen ud til at virke. Du kan redigere eller slette denne regel og kategorien, og fortsætte med at opsætte dine egne boardregler.',
	'BOARDRULES_SAMPLE_RULE_ANCHOR'			=> 'eksempel-pa-regel',
));
