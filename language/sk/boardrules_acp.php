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
	'ACP_BOARDRULES'						=> 'Pravidlá fóra',
	'ACP_BOARDRULES_SETTINGS'				=> 'Nastavenie pravidiel',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'Táto stránka obsahuje hlavné nastavenia pravidiel fóra.',
	'ACP_BOARDRULES_ENABLE'					=> 'Povoliť pravidlá fóra',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'Zobraziť odkaz na pravidlá v hlavičke fóra',
	'ACP_BOARDRULES_FONT_ICON'				=> 'Board rules link icon',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Enter the name of a <strong><a href="%s" target="_blank">Font Awesome</a></strong> icon to use for the board rules link in the header. Leave this field blank for no board rules icon.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'The board rules link icon contained invalid characters.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Vyžadovať schválenie pravidiel pri registrácii na fórum',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Toto nastavenie pridá do podmienok použitia fóra vetu, ktorá novo registrovaných užívateľov zaväzuje prečítať si pravidlá fóra.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Upozorniť užívateľa',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Všetkým registrovaným užívateľom poslať informáciu o zmene v pravidlách. (To môže trvať niekoľko sekúnd v závislosti od počtu registrovaných užívateľov)',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Naozaj chceš poslať oznámenie všetkým užívateľom fóra?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Nastavenia pravidiel fóra boli zmenené.',
	'ACP_BOARDRULES_LIST_STYLE'				=> 'Board rules list style',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Board rules are presented in a list format. Decide if you want rule and category items to be preceded by ordered alpha-numeric ordinals (this is the default behavior), bullets or nothing.',
	'ACP_BOARDRULES_LIST_STYLE_OPTIONS_EXPLAIN' => 'Choose how rule and category items are prefixed. Ordered cycles through numbers, letters and Roman numerals. Unordered cycles through disc, circle and square bullets. Compound displays the complete numeric path.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Ordered alpha-numeric',
	'ACP_BOARDRULES_LIST_STYLE_UNORDERED'		=> 'Bullet',
	'ACP_BOARDRULES_LIST_STYLE_COMPOUND' => 'Compound numbering (1, 1.1, 1.1.1)',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'None',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Spravovať pravidlá',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'Na tejto stránke môžeš pridávať, upravovať, mazať a reorganizovať kategórie a pravidlá. Kategória je skupina spoločných/súvisiacich pravidel. Každá kategória môže mať neobmedzený počet pravidiel.',
	'ACP_BOARDRULES_LANGUAGE_EXPLAIN'		=> 'Choose a language for your Board Rules. Users will see the rules you create for their preferred language. If you do not create any rules in their preferred language, then users will see rules created using the board’s default language.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Kategória pravidiel',
	'ACP_BOARDRULES_RULE'					=> 'Pravidlo',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Vyberte jazyk pravidiel',
	'ACP_BOARDRULES_LANGUAGES'				=> 'Jazyky pravidiel fóra',
	'ACP_BOARDRULES_LANGUAGES_EXPLAIN'		=> 'Spravujte všetky nainštalované jazyky na jednom mieste. Skopírujte kompletnú sadu pravidiel do iného jazyka, preložte ju ako koncept a po dokončení ju zverejnite.',
	'ACP_BOARDRULES_RULES'					=> 'Pravidlá',
	'ACP_BOARDRULES_STATUS'					=> 'Stav',
	'ACP_BOARDRULES_STATUS_EMPTY'			=> 'Používa sa predvolený jazyk',
	'ACP_BOARDRULES_STATUS_NO_RULES'		=> 'Žiadne pravidlá',
	'ACP_BOARDRULES_STATUS_DRAFT'			=> 'Koncept',
	'ACP_BOARDRULES_STATUS_PUBLISHED'		=> 'Zverejnené',
	'ACP_BOARDRULES_MANAGE_ACTION'			=> 'Spravovať',
	'ACP_BOARDRULES_COPY_ACTION'			=> 'Kopírovať pravidlá',
	'ACP_BOARDRULES_PUBLISH'				=> 'Zverejniť',
	'ACP_BOARDRULES_SET_DRAFT'				=> 'Nastaviť ako koncept',
	'ACP_BOARDRULES_ALL_LANGUAGES'			=> 'Všetky jazyky',
	'ACP_BOARDRULES_DEFAULT_LANGUAGE'		=> 'Predvolený jazyk',
	'ACP_BOARDRULES_EMPTY_NOTICE'			=> 'V tomto jazyku nie sú žiadne pravidlá. Používatelia teraz vidia pravidlá v predvolenom jazyku fóra.',
	'ACP_BOARDRULES_EMPTY_DEFAULT_NOTICE'	=> 'V predvolenom jazyku fóra nie sú žiadne pravidlá.',
	'ACP_BOARDRULES_DRAFT_NOTICE'			=> 'Tieto pravidlá nie sú pre používateľov viditeľné. Používatelia teraz vidia pravidlá v predvolenom jazyku fóra.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_NOTICE'	=> 'Tieto pravidlá nie sú pre používateľov viditeľné. Zverejnite ich, aby boli predvolené pravidlá fóra dostupné.',
	'ACP_BOARDRULES_COPY_RULESET'			=> 'Kopírovať jazykovú sadu pravidiel',
	'ACP_BOARDRULES_COPY_RULESET_EXPLAIN'	=> 'Skopíruje všetky kategórie a pravidlá do <strong>%s</strong>. Skopírované pravidlá sa pridajú za existujúce pravidlá a celá cieľová sada zostane konceptom, kým ju nezverejníte.',
	'ACP_BOARDRULES_COPY_APPEND'			=> 'Pridať k existujúcim pravidlám',
	'ACP_BOARDRULES_COPY_APPEND_EXPLAIN'	=> 'Cieľ teraz obsahuje %d pravidiel. Zostanú nezmenené a skopírované pravidlá budú pridané za ne. Konfliktné skopírované odkazy dostanú číselnú príponu.',
	'ACP_BOARDRULES_COPY_SETTINGS'			=> 'Nastavenia kopírovania',
	'ACP_BOARDRULES_COPY_SOURCE'			=> 'Kopírovať z',
	'ACP_BOARDRULES_COPY_SOURCE_EXPLAIN'	=> 'Skopíruje sa kompletná hierarchia, poradie, názvy, obsahy, odkazy a nastavenia formátovania.',
	'ACP_BOARDRULES_COPY_TARGET'			=> 'Kopírovať do',
	'ACP_BOARDRULES_RULE_COUNT'				=> '%d pravidiel',
	'ACP_BOARDRULES_COPY_INVALID_LANGUAGE'	=> 'Zdrojový a cieľový jazyk musia byť rôzne nainštalované jazyky.',
	'ACP_BOARDRULES_COPY_SOURCE_EMPTY'		=> 'Vybraný zdrojový jazyk nemá žiadne pravidlá na kopírovanie.',
	'ACP_BOARDRULES_COPY_SUCCESS'			=> '%1$d pravidiel bolo skopírovaných do %2$s ako koncept.',
	'ACP_BOARDRULES_COPY_ANCHORS_RENAMED'	=> '%d konfliktných odkazov bolo premenovaných pomocou číselných prípon.',
	'ACP_BOARDRULES_INVALID_LANGUAGE'		=> 'Vybraný jazyk nie je nainštalovaný.',
	'ACP_BOARDRULES_STATUS_CHANGE_EMPTY'	=> 'Prázdnu sadu pravidiel nemožno zverejniť ani nastaviť ako koncept.',
	'ACP_BOARDRULES_DEFAULT_CANNOT_DRAFT'	=> 'Predvolený jazyk fóra nemožno nastaviť ako koncept.',
	'ACP_BOARDRULES_PUBLISH_CONFIRM'		=> 'Zverejniť túto kompletnú jazykovú sadu pravidiel? Používatelia tohto jazyka ju uvidia okamžite.',
	'ACP_BOARDRULES_DRAFT_CONFIRM'			=> 'Nastaviť túto kompletnú jazykovú sadu pravidiel ako koncept? Používatelia tohto jazyka namiesto nej uvidia pravidlá v predvolenom jazyku fóra.',
	'ACP_BOARDRULES_PUBLISH_SUCCESS'		=> 'Jazyková sada pravidiel bola zverejnená.',
	'ACP_BOARDRULES_DRAFT_SUCCESS'			=> 'Jazyková sada pravidiel bola nastavená ako koncept.',

	'ACP_BOARDRULES_CREATE_RULE'			=> 'Vytvoriť pravidlo',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'Pomocou tohoto formulára môžeš vytvoriť nové pravidlo, ktoré sa zobrazí užívateľom.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'Upraviť pravidlo',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'Pomocou tohoto formulára môžeš upraviť pravidlo, ktoré sa zobrazí užívateľom.',
	'ACP_RULE_SETTINGS'						=> 'Nastavenie pravidiel',
	'ACP_RULE_PARENT'						=> 'Nadradené pravidlo',
	'ACP_RULE_NO_PARENT'					=> 'Žiadne',
	'ACP_RULE_TITLE'						=> 'Názov pravidla',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'Názvy pravidiel sú zobrazené iba pri kategóriach. U pravidiel slúži iba pre lepšiu orientáciu pri ich spravovaní.',
	'ACP_RULE_ANCHOR'						=> 'Odkaz na pravidlo',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'Odkaz na fórum je voliteľný a umožňuje priamy odkaz na určitú časť pravidiel. Tento identifikátor by nemal obsahovať žiadeé medzery a špeciálne znaky, mal by začínať písmenom a musí byť jedinečný.',
	'ACP_RULE_MESSAGE'						=> 'Obsah pravidla',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'Obsah pravidla je zobrazený pri každom z pravidiel (toto pole je pri kategóriách ignorované).',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'Toto je kategória pravidiel, preto nie je možné pravidlo upravovať.',
	'ACP_ADD_RULE'							=> 'Vytvoriť nové pravidlo',
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => 'Naozaj chcete odstrániť toto pravidlo?',
		1 => 'Naozaj chcete odstrániť toto pravidlo?<br />Varovanie: Odstránením kategórie odstraníte tiež všetky pravidlá v nej.',
	),
	'ACP_RULE_ADDED'						=> 'Pravidlo bolo úspešne pridané.',
	'ACP_RULE_DELETED'						=> 'Pravidlo bolo úspešne odstránené.',
	'ACP_RULE_EDITED'						=> 'Pravidlo bolo úspešne upravené.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Musíš zadať názov pravidla.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Board rules failed to acquire the table lock. Another process may be holding the lock. Locks are forcibly released after a timeout of 1 hour.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'The requested rule does not exist.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'The requested rule has no parent.',
));
