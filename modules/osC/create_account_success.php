<?php
/*
  $Id: create_account_success.php 132 2006-01-21 16:16:12Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
  
  adapted 2005 for xoops 2.0.x by FlinkUX e.K. <http://www.flinkux.de>
  
  (c) 2005  Michael Hammelmann <michael.hammelmann@flinkux.de>
*/

include("includes/application_top.php");

$xoopsOption['template_main'] = 'create_account_success.html';
include XOOPS_ROOT_PATH.'/header.php';
$xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" />');

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_CREATE_ACCOUNT_SUCCESS);

  $breadcrumb->add(NAVBAR_TITLE_1);
  $breadcrumb->add(NAVBAR_TITLE_2);
  include("includes/header.php");
  if (sizeof($navigation->snapshot) > 0) {
    $origin_href = tep_href_link($navigation->snapshot['page'], tep_array_to_string($navigation->snapshot['get'], array(tep_session_name())), $navigation->snapshot['mode']);
    $navigation->clear_snapshot();
  } else {
    $origin_href = tep_href_link(FILENAME_DEFAULT);
  }
$xoopsTpl->assign("site_image",tep_image(DIR_WS_IMAGES . 'table_background_man_on_board.gif', HEADING_TITLE));
$xoopsTpl->assign("bt_continue",tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE));
$xoopsTpl->assign("origin_href",$origin_href);
include_once XOOPS_ROOT_PATH.'/footer.php';
include(XOOPS_ROOT_PATH."/modules/osC/includes/application_bottom.php");
?>