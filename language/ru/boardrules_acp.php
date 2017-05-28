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
	'ACP_BOARDRULES'						=> 'Правила форума',
	'ACP_BOARDRULES_SETTINGS'				=> 'Настройки правил',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'Здесь вы можете сконфигурировать главные настройки правил форума.',
	'ACP_BOARDRULES_ENABLE'					=> 'Включить правила форума',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'Отображать ссылку на правила',
	'ACP_BOARDRULES_FONT_ICON'				=> 'Значок ссылки',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Введите имя значка из набора <a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a> для отображения рядом со ссылкой на правила. Оставьте поле пустым, чтобы значок не отображался.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'Имя значка ссылки содержит неверные символы.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Требовать согласия пользователей с правилами перед регистрацией',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Включение этой опции добавит (для регистрирующихся пользователей) к Пользовательскому Соглашению требование ознакомиться и согласиться с правилами форума.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Оповестить пользователей',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Отправить всем пользователям Оповещение об изменении правил. (Это может занять несколько секунд на форумах с тысячами участников)',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'ВЫ уверены, что хотете оповестить всех пользователей?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Настройки правил форума успешно обновлены.',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Редактирование правил',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'С помощью этой страницы вы можете добавлять, редактировать, удалять и менять порядок правил и категорий. Категория — набор связанных правил. В каждой категории может быть неограниченное количество правил.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Категория правил',
	'ACP_BOARDRULES_RULE'					=> 'Правило',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Выберете язык',
	'ACP_BOARDRULES_CREATE_RULE'			=> 'Новое правило',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'Используя нижеприведенную форму, вы можете добавить новое правило, которое будет одображаться пользователям конференции.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'Редактировать правило',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'Используя нижеприведенную форму, вы можете отредактировать уже существующее правило.',
	'ACP_RULE_SETTINGS'						=> 'Настройки правил',
	'ACP_RULE_PARENT'						=> 'Правило-родитель',
	'ACP_RULE_NO_PARENT'					=> 'Нет родителя',
	'ACP_RULE_TITLE'						=> 'Заголовок правила',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'Заголовки отображаются на странице правил только для категорий. Заголовки так же помогают идентифицировать правила в Администраторском разделе (ACP).',
	'ACP_RULE_ANCHOR'						=> 'Якорь для правила',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'Якоря могут использоваться, чтобы оставить отметки, позволяя ссылаться на конкретное правило. Они должны быть URL-дружелюбны: не содержать пробелов и спец. символов, начинаться с буквы и быть уникальными.',
	'ACP_RULE_MESSAGE'						=> 'Текст правила',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'Текст отображается под каждым правилом в их списке. Под категориями текст не отображается',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'Эта котегория содержит правила, поэтому редактор текста правил отключен',
	'ACP_ADD_RULE'							=> 'Создать новое правило',
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => 'Вы действительно хотите удалить данное правило?',
		1 => 'Вы действительно хотите удалить данное правило?<br />Предупреждение: удаление раздела правил также приведёт к удалению всех входящих в него пунктов.',
	),
	'ACP_RULE_ADDED'						=> 'Правило успешно добавлено.',
	'ACP_RULE_DELETED'						=> 'Правило успешно удалено.',
	'ACP_RULE_EDITED'						=> 'Правило успешно отредактировано.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Вы должны ввести заголовок для правила',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Расширению не удалось заблокировать таблицу. Возможно, блокировка используется другим процессом. Разблокировка происходит принудительно через 1 час.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'Запрашиваемое правило не существует.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'Родительское правило не существует.',
));
