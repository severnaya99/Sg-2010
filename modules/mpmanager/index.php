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
/* Include the module header */
require_once "header.php";
/* Define the main template before the Xoops Header inclde */
$xoopsOption['template_main'] = 'mp_index.html';
/* Include the header */
include XOOPS_ROOT_PATH."/header.php";
require_once "include/calendar.php";
/* Global Xoops User variable */
global $xoopsUser;
/* If $xoopsUser vriable is define then user is connected */
if (empty($xoopsUser)) {
  redirect_header("".XOOPS_URL."/user.php",1,_PM_REGISTERNOW);
} else {

$op = empty($_REQUEST['op'])? '' :intval($_REQUEST['op']);	

if ($ohome == 0 && $op != 'menu') {
  header('location: '.XOOPS_URL.'/modules/mpmanager/msgbox.php');
  }


  $catbox=1;
  $pm_handler  = & xoops_gethandler('priv_msgs');
  $criteria = new CriteriaCompo();
  $criteria->add(new Criteria('to_userid', $xoopsUser->getVar('uid')));
  $total = $pm_handler->getCount($criteria);
  $criteria->add(new Criteria('read_msg', 0));
  $criteria->add(new Criteria('cat_msg', $catbox));
  $newsct = $pm_handler->getCount($criteria);

  unset($criteria);
  
  $cat_handler  = & xoops_gethandler('priv_msgscat');
  $criteria = new CriteriaCompo(); 
  $criteria->add(new Criteria('cid', $catbox)); 
  $criteria3 = new CriteriaCompo(new Criteria('uid', $xoopsUser->getVar('uid')));
  $criteria3->add(new Criteria('ver', 1), 'OR'); 
  $criteria->add($criteria3); 

  $pm_cat =& $cat_handler->getObjects($criteria);
  foreach (array_keys($pm_cat) as $i) { 
    $catpid = $pm_cat[$i]->getVar('pid'); 
    $cattitle = $pm_cat[$i]->getVar('title');
  }
  
  $mp_total = number_format(($total*100)/$xoopsModuleConfig['maxuser'], 0, ",", " ");
  $percent="<span style='border: 1px solid rgb(0, 0, 0); background: rgb(255, 255, 255) none repeat scroll 0%; margin: 4px; text-align:center; display: block; height: 8px; width: 70%; float: left; overflow: hidden;'><span style='background:  ".$xoopsModuleConfig['cssbtext']." none repeat scroll 0%; text-align:left; display: block; height: 8px; width: ".$mp_total."%; float: left; overflow: hidden;'></span></span>".$mp_total."%";

  $calendar=calendar();
  $xoopsTpl->assign('mp_index_title', _MP_INDEX_TITLE);
  $xoopsTpl->assign('mp_index_message', _MP_MBOX);
  $xoopsTpl->assign('mp_index_message_desc', _MP_INDEX_MSG_DESC);
  $xoopsTpl->assign('mp_index_message_total', $cattitle.': <b>'.$total.'</b> '._MP_MESSAGE);
  $xoopsTpl->assign('mp_index_message_new', _MP_N.': <b>'.$newsct.'</b> '._MP_MESSAGE);
  $xoopsTpl->assign('mp_index_contact', _MP_MCONT);
  $xoopsTpl->assign('mp_index_contact_desc', _MP_INDEX_CONTACT_DESC);
  $xoopsTpl->assign('mp_index_folder', _MP_MFILE);
  $xoopsTpl->assign('mp_index_folder_desc', _MP_INDEX_FOLDER_DESC);
  $xoopsTpl->assign('mp_index_options', _MP_MOPTION);
  $xoopsTpl->assign('mp_index_options_desc', _MP_INDEX_OPTN_DESC);
  $xoopsTpl->assign('mp_calendrier', $calendar);
  $xoopsTpl->assign('mp_percent', $percent);
 //  $xoopsTpl->assign('xoops_module_header', $mp_module_header);
 mp_cache();
}
include XOOPS_ROOT_PATH."/footer.php";
?>
