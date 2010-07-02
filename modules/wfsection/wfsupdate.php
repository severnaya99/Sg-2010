<?php

include("header.php");

global $xoopsDB,$xoopsConfig;
include(XOOPS_ROOT_PATH."/header.php");


function install_header(){
?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
	<html>
	<head>
	<title>WF-Section Upgrade</title>
	<meta http-equiv="Content-Type" content="text/html; charset=">
	<meta name="AUTHOR" content="WFSECTIONS">
	<meta name="GENERATOR" content="WFSECTION---->http://wfsections.xoops2.com">
	</head>
	<body>
	<br /><br /><div style='text-align:center'><img src='./images/logo.gif' /><h4>WF-Section Update</h4>
<?php
}

function install_footer(){
?>
	<br /><br /><a href='http://wfsections.xoops2.com/' target='_blank'><img src='images/wfs_slogo.gif' alt='XOOPS' border='0' /></a></div>
	</body>
	</html>
<?php

}

//echo "Welcome to the WF-Section update script";

foreach ($HTTP_POST_VARS as $k => $v) {
	${$k} = $v;
}

foreach ($HTTP_GET_VARS as $k => $v) {
	${$k} = $v;
}

if ( !isset($action) || $action == "" ) {
	$action = "message";
}

if ( $action == "message" ) {
	install_header();
	echo "
  <table width='100%' border='0'>
  <tr>
    <td align='center'><b>Welcome to the WF-Section Update script</b></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>";

	echo "
	<table width='50%' border='0'><tr><td colspan='2'>This script will upgrade WF-Sections from version 0.61 upwards. <br><br><b>Before upgrading Wf-Section, make sure that you have:<b></td></tr>

	<tr><td></td><td >Uploaded all the contents of the WF-Section package to your server! </td></tr>
	<tr><td></td><td><span style='color:#ff0000;font-weight:bold;'>Created a back-up your database. Very Important!!</span></td></tr>
	</table>
	";
	echo "<p>Press the button below to start the upgrade process.</p>";
	echo "<form action='".$HTTP_SERVER_VARS['PHP_SELF']."' method='post'><input type='submit' value='Start Upgrade' /><input type='hidden' value='upgrade' name='action' /></form>";
	install_footer();
include_once(XOOPS_ROOT_PATH."/footer.php");	
//	exit();
}


//  THIS IS THE UPDATE DATABASE FROM HERE!!!!!!!!! DO NOT TOUCH THIS!!!!!!!!


