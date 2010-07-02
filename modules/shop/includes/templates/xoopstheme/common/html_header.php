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
// $Id: html_header.php 290 2004-09-15 19:48:26Z wilt $
//
// TODO
// cvs block
// stylesheets

require(DIR_WS_MODULES . 'meta_tags.php');

//IMAGINACOLOMBIA.COM
$xoopsTpl->assign('xoops_pagetitle',META_TAG_TITLE);
$xoopsTpl->assign('xoops_meta_keywords',META_TAG_KEYWORDS);
$xoopsTpl->assign('xoops_meta_description',META_TAG_DESCRIPTION);


  $directory_array = $template->get_template_part($template->get_template_dir('.css',DIR_WS_TEMPLATE, $current_page_base,'css'), '/^style/', '.css');

  while(list ($key, $value) = each($directory_array)) {
    $zc_module_header .= '<link rel="stylesheet" type="text/css" href="' . $template->get_template_dir('.css',DIR_WS_TEMPLATE, $current_page_base,'css') . '/' . $value . '" />';
  }

  $directory_array = $template->get_template_part($template->get_template_dir('.js',DIR_WS_TEMPLATE, $current_page_base,'jscript'), '/^jscript_/', '.js');

  while(list ($key, $value) = each($directory_array)) {
    $zc_module_header .= '<script language="javascript" src="' .  $template->get_template_dir('.js',DIR_WS_TEMPLATE, $current_page_base,'jscript') . '/' . $value . '"></script>';
  }

  $directory_array = $template->get_template_part($page_directory, '/^jscript_/');

  while(list ($key, $value) = each($directory_array)) {
    require($page_directory . '/' . $value);
  }

$xoopsTpl->assign('xoops_module_header',$zc_module_header);
?>
