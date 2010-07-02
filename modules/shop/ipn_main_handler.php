<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                               |
// | Portions may be Copyright (c) 2004 DevosC.com                       |
// |                                                                      |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
//  $Id: ipn_main_handler.php 1002 2005-02-11 20:34:18Z drbyte $
//

  function datetime_to_sql_format($paypalDateTime) {
    $months = array('Jan' => '01', 'Feb' => '02', 'Mar' => '03', 'Apr' => '04', 'May' => '05',  'Jun' => '06',  'Jul' => '07', 'Aug' => '08', 'Sep' => '09', 'Oct' => '10', 'Nov' => '11', 'Dec' => '12');
    $hour = substr($paypalDateTime, 0, 2);$minute = substr($paypalDateTime, 3, 2);$second = substr($paypalDateTime, 6, 2);
    $month = $months[substr($paypalDateTime, 9, 3)];
    $day = (strlen($day = preg_replace("/,/" , '' , substr($paypalDateTime, 13, 2))) < 2) ? '0'.$day: $day;
    $year = substr($paypalDateTime, -8, 4);
    if (strlen($day)<2) $day = '0'.$day;
    return ($year . "-" . $month . "-" . $day . " " . $hour . ":" . $minute . ":" . $second);
  }

if (!is_array($_POST)) {
  die();
}

$session_post = $_POST['custom'];
$session_stuff = explode('=', $session_post);
require('includes/modules/payment/paypal/ipn_application_top.php');
$sql = "select * from " . TABLE_PAYPAL_SESSION . " where session_id = '" . $session_stuff[1] . "'";
$stored_session = $db->Execute($sql);
$_SESSION = unserialize(base64_decode($stored_session->fields['saved_session']));
if (MODULE_PAYMENT_PAYPAL_IPN_DEBUG == 'Yes') mail(MODULE_PAYMENT_PAYPAL_DEBUG_EMAIL_ADDRESS,'IPN DEBUG MESSAGE', '1. Got past Application_top.php ');
require('includes/languages/english/checkout_process.php');

$scheme = 'http://';
if (ENABLE_SSL == 'true') $scheme = 'http://';
//Parse url
$web=parse_url($scheme . MODULE_PAYMENT_PAYPAL_HANDLER);
 
if (MODULE_PAYMENT_PAYPAL_IPN_DEBUG == 'Yes') mail(MODULE_PAYMENT_PAYPAL_DEBUG_EMAIL_ADDRESS,'IPN DEBUG MESSAGE', '2. Got past parse_url');

//build post string 
foreach($_POST as $i=>$v) { 
  $postdata.= $i . "=" . urlencode(stripslashes($v)) . "&";  
}
if (MODULE_PAYMENT_PAYPAL_IPN_DEBUG == 'Yes') mail(MODULE_PAYMENT_PAYPAL_DEBUG_EMAIL_ADDRESS,'IPN DEBUG MESSAGE', '3. Got past foreach');

$postdata.="cmd=_notify-validate";

//Set the port number
if($web['scheme'] == "https") { 
  $web['port']="443";  $ssl="ssl://"; } else { $web['port']="80"; 
}  

//Create paypal connection
$fp=@fsockopen($ssl . $web['host'],$web['port'],$errnum,$errstr,30); 
if (MODULE_PAYMENT_PAYPAL_IPN_DEBUG == 'Yes') mail(MODULE_PAYMENT_PAYPAL_DEBUG_EMAIL_ADDRESS,'IPN DEBUG MESSAGE', '4. Got past fsockopen');

if(!$fp) { 
  if (MODULE_PAYMENT_PAYPAL_IPN_DEBUG == 'Yes') mail(MODULE_PAYMENT_PAYPAL_DEBUG_EMAIL_ADDRESS,'IPN DEBUG MESSAGE', '5. Failed fsockopen ' .  $ssl . $web['host'] . '#');
  die();
} 
 
  if (MODULE_PAYMENT_PAYPAL_IPN_DEBUG == 'Yes') mail(MODULE_PAYMENT_PAYPAL_DEBUG_EMAIL_ADDRESS,'IPN DEBUG MESSAGE', '6. in main process');

//Post Data
 
  fputs($fp, "POST $web[path] HTTP/1.1\r\n"); 
  fputs($fp, "Host: $web[host]\r\n"); 
  fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n"); 
  fputs($fp, "Content-length: ".strlen($postdata)."\r\n"); 
  fputs($fp, "Connection: close\r\n\r\n"); 
  fputs($fp, $postdata . "\r\n\r\n"); 

//loop through the response from the server 
  while(!feof($fp)) { 
    $info[]=@fgets($fp, 1024); 
  } 

