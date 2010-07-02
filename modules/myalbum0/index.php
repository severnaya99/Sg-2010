<?php
// ------------------------------------------------------------------------- //
//                      myAlbum-P - XOOPS photo album                        //
//                        <http://www.peak.ne.jp/>                           //
// ------------------------------------------------------------------------- //

include("header.php");
$myts =& MyTextSanitizer::getInstance() ; // MyTextSanitizer object
include_once( XOOPS_ROOT_PATH . "/class/xoopstree.php" ) ;
$cattree = new XoopsTree( $table_cat , "cid" , "pid" ) ;

$xoopsOption['template_main'] = "{$mydirname}_index.html" ;

include( XOOPS_ROOT_PATH . "/header.php" ) ;

include( 'include/assign_globals.php' ) ;
$xoopsTpl->assign( $myalbum_assign_globals ) ;

$xoopsTpl->assign( 'subcategories' , myalbum_get_sub_categories( 0 , $cattree ) ) ;
$xoopsTpl->assign( 'category_options' , myalbum_get_cat_options() ) ;

$prs = $xoopsDB->query( "SELECT COUNT(lid) FROM $table_photos WHERE status>0" ) ;
list( $photo_num_total ) = $xoopsDB->fetchRow( $prs ) ;

$xoopsTpl->assign( 'photo_global_sum' , sprintf( _ALBM_THEREARE , $photo_num_total ) ) ;
if( $global_perms & GPERM_INSERTABLE ) $xoopsTpl->assign( 'lang_add_photo' , _ALBM_ADDPHOTO ) ;

// Navigation
$num = empty( $_GET['num'] ) ? $myalbum_newphotos : intval( $_GET['num'] ) ;
if( $num < 1 ) $num = $myalbum_newphotos ;
$pos = empty( $_GET['pos'] ) ? 0 : intval( $_GET['pos'] ) ;
if( $pos >= $photo_num_total ) $pos = 0 ;
if( $photo_num_total > $num ) {
	include_once( XOOPS_ROOT_PATH . '/class/pagenav.php' ) ;
	$nav = new XoopsPageNav( $photo_num_total , $num , $pos , 'pos' , "num=$num" ) ;
	$nav_html = $nav->renderNav( 10 ) ;
	$last = $pos + $num ;
	if( $last > $photo_num_total ) $last = $photo_num_total ;
	$photonavinfo = sprintf( _ALBM_AM_PHOTONAVINFO , $pos + 1 , $last , $photo_num_total ) ;
	$xoopsTpl->assign( 'photonavdisp' , true ) ;
	$xoopsTpl->assign( 'photonav' , $nav_html ) ;
	$xoopsTpl->assign( 'photonavinfo' , $photonavinfo ) ;
} else {
	$xoopsTpl->assign( 'photonavdisp' , false ) ;
}

// Assign Latest Photos
$prs = $xoopsDB->query( "SELECT l.lid, l.cid, l.title, l.ext, l.res_x, l.res_y, l.status, l.date, l.hits, l.rating, l.votes, l.comments, l.submitter, t.description,c.title AS cat_title FROM $table_photos l LEFT JOIN $table_text t ON l.lid=t.lid LEFT JOIN $table_cat c ON l.cid=c.cid WHERE l.status>0 ORDER BY date DESC" , $num , $pos ) ;
while( $fetched_result_array = $xoopsDB->fetchArray( $prs ) ) {
	$xoopsTpl->append_by_ref( 'photos' , myalbum_get_array_for_photo_assign( $fetched_result_array , true ) ) ;
}

include( XOOPS_ROOT_PATH . "/footer.php" ) ;

?>