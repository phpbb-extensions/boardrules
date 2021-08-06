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
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Board rules are presented in a list format. Decide if you want rule and category items to be preceded by ordered alpha-numeric ordinals (this is the default behavior), bullets or nothing.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Ordered alpha-numeric',
	'ACP_BOARDRULES_LIST_STYLE_BULLET'		=> 'Bullet',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'None',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Håndter regler',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'På denne side kan du tilføje, redigere, slette og ændre på rækkefølgen af kategorier og regler. En kategori er en gruppe af relaterede regler. Hver kategori kan have et ubegrænset antal regler.',
	'ACP_BOARDRULES_LANGUAGE_EXPLAIN'		=> 'Choose a language for your Board Rules. Users will see the rules you create for their preferred language. If you do not create any rules in their preferred language, then users will see rules created using the board’s default language.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Regelkategori',
	'ACP_BOARDRULES_RULE'					=> 'Regel',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Vælg sprog',
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
		1 => 'Er du sikker på, at du vil fjerne regelkategorien?<br />Advarsel: Når en regelkategori fjernes, så fjernes også alle reglerne i den.',
	),
	'ACP_RULE_ADDED'						=> 'Regel tilføjet.',
	'ACP_RULE_DELETED'						=> 'Regel fjernet.',
	'ACP_RULE_EDITED'						=> 'Regel redigeret.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Du skal indtaste en titel til reglen.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Boardregler kunne ikke indhente tabellåsen. En anden proces bruger måske låsen. Låse tvinges til frigivelse efter en timeout på 1 time.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'Den anmodede regel findes ikke.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'Den anmodede regel har ingen forælder.',
));
