<?php
// $Id: print.php,v 1.3  Date: 06/01/2003, Author: Catzwolf Exp $

include 'header.php';

foreach ($HTTP_POST_VARS as $k => $v) 
{
	${$k} = $v;
}

foreach ($HTTP_GET_VARS as $k => $v) 
{
	${$k} = $v;
}

if ( empty($articleid) ) {
        redirect_header("index.php");
}
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/wfsarticle.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/wfscategory.php';

function PrintPage($articleid) {

    global $xoopsConfig, $xoopsDB, $xoopsModule, $wfsConfig;

        $story = new WfsArticle($articleid);
    $datetime = formatTimestamp($story->created(), $wfsConfig['timestamp']);

    echo "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>\n";
        echo "<html>\n<head>\n";
        echo "<title>".$xoopsConfig['sitename']."</title>\n";
        echo "<meta http-equiv='Content-Type' content='text/html; charset="._CHARSET."' />\n";
        echo "<meta name='AUTHOR' content='".$xoopsConfig['sitename']."' />\n";
        echo "<meta name='COPYRIGHT' content='Copyright (c) 2001 by ".$xoopsConfig['sitename']."' />\n";
        echo "<meta name='DESCRIPTION' content='".$xoopsConfig['slogan']."' />\n";
        echo "<meta name='GENERATOR' content='".XOOPS_VERSION."' />\n\n\n";

    echo "<body bgcolor='#ffffff' text='#000000'>
            <table border='0'><tr><td align='center'>
            <table border='0' width='650' cellpadding='0' cellspacing='1' bgcolor='#000000'><tr><td>
            <table border='0' width='650' cellpadding='20' cellspacing='1' bgcolor='#ffffff'><tr><td align='center'>
            <img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/logo.gif' border='0' alt='' /><br />
            <h2>".$story->title()."</h2><hr />";
        If($story->htmlpage) {
                                        $includepage = XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/html/".$story->htmlpage();
                                        $maintext = '';
                                        $maintext = include($includepage);
                               $maintext = $maintext;
                } else {

           $maintext = $story->maintext();
    //if (!empty($maintext)) $maintext .= "<hr />";
    $maintext = preg_replace("/\[pagebreak\]/","<hr width='75%' />",$maintext);
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

PrintPage($articleid);

?>
