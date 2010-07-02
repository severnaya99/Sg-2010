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
// $Id: application_top.php 1307 2005-05-06 06:45:52Z drbyte $
//

// set the level of error reporting
  error_reporting(E_ALL & ~E_NOTICE);

// define the project version
  require('version.php');
// set php_self in the local scope
  if (!isset($PHP_SELF)) $PHP_SELF = $_SERVER['PHP_SELF'];
  require('includes/functions/general.php');
  require('includes/classes/installer.php');
  $zc_install = new installer;
  define('DIR_WS_INSTALL_TEMPLATE', 'includes/templates/template_default/');
  
  $language = 'english';
  if  (isset($_GET['language'])) $language = $_GET['language'];
  if (!isset($_GET['language'])) $_GET['language'] = $language;

// initialize the message stack for output messages
  require('includes/classes/boxes.php');
  require('includes/classes/message_stack.php');
  $messageStack = new messageStack;

?>