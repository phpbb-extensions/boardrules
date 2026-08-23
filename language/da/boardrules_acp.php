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
	'ACP_BOARDRULES'						=> 'Boardregler',
	'ACP_BOARDRULES_SETTINGS'				=> 'Indstillinger for regler',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'Her kan du konfigurere hovedindstillingerne til boardregler.',
	'ACP_BOARDRULES_ENABLE'					=> 'Aktiver boardregler',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'Vis boardregler-link i headeren',
	'ACP_BOARDRULES_FONT_ICON'				=> 'Ikon til boardregler-link',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Indtast navnet på et <strong><a href="%s" target="_blank">Font Awesome</a></strong>-ikon som skal bruges til boardregler-linket i headeren. Lad feltet være tomt hvis der ikke skal være et boardregler-ikon.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'Ikonet til boardregler-linket indeholder ugyldige tegn.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Kræv at nye brugere skal acceptere reglerne ved tilmelding',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Valgmuligheden tilføjer en klausul til “Betingelser for brug” som kræver at nye brugere som tilmelder sig skal læse og acceptere boardreglerne ved tilmelding.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Informer brugere',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Send en notifikation til alle tilmeldte brugere om at boardreglerne er blevet opdateret. (Det kan tage adskillige sekunder at fuldføre på boards med tusindvis af medlemmer).',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Er du sikker på, at du vil sende notifikationer til alle brugere?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Ændret indstillinger for boardregler.',
	'ACP_BOARDRULES_LIST_STYLE'				=> 'Board rules list style',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Vælg, hvordan regler og kategorier skal markeres. Ordnet skifter mellem tal, bogstaver og romertal. Uordnet skifter mellem udfyldte cirkler, cirkler og firkanter. Sammensat nummerering viser hele den numeriske sti.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Ordered alpha-numeric',
	'ACP_BOARDRULES_LIST_STYLE_UNORDERED'	=> 'Uordnet (udfyldt cirkel, cirkel, firkant)',
	'ACP_BOARDRULES_LIST_STYLE_COMPOUND'	=> 'Sammensat nummerering (1, 1.1, 1.1.1)',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'None',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Håndter regler',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'På denne side kan du tilføje, redigere, slette og ændre på rækkefølgen af kategorier og regler. En kategori er en gruppe af relaterede regler. Hver kategori kan have et ubegrænset antal regler.',
	'ACP_BOARDRULES_INTRO'					=> 'Introduktion til regelsiden',
	'ACP_BOARDRULES_INTRO_EXPLAIN'			=> 'Tilpas introduktionen, der vises til brugere af regelsiden <strong>%s</strong>. Lad dette felt være tomt for at bruge standardintroduktionen, der vises som pladsholdertekst.',
	'ACP_BOARDRULES_INTRO_SAVE'				=> 'Gem introduktion',
	'ACP_BOARDRULES_INTRO_SAVED'			=> 'Introduktionen til regelsiden blev gemt.',
	'ACP_BOARDRULES_LANGUAGE_EXPLAIN'		=> 'Choose a language for your Board Rules. Users will see the rules you create for their preferred language. If you do not create any rules in their preferred language, then users will see rules created using the board’s default language.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Regelkategori',
	'ACP_BOARDRULES_RULE'					=> 'Regel',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Vælg sprog',
	'ACP_BOARDRULES_LANGUAGES'				=> 'Sprog for forumregler',
	'ACP_BOARDRULES_LANGUAGES_EXPLAIN'		=> 'Administrer alle installerede sprog ét sted. Kopiér et komplet regelsæt til et andet sprog, oversæt det som en kladde, og udgiv det, når det er klar.',
	'ACP_BOARDRULES_RULES'					=> 'Regler',
	'ACP_BOARDRULES_STATUS'					=> 'Status',
	'ACP_BOARDRULES_STATUS_EMPTY'			=> 'Bruger regler på standardsproget',
	'ACP_BOARDRULES_STATUS_NO_RULES'		=> 'Ingen regler',
	'ACP_BOARDRULES_STATUS_DRAFT'			=> 'Kladde',
	'ACP_BOARDRULES_STATUS_PUBLISHED'		=> 'Udgivet',
	'ACP_BOARDRULES_MANAGE_ACTION'			=> 'Administrer',
	'ACP_BOARDRULES_COPY_ACTION'			=> 'Kopiér regler',
	'ACP_BOARDRULES_PUBLISH'				=> 'Udgiv',
	'ACP_BOARDRULES_SET_DRAFT'				=> 'Angiv som kladde',
	'ACP_BOARDRULES_ALL_LANGUAGES'			=> 'Alle sprog',
	'ACP_BOARDRULES_DEFAULT_LANGUAGE'		=> 'Standardsprog',
	'ACP_BOARDRULES_EMPTY_NOTICE'			=> 'Der findes ingen regler på dette sprog. Brugerne ser i øjeblikket reglerne på boardets standardsprog.',
	'ACP_BOARDRULES_EMPTY_DEFAULT_NOTICE'	=> 'Der findes ingen regler på boardets standardsprog.',
	'ACP_BOARDRULES_DRAFT_NOTICE'			=> 'Disse regler er ikke synlige for brugerne. Brugerne ser i øjeblikket reglerne på boardets standardsprog.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_NOTICE'	=> 'Disse regler er ikke synlige for brugerne. Udgiv dem for at gøre boardets standardregler tilgængelige.',
	'ACP_BOARDRULES_COPY_RULESET'			=> 'Kopiér sprogets regelsæt',
	'ACP_BOARDRULES_COPY_RULESET_EXPLAIN'	=> 'Kopiér alle kategorier og regler til <strong>%s</strong>. Kopierede regler tilføjes efter eksisterende regler, og hele destinationsregelsættet forbliver en kladde, indtil du udgiver det.',
	'ACP_BOARDRULES_COPY_APPEND'			=> 'Føj til eksisterende regler',
	'ACP_BOARDRULES_COPY_APPEND_EXPLAIN'	=> 'Destinationen indeholder i øjeblikket %d regler. De forbliver uændrede, og kopierede regler tilføjes efter dem. Kopierede ankre med konflikter får et numerisk suffiks.',
	'ACP_BOARDRULES_COPY_SETTINGS'			=> 'Kopiindstillinger',
	'ACP_BOARDRULES_COPY_SOURCE'			=> 'Kopiér fra',
	'ACP_BOARDRULES_COPY_SOURCE_EXPLAIN'	=> 'Hele hierarkiet, rækkefølgen, titlerne, meddelelserne, ankrene og formateringsindstillingerne kopieres.',
	'ACP_BOARDRULES_COPY_TARGET'			=> 'Kopiér til',
	'ACP_BOARDRULES_RULE_COUNT'				=> '%d regler',
	'ACP_BOARDRULES_COPY_INVALID_LANGUAGE'	=> 'Kilde- og destinationssproget skal være forskellige installerede sprog.',
	'ACP_BOARDRULES_COPY_SOURCE_EMPTY'		=> 'Det valgte kildesprog har ingen regler at kopiere.',
	'ACP_BOARDRULES_COPY_SUCCESS'			=> '%1$d regler blev kopieret til %2$s som kladde.',
	'ACP_BOARDRULES_COPY_ANCHORS_RENAMED'	=> '%d ankre med konflikter blev omdøbt med numeriske suffikser.',
	'ACP_BOARDRULES_INVALID_LANGUAGE'		=> 'Det valgte sprog er ikke installeret.',
	'ACP_BOARDRULES_STATUS_CHANGE_EMPTY'	=> 'Et tomt regelsæt kan ikke udgives eller angives som kladde.',
	'ACP_BOARDRULES_PUBLISH_CONFIRM'		=> 'Vil du udgive hele dette regelsæt? Brugere af dette sprog vil se det med det samme.',
	'ACP_BOARDRULES_DRAFT_CONFIRM'			=> 'Vil du ændre hele dette regelsæt til en kladde? Brugere af dette sprog vil i stedet se reglerne på boardets standardsprog.',
	'ACP_BOARDRULES_PUBLISH_SUCCESS'		=> 'Sprogets regelsæt blev udgivet.',
	'ACP_BOARDRULES_DRAFT_SUCCESS'			=> 'Sprogets regelsæt blev ændret til en kladde.',

	'ACP_BOARDRULES_CREATE_RULE'			=> 'Opret regel',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'Med formularen nedenfor kan du oprette en ny regel som vises til dine brugere.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'Rediger regel',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'Med formularen nedenfor kan du opdatere en eksisterende regel som vises til dine brugere.',
	'ACP_RULE_SETTINGS'						=> 'Indstillinger for regel',
	'ACP_RULE_PARENT'						=> 'Reglens forælder',
	'ACP_RULE_NO_PARENT'					=> 'Ingen forælder',
	'ACP_RULE_TITLE'						=> 'Reglens titel',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'Regeltitler vises på regler-siden, kun for kategorier. Regeltitler bruges også til at identificere dine regler når de håndteres i ACP.',
	'ACP_RULE_ANCHOR'						=> 'Reglens anker',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'Regelankre er valgfrie og bruges som linkankre-punkter på regler-siden. De bør være URL-venlige (uden mellemrum og specialtegn), skal begynde med et bogstav, og de skal være unikke.',
	'ACP_RULE_MESSAGE'						=> 'Reglens besked',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'Regelbeskeden vises på regler-siden for hver regel (kategorier viser ikke en regelbesked).',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'Dette er en kategori som indeholder regler, beskededitoren er blevet deaktiveret.',
	'ACP_ADD_RULE'							=> 'Opret ny regel',
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => 'Er du sikker på, at du vil fjerne reglen?',
		1 => 'Er du sikker på, at du vil fjerne regelkategorien?<br>Advarsel: Når en regelkategori fjernes, så fjernes også alle reglerne i den.',
	),
	'ACP_RULE_ADDED'						=> 'Regel tilføjet.',
	'ACP_RULE_DELETED'						=> 'Regel fjernet.',
	'ACP_RULE_EDITED'						=> 'Regel redigeret.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Du skal indtaste en titel til reglen.',

	'ACP_BOARDRULES_FALLBACK_UNAVAILABLE'	=> 'Ingen offentliggjorte standardsprogsregler er tilgængelige.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_CONFIRM'	=> 'Vil du ændre standardsprogets regelsæt til kladde? Brugere uden et andet offentliggjort regelsæt har ingen tilgængelige regler.',
	'ACP_BOARDRULES_DRAFT_NO_FALLBACK_CONFIRM' => 'Vil du ændre dette komplette sprogregelsæt til kladde? Ingen offentliggjorte standardsprogsregler er tilgængelige som en reserve.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Boardregler kunne ikke indhente tabellåsen. En anden proces bruger måske låsen. Låse tvinges til frigivelse efter en timeout på 1 time.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'Den anmodede regel findes ikke.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'Den anmodede regel har ingen forælder.',
));
