<?php
/*
  $Id: application_top.php 156 2006-02-14 17:37:15Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License

  adapted 2005 for xoops 2.0.x by FlinkUX e.K. <http://www.flinkux.de>
  
  (c) 2005  Michael Hammelmann <michael.hammelmann@flinkux.de>

*/

// Please dont forget. At this moment you have no xoops environment.
// the xoops environment starting after inclusion of mainfile.php

  include_once "includes/configure.php";
define('SECURITY_CODE_LENGTH', '6');
$request_type = (getenv('HTTPS') == 'on') ? 'SSL' : 'NONSSL';

// set the HTTP GET parameters manually if search_engine_friendly_urls is enabled
  if (SEARCH_ENGINE_FRIENDLY_URLS == 'true') {
    if (strlen(getenv('PATH_INFO')) > 1) {
      $GET_array = array();
      $PHP_SELF = str_replace(getenv('PATH_INFO'), '', $PHP_SELF);
      $vars = explode('/', substr(getenv('PATH_INFO'), 1));
      for ($i=0, $n=sizeof($vars); $i<$n; $i++) {
        if (strpos($vars[$i], '[]')) {
          $GET_array[substr($vars[$i], 0, -2)][] = $vars[$i+1];
        } else {
          $HTTP_GET_VARS[$vars[$i]] = $vars[$i+1];
        }
        $i++;
      }

      if (sizeof($GET_array) > 0) {
        while (list($key, $value) = each($GET_array)) {
          $HTTP_GET_VARS[$key] = $value;
        }
      }
    }
  }

// define general functions used application-wide
  require(DIR_WS_FUNCTIONS . 'general.php');
  require(DIR_WS_FUNCTIONS . 'html_output.php');

// set the cookie domain
  $cookie_domain = (($request_type == 'NONSSL') ? HTTP_COOKIE_DOMAIN : HTTPS_COOKIE_DOMAIN);
  $cookie_path = (($request_type == 'NONSSL') ? HTTP_COOKIE_PATH : HTTPS_COOKIE_PATH);

// include shopping cart class
  require(DIR_WS_CLASSES . 'shopping_cart.php');

// include navigation history class
  require(DIR_WS_CLASSES . 'navigation_history.php');

// some code to solve compatibility issues
  require(DIR_WS_FUNCTIONS . 'compatibility.php');

  require(DIR_WS_CLASSES . 'currencies.php');
  include(DIR_WS_CLASSES . 'language.php');


  include '../../mainfile.php';

while (list ($key, $val) = each ($_SESSION)) {
 $$key=$val;
}
while (list ($key, $val) = each ($_POST)) {
   $$key=$val;
}
while (list ($key, $val) = each ($_GET)) {
   $$key=$val;
}

  require(DIR_WS_INCLUDES."/database_tables.php");

// set the application parameters
if(!defined('XBLOCK_CONFIG')) {
 $configuration_query = $xoopsDB->query('select configuration_key as cfgKey, configuration_value as cfgValue from ' . TABLE_CONFIGURATION);
 while ($configuration = $xoopsDB->fetchArray($configuration_query)) {
	define($configuration['cfgKey'], $configuration['cfgValue']);
 }
 define('XBLOCK_CONFIG',"1");
}
// set php_self in the local scope
  if (!isset($PHP_SELF)) $PHP_SELF = $HTTP_SERVER_VARS['PHP_SELF'];

// include the list of project filenames
  require(DIR_WS_INCLUDES . 'filenames.php');

// include the database functions
  require(DIR_WS_FUNCTIONS."/database.php");

// define how the session functions will be used
  require(DIR_WS_FUNCTIONS . 'sessions.php');

