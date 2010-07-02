<?php
/**
 * $Id: ot_gv.php 58 2005-12-15 16:21:17Z Michael $
 * osCommerce, Open Source E-Commerce Solutions
 * http://www.oscommerce.com/
 * Copyright  2002 osCommerce
 * Released under the GNU General Public License
 * v5.13a by Rigadin (rigadin@osc-help.net)
 * adapted 2005 for xoops by FlinkUX <http://www.flinkux.de>
 * @package xosC
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
**/

  class ot_gv  {
    var $title, $output;

    function ot_gv() {
      $this->code = 'ot_gv';
      $this->title = MODULE_ORDER_TOTAL_GV_TITLE;
      $this->header = MODULE_ORDER_TOTAL_GV_HEADER;
      $this->description = MODULE_ORDER_TOTAL_GV_DESCRIPTION;
      $this->user_prompt = MODULE_ORDER_TOTAL_GV_USER_PROMPT;
      $this->enabled = MODULE_ORDER_TOTAL_GV_STATUS;
      $this->sort_order = MODULE_ORDER_TOTAL_GV_SORT_ORDER;
      $this->include_shipping = MODULE_ORDER_TOTAL_GV_INC_SHIPPING;
      $this->include_tax = MODULE_ORDER_TOTAL_GV_INC_TAX;
      $this->calculate_tax = MODULE_ORDER_TOTAL_GV_CALC_TAX;
      $this->credit_tax = MODULE_ORDER_TOTAL_GV_CREDIT_TAX;
      $this->tax_class  = MODULE_ORDER_TOTAL_GV_TAX_CLASS;
      $this->show_redeem_box = MODULE_ORDER_TOTAL_GV_REDEEM_BOX;
      $this->credit_class = true;
      $this->checkbox = $this->user_prompt . '<input type="checkbox" onClick="submitFunction()" name="' . 'c' . $this->code . '">';
      $this->output = array();
    }

    function process() {
      global $order, $currencies, $cot_gv;
//      if ($_SESSION['cot_gv']) {  // old code Strider

       if (tep_session_is_registered('cot_gv')) {
        $order_total = $this->get_order_total();
        $od_amount = $this->calculate_credit($order_total);
        if ($this->calculate_tax != "None") {
          $tod_amount = $this->calculate_tax_deduction($order_total, $od_amount, $this->calculate_tax);
          $od_amount = $this->calculate_credit($order_total);
        }
        $this->deduction = $od_amount;
//        if (($this->calculate_tax == "Credit Note") && (DISPLAY_PRICE_WITH_TAX != 'true')) {
//          $od_amount -= $tod_amount;
//          $order->info['total'] -= $tod_amount;
//        }
        $order->info['total'] = $order->info['total'] - $od_amount;
        if ($od_amount > 0) {
          $this->output[] = array('title' => $this->title . ':',
                           'text' => '<b>' . $currencies->format($od_amount) . '</b>',
                           'value' => $od_amount);
        }
      }
    }

    function selection_test() {
      global $customer_id;
      if ($this->user_has_gv_account($_SESSION['customer_id'])) {
        return true;
      } else {
        return false;
      }
    }

  function pre_confirmation_check($order_total) {
		global $cot_gv, $order;
//		if ($_SESSION['cot_gv']) {  // old code Strider
			$od_amount = 0; // set the default amount we will send back
		  if (tep_session_is_registered('cot_gv')) {
// pre confirmation check doesn't do a true order process. It just attempts to see if
// there is enough to handle the order. But depending on settings it will not be shown
// all of the order so this is why we do this runaround jane. What do we know so far.
// nothing. Since we need to know if we process the full amount we need to call get order total
// if there has been something before us then

	      if ($this->include_tax == 'false') {
					$order_total = $order_total - $order->info['tax'];
				}
  	    if ($this->include_shipping == 'false') {
					$order_total = $order_total - $order->info['shipping_cost'];
				}
				$od_amount = $this->calculate_credit($order_total);


				if ($this->calculate_tax != "None") {
					$tod_amount = $this->calculate_tax_deduction($order_total, $od_amount, $this->calculate_tax);
					$od_amount = $this->calculate_credit($order_total)+$tod_amount;
				}
			}
		return $od_amount;
	}
    // original code
	/*function pre_confirmation_check($order_total) {
      if ($SESSION['cot_gv']) {
        $gv_payment_amount = $this->calculate_credit($order_total);
      }
      return $gv_payment_amount;
    } */

    function use_credit_amount() {
		global $cot_gv;
//      $_SESSION['cot_gv'] = false;     // old code - Strider
      $cot_gv = false;
      if ($this->selection_test()) {
        $output_string .=  '<tr><td align="right" class="main" colspan="3">';
        $output_string .= '<b>' . $this->checkbox . '</b>' . '</td></tr>';
      }
      return $output_string;
    }

    function update_credit_account($i) {
      global $order, $customer_id, $insert_id, $REMOTE_ADDR;
      if (ereg('^GIFT', addslashes($order->products[$i]['model']))) {
        $gv_order_amount = ($order->products[$i]['final_price'] * $order->products[$i]['qty']);
        if ($this->credit_tax=='true') $gv_order_amount = $gv_order_amount * (100 + $order->products[$i]['tax']) / 100;
//        $gv_order_amount += 0.001;
        $gv_order_amount = $gv_order_amount * 100 / 100;
        if (MODULE_ORDER_TOTAL_GV_QUEUE == 'false') {
          // GV_QUEUE is true so release amount to account immediately
          $gv_query=tep_db_query("select amount from " . TABLE_COUPON_GV_CUSTOMER . " where customer_id = '" . $_SESSION['customer_id'] . "'");
          $customer_gv = false;
          $total_gv_amount = 0;
          if ($gv_result = tep_db_fetch_array($gv_query)) {
            $total_gv_amount = $gv_result['amount'];
            $customer_gv = true;
          }
          $total_gv_amount = $total_gv_amount + $gv_order_amount;
          if ($customer_gv) {
            $gv_update=tep_db_query("update " . TABLE_COUPON_GV_CUSTOMER . " set amount = '" . $total_gv_amount . "' where customer_id = '" . $_SESSION['customer_id'] . "'");
          } else {
            $gv_insert=tep_db_query("insert into " . TABLE_COUPON_GV_CUSTOMER . " (customer_id, amount) values ('" . $_SESSION['customer_id'] . "', '" . $total_gv_amount . "')");
          }
        } else {
         // GV_QUEUE is true - so queue the gv for release by store owner
          $gv_insert=tep_db_query("insert into " . TABLE_COUPON_GV_QUEUE . " (customer_id, order_id, amount, date_created, ipaddr) values ('" . $_SESSION['customer_id'] . "', '" . $insert_id . "', '" . $gv_order_amount . "', NOW(), '" . $REMOTE_ADDR . "')");
        }
      }
    }

    function credit_selection() {
      global $customer_id, $currencies, $language;
      $selection_string = '';
      $gv_query = tep_db_query("select coupon_id from " . TABLE_COUPONS . " where coupon_type = 'G' and coupon_active='Y'");
      if (tep_db_num_rows($gv_query)) {
        $selection_string .= '<tr>' . "\n";
        $selection_string .= '  <td width="10">' .  tep_draw_separator('pixel_trans.gif', '10', '1') .'</td>';
        $selection_string .= '  <td class="main">' . "\n";
        $image_submit = '<input type="image" name="submit_redeem" onClick="submitFunction()" src="' . DIR_WS_LANGUAGES . $language . '/images/buttons/button_redeem.gif" border="0" alt="' . IMAGE_REDEEM_VOUCHER . '" title = "' . IMAGE_REDEEM_VOUCHER . '">';
        $selection_string .= TEXT_ENTER_GV_CODE . tep_draw_input_field('gv_redeem_code') . '</td>';
        $selection_string .= ' <td align="right">' . $image_submit . '</td>';
        $selection_string .= '  <td width="10">' . tep_draw_separator('pixel_trans.gif', '10', '1') . '</td>';
        $selection_string .= '</tr>' . "\n";
      }
    return $selection_string;
    }

    function apply_credit() {
      global $order, $customer_id, $coupon_no, $cot_gv;
      if (tep_session_is_registered('cot_gv')) {
	    echo "Applying credit...";
        $gv_query = tep_db_query("select amount from " . TABLE_COUPON_GV_CUSTOMER . " where customer_id = '" . $_SESSION['customer_id'] . "'");
        $gv_result = tep_db_fetch_array($gv_query);
        $gv_payment_amount = $this->deduction;
        $gv_amount = $gv_result['amount'] - $gv_payment_amount;
        $gv_update = tep_db_query("update " . TABLE_COUPON_GV_CUSTOMER . " set amount = '" . $gv_amount . "' where customer_id = '" . $_SESSION['customer_id'] . "'");
      }
      return $gv_payment_amount;
    }

    function collect_posts() {
// Security Update + $cot_gv added in Global in v5.13 by Rigadin + updated URL parameters of all tep_redirect function called inside this function
      global $currencies, $HTTP_POST_VARS, $customer_id, $coupon_no, $REMOTE_ADDR, $cot_gv;

	  
      if ($HTTP_POST_VARS['gv_redeem_code']) {
	    // Security update by Rigadin in v5.13: add slashes in front of user input
        $gv_query = tep_db_query("select coupon_id, coupon_type, coupon_amount from " . TABLE_COUPONS . " where coupon_code = '" . tep_db_input($HTTP_POST_VARS['gv_redeem_code']) . "'");
        $gv_result = tep_db_fetch_array($gv_query);
        if (tep_db_num_rows($gv_query) != 0) {
          $redeem_query = tep_db_query("select * from " . TABLE_COUPON_REDEEM_TRACK . " where coupon_id = '" . $gv_result['coupon_id'] . "'");
          if ( (tep_db_num_rows($redeem_query) != 0) && ($gv_result['coupon_type'] == 'G') ) {
		  // error, this coupon has been redeemed already.
            tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'payment_error='.$this->code.'&error=' . urlencode(ERROR_NO_INVALID_REDEEM_GV), 'SSL'));
          }
        }
		// Next line added by Rigadin in v5.13 to give an error when unknown code entered
		elseif ($HTTP_POST_VARS['submit_redeem_x']) tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'payment_error='.$this->code.'&error=' . urlencode(ERROR_NO_INVALID_REDEEM_GV), 'SSL'));
		
        if ($gv_result['coupon_type'] == 'G') {
          $gv_amount = $gv_result['coupon_amount'];
          // Things to set
          // ip address of claimant
          // customer id of claimant
          // date
          // redemption flag
          // now update customer account with gv_amount
          $gv_amount_query=tep_db_query("select amount from " . TABLE_COUPON_GV_CUSTOMER . " where customer_id = '" . $_SESSION['customer_id'] . "'");
          $customer_gv = false;
          $total_gv_amount = $gv_amount;
          if ($gv_amount_result = tep_db_fetch_array($gv_amount_query)) {
            $total_gv_amount = $gv_amount_result['amount'] + $gv_amount;
            $customer_gv = true;
          }
          $gv_update = tep_db_query("update " . TABLE_COUPONS . " set coupon_active = 'N' where coupon_id = '" . $gv_result['coupon_id'] . "'");
          $gv_redeem = tep_db_query("insert into  " . TABLE_COUPON_REDEEM_TRACK . " (coupon_id, customer_id, redeem_date, redeem_ip) values ('" . $gv_result['coupon_id'] . "', '" . $_SESSION['customer_id'] . "', now(),'" . $REMOTE_ADDR . "')");
          if ($customer_gv) {
            // already has gv_amount so update
            $gv_update = tep_db_query("update " . TABLE_COUPON_GV_CUSTOMER . " set amount = '" . $total_gv_amount . "' where customer_id = '" . $_SESSION['customer_id'] . "'");
          } else {
            // no gv_amount so insert
            $gv_insert = tep_db_query("insert into " . TABLE_COUPON_GV_CUSTOMER . " (customer_id, amount) values ('" . $_SESSION['customer_id'] . "', '" . $total_gv_amount . "')");
          }
          tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'payment_error='.$this->code.'&error=' . urlencode(ERROR_REDEEMED_AMOUNT. $currencies->format($gv_amount)), 'SSL'));
       }
     }
     // v5.13a Generates an error if redeem button pressed without code entered
     if ($HTTP_POST_VARS['submit_redeem_x'] && !$HTTP_POST_VARS['gv_redeem_code']) tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'payment_error='.$this->code.'&error=' . urlencode(ERROR_NO_REDEEM_CODE), 'SSL'));
   }

    function calculate_credit($amount) {
      global $customer_id, $order;
      $gv_query=tep_db_query("select amount from " . TABLE_COUPON_GV_CUSTOMER . " where customer_id = '" . $_SESSION['customer_id'] . "'");
      $gv_result=tep_db_fetch_array($gv_query);
      $gv_payment_amount = $gv_result['amount'];
      $gv_amount = $gv_payment_amount;
      $save_total_cost = $amount;
      $full_cost = $save_total_cost - $gv_payment_amount;
      if ($full_cost <= 0) {
        $full_cost = 0;
        $gv_payment_amount = $save_total_cost;
      }
      return tep_round($gv_payment_amount,2);
    }

    function calculate_tax_deduction($amount, $od_amount, $method) {
      global $order;
      switch ($method) {
        case 'Standard':
        // Amended line, was giving an error when a zero value was arriving here. v5.13 by Rigadin
		// v5.13 spelling error introduced an error, corrected
        //$ratio1 = tep_round($od_amount / $amount,2);
        $ratio1= ($amount==0? 0 : tep_round($od_amount / $amount,2) );
        $tod_amount = 0;
        reset($order->info['tax_groups']);
        while (list($key, $value) = each($order->info['tax_groups'])) {
          $tax_rate = tep_get_tax_rate_from_desc($key);
          $total_net += $tax_rate * $order->info['tax_groups'][$key];
        }
        if ($od_amount > $total_net) $od_amount = $total_net;
        reset($order->info['tax_groups']);
        while (list($key, $value) = each($order->info['tax_groups'])) {
          $tax_rate = tep_get_tax_rate_from_desc($key);
          $net = $tax_rate * $order->info['tax_groups'][$key];
          if ($net > 0) {
            $god_amount = $order->info['tax_groups'][$key] * $ratio1;
            $tod_amount += $god_amount;
            $order->info['tax_groups'][$key] = $order->info['tax_groups'][$key] - $god_amount;
          }
        }
        $order->info['tax'] -= $tod_amount;
        $order->info['total'] -= $tod_amount;
        break;
        case 'Credit Note':
          $tax_rate = tep_get_tax_rate($this->tax_class, $order->delivery['country']['id'], $order->delivery['zone_id']);
          $tax_desc = tep_get_tax_description($this->tax_class, $order->delivery['country']['id'], $order->delivery['zone_id']);
          $tod_amount = $this->deduction / (100 + $tax_rate)* $tax_rate;
          $order->info['tax_groups'][$tax_desc] -= $tod_amount;
//          $order->info['total'] -= $tod_amount;   //// ????? Strider
        break;
        default:
      }
      return $tod_amount;
    }

    function user_has_gv_account($c_id) {
      $gv_query = tep_db_query("select amount from " . TABLE_COUPON_GV_CUSTOMER . " where customer_id = '" . $c_id . "'");
      if ($gv_result = tep_db_fetch_array($gv_query)) {
        if ($gv_result['amount']>0) {
          return true;
        }
      }
      return false;
    }

    function get_order_total() {
      global $order;
      $order_total = $order->info['total'];
      if ($this->include_tax == 'false') $order_total = $order_total - $order->info['tax'];
      if ($this->include_shipping == 'false') $order_total = $order_total - $order->info['shipping_cost'];

      return $order_total;
    }
	
