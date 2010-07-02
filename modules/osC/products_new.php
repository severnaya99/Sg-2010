<?php
/**
 * $Id: products_new.php 81 2006-01-21 16:14:13Z Michael $
 * osCommerce, Open Source E-Commerce Solutions
 * http://www.oscommerce.com
 * Copyright (c) 2003 osCommerce
 * Released under the GNU General Public License
 * adapted 2005 for xoops by FlinkUX <http://www.flinkux.de>
 * @package xosC
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
**/

  require('includes/application_top.php');
  include(DIR_WS_CLASSES."product.php");
$xoopsOption['template_main'] = 'products_new.html';
include XOOPS_ROOT_PATH.'/header.php';
$xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" />');

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_PRODUCTS_NEW);

  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_PRODUCTS_NEW));
  include("includes/header.php");
  $xoopsTpl->assign("seperator",tep_draw_separator('pixel_trans.gif', '100%', '10'));
  $xoopsTpl->assign("site_image",tep_image(DIR_WS_IMAGES . 'table_background_products_new.gif', HEADING_TITLE, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT));
  $products_new_array = array();

  $products_new_query_raw = "select p.products_id, pd.products_name, p.products_image, p.products_price, p.products_tax_class_id, p.products_date_added, m.manufacturers_name from " . TABLE_PRODUCTS . " p left join " . TABLE_MANUFACTURERS . " m on (p.manufacturers_id = m.manufacturers_id), " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by p.products_date_added DESC, pd.products_name";
  $products_new_split = new splitPageResults($products_new_query_raw, MAX_DISPLAY_PRODUCTS_NEW);

  if (($products_new_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3'))) {
    $xoopsTpl->assign("psplit",1);
	$xoopsTpl->assign("product_split",$products_new_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS_NEW));
	$xoopsTpl->assign("product_split_links",$products_new_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y'))));
  }
  if ($products_new_split->number_of_rows > 0) {
    $xoopsTpl->assign("sprd",1);
    $products_new_query = tep_db_query($products_new_split->sql_query);
	$i=0;
	$xoopsTpl->assign("width",SMALL_IMAGE_WIDTH + 10);
    while ($products_new = tep_db_fetch_array($products_new_query)) {
	  $sproduct = new product($products_new['products_id']);
	  $prdct[$i]=$products_new;
      if ($new_price = tep_get_products_special_price($products_new['products_id'])) {
	    $prdct[$i]['price'] ='<s>' . $currencies->display_price($products_new['products_price'], tep_get_tax_rate($products_new['products_tax_class_id'])) . '</s> <span class="productSpecialPrice">' . $currencies->display_price($new_price, tep_get_tax_rate($products_new['products_tax_class_id'])) . '</span>';
//        $products_price = '<s>' . $currencies->display_price($products_new['products_price'], tep_get_tax_rate($products_new['products_tax_class_id'])) . '</s> <span class="productSpecialPrice">' . $currencies->display_price($new_price, tep_get_tax_rate($products_new['products_tax_class_id'])) . '</span>';
      } else {
	    $prdct[$i]['price']=$currencies->display_price($products_new['products_price'], tep_get_tax_rate($products_new['products_tax_class_id']));
       // $products_price = $currencies->display_price($products_new['products_price'], tep_get_tax_rate($products_new['products_tax_class_id']));
      }
	  if (  $customer_group->getdisplaytax() == '1') {
		$prdct[$i]['price'].='<br>'.TEXT_VAT_INFO.' '.$sproduct->get_tax().' % '.$sproduct->get_tax_title();
	  } 
      if( $customer_group->getdisplayshipment() == '1') {
	    $prdct[$i]['price'].='<br>'.TEXT_SHIPPING_HANDLING_INFO;
	  }
      $prdct[$i]['products_name'].='<br>'.$sproduct->get_short_description();
	  $prdct[$i]['link']=tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products_new['products_id']);
	  $prdct[$i]['image']=tep_image($sproduct->get_image_path() . $sproduct->get_image(), $products_new['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT);
      $prdct[$i]['info']=tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products_new['products_id']);
	  $prdct[$i]['buyimage']=tep_image_button('button_in_cart.gif', IMAGE_BUTTON_IN_CART);
	  $prdct[$i]['date']=tep_date_long($products_new['products_date_added']);
	  $prdct[$i]['buy']=tep_href_link(FILENAME_PRODUCTS_NEW, tep_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $products_new['products_id']) ;
      $i++;
	}
	$xoopsTpl->assign("products",$prdct);
  } 
  if (($products_new_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3'))) {
    $xoopsTpl->assign("psplit2",1);
	$xoopsTpl->assign("new_split",$products_new_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS_NEW));
	$xoopsTpl->assign("new_split_link",$products_new_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y'))));
  }
  include_once XOOPS_ROOT_PATH.'/footer.php';
  include("includes/application_bottom.php");
?>