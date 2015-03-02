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
	'ACP_BOARDRULES'						=> '掲示板ルール',
	'ACP_BOARDRULES_SETTINGS'				=> 'ルール設定',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'ここでは掲示板ルールのメイン設定を構成することが出来ます。',
	'ACP_BOARDRULES_ENABLE'					=> '掲示板ルールを有効にする',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'ヘッダーに掲示板ルールリンクを表示する',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> '新規ユーザの登録時にルールへの同意を要求する',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'このオプションは新規ユーザーの登録時に掲示板ルールを受け入れるようにするための “利用規約” の文言を追加します。',
	'ACP_BOARDRULES_NOTIFY'					=> 'ユーザー通知',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> '掲示板ルールが更新された場合に全登録ユーザーへ通知を送信します。(数千のメンバーがいる場合は完了までに時間がかかることが有ります。)',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> '全ユーザーへ通知を送信してもよろしいですか？',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> '掲示板ルール設定を変更しました。',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'ルール管理',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'このページからカテゴリやページの並び替え、追加、変更、削除が行えます。各カテゴリはルール数に制限がありません。',
	'ACP_BOARDRULES_CATEGORY'				=> 'ルールカテゴリ',
	'ACP_BOARDRULES_RULE'					=> 'ルール',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> '言語選択',
	'ACP_BOARDRULES_CREATE_RULE'			=> 'ルール作成',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> '以下のフォームを使用してユーザーに表示する新規ルールを作成できます。',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'ルール変更',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> '以下のフォームを使用してユーザーに表示する既存のルールを更新できます。',
	'ACP_RULE_SETTINGS'						=> 'ルール設定',
	'ACP_RULE_PARENT'						=> '上位ルール',
	'ACP_RULE_NO_PARENT'					=> '上位はありません',
	'ACP_RULE_TITLE'						=> 'ルールタイトル',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'ルールタイトルはルールカテゴリのみのルールページ上で表示されます。また、ルールタイトルはAdminCPでこれらを管理するときにルールを識別するために使用されます。',
	'ACP_RULE_ANCHOR'						=> 'ルールアンカー',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'ルールアンカーは任意で、ルールページ上のリンクアンカーポイントとして使用されます。これらはURLフレンドリー(スペースや特殊な文字を含まない)であるべきで、一意の文字で始まる必要があります。',
	'ACP_RULE_MESSAGE'						=> 'ルール本文',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'ルール本文は各ルール(カテゴリはルール本文を表示しません)のルールページ上で表示されます。',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'これはルールを含むカテゴリで、本文エディターは無効になっています。',
	'ACP_ADD_RULE'							=> '新規ルール作成',
	'ACP_DELETE_RULE_CONFIRM'				=> 'このルールを削除してもよろしいですか？<br />警告: ルールカテゴリを削除するのはそれに含まれる全てのルールも削除されます。',
	'ACP_RULE_ADDED'						=> 'ルールを追加しました。',
	'ACP_RULE_DELETED'						=> 'ルールを削除しました。',
	'ACP_RULE_EDITED'						=> 'ルールを変更しました。',
	'ACP_RULE_TITLE_EMPTY'					=> 'このルールのタイトルを入力してください。',
));
