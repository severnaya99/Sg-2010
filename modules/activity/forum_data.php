<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include '../../mainfile.php';
$dato = array();
$i=0;
$sql="SELECT uid, uname FROM ".$xoopsDB->prefix("users")." WHERE uid=$uid";
$result = $xoopsDB->query($sql);

$num_rows = mysql_num_rows($result);

while($row = mysql_fetch_array($result)){
	$dato["uid"][$i]=$row['uid'];
        $dato["uname"][$i]=$row['uname'];
        $i++;
}
$men30g= (time()-(3600*24*30));

for($i=0;$i<$num_rows;$i++){
    $sql="SELECT * FROM ".$xoopsDB->prefix("xf_posts")." WHERE  `uid`= ".$dato["uid"][$i]." AND `post_time` >".$men30g."";
    $result = $xoopsDB->query($sql);
    $num_rows2 = mysql_num_rows($result);
    $dato["num_post"][$i]=$num_rows2;
}
?>
