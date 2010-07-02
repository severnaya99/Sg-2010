<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                               |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
// $Id: tpl_categories.php 910 2005-01-08 16:44:07Z ajeh $
//
  $content = "";
  for ($i=0;$i<sizeof($box_categories_array);$i++) {
    switch(true) {
// to make a specific category stand out define a new class in the stylesheet example: A.category-holiday
// uncomment the select below and set the cPath=3 to the cPath= your_categories_id
// many variations of this can be done
//      case ($box_categories_array[$i]['path'] == 'cPath=3'):
//        $new_style = 'category-holiday';
//        break;
      case ($box_categories_array[$i]['top'] == 'true'):
        $new_style = 'category-top';
        break;
      case ($box_categories_array[$i]['has_sub_cat']):
        $new_style = 'category-subs';
        break;
      default:
        $new_style = 'category-products';
      }
     if (zen_get_product_types_to_category($box_categories_array[$i]['path']) == '3' or ($box_categories_array[$i]['top'] != 'true' and SHOW_CATEGORIES_SUBCATEGORIES_ALWAYS != 1)) {
        // skip it this is for the document box
      } else {
      $content .= '<a class="' . $new_style . '" href="' . zen_href_link(FILENAME_DEFAULT, $box_categories_array[$i]['path']) . '">';

      if ($box_categories_array[$i]['current']) {
        if ($box_categories_array[$i]['has_sub_cat']) {
          $content .= '<span class="category-subs-parent">' . $box_categories_array[$i]['name'] . '</span>';
        } else {
          $content .= '<span class="category-subs-selected">' . $box_categories_array[$i]['name'] . '</span>';
        }
      } else {
        $content .= $box_categories_array[$i]['name'];
      }

      if ($box_categories_array[$i]['has_sub_cat']) {
        $content .= CATEGORIES_SEPARATOR;
      }
      $content .= '</a>';

      if (SHOW_COUNTS == 'true') {
        if ((CATEGORIES_COUNT_ZERO == '1' and $box_categories_array[$i]['count'] == 0) or $box_categories_array[$i]['count'] >= 1) {
          $content .= CATEGORIES_COUNT_PREFIX . $box_categories_array[$i]['count'] . CATEGORIES_COUNT_SUFFIX;
        }
      }

      $content .= '<br />';
    }
  }

  if (SHOW_CATEGORIES_BOX_SPECIALS == 'true' or SHOW_CATEGORIES_BOX_PRODUCTS_NEW == 'true' or SHOW_CATEGORIES_BOX_FEATURED_PRODUCTS == 'true' or SHOW_CATEGORIES_BOX_PRODUCTS_ALL == 'true') {
// display a separator between categories and links
    if (SHOW_CATEGORIES_SEPARATOR_LINK == '1') {
      $content .= '<br />' . zen_draw_separator('pixel_silver.gif') . '<br />';
    }
    if (SHOW_CATEGORIES_BOX_SPECIALS == 'true') {
      $show_this = $db->Execute("select s.products_id from " . TABLE_SPECIALS . " s where s.status= '1' limit 1");
      if ($show_this->RecordCount() > 0) {
        $content .= '<a class="category-links" href="' . zen_href_link(FILENAME_SPECIALS) . '">' . CATEGORIES_BOX_HEADING_SPECIALS . '</a>' . '<br />';
      }
    }
    if (SHOW_CATEGORIES_BOX_PRODUCTS_NEW == 'true') {
      switch (true) {
        case (SHOW_NEW_PRODUCTS_LIMIT == '0'):
          $display_limit = '';
          break;
        case (SHOW_NEW_PRODUCTS_LIMIT == '1'):
          $display_limit = " and date_format(p.products_date_added, '%Y%m') >= date_format(now(), '%Y%m')";
          break;
        case (SHOW_NEW_PRODUCTS_LIMIT == '30'):
          $display_limit = ' and TO_DAYS(NOW()) - TO_DAYS(p.products_date_added) <= 30';
          break;
        case (SHOW_NEW_PRODUCTS_LIMIT == '60'):
          $display_limit = ' and TO_DAYS(NOW()) - TO_DAYS(p.products_date_added) <= 60';
          break;
        case (SHOW_NEW_PRODUCTS_LIMIT == '90'):
          $display_limit = ' and TO_DAYS(NOW()) - TO_DAYS(p.products_date_added) <= 90';
          break;
        case (SHOW_NEW_PRODUCTS_LIMIT == '120'):
          $display_limit = ' and TO_DAYS(NOW()) - TO_DAYS(p.products_date_added) <= 120';
          break;
      }

      $show_this = $db->Execute("select p.products_id
                                 from " . TABLE_PRODUCTS . " p
                                 where p.products_status = '1' " . $display_limit . " limit 1");
      if ($show_this->RecordCount() > 0) {
        $content .= '<a class="category-links" href="' . zen_href_link(FILENAME_PRODUCTS_NEW) . '">' . CATEGORIES_BOX_HEADING_WHATS_NEW . '</a>' . '<br />';
      }
    }
    if (SHOW_CATEGORIES_BOX_FEATURED_PRODUCTS == 'true') {
      $show_this = $db->Execute("select products_id from " . TABLE_FEATURED . " where status= '1' limit 1");
      if ($show_this->RecordCount() > 0) {
        $content .= '<a class="category-links" href="' . zen_href_link(FILENAME_FEATURED_PRODUCTS) . '">' . CATEGORIES_BOX_HEADING_FEATURED_PRODUCTS . '</a>' . '<br />';
      }
    }
    if (SHOW_CATEGORIES_BOX_PRODUCTS_ALL == 'true') {
      $content .= '<a class="category-links" href="' . zen_href_link(FILENAME_PRODUCTS_ALL) . '">' . CATEGORIES_BOX_HEADING_PRODUCTS_ALL . '</a>';
    }
  }
?>