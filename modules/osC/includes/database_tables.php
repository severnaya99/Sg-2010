<?php
/*
  $Id: database_tables.php 64 2005-12-19 18:07:20Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
// CCGV
define('TABLE_COUPON_GV_QUEUE', $xoopsDB->prefix('osc_coupon_gv_queue'));
define('TABLE_COUPON_GV_CUSTOMER', $xoopsDB->prefix('osc_coupon_gv_customer'));
define('TABLE_COUPON_EMAIL_TRACK', $xoopsDB->prefix('osc_coupon_email_track'));
define('TABLE_COUPON_REDEEM_TRACK', $xoopsDB->prefix('osc_coupon_redeem_track'));
define('TABLE_COUPONS', $xoopsDB->prefix('osc_coupons'));
define('TABLE_COUPONS_DESCRIPTION', $xoopsDB->prefix('osc_coupons_description'));

// define the database table names used in the project
  define('TABLE_ADDRESS_BOOK', $xoopsDB->prefix('osc_address_book'));
  define('TABLE_ADDRESS_FORMAT', $xoopsDB->prefix('osc_address_format'));
  define('TABLE_BANNERS', $xoopsDB->prefix('osc_banners'));
  define('TABLE_BANNERS_HISTORY', $xoopsDB->prefix('osc_banners_history'));
  define('TABLE_CATEGORIES', $xoopsDB->prefix('osc_categories'));
  define('TABLE_CATEGORIES_DESCRIPTION', $xoopsDB->prefix('osc_categories_description'));
  define('TABLE_CONFIGURATION', $xoopsDB->prefix('osc_configuration'));
  define('TABLE_CONFIGURATION_GROUP', $xoopsDB->prefix('osc_configuration_group'));
  define('TABLE_COUNTER', $xoopsDB->prefix('osc_counter'));
  define('TABLE_COUNTER_HISTORY', $xoopsDB->prefix('osc_counter_history'));
  define('TABLE_COUNTRIES', $xoopsDB->prefix('osc_countries'));
  define('TABLE_CURRENCIES', $xoopsDB->prefix('osc_currencies'));
  define('TABLE_CUSTOMERS', $xoopsDB->prefix('osc_customers'));
  define('TABLE_CUSTOMERS_BASKET', $xoopsDB->prefix('osc_customers_basket'));
  define('TABLE_CUSTOMERS_BASKET_ATTRIBUTES', $xoopsDB->prefix('osc_customers_basket_attributes'));
  define('TABLE_CUSTOMERS_INFO', $xoopsDB->prefix('osc_customers_info'));
  define('TABLE_LANGUAGES', $xoopsDB->prefix('osc_languages'));
  define('TABLE_MANUFACTURERS', $xoopsDB->prefix('osc_manufacturers'));
  define('TABLE_MANUFACTURERS_INFO', $xoopsDB->prefix('osc_manufacturers_info'));
  define('TABLE_ORDERS', $xoopsDB->prefix('osc_orders'));
  define('TABLE_ORDERS_PRODUCTS', $xoopsDB->prefix('osc_orders_products'));
  define('TABLE_ORDERS_PRODUCTS_ATTRIBUTES', $xoopsDB->prefix('osc_orders_products_attributes'));
  define('TABLE_ORDERS_PRODUCTS_DOWNLOAD', $xoopsDB->prefix('osc_orders_products_download'));
  define('TABLE_ORDERS_STATUS', $xoopsDB->prefix('osc_orders_status'));
  define('TABLE_ORDERS_STATUS_HISTORY', $xoopsDB->prefix('osc_orders_status_history'));
  define('TABLE_ORDERS_TOTAL', $xoopsDB->prefix('osc_orders_total'));
  define('TABLE_PRODUCTS', $xoopsDB->prefix('osc_products'));
  define('TABLE_PRODUCTS_ATTRIBUTES', $xoopsDB->prefix('osc_products_attributes'));
  define('TABLE_PRODUCTS_ATTRIBUTES_DOWNLOAD', $xoopsDB->prefix('osc_products_attributes_download'));
  define('TABLE_PRODUCTS_DESCRIPTION', $xoopsDB->prefix('osc_products_description'));
  define('TABLE_PRODUCTS_NOTIFICATIONS', $xoopsDB->prefix('osc_products_notifications'));
  define('TABLE_PRODUCTS_OPTIONS', $xoopsDB->prefix('osc_products_options'));
  define('TABLE_PRODUCTS_OPTIONS_VALUES', $xoopsDB->prefix('osc_products_options_values'));
  define('TABLE_PRODUCTS_OPTIONS_VALUES_TO_PRODUCTS_OPTIONS', $xoopsDB->prefix('osc_products_options_values_to_products_options'));
  define('TABLE_PRODUCTS_TO_CATEGORIES', $xoopsDB->prefix('osc_products_to_categories'));
  define('TABLE_REVIEWS', $xoopsDB->prefix('osc_reviews'));
  define('TABLE_REVIEWS_DESCRIPTION', $xoopsDB->prefix('osc_reviews_description'));
  define('TABLE_SESSIONS', $xoopsDB->prefix('osc_sessions'));
  define('TABLE_SPECIALS', $xoopsDB->prefix('osc_specials'));
  define('TABLE_TAX_CLASS', $xoopsDB->prefix('osc_tax_class'));
  define('TABLE_TAX_RATES', $xoopsDB->prefix('osc_tax_rates'));
  define('TABLE_GEO_ZONES', $xoopsDB->prefix('osc_geo_zones'));
  define('TABLE_ZONES_TO_GEO_ZONES', $xoopsDB->prefix('osc_zones_to_geo_zones'));
  define('TABLE_WHOS_ONLINE', $xoopsDB->prefix('osc_whos_online'));
  define('TABLE_ZONES', $xoopsDB->prefix('osc_zones'));
  define('TABLE_CUSTOMER_GROUP',$xoopsDB->prefix('osc_customer_group'));
  define('TABLE_DISTRIBUTORS',$xoopsDB->prefix('osc_distributors'));
?>
