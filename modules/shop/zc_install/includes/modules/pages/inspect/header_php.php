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
// $Id: header_php.php 1798 2005-08-08 19:16:38Z drbyte $
//


  $zc_install->error = false;
  $zc_install->fatal_error = false;
  $zc_install->error_list = array();

if (!isset($_GET['debug'])  && !zen_not_null($_POST['debug']))  define('ZC_UPG_DEBUG',false);
if (!isset($_GET['debug2']) && !zen_not_null($_POST['debug2'])) define('ZC_UPG_DEBUG2',false);
if (!isset($_GET['debug3']) && !zen_not_null($_POST['debug3'])) define('ZC_UPG_DEBUG3',false);
//////if (isset($_POST['submit']) || isset($_POST['submit'])  ) define('ZC_UPG_DEBUG',false);

$zen_cart_previous_version_installed = false;
if (file_exists('../includes/configure.php')) {
  // read the existing configure.php file(s) to get values and guess whether it looks like a valid prior install
  if (zen_read_config_value('HTTP_SERVER')      == 'http://localhost') $zen_cart_previous_version_installed = 'maybe';
  if (zen_read_config_value('DIR_FS_CATALOG')   == '/var/www/html/') $zen_cart_previous_version_installed = 'maybe';
  if (zen_read_config_value('HTTP_SERVER')      != '' ) $zen_cart_previous_version_installed = true;
  if (zen_read_config_value('DIR_WS_CLASSES')   != '' ) $zen_cart_previous_version_installed = true;
  if (zen_read_config_value('DIR_FS_CATALOG')   != '' ) $zen_cart_previous_version_installed = true;
  if (strpos(zen_read_config_value('DIR_FS_SQL_CACHE'),'/path/to/')>0) $zen_cart_previous_version_installed = false;
  if (zen_read_config_value('DB_DATABASE')      == '' ) $zen_cart_previous_version_installed = false;

   //read the configure.php file and look for hints that it's just a copy of dist-configure.php
   $lines = file('../includes/configure.php');
   foreach ($lines as $line) { 
     if (substr_count($line,'dist-configure.php') > 0) $zen_cart_previous_version_installed = false;
   } //end foreach

   $zdb_type     = zen_read_config_value('DB_TYPE');
   $zdb_prefix   = zen_read_config_value('DB_PREFIX');
   $zdb_server   = zen_read_config_value('DB_SERVER');
   $zdb_user     = zen_read_config_value('DB_SERVER_USERNAME');
   $zdb_pwd      = zen_read_config_value('DB_SERVER_PASSWORD');
   $zdb_name     = zen_read_config_value('DB_DATABASE');
   $zdb_sql_cache= zen_read_config_value('DIR_FS_SQL_CACHE');
     if (strpos($zdb_sql_cache,'/path/to/')>0) $zdb_sql_cache=''; // /path/to/ comes from dist-configure.php. Invalid, thus make null.

if (ZC_UPG_DEBUG==true) {
echo $zdb_type . '<br>';
echo $zdb_prefix . '<br>';
echo $zdb_server . '<br>';
echo $zdb_user . '<br>';
echo $zdb_sql_cache . '<br>';
}
  if ($zdb_type!='' && $zdb_name !='') {
   // now check database connectivity
   require('../includes/' . 'classes/db/' . $zdb_type . '/query_factory.php');
   $zc_install->functionExists($zdb_type, '', '');
   $zc_install->dbConnect($zdb_type, $zdb_server, $zdb_name, $zdb_user, $zdb_pwd, '', '');
   if ($zc_install->error == false) $zen_cart_database_connect_OK = true;
   if ($zc_install->error == true) $zen_cart_previous_version_installed = false;
   //reset error-check class after connection attempt
   $zc_install->error = false;
   $zc_install->fatal_error = false;
   $zc_install->error_list = array();
  } //endif check for db_type and db_name defined

if ($zen_cart_database_connect_OK) { #1
//open database connection to run queries against it
  $db_test = new queryFactory;
  $db_test->Connect($zdb_server, $zdb_user, $zdb_pwd, $zdb_name) or $zen_cart_database_connect_OK = false;

if ($zen_cart_database_connect_OK) { //#2  This check is done again just in case connect fails on previous line
//set database table prefix
define('DB_PREFIX',$zdb_prefix);

// Check to see if any Zen Cart tables exist
    $sql = "SHOW TABLES like '".DB_PREFIX."configuration'";
    $tables = $db_test->Execute($sql);
     if (ZC_UPG_DEBUG==true) echo 'ZEN-Configuration (should be 1) = '. $tables->RecordCount() .'<br>';
     if ($tables->RecordCount() > 0) {
        $zdb_configuration_table_found = true;
       }

if ($zdb_configuration_table_found) { // now check for database version levels
// Check to see if this is v1.0.3/v1.0.4 ... ie, is it really Zen Cart?
   $sql = "select * from " . DB_PREFIX . "configuration where configuration_key = 'STORE_COUNTRY' and use_function='zen_get_country_name'";
    $result = $db_test->Execute($sql);
    if (ZC_UPG_DEBUG==true) echo 'v103-recordcount should be 1:   '.$result->RecordCount().'<br>';
    if ($result->RecordCount() > 0) {
      $got_v1_0_3 = true;
      $zdb_ver = '1.0.x';
    }
// first test to see if they have run the 1.1 upgrade script   (v1.0.4 to v.1.1.1)
    $tables = $db_test->Execute("SHOW TABLES like '" . DB_PREFIX . "files_uploaded'");
     if (ZC_UPG_DEBUG==true) echo '104-Table (should be 1) = '. $tables->RecordCount() .'<br>';
     if ($tables->RecordCount() > 0) {
        $got_v1_1_0 = true;
        $zdb_ver = '1.1.0';
    }
// now test to see if they have run the 1.1 -> 1.1.1 bugfix update
    $sql = "select * from " . DB_PREFIX . "admin where admin_name = 'demo'";
    $result = $db_test->Execute($sql);
    if (ZC_UPG_DEBUG==true) echo 'v111-recordcount (should be 1) = '.$result->RecordCount().'<br>';
    if ($result->RecordCount() > 0) {
      $got_v1_1_1 = true;
    }
  //2nd check:
    $sql = "SELECT count(*) as count FROM " . DB_PREFIX . "configuration WHERE configuration_key = 'CATEGORIES_COUNT_ZERO'";
    $result = $db_test->Execute($sql);
    if (ZC_UPG_DEBUG==true) echo 'v111-count (should be 1) =' . $result->fields['count'] .'<br>';
  if ($result->fields['count'] > '0') {
      $got_v1_1_1 = true;
    }
  if ($got_v1_1_1 == true) $zdb_ver = '1.1.1';

// now test to see if they have run the 1.1.1 -> 1.1.2 update
    $sql = "SELECT configuration_value FROM " . DB_PREFIX . "configuration WHERE configuration_key = 'MODULE_PAYMENT_CC_STATUS'";
    $result = $db_test->Execute($sql);
    if ($result->fields['configuration_value'] == 'True') { $ccmodule_installed = 'true';  }
    $sql = "SELECT count(*) as count FROM " . DB_PREFIX . "configuration WHERE configuration_key = 'MODULE_PAYMENT_CC_STORE_NUMBER'";
    $result = $db_test->Execute($sql);
    if (ZC_UPG_DEBUG==true) echo 'v112-count=' . $result->fields['count'] .'<br>';
    if ($result->fields['count'] < 1 && $ccmodule_installed=='true') {
      $got_v1_1_2 = false;
    } else {
      $got_v1_1_2 = true;
      $zdb_ver = '1.1.2 or 1.1.3';
    }

// now test to see if they have run the 1.1.2 -> 1.1.4 update
    $sql = "show fields from " . DB_PREFIX . "customers_basket_attributes";   // could we use "describe" as well ?
    $result = $db_test->Execute($sql);
      while (!$result->EOF) {
      if (ZC_UPG_DEBUG==true) echo "114-fields (need products_options_sort_order) =" . $result->fields['Field'] . '<br>';
       if  ($result->fields['Field'] == 'products_options_sort_order') {
         if ($result->fields['Type'] == 'text')  {
           $got_v1_1_4 = true;
           $zdb_ver = '1.1.4';
         }
       }
        $result->MoveNext();
      }

// now test to see if they have run the 1.1.4 -> PATCH1 update
    $sql = "select configuration_title from " . DB_PREFIX . "configuration where configuration_key='SHIPPING_BOX_WEIGHT'";   // could use "describe" as well ?
    $result = $db_test->Execute($sql);
       while (!$result->EOF) {
       if (ZC_UPG_DEBUG==true) echo "114patch-fields=" . $result->fields['configuration_title'] . '<br>';
         if  ($result->fields['configuration_title'] == 'Package Tare Small to Medium - added percentage:weight') {
            $got_v1_1_4_patch1 = true;
            $zdb_ver = '1.1.4-patch1';
         }
         $result->MoveNext();
       }

// now test to see if the v1.1.4->v1.2.0 upgrade has been completed
  //1st check for v1.20
    $sql = "select configuration_title from " . DB_PREFIX . "configuration where configuration_key='TUTORIAL_STATUS'";
    $result = $db_test->Execute($sql);
    $got_v1_2_0a = true;  // set true -- if value found (but should be deleted), then set to false.
      while (!$result->EOF) {
       if (ZC_UPG_DEBUG==true) echo "120a-configtitle=" . $result->fields['configuration_title'] . '<br>';
       if  ($result->fields['configuration_title'] != '') {
          $got_v1_2_0a = false;
       }
       $result->MoveNext();
     }

  //2nd check for v1.20
    $tables = $db_test->Execute("SHOW TABLES like '" . DB_PREFIX . "product_type_layout'");
     if (ZC_UPG_DEBUG==true) echo '120b-Table= '. $tables->RecordCount() .'<br>';
     if ($tables->RecordCount() > 0) {
       $got_v1_2_0b = true;
      }

  //3rd check for v1.20
    $sql = "select configuration_group_title, configuration_group_description from " . DB_PREFIX . "configuration_group WHERE configuration_group_id = '13'";
    $result = $db_test->Execute($sql);
     while (!$result->EOF) {
       if (ZC_UPG_DEBUG==true) echo "120c-cfggroup13=attrb ==" . $result->fields['configuration_group_title'] . '<br>';
       if  ($result->fields['configuration_group_title'] == 'Attribute Settings') {
           $got_v1_2_0c = true;
       }
       $result->MoveNext();
     }
  //4th check for v1.20
    $sql = "show fields from " . DB_PREFIX . "categories";
    $result = $db_test->Execute($sql);
    while (!$result->EOF) {
      if (ZC_UPG_DEBUG==true) echo "120d-fields=" . $result->fields['Field'] . '<br>';
      if  ($result->fields['Field'] == 'categories_status') {
        if ($result->fields['Type'] == 'tinyint(1)')  {
             $got_v1_2_0d = true;
        }
      }
      $result->MoveNext();
    }
  //5th check for v1.20
    $sql = "show fields from " . DB_PREFIX . "customers";
    $result = $db_test->Execute($sql);
    while (!$result->EOF) {
      if (ZC_UPG_DEBUG==true) echo "120e-fields=" . $result->fields['Field'] . '<br>';
      if  ($result->fields['Field'] == 'customers_nick' || $result->fields['Field'] == 'customers_group_pricing' || $result->fields['Field'] == 'customers_email_format') {
          $got_v1_2_0e = true;
      }
      $result->MoveNext();
    }
  //6th check for v1.20
    $sql = "show fields from " . DB_PREFIX . "products";
    $result = $db_test->Execute($sql);
    while (!$result->EOF) {
    if (ZC_UPG_DEBUG==true) echo "120f-fields=" . $result->fields['Field'] . '<br>';
       if  ($result->fields['Field'] == 'master_categories_id') {
          $got_v1_2_0f = true;
       }
      $result->MoveNext();
    }
  //7th check for v1.2.0
    $tables = $db_test->Execute("SHOW TABLES like '" . DB_PREFIX . "project_version'");
     if ($tables->RecordCount() > 0) {
    $sql = "SELECT project_version_major, project_version_minor from " . DB_PREFIX . "project_version WHERE project_version_key = 'Zen-Cart Main'";
    $result = $db_test->Execute($sql);
    if (ZC_UPG_DEBUG==true) echo "120g-project_version=" . $result->fields['project_version_major'] . '.' . $result->fields['project_version_minor'] . '<br>';
    if ($result->fields['project_version_major']=='1' && $result->fields['project_version_minor']=='2') $got_v1_2_0g = true;
    } //end project_version

  // evaluate all 6 checks
   if ($got_v1_2_0a && $got_v1_2_0b && $got_v1_2_0c && $got_v1_2_0d && $got_v1_2_0e && $got_v1_2_0f) {
     $got_v1_2_0 = true;
     $zdb_ver = '1.2.0';
     if (ZC_UPG_DEBUG==true) echo 'Got 1.2.0<br>';
   }

// now test to see if the v1.2.0->v1.2.1 upgrade has been completed
  $tables = $db_test->Execute("SHOW TABLES like '" . DB_PREFIX . "project_version'");
  if ($tables->RecordCount() > 0) {
  //1st check for v1.2.1
  $sql = "select configuration_title from " . DB_PREFIX . "configuration where configuration_key='DISPLAY_PRICE_WITH_TAX_ADMIN'";
  $result = $db_test->Execute($sql);
  if (ZC_UPG_DEBUG==true) echo "121a-configkey_check=" . $result->fields['configuration_title'] . '<br>';
  if  ($result->RecordCount()>0) $got_v1_2_1a = true;

  //2nd check for v1.2.1
  $tables = $db_test->Execute("SHOW TABLES like '" . DB_PREFIX . "orders_session_info'");
  if (ZC_UPG_DEBUG==true) echo '121b-Table= '. $tables->fields['Tables_in_' . DB_DATABASE . ' (' . DB_PREFIX . 'orders_session_info)'] . ' ' . $tables->RecordCount() . '<br>';
  if ($tables->RecordCount() > 0) {
    $got_v1_2_1b = true;
  }
  //3rd check for v1.2.1
  $sql = "show fields from " . DB_PREFIX . "products_discount_quantity";
  $result = $db_test->Execute($sql);
  while (!$result->EOF) {
    if (ZC_UPG_DEBUG==true) echo "121c-fields-'discount_qty'->FLOAT=" . $result->fields['Field'] . '->' . $result->fields['Type'] . '<br>';
    if  ($result->fields['Field'] == 'discount_qty') {
      if (strtoupper($result->fields['Type']) == 'FLOAT')  {
        $got_v1_2_1c = true;
      }
    }
  $result->MoveNext();
  }
  //4th check for v1.2.1 - part a
  $sql = "SELECT project_version_major, project_version_minor from " . DB_PREFIX . "project_version WHERE project_version_key = 'Zen-Cart Main'";
  $result = $db_test->Execute($sql);
  if (ZC_UPG_DEBUG==true) echo "121d-project_versionZC=" . $result->fields['project_version_major'] . '.' . $result->fields['project_version_minor'] . '<br>';
  if  ($result->fields['project_version_major']=='1' && $result->fields['project_version_minor']=='2.1') $got_v1_2_1d = true;

  //4th check for v1.2.1 -- part b
  $sql = "SELECT project_version_major, project_version_minor from " . DB_PREFIX . "project_version WHERE project_version_key = 'Zen-Cart Database'";
  $result = $db_test->Execute($sql);
  if (ZC_UPG_DEBUG==true) echo "121e-project_versionDB=" . $result->fields['project_version_major'] . '.' . $result->fields['project_version_minor'] . '<br>';
  if  ($result->fields['project_version_major']=='1' && $result->fields['project_version_minor']=='2.1') $got_v1_2_1e = true;
  //check alternate setting for erroneous code in initial 1.2.0 release (it was left at 1+1.2):
  if  ($result->fields['project_version_major']=='1' && $result->fields['project_version_minor']=='1.2') $got_v1_2_1e = true;
    } //endif project_version

  if (ZC_UPG_DEBUG==true) {
    echo '1.2.1a='.$got_v1_2_1a.'<br>';
    echo '1.2.1b='.$got_v1_2_1b.'<br>';
    echo '1.2.1c='.$got_v1_2_1c.'<br>';
    echo '1.2.1d='.$got_v1_2_1d.'<br>';
    echo '1.2.1e='.$got_v1_2_1e.'<br>';
  }
  // evaluate all 5 checks
  if ($got_v1_2_1a && $got_v1_2_1b && $got_v1_2_1c) {
    $got_v1_2_1 = true;
    $zdb_ver = '1.2.1';
    if (ZC_UPG_DEBUG==true) echo '<br>Got 1.2.1<br>';
  }

// 1.2.2 checks
  //1st check for v1.2.2
  $sql = "select configuration_title from " . DB_PREFIX . "configuration where configuration_key='SEND_EXTRA_ORDER_EMAILS_TO'";
  $result = $db_test->Execute($sql);
  if (ZC_UPG_DEBUG==true) echo "122a-configkey_check=" . $result->fields['configuration_title'] . '<br>';
  if  ($result->fields['configuration_title'] == 'Send Copy of Order Confirmation Emails To') {
    $got_v1_2_2a = true;
    $zdb_ver = '1.2.2';
    if (ZC_UPG_DEBUG==true) echo '<br>Got 1.2.2<br>';
  }
// 1.2.3 checks
  //1st check for v1.2.3
  $sql = "select configuration_title from " . DB_PREFIX . "configuration where configuration_key='DEFAULT_ZERO_BALANCE_ORDERS_STATUS_ID'";
  $result = $db_test->Execute($sql);
  if (ZC_UPG_DEBUG==true) echo "123a-configkey_check=" . $result->fields['configuration_title'] . '<br>';
  if  ($result->fields['configuration_title'] == 'Default Order Status For Zero Balance Orders') {
    $got_v1_2_3 = true;
    $zdb_ver = '1.2.3';
    if (ZC_UPG_DEBUG==true) echo '<br>Got 1.2.3<br>';
  }

// 1.2.4 checks
  //1st check for v1.2.4
  $sql = "select configuration_title from " . DB_PREFIX . "configuration where configuration_key='PRODUCTS_MANUFACTURERS_STATUS'";
  $result = $db_test->Execute($sql);
  if (ZC_UPG_DEBUG==true) echo "124a-configkey_check=" . $result->fields['configuration_title'] . '<br>';
  if  ($result->fields['configuration_title'] == 'Manufacturers List - Verify Product Exist') {
    $got_v1_2_4 = true;
    $zdb_ver = '1.2.4';
    if (ZC_UPG_DEBUG==true) echo '<br>Got 1.2.4<br>';
  }

// 1.2.5 checks
  //1st check for v1.2.5
  $sql = "select configuration_title from " . DB_PREFIX . "configuration where configuration_key='SESSION_IP_TO_HOST_ADDRESS'";
  $result = $db_test->Execute($sql);
  if (ZC_UPG_DEBUG==true) echo "125a-configkey_check=" . $result->fields['configuration_title'] . '<br>';
  if  ($result->fields['configuration_title'] == 'IP to Host Conversion Status') {
    $got_v1_2_5a = true;
  }
  $sql = "select configuration_title from " . DB_PREFIX . "configuration where configuration_key='MAX_DISPLAY_PRODUCTS_TO_CATEGORIES_COLUMNS'";
  $result = $db_test->Execute($sql);
  if (ZC_UPG_DEBUG==true) echo "125b-configkey_check=" . $result->fields['configuration_title'] . '<br>';
  if  ($result->fields['configuration_title'] == 'Maximum Display Columns Products to Multiple Categories Manager') {
    $got_v1_2_5b = true;
  }
  //3rd check for v1.2.5
    $tables = $db_test->Execute("SHOW TABLES like '" . DB_PREFIX . "meta_tags_products_description'");
     if (ZC_UPG_DEBUG==true) echo '125c-Table= '. $tables->RecordCount() .'<br>';
     if ($tables->RecordCount() > 0) {
       $got_v1_2_5c = true;
      }
  //4th check for v1.2.5
  $sql = "show fields from " . DB_PREFIX . "whos_online";
  $result = $db_test->Execute($sql);
  while (!$result->EOF) {
    if (ZC_UPG_DEBUG==true) echo "125d-fields-'user_agent'->VARCHAR=" . $result->fields['Field'] . '->' . $result->fields['Type'] . '<br>';
    if  ($result->fields['Field'] == 'user_agent') {
      if (strstr(strtoupper($result->fields['Type']),'VARCHAR('))  {
        $got_v1_2_5d = true;
      }
    }
  $result->MoveNext();
  }

  if (ZC_UPG_DEBUG==true) {
    echo '1.2.5a='.$got_v1_2_5a.'<br>';
    echo '1.2.5b='.$got_v1_2_5b.'<br>';
    echo '1.2.5c='.$got_v1_2_5c.'<br>';
    echo '1.2.5d='.$got_v1_2_5d.'<br>';
  }
  // evaluate all 4 1.2.5 checks
  if ($got_v1_2_5a && $got_v1_2_5b && $got_v1_2_5c && $got_v1_2_5d) {
    $got_v1_2_5 = true;
    $zdb_ver = '1.2.5';
    if (ZC_UPG_DEBUG==true) echo '<br>Got 1.2.5<br>';
  }

// 1.2.6 checks
  //check for v1.2.6
  $sql = "select configuration_title from " . DB_PREFIX . "configuration where configuration_key='CATEGORIES_TABS_STATUS'";
  $result = $db_test->Execute($sql);
  if (ZC_UPG_DEBUG==true) echo "126-configkey_check=" . $result->fields['configuration_title'] . '<br>';
  if  ($result->fields['configuration_title'] == 'Categories-Tabs Menu ON/OFF') {
    $got_v1_2_6 = true;
    $zdb_ver = '1.2.6';
    if (ZC_UPG_DEBUG==true) echo '<br>Got 1.2.6<br>';
  }



   ////// END CHECK OF DATABASE TO DETERMINE VERSION LEVEL
   }//endif ($zdb_configuration_table_found) 
  } //endif $zen_cart_database_connect_OK #2
 } //endif $zen_cart_database_connect_OK
} else {
   $zen_cart_previous_version_installed = false;
} //endif exists configure.php
if ($check_count > 1) $zen_cart_version_already_installed = false; // if more than one test failed, it must be a fresh install

