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
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Yeni kullanıcıların Kuralları kayıtta kabul etmesi gerekli olsun',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Bu seçenek “Kullanıcı Sözleşmesine” yeni kayıt olacak kullanıcıların okuyup kabul etmesi gereken bir kurallar alanı ekler.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Kullanıcıları bilgilendir',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Tüm kayıtlı kullanıcılara site kurallarının güncellendiğine dair bir bildirim gönder. (Binlerce üyesi olan sitelerde bu işlemin tamamlanması biraz süre alabilir.)',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Tüm kullanıcılara bilgilendirme mesajı göndermek istediğinize emin misiniz?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Site kuralları ayarları değiştirildi.',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Kuralları yönet',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'Bu sayfadan kategori ve kuralları ekleyebilir, düzenleyebilir, silebilir ve yeniden sıralayabilirsiniz. Kategori ilişkili kurallar grubudur. Her kategoriye sınırsız sayıda kural ekleyebilirsiniz.',
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
	'ACP_DELETE_RULE_CONFIRM'				=> 'Bu kuralı kaldırmak istediğinize emin misiniz?<br />Uyarı: bir kural kategorisi çıkarılması içinde bulunan tüm kuralları kaldırır.',
	'ACP_RULE_ADDED'						=> 'Kural başarıyla eklendi.',
	'ACP_RULE_DELETED'						=> 'Kural başarıyla kaldırıldı.',
	'ACP_RULE_EDITED'						=> 'Kural başarıyla düzenlendi.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Bu kural için bir başlık girmelisiniz.',
));
