<?php
/**
 * $Id: catalog.php 46 2005-11-30 09:13:15Z Michael $

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
<!-- catalog //-->
          <tr>
            <td>
<?php
  $heading = array();
  $contents = array();

  $heading[] = array('text'  => BOX_HEADING_CATALOG,
                     'link'  => tep_href_link(FILENAME_CATEGORIES, 'selected_box=catalog'));

  if ($selected_box == 'catalog') {
    $contents[] = array('text'  => '<a href="' . tep_href_link(FILENAME_CATEGORIES, 'selected_box=catalog', 'NONSSL') . '" class="menuBoxContentLink">' . BOX_CATALOG_CATEGORIES_PRODUCTS . '</a><br>' .
                                   '<a href="' . tep_href_link(FILENAME_PRODUCTS_ATTRIBUTES, 'selected_box=catalog', 'NONSSL') . '" class="menuBoxContentLink">' . BOX_CATALOG_CATEGORIES_PRODUCTS_ATTRIBUTES . '</a><br>' .
                                   '<a href="' . tep_href_link(FILENAME_MANUFACTURERS, 'selected_box=catalog', 'NONSSL') . '" class="menuBoxContentLink">' . BOX_CATALOG_MANUFACTURERS . '</a><br>' .
                                   '<a href="' . tep_href_link(FILENAME_REVIEWS, 'selected_box=catalog', 'NONSSL') . '" class="menuBoxContentLink">' . BOX_CATALOG_REVIEWS . '</a><br>' .
                                   '<a href="' . tep_href_link(FILENAME_SPECIALS, 'selected_box=catalog', 'NONSSL') . '" class="menuBoxContentLink">' . BOX_CATALOG_SPECIALS . '</a><br>' .
                                   '<a href="' . tep_href_link(FILENAME_PRODUCTS_EXPECTED, 'selected_box=catalog', 'NONSSL') . '" class="menuBoxContentLink">' . BOX_CATALOG_PRODUCTS_EXPECTED . '</a>');
  }

  $box = new box;
  echo $box->menuBox($heading, $contents);
?>
            </td>
          </tr>
<!-- catalog_eof //-->
