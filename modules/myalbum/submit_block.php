<?php
// ------------------------------------------------------------------------- //
//                      myAlbum-P - XOOPS photo album                        //
//                        <http://www.peak.ne.jp/>     
// 							su server					                      //
// ------------------------------------------------------------------------- //

include( 'header.php' ) ;
include_once( XOOPS_ROOT_PATH . '/class/xoopstree.php' ) ;
include_once( 'class/myuploader.php' ) ;
include_once( 'class/myalbum.textsanitizer.php' ) ;

$id_foto_principale_tmp = empty( $_GET['id_foto_principale'] ) ? 0 : intval( $_GET['id_foto_principale'] ) ;

$result = $xoopsDB->query("SELECT * FROM $table_photos WHERE lid = ".$id_foto_principale_tmp." AND submitter = ".$xoopsUser->getVar('uid')."");
$RowsNum = $xoopsDB->getRowsNum($result);
if ($RowsNum == 0 && $id_foto_principale_tmp != 0) {
redirect_header("../../user.php?op=logout", 5 , "Non puoi fare questo!");
exit();
} else {
	$myrow_cid = $xoopsDB->fetchArray($result);
	$cid_tmp = $myrow_cid['cid'];
}

//global $xoopsUser;
// inizio hack limite foto - slyss
//Hack by Danilo Tomasino (aka Dantom)
//Non permette l'inserimento di piu di $totaleFoto nell'album
if($xoopsUser) {
$totaleFoto = 1000;
$result = $xoopsDB->query("SELECT * FROM $table_photos WHERE submitter = ".$xoopsUser->getVar('uid')."");
$RowsNum = $xoopsDB->getRowsNum($result);
if($RowsNum > $totaleFoto -1 )
{
redirect_header("../../modules/smartprofile/userinfo.php?uid=".$xoopsUser->getVar('uid')."", 5 , "Non puoi inserire piu di ".$totaleFoto." immagine/i nel tuo profilo");
exit();
}
}
// fine hack limite foto - slyss

$myts =& MyAlbumTextSanitizer::getInstance() ;
$cattree = new XoopsTree( $table_cat , "cid" , "pid" ) ;

// GET variables
$caller = @$_GET['caller'] == 'imagemanager' ? 'imagemanager' : '' ;

// POST variables
$preview_name = empty( $_POST['preview_name'] ) ? '' : $_POST['preview_name'] ;


// check INSERTABLE
if( ! ( $global_perms & GPERM_INSERTABLE ) ) {
	redirect_header( XOOPS_URL."/user.php" , 2 , _ALBM_MUSTREGFIRST ) ;
	exit ;
}

// check Categories exist
$result = $xoopsDB->query( "SELECT count(cid) as count FROM $table_cat" ) ;
list( $count ) = $xoopsDB->fetchRow( $result ) ;
if( $count < 1 ) {
	redirect_header( XOOPS_URL."/modules/$mydirname/" , 2 , _ALBM_MUSTADDCATFIRST ) ;
	exit ;
}

// check file_uploads = on
if( ! ini_get( "file_uploads" ) ) $file_uploads_off = true ;

// get flag of safe_mode
$safe_mode_flag = ini_get( "safe_mode" ) ;

// check or make photos_dir
if( ! is_dir( $photos_dir ) ) {
	if( $safe_mode_flag ) {
		redirect_header(XOOPS_URL."/modules/$mydirname/",10,"At first create & chmod 777 '$photos_dir' by ftp or shell.");
		exit ;
	}

	$rs = mkdir( $photos_dir , 0777 ) ;
	if( ! $rs ) {
		redirect_header(XOOPS_URL."/modules/$mydirname/",10,"$photos_dir is not a directory");
		exit ;
	} else @chmod( $photos_dir , 0777 ) ;
}

// check or make thumbs_dir
if( $myalbum_makethumb && ! is_dir( $thumbs_dir ) ) {
	if( $safe_mode_flag ) {
		redirect_header(XOOPS_URL."/modules/$mydirname/",10,"At first create & chmod 777 '$thumbs_dir' by ftp or shell.");
		exit ;
	}

	$rs = mkdir( $thumbs_dir , 0777 ) ;
	if( ! $rs ) {
		redirect_header(XOOPS_URL."/modules/$mydirname/",10,"$thumbs_dir is not a directory");
		exit ;
	} else @chmod( $thumbs_dir , 0777 ) ;
}