// temporäre Carts leeren welche veraltet sind.
  tep_db_query("delete from ".TABLE_SESSIONS." where expiry < '".time()."'");
  tep_session_unregister('customer_id');
  $session_started=true;
  if( (is_object( $xoopsUser  ) && ! session_is_registered('customer_id')) ) {
   // ist hier unter Umständen xoopsUser->email() leer ? Dann ist es ein Bug von xoops
    $customer_query=tep_db_query("select c.*,a.entry_country_id,a.entry_zone_id from ".TABLE_CUSTOMERS. " c  left join ".TABLE_ADDRESS_BOOK." a on a.address_book_id = c.customers_default_address_id where customers_email_address ='".$xoopsUser->email()."'");
	if(mysql_affected_rows() > 0)
	{	 
	  $customer=mysql_fetch_array($customer_query);
	  // Bugfix für xoopsUser->email()
	  if(isset($customer['customers_id'])  ) {
	    $customer_first_name = $customer['customers_firstname'];
        $customer_default_address_id = $customer['customers_default_address_id'];
        $customer_country_id = $customer['entry_country_id'];
        $customer_zone_id = $customer['entry_zone_id'];
	    $customer_id=$customer['customers_id'];
        tep_session_register('customer_id');
        tep_session_register('customer_first_name');
        tep_session_register('customer_default_address_id');
        tep_session_register('customer_country_id');
        tep_session_register('customer_zone_id');
      } 
	}
  }
// create the shopping cart & fix the cart if necesary
  if (session_is_registered('cart') && is_object($cart) ) {
      if (PHP_VERSION < 4) {
        $broken_cart = $cart;
        $cart = new shoppingCart;
        $cart->unserialize($broken_cart);
      }
   }elseif(isset($_SESSION['xoopsUserId'])) {
	  $tmp_cart_query=tep_db_query("select value from ".TABLE_SESSIONS." where sesskey='".session_id()."'");
	  if(mysql_affected_rows() > 0 ) {
	    $tmp_cart=tep_db_fetch_array($tmp_cart_query);
	    tep_session_register('cart');
	    $cart=unserialize($tmp_cart['value']);
	    $_SESSION['cart']=$cart;
      }elseif(tep_session_is_registered('customer_id')) {
	    tep_session_register('cart');
        $cart = new shoppingCart();
		$cart->restore_contents();
	  }else {
	    tep_session_register('cart');
        $cart = new shoppingCart();  
	  }
	}else{
        tep_session_register('cart');
        $cart = new shoppingCart();
    }
   
  $expiry=time()+1440;

  $tmp_session_id=session_id();
  $xosC_cart=serialize($cart);
  tep_db_query("replace into ".TABLE_SESSIONS. " (sesskey,expiry,value)values('".session_id()."','".$expiry."','".$xosC_cart."')");

// include currencies class and create an instance
    $currencies = new currencies();
 
// include the mail classes
  require(DIR_WS_CLASSES . 'mime.php');
  require(DIR_WS_CLASSES . 'email.php');
  require(DIR_WS_CLASSES."customer_group.php");
// set the language
  if (!session_is_registered('language') || isset($HTTP_GET_VARS['language'])) {
    if (!session_is_registered('language')) {
      session_register('language');
      session_register('languages_id');
    }


    $lng = new language("");

    if (isset($HTTP_GET_VARS['language']) && tep_not_null($HTTP_GET_VARS['language'])) {
      $lng->set_language($HTTP_GET_VARS['language']);
    } else {
      $lng->get_browser_language();
    }
    $language = $lng->language['directory'];
    $languages_id = $lng->language['id'];
  }

  if(!isset($_SESSION['languages_id']) || $_SESSION['language'] == '' ) {
    $lang_query="select languages_id from ".TABLE_LANGUAGES." where directory ='".$xoopsConfig['language']."'";
	$lang=tep_db_query($lang_query);
	$lang_id=tep_db_fetch_array($lang);
	$languages_id=$lang_id['languages_id'];
    $_SESSION['language']=$xoopsConfig['language'];
	$_SESSION['languages_id']=$languages_id;
  }


// For customer group rights - 0 means guest
if(!isset($customer_id)) {
 $customer_group=new customer_group(0);
}else {
 $customer_group=new customer_group($customer_id);
} 

