<?php
/*
  $Id: account_history_info.php 135 2006-01-21 16:16:19Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License

  adapted 2005 for xoops 2.0.x by FlinkUX e.K. <http://www.flinkux.de>
  
  (c) 2005  Michael Hammelmann <michael.hammelmann@flinkux.de>

*/

  require('includes/application_top.php');
  $xoopsOption['template_main'] = 'account_history_info.html';
  include XOOPS_ROOT_PATH.'/header.php';
  $xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" />');

  if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot();
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
  }

  if (!isset($HTTP_GET_VARS['order_id']) || (isset($HTTP_GET_VARS['order_id']) && !is_numeric($HTTP_GET_VARS['order_id']))) {
    tep_redirect(tep_href_link(FILENAME_ACCOUNT_HISTORY, '', 'SSL'));
  }
  
  $customer_info_query = tep_db_query("select customers_id from " . TABLE_ORDERS . " where orders_id = '". (int)$HTTP_GET_VARS['order_id'] . "'");
  $customer_info = tep_db_fetch_array($customer_info_query);
  if ($customer_info['customers_id'] != $customer_id) {
    tep_redirect(tep_href_link(FILENAME_ACCOUNT_HISTORY, '', 'SSL'));
  }

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_ACCOUNT_HISTORY_INFO);

  $breadcrumb->add(NAVBAR_TITLE_1, tep_href_link(FILENAME_ACCOUNT, '', 'SSL'));
  $breadcrumb->add(NAVBAR_TITLE_2, tep_href_link(FILENAME_ACCOUNT_HISTORY, '', 'SSL'));
  $breadcrumb->add(sprintf(NAVBAR_TITLE_3, $HTTP_GET_VARS['order_id']), tep_href_link(FILENAME_ACCOUNT_HISTORY_INFO, 'order_id=' . $HTTP_GET_VARS['order_id'], 'SSL'));
  include("includes/header.php");
  require(DIR_WS_CLASSES . 'order.php');
  $order = new order($HTTP_GET_VARS['order_id']);
  $xoopsTpl->assign("site_image",tep_image(DIR_WS_IMAGES . 'table_background_history.gif', HEADING_TITLE, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT));
  $xoopsTpl->assign("seperator",tep_draw_separator('pixel_trans.gif', '100%', '10'));
  $xoopsTpl->assign("order_number",sprintf(HEADING_ORDER_NUMBER, $HTTP_GET_VARS['order_id']));
  $xoopsTpl->assign("order_info",$order->info['orders_status']);
  $xoopsTpl->assign("date_purchased",tep_date_long($order->info['date_purchased']));
  $xoopsTpl->assign("order_total",$order->info['total']);
  if ($order->delivery != false) {
	$xoopsTpl->assign("delivery",1);
	$xoopsTpl->assign("address",tep_address_format($order->delivery['format_id'], $order->delivery, 1, ' ', '<br>'));
	
    if (tep_not_null($order->info['shipping_method'])) {
       $xoopsTpl->assign("shipping",1);
	   $xoopsTpl->assign("shipping_method",$order->info['shipping_method']);
	   
    }
  }
 $xoopsTpl->assign("width",(($order->delivery != false) ? '70%' : '100%'));

  if (sizeof($order->info['tax_groups']) > 1) {
    $xoopsTpl->assign("tax_group",1);
  }

  for ($i=0, $n=sizeof($order->products); $i<$n; $i++) {
    $tmp_products[$i]['qty'] = $order->products[$i]['qty'];
	$tmp_products[$i]['name'] = $order->products[$i]['name']; 

    if ( (isset($order->products[$i]['attributes'])) && (sizeof($order->products[$i]['attributes']) > 0) ) {
      for ($j=0, $n2=sizeof($order->products[$i]['attributes']); $j<$n2; $j++) {
	    $tmp_attr[$i][$j]['option'] =$order->products[$i]['attributes'][$j]['option'];
		$tmp_attr[$i][$j]['value'] = $order->products[$i]['attributes'][$j]['value'];
      }
    }

    $tmp_products[$i]['tax'] =  tep_display_tax_value($order->products[$i]['tax']);
	$tmp_products[$i]['final_price'] = $currencies->format(tep_add_tax($order->products[$i]['final_price'], $order->products[$i]['tax']) * $order->products[$i]['qty'], true, $order->info['currency'], $order->info['currency_value']);
  }
  $xoopsTpl->assign("tmp_products",$tmp_products);
  $xoopsTpl->assign("tmp_attr",$tmp_attr);
  $xoopsTpl->assign("bill_adr",tep_address_format($order->billing['format_id'], $order->billing, 1, ' ', '<br>'));
  $xoopsTpl->assign("pay_method",$order->info['payment_method']);
  for ($i=0, $n=sizeof($order->totals); $i<$n; $i++) {
    $orders[$i]['title']=$order->totals[$i]['title'];
    $orders[$i]['text']=$order->totals[$i]['text'];
  }
  $xoopsTpl->assign("orders",$orders);
  $statuses_query = tep_db_query("select os.orders_status_name, osh.date_added, osh.comments from " . TABLE_ORDERS_STATUS . " os, " . TABLE_ORDERS_STATUS_HISTORY . " osh where osh.orders_id = '" . (int)$HTTP_GET_VARS['order_id'] . "' and osh.orders_status_id = os.orders_status_id and os.language_id = '" . (int)$languages_id . "' order by osh.date_added");
  $i=0;
  while ($statuses = tep_db_fetch_array($statuses_query)) {
   $status[$i]['date']=tep_date_short($statuses['date_added']);
   $status[$i]['name']=$statuses['orders_status_name'];
   $status[$i]['comments']=(empty($statuses['comments']) ? '&nbsp;' : nl2br(tep_output_string_protected($statuses['comments'])));
   $i++;
  }
  $xoopsTpl->assign("status",$status);
  if (DOWNLOAD_ENABLED == 'true') {
     include(DIR_WS_MODULES . 'downloads.php');
     $xoopsTpl->assign("download",1);
  }
  $xoopsTpl->assign("ah_link",tep_href_link(FILENAME_ACCOUNT_HISTORY, tep_get_all_get_params(array('order_id')), 'SSL') );
  $xoopsTpl->assign("bt_back",tep_image_button('button_back.gif', IMAGE_BUTTON_BACK));
  $xoopsTpl->assign("seperator1",tep_draw_separator('pixel_trans.gif', '10', '1'));
  include_once XOOPS_ROOT_PATH.'/footer.php';
  include("includes/application_bottom.php");
?>