<?php
/*
  $Id: product_reviews_info.php 76 2006-01-21 16:14:00Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');
  
  $xoopsOption['template_main'] = 'product_reviews_info.html';
  include XOOPS_ROOT_PATH.'/header.php';
  $xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" />');

  if (isset($HTTP_GET_VARS['reviews_id']) && tep_not_null($HTTP_GET_VARS['reviews_id']) && isset($HTTP_GET_VARS['products_id']) && tep_not_null($HTTP_GET_VARS['products_id'])) {
    $review_check_query = tep_db_query("select count(*) as total from " . TABLE_REVIEWS . " r, " . TABLE_REVIEWS_DESCRIPTION . " rd where r.reviews_id = '" . (int)$HTTP_GET_VARS['reviews_id'] . "' and r.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and r.reviews_id = rd.reviews_id and rd.languages_id = '" . (int)$languages_id . "'");
    $review_check = tep_db_fetch_array($review_check_query);

    if ($review_check['total'] < 1) {
      tep_redirect(tep_href_link(FILENAME_PRODUCT_REVIEWS, tep_get_all_get_params(array('reviews_id'))));
    }
  } else {
    tep_redirect(tep_href_link(FILENAME_PRODUCT_REVIEWS, tep_get_all_get_params(array('reviews_id'))));
  }

  tep_db_query("update " . TABLE_REVIEWS . " set reviews_read = reviews_read+1 where reviews_id = '" . (int)$HTTP_GET_VARS['reviews_id'] . "'");

  $review_query = tep_db_query("select rd.reviews_text, r.reviews_rating, r.reviews_id, r.customers_name, r.date_added, r.reviews_read, p.products_id, p.products_price, p.products_tax_class_id, p.products_image, p.products_model, pd.products_name from " . TABLE_REVIEWS . " r, " . TABLE_REVIEWS_DESCRIPTION . " rd, " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where r.reviews_id = '" . (int)$HTTP_GET_VARS['reviews_id'] . "' and r.reviews_id = rd.reviews_id and rd.languages_id = '" . (int)$languages_id . "' and r.products_id = p.products_id and p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '". (int)$languages_id . "'");
  $review = tep_db_fetch_array($review_query);

  if ($new_price = tep_get_products_special_price($review['products_id'])) {
    $products_price = '<s>' . $currencies->display_price($review['products_price'], tep_get_tax_rate($review['products_tax_class_id'])) . '</s> <span class="productSpecialPrice">' . $currencies->display_price($new_price, tep_get_tax_rate($review['products_tax_class_id'])) . '</span>';
  } else {
    $products_price = $currencies->display_price($review['products_price'], tep_get_tax_rate($review['products_tax_class_id']));
  }

  if (tep_not_null($review['products_model'])) {
    $products_name = $review['products_name'] . '<br><span class="smallText">[' . $review['products_model'] . ']</span>';
  } else {
    $products_name = $review['products_name'];
  }

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_PRODUCT_REVIEWS_INFO);

  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_PRODUCT_REVIEWS, tep_get_all_get_params()));
  include("includes/header.php");
  $xoopsTpl->assign("products_name",$products_name);
  $xoopsTpl->assign("products_price",$products_price);
  $xoopsTpl->assign("seperator",tep_draw_separator('pixel_trans.gif', '100%', '10'));
  $xoopsTpl->assign("review_text",sprintf(TEXT_REVIEW_BY, tep_output_string_protected($review['customers_name'])));
  $xoopsTpl->assign("review_date",sprintf(TEXT_REVIEW_DATE_ADDED, tep_date_long($review['date_added'])));
  $xoopsTpl->assign("seperator1",tep_draw_separator('pixel_trans.gif', '10', '1'));
  $xoopsTpl->assign("review_text_long",tep_break_string(nl2br(tep_output_string_protected($review['reviews_text'])), 60, '-<br>') . '<br><br><i>' . sprintf(TEXT_REVIEW_RATING, tep_image(DIR_WS_IMAGES . 'stars_' . $review['reviews_rating'] . '.gif', sprintf(TEXT_OF_5_STARS, $review['reviews_rating'])), sprintf(TEXT_OF_5_STARS, $review['reviews_rating'])));
  $xoopsTpl->assign("review_link",tep_href_link(FILENAME_PRODUCT_REVIEWS, tep_get_all_get_params(array('reviews_id'))));
  $xoopsTpl->assign("bt_review",tep_image_button('button_write_review.gif', IMAGE_BUTTON_WRITE_REVIEW));
  $xoopsTpl->assign("review_write_link",tep_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, tep_get_all_get_params(array('reviews_id'))));
  $xoopsTpl->assign("bt_back",tep_image_button('button_back.gif', IMAGE_BUTTON_BACK));
  $xoopsTpl->assign("width",SMALL_IMAGE_WIDTH + 10);
  if (tep_not_null($review['products_image'])) {
   $xoopsTpl->assign("image",1);
   $xoopsTpl->assign("popup_link",tep_href_link(FILENAME_POPUP_IMAGE, 'pID=' . $review['products_id']));
   $xoopsTpl->assign("popup_image",tep_image(DIR_WS_IMAGES . $review['products_image'], addslashes($review['products_name']), SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'hspace="5" vspace="5"'));
   $xoopsTpl->assign("html_link",tep_href_link(DIR_WS_IMAGES . $review['products_image']));
   $xoopsTpl->assign("html_image",tep_image(DIR_WS_IMAGES . $review['products_image'], $review['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'hspace="5" vspace="5"'));
  }
  $xoopsTpl->assign("buy_link",tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=buy_now'));
  $xoopsTpl->assign("bt_cart",tep_image_button('button_in_cart.gif', IMAGE_BUTTON_IN_CART));
  include_once XOOPS_ROOT_PATH.'/footer.php';
  include("includes/application_bottom.php");
?>