// START added by Rigadin in v5.13, needed to show module errors on checkout_payment page
    function get_error() {
      global $HTTP_GET_VARS;

      $error = array('title' => MODULE_ORDER_TOTAL_GV_TEXT_ERROR,
                     'error' => stripslashes(urldecode($HTTP_GET_VARS['error'])));

      return $error;
    }
// END added by Rigadin		

    function check() {
      if (!isset($this->check)) {
        $check_query = tep_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_ORDER_TOTAL_GV_STATUS'");
        $this->check = tep_db_num_rows($check_query);
      }

      return $this->check;
    }

    function keys() {
      return array('MODULE_ORDER_TOTAL_GV_STATUS', 'MODULE_ORDER_TOTAL_GV_SORT_ORDER', 'MODULE_ORDER_TOTAL_GV_QUEUE', 'MODULE_ORDER_TOTAL_GV_INC_SHIPPING', 'MODULE_ORDER_TOTAL_GV_INC_TAX', 'MODULE_ORDER_TOTAL_GV_CALC_TAX', 'MODULE_ORDER_TOTAL_GV_TAX_CLASS', 'MODULE_ORDER_TOTAL_GV_CREDIT_TAX');
    }

    function install() {
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Affichage', 'MODULE_ORDER_TOTAL_GV_STATUS', 'true', 'Voulez-vous autoriser l\'affichage de la remise pour les ch&egrave;ques cadeaux ?', '6', '1','tep_cfg_select_option(array(\'true\', \'false\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Ordre de tri', 'MODULE_ORDER_TOTAL_GV_SORT_ORDER', '740', 'Ordre de tri pour l\'affichage (Le plus petit nombre est montrer en premier).<br>', '6', '2', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Ch&egrave;ques en attente', 'MODULE_ORDER_TOTAL_GV_QUEUE', 'true', 'Voulez-vous mettre les ch&egrave;ques en attente de validation ?', '6', '3','tep_cfg_select_option(array(\'true\', \'false\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function ,date_added) values ('Livraison', 'MODULE_ORDER_TOTAL_GV_INC_SHIPPING', 'true', 'Voulez-vous inclure la livraison dans le caclule ?', '6', '5', 'tep_cfg_select_option(array(\'true\', \'false\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function ,date_added) values ('Taxe', 'MODULE_ORDER_TOTAL_GV_INC_TAX', 'true', 'Voulez-vous inclure la taxe dans le calcule ?', '6', '6','tep_cfg_select_option(array(\'true\', \'false\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function ,date_added) values ('Mode de calcule', 'MODULE_ORDER_TOTAL_GV_CALC_TAX', 'None', 'Quel mode utiliser pour recalculer la taxe ?', '6', '7','tep_cfg_select_option(array(\'None\', \'Standard\', \'Credit Note\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Type de Taxe', 'MODULE_ORDER_TOTAL_GV_TAX_CLASS', '0', 'Quel type de taxe voulez-vous utiliser pour les coupons de r&eacute;duction ?<br>', '6', '0', 'tep_get_tax_class_title', 'tep_cfg_pull_down_tax_classes(', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function ,date_added) values ('Inclure taxe', 'MODULE_ORDER_TOTAL_GV_CREDIT_TAX', 'false', 'Voulez-vous ajouter la taxe sur le ch&egrave;que cadeau ?', '6', '8','tep_cfg_select_option(array(\'true\', \'false\'), ', now())");
    }

    function remove() {
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }
  }
?>
