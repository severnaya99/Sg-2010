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
/* Include the header */
include_once("header.php");

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
  
  /* Alert message */
  $pm_handler  = & xoops_gethandler('priv_msgs');
  $criteria = new CriteriaCompo();
  $criteria->add(new Criteria('to_userid', $xoopsUser->getVar('uid')));
  $total = $pm_handler->getCount($criteria); 
  $catcriteria = $criteria;
  $catcriteria->add(new Criteria('cat_msg', $catbox)); 
  // $pm =& $pm_handler->getObjects($catcriteria); 
  /* Get category */
  $cat_handler  = & xoops_gethandler('priv_msgscat');
  $criteria2 = new CriteriaCompo(); 
  $criteria2->add(new Criteria('cid', $catbox)); 
  $criteria3 = new CriteriaCompo(new Criteria('uid', $xoopsUser->getVar('uid')));
  $criteria3->add(new Criteria('ver', 1), 'OR'); 
  $criteria2->add($criteria3); 

  $pm_cat =& $cat_handler->getObjects($criteria2);
  foreach (array_keys($pm_cat) as $i) { 
    $catpid = $pm_cat[$i]->getVar('pid'); 
    $cattitle = $pm_cat[$i]->getVar('title');
  }
  unset($criteria);

  $precistotal = number_format(($total*100)/$xoopsModuleConfig['maxuser'], 0, ",", " ");


