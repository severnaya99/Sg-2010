<?php
/**
 * $Id: reports.php 46 2005-11-30 09:13:15Z Michael $
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
<!-- reports //-->
          <tr>
            <td>
<?php
  $heading = array();
  $contents = array();

  $heading[] = array('text'  => BOX_HEADING_REPORTS,
                     'link'  => tep_href_link(FILENAME_STATS_PRODUCTS_VIEWED, 'selected_box=reports'));

  if ($selected_box == 'reports') {
    $contents[] = array('text'  => '<a href="' . tep_href_link(FILENAME_STATS_PRODUCTS_VIEWED, 'selected_box=reports', 'NONSSL') . '" class="menuBoxContentLink">' . BOX_REPORTS_PRODUCTS_VIEWED . '</a><br>' .
                                   '<a href="' . tep_href_link(FILENAME_STATS_PRODUCTS_PURCHASED, 'selected_box=reports', 'NONSSL') . '" class="menuBoxContentLink">' . BOX_REPORTS_PRODUCTS_PURCHASED . '</a><br>' .
                                   '<a href="' . tep_href_link(FILENAME_STATS_CUSTOMERS, 'selected_box=reports', 'NONSSL') . '" class="menuBoxContentLink">' . BOX_REPORTS_ORDERS_TOTAL . '</a>');
  }

  $box = new box;
  echo $box->menuBox($heading, $contents);
?>
            </td>
          </tr>
<!-- reports_eof //-->
