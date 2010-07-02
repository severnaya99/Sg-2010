<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
// $Id: header_php.php 1635 2005-07-24 20:13:46Z drbyte $
//
  $zc_install->error = false;
  $zc_install->fatal_error = false;
  $zc_install->error_list = array();
if (!isset($_GET['debug'])  && !zen_not_null($_POST['debug']))  define('ZC_UPG_DEBUG',false);
if (!isset($_GET['debug2']) && !zen_not_null($_POST['debug2'])) define('ZC_UPG_DEBUG2',false);
if (!isset($_GET['debug3']) && !zen_not_null($_POST['debug3'])) define('ZC_UPG_DEBUG3',false);


  if (isset($_POST['submit'])) {
    require('../includes/configure.php');
//    require('../includes/functions/functions_general.php');
//    require('../includes/functions/validations.php');
//	require('../includes/functions/password_funcs.php');

        if (!isset($_POST['admin_username'])) $_POST['admin_username'] = '';
        if (!isset($_POST['admin_email'])) $_POST['admin_email'] = '';
        if (!isset($_POST['admin_pass'])) $_POST['admin_pass'] = '';
        if (!isset($_POST['admin_pass_confirm'])) $_POST['admin_pass_confirm'] = '';
        if (!isset($_POST['check_for_updates'])) $_POST['check_for_updates'] = 'True';

	$admin_username = zen_db_prepare_input($_POST['admin_username']);
	$admin_email = zen_db_prepare_input($_POST['admin_email']);
	$admin_pass = zen_db_prepare_input($_POST['admin_pass']);
	$admin_pass_confirm = zen_db_prepare_input($_POST['admin_pass_confirm']);

    if (isset($_POST['check_for_updates']) && $_POST['check_for_updates']== '1' ) {
      $check_for_updates = 1;
    } else {
      $check_for_updates = 0;
    }

    $zc_install->isEmpty($admin_username, ERROR_TEXT_ADMIN_USERNAME_ISEMPTY, ERROR_CODE_ADMIN_USERNAME_ISEMPTY);
    $zc_install->isEmpty($admin_email, ERROR_TEXT_ADMIN_EMAIL_ISEMPTY, ERROR_CODE_ADMIN_EMAIL_ISEMPTY);
    $zc_install->isEmail($admin_email, ERROR_TEXT_ADMIN_EMAIL_NOTEMAIL, ERROR_CODE_ADMIN_EMAIL_NOTEMAIL);
    $zc_install->isEmpty($admin_pass, ERROR_TEXT_ADMIN_PASS_ISEMPTY, ERROR_CODE_ADMIN_PASS_ISEMPTY);
    $zc_install->isEqual($admin_pass, $admin_pass_confirm, ERROR_TEXT_ADMIN_PASS_NOTEQUAL, ERROR_CODE_ADMIN_PASS_NOTEQUAL);


    if (!$zc_install->error) {
      require('../includes/classes/db/' . DB_TYPE . '/query_factory.php');
      $db = new queryFactory;
      $db->Connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE) or die("Unable to connect to database");
      $sql = "update " . DB_PREFIX . "admin set admin_name = '" . $admin_username . "', admin_email = '" . $admin_email . "', admin_pass = '" . zen_encrypt_password($admin_pass) . "' where admin_id = 1";
	  $db->Execute($sql) or die("Error in query: $sql".$db->ErrorMsg());

      // enable/disable automatic version-checking
        $sql = "update " . DB_PREFIX . "configuration set configuration_value = '".($check_for_updates ? 'true' : 'false' ) ."' where configuration_key = 'SHOW_VERSION_UPDATE_IN_HEADER'";
        $db->Execute($sql) or die("Error in query: $sql".$db->ErrorMsg());

  $db->Close();
      header('location: index.php?main_page=finished&language=' . $language);
 	  exit;
	}
  }
  if (!isset($_POST['admin_username'])) $_POST['admin_username'] = '';
  if (!isset($_POST['admin_email'])) $_POST['admin_email'] = '';

  setInputValue($_POST['admin_username'], 'ADMIN_USERNAME_VALUE', '');
  setInputValue($_POST['admin_email'], 'ADMIN_EMAIL_VALUE', '');

// this sets the first field to email address on login - setting in /common/tpl_main_page.php
  $zc_first_field= 'onload="document.getElementById(\'admin_username\').focus()"';

?>