<?php
/**
 * $Id: checkout_shipping.php 78 2006-01-21 16:14:04Z Michael $
 
 * osCommerce, Open Source E-Commerce Solutions
 * http://www.oscommerce.com

 * Copyright (c) 2003 osCommerce

 * Released under the GNU General Public License

 * adapted 2005 for xoops 2.0.x by FlinkUX e.K. <http://www.flinkux.de>
  
 * (c) 2005  Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @package xosC
**/
include("includes/application_top.php");

$xoopsOption['template_main'] = 'checkout_shipping.html';
include XOOPS_ROOT_PATH.'/header.php';
$xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" />');

  require('includes/classes/http_client.php');

// if the customer is not logged on, redirect them to the login page
  if (!session_is_registered('customer_id')) {
    $navigation->set_snapshot();
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
  }

// if there is nothing in the customers cart, redirect them to the shopping cart page
  if ($cart->count_contents() < 1) {
    tep_redirect(tep_href_link(FILENAME_SHOPPING_CART));
  }

// if no shipping destination address was selected, use the customers own address as default
  if (!session_is_registered('sendto')) {
    session_register('sendto');
    $sendto = $customer_default_address_id;
	$_SESSION['sendto']=$sendto;
  } else {
// verify the selected shipping address
    $check_address_query = tep_db_query("select count(*) as total from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . (int)$customer_id . "' and address_book_id = '" . (int)$sendto . "'");
    $check_address = tep_db_fetch_array($check_address_query);

    if ($check_address['total'] != '1') {
      $sendto = $customer_default_address_id;
	  $_SESSION['sendto']=$sendto;
      if (session_is_registered('shipping')) session_unregister('shipping');
    }
  }

  require(DIR_WS_CLASSES . 'order.php');
  $order = new order;

// register a random ID in the session to check throughout the checkout procedure
// against alterations in the shopping cart contents
  if (!session_is_registered('cartID')) session_register('cartID');
  $cartID = $cart->cartID;
  $_SESSION['cartID'] = $cartID;

// ###### Added CCGV Contribution #########
//  if ($order->content_type == 'virtual') {
  if (($order->content_type == 'virtual') || ($order->content_type == 'virtual_weight') ) {
// ###### End Added CCGV Contribution #########

// if the order contains only virtual products, forward the customer to the billing page as
// a shipping address is not needed
//  if ($order->content_type == 'virtual') {
    if (!session_is_registered('shipping')) session_register('shipping');
    $shipping = false;
	$_SESSION['shipping']=$shipping;
    $sendto = false;
	$_SESSION['sendto']=$sendto;
    tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL'));
  }

  $total_weight = $cart->show_weight();
  $total_count = $cart->count_contents();

// load all enabled shipping modules
  require(DIR_WS_CLASSES . 'shipping.php');
  $shipping_modules = new shipping;

  if ( defined('MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING') && (MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING == 'true') ) {
    $pass = false;

    switch (MODULE_ORDER_TOTAL_SHIPPING_DESTINATION) {
      case 'national':
        if ($order->delivery['country_id'] == STORE_COUNTRY) {
          $pass = true;
        }
        break;
      case 'international':
        if ($order->delivery['country_id'] != STORE_COUNTRY) {
          $pass = true;
        }
        break;
      case 'both':
        $pass = true;
        break;
    }

    $free_shipping = false;
    if ( ($pass == true) && ($order->info['total'] >= MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING_OVER) ) {
      $free_shipping = true;

      include(DIR_WS_LANGUAGES . $language . '/modules/order_total/ot_shipping.php');
    }
  } else {
    $free_shipping = false;
  }

// process the selected shipping method
  if ( isset($HTTP_POST_VARS['action']) && ($HTTP_POST_VARS['action'] == 'process') ) {
    if (!session_is_registered('comments')) session_register('comments');
    if (tep_not_null($HTTP_POST_VARS['comments'])) {
      $comments = tep_db_prepare_input($HTTP_POST_VARS['comments']);
    }

    if (!session_is_registered('shipping')) session_register('shipping');

    if ( (tep_count_shipping_modules() > 0) || ($free_shipping == true) ) {

      if ( (isset($HTTP_POST_VARS['shipping'])) && (strpos($HTTP_POST_VARS['shipping'], '_')) ) {
        $shipping = $HTTP_POST_VARS['shipping'];

        list($module, $method) = explode('_', $shipping);
        if ( is_object($$module) || ($shipping == 'free_free') ) {
          if ($shipping == 'free_free') {
            $quote[0]['methods'][0]['title'] = FREE_SHIPPING_TITLE;
            $quote[0]['methods'][0]['cost'] = '0';
          } else {
            $quote = $shipping_modules->quote($method, $module);
          }
          if (isset($quote['error'])) {
            session_unregister('shipping');
          } else {
            if ( (isset($quote[0]['methods'][0]['title'])) && (isset($quote[0]['methods'][0]['cost'])) ) {
              $shipping = array('id' => $shipping,
                                'title' => (($free_shipping == true) ?  $quote[0]['methods'][0]['title'] : $quote[0]['module'] . ' (' . $quote[0]['methods'][0]['title'] . ')'),
                                'cost' => $quote[0]['methods'][0]['cost']);

              tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL'));
            }
          }
        } else {

          session_unregister('shipping');
        }

      }

    } else {
      $shipping = false;
                
      tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL'));
    }    
  }

// get all available shipping quotes
  $quotes = $shipping_modules->quote();

// if no shipping method has been selected, automatically select the cheapest method.
// if the modules status was changed when none were available, to save on implementing
// a javascript force-selection method, also automatically select the cheapest shipping
// method if more than one module is now enabled
  if ( !session_is_registered('shipping') || ( session_is_registered('shipping') && ($shipping == false) && (tep_count_shipping_modules() > 1) ) ) $shipping = $shipping_modules->cheapest();

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_CHECKOUT_SHIPPING);

  $breadcrumb->add(NAVBAR_TITLE_1, tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'));
  $breadcrumb->add(NAVBAR_TITLE_2, tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'));
  include("includes/header.php");
  $xoopsTpl->assign("shipping_form",tep_draw_form('checkout_address', tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL')) . tep_draw_hidden_field('action', 'process')); 
  $xoopsTpl->assign("top_image",tep_image(DIR_WS_IMAGES . 'table_background_delivery.gif', HEADING_TITLE, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT));
  $xoopsTpl->assign("check_addr",tep_href_link(FILENAME_CHECKOUT_SHIPPING_ADDRESS, '', 'SSL'));
  $xoopsTpl->assign("check_addr_img",tep_image_button('button_change_address.gif', IMAGE_BUTTON_CHANGE_ADDRESS));
  $xoopsTpl->assign("arrow_se",tep_image(DIR_WS_IMAGES . 'arrow_south_east.gif'));
  $xoopsTpl->assign("addr_label",tep_address_label($customer_id, $sendto, true, ' ', '<br>'));


  if (tep_count_shipping_modules() > 0) {
	$xoopsTpl->assign("shipmod",1);
	if (sizeof($quotes) > 1 && sizeof($quotes[0]) > 1) {
	  $xoopsTpl->assign("shipshow",1);
	} elseif ($free_shipping == false) {
	   $xoopsTpl->assign("freeship",0);
	}
	if ($free_shipping == true) {
	  $xoopsTpl->assign("freeship",1);
	  $xoopsTpl->assign("icon",$quotes[$i]['icon']);
	  $xoopsTpl->assign("ship_desc",sprintf(FREE_SHIPPING_DESCRIPTION, $currencies->format(MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING_OVER)));
	  $xoopsTpl->assign("ship_img",tep_draw_hidden_field('shipping', 'free_free'));
	} else {
      $radio_buttons = 0;
      for ($i=0, $n=sizeof($quotes); $i<$n; $i++) {
	    $tmp_quotes[$i]['module']=$quotes[$i]['module'];
		$tmp_quotes[$i]['icon']="";
	    if (isset($quotes[$i]['icon']) && tep_not_null($quotes[$i]['icon'])) { $tmp_quotes[$i]['icon']= $quotes[$i]['icon']; }
	    if (!isset($quotes[$i]['error'])) { 
			$tmp_quotes[$i]['error']=1; 
		    for ($j=0, $n2=sizeof($quotes[$i]['methods']); $j<$n2; $j++) {
			  $methods[$i]=$quotes[$i]['methods'];
			  $methods[$i][$j]['radio']=$radio_buttons;
			  $radio_buttons++;
// set the radio button to be checked if it is the method chosen
              $checked = (($quotes[$i]['id'] . '_' . $quotes[$i]['methods'][$j]['id'] == $shipping['id']) ? true : false);
			//  $xoopsTpl->assign("radio",$radiobuttons);
              if ( ($checked == true) || ($n == 1 && $n2 == 1) ) {
			  	$xoopsTpl->assign("modecheck",1);
				$methods[$i][$j]['checked']=1;
		      }
              if ( ($n > 1) || ($n2 > 1) ) {
				$methods[$i][$j]['tax']=1;
				$methods[$i][$j]['cost'] = $currencies->format(tep_add_tax($quotes[$i]['methods'][$j]['cost'], (isset($quotes[$i]['tax']) ? $quotes[$i]['tax'] : 0)));
				$methods[$i][$j]['radio_field']=tep_draw_radio_field('shipping', $quotes[$i]['id'] . '_' . $quotes[$i]['methods'][$j]['id'], $checked);
			  } else {
			 	$methods[$i][$j]['cost'] = $currencies->format(tep_add_tax($quotes[$i]['methods'][$j]['cost'], $quotes[$i]['tax']));
				$methods[$i][$j]['hidden_field'] = tep_draw_hidden_field('shipping', $quotes[$i]['id'] . '_' . $quotes[$i]['methods'][$j]['id']);
		      }
		      }
	       }else { $tmp_quotes[$i]['error'] = $quotes[$i]['error']; }
       }
    }
  
  }

  $xoopsTpl->assign("tmp_quotes",$tmp_quotes);
  $xoopsTpl->assign("methods",$methods);
  $xoopsTpl->assign("comments",tep_draw_textarea_field('comments', 'soft', '60', '5'));
  $xoopsTpl->assign("continue",tep_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE));
  $xoopsTpl->assign("checkout",tep_image(DIR_WS_IMAGES . 'checkout_bullet.gif'));
  $separator=tep_draw_separator('pixel_trans.gif', '100%', '10');
  $xoopsTpl->assign("separator",$separator);
	  
	  
	   
  include_once XOOPS_ROOT_PATH.'/footer.php';
  include(XOOPS_ROOT_PATH."/modules/osC/includes/application_bottom.php");
?>