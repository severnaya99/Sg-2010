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
// $Id: tpl_main_page.php 1038 2005-03-18 07:09:17Z ajeh $
//
?>
<body onload="resize();">
<table width="98%" border="2" cellpadding="2" cellspacing ="2" align="center" class="popupcouponhelp">
  <tr>
    <td><table width="100%" border="0" cellpadding="2" cellspacing ="2" class="popupcouponhelp">
      <tr><td class="main">
<?php
  $coupon = $db->Execute("select * from " . TABLE_COUPONS . " where coupon_id = '" . $_GET['cID'] . "'");
  $coupon_desc = $db->Execute("select * from " . TABLE_COUPONS_DESCRIPTION . " where coupon_id = '" . $_GET['cID'] . "' and language_id = '" . $_SESSION['languages_id'] . "'");
  $text_coupon_help = TEXT_COUPON_HELP_HEADER;
  $text_coupon_help .= sprintf(TEXT_COUPON_HELP_NAME, $coupon_desc->fields['coupon_name']);
  if (zen_not_null($coupon_desc->fields['coupon_description'])) $text_coupon_help .= sprintf(TEXT_COUPON_HELP_DESC, $coupon_desc->fields['coupon_description']);
  $coupon_amount = $coupon->fields['coupon_amount'];
  switch ($coupon->fields['coupon_type']) {
    case 'F':
    $text_coupon_help .= sprintf(TEXT_COUPON_HELP_FIXED, $currencies->format($coupon->fields['coupon_amount']));
    break;
    case 'P':
    $text_coupon_help .= sprintf(TEXT_COUPON_HELP_FIXED, number_format($coupon->fields['coupon_amount'],2). '%');
    break;
    case 'S':
    $text_coupon_help .= TEXT_COUPON_HELP_FREESHIP;
    break;
    default:
  }
  if ($coupon->fields['coupon_minimum_order'] > 0 ) $text_coupon_help .= sprintf(TEXT_COUPON_HELP_MINORDER, $currencies->format($coupon->fields['coupon_minimum_order']));
  $text_coupon_help .= sprintf(TEXT_COUPON_HELP_DATE, zen_date_short($coupon->fields['coupon_start_date']),zen_date_short($coupon->fields['coupon_expire_date']));
  $text_coupon_help .= '<strong>' . TEXT_COUPON_HELP_RESTRICT . '</strong>';
  $text_coupon_help .= '<br /><br />' .  TEXT_COUPON_HELP_CATEGORIES;
  $get_result=$db->Execute("select * from " . TABLE_COUPON_RESTRICT . "  where coupon_id='".$_GET['cID']."' and category_id !='0'");
  $cats = '';
  while (!$get_result->EOF) {
    if ($get_result->fields['coupon_restrict'] == 'N') {
      $restrict = TEXT_ALLOWED;
    } else {
      $restrict = TEXT_DENIED;
    }
    $result = $db->Execute("SELECT * FROM " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd WHERE c.categories_id = cd.categories_id and cd.language_id = '" . $_SESSION['languages_id'] . "' and c.categories_id='" . $get_result->fields['category_id'] . "'");
    $cats .= '<br />' . $result->fields["categories_name"] . $restrict;
    $get_result->MoveNext();
  }
  if ($cats=='') $cats = '<br />NONE';
  $text_coupon_help .= $cats;
  $text_coupon_help .= '<br /><br />' .  TEXT_COUPON_HELP_PRODUCTS;
  $get_result=$db->Execute("select * from " . TABLE_COUPON_RESTRICT . "  where coupon_id='".$_GET['cID']."' and product_id !='0'");

  while (!$get_result->EOF) {
    if ($get_result->fields['coupon_restrict'] == 'N') {
      $restrict = TEXT_ALLOWED;
    } else {
      $restrict = TEXT_DENIED;
    }
      $result = $db->Execute("SELECT * FROM " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd WHERE p.products_id = pd.products_id and pd.language_id = '" . $_SESSION['languages_id'] . "'and p.products_id = '" . $get_result->fields['product_id'] . "'");
      $prods .= '<br />' . $result->fields['products_name'] . $restrict;
    $get_result->MoveNext();
  }
  if ($prods=='') $prods = '<br />NONE';
  $text_coupon_help .= $prods . '<br /><br />' . TEXT_COUPON_GV_RESTRICTION;
  echo $text_coupon_help;
?>
<p class="smallText" align="right"><?php echo '<a href="javascript:window.close()">' . TEXT_CURRENT_CLOSE_WINDOW . '</a>'; ?></p>
      </td></tr>
    </table></td>
  </tr>
</table>

</body>