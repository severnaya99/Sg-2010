<?php

	if( ! defined( 'XOOPS_ROOT_PATH' ) ) exit ;

	$mydirname = basename( dirname( dirname( __FILE__ ) ) ) ;
	if( ! preg_match( '/^(\D+)(\d*)$/' , $mydirname , $regs ) ) echo ( "invalid dirname: " . htmlspecialchars( $mydirname ) ) ;
	$mydirnumber = $regs[2] === '' ? '' : intval( $regs[2] ) ;

	global $xoopsConfig , $xoopsDB , $xoopsUser ;

	// module information
	$mod_url = XOOPS_URL . "/modules/$mydirname" ;
	$mod_path = XOOPS_ROOT_PATH . "/modules/$mydirname" ;
	$mod_copyright = "<a href='http://xoops.peak.ne.jp/'><strong>myAlbum-P 2.9</strong></a> &nbsp; <span style='font-size:0.8em;'>(<a href='http://bluetopia.homeip.net/'>original</a>)</span>" ;

	// global langauge file
	$language = $xoopsConfig['language'] ;
	if ( file_exists( "$mod_path/language/$language/myalbum_constants.php" ) ) {
		include_once "$mod_path/language/$language/myalbum_constants.php" ;
	} else {
		include_once "$mod_path/language/english/myalbum_constants.php" ;
		$language = "english" ;
	}

	// read from xoops_config
	// get my mid
	$rs = $xoopsDB->query( "SELECT mid FROM ".$xoopsDB->prefix('modules')." WHERE dirname='$mydirname'" ) ;
	list( $myalbum_mid ) = $xoopsDB->fetchRow( $rs ) ;

	// read configs from xoops_config directly
	$rs = $xoopsDB->query( "SELECT conf_name,conf_value FROM ".$xoopsDB->prefix('config')." WHERE conf_modid=$myalbum_mid" ) ;
	while( list( $key , $val ) = $xoopsDB->fetchRow( $rs ) ) {
		$myalbum_configs[ $key ] = $val ;
	}

	foreach( $myalbum_configs as $key => $val ) {
		if( strncmp( $key , "myalbum_" , 8 ) == 0 ) $$key = $val ;
	}

	// User Informations
	if( empty( $xoopsUser ) ) {
		$my_uid = 0 ;
		$isadmin = false ;
	} else {
		$my_uid = $xoopsUser->uid() ;
		$isadmin = $xoopsUser->isAdmin( $myalbum_mid ) ;
	}

	// Value Check
	$myalbum_addposts = intval( $myalbum_addposts ) ;
	if( $myalbum_addposts < 0 ) $myalbum_addposts = 0 ;

	// Path to Main Photo & Thumbnail ;
	if( ord( $myalbum_photospath ) != 0x2f ) $myalbum_photospath = "/$myalbum_photospath" ;
	if( ord( $myalbum_thumbspath ) != 0x2f ) $myalbum_thumbspath = "/$myalbum_thumbspath" ;
	$photos_dir = XOOPS_ROOT_PATH . $myalbum_photospath ;
	$photos_url = XOOPS_URL . $myalbum_photospath ;
	if( $myalbum_makethumb ) {
		$thumbs_dir = XOOPS_ROOT_PATH . $myalbum_thumbspath ;
		$thumbs_url = XOOPS_URL . $myalbum_thumbspath ;
	} else {
		$thumbs_dir = $photos_dir ;
		$thumbs_url = $photos_url ;
	}

	// DB table name
	$table_photos = $xoopsDB->prefix( "myalbum{$mydirnumber}_photos" ) ;
	$table_cat = $xoopsDB->prefix( "myalbum{$mydirnumber}_cat" ) ;
	$table_text = $xoopsDB->prefix( "myalbum{$mydirnumber}_text" ) ;
	$table_votedata = $xoopsDB->prefix( "myalbum{$mydirnumber}_votedata" ) ;
	$table_comments = $xoopsDB->prefix( "xoopscomments" ) ;

	// Pipe environment check
	if( $myalbum_imagingpipe || function_exists( 'imagerotate' ) ) $myalbum_canrotate = true ;
	else $myalbum_canrotate = false ;
	if( $myalbum_imagingpipe || $myalbum_forcegd2 ) $myalbum_canresize = true ;
	else $myalbum_canresize = false ;

	// Normal Extensions of Image
	$myalbum_normal_exts = array( 'jpg' , 'jpeg' , 'gif' , 'png' ) ;

	// Allowed extensions & MIME types
	if( empty( $myalbum_allowedexts ) ) {
		$array_allowed_exts = $myalbum_normal_exts ;
	} else {
		$array_allowed_exts = explode( '|' , $myalbum_allowedexts ) ;
	}
	if( empty( $myalbum_allowedmime ) ) {
		$array_allowed_mimetypes = array() ;
	} else {
		$array_allowed_mimetypes = explode( '|' , $myalbum_allowedmime ) ;
	}
?>
