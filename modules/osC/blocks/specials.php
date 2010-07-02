<?php
/*
  $Id: specials.php 149 2006-01-27 13:31:07Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
function b_specials()
{ 
 global $currency,$currencies,$languages_id,$xoopsDB,$xoopsConfig,$customer_group,$customer_id,$_GET;

/* if(!defined("XOSC_BLOCK") && !defined("XOSC_CONFIG")) {
  define("XOSC_BLOCK",1);
  require_once(XOOPS_ROOT_PATH."/modules/osC/includes/application_top.php");
 }
*/
// Config Part

 require_once(XOOPS_ROOT_PATH."/modules/osC/includes/configure.php");
 require_once(XOOPS_ROOT_PATH."/modules/osC/includes/database_tables.php");
 require_once(XOOPS_ROOT_PATH."/modules/osC/includes/filenames.php");
 require_once(XOOPS_ROOT_PATH."/modules/osC/includes/functions/database.php");
 require_once(XOOPS_ROOT_PATH."/modules/osC/includes/functions/general.php");
 require_once(XOOPS_ROOT_PATH."/modules/osC/includes/functions/html_output.php");
 require_once(XOOPS_ROOT_PATH."/modules/osC/includes/classes/boxes.php");
 require_once(XOOPS_ROOT_PATH."/modules/osC/includes/classes/currencies.php");
 require_once(XOOPS_ROOT_PATH."/modules/osC/includes/classes/product.php");
 require_once(XOOPS_ROOT_PATH."/modules/osC/includes/classes/customer_group.php");
 require_once(XOOPS_ROOT_PATH."/modules/osC/includes/languages/".$xoopsConfig['language'].".php");
 //$currencies = new currencies();
 if(!isset($customer_group)) {
   if(!isset($_SESSION['customer_id'])) {
     $customer_group=new customer_group(0);
   }else {
    $customer_group=new customer_group($_SESSION['customer_id']);
   }
 } 

 if(!defined('XBLOCK_CONFIG')) {
   $configuration_query = tep_db_query('select configuration_key as cfgKey, configuration_value as cfgValue from ' . TABLE_CONFIGURATION);
   while ($configuration = tep_db_fetch_array($configuration_query)) {
     define($configuration['cfgKey'], $configuration['cfgValue']);
   }
   define('XBLOCK_CONFIG',"1");
 }
  if(!isset($_SESSION['languages_id'])) {
    $lang_query="select languages_id from ".TABLE_LANGUAGES." where directory ='".$xoopsConfig['language']."'";
	$lang=tep_db_query($lang_query);
	$lang_id=tep_db_fetch_array($lang);
	$languages_id=$lang_id['languages_id'];
  }else {
    $languages_id=$_SESSION['languages_id'];
   }
// currency
  if(isset($_GET['currency'])) $currency = $_GET['currency'];
  if (!session_is_registered('currency') || isset($HTTP_GET_VARS['currency']) || ( (USE_DEFAULT_LANGUAGE_CURRENCY == 'true') && (LANGUAGE_CURRENCY != $currency) ) ) {
    if (!session_is_registered('currency')) session_register('currency');

    if (isset($HTTP_GET_VARS['currency'])) {
      if (!$currency = tep_currency_exists($HTTP_GET_VARS['currency'])) $currency = (USE_DEFAULT_LANGUAGE_CURRENCY == 'true') ? LANGUAGE_CURRENCY : DEFAULT_CURRENCY;
    } else {
      $currency = (USE_DEFAULT_LANGUAGE_CURRENCY == 'true') ? LANGUAGE_CURRENCY : DEFAULT_CURRENCY;
    }
  }
  if($currency=='') {
    if (!$currency = tep_currency_exists($HTTP_GET_VARS['currency'])) {
	  $currency = (USE_DEFAULT_LANGUAGE_CURRENCY == 'true') ? LANGUAGE_CURRENCY : DEFAULT_CURRENCY;
    } 
  }
//$currencies = new currencies();
 if(! isset($currencies) || ! is_object($currencies)) { $currencies = new currencies(); }
//echo "CUR:".$currencies.":".$currency;
//print_r($currencies);
// Box Part
  if ($random_product = tep_random_select("select p.products_distributor_id,p.products_id, pd.products_name, p.products_price, p.products_tax_class_id, p.products_image, s.specials_new_products_price from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_SPECIALS . " s where p.products_status = '1' and p.products_id = s.products_id and pd.products_id = s.products_id and pd.language_id = '" . (int)$languages_id . "' and s.status = '1' order by s.specials_date_added desc limit " . MAX_RANDOM_SELECT_SPECIALS)) {
  	$sproduct = new product($random_product["products_id"]);
	$add_text='';

    if (  $customer_group->getdisplaytax() =='1') {
		$add_text='<br>'.TEXT_VAT_INFO.' '.$sproduct->get_tax().' % '.$sproduct->get_tax_title();
	} 
    if($customer_group->getdisplayshipment() == '1') {
	  $add_text.='<br>'.TEXT_SHIPPING_HANDLING_INFO;
	}

    $image_path=DIR_WS_IMAGES;
	switch($random_product['products_distributor_id']) {
	   case 1: $image_path='http://ec.ingrammicro.de/jpg/';
		break;
	    case 2: $image_path='';
		break;
	 }

    $info_box_contents = array();
    $info_box_contents[] = array('align' => 'center',
                                 'text' => '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $random_product["products_id"]) . '">' . tep_image($image_path . $random_product['products_image'], $random_product['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a><br><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $random_product['products_id']) . '">' . $random_product['products_name'] . '</a><br><s>' . $currencies->display_price($random_product['products_price'], tep_get_tax_rate($random_product['products_tax_class_id'])) . '</s><br><span class="productSpecialPrice">' . $currencies->display_price($random_product['specials_new_products_price'], tep_get_tax_rate($random_product['products_tax_class_id'])).'</span>' . $add_text);

    $block = new infoBox($info_box_contents);
  }
 return $block->content;

}
?>
