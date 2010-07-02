-- phpMyAdmin SQL Dump
-- version 2.6.0-rc1
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 18-09-2005 a las 23:24:29
-- Versión del servidor: 4.1.10
-- Versión de PHP: 5.0.3
-- 
-- Base de datos: `xoopsshop`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcaddress_book`
-- 

CREATE TABLE `zcaddress_book` (
  `address_book_id` int(11) NOT NULL auto_increment,
  `customers_id` int(11) NOT NULL default '0',
  `entry_gender` char(1) NOT NULL default '',
  `entry_company` varchar(32) default NULL,
  `entry_firstname` varchar(32) NOT NULL default '',
  `entry_lastname` varchar(32) NOT NULL default '',
  `entry_street_address` varchar(64) NOT NULL default '',
  `entry_suburb` varchar(32) default NULL,
  `entry_postcode` varchar(10) NOT NULL default '',
  `entry_city` varchar(32) NOT NULL default '',
  `entry_state` varchar(32) default NULL,
  `entry_country_id` int(11) NOT NULL default '0',
  `entry_zone_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`address_book_id`),
  KEY `idx_address_book_customers_id_zen` (`customers_id`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcaddress_book`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcaddress_format`
-- 

CREATE TABLE `zcaddress_format` (
  `address_format_id` int(11) NOT NULL auto_increment,
  `address_format` varchar(128) NOT NULL default '',
  `address_summary` varchar(48) NOT NULL default '',
  PRIMARY KEY  (`address_format_id`)
)   AUTO_INCREMENT=6 ;

-- 
-- Volcar la base de datos para la tabla `zcaddress_format`
-- 

INSERT INTO `zcaddress_format` (`address_format_id`, `address_format`, `address_summary`) VALUES (1, '$firstname $lastname$cr$streets$cr$city, $postcode$cr$statecomma$country', '$city / $country'),
(2, '$firstname $lastname$cr$streets$cr$city, $state    $postcode$cr$country', '$city, $state / $country'),
(3, '$firstname $lastname$cr$streets$cr$city$cr$postcode - $statecomma$country', '$state / $country'),
(4, '$firstname $lastname$cr$streets$cr$city ($postcode)$cr$country', '$postcode / $country'),
(5, '$firstname $lastname$cr$streets$cr$postcode $city$cr$country', '$city / $country');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcadmin`
-- 

CREATE TABLE `zcadmin` (
  `admin_id` int(11) NOT NULL auto_increment,
  `admin_name` varchar(32) NOT NULL default '',
  `admin_email` varchar(96) NOT NULL default '',
  `admin_pass` varchar(40) NOT NULL default '',
  `admin_level` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`admin_id`),
  KEY `idx_admin_name_zen` (`admin_name`)
)   AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `zcadmin`
-- 

INSERT INTO `zcadmin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_level`) VALUES (1, 'admin', 'test@imaginacolombia.com', 'd6fe9c061c8bbe1fd7338d3835b2110f:6b', 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcadmin_activity_log`
-- 

CREATE TABLE `zcadmin_activity_log` (
  `log_id` int(15) NOT NULL auto_increment,
  `access_date` datetime NOT NULL default '0001-01-01 00:00:00',
  `admin_id` int(11) NOT NULL default '0',
  `page_accessed` varchar(80) NOT NULL default '',
  `page_parameters` varchar(150) default NULL,
  `ip_address` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`log_id`),
  KEY `idx_page_accessed_zen` (`page_accessed`),
  KEY `idx_access_date_zen` (`access_date`),
  KEY `idx_ip_zen` (`ip_address`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcadmin_activity_log`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcauthorizenet`
-- 

CREATE TABLE `zcauthorizenet` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `customer_id` int(11) NOT NULL default '0',
  `order_id` int(11) NOT NULL default '0',
  `response_code` int(1) NOT NULL default '0',
  `response_text` varchar(255) NOT NULL default '',
  `authorization_type` text NOT NULL,
  `transaction_id` int(15) NOT NULL default '0',
  `sent` longtext NOT NULL,
  `received` longtext NOT NULL,
  `time` varchar(50) NOT NULL default '',
  `session_id` varchar(255) NOT NULL default '',
  UNIQUE KEY `idx_auth_net_id` (`id`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcauthorizenet`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcbanners`
-- 

CREATE TABLE `zcbanners` (
  `banners_id` int(11) NOT NULL auto_increment,
  `banners_title` varchar(64) NOT NULL default '',
  `banners_url` varchar(255) NOT NULL default '',
  `banners_image` varchar(64) NOT NULL default '',
  `banners_group` varchar(15) NOT NULL default '',
  `banners_html_text` text,
  `expires_impressions` int(7) default '0',
  `expires_date` datetime default NULL,
  `date_scheduled` datetime default NULL,
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  `date_status_change` datetime default NULL,
  `status` int(1) NOT NULL default '1',
  `banners_open_new_windows` int(1) NOT NULL default '1',
  `banners_on_ssl` int(1) NOT NULL default '1',
  `banners_sort_order` int(11) NOT NULL default '0',
  PRIMARY KEY  (`banners_id`),
  KEY `idx_status_group_zen` (`status`,`banners_group`)
)   AUTO_INCREMENT=9 ;

-- 
-- Volcar la base de datos para la tabla `zcbanners`
-- 

INSERT INTO `zcbanners` (`banners_id`, `banners_title`, `banners_url`, `banners_image`, `banners_group`, `banners_html_text`, `expires_impressions`, `expires_date`, `date_scheduled`, `date_added`, `date_status_change`, `status`, `banners_open_new_windows`, `banners_on_ssl`, `banners_sort_order`) VALUES (1, 'Zen Cart', 'http://www.zen-cart.com', 'banners/zencart_468_60_02.gif', 'Wide-Banners', '', 0, NULL, NULL, '2004-01-11 20:59:12', NULL, 1, 1, 1, 0),
(2, 'Zen Cart the art of e-commerce', 'http://www.zen-cart.com', 'banners/125zen_logo.gif', 'SideBox-Banners', '', 0, NULL, NULL, '2004-01-11 20:59:12', NULL, 1, 1, 1, 0),
(3, 'Zen Cart the art of e-commerce', 'http://www.zen-cart.com', 'banners/125x125_zen_logo.gif', 'SideBox-Banners', '', 0, NULL, NULL, '2004-01-11 20:59:12', NULL, 1, 1, 1, 0),
(4, 'if you have to think ... you haven''t been Zenned!', 'http://www.zen-cart.com', 'banners/think_anim.gif', 'Wide-Banners', '', 0, NULL, NULL, '2004-01-12 20:53:18', NULL, 1, 1, 1, 0),
(5, 'Chain Reaction Web', 'http://www.chainreactionweb.com', 'banners/crw-zen-banner.gif', 'Wide-Banners', '', 0, NULL, NULL, '2004-01-12 20:56:01', NULL, 1, 1, 1, 0),
(6, 'Sashbox.net - the ultimate e-commerce hosting solution', 'http://www.sashbox.net', 'banners/sashbox_125x50.jpg', 'BannersAll', '', 0, NULL, NULL, '2005-05-13 10:53:50', NULL, 1, 1, 1, 20),
(7, 'Zen Cart the art of e-commerce', 'http://www.zen-cart.com', 'banners/bw_zen_88wide.gif', 'BannersAll', '', 0, NULL, NULL, '2005-05-13 10:54:38', NULL, 1, 1, 1, 10),
(8, 'Sashbox.net - the ultimate e-commerce hosting solution', 'http://www.sashbox.net', 'banners/sashbox_468x60.jpg', 'Wide-Banners', '', 0, NULL, NULL, '2005-05-13 10:55:11', NULL, 1, 1, 1, 0);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcbanners_history`
-- 

CREATE TABLE `zcbanners_history` (
  `banners_history_id` int(11) NOT NULL auto_increment,
  `banners_id` int(11) NOT NULL default '0',
  `banners_shown` int(5) NOT NULL default '0',
  `banners_clicked` int(5) NOT NULL default '0',
  `banners_history_date` datetime NOT NULL default '0001-01-01 00:00:00',
  PRIMARY KEY  (`banners_history_id`),
  KEY `idx_banners_id_zen` (`banners_id`)
)   AUTO_INCREMENT=41 ;

-- 
-- Volcar la base de datos para la tabla `zcbanners_history`
-- 

INSERT INTO `zcbanners_history` (`banners_history_id`, `banners_id`, `banners_shown`, `banners_clicked`, `banners_history_date`) VALUES (1, 2, 16, 0, '2005-08-09 22:30:57'),
(2, 7, 21, 0, '2005-08-09 22:30:57'),
(3, 6, 21, 0, '2005-08-09 22:30:57'),
(4, 3, 20, 0, '2005-08-09 22:30:57'),
(5, 4, 1, 0, '2005-08-09 22:30:57'),
(6, 5, 1, 0, '2005-08-09 22:52:26'),
(7, 1, 1, 0, '2005-08-09 22:53:53'),
(8, 8, 1, 0, '2005-08-09 22:55:36'),
(9, 7, 125, 1, '2005-08-10 00:02:14'),
(10, 6, 125, 1, '2005-08-10 00:02:14'),
(11, 3, 125, 0, '2005-08-10 00:02:14'),
(12, 2, 109, 0, '2005-08-10 00:02:33'),
(13, 8, 2, 0, '2005-08-10 00:41:15'),
(14, 5, 1, 0, '2005-08-10 00:45:49'),
(15, 4, 1, 0, '2005-08-10 00:46:04'),
(16, 1, 1, 0, '2005-08-10 00:50:45'),
(17, 2, 41, 0, '2005-08-12 16:57:20'),
(18, 7, 44, 0, '2005-08-12 16:57:20'),
(19, 6, 44, 0, '2005-08-12 16:57:20'),
(20, 3, 47, 0, '2005-08-12 16:57:41'),
(21, 7, 144, 0, '2005-08-13 09:51:20'),
(22, 6, 144, 0, '2005-08-13 09:51:20'),
(23, 3, 135, 0, '2005-08-13 09:51:20'),
(24, 2, 153, 1, '2005-08-13 09:51:20'),
(25, 2, 86, 0, '2005-08-14 02:35:01'),
(26, 7, 93, 0, '2005-08-14 02:35:01'),
(27, 6, 93, 0, '2005-08-14 02:35:01'),
(28, 3, 100, 0, '2005-08-14 02:35:01'),
(29, 2, 77, 0, '2005-08-15 09:30:34'),
(30, 3, 55, 0, '2005-08-15 09:30:34'),
(31, 7, 66, 0, '2005-08-15 09:30:37'),
(32, 6, 66, 0, '2005-08-15 09:30:37'),
(33, 3, 35, 0, '2005-08-16 00:20:50'),
(34, 7, 35, 0, '2005-08-16 00:20:50'),
(35, 6, 35, 0, '2005-08-16 00:20:50'),
(36, 2, 36, 0, '2005-08-16 00:20:50'),
(37, 3, 7, 0, '2005-09-18 23:02:04'),
(38, 7, 6, 0, '2005-09-18 23:02:04'),
(39, 6, 6, 0, '2005-09-18 23:02:04'),
(40, 2, 5, 0, '2005-09-18 23:18:45');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zccategories`
-- 

CREATE TABLE `zccategories` (
  `categories_id` int(11) NOT NULL auto_increment,
  `categories_image` varchar(64) default NULL,
  `parent_id` int(11) NOT NULL default '0',
  `sort_order` int(3) default NULL,
  `date_added` datetime default NULL,
  `last_modified` datetime default NULL,
  `categories_status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`categories_id`),
  KEY `idx_parent_id_cat_id_zen` (`parent_id`,`categories_id`),
  KEY `idx_status_zen` (`categories_status`),
  KEY `idx_categories_parent_id_zen` (`parent_id`),
  KEY `idx_sort_order_zen` (`sort_order`)
)   AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `zccategories`
-- 

INSERT INTO `zccategories` (`categories_id`, `categories_image`, `parent_id`, `sort_order`, `date_added`, `last_modified`, `categories_status`) VALUES (1, 'Book Final.jpg', 0, 0, '2005-08-13 11:41:13', '2005-08-14 02:30:59', 1),
(2, 'incredibles-DVD-cover.jpg', 0, 0, '2005-08-13 11:41:26', '2005-08-14 02:31:29', 1),
(3, 'imageamer.jpg', 0, 0, '2005-08-15 11:17:52', NULL, 1),
(4, 'groses.jpg', 0, 0, '2005-08-15 11:19:22', NULL, 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zccategories_description`
-- 

CREATE TABLE `zccategories_description` (
  `categories_id` int(11) NOT NULL default '0',
  `language_id` int(11) NOT NULL default '1',
  `categories_name` varchar(32) NOT NULL default '',
  `categories_description` text NOT NULL,
  PRIMARY KEY  (`categories_id`,`language_id`),
  KEY `idx_categories_name_zen` (`categories_name`)
)  ;

-- 
-- Volcar la base de datos para la tabla `zccategories_description`
-- 

INSERT INTO `zccategories_description` (`categories_id`, `language_id`, `categories_name`, `categories_description`) VALUES (1, 1, 'Books', 'Books'),
(2, 1, 'DVDs', 'Dvd Movies'),
(3, 1, 'More DVDs', ''),
(4, 1, 'Cds', '');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcconfiguration`
-- 

CREATE TABLE `zcconfiguration` (
  `configuration_id` int(11) NOT NULL auto_increment,
  `configuration_title` text NOT NULL,
  `configuration_key` varchar(255) NOT NULL default '',
  `configuration_value` text NOT NULL,
  `configuration_description` text NOT NULL,
  `configuration_group_id` int(11) NOT NULL default '0',
  `sort_order` int(5) default NULL,
  `last_modified` datetime default NULL,
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  `use_function` text,
  `set_function` text,
  PRIMARY KEY  (`configuration_id`),
  UNIQUE KEY `unq_config_key_zen` (`configuration_key`),
  KEY `idx_key_value_zen` (`configuration_key`,`configuration_value`(10)),
  KEY `idx_cfg_grp_id_zen` (`configuration_group_id`)
)   AUTO_INCREMENT=480 ;

-- 
-- Volcar la base de datos para la tabla `zcconfiguration`
-- 

INSERT INTO `zcconfiguration` (`configuration_id`, `configuration_title`, `configuration_key`, `configuration_value`, `configuration_description`, `configuration_group_id`, `sort_order`, `last_modified`, `date_added`, `use_function`, `set_function`) VALUES (1, 'Store Name', 'STORE_NAME', 'Xoops Zen Cart', 'The name of my store', 1, 1, NULL, '2005-08-09 22:29:31', NULL, NULL),
(2, 'Store Owner', 'STORE_OWNER', 'Store Owner', 'The name of my store owner', 1, 2, NULL, '2005-08-09 22:29:31', NULL, NULL),
(3, 'Country', 'STORE_COUNTRY', '223', 'The country my store is located in <br /><br /><strong>Note: Please remember to update the store zone.</strong>', 1, 6, NULL, '2005-08-09 22:29:31', 'zen_get_country_name', 'zen_cfg_pull_down_country_list('),
(4, 'Zone', 'STORE_ZONE', '1', 'The zone my store is located in', 1, 7, NULL, '2005-08-09 22:29:31', 'zen_cfg_get_zone_name', 'zen_cfg_pull_down_zone_list('),
(5, 'Expected Sort Order', 'EXPECTED_PRODUCTS_SORT', 'desc', 'This is the sort order used in the expected products box.', 1, 8, NULL, '2005-08-09 22:29:31', NULL, 'zen_cfg_select_option(array(''asc'', ''desc''), '),
(6, 'Expected Sort Field', 'EXPECTED_PRODUCTS_FIELD', 'date_expected', 'The column to sort by in the expected products box.', 1, 9, NULL, '2005-08-09 22:29:31', NULL, 'zen_cfg_select_option(array(''products_name'', ''date_expected''), '),
(7, 'Switch To Default Language Currency', 'USE_DEFAULT_LANGUAGE_CURRENCY', 'false', 'Automatically switch to the language''s currency when it is changed', 1, 10, NULL, '2005-08-09 22:29:31', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(8, 'Use Search-Engine Safe URLs (still in development)', 'SEARCH_ENGINE_FRIENDLY_URLS', 'false', 'Use search-engine safe urls for all site links', 6, 12, NULL, '2005-08-09 22:29:31', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(9, 'Display Cart After Adding Product', 'DISPLAY_CART', 'true', 'Display the shopping cart after adding a product (or return back to their origin)', 1, 14, NULL, '2005-08-09 22:29:31', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(10, 'Default Search Operator', 'ADVANCED_SEARCH_DEFAULT_OPERATOR', 'and', 'Default search operators', 1, 17, NULL, '2005-08-09 22:29:31', NULL, 'zen_cfg_select_option(array(''and'', ''or''), '),
(11, 'Store Address and Phone', 'STORE_NAME_ADDRESS', 'Store Name\r\n Address\r\n Country\r\n Phone', 'This is the Store Name, Address and Phone used on printable documents and displayed online', 1, 18, NULL, '2005-08-09 22:29:32', NULL, 'zen_cfg_textarea('),
(12, 'Show Category Counts', 'SHOW_COUNTS', 'true', 'Count recursively how many products are in each category', 1, 19, NULL, '2005-08-09 22:29:32', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(13, 'Tax Decimal Places', 'TAX_DECIMAL_PLACES', '0', 'Pad the tax value this amount of decimal places', 1, 20, NULL, '2005-08-09 22:29:32', NULL, NULL),
(14, 'Display Prices with Tax', 'DISPLAY_PRICE_WITH_TAX', 'false', 'Display prices with tax included (true) or add the tax at the end (false)', 1, 21, NULL, '2005-08-09 22:29:32', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(15, 'Display Prices with Tax in Admin', 'DISPLAY_PRICE_WITH_TAX_ADMIN', 'false', 'Display prices with tax included (true) or add the tax at the end (false) in Admin(Invoices)', 1, 21, NULL, '2005-08-09 22:29:32', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(16, 'Basis of Product Tax', 'STORE_PRODUCT_TAX_BASIS', 'Shipping', 'On what basis is Product Tax calculated. Options are<br />Shipping - Based on customers Shipping Address<br />Billing Based on customers Billing address<br />Store - Based on Store address if Billing/Shipping Zone equals Store zone', 1, 21, NULL, '2005-08-09 22:29:32', NULL, 'zen_cfg_select_option(array(''Shipping'', ''Billing'', ''Store''), '),
(17, 'Basis of Shipping Tax', 'STORE_SHIPPING_TAX_BASIS', 'Shipping', 'On what basis is Shipping Tax calculated. Options are<br />Shipping - Based on customers Shipping Address<br />Billing Based on customers Billing address<br />Store - Based on Store address if Billing/Shipping Zone equals Store zone - Can be overriden by correctly written Shipping Module', 1, 21, NULL, '2005-08-09 22:29:32', NULL, 'zen_cfg_select_option(array(''Shipping'', ''Billing'', ''Store''), '),
(18, 'Sales Tax Display Status', 'STORE_TAX_DISPLAY_STATUS', '0', 'Always show Sales Tax even when amount is $0.00?<br />0= Off<br />1= On', 1, 21, NULL, '2005-08-09 22:29:32', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(19, 'Admin Session Time Out in Seconds', 'SESSION_TIMEOUT_ADMIN', '3600', 'Enter the time in seconds. Default=3600<br />Example: 3600= 1 hour<br /><br />Note: Too few seconds can result in timeout issues when adding/editing products', 1, 40, NULL, '2005-08-09 22:29:32', NULL, NULL),
(20, 'Admin Set max_execution_time for processes', 'GLOBAL_SET_TIME_LIMIT', '60', 'Enter the time in seconds for how long the max_execution_time of processes should be. Default=60<br />Example: 60= 1 minute<br /><br />Note: Changing the time limit is only needed if you are having problems with the execution time of a process', 1, 42, NULL, '2005-08-09 22:29:32', NULL, NULL),
(21, 'Show if version update available', 'SHOW_VERSION_UPDATE_IN_HEADER', 'true', 'Automatically check to see if a new version of Zen-Cart is available. Enabling this can sometimes slow down the loading of Admin pages. (Displayed on main Index page after login, and Server Info page.)', 1, 44, NULL, '2005-08-09 22:29:32', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(22, 'Store Status', 'STORE_STATUS', '0', 'What is your Store Status<br />0= Normal Store<br />1= Showcase no prices<br />2= Showcase with prices', 1, 25, NULL, '2005-08-09 22:29:32', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2''), '),
(23, 'Server Uptime', 'DISPLAY_SERVER_UPTIME', 'true', 'Displaying Server uptime can cause entries in error logs on some servers. (true = Display, false = don''t display)', 1, 46, '2003-11-08 20:24:47', '0001-01-01 00:00:00', '', 'zen_cfg_select_option(array(''true'', ''false''),'),
(24, 'Missing Page Check', 'MISSING_PAGE_CHECK', 'true', 'Zen-Cart can check for missing pages in the URL and redirect to Index page. For debugging you may want to turn this off. (true = Check for missing pages, false = Don''t check for missing pages)', 1, 48, '2003-11-08 20:24:47', '0001-01-01 00:00:00', '', 'zen_cfg_select_option(array(''true'', ''false''),'),
(25, 'HTML Editor', 'HTML_EDITOR_PREFERENCE', 'NONE', 'Please select the HTML/Rich-Text editor you wish to use for composing Admin-related emails, newsletters, and product descriptions', 1, 110, NULL, '2005-08-09 22:29:32', NULL, 'zen_cfg_select_option(array(''HTMLAREA'', ''NONE''),'),
(26, 'Enable phpBB linkage?', 'PHPBB_LINKS_ENABLED', 'false', 'Should Zen Cart synchronize new account information to your (already-installed) phpBB forum?', 1, 120, NULL, '2005-08-09 22:29:32', NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(27, 'Show Category Counts - Admin', 'SHOW_COUNTS_ADMIN', 'true', 'Show Category Counts in Admin?', 1, 130, NULL, '2005-08-09 22:29:32', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(28, 'First Name', 'ENTRY_FIRST_NAME_MIN_LENGTH', '2', 'Minimum length of first name', 2, 1, NULL, '2005-08-09 22:29:32', NULL, NULL),
(29, 'Last Name', 'ENTRY_LAST_NAME_MIN_LENGTH', '2', 'Minimum length of last name', 2, 2, NULL, '2005-08-09 22:29:32', NULL, NULL),
(30, 'Date of Birth', 'ENTRY_DOB_MIN_LENGTH', '10', 'Minimum length of date of birth', 2, 3, NULL, '2005-08-09 22:29:32', NULL, NULL),
(31, 'E-Mail Address', 'ENTRY_EMAIL_ADDRESS_MIN_LENGTH', '6', 'Minimum length of e-mail address', 2, 4, NULL, '2005-08-09 22:29:32', NULL, NULL),
(32, 'Street Address', 'ENTRY_STREET_ADDRESS_MIN_LENGTH', '5', 'Minimum length of street address', 2, 5, NULL, '2005-08-09 22:29:32', NULL, NULL),
(33, 'Company', 'ENTRY_COMPANY_MIN_LENGTH', '2', 'Minimum length of company name', 2, 6, NULL, '2005-08-09 22:29:32', NULL, NULL),
(34, 'Post Code', 'ENTRY_POSTCODE_MIN_LENGTH', '4', 'Minimum length of post code', 2, 7, NULL, '2005-08-09 22:29:32', NULL, NULL),
(35, 'City', 'ENTRY_CITY_MIN_LENGTH', '3', 'Minimum length of city', 2, 8, NULL, '2005-08-09 22:29:32', NULL, NULL),
(36, 'State', 'ENTRY_STATE_MIN_LENGTH', '2', 'Minimum length of state', 2, 9, NULL, '2005-08-09 22:29:32', NULL, NULL),
(37, 'Telephone Number', 'ENTRY_TELEPHONE_MIN_LENGTH', '3', 'Minimum length of telephone number', 2, 10, NULL, '2005-08-09 22:29:32', NULL, NULL),
(38, 'Password', 'ENTRY_PASSWORD_MIN_LENGTH', '5', 'Minimum length of password', 2, 11, NULL, '2005-08-09 22:29:32', NULL, NULL),
(39, 'Credit Card Owner Name', 'CC_OWNER_MIN_LENGTH', '3', 'Minimum length of credit card owner name', 2, 12, NULL, '2005-08-09 22:29:32', NULL, NULL),
(40, 'Credit Card Number', 'CC_NUMBER_MIN_LENGTH', '10', 'Minimum length of credit card number', 2, 13, NULL, '2005-08-09 22:29:32', NULL, NULL),
(41, 'Credit Card CVV Number', 'CC_CVV_MIN_LENGTH', '3', 'Minimum length of credit card CVV number', 2, 13, NULL, '2005-08-09 22:29:32', NULL, NULL),
(42, 'Product Review Text', 'REVIEW_TEXT_MIN_LENGTH', '50', 'Minimum length of product review text', 2, 14, NULL, '2005-08-09 22:29:32', NULL, NULL),
(43, 'Best Sellers', 'MIN_DISPLAY_BESTSELLERS', '1', 'Minimum number of best sellers to display', 2, 15, NULL, '2005-08-09 22:29:32', NULL, NULL),
(44, 'Also Purchased Products', 'MIN_DISPLAY_ALSO_PURCHASED', '1', 'Minimum number of products to display in the ''This Customer Also Purchased'' box', 2, 16, NULL, '2005-08-09 22:29:32', NULL, NULL),
(45, 'Nick Name', 'ENTRY_NICK_MIN_LENGTH', '3', 'Minimum length of Nick Name', 2, 1, NULL, '2005-08-09 22:29:32', NULL, NULL),
(46, 'Address Book Entries', 'MAX_ADDRESS_BOOK_ENTRIES', '5', 'Maximum address book entries a customer is allowed to have', 3, 1, NULL, '2005-08-09 22:29:32', NULL, NULL),
(47, 'Search Results Per Page', 'MAX_DISPLAY_SEARCH_RESULTS', '20', 'Number of products to list on a search result page', 3, 2, NULL, '2005-08-09 22:29:32', NULL, NULL),
(48, 'Prev/Next Navigation Page Links', 'MAX_DISPLAY_PAGE_LINKS', '5', 'Number of ''number'' links use for page-sets', 3, 3, NULL, '2005-08-09 22:29:32', NULL, NULL),
(49, 'Products on Special ', 'MAX_DISPLAY_SPECIAL_PRODUCTS', '9', 'Number of products on special to display', 3, 4, NULL, '2005-08-09 22:29:32', NULL, NULL),
(50, 'New Products Module', 'MAX_DISPLAY_NEW_PRODUCTS', '9', 'Number of new products to display in a category', 3, 5, NULL, '2005-08-09 22:29:32', NULL, NULL),
(51, 'Upcoming Products ', 'MAX_DISPLAY_UPCOMING_PRODUCTS', '10', 'Number of ''upcoming'' products to display', 3, 6, NULL, '2005-08-09 22:29:32', NULL, NULL),
(52, 'Manufacturers List - Scroll Box Size/Style', 'MAX_MANUFACTURERS_LIST', '3', 'Number of manufacturers names to be displayed in the scroll box window. Setting this to 1 or 0 will display a dropdown list.', 3, 7, NULL, '2005-08-09 22:29:32', NULL, NULL),
(53, 'Manufacturers List - Verify Product Exist', 'PRODUCTS_MANUFACTURERS_STATUS', '1', 'Verify that at least 1 product exists and is active for the manufacturer name to show<br /><br />Note: When this feature is ON it can produce slower results on sites with a large number of products and/or manufacturers<br />0= off 1= on', 3, 7, NULL, '2005-08-09 22:29:32', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(54, 'Music Genre List - Scroll Box Size/Style', 'MAX_MUSIC_GENRES_LIST', '3', 'Number of music genre names to be displayed in the scroll box window. Setting this to 1 or 0 will display a dropdown list.', 3, 7, NULL, '2005-08-09 22:29:32', NULL, NULL),
(55, 'Record Company List - Scroll Box Size/Style', 'MAX_RECORD_COMPANY_LIST', '3', 'Number of record company names to be displayed in the scroll box window. Setting this to 1 or 0 will display a dropdown list.', 3, 7, NULL, '2005-08-09 22:29:32', NULL, NULL),
(56, 'Length of Record Company Name', 'MAX_DISPLAY_RECORD_COMPANY_NAME_LEN', '15', 'Used in record companies box; maximum length of record company name to display. Longer names will be truncated.', 3, 8, NULL, '2005-08-09 22:29:32', NULL, NULL),
(57, 'Length of Music Genre Name', 'MAX_DISPLAY_MUSIC_GENRES_NAME_LEN', '15', 'Used in music genres box; maximum length of music genre name to display. Longer names will be truncated.', 3, 8, NULL, '2005-08-09 22:29:32', NULL, NULL),
(58, 'Length of Manufacturers Name', 'MAX_DISPLAY_MANUFACTURER_NAME_LEN', '15', 'Used in manufacturers box; maximum length of manufacturers name to display. Longer names will be truncated.', 3, 8, NULL, '2005-08-09 22:29:32', NULL, NULL),
(59, 'New Product Reviews Per Page', 'MAX_DISPLAY_NEW_REVIEWS', '6', 'Number of new reviews to display on each page', 3, 9, NULL, '2005-08-09 22:29:32', NULL, NULL),
(60, 'Random Product Reviews For Box', 'MAX_RANDOM_SELECT_REVIEWS', '10', 'Number of random product reviews to rotate in the box', 3, 10, NULL, '2005-08-09 22:29:32', NULL, NULL),
(61, 'Random New Products For Box', 'MAX_RANDOM_SELECT_NEW', '10', 'Number of random new product to display in box', 3, 11, NULL, '2005-08-09 22:29:32', NULL, NULL),
(62, 'Random Products On Special For Box', 'MAX_RANDOM_SELECT_SPECIALS', '10', 'Number of random products on special to display in box', 3, 12, NULL, '2005-08-09 22:29:32', NULL, NULL),
(63, 'Categories To List Per Row', 'MAX_DISPLAY_CATEGORIES_PER_ROW', '3', 'How many categories to list per row', 3, 13, NULL, '2005-08-09 22:29:32', NULL, NULL),
(64, 'New Products Listing- Number Per Page', 'MAX_DISPLAY_PRODUCTS_NEW', '10', 'Number of new products'' listings per page', 3, 14, NULL, '2005-08-09 22:29:32', NULL, NULL),
(65, 'Best Sellers For Box', 'MAX_DISPLAY_BESTSELLERS', '10', 'Number of best sellers to display in box', 3, 15, NULL, '2005-08-09 22:29:32', NULL, NULL),
(66, 'Also Purchased Products', 'MAX_DISPLAY_ALSO_PURCHASED', '6', 'Number of products to display in the ''This Customer Also Purchased'' box', 3, 16, NULL, '2005-08-09 22:29:32', NULL, NULL),
(67, 'Recent Purchases Box- NOTE: box is disabled ', 'MAX_DISPLAY_PRODUCTS_IN_ORDER_HISTORY_BOX', '6', 'Number of products to display in the recent purchases box', 3, 17, NULL, '2005-08-09 22:29:32', NULL, NULL),
(68, 'Customer Order History List Per Page', 'MAX_DISPLAY_ORDER_HISTORY', '10', 'Number of orders to display in the order history list in ''My Account''', 3, 18, NULL, '2005-08-09 22:29:32', NULL, NULL),
(69, 'Maximum Display of Customers on Customers Page', 'MAX_DISPLAY_SEARCH_RESULTS_CUSTOMER', '20', '', 3, 19, NULL, '2005-08-09 22:29:32', NULL, NULL),
(70, 'Maximum Display of Orders on Orders Page', 'MAX_DISPLAY_SEARCH_RESULTS_ORDERS', '20', '', 3, 20, NULL, '2005-08-09 22:29:32', NULL, NULL),
(71, 'Maximum Display of Products on Reports', 'MAX_DISPLAY_SEARCH_RESULTS_REPORTS', '20', '', 3, 21, NULL, '2005-08-09 22:29:32', NULL, NULL),
(72, 'Maximum Categories Products Display List', 'MAX_DISPLAY_RESULTS_CATEGORIES', '10', 'Number of products to list per screen', 3, 22, NULL, '2005-08-09 22:29:32', NULL, NULL),
(73, 'Products Listing- Number Per Page', 'MAX_DISPLAY_PRODUCTS_LISTING', '10', 'Maximum Number of Products to list per page on main page', 3, 30, NULL, '2005-08-09 22:29:32', NULL, NULL),
(74, 'Products Attributes - Option Names and Values Display', 'MAX_ROW_LISTS_OPTIONS', '10', 'Maximum number of option names and values to display in the products attributes page', 3, 24, NULL, '2005-08-09 22:29:32', NULL, NULL),
(75, 'Products Attributes - Attributes Controller Display', 'MAX_ROW_LISTS_ATTRIBUTES_CONTROLLER', '30', 'Maximum number of attributes to display in the Attributes Controller page', 3, 25, NULL, '2005-08-09 22:29:32', NULL, NULL),
(76, 'Products Attributes - Downloads Manager Display', 'MAX_DISPLAY_SEARCH_RESULTS_DOWNLOADS_MANAGER', '30', 'Maximum number of attributes downloads to display in the Downloads Manager page', 3, 26, NULL, '2005-08-09 22:29:32', NULL, NULL),
(77, 'Featured Products - Number to Display Admin', 'MAX_DISPLAY_SEARCH_RESULTS_FEATURED_ADMIN', '10', 'Number of featured products to list per screen - Admin', 3, 27, NULL, '2005-08-09 22:29:32', NULL, NULL),
(78, 'Maximum Display of Featured Products - Main Page', 'MAX_DISPLAY_SEARCH_RESULTS_FEATURED', '9', 'Number of featured products to list on main page', 3, 28, NULL, '2005-08-09 22:29:32', NULL, NULL),
(79, 'Maximum Display of Featured Products Page', 'MAX_DISPLAY_PRODUCTS_FEATURED_PRODUCTS', '10', 'Number of featured products to list per screen', 3, 29, NULL, '2005-08-09 22:29:32', NULL, NULL),
(80, 'Random Featured Products For Box', 'MAX_RANDOM_SELECT_FEATURED_PRODUCTS', '10', 'Number of random featured products to display in box', 3, 30, NULL, '2005-08-09 22:29:32', NULL, NULL),
(81, 'Maximum Display of Specials Products - Main Page', 'MAX_DISPLAY_SPECIAL_PRODUCTS_INDEX', '9', 'Number of special products to list on main page', 3, 31, NULL, '2005-08-09 22:29:32', NULL, NULL),
(82, 'New Product Listing - Limited to ...', 'SHOW_NEW_PRODUCTS_LIMIT', '0', 'Limit the New Product Listing to<br />0= All desc<br />1= Current Month<br />30= 30 Days<br />60= 60 Days<br />90= 90 Days<br />120= 120 Days', 3, 40, NULL, '2005-08-09 22:29:32', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''30'', ''60'', ''90'', ''120''), '),
(83, 'Maximum Display of Products All Page', 'MAX_DISPLAY_PRODUCTS_ALL', '10', 'Number of products to list per screen', 3, 45, NULL, '2005-08-09 22:29:32', NULL, NULL),
(84, 'Maximum Display of Language Flags in Language Side Box', 'MAX_LANGUAGE_FLAGS_COLUMNS', '3', 'Number of Language Flags per Row', 3, 50, NULL, '2005-08-09 22:29:32', NULL, NULL),
(85, 'Maximum File Upload Size', 'MAX_FILE_UPLOAD_SIZE', '2048000', 'What is the Maximum file size for uploads?<br />Default= 2048000', 3, 60, NULL, '2005-08-09 22:29:32', NULL, NULL),
(86, 'Allowed Filename Extensions for uploading', 'UPLOAD_FILENAME_EXTENSIONS', 'jpg,jpeg,gif,png,eps,cdr,ai,pdf,tif,tiff,bmp,zip', 'List the permissible filetypes (filename extensions) to be allowed when files are uploaded to your site by customers. Separate multiple values with commas(,). Do not include the dot(.).<br /><br />Suggested setting: "jpg,jpeg,gif,png,eps,cdr,ai,pdf,tif,tiff,bmp,zip"', 3, 61, NULL, '2005-08-09 22:29:32', NULL, 'zen_cfg_textarea('),
(87, 'Maximum Orders Detail Display on Admin Orders Listing', 'MAX_DISPLAY_RESULTS_ORDERS_DETAILS_LISTING', '0', 'Maximum number of Order Details<br />0 = Unlimited', 3, 65, NULL, '2005-08-09 22:29:32', NULL, NULL),
(88, 'Maximum Display Columns Products to Multiple Categories Manager', 'MAX_DISPLAY_PRODUCTS_TO_CATEGORIES_COLUMNS', '3', 'Maximum Display Columns Products to Multiple Categories Manager<br />3 = Default', 3, 70, NULL, '2005-08-09 22:29:32', NULL, NULL),
(89, 'Small Image Width', 'SMALL_IMAGE_WIDTH', '100', 'The pixel width of small images', 4, 1, NULL, '2005-08-09 22:29:32', NULL, NULL),
(90, 'Small Image Height', 'SMALL_IMAGE_HEIGHT', '80', 'The pixel height of small images', 4, 2, NULL, '2005-08-09 22:29:32', NULL, NULL),
(91, 'Heading Image Width', 'HEADING_IMAGE_WIDTH', '57', 'The pixel width of heading images', 4, 3, NULL, '2005-08-09 22:29:32', NULL, NULL),
(92, 'Heading Image Height', 'HEADING_IMAGE_HEIGHT', '40', 'The pixel height of heading images', 4, 4, NULL, '2005-08-09 22:29:32', NULL, NULL),
(93, 'Subcategory Image Width', 'SUBCATEGORY_IMAGE_WIDTH', '100', 'The pixel width of subcategory images', 4, 5, NULL, '2005-08-09 22:29:32', NULL, NULL),
(94, 'Subcategory Image Height', 'SUBCATEGORY_IMAGE_HEIGHT', '57', 'The pixel height of subcategory images', 4, 6, NULL, '2005-08-09 22:29:32', NULL, NULL),
(95, 'Calculate Image Size', 'CONFIG_CALCULATE_IMAGE_SIZE', 'true', 'Calculate the size of images?', 4, 7, NULL, '2005-08-09 22:29:32', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(96, 'Image Required', 'IMAGE_REQUIRED', 'true', 'Enable to display broken images. Good for development.', 4, 8, NULL, '2005-08-09 22:29:32', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(97, 'Image - Shopping Cart Status', 'IMAGE_SHOPPING_CART_STATUS', '1', 'Show product image in the shopping cart?<br />0= off 1= on', 4, 9, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(98, 'Image - Shopping Cart Width', 'IMAGE_SHOPPING_CART_WIDTH', '50', 'Default = 50', 4, 10, NULL, '2005-08-09 22:29:33', NULL, NULL),
(99, 'Image - Shopping Cart Height', 'IMAGE_SHOPPING_CART_HEIGHT', '40', 'Default = 40', 4, 11, NULL, '2005-08-09 22:29:33', NULL, NULL),
(100, 'Product Info - Image Width', 'MEDIUM_IMAGE_WIDTH', '150', 'The pixel width of Product Info images', 4, 20, NULL, '2005-08-09 22:29:33', NULL, NULL),
(101, 'Product Info - Image Height', 'MEDIUM_IMAGE_HEIGHT', '120', 'The pixel height of Product Info images', 4, 21, NULL, '2005-08-09 22:29:33', NULL, NULL),
(102, 'Product Info - Image Medium Suffix', 'IMAGE_SUFFIX_MEDIUM', '_MED', 'Product Info Medium Image Suffix<br />Default = _MED', 4, 22, NULL, '2005-08-09 22:29:33', NULL, NULL),
(103, 'Product Info - Image Large Suffix', 'IMAGE_SUFFIX_LARGE', '_LRG', 'Product Info Large Image Suffix<br />Default = _LRG', 4, 23, NULL, '2005-08-09 22:29:33', NULL, NULL),
(104, 'Product Info - Number of Additional Images per Row', 'IMAGES_AUTO_ADDED', '3', 'Product Info - Enter the number of additional images to display per row<br />Default = 3', 4, 30, NULL, '2005-08-09 22:29:33', NULL, NULL),
(105, 'Image - Product Listing Width', 'IMAGE_PRODUCT_LISTING_WIDTH', '100', 'Default = 100', 4, 40, NULL, '2005-08-09 22:29:33', NULL, NULL),
(106, 'Image - Product Listing Height', 'IMAGE_PRODUCT_LISTING_HEIGHT', '80', 'Default = 80', 4, 41, NULL, '2005-08-09 22:29:33', NULL, NULL),
(107, 'Image - Product New Listing Width', 'IMAGE_PRODUCT_NEW_LISTING_WIDTH', '100', 'Default = 100', 4, 42, NULL, '2005-08-09 22:29:33', NULL, NULL),
(108, 'Image - Product New Listing Height', 'IMAGE_PRODUCT_NEW_LISTING_HEIGHT', '80', 'Default = 80', 4, 43, NULL, '2005-08-09 22:29:33', NULL, NULL),
(109, 'Image - New Products Width', 'IMAGE_PRODUCT_NEW_WIDTH', '100', 'Default = 100', 4, 44, NULL, '2005-08-09 22:29:33', NULL, NULL),
(110, 'Image - New Products Height', 'IMAGE_PRODUCT_NEW_HEIGHT', '80', 'Default = 80', 4, 45, NULL, '2005-08-09 22:29:33', NULL, NULL),
(111, 'Image - Featured Products Width', 'IMAGE_FEATURED_PRODUCTS_LISTING_WIDTH', '100', 'Default = 100', 4, 46, NULL, '2005-08-09 22:29:33', NULL, NULL),
(112, 'Image - Featured Products Height', 'IMAGE_FEATURED_PRODUCTS_LISTING_HEIGHT', '80', 'Default = 80', 4, 47, NULL, '2005-08-09 22:29:33', NULL, NULL),
(113, 'Image - Product All Listing Width', 'IMAGE_PRODUCT_ALL_LISTING_WIDTH', '100', 'Default = 100', 4, 48, NULL, '2005-08-09 22:29:33', NULL, NULL),
(114, 'Image - Product All Listing Height', 'IMAGE_PRODUCT_ALL_LISTING_HEIGHT', '80', 'Default = 80', 4, 49, NULL, '2005-08-09 22:29:33', NULL, NULL),
(115, 'Product Image - No Image Status', 'PRODUCTS_IMAGE_NO_IMAGE_STATUS', '1', 'Use automatic No Image when none is added to product<br />0= off<br />1= On', 4, 60, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(116, 'Product Image - No Image picture', 'PRODUCTS_IMAGE_NO_IMAGE', 'no_picture.gif', 'Use automatic No Image when none is added to product<br />Default = no_picture.gif', 4, 61, NULL, '2005-08-09 22:29:33', NULL, NULL),
(117, 'Image - Use Proportional Images on Products and Categories', 'PROPORTIONAL_IMAGES_STATUS', '1', 'Use Proportional Images on Products and Categories?<br /><br />NOTE: Do not use 0 height or width settings for Proportion Images<br />0= off 1= on', 4, 75, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(118, 'Email Salutation', 'ACCOUNT_GENDER', 'true', 'Display salutation choice during account creation and with account information', 5, 1, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(119, 'Date of Birth', 'ACCOUNT_DOB', 'true', 'Display date of birth field during account creation and with account information', 5, 2, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(120, 'Company', 'ACCOUNT_COMPANY', 'true', 'Display company field during account creation and with account information', 5, 3, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(121, 'Address Line 2', 'ACCOUNT_SUBURB', 'true', 'Display address line 2 field during account creation and with account information', 5, 4, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(122, 'State', 'ACCOUNT_STATE', 'true', 'Display state field during account creation and with account information', 5, 5, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(123, 'Create Account Default Country ID', 'SHOW_CREATE_ACCOUNT_DEFAULT_COUNTRY', '223', 'Set Create Account Default Country ID to:<br />Default is 223', 5, 6, NULL, '2005-08-09 22:29:33', 'zen_get_country_name', 'zen_cfg_pull_down_country_list_none('),
(124, 'Show Newsletter Checkbox', 'ACCOUNT_NEWSLETTER_STATUS', '1', 'Show Newsletter Checkbox<br />0= off<br />1= Display Unchecked<br />2= Display Checked<br /><strong>Note: Defaulting this to accepted may be in violation of certain regulations for your state or country</strong>', 5, 45, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2''), '),
(125, 'Customer Default Email Preference', 'ACCOUNT_EMAIL_PREFERENCE', '0', 'Set the Default Customer Default Email Preference<br />0= Text<br />1= HTML<br /><strong>Note: Defaulting this to accepted may be in violation of certain regulations for your state or country</strong>', 5, 46, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(126, 'Customer Product Notification Status', 'CUSTOMERS_PRODUCTS_NOTIFICATION_STATUS', '1', 'Customer should be asked about product notifications after checkout success<br />0= Never ask<br />1= Ask, unless already set to global<br /><br />Note: Sidebox must be turned off separately', 5, 50, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(127, 'Customer Shop Status - View Shop and Prices', 'CUSTOMERS_APPROVAL', '0', 'Customer must be approved to shop<br />0= Not required<br />1= Must login to browse<br />2= May browse but no prices unless logged in<br />3= Showroom Only<br /><br />It is recommended that Option 2 be used for the purposes of Spiders if you wish customers to login to see prices.', 5, 55, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''), '),
(128, 'Customer Approval Status - Authorization Pending', 'CUSTOMERS_APPROVAL_AUTHORIZATION', '0', 'Customer must be Authorized to shop<br />0= Not required<br />1= Must be Authorized to Browse<br />2= May browse but no prices unless Authorized<br />3= Customer May Browse and May see Prices but Must be Authorized to Buy<br /><br />It is recommended that Option 2 or 3 be used for the purposes of Spiders', 5, 65, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''), '),
(129, 'Customer Authorization: filename', 'CUSTOMERS_AUTHORIZATION_FILENAME', 'customers_authorization', 'Customer Authorization filename<br />Note: Do not include the extention<br />Default=customers_authorization', 5, 66, NULL, '2005-08-09 22:29:33', NULL, ''),
(130, 'Customer Authorization: Hide Header', 'CUSTOMERS_AUTHORIZATION_HEADER_OFF', 'false', 'Customer Authorization: Hide Header <br />(true=hide false=show)', 5, 67, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(131, 'Customer Authorization: Hide Column Left', 'CUSTOMERS_AUTHORIZATION_COLUMN_LEFT_OFF', 'false', 'Customer Authorization: Hide Column Left <br />(true=hide false=show)', 5, 68, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(132, 'Customer Authorization: Hide Column Right', 'CUSTOMERS_AUTHORIZATION_COLUMN_RIGHT_OFF', 'false', 'Customer Authorization: Hide Column Right <br />(true=hide false=show)', 5, 69, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(133, 'Customer Authorization: Hide Footer', 'CUSTOMERS_AUTHORIZATION_FOOTER_OFF', 'false', 'Customer Authorization: Hide Footer <br />(true=hide false=show)', 5, 70, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(134, 'Customer Authorization: Hide Prices', 'CUSTOMERS_AUTHORIZATION_PRICES_OFF', 'false', 'Customer Authorization: Hide Prices <br />(true=hide false=show)', 5, 71, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(135, 'Customers Referral Status', 'CUSTOMERS_REFERRAL_STATUS', '0', 'Customers Referral Code is created from<br />0= Off<br />1= 1st Discount Coupon Code used<br />2= Customer can add during create account or edit if blank<br /><br />NOTE: Once the Customers Referral Code has been set it can only be changed in the Admin Customer', 5, 80, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2''), '),
(136, 'Installed Modules', 'MODULE_PAYMENT_INSTALLED', 'cc.php;cod.php;moneyorder.php;paypal.php', 'List of payment module filenames separated by a semi-colon. This is automatically updated. No need to edit. (Example: cc.php;cod.php;paypal.php)', 6, 0, '2005-08-15 11:00:04', '2005-08-09 22:29:33', NULL, NULL),
(137, 'Installed Modules', 'MODULE_ORDER_TOTAL_INSTALLED', 'ot_subtotal.php;ot_tax.php;ot_shipping.php;ot_gv.php;ot_coupon.php;ot_total.php', 'List of order_total module filenames separated by a semi-colon. This is automatically updated. No need to edit. (Example: ot_subtotal.php;ot_tax.php;ot_shipping.php;ot_total.php)', 6, 0, NULL, '2005-08-09 22:29:33', NULL, NULL),
(138, 'Installed Modules', 'MODULE_SHIPPING_INSTALLED', 'flat.php', 'List of shipping module filenames separated by a semi-colon. This is automatically updated. No need to edit. (Example: ups.php;flat.php;item.php)', 6, 0, NULL, '2005-08-09 22:29:33', NULL, NULL),
(139, 'Enable Cash On Delivery Module', 'MODULE_PAYMENT_COD_STATUS', 'True', 'Do you want to accept Cash On Delevery payments?', 6, 1, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''True'', ''False''), '),
(140, 'Payment Zone', 'MODULE_PAYMENT_COD_ZONE', '0', 'If a zone is selected, only enable this payment method for that zone.', 6, 2, NULL, '2005-08-09 22:29:33', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes('),
(141, 'Sort order of display.', 'MODULE_PAYMENT_COD_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2005-08-09 22:29:33', NULL, NULL),
(142, 'Set Order Status', 'MODULE_PAYMENT_COD_ORDER_STATUS_ID', '0', 'Set the status of orders made with this payment module to this value', 6, 0, NULL, '2005-08-09 22:29:33', 'zen_get_order_status_name', 'zen_cfg_pull_down_order_statuses('),
(143, 'Enable Credit Card Module', 'MODULE_PAYMENT_CC_STATUS', 'True', 'Do you want to accept credit card payments?', 6, 0, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''True'', ''False''), '),
(144, 'Split Credit Card E-Mail Address', 'MODULE_PAYMENT_CC_EMAIL', '', 'If an e-mail address is entered, the middle digits of the credit card number will be sent to the e-mail address (the outside digits are stored in the database with the middle digits censored)', 6, 0, NULL, '2005-08-09 22:29:33', NULL, NULL),
(145, 'Collect & store the CVV number', 'MODULE_PAYMENT_CC_COLLECT_CVV', 'True', 'Do you want to collect the CVV number. Note: If you do the CVV number will be stored in the database in an encoded format.', 6, 0, NULL, '2004-01-11 22:55:51', NULL, 'zen_cfg_select_option(array(''True'', ''False''),'),
(146, 'Store the Credit Card Number', 'MODULE_PAYMENT_CC_STORE_NUMBER', 'False', 'Do you want to store the Credit Card Number. Note: The Credit Card Number will be stored unenecrypted, and as such may represent a security problem', 6, 0, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''True'', ''False''),'),
(147, 'Sort order of display.', 'MODULE_PAYMENT_CC_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2005-08-09 22:29:33', NULL, NULL),
(148, 'Payment Zone', 'MODULE_PAYMENT_CC_ZONE', '0', 'If a zone is selected, only enable this payment method for that zone.', 6, 2, NULL, '2005-08-09 22:29:33', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes('),
(149, 'Set Order Status', 'MODULE_PAYMENT_CC_ORDER_STATUS_ID', '0', 'Set the status of orders made with this payment module to this value', 6, 0, NULL, '2005-08-09 22:29:33', 'zen_get_order_status_name', 'zen_cfg_pull_down_order_statuses('),
(150, 'Enable Flat Shipping', 'MODULE_SHIPPING_FLAT_STATUS', 'True', 'Do you want to offer flat rate shipping?', 6, 0, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''True'', ''False''), '),
(151, 'Shipping Cost', 'MODULE_SHIPPING_FLAT_COST', '5.00', 'The shipping cost for all orders using this shipping method.', 6, 0, NULL, '2005-08-09 22:29:33', NULL, NULL),
(152, 'Tax Class', 'MODULE_SHIPPING_FLAT_TAX_CLASS', '0', 'Use the following tax class on the shipping fee.', 6, 0, NULL, '2005-08-09 22:29:33', 'zen_get_tax_class_title', 'zen_cfg_pull_down_tax_classes('),
(153, 'Tax Basis', 'MODULE_SHIPPING_FLAT_TAX_BASIS', 'Shipping', 'On what basis is Shipping Tax calculated. Options are<br />Shipping - Based on customers Shipping Address<br />Billing Based on customers Billing address<br />Store - Based on Store address if Billing/Shipping Zone equals Store zone', 6, 0, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''Shipping'', ''Billing'', ''Store''), '),
(154, 'Shipping Zone', 'MODULE_SHIPPING_FLAT_ZONE', '0', 'If a zone is selected, only enable this shipping method for that zone.', 6, 0, NULL, '2005-08-09 22:29:33', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes('),
(155, 'Sort Order', 'MODULE_SHIPPING_FLAT_SORT_ORDER', '0', 'Sort order of display.', 6, 0, NULL, '2005-08-09 22:29:33', NULL, NULL),
(156, 'Default Currency', 'DEFAULT_CURRENCY', 'USD', 'Default Currency', 6, 0, NULL, '2005-08-09 22:29:33', NULL, NULL),
(157, 'Default Language', 'DEFAULT_LANGUAGE', 'en', 'Default Language', 6, 0, NULL, '2005-08-09 22:29:33', NULL, NULL),
(158, 'Default Order Status For New Orders', 'DEFAULT_ORDERS_STATUS_ID', '1', 'When a new order is created, this order status will be assigned to it.', 6, 0, NULL, '2005-08-09 22:29:33', NULL, NULL),
(159, 'Admin configuration_key shows', 'ADMIN_CONFIGURATION_KEY_ON', '0', 'Manually switch to value of 1 to see the configuration_key name in configuration displays', 6, 0, NULL, '2005-08-09 22:29:33', NULL, NULL),
(160, 'Country of Origin', 'SHIPPING_ORIGIN_COUNTRY', '223', 'Select the country of origin to be used in shipping quotes.', 7, 1, NULL, '2005-08-09 22:29:33', 'zen_get_country_name', 'zen_cfg_pull_down_country_list('),
(161, 'Postal Code', 'SHIPPING_ORIGIN_ZIP', 'NONE', 'Enter the Postal Code (ZIP) of the Store to be used in shipping quotes. NOTE: For USA zip codes, only use your 5 digit zip code.', 7, 2, NULL, '2005-08-09 22:29:33', NULL, NULL),
(162, 'Enter the Maximum Package Weight you will ship', 'SHIPPING_MAX_WEIGHT', '50', 'Carriers have a max weight limit for a single package. This is a common one for all.', 7, 3, NULL, '2005-08-09 22:29:33', NULL, NULL),
(163, 'Package Tare Small to Medium - added percentage:weight', 'SHIPPING_BOX_WEIGHT', '0:3', 'What is the weight of typical packaging of small to medium packages?<br />Example: 10% + 1lb 10:1<br />10% + 0lbs 10:0<br />0% + 5lbs 0:5<br />0% + 0lbs 0:0', 7, 4, NULL, '2005-08-09 22:29:33', NULL, NULL),
(164, 'Larger packages - added packaging percentage:weight', 'SHIPPING_BOX_PADDING', '10:0', 'What is the weight of typical packaging for Large packages?<br />Example: 10% + 1lb 10:1<br />10% + 0lbs 10:0<br />0% + 5lbs 0:5<br />0% + 0lbs 0:0', 7, 5, NULL, '2005-08-09 22:29:33', NULL, NULL),
(165, 'Display Number of Boxes and Weight Status', 'SHIPPING_BOX_WEIGHT_DISPLAY', '3', 'Display Shipping Weight and Number of Boxes?<br /><br />0= off<br />1= Boxes Only<br />2= Weight Only<br />3= Both Boxes and Weight', 7, 15, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''), '),
(166, 'Shipping Estimator Display Settings for Shopping Cart', 'SHOW_SHIPPING_ESTIMATOR_BUTTON', '1', '<br />0= Off<br />1= Display as Button on Shopping Cart', 7, 20, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(167, 'Order Free Shipping 0 Weight Status', 'ORDER_WEIGHT_ZERO_STATUS', '0', 'If there is no weight to the order, does the order have Free Shipping?<br />0= no<br />1= yes<br /><br />Note: When using Free Shipping, Enable the Free Shipping Module this will only show when shipping is free.', 7, 15, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(168, 'Display Product Image', 'PRODUCT_LIST_IMAGE', '1', 'Do you want to display the Product Image?', 8, 1, NULL, '2005-08-09 22:29:33', NULL, NULL),
(169, 'Display Product Manufacturer Name', 'PRODUCT_LIST_MANUFACTURER', '0', 'Do you want to display the Product Manufacturer Name?', 8, 2, NULL, '2005-08-09 22:29:33', NULL, NULL),
(170, 'Display Product Model', 'PRODUCT_LIST_MODEL', '0', 'Do you want to display the Product Model?', 8, 3, NULL, '2005-08-09 22:29:33', NULL, NULL),
(171, 'Display Product Name', 'PRODUCT_LIST_NAME', '2', 'Do you want to display the Product Name?', 8, 4, NULL, '2005-08-09 22:29:33', NULL, NULL),
(172, 'Display Product Price/Add to Cart', 'PRODUCT_LIST_PRICE', '3', 'Do you want to display the Product Price/Add to Cart', 8, 5, NULL, '2005-08-09 22:29:33', NULL, NULL),
(173, 'Display Product Quantity', 'PRODUCT_LIST_QUANTITY', '0', 'Do you want to display the Product Quantity?', 8, 6, NULL, '2005-08-09 22:29:33', NULL, NULL),
(174, 'Display Product Weight', 'PRODUCT_LIST_WEIGHT', '0', 'Do you want to display the Product Weight?', 8, 7, NULL, '2005-08-09 22:29:33', NULL, NULL),
(175, 'Display Product Price/Add to Cart Column Width', 'PRODUCTS_LIST_PRICE_WIDTH', '125', 'Define the width of the Price/Add to Cart column<br />Default= 125', 8, 8, NULL, '2005-08-09 22:29:33', NULL, NULL),
(176, 'Display Category/Manufacturer Filter (0=off; 1=on)', 'PRODUCT_LIST_FILTER', '1', 'Do you want to display the Category/Manufacturer Filter?', 8, 9, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(177, 'Prev/Next Split Page Navigation (1-top, 2-bottom, 3-both)', 'PREV_NEXT_BAR_LOCATION', '3', 'Sets the location of the Prev/Next Split Page Navigation', 8, 10, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''1'', ''2'', ''3''), '),
(178, 'Display Product Listing Default Sort Order', 'PRODUCT_LISTING_DEFAULT_SORT_ORDER', '', 'Product Listing Default sort order?<br />NOTE: Leave Blank for Product Sort Order. Sort the Product Listing in the order you wish for the default display to start in to get the sort order setting. Example: 2a', 8, 15, NULL, '2005-08-09 22:29:33', NULL, NULL),
(179, 'Display Product Add to Cart Button (0=off; 1=on)', 'PRODUCT_LIST_PRICE_BUY_NOW', '1', 'Do you want to display the Add to Cart Button?', 8, 20, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(180, 'Display Multiple Products Qty Box Status and Set Button Location', 'PRODUCT_LISTING_MULTIPLE_ADD_TO_CART', '3', 'Do you want to display Add Multiple Products Qty Box and Set Button Location?<br />0= off<br />1= Top<br />2= Bottom<br />3= Both', 8, 25, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''), '),
(181, 'Display Product Description', 'PRODUCT_LIST_DESCRIPTION', '150', 'Do you want to display the Product Description?<br /><br />0= OFF<br />150= Suggested Length, or enter the maximum number of characters to display', 8, 30, NULL, '2005-08-09 22:29:33', NULL, NULL),
(182, 'Check stock level', 'STOCK_CHECK', 'true', 'Check to see if sufficent stock is available', 9, 1, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(183, 'Subtract stock', 'STOCK_LIMITED', 'true', 'Subtract product in stock by product orders', 9, 2, NULL, '2005-08-09 22:29:33', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(184, 'Allow Checkout', 'STOCK_ALLOW_CHECKOUT', 'true', 'Allow customer to checkout even if there is insufficient stock', 9, 3, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(185, 'Mark product out of stock', 'STOCK_MARK_PRODUCT_OUT_OF_STOCK', '***', 'Display something on screen so customer can see which product has insufficient stock', 9, 4, NULL, '2005-08-09 22:29:34', NULL, NULL),
(186, 'Stock Re-order level', 'STOCK_REORDER_LEVEL', '5', 'Define when stock needs to be re-ordered', 9, 5, NULL, '2005-08-09 22:29:34', NULL, NULL),
(187, 'Products status in Catalog when out of stock should be set to', 'SHOW_PRODUCTS_SOLD_OUT', '0', 'Show Products when out of stock<br /><br />0= set product status to OFF<br />1= leave product status ON', 9, 10, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(188, 'Show Sold Out Image in place of Add to Cart', 'SHOW_PRODUCTS_SOLD_OUT_IMAGE', '1', 'Show Sold Out Image instead of Add to Cart Button<br /><br />0= off<br />1= on', 9, 11, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(189, 'Product Quantity Decimals', 'QUANTITY_DECIMALS', '0', 'Allow how many decimals on Quantity<br /><br />0= off', 9, 15, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''), '),
(190, 'Show Shopping Cart - Delete Checkboxes or Delete Button', 'SHOW_SHOPPING_CART_DELETE', '3', 'Show on Shopping Cart Delete Button and/or Checkboxes<br /><br />1= Delete Button Only<br />2= Checkbox Only<br />3= Delete Button and Checkbox Only', 9, 20, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''1'', ''2'', ''3''), '),
(191, 'Show Shopping Cart - Update Cart Button Location', 'SHOW_SHOPPING_CART_UPDATE', '3', 'Show on Shopping Cart Update Cart Button Location as:<br /><br />1= Next to each Qty Box<br />2= Below all Products<br />3= Both Next to each Qty Box and Below all Products<br /><br />Note: this setting controls which of 3 tpl_shopping_cart_default files are called', 9, 22, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''1'', ''2'', ''3''), '),
(192, 'Store Page Parse Time', 'STORE_PAGE_PARSE_TIME', 'false', 'Store the time it takes to parse a page', 10, 1, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(193, 'Log Destination', 'STORE_PAGE_PARSE_TIME_LOG', '/var/log/www/zen/page_parse_time.log', 'Directory and filename of the page parse time log', 10, 2, NULL, '2005-08-09 22:29:34', NULL, NULL),
(194, 'Log Date Format', 'STORE_PARSE_DATE_TIME_FORMAT', '%d/%m/%Y %H:%M:%S', 'The date format', 10, 3, NULL, '2005-08-09 22:29:34', NULL, NULL),
(195, 'Display The Page Parse Time', 'DISPLAY_PAGE_PARSE_TIME', 'true', 'Display the page parse time on the bottom of each page<br />You do not need to store the times to display them in the Catalog', 10, 4, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(196, 'Store Database Queries', 'STORE_DB_TRANSACTIONS', 'false', 'Store the database queries in the page parse time log (PHP4 only)', 10, 5, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(197, 'E-Mail Transport Method', 'EMAIL_TRANSPORT', 'sendmail', 'Defines if this server uses a local connection to sendmail or uses an SMTP connection via TCP/IP. Servers running on Windows and MacOS should change this setting to SMTP.<br /><br />SMTPAUTH should only be used if your server requires SMTP authorization to send messages. You must also configure your SMTPAUTH settings in the appropriate fields in this admin section.<br /><br />"Sendmail -f" is only for servers which require the use of the -f parameter to send mail. This is a security setting often used to prevent spoofing. Will cause errors if your host mailserver is not configured to use it.', 12, 1, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''sendmail'', ''sendmail-f'', ''smtp'', ''smtpauth''),'),
(198, 'SMTP Email Account Mailbox', 'EMAIL_SMTPAUTH_MAILBOX', 'YourEmailAccountNameHere', 'Enter the mailbox account name (me@mydomain.com) supplied by your host. This is the account name that your host requires for SMTP authentication.<br />Only required if using SMTP Authentication for email.', 12, 101, NULL, '2005-08-09 22:29:34', NULL, NULL),
(199, 'SMTP Email Account Password', 'EMAIL_SMTPAUTH_PASSWORD', 'YourPasswordHere', 'Enter the password for your SMTP mailbox. <br />Only required if using SMTP Authentication for email.', 12, 101, NULL, '2005-08-09 22:29:34', NULL, NULL),
(200, 'SMTP Email Mail Host', 'EMAIL_SMTPAUTH_MAIL_SERVER', 'mail.EnterYourDomain.com', 'Enter the DNS name of your SMTP mail server.<br />ie: mail.mydomain.com<br />or 55.66.77.88<br />Only required if using SMTP Authentication for email.', 12, 101, NULL, '2005-08-09 22:29:34', NULL, NULL),
(201, 'SMTP Email Mail Server Port', 'EMAIL_SMTPAUTH_MAIL_SERVER_PORT', '25', 'Enter the IP port number that your SMTP mailserver operates on.<br />Only required if using SMTP Authentication for email.', 12, 101, NULL, '2005-08-09 22:29:34', NULL, NULL),
(202, 'E-Mail Linefeeds', 'EMAIL_LINEFEED', 'LF', 'Defines the character sequence used to separate mail headers.', 12, 2, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''LF'', ''CRLF''),'),
(203, 'Use MIME HTML When Sending Emails', 'EMAIL_USE_HTML', 'false', 'Send e-mails in HTML format', 12, 3, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(204, 'Verify E-Mail Addresses Through DNS', 'ENTRY_EMAIL_ADDRESS_CHECK', 'false', 'Verify e-mail address through a DNS server', 12, 4, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(205, 'Send E-Mails', 'SEND_EMAILS', 'true', 'Send out e-mails', 12, 5, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(206, 'Email Archiving Active?', 'EMAIL_ARCHIVE', 'false', 'If you wish to have email messages archived/stored when sent, set this to "true".', 12, 6, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(207, 'E-Mail Friendly-Errors', 'EMAIL_FRIENDLY_ERRORS', 'false', 'Do you want to display friendly errors if emails fail?  Setting this to false will display PHP errors and likely cause the script to fail. Only set to false while troubleshooting, and true for a live shop.', 12, 7, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(208, 'Email Address (Displayed to Contact you)', 'STORE_OWNER_EMAIL_ADDRESS', 'test@imaginacolombia.com', 'Email address of Store Owner.  Used as "display only" when informing customers of how to contact you.', 12, 10, NULL, '2005-08-09 22:29:34', NULL, NULL),
(209, 'Email Address (sent FROM)', 'EMAIL_FROM', 'test@imaginacolombia.com', 'Address from which email messages will be "sent" by default. Can be over-ridden at compose-time in admin modules.', 12, 11, NULL, '2005-08-09 22:29:34', NULL, NULL),
(210, 'Email Admin Format?', 'ADMIN_EXTRA_EMAIL_FORMAT', 'TEXT', 'Please select the Admin extra email format', 12, 12, NULL, '0001-01-01 00:00:00', NULL, 'zen_cfg_select_option(array(''TEXT'', ''HTML''), '),
(211, 'Send Copy of Order Confirmation Emails To', 'SEND_EXTRA_ORDER_EMAILS_TO', 'test@imaginacolombia.com', 'Send COPIES of order confirmation emails to the following email addresses, in this format: Name 1 &lt;email@address1&gt;, Name 2 &lt;email@address2&gt;', 12, 12, NULL, '2005-08-09 22:29:34', NULL, NULL),
(212, 'Send Copy of Create Account Emails To - Status', 'SEND_EXTRA_CREATE_ACCOUNT_EMAILS_TO_STATUS', '0', 'Send copy of Create Account Status<br />0= off 1= on', 12, 13, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''0'', ''1''),'),
(213, 'Send Copy of Create Account Emails To', 'SEND_EXTRA_CREATE_ACCOUNT_EMAILS_TO', 'test@imaginacolombia.com', 'Send copy of Create Account emails to the following email addresses, in this format: Name 1 &lt;email@address1&gt;, Name 2 &lt;email@address2&gt;', 12, 14, NULL, '2005-08-09 22:29:34', NULL, NULL),
(214, 'Send Copy of Tell a Friend Emails To - Status', 'SEND_EXTRA_TELL_A_FRIEND_EMAILS_TO_STATUS', '0', 'Send copy of Tell a Friend Status<br />0= off 1= on', 12, 15, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''0'', ''1''),'),
(215, 'Send Copy of Tell a Friend Emails To', 'SEND_EXTRA_TELL_A_FRIEND_EMAILS_TO', 'test@imaginacolombia.com', 'Send copy of Tell a Friend emails to the following email addresses, in this format: Name 1 &lt;email@address1&gt;, Name 2 &lt;email@address2&gt;', 12, 16, NULL, '2005-08-09 22:29:34', NULL, NULL),
(216, 'Send Copy of Customer GV Send Emails To - Status', 'SEND_EXTRA_GV_CUSTOMER_EMAILS_TO_STATUS', '0', 'Send copy of Customer GV Send Status<br />0= off 1= on', 12, 17, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''0'', ''1''),'),
(217, 'Send Copy of Customer GV Send Emails To', 'SEND_EXTRA_GV_CUSTOMER_EMAILS_TO', 'test@imaginacolombia.com', 'Send copy of Customer GV Send emails to the following email addresses, in this format: Name 1 &lt;email@address1&gt;, Name 2 &lt;email@address2&gt;', 12, 18, NULL, '2005-08-09 22:29:34', NULL, NULL),
(218, 'Send Copy of Admin GV Mail Emails To - Status', 'SEND_EXTRA_GV_ADMIN_EMAILS_TO_STATUS', '0', 'Send copy of Admin GV Mail Status<br />0= off 1= on', 12, 19, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''0'', ''1''),'),
(219, 'Send Copy of Customer Admin GV Mail Emails To', 'SEND_EXTRA_GV_ADMIN_EMAILS_TO', 'test@imaginacolombia.com', 'Send copy of Admin GV Mail emails to the following email addresses, in this format: Name 1 &lt;email@address1&gt;, Name 2 &lt;email@address2&gt;', 12, 20, NULL, '2005-08-09 22:29:34', NULL, NULL),
(220, 'Send Copy of Admin Discount Coupon Mail Emails To - Status', 'SEND_EXTRA_DISCOUNT_COUPON_ADMIN_EMAILS_TO_STATUS', '0', 'Send copy of Admin Discount Coupon Mail Status<br />0= off 1= on', 12, 21, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''0'', ''1''),'),
(221, 'Send Copy of Customer Admin Discount Coupon Mail Emails To', 'SEND_EXTRA_DISCOUNT_COUPON_ADMIN_EMAILS_TO', 'test@imaginacolombia.com', 'Send copy of Admin Discount Coupon Mail emails to the following email addresses, in this format: Name 1 &lt;email@address1&gt;, Name 2 &lt;email@address2&gt;', 12, 22, NULL, '2005-08-09 22:29:34', NULL, NULL),
(222, 'Send Copy of Admin Orders Status Emails To - Status', 'SEND_EXTRA_ORDERS_STATUS_ADMIN_EMAILS_TO_STATUS', '0', 'Send copy of Admin Orders Status Status<br />0= off 1= on', 12, 23, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''0'', ''1''),'),
(223, 'Send Copy of Admin Orders Status Emails To', 'SEND_EXTRA_ORDERS_STATUS_ADMIN_EMAILS_TO', 'test@imaginacolombia.com', 'Send copy of Admin Orders Status emails to the following email addresses, in this format: Name 1 &lt;email@address1&gt;, Name 2 &lt;email@address2&gt;', 12, 24, NULL, '2005-08-09 22:29:34', NULL, NULL),
(224, 'Send Copy of Pending Reviews Emails To - Status', 'SEND_EXTRA_REVIEW_NOTIFICATION_EMAILS_TO_STATUS', '0', 'Send copy of Pending Reviews Status<br />0= off 1= on', 12, 25, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''0'', ''1''),'),
(225, 'Send Copy of Pending Reviews Emails To', 'SEND_EXTRA_REVIEW_NOTIFICATION_EMAILS_TO', 'test@imaginacolombia.com', 'Send copy of Pending Reviews emails to the following email addresses, in this format: Name 1 &lt;email@address1&gt;, Name 2 &lt;email@address2&gt;', 12, 26, NULL, '2005-08-09 22:29:34', NULL, NULL),
(226, 'Set "Contact Us" Email Dropdown List', 'CONTACT_US_LIST', '', 'On the "Contact Us" Page, set the list of email addresses , in this format: Name 1 &lt;email@address1&gt;, Name 2 &lt;email@address2&gt;', 12, 40, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_textarea('),
(227, 'Allow Guest To Tell A Friend', 'ALLOW_GUEST_TO_TELL_A_FRIEND', 'true', 'Allow guests to tell a friend about a product', 12, 50, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(228, 'Contact Us - Show Store Name and Address', 'CONTACT_US_STORE_NAME_ADDRESS', '1', 'Include Store Name and Address<br />0= off 1= on', 12, 50, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(229, 'Send Extra Low Stock Emails', 'SEND_LOWSTOCK_EMAIL', '0', 'When stock level is at or below low stock level send an email<br />0= off<br />1= on', 12, 60, '2005-08-09 22:29:34', '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''0'', ''1''),'),
(230, 'Send Extra Low Stock Emails To', 'SEND_EXTRA_LOW_STOCK_EMAILS_TO', 'test@imaginacolombia.com', 'When stock level is at or below low stock level send an email to this address, in this format: Name 1 &lt;email@address1&gt;, Name 2 &lt;email@address2&gt;', 12, 61, NULL, '2005-08-09 22:29:34', NULL, NULL),
(231, 'Display "Newsletter Unsubscribe" Link?', 'SHOW_NEWSLETTER_UNSUBSCRIBE_LINK', 'true', 'Show "Newsletter Unsubscribe" link in the "Information" side-box?', 12, 70, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(232, 'Audience-Select Count Display', 'AUDIENCE_SELECT_DISPLAY_COUNTS', 'true', 'When displaying lists of available audiences/recipients, should the recipients-count be included? <br /><em>(This may make things slower if you have a lot of customers or complex audience queries)</em>', 12, 90, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(233, 'Enable Downloads', 'DOWNLOAD_ENABLED', 'true', 'Enable the products download functions.', 13, 1, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(234, 'Download by Redirect', 'DOWNLOAD_BY_REDIRECT', 'true', 'Use browser redirection for download. Disable on non-Unix systems.<br /><br />Note: Set /pub to 777 when redirect is true', 13, 2, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(235, 'Download Expiration (Number of Days)', 'DOWNLOAD_MAX_DAYS', '7', 'Set number of days before the download link expires. 0 means no limit.', 13, 3, NULL, '2005-08-09 22:29:34', NULL, ''),
(236, 'Number of Downloads Allowed - Per Product', 'DOWNLOAD_MAX_COUNT', '5', 'Set the maximum number of downloads. 0 means no download authorized.', 13, 4, NULL, '2005-08-09 22:29:34', NULL, ''),
(237, 'Downloads Controller Update Status Value', 'DOWNLOADS_ORDERS_STATUS_UPDATED_VALUE', '4', 'What orders_status resets the Download days and Max Downloads - Default is 4', 13, 10, '2005-08-09 22:29:34', '0000-00-00 00:00:00', NULL, NULL),
(238, 'Downloads Controller Order Status Value >= lower value', 'DOWNLOADS_CONTROLLER_ORDERS_STATUS', '2', 'Downloads Controller Order Status Value - Default >= 2<br /><br />Downloads are available for checkout based on the orders status. Orders with orders status greater than this value will be available for download. The orders status is set for an order by the Payment Modules. Set the lower range for this range.', 13, 12, '2005-08-09 22:29:34', '0000-00-00 00:00:00', NULL, NULL),
(239, 'Downloads Controller Order Status Value <= upper value', 'DOWNLOADS_CONTROLLER_ORDERS_STATUS_END', '4', 'Downloads Controller Order Status Value - Default <= 4<br /><br />Downloads are available for checkout based on the orders status. Orders with orders status less than this value will be available for download. The orders status is set for an order by the Payment Modules.  Set the upper range for this range.', 13, 13, '2005-08-09 22:29:34', '0000-00-00 00:00:00', NULL, NULL),
(240, 'Enable Price Factor', 'ATTRIBUTES_ENABLED_PRICE_FACTOR', 'true', 'Enable the Attributes Price Factor.', 13, 25, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(241, 'Enable Qty Price Discount', 'ATTRIBUTES_ENABLED_QTY_PRICES', 'true', 'Enable the Attributes Quantity Price Discounts.', 13, 26, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(242, 'Enable Attribute Images', 'ATTRIBUTES_ENABLED_IMAGES', 'true', 'Enable the Attributes Images.', 13, 28, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(243, 'Enable Text Pricing by word or letter', 'ATTRIBUTES_ENABLED_TEXT_PRICES', 'true', 'Enable the Attributes Text Pricing by word or letter.', 13, 35, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(244, 'Text Pricing - Spaces are Free', 'TEXT_SPACES_FREE', '1', 'On Text pricing Spaces are Free<br /><br />0= off 1= on', 13, 36, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(245, 'Read Only option type - Ignore for Add to Cart', 'PRODUCTS_OPTIONS_TYPE_READONLY_IGNORED', '1', 'When a Product only uses READONLY attributes, should the Add to Cart button be On or Off?<br />0= OFF<br />1= ON', 13, 37, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(246, 'Enable GZip Compression', 'GZIP_LEVEL', '0', '0= off 1= on', 14, 1, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''0'', ''1''),'),
(247, 'Session Directory', 'SESSION_WRITE_DIRECTORY', 'C:/Yop/Docs/Html/xoopsshop/modules/shop/cache', 'If sessions are file based, store them in this directory.', 15, 1, NULL, '2005-08-09 22:29:34', NULL, NULL),
(248, 'Cookie Domain', 'SESSION_USE_FQDN', 'True', 'If True the full domain name will be used to store the cookie, e.g. www.mydomain.com. If False only a partial domain name will be used, e.g. mydomain.com. If you are unsure about this, always leave set to true.', 15, 2, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''True'', ''False''), '),
(249, 'Force Cookie Use', 'SESSION_FORCE_COOKIE_USE', 'True', 'Force the use of sessions when cookies are only enabled.', 15, 2, '2005-08-13 12:14:35', '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''True'', ''False''), '),
(250, 'Check SSL Session ID', 'SESSION_CHECK_SSL_SESSION_ID', 'False', 'Validate the SSL_SESSION_ID on every secure HTTPS page request.', 15, 3, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''True'', ''False''), '),
(251, 'Check User Agent', 'SESSION_CHECK_USER_AGENT', 'False', 'Validate the clients browser user agent on every page request.', 15, 4, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''True'', ''False''), '),
(252, 'Check IP Address', 'SESSION_CHECK_IP_ADDRESS', 'False', 'Validate the clients IP address on every page request.', 15, 5, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''True'', ''False''), '),
(253, 'Prevent Spider Sessions', 'SESSION_BLOCK_SPIDERS', 'True', 'Prevent known spiders from starting a session.', 15, 6, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''True'', ''False''), '),
(254, 'Recreate Session', 'SESSION_RECREATE', 'False', 'Recreate the session to generate a new session ID when the customer logs on or creates an account (PHP >=4.1 needed).', 15, 7, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''True'', ''False''), '),
(255, 'IP to Host Conversion Status', 'SESSION_IP_TO_HOST_ADDRESS', 'true', 'Convert IP Address to Host Address<br /><br />Note: on some servers this can slow down the initial start of a session or execution of Emails', 15, 10, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(256, 'Length of the redeem code', 'SECURITY_CODE_LENGTH', '10', 'Enter the length of the redeem code<br />The longer the more secure', 16, 1, NULL, '2005-08-09 22:29:34', NULL, NULL),
(257, 'Default Order Status For Zero Balance Orders', 'DEFAULT_ZERO_BALANCE_ORDERS_STATUS_ID', '2', 'When an order''s balance is zero, this order status will be assigned to it.', 16, 0, NULL, '2005-08-09 22:29:34', 'zen_get_order_status_name', 'zen_cfg_pull_down_order_statuses('),
(258, 'New Signup Discount Coupon ID#', 'NEW_SIGNUP_DISCOUNT_COUPON', '', 'Select the coupon<br />', 16, 75, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_coupon_id('),
(259, 'New Signup Gift Voucher Amount', 'NEW_SIGNUP_GIFT_VOUCHER_AMOUNT', '', 'Leave blank for none<br />Or enter an amount ie. 10 for $10.00', 16, 76, NULL, '2005-08-09 22:29:34', NULL, NULL),
(260, 'Maximum Discount Coupons Per Page', 'MAX_DISPLAY_SEARCH_RESULTS_DISCOUNT_COUPONS', '20', 'Number of Discount Coupons to list per Page', 16, 81, NULL, '2005-08-09 22:29:34', NULL, NULL),
(261, 'Maximum Discount Coupon Report Results Per Page', 'MAX_DISPLAY_SEARCH_RESULTS_DISCOUNT_COUPONS_REPORTS', '20', 'Number of Discount Coupons to list on Reports Page', 16, 81, NULL, '2005-08-09 22:29:34', NULL, NULL),
(262, 'Credit Card Enable Status - VISA', 'CC_ENABLED_VISA', '1', 'Accept VISA 0= off 1= on', 17, 1, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(263, 'Credit Card Enable Status - MasterCard', 'CC_ENABLED_MC', '1', 'Accept MasterCard 0= off 1= on', 17, 2, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(264, 'Credit Card Enable Status - AmericanExpress', 'CC_ENABLED_AMEX', '0', 'Accept AmericanExpress 0= off 1= on', 17, 3, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(265, 'Credit Card Enable Status - Diners Club', 'CC_ENABLED_DINERS_CLUB', '0', 'Accept Diners Club 0= off 1= on', 17, 4, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(266, 'Credit Card Enable Status - Discover Card', 'CC_ENABLED_DISCOVER', '0', 'Accept Discover Card 0= off 1= on', 17, 5, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(267, 'Credit Card Enable Status - JCB', 'CC_ENABLED_JCB', '0', 'Accept JCB 0= off 1= on', 17, 6, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(268, 'Credit Card Enable Status - AUSTRALIAN BANKCARD', 'CC_ENABLED_AUSTRALIAN_BANKCARD', '0', 'Accept AUSTRALIAN BANKCARD 0= off 1= on', 17, 7, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(269, 'Credit Card Enabled - Show on Payment', 'SHOW_ACCEPTED_CREDIT_CARDS', '0', 'Show accepted credit cards on Payment page?<br />0= off<br />1= As Text<br />2= As Images<br /><br />Note: images and text must be defined in both the database and language file for specific credit card types.', 17, 50, NULL, '2005-08-09 22:29:34', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2''), '),
(270, 'This module is installed', 'MODULE_ORDER_TOTAL_GV_STATUS', 'true', '', 6, 1, NULL, '2003-10-30 22:16:40', NULL, 'zen_cfg_select_option(array(''true''),'),
(271, 'Sort Order', 'MODULE_ORDER_TOTAL_GV_SORT_ORDER', '840', 'Sort order of display.', 6, 2, NULL, '2003-10-30 22:16:40', NULL, NULL),
(272, 'Queue Purchases', 'MODULE_ORDER_TOTAL_GV_QUEUE', 'true', 'Do you want to queue purchases of the Gift Voucher?', 6, 3, NULL, '2003-10-30 22:16:40', NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(273, 'Include Shipping', 'MODULE_ORDER_TOTAL_GV_INC_SHIPPING', 'true', 'Include Shipping in calculation', 6, 5, NULL, '2003-10-30 22:16:40', NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(274, 'Include Tax', 'MODULE_ORDER_TOTAL_GV_INC_TAX', 'true', 'Include Tax in calculation.', 6, 6, NULL, '2003-10-30 22:16:40', NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(275, 'Re-calculate Tax', 'MODULE_ORDER_TOTAL_GV_CALC_TAX', 'None', 'Re-Calculate Tax', 6, 7, NULL, '2003-10-30 22:16:40', NULL, 'zen_cfg_select_option(array(''None'', ''Standard'', ''Credit Note''),'),
(276, 'Tax Class', 'MODULE_ORDER_TOTAL_GV_TAX_CLASS', '0', 'Use the following tax class when treating Gift Voucher as Credit Note.', 6, 0, NULL, '2003-10-30 22:16:40', 'zen_get_tax_class_title', 'zen_cfg_pull_down_tax_classes('),
(277, 'Credit including Tax', 'MODULE_ORDER_TOTAL_GV_CREDIT_TAX', 'false', 'Add tax to purchased Gift Voucher when crediting to Account', 6, 8, NULL, '2003-10-30 22:16:40', NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(278, 'This module is installed', 'MODULE_ORDER_TOTAL_LOWORDERFEE_STATUS', 'true', '', 6, 1, NULL, '2003-10-30 22:16:43', NULL, 'zen_cfg_select_option(array(''true''),'),
(279, 'Sort Order', 'MODULE_ORDER_TOTAL_LOWORDERFEE_SORT_ORDER', '400', 'Sort order of display.', 6, 2, NULL, '2003-10-30 22:16:43', NULL, NULL),
(280, 'Allow Low Order Fee', 'MODULE_ORDER_TOTAL_LOWORDERFEE_LOW_ORDER_FEE', 'false', 'Do you want to allow low order fees?', 6, 3, NULL, '2003-10-30 22:16:43', NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(281, 'Order Fee For Orders Under', 'MODULE_ORDER_TOTAL_LOWORDERFEE_ORDER_UNDER', '50', 'Add the low order fee to orders under this amount.', 6, 4, NULL, '2003-10-30 22:16:43', 'currencies->format', NULL),
(282, 'Order Fee', 'MODULE_ORDER_TOTAL_LOWORDERFEE_FEE', '5', 'For Percentage Calculation - include a % Example: 10%<br />For a flat amount just enter the amount - Example: 5 for $5.00', 6, 5, NULL, '2003-10-30 22:16:43', '', NULL),
(283, 'Attach Low Order Fee On Orders Made', 'MODULE_ORDER_TOTAL_LOWORDERFEE_DESTINATION', 'both', 'Attach low order fee for orders sent to the set destination.', 6, 6, NULL, '2003-10-30 22:16:43', NULL, 'zen_cfg_select_option(array(''national'', ''international'', ''both''),'),
(284, 'Tax Class', 'MODULE_ORDER_TOTAL_LOWORDERFEE_TAX_CLASS', '0', 'Use the following tax class on the low order fee.', 6, 7, NULL, '2003-10-30 22:16:43', 'zen_get_tax_class_title', 'zen_cfg_pull_down_tax_classes('),
(285, 'No Low Order Fee on Virtual Products', 'MODULE_ORDER_TOTAL_LOWORDERFEE_VIRTUAL', 'false', 'Do not charge Low Order Fee when cart is Virtual Products Only', 6, 8, NULL, '2004-04-20 22:16:43', NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(286, 'No Low Order Fee on Gift Vouchers', 'MODULE_ORDER_TOTAL_LOWORDERFEE_GV', 'false', 'Do not charge Low Order Fee when cart is Gift Vouchers Only', 6, 9, NULL, '2004-04-20 22:16:43', NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(287, 'This module is installed', 'MODULE_ORDER_TOTAL_SHIPPING_STATUS', 'true', '', 6, 1, NULL, '2003-10-30 22:16:46', NULL, 'zen_cfg_select_option(array(''true''),'),
(288, 'Sort Order', 'MODULE_ORDER_TOTAL_SHIPPING_SORT_ORDER', '200', 'Sort order of display.', 6, 2, NULL, '2003-10-30 22:16:46', NULL, NULL),
(289, 'Allow Free Shipping', 'MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING', 'false', 'Do you want to allow free shipping?', 6, 3, NULL, '2003-10-30 22:16:46', NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(290, 'Free Shipping For Orders Over', 'MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING_OVER', '50', 'Provide free shipping for orders over the set amount.', 6, 4, NULL, '2003-10-30 22:16:46', 'currencies->format', NULL),
(291, 'Provide Free Shipping For Orders Made', 'MODULE_ORDER_TOTAL_SHIPPING_DESTINATION', 'national', 'Provide free shipping for orders sent to the set destination.', 6, 5, NULL, '2003-10-30 22:16:46', NULL, 'zen_cfg_select_option(array(''national'', ''international'', ''both''),'),
(292, 'This module is installed', 'MODULE_ORDER_TOTAL_SUBTOTAL_STATUS', 'true', '', 6, 1, NULL, '2003-10-30 22:16:49', NULL, 'zen_cfg_select_option(array(''true''),'),
(293, 'Sort Order', 'MODULE_ORDER_TOTAL_SUBTOTAL_SORT_ORDER', '100', 'Sort order of display.', 6, 2, NULL, '2003-10-30 22:16:49', NULL, NULL),
(294, 'This module is installed', 'MODULE_ORDER_TOTAL_TAX_STATUS', 'true', '', 6, 1, NULL, '2003-10-30 22:16:52', NULL, 'zen_cfg_select_option(array(''true''),'),
(295, 'Sort Order', 'MODULE_ORDER_TOTAL_TAX_SORT_ORDER', '300', 'Sort order of display.', 6, 2, NULL, '2003-10-30 22:16:52', NULL, NULL),
(296, 'This module is installed', 'MODULE_ORDER_TOTAL_TOTAL_STATUS', 'true', '', 6, 1, NULL, '2003-10-30 22:16:55', NULL, 'zen_cfg_select_option(array(''true''),'),
(297, 'Sort Order', 'MODULE_ORDER_TOTAL_TOTAL_SORT_ORDER', '999', 'Sort order of display.', 6, 2, NULL, '2003-10-30 22:16:55', NULL, NULL),
(298, 'Tax Class', 'MODULE_ORDER_TOTAL_COUPON_TAX_CLASS', '0', 'Use the following tax class when treating Discount Coupon as Credit Note.', 6, 0, NULL, '2003-10-30 22:16:36', 'zen_get_tax_class_title', 'zen_cfg_pull_down_tax_classes('),
(299, 'Include Tax', 'MODULE_ORDER_TOTAL_COUPON_INC_TAX', 'true', 'Include Tax in calculation.', 6, 6, NULL, '2003-10-30 22:16:36', NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(300, 'Sort Order', 'MODULE_ORDER_TOTAL_COUPON_SORT_ORDER', '280', 'Sort order of display.', 6, 2, NULL, '2003-10-30 22:16:36', NULL, NULL),
(301, 'Include Shipping', 'MODULE_ORDER_TOTAL_COUPON_INC_SHIPPING', 'false', 'Include Shipping in calculation', 6, 5, NULL, '2003-10-30 22:16:36', NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(302, 'This module is installed', 'MODULE_ORDER_TOTAL_COUPON_STATUS', 'true', '', 6, 1, NULL, '2003-10-30 22:16:36', NULL, 'zen_cfg_select_option(array(''true''),'),
(303, 'Re-calculate Tax', 'MODULE_ORDER_TOTAL_COUPON_CALC_TAX', 'Standard', 'Re-Calculate Tax', 6, 7, NULL, '2003-10-30 22:16:36', NULL, 'zen_cfg_select_option(array(''None'', ''Standard'', ''Credit Note''),'),
(304, 'Admin Demo Status', 'ADMIN_DEMO', '0', 'Admin Demo should be on?<br />0= off 1= on', 6, 0, NULL, '2005-08-09 22:29:35', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(305, 'Product option type Select', 'PRODUCTS_OPTIONS_TYPE_SELECT', '0', 'The number representing the Select type of product option.', 0, NULL, '2005-08-09 22:29:35', '2005-08-09 22:29:35', NULL, NULL),
(306, 'Text product option type', 'PRODUCTS_OPTIONS_TYPE_TEXT', '1', 'Numeric value of the text product option type', 6, NULL, '2005-08-09 22:29:35', '2005-08-09 22:29:35', NULL, NULL),
(307, 'Radio button product option type', 'PRODUCTS_OPTIONS_TYPE_RADIO', '2', 'Numeric value of the radio button product option type', 6, NULL, '2005-08-09 22:29:35', '2005-08-09 22:29:35', NULL, NULL),
(308, 'Check box product option type', 'PRODUCTS_OPTIONS_TYPE_CHECKBOX', '3', 'Numeric value of the check box product option type', 6, NULL, '2005-08-09 22:29:35', '2005-08-09 22:29:35', NULL, NULL),
(309, 'File product option type', 'PRODUCTS_OPTIONS_TYPE_FILE', '4', 'Numeric value of the file product option type', 6, NULL, '2005-08-09 22:29:35', '2005-08-09 22:29:35', NULL, NULL),
(310, 'ID for text and file products options values', 'PRODUCTS_OPTIONS_VALUES_TEXT_ID', '0', 'Numeric value of the products_options_values_id used by the text and file attributes.', 6, NULL, '2005-08-09 22:29:35', '2005-08-09 22:29:35', NULL, NULL),
(311, 'Upload prefix', 'UPLOAD_PREFIX', 'upload_', 'Prefix used to differentiate between upload options and other options', 0, NULL, '2005-08-09 22:29:35', '2005-08-09 22:29:35', NULL, NULL),
(312, 'Text prefix', 'TEXT_PREFIX', 'txt_', 'Prefix used to differentiate between text option values and other option values', 0, NULL, '2005-08-09 22:29:35', '2005-08-09 22:29:35', NULL, NULL),
(313, 'Read Only option type', 'PRODUCTS_OPTIONS_TYPE_READONLY', '5', 'Numeric value of the file product option type', 6, NULL, '2005-08-09 22:29:35', '2005-08-09 22:29:35', NULL, NULL),
(314, 'Products Info - Products Option Name Sort Order', 'PRODUCTS_OPTIONS_SORT_ORDER', '0', 'Sort order of Option Names for Products Info<br />0= Sort Order, Option Name<br />1= Option Name', 18, 35, '2005-08-09 22:29:35', '2005-08-09 22:29:35', NULL, 'zen_cfg_select_option(array(''0'', ''1''),'),
(315, 'Products Info - Product Option Value of Attributes Sort Order', 'PRODUCTS_OPTIONS_SORT_BY_PRICE', '1', 'Sort order of Product Option Values of Attributes for Products Info<br />0= Sort Order, Price<br />1= Sort Order, Option Value Name', 18, 36, '2005-08-09 22:29:35', '2005-08-09 22:29:35', NULL, 'zen_cfg_select_option(array(''0'', ''1''),'),
(316, 'Product Info - Show Option Values Name Below Attributes Image', 'PRODUCT_IMAGES_ATTRIBUTES_NAMES', '1', 'Product Info - Show the name of the Option Value beneath the Attribute Image?<br />0= off 1= on', 18, 41, NULL, '2005-08-09 22:29:35', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(317, 'Product Info - Show Sales Discount Savings Status', 'SHOW_SALE_DISCOUNT_STATUS', '1', 'Product Info - Show the amount of discount savings?<br />0= off 1= on', 18, 45, NULL, '2005-08-09 22:29:35', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(318, 'Product Info - Show Sales Discount Savings Dollars or Percentage', 'SHOW_SALE_DISCOUNT', '1', 'Product Info - Show the amount of discount savings display as:<br />1= % off 2= $amount off', 18, 46, NULL, '2005-08-09 22:29:35', NULL, 'zen_cfg_select_option(array(''1'', ''2''), '),
(319, 'Product Info - Show Sales Discount Savings Percentage Decimals', 'SHOW_SALE_DISCOUNT_DECIMALS', '0', 'Product Info - Show discount savings display as a Percentage with how many decimals?:<br />Default= 0', 18, 47, NULL, '2005-08-09 22:29:35', NULL, NULL),
(320, 'Product Info - Price is Free Image or Text Status', 'OTHER_IMAGE_PRICE_IS_FREE_ON', '1', 'Product Info - Show the Price is Free Image or Text on Displayed Price<br />0= Text<br />1= Image', 18, 50, NULL, '2005-08-09 22:29:35', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(321, 'Product Info - Price is Call for Price Image or Text Status', 'PRODUCTS_PRICE_IS_CALL_IMAGE_ON', '1', 'Product Info - Show the Price is Call for Price Image or Text on Displayed Price<br />0= Text<br />1= Image', 18, 51, NULL, '2005-08-09 22:29:35', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(322, 'Product Quantity Box Status - Adding New Products', 'PRODUCTS_QTY_BOX_STATUS', '1', 'What should the Default Quantity Box Status be set to when adding New Products?<br /><br />0= off<br />1= on<br />NOTE: This will show a Qty Box when ON and default the Add to Cart to 1', 18, 55, NULL, '2005-08-09 22:29:35', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(323, 'Product Reviews Require Approval', 'REVIEWS_APPROVAL', '1', 'Do product reviews require approval?<br /><br />Note: When Review Status is off, it will also not show<br /><br />0= off 1= on', 18, 62, NULL, '2005-08-09 22:29:35', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(324, 'Meta Tags - Include Product Price in Title', 'META_TAG_INCLUDE_PRICE', '1', 'Do you want to include the Product Price in the Meta Tag Title?<br /><br />0= off 1= on', 18, 70, NULL, '2005-08-09 22:29:35', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(325, 'Also Purchased Products Columns per Row', 'SHOW_PRODUCT_INFO_COLUMNS_ALSO_PURCHASED_PRODUCTS', '3', 'Also Purchased Products Columns per Row<br />0= off or set the sort order', 18, 72, NULL, '2005-08-09 22:29:35', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), '),
(326, 'Previous Next - Navigation Bar Position', 'PRODUCT_INFO_PREVIOUS_NEXT', '1', 'Location of Previous/Next Navigation Bar<br />0= off<br />1= Top of Page<br />2= Bottom of Page<br />3= Both Top and Bottom of Page', 18, 21, '2005-08-09 22:29:35', '2005-08-09 22:29:35', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''0'', ''text''=>''Off''), array(''id''=>''1'', ''text''=>''Top of Page''), array(''id''=>''2'', ''text''=>''Bottom of Page''), array(''id''=>''3'', ''text''=>''Both Top & Bottom of Page'')),'),
(327, 'Previous Next - Sort Order', 'PRODUCT_INFO_PREVIOUS_NEXT_SORT', '1', 'Products Display Order by<br />0= Product ID<br />1= Product Name<br />2= Model<br />3= Price, Product Name<br />4= Price, Model<br />5= Product Name, Model<br />6= Product Sort Order', 18, 22, '2005-08-09 22:29:35', '2005-08-09 22:29:35', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''0'', ''text''=>''Product ID''), array(''id''=>''1'', ''text''=>''Name''), array(''id''=>''2'', ''text''=>''Product Model''), array(''id''=>''3'', ''text''=>''Product Price - Name''), array(''id''=>''4'', ''text''=>''Product Price - Model''), array(''id''=>''5'', ''text''=>''Product Name - Model''), array(''id''=>''6'', ''text''=>''Product Sort Order'')),'),
(328, 'Previous Next - Button and Image Status', 'SHOW_PREVIOUS_NEXT_STATUS', '0', 'Button and Product Image status settings are:<br />0= Off<br />1= On', 18, 20, '2005-08-09 22:29:35', '2005-08-09 22:29:35', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''0'', ''text''=>''Off''), array(''id''=>''1'', ''text''=>''On'')),'),
(329, 'Previous Next - Button and Image Settings', 'SHOW_PREVIOUS_NEXT_IMAGES', '0', 'Show Previous/Next Button and Product Image Settings<br />0= Button Only<br />1= Button and Product Image<br />2= Product Image Only', 18, 21, '2005-08-09 22:29:35', '2005-08-09 22:29:35', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''0'', ''text''=>''Button Only''), array(''id''=>''1'', ''text''=>''Button and Product Image''), array(''id''=>''2'', ''text''=>''Product Image Only'')),'),
(330, 'Previous Next - Image Width?', 'PREVIOUS_NEXT_IMAGE_WIDTH', '50', 'Previous/Next Image Width?', 18, 22, NULL, '2005-08-09 22:29:35', '', ''),
(331, 'Previous Next - Image Height?', 'PREVIOUS_NEXT_IMAGE_HEIGHT', '40', 'Previous/Next Image Height?', 18, 23, NULL, '2005-08-09 22:29:35', '', ''),
(332, 'Previous Next - Navigation Includes Category', 'PRODUCT_INFO_CATEGORIES', '1', 'Product''s Category Image and Name Alignment Above Previous/Next Navigation Bar<br />0= off<br />1= Align Left<br />2= Align Center<br />3= Align Right', 18, 20, '2005-08-09 22:29:35', '2005-08-09 22:29:35', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''0'', ''text''=>''Off''), array(''id''=>''1'', ''text''=>''Align Left''), array(''id''=>''2'', ''text''=>''Align Center''), array(''id''=>''3'', ''text''=>''Align Right'')),'),
(333, 'Column Width - Left Boxes', 'BOX_WIDTH_LEFT', '150px', 'Width of the Left Column Boxes<br />px may be included<br />Default = 150px', 19, 1, NULL, '2003-11-21 22:16:36', NULL, NULL),
(334, 'Column Width - Right Boxes', 'BOX_WIDTH_RIGHT', '150px', 'Width of the Right Column Boxes<br />px may be included<br />Default = 150px', 19, 2, NULL, '2003-11-21 22:16:36', NULL, NULL),
(335, 'Bread Crumbs Navigation Separator', 'BREAD_CRUMBS_SEPARATOR', '&nbsp;::&nbsp;', 'Enter the separator symbol to appear between the Navigation Bread Crumb trail<br />Note: Include spaces with the &amp;nbsp; symbol if you want them part of the separator.<br />Default = &amp;nbsp;::&amp;nbsp;', 19, 3, NULL, '2003-11-21 22:16:36', NULL, 'zen_cfg_textarea_small('),
(336, 'Bestsellers - Number Padding', 'BEST_SELLERS_FILLER', '&nbsp;', 'What do you want to Pad the numbers with?<br />Default = &amp;nbsp;', 19, 5, NULL, '2003-11-21 22:16:36', NULL, 'zen_cfg_textarea_small('),
(337, 'Bestsellers - Truncate Product Names', 'BEST_SELLERS_TRUNCATE', '35', 'What size do you want to truncate the Product Names?<br />Default = 35', 19, 6, NULL, '2003-11-21 22:16:36', NULL, NULL),
(338, 'Bestsellers - Truncate Product Names followed by ...', 'BEST_SELLERS_TRUNCATE_MORE', 'true', 'When truncated Product Names follow with ...<br />Default = true', 19, 7, '2003-03-21 13:08:25', '2003-03-21 11:42:47', NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(339, 'Categories Box - Show Specials Link', 'SHOW_CATEGORIES_BOX_SPECIALS', 'true', 'Show Specials Link in the Categories Box', 19, 8, '2003-03-21 13:08:25', '2003-03-21 11:42:47', NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(340, 'Categories Box - Show Products New Link', 'SHOW_CATEGORIES_BOX_PRODUCTS_NEW', 'true', 'Show Products New Link in the Categories Box', 19, 9, '2003-03-21 13:08:25', '2003-03-21 11:42:47', NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(341, 'Shopping Cart Box Status', 'SHOW_SHOPPING_CART_BOX_STATUS', '1', 'Shopping Cart Shows<br />0= Always<br />1= Only when full<br />2= Only when full but when viewing the Shopping Cart', 19, 10, NULL, '2005-08-09 22:29:35', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2''), '),
(342, 'Categories Box - Show Featured Products Link', 'SHOW_CATEGORIES_BOX_FEATURED_PRODUCTS', 'true', 'Show Featured Products Link in the Categories Box', 19, 11, '2003-03-21 13:08:25', '2003-03-21 11:42:47', NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(343, 'Categories Box - Show Products All Link', 'SHOW_CATEGORIES_BOX_PRODUCTS_ALL', 'true', 'Show Products All Link in the Categories Box', 19, 12, '2003-03-21 13:08:25', '2003-03-21 11:42:47', NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(344, 'Column Left Status - Global', 'COLUMN_LEFT_STATUS', '1', 'Show Column Left, unless page override exists?<br />0= Column Left is always off<br />1= Column Left is on, unless page override', 19, 15, NULL, '2005-08-09 22:29:35', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(345, 'Column Right Status - Global', 'COLUMN_RIGHT_STATUS', '1', 'Show Column Right, unless page override exists?<br />0= Column Right is always off<br />1= Column Right is on, unless page override', 19, 16, NULL, '2005-08-09 22:29:35', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(346, 'Column Width - Left', 'COLUMN_WIDTH_LEFT', '150px', 'Width of the Left Column<br />px may be included<br />Default = 150px', 19, 20, NULL, '2003-11-21 22:16:36', NULL, NULL),
(347, 'Column Width - Right', 'COLUMN_WIDTH_RIGHT', '150px', 'Width of the Right Column<br />px may be included<br />Default = 150px', 19, 21, NULL, '2003-11-21 22:16:36', NULL, NULL),
(348, 'Categories Separator between links Status', 'SHOW_CATEGORIES_SEPARATOR_LINK', '1', 'Show Category Separator between Category Names and Links?<br />0= off<br />1= on', 19, 24, NULL, '2005-08-09 22:29:35', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(349, 'Categories Separator between the Category Name and Count', 'CATEGORIES_SEPARATOR', '-&gt;', 'What separator do you want between the Category name and the count?<br />Default = -&amp;gt;', 19, 25, NULL, '2003-11-21 22:16:36', NULL, 'zen_cfg_textarea_small('),
(350, 'Categories Separator between the Category Name and Sub Categories', 'CATEGORIES_SEPARATOR_SUBS', '|_&nbsp;', 'What separator do you want between the Category name and Sub Category Name?<br />Default = |_&amp;nbsp;', 19, 26, NULL, '2004-03-25 22:16:36', NULL, 'zen_cfg_textarea_small('),
(351, 'Categories Count Prefix', 'CATEGORIES_COUNT_PREFIX', '&nbsp;(', 'What do you want to Prefix the count with?<br />Default= (', 19, 27, NULL, '2003-01-21 22:16:36', NULL, 'zen_cfg_textarea_small('),
(352, 'Categories Count Suffix', 'CATEGORIES_COUNT_SUFFIX', ')', 'What do you want as a Suffix to the count?<br />Default= )', 19, 28, NULL, '2003-01-21 22:16:36', NULL, 'zen_cfg_textarea_small('),
(353, 'Categories SubCategories Indent', 'CATEGORIES_SUBCATEGORIES_INDENT', '&nbsp;&nbsp;', 'What do you want to use as the subcategories indent?<br />Default= &nbsp;&nbsp;', 19, 29, NULL, '2004-06-24 22:16:36', NULL, 'zen_cfg_textarea_small('),
(354, 'Categories with 0 Products Status', 'CATEGORIES_COUNT_ZERO', '0', 'Show Category Count for 0 Products?<br />0= off<br />1= on', 19, 30, NULL, '2005-08-09 22:29:35', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(355, 'Split Categories Box', 'CATEGORIES_SPLIT_DISPLAY', 'True', 'Split the categories box display by product type', 19, 31, NULL, '2005-08-09 22:29:35', NULL, 'zen_cfg_select_option(array(''True'', ''False''), '),
(356, 'Shopping Cart - Show Totals', 'SHOW_TOTALS_IN_CART', '1', 'Show Totals Above Shopping Cart?<br />0= off<br />1= on<br />2= on, no weight when 0', 19, 31, NULL, '2005-08-09 22:29:35', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2''), '),
(357, 'Categories - Always Show on Main Page', 'SHOW_CATEGORIES_ALWAYS', '1', 'Always Show Categories on Main Page<br />0= off<br />1= on<br />Default category can be set to Top Level or a Specific Top Level', 19, 45, '2005-08-13 13:04:46', '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(358, 'Main Page - Opens with Category', 'CATEGORIES_START_MAIN', '0', '0= Top Level Categories<br />Or enter the Category ID#<br />Note: Sub Categories can also be used Example: 3_10', 19, 46, '2005-08-13 15:56:58', '2005-08-09 22:29:36', '', ''),
(359, 'Categories - Always Open to Show SubCategories', 'SHOW_CATEGORIES_SUBCATEGORIES_ALWAYS', '1', 'Always Show Categories and SubCategories<br />0= off, just show Top Categories<br />1= on, Always show Categories and SubCategories when selected', 19, 47, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(360, 'Banner Display Groups - Header Position 1', 'SHOW_BANNERS_GROUP_SET1', '', 'The Banner Display Groups can be from 1 Banner Group or Multiple Banner Groups<br /><br />For Multiple Banner Groups enter the Banner Group Name separated by a colon <strong>:</strong><br /><br />Example: Wide-Banners:SideBox-Banners<br /><br />What Banner Group(s) do you want to use in the Header Position 1?<br />Leave blank for none', 19, 55, NULL, '2005-08-09 22:29:36', '', ''),
(361, 'Banner Display Groups - Header Position 2', 'SHOW_BANNERS_GROUP_SET2', '', 'The Banner Display Groups can be from 1 Banner Group or Multiple Banner Groups<br /><br />For Multiple Banner Groups enter the Banner Group Name separated by a colon <strong>:</strong><br /><br />Example: Wide-Banners:SideBox-Banners<br /><br />What Banner Group(s) do you want to use in the Header Position 2?<br />Leave blank for none', 19, 56, NULL, '2005-08-09 22:29:36', '', ''),
(362, 'Banner Display Groups - Header Position 3', 'SHOW_BANNERS_GROUP_SET3', '', 'The Banner Display Groups can be from 1 Banner Group or Multiple Banner Groups<br /><br />For Multiple Banner Groups enter the Banner Group Name separated by a colon <strong>:</strong><br /><br />Example: Wide-Banners:SideBox-Banners<br /><br />What Banner Group(s) do you want to use in the Header Position 3?<br />Leave blank for none', 19, 57, NULL, '2005-08-09 22:29:36', '', ''),
(363, 'Banner Display Groups - Footer Position 1', 'SHOW_BANNERS_GROUP_SET4', '', 'The Banner Display Groups can be from 1 Banner Group or Multiple Banner Groups<br /><br />For Multiple Banner Groups enter the Banner Group Name separated by a colon <strong>:</strong><br /><br />Example: Wide-Banners:SideBox-Banners<br /><br />What Banner Group(s) do you want to use in the Footer Position 1?<br />Leave blank for none', 19, 65, NULL, '2005-08-09 22:29:36', '', ''),
(364, 'Banner Display Groups - Footer Position 2', 'SHOW_BANNERS_GROUP_SET5', '', 'The Banner Display Groups can be from 1 Banner Group or Multiple Banner Groups<br /><br />For Multiple Banner Groups enter the Banner Group Name separated by a colon <strong>:</strong><br /><br />Example: Wide-Banners:SideBox-Banners<br /><br />What Banner Group(s) do you want to use in the Footer Position 2?<br />Leave blank for none', 19, 66, NULL, '2005-08-09 22:29:36', '', ''),
(365, 'Banner Display Groups - Footer Position 3', 'SHOW_BANNERS_GROUP_SET6', 'Wide-Banners', 'The Banner Display Groups can be from 1 Banner Group or Multiple Banner Groups<br /><br />For Multiple Banner Groups enter the Banner Group Name separated by a colon <strong>:</strong><br /><br />Example: Wide-Banners:SideBox-Banners<br /><br />Default Group is Wide-Banners<br /><br />What Banner Group(s) do you want to use in the Footer Position 3?<br />Leave blank for none', 19, 67, NULL, '2005-08-09 22:29:36', '', ''),
(366, 'Banner Display Groups - Side Box banner_box', 'SHOW_BANNERS_GROUP_SET7', 'SideBox-Banners', 'The Banner Display Groups can be from 1 Banner Group or Multiple Banner Groups<br /><br />For Multiple Banner Groups enter the Banner Group Name separated by a colon <strong>:</strong><br /><br />Example: Wide-Banners:SideBox-Banners<br />Default Group is SideBox-Banners<br /><br />What Banner Group(s) do you want to use in the Side Box - banner_box?<br />Leave blank for none', 19, 70, NULL, '2005-08-09 22:29:36', '', ''),
(367, 'Banner Display Groups - Side Box banner_box2', 'SHOW_BANNERS_GROUP_SET8', 'SideBox-Banners', 'The Banner Display Groups can be from 1 Banner Group or Multiple Banner Groups<br /><br />For Multiple Banner Groups enter the Banner Group Name separated by a colon <strong>:</strong><br /><br />Example: Wide-Banners:SideBox-Banners<br />Default Group is SideBox-Banners<br /><br />What Banner Group(s) do you want to use in the Side Box - banner_box2?<br />Leave blank for none', 19, 71, NULL, '2005-08-09 22:29:36', '', ''),
(368, 'Banner Display Group - Side Box banner_box_all', 'SHOW_BANNERS_GROUP_SET_ALL', 'BannersAll', 'The Banner Display Group may only be from one (1) Banner Group for the Banner All sidebox<br /><br />Default Group is BannersAll<br /><br />What Banner Group do you want to use in the Side Box - banner_box_all?<br />Leave blank for none', 19, 72, NULL, '2005-08-09 22:29:36', '', ''),
(369, 'Footer - Show IP Address status', 'SHOW_FOOTER_IP', '1', 'Show Customer IP Address in the Footer<br />0= off<br />1= on<br />Should the Customer IP Address show in the footer?', 19, 80, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(370, 'Product Discount Quantities - Add how many blank discounts?', 'DISCOUNT_QTY_ADD', '5', 'How many blank discount quantities should be added for Product Pricing?', 19, 90, NULL, '2005-08-09 22:29:36', '', ''),
(371, 'Product Discount Quantities - Display how many per row?', 'DISCOUNT_QUANTITY_PRICES_COLUMN', '5', 'How many discount quantities should show per row on Product Info Pages?', 19, 95, NULL, '2005-08-09 22:29:36', '', ''),
(372, 'Categories/Products Display Sort Order', 'CATEGORIES_PRODUCTS_SORT_ORDER', '0', 'Categories/Products Display Sort Order<br />0= Products Sort Order/Name<br />1= Products Name<br />2= Products Model', 19, 100, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2''), '),
(373, 'Option Names and Values Global Add, Copy and Delete Features Status', 'OPTION_NAMES_VALUES_GLOBAL_STATUS', '1', 'Option Names and Values Global Add, Copy and Delete Features Status<br />0= Hide Features<br />1= Show Features<br />2= Products Model', 19, 110, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(374, '<strong>Down for Maintenance: ON/OFF</strong>', 'DOWN_FOR_MAINTENANCE', 'false', 'Down for Maintenance <br />(true=on false=off)', 20, 1, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(375, 'Down for Maintenance: filename', 'DOWN_FOR_MAINTENANCE_FILENAME', 'down_for_maintenance', 'Down for Maintenance filename<br />Note: Do not include the extention<br />Default=down_for_maintenance', 20, 2, NULL, '2005-08-09 22:29:36', NULL, ''),
(376, 'Down for Maintenance: Hide Header', 'DOWN_FOR_MAINTENANCE_HEADER_OFF', 'false', 'Down for Maintenance: Hide Header <br />(true=hide false=show)', 20, 3, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(377, 'Down for Maintenance: Hide Column Left', 'DOWN_FOR_MAINTENANCE_COLUMN_LEFT_OFF', 'false', 'Down for Maintenance: Hide Column Left <br />(true=hide false=show)', 20, 4, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(378, 'Down for Maintenance: Hide Column Right', 'DOWN_FOR_MAINTENANCE_COLUMN_RIGHT_OFF', 'false', 'Down for Maintenance: Hide Column Right <br />(true=hide false=show)', 20, 5, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(379, 'Down for Maintenance: Hide Footer', 'DOWN_FOR_MAINTENANCE_FOOTER_OFF', 'false', 'Down for Maintenance: Hide Footer <br />(true=hide false=show)', 20, 6, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(380, 'Down for Maintenance: Hide Prices', 'DOWN_FOR_MAINTENANCE_PRICES_OFF', 'false', 'Down for Maintenance: Hide Prices <br />(true=hide false=show)', 20, 7, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(381, 'Down For Maintenance (exclude this IP-Address)', 'EXCLUDE_ADMIN_IP_FOR_MAINTENANCE', 'your IP (ADMIN)', 'This IP Address is able to access the website while it is Down For Maintenance (like webmaster)<br />To enter multiple IP Addresses, separate with a comma. If you do not know your IP Address, check in the Footer of your Shop.', 20, 8, '2003-03-21 13:43:22', '2003-03-21 21:20:07', NULL, NULL),
(382, 'NOTICE PUBLIC Before going Down for Maintenance: ON/OFF', 'WARN_BEFORE_DOWN_FOR_MAINTENANCE', 'false', 'Give a WARNING some time before you put your website Down for Maintenance<br />(true=on false=off)<br />If you set the ''Down For Maintenance: ON/OFF'' to true this will automaticly be updated to false', 20, 9, '2003-03-21 13:08:25', '2003-03-21 11:42:47', NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(383, 'Date and hours for notice before maintenance', 'PERIOD_BEFORE_DOWN_FOR_MAINTENANCE', '15/05/2003  2-3 PM', 'Date and hours for notice before maintenance website, enter date and hours for maintenance website', 20, 10, '2003-03-21 13:08:25', '2003-03-21 11:42:47', NULL, NULL),
(384, 'Display when webmaster has enabled maintenance', 'DISPLAY_MAINTENANCE_TIME', 'false', 'Display when Webmaster has enabled maintenance <br />(true=on false=off)<br />', 20, 11, '2003-03-21 13:08:25', '2003-03-21 11:42:47', NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(385, 'Display website maintenance period', 'DISPLAY_MAINTENANCE_PERIOD', 'false', 'Display Website maintenance period <br />(true=on false=off)<br />', 20, 12, '2003-03-21 13:08:25', '2003-03-21 11:42:47', NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
(386, 'Website maintenance period', 'TEXT_MAINTENANCE_PERIOD_TIME', '2h00', 'Enter Website Maintenance period (hh:mm)', 20, 13, '2003-03-21 13:08:25', '2003-03-21 11:42:47', NULL, NULL),
(387, 'Confirm Terms and Conditions During Checkout Procedure', 'DISPLAY_CONDITIONS_ON_CHECKOUT', 'false', 'Show the Terms and Conditions during the checkout procedure which the customer must agree to.', 11, 1, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(388, 'Confirm Privacy Notice During Account Creation Procedure', 'DISPLAY_PRIVACY_CONDITIONS', 'false', 'Show the Privacy Notice during the account creation procedure which the customer must agree to.', 11, 2, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''true'', ''false''), '),
(389, 'Display Product Image', 'PRODUCT_NEW_LIST_IMAGE', '1102', 'Do you want to display the Product Image?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 21, 1, NULL, '2005-08-09 22:29:36', NULL, NULL),
(390, 'Display Product Quantity', 'PRODUCT_NEW_LIST_QUANTITY', '1202', 'Do you want to display the Product Quantity?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 21, 2, NULL, '2005-08-09 22:29:36', NULL, NULL),
(391, 'Display Product Buy Now Button', 'PRODUCT_NEW_BUY_NOW', '1300', 'Do you want to display the Product Buy Now Button<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 21, 3, NULL, '2005-08-09 22:29:36', NULL, NULL),
(392, 'Display Product Name', 'PRODUCT_NEW_LIST_NAME', '2101', 'Do you want to display the Product Name?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 21, 4, NULL, '2005-08-09 22:29:36', NULL, NULL),
(393, 'Display Product Model', 'PRODUCT_NEW_LIST_MODEL', '2201', 'Do you want to display the Product Model?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 21, 5, NULL, '2005-08-09 22:29:36', NULL, NULL),
(394, 'Display Product Manufacturer Name', 'PRODUCT_NEW_LIST_MANUFACTURER', '2302', 'Do you want to display the Product Manufacturer Name?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 21, 6, NULL, '2005-08-09 22:29:36', NULL, NULL),
(395, 'Display Product Price', 'PRODUCT_NEW_LIST_PRICE', '2402', 'Do you want to display the Product Price<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 21, 7, NULL, '2005-08-09 22:29:36', NULL, NULL),
(396, 'Display Product Weight', 'PRODUCT_NEW_LIST_WEIGHT', '2502', 'Do you want to display the Product Weight?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 21, 8, NULL, '2005-08-09 22:29:36', NULL, NULL),
(397, 'Display Product Date Added', 'PRODUCT_NEW_LIST_DATE_ADDED', '2601', 'Do you want to display the Product Date Added?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 21, 9, NULL, '2005-08-09 22:29:36', NULL, NULL),
(398, 'Display Product Description', 'PRODUCT_NEW_LIST_DESCRIPTION', '1', 'Do you want to display the Product Description - First 150 characters?<br />0= off<br />1= on', 21, 10, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(399, 'Display Product Display - Default Sort Order', 'PRODUCT_NEW_LIST_SORT_DEFAULT', '6', 'What Sort Order Default should be used for New Products Display?<br />Default= 6 for Date New to Old<br /><br />1= Products Name<br />2= Products Name Desc<br />3= Price low to high, Products Name<br />4= Price high to low, Products Name<br />5= Model<br />6= Date Added desc<br />7= Date Added<br />8= Product Sort Order', 21, 11, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''1'', ''2'', ''3'', ''4'', ''5'', ''6'', ''7'', ''8''), '),
(400, 'Default Products New Group ID', 'PRODUCT_NEW_LIST_GROUP_ID', '21', 'Warning: Only change this if your Products New Group ID has changed from the default of 21<br />What is the configuration_group_id for New Products Listings?', 21, 12, NULL, '2005-08-09 22:29:36', NULL, NULL),
(401, 'Display Multiple Products Qty Box Status and Set Button Location', 'PRODUCT_NEW_LISTING_MULTIPLE_ADD_TO_CART', '3', 'Do you want to display Add Multiple Products Qty Box and Set Button Location?<br />0= off<br />1= Top<br />2= Bottom<br />3= Both', 21, 25, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''), '),
(402, 'Display Product Image', 'PRODUCT_FEATURED_LIST_IMAGE', '1102', 'Do you want to display the Product Image?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 22, 1, NULL, '2005-08-09 22:29:36', NULL, NULL),
(403, 'Display Product Quantity', 'PRODUCT_FEATURED_LIST_QUANTITY', '1202', 'Do you want to display the Product Quantity?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 22, 2, NULL, '2005-08-09 22:29:36', NULL, NULL),
(404, 'Display Product Buy Now Button', 'PRODUCT_FEATURED_BUY_NOW', '1300', 'Do you want to display the Product Buy Now Button<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 22, 3, NULL, '2005-08-09 22:29:36', NULL, NULL),
(405, 'Display Product Name', 'PRODUCT_FEATURED_LIST_NAME', '2101', 'Do you want to display the Product Name?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 22, 4, NULL, '2005-08-09 22:29:36', NULL, NULL),
(406, 'Display Product Model', 'PRODUCT_FEATURED_LIST_MODEL', '2201', 'Do you want to display the Product Model?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 22, 5, NULL, '2005-08-09 22:29:36', NULL, NULL),
(407, 'Display Product Manufacturer Name', 'PRODUCT_FEATURED_LIST_MANUFACTURER', '2302', 'Do you want to display the Product Manufacturer Name?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 22, 6, NULL, '2005-08-09 22:29:36', NULL, NULL),
(408, 'Display Product Price', 'PRODUCT_FEATURED_LIST_PRICE', '2402', 'Do you want to display the Product Price<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 22, 7, NULL, '2005-08-09 22:29:36', NULL, NULL),
(409, 'Display Product Weight', 'PRODUCT_FEATURED_LIST_WEIGHT', '2502', 'Do you want to display the Product Weight?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 22, 8, NULL, '2005-08-09 22:29:36', NULL, NULL),
(410, 'Display Product Date Added', 'PRODUCT_FEATURED_LIST_DATE_ADDED', '2601', 'Do you want to display the Product Date Added?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 22, 9, NULL, '2005-08-09 22:29:36', NULL, NULL),
(411, 'Display Product Description', 'PRODUCT_FEATURED_LIST_DESCRIPTION', '1', 'Do you want to display the Product Description - First 150 characters?', 22, 10, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(412, 'Display Product Display - Default Sort Order', 'PRODUCT_FEATURED_LIST_SORT_DEFAULT', '1', 'What Sort Order Default should be used for Featured Product Display?<br />Default= 1 for Product Name<br /><br />1= Products Name<br />2= Products Name Desc<br />3= Price low to high, Products Name<br />4= Price high to low, Products Name<br />5= Model<br />6= Date Added desc<br />7= Date Added<br />8= Product Sort Order', 22, 11, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''1'', ''2'', ''3'', ''4'', ''5'', ''6'', ''7'', ''8''), '),
(413, 'Default Featured Products Group ID', 'PRODUCT_FEATURED_LIST_GROUP_ID', '22', 'Warning: Only change this if your Featured Products Group ID has changed from the default of 22<br />What is the configuration_group_id for Featured Products Listings?', 22, 12, NULL, '2005-08-09 22:29:36', NULL, NULL),
(414, 'Display Multiple Products Qty Box Status and Set Button Location', 'PRODUCT_FEATURED_LISTING_MULTIPLE_ADD_TO_CART', '3', 'Do you want to display Add Multiple Products Qty Box and Set Button Location?<br />0= off<br />1= Top<br />2= Bottom<br />3= Both', 22, 25, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''), '),
(415, 'Display Product Image', 'PRODUCT_ALL_LIST_IMAGE', '1102', 'Do you want to display the Product Image?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 23, 1, NULL, '2005-08-09 22:29:36', NULL, NULL),
(416, 'Display Product Quantity', 'PRODUCT_ALL_LIST_QUANTITY', '1202', 'Do you want to display the Product Quantity?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 23, 2, NULL, '2005-08-09 22:29:36', NULL, NULL),
(417, 'Display Product Buy Now Button', 'PRODUCT_ALL_BUY_NOW', '1300', 'Do you want to display the Product Buy Now Button<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 23, 3, NULL, '2005-08-09 22:29:36', NULL, NULL),
(418, 'Display Product Name', 'PRODUCT_ALL_LIST_NAME', '2101', 'Do you want to display the Product Name?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 23, 4, NULL, '2005-08-09 22:29:36', NULL, NULL),
(419, 'Display Product Model', 'PRODUCT_ALL_LIST_MODEL', '2201', 'Do you want to display the Product Model?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 23, 5, NULL, '2005-08-09 22:29:36', NULL, NULL),
(420, 'Display Product Manufacturer Name', 'PRODUCT_ALL_LIST_MANUFACTURER', '2302', 'Do you want to display the Product Manufacturer Name?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 23, 6, NULL, '2005-08-09 22:29:36', NULL, NULL),
(421, 'Display Product Price', 'PRODUCT_ALL_LIST_PRICE', '2402', 'Do you want to display the Product Price<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 23, 7, NULL, '2005-08-09 22:29:36', NULL, NULL),
(422, 'Display Product Weight', 'PRODUCT_ALL_LIST_WEIGHT', '2502', 'Do you want to display the Product Weight?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 23, 8, NULL, '2005-08-09 22:29:36', NULL, NULL),
(423, 'Display Product Date Added', 'PRODUCT_ALL_LIST_DATE_ADDED', '2601', 'Do you want to display the Product Date Added?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 23, 9, NULL, '2005-08-09 22:29:36', NULL, NULL),
(424, 'Display Product Description', 'PRODUCT_ALL_LIST_DESCRIPTION', '1', 'Do you want to display the Product Description - First 150 characters?', 23, 10, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(425, 'Display Product Display - Default Sort Order', 'PRODUCT_ALL_LIST_SORT_DEFAULT', '1', 'What Sort Order Default should be used for All Products Display?<br />Default= 1 for Product Name<br /><br />1= Products Name<br />2= Products Name Desc<br />3= Price low to high, Products Name<br />4= Price high to low, Products Name<br />5= Model<br />6= Date Added desc<br />7= Date Added<br />8= Product Sort Order', 23, 11, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''1'', ''2'', ''3'', ''4'', ''5'', ''6'', ''7'', ''8''), '),
(426, 'Default Products All Group ID', 'PRODUCT_ALL_LIST_GROUP_ID', '23', 'Warning: Only change this if your Products All Group ID has changed from the default of 23<br />What is the configuration_group_id for Products All Listings?', 23, 12, NULL, '2005-08-09 22:29:36', NULL, NULL),
(427, 'Display Multiple Products Qty Box Status and Set Button Location', 'PRODUCT_ALL_LISTING_MULTIPLE_ADD_TO_CART', '3', 'Do you want to display Add Multiple Products Qty Box and Set Button Location?<br />0= off<br />1= Top<br />2= Bottom<br />3= Both', 23, 25, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''), '),
(428, 'Show New Products on Main Page', 'SHOW_PRODUCT_INFO_MAIN_NEW_PRODUCTS', '1', 'Show New Products on Main Page<br />0= off or set the sort order', 24, 65, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), '),
(429, 'Show Featured Products on Main Page', 'SHOW_PRODUCT_INFO_MAIN_FEATURED_PRODUCTS', '2', 'Show Featured Products on Main Page<br />0= off or set the sort order', 24, 66, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), '),
(430, 'Show Special Products on Main Page', 'SHOW_PRODUCT_INFO_MAIN_SPECIALS_PRODUCTS', '3', 'Show Special Products on Main Page<br />0= off or set the sort order', 24, 67, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), '),
(431, 'Show Upcoming Products on Main Page', 'SHOW_PRODUCT_INFO_MAIN_UPCOMING', '4', 'Show Upcoming Products on Main Page<br />0= off or set the sort order', 24, 68, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), '),
(432, 'Show New Products on Main Page - Category with SubCategories', 'SHOW_PRODUCT_INFO_CATEGORY_NEW_PRODUCTS', '1', 'Show New Products on Main Page - Category with SubCategories<br />0= off or set the sort order', 24, 70, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), '),
(433, 'Show Featured Products on Main Page - Category with SubCategories', 'SHOW_PRODUCT_INFO_CATEGORY_FEATURED_PRODUCTS', '2', 'Show Featured Products on Main Page - Category with SubCategories<br />0= off or set the sort order', 24, 71, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), '),
(434, 'Show Special Products on Main Page - Category with SubCategories', 'SHOW_PRODUCT_INFO_CATEGORY_SPECIALS_PRODUCTS', '3', 'Show Special Products on Main Page - Category with SubCategories<br />0= off or set the sort order', 24, 72, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), '),
(435, 'Show Upcoming Products on Main Page - Category with SubCategories', 'SHOW_PRODUCT_INFO_CATEGORY_UPCOMING', '4', 'Show Upcoming Products on Main Page - Category with SubCategories<br />0= off or set the sort order', 24, 73, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), '),
(436, 'Show New Products on Main Page - Errors and Missing Products Page', 'SHOW_PRODUCT_INFO_MISSING_NEW_PRODUCTS', '1', 'Show New Products on Main Page - Errors and Missing Product<br />0= off or set the sort order', 24, 75, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), '),
(437, 'Show Featured Products on Main Page - Errors and Missing Products Page', 'SHOW_PRODUCT_INFO_MISSING_FEATURED_PRODUCTS', '2', 'Show Featured Products on Main Page - Errors and Missing Product<br />0= off or set the sort order', 24, 76, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), '),
(438, 'Show Special Products on Main Page - Errors and Missing Products Page', 'SHOW_PRODUCT_INFO_MISSING_SPECIALS_PRODUCTS', '3', 'Show Special Products on Main Page - Errors and Missing Product<br />0= off or set the sort order', 24, 77, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), '),
(439, 'Show Upcoming Products on Main Page - Errors and Missing Products Page', 'SHOW_PRODUCT_INFO_MISSING_UPCOMING', '4', 'Show Upcoming Products on Main Page - Errors and Missing Product<br />0= off or set the sort order', 24, 78, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), '),
(440, 'Show New Products - below Product Listing', 'SHOW_PRODUCT_INFO_LISTING_BELOW_NEW_PRODUCTS', '1', 'Show New Products below Product Listing<br />0= off or set the sort order', 24, 85, NULL, '2005-08-09 22:29:36', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), '),
(441, 'Show Featured Products - below Product Listing', 'SHOW_PRODUCT_INFO_LISTING_BELOW_FEATURED_PRODUCTS', '2', 'Show Featured Products below Product Listing<br />0= off or set the sort order', 24, 86, NULL, '2005-08-09 22:29:37', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), '),
(442, 'Show Special Products - below Product Listing', 'SHOW_PRODUCT_INFO_LISTING_BELOW_SPECIALS_PRODUCTS', '3', 'Show Special Products below Product Listing<br />0= off or set the sort order', 24, 87, NULL, '2005-08-09 22:29:37', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), '),
(443, 'Show Upcoming Products - below Product Listing', 'SHOW_PRODUCT_INFO_LISTING_BELOW_UPCOMING', '4', 'Show Upcoming Products below Product Listing<br />0= off or set the sort order', 24, 88, NULL, '2005-08-09 22:29:37', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), '),
(444, 'New Products Columns per Row', 'SHOW_PRODUCT_INFO_COLUMNS_NEW_PRODUCTS', '3', 'New Products Columns per Row', 24, 95, NULL, '2005-08-09 22:29:37', NULL, 'zen_cfg_select_option(array(''1'', ''2'', ''3'', ''4''), '),
(445, 'Featured Products Columns per Row', 'SHOW_PRODUCT_INFO_COLUMNS_FEATURED_PRODUCTS', '3', 'Featured Products Columns per Row', 24, 96, NULL, '2005-08-09 22:29:37', NULL, 'zen_cfg_select_option(array(''1'', ''2'', ''3'', ''4''), '),
(446, 'Special Products Columns per Row', 'SHOW_PRODUCT_INFO_COLUMNS_SPECIALS_PRODUCTS', '3', 'Special Products Columns per Row', 24, 97, NULL, '2005-08-09 22:29:37', NULL, 'zen_cfg_select_option(array(''1'', ''2'', ''3'', ''4''), '),
(447, 'Filter Product Listing for Current Top Level Category When Enabled', 'SHOW_PRODUCT_INFO_ALL_PRODUCTS', '1', 'Filter the products when Product Listing is enabled for current Main Category or show products from all categories?<br />0= Filter Off 1=Filter On ', 24, 100, NULL, '2005-08-09 22:29:37', NULL, 'zen_cfg_select_option(array(''0'', ''1''), '),
(448, 'Define Main Page Status', 'DEFINE_MAIN_PAGE_STATUS', '1', 'Enable the Defined Main Page text?<br />0= OFF<br />1= ON', 25, 60, '2005-08-09 22:29:37', '2005-08-09 22:29:37', NULL, 'zen_cfg_select_option(array(''0'', ''1''),'),
(449, 'Define Contact Us Status', 'DEFINE_CONTACT_US_STATUS', '1', 'Enable the Defined Contact Us text?<br />0= OFF<br />1= ON', 25, 61, '2005-08-09 22:29:37', '2005-08-09 22:29:37', NULL, 'zen_cfg_select_option(array(''0'', ''1''),'),
(450, 'Define Privacy Status', 'DEFINE_PRIVACY_STATUS', '1', 'Enable the Defined Privacy text?<br />0= OFF<br />1= ON', 25, 62, '2005-08-09 22:29:37', '2005-08-09 22:29:37', NULL, 'zen_cfg_select_option(array(''0'', ''1''),'),
(451, 'Define Shipping & Returns', 'DEFINE_SHIPPINGINFO_STATUS', '1', 'Enable the Defined Shipping & Returns text?<br />0= OFF<br />1= ON', 25, 63, '2005-08-09 22:29:37', '2005-08-09 22:29:37', NULL, 'zen_cfg_select_option(array(''0'', ''1''),'),
(452, 'Define Conditions of Use', 'DEFINE_CONDITIONS_STATUS', '1', 'Enable the Defined Conditions of Use text?<br />0= OFF<br />1= ON', 25, 64, '2005-08-09 22:29:37', '2005-08-09 22:29:37', NULL, 'zen_cfg_select_option(array(''0'', ''1''),'),
(453, 'Define Checkout Success', 'DEFINE_CHECKOUT_SUCCESS_STATUS', '1', 'Enable the Defined Checkout Success text?<br />0= OFF<br />1= ON', 25, 65, '2005-08-09 22:29:37', '2005-08-09 22:29:37', NULL, 'zen_cfg_select_option(array(''0'', ''1''),'),
(454, 'Define Page 2', 'DEFINE_PAGE_2_STATUS', '1', 'Enable the Defined Page 2 text?<br />0= OFF<br />1= ON', 25, 82, '2005-08-09 22:29:37', '2005-08-09 22:29:37', NULL, 'zen_cfg_select_option(array(''0'', ''1''),'),
(455, 'Define Page 3', 'DEFINE_PAGE_3_STATUS', '1', 'Enable the Defined Page 3 text?<br />0= OFF<br />1= ON', 25, 83, '2005-08-09 22:29:37', '2005-08-09 22:29:37', NULL, 'zen_cfg_select_option(array(''0'', ''1''),'),
(456, 'Define Page 4', 'DEFINE_PAGE_4_STATUS', '1', 'Enable the Defined Page 4 text?<br />0= OFF<br />1= ON', 25, 84, '2005-08-09 22:29:37', '2005-08-09 22:29:37', NULL, 'zen_cfg_select_option(array(''0'', ''1''),'),
(457, 'Enable Check/Money Order Module', 'MODULE_PAYMENT_MONEYORDER_STATUS', 'True', 'Do you want to accept Check/Money Order payments?', 6, 1, NULL, '2005-08-15 10:58:53', NULL, 'zen_cfg_select_option(array(''True'', ''False''), '),
(458, 'Make Payable to:', 'MODULE_PAYMENT_MONEYORDER_PAYTO', 'Carlos Devia', 'Who should payments be made payable to?', 6, 1, NULL, '2005-08-15 10:58:53', NULL, NULL),
(459, 'Sort order of display.', 'MODULE_PAYMENT_MONEYORDER_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2005-08-15 10:58:53', NULL, NULL),
(460, 'Payment Zone', 'MODULE_PAYMENT_MONEYORDER_ZONE', '0', 'If a zone is selected, only enable this payment method for that zone.', 6, 2, NULL, '2005-08-15 10:58:53', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes('),
(461, 'Set Order Status', 'MODULE_PAYMENT_MONEYORDER_ORDER_STATUS_ID', '0', 'Set the status of orders made with this payment module to this value', 6, 0, NULL, '2005-08-15 10:58:53', 'zen_get_order_status_name', 'zen_cfg_pull_down_order_statuses('),
(462, 'Enable PayPal Module', 'MODULE_PAYMENT_PAYPAL_STATUS', 'True', 'Do you want to accept PayPal payments?', 6, 0, NULL, '2005-08-15 11:00:03', NULL, 'zen_cfg_select_option(array(''True'', ''False''), '),
(463, 'Business ID', 'MODULE_PAYMENT_PAYPAL_BUSINESS_ID', 'test@imaginacolombia.com', 'Primary email address for your PayPal account', 6, 2, NULL, '2005-08-15 11:00:03', NULL, NULL),
(464, 'Transaction Currency', 'MODULE_PAYMENT_PAYPAL_CURRENCY', 'Selected Currency', 'Choose the currency/currencies you want to accept', 6, 3, NULL, '2005-08-15 11:00:03', NULL, 'zen_cfg_select_option(array(''Selected Currency'',''Only USD'',''Only CAD'',''Only EUR'',''Only GBP'',''Only JPY'',''Only AUD''), '),
(465, 'Payment Zone', 'MODULE_PAYMENT_PAYPAL_ZONE', '0', 'If a zone is selected, only enable this payment method for that zone.', 6, 4, NULL, '2005-08-15 11:00:03', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes('),
(466, 'Set Pending Notification Status', 'MODULE_PAYMENT_PAYPAL_PROCESSING_STATUS_ID', '1', 'Set the status of orders made with this payment module that are not yet completed to this value<br />(''Pending'' recommended)', 6, 5, NULL, '2005-08-15 11:00:03', 'zen_get_order_status_name', 'zen_cfg_pull_down_order_statuses('),
(467, 'Set Order Status', 'MODULE_PAYMENT_PAYPAL_ORDER_STATUS_ID', '2', 'Set the status of orders made with this payment module that have completed payment to this value<br />(''Processing'' recommended)', 6, 6, NULL, '2005-08-15 11:00:03', 'zen_get_order_status_name', 'zen_cfg_pull_down_order_statuses('),
(468, 'Set Refund Order Status', 'MODULE_PAYMENT_PAYPAL_REFUND_ORDER_STATUS_ID', '1', 'Set the status of orders that have been refunded made with this payment module to this value<br />(''Pending'' recommended)', 6, 7, NULL, '2005-08-15 11:00:03', 'zen_get_order_status_name', 'zen_cfg_pull_down_order_statuses('),
(469, 'Sort order of display.', 'MODULE_PAYMENT_PAYPAL_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', 6, 8, NULL, '2005-08-15 11:00:03', NULL, NULL),
(470, 'Address override', 'MODULE_PAYMENT_PAYPAL_ADDRESS_OVERRIDE', '', 'If set to 1 the address passed in via Zen Cart will override the users paypal-stored address. The user will be shown the Zen Cart address, but will not be able to edit it. If the address is not valid (i.e. missing required fields, including country) or not included, then no address will be shown.<br />Empty=No Override<br />1=Passed-in Address overrides users paypal-stored address', 6, 18, NULL, '2005-08-15 11:00:03', NULL, 'zen_cfg_select_option(array('''',''1''), '),
(471, 'Shipping Address Options', 'MODULE_PAYMENT_PAYPAL_ADDRESS_REQUIRED', '1', 'The buyers shipping address. If set to 0 your customer will be prompted to include a shipping address. If set to 1 your customer will not be asked for a shipping address. If set to 2 your customer will be required to provide a shipping address.<br />0=Prompt<br />1=Not Asked<br />2=Required<br /><br /><strong>NOTE: If you allow your customers to enter their own shipping address, then MAKE SURE you check the paypal confirmation details to verify the proper address when filling orders. Zen Cart does not know if they choose an alternate shipping address compared to the one entered when placing an order.</strong>', 6, 20, NULL, '2005-08-15 11:00:03', NULL, 'zen_cfg_select_option(array(''0'',''1'',''2''), '),
(472, 'Continue Button Text', 'MODULE_PAYMENT_PAYPAL_CBT', '', 'Sets the text for the Continue button on the PayPal Payment Complete page. Requires Return URL to be set.', 6, 22, NULL, '2005-08-15 11:00:03', NULL, NULL),
(473, 'Image URL', 'MODULE_PAYMENT_PAYPAL_IMAGE_URL', '', 'The internet URL of the 150x50-pixel image you would like to use as your logo. If omitted, the customer will see your Business name if you have a Business account, or your email address if you have premier account.', 6, 24, NULL, '2005-08-15 11:00:03', NULL, NULL),
(474, 'Page Style', 'MODULE_PAYMENT_PAYPAL_PAGE_STYLE', 'paypal', 'Sets the Custom Payment Page Style for payment pages. The value of page_style is the same as the Page Style Name you chose when adding or editing the page style. You can add and edit Custom Payment Page Styles from the Profile subtab of the My Account tab on the paypal site. If you would like to always reference your Primary style, set this to "primary." If you would like to reference the default PayPal page style, set this to "paypal".', 6, 25, NULL, '2005-08-15 11:00:03', NULL, NULL),
(475, 'Debug Email Notifications', 'MODULE_PAYMENT_PAYPAL_IPN_DEBUG', 'No', 'Enable debug email notifications', 6, 71, NULL, '2005-08-15 11:00:03', NULL, 'zen_cfg_select_option(array(''Yes'',''No''), '),
(476, 'Debug E-Mail Address', 'MODULE_PAYMENT_PAYPAL_DEBUG_EMAIL_ADDRESS', 'test@imaginacolombia.com', 'The e-mail address to use for paypal debugging', 6, 72, NULL, '2005-08-15 11:00:03', NULL, NULL),
(477, 'Mode for PayPal web services<br /><br />Default:<br /><code>www.paypal.com/cgi-bin/webscr</code><br />or<br /><code>www.paypal.com/us/cgi-bin/webscr</code>', 'MODULE_PAYMENT_PAYPAL_HANDLER', 'www.paypal.com/cgi-bin/webscr', 'Choose the URL for PayPal live processing', 6, 73, NULL, '2005-08-15 11:00:03', NULL, ''),
(478, '<font color=red>NOTE: On www.paypal.com</font>,<br />set your PayPal IPN Return URL to:', 'MODULE_PAYMENT_PAYPAL_IPN_RETURN_URL', '/xoopsshop/xoopsshop/modules/shop/index.php?main_page=checkout_process', '<font color=red><strong>DO NOT EDIT.</strong></font><br />This is the URL that PayPal needs to be configured to return to.', 6, 99, NULL, '2005-08-15 11:00:03', NULL, 'zen_cfg_select_option(array(''/xoopsshop/xoopsshop/modules/shop/index.php?main_page=checkout_process''), '),
(479, 'Categories-Tabs Menu ON/OFF', 'CATEGORIES_TABS_STATUS', '0', 'Categories-Tabs<br />This enables the display of your store''s categories as a menu across the top of your header. There are many potential creative uses for this.<br />0= Hide Categories Tabs<br />1= Show Categories Tabs', 19, 112, NULL, '2005-09-18 23:07:53', NULL, 'zen_cfg_select_option(array(''0'', ''1''), ');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcconfiguration_group`
-- 

CREATE TABLE `zcconfiguration_group` (
  `configuration_group_id` int(11) NOT NULL auto_increment,
  `configuration_group_title` varchar(64) NOT NULL default '',
  `configuration_group_description` varchar(255) NOT NULL default '',
  `sort_order` int(5) default NULL,
  `visible` int(1) default '1',
  PRIMARY KEY  (`configuration_group_id`),
  KEY `idx_visible_zen` (`visible`)
)   AUTO_INCREMENT=26 ;

-- 
-- Volcar la base de datos para la tabla `zcconfiguration_group`
-- 

INSERT INTO `zcconfiguration_group` (`configuration_group_id`, `configuration_group_title`, `configuration_group_description`, `sort_order`, `visible`) VALUES (1, 'My Store', 'General information about my store', 1, 1),
(2, 'Minimum Values', 'The minimum values for functions / data', 2, 1),
(3, 'Maximum Values', 'The maximum values for functions / data', 3, 1),
(4, 'Images', 'Image parameters', 4, 1),
(5, 'Customer Details', 'Customer account configuration', 5, 1),
(6, 'Module Options', 'Hidden from configuration', 6, 0),
(7, 'Shipping/Packaging', 'Shipping options available at my store', 7, 1),
(8, 'Product Listing', 'Product Listing configuration options', 8, 1),
(9, 'Stock', 'Stock configuration options', 9, 1),
(10, 'Logging', 'Logging configuration options', 10, 1),
(11, 'Regulations', 'Regulation options', 16, 1),
(12, 'E-Mail Options', 'General setting for E-Mail transport and HTML E-Mails', 12, 1),
(13, 'Attribute Settings', 'Configure products attributes settings', 13, 1),
(14, 'GZip Compression', 'GZip compression options', 14, 1),
(15, 'Sessions', 'Session options', 15, 1),
(16, 'GV Coupons', 'Gift Vouchers and Coupons', 16, 1),
(17, 'Credit Cards', 'Credit Cards Accepted', 17, 1),
(18, 'Product Info', 'Product Info Display Options', 18, 1),
(19, 'Layout Settings', 'Layout Options', 19, 1),
(20, 'Website Maintenance', 'Website Maintenance Options', 20, 1),
(21, 'New Listing', 'New Products Listing', 21, 1),
(22, 'Featured Listing', 'Featured Products Listing', 22, 1),
(23, 'All Listing', 'All Products Listing', 23, 1),
(24, 'Index Listing', 'Index Products Listing', 24, 1),
(25, 'Define Page Status', 'Define Main Pages and HTMLArea Options', 25, 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zccounter`
-- 

CREATE TABLE `zccounter` (
  `startdate` char(8) default NULL,
  `counter` int(12) default NULL
)  ;

-- 
-- Volcar la base de datos para la tabla `zccounter`
-- 

INSERT INTO `zccounter` (`startdate`, `counter`) VALUES ('20050809', 6);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zccounter_history`
-- 

CREATE TABLE `zccounter_history` (
  `month` char(8) default NULL,
  `counter` int(12) default NULL
)  ;

-- 
-- Volcar la base de datos para la tabla `zccounter_history`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zccountries`
-- 

CREATE TABLE `zccountries` (
  `countries_id` int(11) NOT NULL auto_increment,
  `countries_name` varchar(64) NOT NULL default '',
  `countries_iso_code_2` varchar(2) NOT NULL default '',
  `countries_iso_code_3` varchar(3) NOT NULL default '',
  `address_format_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`countries_id`),
  KEY `idx_countries_name_zen` (`countries_name`)
)   AUTO_INCREMENT=240 ;

-- 
-- Volcar la base de datos para la tabla `zccountries`
-- 

INSERT INTO `zccountries` (`countries_id`, `countries_name`, `countries_iso_code_2`, `countries_iso_code_3`, `address_format_id`) VALUES (1, 'Afghanistan', 'AF', 'AFG', 1),
(2, 'Albania', 'AL', 'ALB', 1),
(3, 'Algeria', 'DZ', 'DZA', 1),
(4, 'American Samoa', 'AS', 'ASM', 1),
(5, 'Andorra', 'AD', 'AND', 1),
(6, 'Angola', 'AO', 'AGO', 1),
(7, 'Anguilla', 'AI', 'AIA', 1),
(8, 'Antarctica', 'AQ', 'ATA', 1),
(9, 'Antigua and Barbuda', 'AG', 'ATG', 1),
(10, 'Argentina', 'AR', 'ARG', 1),
(11, 'Armenia', 'AM', 'ARM', 1),
(12, 'Aruba', 'AW', 'ABW', 1),
(13, 'Australia', 'AU', 'AUS', 1),
(14, 'Austria', 'AT', 'AUT', 5),
(15, 'Azerbaijan', 'AZ', 'AZE', 1),
(16, 'Bahamas', 'BS', 'BHS', 1),
(17, 'Bahrain', 'BH', 'BHR', 1),
(18, 'Bangladesh', 'BD', 'BGD', 1),
(19, 'Barbados', 'BB', 'BRB', 1),
(20, 'Belarus', 'BY', 'BLR', 1),
(21, 'Belgium', 'BE', 'BEL', 1),
(22, 'Belize', 'BZ', 'BLZ', 1),
(23, 'Benin', 'BJ', 'BEN', 1),
(24, 'Bermuda', 'BM', 'BMU', 1),
(25, 'Bhutan', 'BT', 'BTN', 1),
(26, 'Bolivia', 'BO', 'BOL', 1),
(27, 'Bosnia and Herzegowina', 'BA', 'BIH', 1),
(28, 'Botswana', 'BW', 'BWA', 1),
(29, 'Bouvet Island', 'BV', 'BVT', 1),
(30, 'Brazil', 'BR', 'BRA', 1),
(31, 'British Indian Ocean Territory', 'IO', 'IOT', 1),
(32, 'Brunei Darussalam', 'BN', 'BRN', 1),
(33, 'Bulgaria', 'BG', 'BGR', 1),
(34, 'Burkina Faso', 'BF', 'BFA', 1),
(35, 'Burundi', 'BI', 'BDI', 1),
(36, 'Cambodia', 'KH', 'KHM', 1),
(37, 'Cameroon', 'CM', 'CMR', 1),
(38, 'Canada', 'CA', 'CAN', 1),
(39, 'Cape Verde', 'CV', 'CPV', 1),
(40, 'Cayman Islands', 'KY', 'CYM', 1),
(41, 'Central African Republic', 'CF', 'CAF', 1),
(42, 'Chad', 'TD', 'TCD', 1),
(43, 'Chile', 'CL', 'CHL', 1),
(44, 'China', 'CN', 'CHN', 1),
(45, 'Christmas Island', 'CX', 'CXR', 1),
(46, 'Cocos (Keeling) Islands', 'CC', 'CCK', 1),
(47, 'Colombia', 'CO', 'COL', 1),
(48, 'Comoros', 'KM', 'COM', 1),
(49, 'Congo', 'CG', 'COG', 1),
(50, 'Cook Islands', 'CK', 'COK', 1),
(51, 'Costa Rica', 'CR', 'CRI', 1),
(52, 'Cote D''Ivoire', 'CI', 'CIV', 1),
(53, 'Croatia', 'HR', 'HRV', 1),
(54, 'Cuba', 'CU', 'CUB', 1),
(55, 'Cyprus', 'CY', 'CYP', 1),
(56, 'Czech Republic', 'CZ', 'CZE', 1),
(57, 'Denmark', 'DK', 'DNK', 1),
(58, 'Djibouti', 'DJ', 'DJI', 1),
(59, 'Dominica', 'DM', 'DMA', 1),
(60, 'Dominican Republic', 'DO', 'DOM', 1),
(61, 'East Timor', 'TP', 'TMP', 1),
(62, 'Ecuador', 'EC', 'ECU', 1),
(63, 'Egypt', 'EG', 'EGY', 1),
(64, 'El Salvador', 'SV', 'SLV', 1),
(65, 'Equatorial Guinea', 'GQ', 'GNQ', 1),
(66, 'Eritrea', 'ER', 'ERI', 1),
(67, 'Estonia', 'EE', 'EST', 1),
(68, 'Ethiopia', 'ET', 'ETH', 1),
(69, 'Falkland Islands (Malvinas)', 'FK', 'FLK', 1),
(70, 'Faroe Islands', 'FO', 'FRO', 1),
(71, 'Fiji', 'FJ', 'FJI', 1),
(72, 'Finland', 'FI', 'FIN', 1),
(73, 'France', 'FR', 'FRA', 1),
(74, 'France, Metropolitan', 'FX', 'FXX', 1),
(75, 'French Guiana', 'GF', 'GUF', 1),
(76, 'French Polynesia', 'PF', 'PYF', 1),
(77, 'French Southern Territories', 'TF', 'ATF', 1),
(78, 'Gabon', 'GA', 'GAB', 1),
(79, 'Gambia', 'GM', 'GMB', 1),
(80, 'Georgia', 'GE', 'GEO', 1),
(81, 'Germany', 'DE', 'DEU', 5),
(82, 'Ghana', 'GH', 'GHA', 1),
(83, 'Gibraltar', 'GI', 'GIB', 1),
(84, 'Greece', 'GR', 'GRC', 1),
(85, 'Greenland', 'GL', 'GRL', 1),
(86, 'Grenada', 'GD', 'GRD', 1),
(87, 'Guadeloupe', 'GP', 'GLP', 1),
(88, 'Guam', 'GU', 'GUM', 1),
(89, 'Guatemala', 'GT', 'GTM', 1),
(90, 'Guinea', 'GN', 'GIN', 1),
(91, 'Guinea-bissau', 'GW', 'GNB', 1),
(92, 'Guyana', 'GY', 'GUY', 1),
(93, 'Haiti', 'HT', 'HTI', 1),
(94, 'Heard and Mc Donald Islands', 'HM', 'HMD', 1),
(95, 'Honduras', 'HN', 'HND', 1),
(96, 'Hong Kong', 'HK', 'HKG', 1),
(97, 'Hungary', 'HU', 'HUN', 1),
(98, 'Iceland', 'IS', 'ISL', 1),
(99, 'India', 'IN', 'IND', 1),
(100, 'Indonesia', 'ID', 'IDN', 1),
(101, 'Iran (Islamic Republic of)', 'IR', 'IRN', 1),
(102, 'Iraq', 'IQ', 'IRQ', 1),
(103, 'Ireland', 'IE', 'IRL', 1),
(104, 'Israel', 'IL', 'ISR', 1),
(105, 'Italy', 'IT', 'ITA', 1),
(106, 'Jamaica', 'JM', 'JAM', 1),
(107, 'Japan', 'JP', 'JPN', 1),
(108, 'Jordan', 'JO', 'JOR', 1),
(109, 'Kazakhstan', 'KZ', 'KAZ', 1),
(110, 'Kenya', 'KE', 'KEN', 1),
(111, 'Kiribati', 'KI', 'KIR', 1),
(112, 'Korea, Democratic People''s Republic of', 'KP', 'PRK', 1),
(113, 'Korea, Republic of', 'KR', 'KOR', 1),
(114, 'Kuwait', 'KW', 'KWT', 1),
(115, 'Kyrgyzstan', 'KG', 'KGZ', 1),
(116, 'Lao People''s Democratic Republic', 'LA', 'LAO', 1),
(117, 'Latvia', 'LV', 'LVA', 1),
(118, 'Lebanon', 'LB', 'LBN', 1),
(119, 'Lesotho', 'LS', 'LSO', 1),
(120, 'Liberia', 'LR', 'LBR', 1),
(121, 'Libyan Arab Jamahiriya', 'LY', 'LBY', 1),
(122, 'Liechtenstein', 'LI', 'LIE', 1),
(123, 'Lithuania', 'LT', 'LTU', 1),
(124, 'Luxembourg', 'LU', 'LUX', 1),
(125, 'Macau', 'MO', 'MAC', 1),
(126, 'Macedonia, The Former Yugoslav Republic of', 'MK', 'MKD', 1),
(127, 'Madagascar', 'MG', 'MDG', 1),
(128, 'Malawi', 'MW', 'MWI', 1),
(129, 'Malaysia', 'MY', 'MYS', 1),
(130, 'Maldives', 'MV', 'MDV', 1),
(131, 'Mali', 'ML', 'MLI', 1),
(132, 'Malta', 'MT', 'MLT', 1),
(133, 'Marshall Islands', 'MH', 'MHL', 1),
(134, 'Martinique', 'MQ', 'MTQ', 1),
(135, 'Mauritania', 'MR', 'MRT', 1),
(136, 'Mauritius', 'MU', 'MUS', 1),
(137, 'Mayotte', 'YT', 'MYT', 1),
(138, 'Mexico', 'MX', 'MEX', 1),
(139, 'Micronesia, Federated States of', 'FM', 'FSM', 1),
(140, 'Moldova, Republic of', 'MD', 'MDA', 1),
(141, 'Monaco', 'MC', 'MCO', 1),
(142, 'Mongolia', 'MN', 'MNG', 1),
(143, 'Montserrat', 'MS', 'MSR', 1),
(144, 'Morocco', 'MA', 'MAR', 1),
(145, 'Mozambique', 'MZ', 'MOZ', 1),
(146, 'Myanmar', 'MM', 'MMR', 1),
(147, 'Namibia', 'NA', 'NAM', 1),
(148, 'Nauru', 'NR', 'NRU', 1),
(149, 'Nepal', 'NP', 'NPL', 1),
(150, 'Netherlands', 'NL', 'NLD', 1),
(151, 'Netherlands Antilles', 'AN', 'ANT', 1),
(152, 'New Caledonia', 'NC', 'NCL', 1),
(153, 'New Zealand', 'NZ', 'NZL', 1),
(154, 'Nicaragua', 'NI', 'NIC', 1),
(155, 'Niger', 'NE', 'NER', 1),
(156, 'Nigeria', 'NG', 'NGA', 1),
(157, 'Niue', 'NU', 'NIU', 1),
(158, 'Norfolk Island', 'NF', 'NFK', 1),
(159, 'Northern Mariana Islands', 'MP', 'MNP', 1),
(160, 'Norway', 'NO', 'NOR', 1),
(161, 'Oman', 'OM', 'OMN', 1),
(162, 'Pakistan', 'PK', 'PAK', 1),
(163, 'Palau', 'PW', 'PLW', 1),
(164, 'Panama', 'PA', 'PAN', 1),
(165, 'Papua New Guinea', 'PG', 'PNG', 1),
(166, 'Paraguay', 'PY', 'PRY', 1),
(167, 'Peru', 'PE', 'PER', 1),
(168, 'Philippines', 'PH', 'PHL', 1),
(169, 'Pitcairn', 'PN', 'PCN', 1),
(170, 'Poland', 'PL', 'POL', 1),
(171, 'Portugal', 'PT', 'PRT', 1),
(172, 'Puerto Rico', 'PR', 'PRI', 1),
(173, 'Qatar', 'QA', 'QAT', 1),
(174, 'Reunion', 'RE', 'REU', 1),
(175, 'Romania', 'RO', 'ROM', 1),
(176, 'Russian Federation', 'RU', 'RUS', 1),
(177, 'Rwanda', 'RW', 'RWA', 1),
(178, 'Saint Kitts and Nevis', 'KN', 'KNA', 1),
(179, 'Saint Lucia', 'LC', 'LCA', 1),
(180, 'Saint Vincent and the Grenadines', 'VC', 'VCT', 1),
(181, 'Samoa', 'WS', 'WSM', 1),
(182, 'San Marino', 'SM', 'SMR', 1),
(183, 'Sao Tome and Principe', 'ST', 'STP', 1),
(184, 'Saudi Arabia', 'SA', 'SAU', 1),
(185, 'Senegal', 'SN', 'SEN', 1),
(186, 'Seychelles', 'SC', 'SYC', 1),
(187, 'Sierra Leone', 'SL', 'SLE', 1),
(188, 'Singapore', 'SG', 'SGP', 4),
(189, 'Slovakia (Slovak Republic)', 'SK', 'SVK', 1),
(190, 'Slovenia', 'SI', 'SVN', 1),
(191, 'Solomon Islands', 'SB', 'SLB', 1),
(192, 'Somalia', 'SO', 'SOM', 1),
(193, 'South Africa', 'ZA', 'ZAF', 1),
(194, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS', 1),
(195, 'Spain', 'ES', 'ESP', 3),
(196, 'Sri Lanka', 'LK', 'LKA', 1),
(197, 'St. Helena', 'SH', 'SHN', 1),
(198, 'St. Pierre and Miquelon', 'PM', 'SPM', 1),
(199, 'Sudan', 'SD', 'SDN', 1),
(200, 'Suriname', 'SR', 'SUR', 1),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', 1),
(202, 'Swaziland', 'SZ', 'SWZ', 1),
(203, 'Sweden', 'SE', 'SWE', 1),
(204, 'Switzerland', 'CH', 'CHE', 1),
(205, 'Syrian Arab Republic', 'SY', 'SYR', 1),
(206, 'Taiwan', 'TW', 'TWN', 1),
(207, 'Tajikistan', 'TJ', 'TJK', 1),
(208, 'Tanzania, United Republic of', 'TZ', 'TZA', 1),
(209, 'Thailand', 'TH', 'THA', 1),
(210, 'Togo', 'TG', 'TGO', 1),
(211, 'Tokelau', 'TK', 'TKL', 1),
(212, 'Tonga', 'TO', 'TON', 1),
(213, 'Trinidad and Tobago', 'TT', 'TTO', 1),
(214, 'Tunisia', 'TN', 'TUN', 1),
(215, 'Turkey', 'TR', 'TUR', 1),
(216, 'Turkmenistan', 'TM', 'TKM', 1),
(217, 'Turks and Caicos Islands', 'TC', 'TCA', 1),
(218, 'Tuvalu', 'TV', 'TUV', 1),
(219, 'Uganda', 'UG', 'UGA', 1),
(220, 'Ukraine', 'UA', 'UKR', 1),
(221, 'United Arab Emirates', 'AE', 'ARE', 1),
(222, 'United Kingdom', 'GB', 'GBR', 1),
(223, 'United States', 'US', 'USA', 2),
(224, 'United States Minor Outlying Islands', 'UM', 'UMI', 1),
(225, 'Uruguay', 'UY', 'URY', 1),
(226, 'Uzbekistan', 'UZ', 'UZB', 1),
(227, 'Vanuatu', 'VU', 'VUT', 1),
(228, 'Vatican City State (Holy See)', 'VA', 'VAT', 1),
(229, 'Venezuela', 'VE', 'VEN', 1),
(230, 'Viet Nam', 'VN', 'VNM', 1),
(231, 'Virgin Islands (British)', 'VG', 'VGB', 1),
(232, 'Virgin Islands (U.S.)', 'VI', 'VIR', 1),
(233, 'Wallis and Futuna Islands', 'WF', 'WLF', 1),
(234, 'Western Sahara', 'EH', 'ESH', 1),
(235, 'Yemen', 'YE', 'YEM', 1),
(236, 'Yugoslavia', 'YU', 'YUG', 1),
(237, 'Zaire', 'ZR', 'ZAR', 1),
(238, 'Zambia', 'ZM', 'ZMB', 1),
(239, 'Zimbabwe', 'ZW', 'ZWE', 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zccoupon_email_track`
-- 

CREATE TABLE `zccoupon_email_track` (
  `unique_id` int(11) NOT NULL auto_increment,
  `coupon_id` int(11) NOT NULL default '0',
  `customer_id_sent` int(11) NOT NULL default '0',
  `sent_firstname` varchar(32) default NULL,
  `sent_lastname` varchar(32) default NULL,
  `emailed_to` varchar(32) default NULL,
  `date_sent` datetime NOT NULL default '0001-01-01 00:00:00',
  PRIMARY KEY  (`unique_id`),
  KEY `idx_coupon_id_zen` (`coupon_id`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zccoupon_email_track`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zccoupon_gv_customer`
-- 

CREATE TABLE `zccoupon_gv_customer` (
  `customer_id` int(5) NOT NULL default '0',
  `amount` decimal(8,4) NOT NULL default '0.0000',
  PRIMARY KEY  (`customer_id`),
  KEY `idx_customer_id_zen` (`customer_id`)
)  ;

-- 
-- Volcar la base de datos para la tabla `zccoupon_gv_customer`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zccoupon_gv_queue`
-- 

CREATE TABLE `zccoupon_gv_queue` (
  `unique_id` int(5) NOT NULL auto_increment,
  `customer_id` int(5) NOT NULL default '0',
  `order_id` int(5) NOT NULL default '0',
  `amount` decimal(8,4) NOT NULL default '0.0000',
  `date_created` datetime NOT NULL default '0001-01-01 00:00:00',
  `ipaddr` varchar(32) NOT NULL default '',
  `release_flag` char(1) NOT NULL default 'N',
  PRIMARY KEY  (`unique_id`),
  KEY `idx_cust_id_order_id_zen` (`customer_id`,`order_id`),
  KEY `idx_release_flag_zen` (`release_flag`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zccoupon_gv_queue`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zccoupon_redeem_track`
-- 

CREATE TABLE `zccoupon_redeem_track` (
  `unique_id` int(11) NOT NULL auto_increment,
  `coupon_id` int(11) NOT NULL default '0',
  `customer_id` int(11) NOT NULL default '0',
  `redeem_date` datetime NOT NULL default '0001-01-01 00:00:00',
  `redeem_ip` varchar(32) NOT NULL default '',
  `order_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`unique_id`),
  KEY `idx_coupon_id_zen` (`coupon_id`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zccoupon_redeem_track`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zccoupon_restrict`
-- 

CREATE TABLE `zccoupon_restrict` (
  `restrict_id` int(11) NOT NULL auto_increment,
  `coupon_id` int(11) NOT NULL default '0',
  `product_id` int(11) NOT NULL default '0',
  `category_id` int(11) NOT NULL default '0',
  `coupon_restrict` char(1) NOT NULL default 'N',
  PRIMARY KEY  (`restrict_id`),
  KEY `idx_coup_id_prod_id_zen` (`coupon_id`,`product_id`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zccoupon_restrict`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zccoupons`
-- 

CREATE TABLE `zccoupons` (
  `coupon_id` int(11) NOT NULL auto_increment,
  `coupon_type` char(1) NOT NULL default 'F',
  `coupon_code` varchar(32) NOT NULL default '',
  `coupon_amount` decimal(8,4) NOT NULL default '0.0000',
  `coupon_minimum_order` decimal(8,4) NOT NULL default '0.0000',
  `coupon_start_date` datetime NOT NULL default '0001-01-01 00:00:00',
  `coupon_expire_date` datetime NOT NULL default '0001-01-01 00:00:00',
  `uses_per_coupon` int(5) NOT NULL default '1',
  `uses_per_user` int(5) NOT NULL default '0',
  `restrict_to_products` varchar(255) default NULL,
  `restrict_to_categories` varchar(255) default NULL,
  `restrict_to_customers` text,
  `coupon_active` char(1) NOT NULL default 'Y',
  `date_created` datetime NOT NULL default '0001-01-01 00:00:00',
  `date_modified` datetime NOT NULL default '0001-01-01 00:00:00',
  PRIMARY KEY  (`coupon_id`),
  KEY `idx_active_type_zen` (`coupon_active`,`coupon_type`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zccoupons`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zccoupons_description`
-- 

CREATE TABLE `zccoupons_description` (
  `coupon_id` int(11) NOT NULL default '0',
  `language_id` int(11) NOT NULL default '0',
  `coupon_name` varchar(32) NOT NULL default '',
  `coupon_description` text,
  PRIMARY KEY  (`coupon_id`,`language_id`)
)  ;

-- 
-- Volcar la base de datos para la tabla `zccoupons_description`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zccurrencies`
-- 

CREATE TABLE `zccurrencies` (
  `currencies_id` int(11) NOT NULL auto_increment,
  `title` varchar(32) NOT NULL default '',
  `code` varchar(3) NOT NULL default '',
  `symbol_left` varchar(24) default NULL,
  `symbol_right` varchar(24) default NULL,
  `decimal_point` char(1) default NULL,
  `thousands_point` char(1) default NULL,
  `decimal_places` char(1) default NULL,
  `value` float(13,8) default NULL,
  `last_updated` datetime default NULL,
  PRIMARY KEY  (`currencies_id`)
)   AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `zccurrencies`
-- 

INSERT INTO `zccurrencies` (`currencies_id`, `title`, `code`, `symbol_left`, `symbol_right`, `decimal_point`, `thousands_point`, `decimal_places`, `value`, `last_updated`) VALUES (1, 'US Dollar', 'USD', '$', '', '.', ',', '2', 1.00000000, '2005-08-09 22:29:39'),
(2, 'Euro', 'EUR', '', 'EUR', '.', ',', '2', 1.10360003, '2005-08-09 22:29:39');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zccustomers`
-- 

CREATE TABLE `zccustomers` (
  `customers_id` int(11) NOT NULL auto_increment,
  `customers_gender` char(1) NOT NULL default '',
  `customers_firstname` varchar(32) NOT NULL default '',
  `customers_lastname` varchar(32) NOT NULL default '',
  `customers_dob` datetime NOT NULL default '0001-01-01 00:00:00',
  `customers_email_address` varchar(96) NOT NULL default '',
  `customers_nick` varchar(96) NOT NULL default '',
  `customers_default_address_id` int(11) NOT NULL default '0',
  `customers_telephone` varchar(32) NOT NULL default '',
  `customers_fax` varchar(32) default NULL,
  `customers_password` varchar(40) NOT NULL default '',
  `customers_newsletter` char(1) default NULL,
  `customers_group_pricing` int(11) NOT NULL default '0',
  `customers_email_format` varchar(4) NOT NULL default 'TEXT',
  `customers_authorization` int(1) NOT NULL default '0',
  `customers_referral` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`customers_id`),
  KEY `idx_email_address_zen` (`customers_email_address`),
  KEY `idx_referral_zen` (`customers_referral`(10)),
  KEY `idx_grp_pricing_zen` (`customers_group_pricing`),
  KEY `idx_nick_zen` (`customers_nick`),
  KEY `idx_newsletter_zen` (`customers_newsletter`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zccustomers`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zccustomers_basket`
-- 

CREATE TABLE `zccustomers_basket` (
  `customers_basket_id` int(11) NOT NULL auto_increment,
  `customers_id` int(11) NOT NULL default '0',
  `products_id` tinytext NOT NULL,
  `customers_basket_quantity` float NOT NULL default '0',
  `final_price` decimal(15,4) NOT NULL default '0.0000',
  `customers_basket_date_added` varchar(8) default NULL,
  PRIMARY KEY  (`customers_basket_id`),
  KEY `idx_customers_id_zen` (`customers_id`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zccustomers_basket`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zccustomers_basket_attributes`
-- 

CREATE TABLE `zccustomers_basket_attributes` (
  `customers_basket_attributes_id` int(11) NOT NULL auto_increment,
  `customers_id` int(11) NOT NULL default '0',
  `products_id` tinytext NOT NULL,
  `products_options_id` varchar(64) NOT NULL default '0',
  `products_options_value_id` int(11) NOT NULL default '0',
  `products_options_value_text` varchar(64) default NULL,
  `products_options_sort_order` text NOT NULL,
  PRIMARY KEY  (`customers_basket_attributes_id`),
  KEY `idx_cust_id_prod_id_zen` (`customers_id`,`products_id`(36))
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zccustomers_basket_attributes`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zccustomers_info`
-- 

CREATE TABLE `zccustomers_info` (
  `customers_info_id` int(11) NOT NULL default '0',
  `customers_info_date_of_last_logon` datetime default NULL,
  `customers_info_number_of_logons` int(5) default NULL,
  `customers_info_date_account_created` datetime default NULL,
  `customers_info_date_account_last_modified` datetime default NULL,
  `global_product_notifications` int(1) default '0',
  PRIMARY KEY  (`customers_info_id`)
)  ;

-- 
-- Volcar la base de datos para la tabla `zccustomers_info`
-- 

INSERT INTO `zccustomers_info` (`customers_info_id`, `customers_info_date_of_last_logon`, `customers_info_number_of_logons`, `customers_info_date_account_created`, `customers_info_date_account_last_modified`, `global_product_notifications`) VALUES (1, NULL, 0, '2005-08-15 10:49:04', NULL, 0);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zccustomers_wishlist`
-- 

CREATE TABLE `zccustomers_wishlist` (
  `products_id` int(13) NOT NULL default '0',
  `customers_id` int(13) NOT NULL default '0',
  `products_model` varchar(13) default NULL,
  `products_name` varchar(64) NOT NULL default '',
  `products_price` decimal(8,2) NOT NULL default '0.00',
  `final_price` decimal(8,2) NOT NULL default '0.00',
  `products_quantity` int(2) NOT NULL default '0',
  `wishlist_name` varchar(64) default NULL
)  ;

-- 
-- Volcar la base de datos para la tabla `zccustomers_wishlist`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcdb_cache`
-- 

CREATE TABLE `zcdb_cache` (
  `cache_entry_name` varchar(64) NOT NULL default '',
  `cache_data` blob,
  `cache_entry_created` int(15) default NULL,
  PRIMARY KEY  (`cache_entry_name`)
)  ;

-- 
-- Volcar la base de datos para la tabla `zcdb_cache`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcemail_archive`
-- 

CREATE TABLE `zcemail_archive` (
  `archive_id` int(11) NOT NULL auto_increment,
  `email_to_name` varchar(96) NOT NULL default '',
  `email_to_address` varchar(96) NOT NULL default '',
  `email_from_name` varchar(96) NOT NULL default '',
  `email_from_address` varchar(96) NOT NULL default '',
  `email_subject` varchar(255) NOT NULL default '',
  `email_html` text NOT NULL,
  `email_text` text NOT NULL,
  `date_sent` datetime NOT NULL default '0001-01-01 00:00:00',
  `module` varchar(64) NOT NULL default '',
  PRIMARY KEY  (`archive_id`),
  KEY `idx_email_to_address_zen` (`email_to_address`),
  KEY `idx_module_zen` (`module`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcemail_archive`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcfeatured`
-- 

CREATE TABLE `zcfeatured` (
  `featured_id` int(11) NOT NULL auto_increment,
  `products_id` int(11) NOT NULL default '0',
  `featured_date_added` datetime default NULL,
  `featured_last_modified` datetime default NULL,
  `expires_date` date NOT NULL default '0001-01-01',
  `date_status_change` datetime default NULL,
  `status` int(1) NOT NULL default '1',
  `featured_date_available` date NOT NULL default '0001-01-01',
  PRIMARY KEY  (`featured_id`),
  KEY `idx_status_zen` (`status`),
  KEY `idx_products_id_zen` (`products_id`),
  KEY `idx_date_avail_zen` (`featured_date_available`)
)   AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `zcfeatured`
-- 

INSERT INTO `zcfeatured` (`featured_id`, `products_id`, `featured_date_added`, `featured_last_modified`, `expires_date`, `date_status_change`, `status`, `featured_date_available`) VALUES (1, 1, '2005-08-13 11:41:49', NULL, 0x303030312d30312d3031, NULL, 1, 0x303030312d30312d3031);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcfiles_uploaded`
-- 

CREATE TABLE `zcfiles_uploaded` (
  `files_uploaded_id` int(11) NOT NULL auto_increment,
  `sesskey` varchar(32) default NULL,
  `customers_id` int(11) default NULL,
  `files_uploaded_name` varchar(64) NOT NULL default '',
  PRIMARY KEY  (`files_uploaded_id`),
  KEY `idx_customers_id_zen` (`customers_id`)
)   COMMENT='Must always have either a sesskey or customers_id' AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcfiles_uploaded`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcgeo_zones`
-- 

CREATE TABLE `zcgeo_zones` (
  `geo_zone_id` int(11) NOT NULL auto_increment,
  `geo_zone_name` varchar(32) NOT NULL default '',
  `geo_zone_description` varchar(255) NOT NULL default '',
  `last_modified` datetime default NULL,
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  PRIMARY KEY  (`geo_zone_id`)
)   AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `zcgeo_zones`
-- 

INSERT INTO `zcgeo_zones` (`geo_zone_id`, `geo_zone_name`, `geo_zone_description`, `last_modified`, `date_added`) VALUES (1, 'Florida', 'Florida local sales tax zone', NULL, '2005-08-09 22:29:40');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcget_terms_to_filter`
-- 

CREATE TABLE `zcget_terms_to_filter` (
  `get_term_name` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`get_term_name`)
)  ;

-- 
-- Volcar la base de datos para la tabla `zcget_terms_to_filter`
-- 

INSERT INTO `zcget_terms_to_filter` (`get_term_name`) VALUES ('manufacturers_id'),
('music_genre_id'),
('record_company_id');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcgroup_pricing`
-- 

CREATE TABLE `zcgroup_pricing` (
  `group_id` int(11) NOT NULL auto_increment,
  `group_name` varchar(32) NOT NULL default '',
  `group_percentage` decimal(5,2) NOT NULL default '0.00',
  `last_modified` datetime default NULL,
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  PRIMARY KEY  (`group_id`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcgroup_pricing`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zclanguages`
-- 

CREATE TABLE `zclanguages` (
  `languages_id` int(11) NOT NULL auto_increment,
  `name` varchar(32) NOT NULL default '',
  `code` varchar(2) NOT NULL default '',
  `image` varchar(64) default NULL,
  `directory` varchar(32) default NULL,
  `sort_order` int(3) default NULL,
  PRIMARY KEY  (`languages_id`),
  KEY `idx_languages_name_zen` (`name`)
)   AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `zclanguages`
-- 

INSERT INTO `zclanguages` (`languages_id`, `name`, `code`, `image`, `directory`, `sort_order`) VALUES (1, 'English', 'en', 'icon.gif', 'english', 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zclayout_boxes`
-- 

CREATE TABLE `zclayout_boxes` (
  `layout_id` int(11) NOT NULL auto_increment,
  `layout_template` varchar(64) NOT NULL default '',
  `layout_box_name` varchar(64) NOT NULL default '',
  `layout_box_status` tinyint(1) NOT NULL default '0',
  `layout_box_location` tinyint(1) NOT NULL default '0',
  `layout_box_sort_order` int(11) NOT NULL default '0',
  `layout_box_sort_order_single` int(11) NOT NULL default '0',
  `layout_box_status_single` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`layout_id`),
  KEY `idx_name_template_zen` (`layout_template`,`layout_box_name`),
  KEY `idx_layout_box_status_zen` (`layout_box_status`)
)   AUTO_INCREMENT=225 ;

-- 
-- Volcar la base de datos para la tabla `zclayout_boxes`
-- 

INSERT INTO `zclayout_boxes` (`layout_id`, `layout_template`, `layout_box_name`, `layout_box_status`, `layout_box_location`, `layout_box_sort_order`, `layout_box_sort_order_single`, `layout_box_status_single`) VALUES (1, 'blue_strip', 'banner_box.php', 1, 0, 300, 1, 127),
(2, 'blue_strip', 'banner_box2.php', 1, 1, 15, 1, 15),
(3, 'blue_strip', 'best_sellers.php', 1, 1, 30, 70, 1),
(4, 'blue_strip', 'categories.php', 1, 0, 10, 10, 1),
(5, 'blue_strip', 'currencies.php', 1, 1, 80, 60, 1),
(6, 'blue_strip', 'document_categories.php', 1, 0, 0, 0, 0),
(7, 'blue_strip', 'featured.php', 1, 0, 45, 0, 0),
(8, 'blue_strip', 'information.php', 1, 0, 50, 40, 1),
(9, 'blue_strip', 'languages.php', 1, 1, 70, 50, 1),
(10, 'blue_strip', 'manufacturers.php', 1, 0, 30, 20, 1),
(11, 'blue_strip', 'manufacturer_info.php', 1, 1, 35, 95, 1),
(12, 'blue_strip', 'more_information.php', 1, 0, 200, 200, 1),
(13, 'blue_strip', 'music_genres.php', 1, 1, 0, 0, 0),
(14, 'blue_strip', 'order_history.php', 0, 0, 0, 0, 0),
(15, 'blue_strip', 'product_notifications.php', 1, 1, 55, 85, 1),
(16, 'blue_strip', 'record_companies.php', 1, 1, 0, 0, 0),
(17, 'blue_strip', 'reviews.php', 1, 0, 40, 0, 0),
(18, 'blue_strip', 'search.php', 1, 1, 10, 0, 0),
(19, 'blue_strip', 'search_header.php', 0, 0, 0, 0, 1),
(20, 'blue_strip', 'shopping_cart.php', 1, 1, 20, 30, 1),
(21, 'blue_strip', 'specials.php', 1, 1, 45, 0, 0),
(22, 'blue_strip', 'tell_a_friend.php', 1, 1, 65, 0, 0),
(23, 'blue_strip', 'whats_new.php', 1, 0, 20, 0, 0),
(24, 'blue_strip', 'whos_online.php', 1, 1, 200, 200, 1),
(25, 'classic', 'banner_box.php', 1, 0, 300, 1, 127),
(26, 'classic', 'banner_box2.php', 1, 1, 15, 1, 15),
(27, 'classic', 'best_sellers.php', 1, 1, 30, 70, 1),
(28, 'classic', 'categories.php', 1, 0, 10, 10, 1),
(29, 'classic', 'currencies.php', 1, 1, 80, 60, 1),
(30, 'classic', 'document_categories.php', 1, 0, 0, 0, 0),
(31, 'classic', 'featured.php', 1, 0, 45, 0, 0),
(32, 'classic', 'information.php', 1, 0, 50, 40, 1),
(33, 'classic', 'languages.php', 1, 1, 70, 50, 1),
(34, 'classic', 'manufacturers.php', 1, 0, 30, 20, 1),
(35, 'classic', 'manufacturer_info.php', 1, 1, 35, 95, 1),
(36, 'classic', 'more_information.php', 1, 0, 200, 200, 1),
(37, 'classic', 'music_genres.php', 1, 1, 0, 0, 0),
(38, 'classic', 'order_history.php', 0, 0, 0, 0, 0),
(39, 'classic', 'product_notifications.php', 1, 1, 55, 85, 1),
(40, 'classic', 'record_companies.php', 1, 1, 0, 0, 0),
(41, 'classic', 'reviews.php', 1, 0, 40, 0, 0),
(42, 'classic', 'search.php', 1, 1, 10, 0, 0),
(43, 'classic', 'search_header.php', 0, 0, 0, 0, 1),
(44, 'classic', 'shopping_cart.php', 1, 1, 20, 30, 1),
(45, 'classic', 'specials.php', 1, 1, 45, 0, 0),
(46, 'classic', 'tell_a_friend.php', 1, 1, 65, 0, 0),
(47, 'classic', 'whats_new.php', 1, 0, 20, 0, 0),
(48, 'classic', 'whos_online.php', 1, 1, 200, 200, 1),
(49, 'default_template_settings', 'banner_box.php', 1, 0, 300, 1, 127),
(50, 'default_template_settings', 'banner_box2.php', 1, 1, 15, 1, 15),
(51, 'default_template_settings', 'best_sellers.php', 1, 1, 30, 70, 1),
(52, 'default_template_settings', 'categories.php', 1, 0, 10, 10, 1),
(53, 'default_template_settings', 'currencies.php', 1, 1, 80, 60, 1),
(54, 'default_template_settings', 'document_categories.php', 1, 0, 0, 0, 0),
(55, 'default_template_settings', 'featured.php', 1, 0, 45, 0, 0),
(56, 'default_template_settings', 'information.php', 1, 0, 50, 40, 1),
(57, 'default_template_settings', 'languages.php', 1, 1, 70, 50, 1),
(58, 'default_template_settings', 'manufacturers.php', 1, 0, 30, 20, 1),
(59, 'default_template_settings', 'manufacturer_info.php', 1, 1, 35, 95, 1),
(60, 'default_template_settings', 'more_information.php', 1, 0, 200, 200, 1),
(61, 'default_template_settings', 'music_genres.php', 1, 1, 0, 0, 0),
(62, 'default_template_settings', 'order_history.php', 0, 0, 0, 0, 0),
(63, 'default_template_settings', 'product_notifications.php', 1, 1, 55, 85, 1),
(64, 'default_template_settings', 'record_companies.php', 1, 1, 0, 0, 0),
(65, 'default_template_settings', 'reviews.php', 1, 0, 40, 0, 0),
(66, 'default_template_settings', 'search.php', 1, 1, 10, 0, 0),
(67, 'default_template_settings', 'search_header.php', 0, 0, 0, 0, 1),
(68, 'default_template_settings', 'shopping_cart.php', 1, 1, 20, 30, 1),
(69, 'default_template_settings', 'specials.php', 1, 1, 45, 0, 0),
(70, 'default_template_settings', 'tell_a_friend.php', 1, 1, 65, 0, 0),
(71, 'default_template_settings', 'whats_new.php', 1, 0, 20, 0, 0),
(72, 'default_template_settings', 'whos_online.php', 1, 1, 200, 200, 1),
(73, 'template_default', 'banner_box.php', 1, 0, 300, 1, 127),
(74, 'template_default', 'banner_box2.php', 1, 1, 15, 1, 15),
(75, 'template_default', 'best_sellers.php', 1, 1, 30, 70, 1),
(76, 'template_default', 'categories.php', 1, 0, 10, 10, 1),
(77, 'template_default', 'currencies.php', 1, 1, 80, 60, 1),
(78, 'template_default', 'featured.php', 1, 0, 45, 0, 0),
(79, 'template_default', 'information.php', 1, 0, 50, 40, 1),
(80, 'template_default', 'languages.php', 1, 1, 70, 50, 1),
(81, 'template_default', 'manufacturers.php', 1, 0, 30, 20, 1),
(82, 'template_default', 'manufacturer_info.php', 1, 1, 35, 95, 1),
(83, 'template_default', 'more_information.php', 1, 0, 200, 200, 1),
(84, 'template_default', 'my_broken_box.php', 1, 0, 0, 0, 0),
(85, 'template_default', 'order_history.php', 0, 0, 0, 0, 0),
(86, 'template_default', 'product_notifications.php', 1, 1, 55, 85, 1),
(87, 'template_default', 'reviews.php', 1, 0, 40, 0, 0),
(88, 'template_default', 'search.php', 1, 1, 10, 0, 0),
(89, 'template_default', 'search_header.php', 0, 0, 0, 0, 1),
(90, 'template_default', 'shopping_cart.php', 1, 1, 20, 30, 1),
(91, 'template_default', 'specials.php', 1, 1, 45, 0, 0),
(92, 'template_default', 'tell_a_friend.php', 1, 1, 65, 0, 0),
(93, 'template_default', 'whats_new.php', 1, 0, 20, 0, 0),
(94, 'template_default', 'whos_online.php', 1, 1, 200, 200, 1),
(95, 'zencss', 'banner_box2.php', 1, 1, 15, 1, 15),
(96, 'zencss', 'best_sellers.php', 1, 1, 30, 70, 1),
(97, 'zencss', 'categories.php', 1, 0, 10, 10, 1),
(98, 'zencss', 'currencies.php', 1, 1, 80, 60, 1),
(99, 'zencss', 'information.php', 1, 0, 50, 40, 1),
(100, 'zencss', 'languages.php', 1, 1, 70, 50, 1),
(101, 'zencss', 'manufacturers.php', 1, 0, 30, 20, 1),
(102, 'zencss', 'manufacturer_info.php', 1, 1, 35, 95, 1),
(103, 'zencss', 'more_information.php', 1, 0, 200, 200, 1),
(104, 'zencss', 'my_broken_box.php', 1, 0, 0, 1, 0),
(105, 'zencss', 'order_history.php', 0, 0, 0, 0, 0),
(106, 'zencss', 'product_notifications.php', 1, 1, 55, 85, 1),
(107, 'zencss', 'reviews.php', 1, 0, 40, 0, 0),
(108, 'zencss', 'search.php', 1, 1, 10, 0, 0),
(109, 'zencss', 'search_header.php', 0, 0, 0, 0, 1),
(110, 'zencss', 'shopping_cart.php', 1, 1, 20, 30, 1),
(111, 'zencss', 'specials.php', 1, 1, 45, 0, 0),
(112, 'zencss', 'tell_a_friend.php', 1, 1, 65, 0, 0),
(113, 'zencss', 'whats_new.php', 1, 0, 20, 0, 0),
(114, 'zencss', 'whos_online.php', 1, 1, 200, 200, 1),
(115, 'classic', 'banner_box_all.php', 1, 1, 5, 0, 0),
(116, 'blue_strip', 'banner_box_all.php', 1, 1, 5, 0, 0),
(117, 'default_template_settings', 'banner_box_all.php', 1, 1, 5, 0, 0),
(118, 'template_default', 'banner_box_all.php', 1, 1, 5, 0, 0),
(119, 'hipctech_lite', 'banner_box.php', 1, 0, 300, 1, 127),
(120, 'hipctech_lite', 'banner_box2.php', 1, 1, 15, 1, 15),
(121, 'hipctech_lite', 'banner_box_all.php', 1, 1, 5, 0, 0),
(122, 'hipctech_lite', 'best_sellers.php', 1, 1, 30, 70, 1),
(123, 'hipctech_lite', 'categories.php', 1, 0, 10, 10, 1),
(124, 'hipctech_lite', 'currencies.php', 1, 1, 80, 60, 1),
(125, 'hipctech_lite', 'document_categories.php', 1, 0, 0, 0, 0),
(126, 'hipctech_lite', 'featured.php', 1, 0, 45, 0, 0),
(127, 'hipctech_lite', 'information.php', 1, 0, 50, 40, 1),
(128, 'hipctech_lite', 'languages.php', 1, 1, 70, 50, 1),
(129, 'hipctech_lite', 'manufacturer_info.php', 1, 1, 35, 95, 1),
(130, 'hipctech_lite', 'manufacturers.php', 1, 0, 30, 20, 1),
(131, 'hipctech_lite', 'more_information.php', 1, 0, 200, 200, 1),
(132, 'hipctech_lite', 'music_genres.php', 1, 1, 0, 0, 0),
(133, 'hipctech_lite', 'order_history.php', 0, 0, 0, 0, 0),
(134, 'hipctech_lite', 'product_notifications.php', 1, 1, 55, 85, 1),
(135, 'hipctech_lite', 'record_companies.php', 1, 1, 0, 0, 0),
(136, 'hipctech_lite', 'reviews.php', 1, 0, 40, 0, 0),
(137, 'hipctech_lite', 'search.php', 1, 1, 10, 0, 0),
(138, 'hipctech_lite', 'search_header.php', 0, 0, 0, 0, 1),
(139, 'hipctech_lite', 'shopping_cart.php', 1, 1, 20, 30, 1),
(140, 'hipctech_lite', 'specials.php', 1, 1, 45, 0, 0),
(141, 'hipctech_lite', 'tell_a_friend.php', 1, 1, 65, 0, 0),
(142, 'hipctech_lite', 'whats_new.php', 1, 0, 20, 0, 0),
(143, 'hipctech_lite', 'whos_online.php', 1, 1, 200, 200, 1),
(144, 'a_paler_shade_of_grey', 'banner_box.php', 1, 0, 300, 1, 127),
(145, 'a_paler_shade_of_grey', 'banner_box2.php', 1, 1, 15, 1, 15),
(146, 'a_paler_shade_of_grey', 'banner_box_all.php', 1, 1, 5, 0, 0),
(147, 'a_paler_shade_of_grey', 'best_sellers.php', 1, 1, 30, 70, 1),
(148, 'a_paler_shade_of_grey', 'categories.php', 1, 0, 10, 10, 1),
(149, 'a_paler_shade_of_grey', 'currencies.php', 1, 1, 80, 60, 1),
(150, 'a_paler_shade_of_grey', 'document_categories.php', 1, 0, 0, 0, 0),
(151, 'a_paler_shade_of_grey', 'featured.php', 1, 0, 45, 0, 0),
(152, 'a_paler_shade_of_grey', 'information.php', 1, 0, 50, 40, 1),
(153, 'a_paler_shade_of_grey', 'languages.php', 1, 1, 70, 50, 1),
(154, 'a_paler_shade_of_grey', 'manufacturer_info.php', 1, 1, 35, 95, 1),
(155, 'a_paler_shade_of_grey', 'manufacturers.php', 1, 0, 30, 20, 1),
(156, 'a_paler_shade_of_grey', 'more_information.php', 1, 0, 200, 200, 1),
(157, 'a_paler_shade_of_grey', 'music_genres.php', 1, 1, 0, 0, 0),
(158, 'a_paler_shade_of_grey', 'order_history.php', 0, 0, 0, 0, 0),
(159, 'a_paler_shade_of_grey', 'product_notifications.php', 1, 1, 55, 85, 1),
(160, 'a_paler_shade_of_grey', 'record_companies.php', 1, 1, 0, 0, 0),
(161, 'a_paler_shade_of_grey', 'reviews.php', 1, 0, 40, 0, 0),
(162, 'a_paler_shade_of_grey', 'search.php', 1, 1, 10, 0, 0),
(163, 'a_paler_shade_of_grey', 'search_header.php', 0, 0, 0, 0, 1),
(164, 'a_paler_shade_of_grey', 'shopping_cart.php', 1, 1, 20, 30, 1),
(165, 'a_paler_shade_of_grey', 'specials.php', 1, 1, 45, 0, 0),
(166, 'a_paler_shade_of_grey', 'tell_a_friend.php', 1, 1, 65, 0, 0),
(167, 'a_paler_shade_of_grey', 'whats_new.php', 1, 0, 20, 0, 0),
(168, 'a_paler_shade_of_grey', 'whos_online.php', 1, 1, 200, 200, 1),
(169, 'zencss', 'banner_box.php', 1, 0, 300, 1, 127),
(170, 'zencss', 'banner_box_all.php', 1, 1, 5, 0, 0),
(171, 'zencss', 'document_categories.php', 1, 0, 0, 0, 0),
(172, 'zencss', 'featured.php', 1, 0, 45, 0, 0),
(173, 'zencss', 'music_genres.php', 1, 1, 0, 0, 0),
(174, 'zencss', 'record_companies.php', 1, 1, 0, 0, 0),
(175, 'purpleshades', 'banner_box.php', 0, 0, 300, 1, 1),
(176, 'purpleshades', 'banner_box2.php', 1, 1, 15, 1, 15),
(177, 'purpleshades', 'banner_box_all.php', 1, 1, 5, 0, 0),
(178, 'purpleshades', 'best_sellers.php', 1, 1, 30, 70, 1),
(179, 'purpleshades', 'categories.php', 1, 0, 10, 10, 1),
(180, 'purpleshades', 'currencies.php', 1, 1, 80, 60, 1),
(181, 'purpleshades', 'document_categories.php', 1, 0, 0, 0, 0),
(182, 'purpleshades', 'featured.php', 1, 0, 45, 0, 0),
(183, 'purpleshades', 'information.php', 1, 0, 50, 40, 1),
(184, 'purpleshades', 'languages.php', 1, 1, 70, 50, 1),
(185, 'purpleshades', 'manufacturer_info.php', 1, 1, 35, 95, 1),
(186, 'purpleshades', 'manufacturers.php', 1, 0, 30, 20, 1),
(187, 'purpleshades', 'more_information.php', 1, 0, 200, 200, 1),
(188, 'purpleshades', 'music_genres.php', 1, 1, 0, 0, 0),
(189, 'purpleshades', 'order_history.php', 0, 0, 0, 0, 0),
(190, 'purpleshades', 'product_notifications.php', 1, 1, 55, 85, 1),
(191, 'purpleshades', 'record_companies.php', 1, 1, 0, 0, 0),
(192, 'purpleshades', 'reviews.php', 1, 0, 40, 0, 0),
(193, 'purpleshades', 'search.php', 1, 1, 10, 0, 0),
(194, 'purpleshades', 'search_header.php', 0, 0, 0, 0, 1),
(195, 'purpleshades', 'shopping_cart.php', 1, 1, 20, 30, 1),
(196, 'purpleshades', 'specials.php', 1, 1, 45, 0, 0),
(197, 'purpleshades', 'tell_a_friend.php', 1, 1, 65, 0, 0),
(198, 'purpleshades', 'whats_new.php', 1, 0, 20, 0, 0),
(199, 'purpleshades', 'whos_online.php', 1, 1, 200, 200, 1),
(200, 'xoopstheme', 'banner_box.php', 1, 0, 300, 1, 127),
(201, 'xoopstheme', 'banner_box2.php', 1, 1, 15, 1, 15),
(202, 'xoopstheme', 'banner_box_all.php', 1, 1, 5, 0, 0),
(203, 'xoopstheme', 'best_sellers.php', 1, 1, 30, 70, 1),
(204, 'xoopstheme', 'categories.php', 1, 0, 10, 10, 1),
(205, 'xoopstheme', 'currencies.php', 1, 1, 80, 60, 1),
(206, 'xoopstheme', 'document_categories.php', 1, 0, 0, 0, 0),
(207, 'xoopstheme', 'featured.php', 1, 0, 45, 0, 0),
(208, 'xoopstheme', 'information.php', 1, 0, 50, 40, 1),
(209, 'xoopstheme', 'languages.php', 1, 1, 70, 50, 1),
(210, 'xoopstheme', 'manufacturer_info.php', 1, 1, 35, 95, 1),
(211, 'xoopstheme', 'manufacturers.php', 1, 0, 30, 20, 1),
(212, 'xoopstheme', 'more_information.php', 1, 0, 200, 200, 1),
(213, 'xoopstheme', 'music_genres.php', 1, 1, 0, 0, 0),
(214, 'xoopstheme', 'order_history.php', 0, 0, 0, 0, 0),
(215, 'xoopstheme', 'product_notifications.php', 1, 1, 55, 85, 1),
(216, 'xoopstheme', 'record_companies.php', 1, 1, 0, 0, 0),
(217, 'xoopstheme', 'reviews.php', 1, 0, 40, 0, 0),
(218, 'xoopstheme', 'search.php', 1, 1, 10, 0, 0),
(219, 'xoopstheme', 'search_header.php', 0, 0, 0, 0, 1),
(220, 'xoopstheme', 'shopping_cart.php', 1, 1, 20, 30, 1),
(221, 'xoopstheme', 'specials.php', 1, 1, 45, 0, 0),
(222, 'xoopstheme', 'tell_a_friend.php', 1, 1, 65, 0, 0),
(223, 'xoopstheme', 'whats_new.php', 1, 0, 20, 0, 0),
(224, 'xoopstheme', 'whos_online.php', 1, 1, 200, 200, 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcmanufacturers`
-- 

CREATE TABLE `zcmanufacturers` (
  `manufacturers_id` int(11) NOT NULL auto_increment,
  `manufacturers_name` varchar(32) NOT NULL default '',
  `manufacturers_image` varchar(64) default NULL,
  `date_added` datetime default NULL,
  `last_modified` datetime default NULL,
  PRIMARY KEY  (`manufacturers_id`),
  KEY `idx_mfg_name_zen` (`manufacturers_name`)
)   AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `zcmanufacturers`
-- 

INSERT INTO `zcmanufacturers` (`manufacturers_id`, `manufacturers_name`, `manufacturers_image`, `date_added`, `last_modified`) VALUES (1, 'nike', 'manufacturers/cowbutton.gif', '2005-08-13 13:09:41', NULL);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcmanufacturers_info`
-- 

CREATE TABLE `zcmanufacturers_info` (
  `manufacturers_id` int(11) NOT NULL default '0',
  `languages_id` int(11) NOT NULL default '0',
  `manufacturers_url` varchar(255) NOT NULL default '',
  `url_clicked` int(5) NOT NULL default '0',
  `date_last_click` datetime default NULL,
  PRIMARY KEY  (`manufacturers_id`,`languages_id`)
)  ;

-- 
-- Volcar la base de datos para la tabla `zcmanufacturers_info`
-- 

INSERT INTO `zcmanufacturers_info` (`manufacturers_id`, `languages_id`, `manufacturers_url`, `url_clicked`, `date_last_click`) VALUES (1, 1, '', 0, NULL);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcmedia_clips`
-- 

CREATE TABLE `zcmedia_clips` (
  `clip_id` int(11) NOT NULL auto_increment,
  `media_id` int(11) NOT NULL default '0',
  `clip_type` smallint(6) NOT NULL default '0',
  `clip_filename` text NOT NULL,
  `date_added` datetime NOT NULL default '0000-00-00 00:00:00',
  `last_modified` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`clip_id`),
  KEY `idx_media_id_zen` (`media_id`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcmedia_clips`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcmedia_manager`
-- 

CREATE TABLE `zcmedia_manager` (
  `media_id` int(11) NOT NULL auto_increment,
  `media_name` varchar(255) NOT NULL default '',
  `last_modified` datetime NOT NULL default '0000-00-00 00:00:00',
  `date_added` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`media_id`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcmedia_manager`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcmedia_to_products`
-- 

CREATE TABLE `zcmedia_to_products` (
  `media_id` int(11) NOT NULL default '0',
  `product_id` int(11) NOT NULL default '0',
  KEY `idx_media_product_zen` (`media_id`,`product_id`)
)  ;

-- 
-- Volcar la base de datos para la tabla `zcmedia_to_products`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcmedia_types`
-- 

CREATE TABLE `zcmedia_types` (
  `type_id` int(11) NOT NULL auto_increment,
  `type_name` varchar(64) NOT NULL default '',
  `type_ext` varchar(8) NOT NULL default '',
  PRIMARY KEY  (`type_id`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcmedia_types`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcmeta_tags_products_description`
-- 

CREATE TABLE `zcmeta_tags_products_description` (
  `products_id` int(11) NOT NULL auto_increment,
  `language_id` int(11) NOT NULL default '1',
  `metatags_title` varchar(255) NOT NULL default '',
  `metatags_keywords` text,
  `metatags_description` text,
  PRIMARY KEY  (`products_id`,`language_id`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcmeta_tags_products_description`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcmusic_genre`
-- 

CREATE TABLE `zcmusic_genre` (
  `music_genre_id` int(11) NOT NULL auto_increment,
  `music_genre_name` varchar(32) NOT NULL default '',
  `date_added` datetime default NULL,
  `last_modified` datetime default NULL,
  PRIMARY KEY  (`music_genre_id`),
  KEY `idx_music_genre_name_zen` (`music_genre_name`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcmusic_genre`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcnewsletters`
-- 

CREATE TABLE `zcnewsletters` (
  `newsletters_id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `content` text NOT NULL,
  `content_html` text NOT NULL,
  `module` varchar(255) NOT NULL default '',
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  `date_sent` datetime default NULL,
  `status` int(1) default NULL,
  `locked` int(1) default '0',
  PRIMARY KEY  (`newsletters_id`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcnewsletters`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcorders`
-- 

CREATE TABLE `zcorders` (
  `orders_id` int(11) NOT NULL auto_increment,
  `customers_id` int(11) NOT NULL default '0',
  `customers_name` varchar(64) NOT NULL default '',
  `customers_company` varchar(32) default NULL,
  `customers_street_address` varchar(64) NOT NULL default '',
  `customers_suburb` varchar(32) default NULL,
  `customers_city` varchar(32) NOT NULL default '',
  `customers_postcode` varchar(10) NOT NULL default '',
  `customers_state` varchar(32) default NULL,
  `customers_country` varchar(32) NOT NULL default '',
  `customers_telephone` varchar(32) NOT NULL default '',
  `customers_email_address` varchar(96) NOT NULL default '',
  `customers_address_format_id` int(5) NOT NULL default '0',
  `delivery_name` varchar(64) NOT NULL default '',
  `delivery_company` varchar(32) default NULL,
  `delivery_street_address` varchar(64) NOT NULL default '',
  `delivery_suburb` varchar(32) default NULL,
  `delivery_city` varchar(32) NOT NULL default '',
  `delivery_postcode` varchar(10) NOT NULL default '',
  `delivery_state` varchar(32) default NULL,
  `delivery_country` varchar(32) NOT NULL default '',
  `delivery_address_format_id` int(5) NOT NULL default '0',
  `billing_name` varchar(64) NOT NULL default '',
  `billing_company` varchar(32) default NULL,
  `billing_street_address` varchar(64) NOT NULL default '',
  `billing_suburb` varchar(32) default NULL,
  `billing_city` varchar(32) NOT NULL default '',
  `billing_postcode` varchar(10) NOT NULL default '',
  `billing_state` varchar(32) default NULL,
  `billing_country` varchar(32) NOT NULL default '',
  `billing_address_format_id` int(5) NOT NULL default '0',
  `payment_method` varchar(128) NOT NULL default '',
  `payment_module_code` varchar(32) NOT NULL default '',
  `shipping_method` varchar(128) NOT NULL default '',
  `shipping_module_code` varchar(32) NOT NULL default '',
  `coupon_code` varchar(32) NOT NULL default '',
  `cc_type` varchar(20) default NULL,
  `cc_owner` varchar(64) default NULL,
  `cc_number` varchar(32) default NULL,
  `cc_expires` varchar(4) default NULL,
  `cc_cvv` blob,
  `last_modified` datetime default NULL,
  `date_purchased` datetime default NULL,
  `orders_status` int(5) NOT NULL default '0',
  `orders_date_finished` datetime default NULL,
  `currency` varchar(3) default NULL,
  `currency_value` decimal(14,6) default NULL,
  `order_total` decimal(14,2) default NULL,
  `order_tax` decimal(14,2) default NULL,
  `paypal_ipn_id` int(11) NOT NULL default '0',
  `ip_address` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`orders_id`),
  KEY `idx_status_orders_cust_zen` (`orders_status`,`orders_id`,`customers_id`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcorders`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcorders_products`
-- 

CREATE TABLE `zcorders_products` (
  `orders_products_id` int(11) NOT NULL auto_increment,
  `orders_id` int(11) NOT NULL default '0',
  `products_id` int(11) NOT NULL default '0',
  `products_model` varchar(32) default NULL,
  `products_name` varchar(64) NOT NULL default '',
  `products_price` decimal(15,4) NOT NULL default '0.0000',
  `final_price` decimal(15,4) NOT NULL default '0.0000',
  `products_tax` decimal(7,4) NOT NULL default '0.0000',
  `products_quantity` float NOT NULL default '0',
  `onetime_charges` decimal(15,4) NOT NULL default '0.0000',
  `products_priced_by_attribute` tinyint(1) NOT NULL default '0',
  `product_is_free` tinyint(1) NOT NULL default '0',
  `products_discount_type` tinyint(1) NOT NULL default '0',
  `products_discount_type_from` tinyint(1) NOT NULL default '0',
  `products_prid` tinytext NOT NULL,
  PRIMARY KEY  (`orders_products_id`),
  KEY `idx_orders_id_zen` (`orders_id`),
  KEY `orders_id_prod_id_zen` (`orders_id`,`products_id`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcorders_products`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcorders_products_attributes`
-- 

CREATE TABLE `zcorders_products_attributes` (
  `orders_products_attributes_id` int(11) NOT NULL auto_increment,
  `orders_id` int(11) NOT NULL default '0',
  `orders_products_id` int(11) NOT NULL default '0',
  `products_options` varchar(32) NOT NULL default '',
  `products_options_values` varchar(64) NOT NULL default '',
  `options_values_price` decimal(15,4) NOT NULL default '0.0000',
  `price_prefix` char(1) NOT NULL default '',
  `product_attribute_is_free` tinyint(1) NOT NULL default '0',
  `products_attributes_weight` float NOT NULL default '0',
  `products_attributes_weight_prefix` char(1) NOT NULL default '',
  `attributes_discounted` tinyint(1) NOT NULL default '1',
  `attributes_price_base_included` tinyint(1) NOT NULL default '1',
  `attributes_price_onetime` decimal(15,4) NOT NULL default '0.0000',
  `attributes_price_factor` decimal(15,4) NOT NULL default '0.0000',
  `attributes_price_factor_offset` decimal(15,4) NOT NULL default '0.0000',
  `attributes_price_factor_onetime` decimal(15,4) NOT NULL default '0.0000',
  `attributes_price_factor_onetime_offset` decimal(15,4) NOT NULL default '0.0000',
  `attributes_qty_prices` text,
  `attributes_qty_prices_onetime` text,
  `attributes_price_words` decimal(15,4) NOT NULL default '0.0000',
  `attributes_price_words_free` int(4) NOT NULL default '0',
  `attributes_price_letters` decimal(15,4) NOT NULL default '0.0000',
  `attributes_price_letters_free` int(4) NOT NULL default '0',
  `products_options_id` int(11) NOT NULL default '0',
  `products_options_values_id` int(11) NOT NULL default '0',
  `products_prid` tinytext NOT NULL,
  PRIMARY KEY  (`orders_products_attributes_id`),
  KEY `idx_orders_id_prod_id_zen` (`orders_id`,`orders_products_id`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcorders_products_attributes`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcorders_products_download`
-- 

CREATE TABLE `zcorders_products_download` (
  `orders_products_download_id` int(11) NOT NULL auto_increment,
  `orders_id` int(11) NOT NULL default '0',
  `orders_products_id` int(11) NOT NULL default '0',
  `orders_products_filename` varchar(255) NOT NULL default '',
  `download_maxdays` int(2) NOT NULL default '0',
  `download_count` int(2) NOT NULL default '0',
  `products_prid` tinytext NOT NULL,
  PRIMARY KEY  (`orders_products_download_id`),
  KEY `idx_orders_id_zen` (`orders_id`),
  KEY `idx_orders_products_id_zen` (`orders_products_id`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcorders_products_download`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcorders_status`
-- 

CREATE TABLE `zcorders_status` (
  `orders_status_id` int(11) NOT NULL default '0',
  `language_id` int(11) NOT NULL default '1',
  `orders_status_name` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`orders_status_id`,`language_id`),
  KEY `idx_orders_status_name_zen` (`orders_status_name`)
)  ;

-- 
-- Volcar la base de datos para la tabla `zcorders_status`
-- 

INSERT INTO `zcorders_status` (`orders_status_id`, `language_id`, `orders_status_name`) VALUES (3, 1, 'Delivered'),
(1, 1, 'Pending'),
(2, 1, 'Processing'),
(4, 1, 'Update');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcorders_status_history`
-- 

CREATE TABLE `zcorders_status_history` (
  `orders_status_history_id` int(11) NOT NULL auto_increment,
  `orders_id` int(11) NOT NULL default '0',
  `orders_status_id` int(5) NOT NULL default '0',
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  `customer_notified` int(1) default '0',
  `comments` text,
  PRIMARY KEY  (`orders_status_history_id`),
  KEY `idx_orders_id_status_id_zen` (`orders_id`,`orders_status_id`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcorders_status_history`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcorders_total`
-- 

CREATE TABLE `zcorders_total` (
  `orders_total_id` int(10) unsigned NOT NULL auto_increment,
  `orders_id` int(11) NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `text` varchar(255) NOT NULL default '',
  `value` decimal(15,4) NOT NULL default '0.0000',
  `class` varchar(32) NOT NULL default '',
  `sort_order` int(11) NOT NULL default '0',
  PRIMARY KEY  (`orders_total_id`),
  KEY `idx_ot_orders_id_zen` (`orders_id`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcorders_total`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcpaypal`
-- 

CREATE TABLE `zcpaypal` (
  `paypal_ipn_id` int(11) unsigned NOT NULL auto_increment,
  `zen_order_id` int(11) unsigned NOT NULL default '0',
  `txn_type` varchar(10) NOT NULL default '',
  `reason_code` varchar(15) default NULL,
  `payment_type` varchar(7) NOT NULL default '',
  `payment_status` varchar(17) NOT NULL default '',
  `pending_reason` varchar(14) default NULL,
  `invoice` varchar(64) default NULL,
  `mc_currency` varchar(3) NOT NULL default '',
  `first_name` varchar(32) NOT NULL default '',
  `last_name` varchar(32) NOT NULL default '',
  `payer_business_name` varchar(64) default NULL,
  `address_name` varchar(32) default NULL,
  `address_street` varchar(64) default NULL,
  `address_city` varchar(32) default NULL,
  `address_state` varchar(32) default NULL,
  `address_zip` varchar(10) default NULL,
  `address_country` varchar(64) default NULL,
  `address_status` varchar(11) default NULL,
  `payer_email` varchar(96) NOT NULL default '',
  `payer_id` varchar(32) NOT NULL default '',
  `payer_status` varchar(10) NOT NULL default '',
  `payment_date` datetime NOT NULL default '0001-01-01 00:00:00',
  `business` varchar(96) NOT NULL default '',
  `receiver_email` varchar(96) NOT NULL default '',
  `receiver_id` varchar(32) NOT NULL default '',
  `txn_id` varchar(17) NOT NULL default '',
  `parent_txn_id` varchar(17) default NULL,
  `num_cart_items` tinyint(4) unsigned NOT NULL default '1',
  `mc_gross` decimal(7,2) NOT NULL default '0.00',
  `mc_fee` decimal(7,2) NOT NULL default '0.00',
  `payment_gross` decimal(7,2) default NULL,
  `payment_fee` decimal(7,2) default NULL,
  `settle_amount` decimal(7,2) default NULL,
  `settle_currency` varchar(3) default NULL,
  `exchange_rate` decimal(4,2) default NULL,
  `notify_version` decimal(2,1) NOT NULL default '0.0',
  `verify_sign` varchar(128) NOT NULL default '',
  `last_modified` datetime NOT NULL default '0001-01-01 00:00:00',
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  `memo` text,
  PRIMARY KEY  (`paypal_ipn_id`,`txn_id`),
  KEY `idx_paypal_paypal_ipn_id_zen` (`paypal_ipn_id`),
  KEY `idx_zen_order_id_zen` (`zen_order_id`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcpaypal`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcpaypal_payment_status`
-- 

CREATE TABLE `zcpaypal_payment_status` (
  `payment_status_id` int(11) NOT NULL auto_increment,
  `payment_status_name` varchar(64) NOT NULL default '',
  PRIMARY KEY  (`payment_status_id`)
)   AUTO_INCREMENT=8 ;

-- 
-- Volcar la base de datos para la tabla `zcpaypal_payment_status`
-- 

INSERT INTO `zcpaypal_payment_status` (`payment_status_id`, `payment_status_name`) VALUES (1, 'Completed'),
(2, 'Pending'),
(3, 'Failed'),
(4, 'Denied'),
(5, 'Refunded'),
(6, 'Canceled_Reversal'),
(7, 'Reversed');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcpaypal_payment_status_history`
-- 

CREATE TABLE `zcpaypal_payment_status_history` (
  `payment_status_history_id` int(11) NOT NULL auto_increment,
  `paypal_ipn_id` int(11) NOT NULL default '0',
  `txn_id` varchar(64) NOT NULL default '',
  `parent_txn_id` varchar(64) NOT NULL default '',
  `payment_status` varchar(17) NOT NULL default '',
  `pending_reason` varchar(14) default NULL,
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  PRIMARY KEY  (`payment_status_history_id`),
  KEY `idx_paypal_ipn_id_zen` (`paypal_ipn_id`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcpaypal_payment_status_history`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcpaypal_session`
-- 

CREATE TABLE `zcpaypal_session` (
  `unique_id` int(11) NOT NULL auto_increment,
  `session_id` text NOT NULL,
  `saved_session` blob NOT NULL,
  `expiry` int(17) NOT NULL default '0',
  PRIMARY KEY  (`unique_id`),
  KEY `idx_session_id_zen` (`session_id`(36))
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcpaypal_session`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcproduct_music_extra`
-- 

CREATE TABLE `zcproduct_music_extra` (
  `products_id` int(11) NOT NULL default '0',
  `artists_id` int(11) NOT NULL default '0',
  `record_company_id` int(11) NOT NULL default '0',
  `music_genre_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`products_id`),
  KEY `idx_music_genre_id_zen` (`music_genre_id`)
)  ;

-- 
-- Volcar la base de datos para la tabla `zcproduct_music_extra`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcproduct_type_layout`
-- 

CREATE TABLE `zcproduct_type_layout` (
  `configuration_id` int(11) NOT NULL auto_increment,
  `configuration_title` text NOT NULL,
  `configuration_key` varchar(255) NOT NULL default '',
  `configuration_value` text NOT NULL,
  `configuration_description` text NOT NULL,
  `product_type_id` int(11) NOT NULL default '0',
  `sort_order` int(5) default NULL,
  `last_modified` datetime default NULL,
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  `use_function` text,
  `set_function` text,
  PRIMARY KEY  (`configuration_id`),
  UNIQUE KEY `unq_config_key_zen` (`configuration_key`),
  KEY `idx_key_value_zen` (`configuration_key`,`configuration_value`(10))
)   AUTO_INCREMENT=99 ;

-- 
-- Volcar la base de datos para la tabla `zcproduct_type_layout`
-- 

INSERT INTO `zcproduct_type_layout` (`configuration_id`, `configuration_title`, `configuration_key`, `configuration_value`, `configuration_description`, `product_type_id`, `sort_order`, `last_modified`, `date_added`, `use_function`, `set_function`) VALUES (1, 'Show Model Number', 'SHOW_PRODUCT_INFO_MODEL', '1', 'Display Model Number on Product Info 0= off 1= on', 1, 1, NULL, '2005-08-09 22:29:42', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(2, 'Show Weight', 'SHOW_PRODUCT_INFO_WEIGHT', '1', 'Display Weight on Product Info 0= off 1= on', 1, 2, NULL, '2005-08-09 22:29:42', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(3, 'Show Attribute Weight', 'SHOW_PRODUCT_INFO_WEIGHT_ATTRIBUTES', '1', 'Display Attribute Weight on Product Info 0= off 1= on', 1, 3, NULL, '2005-08-09 22:29:42', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(4, 'Show Manufacturer', 'SHOW_PRODUCT_INFO_MANUFACTURER', '1', 'Display Manufacturer Name on Product Info 0= off 1= on', 1, 4, NULL, '2005-08-09 22:29:42', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(5, 'Show Quantity in Shopping Cart', 'SHOW_PRODUCT_INFO_IN_CART_QTY', '1', 'Display Quantity in Current Shopping Cart on Product Info 0= off 1= on', 1, 5, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(6, 'Show Quantity in Stock', 'SHOW_PRODUCT_INFO_QUANTITY', '1', 'Display Quantity in Stock on Product Info 0= off 1= on', 1, 6, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(7, 'Show Product Reviews Count', 'SHOW_PRODUCT_INFO_REVIEWS_COUNT', '1', 'Display Product Reviews Count on Product Info 0= off 1= on', 1, 7, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(8, 'Show Product Reviews Button', 'SHOW_PRODUCT_INFO_REVIEWS', '1', 'Display Product Reviews Button on Product Info 0= off 1= on', 1, 8, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(9, 'Show Date Available', 'SHOW_PRODUCT_INFO_DATE_AVAILABLE', '1', 'Display Date Available on Product Info 0= off 1= on', 1, 9, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(10, 'Show Date Added', 'SHOW_PRODUCT_INFO_DATE_ADDED', '1', 'Display Date Added on Product Info 0= off 1= on', 1, 10, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(11, 'Show Product URL', 'SHOW_PRODUCT_INFO_URL', '1', 'Display URL on Product Info 0= off 1= on', 1, 11, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(12, 'Show Starting At text on Price', 'SHOW_PRODUCT_INFO_STARTING_AT', '1', 'Display Starting At text on products with attributes Product Info 0= off 1= on', 1, 12, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(13, 'Show Product Tell a Friend button', 'SHOW_PRODUCT_INFO_TELL_A_FRIEND', '1', 'Display the Tell a Friend button on Product Info<br /><br />Note: Turning this setting off does not affect the Tell a Friend box in the columns and turning off the Tell a Friend box does not affect the button<br />0= off 1= on', 1, 15, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(14, 'Product Free Shipping Image Status - Catalog', 'SHOW_PRODUCT_INFO_ALWAYS_FREE_SHIPPING_IMAGE_SWITCH', '0', 'Show the Free Shipping image/text in the catalog?', 1, 16, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), '),
(15, 'Product Price Tax Class Default - When adding new products?', 'DEFAULT_PRODUCT_TAX_CLASS_ID', '0', 'What should the Product Price Tax Class Default ID be when adding new products?', 1, 100, NULL, '2005-08-09 22:29:43', '', ''),
(16, 'Product Virtual Default Status - Skip Shipping Address - When adding new products?', 'DEFAULT_PRODUCT_PRODUCTS_VIRTUAL', '0', 'Default Virtual Product status to be ON when adding new products?', 1, 101, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(17, 'Product Free Shipping Default Status - Normal Shipping Rules - When adding new products?', 'DEFAULT_PRODUCT_PRODUCTS_IS_ALWAYS_FREE_SHIPPING', '0', 'What should the Default Free Shipping status be when adding new products?', 1, 102, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(18, 'Show Model Number', 'SHOW_PRODUCT_MUSIC_INFO_MODEL', '1', 'Display Model Number on Product Info 0= off 1= on', 2, 1, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(19, 'Show Weight', 'SHOW_PRODUCT_MUSIC_INFO_WEIGHT', '0', 'Display Weight on Product Info 0= off 1= on', 2, 2, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(20, 'Show Attribute Weight', 'SHOW_PRODUCT_MUSIC_INFO_WEIGHT_ATTRIBUTES', '1', 'Display Attribute Weight on Product Info 0= off 1= on', 2, 3, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(21, 'Show Artist', 'SHOW_PRODUCT_MUSIC_INFO_ARTIST', '1', 'Display Artists Name on Product Info 0= off 1= on', 2, 4, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(22, 'Show Music Genre', 'SHOW_PRODUCT_MUSIC_INFO_GENRE', '1', 'Display Music Genre on Product Info 0= off 1= on', 2, 4, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(23, 'Show Record Company', 'SHOW_PRODUCT_MUSIC_INFO_RECORD_COMPANY', '1', 'Display Recoprd Company on Product Info 0= off 1= on', 2, 4, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(24, 'Show Quantity in Shopping Cart', 'SHOW_PRODUCT_MUSIC_INFO_IN_CART_QTY', '1', 'Display Quantity in Current Shopping Cart on Product Info 0= off 1= on', 2, 5, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(25, 'Show Quantity in Stock', 'SHOW_PRODUCT_MUSIC_INFO_QUANTITY', '0', 'Display Quantity in Stock on Product Info 0= off 1= on', 2, 6, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(26, 'Show Product Reviews Count', 'SHOW_PRODUCT_MUSIC_INFO_REVIEWS_COUNT', '1', 'Display Product Reviews Count on Product Info 0= off 1= on', 2, 7, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(27, 'Show Product Reviews Button', 'SHOW_PRODUCT_MUSIC_INFO_REVIEWS', '1', 'Display Product Reviews Button on Product Info 0= off 1= on', 2, 8, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(28, 'Show Date Available', 'SHOW_PRODUCT_MUSIC_INFO_DATE_AVAILABLE', '1', 'Display Date Available on Product Info 0= off 1= on', 2, 9, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(29, 'Show Date Added', 'SHOW_PRODUCT_MUSIC_INFO_DATE_ADDED', '1', 'Display Date Added on Product Info 0= off 1= on', 2, 10, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(30, 'Show Starting At text on Price', 'SHOW_PRODUCT_MUSIC_INFO_STARTING_AT', '1', 'Display Starting At text on products with attributes Product Info 0= off 1= on', 2, 12, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(31, 'Show Product Tell a Friend button', 'SHOW_PRODUCT_MUSIC_INFO_TELL_A_FRIEND', '1', 'Display the Tell a Friend button on Product Info<br /><br />Note: Turning this setting off does not affect the Tell a Friend box in the columns and turning off the Tell a Friend box does not affect the button<br />0= off 1= on', 2, 15, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(32, 'Product Free Shipping Image Status - Catalog', 'SHOW_PRODUCT_MUSIC_INFO_ALWAYS_FREE_SHIPPING_IMAGE_SWITCH', '0', 'Show the Free Shipping image/text in the catalog?', 2, 16, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), '),
(33, 'Product Price Tax Class Default - When adding new products?', 'DEFAULT_PRODUCT_MUSIC_TAX_CLASS_ID', '0', 'What should the Product Price Tax Class Default ID be when adding new products?', 2, 100, NULL, '2005-08-09 22:29:43', '', ''),
(34, 'Product Virtual Default Status - Skip Shipping Address - When adding new products?', 'DEFAULT_PRODUCT_MUSIC_PRODUCTS_VIRTUAL', '0', 'Default Virtual Product status to be ON when adding new products?', 2, 101, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(35, 'Product Free Shipping Default Status - Normal Shipping Rules - When adding new products?', 'DEFAULT_PRODUCT_MUSIC_PRODUCTS_IS_ALWAYS_FREE_SHIPPING', '0', 'What should the Default Free Shipping status be when adding new products?', 2, 102, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(36, 'Show Product Reviews Count', 'SHOW_DOCUMENT_GENERAL_INFO_REVIEWS_COUNT', '1', 'Display Product Reviews Count on Product Info 0= off 1= on', 3, 7, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(37, 'Show Product Reviews Button', 'SHOW_DOCUMENT_GENERAL_INFO_REVIEWS', '1', 'Display Product Reviews Button on Product Info 0= off 1= on', 3, 8, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(38, 'Show Date Available', 'SHOW_DOCUMENT_GENERAL_INFO_DATE_AVAILABLE', '1', 'Display Date Available on Product Info 0= off 1= on', 3, 9, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(39, 'Show Date Added', 'SHOW_DOCUMENT_GENERAL_INFO_DATE_ADDED', '1', 'Display Date Added on Product Info 0= off 1= on', 3, 10, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(40, 'Show Product Tell a Friend button', 'SHOW_DOCUMENT_GENERAL_INFO_TELL_A_FRIEND', '1', 'Display the Tell a Friend button on Product Info<br /><br />Note: Turning this setting off does not affect the Tell a Friend box in the columns and turning off the Tell a Friend box does not affect the button<br />0= off 1= on', 3, 15, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(41, 'Show Product URL', 'SHOW_DOCUMENT_GENERAL_INFO_URL', '1', 'Display URL on Product Info 0= off 1= on', 3, 11, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(42, 'Show Model Number', 'SHOW_DOCUMENT_PRODUCT_INFO_MODEL', '1', 'Display Model Number on Product Info 0= off 1= on', 4, 1, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(43, 'Show Weight', 'SHOW_DOCUMENT_PRODUCT_INFO_WEIGHT', '0', 'Display Weight on Product Info 0= off 1= on', 4, 2, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(44, 'Show Attribute Weight', 'SHOW_DOCUMENT_PRODUCT_INFO_WEIGHT_ATTRIBUTES', '1', 'Display Attribute Weight on Product Info 0= off 1= on', 4, 3, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(45, 'Show Manufacturer', 'SHOW_DOCUMENT_PRODUCT_INFO_MANUFACTURER', '1', 'Display Manufacturer Name on Product Info 0= off 1= on', 4, 4, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(46, 'Show Quantity in Shopping Cart', 'SHOW_DOCUMENT_PRODUCT_INFO_IN_CART_QTY', '1', 'Display Quantity in Current Shopping Cart on Product Info 0= off 1= on', 4, 5, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(47, 'Show Quantity in Stock', 'SHOW_DOCUMENT_PRODUCT_INFO_QUANTITY', '0', 'Display Quantity in Stock on Product Info 0= off 1= on', 4, 6, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(48, 'Show Product Reviews Count', 'SHOW_DOCUMENT_PRODUCT_INFO_REVIEWS_COUNT', '1', 'Display Product Reviews Count on Product Info 0= off 1= on', 4, 7, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(49, 'Show Product Reviews Button', 'SHOW_DOCUMENT_PRODUCT_INFO_REVIEWS', '1', 'Display Product Reviews Button on Product Info 0= off 1= on', 4, 8, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(50, 'Show Date Available', 'SHOW_DOCUMENT_PRODUCT_INFO_DATE_AVAILABLE', '1', 'Display Date Available on Product Info 0= off 1= on', 4, 9, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(51, 'Show Date Added', 'SHOW_DOCUMENT_PRODUCT_INFO_DATE_ADDED', '1', 'Display Date Added on Product Info 0= off 1= on', 4, 10, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(52, 'Show Product URL', 'SHOW_DOCUMENT_PRODUCT_INFO_URL', '1', 'Display URL on Product Info 0= off 1= on', 4, 11, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(53, 'Show Starting At text on Price', 'SHOW_DOCUMENT_PRODUCT_INFO_STARTING_AT', '1', 'Display Starting At text on products with attributes Product Info 0= off 1= on', 4, 12, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(54, 'Show Product Tell a Friend button', 'SHOW_DOCUMENT_PRODUCT_INFO_TELL_A_FRIEND', '1', 'Display the Tell a Friend button on Product Info<br /><br />Note: Turning this setting off does not affect the Tell a Friend box in the columns and turning off the Tell a Friend box does not affect the button<br />0= off 1= on', 4, 15, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(55, 'Product Free Shipping Image Status - Catalog', 'SHOW_DOCUMENT_PRODUCT_INFO_ALWAYS_FREE_SHIPPING_IMAGE_SWITCH', '0', 'Show the Free Shipping image/text in the catalog?', 4, 16, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), '),
(56, 'Product Price Tax Class Default - When adding new products?', 'DEFAULT_DOCUMENT_PRODUCT_TAX_CLASS_ID', '0', 'What should the Product Price Tax Class Default ID be when adding new products?', 4, 100, NULL, '2005-08-09 22:29:43', '', ''),
(57, 'Product Virtual Default Status - Skip Shipping Address - When adding new products?', 'DEFAULT_DOCUMENT_PRODUCT_PRODUCTS_VIRTUAL', '0', 'Default Virtual Product status to be ON when adding new products?', 4, 101, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(58, 'Product Free Shipping Default Status - Normal Shipping Rules - When adding new products?', 'DEFAULT_DOCUMENT_PRODUCT_PRODUCTS_IS_ALWAYS_FREE_SHIPPING', '0', 'What should the Default Free Shipping status be when adding new products?', 4, 102, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(59, 'Show Model Number', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_MODEL', '1', 'Display Model Number on Product Info 0= off 1= on', 5, 1, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(60, 'Show Weight', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_WEIGHT', '0', 'Display Weight on Product Info 0= off 1= on', 5, 2, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(61, 'Show Attribute Weight', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_WEIGHT_ATTRIBUTES', '1', 'Display Attribute Weight on Product Info 0= off 1= on', 5, 3, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(62, 'Show Manufacturer', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_MANUFACTURER', '1', 'Display Manufacturer Name on Product Info 0= off 1= on', 5, 4, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(63, 'Show Quantity in Shopping Cart', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_IN_CART_QTY', '1', 'Display Quantity in Current Shopping Cart on Product Info 0= off 1= on', 5, 5, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(64, 'Show Quantity in Stock', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_QUANTITY', '1', 'Display Quantity in Stock on Product Info 0= off 1= on', 5, 6, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(65, 'Show Product Reviews Count', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_REVIEWS_COUNT', '1', 'Display Product Reviews Count on Product Info 0= off 1= on', 5, 7, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(66, 'Show Product Reviews Button', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_REVIEWS', '1', 'Display Product Reviews Button on Product Info 0= off 1= on', 5, 8, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(67, 'Show Date Available', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_DATE_AVAILABLE', '0', 'Display Date Available on Product Info 0= off 1= on', 5, 9, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(68, 'Show Date Added', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_DATE_ADDED', '1', 'Display Date Added on Product Info 0= off 1= on', 5, 10, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(69, 'Show Product URL', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_URL', '1', 'Display URL on Product Info 0= off 1= on', 5, 11, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(70, 'Show Starting At text on Price', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_STARTING_AT', '1', 'Display Starting At text on products with attributes Product Info 0= off 1= on', 5, 12, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(71, 'Show Product Tell a Friend button', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_TELL_A_FRIEND', '1', 'Display the Tell a Friend button on Product Info<br /><br />Note: Turning this setting off does not affect the Tell a Friend box in the columns and turning off the Tell a Friend box does not affect the button<br />0= off 1= on', 5, 15, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(72, 'Product Free Shipping Image Status - Catalog', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_ALWAYS_FREE_SHIPPING_IMAGE_SWITCH', '1', 'Show the Free Shipping image/text in the catalog?', 5, 16, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), '),
(73, 'Product Price Tax Class Default - When adding new products?', 'DEFAULT_PRODUCT_FREE_SHIPPING_TAX_CLASS_ID', '0', 'What should the Product Price Tax Class Default ID be when adding new products?', 5, 100, NULL, '2005-08-09 22:29:43', '', ''),
(74, 'Product Virtual Default Status - Skip Shipping Address - When adding new products?', 'DEFAULT_PRODUCT_FREE_SHIPPING_PRODUCTS_VIRTUAL', '0', 'Default Virtual Product status to be ON when adding new products?', 5, 101, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(75, 'Product Free Shipping Default Status - Normal Shipping Rules - When adding new products?', 'DEFAULT_PRODUCT_FREE_SHIPPING_PRODUCTS_IS_ALWAYS_FREE_SHIPPING', '1', 'What should the Default Free Shipping status be when adding new products?', 5, 102, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(76, 'Show Metatags Title Default - Product Title', 'SHOW_PRODUCT_INFO_METATAGS_TITLE_STATUS', '1', 'Display Product Title in Meta Tags Title 0= off 1= on', 1, 50, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(77, 'Show Metatags Title Default - Product Name', 'SHOW_PRODUCT_INFO_METATAGS_PRODUCTS_NAME_STATUS', '1', 'Display Product Name in Meta Tags Title 0= off 1= on', 1, 51, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(78, 'Show Metatags Title Default - Product Model', 'SHOW_PRODUCT_INFO_METATAGS_MODEL_STATUS', '1', 'Display Product Model in Meta Tags Title 0= off 1= on', 1, 52, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(79, 'Show Metatags Title Default - Product Price', 'SHOW_PRODUCT_INFO_METATAGS_PRICE_STATUS', '1', 'Display Product Price in Meta Tags Title 0= off 1= on', 1, 53, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(80, 'Show Metatags Title Default - Product Tagline', 'SHOW_PRODUCT_INFO_METATAGS_TITLE_TAGLINE_STATUS', '1', 'Display Product Tagline in Meta Tags Title 0= off 1= on', 1, 54, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(81, 'Show Metatags Title Default - Product Title', 'SHOW_PRODUCT_MUSIC_INFO_METATAGS_TITLE_STATUS', '1', 'Display Product Title in Meta Tags Title 0= off 1= on', 2, 50, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(82, 'Show Metatags Title Default - Product Name', 'SHOW_PRODUCT_MUSIC_INFO_METATAGS_PRODUCTS_NAME_STATUS', '1', 'Display Product Name in Meta Tags Title 0= off 1= on', 2, 51, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(83, 'Show Metatags Title Default - Product Model', 'SHOW_PRODUCT_MUSIC_INFO_METATAGS_MODEL_STATUS', '1', 'Display Product Model in Meta Tags Title 0= off 1= on', 2, 52, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(84, 'Show Metatags Title Default - Product Price', 'SHOW_PRODUCT_MUSIC_INFO_METATAGS_PRICE_STATUS', '1', 'Display Product Price in Meta Tags Title 0= off 1= on', 2, 53, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(85, 'Show Metatags Title Default - Product Tagline', 'SHOW_PRODUCT_MUSIC_INFO_METATAGS_TITLE_TAGLINE_STATUS', '1', 'Display Product Tagline in Meta Tags Title 0= off 1= on', 2, 54, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(86, 'Show Metatags Title Default - Document Title', 'SHOW_DOCUMENT_GENERAL_INFO_METATAGS_TITLE_STATUS', '1', 'Display Document Title in Meta Tags Title 0= off 1= on', 3, 50, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(87, 'Show Metatags Title Default - Document Name', 'SHOW_DOCUMENT_GENERAL_INFO_METATAGS_PRODUCTS_NAME_STATUS', '1', 'Display Document Name in Meta Tags Title 0= off 1= on', 3, 51, NULL, '2005-08-09 22:29:43', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(88, 'Show Metatags Title Default - Document Tagline', 'SHOW_DOCUMENT_GENERAL_INFO_METATAGS_TITLE_TAGLINE_STATUS', '1', 'Display Document Tagline in Meta Tags Title 0= off 1= on', 3, 54, NULL, '2005-08-09 22:29:44', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(89, 'Show Metatags Title Default - Document Title', 'SHOW_DOCUMENT_PRODUCT_INFO_METATAGS_TITLE_STATUS', '1', 'Display Document Title in Meta Tags Title 0= off 1= on', 4, 50, NULL, '2005-08-09 22:29:44', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(90, 'Show Metatags Title Default - Document Name', 'SHOW_DOCUMENT_PRODUCT_INFO_METATAGS_PRODUCTS_NAME_STATUS', '1', 'Display Document Name in Meta Tags Title 0= off 1= on', 4, 51, NULL, '2005-08-09 22:29:44', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(91, 'Show Metatags Title Default - Document Model', 'SHOW_DOCUMENT_PRODUCT_INFO_METATAGS_MODEL_STATUS', '1', 'Display Document Model in Meta Tags Title 0= off 1= on', 4, 52, NULL, '2005-08-09 22:29:44', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(92, 'Show Metatags Title Default - Document Price', 'SHOW_DOCUMENT_PRODUCT_INFO_METATAGS_PRICE_STATUS', '1', 'Display Document Price in Meta Tags Title 0= off 1= on', 4, 53, NULL, '2005-08-09 22:29:44', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(93, 'Show Metatags Title Default - Document Tagline', 'SHOW_DOCUMENT_PRODUCT_INFO_METATAGS_TITLE_TAGLINE_STATUS', '1', 'Display Document Tagline in Meta Tags Title 0= off 1= on', 4, 54, NULL, '2005-08-09 22:29:44', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(94, 'Show Metatags Title Default - Product Title', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_METATAGS_TITLE_STATUS', '1', 'Display Product Title in Meta Tags Title 0= off 1= on', 5, 50, NULL, '2005-08-09 22:29:44', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(95, 'Show Metatags Title Default - Product Name', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_METATAGS_PRODUCTS_NAME_STATUS', '1', 'Display Product Name in Meta Tags Title 0= off 1= on', 5, 51, NULL, '2005-08-09 22:29:44', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(96, 'Show Metatags Title Default - Product Model', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_METATAGS_MODEL_STATUS', '1', 'Display Product Model in Meta Tags Title 0= off 1= on', 5, 52, NULL, '2005-08-09 22:29:44', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(97, 'Show Metatags Title Default - Product Price', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_METATAGS_PRICE_STATUS', '1', 'Display Product Price in Meta Tags Title 0= off 1= on', 5, 53, NULL, '2005-08-09 22:29:44', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
(98, 'Show Metatags Title Default - Product Tagline', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_METATAGS_TITLE_TAGLINE_STATUS', '1', 'Display Product Tagline in Meta Tags Title 0= off 1= on', 5, 54, NULL, '2005-08-09 22:29:44', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcproduct_types`
-- 

CREATE TABLE `zcproduct_types` (
  `type_id` int(11) NOT NULL auto_increment,
  `type_name` varchar(255) NOT NULL default '',
  `type_handler` varchar(255) NOT NULL default '',
  `type_master_type` int(11) NOT NULL default '1',
  `allow_add_to_cart` char(1) NOT NULL default 'Y',
  `default_image` varchar(255) NOT NULL default '',
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  `last_modified` datetime NOT NULL default '0001-01-01 00:00:00',
  PRIMARY KEY  (`type_id`),
  KEY `idx_type_master_type_zen` (`type_master_type`)
)   AUTO_INCREMENT=6 ;

-- 
-- Volcar la base de datos para la tabla `zcproduct_types`
-- 

INSERT INTO `zcproduct_types` (`type_id`, `type_name`, `type_handler`, `type_master_type`, `allow_add_to_cart`, `default_image`, `date_added`, `last_modified`) VALUES (1, 'Product - General', 'product', 1, 'Y', '', '2005-08-09 22:29:40', '2005-08-09 22:29:40'),
(2, 'Product - Music', 'product_music', 1, 'Y', '', '2005-08-09 22:29:40', '2005-08-09 22:29:40'),
(3, 'Document - General', 'document_general', 3, 'N', '', '2005-08-09 22:29:40', '2005-08-09 22:29:40'),
(4, 'Document - Product', 'document_product', 3, 'Y', '', '2005-08-09 22:29:40', '2005-08-09 22:29:40'),
(5, 'Product - Free Shipping', 'product_free_shipping', 1, 'Y', '', '2005-08-09 22:29:40', '2005-08-09 22:29:40');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcproduct_types_to_category`
-- 

CREATE TABLE `zcproduct_types_to_category` (
  `product_type_id` int(11) NOT NULL default '0',
  `category_id` int(11) NOT NULL default '0',
  KEY `idx_category_id_zen` (`category_id`),
  KEY `idx_product_type_id_zen` (`product_type_id`)
)  ;

-- 
-- Volcar la base de datos para la tabla `zcproduct_types_to_category`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcproducts`
-- 

CREATE TABLE `zcproducts` (
  `products_id` int(11) NOT NULL auto_increment,
  `products_type` int(11) NOT NULL default '1',
  `products_quantity` float NOT NULL default '0',
  `products_model` varchar(32) default NULL,
  `products_image` varchar(64) default NULL,
  `products_price` decimal(15,4) NOT NULL default '0.0000',
  `products_virtual` tinyint(1) NOT NULL default '0',
  `products_date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  `products_last_modified` datetime default NULL,
  `products_date_available` datetime default NULL,
  `products_weight` float NOT NULL default '0',
  `products_status` tinyint(1) NOT NULL default '0',
  `products_tax_class_id` int(11) NOT NULL default '0',
  `manufacturers_id` int(11) default NULL,
  `products_ordered` float NOT NULL default '0',
  `products_quantity_order_min` float NOT NULL default '1',
  `products_quantity_order_units` float NOT NULL default '1',
  `products_priced_by_attribute` tinyint(1) NOT NULL default '0',
  `product_is_free` tinyint(1) NOT NULL default '0',
  `product_is_call` tinyint(1) NOT NULL default '0',
  `products_quantity_mixed` tinyint(1) NOT NULL default '0',
  `product_is_always_free_shipping` tinyint(1) NOT NULL default '0',
  `products_qty_box_status` tinyint(1) NOT NULL default '1',
  `products_quantity_order_max` float NOT NULL default '0',
  `products_sort_order` int(11) NOT NULL default '0',
  `products_discount_type` tinyint(1) NOT NULL default '0',
  `products_discount_type_from` tinyint(1) NOT NULL default '0',
  `products_price_sorter` decimal(15,4) NOT NULL default '0.0000',
  `master_categories_id` int(11) NOT NULL default '0',
  `products_mixed_discount_quantity` tinyint(1) NOT NULL default '1',
  `metatags_title_status` tinyint(1) NOT NULL default '0',
  `metatags_products_name_status` tinyint(1) NOT NULL default '0',
  `metatags_model_status` tinyint(1) NOT NULL default '0',
  `metatags_price_status` tinyint(1) NOT NULL default '0',
  `metatags_title_tagline_status` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`products_id`),
  KEY `idx_products_date_added_zen` (`products_date_added`),
  KEY `idx_products_status_zen` (`products_status`)
)   AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `zcproducts`
-- 

INSERT INTO `zcproducts` (`products_id`, `products_type`, `products_quantity`, `products_model`, `products_image`, `products_price`, `products_virtual`, `products_date_added`, `products_last_modified`, `products_date_available`, `products_weight`, `products_status`, `products_tax_class_id`, `manufacturers_id`, `products_ordered`, `products_quantity_order_min`, `products_quantity_order_units`, `products_priced_by_attribute`, `product_is_free`, `product_is_call`, `products_quantity_mixed`, `product_is_always_free_shipping`, `products_qty_box_status`, `products_quantity_order_max`, `products_sort_order`, `products_discount_type`, `products_discount_type_from`, `products_price_sorter`, `master_categories_id`, `products_mixed_discount_quantity`, `metatags_title_status`, `metatags_products_name_status`, `metatags_model_status`, `metatags_price_status`, `metatags_title_tagline_status`) VALUES (1, 1, 100, '', '1558908242.01.LZZZZZZZ.jpg', 5.0000, 0, '2005-08-12 20:26:41', '2005-08-15 11:09:40', NULL, 0, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 5.0000, 2, 1, 0, 0, 0, 0, 0),
(2, 1, 100, '', 'dvd-cover.jpg', 44.0000, 0, '2005-08-13 11:44:44', '2005-08-14 02:33:03', NULL, 0, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0.0000, 1, 1, 0, 0, 0, 0, 0),
(3, 1, 100, '', 'images.jpg', 50.0000, 0, '2005-08-15 11:12:11', NULL, NULL, 0, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 50.0000, 2, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcproducts_attributes`
-- 

CREATE TABLE `zcproducts_attributes` (
  `products_attributes_id` int(11) NOT NULL auto_increment,
  `products_id` int(11) NOT NULL default '0',
  `options_id` int(11) NOT NULL default '0',
  `options_values_id` int(11) NOT NULL default '0',
  `options_values_price` decimal(15,4) NOT NULL default '0.0000',
  `price_prefix` char(1) NOT NULL default '',
  `products_options_sort_order` int(11) NOT NULL default '0',
  `product_attribute_is_free` tinyint(1) NOT NULL default '0',
  `products_attributes_weight` float NOT NULL default '0',
  `products_attributes_weight_prefix` char(1) NOT NULL default '',
  `attributes_display_only` tinyint(1) NOT NULL default '0',
  `attributes_default` tinyint(1) NOT NULL default '0',
  `attributes_discounted` tinyint(1) NOT NULL default '1',
  `attributes_image` varchar(64) default NULL,
  `attributes_price_base_included` tinyint(1) NOT NULL default '1',
  `attributes_price_onetime` decimal(15,4) NOT NULL default '0.0000',
  `attributes_price_factor` decimal(15,4) NOT NULL default '0.0000',
  `attributes_price_factor_offset` decimal(15,4) NOT NULL default '0.0000',
  `attributes_price_factor_onetime` decimal(15,4) NOT NULL default '0.0000',
  `attributes_price_factor_onetime_offset` decimal(15,4) NOT NULL default '0.0000',
  `attributes_qty_prices` text,
  `attributes_qty_prices_onetime` text,
  `attributes_price_words` decimal(15,4) NOT NULL default '0.0000',
  `attributes_price_words_free` int(4) NOT NULL default '0',
  `attributes_price_letters` decimal(15,4) NOT NULL default '0.0000',
  `attributes_price_letters_free` int(4) NOT NULL default '0',
  `attributes_required` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`products_attributes_id`),
  KEY `idx_id_options_id_values_zen` (`products_id`,`options_id`,`options_values_id`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcproducts_attributes`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcproducts_attributes_download`
-- 

CREATE TABLE `zcproducts_attributes_download` (
  `products_attributes_id` int(11) NOT NULL default '0',
  `products_attributes_filename` varchar(255) NOT NULL default '',
  `products_attributes_maxdays` int(2) default '0',
  `products_attributes_maxcount` int(2) default '0',
  PRIMARY KEY  (`products_attributes_id`)
)  ;

-- 
-- Volcar la base de datos para la tabla `zcproducts_attributes_download`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcproducts_description`
-- 

CREATE TABLE `zcproducts_description` (
  `products_id` int(11) NOT NULL auto_increment,
  `language_id` int(11) NOT NULL default '1',
  `products_name` varchar(64) NOT NULL default '',
  `products_description` text,
  `products_url` varchar(255) default NULL,
  `products_viewed` int(5) default '0',
  PRIMARY KEY  (`products_id`,`language_id`),
  KEY `idx_products_name_zen` (`products_name`)
)   AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `zcproducts_description`
-- 

INSERT INTO `zcproducts_description` (`products_id`, `language_id`, `products_name`, `products_description`, `products_url`, `products_viewed`) VALUES (1, 1, 'Pulp Fiction', 'asdasd', '', 16),
(2, 1, 'El Exorcista', 'El Exorcista', '', 19),
(3, 1, 'This Bed We Made', '', '', 3);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcproducts_discount_quantity`
-- 

CREATE TABLE `zcproducts_discount_quantity` (
  `discount_id` int(4) NOT NULL default '0',
  `products_id` int(11) NOT NULL default '0',
  `discount_qty` float NOT NULL default '0',
  `discount_price` decimal(15,4) NOT NULL default '0.0000',
  KEY `idx_id_qty_zen` (`products_id`,`discount_qty`)
)  ;

-- 
-- Volcar la base de datos para la tabla `zcproducts_discount_quantity`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcproducts_notifications`
-- 

CREATE TABLE `zcproducts_notifications` (
  `products_id` int(11) NOT NULL default '0',
  `customers_id` int(11) NOT NULL default '0',
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  PRIMARY KEY  (`products_id`,`customers_id`)
)  ;

-- 
-- Volcar la base de datos para la tabla `zcproducts_notifications`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcproducts_options`
-- 

CREATE TABLE `zcproducts_options` (
  `products_options_id` int(11) NOT NULL default '0',
  `language_id` int(11) NOT NULL default '1',
  `products_options_name` varchar(32) NOT NULL default '',
  `products_options_sort_order` int(11) NOT NULL default '0',
  `products_options_type` int(5) NOT NULL default '0',
  `products_options_length` smallint(2) NOT NULL default '32',
  `products_options_comment` varchar(64) default NULL,
  `products_options_size` smallint(2) NOT NULL default '32',
  `products_options_images_per_row` int(2) default '5',
  `products_options_images_style` int(1) default '0',
  PRIMARY KEY  (`products_options_id`,`language_id`),
  KEY `idx_lang_id_zen` (`language_id`)
)  ;

-- 
-- Volcar la base de datos para la tabla `zcproducts_options`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcproducts_options_types`
-- 

CREATE TABLE `zcproducts_options_types` (
  `products_options_types_id` int(11) NOT NULL default '0',
  `products_options_types_name` varchar(32) default NULL,
  PRIMARY KEY  (`products_options_types_id`)
)   COMMENT='Track products_options_types';

-- 
-- Volcar la base de datos para la tabla `zcproducts_options_types`
-- 

INSERT INTO `zcproducts_options_types` (`products_options_types_id`, `products_options_types_name`) VALUES (0, 'Dropdown'),
(1, 'Text'),
(2, 'Radio'),
(3, 'Checkbox'),
(4, 'File'),
(5, 'Read Only');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcproducts_options_values`
-- 

CREATE TABLE `zcproducts_options_values` (
  `products_options_values_id` int(11) NOT NULL default '0',
  `language_id` int(11) NOT NULL default '1',
  `products_options_values_name` varchar(64) NOT NULL default '',
  `products_options_values_sort_order` int(11) NOT NULL default '0',
  PRIMARY KEY  (`products_options_values_id`,`language_id`),
  KEY `idx_prod_opt_val_id_zen` (`products_options_values_id`)
)  ;

-- 
-- Volcar la base de datos para la tabla `zcproducts_options_values`
-- 

INSERT INTO `zcproducts_options_values` (`products_options_values_id`, `language_id`, `products_options_values_name`, `products_options_values_sort_order`) VALUES (0, 1, 'TEXT', 0);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcproducts_options_values_to_products_options`
-- 

CREATE TABLE `zcproducts_options_values_to_products_options` (
  `products_options_values_to_products_options_id` int(11) NOT NULL auto_increment,
  `products_options_id` int(11) NOT NULL default '0',
  `products_options_values_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`products_options_values_to_products_options_id`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcproducts_options_values_to_products_options`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcproducts_to_categories`
-- 

CREATE TABLE `zcproducts_to_categories` (
  `products_id` int(11) NOT NULL default '0',
  `categories_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`products_id`,`categories_id`),
  KEY `idx_cat_prod_id_zen` (`categories_id`,`products_id`)
)  ;

-- 
-- Volcar la base de datos para la tabla `zcproducts_to_categories`
-- 

INSERT INTO `zcproducts_to_categories` (`products_id`, `categories_id`) VALUES (1, 2),
(2, 1),
(3, 2);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcproject_version`
-- 

CREATE TABLE `zcproject_version` (
  `project_version_id` tinyint(3) NOT NULL auto_increment,
  `project_version_key` varchar(40) NOT NULL default '',
  `project_version_major` varchar(20) NOT NULL default '',
  `project_version_minor` varchar(20) NOT NULL default '',
  `project_version_patch1` varchar(20) NOT NULL default '',
  `project_version_patch2` varchar(20) NOT NULL default '',
  `project_version_patch1_source` varchar(20) NOT NULL default '',
  `project_version_patch2_source` varchar(20) NOT NULL default '',
  `project_version_comment` varchar(250) NOT NULL default '',
  `project_version_date_applied` datetime NOT NULL default '0001-01-01 01:01:01',
  PRIMARY KEY  (`project_version_id`),
  UNIQUE KEY `idx_project_version_key_zen` (`project_version_key`)
)   COMMENT='Database Version Tracking' AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `zcproject_version`
-- 

INSERT INTO `zcproject_version` (`project_version_id`, `project_version_key`, `project_version_major`, `project_version_minor`, `project_version_patch1`, `project_version_patch2`, `project_version_patch1_source`, `project_version_patch2_source`, `project_version_comment`, `project_version_date_applied`) VALUES (1, 'Zen-Cart Main', '1', '2.6', '', '', '', '', 'Version Update 1.2.5->1.2.6', '2005-09-18 23:07:53'),
(2, 'Zen-Cart Database', '1', '2.6', '', '', '', '', 'Version Update 1.2.5->1.2.6', '2005-09-18 23:07:53');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcproject_version_history`
-- 

CREATE TABLE `zcproject_version_history` (
  `project_version_id` tinyint(3) NOT NULL auto_increment,
  `project_version_key` varchar(40) NOT NULL default '',
  `project_version_major` varchar(20) NOT NULL default '',
  `project_version_minor` varchar(20) NOT NULL default '',
  `project_version_patch` varchar(20) NOT NULL default '',
  `project_version_comment` varchar(250) NOT NULL default '',
  `project_version_date_applied` datetime NOT NULL default '0001-01-01 01:01:01',
  PRIMARY KEY  (`project_version_id`)
)   COMMENT='Database Version Tracking History' AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `zcproject_version_history`
-- 

INSERT INTO `zcproject_version_history` (`project_version_id`, `project_version_key`, `project_version_major`, `project_version_minor`, `project_version_patch`, `project_version_comment`, `project_version_date_applied`) VALUES (1, 'Zen-Cart Main', '1', '2.5', '', 'Fresh Installation', '2005-08-09 22:29:44'),
(2, 'Zen-Cart Database', '1', '2.5', '', 'Fresh Installation', '2005-08-09 22:29:44'),
(3, 'Zen-Cart Main', '1', '2.5', '', 'Fresh Installation', '2005-08-09 22:29:44'),
(4, 'Zen-Cart Database', '1', '2.5', '', 'Fresh Installation', '2005-08-09 22:29:44');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcquery_builder`
-- 

CREATE TABLE `zcquery_builder` (
  `query_id` int(11) NOT NULL auto_increment,
  `query_category` varchar(40) NOT NULL default '',
  `query_name` varchar(80) NOT NULL default '',
  `query_description` text NOT NULL,
  `query_string` text NOT NULL,
  `query_keys_list` text NOT NULL,
  PRIMARY KEY  (`query_id`),
  UNIQUE KEY `query_name` (`query_name`)
)   COMMENT='Stores queries for re-use in Admin email and report modules' AUTO_INCREMENT=6 ;

-- 
-- Volcar la base de datos para la tabla `zcquery_builder`
-- 

INSERT INTO `zcquery_builder` (`query_id`, `query_category`, `query_name`, `query_description`, `query_string`, `query_keys_list`) VALUES (1, 'email', 'All Customers', 'Returns all customers name and email address for sending mass emails (ie: for newsletters, coupons, GV''s, messages, etc).', 'select customers_email_address, customers_firstname, customers_lastname from TABLE_CUSTOMERS order by customers_lastname, customers_firstname, customers_email_address', ''),
(2, 'email,newsletters', 'All Newsletter Subscribers', 'Returns name and email address of newsletter subscribers', 'select customers_firstname, customers_lastname, customers_email_address from TABLE_CUSTOMERS where customers_newsletter = ''1''', ''),
(3, 'email,newsletters', 'Dormant Customers (>3months) (Subscribers)', 'Subscribers who HAVE purchased something, but have NOT purchased for at least three months.', 'select c.customers_email_address, c.customers_lastname, c.customers_firstname from TABLE_CUSTOMERS c, TABLE_ORDERS o where c.customers_newsletter = ''1'' AND c.customers_id = o.customers_id and o.date_purchased < subdate(now(),INTERVAL 3 MONTH) GROUP BY c.customers_email_address order by c.customers_lastname, c.customers_firstname ASC', ''),
(4, 'email,newsletters', 'Active customers in past 3 months (Subscribers)', 'Newsletter subscribers who are also active customers (purchased something) in last 3 months.', 'select c.customers_email_address, c.customers_lastname, c.customers_firstname from TABLE_CUSTOMERS c, TABLE_ORDERS o where c.customers_newsletter = ''1'' AND c.customers_id = o.customers_id and o.date_purchased > subdate(now(),INTERVAL 3 MONTH) GROUP BY c.customers_email_address order by c.customers_lastname, c.customers_firstname ASC', ''),
(5, 'email,newsletters', 'Active customers in past 3 months (Regardless of subscription status)', 'All active customers (purchased something) in last 3 months, ignoring newsletter-subscription status.', 'select c.customers_email_address, c.customers_lastname, c.customers_firstname from TABLE_CUSTOMERS c, TABLE_ORDERS o WHERE c.customers_id = o.customers_id and o.date_purchased > subdate(now(),INTERVAL 3 MONTH) GROUP BY c.customers_email_address order by c.customers_lastname, c.customers_firstname ASC', '');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcrecord_artists`
-- 

CREATE TABLE `zcrecord_artists` (
  `artists_id` int(11) NOT NULL auto_increment,
  `artists_name` varchar(32) NOT NULL default '',
  `artists_image` varchar(64) default NULL,
  `date_added` datetime default NULL,
  `last_modified` datetime default NULL,
  PRIMARY KEY  (`artists_id`),
  KEY `idx_rec_artists_name_zen` (`artists_name`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcrecord_artists`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcrecord_artists_info`
-- 

CREATE TABLE `zcrecord_artists_info` (
  `artists_id` int(11) NOT NULL default '0',
  `languages_id` int(11) NOT NULL default '0',
  `artists_url` varchar(255) NOT NULL default '',
  `url_clicked` int(5) NOT NULL default '0',
  `date_last_click` datetime default NULL,
  PRIMARY KEY  (`artists_id`,`languages_id`)
)  ;

-- 
-- Volcar la base de datos para la tabla `zcrecord_artists_info`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcrecord_company`
-- 

CREATE TABLE `zcrecord_company` (
  `record_company_id` int(11) NOT NULL auto_increment,
  `record_company_name` varchar(32) NOT NULL default '',
  `record_company_image` varchar(64) default NULL,
  `date_added` datetime default NULL,
  `last_modified` datetime default NULL,
  PRIMARY KEY  (`record_company_id`),
  KEY `idx_rec_company_name_zen` (`record_company_name`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcrecord_company`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcrecord_company_info`
-- 

CREATE TABLE `zcrecord_company_info` (
  `record_company_id` int(11) NOT NULL default '0',
  `languages_id` int(11) NOT NULL default '0',
  `record_company_url` varchar(255) NOT NULL default '',
  `url_clicked` int(5) NOT NULL default '0',
  `date_last_click` datetime default NULL,
  PRIMARY KEY  (`record_company_id`,`languages_id`)
)  ;

-- 
-- Volcar la base de datos para la tabla `zcrecord_company_info`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcreviews`
-- 

CREATE TABLE `zcreviews` (
  `reviews_id` int(11) NOT NULL auto_increment,
  `products_id` int(11) NOT NULL default '0',
  `customers_id` int(11) default NULL,
  `customers_name` varchar(64) NOT NULL default '',
  `reviews_rating` int(1) default NULL,
  `date_added` datetime default NULL,
  `last_modified` datetime default NULL,
  `reviews_read` int(5) NOT NULL default '0',
  `status` int(1) NOT NULL default '1',
  PRIMARY KEY  (`reviews_id`),
  KEY `idx_products_id_zen` (`products_id`),
  KEY `idx_customers_id_zen` (`customers_id`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcreviews`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcreviews_description`
-- 

CREATE TABLE `zcreviews_description` (
  `reviews_id` int(11) NOT NULL default '0',
  `languages_id` int(11) NOT NULL default '0',
  `reviews_text` text NOT NULL,
  PRIMARY KEY  (`reviews_id`,`languages_id`)
)  ;

-- 
-- Volcar la base de datos para la tabla `zcreviews_description`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcsalemaker_sales`
-- 

CREATE TABLE `zcsalemaker_sales` (
  `sale_id` int(11) NOT NULL auto_increment,
  `sale_status` tinyint(4) NOT NULL default '0',
  `sale_name` varchar(30) NOT NULL default '',
  `sale_deduction_value` decimal(15,4) NOT NULL default '0.0000',
  `sale_deduction_type` tinyint(4) NOT NULL default '0',
  `sale_pricerange_from` decimal(15,4) NOT NULL default '0.0000',
  `sale_pricerange_to` decimal(15,4) NOT NULL default '0.0000',
  `sale_specials_condition` tinyint(4) NOT NULL default '0',
  `sale_categories_selected` text,
  `sale_categories_all` text,
  `sale_date_start` date NOT NULL default '0001-01-01',
  `sale_date_end` date NOT NULL default '0001-01-01',
  `sale_date_added` date NOT NULL default '0001-01-01',
  `sale_date_last_modified` date NOT NULL default '0001-01-01',
  `sale_date_status_change` date NOT NULL default '0001-01-01',
  PRIMARY KEY  (`sale_id`),
  KEY `idx_sale_status_zen` (`sale_status`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcsalemaker_sales`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcsessions`
-- 

CREATE TABLE `zcsessions` (
  `sesskey` varchar(32) NOT NULL default '',
  `expiry` int(11) unsigned NOT NULL default '0',
  `value` text NOT NULL,
  PRIMARY KEY  (`sesskey`)
)  ;

-- 
-- Volcar la base de datos para la tabla `zcsessions`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcspecials`
-- 

CREATE TABLE `zcspecials` (
  `specials_id` int(11) NOT NULL auto_increment,
  `products_id` int(11) NOT NULL default '0',
  `specials_new_products_price` decimal(15,4) NOT NULL default '0.0000',
  `specials_date_added` datetime default NULL,
  `specials_last_modified` datetime default NULL,
  `expires_date` date NOT NULL default '0001-01-01',
  `date_status_change` datetime default NULL,
  `status` int(1) NOT NULL default '1',
  `specials_date_available` date NOT NULL default '0001-01-01',
  PRIMARY KEY  (`specials_id`),
  KEY `idx_status_zen` (`status`),
  KEY `idx_products_id_zen` (`products_id`),
  KEY `idx_date_avail_zen` (`specials_date_available`)
)   AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `zcspecials`
-- 

INSERT INTO `zcspecials` (`specials_id`, `products_id`, `specials_new_products_price`, `specials_date_added`, `specials_last_modified`, `expires_date`, `date_status_change`, `status`, `specials_date_available`) VALUES (1, 2, 0.0000, '2005-08-13 12:32:07', NULL, 0x303030312d30312d3031, NULL, 1, 0x303030312d30312d3031);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zctax_class`
-- 

CREATE TABLE `zctax_class` (
  `tax_class_id` int(11) NOT NULL auto_increment,
  `tax_class_title` varchar(32) NOT NULL default '',
  `tax_class_description` varchar(255) NOT NULL default '',
  `last_modified` datetime default NULL,
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  PRIMARY KEY  (`tax_class_id`)
)   AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `zctax_class`
-- 

INSERT INTO `zctax_class` (`tax_class_id`, `tax_class_title`, `tax_class_description`, `last_modified`, `date_added`) VALUES (1, 'Taxable Goods', 'The following types of products are included non-food, services, etc', '2004-01-21 01:35:29', '2004-01-21 01:35:29');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zctax_rates`
-- 

CREATE TABLE `zctax_rates` (
  `tax_rates_id` int(11) NOT NULL auto_increment,
  `tax_zone_id` int(11) NOT NULL default '0',
  `tax_class_id` int(11) NOT NULL default '0',
  `tax_priority` int(5) default '1',
  `tax_rate` decimal(7,4) NOT NULL default '0.0000',
  `tax_description` varchar(255) NOT NULL default '',
  `last_modified` datetime default NULL,
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  PRIMARY KEY  (`tax_rates_id`),
  KEY `idx_tax_zone_id_zen` (`tax_zone_id`),
  KEY `idx_tax_class_id_zen` (`tax_class_id`)
)   AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `zctax_rates`
-- 

INSERT INTO `zctax_rates` (`tax_rates_id`, `tax_zone_id`, `tax_class_id`, `tax_priority`, `tax_rate`, `tax_description`, `last_modified`, `date_added`) VALUES (1, 1, 1, 1, 7.0000, 'FL TAX 7.0%', '2005-08-09 22:29:40', '2005-08-09 22:29:40');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zctemplate_select`
-- 

CREATE TABLE `zctemplate_select` (
  `template_id` int(11) NOT NULL auto_increment,
  `template_dir` varchar(64) NOT NULL default '',
  `template_language` varchar(64) NOT NULL default '0',
  PRIMARY KEY  (`template_id`)
)   AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `zctemplate_select`
-- 

INSERT INTO `zctemplate_select` (`template_id`, `template_dir`, `template_language`) VALUES (1, 'xoopstheme', '0');

	-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcupgrade_exceptions`
-- 

CREATE TABLE `zcupgrade_exceptions` (
  `upgrade_exception_id` smallint(5) NOT NULL auto_increment,
  `sql_file` varchar(50) default NULL,
  `reason` varchar(200) default NULL,
  `errordate` datetime default '0001-01-01 00:00:00',
  `sqlstatement` text,
  PRIMARY KEY  (`upgrade_exception_id`)
)   AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `zcupgrade_exceptions`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zcwhos_online`
-- 

CREATE TABLE `zcwhos_online` (
  `customer_id` int(11) default NULL,
  `full_name` varchar(64) NOT NULL default '',
  `session_id` varchar(128) NOT NULL default '',
  `ip_address` varchar(15) NOT NULL default '',
  `time_entry` varchar(14) NOT NULL default '',
  `time_last_click` varchar(14) NOT NULL default '',
  `last_page_url` varchar(255) NOT NULL default '',
  `host_address` text NOT NULL,
  `user_agent` varchar(64) NOT NULL default '',
  KEY `idx_ip_address_zen` (`ip_address`),
  KEY `idx_session_id_zen` (`session_id`),
  KEY `idx_customer_id_zen` (`customer_id`),
  KEY `idx_time_entry_zen` (`time_entry`),
  KEY `idx_time_last_click_zen` (`time_last_click`),
  KEY `idx_last_page_url_zen` (`last_page_url`)
)  ;

-- 
-- Volcar la base de datos para la tabla `zcwhos_online`
-- 

INSERT INTO `zcwhos_online` (`customer_id`, `full_name`, `session_id`, `ip_address`, `time_entry`, `time_last_click`, `last_page_url`, `host_address`, `user_agent`) VALUES (0, 'Guest', 'qv5ajubu1n2lbti7a19ivc3vd1', '127.0.0.1', '1124238753', '1124238753', '/xoopsshop/modules/shop/index.php?lang=English', 'localhost', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; es-AR; rv:1.7.10) Gecko');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zczones`
-- 

CREATE TABLE `zczones` (
  `zone_id` int(11) NOT NULL auto_increment,
  `zone_country_id` int(11) NOT NULL default '0',
  `zone_code` varchar(32) NOT NULL default '',
  `zone_name` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`zone_id`)
)   AUTO_INCREMENT=182 ;

-- 
-- Volcar la base de datos para la tabla `zczones`
-- 

INSERT INTO `zczones` (`zone_id`, `zone_country_id`, `zone_code`, `zone_name`) VALUES (1, 223, 'AL', 'Alabama'),
(2, 223, 'AK', 'Alaska'),
(3, 223, 'AS', 'American Samoa'),
(4, 223, 'AZ', 'Arizona'),
(5, 223, 'AR', 'Arkansas'),
(6, 223, 'AF', 'Armed Forces Africa'),
(7, 223, 'AA', 'Armed Forces Americas'),
(8, 223, 'AC', 'Armed Forces Canada'),
(9, 223, 'AE', 'Armed Forces Europe'),
(10, 223, 'AM', 'Armed Forces Middle East'),
(11, 223, 'AP', 'Armed Forces Pacific'),
(12, 223, 'CA', 'California'),
(13, 223, 'CO', 'Colorado'),
(14, 223, 'CT', 'Connecticut'),
(15, 223, 'DE', 'Delaware'),
(16, 223, 'DC', 'District of Columbia'),
(17, 223, 'FM', 'Federated States Of Micronesia'),
(18, 223, 'FL', 'Florida'),
(19, 223, 'GA', 'Georgia'),
(20, 223, 'GU', 'Guam'),
(21, 223, 'HI', 'Hawaii'),
(22, 223, 'ID', 'Idaho'),
(23, 223, 'IL', 'Illinois'),
(24, 223, 'IN', 'Indiana'),
(25, 223, 'IA', 'Iowa'),
(26, 223, 'KS', 'Kansas'),
(27, 223, 'KY', 'Kentucky'),
(28, 223, 'LA', 'Louisiana'),
(29, 223, 'ME', 'Maine'),
(30, 223, 'MH', 'Marshall Islands'),
(31, 223, 'MD', 'Maryland'),
(32, 223, 'MA', 'Massachusetts'),
(33, 223, 'MI', 'Michigan'),
(34, 223, 'MN', 'Minnesota'),
(35, 223, 'MS', 'Mississippi'),
(36, 223, 'MO', 'Missouri'),
(37, 223, 'MT', 'Montana'),
(38, 223, 'NE', 'Nebraska'),
(39, 223, 'NV', 'Nevada'),
(40, 223, 'NH', 'New Hampshire'),
(41, 223, 'NJ', 'New Jersey'),
(42, 223, 'NM', 'New Mexico'),
(43, 223, 'NY', 'New York'),
(44, 223, 'NC', 'North Carolina'),
(45, 223, 'ND', 'North Dakota'),
(46, 223, 'MP', 'Northern Mariana Islands'),
(47, 223, 'OH', 'Ohio'),
(48, 223, 'OK', 'Oklahoma'),
(49, 223, 'OR', 'Oregon'),
(50, 223, 'PW', 'Palau'),
(51, 223, 'PA', 'Pennsylvania'),
(52, 223, 'PR', 'Puerto Rico'),
(53, 223, 'RI', 'Rhode Island'),
(54, 223, 'SC', 'South Carolina'),
(55, 223, 'SD', 'South Dakota'),
(56, 223, 'TN', 'Tennessee'),
(57, 223, 'TX', 'Texas'),
(58, 223, 'UT', 'Utah'),
(59, 223, 'VT', 'Vermont'),
(60, 223, 'VI', 'Virgin Islands'),
(61, 223, 'VA', 'Virginia'),
(62, 223, 'WA', 'Washington'),
(63, 223, 'WV', 'West Virginia'),
(64, 223, 'WI', 'Wisconsin'),
(65, 223, 'WY', 'Wyoming'),
(66, 38, 'AB', 'Alberta'),
(67, 38, 'BC', 'British Columbia'),
(68, 38, 'MB', 'Manitoba'),
(69, 38, 'NF', 'Newfoundland'),
(70, 38, 'NB', 'New Brunswick'),
(71, 38, 'NS', 'Nova Scotia'),
(72, 38, 'NT', 'Northwest Territories'),
(73, 38, 'NU', 'Nunavut'),
(74, 38, 'ON', 'Ontario'),
(75, 38, 'PE', 'Prince Edward Island'),
(76, 38, 'QC', 'Quebec'),
(77, 38, 'SK', 'Saskatchewan'),
(78, 38, 'YT', 'Yukon Territory'),
(79, 81, 'NDS', 'Niedersachsen'),
(80, 81, 'BAW', 'Baden-Wrttemberg'),
(81, 81, 'BAY', 'Bayern'),
(82, 81, 'BER', 'Berlin'),
(83, 81, 'BRG', 'Brandenburg'),
(84, 81, 'BRE', 'Bremen'),
(85, 81, 'HAM', 'Hamburg'),
(86, 81, 'HES', 'Hessen'),
(87, 81, 'MEC', 'Mecklenburg-Vorpommern'),
(88, 81, 'NRW', 'Nordrhein-Westfalen'),
(89, 81, 'RHE', 'Rheinland-Pfalz'),
(90, 81, 'SAR', 'Saarland'),
(91, 81, 'SAS', 'Sachsen'),
(92, 81, 'SAC', 'Sachsen-Anhalt'),
(93, 81, 'SCN', 'Schleswig-Holstein'),
(94, 81, 'THE', 'Thringen'),
(95, 14, 'WI', 'Wien'),
(96, 14, 'NO', 'Niedersterreich'),
(97, 14, 'OO', 'Obersterreich'),
(98, 14, 'SB', 'Salzburg'),
(99, 14, 'KN', 'K???nten'),
(100, 14, 'ST', 'Steiermark'),
(101, 14, 'TI', 'Tirol'),
(102, 14, 'BL', 'Burgenland'),
(103, 14, 'VB', 'Voralberg'),
(104, 204, 'AG', 'Aargau'),
(105, 204, 'AI', 'Appenzell Innerrhoden'),
(106, 204, 'AR', 'Appenzell Ausserrhoden'),
(107, 204, 'BE', 'Bern'),
(108, 204, 'BL', 'Basel-Landschaft'),
(109, 204, 'BS', 'Basel-Stadt'),
(110, 204, 'FR', 'Freiburg'),
(111, 204, 'GE', 'Genf'),
(112, 204, 'GL', 'Glarus'),
(113, 204, 'JU', 'Graubnden'),
(114, 204, 'JU', 'Jura'),
(115, 204, 'LU', 'Luzern'),
(116, 204, 'NE', 'Neuenburg'),
(117, 204, 'NW', 'Nidwalden'),
(118, 204, 'OW', 'Obwalden'),
(119, 204, 'SG', 'St. Gallen'),
(120, 204, 'SH', 'Schaffhausen'),
(121, 204, 'SO', 'Solothurn'),
(122, 204, 'SZ', 'Schwyz'),
(123, 204, 'TG', 'Thurgau'),
(124, 204, 'TI', 'Tessin'),
(125, 204, 'UR', 'Uri'),
(126, 204, 'VD', 'Waadt'),
(127, 204, 'VS', 'Wallis'),
(128, 204, 'ZG', 'Zug'),
(129, 204, 'ZH', 'Zrich'),
(130, 195, 'A Corua', 'A Corua'),
(131, 195, 'Alava', 'Alava'),
(132, 195, 'Albacete', 'Albacete'),
(133, 195, 'Alicante', 'Alicante'),
(134, 195, 'Almeria', 'Almeria'),
(135, 195, 'Asturias', 'Asturias'),
(136, 195, 'Avila', 'Avila'),
(137, 195, 'Badajoz', 'Badajoz'),
(138, 195, 'Baleares', 'Baleares'),
(139, 195, 'Barcelona', 'Barcelona'),
(140, 195, 'Burgos', 'Burgos'),
(141, 195, 'Caceres', 'Caceres'),
(142, 195, 'Cadiz', 'Cadiz'),
(143, 195, 'Cantabria', 'Cantabria'),
(144, 195, 'Castellon', 'Castellon'),
(145, 195, 'Ceuta', 'Ceuta'),
(146, 195, 'Ciudad Real', 'Ciudad Real'),
(147, 195, 'Cordoba', 'Cordoba'),
(148, 195, 'Cuenca', 'Cuenca'),
(149, 195, 'Girona', 'Girona'),
(150, 195, 'Granada', 'Granada'),
(151, 195, 'Guadalajara', 'Guadalajara'),
(152, 195, 'Guipuzcoa', 'Guipuzcoa'),
(153, 195, 'Huelva', 'Huelva'),
(154, 195, 'Huesca', 'Huesca'),
(155, 195, 'Jaen', 'Jaen'),
(156, 195, 'La Rioja', 'La Rioja'),
(157, 195, 'Las Palmas', 'Las Palmas'),
(158, 195, 'Leon', 'Leon'),
(159, 195, 'Lleida', 'Lleida'),
(160, 195, 'Lugo', 'Lugo'),
(161, 195, 'Madrid', 'Madrid'),
(162, 195, 'Malaga', 'Malaga'),
(163, 195, 'Melilla', 'Melilla'),
(164, 195, 'Murcia', 'Murcia'),
(165, 195, 'Navarra', 'Navarra'),
(166, 195, 'Ourense', 'Ourense'),
(167, 195, 'Palencia', 'Palencia'),
(168, 195, 'Pontevedra', 'Pontevedra'),
(169, 195, 'Salamanca', 'Salamanca'),
(170, 195, 'Santa Cruz de Tenerife', 'Santa Cruz de Tenerife'),
(171, 195, 'Segovia', 'Segovia'),
(172, 195, 'Sevilla', 'Sevilla'),
(173, 195, 'Soria', 'Soria'),
(174, 195, 'Tarragona', 'Tarragona'),
(175, 195, 'Teruel', 'Teruel'),
(176, 195, 'Toledo', 'Toledo'),
(177, 195, 'Valencia', 'Valencia'),
(178, 195, 'Valladolid', 'Valladolid'),
(179, 195, 'Vizcaya', 'Vizcaya'),
(180, 195, 'Zamora', 'Zamora'),
(181, 195, 'Zaragoza', 'Zaragoza');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `zczones_to_geo_zones`
-- 

CREATE TABLE `zczones_to_geo_zones` (
  `association_id` int(11) NOT NULL auto_increment,
  `zone_country_id` int(11) NOT NULL default '0',
  `zone_id` int(11) default NULL,
  `geo_zone_id` int(11) default NULL,
  `last_modified` datetime default NULL,
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  PRIMARY KEY  (`association_id`)
)   AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `zczones_to_geo_zones`
-- 

INSERT INTO `zczones_to_geo_zones` (`association_id`, `zone_country_id`, `zone_id`, `geo_zone_id`, `last_modified`, `date_added`) VALUES (1, 223, 18, 1, NULL, '2005-08-09 22:29:40');