if ($zen_cart_previous_version_installed == true && $zen_cart_database_connect_OK == true) {
   $is_upgradable = true;

   if ($zdb_configuration_table_found) {
      $zdb_version_message = sprintf(LABEL_PREVIOUS_VERSION_NUMBER, $zdb_ver);
   } else {
      $zdb_version_message = LABEL_PREVIOUS_VERSION_NUMBER_UNKNOWN;
   }
}
// Check to see whether we should offer the option to upgrade "database only", rather than rebuild configure.php files too.
// For v1.2.1, the only check we need is whether we're at v1.2.0 already or not.
// Future versions may require more extensive checking if the core configure.php files change.
// NOTE: This flag is also used to determine whether or not we prevent moving to next screen if the configure.php files are not writable
if ($zdb_ver >= '1.2.0') {
  $zen_cart_allow_database_upgrade=true;
}

///////////////////////////////////
// Run System Pre-Flight Check:
///////////////////////////////////
$status_check = array();
$status_check2 = array();
//Structure is this:
//$status_check[] = array('Importance' => '', 'Title' => '', 'Status' => '', 'Class' => '', 'HelpURL' =>'', 'HelpLabel'=>'');

//WebServer OS as reported by env check
$status_check[] = array('Importance' => 'Info', 'Title' => LABEL_WEBSERVER, 'Status' => getenv("SERVER_SOFTWARE"), 'Class' => 'NA', 'HelpURL' =>'', 'HelpLabel'=>'');

