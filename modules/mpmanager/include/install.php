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
if( ! defined( 'XOOPS_ROOT_PATH' ) ) exit ;

function xoops_module_install_mpmanager(&$module) {
  global $xoopsDB, $xoopsConfig, $xoopsUser, $xoopsModule;
  if( file_exists(XOOPS_ROOT_PATH."/modules/mpmanager/language/".$xoopsConfig['language']."/admin.php") ) {
	 include_once(XOOPS_ROOT_PATH."/modules/mpmanager/language/".$xoopsConfig['language']."/admin.php");
  } else {
	 include_once(XOOPS_ROOT_PATH."/modules/mpmanager/language/english/admin.php");
  }
  $xoopsDB->queryF("UPDATE ".$xoopsDB->prefix('modules')." SET weight = 0 WHERE mid = ".$module->getVar('mid')."");

  if (is_object($xoopsUser) && $xoopsUser->isAdmin($xoopsModule->mid())) {

    if(!TableExists($xoopsDB->prefix('priv_msgs'))){
      $xoopsDB->queryFromFile(XOOPS_ROOT_PATH."/modules/mpmanager/sql/mysqlmsg.sql");
    }
    $result = $xoopsDB->queryF("INSERT INTO `".$xoopsDB->prefix('priv_msgscat')."` (`cid`, `pid`, `title`, `uid`, `ver`) VALUES (1, 0, '"._MP_BOX1."', NULL, 1)");
    $result = $xoopsDB->queryF("INSERT INTO `".$xoopsDB->prefix('priv_msgscat')."` (`cid`, `pid`, `title`, `uid`, `ver`) VALUES (2, 0, '"._MP_BOX2."', NULL, 1)");
    $result = $xoopsDB->queryF("INSERT INTO `".$xoopsDB->prefix('priv_msgscat')."` (`cid`, `pid`, `title`, `uid`, `ver`) VALUES (3, 0, '"._MP_BOX3."', NULL, 1)");

    if (!FieldExists('reply_msg',$xoopsDB->prefix('priv_msgs'))) {
      $result = $xoopsDB->queryF("ALTER TABLE `".$xoopsDB->prefix('priv_msgs')."` ADD reply_msg TINYINT( 1 ) UNSIGNED DEFAULT '0' NOT NULL AFTER read_msg");
    }
    if (!FieldExists('anim_msg',$xoopsDB->prefix('priv_msgs'))) {
      $result = $xoopsDB->queryF("ALTER TABLE `".$xoopsDB->prefix('priv_msgs')."` ADD anim_msg VARCHAR(100)");
    }
    if (!FieldExists('cat_msg',$xoopsDB->prefix('priv_msgs'))) {
      $result = $xoopsDB->queryF("ALTER TABLE `".$xoopsDB->prefix('priv_msgs')."` ADD cat_msg MEDIUMINT(8) DEFAULT '1' NOT NULL");
    }
    if (!FieldExists('file_msg',$xoopsDB->prefix('priv_msgs'))) {
      $result = $xoopsDB->queryF("ALTER TABLE `".$xoopsDB->prefix('priv_msgs')."` ADD file_msg MEDIUMINT( 8 ) UNSIGNED DEFAULT '0' NOT NULL");
    }
    if (!FieldExists('msg_pid',$xoopsDB->prefix('priv_msgs'))) {
      $result = $xoopsDB->queryF("ALTER TABLE `".$xoopsDB->prefix('priv_msgs')."` ADD msg_pid MEDIUMINT( 8 ) UNSIGNED DEFAULT '0' NOT NULL AFTER msg_id");
    }
	
	 if(TableExists($xoopsDB->prefix('user_profile'))){
    $result = $xoopsDB->queryF("UPDATE ".$xoopsDB->prefix('user_profile')." SET mpmanager_link=".$GLOBALS['xoopsDB']->quoteString(
    "<a href=\"javascript:openWithSelfMain('{X_URL}/pmlite.php?send2=1&to_userid={X_UID}', 'pmlite', 550, 450);\" title=\""._PM_MI_MESSAGE." {X_UNAME}\"><img src=\"{X_URL}/modules/mpmanager/images/pm.gif\" alt=\""._PM_MI_MESSAGE." {X_UNAME}\" /></a>"
    )." WHERE mpmanager_link=''");	
    }
  }
  return true;
}

function FieldExists($fieldname,$table)
{
	global $xoopsDB;
	$result=$xoopsDB->queryF("SHOW COLUMNS FROM	$table LIKE '$fieldname'");
	return($xoopsDB->getRowsNum($result) > 0);
}

function TableExists($tablename)
{
	global $xoopsDB;
	$result=$xoopsDB->queryF("SHOW TABLES LIKE '$tablename'");
	return($xoopsDB->getRowsNum($result) > 0);
}
?>
