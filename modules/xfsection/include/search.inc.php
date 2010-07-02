<?php
// $Id: search.inc.php,v 1.2 2005/06/20 15:03:23 ohwada Exp $

// 2004/01/29 herve 
// To be able to use files descriptions with the search
// But the search in files does not operate correctly.

// 2003/11/21 K.OHWADA
// bug fix
//   result continue forever

// 2003/10/11 K.OHWADA
// rename function
// multiple install of same module

global $xoopsModule;

// *** change this ***
function xfsection_search($queryarray, $andor, $limit, $offset, $userid){
	global $xoopsDB;

	$articles_arr = array();

        // search in attached files
        if (!empty($queryarray)) {

// *** change this ***
//        	$sql = "SELECT articleid,fileshowname FROM ".$xoopsDB->prefix("wfs_files");
	       	$sql = "SELECT articleid,fileshowname FROM ".$xoopsDB->prefix("xfs_files");

                if ( is_array($queryarray) && $count = count($queryarray) ) {

// To be able to use files descriptions with the search
//                  $sql .= " WHERE filetext LIKE '%$queryarray[0]%'";
                    $sql .= " WHERE filetext LIKE '%$queryarray[0]%' OR filedescript LIKE'%$queryarray[0]%'";

                        for($i=1;$i<$count;$i++){
                                $sql .= " $andor ";

// To be able to use files descriptions with the search
//                              $sql .= "filetext LIKE '%$queryarray[$i]%'";
                                $sql .= "filetext LIKE '%$queryarray[$i]%' OR filedescript LIKE'%$queryarray[$i]%'";

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
// *** change this ***
//	$sql = "SELECT articleid,uid,title,published FROM ".$xoopsDB->prefix("wfs_article")." WHERE published>0 AND published<=".time()."";
	$sql = "SELECT articleid,uid,title,published FROM ".$xoopsDB->prefix("xfs_article")." WHERE published>0 AND published<=".time()."";

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

// bug fix : result continue forever
//	$result = $xoopsDB->query($sql,$limit,0);
	$result = $xoopsDB->query($sql,$limit,$offset);

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