//General info
$status_check[] = array('Importance' => 'Info', 'Title' => LABEL_HTTP_HOST, 'Status' => $_SERVER['HTTP_HOST'], 'Class' => 'NA', 'HelpURL' =>'', 'HelpLabel'=>'');
$path_trans=$_SERVER['PATH_TRANSLATED'];
$path_trans_display=$_SERVER['PATH_TRANSLATED'];
if (empty($path_trans)) {
  $path_trans_display = $_SERVER['SCRIPT_FILENAME'] . '(SCRIPT_FILENAME)';
  $path_trans = $_SERVER['SCRIPT_FILENAME'];
}
$status_check[] = array('Importance' => 'Info', 'Title' => LABEL_PATH_TRANLSATED, 'Status' => $path_trans_display, 'Class' => 'NA', 'HelpURL' =>'', 'HelpLabel'=>'');

// get free space on disk
$disk_freespaceGB=round(diskfreespace($path_trans)/1024/1024/1024,2);
$disk_freespaceMB=round(diskfreespace($path_trans)/1024/1024,2);
$status_check[] = array('Importance' => 'Info', 'Title' => LABEL_DISK_FREE_SPACE, 'Status' => $disk_freespaceGB . ' GB' . (($disk_freespaceGB==0) ? '(can be ignored)' : ''), 'Class' => ($disk_freespaceMB<1000)?'FAIL':'NA', 'HelpURL' =>'', 'HelpLabel'=>'');

