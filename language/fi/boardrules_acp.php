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
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Valitse sääntöjen ja luokkien etumerkintätapa. Järjestetty luettelo vuorottelee numeroiden, kirjainten ja roomalaisten numeroiden välillä. Järjestämätön luettelo vuorottelee täytetyn ympyrän, ympyrän ja neliön välillä. Yhdistelmänumerointi näyttää koko numeropolun.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Aakkosnumeerinen',
	'ACP_BOARDRULES_LIST_STYLE_UNORDERED'	=> 'Järjestämätön (täytetty ympyrä, ympyrä, neliö)',
	'ACP_BOARDRULES_LIST_STYLE_COMPOUND'	=> 'Yhdistelmänumerointi (1, 1.1, 1.1.1)',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'Ei mitään',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Muokkaa sääntöjä',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'Tällä sivulla voit lisätä, muokata, poistaa ja järjestää uudelleen kategorioita ja sääntöjä. Kategoria on joukko toisiinsa liittyviä sääntöjä. Jokaisella kategorialla voi olla rajoittamaton määrä sääntöjä.',
	'ACP_BOARDRULES_INTRO'					=> 'Sääntösivun johdanto',
	'ACP_BOARDRULES_INTRO_EXPLAIN'			=> 'Mukauta johdantoa, joka näytetään sääntösivun <strong>%s</strong> käyttäjille. Jätä tämä kenttä tyhjäksi käyttääksesi paikkamerkkinä näkyvää oletusjohdantoa.',
	'ACP_BOARDRULES_INTRO_SAVE'				=> 'Tallenna johdanto',
	'ACP_BOARDRULES_INTRO_SAVED'			=> 'Sääntösivun johdanto tallennettu.',
	'ACP_BOARDRULES_LANGUAGE'				=> 'Kieli',
	'ACP_BOARDRULES_CATEGORY'				=> 'Sääntö kategoria',
	'ACP_BOARDRULES_RULE'					=> 'Sääntö',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Valitse kieli',
	'ACP_BOARDRULES_LANGUAGES'				=> 'Foorumin sääntöjen kielet',
	'ACP_BOARDRULES_LANGUAGES_EXPLAIN'		=> 'Hallitse kaikkia asennettuja kieliä yhdessä paikassa. Kopioi koko sääntökokonaisuus toiselle kielelle, käännä se luonnoksena ja julkaise se, kun se on valmis.',
	'ACP_BOARDRULES_RULES'					=> 'Säännöt',
	'ACP_BOARDRULES_STATUS'					=> 'Tila',
	'ACP_BOARDRULES_STATUS_EMPTY'			=> 'Käytetään oletuskielen sääntöjä',
	'ACP_BOARDRULES_STATUS_NO_RULES'		=> 'Ei sääntöjä',
	'ACP_BOARDRULES_STATUS_DRAFT'			=> 'Luonnos',
	'ACP_BOARDRULES_STATUS_PUBLISHED'		=> 'Julkaistu',
	'ACP_BOARDRULES_MANAGE_ACTION'			=> 'Hallitse',
	'ACP_BOARDRULES_COPY_ACTION'			=> 'Kopioi säännöt',
	'ACP_BOARDRULES_PUBLISH'				=> 'Julkaise',
	'ACP_BOARDRULES_SET_DRAFT'				=> 'Aseta luonnokseksi',
	'ACP_BOARDRULES_ALL_LANGUAGES'			=> 'Kaikki kielet',
	'ACP_BOARDRULES_DEFAULT_LANGUAGE'		=> 'Oletuskieli',
	'ACP_BOARDRULES_EMPTY_NOTICE'			=> 'Tällä kielellä ei ole sääntöjä. Käyttäjät näkevät tällä hetkellä foorumin oletuskielen säännöt.',
	'ACP_BOARDRULES_EMPTY_DEFAULT_NOTICE'	=> 'Foorumin oletuskielellä ei ole sääntöjä.',
	'ACP_BOARDRULES_DRAFT_NOTICE'			=> 'Nämä säännöt eivät näy käyttäjille. Käyttäjät näkevät tällä hetkellä foorumin oletuskielen säännöt.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_NOTICE'	=> 'Nämä säännöt eivät näy käyttäjille. Julkaise ne, jotta foorumin oletussäännöt tulevat saataville.',
	'ACP_BOARDRULES_COPY_RULESET'			=> 'Kopioi kielen sääntökokonaisuus',
	'ACP_BOARDRULES_COPY_RULESET_EXPLAIN'	=> 'Kopioi kaikki kategoriat ja säännöt kielelle <strong>%s</strong>. Kopioidut säännöt lisätään olemassa olevien sääntöjen perään, ja koko kohdekielen sääntökokonaisuus pysyy luonnoksena, kunnes julkaiset sen.',
	'ACP_BOARDRULES_COPY_APPEND'			=> 'Lisää olemassa oleviin sääntöihin',
	'ACP_BOARDRULES_COPY_APPEND_EXPLAIN'	=> array(
		1 => 'Kohteessa on tällä hetkellä %d sääntö. Se pysyy muuttumattomana, ja kopioidut säännöt lisätään sen perään. Ristiriitaisiin kopioituihin ankkureihin lisätään numeerinen jälkiliite.',
		2 => 'Kohteessa on tällä hetkellä %d sääntöä. Ne pysyvät muuttumattomina, ja kopioidut säännöt lisätään niiden perään. Ristiriitaisiin kopioituihin ankkureihin lisätään numeerinen jälkiliite.',
	),
	'ACP_BOARDRULES_COPY_SETTINGS'			=> 'Kopiointiasetukset',
	'ACP_BOARDRULES_COPY_SOURCE'			=> 'Kopioi kielestä',
	'ACP_BOARDRULES_COPY_SOURCE_EXPLAIN'	=> 'Koko hierarkia, järjestys, otsikot, viestit, ankkurit ja muotoiluasetukset kopioidaan.',
	'ACP_BOARDRULES_COPY_TARGET'			=> 'Kopioi kielelle',
	'ACP_BOARDRULES_RULE_COUNT'				=> array(
		1 => '%d sääntö',
		2 => '%d sääntöä',
	),
	'ACP_BOARDRULES_COPY_INVALID_LANGUAGE'	=> 'Lähteen ja kohteen on oltava eri asennettuja kieliä.',
	'ACP_BOARDRULES_COPY_SOURCE_EMPTY'		=> 'Valitulla lähdekielellä ei ole kopioitavia sääntöjä.',
	'ACP_BOARDRULES_COPY_SUCCESS'			=> array(
		1 => '%1$d sääntö kopioitu kielelle %2$s luonnoksena.',
		2 => '%1$d sääntöä kopioitu kielelle %2$s luonnoksena.',
	),
	'ACP_BOARDRULES_COPY_ANCHORS_RENAMED'	=> array(
		1 => '%d ristiriitainen ankkuri nimettiin uudelleen numeerisella jälkiliitteellä.',
		2 => '%d ristiriitaista ankkuria nimettiin uudelleen numeerisilla jälkiliitteillä.',
	),
	'ACP_BOARDRULES_INVALID_LANGUAGE'		=> 'Valittua kieltä ei ole asennettu.',
	'ACP_BOARDRULES_STATUS_CHANGE_EMPTY'	=> 'Tyhjää sääntökokonaisuutta ei voi julkaista tai muuttaa luonnokseksi.',
	'ACP_BOARDRULES_PUBLISH_CONFIRM'		=> 'Julkaistaanko tämän kielen koko sääntökokonaisuus? Tämän kielen käyttäjät näkevät sen heti.',
	'ACP_BOARDRULES_DRAFT_CONFIRM'			=> 'Muutetaanko tämän kielen koko sääntökokonaisuus luonnokseksi? Tämän kielen käyttäjät näkevät sen sijaan foorumin oletuskielen säännöt.',
	'ACP_BOARDRULES_PUBLISH_SUCCESS'		=> 'Kielen sääntökokonaisuus julkaistu.',
	'ACP_BOARDRULES_DRAFT_SUCCESS'			=> 'Kielen sääntökokonaisuus muutettu luonnokseksi.',
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

	'ACP_BOARDRULES_FALLBACK_UNAVAILABLE'	=> 'Julkaistuja oletuskielisiä sääntöjä ei ole saatavilla.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_CONFIRM'	=> 'Muutetaanko oletuskielen sääntöjoukko luonnokseksi? Käyttäjillä, joilla ei ole toista julkaistua sääntöjoukkoa, ei ole sääntöjä saatavilla.',
	'ACP_BOARDRULES_DRAFT_NO_FALLBACK_CONFIRM' => 'Muutetaanko tämä täydellinen kielisääntöjoukko luonnokseksi? Julkaistuja oletuskielisiä sääntöjä ei ole saatavilla varavaihtoehtona.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Säännöt eivät onnistuneet saamaan yhteyttä taulukkoon. Toinen prosessi voi käyttää taulukkoa tällä hetkellä. Taulukon yhteys vapautetaan väkisin 1 tunnin aikakatkaisun jälkeen.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'Pyydettyä sääntöä ei ole olemassa.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'Pyydetyllä säännöllä ei ole ylätasoa.',
));
