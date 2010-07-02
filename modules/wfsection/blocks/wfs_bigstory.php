<?php
// $Id: news_bigstory.php,v 1.6 2003/02/12 11:37:52 okazu Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
// ------------------------------------------------------------------------- //
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
include_once XOOPS_ROOT_PATH.'/modules/wfsection/include/groupaccess.php';


function b_wfs_bigstory_show() {

	global $xoopsDB;
	$myts =& MyTextSanitizer::getInstance();
	$block = array();
	$tdate = mktime(0,0,0,date("n"),date("j"),date("Y"));
	$result = $xoopsDB->query("SELECT articleid, title, summary, groupid FROM ".$xoopsDB->prefix("wfs_article")." WHERE published > ".$tdate." AND published < ".time()." AND (expired > ".time()." OR expired = 0) AND noshowart = 0 AND offline = 0 ORDER BY counter DESC",1,0);
	list($farticleid, $ftitle, $fsummary, $fgroupid) = $xoopsDB->fetchRow($result);
	if ( !$farticleid && !$ftitle) {
		$block['message'] = _MB_WFS_NOTYET;
	} else {
		
		if (checkAccess($fgroupid)) {
			$block['message'] = _MB_WFS_TMRSI;
			$block['story_title'] = $myts->makeTboxData4Show($ftitle);
			$block['story_summary'] = $myts->makeTboxData4Show($fsummary);
			$block['story_id'] = $farticleid; 
		}
	}
	return $block;
}
?>