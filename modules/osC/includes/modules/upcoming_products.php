<?php
/*
  $Id: upcoming_products.php 38 2005-11-14 16:35:43Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  $expected_query = tep_db_query("select p.products_id, pd.products_name, products_date_available as date_expected from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where to_days(products_date_available) >= to_days(now()) and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by " . EXPECTED_PRODUCTS_FIELD . " " . EXPECTED_PRODUCTS_SORT . " limit " . MAX_DISPLAY_UPCOMING_PRODUCTS);
  if (tep_db_num_rows($expected_query) > 0) {
	$xoopsTpl->assign("show",1);
    $row = 0;
    while ($expected = tep_db_fetch_array($expected_query)) {

		$upcoming_product[$row]['link'] = tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $expected['products_id']);
		$upcoming_product[$row]['name'] = $expected['products_name'];
		$upcoming_product[$row]['date'] = tep_date_short($expected['date_expected']);
        $row++;
    }
	$xoopsTpl->assign("upcoming_product",$upcoming_product);
  }
?>
