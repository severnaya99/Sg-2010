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
// $Id: phpbb_setup.php 277 2004-09-10 23:03:52Z wilt $
//
  
  define('SAVE_PHPBB_SETTINGS', 'Save phpBB Settings'); //this comes before TEXT_MAIN
  define('TEXT_MAIN', "Next we need to know some information about whether you have installed and want to use the phpBB Forum.  Please carefully enter each setting in the appropriate box and press <em>".SAVE_PHPBB_SETTINGS.'</em> to continue.');
  define('TEXT_PAGE_HEADING', 'Zen Cart&trade; Setup - phpBB Setup');
  define('PHPBB_INFORMATION', 'phpBB Information');
  define('PHPBB_USE', 'Do you want to use phpBB forums');
  define('PHPBB_USE_INSTRUCTION', 'Choose whether you want to use the phpBB forum or not.');
  define('PHPBB_DIR', 'phpBB Directory');
  define('PHPBB_DIR_INSTRUCTION', 'The directory where phpBB is installed');

//possible future use:
  define('PHPBB_DATABASE_NAME', 'phpBB Database Name');
  define('PHPBB_DATABASE_NAME_INSTRUCTION', 'What is the name of the database used to hold the data for the phpBB forum');
  define('PHPBB_DATABASE_PREFIX', 'phpBB Database Table-Prefix');
  define('PHPBB_DATABASE_PREFIX_INSTRUCTION', 'What is the prefix you would like used for the phpBB database tables?  Leave empty if no prefix is needed.');
?>