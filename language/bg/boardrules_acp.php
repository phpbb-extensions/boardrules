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
	'ACP_BOARDRULES'						=> 'Правила на Форума',
	'ACP_BOARDRULES_SETTINGS'				=> 'Настройки на Правилата',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'Тук може да конфигурирате главните настройки на Правилата на Форума.',
	'ACP_BOARDRULES_ENABLE'					=> 'Включи Правилата на Форума',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'Показвай препратка към Правилата на Форума във хедър-а',
	'ACP_BOARDRULES_FONT_ICON'				=> 'Икона за връзката към правилата',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Въведете името на икона от <strong><a href="%s" target="_blank">Font Awesome</a></strong> за връзката към правилата в заглавната част. Оставете полето празно, за да няма икона.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'Иконата за връзката към правилата съдържа невалидни знаци.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Изисквай новите потреботели да приемат Правилата при регистрация',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Тази опция добавя клауза към „Условията за ползване“, която изисква новите потребители да прочетат и приемат правилата при регистрация.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Уведоми потребителите',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Изпрати уведомление до всички регистрирани потребителе, че Правилата на Форума бяха променени. (Това може да отнеме няколко секунди за форуми с хиляди потребители.)',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Сигурен ли си, че искаш да изпратиш уведомление до всички потребители?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Настройките на Правилата на Форума са променени.',
	'ACP_BOARDRULES_LIST_STYLE'				=> 'Стил на списъка с правила',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Изберете как да се обозначават правилата и категориите. Подреденият списък редува числа, букви и римски цифри. Неподреденият списък редува плътни кръгове, окръжности и квадрати. Съставното номериране показва пълния цифров път.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Ordered alpha-numeric',
	'ACP_BOARDRULES_LIST_STYLE_UNORDERED'	=> 'Неподреден (кръг, окръжност, квадрат)',
	'ACP_BOARDRULES_LIST_STYLE_COMPOUND'	=> 'Съставно номериране (1, 1.1, 1.1.1)',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'Без',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Управлявай Правилата',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'На тази страница може да добавяте, променята, изтривате и ре-организирате категориите и правилата. Категорията е група от свързани правила. Всяка категория може да има неограничен брой правила.',
	'ACP_BOARDRULES_INTRO'					=> 'Въведение на страницата с правила',
	'ACP_BOARDRULES_INTRO_EXPLAIN'			=> 'Персонализирайте въведението, показвано на потребителите на страницата с правила <strong>%s</strong>. Оставете това поле празно, за да използвате въведението по подразбиране, показано като подсказка.',
	'ACP_BOARDRULES_INTRO_SAVE'				=> 'Запази въведението',
	'ACP_BOARDRULES_INTRO_SAVED'			=> 'Въведението на страницата с правила е запазено.',
	'ACP_BOARDRULES_LANGUAGE'				=> 'Език',
	'ACP_BOARDRULES_CATEGORY'				=> 'Категория на Правило',
	'ACP_BOARDRULES_RULE'					=> 'Правило',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Избери език',
	'ACP_BOARDRULES_LANGUAGES'				=> 'Езици на правилата на форума',
	'ACP_BOARDRULES_LANGUAGES_EXPLAIN'		=> 'Управлявайте всички инсталирани езици от едно място. Копирайте пълен набор от правила на друг език, преведете го като чернова и го публикувайте, когато е готов.',
	'ACP_BOARDRULES_RULES'					=> 'Правила',
	'ACP_BOARDRULES_STATUS'					=> 'Състояние',
	'ACP_BOARDRULES_STATUS_EMPTY'			=> 'Използват се правилата на езика по подразбиране',
	'ACP_BOARDRULES_STATUS_NO_RULES'		=> 'Няма правила',
	'ACP_BOARDRULES_STATUS_DRAFT'			=> 'Чернова',
	'ACP_BOARDRULES_STATUS_PUBLISHED'		=> 'Публикувано',
	'ACP_BOARDRULES_MANAGE_ACTION'			=> 'Управление',
	'ACP_BOARDRULES_COPY_ACTION'			=> 'Копирай правила',
	'ACP_BOARDRULES_PUBLISH'				=> 'Публикувай',
	'ACP_BOARDRULES_SET_DRAFT'				=> 'Задай като чернова',
	'ACP_BOARDRULES_ALL_LANGUAGES'			=> 'Всички езици',
	'ACP_BOARDRULES_DEFAULT_LANGUAGE'		=> 'Език по подразбиране',
	'ACP_BOARDRULES_EMPTY_NOTICE'			=> 'Няма правила на този език. В момента потребителите виждат правилата на езика по подразбиране на форума.',
	'ACP_BOARDRULES_EMPTY_DEFAULT_NOTICE'	=> 'Няма правила на езика по подразбиране на форума.',
	'ACP_BOARDRULES_DRAFT_NOTICE'			=> 'Тези правила не са видими за потребителите. В момента потребителите виждат правилата на езика по подразбиране на форума.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_NOTICE'	=> 'Тези правила не са видими за потребителите. Публикувайте ги, за да направите правилата по подразбиране на форума достъпни.',
	'ACP_BOARDRULES_COPY_RULESET'			=> 'Копирай набора от правила на езика',
	'ACP_BOARDRULES_COPY_RULESET_EXPLAIN'	=> 'Копира всяка категория и правило в <strong>%s</strong>. Копираните правила се добавят след съществуващите, а пълният целеви набор остава чернова, докато не го публикувате.',
	'ACP_BOARDRULES_COPY_APPEND'			=> 'Добави към съществуващите правила',
	'ACP_BOARDRULES_COPY_APPEND_EXPLAIN'	=> array(
		1 => 'В момента целта съдържа %d правило. То ще остане непроменено, а копираните правила ще бъдат добавени след него. Конфликтните копирани котви ще получат цифров суфикс.',
		2 => 'В момента целта съдържа %d правила. Те ще останат непроменени, а копираните правила ще бъдат добавени след тях. Конфликтните копирани котви ще получат цифров суфикс.',
	),
	'ACP_BOARDRULES_COPY_SETTINGS'			=> 'Настройки за копиране',
	'ACP_BOARDRULES_COPY_SOURCE'			=> 'Копирай от',
	'ACP_BOARDRULES_COPY_SOURCE_EXPLAIN'	=> 'Ще бъдат копирани пълната йерархия, подредбата, заглавията, съобщенията, котвите и настройките за форматиране.',
	'ACP_BOARDRULES_COPY_TARGET'			=> 'Копирай в',
	'ACP_BOARDRULES_RULE_COUNT'				=> array(
		1 => '%d правило',
		2 => '%d правила',
	),
	'ACP_BOARDRULES_COPY_INVALID_LANGUAGE'	=> 'Изходният и целевият език трябва да са различни инсталирани езици.',
	'ACP_BOARDRULES_COPY_SOURCE_EMPTY'		=> 'Избраният изходен език няма правила за копиране.',
	'ACP_BOARDRULES_COPY_SUCCESS'			=> array(
		1 => '%1$d правило е копирано в %2$s като чернова.',
		2 => '%1$d правила са копирани в %2$s като чернова.',
	),
	'ACP_BOARDRULES_COPY_ANCHORS_RENAMED'	=> array(
		1 => '%d конфликтна котва беше преименувана с цифров суфикс.',
		2 => '%d конфликтни котви бяха преименувани с цифрови суфикси.',
	),
	'ACP_BOARDRULES_INVALID_LANGUAGE'		=> 'Избраният език не е инсталиран.',
	'ACP_BOARDRULES_STATUS_CHANGE_EMPTY'	=> 'Празен набор от правила не може да бъде публикуван или зададен като чернова.',
	'ACP_BOARDRULES_PUBLISH_CONFIRM'		=> 'Да се публикува ли този пълен набор от правила? Потребителите на този език ще го видят веднага.',
	'ACP_BOARDRULES_DRAFT_CONFIRM'			=> 'Да се зададе ли този пълен набор от правила като чернова? Потребителите на този език вместо него ще виждат правилата на езика по подразбиране на форума.',
	'ACP_BOARDRULES_PUBLISH_SUCCESS'		=> 'Наборът от правила на езика е публикуван.',
	'ACP_BOARDRULES_DRAFT_SUCCESS'			=> 'Наборът от правила на езика е зададен като чернова.',

	'ACP_BOARDRULES_CREATE_RULE'			=> 'Създай правило',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'Използвайки долната форма може да създадете ново правило, което ще бъде показано на вашите потребители.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'Промени правило',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'Използвайки долната форма може да обновите съществуващо правило, което ще бъде показано на вашите потребители.',
	'ACP_RULE_SETTINGS'						=> 'Настройки за правило',
	'ACP_RULE_PARENT'						=> 'Главно Правило (родител)',
	'ACP_RULE_NO_PARENT'					=> 'няма родител',
	'ACP_RULE_TITLE'						=> 'Заглавие на правило',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'Заглавието на правилото ще бъде показано само на страницата с категории правила. Заглавията на правилата се използват също за да идентифицират вашите правила когато ги променяте (менажирате) през административният панел.',
	'ACP_RULE_ANCHOR'						=> 'Правило "котва"',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'Правилата "котви" са допълнителни и се използват като точка за препратка в страницата на правилата. Те трябва да бъдат "URL friendly" (да не съдържат разстояния или специални символи), трябва да започват с буква и да бъдат уникални (да не се повтарят).',
	'ACP_RULE_MESSAGE'						=> 'Съобщението на Правилото',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'Съобщението на Правилото се показва на страницата на правилата за всяко правило (Категориите не показват съобщение за правилото).',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'Тази категория съдържа правила, които текстовият редактор е забранил.',
	'ACP_ADD_RULE'							=> 'Създай ново правило',
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => 'Сигурни ли сте, че искате да изтриете това правило?',
		1 => 'Сигурни ли сте, че искате да изтриете това правило?<br>Предупреждение: Премахвайки категория правила, ще премахнете и всички правила, които тя съдържа.',
	),
	'ACP_RULE_ADDED'						=> 'Правилото успешно добавено.',
	'ACP_RULE_DELETED'						=> 'Правилото успешно изтрито.',
	'ACP_RULE_EDITED'						=> 'Правилото успешно редактирано.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Трябва да въведете заглавие за това Правило.',

	'ACP_BOARDRULES_FALLBACK_UNAVAILABLE'	=> 'Няма публикувани правила за език по подразбиране.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_CONFIRM'	=> 'Промяна на набора от правила за език по подразбиране на чернова? Потребителите без друг публикуван набор от правила няма да имат налични правила.',
	'ACP_BOARDRULES_DRAFT_NO_FALLBACK_CONFIRM' => 'Да промените този пълен набор от езикови правила на чернова? Няма публикувани правила за език по подразбиране, налични като резервен вариант.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Правилата на борда не успяха да придобият заключването на масата. Друг процес може да държи ключалката. Заключванията се освобождават принудително след изчакване от 1 час.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'Исканото правило не съществува.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'Исканото правило няма родител.',
));