//PHP mode (module, cgi, etc)
$status_check[] = array('Importance' => 'Info', 'Title' => LABEL_PHP_API_MODE, 'Status' => @php_sapi_name(), 'Class' => (@php_sapi_name()=='cgi' ? 'WARN' : 'NA'), 'HelpURL' =>ERROR_CODE_PHP_AS_CGI, 'HelpLabel'=>ERROR_TEXT_PHP_AS_CGI);

//Set Time Limit setting
$set_time_limit = ini_get("max_execution_time");
$status_check[] = array('Importance' => 'Info', 'Title' => LABEL_SET_TIME_LIMIT, 'Status' => $set_time_limit, 'Class' => 'NA', 'HelpURL' =>'', 'HelpLabel'=>'');

//get list of disabled functions
$disabled_funcs = ini_get("disable_functions");
if (zen_not_null($disabled_funcs)) $status_check[] = array('Importance' => 'Recommended', 'Title' => LABEL_DISABLED_FUNCTIONS, 'Status' => $disabled_funcs, 'Class' => (@substr_count($disabled_funcs,'set_time_limit') ? 'WARN' : 'NA'), 'HelpURL' =>ERROR_CODE_DISABLE_FUNCTIONS, ERROR_TEXT_DISABLE_FUNCTIONS);

