<?php
// $Id: functions.php,v 1.5 2006/03/20 03:23:03 ohwada Exp $

// 2006-03-17 K.OHWADA
// $HTTP_POST_VARS   -> $_POST
// $HTTP_GET_VARS    -> $_GET
// $HTTP_POST_FILES  -> $_FILES
// $HTTP_SERVER_VARS -> $_SERVER
// BUG 8186: Fatal error: Cannot re-assign $this in include/functions.php

// 2005-05-27 K.OHWADA
// NEW 78: not show image, when not use mydownloads

// 2004/04/04 K.OHWADA
// indexmainheader
//   donot correspond surely p tag and div tag. 

// 2004/03/27 K.OHWADA
// add function
//   check_post_files($file)
//   file_upload($articleid)
//   print_file_upload_error($code)
//   presume_agent()

// 2004/02/27 K.OHWADA
// adminmenu()
//   same as popup menu
//   dislpay number of submitted articles
// add articlemenu()
//   dislpay menu of article manegement

// 2003/10/11 K.OHWADA
// easy to rename module and table
//   change function updaterating, getTotalItems
// bulk import

// easy to rename module and table
//include_once XOOPS_ROOT_PATH.'/modules/wfsection/class/mimetype.php';
//include_once XOOPS_ROOT_PATH."/modules/$wfsModule/class/mimetype.php";
include_once XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/class/mimetype.php";

include_once(XOOPS_ROOT_PATH."/class/xoopslists.php");

function indexmainheader($mainlink=1) {

	global $xoopsModule, $xoopsConfig, $wfsConfig;

	global $wfsModule;	// add

// donot correspond surely p tag and div tag. 
//            echo "<p><div align=\"center\">";
//	echo "<a href=\"".XOOPS_URL."/modules/wfsection/index.php\"><img src=\"".XOOPS_URL."/modules/wfsection/images"."/".$wfsConfig['indeximage']."\" border=\"0\" alt\"\" /></a>";
//            echo "</p>";

		echo "<div align=\"center\">";

// easy to rename module and table
		echo "<a href=\"".XOOPS_URL."/modules/$wfsModule/index.php\"><img src=\"".XOOPS_URL."/modules/$wfsModule/images"."/".$wfsConfig['indeximage']."\" border=\"0\" alt\"\" /></a>";

		echo "</div>";            
}

function newdownloadgraphic($time, $status) {
 
 	Global $wfsConfig;
	
            $count = 7;
            $startdate = (time()-(86400 * $count));
            
			if ($startdate < $time) {
            	if ($wfsConfig['noicons']) {
			    	if($status ==1){

// NEW 78: not show image, when not use mydownloads
//                      echo "&nbsp;<img src=\"".XOOPS_URL."/modules/mydownloads/images/newred.gif\" />";
                        echo "&nbsp;<img src=\"".XOOPS_URL."/modules/xfsection/images/newred.gif\" />";
                        
                	}elseif($status ==2){

// NEW 78: not show image, when not use mydownloads
//                      echo "&nbsp;<img src=\"".XOOPS_URL."/modules/mydownloads/images/update.gif\"  />";
                        echo "&nbsp;<img src=\"".XOOPS_URL."/modules/xfsection/images/update.gif\"  />";
                	}
            	}
			}
}

