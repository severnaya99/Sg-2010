<?php
// $Id: modify.php,v 1.4 2006/03/20 03:23:03 ohwada Exp $

// 2006-03-17 K.OHWADA
// dont use foreach($HTTP_POST_VARS as $k => $v)
// $HTTP_POST_VARS -> $_POST
// $HTTP_GET_VARS  -> $_GET

// 2005-11-05 K.OHWADA
// BUG 7443: typo &nbsp

// 2004/03/20 K.OHWADA
// file upload
// file edit
// file delete

//================================================================
// modify article
// 2004/01/14 K.OHWADA
//================================================================

include '../../mainfile.php';

//$dir_module = XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname();
//include_once "$dir_module/conf.php";
//include_once "$dir_module/include/groupaccess.php";
//include_once "$dir_module/class/common.php";
//include_once "$dir_module/class/wfscategory.php";
//include_once "$dir_module/class/wfsarticle.php";
//include_once "$dir_module/class/wfsfiles.php";
//include_once "$dir_module/class/uploadfile.php";

$dirname = $xoopsModule->dirname();
include_once XOOPS_ROOT_PATH.'/modules/'.$dirname.'/conf.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$dirname.'/include/groupaccess.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$dirname.'/class/common.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$dirname.'/class/wfscategory.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$dirname.'/class/wfsarticle.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$dirname.'/class/wfsfiles.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$dirname.'/class/uploadfile.php';

global $wfsConfig;

//foreach ($HTTP_POST_VARS as $k => $v) 
//{	${$k} = $v;	}
//foreach ($HTTP_GET_VARS as $k => $v)
//{	${$k} = $v;	}

$op = 'form';
if ( isset($_POST['preview'] )) 
{	$op = 'preview';	} 
elseif ( isset($_POST['post']) ) 
{	$op = 'post';	}
elseif ( isset($_POST['edit']) ) 
{	$op = 'edit';	}

