<?php

/**
* $Id: admin_header.php 1561 2008-04-13 14:14:19Z malanciault $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

include_once "../../../mainfile.php";

if (!defined("SMARTSECTION_NOCPFUNC")) {
	include_once '../../../include/cp_header.php';
}

include_once XOOPS_ROOT_PATH . "/class/xoopsmodule.php";
include_once XOOPS_ROOT_PATH . "/class/xoopstree.php";
include_once XOOPS_ROOT_PATH . "/class/xoopslists.php";
include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
include_once XOOPS_ROOT_PATH . "/class/xoopsformloader.php";

include XOOPS_ROOT_PATH.'/modules/smartsection/include/common.php';

if( !defined("SMARTSECTION_ADMIN_URL") ){
	define('SMARTSECTION_ADMIN_URL', SMARTSECTION_URL . "admin");
}

$imagearray = array(
	'editimg' => "<img src='". SMARTSECTION_IMAGES_URL ."/button_edit.png' alt='" . _AM_SSECTION_ICO_EDIT . "' align='middle' />",
    'deleteimg' => "<img src='". SMARTSECTION_IMAGES_URL ."/button_delete.png' alt='" . _AM_SSECTION_ICO_DELETE . "' align='middle' />",
    'online' => "<img src='". SMARTSECTION_IMAGES_URL ."/on.png' alt='" . _AM_SSECTION_ICO_ONLINE . "' align='middle' />",
    'offline' => "<img src='". SMARTSECTION_IMAGES_URL ."/off.png' alt='" . _AM_SSECTION_ICO_OFFLINE . "' align='middle' />",
	);

$myts = &MyTextSanitizer::getInstance();

/**
 * Making sure SmartObject is installed
 */
$module_handler = xoops_gethandler('module');
$smartobject_module = $module_handler->getByDirname('smartobject');
if (!$smartobject_module) {
	include_once(XOOPS_ROOT_PATH . '/class/template.php');
	
	trigger_error('SmartSection requires SmartObject to be installed. Please installed SmartObject first.');
	
	xoops_cp_header();
	$tpl = new XoopsTpl();
	$tpl->display(SMARTSECTION_ROOT_PATH . 'templates/smartsection_smartobject_required.html');
	xoops_cp_footer();
	exit;	
}

?>