<?php
// $Id: eventmember.php,v 1.5 2005/08/30 08:00:38 zoullou Exp $
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

include '../../mainfile.php';

if (!$GLOBALS['xoopsSecurity']->check()) {
	redirect_header('index.php', 3, _NOPERM."<br />".implode('<br />', $GLOBALS['xoopsSecurity']->getErrors()));
	exit;
}

if($xoopsUser && $xoopsModuleConfig['whosnot_going']) {
	// If param are right
	if(($_POST['mode'] == 'add' || $_POST['mode'] == 'remove') && $_POST['event'] > 0) {

		$eventHandler = xoops_getmodulehandler("event", "extcal");
		$eventNotmemberHandler = xoops_getmodulehandler("eventnotmember", "extcal");

		// If the user have to be added
		if($_POST['mode'] == 'add') {
			$event = $eventHandler->getEvent($_POST['event'], $xoopsUser);
			$eventNotmemberHandler->createEventnotmember(array('event_id'=>$_POST['event'], 'uid'=>$xoopsUser->getVar('uid')));
			$rediredtMessage = _MD_EXTCAL_WHOSNOT_GOING_ADDED_TO_EVENT;

		// If the user have to be remove
		} else if($_POST['mode'] == 'remove') {
			$eventNotmemberHandler->deleteEventnotmember(array($_POST['event'], $xoopsUser->getVar('uid')));
			$rediredtMessage = _MD_EXTCAL_WHOSNOT_GOING_REMOVED_TO_EVENT;
		}
		redirect_header("event.php?event=".$_POST['event'], 3, $rediredtMessage, false);
	} else {
		redirect_header("index.php", 3, _NOPERM, false);
	}
} else {
	redirect_header("index.php", 3, _NOPERM, false);
}

?>