//close fp - we are done with it 
  fclose($fp); 
  if (MODULE_PAYMENT_PAYPAL_IPN_DEBUG == 'Yes') mail(MODULE_PAYMENT_PAYPAL_DEBUG_EMAIL_ADDRESS,'IPN DEBUG MESSAGE', '7. closed ipn');

//break up results into a string
  $info = implode(",",$info);


if(eregi("VERIFIED",$info) && $_POST['business'] == MODULE_PAYMENT_PAYPAL_BUSINESS_ID)  {
  require(DIR_WS_CLASSES . 'shipping.php');
  require(DIR_WS_CLASSES . 'payment.php');
  $payment_modules = new payment($_SESSION['payment']);
  $shipping_modules = new shipping($_SESSION['shipping']);
  require(DIR_WS_CLASSES . 'order.php');
  $order = new order();
  if (MODULE_PAYMENT_PAYPAL_IPN_DEBUG == 'Yes') mail(MODULE_PAYMENT_PAYPAL_DEBUG_EMAIL_ADDRESS,'IPN DEBUG MESSAGE', '8 Started Order/order totals ' . $_SESSION['payment'] );
  require(DIR_WS_CLASSES . 'order_total.php');
  $order_total_modules = new order_total();
  $order_totals = $order_total_modules->process();
  $txn_type = 'unknown';

  if (MODULE_PAYMENT_PAYPAL_IPN_DEBUG == 'Yes') mail(MODULE_PAYMENT_PAYPAL_DEBUG_EMAIL_ADDRESS,'IPN DEBUG MESSAGE', 'Test Transaction Uniqueness ' . '#'.$_POST['txn_id'] . '#'.$_POST['parent_txn_id'].'#');

// see if this is a unique transaction ID
  $test_txn = $db->execute("select * from " . TABLE_PAYPAL . " where txn_id = '" . $_POST['parent_txn_id'] . "'");
  if ($test_txn->RecordCount()<=0) { 
// k, no parent ID but this still could be a e-check cancellation
  $test_txn = $db->execute("select * from " . TABLE_PAYPAL . " where txn_id = '" . $_POST['txn_id'] . "'");
  if ($test_txn->RecordCount()<=0) { 
    $txn_type = 'unique';
  } else {
    if ($_POST['payment_status'] == 'Denied') {
    $txn_type = 'echeck-denied';   
    }
  }
  } else {
    $txn_type = 'parent';
  } 
  if (MODULE_PAYMENT_PAYPAL_IPN_DEBUG == 'Yes') mail(MODULE_PAYMENT_PAYPAL_DEBUG_EMAIL_ADDRESS,'IPN DEBUG MESSAGE', '9. txn type = ' . $txn_type);

  switch ($txn_type) {
    case 'unique':
  if (MODULE_PAYMENT_PAYPAL_IPN_DEBUG == 'Yes') mail(MODULE_PAYMENT_PAYPAL_DEBUG_EMAIL_ADDRESS,'IPN DEBUG MESSAGE', 'handling unique entry');
      $new_order_id = $order->create($order_totals);
  if (MODULE_PAYMENT_PAYPAL_IPN_DEBUG == 'Yes') mail(MODULE_PAYMENT_PAYPAL_DEBUG_EMAIL_ADDRESS,'IPN DEBUG MESSAGE', 'new order id = ' . $new_order_id);

  $paypal_order = array(
                        zen_order_id => $new_order_id,
                        txn_type => $_POST['txn_type'],
                        reason_code => $_POST['reason_code'],
                        payment_type => $_POST['payment_type'],
                        payment_status => $_POST['payment_status'],
                        pending_reason => $_POST['pending_reason'],
                        invoice => $_POST['invoice'],
                        mc_currency => $_POST['mc_currency'],
                        first_name => $_POST['first_name'],
                        last_name => $_POST['last_name'],
                        payer_business_name => $_POST['payer_business_name'],
                        address_name => $_POST['address_name'],
                        address_street => $_POST['address_street'],
                        address_city => $_POST['address_city'],
                        address_state => $_POST['address_state'],
                        address_zip => $_POST['address_zip'],
                        address_country => $_POST['address_country'],
                        address_status => $_POST['address_status'],
                        payer_email => $_POST['payer_email'],
                        payer_id => $_POST['payer_id'],
                        payer_status => $_POST['payer_status'],
                        payment_date => datetime_to_sql_format($_POST['payment_date']),
                        business => $_POST['business'],
                        receiver_email => $_POST['receiver_email'],
                        receiver_id => $_POST['receiver_id'],
                        txn_id => $_POST['txn_id'],
                        parent_txn_id => $_POST['parent_txn_id'],
                        num_cart_items => $_POST['num_cart_items'],
                        mc_gross => $_POST['mc_gross'],
                        mc_fee => $_POST['mc_fee'],
                        settle_amount => $_POST['settle_amount'],
                        settle_currency => $_POST['settle_currency'],
                        exchange_rate => $_POST['exchange_rate'],
                        notify_version => $_POST['notify_version'],
                        verify_sign => $_POST['verify_sign'],
                        date_added => 'now()',
                        memo => $_POST['memo']
                        );


       if (MODULE_PAYMENT_PAYPAL_IPN_DEBUG == 'Yes')  mail(MODULE_PAYMENT_PAYPAL_DEBUG_EMAIL_ADDRESS,'IPN DEBUG MESSAGE', '10. Created Paypal Order' );
                       
      zen_db_perform(TABLE_PAYPAL, $paypal_order);

      if (MODULE_PAYMENT_PAYPAL_IPN_DEBUG == 'Yes')  mail(MODULE_PAYMENT_PAYPAL_DEBUG_EMAIL_ADDRESS,'IPN DEBUG MESSAGE', '10.0 Created Paypal Order' );

      $insert_id = $db->Insert_ID();

      if (MODULE_PAYMENT_PAYPAL_IPN_DEBUG == 'Yes')  mail(MODULE_PAYMENT_PAYPAL_DEBUG_EMAIL_ADDRESS,'IPN DEBUG MESSAGE', '10.1 Created Paypal Order' );

      $paypal_order_history = array (
                                     'paypal_ipn_id' => $insert_id,
                                     'txn_id' => $_POST['txn_id'],
                                     'parent_txn_id' => $_POST['parent_txn_id'],
                                     'payment_status' => $_POST['payment_status'],
                                     'pending_reason' => $_POST['pending_reason'],
                                     'date_added' => 'now()'
                                    );


      zen_db_perform(TABLE_PAYPAL_PAYMENT_STATUS_HISTORY, $paypal_order_history);

      if (MODULE_PAYMENT_PAYPAL_IPN_DEBUG == 'Yes')  mail(MODULE_PAYMENT_PAYPAL_DEBUG_EMAIL_ADDRESS,'IPN DEBUG MESSAGE', '10.2. Created Paypal Order history' );
      if ($_POST['payment_status'] =='Pending') {
        $db->Execute("update " . TABLE_ORDERS  . " set orders_status = " . MODULE_PAYMENT_PAYPAL_PROCESSING_STATUS_ID . " 
                      where orders_id = '" . $new_order_id . "'");
      }
        if ($_POST['payment_status'] == 'Pending')   $new_status = MODULE_PAYMENT_PAYPAL_PROCESSING_STATUS_ID;
        if ($_POST['payment_status'] == 'Completed') $new_status = MODULE_PAYMENT_PAYPAL_ORDER_STATUS_ID;
        $sql_data_array = array('orders_id' => $new_order_id,
                          'orders_status_id' => $new_status,
                          'date_added' => 'now()',
                          'comments' => 'PayPal status: ' . $_POST['payment_status'] . ' ' . $_POST['pending_reason']. ' @ '.$_POST['payment_date'],
                          'customer_notified' => false
                          );

      zen_db_perform(TABLE_ORDERS_STATUS_HISTORY, $sql_data_array);
      if (MODULE_PAYMENT_PAYPAL_IPN_DEBUG == 'Yes') mail(MODULE_PAYMENT_PAYPAL_DEBUG_EMAIL_ADDRESS,'IPN DEBUG MESSAGE', '11. Got past Create DB Array');
      $order->create_add_products($new_order_id, 2);
      if (MODULE_PAYMENT_PAYPAL_IPN_DEBUG == 'Yes') mail(MODULE_PAYMENT_PAYPAL_DEBUG_EMAIL_ADDRESS,'IPN DEBUG MESSAGE', '12. Finalised Order');
      $order->send_order_email($new_order_id, 2);
      $_SESSION['cart']->reset(true);

      if (MODULE_PAYMENT_PAYPAL_IPN_DEBUG == 'Yes') mail(MODULE_PAYMENT_PAYPAL_DEBUG_EMAIL_ADDRESS,'IPN DEBUG MESSAGE', '13. Sent Email');
    break;
    case 'parent':
    case 'echeck-denied':
      if ($txn_type == 'parent') {
        $ipn_id = $db->Execute("select zen_order_id, paypal_ipn_id from " . TABLE_PAYPAL . " where txn_id = '" . $_POST['parent_txn_id'] . "'");
      } else {
        $ipn_id = $db->Execute("select zen_order_id, paypal_ipn_id from " . TABLE_PAYPAL . " where txn_id = '" . $_POST['txn_id'] . "'");
      }
      $paypal_order = array(
                        reason_code => $_POST['reason_code'],
                        payment_type => $_POST['payment_type'],
                        parent_txn_id => $_POST['parent_txn_id'],
                        payment_status => $_POST['payment_status'],
                        pending_reason => $_POST['pending_reason'],
                        invoice => $_POST['invoice'],
                        mc_currency => $_POST['mc_currency'],
                        first_name => $_POST['first_name'],
                        last_name => $_POST['last_name'],
                        payer_business_name => $_POST['payer_business_name'],
                        address_name => $_POST['address_name'],
                        address_street => $_POST['addrss_street'],
                        address_city => $_POST['address_city'],
                        address_state => $_POST['address_state'],
                        address_zip => $_POST['address_zip'],
                        address_country => $_POST['address_country'],
                        payer_email => $_POST['payer_email'],
                        payer_id => $_POST['payer_id'],
                        business => $_POST['business'],
                        receiver_email => $_POST['receiver_email'],
                        receiver_id => $_POST['receiver_id'],
                        num_cart_items => $_POST['num_cart_items'],
                        mc_gross => $_POST['mc_gross'],
                        mc_fee => $_POST['mc_fee'],
                        settle_amount => $_POST['settle_amount'],
                        settle_currency => $_POST['settle_currency'],
                        exchange_rate => $_POST['exchange_rate'],
                        notify_version => $_POST['notify_version'],
                        verify_sign => $_POST['verify_sign'],
                        last_modified => 'now()'
                        );
      if ($txn_type == 'parent') {
        zen_db_perform(TABLE_PAYPAL, $paypal_order, 'update', "txn_id='" . $_POST['parent_txn_id'] . "'");
      } else {
        zen_db_perform(TABLE_PAYPAL, $paypal_order, 'update', "txn_id='" . $_POST['txn_id'] . "'");
      }

      $paypal_order_history = array (
                                     'paypal_ipn_id' => $ipn_id->fields['paypal_ipn_id'],
                                     'txn_id' => $_POST['txn_id'],
                                     'parent_txn_id' => $_POST['parent_txn_id'],
                                     'payment_status' => $_POST['payment_status'],
                                     'pending_reason' => $_POST['pending_reason'],
                                     'date_added' => 'now()'
                                    );

      if ($_POST['reason_code'] == 'refund' || $_POST['payment_status'] == 'Denied') {
        $db->Execute("update " . TABLE_ORDERS  . " set orders_status = " . MODULE_PAYMENT_PAYPAL_REFUND_ORDER_STATUS_ID . " 
                      where orders_id = '" . $ipn_id->fields['zen_order_id'] . "'");

        $sql_data_array = array('orders_id' => $ipn_id->fields['zen_order_id'],
                          'orders_status_id' => MODULE_PAYMENT_PAYPAL_REFUND_ORDER_STATUS_ID,
                          'date_added' => 'now()',
                          'comments' => 'PayPal status: ' . $_POST['payment_status'] . ' ' . ' @ '.$_POST['payment_date'],
                          'customer_notified' => false
                          );

      zen_db_perform(TABLE_ORDERS_STATUS_HISTORY, $sql_data_array);
      }

      zen_db_perform(TABLE_PAYPAL_PAYMENT_STATUS_HISTORY, $paypal_order_history);
      if (MODULE_PAYMENT_PAYPAL_IPN_DEBUG == 'Yes')  mail(MODULE_PAYMENT_PAYPAL_DEBUG_EMAIL_ADDRESS,'IPN DEBUG MESSAGE', '10.2. Updated Paypal Order history' );
    break;
    default:
      if (MODULE_PAYMENT_PAYPAL_IPN_DEBUG == 'Yes') mail(MODULE_PAYMENT_PAYPAL_DEBUG_EMAIL_ADDRESS,'IPN DEBUG MESSAGE', '99. Unusual txn_id/parent_txn_id ' . '#'.$_POST['txn_id'].'#'.$_POST['parent_txn_id'].'#');
  }
  
         
} else {
  if (MODULE_PAYMENT_PAYPAL_IPN_DEBUG == 'Yes') mail(MODULE_PAYMENT_PAYPAL_DEBUG_EMAIL_ADDRESS,'IPN DEBUG MESSAGE', '99. Could not verify transaction ' . '#'.$_POST['business'].'#'.MODULE_PAYMENT_PAYPAL_BUSINESS_ID.'#'.$_POST['txn_type'].'#'.$info);
}
?>