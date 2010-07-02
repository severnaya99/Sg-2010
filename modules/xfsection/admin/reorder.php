<?php
// $Id: reorder.php,v 1.3 2006/03/20 03:23:03 ohwada Exp $

// 2006-03-17 K.OHWADA
// dont use foreach($HTTP_POST_VARS as $k => $v)
// $HTTP_POST_VARS   -> $_POST
// $HTTP_GET_VARS    -> $_GET

// 2004/03/27 K.OHWADA
// multi language

// 2004/02/28 K.OHWADA
// add adminmenu flag
// same title as admin menu

// 2004/02/25 cache
// bug fix : can't display ten or more articles

// 2003/10/11 K.OHWADA
// easy to rename module and table

// WFSECTION
// Powerful Section Module for XOOPS
// Admin Main

include("admin_header.php");
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/wfscategory.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/wfsarticle.php';

$op="";
if (isset($_GET['op'])) $op=$_GET['op'];
if (isset($_POST['op'])) $op=$_POST['op'];


// define $cat
$cat = array();
if ( isset($_POST['cat'] )) 
{
	$cat = $_POST['cat'];
} 

// define $orders
$orders = array();
if ( isset($_POST['orders'] )) 
{
	$orders = $_POST['orders'];
} 

// define $art
$art = array();
if ( isset($_POST['art'] )) 
{
	$art = $_POST['art'];
} 

// define $weight
$weight = array();
if ( isset($_POST['weight'] )) 
{
	$weight = $_POST['weight'];
}

