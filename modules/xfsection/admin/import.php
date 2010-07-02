<?php
// $Id: import.php,v 1.3 2005/09/06 15:09:55 ohwada Exp $

// 2005-09-06 K.OHWADA
// BUG 6613: dont work correctly in windows
// $HTTP_POST_VARS -> $_POST

// 2004/02/28 K.OHWADA
// add adminmenu flag
// dummy for non multibyte environment
// bug fix
//   double addslashes when magic_quotes_gpc is off 
//   uncomment : $url = XOOPS_URL;

// 2004/01/25 K.OHWADA
// print error message if can't copy image file
// bug fix : japanese -> 'japanese'

// 2003/11/21 K.OHWADA
// multi language
// Shift_JIS -> EUC-JP
// bug
//   title occure error in DB processing, whiche have an escape character

// 2003/10/11 K.OHWADA
// create this file
// import html files to db

//=================================================
// Name:     import.php
// Function: Bulk import of HTML files
// Date:     2003/10/11
// Author:   Kenichi OHWADA
//=================================================

include 'admin_header.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/wfscategory.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/wfsarticle.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/uploadfile.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/include/groupaccess.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/include/htmlcleaner.php';

// dummy for non multibyte environment
if (!extension_loaded('mbstring') && !function_exists('mb_convert_encoding'))
{	include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/include/mb_dummy.php';	
}

$op="";
if (isset($_GET['op']))  $op=$_GET['op'];
if (isset($_POST['op'])) $op=$_POST['op'];

xoops_cp_header();
echo "<div><h4>"._AM_IMPORT."</h4></div>";

$error_flag = false;

if ($op == 'Save')
{	proc_save();	}

else
{
// add adminmenu flag
//	adminmenu();
	if ($wfsAdminMenu) adminmenu();

	register_form();
}

xoops_cp_footer();
exit();


function proc_save()
{
	global $error_flag;

	$dir_src    = $_POST['dir_src'];
	$dir_image  = $_POST['dir_image'];
	$filter     = $_POST['filter'];
	$flag_image = $_POST['image'];
	$flag_copy  = $_POST['image_copy'];
	$flag_test  = $_POST['test'];

	$dir_image_full = XOOPS_ROOT_PATH . $dir_image;

// test mode
	if ($flag_test)	{ echo "<hr>";}

	if ( !file_exists($dir_src) ) 
	{	echo "<font color=red>"._AM_IMPORT_ERRDIREXI."</font><br>$dir_src<br>\n";	
		return;
	}

	if ($filter)
	{	if ( !file_exists($filter) )
		{	echo "<font color=red>"._AM_IMPORT_ERRFILEXI."</font><br>$filter<br>\n"; 
			return;
		}

		if ( !is_executable($filter) )
		{	echo "<font color=red>"._AM_IMPORT_ERRFILEXEC."</font><br>$filter<br>\n"; 
		return;
		}
	}

	if ($flag_image)
	{	if (!$flag_copy)
		{	echo "<font color=red>"._AM_IMPORT_ERRNOCOPY."</font><br>\n";
			return;
		}

		if (!$dir_image)
		{	echo "<font color=red>"._AM_IMPORT_ERRNOIMGDIR."</font><br>\n";
			return;
		}

		if ( file_exists($dir_image_full) && !is_dir($dir_image_full) )
		{	echo "<font color=red>"._AM_IMPORT_ERRIMGDIREXI."</font><br>$dir_image_full<br>\n"; 
			return;
		}
	}
	
	echo "<table><tr><td>\n";
	
	if ( is_dir($dir_src) )
	{	$file_array = XoopsLists::getFileListAsArray($dir_src);
		$dir = dir_name($dir_src);
		foreach ($file_array as $file) { file_proc("$dir/$file"); }
	}
	else
	{	file_proc($dir_src);	}

	echo "</td></tr></table><br>\n";

// test mode
	if ($flag_test)
	{	echo "<hr>\n"; 
		echo "<a href=\"JavaScript:history.back()\">"._AM_IMPORT."</a>";
	}
	elseif($error_flag)
	{	echo "<hr>\n"; 
		echo "<font color=red>unsuccessful !!</font><br><br>\n";	
		echo "<a href=\"allarticles.php\">"._AM_ARTICLEMANAGE."</a><br>";
		echo "<a href=\"JavaScript:history.back()\">"._AM_IMPORT."</a>";
	}
	else
	{	echo "<hr>\n"; 
		echo "<b>"._AM_DBUPDATED."</b><br><br>\n"; 
		echo "<a href=\"allarticles.php\">"._AM_ARTICLEMANAGE."</a>";
	}

}

