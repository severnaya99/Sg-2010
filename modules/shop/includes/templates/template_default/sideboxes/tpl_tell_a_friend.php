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
// $Id: tpl_tell_a_friend.php 290 2004-09-15 19:48:26Z wilt $
//
  $content = "";
  $content .= zen_draw_form('tell_a_friend', zen_href_link(FILENAME_TELL_A_FRIEND, '', 'NONSSL', false), 'get');
  $content .= zen_draw_hidden_field('main_page', FILENAME_TELL_A_FRIEND);
  $content .= '<div align="center">' . zen_draw_input_field('to_email_address', '', 'size="10"') . '&nbsp;' . zen_image_submit(BUTTON_IMAGE_TELL_A_FRIEND, BUTTON_TELL_A_FRIEND_ALT) . zen_draw_hidden_field('products_id', $_GET['products_id']) . zen_hide_session_id() . '<br />' . BOX_TELL_A_FRIEND_TEXT;
  $content .= "</div></form>";
?>