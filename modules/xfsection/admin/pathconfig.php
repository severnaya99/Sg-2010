<?php
// $Id: pathconfig.php,v 1.4 2006/03/20 03:23:03 ohwada Exp $

// 2006-03-17 K.OHWADA
// $HTTP_POST_VARS   -> $_POST
// $HTTP_GET_VARS    -> $_GET

// 2005-06-20 K.OHWADA
// supress warning : chmod failed

// 2004/02/28 K.OHWADA
// same title as admin menu
// add adminmenu

// 2003/10/11 K.OHWADA
// easy to rename module and table

// Options setting
// Only for users who have admin right to system

include 'admin_header.php';
include_once XOOPS_ROOT_PATH.'/include/xoopscodes.php';
include_once XOOPS_ROOT_PATH.'/class/module.errorhandler.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/include/functions.php';

// easy to rename module and table
//$xoopsModule = XoopsModule::getByDirname("wfsection");
$xoopsModule = XoopsModule::getByDirname($wfsModule);

$myts =& MyTextSanitizer::getInstance();

// easy to rename module and table
//$result = $xoopsDB->queryF("SELECT articlesapage,  filesbasepath,  graphicspath,  sgraphicspath,  smiliepath, htmlpath FROM ".$xoopsDB->prefix("wfs_config")." ");
$result = $xoopsDB->queryF("SELECT articlesapage,  filesbasepath,  graphicspath,  sgraphicspath,  smiliepath, htmlpath FROM ".$xoopsDB->prefix($wfsTableConfig)." ");

list( $articlesapage,  $filesbasepath,  $graphicspath,  $sgraphicspath,  $smiliepath, $htmlpath) = $xoopsDB->fetchRow($result);

global $xoopsConfig, $xoopstheme, $xoopsDB, $myts, $xoopsUser, $wfsConfig;

if ( !$xoopsUser->isAdmin($xoopsModule->mid()) ) {
        redirect_header("index.php",1,_NOPERM);
        exit();
}

$op="";
$userpath="";

if (isset($_GET['op'])) $op=$_GET['op'];
if (isset($_POST['op'])) $op=$_POST['op'];

If ( $xoopsUser->uid() != 1 && $wfsConfig['webmstonly'] == '1') {
        redirect_header("index.php",2,_AM_NOADMINRIGHTS);
        exit();
}

