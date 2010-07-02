<?php
// $Id: admin_header.php,v 1.2 Date: 06/01/2003, Author: Catzwolf Exp $

include("../../../mainfile.php");
include_once(XOOPS_ROOT_PATH."/class/xoopsmodule.php");
include(XOOPS_ROOT_PATH."/include/cp_functions.php");

if ( $xoopsUser ) {
	$xoopsModule = XoopsModule::getByDirname("wfsection");
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
