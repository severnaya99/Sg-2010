<?php
// $Id: submit.php,v 1.9 2003/04/01 22:51:21 mvandam Exp $
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
include '../../mainfile.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/class/wfsarticle.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/class/common.php';
include_once XOOPS_ROOT_PATH . '/modules/wfsection/include/groupaccess.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/wfsfiles.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/uploadfile.php';
//include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/cache/uploadconfig.php");

Global $wfsConfig;

foreach ($HTTP_POST_VARS as $k => $v) {
	${$k} = $v;
}

foreach ($HTTP_GET_VARS as $k => $v) {
	${$k} = $v;
}

if (empty($wfsConfig['anonpost']) && !is_object($xoopsUser)) {
        redirect_header("index.php", 1, _NOPERM);
        exit();
}
$op = 'form';

if ( isset($HTTP_POST_VARS['preview'] )) {
        $op = 'preview';
} elseif ( isset($HTTP_POST_VARS['post']) ) {
        $op = 'post';
} elseif ( isset($HTTP_POST_VARS['edit']) ) {
        $op = 'edit';
}
if (isset($HTTP_GET_VARS['op'])) $op=$HTTP_GET_VARS['op'];
if (isset($HTTP_POST_VARS['op'])) $op=$HTTP_POST_VARS['op'];

