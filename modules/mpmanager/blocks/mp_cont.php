<?php
// ------------------------------------------------------------------------- //
//                       XOOPS - Module MP Manager                           //
//                       <http://www.xoops.org/>                             //
// ------------------------------------------------------------------------- //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
// ------------------------------------------------------------------------- // 
//                 Votre nouveau systeme de messagerie priver                //
//                                                                           //
//                               "MP"                                        //
//                                                                           //
//                       http://lexode.info/mods                             //
//                                                                           //
//                                                                           //
//---------------------------------------------------------------------------//
if (!defined('XOOPS_ROOT_PATH')) {
	exit();
}
include_once XOOPS_ROOT_PATH . '/modules/mpmanager/class/priv_msgscont.php';

function b_mp_cont_show($options) {

	global $xoopsDB, $xoopsUser, $xoopsModuleConfig, $HTTP_SERVER_VARS;
	
	if (is_object($xoopsUser)) {
		$uid = $xoopsUser->getVar('uid');
		$uname = $xoopsUser->getVar('uname');
	} else {
		$uid = 0;
		$uname = '';
	}	
	$block = array();
 if (!is_object($xoopsUser)) {
 $block['lang_none'] = _MP_BL_YOUDONTHAVE;
 } else {
     
	$online = 0;
	$offline = 0;
	$user = '';
    $cont_handler  = & xoops_gethandler('priv_msgscont');
    $criteria = new CriteriaCompo(); 
    $criteria->add(new Criteria('ct_userid', $xoopsUser->getVar('uid'))); 
    $amount = $cont_handler->getCount($criteria); 	
    $criteria->setSort('ct_uname');
    $criteria->setOrder('desc');
    $pm_cont =& $cont_handler->getObjects($criteria);
foreach (array_keys($pm_cont) as $i) { 

$poster = new XoopsUser($pm_cont[$i]->getVar('ct_contact'));

/* Online poster */
      if ($poster->isOnline()) {	  	  
$user .= "<a href='javascript:openWithSelfMain(\"".XOOPS_URL."/pmlite.php?send2=1&to_userid=".$pm_cont[$i]->getVar('ct_contact')."\",\"pmlite\", 450, 380)'>".$poster->getVar('uname')."</a>, &nbsp;";
$online ++;
      } else {
$offline ++;
      }
	  
}
	
	$block['online_total'] = $amount;
	$block['online'] = $online;
	$block['offline'] = $offline;
	$block['user'] = $user;
	$block['lang_online'] = _MP_BLOCK_ONLINE;
	$block['lang_offline'] = _MP_BLOCK_OFFLINE;
	$block['lang_contact'] = _MP_BLOCK_CONTACT;
 }
	return $block;
}

function b_mp_cont_edit($options) {
	
	return $form;
}


?>