function file_proc($file)
{

// file exist check
	if ( !file_exists($file) )
	{	echo "$file: <font color=red>"._AM_IMPORT_ERRFILEEXI."</font><br>\n";
		return;
	}

// .html .htm
	elseif ( preg_match('/\.html$/i', $file) || preg_match('/\.htm$/i', $file) )
	{	file_html($file);	}

// .txt
	elseif ( preg_match('/\.txt$/i', $file) )
	{	file_text($file);	}

// .gif .jpg .jpeg .png
	elseif ( preg_match('/\.gif$/i', $file) || preg_match('/\.jp(e?)g$/i', $file) || preg_match('/\.png$/i', $file) )
	{	file_image($file);	}

}

function file_html($file)
{
	global $xoopsModule;
	global $error_flag;

	$filter       = $_POST['filter'];
	$charset      = $_POST['charset'];
	$flag_html    = $_POST['html'];
	$flag_index   = $_POST['index'];
	$flag_link    = $_POST['link'];
	$flag_image   = $_POST['image'];
	$flag_atmark  = $_POST['atmark'];
	$flag_test    = $_POST['test'];
	$test_text    = $_POST['test_text'];
	$dir_image    = $_POST['dir_image'];

// uncomment
	$url    = XOOPS_URL;
	$dir    = $url . dir_name($dir_image);
	$script = $url.'/modules/'.$xoopsModule->dirname().'/article.php?title=';

	list($data,$name,$time) = file_read($file);

// BUG 6613: dont work correctly in windows
// external filter : work only unix
	if ($filter)
	{
		$file_temp = '/tmp/import_'.strftime("%Y%m%d%H%M%S").uniqid('').'.tmp';
		`cat $file | $filter > $file_temp`;
		$data = join( file($file_temp), '' );
		unlink($file_temp);
	}

// $charset = 0, if not Japanese mode
// Shift_JIS -> EUC-JP
	if ( ($charset == '1')&& 
	     ( (preg_match('|<\s*meta\s?.*?charset="Shift_JIS"\s?.*?>|is',$data)||
	       (mb_detect_encoding($data) == 'SJIS') ))||
	   ($charset == '2'))
	{	$data = mb_convert_encoding($data,"EUC-JP","SJIS");	}

// title
	if (preg_match('|<\s*title\s?.*?>(.*)<\s*/\s*title\s*>|is',$data, $match))
	{	$title = ucwords($match[1]);	}

// body
	if (preg_match('|<\s*body\s?.*?>(.*)<\s*/\s*body\s*>|is', $data, $match)) 
	{	$text = $match[1];	}
	else
	{	$text = $data;	}

// delete index.html
	if ($flag_index)
	{	$text = preg_replace('|<\s*a\s?href=[\"\']index\.htm.*?>(.*?)<\s*/\s*a\s*>|is', "$1", $text);	
		$text = preg_replace('|<\s*a\s?href=[\"\']\.\./index\.htm.*?>(.*?)<\s*/\s*a\s*>|is', "$1", $text);
	}

// link
	if ($flag_link)	
//	{	$text = preg_replace('|<\s*a\s?href=[\"\'](?!http)(?!ftp)(.*?)[\"\']\s*>(.*?)<\s*/\s*a\s*>|is', "<a href=\"$script$1\">$2</a>", $text);	}
	{	$text = preg_replace('|<\s*a\s?href=[\"\'](?!http)(?!ftp)(?!#)(.*?)[\"\']\s*>(.*?)<\s*/\s*a\s*>|is', "<a href=\"$script$1\">$2</a>", $text);	}

// image
	if ($flag_image)
	{	$text = preg_replace('|<\s*img\s?src=[\"\'](?!/)(.*?)[\"\']\s*(.*?)\s*>|is', "<img src=\"$dir/$1\" $2>", $text);	}


// atmark
	if ($flag_atmark)
	{	$text = preg_replace('|@|', "&#064;", $text);	}

	if (empty($text))  { $text  = $data;	}
	if (empty($title)) { $title = $name;	}

// test mode
	if ($flag_test)
	{	$date = date("Y/m/d H:i:s",$time);
		echo "$file: $date <br>\n";
		if ($test_text) { echo "$text<br><hr>\n"; }
		return;
	}

	if ( db_store($text,$title,$time) ) 
	{	echo "$file<br>\n";	}
	else 
	{	echo "$file: <font color=red>save failed</font><br>\n";	
		$error_flag = true;	
	}
}

