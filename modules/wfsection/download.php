<?php
// $Id: download.php,v 1.5 Date: 06/01/2003, Author: Catzwolf Exp $

include 'header.php';

foreach ($HTTP_POST_VARS as $k => $v) {
	${$k} = $v;
}

foreach ($HTTP_GET_VARS as $k => $v) {
	${$k} = $v;
}

if ( empty($fileid) ) {
	redirect_header("index.php");
}

include XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/wfsfiles.php';

Global $wfsConfig;

if (empty($wfsConfig['filesbasepath'])) {
        $workdir = XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/cache/uploaded";
} else {
        $workdir = XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath']."/";
}

$file = new WfsFiles($fileid);
$filename = $file->getFileRealName();

if (!is_readable($workdir."/".$filename)) {
        redirect_header(XOOPS_URL."/modules/".$xoopsModule->dirname()."/index.php?articleid=".$file->getArticleid(),1,_WFS_NOFILE);
        exit();
}

$size=filesize($workdir."/".$filename);
$dlfilename = $file->getDownloadname();
if (empty($dlfilename)) $dlfilename=$fileid.".".$file->getExt();

if (strstr($HTTP_SERVER_VARS["HTTP_USER_AGENT"], "MSIE")) {      // For IE
        if (file_exists(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/language/".$xoopsConfig['language']."/convert.php")) {
                $langdir = XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/language/".$xoopsConfig['language'];
        } else {
                $langdir = XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/language/english";
        }
        include_once($langdir."/convert.php");
        $dlfilename = WfsConvert::filenameForWin($dlfilename);

        header("Content-Type: ".$file->getMinetype());
        header("Content-Length: $size");

        header("Cache-control: private");
        header("Content-Disposition: attachment; filename=$dlfilename");
}
else {  // For Other browsers
        header("Content-Type: ".$file->getMinetype());
        header("Content-Length: $size");
        if (preg_match("/[^a-zA-Z0-9_\-\.]/",$dlfilename)) $dlfilename=$fileid.".".$file->getExt();
        header("Content-Disposition: attachment; filename=\"$dlfilename\"");

        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
}

readfile($workdir."/".$filename);
$file->updateCounter();

?>