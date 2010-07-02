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
// $Id: store_configure.php 920 2005-01-09 19:04:03Z ajeh $
//
if (!isset($_GET['phpbb_dir'])) $_GET['phpbb_dir'] = '';
$file_contents =
'<'.'?php' . "\n" .
'//' . "\n" .
'// +----------------------------------------------------------------------+' . "\n" .
'// |Zen Cart Open Source E-commerce                                       |' . "\n" .
'// +----------------------------------------------------------------------+' . "\n" .
'// | Copyright (c) 2004 The Zen Cart developers                           |' . "\n" .
'// |                                                                      |' . "\n" .
'// | http://www.zen-cart.com/index.php                                    |' . "\n" .
'// |                                                                      |' . "\n" .
'// | Portions Copyright (c) 2003 osCommerce                               |' . "\n" .
'// +----------------------------------------------------------------------+' . "\n" .
'// | This source file is subject to version 2.0 of the GPL license,       |' . "\n" .
'// | that is bundled with this package in the file LICENSE, and is        |' . "\n" .
'// | available through the world-wide-web at the following url:           |' . "\n" .
'// | http://www.zen-cart.com/license/2_0.txt.                             |' . "\n" .
'// | If you did not receive a copy of the Zen Cart license and are unable |' . "\n" .
'// | to obtain it through the world-wide-web, please send a note to       |' . "\n" .
'// | license@zen-cart.com so we can mail you a copy immediately.          |' . "\n" .
'// +----------------------------------------------------------------------+' . "\n" .
'//' . "\n" .
'' . "\n" .
'// Define the webserver and path parameters' . "\n" .
'  // Main webserver: eg, http://localhost - should not be empty for productive servers' . "\n" .
'  define(\'HTTP_SERVER\', \'' . $http_server . '\');' . "\n" .
'  // Secure webserver: eg, https://localhost - should not be empty for productive servers' . "\n" .
'  define(\'HTTPS_SERVER\', \'' . $https_server . '\');' . "\n" .
'  // secure webserver for checkout procedure?' . "\n" .
'  define(\'ENABLE_SSL\', \'' . $_GET['enable_ssl'] . '\');' . "\n\n" .
'// NOTE: be sure to leave the trailing \'/\' at the end of these lines if you make changes!' . "\n" .
'// * DIR_WS_* = Webserver directories (virtual/URL)' . "\n" .
'  // these paths are relative to top of your webspace ... (ie: under the public_html or httpdocs folder)' . "\n" .
'  define(\'DIR_WS_CATALOG\', \'' . $http_catalog . '\');' . "\n" .
'  define(\'DIR_WS_HTTPS_CATALOG\', \'' . $https_catalog . '\');' . "\n\n" .
'  define(\'DIR_WS_IMAGES\', \'images/\');' . "\n" .
'  define(\'DIR_WS_INCLUDES\', \'includes/\');' . "\n" .
'  define(\'DIR_WS_BOXES\', DIR_WS_INCLUDES . \'boxes/\');' . "\n" .
'  define(\'DIR_WS_FUNCTIONS\', DIR_WS_INCLUDES . \'functions/\');' . "\n" .
'  define(\'DIR_WS_CLASSES\', DIR_WS_INCLUDES . \'classes/\');' . "\n" .
'  define(\'DIR_WS_MODULES\', DIR_WS_INCLUDES . \'modules/\');' . "\n" .
'  define(\'DIR_WS_LANGUAGES\', DIR_WS_INCLUDES . \'languages/\');' . "\n" .
'  define(\'DIR_WS_DOWNLOAD_PUBLIC\', DIR_WS_CATALOG . \'pub/\');' . "\n" .
'  define(\'DIR_WS_BLOCKS\', DIR_WS_INCLUDES . \'blocks/\');' . "\n" .
'  define(\'DIR_WS_TEMPLATES\', DIR_WS_INCLUDES . \'templates/\');' . "\n\n" .
'  define(\'DIR_WS_PHPBB\', \'' . $_GET['phpbb_dir'] . '/\');' . "\n\n" .
'// * DIR_FS_* = Filesystem directories (local/physical)' . "\n" .
'  //the following path is a COMPLETE path to your Zen Cart files. eg: /var/www/vhost/accountname/public_html/store/' . "\n" .
'  define(\'DIR_FS_CATALOG\', \'' . $_GET['physical_path'] . '/\');' . "\n\n" .
'  define(\'DIR_FS_DOWNLOAD\', DIR_FS_CATALOG . \'download/\');' . "\n" .
'  define(\'DIR_FS_DOWNLOAD_PUBLIC\', DIR_FS_CATALOG . \'pub/\');' . "\n" .
'  define(\'DIR_WS_UPLOADS\', DIR_WS_IMAGES . \'uploads/\');' . "\n" .
'  define(\'DIR_FS_UPLOADS\', DIR_FS_CATALOG . DIR_WS_UPLOADS);' . "\n" .
'  define(\'DIR_FS_EMAIL_TEMPLATES\', DIR_FS_CATALOG . \'email/\');' . "\n\n" .
'// define our database connection' . "\n" .
'  define(\'DB_TYPE\', \'' . $_POST['db_type']. '\');' . "\n" .
'  define(\'DB_PREFIX\', \'' . $_POST['db_prefix']. '\');' . "\n" .
'  define(\'DB_SERVER\', \'' . $_POST['db_host'] . '\'); // eg, localhost - should not be empty' . "\n" .
'  define(\'DB_SERVER_USERNAME\', \'' . $_POST['db_username'] . '\');' . "\n" .
'  define(\'DB_SERVER_PASSWORD\', \'' . $_POST['db_pass'] . '\');' . "\n" .
'  define(\'DB_DATABASE\', \'' . $_POST['db_name'] . '\');' . "\n" .
'  define(\'USE_PCONNECT\', \'false\'); // use persistent connections?' . "\n" .
'  define(\'STORE_SESSIONS\', \'' . $_POST['db_sess'] . '\'); // leave empty \'\' for default handler or set to \'db\'' . "\n\n" .
'  // The next 2 "defines" are for SQL cache support.' . "\n" .
'  // For SQL_CACHE_METHOD, you can select from:  none, database, or file' . "\n" .
'  // If you choose "file", then you need to set the DIR_FS_SQL_CACHE to a directory where your apache ' . "\n" .
'  // or webserver user has write privileges (chmod 666 or 777). We recommend using the "cache" folder inside the Zen Cart folder' . "\n" .
'  // ie: /path/to/your/webspace/public_html/zen/cache   -- leave no trailing slash  ' . "\n" .
'  define(\'SQL_CACHE_METHOD\', \'' . $_POST['cache_type'] . '\'); ' . "\n" .
'  define(\'DIR_FS_SQL_CACHE\', \'' . $_POST['sql_cache_dir'] . '\');' . "\n\n" .
'?'.'>';
?>