function file_text($file)
{
	global $error_flag;

	$flag_text = $_POST['text'];
	$flag_test = $_POST['test'];
	$test_text = $_POST['test_text'];

	list($data,$name,$time) = file_read($file);

	if ($flag_text) { $text = "<pre>$data</pre>";	}
	else { $text = $data;	}

// test mode
	if ($flag_test)
	{	$date = date("Y/m/d H:i:s",$time);
		echo "$file: $date <br>\n";
		if ($test_text) { echo "$text<br><hr>\n"; }
		return;
	}

	if ( db_store($text,$name,$time) ) 
	{	echo "$file<br>\n";	}
	else 
	{	echo "$file: <font color=red>save failed</font><br>\n";	
		$error_flag = true;	
	}
}

function file_image($file)
{
	global $error_flag;

	$flag_copy = $_POST['image_copy'];
	$flag_test = $_POST['test'];
	$dir_image = $_POST['dir_image'];

	if (!$flag_copy)
	{	echo "$file: none<br>\n"; 
		return;
	}

	$dir_image_full = XOOPS_ROOT_PATH . dir_name($dir_image);
	$file_dest      = $dir_image_full.'/'.basename($file);

// file exist check
	if( file_exists($file_dest) )
	{	echo "$file: <font color=red>already existed</font><br>\n"; 
		return;
	}

// make dir if not exist
	if ( !file_exists($dir_image_full) )
	{
// test mode
		if ($flag_test) { echo "mkdir $dir_image_full: test<br>\n"; }
		else 
		{
// make dir
			if ( mkdir($dir_image_full,0707) )
			{	echo "mkdir $dir_image_full <br>\n";	}
			else
			{	echo "<font color=red>mkdir failed $dir_image_full</font><br>\n";	
				$error_flag = true;
			}
		}
	}

// test mode
	if ($flag_test)
	{	$time = filemtime($file);
		$date = date("Y/m/d H:i:s",$time);
		echo "$file: $date <br> -> $file_dest <br>\n"; 
		return;
	}

// file copy
	if (copy($file, $file_dest)) 
	{	echo "$file <br> -> $file_dest <br>\n";	}
	else
	{	echo "$file: <font color=red>copy failed</font><br>\n";
		$error_flag = true;
	}
}

function file_read($file)
{
	$name = basename($file);
	$time = filemtime($file);
	$data = join( file($file), '' );

	return array($data,$name,$time);
}

function dir_name($dir)
{
	$dir = preg_replace('|/$|', '', $dir);
	return $dir;
}

function db_store($maintext,$title,$time)
{
	global $xoopsUser, $wfsConfig;

	$cid       = $_POST['categoryid'];
	$flag_test = $_POST['test'];

	if ($flag_test) { return; }
	if (!$maintext) { return false; }
	if (!$title)    { return false; }
	if (!$time)     { return false; }
	if (!$cid)      { return false; }

	$article = new WfsArticle();

// bug 
// title occure error in DB processing, whiche have an escape character
//	$article->setTitle($title);

// bug
// double addslashes when magic_quotes_gpc is off 
//	$article->setTitle( addslashes($title) );
//	$article->setMainText( addslashes($maintext) );

	if (get_magic_quotes_gpc()) 
	{
		$title    = addslashes($title);
		$maintext = addslashes($maintext);
	}

	$article->setTitle( $title );
	$article->setMainText( $maintext );

	$article->setPublished($time);
	$article->setCategoryid($cid);
	$article->setUid( $xoopsUser->getvar('uid') );

	$article->settype("admin");
	$article->groupid = saveAccess('1 3 2'); // admin guest user
	$article->setChangeuser(-1);
	$article->setHtmlpage('');
	$article->setWeight(0);
	$article->setExpired(0);
	$article->noshowart = 0;
	$article->nohtml    = 0;
	$article->nosmiley  = 0;
	$article->approved  = 0;
	$article->offline   = 0;
	$article->notifypub = 0;
	$article->ishtml    = 0;
	$article->nobr      = 1;
	$article->enaamp    = 1;

	if ( $article->store() ) { return true; }
	else { return false; }
}

