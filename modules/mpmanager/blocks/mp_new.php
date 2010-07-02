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
include_once XOOPS_ROOT_PATH . '/modules/mpmanager/class/priv_msgs.php';

function b_mp_new_show($options) {

	global $xoopsDB, $xoopsUser, $xoopsModule, $HTTP_SERVER_VARS;

	$module_handler = &xoops_gethandler('module');
	$newbb = $module_handler->getByDirname('mpmanager');

    if(!isset($xoopsModuleConfig)){
	    $config_handler = &xoops_gethandler('config');
	    $xoopsModuleConfig = &$config_handler->getConfigsByCat(0, $newbb->getVar('mid'));
    }	
	
	if (is_object($xoopsUser)) {
		$uid = $xoopsUser->getVar('uid');
		$uname = $xoopsUser->getVar('uname');
	} else {
		$uid = 0;
		$uname = '';
	}	
	$block = array();
	$news_messages = 0;
	$old_messages = 0;
	$myts =& MyTextSanitizer::getInstance();
	$mp = array();
	if (!is_object($xoopsUser)) {
$block['lang_none'] = _MP_BL_YOUDONTHAVE;
} else {

    $pm_handler  = & xoops_gethandler('priv_msgs');
	$criteria = new CriteriaCompo();
	
	$criteria->add(new Criteria('to_userid', $xoopsUser->getVar('uid')));
	$criteria->add(new Criteria('cat_msg', 1));
	$criteria->setLimit($options[0]);
	$criteria->setSort("msg_time");
	$criteria->setOrder("DESC");
	$pm_arr =& $pm_handler->getObjects($criteria);
    $total_messages = count($pm_arr);
	$block['total'] = $total_messages;
    if ( $total_messages == 0 ) {
    $block['lang_none'] = _MP_BL_YOUDONTHAVE;
    } else {
	$block['disp_mode'] = $options[2];
    }
	
foreach (array_keys($pm_arr) as $i) {

if ($pm_arr[$i]->getVar('read_msg') == 1) {
           
$mp['list'] = "<li>";
$mp['img'] =  "<a href='".XOOPS_URL."/modules/mpmanager/viewbox.php?op=view&searchmsg=".$pm_arr[$i]->getVar('msg_id')."#".$pm_arr[$i]->getVar('msg_id')."'><img src='".XOOPS_URL."/modules/mpmanager/images/lus.png' width='20px' height='20px' alt='Lu' /></a>";
$old_messages ++;
} else {
$mp['img'] = "<a href='".XOOPS_URL."/modules/mpmanager/viewbox.php?op=view&searchmsg=".$pm_arr[$i]->getVar('msg_id')."#".$pm_arr[$i]->getVar('msg_id')."'><img src='".XOOPS_URL."/modules/mpmanager/images/new.png' width='20px' height='20px' alt='Non Lu' /></a>";
$mp['list'] = '<li style="color:  '.$xoopsModuleConfig["cssbtext"].';>';	
$news_messages ++;
	    }

        $postername = XoopsUser::getUnameFromId($pm_arr[$i]->getVar("from_userid"));
        // no need to show deleted users
        if ($postername) {
          $mp['from'] = "<a href=".XOOPS_URL."/userinfo.php?uid=".$pm_arr[$i]->getVar("from_userid").">".$postername."</a>";
        } else {
          $mp['from'] = $xoopsConfig['anonymous'];
        }
		
		if ($options[2] == 1) {
		$mp['date'] = formatTimestamp($pm_arr[$i]->getVar("msg_time"), "s");
		} else {
		$mp['date'] = formatTimestamp($pm_arr[$i]->getVar("msg_time"));
		}

		if (strlen($pm_arr[$i]->getVar("subject")) >= $options[1]) {
		$mp['subject'] = "<a href='".XOOPS_URL."/modules/mpmanager/viewbox.php?op=view&searchmsg=".$pm_arr[$i]->getVar('msg_id')."#".$pm_arr[$i]->getVar('msg_id')."'>".$myts->displayTarea(substr($pm_arr[$i]->getVar("subject"),0,($options[1] -1)))."...</a>";
		} else {
		$mp['subject'] = "<a href='".XOOPS_URL."/modules/mpmanager/viewbox.php?op=view&searchmsg=".$pm_arr[$i]->getVar('msg_id')."#".$pm_arr[$i]->getVar('msg_id')."'>".$pm_arr[$i]->getVar("subject")."</a>";
		}
		
		if ($options[2] == 2) {
	$pm_handler  = & xoops_gethandler('priv_msgs');
	
	$newcriteria = new CriteriaCompo();	
	$newcriteria->add(new Criteria('to_userid', $xoopsUser->getVar('uid')));
	$newcriteria->add(new Criteria('cat_msg', 1));
	$newcriteria->add(new Criteria('read_msg', 0));
	$block['news'] =& $pm_handler->getCount($newcriteria);
	
	$readcriteria = new CriteriaCompo();	
	$readcriteria->add(new Criteria('to_userid', $xoopsUser->getVar('uid')));
	$readcriteria->add(new Criteria('cat_msg', 1));
	$readcriteria->add(new Criteria('read_msg', 1));
	$block['read'] =& $pm_handler->getCount($readcriteria);
	
	$allcriteria = new CriteriaCompo();
	$allcriteria->add(new Criteria('to_userid', $xoopsUser->getVar('uid')));
	$allcriteria->add(new Criteria('cat_msg', 1));
	$block['all'] =& $pm_handler->getCount($allcriteria);
	
	return $block;
	}
		
		
$block['manager'][] = $mp;
	
} }
	return $block;
}

function b_mp_new_edit($options) {
	$form = ""._MP_DISP."&nbsp;";
	$form .= "<input type=\"hidden\" name=\"options[]\" value=\"\"/>";
	$form .= "<input type=\"text\" name=\"options[0]\" value=\"".$options[0]."\" />&nbsp;"._MP_NEW."";
	$form .= "&nbsp;<br>"._MP_CHARS."&nbsp;<input type='text' name='options[1]' value='".$options[1]."' />&nbsp;"._MP_LENGTH."";
	    $form .= "<br />" . _MP_DISPLAYMODE. "<input type='radio' name='options[2]' value='0'";
    if ($options[2] == 0) {
        $form .= " checked='checked'";
    }
    $form .= " />&nbsp;" . _MP_FULL . "<input type='radio' name='options[2]' value='1'";
    if ($options[2] == 1) {
        $form .= " checked='checked'";
    }
    $form .= " />&nbsp;" . _MP_COMPACT . "<input type='radio' name='options[2]' value='2'";	
	if ($options[2] == 2) {
        $form .= " checked='checked'";
    }
	$form .= " />&nbsp;" . _MP_MODEIMG ;
	
	return $form;
}


?>
