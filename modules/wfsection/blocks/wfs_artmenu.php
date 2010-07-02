<?php
// $Id: news_top.php,v 1.8 2003/03/28 04:04:51 w4z004 Exp $
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
include_once XOOPS_ROOT_PATH . '/modules/wfsection/include/groupaccess.php';

function b_wfs_artmenu($options) {
	global $xoopsDB;
	$myts =& MyTextSanitizer::getInstance();
	$block = array();
	$sql = "SELECT articleid, title, groupid FROM ".$xoopsDB->prefix("wfs_article")." WHERE published < ".time()." AND published > 0 AND (expired = 0 OR expired > ".time().") AND offline = 0 AND noshowart = 1 ORDER BY weight ASC";
	$result = $xoopsDB->query($sql);
	while ( $myrow = $xoopsDB->fetchArray($result) ) {
	
	if(checkAccess($myrow["groupid"])) {
			$wfsmenu2 = array();
			$nstitle = $myts->makeTboxData4Show($myrow["title"]);
			$nsid = $myts->makeTboxData4Show($myrow["articleid"]);
			
				$wfsmenu2['nstitle'] = $nstitle;
				$wfsmenu2['nsid'] = $nsid;
				$block['nsmenu'][] = $wfsmenu2;			
		
		}
	}
	return $block;
}


?>