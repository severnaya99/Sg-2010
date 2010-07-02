<?php
// ------------------------------------------------------------------------- //
//                      myAlbum-P - XOOPS photo album                        //
//                        <http://www.peak.ne.jp/>                           //
// ------------------------------------------------------------------------- //

include "admin_header.php" ;
include_once XOOPS_ROOT_PATH.'/modules/system/constants.php' ;

// GPCS vars

$myts =& MyTextSanitizer::getInstance() ;

// reject Not Admin
if( ! $isadmin ) {
	redirect_header( $mod_url.'/' , 2 , _ALBM_MUSTREGFIRST ) ;
	exit ;
}


//
// Exec Part
//


// From myalbum*
if( ! empty( $_POST['myalbum_import'] ) && ! empty( $_POST['cid'] ) ) {

	// Ticket Check
	if ( ! $xoopsGTicket->check() ) {
		redirect_header(XOOPS_URL.'/',3,$xoopsGTicket->getErrors());
	}

	// get src module
	$src_cid = intval( $_POST['cid'] ) ;
	$src_dirname = empty( $_POST['src_dirname'] ) ? '' : $_POST['src_dirname'] ;
	if( $mydirname == $src_dirname ) die( "source dirname is same as dest dirname: " . htmlspecialchars( $src_dirname ) )  ;

	if( ! preg_match( '/^(\D+)(\d*)$/' , $src_dirname , $regs ) ) echo ( "invalid dirname: " . htmlspecialchars( $src_dirname ) ) ;
	$src_dirnumber = $regs[2] === '' ? '' : intval( $regs[2] ) ;

	$module =& $module_handler->getByDirname( $src_dirname ) ;
	if( ! is_object( $module ) ) die( "invalid module dirname:" . htmlspecialchars( $src_dirname ) )  ;
	$src_mid = $module->getvar( 'mid' ) ;

	// authority check
	if( ! $xoopsUser->isAdmin( $src_mid ) ) exit ;

	// read configs from xoops_config directly
	$rs = $xoopsDB->query( "SELECT conf_name,conf_value FROM ".$xoopsDB->prefix('config')." WHERE conf_modid='$src_mid'" ) ;
	while( list( $key , $val ) = $xoopsDB->fetchRow( $rs ) ) {
		$src_configs[ $key ] = $val ;
	}
	$src_photos_dir = XOOPS_ROOT_PATH . $src_configs['myalbum_photospath'] ;
	$src_thumbs_dir = XOOPS_ROOT_PATH . $src_configs['myalbum_thumbspath'] ;
	// src table names
	$src_table_photos = $xoopsDB->prefix( "myalbum{$src_dirnumber}_photos" ) ;
	$src_table_cat = $xoopsDB->prefix( "myalbum{$src_dirnumber}_cat" ) ;
	$src_table_text = $xoopsDB->prefix( "myalbum{$src_dirnumber}_text" ) ;
	$src_table_votedata = $xoopsDB->prefix( "myalbum{$src_dirnumber}_votedata" ) ;

	if( isset( $_POST['copyormove'] ) && $_POST['copyormove'] == 'move' ) $move_mode = true ;
	else $move_mode = false ;

	// create category
	$xoopsDB->query( "INSERT INTO $table_cat (pid, title, imgurl) SELECT '0',title,imgurl FROM $src_table_cat WHERE cid='$src_cid'") or die( "DB error: INSERT cat table" ) ;
	$cid = $xoopsDB->getInsertId() ;

	// INSERT loop
	$rs = $xoopsDB->query( "SELECT lid,ext FROM $src_table_photos WHERE cid='$src_cid'" ) ;
	$import_count = 0 ;
	while( list( $src_lid , $ext ) = $xoopsDB->fetchRow( $rs ) ) {

		// photos table
		$set_comments = $move_mode ? 'comments' : "'0'" ;
		$sql = "INSERT INTO $table_photos (cid,title,ext,res_x,res_y,submitter,status,date,hits,rating,votes,comments) SELECT '$cid',title,ext,res_x,res_y,submitter,status,date,hits,rating,votes,$set_comments FROM $src_table_photos WHERE lid='$src_lid'" ;
		$xoopsDB->query( $sql ) or die( "DB error: INSERT photo table" ) ;
		$lid = $xoopsDB->getInsertId() ;

		// text table
		$sql = "INSERT INTO $table_text (lid,description) SELECT '$lid',description FROM $src_table_text WHERE lid='$src_lid'" ;
		$xoopsDB->query( $sql ) ;

		// votedata table
		$sql = "INSERT INTO $table_votedata (lid,ratinguser,rating,ratinghostname,ratingtimestamp) SELECT '$lid',ratinguser,rating,ratinghostname,ratingtimestamp FROM $src_table_votedata WHERE lid='$src_lid'" ;
		$xoopsDB->query( $sql ) ;

		@copy( "$src_photos_dir/{$src_lid}.{$ext}" , "$photos_dir/{$lid}.{$ext}" ) ;
		if( in_array( strtolower( $ext ) , $myalbum_normal_exts ) ) {
			@copy( "$src_thumbs_dir/{$src_lid}.{$ext}" , "$thumbs_dir/{$lid}.{$ext}" ) ;
		} else {
			@copy( "$src_photos_dir/{$src_lid}.gif" , "$photos_dir/{$lid}.gif" ) ;
			@copy( "$src_thumbs_dir/{$src_lid}.gif" , "$thumbs_dir/{$lid}.gif" ) ;		}

		// exec only moving mode
		if( $move_mode ) {
			// moving comments
			$sql = "UPDATE ".$xoopsDB->prefix('xoopscomments')." SET com_modid='$myalbum_mid',com_itemid='$lid' WHERE com_modid='$src_mid' AND com_itemid='$src_lid'" ;
			$xoopsDB->query( $sql ) ;

			// delete source photos
			list( $photos_dir , $thumbs_dir , $myalbum_mid , $table_photos , $table_text , $table_votedata ,  $saved_photos_dir , $saved_thumbs_dir , $saved_myalbum_mid , $saved_table_photos , $saved_table_text , $saved_table_votedata ) = array(  $src_photos_dir , $src_thumbs_dir , $src_mid , $src_table_photos , $src_table_text , $src_table_votedata , $photos_dir , $thumbs_dir , $myalbum_mid , $table_photos , $table_text , $table_votedata ) ;
			myalbum_delete_photos( "lid='$src_lid'" ) ;
			list( $photos_dir , $thumbs_dir , $myalbum_mid , $table_photos , $table_text , $table_votedata ) = array( $saved_photos_dir , $saved_thumbs_dir , $saved_myalbum_mid , $saved_table_photos , $saved_table_text , $saved_table_votedata ) ;		}

		$import_count ++ ;
	}

	redirect_header( 'import.php' , 2 , sprintf( _AM_FMT_IMPORTSUCCESS , $import_count ) ) ;
	exit ;
}


