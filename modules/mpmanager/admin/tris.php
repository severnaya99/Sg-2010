<?PHP
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
include("admin_header.php");


$myts =& MyTextSanitizer::getInstance();
  


if (isset($_REQUEST['op'])) {
	$op = $_REQUEST['op'];
} else {
@$op = 'default';
}

 xoops_cp_header();	 
  
global $xoopsDB, $xoopsConfig, $_REQUEST, $xoopsModule, $myts, $xoopsUser;


 $pm_handler  = & xoops_gethandler('priv_msgs');
 $criteria = new CriteriaCompo();
 $savecriteria = new CriteriaCompo();

  if ((!isset($includefile) || $includefile == 0)) {
   $savecriteria->add(new Criteria('cat_msg', 3, '<'));
 }

 if (isset($_REQUEST['del_groupe']) || isset($_REQUEST['del_userid'])) {
  $tocriteria = new CriteriaCompo();
  }

 if (isset($_REQUEST['after']) && $_REQUEST['after'] != "YYYY-MM-DD") {
 $criteria->add(new Criteria('msg_time', strtotime($_REQUEST['after']), ">"));
// $after = strtotime($after);		
 }

 if (isset($_REQUEST['before']) && $_REQUEST['before'] != "YYYY/MM/DD") {
  $criteria->add(new Criteria('msg_time', strtotime($_REQUEST['before']), "<"));
 //$before = strtotime($_REQUEST['before']);
 }

 if (isset($_REQUEST['onlyread']) && $_REQUEST['onlyread'] == 0) {
 $criteria->add(new Criteria('read_msg', 1));
 }

 if ((!isset($_REQUEST['includebox']) || $_REQUEST['includebox'] == 0)) {
 $savecriteria->add(new Criteria('cat_msg', 1, '!='));
 }

 if ((!isset($_REQUEST['includesave']) || $_REQUEST['includesave'] == 0)) {
 $savecriteria->add(new Criteria('cat_msg', 3, '!='));
 }
 if ((!isset($_REQUEST['includesend']) || $_REQUEST['includesend'] == 0)) {
        $savecriteria->add(new Criteria('cat_msg', 2, '!='));
 }
	
 if ((@isset($_REQUEST['del_userid']) || @$_REQUEST['del_userid'] != '')) {

 foreach ($_REQUEST['del_userid'] as $del) {
 $tocriteria->add(new Criteria('to_userid', $del), 'OR');
 } }

	
if ((@isset($_REQUEST['del_groupe']) || @$_REQUEST['del_groupe'] != '')) {
 foreach ($_REQUEST['del_groupe'] as $del => $u_name) {
 $member_handler =& xoops_gethandler('member');
 $members =& $member_handler->getUsersByGroup($u_name, true);
 $mcount = count($members);
 if ($mcount > 4000) {
 redirect_header('tris.php?after='.strtotime($_REQUEST['after']).'&before='.strtotime($_REQUEST['before']).'', 2, _MP_DELETECOUNT);
 }
 for ($i = 0; $i < $mcount; $i++) {
 $tocriteria->add(new Criteria('to_userid',  $members[$i]->getVar('uid')), 'OR');
 } }  }
 
  if (isset($_REQUEST['del_groupe']) || isset($_REQUEST['del_userid'])) {
  $criteria->add($tocriteria);
  }

  if (@$_REQUEST['includefile'] == 0 || @$_REQUEST['includebox'] == 0 || @$_REQUEST['includesave']  == 0 || @$_REQUEST['includesend'] == 0 ) {
 $criteria->add($savecriteria);
}


 mp_adminmenu(1, _MP_ADMENU1);
 mp_collapsableBar('toptable', 'toptableicon');
 
 switch( $op )
{

case _MP_VISU:

 mp_collapsableBar('midletable', 'midletableicon');
 
  $numrows = $pm_handler->getCount($criteria);	
  
 echo "<img onclick='toggle('midletable'); toggleIcon('midletableicon');' id='midletableicon' name='midletableicon' src=" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/images/icon/close12.gif alt='' /></a>&nbsp;" . _MP_DRESULT . "</h3>
 <div id='midletable'>";
 echo '<table width="100%" cellspacing="1" class="outer"><tr>
 <th align="center" colspan="7"><b>('.$numrows.') '._MP_LAST10ARTS.'</b></th>
 </tr>
 </table></div><br />';
     	$obj =& $pm_handler->create();
    	$form = $obj->getForm();
    	$form->display();
break;


 case _MP_PURGE_OK:
//purge

 if ((!isset($notifyfile) || $notifyfile == 1)) { 
$pm_arr =& $pm_handler->getObjects($criteria);
    foreach (array_keys($pm_arr) as $i) {  

 mp_delupload($pm_arr[$i]->getVar('file_msg'));
 }  }



 if ((!isset($notifyusers) || $notifyusers == 1)) {
 $notifycriteria = $criteria;
 $uids = $pm_handler->getCountTouser($notifycriteria);
//date d'envoie
$time = $_REQUEST['before']+60;
 foreach ($uids as $uid => $messagecount) {
 $pm = $pm_handler->create();
 $pm->setVar("cat_msg", 1);
 $pm->setVar("msg_time", $time);
 $pm->setVar("subject", _MP_SUBJECT_PRUNE);
 $pm->setVar("msg_text", str_replace('{X_COUNT}', $messagecount['count'], $xoopsModuleConfig['prunemessage']));
 $pm->setVar("to_userid", $uid);
 $pm->setVar("from_userid", $xoopsUser->getVar("uid"));            
 $pm_handler->insert($pm);
 unset($pm);
 } }

 //optimise la table
 if ($xoopsModuleConfig['optimise'] == 1 ) {
 mysql_query('OPTIMIZE TABLE '.$xoopsDB->prefix("priv_msgs")); 
 }

 $numrows = $pm_handler->getCount($criteria);	
 $erreur = $pm_handler->deleteAll($criteria);

if (!$erreur) {
 redirect_header('tris.php', 2, _MP_PURGE_KO);
} else {
 redirect_header('tris.php?after='.strtotime($_REQUEST['after']).'&before='.strtotime($_REQUEST['before']).'', 2, sprintf(_MP_DELETE,$numrows));
}

 break;

//fin de purge

case "default":
   default:
 mp_collapsableBar('midletable', 'midletableicon');
 echo "<img onclick='toggle('toptable'); toggleIcon('toptableicon');' id='toptableicon' name='toptableicon' src=" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/images/icon/close12.gif alt='' /></a>&nbsp;" . _MP_DTRIS . "</h4>
 <div id='toptable'><br /><table width='100%' border='0' cellspacing='1' class='outer'><tr><td>";

 	$obj =& $pm_handler->create();
    $form = $obj->getForm();
    $form->display();
 
 echo"</td></tr></table></div><br />";

break;   
   
   }
   
   xoops_cp_footer();
   
?>