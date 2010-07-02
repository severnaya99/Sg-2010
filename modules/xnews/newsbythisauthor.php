<?php
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                  Copyright (c) 2005-2006 Instant Zero                     //
//                     <http://xoops.instant-zero.com/>                      //
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
/*
 * Display all the news by the author of a certain story
 *
 * This page is called from the page "article.php" and it will
 * show all the articles writen by an author. We use the module's
 * option named "restrictindex" to show or hide stories according
 * to users permissions and this page can only be called if the
 * module's option "newsbythisauthor" is set to "Yes"
 *
 * @package News
 * @author Xoops Modules Dev Team
 * @copyright	(c) The Xoops Project - www.xoops.org
 *
 * Parameters received by this page :
 * @page_param 	int		uid 					Id of the user you want to treat
 *
 * @page_title			"News by the same author" - Author's name - Module's name
 *
 * @template_name		nw_news_by_this_author.html
 *
 * Template's variables :
 * @template_var 	string 	lang_page_title			contains "News by the same author"
 * @template_var 	int 	author_id				contains the user ID
 * @template_var 	string	author_name				Name of the author (according to the user preferences (username or full name or nothing))
 * @template_var 	string	author_name_with_link	Name of the author with an hyperlink pointing to userinfo.php (to see his "identity")
 * @template_var	int		articles_count			Total number of visibles articles (for the current user and according to the permissions)
 * @template_var	string	lang_date				Fixed string, "Date"
 * @template_var	string	lang_hits				Fixed string, 'Views'
 * @template_var	string	lang_title				Fixed string, 'Title'
 * @template_var	int		articles_count			Total number of articles by this author (permissions are used)
 * @template_var	boolean	nw_rating				News are rated ?
 * @template_var	string	lang_rating				Fixed text "Rating"
 * @template_var	array	topics					Contains all the topics where the author have written some articles.
 *													Structure :
 *													topic_id	int		Topic's ID
 *													topic_title	string	Topic's title
 *													topic_color string	Topic's color
 *													topic_link	string	Link to see all the articles in this topic + topic's title
 *													news		array	List of all the articles from this author for this topic
 *														Structure :
 *															int		id				Article's Id
 *															string	hometext		The scoop
 *															string	title			Article's title
 *															int		hits			Counter of visits
 *															string	created			Date of creation formated (according to user's prefs)
 *															string	article_link	Link to see the article + article's title
 *															string	published		Date of publication formated (according to user's prefs)
 *															int		rating			Rating for this news
 */
include_once 'header.php';
include_once NW_MODULE_PATH . '/class/class.newsstory.php';
include_once NW_MODULE_PATH . '/class/class.newstopic.php';
include_once NW_MODULE_PATH . '/class/class.sfiles.php';
include_once NW_MODULE_PATH . '/include/functions.php';
global $xoopsUser;

if (file_exists(NW_MODULE_PATH . '/language/'.$xoopsConfig['language'].'/modinfo.php')) {
	include_once NW_MODULE_PATH . '/language/'.$xoopsConfig['language'].'/modinfo.php';
} else {
	include_once NW_MODULE_PATH . '/language/english/modinfo.php';
}

$uid= (isset($_GET['uid'])) ? intval($_GET['uid']) : 0;
if (empty($uid)) {
    redirect_header('index.php',2,_ERRORS);
    exit();
}

if(!nw_getmoduleoption('newsbythisauthor', NW_MODULE_DIR_NAME)) {
    redirect_header('index.php',2,_ERRORS);
    exit();
}

$myts =& MyTextSanitizer::getInstance();
$articles = new nw_NewsStory();
$xoopsOption['template_main'] = 'nw_news_by_this_author.html';
include_once XOOPS_ROOT_PATH.'/header.php';

$dateformat=nw_getmoduleoption('dateformat', NW_MODULE_DIR_NAME);
$infotips=nw_getmoduleoption('infotips', NW_MODULE_DIR_NAME);
$thisuser = new XoopsUser($uid);

switch($xoopsModuleConfig['displayname']) {
	case 1:		// Username
		$authname=$thisuser->getVar('uname');
		break;

	case 2:		// Display full name (if it is not empty)
		if(xoops_trim($thisuser->getVar('name')) == '') {
			$authname=$thisuser->getVar('uname');
		} else {
			$authname=$thisuser->getVar('name');
		}
		break;

	case 3:		// Nothing
		$authname='';
		break;
}
$xoopsTpl->assign('lang_page_title',_MI_NW_NEWSBYTHISAUTHOR.' - ' . $authname);
$xoopsTpl->assign('lang_nw_by_this_author',_MI_NW_NEWSBYTHISAUTHOR);
$xoopsTpl->assign('author_id',$uid);
$xoopsTpl->assign('user_avatarurl', XOOPS_URL.'/uploads/'.$thisuser->getVar('user_avatar'));
$xoopsTpl->assign('author_name',$authname);
$xoopsTpl->assign('lang_date',_MA_NW_DATE);
$xoopsTpl->assign('lang_hits',_MA_NW_VIEWS);
$xoopsTpl->assign('lang_title',_MA_NW_TITLE);
$xoopsTpl->assign('nw_rating',nw_getmoduleoption('ratenews', NW_MODULE_DIR_NAME));
$xoopsTpl->assign('lang_rating',_MA_NW_RATING);
$xoopsTpl->assign('author_name_with_link',sprintf("<a href='%s'>%s</a>",XOOPS_URL.'/userinfo.php?uid='.$uid,$authname));

