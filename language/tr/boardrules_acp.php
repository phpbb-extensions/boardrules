<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
* Turkish translation by ESQARE (https://www.phpbbturkey.com)
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
	'ACP_BOARDRULES'						=> 'Mesaj panosu kuralları',
	'ACP_BOARDRULES_SETTINGS'				=> 'Kurallar ayarları',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'Buradan mesaj panosu kuralları için ana ayarları yapılandırabilirsiniz.',
	'ACP_BOARDRULES_ENABLE'					=> 'Mesaj panosu kurallarını aç',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'Mesaj panosu kuralları bağlantısını sayfa üstlerinde göster',
	'ACP_BOARDRULES_FONT_ICON'				=> 'Mesaj panosu kuralları bağlantı ikonu',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Tüm sayfa üstlerindeki mesaj panosu kuralları bağlantısında kullanılması için bir <a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a> ikonunun adını girin. Eğer mesaj panosu kuralları için bir ikon kullanmak istemiyorsanız bu alanı boş bırakın.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'Mesaj panosu kuralları ikonu geçersiz karakterler içeriyor.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Yeni kullanıcılara kayıt sırasında kuralları kabul etmelerini zorunlu tut',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Bu seçenek, yeni kayıt olan kullanıcıların kayıt sırasında mesaj panosu kurallarını okuyup kabul etmelerini zorunlu tutmak için “Anlaşma Şartları” na bir madde ekleyecektir.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Kullanıcılara bildir',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Tüm kayıtlı kullanıcılara mesaj panosu kurallarının güncellendiğini belirten bir bildirim gönder. (Binlerce üyesi olan mesaj panolarında bu işlemin tamamlanması bir kaç saniye sürebilir.)',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Tüm kullanıcılara bildirim göndermek istediğinize emin misiniz?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Mesaj panosu kuralları ayarları değiştirildi.',
	'ACP_BOARDRULES_LIST_STYLE'				=> 'Mesaj panosu kuralları liste stili',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Kural ve kategori öğelerinin önünde sıralı alfa-nümerik sayılar (bu varsayılandır), madde işaretleri veya herhangi bir şey olup olmadığına karar verin.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Sıralı alfa-nümerik',
	'ACP_BOARDRULES_LIST_STYLE_BULLET'		=> 'Madde işaretleri',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'Hiçbiri',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Kuralları yönet',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'Bu sayfadan kurallar ve kategoriler ekleyebilir, düzenleyebilir, silebilir ve yeniden sıralayabilirsiniz. Kategori, kurallar ile bağlantılı olan bir gruptur. Her kategori sınırsız sayıda mesaja sahip olabilir.',
	'ACP_BOARDRULES_LANGUAGE_EXPLAIN'		=> 'Mesaj Panosu kurallarınız için bir dil seçin. Kullanıcılar, tercih ettikleri dil için oluşturduğunuz kuralları göreceklerdir. Eğer kullanıcıların tercih ettikleri dilde herhangi bir kural oluşturmazsanız, o zaman kullanıcılar mesaj panosunun varsayılan dili kullanılarak oluşturulan kuralları görürler.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Kural kategorisi',
	'ACP_BOARDRULES_RULE'					=> 'Kural',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Dil seçin',
	'ACP_BOARDRULES_CREATE_RULE'			=> 'Kural oluştur',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'Alttaki formu kullanarak kullanıcılarınıza gösterilecek yeni bir kural oluşturabilirsiniz.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'Kuralı düzenle',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'Alttaki formu kullanarak kullanıcılarınıza gösterilen mevcut bir kuralı güncelleyebilirsiniz.',
	'ACP_RULE_SETTINGS'						=> 'Kural ayarları',
	'ACP_RULE_PARENT'						=> 'Kural üst kategorisi',
	'ACP_RULE_NO_PARENT'					=> 'Üst kategori yok',
	'ACP_RULE_TITLE'						=> 'Kural başlığı',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'Kural başlıkları sadece kural kategorileri için kurallar sayfasında gösterilir. Kural başlıkları ayrıca YKPdeki kural yönetiminden kurallarınızı tanımlamak için de kullanılır.',
	'ACP_RULE_ANCHOR'						=> 'Kural bağlantısı',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'Kural bağlantıları isteğe bağlıdır ve kurallar sayfasındaki bağlantı noktalarında kullanılır. Kural bağlantıları URL dostu olmalıdır (boşluk ya da özel karakterler içermemelidir), bir harf ile başlamalı, ve benzersiz olmalıdır.',
	'ACP_RULE_MESSAGE'						=> 'Kural mesajı',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'Kural mesajı, her bir kural için kurallar sayfasında gösterilir (kategoriler bir kural mesajı görüntülemez).',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'Bu kurallar içeren bir kategoridir, mesaj editörü devre dışı bırakıldı.',
	'ACP_ADD_RULE'							=> 'Yeni kural oluştur',
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => 'Bu kuralı kaldırmak istediğinize emin misiniz?',
		1 => 'Bu kuralı kaldırmak istediğinize emin misiniz?<br />Dikkat: Bir kural kategorisi kaldırıldığında içerdiği tüm kurallar da kaldırılır.',
	),
	'ACP_RULE_ADDED'						=> 'Kural başarıyla eklendi.',
	'ACP_RULE_DELETED'						=> 'Kural başarıyla kaldırıldı.',
	'ACP_RULE_EDITED'						=> 'Kural başarıyla düzenlendi.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Bu kural için bir başlık girmelisiniz.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Mesaj panosu kuralları tablo kilidini alamadı. Başka bir işlem kilidi tutuyor olabilir. Kilitler, 1 saatlik zamanaşımı sonrasında serbest bırakılmaya zorlanır.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'İstenilen kural mevcut değil.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'İstenilen kural üst kategoriye sahip değil.',
));
