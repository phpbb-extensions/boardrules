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
	'ACP_BOARDRULES_FONT_ICON'				=> 'Ícone da ligação às regras',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Introduza o nome de um ícone <strong><a href="%s" target="_blank">Font Awesome</a></strong> para a ligação às regras no cabeçalho. Deixe vazio para não usar um ícone.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'O ícone da ligação às regras continha caracteres inválidos.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Exigir aceitação das regras no momento do registo',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Acrescenta as Regras do Fórum às "Condições de utilização", permitindo a sua leitura e obrigando à sua aceitação antes do registo.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Notificar Utilizadores',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Enviar uma notificação a todos os utilizadores registrados que as regras da comunidade foram atualizados. (Esta ação pode demorar alguns segundos para ser concluída em Fóruns com muitos milhares de membros.)',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> 'Tem certeza que deseja enviar notificações a todos os utilizadores?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'A configuração das regras do fórum foi alterada.',
	'ACP_BOARDRULES_LIST_STYLE'				=> 'Estilo da lista de regras',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Escolha como identificar as regras e categorias. A lista ordenada alterna entre números, letras e algarismos romanos. A lista não ordenada alterna entre disco, círculo e quadrado. A numeração composta mostra o caminho numérico completo.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Ordered alpha-numeric',
	'ACP_BOARDRULES_LIST_STYLE_UNORDERED'	=> 'Não ordenada (disco, círculo, quadrado)',
	'ACP_BOARDRULES_LIST_STYLE_COMPOUND'	=> 'Numeração composta (1, 1.1, 1.1.1)',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'Nenhum',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Gerir regras',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'Nesta página pode adicionar, editar, apagar e reordenar as categorias e regras. A categoria é um conjunto de regras inter-relacionadas. Cada categoria pode ter um número ilimitado de regras.',
	'ACP_BOARDRULES_INTRO'					=> 'Introdução da página de regras',
	'ACP_BOARDRULES_INTRO_EXPLAIN'			=> 'Personalize a introdução apresentada aos utilizadores que consultam a página de regras <strong>%s</strong>. Deixe este campo vazio para utilizar a introdução predefinida apresentada como marcador de posição.',
	'ACP_BOARDRULES_INTRO_SAVE'				=> 'Guardar introdução',
	'ACP_BOARDRULES_INTRO_SAVED'			=> 'A introdução da página de regras foi guardada.',
	'ACP_BOARDRULES_LANGUAGE'				=> 'Idioma',
	'ACP_BOARDRULES_CATEGORY'				=> 'Categoria de regras',
	'ACP_BOARDRULES_RULE'					=> 'Regra',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Escolha um idioma',
	'ACP_BOARDRULES_LANGUAGES'				=> 'Idiomas das regras',
	'ACP_BOARDRULES_LANGUAGES_EXPLAIN'		=> 'Faça a gestão de todos os idiomas instalados num único local. Copie um conjunto completo de regras para outro idioma, traduza-o como rascunho e publique-o quando estiver pronto.',
	'ACP_BOARDRULES_RULES'					=> 'Regras',
	'ACP_BOARDRULES_STATUS'					=> 'Estado',
	'ACP_BOARDRULES_STATUS_EMPTY'			=> 'A usar as regras do idioma predefinido',
	'ACP_BOARDRULES_STATUS_NO_RULES'		=> 'Sem regras',
	'ACP_BOARDRULES_STATUS_DRAFT'			=> 'Rascunho',
	'ACP_BOARDRULES_STATUS_PUBLISHED'		=> 'Publicado',
	'ACP_BOARDRULES_MANAGE_ACTION'			=> 'Gerir',
	'ACP_BOARDRULES_COPY_ACTION'			=> 'Copiar regras',
	'ACP_BOARDRULES_PUBLISH'				=> 'Publicar',
	'ACP_BOARDRULES_SET_DRAFT'				=> 'Definir como rascunho',
	'ACP_BOARDRULES_ALL_LANGUAGES'			=> 'Todos os idiomas',
	'ACP_BOARDRULES_DEFAULT_LANGUAGE'		=> 'Idioma predefinido',
	'ACP_BOARDRULES_EMPTY_NOTICE'			=> 'Não existem regras neste idioma. Os utilizadores veem atualmente as regras no idioma predefinido do fórum.',
	'ACP_BOARDRULES_EMPTY_DEFAULT_NOTICE'	=> 'Não existem regras no idioma predefinido do fórum.',
	'ACP_BOARDRULES_DRAFT_NOTICE'			=> 'Estas regras não estão visíveis para os utilizadores. Os utilizadores veem atualmente as regras no idioma predefinido do fórum.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_NOTICE'	=> 'Estas regras não estão visíveis para os utilizadores. Publique-as para disponibilizar as regras predefinidas do fórum.',
	'ACP_BOARDRULES_COPY_RULESET'			=> 'Copiar conjunto de regras do idioma',
	'ACP_BOARDRULES_COPY_RULESET_EXPLAIN'	=> 'Copia todas as categorias e regras para <strong>%s</strong>. As regras copiadas são adicionadas depois das regras existentes e o conjunto completo de destino permanece como rascunho até ser publicado.',
	'ACP_BOARDRULES_COPY_APPEND'			=> 'Adicionar às regras existentes',
	'ACP_BOARDRULES_COPY_APPEND_EXPLAIN'	=> array(
		1 => 'O destino contém atualmente %d regra. Esta permanecerá inalterada e as regras copiadas serão adicionadas depois dela. As âncoras copiadas em conflito receberão um sufixo numérico.',
		2 => 'O destino contém atualmente %d regras. Estas permanecerão inalteradas e as regras copiadas serão adicionadas depois delas. As âncoras copiadas em conflito receberão um sufixo numérico.',
	),
	'ACP_BOARDRULES_COPY_SETTINGS'			=> 'Definições de cópia',
	'ACP_BOARDRULES_COPY_SOURCE'			=> 'Copiar de',
	'ACP_BOARDRULES_COPY_SOURCE_EXPLAIN'	=> 'Serão copiadas a hierarquia completa, a ordenação, os títulos, as mensagens, as âncoras e as definições de formatação.',
	'ACP_BOARDRULES_COPY_TARGET'			=> 'Copiar para',
	'ACP_BOARDRULES_RULE_COUNT'				=> array(
		1 => '%d regra',
		2 => '%d regras',
	),
	'ACP_BOARDRULES_COPY_INVALID_LANGUAGE'	=> 'Os idiomas de origem e de destino devem ser idiomas instalados diferentes.',
	'ACP_BOARDRULES_COPY_SOURCE_EMPTY'		=> 'O idioma de origem selecionado não tem regras para copiar.',
	'ACP_BOARDRULES_COPY_SUCCESS'			=> array(
		1 => '%1$d regra copiada para %2$s como rascunho.',
		2 => '%1$d regras copiadas para %2$s como rascunho.',
	),
	'ACP_BOARDRULES_COPY_ANCHORS_RENAMED'	=> array(
		1 => '%d âncora em conflito foi renomeada com um sufixo numérico.',
		2 => '%d âncoras em conflito foram renomeadas com sufixos numéricos.',
	),
	'ACP_BOARDRULES_INVALID_LANGUAGE'		=> 'O idioma selecionado não está instalado.',
	'ACP_BOARDRULES_STATUS_CHANGE_EMPTY'	=> 'Um conjunto de regras vazio não pode ser publicado nem definido como rascunho.',
	'ACP_BOARDRULES_PUBLISH_CONFIRM'		=> 'Publicar este conjunto completo de regras do idioma? Os utilizadores deste idioma irão vê-lo imediatamente.',
	'ACP_BOARDRULES_DRAFT_CONFIRM'			=> 'Definir este conjunto completo de regras do idioma como rascunho? Os utilizadores deste idioma verão as regras no idioma predefinido do fórum.',
	'ACP_BOARDRULES_PUBLISH_SUCCESS'		=> 'Conjunto de regras do idioma publicado.',
	'ACP_BOARDRULES_DRAFT_SUCCESS'			=> 'Conjunto de regras do idioma definido como rascunho.',

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

	'ACP_BOARDRULES_FALLBACK_UNAVAILABLE'	=> 'Não estão disponíveis regras publicadas no idioma predefinido.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_CONFIRM'	=> 'Definir o conjunto de regras do idioma predefinido como rascunho? Os utilizadores sem outro conjunto de regras publicado não terão regras disponíveis.',
	'ACP_BOARDRULES_DRAFT_NO_FALLBACK_CONFIRM' => 'Definir este conjunto completo de regras do idioma como rascunho? Não estão disponíveis regras publicadas no idioma predefinido como alternativa.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'As regras do conselho não conseguiram adquirir o bloqueio da tabela. Outro processo pode estar segurando o bloqueio. Os bloqueios são liberados à força após um tempo limite de 1 hora.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'A regra solicitada não existe.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'A regra solicitada não tem pai.',
));
