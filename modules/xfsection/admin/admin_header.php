<?php
// $Id: admin_header.php,v 1.2 2005/06/20 15:03:23 ohwada Exp $

// 2003/10/11 K.OHWADA
// easy to rename module and table
//   add conf.php

include("../../../mainfile.php");
include_once(XOOPS_ROOT_PATH."/class/xoopsmodule.php");
include(XOOPS_ROOT_PATH."/include/cp_functions.php");

include_once("../conf.php");	// add

if ( $xoopsUser ) {

// easy to rename module and table
//	$xoopsModule = XoopsModule::getByDirname("xfsection");
	$xoopsModule = XoopsModule::getByDirname($wfsModule);

	if ( !$xoopsUser->isAdmin($xoopsModule->mid()) ) {
		redirect_header(XOOPS_URL."/",3,_NOPERM);
		exit();
	}
} else {
	redirect_header(XOOPS_URL."/",3,_NOPERM);
	exit();
}
if ( file_exists("../language/".$xoopsConfig['language']."/admin.php") ) {
	include("../language/".$xoopsConfig['language']."/admin.php");
} else {
	include("../language/english/admin.php");
}
if ( file_exists("../language/".$xoopsConfig['language']."/main.php") ) {
        include("../language/".$xoopsConfig['language']."/main.php");
} else {
        include("../language/english/main.php");
}


?>