function popgraphic($counter) {
            global $mydownloads_popular;
            if ($counter>=50) {

// NEW 78: not show image, when not use mydownloads
//            echo "&nbsp;<img src =\"".XOOPS_URL."/modules/mydownloads/images/pop.gif\" alt=\""._MD_POPULAR."\" />";
              echo "&nbsp;<img src =\"".XOOPS_URL."/modules/xfsection/images/pop.gif\" alt=\""._MD_POPULAR."\" />";

            }
}
//Reusable Link Sorting Functions
function convertorderbyin($orderby) {
            if ($orderby == "articleidA")       $orderby = "articleid ASC";
            if ($orderby == "titleA")           $orderby = "title ASC";
            if ($orderby == "createdA")         $orderby = "created ASC";
            if ($orderby == "counterA")         $orderby = "counter ASC";
            if ($orderby == "ratingA")          $orderby = "rating ASC";
            if ($orderby == "submitA")          $orderby = "published ASC";
            if ($orderby == "articleidD")       $orderby = "articleid DESC";
            if ($orderby == "titleD")           $orderby = "title DESC";
            if ($orderby == "createdD")         $orderby = "created DESC";
            if ($orderby == "counterD")         $orderby = "counter DESC";
            if ($orderby == "ratingD")          $orderby = "rating DESC";
            if ($orderby == "submitD")          $orderby = "published DESC";
			if ($orderby == "weight")          $orderby = "weight";
			return $orderby;

}
function convertorderbytrans($orderby) {
            if ($orderby == "articleid ASC")    $orderbyTrans = _WFS_ARTICLEIDLTOM;
            if ($orderby == "articleid DESC")   $orderbyTrans = _WFS_ARTICLEIDMTOL;
            if ($orderby == "counter ASC")      $orderbyTrans = _WFS_POPULARITYLTOM;
            if ($orderby == "counter DESC")     $orderbyTrans = _WFS_POPULARITYMTOL;
            if ($orderby == "title ASC")        $orderbyTrans = _WFS_TITLEATOZ;
            if ($orderby == "title DESC")       $orderbyTrans = _WFS_TITLEZTOA;
            if ($orderby == "created ASC")      $orderbyTrans = _WFS_DATEOLD;
            if ($orderby == "created DESC")     $orderbyTrans = _WFS_DATENEW;
            if ($orderby == "rating ASC")       $orderbyTrans = _WFS_RATINGLTOH;
            if ($orderby == "rating DESC")      $orderbyTrans = _WFS_RATINGHTOL;
            if ($orderby == "published ASC")    $orderbyTrans = _WFS_SUBMITLTOH;
            if ($orderby == "published DESC")   $orderbyTrans = _WFS_SUBMITHTOL;
			if ($orderby == "weight")   		$orderbyTrans = _WFS_WEIGHT;
            return $orderbyTrans;
}
function convertorderbyout($orderby) {
            if ($orderby == "articleid ASC")    $orderby = "articleidA";
            if ($orderby == "title ASC")        $orderby = "titleA";
            if ($orderby == "created ASC")      $orderby = "createdA";
            if ($orderby == "counter ASC")      $orderby = "counterA";
            if ($orderby == "rating ASC")       $orderby = "ratingA";
            if ($orderby == "published ASC")    $orderby = "submitA";
            if ($orderby == "articleid DESC")   $orderby = "articleidD";
            if ($orderby == "title DESC")       $orderby = "titleD";
            if ($orderby == "created DESC")     $orderby = "createdD";
            if ($orderby == "counter DESC")     $orderby = "counterD";
            if ($orderby == "rating DESC")      $orderby = "ratingD";
            if ($orderby == "published DESC")   $orderby = "submitD";
			if ($orderby == "weight")   		$orderby = "weight";
            return $orderby;
}

function PrettySize($size) {
    $mb = 1024*1024;
    if ( $size > $mb ) {
        $mysize = sprintf ("%01.2f",$size/$mb) . " MB";
    }
    elseif ( $size >= 1024 ) {
        $mysize = sprintf ("%01.2f",$size/1024) . " KB";
    }
    else {
        $mysize = sprintf(_WFS_NUMBYTES,$size);
    }
    return $mysize;
}

//updates rating data in itemtable for a given item
function updaterating($sel_id){

        global $xoopsDB;

	global $wfsTableArticle, $wfsTableVotedata;	//add

// easy to rename module and table
//	$query = "select rating FROM ".$xoopsDB->prefix("wfs_votedata")." WHERE lid = ".$sel_id."";
	$query = "select rating FROM ".$xoopsDB->prefix($wfsTableVotedata)." WHERE lid = ".$sel_id."";

        $voteresult = $xoopsDB->query($query);
    $votesDB = $xoopsDB->getRowsNum($voteresult);
        $totalrating = 0;
            while(list($rating)=$xoopsDB->fetchRow($voteresult)){
                        $totalrating += $rating;
                }
        $finalrating = $totalrating/$votesDB;
        $finalrating = number_format($finalrating, 4);

// easy to rename module and table
//	$query =  "UPDATE ".$xoopsDB->prefix("wfs_article")." SET rating=$finalrating, votes=$votesDB WHERE articleid = $sel_id";
	$query =  "UPDATE ".$xoopsDB->prefix($wfsTableArticle)." SET rating=$finalrating, votes=$votesDB WHERE articleid = $sel_id";

            $xoopsDB->query($query);
}

