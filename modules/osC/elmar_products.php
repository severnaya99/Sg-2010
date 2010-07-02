<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: elmar_products.php 85 2006-01-21 16:14:25Z Michael $
*/

# TODO
# Mehrere Produktdateien gleichzeitig generieren (nur ein DB-Durchlauf) und auf dem Server speichern.
# Wie bisher einzelne Produktdateien zum Download erzeugen.

#register_shutdown_function('elmar_shutdown_function');
require('elmar_config.inc.php');  // Wenn diese Datei nach einem Update nicht gefunden wird, die Vollversion installieren.

/**
 * for xosC
**/

include(DIR_WS_CLASSES.'product.php');
// nur einen Teil der Produkte bearbeiten (z.B. um max_execution_timeouts zu umgehen)
$db_part = (isset($_REQUEST['db_part']) && ((int)$_REQUEST['db_part']) > 0) ? (int)$_REQUEST['db_part'] : FALSE;
$limit = (isset($_REQUEST['limit']) && ((int)$_REQUEST['limit']) > 0) ? (int)$_REQUEST['limit'] : 0x7FFFFFFF;
$use_prod_cat_idx = isset($_REQUEST['use_prod_cat_idx']) && ($_REQUEST['use_prod_cat_idx']=='yes');
$force = isset($_REQUEST['force']) && ($_REQUEST['force']=='yes');
$delimiter = isset($_REQUEST['delimiter']) && !empty($_REQUEST['delimiter']) ? $_REQUEST['delimiter'] : '';
$escape = isset($_REQUEST['escape']) && !empty($_REQUEST['escape']) ? $_REQUEST['escape'] : '';
$quote = isset($_REQUEST['quote']) && !empty($_REQUEST['quote']) ? $_REQUEST['quote'] : '';
$lineend = isset($_REQUEST['lineend']) && !empty($_REQUEST['lineend']) ? $_REQUEST['lineend'] : '';
$ignored_products = 0;

require(ELMAR_PATH.'elmar.inc.php');  // Wenn diese Datei nach einem Update nicht gefunden wird, die Vollversion installieren.

$output_compression = (GZIP_COMPRESSION != 'true') && !$db_part && defined('ELMAR_OUTPUT_COMPRESSION') && ELMAR_OUTPUT_COMPRESSION;
if ($output_compression) ob_start('ob_gzhandler');

// Bei 'kelkoo' oder 'froogle' wird die Produktdatei im entsprechenden Format generiert.
$productfiletype = '';
if (isset($_REQUEST['type'])) {
  $productfiletype = $_REQUEST['type'];
  if ($productfiletype != 'kelkoo' && $productfiletype != 'froogle' && $productfiletype != 'hardwareschotte' && $productfiletype != 'pangora' && $productfiletype != 'shopping' && $productfiletype != 'webde' && $productfiletype != 'amazon')
    $productfiletype = '';  // Wenn der Typ unbekannt ist, das Elm@r-Format benutzen.
}

// Wenn sich die aktuellen Parameter fuer delimiter, escape, quote und lineend von denen,
// die bei der Erzeugung der Produktdatei benutzt wurden, unterscheiden, muss neu generiert werden.
// Dies laesst sich auch ueber force steuern.
// Schauen, ob alle Parameter leer sind, dann Default-Format, sodass neu generiert werden kann.
// Wegen Kompatibilitaet zu Versionen vor 3.15: $languages_id==PROD_DEFAULT_LANGUAGE, wobei PROD_DEFAULT_LANGUAGE=2
$defaultformat = empty($productfiletype) && empty($delimiter) && empty($escape) && empty($quote) && empty($lineend)
  && ($language_code==PROD_DEFAULT_LANGUAGE || $languages_id==PROD_DEFAULT_LANGUAGE) && $currency==PROD_DEFAULT_CURRENCY
  && !$use_prod_cat_idx;
# Fuer xt:Commerce 3 evtl. die letzten drei Bedingungen auskommentieren!

if (defined('POWEREDBY') && !headers_sent()) header('X-Powered-By: '.POWEREDBY, FALSE);

// Parameter fuer das Produktdateiformat auswerten
// Vor einer evtl. Umleitung, damit die Werte korrekt geloggt werden.
if (!empty($productfiletype)) {
  if ($productfiletype == 'amazon' && !defined('ELMAR_PRODUCTS_EAN_FIELD')) {
		trigger_error('Um Produktdateien für Amazon Market Place aufzubereiten, muss ELMAR_PRODUCTS_EAN_FIELD in der Konfigurationsdatei elmar_config.inc.php gesetzt werden!', E_USER_ERROR);
	}
  if ($productfiletype == 'shopping') {
    $escape = '"';
    $quote = '"';
    $delimiter = ',';
  } else {
    // Fuer Kelkoo, Pangora, Froogle usw. besondere Einstellungen (bisher fuer alle gleich)
    $escape = '';
    $quote = '';
    $delimiter = "\t";
  }
} else {
  if (empty($quote))
    $quote = defined('DEFAULT_QUOTE') ? DEFAULT_QUOTE : '';
  else if (is_numeric($quote))
    $quote = chr($quote);

  if (empty($escape))
    $escape = defined('DEFAULT_ESCAPE') ? DEFAULT_ESCAPE : '';
  else if (is_numeric($escape))
    $escape = chr($escape);

  if (empty($delimiter))
    $delimiter = defined('DEFAULT_DELIMITER') ? DEFAULT_DELIMITER : "\t";
  else if (is_numeric($delimiter))
    $delimiter = chr($delimiter);
}

if (empty($lineend))
  $lineend = defined('DEFAULT_LINEEND') ? DEFAULT_LINEEND : "\n";
else if (is_numeric($lineend)) {
  switch ($lineend) {
    case ord("\n"):
    case ord("\r"):
      $lineend = chr($lineend);
      break;
    default:
      $lineend = defined('DEFAULT_LINEEND') ? DEFAULT_LINEEND : "\n";
  }
} else {
  if ($lineend == 'CR')
    $lineend = "\r";
  else if ($lineend == 'LF')
    $lineend = "\n";
  else if ($lineend == 'CRLF')
    $lineend = "\r\n";
  else  // Kein zulaessiger Wert
    $lineend = defined('DEFAULT_LINEEND') ? DEFAULT_LINEEND : "\n";
}