// From imagemanager
else if( ! empty( $_POST['imagemanager_import'] ) && ! empty( $_POST['imgcat_id'] ) ) {

	// authority check
	$sysperm_handler =& xoops_gethandler('groupperm');
	if( ! $sysperm_handler->checkRight('system_admin', XOOPS_SYSTEM_IMAGE, $xoopsUser->getGroups() ) ) exit ;

	// Ticket Check
	if ( ! $xoopsGTicket->check() ) {
		redirect_header(XOOPS_URL.'/',3,$xoopsGTicket->getErrors());
	}

	// get src information
	$src_cid = intval( $_POST['imgcat_id'] ) ;
	$src_table_photos = $xoopsDB->prefix( "image" ) ;
	$src_table_cat = $xoopsDB->prefix( "imagecategory" ) ;

	// create category
	$crs = $xoopsDB->query( "SELECT imgcat_name,imgcat_storetype FROM $src_table_cat WHERE imgcat_id='$src_cid'" ) ;
	list( $imgcat_name , $imgcat_storetype ) = $xoopsDB->fetchRow( $crs ) ;

	$xoopsDB->query( "INSERT INTO $table_cat SET pid=0,title='".addslashes($imgcat_name)."'" ) or die( "DB error: INSERT cat table" ) ;
	$cid = $xoopsDB->getInsertId() ;

	// INSERT loop
	$rs = $xoopsDB->query( "SELECT image_id,image_name,image_nicename,image_created,image_display FROM $src_table_photos WHERE imgcat_id='$src_cid'" ) ;
	$import_count = 0 ;
	while( list( $image_id,$image_name,$image_nicename,$image_created,$image_display ) = $xoopsDB->fetchRow( $rs ) ) {

		$src_file = XOOPS_UPLOAD_PATH . "/$image_name" ;
		$ext = substr( strrchr( $image_name , '.' ) , 1 ) ;

		// photos table
		$sql = "INSERT INTO $table_photos SET cid='$cid',title='".addslashes($image_nicename)."',ext='$ext',submitter='$my_uid',status='$image_display',date='$image_created'" ;
		$xoopsDB->query( $sql ) or die( "DB error: INSERT photo table" ) ;
		$lid = $xoopsDB->getInsertId() ;

		// text table
		$sql = "INSERT INTO $table_text SET lid='$lid',description=''" ;
		$xoopsDB->query( $sql ) ;

		$dst_file = "$photos_dir/{$lid}.{$ext}" ;
		if( $imgcat_storetype == 'db' ) {
			$fp = fopen( $dst_file , "wb" ) ;
			if( $fp == false ) continue ;
			$brs = $xoopsDB->query( "SELECT image_body FROM ".$xoopsDB->prefix("imagebody")." WHERE image_id='$image_id'" ) ;
			list( $body ) = $xoopsDB->fetchRow( $brs ) ;
			fwrite( $fp , $body ) ;
			fclose( $fp ) ;
			myalbum_create_thumb( $dst_file , $lid , $ext ) ;
		} else {
			@copy( $src_file , $dst_file ) ;
			myalbum_create_thumb( $src_file , $lid , $ext ) ;
		}

		list( $width , $height , $type ) = getimagesize( $dst_file ) ;
		$xoopsDB->query( "UPDATE $table_photos SET res_x='$width',res_y='$height' WHERE lid='$lid'" ) ;

		$import_count ++ ;
	}

	redirect_header( 'import.php' , 2 , sprintf( _AM_FMT_IMPORTSUCCESS , $import_count ) ) ;
	exit ;
}





