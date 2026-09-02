<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
* German (Casual Honorifics) translation by Talk19Zehn (www.ongray-design.de), extension version 2.1.3
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
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'Hier kannst du die wichtigsten Einstellungen für die Board-Regeln vornehmen.',
	'ACP_BOARDRULES_ENABLE'					=> 'Board-Regeln aktivieren',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'Link zu den Board-Regeln in der Navigation anzeigen',
	'ACP_BOARDRULES_FONT_ICON'				=> 'Board-Regeln | Font Awesome Symbol',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Gebe hier den Namen eines <a href="%s" target="_blank">Font Awesome</a> Icon ein, um dieses zu verwenden oder verwende das voreingestellte Icon (Font Awesome Symbol).',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'Der angegebene Name für das Font Awesome Symbol ist fehlerhaft.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Zustimmungspflicht für neue Mitglieder',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Ein Abschnitt für die Board-Regeln wird den Nutzungsbedingungen hinzugefügt und erfordert eine aktive Zustimmung beim Registrierungsvorgang im Board.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Mitglieder erinnern',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Allen Registrierten eine Mitteilung über die Änderung der Board-Regeln zusenden. Das Versenden der Mitteilung kann einige Minuten dauern.',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Bist du dir sicher, dass du diese Nachricht senden möchtest?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Einstellungen der Board-Regeln | Einstellungen geändert.',
	'ACP_BOARDRULES_LIST_STYLE'				=> 'Listenformat der Board-Regeln',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Wähle die Kennzeichnung von Regeln und Kategorien. Geordnet wechselt zwischen Zahlen, Buchstaben und römischen Ziffern. Ungeordnet wechselt zwischen ausgefülltem Kreis, Kreis und Quadrat. Die Gliederungsnummerierung zeigt den vollständigen numerischen Pfad.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Alphanumerisch geordnet',
	'ACP_BOARDRULES_LIST_STYLE_UNORDERED'	=> 'Ungeordnet (Punkt, Kreis, Quadrat)',
	'ACP_BOARDRULES_LIST_STYLE_COMPOUND'	=> 'Gliederungsnummerierung (1, 1.1, 1.1.1)',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'Keines',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Regeln verwalten',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'Hier kannst du Kategorien und Regeln hinzufügen, ändern und löschen. Kategorien sind Regelblöcke mit ähnlichen Regeln. Jede Kategorie kann unendlich viele Regeln enthalten.',
	'ACP_BOARDRULES_INTRO'					=> 'Einleitung der Regelseite',
	'ACP_BOARDRULES_INTRO_EXPLAIN'			=> 'Passe die Einleitung an, die Benutzern auf der Regelseite <strong>%s</strong> angezeigt wird. Lasse dieses Feld leer, um die als Platzhalter angezeigte Standardeinleitung zu verwenden.',
	'ACP_BOARDRULES_INTRO_SAVE'				=> 'Einleitung speichern',
	'ACP_BOARDRULES_INTRO_SAVED'			=> 'Einleitung der Regelseite gespeichert.',
	'ACP_BOARDRULES_LANGUAGE'				=> 'Sprache',
	'ACP_BOARDRULES_CATEGORY'				=> 'Regel-Kategorie',
	'ACP_BOARDRULES_RULE'					=> 'Regel',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Sprache auswählen',
	'ACP_BOARDRULES_LANGUAGES'				=> 'Sprachen der Boardregeln',
	'ACP_BOARDRULES_LANGUAGES_EXPLAIN'		=> 'Verwalten Sie alle installierten Sprachen an einem zentralen Ort. Kopieren Sie einen vollständigen Regelsatz in eine andere Sprache, übersetzen Sie ihn als Entwurf und veröffentlichen Sie ihn anschließend.',
	'ACP_BOARDRULES_RULES'					=> 'Regeln',
	'ACP_BOARDRULES_STATUS'					=> 'Status',
	'ACP_BOARDRULES_STATUS_EMPTY'			=> 'Regeln in der Standardsprache werden verwendet',
	'ACP_BOARDRULES_STATUS_NO_RULES'		=> 'Keine Regeln',
	'ACP_BOARDRULES_STATUS_DRAFT'			=> 'Entwurf',
	'ACP_BOARDRULES_STATUS_PUBLISHED'		=> 'Veröffentlicht',
	'ACP_BOARDRULES_MANAGE_ACTION'			=> 'Verwalten',
	'ACP_BOARDRULES_COPY_ACTION'			=> 'Regeln kopieren',
	'ACP_BOARDRULES_PUBLISH'				=> 'Veröffentlichen',
	'ACP_BOARDRULES_SET_DRAFT'				=> 'Als Entwurf festlegen',
	'ACP_BOARDRULES_ALL_LANGUAGES'			=> 'Alle Sprachen',
	'ACP_BOARDRULES_DEFAULT_LANGUAGE'		=> 'Standardsprache',
	'ACP_BOARDRULES_EMPTY_NOTICE'			=> 'In dieser Sprache sind keine Regeln vorhanden. Den Benutzern werden derzeit die Regeln in der Standardsprache des Forums angezeigt.',
	'ACP_BOARDRULES_EMPTY_DEFAULT_NOTICE'	=> 'In der Standardsprache des Forums sind keine Regeln vorhanden.',
	'ACP_BOARDRULES_DRAFT_NOTICE'			=> 'Diese Regeln sind für Benutzer nicht sichtbar. Den Benutzern werden derzeit die Regeln in der Standardsprache des Forums angezeigt.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_NOTICE'	=> 'Diese Regeln sind für Benutzer nicht sichtbar. Veröffentlichen Sie sie, damit die Standardregeln des Forums verfügbar werden.',
	'ACP_BOARDRULES_COPY_RULESET'			=> 'Sprachregelsatz kopieren',
	'ACP_BOARDRULES_COPY_RULESET_EXPLAIN'	=> 'Kopiert alle Kategorien und Regeln nach <strong>%s</strong>. Die kopierten Regeln werden hinter vorhandenen Regeln angefügt. Der vollständige Zielregelsatz bleibt ein Entwurf, bis Sie ihn veröffentlichen.',
	'ACP_BOARDRULES_COPY_APPEND'			=> 'An vorhandene Regeln anfügen',
	'ACP_BOARDRULES_COPY_APPEND_EXPLAIN'	=> array(
		1 => 'Das Ziel enthält derzeit %d Regel. Diese bleibt unverändert und die kopierten Regeln werden dahinter eingefügt. Bei Konflikten erhalten kopierte Anker einen numerischen Suffix.',
		2 => 'Das Ziel enthält derzeit %d Regeln. Diese bleiben unverändert und die kopierten Regeln werden dahinter eingefügt. Bei Konflikten erhalten kopierte Anker einen numerischen Suffix.',
	),
	'ACP_BOARDRULES_COPY_SETTINGS'			=> 'Kopiereinstellungen',
	'ACP_BOARDRULES_COPY_SOURCE'			=> 'Kopieren von',
	'ACP_BOARDRULES_COPY_SOURCE_EXPLAIN'	=> 'Die vollständige Hierarchie, Reihenfolge, Titel, Nachrichten, Anker und Formatierungseinstellungen werden kopiert.',
	'ACP_BOARDRULES_COPY_TARGET'			=> 'Kopieren nach',
	'ACP_BOARDRULES_RULE_COUNT'				=> array(
		1 => '%d Regel',
		2 => '%d Regeln',
	),
	'ACP_BOARDRULES_COPY_INVALID_LANGUAGE'	=> 'Quell- und Zielsprache müssen unterschiedliche installierte Sprachen sein.',
	'ACP_BOARDRULES_COPY_SOURCE_EMPTY'		=> 'Die ausgewählte Quellsprache enthält keine Regeln zum Kopieren.',
	'ACP_BOARDRULES_COPY_SUCCESS'			=> array(
		1 => '%1$d Regel wurde als Entwurf nach %2$s kopiert.',
		2 => '%1$d Regeln wurden als Entwurf nach %2$s kopiert.',
	),
	'ACP_BOARDRULES_COPY_ANCHORS_RENAMED'	=> array(
		1 => '%d Anker mit Konflikt wurde mit einem numerischen Suffix umbenannt.',
		2 => '%d Anker mit Konflikten wurden mit numerischen Suffixen umbenannt.',
	),
	'ACP_BOARDRULES_INVALID_LANGUAGE'		=> 'Die ausgewählte Sprache ist nicht installiert.',
	'ACP_BOARDRULES_STATUS_CHANGE_EMPTY'	=> 'Ein leerer Regelsatz kann weder veröffentlicht noch als Entwurf festgelegt werden.',
	'ACP_BOARDRULES_PUBLISH_CONFIRM'		=> 'Diesen vollständigen Sprachregelsatz veröffentlichen? Benutzer dieser Sprache sehen ihn sofort.',
	'ACP_BOARDRULES_DRAFT_CONFIRM'			=> 'Diesen vollständigen Sprachregelsatz als Entwurf festlegen? Benutzer dieser Sprache sehen stattdessen die Regeln in der Standardsprache des Forums.',
	'ACP_BOARDRULES_PUBLISH_SUCCESS'		=> 'Der Sprachregelsatz wurde veröffentlicht.',
	'ACP_BOARDRULES_DRAFT_SUCCESS'			=> 'Der Sprachregelsatz wurde als Entwurf festgelegt.',

	'ACP_BOARDRULES_CREATE_RULE'			=> 'Regel erstellen',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'Hier kannst du eine neue Regel anlegen, die Mitgliedern angezeigt wird.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'Regel bearbeiten',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'Hier kannst du eine bestehende Regel anpassen bzw. ändern.',
	'ACP_RULE_SETTINGS'						=> 'Regel-Einstellungen',
	'ACP_RULE_PARENT'						=> 'Übergeordnete Regel',
	'ACP_RULE_NO_PARENT'					=> 'Nicht übergeordnet',
	'ACP_RULE_TITLE'						=> 'Regel-Bezeichnung',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'Regelbezeichnungen werden nur bei Kategorien auf der Board-Regel-Seite angezeigt. Regelbezeichnungen dienen auch zum Auffinden und Verwalten innerhalb der Board-Regeln im Administrationsbereich.',
	'ACP_RULE_ANCHOR'						=> 'Regel-Anker',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'Regel-Anker sind optional und werden als Linkziele für Regeln genutzt. Sie müssen einzigartig sein, dürfen keine Sonderzeichen (Leerstellen, HTML-Zeichen und/oder Umlaute) enthalten und dürfen nicht mit einer Ziffer beginnen, da sie in der URL bereits voreingestellt genutzt werden.',
	'ACP_RULE_MESSAGE'						=> 'Regel-Text',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'Der Regel-Text wird für jede Regel angezeigt, die keine Regel-Kategorie ist.',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'Dies ist eine Regel-Kategorie. Der Regel-Text-Editor ist deshalb nicht verfügbar.',
	'ACP_ADD_RULE'							=> 'Neue Regel erstellen',
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => 'Bist du dir sicher, dass du diese Regel entfernen möchtest?',
		1 => 'Bist du dir sicher, dass du diese Regel-Kategorie entfernen möchtest?<br />Warnung: Das Entfernen einer Regel-Kategorie wird auch alle darin enthaltenen Regeln löschen.',
	),
	'ACP_RULE_ADDED'						=> 'Regel hinzugefügt.',
	'ACP_RULE_DELETED'						=> 'Regel gelöscht.',
	'ACP_RULE_EDITED'						=> 'Regel bearbeitet.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Für die Regel muss ein Regel-Name vergeben werden.',

	'ACP_BOARDRULES_FALLBACK_UNAVAILABLE'	=> 'Es sind keine veröffentlichten Regeln in der Standardsprache verfügbar.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_CONFIRM'	=> 'Den Regelsatz der Standardsprache in einen Entwurf ändern? Für Benutzer ohne einen anderen veröffentlichten Regelsatz sind keine Regeln verfügbar.',
	'ACP_BOARDRULES_DRAFT_NO_FALLBACK_CONFIRM' => 'Diesen kompletten Sprachregelsatz in einen Entwurf ändern? Als Rückgriff stehen keine veröffentlichten Regeln in der Standardsprache zur Verfügung.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Die Board-Regeln konnten nicht in die Tabelle geschrieben werden, da ein anderer Prozess dies vermutlich verhindert und angehalten hat. Die Sperren werden nach einer Zeitüberschreitung von 1 Stunde aufgehoben.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'Die angeforderte Regel existiert nicht.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'Die angeforderte Regel hat kein übergeordnetes Element.',
));
