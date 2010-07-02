<?php
/*
  $Id: account_newsletters.php 73 2006-01-21 16:13:53Z Michael $
  
  $Id: account_newsletters.php 73 2006-01-21 16:13:53Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License

  adapted 2005 for xoops 2.0.x by FlinkUX e.K. <http://www.flinkux.de>
  
  (c) 2005  Michael Hammelmann <michael.hammelmann@flinkux.de>
*/

  require('includes/application_top.php');
  $xoopsOption['template_main'] = 'account_newsletters.html';
  include XOOPS_ROOT_PATH.'/header.php';
  $xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" />');

  if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot();
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
  }

// needs to be included earlier to set the success message in the messageStack
  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_ACCOUNT_NEWSLETTERS);

  $newsletter_query = tep_db_query("select customers_newsletter from " . TABLE_CUSTOMERS . " where customers_id = '" . (int)$customer_id . "'");
  $newsletter = tep_db_fetch_array($newsletter_query);

  if (isset($HTTP_POST_VARS['action']) && ($HTTP_POST_VARS['action'] == 'process')) {
    if (isset($HTTP_POST_VARS['newsletter_general']) && is_numeric($HTTP_POST_VARS['newsletter_general'])) {
      $newsletter_general = tep_db_prepare_input($HTTP_POST_VARS['newsletter_general']);
    } else {
      $newsletter_general = '0';
    }

    if ($newsletter_general != $newsletter['customers_newsletter']) {
      $newsletter_general = (($newsletter['customers_newsletter'] == '1') ? '0' : '1');

      tep_db_query("update " . TABLE_CUSTOMERS . " set customers_newsletter = '" . (int)$newsletter_general . "' where customers_id = '" . (int)$customer_id . "'");
    }

    $messageStack->add_session('account', SUCCESS_NEWSLETTER_UPDATED, 'success');

    tep_redirect(tep_href_link(FILENAME_ACCOUNT, '', 'SSL'));
  }

  $breadcrumb->add(NAVBAR_TITLE_1, tep_href_link(FILENAME_ACCOUNT, '', 'SSL'));
  $breadcrumb->add(NAVBAR_TITLE_2, tep_href_link(FILENAME_ACCOUNT_NEWSLETTERS, '', 'SSL'));
  include("includes/header.php");
  $xoopsTpl->assign("form_newsletter",tep_draw_form('account_newsletter', tep_href_link(FILENAME_ACCOUNT_NEWSLETTERS, '', 'SSL')));
  $xoopsTpl->assign("action_field",tep_draw_hidden_field('action', 'process'));
  $xoopsTpl->assign("seperator",tep_draw_separator('pixel_trans.gif', '100%', '10'));
  $xoopsTpl->assign("site_image",tep_image(DIR_WS_IMAGES . 'table_background_account.gif', HEADING_TITLE, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT));
  $xoopsTpl->assign("seperator1",tep_draw_separator('pixel_trans.gif', '10', '1'));
  $xoopsTpl->assign("news_check",tep_draw_checkbox_field('newsletter_general', '1', (($newsletter['customers_newsletter'] == '1') ? true : false), 'onclick="checkBox(\'newsletter_general\')"'));
  $xoopsTpl->assign("account",tep_href_link(FILENAME_ACCOUNT, '', 'SSL'));
  $xoopsTpl->assign("bt_back",tep_image_button('button_back.gif', IMAGE_BUTTON_BACK));
  $xoopsTpl->assign("bt_continue",tep_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE));
  include_once XOOPS_ROOT_PATH.'/footer.php';
  include("includes/application_bottom.php");
?>