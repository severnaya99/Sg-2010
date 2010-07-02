<?php
/* 
 *
 *  Pagina per visualizzazione degli snowparks customizzata da ska
 *
 */

include "header.php";
include XOOPS_ROOT_PATH."/header.php";
$pid= intval($HTTP_GET_VARS['pid']);
echo "<br />$pid - Snowparks<br />";


if(!$pid){
    $sql= "SELECT * FROM ".$xoopsDB->prefix("mylinks_cat")." WHERE title LIKE 'snowparks' AND pid=$pid";
    echo "$sql";
    $result = $xoopsDB->query($sql);
    list($cid, $pid, $title) = $xoopsDB->fetchRow($result);
    echo "<br /> $cid $pid<a href=''> $title </a>";
}
else {
    $sql0= "SELECT title FROM ".$xoopsDB->prefix("mylinks_cat")." WHERE cid=$pid";
    $parent = $xoopsDB->query($sql0);
    $row = mysql_fetch_array($parent);
    $parent = str_replace("'","",str_replace(" ","_",strtolower($row['title'])));
    $sql= "SELECT * FROM ".$xoopsDB->prefix("mylinks_cat")." WHERE pid=$pid";
    $result = $xoopsDB->query($sql);
    $num_rows = mysql_num_rows($result);
    if($num_rows){
        while(list($cid, $pid, $title) = $xoopsDB->fetchRow($result)){
            $url= $parent."/".str_replace("'","",str_replace(" ","_",strtolower($title))).".html";
            echo "<br /><a href='".$url."'> $title </a>";
        }
    }else{
        echo "<h1>Visualizzazione Link $parent</h1>";
        $sql= "SELECT l.lid, l.cid, l.title, l.url, l.logourl, l.status, l.date, l.hits, l.rating, l.votes, l.comments, t.description FROM ".$xoopsDB->prefix("mylinks_links")." l , ".$xoopsDB->prefix("mylinks_text")." t WHERE l.status>0 AND l.lid=t.lid AND l.cid=$pid ORDER BY date DESC";
        $result = $xoopsDB->query($sql);
        while(list($lid, $cid, $ltitle, $url, $logourl, $status, $time, $hits, $rating, $votes, $comments, $description) = $xoopsDB->fetchRow($result)) {
            echo "<br /><div>$lid $cid $title $url <br />$description</div>";
        }
    }
}

include XOOPS_ROOT_PATH.'/footer.php';
?>