//returns the total number of items in items table that are accociated with a given table $table id
function getTotalItems($sel_id, $status=""){
        global $xoopsDB, $mytree;
        
        global $wfsTableArticle;	// add
        
        $count = 0;
        $arr = array();

// easy to rename module and table
//	$query = "select count(*) from ".$xoopsDB->prefix("wfs_article")." where categoryid=".$sel_id."";
	$query = "select count(*) from ".$xoopsDB->prefix($wfsTableArticle)." where categoryid=".$sel_id."";

        if($status!=""){
                $query .= " and status>=$status";
        }
        $result = $xoopsDB->query($query);
        list($thing) = $xoopsDB->fetchRow($result);
        $count = $thing;
        $arr = $mytree->getAllChildId($sel_id);
        $size = sizeof($arr);
        for($i=0;$i<$size;$i++){

// easy to rename module and table
//		$query2 = "select count(*) from ".$xoopsDB->prefix("wfs_article")." where categoryid=".$arr[$i]."";
		$query2 = "select count(*) from ".$xoopsDB->prefix($wfsTableArticle)." where categoryid=".$arr[$i]."";

                if($status!=""){
                        $query2 .= " and status>=$status";
                }
                $result2 = $xoopsDB->query($query2);
                list($thing) = $xoopsDB->fetchRow($result2);
                $count += $thing;
        }
        return $count;
}

function getlast($toget)
{
        $pos=strrpos($toget,".");
        $lastext=substr($toget,$pos);

        return $lastext;
}

function replace($o) {
        $o=str_replace("/","",$o);
        $o=str_replace("\\","",$o);
        $o=str_replace(":","",$o);
        $o=str_replace("*","",$o);
        $o=str_replace("?","",$o);
        $o=str_replace("<","",$o);
        $o=str_replace(">","",$o);
        $o=str_replace("\"","",$o);
        $o=str_replace("|","",$o);
        return $o;
}

function is_valid_name($input)        ## Checks whether the directory- or filename is valid
{
 if (strstr($input, "\\"))
  return FALSE;
 else if (strstr($input, "/"))
  return FALSE;
 else if (strstr($input, ":"))
  return FALSE;
 else if (strstr($input, "?"))
  return FALSE;
 else if (strstr($input, "*"))
  return FALSE;
 else if (strstr($input, "\""))
  return FALSE;
 else if (strstr($input, "<"))
  return FALSE;
 else if (strstr($input, ">"))
  return FALSE;
 else if (strstr($input, "|"))
  	return FALSE;
 else if (strstr($input, "£"))
 	return FALSE;
 else if (strstr($input, "%"))
  return FALSE;
 else if (strstr($input, "^"))
  return FALSE;
 else if (strstr($input, "&"))
  return FALSE;
 else
  return TRUE;
}

function dirsize($directory) {

     if (!is_dir($directory)) return -1;
                $size = 0;

     if ($DIR = opendir($directory))        {

        while (($dirfile = readdir($DIR)) !== false)        {

           if (is_link($directory . '/' . $dirfile) || $dirfile == '.' || $dirfile == '..')
              continue;

           if (is_file($directory . '/' . $dirfile))
              $size += filesize($directory . '/' . $dirfile);

           else if (is_dir($directory . '/' . $dirfile))
           {

             $dirSize = format_size($directory.'/'.$dirfile);
              if ($dirSize >= 0) $size += $dirSize;
              else return -1;

           }

        }

        closedir($DIR);

     }

     return $size;

  }

  function format_size($rawSize) {
        $kb = 1024;         // Kilobyte
          $mb = 1024 * $kb;   // Megabyte
          $gb = 1024 * $mb;   // Gigabyte
          $tb = 1024 * $gb;   // Terabyte

   if($rawSize < $kb) {
       return $rawSize." bytes";
   }
   else if($rawSize < $mb) {
      return round($rawSize/$kb,2)." KB";
   }
   else if($rawSize < $gb) {
       return round($rawSize/$mb,2)." MB";
  }
   else if($rawSize < $tb) {
       return round($rawSize/$gb,2)." GB";
   }
   else {
      return round($rawSize/$tb,2)." TB";
   }

}