function register_form() 
{
	global $xoopsModule, $xoopsConfig;

	echo "<table width='100%' border='0' cellspacing='0' cellpadding='1'>\n";
        echo "<form action='import.php' method='post' name='coolsus'>\n";

	echo "<div><b>"._WFS_CATEGORY."</b><br>";
        $xt = new WfsCategory();
	$xt->makeSelBox(0, 0, "categoryid");
        echo "</div><br />\n";

	$dir = XOOPS_ROOT_PATH;
	echo "<b>"._AM_IMPORT_DIRNAME."</b><br>";
	echo "<input type='text' name='dir_src' size='70' value=$dir><br><br>\n";

	echo "<b>"._AM_IMPORT_HTMLPROC."</b><br><br>";
	echo _AM_IMPORT_EXTFILTER."<br>";
	echo "<input type='text' name='filter' size='70'><br><br>\n";

// multi language
// bug fix : japanese -> 'japanese'
	if ($xoopsConfig['language'] == 'japanese')
	{	echo _AM_IMPORT_CHARCONV."<br>\n";
		echo "<input type='radio' name='charset' value='0'> ";
		echo _AM_IMPORT_CHARNON."<br>\n";
		echo "<input type='radio' name='charset' value='1' checked> ";
		echo _AM_IMPORT_CHARAUTO."<br>\n";
		echo "<input type='radio' name='charset' value='2'> ";
		echo _AM_IMPORT_CHARFORCE."<br>\n";
		echo "<br>\n";
	}
	else
	{	echo "<input type='hidden' name='charset' value='0'> ";
	}

	echo "<input type='checkbox' name='html' checked> ";
	echo _AM_IMPORT_BODY."<br>\n";

	echo "<input type='checkbox' name='index' checked> ";
	echo _AM_IMPORT_INDEXHTML."<br>\n";

	echo "<input type='checkbox' name='link' checked> ";
	echo _AM_IMPORT_LINK."<br>\n";

	echo "<input type='checkbox' name='image' checked> ";
	echo _AM_IMPORT_IMAGE."<br>\n";

	echo "<input type='checkbox' name='atmark' checked> ";
	echo _AM_IMPORT_ATMARK."<br><br>\n";
	
	echo "<b>"._AM_IMPORT_TEXTPROC."</b><br>";
	echo "<input type='checkbox' name='text' checked> ";
	echo _AM_IMPORT_TEXTPRE."<br><br>\n";

	echo "<b>"._AM_IMPORT_IMAGEPROC."</b><br><br>";
	$dir = '/modules/'.$xoopsModule->dirname().'/images/contents';
	echo _AM_IMPORT_IMAGEDIR."<br>";
	echo XOOPS_ROOT_PATH."<input type='text' name='dir_image' size='50' value=$dir><br><br>\n";

	echo "<input type='checkbox' name='image_copy' checked> ";
	echo _AM_IMPORT_IMAGECOPY."<br><br>\n";

	echo "<b>"._AM_IMPORT_TESTMODE."</b><br>";
	echo _AM_IMPORT_TESTDB."<br>";
	echo "<input type='checkbox' name='test' checked> ";
	echo _AM_IMPORT_TESTEXEC."<br>\n";
	echo "<input type='checkbox' name='test_text' checked> ";
	echo _AM_IMPORT_TESTTEXT."<br><br>\n";

	if(!empty($_POST['referer']))
	{	echo "<input type='hidden' name='referer' value='".$_POST['referer']."' >\n";	}
	elseif (!empty($_SERVER['HTTP_REFERER']))
	{	echo "<input type='hidden' name='referer' value='".$_SERVER['HTTP_REFERER']."' >\n";	}

	echo "<input type='submit' name='op' class='formButton' value='Save' />";
	echo "</form>";
	
	echo "<hr><br>";
	echo _AM_IMPORT_EXPLANE;

	echo "</td></tr></table>";
}

?>