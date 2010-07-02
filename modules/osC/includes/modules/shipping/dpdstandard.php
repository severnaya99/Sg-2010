<?php
/**
 * $Id: dpdstandard.php 57 2005-12-15 14:39:09Z Michael $
 * osCommerce, Open Source E-Commerce Solutions
 * http://www.oscommerce.com
 * Copyright (c) 2002 - 2003 osCommerce
 * Released under the GNU General Public License
 * adapted 2005 for xoops by FlinkUX <http://www.flinkux.de>
 * @package xosC
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
**/
/********************************************************************
*	Copyright (C) 2005 silverwebdesign.de Autor: Steffen Schröder
*
*                    All rights reserved.
*
* This program is free software licensed under the GNU General Public License (GPL).
*
*    This program is free software; you can redistribute it and/or modify
*    it under the terms of the GNU General Public License as published by
*    the Free Software Foundation; either version 2 of the License, or
*    (at your option) any later version.
*
*    This program is distributed in the hope that it will be useful,
*    but WITHOUT ANY WARRANTY; without even the implied warranty of
*    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
*    GNU General Public License for more details.
*
*    You should have received a copy of the GNU General Public License
*    along with this program; if not, write to the Free Software
*    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307
*    USA
*
*********************************************************************/

  class dpdstandard {
    var $code, $title, $description, $icon, $enabled, $num_dpdstandard;

// class constructor
    function dpdstandard() {
      global $order;

      $this->code = 'dpdstandard';
      $this->title = MODULE_SHIPPING_DPDSTANDARD_TEXT_TITLE;
      $this->description = MODULE_SHIPPING_DPDSTANDARD_TEXT_DESCRIPTION;
      $this->sort_order = MODULE_SHIPPING_DPDSTANDARD_SORT_ORDER;
      $this->icon = DIR_WS_ICONS . 'shipping_dpd.gif';
      $this->tax_class = MODULE_SHIPPING_DPDSTANDARD_TAX_CLASS;
      $this->enabled = ((MODULE_SHIPPING_DPDSTANDARD_STATUS == 'True') ? true : false);

      if ( ($this->enabled == true) && ((int)MODULE_SHIPPING_DPDSTANDARD_ZONE > 0) ) {
        $check_flag = false;
        $check_query = tep_db_query("select zone_id from " . TABLE_ZONES_TO_GEO_ZONES . " where geo_zone_id = '" . MODULE_SHIPPING_DPDSTANDARD_ZONE . "' and zone_country_id = '" . $order->delivery['country']['id'] . "' order by zone_id");
        while ($check = tep_db_fetch_array($check_query)) {
          if ($check['zone_id'] < 1) {
            $check_flag = true;
            break;
          } elseif ($check['zone_id'] == $order->delivery['zone_id']) {
            $check_flag = true;
            break;
          }
        }

        if ($check_flag == false) {
          $this->enabled = false;
        }
      }

      // Einstellung der Zonen Anzahl die benötigt werden
      $this->num_dpdstandard = 10;
    }

// class methods
    function quote($method = '') {
      global $HTTP_POST_VARS, $order, $shipping_weight, $shipping_num_boxes,$cart;

      $dest_country = $order->delivery['country']['iso_code_2'];
      $dest_zone = 0;
      $error = false;

      for ($i=1; $i<=$this->num_dpdstandard; $i++) {
        $countries_table = constant('MODULE_SHIPPING_DPDSTANDARD_COUNTRIES_' . $i);
        $country_zones = split("[,]", $countries_table);
        if (in_array($dest_country, $country_zones)) {
          $dest_zone = $i;
          break;
        }
      }

      if ($dest_zone == 0) {
        $error = true;
      } else {
        $shipping = -1;
        $dpdstandard_cost = constant('MODULE_SHIPPING_DPDSTANDARD_COST_' . $i);

        $dpdstandard_table = split("[:,]" , $dpdstandard_cost);
        for ($i=0; $i<sizeof($dpdstandard_table); $i+=2) {
          if ($shipping_weight <= $dpdstandard_table[$i]) {
            $shipping = $dpdstandard_table[$i+1];
            $shipping_method = MODULE_SHIPPING_DPDSTANDARD_TEXT_WAY . ' ' . $dest_country . ': ';
            break;
          }
        }

        if ($shipping == -1) {
          $shipping_cost = 0;
          $shipping_method = MODULE_SHIPPING_DPDSTANDARD_UNDEFINED_RATE;
        } else {
          $shipping_cost = ($shipping + MODULE_SHIPPING_DPDSTANDARD_HANDLING);
        }
      }

      $this->quotes = array('id' => $this->code,
                            'module' => MODULE_SHIPPING_DPDSTANDARD_TEXT_TITLE,
                            'methods' => array(array('id' => $this->code,
                                                     'title' => $shipping_method . ' (' . $shipping_num_boxes . ' x ' . $shipping_weight . ' ' . MODULE_SHIPPING_DPDSTANDARD_TEXT_UNITS .')',
                                                     'cost' => $shipping_cost * $shipping_num_boxes)));

      if ($this->tax_class > 0) {
        $this->quotes['tax'] = tep_get_tax_rate($this->tax_class, $order->delivery['country']['id'], $order->delivery['zone_id']);
      }

      if (tep_not_null($this->icon)) $this->quotes['icon'] = tep_image($this->icon, $this->title);

      if ($error == true) $this->quotes['error'] = MODULE_SHIPPING_DPDSTANDARD_INVALID_ZONE;

      return $this->quotes;
    }

    function check() {
      if (!isset($this->_check)) {
        $check_query = tep_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_SHIPPING_DPDSTANDARD_STATUS'");
        $this->_check = tep_db_num_rows($check_query);
      }
      return $this->_check;
    }

    function install() {
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) VALUES ('Deutscher Paket Dienst - DPD', 'MODULE_SHIPPING_DPDSTANDARD_STATUS', 'True', 'Wollen Sie den Versand über den deutschen Paketdienst anbieten?', '6', '0', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Bearbeitungsgebühr', 'MODULE_SHIPPING_DPDSTANDARD_HANDLING', '0', 'Bearbeitungsgebühr für diese Versandart in Euro', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Steuersatz', 'MODULE_SHIPPING_DPDSTANDARD_TAX_CLASS', '0', 'Wählen Sie den MwSt. Satz für diese Versandart aus.', '6', '0', 'tep_get_tax_class_title', 'tep_cfg_pull_down_tax_classes(', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Versand Zone', 'MODULE_SHIPPING_DPDSTANDARD_ZONE', '0', 'Wenn Sie eine Zone auswählen, wird diese Versandart nur in dieser Zone angeboten.', '6', '0', 'tep_get_zone_class_title', 'tep_cfg_pull_down_zone_classes(', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Reihenfolge der Anzeige', 'MODULE_SHIPPING_DPDSTANDARD_SORT_ORDER', '0', 'Niedrigste wird zuerst angezeigt.', '6', '0', now())");

      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('DPD Zone 1 Länder', 'MODULE_SHIPPING_DPDSTANDARD_COUNTRIES_1', 'AT,BE,LU,NL,CH,DK,LI,CZ', 'Liste der Länder für Zone 1', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('DPD Zone 1 Versandkosten Tabelle', 'MODULE_SHIPPING_DPDSTANDARD_COST_1', '2:9.45,3:10.15,5:12.15,6:13.15,7:14.15,8:14.95,9:14.95,10:15.75,12:16.55,14:16.55,16:17.30,18:18.00,20:18.95,22:20.15,24:20.95,26:22.55,28:23.75,30:25.00,31:56.85', 'Versandkosten für Zone 1.', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('DPD Zone 2 Länder', 'MODULE_SHIPPING_DPDSTANDARD_COUNTRIES_2', 'GB,IT', 'Liste der Länder für Zone 2', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('DPD Zone 2 Versandkosten Tabelle', 'MODULE_SHIPPING_DPDSTANDARD_COST_2', '2:12.75,3:13.45,5:12.15,6:15.65,7:18.15,8:18.95,9:18.95,10:21.75,12:23.55,14:24.55,16:26.30,18:27.55,20:29.95,22:30.15,24:31.95,26:33.55,28:35.75,30:35.00,31:66.85', 'Versandkosten für Zone 2.', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('DPD Zone 3 Länder', 'MODULE_SHIPPING_DPDSTANDARD_COUNTRIES_3', 'SE,ES,FI,NO,EE,LT', 'Liste der Länder für Zone 3', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('DPD Zone 3 Versandkosten Tabelle', 'MODULE_SHIPPING_DPDSTANDARD_COST_3', '2:22.75,3:23.45,5:24.75,6:25.65,7:26.15,8:27.95,9:28.95,10:30.95,12:33.55,14:34.55,16:38.30,18:41.55,20:43.95,22:44.95,24:47.95,26:49.95,28:52.75,30:55.00,31:86.85', 'Versandkosten für Zone 3.', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('DPD Zone 4 Länder', 'MODULE_SHIPPING_DPDSTANDARD_COUNTRIES_4', 'PT,IE', 'Liste der Länder für Zone 4', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('DPD Zone 4 Versandkosten Tabelle', 'MODULE_SHIPPING_DPDSTANDARD_COST_4', '2:26.75,3:27.95,5:28.75,6:29.65,7:30.15,8:30.95,9:31.95,10:32.95,12:33.55,14:33.55,16:34.30,18:35.55,20:35.95,22:36.95,24:37.95,26:39.15,28:38.95,30:39.95,31:69.95', 'Versandkosten für Zone 4.', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('DPD Zone 5 Länder', 'MODULE_SHIPPING_DPDSTANDARD_COUNTRIES_5', 'GR', 'Liste der Länder für Zone 5', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('DPD Zone 5 Versandkosten Tabelle', 'MODULE_SHIPPING_DPDSTANDARD_COST_5', '2:56.75,3:57.95,5:58.75,6:59.65,7:61.15,8:62.95,9:63.95,10:65.95,12:66.55,14:67.55,16:68.30,18:69.55,20:70.95,22:72.95,24:73.95,26:74.15,28:75.95,30:77.95,31:109.95', 'Versandkosten für Zone 5.', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('DPD Deutschland', 'MODULE_SHIPPING_DPDSTANDARD_COUNTRIES_6', 'DE', 'Deutschland (ISO DE)', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('DPD Versandkosten BRD', 'MODULE_SHIPPING_DPDSTANDARD_COST_6', '2:5.95,4:6.55,6:7.15,8:7.65,10:8.55,12:9.40,14:10.20,16:11.10,18:11.95,20:12.75,22:13.95,24:15.10,26:16.20,28:17.65,31:39.95', 'Versandkosten für Zone 6.', '6', '0', now())");
 tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('DPD Zone 7 Länder', 'MODULE_SHIPPING_DPDSTANDARD_COUNTRIES_7', 'AL,AM,AZ,BG,HR,KG,KZ,RO,RU,TJ,TM,UA,UZ,AD,GI,MT,SM,MK,CA,IS,MX,PR,US', 'Liste der Länder für Zone 7', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('DPD Zone 7 Versandkosten Tabelle', 'MODULE_SHIPPING_DPDSTANDARD_COST_7', '2:86.75,3:87.95,5:103.75,6:108.65,7:112.15,8:117.95,9:121.95,10:126.95,12:134.95,14:144.55,16:152.30,18:164.55,20:174.95,22:184.95,24:194.95,26:203.15,28:211.95,30:221.95,31:255.95', 'Versandkosten für Zone 7.', '6', '0', now())");
	 tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('DPD Zone 8 Länder', 'MODULE_SHIPPING_DPDSTANDARD_COUNTRIES_8', 'AE,AU,BD,BF,BH,BO,CK,CR,CY,GY,HK,ID,IL,IN,IR,JO,JP,KH,KR,KW,LA,LB,LK,MM,MO,MV,MY,NC,NZ,OM,PG,PH,PK,SA,SB,SG,SY,TH,TO,TW,VN,VU,YE,AG,AI,AN,AR,AW,BB,BJ,BN,BS,BW,BZ,CL,CN,CO,DJ,EC,FJ,GF,GP,GT,GU,HN,HT,JM,LC,MQ,MS,NI,PA,PE,PY,SR,TC,TT,UY,VC,VE,AO,BI,BM,BR,CD', 'Liste der Länder für Zone 8', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('DPD Zone 8 Versandkosten Tabelle', 'MODULE_SHIPPING_DPDSTANDARD_COST_8', '2:121.75,3:126.95,5:145.75,6:150.65,7:155.15,8:160.95,9:165.95,10:170.95,12:180.95,14:191.55,16:202.30,18:216.55,20:229.95,22:242.95,24:254.95,26:266.15,28:278.95,30:289.95,31:325.95', 'Versandkosten für Zone 8.', '6', '0', now())");    
 tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('DPD Zone 9 Länder', 'MODULE_SHIPPING_DPDSTANDARD_COUNTRIES_9', 'HU,SI,', 'Liste der Länder für Zone 9', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('DPD Zone 9 Versandkosten Tabelle', 'MODULE_SHIPPING_DPDSTANDARD_COST_9', '2:13.95,3:16.95,5:18.75,6:19.65,7:20.15,8:21.95,9:22.95,10:23.95,12:23.95,14:24.95,16:25.85,18:26.75,20:27.95,22:29.95,24:30.95,26:31.15,28:33.95,30:34.95,31:65.95', 'Versandkosten für Zone 9.', '6', '0', now())");  
        tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('DPD Zone 10 Länder', 'MODULE_SHIPPING_DPDSTANDARD_COUNTRIES_10', 'PL,SK,', 'Liste der Länder für Zone 10', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('DPD Zone 10 Versandkosten Tabelle', 'MODULE_SHIPPING_DPDSTANDARD_COST_10', '2:17.95,3:18.95,5:20.75,6:21.65,7:22.15,8:22.95,9:23.95,10:24.95,12:25.95,14:26.95,16:28.85,18:29.75,20:30.95,22:31.95,24:32.95,26:34.15,28:35.95,30:37.95,31:68.95', 'Versandkosten für Zone 10.', '6', '0', now())"); 
       }
    function remove() {
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
      $keys = array('MODULE_SHIPPING_DPDSTANDARD_STATUS', 'MODULE_SHIPPING_DPDSTANDARD_HANDLING', 'MODULE_SHIPPING_DPDSTANDARD_TAX_CLASS', 'MODULE_SHIPPING_DPDSTANDARD_ZONE', 'MODULE_SHIPPING_DPDSTANDARD_SORT_ORDER');

      for ($i = 1; $i <= $this->num_dpdstandard; $i ++) {
        $keys[count($keys)] = 'MODULE_SHIPPING_DPDSTANDARD_COUNTRIES_' . $i;
        $keys[count($keys)] = 'MODULE_SHIPPING_DPDSTANDARD_COST_' . $i;
      }

      return $keys;
    }
  }
?>