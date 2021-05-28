<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
* Ελληνική μετάφραση [el]
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
	'ACP_BOARDRULES'						=> 'Όροι Συμμετοχής Δ. Συζήτησης',
	'ACP_BOARDRULES_SETTINGS'				=> 'Ρυθμίσεις Όρων Συμμετοχής',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'Εδώ μπορείτε να διαμορφώσετε τις κύριες ρυθμίσεις των Όρων Συμμετοχής της Δ. Συζήτησης.',
	'ACP_BOARDRULES_ENABLE'					=> 'Ενεργοποίηση Όρων Συμμετοχής Δ. Συζήτησης',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'Εμφάνιση συνδέσμου Όρων Συμμετοχής Δ. Συζήτησης στην κορυφή',
	'ACP_BOARDRULES_FONT_ICON'				=> 'Σύνδεσμος εικονιδίου Όρων Συμμετοχής',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Εισάγετε το όνομα του εικονιδίου από το <strong><a href="%s" target="_blank">Font Awesome</a></strong> που θα χρησιμοποιηθεί στον σύνδεσμο των Όρων Συμμετοχής. Αφήστε αυτό το πεδίο κενό αν δεν θέλετε να εμφανίζεται κάποιο εικονίδιο.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'Ο σύνδεσμος εικονιδίου Όρων Συμμετοχής περιέχει μη έγκυρους χαρακτήρες.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Απαιτείται στα νέα μέλη να αποδεχθούν τους Όρους Συμμετοχής κατά την εγγραφή',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Αυτή η επιλογή θα προσθέσει ένα σύνδεσμο στους κυρίως "Όρους Συμμετοχής" απαιτώντας από τα νέα μέλη να διαβάσουν και να αποδεχτούν τους όρους συμμετοχής της Δ. Συζήτησης κατά την εγγραφή τους.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Ειδοποίηση μελών',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Αποστέλει μια ειδοποίηση σε όλα τα μέλη ότι οι όροι συμμετοχής της Δ. Συζήτησης έχουν ανανεωθεί. (Αυτό θα διαρκέσει μερικά δευτερόλεπτα να ολοκληρωθεί σε Δ. Συζητήσεις με αρκετές χιλιάδες μέλη.)',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Είστε σίγουρος (-η) ότι θέλετε να στείλετε ειδοποίηση σε όλα τα μέλη;',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Οι ρυθμίσεις των Όρων Συμμετοχής Δ. Συζήτησης άλλαξαν.',
	'ACP_BOARDRULES_LIST_STYLE'				=> 'Board rules list style',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Board rules are presented in a list format. Decide if you want rule and category items to be preceded by ordered alpha-numeric ordinals (this is the default behavior), bullets or nothing.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Ordered alpha-numeric',
	'ACP_BOARDRULES_LIST_STYLE_BULLET'		=> 'Bullet',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'None',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Διαχείριση Όρων Συμμετοχής',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'Από εδώ μπορείτε να προσθέσετε, επεξεργαστείτε, διαγράψετε και να αναδιατάξετε κατηγορίες και όρους. Μια κατηγορία είναι μια ομάδα σχετικών όρων. Κάθε κατηγορία μπορεί να περιέχει απεριόριστο αριθμό όρων.',
	'ACP_BOARDRULES_LANGUAGE_EXPLAIN'		=> 'Choose a language for your Board Rules. Users will see the rules you create for their preferred language. If you do not create any rules in their preferred language, then users will see rules created using the board’s default language.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Κατηγορία όρων',
	'ACP_BOARDRULES_RULE'					=> 'Όρος',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Επιλογή γλώσσας',
	'ACP_BOARDRULES_CREATE_RULE'			=> 'Δημιουργία όρου',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'Χρησιμοποιώντας την παρακάτω φόρμα μπορείτε να δημιουργήσετε ένα νέο όρο ο οποίος θα εμφανίζεται στα μέλη.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'Επεξεργασία όρου',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'Χρησιμοποιώντας την παρακάτω φόρμα μπορείτε να επεξεργαστείτε έναν υπάρχον όρο ο οποίος θα εμφανίζεται στα μέλη.',
	'ACP_RULE_SETTINGS'						=> 'Ρυθμίσεις όρου',
	'ACP_RULE_PARENT'						=> 'Γονέας όρου',
	'ACP_RULE_NO_PARENT'					=> 'Χωρίς γονέα',
	'ACP_RULE_TITLE'						=> 'Τίτλος όρου',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'Οι τίτλοι όρων εμφανίζονται στη σελίδα όρων μόνο για τις κατηγορίες. Επίσης, οι τίτλοι όρων χρησιμοποιούνται για τον εντοπισμό των όρων σας όταν τους διαχειρίζεστε στον ΠΕΔ.',
	'ACP_RULE_ANCHOR'						=> 'Σύνδεσμος όρου',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'Οι σύνδεσμοι όρων είναι προαιρετικοί και χρησιμοποιούνται ως σύνδεσμοι στη σελίδα όρων. Αυτοί πρέπει να είναι σύνδεσμοι URL (δεν περιέχουν κενά ή ειδικούς χαρακτήρες), θα πρέπει να αρχίζουν με γράμμα και θα πρέπει να είναι μοναδικοί.',
	'ACP_RULE_MESSAGE'						=> 'Κείμενο όρου',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'Το κείμενο του όρου εμφανίζεται στη σελίδα όρων για κάθε όρο (οι κατηγορίες δεν εμφανίζουν το κείμενο όρου).',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'Αυτή είναι μια κατηγορία που περιέχει όρους, ο κειμενογράφος έχει απενεργοποιηθεί.',
	'ACP_ADD_RULE'							=> 'Δημιουργία νέου όρου',
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => 'Είστε σίγουρος (-η) ότι θέλετε να διαγράψετε αυτό τον όρο.',
		1 => 'Είστε σίγουρος (-η) ότι θέλετε να διαγράψετε αυτό τον όρο.<br />Προσοχή: Διαγράφοντας μια κατηγορία όρων, θα διαγραφούν και όλοι οι όροι που περιέχονται σε αυτή.',
	),
	'ACP_RULE_ADDED'						=> 'Ο όρος προστέθηκε με επιτυχία.',
	'ACP_RULE_DELETED'						=> 'Ο όρος διαγράφηκε με επιτυχία.',
	'ACP_RULE_EDITED'						=> 'Ο όρος επεξεργάστηκε με επιτυχία.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Πρέπει να εισάγετε ένα τίτλο για αυτό τον όρο.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Board rules failed to acquire the table lock. Another process may be holding the lock. Locks are forcibly released after a timeout of 1 hour.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'The requested rule does not exist.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'The requested rule has no parent.',
));
