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
	'ACP_BOARDRULES'						=> 'Pravidla fóra',
	'ACP_BOARDRULES_SETTINGS'				=> 'Nastavení pravidel',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'Tato stránka obsahuje hlavní nastavení pravidel fóra.',
	'ACP_BOARDRULES_ENABLE'					=> 'Povolit pravidla fóra',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'Zobrazit odkaz na pravidla v hlavičce fóra',
	'ACP_BOARDRULES_FONT_ICON'				=> 'Board rules link icon',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Enter the name of a <strong><a href="%s" target="_blank">Font Awesome</a></strong> icon to use for the board rules link in the header. Leave this field blank for no board rules icon.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'The board rules link icon contained invalid characters.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Vyžadovat schválení pravidel při registraci na fórum',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Toto nastavení přidá do podmínek použití fóra větu, která nově registrované zavazuje přečíst si pravidla fóra.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Upozornit uživatele',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Všem registrovaným uživatelům zaslat informace o změně v pravidlech. (To může trvat několik sekund v závislosti na počtu registrovaných uživatelů)',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Opravdu chceš odeslat oznámení všem uživatelům na fóru?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Nastavení pravidel fóra změněno.',
	'ACP_BOARDRULES_LIST_STYLE'				=> 'Board rules list style',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Board rules are presented in a list format. Decide if you want rule and category items to be preceded by ordered alpha-numeric ordinals (this is the default behavior), bullets or nothing.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Ordered alpha-numeric',
	'ACP_BOARDRULES_LIST_STYLE_BULLET'		=> 'Bullet',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'None',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Spravovat pravidla',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'Na této stránce můžeš přidávat, upravovat, mazat a reorganizovat kategorie a pravidla. Kategorie je skupina souvisejících pravidel. Každá kategorie může mít neomezený počet pravidel.',
	'ACP_BOARDRULES_LANGUAGE_EXPLAIN'		=> 'Choose a language for your Board Rules. Users will see the rules you create for their preferred language. If you do not create any rules in their preferred language, then users will see rules created using the board’s default language.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Kategorie pravidel',
	'ACP_BOARDRULES_RULE'					=> 'Pravidlo',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Vyberte jazyk pravidel',
	'ACP_BOARDRULES_CREATE_RULE'			=> 'Vytvořit pravidlo',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'Pomocí tohoto formuláře můžeš vytvořit nové pravidlo, které se zobrazí uživatelům.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'Upravit pravidlo',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'Pomocí tohoto formuláře můžeš upravit pravidlo, které se zobrazí uživatelům.',
	'ACP_RULE_SETTINGS'						=> 'Nastavení pravidel',
	'ACP_RULE_PARENT'						=> 'Nadřazené pravidlo',
	'ACP_RULE_NO_PARENT'					=> 'Žádné',
	'ACP_RULE_TITLE'						=> 'Název pravidla',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'Názvy pravidel jsou zobrazeny pouze u kategorií. U pravidel slouží pouze pro lepší orientaci při jejich správě.',
	'ACP_RULE_ANCHOR'						=> 'Odkaz na pravidlo',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'Odkaz na fórum je volitelný a umožňuje přímo odkázat na určitou část pravidel. Tento identifikátor by neměl obsahovat žádné mezery a speciální znaky, měl by začínat písmenem a musí být unikátní.',
	'ACP_RULE_MESSAGE'						=> 'Obsah pravidla',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'Obsah pravidla je zobrazen u každého z pravidel (toto pole je u kategorií ignorováno).',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'Toto je kategorie pravidel, proto není možné pravidlo upravovat.',
	'ACP_ADD_RULE'							=> 'Vytvořit nové pravidlo',
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => 'Opravdu chcete smazat toto pravidlo?',
		1 => 'Opravdu chcete smazat toto pravidlo?<br />Varování: Smazáním kategorie odstraníte také všechna vnořená pravidla.',
	),
	'ACP_RULE_ADDED'						=> 'Pravidlo úspěšně přidáno.',
	'ACP_RULE_DELETED'						=> 'Pravidlo úspěšně odstraněno.',
	'ACP_RULE_EDITED'						=> 'Pravidlo úspěšně upraveno.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Musíš zadat název pravidla.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Board rules se nepodařilo uzamknout tabulku. Možná je právě uzamčena jiným procesem. Zámky jsou násilně odstraňovány po uplynutí jedné hodiny.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'Požadované pravidlo neexistuje.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'Požadované pravidlo nemá žádný nadřazený prvek.',
));
