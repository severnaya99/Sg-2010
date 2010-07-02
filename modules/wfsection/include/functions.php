<?php
include_once XOOPS_ROOT_PATH.'/modules/wfsection/class/mimetype.php';
include_once(XOOPS_ROOT_PATH."/class/xoopslists.php");

function indexmainheader($mainlink=1) {

global $xoopsModule, $xoopsConfig, $wfsConfig;

            echo "<p><div align=\"center\">";
                echo "<a href=\"".XOOPS_URL."/modules/wfsection/index.php\"><img src=\"".XOOPS_URL."/modules/wfsection/images"."/".$wfsConfig['indeximage']."\" border=\"0\" alt\"\" /></a>";
            echo "</p>";
}

function newdownloadgraphic($time, $status) {
 
 	Global $wfsConfig;
	
            $count = 7;
            $startdate = (time()-(86400 * $count));
            
			if ($startdate < $time) {
            	if ($wfsConfig['noicons']) {
			    	if($status ==1){
                        echo "&nbsp;<img src=\"".XOOPS_URL."/modules/mydownloads/images/newred.gif\" />";
                	}elseif($status ==2){
                        echo "&nbsp;<img src=\"".XOOPS_URL."/modules/mydownloads/images/update.gif\"  />";
                	}
            	}
			}
}

function popgraphic($counter) {
            global $mydownloads_popular;
            if ($counter>=50) {
            echo "&nbsp;<img src =\"".XOOPS_URL."/modules/mydownloads/images/pop.gif\" alt=\""._MD_POPULAR."\" />";
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
        $query = "select rating FROM ".$xoopsDB->prefix("wfs_votedata")." WHERE lid = ".$sel_id."";
        $voteresult = $xoopsDB->query($query);
    $votesDB = $xoopsDB->getRowsNum($voteresult);
        $totalrating = 0;
            while(list($rating)=$xoopsDB->fetchRow($voteresult)){
                        $totalrating += $rating;
                }
        $finalrating = $totalrating/$votesDB;
        $finalrating = number_format($finalrating, 4);
        $query =  "UPDATE ".$xoopsDB->prefix("wfs_article")." SET rating=$finalrating, votes=$votesDB WHERE articleid = $sel_id";
            $xoopsDB->query($query);
}

//returns the total number of items in items table that are accociated with a given table $table id
function getTotalItems($sel_id, $status=""){
        global $xoopsDB, $mytree;
        $count = 0;
        $arr = array();
        $query = "select count(*) from ".$xoopsDB->prefix("wfs_article")." where categoryid=".$sel_id."";
        if($status!=""){
                $query .= " and status>=$status";
        }
        $result = $xoopsDB->query($query);
        list($thing) = $xoopsDB->fetchRow($result);
        $count = $thing;
        $arr = $mytree->getAllChildId($sel_id);
        $size = sizeof($arr);
        for($i=0;$i<$size;$i++){
                $query2 = "select count(*) from ".$xoopsDB->prefix("wfs_article")." where categoryid=".$arr[$i]."";
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

        global $xoopsConfig, $wfsConfig, $xoopsModule, $PHP_SELF, $workd;

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
        foreach($p_arr as $i => $this)
        {
                $p_char = ($i%3==0 ? 'r' : ($i%3==1 ? 'w' : 'x'));
                $perms .= ($this=='1' ? $p_char : '-' ).($i%3==2 ? ' ' : '');
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

function adminmenu() {
		echo "<table width='100%' border='0' cellspacing='1' cellpadding = '2' class='outer'>";
		echo "<tr><td class= 'bg3'><b>"._AM_MENU_LINKS."</b></td></tr>";
		echo "<tr><td class = 'head'><b><a href='config.php'>"._AM_GENERALCONF."</a></b></td></tr>";
		echo "<tr><td class = 'even'><b><a href='category.php?op=default'>"._AM_CATEGORYSMNGR."</b></a></td></tr>";
        echo "<tr><td class = 'head'><a href='allarticles.php'>"._AM_ARTICLEMANAGE."</a></td></tr>";
		echo "<tr><td class = 'even'><b><a href='index.php?op=default'>"._AM_PEARTICLES."</a></b></td></tr>";
		echo "<tr><td class = 'head'><b><a href='filemanager.php'>"._AM_UPLOADMAN."</a></b></td></tr>";
        echo "<tr><td class = 'even'><a href='reorder.php'>"._AM_WEIGHTMANAGE."</a></td></tr>";
		echo "<tr><td class = 'head'><a href='wfsfilesshow.php'>"._AM_WFSFILESHOW."</a></td></tr>";
		echo"</table><br>";

}

function wfsfooter() {

echo "<br /><div style='text-align:center'>"._AM_VISITSUPPORT."</div>";

}
?>