//
// Form Part
//
xoops_cp_header() ;
include( './mymenu.php' ) ;
echo "<h3 style='text-align:left;'>".sprintf(_AM_H3_FMT_IMPORTTO,$xoopsModule->name())."</h3>\n" ;


// From myalbum*
$mrs = $xoopsDB->query( "SELECT dirname FROM ".$xoopsDB->prefix("modules")." WHERE dirname like 'myalbum%'" ) ;
// get all instances of TinyD using newblocks table
$mrs = $xoopsDB->query( "SELECT distinct dirname FROM ".$xoopsDB->prefix("newblocks")." WHERE func_file='myalbum_rphoto.php'" ) ;
while( list( $src_dirname ) = $xoopsDB->fetchRow( $mrs ) ) {
	if( $mydirname == $src_dirname ) continue ;

	$module =& $module_handler->getByDirname( $src_dirname ) ;
	if( ! is_object( $module ) ) continue ;

	if( ! $xoopsUser->isAdmin( $module->getVar('mid') ) ) continue ;

	if( ! preg_match( '/^(\D+)(\d*)$/' , $src_dirname , $regs ) ) echo ( "invalid dirname: " . htmlspecialchars( $src_dirname ) ) ;
	$src_dirnumber = $regs[2] === '' ? '' : intval( $regs[2] ) ;

	$myalbum_cat_options = myalbum_get_cat_options( 'title' , 0 , '--' , '----' , $xoopsDB->prefix( "myalbum{$src_dirnumber}_cat" ) , $xoopsDB->prefix( "myalbum{$src_dirnumber}_photos" ) ) ;

	myalbum_opentable() ;
	echo "
		<h4>".sprintf(_AM_FMT_IMPORTFROMMYALBUMP,$module->name())."</h4>
		<form name='$src_dirname' action='import.php' method='POST'>
		".$xoopsGTicket->getTicketHtml( __LINE__ )."
		<input type='hidden' name='src_dirname' value='$src_dirname' />
		<input type='radio' name='copyormove' value='copy' checked='checked' />"._AM_RADIO_IMPORTCOPY." &nbsp; 
		<input type='radio' name='copyormove' value='move' />"._AM_RADIO_IMPORTMOVE."<br /><br />
		<!-- <input type='checkbox' name='import_recursively' />"._AM_CB_IMPORTRECURSIVELY."<br /><br /> -->
		<select name='cid'>
			$myalbum_cat_options
		</select>
		<input type='submit' name='myalbum_import' value='"._GO."' onclick='return confirm(\""._AM_MB_IMPORTCONFIRM."\");' />
		</form>\n" ;
	myalbum_closetable() ;
	echo "<br />" ;
}


// From imagemanager
$sysperm_handler =& xoops_gethandler('groupperm');
if( $sysperm_handler->checkRight('system_admin', XOOPS_SYSTEM_IMAGE, $xoopsUser->getGroups() ) ) {
	// only when user has admin right of system 'imagemanager'
	$irs = $xoopsDB->query( "SELECT c.imgcat_id,c.imgcat_name,COUNT(i.image_id) AS imgcat_sum FROM ".$xoopsDB->prefix("imagecategory")." c NATURAL LEFT JOIN ".$xoopsDB->prefix("image")." i GROUP BY c.imgcat_id ORDER BY c.imgcat_weight" ) ;
	$imgcat_options = '' ;
	while( list( $imgcat_id,$imgcat_name,$imgcat_sum ) = $xoopsDB->fetchRow( $irs ) ) {
		$imgcat_options .= "<option value='$imgcat_id'>$imgcat_name ($imgcat_sum)</option>\n" ;
	}
	myalbum_opentable() ;
	echo "
		<h4>"._AM_FMT_IMPORTFROMIMAGEMANAGER."</h4>
		<form name='ImageManager' action='import.php' method='POST'>
		".$xoopsGTicket->getTicketHtml( __LINE__ )."
		<select name='imgcat_id'>
			$imgcat_options
		</select>
		<input type='submit' name='imagemanager_import' value='"._GO."' onclick='return confirm(\""._AM_MB_IMPORTCONFIRM."\");' />
		</form>\n" ;
	myalbum_closetable() ;
	echo "<br />" ;
}



xoops_cp_footer() ;

?>