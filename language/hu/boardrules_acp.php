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
	'ACP_BOARDRULES'						=> 'Szabályzat',
	'ACP_BOARDRULES_SETTINGS'				=> 'Szabályzat beállítások',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'Itt beállíthatja a fórum szabályainak fő beállításait.',
	'ACP_BOARDRULES_ENABLE'					=> 'Fórum szabályzat engedélyezése',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'Fórum szabályzat hivatkozás megjelenítése a fejrészben',
	'ACP_BOARDRULES_FONT_ICON'				=> 'Fórum szabályzat hivatkozás ikon',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Adja meg a <strong><a href="%s" target="_blank">Font Awesome</a></strong> ikont, amelyet használni szeretne a fejrészben a Fórum Szabázat hivatkozáshoz. Hagyja üresen ezt a mezőt ha nem szeretne ikont használni.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'A Fórum Szabályzat hivatkozás ikonja érvénytelen karaktereket tartalmaz.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Az új felhasználóknak el kell fogadniuk a regisztrációs szabályzatot.',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Ez az opció hozzáfűzi a "Felhasználási Feltételekre" vonatkozó záradékot, amely előírja az újonnan regisztrált felhasználók számára, hogy elolvassák és elfogadják a regisztrációs szabályokat a regisztráció során.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Felhasználók értesítése',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Értesítést küldünk minden regisztrált felhasználónak, hogy frissítve lett a Fórum Szabályzat. (Ez több másodpercig is eltarthat, ha több ezer tagja van a Fórumnak.)',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Biztos értesítéseket szeretne küldeni minden felhasználónak?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Fórum szabályzat beállítások mentésre kerültek.',
	'ACP_BOARDRULES_LIST_STYLE'				=> 'Board rules list style',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Board rules are presented in a list format. Decide if you want rule and category items to be preceded by ordered alpha-numeric ordinals (this is the default behavior), bullets or nothing.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Ordered alpha-numeric',
	'ACP_BOARDRULES_LIST_STYLE_BULLET'		=> 'Bullet',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'None',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Szabályzat kezelése',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'Ezen az oldalon hozzáadhat, szerkeszthet, törölhet és módosíthat kategóriákat és szabályzatokat. A kategória a kapcsolódó szabályzatok egy csoportja. Minden kategória korlátlan számú szabályzatot tartalmazhat.',
	'ACP_BOARDRULES_LANGUAGE_EXPLAIN'		=> 'Choose a language for your Board Rules. Users will see the rules you create for their preferred language. If you do not create any rules in their preferred language, then users will see rules created using the board’s default language.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Szabályzat kategória',
	'ACP_BOARDRULES_RULE'					=> 'Szabályzat',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Nyelv kiválasztás',
	'ACP_BOARDRULES_CREATE_RULE'			=> 'Szabályzat létrehozás',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'Az alábbi űrlap használatával létrehozhat egy új szabályzatot, amely megjelenik a felhasználók számára.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'Szabályzat szerkesztés',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'Az alábbi űrlap használatával frissíthet egy létező szabályzatot, amely megjelenik a felhasználók számára.',
	'ACP_RULE_SETTINGS'						=> 'Szabályzat beállítások',
	'ACP_RULE_PARENT'						=> 'Szülő szabályzat',
	'ACP_RULE_NO_PARENT'					=> 'Nincs szülő',
	'ACP_RULE_TITLE'						=> 'Szabályzat neve',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'A szabályzat címek csak a szabályzat kategóriák szabályzat lapján jelennek meg. A szabályzat címek a szabályzatok azonosítására is használatosak, amikor azokat az ACP oldalon kezelik.',
	'ACP_RULE_ANCHOR'						=> 'Szabályzat horgony',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'A szabályzat horgonyok tetszőlegesek és a szabályzatok oldalon hivatkozás harmonizációs pontként használatosak. Hivakozásoknak kell lenniük (nem tartalmaznak szóközöket vagy speciális karaktereket) és egyedieknek kell lenniük.',
	'ACP_RULE_MESSAGE'						=> 'Szabályzat szövege',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'A szabályzat megjelenik az egyes szabályzatok szabályzat oldalán (a kategóriák nem tartalmaznak szabályzatot).',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'Ez egy szabályzatokat tartalmazó kategória, az üzenetszerkesztő le van tiltva.',
	'ACP_ADD_RULE'							=> 'Új szabályzat létrehozása',
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => 'Biztos törölni szeretné a szabályzat?',
		1 => 'Biztos szeretné törölni a szabályzat kategőriát?<br />Figyelmeztetés: A szabályzat kategória eltávolítása esetén eltávolítja az abban foglalt szabályzatokat is.',
	),
	'ACP_RULE_ADDED'						=> 'Szabályzat sikeresen hozzáadva.',
	'ACP_RULE_DELETED'						=> 'Szabályzat sikeresen törölve.',
	'ACP_RULE_EDITED'						=> 'Szabályzat sikeresen szerkesztve.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Adja meg a szabályzat nevét.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Nem sikerült megnyitni a Fórum Szabályzatot mivel zárolva van és egy másik folyamat használja. Egy óra mulva újra megpróbálhatja.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'A keresett szabályzat nem létezik.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'A keresett szabálynak nincs szülője.',
));
