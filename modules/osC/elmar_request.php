<?php
/**
 * Das Elm@r-Modul fuer osCommerce
 * Unterstuetzung des shopinfo.xml-Standards
 * http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
 * Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
 * Released under the GNU General Public License
 * $Id: elmar_request.php 116 2006-01-21 16:15:40Z Michael $
 * adapted 2005 for xoops by FlinkUX <htt://www.flinkux.de>
 * @package xosC
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
**/

ob_start();  // Unerwuenschte Ausgaben puffern, damit vor dem XML-Dokument nichts steht.

// Workaround fuer Vista Nova Platin Edition RC2
if (!isset($_GET['keywords'])) $_GET['keywords'] = '';

require('elmar_config.inc.php');
require(ELMAR_PATH.'elmar.inc.php');

/**
 * for xosC
**/
include(DIR_WS_CLASSES."product.php");
// Alle Includes hier, wegen der Pfadangabe. Reihenfolge ist relevant!
require(ELMAR_PATH.'tools/pear.php');
require(ELMAR_PATH.'tools/node.php');
require(ELMAR_PATH.'tools/parser.php');
require(ELMAR_PATH.'tools/tree.php');

// Im $requestArray werden die Werte fuer die Protokolldateien gesammelt.

if (isset($_REQUEST['p_brand']) && !empty($_REQUEST['p_brand'])) {
  $new_brand = $_REQUEST['p_brand'];
  $requestArray['Hersteller'] = $new_brand;
} else {
  $new_brand = '';
  $requestArray['Hersteller'] = NO_LOG_VALUE;
}

if (isset($_REQUEST['p_product']) && !empty($_REQUEST['p_product'])) {
  $new_product = $_REQUEST['p_product'];
  $requestArray['Produktname'] = $new_product;
} else {
  $new_product = '';
  $requestArray['Produktname'] = NO_LOG_VALUE;
}

if (isset($_REQUEST['p_desc']) && !empty($_REQUEST['p_desc'])) {
  $new_desc = $_REQUEST['p_desc'];
  $requestArray['Beschreibung'] = $new_desc;
} else {
  $new_desc = '';
  $requestArray['Beschreibung'] = NO_LOG_VALUE;
}

if (isset($_REQUEST['p_qs']) && !empty($_REQUEST['p_qs'])) {
  $new_qs = $_REQUEST['p_qs'];
  $requestArray['Schnellsuche'] = $new_qs;
} else {
  $new_qs = '';
  $requestArray['Schnellsuche'] = NO_LOG_VALUE;
}

if (isset($_REQUEST['p_low']) && !empty($_REQUEST['p_low'])) {
  $new_low = $currency_rate * (double)$_REQUEST['p_low'];
  $requestArray['Preisuntergrenze'] = $new_low;
} else {
  $new_low = '';
  $requestArray['Preisuntergrenze'] = NO_LOG_VALUE;
}

if (isset($_REQUEST['p_high']) && !empty($_REQUEST['p_high'])) {
  $new_high = $currency_rate * (double)$_REQUEST['p_high'];
  $requestArray['Preisobergrenze'] = $new_high;
} else {
  $new_high = '';
  $requestArray['Preisobergrenze'] = NO_LOG_VALUE;
}

if (isset($_REQUEST['p_size']) && !empty($_REQUEST['p_size'])) {
  $new_size = (int)$_REQUEST['p_size'];
  $requestArray['Anzahl'] = $new_size;}
else {
  $new_size = '';
  $requestArray['Anzahl'] = NO_LOG_VALUE;
}

if (isset($_REQUEST['p_ip']) && !empty($_REQUEST['p_ip'])) {
  $new_ip = $_REQUEST['p_ip'];
  $requestArray['UserIP'] = $new_ip;
} else {
  $new_ip = '';
  $requestArray['UserIP'] = NO_LOG_VALUE;
}

if (isset($_REQUEST['p_id']) && !empty($_REQUEST['p_id'])) {
	$new_id = $_REQUEST['p_id'];
	$requestArray['ID'] = $new_id;
} else {
	$new_id = '';
	$requestArray['ID'] = NO_LOG_VALUE;
}

if (isset($_REQUEST['p_ean']) && !empty($_REQUEST['p_ean'])) {
	$new_ean = $_REQUEST['p_ean'];
	$requestArray['EAN'] = $new_ean;
} else {
	$new_ean = '';
	$requestArray['EAN'] = NO_LOG_VALUE;
}

if (isset($_REQUEST['p_isbn']) && !empty($_REQUEST['p_isbn'])) {
	$new_isbn = $_REQUEST['p_isbn'];
	$requestArray['ISBN'] = $new_isbn;
} else {
	$new_isbn = '';
	$requestArray['ISBN'] = NO_LOG_VALUE;
}

if (isset($_REQUEST['trace']) && !empty($_REQUEST['trace'])) {
  $trace = $_REQUEST['trace'];
  $requestArray['trace'] = $trace;
  $trace = ($trace == 'on');
} else {
  $requestArray['trace'] = NO_LOG_VALUE;
  $trace = false;
}

