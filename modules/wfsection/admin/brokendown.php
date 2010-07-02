<?php
// WFSECTION
// Powerfull Section Module for XOOPS
//
// $Id: index.php,v 1.7 Date: 06/01/2003, Author: Catzwolf Exp $
//
// Admin Main

include 'admin_header.php';
include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/class/wfscategory.php");
include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/class/wfsarticle.php");
include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/class/uploadfile.php");
include_once(XOOPS_ROOT_PATH."/class/module.errorhandler.php");

foreach ($HTTP_POST_VARS as $k => $v) {
	${$k} = $v;
}

foreach ($HTTP_GET_VARS as $k => $v) {
	${$k} = $v;
}

function listBrokenDownloads()
{
	global $xoopsDB, $eh;
	$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("wfs_broken")." ORDER BY reportid");
	$totalbrokendownloads = $xoopsDB->getRowsNum($result);

	xoops_cp_header();

	echo "<h4>"._AM_DLCONF."</h4>";
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
			$result2 = $xoopsDB->query("SELECT fileshowname FROM ".$xoopsDB->prefix("wfs_files")." WHERE fileid=$lid");
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

function delBrokenDownloads() {

foreach ($HTTP_GET_VARS as $k => $v) {
	${$k} = $v;
}
	global $xoopsDB, $HTTP_GET_VARS, $eh;
	$lid = $HTTP_GET_VARS['lid'];
	$sql = sprintf("DELETE FROM %s WHERE lid = %u", $xoopsDB->prefix("wfs_broken"), $lid);
	$xoopsDB->query($sql) or $eh->show("0013");
	$sql = sprintf("DELETE FROM %s WHERE lid = %u", $xoopsDB->prefix("mydownloads_downloads"), $lid);
	$xoopsDB->query($sql) or $eh->show("0013");
	redirect_header("brokendown.php?op=default",1,_AM_FILEDELETED);
}

function ignoreBrokenDownloads() {

	global $xoopsDB, $HTTP_GET_VARS, $eh;
	$sql = sprintf("DELETE FROM %s WHERE lid = %u", $xoopsDB->prefix("wfs_broken"), $HTTP_GET_VARS['lid']);
	$xoopsDB->query($sql) or $eh->show("0013");
	redirect_header("brokendown.php?op=default",1,_AM_BROKENDELETED);
}

switch($op){

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