if ( $action == "upgrade" ) {
install_header();
$error = array();
$altertable = "Skipped altering table ";
$reason = ", field exists in database.";
//update category


//ADD Broken files table

$result = $xoopsDB->queryF("SELECT * FROM ".$xoopsDB->prefix("wfs_broken")." ");
if ($result) {
	$error[] = "Skipped! Creating table <b>".$xoopsDB->prefix("wfs_broken")."</b>, it already exist.";
}else{
	$xoopsDB->queryF("CREATE TABLE `".$xoopsDB->prefix("wfs_broken")."` (
  	reportid int(5) NOT NULL auto_increment,
  	lid int(11) unsigned NOT NULL default '0',
  	sender int(11) unsigned NOT NULL default '0',
  	ip varchar(20) NOT NULL default '',
  	PRIMARY KEY  (reportid),
  	KEY lid (lid),
  	KEY sender (sender),
  	KEY ip (ip)
	)");

	#
	# Dumping data for table '".$xoopsDB->prefix(groups_users_link'
	#

	# --------------------------------------------------------	

	$nonerror[] = "Database <b>".$xoopsDB->prefix("wfs_broken")."</b> created.";
}
// End ADD Broken files table


//ADD vote data table
$result = $xoopsDB->queryF("SELECT * FROM ".$xoopsDB->prefix("wfs_votedata")." ");
if ($result) {
	$error[] = "Skipped! Creating table <b>".$xoopsDB->prefix("wfs_votedata")."</b>, it already exist.";
}else{
  $xoopsDB->queryF("CREATE TABLE `".$xoopsDB->prefix("wfs_votedata")."` (
  ratingid int(11) unsigned NOT NULL auto_increment,
  lid int(11) unsigned NOT NULL default '0',
  ratinguser int(11) NOT NULL default '0',
  rating tinyint(3) unsigned NOT NULL default '0',
  ratinghostname varchar(60) NOT NULL default '',
  ratingtimestamp int(10) NOT NULL default '0',
  PRIMARY KEY  (ratingid),
  KEY ratinguser (ratinguser),
  KEY ratinghostname (ratinghostname),
  KEY lid (lid) 
  )");

  #
  # Dumping data for table '".$xoopsDB->prefix(groups_users_link'
  #

  # --------------------------------------------------------

  $nonerror[] = "Database <b>".$xoopsDB->prefix("wfs_votedata")."</b> created.";
}  

// Here we go, this is to check that the WFS_CONFIG database exists and do wonderfull things to it if it does or just create the bloody thing!

$result = $xoopsDB->queryF("SELECT * FROM ".$xoopsDB->prefix("wfs_config")." ");

// we check to see if articlesapage exists, this will determine if the database really exists or not!
if ($result) {
	//Let them know that the database esists!
	$error[] = "Skipped! Creating table <b>".$xoopsDB->prefix("wfs_config")."</b>, it already exists.";
	
	// first drop obsolete fields
	$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_config")." DROP rightblock");
	if (!$result) {
		$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_config")."</b> rightblock field does not exist and does not need removing.";
	}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_config")." rightblock removed'.";
	}

	$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_config")." DROP blockicon");
	if (!$result) {
		$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_category")."</b> blockicon field does not exist and does not need removing.";
	}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_config")." blockicon removed'.";
	}

	$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_config")." DROP turnoffline");
	if (!$result) {
		$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_category")."</b> turnoffline field does not exist and does not need removing.";
	}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_config")." turnoffline removed'.";
	}
	// end drop wfs_config fields 

	//As the database exists, we need to take the current values and store them! 
	$result = $xoopsDB->queryF("SELECT htmlpath FROM ".$xoopsDB->prefix("wfs_config")." ");
	if (!$result) {
		$xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_config")." ADD htmlpath varchar(255) NOT NULL default 'modules/wfsection/html' AFTER smiliepath");
	}
	
	$result = $xoopsDB->queryF("SELECT anonpost FROM ".$xoopsDB->prefix("wfs_config")." ");
	if (!$result) {
		$xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_config")." ADD anonpost int(10) NOT NULL default '0' AFTER showMupdated");
	}

	$result = $xoopsDB->queryF("SELECT notifysubmit FROM ".$xoopsDB->prefix("wfs_config")." ");
	if (!$result) {
		$xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_config")." ADD notifysubmit int(10) NOT NULL default '0' AFTER anonpost");
	}	

	$result = $xoopsDB->queryF("SELECT shortart FROM ".$xoopsDB->prefix("wfs_config")." ");
	if (!$result) {
		$xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_config")." ADD shortart int(10) NOT NULL default '0' AFTER notifysubmit");
	}	

	$result = $xoopsDB->queryF("SELECT shortcat FROM ".$xoopsDB->prefix("wfs_config")." ");
	if (!$result) {
		$xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_config")." ADD shortcat int(10) NOT NULL default '0' AFTER shortart");
	}

	$result = $xoopsDB->queryF("SELECT novote FROM ".$xoopsDB->prefix("wfs_config")." ");
	if (!$result) {
		$xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_config")." ADD novote int(10) NOT NULL default '1' AFTER shortcat");
	}

	$result = $xoopsDB->queryF("SELECT realname FROM ".$xoopsDB->prefix("wfs_config")." ");
	if (!$result) {
		$xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_config")." ADD realname int(10) NOT NULL default '0' AFTER novote");
	}

	$result = $xoopsDB->queryF("SELECT indexheading FROM ".$xoopsDB->prefix("wfs_config")." ");
	if (!$result) {
		$xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_config")." ADD indexheading varchar(255) NOT NULL default 'WF-Sections' AFTER realname");
	}

	$result = $xoopsDB->queryF("SELECT indexheader FROM ".$xoopsDB->prefix("wfs_config")." ");
	if (!$result) {
		$xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_config")." ADD indexheader text NOT NULL AFTER indexheading");
	}

	$result = $xoopsDB->queryF("SELECT indexfooter FROM ".$xoopsDB->prefix("wfs_config")." ");
	if (!$result) {
		$xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_config")." ADD indexfooter varchar(255) NOT NULL default '' AFTER indexheader");
	}

	$result = $xoopsDB->queryF("SELECT groupid FROM ".$xoopsDB->prefix("wfs_config")." ");
	if (!$result) {
		$xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_config")." ADD groupid varchar(255) NOT NULL default '1 2 3' AFTER indexfooter");
	}

	$result = $xoopsDB->queryF("SELECT indeximage FROM ".$xoopsDB->prefix("wfs_config")." ");
	if (!$result) {
		$xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_config")." ADD indeximage varchar(255) NOT NULL default 'logo.gif' AFTER groupid");
	}

	$result = $xoopsDB->queryF("SELECT noicons FROM ".$xoopsDB->prefix("wfs_config")." ");
	if (!$result) {
		$xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_config")." ADD noicons int(10) NOT NULL default '1' AFTER indeximage");
	}

	$result = $xoopsDB->queryF("SELECT summary FROM ".$xoopsDB->prefix("wfs_config")." ");
	if (!$result) {
		$xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_config")." ADD summary varchar(255) NOT NULL default '1' AFTER noicons");
	}

	$result = $xoopsDB->queryF("SELECT aidxpathtype FROM ".$xoopsDB->prefix("wfs_config")." ");
	if (!$result) {
		$xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_config")." ADD aidxpathtype tinyint(4) NOT NULL default '1' AFTER summary");
	}

	$result = $xoopsDB->queryF("SELECT aidxorder FROM ".$xoopsDB->prefix("wfs_config")." ");
	if (!$result) {
		$xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_config")." ADD aidxorder varchar(32) NOT NULL default 'weight' AFTER aidxpathtype");
	}

	$result = $xoopsDB->queryF("SELECT selmimetype FROM ".$xoopsDB->prefix("wfs_config")." ");
	if (!$result) {
		$xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_config")." ADD selmimetype text NOT NULL AFTER aidxorder");
		$xoopsDB->queryF("UPDATE ".$xoopsDB->prefix("wfs_config")." set selmimetype = 'doc lha lzh pdf gtar swf tar tex texinfo texi zip Zip au XM snd mid midi kar mpga mp2 mp3 aif aiff aifc m3u ram rm rpm ra wav wax bmp gif ief jpeg jpg jpe png tiff tif ico pbm ppm rgb xbm xpm css html htm asc txt rtx rtf mpeg mpg mpe qt mov mxu avi'");
	}

	$result = $xoopsDB->queryF("SELECT wfsmode FROM ".$xoopsDB->prefix("wfs_config")." ");
	if (!$result) {
		$xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_config")." ADD wfsmode varchar(50) NOT NULL default '666' AFTER selmimetype");
	}

	$result = $xoopsDB->queryF("SELECT imgwidth FROM ".$xoopsDB->prefix("wfs_config")." ");
	if (!$result) {
		$xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_config")." ADD imgwidth int(10) NOT NULL default '100' AFTER wfsmode");
	}

	$result = $xoopsDB->queryF("SELECT imgheight FROM ".$xoopsDB->prefix("wfs_config")." ");
	if (!$result) {
		$xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_config")." ADD imgheight int(10) NOT NULL default '100' AFTER imgwidth");
	}

	$result = $xoopsDB->queryF("SELECT filesize FROM ".$xoopsDB->prefix("wfs_config")." ");
	if (!$result) {
		$xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_config")." ADD filesize int(10) NOT NULL default '2097152' AFTER imgheight");
	}
	
	$result = $xoopsDB->queryF("SELECT picon FROM ".$xoopsDB->prefix("wfs_config")." ");
	if (!$result) {
		$xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_config")." ADD picon int(10) NOT NULL default '1' AFTER filesize");
	}
			
}else{

	// ok so no database then, start all this lot here

	// Start Create wfs_config table.
  	$result = $xoopsDB->queryF("CREATE TABLE `".$xoopsDB->prefix('wfs_config')."` (
  	articlesapage int(10) NOT NULL default '10',
  	filesbasepath varchar(255) NOT NULL default '',
  	graphicspath varchar(255) NOT NULL default '',
  	sgraphicspath varchar(255) NOT NULL default '',
  	smiliepath varchar(255) NOT NULL default '',
  	htmlpath varchar(255) NOT NULL default '',
  	toppagetype varchar(255) NOT NULL default '',
  	wysiwygeditor int(10) NOT NULL default '1',
  	showcatpic int(10) NOT NULL default '0',
  	comments int(10) NOT NULL default '0',
  	blockscroll int(10) NOT NULL default '0',
  	blockheight int(10) NOT NULL default '50',
  	blockamount int(10) NOT NULL default '5',
  	blockdelay int(10) NOT NULL default '1',
  	submenus int(10) NOT NULL default '0',
  	webmstonly int(10) NOT NULL default '0',
  	lastart int(10) NOT NULL default '10',
  	numuploads int(10) NOT NULL default '5',
  	timestamp text NOT NULL default '',
  	autoapprove int(10) NOT NULL default '0',
  	showauthor int(10) NOT NULL default '1',
  	showcomments int(10) NOT NULL default '1',
  	showfile int(10) NOT NULL default '1',
  	showrated int(10) NOT NULL default '1',
  	showvotes int(10) NOT NULL default '1',
  	showupdated int(10) NOT NULL default '1',
  	showhits int(10) NOT NULL default '1',
  	showMarticles int(10) NOT NULL default '1',
  	showMupdated int(10) NOT NULL default '1',
  	anonpost int(10) NOT NULL default '0',
  	notifysubmit int(10) NOT NULL default '0',
  	shortart int(10) NOT NULL default '0',
  	shortcat int(10) NOT NULL default '0',
  	novote int(10) NOT NULL default '1',
  	realname int(10) NOT NULL default '0',
  	indexheading varchar(255) NOT NULL default '',
  	indexheader text NOT NULL default '',
  	indexfooter text NOT NULL default '',
  	groupid varchar(255) NOT NULL default '1 2 3',
  	indeximage varchar(255) NOT NULL default '',
  	noicons int(10) NOT NULL default '1',
  	summary varchar(255) NOT NULL default '1',
  	aidxpathtype tinyint(4) NOT NULL default '0',
  	aidxorder varchar(32) NOT NULL default 'title ASC',
  	selmimetype text NOT NULL default '',
  	wfsmode varchar(50) NOT NULL default '666',
  	imgwidth int(10) NOT NULL default '100',
  	imgheight int(10) NOT NULL default '100',
  	filesize int(10) NOT NULL default '1048576',
  	picon int(10) NOT NULL default '1'
	)");
	#
	# Dumping data for table `xoops_wfs_config`
	#
	if ($result) {
	$xoopsDB->query("INSERT INTO  ".$xoopsDB->prefix("wfs_config")." set 
				articlesapage   = '10', 
				filesbasepath	= 'modules/wfsection/cache/uploaded',
				graphicspath	= 'modules/wfsection/images/article',
				sgraphicspath   = 'modules/wfsection/images/category',
				smiliepath		= 'uploads',
				htmlpath 		= 'modules/wfsection/html',
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
				indexheader 	= 'This is a header',
				indexfooter 	= 'This is a footer',
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
	# --------------------------------------------------------
	}
	// on error check to see if table exists
	if (!$result) {
		$error[] = "Skipped! Creating table <b>".$xoopsDB->prefix("wfs_config")."</b>, it already exists.";
	}else{
		// if wfs_config database exists populate the fields
		$nonerror[] = "Database <b>".$xoopsDB->prefix("wfs_config")."</b> created and fields inserted ";
	}

}
// Drop Comments table, no longer needed.
$result = $xoopsDB->queryF("DROP TABLE ".$xoopsDB->prefix("wfs_comments")." ");
	if (!$result) {
		$error[] = "Skipped! Table <b>".$xoopsDB->prefix("wfs_comments")."</b> does not exist and does not need removing.";
	}else{
		$nonerror[] = "Database <b>".$xoopsDB->prefix("wfs_comments")."</b> was found and removed";
	}
// End Drop Comments table.

// Alter category table, adding new fields required.
$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_category")." ADD catdescription text NOT NULL");
	if (!$result) {
		$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_category")."</b>$reason";
	}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_category")." catdescription added.";
	}

