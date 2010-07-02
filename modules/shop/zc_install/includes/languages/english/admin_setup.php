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
// $Id: admin_setup.php 1633 2005-07-24 20:07:28Z drbyte $
//
  
  define('TEXT_PAGE_HEADING', 'Zen Cart&trade; Setup - Administrator Account Setup');
  define('SAVE_ADMIN_SETTINGS', 'Save Admin Settings');//this comes before TEXT_MAIN
  define('TEXT_MAIN', "To administer settings in your Zen Cart&trade; shop, you need an Administrative account.  Please select an administrator's name, and password, and enter an email address for reset passwords to be sent to.  Enter and check the information carefully and press <em>".SAVE_ADMIN_SETTINGS.'</em> when you are done.');
  define('ADMIN_INFORMATION', 'Administrator Information');
  define('ADMIN_USERNAME', 'Administrator\'s Username');
  define('ADMIN_USERNAME_INSTRUCTION', 'Enter the username to be used for your Zen Cart administrator account.');
  define('ADMIN_PASS', 'Administrator\'s Password');
  define('ADMIN_PASS_INSTRUCTION', 'Enter the password to be used for your Zen Cart administrator account.');
  define('ADMIN_PASS_CONFIRM', 'Confirm Administrator\'s Password');
  define('ADMIN_PASS_CONFIRM_INSTRUCTION', 'Confirm the password to be used for your Zen Cart administrator account.');
  define('ADMIN_EMAIL', 'Administrator\'s Email');
  define('ADMIN_EMAIL_INSTRUCTION', 'Enter the email address to be used for your Zen Cart administrator account.');
  define('UPGRADE_DETECTION','Upgrade Detection');
  define('UPGRADE_INSTRUCTION_TITLE','Check for Zen Cart&trade; updates when logging into Admin');
  define('UPGRADE_INSTRUCTION_TEXT','This will attempt to talk to the live Zen Cart&trade; versioning server to determine if an upgrade is available or not. If an update is available, a message will appear in admin.  It will NOT automatically APPLY any upgrades.<br />You can override this later in Admin->Config->My Store->Check if version update is available.');

?>