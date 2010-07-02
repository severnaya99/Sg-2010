<?php
// ------------------------------------------------------------------------- //
//                      myAlbum-P - XOOPS photo album                        //
//                        <http://www.peak.ne.jp/>                           //
// ------------------------------------------------------------------------- //

function display_edit_form( $cat_array , $form_title , $action )
{
	global $cattree ;

	$myts =& MyTextSanitizer::getInstance();

	extract( $cat_array ) ;

	// Beggining of XoopsForm
	$form = new XoopsThemeForm( $form_title , 'MainForm' , '' ) ;

	// Hidden
	$form->addElement( new XoopsFormHidden( 'action' , $action ) ) ;
	$form->addElement( new XoopsFormHidden( 'cid' , $cid ) ) ;

	// Title
	$form->addElement( new XoopsFormText( _AM_CAT_TH_TITLE , 'title' , 30 , 50 , $myts->htmlSpecialChars( $title ) ) , true ) ;

	// Image URL
	$form->addElement( new XoopsFormText( _AM_CAT_TH_IMGURL , 'imgurl' , 50 , 150 , $myts->htmlSpecialChars( $imgurl ) ) ) ;

	// Parent Category
	ob_start() ;
	$cattree->makeMySelBox( "title" , "title" , $pid , 1 , 'pid' ) ;
	$cat_selbox = ob_get_contents() ;
	ob_end_clean() ;
	$form->addElement( new XoopsFormLabel( _AM_CAT_TH_PARENT , $cat_selbox ) ) ;

	// Buttons
	$button_tray = new XoopsFormElementTray( '' , '&nbsp;' ) ;
	$button_tray->addElement( new XoopsFormButton( '' , 'submit' , _SUBMIT, 'submit' ) ) ;
	$button_tray->addElement( new XoopsFormButton( '' , 'reset' , _CANCEL, 'reset' ) ) ;
	$form->addElement( $button_tray ) ;

	// Ticket
	$GLOBALS['xoopsGTicket']->addTicketXoopsFormElement( $form , __LINE__ ) ;

	// End of XoopsForm
	$form->display();
}


function mysql_get_sql_set( $cols )
{
	$myts =& MyTextSanitizer::getInstance();

	$ret = "" ;

	foreach( $cols as $col => $types ) {

		list( $field , $lang , $essential ) = explode( ':' , $types ) ;

		// Undefined col is regarded as ''
		$data = empty( $_POST[ $col ] ) ? '' : $myts->stripSlashesGPC( $_POST[ $col ] ) ;

		// Check if essential 
		if( $essential && ! $data ) {
			die( sprintf( "Error: %s is not set" , $col ) ) ;
		}

		// Language
		switch( $lang ) {
			case 'N' :	// Number (remove ,)
				$data = str_replace( "," , "" , $data ) ;
				break ;
			case 'J' :	// Japanese
				$data = mb_convert_kana( $data , "KV" ) ;
				break ;
			case 'E' :	// English
				// $data = mb_convert_kana( $data , "as" ) ;
				$data = $data ;
				break ;
		}

		// DataType
		switch( $field ) {
			case 'A' :	// textarea
				$data = addslashes( $data ) ;
				$ret .= "$col='$data'," ;
				break ;
			case 'I' :	// integer
				$data = intval( $data ) ;
				$ret .= "$col='$data'," ;
				break ;
			case 'F' :	// float
				$data = doubleval( $data ) ;
				$ret .= "$col='$data'," ;
				break ;
			default :	// varchar (default)
				if( $field < 1 ) $field = 255 ;
				if( function_exists( 'mb_strcut' ) ) $data = mb_strcut( $data , 0 , $field ) ;
				$data = addslashes( $data ) ;
				$ret .= "$col='$data'," ;
		}
	}

	// Remove ',' in the tale of sql
	$ret = substr( $ret , 0 , -1 ) ;

	return $ret ;
}





include "admin_header.php" ;
require_once XOOPS_ROOT_PATH . "/include/xoopscodes.php" ;
include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
include_once XOOPS_ROOT_PATH."/class/xoopslists.php";
include_once XOOPS_ROOT_PATH."/class/xoopstree.php" ;
include_once XOOPS_ROOT_PATH."/class/xoopscomments.php" ;


// branch for altsys
if( defined( 'XOOPS_TRUST_PATH' ) && ! empty( $_GET['lib'] ) ) {
	$mydirname = basename( dirname( dirname( __FILE__ ) ) ) ;
	$mydirpath = dirname( dirname( __FILE__ ) ) ;

	// common libs (eg. altsys)
	$lib = preg_replace( '/[^a-zA-Z0-9_-]/' , '' , $_GET['lib'] ) ;
	$page = preg_replace( '/[^a-zA-Z0-9_-]/' , '' , @$_GET['page'] ) ;
	
	if( file_exists( XOOPS_TRUST_PATH.'/libs/'.$lib.'/'.$page.'.php' ) ) {
		include XOOPS_TRUST_PATH.'/libs/'.$lib.'/'.$page.'.php' ;
	} else if( file_exists( XOOPS_TRUST_PATH.'/libs/'.$lib.'/index.php' ) ) {
		include XOOPS_TRUST_PATH.'/libs/'.$lib.'/index.php' ;
	} else {
		die( 'wrong request' ) ;
	}
	exit ;
}