// check or set permissions of photos_dir
if( ! is_writable( $photos_dir ) || ! is_readable( $photos_dir ) ) {
	$rs = chmod( $photos_dir , 0777 ) ;
	if( ! $rs ) {
		redirect_header(XOOPS_URL."/modules/$mydirname/",5,"chmod 0777 into $photos_dir failed");
		exit ;
	}
}

// check or set permissions of thumbs_dir
if( $myalbum_makethumb && ! is_writable( $thumbs_dir ) ) {
	$rs = chmod( $thumbs_dir , 0777 ) ;
	if( ! $rs ) {
		redirect_header(XOOPS_URL."/modules/$mydirname/",5,"chmod 0777 into $thumbs_dir failed");
		exit ;
	}
}


if( ! empty( $_POST['submit'] ) ) {

	// Ticket Check
	if ( ! $xoopsGTicket->check() ) {
		redirect_header(XOOPS_URL.'/',3,$xoopsGTicket->getErrors());
	}

	$submitter = $my_uid ;

	$cid = empty( $_POST['cid'] ) ? 0 : intval( $_POST['cid'] ) ;
	$newid = $xoopsDB->genId( $table_photos."_lid_seq" ) ;

	// Check if cid is valid
	if( $cid <= 0 ) {
		redirect_header( 'submit.php' , 2 , 'Category is not specified.' ) ;
		exit ;
	}

	// Check if upload file name specified
	$field = $_POST["xoops_upload_file"][0] ;
	if( empty( $field ) || $field == "" ) {
		die( "UPLOAD error: file name not specified" ) ;
	}
	$field = $_POST['xoops_upload_file'][0] ;

	if( $_FILES[$field]['name'] == '' ) {
		// No photo uploaded

		if( trim( $_POST["title"] ) === "" ) {
			$_POST['title'] = 'no title' ;
		}

		if( $preview_name != '' && is_readable( "$photos_dir/$preview_name" ) ) {
			$tmp_name = $preview_name ;
		} else {
			if( empty( $myalbum_allownoimage ) ) {
				redirect_header( 'submit.php' , 2 , _ALBM_NOIMAGESPECIFIED ) ;
				exit ;
			} else {
				@copy( "$mod_path/images/pixel_trans.gif" , "$photos_dir/pixel_trans.gif" ) ;
				$tmp_name = 'pixel_trans.gif' ;
			}
		}

	} else if( $_FILES[$field]['tmp_name'] == "" ) {
		// Fail to upload (wrong file name etc.)
		redirect_header( 'submit.php' , 2 , _ALBM_FILEERROR ) ;
		exit ;

	} else {
		if( $myalbum_canresize ) $uploader = new MyXoopsMediaUploader( $photos_dir , $array_allowed_mimetypes , $myalbum_fsize , null , null , $array_allowed_exts ) ;
		else $uploader = new MyXoopsMediaUploader( $photos_dir , $array_allowed_mimetypes , $myalbum_fsize , $myalbum_width , $myalbum_height , $array_allowed_exts ) ;

		$uploader->setPrefix( 'tmp_' ) ;
		if( $uploader->fetchMedia( $field ) && $uploader->upload() ) {
			// Succeed to upload

			// The original file name will be the title if title is empty
			if( trim( $_POST["title"] ) === "" ) {
				$_POST['title'] = $uploader->getMediaName() ;
			}

			$tmp_name = $uploader->getSavedFileName() ;

		} else {
			// Fail to upload (sizeover etc.)
			include(XOOPS_ROOT_PATH."/header.php");

			echo $uploader->getErrors();
			@unlink( $uploader->getSavedDestination() ) ;

			include( XOOPS_ROOT_PATH . "/footer.php" ) ;
			exit ;
		}
	}

	if( ! is_readable( "$photos_dir/$tmp_name" ) ) {
		redirect_header( 'submit.php' , 2 , _ALBM_FILEREADERROR ) ;
		exit ;
	}

	$title = $myts->stripSlashesGPC( $_POST["title"] ) ;
	$desc_text = $myts->stripSlashesGPC( $_POST["desc_text"] ) ;
	//$date = time() ;
	
	$giorni_asta = empty( $_POST['giorni_asta'] ) ? 0 : intval( $_POST['giorni_asta'] ) ;

	if($giorni_asta == 0) $date = time() ;
		else if($giorni_asta == 10) $date = time() + (86400*10) ;
			else if($giorni_asta == 7) $date = time() + (86400*7) ;
				else if($giorni_asta == 5) $date = time() + (86400*5) ;
					else if($giorni_asta == 1) $date = time() + (86400*1) ;

	$ext = substr( strrchr( $tmp_name , '.' ) , 1 ) ;
	$status = ( $global_perms & GPERM_SUPERINSERT ) ? 1 : 0 ;

	$prezzo = empty( $_POST['prezzo'] ) ? 0 : intval( $_POST['prezzo'] ) ;

	$RowsNum = 0;
	$id_foto_principale = empty( $_POST['id_foto_principale'] ) ? 0 : intval( $_POST['id_foto_principale'] ) ;
	if($id_foto_principale != 0) {
		$result = $xoopsDB->query("SELECT * FROM $table_photos WHERE submitter = ".$xoopsUser->getVar('uid')." AND lid = ".$id_foto_principale."");
		$RowsNum = $xoopsDB->getRowsNum($result);
		$myrow = $xoopsDB->fetchArray($result);
	}
	if($RowsNum > 0) $sql = "INSERT INTO $table_photos (lid, cid, title, ext, submitter, status, date, hits, rating, votes, comments) VALUES ($newid, $cid, '".addslashes($title)."', '$ext', $submitter, $status, $date, '$id_foto_principale', '$prezzo', 0, 0)";
		else { 
		$sql = "INSERT INTO $table_photos (lid, cid, title, ext, submitter, status, date, hits, rating, votes, comments) VALUES ($newid, $cid, '".addslashes($title)."', '$ext', $submitter, $status, $date, 0, '$prezzo', 0, 0)";
		$id_foto_principale = $newid;
		}

	$xoopsDB->query( $sql ) or die( "DB error: INSERT photo table" ) ;
	if( $newid == 0 ) {
		$newid = $xoopsDB->getInsertId();
	}

	myalbum_modify_photo( "$photos_dir/$tmp_name" , "$photos_dir/$newid.$ext" ) ;
	$dim = GetImageSize( "$photos_dir/$newid.$ext" ) ;
	if( $dim ) $xoopsDB->query( "UPDATE $table_photos SET res_x='{$dim[0]}', res_y='{$dim[1]}' WHERE lid='$newid'") ;

	if( ! myalbum_create_thumb( "$photos_dir/$newid.$ext" , $newid , $ext ) ) {
		$xoopsDB->query( "DELETE FROM $table_photos WHERE lid=$newid" ) ;
		redirect_header( 'submit.php' , 2 , _ALBM_FILEREADERROR ) ;
		exit ;
	}

	$xoopsDB->query( "INSERT INTO $table_text (lid, description) VALUES ($newid, '".addslashes($desc_text)."')") or die( "DB error: INSERT text table" ) ;

	// Update User's Posts (Should be modified when need admission.)
	$user_handler =& xoops_gethandler('user') ;
	$submitter_obj =& $user_handler->get( $submitter ) ;
	for( $i = 0 ; $i < $myalbum_addposts ; $i ++ ) {
		$submitter_obj->incrementPost() ;
	}

	// Trigger Notification
	if( $status ) {
		$notification_handler =& xoops_gethandler( 'notification' ) ;

		// Global Notification
		$notification_handler->triggerEvent( 'global' , 0 , 'new_photo' , array( 'PHOTO_TITLE' => $title , 'PHOTO_URI' => "$mod_url/photo.php?lid=$newid&cid=$cid" ) ) ;

		// Category Notification
		$rs = $xoopsDB->query( "SELECT title FROM $table_cat WHERE cid=$cid" ) ;
		list( $cat_title ) = $xoopsDB->fetchRow( $rs ) ;
		$notification_handler->triggerEvent( 'category' , $cid , 'new_photo' , array( 'PHOTO_TITLE' => $title , 'CATEGORY_TITLE' => $cat_title , 'PHOTO_URI' => "$mod_url/photo.php?lid=$newid&cid=$cid" ) ) ;
	}

	// Clear tempolary files
	myalbum_clear_tmp_files( $photos_dir ) ;

	//riga qui sotto modificata da slyss
	$redirect_uri = "viewcat.php?cid=$cid&amp;orderby=dateD" ;
	//$redirect_uri = "../../user.php" ;
	if( $caller == 'imagemanager' ) $redirect_uri = 'close.php' ;
	//redirect_header( $redirect_uri , 2 , _ALBM_RECEIVED ) ;
	//redirect_header( XOOPS_URL.'/userinfo.php?uid=".$xoopsUser->getvar("uid")."' , 2 , "MESSAGGIO...." ) ;

	if($id_foto_principale == 0) $id_foto_principale = $newid;
	redirect_header("../../modules/myalbum/prodotto_dettaglio.php?id_prodotto=".$id_foto_principale, 5 , "Grazie per aver inserito un oggetto!");
	exit () ;
}



