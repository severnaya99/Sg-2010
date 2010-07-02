<?php
// $Id: config.php,v 1.4 Date: 06/01/2003, Author: Catzwolf Exp $
//
// Options setting
// Only for users who have admin right to system

include 'admin_header.php';
include_once XOOPS_ROOT_PATH.'/include/xoopscodes.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/class/common.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/mimetype.php';
include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/include/groupaccess.php");
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/include/functions.php';

$xoopsModule = XoopsModule::getByDirname("wfsection");
$myts =& MyTextSanitizer::getInstance();

global $xoopsConfig, $xoopstheme, $xoopsDB, $HTTP_POST_VARS, $myts, $xoopsUser, $wfsConfig;

if ( !$xoopsUser->isAdmin($xoopsModule->mid()) ) {
        redirect_header("index.php",1,_NOPERM);
        exit();
}

$op="";$userpath="";

if (isset($HTTP_GET_VARS['op'])) $op=$HTTP_GET_VARS['op'];
if (isset($HTTP_POST_VARS['op'])) $op=$HTTP_POST_VARS['op'];

If ( $xoopsUser->uid() != 1 && $wfsConfig['webmstonly'] == '1') {
        redirect_header("index.php",2,_AM_NOADMINRIGHTS);
        exit();
}

switch($op){

case "save":
        if ($HTTP_POST_VARS['defaults'] == 0) {

                global $xoopsConfig, $xoopsDB, $HTTP_POST_VARS, $myts, $wfsConfig;

                $articlesapage = intval($HTTP_POST_VARS['articlesapage']);
				$toppagetype = intval($HTTP_POST_VARS['toppagetype']);
    	        $wysiwygeditor = intval($HTTP_POST_VARS['wysiwygeditor']);
                $showcatpic = intval($HTTP_POST_VARS['showcatpic']);
                $comments = intval($HTTP_POST_VARS['comments']);
                $blockscroll = intval($HTTP_POST_VARS['blockscroll']);
                $blockheight = intval($HTTP_POST_VARS['blockheight']);
                $blockamount = intval($HTTP_POST_VARS['blockamount']);
                $blockdelay = intval($HTTP_POST_VARS['blockdelay']);
                $submenus = intval($HTTP_POST_VARS['submenus']);
                $webmstonly = intval($HTTP_POST_VARS['webmstonly']);
                $lastart = intval($HTTP_POST_VARS['lastart']);
                $numuploads = intval($HTTP_POST_VARS['numuploads']);
                $timestamp = $HTTP_POST_VARS['timestamp'];
                $autoapprove = $HTTP_POST_VARS['autoapprove'];
                $showauthor = intval($HTTP_POST_VARS['showauthor']);
                $showcomments = intval($HTTP_POST_VARS['showcomments']);
                $showfile = intval($HTTP_POST_VARS['showfile']);
                $showrated = intval($HTTP_POST_VARS['showrated']);
                $showvotes = intval($HTTP_POST_VARS['showvotes']);
                $showupdated = intval($HTTP_POST_VARS['showupdated']);
                $showhits = intval($HTTP_POST_VARS['showhits']);
                $showMarticles = intval($HTTP_POST_VARS['showMarticles']);
                $showMupdated = intval($HTTP_POST_VARS['showMupdated']);
				$anonpost = intval($HTTP_POST_VARS['anonpost']);
				$notifysubmit = intval($HTTP_POST_VARS['notifysubmit']);
				$shortart = intval($HTTP_POST_VARS['shortart']);
				$shortcat = intval($HTTP_POST_VARS['shortcat']);
				$novote = intval($HTTP_POST_VARS['novote']);
				$realname = intval($HTTP_POST_VARS['realname']);
				$noicons = intval($HTTP_POST_VARS['noicons']);
				$summary = intval($HTTP_POST_VARS['summary']);
				// -- Skalpack2 [start]
				$aidxpathtype = intval($HTTP_POST_VARS['aidxpathtype']);  
				$aidxorder = $HTTP_POST_VARS['aidxorder'];
				// -- Skalpack2 [end] added these to next line. 
				$selmimetype = saveAccess($HTTP_POST_VARS['selmimetype']);
				$wfsmode = $HTTP_POST_VARS['wfsmode'];
				$imgheight = $HTTP_POST_VARS['imgheight'];
				$imgwidth = $HTTP_POST_VARS['imgwidth'];
				$filesize = $HTTP_POST_VARS['filesize'];
				$picon = $HTTP_POST_VARS['picon'];
				  
				$xoopsDB->query("update ".$xoopsDB->prefix("wfs_config")." set articlesapage='$articlesapage', filesbasepath='$filesbasepath', graphicspath='$graphicspath', sgraphicspath='$sgraphicspath', smiliepath='$smiliepath', htmlpath='$htmlpath', toppagetype=$toppagetype, wysiwygeditor=$wysiwygeditor, showcatpic=$showcatpic, comments=$comments, blockscroll=$blockscroll, blockheight=$blockheight, blockamount=$blockamount, blockdelay=$blockdelay, submenus=$submenus, webmstonly=$webmstonly, lastart=$lastart,numuploads=$numuploads, timestamp='$timestamp', autoapprove='$autoapprove', showauthor='$showauthor',showcomments='$showcomments', showfile='$showfile', showrated='$showrated', showvotes='$showvotes',showupdated='$showupdated', showhits='$showhits', showMarticles = '$showMarticles', showMupdated = '$showMupdated', anonpost ='$anonpost', notifysubmit ='$notifysubmit', shortart ='$shortart', shortcat = '$shortcat', novote = '$novote', realname = '$realname', noicons='$noicons', summary='$summary', aidxpathtype='$aidxpathtype', aidxorder='$aidxorder', selmimetype='$selmimetype', wfsmode='$wfsmode', imgwidth='$imgwidth', imgheight='$imgheight', filesize='$filesize', picon='$picon'");
                redirect_header("config.php",1,_AM_DBUPDATED);
                exit();
       } 
        if ($HTTP_POST_VARS['defaults'] = 1) {
		
				$xoopsDB->query("update ".$xoopsDB->prefix("wfs_config")." set 
				articlesapage   = '10', 
				toppagetype 	= '1', 
				wysiwygeditor 	= '1',
  				showcatpic 		= '0',
				comments 		= '0',
  				blockscroll 	= '0',
				blockheight		= '50',
			  	blockamount 	= '5',
			  	blockdelay 		= '1',
				submenus  		= '0',
  				webmstonly 		= '0',
  				lastart 		= '10',
				numuploads 		= '5',
				timestamp 		= 'Y-m-d',
				autoapprove 	= '0',
				showauthor 		= '1',
				showcomments 	= '1',
				showfile 		= '1',
				showrated 		= '1',
				showvotes 		= '1',
				showupdated 	= '1',
				showhits 		= '1',
				showMarticles 	= '1',
				showMupdated 	= '1',
				anonpost 		= '0',
				notifysubmit 	= '0',
				shortart 		= '0',
				shortcat 		= '0',
				novote 			= '0',
				realname 		= '0',
				indexheading 	= 'WF-Sections',
				indexheader 	= '',
				indexfooter 	= '',
				groupid 		= '1 2 3',
				indeximage 		= 'logo.gif',
				noicons 		= '0',
				summary 		= '1',
				aidxpathtype 	= '1',
				aidxorder 		= 'weight',
				filesize 		= '2097152',
				selmimetype 	= 'doc lha lzh pdf gtar swf tar tex texinfo texi zip Zip au XM snd mid midi kar mpga mp2 mp3 aif aiff aifc m3u ram rm rpm ra wav wax bmp gif ief jpeg jpg jpe png tiff tif ico pbm ppm rgb xbm xpm css html htm asc txt rtx rtf mpeg mpg mpe qt mov mxu avi',
				wfsmode 		= '666',
				imgwidth 		= '100',
				imgheight 		= '100',
				picon 			= '1'
				");
				
				redirect_header("config.php",1,_AM_REVERTED);
        		exit();
        	}
            	break;

        default:

    xoops_cp_header();
    global $xoopsConfig, $xoopsDB, $HTTP_POST_VARS, $myts, $wfsConfig;
  	
  	echo "<div><h4>" . _AM_GENERALCONF . "</h4></div>";
  	//echo "<table width='100%' border='0' cellpadding = '2' cellspacing='1' class='outer'>";
	adminmenu();
	include_once XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
	
	$sform = new XoopsThemeForm(_AM_MENUS, "op", xoops_getenv('PHP_SELF'));
	$sform->insertBreak("<div class = even>WF-Section admin</div>");
	$sform->insertBreak("<tr class = bg3><td >"._AM_CATEGORYMENU."</td><td></td></tr>");
	
	$showcatpic_radio = new XoopsFormRadioYN(_AM_SHOWCATPIC, 'showcatpic', $wfsConfig['showcatpic'], ' Yes', ' No');
	$sform->addElement($showcatpic_radio);
	
	$submenus_radio = new XoopsFormRadioYN(_AM_SHOWSUBMENU, 'submenus', $wfsConfig['submenus'], ' Yes', ' No');
	$sform->addElement($submenus_radio);
	
	$showMarticles_radio = new XoopsFormRadioYN(_AM_SHOWMARTICLES, 'showMarticles', $wfsConfig['showMarticles'], ' Yes', ' No');
	$sform->addElement($showMarticles_radio);
	
	$showMupdated_radio = new XoopsFormRadioYN(_AM_SHOWMUPDATED, 'showMupdated', $wfsConfig['showMupdated'], ' Yes', ' No');
	$sform->addElement($showMupdated_radio);
	
	$toppagetype_radio = new XoopsFormRadioYN(_AM_TOPPAGETYPE, 'toppagetype', $wfsConfig['toppagetype'], ' Yes', ' No');
	$sform->addElement($toppagetype_radio);
	
	$shortcat_radio = new XoopsFormRadioYN(_AM_SHORTCATTITLE, 'shortcat', $wfsConfig['shortcat'], ' Yes', ' No');
	$sform->addElement($shortcat_radio);
	
	$picon_radio = new XoopsFormRadioYN(_AM_PICON, 'picon', $wfsConfig['picon'], ' Yes', ' No');
	$sform->addElement($picon_radio);
	
	$sform->insertBreak("<tr class = bg3><td >"._AM_ARTICLEMENU."</td><td></td></tr>");
	//Article Index
	
	$articlesapage_select = new XoopsFormSelect(_AM_ARTICLESAPAGE, "articlesapage", $wfsConfig['articlesapage']);
	$articlesapage_select->addOptionArray(array("5"=>5, "10"=>10, "20"=>20, "30"=>30, "40"=>40, "50"=>50, "60"=>60, "70"=>70, "80"=>80, "90"=>90, "100"=>100));
	$sform->addElement($articlesapage_select);
	
	$showicon_radio = new XoopsFormRadioYN(_AM_SHOWICON, 'noicons', $wfsConfig['noicons'], ' Yes', ' No');
	$sform->addElement($showicon_radio);
	
	$showsummary_radio = new XoopsFormRadioYN(_AM_SHOWSUMMARY, 'summary', $wfsConfig['summary'], ' Yes', ' No');
	$sform->addElement($showsummary_radio);
	
	$showauthor_radio = new XoopsFormRadioYN(_AM_SHOWAUTHOR, 'showauthor', $wfsConfig['showauthor'], ' Yes', ' No');
	$sform->addElement($showauthor_radio);
	
	$showhits_radio = new XoopsFormRadioYN(_AM_SHOWHITS, 'showhits', $wfsConfig['showhits'], ' Yes', ' No');
	$sform->addElement($showhits_radio);
	
	$showcomments_radio = new XoopsFormRadioYN(_AM_SHOWCOMMENTS2, 'showcomments', $wfsConfig['showcomments'], ' Yes', ' No');
	$sform->addElement($showcomments_radio);
	
	$showfile_radio = new XoopsFormRadioYN(_AM_SHOWFILE, 'showfile', $wfsConfig['showfile'], ' Yes', ' No');
	$sform->addElement($showfile_radio);
	
	$showrated_radio = new XoopsFormRadioYN(_AM_SHOWRATED, 'showrated', $wfsConfig['showrated'], ' Yes', ' No');
	$sform->addElement($showrated_radio);
	
	$showvotes_radio = new XoopsFormRadioYN(_AM_SHOWVOTES, 'showvotes', $wfsConfig['showvotes'], ' Yes', ' No');
	$sform->addElement($showvotes_radio);
	
	$showupdated_radio = new XoopsFormRadioYN(_AM_SHOWPUBLISHED, 'showupdated', $wfsConfig['showupdated'], ' Yes', ' No');
	$sform->addElement($showupdated_radio);
	
	$shortart_radio = new XoopsFormRadioYN(_AM_SHORTARTTITLE, 'shortart', $wfsConfig['shortart'], ' Yes', ' No');
	$sform->addElement($shortart_radio);
	
	// -- Skalpack2 [start]
	$aidxpathtype_select = new XoopsFormSelect(_AM_NAVTOOLTYPE, "aidxpathtype", $wfsConfig['aidxpathtype']);
	$aidxpathtype_select->addOptionArray(array('0'=>_AM_SELECTBOX, '1'=>_AM_SELECTSUBS, '2'=>_AM_LINKEDPATH, '3'=>_AM_LINKSANDSELECT, '4'=>_AM_NONE));
	$sform->addElement($aidxpathtype_select);

	$aidxorder_select = new XoopsFormSelect(_AM_ARTICLESSORT, "aidxorder", $wfsConfig['aidxorder']);
	$qa=' (A)';
	$qd=' (D)';
	$aidxorder_select->addOptionArray(array('title ASC'=>_WFS_TITLE . $qa, 'title DESC'=>_WFS_TITLE . $qd, 'created ASC'=>_AM_SUBMITTED2 . $qa, 'created DESC'=>_AM_SUBMITTED2 . $qd,
		'rating ASC'=>_WFS_RATING . $qa, 'rating DESC'=>_WFS_RATING . $qd, 'hits ASC'=>_AM_POPULARITY . $qa, 'hits DESC'=>_AM_POPULARITY . $qd, 'weight'=>_AM_WEIGHT));
	$sform->addElement($aidxorder_select);
	// -- Skalpack2 [/end]
	
	
	$sform->insertBreak("<tr class = bg3><td >"._AM_ARTICLEPAGEMENU."</td><td></td></tr>");
	
	//articles
	$comments_radio = new XoopsFormRadioYN(_AM_SHOWCOMMENTS, 'comments', $wfsConfig['comments'], ' Yes', ' No');
	$sform->addElement($comments_radio);
	
	$novote_radio = new XoopsFormRadioYN(_AM_SHOWVOTESINART, 'novote', $wfsConfig['novote'], ' Yes', ' No');
	$sform->addElement($novote_radio);
	
	$realname_radio = new XoopsFormRadioYN(_AM_SHOWREALNAME, 'realname', $wfsConfig['realname'], ' Yes', ' No');
	$sform->addElement($realname_radio);
	
	//Blocks config
	$sform->insertBreak("<tr class = bg3><td >"._AM_BLOCKMENU."</td><td></td></tr>");
	$blockscroll_radio = new XoopsFormRadioYN(_AM_SCROLLINGBLOCK, 'blockscroll', $wfsConfig['blockscroll'], ' Yes', ' No');
	$sform->addElement($blockscroll_radio);
	
	$sform->addElement(new XoopsFormText(_AM_BLOCKHEIGHT, 'blockheight', 3, 3, $wfsConfig['blockheight']));
	$sform->addElement(new XoopsFormText(_AM_BLOCKAMOUNT, 'blockamount', 2, 2, $wfsConfig['blockamount']));
	$sform->addElement(new XoopsFormText(_AM_BLOCKDELAY, 'blockdelay', 2, 2, $wfsConfig['blockdelay']));
	
	$sform->insertBreak("<tr class = bg3><td >"._AM_ADMINEDITMENU."</td><td></td></tr>");
	if (strstr($HTTP_SERVER_VARS["HTTP_USER_AGENT"], "MSIE")) {
		$wysiwygeditor_radio = new XoopsFormRadioYN(_AM_WYSIWYG, 'wysiwygeditor', $wfsConfig['wysiwygeditor'], ' Yes', ' No');
		$sform->addElement($wysiwygeditor_radio);
	} else {
		$wysiwygeditor_hidden = new XoopsFormHidden('wysiwygeditor', 0);
		$sform->addElement($wysiwygeditor_hidden);
	}
	
	$lastart_select = new XoopsFormSelect(_AM_LASTART, "lastart", $wfsConfig['lastart']);
	$lastart_select->addOptionArray(array("5"=>5, "10"=>10, "20"=>20, "30"=>30, "40"=>40, "50"=>50, "60"=>60, "70"=>70, "80"=>80, "90"=>90, "100"=>100));
	$sform->addElement($lastart_select);
	
	$numuploads_select = new XoopsFormSelect(_AM_NUMUPLOADS, "numuploads", $wfsConfig['numuploads']);
	$numuploads_select->addOptionArray(array("1"=>1, "2"=>2, "3"=>3, "4"=>4, "5"=>5));
	$sform->addElement($numuploads_select);
	$sform->addElement(new XoopsFormText(_AM_DEFAULTTIME, 'timestamp', 20, 80, $wfsConfig['timestamp']), false);
	
	$sform->insertBreak("<tr class = bg3><td >"._AM_ADMINCONFIGMENU."</td><td></td></tr>");
		
	$notifysubmit_radio = new XoopsFormRadioYN(_AM_NOTIFYSUBMIT, 'notifysubmit', $wfsConfig['notifysubmit'], ' Yes', ' No');
	$sform->addElement($notifysubmit_radio);											
	
	$anonpost_radio = new XoopsFormRadioYN(_AM_ANONPOST, 'anonpost', $wfsConfig['anonpost'], ' Yes', ' No');
	$sform->addElement($anonpost_radio);
	
	$autoapprove_radio = new XoopsFormRadioYN(_AM_AUTOAPPROVE, 'autoapprove', $wfsConfig['autoapprove'], ' Yes', ' No');
	$sform->addElement($autoapprove_radio);
	
	$webmstonly_radio = new XoopsFormRadioYN(_AM_WEBMASTONLY, 'webmstonly', $wfsConfig['webmstonly'], ' Yes', ' No');
	$sform->addElement($webmstonly_radio);
	
	$graph_array =& mimetype::privBuildMimeArray();
	$indeximage_select = new XoopsFormSelect('', 'selmimetype', getGroupIda($wfsConfig['selmimetype']), 20, true);
	$indeximage_select->addOptionArray($graph_array);
	$indeximage_tray = new XoopsFormElementTray(_AM_ALLOWEDMIMETYPES, '');
	$indeximage_tray->addElement($indeximage_select);
	$sform->addElement($indeximage_tray);
	
	$sform->addElement(new XoopsFormText(_AM_UPLOADFILESIZE, 'filesize', 8, 8, $wfsConfig['filesize']));
	$sform->addElement(new XoopsFormText(_AM_FILEMODE, 'wfsmode', 4, 4, $wfsConfig['wfsmode']));
	$sform->addElement(new XoopsFormText(_AM_IMGHEIGHT, 'imgheight', 5, 5, $wfsConfig['imgheight']));
	$sform->addElement(new XoopsFormText(_AM_IMGWIDTH, 'imgwidth', 5, 5, $wfsConfig['imgwidth']));
		
	$defaults_radio = new XoopsFormRadioYN(_AM_DEFAULTS, 'defaults', 0, ' Yes', ' No');
	$sform->addElement($defaults_radio);
			
	$button_tray = new XoopsFormElementTray('','');
	$hidden = new XoopsFormHidden('op', 'save');
	$button_tray->addElement($hidden);
	$button_tray->addElement(new XoopsFormButton('', 'post', _AM_SAVECHANGE, 'submit'));
	$sform->addElement($button_tray);
	$sform->display();
	unset($hidden);   
    break;
	
}
wfsfooter();
xoops_cp_footer();
?>