// GPCS vars
$action = isset( $_POST[ 'action' ] ) ? $_POST[ 'action' ] : '' ;
$disp = isset( $_GET[ 'disp' ] ) ? $_GET[ 'disp' ] : '' ;
$cid = isset( $_GET[ 'cid' ] ) ? intval( $_GET[ 'cid' ] ) : 0 ;

// Initializations
$myts =& MyTextSanitizer::getInstance();
$cattree = new XoopsTree( $table_cat , "cid" , "pid" ) ;


//
// DB part
//
if( $action == "insert" ) {

	// Ticket Check
	if ( ! $xoopsGTicket->check() ) {
		redirect_header(XOOPS_URL.'/',3,$xoopsGTicket->getErrors());
	}

	// newly insert
	$sql = "INSERT INTO $table_cat SET " ;
	$cols = array( "pid" => "I:N:0" ,"title" => "50:E:1" ,"imgurl" => "150:E:0" ) ;
	$sql .= mysql_get_sql_set( $cols ) ;
	$xoopsDB->query( $sql ) or die( "DB Error: insert category" ) ;

	// Check if cid == pid
	$cid = $xoopsDB->getInsertId() ;
	if( $cid == intval( $_POST['pid'] ) ) {
		$xoopsDB->query( "UPDATE $table_cat SET pid='0' WHERE cid='$cid'" ) ;
	}

	redirect_header( "index.php" , 1 , _AM_CAT_INSERTED ) ;
	exit ;

} else if( $action == "update" && ! empty( $_POST['cid'] ) ) {

	// Ticket Check
	if ( ! $xoopsGTicket->check() ) {
		redirect_header(XOOPS_URL.'/',3,$xoopsGTicket->getErrors());
	}

	$cid = intval( $_POST['cid'] ) ;
	$pid = intval( $_POST['pid'] ) ;

	// Check if new pid was a child of cid
	if( $pid != 0 ) {
		$children = $cattree->getAllChildId( $cid ) ;
		$children[] = $cid ;
		foreach( $children as $child ) {
			if( $child == $pid ) die( "category looping has occurred" ) ;
		}
	}

	// update
	$sql = "UPDATE $table_cat SET " ;
	$cols = array( "pid" => "I:N:0" ,"title" => "50:E:1" ,"imgurl" => "150:E:0" ) ;
	$sql .= mysql_get_sql_set( $cols ) . " WHERE cid='$cid'" ;
	$xoopsDB->query( $sql ) or die( "DB Error: update category" ) ;
	redirect_header( "index.php" , 1 , _AM_CAT_UPDATED ) ;
	exit ;

} else if( ! empty( $_POST['delcat'] ) ) {

	// Ticket Check
	if ( ! $xoopsGTicket->check() ) {
		redirect_header(XOOPS_URL.'/',3,$xoopsGTicket->getErrors());
	}

	// Delete
	$cid = intval( $_POST['delcat'] ) ;

	//get all categories under the specified category
	$children = $cattree->getAllChildId( $cid ) ;
	$whr = "cid IN (" ;
	foreach( $children as $child ) {
		$whr .= "$child," ;
		xoops_notification_deletebyitem( $myalbum_mid , 'category' , $child ) ;
	}
	$whr .= "$cid)" ;
	xoops_notification_deletebyitem( $myalbum_mid , 'category' , $cid ) ;

	myalbum_delete_photos( $whr ) ;

	$xoopsDB->query( "DELETE FROM $table_cat WHERE $whr" ) or die( "DB error: DELETE cat table" ) ;
	redirect_header( 'index.php' , 2 , _ALBM_CATDELETED ) ;
	exit ;

} else if( ! empty( $_POST['batch_update'] ) ) {

	// Batch update

}




//
// Form Part
//
xoops_cp_header() ;
include( './mymenu.php' ) ;

// check $xoopsModule
if( ! is_object( $xoopsModule ) ) redirect_header( "$mod_url/" , 1 , _NOPERM ) ;
echo "<h3 style='text-align:left;'>".sprintf( _AM_H3_FMT_CATEGORIES , $xoopsModule->name() )."</h3>\n" ;

