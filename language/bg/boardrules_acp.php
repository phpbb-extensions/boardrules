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
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Изисквай новите потреботели да приемат Правилата при регистрация',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'This option will add a clause to the “Terms of Agreement” requiring newly registering users to read and accept the board rules at registration.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Уведоми потребителите',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Изпрати уведомление до всички регистрирани потребителе, че Правилата на Форума бяха променени. (Това може да отнеме няколко секунди за форуми с хиляди потребители.)',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Сигурен ли си, че искаш да изпратиш уведомление до всички потребители?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Настройките на Правилата на Форума са променени.',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Управлявай Правилата',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'На тази страница може да добавяте, променята, изтривате и ре-организирате категориите и правилата. Категорията е група от свързани правила. Всяка категория може да има неограничен брой правила.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Категория на Правило',
	'ACP_BOARDRULES_RULE'					=> 'Правило',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Избери език',
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
		1 => 'Сигурни ли сте, че искате да изтриете това правило?<br />Предупреждение: Премахвайки категория правила, ще премахнете и всички правила, които тя съдържа.',
	),
	'ACP_RULE_ADDED'						=> 'Правилото успешно добавено.',
	'ACP_RULE_DELETED'						=> 'Правилото успешно изтрито.',
	'ACP_RULE_EDITED'						=> 'Правилото успешно редактирано.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Трябва да въведете заглавие за това Правило.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Board rules failed to acquire the table lock. Another process may be holding the lock. Locks are forcibly released after a timeout of 1 hour.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'The requested rule does not exist.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'The requested rule has no parent.',
));
