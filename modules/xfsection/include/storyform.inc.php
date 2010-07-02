<?php
// $Id: storyform.inc.php,v 1.4 2006/03/20 03:23:03 ohwada Exp $

// 2005-03-17 K.OHWADA
// global $xoopsUser, $xoopsModule, $wfsConfig;

// 2004/03/27 K.OHWADA
// file upload

// 2004/01/25 K.OHWADA
// permit the auther to modify article

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

include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";

// permit the auther to modify article
//$sform = new XoopsThemeForm(_WFS_POSTNEWARTICLE, "storyform", xoops_getenv('PHP_SELF'));
$sform = new XoopsThemeForm($submitform_title, "storyform", xoops_getenv('PHP_SELF'));

$sform->addElement(new XoopsFormText(_WFS_TITLE, 'subject', 50, 80, $subject), true);
ob_start();

// permit the auther to modify article
$sform->addElement(new XoopsFormHidden('articleid',$articleid));

$xt->makeSelBox(0);
$sform->addElement(new XoopsFormLabel(_WFS_CATEGORY, ob_get_contents()));
ob_end_clean();
$sform->addElement($topic_select);
$sform->addElement(new XoopsFormSelectGroup(_WFS_GROUPPROMPT, 'groupid', true, true, 5, true), false);
$sform->addElement(new XoopsFormDhtmlTextArea(_WFS_MAINTEXT, 'message', $message, 15, 60), true);
$sform->addElement(new XoopsFormTextArea(_WFS_SUMMARY, 'summary', $summary), false);
$sform->addElement(new XoopsFormText(_WFS_LINKURL, 'url', 50, 80, $url), false);
$sform->addElement(new XoopsFormText(_WFS_LINKURLNAME, 'urlname', 50, 80, $urlname), false);

// file upload
//$sform->addElement(new XoopsFormFile(_WFS_DOWNLOAD, 'filename', 500, $filename), false);
//$sform->addElement(new XoopsFormText(_WFS_DOWNLOADNAME, 'downloadfilename', 50, 80, $downloadfilename), false);
if ($file_submitform_flag)
{
	$sform->setExtra("enctype='multipart/form-data'");
	$sform->addElement(new XoopsFormFile(_WFS_DOWNLOAD, 'filename', $wfsUploadSize, $filename), false);
	$sform->addElement(new XoopsFormText(_WFS_FILESHOWNAME, 'fileshowname', 50, 80, $fileshowname), false);
	$sform->addElement(new XoopsFormTextArea(_WFS_FILEDESCRIPT, 'filedescript', $filedescript), false);
}

$option_tray = new XoopsFormElementTray(_OPTIONS,'<br />');

global $xoopsUser, $xoopsModule, $wfsConfig;
if ($xoopsUser) {
	if ($wfsConfig['anonpost'] == 1) {
		$noname_checkbox = new XoopsFormCheckBox('', 'noname', $noname);
		$noname_checkbox->addOption(1, _POSTANON);
		$option_tray->addElement($noname_checkbox);
	}
	$notify_checkbox = new XoopsFormCheckBox('', 'notifypub', $notifypub);
	$notify_checkbox->addOption(1, _WFS_NOTIFYPUBLISH);
	$option_tray->addElement($notify_checkbox);

	if ($xoopsUser->isAdmin($xoopsModule->getVar('mid'))) {
		$nohtml_checkbox = new XoopsFormCheckBox('', 'nohtml', $nohtml);
		$nohtml_checkbox->addOption(1, _DISABLEHTML);
		$option_tray->addElement($nohtml_checkbox);
	}
}
$smiley_checkbox = new XoopsFormCheckBox('', 'nosmiley', $nosmiley);
$smiley_checkbox->addOption(1, _DISABLESMILEY);
$option_tray->addElement($smiley_checkbox);
$sform->addElement($option_tray);
$button_tray = new XoopsFormElementTray('','');
$button_tray->addElement(new XoopsFormButton('', 'preview', _PREVIEW, 'submit'));
$button_tray->addElement(new XoopsFormButton('', 'post', _WFS_POST, 'submit'));
$sform->addElement($button_tray);
$sform->display();

?>