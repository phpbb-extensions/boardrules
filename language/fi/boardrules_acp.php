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
	'ACP_BOARDRULES'						=> 'Foorumin säännöt',
	'ACP_BOARDRULES_SETTINGS'				=> 'Sääntöjen asetukset',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'Täällä voit määrittää sääntöjen pääasetukset.',
	'ACP_BOARDRULES_ENABLE'					=> 'Ota säännöt käyttöön',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'Näytä säännöt linkkinä foorumi yläosassa.',
	'ACP_BOARDRULES_FONT_ICON'				=> 'Foorumin säännöt linkin kuvake',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Kirjoita <strong><a href="%s" target="_blank">Font Awesome</a></strong> -kuvakkeen nimi, jota käytetään taulun säännöt-linkissä. Jätä tämä kenttä tyhjäksi, jos sinulla ei ole sääntöjä.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'Sääntöjen linkkikuvake sisälsi virheellisiä merkkejä.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Vaadi uusia käyttäjiä hyväksymään säännöt rekisteröinnin yhteydessä',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Tämä vaihtoehto lisää "Käyttöehtoihin" lauseen, joka edellyttää uusien rekisteröityneiden käyttäjien lukevan ja hyväksyvän säännöt rekisteröinnin yhteydessä.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Ilmoita käyttäjille',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Lähetä ilmoitus kaikille rekisteröityneille käyttäjille, että säännöt on päivitetty. (Tämän suorittaminen voi kestää useita sekunteja laudoilla, joissa on useita tuhansia jäseniä.)',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Haluatko varmasti lähettää ilmoituksia kaikille käyttäjille?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Sääntöjen asetuksia muutettu.',
	'ACP_BOARDRULES_LIST_STYLE'				=> 'Sääntöjen listaustyyli',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Säännöt esitetään luettelomuodossa. Päätä, haluatko sääntö- ja luokkakohtien edeltävän aakkosnumeerisia järjestyslukuja (tämä on oletustoiminto), luettelomerkit vai ei mitään.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Aakkosnumeerinen',
	'ACP_BOARDRULES_LIST_STYLE_BULLET'		=> 'Piste',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'Ei mitään',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Muokkaa sääntöjä',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'Tällä sivulla voit lisätä, muokata, poistaa ja järjestää uudelleen kategorioita ja sääntöjä. Kategoria on joukko toisiinsa liittyviä sääntöjä. Jokaisella kategorialla voi olla rajoittamaton määrä sääntöjä.',
	'ACP_BOARDRULES_LANGUAGE_EXPLAIN'		=> 'Valitse sääntöjen kieli. Käyttäjät näkevät heidän haluamalleen kielelle luomasi säännöt. Jos et luo sääntöjä halutulla kielellä, käyttäjät näkevät säännöt, jotka on luotu laudan oletuskielellä.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Sääntö kategoria',
	'ACP_BOARDRULES_RULE'					=> 'Sääntö',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Valitse kieli',
	'ACP_BOARDRULES_CREATE_RULE'			=> 'Luo sääntö',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'Alla olevalla lomakkeella voit luoda uuden säännön, joka näytetään käyttäjillesi.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'Muokkaa sääntöä',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'Alla olevalla lomakkeella voit päivittää olemassa olevan säännön, joka näytetään käyttäjillesi.',
	'ACP_RULE_SETTINGS'						=> 'Sääntöasetukset',
	'ACP_RULE_PARENT'						=> 'Säännön ylätaso',
	'ACP_RULE_NO_PARENT'					=> 'Ei ylätasoa',
	'ACP_RULE_TITLE'						=> 'Säännön otsikko',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'Sääntöjen otsikot näkyvät vain sääntöluokkien sääntösivulla. Sääntöotsikoita käytetään myös sääntöjen tunnistamiseen, kun niitä hallinnoidaan ACP:ssä.',
	'ACP_RULE_ANCHOR'						=> 'Sääntöankkuri',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'Sääntöankkurit ovat valinnaisia, ja niitä käytetään linkkien ankkuripisteinä sääntösivulla. Niiden tulee olla URL-osoiteystävällisiä (ei sisällä välilyöntejä tai erikoismerkkejä), niiden tulee alkaa kirjaimella ja niiden on oltava yksilöllisiä.',
	'ACP_RULE_MESSAGE'						=> 'Säännön sisältö',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'Säännön sisältö näytetään kunkin säännön kohdalla Säännöt-sivulla (kategoriat eivät näytä sääntöviestiä).',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'Tämä on kategoria, joka sisältää sääntöjä, viestieditori on poistettu käytöstä.',
	'ACP_ADD_RULE'							=> 'Luo uusi sääntö',
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => 'Haluatko varmasti poistaa tämän säännön?',
		1 => 'Haluatko varmasti poistaa tämän sääntökategorian?<br />Varoitus: Sääntökategorian poistaminen poistaa myös kaikki sen sisältämät säännöt.',
	),
	'ACP_RULE_ADDED'						=> 'Sääntö lisätty onnistuneesti.',
	'ACP_RULE_DELETED'						=> 'Sääntö poistettu onnistuneesti.',
	'ACP_RULE_EDITED'						=> 'Sääntöä muokattu onnistuneesti.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Sinun on annettava tälle säännölle otsikko.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Säännöt eivät onnistuneet saamaan yhteyttä taulukkoon. Toinen prosessi voi käyttää taulukkoa tällä hetkellä. Taulukon yhteys vapautetaan väkisin 1 tunnin aikakatkaisun jälkeen.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'Pyydettyä sääntöä ei ole olemassa.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'Pyydetyllä säännöllä ei ole ylätasoa.',
));
