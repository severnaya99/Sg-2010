<?php
/**
 * $Id: create_account.php 121 2006-01-21 16:15:50Z Michael $
 * osCommerce, Open Source E-Commerce Solutions
 * http://www.oscommerce.com
 * Copyright (c) 2003 osCommerce
 * Released under the GNU General Public License
 * adapted 2005 for xoops 2.0.x by FlinkUX e.K. <http://www.flinkux.de>
 * (c) 2005  Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @package xosC
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
**/

  include("includes/application_top.php");
  
  include_once XOOPS_ROOT_PATH."/class/xoopslists.php";
  include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";

  $config_handler =& xoops_gethandler('config');
  $xoopsConfigUser =& $config_handler->getConfigsByCat(XOOPS_CONF_USER);
  $myts =& MyTextSanitizer::getInstance();
  
  $xoopsOption['template_main'] = 'create_account.html';
  include XOOPS_ROOT_PATH.'/header.php';
  $xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" /><?php include("'.XOOPS_URL.'modules/osC/templates/form_check.js.php")?>');

// needs to be included earlier to set the success message in the messageStack
  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_CREATE_ACCOUNT);
//  include_once XOOPS_ROOT_PATH."/language/".$xoopsConfig['language']."/user.php";
  include_once XOOPS_ROOT_PATH."/modules/profile/language/".$xoopsConfig['language']."/main.php";
  include_once XOOPS_ROOT_PATH."/modules/profile/language/".$xoopsConfig['language']."/modinfo.php";
  $process = false;
  if (isset($HTTP_POST_VARS['action']) && ($HTTP_POST_VARS['action'] == 'process')) {
    $process = true;

    if (ACCOUNT_GENDER == 'true') {
      if (isset($HTTP_POST_VARS['gender'])) {
        $gender = tep_db_prepare_input($HTTP_POST_VARS['gender']);
      } else {
        $gender = false;
      }
    }
    $firstname = tep_db_prepare_input($HTTP_POST_VARS['firstname']);
    $lastname = tep_db_prepare_input($HTTP_POST_VARS['lastname']);
    if (ACCOUNT_DOB == 'true') $dob = tep_db_prepare_input($HTTP_POST_VARS['dob']);
    $email_address = tep_db_prepare_input($HTTP_POST_VARS['email_address']);
    if (ACCOUNT_COMPANY == 'true') $company = tep_db_prepare_input($HTTP_POST_VARS['company']);
    $street_address = tep_db_prepare_input($HTTP_POST_VARS['street_address']);
    if (ACCOUNT_SUBURB == 'true') $suburb = tep_db_prepare_input($HTTP_POST_VARS['suburb']);
    $postcode = tep_db_prepare_input($HTTP_POST_VARS['postcode']);
    $city = tep_db_prepare_input($HTTP_POST_VARS['city']);
    if (ACCOUNT_STATE == 'true') {
      $state = tep_db_prepare_input($HTTP_POST_VARS['state']);
      if (isset($HTTP_POST_VARS['zone_id'])) {
        $zone_id = tep_db_prepare_input($HTTP_POST_VARS['zone_id']);
      } else {
        $zone_id = false;
      }
    }
    $country = tep_db_prepare_input($HTTP_POST_VARS['country']);
    $telephone = tep_db_prepare_input($HTTP_POST_VARS['telephone']);
    $fax = tep_db_prepare_input($HTTP_POST_VARS['fax']);
    if (isset($HTTP_POST_VARS['newsletter'])) {
      $newsletter = tep_db_prepare_input($HTTP_POST_VARS['newsletter']);
    } else {
      $newsletter = false;
    }
    $password = tep_db_prepare_input($HTTP_POST_VARS['password']);
    $confirmation = tep_db_prepare_input($HTTP_POST_VARS['confirmation']);

    $error = false;

    if (ACCOUNT_GENDER == 'true') {
      if ( ($gender != 'm') && ($gender != 'f') ) {
        $error = true;

        $messageStack->add('create_account', ENTRY_GENDER_ERROR);
      }
    }

    if (strlen($firstname) < ENTRY_FIRST_NAME_MIN_LENGTH) {
      $error = true;

      $messageStack->add('create_account', ENTRY_FIRST_NAME_ERROR);
    }

    if (strlen($lastname) < ENTRY_LAST_NAME_MIN_LENGTH) {
      $error = true;

      $messageStack->add('create_account', ENTRY_LAST_NAME_ERROR);
    }

    if (ACCOUNT_DOB == 'true') {
      if (checkdate(substr(tep_date_raw($dob), 4, 2), substr(tep_date_raw($dob), 6, 2), substr(tep_date_raw($dob), 0, 4)) == false) {
        $error = true;

        $messageStack->add('create_account', ENTRY_DATE_OF_BIRTH_ERROR);
      }
    }

      if (strlen($email_address) < ENTRY_EMAIL_ADDRESS_MIN_LENGTH ) {
        $error = true;

        $messageStack->add('create_account', ENTRY_EMAIL_ADDRESS_ERROR);
      } elseif (tep_validate_email($email_address) == false  ) {
        $error = true;

        $messageStack->add('create_account', ENTRY_EMAIL_ADDRESS_CHECK_ERROR);
    } else {
      $check_email_query = tep_db_query("select count(*) as total from " . TABLE_CUSTOMERS . " where customers_email_address = '" . tep_db_input($email_address) . "'");
      $check_email = tep_db_fetch_array($check_email_query);
      if ($check_email['total'] > 0) {
        $error = true;

        $messageStack->add('create_account', ENTRY_EMAIL_ADDRESS_ERROR_EXISTS);
      }
    }

    if (strlen($street_address) < ENTRY_STREET_ADDRESS_MIN_LENGTH) {
      $error = true;

      $messageStack->add('create_account', ENTRY_STREET_ADDRESS_ERROR);
    }

    if (strlen($postcode) < ENTRY_POSTCODE_MIN_LENGTH) {
      $error = true;

      $messageStack->add('create_account', ENTRY_POST_CODE_ERROR);
    }

    if (strlen($city) < ENTRY_CITY_MIN_LENGTH) {
      $error = true;

      $messageStack->add('create_account', ENTRY_CITY_ERROR);
    }

    if (is_numeric($country) == false) {
      $error = true;

      $messageStack->add('create_account', ENTRY_COUNTRY_ERROR);
    }

    if (ACCOUNT_STATE == 'true') {
      $zone_id = 0;
      $check_query = tep_db_query("select count(*) as total from " . TABLE_ZONES . " where zone_country_id = '" . (int)$country . "'");
      $check = tep_db_fetch_array($check_query);
      $entry_state_has_zones = ($check['total'] > 0);
      if ($entry_state_has_zones == true) {
        $zone_query = tep_db_query("select distinct zone_id from " . TABLE_ZONES . " where zone_country_id = '" . (int)$country . "' and (zone_name like '" . tep_db_input($state) . "%' or zone_code like '%" . tep_db_input($state) . "%')");
        if (tep_db_num_rows($zone_query) == 1) {
          $zone = tep_db_fetch_array($zone_query);
          $zone_id = $zone['zone_id'];
        } else {
          $error = true;

          $messageStack->add('create_account', ENTRY_STATE_ERROR_SELECT);
        }
      } else {
        if (strlen($state) < ENTRY_STATE_MIN_LENGTH) {
          $error = true;

          $messageStack->add('create_account', ENTRY_STATE_ERROR);
        }
      }
    }

    if (strlen($telephone) < ENTRY_TELEPHONE_MIN_LENGTH) {
      $error = true;

      $messageStack->add('create_account', ENTRY_TELEPHONE_NUMBER_ERROR);
    }


    if (strlen($password) < ENTRY_PASSWORD_MIN_LENGTH && ! isset($xoopsUserId) ) {
      $error = true;

      $messageStack->add('create_account', ENTRY_PASSWORD_ERROR);
    } elseif ($password != $confirmation && ! isset($xoopsUserId) ) {
      $error = true;

      $messageStack->add('create_account', ENTRY_PASSWORD_ERROR_NOT_MATCHING);
    }
// xoops checks

if(!isset($xoopsUserId)) {
	$member_handler =& xoops_gethandler('member');
	$profile_handler =& xoops_gethandler('profile');
	$fields =& $profile_handler->loadFields();

	$sql = sprintf('SELECT COUNT(*) FROM %s WHERE email = %s', $xoopsDB->prefix('users'), $xoopsDB->quoteString(addslashes($email_address)));
    $xoops_check=tep_db_query($sql);
	if(tep_db_num_rows($sql) > 0 ) {
	  $error=true;
	  $messageStack->add('create_account', _PROFILE_MA_NAMERESERVED);
	}
    $uname=$_POST['uname'];
	$url = isset($_POST['url']) ? trim($myts->stripSlashesGPC($_POST['url'])) : '';
    $timezone_offset = isset($_POST['timezone_offset']) ? intval($_POST['timezone_offset']) : $xoopsConfig['default_TZ'];
    $user_viewemail = (isset($_POST['user_viewemail']) && intval($_POST['user_viewemail'])) ? 1 : 0;
    $user_mailok = (isset($_POST['user_mailok']) && intval($_POST['user_mailok'])) ? 1 : 0;
    $agree_disc = (isset($_POST['agree_disc']) && intval($_POST['agree_disc'])) ? 1 : 0;

    $sql = 'SELECT * FROM '.$xoopsDB->prefix('users').' WHERE uname = "'.$uname.'"';
    $xoops_check=tep_db_query($sql);
    if(mysql_affected_rows() > 0 ) {
      $error = true;
      $messageStack->add('create_account', __PROFILE_MA_NICKNAMETAKEN);
    }
	
    if (strrpos($uname, ' ') > 0) {
		$error=true;
		$messageStack->add('create_account',__PROFILE_MA_NICKNAMENOSPACES);
	}

	$uname = xoops_trim($uname);
	switch ($xoopsConfigUser['uname_test_level']) {
	case 0:
		// strict
		$restriction = '/[^a-zA-Z0-9\_\-]/';
		break;
	case 1:
		// medium
		$restriction = '/[^a-zA-Z0-9\_\-\<\>\,\.\$\%\#\@\!\\\'\"]/';
		break;
	case 2:
		// loose
		$restriction = '/[\000-\040]/';
		break;
	}
	if (empty($uname) || preg_match($restriction, $uname)) {
	    $error=true;
		$messageStack->add('create_account', _PROFILE_MA_INVALIDNICKNAME);
	}
/**
 * obsolete for xoops >= 2.2.3
 *	if (strlen($uname) > $xoopsConfigUser['maxuname']) {
 *	    $error=true;
 *		$messageStack->add('create_account',sprintf(_PROFILE_MA_NICKNAMETOOLONG, $xoopsConfigUser['maxuname']));
 *	}
 *	if (strlen($uname) < $xoopsConfigUser['minuname']) {
 *	    $error=true;
 *		$messageStack->add('create_account',sprintf(_PROFILE_MA_NICKNAMETOOSHORT, $xoopsModuleConfig['minpass']));
 *	}
**/
  	foreach ($xoopsConfigUser['bad_unames'] as $bu) {
		if (!empty($bu) && preg_match("/".$bu."/i", $uname)) {
			$error=true;
			$messageStack->add('create_account',_PROFILE_MA_NAMERESERVED);
			break;
		}
	}
	if ($xoopsConfigUser['reg_dispdsclmr'] != 0 && $xoopsConfigUser['reg_disclaimer'] != '') {
		if (empty($agree_disc)) {
		    $error=true;
			$messageStack->add('create_account',_PROFILE_MA_UNEEDAGREE);
		}
	}

  }
  
// ende xoopscheck

    if ($error == false) {
      $sql_data_array = array('customers_firstname' => $firstname,
                              'customers_lastname' => $lastname,
                              'customers_email_address' => $email_address,
                              'customers_telephone' => $telephone,
                              'customers_fax' => $fax,
                              'customers_newsletter' => $newsletter,
							  'customers_group_id' => 1,
                              'customers_password' => tep_encrypt_password($password));

      if (ACCOUNT_GENDER == 'true') $sql_data_array['customers_gender'] = $gender;
      if (ACCOUNT_DOB == 'true') $sql_data_array['customers_dob'] = tep_date_raw($dob);

      tep_db_perform(TABLE_CUSTOMERS, $sql_data_array);

      $customer_id = tep_db_insert_id();

      $sql_data_array = array('customers_id' => $customer_id,
                              'entry_firstname' => $firstname,
                              'entry_lastname' => $lastname,
                              'entry_street_address' => $street_address,
                              'entry_postcode' => $postcode,
                              'entry_city' => $city,
                              'entry_country_id' => $country);

      if (ACCOUNT_GENDER == 'true') $sql_data_array['entry_gender'] = $gender;
      if (ACCOUNT_COMPANY == 'true') $sql_data_array['entry_company'] = $company;
      if (ACCOUNT_SUBURB == 'true') $sql_data_array['entry_suburb'] = $suburb;
      if (ACCOUNT_STATE == 'true') {
        if ($zone_id > 0) {
          $sql_data_array['entry_zone_id'] = $zone_id;
          $sql_data_array['entry_state'] = '';
        } else {
          $sql_data_array['entry_zone_id'] = '0';
          $sql_data_array['entry_state'] = $state;
        }
      }

      tep_db_perform(TABLE_ADDRESS_BOOK, $sql_data_array);

      $address_id = tep_db_insert_id();

      tep_db_query("update " . TABLE_CUSTOMERS . " set customers_default_address_id = '" . (int)$address_id . "' where customers_id = '" . (int)$customer_id . "'");

      tep_db_query("insert into " . TABLE_CUSTOMERS_INFO . " (customers_info_id, customers_info_number_of_logons, customers_info_date_account_created) values ('" . (int)$customer_id . "', '0', now())");
 // Xoops wird erstellt
      if(!isset($xoopsUserId)) {

		$newuser =& $member_handler->createUser();
		$newuser->setVar('user_viewemail',$user_viewemail, true);
		$newuser->setVar('uname', $uname, true);
		$newuser->setVar('loginname', $uname, true);
		$newuser->setVar('email', $email_address, true);
		if ($url != '') {
			$newuser->setVar('url', formatURL($url), true);
		}
		$newuser->setVar('user_avatar','blank.gif', true);
		$actkey = substr(md5(uniqid(mt_rand(), 1)), 0, 8);
		$newuser->setVar('actkey', $actkey, true);
		$newuser->setVar('pass', md5($password), true);
		$newuser->setVar('timezone_offset', $timezone_offset, true);
		$newuser->setVar('user_regdate', time(), true);
		$newuser->setVar('uorder',$xoopsConfig['com_order'], true);
		$newuser->setVar('umode',$xoopsConfig['com_mode'], true);
		$newuser->setVar('user_mailok',$user_mailok, true);
		if ($xoopsConfigUser['activation_type'] == 1) {
			$newuser->setVar('level', 1, true);
		}
		if (!$member_handler->insertUser($newuser)) {
			$messageStack->add('create_account',  _PROFILE_MA_REGISTERNG);
		}
		$newid = $newuser->getVar('uid');
		if (!$member_handler->addUserToGroup(XOOPS_GROUP_USERS, $newid)) {
			$messageStack->add('create_account', _PROFILE_MA_REGISTERNG);
			//include 'footer.php';
			//exit();
		}
		//if ($xoopsConfigUser['activation_type'] == 1) {
			//redirect_header('index.php', 4, _US_ACTLOGIN);
			//exit();
		//}
		if ($xoopsConfigUser['activation_type'] == 0) {
			$xoopsMailer =& getMailer();
			$xoopsMailer->useMail();
			$xoopsMailer->setTemplate('register.tpl');
			$xoopsMailer->assign('SITENAME', $xoopsConfig['sitename']);
			$xoopsMailer->assign('ADMINMAIL', $xoopsConfig['adminmail']);
			$xoopsMailer->assign('SITEURL', XOOPS_URL."/");
			$xoopsMailer->setToUsers(new XoopsUser($newid));
			$xoopsMailer->setFromEmail($xoopsConfig['adminmail']);
			$xoopsMailer->setFromName($xoopsConfig['sitename']);
			$xoopsMailer->setSubject(sprintf(_PROFILE_MA_USERKEYFOR, $uname));
			if ( !$xoopsMailer->send() ) {
				$messageStack->add('create_account', _PROFILE_MA_YOURREGMAILNG);
			} else {
				$messageStack->add('create_account', _PROFILE_MA_YOURREGISTERED);
			}
		} elseif ($xoopsConfigUser['activation_type'] == 2) {
			$xoopsMailer =& getMailer();
			$xoopsMailer->useMail();
			$xoopsMailer->setTemplate('adminactivate.tpl');
			$xoopsMailer->assign('USERNAME', $uname);
			$xoopsMailer->assign('USEREMAIL', $email);
			$xoopsMailer->assign('USERACTLINK', XOOPS_URL.'/user.php?op=actv&id='.$newid.'&actkey='.$actkey);
			$xoopsMailer->assign('SITENAME', $xoopsConfig['sitename']);
			$xoopsMailer->assign('ADMINMAIL', $xoopsConfig['adminmail']);
			$xoopsMailer->assign('SITEURL', XOOPS_URL."/");
			$member_handler =& xoops_gethandler('member');
			$xoopsMailer->setToGroups($member_handler->getGroup($xoopsConfigUser['activation_group']));
			$xoopsMailer->setFromEmail($xoopsConfig['adminmail']);
			$xoopsMailer->setFromName($xoopsConfig['sitename']);
			$xoopsMailer->setSubject(sprintf(_PROFILE_MA_USERKEYFOR, $uname));
			if ( !$xoopsMailer->send() ) {
				$messageStack->add('create_account', _PROFILE_MA_YOURREGMAILNG);
			} else {
				$messageStack->add('create_account', _PROFILE_MA_YOURREGISTERED2);
			}
		}
		if ($xoopsConfigUser['new_user_notify'] == 1 && !empty($xoopsConfigUser['new_user_notify_group'])) {
			$xoopsMailer =& getMailer();
			$xoopsMailer->useMail();
			$member_handler =& xoops_gethandler('member');
			$xoopsMailer->setToGroups($member_handler->getGroup($xoopsConfigUser['new_user_notify_group']));
			$xoopsMailer->setFromEmail($xoopsConfig['adminmail']);
			$xoopsMailer->setFromName($xoopsConfig['sitename']);
			$xoopsMailer->setSubject(sprintf(_PROFILE_MA_NEWUSERREGAT,$xoopsConfig['sitename']));
			$xoopsMailer->setBody(sprintf(_PROFILE_MA_HASJUSTREG, $uname));
			$xoopsMailer->send();
		}
     }

// End XOOPS



      if (SESSION_RECREATE == 'True') {
        tep_session_recreate();
      }

/*      $customer_first_name = $firstname;
      $customer_default_address_id = $address_id;
      $customer_country_id = $country;
      $customer_zone_id = $zone_id;
      tep_session_register('customer_id');
      tep_session_register('customer_first_name');
      tep_session_register('customer_default_address_id');
      tep_session_register('customer_country_id');
      tep_session_register('customer_zone_id');
*/
// restore cart contents
 //     $cart->restore_contents();

// build the message content
      $name = $firstname . ' ' . $lastname;

      if (ACCOUNT_GENDER == 'true') {
         if ($gender == 'm') {
           $email_text = sprintf(EMAIL_GREET_MR, $lastname);
         } else {
           $email_text = sprintf(EMAIL_GREET_MS, $lastname);
         }
      } else {
        $email_text = sprintf(EMAIL_GREET_NONE, $firstname);
      }

      $email_text .= EMAIL_WELCOME . EMAIL_TEXT . EMAIL_CONTACT . EMAIL_WARNING;
// ###### Added CCGV Contribution #########
  if (NEW_SIGNUP_GIFT_VOUCHER_AMOUNT > 0) {
    $coupon_code = create_coupon_code();
    $insert_query = tep_db_query("insert into " . TABLE_COUPONS . " (coupon_code, coupon_type, coupon_amount, date_created) values ('" . $coupon_code . "', 'G', '" . NEW_SIGNUP_GIFT_VOUCHER_AMOUNT . "', now())");
    $insert_id = tep_db_insert_id($insert_query);
    $insert_query = tep_db_query("insert into " . TABLE_COUPON_EMAIL_TRACK . " (coupon_id, customer_id_sent, sent_firstname, emailed_to, date_sent) values ('" . $insert_id ."', '0', 'Admin', '" . $email_address . "', now() )");

    $email_text .= sprintf(EMAIL_GV_INCENTIVE_HEADER, $currencies->format(NEW_SIGNUP_GIFT_VOUCHER_AMOUNT)) . "\n\n" .
                   sprintf(EMAIL_GV_REDEEM, $coupon_code) . "\n\n" .
                   EMAIL_GV_LINK . tep_href_link(FILENAME_GV_REDEEM, 'gv_no=' . $coupon_code,'NONSSL', false) .
                   "\n\n";
  }
  if (NEW_SIGNUP_DISCOUNT_COUPON != '') {
		$coupon_code = NEW_SIGNUP_DISCOUNT_COUPON;
    $coupon_query = tep_db_query("select * from " . TABLE_COUPONS . " where coupon_code = '" . $coupon_code . "'");
    $coupon = tep_db_fetch_array($coupon_query);
		$coupon_id = $coupon['coupon_id'];		
    $coupon_desc_query = tep_db_query("select * from " . TABLE_COUPONS_DESCRIPTION . " where coupon_id = '" . $coupon_id . "' and language_id = '" . (int)$languages_id . "'");
    $coupon_desc = tep_db_fetch_array($coupon_desc_query);
    $insert_query = tep_db_query("insert into " . TABLE_COUPON_EMAIL_TRACK . " (coupon_id, customer_id_sent, sent_firstname, emailed_to, date_sent) values ('" . $coupon_id ."', '0', 'Admin', '" . $email_address . "', now() )");
    $email_text .= EMAIL_COUPON_INCENTIVE_HEADER .  "\n" .
                   sprintf("%s", $coupon_desc['coupon_description']) ."\n\n" .
                   sprintf(EMAIL_COUPON_REDEEM, $coupon['coupon_code']) . "\n\n" .
                   "\n\n";

  }
//    $email_text .= EMAIL_TEXT . EMAIL_CONTACT . EMAIL_WARNING;
// ###### End Added CCGV Contribution #########

      tep_mail($name, $email_address, EMAIL_SUBJECT, $email_text, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS);
	  $redirect=true;
	  // XOOPS Fix für ein schlecht implementierte Mail Klasse
	  $xoopsOption['template_main'] = 'create_account_success.html';
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
	  exit();
    }
  }

  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_CREATE_ACCOUNT, '', 'SSL'));
  include("includes/header.php");
  include("includes/form_check.js.php");
  if ($messageStack->size('create_account') > 0) {
    	$xoopsTpl->assign("messagestack",1);
		$xoopsTpl->assign("message_output",$messageStack->output('create_account'));
  }
