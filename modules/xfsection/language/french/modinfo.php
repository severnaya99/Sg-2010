<?php
// $Id: modinfo.php,v 1.2 2006/01/04 09:47:02 ohwada Exp $

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
define('_MI_XFS_BNAME','XF-Section R&eacute;cent');
define('_MI_XFS_BNAME_MENU','Menu XF-Section');
define('_MI_XFS_TOPICS','Cat&eacute;gories XF-Section');
define('_MI_XFS_BNAME3','Article du Jour XF-Section');
define('_MI_XFS_BNAME4','Artiles les plus lus XF-Section');
define('_MI_XFS_BNAME5','Liste des Articles r&eacute;cents XF-Section');
define('_MI_XFS_BNAME6','Liste des Fichiers attach&eacute;s XF-Section');
define('_MI_XFS_BNAME_ARTMENU','Liens vers les Articles n\'apparaissant pas dans l\'index XF-Section');

// Sub menus in main menu block
define('_MI_XFS_SUBMIT','Proposer un Article');
define('_MI_XFS_POPULAR','Les Plus Populaires');
define('_MI_XFS_RATEFILE','Les Mieux Not&eacute;s');

// rename WFS to XFS
// multiple install of same module
if ( !defined("_WFS_MODINFO_PHP") ) 
{
define("_WFS_MODINFO_PHP",1);

// Names of admin menu items
define('_MI_XFS_ADMENU1','Configuration');
define('_MI_XFS_ADMENU2','Gestion page Index principale');
define('_MI_XFS_ADMENU3','Gestion des r&eacute;pertoires');
define('_MI_XFS_ADMENU4','Gestion des Sections');
define('_MI_XFS_ADMENU5','Gestion des Articles');
define('_MI_XFS_ADMENU6','-- Cr&eacute;er un nouvel Article');
define('_MI_XFS_ADMENU7','Gestionnaire de fichiers');
define('_MI_XFS_ADMENU8','Liste des t&eacute;l&eacute;chargements bris&eacute;s');
define('_MI_XFS_ADMENU9','Liste des Articles propos&eacute;s');
define('_MI_XFS_ADMENU10','Gestion de l\'ordre d\'affichage');
define('_MI_XFS_ADMENU11','Gestion fichiers attach&eacute;s');

// add menu: bulk import
define('_MI_XFS_ADMENU12','Importer des Fichiers HTML');
}

?>