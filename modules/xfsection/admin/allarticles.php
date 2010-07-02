<?php
// $Id: allarticles.php,v 1.3 2006/03/20 03:23:03 ohwada Exp $

// 2006-03-17 K.OHWADA
// dont use foreach($HTTP_POST_VARS as $k => $v)
// $HTTP_POST_VARS   -> $_POST
// $HTTP_GET_VARS    -> $_GET
// $HTTP_SERVER_VARS -> $_SERVER

// 2004/04/04 K.OHWADA
// forget to delete line 64
//   $scount = count(WfsArticle::getAllArticle($wfsConfig['lastart'], 0, 0, $dataselect));

// 2004/03/27 K.OHWADA
// it will operate incorrectly, if there are many records.

// 2004/02/28 K.OHWADA
// unify a article menu and a title
// display a menu at first page
// display number of articles by articlemenu
// add adminmenu flag

// 2004/02/25 cache
// take over the order to previos and next page
// bug fix : phase error: allarticles -> href

include 'admin_header.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/wfscategory.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/wfsarticle.php';

global $xoopsDB, $xoopsConfig, $xoopsModule, $wfsConfig;

if ( isset($_GET['lastarts']) ) {
	$xoopsOption = intval($_GET['lastarts']);
	if ($xoopsOption > 30) $xoopsOption = 0;
} else {
	$xoopsOption = 0;
}

if ( isset($_GET['start']) ) {
	$start = intval($_GET['start']);
} else {
	$start = 0;
}

if (isset($_GET['orderby'])) {
	$orderby = convertorderbyin($_GET['orderby']);
} else {
	$orderby = "articleid ASC";
}

//if (!isset($action)) $action = 'all';
if ( isset($_GET['action']) )
{
	$action = $_GET['action'];
}
else
{
	$action = 'all';
}

if ($action == 'published') $dataselect = 1;
if ($action == 'submitted') $dataselect = 2;
if ($action == 'all') $dataselect = 3;
if ($action == 'online') $dataselect = 4;
if ($action == 'offline') $dataselect = 5;
if ($action == 'autoexpire') $dataselect = 6;
if ($action == 'autoart') $dataselect = 7;
if ($action == 'expired') $dataselect = 8;
if ($action == 'noshowart') $dataselect = 9;
xoops_cp_header();

    	$articlearray = WfsArticle::getAllArticle($wfsConfig['lastart'], $start, $xoopsOption, $dataselect);

// it will operate incorrectly, if there are many records.
//		$scount = count(WfsArticle::getAllArticle($wfsConfig['lastart'], 0, 0, $dataselect));
//		$totalcount = count(WfsArticle::getAllArticle(0, 0, 0, $dataselect));
		$totalcount = WfsArticle::getNumArticle($dataselect);

// unify a article menu and a title
		echo "<div><h4>"._AM_ARTICLEMANAGEMENT.": ";
		if ($action == 'all')        echo _AM_ALLARTICLES;
		if ($action == 'published')  echo _AM_PUBLARTICLES;
		if ($action == 'submitted')  echo _AM_SUBLARTICLES;
		if ($action == 'online')     echo _AM_ONLINARTICLES;
		if ($action == 'offline')    echo _AM_OFFLIARTICLES;
		if ($action == 'autoexpire') echo _AM_AUTOEXPIREARTICLES;
		if ($action == 'expired')    echo _AM_EXPIREDARTICLES;
		if ($action == 'autoart')    echo _AM_AUTOARTICLES;
		if ($action == 'noshowart')  echo _AM_NOSHOWARTICLES;
		echo "</h4></div>";

