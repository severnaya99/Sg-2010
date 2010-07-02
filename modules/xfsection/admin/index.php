<?php
// $Id: index.php,v 1.5 2006/03/20 03:52:07 ohwada Exp $

// 2006-03-17 K.OHWADA
// dont use foreach($HTTP_POST_VARS as $k => $v)
// $HTTP_POST_VARS   -> $_POST
// $HTTP_GET_VARS    -> $_GET
// $HTTP_POST_FILES  -> $_FILES
// BUG 8188: double include wfsfiles.php

// 2005-06-20 K.OHWADA
// supress notice: Undefined index: ishtml

// 2004/03/27 K.OHWADA
// add copy mode
// fileup : error message
// Preview : save & recover published time
// bug fix : NOWSETTIME is wrong

// 2004/02/28 K.OHWADA
// unify a article menu and a title
// display number of articles by articlemenu

// WFSECTION
// Powerfull Section Module for XOOPS
// Admin Main

include 'admin_header.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/wfscategory.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/wfsarticle.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/uploadfile.php';

// BUG 8188: double include
include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/class/wfsfiles.php");

include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/include/groupaccess.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/include/htmlcleaner.php';

$op="";
if (isset($_GET['op'])) $op=$_GET['op'];
if (isset($_POST['op'])) $op=$_POST['op'];

// define $articleid
if ( isset($_POST['articleid'] )) 
{
	$articleid = intval( $_POST['articleid'] );
} 
elseif ( isset($_GET['articleid']) ) 
{
	$articleid = intval( $_GET['articleid'] );
}

// define $fileid
$fileid = 0;
if ( isset($_POST['fileid'] )) 
{
	$fileid = intval( $_POST['fileid'] );
} 
elseif ( isset($_GET['fileid']) ) 
{
	$fileid = intval( $_GET['fileid'] );
}

// define $fileid
$ok = 0;
if ( isset($_POST['ok'] )) 
{
	$ok = intval( $_POST['ok'] );
} 
elseif ( isset($_GET['ok']) ) 
{
	$ok = intval( $_GET['ok'] );
}

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

// bug fix : NOWSETTIME is wrong
// save published time
// this code is compromise not elegant
		$published = $article->published;
		$expired   = $article->expired;

		$article->loadPostVars();

// recover published time
		$article->setPublished($published);
		$article->setExpired($expired);

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

// add copy mode
	case "Copy":
			unset($_POST['articleid']);

	case "Save":

			global $xoopsUser, $wfsConfig;

			if (empty($_POST['title'])) {
            	xoops_cp_header();
            	echo"<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class='odd'>";
                echo _AM_NOTITLE."<br />";
                echo"</td></tr></table>";
                break;
	        }
        	if(!empty($_POST['articleid'])){
 		   		$article = new WfsArticle($_POST['articleid']);
           		if ($_POST['changeuser'] == '-1') {
            		$article->setUid($article->uid());
				} else {
					$article->setUid($_POST['changeuser']);
				}								
			}else{
				$article = new WfsArticle();
				if ($_POST['changeuser'] == '-1') {
            		$uid = $xoopsUser->getvar('uid');
					$article->setUid($uid);
				} else {
					$article->setUid($_POST['changeuser']);
				}				
				$article->settype("admin");
		        $article->setPublished(time());
			}

			$article->loadPostVars();

