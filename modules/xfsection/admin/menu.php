<?php
// $Id: menu.php,v 1.2 2005/06/20 15:03:23 ohwada Exp $

// 2004/07/01 K.OHWADA
// WFsection 2.01 correspondence 
// rename WFS to XFS, since menu name had been change

// 2003/10/11 K.OHWADA
// add menu import

// rename WFS to XFS
$adminmenu[0]['title'] = _MI_XFS_ADMENU1;
$adminmenu[0]['link'] = "admin/config.php";
$adminmenu[1]['title'] = _MI_XFS_ADMENU2;
$adminmenu[1]['link'] = "admin/sectiontxt.php";
$adminmenu[2]['title'] = _MI_XFS_ADMENU3;
$adminmenu[2]['link'] = "admin/pathconfig.php";
$adminmenu[3]['title'] = _MI_XFS_ADMENU4;
$adminmenu[3]['link'] = "admin/category.php?op=default";
$adminmenu[4]['title'] = _MI_XFS_ADMENU5;
$adminmenu[4]['link'] = "admin/allarticles.php";
$adminmenu[5]['title'] = _MI_XFS_ADMENU6;
$adminmenu[5]['link'] = "admin/index.php?op=newarticle";
$adminmenu[6]['title'] = _MI_XFS_ADMENU7;
$adminmenu[6]['link'] = "admin/filemanager.php";
$adminmenu[7]['title'] = _MI_XFS_ADMENU8;
$adminmenu[7]['link'] = "admin/brokendown.php?op=listBrokenDownloads";
$adminmenu[8]['title'] = _MI_XFS_ADMENU9;
$adminmenu[8]['link'] = "admin/allarticles.php?action=submitted";
$adminmenu[9]['title'] = _MI_XFS_ADMENU10;
$adminmenu[9]['link'] = "admin/reorder.php";
$adminmenu[10]['title'] = _MI_XFS_ADMENU11;
$adminmenu[10]['link'] = "admin/wfsfilesshow.php";

// add this menu
$adminmenu[11]['title'] = _MI_XFS_ADMENU12;
$adminmenu[11]['link'] = "admin/import.php";

?>
