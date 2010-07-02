<?php
// ------------------------------------------------------------------------- //
//                      myAlbum-P - XOOPS photo album                        //
//                        <http://www.peak.ne.jp/>                           //
// ------------------------------------------------------------------------- //

include "header.php" ;
$myts =& MyTextSanitizer::getInstance() ; // MyTextSanitizer object
include_once XOOPS_ROOT_PATH."/class/xoopstree.php" ;
$cattree = new XoopsTree( $table_cat , "cid" , "pid" ) ;

// GET variables
$lid = empty( $_GET['lid'] ) ? 0 : intval( $_GET['lid'] ) ;
$cid = empty( $_GET['cid'] ) ? 0 : intval( $_GET['cid'] ) ;

$xoopsOption['template_main'] = "myalbum{$mydirnumber}_photo.html" ;

include XOOPS_ROOT_PATH . "/header.php" ;

if( $global_perms & GPERM_INSERTABLE ) $xoopsTpl->assign( 'lang_add_photo' , _ALBM_ADDPHOTO ) ;
$xoopsTpl->assign( 'lang_album_main' , _ALBM_MAIN ) ;
include( 'include/assign_globals.php' ) ;
$xoopsTpl->assign( $myalbum_assign_globals ) ;

// update hit count
$xoopsDB->queryF( "UPDATE $table_photos SET hits=hits+1 WHERE lid='$lid' AND status>0" ) ;

$prs = $xoopsDB->query( "SELECT l.lid, l.cid, l.title, l.ext, l.res_x, l.res_y, l.status, l.date, l.hits, l.rating, l.votes, l.comments, l.submitter, t.description FROM $table_photos l LEFT JOIN $table_text t ON l.lid=t.lid WHERE l.lid=$lid AND status>0" ) ;
$p = $xoopsDB->fetchArray( $prs ) ;
if( $p == false ) {
	redirect_header( $mod_url.'/' , 3 , _ALBM_NOMATCH ) ;
	exit ;
}
$photo = myalbum_get_array_for_photo_assign( $p ) ;

// <title></title>
$xoopsTpl->assign( 'xoops_pagetitle' , $photo['title'] ) ;

// Middle size calculation
$photo['width_height'] = '' ;
list( $max_w , $max_h ) = explode( 'x' , $myalbum_middlepixel ) ;
if( ! empty( $max_w ) && ! empty( $p['res_x'] ) ) {
	if( empty( $max_h ) ) $max_h = $max_w ;
	if( $max_h / $max_w > $p['res_y'] / $p['res_x'] ) {
		if( $p['res_x'] > $max_w ) $photo['width_height'] = "width='$max_w'" ;
	} else {
		if( $p['res_y'] > $max_h ) $photo['width_height'] = "height='$max_h'" ;
	}
}

$xoopsTpl->assign_by_ref( 'photo' , $photo ) ;

// Category Information
$cid = empty( $p['cid'] ) ? $cid : $p['cid'] ;
$xoopsTpl->assign( 'category_id' , $cid ) ;
$cids = $cattree->getAllChildId( $cid ) ;
$sub_title = preg_replace( "/\'\>/" , "'><img src='$mod_url/images/folder16.gif' alt='' />" , $cattree->getNicePathFromId( $cid , 'title' , "viewcat.php?num=" . intval( $myalbum_perpage )  ) ) ;
$sub_title = preg_replace( "/^(.+)folder16/" , '$1folder_open' , $sub_title ) ;
$xoopsTpl->assign( 'album_sub_title' , $sub_title ) ;

// Orders
include XOOPS_ROOT_PATH."/modules/$mydirname/include/photo_orders.php" ;
if( isset( $_GET['orderby'] ) && isset( $myalbum_orders[ $_GET['orderby'] ] ) ) $orderby = $_GET['orderby'] ;
else if( isset( $myalbum_orders[ $myalbum_defaultorder ] ) ) $orderby = $myalbum_defaultorder ;
else $orderby = 'lidA' ;

// create category navigation
$fullcountresult = $xoopsDB->query( "SELECT lid FROM $table_photos WHERE cid=$cid AND status>0 ORDER BY {$myalbum_orders[$orderby][0]}" ) ;
$ids = array() ;
while( list( $id ) = $xoopsDB->fetchRow( $fullcountresult ) ) {
	$ids[] = $id ;
}

$photo_nav = "" ;
$numrows = count( $ids ) ;
$pos = array_search( $lid , $ids ) ;
if( $numrows > 1 ) {
	// prev mark
	if( $ids[0] != $lid ) {
		$photo_nav .= "<a href='photo.php?lid=".$ids[0]."'><b>[&lt; </b></a>&nbsp;&nbsp;";
		$photo_nav .= "<a href='photo.php?lid=".$ids[$pos-1]."'><b>"._ALBM_PREVIOUS."</b></a>&nbsp;&nbsp;";
	    
	}

	$nwin = 7 ;
	if( $numrows > $nwin ) { // window
		if( $pos > $nwin / 2 ) {
			if( $pos > round( $numrows - ( $nwin / 2 ) - 1 ) ) {
				$start = $numrows - $nwin + 1 ;
			} else {
				$start = round( $pos - ( $nwin / 2 ) ) + 1 ;
			}
		} else {
			$start = 1 ;
		}
	} else {
		$start = 1 ;
	}
	
	for( $i = $start; $i < $numrows + 1 && $i < $start + $nwin ; $i++ ) {
		if( $ids[$i-1] == $lid ) {
			$photo_nav .= "$i&nbsp;&nbsp;";
		} else {
			$photo_nav .= "<a href='photo.php?lid=".$ids[$i-1]."'>$i</a>&nbsp;&nbsp;";
		}
	}

	// next mark
	if( $ids[$numrows-1] != $lid ) {
		$photo_nav .= "<a href='photo.php?lid=".$ids[$pos+1]."'><b>"._ALBM_NEXT."</b></a>&nbsp;&nbsp;" ;
		$photo_nav .= "<a href='photo.php?lid=".$ids[$numrows-1]."'><b> &gt;]</b></a>" ;
	}
}

$xoopsTpl->assign( 'photo_nav' , $photo_nav ) ;

// comments

include XOOPS_ROOT_PATH.'/include/comment_view.php';

include( XOOPS_ROOT_PATH . "/footer.php" ) ;

?>