switch ($op) {

case "preview":
        $myts =& MyTextSanitizer::getInstance(); // MyTextSanitizer object
        $xt = new WfsCategory($xoopsDB->prefix("wfs_category"), $HTTP_POST_VARS['id']);
        include  XOOPS_ROOT_PATH.'/header.php';

        $p_subject = $myts->makeTboxData4Preview($subject);
        if ($xoopsUser && $xoopsUser->isAdmin($xoopsModule->getVar('mid'))) {
                $nohtml = isset($nohtml) ? intval($nohtml) : 0;
        } else {
                $nohtml = 1;
        }
        $html = empty($nohtml) ? 1 : 0;
        if ( isset($nosmiley) && intval($nosmiley) > 0 ) {
                $nosmiley = 1;
                $smiley = 0;
        } else {
                $nosmiley = 0;
                $smiley = 1;
        }
        $p_message = $myts->makeTareaData4Preview($message, $html, $smiley, 1);
        $subject = $myts->makeTboxData4PreviewInForm($subject);
        $message = $myts->makeTareaData4PreviewInForm($message);
        $noname = isset($noname) ? intval($noname) : 0;
        $notifypub = isset($notifypub) ? intval($notifypub) : 0;
        themecenterposts($p_subject, $p_message);
        include 'include/storyform.inc.php';
        include XOOPS_ROOT_PATH.'/footer.php';
        break;

case "post":
        $nohtml_db = 1;
        if ( $xoopsUser ) {
                $uid = $xoopsUser->getVar('uid');
                if ( $xoopsUser->isAdmin($xoopsModule->mid()) ) {
                        $nohtml_db = empty($nohtml) ? 0 : 1;
                }
        } else {
                if ( $wfsConfig['anonpost'] == 1 ) {
                        $uid = 0;
                } else {
                        redirect_header("index.php",3,_NW_ANONNOTALLOWED);
                        exit();
                }
        }
        $story = new WfsArticle();
        $story->setTitle($subject);
        $story->setMainText($message);
        $story->setSummary($summary);
        $story->setUid($uid);
        $story->setCategoryid($id);
        $story->setNohtml($nohtml_db);
        $nosmiley = isset($nosmiley) ? intval($nosmiley) : 0;
        $notifypub = isset($notifypub) ? intval($notifypub) : 0;
        $story->setHtmlpage("");
        $story->setIshtml(0);
		$story->setWeight(100);
        //$story->setGroupid($groupid);
		$story->setGroupid($groupid);
        $story->setNosmiley($nosmiley);
        $story->setPublished(0);
        $story->setExpired(0);
        $story->setNotifyPub($notifypub);
        echo $story->articleid;
				
		$story->setType('user');
		
		$upload = new uploadfile($HTTP_POST_VARS['filename']);
		$distfilename = $upload->doUploadToRandumFile(XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath']);
		
		if ( $distfilename ) {
        	$article = new WfsArticle($story->articleid);
            $file = new WfsFiles();
            $file->setByUploadFile($HTTP_POST_VARS['filename']);

           if (empty($HTTP_POST_VARS['downloadfilename'])) {
		   	   $file->setFileShowName($HTTP_POST_VARS['filename']);
           } else {
        	   $file->setFileShowName($HTTP_POST_VARS['$downloadfilename']);
           }
           $article->addFile($HTTP_POST_VARS['filename']);
		}				
	
		if ( $wfsConfig['autoapprove'] == 1 ) {
        	$approve = 1;
        	$story->setApproved($approve);
        	$story->setPublished(time());
       		$story->setExpired(0);
        }
        $result = $story->store();
        if ($result) {

                if ($wfsConfig['notifysubmit'] == 1 ) {
                        $xoopsMailer =& getMailer();
                        $xoopsMailer->useMail();
                        $xoopsMailer->setToEmails($xoopsConfig['adminmail']);
                        $xoopsMailer->setFromEmail($xoopsConfig['adminmail']);
                        $xoopsMailer->setFromName($xoopsConfig['sitename']);
                        $xoopsMailer->setSubject(_NW_NOTIFYSBJCT);
                        $body = _NW_NOTIFYMSG;
                        $body .= "\n\n"._NW_TITLE.": ".$story->title();
                        $body .= "\n"._POSTEDBY.": ".XoopsUser::getUnameFromId($uid);
                        $body .= "\n"._DATE.": ".formatTimestamp(time(), 'm', $xoopsConfig['default_TZ']);
                        $body .= "\n\n".XOOPS_URL.'/modules/wfsection/admin/index.php?op=edit&articleid='.$result;
                        $xoopsMailer->setBody($body);
                        $xoopsMailer->send();
                }
        } else {
                echo 'error';
        }
        redirect_header("index.php",2,_WFS_THANKS);
        break;

case "edit":
		
	include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/class/wfscategory.php");
	include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/class/wfsarticle.php");

		$story = new WfsArticle('articleid');
        $subject = $story->title();
        $message = $story->mainText();
        $summary = $story->summary("Edit");
        $url = $story->url();
        $urlname = $story->urlname();
		//$story->Uid();
        //$story->setCategoryid($id);
        //$story->setNohtml($nohtml_db);
        $nosmiley = isset($nosmiley) ? intval($nosmiley) : 0;
        $notifypub = isset($notifypub) ? intval($notifypub) : 0;
        $story->setHtmlpage("");
        $story->setIshtml(0);
        //$story->setGroupid($groupid);
        //$story->setNosmiley($nosmiley);
        //$story->setPublished(0);
        //$story->setExpired(0);
        //$story->setNotifyPub($notifypub);
        //$story->setType('user');
		
		$xt = new WfsCategory($xoopsDB->prefix("wfs_article "),	14);
		
		$noname = 0;
        $nohtml = 0;
        $nosmiley = 0;
        $notifypub = 0;
		
		include XOOPS_ROOT_PATH.'/header.php';
        indexmainheader();
		include 'include/storyform.inc.php';
        include XOOPS_ROOT_PATH.'/footer.php';

break;

case 'form':
default:
include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/class/wfscategory.php");
include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/class/wfsarticle.php");

        $xt = new WfsCategory($xoopsDB->prefix("wfs_category"));
        $num = WfsArticle::countByCategory($xt->id);
        include XOOPS_ROOT_PATH.'/header.php';
        $subject = '';
        $message = '';
        $groupid = '';
        $summary = '';
        $url = '';
        $urlname = '';
        $filename = '';
        $downloadfilename ='';
        $noname = 0;
        $nohtml = 0;
        $nosmiley = 0;
        $notifypub = 1;
        indexmainheader();
		include 'include/storyform.inc.php';
        		
		include XOOPS_ROOT_PATH.'/footer.php';
        break;
}
?>
