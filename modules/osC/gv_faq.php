<?php
/*
  $Id: gv_faq.php 110 2006-01-21 16:15:27Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 - 2003 osCommerce

  Gift Voucher System v1.0
  Copyright (c) 2001, 2002 Ian C Wilson
  http://www.phesis.org

  Released under the GNU General Public License
*/

  require('includes/application_top.php');
$xoopsOption['template_main'] = 'gv_faq.html';
include XOOPS_ROOT_PATH.'/header.php';
$xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" />');

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_GV_FAQ);

  $breadcrumb->add(NAVBAR_TITLE); 
  $xoopsTpl->assign("site_image",tep_image(DIR_WS_IMAGES . 'table_background_specials.gif', HEADING_TITLE, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT));
  $xoopsTpl->assign("seperator",tep_draw_separator('pixel_trans.gif', '100%', '10'));
  $xoopsTpl->assign("href",tep_href_link(FILENAME_DEFAULT, '', 'NONSSL') );
  $xoopsTpl->assign("bt_continue",tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE));
  include_once XOOPS_ROOT_PATH.'/footer.php';
  include("includes/application_bottom.php");
?>