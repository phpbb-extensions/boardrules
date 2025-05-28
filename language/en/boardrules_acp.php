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
	'ACP_BOARDRULES'						=> 'Board rules',
	'ACP_BOARDRULES_SETTINGS'				=> 'Rules settings',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'Here you can configure the main settings for board rules.',
	'ACP_BOARDRULES_ENABLE'					=> 'Enable board rules',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'Display board rules link in the header',
	'ACP_BOARDRULES_FONT_ICON'				=> 'Board rules link icon',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Enter the name of a <strong><a href="%s" target="_blank">Font Awesome</a></strong> icon to use for the board rules link in the header. Leave this field blank for no board rules icon.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'The board rules link icon contained invalid characters.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Require new users to accept rules at registration',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'This option will add a clause to the “Terms of Agreement” requiring newly registering users to read and accept the board rules at registration.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Notify users',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Send a notification to all registered users that the board rules have been updated. (This may take several seconds to complete on boards with many thousands of members.)',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Are you sure you wish to send notifications to all users?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Board rules settings changed.',
	'ACP_BOARDRULES_LIST_STYLE'				=> 'Board rules list style',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Board rules are presented in a list format. Decide if you want rule and category items to be preceded by ordered alpha-numeric ordinals (this is the default behavior), bullets or nothing.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Ordered alpha-numeric',
	'ACP_BOARDRULES_LIST_STYLE_BULLET'		=> 'Bullet',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'None',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Manage rules',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'From this page you can add, edit, delete and re-order categories and rules. A category is a group of related rules. Each category can have an unlimited number of rules.',
	'ACP_BOARDRULES_LANGUAGE_EXPLAIN'		=> 'Choose a language for your Board Rules. Users will see the rules you create for their preferred language. If you do not create any rules in their preferred language, then users will see rules created using the board’s default language.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Rule category',
	'ACP_BOARDRULES_RULE'					=> 'Rule',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Select language',
	'ACP_BOARDRULES_CREATE_RULE'			=> 'Create rule',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'Using the form below you can create a new rule which will be displayed to your users.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'Edit rule',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'Using the form below you can update an existing rule which will be displayed to your users.',
	'ACP_RULE_SETTINGS'						=> 'Rule settings',
	'ACP_RULE_PARENT'						=> 'Rule parent',
	'ACP_RULE_NO_PARENT'					=> 'No parent',
	'ACP_RULE_TITLE'						=> 'Rule title',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'Rule titles are displayed on the rules page for rule categories only. Rule titles are also used to identify your rules when managing them in the ACP.',
	'ACP_RULE_ANCHOR'						=> 'Rule anchor',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'Rule anchors are optional and are used as link anchor points on the rules page. They should be URL friendly (contain no spaces or special characters), should begin with a letter, and they must be unique.',
	'ACP_RULE_MESSAGE'						=> 'Rule message',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'The rule message is displayed on the rules page for each rule (categories do not display a rule message).',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'This is a category containing rules, the message editor has been disabled.',
	'ACP_ADD_RULE'							=> 'Create new rule',
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => 'Are you sure you want to remove this rule?',
		1 => 'Are you sure you want to remove this rule category?<br>Warning: Removing a rule category will also remove all rules contained within it.',
	),
	'ACP_RULE_ADDED'						=> 'Rule successfully added.',
	'ACP_RULE_DELETED'						=> 'Rule successfully removed.',
	'ACP_RULE_EDITED'						=> 'Rule successfully edited.',
	'ACP_RULE_TITLE_EMPTY'					=> 'You must enter a title for this rule.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Board rules failed to acquire the table lock. Another process may be holding the lock. Locks are forcibly released after a timeout of 1 hour.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'The requested rule does not exist.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'The requested rule has no parent.',
));
