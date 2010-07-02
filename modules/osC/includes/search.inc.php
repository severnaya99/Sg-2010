<?php
/**
 * $Id: search.inc.php 152 2006-02-06 12:19:54Z Michael $
 * Released under the GNU General Public License
 * adapted 2005 for xoops 2.2.x by FlinkUX e.K. <http://www.flinkux.de> 
 * (c) 2005,2006  Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @package xosC
**/


function &xosC_search($queryarray, $andor, $limit, $offset, $userid, $forums = 0, $sortby = 0, $searchin = "both", $subquery = "")
{
	global $xoopsDB, $xoopsConfig, $myts, $xoopsUser;

	switch($andor) {
	  case 'exact' :
	          for($i=0;$i < count($queryarray);$i++) {
			    $where[]=" products_model='".$queryarray[$i]."' ";
				$where[]=" products_description ='".$queryarray[$i]."' ";
				$where[]=" products_name='".$queryarray[$i]."' ";
			  }
			  $where=implode(" or ",$where);
			  break;
	   case 'AND' :
	   case 'OR'  :
	       	  for($i=0;$i < count($queryarray);$i++) {
			    $where[]=" products_model like '%".$queryarray[$i]."%' ";
				$where[]=" products_description like '%".$queryarray[$i]."%' ";
				$where[]=" products_name like '%".$queryarray[$i]."%' ";
			  }
			  $where=implode(" or ",$where);
			  break;

	 }
	$search_query=$xoopsDB->queryF("select * from ".$xoopsDB->prefix('osc_products')." p left join ".$xoopsDB->prefix('osc_products_description')." pd on pd.products_id = p.products_id where ".$where);
	$i=0;
	while($result=$xoopsDB->fetchArray($search_query)) {
	  $ret[$i]['link']='product_info.php?products_id='.$result['products_id'];
	  $ret[$i]['title']=$result['products_name'];
	  $i++;
	}
	return $ret;
}
?>