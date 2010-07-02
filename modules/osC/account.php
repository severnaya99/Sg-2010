<?php
/* 
  $Id: account.php 149 2006-01-27 13:31:07Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
  
  adapted 2005 for xoops 2.0.x by FlinkUX e.K. <http://www.flinkux.de>
  
  (c) 2005  Michael Hammelmann <michael.hammelmann@flinkux.de>

*/

  require('includes/application_top.php');
  $xoopsOption['template_main'] = 'account.html';
  include XOOPS_ROOT_PATH.'/header.php';
  $xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" />');

  if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot();
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
  }

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_ACCOUNT);

  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_ACCOUNT, '', 'SSL'));
  include("includes/header.php");
  $xoopsTpl->assign("site_image",tep_image(DIR_WS_IMAGES . 'table_background_account.gif', HEADING_TITLE, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT));
  $xoopsTpl->assign("seperator",tep_draw_separator('pixel_trans.gif', '100%', '10'));
  $xoopsTpl->assign("seperator1",tep_draw_separator('pixel_trans.gif', '10', '1'));
	$xoopsTpl->assign("account_history_link",tep_href_link(FILENAME_ACCOUNT_HISTORY, '', 'SSL'));
  if ($messageStack->size('account') > 0) {
	$xoopsTpl->assign("smessage",1);
	$xoopsTpl->assign("messagetext",$messageStack->output('account'));
  }
  if (tep_count_customer_orders() > 0) {
    $xoopsTpl->assign("scustorder",1);

	$xoopsTpl->assign("arrow_se",tep_image(DIR_WS_IMAGES . 'arrow_south_east.gif'));
    $orders_query = tep_db_query("select o.orders_id, o.date_purchased, o.delivery_name, o.delivery_country, o.billing_name, o.billing_country, ot.text as order_total, s.orders_status_name from " . TABLE_ORDERS . " o, " . TABLE_ORDERS_TOTAL . " ot, " . TABLE_ORDERS_STATUS . " s where o.customers_id = '" . (int)$customer_id . "' and o.orders_id = ot.orders_id and ot.class = 'ot_total' and o.orders_status = s.orders_status_id and s.language_id = '" . (int)$languages_id . "' order by orders_id desc limit 3");
	$i=0;
	$xoopsTpl->assign("bt_small_view",tep_image_button('small_view.gif', SMALL_IMAGE_BUTTON_VIEW));
    while ($orders = tep_db_fetch_array($orders_query)) {
	  $ordertext[$i]=$orders;
      if (tep_not_null($orders['delivery_name'])) {
        $order_name = $orders['delivery_name'];
		$ordertext[$i]['name']= tep_output_string_protected($orders['delivery_name']);
        $order_country = $orders['delivery_country'];
      } else {
        $order_name = $orders['billing_name'];
		$ordertext[$i]['name']=tep_output_string_protected($orders['billing_name']);
        $order_country = $orders['billing_country'];
		$ordertext[$i]['country']=$orders['billing_country'];
      }
	  $ordertext[$i]['date_purchased'] = tep_date_short($orders['date_purchased']);
	  $ordertext[$i]['link'] = tep_href_link(FILENAME_ACCOUNT_HISTORY_INFO, 'order_id=' . $orders['orders_id'], 'SSL');
     $i++;
	}
  }
  $xoopsTpl->assign("ordertext",$ordertext);
  $xoopsTpl->assign("img_account_personal",tep_image(DIR_WS_IMAGES . 'account_personal.gif'));
  $xoopsTpl->assign("arrow_green",tep_image(DIR_WS_IMAGES . 'arrow_green.gif'));
  $xoopsTpl->assign("account_edit",tep_href_link(FILENAME_ACCOUNT_EDIT, '', 'SSL'));
  $xoopsTpl->assign("account_address_book",tep_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL'));
  $xoopsTpl->assign("account_password",XOOPS_URL."/modules/profile/changepass.php");
//  $xoopsTpl->assign("account_password",tep_href_link(FILENAME_ACCOUNT_PASSWORD, '', 'SSL'));
// $xoopsTpl->assign("account_password",tep_href_link(FILENAME_ACCOUNT_PASSWORD, '', 'SSL'));
  $xoopsTpl->assign("account_orders",tep_image(DIR_WS_IMAGES . 'account_orders.gif'));
  $xoopsTpl->assign("img_account_notifications",tep_image(DIR_WS_IMAGES . 'account_notifications.gif'));
  $xoopsTpl->assign("account_newsletter",	tep_href_link(FILENAME_ACCOUNT_NEWSLETTERS, '', 'SSL'));
  $xoopsTpl->assign("account_notifications",tep_href_link(FILENAME_ACCOUNT_NOTIFICATIONS, '', 'SSL'));
include_once XOOPS_ROOT_PATH.'/footer.php';
include(XOOPS_ROOT_PATH."/modules/osC/includes/application_bottom.php");
?>
