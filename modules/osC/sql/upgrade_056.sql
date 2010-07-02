# phpMyAdmin MySQL-Dump
# version 2.3.1
# http://www.phpmyadmin.net/ (download page)
#
# Host: localhost
# Generation Time: May 02, 2003 at 03:49 AM
# Server version: 3.23.52
# PHP Version: 4.2.3
# Database : `new_cc_gv`


INSERT INTO osc_configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES ('Gift Coupon for new customers', 'NEW_SIGNUP_GIFT_VOUCHER_AMOUNT', '0', 'Gift coupon for new customers<br><br>Mettre 0 for none<br>', 1, 31, NULL, '2003-12-05 05:01:41', NULL, NULL);

INSERT INTO osc_configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES ('Discount Coupon for new customers', 'NEW_SIGNUP_DISCOUNT_COUPON', '', 'Discount coupon for new customers.<br><br>Worth of discount coupon<BR>', 1, 32, NULL, '2003-12-05 05:01:41', NULL, NULL);



#
# Table structure for table `coupon_email_track`
#

CREATE TABLE osc_coupon_email_track (
  unique_id int(11) NOT NULL auto_increment,
  coupon_id int(11) NOT NULL default '0',
  customer_id_sent int(11) NOT NULL default '0',
  sent_firstname varchar(32) default NULL,
  sent_lastname varchar(32) default NULL,
  emailed_to varchar(32) default NULL,
  date_sent datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (unique_id)
) TYPE=MyISAM;


#
# Table structure for table `coupon_gv_customer`
#

CREATE TABLE osc_coupon_gv_customer (
  customer_id int(5) NOT NULL default '0',
  amount decimal(8,4) NOT NULL default '0.0000',
  PRIMARY KEY  (customer_id),
  KEY customer_id (customer_id)
) TYPE=MyISAM;


#
# Table structure for table `coupon_gv_queue`
#

CREATE TABLE osc_coupon_gv_queue (
  unique_id int(5) NOT NULL auto_increment,
  customer_id int(5) NOT NULL default '0',
  order_id int(5) NOT NULL default '0',
  amount decimal(8,4) NOT NULL default '0.0000',
  date_created datetime NOT NULL default '0000-00-00 00:00:00',
  ipaddr varchar(32) NOT NULL default '',
  release_flag char(1) NOT NULL default 'N',
  PRIMARY KEY  (unique_id),
  KEY uid (unique_id,customer_id,order_id)
) TYPE=MyISAM;


#
# Table structure for table `coupon_redeem_track`
#

CREATE TABLE osc_coupon_redeem_track (
  unique_id int(11) NOT NULL auto_increment,
  coupon_id int(11) NOT NULL default '0',
  customer_id int(11) NOT NULL default '0',
  redeem_date datetime NOT NULL default '0000-00-00 00:00:00',
  redeem_ip varchar(32) NOT NULL default '',
  order_id int(11) NOT NULL default '0',
  PRIMARY KEY  (unique_id)
) TYPE=MyISAM;


#
# Table structure for table `coupons`
#

CREATE TABLE osc_coupons (
  coupon_id int(11) NOT NULL auto_increment,
  coupon_type char(1) NOT NULL default 'F',
  coupon_code varchar(32) NOT NULL default '',
  coupon_amount decimal(8,4) NOT NULL default '0.0000',
  coupon_minimum_order decimal(8,4) NOT NULL default '0.0000',
  coupon_start_date datetime NOT NULL default '0000-00-00 00:00:00',
  coupon_expire_date datetime NOT NULL default '0000-00-00 00:00:00',
  uses_per_coupon int(5) NOT NULL default '1',
  uses_per_user int(5) NOT NULL default '0',
  restrict_to_products varchar(255) default NULL,
  restrict_to_categories varchar(255) default NULL,
  restrict_to_customers text,
  coupon_active char(1) NOT NULL default 'Y',
  date_created datetime NOT NULL default '0000-00-00 00:00:00',
  date_modified datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (coupon_id)
) TYPE=MyISAM;


#
# Table structure for table `coupons_description`
#

CREATE TABLE osc_coupons_description (
  coupon_id int(11) NOT NULL default '0',
  language_id int(11) NOT NULL default '0',
  coupon_name varchar(32) NOT NULL default '',
  coupon_description text,
  KEY coupon_id (coupon_id)
) TYPE=MyISAM;

# xosC features
#
# Table structure for table `customer_groups`
#

CREATE TABLE osc_customer_group (
  customer_group_id int(11) NOT NULL auto_increment,
  customer_group_name varchar(50),
  customer_group_shipping text NOT NULL ,
  customer_group_payment text NOT NULL ,
  customer_group_description text,
  customer_group_tax int(1),
  customer_group_fsk18 int(1),
  customer_group_display_tax int(1),
  customer_group_display_shipment int(1),
  PRIMARY KEY customer_group_id  (customer_group_id )
) TYPE=MyISAM;
INSERT INTO osc_customer_group (customer_group_id,customer_group_name,customer_group_shipping,customer_group_payment,customer_group_description,customer_group_tax,customer_group_fsk18,customer_group_display_tax,customer_group_display_shipment) VALUES (1,'Standard','all.php','all.php','Standard installing group with all rights',1,1,1,1);

ALTER TABLE `osc_products` ADD `products_fsk18` int (1) NOT NULL ;
ALTER TABLE `osc_customers` ADD `customers_group_id` int (11) NOT NULL ;
ALTER TABLE `osc_categories` ADD `categories_status` int (1) NOT NULL ;
ALTER TABLE `osc_products_description` ADD `short_description` varchar(255) NOT NULL ;
ALTER TABLE `osc_categories_description` ADD `short_description` varchar(255) NOT NULL ;
update `osc_customers` set customers_group_id = 1;
