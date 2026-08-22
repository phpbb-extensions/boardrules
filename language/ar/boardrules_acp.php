<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
* Translated By : Bassel Taha Alhitary - www.alhitary.net
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
	'ACP_BOARDRULES'						=> 'قوانين المنتدى',
	'ACP_BOARDRULES_SETTINGS'				=> 'الإعدادات',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'من هنا تستطيع ضبط الإعدادات الرئيسية لقوانين المنتدى.',
	'ACP_BOARDRULES_ENABLE'					=> 'تفعيل ',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'عرض رابط القوانين في الشريط العلوي ',
	'ACP_BOARDRULES_FONT_ICON'				=> 'أيقونة رابط قوانين المنتدى',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'أدخل اسم أيقونة <strong><a href="%s" target="_blank">Font Awesome</a></strong> لاستخدامها مع رابط قوانين المنتدى في الترويسة. اترك الحقل فارغًا لعدم عرض أيقونة.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'تحتوي أيقونة رابط قوانين المنتدى على محارف غير صالحة.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'عرض رابط القوانين في صفحة التسجيل ',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'سيتم إضافة سطر في صفحة التسجيل يطلب من الأعضاء المسجلين الجُدد قراءة قوانين المنتدى والموافقة عليها.',
	'ACP_BOARDRULES_NOTIFY'					=> 'إشعار الأعضاء ',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'ارسال إشعار إلى جميع الأعضاء المسجلين بأنه تم تحديث قوانين المنتدى. ( عملية الإرسال قد تستغرق وقت أكثر في المنتديات التي لديها آلاف الأعضاء ).',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'متأكد أنك تريد إرسال الإشعارات إلى جميع الأعضاء ?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'تم تغيير الإعدادات بنجاح.',
	'ACP_BOARDRULES_LIST_STYLE'				=> 'نمط قائمة قوانين المنتدى',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'اختر كيفية ترقيم عناصر القواعد والفئات. تتناوب القائمة المرتبة بين الأرقام والحروف والأرقام الرومانية. وتتناوب القائمة غير المرتبة بين رموز القرص والدائرة والمربع. ويعرض الترقيم المركب المسار الرقمي الكامل.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Ordered alpha-numeric',
	'ACP_BOARDRULES_LIST_STYLE_UNORDERED'	=> 'غير مرتبة (قرص، دائرة، مربع)',
	'ACP_BOARDRULES_LIST_STYLE_COMPOUND'	=> 'ترقيم مركب (1، 1.1، 1.1.1)',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'بلا',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'إدارة القوانين',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'من هنا تستطيع إضافة, تعديل, حذف أو إعادة ترتيب الأقسام والقوانين. القسم عبارة عن مجموعة من القوانين التي لها علاقه بهذه القسم. يمكن إضافة عدد غير محدود من القوانين في كل قسم.',
	'ACP_BOARDRULES_INTRO'					=> 'مقدمة صفحة القوانين',
	'ACP_BOARDRULES_INTRO_EXPLAIN'			=> 'خصص المقدمة التي تظهر للمستخدمين الذين يشاهدون صفحة قوانين <strong>%s</strong>. اترك هذا الحقل فارغًا لاستخدام المقدمة الافتراضية الظاهرة كنص نائب.',
	'ACP_BOARDRULES_INTRO_SAVE'				=> 'حفظ المقدمة',
	'ACP_BOARDRULES_INTRO_SAVED'			=> 'تم حفظ مقدمة صفحة القوانين.',
	'ACP_BOARDRULES_LANGUAGE_EXPLAIN'		=> 'اختر لغة لقوانين المنتدى. سيرى المستخدمون القوانين بلغتهم المفضلة، أو القوانين المكتوبة بلغة المنتدى الافتراضية إذا لم تتوفر قوانين بلغتهم.',
	'ACP_BOARDRULES_CATEGORY'				=> 'القسم',
	'ACP_BOARDRULES_RULE'					=> 'قانون',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'تحديد اللغة ',
	'ACP_BOARDRULES_LANGUAGES'				=> 'لغات قوانين المنتدى',
	'ACP_BOARDRULES_LANGUAGES_EXPLAIN'		=> 'أدر جميع اللغات المثبتة من مكان واحد. انسخ مجموعة قوانين كاملة إلى لغة أخرى، وترجمها كمسودة، ثم انشرها عندما تصبح جاهزة.',
	'ACP_BOARDRULES_RULES'					=> 'القوانين',
	'ACP_BOARDRULES_STATUS'					=> 'الحالة',
	'ACP_BOARDRULES_STATUS_EMPTY'			=> 'استخدام قواعد اللغة الافتراضية',
	'ACP_BOARDRULES_STATUS_NO_RULES'		=> 'لا توجد قوانين',
	'ACP_BOARDRULES_STATUS_DRAFT'			=> 'مسودة',
	'ACP_BOARDRULES_STATUS_PUBLISHED'		=> 'منشور',
	'ACP_BOARDRULES_MANAGE_ACTION'			=> 'إدارة',
	'ACP_BOARDRULES_COPY_ACTION'			=> 'نسخ القوانين',
	'ACP_BOARDRULES_PUBLISH'				=> 'نشر',
	'ACP_BOARDRULES_SET_DRAFT'				=> 'تعيين كمسودة',
	'ACP_BOARDRULES_ALL_LANGUAGES'			=> 'كل اللغات',
	'ACP_BOARDRULES_DEFAULT_LANGUAGE'		=> 'اللغة الافتراضية',
	'ACP_BOARDRULES_EMPTY_NOTICE'			=> 'لا توجد قوانين بهذه اللغة. يرى المستخدمون حالياً القوانين المكتوبة باللغة الافتراضية للمنتدى.',
	'ACP_BOARDRULES_EMPTY_DEFAULT_NOTICE'	=> 'لا توجد قوانين باللغة الافتراضية للمنتدى.',
	'ACP_BOARDRULES_DRAFT_NOTICE'			=> 'هذه القوانين غير مرئية للمستخدمين. يرى المستخدمون حالياً القوانين المكتوبة باللغة الافتراضية للمنتدى.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_NOTICE'	=> 'هذه القوانين غير مرئية للمستخدمين. انشرها لإتاحة قوانين المنتدى الافتراضية.',
	'ACP_BOARDRULES_COPY_RULESET'			=> 'نسخ مجموعة قوانين اللغة',
	'ACP_BOARDRULES_COPY_RULESET_EXPLAIN'	=> 'انسخ كل الفئات والقوانين إلى <strong>%s</strong>. ستُضاف القوانين المنسوخة بعد أي قوانين موجودة، وستظل مجموعة القوانين الكاملة في اللغة الهدف مسودة حتى تنشرها.',
	'ACP_BOARDRULES_COPY_APPEND'			=> 'إضافة إلى القوانين الموجودة',
	'ACP_BOARDRULES_COPY_APPEND_EXPLAIN'	=> 'تحتوي اللغة الهدف حالياً على %d من القوانين. ستبقى دون تغيير، وستُضاف القوانين المنسوخة بعدها. ستُضاف لاحقة رقمية إلى المراسي المنسوخة المتعارضة.',
	'ACP_BOARDRULES_COPY_SETTINGS'			=> 'إعدادات النسخ',
	'ACP_BOARDRULES_COPY_SOURCE'			=> 'نسخ من',
	'ACP_BOARDRULES_COPY_SOURCE_EXPLAIN'	=> 'سيُنسخ التسلسل الهرمي الكامل والترتيب والعناوين والرسائل والمراسي وإعدادات التنسيق.',
	'ACP_BOARDRULES_COPY_TARGET'			=> 'نسخ إلى',
	'ACP_BOARDRULES_RULE_COUNT'				=> '%d من القوانين',
	'ACP_BOARDRULES_COPY_INVALID_LANGUAGE'	=> 'يجب أن يكون المصدر والهدف لغتين مثبتتين مختلفتين.',
	'ACP_BOARDRULES_COPY_SOURCE_EMPTY'		=> 'لا تحتوي لغة المصدر المحددة على قوانين لنسخها.',
	'ACP_BOARDRULES_COPY_SUCCESS'			=> 'نُسخ %1$d من القوانين إلى %2$s كمسودة.',
	'ACP_BOARDRULES_COPY_ANCHORS_RENAMED'	=> 'أُعيدت تسمية %d من المراسي المتعارضة باستخدام لواحق رقمية.',
	'ACP_BOARDRULES_INVALID_LANGUAGE'		=> 'اللغة المحددة غير مثبتة.',
	'ACP_BOARDRULES_STATUS_CHANGE_EMPTY'	=> 'لا يمكن نشر مجموعة قوانين فارغة أو تغييرها إلى مسودة.',
	'ACP_BOARDRULES_PUBLISH_CONFIRM'		=> 'هل تريد نشر مجموعة القوانين الكاملة لهذه اللغة؟ سيراها مستخدمو هذه اللغة فوراً.',
	'ACP_BOARDRULES_DRAFT_CONFIRM'			=> 'هل تريد تغيير مجموعة القوانين الكاملة لهذه اللغة إلى مسودة؟ سيرى مستخدمو هذه اللغة قوانين اللغة الافتراضية للمنتدى بدلاً منها.',
	'ACP_BOARDRULES_PUBLISH_SUCCESS'		=> 'نُشرت مجموعة قوانين اللغة.',
	'ACP_BOARDRULES_DRAFT_SUCCESS'			=> 'تغيرت مجموعة قوانين اللغة إلى مسودة.',
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
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => 'متأكد أنك تريد حذف هذا القانون ؟',
		1 => 'متأكد أنك تريد حذف هذا القانون ؟<br />تحذير : حذف قسم يعني حذف جميع القوانين الموجودة فيه أيضاً.',
	),
	'ACP_RULE_ADDED'						=> 'تم إضافة القانون بنجاح.',
	'ACP_RULE_DELETED'						=> 'تم حذف القانون بنجاح.',
	'ACP_RULE_EDITED'						=> 'تم تعديل القانون بنجاح.',
	'ACP_RULE_TITLE_EMPTY'					=> 'يجب إضافة عنوان لهذه القانون.',

	'ACP_BOARDRULES_FALLBACK_UNAVAILABLE'	=> 'لا تتوفر أية قواعد لغة افتراضية منشورة.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_CONFIRM'	=> 'هل تريد تغيير مجموعة قواعد اللغة الافتراضية إلى مسودة؟ لن يكون لدى المستخدمين الذين ليس لديهم مجموعة قواعد منشورة أخرى أي قواعد متاحة.',
	'ACP_BOARDRULES_DRAFT_NO_FALLBACK_CONFIRM' => 'هل تريد تغيير مجموعة قواعد اللغة الكاملة هذه إلى مسودة؟ لا تتوفر أي قواعد لغة افتراضية منشورة كبديل.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'فشلت قوانين المنتدى في اغلاق الجدول. ربما هناك عملية أخرى تمنع ذلك حالياً. يتم إيقاف عمليات الإغلاق بعد فترة مُحددة : ساعة واحدة.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'القانون الذي طلبته غير موجود.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'القانون المطلوب لا يتفرع من قانون آخر ( بدون أصل ).',
));