// display at first page
		if (empty($start))
		{
// add adminmenu flag

			if ($wfsAdminMenu) adminmenu();

// display number of articles by articlemenu
			articlemenu();

			echo "<table width='100%' border='0' cellpadding ='2' cellspacing='1' class='outer'>";
			echo "<tr><td class='even'>";
			if ($action == 'all')        echo _AM_ALLTXT;
			if ($action == 'published')  echo _AM_PUBLISHEDTXT;
			if ($action == 'submitted')  echo _AM_SUBMITTEDTXT;
			if ($action == 'online')     echo _AM_ONLINETXT;
			if ($action == 'offline')    echo _AM_OFFLINETXT;
			if ($action == 'autoexpire') echo _AM_AUTOEXPIRETXT;
			if ($action == 'expired')    echo _AM_EXPIREDTXT;
			if ($action == 'autoart')    echo _AM_AUTOTXT;
			if ($action == 'noshowart')  echo _AM_NOSHOWTXT;
			echo "</tr></td></table>";
		}

		echo "<table border='1' width='100%' cellpadding ='2' cellspacing='1'>";
    	echo "<tr class='bg3'>";
		echo "<td align='center'><b>"._AM_STORYID."</td>";
		echo "<td align='center'><b>"._AM_TITLE."</td>";
		echo "<td align='center'><b>"._AM_CATEGORYT."</td>";
		echo "<td align='center'><b>"._AM_POSTER."</td>";
		echo "<td align='center' class='nw'><b>"._AM_STATUS."</td>";
		echo "<td align='center' class='nw'><b>"._AM_WEIGHT."</td>";
		if ($action == 'all') echo "<td align='center' class='nw'><b>"._AM_CREATED."</td>";
		if ($action == 'published') echo "<td align='center' class='nw'><b>"._AM_PUBLISHED."</td>";
		if ($action == 'autoart') echo "<td align='center' class='nw'><b>"._AM_PUBLISHEDON."</td>";
		if ($action == 'autoexpire') echo "<td align='center' class='nw'><b>"._AM_EXPIRED."</td>";
		if ($action == 'expired') echo "<td align='center' class='nw'><b>"._AM_EXPARTS."</td>";
		if ($action == 'submitted') echo "<td align='center' class='nw'><b>"._AM_SUBMITTED2."</td>";
		echo "<td align='center'><b>"._AM_ACTION."</td></b>";
		echo "</tr>";
		
		if (count($articlearray) == '0') echo "<tr ><td align='center' colspan ='10' class = 'head'><b>No Articles found</b></td></tr>";
		
		for ( $i = 0; $i < count($articlearray); $i++ ) {
			$allarticles = array();
            $allarticles['status'] = ($articlearray[$i]->offline == '0' ) ? "Online" : "Offline";
			if ($action == 'published')	$allarticles['published'] = ($articlearray[$i]->published() > '0') ? formatTimestamp($articlearray[$i]->published(), "$wfsConfig[timestamp]" ) : "Not published";
			if ($action == 'all')	$allarticles['created'] = ($articlearray[$i]->created() > '0') ? formatTimestamp($articlearray[$i]->created(), "$wfsConfig[timestamp]" ) : "Not published";
			if ($action == 'autoart') $allarticles['auto'] = ($articlearray[$i]->published() >= time()) ? formatTimestamp($articlearray[$i]->published(), "$wfsConfig[timestamp]" ) : "Not published";
			if ($action == 'autoexpire') $allarticles['aexpire'] = ($articlearray[$i]->expired() > time()) ? formatTimestamp($articlearray[$i]->expired(), "$wfsConfig[timestamp]" ) : " ----- ";
			if ($action == 'expired') $allarticles['expired'] = ($articlearray[$i]->expired() < time()) ? formatTimestamp($articlearray[$i]->expired(), "$wfsConfig[timestamp]" ) : " ----- ";
			if ($action == 'submitted')	$allarticles['submit'] = ($articlearray[$i]->published() == '0') ? formatTimestamp($articlearray[$i]->created(), "$wfsConfig[timestamp]" ) : "Not published";
   			$allarticles['weight'] = ($articlearray[$i]->weight());
            $allarticles['topic'] = $articlearray[$i]->categoryTitle();
            $allarticles['page'] = $articlearray[$i]->page();
        	$allarticles['articleid'] = $articlearray[$i]->articleid();
            $allarticles['artlink'] = "<a href='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/article.php?articleid=".$articlearray[$i]->articleid()."'>".$articlearray[$i]->title()."</a>";
            $allarticles['artuser'] = "<a href='".XOOPS_URL."/userinfo.php?uid=".$articlearray[$i]->uid()."'>".$articlearray[$i]->uname()."</a>";
            $allarticles['edit'] = "<a href='index.php?op=edit&amp;articleid=".$articlearray[$i]->articleid()."'>"._AM_EDIT."</a>-<a href='index.php?op=delete&amp;articleid=".$articlearray[$i]->articleid()."&amp;page=".$articlearray[$i]->page()."'>"._AM_DELETE."</a>";

        	echo "<tr><td align='center' class = 'head'><b>".$allarticles['articleid']."</b>";
        	echo "</td><td align='left' class = 'even'>".$allarticles['artlink']."";
        	echo "</td><td align='center' class = 'odd'>".$allarticles['topic']."";
        	echo "</td><td align='center' class = 'even'>".$allarticles['artuser']."";
        	echo "</td><td align='center' class = 'odd'>".$allarticles['status']."";
        	echo "</td><td align='center' class = 'even'>".$allarticles['weight']."";
			if ($action == 'all') echo "</td><td align='center' class='odd'>".$allarticles['created']."";	
			if ($action == 'submitted') echo "</td><td align='center' class='odd'>".$allarticles['submit']."";
			if ($action == 'published') echo "</td><td align='center' class='odd'>".$allarticles['published']."";
			if ($action == 'autoart') echo "</td><td align='center' class='odd'>".$allarticles['auto']."";
			if ($action == 'autoexpire') echo "</td><td align='center' class='odd'>".$allarticles['aexpire']."";
			if ($action == 'expired') echo "</td><td align='center' class='odd'>".$allarticles['expired']."";
			echo "</td><td align='center' class='even'>".$allarticles['edit']."";
			
       		echo "</td></tr>";
        	unset($allarticles);
    	}

    	echo "</table><br />";

