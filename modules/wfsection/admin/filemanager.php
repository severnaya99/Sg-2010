<?PHP
include 'admin_header.php';
include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/class/common.php");
include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/class/uploadfile.php");
include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/class/mimetype.php");
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/include/functions.php';

foreach ($HTTP_POST_VARS as $k => $v) 
{
	${$k} = $v;
}

foreach ($HTTP_GET_VARS as $k => $v) 
{
	${$k} = $v;
}

$myts =& MyTextSanitizer::getInstance();

global $xoopsConfig, $xoopsModule, $wfsConfig, $dirlist, $dirpath, $HTTP_GET_VARS;

$root = XOOPS_ROOT_PATH; 	//root of webserver
$url = XOOPS_URL; //http of web server
$urlpath = $_SERVER["PHP_SELF"]; //Url for links


//check to see if $dirpath is set, if not set it to default:
if (!isset($rootpath)) {  //if $dirpath is  not set, set it here
	$dirpath = $root;
	$selected = '';
} else {
	$dirpath = $rootpath;  //
	$selected = $dirpath;
} 
$rootURL = str_replace($root, $url, $dirpath);
$dirlist = array();
$filelist = array();
	
	if ($handle = @opendir($dirpath)) {
		// Creates an array with all file names in current directory.
		while (($files = readdir($handle)) !== false) {
			if ($files != "." && $files != ".." && $files != "_private" && strtolower($files) != 'cvs') {
				if (is_dir("{$dirpath}/{$files}")) {
					$dirlist[] = $files;
				} else {
					$filelist[] = $files;
				}
			}
		}
		@closedir($handle);
	    sort($dirlist);
	    reset($dirlist);
		sort($filelist);
	    reset($filelist);
    }
	$dircount = sizeof($dirlist);
	$filecount =sizeof($filelist);

function getDirList($dirname) {
	$dirlist = array();
	if (is_dir($dirname) && $handle = @opendir($dirname)) {
		while (false !== ($files = @readdir($handle))) {
		if ( !preg_match("/^[.]{1,2}$/",$files) ) {
			if (strtolower($files) != 'cvs' && is_dir($dirname.'/'.$files) ) {
			$dirlist[$files] = $dirname.'/'.$files;
			}
		}
	}
	@closedir($handle);
	asort($dirlist);
	reset($dirlist);
	}
	return $dirlist;
}

//returns an array of the files in $dir
function listFiles($dir) {
    $files = array();
    $dir = opendir($dir);
    while (($file = readdir($dir)) !== false) {
	    if ($file != "." && $file != "..") {
    		array_push($files, $file);
    	}
    }
    sort($files);
    closedir($dir);
return $files;
}
//deletes file contents of $dir, then deletes $dir
function killdir($dir) {
    $files = listFiles($dir);
    foreach ($files as $file) {
	    unlink("$dir/$file");
    }
    $confirm = rmdir($dir);
    return $confirm;
}

//image defines 
$folderimg = "<img src=".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/icon/folder.gif ALT='Folder'>";
$dirimg = "<img src=".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/icon/folder.gif ALT='Change Folder'>";
$renameimg = "<img src=".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/icon/rename.gif ALT='Rename file'>";
$editimg = "<img src=".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/icon/edit.gif ALT='Edit file'>";
$downimg = "<img src=".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/icon/download.gif ALT='Download'>";
$deleteimg = "<img src=".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/icon/delete.gif ALT='Delete File'>";
$viewimg = "<img src=".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/icon/view.gif ALT='View File'>";
$home = "<img src=".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/icon/home.gif ALT='home'>";
$refresh = "<img src=".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/icon/refresh.gif ALT='refresh'>";
$pathtoimages = "".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/icon/";

$mimetype = new mimetype();

if (isset($HTTP_GET_VARS['file'])) {
	$file = $HTTP_GET_VARS['file'];
}

