<?php
/*
  $Id: categories_listing.php 83 2006-01-21 16:14:21Z Michael $
 
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License

  adapted 2005 for xoops 2.0.x by FlinkUX e.K. <http://www.flinkux.de>
  
  (c) 2005  Michael Hammelmann <michael.hammelmann@flinkux.de>
*/

include '../../mainfile.php';

$xoopsOption['template_main'] = 'osc_index.html';
include XOOPS_ROOT_PATH.'/header.php';
$sql="select * from ".$xoopsDB->prefix("osc_categories") ." c left join ".$xoopsDB->prefix("osc_categories_description")." cd on cd.categories_id=c.categories_id where cd.language_id=2 and c.parent_id=0";
$result = $xoopsDB->query($sql);
while ( $myrow = $xoopsDB->fetchArray($result) ) {
 $icategories[]=$myrow;
}
$xoopsTpl->assign("categories",$icategories);
include_once XOOPS_ROOT_PATH.'/footer.php';
?>