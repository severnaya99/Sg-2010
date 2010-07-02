<?php
/*
  
  $Id: account_history.php 82 2006-01-21 16:14:19Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License

  adapted 2005 for xoops 2.0.x by FlinkUX e.K. <http://www.flinkux.de>
  
  (c) 2005  Michael Hammelmann <michael.hammelmann@flinkux.de>
*/

  require('includes/application_top.php');
  $xoopsOption['template_main'] = 'account_history.html';
  include XOOPS_ROOT_PATH.'/header.php';
  $xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" />');

  if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot();
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
  }

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_ACCOUNT_HISTORY);

  $breadcrumb->add(NAVBAR_TITLE_1, tep_href_link(FILENAME_ACCOUNT, '', 'SSL'));
  $breadcrumb->add(NAVBAR_TITLE_2, tep_href_link(FILENAME_ACCOUNT_HISTORY, '', 'SSL'));
  include("includes/header.php");
  $xoopsTpl->assign("site_image",tep_image(DIR_WS_IMAGES . 'table_background_history.gif', HEADING_TITLE, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT));
  $xoopsTpl->assign("seperator",tep_draw_separator('pixel_trans.gif', '100%', '10'));
  $xoopsTpl->assign("seperator1",tep_draw_separator('pixel_trans.gif', '1', '10'));
  $xoopsTpl->assign("seperator2",tep_draw_separator('pixel_trans.gif', '10', '1'));
  $orders_total = tep_count_customer_orders();

  if ($orders_total > 0) {
    $xoopsTpl->assign("orders",1);
    $history_query_raw = "select o.orders_id, o.date_purchased, o.delivery_name, o.billing_name, ot.text as order_total, s.orders_status_name from " . TABLE_ORDERS . " o, " . TABLE_ORDERS_TOTAL . " ot, " . TABLE_ORDERS_STATUS . " s where o.customers_id = '" . (int)$customer_id . "' and o.orders_id = ot.orders_id and ot.class = 'ot_total' and o.orders_status = s.orders_status_id and s.language_id = '" . (int)$languages_id . "' order by orders_id DESC";
    $history_split = new splitPageResults($history_query_raw, MAX_DISPLAY_ORDER_HISTORY);
    $history_query = tep_db_query($history_split->sql_query);
    $i=0;
	$xoopsTpl->assign("img_small",tep_image_button('small_view.gif', SMALL_IMAGE_BUTTON_VIEW));
    while ($history = tep_db_fetch_array($history_query)) {
	  $tmp_history[$i]=$history;
      $products_query = tep_db_query("select count(*) as count from " . TABLE_ORDERS_PRODUCTS . " where orders_id = '" . (int)$history['orders_id'] . "'");
      $products = tep_db_fetch_array($products_query);
      $tmp_history[$i]['count']=$products['count'];
      if (tep_not_null($history['delivery_name'])) {
        $order_type = TEXT_ORDER_SHIPPED_TO;
        $order_name = $history['delivery_name'];
		$tmp_history[$i]['type']=TEXT_ORDER_SHIPPED_TO;
		$tmp_history[$i]['name']=tep_output_string_protected($history['delivery_name']);
      } else {
        $order_type = TEXT_ORDER_BILLED_TO;
        $order_name = $history['billing_name'];
		$tmp_history[$i]['type']=TEXT_ORDER_BILLED_TO;
		$tmp_history[$i]['name']=tep_output_string_protected($history['billing_name']);

      }
	  $tmp_history[$i]['date_purchased']=tep_date_long($history['date_purchased']);
	  $tmp_history[$i]['order_total']= strip_tags($history['order_total']);
	  $tmp_history[$i]['link']=tep_href_link(FILENAME_ACCOUNT_HISTORY_INFO, (isset($HTTP_GET_VARS['page']) ? 'page=' . $HTTP_GET_VARS['page'] . '&' : '') . 'order_id=' . $history['orders_id'], 'SSL');
      $i++;
    }
  } 
  $xoopsTpl->assign("tmp_history",$tmp_history);
  if ($orders_total > 0) {
   $xoopsTpl->assign("history_count",$history_split->display_count(TEXT_DISPLAY_NUMBER_OF_ORDERS));
   $xoopsTpl->assign("history_result",$history_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y'))));
  }
  $xoopsTpl->assign("account",tep_href_link(FILENAME_ACCOUNT, '', 'SSL'));
  $xoopsTpl->assign("bt_back",tep_image_button('button_back.gif', IMAGE_BUTTON_BACK));
  include_once XOOPS_ROOT_PATH.'/footer.php';
  include("includes/application_bottom.php");
?>