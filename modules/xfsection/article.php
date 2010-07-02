<?php
// $Id: article.php,v 1.5 2006/03/20 03:23:03 ohwada Exp $

// 2006-03-17 K.OHWADA
// dont use foreach($HTTP_POST_VARS as $k => $v)
// $HTTP_POST_VARS -> $_POST
// $HTTP_GET_VARS  -> $_GET

// 2005-11-05 K.OHWADA
// BUG 7443: typo &nbsp

// 2005-01-29 Okuhiki & K.OHWADA
// BUG 174: offline article is displayed

// 2004-11-17  K.OHWADA
// BUG 50: redundant "Page" is displayed when use [pagebreak]

// 2004/04/22 K.OHWADA
// bug fix
//   tel a frined : index.php -> article.php

// 2004/03/27 K.OHWADA
// convert EUC-JP to SJIS at tel a frined
// rewrite to use class lib.
// bug fix : file descript can not show
// multi language

// 2004/02/26 K.OHWADA
// dummy for non multibyte environment
// restoration of "convert EUC-JP to SJIS at tel a frined"

// 2004/01/29 K.OHWADA
// comment "convert EUC-JP to SJIS at tel a frined"

// 2004/01/25 K.OHWADA
// permit the auther to modify article
// convert EUC-JP to SJIS at tel a frined

// 2003/11/21 K.OHWADA
// multi language 
// bug fix
//   file descript can not show

// 2003/09/23 K.OHWADA
// easy to rename module and table
//   add conf.php
//   change main
// search by title
//   change main
//   add function searchArticleByTitle, listArticle
// bug fix
//   A title character carries out transformation

include 'header.php';
include_once XOOPS_ROOT_PATH . '/class/xoopscomments.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/class/wfsarticle.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/class/wfscategory.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/include/groupaccess.php';

// dummy for non multibyte environment
if (!extension_loaded('mbstring') && !function_exists('mb_convert_encoding'))
{	include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/include/mb_dummy.php';	
}

global $wfsConfig;

// add $title
//$count = 1;
//if ( isset($title) ) 
//{	$match_array = searchArticleByTitle($title);
//	$count       = count($match_array);
//	list ($articleid,$title,$category) = $match_array[0];
//}
//$article_id = isset($HTTP_GET_VARS['articleid']) ? intval($HTTP_GET_VARS['articleid']) : 0;
//$item_id = isset($HTTP_GET_VARS['item_id']) ? intval($HTTP_GET_VARS['item_id']) : 0;
//$item_id = (!empty($articleid)) ? $articleid : $item_id;

$count     = 1;
$articleid = 0;
$title     = '';
$category  = '';

// define $articleid
if ( isset($_POST['articleid'] )) 
{
	$articleid = intval( $_POST['articleid'] );
} 
elseif ( isset($_GET['articleid']) ) 
{
	$articleid = intval( $_GET['articleid'] );
}
elseif ( isset($_GET['title']) ) 
{
	$title = $_GET['title'];
	$match_array = searchArticleByTitle($title);
	$count       = count($match_array);
	list ($articleid,$title,$category) = $match_array[0];
}

$item_id = isset($_GET['item_id']) ? intval($_GET['item_id']) : 0;
$item_id = (!empty($articleid)) ? $articleid : $item_id;

if (empty($item_id)) {
	redirect_header("index.php",2,_WFS_NOSTORY);
	exit();
}

