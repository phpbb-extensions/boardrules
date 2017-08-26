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
	// Settings page
	'ACP_BOARDRULES'						=> 'Regulamin witryny',
	'ACP_BOARDRULES_SETTINGS'				=> 'Ustawienia regulaminu',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'Tutaj można dokonać konfiguracji podstawowych ustawień regulaminu witryny.',
	'ACP_BOARDRULES_ENABLE'					=> 'Włącz regulamin witryny',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'Wyświetlaj odnośnik do regulamin witryny w nagłówku',
	'ACP_BOARDRULES_FONT_ICON'				=> 'Board rules link icon',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Enter the name of a <a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a> icon to use for the board rules link in the header. Leave this field blank for no board rules icon.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'The board rules link icon contained invalid characters.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Wymagaj od nowych użytkowników akceptacji regulaminu podczas rejestracji',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Opcja ta doda dodatkową klauzulę do warunków korzystania z witryny podczas rejestracji wymagającą od nowo zarejestrowanych użytkowników przeczytania i zaakceptowania regulaminu witryny.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Powiadom użytkowników',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Wyślij powiadomienie do wszystkich zarejestrowanych użytkowników z informacją o zmianie regulaminu. (Operacja ta może zająć kilka sekund na witrynie z wieloma tysiącami użytkowników.)',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Czy na pewno chcesz wysłać powiadomienie do wszystkich użytkowników?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Ustawienia regulaminu witryny zostały zmienione.',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Zarządzanie przepisami',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'Z tej strony można dodać, zmienić, usunąć albo zmienić kolejność rozdziałów i przepisów. Rozdział jest grupą powiązanych przepisów. Każdy rozdział może składać się z nieograniczonej liczby przepisów.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Rozdział regulaminu',
	'ACP_BOARDRULES_RULE'					=> 'Przepis',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Wybierz język',
	'ACP_BOARDRULES_CREATE_RULE'			=> 'Utwórz przepis',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'Używając poniższego formularza można utworzyć nowy przepis, który będzie wyświetlany użytkownikom witryny.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'Edytuj przepis',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'Używając poniższego formularza można zaktualizować istniejący przepis, który będzie wyświetlany użytkownikom witryny.',
	'ACP_RULE_SETTINGS'						=> 'Ustawienia przepisu',
	'ACP_RULE_PARENT'						=> 'Przepis macierzysty',
	'ACP_RULE_NO_PARENT'					=> 'Nie ma macierzystego przepisu',
	'ACP_RULE_TITLE'						=> 'Tytuł przepisu',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'Tytuły przepisów są wyświetlane na stronie regulaminu tylko dla rozdziałów. Tytułu rozdziałów są również używane do identyfikacji utworzonych przepisów podczas zarządzania przepisami w Panelu administracji.',
	'ACP_RULE_ANCHOR'						=> 'Zakotwiczenie przepisu',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'Zakotwiczenie przepisu jest opcjonalne i jest używane jako odnośnik do konkretnego przepisu na stronie regulaminu. Zakotwiczenie przepisu powinno być przyjaznym adresem URL (nie zawierać odstępów i znaków specjalnych), zaczynać się od litery oraz musi być unikatowe.',
	'ACP_RULE_MESSAGE'						=> 'Treść przepisu',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'Treść przepisu jest wyświetlana na stronie regulaminu dla każdego przepisu (rozdziały nie wyświetlają treści przepisu).',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'To jest rozdział zawierający przepisy - edytor treści przepisu został wyłączony.',
	'ACP_ADD_RULE'							=> 'Utwórz nowy przepis',
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => 'Czy na pewno chcesz usunąć ten przepis?',
		1 => 'Czy na pewno chcesz usunąć ten kategorii reguły?<br />Uwaga: Usunięcie kategorii reguły spowoduje także usunięcie wszystkich zawartych w nim zasad.',
	),
	'ACP_RULE_ADDED'						=> 'Przepis został dodany.',
	'ACP_RULE_DELETED'						=> 'Przepis został usunięty.',
	'ACP_RULE_EDITED'						=> 'Przepis został zaktualizowany.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Należy wprowadzić tytuł dla tego przepisu.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Board rules failed to acquire the table lock. Another process may be holding the lock. Locks are forcibly released after a timeout of 1 hour.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'The requested rule does not exist.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'The requested rule has no parent.',
));
