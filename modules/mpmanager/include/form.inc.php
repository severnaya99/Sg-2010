<?php
// $Id: forumform.inc.php,v 1.1.1.51 2004/11/15 18:19:20 phppp Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
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
// Author: Kazumi Ono (AKA onokazu)                                          //
// URL: http://www.myweb.ne.jp/, http://www.xoops.org/, http://jp.xoops.org/ //
// Project: The XOOPS Project                                                //
// ------------------------------------------------------------------------- //

if (!defined('XOOPS_ROOT_PATH')) {
	exit();
} 

//form
$form = new XoopsThemeForm(_MP_READMSG, "read", $_SERVER['PHP_SELF'].'?send='.$send.'&reply='.$reply.'&cont='.$cont);
$form->setExtra( "enctype='multipart/form-data'" ); 

if ( $reply == 1 ) {
	$user_select_tray = new XoopsFormLabel(_MP_TOC, $pm_uname);
	$texte_hidden = new XoopsFormHidden("to_userid[]", $pm2->getVar("from_userid"));
	$form->addElement($user_select_tray);
    $form->addElement($texte_hidden);
	$reply_hidden = new XoopsFormHidden("reply", $reply);
	$form->addElement($reply_hidden);
    } elseif ( $send2 == 1 ) {
	$user_select_tray = new XoopsFormLabel(_MP_TOC, XoopsUser::getUnameFromId($to_userid));
	$texte_hidden = new XoopsFormHidden("to_userid[]", $to_userid);
	$form->addElement($user_select_tray);
    $form->addElement($texte_hidden);
	} elseif ($cont == 1) {

//envoie au contact	
if (empty($_REQUEST['ct_contact'])) {
    redirect_header("javascript:history.go(-1)",2, _PM_REDNON);
	}
$ct_username = new XoopsFormSelect('', 'to_userid', @$_REQUEST['to_userid'], 5, true);
$ct_username -> setExtra("style=\"width:170px;\" ");
$ct_username2 = new XoopsFormElementTray(_MP_TOC, '&nbsp;');
$ct_username2->setDescription(sprintf(_MP_UNOTE,$xoopsModuleConfig['senduser']));
$member_handler = &xoops_gethandler('member');
$criteria = new CriteriaCompo();

foreach($_REQUEST['ct_contact'] as $value ) {
$criteria = new CriteriaCompo(new Criteria('uid', $value));
$criteria->setSort('name');
$criteria->setOrder('ASC');
$ct_username->addOptionArray($member_handler->getUserList($criteria));
}
 $ct_username2->addElement($ct_username); 
 $form->addElement($ct_username2);

	}
	
	else {	 

//auto proposition de pseudo
   $tosee = new XoopsFormText('', 'inputString', 25, 50, '');
   $tosee -> setExtra("onkeyup='lookup(this.value);'");
   $tosee_tray = new XoopsFormElementTray(_MP_SEARCH, '&nbsp;');
   $tosee_tray->addElement($tosee);  
  $tosee_tray->addElement(new XoopsFormLabel('', "<a href='###' onclick='lookupC();' >"._MP_CONTACT."</a>"));

   $tosee_tray->addElement(new XoopsFormLabel('', "<div class='suggestionsBox' id='suggestions' style='display: none;'>
				<div class='suggestionList' id='autoSuggestionsList'>
					&nbsp;
				</div><div align='center'><a href='#' onclick='closefill();'>Close</a></div> 
		</div> "));

   $form->addElement($tosee_tray);

//boite d'envoie
 $to_username = new XoopsFormSelect('', 'to_userid', @$_REQUEST['to_userid'], 5, true);
 $to_username -> setExtra("style=\"width:170px;\" ");
 $to_username2 = new XoopsFormElementTray(_MP_TOC, '&nbsp;');
 $to_username2->setDescription(sprintf(_MP_UNOTE,$xoopsModuleConfig['senduser']));
 $to_username2->addElement($to_username);  
 $to_username2->addElement(new XoopsFormLabel('', "<small><br /><a href='###' onclick='delfill();' >"._MP_MDEL."</a> | <a href='###' onclick='delallfill();' >"._MP_MDELALL."</a></small>"));
 $form->addElement($to_username2);


 }		

//$select_form
$deschtml = ($xoopsModuleConfig['html'] == 0  ?   _MP_NHTML : _MP_OHTML );

//form
if ( $reply != 1 &&  $send2 != 1 && $cont != 1 ) {

$groupe_select = new XoopsFormSelect(_MP_GROUPE, "to_groupe", false, 5, true);
$groupe_select -> setExtra("style=\"width:170px;\" ");
		$member_handler =& xoops_gethandler('member');
		$group_list = &$member_handler->getGroupList();
		
foreach ($group_list as $group_id => $group_name) {
foreach ($groupe_perms as $perm_name => $perm_data) {
if ($perm_data == $group_id) {
     $groupe_select->addOption($group_id, $group_name);
}
}
}
if (!empty($perm_data)) {
		$form->addElement($groupe_select);
}
	}
	


$icons_radio = new XoopsFormRadio(_MP_MESSAGEICON, 'msg_image', $icon);
$subject_icons = XoopsLists::getSubjectsList();
foreach ($subject_icons as $iconfile) {
	$icons_radio->addOption($iconfile, '<img src="'.XOOPS_URL.'/images/subject/'.$iconfile.'" alt="" />');
}
$form->addElement($icons_radio); 

if( ( $view_perms & GPERM_OEIL ) ) {
    $indeximage_select = new XoopsFormText('', 'anim_msg', 25, 50, $anim);
	$indeximage_select -> setExtra("readonly=\"readonly\" ");
    $indeximage_tray = new XoopsFormElementTray(_MP_MESSAGEOEIL, '&nbsp;');
    $indeximage_tray->addElement($indeximage_select);
    $indeximage_tray->addElement(new XoopsFormLabel('', "<A HREF=\"javascript:;\" onClick=\"window.open('pop.php','_blank','toolbar=0, location=0, directories=0, status=0, scrollbars=1, resizable=0, copyhistory=0, menuBar=0, width=700, height=400');return false;\"><img src=\"images/popup.gif\">&nbsp;"._MP_MESSAGEVUOEIL."</A>"));
    $form->addElement($indeximage_tray);
}



$form_subject = new XoopsFormText(_MP_SUBJECTC, "subject", 50, 100, $subject);
$form_subject -> setExtra("onclick=\"selectfill(".$xoopsModuleConfig['senduser'].");\"");
$form->addElement($form_subject, true); 


$editor = WysiwygForm(_MP_MESSAGEC, "message", $message, '100%', '400px', $formtype);
$editor->setDescription(sprintf($deschtml));
$form->addElement($editor);

//$text_select = new XoopsFormDhtmlTextArea(_MP_MESSAGE, "message", $message, 15, 85);
//$form->addElement($text_select, true);

$button_tray = new XoopsFormElementTray('' ,'');
//upload
if( ( $view_perms & GPERM_UP ) ) {
$indeximage_up = new XoopsFormFile('', 'fileup', $xoopsModuleConfig['mimemax']);  
$indeximage_uptray = new XoopsFormElementTray(_MP_MIMEFILE, '&nbsp;');
$indeximage_uptray->addElement($indeximage_up);
$indeximage_uptray->addElement(new XoopsFormLabel('', '<br />'._MP_MIMETYPE2.mp_mimetypes().'<br />'._MP_MIME.sprintf(_MD_NUMBYTES, $xoopsModuleConfig['mimemax'])));
$form->addElement($indeximage_uptray);

$up_tray = new XoopsFormElementTray(_MP_MIMEFILE, '&nbsp;');
$up_tray->addElement(new XoopsFormLabel('', "<div id=\"files_list\"></div>
<script>
	var multi_selector = new MultiSelector( document.getElementById( 'files_list' ), ".$xoopsModuleConfig['upmax']." );
	multi_selector.addElement( document.getElementById( 'fileup' ) );
</script>"));
$form->addElement($up_tray);
}


//
$post_button = new XoopsFormButton('', 'post_messages', _MP_SUBMIT, "submit");
$button_tray->addElement($post_button);
// quote
if ($reply == 1) {
$quote_button = new XoopsFormButton('', 'quote', _MP_QUOTE, 'button');
$quote_button->setExtra("onclick='xoopsGetElementById(\"message\").value=xoopsGetElementById(\"message\").value+ xoopsGetElementById(\"hidden_quote\").value;xoopsGetElementById(\"hidden_quote\").value=\"\";'");
$button_tray->addElement($quote_button);
}
//
$button_tray->addElement(new XoopsFormButton('', 'reset', _MP_CLEAR, 'reset'));
$form->addElement($button_tray);
$form->addElement(new XoopsFormHidden('hidden_quote', $hidden_quote));
$form_formtype = new XoopsFormHidden("formtype", $formtype);
$form->addElement($form_formtype);
$msg_hidden = new XoopsFormHidden("msg_mp", $msg_mp);
$form->addElement($msg_hidden);

@$content .= $form->render();

$xoopsTpl->assign('mp_form', $content);
?>
