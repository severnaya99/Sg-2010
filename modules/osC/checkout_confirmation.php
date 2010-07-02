<?php
/**
 * $Id: checkout_confirmation.php 94 2006-01-21 16:14:48Z Michael $
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

  require('includes/application_top.php');

$xoopsOption['template_main'] = 'checkout_confirmation.html';
include XOOPS_ROOT_PATH.'/header.php';
$xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" />');

// if the customer is not logged on, redirect them to the login page
  if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot(array('mode' => 'SSL', 'page' => FILENAME_CHECKOUT_PAYMENT));
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
  }

// if there is nothing in the customers cart, redirect them to the shopping cart page
  if ($cart->count_contents() < 1) {
    tep_redirect(tep_href_link(FILENAME_SHOPPING_CART));
  }

// avoid hack attempts during the checkout procedure by checking the internal cartID
  if (isset($cart->cartID) && tep_session_is_registered('cartID')) {
    if ($cart->cartID != $cartID) {
      tep_redirect(tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'));
    }
  }

// if no shipping method has been selected, redirect the customer to the shipping method selection page
  if (!tep_session_is_registered('shipping')) {
    tep_redirect(tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'));
  }

/**
 * Pre order processing
**/
  $module_directory = DIR_WS_MODULES . 'pre_order_processing/';


  $directory_array = array();
  if ($dir = @dir($module_directory)) {
    while ($file = $dir->read()) {
      if (!is_dir($module_directory . $file)) {
        if (substr($file, strrpos($file, '.')) == '.php') {
          $directory_array[] = $file;
        }
      }
    }
    sort($directory_array);
    $dir->close();
  }
  $error=false;
  $preopHTML='';
  $installed_modules = array();
  for ($i=0, $n=sizeof($directory_array); $i<$n; $i++) {
    $file = $directory_array[$i];

    include(DIR_WS_LANGUAGES . $language . '/modules/pre_order_processing/' . $file);
    include($module_directory . $file);

    $class = substr($file, 0, strrpos($file, '.'));
    if (tep_class_exists($class)) {
      $module = new $class;
      if ($module->check() > 0) {
	    $xoopsTpl->assign("preop",1);
		$preopHTML.=$module->showHTML();
// Validierung
		if($module->validate()) $error=true;

	  }
    }
  }

  if(isset($_POST['send']) && $_POST['send'] == 1 ) {
    if($error==false) {
	  tep_redirect(tep_href_link(FILENAME_CHECKOUT_PROCESS,'','SSL'));
	 }
	$xoopsTpl->assign("serror",1); 
	$xoopsTpl->assign("errortext",$messageStack->output('checkout_confirmation'));
  }
  if (!tep_session_is_registered('payment')) tep_session_register('payment');
  if (isset($HTTP_POST_VARS['payment'])) $payment = $HTTP_POST_VARS['payment'];

  if (!tep_session_is_registered('comments')) tep_session_register('comments');
  if (tep_not_null($HTTP_POST_VARS['comments'])) {
    $comments = tep_db_prepare_input($HTTP_POST_VARS['comments']);
  }

// load the selected payment module
  require(DIR_WS_CLASSES . 'payment.php');
  $payment_modules = new payment($payment);

// ################# Added CGV Contribution ##################"
  if (isset($credit_covers) && $credit_covers ) $payment=''; 
// ################# End Added CGV Contribution ##################"
 // $payment_modules = new payment($payment);
// ################# Added CGV Contribution ##################"
  require(DIR_WS_CLASSES . 'order_total.php');
// ################# End Added CGV Contribution ##################"

  require(DIR_WS_CLASSES . 'order.php');
  $order = new order;

  $payment_modules->update_status();
// ################# Added CGV Contribution ##################"
// CCGV Contribution
  $order_total_modules = new order_total;
  $order_total_modules->collect_posts();
  $order_total_modules->pre_confirmation_check();

//  if ( ( is_array($payment_modules->modules) && (sizeof($payment_modules->modules) > 1) && !is_object($$payment) ) || (is_object($$payment) && ($$payment->enabled == false)) ) {
  if ( (is_array($payment_modules->modules)) && (sizeof($payment_modules->modules) > 1) && (!is_object($$payment)) && (!$credit_covers) ) {
// ################# End Added CGV Contribution ##################"

 // if ( ( is_array($payment_modules->modules) && (sizeof($payment_modules->modules) > 1) && !is_object($$payment) ) || (is_object($$payment) && ($$payment->enabled == false)) ) {
    tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . urlencode(ERROR_NO_PAYMENT_MODULE_SELECTED), 'SSL'));
  }

  if (is_array($payment_modules->modules)) {
    $payment_modules->pre_confirmation_check();
  }

// load the selected shipping module
  require(DIR_WS_CLASSES . 'shipping.php');
  $shipping_modules = new shipping($shipping);

//  require(DIR_WS_CLASSES . 'order_total.php');
//  $order_total_modules = new order_total;

