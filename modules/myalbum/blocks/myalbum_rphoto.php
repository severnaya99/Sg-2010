<?php

if( ! defined( 'MYALBUM_BLOCK_RPHOTO_INCLUDED' ) ) {

define( 'MYALBUM_BLOCK_RPHOTO_INCLUDED' , 1 ) ;

function b_myalbum_rphoto_show( $options )
{
	global $xoopsDB ;

	$mydirname = empty( $options[0] ) ? basename( dirname( dirname( __FILE__ ) ) ) : $options[0] ;
	$box_size = empty( $options[1] ) ? 140 : intval( $options[1] ) ;
	$photos_num = empty( $options[2] ) ? 1 : intval( $options[2] ) ;
	$cat_limitation = empty( $options[3] ) ? 0 : intval( $options[3] ) ;
	$cat_limit_recursive = empty( $options[4] ) ? 0 : 1 ;
	$cycle = empty( $options[5] ) ? 60 : intval( $options[5] ) ;
	$cols = empty( $options[6] ) ? 1 : intval( $options[6] ) ;

	include XOOPS_ROOT_PATH."/modules/$mydirname/include/read_configs.php" ;

	// Category limitation
	if( $cat_limitation ) {
		if( $cat_limit_recursive ) {
			include_once XOOPS_ROOT_PATH."/class/xoopstree.php" ;
			$cattree = new XoopsTree( $table_cat , "cid" , "pid" ) ;
			$children = $cattree->getAllChildId( $cat_limitation ) ;
			$whr_cat = "l.cid IN (" ;
			foreach( $children as $child ) {
				$whr_cat .= "$child," ;
			}
			$whr_cat .= "$cat_limitation)" ;
		} else {
			$whr_cat = "l.cid='$cat_limitation'" ;
		}
	} else {
		$whr_cat = '1' ;
	}

	// WHERE clause for ext
	// $whr_ext = "l.ext IN ('" . implode( "','" , $myalbum_normal_exts ) . "')" ;
	$whr_ext = "1" ;

	$block = array() ;
	$myts =& MyTextSanitizer::getInstance() ;

	// Get number of photo 
	$result = $xoopsDB->query( "SELECT count(l.lid) FROM $table_photos l WHERE status>0 AND $whr_cat AND $whr_ext" ) ;
	list( $numrows ) = $xoopsDB->fetchRow( $result ) ;
	if( $numrows < 1 ) return $block ;

	if( $numrows <= $photos_num ) {
		$result = $xoopsDB->query( "SELECT l.lid , l.cid , l.title , l.ext , l.res_x , l.res_y , l.submitter , l.status , l.date AS unixtime , l.hits , l.rating , l.votes , l.comments , c.title AS cat_title FROM $table_photos l LEFT JOIN $table_cat c ON l.cid=c.cid WHERE l.status>0 AND $whr_cat AND $whr_ext" ) ;
	} else {
		$result = $xoopsDB->query( "SELECT l.lid FROM $table_photos l WHERE l.status>0 AND $whr_cat AND $whr_ext" ) ;
		$lids = array() ;
		$sel_lids = array() ;
		while( list( $lid ) = $xoopsDB->fetchRow( $result ) ) $lids[] = $lid ;
		srand( intval( time() / $cycle ) * $cycle ) ;
		$sel_lids = array_rand( $lids , $photos_num ) ;
		if( is_array( $sel_lids ) ) {
			$whr_lid = '' ;
			foreach( $sel_lids as $key ) $whr_lid .= $lids[ $key ] . "," ;
			$whr_lid = substr( $whr_lid , 0 , -1 ) ;
		} else {
			$whr_lid = $lids[ $sel_lids ] ;
		}
		$result = $xoopsDB->query( "SELECT l.lid , l.cid , l.title , l.ext , l.res_x , l.res_y , l.submitter , l.status , l.date AS unixtime , l.hits , l.rating , l.votes , l.comments , c.title AS cat_title FROM $table_photos l LEFT JOIN $table_cat c ON l.cid=c.cid WHERE l.status>0 AND l.lid IN ($whr_lid)" ) ;
	}

	$count = 1 ;
	while( $photo = $xoopsDB->fetchArray( $result ) ) {
		$photo['title'] = $myts->makeTboxData4Show( $photo['title'] ) ;
		$photo['cat_title'] = $myts->makeTboxData4Show( $photo['cat_title'] ) ;
		$photo['suffix'] = $photo['hits'] > 1 ? 'hits' : 'hit' ;
		$photo['date'] = formatTimestamp( $photo['unixtime'] , 's' ) ;
		$photo['thumbs_url'] = $thumbs_url ;

		if( in_array( strtolower( $photo['ext'] ) , $myalbum_normal_exts ) ) {
			// width&height attirbs for <img>
			if( $box_size <= 0 ) {
				$photo['img_attribs'] = "" ;
			} else {
				list( $width , $height , $type ) = getimagesize( "$thumbs_dir/{$photo['lid']}.{$photo['ext']}" ) ;
				if( $width > $box_size || $height > $box_size ) {
					if( $width > $height ) $photo['img_attribs'] = "width='$box_size'" ;
					else $photo['img_attribs'] = "height='$box_size'" ;
				} else {
					$photo['img_attribs'] = "" ;
				}
			}
		} else {
			$photo['ext'] = 'gif' ;
			$photo['img_attribs'] = '' ;
		}

		$block['photo'][$count++] = $photo ;
	}
	$block['mod_url'] = $mod_url ;
	$block['cols'] = $cols ;

	return $block ;
}


function b_myalbum_rphoto_edit( $options )
{
	global $xoopsDB ;

	$mydirname = empty( $options[0] ) ? basename( dirname( dirname( __FILE__ ) ) ) : $options[0] ;
	$box_size = empty( $options[1] ) ? 140 : intval( $options[1] ) ;
	$photos_num = empty( $options[2] ) ? 1 : intval( $options[2] ) ;
	$cat_limitation = empty( $options[3] ) ? 0 : intval( $options[3] ) ;
	$cat_limit_recursive = empty( $options[4] ) ? 0 : 1 ;
	$cycle = empty( $options[5] ) ? 60 : intval( $options[5] ) ;
	$cols = empty( $options[6] ) ? 1 : intval( $options[6] ) ;

	include_once XOOPS_ROOT_PATH."/class/xoopstree.php" ;

	if( ! preg_match( '/^(\D+)(\d*)$/' , $mydirname , $regs ) ) echo ( "invalid dirname: " . htmlspecialchars( $mydirname ) ) ;
	$mydirnumber = $regs[2] === '' ? '' : intval( $regs[2] ) ;

	$cattree = new XoopsTree( $xoopsDB->prefix( "myalbum{$mydirnumber}_cat" ) , "cid" , "pid" ) ;

	ob_start() ;
	$cattree->makeMySelBox( "title" , "title" , $cat_limitation , 1 , 'options[3]' ) ;
	$catselbox = ob_get_contents() ;
	ob_end_clean() ;

	$form = "
		"._ALBM_TEXT_BLOCK_WIDTH."&nbsp;
		<input type='hidden' name='options[0]' value='{$mydirname}' />
		<input type='text' size='6' name='options[1]' value='$box_size' style='text-align:right;' />&nbsp;pixel "._ALBM_TEXT_BLOCK_WIDTH_NOTES."
		<br />
		"._ALBM_TEXT_DISP."&nbsp;
		<input type='text' size='3' name='options[2]' value='$photos_num' style='text-align:right;' />
		<br />
		"._ALBM_TEXT_CATLIMITATION." &nbsp; $catselbox
		"._ALBM_TEXT_CATLIMITRECURSIVE."
		<input type='radio' name='options[4]' value='1' ".($cat_limit_recursive?"checked='checked'":"")."/>"._YES."
		<input type='radio' name='options[4]' value='0' ".($cat_limit_recursive?"":"checked='checked'")."/>"._NO."
		<br />
		"._ALBM_TEXT_RANDOMCYCLE."&nbsp;
		<input type='text' size='6' name='options[5]' value='$cycle' style='text-align:right;' />
		<br />
		"._ALBM_TEXT_COLS."&nbsp;
		<input type='text' size='2' name='options[6]' value='$cols' style='text-align:right;' />
		<br />
		\n" ;

	return $form ;
}

}

?>