function myfilesize($file) {

if(filetype($file)=="file") {
  $kb = 1024;         // Kilobyte
  $mb = 1024 * $kb;   // Megabyte
  $gb = 1024 * $mb;   // Gigabyte
  $tb = 1024 * $gb;   // Terabyte

   $size = filesize($file);

   if($size < $kb) {
       return $size." B";
   }
   else if($size < $mb) {
      return round($size/$kb,2)." KB";
   }
   else if($size < $gb) {
       return round($size/$mb,2)." MB";
  }
   else if($size < $tb) {
       return round($size/$gb,2)." GB";
   }
   else {
      return round($size/$tb,2)." TB";
   }
}

}

function freespace($workdir) {
$diskfreef = disk_free_space($workdir);
return $diskfreef;
}

function get_icon($file)        ## Get the icon from the filename
{
 global $IconArray;

 reset($IconArray);

 $extension = strtolower(substr(strrchr($file, "."),1));

 if ($extension == "")
  return "unknown.gif";

 while (list($icon, $types) = each($IconArray))
  foreach (explode(" ", $types) as $type)
   if ($extension == $type)
    return $icon;

 return "unknown.gif";
}

function get_mimetype($minetype)        ## Get the icon from the filename
{
 	global $wfsConfig;
	$mimetype = new mimetype();
    echo $minetype; 	
	foreach(explode(" ", $wfsConfig['selmimetype']) as $type)
  		echo $mimetype->privFindType($type)."<br />";
		if ($minetype === $mimetype->privFindType($type))
   	return TRUE;

return FALSE;
}



function extractSubdir($oldworkdir, $backpath) {

   $tmp = "";
   if ($oldworkdir != "") {
      $rp = ereg_replace("((.*)\/.*)\/\.\.$", "\\2", $oldworkdir);
      $tmp = strtr(str_replace($backpath, "", $rp), "\\", "/");
      while ($tmp[0] == '/') $tmp = substr($tmp, 1);
   }

   return $tmp;
}

function DirSelectOption($workdir, $selected, $path) {

        global $xoopsConfig, $wfsConfig, $xoopsModule, $workd;

        $filearray =& getDirList($workdir);

        echo "<select size='1' name='workd' onchange='location.href=\"".$path."?rootpath=\"+this.options[this.selectedIndex].value'>";
    	echo "<option value=' '>------</option>";
        foreach($filearray as $workd){
        	if ( $workd === $selected ) {
            	$opt_selected = "selected";
            }else{
            	$opt_selected = "";
            }
          echo "<option value='".$workd."' $opt_selected>".basename($workd)."</option>";
        }
    	echo "</select>";
}

function getcorrectpath($path){
if(file_exists(XOOPS_ROOT_PATH."/".$path)) {
        $ret = "      "._AM_PATHEXIST." ";
        }else{
    $ret = "      "._AM_PATHNOTEXIST." ";
        }
return $ret;
}

function get_perms($file) {
        
		$p_bin=substr(decbin(fileperms($file)), -9);
        $p_arr=explode('.', substr(chunk_split($p_bin, 1, '.'), 0, 17));
        $perms='';

// BUG 8186: Fatal error: Cannot re-assign $this in include/functions.php
// varibale $this cannot be used in PHP5
//        foreach($p_arr as $i => $this)
//        {
//                $p_char = ($i%3==0 ? 'r' : ($i%3==1 ? 'w' : 'x'));
//                $perms .= ($this=='1' ? $p_char : '-' ).($i%3==2 ? ' ' : '');
//          }
        foreach($p_arr as $i => $p)
        {
                $p_char = ($i%3==0 ? 'r' : ($i%3==1 ? 'w' : 'x'));
                $perms .= ($p=='1' ? $p_char : '-' ).($i%3==2 ? ' ' : '');
          }

        return substr($perms,0,-1);
}

