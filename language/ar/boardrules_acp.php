<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
* Translated By : Bassel Taha Alhitary - www.alhitary.net
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
	'ACP_BOARDRULES'						=> 'قوانين المنتدى',
	'ACP_BOARDRULES_SETTINGS'				=> 'الإعدادات',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'من هنا تستطيع ضبط الإعدادات الرئيسية لقوانين المنتدى.',
	'ACP_BOARDRULES_ENABLE'					=> 'تفعيل ',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'عرض رابط القوانين في الشريط العلوي ',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'عرض رابط القوانين في صفحة التسجيل ',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'سيتم إضافة سطر في صفحة التسجيل يطلب من الأعضاء المسجلين الجُدد قراءة قوانين المنتدى والموافقة عليها.',
	'ACP_BOARDRULES_NOTIFY'					=> 'إشعار الأعضاء ',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'ارسال إشعار إلى جميع الأعضاء المسجلين بأنه تم تحديث قوانين المنتدى. ( عملية الإرسال قد تستغرق وقت أكثر في المنتديات التي لديها آلاف الأعضاء ).',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'متأكد أنك تريد إرسال الإشعارات إلى جميع الأعضاء ?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'تم تغيير الإعدادات بنجاح.',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'إدارة القوانين',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'من هنا تستطيع إضافة, تعديل, حذف أو إعادة ترتيب الأقسام والقوانين. القسم عبارة عن مجموعة من القوانين التي لها علاقه بهذه القسم. يمكن إضافة عدد غير محدود من القوانين في كل قسم.',
	'ACP_BOARDRULES_CATEGORY'				=> 'القسم',
	'ACP_BOARDRULES_RULE'					=> 'قانون',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'تحديد اللغة ',
	'ACP_BOARDRULES_CREATE_RULE'			=> 'إنشاء قانون ',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'من هنا تستطيع إنشاء قانون جديد , سيتم عرضه لأعضاء منتداك.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'تعديل قانون ',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'من هنا تستطيع التعديل على أي قانون موجود مُسبقاً , سيتم عرضه لأعضاء منتداك.',
	'ACP_RULE_SETTINGS'						=> 'الإعدادات ',
	'ACP_RULE_PARENT'						=> 'القانون الأب ',
	'ACP_RULE_NO_PARENT'					=> 'بدون أصل ',
	'ACP_RULE_TITLE'						=> 'العنوان ',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'عناوين الأقسام هي التي تظهر فقط في صفحة القوانين. أيضاً تُستخدم العناوين للتعريف عن القوانين لديك عند إدارتها بواسطة لوحة التحكم الرئيسية.',
	'ACP_RULE_ANCHOR'						=> 'الربط / الإشارة ',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'هذا الخيار اختياري ويُستخدم كرابط يشير إلى فقرة في صفحة القانون ( ويظهر في شريط العنوان للمتصفح لديك ). يجب أن تكون صديقة للروابط ( المسافات وبعض الرموز غير مسموح بها ) ويجب أن تبدأ بالحروف وأن تكون غير موجودة مُسبقاً.',
	'ACP_RULE_MESSAGE'						=> 'المحتوى ',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'محتوى كل قانون على حده يظهر في صفحة القوانين ( يتم تعطيل هذا الخيار في الأقسام ).',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'هذا القسم يحتوي على قوانين , وبالتالي يتم تعطيل المحتوى ( محرر الكتابة ).',
	'ACP_ADD_RULE'							=> 'إنشاء قانون جديد ',
	'ACP_DELETE_RULE_CONFIRM'				=> 'متأكد أنك تريد حذف هذا القانون ؟<br />تحذير : حذف قسم يعني حذف جميع القوانين الموجودة فيه أيضاً.',
	'ACP_RULE_ADDED'						=> 'تم إضافة القانون بنجاح.',
	'ACP_RULE_DELETED'						=> 'تم حذف القانون بنجاح.',
	'ACP_RULE_EDITED'						=> 'تم تعديل القانون بنجاح.',
	'ACP_RULE_TITLE_EMPTY'					=> 'يجب إضافة عنوان لهذه القانون.',
));