// Editing Display

if( $caller == 'imagemanager' ) {
	echo "<html><head>
		<link rel='stylesheet' type='text/css' media='all' href='".XOOPS_URL."/xoops.css' />
		<link rel='stylesheet' type='text/css' media='all' href='".XOOPS_URL."/modules/system/style.css' />
		<meta http-equiv='content-type' content='text/html; charset="._CHARSET." />
		<meta http-equiv='content-language' content='"._LANGCODE."' />
		</head><body>\n" ;
} else {
	include( XOOPS_ROOT_PATH . "/header.php" ) ;
	OpenTable() ;
	myalbum_header() ;
}

include_once( "../../class/xoopsformloader.php" ) ;
include_once( "../../include/xoopscodes.php" ) ;


// Preview
if( $caller != 'imagemanager' && ! empty( $_POST['preview'] ) ) {
	$photo['description'] = $myts->stripSlashesGPC( $_POST["desc_text"] ) ;
	$photo['title'] = $myts->stripSlashesGPC( $_POST["title"] ) ;
	$photo['cid'] = empty( $_POST['cid'] ) ? 0 : intval( $_POST['cid'] ) ;

	$field = $_POST['xoops_upload_file'][0] ;
	if( is_readable( $_FILES[$field]['tmp_name'] ) ) {
		// new preview
		if( $myalbum_canresize ) $uploader = new MyXoopsMediaUploader( $photos_dir , $array_allowed_mimetypes , $myalbum_fsize , null , null , $array_allowed_exts ) ;
		else $uploader = new MyXoopsMediaUploader( $photos_dir , $array_allowed_mimetypes , $myalbum_fsize , $myalbum_width , $myalbum_height , $array_allowed_exts ) ;
		$uploader->setPrefix( 'tmp_' ) ;
		if( $uploader->fetchMedia( $field ) && $uploader->upload() ) {
			$tmp_name = $uploader->getSavedFileName() ;
			$preview_name = str_replace( 'tmp_' , 'tmp_prev_' , $tmp_name ) ;
			myalbum_modify_photo( "$photos_dir/$tmp_name" , "$photos_dir/$preview_name" ) ;
			list( $imgsrc , $width_spec , $ahref ) = myalbum_get_img_attribs_for_preview( $preview_name ) ;
		} else {
			@unlink( $uploader->getSavedDestination() ) ;
			$imgsrc = "$mod_url/images/pixel_trans.gif" ;
			$width_spec = "width='$myalbum_thumbsize' height='$myalbum_thumbsize'" ;
			$ahref = '' ;
		}
	} else if( $preview_name != '' && is_readable( "$photos_dir/$preview_name" ) ) {
		// old preview
		list( $imgsrc , $width_spec , $ahref ) = myalbum_get_img_attribs_for_preview( $preview_name ) ;
	} else {
		// preview without image
		$imgsrc = "$mod_url/images/pixel_trans.gif" ;
		$width_spec = "width='$myalbum_thumbsize' height='$myalbum_thumbsize'" ;
		$ahref = '' ;
	}

	// Display Preview
	$photo_for_tpl = array(
		'description' => $myts->displayTarea( $photo['description'] , 0 , 1 , 1 , 1 , 1 , 1 ) ,
		'title' => $myts->makeTboxData4Show( $photo['title'] ) ,
		'width_spec' => $width_spec ,
		'submitter' => $my_uid ,
		'submitter_name' => myalbum_get_name_from_uid( $my_uid ) ,
		'imgsrc_thumb' => $imgsrc ,
		'ahref_photo' => $ahref
	) ;
	$tpl = new XoopsTpl() ;
	include( 'include/assign_globals.php' ) ;
	$tpl->assign( $myalbum_assign_globals ) ;
	$tpl->assign( 'photo' , $photo_for_tpl ) ;
	echo "<table class='outer' style='width:100%;'>" ;
	$tpl->display( "db:myalbum{$mydirnumber}_photo_in_list.html" ) ;
	echo "</table>\n" ;

} else {
	$photo = array(
		'cid' => ( empty( $_GET['cid'] ) ? 0 : intval( $_GET['cid'] ) ) ,
		'description' => '' ,
		'title' => ''
	) ;
}


