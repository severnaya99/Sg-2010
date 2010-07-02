<?php
include("admin_header.php");

xoops_cp_header();
myalbum_opentable() ;

restore_error_handler() ;
error_reporting( E_ALL ) ;

if( imagecreatetruecolor(200,200) ) {
	echo _AM_MB_GD2SUCCESS ;
}

myalbum_closetable() ;
xoops_cp_footer();

?>