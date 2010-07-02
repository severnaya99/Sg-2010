<?php

if( ! defined( 'XOOPS_ROOT_PATH' ) ) exit ;

$mydirname = basename( dirname( dirname( __FILE__ ) ) ) ;

eval( '

function b_waiting_'.$mydirname.'(){
	return b_waiting_myalbum_base( "'.$mydirname.'" ) ;
}

' ) ;

if( ! function_exists( 'b_waiting_myalbum_base' ) ) {

function b_waiting_myalbum_base( $mydirname )
{
	$xoopsDB =& Database::getInstance();
	$block = array();

	// get $mydirnumber
	if( ! preg_match( '/^(\D+)(\d*)$/' , $mydirname , $regs ) ) echo ( "invalid dirname: " . htmlspecialchars( $mydirname ) ) ;
	$mydirnumber = $regs[2] === '' ? '' : intval( $regs[2] ) ;

	$result = $xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("myalbum{$mydirnumber}_photos")." WHERE status=0");
	if ( $result ) {
		$block['adminlink'] = XOOPS_URL."/modules/myalbum{$mydirnumber}/admin/admission.php";
		list($block['pendingnum']) = $xoopsDB->fetchRow($result);
		$block['lang_linkname'] = _PI_WAITING_WAITINGS ;
	}

	return $block;
}

}

?>