// Bei debug=on wird ggf. ein Debug-Tag mit unerwünschtem Content eingefügt
$debug = isset($_REQUEST['debug']) && $_REQUEST['debug'] == 'on';

$requestArray['HTTP_REFERER'] = empty($_SERVER['HTTP_REFERER']) ? NO_LOG_VALUE : $_SERVER['HTTP_REFERER'];
$requestArray['HTTP_USER_AGENT'] = empty($_SERVER['HTTP_USER_AGENT']) ? NO_LOG_VALUE : $_SERVER['HTTP_USER_AGENT'];
$requestArray['HTTP_FROM'] = empty($_SERVER['HTTP_FROM']) ? NO_LOG_VALUE : $_SERVER['HTTP_FROM'];
$requestArray['REMOTE_ADDR'] = empty($_SERVER['REMOTE_ADDR']) ? NO_LOG_VALUE : $_SERVER['REMOTE_ADDR'];

if (!headers_sent()) {
  if (defined('POWEREDBY')) header('X-Powered-By: '.POWEREDBY, FALSE);
  header('Content-Type: application/xml; charset=ISO-8859-1');
}

if ($_SERVER['REQUEST_METHOD'] == 'HEAD') {
  $requestArray['counter'] = 'HEAD';
  requestLog($requestArray);
	ob_end_flush();
  exit;
}


// Kein TRACE und alle Suchparameter leer? -> Fehler
if (!$trace && empty($new_brand) && empty($new_product) && empty($new_desc) && empty($new_qs) && empty($new_id)
		&& (!defined('ELMAR_PRODUCTS_EAN_FIELD') || empty($new_ean))
		&& (!defined('ELMAR_PRODUCTS_ISBN_FIELD') || empty($new_isbn))) {
  // damit allein laesst sich nicht sinnvoll suchen: empty($new_low) && empty($new_high) && empty($new_size)
  write_error(1301, $requestArray);
}

$tree = & xml_header();
$root = & $tree->getRoot();

if ($trace) {
  if ($_SERVER['REQUEST_METHOD']=='GET')
    $params = $_GET;
  else if ($_SERVER['REQUEST_METHOD']=='POST')
    $params = $_POST;
  else
    $params = $_REQUEST;  // Beinhaltet auch Cookies!

  $first = true;
  $output = '';
  foreach ($params as $key => $value) {
    if ($first) $first = false; else $output .= '&';
    $output .= htmlspecialchars($key).'='.htmlspecialchars($value);
  }

  $xml_debug = & $root->addChild('Debug', $output);

  send($tree, $requestArray);
}

###########################################################################

// Parameter fuer Preisgrenzen auswerten
if (!empty($new_low)) {
  if (!empty($new_high) and !empty($new_low) and ($new_high < $new_low)) {
    write_error(1302, $requestArray);
  }
  $pfrom = $new_low;
}

if (!empty($new_high)) {
  $pto = $new_high;
}

##############################

// Entweder Schnellsuche oder erweiterte Suche mit mehreren Begriffen
if (!empty($new_qs)) {  // Schnellsuche
  $new_qs = strtolower(trim($new_qs));
  $new_qs = preg_replace('/[\s]+/',' and ', $new_qs);
  $search_keywords = preg_split('/[\s]+/', $new_qs, '-1', 'PREG_SPLIT_NO_EMPTY');
} else {
  if (!empty($new_product)) { // Produkt
    $new_product = strtolower(trim($new_product));
    $new_product = preg_replace('/[\s]+/',' and ', $new_product);
    $search_product = preg_split('/[\s]+/', $new_product, '-1', 'PREG_SPLIT_NO_EMPTY');
  }
  if (!empty($new_brand)) { // Hersteller
    $new_brand = strtolower(trim($new_brand));
    $new_brand = preg_replace('/[\s]+/',' and ', $new_brand);
    $search_brand = preg_split('/[\s]+/', $new_brand, '-1', 'PREG_SPLIT_NO_EMPTY');
  }
  if (!empty($new_desc)) {   // Beschreibung
    $new_desc = strtolower(trim($new_desc));
    $new_desc = preg_replace('/[\s]+/',' and ', $new_desc);
    $search_desckeywords = preg_split('/[\s]+/', $new_desc, '-1', 'PREG_SPLIT_NO_EMPTY');
  }
  if (!empty($new_id)) {   // ID
    $new_id = trim($new_id);
    $search_id = $new_id;
  }
  if (!empty($new_ean)) {   // EAN, evtl. noch pruefen
    $new_ean = trim($new_ean);
    $search_ean = $new_ean;
  }
  if (!empty($new_isbn)) {   // ISBN, evtl. noch pruefen
    $new_isbn = trim($new_isbn);
    $search_isbn = $new_isbn;
  }
}