// Übernahme
   $xoopsTpl->assign("ingender",$gender);
   $xoopsTpl->assign("infirstname",$firstname);
   $xoopsTpl->assign("inlastname",$lastname);
   $xoopsTpl->assign("incountry",$country);
   $xoopsTpl->assign("inpostcode",$postcode);
   $xoopsTpl->assign("incity",$city);
   $xoopsTpl->assign("intelephone",$telephone);
   $xoopsTpl->assign("infax",$fax);
   $xoopsTpl->assign("indob",$dob);
   $xoopsTpl->assign("incompany",$company);
   $xoopsTpl->assign("instreet_address",$street_address);
   $xoopsTpl->assign("insuburb",$suburb);
   $xoopsTpl->assign("newsletter",$newsletter);
   $xoopsTpl->assign("origin_login",sprintf(TEXT_ORIGIN_LOGIN, tep_href_link(FILENAME_LOGIN, tep_get_all_get_params(), 'SSL')));
  // $xoopsTpl->assign("seperator",
   if(isset($xoopsUserId)) {
     $xoopsTpl->assign("email_address",tep_draw_input_field('email_address',$xoopsUser->email(),'readonly="true"'));
     //$xoopsTpl->assign("inemail",$xoopsUser->email());
	}else{
	  $uname = isset($_POST['uname']) ? $myts->stripSlashesGPC($_POST['uname']) : '';
      $url = isset($_POST['url']) ? trim($myts->stripSlashesGPC($_POST['url'])) : '';
      $timezone_offset = isset($_POST['timezone_offset']) ? intval($_POST['timezone_offset']) : $xoopsConfig['default_TZ'];
      $user_viewemail = (isset($_POST['user_viewemail']) && intval($_POST['user_viewemail'])) ? 1 : 0;
      $user_mailok = (isset($_POST['user_mailok']) && intval($_POST['user_mailok'])) ? 1 : 0;
      $agree_disc = (isset($_POST['agree_disc']) && intval($_POST['agree_disc'])) ? 1 : 0;

	  $xoopsTpl->assign("noxoopsuser",1);
	  $xoopsTpl->assign("email_address",tep_draw_input_field('email_address'));

	  $uname=new XoopsFormText(_PROFILE_MA_NICKNAME, "uname", 25, 75, $myts->htmlSpecialChars($uname));
	  $xoopsTpl->assign("xoops_nick",$uname->render());
	  
	  $url=new XoopsFormText(_PROFILE_MI_URL_TITLE, "url", 25, 255, $myts->htmlSpecialChars($url));
	  $xoopsTpl->assign("xoops_homepage",$url->render());
	  
	  $tzselected = ($timezone_offset != "") ? $timezone_offset : $xoopsConfig['default_TZ'];
	  $timezone=new XoopsFormSelectTimezone(_PROFILE_MA_TIMEZONE, "timezone_offset", $tzselected);
	  $xoopsTpl->assign("xoops_timezone",$timezone->render());
	  
	  $mail=new XoopsFormRadioYN(_PROFILE_MA_MAILOK, 'user_mailok', $user_mailok);
	  $xoopsTpl->assign("xoops_mailok",$mail->render());
	  
	  $email_option = new XoopsFormCheckBox("", "user_viewemail", $user_viewemail);
      $email_option->addOption(1, _PROFILE_MA_ALLOWVIEWEMAIL);
      $xoopsTpl->assign("xoops_viewemail",$email_option->render());
	  
	  if ($xoopsConfigUser['reg_dispdsclmr'] != 0 && $xoopsConfigUser['reg_disclaimer'] != '') {
	    $xoopsTpl->assign("show_disc",1);
	    $disc_tray = new XoopsFormElementTray(_PROFILE_MA_DISCLAIMER, '<br />');
	    $disc_text = new XoopsFormTextarea('', 'disclaimer', $xoopsConfigUser['reg_disclaimer'], 8);
	    $disc_text->setExtra('readonly="readonly"');
	    $disc_tray->addElement($disc_text);
	    $agree_chk = new XoopsFormCheckBox('', 'agree_disc', $agree_disc);
	    $agree_chk->addOption(1, _PROFILE_MA_IAGREE);
	    $disc_tray->addElement($agree_chk);
	    $xoopsTpl->assign("xoops_agree",$disc_tray->render());
      }
	}

    if ($process == true) {
      if ($entry_state_has_zones == true) {
        $zones_array = array();
        $zones_query = tep_db_query("select zone_name from " . TABLE_ZONES . " where zone_country_id = '" . (int)$country . "' order by zone_name");
        while ($zones_values = tep_db_fetch_array($zones_query)) {
          $zones_array[] = array('id' => $zones_values['zone_name'], 'text' => $zones_values['zone_name']);
        }
        $xoopsTpl->assign("form_state",tep_draw_pull_down_menu('state', $zones_array,$zone_id));
      } else {
        $xoopsTpl->assign("form_state",tep_draw_input_field('state',$state));
      }
    } else {
      $xoopsTpl->assign("form_state",tep_draw_input_field('state',$state));
    }
    $xoopsTpl->assign("form_country",tep_get_country_list('country',$country) . '&nbsp;' . (tep_not_null(ENTRY_COUNTRY_TEXT) ? '<span class="inputRequirement">' . ENTRY_COUNTRY_TEXT . '</span>': ''));
    $xoopsTpl->assign("bt_continue",tep_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE));
    $xoopsTpl->assign("seperator",tep_draw_separator('pixel_trans.gif', '100%', '10'));
	$xoopsTpl->assign("seperator1",tep_draw_separator('pixel_trans.gif', '10', '1'));
include_once XOOPS_ROOT_PATH.'/footer.php';
include(XOOPS_ROOT_PATH."/modules/osC/includes/application_bottom.php");
?>