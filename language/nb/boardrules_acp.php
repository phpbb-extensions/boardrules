<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
* Norwegian translation by Rolv R. Hauge (http://rolvhauge.no)
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
	'ACP_BOARDRULES'						=> 'Forumregler',
	'ACP_BOARDRULES_SETTINGS'				=> 'Innstillinger for forumregler',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'Her kan du endre innstillingene for forumregler.',
	'ACP_BOARDRULES_ENABLE'					=> 'Aktiver forumregler',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'Vis en lenke til forumreglene i toppen av siden',
	'ACP_BOARDRULES_FONT_ICON'				=> 'Ikon for lenke til forumregler',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Skriv inn navnet på et <strong><a href="%s" target="_blank">Font Awesome</a></strong>-ikon for lenken til forumreglene i toppteksten. La feltet stå tomt for ingen ikon.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'Ikonet for lenken til forumreglene inneholdt ugyldige tegn.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Tving nye brukere til å akseptere reglene under registreringen',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Denna instillingen legger till et punkt i vilkårene som krever at nye brukere leser og aksepterer forumreglene ila. registreringen.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Send melding til brukerne',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Sendere en melding til alle registrerte brukere om at forumreglene har blitt oppdatert (dette kan ta noe tid).',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Er du sikker på at du vil sende en melding til alle brukere?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Innstillingene for forumreglene har blitt endret.',
	'ACP_BOARDRULES_LIST_STYLE'				=> 'Listestil for forumregler',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Velg hvordan regler og kategorier skal merkes. Ordnet veksler mellom tall, bokstaver og romertall. Uordnet veksler mellom fylt sirkel, sirkel og firkant. Sammensatt nummerering viser hele den numeriske banen.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Ordered alpha-numeric',
	'ACP_BOARDRULES_LIST_STYLE_UNORDERED'	=> 'Uordnet (fylt sirkel, sirkel, firkant)',
	'ACP_BOARDRULES_LIST_STYLE_COMPOUND'	=> 'Sammensatt nummerering (1, 1.1, 1.1.1)',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'Ingen',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Behandle regler',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'På denne siden kan du opprette, oppdatere, slette og omorganisere kategorier og regler. En kategori er en gruppe av lignende regler. Hver kategori kan inneholde et ubegrenset antall regler.',
	'ACP_BOARDRULES_INTRO'					=> 'Introduksjon til regelsiden',
	'ACP_BOARDRULES_INTRO_EXPLAIN'			=> 'Tilpass introduksjonen som vises til brukere av regelsiden <strong>%s</strong>. La dette feltet stå tomt for å bruke standardintroduksjonen som vises som plassholdertekst.',
	'ACP_BOARDRULES_INTRO_SAVE'				=> 'Lagre introduksjon',
	'ACP_BOARDRULES_INTRO_SAVED'			=> 'Introduksjonen til regelsiden ble lagret.',
	'ACP_BOARDRULES_LANGUAGE_EXPLAIN'		=> 'Velg språk for forumreglene. Brukere ser reglene på foretrukket språk, eller på forumets standardspråk dersom regler på språket deres ikke finnes.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Regelkategori',
	'ACP_BOARDRULES_RULE'					=> 'Regel',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Velg språk',
	'ACP_BOARDRULES_LANGUAGES'				=> 'Språk for forumregler',
	'ACP_BOARDRULES_LANGUAGES_EXPLAIN'		=> 'Administrer alle installerte språk fra ett sted. Kopier et komplett regelsett til et annet språk, oversett det som et utkast, og publiser det når det er klart.',
	'ACP_BOARDRULES_RULES'					=> 'Regler',
	'ACP_BOARDRULES_STATUS'					=> 'Status',
	'ACP_BOARDRULES_STATUS_EMPTY'			=> 'Bruker regler på standardspråket',
	'ACP_BOARDRULES_STATUS_NO_RULES'		=> 'Ingen regler',
	'ACP_BOARDRULES_STATUS_DRAFT'			=> 'Utkast',
	'ACP_BOARDRULES_STATUS_PUBLISHED'		=> 'Publisert',
	'ACP_BOARDRULES_MANAGE_ACTION'			=> 'Administrer',
	'ACP_BOARDRULES_COPY_ACTION'			=> 'Kopier regler',
	'ACP_BOARDRULES_PUBLISH'				=> 'Publiser',
	'ACP_BOARDRULES_SET_DRAFT'				=> 'Angi som utkast',
	'ACP_BOARDRULES_ALL_LANGUAGES'			=> 'Alle språk',
	'ACP_BOARDRULES_DEFAULT_LANGUAGE'		=> 'Standardspråk',
	'ACP_BOARDRULES_EMPTY_NOTICE'			=> 'Det finnes ingen regler på dette språket. Brukerne ser for øyeblikket reglene på forumets standardspråk.',
	'ACP_BOARDRULES_EMPTY_DEFAULT_NOTICE'	=> 'Det finnes ingen regler på forumets standardspråk.',
	'ACP_BOARDRULES_DRAFT_NOTICE'			=> 'Disse reglene er ikke synlige for brukerne. Brukerne ser for øyeblikket reglene på forumets standardspråk.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_NOTICE'	=> 'Disse reglene er ikke synlige for brukerne. Publiser dem for å gjøre forumets standardregler tilgjengelige.',
	'ACP_BOARDRULES_COPY_RULESET'			=> 'Kopier språkets regelsett',
	'ACP_BOARDRULES_COPY_RULESET_EXPLAIN'	=> 'Kopier alle kategorier og regler til <strong>%s</strong>. Kopierte regler legges til etter eksisterende regler, og hele regelsettet for målspråket forblir et utkast til du publiserer det.',
	'ACP_BOARDRULES_COPY_APPEND'			=> 'Legg til i eksisterende regler',
	'ACP_BOARDRULES_COPY_APPEND_EXPLAIN'	=> 'Målet inneholder for øyeblikket %d regler. De forblir uendret, og kopierte regler legges til etter dem. Kopierte ankere med konflikter får et numerisk suffiks.',
	'ACP_BOARDRULES_COPY_SETTINGS'			=> 'Kopieringsinnstillinger',
	'ACP_BOARDRULES_COPY_SOURCE'			=> 'Kopier fra',
	'ACP_BOARDRULES_COPY_SOURCE_EXPLAIN'	=> 'Hele hierarkiet, rekkefølgen, titlene, meldingene, ankerne og formateringsinnstillingene kopieres.',
	'ACP_BOARDRULES_COPY_TARGET'			=> 'Kopier til',
	'ACP_BOARDRULES_RULE_COUNT'				=> '%d regler',
	'ACP_BOARDRULES_COPY_INVALID_LANGUAGE'	=> 'Kilde- og målspråket må være forskjellige installerte språk.',
	'ACP_BOARDRULES_COPY_SOURCE_EMPTY'		=> 'Det valgte kildespråket har ingen regler å kopiere.',
	'ACP_BOARDRULES_COPY_SUCCESS'			=> '%1$d regler ble kopiert til %2$s som et utkast.',
	'ACP_BOARDRULES_COPY_ANCHORS_RENAMED'	=> '%d ankere med konflikter fikk nye navn med numeriske suffikser.',
	'ACP_BOARDRULES_INVALID_LANGUAGE'		=> 'Det valgte språket er ikke installert.',
	'ACP_BOARDRULES_STATUS_CHANGE_EMPTY'	=> 'Et tomt regelsett kan ikke publiseres eller angis som utkast.',
	'ACP_BOARDRULES_PUBLISH_CONFIRM'		=> 'Publisere hele dette regelsettet? Brukere av dette språket vil se det umiddelbart.',
	'ACP_BOARDRULES_DRAFT_CONFIRM'			=> 'Endre hele dette regelsettet til utkast? Brukere av dette språket vil i stedet se reglene på forumets standardspråk.',
	'ACP_BOARDRULES_PUBLISH_SUCCESS'		=> 'Språkets regelsett ble publisert.',
	'ACP_BOARDRULES_DRAFT_SUCCESS'			=> 'Språkets regelsett ble endret til utkast.',

	'ACP_BOARDRULES_CREATE_RULE'			=> 'Opprett regel',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'Bruk skjemaet under for å opprettte en ny regel som skal vises til brukerne.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'Oppdater regel',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'Bruk skjemaet under for å oppdatere en eksistrende regel som skal vises til brukerne.',
	'ACP_RULE_SETTINGS'						=> 'Regelinnstillinger',
	'ACP_RULE_PARENT'						=> 'Overordnet regel',
	'ACP_RULE_NO_PARENT'					=> 'Ingen overordnet',
	'ACP_RULE_TITLE'						=> 'Regeltittel',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'Regeltitler vises kun på kategorienes regelside. Regeltitlene brukes til å identifisere og håndtere reglene i administrasjonskontrollpanelet.',
	'ACP_RULE_ANCHOR'						=> 'Regelanker',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'Regelanker er valgritt og brukes som lenkeanker på regelsiden. De bør være URL-vennlige (uten mellomrom eller spesialtegn), bør begynne med en bokstav og må være unike.',
	'ACP_RULE_MESSAGE'						=> 'Regelmelding',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'Regelmeldingen vises på regelsiden for hver regel. (Kategorier viser ikke regelmeldinger.)',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'Denne kategorien inneholder regler. Meldingsredigering har blitt deaktivert.',
	'ACP_ADD_RULE'							=> 'Opprett en ny regel',
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => 'Er du sikker på at du vil slette denne regelen?',
		1 => 'Er du sikker på at du vil slette denne regelkategori?<br />Advarsel: Hvis en regelkategori blir slettet, slettes også alle reglene i den.',
	),
	'ACP_RULE_ADDED'						=> 'Regelen har blitt opprettet.',
	'ACP_RULE_DELETED'						=> 'Regelen har blitt slettet.',
	'ACP_RULE_EDITED'						=> 'Regelen har blitt oppdatert.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Du må angi en tittel for denne regelen.',

	'ACP_BOARDRULES_FALLBACK_UNAVAILABLE'	=> 'Ingen publiserte regler på standardspråket er tilgjengelige.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_CONFIRM'	=> 'Endre regelsettet for standardspråket til utkast? Brukere uten et annet publisert regelsett har ingen regler tilgjengelig.',
	'ACP_BOARDRULES_DRAFT_NO_FALLBACK_CONFIRM' => 'Endre dette komplette språkregelsettet til utkast? Ingen publiserte regler på standardspråket er tilgjengelige som reserve.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Styrets regler klarte ikke å skaffe bordlåsen. En annen prosess kan være å holde låsen. Låser tvangsutløses etter en timeout på 1 time.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'Den forespurte regelen eksisterer ikke.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'Den forespurte regelen har ingen forelder.',
));
