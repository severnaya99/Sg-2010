<?php
// $Id: article.php,v 1.1 2002/07/01 16:45:39 haruki Exp $

include 'header.php';
include_once XOOPS_ROOT_PATH . '/class/xoopscomments.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/class/wfsarticle.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/class/wfscategory.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/include/groupaccess.php';

global $wfsConfig;

foreach ($HTTP_POST_VARS as $k => $v) {
	${$k} = $v;
}

foreach ($HTTP_GET_VARS as $k => $v) {
	${$k} = $v;
}
$article_id = isset($HTTP_GET_VARS['articleid']) ? intval($HTTP_GET_VARS['articleid']) : 0;
$item_id = isset($HTTP_GET_VARS['item_id']) ? intval($HTTP_GET_VARS['item_id']) : 0;
$item_id = (!empty($articleid)) ? $articleid : $item_id;

if (empty($item_id)) {
	redirect_header("index.php",2,_WFS_NOSTORY);
	exit();
}
$myts =& MyTextSanitizer::getInstance();
$article = new WfsArticle($item_id);
if ($article->ishtml == '2') {
$xoopsOption['template_main'] = 'wfsection_htmlart.html';
} else {
$xoopsOption['template_main'] = 'wfsection_article.html';
}
include_once(XOOPS_ROOT_PATH."/header.php");

//$article = new WfsArticle($item_id);
if (checkAccess($article->groupid)) {
	if (isset($HTTP_GET_VARS['page'])) {
		$page=intval($HTTP_GET_VARS['page']);
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
	$articletag['urllink'] = '&nbsp';
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
	  				if (empty($file->getFiledescript)) {
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
	  	 	 			$articletag['downloadlink'] .= "<td colspan='3' class='foot' align='center'>&nbsp;<a href='brokenfile.php?lid=$file->fileid'>Report broken download</span></div></td>";
	  					$articletag['downloadlink'] .= "</tr>";
					}
					$articletag['downloadlink'] .= "<tr><td></td></tr>";
				}
			}
		}
		$articletag['downloadlink'] .= "</table>";
	}
	$articletag['adminlink'] = "&nbsp;";
	$articletag['pagelink'] = "&nbsp";

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
	if ($xoopsUser && $xoopsUser->isAdmin($xoopsModule->mid()) ) {
		$articletag['adminlink'] = " [ <a href='".XOOPS_URL."/modules/".$xoopsModule->dirname().
                		"/admin/index.php?op=edit&amp;articleid=".$article->articleid."'>"._EDIT.
                		"</a> | <a href='".XOOPS_URL."/modules/".$xoopsModule->dirname().
                		"/admin/index.php?op=delete&amp;articleid=".$article->articleid."'>"._DELETE."</a> ] ";
	}

	$articletag['maillink'] = "<a href='print.php?articleid=".$article->articleid."'><img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/print.gif' alt='"._WFS_PRINTERFRIENDLY."' /></a> ";
	//$articletag['maillink'] .= "<a href='save.php?articleid=".$article->articleid."'><img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/download.gif' alt='"._WFS_DOWNLOAD."' /></a> ";
	$articletag['maillink'] .= "<a target='_top' href='mailto:?subject=".rawurlencode(sprintf(_WFS_INTFILEAT, $xoopsConfig['sitename']))."&body=".rawurlencode(sprintf(_WFS_INTFILEFOUND,$xoopsConfig['sitename']).":  ".XOOPS_URL."/modules/".$xoopsModule->dirname()."/index.php?articleid=".$article->articleid)."'><img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/friend.gif' alt='"._WFS_TELLAFRIEND."' /></a>";
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
$xoopsTpl->assign('xoops_pagetitle', htmlentities($xoopsModule->name() . ' - ' . $article->title()));

if ($wfsConfig['comments']) {
	include XOOPS_ROOT_PATH.'/include/comment_view.php';
}

include(XOOPS_ROOT_PATH."/footer.php");

?>