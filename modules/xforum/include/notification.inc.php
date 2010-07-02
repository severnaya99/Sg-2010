<?php
// $Id: notification.inc.php,v 4.04 2008/06/05 15:35:33 wishcraft Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License 2.0 as published by //
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
//  Author: wishcraft (S.F.C., sales@chronolabs.org.au)                      //
//  URL: http://www.chronolabs.org.au/forums/X-Forum/0,17,0,0,100,0,DESC,0   //
//  Project: X-Forum 4                                                       //
//  ------------------------------------------------------------------------ //
if (!defined('XOOPS_ROOT_PATH')) {
	exit();
}
require_once(XOOPS_ROOT_PATH.'/modules/xforum/include/functions.php');
if ( !defined('forum_NOTIFY_ITEMINFO') ) {
define('forum_NOTIFY_ITEMINFO', 1);

function forum_notify_iteminfo($category, $item_id)
{
	$module_handler =& xoops_gethandler('module');
	$module =& $module_handler->getByDirname('xforum');

	if ($category=='global') {
		$item['name'] = '';
		$item['url'] = '';
		return $item;
	}
	$item_id = intval($item_id);

	global $xoopsDB;
	if ($category=='forum') {
		// Assume we have a valid forum id
		$sql = 'SELECT forum_name FROM ' . $xoopsDB->prefix('xf_forums') . ' WHERE forum_id = '.$item_id;
		if (!$result = $xoopsDB->query($sql)){
			  redirect_header("index.php", 2, _MD_ERRORFORUM);
    		exit();
		}
		$result_array = $xoopsDB->fetchArray($result);
		$item['name'] = $result_array['forum_name'];
		$item['url'] = XOOPS_URL . '/modules/' . $module->getVar('dirname') . '/viewforum.php?forum=' . $item_id;
		return $item;
	}

	if ($category=='thread') {
		// Assume we have a valid topid id
		$sql = 'SELECT t.topic_title,f.forum_id,f.forum_name FROM '.$xoopsDB->prefix('xf_topics') . ' t, ' . $xoopsDB->prefix('xf_forums') . ' f WHERE t.forum_id = f.forum_id AND t.topic_id = '. $item_id . ' limit 1';
		if (!$result = $xoopsDB->query($sql)){
			  redirect_header("index.php", 2, _MD_ERROROCCURED);
    		exit();
		}
		$result_array = $xoopsDB->fetchArray($result);
		$item['name'] = $result_array['topic_title'];
		$item['url'] = XOOPS_URL . '/modules/' . $module->getVar('dirname') . '/viewtopic.php?forum=' . $result_array['forum_id'] . '&topic_id=' . $item_id;
		return $item;
	}

	if ($category=='post') {
		// Assume we have a valid post id
		$sql = 'SELECT subject,topic_id,forum_id FROM ' . $xoopsDB->prefix('xf_posts') . ' WHERE post_id = ' . $item_id . ' LIMIT 1';
		if (!$result = $xoopsDB->query($sql)){
			  redirect_header("index.php", 2, _MD_ERROROCCURED);
    		exit();
		}
		$result_array = $xoopsDB->fetchArray($result);
		$item['name'] = $result_array['subject'];
		$item['url'] = XOOPS_URL . '/modules/' . $module->getVar('dirname') . '/viewtopic.php?forum= ' . $result_array['forum_id'] . '&amp;topic_id=' . $result_array['topic_id'] . '#forumpost' . $item_id;
		return $item;
	}
}
}
?>