$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_category")." ADD catfooter text NOT NULL");
	if (!$result) {
		$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_category")."</b>$reason";
	}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_category")." catfooter added.";
	}

$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_category")." ADD displayimg int(10) NOT NULL default '0'");
	if (!$result) {
		$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_category")."</b>$reason";
	}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_category")." displayimg added.";
	}

$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_category")." ADD orders int(4) NOT NULL default '1'");
	if (!$result) {
		$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_category")."</b>$reason";
	}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_category")." orders added.";
	}

$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_category")." ADD groupid varchar(255) NOT NULL default '1 2 3'");
	if (!$result) {
		$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_category")." MODIFY groupid varchar(255) ");
		if (!$result) {
			$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_category")."</b>$reason";
		}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_category")." groupid modified.";
		}
	}

$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_category")." ADD editaccess varchar(255) NOT NULL default '1 2 3'");
	if (!$result) {
		$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_category")."</b>$reason";
	}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_category")." catfooter added.";
	}

$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_category")." DROP permission");
	if (!$result) {
		$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_category")."</b>, permission field does not exist and does not need removing.";
	}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_category")." permission's removed'.";
	}

$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_category")." DROP gdescription");
	if (!$result) {
		$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_category")."</b>, gdescription field does not exist and does not need removing.";
	}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_category")." gdescription's removed.";
	}