// Show the form
$form = new XoopsThemeForm( _ALBM_PHOTOUPLOAD , "uploadphoto" , "submit.php?caller=$caller" ) ;
$pixels_text = "$myalbum_width x $myalbum_height" ;
if( $myalbum_canresize ) $pixels_text .= " (auto resize)" ;
$pixels_label = new XoopsFormLabel( _ALBM_MAXPIXEL , $pixels_text ) ;
$size_label = new XoopsFormLabel( _ALBM_MAXSIZE , $myalbum_fsize . ( empty( $file_uploads_off ) ? "" : ' &nbsp; <b>"file_uploads" off</b>' ) ) ;
$form->setExtra( "enctype='multipart/form-data'" ) ;

$title_text = new XoopsFormText( _ALBM_PHOTOTITLE , "title" , 50 , 255 , $myts->makeTboxData4Edit( $photo['title'] ) ) ;

$prezzo_text = new XoopsFormText( "Prezzo base &euro; (es. 29,00)" , "prezzo" , 10 , 255  ) ;


/*
$cat_select = new XoopsFormSelect( _ALBM_PHOTOCAT , "cid" , $photo['cid'] ) ;
//riga qui sotto commentata da slyss
$cat_select->addOption( '' , '----' ) ;
$tree = $cattree->getChildTreeArray( 0 , "title" ) ;
foreach( $tree as $leaf ) {
	$leaf['prefix'] = substr( $leaf['prefix'] , 0 , -1 ) ;
	$leaf['prefix'] = str_replace( "." , "--" , $leaf['prefix'] ) ;
	$cat_select->addOption( $leaf['cid'] , $leaf['prefix'] . $leaf['title'] ) ;
}
*/

