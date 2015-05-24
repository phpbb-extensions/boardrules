<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
* Ελληνική μετάφραση [el]
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
	'BOARDRULES_HEADER'			=> 'Όροι Συμμετοχής Δ. Συζήτησης',
	'BOARDRULES_EXPLAIN'		=> 'Οι όροι αυτοί γνωστοποιούνται για να αποσαφηνίσουν τις διάφορες ευθύνες όλων των μελών της κοινότητας του %s. Θα πρέπει να τηρούνται από όλους για να εξασφαλιστεί ότι η Δ. Συζήτηση λειτουργεί ομαλά και προσφέρει μια διασκεδαστική και παραγωγική εμπειρία για όλα τα μέλη και επισκέπτες της κοινότητας.',
	'BOARDRULES_CATEGORIES'		=> 'Τμήματα Όρων',
	'BOARDRULES_CATEGORY_ANCHOR'=> 'τμήμα-%s',
	'BOARDRULES_RULE_ANCHOR'	=> 'όρος-%s',
));