// Check Register Globals
$register_globals = ini_get("register_globals");
if ($register_globals == '' || $register_globals =='0' || strtoupper($register_globals) =='OFF') {
  $register_globals = OFF; // Having register globals "off" is more secure
  $this_class='OK';
} else {
  $register_globals = "<span class='errors'>".ON.'</span>';
  $this_class='WARN';
}
$status_check[] = array('Importance' => 'Info', 'Title' => LABEL_REGISTER_GLOBALS, 'Status' => $register_globals, 'Class' => $this_class, 'HelpURL' =>ERROR_CODE_REGISTER_GLOBALS_ON, 'HelpLabel'=>ERROR_TEXT_REGISTER_GLOBALS_ON);

//Check MySQL version
$mysql_support = (function_exists( 'mysql_connect' )) ? ON : OFF;
$mysql_version = (function_exists('mysql_get_server_info')) ? @mysql_get_server_info() : UNKNOWN;
$mysql_version = ($mysql_version == '') ? UNKNOWN : $mysql_version ;
//if (is_object($db_test)) $mysql_qry=$db_test->get_server_info();
$mysql_ver_class = ($mysql_version<'3.23.00' || $mysql_version > '5.0')?'FAIL': 'OK';
$mysql_ver_class = ($mysql_version == UNKNOWN) ? 'WARN' : $mysql_ver_class;

$status_check[] = array('Importance' => 'Critical', 'Title' => LABEL_MYSQL_AVAILABLE, 'Status' => $mysql_support, 'Class' => ($mysql_support==ON) ? 'OK' : 'FAIL', 'HelpURL' =>ERROR_CODE_DB_NOTSUPPORTED, 'HelpLabel'=>ERROR_TEXT_DB_NOTSUPPORTED);
$status_check[] = array('Importance' => 'Info', 'Title' => LABEL_MYSQL_VER, 'Status' => $mysql_version, 'Class' => $mysql_ver_class, 'HelpURL' =>ERROR_CODE_DB_VER_UNKNOWN, 'HelpLabel'=>ERROR_TEXT_DB_VER_UNKNOWN);

//DB Privileges
if ($zen_cart_database_connect_OK) {
  $zdb_privs_list = zen_check_database_privs('','',true);
  $privs_array = explode('|||',$zdb_privs_list);
  $db_priv_ok = $privs_array[0];
  $zdb_privs =  $privs_array[1];
  if (ZC_UPG_DEBUG==true) echo 'privs_list_to_parse='.$db_priv_ok.'|||'.$zdb_privs;
//  $granted_db = str_replace('`','',substr($zdb_privs,strpos($zdb_privs,' ON ')+4) );
//  $db_priv_ok = ($granted_db == '*.*' || $granted_db==DB_DATABASE.'.*' || $granted_db==DB_DATABASE.'.'.$table) ? true : false;
//  $zdb_privs = substr($zdb_privs,0,strpos($zdb_privs,' ON ')); //remove the "ON..." portion
  $zdb_privs_class='FAIL';
  $privs_matched=0;
  if (substr_count($zdb_privs,'ALL PRIVILEGES')>0) $zdb_privs_class='OK';
  foreach(array('SELECT','INSERT','UPDATE','DELETE','CREATE','ALTER','INDEX','DROP') as $value) {
    if (in_array($value,explode(', ',$zdb_privs))) {
      $privs_matched++;
      $privs_found_text .= $value .', ';
    }
  }
  if ($privs_matched==8 && $db_priv_ok) $zdb_privs_class='OK';
  if (substr_count($zdb_privs,'USAGE') >0) $zdb_privs_class='NA';
  if (!zen_not_null($zdb_privs)) {
    $privs_found_text = UNKNOWN;
    $zdb_privs_class='NA';
  }
  if ($privs_found_text=='') $privs_found_text = $zdb_privs;
  if ($zdb_privs == 'Not Checked') {
    $privs_found_text = $zdb_privs;
    $zdb_privs_class='NA';
  }
  $status_check[] = array('Importance' => 'Critical', 'Title' => LABEL_DB_PRIVS, 'Status' => str_replace(',  ',' ',$privs_found_text.' '), 'Class' => $zdb_privs_class, 'HelpURL' =>ERROR_CODE_DB_PRIVS, 'HelpLabel'=>ERROR_TEXT_DB_PRIVS);
}

