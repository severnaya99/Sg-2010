<?php
// $Id: config.php,v 1.4 Date: 06/01/2003, Author: Catzwolf Exp $
//
// Options setting
// Only for users who have admin right to system

include 'admin_header.php';
include_once XOOPS_ROOT_PATH.'/include/xoopscodes.php';
include_once XOOPS_ROOT_PATH.'/modules/' . $xoopsModule->dirname().'/class/common.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/include/functions.php';
foreach ($HTTP_POST_VARS as $k => $v) {
	${$k} = $v;
}

foreach ($HTTP_GET_VARS as $k => $v) {
	${$k} = $v;
}

$xoopsModule = XoopsModule::getByDirname("wfsection");
$myts =& MyTextSanitizer::getInstance();

global $xoopsConfig, $xoopstheme, $xoopsDB, $HTTP_POST_VARS, $myts, $xoopsUser, $wfsConfig;

if ( !$xoopsUser->isAdmin($xoopsModule->mid()) ) {
        redirect_header("index.php",1,_NOPERM);
        exit();
}

$op="";

if (isset($HTTP_GET_VARS['op'])) $op=$HTTP_GET_VARS['op'];
if (isset($HTTP_POST_VARS['op'])) $op=$HTTP_POST_VARS['op'];

If ( $xoopsUser->uid() != 1 && $webmstonly == '1') {
        redirect_header("index.php",2,_AM_NOADMINRIGHTS);
        exit();
}

switch($op){

case "save":

	global $xoopsConfig, $xoopsDB, $HTTP_POST_VARS, $myts, $wfsConfig;

	$indexheading = $HTTP_POST_VARS['indexheading'];
    $indexheader = $HTTP_POST_VARS['indexheader'];
	$indexfooter = $HTTP_POST_VARS['indexfooter'];
	$indeximage = $HTTP_POST_VARS['indeximage'];
                
	$xoopsDB->query("update ".$xoopsDB->prefix("wfs_config")." set indexheading='$indexheading', indexheader='$indexheader', indexfooter='$indexfooter', indeximage='$indeximage' ");
	redirect_header("sectiontxt.php",1,_AM_DBUPDATED);
    exit();
		
	break;

    default:

    xoops_cp_header();
    
	global $xoopsConfig, $xoopsDB, $HTTP_POST_VARS, $myts, $wfsConfig;
  	
  	echo "<div><h3>" . _AM_INDEXPAGECONFIG . "</h3></div>";
  	echo "<div>" . _AM_INDEXPAGECONFIGTXT . "</div>";
	include XOOPS_ROOT_PATH."/class/xoopsformloader.php";
	$graph_array =& XoopsLists::getImgListAsArray(XOOPS_ROOT_PATH."/modules/wfsection/images");
	$sform = new XoopsThemeForm(_AM_MENUS, "op", xoops_getenv('PHP_SELF'));
		
	$indeximage_select = new XoopsFormSelect('', 'indeximage', $wfsConfig['indeximage']);
	$indeximage_select->addOptionArray($graph_array);
	if ($wfsConfig['indeximage']) {
		$indeximage_select->setExtra("onchange='showImgSelected(\"image\", \"indeximage\", \"modules/wfsection/images\", \"\")'");
	}	
	$indeximage_tray = new XoopsFormElementTray(_AM_SECTIONIMAGE, '&nbsp;');
	$indeximage_tray->addElement($indeximage_select);
	$indeximage_tray->addElement(new XoopsFormLabel('', "<br /><br /><img src='".$xoopsConfig['xoops_url']."/modules/wfsection/images/".$wfsConfig['indeximage']."' name='image' id='image' alt='' />" ));
	$sform->addElement($indeximage_tray);
	if (empty($wfsConfig['noindeximage'])){
		$wfsConfig['noindeximage'] = 1;
	}
	$sform->addElement(new XoopsFormText(_AM_INDEXHEADING, 'indexheading', 60, 60, $wfsConfig['indexheading']), false);
	$sform->addElement(new XoopsFormDhtmlTextArea(_AM_SECTIONHEAD, 'indexheader', $wfsConfig['indexheader'], 15, 60));
	$sform->addElement(new XoopsFormTextArea(_AM_SECTIONFOOT, 'indexfooter', $wfsConfig['indexfooter'], 15, 60));
		
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