// Alle Felder und nicht nur ausgewaehlte beruecksichtigen!
$select_column_list = '';
$select_column_list .= 'p.products_model, ';
$select_column_list .= 'p.products_quantity, ';
$select_column_list .= 'p.products_image, ';
#$select_column_list .= 'p.products_weight, ';
if (ELMAR_FSK_18) $select_column_list .= 'p.products_fsk_18, ';
if (defined('ELMAR_PRODUCTS_EAN_FIELD')) $select_column_list .= 'p.'.ELMAR_PRODUCTS_EAN_FIELD.', ';
if (defined('ELMAR_PRODUCTS_ISBN_FIELD')) $select_column_list .= 'p.'.ELMAR_PRODUCTS_ISBN_FIELD.', ';

#####################################################################################
// Start des Codes aus advanced_search_result.php

  $select_str = "select distinct " . $select_column_list . " m.manufacturers_name, p2.".ELMAR_PRODUCTS_DESCRIPTION_FIELD.", m.manufacturers_id, p.products_id, p.products_status, pd.products_name, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price ";

  if (  ( (!empty($pfrom)) || (!empty($pto)) ) ) {
    $select_str .= ", SUM(tr.tax_rate) as tax_rate ";
  }

  if (defined('TABLE_PRODUCTS_EXTRA_FIELDS')) {
    // Unterstuetzung fuer "Product Extra Fields"
    $from_str = "from (" . TABLE_PRODUCTS . " p left join " . TABLE_PRODUCTS_TO_PRODUCTS_EXTRA_FIELDS . " p2pef on p.products_id=p2pef.products_id) left join " . TABLE_MANUFACTURERS . " m on m.manufacturers_id=p.manufacturers_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd left join " . TABLE_SPECIALS . " s on pd.products_id = s.products_id, " . TABLE_CATEGORIES . " c, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, ". TABLE_PRODUCTS_DESCRIPTION . " p2 ";
  } else {
    $from_str = "from " . TABLE_PRODUCTS . " p left join " . TABLE_MANUFACTURERS . " m using(manufacturers_id), " . TABLE_PRODUCTS_DESCRIPTION . " pd left join " . TABLE_SPECIALS . " s on pd.products_id = s.products_id, " . TABLE_CATEGORIES . " c, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, ". TABLE_PRODUCTS_DESCRIPTION . " p2 ";
  }

  if ( (DISPLAY_PRICE_WITH_TAX == 'true') && ( (!empty($pfrom) ) || (!empty($pto)) )) {
    if (!tep_session_is_registered('customer_country_id')) {
      $customer_country_id = STORE_COUNTRY;

      $customer_zone_id = STORE_ZONE;
    }
    $from_str .= " left join " . TABLE_TAX_RATES . " tr on p.products_tax_class_id = tr.tax_class_id left join " . TABLE_ZONES_TO_GEO_ZONES . " gz on tr.tax_zone_id = gz.geo_zone_id and (gz.zone_country_id is null or gz.zone_country_id = '0' or gz.zone_country_id = '" . (int)$customer_country_id . "') and (gz.zone_id is null or gz.zone_id = '0' or gz.zone_id = '" . (int)$customer_zone_id . "')";
  }

  $where_str = " where p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' and p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and p2.products_id = p.products_id and p2.language_id = '" . (int)$languages_id . "'";

// Ende des Codes aus advanced_search_result.php
#####################################################################################

  if (NUR_AB_LAGER) $where_str .= ' AND p.products_status > 0';
  if (NUR_POSITIVE_ANZAHL) $where_str .= ' AND p.products_quantity > 0';
  if (ELMAR_FSK_18) $where_str .= ' AND p.products_fsk_18 = 0';

#####################################################################################
// Ein Codeblock aus advanced_search_result.php,
// der hier wiederholt fuer die einzelnen Sucharten benutzt wird.

// ID
  if (isset($search_id) && (sizeof($search_id) > 0)) {
    $where_str .= " and (p.products_id='".tep_db_prepare_input($search_id)."')";
  }

// EAN
  if (defined('ELMAR_PRODUCTS_EAN_FIELD') && isset($search_ean) && (sizeof($search_ean) > 0)) {
    $where_str .= " and (p.".ELMAR_PRODUCTS_EAN_FIELD."='".tep_db_prepare_input($search_ean)."')";
  }

// ISBN
  if (defined('ELMAR_PRODUCTS_ISBN_FIELD') && isset($search_isbn) && (sizeof($search_isbn) > 0)) {
    $where_str .= " and (p.".ELMAR_PRODUCTS_ISBN_FIELD."='".tep_db_prepare_input($search_isbn)."')";
  }

//Schnellsuche
  if (isset($search_keywords) && (sizeof($search_keywords) > 0)) {
    $where_str .= " and (";
    for ($i=0, $n=sizeof($search_keywords); $i<$n; $i++ ) {
      switch ($search_keywords[$i]) {
        case 'and':
          $where_str .= " " . $search_keywords[$i] . " ";
          break;
        default:
          $keyword = tep_db_prepare_input($search_keywords[$i]);
          $where_str .= "(pd.products_name like '%" . tep_db_input($keyword) . "%' or p.products_model like '%" . tep_db_input($keyword) . "%' or m.manufacturers_name like '%" . tep_db_input($keyword) . "%'";

          if (defined('TABLE_PRODUCTS_EXTRA_FIELDS')) {
            // Unterstuetzung fuer "Product Extra Fields"
            $where_str .= " or p2pef.products_extra_fields_value like '%" . tep_db_input($keyword) . "%'";
          }

          #if (isset($HTTP_GET_VARS['search_in_description']) && ($HTTP_GET_VARS['search_in_description'] == '1')) $where_str .= " or pd.".ELMAR_PRODUCTS_DESCRIPTION_FIELD." like '%" . tep_db_input($keyword) . "%'";
          $where_str .= ')';

          break;
      }
    }
    $where_str .= " )";
  }


