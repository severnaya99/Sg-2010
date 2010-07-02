<?php
// ------------------------------------------------------------------------- //
//                      myAlbum-P - XOOPS photo album                        //
//                        <http://www.peak.ne.jp/>                           //
// ------------------------------------------------------------------------- //

include( "header.php" ) ;
$myts =& MyTextSanitizer::getInstance() ; // MyTextSanitizer object
include_once( XOOPS_ROOT_PATH . "/class/xoopstree.php" ) ;
$cattree = new XoopsTree( $table_cat , "cid" , "pid" ) ;
include_once( XOOPS_ROOT_PATH . '/class/pagenav.php' ) ;

// GET variables
$cid = empty( $_GET['cid'] ) ? 0 : intval( $_GET['cid'] ) ;
$uid = empty( $_GET['uid'] ) ? 0 : intval( $_GET['uid'] ) ;
$num = empty( $_GET['num'] ) ? intval( $myalbum_perpage ) : intval( $_GET['num'] ) ;
if( $num < 1 ) $num = 10 ;
$pos = empty( $_GET['pos'] ) ? 0 : intval( $_GET['pos'] ) ;
$view = empty( $_GET['view'] ) ? $myalbum_viewcattype : $_GET['view'] ;

// Orders
include( XOOPS_ROOT_PATH."/modules/$mydirname/include/photo_orders.php" ) ;
if( isset( $_GET['orderby'] ) && isset( $myalbum_orders[ $_GET['orderby'] ] ) ) $orderby = $_GET['orderby'] ;
else if( isset( $myalbum_orders[ $myalbum_defaultorder ] ) ) $orderby = $myalbum_defaultorder ;
else $orderby = 'titleA' ;


if( $view == 'table' ) {
	$xoopsOption['template_main'] = "{$mydirname}_viewcat_table.html" ;
	$function_assigning = 'myalbum_get_array_for_photo_assign_light' ;
} else {
	$xoopsOption['template_main'] = "{$mydirname}_viewcat_list.html" ;
	$function_assigning = 'myalbum_get_array_for_photo_assign' ;
}

include( XOOPS_ROOT_PATH . "/header.php" ) ;

include( 'include/assign_globals.php' ) ;
$xoopsTpl->assign( $myalbum_assign_globals ) ;

if( $global_perms & GPERM_INSERTABLE ) $xoopsTpl->assign( 'lang_add_photo' , _ALBM_ADDPHOTO ) ;

$xoopsTpl->assign( 'lang_album_main' , _ALBM_MAIN ) ;

if( $cid > 0 ) {

	// Category Specified
	$xoopsTpl->assign( 'category_id' , $cid ) ;
	$xoopsTpl->assign( 'subcategories' , myalbum_get_sub_categories( $cid , $cattree ) ) ;	$xoopsTpl->assign( 'category_options' , myalbum_get_cat_options() ) ;

	$cids = $cattree->getAllChildId( $cid ) ;
	array_push( $cids , $cid ) ;
	$photo_total_sum = myalbum_get_photo_total_sum_from_cats( $cids , "status>0" ) ;
	$sub_title = preg_replace( "/\'\>/" , "'><img src='$mod_url/images/folder16.gif' alt='' />" , $cattree->getNicePathFromId( $cid , 'title' , "viewcat.php?num=$num" ) ) ;
	$sub_title = preg_replace( "/^(.+)folder16/" , '$1folder_open' , $sub_title ) ;
	$xoopsTpl->assign( 'album_sub_title' , $sub_title ) ;

	$where = "cid=$cid";
	$get_append = "cid=$cid";
	$join_append = '' ;
	$select_append = '' ;

} else if( $uid != 0 ) {

	// This means 'my photo'
	if( $uid < 0 ) {
		$where = "submitter=$my_uid" ;
		$get_append = "uid=-1" ;
		$xoopsTpl->assign( 'uid' , -1 ) ;
		$xoopsTpl->assign( 'album_sub_title' , _ALBM_TEXT_SMNAME4 ) ;
	// uid Specified
	} else {
		$where = "submitter=$uid" ;
		$get_append = "uid=$uid" ;
		$xoopsTpl->assign( 'uid' , $uid ) ;
		$xoopsTpl->assign( 'album_sub_title' , "<img src='$mod_url/images/myphotos.gif' alt='' />" . myalbum_get_name_from_uid( $uid ) ) ;
	}
	$join_append = "LEFT JOIN $table_cat c ON l.cid=c.cid" ;
	$select_append = ', c.title AS cat_title' ;

} else {

	$where = "cid=0";
	$get_append = "cid=0";
	$join_append = '' ;
	$select_append = '' ;
	$xoopsTpl->assign( 'album_sub_title' , 'error: category id not specified' ) ;

}


$prs = $xoopsDB->query( "SELECT COUNT(lid) FROM $table_photos WHERE $where AND status>0" ) ;
list( $photo_small_sum ) = $xoopsDB->fetchRow( $prs ) ;
$xoopsTpl->assign( 'photo_small_sum' , $photo_small_sum ) ;
$xoopsTpl->assign( 'photo_total_sum' , ( empty( $photo_total_sum ) ? $photo_small_sum : $photo_total_sum ) ) ;

if( $photo_small_sum > 0 ) {

	$prs = $xoopsDB->query( "SELECT l.lid, l.cid, l.title, l.ext, l.res_x, l.res_y, l.status, l.date, l.hits, l.rating, l.votes, l.comments, l.submitter, t.description $select_append FROM $table_photos l LEFT JOIN $table_text t ON l.lid=t.lid $join_append WHERE $where AND l.status>0 ORDER BY {$myalbum_orders[$orderby][0]}" , $num , $pos ) ;

	//if 2 or more items in result, num the navigation menu
	if( $photo_small_sum > 1 ) {

		// Assign navigations like order and division
		$xoopsTpl->assign( 'show_nav' ,  true ) ;
		$xoopsTpl->assign( 'lang_sortby' , _ALBM_SORTBY ) ;
		$xoopsTpl->assign( 'lang_title' , _ALBM_TITLE ) ;
		$xoopsTpl->assign( 'lang_date' , _ALBM_DATE ) ;
		$xoopsTpl->assign( 'lang_rating' , _ALBM_RATING ) ;
		$xoopsTpl->assign( 'lang_popularity' , _ALBM_POPULARITY ) ;
		$xoopsTpl->assign( 'lang_cursortedby' , sprintf( _ALBM_CURSORTEDBY , $myalbum_orders[$orderby][1] ) ) ;

		$nav = new XoopsPageNav( $photo_small_sum , $num , $pos , 'pos' , "$get_append&num=$num&orderby=$orderby" ) ;
		$nav_html = $nav->renderNav( 10 ) ;
		$last = $pos + $num ;
		if( $last > $photo_small_sum ) $last = $photo_small_sum ;
		$photonavinfo = sprintf( _ALBM_AM_PHOTONAVINFO , $pos + 1 , $last , $photo_small_sum ) ;
		$xoopsTpl->assign( 'photonav' , $nav_html ) ;
		$xoopsTpl->assign( 'photonavinfo' , $photonavinfo ) ;
	}

	// Display photos
	$count = 1 ;
	while( $fetched_result_array = $xoopsDB->fetchArray( $prs ) ) {
		$photo = $function_assigning( $fetched_result_array ) + array( 'count' => $count ++ , true ) ;
		$xoopsTpl->append( 'photos' , $photo ) ;
	}
}

include( XOOPS_ROOT_PATH . "/footer.php" ) ;

?>