// supress notice: Undefined index: ishtml
//			if (empty($_POST['maintext']) || $_POST['ishtml']) {
			if (empty($_POST['maintext']) || (isset($_POST['ishtml']) && $_POST['ishtml'] ) )
			{
                xoops_cp_header();
                echo"<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class=\"even\">";
                //echo $_POST['ishtml'];
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

//		if ( $ok ) 
		if ( isset($_POST['ok']) && $_POST['ok'] ) 
		{
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

//		include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/class/uploadfile.php");
//		include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/class/wfsfiles.php");

// error message
				$code = check_post_files('uploadfile');
				if ($code == 0)
				{

		        $upload = new uploadfile();
                $upload->loadPostVars();
                $upload->setMode($wfsConfig['wfsmode']);

// error message
//				$distfilename = $upload->doUploadToRandumFile(XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath']);
				$filesbasepath = XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath'];
				$distfilename = $upload->doUploadToRandumFile($filesbasepath);
				$code = $upload->getErrorCode();

				if ( $distfilename ) {
                        $article = new WfsArticle($_POST['articleid']);
                        $file = new WfsFiles();
                        $file->setByUploadFile($upload);
						$file->setFiledescript($_POST['textfiledescript']);
                        $file->setFiletext($_POST['textfilesearch']);
						$file->setgroupid($_POST['groupid']);
						if (empty($_POST['fileshowname'])) {
                                $file->setFileShowName($upload->getOriginalName());
                        } else {
                                $file->setFileShowName($_POST['fileshowname']);
                        }
                        $article->addFile($file);
                        redirect_header("index.php?op=edit&amp;articleid=".$_POST['articleid'],1,_AM_DBUPDATED);
                        exit();

//              } else {
				}
				}

				xoops_cp_header();
				echo"<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class='odd'>";

// error message
//                      echo "<h4>"._AM_UPDATEFAIL."</h4>";
//                      if (!$upload->isAllowedMineType()) echo _AM_NOTALLOWEDMINETYPE."<br />";
//                      if (!$upload->isAllowedFileSize()) echo _AM_FILETOOBIG."<br />";
//                      echo"</td></tr></table>";

				echo "<h4><font color=red>"._AM_UPDATEFAIL."</font></h4>";
				echo "Filename: ".$_FILES['uploadfile']['name']."<br />";
				if (($code == 6)||($code == 7))
				{	echo _WFS_UPLOAD_NON;	}
				elseif ($code == 8)
				{	echo _WFS_UPLOAD_ZERO;	}
				elseif ($code == 12) 
				{	echo _AM_DIR_NOT_WRITABLE.": ".$filesbasepath;	}
				elseif ($code == 2)
				{	echo sprintf(_WFS_UPLOAD_TOO_BIG,$_POST['MAX_FILE_SIZE']);	}
				elseif ($code == 16)
				{	echo sprintf(_WFS_UPLOAD_TOO_BIG,$upload->getMaxFilesize());	}
				if ($code == 17)
				{	echo _AM_NOTALLOWEDMINETYPE;	}
				echo "<br />";
				echo "Error code = $code";
				echo"</td></tr></table>";
				echo "<br /><div align='left'><a href='index.php?op=edit&articleid=".$articleid."'>"._AM_EDIT_ARTICLE_RETURN."</a></div><br>";

//              }

                break;

        case "fileedit":

// BUG 8188: double include wfsfiles.php
//                include_once("../class/wfsfiles.php");

                $file = new WfsFiles($fileid);
                //xoops_cp_header();
                //echo"<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class='odd'>";
                //echo "<h4>"._AM_EDITFILE."</h4>";
                $file->editform();
                //echo"</td></tr></table>";
                break;

        case "delfile":

// BUG 8188: double include wfsfiles.php
//                include_once("../class/wfsfiles.php");

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

// BUG 8188: double include wfsfiles.php
//                include_once("../class/wfsfiles.php");

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

// unify a article menu and a title
//              echo "<div><h4>"._AM_ARTICLEMANAGEMENT."</h4></div>";
                echo "<div><h4>"._AM_ARTICLEMANAGEMENT.": "._AM_PEARTICLES."</h4></div>";

                adminmenu();

// display number of articles by articlemenu
//				echo "<table width='100%' border='0' cellpadding = '1' cellspacing='0' class='outer'>";
//				echo "<tr class = 'even'><td>";
//				echo "<div><a href='allarticles.php?action=all'>"._AM_ALLARTICLES."</a></div>";
//				echo "<div><a href='allarticles.php?action=published'>"._AM_PUBLARTICLES."</a></div>";
//				echo "<div><a href='allarticles.php?action=autoart'>"._AM_AUTOARTICLES."</a><div>";
//				echo "<div><a href='allarticles.php?action=expired'>"._AM_EXPIREDARTICLES."</a><div>";
//				echo "<div><a href='allarticles.php?action=autoexpire'>"._AM_AUTOEXPIREARTICLES."</a><div>";
//				echo "<div><a href='allarticles.php?action=submitted'>"._AM_SUBLARTICLES."</a><div>";
//				echo "<div><a href='allarticles.php?action=online'>"._AM_ONLINARTICLES."</a><div>";
//				echo "<div><a href='allarticles.php?action=offline'>"._AM_OFFLIARTICLES."</a><div>";
//				echo "</td></tr></table><br>";

				articlemenu();	// add

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