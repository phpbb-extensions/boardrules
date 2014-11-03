<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
* French translation by ForumsFaciles (http://www.forumsfaciles.fr)
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
	'BOARDRULES_SAMPLE_CATEGORY_TITLE'		=> 'Exemple de catégorie de règle',
	'BOARDRULES_SAMPLE_CATEGORY_MESSAGE'	=> 'Ceci est une catégorie d’exemple lors d’installation des Règles de forum. Les catégories contiennent des groupes de règles proches. Les intitulés de catégorie (comme celui-ci) ne sont pas affichés sur la page des règles.',
	'BOARDRULES_SAMPLE_CATEGORY_ANCHOR'		=> 'modele-categorie',

	'BOARDRULES_SAMPLE_RULE_TITLE'			=> 'Exemple de règle',
	'BOARDRULES_SAMPLE_RULE_MESSAGE'		=> 'Ceci est un exemple de règle lors de l’installation des Règles de forum. Tout semble fonctionner. Vous pouvez modifier ou supprimer cette règle et cette catégorie et continuer à configurer vos propres règles de forum.',
	'BOARDRULES_SAMPLE_RULE_ANCHOR'			=> 'regle-modele',
));
