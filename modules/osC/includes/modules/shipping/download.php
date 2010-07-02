<?php
/**
 * $Id: download.php 60 2005-12-15 16:22:42Z Michael $
 * osCommerce, Open Source E-Commerce Solutions
 * http://www.oscommerce.com
 * Copyright (c) 2003 osCommerce
 * Released under the GNU General Public License
**/

  class download {
    var $code, $title, $description, $icon, $enabled;

// class constructor
    function download() {
      global $order;

      $this->code = 'download';
      $this->title = MODULE_SHIPPING_DOWNLOAD_TEXT_TITLE;
      $this->description = MODULE_SHIPPING_DOWNLOAD_TEXT_DESCRIPTION;
      $this->sort_order = MODULE_SHIPPING_DOWNLOAD_SORT_ORDER;
      $this->icon = '';
      $this->enabled = ((MODULE_SHIPPING_DOWNLOAD_STATUS == 'True') ? true : false);

      
    }

// class methods
    function quote($method = '') {
      global $order;

      $this->quotes = array('id' => $this->code,
                            'module' => MODULE_SHIPPING_DOWNLOAD_TEXT_TITLE,
                            'methods' => array(array('id' => $this->code,
                                                     'title' => MODULE_SHIPPING_DOWNLOAD_TEXT_WAY,
                                                     'cost' => 0)));


      if (tep_not_null($this->icon)) $this->quotes['icon'] = tep_image($this->icon, $this->title);

      return $this->quotes;
    }

    function check() {
      if (!isset($this->_check)) {
        $check_query = tep_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_SHIPPING_DOWNLOAD_STATUS'");
        $this->_check = tep_db_num_rows($check_query);
      }
      return $this->_check;
    }

    function install() {
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable Email/download Shipping', 'MODULE_SHIPPING_DOWNLOAD_STATUS', 'True', 'Do you want to offer download / email shipping ?', '6', '0', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_SHIPPING_DOWNLOAD_SORT_ORDER', '0', 'Sort order of display.', '6', '0', now())");
    }

    function remove() {
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
      return array('MODULE_SHIPPING_DOWNLOAD_STATUS',    'MODULE_SHIPPING_DOWNLOAD_SORT_ORDER');
    }
  }
?>
