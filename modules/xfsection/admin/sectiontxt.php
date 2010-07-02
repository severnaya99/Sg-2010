<?php
// $Id: sectiontxt.php,v 1.3 2006/03/20 03:23:03 ohwada Exp $

// 2006-03-17 K.OHWADA
// dont use foreach($HTTP_POST_VARS as $k => $v)
// $HTTP_POST_VARS   -> $_POST
// $HTTP_GET_VARS    -> $_GET

// 2004/07/10 K.OHWADA
// apostrophe ' doesn't save in Index Page Management
// TextSanitizer: indexheading, indexheader, indexfooter

// 2004/02/28 K.OHWADA
// add adminmenu

// 2003/11/26 K.OHWADA
// bug fix : a picture will disappear, when select new picture

// 2003/09/23 K.OHWADA
// easy to rename module and table

// Options setting
// Only for users who have admin right to system

include 'admin_header.php';
include_once XOOPS_ROOT_PATH.'/include/xoopscodes.php';
include_once XOOPS_ROOT_PATH.'/modules/' . $xoopsModule->dirname().'/class/common.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/include/functions.php';

// easy to rename module and table
//$xoopsModule = XoopsModule::getByDirname("wfsection");
$xoopsModule = XoopsModule::getByDirname($wfsModule);

$myts =& MyTextSanitizer::getInstance();

global $xoopsConfig, $xoopstheme, $xoopsDB, $myts, $xoopsUser, $wfsConfig;

if ( !$xoopsUser->isAdmin($xoopsModule->mid()) ) {
        redirect_header("index.php",1,_NOPERM);
        exit();
}

$op="";

if (isset($_GET['op'])) $op=$_GET['op'];
if (isset($_POST['op'])) $op=$_POST['op'];

If ( $xoopsUser->uid() != 1 && $webmstonly == '1') {
        redirect_header("index.php",2,_AM_NOADMINRIGHTS);
        exit();
}

switch($op){

case "save":

	global $xoopsConfig, $xoopsDB, $myts, $wfsConfig;

	$indexheading = $_POST['indexheading'];
    $indexheader = $_POST['indexheader'];
	$indexfooter = $_POST['indexfooter'];
	$indeximage = $_POST['indeximage'];

// TextSanitizer: indexheading, indexheader, indexfooter
	$indexheading = $myts->makeTboxData4Save($indexheading);
	$indexheader  = $myts->makeTareaData4Save($indexheader);
	$indexfooter  = $myts->makeTareaData4Save($indexfooter);

// easy to rename module and table
//	$xoopsDB->query("update ".$xoopsDB->prefix("wfs_config")." set indexheading='$indexheading', indexheader='$indexheader', indexfooter='$indexfooter', indeximage='$indeximage' ");
	$xoopsDB->query("update ".$xoopsDB->prefix($wfsTableConfig)." set indexheading='$indexheading', indexheader='$indexheader', indexfooter='$indexfooter', indeximage='$indeximage' ");

	redirect_header("sectiontxt.php",1,_AM_DBUPDATED);
    exit();
		
	break;

    default:

    xoops_cp_header();
    
	global $xoopsConfig, $xoopsDB, $myts, $wfsConfig;
  	
  	echo "<div><h3>" . _AM_INDEXPAGECONFIG . "</h3></div>";

// add adminmenu
	if ($wfsAdminMenu) adminmenu();
  	
  	echo "<div>" . _AM_INDEXPAGECONFIGTXT . "</div>";
	include XOOPS_ROOT_PATH."/class/xoopsformloader.php";

// easy to rename module and table
//	$graph_array =& XoopsLists::getImgListAsArray(XOOPS_ROOT_PATH."/modules/wfsection/images");
	$graph_array =& XoopsLists::getImgListAsArray(XOOPS_ROOT_PATH."/modules/$wfsModule/images");

	$sform = new XoopsThemeForm(_AM_MENUS, "op", xoops_getenv('PHP_SELF'));
		
	$indeximage_select = new XoopsFormSelect('', 'indeximage', $wfsConfig['indeximage']);
	$indeximage_select->addOptionArray($graph_array);
	if ($wfsConfig['indeximage']) {

// bug fix : a picture will disappear, when select new picture
// easy to rename module and table
//		$indeximage_select->setExtra("onchange='showImgSelected(\"image\", \"indeximage\", \"modules/wfsection/images\", \"\")'");
		$xoops_url = $xoopsConfig['xoops_url'];
		$indeximage_select->setExtra("onchange='showImgSelected(\"image\", \"indeximage\", \"modules/$wfsModule/images\", \"\", \"$xoops_url\")'");

	}	
	$indeximage_tray = new XoopsFormElementTray(_AM_SECTIONIMAGE, '&nbsp;');
	$indeximage_tray->addElement($indeximage_select);

// easy to rename module and table
//	$indeximage_tray->addElement(new XoopsFormLabel('', "<br /><br /><img src='".$xoopsConfig['xoops_url']."/modules/wfsection/images/".$wfsConfig['indeximage']."' name='image' id='image' alt='' />" ));
	$indeximage_tray->addElement(new XoopsFormLabel('', "<br /><br /><img src='".$xoopsConfig['xoops_url']."/modules/$wfsModule/images/".$wfsConfig['indeximage']."' name='image' id='image' alt='' />" ));

	$sform->addElement($indeximage_tray);
	if (empty($wfsConfig['noindeximage'])){
		$wfsConfig['noindeximage'] = 1;
	}

// TextSanitizer: indexheading, indexheader, indexfooter
//	$sform->addElement(new XoopsFormText(_AM_INDEXHEADING, 'indexheading', 60, 60, $wfsConfig['indexheading']), false);
//	$sform->addElement(new XoopsFormDhtmlTextArea(_AM_SECTIONHEAD, 'indexheader', $wfsConfig['indexheader'], 15, 60));
//	$sform->addElement(new XoopsFormTextArea(_AM_SECTIONFOOT, 'indexfooter', $wfsConfig['indexfooter'], 15, 60));
	$indexheading = $myts->makeTboxData4Edit(  $wfsConfig['indexheading'] );
	$indexheader  = $myts->makeTareaData4Edit( $wfsConfig['indexheader'] );
	$indexfooter  = $myts->makeTareaData4Edit( $wfsConfig['indexfooter'] );
	$sform->addElement(new XoopsFormText(_AM_INDEXHEADING, 'indexheading', 60, 60, $indexheading), false);
	$sform->addElement(new XoopsFormDhtmlTextArea(_AM_SECTIONHEAD, 'indexheader', $indexheader, 15, 60));
	$sform->addElement(new XoopsFormTextArea(_AM_SECTIONFOOT, 'indexfooter', $indexfooter, 15, 60));

	$button_tray = new XoopsFormElementTray('','');
	$hidden = new XoopsFormHidden('op', 'save');
	$button_tray->addElement($hidden);
	$button_tray->addElement(new XoopsFormButton('', 'post', _AM_SAVECHANGE, 'submit'));
	$sform->addElement($button_tray);
	$sform->display();
	    
    break;
}

wfsfooter();
xoops_cp_footer();

?>