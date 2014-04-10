<?php
/**
*
* board-rules [English]
*
* @package Board Rules Extension
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
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
	'ACP_BOARDRULES'					=> 'Board rules',
	'ACP_BOARDRULES_MANAGE'				=> 'Manage rules',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'		=> 'Here you can manage your board rules. A category is a group of related rules. Each category can have unlimited numbers of rules. Here you can add, edit, delete or re-order categories and rules.',
	'ACP_BOARDRULES_SETTINGS'			=> 'Rules settings',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'	=> 'Here you can configure the main settings for board rules.',

	'BOARDRULES_ENABLE'								=> 'Enable board rules',
	'BOARDRULES_REQUIRE_AT_REGISTRATION'			=> 'Require new users to accept rules at registration',
	'BOARDRULES_REQUIRE_AT_REGISTRATION_EXPLAIN'	=> 'This option will add a clause to the “Terms of Agreement” requiring newly registering users to read and accept the board rules at registration.',
	'BOARDRULES_SETTINGS_CHANGED'					=> 'Board rules settings changed.',

	'ADD_RULE'							=> 'Add rule',
	'DELETE_RULE_CONFIRM'				=> 'Are you sure you want to remove this rule?',
	'RULE_ADDED'						=> 'Rule successfully added.',
	'RULE_DELETED'						=> 'Rule successfully removed.',
	'RULE_EDITED'						=> 'Rule successfully edited.',
	'RULE_TITLE_EMPTY'					=> 'You must enter a title for this rule.',
));
