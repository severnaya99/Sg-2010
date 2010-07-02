<?php
/**
 * Tag management for XOOPS
 *
 * @copyright	The XOOPS project http://www.xoops.org/
 * @license		http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author		Taiwen Jiang (phppp or D.J.) <php_pp@hotmail.com>
 * @since		1.00
 * @version		$Id$
 * @package		module::tag
 */

if (!defined('XOOPS_ROOT_PATH')) {
	exit();
}

function &tag_search($queryarray, $andor, $limit, $offset, $sortby = "tag_term ASC")
{
	global $xoopsDB, $xoopsConfig, $myts, $xoopsUser;

	$ret = array();
	$count = count($queryarray);
	$sql = "SELECT tag_id, tag_term FROM " . $xoopsDB->prefix("tag_tag");
	if ($count > 0) {
		if($andor == "exact") {
			$sql .= " WHERE tag_term = '{$queryarray[0]}'";
			for($i=1 ; $i < $count; $i++){
				$sql .= " {$andor} tag_term = '{$queryarray[$i]}'";
			}
		}else{
			$sql .= " WHERE tag_term LIKE '%{$queryarray[0]}%'";
			for($i=1 ; $i < $count; $i++){
				$sql .= " {$andor} tag_term LIKE '%{$queryarray[$i]}%'";
			}
		}
	}

	if ($sortby) {
	    $sql .= " ORDER BY {$sortby}";
	}
	$result = $xoopsDB->query($sql, $limit, $offset);
	$i = 0;
 	while($myrow = $xoopsDB->fetchArray($result)){
        $ret[$i]['link'] = "view.tag.php?tag=".$myrow['tag_id'];
		$ret[$i]['title'] = $myrow['tag_term'];
		$i++;
	}

	return $ret;
}
?>