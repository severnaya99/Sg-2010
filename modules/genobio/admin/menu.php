<?php
global $adminmenu;
$adminmenu=array();
$adminmenu[1]['title'] = _GB_ADMENU1;
$adminmenu[1]['link'] = "admin/index.php";
$adminmenu[2]['title'] = _GB_ADMENU2;
$adminmenu[2]['link'] = "admin/index.php?op=sibblings";
$adminmenu[3]['title'] = _GB_ADMENU3;
$adminmenu[3]['link'] = "admin/index.php?op=members";
$adminmenu[4]['title'] = _GB_ADMENU4;
$adminmenu[4]['link'] = "admin/index.php?op=categories";
$adminmenu[5]['title'] = _GB_ADMENU5;
$adminmenu[5]['link'] = "admin/index.php?op=sibblings&fct=new";
$adminmenu[6]['title'] = _GB_ADMENU6;
$adminmenu[6]['link'] = "admin/index.php?op=members&fct=new";
$adminmenu[7]['title'] = _GB_ADMENU7;
$adminmenu[7]['link'] = "admin/index.php?op=categories&fct=new";

?>