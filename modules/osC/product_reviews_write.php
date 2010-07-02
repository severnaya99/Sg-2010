<?php
/*
  $Id: product_reviews_write.php 127 2006-01-21 16:16:02Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License

  adapted 2005 for xoops 2.0.x by FlinkUX e.K. <http://www.flinkux.de>
  
  (c) 2005  Michael Hammelmann <michael.hammelmann@flinkux.de>

*/

  require('includes/application_top.php');
$xoopsOption['template_main'] = 'product_reviews_write.html';
include XOOPS_ROOT_PATH.'/header.php';
$xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" />');

  if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot();
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
  }

  $product_info_query = tep_db_query("select p.products_id, p.products_model, p.products_image, p.products_price, p.products_tax_class_id, pd.products_name from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "'");
  if (!tep_db_num_rows($product_info_query)) {
    tep_redirect(tep_href_link(FILENAME_PRODUCT_REVIEWS, tep_get_all_get_params(array('action'))));
  } else {
    $product_info = tep_db_fetch_array($product_info_query);
  }

  $customer_query = tep_db_query("select customers_firstname, customers_lastname from " . TABLE_CUSTOMERS . " where customers_id = '" . (int)$customer_id . "'");
  $customer = tep_db_fetch_array($customer_query);

  if (isset($HTTP_GET_VARS['action']) && ($HTTP_GET_VARS['action'] == 'process')) {
    $rating = tep_db_prepare_input($HTTP_POST_VARS['rating']);
    $review = tep_db_prepare_input($HTTP_POST_VARS['review']);

    $error = false;
    if (strlen($review) < REVIEW_TEXT_MIN_LENGTH) {
      $error = true;

      $messageStack->add('review', JS_REVIEW_TEXT);
    }

    if (($rating < 1) || ($rating > 5)) {
      $error = true;

      $messageStack->add('review', JS_REVIEW_RATING);
    }

    if ($error == false) {
      tep_db_query("insert into " . TABLE_REVIEWS . " (products_id, customers_id, customers_name, reviews_rating, date_added) values ('" . (int)$HTTP_GET_VARS['products_id'] . "', '" . (int)$customer_id . "', '" . tep_db_input($customer['customers_firstname']) . ' ' . tep_db_input($customer['customers_lastname']) . "', '" . tep_db_input($rating) . "', now())");
      $insert_id = tep_db_insert_id();

      tep_db_query("insert into " . TABLE_REVIEWS_DESCRIPTION . " (reviews_id, languages_id, reviews_text) values ('" . (int)$insert_id . "', '" . (int)$languages_id . "', '" . tep_db_input($review) . "')");

      tep_redirect(tep_href_link(FILENAME_PRODUCT_REVIEWS, tep_get_all_get_params(array('action'))));
    }
  }

  if ($new_price = tep_get_products_special_price($product_info['products_id'])) {
    $products_price = '<s>' . $currencies->display_price($product_info['products_price'], tep_get_tax_rate($product_info['products_tax_class_id'])) . '</s> <span class="productSpecialPrice">' . $currencies->display_price($new_price, tep_get_tax_rate($product_info['products_tax_class_id'])) . '</span>';
  } else {
    $products_price = $currencies->display_price($product_info['products_price'], tep_get_tax_rate($product_info['products_tax_class_id']));
  }

  if (tep_not_null($product_info['products_model'])) {
    $products_name = $product_info['products_name'] . '<br><span class="smallText">[' . $product_info['products_model'] . ']</span>';
  } else {
    $products_name = $product_info['products_name'];
  }

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_PRODUCT_REVIEWS_WRITE);

  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_PRODUCT_REVIEWS, tep_get_all_get_params()));

  include("includes/header.php");
  $xoopsTpl->assign("form_rev",tep_draw_form('product_reviews_write', tep_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, 'action=process&products_id=' . $HTTP_GET_VARS['products_id']), 'post', 'onSubmit="return checkForm();"'));
  $xoopsTpl->assign("products_name",$products_name);
  $xoopsTpl->assign("products_price",$products_price);
  $xoopsTpl->assign("seperator",tep_draw_separator('pixel_trans.gif', '100%', '10'));
  $xoopsTpl->assign("seperator1",tep_draw_separator('pixel_trans.gif', '10', '1'));
  
  if ($messageStack->size('review') > 0) {
   $xoopsTpl->assign("message",1);
   $xoopsTpl->assign("messagetext",$messageStack->output('review'));
   
  }
  $xoopsTpl->assign("cust_name",tep_output_string_protected($customer['customers_firstname'] . ' ' . $customer['customers_lastname']));
  $xoopsTpl->assign("rev_field",tep_draw_textarea_field('review', 'soft', 60, 15));
  $xoopsTpl->assign("rate_1",tep_draw_radio_field('rating', '1'));
  $xoopsTpl->assign("rate_2",tep_draw_radio_field('rating', '2'));
  $xoopsTpl->assign("rate_3",tep_draw_radio_field('rating', '3'));
  $xoopsTpl->assign("rate_4",tep_draw_radio_field('rating', '4'));
  $xoopsTpl->assign("rate_5",tep_draw_radio_field('rating', '5'));
  $xoopsTpl->assign("rev_link", tep_href_link(FILENAME_PRODUCT_REVIEWS, tep_get_all_get_params(array('reviews_id', 'action'))));
  $xoopsTpl->assign("bt_back",tep_image_button('button_back.gif', IMAGE_BUTTON_BACK));
  $xoopsTpl->assign("bt_continue",tep_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE));
  $xoopsTpl->assign("image_width",SMALL_IMAGE_WIDTH + 10);
  if (tep_not_null($product_info['products_image'])) {
    $xoopsTpl->assign("p_image",1);
	$xoopsTpl->assign("image_link",tep_href_link(FILENAME_POPUP_IMAGE, 'pID=' . $product_info['products_id']));
	$xoopsTpl->assign("image_text",tep_image(DIR_WS_IMAGES . $product_info['products_image'], $product_info['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'hspace="5" vspace="5"'));
	$xoopsTpl->assign("image_li", tep_href_link(DIR_WS_IMAGES . $product_info['products_image']));
	$xoopsTpl->assign("image_tx",tep_image(DIR_WS_IMAGES . $product_info['products_image'], $product_info['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'hspace="5" vspace="5"'));
  }
  $xoopsTpl->assign("buy_now", tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=buy_now'));
  $xoopsTpl->assign("buy_now_img", tep_image_button('button_in_cart.gif', IMAGE_BUTTON_IN_CART) );
  
include_once XOOPS_ROOT_PATH.'/footer.php';
include("includes/application_bottom.php");
?>
