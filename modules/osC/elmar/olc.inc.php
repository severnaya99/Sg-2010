<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: olc.inc.php 64 2005-12-19 18:07:20Z Michael $

  Anpassungen fuer OL-Commerce http://www.ol-commerce.de/
*/

function tep_add_tax($x, $y) { return olc_add_tax($x, $y); }
function tep_db_fetch_array($x) { return olc_db_fetch_array($x); }
function tep_db_free_result($x) { olc_db_free_result($x); }
function tep_db_input($x) { return olc_db_input($x); }
function tep_db_num_rows($x) { return olc_db_num_rows($x); }
function tep_db_prepare_input($x) { return olc_db_prepare_input($x); }
function tep_db_query($x) { return olc_db_query($x); }
function tep_get_tax_rate($x, $y = -1, $z = -1) { return olc_get_tax_rate($x, $y, $z); }
function tep_href_link($a, $b, $c, $d) { return olc_href_link($a, $b, $c, $d); }
function tep_not_null($x) { return olc_not_null($x); }
function tep_session_is_registered($x) { return olc_session_is_registered($x); }
function tep_count_products_in_category($category_id, $include_inactive = false) {
  return olc_count_products_in_category($category_id, $include_inactive);
}

function tep_get_products_special_price($x) {
  if (function_exists('olc_get_products_special_price'))
    return olc_get_products_special_price($x);
  return FALSE;
}

function tep_calculate_tax($x, $y) { return olc_calculate_tax($x, $y); }

?>