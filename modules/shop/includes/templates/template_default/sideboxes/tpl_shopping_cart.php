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
// $Id: tpl_shopping_cart.php 290 2004-09-15 19:48:26Z wilt $
//
  $content ="";
//    die('here');

  if ($_SESSION['cart']->count_contents() > 0) {
    $content = '<div>';
    $products = $_SESSION['cart']->get_products();
    for ($i=0, $n=sizeof($products); $i<$n; $i++) {
      $content .= '<div align="left" class="sideBoxContents">';

      if (($_SESSION['new_products_id_in_cart']) && ($_SESSION['new_products_id_in_cart'] == $products[$i]['id'])) {
        $content .= '<span class="newItemInCart">';
      } else {
        $content .= '<span class="sideBoxContents">';
      }

      $content .= $products[$i]['quantity'] . '&nbsp;x&nbsp;</span><a href="' . zen_href_link(zen_get_info_page($products[$i]['id']), 'products_id=' . $products[$i]['id']) . '">';

      if (($_SESSION['new_products_id_in_cart']) && ($_SESSION['new_products_id_in_cart'] == $products[$i]['id'])) {
        $content .= '<span class="newItemInCart">';
      } else {
        $content .= '<span class="sideBoxContents">';
      }

      $content .= $products[$i]['name'] . '</span></a></div>';

      if (($_SESSION['new_products_id_in_cart']) && ($_SESSION['new_products_id_in_cart'] == $products[$i]['id'])) {
        $_SESSION['new_products_id_in_cart'] = '';
      }
    }
    $content .= '</div>';
  } else {
    $content = '<div>' . BOX_SHOPPING_CART_EMPTY . '</div>';
  }

  if ($_SESSION['cart']->count_contents() > 0) {
    $content .= zen_draw_separator();
    $content .= '<div align="right">' . $currencies->format($_SESSION['cart']->show_total()) . '</div>';
  }

  if ($_SESSION['customer_id']) {
    $gv_query = "select amount
                 from " . TABLE_COUPON_GV_CUSTOMER . "
                 where customer_id = '" . $_SESSION['customer_id'] . "'";
    $gv_result = $db->Execute($gv_query);

    if ($gv_result->fields['amount'] > 0 ) {
      $content .= zen_draw_separator();
      $content .= '<div class="smalltext" align="right">' . VOUCHER_BALANCE . $currencies->format($gv_result->fields['amount']) . '</div>';
      $content .= '<div class="smalltext"><a href="'. zen_href_link(FILENAME_GV_SEND) . '">' . BOX_SEND_TO_FRIEND . '</a></div>';
    }
  }
  if ($_SESSION['gv_id']) {
    $gv_query = "select coupon_amount
                 from " . TABLE_COUPONS . "
                 where coupon_id = '" . $_SESSION['gv_id'] . "'";

    $coupon = $db->Execute($gv_query);
    $content .= zen_draw_separator();
    $content .= '<div class="smalltext" align="right">' . VOUCHER_REDEEMED . $currencies->format($coupon->fields['coupon_amount']) . '</div>';

  }
  if ($_SESSION['cc_id']) {
    $content .= zen_draw_separator();
    $content .= '<div class="smalltext" align="right">' . CART_COUPON . '<a href="javascript:couponpopupWindow(\'' . zen_href_link(FILENAME_POPUP_COUPON_HELP, 'cID=' . $_SESSION['cc_id']) . '\')">' . CART_COUPON_INFO . '</a></div>';
  }
?>