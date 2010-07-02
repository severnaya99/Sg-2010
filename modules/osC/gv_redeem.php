<?php
/**
 * $Id: gv_redeem.php 74 2006-01-21 16:13:56Z Michael $

 * osCommerce, Open Source E-Commerce Solutions
 * http://www.oscommerce.com

 * Copyright (c) 2002 - 2003 osCommerce

 * Gift Voucher System v1.0
 * Copyright (c) 2001, 2002 Ian C Wilson
 * http://www.phesis.org

 * Released under the GNU General Public License
 * adapted for xoops (c)2005 by FlinkUX <http://www.flinkux.de>
 * @package xosC
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
**/

  require('includes/application_top.php');
  $xoopsOption['template_main'] = 'gv_redeem.html';
  include XOOPS_ROOT_PATH.'/header.php';
  $xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" />');

// if the customer is not logged on, redirect them to the login page
if (!tep_session_is_registered('customer_id')) {
$navigation->set_snapshot();
tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}



// check for a voucher number in the url
  if (isset($HTTP_GET_VARS['gv_no'])) {
    $error = true;
 $voucher_number=tep_db_prepare_input($HTTP_GET_VARS['gv_no']);
    $gv_query = tep_db_query("select c.coupon_id, c.coupon_amount from " . TABLE_COUPONS . " c, " . TABLE_COUPON_EMAIL_TRACK . " et where coupon_code = '" . addslashes($voucher_number) . "' and c.coupon_id = et.coupon_id");
    if (tep_db_num_rows($gv_query) >0) {
      $coupon = tep_db_fetch_array($gv_query);
      $redeem_query = tep_db_query("select coupon_id from ". TABLE_COUPON_REDEEM_TRACK . " where coupon_id = '" . $coupon['coupon_id'] . "'");
      if (tep_db_num_rows($redeem_query) == 0 ) {
// check for required session variables
        if (!tep_session_is_registered('gv_id')) {
          tep_session_register('gv_id');
        }
        $gv_id = $coupon['coupon_id'];
        $error = false;
      } else {
        $error = true;
      }
    }
  } else {
    tep_redirect(FILENAME_DEFAULT);
  }
  if ((!$error) && (tep_session_is_registered('customer_id'))) {
// Update redeem status
    $gv_query = tep_db_query("insert into  " . TABLE_COUPON_REDEEM_TRACK . " (coupon_id, customer_id, redeem_date, redeem_ip) values ('" . $coupon['coupon_id'] . "', '" . $customer_id . "', now(),'" . $REMOTE_ADDR . "')");
    $gv_update = tep_db_query("update " . TABLE_COUPONS . " set coupon_active = 'N' where coupon_id = '" . $coupon['coupon_id'] . "'");
    tep_gv_account_update($customer_id, $gv_id);
    tep_session_unregister('gv_id');   
  } 
  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_GV_REDEEM);



/* 
GV_REDEEM_EXPLOIT_FIX (GVREF)
---------------------------------------------
* case: guest accounts can exploit gift voucher sent using "Mail Gift Voucher" (admin area),
*       by sharing the code until somebody logs with a valid account
*       or successfully created new account.
*
* obv:  the session remains on user while served as a guest. 
*       The gift voucher can now be reused to all guest users until 
*       gift voucher is redeemed
* soln: before releasing the gift voucher, the user must login first
*       or asked to create an account.
*
*
* -- Frederick Ricaforte
*/


/*
* connected files:
*   /catalog/gv_redeem.php
*   /catalog/login.php
*   /catalog/create_account.php 
*   /catalog/includes/languages/english/gv_redeem.php
*
*/

/*******************************************************
**** gv_redeem.php  ************************************
*******************************************************/
  //before:  $redeem_query = tep_db_query("select coupon_id from ". TABLE_COUPON_REDEEM_TRACK . " where coupon_id = '" . $coupon['coupon_id'] . "'");
  //----
      // add:GVREF
      if ((tep_session_is_registered('customer_id')) && $voucher_not_redeemed) {
        $gv_id = $coupon['coupon_id'];
        $gv_query = tep_db_query("insert into  " . TABLE_COUPON_REDEEM_TRACK . " (coupon_id, customer_id, redeem_date, redeem_ip) values ('" . $coupon['coupon_id'] . "', '" . $customer_id . "', now(),'" . $REMOTE_ADDR . "')");
        $gv_update = tep_db_query("update " . TABLE_COUPONS . " set coupon_active = 'N' where coupon_id = '" . $coupon['coupon_id'] . "'");
        tep_gv_account_update($customer_id, $gv_id);
        $error = false;
      } elseif($voucher_not_redeemed) {
      // endof_add:GVREF

      // replace: GVREF
      /*
      if (tep_db_num_rows($redeem_query) == 0 ) {
        // check for required session variables
        if (!tep_session_is_registered('gv_id')) {
          tep_session_register('gv_id');
        }
        $gv_id = $coupon['coupon_id'];
        $error = false;
      } else {
        $error = true;
      }
      */

      // with: GVREF
        if (!tep_session_is_registered('floating_gv_code')) {
            tep_session_register('floating_gv_code');
          //}
          $floating_gv_code = $HTTP_GET_VARS['gv_no'];
          $gv_error_message = TEXT_NEEDS_TO_LOGIN;
      } else {
        $gv_error_message = TEXT_INVALID_GV;
     }
    } else {
      $gv_error_message = TEXT_INVALID_GV;
    }
    // endof_replace: GVREF

  // remove: GVREF
  /*
  if ((!$error) && (tep_session_is_registered('customer_id'))) {
    // Update redeem status
    $gv_query = tep_db_query("insert into  " . TABLE_COUPON_REDEEM_TRACK . " (coupon_id, customer_id, redeem_date, redeem_ip) values ('" . $coupon['coupon_id'] . "', '" . $customer_id . "', now(),'" . $REMOTE_ADDR . "')");
    $gv_update = tep_db_query("update " . TABLE_COUPONS . " set coupon_active = 'N' where coupon_id = '" . $coupon['coupon_id'] . "'");
    tep_gv_account_update($customer_id, $gv_id);
    tep_session_unregister('gv_id');   
  } 
  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_GV_REDEEM);
  */
  // endof_remove: GVREF

  // replace: GVREF
  // $message = TEXT_INVALID_GV;
  // with:
  $message = $gv_error_message;
  // endof_replace
  
  

