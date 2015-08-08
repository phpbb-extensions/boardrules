<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
* Polish translation by Pico (Pico88)
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
	'BOARDRULES_SAMPLE_CATEGORY_TITLE'		=> 'Przykładowy rozdział regulaminu',
	'BOARDRULES_SAMPLE_CATEGORY_MESSAGE'	=> 'To jest przykładowy rozdział dodany podczas instalacji Regulaminu witryny. Rozdział zawiera grupę powiązanych przepisów. Treść rozdziału (jak ta)) nie jest wyświetlana na stronie regulaminu.',
	'BOARDRULES_SAMPLE_CATEGORY_ANCHOR'		=> 'przykladowy-rozdzial',

	'BOARDRULES_SAMPLE_RULE_TITLE'			=> 'Przykładowy przepis',
	'BOARDRULES_SAMPLE_RULE_MESSAGE'		=> 'To jest przykładowy przepis dodany podczas instalacji Regulaminu witryny. Wszystko wydaje się działać. Możesz zmienić albo usunąć ten przepis i rozdział albo kontynuować ustawienie własnego regulaminu.',
	'BOARDRULES_SAMPLE_RULE_ANCHOR'			=> 'przykladowy-przepis',
));
