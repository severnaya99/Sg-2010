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
// $Id: tpl_yes_notifications.php 290 2004-09-15 19:48:26Z wilt $
//
  $content = "";
  $content .= '<div class="sideBoxContents" align="center"><a href="' . zen_href_link($_GET['main_page'], zen_get_all_get_params(array('action')) . 'action=notify_remove', $request_type) . '">' . zen_image(DIR_WS_TEMPLATE_IMAGES . OTHER_IMAGE_BOX_NOTIFY_REMOVE, OTHER_BOX_NOTIFY_REMOVE_ALT) . '</a><br /><a href="' . zen_href_link($_GET['main_page'], zen_get_all_get_params(array('action')) . 'action=notify_remove', $request_type) . '">' . sprintf(BOX_NOTIFICATIONS_NOTIFY_REMOVE, zen_get_products_name($_GET['products_id'])) .'</a></div>';
?>