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
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Scegli come contrassegnare regole e categorie. L’elenco ordinato alterna numeri, lettere e numeri romani. L’elenco non ordinato alterna disco, cerchio e quadrato. La numerazione composta mostra il percorso numerico completo.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Ordered alpha-numeric',
	'ACP_BOARDRULES_LIST_STYLE_UNORDERED'	=> 'Non ordinato (disco, cerchio, quadrato)',
	'ACP_BOARDRULES_LIST_STYLE_COMPOUND'	=> 'Numerazione composta (1, 1.1, 1.1.1)',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'None',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Gestisci Regole',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'Da questa pagina è possibile aggiungere, modificare, eliminare e riordinare le categorie e le regole. Una categoria è un gruppo di regole correlate. Ogni categoria può avere un numero illimitato di regole.',
	'ACP_BOARDRULES_INTRO'					=> 'Introduzione alla pagina delle regole',
	'ACP_BOARDRULES_INTRO_EXPLAIN'			=> 'Personalizza l’introduzione mostrata agli utenti che visualizzano la pagina delle regole <strong>%s</strong>. Lascia vuoto questo campo per usare l’introduzione predefinita mostrata come segnaposto.',
	'ACP_BOARDRULES_INTRO_SAVE'				=> 'Salva introduzione',
	'ACP_BOARDRULES_INTRO_SAVED'			=> 'Introduzione alla pagina delle regole salvata.',
	'ACP_BOARDRULES_LANGUAGE_EXPLAIN'		=> 'Choose a language for your Board Rules. Users will see the rules you create for their preferred language. If you do not create any rules in their preferred language, then users will see rules created using the board’s default language.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Categoria Regola',
	'ACP_BOARDRULES_RULE'					=> 'Regola',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Seleziona lingua',
	'ACP_BOARDRULES_LANGUAGES'				=> 'Lingue delle regole',
	'ACP_BOARDRULES_LANGUAGES_EXPLAIN'		=> 'Gestisci tutte le lingue installate da un unico punto. Copia un set completo di regole in un’altra lingua, traducilo come bozza e pubblicalo quando è pronto.',
	'ACP_BOARDRULES_RULES'					=> 'Regole',
	'ACP_BOARDRULES_STATUS'					=> 'Stato',
	'ACP_BOARDRULES_STATUS_EMPTY'			=> 'Uso della lingua predefinita',
	'ACP_BOARDRULES_STATUS_NO_RULES'		=> 'Nessuna regola',
	'ACP_BOARDRULES_STATUS_DRAFT'			=> 'Bozza',
	'ACP_BOARDRULES_STATUS_PUBLISHED'		=> 'Pubblicato',
	'ACP_BOARDRULES_MANAGE_ACTION'			=> 'Gestisci',
	'ACP_BOARDRULES_COPY_ACTION'			=> 'Copia regole',
	'ACP_BOARDRULES_PUBLISH'				=> 'Pubblica',
	'ACP_BOARDRULES_SET_DRAFT'				=> 'Imposta come bozza',
	'ACP_BOARDRULES_ALL_LANGUAGES'			=> 'Tutte le lingue',
	'ACP_BOARDRULES_DEFAULT_LANGUAGE'		=> 'Lingua predefinita',
	'ACP_BOARDRULES_EMPTY_NOTICE'			=> 'Non esistono regole in questa lingua. Gli utenti vedono attualmente le regole nella lingua predefinita della board.',
	'ACP_BOARDRULES_EMPTY_DEFAULT_NOTICE'	=> 'Non esistono regole nella lingua predefinita della board.',
	'ACP_BOARDRULES_DRAFT_NOTICE'			=> 'Queste regole non sono visibili agli utenti. Gli utenti vedono attualmente le regole nella lingua predefinita della board.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_NOTICE'	=> 'Queste regole non sono visibili agli utenti. Pubblicale per rendere disponibili le regole predefinite della board.',
	'ACP_BOARDRULES_COPY_RULESET'			=> 'Copia set di regole della lingua',
	'ACP_BOARDRULES_COPY_RULESET_EXPLAIN'	=> 'Copia ogni categoria e regola in <strong>%s</strong>. Le regole copiate vengono aggiunte dopo quelle esistenti e l’intero set di regole di destinazione rimane una bozza finché non viene pubblicato.',
	'ACP_BOARDRULES_COPY_APPEND'			=> 'Aggiungi alle regole esistenti',
	'ACP_BOARDRULES_COPY_APPEND_EXPLAIN'	=> 'La destinazione contiene attualmente %d regole. Rimarranno invariate e le regole copiate verranno aggiunte dopo di esse. Gli ancoraggi copiati in conflitto riceveranno un suffisso numerico.',
	'ACP_BOARDRULES_COPY_SETTINGS'			=> 'Impostazioni di copia',
	'ACP_BOARDRULES_COPY_SOURCE'			=> 'Copia da',
	'ACP_BOARDRULES_COPY_SOURCE_EXPLAIN'	=> 'Verranno copiati gerarchia completa, ordine, titoli, messaggi, ancoraggi e impostazioni di formattazione.',
	'ACP_BOARDRULES_COPY_TARGET'			=> 'Copia in',
	'ACP_BOARDRULES_RULE_COUNT'				=> '%d regole',
	'ACP_BOARDRULES_COPY_INVALID_LANGUAGE'	=> 'La lingua di origine e quella di destinazione devono essere lingue installate diverse.',
	'ACP_BOARDRULES_COPY_SOURCE_EMPTY'		=> 'La lingua di origine selezionata non contiene regole da copiare.',
	'ACP_BOARDRULES_COPY_SUCCESS'			=> '%1$d regole copiate in %2$s come bozza.',
	'ACP_BOARDRULES_COPY_ANCHORS_RENAMED'	=> '%d ancoraggi in conflitto sono stati rinominati con suffissi numerici.',
	'ACP_BOARDRULES_INVALID_LANGUAGE'		=> 'La lingua selezionata non è installata.',
	'ACP_BOARDRULES_STATUS_CHANGE_EMPTY'	=> 'Un set di regole vuoto non può essere pubblicato né impostato come bozza.',
	'ACP_BOARDRULES_DEFAULT_CANNOT_DRAFT'	=> 'La lingua predefinita della board non può essere impostata come bozza.',
	'ACP_BOARDRULES_PUBLISH_CONFIRM'		=> 'Pubblicare questo set completo di regole della lingua? Gli utenti di questa lingua lo vedranno immediatamente.',
	'ACP_BOARDRULES_DRAFT_CONFIRM'			=> 'Impostare questo set completo di regole della lingua come bozza? Gli utenti di questa lingua vedranno invece le regole nella lingua predefinita della board.',
	'ACP_BOARDRULES_PUBLISH_SUCCESS'		=> 'Set di regole della lingua pubblicato.',
	'ACP_BOARDRULES_DRAFT_SUCCESS'			=> 'Set di regole della lingua impostato come bozza.',

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
		1 => 'Sei sicuro di voler rimuovere questa categoria di regole?<br>Attenzione: La rimozione di una categoria di regole comporterà anche la rimozione di tutte le regole in essa contenute.',
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
