<?php
/**
 * $Id: checkout_success.php 126 2006-01-21 16:16:00Z Michael $

 * osCommerce, Open Source E-Commerce Solutions
 * http://www.oscommerce.com

 * Copyright (c) 2003 osCommerce

 * Released under the GNU General Public License

 * adapted 2005 for xoops 2.0.x by FlinkUX e.K. <http://www.flinkux.de>
  
 * (c) 2005  Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @package xosC
**/

  require('includes/application_top.php');
  $xoopsOption['template_main'] = 'checkout_success.html';
  include XOOPS_ROOT_PATH.'/header.php';
  $xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" />');

// if the customer is not logged on, redirect them to the shopping cart page
  if (!tep_session_is_registered('customer_id')) {
    tep_redirect(tep_href_link(FILENAME_SHOPPING_CART));
  }

  if (isset($HTTP_GET_VARS['action']) && ($HTTP_GET_VARS['action'] == 'update')) {
    $notify_string = 'action=notify&';
    $notify = $HTTP_POST_VARS['notify'];
    if (!is_array($notify)) $notify = array($notify);
    for ($i=0, $n=sizeof($notify); $i<$n; $i++) {
      $notify_string .= 'notify[]=' . $notify[$i] . '&';
    }
    if (strlen($notify_string) > 0) $notify_string = substr($notify_string, 0, -1);

    tep_redirect(tep_href_link(FILENAME_DEFAULT, $notify_string));
  }

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_CHECKOUT_SUCCESS);
     //begin add receipt print orders pdf

  $oID = tep_db_prepare_input($HTTP_GET_VARS['oID']);
  $orders_query = tep_db_query("select orders_id from " . TABLE_ORDERS . " where orders_id = '" . (int)$oID . "'");
 
  include(DIR_WS_CLASSES . 'order.php');
  $order = new order($oID);

  // Kundennummer in print_orders_pdf.php einfuegen
$the_extra_query= tep_db_query("select * from " . TABLE_ORDERS . " where orders_id = '" . tep_db_input($oID) . "'");
$the_extra= tep_db_fetch_array($the_extra_query);
$the_customers_id= $the_extra['customers_id'];
$the_extra_query= tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id = '" . $the_customers_id . "'");
$the_extra= tep_db_fetch_array($the_extra_query);
$the_customers_fax= $the_extra['customers_fax'];
// Ende Kundennummer in print_orders_pdf

$orders_query = tep_db_query("select orders_id, customers_id from " . TABLE_ORDERS . " where customers_id = '" . (int)$customer_id . "' order by date_purchased desc limit 1");
$order = tep_db_fetch_array($orders_query);

    //end add receipt print orders pdf
$xoopsTpl->assign("pdf_order_id",$order['orders_id'] );
$xoopsTpl->assign("pdf_customer_id",$order['customers_id']);
$xoopsTpl->assign("print_order_link",tep_href_link(FILENAME_PRINT_ORDERS_PDF, 'oID=' . $last_order));
$xoopsTpl->assign("bt_print",tep_image_button('button_print_order.gif', IMAGE_BUTTON_PRINT_ORDER));

  $breadcrumb->add(NAVBAR_TITLE_1);
  $breadcrumb->add(NAVBAR_TITLE_2);

  $global_query = tep_db_query("select global_product_notifications from " . TABLE_CUSTOMERS_INFO . " where customers_info_id = '" . (int)$customer_id . "'");
  $global = tep_db_fetch_array($global_query);

  if ($global['global_product_notifications'] != '1') {
    $orders_query = tep_db_query("select orders_id from " . TABLE_ORDERS . " where customers_id = '" . (int)$customer_id . "' order by date_purchased desc limit 1");
    $orders = tep_db_fetch_array($orders_query);

    $products_array = array();
    $products_query = tep_db_query("select products_id, products_name from " . TABLE_ORDERS_PRODUCTS . " where orders_id = '" . (int)$orders['orders_id'] . "' order by products_name");
    while ($products = tep_db_fetch_array($products_query)) {
      $products_array[] = array('id' => $products['products_id'],
                                'text' => $products['products_name']);
    }
  }
 include("includes/header.php");

  $xoopsTpl->assign("form_order",tep_draw_form('order', tep_href_link(FILENAME_CHECKOUT_SUCCESS, 'action=update', 'SSL')));
  $xoopsTpl->assign("site_image",tep_image(DIR_WS_IMAGES . 'table_background_man_on_board.gif', HEADING_TITLE));
  $xoopsTpl->assign("seperator",tep_draw_separator('pixel_trans.gif', '1', '10'));
  $xoopsTpl->assign("seperator1",tep_draw_separator('pixel_trans.gif', '100%', '10'));
  $xoopsTpl->assign("seperator_silver",tep_draw_separator('pixel_silver.gif', '1', '5'));
  $xoopsTpl->assign("seperator_silver1",tep_draw_separator('pixel_silver.gif', '100%', '1'));
  if ($global['global_product_notifications'] != '1') {
    $xoopsTpl->assign("gpn",0);

    $products_displayed = array();
    for ($i=0, $n=sizeof($products_array); $i<$n; $i++) {
      if (!in_array($products_array[$i]['id'], $products_displayed)) {
        $show_products[$i]['field']= tep_draw_checkbox_field('notify[]', $products_array[$i]['id']) ;
		$show_products[$i]['text'] =   $products_array[$i]['text'];     
	    $products_displayed[] = $products_array[$i]['id'];
      }
    }
   $xoopsTpl->assign("products",$show_products);
  }
  // ###### Added CCGV Contribution #########
// require('add_checkout_success.php'); //ICW CREDIT CLASS/GV SYSTEM 
//ICW ADDED FOR ORDER_TOTAL CREDIT SYSTEM - Start Addition
  $gv_query=tep_db_query("select amount from " . TABLE_COUPON_GV_CUSTOMER . " where customer_id='".$_SESSION['customer_id']."'");
  if ($gv_result=tep_db_fetch_array($gv_query)) {
    if ($gv_result['amount'] > 0) {
	  $xoopsTpl->assign("showGift",1);
	  $xoopsTpl->assign("GiftLink",tep_href_link(FILENAME_GV_SEND));
}}
//ICW ADDED FOR ORDER_TOTAL CREDIT SYSTEM - End Addition

// ###### Added CCGV Contribution #########
  $xoopsTpl->assign("bt_continue",tep_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE));
  $xoopsTpl->assign("bullet",tep_image(DIR_WS_IMAGES . 'checkout_bullet.gif'));
 if (DOWNLOAD_ENABLED == 'true')  $xoopsTpl->assign("downloads",1);
  include_once XOOPS_ROOT_PATH.'/footer.php';
  include("includes/application_bottom.php");
?>
