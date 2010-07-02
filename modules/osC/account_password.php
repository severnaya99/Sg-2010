<?php
/*
  $Id: account_password.php 84 2006-01-21 16:14:23Z Michael $
  
  $Id: account_password.php 84 2006-01-21 16:14:23Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License

  adapted 2005 for xoops 2.0.x by FlinkUX e.K. <http://www.flinkux.de>
  
  (c) 2005  Michael Hammelmann <michael.hammelmann@flinkux.de>
*/

  require('includes/application_top.php');

  $xoopsOption['template_main'] = 'account_password.html';
  include XOOPS_ROOT_PATH.'/header.php';
  $xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" />');

  if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot();
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
  }

// needs to be included earlier to set the success message in the messageStack
  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_ACCOUNT_PASSWORD);

  if (isset($HTTP_POST_VARS['action']) && ($HTTP_POST_VARS['action'] == 'process')) {
    $password_current = tep_db_prepare_input($HTTP_POST_VARS['password_current']);
    $password_new = tep_db_prepare_input($HTTP_POST_VARS['password_new']);
    $password_confirmation = tep_db_prepare_input($HTTP_POST_VARS['password_confirmation']);

    $error = false;

    if (strlen($password_current) < ENTRY_PASSWORD_MIN_LENGTH) {
      $error = true;

      $messageStack->add('account_password', ENTRY_PASSWORD_CURRENT_ERROR);
    } elseif (strlen($password_new) < ENTRY_PASSWORD_MIN_LENGTH) {
      $error = true;

      $messageStack->add('account_password', ENTRY_PASSWORD_NEW_ERROR);
    } elseif ($password_new != $password_confirmation) {
      $error = true;

      $messageStack->add('account_password', ENTRY_PASSWORD_NEW_ERROR_NOT_MATCHING);
    }

    if ($error == false) {
      $check_customer_query = tep_db_query("select customers_password from " . TABLE_CUSTOMERS . " where customers_id = '" . (int)$customer_id . "'");
      $check_customer = tep_db_fetch_array($check_customer_query);

      if (tep_validate_password($password_current, $check_customer['customers_password'])) {
        tep_db_query("update " . TABLE_CUSTOMERS . " set customers_password = '" . tep_encrypt_password($password_new) . "' where customers_id = '" . (int)$customer_id . "'");

        tep_db_query("update " . TABLE_CUSTOMERS_INFO . " set customers_info_date_account_last_modified = now() where customers_info_id = '" . (int)$customer_id . "'");

        $messageStack->add_session('account', SUCCESS_PASSWORD_UPDATED, 'success');

        tep_redirect(tep_href_link(FILENAME_ACCOUNT, '', 'SSL'));
      } else {
        $error = true;

        $messageStack->add('account_password', ERROR_CURRENT_PASSWORD_NOT_MATCHING);
      }
    }
  }

  $breadcrumb->add(NAVBAR_TITLE_1, tep_href_link(FILENAME_ACCOUNT, '', 'SSL'));
  $breadcrumb->add(NAVBAR_TITLE_2, tep_href_link(FILENAME_ACCOUNT_PASSWORD, '', 'SSL'));
  include("includes/header.php");
  include("includes/form_check.js.php");
  $xoopsTpl->assign("form_pwd",tep_draw_form('account_password', tep_href_link(FILENAME_ACCOUNT_PASSWORD, '', 'SSL'), 'post', 'onSubmit="return check_form(account_password);"'));
  $xoopsTpl->assign("action_field",tep_draw_hidden_field('action', 'process'));
  $xoopsTpl->assign("site_image",tep_image(DIR_WS_IMAGES . 'table_background_account.gif', HEADING_TITLE, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT));
  $xoopsTpl->assign("seperator",tep_draw_separator('pixel_trans.gif', '100%', '10'));
  $xoopsTpl->assign("seperator1",tep_draw_separator('pixel_trans.gif', '10', '1'));
  if ($messageStack->size('account_password') > 0) {
   $xoopsTpl->assign("smessage",1);
   $xoopsTpl->assign("messagetext",$messageStack->output('account_password'));
  }
  $xoopsTpl->assign("pwd_field",tep_draw_password_field('password_current'));
  if(tep_not_null(ENTRY_PASSWORD_CURRENT_TEXT)) $xoopsTpl->assign("pwd_entry",'<span class="inputRequirement">' . ENTRY_PASSWORD_CURRENT_TEXT . '</span>');
  $xoopsTpl->assign("pwd_new_field",tep_draw_password_field('password_new'));
  if(tep_not_null(ENTRY_PASSWORD_NEW_TEXT)) $xoopsTpl->assign("pwd_new_entry",'<span class="inputRequirement">' . ENTRY_PASSWORD_NEW_TEXT . '</span>');
  $xoopsTpl->assign("pwd_conf_field",tep_draw_password_field('password_confirmation'));
  if(tep_not_null(ENTRY_PASSWORD_CONFIRMATION_TEXT))$xoopsTpl->assign("pwd_conf_entry",'<span class="inputRequirement">' . ENTRY_PASSWORD_CONFIRMATION_TEXT . '</span>');
  $xoopsTpl->assign("account",tep_href_link(FILENAME_ACCOUNT, '', 'SSL'));
  $xoopsTpl->assign("bt_back",tep_image_button('button_back.gif', IMAGE_BUTTON_BACK));
  $xoopsTpl->assign("bt_continue",tep_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE));
  include_once XOOPS_ROOT_PATH.'/footer.php';
  include("includes/application_bottom.php");
?>