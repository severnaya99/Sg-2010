<?php
/**
 * $Id: login.php 115 2006-01-21 16:15:38Z Michael $

 * osCommerce, Open Source E-Commerce Solutions
 * http://www.oscommerce.com

 * Copyright (c) 2003 osCommerce

 * Released under the GNU General Public License

 * adapted 2005 for xoops 2.0.x by FlinkUX e.K. <http://www.flinkux.de>
  
 * (c) 2005  Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @package xosC
 * @author Michael Hammelmann
 * @version 1
**/
include("includes/application_top.php");

$xoopsOption['template_main'] = 'login.html';
include XOOPS_ROOT_PATH.'/header.php';
$xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" />');


// Überprüpfung des XOOPs Users
if(isset($xoopsUserId)) {
 $xoops_check_query=tep_db_query("select customers_id, customers_firstname, customers_password, customers_email_address, customers_default_address_id from " . TABLE_CUSTOMERS . " where customers_email_address = '" . $xoopsUser->email() . "'");
 if(!tep_db_num_rows($xoops_check_query)) {
  // Ist zwar XOOPS User aber noch keine Adressdaten für xosC hinterlegt

   tep_redirect(tep_href_link(FILENAME_CREATE_ACCOUNT)); 
 }else {
    $check_customer = tep_db_fetch_array($xoops_check_query);

    $check_country_query = tep_db_query("select entry_country_id, entry_zone_id from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . (int)$check_customer['customers_id'] . "' and address_book_id = '" . (int)$check_customer['customers_default_address_id'] . "'");
    $check_country = tep_db_fetch_array($check_country_query);

    $customer_id = $check_customer['customers_id'];
    $customer_default_address_id = $check_customer['customers_default_address_id'];
    $customer_first_name = $check_customer['customers_firstname'];
    $customer_country_id = $check_country['entry_country_id'];
    $customer_zone_id = $check_country['entry_zone_id'];
    session_register('customer_id');
    session_register('customer_default_address_id');
    session_register('customer_first_name');
    session_register('customer_country_id');
    session_register('customer_zone_id');

    tep_db_query("update " . TABLE_CUSTOMERS_INFO . " set customers_info_date_of_last_logon = now(), customers_info_number_of_logons = customers_info_number_of_logons+1 where customers_info_id = '" . (int)$customer_id . "'");

// restore cart contents
    $cart->restore_contents();

    if (sizeof($navigation->snapshot) > 0) {
      $origin_href = tep_href_link($navigation->snapshot['page'], tep_array_to_string($navigation->snapshot['get'], array(tep_session_name())), $navigation->snapshot['mode']);
      $navigation->clear_snapshot();
      tep_redirect($origin_href);
    } else {
      tep_redirect(tep_href_link(FILENAME_DEFAULT));
    }
  }
}
// redirect the customer to a friendly cookie-must-be-enabled page if cookies are disabled (or the session has not started)
  if ($session_started == false) {
    tep_redirect(tep_href_link(FILENAME_COOKIE_USAGE));
  }

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_LOGIN);

  $error = false;
  if (isset($HTTP_GET_VARS['action']) && ($HTTP_GET_VARS['action'] == 'process')) {
    $email_address = tep_db_prepare_input($HTTP_POST_VARS['email_address']);
    $password = tep_db_prepare_input($HTTP_POST_VARS['password']);

// Check if email exists
    $check_customer_query = tep_db_query("select customers_id, customers_firstname, customers_password, customers_email_address, customers_default_address_id from " . TABLE_CUSTOMERS . " where customers_email_address = '" . tep_db_input($email_address) . "'");
    if (!tep_db_num_rows($check_customer_query)) {
      $error = true;
    } else {
      $check_customer = tep_db_fetch_array($check_customer_query);
// Check that password is good
      if (!tep_validate_password($password, $check_customer['customers_password'])) {
        $error = true;
      } else {
        if (SESSION_RECREATE == 'True') {
          tep_session_recreate();
        }

        $check_country_query = tep_db_query("select entry_country_id, entry_zone_id from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . (int)$check_customer['customers_id'] . "' and address_book_id = '" . (int)$check_customer['customers_default_address_id'] . "'");
        $check_country = tep_db_fetch_array($check_country_query);

        $customer_id = $check_customer['customers_id'];
        $customer_default_address_id = $check_customer['customers_default_address_id'];
        $customer_first_name = $check_customer['customers_firstname'];
        $customer_country_id = $check_country['entry_country_id'];
        $customer_zone_id = $check_country['entry_zone_id'];
        session_register('customer_id');
        session_register('customer_default_address_id');
        session_register('customer_first_name');
        session_register('customer_country_id');
        session_register('customer_zone_id');

        tep_db_query("update " . TABLE_CUSTOMERS_INFO . " set customers_info_date_of_last_logon = now(), customers_info_number_of_logons = customers_info_number_of_logons+1 where customers_info_id = '" . (int)$customer_id . "'");

// restore cart contents
        $cart->restore_contents();

        if (sizeof($navigation->snapshot) > 0) {
          $origin_href = tep_href_link($navigation->snapshot['page'], tep_array_to_string($navigation->snapshot['get'], array(tep_session_name())), $navigation->snapshot['mode']);
          $navigation->clear_snapshot();
          tep_redirect($origin_href);
        } else {
          tep_redirect(tep_href_link(FILENAME_DEFAULT));
        }
      }
    }
  }

  if ($error == true) {
    $messageStack->add('login', TEXT_LOGIN_ERROR);
  }

  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_LOGIN, '', 'SSL'));
  include("includes/header.php");
  $xoopsTpl->assign("js_cart_link",tep_href_link(FILENAME_INFO_SHOPPING_CART));
  $xoopsTpl->assign("form_login",tep_draw_form('login', tep_href_link(FILENAME_LOGIN, 'action=process', 'SSL')));
  $xoopsTpl->assign("site_image",tep_image(DIR_WS_IMAGES . 'table_background_login.gif', HEADING_TITLE, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT));
  $xoopsTpl->assign("seperator",tep_draw_separator('pixel_trans.gif', '100%', '10'));
  $xoopsTpl->assign("bt_continue",tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE));
  $xoopsTpl->assign("fca_link",tep_href_link(FILENAME_CREATE_ACCOUNT, '', 'SSL'));
  $xoopsTpl->assign("email",tep_draw_input_field('email_address'));
  $xoopsTpl->assign("pwd",tep_draw_password_field('password'));
  $xoopsTpl->assign("pwd_forgot",tep_href_link(FILENAME_PASSWORD_FORGOTTEN, '', 'SSL'));
  $xoopsTpl->assign("login",tep_image_submit('button_login.gif', IMAGE_BUTTON_LOGIN));
  $xoopsTpl->assign("seperator1",tep_draw_separator('pixel_trans.gif', '10', '1'));
  if ($messageStack->size('login') > 0) {
	$xoopsTpl->assign("messagestack",1);
	$xoopsTpl->assign("message_output",$messageStack->output('login'));
  }
    if ($cart->count_contents() > 0) $xoopsTpl->assign("cartcontents",1);
include_once XOOPS_ROOT_PATH.'/footer.php';
include(XOOPS_ROOT_PATH."/modules/osC/includes/application_bottom.php");
?>