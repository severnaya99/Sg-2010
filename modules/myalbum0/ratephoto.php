<?php
// ------------------------------------------------------------------------- //
//                      myAlbum-P - XOOPS photo album                        //
//                        <http://www.peak.ne.jp/>                           //
// ------------------------------------------------------------------------- //
include( "header.php" ) ;
$myts =& MyTextSanitizer::getInstance() ;

if( ! ( $global_perms & GPERM_RATEVOTE ) ) {
	redirect_header(XOOPS_URL.'/index.php', 1, _NOPERM);
	exit ;
}

$lid = empty( $_GET['lid'] ) ? 0 : intval( $_GET['lid'] ) ;

if( ! empty( $_POST['submit'] ) ) {

	$ratinguser = $my_uid ;

	//Make sure only 1 anonymous from an IP in a single day.
	$anonwaitdays = 1 ;
	$ip = getenv( "REMOTE_ADDR" ) ;
	$lid = intval( $_POST['lid'] ) ;
	$rating = intval( $_POST['rating'] ) ;
	// Check if rating is valid
	if( $rating <= 0 || $rating > 10 ) {
		redirect_header( "ratephoto.php?lid=$lid" , 4 , _ALBM_NORATING ) ;
		exit ;
	}

	if( $ratinguser != 0 ) {

		// Check if Photo POSTER is voting
		$rs = $xoopsDB->query( "SELECT COUNT(*) FROM $table_photos WHERE lid=$lid AND submitter=$ratinguser" ) ;
		list( $is_my_photo ) = $xoopsDB->fetchRow( $rs ) ;
		if( $is_my_photo ) {
			redirect_header( "index.php" , 4 , _ALBM_CANTVOTEOWN ) ;
			exit ;
		}

		// Check if REG user is trying to vote twice.
		$rs = $xoopsDB->query( "SELECT COUNT(*) FROM $table_votedata WHERE lid=$lid AND ratinguser=$ratinguser" ) ;
		list( $has_already_rated ) = $xoopsDB->fetchRow( $rs ) ;
		if( $has_already_rated ) {
			redirect_header( "index.php" , 4 , _ALBM_VOTEONCE2 ) ;
			exit ;
		}

	} else {
		// Check if ANONYMOUS user is trying to vote more than once per day.
		$yesterday = ( time() - (86400 * $anonwaitdays ) ) ;
		$rs = $xoopsDB->query( "SELECT COUNT(*) FROM $table_votedata WHERE lid=$lid AND ratinguser=0 AND ratinghostname='$ip' AND ratingtimestamp > $yesterday");
		list( $anonvotecount ) = $xoopsDB->fetchRow( $rs ) ;
		if( $anonvotecount ) {
			redirect_header( "index.php" , 4 , _ALBM_VOTEONCE2 ) ;
			exit ;
		}
	}

	// All is well.  Add to Line Item Rate to DB.
	$newid = $xoopsDB->genId( $table_votedata . "_ratingid_seq" ) ;
	$datetime = time() ;
	$xoopsDB->query( "INSERT INTO $table_votedata (ratingid, lid, ratinguser, rating, ratinghostname, ratingtimestamp) VALUES ($newid, $lid, $ratinguser, $rating, '$ip', $datetime)") or die( "DB error: INSERT votedata table" ) ;

	//All is well.  Calculate Score & Add to Summary (for quick retrieval & sorting) to DB.
	myalbum_updaterating( $lid ) ;
	$ratemessage = _ALBM_VOTEAPPRE."<br />".sprintf( _ALBM_THANKURATE , $xoopsConfig['sitename'] ) ;
	redirect_header( "index.php" , 2 , $ratemessage ) ;
	exit ;

} else {

	$xoopsOption['template_main'] = "{$mydirname}_ratephoto.html" ;
	include( XOOPS_ROOT_PATH."/header.php" ) ;

	$rs = $xoopsDB->query( "SELECT l.lid, l.cid, l.title, l.ext, l.res_x, l.res_y, l.status, l.date, l.hits, l.rating, l.votes, l.comments, l.submitter, t.description FROM $table_photos l LEFT JOIN $table_text t ON l.lid=t.lid  WHERE l.lid='$lid' AND l.status>0") ;
	if( $rs == false || $xoopsDB->getRowsNum( $rs ) <= 0 ) {
		redirect_header( "index.php" , 2 , _ALBM_NOMATCH ) ;
		exit ;
	}

	$fetched_result_array = $xoopsDB->fetchArray( $rs ) ;
	$xoopsTpl->assign( 'photo' , myalbum_get_array_for_photo_assign( $fetched_result_array ) ) ;

	include( 'include/assign_globals.php' ) ;
	$xoopsTpl->assign( $myalbum_assign_globals ) ;

	$xoopsTpl->assign( 'lang_voteonce' , _ALBM_VOTEONCE ) ;
	$xoopsTpl->assign( 'lang_ratingscale' , _ALBM_RATINGSCALE ) ;
	$xoopsTpl->assign( 'lang_beobjective' , _ALBM_BEOBJECTIVE ) ;
	$xoopsTpl->assign( 'lang_donotvote' , _ALBM_DONOTVOTE ) ;
	$xoopsTpl->assign( 'lang_rateit' , _ALBM_RATEIT ) ;
	$xoopsTpl->assign( 'lang_cancel' , _CANCEL ) ;

	include( XOOPS_ROOT_PATH . "/footer.php" ) ;

}
?>