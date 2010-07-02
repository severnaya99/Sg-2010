<?php
// ------------------------------------------------------------------------- //
//                      myAlbum-P - XOOPS photo album                        //
//                        <http://www.peak.ne.jp/>                           //
// ------------------------------------------------------------------------- //

include 'header.php' ;
include_once XOOPS_ROOT_PATH . '/class/xoopstree.php' ;
include_once 'class/myuploader.php' ;
include_once 'class/myalbum.textsanitizer.php' ;

$myts =& MyAlbumTextSanitizer::getInstance() ;
$cattree = new XoopsTree( $table_cat , 'cid' , 'pid' ) ;

$lid = empty( $_GET['lid'] ) ? 0 : intval( $_GET['lid'] ) ;

$result = $xoopsDB->query( "SELECT submitter FROM $table_photos WHERE lid='$lid'" ) ;
list( $submitter ) = $xoopsDB->fetchRow( $result ) ;

if( $global_perms & GPERM_EDITABLE ) {
	if( $my_uid != $submitter && ! $isadmin ) {
		redirect_header( $mod_url.'/' , 3 , _NOPERM ) ;
		exit ;
	}
} else {
	redirect_header( $mod_url.'/' , 3 , _NOPERM ) ;
	exit ;
}


// Do Delete
if( ! empty( $_POST['do_delete'] ) ) {

	if( ! ( $global_perms & GPERM_DELETABLE ) ) {
		redirect_header( $mod_url.'/' , 3 , _NOPERM ) ;
		exit ;
	}

	// Ticket Check
	if ( ! $xoopsGTicket->check() ) {
		redirect_header(XOOPS_URL.'/',3,$xoopsGTicket->getErrors());
	}

	// get and check lid is valid
	if( $lid < 1 ) die( "Invalid photo id." ) ;

	$whr = "lid=$lid" ;
	if( ! $isadmin ) $whr .= " AND submitter=$my_uid" ;

	myalbum_delete_photos( $whr ) ;

	redirect_header( $mod_url.'/' , 3 , _ALBM_DELETINGPHOTO ) ;
	exit ;
}


// Confirm Delete
if( ! empty( $_POST['conf_delete'] ) ) {

	if( ! ( $global_perms & GPERM_DELETABLE ) ) {
		redirect_header( $mod_url.'/' , 3 , _NOPERM ) ;
		exit ;
	}

	include( XOOPS_ROOT_PATH."/include/cp_functions.php" ) ;
	include_once( "../../header.php" ) ;
	OpenTable() ;

	$result = $xoopsDB->query( "SELECT l.ext FROM $table_photos l WHERE l.lid=$lid" ) ;
	list( $ext ) = $xoopsDB->fetchRow( $result ) ;
	if( ! in_array( strtolower( $ext ) , $myalbum_normal_exts ) ) $ext = 'gif' ;

	echo "
	<h4>"._ALBM_PHOTODEL."</h4>
	<div>
		<img src='$thumbs_url/$lid.$ext' />
		<br />
		<form action='editphoto.php?lid=$lid' method='post'>
			".$xoopsGTicket->getTicketHtml( __LINE__ )."
			<input type='submit' name='do_delete' value='"._YES."' />
			<input type='submit' name='cancel_delete' value="._NO." />
		</form>
	</div>
	\n" ;

	CloseTable() ;
	include( XOOPS_ROOT_PATH . "/footer.php" ) ;
	exit ;
}


