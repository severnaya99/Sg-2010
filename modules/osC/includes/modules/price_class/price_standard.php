<?php
/**
 * $Id: price_standard.php 57 2005-12-15 14:39:09Z Michael $
 * @package xosC
 * @subpackage price_class
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
**/

  class price_standard {
	var $code,$title,$description;

/**
 * Module class constructor
**/
    function price_standard() {

      $this->code = 'price_standard';
      $this->title = MODULE_PRICE_CLASS_STANDARD_TITLE;
      $this->description = MODULE_PRICE_CLASS_STANDARD_DESCRIPTION;
	}

  function getAdminPricing() {
      global $pInfo;
      $content='<tr bgcolor="#ebebff">';
      $content.='<td class="main">'.TEXT_PRODUCTS_PRICE_NET.'</td>';
      $content.='<td class="main">'.tep_draw_separator('pixel_trans.gif', '24', '15') . '&nbsp;' . tep_draw_input_field('products_price', $pInfo->products_price, 'onKeyUp="updateGross()"').'</td>';
      $content.= '</tr>';
      $content.='<tr bgcolor="#ebebff">';
      $content.='<td class="main">'.TEXT_PRODUCTS_PRICE_GROSS.'</td>';
      $content.='<td class="main">'.tep_draw_separator('pixel_trans.gif', '24', '15') . '&nbsp;' . tep_draw_input_field('products_price_gross', $pInfo->products_price, 'OnKeyUp="updateNet()"').'</td>';
      $content.='</tr>';
      return $content;
  }
/**
 * This function isnt needed for pre order processing
**/
    function quote($method = '') {
    }

/**
 * Check if module is installed
 * @return integer > 0 if module is installed
**/

    function check() {
      if (!isset($this->_check)) {
        $check_query = tep_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PREOP_GERMAN_STATUS'");
        $this->_check = tep_db_num_rows($check_query);
      }
      return $this->_check;
    }

/**
 * Module installing standard function
**/
    function install() {
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable german pre order processing', 'MODULE_PREOP_GERMAN_STATUS', 'True', 'Should the customer accept the terms of aggreement?', '6', '0', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('AGB abfragen ?', 'MODULE_PREOP_GERMAN_AGB_SHOW', 'True', 'Sollen die AGB angezeigt werden ?', '6', '2', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Widerruf abfragen ?', 'MODULE_PREOP_GERMAN_REVOKE_SHOW', 'True', 'Sollen die Widerrufsbelehrung angezeigt werden ?', '6', '4', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");

    }
/**
 * Module removing standard function
**/
    function remove() {
     tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }
/**
 * Module installing standard function
 * @return array The keys of this module
**/
    function keys() {
      return array('MODULE_PREOP_GERMAN_STATUS','MODULE_PREOP_GERMAN_AGB_SHOW','MODULE_PREOP_GERMAN_REVOKE_SHOW');
    }
	
	function showHTML() {
	  $preopHTML='<table>';
	  if(MODULE_PREOP_GERMAN_AGB_SHOW == 'True' ) {
	     if($_POST['agb'] == 1) $agb_checked="checked";
	    $preopHTML.='<tr><td><input name="agb" type="checkbox" '.$agb_checked.' value="1">Ich habe die <a href="terms_of_agreement.php">Allgemeinen Geschäftsbedingungen</a> gelesen und bin damit einverstanden</td></tr>';
	  }
	  if(MODULE_PREOP_GERMAN_REVOKE_SHOW == 'True' ) {
	    if($_POST['revoke'] == 1) $revoke_checked="checked";
	    $preopHTML.='<tr><td><input name="revoke" type="checkbox" '.$revoke_checked.' value="1">Ich habe die <a href="terms_of_revoke.php">Widerrufsbelehrung gelesen</a></td></tr>';
	  }
	  $preopHTML.='</table>';
	  return $preopHTML;
	}
/**
 * Validating the input
 * @return bool error
 *
**/  
  function validate()  {
	global $messageStack;
	$error=false;
    if(MODULE_PREOP_GERMAN_AGB_SHOW == true && $_POST['agb'] != 1 ) {
	  $messageStack->add('checkout_confirmation', NO_AGB_ERROR."BBB");
	  $error=true;
	}
	if(MODULE_PREOP_GERMAN_REVOKE_SHOW == true && $_POST['revoke'] != 1 ) {
	  $messageStack->add('checkout_confirmation', NO_REVOKE_ERROR);
	  $error=true;
	}
	return $error;
  }
}	
?>
