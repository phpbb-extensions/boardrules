<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
* Croatian translation by Ančica Sečan (http://ancica.sunceko.net)
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
	'ACP_BOARDRULES'						=> 'Forumska pravila',
	'ACP_BOARDRULES_SETTINGS'				=> 'Postavke pravila',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'Ovdje možeš podesiti opće postavke forumskih pravila.',
	'ACP_BOARDRULES_ENABLE'					=> 'Omogući forumska pravila',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'Prikaži link na forumska pravila u zaglavlju',
	'ACP_BOARDRULES_FONT_ICON'				=> 'Board rules link icon',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Enter the name of a <a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a> icon to use for the board rules link in the header. Leave this field blank for no board rules icon.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'The board rules link icon contained invalid characters.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Zahtijevaj prihvaćanje forumskih pravila prilikom “Registracije”',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Ukoliko je omogućeno, prilikom “Registracije”, uz inicijalna pravila, bit će prikazana i forumska pravila te će se, kao što se mora i s inicijalnim pravilima, (a) da bi “Registracija” bila uspješna, [budući(a] korisnik/ca morati složiti odnosno prihvatiti ih.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Obavijesti korisnike/ce',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Ukoliko je omogućeno, svim korisnicima/ama bit će poslana obavijest o ažuriranju forumskih pravila.<br />Na forumima s više tisuća korisnika/ca, izvršenje ove radnje može potrajati nekoliko odnosno više sekundi.',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Jesi li siguran/na da želiš poslati obavijest svim korisnicima/ama?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Postavke forumskih pravila su izmijenjene.',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Upravljanje pravilima',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'Ovdje možeš dod(av)ati, uređivati, izbrisivati i reorganizirati kategorije i pravila.<br />Kategorija je grupa povezanih pravila. Svaka kategorija može imati neograničen broj pravila.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Pravilo kategorije',
	'ACP_BOARDRULES_RULE'					=> 'Pravilo',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Izaberi jezik',
	'ACP_BOARDRULES_CREATE_RULE'			=> 'Dodaj pravilo',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'Korištenjem donje forme možeš dodati novo pravilo koje će biti prikazano svim korisnicima/ama.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'Uredi pravilo',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'Korištenjem donje forme možeš ažurirati postojeće pravilo koje će biti prikazano svim korisnicima/ama.',
	'ACP_RULE_SETTINGS'						=> 'Postavke pravila',
	'ACP_RULE_PARENT'						=> 'Krovno pravilo',
	'ACP_RULE_NO_PARENT'					=> 'Bez krovnog pravila',
	'ACP_RULE_TITLE'						=> 'Naziv pravila',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'Nazivi pravila prikazani su na stranici pravila samo za kategorije pravila.<br />Nazivi pravila koriste se i za identifikaciju pravila prilikom upravljanja pravilima u AF.',
	'ACP_RULE_ANCHOR'						=> '“Sidro” pravila',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> '“Sidra” pravila su opcionalna (i) služe kao link(ovi) na stranice pravila.<br />Trebala bi biti “URL friendly” (a što će reći da) ne bi smjela sadržavati razmaknice odnosno specijalne znakove, trebala bi započeti sa slovom i trebala bi biti unikatna.',
	'ACP_RULE_MESSAGE'						=> 'Poruka pravila',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'Poruka pravila prikazana je na stranici pravila za svako pravilo.<br />Kategorije ne prikazuju poruke pravila.',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'Ovo je kategorija koja sadrži pravila.<br />Uređivač poruka je onemogućen.',
	'ACP_ADD_RULE'							=> 'Dodaj novo pravilo',
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => 'Jesi li siguran/na da želiš izbrisati ovo pravilo?',
		1 => 'Jesi li siguran/na da želiš izbrisati ovo kategorije pravila?<br />Upozorenje: izbrisivanje kategorije pravila rezultirat će izbrisivanjem svih pravila povezanih s istom.',
	),
	'ACP_RULE_ADDED'						=> 'Pravilo je dodano.',
	'ACP_RULE_DELETED'						=> 'Pravilo je izbrisano.',
	'ACP_RULE_EDITED'						=> 'Pravilo je uređeno.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Moraš upisati naslov pravila.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Forumska pravila nisu uspjela postići zaključavanje tablice. Moguće je da isto ometa neki drugi proces. Zaključavanja se prisilno izvršavaju po isteku vremena od jednog sata.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'Zatraženo pravilo ne postoji.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'Zatraženo pravilo nema krovno pravilo.',
));
