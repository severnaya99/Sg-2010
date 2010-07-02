<?php
// $Id: conf.php,v 1.2 2005/06/20 15:03:23 ohwada Exp $

// 2004/03/27 K.OHWADA
// please turn True, when permit the user to upload file
// max file size of upload (B)
// not check mine type of upload file
// unuse $wfsMailCode

// 2004/02/28 K.OHWADA
// don't display admin menu
// inhibit all user to submit article

// 2004/01/25 K.OHWADA
// permit the auther to modify article
// convert EUC-JP to SJIS

// 2003/11/21 K.OHWADA
// wiki-like url link

// 2003/10/02 K.OHWADA
// create this file

// module name
$wfsTitle    = 'XF-Section';;
$wfsModule   = 'xfsection';

// table name
$wfsTableComments = 'xfs_comments';
$wfsTableArticle  = 'xfs_article';
$wfsTableCategory = 'xfs_category';
$wfsTableFiles    = 'xfs_files';
$wfsTableConfig   = 'xfs_config';
$wfsTableBroken   = 'xfs_broken';
$wfsTableVotedata = 'xfs_votedata';

// html file name
$wfsHtmlArticle = 'xfsection_article.html';
$wfsHtmlTopten  = 'xfsection_topten.html';
$wfsHtmlHtmlart = 'xfsection_htmlart.html';

// please turn on 1, when use wiki-like url link
$wfsWiki = 0;

// please turn on 1, when permit the auther to modify article
$wfsAutherEdit = 0;

// please turn on 1, when inhibit all user to submit article
$wfsSubmitInihibit = 0;

// please turn on 1, when permit the user to upload file
$wfsPermitUpload = 0;

// max file size of upload (B)
$wfsUploadSize   = 50000;	// 50KB

// please turn on 1, when Admin does not check mine type of upload file
$wfsAdminNotCheckMineType = 0;

// please turn on 1, when User does not check mine type of upload file
$wfsUserNotCheckMineType  = 0;

// please turn off 0, when don't display admin menu
$wfsAdminMenu = 1;

// --- Japanese only ---
// please turn on 1, when convert EUC-JP to SJIS at at tel a frined
//$wfsMailCode = 0;

?>