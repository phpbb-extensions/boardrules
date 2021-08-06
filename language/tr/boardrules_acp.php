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
	'ACP_BOARDRULES'						=> 'Site kuralları',
	'ACP_BOARDRULES_SETTINGS'				=> 'Kurallar ayarları',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'Buradan site kurallarının ana ayarlarını düzenleyebilirsiniz.',
	'ACP_BOARDRULES_ENABLE'					=> 'Site kurallarını aktifleştir',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'Site kuralları linkini headerda (üst kısımda) göster',
	'ACP_BOARDRULES_FONT_ICON'				=> 'Site Kuralları link simgesi',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Headerda (üst kısımda) site kuralları linkinde kullanılmak üzere bir <strong><a href="%s" target="_blank">Font Awesome</a></strong> simge ismi girin. Site kural simgesi istemiyorsanız alanı boş bırakın.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'Site kuralları link simgesi geçersiz karakterler içeriyor.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Yeni kullanıcıların Kuralları kayıtta kabul etmesi gerekli olsun',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Bu seçenek “Kullanıcı Sözleşmesine” yeni kayıt olacak kullanıcıların okuyup kabul etmesi gereken bir kurallar alanı ekler.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Kullanıcıları bilgilendir',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Tüm kayıtlı kullanıcılara site kurallarının güncellendiğine dair bir bildirim gönder. (Binlerce üyesi olan sitelerde bu işlemin tamamlanması biraz süre alabilir.)',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Tüm kullanıcılara bilgilendirme mesajı göndermek istediğinize emin misiniz?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Site kuralları ayarları değiştirildi.',
	'ACP_BOARDRULES_LIST_STYLE'				=> 'Board rules list style',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Board rules are presented in a list format. Decide if you want rule and category items to be preceded by ordered alpha-numeric ordinals (this is the default behavior), bullets or nothing.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Ordered alpha-numeric',
	'ACP_BOARDRULES_LIST_STYLE_BULLET'		=> 'Bullet',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'None',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Kuralları yönet',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'Bu sayfadan kategori ve kuralları ekleyebilir, düzenleyebilir, silebilir ve yeniden sıralayabilirsiniz. Kategori ilişkili kurallar grubudur. Her kategoriye sınırsız sayıda kural ekleyebilirsiniz.',
	'ACP_BOARDRULES_LANGUAGE_EXPLAIN'		=> 'Choose a language for your Board Rules. Users will see the rules you create for their preferred language. If you do not create any rules in their preferred language, then users will see rules created using the board’s default language.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Kural kategorisi',
	'ACP_BOARDRULES_RULE'					=> 'Kural',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Dil seç',
	'ACP_BOARDRULES_CREATE_RULE'			=> 'Kural oluştur',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'Aşağıdaki formu kullanarak kullanıcılara göstereceğiniz yeni bir kural oluşturabilirsiniz.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'Kuralı düzenle',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'Aşağıdaki formu kullanarak kullanıcılara göstereceğiniz mevcut bir kuralınızı güncelleyebilirsiniz.',
	'ACP_RULE_SETTINGS'						=> 'Kural ayarları',
	'ACP_RULE_PARENT'						=> 'Kural üst kategorisi',
	'ACP_RULE_NO_PARENT'					=> 'Üst kategori yok',
	'ACP_RULE_TITLE'						=> 'Kural başlığı',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'Kural başlıkları sadece kurallar kategorisindeki kurallar sayfasında gösterilir. Kural başlıkları onları YKPde yönetirken tanımlamaya yardımcı olur.',
	'ACP_RULE_ANCHOR'						=> 'Kural bağlantısı',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'Kural bağlantısı opsiyoneledir ve kurallar sayfasındaki belli bir noktaya link şeklinde kullanılabilir. Bunlar URL dostu olmalı (boşluk veya özel karakterler içeremez), bir harfle başlamalı ve eşsiz olmalılar.',
	'ACP_RULE_MESSAGE'						=> 'Kural mesajı',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'Kural mesajı her kural için kurallar sayfasında gösterilir (kategoriler bir kural mesajı göstermez).',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'Bu kurallar içeren bir kategoridir, mesaj editörü kapalıdır.',
	'ACP_ADD_RULE'							=> 'Yeni kural oluştur',
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => 'Bu kuralı silmek istediğinize emin misiniz?',
		1 => 'Bu kural katgorisini silmek istediğinize emin misiniz?<br />Dikkat: Bir kural kategorisini silerseniz içindeki kayıtlı kuralları da silmiş olursunuz.',
	),
	'ACP_RULE_ADDED'						=> 'Kural başarıyla eklendi.',
	'ACP_RULE_DELETED'						=> 'Kural başarıyla kaldırıldı.',
	'ACP_RULE_EDITED'						=> 'Kural başarıyla düzenlendi.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Bu kural için bir başlık girmelisiniz.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Site kuralları tablo kilidi elde etmek için başarısız oldu. Başka bir işlem kilitleme yapıyor olabilir. Kilitler 1 saatlik bir zaman aşımından sonra zorla serbest bırakılır.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'İstenilen kural mevcut değil.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'İstenilen kuralın üst kategorisi yok.',
));