$cat_select = new XoopsFormSelect( "Tipo oggetto" , "cid"  ) ;
$cat_select->addOption( "" , "----" ) ;
$cat_select->addOption( "2" , "Tavole" ) ;
$cat_select->addOption( "3" , "Attacchi" ) ;
$cat_select->addOption( "1" , "Scarponi" ) ;
$cat_select->addOption( "4" , "Altro" ) ;


//$cat_select = new XoopsFormHidden( "cid" , 1 ) ;

/*
$nuova_foto = new XoopsFormSelect( "Nuovo prodotto o foto aggiuntiva?" , "id_foto_principale"  ) ;
$nuova_foto->addOption( '' , 'Nuovo Prodotto' ) ;

$result = $xoopsDB->query("SELECT * FROM $table_photos WHERE submitter = ".$xoopsUser->getVar('uid')." AND hits = '0' ORDER BY lid DESC");

while($myrow = $xoopsDB->fetchArray($result)) {
	$nuova_foto->addOption( $myrow['lid'] , ">>> ".$myrow['title'] ) ;
}
*/

$nuova_foto = new XoopsFormHidden( "id_foto_principale" , $_GET['id_foto_principale'] ) ;

$giorni_asta = new XoopsFormSelect( "Durata dell'asta?" , "giorni_asta"  ) ;
$giorni_asta->addOption( "10" , "10 giorni" ) ;
$giorni_asta->addOption( "7" , "7 giorni" ) ;
$giorni_asta->addOption( "5" , "5 giorni" ) ;
$giorni_asta->addOption( "1" , "1 giorno" ) ;


/* $cat_link = new XoopsFormLabel( "<a href='javascript:location.href=\"viewcat.php?cid=\"+document.uploadphoto.cid.value;'>"._GO."</a>" ) ;
$cat_tray = new XoopsFormElementTray( _ALBM_PHOTOCAT , '&nbsp;' ) ;
$cat_tray->addElement( $cat_select ) ;
$cat_tray->addElement( $cat_link ) ; */