switch($op){

case "save":

        if ($_POST['defaults'] == 0) {

                global $xoopsConfig, $xoopsDB, $myts;

                if ($_POST['filesbasepath'] == '') {
                	$filesbasepath = $myts->makeTboxData4Save('modules/'.$xoopsModule->dirname().'/cache/uploaded');
                } else {
                	$filesbasepath = $myts->makeTboxData4Save($_POST['filesbasepath']);
                }

                if ($_POST['graphicspath'] == '') {
                    $graphicspath = $myts->makeTboxData4Save('modules/'.$xoopsModule->dirname().'/images/article');
                } else {
                    $graphicspath = $myts->makeTboxData4Save($_POST['graphicspath']);
                }

                if ($_POST['sgraphicspath'] == '') {
                    $sgraphicspath = $myts->makeTboxData4Save('modules/'.$xoopsModule->dirname().'/images/category');
                } else {
                    $sgraphicspath = $myts->makeTboxData4Save($_POST['sgraphicspath']);
                }

                if ($_POST['smiliepath'] == '') {
                    $smiliepath = $myts->makeTboxData4Save("uploads");
                } else {
                    $smiliepath = $myts->makeTboxData4Save($_POST['smiliepath']);
        		}

        		if ($_POST['htmlpath'] == '') {
                    $htmlpath = $myts->makeTboxData4Save("modules/".$xoopsModule->dirname()."/html");
                } else {
                    $htmlpath = $myts->makeTboxData4Save($_POST['htmlpath']);
        		}

// easy to rename module and table
//		$xoopsDB->query("update ".$xoopsDB->prefix("wfs_config")." set filesbasepath='$filesbasepath', graphicspath='$graphicspath', sgraphicspath='$sgraphicspath',smiliepath='$smiliepath', htmlpath='$htmlpath' ");
		$xoopsDB->query("update ".$xoopsDB->prefix($wfsTableConfig)." set filesbasepath='$filesbasepath', graphicspath='$graphicspath', sgraphicspath='$sgraphicspath',smiliepath='$smiliepath', htmlpath='$htmlpath' ");

                redirect_header("pathconfig.php",1,_AM_DBUPDATED);
                exit();
        }

        if ($_POST['defaults'] = 1) {

// easy to rename module and table
//		$xoopsDB->query("update ".$xoopsDB->prefix("wfs_config")." set filesbasepath ='modules/wfsection/cache/uploaded', graphicspath ='modules/wfsection/images/article', sgraphicspath ='modules/wfsection/images/category', smiliepath ='uploads', htmlpath ='modules/wfsection/html'");
		$xoopsDB->query("update ".$xoopsDB->prefix($wfsTableConfig)." set filesbasepath ='modules/$wfsModule/cache/uploaded', graphicspath ='modules/$wfsModule/images/article', sgraphicspath ='modules/$wfsModule/images/category', smiliepath ='uploads', htmlpath ='modules/$wfsModule/html'");

		redirect_header("pathconfig.php",1,_AM_REVERTED);
        exit();
        }
        break;


        default:

        xoops_cp_header();
        global $xoopsConfig, $xoopsDB, $myts, $eh, $wfsConfig;

// same title as admin menu
// add adminmenu
//	echo "<div><h3>" . _AM_GENERALCONF . "</h3></div>";
	echo "<div><h3>" . _AM_PATH_MANAGEMENT . "</h3></div>";
	if ($wfsAdminMenu) adminmenu();

 	//Finish file/dir checks here

// start of file path config
 	echo"<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class=\"odd\">";
   	echo "<colspan='2'><form action='pathconfig.php' method='post'>";
	
    //Finish file/dir checks here

// start of file path config
	echo "<tr><td class='bg3' colspan='2' height='20'><b>" . _AM_FILEPATH . "</b></td></tr>";
    echo "<tr><td class='odd' align=left colspan='2'>" . _AM_FILEPATHWARNING . "</td></tr>";

//start of upload files
    echo "<tr><td class='head' align=left colspan='2'><b>" . _AM_FILESBASEPATH . "</b></td></tr>";
    echo "<tr><td class='even' align=left colspan='2'><b>" . _AM_FILEUSEPATH . ": </b>". sprintf(XOOPS_URL."/")."";
    echo "<input type='text' name='filesbasepath' value='".$filesbasepath."' size='42' />";
    $getcorrect = getcorrectpath($filesbasepath);
        echo "<tr><td class='even' align=left colspan='2'>";
    echo "<b>".$getcorrect."</b>";
    echo "". sprintf(XOOPS_URL."/".$filesbasepath)."/";
    echo "</td></tr>";

//start of upload article graphics
    echo "<tr><td class='head' align=left colspan='2'><b>" . _AM_AGRAPHICPATH . "</b></td></tr>";
    echo "<tr><td class='even' align=left colspan='2'><b>" . _AM_FILEUSEPATH . ": </b>". sprintf(XOOPS_URL."/")."";
    echo "<input type='text' name='graphicspath' value='".$graphicspath."' size='42' />";
    $getcorrect = getcorrectpath($graphicspath);
    echo "</td></tr>";
    echo "<tr><td class='even' align=left colspan='2'>";
    echo "<b>".$getcorrect."</b>";    echo "". sprintf(XOOPS_URL."/".$graphicspath)."/";
    echo "</td></tr>";

    echo "<tr><td class='head' align=left colspan='2'><b>" . _AM_SGRAPHICPATH . "</b></td></tr>";
    echo "<tr><td class='even' align=left colspan='2'><b>" . _AM_FILEUSEPATH . ": </b>". sprintf(XOOPS_URL."/")."";
    echo "<input type='text' name='sgraphicspath' value='".$sgraphicspath."' size='42' />";
    $getcorrect = getcorrectpath($sgraphicspath);
    echo "</td></tr>";
    echo "<tr><td class='even' align=left colspan='2'>";
    echo "<b>".$getcorrect."</b>";         echo "". sprintf(XOOPS_URL."/".$sgraphicspath)."/";
    echo "</td></tr>";

    echo "<tr><td class='head' align=left colspan='2'><b>" . _AM_SMILIECPATH . "</b></td></tr>";
    echo "<tr><td class='even' align=left colspan='2'><b>" . _AM_FILEUSEPATH . ": </b>". sprintf(XOOPS_URL."/")."";
    echo "<input type='text' name='smiliepath' value='".$smiliepath."' size='42' />";
    $getcorrect = getcorrectpath($smiliepath);
    echo "</td></tr>";
    echo "<tr><td class='even' align=left colspan='2'>";
    echo "<b>".$getcorrect."</b>";    echo "". sprintf(XOOPS_URL."/".$smiliepath)."/";
    echo "</td></tr>";

    echo "<tr><td class='head' align=left colspan='2'><b>" . _AM_HTMLCPATH . "</b></td></tr>";
    echo "<tr><td class='even' align=left colspan='2'><b>" . _AM_FILEUSEPATH . ": </b>". sprintf(XOOPS_URL."/")."";
    echo "<input type='text' name='htmlpath' value='".$htmlpath."' size='42' />";
    $getcorrect = getcorrectpath($htmlpath);
    echo "</td></tr>";
    echo "<tr><td class='even' align=left colspan='2'>";
    echo "<b>".$getcorrect."</b>";    echo "". sprintf(XOOPS_URL."/".$htmlpath)."/";
    echo "</td></tr>";

    echo "<tr><td class='odd' colspan='2'>&nbsp;</td></tr>";
    echo "<tr><td class='bg3' colspan='2' height='20'><b>" . _AM_CMODHEADER . "</b></td></tr>";
    echo "<tr><td class='odd' colspan='2'>" . _AM_CMODERRORINFO . "</td></tr>";

    @chmod (XOOPS_ROOT_PATH."/".$filesbasepath, 0777);
    echo "<tr><td class='even' width=60%>";
    echo "<b>". _AM_FILEUPLOADSPATH. "</b>". sprintf(XOOPS_ROOT_PATH."/".$filesbasepath)."";
    echo "</td><td  class='odd'>&nbsp;<b>Attr:</b> ". get_perms(XOOPS_ROOT_PATH."/".$filesbasepath);
    if (!is_dir(XOOPS_ROOT_PATH."/".$filesbasepath) or !is_writeable(XOOPS_ROOT_PATH."/".$filesbasepath)) {
    	echo "<i><b><font color=\"#FF0000\">" . _AM_CMODERROR . "</font></b></i>";
    }
    echo "</td><td>";
    if ($filesbasepath) {
    	$filesbasepath = $filesbasepath."/".'temp';
    }else{
        $filesbasepath = $filesbasepath.temp;
    }
    
	@chmod (XOOPS_ROOT_PATH."/".$filesbasepath, 0777);
    echo "<tr><td class='even'>";
    echo "<b>". _AM_FILEUPLOADSTEMPPATH. "</b>". sprintf(XOOPS_ROOT_PATH."/".$filesbasepath)."";
    echo "</td><td  class='odd'>&nbsp;<b>Attr:</b> ". get_perms(XOOPS_ROOT_PATH."/".$filesbasepath);
    if (!is_dir(XOOPS_ROOT_PATH."/".$filesbasepath) or !is_writeable(XOOPS_ROOT_PATH."/".$filesbasepath)) {
    	echo " <i><b><font color=\"#FF0000\">" . _AM_CMODERROR . "</font></b></i>";
    }
    echo "</td><td>";

    str_replace("//", "/",$graphicspath);
    @chmod (XOOPS_ROOT_PATH."/".$graphicspath, 0777);
    echo "<tr><td class='even' width=60%>";
    echo "<b>". _AM_ARTICLESFILEPATH. "</b>". sprintf(XOOPS_ROOT_PATH."/".$graphicspath)."";
    echo "</td><td  class='odd'>&nbsp;<b>Attr:</b> ". get_perms(XOOPS_ROOT_PATH."/".$graphicspath);
    if (!is_dir(XOOPS_ROOT_PATH."/".$graphicspath) or !is_writeable(XOOPS_ROOT_PATH."/".$graphicspath)) {
    	echo "<i><b><font color=\"#FF0000\">" . _AM_CMODERROR . "</font></b></i>";
    }
    echo "</td><td>";

    str_replace("//", "/",$sgraphicspath);

// supress warning : chmod failed
//	 chmod (XOOPS_ROOT_PATH."/".$sgraphicspath, 0777);
	@chmod (XOOPS_ROOT_PATH."/".$sgraphicspath, 0777);

    echo "<tr><td class='even' width=60%>";
    echo "<b>". _AM_SECTIONFILEPATH. "</b>". sprintf(XOOPS_ROOT_PATH."/".$sgraphicspath)."";
    echo "</td><td  class='odd'>&nbsp;<b>Attr:</b> ". get_perms(XOOPS_ROOT_PATH."/".$sgraphicspath);
    if (!is_dir(XOOPS_ROOT_PATH."/".$sgraphicspath) or !is_writeable(XOOPS_ROOT_PATH."/".$sgraphicspath)) {
    	echo "<i><b><font color=\"#FF0000\">" . _AM_CMODERROR . "</font></b></i>";
    }
    echo "</td><td>";

    str_replace("//", "/",$smiliepath);
    @chmod (XOOPS_ROOT_PATH."/".$smiliepath, 0777);
    echo "<tr><td class='even' width=60%>";
    echo "<b>". _AM_SMILIEFILEPATH. "</b>". sprintf(XOOPS_ROOT_PATH."/".$smiliepath)."";
    echo "</td><td  class='odd'>&nbsp;<b>Attr:</b> ". get_perms(XOOPS_ROOT_PATH."/".$smiliepath);
    if (!is_dir(XOOPS_ROOT_PATH."/".$smiliepath) || !is_writeable(XOOPS_ROOT_PATH."/".$smiliepath)){
    	echo "<i><b><font color=\"#FF0000\">" . _AM_CMODERROR . "</font></b></i>";
    }
    echo "</td><td>";

    str_replace("//", "/",$htmlpath);

// supress warning : chmod failed
//   chmod (XOOPS_ROOT_PATH."/".$htmlpath, 0777);
    @chmod (XOOPS_ROOT_PATH."/".$htmlpath, 0777);

    echo "<tr><td class='even' width=60%>";
    echo "<b>". _AM_HTMLFILEPATH. "</b>". sprintf(XOOPS_ROOT_PATH."/".$htmlpath)."";
    echo "</td><td  class='odd'>&nbsp;<b>Attr:</b> ". get_perms(XOOPS_ROOT_PATH."/".$htmlpath);
    if (!is_dir(XOOPS_ROOT_PATH."/".$htmlpath) || !is_writeable(XOOPS_ROOT_PATH."/".$htmlpath)){
        echo "<i><b><font color=\"#FF0000\">" . _AM_CMODERROR . "</font></b></i>";
    }
    echo "</td><td>";
    
	$defaults = '0';	
	If ( $xoopsUser->uid() == 1) {
	If ( $xoopsUser->isadmin($xoopsModule->mid())) {
    	echo "<tr><td class='odd' colspan='2'>&nbsp;</td></tr>";
    	echo "<tr><td class='head'>" . _AM_DEFAULTS . "</td>";
    	echo "<td class='even'>";

    	
	if ($defaults == '1') {
    	echo "<input type='radio' name='defaults' value='1' checked='checked' />&nbsp;" ._AM_YES."&nbsp;";
        echo "<input type='radio' name='defaults' value='0' />&nbsp;" ._AM_NO."&nbsp;";
   	} else {
      	echo "<input type='radio' name='defaults' value='1' />&nbsp;" ._AM_YES."&nbsp;";
       	echo "<input type='radio' name='defaults' value='0' checked='checked' />&nbsp;" ._AM_NO."&nbsp;";
    }
	}
}
	$defaults = $defaults;	
		
	echo "<tr><td class='odd' colspan='2' align='center'><br><input type='hidden' name='op' value='save' />";
    echo "<input type='submit' value='"._AM_SAVECHANGE."' />";
    echo "&nbsp;<input type='button' value='"._AM_CANCEL."' onclick='javascript:history.go(-1)' />";
    echo "</form>";
    echo"</td></tr></table>";

    break;
}

    clearstatcache();
xoops_cp_footer();

?>