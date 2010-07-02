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
/* Global Xoops User variable */
global $xoopsUser;
/* If $xoopsUser vriable is define then user is connected */
if (empty($xoopsUser)) {
  redirect_header("".XOOPS_URL."/user.php",1,_PM_REGISTERNOW);	
} else {
  if (isset($_REQUEST['op'])) {
    $op = $_REQUEST['op'];
  } else {
    $op = 'box';
  }
  $catbox = empty($_REQUEST['catbox'])?1:intval($_REQUEST['catbox']);
  $cid = empty($_REQUEST['cid'])? '' :intval($_REQUEST['cid']);	
$edit = empty($_REQUEST['edit'])? '' : $_REQUEST['edit'];	
  /* Alert message */
  $pm_handler  = & xoops_gethandler('priv_msgs');
  $criteria = new CriteriaCompo();
  $criteria->add(new Criteria('to_userid', $xoopsUser->getVar('uid')));
  $total = $pm_handler->getCount($criteria); 
  unset($criteria);
  $precistotal = number_format(($total*100)/$xoopsModuleConfig['maxuser'], 0, ",", " ");
 	
  
  //alert stockage
if ( $total > $xoopsModuleConfig['maxuser']) {
    $msg_alert = _MP_ALERT."<br />"._MP_AVERT;
	$mpstop = "stop";		
} 
		
  if (isset($_POST['post_messages'])) {
    $op = 'envoimp';
  }

  /* Count file */
  $pm_handler  = & xoops_gethandler('priv_msgscat');
  $criteria = new CriteriaCompo();
  $criteria->add(new Criteria('uid', $xoopsUser->getVar('uid')));
  $criteria->add(new Criteria('ver', 1), 'OR'); 
  $amount = $pm_handler->getCount($criteria); 
  
  
  switch( $op ){
  //Boite de reception
  case "box": 
  default:
  $xoopsOption['template_main'] = 'mp_filebox.html';
    include XOOPS_ROOT_PATH."/header.php";
	
    $xoopsTpl->assign('lang_msg',  sprintf(_MP_YOUFILE, $amount));
    if( ( $view_perms & GPERM_MESS ) ) {
      if (empty($mpstop)) {
        $box_actions[] = '<select name="add"  class="xo-message-form"  OnChange="window.document.location=this.options[this.selectedIndex].value;"><option selected>'._MP_MNEWS.'</option><option value="'.XOOPS_URL.'/modules/'.$mydirname.'/msgbox.php?op=sendbox&send=1">-> '._MP_MMES.'</option><option value="'.XOOPS_URL.'/modules/'.$mydirname.'/contbox.php?op=sendbox">-> '._MP_MCONT.'</option><option value="'.XOOPS_URL.'/modules/'.$mydirname.'/filebox.php?op=sendbox">-> '._MP_MFILE.'</option></select>';
        $box_actions[] = "<input type='submit'  class='xo-message-form'  onclick='document.prvmsg.action=\"filebox.php?op=sendbox&edit=1\"' id='move' disabled value='"._MP_RENAME_FILE."'>";
      } else {
        $box_actions[] = '<select name="add"  class="xo-message-form"  OnChange="window.document.location=this.options[this.selectedIndex].value;" disabled><option selected>'._MP_MNEWS.'</option><option value="'.XOOPS_URL.'/modules/'.$mydirname.'/msgbox.php?op=sendbox&send=1">-> '._MP_MMES.'</option><option value="'.XOOPS_URL.'/modules/'.$mydirname.'/contbox.php?op=sendbox">-> '._MP_MCONT.'</option><option value="'.XOOPS_URL.'/modules/'.$mydirname.'/filebox.php?op=sendbox">-> '._MP_MFILE.'</option></select>';
        $box_actions[] = "<input type='submit'  class='xo-message-form'  onclick='document.prvmsg.action=\"filebox.php?op=sendbox&edit=1\"' id='move' disabled value='"._MP_RENAME_FILE."'>";
      }
    }
    $box_actions[] = "<input type='submit'  class='xo-message-form'  onclick='document.prvmsg.action=\"delopt.php?option=delfile\"' id='delfile' disabled value='"._MP_FORMDEL."'>";
    $box_actions[] = "<input type='hidden' name='catbox' value='".$catbox."'>";
    $xoopsTpl->assign('box_actions', $box_actions);

    if ( $amount == 0 ) {
      $xoopsTpl->assign('lang_none', _MP_YOUDONTFILE);
    }
    break;
	
	
case "envoimp":
    global $xoopsDB, $xoopsUser, $xoopsConfig;
    if (empty($_POST['form_file'])) {
      redirect_header("javascript:history.go(-1)",2, _PM_REDNON);
      exit;
    }
    if ($edit == "1") {
 $sq1 = "UPDATE ".$xoopsDB->prefix("priv_msgscat")." SET title = '".$_POST['form_file']."', pid = ".$_POST['form_pid']." WHERE cid = ".$cid." and uid = ".$xoopsUser->getVar('uid')." AND ver !=1"; 
      $result=$xoopsDB->queryF($sq1);
      if (!$result) {
        redirect_header("javascript:history.go(-1)",10, _PM_REDNONM);
        exit();
      } else {
        redirect_header("filebox.php?op=box",1, _PM_FILEEDIT);
        exit();
      }
    } else {
      if ($amount >= 3+$xoopsModuleConfig['maxfile']) {
        redirect_header("javascript:history.go(-1)",1, _PM_PURGEFILE);
      } else {
        $sq2 = "INSERT INTO ".$xoopsDB->prefix("priv_msgscat")."(cid, pid, title, uid, ver) VALUES('','".$_POST['form_pid']."', '".$_POST['form_file']."', '".$xoopsUser->getVar('uid')."', '' )";
        $result=$xoopsDB->queryF($sq2);
      }
    }			
    if (!$result) {
      redirect_header("javascript:history.go(-1)",1, _PM_REDNON);
    } else {
      redirect_header("filebox.php?op=box",1, _PM_FILEPOSTED);
    }
    break;
  case "sendbox": 
  
   $xoopsOption['template_main'] = 'mp_subox.html'; 
   include XOOPS_ROOT_PATH."/header.php";
	 
    global $xoopsDB, $xoopsUser, $xoopsConfig;		
  
    //stockage
    if (!empty($mpstop)) {
      redirect_header($_SERVER['PHP_SELF'],1, _PM_PURGEMES);
      exit();
    }			
    $form = new XoopsThemeForm(_MP_ADD_FILE, "read", $_SERVER['PHP_SELF']);
    //modification du file
    if ($edit == "1") {
  $sq1 = "SELECT * FROM ".$xoopsDB->prefix("priv_msgscat")." WHERE cid = ".$_REQUEST['ct_file'];
    $result1=$xoopsDB->queryF($sq1);
      $myrow=$xoopsDB->fetchArray($result1);
      $edit_texte = $myrow['title'];
      $form->addElement(new XoopsFormHidden("edit", $edit));
      $form->addElement(new XoopsFormHidden("cid", $myrow['cid']));
    }
 $cat_select = new XoopsFormSelect(_MP_CATEGORY, 'form_pid', $myrow['pid']);
 $cat_handler  = & xoops_gethandler('priv_msgscat');
 $criteria = new CriteriaCompo();
 $criteria->add(new Criteria('pid', 0));
 $criteria->add(new Criteria('uid', $xoopsUser->getVar('uid')));
 $criteria->add(new Criteria('ver', 1), 'OR');
 $criteria->setSort("cid");
 $pm_cat =& $cat_handler->getObjects($criteria);
 
	foreach (array_keys($pm_cat) as $i) {
      $cat_select -> addOption($pm_cat[$i]->getVar('cid'), $pm_cat[$i]->getVar('title'));
    }
    $cat_select -> addOption( '0', '--------' );
    //creation du formulaire d'ajout
    $user_select = new XoopsFormText('', 'form_file', 25, 50, @$edit_texte);
    $user_tray = new XoopsFormElementTray(_MP_NAME_FILE, '&nbsp;');
    $user_tray->addElement($user_select);
    $user_tray->addElement(new XoopsFormLabel('', _MP_CARACTERE));
    $form->addElement($user_tray);
    $cat_select -> addOptionArray( $submitcats );
    $form -> addElement( $cat_select );
    $button_tray = new XoopsFormElementTray('' ,'');
    $post_button = new XoopsFormButton('', 'post_messages', _MP_SUBMIT, "submit");
    $post_button -> setExtra("onclick='document.prvmsg.action=\"filebox.php?op=envoimp\"'");
    $button_tray->addElement($post_button);
    $button_tray->addElement(new XoopsFormButton('', 'reset', _MP_CLEAR, 'reset'));
    $form->addElement($button_tray);
    $quick_reply = $form->render();
    $xoopsTpl->assign('mp_form', $quick_reply);
    $xoopsTpl->assign('mp_formulaire', "<form name='prvmsg' method='post' action='filebox.php'>");
    $xoopsTpl->assign('mp_input_reply', "<input type='submit' onclick='document.prvmsg.action=\"filebox.php?op=envoimp\"' id='lire' value='"._MP_SUBMIT."'>");
    $xoopsTpl->assign('mp_input_del', "<input type='reset' id='reply' value='"._MP_CLEAR."'>");
    if( ( $view_perms & GPERM_MESS ) ) {
      if (empty($mpstop)) {
        $box_actions[] = '<select name="add"  class="xo-message-form" OnChange="window.document.location=this.options[this.selectedIndex].value;"><option selected>'._MP_MNEWS.'</option><option value="'.XOOPS_URL.'/modules/'.$mydirname.'/msgbox.php?op=sendbox&send=1">-> '._MP_MMES.'</option><option value="'.XOOPS_URL.'/modules/'.$mydirname.'/contbox.php?op=sendbox">-> '._MP_MCONT.'</option><option value="'.XOOPS_URL.'/modules/'.$mydirname.'/filebox.php?op=sendbox">-> '._MP_MFILE.'</option></select>';
        $box_actions[] = "<input type='submit' class='xo-message-form'  onclick='document.prvmsg.action=\"document.prvmsg.action=\"filebox.php?op=envoimp\"' id='lire' value='"._MP_SUBMIT."'>";
      } else {
        $box_actions[] = '<select name="add"  class="xo-message-form"  OnChange="window.document.location=this.options[this.selectedIndex].value;" disabled><option selected>'._MP_MNEWS.'</option><option value="'.XOOPS_URL.'/modules/'.$mydirname.'/msgbox.php?op=sendbox&send=1">-> '._MP_MMES.'</option><option value="'.XOOPS_URL.'/modules/'.$mydirname.'/contbox.php?op=sendbox">-> '._MP_MCONT.'</option><option value="'.XOOPS_URL.'/modules/'.$mydirname.'/filebox.php?op=sendbox">-> '._MP_MFILE.'</option></select>';
        $box_actions[] = "<input type='submit'  class='xo-message-form'  onclick='document.prvmsg.action=\"filebox.php?op=envoimp\"' id='lire' disabled value='"._MP_SUBMIT."'>";
      }
    }
    $box_actions[] = "<input type='reset'   class='xo-message-form'  value='"._MP_CLEAR."'>";
    $box_actions[] = "<input type='hidden' name='catbox' value='".$catbox."'>";
    $xoopsTpl->assign('box_actions', $box_actions);
    break;
  }
  
  //Affiche les Dossiers
    mp_category($precistotal, $catbox, @$catpid);
	
  //Language & menu
 $xoopsTpl->assign('lang_private', _PM_PRIVATEMESSAGE);
 $xoopsTpl->assign('lang_rece', _PM_RECE);
 $xoopsTpl->assign('lang_mes', _MP_MESSAGE);
 $xoopsTpl->assign('lang_news', _MP_NEWS);
 $xoopsTpl->assign('lang_file', _MP_FILE);
 $xoopsTpl->assign('lang_debit', _MP_MDEBIT);
 $xoopsTpl->assign('mp_precistotal',  sprintf(_MP_MDEBIT, $precistotal.'%'));
 $xoopsTpl->assign('lang_menu', MpMenu('filebox.php'));
 $xoopsTpl->assign('mp_catbox', $catbox);
 //$xoopsTpl->assign('xoops_module_header', $mp_module_header);
 mp_cache();

	include XOOPS_ROOT_PATH."/footer.php";
	
}
?>
