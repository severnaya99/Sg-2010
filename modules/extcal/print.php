<?php
// $Id: print.php,v 1.1 2005/08/28 15:22:56 zoullou Exp $
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
include_once XOOPS_ROOT_PATH."/language/".$xoopsConfig['language']."/calendar.php";

if(!isset($_GET['event'])) {
	$eventId = 0;
} else {
	$eventId = intval($_GET['event']);
}
$eventHandler = xoops_getmodulehandler('event', 'extcal');
$event = $eventHandler->objectToArray($eventHandler->getEvent($eventId), array('cat_id'));
// Adding formated date for start and end event
$eventHandler->formatEventDate($event, $xoopsModuleConfig['event_date_event']);

echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'."\n";
echo '<html xmlns="http://www.w3.org/1999/xhtml">'."\n";
echo '<head>'."\n";
echo '<meta http-equiv="content-type" content="text/html; charset='._CHARSET.'" />'."\n";
echo '<title>'.$event['cat']['cat_name'].' - '.$event['event_title'].'</title>'."\n";
echo '</head>'."\n";
echo '<body onload="window.print()">'."\n";
echo '<table style="border:1px solid black; width:640px;" cellspacing="0" cellspadding="0">'."\n";
echo '<tr>'."\n";
echo '<td colspan="2" style="font-size:1.2em; border:1px solid black;">'."\n";
echo $event['event_title']."\n";
echo '</td>'."\n";
echo '</tr>'."\n";
echo '<tr>'."\n";
echo '<td style="width:50%; border:1px solid black;">'."\n";
echo '<b>'.$event['cat']['cat_name'].'</b><br />'."\n";
echo '<span style="font-weight:normal;">'.$event['cat']['cat_desc'].'</span>'."\n";
echo '</td>'."\n";
echo '<td style="border:1px solid black;">'."\n";
if(!$event['event_isrecur']) {
	echo '<b>'._MD_EXTCAL_START.' :</b> <span style="font-weight:normal;">'.$event['formated_event_start'].'</span><br />'."\n";
	echo '<b>'._MD_EXTCAL_END.' :</b> <span style="font-weight:normal;">'.$event['formated_event_end'].'</span>'."\n";
} else {
	echo '<b>'._MD_EXTCAL_RECCUR_RULE.' :</b> <span style="font-weight:normal;">'.$event['formated_reccur_rule'].'</span>'."\n";
}
echo '</td>'."\n";
echo '</tr>'."\n";
echo '<tr>'."\n";
echo '<td style="border:1px solid black;">'."\n";
echo '<b>'._MD_EXTCAL_CONTACT_INFO.'</b><br />'."\n";
echo '<span style="font-weight:normal;">'.$event['event_contact'].'<br />'."\n";
echo $event['event_address'].'</span>'."\n";
echo '</td>'."\n";
echo '<td style="border:1px solid black;">'."\n";
echo '<b>'._MD_EXTCAL_EMAIL.' :</b> <a href="mailto:'.$event['event_email'].'">'.$event['event_email'].'</a><br />'."\n";
echo '<b>'._MD_EXTCAL_URL.' :</b> <a href="'.$event['event_url'].'">'.$event['event_url'].'</a>'."\n";
echo '</td>'."\n";
echo '</tr>'."\n";
echo '<tr>'."\n";
echo '<td colspan="2" style="border:1px solid black;">'.$event['event_desc'].'</td>'."\n";
echo '</tr>'."\n";
echo '</table><br />'."\n";
echo '<div style="text-align:center; width:640px;">';
echo $xoopsConfig['sitename'].' - '.$xoopsConfig['slogan'].'<br />';
echo '<a href="'.XOOPS_URL.'/modules/extcal/event.php?event='.$event['event_id'].'">'.XOOPS_URL.'/modules/extcal/event.php?event='.$event['event_id'].'</a>';
echo '</div>';
echo '</body>'."\n";
echo '</html>'."\n";

?>
