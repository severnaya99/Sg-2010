<?php
/*
  
  $Id: account_edit.php 152 2006-02-06 12:19:54Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License

  adapted 2005 for xoops 2.0.x by FlinkUX e.K. <http://www.flinkux.de>
  
  (c) 2005  Michael Hammelmann <michael.hammelmann@flinkux.de>
*/

  require('includes/application_top.php');
  $xoopsOption['template_main'] = 'account_edit.html';
  include XOOPS_ROOT_PATH.'/header.php';
  $xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" />');

  if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot();
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
  }

// needs to be included earlier to set the success message in the messageStack
  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_ACCOUNT_EDIT);

  if (isset($HTTP_POST_VARS['action']) && ($HTTP_POST_VARS['action'] == 'process')) {
    if (ACCOUNT_GENDER == 'true') $gender = tep_db_prepare_input($HTTP_POST_VARS['gender']);
    $firstname = tep_db_prepare_input($HTTP_POST_VARS['firstname']);
    $lastname = tep_db_prepare_input($HTTP_POST_VARS['lastname']);
    if (ACCOUNT_DOB == 'true') $dob = tep_db_prepare_input($HTTP_POST_VARS['dob']);
    $email_address = tep_db_prepare_input($HTTP_POST_VARS['email_address']);
    $telephone = tep_db_prepare_input($HTTP_POST_VARS['telephone']);
    $fax = tep_db_prepare_input($HTTP_POST_VARS['fax']);

    $error = false;

    if (ACCOUNT_GENDER == 'true') {
      if ( ($gender != 'm') && ($gender != 'f') ) {
        $error = true;

        $messageStack->add('account_edit', ENTRY_GENDER_ERROR);
      }
    }

    if (strlen($firstname) < ENTRY_FIRST_NAME_MIN_LENGTH) {
      $error = true;

      $messageStack->add('account_edit', ENTRY_FIRST_NAME_ERROR);
    }

    if (strlen($lastname) < ENTRY_LAST_NAME_MIN_LENGTH) {
      $error = true;

      $messageStack->add('account_edit', ENTRY_LAST_NAME_ERROR);
    }

    if (ACCOUNT_DOB == 'true') {
      if (!checkdate(substr(tep_date_raw($dob), 4, 2), substr(tep_date_raw($dob), 6, 2), substr(tep_date_raw($dob), 0, 4))) {
        $error = true;

        $messageStack->add('account_edit', ENTRY_DATE_OF_BIRTH_ERROR);
      }
    }

    if (strlen($email_address) < ENTRY_EMAIL_ADDRESS_MIN_LENGTH) {
      $error = true;

      $messageStack->add('account_edit', ENTRY_EMAIL_ADDRESS_ERROR);
    }

    if (!tep_validate_email($email_address)) {
      $error = true;

      $messageStack->add('account_edit', ENTRY_EMAIL_ADDRESS_CHECK_ERROR);
    }

    $check_email_query = tep_db_query("select count(*) as total from " . TABLE_CUSTOMERS . " where customers_email_address = '" . tep_db_input($email_address) . "' and customers_id != '" . (int)$customer_id . "'");
    $check_email = tep_db_fetch_array($check_email_query);
    if ($check_email['total'] > 0) {
      $error = true;

      $messageStack->add('account_edit', ENTRY_EMAIL_ADDRESS_ERROR_EXISTS);
    }

    if (strlen($telephone) < ENTRY_TELEPHONE_MIN_LENGTH) {
      $error = true;

      $messageStack->add('account_edit', ENTRY_TELEPHONE_NUMBER_ERROR);
    }

    if ($error == false) {
      $sql_data_array = array('customers_firstname' => $firstname,
                              'customers_lastname' => $lastname,
                              'customers_email_address' => $email_address,
                              'customers_telephone' => $telephone,
                              'customers_fax' => $fax);

      if (ACCOUNT_GENDER == 'true') $sql_data_array['customers_gender'] = $gender;
      if (ACCOUNT_DOB == 'true') $sql_data_array['customers_dob'] = tep_date_raw($dob);

      tep_db_perform(TABLE_CUSTOMERS, $sql_data_array, 'update', "customers_id = '" . (int)$customer_id . "'");

      tep_db_query("update " . TABLE_CUSTOMERS_INFO . " set customers_info_date_account_last_modified = now() where customers_info_id = '" . (int)$customer_id . "'");

      $sql_data_array = array('entry_firstname' => $firstname,
                              'entry_lastname' => $lastname);

      tep_db_perform(TABLE_ADDRESS_BOOK, $sql_data_array, 'update', "customers_id = '" . (int)$customer_id . "' and address_book_id = '" . (int)$customer_default_address_id . "'");

// reset the session variables
      $customer_first_name = $firstname;

      $messageStack->add_session('account', SUCCESS_ACCOUNT_UPDATED, 'success');

      tep_redirect(tep_href_link(FILENAME_ACCOUNT, '', 'SSL'));
    }
  }

  $account_query = tep_db_query("select customers_gender, customers_firstname, customers_lastname, customers_dob, customers_email_address, customers_telephone, customers_fax from " . TABLE_CUSTOMERS . " where customers_id = '" . (int)$customer_id . "'");
  $account = tep_db_fetch_array($account_query);

  $breadcrumb->add(NAVBAR_TITLE_1, tep_href_link(FILENAME_ACCOUNT, '', 'SSL'));
  $breadcrumb->add(NAVBAR_TITLE_2, tep_href_link(FILENAME_ACCOUNT_EDIT, '', 'SSL'));
  include("includes/header.php");
  include("includes/form_check.js.php");
  $xoopsTpl->assign("form_account_edit",tep_draw_form('account_edit', tep_href_link(FILENAME_ACCOUNT_EDIT, '', 'SSL'),'post', 'onSubmit="return check_form(account_edit);"'));
  $xoopsTpl->assign("action_field",tep_draw_hidden_field('action', 'process'));
  $xoopsTpl->assign("site_image", tep_image(DIR_WS_IMAGES . 'table_background_account.gif', HEADING_TITLE, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT));
  $xoopsTpl->assign("seperator",tep_draw_separator('pixel_trans.gif', '100%', '10'));
  $xoopsTpl->assign("seperator1",tep_draw_separator('pixel_trans.gif', '10', '1'));
  if ($messageStack->size('account_edit') > 0) {
	$xoopsTpl->assign("smessage",1);
	$xoopsTpl->assign("messagetext",$messageStack->output('account_edit'));
  }
  if (ACCOUNT_GENDER == 'true') {
	$xoopsTpl->assign("gender",1);
    if (isset($gender)) {
      $male = ($gender == 'm') ? true : false;
    } else {
      $male = ($account['customers_gender'] == 'm') ? true : false;
    }
    $female = !$male;
	$xoopsTpl->assign("gender_field_m",tep_draw_radio_field('gender', 'm', $male));
	$xoopsTpl->assign("gender_field_f",tep_draw_radio_field('gender', 'f', $female));
	if(tep_not_null(ENTRY_GENDER_TEXT)) $xoopsTpl->assign("gender_entry",'<span class="inputRequirement">' . ENTRY_GENDER_TEXT . '</span>');
 }
 $xoopsTpl->assign("firstname",tep_draw_input_field('firstname', $account['customers_firstname']));
 $xoopsTpl->assign("lastname",tep_draw_input_field('lastname', $account['customers_lastname']));
 if(tep_not_null(ENTRY_FIRST_NAME_TEXT))$xoopsTpl->assign("firstname_entry",'<span class="inputRequirement">' . ENTRY_FIRST_NAME_TEXT . '</span>');
 if(tep_not_null(ENTRY_LAST_NAME_TEXT))$xoopsTpl->assign("lastname_entry",'<span class="inputRequirement">' . ENTRY_LAST_NAME_TEXT . '</span>');
 if (ACCOUNT_DOB == 'true') {
   $xoopsTpl->assign("DOB",1);
   $xoopsTpl->assign("cust_dob",tep_draw_input_field('dob', tep_date_short($account['customers_dob'])));
   if(tep_not_null(ENTRY_DATE_OF_BIRTH_TEXT))$xoopsTpl->assign("dob_entry",'<span class="inputRequirement">' . ENTRY_DATE_OF_BIRTH_TEXT . '</span>');
  }
  $xoopsTpl->assign("email",tep_draw_input_field('email_address', $account['customers_email_address'],'readonly'));
  if(tep_not_null(ENTRY_EMAIL_ADDRESS_TEXT))$xoopsTpl->assign("email_entry",'<span class="inputRequirement">' . ENTRY_EMAIL_ADDRESS_TEXT . '</span>');
  $xoopsTpl->assign("telephone",tep_draw_input_field('telephone', $account['customers_telephone']) );
  if(tep_not_null(ENTRY_TELEPHONE_NUMBER_TEXT)) $xoopsTpl->assign("telephone_entry",'<span class="inputRequirement">' . ENTRY_TELEPHONE_NUMBER_TEXT . '</span>');
  $xoopsTpl->assign("fax",tep_draw_input_field('fax', $account['customers_fax']));
  if(tep_not_null(ENTRY_FAX_NUMBER_TEXT)) $xoopsTpl->assign("fax_entry",'<span class="inputRequirement">' . ENTRY_FAX_NUMBER_TEXT . '</span>');
  $xoopsTpl->assign("account",tep_href_link(FILENAME_ACCOUNT, '', 'SSL'));
  $xoopsTpl->assign("bt_back",tep_image_button('button_back.gif', IMAGE_BUTTON_BACK));
  $xoopsTpl->assign("bt_continue",tep_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE));

include_once XOOPS_ROOT_PATH.'/footer.php';
include(XOOPS_ROOT_PATH."/modules/osC/includes/application_bottom.php");
?>