$oldtopic=-1;
$oldtopictitle='';
$oldtopiccolor='';
$articlelist=array();
$articlestpl=array();
$articlelist=$articles->getAllPublishedByAuthor($uid,$xoopsModuleConfig['restrictindex'],false);
$articlescount=count($articlelist);
$xoopsTpl->assign('articles_count',$articlescount);
$count_articles = $count_reads = 0;

// DNPROSSI SEO
$seo_enabled = nw_getmoduleoption('nw_seo_enable', NW_MODULE_DIR_NAME);

if($articlescount>0) {
	foreach ($articlelist as $article) {
		if($oldtopic!=$article['topicid']) {
			if(count($articlestpl)>0) {
				// DNPROSSI SEO
				if ( $seo_enabled == 1 ) {
					$cat_path = str_replace('"','', nw_remove_accents($oldtopictitle));
					$topic_link=sprintf("<a href='%s'>%s</a>", NW_MODULE_URL . '/articles.cat.' . $oldtopic . '/' . $cat_path , $oldtopictitle);
				} else {
					$topic_link=sprintf("<a href='%s'>%s</a>", NW_MODULE_URL . '/index.php?storytopic=' . $oldtopic, $oldtopictitle);
				}	
				$xoopsTpl->append('topics',array('topic_id'=>$oldtopic, 'topic_count_articles' => sprintf(_AM_NW_TOTAL, $count_articles), 'topic_count_reads' => $count_reads, 'topic_color'=>$oldtopiccolor, 'topic_title'=>$oldtopictitle, 'topic_link'=> $topic_link, 'news'=>$articlestpl));
			}
			$oldtopic=$article['topicid'];
			$oldtopictitle=$article['topic_title'];
			$oldtopiccolor='#'.$myts->displayTarea($article['topic_color']);
			$articlestpl = array();
			$count_articles = $count_reads = 0;
		}
		$htmltitle='';
		if($infotips>0) {
			$htmltitle = ' title="'.nw_make_infotips($article['hometext']).'"';
		}
		$count_articles++;
		$count_reads += $article['counter'];
		// DNPROSSI SEO
		if ( $seo_enabled == 1 ) {
			$item_path = str_replace('"', '', nw_remove_accents($article['title']));
			$articlestpl[] = array(
				'id'=>$article['storyid'],
				'hometext'=>$article['hometext'],
				'title'=>$article['title'],
				'hits'=>$article['counter'],
				'created'=>formatTimestamp($article['created'],$dateformat),
				'article_link'=>sprintf("<a href='%s'%s>%s</a>",NW_MODULE_URL . '/articles.item.' . $article['storyid'] . '/' . $item_path . '', $htmltitle,$article['title']),
				'published'=>formatTimestamp($article['published'],$dateformat),
				'rating' => $article['rating']);
		} else {
			$articlestpl[] = array(
				'id'=>$article['storyid'],
				'hometext'=>$article['hometext'],
				'title'=>$article['title'],
				'hits'=>$article['counter'],
				'created'=>formatTimestamp($article['created'],$dateformat),
				'article_link'=>sprintf("<a href='%s'%s>%s</a>",NW_MODULE_URL . '/article.php?storyid=' . $article['storyid'], $htmltitle,$article['title']),
				'published'=>formatTimestamp($article['published'],$dateformat),
				'rating' => $article['rating']);
		}
	}
}

// DNPROSSI SEO
if ( $seo_enabled == 1 ) {
	$cat_path = str_replace('"', '', nw_remove_accents($article['topic_title']));
	$topic_link=sprintf("<a href='%s'>%s</a>", NW_MODULE_URL . '/articles.cat.' . $oldtopic . '/' . $cat_path, $oldtopictitle);
} else {   
    $topic_link=sprintf("<a href='%s'>%s</a>", NW_MODULE_URL . '/index.php?storytopic=' . $oldtopic, $oldtopictitle);
}

$xoopsTpl->append('topics',array('topic_id'=>$oldtopic, 'topic_title'=>$oldtopictitle, 'topic_link'=> $topic_link, 'news'=>$articlestpl));
$xoopsTpl->assign('xoops_pagetitle', _MI_NW_NEWSBYTHISAUTHOR . ' - ' .$authname . ' - ' . $myts->htmlSpecialChars($xoopsModule->name()) );
$xoopsTpl->assign('advertisement', nw_getmoduleoption('advertisement', NW_MODULE_DIR_NAME));

/**
 * Create the meta datas
 */
nw_CreateMetaDatas();

$meta_description = _MI_NW_NEWSBYTHISAUTHOR . ' - ' .$authname . ' - ' . $myts->htmlSpecialChars($xoopsModule->name());
if(isset($xoTheme) && is_object($xoTheme)) {
	$xoTheme->addMeta( 'meta', 'description', $meta_description);
} else {	// Compatibility for old Xoops versions
	$xoopsTpl->assign('xoops_meta_description', $meta_description);
}

include_once XOOPS_ROOT_PATH.'/include/comment_view.php';
include_once XOOPS_ROOT_PATH.'/footer.php';
?>