if (isset($_GET['op']))  $op=$_GET['op'];
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
else
{
	redirect_header("index.php",2,_WFS_NOSTORY);
	exit();
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

$uid = 0;
if ( $xoopsUser ) {	$uid = $xoopsUser->getVar('uid');	}

$article = new WfsArticle($articleid);

// permition check
if (!$wfsAutherEdit || ($uid == 0) || ($uid != $article->uid()) ) 
{
	redirect_header("index.php", 1, _NOPERM);
	exit();
}

$myts =& MyTextSanitizer::getInstance(); // MyTextSanitizer object

$submitform_title = _WFS_MODIFY_TITLE;

// file upload
$file_submitform_flag = 0;

switch ($op) 
{
// --- preview ---
case "preview":
	include  XOOPS_ROOT_PATH.'/header.php';

	$xt = new WfsCategory($id);

	$p_subject = $myts->makeTboxData4Preview($subject);

	if ($xoopsUser && $xoopsUser->isAdmin($xoopsModule->getVar('mid'))) 
	{	$nohtml = isset($nohtml) ? intval($nohtml) : 0;	} 
	else 
	{	$nohtml = 1;	}
	$html = empty($nohtml) ? 1 : 0;

	if ( isset($nosmiley) && intval($nosmiley) > 0 ) 
	{	$nosmiley = 1;
		$smiley = 0;
	}
	else 
	{	$nosmiley = 0;
		$smiley = 1;
	}

// Setup URL link for article

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

// --- post ---
case "post":

	$nosmiley  = isset($nosmiley) ? intval($nosmiley) : 0;

	$article->setTitle($subject);
	$article->setMainText($message);
	$article->setSummary($summary);
	$article->setCategoryid($id);
	$article->setGroupid($groupid);
	$article->setNosmiley($nosmiley);
	$article->setUrl($url);
	$article->setUrlname($urlname);

// no change
//	$article->setNotifyPub($notifypub);
//	$article->setUid($uid);
//	$article->setNohtml($nohtml_db);
//	$article->setHtmlpage("");
//	$article->setIshtml(0);
//	$article->setWeight(100);
//	$article->setPublished(0);
//	$article->setExpired(0);
//	$article->setType('user');
//	$article->setApproved($approve);

	$result = $article->store();

//	if (!$result) 
//	{	echo "error $articleid";	}
//	redirect_header("index.php",2,_WFS_MODIFYEND);

	if (!$result) 
	{	redirect_header("index.php",10,_WFS_MODIFY_FAIL);	
		exit;
	}

	redirect_header("article.php?articleid=".$articleid,5,_WFS_MODIFY_END);
	exit;

	break;

// --- file upload ---
case "fileupload":
	check_permit_upload();

	$code = file_upload($articleid);

	if ($code != 0) 
	{
		include XOOPS_ROOT_PATH.'/header.php';
		indexmainheader();
		print_file_upload_error($code);
		modify_form($article,$articleid);
		include XOOPS_ROOT_PATH.'/footer.php';
		exit();	
	}

	redirect_header("modify.php?articleid=".$articleid,2,_WFS_UPLOAD_END);	
	exit();	

	break;

// --- file edit form ---
case "fileedit":
	check_permit_upload();

	include XOOPS_ROOT_PATH.'/header.php';
	include_once "$dir_module/class/wfsfiles.php";
	file_editform($articleid,$fileid);
	include XOOPS_ROOT_PATH.'/footer.php';
	break;

// --- file save ---
case "filesave":
	check_permit_upload();

	include_once "$dir_module/class/wfsfiles.php";
	$file = new WfsFiles($fileid);
	$file->setDownloadname($_POST['downloadname']);
	$file->setFileShowName($_POST['fileshowname']);
	$file->setFiledescript($_POST['filedescript']);
	$file->store();
	redirect_header("modify.php?articleid=".$articleid,2,_WFS_FILE_MODIFY_END);
	exit();

	break;

// --- file delete comform ---
case "filedelcomf":
	check_permit_upload();

	include_once XOOPS_ROOT_PATH.'/include/cp_functions.php';
	include_once "$dir_module/class/wfsfiles.php";

	include XOOPS_ROOT_PATH.'/header.php';
	file_delcomf($articleid,$fileid);
	include XOOPS_ROOT_PATH.'/footer.php';
	break;

// --- file delete ---
case "filedel":
	check_permit_upload();

	include_once "$dir_module/class/wfsfiles.php";
	$file = new WfsFiles($fileid);
	$file->delete();
	redirect_header("modify.php?articleid=".$articleid,2,_WFS_FILE_DELETE_END);
	exit();
	break;

// --- form ---
case 'form':
default:
	include XOOPS_ROOT_PATH.'/header.php';
	indexmainheader();
	modify_form($article,$articleid);
	include XOOPS_ROOT_PATH.'/footer.php';
	break;
}
// main end

function modify_form($article,$articleid)
{
	global $wfsPermitUpload;

	$submitform_title = _WFS_MODIFY_TITLE;
	$file_submitform_flag = 0;

	$subject  = $article->title("E");
	$message  = $article->maintext("E");
	$summary  = $article->summary("E");
	$groupid  = $article->groupid();
	$nosmiley = $article->nosmiley();
	$catid    = $article->categoryid();
	$url      = $article->url();
	$urlname  = $article->urlname();

	$xt = new WfsCategory($catid);

// dummy
	$noname = 0;	// anonpost
	$nohtml = 0;	// admin
	$notifypub = 0;	// autoapprove
	$filename  = '';	// not use
	$downloadfilename ='';	// not use

// form
	echo "<br><div align='left'><a href='article.php?articleid=".$articleid."'>"._WFS_ARTICLE_BACK." id=$articleid</a></div><br>";
	include 'include/storyform.inc.php';

// file edit
	if ($wfsPermitUpload) 
	{
		echo "<div align='left'>";
		file_uploadform($articleid,$article->groupid());
		file_listform($article,$articleid);
		echo "</div>";
	}

	echo "<br><div align='left'><a href='article.php?articleid=".$articleid."'>"._WFS_ARTICLE_BACK." id=$articleid</a></div><br><br>";
}

function file_listform($article,$articleid)
{
	global $xoopsModule, $wfsConfig;

	echo "<div class = 'bg3'><h4>"._WFS_ATTACHEDFILES."</h4></div>";

	if (empty($article->articleid)) 
	{	echo _WFS_AFTERREGED."<br />";	}

	elseif ($article->getFilesCount()) 
	{
		echo "<table border='1' style='border-collapse: collapse' bordercolor='#ffffff' width='100%' >";
		echo "<tr class='blockTitle'><td align='center'>"._WFS_FILEID."</td><td align='center'>"._WFS_FILE_DOWNLOADNAME."</td><td align='center'>"._WFS_FILESHOWNAME."</td><td align='center' class='nw'>"._WFS_FILE_CHECK."</td><td align='center'>"._WFS_ACTION."</td></tr>";

		foreach($article->files as $attached) 
		{
			$filename = XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath']."/".$attached->getFileRealName();

			if (!file_exists($filename)) 
			{	$filecheck = "<font color=red>"._WFS_FILE_NOEXIST."</font>";	}
			elseif (!is_file($filename)) 
			{	$filecheck = "<font color=red>"._WFS_FILE_NOFILE."</font>";	}
			else
			{	$filecheck = 'OK';	}

			$fileid       = $attached->getFileid();
			$downloadname = $attached->downloadname;
			$fileshowname = $attached->getFileShowName();

			$editlink = "<a href='modify.php?op=fileedit&amp;fileid=".$fileid."&amp;articleid=".$articleid."'>"._WFS_EDIT."</a>";
			$dellink = "<a href='modify.php?op=filedelcomf&amp;fileid=".$fileid."&amp;articleid=".$articleid."'>"._WFS_DELETE."</a>";

			echo "<tr class='blockContent'>";
			echo "<td align='center'><b>".$fileid."</b>";
        	echo "</td><td align='center'>".$downloadname."";
        	echo "</td><td align='center'>".$fileshowname."";
        	echo "</td><td align='center'>".$filecheck."";
        	echo "</td><td align='center'>".$editlink." ".$dellink."";
       		echo "</td></tr>";
		}

		echo "</table>";

	}
	else
	{	echo "<div align='left'>"._WFS_NOFILE."</div>";	 }

	echo "</div><br />";
}

function file_uploadform($articleid, $groupid)
{
	global $xoopsModule;
	global $wfsUploadSize;

	include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname()."/class/wfsfiles.php";
	include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";

	$filename     = '';
	$fileshowname = '';
	$filedescript = '';

	if ( isset($_POST['filename']) )        $filename     = $_POST['filename'];
	if ( isset($_POST['fileshowname']) )    $fileshowname = $_POST['fileshowname'];
	if ( isset($_POST['filedescript']) )    $filedescript = $_POST['filedescript'];

	$sform = new XoopsThemeForm(_WFS_FILEUPLOAD, "storyform", xoops_getenv('PHP_SELF'));
	$sform->addElement(new XoopsFormHidden('articleid',$articleid));
	$sform->addElement(new XoopsFormHidden('groupid',$groupid));
	$sform->addElement(new XoopsFormHidden('op', 'fileupload'));
	$sform->setExtra("enctype='multipart/form-data'");
	$sform->addElement(new XoopsFormFile(_WFS_DOWNLOAD, 'filename', $wfsUploadSize, $filename), false);
	$sform->addElement(new XoopsFormText(_WFS_FILESHOWNAME, 'fileshowname', 50, 80, $fileshowname), false);
	$sform->addElement(new XoopsFormTextArea(_WFS_FILEDESCRIPT, 'filedescript', $filedescript), false);
	$button_tray = new XoopsFormElementTray('','');
	$button_tray->addElement(new XoopsFormButton('', 'post', _WFS_POST, 'submit'));
	$sform->addElement($button_tray);
	$sform->display();
}

function file_editform($articleid,$fileid)
{
	global $xoopsModule;

	include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname()."/class/wfsfiles.php";
	include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";

	$file = new WfsFiles($fileid);
	$sform = new XoopsThemeForm(_WFS_POSTNEWARTICLE, "storyform", xoops_getenv('PHP_SELF'));
	$sform->addElement(new XoopsFormHidden('articleid',$articleid));
	$sform->addElement(new XoopsFormHidden('fileid', $fileid));
	$sform->addElement(new XoopsFormHidden('op', 'filesave'));
	$sform->addElement(new XoopsFormText(_WFS_DOWNLOADNAME, 'downloadname', 40, 40, $file->getDownloadname("F")));
	$sform->addElement(new XoopsFormText(_WFS_FILESHOWNAME, 'fileshowname', 40, 80, $file->getFileShowName("F")));
	$sform->addElement(new XoopsFormTextArea(_WFS_FILEDESCRIPT, 'filedescript', $file->getFiledescript("F"), 10, 60));
	$button_tray = new XoopsFormElementTray('','');
	$button_tray->addElement(new XoopsFormButton('', 'post', _WFS_POST, 'submit'));
	$sform->addElement($button_tray);
	$sform->display();
}

function file_delcomf($articleid,$fileid)
{
		global $xoopsModule, $xoopsConfig, $wfsConfig;

		echo"<table width='100%' border='0' cellspacing='1'><tr><td>";
		echo "<div class='confirmMsg'>";
		echo "<h4>"._WFS_FILE_DELETE_COMFROM."</h4>";
		$file = new WfsFiles($fileid);
		$filename = XOOPS_URL."/".$wfsConfig['filesbasepath'];
		echo $file->getDownloadname();
		echo "<table><tr><td><br />";
		echo myTextForm("modify.php?op=filedel&amp;fileid=".$fileid."&amp;articleid=".$articleid, _WFS_YES);
		echo "</td><td><br />";
		echo myTextForm("javascript:history.go(-1)" , _WFS_NO);
		echo "</td></tr></table>";
		echo "</div>";
		echo"</td></tr></table>";
}

function check_permit_upload()
{
	global $wfsPermitUpload;

	if ($wfsPermitUpload) return;
	redirect_header("index.php", 5, _NOPERM);
	exit();
}

?>