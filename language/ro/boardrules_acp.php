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
	// Settings page
	'ACP_BOARDRULES'						=> 'Reguli Forum',
	'ACP_BOARDRULES_SETTINGS'				=> 'Setari Reguli',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'De aici poti administra regurile impuse de tine pe acest site.',
	'ACP_BOARDRULES_ENABLE'					=> 'Activeaza reguli forum',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'Arata link in header catre reguli',
	'ACP_BOARDRULES_FONT_ICON'				=> 'Board rules link icon',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Enter the name of a <a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a> icon to use for the board rules link in the header. Leave this field blank for no board rules icon.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'The board rules link icon contained invalid characters.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Utilizatorii noi trebuie sa confirme ca sunt de acord cu regurile',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Utilizatorii noi trebuie sa confirme ca sunt de acord cu regurile impuse pe aceste site.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Informeaza utilizatori',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Trimite notificare catre utilizatori precum ai introdus un regulament nou',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Esti sigur ca vrei sa trimiti o notificare catre toti utilizatorii?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Setarile de reguli au fost modificate.',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Editeza Reguli',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'De aici poti edita ,adauga si sterge regurile impuse de tine, le poti pune pe categorii ele fiind nelimitate',
	'ACP_BOARDRULES_CATEGORY'				=> 'Caterorie Regula',
	'ACP_BOARDRULES_RULE'					=> 'Regula',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Selecteaza limba',
	'ACP_BOARDRULES_CREATE_RULE'			=> 'Creaza regula',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'Utilizand acest form poti crea reguli noi pentru utilizatorii tai.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'Editeaza regula',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'De aici poti face update regurilor existente.',
	'ACP_RULE_SETTINGS'						=> 'Setari Reguli',
	'ACP_RULE_PARENT'						=> 'Regula categorie',
	'ACP_RULE_NO_PARENT'					=> 'Fara categorie',
	'ACP_RULE_TITLE'						=> 'Titlu regula',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'Acest titlu apare in pagina de reguli dar si in ACP',
	'ACP_RULE_ANCHOR'						=> 'Indentificare Regula',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'Aici poti pune sa indentifici mai usor regula incalcata (ex. spam).',
	'ACP_RULE_MESSAGE'						=> 'Mesaj Regula',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'Mesajul regula apare doar pe pagina de reguli.',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'Aceasta categorie contine mesaje, iar editarea a fost oprita.',
	'ACP_ADD_RULE'							=> 'Creaza o regula noua',
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => 'Esti sigur ca vrei sa stergi aceasta regula?',
		1 => 'Esti sigur ca vrei sa stergi aceasta regula?<br />Avertisment: Eliminarea unei categorii reguli va duce la elimina toate regulile conținute în ea.',
	),
	'ACP_RULE_ADDED'						=> 'Regula a fost adaugata cu succes.',
	'ACP_RULE_DELETED'						=> 'Regula a fost stearsa cu succes.',
	'ACP_RULE_EDITED'						=> 'Regula a fost editata cu succes.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Trbuie sa introduci un titlu.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Board rules failed to acquire the table lock. Another process may be holding the lock. Locks are forcibly released after a timeout of 1 hour.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'The requested rule does not exist.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'The requested rule has no parent.',
));
