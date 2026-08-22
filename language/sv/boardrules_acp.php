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
	'ACP_BOARDRULES_FONT_ICON'				=> 'Länkikon till forumregler',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Ange namnet för <strong><a href="%s" target="_blank">Font Awesome</a></strong>-ikonen som ska användas till länken i sidhuvudet. Lämna fältet tomt om ingen ikon ska användas.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'Länkikonen du angav innehåller ogiltiga tecken.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Tvinga nya användare att acceptera reglerna under registreringen',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Denna inställning lägger till en punkt till “Medlemsvillkoren” som kräver att nya användare läser och accepterar forumreglerna under registreringen.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Meddela användare',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Skickar ett meddelande till alla registrerade användare om att forumreglerna har uppdaterats (detta kan ta längre tid att utföra).',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Är du säker på att du vill skicka ett meddelande till alla användre?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Inställningarna för forumreglerna har ändrats.',
	'ACP_BOARDRULES_LIST_STYLE'				=> 'Board rules list style',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Välj hur regler och kategorier ska markeras. Ordnad växlar mellan siffror, bokstäver och romerska siffror. Oordnad växlar mellan fylld cirkel, cirkel och fyrkant. Sammansatt numrering visar hela den numeriska sökvägen.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Ordered alpha-numeric',
	'ACP_BOARDRULES_LIST_STYLE_UNORDERED'	=> 'Oordnad (fylld cirkel, cirkel, fyrkant)',
	'ACP_BOARDRULES_LIST_STYLE_COMPOUND'	=> 'Sammansatt numrering (1, 1.1, 1.1.1)',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'None',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Hantera reglerna',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'På denna sidan kan du skapa, uppdatera, radera och omorganisera kategorier och regler. En kategori är en grupp av liknande regler. Varja kategori kan innehålla ett obegränsat antal regler.',
	'ACP_BOARDRULES_INTRO'					=> 'Introduktion till regelsidan',
	'ACP_BOARDRULES_INTRO_EXPLAIN'			=> 'Anpassa introduktionen som visas för användare av regelsidan <strong>%s</strong>. Lämna detta fält tomt för att använda standardintroduktionen som visas som platshållartext.',
	'ACP_BOARDRULES_INTRO_SAVE'				=> 'Spara introduktion',
	'ACP_BOARDRULES_INTRO_SAVED'			=> 'Introduktionen till regelsidan har sparats.',
	'ACP_BOARDRULES_LANGUAGE_EXPLAIN'		=> 'Choose a language for your Board Rules. Users will see the rules you create for their preferred language. If you do not create any rules in their preferred language, then users will see rules created using the board’s default language.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Regelkategori',
	'ACP_BOARDRULES_RULE'					=> 'Regel',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Välj språk',
	'ACP_BOARDRULES_LANGUAGES'				=> 'Språk för forumregler',
	'ACP_BOARDRULES_LANGUAGES_EXPLAIN'		=> 'Hantera alla installerade språk på ett ställe. Kopiera en fullständig regeluppsättning till ett annat språk, översätt den som ett utkast och publicera den när den är klar.',
	'ACP_BOARDRULES_RULES'					=> 'Regler',
	'ACP_BOARDRULES_STATUS'					=> 'Status',
	'ACP_BOARDRULES_STATUS_EMPTY'			=> 'Använder standardspråk',
	'ACP_BOARDRULES_STATUS_NO_RULES'		=> 'Inga regler',
	'ACP_BOARDRULES_STATUS_DRAFT'			=> 'Utkast',
	'ACP_BOARDRULES_STATUS_PUBLISHED'		=> 'Publicerad',
	'ACP_BOARDRULES_MANAGE_ACTION'			=> 'Hantera',
	'ACP_BOARDRULES_COPY_ACTION'			=> 'Kopiera regler',
	'ACP_BOARDRULES_PUBLISH'				=> 'Publicera',
	'ACP_BOARDRULES_SET_DRAFT'				=> 'Ange som utkast',
	'ACP_BOARDRULES_ALL_LANGUAGES'			=> 'Alla språk',
	'ACP_BOARDRULES_DEFAULT_LANGUAGE'		=> 'Standardspråk',
	'ACP_BOARDRULES_EMPTY_NOTICE'			=> 'Det finns inga regler på detta språk. Användarna ser för närvarande reglerna på forumets standardspråk.',
	'ACP_BOARDRULES_EMPTY_DEFAULT_NOTICE'	=> 'Det finns inga regler på forumets standardspråk.',
	'ACP_BOARDRULES_DRAFT_NOTICE'			=> 'Dessa regler är inte synliga för användarna. Användarna ser för närvarande reglerna på forumets standardspråk.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_NOTICE'	=> 'Dessa regler är inte synliga för användarna. Publicera dem för att göra forumets standardregler tillgängliga.',
	'ACP_BOARDRULES_COPY_RULESET'			=> 'Kopiera språkets regeluppsättning',
	'ACP_BOARDRULES_COPY_RULESET_EXPLAIN'	=> 'Kopiera alla kategorier och regler till <strong>%s</strong>. Kopierade regler läggs till efter befintliga regler och målspråkets fullständiga regeluppsättning förblir ett utkast tills du publicerar den.',
	'ACP_BOARDRULES_COPY_APPEND'			=> 'Lägg till i befintliga regler',
	'ACP_BOARDRULES_COPY_APPEND_EXPLAIN'	=> 'Målet innehåller för närvarande %d regler. De förblir oförändrade och kopierade regler läggs till efter dem. Kopierade ankare med konflikter får ett numeriskt suffix.',
	'ACP_BOARDRULES_COPY_SETTINGS'			=> 'Kopieringsinställningar',
	'ACP_BOARDRULES_COPY_SOURCE'			=> 'Kopiera från',
	'ACP_BOARDRULES_COPY_SOURCE_EXPLAIN'	=> 'Hela hierarkin, ordningen, titlarna, meddelandena, ankarna och formateringsinställningarna kopieras.',
	'ACP_BOARDRULES_COPY_TARGET'			=> 'Kopiera till',
	'ACP_BOARDRULES_RULE_COUNT'				=> '%d regler',
	'ACP_BOARDRULES_COPY_INVALID_LANGUAGE'	=> 'Käll- och målspråket måste vara olika installerade språk.',
	'ACP_BOARDRULES_COPY_SOURCE_EMPTY'		=> 'Det valda källspråket har inga regler att kopiera.',
	'ACP_BOARDRULES_COPY_SUCCESS'			=> '%1$d regler kopierades till %2$s som ett utkast.',
	'ACP_BOARDRULES_COPY_ANCHORS_RENAMED'	=> '%d ankare med konflikter döptes om med numeriska suffix.',
	'ACP_BOARDRULES_INVALID_LANGUAGE'		=> 'Det valda språket är inte installerat.',
	'ACP_BOARDRULES_STATUS_CHANGE_EMPTY'	=> 'En tom regeluppsättning kan inte publiceras eller anges som utkast.',
	'ACP_BOARDRULES_DEFAULT_CANNOT_DRAFT'	=> 'Forumets standardspråk kan inte anges som utkast.',
	'ACP_BOARDRULES_PUBLISH_CONFIRM'		=> 'Publicera hela denna regeluppsättning? Användare av detta språk ser den omedelbart.',
	'ACP_BOARDRULES_DRAFT_CONFIRM'			=> 'Ändra hela denna regeluppsättning till utkast? Användare av detta språk ser i stället reglerna på forumets standardspråk.',
	'ACP_BOARDRULES_PUBLISH_SUCCESS'		=> 'Språkets regeluppsättning publicerades.',
	'ACP_BOARDRULES_DRAFT_SUCCESS'			=> 'Språkets regeluppsättning ändrades till utkast.',

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
		1 => 'Är du säker på att du vill ta bort denna regelkategori?<br>Varning: raderas en regelkategori så raderas även alla regler i denna kategori.',
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
