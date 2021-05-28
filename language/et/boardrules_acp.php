<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
* Estonian translation by phpBBeesti.com <http://www.phpbbeesti.com>
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
	'ACP_BOARDRULES'						=> 'Foorumi reeglid',
	'ACP_BOARDRULES_SETTINGS'				=> 'Reeglite seaded',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'Sellel lehel saad seadistada foorumi reegleid.',
	'ACP_BOARDRULES_ENABLE'					=> 'Luba foorumi reeglid',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'Näita foorumi reeglite linki päises',
	'ACP_BOARDRULES_FONT_ICON'				=> 'Board rules link icon',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Enter the name of a <strong><a href="%s" target="_blank">Font Awesome</a></strong> icon to use for the board rules link in the header. Leave this field blank for no board rules icon.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'The board rules link icon contained invalid characters.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Nõua uutel kasutajatel nõustuda tingimustega registreerimislehel',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'See valik lisab täiendava punkti “kasutamistingimuste” lehele, kus uued liikmed peavad enne registreerumist nõustuma täiendavate foorumi reeglitega.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Teavita kasutajat',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Saada teavitus kõigile registreeritud kasutajatele, et foorumi reeglid on uuendatud. (See võib võtta mõne aja, kui foorumil on üle tuhande kasutaja.)',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Oled sa kindel, et soovid saata teavituse kõigile kasutajatele?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Foorumi reeglite seaded on muudetud.',
	'ACP_BOARDRULES_LIST_STYLE'				=> 'Board rules list style',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Board rules are presented in a list format. Decide if you want rule and category items to be preceded by ordered alpha-numeric ordinals (this is the default behavior), bullets or nothing.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Ordered alpha-numeric',
	'ACP_BOARDRULES_LIST_STYLE_BULLET'		=> 'Bullet',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'None',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Halda reegleid',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'Siin lehel saad lisada, muuta, kustutada ja muuta järjestust reeglitel. Kategooria on grupp, seotud reeglitega. Igal kategoorial võib olla piiramatu arv reegleid.',
	'ACP_BOARDRULES_LANGUAGE_EXPLAIN'		=> 'Choose a language for your Board Rules. Users will see the rules you create for their preferred language. If you do not create any rules in their preferred language, then users will see rules created using the board’s default language.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Reegli kategooria',
	'ACP_BOARDRULES_RULE'					=> 'Reegel',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Vali keel',
	'ACP_BOARDRULES_CREATE_RULE'			=> 'Loo reegel',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'Kasutades all olevat vormi saad luua uue reegli, mida näidatakse foorumi kasutajatele.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'Muuda reeglit',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'Kasutades all olevat vormi saad uuendada olemasolevat reeglit, mida näidatakse foorumi kasutajatele.',
	'ACP_RULE_SETTINGS'						=> 'Reegli seaded',
	'ACP_RULE_PARENT'						=> 'Peamine reegel',
	'ACP_RULE_NO_PARENT'					=> 'Ei ole peamist',
	'ACP_RULE_TITLE'						=> 'Reegli pealkiri',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'Reegli pealkirja näidatakse ainult  reeglite lehel kategooriates ainult. Reeglite pealkirju kasutatakse ka AJP’s, tuvastades reegleid kui haldad neid.',
	'ACP_RULE_ANCHOR'						=> 'Reegli kinnitus',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'Reegli kinnitus on valikuline ja kasutatakse siis kui lingitakse kinnitus punktile reeglite lehele. Need peaksid olema URL sõbralikud (mitte sisaldades tühikuid ega mõnda muud spetsiaalset sümbolit), peaksid algama tähega ja olema unikaalsed.',
	'ACP_RULE_MESSAGE'						=> 'Reegli sisu',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'Reegli sisu näidatakse reeglite lehel igal reeglil (kategooriatel ei ole reeglite sisu).',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'See on kategooria, mis sisaldab reegleid, sõnumi muutja on keelatud.',
	'ACP_ADD_RULE'							=> 'Loo uus reegel',
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => 'Oled sa kindel, et soovid eemaldada selle reegli?',
		1 => 'Oled sa kindel, et soovid eemaldada selle reeglite kategooria?<br />Hoiatus: Reeglite kategooria eemaldamisega, eemaldad ka selles kategoorias asetsevad reeglid.',
	),
	'ACP_RULE_ADDED'						=> 'Reegel on edukalt lisatud.',
	'ACP_RULE_DELETED'						=> 'Reegel on edukalt kustutatud.',
	'ACP_RULE_EDITED'						=> 'Reegel on edukalt muudetud.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Sa pead sisestama pealkirja antud reeglile.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Laiendusel "Foorumi reeglid" ei õnnestunud omandada tabeli lukustamist. Järgmise toimingu ajal võib õnnestuda lukustamine. Lukustamine on vabastatakse jõuliselt peale ühe tunnist ooteaega.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'Soovitud reeglit ei eksisteeri.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'Soovitud reeglil ei ole vanemkategooriat.',
));
