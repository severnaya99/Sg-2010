<?php
// $Id: functions.php,v 1.11 2004/12/26 19:11:57 onokazu Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //

function newlinkgraphic($time, $status) {
	$count = 7;
	$new = '';
	$startdate = (time()-(86400 * $count));
	if ($startdate < $time) {
		if($status==1){
			$new = "&nbsp;<img src=\"".XOOPS_URL."/modules/mylinks/images/newred.gif\" alt=\""._MD_NEWTHISWEEK."\" />";
		}elseif($status==2){
			$new = "&nbsp;<img src=\"".XOOPS_URL."/modules/mylinks/images/update.gif\" alt=\""._MD_UPTHISWEEK."\" />";
		}
	}
	return $new;
}

function popgraphic($hits) {
	global $xoopsModuleConfig;
	if ($hits >= $xoopsModuleConfig['popular']) {
		return "&nbsp;<img src=\"".XOOPS_URL."/modules/mylinks/images/pop.gif\" alt=\""._MD_POPULAR."\" />";
	}
	return '';
}
//Reusable Link Sorting Functions
function convertorderbyin($orderby) {
	switch (trim($orderby)) {
	case "titleA":
		$orderby = "title ASC";
		break;
	case "dateA":
		$orderby = "date ASC";
		break;
	case "hitsA":
		$orderby = "hits ASC";
		break;
	case "ratingA":
		$orderby = "rating ASC";
		break;
	case "titleD":
		$orderby = "title DESC";
		break;
	case "hitsD":
		$orderby = "hits DESC";
		break;
	case "ratingD":
		$orderby = "rating DESC";
		break;
	case"dateD":
	default:
		$orderby = "date DESC";
		break;
	}
	return $orderby;
}
function convertorderbytrans($orderby) {
            if ($orderby == "hits ASC")   $orderbyTrans = ""._MD_POPULARITYLTOM."";
            if ($orderby == "hits DESC")    $orderbyTrans = ""._MD_POPULARITYMTOL."";
            if ($orderby == "title ASC")    $orderbyTrans = ""._MD_TITLEATOZ."";
           if ($orderby == "title DESC")   $orderbyTrans = ""._MD_TITLEZTOA."";
            if ($orderby == "date ASC") $orderbyTrans = ""._MD_DATEOLD."";
            if ($orderby == "date DESC")   $orderbyTrans = ""._MD_DATENEW."";
            if ($orderby == "rating ASC")  $orderbyTrans = ""._MD_RATINGLTOH."";
            if ($orderby == "rating DESC") $orderbyTrans = ""._MD_RATINGHTOL."";
            return $orderbyTrans;
}
function convertorderbyout($orderby) {
            if ($orderby == "title ASC")            $orderby = "titleA";
            if ($orderby == "date ASC")            $orderby = "dateA";
            if ($orderby == "hits ASC")          $orderby = "hitsA";
            if ($orderby == "rating ASC")        $orderby = "ratingA";
            if ($orderby == "title DESC")              $orderby = "titleD";
            if ($orderby == "date DESC")            $orderby = "dateD";
            if ($orderby == "hits DESC")          $orderby = "hitsD";
            if ($orderby == "rating DESC")        $orderby = "ratingD";
            return $orderby;
}

/**
 * Create the meta description based on the content
 *
 * @package Xoops
 * @author Hervé Thouzard (http://www.herve-thouzard.com)
 * @copyright Hervé Thouzard
 * Edited by Elisio Leonardo(www.infomoz.net)
*/
function xoops_create_meta_description($content)
{
	global $xoopsTpl, $xoTheme;
	$myts =& MyTextSanitizer::getInstance();
	$content= $myts->undoHtmlSpecialChars($myts->displayTarea($content));
	if(isset($xoTheme) && is_object($xoTheme)) {
		$xoTheme->addMeta( 'meta', 'description', strip_tags($content));
	} else {	// Compatibility for old Xoops versions
		$xoopsTpl->assign('xoops_meta_description', strip_tags($content));
	}
}


