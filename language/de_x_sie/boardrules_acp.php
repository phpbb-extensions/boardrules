<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
* German (Formal honorifics) translation by Talk19Zehn (www.ongray-design.de), extension version 2.1.3
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
	'ACP_BOARDRULES'						=> 'Board-Regeln',
	'ACP_BOARDRULES_SETTINGS'				=> 'Einstellungen',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'Hier können Sie die wichtigsten Einstellungen für die Board-Regeln in dieser Extension vornehmen.',
	'ACP_BOARDRULES_ENABLE'					=> 'Board-Regeln aktivieren',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'Link zu den Board-Regeln in der Navigation anzeigen',
	'ACP_BOARDRULES_FONT_ICON'				=> 'Board-Regeln | Font Awesome Symbol',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Geben Sie einen Namen eines <a href="%s" target="_blank">Font Awesome</a> Icon ein, um dieses zu verwenden. Das voreingestellte Icon (Font Awesome Symbol) wird geändert.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'Der angegebene Name für das Font Awesome Symbol ist fehlerhaft.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Zustimmungspflicht für neue Mitglieder',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Ein Abschnitt für die Board-Regeln wird den Nutzungsbedingungen hinzugefügt und erfordert eine aktive Zustimmung beim Registrierungsvorgang im Board.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Mitglieder erinnern',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Allen Registrierten eine Mitteilung über die Änderung der Board-Regeln zusenden. Das Versenden der Mitteilung kann einige Minuten dauern.',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Sind Sie sicher, allen Mitgliedern diese Nachricht übersenden zu wollen?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Einstellungen der Board-Regeln | Einstellungen geändert.',
	'ACP_BOARDRULES_LIST_STYLE'				=> 'Listenformat der Board-Regeln',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Die Board-Regeln werden im Listenformat präsentiert. Legen Sie fest, ob vor Regel- und Kategorieelementen geordnete alphanumerische Ordnungszahlen (dies ist das Standardverhalten), Aufzählungszeichen (Bullets) oder keine stehen sollen.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Alphanumerisch geordnet',
	'ACP_BOARDRULES_LIST_STYLE_BULLET'		=> 'Bullet',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'Keines',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Regeln verwalten',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'Hier können Sie Kategorien und Regeln hinzufügen, ändern und löschen. Kategorien sind Regelblöcke mit ähnlichen Regeln. Jede Kategorie kann unendlich viele Regeln enthalten.',
	'ACP_BOARDRULES_LANGUAGE_EXPLAIN'		=> 'Wählen Sie eine Sprache für Ihre Boardregeln. Die Benutzer sehen die Regeln, die Sie für ihre bevorzugte Sprache erstellen. Wenn Sie keine Regeln in der bevorzugten Sprache erstellen, sehen die Benutzer die Regeln, die in der Standardsprache des Forums erstellt wurden.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Regel-Kategorie',
	'ACP_BOARDRULES_RULE'					=> 'Regel',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Sprache auswählen',
	'ACP_BOARDRULES_CREATE_RULE'			=> 'Regel erstellen',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'Hier können Sie eine neue Regel anlegen, die Mitgliedern angezeigt wird.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'Regel bearbeiten',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'Hier können Sie eine bestehende Regel anpassen bzw. ändern.',
	'ACP_RULE_SETTINGS'						=> 'Regel-Einstellungen',
	'ACP_RULE_PARENT'						=> 'Übergeordnete Regel',
	'ACP_RULE_NO_PARENT'					=> 'Nicht übergeordnet',
	'ACP_RULE_TITLE'						=> 'Regel-Bezeichnung',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'Regelbezeichnungen werden nur bei Kategorien auf der Board-Regel-Seite angezeigt. Regelbezeichnungen dienen auch zum Auffinden und Verwalten der Board-Regeln im Administrationsbereich.',
	'ACP_RULE_ANCHOR'						=> 'Regel-Anker',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'Regel-Anker sind optional und werden als Linkziele für Regeln genutzt. Anker dürfen je nur einmal angelegt sein, dürfen keine Sonderzeichen (Leerstellen, HTML-Zeichen und/oder Umlaute) enthalten und dürfen nicht mit einer Ziffer beginnen, da sie in der URL bereits genutzt werden.',
	'ACP_RULE_MESSAGE'						=> 'Regel-Text',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'Der Regel-Text wird für jede Regel angezeigt, die keine Regel-Kategorie ist.',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'Dies ist eine Regel-Kategorie. Der Regel-Text-Editor ist deshalb nicht verfügbar.',
	'ACP_ADD_RULE'							=> 'Neue Regel erstellen',
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => 'Sind Sie sicher, dass Sie diese Regel entfernen möchten?',
		1 => 'Sind Sie sicher, dass diese Regel-Kategorie entfernt werden soll?<br />Warnung: Das Entfernen einer Regel-Kategorie wird auch alle darin enthaltenen Regeln entfernen.',
	),
	'ACP_RULE_ADDED'						=> 'Regel hinzugefügt.',
	'ACP_RULE_DELETED'						=> 'Regel gelöscht.',
	'ACP_RULE_EDITED'						=> 'Regel bearbeitet.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Für die Regel muss ein Regel-Name vergeben werden.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Die Board-Regeln konnten nicht in die Tabelle geschrieben werden, da ein anderer Prozess dies vermutlich verhindert und angehalten hat. Die Sperren werden nach einer Zeitüberschreitung von 1 Stunde aufgehoben.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'Die angeforderte Regel existiert nicht.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'Die angeforderte Regel hat kein übergeordnetes Element.',
));
