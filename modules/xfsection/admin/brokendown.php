<?php
// $Id: brokendown.php,v 1.3 2006/03/20 03:23:03 ohwada Exp $

// 2006-03-17 K.OHWADA
// dont use foreach($HTTP_POST_VARS as $k => $v)
// $HTTP_POST_VARS -> $_POST
// $HTTP_GET_VARS  -> $_GET

// 2004/02/28 K.OHWADA
// same title as admin menu
// add adminmenu

// 2003/10/11 K.OHWADA
// easy to rename module and table
//   change functuion listBrokenDownloads, delBrokenDownloads, ignoreBrokenDownloads

// WFSECTION
// Powerfull Section Module for XOOPS
// Admin Main

include 'admin_header.php';
include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/class/wfscategory.php");
include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/class/wfsarticle.php");
include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/class/uploadfile.php");
include_once(XOOPS_ROOT_PATH."/class/module.errorhandler.php");

// define $op
$op = '';
if (isset($_POST['op']))
{ 
	$op = $_POST['op'];
}
elseif (isset($_GET['op']))
{
	$op = $_GET['op'];
}

// --------------------------------------------------------
function listBrokenDownloads()
{
	global $xoopsDB, $eh;
	
	global $wfsTableFiles, $wfsTableBroken;	// add

// easy to rename module and table
//	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("wfs_broken")." ORDER BY reportid");
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix($wfsTableBroken)." ORDER BY reportid");
	
	$totalbrokendownloads = $xoopsDB->getRowsNum($result);

	xoops_cp_header();

// same title as admin menu
// add adminmenu
//	echo "<h4>"._AM_DLCONF."</h4>";
	echo "<h4>"._AM_LIST_BROKEN."</h4>";
	global $wfsAdminMenu;
	if ($wfsAdminMenu) adminmenu();

    echo"<table width='100%' border='0' cellspacing='1' class='outer'><tr class='odd'><td>";
	echo "<h4>"._AM_BROKENREPORTS." ($totalbrokendownloads)</h4><br />";

	if ($totalbrokendownloads==0) {
		echo _AM_NOBROKEN;
	} else {
		echo "<center>"._AM_IGNOREDESC."<br />"._AM_DELETEDESC."</center><br /><br /><br />";
		$colorswitch="#dddddd";
		echo "<table align='center' width='90%'>";
		echo "
		<tr>
			<td><b>"._AM_FILETITLE."</b></td>
			<td><b>" ._AM_REPORTER."</b></td>
			<td><b>" ._AM_IGNORE."</b></td>
			<td><b>" ._AM_EDIT."</b></td>
			<td><b>" ._AM_DELETE."</b></td>
		</tr>";
		
		while(list($reportid, $lid, $sender, $ip)=$xoopsDB->fetchRow($result)){

// easy to rename module and table
//			$result2 = $xoopsDB->query("SELECT fileshowname FROM ".$xoopsDB->prefix("wfs_files")." WHERE fileid=$lid");
			$result2 = $xoopsDB->query("SELECT fileshowname FROM ".$xoopsDB->prefix($wfsTableFiles)." WHERE fileid=$lid");

			if ($sender != 0) {
				$result3 = $xoopsDB->query("SELECT uname, email FROM ".$xoopsDB->prefix("users")." WHERE uid=".$sender."");
				list($sendername, $email)=$xoopsDB->fetchRow($result3);
			}
			list($fileshowname)=$xoopsDB->fetchRow($result2);
			$result4 = $xoopsDB->query("SELECT uname, email FROM ".$xoopsDB->prefix("users")." WHERE uid=".$owner."");
			list($ownername, $owneremail)=$xoopsDB->fetchRow($result4);
			echo "<tr><td bgcolor=$colorswitch><a href=index.php?op=fileedit&fileid=$lid target='_blank'>".$fileshowname."</a></td>";
			if ($email=="") {
				echo "<td bgcolor=$colorswitch>$sendername ($ip)";
			} else {
				echo "<td bgcolor=$colorswitch><a href=mailto:$email>$sendername</a> ($ip)";
			}
			echo "</td>";

			echo "</td><td bgcolor='$colorswitch' align='center'>";
			echo myTextForm("brokendown.php?op=ignoreBrokenDownloads&lid=$lid" , "X");
			echo "</td><td bgcolor='$colorswitch' align='center'>";
			echo myTextForm("index.php?op=fileedit&fileid=$lid" , "X");
			echo "</td><td bgcolor='$colorswitch' align='center'>";
			echo myTextForm("brokendown.php?op=delBrokenDownloads&lid=$lid" , "X");
			echo "</td></tr>";
			if ($colorswitch=="#dddddd") {
				$colorswitch="#ffffff";
			} else {
				$colorswitch="#dddddd";
			}
		}
                echo "</table>";
	}
	echo"</td></tr></table>";

}

function delBrokenDownloads() 
{

//foreach ($HTTP_GET_VARS as $k => $v) {
//	${$k} = $v;
//}

	global $xoopsDB, $eh;
	
	global $wfsTableBroken;	// add

	$lid = $_GET['lid'];

// easy to rename module and table
//	$sql = sprintf("DELETE FROM %s WHERE lid = %u", $xoopsDB->prefix("wfs_broken"), $lid);
	$sql = sprintf("DELETE FROM %s WHERE lid = %u", $xoopsDB->prefix($wfsTableBroken), $lid);

	$xoopsDB->query($sql) or $eh->show("0013");
	$sql = sprintf("DELETE FROM %s WHERE lid = %u", $xoopsDB->prefix("mydownloads_downloads"), $lid);
	$xoopsDB->query($sql) or $eh->show("0013");
	redirect_header("brokendown.php?op=default",1,_AM_FILEDELETED);
}

function ignoreBrokenDownloads() 
{

	global $xoopsDB, $eh;

	global $wfsTableBroken;	// add

// easy to rename module and table
//	$sql = sprintf("DELETE FROM %s WHERE lid = %u", $xoopsDB->prefix("wfs_broken"), $_GET['lid']);
	$sql = sprintf("DELETE FROM %s WHERE lid = %u", $xoopsDB->prefix($wfsTableBroken), $_GET['lid']);

	$xoopsDB->query($sql) or $eh->show("0013");
	redirect_header("brokendown.php?op=default",1,_AM_BROKENDELETED);
}

// --------------------------------------------------------

switch($op)
{
		case "listBrokenDownloads":
		case "default":
			listBrokenDownloads();
			break;
		case "delBrokenDownloads":
			delBrokenDownloads();
			break;
		case "ignoreBrokenDownloads":
			ignoreBrokenDownloads();
			break;
}

xoops_cp_footer();

?>