<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
* French translation by ForumsFaciles (http://www.forumsfaciles.fr)
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
	'BOARDRULES_HEADER'			=> 'Règles du forum',
	'BOARDRULES_EXPLAIN'		=> 'Ces règles sont établies pour préciser les différentes responsabilités de tous les membres de la communauté sur %s. Elles doivent être acceptées par chacun dans le but de garantir que notre forum fonctionne sans heurt et procure une expérience amusante et productive pour tous les membres de notre communauté ainsi que les visiteurs.',
	'BOARDRULES_CATEGORIES'		=> 'Sections des Règles',
	'BOARDRULES_CATEGORY_ANCHOR'=> 'section-%s',
	'BOARDRULES_RULE_ANCHOR'	=> 'regle-%s',
));