// End add category table.

//update articles
$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_article")." DROP orders");
	if (!$result) {
		$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_category")."</b>, gdescription field does not exist and does not need removing.";
	}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_category")." gdescription's removed.";
	}

$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_article")." ADD page int(8) unsigned NOT NULL default '1'");
	if (!$result) {
		$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_article")."</b>$reason";
	}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_article")." page added.";
	}

$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_article")." ADD groupid varchar(255) NOT NULL default '1 2 3'");
	if (!$result) {
		$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_article")." MODIFY groupid varchar(255) ");
		if (!$result) {
			$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_article")."</b>$reason";
		}else{
			$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_article")." groupid modified.";
		}
	}

$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_article")." ADD submit int(10) NOT NULL default '1'");
	if (!$result) {
		$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_article")."</b>$reason";
	}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_article")." submit added.";
	}

$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_article")." ADD published int(10) NOT NULL default '0'");
	if (!$result) {
		$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_article")."</b>$reason";
	}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_article")." published added.";
	}

$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_article")." ADD expired int(10) NOT NULL default '0'");
	if (!$result) {
		$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_article")."</b>$reason";
	}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_article")." expired added.";
	}

$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_article")." ADD notifypub tinyint(1) NOT NULL default '0'");
	if (!$result) {
		$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_article")."</b>$reason";
	}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_article")." notifypub added.";
	}