/*******************************************************
****  login.php  ******************************************
*******************************************************/
  //before:    $cart->restore_contents();
  //---------
  //add these new codes:
        if (tep_session_is_registered('floating_gv_code')) {
          $gv_query = tep_db_query("SELECT c.coupon_id, c.coupon_amount, IF(rt.coupon_id>0, 'true', 'false') AS redeemed FROM ". TABLE_COUPONS ." c LEFT JOIN ". TABLE_COUPON_REDEEM_TRACK." rt USING(coupon_id), ". TABLE_COUPON_EMAIL_TRACK ." et WHERE c.coupon_code = '". $floating_gv_code ."' AND c.coupon_id = et.coupon_id");
          // check if coupon exist
          if (tep_db_num_rows($gv_query) >0) {
            $coupon = tep_db_fetch_array($gv_query);
            // check if coupon_id exist and coupon not redeemed
            if($coupon['coupon_id']>0 && $coupon['redeemed'] == 'false') {
              tep_session_unregister('floating_gv_code');
              $gv_query = tep_db_query("insert into  " . TABLE_COUPON_REDEEM_TRACK . " (coupon_id, customer_id, redeem_date, redeem_ip) values ('" . $coupon['coupon_id'] . "', '" . $customer_id . "', now(),'" . $REMOTE_ADDR . "')");
              $gv_update = tep_db_query("update " . TABLE_COUPONS . " set coupon_active = 'N' where coupon_id = '" . $coupon['coupon_id'] . "'");
              tep_gv_account_update($customer_id, $coupon['coupon_id']);
            }
          }
        }
//**********



/*******************************************************
****  create_account.php  ***********************************
*******************************************************/
  //before: tep_mail($name, $email_address, EMAIL_SUBJECT, $email_text, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS);
  //---------
  //add these:
      if (tep_session_is_registered('floating_gv_code')) {
        $gv_query = tep_db_query("SELECT c.coupon_id, c.coupon_amount, IF(rt.coupon_id>0, 'true', 'false') AS redeemed FROM ". TABLE_COUPONS ." c LEFT JOIN ". TABLE_COUPON_REDEEM_TRACK." rt USING(coupon_id), ". TABLE_COUPON_EMAIL_TRACK ." et WHERE c.coupon_code = '". $floating_gv_code ."' AND c.coupon_id = et.coupon_id");
        // check if coupon exist
        if (tep_db_num_rows($gv_query) >0) {
          $coupon = tep_db_fetch_array($gv_query);
          // check if coupon_id exist and coupon not redeemed
          if($coupon['coupon_id']>0 && $coupon['redeemed'] == 'false') {
              tep_session_unregister('floating_gv_code');
              $gv_query = tep_db_query("insert into  " . TABLE_COUPON_REDEEM_TRACK . " (coupon_id, customer_id, redeem_date, redeem_ip) values ('" . $coupon['coupon_id'] . "', '" . $customer_id . "', now(),'" . $REMOTE_ADDR . "')");
              $gv_update = tep_db_query("update " . TABLE_COUPONS . " set coupon_active = 'N' where coupon_id = '" . $coupon['coupon_id'] . "'");
              tep_gv_account_update($customer_id, $coupon['coupon_id']);
          }
        }
      }

/*******************************************************
****  /includes/languages/english/gv_redeem.php ******************
*******************************************************/
// add:
define('TEXT_NEEDS_TO_LOGIN', 'We are sorry but we are unable to process your Gift Voucher claim at this time. You need to login first or create an account with us, if you don\'t already have one, before you can claim your Gift Voucher. Please <a href="' . tep_href_link(FILENAME_LOGIN,'','SSL').'">click here to login or create an account.</a> ');

    

  $breadcrumb->add(NAVBAR_TITLE); 
 $xoopsTpl->assign("site_image",tep_image(DIR_WS_IMAGES . 'table_background_specials.gif', HEADING_TITLE, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT));
 $xoopsTpl->assign("seperator",tep_draw_separator('pixel_trans.gif', '100%', '10'));
// if we get here then either the url gv_no was not set or it was invalid
// so output a message.
  $message = sprintf(TEXT_VALID_GV, $currencies->format($coupon['coupon_amount']));
  if ($error) {
    $message = TEXT_INVALID_GV;
  }
  $xoopsTpl->assign("message",$message);
  $xoopsTpl->assign("href", tep_href_link(FILENAME_DEFAULT));
  $xoopsTpl->assign("bt_continue",tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE));
  include_once XOOPS_ROOT_PATH.'/footer.php';
  include("includes/application_bottom.php");
?>