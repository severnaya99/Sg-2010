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
include("../../mainfile.php");
/* MusS : Use XOOPS_ROOT_PATH for all include file */
include_once XOOPS_ROOT_PATH."/include/xoopscodes.php";
include_once XOOPS_ROOT_PATH.'/class/pagenav.php';
include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
include_once XOOPS_ROOT_PATH.'/modules/mpmanager/class/priv_msgs.php';
include_once XOOPS_ROOT_PATH.'/modules/mpmanager/class/priv_msgscat.php';
include_once XOOPS_ROOT_PATH.'/modules/mpmanager/class/priv_msgscont.php';
include_once XOOPS_ROOT_PATH.'/modules/mpmanager/class/priv_msgsopt.php';
include_once XOOPS_ROOT_PATH.'/modules/mpmanager/class/priv_msgsup.php';
include_once XOOPS_ROOT_PATH.'/modules/mpmanager/include/functions.php';


//$mp_module_header = "<link rel='stylesheet' type='text/css' href='" . XOOPS_URL . "/modules/mpmanager/mpstyle.css'/><script type='text/javascript' src='".XOOPS_URL."/modules/mpmanager/include/multifile.js'></script><script type='text/javascript' src='".XOOPS_URL."/modules/mpmanager/include/jquery.js'></script>";



$myts = & MyTextSanitizer :: getInstance(); // MyTextSanitizer object
$mydirname = basename( dirname( __FILE__ ) ) ;
include XOOPS_ROOT_PATH."/modules/$mydirname/include/get_perms.php" ;


if (!empty($xoopsUser)) {
 //option utilisateur
 $opt_handler  = & xoops_gethandler('priv_msgsopt');
 $opt =& $opt_handler->get($xoopsUser->getVar('uid'));
 if (!$opt) {
 $onotif = false; $oresend = false; $osortorder = false;
 $osortname = false; $olimite  = false; $ohome  = false; $ovieworder = false;
 $oformtype = false;
 $msg_alert = _MP_AOERT;
 } else {
 $onotif = $opt->getVar('notif'); $oresend = $opt->getVar('resend');
 $osortorder = $opt->getVar('sortorder'); $osortname = $opt->getVar('sortname');
 $olimite  = $opt->getVar('limite'); $ohome  = $opt->getVar('home'); 
 $ovieworder = $opt->getVar('vieworder'); $oformtype = $opt->getVar('formtype');
 }
 }
/* MusS : Include the pmsg.php file */
if (file_exists(XOOPS_ROOT_PATH.'/language/'.$xoopsConfig['language'].'/pmsg.php')){
	include_once(XOOPS_ROOT_PATH.'/language/'.$xoopsConfig['language'].'/pmsg.php');
}else{
	if (file_exists(XOOPS_ROOT_PATH . '/language/english/pmsg.php')){
		include_once(XOOPS_ROOT_PATH . '/language/english/pmsg.php');
	}else{
    /* MusS : Compatibility with Xoops 2.2.* */
    if(file_exists(XOOPS_ROOT_PATH.'/modules/pm/language/'.$xoopsConfig['language'].'/main.php')){
      include_once XOOPS_ROOT_PATH.'/modules/pm/language/'.$xoopsConfig['language'].'/main.php';
    }else{
      if(file_exists(XOOPS_ROOT_PATH.'/modules/pm/language/english/main.php')){
      include_once XOOPS_ROOT_PATH.'/modules/pm/language/english/main.php';
      }
    }
  }
}
/* MusS : Include modinfo.php for include constant */
if( file_exists(XOOPS_ROOT_PATH."/modules/".$mydirname."/language/".$xoopsConfig['language']."/modinfo.php") ) {
	include_once(XOOPS_ROOT_PATH."/modules/".$mydirname."/language/".$xoopsConfig['language']."/modinfo.php");
} else {
	include_once(XOOPS_ROOT_PATH."/modules/".$mydirname."/language/english/modinfo.php");
}
?>