// Umleitung auf bestehende Produktdatei, wenn...
// Parameter: force=yes => Produktdatei wird neu generiert
if (WRITE_PRODUCTFILE && !$db_part && file_exists(PRODUCTFILE) && (filesize(PRODUCTFILE) > 0)
      && checkUpdateInterval() && !$force && $defaultformat) {
  header('Location: '.ELMAR_SHOP_ROOT_DIR.PRODUCTFILE);
  productLog();
  exit;
}

// Produktdatei wird im Folgenden on-the-fly erzeugt...
if (!empty($productfiletype)) {
  // Fuer Froogle und Kelkoo besondere Einstellungen
  header('Content-Type: text/plain');
  header('Content-Disposition: attachment; filename='.$productfilenames[$productfiletype]);
} else {
  header('Content-Type: text/csv');
  header('Content-Disposition: attachment; filename='.$productfilenames['']);
}

if (isset($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') > 0) {
  // F&uuml;r den Internet Explorer werden die beiden folgenden Header ben&ouml;tigt.
  header('Pragma: public');
  header('Cache-Control: public');
}

if ($_SERVER['REQUEST_METHOD'] == 'HEAD') {
  productLog();
  exit;
}

$limit_from = $db_part ? ($db_part - 1) * DB_STEP : 0;
$total = $limit_from;
if ($total >= $limit) {
  #productLog(TRUE);
  exit;
}

$from_bytes = 0;
$to_bytes = 0x7FFFFFFF;
if (isset($_SERVER['HTTP_RANGE'])) {
	if (preg_match("/bytes\s*=\s*(\d+)\s*-\s*(\d+)/i", $_SERVER['HTTP_RANGE'], $matches)) {
		// Wenn nur partieller Content angefragt wird, die Produktschleife ggf. vorzeitig abbrechen.
		// Um die richtige Anzahl Bytes und den Antwortcode kümmert sich der Webserver.
		$from_bytes = (int) $matches[1];
		$to_bytes = (int) $matches[2];
	}
}

if (!ini_get('safe_mode') && DB_SLEEP > 0) { // max_execution_time kann im Safemode nicht geaendert werden.
  // max_execution_time ggf. erhoehen, damit alle Produkte in die Produktdatei geschrieben werden.
  ini_set('max_execution_time', max(ini_get('max_execution_time'), (1 + productAnz()/DB_STEP) * DB_SLEEP));
}

// Sonderzeichen ersetzen; Reihenfolge relevant!
$quoted_csv_srch = array("\r\n", "\r", "\n", "\x0B", "\x0");
$quoted_csv_repl = array(' ', ' ', ' ', ' ', '');
if (!empty($escape)) {
  $quoted_csv_srch[] = $escape;
  $quoted_csv_repl[] = $escape.$escape;
}
if (!empty($quote)) {
  $quoted_csv_srch[] = $quote;
  $quoted_csv_repl[] = !empty($escape) ? $escape.$quote : '';
} else {
  $quoted_csv_srch[] = $delimiter;
  $quoted_csv_repl[] = !empty($escape) ? $escape.$delimiter : ' ';
}

// Bildgroessen bisher nur fuer das Standardformat
$calculate_image_size = ELMAR_PROD_IMAGE_CALCULATE_SIZE && empty($productfiletype);

$partner_id = false;
if (isset($partner_ids)) {
	// Partner anhand des abgerufenen Produktdateityps, des User-Agents, der IP oder des Hostnamens versuchen zu erkennen
  if ($productfiletype != '' && isset($partner_ids[$productfiletype])) {
    $partner_id = $partner_ids[$productfiletype];
  } else if (isset($_SERVER['HTTP_USER_AGENT']) && isset($partner_ids[$_SERVER['HTTP_USER_AGENT']])) {
    $partner_id = $partner_ids[$_SERVER['HTTP_USER_AGENT']];
  } else if (isset($_SERVER['REMOTE_ADDR']) && isset($partner_ids[$_SERVER['REMOTE_ADDR']])) {
    $partner_id = $partner_ids[$_SERVER['REMOTE_ADDR']];
  } else if (isset($partner_ids[$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR'])])) {
    $partner_id = $partner_ids[$hostname];
  }
}

if ($db_part <= 1) {
  // Kopfzeile nur schreiben, wenn alle Saetze oder der erste Teil ausgegeben wird.
  switch($productfiletype) {
  case 'froogle':
    $froogle_spalten = array('product_url', 'name', 'description', 'price', 'image_url', 'category', 'offer_id', 'instock', 'shipping', 'currency');
    if (MANUFACTURERS_NAME)
      $froogle_spalten[] = 'brand';
    // Weitere Felder derzeit nicht relevant: 'upc', 'manufacturer_id', 'product_type'
    $titel = implode($delimiter, $froogle_spalten).$lineend;
    break;
  case 'kelkoo':
    if (!defined('ELMAR_KELKOO_FORMAT') || ELMAR_KELKOO_FORMAT==0) {
      // Format fuer kostenlose Listung bei Kelkoo
      echo '#country='.strtolower($language_code)."\n";  // z.B. de
      echo '#type=basic'."\n";
      echo '#currency='.strtoupper($currency)."\n";  // z.B. EUR
      echo '#update=NO'."\n";  // Bei YES braucht man auch auch die Spalte 'delete'!
      echo '#quoted=NO'."\n";  // YES fuer Tabulatoren und Newlines in Textfeldern, nicht zu empfehlen!
      $kelkoo_spalten = array('url', 'title', 'description', 'price', 'offerid', 'image', 'availability', 'deliverycost');
    } else {
      // Format fuer die kostenpflichtige Partnerschaft bei Kelkoo
      # Neues Format beschrieben unter http://www.kelkoo.de/content/techspecs/de/index.html
      $kelkoo_spalten = array('EAN', 'ISBN', 'Hersteller', 'Produktname', 'Modellreihe', 'Kategorie', 'Produktbeschreibung', 'Preis', 'Verfuegbarkeit', 'Lieferzeit', 'Versandkosten', 'Bildlink', 'Produktlink', 'Status');
    }
    $titel = implode($delimiter, $kelkoo_spalten).$lineend;
    break;
  case 'hardwareschotte':
    // Erweiterung unter Mithilfe von Mathias Grimm (www.tuxman.de)
    #$hardwareschotte_spalten = array('Produktname', 'Artikelbeschreibung', 'Produktpreis', 'Deeplink', 'EAN', 'Hersteller', 'HAN', 'AAN', 'DAN_Distributor-Name', 'Produktbild', 'Verfügbarkeit', 'Verfügbarkeitsstatus', 'Kategorie', 'Versandkosten', 'Versandkosten Vorkasse', 'Versandkosten Nachnahme', 'Versandkosten Kreditkarte', 'Versandkosten Bankeinzug');
    $hardwareschotte_spalten = array('Produktname', 'Artikelbeschreibung', 'Produktpreis', 'Deeplink', 'AAN', 'Produktbild', 'Verfügbarkeitsstatus', 'Kategorie', 'Versandkosten');
    if (MANUFACTURERS_NAME)
      $hardwareschotte_spalten[] = 'Hersteller';
    $titel = implode($delimiter, $hardwareschotte_spalten).$lineend;
    break;
  case 'pangora':
    #Neue Spalten
    #product-type = Unterscheidung von einzelnen Produkten, Produktpaketen und Zubehoer
    #condition = Angabe des Zustandes eines Produktes (z.B.neu oder gebraucht)
    #release-date = Erscheinungsdatum
    #delivery-charge = Angabe der Lieferkosten
    #ships-in = Zeitangabe, wann das Produkt versandfertig ist. Artikel auf Bestellung
    #deal-type = Mietpreis, Festpreis, Auktionspreis, Leasingpreis, Handy mit Vertrag
    #offer-attributes = zusaetzliche Informationen zum Produkt (Besonderheit z.B. Sammlerstueck)
    $pangora_spalten = array('language', 'merchantCategory', 'offerID', 'name', 'brand', 'description', 'deepLink', 'imageURL', 'oldprices', 'promotionText', 'prices', 'shipping');
    $titel = implode($delimiter, $pangora_spalten).$lineend;
    break;
  case 'shopping':
    /*
      MPN = Manufacturer''s Product Number
      Hersteller = Manufacturer Name
      UPC = Unique Product Code
      Produkt = Product Name
      Produkt Beschreibung = Product Description
      Preis = Product Price (MUST include VAT)
      Produkt URL = Product URL
      Bild URL = Image URL
      Shopping.com Kategorisierung = Categorization
      Lieferbar = Stock Availability
      Lieferzeit = Stock Description
      Versand Dauer 1-3 Tag = Ground Shipping
      Expressversand Versand Dauer 3-7 Tag
      Gewicht = Weight
    */
    $shopping_spalten = array('MPN', 'Hersteller', 'UPC', 'Produkt', 'Produkt Beschreibung', 'Preis', 'Produkt URL', 'Bild URL', 'Kategorisierung', 'Lieferbar', 'Lieferzeit', 'Versand', 'Expressversand', 'Gewicht');
    $titel = implode($delimiter, $shopping_spalten).$lineend;
    break;
  case 'webde':
    #$webde_spalten = array('update_type', 'merchant_offer_id', 'offer_type', 'name', 'description_short', 'offer_url', 'price', 'from_category', 'description_long', 'image_uri', 'manufacturer', 'ean_code', 'deliverability'); // 'shoppingcart_url', 'warranty', 'datasheet_uri', 'normal_price', 'validity'
    #$titel = implode($delimiter, $webde_spalten).$lineend;
    break;
  case 'amazon':
    $amazon_spalten = array('item-is-marketplace', 'product-id', 'product-id-type', 'item-condition', 'item-note', 'price', 'sku', 'quantity', 'will-ship-internationally', 'add-delete', 'item-name', 'item-description', 'category1', 'image-url', 'shipping-fee'); // die letzten fünf Spalten für zShops
    $titel = implode($delimiter, $amazon_spalten).$lineend;
    break;
  default:
    global $spalten;
    $titel = $quote.implode($quote.$delimiter.$quote, $spalten).$quote.$lineend;
  }

  if (!empty($titel)) {
    echo $titel;
    if (!$output_compression) flush();  // Damit schon mal etwas ueber die Leitung zum Client geht.
  }
}

$bytes = 0;
$fh = FALSE;
if (WRITE_PRODUCTFILE && $defaultformat && $to_bytes == 0x7FFFFFFF) {
  // Produktdatei aktualisieren, also neu erzeugen bzw. vervollstaendigen
  // Nicht, wenn wegen HTTP_RANGE nur die ersten $to_bytes geschrieben werden!
  $fh = @fopen(PRODUCTFILE, ($db_part <= 1) ? 'wb' : 'ab');
  if (!$fh) {
    error_log(date(PHP_DATE_TIME_FORMAT).' Warnung Elm@r-Modul: Kann die Datei '.PRODUCTFILE.' nicht zum Schreiben oeffnen!', 0);
  } else {
    if (!flock($fh, LOCK_EX)) { // do an exclusive lock
      error_log(date(PHP_DATE_TIME_FORMAT).' Fehler Elm@r-Modul: Kann die Datei '.PRODUCTFILE.' nicht exklusiv sperren!', 0);
    }
    if ($db_part <= 1) {
			$bytes = strlen($titel);
      fputs($fh, $titel);
		}
    ignore_user_abort(TRUE);  // Kein vorzeitiger Abbruch des Skripts, damit die Produktdatei komplett erstellt wird.
  }
}

unset($titel);

// Siehe auch elmar_request.php!
// TODO: Versandkosten nach Gewicht
// TODO: Tabelarische Versandkosten werden (noch) nicht beruecksichtigt.
// MODULE_SHIPPING_TABLE_COST=='50:5.00,1000:0.00'
// MODULE_SHIPPING_TABLE_HANDLING=0
// MODULE_SHIPPING_TABLE_MODE=='price' (oder 'weight')
// MODULE_SHIPPING_TABLE_STATUS=='True'
// MODULE_SHIPPING_TABLE_TAX_CLASS=0
// MODULE_SHIPPING_TABLE_ZONE=3

// TODO: Nachnahmegebuehr wird (noch) nicht beruecksichtigt. Bisher nur fuer Hardwareschotte interessant.
// MODULE_PAYMENT_COD_STATUS=='True' Nachnahme: Do you want to accept Cash On Delevery payments?
// MODULE_ORDER_TOTAL_COD_FEE_ITEM

#Versandkosten pro Stueck: ((MODULE_SHIPPING_ITEM_STATUS == 'True') ? true : false);
#MODULE_SHIPPING_ITEM_COST string(4) "2.50"
#MODULE_SHIPPING_ITEM_HANDLING string(1) "0"
#MODULE_SHIPPING_ITEM_TAX_CLASS string(1) "0"
#MODULE_SHIPPING_ITEM_ZONE string(1) "0"

$free_shipping = (defined('MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING') && MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING == 'true');
$shipping_flat_status = (defined('MODULE_SHIPPING_FLAT_STATUS') && MODULE_SHIPPING_FLAT_STATUS == 'True');
if ($shipping_flat_status) {
  // Standard: Flat-Preis ist netto. Bei Brutto Shops muss MwSt addiert werden, sonst nicht.
  // Ein Beitrag von Kai Schulz
  if (DISPLAY_PRICE_WITH_TAX == 'true') {
    $shipping_flat_cost = tep_add_tax(MODULE_SHIPPING_FLAT_COST, tep_get_tax_rate(MODULE_SHIPPING_FLAT_TAX_CLASS, STORE_COUNTRY, MODULE_SHIPPING_FLAT_ZONE));
  } else {
    $shipping_flat_cost = MODULE_SHIPPING_FLAT_COST;
  }
}

#Falls bei products_id Doppelte auftreten, DISTINCT(products.products_id) o.Ä. benutzen.
$sql0 =
  'SELECT
    products.products_id,
    products.products_model,
    products.products_image,
    products.products_price,
    products.products_tax_class_id,
    products.products_status,
    products.products_quantity,
    products_description.products_name,
    products_description.'.ELMAR_PRODUCTS_DESCRIPTION_FIELD.',
    specials.specials_new_products_price,
    specials.expires_date,
    specials.status';
# Weitere Felder: products.products_date_available = voraussichtliche Lieferbarkeit, also nicht auf Lager
# Extra Felder fuer osCommerce-Erweiterungen: products_description.products_description1, ...
if (ELMAR_FSK_18) $sql0 .= ', products.products_fsk_18';
if ($productfiletype == 'shopping') $sql0 .= ', products_weight';
if (defined('ELMAR_PRODUCTS_EAN_FIELD')) $sql0 .= ', products.'.ELMAR_PRODUCTS_EAN_FIELD;
if (defined('ELMAR_PRODUCTS_ISBN_FIELD')) $sql0 .= ', products.'.ELMAR_PRODUCTS_ISBN_FIELD;

if (MANUFACTURERS_NAME) {
  $sql0 .= ', manufacturers.manufacturers_name
    FROM '.TABLE_PRODUCTS.' AS products
      LEFT JOIN '.TABLE_MANUFACTURERS.' AS manufacturers ON (manufacturers.manufacturers_id=products.manufacturers_id)
      LEFT JOIN '.TABLE_PRODUCTS_DESCRIPTION.' AS products_description ON (products.products_id=products_description.products_id)
      LEFT JOIN '.TABLE_SPECIALS.' AS specials ON (products.products_id=specials.products_id)
    WHERE';
} else {
  $sql0 .= ' FROM '.TABLE_PRODUCTS.' AS products
      LEFT JOIN '.TABLE_PRODUCTS_DESCRIPTION.' AS products_description USING(products_id)
      LEFT JOIN '.TABLE_SPECIALS.' AS specials ON (products.products_id=specials.products_id)
    WHERE';
}

# Fuer xt:Commerce 3 $languages_id durch 2 (fuer Deutschland) ersetzen.
$sql0 .= ' products_description.language_id='.(int)$languages_id;

if (NUR_AB_LAGER) $sql0 .= ' AND products.products_status > 0';
if (NUR_POSITIVE_ANZAHL) $sql0 .= ' AND products.products_quantity > 0';
if (NUR_MIT_PRODUKTBESCHREIBUNG) $sql0 .= ' AND products_description.'.ELMAR_PRODUCTS_DESCRIPTION_FIELD.' <> \'\'';
if (ELMAR_FSK_18) $sql0 .= ' AND products.products_fsk_18 = 0';

#Sortieren macht der Datenbank mehr Stress:
#$sql0 .= ' ORDER BY products.products_id';

if ($limit != 0x7FFFFFFF && ELMAR_ORDER_BY_VIEWED) {
  // Falls die Anzahl der Produkte limitiert ist, die meistbesuchten Produkte zuerst beruecksichtigen.
  $sql0 .= ' ORDER BY products_description.products_viewed DESC';
}

$today = date('Y-m-d');
do {
  if (!ini_get('safe_mode')) // set_time_limit hat im Safemode keinen Effekt.
    set_time_limit(0);  // Maximale Ausfuehrungszeit, damit das Skript nicht vorzeitig abgebrochen wird.

  $rs = tep_db_query($sql0." LIMIT $limit_from, ".DB_STEP);

  $count = tep_db_num_rows($rs);
  if ($count == 0)
    break;

  if (!$db_part && $limit_from > 0 && DB_SLEEP > 0)
    sleep(DB_SLEEP);  // Dem Server etwas Zeit zwischen den DB-Anfragen geben.

  while (($total < $limit) && ($product_info = tep_db_fetch_array($rs)) && ($bytes < $to_bytes)) {
    $lieferzeit = ($product_info[LIEFERBARKEIT_FELDNAME] > 0) ? LIEFERBARKEIT_AB_LAGER : LIEFERBARKEIT_NICHT_AB_LAGER;

    $products_id = $product_info['products_id'];
	$sproduct= new product($products_id);
    if (PROD_ID_IST_ARTIKELNUMMER) {
      // Der Normalfall
      $artikelnummer = $products_id;
      $model = $product_info['products_model'];
    } else {
      // Als eindeutige Artikelnummer in der Produktdatei soll products_model statt products_id dienen.
      // In diesem Fall muss der Shopbetreiber dafuer sorgen, dass products_model eindeutig ist!
      $artikelnummer = $product_info['products_model'];
      $model = $products_id;
    }

    $name = $product_info['products_name'];
    $manufacturer = isset($product_info['manufacturers_name']) ? $product_info['manufacturers_name'] : '';

    //Sonderpreis beruecksichtigen
    $isSpecial = false;
    if ($product_info['status']) {
      $expires_date = $product_info['expires_date'];
      if ($expires_date == '0000-00-00 00:00:00') $expires_date = null;
      if (!is_null($product_info['specials_new_products_price'])
          && (is_null($expires_date) || $expires_date >= $today)) {
        $isSpecial = true;
        $price = $product_info['specials_new_products_price'];
        $expires_date = substr($expires_date, 0, 4).substr($expires_date, 5, 2).substr($expires_date, 8, 2);  // YYYY-mm-dd
        $old_price = $product_info['products_price'];
      }
    }
    if (!$isSpecial) {
      $price = $product_info['products_price'];
      $expires_date = '';
      $old_price = NULL;
    }

    if (NUR_POSITIVER_PREIS && $price <= 0) continue;

    $tax_rate = tep_get_tax_rate($product_info['products_tax_class_id']);
    $tax = tep_calculate_tax($price, $tax_rate);
    $price = tep_add_tax($price, $tax_rate);
    if (!is_null($old_price)) $old_price = tep_add_tax($old_price, $tax_rate);

    if ($free_shipping && $price >= MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING_OVER) {
      $versandkosten = VERSANDKOSTENFREI;
    } else {
      if ($shipping_flat_status) {
        $versandkosten = $shipping_flat_cost;
      } else {
        $versandkosten = VERSANDKOSTEN_AB;
      }
      if (!empty($versandkosten)) $versandkosten *= $currency_rate;
    }

    $tax *= $currency_rate;
    $price *= $currency_rate;
    if (!is_null($old_price)) $old_price *= $currency_rate;

    # Workaround fuer Shops mit besonderen Versandkosten (z.B. tabellarischen)
    # $versandkosten = ($price >= 50 ? VERSANDKOSTENFREI : VERSANDKOSTEN_AB;

    // Beschreibung inkl. HTML-Tags und Entities, mit field_to_csv werden diese spaeter entfernt (siehe auch elmar_request.php)
    if (defined('TABLE_PRODUCTS_EXTRA_FIELDS')) {
      // Unterstuetzung fuer "Product Extra Fields"
      $products_description_extra = get_product_extra_fields($products_id);
      $description = $products_description_extra . $product_info[ELMAR_PRODUCTS_DESCRIPTION_FIELD];
    } else {
      $description = $product_info[ELMAR_PRODUCTS_DESCRIPTION_FIELD];
    }

    if (ELMAR_PRODUCT_OPTIONS) {
      $sql_opt = 'select o.products_options_name, v.products_options_values_name,
                    concat(a.price_prefix, a.options_values_price) as optprice
                  from '.TABLE_PRODUCTS.' p
                  left join '.TABLE_PRODUCTS_ATTRIBUTES.' a on p.products_id=a.products_id
                  left join '.TABLE_PRODUCTS_OPTIONS.' o on a.options_id=o.products_options_id
                  left join '.TABLE_PRODUCTS_OPTIONS_VALUES.' v on a.options_values_id=v.products_options_values_id
                  where p.products_id='.$products_id.' and o.language_id='.(int)$languages_id.' and v.language_id='.(int)$languages_id.
                  ' order by o.products_options_name, v.products_options_values_name';
      $rs_opt = tep_db_query($sql_opt);
      unset($sql_opt);
      $opt = array();
      while ($product_opt = tep_db_fetch_array($rs_opt)) {
        $opt[$product_opt['products_options_name']][] = array($product_opt['products_options_values_name'], $product_opt['optprice']);
      }
  		tep_db_free_result($rs_opt);
      $options = '';
      foreach($opt as $key => $value) {
        $options .= $key . ': ';
        for ($idx = 0; $idx < count($value); ++$idx) {
          if ($idx > 0) $options .= ', ';
          $options .= $value[$idx][0];
          #if (floatval($value[$idx][1]) != 0) $options .= ' = '.$value[$idx][1];
        }
        $options .= '; ';
      }
      unset($opt);
      if (strlen($options) > 0) {
        $description = rtrim($description);
        if (strlen($description) > 0 && $description{strlen($description)-1} != '.') $description .= '.';
        $description .= ' ' . $options;
      }
    }

    if (ELMAR_PRODUCT_DESCRIPTION_MAX_LENGTH > 0 && strlen($description) > ELMAR_PRODUCT_DESCRIPTION_MAX_LENGTH)
      $description = substr($description, 0, ELMAR_PRODUCT_DESCRIPTION_MAX_LENGTH-3).'...';

    if (ELMAR_SEO_URLS)
      $productinfopage = tep_href_link(FILENAME_PRODUCT_INFO, 'products_id='.$products_id, 'NONSSL', false, true);
    else
      $productinfopage = PRODUCTINFOPAGE.$products_id;
    if ($partner_id) $productinfopage .= $partner_id;
		if (defined('AFFILIATES_ID_FIND')) $productinfopage .= AFFILIATES_ID_FIND;
		if (defined('LINK_AMP_BUG')) $productinfopage = str_replace('&amp;', '&', $productinfopage);

# Fuer Froogle grosse Bilder benutzen, sofern vorhanden.
# if ($productfiletype = 'froogle' && file_exists(DIR_FS_CATALOG_IMAGES . 'gross/' . $prodimg))
#   $prodimg = IMAGE_PATH . 'gross/' . $prodimg;
# else
#   $prodimg = IMAGE_PATH.$prodimg;

    $prodimg = $product_info['products_image'];
    $prodimg_width = ELMAR_PROD_IMAGE_WIDTH;
    $prodimg_height = ELMAR_PROD_IMAGE_HEIGHT;
    if (defined('NO_IMAGE_NAME') && $prodimg == NO_IMAGE_NAME)
      $prodimg = '';
    else if (!empty($prodimg) && !ereg('^https?:', $prodimg)) {
      if ($calculate_image_size && (empty($prodimg_width) || empty($prodimg_height))) {
				// TODO Der physische Pfad DIR_FS_CATALOG_IMAGES muss zum Web-Pfad IMAGE_PATH passen!
        $img_name = $sproduct->get_image_path().$prodimg;
        if (file_exists($img_name) && $prodimg_size=getimagesize($img_name)) {
          $prodimg_width = $prodimg_size[0];
          $prodimg_height = $prodimg_size[1];
        }
      }
      $prodimg = $sproduct->get_image_path().$prodimg;
    }

    if (defined('ELMAR_PRODUCT_CATEGORY_INDEX') && ELMAR_PRODUCT_CATEGORY_INDEX >= 0 && $use_prod_cat_idx) {
      $product_categories = tep_generate_category_path($products_id, 'product');
      for ($i = 0, $n = sizeof($product_categories); $i < $n && $total < $limit; $i++) {
        $category_path = '';
        $m = sizeof($product_categories[$i]);
        for ($j = 0; $j < $m; $j++) {
          $category_path .= $product_categories[$i][$j]['text'] . '|';
        }
        $category_path = substr($category_path, 0, -1);
        $kategorie = $category_path;
        if (ELMAR_PRODUCT_CATEGORY_INDEX < $m) {
          $category_text = $product_categories[$i][ELMAR_PRODUCT_CATEGORY_INDEX]['text'];
          $category_id = $product_categories[$i][ELMAR_PRODUCT_CATEGORY_INDEX]['id'];
          sk_generate_line($category_text, $category_id);
        } else {
          sk_generate_line();
        }
      }
    } else {
      $kategorie = sk_generate_category_path($products_id);
//--> nur bestimmte Produktkategorien
#if ($productfiletype!='pangora' || preg_match('/^hardware\|grafikkarten$|software|action/i', $kategorie))
//<--
      sk_generate_line();
    }
  }

  if (!$output_compression) flush();

  tep_db_free_result($rs);
  $limit_from += DB_STEP;

} while (!$db_part && ($count == DB_STEP) && ($bytes < $to_bytes));

if ($fh) {
  flock($fh, LOCK_UN); // release the lock
  fclose($fh);
}

if ($output_compression) ob_end_flush();

productLog(TRUE);

exit;

###########################################################################
// Erzeugt eine Zeile der Produktdatei
function sk_generate_line($category_text='', $category_id='') {
  global
  	$bytes,
    $currency,
    $delimiter,
    $description,
    $expires_date,
    $fh,
    $ignored_products,
    $kategorie,
    $language_code,
    $lieferzeit,
    $lineend,
    $manufacturer,
    $model,
    $name,
    $price,
    $old_price,
    $artikelnummer,
    $prodimg,
    $prodimg_width,
    $prodimg_height,
    $productinfopage,
    $product_info,
    $productfiletype,
    $quote,
    $isSpecial,
    $total,
    $versandkosten;

  ++$total;

  if ($category_id != '') {
    $pi = $artikelnummer.'-'.$category_id;
  } else {
    $pi = $artikelnummer;
  }

  if ($category_text != '') {
    $pn = $category_text.' '.$name;
  } else {
    $pn = $name;
  }

  switch($productfiletype){
  case 'froogle':
    if (defined('FROOGLE_LANGUAGE_PARAM')) $productinfopage .= FROOGLE_LANGUAGE_PARAM;
    $zeile = $productinfopage.$delimiter.
              field_to_csv($pn, 80).$delimiter.  // "Up to 80 characters will be displayed."
              field_to_csv($description, 65535).$delimiter.  // "Descriptions over 1000 characters may be truncated."
              number_format($price, 2, '.', '').$delimiter.  // 1234.56
              $prodimg.$delimiter.
              field_to_csv(str_replace('|', ' > ', $kategorie)).$delimiter.
              $pi.$delimiter.
              ($product_info[LIEFERBARKEIT_FELDNAME] > 0 ? 'Y' : 'N').$delimiter.
              ($versandkosten == VERSANDKOSTENFREI ? '0' : number_format($versandkosten, 2, '.', '')).$delimiter.
              $currency;
    if (MANUFACTURERS_NAME)
        $zeile .= $delimiter.field_to_csv($manufacturer);
    $zeile .= $lineend;
    break;
  case 'kelkoo':
    if (!empty($manufacturer) && strpos($pn, $manufacturer) === FALSE)
      $kelkoo_prodname = $manufacturer.': '.$pn;
    else
      $kelkoo_prodname = $pn;

    if (!defined('ELMAR_KELKOO_FORMAT') || ELMAR_KELKOO_FORMAT==0) {
      // kostenlose Partnerschaft
      if (defined('ELMAR_KELKOO_MAX_DESCRIPTION_LENGTH') && strlen($description) > ELMAR_KELKOO_MAX_DESCRIPTION_LENGTH) {
        ++$ignored_products;
        return;  // Produkt wegen zu langer Produktbeschreibung ignorieren!
      }

      /*
        Verfuegbarkeit des Produktes. Moegliche Angaben:
        001: "Auf Lager"
        002: "Bestellbestand"
        003: "Im Shop ueberpruefen"
        004: "Vorbestellung"
        005: "Auf Bestellung verfuegbar"
      */
      $kelkoo_lieferzeit = ($product_info[LIEFERBARKEIT_FELDNAME] > 0) ? '001' : '003';

      // max. 20 Zeichen, EUR 10.00 oder 'Frei' (im Kelkoo-Beispiel 'included')
      if ($versandkosten == VERSANDKOSTENFREI)
        $kelkoo_versandkosten = 'Frei';
      else if (is_numeric($versandkosten)) {
        $kelkoo_versandkosten = number_format($versandkosten, 2, '.', '');  // oder
				#$kelkoo_versandkosten = 'EUR '.number_format($versandkosten, 2, ',', '');
      } else
        $kelkoo_versandkosten = '';

      $zeile = $productinfopage.$delimiter.
                field_to_csv($kelkoo_prodname, 79).$delimiter.  // max. 79 Zeichen
                field_to_csv($description, 159).$delimiter.  // max. 159 Zeichen
                number_format($price, 2, '.', '').$delimiter.
                $pi.$delimiter.
                $prodimg.$delimiter.  // JPG, GIF, PNG. Bilder werden im Format 90 x 90 Pixel angezeigt.
                $kelkoo_lieferzeit.$delimiter.
                $kelkoo_versandkosten.
                $lineend;
    } else {
      // kostenpflichtige Partnerschaft
      $zeile = (defined('ELMAR_PRODUCTS_EAN_FIELD') ? $product_info[ELMAR_PRODUCTS_EAN_FIELD] : '').$delimiter. // EAN
                (defined('ELMAR_PRODUCTS_ISBN_FIELD') ? $product_info[ELMAR_PRODUCTS_ISBN_FIELD] : '').$delimiter.  // ISBN
                $manufacturer.$delimiter.  // Hersteller
                field_to_csv($kelkoo_prodname, 79).$delimiter.  // max. 79 Zeichen
                ''.$delimiter.  // Modellreihe
                field_to_csv($kategorie).$delimiter.
                field_to_csv($description, 159).$delimiter.  // max. 159 Zeichen
                number_format($price, 2, '.', '').$delimiter.
                (($product_info[LIEFERBARKEIT_FELDNAME] > 0) ? 'ab Lager' : 'ausverkauft').$delimiter.
                (($product_info[LIEFERBARKEIT_FELDNAME] > 0) ? '2' : '10').$delimiter.  // Lieferzeit in Tagen: 2 ab Lager, sonst 10
                number_format((double)$versandkosten, 2, '.', '').$delimiter.
                $prodimg.$delimiter.  // Bildlink
                $productinfopage.$delimiter.
                'neu'.  // Status neu oder gebraucht
                $lineend;
    }
    break;
  case 'hardwareschotte':
    $zeile = field_to_csv($pn).$delimiter.
              field_to_csv($description).$delimiter.
              number_format($price, 2, '.', '').$delimiter. // 1234.56
              $productinfopage.$delimiter.
              $pi.$delimiter.
              $prodimg.$delimiter.
              ($product_info[LIEFERBARKEIT_FELDNAME] > 0 ? '1' : '0').$delimiter.  // 0 = nicht verfuegbar, 1 = auf Lager, 2 = bestellt
              field_to_csv($kategorie).$delimiter.
              ($versandkosten == VERSANDKOSTENFREI ? '0' : number_format($versandkosten, 2, '.', ''));
    if (MANUFACTURERS_NAME)
      $zeile .= $delimiter.field_to_csv($manufacturer);
    $zeile .= $lineend;
    break;
  case 'pangora':
    $zeile = $language_code.$delimiter.
              field_to_csv(str_replace('|', '/', $kategorie)).$delimiter.
              $pi.$delimiter.
              field_to_csv($pn).$delimiter.
              (MANUFACTURERS_NAME ? field_to_csv($manufacturer) : '').$delimiter.
              field_to_csv($description).$delimiter.
              $productinfopage.$delimiter.
              $prodimg.$delimiter.
              ''.$delimiter.  // Bisheriger Preis
              ''.$delimiter.  // Promotion-Text maximal 25 Zeichen
              $currency.number_format($price, 2, ',', '').$delimiter. // 1234,56
              $currency.number_format(($versandkosten == VERSANDKOSTENFREI ? '0' : $versandkosten), 2, ',', ''). // 1234,56
              $lineend;
    break;
  case 'shopping':
    $zeile = $delimiter.   // keine MPN
              (MANUFACTURERS_NAME ? quoted_field_to_csv($manufacturer) : $quote.''.$quote).$delimiter.
              (defined('ELMAR_PRODUCTS_EAN_FIELD') ? $product_info[ELMAR_PRODUCTS_EAN_FIELD] : '').$delimiter.  // UPC/EAN
              quoted_field_to_csv($pn).$delimiter.
              quoted_field_to_csv($description, 1024).$delimiter.
              number_format($price, 2, '.', '').$delimiter. // 1234.56
              $productinfopage.$delimiter.
              $prodimg.$delimiter.
              quoted_field_to_csv(str_replace('|', ' -> ', $kategorie)).$delimiter.
              $quote.($product_info[LIEFERBARKEIT_FELDNAME] > 0 ? 'J' : 'N').$quote.$delimiter.
              $delimiter.  // keine Angabe fuer die Lieferzeit
              number_format(($versandkosten == VERSANDKOSTENFREI ? '0' : $versandkosten), 2, '.', '').$delimiter.
              $delimiter.  // keine Angabe fuer Expressversandkosten
              number_format($product_info['products_weight'], 2, '.', '').' kg'.  // Stimmt kg?
              $lineend;
    break;
  case 'webde':
    // Lieferbarkeit: -2=auf Anfrage, -1=nicht lieferbar, 0=sofort, 1=in einem Tag, ..., 14=in 2 Wochen
    $webde_lieferzeit = ($product_info[LIEFERBARKEIT_FELDNAME] > 0) ? '0' : '-2';

    $zeile = '0'.$delimiter.        // Aenderungstyp: 0=Einfuegen
              $pi.$delimiter.
              '0'.$delimiter.       // Angebotstyp: 0=Onlineshop
              field_to_csv($pn).$delimiter.
              field_to_csv($description, 200).$delimiter.  // kurze Produkt-Beschreibung fuer die Suchergebnisliste
              $productinfopage.$delimiter.
              number_format($price, 2, ',', '').' '.$currency.$delimiter. // 1234,56 EUR
              field_to_csv($kategorie).$delimiter.
              field_to_csv($description, 1999).$delimiter.  // ausfuehrliche Produktbeschreibung unter 2000 Zeichen
              $prodimg.$delimiter.
              (MANUFACTURERS_NAME ? field_to_csv($manufacturer) : '').$delimiter.
              (defined('ELMAR_PRODUCTS_EAN_FIELD') ? $product_info[ELMAR_PRODUCTS_EAN_FIELD] : '').$delimiter. // EAN
              $webde_lieferzeit.
              $lineend;
    break;
	case 'amazon':
		$ean = $product_info[ELMAR_PRODUCTS_EAN_FIELD];
		if (strlen($ean) != 13)
			return;  // Produkt wegen fehlerhafter EAN ignorieren
		$quantity = (int) $product_info['products_quantity'];
		if ($quantity <= 0)
			return;  // Produkt ignorieren
		if ($quantity > 1000) $quantity = 1000;
		$price *= AMAZON_PRICE_FACTOR;
		$zeile = 'Y'.$delimiter. // item-is-marketplace
			$ean.$delimiter.  // product-id
			'4'.$delimiter.  // product-id-type = EAN
			'11'.$delimiter.  // item-condition = Neu
			field_to_csv($pn, 200).$delimiter.  // item-note
			number_format($price, 2, ',', '').$delimiter.  // price 39,50
			$pi.$delimiter.  // sku
			$quantity.$delimiter.  // quantity 1-1000
			AMAZON_SHIP_INTERNATIONALLY.$delimiter.  // will-ship-internationally
			''.$delimiter.  // add-delete
			// Die letzten fünf Spalten sind für zShops und bleiben leer.
			''.$delimiter. // item-name
			''.$delimiter. // item-description
			''.$delimiter. // category1
			''.$delimiter. // image-url
			''.$delimiter. // shipping-fee
			$lineend;
		break;
  default:
    $zeile = $quote.$pi.$quote.$delimiter.
              quoted_field_to_csv($pn).$delimiter.
              quoted_field_to_csv($manufacturer).$delimiter.
              quoted_field_to_csv($model).$delimiter.
              quoted_field_to_csv(KategorieAnpassen($kategorie)).$delimiter.
              quoted_field_to_csv($description).$delimiter.
              $quote.number_format($price, 2, '.', '').$quote.$delimiter.
              $quote.$prodimg.$quote.$delimiter.
              $quote.$productinfopage.$quote.$delimiter.
              $quote.$lieferzeit.$quote.$delimiter.
              $quote.number_format(($versandkosten == VERSANDKOSTENFREI ? '0' : $versandkosten), 2, '.', '').$quote.$delimiter.
              $quote.$isSpecial.$quote.

              $delimiter.$quote.$expires_date.$quote.
              $delimiter.$quote.(is_null($old_price) ? '' : number_format($old_price, 2, '.', '')).$quote;

    if (ELMAR_PROD_IMAGE_CALCULATE_SIZE) {
      $zeile .= $delimiter.$quote.$prodimg_width.$quote.
                $delimiter.$quote.$prodimg_height.$quote;
    }
		if (defined('ELMAR_PRODUCTS_EAN_FIELD')) {
      $zeile .= $delimiter.$quote.$product_info[ELMAR_PRODUCTS_EAN_FIELD].$quote;
		}
		if (defined('ELMAR_PRODUCTS_ISBN_FIELD')) {
      $zeile .= $delimiter.$quote.$product_info[ELMAR_PRODUCTS_ISBN_FIELD].$quote;
		}

    $zeile .= $lineend;
  } // switch

  $bytes += strlen($zeile);
  if ($fh) fputs($fh, $zeile);
  echo $zeile;
}

/**
 * Prueft, ob die Produktdatei noch aktuell ist und nicht neu erzeugt werden muss.
 * @return boolean True, wenn die Produktdatei aktuell ist und nicht neu erzeugt werden muss.
 */
function checkUpdateInterval() {
  $mtime = time_of_productfile();
  if ($mtime) {
    if (time() - $mtime < UPDATEINTERVAL)
      return true;
    return fileNewerThanDB($mtime);
  }
  return false;
}

/**
 * Prueft, ob der Zeitstempel der Produktdatei aktueller ist als die letzte Aenderung der Tabelle 'products'.
 * @return boolean True, wenn die Produktdatei aktuell ist und nicht neu erzeugt werden muss.
 */
function fileNewerThanDB($ptime) {
  $ttime = time_of_lasttablechange();
  if ($ttime)
    return $ptime >= $ttime;
  return false;
}

/**
 * @return int Liefert den Zeitstempel der Produktdatei. Liefert false, falls die Datei nicht existiert.
 */
function time_of_productfile() {
  if (file_exists(PRODUCTFILE)) {
    clearstatcache();
    return filemtime(PRODUCTFILE);
  }
  return false;
}

/**
 * Liefert den Zeitpunkt der letzten Aenderung der Tabelle 'products'.
 * @return int Liefert im Fehlerfall false.
 */
function time_of_lasttablechange() {
	// Um nach Änderungen den korrekten Wert für Update_time zu erhalten, muss man FLUSH TABLE ausführen.
	// Dazu benötigt der aktuellen Datenbanknutzer jedoch das RELOAD-Privileg. Also entweder vorher fragen, ob
	// der aktuelle Nutzer das RELOAD-Privileg besitzt oder bei FLUSH TABLE die Fehlermeldung unterdrücken.
	@mysql_query('FLUSH TABLE '.TABLE_PRODUCTS);  // Macht nichts, wenn's schief geht.
  $sql = 'SHOW TABLE STATUS FROM `'.DB_DATABASE.'` LIKE \''.TABLE_PRODUCTS.'\'';
  $result = tep_db_query($sql);
  $array =  tep_db_fetch_array($result);
  $update_time = $array['Update_time'];
  if ($update_time)
    return strtotime($update_time);
  return false;
}


// Beruecksichtigt Escape- und Quote-Zeichen
function quoted_field_to_csv($field, $len = 0) {
  global $escape, $quote, $delimiter, $quoted_csv_srch, $quoted_csv_repl;
  $field = sk_strip_tags_and_entities($field);  // HTML-Tags und Entities entfernen
  $field = str_replace($quoted_csv_srch, $quoted_csv_repl, $field);
  if ($len > 0 && strlen($field) > $len) {
    $len -= 3;
    if (!empty($escape))
      while ($len >= 0 && $field[$len-1] == $escape) --$len;  // verhindert Abschneiden zwischen $escape und nachfolgendem Zeichen
    $field = substr($field, 0, $len).'...';
  }
  return $quote.$field.$quote;
}

// Arbeitet ohne Escape- und Quote-Zeichen
function field_to_csv($field, $len = 0) {
  global $delimiter;
  $field = sk_strip_tags_and_entities($field);  // HTML-Tags und Entities entfernen
  // Zeilenumbrueche und delimiter durch Leerzeichen ersetzen
  $field = str_replace(array("\r\n", "\r", "\n", "\x0B", "\x0", $delimiter), array(' ', ' ', ' ', ' ', '', ' '), $field);
  if ($len > 0 && strlen($field) > $len)
    $field = substr($field, 0, $len-3).'...';
  return $field;
}

function elmar_shutdown_function() {
	switch(connection_status()) {
		case 0:
			trigger_error('elmar_shutdown_function', E_USER_ERROR);
			break;
		case 1:
			trigger_error('connection aborted by user', E_USER_ERROR);
			break;
		case 2:
			trigger_error('connection timeout', E_USER_ERROR);
			break;
		default:
			trigger_error('connection status unhandled', E_USER_ERROR);
			break;
	}
}
?>
