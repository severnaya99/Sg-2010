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
define('_MI_XFS_BNAME','Art�culos Recientes de XF-Section');
define('_MI_XFS_BNAME_MENU','Men� de XF-Section');
define('_MI_XFS_TOPICS','Secciones de XF-Section');
define('_MI_XFS_BNAME3','Art�culo del D�a de XF-Section');
define('_MI_XFS_BNAME4','Art�culos m�s le�dos de XF-Section');
define('_MI_XFS_BNAME5','Art�culos Recientes de XF-Section');
define('_MI_XFS_BNAME6','Anexos Recientes de de XF-Section');
define('_MI_XFS_BNAME_ARTMENU','Hiperv�nculos Recientes de XF-Section');

// Sub menus in main menu block
define('_MI_XFS_SUBMIT','Proponer Art�culo');
define('_MI_XFS_POPULAR','Los M�s le�dos');
define('_MI_XFS_RATEFILE','Los Mejor Calificados');

// multiple install of same module
if ( !defined("_WFS_MODINFO_PHP") ) 
{
define("_WFS_MODINFO_PHP",1);

// Names of admin menu items
define('_MI_WFS_ADMENU1','Configuratici�n General');
define('_MI_WFS_ADMENU2','�ndice Principal');
define('_MI_WFS_ADMENU3','Administraci�n de �Rutas�');
define('_MI_WFS_ADMENU4','Administraci�n de �Secciones�');
define('_MI_WFS_ADMENU5','Administraci�n de �Art�culos�');
define('_MI_WFS_ADMENU6','-- Nuevo Art�culo');
define('_MI_WFS_ADMENU7','Administraci�n de �Archivos�');
define('_MI_WFS_ADMENU8','Listado de Anexos Rotos');
define('_MI_WFS_ADMENU9','Listado de Art�culos Propuestos');
define('_MI_WFS_ADMENU10','Administraci�n de �Peso�');
define('_MI_WFS_ADMENU11','Administraci�n de �Anexos�');

// add menu: bulk import
define('_MI_WFS_ADMENU12','Importado por lotes de archivos HTML');
}

?>
