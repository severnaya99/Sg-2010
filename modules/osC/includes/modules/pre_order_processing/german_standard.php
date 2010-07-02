<?php
/**
 * $Id: german_standard.php 58 2005-12-15 16:21:17Z Michael $
 * @package xosC
 * @subpackage pre_order_processing
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
**/

  class german_standard {
	var $code,$title,$description,$enabled=false,$icon;

/**
 * Module class constructor
**/
    function german_standard() {

      $this->code = 'german_standard';
      $this->title = MODULE_PREOP_GERMAN_TEXT_TITLE;
      $this->description = MODULE_PREOP_GERMAN_TEXT_DESCRIPTION;
//      $this->sort_order = MODULE_PREOP_GERMAN_SORT_ORDER;
      $this->icon = '';
	  if(defined('MODULE_PREOP_GERMAN_STATUS')) {
        $this->enabled = ((MODULE_PREOP_GERMAN_STATUS == 'True') ? true : false);
      }
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
    if(MODULE_PREOP_GERMAN_AGB_SHOW == "True" && $_POST['agb'] != 1 ) {
	  $messageStack->add('checkout_confirmation', NO_AGB_ERROR);
	  $error=true;
	}
	if(MODULE_PREOP_GERMAN_REVOKE_SHOW == "True" && $_POST['revoke'] != 1 ) {
	  $messageStack->add('checkout_confirmation', NO_REVOKE_ERROR);
	  $error=true;
	}
	return $error;
  }
}	
?>
