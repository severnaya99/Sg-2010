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
// $Id: tpl_best_sellers.php 290 2004-09-15 19:48:26Z wilt $
//

  $content = '<table width="100%" border="0" cellpadding="1" cellspacing="1" class="boxText">';
  for ($i=1; $i<=sizeof($bestsellers_list); $i++) {
    $content .= '<tr><td align="right" valign="top">' . zen_row_number_format($i, BEST_SELLERS_FILLER) . '.' . '</td><td valign="top">' . '<a href="' . zen_href_link(zen_get_info_page($bestsellers_list[$i]['id']), 'products_id=' . $bestsellers_list[$i]['id']) . '">' . zen_trunc_string($bestsellers_list[$i]['name'], BEST_SELLERS_TRUNCATE, BEST_SELLERS_TRUNCATE_MORE) . '</a></td></tr>';
  }
  $content .= '</table>';
?>