<?php
// $Id: print.php,v 1.5 2006/06/21 17:17:56 ohwada Exp $

// 2006-06-21 K.OHWADA
// BUG 8569: Warning: failed to open $includepage

// 2006-03-17 K.OHWADA
// dont use foreach($HTTP_POST_VARS as $k => $v)
// $HTTP_POST_VARS -> $_POST
// $HTTP_GET_VARS  -> $_GET

// 2005-01-29 K.OHWADA
// BUG 174: offline article is displayed

// 2004.02.26 K.OHWADA
// change the date from created time to published time same as displaying article
// change the image from fixation at "logo.gif" to Main Index Image set up by Index Page Management.

// 2004/01/29 herve 
// bug fix
//   you can print some articles you should NOT see
//   Check access authority same as displaying article

include 'header.php';

//if ( empty($articleid) ) 
if ( isset($_GET['articleid']) ) 
{
	$articleid = intval( $_GET['articleid'] );
}
else
{
	redirect_header("index.php");
}

include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/wfsarticle.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/wfscategory.php';

// --------------------------------------------------------
function PrintPage($articleid) {

    global $xoopsConfig, $xoopsDB, $xoopsModule, $wfsConfig;

        $story = new WfsArticle($articleid);

// BUG 174: offline article is displayed
// check the showing property
	if ( !$story->checkPublish() ) 
	{
		redirect_header("index.php",2,_WFS_NOSTORY);
		exit();
	}

// change the date from created to published same as displaying article
//    $datetime = formatTimestamp($story->created(), $wfsConfig['timestamp']);
    $datetime = formatTimestamp($story->published(), $wfsConfig['timestamp']);

    echo "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>\n";
        echo "<html>\n<head>\n";
        echo "<title>".$xoopsConfig['sitename']."</title>\n";
        echo "<meta http-equiv='Content-Type' content='text/html; charset="._CHARSET."' />\n";
        echo "<meta name='AUTHOR' content='".$xoopsConfig['sitename']."' />\n";
        echo "<meta name='COPYRIGHT' content='Copyright (c) 2001 by ".$xoopsConfig['sitename']."' />\n";
        echo "<meta name='DESCRIPTION' content='".$xoopsConfig['slogan']."' />\n";
        echo "<meta name='GENERATOR' content='".XOOPS_VERSION."' />\n\n\n";

// change the image from fixation at "logo.gif" to Main Index Image set up by Index Page Management.
//    echo "<body bgcolor='#ffffff' text='#000000'>
//            <table border='0'><tr><td align='center'>
//            <table border='0' width='650' cellpadding='0' cellspacing='1' bgcolor='#000000'><tr><td>
//            <table border='0' width='650' cellpadding='20' cellspacing='1' bgcolor='#ffffff'><tr><td align='center'>
//            <img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/logo.gif' border='0' alt='' /><br />
//            <h2>".$story->title()."</h2><hr />";

	$indeximage = XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/".$wfsConfig['indeximage'];

	echo "<body bgcolor='#ffffff' text='#000000'>
    	<table border='0'><tr><td align='center'>
		<table border='0' width='650' cellpadding='0' cellspacing='1' bgcolor='#000000'><tr><td>
		<table border='0' width='650' cellpadding='20' cellspacing='1' bgcolor='#ffffff'><tr><td align='center'>
		<img src='$indeximage' border='0' alt='indeximage' /><br />
		<h2>".$story->title()."</h2><hr />";

//      If($story->htmlpage) {
//                                      $includepage = XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/html/".$story->htmlpage();
//                                      $maintext = '';
//                                      $maintext = include($includepage);
//                             $maintext = $maintext;
//                } else {
//           $maintext = $story->maintext();
//    //if (!empty($maintext)) $maintext .= "<hr />";
//    $maintext = preg_replace("/\[pagebreak\]/","<hr width='75%' />",$maintext);
//    }

// BUG 8569: Warning: failed to open $includepage
// same as article.php
	$maintext = $story->maintext();
	$maintext = preg_replace("/\[pagebreak\]/","<hr width='75%' />",$maintext);

	if($story->ishtml != '0' && $story->htmlpage())
	{
		$maintextfile = XOOPS_ROOT_PATH.'/'.$wfsConfig['htmlpath'].'/'.$story->htmlpage;
		if (file_exists($maintextfile) && false !== $fp = fopen($maintextfile, 'r')) 
		{
			$maintext = fread($fp, filesize($maintextfile));
			fclose($fp);
		}
	}

        echo "<tr><td>".$maintext."<br /><br /><br /><hr /><br />";
        echo "<small><b>"._WFS_DATE."</b>&nbsp;".$datetime."<br /><b>"
        ._WFS_TOPICC."</b>&nbsp;".$story->categoryTitle()."<br /><b>"
        ._WFS_URLFORSTORY."</b>&nbsp;".XOOPS_URL."/modules/".$xoopsModule->dirname()."/article.php?articleid=".$story->articleid()
        ."</small><br /></td></tr>";
        echo "</td></tr></table></td></tr></table>\n
            </td></tr></table>
            </body>
            </html>
            ";
}
// --------------------------------------------------------

// main routine

// bug fix : you can print some articles you should NOT see
// PrintPage($articleid);
include_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() .'/include/groupaccess.php';
$article = new WfsArticle($articleid);
if (checkAccess($article->groupid)) 
{	PrintPage($articleid);}
else
{	redirect_header("index.php", 2, _NOPERM);
	exit();
}

?>