// Produktbezeichnung
  if (isset($search_product) && (sizeof($search_product) > 0)) {
    $where_str .= " and (";
    for ($i=0, $n=sizeof($search_product); $i<$n; $i++ ) {
      switch ($search_product[$i]) {
        case 'and':
          $where_str .= " " . $search_product[$i] . " ";
          break;
        default:
          $s_product = tep_db_prepare_input($search_product[$i]);
          $where_str .= "(pd.products_name like '%" . tep_db_input($s_product) . "%'";
          $where_str .= ')';
          break;
      }
    }
    $where_str .= " )";
  }


// Hersteller
  if (isset($search_brand) && (sizeof($search_brand) > 0)) {
    $where_str .= " and (";
    for ($i=0, $n=sizeof($search_brand); $i<$n; $i++ ) {
      switch ($search_brand[$i]) {
        case 'and':
          $where_str .= " " . $search_brand[$i] . " ";
          break;
        default:
          $s_brand = tep_db_prepare_input($search_brand[$i]);
          $where_str .= "(m.manufacturers_name like '%" . tep_db_input($s_brand) . "%'";
          $where_str .= ')';
          break;
      }
    }
    $where_str .= " )";
  }


// Beschreibung
  if (isset($search_desckeywords) && (sizeof($search_desckeywords) > 0)) {
    $where_str .= " and (";
    for ($i=0, $n=sizeof($search_desckeywords); $i<$n; $i++ ) {
      switch ($search_desckeywords[$i]) {
        case 'and':
          $where_str .= " " . $search_desckeywords[$i] . " ";
          break;
        default:
          $desckeyword = tep_db_prepare_input($search_desckeywords[$i]);
          $where_str .= "(pd.".ELMAR_PRODUCTS_DESCRIPTION_FIELD." like '%" . tep_db_input($desckeyword) . "%'";

          if (defined('TABLE_PRODUCTS_EXTRA_FIELDS')) {
            // Unterstuetzung fuer "Product Extra Fields"
            $where_str .= " or p2pef.products_extra_fields_value like '%" . tep_db_input($desckeyword) . "%'";
          }

          $where_str .= ')';
          break;
      }
    }
    $where_str .= " )";
  }

// Naechster Codeblock aus advanced_search_result.php
// aber tep_not_null durch !empty ersetzt
    if (isset($pfrom) and ($pfrom > 0)) $where_str .= " and (IF(s.status, s.specials_new_products_price, p.products_price) * if(gz.geo_zone_id is null, 1, 1 + (tr.tax_rate / 100) ) >= " . (double)$pfrom . ")";
    if (isset($pto) and ($pto > 0)) $where_str .= " and (IF(s.status, s.specials_new_products_price, p.products_price) * if(gz.geo_zone_id is null, 1, 1 + (tr.tax_rate / 100) ) <= " . (double)$pto . ")";

  if ( (!empty($pfrom) || !empty($pto)) ) {
    $where_str .= " group by p.products_id, tr.tax_priority";
  }

// Ende des Codeblocks aus advanced_search_result.php

  $listing_sql = $select_str . $from_str . $where_str;

// Zaehler fuer die Anzahl der Produkte, die zurueckgegeben wird
$c_size = MAX_ITEMS;
if (!empty($new_size)) {
  if ($new_size <= 0)
    write_error(1303, $requestArray);
  if ($new_size < MAX_ITEMS)
    $c_size = $new_size;
}

// TODO: Tabelarische u.a. Versandkosten werden (noch) nicht beruecksichtigt.
// Siehe auch elmar_products.php!
$free_shipping = (defined('MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING') && MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING == 'true');
$shipping_flat_status = (defined('MODULE_SHIPPING_FLAT_STATUS') && MODULE_SHIPPING_FLAT_STATUS == 'True');
if ($shipping_flat_status) {
  // Standard: Flat-Preis ist netto. Bei Brutto Shops muss MwSt addiert werden, sonst nicht.
  // [Ein Beitrag von Kai Schulz]
    $shipping_flat_cost = tep_add_tax(MODULE_SHIPPING_FLAT_COST, tep_get_tax_rate(MODULE_SHIPPING_FLAT_TAX_CLASS, STORE_COUNTRY, MODULE_SHIPPING_FLAT_ZONE));
}

