<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
* Swedish translation by Holger (http://www.maskinisten.net)
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
	'ACP_BOARDRULES_SETTINGS'				=> 'Inställningar för forumregler',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'Här kan du ändra inställningarna för forumregler.',
	'ACP_BOARDRULES_ENABLE'					=> 'Aktivera forumregler',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'Visa en länk till forumreglerna i sidhuvudet',
	'ACP_BOARDRULES_FONT_ICON'				=> 'Board rules link icon',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Enter the name of a <a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a> icon to use for the board rules link in the header. Leave this field blank for no board rules icon.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'The board rules link icon contained invalid characters.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Tvinga nya användare att acceptera reglerna under registreringen',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Denna inställning lägger till en punkt till “Medlemsvillkoren” som kräver att nya användare läser och accepterar forumreglerna under registreringen.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Meddela användare',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Skickar ett meddelande till alla registrerade användare om att forumreglerna har uppdaterats (detta kan ta längre tid att utföra).',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Är du säker på att du vill skicka ett meddelande till alla användre?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Inställningarna för forumreglerna har ändrats.',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Hantera reglerna',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'På denna sidan kan du skapa, uppdatera, radera och omorganisera kategorier och regler. En kategori är en grupp av liknande regler. Varja kategori kan innehålla ett obegränsat antal regler.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Regelkategori',
	'ACP_BOARDRULES_RULE'					=> 'Regel',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Välj språk',
	'ACP_BOARDRULES_CREATE_RULE'			=> 'Skapa regel',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'Använd formuläret nedan för att skapa en ny regel som ska visas för dina användare.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'Uppdatera regel',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'Använd formuläret nedan för att uppdatera en existerande regel som ska visas för dina användare.',
	'ACP_RULE_SETTINGS'						=> 'Regelinställningar',
	'ACP_RULE_PARENT'						=> 'Överordnad regel',
	'ACP_RULE_NO_PARENT'					=> 'Ingen överordnad',
	'ACP_RULE_TITLE'						=> 'Regelrubrik',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'Regelrubriker visas endast på kategoriernas regelsida. Regelrubriker används till att identifiera och hantera reglerna i ACPn.',
	'ACP_RULE_ANCHOR'						=> 'Regelankare',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'Regelankare är valfritt och används som länkankare på regelsidan. De bör vara URL-vänliga (inga mellanslag eller specialtecken), bör börj amed en bokstav och måste vara unika.',
	'ACP_RULE_MESSAGE'						=> 'Regelmeddelande',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'Regelmeddelandet visas på regelsidan för varje regel (kategorier visar ej regelmeddelanden).',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'Denna kategori innehåller regler, meddelandeeditorn har deaktiverats.',
	'ACP_ADD_RULE'							=> 'Skapa en ny regel',
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => 'Är du säker på att du vill ta bort denna regel?',
		1 => 'Är du säker på att du vill ta bort denna regelkategori?<br />Varning: raderas en regelkategori så raderas även alla regler i denna kategori.',
	),
	'ACP_RULE_ADDED'						=> 'Regeln har skapats.',
	'ACP_RULE_DELETED'						=> 'Regeln har raderats.',
	'ACP_RULE_EDITED'						=> 'Regeln har uppdaterats.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Du måste ange en rubrik för denna regel.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Forumreglerna kunde ej låsa tabellen. En annan process verkar låsa tabellen. Lås öppnas efter en timme.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'Regeln existerar ej.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'Regeln har ingen förälder.',
));
