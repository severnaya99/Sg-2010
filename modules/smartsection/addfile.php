<?php

/**
* $Id: addfile.php 331 2007-12-23 16:01:11Z malanciault $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

include_once("header.php");

global $xoopsUser, $xoopsModuleConfig, $xoopsModule, $smartsection_item_handler, $smartsection_file_handler;

// if the user is not admin AND we don't allow user submission, exit
if (!($smartsection_isAdmin ||
	(isset($xoopsModuleConfig['allowsubmit']) && $xoopsModuleConfig['allowsubmit'] == 1 && (is_object($xoopsUser) || (isset($xoopsModuleConfig['anonpost']) && $xoopsModuleConfig['anonpost'] == 1))))
	) {
	redirect_header("index.php", 1, _NOPERM);
	exit();
}

$op = '';

if (isset($_GET['op'])) $op = $_GET['op'];
if (isset($_POST['op'])) $op = $_POST['op'];

$itemid = isset($_GET['itemid']) ? intval($_GET['itemid']) : 0;
$itemid = isset($_POST['itemid']) ? intval($_POST['itemid']) : $itemid;

$itemObj = $smartsection_item_handler->get($itemid);
// if the selected item was not found, exit
if (!$itemObj || !(is_object($xoopsUser)) || $itemObj->getVar('uid') != $xoopsUser->getVar('uid')) {
	redirect_header("javascript:history.go(-1)", 1, _NOPERM);
	exit();
}

if ($itemid == 0) {
	redirect_header("index.php", 2, _MD_SSECTION_NOITEMSELECTED);
	exit();
} else {
	$itemObj =& new SmartsectionItem($itemid);
}
$false = false;
switch ($op) {
	case "uploadfile";
	smartsection_upload_file(false, true, $false);
	exit;
	break;

	case "uploadanother";
	smartsection_upload_file(true, false, $false);
	exit;
	break;

	case 'form':
	default:

	$xoopsOption['template_main'] = 'smartsection_addfile.html';
	include_once(XOOPS_ROOT_PATH . "/header.php");
	include_once("footer.php");

	$name = ($xoopsUser) ? (ucwords($xoopsUser->getVar("uname"))) : 'Anonymous';

	$xoopsTpl->assign('module_home', smartsection_module_home());

	$xoopsTpl->assign('categoryPath', _MD_SSECTION_ADD_FILE);
	$xoopsTpl->assign('lang_intro_title', sprintf(_MD_SSECTION_ADD_FILE_TITLE, $smartsection_moduleName));
	$xoopsTpl->assign('lang_intro_text',  _MD_SSECTION_GOODDAY . "<b>$name</b>, " . sprintf(_MD_SSECTION_ADD_FILE_INTRO, $itemObj->title()));

	include_once 'include/fileform.inc.php';

	include_once XOOPS_ROOT_PATH . '/footer.php';
	break;
}

?>