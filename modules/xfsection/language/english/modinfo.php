<?php
// $Id: modinfo.php,v 1.2 2005/06/20 15:03:23 ohwada Exp $

// 2004/07/01 K.OHWADA
// WFsection 2.01 correspondence 
// rename WFS to XFS, since menu name had been change

// 2003/11/21 K.OHWADA
// multiple install of same module
// rename WFS -> XFS
// rename WF-Section to XF-Section
// add menu: bulk import

// Module Info

// The name of this module
// WF -> XF
define('_MI_XFS_NAME', 'XF-Section');

// A brief description of this module
// WF -> XF
define('_MI_XFS_DESC','');

// Names of blocks for this module (Not all module has blocks)
// WF -> XF
define('_MI_XFS_BNAME','XF-Section Recent');
define('_MI_XFS_BNAME_MENU','XF-Section Menu');
define('_MI_XFS_TOPICS','XF-Section Topics');
define('_MI_XFS_BNAME3','XF-Section Big Article');
define('_MI_XFS_BNAME4','XF-Section Top');
define('_MI_XFS_BNAME5','XF-Section Recent');
define('_MI_XFS_BNAME6','XF-Section downloads');
define('_MI_XFS_BNAME_ARTMENU','XF-Section Article Links');

// Sub menus in main menu block
define('_MI_XFS_SUBMIT','Submit Article');
define('_MI_XFS_POPULAR','Popular');
define('_MI_XFS_RATEFILE','Rated');

// rename WFS to XFS
// multiple install of same module
if ( !defined("_XFS_MODINFO_PHP") ) 
{
define("_XFS_MODINFO_PHP",1);

// Names of admin menu items
define('_MI_XFS_ADMENU1','Configuration');
define('_MI_XFS_ADMENU2','Index Page Management');
define('_MI_XFS_ADMENU3','Path Management');
define('_MI_XFS_ADMENU4','Section Management');
define('_MI_XFS_ADMENU5','Article Management');
define('_MI_XFS_ADMENU6','-- Create New Article');
define('_MI_XFS_ADMENU7','File Management');
define('_MI_XFS_ADMENU8','List Broken downloads');
define('_MI_XFS_ADMENU9','List Submitted Articles');
define('_MI_XFS_ADMENU10','Weight Management');
define('_MI_XFS_ADMENU11','Article Downloads');

// add menu: bulk import
define('_MI_XFS_ADMENU12','Bulk import of HTML files');
}

?>
