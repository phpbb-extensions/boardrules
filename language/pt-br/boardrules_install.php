<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
* @Traduzido por: http://phpbbportugal.com - segundo as normas do Acordo Ortográfico
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
	'BOARDRULES_SAMPLE_CATEGORY_TITLE'		=> 'Exemplo Regra Categoria',
	'BOARDRULES_SAMPLE_CATEGORY_MESSAGE'	=> 'Esta é uma categoria de exemplo das regras do fórum. Categorias contêm grupos de regras relacionadas. Mensagens Categoria (como esta) não são exibidas na página de regras.',
	'BOARDRULES_SAMPLE_CATEGORY_ANCHOR'		=> 'examplo-categoria',

	'BOARDRULES_SAMPLE_RULE_TITLE'			=> 'Exemplo de Regra',
	'BOARDRULES_SAMPLE_RULE_MESSAGE'		=> 'Esta é uma regras de exemplo das regras do fórum. Tudo parece funcionar bem. Edite ou exclua esta regra e categoria e continue a configurar suas próprias regras deste fórum.',
	'BOARDRULES_SAMPLE_RULE_ANCHOR'			=> 'exemplo-regra',
));
