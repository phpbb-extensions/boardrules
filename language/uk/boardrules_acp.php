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
	'ACP_BOARDRULES'						=> 'Правила форуму',
	'ACP_BOARDRULES_SETTINGS'				=> 'Налаштування правил',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'Тут ви можете налаштувати основні функції правил форуму.',
	'ACP_BOARDRULES_ENABLE'					=> 'Увімкнути правила форуму',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'Відображати посилання на правила',
	'ACP_BOARDRULES_FONT_ICON'				=> 'Іконка посилання',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Введіть назву значка з набору <strong><a href="%s" target="_blank">Font Awesome</a></strong> для відображення поруч із посиланням на правила. Залишіть поле порожнім, щоб іконка не відображалася.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'Ім\'я іконки для посилання містить неправильні символи.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Вимагати згоди користувачів із правилами перед реєстрацією',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Увімкнення цієї опції додасть (для користувачів, що реєструються) до Угоди, вимогу ознайомитися і погодитися з правилами форуму.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Сповістити користувачів',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Надіслати всім користувачам Повідомлення про зміну правил. (Це може зайняти кілька секунд на форумах із тисячами учасників)',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Ви впевнені, що хочете оповістити всіх користувачів?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Налаштування правил форуму успішно оновлено.',
	'ACP_BOARDRULES_LIST_STYLE'				=> 'Стиль списку правил форуму',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Виберіть спосіб позначення правил і категорій. Упорядкований список чергує числа, літери та римські цифри. Невпорядкований список чергує зафарбоване коло, коло та квадрат. Складена нумерація показує повний числовий шлях.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Впорядкований буквено-цифровий',
	'ACP_BOARDRULES_LIST_STYLE_UNORDERED'	=> 'Невпорядкований (круг, коло, квадрат)',
	'ACP_BOARDRULES_LIST_STYLE_COMPOUND'	=> 'Складена нумерація (1, 1.1, 1.1.1)',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'Нічого',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Редагування правил',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'За допомогою цієї сторінки ви можете додавати, редагувати, видаляти та змінювати порядок правил та категорій. Категорія - набір пов\'язаних правил. У кожній категорії може бути необмежена кількість правил.',
	'ACP_BOARDRULES_INTRO'					=> 'Вступ на сторінці правил',
	'ACP_BOARDRULES_INTRO_EXPLAIN'			=> 'Налаштуйте вступ, який відображається користувачам сторінки правил <strong>%s</strong>. Залиште це поле порожнім, щоб використати типовий вступ, показаний як заповнювач.',
	'ACP_BOARDRULES_INTRO_SAVE'				=> 'Зберегти вступ',
	'ACP_BOARDRULES_INTRO_SAVED'			=> 'Вступ на сторінці правил збережено.',
	'ACP_BOARDRULES_LANGUAGE_EXPLAIN'		=> 'Виберіть мову для правил форуму. Користувачі побачать створені вами правила для їхньої мови. Якщо ви не створите жодних правил мовою, яку використовують користувачі, то вони побачать правила, створені з використанням мови форуму за замовчуванням.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Категорія правил',
	'ACP_BOARDRULES_RULE'					=> 'Правило',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Оберіть мову',
	'ACP_BOARDRULES_LANGUAGES'				=> 'Мови правил форуму',
	'ACP_BOARDRULES_LANGUAGES_EXPLAIN'		=> 'Керуйте всіма встановленими мовами в одному місці. Скопіюйте повний набір правил іншою мовою, перекладіть його як чернетку та опублікуйте, коли він буде готовий.',
	'ACP_BOARDRULES_RULES'					=> 'Правила',
	'ACP_BOARDRULES_STATUS'					=> 'Статус',
	'ACP_BOARDRULES_STATUS_EMPTY'			=> 'Використовуються правила типовою мовою',
	'ACP_BOARDRULES_STATUS_NO_RULES'		=> 'Немає правил',
	'ACP_BOARDRULES_STATUS_DRAFT'			=> 'Чернетка',
	'ACP_BOARDRULES_STATUS_PUBLISHED'		=> 'Опубліковано',
	'ACP_BOARDRULES_MANAGE_ACTION'			=> 'Керувати',
	'ACP_BOARDRULES_COPY_ACTION'			=> 'Копіювати правила',
	'ACP_BOARDRULES_PUBLISH'				=> 'Опублікувати',
	'ACP_BOARDRULES_SET_DRAFT'				=> 'Зробити чернеткою',
	'ACP_BOARDRULES_ALL_LANGUAGES'			=> 'Усі мови',
	'ACP_BOARDRULES_DEFAULT_LANGUAGE'		=> 'Типова мова',
	'ACP_BOARDRULES_EMPTY_NOTICE'			=> 'Цією мовою немає правил. Зараз користувачі бачать правила типовою мовою форуму.',
	'ACP_BOARDRULES_EMPTY_DEFAULT_NOTICE'	=> 'Типовою мовою форуму немає правил.',
	'ACP_BOARDRULES_DRAFT_NOTICE'			=> 'Ці правила не видимі користувачам. Зараз користувачі бачать правила типовою мовою форуму.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_NOTICE'	=> 'Ці правила не видимі користувачам. Опублікуйте їх, щоб зробити типові правила форуму доступними.',
	'ACP_BOARDRULES_COPY_RULESET'			=> 'Копіювати набір правил мови',
	'ACP_BOARDRULES_COPY_RULESET_EXPLAIN'	=> 'Копіює всі категорії та правила до <strong>%s</strong>. Скопійовані правила додаються після наявних, а повний цільовий набір правил залишається чернеткою до публікації.',
	'ACP_BOARDRULES_COPY_APPEND'			=> 'Додати до наявних правил',
	'ACP_BOARDRULES_COPY_APPEND_EXPLAIN'	=> 'Зараз цільова мова містить %d правил. Вони залишаться без змін, а скопійовані правила буде додано після них. Конфліктні скопійовані якорі отримають числовий суфікс.',
	'ACP_BOARDRULES_COPY_SETTINGS'			=> 'Налаштування копіювання',
	'ACP_BOARDRULES_COPY_SOURCE'			=> 'Копіювати з',
	'ACP_BOARDRULES_COPY_SOURCE_EXPLAIN'	=> 'Буде скопійовано повну ієрархію, порядок, заголовки, повідомлення, якорі та налаштування форматування.',
	'ACP_BOARDRULES_COPY_TARGET'			=> 'Копіювати до',
	'ACP_BOARDRULES_RULE_COUNT'				=> '%d правил',
	'ACP_BOARDRULES_COPY_INVALID_LANGUAGE'	=> 'Мови джерела та призначення мають бути різними встановленими мовами.',
	'ACP_BOARDRULES_COPY_SOURCE_EMPTY'		=> 'Вибрана мова джерела не містить правил для копіювання.',
	'ACP_BOARDRULES_COPY_SUCCESS'			=> '%1$d правил скопійовано до %2$s як чернетку.',
	'ACP_BOARDRULES_COPY_ANCHORS_RENAMED'	=> '%d конфліктних якорів перейменовано з додаванням числових суфіксів.',
	'ACP_BOARDRULES_INVALID_LANGUAGE'		=> 'Вибрану мову не встановлено.',
	'ACP_BOARDRULES_STATUS_CHANGE_EMPTY'	=> 'Порожній набір правил не можна опублікувати або зробити чернеткою.',
	'ACP_BOARDRULES_PUBLISH_CONFIRM'		=> 'Опублікувати цей повний набір правил мови? Користувачі цієї мови побачать його негайно.',
	'ACP_BOARDRULES_DRAFT_CONFIRM'			=> 'Зробити цей повний набір правил мови чернеткою? Користувачі цієї мови натомість побачать правила типовою мовою форуму.',
	'ACP_BOARDRULES_PUBLISH_SUCCESS'		=> 'Набір правил мови опубліковано.',
	'ACP_BOARDRULES_DRAFT_SUCCESS'			=> 'Набір правил мови зроблено чернеткою.',

	'ACP_BOARDRULES_CREATE_RULE'			=> 'Нове правило',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'Використовуючи наведену нижче форму, ви можете додати нове правило, яке сподобається користувачам конференції.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'Редагувати правило',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'Використовуючи наведену нижче форму, ви можете відредагувати вже існуюче правило.',
	'ACP_RULE_SETTINGS'						=> 'Налаштування правил',
	'ACP_RULE_PARENT'						=> 'Правило-батько',
	'ACP_RULE_NO_PARENT'					=> 'Немає батька',
	'ACP_RULE_TITLE'						=> 'Заголовок правила',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'Заголовки відображаються на сторінці правил лише для категорій. Заголовки допомагають ідентифікувати правила в Адміністраторському розділі (ACP).',
	'ACP_RULE_ANCHOR'						=> 'Якір для правила',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'Якорі можуть використовуватися, щоб залишити позначки, дозволяючи посилатися на конкретне правило. Вони повинні бути URL-дружні: не містити прогалин і спец. символи, починатися з літери і бути унікальними.',
	'ACP_RULE_MESSAGE'						=> 'Текст правила',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'Текст відображається під кожним правилом у списку. Під категоріями текст не відображається',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'Ця категория містить правила, тому редактор тексту правил вимкнено',
	'ACP_ADD_RULE'							=> 'Створити нове правило',
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => 'Ви дійсно хочете видалити це правило?',
		1 => 'Ви дійсно хочете видалити це правило?<br />Попередження: видалення розділу правил також призведе до видалення всіх пунктів, що входять до нього.',
	),
	'ACP_RULE_ADDED'						=> 'Правило успішно додано.',
	'ACP_RULE_DELETED'						=> 'Правило успішно видалено.',
	'ACP_RULE_EDITED'						=> 'Правило успішно відредаговано.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Ви повинні ввести заголовок для правила',

	'ACP_BOARDRULES_FALLBACK_UNAVAILABLE'	=> 'Опубліковані правила типовою мовою недоступні.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_CONFIRM'	=> 'Змінити набір правил типової мови на чернетку? Користувачі без іншого опублікованого набору правил не матимуть доступних правил.',
	'ACP_BOARDRULES_DRAFT_NO_FALLBACK_CONFIRM' => 'Змінити цей повний набір мовних правил на чернетку? Опубліковані правила типовою мовою недоступні як запасний варіант.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Розширенню не вдалося заблокувати таблицю. Можливо, блокування використовується іншим процесом. Розблокування відбувається примусово через 1 годину.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'Запитане правило не існує.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'Батьківське правило не існує.',
));
