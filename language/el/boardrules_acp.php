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
	'ACP_BOARDRULES_LIST_STYLE'				=> 'Στυλ λίστας κανόνων',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Επιλέξτε τον τρόπο αρίθμησης των κανόνων και των κατηγοριών. Η ταξινομημένη λίστα εναλλάσσεται μεταξύ αριθμών, γραμμάτων και λατινικών αριθμών. Η μη ταξινομημένη λίστα εναλλάσσεται μεταξύ δίσκου, κύκλου και τετραγώνου. Η σύνθετη αρίθμηση εμφανίζει την πλήρη αριθμητική διαδρομή.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Ordered alpha-numeric',
	'ACP_BOARDRULES_LIST_STYLE_UNORDERED'	=> 'Μη ταξινομημένη (δίσκος, κύκλος, τετράγωνο)',
	'ACP_BOARDRULES_LIST_STYLE_COMPOUND'	=> 'Σύνθετη αρίθμηση (1, 1.1, 1.1.1)',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'Κανένα',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Διαχείριση Όρων Συμμετοχής',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'Από εδώ μπορείτε να προσθέσετε, επεξεργαστείτε, διαγράψετε και να αναδιατάξετε κατηγορίες και όρους. Μια κατηγορία είναι μια ομάδα σχετικών όρων. Κάθε κατηγορία μπορεί να περιέχει απεριόριστο αριθμό όρων.',
	'ACP_BOARDRULES_INTRO'					=> 'Εισαγωγή σελίδας όρων',
	'ACP_BOARDRULES_INTRO_EXPLAIN'			=> 'Προσαρμόστε την εισαγωγή που εμφανίζεται στους χρήστες της σελίδας όρων <strong>%s</strong>. Αφήστε αυτό το πεδίο κενό για να χρησιμοποιήσετε την προεπιλεγμένη εισαγωγή που εμφανίζεται ως κείμενο υπόδειξης.',
	'ACP_BOARDRULES_INTRO_SAVE'				=> 'Αποθήκευση εισαγωγής',
	'ACP_BOARDRULES_INTRO_SAVED'			=> 'Η εισαγωγή της σελίδας όρων αποθηκεύτηκε.',
	'ACP_BOARDRULES_LANGUAGE'				=> 'Γλώσσα',
	'ACP_BOARDRULES_CATEGORY'				=> 'Κατηγορία όρων',
	'ACP_BOARDRULES_RULE'					=> 'Όρος',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Επιλογή γλώσσας',
	'ACP_BOARDRULES_LANGUAGES'				=> 'Γλώσσες κανόνων συμμετοχής',
	'ACP_BOARDRULES_LANGUAGES_EXPLAIN'		=> 'Διαχειριστείτε όλες τις εγκατεστημένες γλώσσες από ένα σημείο. Αντιγράψτε ένα πλήρες σύνολο κανόνων σε άλλη γλώσσα, μεταφράστε το ως πρόχειρο και δημοσιεύστε το όταν είναι έτοιμο.',
	'ACP_BOARDRULES_RULES'					=> 'Κανόνες',
	'ACP_BOARDRULES_STATUS'					=> 'Κατάσταση',
	'ACP_BOARDRULES_STATUS_EMPTY'			=> 'Χρήση κανόνων προεπιλεγμένης γλώσσας',
	'ACP_BOARDRULES_STATUS_NO_RULES'		=> 'Χωρίς κανόνες',
	'ACP_BOARDRULES_STATUS_DRAFT'			=> 'Πρόχειρο',
	'ACP_BOARDRULES_STATUS_PUBLISHED'		=> 'Δημοσιευμένο',
	'ACP_BOARDRULES_MANAGE_ACTION'			=> 'Διαχείριση',
	'ACP_BOARDRULES_COPY_ACTION'			=> 'Αντιγραφή κανόνων',
	'ACP_BOARDRULES_PUBLISH'				=> 'Δημοσίευση',
	'ACP_BOARDRULES_SET_DRAFT'				=> 'Ορισμός ως πρόχειρο',
	'ACP_BOARDRULES_ALL_LANGUAGES'			=> 'Όλες οι γλώσσες',
	'ACP_BOARDRULES_DEFAULT_LANGUAGE'		=> 'Προεπιλεγμένη γλώσσα',
	'ACP_BOARDRULES_EMPTY_NOTICE'			=> 'Δεν υπάρχουν κανόνες σε αυτή τη γλώσσα. Οι χρήστες βλέπουν αυτή τη στιγμή τους κανόνες στην προεπιλεγμένη γλώσσα της κοινότητας.',
	'ACP_BOARDRULES_EMPTY_DEFAULT_NOTICE'	=> 'Δεν υπάρχουν κανόνες στην προεπιλεγμένη γλώσσα της κοινότητας.',
	'ACP_BOARDRULES_DRAFT_NOTICE'			=> 'Αυτοί οι κανόνες δεν είναι ορατοί στους χρήστες. Οι χρήστες βλέπουν αυτή τη στιγμή τους κανόνες στην προεπιλεγμένη γλώσσα της κοινότητας.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_NOTICE'	=> 'Αυτοί οι κανόνες δεν είναι ορατοί στους χρήστες. Δημοσιεύστε τους για να γίνουν διαθέσιμοι οι προεπιλεγμένοι κανόνες της κοινότητας.',
	'ACP_BOARDRULES_COPY_RULESET'			=> 'Αντιγραφή συνόλου κανόνων γλώσσας',
	'ACP_BOARDRULES_COPY_RULESET_EXPLAIN'	=> 'Αντιγράψτε κάθε κατηγορία και κανόνα στη γλώσσα <strong>%s</strong>. Οι αντιγραμμένοι κανόνες προστίθενται μετά από τυχόν υπάρχοντες και ολόκληρο το σύνολο κανόνων προορισμού παραμένει πρόχειρο μέχρι να το δημοσιεύσετε.',
	'ACP_BOARDRULES_COPY_APPEND'			=> 'Προσθήκη στους υπάρχοντες κανόνες',
	'ACP_BOARDRULES_COPY_APPEND_EXPLAIN'	=> array(
		1 => 'Ο προορισμός περιέχει αυτή τη στιγμή %d κανόνα. Θα παραμείνει αμετάβλητος και οι αντιγραμμένοι κανόνες θα προστεθούν μετά από αυτόν. Οι αντιγραμμένες άγκυρες που συγκρούονται θα λάβουν αριθμητικό επίθημα.',
		2 => 'Ο προορισμός περιέχει αυτή τη στιγμή %d κανόνες. Θα παραμείνουν αμετάβλητοι και οι αντιγραμμένοι κανόνες θα προστεθούν μετά από αυτούς. Οι αντιγραμμένες άγκυρες που συγκρούονται θα λάβουν αριθμητικό επίθημα.',
	),
	'ACP_BOARDRULES_COPY_SETTINGS'			=> 'Ρυθμίσεις αντιγραφής',
	'ACP_BOARDRULES_COPY_SOURCE'			=> 'Αντιγραφή από',
	'ACP_BOARDRULES_COPY_SOURCE_EXPLAIN'	=> 'Θα αντιγραφούν ολόκληρη η ιεραρχία, η σειρά, οι τίτλοι, τα μηνύματα, οι άγκυρες και οι ρυθμίσεις μορφοποίησης.',
	'ACP_BOARDRULES_COPY_TARGET'			=> 'Αντιγραφή σε',
	'ACP_BOARDRULES_RULE_COUNT'				=> array(
		1 => '%d κανόνας',
		2 => '%d κανόνες',
	),
	'ACP_BOARDRULES_COPY_INVALID_LANGUAGE'	=> 'Η προέλευση και ο προορισμός πρέπει να είναι διαφορετικές εγκατεστημένες γλώσσες.',
	'ACP_BOARDRULES_COPY_SOURCE_EMPTY'		=> 'Η επιλεγμένη γλώσσα προέλευσης δεν έχει κανόνες για αντιγραφή.',
	'ACP_BOARDRULES_COPY_SUCCESS'			=> array(
		1 => '%1$d κανόνας αντιγράφηκε στη γλώσσα %2$s ως πρόχειρο.',
		2 => '%1$d κανόνες αντιγράφηκαν στη γλώσσα %2$s ως πρόχειρο.',
	),
	'ACP_BOARDRULES_COPY_ANCHORS_RENAMED'	=> array(
		1 => '%d άγκυρα με διένεξη μετονομάστηκε με αριθμητικό επίθημα.',
		2 => '%d άγκυρες με διένεξη μετονομάστηκαν με αριθμητικά επιθήματα.',
	),
	'ACP_BOARDRULES_INVALID_LANGUAGE'		=> 'Η επιλεγμένη γλώσσα δεν είναι εγκατεστημένη.',
	'ACP_BOARDRULES_STATUS_CHANGE_EMPTY'	=> 'Ένα κενό σύνολο κανόνων δεν μπορεί να δημοσιευτεί ή να μετατραπεί σε πρόχειρο.',
	'ACP_BOARDRULES_PUBLISH_CONFIRM'		=> 'Να δημοσιευτεί το πλήρες σύνολο κανόνων αυτής της γλώσσας; Οι χρήστες αυτής της γλώσσας θα το δουν αμέσως.',
	'ACP_BOARDRULES_DRAFT_CONFIRM'			=> 'Να μετατραπεί το πλήρες σύνολο κανόνων αυτής της γλώσσας σε πρόχειρο; Οι χρήστες αυτής της γλώσσας θα βλέπουν αντί γι’ αυτό τους κανόνες στην προεπιλεγμένη γλώσσα της κοινότητας.',
	'ACP_BOARDRULES_PUBLISH_SUCCESS'		=> 'Το σύνολο κανόνων της γλώσσας δημοσιεύτηκε.',
	'ACP_BOARDRULES_DRAFT_SUCCESS'			=> 'Το σύνολο κανόνων της γλώσσας μετατράπηκε σε πρόχειρο.',
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

	'ACP_BOARDRULES_FALLBACK_UNAVAILABLE'	=> 'Δεν υπάρχουν διαθέσιμοι δημοσιευμένοι κανόνες προεπιλεγμένης γλώσσας.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_CONFIRM'	=> 'Αλλαγή του συνόλου κανόνων προεπιλεγμένης γλώσσας σε πρόχειρο; Οι χρήστες χωρίς άλλο δημοσιευμένο σύνολο κανόνων δεν θα έχουν διαθέσιμους κανόνες.',
	'ACP_BOARDRULES_DRAFT_NO_FALLBACK_CONFIRM' => 'Να αλλάξει αυτό το πλήρες σύνολο κανόνων γλώσσας σε πρόχειρο; Δεν υπάρχουν δημοσιευμένοι κανόνες προεπιλεγμένης γλώσσας διαθέσιμοι ως εναλλακτικοί.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Οι κανόνες του πίνακα απέτυχαν να αποκτήσουν το κλείδωμα του τραπεζιού. Μια άλλη διαδικασία μπορεί να είναι το κράτημα της κλειδαριάς. Οι κλειδαριές απελευθερώνονται αναγκαστικά μετά από ένα τάιμ άουτ 1 ώρας.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'Ο ζητούμενος κανόνας δεν υπάρχει.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'Ο κανόνας που ζητήθηκε δεν έχει γονικό.',
));