function is_editable_file($filename)        ## Checks whether a file is editable
{
 global $EditableFiles;

 $extension = strtolower(substr(strrchr($filename, "."),1));

 foreach(explode(" ", $EditableFiles) as $type)
  if ($extension == $type)
   return TRUE;

 return FALSE;
}

function is_viewable_file($filename)        ## Checks whether a file is viewable
{
 global $ViewableFiles;

 $extension = strtolower(substr(strrchr($filename, "."),1));

 foreach(explode(" ", $ViewableFiles) as $type)
  if ($extension == $type)
   return TRUE;

 return FALSE;
}

function getuser($tuid) {

global $xoopsDB, $xoopsConfig;

echo "<select name='changeuser'>";
echo "<option value=' '>------</option>";
$result = $xoopsDB->query("SELECT uid, uname FROM ".$xoopsDB->prefix("users")." ORDER BY uname");

        while(list($uid, $uname) = $xoopsDB->fetchRow($result)) {
                if ( $uid == $tuid ) {
                        $opt_selected = "selected='selected'";
                }else{
                        $opt_selected = "";
                }

                echo "<option value='".$uid."' $opt_selected>".$uname."</option>";
        }
                echo "</select></div>";
}

function showSelectedImg($imageshow) {
	echo "<img src='".$imageshow."'>";
}

function myTextForm2($url , $value){
	return '<form action="'.$url.'" method="post"><td width = 10% align =left><input type="submit" value="'.$value.'" /></td></form>';
}

function Offlinemessage() {
	indexmainheader();
}

function lastaccess($file, $output) {

global $wfsConfig;

if (!file_exists(realpath($file))) {
return false;
}

$lastvisit = filectime($file); 
$currentdate = date('U');
$difference = $currentdate - $lastvisit; 

if ($output == "D")
$fileaccess=intval($difference/84600);
elseif ($output == "S") 
$fileaccess = $difference;
elseif ($output == "E1")
$fileaccess = formatTimestamp($lastvisit, $wfsConfig['timestamp']);
elseif ($output == "E2")
$fileaccess = date('d.m Y',$lastvisit);

return $fileaccess;
}

function adminmenu() 
{
// display number of submitted articles
	global $xoopsDB, $xoopsModule;
	global $wfsTableBroken;

	include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/wfsarticle.php';

	$total_submitted = WfsArticle::getNumArticle(2);

// get number of broken files
	$sql = "SELECT count(*) FROM ".$xoopsDB->prefix($wfsTableBroken);
	$arr = $xoopsDB->fetchRow( $xoopsDB->query($sql) );
	$total_broken = $arr[0];
	if (empty($total_broken)) $total_broken = 0;

		echo "<table width='100%' border='0' cellspacing='1' cellpadding = '2' class='outer'>";
		echo "<tr><td class= 'bg3'><b>"._AM_MENU_LINKS."</b></td></tr>";

// add nemu : same as popup menu
		echo "<tr><td class = 'head'><a href='".XOOPS_URL."/modules/system/admin.php?fct=preferences&amp;op=showmod&amp;mod=".$xoopsModule->getVar('mid')."'>"._AM_PREFERENCE."</a></td></tr>";

		echo "<tr><td class = 'even'><b><a href='config.php'>"._AM_GENERALCONF."</a></b></td></tr>";

// add nemu : same as popup menu
		echo "<tr><td class = 'head'><b><a href='sectiontxt.php'>"._AM_INDEXPAGECONFIG."</b></a></td></tr>";
		echo "<tr><td class = 'even'><b><a href='pathconfig.php'>"._AM_PATH_MANAGEMENT."</a></b></td></tr>";

		echo "<tr><td class = 'head'><b><a href='category.php?op=default'>"._AM_SECTIONMANAGE."</b></a></td></tr>";
        echo "<tr><td class = 'even'><a href='allarticles.php'>"._AM_ARTICLEMANAGE."</a></td></tr>";
		echo "<tr><td class = 'head'><b><a href='index.php?op=default'>-- "._AM_PEARTICLES."</a></b></td></tr>";

// add nemu : same as popup menu
// display number of submitted articles
		echo "<tr><td class = 'even'><a href='allarticles.php?action=submitted'>-- "._AM_SUBLARTICLES."</a>";
		if ($total_submitted) echo " <font color=red>($total_submitted)</font>";
		echo "</td></tr>";

		echo "<tr><td class = 'head'><b><a href='filemanager.php'>"._AM_UPLOADMAN."</a></b></td></tr>";

// add nemu : same as popup menu
// display number of broken files
        echo "<tr><td class = 'even'><a href='brokendown.php?op=listBrokenDownloads'>"._AM_LIST_BROKEN."</a> ";
		if ($total_broken) echo " <font color=red>($total_broken)</font>";
		echo "</td></tr>";

        echo "<tr><td class = 'head'><a href='reorder.php'>"._AM_WEIGHTMANAGE."</a></td></tr>";
		echo "<tr><td class = 'even'><a href='wfsfilesshow.php'>"._AM_ATTACHEDFILEM."</a></td></tr>";

// add menu: bulk import
        echo "<tr><td class = 'head'><a href='import.php'>"._AM_IMPORT."</a></td></tr>";

		echo"</table><br>";
}

