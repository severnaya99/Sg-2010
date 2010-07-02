<?php
/*
  $Id: shopping_cart.php 152 2006-02-06 12:19:54Z Michael $
  
  $Id: shopping_cart.php 152 2006-02-06 12:19:54Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License

  adapted 2005 for xoops 2.0.x by FlinkUX e.K. <http://www.flinkux.de>
  
  (c) 2005  Michael Hammelmann <michael.hammelmann@flinkux.de>
*/

  include("includes/application_top.php");
  include(DIR_WS_CLASSES."product.php");
  $xoopsOption['template_main'] = 'shopping_cart.html';
  include XOOPS_ROOT_PATH.'/header.php';
  $xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" />');
  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_SHOPPING_CART);
  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_SHOPPING_CART));
  include("includes/header.php");

  $any_out_of_stock = 0;
  $products = $cart->get_products();
  $xoopsTpl->assign("form_cart",tep_draw_form('cart_quantity', tep_href_link(FILENAME_SHOPPING_CART, 'action=update_product')));
  $xoopsTpl->assign("site_image",tep_image(DIR_WS_IMAGES . 'table_background_cart.gif', HEADING_TITLE, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT));
  $xoopsTpl->assign("seperator",tep_draw_separator('pixel_trans.gif', '100%', '10'));
  $xoopsTpl->assign("seperator1",tep_draw_separator('pixel_trans.gif', '10', '1'));

  if ($cart->count_contents() > 0) {

	$xoopsTpl->assign("cart",1);
	$info_box_contents = array();
    $info_box_contents[0][] = array('align' => 'center',
                                    'params' => 'class="productListing-heading"',
                                    'text' => TABLE_HEADING_REMOVE);

    $info_box_contents[0][] = array('params' => 'class="productListing-heading"',
                                    'text' => TABLE_HEADING_PRODUCTS);

    $info_box_contents[0][] = array('align' => 'center',
                                    'params' => 'class="productListing-heading"',
                                    'text' => TABLE_HEADING_QUANTITY);

    $info_box_contents[0][] = array('align' => 'right',
                                    'params' => 'class="productListing-heading"',
                                    'text' => TABLE_HEADING_TOTAL);

    $any_out_of_stock = 0;
    $products = $cart->get_products();
    for ($i=0, $n=sizeof($products); $i<$n; $i++) {
// Push all attributes information in an array
      if (isset($products[$i]['attributes']) && is_array($products[$i]['attributes'])) {
        while (list($option, $value) = each($products[$i]['attributes'])) {
//          echo tep_draw_hidden_field('id[' . $products[$i]['id'] . '][' . $option . ']', $value);
          $attributes = tep_db_query("select popt.products_options_name, poval.products_options_values_name, pa.options_values_price, pa.price_prefix
                                      from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_OPTIONS_VALUES . " poval, " . TABLE_PRODUCTS_ATTRIBUTES . " pa
                                      where pa.products_id = '" . $products[$i]['id'] . "'
                                       and pa.options_id = '" . $option . "'
                                       and pa.options_id = popt.products_options_id
                                       and pa.options_values_id = '" . $value . "'
                                       and pa.options_values_id = poval.products_options_values_id
                                       and popt.language_id = '" . $languages_id . "'
                                       and poval.language_id = '" . $languages_id . "'");
          $attributes_values = tep_db_fetch_array($attributes);

          $products[$i][$option]['products_options_name'] = $attributes_values['products_options_name'].tep_draw_hidden_field('id[' . $products[$i]['id'] . '][' . $option . ']', $value);
          $products[$i][$option]['options_values_id'] = $value;
          $products[$i][$option]['products_options_values_name'] = $attributes_values['products_options_values_name'];
          $products[$i][$option]['options_values_price'] = $attributes_values['options_values_price'];
          $products[$i][$option]['price_prefix'] = $attributes_values['price_prefix'];
        }
      }
    }

    for ($i=0, $n=sizeof($products); $i<$n; $i++) {
      if (($i/2) == floor($i/2)) {
        $info_box_contents[] = array('params' => 'class="productListing-even"');
      } else {
        $info_box_contents[] = array('params' => 'class="productListing-odd"');
      }

      $cur_row = sizeof($info_box_contents) - 1;

      $info_box_contents[$cur_row][] = array('align' => 'center',
                                             'params' => 'class="productListing-data" valign="top"',
                                             'text' => tep_draw_checkbox_field('cart_delete[]', $products[$i]['id']));

      $products_name = '<table align="left" border="0" cellspacing="2" cellpadding="2">' .
                       '  <tr>' .
                       '    <td class="productListing-data" align="left"><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products[$i]['id']) . '">' . tep_image(DIR_WS_IMAGES . $products[$i]['image'], $products[$i]['name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a></td>' .
                       '    <td class="productListing-data" align="left" valign="top"><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products[$i]['id']) . '"><b>' . $products[$i]['name'] . '</b></a>';

      if (STOCK_CHECK == 'true') {
        $stock_check = tep_check_stock($products[$i]['id'], $products[$i]['quantity']);
        if (tep_not_null($stock_check)) {
          $any_out_of_stock = 1;

          $products_name .= $stock_check;
        }
      }

      if (isset($products[$i]['attributes']) && is_array($products[$i]['attributes'])) {
        reset($products[$i]['attributes']);
        while (list($option, $value) = each($products[$i]['attributes'])) {
          $products_name .= '<br><small><i> - ' . $products[$i][$option]['products_options_name'] . ' ' . $products[$i][$option]['products_options_values_name'] . '</i></small>';
        }
      }

      $products_name .= '    </td>' .
                        '  </tr>' .
                        '</table>';

      $info_box_contents[$cur_row][] = array('align' => 'left',
	  										 'params' => 'class="productListing-data"',
                                             'text' => $products_name);

      $info_box_contents[$cur_row][] = array('align' => 'center',
                                             'params' => 'class="productListing-data" valign="top"',
                                             'text' => tep_draw_input_field('cart_quantity[]', $products[$i]['quantity'], 'size="4"') . tep_draw_hidden_field('products_id[]', $products[$i]['id']));

      $sproduct= new product($products[$i]['id']);
	  $add_text='';
	  if ($customer_group->getdisplaytax() == '1') {
		$add_text='<br>'.TEXT_VAT_INFO.' '.$sproduct->get_tax().' % '.$sproduct->get_tax_title();
	  } 
      $info_box_contents[$cur_row][] = array('align' => 'right',
                                             'params' => 'class="productListing-data" valign="top"',
                                             'text' => '<b>' . $currencies->display_price($products[$i]['final_price'], tep_get_tax_rate($products[$i]['tax_class_id']), $products[$i]['quantity']) . '</b>'.$add_text);
    }
    $pl = new productListingBox($info_box_contents);
    $xoopsTpl->assign("product_listing",$pl->content);
	if($customer_group->getdisplayshipment() == '1') {
	  $xoopsTpl->assign("showSH",1);
	  $xoopsTpl->assign("SHText",TEXT_SHIPPING_HANDLING_INFO);
	 }

	$xoopsTpl->assign("total",$currencies->format($cart->show_total()));
	$xoopsTpl->assign("bt_update",tep_image_submit('button_update_cart.gif', IMAGE_BUTTON_UPDATE_CART));
    if ($any_out_of_stock == 1) {
      $xoopsTpl->assign("stock",1);
      if (STOCK_ALLOW_CHECKOUT == 'true') {
        $xoopsTpl->assign("stocktext",OUT_OF_STOCK_CAN_CHECKOUT);
      } else {
	    $xoopsTpl->assign("stocktext",OUT_OF_STOCK_CANT_CHECKOUT);
      }
    }
    $back = sizeof($navigation->path)-2;
    if (isset($navigation->path[$back])) {
		$xoopsTpl->assign("navigation",1);
		$xoopsTpl->assign("nav_link",tep_href_link($navigation->path[$back]['page'], tep_array_to_string($navigation->path[$back]['get'], array('action')), $navigation->path[$back]['mode']));
		$xoopsTpl->assign("img_continue",tep_image_button('button_continue_shopping.gif', IMAGE_BUTTON_CONTINUE_SHOPPING));
	}
    $xoopsTpl->assign("checkout_shipping",tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'));
	$xoopsTpl->assign("img_checkout",tep_image_button('button_checkout.gif', IMAGE_BUTTON_CHECKOUT));
  } else {
    $nt=new infoBox(array(array('text' => TEXT_CART_EMPTY)));
    $xoopsTpl->assign("empty_text",$nt->content);
	$xoopsTpl->assign("img_continue",tep_image_button('button_continue_shopping.gif', IMAGE_BUTTON_CONTINUE_SHOPPING));
    $xoopsTpl->assign("def_link", tep_href_link(FILENAME_DEFAULT));
  }
include_once XOOPS_ROOT_PATH.'/footer.php';
include("includes/application_bottom.php");
?>
