<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
* Dutch translation by Dutch Translators (https://github.com/dutch-translators)
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
	'ACP_BOARDRULES'						=> 'Forumregels',
	'ACP_BOARDRULES_SETTINGS'				=> 'Regelinstellingen',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'Hier kan je de hoofdinstellingen voor de forumregels instellen.',
	'ACP_BOARDRULES_ENABLE'					=> 'Forumregels inschakelen',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'Geeft de forumregels-link weer in de paginakop',
	'ACP_BOARDRULES_FONT_ICON'				=> 'Forumregels link icoon',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Vul de naam in van een <strong><a href="%s" target="_blank">Font Awesome</a></strong> icoon om in de paginakop bij de link weer te geven. Laat dit vak leeg als je geen icoon wenst.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'Het forumregels icoon bevat ongeldige karakters.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Vereist nieuwe gebruikers om de regels te accepteren bij registratie',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Deze optie zal een clausule toevoegen aan de “Voorwaarden”, die vereist dat nieuw geregistreerde gebruikers de forumregels lezen en accepteren tijdens registratie.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Meld gebruikers',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Verstuurt een melding naar alle geregistreerde gebruikers dat de forumregels zijn bijgewerkt. (Dit kan enkele secondes in beslag nemen om te voltooien bij forums met duizenden gebruikers.)',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Weet je zeker dat je meldingen wilt versturen naar alle gebruikers?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Forumregels-instellingen veranderd.',
	'ACP_BOARDRULES_LIST_STYLE'				=> 'Board rules list style',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Board rules are presented in a list format. Decide if you want rule and category items to be preceded by ordered alpha-numeric ordinals (this is the default behavior), bullets or nothing.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Ordered alpha-numeric',
	'ACP_BOARDRULES_LIST_STYLE_BULLET'		=> 'Bullet',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'None',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Beheer regels',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'Op deze pagina kan je regels en categorieën toevoegen, wijzigen, verwijderen en rangschikken. Een categorie is een groep gerelateerde regels. Elke categorie kan een onbeperkt aantal regels bevatten.',
	'ACP_BOARDRULES_LANGUAGE_EXPLAIN'		=> 'Choose a language for your Board Rules. Users will see the rules you create for their preferred language. If you do not create any rules in their preferred language, then users will see rules created using the board’s default language.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Regelcategorie',
	'ACP_BOARDRULES_RULE'					=> 'Regel',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Selecteer taal',
	'ACP_BOARDRULES_CREATE_RULE'			=> 'Regel aanmaken',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'Door het formulier hieronder te gebruiken, kan je een nieuwe regel aanmaken die weergegeven zal worden aan je gebruikers.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'Wijzig regel',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'Door het formulier hieronder te gebruiken, kan je een bestaande regel wijzigen die weergegeven zal worden aan je gebruikers.',
	'ACP_RULE_SETTINGS'						=> 'Regelinstelling',
	'ACP_RULE_PARENT'						=> 'Bovenliggende regel',
	'ACP_RULE_NO_PARENT'					=> 'Geen bovenliggende regel',
	'ACP_RULE_TITLE'						=> 'Regeltitel',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'Regeltitels worden alleen weergegeven op de regelspagina voor de regelcategorie. Regeltitels worden ook gebruikt om je regels te identificeren wanneer je ze beheert in het ACP.',
	'ACP_RULE_ANCHOR'						=> 'Regelanker',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'Regelankers zijn optioneel en worden gebruikt als link ankerpunten op de regelspagina. Ze moeten URL vriendelijk zijn (geen spaties of speciale tekens bevatten), moeten beginnen met een letter en moeten uniek zijn.',
	'ACP_RULE_MESSAGE'						=> 'Regelbericht',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'Het regelbericht wordt weergegeven op de regelspagina voor iedere regel (categorieën geven geen regelbericht weer.)',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'Deze categrie bevat onderregels. Je kan hier geen bericht tevegen.',
	'ACP_ADD_RULE'							=> 'Nieuwe regel aanmaken',
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => 'Weet je zeker dat je deze regel wilt verwijderen?',
		1 => 'Weet je zeker dat je deze regel categorie wilt verwijderen?<br />Let op: Als je deze regel categorie verwijdert, verwijder je ook de onderliggende regels.',
	),
	'ACP_RULE_ADDED'						=> 'Regel succesvol toegevoegd.',
	'ACP_RULE_DELETED'						=> 'Regel succesvol verwijderd.',
	'ACP_RULE_EDITED'						=> 'Regel succesvol gewijzigd.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Je moet een titel invullen voor deze regel.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Module “forumregels“ kon geen table lock verkrijgen. Een ander proces houdt mogelijk de lock tegen. Locks worden geforceerd vrijgegeven na een timeout van 1 uur.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'De opgevraagde regel bestaat niet.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'De opgevraagde regel heeft geen hoofdregel.',
));
