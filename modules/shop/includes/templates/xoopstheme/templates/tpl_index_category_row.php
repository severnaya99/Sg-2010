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
// $Id: tpl_index_category_row.php 290 2004-09-15 19:48:26Z wilt $
//
$lcontents = '<td align="center" class="smallText" width="'.$width.'" valign="top"><a href="'.zen_href_link(FILENAME_DEFAULT, $cPath_new).'">'. zen_image(DIR_WS_IMAGES . $categories->fields['categories_image'], $categories->fields['categories_name'], SUBCATEGORY_IMAGE_WIDTH, SUBCATEGORY_IMAGE_HEIGHT).'<br />'.$categories->fields['categories_name'].'</a></td>';

if ($newrow) {
	$lcontents .= '</tr><tr>';
}

?>