// add this function
// display menu of article manegement
function articlemenu() 
{
	global $xoopsDB, $xoopsModule;
	global $wfsTableBroken;

	include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/wfsarticle.php';

	$total_published  = WfsArticle::getNumArticle(1);
	$total_submitted  = WfsArticle::getNumArticle(2);
	$total_all        = WfsArticle::getNumArticle(3);
	$total_online     = WfsArticle::getNumArticle(4);
	$total_offline    = WfsArticle::getNumArticle(5);
	$total_autoexpire = WfsArticle::getNumArticle(6);
	$total_autoart    = WfsArticle::getNumArticle(7);
	$total_expired    = WfsArticle::getNumArticle(8);
	$total_noshowart  = WfsArticle::getNumArticle(9);                             
	                       		
	echo "<table width='100%' border='0' cellpadding = '2' cellspacing='0' class='outer'>";
	echo "<tr class = 'even'><td>";

	echo "<div><a href='allarticles.php?action=all'>"._AM_ALLARTICLES."</a> ($total_all)</div>";

	echo "<div><a href='allarticles.php?action=submitted'>"._AM_SUBLARTICLES."</a> ";
	if ($total_submitted) echo "<font color=red><b>($total_submitted)</b></font>";
	else                  echo "($total_submitted)";
	echo "<div>";

	echo "<div><a href='allarticles.php?action=published'>"._AM_PUBLARTICLES."</a> ($total_published)</div>";
	echo "<div><a href='allarticles.php?action=autoart'>"._AM_AUTOARTICLES."</a> ($total_autoart)<div>";
	echo "<div><a href='allarticles.php?action=expired'>"._AM_EXPIREDARTICLES."</a> ($total_expired)<div>";
	echo "<div><a href='allarticles.php?action=autoexpire'>"._AM_AUTOEXPIREARTICLES."</a> ($total_autoexpire)<div>";
	echo "<div><a href='allarticles.php?action=online'>"._AM_ONLINARTICLES."</a> ($total_online)<div>";
	echo "<div><a href='allarticles.php?action=offline'>"._AM_OFFLIARTICLES."</a> ($total_offline)<div>";
	echo "<div><a href='allarticles.php?action=noshowart'>"._AM_NOSHOWARTICLES."</a> ($total_noshowart)<div>";

	echo "</td></tr></table><br>";
}

function wfsfooter() {

echo "<br /><div style='text-align:center'>"._AM_VISITSUPPORT."</div>";

}

