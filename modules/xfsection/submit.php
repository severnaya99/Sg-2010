<?php
// $Id: submit.php,v 1.4 2006/03/20 03:23:03 ohwada Exp $

// 2006-03-17 K.OHWADA
// dont use foreach($HTTP_POST_VARS as $k => $v)
// $HTTP_POST_VARS -> $_POST
// $HTTP_GET_VARS  -> $_GET

// 2005-11-05 K.OHWADA
// BUG 7443: typo &nbsp

// 2004/03/20 K.OHWADA
// permit the auther to modify article
// file upload
// jump new article

// 2004/02/26 K.OHWADA
// add the mode which inhibit to submit article

// 2004/01/25 K.OHWADA
// bug fix:
//   don't take over a category id to the preview 
//   don't set url and urlname
//   In preview, display URL link for article

// 2003/10/11 K.OHWADA
// easy to rename module and table
//   add conf.php
// bug fix
//   _WFS_THANKS isn't defined

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

include_once 'conf.php';	// add

include_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/class/wfsarticle.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/class/common.php';

// easy to rename module and table
//include_once XOOPS_ROOT_PATH . '/modules/wfsection/include/groupaccess.php';
include_once XOOPS_ROOT_PATH . '/modules/'.$xoopsModule->dirname().'/include/groupaccess.php';

include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/wfsfiles.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/uploadfile.php';
//include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/cache/uploadconfig.php");

global $wfsConfig;

// add the mode which inhibit to submit article
if ($wfsSubmitInihibit)
{	redirect_header("index.php", 1, _NOPERM);
	exit();
}

if (empty($wfsConfig['anonpost']) && !is_object($xoopsUser)) {
        redirect_header("index.php", 1, _NOPERM);
        exit();
}

$op = 'form';

if ( isset($_POST['preview'] )) {
        $op = 'preview';
} elseif ( isset($_POST['post']) ) {
        $op = 'post';
} elseif ( isset($_POST['edit']) ) {
        $op = 'edit';
}
if (isset($_GET['op'])) $op=$_GET['op'];
if (isset($_POST['op'])) $op=$_POST['op'];

$articleid = 0;

if ( isset($_POST['articleid']) )  $articleid = intval( $_POST['articleid'] );
if ( isset($_POST['id']) )         $id        = intval( $_POST['id'] );
if ( isset($_POST['notifypub']) )  $notifypub = intval( $_POST['notifypub'] );
if ( isset($_POST['nobr']) )       $nobr      = intval( $_POST['nobr'] );
if ( isset($_POST['nosmiley']) )   $nosmiley  = intval( $_POST['nosmiley'] );
if ( isset($_POST['enaamp']) )     $enaamp    = intval( $_POST['enaamp'] );
if ( isset($_POST['subject']) )    $subject = $_POST['subject'];
if ( isset($_POST['message']) )    $message = $_POST['message'];
if ( isset($_POST['summary']) )    $summary = $_POST['summary'];
if ( isset($_POST['groupid']) )    $groupid = $_POST['groupid'];
if ( isset($_POST['url']) )        $url     = $_POST['url'];
if ( isset($_POST['urlname']) )    $urlname = $_POST['urlname'];

$filename     = '';
$fileshowname = '';
$filedescript = '';

if ( isset($_POST['filename']) )      $filename     = $_POST['filename'];
if ( isset($_POST['fileshowname']) )  $fileshowname = $_POST['fileshowname'];
if ( isset($_POST['filedescript']) )  $filedescript = $_POST['filedescript'];

// permit the auther to modify article
$submitform_title = _WFS_POSTNEWARTICLE;

// file upload
$file_submitform_flag = 0;
if ($wfsPermitUpload) $file_submitform_flag = 1;

