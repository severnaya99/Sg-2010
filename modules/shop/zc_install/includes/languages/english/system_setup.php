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
// $Id: system_setup.php 1188 2005-04-14 07:29:32Z drbyte $
//
  
  define('SAVE_SYSTEM_SETTINGS', 'Save System Settings'); //this comes before TEXT_MAIN
  define('TEXT_MAIN', "We will now setup the Zen Cart&trade; System environment.  Please carefully review each setting, and change if necessary to suit your directory layout. Then click on <em>".SAVE_SYSTEM_SETTINGS.'</em> to continue.');
  define('TEXT_PAGE_HEADING', 'Zen Cart&trade; Setup - System Setup');
  define('SERVER_SETTINGS', 'Server Settings');
  define('PHYSICAL_PATH', 'Physical Path');
  define('PHYSICAL_PATH_INSTRUCTION', 'Physical Path to your<br />Zen Cart directory.<br />Leave no trailing slash.');
  define('VIRTUAL_HTTP_PATH', 'Virtual HTTP Path');
  define('VIRTUAL_HTTP_PATH_INSTRUCTION', 'Virtual Path to your<br />Zen Cart directory.<br />Leave no trailing slash.');
  define('VIRTUAL_HTTPS_PATH', 'Virtual HTTPS Path');
  define('VIRTUAL_HTTPS_PATH_INSTRUCTION', 'Virtual Path to your<br />secure Zen Cart directory.<br />Leave no trailing slash.');
  define('VIRTUAL_HTTPS_SERVER', 'Virtual HTTPS Server');
  define('VIRTUAL_HTTPS_SERVER_INSTRUCTION', 'Virtual server for your<br />secure Zen Cart directory.<br />Leave no trailing slash.');
  define('ENABLE_SSL', 'Enable SSL');
  define('ENABLE_SSL_INSTRUCTION', 'Would you like to enable Secure Sockets Layer in Customer area?<br />Leave this set to NO unless you\'re SURE you have SSL working.');
  define('ENABLE_SSL_ADMIN', 'Enable SSL in Admin Area');
  define('ENABLE_SSL_ADMIN_INSTRUCTION', 'Would you like to enable Secure Sockets Layer for Admin areas?<br />
Leave this set to NO unless you\'re SURE you have SSL working.');

?>