function filecheck($path = '', $file = '', $namecheck = '', $extra = '') {
	if (!is_valid_name($namecheck)) {
		redirect_header("javascript:history.go(-1)",1, "<font color='#CC0000'>Invalid File name</font>");
	}
}
function folderwrite($path = '', $file = '', $namecheck = '', $extra = '') {
	if ( is_dir($path) && !is_writable($path) ) {
	  	redirect_header("filemanager.php?rootpath=".$path."",3,"Cannot ".$extra." File,<br /> Folder ".$path." is not writable!");
	}
}
function filewrite($path = '', $file = '', $namecheck = '', $extra = '') {
	if ( is_file($file) && !is_writable($file) ) {
	  	redirect_header("filemanager.php?rootpath=".$path."",3,"Cannot ".$extra.",<br /> File ".$file." is not writable!");
	}
}
function safemodeon($path = '', $file = '', $namecheck = '', $extra = '') {
	if ( ini_get('safe_mode' )) {
	  	redirect_header("filemanager.php?rootpath=".$path."", 3, "Safe Mode restriction applies, not ".$extra."");
	}
}
function fileexists($path = '', $file = '', $namecheck = '', $extra = '') {
	if (@file_exists($file)) {
	  		redirect_header("javascript:history.go(-1)",1,"".$extra." already exists!");
  	}
}
function renameit($path = '', $file = '', $namecheck = '', $extra = '') {
	if (@rename($file, $namecheck)) {
		touch($namecheck);
		chmod($namecheck, 0666);
		redirect_header("filemanager.php?rootpath=".$path."",1,"".$extra." Renamed!");
  	}
}

//start of working stuff.
if($action=="download") { 
	@set_time_limit(600);
	header("Content-disposition: filename=".basename($file));
	header("Content-type: application/octetstream");
	header("Pragma: no-cache");
	header("Expires: 0");
	readfile("$file");
	exit();
	break;
}

if ($action == "edit") {

	if ( $confirm ) {
    	//if (xoopsfwrite()) {
        									
			global $myts;
						
			$filename = "{$HTTP_POST_VARS['workpath']}/{$HTTP_POST_VARS['fileopened']}";
       		filecheck($HTTP_POST_VARS['workpath'], $filename, '', 'edit');
			folderwrite($HTTP_POST_VARS['workpath'], '', '', 'edit');					
			filewrite($HTTP_POST_VARS['workpath'], $filename, '', 'edit');	
			//safemodeon($HTTP_POST_VARS['workpath'], '', '', 'edit');	
			
			$filesave = fopen($filename, "w");
			$content = stripcslashes($myts->makeTareaData4Save($HTTP_POST_VARS['text']));
			fwrite($filesave, $content);
            
			fclose($filesave);
				redirect_header("$urlpath?rootpath=".$HTTP_POST_VARS['workpath']."",1,"File Saved");
            exit();
		//}
	}else{
		$file = "{$workpath}/{$file}";							
		if (is_file($file) == true) { 
			$fp=fopen($file,"r");
			$filesiz = filesize($file);
			
			$code ='';
			$GLOBALS['fileedit'] = fread($fp,filesize($file));
		
			include XOOPS_ROOT_PATH."/class/xoopsformloader.php";
			xoops_cp_header();
			$sform = new XoopsThemeForm(_AM_EDITSERVERFILE, "op", "filemanager.php?action=edit&confirm=1");
			$sform->addElement(new XoopsFormLabel(_AM_CURRENTFILENAME, basename($file)));
			$sform->addElement(new XoopsFormLabel(_AM_CURRENTFILESIZE, filesize($file)));
			$sform->addElement(new XoopsFormDhtmlTextArea(_WFS_CATEGORYHEAD, 'text', $GLOBALS['fileedit'], 30, 80), false);
			$sform->addElement(new XoopsFormText("Save As: ", 'fileopened', 30, 80, basename($file)), false);
			$sform->addElement(new XoopsFormHidden('workpath', $workpath));
			$button_tray = new XoopsFormElementTray('','');
			$button_tray->addElement(new XoopsFormButton('', 'save', _AM_SAVECHANGE, 'submit'));
	        $sform->addElement($button_tray);
			$sform->display();
			xoops_cp_footer();	
    	exit();

	}else{
			redirect_header("$urlpath",1, "No File to Edit" );
			exit();
		}	
	}
}

