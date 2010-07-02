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
// $Id: store_setup.php 277 2004-09-10 23:03:52Z wilt $
//
  
  define('SAVE_STORE_SETTINGS', 'Save Store Settings');//this comes before TEXT_MAIN
  define('TEXT_MAIN', "This section of the Zen Cart&trade; setup tool will help you begin setting up your basic store settings.  You will be able to change any of these settings later using the administration tool.  Enter each value carefully and press <em>".SAVE_STORE_SETTINGS.'</em> to continue.');
  define('TEXT_PAGE_HEADING', 'Zen Cart&trade; Setup - Store Setup');
  define('STORE_INFORMATION', 'Store Information');
  define('STORE_NAME', 'Store Name');
  define('STORE_NAME_INSTRUCTION', 'What is the name of your Zen Cart store?');
  define('STORE_OWNER', 'Store Owner');
  define('STORE_OWNER_INSTRUCTION', 'Who is the owner of your Zen Cart store?');
  define('STORE_OWNER_EMAIL', 'Store Owner Email');
  define('STORE_OWNER_EMAIL_INSTRUCTION', 'What is the Zen Cart store owners email address?');
  define('STORE_COUNTRY', 'Store Country');
  define('STORE_COUNTRY_INSTRUCTION', 'What country is your Zen Cart store located in?');
  define('STORE_ZONE', 'Store Zone');
  define('STORE_ZONE_INSTRUCTION', 'What zone is your Zen Cart store located in?');
  define('STORE_ADDRESS', 'Store Address');
  define('STORE_ADDRESS_INSTRUCTION', 'What is the address of your Zen Cart store?  This address will be used on printable documents and displayed online.');
  define('STORE_DEFAULT_LANGUAGE', 'Default Language');
  define('STORE_DEFAULT_LANGUAGE_INSTRUCTION', 'Choose the language would you like as your default language?');
  define('STORE_DEFAULT_CURRENCY', 'Default Currency');
  define('STORE_DEFAULT_CURRENCY_INSTRUCTION', 'Choose the currency would you like as your default currency?');
  define('DEMO_INFORMATION', 'Demo Information');
  define('DEMO_INSTALL', 'Store Demo');
  define('DEMO_INSTALL_INSTRUCTION', 'Would you like to install the Zen Cart demonstration categories and products?');
?>