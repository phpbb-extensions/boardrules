<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
* German (Formal honorifics) translation by Talk19Zehn (www.ongray-design.de)
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
	'BOARDRULES_SAMPLE_CATEGORY_TITLE'		=> 'Beispiel Regel-Kategorie',
	'BOARDRULES_SAMPLE_CATEGORY_MESSAGE'	=> 'Dies ist eine Beispiel-Kategorie der Board-Regeln. Kategorien sind Regelblöcke mit ähnlichen Regeln. Regel-Anmerkungen (wie diese) werden bei Kategorien nicht auf der Regelseite angezeigt.',
	'BOARDRULES_SAMPLE_CATEGORY_ANCHOR'		=> 'beispiel_kategorie_anker',

	'BOARDRULES_SAMPLE_RULE_TITLE'			=> 'Beispiel-Regel',
	'BOARDRULES_SAMPLE_RULE_MESSAGE'		=> 'Dies ist eine Beispiel-Regel der Board-Regeln. Die Extension funktioniert einwandfrei. Sie können diese Regel bearbeiten oder löschen, um eigene Regeln zu erstellen, zu bearbeiten oder hinzuzufügen.',
	'BOARDRULES_SAMPLE_RULE_ANCHOR'			=> 'beispiel_regel_anker',
));