// it will operate incorrectly, if there are many records.
//		if ( $totalcount > $scount ) {
		if ( $totalcount > $wfsConfig['lastart'] ) {

			include_once XOOPS_ROOT_PATH.'/class/pagenav.php';

// take over the order to previos and next page
//			$pagenav = new XoopsPageNav($totalcount, $wfsConfig['lastart'], $start, 'start', 'lastarts='.$xoopsOption, 1);
			$orderbyOut = convertorderbyout($orderby);
			$pagenav = new XoopsPageNav($totalcount, $wfsConfig['lastart'], $start, 'start', 'lastarts='.$xoopsOption.'&amp;orderby='.$orderbyOut.'&amp;action='.$action, 1);

			echo "<div style='text-align: center;' class = 'head'>".$pagenav->renderNav()."</div><br />";
            } else {
			echo '';
			}
    		echo"<br />";
			
			
		if ($totalcount > 1) {
			echo "<table border='0' cellpadding='1' cellspacing='1' width='100%' class = 'outer'>";
			echo "<tr><td align='center' class='even' colspan='5'>";
			$orderbyTrans = convertorderbytrans($orderby);
			echo "<small><center>" . _WFS_SORTBY1 . "&nbsp;";

// take over the order to previos and next page
// bug fix : phase error: allarticles -> href
//       		echo "&nbsp;" . _WFS_ARTICLEID1 . " (<a href='allarticles.php?orderby=articleidA'><img src='../images/up.gif' border='0' align='middle' alt='' /></a><a href='allarticles.php?orderby=articleidD'><img src='../images/down.gif' border='0' align='middle' alt='' /></a>)";
//       		echo "&nbsp;" . _WFS_TITLE1 . " (<a href='allarticles.php?orderby=titleA'><img src='../images/up.gif' border='0' align='middle' alt='' /></a><a href='allarticles.php?orderby=titleD'><img src='../images/down.gif' border='0' align='middle' alt='' /></a>)";
//       		echo "&nbsp;" . _WFS_DATE1 . " (<a href='allarticles.php?orderby=createdA'><img src='../images/up.gif' border='0' align='middle' alt='' /></a><a href='allarticles.php?orderby=createdD'><img src='../images/down.gif' border='0' align='middle' alt='' /></a>)";
//      		echo "&nbsp;" . _WFS_WEIGHT . " (<a href='allarticles.php?orderby=weight'>Reset</a>)";
//			if ($action != 'offline') echo "&nbsp;" . _WFS_RATING1 . " (<a href='allarticles.php?orderby=ratingA'><img src='../images/up.gif' border='0' align='middle' alt='' /></a><a href=allarticles.php?orderby=ratingD><img src='../images/down.gif' border='0' align='middle' alt='' /></a>)";
//			if ($action != 'offline') echo "&nbsp;" . _WFS_POPULARITY1 . " (<a href='allarticles.php?orderby=counterA'><img src='../images/up.gif' border='0' align='middle' alt='' /></a><a allarticles='index.php?orderby=counterD'><img src='../images/down.gif' border='0' align='middle' alt='' /></a>)";
//       		if ($action == 'offline') echo "&nbsp;" . _WFS_SUBMIT1 . " (<a href='allarticles.php?orderby=submitA'><img src='../images/up.gif' border='0' align='middle' alt='' /></a><a href='allarticles.php?orderby=submitD'><img src='../images/down.gif' border='0' align='middle' alt='' /></a>)";

			echo "&nbsp;" . _WFS_ARTICLEID1 . " (<a href='allarticles.php?orderby=articleidA&amp;action=$action'><img src='../images/up.gif' border='0' align='middle' alt='' /></a><a href='allarticles.php?orderby=articleidD&amp;action=$action'><img src='../images/down.gif' border='0' align='middle' alt='' /></a>)";
			echo "&nbsp;" . _WFS_TITLE1 . " (<a href='allarticles.php?orderby=titleA&amp;action=$action'><img src='../images/up.gif' border='0' align='middle' alt='' /></a><a href='allarticles.php?orderby=titleD&amp;action=$action'><img src='../images/down.gif' border='0' align='middle' alt='' /></a>)";
			echo "&nbsp;" . _WFS_DATE1 . " (<a href='allarticles.php?orderby=createdA&amp;action=$action'><img src='../images/up.gif' border='0' align='middle' alt='' /></a><a href='allarticles.php?orderby=createdD&amp;action=$action'><img src='../images/down.gif' border='0' align='middle' alt='' /></a>)";
echo "&nbsp;" . _WFS_WEIGHT . " (<a href='allarticles.php?orderby=weight&amp;action=$action'>Reset</a>)";
			if ($action != 'offline') echo "&nbsp;" . _WFS_RATING1 . " (<a href='allarticles.php?orderby=ratingA&amp;action=$action'><img src='../images/up.gif' border='0' align='middle' alt='' /></a><a href='allarticles.php?orderby=ratingD&amp;action=$action'><img src='../images/down.gif' border='0' align='middle' alt='' /></a>)";
			if ($action != 'offline') echo "&nbsp;" . _WFS_POPULARITY1 . " (<a href='allarticles.php?orderby=counterA&amp;action=$action'><img src='../images/up.gif' border='0' align='middle' alt='' /></a><a href='allarticles.php?orderby=counterD&amp;action=$action'><img src='../images/down.gif' border='0' align='middle' alt='' /></a>)";
			if ($action == 'offline') echo "&nbsp;" . _WFS_SUBMIT1 . " (<a href='allarticles.php?orderby=submitA&amp;action=$action'><img src='../images/up.gif' border='0' align='middle' alt='' /></a><a href='allarticles.php?orderby=submitD&amp;action=$action'><img src='../images/down.gif' border='0' align='middle' alt='' /></a>)";

			echo "<br /><b><small>";
			printf(_WFS_CURSORTBY1, $orderbyTrans);
			$orderby = convertorderbyout($orderby);
			echo "</small></b></center>";
			echo "</td></tr></table>";
		}
wfsfooter();
xoops_cp_footer();
?>
