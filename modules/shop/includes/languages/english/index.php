<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
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
// $Id: index.php 290 2004-09-15 19:48:26Z wilt $
//

define('TEXT_MAIN','This is the main define statement for the page for english when no template defined file exists. It is located in: <strong>/includes/languages/english/index.php</strong>');

// Showcase vs Store
if (STORE_STATUS == '0') {
  define('TEXT_GREETING_GUEST', 'Welcome <span class="greetUser">Guest!</span> Would you like to <a href="%s">log yourself in</a>?');
} else {
  define('TEXT_GREETING_GUEST', 'Welcome, please enjoy our online showcase.');
}

define('TEXT_GREETING_PERSONAL', 'Hello <span class="greetUser">%s</span>! Would you like to see our <a href="%s">newest additions</a>?');

define('TEXT_INFORMATION', 'Define your main Index page copy here.');

//moved to english
//define('TABLE_HEADING_FEATURED_PRODUCTS','Featured Products');

//define('TABLE_HEADING_NEW_PRODUCTS', 'New Products For %s');
//define('TABLE_HEADING_UPCOMING_PRODUCTS', 'Upcoming Products');
//define('TABLE_HEADING_DATE_EXPECTED', 'Date Expected');

if ( ($category_depth == 'products') || (zen_check_url_get_terms()) ) {
  define('HEADING_TITLE', 'Available Products');
  define('TABLE_HEADING_IMAGE', 'Product Image');
  define('TABLE_HEADING_MODEL', 'Model');
  define('TABLE_HEADING_PRODUCTS', 'Product Name');
  define('TABLE_HEADING_MANUFACTURER', 'Manufacturer');
  define('TABLE_HEADING_QUANTITY', 'Quantity');
  define('TABLE_HEADING_PRICE', 'Price');
  define('TABLE_HEADING_WEIGHT', 'Weight');
  define('TABLE_HEADING_BUY_NOW', 'Buy Now');
  define('TEXT_NO_PRODUCTS', 'There are no products to list in this category.');
  define('TEXT_NO_PRODUCTS2', 'There is no product available from this manufacturer.');
  define('TEXT_NUMBER_OF_PRODUCTS', 'Number of Products: ');
  define('TEXT_SHOW', '<strong>Sort by:</strong> ');
  define('TEXT_BUY', 'Buy 1 \'');
  define('TEXT_NOW', '\' now');
  define('TEXT_ALL_CATEGORIES', 'All Categories');
  define('TEXT_ALL_MANUFACTURERS', 'All Manufacturers');
} elseif ($category_depth == 'top') {
  define('HEADING_TITLE', 'Congratulations! You have successfully installed your Zen Cart&trade; E-Commerce Solution.'); /*Replace this line with the headline you would like for your shop. For example: Welcome to My SHOP!*/
} elseif ($category_depth == 'nested') {
  // this will also be used on Top Level
  define('HEADING_TITLE', 'Congratulations! You have successfully installed your Zen Cart&trade; E-Commerce Solution.'); /*Replace this line with the headline you would like for your shop. For example: Welcome to My SHOP!*/
}
?>
