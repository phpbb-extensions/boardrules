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
	'BOARDRULES_SAMPLE_CATEGORY_TITLE'		=> 'Пример за категория на Правило',
	'BOARDRULES_SAMPLE_CATEGORY_MESSAGE'	=> 'Това е пример за категория в инсталацията на "Правила на Форума". Категорията съдържа групи от свързани правила. Съобщенията за категории (като това) не се изобразяват на страницата на Правилата.',
	'BOARDRULES_SAMPLE_CATEGORY_ANCHOR'		=> 'Категория - Пример',

	'BOARDRULES_SAMPLE_RULE_TITLE'			=> 'Примерно Правило',
	'BOARDRULES_SAMPLE_RULE_MESSAGE'		=> 'Това е пример за правило в инсталацията на "Правила на Форума". Това е пример за правило в инсталацията на "Правила на Форума". Всичко изглежда да работи. Може да промените или изтриете това правило и категорията и да продължите да създавате свои собствени Правила на Форума.',
	'BOARDRULES_SAMPLE_RULE_ANCHOR'			=> 'Правило-пример',
));
