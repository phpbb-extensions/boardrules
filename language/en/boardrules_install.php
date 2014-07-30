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
	'BOARDRULES_SAMPLE_CATEGORY_TITLE'		=> 'Example Rule Category',
	'BOARDRULES_SAMPLE_CATEGORY_MESSAGE'	=> 'This is an example category in your Board Rules installation. Categories contain groups of related rules. Category messages (like this) are not displayed on the rules page.',
	'BOARDRULES_SAMPLE_CATEGORY_ANCHOR'		=> 'example-category',

	'BOARDRULES_SAMPLE_RULE_TITLE'			=> 'Example Rule',
	'BOARDRULES_SAMPLE_RULE_MESSAGE'		=> 'This is an example rule in your Board Rules installation. Everything seems to be working. You may edit or delete this rule and category and continue to set up your own board rules.',
	'BOARDRULES_SAMPLE_RULE_ANCHOR'			=> 'example-rule',
));
