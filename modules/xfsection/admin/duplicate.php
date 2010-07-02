<?php
// $Id: duplicate.php,v 1.4 2006/03/20 03:23:03 ohwada Exp $

// 2006-03-17 K.OHWADA
// $HTTP_POST_VARS   -> $_POST
// $HTTP_GET_VARS    -> $_GET

// 2005-06-20 K.OHWADA
// check OS
// not change XFS_xx in blocks
// data.inc.php
// chmod

// 2004/03/28 K.OHWADA

//=================================================
// duplicate module
// Date:   2003/10/11
// Author: Kenichi OHWADA
// URL:    http://linux.ohwada.net/
// Email:  linux@ohwada.net
//=================================================

include '../../../mainfile.php';
include '../../../include/cp_header.php';

global $xoopsDB,$xoopsUser,$xoopsModule;
xoops_cp_header();

// check permission
$flag = false;
if ($xoopsUser && $xoopsUser->isAdmin()) 
{	$flag = true;	}

if (!$flag)
{
	echo "<font color=red>you are not admin</font><br>";
	xoops_cp_footer();
	exit();
}

// check OS
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') 
{
	echo "<font color=red>cannot excute under Windows</font><br>";
	xoops_cp_footer();
	exit();
}

include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/language/'.$xoopsConfig['language'].'/modinfo.php';

	$TITLE = "XFsection : make new module";

// present
	$mod_old  = 'xfsection';
	$pre_old  = 'xfs_';
	$sec_old  = 'XF-';
	$name_old = _MI_XFS_NAME;

// new
	$mod_new  = 'xf2section';
	$pre_new  = 'xfs2_';
	$sec_new  = 'XF2-';
	$name_new = _MI_XFS_NAME."-2";

$op = '';
if (isset($_POST['op'])) $op=$_POST['op'];

if ($op == 'post')
{	post();
	exit();
}

?>
<h4><?php echo $TITLE; ?></h4>

<form action="duplicate.php" method="post">
<input type="hidden" name="op" value="post">

<table>
<tr>
<td valign=top>module name</td>
<td>
<?php echo $mod_old; ?><br>
<input type="text" name="mod" value="<?php echo $mod_new; ?>">
<br><br>
</td>
</tr><tr>
<td valign=top>prefix of tables</td>
<td>
<?php echo $pre_old; ?><br>
<input type="text" name="pre" value="<?php echo $pre_new; ?>">
<br><br>
</td>
</tr><tr>
<td valign=top>section name</td>
<td>
<?php echo $sec_old; ?><br>
<input type="text" name="sec" value="<?php echo $sec_new; ?>">
<br><br>
</td>
</tr><tr>
<td valign=top>name for language</td>
<td>
<?php echo $name_old; ?><br>
<input type="text" name="name" value="<?php echo $name_new; ?>">
<br><br>
</td>
</tr><tr>
<td></td>
<td><input type="submit" value="duplicate"></td>
</tr></table>

</form>

<hr>
<div align="center">
<a href="index.php">[admin menu]</a>
</div>
<?php

	xoops_cp_footer();
	exit();
// main end

function post()
{
	global $TITLE;
	global $xoopsConfig;
	global $mod_old, $pre_old, $sec_old, $name_old;

	xoops_cp_header();
	echo "<h4>$TITLE</h4>\n";

	$mod_new  = $_POST['mod'];
	$pre_new  = $_POST['pre'];
	$sec_new  = $_POST['sec'];
	$name_new = $_POST['name'];
	
	$lang = $xoopsConfig['language'];

	$dir_old = XOOPS_ROOT_PATH.'/modules/'.$mod_old;
	$dir_new = XOOPS_ROOT_PATH.'/modules/'.$mod_new;

	$pre_old = strtolower($pre_old);
	$pre_new = strtolower($pre_new);

	$word_array_old = array($pre_old, strtoupper($pre_old), $mod_old, $sec_old, $name_old);
	$word_array_new = array($pre_new, strtoupper($pre_new), $mod_new, $sec_new, $name_new);

// not change XFS_xx in blocks
	$word_array_2_old = array($pre_old, $mod_old, $sec_old, $name_old);
	$word_array_2_new = array($pre_new, $mod_new, $sec_new, $name_new);

// --- cpoy module ---
	if (!file_exists($dir_new))
	{
		echo "mkdir $mod_new <br>\n";
		$ret = mkdir($dir_new,0707);
		if (!$ret)
		{	echo "cannot make new module: $mod_new <br>\n";
			echo "please copy module manaualy <br>\n";
			exit();
		}
	}

	echo "copy $mod_old to $mod_new <br>\n";
	system("cp -p -R $dir_old/* $dir_new");

// --- modify ---
	file_modify("$dir_new","xoops_version.php",$word_array_old,$word_array_new);
	file_modify("$dir_new","conf.php",$word_array_old,$word_array_new);

	file_modify("$dir_new/include","search.inc.php",$word_array_old,$word_array_new);

// data.inc.php
	file_modify("$dir_new/include","data.inc.php",$word_array_old,$word_array_new);

	file_modify("$dir_new/language/$lang","admin.php",$word_array_old,$word_array_new);
	file_modify("$dir_new/language/$lang","modinfo.php",$word_array_old,$word_array_new);

	file_modify("$dir_new/language/english","admin.php",$word_array_old,$word_array_new);
	file_modify("$dir_new/language/english","modinfo.php",$word_array_old,$word_array_new);

// --- modify and rename ---
	file_modify_rename("$dir_new/sql","xfsection.sql",$mod_old,$mod_new,$word_array_old,$word_array_new);

	dir_modify_rename("$dir_new/templates",$mod_old,$mod_new);
	dir_modify_rename("$dir_new/templates/blocks",$pre_old,$pre_new,$mod_old,$mod_new);

// not change XFS_xx in blocks
	dir_block_modify_rename("$dir_new/blocks",$pre_old,$pre_new,$word_array_2_old,$word_array_2_new,$mod_new);

// --- rename ---
	file_rename("$dir_new/images","xfs_slogo.gif",$pre_old,$pre_new);

// --- chmod ---
	system("chmod 777 -R $dir_new");

?>
<br><b>finished</b><br>
<hr>
<div align="center">
<a href="../../system/admin.php?fct=modulesadmin">[admin module]</a>
</div>
<?php

	xoops_cp_footer();
	exit();
}

