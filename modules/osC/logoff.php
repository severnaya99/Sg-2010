<?php
/**
 * $Id: logoff.php 118 2006-01-21 16:15:44Z Michael $

 * osCommerce, Open Source E-Commerce Solutions
 * http://www.oscommerce.com

 * Copyright (c) 2003 osCommerce

 * Released under the GNU General Public License

 * adapted 2005 for xoops 2.0.x by FlinkUX e.K. <http://www.flinkux.de>
  
 * (c) 2005  Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @package xosC
**/

  require('includes/application_top.php');
  $xoopsOption['template_main'] = 'logoff.html';
  include XOOPS_ROOT_PATH.'/header.php';
  $xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" />');

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_LOGOFF);

  $breadcrumb->add(NAVBAR_TITLE);
  include("includes/header.php");
  session_unregister('customer_id');
  session_unregister('customer_default_address_id');
  session_unregister('customer_first_name');
  session_unregister('customer_country_id');
  session_unregister('customer_zone_id');
  session_unregister('comments');
  // ###### Added CCGV Contribution #########
  tep_session_unregister('gv_id');
  tep_session_unregister('cc_id');

// ###### End Added CCGV Contribution #########

  $message = '';
  $_SESSION = array();
  session_destroy();
  if ($xoopsConfig['use_mysession'] && $xoopsConfig['session_name'] != '') {
       setcookie($xoopsConfig['session_name'], '', time()- 3600, '/',  '', 0);
  }
    // clear entry from online users table
  if (is_object($xoopsUser)) {
      $online_handler =& xoops_gethandler('online');
      $online_handler->destroy($xoopsUser->getVar('uid'));
  }
//  $message = _US_LOGGEDOUT.'<br />'._US_THANKYOUFORVISIT;
//    redirect_header('index.php', 1, $message);
//    exit();

  $cart->reset();
  $xoopsTpl->assign("site_image",tep_image(DIR_WS_IMAGES . 'table_background_man_on_board.gif', HEADING_TITLE));
  $xoopsTpl->assign("seperator",tep_draw_separator('pixel_trans.gif', '100%', '10'));
  $xoopsTpl->assign("seperator1",tep_draw_separator('pixel_trans.gif', '10', '1'));
  $xoopsTpl->assign("link",tep_href_link(FILENAME_DEFAULT));
  $xoopsTpl->assign("bt_continue",tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE));
  include_once XOOPS_ROOT_PATH.'/footer.php';
  include(XOOPS_ROOT_PATH."/modules/osC/includes/application_bottom.php");
?>
