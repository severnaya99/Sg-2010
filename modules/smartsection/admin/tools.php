<?php

/**
* $Id: tools.php 3436 2008-07-05 10:49:26Z malanciault $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

include_once("admin_header.php");

$op = '';
if (isset($_POST['replacepermissions'])) {
	$op = 'replacepermissions';
}

switch ($op) {
	case 'replacepermissions' :
		$categoriesObj = $smartsection_category_handler->getObjects();
		$groups_read = isset($_POST['groups_read']) ? $_POST['groups_read'] : array();
		foreach($categoriesObj as $categoryObj) {
			smartsection_saveCategory_Permissions($groups_read, $categoryObj->categoryid(), 'category_read');
			smartsection_overrideItemsPermissions($groups_read, $categoryObj->categoryid());
		}
		redirect_header("index.php", 3, _AM_SSECTION_PERMISSIONS_UPDATED);
		exit;


	break;

	case "default":
	default:
	smartsection_xoops_cp_header();

	smartsection_adminMenu(-1, _AM_SSECTION_TOOLS);

	smartsection_collapsableBar('tools1', 'tools1icon', _AM_SSECTION_CONFIGURE_READ_PERMISSIONS, _AM_SSECTION_CONFIGURE_READ_PERMISSIONS_EXP);

	include_once XOOPS_ROOT_PATH . "/class/xoopsformloader.php";

	$sform = new XoopsThemeForm(_AM_SSECTION_FULLACCESS , "form", xoops_getenv('PHP_SELF'));
	$sform->setExtra('enctype="multipart/form-data"');

	// READ PERMISSIONS
	$groups_read_checkbox = new XoopsFormCheckBox(_AM_SSECTION_PERMISSIONS_CAT_READ, 'groups_read[]');
	$member_handler =& xoops_gethandler('member');

	foreach ( $member_handler->getGroupList() as $group_id=>$group_name ) {
		if ($group_id != XOOPS_GROUP_ADMIN) {
			$groups_read_checkbox->addOption($group_id, $group_name);
		}
	}
	$sform->addElement($groups_read_checkbox);

	$button_tray = new XoopsFormElementTray('', '');

	$button_tray->addElement(new XoopsFormButton('', 'replacepermissions', _AM_SSECTION_REPLACE_PERMISSIONS, 'submit'));
	$sform->addElement($button_tray);
	$sform->display();

	smartsection_close_collapsable('tools1', 'tools1icon');

	break;
}
smart_xoops_cp_footer();
?>