// add this function
// check $_FILES
// return status code 
//   0 : no error
//   2 : The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form. 
//   6 : $_FILES is not setted.
//   7 : the name of uploaded file is not setted.
//   8 : the size of uploaded file is zero.
function check_post_files($file)
{
	if (!isset($_FILES[$file])) return 6;
	if (empty($_FILES[$file]['name'])) return 7;
	
	if ($_FILES[$file]['size'] == 0)
	{	if     (empty($_FILES[$file]['tmp_name']))    return 2;
		elseif ($_FILES[$file]['tmp_name'] == 'none') return 2;
		return 8;
	}

	return 0;
}

// add this function
// file upload by articleid
// return status code 
//    0 : normal
//   21 : articleid not set
//   22 : SQL fail
function file_upload($articleid)
{
	global $wfsConfig;
	global $wfsUploadSize;

	if ($articleid == 0) return 21;

	$error = check_post_files('filename');
	if ($error != 0) return $error;

	$upload = new uploadfile('filename');
	$upload->loadPostVars();
	$upload->setMaxFilesize($wfsUploadSize);
	$upload->setMode($wfsConfig['wfsmode']);
	$distfilename = $upload->doUploadToRandumFile(XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath']);

	if (!$distfilename) return $upload->getErrorCode();

	$file = new WfsFiles();
	$file->setByUploadFile($upload);
	$file->setFiledescript($_POST['filedescript']);
//	$file->setFiletext($_POST['filetext']);
	$file->setgroupid($_POST['groupid']);

	if (empty($_POST['fileshowname'])) 
	{	$file->setFileShowName($upload->getOriginalName());	} 
	else 
	{   $file->setFileShowName($_POST['fileshowname']);	}

	$file->setArticleid($articleid);
	$ret = $file->store();

	if (!$ret)	return 22;

	return 0;
}

// add this function
// print file upload error
function print_file_upload_error($code)
{
	echo"<table width='100%' border='0' cellspacing='1' class='outer'><tr><td align='left' class='odd'>";
	echo "<h4><font color='red'>"._WFS_UPLOAD_FAIL."</font></h4>";
	echo "Filename: ".$_FILES['filename']['name']."<br />";
	if (($code == 6)||($code == 7))
	{	echo _WFS_UPLOAD_NON;	}
	elseif ($code == 8)
	{	echo _WFS_UPLOAD_ZERO;	}
	elseif ($code == 2)
	{	echo sprintf(_WFS_UPLOAD_TOO_BIG,$_POST['MAX_FILE_SIZE']);	}
	elseif ($code == 16)
	{	echo sprintf(_WFS_UPLOAD_TOO_BIG,UploadFile::getMaxFilesize());	}
	elseif ($code == 17)
	{	echo _WFS_UPLOAD_NOT_ALLOWED_MINE_TYPE;	}
	else
	{	echo "Error code = $code";	}

	echo"</td></tr></table>";
}

// add this function
// presume os and browser by agent
function presume_agent()
{
	if (!isset($_SERVER["HTTP_USER_AGENT"]))
	{	return array('','');	}	// undefined

	$agent = $_SERVER["HTTP_USER_AGENT"];

// presume OS
	if     (preg_match("/Win/i",$agent))    $os = 'win';
	elseif (preg_match("/Mac/i",$agent))    $os = 'mac';
	elseif (preg_match("/Linux/i",$agent))  $os = 'linux';
	elseif (preg_match("/BSD/i",$agent))    $os = 'bsd';
	elseif (preg_match("/IRIX/i",$agent))   $os = 'irix';
	elseif (preg_match("/Sun/i",$agent))    $os = 'sun';
	elseif (preg_match("/HP-UX/i",$agent))  $os = 'hpux';
	elseif (preg_match("/AIX/i",$agent))    $os = 'aix';
	elseif (preg_match("/X11/i",$agent))    $os = 'x11';
	else                                    $os = 'unknown';

// presume Browser
	if     (preg_match("/MSIE/i",$agent))    $browser = 'msie';
	elseif (preg_match("/Mozilla/i",$agent)) $browser = 'mozilla';
	else                                     $browser = 'unknown';

	return array($os, $browser);
}

?>