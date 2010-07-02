<?php
// $Id: data.inc.php,v 1.2 2005/06/24 09:20:07 ohwada Exp $

// 2005-06-20 K.OHWADA
// for PDA

// 2004/08/20 K.OHWADA
// add atom items
// check the showing property

//================================================================
// What's New Module
// get aritciles from module
// 2004.01.03 K.OHWADA
//================================================================

function xfsection_new($limit=0, $offset=0)
{
	global $xoopsDB;

	$myts =& MyTextSanitizer::getInstance();

	$i = 0;
	$ret  = array();
	$time = time();

// check the showing property
	$sql = "SELECT * FROM ".$xoopsDB->prefix("xfs_article")." WHERE (published > 0 AND published <= $time ) AND noshowart = 0 AND offline = '0' AND (expired = 0 OR expired > $time ) ORDER BY published DESC";

	$result = $xoopsDB->query($sql,$limit,$offset);
	while( $row = $xoopsDB->fetchArray($result) )
	{
	    $ret[$i]['link']  = XOOPS_URL."/modules/xfsection/article.php?articleid=".$row['articleid']."";

// for PDA
	    $ret[$i]['pda']  = XOOPS_URL."/modules/xfsection/print.php?articleid=".$row['articleid']."";

	    $ret[$i]['title'] = $row['title'];
//	   	$ret[$i]['time']  = $row['published'];
//		$ret[$i]['description'] = strip_tags( $row['maintext'] );

// atom
	   	$ret[$i]['id']       = $row['articleid'];
	   	$ret[$i]['uid']      = $row['uid'];
	   	$ret[$i]['time']     = $row['changed'];
		$ret[$i]['modified'] = $row['changed'];
		$ret[$i]['issued']   = $row['published'];
		$ret[$i]['created']  = $row['created'];

		$html   = 1;
		$smiley = 1;
		$xcodes = 1;
		$image  = 1;
		$br     = 1;
		$amp    = 0;

		if ( $row['nohtml'] )	$html   = 0;
		if ( $row['nosmiley'] )	$smiley = 0;
		if ( $row['nobr'] )		$br     = 0;
		if ( $row['enaamp'] )	$amp    = 1;

		$maintext    = $row['maintext'];
		$maintextarr = explode("[pagebreak]", $maintext);
		$maintext    = $maintextarr[0];

		$maintext = $myts->displayTarea($maintext, $html, $smiley, $xcodes, $image, $br);
		$ret[$i]['description'] = $maintext;

		$i++;
	}

	return $ret;
}

function xfsection_num()
{
	global $xoopsDB;

	$sql = "SELECT count(*) FROM ".$xoopsDB->prefix("xfs_article")." ORDER BY articleid";
	$array = $xoopsDB->fetchRow( $xoopsDB->query($sql) );
	$num   = $array[0];
	if (empty($num)) $num = 0;

	return $num;
}

function xfsection_data($limit=0, $offset=0)
{
	global $xoopsDB;

	$i = 0;
	$ret = array();

	$sql = "SELECT * FROM ".$xoopsDB->prefix("xfs_article")." ORDER BY articleid";
	$result = $xoopsDB->query($sql,$limit,$offset);

	while($myrow = $xoopsDB->fetchArray($result))
	{
	    $id = $myrow['articleid'];
	    $ret[$i]['id']    = $id;
	    $ret[$i]['link']  = XOOPS_URL."/modules/xfsection/article.php?articleid=$id";
	    $ret[$i]['title'] = $myrow['title']." ".$myrow['summary'];
	   	$ret[$i]['time']  = $myrow['published'];
		$i++;
	}

	return $ret;
}
?>