if( $disp == "edit" && $cid > 0 ) {

	// Editing
	$sql = "SELECT cid,pid,title,imgurl FROM $table_cat WHERE cid='$cid'" ;
	$crs = $xoopsDB->query( $sql ) ;
	$cat_array = $xoopsDB->fetchArray( $crs ) ;
	display_edit_form( $cat_array , _AM_CAT_MENU_EDIT , 'update' ) ;

} else if( $disp == "new" ) {

	// New
	$cat_array = array( 'cid' => 0 , 'pid' => $cid , 'title' => '' , 'imgurl' => 'http://' ) ;
	display_edit_form( $cat_array , _AM_CAT_MENU_NEW , 'insert' ) ;

} else {

	// Listing
	$cat_tree_array = $cattree->getChildTreeArray( 0 , 'title' ) ;

	// Get ghost categories
	$live_cids = $cattree->getAllChildId(0);
	$whr_cid = "cid NOT IN (" ;
	foreach( $live_cids as $cid ) {
		$whr_cid .= "$cid," ;
	}
	$whr_cid .= "0)" ;
	$rs = $xoopsDB->query( "SELECT * FROM $table_cat WHERE $whr_cid" ) ;
	if( $xoopsDB->fetchArray( $rs ) != false ) {
		$xoopsDB->queryF( "UPDATE $table_cat SET pid='0' WHERE $whr_cid" ) ;
		redirect_header( 'index.php' , 0 , 'A Ghost Category found.' ) ;
		exit ;
	}

	// Waiting Admission
	$ars = $xoopsDB->query( "SELECT COUNT(*) FROM $table_photos WHERE status=0" ) ;
	list( $waiting ) = $xoopsDB->fetchRow( $ars ) ;
	$link_admission = $waiting > 0 ? sprintf( _AM_CAT_FMT_NEEDADMISSION , $waiting ) : '' ;

	// Top links
	echo "<p><a href='?disp=new&cid=0'>"._AM_CAT_LINK_MAKETOPCAT."<img src='../images/cat_add.gif' width='18' height='15' alt='"._AM_CAT_LINK_MAKETOPCAT."' title='"._AM_CAT_LINK_MAKETOPCAT."' /></a> &nbsp;  &nbsp; <a href='admission.php' style='color:red;'>$link_admission</a></p>\n" ;

	// TH
	echo "
	<form name='MainForm' action='' method='post' style='margin:10px;'>
	".$xoopsGTicket->getTicketHtml( __LINE__ )."
	<input type='hidden' name='delcat' value='' />
	<table width='75%' class='outer' cellpadding='4' cellspacing='1'>
	  <tr valign='middle'>
	    <th>"._AM_CAT_TH_TITLE."</th>
	    <th>"._AM_CAT_TH_PHOTOS."</th>
	    <th>"._AM_CAT_TH_OPERATION."</th>
	    <th nowrap='nowrap'>"._AM_CAT_TH_IMAGE."</th>
	  </tr>
	" ;

	// TD
	$oddeven = 'odd' ;
	foreach( $cat_tree_array as $cat_node ) {
		$oddeven = $oddeven == 'odd' ? 'even' : 'odd' ;
		extract( $cat_node ) ;

		$prefix = str_replace( '.' , '&nbsp;--' , substr( $prefix , 1 ) ) ;
		$cid = intval( $cid ) ;
		$del_confirm = 'confirm("' . sprintf( _AM_CAT_FMT_CATDELCONFIRM , $title ) . '")' ;
		$prs = $xoopsDB->query( "SELECT COUNT(*) FROM $table_photos WHERE cid='$cid'" ) ;
		list( $photos_num ) = $xoopsDB->fetchRow( $prs ) ;
		if( $imgurl && $imgurl != 'http://' ) $imgsrc4show = $myts->htmlSpecialChars( $imgurl ) ;
		else $imgsrc4show = '../images/pixel_trans.gif' ;

		echo "
	  <tr>
	    <td class='$oddeven' width='100%'><a href='photomanager.php?cid=$cid'>$prefix&nbsp;".$myts->htmlSpecialChars($title)."</a></td>
	    <td class='$oddeven' nowrap='nowrap' align='right'>
	      <a href='photomanager.php?cid=$cid'>$photos_num</a>
	      <a href='../submit.php?cid=$cid'><img src='../images/pictadd.gif' width='18' height='15' alt='"._AM_CAT_LINK_ADDPHOTOS."' title='"._AM_CAT_LINK_ADDPHOTOS."' /></a></td>
	    <td class='$oddeven' align='center' nowrap='nowrap'>
	      &nbsp;
	      <a href='?disp=edit&amp;cid=$cid'><img src='../images/cat_edit.gif' width='18' height='15' alt='"._AM_CAT_LINK_EDIT."' title='"._AM_CAT_LINK_EDIT."' /></a>
	      &nbsp;
	      <a href='?disp=new&amp;cid=$cid'><img src='../images/cat_add.gif' width='18' height='15' alt='"._AM_CAT_LINK_MAKESUBCAT."' title='"._AM_CAT_LINK_MAKESUBCAT."' /></a>
	      &nbsp;
	      <input type='button' value='"._DELETE."' onclick='if($del_confirm){document.MainForm.delcat.value=\"$cid\"; submit();}' />
	    </td>
	    <td class='$oddeven' align='center'><img src='$imgsrc4show' height='16' /></td>
	  </tr>\n" ;
	}

	// Table footer
	echo "
	  <!-- <tr>
	    <td colspan='4' align='right' class='foot'><input type='submit' name='batch_update' value='"._AM_CAT_BTN_BATCH."' /></td>
	  </tr> -->
	</table>
	</form>
	" ;
}


xoops_cp_footer();
?>
