<?php
/*
  $Id: downloads.php 38 2005-11-14 16:35:43Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
?>
<!-- downloads //-->
<?php
  if (!strstr($PHP_SELF, FILENAME_ACCOUNT_HISTORY_INFO)) {
// Get last order id for checkout_success
    $orders_query = tep_db_query("select orders_id from " . TABLE_ORDERS . " where customers_id = '" . (int)$customer_id . "' order by orders_id desc limit 1");
    $orders = tep_db_fetch_array($orders_query);
    $last_order = $orders['orders_id'];
  } else {
    $last_order = $HTTP_GET_VARS['order_id'];
  }
  $xoopsTpl->assign("seperator",tep_draw_separator('pixel_trans.gif', '100%', '10'));
  
// Now get all downloadable products in that order
  $downloads_query = tep_db_query("select date_format(o.date_purchased, '%Y-%m-%d') as date_purchased_day, opd.download_maxdays, op.products_name, opd.orders_products_download_id, opd.orders_products_filename, opd.download_count, opd.download_maxdays from " . TABLE_ORDERS . " o, " . TABLE_ORDERS_PRODUCTS . " op, " . TABLE_ORDERS_PRODUCTS_DOWNLOAD . " opd where o.customers_id = '" . (int)$customer_id . "' and o.orders_id = '" . (int)$last_order . "' and o.orders_id = op.orders_id and op.orders_products_id = opd.orders_products_id and opd.orders_products_filename != ''");
  if (tep_db_num_rows($downloads_query) > 0) {
    $xoopsTpl->assign("down",1);
	$i=0;
    while ($downloads = tep_db_fetch_array($downloads_query)) {
	  $tmp_downloads[$i]=$downloads;
// MySQL 3.22 does not have INTERVAL
      list($dt_year, $dt_month, $dt_day) = explode('-', $downloads['date_purchased_day']);
      $download_timestamp = mktime(23, 59, 59, $dt_month, $dt_day + $downloads['download_maxdays'], $dt_year);
      $download_expiry = date('Y-m-d H:i:s', $download_timestamp);
// The link will appear only if:
// - Download remaining count is > 0, AND
// - The file is present in the DOWNLOAD directory, AND EITHER
// - No expiry date is enforced (maxdays == 0), OR
// - The expiry date is not reached
      if ( ($downloads['download_count'] > 0) && (file_exists(DIR_FS_DOWNLOAD . $downloads['orders_products_filename'])) && ( ($downloads['download_maxdays'] == 0) || ($download_timestamp > time())) ) {
        $tmp_downloads[$i]['link']=tep_href_link(FILENAME_DOWNLOAD, 'order=' . $last_order . '&id=' . $downloads['orders_products_download_id']);
		$tmp_downloads[$i]['slink']==1;
      }
	  $tmp_downloads[$i]['date']=tep_date_long($download_expiry);
      $i++;
	}
    if (!strstr($PHP_SELF, FILENAME_ACCOUNT_HISTORY_INFO)) {
			$xoopsTpl->assign("fahi",1);
			$xoopsTpl->assign("footer_down", sprintf(FOOTER_DOWNLOAD, '<a href="' . tep_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">' . HEADER_TITLE_MY_ACCOUNT . '</a>'));
    }
  }
?>
<!-- downloads_eof //-->