// Do Modify
if( ! empty( $_POST['submit'] ) ) {

	// Ticket Check
	if ( ! $xoopsGTicket->check() ) {
		redirect_header(XOOPS_URL.'/',3,$xoopsGTicket->getErrors());
	}

	if( empty( $_POST['submitter'] ) ) {
		$submitter = $my_uid ;
	} else {
		$submitter = intval( $_POST['submitter'] ) ;
	}

	// status change
	if( $isadmin ) {
		$valid = empty( $_POST['valid'] ) ? 0 : intval( $_POST['valid'] ) ;
		if( empty( $_POST['old_status'] ) ) {
			if( $valid == 0 ) $valid = null ;
			else $valid = 1 ;
		} else {
			if( $valid == 0 ) $valid = 0 ;
			else $valid = 2 ;
		}
	} else {
		$valid = 2 ;
	}

	$cid = empty( $_POST['cid'] ) ? 0 : intval( $_POST['cid'] ) ;

	// Check if upload file name specified
	$field = $_POST["xoops_upload_file"][0] ;
	if( empty( $field ) || $field == "" ) {
		die( "UPLOAD error: file name not specified" ) ;
	}
	$field = $_POST['xoops_upload_file'][0] ;

	// Check if file uploaded
	if ( $_FILES[$field]['tmp_name'] != "" && $_FILES[$field]['tmp_name'] != "none" ) {
		if( $myalbum_canresize ) $uploader = new MyXoopsMediaUploader( $photos_dir , $array_allowed_mimetypes , $myalbum_fsize , null , null , $array_allowed_exts ) ;
		else $uploader = new MyXoopsMediaUploader( $photos_dir , $array_allowed_mimetypes , $myalbum_fsize , $myalbum_width , $myalbum_height , $array_allowed_exts ) ;

		$uploader->setPrefix( 'tmp_' ) ;
		if( $uploader->fetchMedia( $field ) && $uploader->upload() ) {

			// remove old file.
			$prs = $xoopsDB->query( "SELECT ext FROM $table_photos WHERE lid=$lid") ;
			list( $ext ) = $xoopsDB->fetchRow( $prs ) ;
			@unlink( "$photos_dir/$lid.$ext");
			@unlink( "$thumbs_dir/$lid.$ext");
			@unlink( "$thumbs_dir/$lid.gif");

			// The original file name will be the title if title is empty
			if( trim( $_POST["title"] ) === "" ) {
				$_POST['title'] = $uploader->getMediaName() ;
			}

			$title = $myts->stripSlashesGPC( $_POST["title"] ) ;
			$desc_text = $myts->stripSlashesGPC( $_POST["desc_text"] ) ;
			$date = time() ;
			$tmp_name = $uploader->getSavedFileName() ;
			$ext = substr( strrchr( $tmp_name , '.' ) , 1 ) ;

			myalbum_modify_photo( "$photos_dir/$tmp_name" , "$photos_dir/$lid.$ext" ) ;
			$dim = GetImageSize( "$photos_dir/$lid.$ext");
			if( ! $dim ) $dim = array( 0 , 0 ) ;

			if( ! myalbum_create_thumb( "$photos_dir/$lid.$ext" , $lid , $ext ) ) {
				$xoopsDB->query( "DELETE FROM $table_photos WHERE lid='$lid'" ) ;
				redirect_header( 'editphoto.php?lid=$lid' , 10 , _ALBM_FILEERROR ) ;
				exit ;
			}
			myalbum_update_photo( $lid , $cid , $title , $desc_text , $valid , $ext , $dim[0] , $dim[1] ) ;
			exit ;
		} else {
			$uploader->getErrors( true ) ;
			include_once( "../../header.php" ) ;
			OpenTable() ;
			echo "<p><strong>::Errors occured::</strong></p>\n" ;
			echo $uploader->getErrors( true ) ;
			CloseTable();
			include( XOOPS_ROOT_PATH . "/footer.php" ) ;
			exit ;
		}
	} else {  //update without file upload
		// Check if title is blank
		if( trim( $_POST["title"] ) === "" ) {
			$_POST['title'] = 'no title' ;
		}
		$title = $myts->stripSlashesGPC( $_POST["title"] ) ;
		$desc_text = $myts->stripSlashesGPC( $_POST["desc_text"] ) ;
		$cid = intval( $_POST['cid'] ) ;
		myalbum_update_photo( $lid , $cid , $title , $desc_text , $valid ) ;
		exit ;
	}

}


// Editing Display
include(XOOPS_ROOT_PATH."/header.php");
OpenTable() ;
myalbum_header() ;

include_once( "../../class/xoopsformloader.php" ) ;
include_once( "../../include/xoopscodes.php" ) ;

// Get the record
$result = $xoopsDB->query( "SELECT l.lid, l.cid, l.title, l.ext, l.res_x, l.res_y, l.status, l.date, l.hits, l.rating, l.votes, l.comments, l.submitter, t.description FROM $table_photos l LEFT JOIN $table_text t ON l.lid=t.lid WHERE l.lid=$lid" ) ;
$photo = $xoopsDB->fetchArray( $result ) ;

// Preview
if( ! empty( $_POST['preview'] ) ) {
	$photo['description'] = $myts->stripSlashesGPC( $_POST["desc_text"] ) ;
	$photo['title'] = $myts->stripSlashesGPC( $_POST["title"] ) ;
}

// Display
$photo_for_tpl = myalbum_get_array_for_photo_assign( $photo ) ;
$tpl = new XoopsTpl() ;
include( 'include/assign_globals.php' ) ;
$tpl->assign( $myalbum_assign_globals ) ;
$tpl->assign( 'photo' , $photo_for_tpl ) ;
echo "<table class='outer' style='width:100%;'>" ;
$tpl->display( "db:myalbum{$mydirnumber}_photo_in_list.html" ) ;
echo "</table>\n" ;

// Show the form
$form = new XoopsThemeForm( _ALBM_PHOTOEDITUPLOAD , "uploadphoto", "editphoto.php?lid=$lid" ) ;
$form->setExtra("enctype='multipart/form-data'");