// add if block
IF ($count == 1)
{

$myts =& MyTextSanitizer::getInstance();
$article = new WfsArticle($item_id);

// BUG 174: offline article is displayed
// check the showing property
if ( !$article->checkPublish() ) 
{
	redirect_header("index.php",2,_WFS_NOSTORY);
	exit();
}

// easy to rename module and table
if ($article->ishtml == '2') {
//$xoopsOption['template_main'] = 'wfsection_htmlart.html';
$xoopsOption['template_main'] = $wfsHtmlHtmlart;
} else {
//$xoopsOption['template_main'] = 'wfsection_article.html';
$xoopsOption['template_main'] = $wfsHtmlArticle;
}

include_once(XOOPS_ROOT_PATH."/header.php");

//$article = new WfsArticle($item_id);
if (checkAccess($article->groupid)) {
	if (isset($_GET['page'])) {
		$page=intval($_GET['page']);
	} else {
		$page=0;
		if ( !($xoopsUser && $xoopsUser->isAdmin($xoopsModule->mid())) ){
			$article->updateCounter();
        }
    }
	$articletag = array();
    
	if ($article->uid > 0) {
	$user = new xoopsUser($article->uid);
		if (($wfsConfig['realname']) && $user->getvar('name') != '') {
			$articletag['poster'] = $user->getvar('name');
		} else {
			$articletag['poster']  = $user->getvar('uname');
		} 
		$articletag['poster']  = "<a href='".XOOPS_URL."/userinfo.php?uid=".$user->getVar('uid')."'>".$articletag['poster'] ."</a>";
	} else {
		$articletag['poster']  = $xoopsConfig['anonymous'];
	}

// $datetime
	if ( isset($article->published)) $articletag['datetime'] = formatTimestamp($article->published, $wfsConfig['timestamp']);

// $title
	$articletag['title'] = $article->category->textLink().": ";
	$articletag['title'] .= $article->title();

//Counter
	$counter = $article->counter;
	$pagenum = $article->maintextPages()-1;
	if ($page > $pagenum) $page = $pagenum;
	if ( $page == -2 ) $page=0;
	$articletag['maintext'] = $article->maintextWithFile("S",$page);

	if($article->ishtml != '0' && $article->htmlpage()) {
		$maintextfile = XOOPS_ROOT_PATH.'/'.$wfsConfig['htmlpath'].'/'.$article->htmlpage;
		if (file_exists($maintextfile) && false !== $fp = fopen($maintextfile, 'r')) {
			$articletag['maintext'] = fread($fp, filesize($maintextfile));
			fclose($fp);
		}
	}

// Setup URL link for article

// BUG 50: redundant "Page" is displayed when use [pagebreak]
// wrong space entity
//	$articletag['urllink'] = '&nbsp';
	$articletag['urllink'] = '&nbsp;';

	if (($article->url) && (!$article->urlname)) {
		$articletag['urllink'] = "<a href='http://".$article->url()."' target='_blank'>Url Link: ".$article->url()."</a><br />";
	} elseif ($article->urlname) {
		$articletag['urllink'] = "<a href='http://".$article->url()."' target='_blank'>Url Link: ".$article->urlname()."</a><br />";
	}

//Downloads links
	$workdir = XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath'];
	$articletag['downloadlink'] = "<table width='100%' cellspacing = 0 cellpadding = '2'>";
	
	if ($article->getFilesCount() >0 ) {
		foreach($article->files as $file) {
        	if(checkAccess($file->groupid)) {	
				$filename = $file->getFileRealName();
				$mimetype = new mimetype();
				$mimeshow = $mimetype->getType(XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath']."/".$filename);
				$icon = get_icon($workdir."/".$filename);
				
				if (is_file(XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath']."/".$filename)) {
					$size = Prettysize(filesize(XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath']."/".$filename));
				} else {
					$size = '0';
				}
							
			if (empty($size)) $size = '0';
			$accessnot = '';	
			if (checkAccess($file->groupid) == '1' ) $accessnot = '1';	
				if (checkAccess($file->groupid))  {
					$articletag['downloadlink'] .= "<tr>";
	    			$articletag['downloadlink'] .= "<td colspan='3' class='head' align='left' valign ='middle'><img src=".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/download.gif align ='absmiddle'> ".$file->getLinkedName(XOOPS_URL."/modules/".$xoopsModule->dirname()."/download.php?fileid=")."</td>";
	    			$articletag['downloadlink'] .= "</tr>";
	  				$articletag['downloadlink'] .= "<tr >";
	    			$articletag['downloadlink'] .= "<td  class='odd' align='left' colspan='3'>";

// bug fix : file descript can not show
//	  				if (empty($file->getFiledescript)) {
	  				if (empty($file->filedescript)) {

					$articletag['downloadlink'] .= "<div align= 'top'><img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/decs.gif' border='0' alt='downloads' align='absmiddle'/>&nbsp;<b>"._WFS_DESCRIPTION.":</b><br>"._WFS_NODESCRIPT."</div><br /></td>";
  					}else{
					$articletag['downloadlink'] .= "<div align= 'top'><img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/decs.gif' border='0' alt='downloads' align='absmiddle'/>&nbsp;<b>"._WFS_DESCRIPTION.":</b><br>".$file->getFiledescript('S')."</div><br /></td>";

					}
					$articletag['downloadlink'] .= "</tr>";
	  				$articletag['downloadlink'] .= "<tr>";
	   		 		$articletag['downloadlink'] .= "<td colspan='2' class='even' align='left'><img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/counter.gif' border='0' alt='downloads' align='absmiddle'/>&nbsp;".$file->getCounter()."&nbsp;&nbsp;<img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/size.gif' border='0' align='absmiddle' alt='"._WFS_FILESIZE."' />&nbsp;".$size."&nbsp;&nbsp;<img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/editicon.gif' border='0' align='absmiddle' alt='"._WFS_FILEMIMETYPE."' />$mimeshow</td><td class='even' align='right' valign ='middle'><b>"._WFS_UPLOADED."</b>".formatTimestamp($file->date, $wfsConfig['timestamp'])."</td>";
	  				$articletag['downloadlink'] .= "</tr>";
	  				if (!is_file(XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath']."/".$filename)) {
						$articletag['downloadlink'] .= "<tr>";

// multi language
//	  	 	 			$articletag['downloadlink'] .= "<td colspan='3' class='foot' align='center'>&nbsp;<a href='brokenfile.php?lid=$file->fileid'>Report broken download</span></div></td>";
	  	 	 			$articletag['downloadlink'] .= "<td colspan='3' class='foot' align='center'>&nbsp;<a href='brokenfile.php?lid=$file->fileid'>"._WFS_REPORT_BREOKEN_DOWNLOAD."<span></div></td>";

	  					$articletag['downloadlink'] .= "</tr>";
					}
					$articletag['downloadlink'] .= "<tr><td></td></tr>";
				}
			}
		}
		$articletag['downloadlink'] .= "</table>";
	}
	$articletag['adminlink'] = "&nbsp;";

// BUG 7443: typo &nbsp
	$articletag['pagelink'] = "&nbsp;";

			//Show page numbers if page > 0
		
	if ($page != -1 && $pagenum) {
		$articletag['pagelink'] .= "Page: ";
		for($i=0; $i <=$pagenum; $i++) {
			if ($page == $i) { 
				$articletag['pagelink'] .= "<a href='article.php?articleid=".$item_id."&amp;page=".$i."'><span style='color:#ee0000;font-weight:bold;'>".($i+1)."</span></a>&nbsp;";
			} else {
				$articletag['pagelink'] .= "<a href='article.php?articleid=".$item_id."&amp;page=".$i."'>".($i+1)."</a>&nbsp;";
			}
		}
		$articletag['title'] .= " (".($page+1)."/".($pagenum+1).")";
	}

//	if ($xoopsUser && $xoopsUser->isAdmin($xoopsModule->mid()) ) {
//		$articletag['adminlink'] = " [ <a href='".XOOPS_URL."/modules/".$xoopsModule->dirname().
//                		"/admin/index.php?op=edit&amp;articleid=".$article->articleid."'>"._EDIT.
//                		"</a> | <a href='".XOOPS_URL."/modules/".$xoopsModule->dirname().
//                		"/admin/index.php?op=delete&amp;articleid=".$article->articleid."'>"._DELETE."</a> ] ";
//	}

// permit the auther to modify article
	$module_url = XOOPS_URL."/modules/".$xoopsModule->dirname();
	$uid = 0;
	if ( $xoopsUser ) {	$uid = $xoopsUser->getVar('uid');	}

	if ($xoopsUser && $xoopsUser->isAdmin($xoopsModule->mid()) ) 
	{
		$articletag['adminlink'] = " [ <a href='$module_url/admin/index.php?op=edit&amp;articleid={$article->articleid}'>"._EDIT."</a> | <a href='$module_url/admin/index.php?op=delete&amp;articleid={$article->articleid}'>"._DELETE."</a> ] ";
	}
	elseif ($wfsAutherEdit && ($uid != 0) && ($uid == $article->uid() ) ) 
	{
		$articletag['adminlink'] = " [ <a href='$module_url/modify.php?articleid={$article->articleid}'>"._EDIT."</a> ] ";
	}

	$articletag['maillink'] = "<a href='print.php?articleid=".$article->articleid."'><img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/print.gif' alt='"._WFS_PRINTERFRIENDLY."' /></a> ";
	//$articletag['maillink'] .= "<a href='save.php?articleid=".$article->articleid."'><img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/download.gif' alt='"._WFS_DOWNLOAD."' /></a> ";

//	$articletag['maillink'] .= "<a target='_top' href='mailto:?subject=".rawurlencode(sprintf(_WFS_INTFILEAT, $xoopsConfig['sitename']))."&body=".rawurlencode(sprintf(_WFS_INTFILEFOUND,$xoopsConfig['sitename']).":  ".XOOPS_URL."/modules/".$xoopsModule->dirname()."/index.php?articleid=".$article->articleid)."'><img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/friend.gif' alt='"._WFS_TELLAFRIEND."' /></a>";

// tel a frined
	$subject = sprintf(_WFS_INTFILEAT, $xoopsConfig['sitename']);

// bug fix : tel a frined : index.php -> article.php
//	$body = sprintf(_WFS_INTFILEFOUND, $xoopsConfig['sitename'] ).":\n".XOOPS_URL."/modules/".$xoopsModule->dirname()."/index.php?articleid=".$article->articleid;
	$body = sprintf(_WFS_INTFILEFOUND, $xoopsConfig['sitename'] ).":\n".XOOPS_URL."/modules/".$xoopsModule->dirname()."/article.php?articleid=".$article->articleid;

// for japanese environment
// convert EUC-JP to SJIS
	include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/base_language.php';
	$lang    = new ConvertLanguage;
	$subject = $lang->convert_telafriend_subject($subject);
	$body    = $lang->convert_telafriend_body($body);

	$subject = rawurlencode($subject);
	$body = rawurlencode($body);
	$articletag['maillink'] .= "<a href=\"mailto:?body=$body&amp;subject=$subject\"><img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/friend.gif' alt='"._WFS_TELLAFRIEND."' /></a>";

	$articletag['ratelink'] = "<a href='ratefile.php?lid=".$article->articleid."'>"._WFS_RATETHISFILE."</a>";
	$articletag['catlink'] = "<a href='./index.php?category=".$article->categoryid()."'>"._WFS_BACK2CAT."</a><b> | </b><a href='./index.php'>"._WFS_RETURN2INDEX."</a>";
	$articletag['rating'] = "<b>".sprintf(_WFS_RATINGA, number_format($article->rating, 2))."</b>";
	$articletag['votes'] = "<b>(".sprintf(_WFS_NUMVOTES, $article->votes).")</b>";
	$articletag['counter'] = sprintf(_WFS_VIEWS, $counter);
	$articletag['size'] = sprintf(_WFS_ARTSIZE, prettysize(strlen($articletag['maintext'])));
	// assign the article variables to template
	$xoopsTpl->assign('article', $articletag);
	
	if ($article->getFilesCount() > 0 && $accessnot >= 1) {
		$xoopsTpl->assign('showfiles', true);
	}
	
	if ($wfsConfig['novote'] == 1) {
		$xoopsTpl->assign('novote', true);
	}else{
		$xoopsTpl->assign('novote', false);
	}
	// assign lang phrases
	$xoopsTpl->assign(array('lang_author' => _WFS_AUTHER, 'lang_published' => _WFS_PUBLISHEDHOME, 'lang_downloadsfor' => _WFS_DOWNLOADS));
}

// bug fix : A title character carries out transformation
//http://jp.xoops.org/modules/newbb/viewtopic.php?topic_id=2066&forum=11&viewmode=flat&order=ASC&start=10
//$xoopsTpl->assign('xoops_pagetitle', htmlentities($xoopsModule->name() . ' - ' . $article->title()));
$xoopsTpl->assign('xoops_pagetitle', $xoopsModule->getVar('name').'-'.$article->title().'');

if ($wfsConfig['comments']) {
	include XOOPS_ROOT_PATH.'/include/comment_view.php';
}

// add else block
}
ELSE
{
	include '../../header.php';
	listArticle($match_array);
}

include(XOOPS_ROOT_PATH."/footer.php");
exit;


// add this function
function searchArticleByTitle($title, $limit=20) 
{
	$match_array   = array();

	$start  = 0; 
	$catid  = '';	// all category
	$sarray = WfsArticle::searchByTitle($title,$limit,$start,$catid);

	if (!$sarray) { return; }	// no match

	foreach ($sarray as $article) 
	{	$id       = $article->articleid;
		$title    = $article->title;
		$category = $article->category->title();
		array_push( $match_array,array($id,$title,$category) );
	}

	return $match_array;
} 

// add this function
// multi language
function listArticle($match_array)
{	
	global $xoopsDB, $xoopsConfig, $xoopsModule, $myts, $wfsConfig;
	
	echo "<table border='0' cellspacing='1' cellpadding ='3' align = center width = 100%>";
	echo "<tr><td align = center><h3>".sprintf($wfsConfig['indexheading'])."</h3></td></tr>";
	echo "</table><br>\n";

	echo "<font color=red>"._WFS_ARTCLE_MORE."</font><br><br>\n";


	echo"<table border='0' cellspacing='1' cellpadding ='3' class='outer' width = 100%>";
	echo "<tr><td align='left' width ='15%' class='itemHead'><b>" . _WFS_CATEGORY . "</b></td>";
	echo "<td align='center' class='itemHead' width ='20%'><b>" . _WFS_ARTICLES . "</b></td>";
	echo "</tr>\n";

	foreach ($match_array as $match)
	{	list ($id,$title,$category) = $match;
	
		echo "<tr>";
		echo "<td class = 'even'>$category</td>";
		echo "<td class = 'even'><a href='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/article.php?articleid=" . $id . "'>$title</a></td>";
		echo "</tr>";
	}
	 
	echo "</table>\n";
}

?>
