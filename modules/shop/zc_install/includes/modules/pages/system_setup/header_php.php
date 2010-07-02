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
// $Id: header_php.php 1654 2005-07-28 04:35:43Z drbyte $
//

// check to see if we're upgrading
$is_upgrade = (isset($_GET['is_upgrade'])) ? $_GET['is_upgrade'] :'';

if ($is_upgrade) { // read existing settings instead of trying to detect from first install
   $http_server = zen_read_config_value('HTTP_SERVER');
   $http_catalog = zen_read_config_value('DIR_WS_CATALOG');
   $virtual_path = str_replace('http://','',$http_server) . $http_catalog;
   $virtual_https_server = str_replace('https://','',zen_read_config_value('HTTPS_SERVER'));
   $virtual_https_path = $virtual_https_server . zen_read_config_value('DIR_WS_HTTPS_CATALOG');
   $enable_ssl = zen_read_config_value('ENABLE_SSL');
   $enable_ssl_admin = zen_read_config_value('ENABLE_SSL_ADMIN');
   $dir_fs_www_root = zen_read_config_value('DIR_FS_CATALOG');
   $https_catalog = zen_read_config_value('DIR_WS_HTTPS_CATALOG');

   $http_server = (substr($http_server,-1)=='/') ? substr($http_server,0,(strlen($http_server)-1)) : $http_server;
   $http_catalog = (substr($http_catalog,-1)=='/') ? substr($http_catalog,0,(strlen($http_catalog)-1)) : $http_catalog;
   $virtual_path = (substr($virtual_path,-1)=='/') ? substr($virtual_path,0,(strlen($virtual_path)-1)) : $virtual_path;
   $virtual_https_server = (substr($virtual_https_server,-1)=='/') ? substr($virtual_https_server,0,(strlen($virtual_https_server)-1)) : $virtual_https_server;
   $virtual_https_path = (substr($virtual_https_path,-1)=='/') ? substr($virtual_https_path,0,(strlen($virtual_https_path)-1)) : $virtual_https_path;
   $dir_fs_www_root = (substr($dir_fs_www_root,-1)=='/') ? substr($dir_fs_www_root,0,(strlen($dir_fs_www_root)-1)) : $dir_fs_www_root;
   $https_catalog = (substr($https_catalog,-1)=='/') ? substr($https_catalog,0,(strlen($https_catalog)-1)) : $https_catalog;


} else { //fresh install, so do auto-detect of several settings
  // Determine Document Root
  $script_filename = $_SERVER['PATH_TRANSLATED'];
  if (empty($script_filename)) {
    $script_filename = $_SERVER['SCRIPT_FILENAME'];
  }
  $script_filename = str_replace(array('\\','//'), '/', $script_filename);

  $dir_fs_www_root_array = explode('/', dirname($script_filename));
  $dir_fs_www_root = array();
  for ($i=0, $n=sizeof($dir_fs_www_root_array)-1; $i<$n; $i++) {
    $dir_fs_www_root[] = $dir_fs_www_root_array[$i];
  }
  $dir_fs_www_root = implode('/', $dir_fs_www_root);

  // Determine http path
  $virtual_path = $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];
  $virtual_path = substr($virtual_path, 0, strpos($virtual_path, '/zc_install'));

  // Determine the https directory.  This is a best-guess since we're not likely installing over SSL connection:
   $virtual_https_server = getenv('HTTP_HOST');
   $virtual_https_path = $virtual_path;

} //endif $is_upgradable



  // Set form input values
  if (!isset($_POST['physical_path'])) $_POST['physical_path']=$dir_fs_www_root;
  if (!isset($_POST['virtual_http_path'])) $_POST['virtual_http_path']= 'http://' . $virtual_path;
  if (!isset($_POST['virtual_https_path'])) $_POST['virtual_https_path']='https://' . $virtual_https_path;
  if (!isset($_POST['virtual_https_server'])) $_POST['virtual_https_server']='https://' . $virtual_https_server;
  if (!isset($_POST['enable_ssl'])) $_POST['enable_ssl']=$enable_ssl;
  if (!isset($_POST['enable_ssl_admin'])) $_POST['enable_ssl_admin']=$enable_ssl_admin;
  
  setInputValue($_POST['physical_path'], 'PHYSICAL_PATH_VALUE', $dir_fs_www_root);
  setInputValue($_POST['virtual_http_path'], 'VIRTUAL_HTTP_PATH_VALUE', 'http://' . $virtual_path);
  setInputValue($_POST['virtual_https_path'], 'VIRTUAL_HTTPS_PATH_VALUE', 'https://' . $virtual_https_path);
  setInputValue($_POST['virtual_https_server'], 'VIRTUAL_HTTPS_SERVER_VALUE', 'https://' . $virtual_https_server);
  setRadioChecked($_POST['enable_ssl'], 'ENABLE_SSL', $enable_ssl);
  setRadioChecked($_POST['enable_ssl_admin'], 'ENABLE_SSL_ADMIN', $enable_ssl_admin);

  $zc_install->error = false;
  $zc_install->fatal_error = false;
  $zc_install->error_list = array();
  
  if (isset($_POST['submit'])) {
    $zc_install->isEmpty($_POST['physical_path'], ERROR_TEXT_PHYSICAL_PATH_ISEMPTY, ERROR_CODE_PHYSICAL_PATH_ISEMPTY);
    $zc_install->fileExists($_POST['physical_path'], ERROR_TEXT_PHYSICAL_PATH_INCORRECT, ERROR_CODE_PHYSICAL_PATH_INCORRECT);  
    $zc_install->isEmpty($_POST['virtual_http_path'], ERROR_TEXT_VIRTUAL_HTTP_ISEMPTY, ERROR_CODE_VIRTUAL_HTTP_ISEMPTY);
    if ($_POST['enable_ssl'] == 'true' || $_POST['enable_ssl_admin'] == 'true') {
      $zc_install->isEmpty($_POST['virtual_https_path'], ERROR_TEXT_VIRTUAL_HTTPS_ISEMPTY, ERROR_CODE_VIRTUAL_HTTPS_ISEMPTY);
      $zc_install->isEmpty($_POST['virtual_https_server'], ERROR_TEXT_VIRTUAL_HTTPS_SERVER_ISEMPTY, ERROR_CODE_VIRTUAL_HTTPS_SERVER_ISEMPTY);
    }

    if (!$zc_install->fatal_error) {
      header('location: index.php?main_page=phpbb_setup&language=' . $language . '&physical_path='.$_POST['physical_path'].'&virtual_http_path='.$_POST['virtual_http_path'].'&virtual_https_path='.$_POST['virtual_https_path'].'&virtual_https_server='.$_POST['virtual_https_server'].'&enable_ssl='.$_POST['enable_ssl'].'&enable_ssl_admin='.$_POST['enable_ssl_admin'].'&sql_cache='.$_GET['sql_cache'].'&is_upgrade='.$_GET['is_upgrade']);
    exit;
    }
  }
?>