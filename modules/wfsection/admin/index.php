<?php
// WFSECTION
// Powerfull Section Module for XOOPS
//
// $Id: index.php,v 1.7 Date: 06/01/2003, Author: Catzwolf Exp $
//
// Admin Main

include 'admin_header.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/wfscategory.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/wfsarticle.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/uploadfile.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/include/groupaccess.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/include/htmlcleaner.php';
$op="";

foreach ($HTTP_POST_VARS as $k => $v) {
	${$k} = $v;
}

foreach ($HTTP_GET_VARS as $k => $v) {
	${$k} = $v;
}

if (isset($HTTP_GET_VARS['op'])) $op=$HTTP_GET_VARS['op'];
if (isset($HTTP_POST_VARS['op'])) $op=$HTTP_POST_VARS['op'];

switch($op){

// article

	case "edit":
		xoops_cp_header();
		echo "<div><h4>"._AM_ARTICLEMANAGEMENT."</h4></div>";
		adminmenu();
		
		echo"<table width='100%' border='0' cellspacing='1' class='outer'>";
		echo "<tr><td class = 'bg3'><b>"._AM_EDITARTICLE."</b></td><tr>";
        echo "<tr><td class='even'>";
		if (!empty($articleid)) {
			$isedit = 1;
			$article = new WfsArticle($articleid);
       		$article->editform();
        	echo"</td></tr></table>";
        	echo "<br />";
        }
		break;

	case "Preview":
		xoops_cp_header();

		if(!empty($articleid)){
			$article = new WfsArticle($articleid);
		}else{
			$article = new WfsArticle();
		}

		$article->loadPostVars();
		
		echo "<h4>"._AM_ARTICLEPREVIEW."</h4>";
        $article->preview("P");
		
		echo "<br />";
		echo"<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class='even'>";
		$article->editform();
		echo"</td></tr></table>";

		break;

	case "Clean":
		xoops_cp_header();
		
		global $xoopsModule, $maintext;
				
		if(!empty($articleid)){
			$article = new WfsArticle($articleid);
		}else{
			$article = new WfsArticle();
		}
			
		$article->loadPostVars();
		$article->maintext = htmlcleaner::cleanup($article->maintext);
		echo $article->maintext;
		echo"<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class='even'>";
		$article->editform();
		echo"</td></tr></table>";

		break;	
		
	case "Save":

			global $xoopsUser, $wfsConfig;

			if (empty($HTTP_POST_VARS['title'])) {
            	xoops_cp_header();
            	echo"<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class='odd'>";
                echo _AM_NOTITLE."<br />";
                echo"</td></tr></table>";
                break;
	        }
        	if(!empty($HTTP_POST_VARS['articleid'])){
 		   		$article = new WfsArticle($HTTP_POST_VARS['articleid']);
           		if ($HTTP_POST_VARS['changeuser'] == '-1') {
            		$article->setUid($article->uid());
				} else {
					$article->setUid($HTTP_POST_VARS['changeuser']);
				}								
			}else{
				$article = new WfsArticle();
				if ($HTTP_POST_VARS['changeuser'] == '-1') {
            		$uid = $xoopsUser->getvar('uid');
					$article->setUid($uid);
				} else {
					$article->setUid($HTTP_POST_VARS['changeuser']);
				}				
				$article->settype("admin");
		        $article->setPublished(time());
			}
			
			$article->loadPostVars();
			
			if (empty($HTTP_POST_VARS['maintext']) || $HTTP_POST_VARS['ishtml']) {
                xoops_cp_header();
                echo"<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class=\"even\">";
                //echo $HTTP_POST_VARS['ishtml'];
				echo _AM_NOMAINTEXT."<br />";
                echo"</td></tr></table>";
                break;
	        }
			
			if (($article->approved) && $article->type() != "admin"){
				$article->setPublished(time());
				$isnew = '1';
			}

			$article->store();

            if ( !empty($isnew) && $article->notifypub() && $article->uid() != 0 ) {
               	$poster = new XoopsUser($article->uid());
				$subject = _AM_ARTPUBLISHED;
				$message = sprintf(_AM_HELLO,$poster->uname());
				$message .= "\n\n"._AM_YOURARTPUB."\n\n";
				$message .= _AM_TITLEC.$article->title()."\n"._AM_URLC.XOOPS_URL."/modules/".$xoopsModule->dirname()."/article.php?articleryid=".$article->storyid()."\n"._AM_PUBLISHEDC.formatTimestamp($article->published(),"$timestanp",0)."\n\n";
				$message .= $xoopsConfig['sitename']."\n".XOOPS_URL."";
				$xoopsMailer =& getMailer();
				$xoopsMailer->useMail();
				$xoopsMailer->setToEmails($poster->getVar("email"));
				$xoopsMailer->setFromEmail($xoopsConfig['adminmail']);
				$xoopsMailer->setFromName($xoopsConfig['sitename']);
				$xoopsMailer->setSubject($subject);
				$xoopsMailer->setBody($message);
				$xoopsMailer->send();
			}

		redirect_header('allarticles.php',1,_AM_DBUPDATED);
		exit();
		break;

	case "delete":
		if ( $ok ) {
			$article = new WfsArticle($articleid);
			$article->delete();
			redirect_header(XOOPS_URL."/modules/".$xoopsModule->dirname()."/admin/index.php",1,_AM_DBUPDATED);
			exit();
		} else {
			xoops_cp_header();
			echo "";
			xoops_confirm(array('op' => 'delete', 'articleid' => $articleid, 'ok' => 1), 'index.php', _AM_RUSUREDEL);					
		}
		break;

// attached file

        case "fileup":

		global $wfsConfig;

		include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/class/uploadfile.php");
		include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/class/wfsfiles.php");

		        $upload = new uploadfile();
                $upload->loadPostVars();
                $upload->setMode($wfsConfig['wfsmode']);
				$distfilename = $upload->doUploadToRandumFile(XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath']);
                
				if ( $distfilename ) {
                        $article = new WfsArticle($HTTP_POST_VARS['articleid']);
                        $file = new WfsFiles();
                        $file->setByUploadFile($upload);
						$file->setFiledescript($HTTP_POST_VARS['textfiledescript']);
                        $file->setFiletext($HTTP_POST_VARS['textfilesearch']);
						$file->setgroupid($HTTP_POST_VARS['groupid']);
						if (empty($HTTP_POST_VARS['fileshowname'])) {
                                $file->setFileShowName($upload->getOriginalName());
                        } else {
                                $file->setFileShowName($HTTP_POST_VARS['fileshowname']);
                        }
                        $article->addFile($file);
                        redirect_header("index.php?op=edit&amp;articleid=".$HTTP_POST_VARS['articleid'],1,_AM_DBUPDATED);
                        exit();
                } else {
                        xoops_cp_header();
                        echo"<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class='odd'>";
                        echo "<h4>"._AM_UPDATEFAIL."</h4>";
                        if (!$upload->isAllowedMineType()) echo _AM_NOTALLOWEDMINETYPE."<br />";
                 		if (!$upload->isAllowedFileSize()) echo _AM_FILETOOBIG."<br />";
						echo"</td></tr></table>";
                }
                break;

        case "fileedit":
                include_once("../class/wfsfiles.php");
                $file = new WfsFiles($fileid);
                //xoops_cp_header();
                //echo"<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class='odd'>";
                //echo "<h4>"._AM_EDITFILE."</h4>";
                $file->editform();
                //echo"</td></tr></table>";
                break;

        case "delfile":
                include_once("../class/wfsfiles.php");
                if ( $ok ) {
                        $file = new WfsFiles($fileid);
                        $articleid = $file->getArticleid();
                        $file->delete();
                        redirect_header("index.php?op=edit&articleid=".$articleid,1,_AM_DBUPDATED);
                        exit();
                } else {
                        xoops_cp_header();
                        global $xoopsConfig, $wfsConfig;
						
						echo"<table width='100%' border='0' cellspacing='1'><tr><td>";
                        echo "<div class='confirmMsg'>";
                        echo "<h4>"._AM_FILEDEL."</h4>";
                        $file = new WfsFiles($fileid);
						$filename = XOOPS_URL."/".$wfsConfig['filesbasepath'];
						echo $filename."/".$file->getFileRealName()." (".$file->getDownloadname().")\n";
						echo "<table><tr><td><br />";
						echo myTextForm("index.php?op=delfile&amp;fileid=".$fileid."&amp;ok=1" , _AM_YES);
                        echo "</td><td><br />";
                        echo myTextForm("javascript:history.go(-1)" , _AM_NO);
                        echo "</td></tr></table>";
                        echo "</div>";
                        echo"</td></tr></table>";
                }
                break;

        case "filesave":
                include_once("../class/wfsfiles.php");
                if(!empty($fileid)){
                        $file = new WfsFiles($fileid);
                }else{
                        $file = new WfsFiles();
                }
                $file->loadPostVars();
                $file->store();
                redirect_header("wfsfilesshow.php",1,_AM_DBUPDATED);
                exit();
                break;

// default

        case "newarticle":
        case "default":

		global $wfsConfig;

        default:
                xoops_cp_header();
                echo "<div><h4>"._AM_ARTICLEMANAGEMENT."</h4></div>";
				adminmenu();
				
				echo "<table width='100%' border='0' cellpadding = '1' cellspacing='0' class='outer'>";
				echo "<tr class = 'even'><td>";
				echo "<div><a href='allarticles.php?action=all'>"._AM_ALLARTICLES."</a></div>";
				echo "<div><a href='allarticles.php?action=published'>"._AM_PUBLARTICLES."</a></div>";
				echo "<div><a href='allarticles.php?action=autoart'>"._AM_AUTOARTICLES."</a><div>";
				echo "<div><a href='allarticles.php?action=expired'>"._AM_EXPIREDARTICLES."</a><div>";
				echo "<div><a href='allarticles.php?action=autoexpire'>"._AM_AUTOEXPIREARTICLES."</a><div>";
				echo "<div><a href='allarticles.php?action=submitted'>"._AM_SUBLARTICLES."</a><div>";
				echo "<div><a href='allarticles.php?action=online'>"._AM_ONLINARTICLES."</a><div>";
				echo "<div><a href='allarticles.php?action=offline'>"._AM_OFFLIARTICLES."</a><div>";
				echo "</td></tr></table><br>";
		
				if (WfsCategory::countByArticle()>0) {
					    echo "<table width='100%' border='0' cellspacing='1' cellpadding = '2' class='outer'><tr>";
						echo "<td class='even'>";
                        echo "<div class= 'bg3'><h4>"._AM_POSTNEWARTICLE."</h4></div>";
                		$article = new WfsArticle();
                        $article->editform();
						echo"</td></tr></table>";
	                } else {
                    	echo "<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class='odd'>";
                        echo "<h4>"._AM_NOCATEGORY."</h4>";
						echo "<div><b><a href='category.php?op=default'>"._AM_CATEGORYTAKEMETO."</a></b></div>";
                        echo"</td></tr></table>";
					}
				wfsfooter();	
                break;
}

xoops_cp_footer();
?>
