<?php
// $Id: xfs_bigstory.php,v 1.3 2005/06/24 09:20:07 ohwada Exp $

// 2005-06-20 K.OHWADA
// xfs -> xfblock

// 2004/07/01 K.OHWADA
// WFsection 2.01 correspondence 
// rename WFS to XFS

// 2004/07/01 K.OHWADA
// for avoiding to collide with WFsection.
// block function read twice groupaccess.php.

// 2003/10/11 K.OHWADA
// rename this file and function
// multiple install of same module

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

// for avoiding to collide with WFsection.
// multiple install of same module
//include_once XOOPS_ROOT_PATH . '/modules/wfsection/include/groupaccess.php';
//if ( !defined("_WFS_GROUPACCESS_PHP") )
//{	$wfs_module_list = array('wfsection','xfsection');	// *** change this ***
//	foreach ($wfs_module_list as $module)
//	{	$wfs_groupaccess_php = XOOPS_ROOT_PATH."/modules/$module/include/groupaccess.php";
//		if ( file_exists($wfs_groupaccess_php) )
//		{	include_once $wfs_groupaccess_php;	
//			break;
//		}
//	}
//}

// xfs -> xfblock
//if ( !function_exists('xfs_checkAccess') )
//{
//	include_once XOOPS_ROOT_PATH."/modules/xfsection/include/xfs_groupaccess.php";
//}
if ( !function_exists('xfblock_checkAccess') )
{
	include_once XOOPS_ROOT_PATH."/modules/xfsection/include/xfblock_groupaccess.php";
}

function b_xfs_bigstory_show() {	// *** change this ***

	global $xoopsDB;
	$myts =& MyTextSanitizer::getInstance();
	$block = array();
	$tdate = mktime(0,0,0,date("n"),date("j"),date("Y"));

// *** change this ***
//	$result = $xoopsDB->query("SELECT articleid, title, summary, groupid FROM ".$xoopsDB->prefix("wfs_article")." WHERE published > ".$tdate." AND published < ".time()." AND (expired > ".time()." OR expired = 0) AND noshowart = 0 AND offline = 0 ORDER BY counter DESC",1,0);
	$result = $xoopsDB->query("SELECT articleid, title, summary, groupid FROM ".$xoopsDB->prefix("xfs_article")." WHERE published > ".$tdate." AND published < ".time()." AND (expired > ".time()." OR expired = 0) AND noshowart = 0 AND offline = 0 ORDER BY counter DESC",1,0);

	list($farticleid, $ftitle, $fsummary, $fgroupid) = $xoopsDB->fetchRow($result);
	if ( !$farticleid && !$ftitle) {

// rename WFS to XFS
		$block['message'] = _MB_XFS_NOTYET;

	} else {

// for avoiding to collide with WFsection.
//		if (checkAccess($fgroupid)) {

// xfs -> xfblock
//		if (xfs_checkAccess($fgroupid)) {
		if (xfblock_checkAccess($fgroupid)) {

// rename WFS to XFS
			$block['message'] = _MB_XFS_TMRSI;

			$block['story_title'] = $myts->makeTboxData4Show($ftitle);
			$block['story_summary'] = $myts->makeTboxData4Show($fsummary);
			$block['story_id'] = $farticleid; 
		}
	}
	return $block;
}
?>