$partner_id = false;
if (isset($partner_ids)) {
  if (isset($_SERVER['HTTP_USER_AGENT']) && isset($partner_ids[$_SERVER['HTTP_USER_AGENT']])) {
    $partner_id = $partner_ids[$_SERVER['HTTP_USER_AGENT']];
  } else if (isset($_SERVER['REMOTE_ADDR']) && isset($partner_ids[$_SERVER['REMOTE_ADDR']])) {
    $partner_id = $partner_ids[$_SERVER['REMOTE_ADDR']];
  }
}

$item_counter = 0;
$result = tep_db_query($listing_sql);

while(($product_info = tep_db_fetch_array($result)) && ($item_counter < $c_size)) {
    /**
     * Preis und Steuer
     */
/**
 * xosC specific
**/
   $sproduct=new product($product_info['products_id']);
    //Sonderpreis beruecksichtigen
    if ($new_price = tep_get_products_special_price($product_info['products_id'])){
      $product_info_price = $new_price;
      $specialPrice = 'yes';
    }else{
      $product_info_price = $product_info['products_price'];
      $specialPrice = 'no';
    }

    if (NUR_POSITIVER_PREIS && $product_info_price <= 0) continue;

    ++$item_counter;
    $tax_rate = tep_get_tax_rate($product_info['products_tax_class_id']);
    $tax = tep_calculate_tax($product_info_price, $tax_rate) * $currency_rate;
    $product_info_price = tep_add_tax($product_info_price, $tax_rate) * $currency_rate;

    /**
     * Beschreibung
     */
    $description = sk_strip_tags_and_entities($product_info[ELMAR_PRODUCTS_DESCRIPTION_FIELD]);

    if (ELMAR_PRODUCT_DESCRIPTION_MAX_LENGTH > 0)
      $description = substr($description, 0, ELMAR_PRODUCT_DESCRIPTION_MAX_LENGTH-3).'...';

    $longDescription = $description;

    // Modell
    $model = $product_info['products_model'];

    $shortDescription = (!empty($model) ? $model.': ' : '').$description;
    if (strlen($shortDescription) > 255) {
      $decr = 251;
      while ($decr >= 0 && $shortDescription[$decr] != ' ') {
        --$decr;
      }
      $shortDescription = substr($shortDescription, 0, $decr).' ...';
    }

    // Produktname
    $name = sk_strip_tags_and_entities($product_info['products_name']);

    // Hersteller
    $brand = $product_info['manufacturers_name'];

    // ProduktID
    $prod_id = $product_info['products_id'];

    // Kategorie
    $type = sk_generate_category_path($prod_id);
    $type = KategorieAnpassen($type);
    $type = sk_strip_tags_and_entities($type);

    // Lieferbarkeit "ab Lager" oder "auf Anfrage" entsprechend types.xsd
    if ($product_info[LIEFERBARKEIT_FELDNAME] > 0) {
      $lieferbarkeit = 'from stock';
      $lieferzeit = LIEFERZEIT_AB_LAGER;
    } else {
      $lieferbarkeit = '';  // Lieferbarkeit unbekannt
      $lieferzeit = '';  // Lieferzeit unbekannt
    }

    $id_array = array("shopId" => (PROD_ID_IST_ARTIKELNUMMER ? $prod_id : $model));
		if (defined('ELMAR_PRODUCTS_EAN_FIELD')) {
			$ean = $product_info[ELMAR_PRODUCTS_EAN_FIELD];
			$ean_len = strlen($ean);
			if ($ean_len == 8 || $ean_len == 13 || $ean_len == 14) {
				$id_array["ean"] = $ean;
			}
		}
		if (defined('ELMAR_PRODUCTS_ISBN_FIELD')) {
			$isbn = $product_info[ELMAR_PRODUCTS_ISBN_FIELD];
			$isbn_len = strlen($isbn);
			if ($isbn_len == 9 || $isbn_len == 13) { // ohne oder mit Bindestrichen
	      $id_array["isbn"] = $product_info[ELMAR_PRODUCTS_ISBN_FIELD];
			}
		}
    $xml_item = & $root->addChild("Item", NULL, $id_array);
      $xml_name = & $xml_item->addChild("Name", $name);
      $xml_brand = & $xml_item->addChild("Brand", $brand);
      $xml_type = & $xml_item->addChild("Type", $type);
      #$xml_short = & $xml_item->addChild("ShortDescription", $shortDescription);
      #$xml_short = & $xml_item->addChild("ShortDescription", $shortDescription, null, null, true);  // CDATA
      $xml_long = & $xml_item->addChild("LongDescription", $longDescription, null, null, true);  // CDATA

			if (ELMAR_SEO_URLS)
				$productinfopage = tep_href_link(FILENAME_PRODUCT_INFO, 'products_id='.$prod_id, 'NONSSL', false, true);
			else
				$productinfopage = PRODUCTINFOPAGE.$prod_id;
			if ($partner_id) $productinfopage .= $partner_id;
			if (defined('AFFILIATES_ID_FIND')) $productinfopage .= AFFILIATES_ID_FIND;
			if (defined('LINK_AMP_BUG')) $productinfopage = str_replace('&amp;', '&', $productinfopage);
      $xml_url = & $xml_item->addChild("ProductUrl", $productinfopage);

    # TODO Bildgroesse wie in elmar_products bestimmen und ausgeben. Dazu das XML-Schema products.xsd erweitern.
    $prodimg = $sproduct->get_image();
    $thumbnail = $sproduct->get_image();
    if (defined('NO_IMAGE_NAME') && $prodimg == NO_IMAGE_NAME) {
      $prodimg = '';
      $thumbnail = '';
    } else if (!empty($prodimg) && !ereg('^https?:', $prodimg)) {
      $prodimg = $sproduct->get_image_path().$prodimg;
      if (defined('THUMBNAIL_PATH')) $thumbnail = THUMBNAIL_PATH.$thumbnail;
    }

    if (!empty($prodimg)) {
      $xml_add = & $xml_item->addChild("AdditionalResources");
        $xml_res = & $xml_add->addChild("Resource");
            $xml_purp = & $xml_res->addChild("Purpose", "image");
            $xml_iurl = & $xml_res->addChild("Url", $prodimg);
            //$xml_mime = & $xml_res->addChild("MimeType", "image/gif");
      if (defined('THUMBNAIL_PATH')) {
        $xml_res = & $xml_add->addChild("Resource");
            $xml_purp = & $xml_res->addChild("Purpose", "thumbnail");
            $xml_iurl = & $xml_res->addChild("Url", $thumbnail);
            //$xml_mime = & $xml_res->addChild("MimeType", "image/gif");
      }
    }

    $xml_pricedet = & $xml_item->addChild("PriceDetails", NULL, array("type" => (DISPLAY_PRICE_WITH_TAX == 'true') ? "withTax" : "withoutTax"));
      $xml_price = & $xml_pricedet->addChild("Price", NULL, array("special" => $specialPrice));
        $xml_quant = & $xml_price->addChild("Quantity", '1');
        $xml_amount = & $xml_price->addChild("Amount", number_format($product_info_price, 2, '.', ''));
        $xml_tax = & $xml_price->addChild("Tax", number_format($tax, 2, '.', ''));

    $xml_deliver = & $xml_item->addChild("DeliveryDetails");
      if (!empty($lieferbarkeit))
        $xml_deliverable = & $xml_deliver->addChild("Deliverable", $lieferbarkeit);

      $xml_option = & $xml_deliver->addChild("Option", NULL, array("type" => "normal"));
        if ($free_shipping && $product_info_price >= MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING_OVER) {
          $xml_cost = & $xml_option->addChild("Cost", '0.00');
        } else if ($shipping_flat_status) {
          $xml_cost = & $xml_option->addChild("Cost", number_format($shipping_flat_cost * $currency_rate, 2, '.', ''));
        } else if (VERSANDKOSTEN_AB != '') {
          $xml_cost = & $xml_option->addChild("Cost", number_format((double)VERSANDKOSTEN_AB * $currency_rate, 2, '.', ''));
        }
        if (!empty($lieferzeit))
          $xml_duration = & $xml_option->addChild("Duration", $lieferzeit);

    //$xml_discount = & $xml_item->addChild("SpecialDiscount");

    //$xml_warranty = & $xml_item->addChild("Warranty");

} //endwhile