//$desc_tarea = new XoopsFormDhtmlTextArea( _ALBM_PHOTODESC , "desc_text" , $myts->makeTareaData4Edit( $photo['description'] ) , 10 , 50 ) ;
$desc_tarea = new XoopsFormTextArea( _ALBM_PHOTODESC , "desc_text" , $myts->makeTareaData4Edit( $photo['description'] ) , 10 , 50 ) ;

$file_form = new XoopsFormFile( _ALBM_SELECTFILE , "photofile" , $myalbum_fsize ) ;
$file_form->setExtra( "size='30'" ) ;

if( $myalbum_canrotate ) {
	$rotate_radio = new XoopsFormRadio( _ALBM_RADIO_ROTATETITLE , 'rotate' , 'rot0' ) ;
	$rotate_radio->addOption( 'rot0' , _ALBM_RADIO_ROTATE0." &nbsp; " ) ;
	$rotate_radio->addOption( 'rot90' , "<img src='images/icon_rotate90.gif' alt='"._ALBM_RADIO_ROTATE90."' title='"._ALBM_RADIO_ROTATE90."' /> &nbsp; " ) ;
	$rotate_radio->addOption( 'rot180' , "<img src='images/icon_rotate180.gif' alt='"._ALBM_RADIO_ROTATE180."' title='"._ALBM_RADIO_ROTATE180."' /> &nbsp; " ) ;
	$rotate_radio->addOption( 'rot270' , "<img src='images/icon_rotate270.gif' alt='"._ALBM_RADIO_ROTATE270."' title='"._ALBM_RADIO_ROTATE270."' /> &nbsp; " ) ;
}

$op_hidden = new XoopsFormHidden( "op" , "submit" ) ;
$counter_hidden = new XoopsFormHidden( "fieldCounter" , 1 ) ;
$preview_hidden = new XoopsFormHidden( "preview_name" , htmlspecialchars( $preview_name ) , ENT_QUOTES ) ;

$submit_button = new XoopsFormButton( "" , "submit" , _SUBMIT , "submit" ) ;
$preview_button = new XoopsFormButton( "" , "preview" , _PREVIEW , "submit" ) ;
$reset_button = new XoopsFormButton( "" , "reset" , _CANCEL , "reset" ) ;
$submit_tray = new XoopsFormElementTray( '' ) ;
//riga qui sotto commentata da slyss
//if( $caller != 'imagemanager' ) $submit_tray->addElement( $preview_button ) ;
$submit_tray->addElement( $submit_button ) ;
$submit_tray->addElement( $reset_button ) ;

//$form->addElement( $pixels_label ) ;
//$form->addElement( $size_label ) ;
//riga qui sotto commentata da slyss
if($id_foto_principale_tmp == 0) $form->addElement( $title_text ) ;
//$size_label = 'ATTENZIONE: se state inserendo più foto per un singolo prodotto, ricordate di inserire lo stesso identico titolo in tutte le foto inserite relative a tale prodotto.' ;
//$form->addElement( $size_label ) ;
if( $caller != 'imagemanager' && $id_foto_principale_tmp == 0) $form->addElement( $desc_tarea ) ;
$form->addElement( $nuova_foto ) ;
$id_foto_principale = empty( $_GET['id_foto_principale'] ) ? 0 : intval( $_GET['id_foto_principale'] ) ;
if($id_foto_principale == 0) { $form->addElement( $prezzo_text ) ; $form->addElement( $giorni_asta ) ; }
if($id_foto_principale == 0) { $form->addElement( $cat_select ) ; $form->setRequired( $cat_select ) ; } else { $cat_select = new XoopsFormHidden( "cid" , $cid_tmp ) ; $form->addElement( $cat_select ) ; }
$form->addElement( $file_form ) ;
//if( $myalbum_canrotate ) $form->addElement( $rotate_radio ) ;
$form->addElement( $preview_hidden ) ;
$form->addElement( $counter_hidden ) ;
$form->addElement( $op_hidden ) ;
$form->addElement( $submit_tray ) ;
// $form->setRequired( $file_form ) ;

// Ticket
$GLOBALS['xoopsGTicket']->addTicketXoopsFormElement( $form , __LINE__ ) ;

$form->display() ;

if( $caller == 'imagemanager' ) {
	echo "</body></html>" ;
} else {
	CloseTable() ;
	myalbum_footer() ;
	include( XOOPS_ROOT_PATH . "/footer.php" ) ;
}

?>