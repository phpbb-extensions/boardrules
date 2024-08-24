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
	// Settings page
	'ACP_BOARDRULES'						=> 'Regras do Fórum',
	'ACP_BOARDRULES_SETTINGS'				=> 'Configurar regras',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'Aqui pode configurar as definições principais das regras do Fórum.',
	'ACP_BOARDRULES_ENABLE'					=> 'Ativar regras',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'Mostrar link no cabeçalho',
	'ACP_BOARDRULES_FONT_ICON'				=> 'Board rules link icon',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Enter the name of a <strong><a href="%s" target="_blank">Font Awesome</a></strong> icon to use for the board rules link in the header. Leave this field blank for no board rules icon.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'The board rules link icon contained invalid characters.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Exigir aceitação das regras no momento do registo',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Acrescenta as Regras do Fórum às "Condições de utilização", permitindo a sua leitura e obrigando à sua aceitação antes do registo.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Notificar Utilizadores',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Enviar uma notificação a todos os utilizadores registrados que as regras da comunidade foram atualizados. (Esta ação pode demorar alguns segundos para ser concluída em Fóruns com muitos milhares de membros.)',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Tem certeza que deseja enviar notificações a todos os utilizadores?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'A configuração das regras do fórum foi alterada.',
	'ACP_BOARDRULES_LIST_STYLE'				=> 'Board rules list style',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Board rules are presented in a list format. Decide if you want rule and category items to be preceded by ordered alpha-numeric ordinals (this is the default behavior), bullets or nothing.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Ordered alpha-numeric',
	'ACP_BOARDRULES_LIST_STYLE_BULLET'		=> 'Bullet',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'None',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Gerir regras',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'Nesta página pode adicionar, editar, apagar e reordenar as categorias e regras. A categoria é um conjunto de regras inter-relacionadas. Cada categoria pode ter um número ilimitado de regras.',
	'ACP_BOARDRULES_LANGUAGE_EXPLAIN'		=> 'Choose a language for your Board Rules. Users will see the rules you create for their preferred language. If you do not create any rules in their preferred language, then users will see rules created using the board’s default language.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Categoria de regras',
	'ACP_BOARDRULES_RULE'					=> 'Regra',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Escolha um idioma',
	'ACP_BOARDRULES_CREATE_RULE'			=> 'Criar regra',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'Através do formulário abaixo pode criar uma nova regra que será mostrada aos utilizadores.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'Editar regra',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'Através do formulário abaixo pode atualizar uma regra que será mostrada aos utilizadores.',
	'ACP_RULE_SETTINGS'						=> 'Configurar regra',
	'ACP_RULE_PARENT'						=> 'Regra pai',
	'ACP_RULE_NO_PARENT'					=> 'Nenhum pai',
	'ACP_RULE_TITLE'						=> 'Título da regra',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'Os Títulos das Regras são exibidos na página de regras apenas para categorias de regras. Títulos das regras também são usados para identificar as regras na gestão do ACP.',
	'ACP_RULE_ANCHOR'						=> 'Regra âncora',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'Âncoras de regras são opcionais e usadas como pontos de ligação de ancoragem na página regras. Devem ser URL amigáveis (não podem conter espaços ou caracteres especiais), devem começar com uma letra, e devem ser exclusivos.',
	'ACP_RULE_MESSAGE'						=> 'Mensagem da regra',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'A mensagem da regra é exibida na página de regra para cada regra (categorias não exibem mensagens das regras).',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'Esta é uma categoria que contém regras, o editor mensagem foi desativado.',
	'ACP_ADD_RULE'							=> 'Criar nova regra',
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => 'Tem a certeza que deseja eliminar esta regra?',
		1 => 'Tem a certeza que deseja eliminar esta categoria de regra?<br />Aviso: Removendo um categoria de regra irá remover todas as regras contidas dentro dela.',
	),
	'ACP_RULE_ADDED'						=> 'Regra criada com sucesso.',
	'ACP_RULE_DELETED'						=> 'Regra eliminada com sucesso.',
	'ACP_RULE_EDITED'						=> 'Regra editada com sucesso.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Tem que dar um titulo à regra.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Board rules failed to acquire the table lock. Another process may be holding the lock. Locks are forcibly released after a timeout of 1 hour.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'The requested rule does not exist.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'The requested rule has no parent.',
));
