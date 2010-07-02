<?php
// ------------------------------------------------------------------------- //
//                      myAlbum-P - XOOPS photo album                        //
//                        <http://www.peak.ne.jp/>                           //
// ------------------------------------------------------------------------- //

include("header.php");
$myts =& MyTextSanitizer::getInstance() ; // MyTextSanitizer object
include_once( XOOPS_ROOT_PATH."/class/xoopstree.php" ) ;
$cattree = new XoopsTree( $table_cat , "cid" , "pid" ) ;

$xoopsOption['template_main'] = "myalbum{$mydirnumber}_topten.html" ;

include( XOOPS_ROOT_PATH . "/header.php" ) ;

include( 'include/assign_globals.php' ) ;
$xoopsTpl->assign( $myalbum_assign_globals ) ;

//generates top 10 charts by rating and hits for each main category

if( ! empty( $_GET['rate'] ) && ( $global_perms & GPERM_RATEVIEW ) ) {
	$lang_sortby = _ALBM_RATING;
	$odr = "rating DESC";
} else {
	$lang_sortby = _ALBM_HITS;
	$odr = "hits DESC";
}

$xoopsTpl->assign( 'lang_sortby' , $lang_sortby ) ;
$xoopsTpl->assign( 'lang_rank' , _ALBM_RANK ) ;
$xoopsTpl->assign( 'lang_title' , _ALBM_TITLE ) ;
$xoopsTpl->assign( 'lang_category' , _ALBM_CATEGORY ) ;
$xoopsTpl->assign( 'lang_hits' , _ALBM_HITS ) ;
$xoopsTpl->assign( 'lang_rating' , _ALBM_RATING ) ;
$xoopsTpl->assign( 'lang_vote' , _ALBM_VOTE ) ;

$crs = $xoopsDB->query( "SELECT cid,title FROM $table_cat WHERE pid=0 ORDER BY title" ) ;
$rankings = array() ;
$i = 0;
while( list( $cid , $cat_title ) = $xoopsDB->fetchRow( $crs ) ) {

	$rankings[$i] = array(
		'title' => sprintf( _ALBM_TOP10 , $myts->htmlSpecialChars( $cat_title ) ) ,
		'count' => $i
	) ;

	// get all child cat ids for a given cat id
	$children = $cattree->getAllChildId( $cid ) ;
	$whr_cid = 'cid IN (' ;
	foreach( $children as $child ) {
		$whr_cid .= "$child," ;
	}
	$whr_cid .= "$cid)" ;

	$sql = "SELECT lid, cid, title, submitter, hits, rating, votes FROM $table_photos WHERE status>0 AND ($whr_cid) ORDER BY $odr";
	$prs = $xoopsDB->query( $sql , 10 , 0 ) ;
	$rank = 1 ;
	while( list ( $lid , $cid , $title , $submitter , $hits , $rating , $votes ) = $xoopsDB->fetchRow( $prs ) ) {
		$catpath = $cattree->getPathFromId( $cid , "title" ) ;
		$catpath = substr( $catpath , 1 ) ;
		$catpath = str_replace( "/" , " <span class='fg2'>&raquo;&raquo;</span> " , $catpath ) ;
		$title = $myts->makeTboxData4Show( $title ) ;
		$rankings[$i]['photo'][] = array( 'lid' => $lid , 'cid' => $cid , 'rank' => $rank , 'title' => $title , 'submitter' => $submitter , 'submitter_name' => myalbum_get_name_from_uid( $submitter ) , 'category' => $catpath , 'hits' => $hits , 'rating' => number_format( $rating , 2) , 'votes' => $votes ) ;
		$rank ++ ;
	}

	$i++ ;
}

$xoopsTpl->assign_by_ref( 'rankings' , $rankings ) ;

include( XOOPS_ROOT_PATH . "/footer.php" ) ;

?>