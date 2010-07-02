<?php
/**
 * $Id: checkout_payment.php 108 2006-01-21 16:15:23Z Michael $
 * osCommerce, Open Source E-Commerce Solutions
 * http://www.oscommerce.com
 * Copyright (c) 2003 osCommerce
 * Released under the GNU General Public License
 * adapted 2005 for xoops 2.0.x by FlinkUX e.K. <http://www.flinkux.de>
 * (c) 2005  Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @package xosC
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
**/
include("includes/application_top.php");

$xoopsOption['template_main'] = 'checkout_payment.html';
include XOOPS_ROOT_PATH.'/header.php';


// if the customer is not logged on, redirect them to the login page
  if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot();
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
  }

// if there is nothing in the customers cart, redirect them to the shopping cart page
  if ($cart->count_contents() < 1) {
    tep_redirect(tep_href_link(FILENAME_SHOPPING_CART));
  }

// if no shipping method has been selected, redirect the customer to the shipping method selection page
  if (!tep_session_is_registered('shipping')) {
    tep_redirect(tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'));
  }

// avoid hack attempts during the checkout procedure by checking the internal cartID
  if (isset($cart->cartID) && tep_session_is_registered('cartID')) {
    if ($cart->cartID != $cartID) {
      tep_redirect(tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'));
    }
  }
// #################### Added CGV ######################
	if(tep_session_is_registered('credit_covers')) tep_session_unregister('credit_covers');  // CCGV Contribution
// #################### End Added CGV ######################

// Stock Check
  if ( (STOCK_CHECK == 'true') && (STOCK_ALLOW_CHECKOUT != 'true') ) {
    $products = $cart->get_products();
    for ($i=0, $n=sizeof($products); $i<$n; $i++) {
      if (tep_check_stock($products[$i]['id'], $products[$i]['quantity'])) {
        tep_redirect(tep_href_link(FILENAME_SHOPPING_CART));
        break;
      }
    }
  }

// if no billing destination address was selected, use the customers own address as default
  if (!tep_session_is_registered('billto')) {
    tep_session_register('billto');
    $billto = $customer_default_address_id;
  } else {
// verify the selected billing address
    $check_address_query = tep_db_query("select count(*) as total from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . (int)$customer_id . "' and address_book_id = '" . (int)$billto . "'");
    $check_address = tep_db_fetch_array($check_address_query);

    if ($check_address['total'] != '1') {
      $billto = $customer_default_address_id;
      if (tep_session_is_registered('payment')) tep_session_unregister('payment');
    }
  }

  require(DIR_WS_CLASSES . 'order.php');
  $order = new order;

// #################### Added CGV ######################
  require(DIR_WS_CLASSES . 'order_total.php');//ICW ADDED FOR CREDIT CLASS SYSTEM
  $order_total_modules = new order_total;//ICW ADDED FOR CREDIT CLASS SYSTEM
  $order_total_modules->clear_posts(); // ADDED FOR CREDIT CLASS SYSTEM by Rigadin in v5.13
// #################### End Added CGV ######################

  if (!tep_session_is_registered('comments')) tep_session_register('comments');

  $total_weight = $cart->show_weight();
  $total_count = $cart->count_contents();

// #################### Added CGV ######################
  $total_count = $cart->count_contents_virtual(); //ICW ADDED FOR CREDIT CLASS SYSTEM
// #################### End Added CGV ######################


// load all enabled payment modules
  require(DIR_WS_CLASSES . 'payment.php');
  $payment_modules = new payment;
  $xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" />'.$payment_modules->javascript_validation());

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_CHECKOUT_PAYMENT);

  $breadcrumb->add(NAVBAR_TITLE_1, tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'));
  $breadcrumb->add(NAVBAR_TITLE_2, tep_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL'));
  include("includes/header.php");
  $xoopsTpl->assign("payment_form",tep_draw_form('checkout_payment', tep_href_link(FILENAME_CHECKOUT_CONFIRMATION, '', 'SSL'), 'post', 'onsubmit="return check_form();"'));
  $xoopsTpl->assign("py_img",tep_image(DIR_WS_IMAGES . 'table_background_payment.gif', HEADING_TITLE, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT));
  if (isset($HTTP_GET_VARS['payment_error']) && is_object(${$HTTP_GET_VARS['payment_error']}) && ($error = ${$HTTP_GET_VARS['payment_error']}->get_error())) {
	$xoopsTpl->assign("error",1);
	$xoopsTpl->assign("err_title",tep_output_string_protected($error['title']));
	$xoopsTpl->assign("err_txt",tep_output_string_protected($error['error']));
  }
  $xoopsTpl->assign("chk_link",tep_href_link(FILENAME_CHECKOUT_PAYMENT_ADDRESS, '', 'SSL'));
  $xoopsTpl->assign("chk_img",tep_image_button('button_change_address.gif', IMAGE_BUTTON_CHANGE_ADDRESS));
  $xoopsTpl->assign("arrow_se",tep_image(DIR_WS_IMAGES . 'arrow_south_east.gif'));
  $xoopsTpl->assign("cust_lbl",tep_address_label($customer_id, $billto, true, ' ', '<br>'));
  $selection = $payment_modules->selection();

  if (sizeof($selection) > 1) {
  	$xoopsTpl->assign("selection",1);
  }

  $radio_buttons = 0;
  for ($i=0, $n=sizeof($selection); $i<$n; $i++) {
	$selection[$i]['radio']=$radio_buttons;
    if ( ($selection[$i]['id'] == $payment) || ($n == 1) ) {
		$selection[$i]['on']=1;
    }
    if (sizeof($selection) > 1) {
      $selection[$i]['field']=tep_draw_radio_field('payment', $selection[$i]['id']);
    } else {
     $selection[$i]['field'] = tep_draw_hidden_field('payment', $selection[$i]['id']);
    }
    if (isset($selection[$i]['error'])) {
		$selection[$i]['serr']==1;
    } elseif (isset($selection[$i]['fields']) && is_array($selection[$i]['fields'])) {
				$selection[$i]['sfields']=1;
      for ($j=0, $n2=sizeof($selection[$i]['fields']); $j<$n2; $j++) {
	  				$fields[$i]=$selection[$i]['fields'];
      }
    }
    $radio_buttons++;
  }
$xoopsTpl->assign("selections",$selection);
$xoopsTpl->assign("fields",$fields);
 // #################### Added CGV ###################### 
$xoopsTpl->assign("coupon_text",$order_total_modules->credit_selection());//ICW ADDED FOR CREDIT CLASS SYSTEM
 // #################### End Added CGV ######################
$xoopsTpl->assign("comment",tep_draw_textarea_field('comments', 'soft', '60', '5'));
$xoopsTpl->assign("cont_img", tep_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE));
$xoopsTpl->assign("co_img", tep_image(DIR_WS_IMAGES . 'checkout_bullet.gif')); 
$xoopsTpl->assign("co_link", tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL') );
  include_once XOOPS_ROOT_PATH.'/footer.php';
  include(XOOPS_ROOT_PATH."/modules/osC/includes/application_bottom.php");


?>