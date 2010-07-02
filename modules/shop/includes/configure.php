<?php
//
// +----------------------------------------------------------------------+
// |Zen Cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2004 The Zen Cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                               |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the Zen Cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
//

//IMAGINACOLOMBIA
global $xoopsOption;

$xoopsOption=array("nocommon" => "1");

require '../../mainfile.php';
//IMAGINACOLOMBIA
  // Define the webserver and path parameters
  // Main webserver: eg, http://localhost - should not be empty for productive servers
  define('HTTP_SERVER', "http://".$_SERVER["HTTP_HOST"]);
  // Secure webserver: eg, https://localhost - should not be empty for productive servers
  define('HTTPS_SERVER', str_replace('http','https',HTTP_SERVER)); // eg, https://localhost 
  // secure webserver for checkout procedure?
  define('ENABLE_SSL', 'false');
  define('NXOOPS_URL',str_replace(HTTP_SERVER,'',XOOPS_URL));

// NOTE: be sure to leave the trailing '/' at the end of these lines if you make changes!
// * DIR_WS_* = Webserver directories (virtual/URL)
  // these paths are relative to top of your webspace ... (ie: under the public_html or httpdocs folder)
  define('DIR_WS_CATALOG', NXOOPS_URL.'/modules/shop/');
  define('DIR_WS_HTTPS_CATALOG', NXOOPS_URL.'/modules/shop/');

  define('DIR_WS_IMAGES', 'images/');
  define('DIR_WS_INCLUDES', 'includes/');
  define('DIR_WS_BOXES', DIR_WS_INCLUDES . 'boxes/');
  define('DIR_WS_FUNCTIONS', DIR_WS_INCLUDES . 'functions/');
  define('DIR_WS_CLASSES', DIR_WS_INCLUDES . 'classes/');
  define('DIR_WS_MODULES', DIR_WS_INCLUDES . 'modules/');
  define('DIR_WS_LANGUAGES', DIR_WS_INCLUDES . 'languages/');
  define('DIR_WS_DOWNLOAD_PUBLIC', DIR_WS_CATALOG . 'pub/');
  define('DIR_WS_BLOCKS', DIR_WS_INCLUDES . 'blocks/');
  define('DIR_WS_TEMPLATES', DIR_WS_INCLUDES . 'templates/');

  define('DIR_WS_PHPBB', '/');

// * DIR_FS_* = Filesystem directories (local/physical)
  //the following path is a COMPLETE path to your Zen Cart files. eg: /var/www/vhost/accountname/public_html/store/
  define('DIR_FS_CATALOG', XOOPS_ROOT_PATH.'/modules/shop/');

  define('DIR_FS_DOWNLOAD', DIR_FS_CATALOG . 'download/');
  define('DIR_FS_DOWNLOAD_PUBLIC', DIR_FS_CATALOG . 'pub/');
  define('DIR_WS_UPLOADS', DIR_WS_IMAGES . 'uploads/');
  define('DIR_FS_UPLOADS', DIR_FS_CATALOG . DIR_WS_UPLOADS);
  define('DIR_FS_EMAIL_TEMPLATES', DIR_FS_CATALOG . 'email/');

// define our database connection
  define('DB_TYPE', 'mysql');
  
  define('DB_PREFIX', XOOPS_DB_PREFIX. '_zc');
  define('DB_SERVER', XOOPS_DB_HOST); // eg, localhost - should not be empty
  define('DB_SERVER_USERNAME', XOOPS_DB_USER);
  define('DB_SERVER_PASSWORD', XOOPS_DB_PASS);
  define('DB_DATABASE', XOOPS_DB_NAME);
  define('USE_PCONNECT', 'false'); // use persistent connections?
  define('STORE_SESSIONS', 'db'); // leave empty '' for default handler or set to 'db'

  // The next 2 "defines" are for SQL cache support.
  // For SQL_CACHE_METHOD, you can select from:  none, database, or file
  // If you choose "file", then you need to set the DIR_FS_SQL_CACHE to a directory where your apache 
  // or webserver user has write privileges (chmod 666 or 777). We recommend using the "cache" folder inside the Zen Cart folder
  // ie: /path/to/your/webspace/public_html/zen/cache   -- leave no trailing slash  
  define('SQL_CACHE_METHOD', 'none'); 
  define('DIR_FS_SQL_CACHE', XOOPS_ROOT_PATH. "/modules/shop/cache");
  //IMAGINACOLOMBIA
  unset( $xoopsOption );
  //IMAGINACOLOMBIA
?>