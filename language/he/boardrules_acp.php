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
	'ACP_BOARDRULES'						=> 'חוקי הפורום',
	'ACP_BOARDRULES_SETTINGS'				=> 'הגדרות חוקים',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'כאן אתה יכול לשנות את ההגדרות העיקריות של חוקי הפורום.',
	'ACP_BOARDRULES_ENABLE'					=> 'אפשר חוקי פורום',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'הצג קישור לחוקי הפורום בראש העמוד',
	'ACP_BOARDRULES_FONT_ICON'				=> 'Board rules link icon',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Enter the name of a <strong><a href="%s" target="_blank">Font Awesome</a></strong> icon to use for the board rules link in the header. Leave this field blank for no board rules icon.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'The board rules link icon contained invalid characters.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'חייב משתמשים חדשים לאשר את חוקי הפורום בעת ההרשמה',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'אפשרות זו תוסיף סעיף לשלב ההרשמה שיחייב את המשתמש שנרשם לקרוא ולאשר את חוקי הפורום כחלק מההרשמה.',
	'ACP_BOARDRULES_NOTIFY'					=> 'עדכן משתמשים',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'שלח הודעה לכל המשתמשים שחוקי הפורום עודכנו (יכול לארוך מספר שניות בפורום גדול עם אלפי משתמשים).',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'אתה בטוח שאתה רוצה לשלוח הודעה לכל המשתמשים?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'הגדרות חוקי הפורום שונו בהצלחה.',
	'ACP_BOARDRULES_LIST_STYLE'				=> 'Board rules list style',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'בחר כיצד לסמן כללים וקטגוריות. רשימה מסודרת עוברת במחזור בין מספרים, אותיות וספרות רומיות. רשימה לא מסודרת עוברת במחזור בין עיגול מלא, עיגול וריבוע. מספור מורכב מציג את הנתיב המספרי המלא.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Ordered alpha-numeric',
	'ACP_BOARDRULES_LIST_STYLE_UNORDERED'	=> 'לא מסודרת (עיגול מלא, עיגול, ריבוע)',
	'ACP_BOARDRULES_LIST_STYLE_COMPOUND'	=> 'מספור מורכב (1, 1.1, 1.1.1)',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'None',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'נהל חוקים',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'בעמוד זה אתה יכול לשנות חוקים וקטגוריות. קטגוריה היא אוסף של חוקים קשורים. בכל קטגוריה יכול להיות מספר לא מוגבל של חוקים.',
	'ACP_BOARDRULES_LANGUAGE_EXPLAIN'		=> 'Choose a language for your Board Rules. Users will see the rules you create for their preferred language. If you do not create any rules in their preferred language, then users will see rules created using the board’s default language.',
	'ACP_BOARDRULES_CATEGORY'				=> 'קטגורית חוקים',
	'ACP_BOARDRULES_RULE'					=> 'חוק',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'בחר שפה',
	'ACP_BOARDRULES_LANGUAGES'				=> 'שפות חוקי הפורום',
	'ACP_BOARDRULES_LANGUAGES_EXPLAIN'		=> 'נהל את כל השפות המותקנות ממקום אחד. העתק מערכת חוקים מלאה לשפה אחרת, תרגם אותה כטיוטה ולאחר מכן פרסם אותה כשהיא מוכנה.',
	'ACP_BOARDRULES_RULES'					=> 'חוקים',
	'ACP_BOARDRULES_STATUS'					=> 'מצב',
	'ACP_BOARDRULES_STATUS_EMPTY'			=> 'נעשה שימוש בשפת ברירת המחדל',
	'ACP_BOARDRULES_STATUS_NO_RULES'		=> 'אין חוקים',
	'ACP_BOARDRULES_STATUS_DRAFT'			=> 'טיוטה',
	'ACP_BOARDRULES_STATUS_PUBLISHED'		=> 'פורסם',
	'ACP_BOARDRULES_MANAGE_ACTION'			=> 'ניהול',
	'ACP_BOARDRULES_COPY_ACTION'			=> 'העתק חוקים',
	'ACP_BOARDRULES_PUBLISH'				=> 'פרסם',
	'ACP_BOARDRULES_SET_DRAFT'				=> 'הגדר כטיוטה',
	'ACP_BOARDRULES_ALL_LANGUAGES'			=> 'כל השפות',
	'ACP_BOARDRULES_DEFAULT_LANGUAGE'		=> 'שפת ברירת המחדל',
	'ACP_BOARDRULES_EMPTY_NOTICE'			=> 'אין חוקים בשפה זו. המשתמשים רואים כעת את החוקים בשפת ברירת המחדל של הפורום.',
	'ACP_BOARDRULES_EMPTY_DEFAULT_NOTICE'	=> 'אין חוקים בשפת ברירת המחדל של הפורום.',
	'ACP_BOARDRULES_DRAFT_NOTICE'			=> 'חוקים אלה אינם גלויים למשתמשים. המשתמשים רואים כעת את החוקים בשפת ברירת המחדל של הפורום.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_NOTICE'	=> 'חוקים אלה אינם גלויים למשתמשים. פרסם אותם כדי להפוך את חוקי ברירת המחדל של הפורום לזמינים.',
	'ACP_BOARDRULES_COPY_RULESET'			=> 'העתק מערכת חוקים של שפה',
	'ACP_BOARDRULES_COPY_RULESET_EXPLAIN'	=> 'העתק כל קטגוריה וחוק אל <strong>%s</strong>. החוקים המועתקים יתווספו אחרי החוקים הקיימים, ומערכת החוקים המלאה בשפת היעד תישאר טיוטה עד שתפורסם.',
	'ACP_BOARDRULES_COPY_APPEND'			=> 'הוסף לחוקים קיימים',
	'ACP_BOARDRULES_COPY_APPEND_EXPLAIN'	=> 'היעד מכיל כעת %d חוקים. הם יישארו ללא שינוי, והחוקים המועתקים יתווספו אחריהם. לעוגנים מועתקים מתנגשים תתווסף סיומת מספרית.',
	'ACP_BOARDRULES_COPY_SETTINGS'			=> 'הגדרות העתקה',
	'ACP_BOARDRULES_COPY_SOURCE'			=> 'העתק מתוך',
	'ACP_BOARDRULES_COPY_SOURCE_EXPLAIN'	=> 'כל ההיררכיה, הסדר, הכותרות, ההודעות, העוגנים והגדרות העיצוב יועתקו.',
	'ACP_BOARDRULES_COPY_TARGET'			=> 'העתק אל',
	'ACP_BOARDRULES_RULE_COUNT'				=> '%d חוקים',
	'ACP_BOARDRULES_COPY_INVALID_LANGUAGE'	=> 'המקור והיעד חייבים להיות שתי שפות מותקנות שונות.',
	'ACP_BOARDRULES_COPY_SOURCE_EMPTY'		=> 'בשפת המקור שנבחרה אין חוקים להעתקה.',
	'ACP_BOARDRULES_COPY_SUCCESS'			=> '%1$d חוקים הועתקו אל %2$s כטיוטה.',
	'ACP_BOARDRULES_COPY_ANCHORS_RENAMED'	=> '%d עוגנים מתנגשים קיבלו שמות חדשים עם סיומות מספריות.',
	'ACP_BOARDRULES_INVALID_LANGUAGE'		=> 'השפה שנבחרה אינה מותקנת.',
	'ACP_BOARDRULES_STATUS_CHANGE_EMPTY'	=> 'אי אפשר לפרסם מערכת חוקים ריקה או להפוך אותה לטיוטה.',
	'ACP_BOARDRULES_DEFAULT_CANNOT_DRAFT'	=> 'אי אפשר להפוך את שפת ברירת המחדל של הפורום לטיוטה.',
	'ACP_BOARDRULES_PUBLISH_CONFIRM'		=> 'לפרסם את מערכת החוקים המלאה בשפה זו? משתמשי השפה יראו אותה מיד.',
	'ACP_BOARDRULES_DRAFT_CONFIRM'			=> 'להפוך את מערכת החוקים המלאה בשפה זו לטיוטה? משתמשי השפה יראו במקומה את החוקים בשפת ברירת המחדל של הפורום.',
	'ACP_BOARDRULES_PUBLISH_SUCCESS'		=> 'מערכת החוקים של השפה פורסמה.',
	'ACP_BOARDRULES_DRAFT_SUCCESS'			=> 'מערכת החוקים של השפה הפכה לטיוטה.',
	'ACP_BOARDRULES_CREATE_RULE'			=> 'צור חוק',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'על-ידי שימוש בטופס זה אתה כיול ליצור חוק חדש שיוצג למשתמשים בפורום.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'ערוך חוק',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'על-ידי שימוש בטופס זה אתה יכול לעדכן חוק קיים שיוצג למשתמשים בפורום.',
	'ACP_RULE_SETTINGS'						=> 'הגדרות חוקים',
	'ACP_RULE_PARENT'						=> 'חוק אב',
	'ACP_RULE_NO_PARENT'					=> 'אין אב',
	'ACP_RULE_TITLE'						=> 'כותרת החוק',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'כותרת החוק מוצגת בעמוד החוקים רק לקטגוריות חוקים. כותרת החוק גם מזהה את החוקים בעת ניהולם בממשק הניהול.',
	'ACP_RULE_ANCHOR'						=> 'עוגן חוק',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'עוגני חוקים הם אופציונאליים ומשמשים לנקודות קישור בעמוד החוקים. הם צריכים להיות נטולים רווחים ותווים מיוחדים, להתחיל באות ולהיות ייחודיים.',
	'ACP_RULE_MESSAGE'						=> 'הודעת החוק',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'הודעת החוק מופיעה בעמוד החוקים לכל חוק - קטגוריות לא מציגות הודעת חוקים',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'זוהי קטגוריה המכילה חוקים, העורך לא פעיל.',
	'ACP_ADD_RULE'							=> 'צור חוק חדש',
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => 'האם אתה בטוח שברצונך למחוק חוק זה ?',
		1 => 'האם אתה בטוח שברצונך למחוק חוק זה ?<br>אזהרה: מחיקת קטגוריית חוקים תמחק גם את כל החוקים בתוכה.',
	),
	'ACP_RULE_ADDED'						=> 'החוק נוסף בהצלחה.',
	'ACP_RULE_DELETED'						=> 'החוק הוסר בהצלחה.',
	'ACP_RULE_EDITED'						=> 'החוק נערך בהצלחה.',
	'ACP_RULE_TITLE_EMPTY'					=> 'אתה חייב לתת כותרת לחוק.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'התוספת חוקי הפורום לא הצליחו לנעול את הטבלה המבוקשת. כנראה שתהליך אחר נועל את הטבלה. לאחר שעה הנעילה משתחררת.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'הכלל המבוקש לא קיים.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'לכלל המבוקש אין הורה.',
));
