<?php
require_once '../../../include/cp_header.php' ;
include "../include/read_configs.php" ;
include_once XOOPS_ROOT_PATH."/modules/$mydirname/include/functions.php" ;
include_once XOOPS_ROOT_PATH."/modules/$mydirname/include/gtickets.php" ;

global $xoopsDB ;
if( isset( $_GET['lid'] ) ) {
	$lid = intval( $_GET['lid' ] ) ;
	$result = $xoopsDB->query("SELECT submitter FROM $table_photos where lid=$lid",0);
	list( $submitter ) = $xoopsDB->fetchRow( $result ) ;
} else {
	$submitter = $xoopsUser ;
}

if( ! $isadmin ) {
	redirect_header( XOOPS_URL."/" , 3 , _NOPERM ) ;
	exit ;
}

if( file_exists("../language/".$xoopsConfig['language']."/main.php") ) {
	include("../language/".$xoopsConfig['language']."/main.php");
} else {
	include("../language/english/main.php");
}
?>