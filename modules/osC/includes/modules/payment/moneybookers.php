<?php
/*
  $Id: moneybookers.php,v 2.0 2004/04/20 12:00:00 by Templatefactory.info

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

  class moneybookers {
    var $code, $title, $description, $enabled;

// class constructor
    function moneybookers() {
      global $order;

      $this->code = 'moneybookers';
      $this->title = MODULE_PAYMENT_MONEYBOOKERS_TEXT_TITLE;
      $this->description = MODULE_PAYMENT_MONEYBOOKERS_TEXT_DESCRIPTION;
      $this->sort_order = MODULE_PAYMENT_MONEYBOOKERS_SORT_ORDER;
      $this->enabled = ((MODULE_PAYMENT_MONEYBOOKERS_STATUS == 'True') ? true : false);
      
      if ((int)MODULE_PAYMENT_MONEYBOOKERS_ORDER_STATUS_ID > 0) {
      $this->order_status = MODULE_PAYMENT_MONEYBOOKERS_ORDER_STATUS_ID;
      }

      $my_actionurl = 'https://www.moneybookers.com/app/payment.pl';
      if  (strlen(MODULE_PAYMENT_MONEYBOOKERS_REFID) <= '5') {$my_actionurl = $my_actionurl . '?rid=415261' ;}
      else {$my_actionurl = $my_actionurl . '?rid=' . MODULE_PAYMENT_MONEYBOOKERS_REFID ;}
       
      $this->form_action_url = $my_actionurl;
      }

// class methods
    function javascript_validation() {
      return false;
    }

    function selection() {
      return array('id' => $this->code,
                   'module' => $this->title);
    }

    function pre_confirmation_check() {
      return false;
    }

    function confirmation() {
      return false;
    }

    function process_button() {
      global $order, $currencies, $currency;

      if (MODULE_PAYMENT_MONEYBOOKERS_LANGUAGE == 'Selected Language') {
        $my_language = 'EN';
      } else {
        $my_language = MODULE_PAYMENT_MONEYBOOKERS_LANGUAGE;
      }

      if (MODULE_PAYMENT_MONEYBOOKERS_CURRENCY == 'Selected Currency') {
        $my_currency = $currency;
      } else {
        $my_currency = substr(MODULE_PAYMENT_MONEYBOOKERS_CURRENCY, 5);
      }
      if (!in_array($my_currency, array('EUR', 'USD', 'GBP', 'HKD', 'SGD', 'JPY', 'CAD', 'AUD', 'CHF', 'DKK', 'SEK', 'NOK', 'ILS', 'MYR', 'NZD', 'TWD', 'THB', 'CZK', 'HUF', 'SKK', 'ISK', 'INR'))) {
        $my_currency = 'EUR';
      }

$process_button_string = tep_draw_hidden_field('pay_to_email', MODULE_PAYMENT_MONEYBOOKERS_ID) .
                               tep_draw_hidden_field('language', $my_language) .
                               tep_draw_hidden_field('amount', number_format($order->info['total'] * $currencies->get_value($my_currency), $currencies->get_decimal_places($my_currency))) .
                               tep_draw_hidden_field('currency', $my_currency) .
                               tep_draw_hidden_field('detail1_description', STORE_NAME) .
                               tep_draw_hidden_field('detail1_text', 'Order - ' . date('d. M Y - H:i')) .
                               tep_draw_hidden_field('firstname', $order->billing['firstname']) .
                               tep_draw_hidden_field('lastname', $order->billing['lastname'] ) .
                               tep_draw_hidden_field('address', $order->billing['street_address']) .
                               tep_draw_hidden_field('postal_code', $order->billing['postcode']) .
                               tep_draw_hidden_field('city', $order->billing['city']) .
                               tep_draw_hidden_field('country', $order->billing['country']['moneybookers']) .
                               tep_draw_hidden_field('pay_from_email', $order->customer['email_address']) .
                               tep_draw_hidden_field('return_url', tep_href_link(FILENAME_CHECKOUT_PROCESS, '', 'SSL')) . 
							   tep_draw_hidden_field('cancel_url', tep_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL'));

      return $process_button_string;
    }

    function before_process() {
      return false;
    }

    function after_process() {
      return false;
    }

    function output_error() {
      return false;
    }

    function check() {
      if (!isset($this->_check)) {
        $check_query = tep_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_MONEYBOOKERS_STATUS'");
        $this->_check = tep_db_num_rows($check_query);
      }
      return $this->_check;
    }

    function install() {
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable moneybookers Module', 'MODULE_PAYMENT_MONEYBOOKERS_STATUS', 'True', 'Do you want to accept moneybookers payments?', '6', '3', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('E-Mail Address', 'MODULE_PAYMENT_MONEYBOOKERS_ID', '', 'The eMail address to use for the moneybookers service', '6', '4', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Referral ID', 'MODULE_PAYMENT_MONEYBOOKERS_REFID', '', 'Your personal Referral ID from moneybookers.com', '6', '7', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort order of display.', 'MODULE_PAYMENT_MONEYBOOKERS_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Transaction Currency', 'MODULE_PAYMENT_MONEYBOOKERS_CURRENCY', 'Selected Currency', 'The default currency for the payment transactions', '6', '5', 'tep_cfg_select_option(array(\'Selected Currency\',\'EUR\', \'USD\', \'GBP\', \'HKD\', \'SGD\', \'JPY\', \'CAD\', \'AUD\', \'CHF\', \'DKK\', \'SEK\', \'NOK\', \'ILS\', \'MYR\', \'NZD\', \'TWD\', \'THB\', \'CZK\', \'HUF\', \'SKK\', \'ISK\', \'INR\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Transaction Language', 'MODULE_PAYMENT_MONEYBOOKERS_LANGUAGE', 'Selected Language', 'The default language for the payment transactions', '6', '6', 'tep_cfg_select_option(array(\'Selected Language\',\'EN\', \'DE\', \'ES\', \'FR\'), ', now())");
    }

    function remove() {
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
      return array('MODULE_PAYMENT_MONEYBOOKERS_STATUS', 'MODULE_PAYMENT_MONEYBOOKERS_ID', 'MODULE_PAYMENT_MONEYBOOKERS_REFID', 'MODULE_PAYMENT_MONEYBOOKERS_LANGUAGE', 'MODULE_PAYMENT_MONEYBOOKERS_CURRENCY', 'MODULE_PAYMENT_MONEYBOOKERS_SORT_ORDER');
    }
  }
?>