//PHP Version Check
if (phpversion()=="4.1.2") {
   $php_ver = "<span class='errors'>".phpversion().' {'. SHOULD_UPGRADE . '}</span>';
   $zc_install->error = true;
   $err_text = ERROR_TEXT_4_1_2;
   $err_code = ERROR_CODE_4_1_2;
   $this_class = 'WARN';
 } elseif (phpversion() < "4.1.2") {
   $php_ver = "<span class='errors'>".phpversion().' {'. MUST_UPGRADE . '}</span>';
   $zc_install->error = true;
   $zc_install->fatal_error = true;
   $err_text = ERROR_TEXT_PHP_VERSION;
   $err_code = ERROR_CODE_PHP_VERSION;
   $this_class = 'FAIL';
 } else {
   $php_ver = phpversion();
   $this_class = 'OK';
 }
$status_check[] = array('Importance' => 'Critical', 'Title' => LABEL_PHP_VER, 'Status' => $php_ver, 'Class' => $this_class, 'HelpURL' =>$err_code, 'HelpLabel'=>$err_text);

// SAFE MODE check
$safe_mode = (ini_get("safe_mode")) ? "<span class='errors'>" . ON . '</span>' : OFF;
$status_check[] = array('Importance' => 'Critical', 'Title' => LABEL_SAFE_MODE, 'Status' => $safe_mode, 'Class' => ($safe_mode==OFF) ? 'OK' : 'FAIL', 'HelpURL' =>ERROR_CODE_SAFE_MODE_ON, 'HelpLabel'=>ERROR_TEXT_SAFE_MODE_ON);

//OpenBaseDir setting
$open_basedir = ini_get("open_basedir");
$status_check[] = array('Importance' => 'Recommended', 'Title' => LABEL_OPEN_BASEDIR, 'Status' => $open_basedir, 'Class' => (zen_not_null($open_basedir))?'WARN':'OK', 'HelpURL' =>'', 'HelpLabel'=>'Could have problems uploading files or doing backups');

//PHP support for Sessions check
$php_ext_sessions = (@extension_loaded('session')) ? ON : OFF;
$status_check[] = array('Importance' => 'Critical', 'Title' => LABEL_PHP_EXT_SESSIONS, 'Status' => $php_ext_sessions, 'Class' => ($php_ext_sessions==ON) ? 'OK' : 'FAIL', 'HelpURL' =>'', 'HelpLabel'=>'Session Support required in PHP.');

//session.auto_start check
$php_session_auto = (ini_get('session.auto_start')) ? ON : OFF;
$status_check[] = array('Importance' => 'Recommended', 'Title' => LABEL_PHP_SESSION_AUTOSTART, 'Status' => $php_session_auto, 'Class' => ($php_session_auto==ON)?'WARN':'OK', 'HelpURL' =>ERROR_CODE_PHP_SESSION_AUTOSTART, 'HelpLabel'=>ERROR_TEXT_PHP_SESSION_AUTOSTART);

//session.trans_sid check
$php_session_trans_sid = (ini_get('session.use_trans_sid')) ? ON : OFF;
$status_check[] = array('Importance' => 'Recommended', 'Title' => LABEL_PHP_SESSION_TRANS_SID, 'Status' => $php_session_trans_sid, 'Class' => ($php_session_trans_sid==ON)?'WARN':'OK', 'HelpURL' =>ERROR_CODE_PHP_SESSION_TRANS_SID, 'HelpLabel'=>ERROR_TEXT_PHP_SESSION_TRANS_SID);

// Check for 'tmp' folder for file-based caching. This checks numerous places, and tests actual writing of a file to those folders.
  $script_filename = $_SERVER['PATH_TRANSLATED'];
  if (empty($script_filename)) {
    $script_filename = $_SERVER['SCRIPT_FILENAME'];
  }

  $script_filename = str_replace('\\', '/', $script_filename);
  $script_filename = str_replace('//', '/', $script_filename);

  $dir_fs_www_root_array = explode('/', dirname($script_filename));
  $dir_fs_www_root = array();
  for ($i=0, $n=sizeof($dir_fs_www_root_array)-1; $i<$n; $i++) {
    $dir_fs_www_root[] = $dir_fs_www_root_array[$i];
  }
  $dir_fs_www_root = implode('/', $dir_fs_www_root);

$session_save_path = (@ini_get('session.save_path')) ? ini_get('session.save_path') : UNKNOWN;
$session_save_path_writable = (@is_writable( $session_save_path )) ? WRITABLE : UNWRITABLE ;
$status_check[] = array('Importance' => 'Recommended', 'Title' => LABEL_PHP_EXT_SAVE_PATH, 'Status' => $session_save_path . '&nbsp;&nbsp;-->' . $session_save_path_writable , 'Class' => ($session_save_path_writable ==WRITABLE) ? 'OK' : 'WARN', 'HelpURL' =>ERROR_CODE_SESSION_SAVE_PATH, 'HelpLabel'=>ERROR_TEXT_SESSION_SAVE_PATH);

