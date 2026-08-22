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
	'ACP_BOARDRULES_FONT_ICON_INVALID'		=> 'El icono del enlace a las normas contenía caracteres no válidos.',
	'ACP_BOARDRULES_AT_REGISTRATION'		=> 'Requerir a los nuevos usuarios a aceptar las Normas en el registro',
	'ACP_BOARDRULES_AT_REGISTRATION_EXPLAIN'=> 'Esta opción agregará una cláusula a las "Condiciones de uso" que requieren a los nuevos usuarios que quieran registrarse, deben leer y aceptar las Normas del Foro en el registro.',
	'ACP_BOARDRULES_NOTIFY'					=> 'Notificar a usuarios',
	'ACP_BOARDRULES_NOTIFY_EXPLAIN'			=> 'Enviar una notificación a todos los usuarios registrados que las Normas del Foro han sido actualizadas. (Esto puede tardar varios segundos en completarse en foros con muchos miles de miembros.)',
	'ACP_BOARDRULES_NOTIFY_CONFIRM'			=> '¿Está seguro de querer enviar notificaciones a todos los usuarios?',
	'ACP_BOARDRULES_SETTINGS_CHANGED'		=> 'Ajustes de Normas del Foro cambiados.',
	'ACP_BOARDRULES_LIST_STYLE'				=> 'Estilo de lista de las normas',
	'ACP_BOARDRULES_LIST_STYLE_EXPLAIN'		=> 'Elija cómo se anteponen indicadores a las reglas y categorías. La lista ordenada alterna entre números, letras y números romanos. La lista no ordenada alterna entre disco, círculo y cuadrado. La numeración compuesta muestra la ruta numérica completa.',
	'ACP_BOARDRULES_LIST_STYLE_ORDERED'		=> 'Ordered alpha-numeric',
	'ACP_BOARDRULES_LIST_STYLE_UNORDERED'	=> 'No ordenada (disco, círculo, cuadrado)',
	'ACP_BOARDRULES_LIST_STYLE_COMPOUND'	=> 'Numeración compuesta (1, 1.1, 1.1.1)',
	'ACP_BOARDRULES_LIST_STYLE_NONE'		=> 'Ninguno',

	// Manage page
	'ACP_BOARDRULES_MANAGE'					=> 'Gestionar Normas',
	'ACP_BOARDRULES_MANAGE_EXPLAIN'			=> 'Desde esta página puede añadir, editar, borrar y re-ordenar categorías y normas. Una categoría es un grupo de normas relacionadas. Cada categoría puede tener un número ilimitado de normas.',
	'ACP_BOARDRULES_INTRO'					=> 'Introducción de la página de normas',
	'ACP_BOARDRULES_INTRO_EXPLAIN'			=> 'Personalice la introducción que se muestra a los usuarios que consultan la página de normas <strong>%s</strong>. Deje este campo vacío para usar la introducción predeterminada que aparece como marcador de posición.',
	'ACP_BOARDRULES_INTRO_SAVE'				=> 'Guardar introducción',
	'ACP_BOARDRULES_INTRO_SAVED'			=> 'Se ha guardado la introducción de la página de normas.',
	'ACP_BOARDRULES_LANGUAGE_EXPLAIN'		=> 'Elija un idioma para las normas. Los usuarios verán las normas en su idioma preferido o en el idioma predeterminado del sitio si no existen en su idioma.',
	'ACP_BOARDRULES_CATEGORY'				=> 'Categoría de Norma',
	'ACP_BOARDRULES_RULE'					=> 'Norma',
	'ACP_BOARDRULES_SELECT_LANGUAGE'		=> 'Seleccionar idioma',
	'ACP_BOARDRULES_LANGUAGES'				=> 'Idiomas de las normas',
	'ACP_BOARDRULES_LANGUAGES_EXPLAIN'		=> 'Gestione todos los idiomas instalados desde un solo lugar. Copie un conjunto completo de normas a otro idioma, tradúzcalo como borrador y publíquelo cuando esté listo.',
	'ACP_BOARDRULES_RULES'					=> 'Normas',
	'ACP_BOARDRULES_STATUS'					=> 'Estado',
	'ACP_BOARDRULES_STATUS_EMPTY'			=> 'Usando las reglas del idioma predeterminado',
	'ACP_BOARDRULES_STATUS_NO_RULES'		=> 'Sin normas',
	'ACP_BOARDRULES_STATUS_DRAFT'			=> 'Borrador',
	'ACP_BOARDRULES_STATUS_PUBLISHED'		=> 'Publicado',
	'ACP_BOARDRULES_MANAGE_ACTION'			=> 'Gestionar',
	'ACP_BOARDRULES_COPY_ACTION'			=> 'Copiar normas',
	'ACP_BOARDRULES_PUBLISH'				=> 'Publicar',
	'ACP_BOARDRULES_SET_DRAFT'				=> 'Establecer como borrador',
	'ACP_BOARDRULES_ALL_LANGUAGES'			=> 'Todos los idiomas',
	'ACP_BOARDRULES_DEFAULT_LANGUAGE'		=> 'Idioma predeterminado',
	'ACP_BOARDRULES_EMPTY_NOTICE'			=> 'No hay normas en este idioma. Los usuarios ven actualmente las normas en el idioma predeterminado del sitio.',
	'ACP_BOARDRULES_EMPTY_DEFAULT_NOTICE'	=> 'No hay normas en el idioma predeterminado del sitio.',
	'ACP_BOARDRULES_DRAFT_NOTICE'			=> 'Estas normas no son visibles para los usuarios. Los usuarios ven actualmente las normas en el idioma predeterminado del sitio.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_NOTICE'	=> 'Estas normas no son visibles para los usuarios. Publíquelas para que estén disponibles las normas predeterminadas del sitio.',
	'ACP_BOARDRULES_COPY_RULESET'			=> 'Copiar conjunto de normas del idioma',
	'ACP_BOARDRULES_COPY_RULESET_EXPLAIN'	=> 'Copia cada categoría y norma en <strong>%s</strong>. Las normas copiadas se añaden después de las existentes y el conjunto completo de destino permanece como borrador hasta que se publique.',
	'ACP_BOARDRULES_COPY_APPEND'			=> 'Añadir a las normas existentes',
	'ACP_BOARDRULES_COPY_APPEND_EXPLAIN'	=> 'El destino contiene actualmente %d normas. Permanecerán sin cambios y las normas copiadas se añadirán después. Los anclajes copiados que entren en conflicto recibirán un sufijo numérico.',
	'ACP_BOARDRULES_COPY_SETTINGS'			=> 'Opciones de copia',
	'ACP_BOARDRULES_COPY_SOURCE'			=> 'Copiar desde',
	'ACP_BOARDRULES_COPY_SOURCE_EXPLAIN'	=> 'Se copiarán la jerarquía completa, el orden, los títulos, los mensajes, los anclajes y las opciones de formato.',
	'ACP_BOARDRULES_COPY_TARGET'			=> 'Copiar a',
	'ACP_BOARDRULES_RULE_COUNT'				=> '%d normas',
	'ACP_BOARDRULES_COPY_INVALID_LANGUAGE'	=> 'Los idiomas de origen y destino deben ser idiomas instalados diferentes.',
	'ACP_BOARDRULES_COPY_SOURCE_EMPTY'		=> 'El idioma de origen seleccionado no tiene normas para copiar.',
	'ACP_BOARDRULES_COPY_SUCCESS'			=> '%1$d normas copiadas a %2$s como borrador.',
	'ACP_BOARDRULES_COPY_ANCHORS_RENAMED'	=> 'Se cambiaron los nombres de %d anclajes en conflicto con sufijos numéricos.',
	'ACP_BOARDRULES_INVALID_LANGUAGE'		=> 'El idioma seleccionado no está instalado.',
	'ACP_BOARDRULES_STATUS_CHANGE_EMPTY'	=> 'Un conjunto de normas vacío no se puede publicar ni establecer como borrador.',
	'ACP_BOARDRULES_PUBLISH_CONFIRM'		=> '¿Publicar este conjunto completo de normas del idioma? Los usuarios de este idioma lo verán inmediatamente.',
	'ACP_BOARDRULES_DRAFT_CONFIRM'			=> '¿Establecer este conjunto completo de normas del idioma como borrador? Los usuarios de este idioma verán en su lugar las normas del idioma predeterminado del sitio.',
	'ACP_BOARDRULES_PUBLISH_SUCCESS'		=> 'Conjunto de normas del idioma publicado.',
	'ACP_BOARDRULES_DRAFT_SUCCESS'			=> 'Conjunto de normas del idioma establecido como borrador.',

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

	'ACP_BOARDRULES_FALLBACK_UNAVAILABLE'	=> 'No hay reglas publicadas disponibles en el idioma predeterminado.',
	'ACP_BOARDRULES_DRAFT_DEFAULT_CONFIRM'	=> '¿Cambiar el conjunto de reglas del idioma predeterminado a borrador? Los usuarios sin otro conjunto de reglas publicado no tendrán reglas disponibles.',
	'ACP_BOARDRULES_DRAFT_NO_FALLBACK_CONFIRM' => '¿Cambiar este conjunto completo de reglas de idioma a borrador? No hay reglas publicadas disponibles en el idioma predeterminado como alternativa.',

	// Nested set exception messages (only appears in PHP error logging)
	// Translators: Feel free to not translate these language strings
	'RULES_NESTEDSET_LOCK_FAILED_ACQUIRE'	=> 'Las Normas del Foro han fallado al adquirir el bloqueo de la tabla. Otro proceso puede ser que tenga el bloqueo. Los bloqueos se liberan por la fuerza, después de un tiempo de espera de 1 hora.',
	'RULES_NESTEDSET_INVALID_ITEM'			=> 'No existe la norma solicitada.',
	'RULES_NESTEDSET_INVALID_PARENT'		=> 'La norma solicitada no tiene padre.',
));
