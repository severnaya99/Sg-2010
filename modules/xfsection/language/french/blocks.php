<?php
// $Id: blocks.php,v 1.2 2006/01/04 09:47:02 ohwada Exp $

// 2004/07/01 K.OHWADA
// WFsection 2.01 correspondence 
// rename WFS to XFS

// 2003/11/21 K.OHWADA
// multiple install of same module


// multiple install of same module
if ( !defined("_WFS_BLOCKS_PHP") ) 
{
define("_WFS_BLOCKS_PHP",1);

// Blocks
define("_MB_WFS_NOTYET","Il n'y a pas d'Article &agrave; la une Aujourd'hui.");
define("_MB_WFS_TMRSI","Article le plus lu Aujourd'hui :");
define("_MB_WFS_ORDER","Ordre d'Affichage");
define("_MB_WFS_DATE","Date de Publication");
define("_MB_WFS_HITS","Nombre de Visites");
define("_MB_WFS_DISP","Affichage");
define("_MB_WFS_ARTCLS","Articles");
define("_MB_WFS_CHARS","Longueur du Titre");
define("_MB_WFS_LENGTH"," Caract&egrave;res");
define("_MB_WFS_TITLE","Titre");
define("_MB_WFS_ARTICLEID","N° Article ");
}

?>
