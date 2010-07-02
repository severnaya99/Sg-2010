<?php

include_once("../../mainfile.php");
/*
include_once(XOOPS_ROOT_PATH . "/"."include/cp_functions.php");
include_once(XOOPS_ROOT_PATH . "/"."class/xoopsmodule.php");
include_once(XOOPS_ROOT_PATH . "/"."class/xoopsgroup.php");
$xoopsModule = XoopsModule::getByDirname("uskolaxgallery");

if ( !$xoopsModule ) {
	redirect_header(XOOPS_URL."/",2,_MODULENOEXIST);
	exit();
}

if ( $xoopsUser ) {
	if ( !XoopsGroup::hasAccessRight($xoopsModule->mid(), $xoopsUser->groups()) ) {
		redirect_header(XOOPS_URL."/",2,_NOPERM);
		exit();
	}
} else {
	if ( !XoopsGroup::hasAccessRight($xoopsModule->mid(), 0) ) {
		redirect_header(XOOPS_URL."/",2,_NOPERM);
		exit();
	}
}

*/

if ( file_exists(XOOPS_ROOT_PATH . "/"."modules/uskolaxgallery/language/".$xoopsConfig['language']."/modinfo.php") ) {
	include_once(XOOPS_ROOT_PATH . "/"."modules/uskolaxgallery/language/".$xoopsConfig['language']."/modinfo.php");
}else{
	include_once(XOOPS_ROOT_PATH . "/"."modules/uskolaxgallery/language/emglish/modinfo.php");
}






?>
