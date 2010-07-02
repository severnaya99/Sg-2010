<?php
// $Id: xfs_new.php,v 1.3 2005/06/24 09:20:07 ohwada Exp $

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

function b_xfs_new_show($options) {	// *** change this ***
	global $xoopsDB;
	$myts =& MyTextSanitizer::getInstance();
	$block = array();

// *** change this ***
//	$sql = "SELECT articleid, title, published, expired, counter, groupid FROM ".$xoopsDB->prefix("wfs_article")." WHERE published < ".time()." AND published > 0 AND (expired = 0 OR expired > ".time().") AND noshowart = 0 AND offline = 0 ORDER BY ".$options[0]." DESC";
	$sql = "SELECT articleid, title, published, expired, counter, groupid FROM ".$xoopsDB->prefix("xfs_article")." WHERE published < ".time()." AND published > 0 AND (expired = 0 OR expired > ".time().") AND noshowart = 0 AND offline = 0 ORDER BY ".$options[0]." DESC";

	$result = $xoopsDB->query($sql,$options[1],0);
	while ( $myrow = $xoopsDB->fetchArray($result) ) {

// for avoiding to collide with WFsection.
//	if(checkAccess($myrow["groupid"])) {	

// xfs -> xfblock
//	if(xfs_checkAccess($myrow["groupid"])) {
	if(xfblock_checkAccess($myrow["groupid"])) {

		$wfs = array();
		$title = $myts->makeTboxData4Show($myrow["title"]);
		if ( !XOOPS_USE_MULTIBYTES ) {
			if (strlen($myrow['title']) >= $options[2]) {
				$title = $myts->makeTboxData4Show(substr($myrow['title'],0,($options[2] -1)))."...";
			}
		}
		$wfs['title'] = $title;
		$wfs['id'] = $myrow['articleid'];
		if ( $options[0] == "published" ) {
			$wfs['new'] = formatTimestamp($myrow['published'],"s");
		} elseif ( $options[0] == "counter" ) {
			$wfs['new'] = $myrow['counter'];
		}
		$block['new'][] = $wfs;
	}
	}
	return $block;
}

function b_xfs_new_edit($options) {	// *** change this ***

// rename WFS to XFS
	$form = ""._MB_XFS_ORDER."&nbsp;<select name='options[]'>";

	$form .= "<option value='published'";
	if ( $options[0] == "published" ) {
		$form .= " selected='selected'";
	}
	
// rename WFS to XFS
	$form .= ">"._MB_XFS_DATE."</option>\n";

	$form .= "<option value='counter'";
	if($options[0] == "counter"){
		$form .= " selected='selected'";
	}
	
// rename WFS to XFS
	$form .= ">"._MB_XFS_HITS."</option>\n";

	$form .= "</select>\n";

// rename WFS to XFS
	$form .= "&nbsp;"._MB_XFS_DISP."&nbsp;<input type='text' name='options[]' value='".$options[1]."' />&nbsp;"._MB_XFS_ARTCLS."";
	$form .= "&nbsp;<br>"._MB_XFS_CHARS."&nbsp;<input type='text' name='options[]' value='".$options[2]."' />&nbsp;"._MB_XFS_LENGTH."";


	return $form;
}
?>
