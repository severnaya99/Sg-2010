<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2004 The zen-cart developers                           |
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
// $Id: index.php 290 2004-09-15 19:48:26Z wilt $
//

  require('includes/application_top.php');
  if (!isset($_GET['main_page']) || !zen_not_null($_GET['main_page'])) $_GET['main_page'] = 'index';
  $current_page = $_GET['main_page'];
  $page_directory = 'includes/modules/pages/' . $current_page;
  $language_page_directory = 'includes/languages/' . $language . '/';
  require('includes/languages/' . $language . '.php');

//reversed the order of these 2 rows so that lang's are defined before module is loaded. CMB 07/10/04
  require('includes/languages/' . $language . '/' . $current_page . '.php');
  require($page_directory . '/header_php.php');

  require(DIR_WS_INSTALL_TEMPLATE . 'common/html_header.php');
  require(DIR_WS_INSTALL_TEMPLATE . 'common/main_template_vars.php');
  require(DIR_WS_INSTALL_TEMPLATE . 'common/tpl_main_page.php');
?>