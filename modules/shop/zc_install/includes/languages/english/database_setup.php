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
// $Id: database_setup.php 1399 2005-05-18 05:10:46Z drbyte $
//

  define('SAVE_DATABASE_SETTINGS', 'Save Database Settings');//this comes before TEXT_MAIN
  define('TEXT_MAIN', "Next we need to know some information on your database settings.  Please carefully enter each setting in the appropriate box and press <em>Save Database Settings</em> to continue.'");
  define('TEXT_PAGE_HEADING', 'Zen Cart&trade; Setup - Database Setup');
  define('DATABASE_INFORMATION', 'Database Information');
  define('DATABASE_TYPE', 'Database Type');
  define('DATABASE_TYPE_INSTRUCTION', 'Choose the database type to be used.');
  define('DATABASE_HOST', 'Database Host');
  define('DATABASE_HOST_INSTRUCTION', 'What is the database host?  The database host can be in the form of a host name, such as \'db1.myserver.com\', or as an IP-address, such as \'192.168.0.1\'.');
  define('DATABASE_USERNAME', 'Database Username');
  define('DATABASE_USERNAME_INSTRUCTION', 'What is the username used to connect to the database? An example username is \'root\'.');
  define('DATABASE_PASSWORD', 'Database Password');
  define('DATABASE_PASSWORD_INSTRUCTION', 'What is the password used to connect to the database?  The password is used together with the username, which forms your database user account.');
  define('DATABASE_NAME', 'Database Name');
  define('DATABASE_NAME_INSTRUCTION', 'What is the name of the database used to hold the data? An example database name is \'zencart\'. <!-- If the database is not found the database will be created.-->');
  define('DATABASE_PREFIX', 'Database Table-Prefix');
  define('DATABASE_PREFIX_INSTRUCTION', 'What is the prefix you would like used for database tables?  Example: zen_ Leave empty if no prefix is needed.');
  define('DATABASE_CREATE', 'Create Database?');
  define('DATABASE_CREATE_INSTRUCTION', 'Would you like Zen Cart to create the database?');
  define('DATABASE_CONNECTION', 'Persistent Connection');
  define('DATABASE_CONNECTION_INSTRUCTION', 'Would you like to enable persistent database connections?  Click \'no\' if you are unsure.');
  define('DATABASE_SESSION', 'Database Sessions');
  define('DATABASE_SESSION_INSTRUCTION', 'Do you want store your sessions in your database?  Click \'yes\' if you are unsure.');
  define('CACHE_TYPE', 'SQL Cache Method');
  define('CACHE_TYPE_INSTRUCTION', 'Select the method to use for SQL caching.');
  define('SQL_CACHE', 'Session/SQL Cache Directory');
  define('SQL_CACHE_INSTRUCTION', 'Enter the directory to used for File-based SQL Caching.');



  define('REASON_TABLE_ALREADY_EXISTS','Cannot create table %s because it already exists');
  define('REASON_TABLE_DOESNT_EXIST','Cannot drop table %s because it does not exist.');
  define('REASON_CONFIG_KEY_ALREADY_EXISTS','Cannot insert configuration_key "%s" because it already exists');
  define('REASON_COLUMN_ALREADY_EXISTS','Cannot ADD column %s because it already exists.');
  define('REASON_COLUMN_DOESNT_EXIST_TO_DROP','Cannot DROP column %s because it does not exist.');
  define('REASON_COLUMN_DOESNT_EXIST_TO_CHANGE','Cannot CHANGE column %s because it does not exist.');
  define('REASON_PRODUCT_TYPE_LAYOUT_KEY_ALREADY_EXISTS','Cannot insert prod-type-layout configuration_key "%s" because it already exists');
  define('REASON_INDEX_DOESNT_EXIST_TO_DROP','Cannot drop index %s on table %s because it does not exist.');
  define('REASON_PRIMARY_KEY_DOESNT_EXIST_TO_DROP','Cannot drop primary key on table %s because it does not exist.');
  define('REASON_INDEX_ALREADY_EXISTS','Cannot add index %s to table %s because it already exists.');
  define('REASON_PRIMARY_KEY_ALREADY_EXISTS','Cannot add primary key to table %s because a primary key already exists.');
  define('REASON_NO_PRIVILEGES','User %s@%s does not have %s privileges to database.');

?>