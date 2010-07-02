<?php
// $Id: index.php,v 1.7 2006/05/28 09:14:19 ohwada Exp $

// 2006-05-26 K.OHWADA
// BUG 8482: HTML grammer error
// required <tr>
// double <tr>
// <br> to <br />

// 2006-03-31 K.OHWADA
// BUG 8243: cannot change the number of articles

// 2006-03-17 K.OHWADA
// $HTTP_POST_VARS -> $_POST
// $HTTP_GET_VARS  -> $_GET
// BUG 8186: page number is displayed too many

// 2005-05-13 naomi & K.OHWADA
// BUG 217: category link is wrong

// 2005-03-08 aiba & K.OHWADA
// BUG 7854: redundant samll tag

// 2004-07-26 Okuhiki & K.OHWADA
// BUG 75: the HTML tag of header image is wrong

// 2004/02/25 cache
// take over the order to previos and next page
// bug fix : <TD> -- </TD> has not closed

// 2004/01/29 herve 
// multi language
//   add _WFS_ERROR_IMAGE

// 2003/12/21 K.OHWADA
// bug fix
//  category description shows </ br> not line feed.

// 2003/10/11 K.OHWADA
// easy to rename module and table
//   add conf.php
//   change function listArticle
// bug fix
//   it can't jump at Path and local select box

include '../../mainfile.php';

include_once 'conf.php';	// add

include_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/include/groupaccess.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/class/wfscategory.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/class/wfsarticle.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/class/wfstree.php';

// --------------------------------------------------------
function listcategory($listtype = 0) 
{
	global $xoopsDB, $xoopsConfig, $xoopsModule, $myts, $wfsConfig;

	
	echo"<table border='0' cellspacing='1' cellpadding ='3' class='outer' width = 100%>";
	echo "<tr><td align='left' width ='15%' class='itemHead'><b>" . _WFS_CATEGORY . "</b></td>";
	echo "<td align='left' class='itemHead'><b>" . _WFS_CATEGORYDESC . "</b></td>";
	if ($wfsConfig['showMarticles']) {
		echo "<td align='center' class='itemHead' width ='20%'><b>" . _WFS_ARTICLES . "</b></td>"; 
	}
	if ($wfsConfig['showMupdated']) {
		echo "<td align='center' class='itemHead'><b>" . _WFS_LASTUPDATE . "</b></td>"; 
	}

// required <tr>
	echo "</tr>\n";

		$xt = new WfsCategory();
		$maintopics = $xt->getFirstChild();
		$deps = 0;
		$listtype = intval($listtype);
		showcategory($maintopics, 0, $listtype);
	echo "</table>\n";

// double <tr>
//	echo"<table border='0' cellspacing='1' ><tr>";
	if ($wfsConfig['indexheader'])
	{
//		echo "<tr><br>";

		echo "<br />\n";
		echo "<table border='0' cellspacing='1' ><tr>";
		echo "<td align='left'>".$myts->makeTareaData4Show($wfsConfig['indexfooter'],1,1,1)."</td>";
		echo "</tr></table>\n";

	}
//	echo "</tr></table>\n";

} 

