<?php
/*
  $Id: checkout_shipping_address.php 80 2006-01-21 16:14:10Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');
  $xoopsOption['template_main'] = 'checkout_shipping_address.html';
  include XOOPS_ROOT_PATH.'/header.php';
  $xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" />');
// if the customer is not logged on, redirect them to the login page
  if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot();
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
  }

// if there is nothing in the customers cart, redirect them to the shopping cart page
  if ($cart->count_contents() < 1) {
    tep_redirect(tep_href_link(FILENAME_SHOPPING_CART));
  }

  // needs to be included earlier to set the success message in the messageStack
  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_CHECKOUT_SHIPPING_ADDRESS);

  require(DIR_WS_CLASSES . 'order.php');
  $order = new order;

// if the order contains only virtual products, forward the customer to the billing page as
// a shipping address is not needed
  if ($order->content_type == 'virtual') {
    if (!tep_session_is_registered('shipping')) tep_session_register('shipping');
    $shipping = false;
	$_SESSION['shipping']=$shipping;
    if (!tep_session_is_registered('sendto')) tep_session_register('sendto');
    $sendto = false;
	$_SESSION['sendto']=$sendto;
    tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL'));
  }

  $error = false;
  $process = false;
  if (isset($HTTP_POST_VARS['action']) && ($HTTP_POST_VARS['action'] == 'submit')) {
// process a new shipping address
    if (tep_not_null($HTTP_POST_VARS['firstname']) && tep_not_null($HTTP_POST_VARS['lastname']) && tep_not_null($HTTP_POST_VARS['street_address'])) {
      $process = true;

      if (ACCOUNT_GENDER == 'true') $gender = tep_db_prepare_input($HTTP_POST_VARS['gender']);
      if (ACCOUNT_COMPANY == 'true') $company = tep_db_prepare_input($HTTP_POST_VARS['company']);
      $firstname = tep_db_prepare_input($HTTP_POST_VARS['firstname']);
      $lastname = tep_db_prepare_input($HTTP_POST_VARS['lastname']);
      $street_address = tep_db_prepare_input($HTTP_POST_VARS['street_address']);
      if (ACCOUNT_SUBURB == 'true') $suburb = tep_db_prepare_input($HTTP_POST_VARS['suburb']);
      $postcode = tep_db_prepare_input($HTTP_POST_VARS['postcode']);
      $city = tep_db_prepare_input($HTTP_POST_VARS['city']);
      $country = tep_db_prepare_input($HTTP_POST_VARS['country']);
      if (ACCOUNT_STATE == 'true') {
        if (isset($HTTP_POST_VARS['zone_id'])) {
          $zone_id = tep_db_prepare_input($HTTP_POST_VARS['zone_id']);
        } else {
          $zone_id = false;
        }
        $state = tep_db_prepare_input($HTTP_POST_VARS['state']);
      }

      if (ACCOUNT_GENDER == 'true') {
        if ( ($gender != 'm') && ($gender != 'f') ) {
          $error = true;

          $messageStack->add('checkout_address', ENTRY_GENDER_ERROR);
        }
      }

      if (strlen($firstname) < ENTRY_FIRST_NAME_MIN_LENGTH) {
        $error = true;

        $messageStack->add('checkout_address', ENTRY_FIRST_NAME_ERROR);
      }

      if (strlen($lastname) < ENTRY_LAST_NAME_MIN_LENGTH) {
        $error = true;

        $messageStack->add('checkout_address', ENTRY_LAST_NAME_ERROR);
      }

      if (strlen($street_address) < ENTRY_STREET_ADDRESS_MIN_LENGTH) {
        $error = true;

        $messageStack->add('checkout_address', ENTRY_STREET_ADDRESS_ERROR);
      }

      if (strlen($postcode) < ENTRY_POSTCODE_MIN_LENGTH) {
        $error = true;

        $messageStack->add('checkout_address', ENTRY_POST_CODE_ERROR);
      }

      if (strlen($city) < ENTRY_CITY_MIN_LENGTH) {
        $error = true;

        $messageStack->add('checkout_address', ENTRY_CITY_ERROR);
      }

      if (ACCOUNT_STATE == 'true') {
        $zone_id = 0;
        $check_query = tep_db_query("select count(*) as total from " . TABLE_ZONES . " where zone_country_id = '" . (int)$country . "'");
        $check = tep_db_fetch_array($check_query);
        $entry_state_has_zones = ($check['total'] > 0);
        if ($entry_state_has_zones == true) {
          $zone_query = tep_db_query("select distinct zone_id from " . TABLE_ZONES . " where zone_country_id = '" . (int)$country . "' and (zone_name like '" . tep_db_input($state) . "%' or zone_code like '%" . tep_db_input($state) . "%')");
          if (tep_db_num_rows($zone_query) == 1) {
            $zone = tep_db_fetch_array($zone_query);
            $zone_id = $zone['zone_id'];
          } else {
            $error = true;

            $messageStack->add('checkout_address', ENTRY_STATE_ERROR_SELECT);
          }
        } else {
          if (strlen($state) < ENTRY_STATE_MIN_LENGTH) {
            $error = true;

            $messageStack->add('checkout_address', ENTRY_STATE_ERROR);
          }
        }
      }

      if ( (is_numeric($country) == false) || ($country < 1) ) {
        $error = true;

        $messageStack->add('checkout_address', ENTRY_COUNTRY_ERROR);
      }

      if ($error == false) {
        $sql_data_array = array('customers_id' => $customer_id,
                                'entry_firstname' => $firstname,
                                'entry_lastname' => $lastname,
                                'entry_street_address' => $street_address,
                                'entry_postcode' => $postcode,
                                'entry_city' => $city,
                                'entry_country_id' => $country);

        if (ACCOUNT_GENDER == 'true') $sql_data_array['entry_gender'] = $gender;
        if (ACCOUNT_COMPANY == 'true') $sql_data_array['entry_company'] = $company;
        if (ACCOUNT_SUBURB == 'true') $sql_data_array['entry_suburb'] = $suburb;
        if (ACCOUNT_STATE == 'true') {
          if ($zone_id > 0) {
            $sql_data_array['entry_zone_id'] = $zone_id;
            $sql_data_array['entry_state'] = '';
          } else {
            $sql_data_array['entry_zone_id'] = '0';
            $sql_data_array['entry_state'] = $state;
          }
        }

        if (!tep_session_is_registered('sendto')) tep_session_register('sendto');

        tep_db_perform(TABLE_ADDRESS_BOOK, $sql_data_array);

        $sendto = tep_db_insert_id();
	    $_SESSION['sendto']=$sendto;

        if (tep_session_is_registered('shipping')) tep_session_unregister('shipping');

        tep_redirect(tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'));
      }
// process the selected shipping destination
    } elseif (isset($HTTP_POST_VARS['address'])) {
      $reset_shipping = false;
      if (tep_session_is_registered('sendto')) {
        if ($sendto != $HTTP_POST_VARS['address']) {
          if (tep_session_is_registered('shipping')) {
            $reset_shipping = true;
          }
        }
      } else {
        tep_session_register('sendto');
      }

      $sendto = $HTTP_POST_VARS['address'];
      $_SESSION['sendto']=$sendto;
      $check_address_query = tep_db_query("select count(*) as total from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . (int)$customer_id . "' and address_book_id = '" . (int)$sendto . "'");
      $check_address = tep_db_fetch_array($check_address_query);

      if ($check_address['total'] == '1') {
        if ($reset_shipping == true) tep_session_unregister('shipping');
        tep_redirect(tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'));
      } else {
        tep_session_unregister('sendto');
      }
    } else {
      if (!tep_session_is_registered('sendto')) tep_session_register('sendto');
      $sendto = $customer_default_address_id;
      $_SESSION['sendto']=$sendto;
      tep_redirect(tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'));
    }
  }

// if no shipping destination address was selected, use their own address as default
  if (!tep_session_is_registered('sendto')) {
    $sendto = $customer_default_address_id;
	$_SESSION['sendto']=$sendto;
  }

  $breadcrumb->add(NAVBAR_TITLE_1, tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'));
  $breadcrumb->add(NAVBAR_TITLE_2, tep_href_link(FILENAME_CHECKOUT_SHIPPING_ADDRESS, '', 'SSL'));
  include("includes/header.php");
  include("inlcudes/form_check.js.php");
  
  $addresses_count = tep_count_customer_address_book_entries();
  $xoopsTpl->assign("form_ship",tep_draw_form('checkout_address', tep_href_link(FILENAME_CHECKOUT_SHIPPING_ADDRESS, '', 'SSL'), 'post', 'onSubmit="return check_form_optional(checkout_address);"'));
  $xoopsTpl->assign("site_image",tep_image(DIR_WS_IMAGES . 'table_background_delivery.gif', HEADING_TITLE, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT));
  $xoopsTpl->assign("seperator",tep_draw_separator('pixel_trans.gif', '100%', '10'));
  $xoopsTpl->assign("seperator1",tep_draw_separator('pixel_trans.gif', '10', '1'));
  if ($messageStack->size('checkout_address') > 0) {
	$xoopsTpl->assign("message",1);
	$xoopsTpl->assign("messagetext",$messageStack->output('checkout_address'));

  }

  if ($process == false) {
   $xoopsTpl->assign("process",0);
   $xoopsTpl->assign("arrow_se",tep_image(DIR_WS_IMAGES . 'arrow_south_east.gif'));
   $xoopsTpl->assign("ship_adr",tep_address_label($customer_id, $sendto, true, ' ', '<br>'));
   if ($addresses_count > 1) {
	 $xoopsTpl->assign("address",1);
     $radio_buttons = 0;
     $i=0;
	 $addresses_query = tep_db_query("select address_book_id, entry_firstname as firstname, entry_lastname as lastname, entry_company as company, entry_street_address as street_address, entry_suburb as suburb, entry_city as city, entry_postcode as postcode, entry_state as state, entry_zone_id as zone_id, entry_country_id as country_id from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . (int)$customer_id . "'");
     while ($addresses = tep_db_fetch_array($addresses_query)) {
	    $adr[$i]=$addresses;
		$adr[$i]['radio']=$radio_buttons;
        $format_id = tep_get_address_format_id($addresses['country_id']);
       if ($addresses['address_book_id'] == $sendto) {
	     $adr[$i]['sendto'] == 1;
          echo '                  <tr id="defaultSelected" class="moduleRowSelected" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="selectRowEffect(this, ' . $radio_buttons . ')">' . "\n";
        } else {
          echo '                  <tr class="moduleRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="selectRowEffect(this, ' . $radio_buttons . ')">' . "\n";
        }
		$adr[$i]['firstname'] = tep_output_string_protected($addresses['firstname'] . ' ' . $addresses['lastname']);
		$adr[$i]['addressradio'] = tep_draw_radio_field('address', $addresses['address_book_id'], ($addresses['address_book_id'] == $sendto));
		$adr[$i]['address']=tep_address_format($format_id, $addresses, true, ' ', ', ');
        $radio_buttons++;
		$i++;
      }
	  $xoopsTpl->assign("adr",$adr);
    }
  }

  if ($addresses_count < MAX_ADDRESS_BOOK_ENTRIES) {
    $xoopsTpl->assign("maxadr",1);
    require(DIR_WS_MODULES . 'checkout_new_address.php'); 
  }
  $xoopsTpl->assign("action",tep_draw_hidden_field('action', 'submit'));
  $xoopsTpl->assign("bt_continue",tep_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE));
  if ($process == true) {
   $xoopsTpl->assign("process",1);
   $xoopsTpl->assign("csa_link",tep_href_link(FILENAME_CHECKOUT_SHIPPING_ADDRESS, '', 'SSL'));
   $xoopsTpl->assign("bt_back",tep_image_button('button_back.gif', IMAGE_BUTTON_BACK));
  }
  $xoopsTpl->assign("bullet",tep_image(DIR_WS_IMAGES . 'checkout_bullet.gif'));
  $xoopsTpl->assign("silver",tep_draw_separator('pixel_silver.gif', '100%', '1'));
  $xoopsTpl->assign("silver1",tep_draw_separator('pixel_silver.gif', '1', '5'));
  include_once XOOPS_ROOT_PATH.'/footer.php';
  include("includes/application_bottom.php");
?>