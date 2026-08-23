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
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Enter the name of a <strong><a href="%s" target="_blank">Font Awesome</a></strong> icon to use for the board rules link in the header. Leave this field blank for no board rules icon.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'The board rules link icon contained invalid characters.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Zahtijevaj prihvaćanje forumskih pravila prilikom “Registracije”',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Ukoliko je omogućeno, prilikom “Registracije”, uz inicijalna pravila, bit će prikazana i forumska pravila te će se, kao što se mora i s inicijalnim pravilima, (a) da bi “Registracija” bila uspješna, [budući(a] korisnik/ca morati složiti odnosno prihvatiti ih.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Obavijesti korisnike/ce',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Ukoliko je omogućeno, svim korisnicima/ama bit će poslana obavijest o ažuriranju forumskih pravila.<br />Na forumima s više tisuća korisnika/ca, izvršenje ove radnje može potrajati nekoliko odnosno više sekundi.',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Jesi li siguran/na da želiš poslati obavijest svim korisnicima/ama?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Postavke forumskih pravila su izmijenjene.',
	'ACP_BOARDRULES_LIST_STYLE'				=> 'Board rules list style',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Odaberite način označavanja pravila i kategorija. Uređeni popis izmjenjuje brojeve, slova i rimske brojeve. Neuređeni popis izmjenjuje puni krug, kružnicu i kvadrat. Složeno numeriranje prikazuje cijelu brojčanu putanju.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Ordered alpha-numeric',
	'ACP_BOARDRULES_LIST_STYLE_UNORDERED'	=> 'Neuređeno (puni krug, kružnica, kvadrat)',
	'ACP_BOARDRULES_LIST_STYLE_COMPOUND'	=> 'Složeno numeriranje (1, 1.1, 1.1.1)',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'None',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Upravljanje pravilima',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'Ovdje možeš dod(av)ati, uređivati, izbrisivati i reorganizirati kategorije i pravila.<br />Kategorija je grupa povezanih pravila. Svaka kategorija može imati neograničen broj pravila.',
	'ACP_BOARDRULES_INTRO'					=> 'Uvod stranice s pravilima',
	'ACP_BOARDRULES_INTRO_EXPLAIN'			=> 'Prilagodite uvod koji se prikazuje korisnicima stranice pravila <strong>%s</strong>. Ostavite ovo polje prazno za uporabu zadanog uvoda prikazanog kao rezervirano mjesto.',
	'ACP_BOARDRULES_INTRO_SAVE'				=> 'Spremi uvod',
	'ACP_BOARDRULES_INTRO_SAVED'			=> 'Uvod stranice s pravilima je spremljen.',
	'ACP_BOARDRULES_LANGUAGE_EXPLAIN'		=> 'Choose a language for your Board Rules. Users will see the rules you create for their preferred language. If you do not create any rules in their preferred language, then users will see rules created using the board’s default language.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Pravilo kategorije',
	'ACP_BOARDRULES_RULE'					=> 'Pravilo',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Izaberi jezik',
	'ACP_BOARDRULES_LANGUAGES'				=> 'Jezici pravila foruma',
	'ACP_BOARDRULES_LANGUAGES_EXPLAIN'		=> 'Upravljajte svim instaliranim jezicima na jednom mjestu. Kopirajte cijeli skup pravila na drugi jezik, prevedite ga kao skicu, a zatim ga objavite kada bude spreman.',
	'ACP_BOARDRULES_RULES'					=> 'Pravila',
	'ACP_BOARDRULES_STATUS'					=> 'Status',
	'ACP_BOARDRULES_STATUS_EMPTY'			=> 'Koriste se pravila zadanog jezika',
	'ACP_BOARDRULES_STATUS_NO_RULES'		=> 'Nema pravila',
	'ACP_BOARDRULES_STATUS_DRAFT'			=> 'Skica',
	'ACP_BOARDRULES_STATUS_PUBLISHED'		=> 'Objavljeno',
	'ACP_BOARDRULES_MANAGE_ACTION'			=> 'Upravljaj',
	'ACP_BOARDRULES_COPY_ACTION'			=> 'Kopiraj pravila',
	'ACP_BOARDRULES_PUBLISH'				=> 'Objavi',
	'ACP_BOARDRULES_SET_DRAFT'				=> 'Postavi kao skicu',
	'ACP_BOARDRULES_ALL_LANGUAGES'			=> 'Svi jezici',
	'ACP_BOARDRULES_DEFAULT_LANGUAGE'		=> 'Zadani jezik',
	'ACP_BOARDRULES_EMPTY_NOTICE'			=> 'Na ovom jeziku nema pravila. Korisnici trenutačno vide pravila na zadanom jeziku foruma.',
	'ACP_BOARDRULES_EMPTY_DEFAULT_NOTICE'	=> 'Na zadanom jeziku foruma nema pravila.',
	'ACP_BOARDRULES_DRAFT_NOTICE'			=> 'Ova pravila nisu vidljiva korisnicima. Korisnici trenutačno vide pravila na zadanom jeziku foruma.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_NOTICE'	=> 'Ova pravila nisu vidljiva korisnicima. Objavite ih kako bi zadana pravila foruma bila dostupna.',
	'ACP_BOARDRULES_COPY_RULESET'			=> 'Kopiraj skup pravila jezika',
	'ACP_BOARDRULES_COPY_RULESET_EXPLAIN'	=> 'Kopirajte sve kategorije i pravila u <strong>%s</strong>. Kopirana pravila dodat će se nakon postojećih pravila, a cijeli ciljni skup pravila ostat će skica dok ga ne objavite.',
	'ACP_BOARDRULES_COPY_APPEND'			=> 'Dodaj postojećim pravilima',
	'ACP_BOARDRULES_COPY_APPEND_EXPLAIN'	=> 'Cilj trenutačno sadrži %d pravila. Ona će ostati nepromijenjena, a kopirana pravila dodat će se nakon njih. Svim kopiranim sidrima koja se podudaraju dodat će se brojčani sufiks.',
	'ACP_BOARDRULES_COPY_SETTINGS'			=> 'Postavke kopiranja',
	'ACP_BOARDRULES_COPY_SOURCE'			=> 'Kopiraj iz',
	'ACP_BOARDRULES_COPY_SOURCE_EXPLAIN'	=> 'Kopirat će se cijela hijerarhija, redoslijed, naslovi, poruke, sidra i postavke oblikovanja.',
	'ACP_BOARDRULES_COPY_TARGET'			=> 'Kopiraj u',
	'ACP_BOARDRULES_RULE_COUNT'				=> '%d pravila',
	'ACP_BOARDRULES_COPY_INVALID_LANGUAGE'	=> 'Izvor i cilj moraju biti različiti instalirani jezici.',
	'ACP_BOARDRULES_COPY_SOURCE_EMPTY'		=> 'Odabrani izvorni jezik nema pravila za kopiranje.',
	'ACP_BOARDRULES_COPY_SUCCESS'			=> '%1$d pravila kopirano je u %2$s kao skica.',
	'ACP_BOARDRULES_COPY_ANCHORS_RENAMED'	=> '%d podudarnih sidara preimenovano je pomoću brojčanih sufiksa.',
	'ACP_BOARDRULES_INVALID_LANGUAGE'		=> 'Odabrani jezik nije instaliran.',
	'ACP_BOARDRULES_STATUS_CHANGE_EMPTY'	=> 'Prazan skup pravila ne može se objaviti niti postaviti kao skica.',
	'ACP_BOARDRULES_PUBLISH_CONFIRM'		=> 'Objaviti cijeli skup pravila za ovaj jezik? Korisnici ovog jezika odmah će ga vidjeti.',
	'ACP_BOARDRULES_DRAFT_CONFIRM'			=> 'Postaviti cijeli skup pravila za ovaj jezik kao skicu? Korisnici ovog jezika umjesto njega vidjet će pravila na zadanom jeziku foruma.',
	'ACP_BOARDRULES_PUBLISH_SUCCESS'		=> 'Skup pravila jezika je objavljen.',
	'ACP_BOARDRULES_DRAFT_SUCCESS'			=> 'Skup pravila jezika postavljen je kao skica.',
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

	'ACP_BOARDRULES_FALLBACK_UNAVAILABLE'	=> 'Nisu dostupna objavljena pravila zadanog jezika.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_CONFIRM'	=> 'Promijeniti skup pravila zadanog jezika u nacrt? Korisnici bez drugog objavljenog skupa pravila neće imati dostupna pravila.',
	'ACP_BOARDRULES_DRAFT_NO_FALLBACK_CONFIRM' => 'Promijeniti kompletan skup jezičnih pravila u nacrt? Nisu dostupna objavljena pravila zadanog jezika kao zamjena.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Forumska pravila nisu uspjela postići zaključavanje tablice. Moguće je da isto ometa neki drugi proces. Zaključavanja se prisilno izvršavaju po isteku vremena od jednog sata.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'Zatraženo pravilo ne postoji.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'Zatraženo pravilo nema krovno pravilo.',
));
