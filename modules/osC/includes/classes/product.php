<?php
/**
 * $Id: product.php 64 2005-12-19 18:07:20Z Michael $
 * xosC - eCommerce for xoops
 * @package xosC
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
**/

  class product {

    var $price;
	var $tax;
	var $tax_title;
	var $weight;
	var $short_description;
	var $image_path;
	var $pdf_path;
	var $name;
	var $image;
/**
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
 * @param $pID products_id
**/
    function product($pID) {
	  global $languages_id;
	  
	  $product_info_query = tep_db_query("select p.products_distributor_id,p.products_id, pd.products_name, pd.products_description,pd.short_description, p.products_model, p.products_quantity, p.products_image, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id,p.products_weight from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = '" . $pID . "' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "'");
	  $product_info=tep_db_fetch_array($product_info_query);
	  $this->price=$product_info['products_price'];
	  $this->tax=tep_get_tax_rate($product_info['products_tax_class_id']);
	  $tax_class_query=tep_db_query("select tax_class_title from  ".TABLE_TAX_CLASS." where tax_class_id=".$product_info['products_tax_class_id']);
	  $tax_class=tep_db_fetch_array($tax_class_query);
	  $this->tax_title=$tax_class['tax_class_title'];
	  $this->weight=$product_info['products_weight'];
      $this->short_description=$product_info['short_description'];
      $this->name=$product_info['products_name'];
      $this->image=$product_info['products_image'];
/**
 * added for distributor specific data
**/	  
	  $distributor_path_query = tep_db_query("select * from ".TABLE_DISTRIBUTORS." where distributor_id=".$product_info['products_distributor_id']);
	  $distributor_path=tep_db_fetch_array($distributor_path_query);
	  $this->pdf_path=$distributor_path['pdf_prefix'];
	  $this->image_path=$distributor_path['image_prefix'];
      if($this->image_path == '') $this->image_path=DIR_WS_IMAGES;
      if($this->image == '') { 
	    $this->image='empty.jpg';
        $this->image_path=DIR_WS_IMAGES;
	  }
	}  
/**
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
**/
	function get_tax_title() {
		return $this->tax_title;
	}
/**
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
**/
	function get_tax() {
		return $this->tax;
	}

/**
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
**/
    function get_short_description() {
	  return $this->short_description;
	}
/**
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
**/

    function get_pdf_path() {
	  return $this->pdf_path;
	}
/**
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
**/

	function get_image_path() {
	  return $this->image_path;
	}
/**
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
**/

	function get_name() {
	  return $this->name;
	}
  
    function get_image() {
      return $this->image;
	}

}
?>