// Stock Check
  $any_out_of_stock = false;
  if (STOCK_CHECK == 'true') {
    for ($i=0, $n=sizeof($order->products); $i<$n; $i++) {
      if (tep_check_stock($order->products[$i]['id'], $order->products[$i]['qty'])) {
        $any_out_of_stock = true;
      }
    }
    // Out of Stock
    if ( (STOCK_ALLOW_CHECKOUT != 'true') && ($any_out_of_stock == true) ) {
      tep_redirect(tep_href_link(FILENAME_SHOPPING_CART));
    }
  }

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_CHECKOUT_CONFIRMATION);

  $breadcrumb->add(NAVBAR_TITLE_1, tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'));
  $breadcrumb->add(NAVBAR_TITLE_2);
  include("includes/header.php");
  $attr=array();
  $xoopsTpl->assign("top_img", tep_image(DIR_WS_IMAGES . 'table_background_confirmation.gif', HEADING_TITLE, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT)); 

  if ($sendto != false) {
   $xoopsTpl->assign("sendto",1);
   $xoopsTpl->assign("co_link", tep_href_link(FILENAME_CHECKOUT_SHIPPING_ADDRESS, '', 'SSL'));
   $xoopsTpl->assign("address", tep_address_format($order->delivery['format_id'], $order->delivery, 1, ' ', '<br>')); 
    if ($order->info['shipping_method']) {
	  $xoopsTpl->assign("orderinfo",1);
	  $xoopsTpl->assign("cos_link", tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'));
	  $xoopsTpl->assign("ordership",  $order->info['shipping_method']);

    }
  }
  $xoopsTpl->assign("stw",(($sendto != false) ? '70%' : '100%'));
  $xoopsTpl->assign("ot_link",tep_href_link(FILENAME_SHOPPING_CART));
  if (sizeof($order->info['tax_groups']) > 1) {
    $xoopsTpl->assign("ordertax",1);
  }
  $products=$order->products;
  for ($i=0, $n=sizeof($order->products); $i<$n; $i++) {
   
    if (STOCK_CHECK == 'true') {
	  $products[$i]['stock'] = tep_check_stock($order->products[$i]['id'], $order->products[$i]['qty']);
    //  echo tep_check_stock($order->products[$i]['id'], $order->products[$i]['qty']);
    }

    if ( (isset($order->products[$i]['attributes'])) && (sizeof($order->products[$i]['attributes']) > 0) ) {
    $attr[$i]=$order->products[$i]['attributes'];
      for ($j=0, $n2=sizeof($order->products[$i]['attributes']); $j<$n2; $j++) {
		$xoopsTpl->assign("attribs",1);
      }
    }

    $taxgroups=$order->info['tax_groups'];
    if (sizeof($order->info['tax_groups']) > 1) {
	 $products[$i]['stax']=1;
	 $products[$i]['taxd']= tep_display_tax_value($order->products[$i]['tax']) ;
	}
	$products[$i]['final_price']=$currencies->display_price($order->products[$i]['final_price'], $order->products[$i]['tax'], $order->products[$i]['qty']);
  }
   $xoopsTpl->assign("fcpa_link", tep_href_link(FILENAME_CHECKOUT_PAYMENT_ADDRESS, '', 'SSL'));
   $xoopsTpl->assign("bad", tep_address_format($order->billing['format_id'], $order->billing, 1, ' ', '<br>')); 
   $xoopsTpl->assign("fcp_link", tep_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL'));
   $xoopsTpl->assign("cos_link",tep_href_link(FILENAME_CHECKOUT_SHIPPING,'','SSL'));
   $xoopsTpl->assign("omt", $order->info['payment_method']);

   if (MODULE_ORDER_TOTAL_INSTALLED) {
    $xoopsTpl->assign("mot",1);
	$order_total_modules->process();
	$xoopsTpl->assign("motc",$order_total_modules->output());
  }

  if (is_array($payment_modules->modules)) {

    if ($confirmation = $payment_modules->confirmation()) {
      $xoopsTpl->assign("pmods",1); 
	  $conffields=$confirmation['fields'];
      for ($i=0, $n=sizeof($confirmation['fields']); $i<$n; $i++) {
		$r=$i;
      }
    }
  }
  if (tep_not_null($order->info['comments'])) {
    $xoopsTpl->assign("comment",1);
    $xoopsTpl->assign("comments", nl2br(tep_output_string_protected($order->info['comments'])));
    $xoopsTpl->assign("commentfield", tep_draw_hidden_field('comments', $order->info['comments'])); 
  }
  if (isset($$payment->form_action_url)) {
    $form_action_url = $$payment->form_action_url;
  } else {
//    $form_action_url = tep_href_link(FILENAME_CHECKOUT_PROCESS, '', 'SSL');
	  $form_action_url = tep_href_link(FILENAME_CHECKOUT_CONFIRMATION,'','SSL');
  }
  $xoopsTpl->assign("co_form",tep_draw_form('checkout_confirmation', $form_action_url, 'post'));

  $xoopsTpl->assign("send",tep_draw_hidden_field('send',1));
  $xoopsTpl->assign("preorderprocess",$preopHTML);
  if (is_array($payment_modules->modules)) {
    $xoopsTpl->assign("cob",$payment_modules->process_button());
  }
  $xoopsTpl->assign("cobc",tep_image_submit('button_confirm_order.gif', IMAGE_BUTTON_CONFIRM_ORDER));
  $xoopsTpl->assign("cobullet", tep_image(DIR_WS_IMAGES . 'checkout_bullet.gif')); 
  $xoopsTpl->assign("products",$products);
  $xoopsTpl->assign("attr",$attr);

include_once XOOPS_ROOT_PATH.'/footer.php';
include(XOOPS_ROOT_PATH."/modules/osC/includes/application_bottom.php");?>