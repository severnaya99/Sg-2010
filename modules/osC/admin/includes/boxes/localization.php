<?php
/**
 * $Id: localization.php 46 2005-11-30 09:13:15Z Michael $
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
<!-- localization //-->
          <tr>
            <td>
<?php
  $heading = array();
  $contents = array();

  $heading[] = array('text'  => BOX_HEADING_LOCALIZATION,
                     'link'  => tep_href_link(FILENAME_CURRENCIES, 'selected_box=localization'));

  if ($selected_box == 'localization') {
    $contents[] = array('text'  => '<a href="' . tep_href_link(FILENAME_CURRENCIES, 'selected_box=localization', 'NONSSL') . '" class="menuBoxContentLink">' . BOX_LOCALIZATION_CURRENCIES . '</a><br>' .
                                   '<a href="' . tep_href_link(FILENAME_LANGUAGES, 'selected_box=localization', 'NONSSL') . '" class="menuBoxContentLink">' . BOX_LOCALIZATION_LANGUAGES . '</a><br>' .
                                   '<a href="' . tep_href_link(FILENAME_ORDERS_STATUS, 'selected_box=localization', 'NONSSL') . '" class="menuBoxContentLink">' . BOX_LOCALIZATION_ORDERS_STATUS . '</a>');
  }

  $box = new box;
  echo $box->menuBox($heading, $contents);
?>
            </td>
          </tr>
<!-- localization_eof //-->