$requestArray['counter'] = $item_counter;

$root->setAttribute('complete', $product_info === FALSE ? 'yes' : 'no');

send($tree, $requestArray);

#####################################################

function xml_header($complete = 'yes') {
  global $currency, $language_code;

  $attributes = '1.0" encoding="ISO-8859-1';
  $tree = new XML_Tree(NULL, $attributes);

	if (ELMAR_NEW_SHOPINFO_XML) {
		$array = array('xmlns' => 'http://elektronischer-markt.de/schema/products-2.0',
									 'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
									 'xsi:schemaLocation' => 'http://elektronischer-markt.de/schema/products-2.0 '.ELMAR_SCHEMA_BASE_URL.'products-2.0.xsd',
									 'version' => '2.0');
    $root = & $tree->addRoot('ProductList', NULL, $array);
	} else {
		$array = array('xmlns:osp' => 'http://elektronischer-markt.de/schema',
									 'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
									 'xsi:schemaLocation' => 'http://elektronischer-markt.de/schema '.ELMAR_SCHEMA_BASE_URL.'products.xsd');
    $root = & $tree->addRoot('osp:ProductList', NULL, $array);
	}

	$common = & $root->addChild('Common');
		$xml_version = & $common->addChild('Version', ELMAR_NEW_SHOPINFO_XML ? '2.0' : '1.1');
		$xml_language = & $common->addChild('Language', $language_code);
		$xml_currency = & $common->addChild('Currency', $currency);
  if (ELMAR_NEW_SHOPINFO_XML)
    $xml_generator = & $common->addChild('Generator',
      'Elm@r-Modul osCommerce/'.MODUL_VERSION.'.'.MODUL_SUBVERSION.' (http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce)');

  return $tree;
}

