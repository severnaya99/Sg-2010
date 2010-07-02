<?php
// $Id: wfs_topics.php,v 1.0 2003/06/15 11:37:52 Catzwolf Exp $
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

//include_once XOOPS_ROOT_PATH.'/modules/wfsection/include/groupaccess.php';
//include_once XOOPS_ROOT_PATH.'/modules/wfsection/class/common.php';
include_once XOOPS_ROOT_PATH.'/class/xoopslists.php';
include_once XOOPS_ROOT_PATH.'/modules/wfsection/class/wfstree.php';
	
function b_wfs_topics_show() {

	global $xoopsDB, $xoopsConfig;
	$block = array();
	
	$tree = new wfsTree("xoops_wfs_category", "id", "pid");
	$jump = XOOPS_URL."/modules/wfsection/index.php?";
	$id = !empty($fid) ? intval($HTTP_POST_VARS['id']) : 0;
	ob_start();
	$tree->makeMyRootedSelBox('title', 'title', $id, true, $id, true, "", "location.href='{$jump}category='+this.options[this.selectedIndex].value");
	$block['selectbox'] = ob_get_contents();
	ob_end_clean();
	return $block;
}
?>