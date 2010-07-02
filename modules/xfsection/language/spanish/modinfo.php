<?php
// 2004/03/01 DACEVEDO 
//   Spanish Translation ES-CO v0.2

// 2003/11/21 K.OHWADA
// multiple install of same module
// rename WFS -> XFS
// rename WF-Section to XF-Section
// add menu: bulk import

// 2004/02/20 DACEVEDO
//   Spanish Translation ES-CO v0.1

// Module Info

// The name of this module
// WF -> XF
define('_MI_XFS_NAME', 'XFsection');

// A brief description of this module
// WF -> XF
define('_MI_XFS_DESC','');

// Names of blocks for this module (Not all module has blocks)
// WF -> XF
define('_MI_XFS_BNAME','Artículos Recientes de XF-Section');
define('_MI_XFS_BNAME_MENU','Menú de XF-Section');
define('_MI_XFS_TOPICS','Secciones de XF-Section');
define('_MI_XFS_BNAME3','Artículo del Día de XF-Section');
define('_MI_XFS_BNAME4','Artículos más leídos de XF-Section');
define('_MI_XFS_BNAME5','Artículos Recientes de XF-Section');
define('_MI_XFS_BNAME6','Anexos Recientes de de XF-Section');
define('_MI_XFS_BNAME_ARTMENU','Hipervínculos Recientes de XF-Section');

// Sub menus in main menu block
define('_MI_XFS_SUBMIT','Proponer Artículo');
define('_MI_XFS_POPULAR','Los Más leídos');
define('_MI_XFS_RATEFILE','Los Mejor Calificados');

// multiple install of same module
if ( !defined("_WFS_MODINFO_PHP") ) 
{
define("_WFS_MODINFO_PHP",1);

// Names of admin menu items
define('_MI_WFS_ADMENU1','Configuratición General');
define('_MI_WFS_ADMENU2','Índice Principal');
define('_MI_WFS_ADMENU3','Administración de «Rutas»');
define('_MI_WFS_ADMENU4','Administración de «Secciones»');
define('_MI_WFS_ADMENU5','Administración de «Artículos»');
define('_MI_WFS_ADMENU6','-- Nuevo Artículo');
define('_MI_WFS_ADMENU7','Administración de «Archivos»');
define('_MI_WFS_ADMENU8','Listado de Anexos Rotos');
define('_MI_WFS_ADMENU9','Listado de Artículos Propuestos');
define('_MI_WFS_ADMENU10','Administración de «Peso»');
define('_MI_WFS_ADMENU11','Administración de «Anexos»');

// add menu: bulk import
define('_MI_WFS_ADMENU12','Importado por lotes de archivos HTML');
}

?>
