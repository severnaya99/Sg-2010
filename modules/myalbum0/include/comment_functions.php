<?php

if( ! defined( 'MYALBUM_COMMENT_FUNCTIONS_INCLUDED' ) ) {

define( 'MYALBUM_COMMENT_FUNCTIONS_INCLUDED' , 1 ) ;

// comment callback functions

function myalbum_comments_update( $lid , $total_num ) {
	global $xoopsDB , $table_photos ;

	$ret = $xoopsDB->query( "UPDATE $table_photos SET comments=$total_num WHERE lid=$lid" ) ;
	return $ret ;
}

function myalbum_comments_approve( &$comment )
{
	// notification mail here
}

}
?>