//alert stockage
if ( $total > $xoopsModuleConfig['maxuser']) {
    $msg_alert = _MP_ALERT."<br />"._MP_AVERT;
	$mpstop = "stop";		
} 

  				  
  switch( $op ) {
  //Boite de reception
  case "box": 
  default:
  $xoopsOption['template_main'] = 'mp_contbox.html'; 
  include XOOPS_ROOT_PATH."/header.php";
  
    $cont_handler  = & xoops_gethandler('priv_msgscont');
    $criteria = new CriteriaCompo(); 
    $criteria->add(new Criteria('ct_userid', $xoopsUser->getVar('uid'))); 
    $amount = $cont_handler->getCount($criteria); 
    //nav
    if ( $amount > 10 ) {
      $pagenav = new XoopsPageNav($amount, '10', $start, 'start', 'op=box');
      $pagenav = $pagenav->renderNav();
    } else {
      $pagenav = '';
    }
    $start = empty($_REQUEST['start'])?"0": intval($_REQUEST['start']);
    $limit_msg = (empty($_REQUEST['limit_msg']) ? (empty($olimite) ? '10' : $olimite ) : intval($_REQUEST['limit_msg']) );
    $sortorder = !empty($_REQUEST['sortorder']) ? $_REQUEST['sortorder'] : 'desc';
    $sortname = !empty($_REQUEST['sortname']) ? $_REQUEST['sortname'] : 'ct_uname';

    if (@$_REQUEST['after'] && $_REQUEST['after'] != "YYYY/MM/DD") {
      $criteria->add(new Criteria('ct_regdate', strtotime($_REQUEST['after']),"<"));
      $after = strtotime($_REQUEST['after']);		
    } else { $after = 0; }
	
    //$sq2 = "SELECT * from ".$xoopsDB->prefix("priv_msgscont")." where ct_userid = '".$xoopsUser->getVar('uid')."' order by ct_contact desc";	
    //$result2 = $xoopsDB->query($sq2,'20',$start);
    $criteria->setStart($start);
    $criteria->setLimit($limit_msg);
    $criteria->setSort($sortname);
    $criteria->setOrder($sortorder);
    $pm_cont =& $cont_handler->getObjects($criteria);
 		
    $xoopsTpl->assign('lang_from', _MP_CTT);
    $xoopsTpl->assign('lang_com', _MP_COM);
    $xoopsTpl->assign('lang_vous', _MP_VOUS);
    $xoopsTpl->assign('lang_groupe', _MP_GROUPES);
    $xoopsTpl->assign('lang_online', _MP_ETAT);
    $xoopsTpl->assign('lang_avatar', _MP_AVATAR);
    $xoopsTpl->assign('lang_msg',  sprintf(_MP_YOUCONTACT, $amount));
    $xoopsTpl->assign('lang_last', _MP_CONTACTLAST);
    $xoopsTpl->assign('lang_joindate', _MP_JOINDATE);
    $xoopsTpl->assign('mp_select', mp_selectcont('msgbox.php','box', $catbox, @$after, @$limit_msg, @$sortname, @$sortorder));

    if( ( $view_perms & GPERM_MESS ) ) {
      if (empty($mpstop)) {
        $box_actions[] = '<select class="xo-message-form" name="add" OnChange="window.document.location=this.options[this.selectedIndex].value;"><option selected>'._MP_MNEWS.'</option><option value="'.XOOPS_URL.'/modules/'.$mydirname.'/msgbox.php?op=sendbox&send=1">-> '._MP_MMES.'</option><option value="'.XOOPS_URL.'/modules/'.$mydirname.'/contbox.php?op=sendbox">-> '._MP_MCONT.'</option><option value="'.XOOPS_URL.'/modules/'.$mydirname.'/filebox.php?op=sendbox">-> '._MP_MFILE.'</option></select>';
        $box_actions[] = "<input type='submit' class='xo-message-form' onclick='document.prvmsg.action=\"msgbox.php?op=sendbox&cont=1\"' id='lu' disabled value='"._MP_READCTC."'>";
      } else {
        $box_actions[] = '<select name="add" class="xo-message-form" OnChange="window.document.location=this.options[this.selectedIndex].value;" disabled><option selected>'._MP_MNEWS.'</option><option value="'.XOOPS_URL.'/modules/'.$mydirname.'/msgbox.php?op=sendbox&send=1">-> '._MP_MMES.'</option><option value="'.XOOPS_URL.'/modules/'.$mydirname.'/contbox.php?op=sendbox">-> '._MP_MCONT.'</option><option value="'.XOOPS_URL.'/modules/'.$mydirname.'/filebox.php?op=sendbox">-> '._MP_MFILE.'</option></select>';
        $box_actions[] = "<input type='submit' class='xo-message-form' onclick='document.prvmsg.action=\"msgbox.php?op=sendbox&cont=1\"' id='stop' disabled value='"._MP_READCTC."'>";
      }
    }
    $box_actions[] = "<input type='submit' class='xo-message-form' onclick='document.prvmsg.action=\"delcont.php?option=delete_cont\"' id='del' disabled value='"._MP_FORMDEL."'>";
    $box_actions[] = "<input type='hidden' name='catbox' value='".$catbox."'>";
   // $box_actions[] = "<input type='hidden' name='after' value='".$after."'>";
    $box_actions[] = "<input type='hidden' name='limit_msg' value='".$limit_msg."'>";
    $box_actions[] = "<input type='hidden' name='sortname' value='".$sortname."'>";
    $box_actions[] = "<input type='hidden' name='sortorder' value='".$sortorder."'>";

    $xoopsTpl->assign('box_actions', $box_actions);
    $xoopsTpl->assign('mp_amount', $amount);

    if ( $amount == 0 ) {
      $xoopsTpl->assign('lang_none', _MP_YOUDONTCONTACT);
    }
    $i = $start + 0;
    foreach (array_keys($pm_cont) as $i) { 
		  $poster = new XoopsUser($pm_cont[$i]->getVar('ct_contact'));
      $mp['msg_id'] = $pm_cont[$i]->getVar('ct_contact');	
		  $postername = $poster->getVar('uname')."<br />".$poster->getVar('name');
		  $userrank =& $poster->rank();
      /* No need to show deleted users */
      if ($postername) {
		    $mp['msg_poster'] = "<a href='".XOOPS_URL."/userinfo.php?uid=".$pm_cont[$i]->getVar('ct_contact')."'>".$postername."</a>";
      } else {
		    $mp['msg_poster'] = $xoopsConfig['anonymous'];
      }
		  $mp['msg_joindate'] = formatTimestamp($poster->getVar("user_regdate"));
		  /* Online poster */
      if ($poster->isOnline()) {
        $mp['msg_online'] = '<img src="'.XOOPS_URL.'/modules/'.$xoopsModule->dirname().'/images/online.png" title="'._MP_ONLINE.'" style="width: 20px; height: 20px;"/>';
      } else {
        $mp['msg_online'] = '<img src="'.XOOPS_URL.'/modules/'.$xoopsModule->dirname().'/images/offline.png" title="'._MP_OFFLINE.'" style="width: 20px; height: 20px;"/>';
      }
		  /**/
		  $mp['msg_last'] = formatTimestamp($poster->getVar("last_login"));
          $mp['msg_com'] = $poster->getVar('posts');
		  if ($userrank['image']) {
		  $mp['msg_groupe'] =  '<img src="'.XOOPS_UPLOAD_URL.'/'.$userrank['image'].'" alt="" /><br />'.$userrank['title'];
		  }else {
		  $mp['msg_groupe'] =  '<img src="'.XOOPS_UPLOAD_URL.'/blank.gif" alt="" /><br />'.$userrank['title'];
				  }
		  
		if (is_file(XOOPS_UPLOAD_PATH."/".$poster->getVar('user_avatar'))) {
$mp['msg_avatar'] = '<img class="comUserImg" src="'.XOOPS_UPLOAD_URL."/".$poster->getVar("user_avatar").'" alt=""/>';
} else { $mp['msg_avatar'] = '<img class="comUserImg" src="'.XOOPS_UPLOAD_URL.'"/blank.gif" alt=""/>';}  
		  
      $xoopsTpl->append('prive', $mp);  
      $i++;  
    }	
    $xoopsTpl->assign('mp_pagenav', $pagenav);	 
    break;


  case "envoimp":

    global $xoopsDB, $xoopsUser, $xoopsConfig;
    //stockage
    if (!empty($mpstop)) {
      redirect_header($_SERVER['PHP_SELF'],1, _PM_PURGEMES);
      exit();
    }	

    if (empty($_REQUEST['to_userid'])) {
      redirect_header("javascript:history.go(-1)",1, _PM_USERNOEXIST);
      exit;
    }
    $ct_userid = $xoopsUser->getVar('uid');
    //news 
    $pm_handler  = & xoops_gethandler('priv_msgscont');
    foreach ($_REQUEST['to_userid'] as $u_id => $u_id_name) {
      $countcriteria = new CriteriaCompo();
      $countcriteria->add(new Criteria('ct_userid', $xoopsUser->getVar('uid')));
      $countcriteria->add(new Criteria('ct_contact', $u_id_name)); 
      $pm2 = $pm_handler->getCount($countcriteria); 
      if ($pm2) {
        redirect_header("javascript:history.go(-1)",2, _MP_USEREXIT);
      } else {
        $member_handler =& xoops_gethandler('member');
        $members =& $member_handler->getUser($u_id_name);
        $pm_handler  = & xoops_gethandler('priv_msgscont');
        $pm =& $pm_handler->create();
        $pm->setVar("ct_userid", $xoopsUser->getVar("uid")); 
        $pm->setVar("ct_contact", $u_id_name);
        $pm->setVar("ct_name", $members->getVar("name"));
        $pm->setVar("ct_uname", $members->getVar("uname"));
        $pm->setVar("ct_regdate", $members->getVar("user_regdate"));
        $erreur = $pm_handler->insert($pm);  
      }
    }			
    if (!$erreur) {
			redirect_header("javascript:history.go(-1)",1, _PM_REDNON);
		} else {
			redirect_header("contbox.php?op=box",1, _PM_CONTACTPOSTED);
		}
    break;
  case "sendbox":			
    $xoopsOption['template_main'] = 'mp_subox.html';
	include XOOPS_ROOT_PATH."/header.php";

    //stockage
    if (!empty($mpstop)) {
      redirect_header($_SERVER['PHP_SELF'],1, _PM_PURGEMES);
      exit();
    }	

$limit_msg = (empty($_REQUEST['limit_msg']) ? (empty($olimite) ? '10' : $olimite ) : intval($_REQUEST['limit_msg']) );
$sortorder = (empty($_REQUEST['sortorder']) ? (empty($osortorder) ? 'desc' : $osortorder ) : $_REQUEST['sortorder'] );
$sortname = (empty($_REQUEST['sortname']) ? (empty($osortname) ? 'msg_time' : $osortname ) : $_REQUEST['sortname'] );

if (@$_REQUEST['after'] && $_REQUEST['after'] != "YYYY/MM/DD") {
 $catcriteria->add(new Criteria('msg_time', strtotime($_REQUEST['after']),">"));
 $after = strtotime($_REQUEST['after']);		
 } else { $after = 0; }


    $send = !empty($_GET['send']) ? 1 : 0;
    $start2 = !empty($_GET['start2']) ? intval($_GET['start2']) : 0;
    $xoopsTpl->assign('mp_formulaire', "<form name='read' method='post' action='contbox.php'>");
    $xoopsTpl->assign('mp_input_reply', "<input type='submit' onclick='document.prvmsg.action=\"contbox.php?send=1\"' id='post_messages' name='post_messages' value='"._MP_SUBMIT."'>");
    $xoopsTpl->assign('mp_input_del', "<input type='reset' id='reply' value='"._MP_CLEAR."'>");
	
    $form = new XoopsThemeForm(_MP_ADDCONTACT, "read", "contbox.php?send=1");
 
//auto proposition de pseudo
   $tosee = new XoopsFormText('', 'inputString', 25, 50, '');
   $tosee -> setExtra("onkeyup='lookup(this.value);'");
   $tosee_tray = new XoopsFormElementTray(_MP_SEARCH, '&nbsp;');
   $tosee_tray->addElement($tosee);  
  //$tosee_tray->addElement(new XoopsFormLabel('', "<a href='###' onclick='lookupC();' >"._MP_CONTACT."</a>"));

   $tosee_tray->addElement(new XoopsFormLabel('', "<div class='suggestionsBox' id='suggestions' style='display: none;'>
				<div class='suggestionList' id='autoSuggestionsList'>
					&nbsp;
				</div><div align='center'><a href='#' onclick='closefill();'>Close</a></div> 
		</div> "));

   $form->addElement($tosee_tray);

//boite d'envoie
 $to_username = new XoopsFormSelect('', 'to_userid', @$_REQUEST['to_userid'], 5, true);
 $to_username -> setExtra("style=\"width:170px;\" ");
 $to_username2 = new XoopsFormElementTray(_MP_CTT, '&nbsp;');
 $to_username2->setDescription(sprintf(_MP_UNOTE,$xoopsModuleConfig['senduser']));
 $to_username2->addElement($to_username);  
 $to_username2->addElement(new XoopsFormLabel('', "<small><br /><a href='###' onclick='delfill();' >"._MP_MDEL."</a> | <a href='###' onclick='delallfill();' >"._MP_MDELALL."</a></small>"));
 $form->addElement($to_username2);

	 
    $button_tray = new XoopsFormElementTray('' ,'');
    $post_button = new XoopsFormButton('', 'post_messages', _MP_SUBMIT, "submit");
    $post_button -> setExtra("onclick='document.read.action=\"contbox.php?op=envoimp\",selectfill(".$xoopsModuleConfig['senduser'].")'");
    $button_tray->addElement($post_button);

    $button_tray->addElement(new XoopsFormButton('', 'reset', _MP_CLEAR, 'reset'));

    $form->addElement($button_tray);

    if( ( $view_perms & GPERM_MESS ) ) {
      if (empty($mpstop)) {
        $box_actions[] = '<select name="add" class="xo-message-form"  OnChange="window.document.location=this.options[this.selectedIndex].value;"><option selected>'._MP_MNEWS.'</option><option value="'.XOOPS_URL.'/modules/'.$mydirname.'/msgbox.php?op=sendbox&send=1">-> '._MP_MMES.'</option><option value="'.XOOPS_URL.'/modules/'.$mydirname.'/contbox.php?op=sendbox">-> '._MP_MCONT.'</option><option value="'.XOOPS_URL.'/modules/'.$mydirname.'/filebox.php?op=sendbox">-> '._MP_MFILE.'</option></select>';
        $box_actions[] = "<input type='submit' class='xo-message-form' onclick='document.prvmsg.action=\"contbox.php?op=envoimp\"' id='post_messages' value='"._MP_SUBMIT."'>";
      } else {
        $box_actions[] = '<select name="add" class="xo-message-form"  OnChange="window.document.location=this.options[this.selectedIndex].value;" disabled><option selected>'._MP_MNEWS.'</option><option value="'.XOOPS_URL.'/modules/'.$mydirname.'/msgbox.php?op=sendbox&send=1">-> '._MP_MMES.'</option><option value="'.XOOPS_URL.'/modules/'.$mydirname.'/contbox.php?op=sendbox">-> '._MP_MCONT.'</option><option value="'.XOOPS_URL.'/modules/'.$mydirname.'/filebox.php?op=sendbox">-> '._MP_MFILE.'</option></select>';
        $box_actions[] = "<input type='submit' class='xo-message-form' onclick='document.prvmsg.action=\"contbox.php?op=envoimp\"' id='stop' disabled value='"._MP_SUBMIT."'>";
      }
    }
    $box_actions[] = "<input type='reset' class='xo-message-form' id='reset'  value='"._MP_CLEAR."'>";
    $box_actions[] = "<input type='button' class='xo-message-form' OnClick=\"msgpop('&nbsp;"._MP_HELP_CONTSEND."&nbsp;')\" value='?'><div id=\"tooltip\" style=\"visibility: hidden;\"></div>";
    $box_actions[] = "<input type='hidden' name='catbox' value='".$catbox."'>";
    $box_actions[] = "<input type='hidden' name='after' value='".$after."'>";
    $box_actions[] = "<input type='hidden' name='limit_msg' value='".$limit_msg."'>";
    $box_actions[] = "<input type='hidden' name='sortname' value='".$sortname."'>";
    $box_actions[] = "<input type='hidden' name='sortorder' value='".$sortorder."'>";
    $xoopsTpl->assign('box_actions', $box_actions);

    $xoopsTpl->assign('mp_form', $form->render());

    break;  
  }	
  
 
  
  /* Affiche les Dossiers */
  mp_category($precistotal, $catbox, @$catpid);
  //Language & menu
  $xoopsTpl->assign('lang_private', _PM_PRIVATEMESSAGE);
  $xoopsTpl->assign('lang_rece', _PM_RECE);
  $xoopsTpl->assign('lang_mes', _MP_MESSAGE);
  $xoopsTpl->assign('lang_news', _MP_NEWS);
  $xoopsTpl->assign('lang_file', _MP_FILE); 
  $xoopsTpl->assign('lang_menu', MpMenu('contbox.php'));
  $xoopsTpl->assign('mp_precistotal',  sprintf(_MP_MDEBIT, $precistotal.'%'));
 // $xoopsTpl->assign('xoops_module_header', $mp_module_header);
  mp_cache();

  include XOOPS_ROOT_PATH."/footer.php";

}
?>
