<?php
/*
  $Id: gv_send.php 102 2006-01-21 16:15:10Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 - 2003 osCommerce

  Gift Voucher System v1.0
  Copyright (c) 2001, 2002 Ian C Wilson
  http://www.phesis.org

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  require('includes/classes/http_client.php');
  $xoopsOption['template_main'] = 'gv_send.html';
  include XOOPS_ROOT_PATH.'/header.php';
  $xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" />');

// if the customer is not logged on, redirect them to the login page
  if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot();
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
  }

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_GV_SEND);

  if (($HTTP_POST_VARS['back_x']) || ($HTTP_POST_VARS['back_y'])) {
    $HTTP_GET_VARS['action'] = '';
  }
  if ($HTTP_GET_VARS['action'] == 'send') {
    $error = false;
    if (!tep_validate_email(trim($HTTP_POST_VARS['email']))) {
      $error = true;
      $error_email = ERROR_ENTRY_EMAIL_ADDRESS_CHECK;
    }
    $gv_query = tep_db_query("select amount from " . TABLE_COUPON_GV_CUSTOMER . " where customer_id = '" . $customer_id . "'");
    $gv_result = tep_db_fetch_array($gv_query);
    $customer_amount = $gv_result['amount'];
    $gv_amount = trim($HTTP_POST_VARS['amount']);
    if (ereg('[^0-9/.]', $gv_amount)) {
      $error = true;
      $error_amount = ERROR_ENTRY_AMOUNT_CHECK; 
    }
    if ($gv_amount>$customer_amount || $gv_amount == 0) {
      $error = true; 
      $error_amount = ERROR_ENTRY_AMOUNT_CHECK; 
    } 
  }
  if ($HTTP_GET_VARS['action'] == 'process') {
    $id1 = create_coupon_code($mail['customers_email_address']);
    $gv_query = tep_db_query("select amount from " . TABLE_COUPON_GV_CUSTOMER . " where customer_id='".$customer_id."'");
    $gv_result=tep_db_fetch_array($gv_query);
    $new_amount=$gv_result['amount']-$HTTP_POST_VARS['amount'];
    if ($new_amount<0) {
      $error= true;
      $error_amount = ERROR_ENTRY_AMOUNT_CHECK; 
      $HTTP_GET_VARS['action'] = 'send';
    } else {
      $gv_query=tep_db_query("update " . TABLE_COUPON_GV_CUSTOMER . " set amount = '" . $new_amount . "' where customer_id = '" . $customer_id . "'");
      $gv_query=tep_db_query("select customers_firstname, customers_lastname from " . TABLE_CUSTOMERS . " where customers_id = '" . $customer_id . "'");
      $gv_customer=tep_db_fetch_array($gv_query);
      $gv_query=tep_db_query("insert into " . TABLE_COUPONS . " (coupon_type, coupon_code, date_created, coupon_amount) values ('G', '" . $id1 . "', NOW(), '" . $HTTP_POST_VARS['amount'] . "')");
      $insert_id = tep_db_insert_id($gv_query);
      $gv_query=tep_db_query("insert into " . TABLE_COUPON_EMAIL_TRACK . " (coupon_id, customer_id_sent, sent_firstname, sent_lastname, emailed_to, date_sent) values ('" . $insert_id . "' ,'" . $customer_id . "', '" . addslashes($gv_customer['customers_firstname']) . "', '" . addslashes($gv_customer['customers_lastname']) . "', '" . $HTTP_POST_VARS['email'] . "', now())");

      $gv_email = STORE_NAME . "\n" .
              EMAIL_SEPARATOR . "\n" .
              sprintf(EMAIL_GV_TEXT_HEADER, $currencies->format($HTTP_POST_VARS['amount'])) . "\n" .
              EMAIL_SEPARATOR . "\n" . 
              sprintf(EMAIL_GV_FROM, stripslashes($HTTP_POST_VARS['send_name'])) . "\n";
      if (isset($HTTP_POST_VARS['message'])) {
        $gv_email .= EMAIL_GV_MESSAGE . "\n";
        if (isset($HTTP_POST_VARS['to_name'])) {
          $gv_email .= sprintf(EMAIL_GV_SEND_TO, stripslashes($HTTP_POST_VARS['to_name'])) . "\n\n";
        }
        $gv_email .= stripslashes($HTTP_POST_VARS['message']) . "\n\n";
      } 
      $gv_email .= sprintf(EMAIL_GV_REDEEM, $id1) . "\n\n";
      $gv_email .= EMAIL_GV_LINK . tep_href_link(FILENAME_GV_REDEEM, 'gv_no=' . $id1,'NONSSL',false);;
      $gv_email .= "\n\n";  
      $gv_email .= EMAIL_GV_FIXED_FOOTER . "\n\n";
      $gv_email .= EMAIL_GV_SHOP_FOOTER . "\n\n";;
      $gv_email_subject = sprintf(EMAIL_GV_TEXT_SUBJECT, stripslashes($HTTP_POST_VARS['send_name']));             
      tep_mail('', $HTTP_POST_VARS['email'], $gv_email_subject, nl2br($gv_email), STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
    }
  }
  $breadcrumb->add(NAVBAR_TITLE);
  $xoopsTpl->assign("site_image",tep_image(DIR_WS_IMAGES . 'table_background_specials.gif', HEADING_TITLE, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT));
  $xoopsTpl->assign("seperator",tep_draw_separator('pixel_trans.gif', '100%', '10'));
  if ($HTTP_GET_VARS['action'] == 'process') {
    $xoopsTpl->assign("process",1);
	$xoopsTpl->assign("proc_image",tep_image(DIR_WS_IMAGES . 'table_background_man_on_board.gif', HEADING_TITLE, '0', '0', 'align="left"'));
    $xoopsTpl->assign("idl",$id1);
	$xoopsTpl->assign("href_link",tep_href_link(FILENAME_DEFAULT, '', 'NONSSL'));
	$xoopsTpl->assign("bt_continue",tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE));
  }  
  if ($HTTP_GET_VARS['action'] == 'send' && !$error) {
    $xoopsTpl->assign("process",2);
	$xoopsTpl->assign("send_link",tep_href_link(FILENAME_GV_SEND, 'action=process', 'NONSSL'));
    // validate entries
      $gv_amount = (double) $gv_amount;
      $gv_query = tep_db_query("select customers_firstname, customers_lastname from " . TABLE_CUSTOMERS . " where customers_id = '" . $customer_id . "'");
      $gv_result = tep_db_fetch_array($gv_query);
      $send_name = $gv_result['customers_firstname'] . ' ' . $gv_result['customers_lastname'];
      $xoopsTpl->assign("main_text",sprintf(MAIN_MESSAGE, $currencies->format($HTTP_POST_VARS['amount']), stripslashes($HTTP_POST_VARS['to_name']), $HTTP_POST_VARS['email'], stripslashes($HTTP_POST_VARS['to_name']), $currencies->format($HTTP_POST_VARS['amount']), $send_name));
      if ($HTTP_POST_VARS['message']) {
	    $xoopsTpl->assign("pmessage",1);
		$xoopsTpl->assign("pmessage_start",sprintf(PERSONAL_MESSAGE, $gv_result['customers_firstname']));
		$xoopsTpl->assign("pmessage_text",stripslashes($HTTP_POST_VARS['message']));
      }
      $xoopsTpl->assign("hidden_fields",tep_draw_hidden_field('send_name', $send_name) . tep_draw_hidden_field('to_name', stripslashes($HTTP_POST_VARS['to_name'])) . tep_draw_hidden_field('email', $HTTP_POST_VARS['email']) . tep_draw_hidden_field('amount', $gv_amount) . tep_draw_hidden_field('message', stripslashes($HTTP_POST_VARS['message'])));
      $xoopsTpl->assign("bt_back",tep_image_submit('button_back.gif', IMAGE_BUTTON_BACK, 'name=back'));
	  $xoopsTpl->assign("bt_send",tep_image_submit('button_send.gif', IMAGE_BUTTON_CONTINUE));
  } elseif ($HTTP_GET_VARS['action']=='' || $error) {
     $xoopsTpl->assign("error",1);
	 $xoopsTpl->assign("gv_send",tep_href_link(FILENAME_GV_SEND, 'action=send', 'NONSSL'));
	 $xoopsTpl->assign("name",tep_draw_input_field('to_name', stripslashes($HTTP_POST_VARS['to_name'])));
	 $xoopsTpl->assign("email",tep_draw_input_field('email', $HTTP_POST_VARS['email']));
	 $xoopsTpl->assign("amount",tep_draw_input_field('amount', $HTTP_POST_VARS['amount'], '', '', false));
	 $xoopsTpl->assign("message_f",tep_draw_textarea_field('message', 'soft', 50, 15, stripslashes($HTTP_POST_VARS['message'])));
	 if ($error) $xoopsTpl->assign("error_text", $error_email);
	 if ($error) $xoopsTpl->assign("error_amount",$error_amount);
     $back = sizeof($navigation->path)-2;
     $xoopsTpl->assign("nav_link",tep_href_link($navigation->path[$back]['page'], tep_array_to_string($navigation->path[$back]['get'], array('action')), $navigation->path[$back]['mode']));
	 $xoopsTpl->assign("bt_back1",tep_image_button('button_back.gif', IMAGE_BUTTON_BACK));
	 $xoopsTpl->assign("bt_continue", tep_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE));
  }
  include_once XOOPS_ROOT_PATH.'/footer.php';
  include("includes/application_bottom.php");
?>