if ($action == 'delete') {
	if ( $confirm ) {
    	if (is_dir($HTTP_POST_VARS['file'])) {
			if (!killdir($HTTP_POST_VARS['file'])) {
				if ((is_dir($HTTP_POST_VARS['file'])) && dirsize($HTTP_POST_VARS['file']) > 0) {
					redirect_header("$urlpath?rootpath=".$HTTP_POST_VARS['workpath']."",1,"Cannot delete, Folder not empty!");
				} elseif (is_dir($HTTP_POST_VARS['file']) && !is_writable($HTTP_POST_VARS['file'])) {
					redirect_header("$urlpath?rootpath=".$HTTP_POST_VARS['workpath']."",1,"Cannot delete, is not writable!");
				} else {
					redirect_header("$urlpath?rootpath=".$HTTP_POST_VARS['workpath']."",1,"Unknown error, not deleted!");
				}
			} else {
				redirect_header("$urlpath?rootpath=".$HTTP_POST_VARS['workpath']."",1,"Folder Deleted");
			}
		} else {
						
			if (!@unlink($HTTP_POST_VARS['file'])) {
				if (is_file($HTTP_POST_VARS['file']) && !is_writable($HTTP_POST_VARS['file'])) {
					redirect_header("$urlpath?rootpath=".$HTTP_POST_VARS['workpath']."",1,"Cannot delete, is not writable!");
				} else {
					if ( ini_get('safe_mode') ) {
						redirect_header("$urlpath?rootpath=".$HTTP_POST_VARS['workpath']."",1,"Safe Mode restriction applies, not deleted!");
					} else {
						redirect_header("$urlpath?rootpath=".$HTTP_POST_VARS['workpath']."",1,"unknown error??!, not deleted!");
					}
				}
			} else {
				redirect_header("$urlpath?rootpath=".$HTTP_POST_VARS['workpath']."",1,"File Deleted");
			}
		}
		exit();
	} else {
    	include XOOPS_ROOT_PATH."/class/xoopsformloader.php";
		xoops_cp_header();
        	$sform = new XoopsThemeForm("Rename File", "op", "filemanager.php?action=delete&confirm=1");
			$sform->addElement(new XoopsFormLabel("Delete File", basename($file)));
			//$sform->addElement(new XoopsFormText("Delete File: ", 'file', 30, 80, basename($file)), false);
			$sform->addElement(new XoopsFormHidden('workpath', $_GET['workpath']));
			$sform->addElement(new XoopsFormHidden('file', $_GET['file']));
			$button_tray = new XoopsFormElementTray('','');
			$button_tray->addElement(new XoopsFormButton('', 'save', "Delete", 'submit'));
	        $sform->addElement($button_tray);
			$sform->display();
	    xoops_cp_footer();
	}
    exit();
}

if ($action == 'rename') {

	if ( $confirm == '1') {
    	$new_filename = "{$HTTP_POST_VARS['workpath']}/{$HTTP_POST_VARS['new_filename']}";
		$old_filename = "{$HTTP_POST_VARS['workpath']}/{$HTTP_POST_VARS['old_filename']}";

		//safemodeon($HTTP_POST_VARS['workpath'], '', $HTTP_POST_VARS['new_filename'], 'renamed');
		filecheck($HTTP_POST_VARS['workpath'], '', $HTTP_POST_VARS['new_filename'], '');
		fileexists($HTTP_POST_VARS['workpath'], $new_filename,'', 'File');
  		folderwrite($HTTP_POST_VARS['workpath'], '','', 'rename');
		filewrite($HTTP_POST_VARS['workpath'], '$new_filename','', 'rename');
		renameit($HTTP_POST_VARS['workpath'], $old_filename, $new_filename, 'File');
		redirect_header("javascript:history.go(-1)",1,"Unknown Error: File not renamed!");
       
        exit();
	} else {
  		include XOOPS_ROOT_PATH."/class/xoopsformloader.php";
		xoops_cp_header();
    		$sform = new XoopsThemeForm("Rename File", "op", "filemanager.php?action=rename&confirm=1");
			$sform->addElement(new XoopsFormLabel(_AM_CURRENTFILENAME, basename($file)));
			$sform->addElement(new XoopsFormText("Rename File: ", 'new_filename', 30, 80, basename($file)), false);
			$sform->addElement(new XoopsFormHidden('old_filename', basename(htmlentities($file))));
			$sform->addElement(new XoopsFormHidden('workpath', $_GET['workpath']));
			$button_tray = new XoopsFormElementTray('','');
			$button_tray->addElement(new XoopsFormButton('', 'save', "Rename", 'submit'));
	        $sform->addElement($button_tray);
			$sform->display();
			
		xoops_cp_footer();
	}
    exit();
}

