<?php
/*
  $Id: gv_queue.php 56 2005-12-09 15:10:01Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 - 2003 osCommerce

  Gift Voucher System v1.0
  Copyright (c) 2001,2002 Ian C Wilson
  http://www.phesis.org

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Gutschein Freigabe Queue');

define('TABLE_HEADING_CUSTOMERS', 'Kunde');
define('TABLE_HEADING_ORDERS_ID', 'Bestell-Nr.');
define('TABLE_HEADING_VOUCHER_VALUE', 'Gutscheinwert');
define('TABLE_HEADING_DATE_PURCHASED', 'Bestelldatum');
define('TABLE_HEADING_ACTION', 'Aktion');

define('TEXT_REDEEM_COUPON_MESSAGE_HEADER', 'Sie haben soeben einen Gutschein in unserem Webshop bestellt.' . "\n"
                                          . 'Aus Sicherheitsgr�nden ist dieser Gutschein nicht sofort verf�gbar.' . "\n"
                                          . 'Sie k�nnen nun Ihren Gutschein verbuchen' . "\n"
                                          . 'und per E-Mail versenden' . "\n\n");

define('TEXT_REDEEM_COUPON_MESSAGE_AMOUNT', 'Der von Ihnen bestellte Gutschein hat einen Wert von %s' . "\n\n");

define('TEXT_REDEEM_COUPON_MESSAGE_BODY', '');
define('TEXT_REDEEM_COUPON_MESSAGE_FOOTER', '');
define('TEXT_REDEEM_COUPON_SUBJECT', 'Gutschein kaufen');?>