$title_text = new XoopsFormText( _ALBM_PHOTOTITLE , "title" , 50 , 255 , $myts->makeTboxData4Edit( $photo['title'] ) ) ;

$cat_select = new XoopsFormSelect( '' , "cid" , $photo['cid'] ) ;
$tree = $cattree->getChildTreeArray( 0 , "title" ) ;
foreach( $tree as $leaf ) {
	$leaf['prefix'] = substr( $leaf['prefix'] , 0 , -1 ) ;
	$leaf['prefix'] = str_replace( "." , "--" , $leaf['prefix'] ) ;
	$cat_select->addOption( $leaf['cid'] , $leaf['prefix'] . $leaf['title'] ) ;
}

$cat_link = new XoopsFormLabel( "<a href='javascript:location.href=\"viewcat.php?cid=\"+document.uploadphoto.cid.value;'>"._GO."</a>" ) ;
$cat_tray = new XoopsFormElementTray( _ALBM_PHOTOCAT , '&nbsp;' ) ;
$cat_tray->addElement( $cat_select ) ;
$cat_tray->addElement( $cat_link ) ;

$desc_tarea = new XoopsFormDhtmlTextArea( _ALBM_PHOTODESC , "desc_text" , $myts->makeTareaData4Edit( $photo['description'] ) , 10 , 50 ) ;

$file_form = new XoopsFormFile( _ALBM_SELECTFILE , "photofile" , $myalbum_fsize ) ;
$file_form->setExtra( "size='70'" ) ;

if( $myalbum_canrotate ) {
	$rotate_radio = new XoopsFormRadio( _ALBM_RADIO_ROTATETITLE , 'rotate' , 'rot0' ) ;
	$rotate_radio->addOption( 'rot0' , _ALBM_RADIO_ROTATE0." &nbsp; " ) ;
	$rotate_radio->addOption( 'rot90' , "<img src='images/icon_rotate90.gif' alt='"._ALBM_RADIO_ROTATE90."' title='"._ALBM_RADIO_ROTATE90."' /> &nbsp; " ) ;
	$rotate_radio->addOption( 'rot180' , "<img src='images/icon_rotate180.gif' alt='"._ALBM_RADIO_ROTATE180."' title='"._ALBM_RADIO_ROTATE180."' /> &nbsp; " ) ;
	$rotate_radio->addOption( 'rot270' , "<img src='images/icon_rotate270.gif' alt='"._ALBM_RADIO_ROTATE270."' title='"._ALBM_RADIO_ROTATE270."' /> &nbsp; " ) ;
}

$op_hidden = new XoopsFormHidden( "op" , "submit" ) ;
$counter_hidden = new XoopsFormHidden( "fieldCounter" , 1 ) ;
$status_hidden = new XoopsFormHidden( "old_status" , $photo['status'] ) ;
$valid_or_not = empty( $photo['status'] ) ? 0 : 1 ;
$valid_box = new XoopsFormCheckBox( _ALBM_VALIDPHOTO , "valid" , array( $valid_or_not ) ) ;
$valid_box->addOption( '1' , '&nbsp;' ) ;

$storets_box = new XoopsFormCheckBox( _ALBM_STORETIMESTAMP , "store_timestamp" , array( 0 ) ) ;
$storets_box->addOption( '1' , '&nbsp;' ) ;

$submit_button = new XoopsFormButton( "" , "submit" , _SUBMIT , "submit" ) ;
$preview_button = new XoopsFormButton( "" , "preview" , _PREVIEW , "submit" ) ;
$reset_button = new XoopsFormButton( "" , "reset" , _CANCEL , "reset" ) ;
$submit_tray = new XoopsFormElementTray( '' ) ;
$submit_tray->addElement( $preview_button ) ;
$submit_tray->addElement( $submit_button ) ;
$submit_tray->addElement( $reset_button ) ;
if( $global_perms & GPERM_DELETABLE ) {
	$delete_button = new XoopsFormButton( "" , "conf_delete" , _DELETE , "submit" ) ;
	$submit_tray->addElement( $delete_button ) ;
}

$form->addElement( $title_text ) ;
$form->addElement( $desc_tarea ) ;
$form->addElement( $cat_tray ) ;
$form->addElement( $file_form ) ;
if( $myalbum_canrotate ) $form->addElement( $rotate_radio ) ;
$form->addElement( $counter_hidden ) ;
$form->addElement( $op_hidden ) ;
if( $isadmin ) {
	$form->addElement( $valid_box ) ;
	$form->addElement( $storets_box ) ;
	$form->addElement( $status_hidden ) ;
}
$form->addElement( $submit_tray ) ;

// Ticket
$GLOBALS['xoopsGTicket']->addTicketXoopsFormElement( $form , __LINE__ ) ;

$form->display() ;
CloseTable() ;
myalbum_footer() ;

include( XOOPS_ROOT_PATH . "/footer.php" ) ;

?>