if ($action == 'mkdir') {
		$newdir = str_replace("../", "", $HTTP_POST_VARS["new_dirname"]);
		//$newdir = strtolower("{$dirpath}/{$newdir}");
		$newdir = strtolower("{$HTTP_POST_VARS['workpath']}/{$newdir}");
		//if ($_POST["newtype"] == "dir") {
			$oldumask = umask(0);
			if (@mkdir($newdir, 0777)) {
				redirect_header("$urlpath?rootpath=".$HTTP_POST_VARS['workpath']."",1,"Folder Created");

			} else {
				redirect_header("$urlpath?rootpath=".$HTTP_POST_VARS['workpath']."",1,"Error, folder not created");
			}
			umask($oldumask);		
    exit();
}

if ($action == 'mkfile') {
		$newfile = str_replace("../", "", $HTTP_POST_VARS["new_filename"]);
		$newfile = strtolower("{$HTTP_POST_VARS['workpath']}/{$newfile}");
			if (@touch($newfile)) {
				@chmod($newfile, 0666);
				redirect_header("$urlpath?rootpath=".$HTTP_POST_VARS['workpath']."",1,"File Created");
			} else {
				redirect_header("$urlpath?rootpath=".$HTTP_POST_VARS['workpath']."",1,"Error: File not Created");
			}				
    exit();
}

if ($action == 'upload') {

	global $HTTP_GET_VARS, $wfsConfig;
	
	if (!is_dir($HTTP_POST_VARS['uploadpath']) ) {
		redirect_header("filemanager.php?rootpath=".$dirpath."",1,"No Dir selected");
		exit;
	}
	
	if (!is_writeable($HTTP_POST_VARS['uploadpath']) ) {
		redirect_header("filemanager.php?rootpath=".$dirpath."",1,"Path Not writable");
		exit;
	}
	
	$upload = new uploadfile();
    $upload->loadPostVars();
    $upload->setMode($wfsConfig['wfsmode']);
	$upload->setMaxImageHight($wfsConfig['imgheight']);
	$upload->setMaxImageWidth($wfsConfig['imgwidth']);
	$upload->setMaxFilesize($wfsConfig['filesize']);
					
	if (isset($HTTP_POST_VARS['imgname']) && !empty($HTTP_POST_VARS['imgname']))
    	$imgname = strtolower($HTTP_POST_VARS['imgname']);
		$distfilename = $upload->doUploadimage($HTTP_POST_VARS['uploadpath'], $imgname);
        if ( $distfilename ) {
        	redirect_header("filemanager.php?rootpath=".$HTTP_POST_VARS['uploadpath']."",1,_AM_UPLOADED);
            exit();
        } else {
        	 xoops_cp_header();
             echo"<table width='100%' border='0' cellspacing='1' cellpadding = '2'><tr><td>";
             echo "<div class='confirmMsg'>";
			 echo "<h4>"._AM_UPLOADFAIL."</h4>";
            	 echo "File: ".$upload->originalName."<br />";
				 echo "Mimetype: ".$upload->minetype."<br /><br />";
								
				if (!file_exists($HTTP_POST_VARS['uploadpath']) ) echo "Path does not exists";				 
				if (empty($upload->fileName)) echo "No name choosen <br /><br />";
				if (!is_writable($HTTP_POST_VARS['uploadpath'])) echo $workdir._AM_ISNOTWRITABLE." <br /><br />";
				if (!is_file($upload->fileName)) echo $upload->fileName._AM_ISNOTWRITABLE." <br /><br />"; 
                if (!$upload->isAllowedMineType()) echo _AM_NOTALLOWEDMINETYPE."<br /><br />"; 
				 $size = GetImageSize($upload->fileName);
				if (!$upload->isAllowedImageSize()) echo _AM_IMGESIZETOBIG." <br /><br />Allowed image dimensions: Height:".$wfsConfig['imgheight']." x Width:".$wfsConfig['imgwidth']."<br />Uploading image dimensions: Height:".$size[0]." x Width:".$size[1]."<br /><br />";
                if (!$upload->isAllowedFileSize()) echo _AM_FILETOOBIG." Maximum allowed is ".Prettysize($wfsConfig['filesize'])."<br /><br />";				
				if (is_file($HTTP_POST_VARS['uploadpath']."/".$upload->originalName)) echo "The file you are uploading exists on the server.<br /><br />";
			 	
			 echo"</div></td></tr></table>";
	        xoops_cp_footer();
		}
    exit();
}


Global $dirpath;

