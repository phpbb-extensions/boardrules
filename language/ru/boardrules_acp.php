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
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Введите имя значка из набора <strong><a href="%s" target="_blank">Font Awesome</a></strong> для отображения рядом со ссылкой на правила. Оставьте поле пустым, чтобы значок не отображался.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'Имя значка ссылки содержит неверные символы.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Требовать согласия пользователей с правилами перед регистрацией',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Включение этой опции добавит (для регистрирующихся пользователей) к Пользовательскому Соглашению требование ознакомиться и согласиться с правилами форума.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Оповестить пользователей',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Отправить всем пользователям Оповещение об изменении правил. (Это может занять несколько секунд на форумах с тысячами участников)',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'ВЫ уверены, что хотете оповестить всех пользователей?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Настройки правил форума успешно обновлены.',
	'ACP_BOARDRULES_LIST_STYLE'				=> 'Board rules list style',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Выберите способ обозначения правил и категорий. Упорядоченный список чередует числа, буквы и римские цифры. Неупорядоченный список чередует закрашенный круг, окружность и квадрат. Составная нумерация показывает полный числовой путь.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Ordered alpha-numeric',
	'ACP_BOARDRULES_LIST_STYLE_UNORDERED'	=> 'Неупорядоченный (круг, окружность, квадрат)',
	'ACP_BOARDRULES_LIST_STYLE_COMPOUND'	=> 'Составная нумерация (1, 1.1, 1.1.1)',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'None',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Редактирование правил',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'С помощью этой страницы вы можете добавлять, редактировать, удалять и менять порядок правил и категорий. Категория — набор связанных правил. В каждой категории может быть неограниченное количество правил.',
	'ACP_BOARDRULES_INTRO'					=> 'Введение на странице правил',
	'ACP_BOARDRULES_INTRO_EXPLAIN'			=> 'Настройте введение, отображаемое пользователям страницы правил <strong>%s</strong>. Оставьте это поле пустым, чтобы использовать введение по умолчанию, показанное в качестве заполнителя.',
	'ACP_BOARDRULES_INTRO_SAVE'				=> 'Сохранить введение',
	'ACP_BOARDRULES_INTRO_SAVED'			=> 'Введение на странице правил сохранено.',
	'ACP_BOARDRULES_LANGUAGE_EXPLAIN'		=> 'Choose a language for your Board Rules. Users will see the rules you create for their preferred language. If you do not create any rules in their preferred language, then users will see rules created using the board’s default language.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Категория правил',
	'ACP_BOARDRULES_RULE'					=> 'Правило',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Выберете язык',
	'ACP_BOARDRULES_LANGUAGES'				=> 'Языки правил форума',
	'ACP_BOARDRULES_LANGUAGES_EXPLAIN'		=> 'Управляйте всеми установленными языками в одном месте. Скопируйте полный набор правил на другой язык, переведите его как черновик и опубликуйте, когда он будет готов.',
	'ACP_BOARDRULES_RULES'					=> 'Правила',
	'ACP_BOARDRULES_STATUS'					=> 'Статус',
	'ACP_BOARDRULES_STATUS_EMPTY'			=> 'Используются правила на языке по умолчанию',
	'ACP_BOARDRULES_STATUS_NO_RULES'		=> 'Нет правил',
	'ACP_BOARDRULES_STATUS_DRAFT'			=> 'Черновик',
	'ACP_BOARDRULES_STATUS_PUBLISHED'		=> 'Опубликовано',
	'ACP_BOARDRULES_MANAGE_ACTION'			=> 'Управление',
	'ACP_BOARDRULES_COPY_ACTION'			=> 'Копировать правила',
	'ACP_BOARDRULES_PUBLISH'				=> 'Опубликовать',
	'ACP_BOARDRULES_SET_DRAFT'				=> 'Сделать черновиком',
	'ACP_BOARDRULES_ALL_LANGUAGES'			=> 'Все языки',
	'ACP_BOARDRULES_DEFAULT_LANGUAGE'		=> 'Язык по умолчанию',
	'ACP_BOARDRULES_EMPTY_NOTICE'			=> 'На этом языке нет правил. Сейчас пользователи видят правила на языке форума по умолчанию.',
	'ACP_BOARDRULES_EMPTY_DEFAULT_NOTICE'	=> 'На языке форума по умолчанию нет правил.',
	'ACP_BOARDRULES_DRAFT_NOTICE'			=> 'Эти правила не видны пользователям. Сейчас пользователи видят правила на языке форума по умолчанию.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_NOTICE'	=> 'Эти правила не видны пользователям. Опубликуйте их, чтобы сделать правила форума по умолчанию доступными.',
	'ACP_BOARDRULES_COPY_RULESET'			=> 'Копирование набора правил языка',
	'ACP_BOARDRULES_COPY_RULESET_EXPLAIN'	=> 'Копирует все категории и правила в <strong>%s</strong>. Скопированные правила добавляются после существующих, а полный целевой набор правил остаётся черновиком до публикации.',
	'ACP_BOARDRULES_COPY_APPEND'			=> 'Добавить к существующим правилам',
	'ACP_BOARDRULES_COPY_APPEND_EXPLAIN'	=> 'Сейчас целевой язык содержит %d правил. Они останутся без изменений, а скопированные правила будут добавлены после них. Конфликтующие скопированные якоря получат числовой суффикс.',
	'ACP_BOARDRULES_COPY_SETTINGS'			=> 'Настройки копирования',
	'ACP_BOARDRULES_COPY_SOURCE'			=> 'Копировать из',
	'ACP_BOARDRULES_COPY_SOURCE_EXPLAIN'	=> 'Будут скопированы полная иерархия, порядок, заголовки, сообщения, якоря и настройки форматирования.',
	'ACP_BOARDRULES_COPY_TARGET'			=> 'Копировать в',
	'ACP_BOARDRULES_RULE_COUNT'				=> '%d правил',
	'ACP_BOARDRULES_COPY_INVALID_LANGUAGE'	=> 'Исходный и целевой языки должны быть разными установленными языками.',
	'ACP_BOARDRULES_COPY_SOURCE_EMPTY'		=> 'В выбранном исходном языке нет правил для копирования.',
	'ACP_BOARDRULES_COPY_SUCCESS'			=> '%1$d правил скопировано в %2$s как черновик.',
	'ACP_BOARDRULES_COPY_ANCHORS_RENAMED'	=> '%d конфликтующих якорей переименовано с добавлением числовых суффиксов.',
	'ACP_BOARDRULES_INVALID_LANGUAGE'		=> 'Выбранный язык не установлен.',
	'ACP_BOARDRULES_STATUS_CHANGE_EMPTY'	=> 'Пустой набор правил нельзя опубликовать или сделать черновиком.',
	'ACP_BOARDRULES_PUBLISH_CONFIRM'		=> 'Опубликовать этот полный набор правил языка? Пользователи этого языка увидят его немедленно.',
	'ACP_BOARDRULES_DRAFT_CONFIRM'			=> 'Сделать этот полный набор правил языка черновиком? Пользователи этого языка вместо него увидят правила на языке форума по умолчанию.',
	'ACP_BOARDRULES_PUBLISH_SUCCESS'		=> 'Набор правил языка опубликован.',
	'ACP_BOARDRULES_DRAFT_SUCCESS'			=> 'Набор правил языка сделан черновиком.',

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

	'ACP_BOARDRULES_FALLBACK_UNAVAILABLE'	=> 'Опубликованные правила на языке по умолчанию недоступны.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_CONFIRM'	=> 'Изменить набор правил языка по умолчанию на черновик? Пользователям, у которых нет другого опубликованного набора правил, правила будут недоступны.',
	'ACP_BOARDRULES_DRAFT_NO_FALLBACK_CONFIRM' => 'Изменить этот полный набор языковых правил на черновик? Опубликованные правила языка по умолчанию недоступны в качестве резервного варианта.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Расширению не удалось заблокировать таблицу. Возможно, блокировка используется другим процессом. Разблокировка происходит принудительно через 1 час.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'Запрашиваемое правило не существует.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'Родительское правило не существует.',
));
