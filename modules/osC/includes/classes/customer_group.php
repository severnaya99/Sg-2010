<?php
/**
 * $Id: customer_group.php 56 2005-12-09 15:10:01Z Michael $
 * xosC - eCommerce for xoops
 * @package xosC
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
**/

  class customer_group {

    var $fsk18;
	var $tax;
	var $shipping;
	var $payment;
	var $name;
	var $display_shipment;
	var $display_tax;
/**
 * class constructor
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
 * @param $customer_id customer_id customer_id = 0 means guest 
**/
    function customer_group($customer_id) {
	  if($customer_id == 0) {
	    $customer_group_query = tep_db_query("select * from ".TABLE_CUSTOMER_GROUP." where customer_group_id= 1 ");
  	  }else {
	    $customer_group_query = tep_db_query("select * from ".TABLE_CUSTOMER_GROUP." cg left join ".TABLE_CUSTOMERS." c on c.customers_group_id = cg.customer_group_id where c.customers_id = ".$customer_id);
	  }
	  $customer_group=tep_db_fetch_array($customer_group_query);
      $this->tax=$customer_group['customer_group_tax'];
      $this->fsk18=$customer_group['customer_group_fsk18'];
	  $this->shipping=$customer_group['customer_group_shipping'];
      $this->payment=$customer_group['customer_group_payment'];
      $this->name=$customer_group['customer_group_name'];
	  $this->display_tax=$customer_group['customer_group_display_tax'];
	  $this->display_shipment=$customer_group['customer_group_display_shipment'];
	}  
/**
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
 * @return bool FSK18 right of the group 
**/

	function getfsk18() {
	 return $this->fsk18;
	}
/**
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
 * @return bool tax info for product view
**/

	function gettax() {
	  return $this->tax;
	}
/**
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
 * @return string semikolon seperated List of payment modules allowed by customer group
**/
	function getpayment() {
	  return $this->payment;
	}
/**
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
 * @return string semikolon seperated List of shipping modules allowed by customer group
**/
 	function getshipment() {
	  return $this->shipping;
	}
/**
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
 * @return bool Should tax informations displayed in product listing
**/

    function getdisplaytax() {
	  return $this->display_tax;
	}
/**
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
 * @return bool Should shipment info displayed in product listing
**/

    function getdisplayshipment() {
	  return $this->display_shipment;
	}

}
?>