function showcategory($categorys, $deps = 0, $listtype = 0) 
{

	global $xoopsConfig, $xoopsDB, $xoopsUser, $xoopsModule, $wfsConfig, $myts, $groupid, $listtype;
	
	foreach($categorys as $onecat) {
	
		$num = WfsArticle::countByCategory($onecat->id());
		$link = XOOPS_URL . '/modules/' . $xoopsModule->dirname() . '/index.php?category=' . $onecat->id();
		$title = $myts->makeTboxData4Show($onecat->title());
		if ($wfsConfig['shortcat']) {
					if ( !XOOPS_USE_MULTIBYTES ) {
						if (strlen($title) >= 19) {
							$title = substr($title,0,18)."...";
						}
					}
                }
		$title = '<a href=' . $link . '>' . $title . '</a>';

// bug fix : category description shows </ br> not line feed.
//		$description = $myts->makeTboxData4Show($onecat->description('S'));
		$description = $onecat->description('S');

		$sarray = WfsArticle::getAllArticle(0, 0, $onecat->id(), $dataselect = '4');

		if ($num) { 
			$updated = formatTimestamp(WfsArticle::getLastChangedByCategory($onecat->id()), "$wfsConfig[timestamp]");
		}

		if (file_exists(XOOPS_ROOT_PATH . "/" . $wfsConfig['sgraphicspath'] . "/" . $onecat->imgurl) && !empty($onecat->imgurl)) {
			$image = "<br />".str_repeat("&nbsp;&nbsp;", $deps)."<img src='" . XOOPS_URL . "/" . $wfsConfig['sgraphicspath'] . "/" . $onecat->imgurl("S") . "'>	";
		} else {
			$image = ''; 
		}

	if (checkAccess($onecat->groupid))  {	
		// Start of html code
		echo "<tr>";
		//echo "<td valign = 'top' nowrap='nowrap' class='head' onmouseover='this.style.cursor=\"hand\";' onclick='window.location.href=\"" . $link . "\"'>";
		//echo str_repeat("&nbsp;&nbsp;", $deps) . $title . "";
		//	if ($wfsConfig['showcatpic']) { 
		//		echo $image;
		//	}	 
		//echo "</td>";
		echo "<td class = 'even' align='left' valign = 'top'>";
		echo str_repeat("&nbsp;&nbsp;", $deps) . $title . "";
			if ($wfsConfig['showcatpic']) { 
				echo $image;
			}
		echo "</td>";
		echo "<td class = 'even' align='left' valign = 'top'>".$description."</td>";
						
		if (($wfsConfig['showMarticles']) && !empty($listtype)) {
			echo "<td class='even' valign='top' align='left' nowrap='nowrap'>";
				foreach ($sarray as $article) {
			   		if (checkAccess($article->groupid, 0)) {
						//echo "<a href='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/article.php?articleid=" . $article->articleid() . "'>" . $article->iconLink() . "</a><br />";
						
						echo "<a href='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/article.php?articleid=" . $article->articleid() . "'>";
						if ($wfsConfig['picon'] == true) {
						echo "".$article->iconLink() . "</a><br />";
						} else {
						echo "".$article->textLink() . "</a><br />";
						
			}
					
					}
				} 
			echo "</td>";
		} 

		if (($wfsConfig['showMarticles']) && empty($listtype)) {
			echo "<td align='center' valign='top' class='even'>".$num."</td>"; 
		}
		if ($num) $updated = formatTimestamp(WfsArticle::getLastChangedByCategory($onecat->id()), "$wfsConfig[timestamp]");
	
		if ($wfsConfig['showMupdated'])	{

// bug fix : <TD> -- </TD> has not closed
//			echo "<td align='center' valign='top' class='even' width ='12%' >"; if ($num) echo $updated; "</td>"; 
			echo "<td align='center' valign='top' class='even' width ='12%' >";
			if ($num) echo $updated;
			echo "</td>"; 

		}
		echo "</tr>\n";
	
		//Show any sub cats if submenu == true
			$childcat = $onecat->getFirstChild();
				if ($wfsConfig['submenus'] == '1') {
					if ($childcat) {
						showcategory($childcat, $deps + 2, $listtype);
					} 
				} 
			} 
		} 
} 

