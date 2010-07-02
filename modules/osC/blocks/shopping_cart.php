<?php
function b_shop_cart() {
global $cart,$xoopsConfig,$xoopsDB,$currencies,$languages_id,$language;


  if(!isset($_SESSION['languages_id'])) {
    $lang_query="select languages_id from ".TABLE_LANGUAGES." where directory ='".$xoopsConfig['language']."'";
	$lang=tep_db_query($lang_query);
	$lang_id=tep_db_fetch_array($lang);
	$languages_id=$lang_id['languages_id'];
  }else {
    $languages_id=$_SESSION['languages_id'];
   }

require_once(XOOPS_ROOT_PATH."/modules/osC/includes/database_tables.php");
require_once(XOOPS_ROOT_PATH."/modules/osC/includes/functions/database.php");   
require_once(XOOPS_ROOT_PATH. '/modules/osC/includes/functions/general.php');
require_once(XOOPS_ROOT_PATH. '/modules/osC/includes/classes/shopping_cart.php'); 
require_once(XOOPS_ROOT_PATH. '/modules/osC/includes/classes/currencies.php');
require_once(XOOPS_ROOT_PATH. '/modules/osC/includes/functions/sessions.php');

$block=array(	"title" => "Shopping Cart",
					"datum" => "2003-09-03",
					"content" => "");


$cart2=serialize($cart);
$cart=unserialize($cart2);
$cart_contents=$cart->contents;

  if (!session_is_registered('currency') || isset($HTTP_GET_VARS['currency']) || ( (USE_DEFAULT_LANGUAGE_CURRENCY == 'true') && (LANGUAGE_CURRENCY != $currency) ) ) {
    if (!session_is_registered('currency')) session_register('currency');

    if (isset($HTTP_GET_VARS['currency'])) {
      if (!$currency = tep_currency_exists($HTTP_GET_VARS['currency'])) $currency = (USE_DEFAULT_LANGUAGE_CURRENCY == 'true') ? LANGUAGE_CURRENCY : DEFAULT_CURRENCY;
    } else {
      $currency = (USE_DEFAULT_LANGUAGE_CURRENCY == 'true') ? LANGUAGE_CURRENCY : DEFAULT_CURRENCY;
    }
  }
  if($currency=='') {
    if (!$currency = tep_currency_exists($_GET['currency'])) {
	  $currency = (USE_DEFAULT_LANGUAGE_CURRENCY == 'true') ? LANGUAGE_CURRENCY : DEFAULT_CURRENCY;
    } 
  }

 if(! isset($currencies) || ! is_object($currencies)) { $currencies = new currencies(); }


$i=0;
foreach ($cart_contents as $key => $value) {
	$i++;
	$prod_query="select products_name from ".TABLE_PRODUCTS_DESCRIPTION." where language_id='".$languages_id."' and products_id='".$key."'";
	$result = $xoopsDB->query($prod_query,1,0);
	$product_result=$xoopsDB->fetchArray($result);
    if ((tep_session_is_registered('new_products_id_in_cart')) && ($new_products_id_in_cart == $products[$i]['id'])) {
      $block['content'].='<span class="newItemInCar">';
	 }else {
	   $block['content'] .='<span class="infoBoxContents">';
	 }
	$block['content'].=$value['qty']."x <a href=".XOOPS_URL."/modules/osC/product_info.php?products_id=".$key.">".$product_result['products_name']."</a></span><br>";
}
if ($i==0) {
  $block['content']= BOX_SHOPPING_CART_EMPTY."<br>";
} else {
  $block['content'].="<hr>";
  $block['content'].= _MB_BOX_ZSUMME."<br /><b>".$currencies->format($cart->show_total())."</b><br>";
}
// ############ Added CCGV Contribution ##########
  if (tep_session_is_registered('customer_id')) {
    $gv_query = $xoopsDB->query("select amount from " . TABLE_COUPON_GV_CUSTOMER . " where customer_id = '" . $_SESSION['customer_id'] . "'");
    $gv_result = $xoopsDB->fetchArray($gv_query);
    if ($gv_result['amount'] > 0 ) {
	  $block['content'].= '<span class="smalltext">'.VOUCHER_BALANCE .'&nbsp;'. $currencies->format($gv_result['amount']).'</span><br>';
	  $block['content'] .= '<span class="smalltext"><a href="'. tep_href_link(FILENAME_GV_SEND) . '">' . BOX_SEND_TO_FRIEND . '</a></span></br>';
//      $info_box_contents[] = array('align' => 'left','text' => tep_draw_separator());
//      $info_box_contents[] = array('align' => 'left','text' => '<table cellpadding="0" width="100%" cellspacing="0" border="0"><tr><td class="smalltext">' . VOUCHER_BALANCE . '</td><td class="smalltext" align="right" valign="bottom">' . $currencies->format($gv_result['amount']) . '</td></tr></table>');
//      $info_box_contents[] = array('align' => 'left','text' => '<table cellpadding="0" width="100%" cellspacing="0" border="0"><tr><td class="smalltext"><a href="'. tep_href_link(FILENAME_GV_SEND) . '">' . BOX_SEND_TO_FRIEND . '</a></td></tr></table>');
    }
  }
  if (tep_session_is_registered('gv_id')) {
    $gv_query = $xoopsDB->query("select coupon_amount from " . TABLE_COUPONS . " where coupon_id = '" . $gv_id . "'");
    $coupon = $xoopsDB->fetchArray($gv_query);
	$block['content'] .='<span class="smalltext">'.VOUCHER_REDEEMED . '&nbsp;' . $currencies->format($coupon['coupon_amount']) .'</span></br>';
//    $info_box_contents[] = array('align' => 'left','text' => tep_draw_separator());
//    $info_box_contents[] = array('align' => 'left','text' => '<table cellpadding="0" width="100%" cellspacing="0" border="0"><tr><td class="smalltext">' . VOUCHER_REDEEMED . '</td><td class="smalltext" align="right" valign="bottom">' . $currencies->format($coupon['coupon_amount']) . '</td></tr></table>');

  }
  /*if (tep_session_is_registered('cc_id') && $cc_id) {
    $info_box_contents[] = array('align' => 'left','text' => tep_draw_separator());
    $info_box_contents[] = array('align' => 'left','text' => '<table cellpadding="0" width="100%" cellspacing="0" border="0"><tr><td class="smalltext">' . CART_COUPON . '</td><td class="smalltext" align="right" valign="bottom">' . '<a href="javascript:couponpopupWindow(\'' . tep_href_link(FILENAME_POPUP_COUPON_HELP, 'cID=' . $cc_id) . '\')">' . CART_COUPON_INFO . '</a>' . '</td></tr></table>');

  }*/
  /* Serialio.com Edit Begin */
if (tep_session_is_registered('cc_id') && $cc_id) {
 $coupon_query = $xoopsDB->query("select * from " . TABLE_COUPONS . " where coupon_id = '" . $cc_id . "'");
 $coupon = $xoopsDB->fetchArray($coupon_query);
 $coupon_desc_query = $xoopsDB->query("select * from " . TABLE_COUPONS_DESCRIPTION . " where coupon_id = '" . $cc_id . "' and language_id = '" . $languages_id . "'");
 $coupon_desc = $xoopsDB->fetchArray($coupon_desc_query);
 $text_coupon_help = sprintf("%s",$coupon_desc['coupon_name']);
 //  $info_box_contents[] = array('align' => 'left','text' => tep_draw_separator());
   $block['content'].='<span class="smalltext">'. CART_COUPON . $text_coupon_help.'</span><br>';
//   $info_box_contents[] = array('align' => 'left','text' => '<table cellpadding="0" width="100%" cellspacing="0" border="0"><tr><td class="infoBoxContents">' . CART_COUPON . $text_coupon_help . '<br>' . '</td></tr></table>');
   }  
   /* Serialio.com Edit End */

// ############ End Added CCGV Contribution ##########

return $block;
}
?>