$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_article")." ADD type varchar(5) NOT NULL default ''");
	if (!$result) {
		$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_article")."</b>$reason";
	}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_article")." type added.";
	}  

$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_article")." ADD ishtml int(10) NOT NULL default '0'");
	if (!$result) {
		$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_article")."</b>$reason";
	}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_article")." ishtml added.";
	}  

$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_article")." ADD htmlpage varchar(255) NOT NULL default ''");
	if (!$result) {
		$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_article")."</b>$reason";
	}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_article")." htmlpage added.";
	}

$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_article")." ADD rating double(6,4) NOT NULL default '0.0000'");
	if (!$result) {
		$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_article")."</b>$reason";
	}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_article")." rating added.";
	}   

$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_article")." ADD votes int(11) unsigned NOT NULL default '0'");
	if (!$result) {
		$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_article")."</b>$reason";
	}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_article")." votes added.";
	}

$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_article")." ADD hits int(11) unsigned NOT NULL default '0'");
	if (!$result) {
		$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_article")."</b>$reason";
	}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_article")." hits added.";
	}

$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_article")." ADD urlname varchar(255) NOT NULL default ''");
	if (!$result) {
		$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_article")."</b>$reason";
	}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_article")." urlname added.";
	}

$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_article")." ADD offline int(10) NOT NULL default '0'");
	if (!$result) {
		$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_article")."</b>$reason";
	}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_article")." offline added.";
	}  

$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_article")." ADD weight int(4) NOT NULL default '1'");
	if (!$result) {
		$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_article")."</b>$reason";
	}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_article")." weight added.";
	}  

$result = $xoopsDB->queryF("ALTER TABLE ".$xoopsDB->prefix("wfs_article")." ADD noshowart int(10) NOT NULL default '0'");
	if (!$result) {
		$error[] = "".$altertable."<b>".$xoopsDB->prefix("wfs_article")."</b>$reason";
	}else{
		$nonerror[] = "Database altered - ".$xoopsDB->prefix("wfs_article")." noshowart added.";
	} 


echo "<p>...Updating</p>\n";
if ( count($error) ) {
	//echo "<p><span style='color:#ff0000;font-weight:bold'>There was an error while updating MySQL database tables.<br>If you are upgrading from version 7 upwards please ignore these errors,<br />Otherwise please contact the support team at <a href='http://www.soundsstudio.co.uk/wfsection/'>WF-Section</a>.</span></p>\n";
	foreach( $error as $err ) {
		echo $err."<br>";
	}
}
if ( count($nonerror) ) {
	echo "<p><span style='color:#0000FF;font-weight:bold'>There where updates made to your database. <br />Any questions? Please contact the support team at the <br><h4><a href='http://wfsections.xoops2.com'>WF-Section website</a></h4></span></p>\n";
	foreach( $nonerror as $nonerr ) {
		echo $nonerr."<br>";
	}
}
	echo "<p><span> <a href=''>Finish update</a></span></p>\n";

include_once(XOOPS_ROOT_PATH."/footer.php");
}
?>