//check various options for cache storage:
//foreach (array(@ini_get("session.save_path"), '/tmp', '/var/lib/php/session', $dir_fs_www_root . '/tmp', $dir_fs_www_root . '/cache', 'c:/php/tmp', 'c:/php/sessiondata', 'c:/windows/temp', 'c:/temp') as $cache_test) {
foreach (array($dir_fs_www_root . '/cache') as $cache_test) {
  if (is_dir($cache_test) && @is_writable($cache_test) ) {  // does it exist?  Is is writable?
       $filename = $cache_test . '/zentest.tst';
       $fp = @fopen($filename,"w");  // if this fails, then the file is not really writable
       @fwrite($fp,'cache test');
       @fclose($fp);
       $fp = @fopen($filename,"rb");  // read it back to be sure it's ok
       $contents = @fread($fp, filesize($filename));
       @fclose($fp);
       @unlink($filename);
       if ($contents == 'cache test') {
           $suggested_cache=$cache_test;  // if contents were read ok, then path is OK
           break;
       }
   }
}
$sugg_cache_class = 'OK'; //default
if ($suggested_cache == '') {
  $suggested_cache = $dir_fs_www_root . '/cache';  //suggest to use catalog path if no alternative was found usable
  $sugg_cache_class = 'WARN';
  $sugg_cache_code = ERROR_CODE_CACHE_CUSTOM_NEEDED;
  $sugg_cache_text = '<br />'.ERROR_TEXT_CACHE_CUSTOM_NEEDED; // the <br> tag is for line-wrap for a long message displayed
 } elseif (!is_dir($suggested_cache)) {
  $sugg_cache_code = ERROR_CODE_CACHE_DIR_ISDIR;
  $sugg_cache_text = ERROR_TEXT_CACHE_DIR_ISDIR;
  $sugg_cache_class = 'WARN';
 } elseif (!@is_writable($suggested_cache)) {
  $sugg_cache_code = ERROR_CODE_CACHE_DIR_ISWRITABLE;
  $sugg_cache_text = ERROR_TEXT_CACHE_DIR_ISWRITABLE;
  $sugg_cache_class = 'WARN';
}//endif $suggested_cache
$zdb_sql_cache_writable = (@is_writable($zdb_sql_cache)) ? WRITABLE : UNWRITABLE;
if ($zdb_sql_cache != '') $status_check[] = array('Importance' => 'Recommended', 'Title' => LABEL_CURRENT_CACHE_PATH, 'Status' => $zdb_sql_cache . '&nbsp;&nbsp;-->' . $zdb_sql_cache_writable , 'Class' => ($zdb_sql_cache_writable ==WRITABLE) ? 'OK' : 'WARN', 'HelpURL' =>ERROR_CODE_CACHE_DIR_ISWRITEABLE, 'HelpLabel'=>ERROR_TEXT_CACHE_DIR_ISWRITEABLE);
$status_check[] = array('Importance' => 'Recommended', 'Title' => LABEL_SUGGESTED_CACHE_PATH, 'Status' => $suggested_cache, 'Class' => $sugg_cache_class, 'HelpURL' =>$sugg_cache_code, 'HelpLabel'=>$sugg_cache_text);

//PHP MagicQuotesRuntime
$php_magic_quotes_runtime = (@get_magic_quotes_runtime() > 0) ? ON : OFF;
$status_check[] = array('Importance' => 'Recommended', 'Title' => LABEL_PHP_MAG_QT_RUN, 'Status' => $php_magic_quotes_runtime , 'Class' => ($php_magic_quotes_runtime==OFF)?'OK':'WARN', 'HelpURL' =>ERROR_CODE_MAGIC_QUOTES_RUNTIME, 'HelpLabel'=>ERROR_TEXT_MAGIC_QUOTES_RUNTIME);

//PHP GD support check
$php_ext_gd =       (@extension_loaded('gd'))      ? ON : OFF;
$status_check[] = array('Importance' => 'Optional', 'Title' => LABEL_PHP_EXT_GD, 'Status' => $php_ext_gd , 'Class' => ($php_ext_gd==ON)?'OK':'WARN', 'HelpURL' =>'', 'HelpLabel'=>'');

//check for zLib Compression Support
$php_ext_zlib =     (@extension_loaded('zlib'))    ? ON : OFF;
$status_check[] = array('Importance' => '', 'Title' => LABEL_PHP_EXT_ZLIB, 'Status' => $php_ext_zlib, 'Class' => ($php_ext_zlib==ON)?'OK':'WARN', 'HelpURL' =>'', 'HelpLabel'=>'');

//Check for OpenSSL support (only relevant for Apache
$php_ext_openssl =  (@extension_loaded('openssl')) ? ON : OFF;
$status_check[] = array('Importance' => 'Optional', 'Title' => LABEL_PHP_EXT_OPENSSL, 'Status' => $php_ext_openssl, 'Class' => ($php_ext_openssl==ON)?'OK':'WARN', 'HelpURL' =>ERROR_CODE_OPENSSL_WARN, 'HelpLabel'=>ERROR_TEXT_OPENSSL_WARN);

//Check for cURL support (ie: for payment/shipping gateways)
// could also check for (function_exists('curl_init'))
$php_ext_curl =     (@extension_loaded('curl'))    ? ON : OFF;
$status_check[] = array('Importance' => 'Optional', 'Title' => LABEL_PHP_EXT_CURL, 'Status' => $php_ext_curl, 'Class' => ($php_ext_curl==ON)?'OK':'WARN', 'HelpURL' =>'', 'HelpLabel'=>'');

//Check for upload support built in to PHP
$php_uploads =      (@ini_get('file_uploads')) ? ON : OFF;
$status_check[] = array('Importance' => 'Optional', 'Title' => LABEL_PHP_UPLOAD_STATUS, 'Status' => $php_uploads . sprintf('&nbsp;&nbsp;upload_max_filesize=%s;&nbsp;&nbsp;post_max_size=%s',@ini_get('upload_max_filesize'), @ini_get('post_max_size')) , 'Class' => ($php_uploads==ON)?'OK':'WARN', 'HelpURL' =>ERROR_CODE_UPLOADS_DISABLED, 'HelpLabel'=>ERROR_TEXT_UPLOADS_DISABLED);

//Upload TMP dir setting
$upload_tmp_dir = ini_get("upload_tmp_dir");
$status_check[] = array('Importance' => 'Info', 'Title' => LABEL_UPLOAD_TMP_DIR, 'Status' => $upload_tmp_dir, 'Class' => 'OK', 'HelpURL' =>'', 'HelpLabel'=>'');

//Check for XML Support
$xml_support = function_exists('xml_parser_create') ? ON : OFF;
$status_check[] = array('Importance' => 'Optional', 'Title' => LABEL_XML_SUPPORT, 'Status' => $xml_support, 'Class' => ($xml_support==ON)?'OK':'WARN', 'HelpURL' =>'', 'HelpLabel'=>'');