function dir_rename($dir,$pre_old,$pre_new)
{
	$file_array = getFileListAsArray($dir);
	foreach ($file_array as $file) 
	{	if ( preg_match("/^$pre_old/",$file) )
		{	file_rename($dir,$file,$pre_old,$pre_new); }
	}

}

function dir_modify_rename($dir,$pre_old,$pre_new,$word_old='',$word_new='')
{
	$file_array = getFileListAsArray($dir);
	foreach ($file_array as $file) 
	{	if ( preg_match("/^$pre_old/",$file) )
		{	file_modify_rename($dir,$file,$pre_old,$pre_new,$word_old,$word_new); }
	}

}

function dir_block_modify_rename($dir,$pre_old,$pre_new,$word_old,$word_new,$mod_new)
{
	$file_array = getFileListAsArray($dir);
	foreach ($file_array as $file) 
	{	if ( preg_match("/^$pre_old/",$file) )
		{	file_block_modify_rename($dir,$file,$pre_old,$pre_new,$word_old,$word_new,$mod_new); }
	}

}

function file_rename($dir,$file_org,$pre_old,$pre_new)
{
	$file_new = preg_replace("/^$pre_old/",$pre_new,$file_org); 
	rename("$dir/$file_org","$dir/$file_new");

	echo "rename $dir/$file_org<br>&nbsp;&nbsp; to $dir/$file_new<br>\n";
}

function file_modify_rename($dir,$file_org,$pre_old,$pre_new,$word_old='',$word_new='')
{
// modify orginal file
	if(!$word_old) { $word_old = $pre_old; }
	if(!$word_new) { $word_new = $pre_new; }
	$text_new = text_modify("$dir/$file_org",$word_old,$word_new);

// backup orginal file
	rename("$dir/$file_org","$dir/$file_org.org");

// write back to orginal file
	$file_new = preg_replace("/^$pre_old/",$pre_new,$file_org); 

	if ( file_write("$dir/$file_new",$text_new) )
	{	echo "modify and rename $dir/$file_org<br>&nbsp;&nbsp; to $dir/$file_new<br>\n";	}

}

function file_modify($dir,$file_org,$pre_old,$pre_new)
{
// modify orginal file
	$text_new = text_modify("$dir/$file_org",$pre_old,$pre_new);

// backup orginal file
	rename("$dir/$file_org","$dir/$file_org.org");

// write back to orginal file
	if ( file_write("$dir/$file_org",$text_new) )
	{	echo "modify $dir/$file_org<br>\n";	}
}

function file_block_modify_rename($dir,$file_org,$pre_old,$pre_new,$word_old,$word_new,$mod_new)
{
// read orginal file
	$text_array_old = file("$dir/$file_org");

// modify orginal file
	$text_new = '';
	foreach ($text_array_old as $text)
	{	if ( preg_match('/wfs_module_list.*array/',$text) )
		{	$text = str_replace( ')', ",'$mod_new')", $text); }
		else
		{	$text = str_replace($word_old,$word_new,$text); }
		$text_new .= $text;
	}

// backup orginal file
	rename("$dir/$file_org","$dir/$file_org.org");

// write back to orginal file
	$file_new = preg_replace("/^$pre_old/",$pre_new,$file_org); 

	if ( file_write("$dir/$file_new",$text_new) )
	{	echo "modify and rename $dir/$file_org<br>&nbsp;&nbsp; to $dir/$file_new<br>\n";	}

}

function text_modify($file,$pre_old,$pre_new)
{
// read orginal file
	$text_old = join( file($file), '' );

// modify
	$text_new = str_replace($pre_old,$pre_new,$text_old); 

	return $text_new;
}

function file_write($file,$text)
{
	$fp = fopen($file,"w");
	if ( $fp == NULL )
	{ 	echo "$file: <font color=\"red\">can't open</font><br>\n";
		return false;
	}

	fwrite($fp,$text);
	fclose($fp);

	return true;
}

// same as XoopsLists::getFileListAsArray()
function getFileListAsArray($dirname, $prefix="")
{
	$filelist = array();
	if (substr($dirname, -1) == '/') {
		$dirname = substr($dirname, 0, -1);
	}
	if (is_dir($dirname) && $handle = opendir($dirname)) {
		while (false !== ($file = readdir($handle))) {
			if (!preg_match("/^[.]{1,2}$/",$file) && is_file($dirname.'/'.$file)) {
				$file = $prefix.$file;
				$filelist[$file]=$file;
			}
		}
		closedir($handle);
		asort($filelist);
		reset($filelist);
	}
	return $filelist;
}

?>