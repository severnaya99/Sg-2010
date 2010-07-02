<?php

/**
* $Id: common.php 3433 2008-07-05 10:24:09Z malanciault $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

if (!defined("XOOPS_ROOT_PATH")) {
 	die("XOOPS root path not defined");
}

if( !defined("SMARTSECTION_DIRNAME") ){
	define("SMARTSECTION_DIRNAME", 'smartsection');
}

if( !defined("SMARTSECTION_URL") ){
	define("SMARTSECTION_URL", XOOPS_URL.'/modules/'.SMARTSECTION_DIRNAME.'/');
}
if( !defined("SMARTSECTION_ROOT_PATH") ){
	define("SMARTSECTION_ROOT_PATH", XOOPS_ROOT_PATH.'/modules/'.SMARTSECTION_DIRNAME.'/');
}

if( !defined("SMARTSECTION_IMAGES_URL") ){
	define("SMARTSECTION_IMAGES_URL", SMARTSECTION_URL.'/images/');
}

/** Configuring the module level of available features
 *
 * 0  = light mode
 * 10 = full mode
 */
if( !defined("SMARTSECTION_LEVEL") ){
	define("SMARTSECTION_LEVEL", 10);
}


// include common language files
global $xoopsConfig;
$common_lang_file = SMARTSECTION_ROOT_PATH . "language/" . $xoopsConfig['language'] . "/common.php";
if (!file_exists($common_lang_file)) {
	$common_lang_file = SMARTSECTION_ROOT_PATH . "language/english/common.php";
}
include_once($common_lang_file);
;
// include smartobject framework
if (!file_exists(XOOPS_ROOT_PATH . '/modules/smartobject/include/common.php')) {
	trigger_error( 'SmartObject Framework not found.', E_USER_ERROR );
}
include_once(XOOPS_ROOT_PATH . '/modules/smartobject/include/common.php');

include_once(SMARTSECTION_ROOT_PATH . "include/functions.php");

// Check XOOPS version to see if we are on XOOPS 2.2.x plateform
$xoops22 = smartsection_isXoops22();

include_once(SMARTSECTION_ROOT_PATH . "include/seo_functions.php");
include_once(SMARTSECTION_ROOT_PATH . "class/keyhighlighter.class.php");

// Creating the SmartModule object
$smartModule =& smartsection_getModuleInfo();

// Find if the user is admin of the module
$smartsection_isAdmin = smartsection_userIsAdmin();

$smartsection_moduleName = $smartModule->getVar('name');

// Creating the SmartModule config Object
$smartConfig =& smartsection_getModuleConfig();

include_once SMARTSECTION_ROOT_PATH . "class/smartmetagen.php";

include_once(SMARTSECTION_ROOT_PATH . "class/permission.php");
include_once(SMARTSECTION_ROOT_PATH . "class/category.php");
include_once(SMARTSECTION_ROOT_PATH . "class/item.php");
include_once(SMARTSECTION_ROOT_PATH . "class/file.php");
include_once(SMARTSECTION_ROOT_PATH . "class/session.php");

// Creating the item handler object
$smartsection_item_handler =& xoops_getmodulehandler('item', SMARTSECTION_DIRNAME);

// Creating the category handler object
$smartsection_category_handler =& xoops_getmodulehandler('category', SMARTSECTION_DIRNAME);

// Creating the permission handler object
$smartsection_permission_handler =& xoops_getmodulehandler('permission', SMARTSECTION_DIRNAME);

// Creating the file handler object
$smartsection_file_handler =& xoops_getmodulehandler('file', SMARTSECTION_DIRNAME);

// get current page
$smartsection_current_page = smartsection_getCurrentPage();

?>