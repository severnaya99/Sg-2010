<?php
/**
 * $Id: configure.php 149 2006-01-27 13:31:07Z Michael $
 * osCommerce, Open Source E-Commerce Solutions
 * http://www.oscommerce.com
 * Copyright (c) 2003 osCommerce
 * Released under the GNU General Public License
 * adapted 2005 for xoops by FlinkUX <http://www.flinkux.d>
 * @package xosC
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
**/

// Define the webserver and path parameters
// * DIR_FS_* = Filesystem directories (local/physical)
// * DIR_WS_* = Webserver directories (virtual/URL)
  //Variablen aus mainfile auslesen nicht includieren!
  // Im Bedarfsfall $_SERVER['DOCUMENT_ROOT'] durch den Serverpfad zum mainfile ersetzen
  
  if (! $file = @fopen("../../mainfile.php","r") ) {
	if( ! $file = @fopen("mainfile.php","r"))  die("Error");
  }
  while (!feof($file)) {
  $l="";
  $tt="";
  $buffer = trim(fgets($file, 4096));
  $l=strtoupper($buffer);
  if (substr($l,0,6) == "DEFINE") {
	$l=substr($buffer,8);
	$l=substr($l,0,-2);
	$l=str_replace("'","",$l);
	$l=str_replace("\"","",$l);
	$l=explode(",",$l);
	switch ($l[0]) {
      case "XOOPS_URL":
		$l[1]=ereg_replace(" ","",$l[1]);
        define("OSC_URL",$l[1]);
		break;
	  case "XOOPS_ROOT_PATH":
 		$l[1]=ereg_replace(" ","",$l[1]);
        define("OSC_ROOT_PATH",$l[1]);
		break;
	  }  
    }
 }
 fclose($file);
	
	
	
 define('HTTP_SERVER',OSC_URL.'/modules/osC/'); // eg, http://localhost - should not be empty for productive servers
 define('HTTPS_SERVER', ''); // eg, https://localhost - should not be empty for productive servers
 define('ENABLE_SSL', false); // secure webserver for checkout procedure?
 define('HTTP_COOKIE_DOMAIN', '');
 define('HTTPS_COOKIE_DOMAIN', '');
 define('HTTP_COOKIE_PATH', '');
 define('HTTPS_COOKIE_PATH', '');
 define('DIR_WS_HTTP_CATALOG','');
 define('DIR_WS_HTTPS_CATALOG', '');
 define('DIR_WS_IMAGES', HTTP_SERVER.'images/');
 define('DIR_WS_ICONS', DIR_WS_IMAGES . 'icons/');
 define('DIR_WS_INCLUDES', 'includes/');
 define('DIR_WS_BOXES', DIR_WS_INCLUDES . 'boxes/');
 define('DIR_WS_FUNCTIONS', DIR_WS_INCLUDES . 'functions/');
 define('DIR_WS_CLASSES', DIR_WS_INCLUDES . 'classes/');
 define('DIR_WS_MODULES', DIR_WS_INCLUDES . 'modules/');
 define('DIR_WS_LANGUAGES', DIR_WS_INCLUDES . 'languages/');

 define('DIR_WS_DOWNLOAD_PUBLIC', 'pub/');
 define('DIR_FS_CATALOG',OSC_ROOT_PATH."/modules/osC/");  //dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']));
 define('DIR_FS_DOWNLOAD', DIR_FS_CATALOG . 'download/');
 define('DIR_FS_DOWNLOAD_PUBLIC', DIR_FS_CATALOG . 'pub/');
?>