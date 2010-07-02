<?php
/**
 * $Id: product_info.php 149 2006-01-27 13:31:07Z Michael $
 * osCommerce, Open Source E-Commerce Solutions
 * http://www.oscommerce.com
 * Copyright (c) 2003 osCommerce
 * Released under the GNU General Public License
 * adapted 2005 for xoops 2.0.x by FlinkUX e.K. <http://www.flinkux.de>
 * (c) 2005  Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @package xosC
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
**/

include("includes/application_top.php");
include(DIR_WS_CLASSES."product.php");
$xoopsOption['template_main'] = 'product_info.html';
include XOOPS_ROOT_PATH.'/header.php';
$xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" />');

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_PRODUCT_INFO);
  $seperator=tep_draw_separator('pixel_trans.gif', '100%', '10');
  include("includes/header.php");
  $product_check_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_fsk18 <= ".$customer_group->getfsk18()." and p.products_status = '1' and p.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "'");
  $product_check = tep_db_fetch_array($product_check_query);

  $jscript='';

  $xoopsTpl->assign("cartform",tep_draw_form('cart_quantity', tep_href_link(FILENAME_PRODUCT_INFO, tep_get_all_get_params(array('action')) . 'action=add_product')));
  if ($product_check['total'] < 1) {
	$xoopsTpl->assign("noproduct",1);
	$noproduct=new infoBox(array(array('text' => TEXT_PRODUCT_NOT_FOUND)));
	$noproduct=$noproduct->content;
	$xoopsTpl->assign("noproducttxt",$noproduct);
	$xoopsTpl->assign("goon",tep_href_link(FILENAME_DEFAULT) . '">' . tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE));
  } else {
    $product_info_query = tep_db_query("select p.products_pdf,p.products_id, pd.products_name, pd.products_description, p.products_model, p.products_quantity, p.products_image, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "'");
    $product_info = tep_db_fetch_array($product_info_query);

    tep_db_query("update " . TABLE_PRODUCTS_DESCRIPTION . " set products_viewed = products_viewed+1 where products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and language_id = '" . (int)$languages_id . "'");

    if ($new_price = tep_get_products_special_price($product_info['products_id'])) {
      $products_price = '<s>' . $currencies->display_price($product_info['products_price'], tep_get_tax_rate($product_info['products_tax_class_id'])) . '</s> <span class="productSpecialPrice">' . $currencies->display_price($new_price, tep_get_tax_rate($product_info['products_tax_class_id'])) . '</span>';
    } else {
      $products_price ="". $currencies->display_price($product_info['products_price'], tep_get_tax_rate($product_info['products_tax_class_id']))."";
    }

/*    if (tep_not_null($product_info['products_model'])) {
      $products_name = $product_info['products_name'] . '<br><span class="smallText">[' . $product_info['products_model'] . ']</span>';
    } else {
      $products_name = $product_info['products_name'];
    }
*/
    $products_name = $product_info['products_name'];
if (tep_not_null($product_info['products_model'])) {
	$xoopsTpl->assign("products_model",'[ '. $product_info['products_model']. ' ]');
}
	$sproduct=new product($HTTP_GET_VARS['products_id']);
	if ($customer_group->getdisplaytax() == '1' ) {
      $xoopsTpl->assign("products_tax_text",TEXT_VAT_INFO." ".$sproduct->get_tax()."% ".$sproduct->get_tax_title());
	}
	if($customer_group->getdisplayshipment() == '1' ) {
	 $xoopsTpl->assign("products_shipment_text",TEXT_SHIPPING_HANDLING_INFO);
	}
    if (tep_not_null($product_info['products_pdf'])) {
      $xoopsTpl->assign("pdf",1);
	  $xoopsTpl->assign("pdftext",sprintf(TEXT_PDF_INFO,$sproduct->get_pdf_path().$product_info['products_pdf']));
	 }
	$xoopsTpl->assign("products_name",$products_name);
	$xoopsTpl->assign("products_price",$products_price);
    if (tep_not_null($product_info['products_image'])) {
    	$xoopsTpl->assign("image",1);
/*
//		$pjs='<script language="javascript"><!--';
//		$pjs.='document.write(\'<a href="javascript:popupWindow(\'' . tep_href_link(FILENAME_POPUP_IMAGE, 'pID=' . $product_info['products_id']) . '\')">' . tep_image(DIR_WS_IMAGES . $product_info['products_image'], addslashes($product_info['products_name']), SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'hspace="5" vspace="5"') . '<br>' . TEXT_CLICK_TO_ENLARGE . '</a>)');
//		$pjs.='//--></script>'';
//		$pjs.='<noscript>';
*/
		$pjimage=tep_href_link(FILENAME_POPUP_IMAGE, 'pID=' . $product_info['products_id']);
		$pjimagetext=tep_image($sproduct->get_image_path() . $sproduct->get_image(), addslashes($product_info['products_name']), SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'hspace="5" vspace="5"');
		$pjimagehref=tep_href_link($sproduct->get_image_path() . $product_info['products_image']);
		$pjimagehreftext=tep_image($sproduct->get_image_path() . $product_info['products_image'], $product_info['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'hspace="5" vspace="5"');
		$xoopsTpl->assign("pjimage",$pjimage);
		$xoopsTpl->assign("pjimagetext",$pjimagetext);
		$xoopsTpl->assign("pjimagehref",$pjimagehref);
		$xoopsTpl->assign("pjimagehreftext",$pjimagehreftext);
    }
	$xoopsTpl->assign("p_desc",stripslashes($product_info['products_description']));
    $products_attributes_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . (int)$HTTP_GET_VARS['products_id'] . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . (int)$languages_id . "'");
    $products_attributes = tep_db_fetch_array($products_attributes_query);
	 $jscript.='var option_name = new Array;';
    if ($products_attributes['total'] > 0) {
	 $xoopsTpl->assign("attr",1);
      $products_options_name_query = tep_db_query("select distinct popt.products_options_id, popt.products_options_name from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . (int)$HTTP_GET_VARS['products_id'] . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . (int)$languages_id . "' order by popt.products_options_name");
	  $i=0;

	 $jscript.='var product_options = new Array;';
	 $jscript.='var option_selected = new Array;';

	 $jscript.='currency_prefix=\''.$currencies->currencies[$currency]['symbol_left'].'\';';
	 	 $jscript.='currency_postfix=\''.$currencies->currencies[$currency]['symbol_right'].'\';';
	 $ppreis=$product_info['products_price']+($product_info['products_price']*tep_get_tax_rate($product_info['products_tax_class_id'])/100);
	 $jscript.='ppreis='.$ppreis.';';
      while ($products_options_name = tep_db_fetch_array($products_options_name_query)) {
      $products_options_array = array();
	  $jscript.='product_options[\'id[' . $products_options_name['products_options_id'] . ']\']=new Array;';
	  $jscript.='option_selected[\'id[' . $products_options_name['products_options_id'] . ']\']=0;';
	  $jscript.='option_name['.$i.']=\'id[' . $products_options_name['products_options_id'] . ']\';';
//	  $jscript.='id[' . $products_options_name['products_options_id'] . '] = new array();';
        $products_options_query = tep_db_query("select pov.products_options_values_id, pov.products_options_values_name, pa.options_values_price, pa.price_prefix from " . TABLE_PRODUCTS_ATTRIBUTES . " pa, " . TABLE_PRODUCTS_OPTIONS_VALUES . " pov where pa.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and pa.options_id = '" . (int)$products_options_name['products_options_id'] . "' and pa.options_values_id = pov.products_options_values_id and pov.language_id = '" . (int)$languages_id . "'");
        while ($products_options = tep_db_fetch_array($products_options_query)) {
          $products_options_array[] = array('id' => $products_options['products_options_values_id'], 'text' => $products_options['products_options_values_name']);
          if ($products_options['options_values_price'] != '0') {
            $products_options_array[sizeof($products_options_array)-1]['text'] .= ' (' . $products_options['price_prefix'] . $currencies->display_price($products_options['options_values_price'], tep_get_tax_rate($product_info['products_tax_class_id'])) .') ';
          }
	      if (isset($cart->contents[$HTTP_GET_VARS['products_id']]['attributes'][$products_options_name['products_options_id']])) {
            $selected_attribute = $cart->contents[$HTTP_GET_VARS['products_id']]['attributes'][$products_options_name['products_options_id']];
          } else {
            $selected_attribute = false;
          }
		  $diff_price=$products_options['options_values_price'];
		  if($products_options['price_prefix'] =='-' ) {
		    $diff_price=-1*$products_options['options_values_price'];
		  } 
		   $pprice=$diff_price+($diff_price*tep_get_tax_rate($product_info['products_tax_class_id'])/100);
		  $jscript.='product_options[\'id[' . $products_options_name['products_options_id'] . ']\']['.$products_options['products_options_values_id'].']='.$pprice.';';
	//	  $jscript.='price[\'id[' . $products_options_name['products_options_id'] . ']['.$products_options['products_options_values_id'].']\']=\''.$currencies->display_price($product_info['products_price']+$diff_price, tep_get_tax_rate($product_info['products_tax_class_id'])).'\';';

        }
		  $p_opt[$i]['name']=$products_options_name['products_options_name'];
		  $p_opt[$i]['menu']=tep_draw_pull_down_menu('id[' . $products_options_name['products_options_id'] . ']', $products_options_array, $selected_attribute,'onChange="javascript:check(this.name,this.value)"');
		  $i++;
      }
	    $xoopsTpl->assign("p_opt",$p_opt);
    }
	$xoopsTpl->assign("price_info",$jscript);
    $reviews_query = tep_db_query("select count(*) as count from " . TABLE_REVIEWS . " where products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "'");
    $reviews = tep_db_fetch_array($reviews_query);
    if ($reviews['count'] > 0) {
		$xoopsTpl->assign("reviews",1);
		$xoopsTpl->assign("rev_count",$reviews['count']);
    }

    if (tep_not_null($product_info['products_url'])) {
		$xoopsTpl->assign("url",1);
		//$urltext=
		$xoopsTpl->assign("urltext",sprintf(TEXT_MORE_INFORMATION, tep_href_link(FILENAME_REDIRECT, 'action=url&goto=' . urlencode($product_info['products_url']), 'NONSSL', true, false)));
    }

    if ($product_info['products_date_available'] > date('Y-m-d H:i:s')) {
		$xoopsTpl->assign("pdatext",sprintf(TEXT_DATE_AVAILABLE, tep_date_long($product_info['products_date_available'])));
    } else {
		$xoopsTpl->assign("pdatext",sprintf(TEXT_DATE_ADDED, tep_date_long($product_info['products_date_added'])));
    }

	$xoopsTpl->assign("bt_reviews",tep_href_link(FILENAME_PRODUCT_REVIEWS, tep_get_all_get_params()));
	$xoopsTpl->assign("bt_reviews_img",tep_image_button('button_reviews.gif', IMAGE_BUTTON_REVIEWS));
	$xoopsTpl->assign("hf_pid",tep_draw_hidden_field('products_id', $product_info['products_id']));
	$xoopsTpl->assign("cart_img",tep_image_submit('button_in_cart.gif', IMAGE_BUTTON_IN_CART));
    include(DIR_WS_MODULES . FILENAME_ALSO_PURCHASED_PRODUCTS);
	$xoopsTpl->assign("also_purchased",$also_purchased->content);    
  }
  include_once XOOPS_ROOT_PATH.'/footer.php';
  include(XOOPS_ROOT_PATH."/modules/osC/includes/application_bottom.php");
?>