// Error - Tag
function write_error($errorCode, $requestArray) {
  $tree = & xml_header();
  $root = & $tree->getRoot();

    $xml_error = & $root->addChild('Error');
      $errorDescription = errorDescription($errorCode);
      $xml_errorCode = & $xml_error->addChild('Code', $errorCode);
      $xml_errorDescription = & $xml_error->addChild('Description', $errorDescription);

  send($tree, $requestArray);
}

/**
 * Protokoliert die Echtzeitanfragen gemaess Einstellung gar nicht, als Text- oder HTML-Datei
 * @param requestArray Feld mit den Echtzeitparametern und den HEADER-Parametern
 */
function requestLog($requestArray) {
  global $languages_id, $language_code, $currency, $currency_rate;

  if (empty($requestArray) || !WRITE_REQUESTLOG)
    return;  // keine Protokollierung

  if (!isset($requestArray['counter']))
    $requestArray['counter'] = NO_LOG_VALUE;
  if (!isset($requestArray['length']))
    $requestArray['length'] = NO_LOG_VALUE;
  else {
		// Die Anzahl der Bytes wird deutsch formatiert, d.h. mit Tausenderpunkt: 1.234
    $requestArray['length'] = number_format($requestArray['length'], 0, ',', '.');
	}

  $now = date(PHP_DATE_TIME_FORMAT);
  if (LOGFORMAT == 'HTML') {
    $fn = REQUEST_LOG_HTML;
    foreach ($requestArray as $k => $v)
      if ($v != NO_LOG_VALUE)
        $requestArray[$k] = htmlspecialchars($v);
    $content = '<tr><td nowrap>'.$now.'</td><td nowrap>'.$requestArray['ID'].'</td>';
		if (defined('ELMAR_PRODUCTS_EAN_FIELD')) $content .= '<td nowrap>'.$requestArray['EAN'].'</td>';
		if (defined('ELMAR_PRODUCTS_ISBN_FIELD')) $content .= '<td nowrap>'.$requestArray['ISBN'].'</td>';
    $content .= '<td nowrap>'.$requestArray['Hersteller'].'</td><td nowrap>'.$requestArray['Produktname'].'</td><td nowrap>'.$requestArray['Beschreibung'].'</td><td nowrap>'.$requestArray['Schnellsuche'].'</td><td>'.$requestArray['Preisuntergrenze'].'</td><td>'.$requestArray['Preisobergrenze'].'</td><td>'.$requestArray['Anzahl'].'</td><td>'.$requestArray['UserIP'].'</td><td>'.$requestArray['trace'].'</td><td align="center">'.$languages_id.' '.$language_code.'</td><td align="center">'.$currency.' '.$currency_rate.'</td><td nowrap>'.$requestArray['HTTP_REFERER'].'</td><td nowrap>'.$requestArray['HTTP_USER_AGENT'].'</td><td nowrap>'.$requestArray['HTTP_FROM'].'</td><td>'.$requestArray['REMOTE_ADDR'].'</td><td align="center">'.$requestArray['counter'].'</td><td align="right">'.$requestArray['length'].'</td></tr>'.EOL;
  } else {  // LOGFORMAT == 'TXT'
    $fn = REQUEST_LOG;
    $content = $now.LOG_DELIMITER.$requestArray['ID'].LOG_DELIMITER;
		if (defined('ELMAR_PRODUCTS_EAN_FIELD')) $content .= $requestArray['EAN'].LOG_DELIMITER;
		if (defined('ELMAR_PRODUCTS_ISBN_FIELD')) $content .= $requestArray['ISBN'].LOG_DELIMITER;
    $content .= $requestArray['Hersteller'].LOG_DELIMITER.$requestArray['Produktname'].LOG_DELIMITER.$requestArray['Beschreibung'].LOG_DELIMITER.$requestArray['Schnellsuche'].LOG_DELIMITER.$requestArray['Preisuntergrenze'].LOG_DELIMITER.$requestArray['Preisobergrenze'].LOG_DELIMITER.$requestArray['Anzahl'].LOG_DELIMITER.$requestArray['UserIP'].LOG_DELIMITER.$requestArray['trace'].LOG_DELIMITER.$languages_id.' '.$language_code.LOG_DELIMITER.$currency.' '.$currency_rate.LOG_DELIMITER.$requestArray['HTTP_REFERER'].LOG_DELIMITER.$requestArray['HTTP_USER_AGENT'].LOG_DELIMITER.$requestArray['HTTP_FROM'].LOG_DELIMITER.$requestArray['REMOTE_ADDR'].LOG_DELIMITER.$requestArray['counter'].LOG_DELIMITER.$requestArray['length'].EOL;
  }

  $fh = @fopen($fn, 'ab');
  if (!$fh) {
    error_log(date(PHP_DATE_TIME_FORMAT).' Warnung Elm@r-Modul: Kann die Datei '.$fn.' nicht zum Schreiben oeffnen!', 0);
  } else {
    flock($fh, LOCK_EX);
    $header = !file_exists($fn) || (filesize($fn) == 0);
    if ($header == TRUE) {
      if (LOGFORMAT == 'HTML') {
        $title = "<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">\n<html>\n<head>\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=".(defined('CHARSET') ? CHARSET : 'iso-8859-1')."\">\n<link rel=\"stylesheet\" type=\"text/css\" href=\"elmar/logs/log.css\">\n<title>Echtzeitanfragen</title>\n</head>\n<body>\n<table border=\"1\" cellpadding=\"5\" cellspacing=\"0\" summary=\"Echtzeitanfragen\">\n<tr><th>Zeitpunkt</th><th>ID</th>";
				if (defined('ELMAR_PRODUCTS_EAN_FIELD')) $title .= "<th>EAN</th>";
				if (defined('ELMAR_PRODUCTS_ISBN_FIELD')) $title .= "<th>ISBN</th>";
        $title .= "<th>Hersteller</th><th>Produktname</th><th>Beschreibung</th><th>Schnellsuche</th><th>Preisuntergrenze</th><th>Preisobergrenze</th><th>Anzahl</th><th>UserIP</th><th>trace</th><th>Lang</th><th>Currency</th><th>REFERER</th><th>USER_AGENT</th><th>FROM</th><th>RequestIP</th><th>Anzahl der Ergebnisse</th><th>&Uuml;bertragene Bytes</th></tr>".EOL;
      } else {  // LOGFORMAT == 'TXT'
        $title = 'Zeitpunkt'.LOG_DELIMITER.'ID'.LOG_DELIMITER;
				if (defined('ELMAR_PRODUCTS_EAN_FIELD')) $title .= "EAN".LOG_DELIMITER;
				if (defined('ELMAR_PRODUCTS_ISBN_FIELD')) $title .= "ISBN".LOG_DELIMITER;
        $title .= 'Hersteller'.LOG_DELIMITER.'Produktname'.LOG_DELIMITER.'Beschreibung'.LOG_DELIMITER.'Schnellsuche'.LOG_DELIMITER.'Preisuntergrenze'.LOG_DELIMITER.'Preisobergrenze'.LOG_DELIMITER.'Anzahl'.LOG_DELIMITER.'UserIP'.LOG_DELIMITER.'trace'.LOG_DELIMITER.'Lang'.LOG_DELIMITER.'Currency'.LOG_DELIMITER.'REFERER'.LOG_DELIMITER.'USER_AGENT'.LOG_DELIMITER.'FROM'.LOG_DELIMITER.'RequestIP'.LOG_DELIMITER.'AnzahlderErgebnisse'.LOG_DELIMITER.'Bytes'.EOL;
      }
      fwrite($fh, $title);
    }
    fwrite($fh, $content);
    flock($fh, LOCK_UN);
    fclose($fh);
  }
}