//Check for FTP support built in to PHP (for manual sending of configure.php files to server if applicable)
$php_ext_ftp =      (@extension_loaded('ftp'))     ? ON : OFF;
if ($php_ext_ftp == ON) $status_check[] = array('Importance' => 'Optional', 'Title' => LABEL_PHP_EXT_FTP, 'Status' => $php_ext_ftp, 'Class' => ($php_ext_ftp==ON)?'OK':'WARN', 'HelpURL' =>'', 'HelpLabel'=>'');

//Check for pfpro support in PHP for Verisign Payflow Pro payment gateway (Verisign SDK required)
$php_ext_pfpro =    (@extension_loaded('pfpro'))   ? ON : OFF;
if ($php_ext_pfpro==ON) $status_check[] = array('Importance' => 'Optional', 'Title' => LABEL_PHP_EXT_PFPRO, 'Status' => $php_ext_pfpro, 'Class' => ($php_ext_pfpro==ON)?'OK':'WARN', 'HelpURL' =>'', 'HelpLabel'=>'');

//Check PostgreSQL availability
$pg_support = (function_exists( 'pg_connect' )) ? ON : OFF;
// turn off display of Postgres status until we support it again
//$status_check[] = array('Importance' => 'Optional', 'Title' => LABEL_POSTGRES_AVAILABLE, 'Status' => $pg_support, 'Class' => ($pg_support==ON) ? 'OK' : 'WARN', 'HelpURL' =>ERROR_CODE_DB_NOTSUPPORTED, 'HelpLabel'=>ERROR_TEXT_DB_NOTSUPPORTED);


//Sendmail From setting
$sendmail_from = ini_get("sendmail_from");
$status_check2[] = array('Importance' => 'Info', 'Title' => LABEL_SENDMAIL_FROM, 'Status' => $sendmail_from, 'Class' => 'NA', 'HelpURL' =>'', 'HelpLabel'=>'');

//Sendmail Path setting
$sendmail_path = ini_get("sendmail_path");
$status_check2[] = array('Importance' => 'Info', 'Title' => LABEL_SENDMAIL_PATH, 'Status' => $sendmail_path, 'Class' => 'NA', 'HelpURL' =>'', 'HelpLabel'=>'');

//SMTP (vs sendmail) setting
$smtp = ini_get("SMTP");
$status_check2[] = array('Importance' => 'Info', 'Title' => LABEL_SMTP_MAIL, 'Status' => $smtp, 'Class' => 'NA', 'HelpURL' =>'', 'HelpLabel'=>'');

$php_extensions = get_loaded_extensions();

//check PHP version and set flags if appropriate
  $zc_install->test_php_version('=','4.1.2',ERROR_TEXT_4_1_2, ERROR_CODE_4_1_2, false);
  $zc_install->test_php_version('<','4.0.6',ERROR_TEXT_PHP_VERSION, ERROR_CODE_PHP_VERSION, true);
  $zc_install->test_admin_configure(ERROR_TEXT_ADMIN_CONFIGURE,ERROR_CODE_ADMIN_CONFIGURE);
  $zc_install->test_store_configure(ERROR_TEXT_STORE_CONFIGURE,ERROR_CODE_STORE_CONFIGURE);
  if ($php_ext_sessions=="OFF") {$zc_install->setError(ERROR_TEXT_PHP_SESSION_SUPPORT, ERROR_CODE_PHP_SESSION_SUPPORT, true);}

  // don't restrict ability to proceed with installation if upgrading the database w/o touching configure.php files is a suitable option
  $zen_cart_allow_database_upgrade_button_disable =$zc_install->fatal_error;
  // now check for writability of the configure.php files (after capturing fatal_error status above.
  $zc_install->test_admin_configure_write(ERROR_TEXT_ADMIN_CONFIGURE_WRITE,ERROR_CODE_ADMIN_CONFIGURE_WRITE);
  $zc_install->test_store_configure_write(ERROR_TEXT_STORE_CONFIGURE_WRITE,ERROR_CODE_STORE_CONFIGURE_WRITE);

foreach (array('includes/configure.php', 'admin/includes/configure.php') as $file) {
    if (file_exists('../' . $file)) {
      $this_exists='';
       if (is_writable('../' . $file)) {
         $this_class = 'OK';
         $this_writable=WRITABLE;
       } else {
         $this_class = 'FAIL';
         $this_writable=UNWRITABLE;
       }
    } else {
      $this_exists=NOT_EXIST;
      $this_class='FAIL';
    }
   $file_status[]=array('file'=>$file, 'exists'=>$this_exists, 'writable'=>$this_writable, 'class'=> $this_class);
}

//check folders status
foreach (array('cache'=>'777 read/write/execute', 'images'=>'777 read/write/execute (INCLUDE SUBDIRECTORIES TOO)', 'includes/languages/english/html_includes'=>'777 read/write (INCLUDE SUBDIRECTORIES TOO)', 'pub'=>'777 read/write/execute', 'admin/backups'=>'777 read/write', 'admin/images/graphs'=>'777 read/write/execute') as $folder=>$chmod) {
   $folder_status[]=array('folder'=>$folder, 'writable'=>(@is_writable('../'.$folder))?OK:UNWRITABLE, 'class'=> (@is_writable('../'.$folder))?'OK':'WARN', 'chmod'=>$chmod);
}

  if (isset($_POST['submit'])) {
    if (!$zc_install->fatal_error) {
      header('location: index.php?main_page=system_setup&language=' . $language . '&sql_cache='.$suggested_cache);
    exit;
    }
  }
  if (isset($_POST['upgrade'])) {
    if (!$zc_install->fatal_error) {
      header('location: index.php?main_page=system_setup&language=' . $language . '&sql_cache='.$suggested_cache . '&is_upgrade=1');
    exit;
    }
  }
  if (isset($_POST['db_upgrade'])) {
    if (!$zen_cart_allow_database_upgrade_button_disable) {
      header('location: index.php?main_page=database_upgrade&language=' . $language . '&is_upgrade=1');
    exit;
    }
  }
  if (isset($_POST['refresh'])) {
      header('location: index.php?main_page=inspect&language=' . $language . '&sql_cache='.$suggested_cache);
    exit;
  }
?>