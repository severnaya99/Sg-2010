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

include "header.php";
require_once ("include/functions.php");
include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
include_once XOOPS_ROOT_PATH.'/class/pagenav.php';

$onglet = !empty($_GET['onglet']) ? 1 : 0;

if (isset($HTTP_POST_VARS['user'])) {
	$user = $HTTP_POST_VARS['user'];
} else {
	$user = @$HTTP_GET_VARS['user'];
}

if ( isset($_GET['start2']) ) {
	@$start2 = intval($_GET['start2']);
} else {
	@$start2 = 0;
} 

if (!empty($user)) {

 if (strlen($user) < 3 ) {
   $onglet = 0;
   }       
} else { $onglet = 0; }

 global $xoopsDB, $xoopsModule, $xoopsUser;

    xoops_header();
	
if ($xoopsUser) {
 	
switch ($onglet) {	
	
	 case '0' : 
        $user_select_tray = new XoopsFormElementTray(_MP_CHOSE, "<br />");
        $user_select_tray->addElement(new XoopsFormLabel('', _MP_MINIM));
	break;
		
  default :
$limit2 = 200;	
$sq1 = "SELECT uid, name, uname FROM ".$xoopsDB->prefix("users")." WHERE uname LIKE '%$user%' OR name LIKE '%$user%'";
$result = $xoopsDB->query($sq1,$limit2, $start2);
$result2 = $xoopsDB->query($sq1);
if(!$row = $xoopsDB->getRowsNum($result2)) {
 $user_select_tray = new XoopsFormElementTray(_MP_CHOSE, "<br />");
 $user_select_tray->addElement(new XoopsFormLabel('', _MP_NOUSER));
 } else {
 
$indeximage_tray = new XoopsFormElementTray(_MP_TO2, '&nbsp;');
$indeximage_select = new XoopsFormSelect('', 'userid', false, 8, false);
$index_tray = new XoopsFormSelect('', 'user', false, 8, false);
while (list($uid, $name, $uname) = $xoopsDB->fetchRow($result)) {
$indeximage_select->addOption("$uid", "$uname");  
$indeximage_select -> setExtra("onclick=\"window.opener.document.getElementById('to_userid').value+=this.options[this.selectedIndex].text+',';window.opener.document.getElementById('chek_userid').value+=this.options[this.selectedIndex].text+',';\"");
$index_tray->addOption("$uid", "$name");  
$index_tray -> setExtra("onclick=\"window.opener.document.getElementById('to_userid').value+=this.options[this.selectedIndex].text+',';window.opener.document.getElementById('chek_userid').value+=this.options[this.selectedIndex].text+',';\"");

}
$indeximage_tray->addElement($indeximage_select);
$indeximage_tray->addElement($index_tray);

if ($row > 200) {
$nav = new XoopsPageNav($row, $limit2, $start2, "start2", "op=sendbox&send=1&user=$user&onglet=1");
$user_select_nav = new XoopsFormLabel('', $nav->renderNav(4));
}

		}	
break;
}
//form

$form2 = new XoopsThemeForm(_MP_USEARCH, "shearch",  $_SERVER['PHP_SELF']."?op=sendbox&send=1&onglet=1");  

     $index_select = new XoopsFormElementTray(_MP_SEARCH ,'');
     $index_select -> addElement(new XoopsFormText('', 'user', 25, 50, ''));
	 $index_select -> addElement(new XoopsFormButton('', 'submit', _MP_USEARCH, 'submit'));
     $form2->addElement($index_select);

$form2->addElement($user_select_tray);
$form2->addElement($user_select_nav);
$form2->addElement($indeximage_tray);
	
$post_button = new XoopsFormButton('', '', _CLOSE, "button");
$post_button -> setExtra("onclick='javascript: opener=self; window.close();'");
$form2->addElement($post_button);

$content = $form2->render();
 	

echo $content;
//$xoopsTpl->assign('mp_form', $content);

} else {
    echo _PM_SORRY."<br /><br /><a href='".XOOPS_URL."/register.php'>"._PM_REGISTERNOW."</a>.";
}
    xoops_footer();

?>