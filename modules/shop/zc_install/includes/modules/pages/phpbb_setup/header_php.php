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
// $Id: header_php.php 290 2004-09-15 19:48:26Z wilt $
//

// check to see if we're upgrading
$is_upgrade = $_GET['is_upgrade'];

  $zc_install->error = false;
  $zc_install->fatal_error = false;
  $zc_install->error_list = array();

      $virtual_http_path = parse_url($_GET['virtual_http_path']);
      $http_catalog = $virtual_http_path['path'];
      if (substr($http_catalog, -1) == '/') $http_catalog = substr($http_catalog, 0, strlen($http_catalog)-1);


//echo 'filename='.$_SERVER['SCRIPT_FILENAME'].'<br>';
//echo 'self='.$_SERVER['PHP_SELF'].'<br>';
//echo 'docroot1='.$_SERVER['DOCUMENT_ROOT'].'<br>';


      if ($_SERVER['DOCUMENT_ROOT'] == '') { // try to calculate docroot
          $docroot = substr($_SERVER['SCRIPT_FILENAME'],0,strpos($_SERVER['SCRIPT_FILENAME'],$_SERVER['PHP_SELF']));
      } else {
          $docroot = $_SERVER['DOCUMENT_ROOT'];
      }
      $phpbb_suggest_dir = '';
//echo 'docroot='.$docroot.'<br>';

  //look for typical paths to phpBB files
  foreach (array('/phpBB2', '/phpbb2', '/phpbb', '/phpBB', '/forum', '/forums') as $testpath) {
//echo 'path='.$testpath.'<br>';
     if (file_exists($docroot . $testpath . '/config.php') )  {
         $phpbb_suggest_dir = $docroot . $testpath;
         break;
         }
     if (file_exists($docroot . str_replace($docroot,'',$_GET['physical_path'] ) . $testpath . '/config.php') && $phpbb_suggest_dir=='')  {
         $phpbb_suggest_dir = $docroot .str_replace($docroot,'',$_GET['physical_path'] ) . $testpath ;
         break;
         }
  }
   $phpbb_suggest_dir = (substr($phpbb_suggest_dir,-1)=='/') ? substr($phpbb_suggest_dir,0,(strlen($phpbb_suggest_dir)-1)) : $phpbb_suggest_dir; //remove any trailing slashes
   $phpbb_suggest_dir = str_replace('//','/',$phpbb_suggest_dir); // remove any double-slashes

  if (isset($_POST['submit'])) {
    if ($_POST['phpbb_use'] == 'true') {
      $zc_install->fileExists($_POST['phpbb_dir'] . '/config.php', ERROR_TEXT_PHPBB_CONFIG_NOTEXIST . ' :'. $_POST['phpbb_dir'] . '/config.php',  ERROR_CODE_PHPBB_CONFIG_NOTEXIST);
//    } else {
//      $_POST['phpbb_dir'] = '';  // if option set to "false", then do not enter a path in the configure.php file.
    }

    if (!$zc_install->fatal_error) {
      header('location: index.php?main_page=database_setup&language=' . $language . '&physical_path='.$_GET['physical_path'].'&virtual_http_path='.$_GET['virtual_http_path'].'&virtual_https_path='.$_GET['virtual_https_path'].'&virtual_https_server='.$_GET['virtual_https_server'].'&enable_ssl='.$_GET['enable_ssl'].'&enable_ssl_admin='.$_GET['enable_ssl_admin'].'&sql_cache='.$_GET['sql_cache'].'&phpbb_dir='.$_POST['phpbb_dir'].'&is_upgrade='.$_GET['is_upgrade'].'&use_phpbb='.$_POST['phpbb_use']);
    }
  } //endif 'submit'

  //future use (2 lines):
//  if (!isset($_POST['phpbb_db_name'])) $_POST['phpbb_db_name'] = '';
//  if (!isset($_POST['phpbb_db_prefix'])) $_POST['phpbb_db_prefix'] = '';
  // set defaults
  if (!isset($_POST['phpbb_dir'])) $_POST['phpbb_dir'] = $phpbb_suggest_dir;
  if (!isset($_POST['phpbb_use'])) $_POST['phpbb_use'] = '';

  setInputValue($_POST['phpbb_dir'], 'PHPBB_DIR_VALUE', $phpbb_suggest_dir);
  setRadioChecked($_POST['phpbb_use'], 'PHPBB_USE', 'false');
?>