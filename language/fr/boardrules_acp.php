<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
* French translation by ForumsFaciles (http://www.forumsfaciles.fr) & Galixte (http://www.galixte.com)
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
	'ACP_BOARDRULES'						=> 'Règles du forum',
	'ACP_BOARDRULES_SETTINGS'				=> 'Paramètres des règles',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'Ici vous pouvez configurer les principaux paramètres des règles du forum.',
	'ACP_BOARDRULES_ENABLE'					=> 'Activer les règles du forum ',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'Afficher un lien vers les règles du forum dans le haut de la page ',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Oblige les nouveaux utilisateurs à accepter les règles lors de leur enregistrement ',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Cette option ajoutera une clause aux “Conditions d’utilisation”, demandant aux nouveaux utilisateurs de lire et d’accepter les règles du forum lors de leur enregistrement.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Avertir les utilisateurs',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Avertit tous les utilisateurs enregistrés que les règles du forum ont été mises à jour. (Cette opération peut prendre plusieurs secondes à s’exécuter sur les forums contenant des milliers de membres.)',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Êtes-vous certain(e) de vouloir envoyer un avertissement à tous les utilisateurs ?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Paramètres des règles du forum modifiés.',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Gestion des règles',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'Depuis cette page vous pouvez ajouter, modifier, supprimer et réordonner les catégories et les règles. Une catégorie est un ensemble de règles connexes. Chaque catégorie peut contenir un nombre illimité de règles.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Catégorie de règle(s)',
	'ACP_BOARDRULES_RULE'					=> 'Règle',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Sélectionner la langue',
	'ACP_BOARDRULES_CREATE_RULE'			=> 'Créer une règle',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'Via le formulaire ci-dessous vous pouvez créer une nouvelle règle qui sera affichée à tous vos utilisateurs.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'Modifier une règle',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'Via le formulaire ci-dessous vous pouvez modifier une règle déjà existante, qui sera affichée à tous vos utilisateurs.',
	'ACP_RULE_SETTINGS'						=> 'Paramètres de la règle',
	'ACP_RULE_PARENT'						=> 'Règle parent',
	'ACP_RULE_NO_PARENT'					=> 'Aucune règle parent',
	'ACP_RULE_TITLE'						=> 'Intitulé de la règle',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'Les intitulés de la règle sont affichés sur la page des règles pour les catégories de la règle uniquement. Les intitulés de la règle sont également utilisés pour identifier les règles lorsque vous les gérez via le PCA.',
	'ACP_RULE_ANCHOR'						=> 'Ancre de la règle',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'Les ancres des règles sont optionnelles et utilisées comme des points d’ancrage de liens sur la page des règles. Elles doivent être “SEO-Friendly” (ne pas contenir d’espaces ou de caractères spéciaux) et doivent commencer par une lettre.',
	'ACP_RULE_MESSAGE'						=> 'Texte de la règle',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'Le texte de la règle est affiché sur la page des règles pour chacune d’elle (les catégories n’affichent aucun texte de règle).',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'Cette catégorie contient des règles, l’éditeur de message a été désactivé.',
	'ACP_ADD_RULE'							=> 'Créer une nouvelle règle',
	'ACP_DELETE_RULE_CONFIRM'				=> 'Êtes-vous certain(e) de vouloir supprimer cette catégorie / règle ?<br />Attention : Si vous supprimez une catégorie cela supprimera aussi tous les règles qu’elle contient.',
	'ACP_RULE_ADDED'						=> 'Règle ajoutée avec succès.',
	'ACP_RULE_DELETED'						=> 'Règle supprimée avec succès.',
	'ACP_RULE_EDITED'						=> 'Règle modifiée avec succès.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Vous devez saisir un intitulé pour cette règle.',
));
