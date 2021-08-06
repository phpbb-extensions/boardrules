<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
* @Italian translation by systemcrack http://morfeuscommunity.biz
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
	'ACP_BOARDRULES'						=> 'Regole Forum',
	'ACP_BOARDRULES_SETTINGS'				=> 'Impostazioni regole',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'Qui è possibile configurare le impostazioni principali per le regole del forum.',
	'ACP_BOARDRULES_ENABLE'					=> 'Abilita regole del forum',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'Visualizza un link alle regole del forum nell´header',
	'ACP_BOARDRULES_FONT_ICON'				=> 'Board rules link icon',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Enter the name of a <strong><a href="%s" target="_blank">Font Awesome</a></strong> icon to use for the board rules link in the header. Leave this field blank for no board rules icon.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'The board rules link icon contained invalid characters.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Richiedere ai nuovi utenti di accettare le regole al momento della registrazione',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Questa opzione aggiunge una clausola per le "Condizioni Generali di Contratto" che richiedono ai nuovi utenti di leggere e accettare le regole del forum al momento della registrazione.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Notifica agli utenti',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Invia una notifica a tutti gli utenti registrati che le regole del forum sono state aggiornate. (Questo potrebbe richiedere alcuni secondi per completare su forum  con molte migliaia di iscritti.)',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Sei sicuro di voler inviare le notifiche a tutti gli utenti?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Le impostazioni delle regole del Forum sono state modificate.',
	'ACP_BOARDRULES_LIST_STYLE'				=> 'Board rules list style',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Board rules are presented in a list format. Decide if you want rule and category items to be preceded by ordered alpha-numeric ordinals (this is the default behavior), bullets or nothing.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Ordered alpha-numeric',
	'ACP_BOARDRULES_LIST_STYLE_BULLET'		=> 'Bullet',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'None',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Gestisci Regole',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'Da questa pagina è possibile aggiungere, modificare, eliminare e riordinare le categorie e le regole. Una categoria è un gruppo di regole correlate. Ogni categoria può avere un numero illimitato di regole.',
	'ACP_BOARDRULES_LANGUAGE_EXPLAIN'		=> 'Choose a language for your Board Rules. Users will see the rules you create for their preferred language. If you do not create any rules in their preferred language, then users will see rules created using the board’s default language.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Categoria Regola',
	'ACP_BOARDRULES_RULE'					=> 'Regola',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Seleziona lingua',
	'ACP_BOARDRULES_CREATE_RULE'			=> 'Crea Regola',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'Utilizzando il modulo qui sotto è possibile creare una nuova regola che verrà visualizzato agli utenti.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'Modifica Regola',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'Utilizzando il modulo qui sotto è possibile aggiornare una regola esistente che verrà visualizzata da gli utenti.',
	'ACP_RULE_SETTINGS'						=> 'Impostazione Regola',
	'ACP_RULE_PARENT'						=> 'Regola principale',
	'ACP_RULE_NO_PARENT'					=> 'Nessuna regola principale',
	'ACP_RULE_TITLE'						=> 'Titolo Regola',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'I Titoli delle regole vengono visualizzati sulla pagina regole solo per le categorie di regole. I titoli delle regole vengono anche utilizzati per identificare le regole quando vengono gestite da pannello di controllo di amministrazione.',
	'ACP_RULE_ANCHOR'						=> 'Ancora Regola',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'Le ancore delle regole sono opzionali e sono usate come punti di collegamento/ancoraggio nella pagina regole. Dovrebbero essere URLs semplici (non contenere spazi o caratteri speciali), dovrebbero iniziare con una lettera e dovranno essere univoci.',
	'ACP_RULE_MESSAGE'						=> 'Messaggio Regola',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'Il messaggio regola viene visualizzato nella pagina regole per ogni regola (categorie non visualizzano un messaggio regola).',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'Si tratta di una categoria che contiene delle regole, l´editor di messaggio è stato disattivato.',
	'ACP_ADD_RULE'							=> 'Crea nuova regola',
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => 'Sei sicuro di voler rimuovere questa regola?',
		1 => 'Sei sicuro di voler rimuovere questa categoria di regole?<br />Attenzione: La rimozione di una categoria di regole comporterà anche la rimozione di tutte le regole in essa contenute.',
	),
	'ACP_RULE_ADDED'						=> 'Regola aggiunta con successo.',
	'ACP_RULE_DELETED'						=> 'Regola rimossa con successo.',
	'ACP_RULE_EDITED'						=> 'Regola modificata con successo.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Devi inserire un titolo per questa regola.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Board rules failed to acquire the table lock. Another process may be holding the lock. Locks are forcibly released after a timeout of 1 hour.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'The requested rule does not exist.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'The requested rule has no parent.',
));
