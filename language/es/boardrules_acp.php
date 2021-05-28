<?php
/**
*
* Board Rules extension for the phpBB Forum Software package.
* Spanish translation by Raul [ThE KuKa] (www.phpbb-es.com)
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
	'ACP_BOARDRULES'						=> 'Normas del Foro',
	'ACP_BOARDRULES_SETTINGS'				=> 'Ajustes de Normas',
	'ACP_BOARDRULES_SETTINGS_EXPLAIN'		=> 'Aquí puede configurar los ajustes principales de las Normas del Foro.',
	'ACP_BOARDRULES_ENABLE'					=> 'Habilitar Normas del Foro',
	'ACP_BOARDRULES_HEADER_LINK'			=> 'Mostrar enlace de las Normas del Foro en el encabezado',
	'ACP_BOARDRULES_FONT_ICON'				=> 'Icono del enlace de Normas del Foro',
	'ACP_BOARDRULES_FONT_ICON_EXPLAIN'		=> 'Introduzca el nombre de un icono <strong><a href="%s" target="_blank">Font Awesome</a></strong> para usarlo con el enlace de la página. Deje este campo en blanco para no usar icono en Normas del Foro.',
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'The board rules link icon contained invalid characters.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Requerir a los nuevos usuarios a aceptar las Normas en el registro',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Esta opción agregará una cláusula a las "Condiciones de uso" que requieren a los nuevos usuarios que quieran registrarse, deben leer y aceptar las Normas del Foro en el registro.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Notificar a usuarios',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Enviar una notificación a todos los usuarios registrados que las Normas del Foro han sido actualizadas. (Esto puede tardar varios segundos en completarse en foros con muchos miles de miembros.)',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> '¿Está seguro de querer enviar notificaciones a todos los usuarios?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Ajustes de Normas del Foro cambiados.',
	'ACP_BOARDRULES_LIST_STYLE'				=> 'Board rules list style',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Board rules are presented in a list format. Decide if you want rule and category items to be preceded by ordered alpha-numeric ordinals (this is the default behavior), bullets or nothing.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Ordered alpha-numeric',
	'ACP_BOARDRULES_LIST_STYLE_BULLET'		=> 'Bullet',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'None',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Gestionar Normas',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'Desde esta página puede añadir, editar, borrar y re-ordenar categorías y normas. Una categoría es un grupo de normas relacionadas. Cada categoría puede tener un número ilimitado de normas.',
	'ACP_BOARDRULES_LANGUAGE_EXPLAIN'		=> 'Choose a language for your Board Rules. Users will see the rules you create for their preferred language. If you do not create any rules in their preferred language, then users will see rules created using the board’s default language.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Categoría de Norma',
	'ACP_BOARDRULES_RULE'					=> 'Norma',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Seleccionar idioma',
	'ACP_BOARDRULES_CREATE_RULE'			=> 'Crear Norma',
	'ACP_BOARDRULES_CREATE_RULE_EXPLAIN'	=> 'Usando el siguiente formulario se puede crear una nueva norma que se mostrará a los usuarios.',
	'ACP_BOARDRULES_EDIT_RULE'				=> 'Editar norma',
	'ACP_BOARDRULES_EDIT_RULE_EXPLAIN'		=> 'Usando el siguiente formulario se puede actualizar una norma existente que se mostrará a los usuarios.',
	'ACP_RULE_SETTINGS'						=> 'Ajustes de la norma',
	'ACP_RULE_PARENT'						=> 'Norma padre',
	'ACP_RULE_NO_PARENT'					=> 'Sin padre',
	'ACP_RULE_TITLE'						=> 'Título de la norma',
	'ACP_RULE_TITLE_EXPLAIN'				=> 'Los títulos de Norma son mostrados en la páginas de normas, sólo en la categorías de Normas. Los títulos de Normas también se utilizan para identificar sus normas cuando las gestione desde el ACP.',
	'ACP_RULE_ANCHOR'						=> 'Anclaje de Norma',
	'ACP_RULE_ANCHOR_EXPLAIN'				=> 'Anclaje (anchor) de Norma son opcionales y son usadas como puntos de enlace de anclaje en la página de Normas. Deben ser URL amigables (no deberá incluir espacios ni caracteres especiales) y deben comenzar con una letra.',
	'ACP_RULE_MESSAGE'						=> 'Mensaje de la Norma',
	'ACP_RULE_MESSAGE_EXPLAIN'				=> 'El mensaje de la Norma se muestra en la página de Normas para cada norma (las categorías no muestran un mensaje de norma).',
	'ACP_RULE_MESSAGE_DISABLED'				=> 'Está es una categoría que contiene normas, el editor de mensajes está deshabilitado.',
	'ACP_ADD_RULE'							=> 'Crear nueva norma',
	'ACP_DELETE_RULE_CONFIRM'				=> array(
		0 => '¿Está seguro de querer borrar esta norma?',
		1 => '¿Está seguro de querer borrar esta norma de categoría?<br />Advertencia: Al eliminar una norma de categoría también eliminará todas las normas contenidas de la misma.',
	),
	'ACP_RULE_ADDED'						=> 'Norma añadida correctamente.',
	'ACP_RULE_DELETED'						=> 'Norma eliminada correctamente.',
	'ACP_RULE_EDITED'						=> 'Norma editada correctamente.',
	'ACP_RULE_TITLE_EMPTY'					=> 'Debe especificar un título para esta norma.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Las Normas del Foro han fallado al adquirir el bloqueo de la tabla. Otro proceso puede ser que tenga el bloqueo. Los bloqueos se liberan por la fuerza, después de un tiempo de espera de 1 hora.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'No existe la norma solicitada.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'La norma solicitada no tiene padre.',
));
