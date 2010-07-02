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

/*testing msg variable */
$msg_id = empty($_REQUEST['msg_mp']) ? '' : $_REQUEST['msg_mp'];
$option = !empty($_REQUEST['option']) ? $_REQUEST['option'] : 'default';

if ( empty($msg_id) ) {
	redirect_header(XOOPS_URL."/modules/mpmanager/msgbox.php",2,_PM_REDNON);
}

/* Global Xoops variable */
global $xoopsUser, $xoopsDB, $xoopsConfig, $xoopsModule, $xoops_meta_keywords ,$xoops_meta_description;

if (empty($xoopsUser)) {
 redirect_header("".XOOPS_URL."/user.php",1,_PM_REGISTERNOW);
	}
  
/*Verify permissions*/
if(!( $view_perms & GPERM_EXP ) ) {
redirect_header("javascript:history.go(-1)",1, _PM_REDNON);
}

$catbox = empty($_REQUEST['catbox'])?1:intval($_REQUEST['catbox']);

$size = count($msg_id);
$msg =& $msg_id;
$xoopsMailer =& getMailer();  
$xoopsMailer->multimailer->isHTML(true); 
$xoopsMailer->setFromEmail ($myts->oopsStripSlashesGPC($xoopsConfig['adminmail']));
$xoopsMailer->setToEmails($myts->oopsStripSlashesGPC($xoopsUser->email()));
$xoopsMailer->setFromName($myts->oopsStripSlashesGPC($xoopsConfig['sitename']));
$xoopsMailer->setSubject($myts->oopsStripSlashesGPC(sprintf(_MP_MBOX, $xoopsConfig['sitename'])));


$body = "<div align='center'>".$xoopsConfig['sitename'] . "<br />".$xoopsConfig['slogan'] ."</div><br /><br />";

	  
 for ( $i = 0; $i < $size; $i++ ) {
 
 switch( $option )
{
   default:
   redirect_header("javascript:history.go(-1)",1, _PM_REDNON);
   break;
case "email_messages":
 $pm_handler  = & xoops_gethandler('priv_msgs');
 $pm =& $pm_handler->get($msg_id[$i]);

 $poster = new XoopsUser($pm->getVar("from_userid"));
$body .= "&nbsp;
<table border='0' cellspacing='1' cellpadding='4' width='100%' style='border: #ccc 1px solid'>
<tr><td width='20%'>"._PM_FROM.":&nbsp;<b><a href='".XOOPS_URL."/userinfo.php?uid=".$poster->getVar("uid")."'>".$poster->getVar("uname")."</a></td>
    <td>"._MP_POSTED.":&nbsp;<b>".formatTimestamp($pm->getVar("msg_time"))."</b></td>
</tr>	
<tr><td valign='top' colspan='2'><div align='left'>". _PM_SUBJECT.":&nbsp;".$myts->htmlSpecialChars($myts->stripSlashesGPC($pm->getVar("subject")))."<br />
"._MP_MMES.":&nbsp;".$myts->htmlSpecialChars($myts->stripSlashesGPC($pm->getVar("msg_text")))."</div></td></tr></table>";

 break;
  
case "email_messagess":
 $pm_handler  = & xoops_gethandler('priv_msgs'); 
 $pm =& $pm_handler->get($msg_id[$i]);
 $criteria = new CriteriaCompo();
 $criteria->add(new Criteria('to_userid', $xoopsUser->getVar('uid')));
 $criteria->add(new Criteria('msg_pid', $pm->getVar('msg_pid'))); 
 $pm =& $pm_handler->getObjects($criteria);
 
 foreach (array_keys($pm) as $i) { 
  $poster = new XoopsUser($pm[$i]->getVar("from_userid"));
$body .= "&nbsp;
<table border='0' cellspacing='1' cellpadding='4' width='100%' style='border: #ccc 1px solid'>
<tr><td width='20%'>"._PM_FROM.":&nbsp;<b><a href='".XOOPS_URL."/userinfo.php?uid=".$poster->getVar("uid")."'>".$poster->getVar("uname")."</a></td>
    <td>"._MP_POSTED.":&nbsp;<b>".formatTimestamp($pm[$i]->getVar("msg_time"))."</b></td>
</tr>	
<tr><td valign='top' colspan='2'><div align='left'>". _PM_SUBJECT.":&nbsp;".$myts->htmlSpecialChars($myts->stripSlashesGPC($pm[$i]->getVar("subject")))."<br />
"._MP_MMES.":&nbsp;".$myts->htmlSpecialChars($myts->stripSlashesGPC($pm[$i]->getVar("msg_text")))."</div></td></tr></table>";
 }
  break;
 }
}

$xoopsMailer->setBody($myts->oopsStripSlashesGPC($body));

if ($xoopsMailer->send()) {
redirect_header("javascript:history.go(-1)",1, _PM_EMAIL);
} else {
redirect_header("javascript:history.go(-1)",1, _PM_REDNON);
}

?>