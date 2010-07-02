<?php
/**
 * $Id: distributors.php 64 2005-12-19 18:07:20Z Michael $
 *
 * osCommerce, Open Source E-Commerce Solutions
 * http://www.oscommerce.com
 * Copyright © 2002 osCommerce
 * adapted 2005 for xoops by FlinkUX <http://www.flinkux.de>
 * @package xosC
 * @subpackage admin
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * Released under the GNU General Public License
**/
?>
<!-- distributors //-->
<tr>
<td>
<?php
$heading = array();
$contents = array();

$heading[] = array('text' => BOX_HEADING_DISTRIBUTORS,
'link' => tep_href_link(FILENAME_DISTRIBUTORS, 'selected_box=distributors'));

if ($selected_box == 'distributors') {
$contents[] = array('text' => '<a href="' . tep_href_link(FILENAME_DISTRIBUTORS,  'selected_box=distributors', 'NONSSL') . '" class="menuBoxContentLink">' . BOX_DISTRIBUTORS_DISTRIBUTORS . '</a><br>' );
}

$box = new box;
echo $box->menuBox($heading, $contents);
?>
</td>
</tr>

<!-- distributors_eof //-->

