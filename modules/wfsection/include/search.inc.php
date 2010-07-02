<?php
// $Id: search.inc.php,v 1.3  Date: 06/01/2003, Author: Catzwolf Exp $

global $xoopsModule;

function wfsection_search($queryarray, $andor, $limit, $offset, $userid){
	global $xoopsDB;
	
	$articles_arr = array();

        // search in attached files
        if (!empty($queryarray)) {
        	$sql = "SELECT articleid,fileshowname FROM ".$xoopsDB->prefix("wfs_files");
                if ( is_array($queryarray) && $count = count($queryarray) ) {
                        $sql .= " WHERE filetext LIKE '%$queryarray[0]%'";
                        for($i=1;$i<$count;$i++){
                                $sql .= " $andor ";
                                $sql .= "filetext LIKE '%$queryarray[$i]%'";
                        }
                }
                $result = $xoopsDB->query($sql);

                $filename_arr = array();
                while($row = $xoopsDB->fetchArray($result)){
                        $filename_arr[$row['articleid']][] = $row['fileshowname'];
                        if (!in_array($row['articleid'],$articles_arr)) $articles_arr[] = $row['articleid'];
                }
        }
	    
    // search in articles
	$sql = "SELECT articleid,uid,title,published FROM ".$xoopsDB->prefix("wfs_article")." WHERE published>0 AND published<=".time()."";
	if ( $userid != 0 ) {
		$sql .= " AND uid=".$userid." ";
	}
	// because count() returns 1 even if a supplied variable
	// is not an array, we must check if $querryarray is really an array
	
	if ( is_array($queryarray) && $count = count($queryarray) ) {
		$sql .= " AND ((maintext LIKE '%$queryarray[0]%' OR title LIKE '%$queryarray[0]%' OR summary LIKE '%$queryarray[0]%')";
		for($i=1;$i<$count;$i++){
			$sql .= " $andor ";
			$sql .= "(maintext LIKE '%$queryarray[$i]%' OR title LIKE '%$queryarray[$i]%' OR summary LIKE '%$queryarray[$i]%')";
		}
		$sql .= ") ";
	}
	
	$sql .= "ORDER BY published DESC";
	$result = $xoopsDB->query($sql,$limit,0);
	$ret = array();
	$i = 0;
	 	
	while($myrow = $xoopsDB->fetchArray($result)){
		$ret[$i]['image'] = "images/wf.gif";
	    $ret[$i]['title'] = " ".$myrow['title'];
	    $ret[$i]['link'] = "article.php?page=1&amp;articleid=".$myrow['articleid']."";
	   	$ret[$i]['time'] = $myrow['published'];
		$ret[$i]['uid'] = $myrow['uid'];
	$i++;
	
	}
	return $ret;
}
?>