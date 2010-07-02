<?php

if( ! defined( 'XOOPS_ROOT_PATH' ) ) exit ;

$mydirname = basename( dirname( dirname( __FILE__ ) ) ) ;
if( ! preg_match( '/^(\D+)(\d*)$/' , $mydirname , $regs ) ) echo ( "invalid dirname: " . htmlspecialchars( $mydirname ) ) ;
$mydirnumber = $regs[2] === '' ? '' : intval( $regs[2] ) ;


eval( '
function myalbum'.$mydirnumber.'_search( $keywords , $andor , $limit , $offset , $userid )
{
	return myalbum_search_base( "'.$mydirname.'" , $keywords , $andor , $limit , $offset , $userid ) ;
}
' ) ;

if( ! function_exists( 'myalbum_search_base' ) ) {

function myalbum_search_base( $mydirname , $keywords , $andor , $limit , $offset , $userid )
{
	global $xoopsDB ;

	include XOOPS_ROOT_PATH."/modules/$mydirname/include/read_configs.php" ;

	// XOOPS Search module
	$showcontext = empty( $_GET['showcontext'] ) ? 0 : 1 ;
	$select4con = $showcontext ? "t.description" : "'' AS description" ;

	$sql = "SELECT l.lid,l.cid,l.title,l.submitter,l.date,$select4con FROM $table_photos l LEFT JOIN $table_text t ON t.lid=l.lid LEFT JOIN ".$xoopsDB->prefix("users")." u ON l.submitter=u.uid WHERE status>0" ;

	if( $userid > 0 ) {
		$sql .= " AND l.submitter=".$userid." ";
	}

	$whr = "" ;
	if( is_array( $keywords ) && count( $keywords ) > 0 ) {
		$whr = "AND (" ;
		switch( strtolower( $andor ) ) {
			case "and" :
				foreach( $keywords as $keyword ) {
					$whr .= "CONCAT(l.title,' ',t.description,' ',IFNULL(u.uname,'')) LIKE '%$keyword%' AND " ;
				}
				$whr = substr( $whr , 0 , -5 ) ;
				break ;
			case "or" :
				foreach( $keywords as $keyword ) {
					$whr .= "CONCAT(l.title,' ',t.description,' ',IFNULL(u.uname,'')) LIKE '%$keyword%' OR " ;
				}
				$whr = substr( $whr , 0 , -4 ) ;
				break ;
			default :
				$whr .= "CONCAT(l.title,'  ',t.description,' ',IFNULL(u.uname,'')) LIKE '%{$keywords[0]}%'" ;
				break ;
		}
		$whr .= ")" ;
	}

	$sql = "$sql $whr ORDER BY l.date DESC";
	$result = $xoopsDB->query( $sql , $limit , $offset ) ;
	$ret = array() ;
	$context = '' ;
	include_once XOOPS_ROOT_PATH."/modules/$mydirname/class/myalbum.textsanitizer.php" ;
	$myts =& MyAlbumTextSanitizer::getInstance();
	while( $myrow = $xoopsDB->fetchArray($result) ) {

		// get context for module "search"
		if( function_exists( 'search_make_context' ) && $showcontext ) {
			$full_context = strip_tags( $myts->displayTarea( $myrow['description'] , 1 , 1 , 1 , 1 , 1 ) ) ;
			if( function_exists( 'easiestml' ) ) $full_context = easiestml( $full_context ) ;
			$context = search_make_context( $full_context , $keywords ) ;
		}

		$ret[] = array(
			"image" => "images/pict.gif" ,
			"link" => "photo.php?lid=".$myrow["lid"] ,
			"title" => $myrow["title"] ,
			"time" => $myrow["date"] ,
			"uid" => $myrow["submitter"] ,
			"context" => $context
		) ;
	}
	return $ret;
}

}

?>