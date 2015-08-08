<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
* Swedish translation by Holger (http://www.maskinisten.net)
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
	'BOARDRULES_SAMPLE_CATEGORY_TITLE'		=> 'Exemplarisk regelkategori',
	'BOARDRULES_SAMPLE_CATEGORY_MESSAGE'	=> 'Detta är en exemplarisk kategori för forumreglerna. Kategorier kan innehålla grupper av liknande forumregler. Kategorimeddelanden (som detta) visas ej på regelsidan.',
	'BOARDRULES_SAMPLE_CATEGORY_ANCHOR'		=> 'exemplarisk-kategori',

	'BOARDRULES_SAMPLE_RULE_TITLE'			=> 'Exemplarisk regel',
	'BOARDRULES_SAMPLE_RULE_MESSAGE'		=> 'Detta är en exemplarisk regel för forumreglerna. Allt verkar fungera som det ska. Du kan uppdatera eller radera denna regel och kategori och sedan skapa egna forumregler.',
	'BOARDRULES_SAMPLE_RULE_ANCHOR'			=> 'exemplarisk-regel',
));