/**
 * Uebersetzt die Fehlercodes bei Echtzeitanfragen in Fehlermeldungen.
 * @param int ErrorCode
 * @return string Beschreibung des Fehlers
 */
function errorDescription($err) {
  $description = array(
    1100 => 'Nicht spezifizierter Datenbankfehler',
    1101 => 'Verbindung zur Datenbank fehlgeschlagen',
    1102 => 'SQL-Anfrage nicht durchfuehrbar',
    1103 => 'SQL-Syntax-Fehler',
    1300 => 'Anfrage fehlerhaft',
    1301 => 'Anfrage unvollstaendig (Suchbegriffe fehlen)',
    1302 => 'Preisgrenzen ungueltig',
    1303 => 'Parameter fuer die maximale Produktzahl fehlerhaft',
    1400 => 'Anfrage abgelehnt',
    2000 => 'Sonstiger Fehler',
  );
  if (isset($description[$err]))
    return $description[$err];
  return 'Nicht spezifizierter Fehler';
}

/**
 * XML-Antwort an den Client schicken.
 */
function send($tree, $requestArray) {
	global $debug;
	$ob_contents = trim(ob_get_contents());
	if ($debug && strlen($ob_contents) > 0) {
    // Debug-Tag mit dem unerwünschten Content nach dem Common-Tag einfügen
    $root = & $tree->getRoot();
    $pos = -1;
    for ($i = 0; $i < count($root->children); ++$i) {
			if ($root->children[$i]->name == 'Common')
			  $pos = $i + 1;
		}
    $debug_tag = new XML_Tree_Node('Debug', $ob_contents);
    $res = & $root->insertChild(null, $pos, $debug_tag);
	}

  ob_end_clean();  // Falls schon Zeichen geschrieben wurden, diese verwerfen, damit nur das XML-Dokument geschrieben wird.

  $content = $tree->get();
  $output_compression = (GZIP_COMPRESSION != 'true') && defined('ELMAR_OUTPUT_COMPRESSION') && ELMAR_OUTPUT_COMPRESSION
    && isset($_SERVER['HTTP_ACCEPT_ENCODING']) && strpos(strtolower($_SERVER['HTTP_ACCEPT_ENCODING']), 'gzip') !== false;
  if ($output_compression && !headers_sent()) {
    header('Content-Encoding: gzip');
    $content = gzencode($content);
  }
  $length = strlen($content);
  if (!headers_sent()) header('Content-Length: '.$length);
  print $content;

  $requestArray['length'] = $length;
  requestLog($requestArray);

  exit;
}

?>