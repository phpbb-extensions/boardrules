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
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Tving nye brukere til å akseptere reglene under registreringen',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Denna instillingen legger till et punkt i vilkårene som krever at nye brukere leser og aksepterer forumreglene ila. registreringen.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Send melding til brukerne',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Sendere en melding til alle registrerte brukere om at forumreglene har blitt oppdatert (dette kan ta noe tid).',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Er du sikker på at du vil sende en melding til alle brukere?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Innstillingene for forumreglene har blitt endret.',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Behandle regler',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'På denne siden kan du opprette, oppdatere, slette og omorganisere kategorier og regler. En kategori er en gruppe av lignende regler. Hver kategori kan inneholde et ubegrenset antall regler.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Regelkategori',
	'ACP_BOARDRULES_RULE'					=> 'Regel',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Velg språk',
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

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Board rules failed to acquire the table lock. Another process may be holding the lock. Locks are forcibly released after a timeout of 1 hour.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'The requested rule does not exist.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'The requested rule has no parent.',
));
