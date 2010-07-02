<?php
// $Id: xfs_topics.php,v 1.3 2005/06/24 09:20:07 ohwada Exp $

// 2005-06-20 K.OHWADA
// xfs -> xfblock

// 2004/07/01 K.OHWADA
// for avoiding to collide with WFsection.
// block function read twice groupaccess.php and wfstree.php.

// 2003/10/11 K.OHWADA
// rename this file and function
// multiple install of same module
// bug fix
//   uncomment groupaccess.php
//   change xoops_wfs_categoryto to use xoopsDB->prefix

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

//include_once XOOPS_ROOT_PATH.'/modules/wfsection/class/common.php';
include_once XOOPS_ROOT_PATH.'/class/xoopslists.php';

// for avoiding to collide with WFsection.
// multiple install of same module
// bug fix : uncomment groupaccess.php
//include_once XOOPS_ROOT_PATH . '/modules/wfsection/include/groupaccess.php';
//$wfs_module_list = array('wfsection','xfsection');	// *** change this ***
//if ( !defined("_WFS_GROUPACCESS_PHP") )
//{	foreach ($wfs_module_list as $module)
//	{	$wfs_groupaccess_php = XOOPS_ROOT_PATH."/modules/$module/include/groupaccess.php";
//		if ( file_exists($wfs_groupaccess_php) )
//		{	include_once $wfs_groupaccess_php;
//			break;
//		}
//	}
//}
//if ( !defined("_WFS_WFSTREE_PHP") )
//{	foreach ($wfs_module_list as $module)
//	{	$wfs_wfstree_php = XOOPS_ROOT_PATH."/modules/$module/class/wfstree.php";
//		if ( file_exists($wfs_wfstree_php) )
//		{	include_once $wfs_wfstree_php;
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

// xfs -> xfblock
//if ( !class_exists('xfs_wfsTree') )
//{
//	include_once XOOPS_ROOT_PATH."/modules/xfsection/class/xfs_wfstree.php";
//}
if ( !class_exists('xfblock_wfsTree') )
{
	include_once XOOPS_ROOT_PATH."/modules/xfsection/class/xfblock_wfstree.php";
}

function b_xfs_topics_show() {	// *** change this ***

	global $xoopsDB, $xoopsConfig;
	$block = array();

// *** change this ***
//	$jump = XOOPS_URL."/modules/wfsection/index.php?";
	$jump = XOOPS_URL."/modules/xfsection/index.php?";

// for avoiding to collide with WFsection.
// bug fix
//   change xoops_wfs_categoryto to use xoopsDB->prefix
//	$tree = new wfsTree("xoops_wfs_category", "id", "pid");
//	$tree = new wfsTree($xoopsDB->prefix("xfs_category"), "id", "pid");

// xfs -> xfblock
//	$tree = new xfs_wfsTree($xoopsDB->prefix("xfs_category"), "id", "pid");
	$tree = new xfblock_wfsTree($xoopsDB->prefix("xfs_category"), "id", "pid");

	$id = !empty($fid) ? intval($HTTP_POST_VARS['id']) : 0;
	ob_start();
	$tree->makeMyRootedSelBox('title', 'title', $id, true, $id, true, "", "location.href='{$jump}category='+this.options[this.selectedIndex].value");
	$block['selectbox'] = ob_get_contents();
	ob_end_clean();
	return $block;
}
?>