/**
 * Create the meta keywords based on the content
 *
 * @package Xoops
 * @author Hervé Thouzard (http://www.herve-thouzard.com)
 * @copyright Hervé Thouzard
 * Edited by Elisio Leonardo(www.infomoz.net)
*/
function xoops_create_meta_keywords($content)
{
	// Parameters you can change **********************************************************
	$method = 3;			// Method to use
							// 1=Create keywords in the same order as in the text
							// 2=Keywords order is made according to the reverse keywords frequency
							// (so the less frequent words appear in first in the list)
							// 3=Same as previous, the only difference is that the most frequent
							// words will appear in first in the list
	$keywords_count = 20;	// Number of keywords to create
	// ************************************************************************************
	global $xoopsTpl, $xoTheme;
	$tmp=array();
	if(isset($_SESSION['xoops_keywords_limit'])) {		// Search the "Minimum keyword length"
		$limit = $_SESSION['xoops_keywords_limit'];
	} else {
		$config_handler =& xoops_gethandler('config');
		$xoopsConfigSearch =& $config_handler->getConfigsByCat(XOOPS_CONF_SEARCH);
		$limit=$xoopsConfigSearch['keyword_min'];
		$_SESSION['xoops_keywords_limit']=$limit;
	}
	$myts =& MyTextSanitizer::getInstance();
	$content = str_replace ("<br />", " ", $content);
	$content= $myts->undoHtmlSpecialChars($content);
	$content= strip_tags($content);
	$content=strtolower($content);
	$search_pattern=array("&nbsp;","\t","\r\n","\r","\n",",",".","'",";",":",")","(",'"','?','!','{','}','[',']','<','>','/','+','-','_','\\','*');
	$replace_pattern=array(' ',' ',' ',' ',' ',' ',' ',' ','','','','','','','','','','','','','','','','','','','');
	$content = str_replace($search_pattern, $replace_pattern, $content);
	$keywords=explode(' ',$content);
	switch($method) {
		case 1:	// Returns keywords in the same order that they were created in the text
			$keywords=array_unique($keywords);
			break;

		case 2:	// the keywords order is made according to the reverse keywords frequency (so the less frequent words appear in first in the list)
			$keywords=array_count_values($keywords);
			asort($keywords);
			$keywords=array_keys($keywords);
			break;

		case 3:	// Same as previous, the only difference is that the most frequent words will appear in first in the list
			$keywords=array_count_values($keywords);
			arsort($keywords);
			$keywords=array_keys($keywords);
			break;
	}

	foreach($keywords as $keyword) {
		if(strlen($keyword)>=$limit && !is_numeric($keyword)) {
			$tmp[]=$keyword;
		}
	}
	$tmp=array_slice($tmp,0,$keywords_count);
	if(count($tmp)>0) {
		if(isset($xoTheme) && is_object($xoTheme)) {
			$xoTheme->addMeta( 'meta', 'keywords', implode(',',$tmp));
		} else {	// Compatibility for old Xoops versions
			$xoopsTpl->assign('xoops_meta_keywords', implode(',',$tmp));
		}
	} else {
		if(!isset($config_handler) || !is_object($config_handler)) {
			$config_handler =& xoops_gethandler('config');
		}
		$xoopsConfigMetaFooter =& $config_handler->getConfigsByCat(XOOPS_CONF_METAFOOTER);
		if(isset($xoTheme) && is_object($xoTheme)) {
			$xoTheme->addMeta( 'meta', 'keywords', $xoopsConfigMetaFooter['meta_keywords']);
		} else {	// Compatibility for old Xoops versions
			$xoopsTpl->assign('xoops_meta_keywords', $xoopsConfigMetaFooter['meta_keywords']);
		}
	}
}

//updates rating data in itemtable for a given item
function updaterating($sel_id){
        global $xoopsDB;
        $query = "select rating FROM ".$xoopsDB->prefix("mylinks_votedata")." WHERE lid = ".$sel_id."";
        //echo $query;
        $voteresult = $xoopsDB->query($query);
            $votesDB = $xoopsDB->getRowsNum($voteresult);
        $totalrating = 0;
            while(list($rating)=$xoopsDB->fetchRow($voteresult)){
                $totalrating += $rating;
        }
        $finalrating = $totalrating/$votesDB;
        $finalrating = number_format($finalrating, 4);
        $query =  "UPDATE ".$xoopsDB->prefix("mylinks_links")." SET rating=$finalrating, votes=$votesDB WHERE lid = $sel_id";
        //echo $query;
            $xoopsDB->query($query) or exit();
}

//returns the total number of items in items table that are accociated with a given table $table id
function getTotalItems($sel_id, $status=""){
        global $xoopsDB, $mytree;
        $count = 0;
        $arr = array();
        $query = "select count(*) from ".$xoopsDB->prefix("mylinks_links")." where cid=".$sel_id."";
        if($status!=""){
                $query .= " and status>=$status";
        }
        $result = $xoopsDB->query($query);
        list($thing) = $xoopsDB->fetchRow($result);
        $count = $thing;
        $arr = $mytree->getAllChildId($sel_id);
        $size = count($arr);
        for($i=0;$i<$size;$i++){
                $query2 = "select count(*) from ".$xoopsDB->prefix("mylinks_links")." where cid=".$arr[$i]."";
                if($status!=""){
                        $query2 .= " and status>=$status";
                }
                $result2 = $xoopsDB->query($query2);
                list($thing) = $xoopsDB->fetchRow($result2);
                $count += $thing;
        }
        return $count;
}
?>