switch ($op) {

case "preview":
        $myts =& MyTextSanitizer::getInstance(); // MyTextSanitizer object

// bug fix : don't take over a category id to the preview 
//	$xt = new WfsCategory($xoopsDB->prefix("wfs_category"), $_POST['id']);
//	$xt = new WfsCategory($_POST['id']);
	$xt = new WfsCategory($id);

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

// bug fix?: In preview, display URL link for article

// BUG 7443: typo &nbsp
		$urllink = '&nbsp;';

		if (($url) && (!$urlname)) 
		{	$urllink = "<a href='http://".$url."' target='_blank'>Url Link: ".$url."</a><br />";	}
		elseif ($urlname) 
		{	$urllink = "<a href='http://".$url."' target='_blank'>Url Link: ".$urlname."</a><br />";	}

        $p_message = $myts->makeTareaData4Preview($message, $html, $smiley, 1);
		$p_message = "$urllink$p_message";

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
        
        $nobr   = isset($nobr) ? intval($nobr) : 0;	// add
        $enaamp = isset($enaamp) ? intval($enaamp) : 0;	// add
        
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

// bug fix : don't set url and urlname
		$story->setUrl($url);
		$story->setUrlname($urlname);

// file upload
//		$upload = new uploadfile($HTTP_POST_VARS['filename']);
//		$distfilename = $upload->doUploadToRandumFile(XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath']);
//
//		if ( $distfilename ) {
//
//			$article = new WfsArticle($story->articleid);
//          $file = new WfsFiles();
//			$file->setByUploadFile($HTTP_POST_VARS['filename']);
//          if (empty($HTTP_POST_VARS['downloadfilename'])) {
//				$file->setFileShowName($HTTP_POST_VARS['filename']);
//           } else {
//        	   $file->setFileShowName($HTTP_POST_VARS['$downloadfilename']);
//           }
//			$article->addFile($HTTP_POST_VARS['filename']);
//		}

		if ( $wfsConfig['autoapprove'] == 1 ) {
        	$approve = 1;
        	$story->setApproved($approve);
        	$story->setPublished(time());
       		$story->setExpired(0);
        }
        $result = $story->store();

// error mesaage
		if (!$result) 
		{	redirect_header("index.php",10,_WFS_SUBMIT_FAIL);	
			exit();
		}

// file upload
		$newid = $story->getNewid();
		$code = file_upload($newid);

		if (($code != 0)&&($code != 6)&&($code != 7))
		{
			include XOOPS_ROOT_PATH.'/header.php';
			print_file_upload_error($code);
			echo "<br><br>";
			echo _WFS_BUT_SUBMIT_SUCCESS;
			echo "<br><br>";
			if ($newid != 0 ) echo "<a href='article.php?articleid=$newid'>"._WFS_SUBMITED_ARTICLE."</a><br>"; 
			echo "<a href='index.php'>"._WFS_MAININDEX."</a><br>";
			include XOOPS_ROOT_PATH.'/footer.php';
			exit();
		}

//      if ($result) {

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
                        
// easy to rename module and table
//			$body .= "\n\n".XOOPS_URL.'/modules/wfsection/admin/index.php?op=edit&articleid='.$result;
			$body .= "\n\n".XOOPS_URL."/modules/$wfsModule/admin/index.php?op=edit&articleid=".$result;

                        $xoopsMailer->setBody($body);
                        $xoopsMailer->send();

                }

//        } else {
//                echo 'error';
//        }

// bug fix
// _WFS_THANKS isn't defined
// http://jp.xoops.org/modules/newbb/viewtopic.php?topic_id=1596&forum=11&viewmode=flat&order=ASC&start=10
//	redirect_header("index.php",2,_WFS_THANKS);

// jump new article
	if ( ( $wfsConfig['autoapprove'] == 1 ) && ($newid != 0) )
	{	redirect_header("article.php?articleid=$newid",2,_WFS_THANKSFORPOST);	}
	else
	{	redirect_header("index.php",2,_WFS_THANKSFORPOST);	}

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

// bug fix : don't take over a category id to the preview 
//	$xt = new WfsCategory($xoopsDB->prefix("wfs_article "),	14);
	$xt = new WfsCategory(14);

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
//include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/class/wfscategory.php");
//include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/class/wfsarticle.php");
// bug fix : don't take over a category id to the preview 
//	$xt = new WfsCategory($xoopsDB->prefix("wfs_category"));
	$xt = new WfsCategory();

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