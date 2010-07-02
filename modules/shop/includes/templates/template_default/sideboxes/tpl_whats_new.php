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
// $Id: tpl_whats_new.php 1266 2005-04-29 02:51:24Z ajeh $
//
  $content = "";

  $content .= '<div align="center"><a href="' . zen_href_link(zen_get_info_page($random_whats_new_sidebox_product->fields['products_id']), 'products_id=' . $random_whats_new_sidebox_product->fields['products_id']) . '">' . zen_image(DIR_WS_IMAGES . $random_whats_new_sidebox_product->fields['products_image'], $random_whats_new_sidebox_product->fields['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a><br /><a href="' . zen_href_link(zen_get_info_page($random_whats_new_sidebox_product->fields['products_id']), 'products_id=' . $random_whats_new_sidebox_product->fields['products_id']) . '">' . $random_whats_new_sidebox_product->fields['products_name'] . '</a><br />' . $whats_new_price . '</div>';
?>