xoops_cp_header();

?>
<style type="text/css" media="screen">
			<!--
			.bartop {  border-color: #FFFFFF #FFFFFF #FFFFFF #FFFFFF; padding-top: 1px; padding-right: 1px; padding-bottom: 1px; padding-left: 1px; background-color: #CCCCCC; auto; border-style: outset; border-top-width: thin; border-right-width: thin; border-bottom-width: thin; border-left-width: thin}
			.barbottom {  border-color: #FFFFFF #FFFFFF #FFFFFF #FFFFFF; padding-top: 1px; padding-right: 1px; padding-bottom: 1px; padding-left: 1px; background-color: #CCCCCC; auto; border-style: inset; border-top-width: thin; border-right-width: thin; border-bottom-width: thin; border-left-width: thin}
			.filemantext {  font-family: Arial, Helvetica, sans-serif; font-size: 11px; font-weight: normal; text-decoration: none}
			-->
</style>

<?php

echo "<div><h4>"._AM_UPOADMANAGE."</h4></div>";
adminmenu();

echo "<table width = 100% cellspacing = '0' cellpadding = '1' class = outer >";
		echo "<b>Server status</b>";
		echo "<br /><br />";
		if (ini_get('safe_mode')) echo "safe_mode is ON (This will cause problems with Filemanger)"; else echo "safe_mode is OFF";
		echo "<br />";
		if (ini_get('enable_dl')) echo "Uploads is ON"; else echo "Uploads is OFF";
		if (ini_get('enable_dl')) echo " and Max Upload size = ".ini_get('upload_max_filesize');
		echo "<br />";
		if (ini_get('register_globals')) echo "Register Globals is ON"; else echo "Register Globals is OFF";
		
		echo "<br /><br />";
		echo "<div><a href='".$urlpath."'>$home</a>"; 
		echo "<a href='".$urlpath."?rootpath=".$dirpath."'>$refresh</a></div>";	
		echo "<div class = 'bartop'><b>"._AM_UPLOADPATH."</b>".$dirpath."</div>";
		echo "<tr colspan='6'>";
			
			//echo "<td class ='bartop'> </td>";
			echo "<td class='bartop' width = 30% colspan =2>Filename</td>";
			echo "<td class='bartop' align='left'>Filesize</td>";
			echo "<td class='bartop' align='left'>Type</td>";
			echo "<td class='bartop' align='center' >Modified</td>";
			echo "<td class='bartop' align='center' >Attributes</td>";
			echo "<td class='bartop' >Actions</td></tr>";
			
//echo"<table width='100%' border='0' cellspacing='1' cellpadding = '2' class = 'outer'>";
	if ($root != $dirpath) {
		echo "<tr><td width='4%' align='center'><a href='".$urlpath."?rootpath=".substr($dirpath, 0, strrpos($dirpath, "/"))."'><img src=".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/icon/back.gif></td><td align='left'><a href='".$urlpath."?rootpath=".substr($dirpath, 0, strrpos($dirpath, "/"))."'>Parent Directory</td></tr>";
	}
//Get folder info and details
	
	for ($i=0;$i<Count($dirlist);$i++) {
    	echo "<tr>";
		echo "<td width='4%' align='center'>$folderimg</td>";
		echo "<td class='filemantext' style='white-space:nowrap' onmouseover='this.style.cursor=\"hand\";'><a href='".$urlpath."?rootpath=".$dirpath."/".$dirlist[$i]."'>".$dirlist[$i]."</a></td>";
		echo "<td align='left' class='filemantext'>".dirsize($dirpath."/".$dirlist[$i])."</td>";
		echo "<td align='left' class='filemantext'>Folder</td>";
		echo "<td align='left' class='filemantext'>".lastaccess($dirpath."/".$dirlist[$i], "E1")."</td>";
	    echo "<td align='center' class='filemantext' >".get_perms($dirpath."/".$dirlist[$i])."</td>";
		echo "<td align='left' class='filemantext'>";
		echo "<a href='".$urlpath."?action=delete&workpath=".$dirpath."&file=".$dirpath."/".$dirlist[$i]."'>$deleteimg</a>";        
		echo "<a href='".$urlpath."?action=rename&workpath=".$dirpath."&file=".$dirpath."/".$dirlist[$i]."'>$renameimg</a> ";
		//echo "<a href='".$urlpath."?rootpath=".$dirpath."/".$dirlist[$i]."'>ChDr</a> ";
		echo "</td></tr>";
	}
//Get file info and details
	for ($i=0;$i<Count($filelist);$i++) {
		echo "<tr>";
		$file = $dirpath."/".$filelist[$i];
		$icon = get_icon($dirpath."/".$filelist[$i]);
		echo "<td width='4%' align='center'><img src=$pathtoimages$icon></td>";
		echo "<td class='filemantext' style='white-space:nowrap' onmouseover='this.style.cursor=\"hand\";'><a href='".$rootURL."/$filelist[$i]'>".$filelist[$i]."</a></td>";
		echo "<td align='left' class='filemantext'>".myfilesize($file)."</td>";
		echo "<td align='left' class='filemantext'>".$mimetype->getType($file)."</td>";
		echo "<td align='left' class='filemantext'>".lastaccess($file, "E1")."</td>";
	    echo "<td align='center' class='filemantext' >".get_perms($file)."</td>";
		echo "<td align='left' class='filemantext' >";
		if (is_viewable_file($file)) 
			echo "<a href='".$rootURL."/".$filelist[$i]."' target='_blank' >$viewimg</a> ";
		if (is_editable_file($dirpath."/".$filelist[$i])) 
			echo "<a href='".$urlpath."?action=edit&workpath=".$dirpath."&file=".$filelist[$i]."'>$editimg</a> ";
        	echo "<a href='".$urlpath."?action=delete&workpath=".$dirpath."&file=".$dirpath."/".$filelist[$i]."'>$deleteimg</a> ";
   			echo "<a href='".$urlpath."?action=rename&workpath=".$dirpath."&file=".$dirpath."/".$filelist[$i]."'>$renameimg</a> ";
			echo "<a href='".$urlpath."?action=download&file=".$dirpath."/".$filelist[$i]."'>$downimg</a> ";
			echo "</tr>";
	}
			echo "<tr>";
			$diskfree = freespace($dirpath);
            echo "<td class='barbottom' align='left' colspan =3>".$dircount = sizeof($dirlist)." Directories /".$filecount =sizeof($filelist)." files</td>";
			echo "<td class='barbottom' align='left' colspan =4>"._AM_FREEDISKSPACE."</b> ".format_size($diskfree)."</td>";
			echo "</tr>";
			echo "</table>";

			//make new folder
			echo"<table width='100%' border='0' cellspacing='1' cellpadding = '2'>";
			echo"<tr>";
			echo "<td class='bartop' align='left'>";
			echo "<form action='".$HTTP_SERVER_VARS['PHP_SELF']."?action=mkdir' method='post'>";
			echo "Makedir "."<input name='new_dirname' size=30><input type='submit' value='mkdir'><input type='hidden' name=workpath value=".$dirpath.">";
			echo "</form></td>";
			//make file
			echo "<td class='bartop' align='left'>";
			echo "<form action='".$HTTP_SERVER_VARS['PHP_SELF']."?action=mkfile' method='post'>";
			echo "NewFile "."<input name='new_filename' size=30><input type='submit' value='newfile'><input type='hidden' name=workpath value=".$dirpath.">";
			echo "</form></td>";
			echo "</tr>";
			echo "</table>";
			
			//Start of file upload....This has been fixed to include all types of files
			echo "<table width='100%' border='0' cellspacing='1' cellpadding ='2'>";
			echo "<tr><td class='barbottom' colspan = '7'><br />";
			echo "<div><b>"._AM_UPLOADFOLD."</b></div>";
         	DirSelectOption($dirpath, $selected, $urlpath);
			$upload = new UploadFile();
            echo $upload->formStart("".$HTTP_SERVER_VARS['PHP_SELF']."?action=upload");
            echo $upload->formMax();
            //for($n = 0; $n < $uploads; $n++) {
            	echo $upload->formField();
               	echo "<br /><br /><b>"._AM_IMGNAME."</b><br />";
               	echo "<input type='hidden' name='uploadpath' value=$dirpath>"; // ADDED
				echo "<input type='text' name='imgname' id='imgname' value='' size='40' maxlength='40' /><br /><br />";
             //}
            echo $upload->formSubmit(_AM_UPLOAD);
            echo $upload->formEnd();
			echo "</table>";
			
//clearstatcache();	
wfsfooter();  
			
xoops_cp_footer();
?>