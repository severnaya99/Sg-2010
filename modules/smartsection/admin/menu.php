<?php
/**
* $Id: menu.php 331 2007-12-23 16:01:11Z malanciault $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

$i = 0;

// Index
$adminmenu[$i]['title'] = _MI_SSECTION_ADMENU1;
$adminmenu[$i]['link'] = "admin/index.php";
$i++;
// Category
$adminmenu[$i]['title'] = _MI_SSECTION_ADMENU2;
$adminmenu[$i]['link'] = "admin/category.php";
$i++;
// Items
$adminmenu[$i]['title'] = _MI_SSECTION_ADMENU3;
$adminmenu[$i]['link'] = "admin/item.php";
$i++;
// Permissions
$adminmenu[$i]['title'] = _MI_SSECTION_ADMENU4;
$adminmenu[$i]['link'] = "admin/permissions.php";
$i++;
// Mimetypes
$adminmenu[$i]['title'] = _MI_SSECTION_ADMENU6;
$adminmenu[$i]['link'] = "admin/mimetypes.php";


if (isset($xoopsModule)) {
	$i = 0;
	$headermenu[$i]['title'] = _PREFERENCES;
	$headermenu[$i]['link'] = '../../system/admin.php?fct=preferences&amp;op=showmod&amp;mod=' . $xoopsModule->getVar('mid');
	$i++;

	$headermenu[$i]['title'] = _AM_SSECTION_GOMOD;
	$headermenu[$i]['link'] = SMARTSECTION_URL;
	$i++;

	$headermenu[$i]['title'] = _AM_SSECTION_UPDATE_MODULE;
	$headermenu[$i]['link'] = XOOPS_URL . "/modules/system/admin.php?fct=modulesadmin&op=update&module=" . $xoopsModule->getVar('dirname');
	$i++;

	if (SMARTSECTION_LEVEL > 0 ) {
		$headermenu[$i]['title'] = _AM_SSECTION_IMPORT;
		$headermenu[$i]['link'] = SMARTSECTION_URL . "admin/import.php";
		$i++;
	}

	$headermenu[$i]['title'] = _AM_SSECTION_ABOUT;
	$headermenu[$i]['link'] = SMARTSECTION_URL . "admin/about.php";
}
?>
