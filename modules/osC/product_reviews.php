<?php
/*
  
  $Id: product_reviews.php 101 2006-01-21 16:15:08Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License

  adapted 2005 for xoops 2.0.x by FlinkUX e.K. <http://www.flinkux.de>
  
  (c) 2005  Michael Hammelmann <michael.hammelmann@flinkux.de>

*/

  require('includes/application_top.php');
  $xoopsOption['template_main'] = 'product_reviews.html';
  include XOOPS_ROOT_PATH.'/header.php';
  $xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" />');

  $product_info_query = tep_db_query("select p.products_id, p.products_model, p.products_image, p.products_price, p.products_tax_class_id, pd.products_name from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "'");
  if (!tep_db_num_rows($product_info_query)) {
    tep_redirect(tep_href_link(FILENAME_REVIEWS));
  } else {
    $product_info = tep_db_fetch_array($product_info_query);
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

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_PRODUCT_REVIEWS);

  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_PRODUCT_REVIEWS, tep_get_all_get_params()));
  include("includes/header.php");

  $xoopsTpl->assign("products_name",$products_name);
  $xoopsTpl->assign("products_price",$products_price);
  $xoopsTpl->assign("seperator",tep_draw_separator('pixel_trans.gif', '100%', '10'));
  $xoopsTpl->assign("seperator1",tep_draw_separator('pixel_trans.gif', '10', '1'));
  $reviews_query_raw = "select r.reviews_id, left(rd.reviews_text, 100) as reviews_text, r.reviews_rating, r.date_added, r.customers_name from " . TABLE_REVIEWS . " r, " . TABLE_REVIEWS_DESCRIPTION . " rd where r.products_id = '" . (int)$product_info['products_id'] . "' and r.reviews_id = rd.reviews_id and rd.languages_id = '" . (int)$languages_id . "' order by r.reviews_id desc";

  $reviews_split = new splitPageResults($reviews_query_raw, MAX_DISPLAY_NEW_REVIEWS);
  $xoopsTpl->assign("revsplit",$reviews_split->display_count(TEXT_DISPLAY_NUMBER_OF_REVIEWS));
  $xoopsTpl->assign("revlinks",$reviews_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info'))));

  if ($reviews_split->number_of_rows > 0) {
    $xoopsTpl->assign("srevs",1);
    if ((PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3')) {
	  $xoopsTpl->assign("sresult",1);

    }

    $reviews_query = tep_db_query($reviews_split->sql_query);
	$i=0;
    while ($reviews = tep_db_fetch_array($reviews_query)) {
     $revs[$i] = $reviews;
	 $revs[$i]['link']=tep_href_link(FILENAME_PRODUCT_REVIEWS_INFO, 'products_id=' . $product_info['products_id'] . '&reviews_id=' . $reviews['reviews_id']);
	 $revs[$i]['customers_name']=sprintf(TEXT_REVIEW_BY, tep_output_string_protected($reviews['customers_name']));
	 $revs[$i]['date_added']=sprintf(TEXT_REVIEW_DATE_ADDED, tep_date_long($reviews['date_added']));
	 $revs[$i]['reviews_text']=tep_break_string(tep_output_string_protected($reviews['reviews_text']), 60, '-<br>') . ((strlen($reviews['reviews_text']) >= 100) ? '..' : '');
	 $revs[$i]['reviews_rating']=sprintf(TEXT_REVIEW_RATING, tep_image(DIR_WS_IMAGES . 'stars_' . $reviews['reviews_rating'] . '.gif', sprintf(TEXT_OF_5_STARS, $reviews['reviews_rating'])), sprintf(TEXT_OF_5_STARS, $reviews['reviews_rating']));
     $i++;
    }
	$xoopsTpl->assign("revs",$revs);

  } else {
	$notxt=new infoBox(array(array('text' => TEXT_NO_REVIEWS)));
	$xoopsTpl->assign("notext",$notxt->content);
  }

  if (($reviews_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3'))) {
	$xoopsTpl->assign("srevsplit",1);
  }
	$xoopsTpl->assign("product_info_link",tep_href_link(FILENAME_PRODUCT_INFO, tep_get_all_get_params()) );
	$xoopsTpl->assign("product_review_link",tep_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, tep_get_all_get_params()));
	$xoopsTpl->assign("bt_back",tep_image_button('button_back.gif', IMAGE_BUTTON_BACK));
	$xoopsTpl->assign("bt_write",tep_image_button('button_write_review.gif', IMAGE_BUTTON_WRITE_REVIEW) );
	
  if (tep_not_null($product_info['products_image'])) {
    $xoopsTpl->assign("jsimage",1);
    $xoopsTpl->assign("popup_image_link",tep_href_link(FILENAME_POPUP_IMAGE, 'pID=' . $product_info['products_id']) );
    $xoopsTpl->assign("popup_image",tep_image(DIR_WS_IMAGES . $product_info['products_image'], addslashes($product_info['products_name']), SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'hspace="5" vspace="5"') );
    $xoopsTpl->assign("popup_link_nojs",tep_href_link(DIR_WS_IMAGES . $product_info['products_image']));
  }
  $xoopsTpl->assign("buy_now_link",tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=buy_now'));
  $xoopsTpl->assign("buy_now_image",tep_image_button('button_in_cart.gif', IMAGE_BUTTON_IN_CART));
  $xoopsTpl->assign("image_size",SMALL_IMAGE_WIDTH + 10);
  include_once XOOPS_ROOT_PATH.'/footer.php';
  include("includes/application_bottom.php");
?>
