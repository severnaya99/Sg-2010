<?php
/**
 * $Id: modules.php 46 2005-11-30 09:13:15Z Michael $

 * osCommerce, Open Source E-Commerce Solutions
 * http://www.oscommerce.com

 * Copyright (c) 2002 osCommerce

 * Released under the GNU General Public License
 * adapted for xoops by michael hammelmann <michael.hammelmann@flinkux.de> <http://www.flinkux.de>
 
 * Copyright (c) 2005 FlinkUX Michael Hammelmann <michael.hammelmann@flinkux.de>
 
 * @package xosC
 * @subpackage admin
**/
?>
<!-- modules //-->
          <tr>
            <td>
<?php
  $heading = array();
  $contents = array();

  $heading[] = array('text'  => BOX_HEADING_MODULES,
                     'link'  => tep_href_link(FILENAME_MODULES, 'set=payment&selected_box=modules'));

  if ($selected_box == 'modules') {
    $contents[] = array('text'  => '<a href="' . tep_href_link(FILENAME_MODULES, 'set=payment&selected_box=modules', 'NONSSL') . '" class="menuBoxContentLink">' . BOX_MODULES_PAYMENT . '</a><br>' .
                                   '<a href="' . tep_href_link(FILENAME_MODULES, 'set=shipping&selected_box=modules', 'NONSSL') . '" class="menuBoxContentLink">' . BOX_MODULES_SHIPPING . '</a><br>' .
                                   '<a href="' . tep_href_link(FILENAME_MODULES, 'set=ordertotal&selected_box=modules', 'NONSSL') . '" class="menuBoxContentLink">' . BOX_MODULES_ORDER_TOTAL . '</a><br>' .
								   '<a href="' . tep_href_link(FILENAME_MODULES, 'set=preop&selected_box=modules', 'NONSSL') . '" class="menuBoxContentLink">' . BOX_MODULES_PREOP . '</a>' );
  }

  $box = new box;
  echo $box->menuBox($heading, $contents);
?>
            </td>
          </tr>
<!-- modules_eof //-->