switch($op)
{

case "reorder":	

//	global $orders, $cat;

	for ( $i = 0; $i < count($orders); $i++ ) 
	{

// easy to rename module and table
//		$xoopsDB->queryF("update ".$xoopsDB->prefix("wfs_category")." set orders = ".$orders[$i]." WHERE id=$cat[$i]");	
		$xoopsDB->queryF("update ".$xoopsDB->prefix($wfsTableCategory)." set orders = ".$orders[$i]." WHERE id=$cat[$i]");	

	}

// multi language
//  redirect_header("reorder.php",1,"Categories have been re-ordered!");
    redirect_header("reorder.php",1,_AM_CATEGORY_REORDERED);

break;

case "reaorder":	

//	global $weight, $art, $catid;

	for ( $i = 0; $i < count($weight); $i++ ) 
	{
	
// easy to rename module and table
//		$xoopsDB->queryF("update ".$xoopsDB->prefix("wfs_article")." set weight = ".$weight[$i]." WHERE articleid=$art[$i]");	
		$xoopsDB->queryF("update ".$xoopsDB->prefix($wfsTableArticle)." set weight = ".$weight[$i]." WHERE articleid=$art[$i]");	

	}

// multi language
//  redirect_header("reorder.php",1,"Articles have been re-ordered!");
    redirect_header("reorder.php",1,_AM_ARTICLE_REORDERED);

break;

default:

xoops_cp_header();
	    
global $xoopsDB, $xoopsConfig, $xoopsModule, $wfsConfig;

$category = 0;
$start = 0;
$listtype = 0;

function listcategory($listtype = 0) {

	global $xoopsDB, $xoopsConfig, $xoopsModule;
	
	$orders = array();
	$cat = array();
	
	echo "<form name='reorder' METHOD='post'>";   
	echo "<table border='0' width='100%' cellpadding = '2' cellspacing ='1' class = 'outer'>";
		echo "<tr class = bg3>";
		echo "<td align='center' width=3% height =16 ><b>"._AM_REORDERID."</b>";
       	echo "</td><td align='center' width=3%><b>"._AM_REORDERPID."</b>"; 
		echo "</td><td align='left' width=30%><b>"._AM_REORDERTITLE."</b>";
        echo "</td><td align='left'><b>"._AM_REORDERDESCRIPT."</b>";
		echo "</td><td align='center' width=5%><b>"._AM_REORDERWEIGHT."</b>";
	    echo "</td></tr>";
		
		$xt = new WfsCategory();
		$maintopics = $xt->getFirstChild();
		$deps = 0;
		$listtype = intval($listtype);
		showcategory($maintopics, 0, $listtype);
		echo "<tr><td class='foot' align='center' colspan='6'>
		<input type='hidden' name='op' value=reorder />
		<input type='submit' name='submit' value='"._SUBMIT."' />
		
		</td></tr>";
	echo "</table>";
	echo "</form>";
} 

function showcategory($categorys, $deps = 0, $listtype = 0) {

	global $xoopsConfig, $xoopsDB, $xoopsModule, $listtype, $orders, $cat, $catid;
			
	foreach($categorys as $onecat) {
		
		$num = WfsArticle::countByCategory($onecat->id());
		$link = XOOPS_URL . '/modules/' . $xoopsModule->dirname() . '/admin/reorder.php?category=' . $onecat->id();
		$sarray = WfsArticle::getAllArticle(0, 0, $onecat->id(), $dataselect = '4');
		
		echo "<tr>";
		if ($deps == 0) {
			$class = 'head';
		}
		if ($deps == 2) {
			$class = 'even';
		}
		if ($deps >= 3) {
			$class = 'odd';
		}
		echo "<td align='left' class = $class>".$onecat->id."</td>";
		echo "<input type='hidden' name='cat[]' value='".$onecat->id."' />";
		echo "<td align='middle' class = $class>".$onecat->pid."</td>";
		echo "<td align='left' nowrap='nowrap' class = $class><a href='" . XOOPS_URL . '/modules/' . $xoopsModule->dirname() . '/admin/reorder.php?category=' . $onecat->id()."'>";
		echo "".str_repeat("&nbsp;&nbsp;", $deps) . $onecat->title . "</td>";
		echo "<td align='left' class = $class>".$onecat->description."</td>";
		echo "<td align='left' class = $class>";
		echo "<input type='text' name='orders[]' value='".$onecat->orders."' size='5' maxlenght='5'></td>";
		echo "</tr>";
		
		//Show any sub cats if submenu == true
		$childcat = $onecat->getFirstChild();
		if ($childcat) {
			showcategory($childcat, $deps + 2, $listtype);
		} 
	} 
} 

function listArticle($catid, $start = 0, $num = 20) {

	global $xoopsDB, $xoopsConfig, $xoopsModule, $wfsConfig, $weight, $art;
	
	$xt = new WfsCategory($catid);
	
	$weight = array();
	$art = array();
	
	$sarray = WfsArticle::getAllArticle($num, $start, $catid, $dataselect='1');

// bug fix : can't display ten or more articles
//	$articlecount = WfsArticle::countByCategory($catid);
	
	echo "<form name='reaorder' METHOD='post'>"; 
	echo "<table border='0' cellpadding='2' cellspacing='1' width = '100%' class = 'outer'>";
	
		echo "<tr align='left'>"; 
		echo "<td align='center' class='bg3' width = '3%'><b>"._AM_REORDERID."</b></td>";
		echo "<td align='left' width = '30%'class='bg3'><b>" . _AM_REORDERTITLE . "</b></td>";
		echo "<td align='left' width = '60%' class='bg3'><b>" . _AM_REORDERSUMMARY . "</b></td>"; 
		echo "<td align='center' width = '17%' class='bg3'><b>" . _AM_REORDERWEIGHT . "</b></td>";
		echo "</tr>";

// bug fix : can't display ten or more articles
//	if ($articlecount != 0) {
	if ($num != 0) {

		foreach ($sarray as $article) {
			$articlelink = "";
				
			echo "<tr>";
			echo "<td class='head'>$article->articleid</td>";
			echo "<td class='even' nowrap='nowrap'><a href='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/admin/index.php?op=edit&articleid=" . $article->articleid() . "'>" . $article->title() . "</a></td>";
			echo "<input type='hidden' name='art[]' value='".$article->articleid."' />";
			echo "<td align='left'class='odd'>".$article->summary."</td>";
			echo "<td align='center' class='even'><input type='text' name='weight[]' value='".$article->weight."' size='5' maxlenght='5'></td>";
			echo "</tr>";
		} 
	} else {
		echo "<tr>";
		echo "<td colspan = 4 align = 'center' class='even'>No Articles within this section</td>";
		echo "</tr>";
	}
	echo "
		<tr><td> </td></tr>
		<tr><td class='foot' align='center' colspan='4'>
		<input type='hidden' name='op' value=reaorder />
		<input type='submit' name='submit' value='"._SUBMIT."' />
		</td></tr>
		
		";
	echo "</table>";
	
	echo "<table border='0' cellpadding='1' cellspacing='1' width='100%'>";
	echo "<br />";

// multi language
//	echo "<tr><td align='center' class='head' >[ <a href='javascript:history.back(1)'><a href='./reorder.php'>Return to Category re-order</a> ]</a></td></tr>";
	echo "<tr><td align='center' class='head' >[ <a href='javascript:history.back(1)'><a href='./reorder.php'>"._AM_CATEGORY_REORDER_RETURN."</a> ]</a></td></tr>";

	echo "</table>";
	echo "<br />";
} 

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

$orderby = 'weight';

$listtype = 0;

if (isset($_GET['listtype'])) $listtype = intval($_GET['listtype']);

// same title as admin menu
//    	echo "<div><h4>"._AM_CAREORDER."</h4></div>";
		echo "<div><h4>"._AM_WEIGHTMANAGE."</h4></div>";

// add adminmenu flag
//		adminmenu();
		if ($wfsAdminMenu) adminmenu();

if (empty($category)) {
	echo "<div><h4>"._AM_CAREORDER2."</h4></div>";
	echo ""._AM_CATREORDERTEXT."";
	listcategory($listtype);
} else {
	echo "<div><h4>"._AM_CAREORDER3."</h4></div>";

// bug fix : can't display ten or more articles
//	listArticle($category, $start, 10);

//	$articlecount = WfsArticle::countByCategory($catid);
	$articlecount = WfsArticle::countByCategory($category);

	listArticle($category, $start, $articlecount);

} 

wfsfooter();
xoops_cp_footer();

}

?>