function listArticle($catid, $start = 0, $num = 20) 
{
	global $xoopsDB, $orderby, $xoopsConfig, $xoopsUser, $xoopsModule, $wfsConfig, $myts, $counter, $mydownloads_popular, $dataselect;
	
	global $wfsModule;	// add
	
	$xt = new WfsCategory($catid);
 
	if (file_exists(XOOPS_ROOT_PATH . "/" . $wfsConfig['sgraphicspath'] . "/" . $xt->imgurl) && $xt->imgurl !='blank.gif' ) {
		$image = "<img src='" . XOOPS_URL . "/" . $wfsConfig['sgraphicspath'] . "/" . $xt->imgurl("S") . "'>";
	} else {
		if ($xoopsUser && $xoopsUser->isAdmin($xoopsModule->mid()) && $xt->imgurl !='blank.gif') {

// multi language
//			$image = "ERROR: Please check path/file for image";
			$image = "<font color=red>"._WFS_ERROR_IMAGE."</font>";

		} else {
			$image = '';
		} 
	} 

	$title = $xt->title() ;
	$catdescription = $xt->catdescription('S');

	echo "<table border='0' cellpadding='2' cellspacing='1' valign='top' align = 'center' width = '100%'>";
	if ((!empty($xt->imgurl) && $xt->displayimg == 1)) {
		echo "<tr><td colspan='5' align='center'>".$image."</td></tr>\n";
	} 
	echo "<tr><td colspan='5' align='center'>&nbsp;</td></tr>\n";
	echo "<tr><td colspan='5' align='center'><h3>".$title."</h3></td></tr>\n";
	
	echo "<tr><td>";
	// -- Skalpack2 [start]

// easy to rename module and table
//	$jump = XOOPS_URL."/modules/wfsection/index.php?";
	$jump = XOOPS_URL."/modules/$wfsModule/index.php?";

	$tree = new wfsTree($xt->table, "id", "pid");
	switch ($wfsConfig['aidxpathtype']) {
	case 1:	// Local selectbox
		$tree->makeMyRootedSelBox('title', 'title', $xt->id, true, $xt->id, true, "", "location.href='{$jump}category='+this.options[this.selectedIndex].value");
		break;
	case 2:	// Linked path

// BUG 217: category link is wrong
//		echo preg_replace('/&id=/', '&category=', $tree->getNicePathFromId($xt->id, "title", $jump));
		echo preg_replace('/&amp;id=/', '&category=', $tree->getNicePathFromId($xt->id, "title", $jump));

		break;
	case 3: // Path and local select box

// BUG 217: category link is wrong
//		echo preg_replace('/&id=/', '&category=', $tree->getNicePathFromId($xt->pid, "title", $jump));
		echo preg_replace('/&amp;id=/', '&category=', $tree->getNicePathFromId($xt->pid, "title", $jump));

// bug fix: it can't jump at Path and local select box
//		$tree->makeMySelBox('title', 'title', $xt->id, true, $xt->id, true, "", "location.href='{$jump}category='+this.options[this.selectedIndex].value");
		$tree->makeMyRootedSelBox('title', 'title', $xt->id, true, $xt->id, true, "", "location.href='{$jump}category='+this.options[this.selectedIndex].value");

		break;
	case 4:	// None
		break;
	case 0: // Full selectbox
	default:
		$xt->makeSelBox(1, $xt->id, "pid", "location.href='{$jump}category='+this.options[this.selectedIndex].value")."";
		break;
	}
// -- Skalpack2 [/end]	echo "</td></td>";
	
	echo "<tr><td colspan='5'><br />$catdescription<br /></td></tr>\n";
	echo "<tr><td colspan='5'>&nbsp;</td></tr>\n";
	echo "</table>\n";
				
	$sarray = WfsArticle::getAllArticle($num, $start, $catid, $dataselect='4');
	$articlecount = WfsArticle::countByCategory($catid);
	echo "<table border='0' cellpadding='2' cellspacing='1' width = '100%' class= 'outer'>";
	If ($articlecount != 0) {
		
		echo "<tr align='left'>"; 
		// These will always be shown
		echo "<td align='left' width = '30%' class='itemHead'><b>" . _WFS_ARTICLE . "</b></td>";
		if ($wfsConfig['summary']) {
			echo "<td align='left' width = '50%' class='itemHead'><b>" . _WFS_SUMMARY . "</b></td>"; 
		}
		// You can choose which of these to show
		if ($wfsConfig['showauthor']) 
		   echo "<td align='center' class='itemHead'><b>" . _WFS_AUTH . "</b></td>";
		if ($wfsConfig['showhits']) echo "<td align='center' class='itemHead'><b>" . _WFS_HITS . "</b></td>";
		if ($wfsConfig['showcomments']) { 
			if ($wfsConfig['comments']) echo "<td align='center' class='itemHead'><b>" . _WFS_COMMENT . "</b></td>";
		}
		if ($wfsConfig['showfile']) echo "<td align='center' class='itemHead'><b>" . _WFS_FILES . "</b></td>";
		if ($wfsConfig['novote']) {
			if ($wfsConfig['showrated']) echo "<td align='center' class='itemHead'><b>" . _WFS_RATED . "</b></td>";
		}
		if ($wfsConfig['novote']) {
			if ($wfsConfig['showvotes']) echo "<td align='center' class='itemHead'><b>" . _WFS_VOTES . "</b></td>";
		}
		if ($wfsConfig['showupdated']) echo "<td align='center' class='itemHead'><b>" . _WFS_PUBLISHEDHOME . "</b></td>";
		echo "</tr>\n";

		foreach ($sarray as $article) {
			$counter = $article->counter();
			$time = $article->created();
			$stat = $article->changed();
			$articlelink = "<a href='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/article.php?articleid=" . $article->articleid() . "'>";
			if ($wfsConfig['picon']) {
				$articlelink .= "".$article->iconLink("S") . "</a>";
			} else {
				$articlelink .= "".$article->textLink("S") . "</a>";
			}
			
			$summary = $article->summary();
			$published = formatTimestamp($article->published(), $wfsConfig['timestamp']);
			$counter = $article->counter();
			if ($wfsConfig['comments']) $commentcount = $article->getCommentsCount();
			$attachedfiles = $article->getFilesCount();
			
			if ($article->uid > 0) {
				$user = new xoopsUser($article->uid);
				if (($wfsConfig['realname']) && $user->getvar('name')) {
						$username = $user->getvar('name');
					} else {
				   		$username = $user->getvar('uname');
					} 
				$username = "<a href='".XOOPS_URL."/userinfo.php?uid=".$article->uid()."'>".$username."</a>";
			} else {
				$username = $GLOBALS['xoopsConfig']['anonymous'];
			}
						
			//$username = "<a href='" . XOOPS_URL . "/userinfo.php?uid=" . $article->uid() . "'>" . $article->uname() . "</a>";
			if ($wfsConfig['novote']) $rating = number_format($article->rating, 2);
			$groupid = $article->groupid;
			if ($wfsConfig['novote']) $votes = $myts->makeTboxData4Show($article->votes) ;
			$status = 1;
			$orderbyTrans = convertorderbytrans($orderby);

			if ($stat != $time) $status = 2;
			if (checkAccess($groupid)) {
			
				echo "<tr><td valign='top' class='even'>$articlelink";
				if ($wfsConfig['noicons']) { 
				popgraphic($counter);
				newdownloadgraphic($time, $status);
				}
				echo "</td>";
				if ($wfsConfig['summary']) echo "<td valign='top' class='even'>$summary</td>";
				if ($wfsConfig['showauthor']) echo "<td align='center'  valign='top' class='even' nowrap='nowrap'>$username</td>";
				if ($wfsConfig['showhits']) echo "<td align='center'  valign='top' class='even'>$counter</td>";
				//if ($wfsConfig['comments']) {
				if ($wfsConfig['showcomments']) { 
					if ($wfsConfig['comments']) echo "<td align='center'  valign='top' class='even'>$commentcount</td>";
				}
				if ($wfsConfig['showfile']) echo "<td align='center'  valign='top' class='even'>$attachedfiles</td>";
				if ($wfsConfig['novote']) {
					if ($wfsConfig['showrated']) echo "<td align='center'  valign='top' class='even'>$rating</td>";
					if ($wfsConfig['showvotes']) echo "<td align='center'  valign='top' class='even'>$votes</td>";
				}
				if ($wfsConfig['showupdated']) {
					echo "<td align='center' nowrap='nowrap' valign='top' class='even'>$published</td></tr>\n";
				} 
			} 
		} //end check access
	} 
	echo "</table>\n";

	if ($articlecount > $num) {
		echo "<table border='0' width='100%' cellpadding='0' cellspacing='0' align='center' valign='top'><tr><td align='center'>";

// take over the order to previos and next page
//		if ($articlecount < $start + $num) echo "<a href='index.php?category=" . $catid . "&amp;start=" . ($start - $num) . "'>" . _WFS_PREVPAGE . "</a>&nbsp;";
//		if ($articlecount > $start + $num) echo "<a href='index.php?category=" . $catid . "&amp;start=" . ($start + $num) . "'>" . _WFS_NEXTPAGE . "</a>&nbsp;";

		$orderbyOut = convertorderbyout($orderby);
		if ($articlecount < $start + $num) echo "<a href='index.php?category=" . $catid . "&amp;start=" . ($start - $num) . "&amp;orderby=" . $orderbyOut . "'>" . _WFS_PREVPAGE . "</a>&nbsp;";
		if ($articlecount > $start + $num) echo "<a href='index.php?category=" . $catid . "&amp;start=" . ($start + $num) . "&amp;orderby=" . $orderbyOut . "'>" . _WFS_NEXTPAGE . "</a>&nbsp;";

// BUG 8186: page number is displayed too many
//		for($i = 0, $j = 1; $i <= $articlecount; $i += $num, $j++) 
		for($i = 0, $j = 1; $i < $articlecount; $i += $num, $j++) 

		{
			if (($i <= $start) && ($start < ($i + $num))) {
				echo $j . "&nbsp;";
			} else {

// take over the order to previos and next page
//				echo "<a href='index.php?category=" . $catid . "&amp;start=" . ($i) . "'>" . ($j) . "</a>&nbsp;";
				echo "<a href='index.php?category=" . $catid . "&amp;start=" . ($i) . "&amp;orderby=" . $orderbyOut . "'>" . ($j) . "</a>&nbsp;";

			} 
		} 
		echo "</td></tr></table>\n";
	} 

	echo "<table cellpadding='2' cellspacing='1' width='100%'>";
	if ($xt->catfooter)
	{
		echo "<tr><td><br />\n";
		echo $xt->catfooter('S') . "<br /><br />\n";
		echo "</td></tr>\n";
	}
	echo "</table>\n";

	echo "<table border='0' cellpadding='1' cellspacing='1' width='100%'>";
	if (!$xt->catfooter) echo "<br />";
	echo "<tr><td align='center' class='head' >[ <a href='javascript:history.back(1)'>" . _WFS_BACK2 . "</a> | <a href='./index.php'>" . _WFS_RETURN2INDEX . "</a> ]</a></td></tr>\n";
	echo "</table>\n";
	echo "<br />";

	if (($articlecount > 0)) {
		echo "<table border='0' cellpadding='1' cellspacing='1' width='100%' class = 'outer'>";
		echo "<tr><td align='center' class='even'>";
		$orderbyTrans = convertorderbytrans($orderby);

// BUG 7854: redundant samll tag
//		echo "<small><center>" . _WFS_SORTBY1 . "&nbsp;";
		echo "<center>" . _WFS_SORTBY1 . "&nbsp;";

       	echo "  " . _WFS_TITLE1 . " (<a href='index.php?category=$catid&orderby=titleA'><img src='images/up.gif' border='0' align='middle' alt='' /></a><a href='index.php?category=$catid&orderby=titleD'><img src='images/down.gif' border='0' align='middle' alt='' /></a>)";
       	echo "  " . _WFS_DATE1 . " (<a href='index.php?category=$catid&orderby=createdA'><img src='images/up.gif' border='0' align='middle' alt='' /></a><a href='index.php?category=$catid&orderby=createdD'><img src='images/down.gif' border='0' align='middle' alt='' /></a>)";
	    echo "  " . _WFS_WEIGHT . " (<a href='index.php?category=$catid&orderby=weight'>Reset</a>)";

      	if ($wfsConfig['novote']) {
		echo "	" . _WFS_RATING1 . " (<a href='index.php?category=$catid&orderby=ratingA'><img src='images/up.gif' border='0' align='middle' alt='' /></a><a href=index.php?category=$catid&orderby=ratingD><img src='images/down.gif' border='0' align='middle' alt='' /></a>)";
       	}
		echo "	" . _WFS_POPULARITY1 . " (<a href='index.php?category=$catid&orderby=counterA'><img src='images/up.gif' border='0' align='middle' alt='' /></a><a href='index.php?category=$catid&orderby=counterD'><img src='images/down.gif' border='0' align='middle' alt='' /></a>)";
       
		echo "<br /><b><small>";
		printf(_WFS_CURSORTBY1, $orderbyTrans);
		$orderby = convertorderbyout($orderby);
		echo "</small></b></center>";
		echo "</td></tr></table>\n";
	} 

} 
// --------------------------------------------------------

// Start of WF-Section here
global $xoopsModule, $xoopsUser, $xoopsDB, $myts, $wfsConfig;

if (isset($_GET['category']) && ereg("^[0-9]{1,}$", $_GET['category'])) {
	$category = $_GET['category'];
} else {
	$category = 0;
} 

if (isset($_GET['start']) && is_numeric($_GET['start'])) {
	$start = $_GET['start'];
} else {
	$start = 0;
} 

if (isset($_GET['orderby'])) {
	$orderby = convertorderbyin($_GET['orderby']);
} else {
	// -- Skalpack2 [start]
	//$orderby = 'title ASC'];
	$orderby = $wfsConfig['aidxorder'];
// -- Skalpack2 [/end]
} 

$listtype = $wfsConfig['toppagetype'];

if (isset($_GET['listtype'])) $listtype = intval($_GET['listtype']);

include '../../header.php';

if (empty($category)) {
	listcategory($listtype);
} else {
	listArticle($category, $start, $wfsConfig['articlesapage']);
} 

include_once 'footer.php';

?>
