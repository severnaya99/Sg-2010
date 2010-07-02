<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: osc.inc.php 64 2005-12-19 18:07:20Z Michael $
*/

# Anpassungen fuer osCommerce 2.2-MS3
# TODO Die Sprache wird nicht korrekt eingestellt.

if (!defined('SERVICE_DEBUG_OUTPUT_DB_QUERIES')) define('SERVICE_DEBUG_OUTPUT_DB_QUERIES', 'False');
#if (!defined('SERVICE_DEBUG_OUTPUT_DB_QUERIES')) define('SERVICE_DEBUG_OUTPUT_DB_QUERIES',
#  (basename($_SERVER['PHP_SELF']) != 'elmar_request.php' && basename($_SERVER['PHP_SELF']) != 'elmar_shopinfo.php') ? 'True' : 'False');

if (!defined('GZIP_COMPRESSION')) define('GZIP_COMPRESSION', 'False');

function tep_get_products_special_price($products_id) {
  // TODO Code kopieren
  return FALSE;
}

function tep_get_tax_rate($class_id) {
  // TODO Code kopieren
  return 16;
}

/*
function tep_count_products_in_category($category_id, $include_inactive = false) {
  // TODO Code kopieren
  return FALSE;
}
*/
?>