// include the language translations
 require(DIR_WS_LANGUAGES . $_SESSION['language'] . '.php');
// currency
  if (!session_is_registered('currency') || isset($HTTP_GET_VARS['currency']) || ( (USE_DEFAULT_LANGUAGE_CURRENCY == 'true') && (LANGUAGE_CURRENCY != $currency) ) ) {
    if (!session_is_registered('currency')) session_register('currency');

    if (isset($HTTP_GET_VARS['currency'])) {
      if (!$currency = tep_currency_exists($HTTP_GET_VARS['currency'])) $currency = (USE_DEFAULT_LANGUAGE_CURRENCY == 'true') ? LANGUAGE_CURRENCY : DEFAULT_CURRENCY;
    } else {
      $currency = (USE_DEFAULT_LANGUAGE_CURRENCY == 'true') ? LANGUAGE_CURRENCY : DEFAULT_CURRENCY;
    }
  }
// navigation history
  if (session_is_registered('navigation')) {
    
    if (PHP_VERSION < 4) {
      $broken_navigation = $navigation;
      $navigation = new navigationHistory;
      $navigation->unserialize($broken_navigation);
    }
  } else {
    session_register('navigation');
    $navigation = new navigationHistory;
  }
  $navigation->add_current_page();

// Shopping cart actions
  if (isset($HTTP_GET_VARS['action'])) {
    if (DISPLAY_CART == 'true') {
      $goto =  FILENAME_SHOPPING_CART;
      $parameters = array('action', 'cPath', 'products_id', 'pid');
    } else {
      $goto = basename($PHP_SELF);
      if ($HTTP_GET_VARS['action'] == 'buy_now') {
        $parameters = array('action', 'pid', 'products_id');
      } else {
        $parameters = array('action', 'pid');
      }
    }
    switch ($HTTP_GET_VARS['action']) {
      // customer wants to update the product quantity in their shopping cart
      case 'update_product' : for ($i=0, $n=sizeof($HTTP_POST_VARS['products_id']); $i<$n; $i++) {
                                if (in_array($HTTP_POST_VARS['products_id'][$i], (is_array($HTTP_POST_VARS['cart_delete']) ? $HTTP_POST_VARS['cart_delete'] : array()))) {
                                  $cart->remove($HTTP_POST_VARS['products_id'][$i]);
								  $_SESSION['cart']=$cart;
                                } else {
                                  if (PHP_VERSION < 4) {
                                    // if PHP3, make correction for lack of multidimensional array.
                                    reset($HTTP_POST_VARS);
                                    while (list($key, $value) = each($HTTP_POST_VARS)) {
                                      if (is_array($value)) {
                                        while (list($key2, $value2) = each($value)) {
                                          if (ereg ("(.*)\]\[(.*)", $key2, $var)) {
                                            $id2[$var[1]][$var[2]] = $value2;
                                          }
                                        }
                                      }
                                    }
                                    $attributes = ($id2[$HTTP_POST_VARS['products_id'][$i]]) ? $id2[$HTTP_POST_VARS['products_id'][$i]] : '';
                                  } else {
                                    $attributes = ($HTTP_POST_VARS['id'][$HTTP_POST_VARS['products_id'][$i]]) ? $HTTP_POST_VARS['id'][$HTTP_POST_VARS['products_id'][$i]] : '';
                                  }
                                  $cart->add_cart($HTTP_POST_VARS['products_id'][$i], $HTTP_POST_VARS['cart_quantity'][$i], $attributes, false);
                                  $_SESSION['cart']=$cart;
								}
                              }
                              tep_redirect(tep_href_link($goto, tep_get_all_get_params($parameters)));
                              break;
      // customer adds a product from the products page
      case 'add_product' :    if (isset($HTTP_POST_VARS['products_id']) && is_numeric($HTTP_POST_VARS['products_id'])) {
                                $cart->add_cart($HTTP_POST_VARS['products_id'], $cart->get_quantity(tep_get_uprid($HTTP_POST_VARS['products_id'], $HTTP_POST_VARS['id']))+1, $HTTP_POST_VARS['id']);                               
     							$_SESSION['cart']=$cart;
							  }
							  $msg.="addcart<br>";
                              tep_redirect(tep_href_link($goto, tep_get_all_get_params($parameters)));
                              break;
      // performed by the 'buy now' button in product listings and review page
      case 'buy_now' :        if (isset($HTTP_GET_VARS['products_id'])) {
                                if (tep_has_product_attributes($HTTP_GET_VARS['products_id'])) {
                                  tep_redirect(tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $HTTP_GET_VARS['products_id']));
                                } else {
                                  $cart->add_cart($HTTP_GET_VARS['products_id'], $cart->get_quantity($HTTP_GET_VARS['products_id'])+1);
                                  $_SESSION['cart']=$cart;
								}
                              }
                              tep_redirect(tep_href_link($goto, tep_get_all_get_params($parameters)));
                              break;
      case 'notify' :           if (session_is_registered('customer_id')) {
                                if (isset($HTTP_GET_VARS['products_id'])) {
                                  $notify = $HTTP_GET_VARS['products_id'];
                                } elseif (isset($HTTP_GET_VARS['notify'])) {
                                  $notify = $HTTP_GET_VARS['notify'];
                                } elseif (isset($HTTP_POST_VARS['notify'])) {
                                  $notify = $HTTP_POST_VARS['notify'];
                                } else {
                                  tep_redirect(tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action', 'notify'))));
                                }
                                if (!is_array($notify)) $notify = array($notify);
                                for ($i=0, $n=sizeof($notify); $i<$n; $i++) {
                                  $check_query = $xoopsDB->query("select count(*) as count from " . TABLE_PRODUCTS_NOTIFICATIONS . " where products_id = '" . $notify[$i] . "' and customers_id = '" . $customer_id . "'");
                                  $check = $xoopsDB->fetchArray($check_query);
                                  if ($check['count'] < 1) {
                                    $xoopsDB->query("insert into " . TABLE_PRODUCTS_NOTIFICATIONS . " (products_id, customers_id, date_added) values ('" . $notify[$i] . "', '" . $customer_id . "', now())");
                                  }
                                }
                                tep_redirect(tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action', 'notify'))));
                              } else {
                                $navigation->set_snapshot();
								$_SESSION['navigation']=$navigation;
                                tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
                              }
                              break;
      case 'notify_remove' :  if (session_is_registered('customer_id') && isset($HTTP_GET_VARS['products_id'])) {
                                $check_query = $xoopsDB->query("select count(*) as count from " . TABLE_PRODUCTS_NOTIFICATIONS . " where products_id = '" . $HTTP_GET_VARS['products_id'] . "' and customers_id = '" . $customer_id . "'");
                                $check = $xoopsDB->fetchArray($check_query);
                                if ($check['count'] > 0) {
                                  $xoopsDB->query("delete from " . TABLE_PRODUCTS_NOTIFICATIONS . " where products_id = '" . $HTTP_GET_VARS['products_id'] . "' and customers_id = '" . $customer_id . "'");
                                }
                                tep_redirect(tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action'))));
                              } else {
                                $navigation->set_snapshot();
								$_SESSION['navigation']=$navigation;
                                tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
                              }
                              break;
      case 'cust_order' :     if (session_is_registered('customer_id') && isset($HTTP_GET_VARS['pid'])) {
                                if (tep_has_product_attributes($HTTP_GET_VARS['pid'])) {
                                  tep_redirect(tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $HTTP_GET_VARS['pid']));
                                } else {
                                  $cart->add_cart($HTTP_GET_VARS['pid'], $cart->get_quantity($HTTP_GET_VARS['pid'])+1);
                                  $_SESSION['cart']=$cart;
								}
                              }
                              tep_redirect(tep_href_link($goto, tep_get_all_get_params($parameters)));
                              break;
    }
  }

// include the who's online functions
  require(DIR_WS_FUNCTIONS . 'whos_online.php');
  tep_update_whos_online();

// include the password crypto functions
  require(DIR_WS_FUNCTIONS . 'password_funcs.php');

// include validation functions (right now only email address)
  require(DIR_WS_FUNCTIONS . 'validations.php');

// split-page-results
  require(DIR_WS_CLASSES . 'split_page_results.php');

// auto expire special products
  require(DIR_WS_FUNCTIONS . 'specials.php');
  tep_expire_specials();
// infobox
  require(DIR_WS_CLASSES . 'boxes.php');
  
// calculate category path
  if (isset($HTTP_GET_VARS['cPath'])) {
    $cPath = $HTTP_GET_VARS['cPath'];
  } elseif (isset($HTTP_GET_VARS['products_id']) && !isset($HTTP_GET_VARS['manufacturers_id'])) {
    $cPath = tep_get_product_path($HTTP_GET_VARS['products_id']);
  } else {
    $cPath = '';
  }

  if (tep_not_null($cPath)) {
    $cPath_array = tep_parse_category_path($cPath);
    $cPath = implode('_', $cPath_array);
    $current_category_id = $cPath_array[(sizeof($cPath_array)-1)];
  } else {
    $current_category_id = 0;
  }

// include the breadcrumb class and start the breadcrumb trail
  require(DIR_WS_CLASSES . 'breadcrumb.php');
  $breadcrumb = new breadcrumb;

  $breadcrumb->add(HEADER_TITLE_TOP, HTTP_SERVER);
  $breadcrumb->add(HEADER_TITLE_CATALOG, tep_href_link(FILENAME_DEFAULT));

// add category names or the manufacturer name to the breadcrumb trail
  if (isset($cPath_array)) {
    for ($i=0, $n=sizeof($cPath_array); $i<$n; $i++) {
      $categories_query = tep_db_query("select categories_name from " . TABLE_CATEGORIES_DESCRIPTION . " where categories_id = '" . (int)$cPath_array[$i] . "' and language_id = '" . (int)$languages_id . "'");
      if (tep_db_num_rows($categories_query) > 0) {
        $categories = tep_db_fetch_array($categories_query);
        $breadcrumb->add($categories['categories_name'], tep_href_link(FILENAME_DEFAULT, 'cPath=' . implode('_', array_slice($cPath_array, 0, ($i+1)))));
      } else {
        break;
      }
    }
  } elseif (isset($HTTP_GET_VARS['manufacturers_id'])) {
    $manufacturers_query = tep_db_query("select manufacturers_name from " . TABLE_MANUFACTURERS . " where manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'");
    if (tep_db_num_rows($manufacturers_query)) {
      $manufacturers = tep_db_fetch_array($manufacturers_query);
      $breadcrumb->add($manufacturers['manufacturers_name'], tep_href_link(FILENAME_DEFAULT, 'manufacturers_id=' . $HTTP_GET_VARS['manufacturers_id']));
    }
  }

// add the products model to the breadcrumb trail
  if (isset($HTTP_GET_VARS['products_id'])) {
    $model_query = tep_db_query("select products_model from " . TABLE_PRODUCTS . " where products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "'");
    if (tep_db_num_rows($model_query)) {
      $model = tep_db_fetch_array($model_query);
      $breadcrumb->add($model['products_model'], tep_href_link(FILENAME_PRODUCT_INFO, 'cPath=' . $cPath . '&products_id=' . $HTTP_GET_VARS['products_id']));
    }
  }

// initialize the message stack for output messages
  require(DIR_WS_CLASSES . 'message_stack.php');
  $messageStack = new messageStack;



// set which precautions should be checked
  define('WARN_INSTALL_EXISTENCE', 'true');
  define('WARN_CONFIG_WRITEABLE', 'true');
  define('WARN_SESSION_DIRECTORY_NOT_WRITEABLE', 'true');
  define('WARN_SESSION_AUTO_START', 'true');
  define('WARN_DOWNLOAD_DIRECTORY_NOT_READABLE', 'true');

?>
