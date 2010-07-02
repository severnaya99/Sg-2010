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
// $Id: tpl_manufacturer_info.php 1266 2005-04-29 02:51:24Z ajeh $
//
  $content = "";
  $content = '<div>';
      if (zen_not_null($manufacturer_info_sidebox->fields['manufacturers_image']))
  $content .= '<div align="center">' . zen_image(DIR_WS_IMAGES . $manufacturer_info_sidebox->fields['manufacturers_image'], $manufacturer_info_sidebox->fields['manufacturers_name']) . '</div>';
      if (zen_not_null($manufacturer_info_sidebox->fields['manufacturers_url']))
  $content .= '<div align="left">&nbsp;&nbsp;-&nbsp;<a href="' . zen_href_link(FILENAME_REDIRECT, 'action=manufacturer&manufacturers_id=' . $manufacturer_info_sidebox->fields['manufacturers_id']) . '" target="_blank">' . sprintf(BOX_MANUFACTURER_INFO_HOMEPAGE, $manufacturer_info_sidebox->fields['manufacturers_name']) . '</a></div>';
  $content .= '<div align="left">&nbsp;&nbsp;-&nbsp;<a href="' . zen_href_link(FILENAME_DEFAULT, 'manufacturers_id=' . $manufacturer_info_sidebox->fields['manufacturers_id']) . '">' . BOX_MANUFACTURER_INFO_OTHER_PRODUCTS . '</a></div>';
  $content .= '</div>';
?>