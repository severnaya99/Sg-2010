<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: elmar.inc.php 64 2005-12-19 18:07:20Z Michael $
*/

#if (@include_once('checkstart.inc.php')) checkstart(basename('index.php'));

define('ELMAR_DEBUG', isset($_ENV['elmar_modul_debug']) && $_ENV['elmar_modul_debug'] == 'on');

$elmar_error_msg = array();
set_error_handler('elmar_handle_error');
elmar_error_reporting(ELMAR_DEBUG ? E_ALL : ELMAR_ERROR_REPORTING);
#elmar_error_reporting(ELMAR_DEBUG ? E_ALL | E_STRICT : ELMAR_ERROR_REPORTING);  // E_STRICT erst ab PHP5

ini_set('track_errors', '1');  // Fuer den Zugriff auf Fehlermeldungen mittels $php_errormsg.

define('ELMAR_ON_WINDOWS', (substr(PHP_OS, 0, 3) == 'WIN') ? TRUE : FALSE);

// Passend zum System das Pfadtrennzeichen einstellen
$PATH_SEPARATOR = (ELMAR_ON_WINDOWS ? "\\" : '/');

if (isset($_REQUEST['currency']) && !empty($_REQUEST['currency']))
  $currency = $_REQUEST['currency'];
else if (defined('PROD_DEFAULT_CURRENCY')) {
  $currency = PROD_DEFAULT_CURRENCY;
}

if (isset($_REQUEST['language_code']) && !empty($_REQUEST['language_code']))
  $language_code = $_REQUEST['language_code'];

// Wenn der Request keine Sprache vorgibt, Default-Einstellung des Moduls benutzen.
if (isset($_REQUEST['language']) && !empty($_REQUEST['language']))
  $language = $_REQUEST['language'];
else if (!isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) && defined('PROD_DEFAULT_LANGUAGE')) {
  // osCommerce wird vorgegaukelt, dass der Request-Parameter language gesetzt ist.
  $HTTP_GET_VARS['language'] = PROD_DEFAULT_LANGUAGE;
}

// ******************************************
// Hack fuer osCommerce unter MS-IIS, der SCRIPT_FILENAME nicht setzt.
if (!isset($HTTP_SERVER_VARS['SCRIPT_FILENAME'])) $HTTP_SERVER_VARS['SCRIPT_FILENAME'] = $_SERVER['PATH_TRANSLATED'];

// Workaround fuer Vista Nova Platin Edition RC2
if (!isset($HTTP_SERVER_VARS['HTTP_REFERER'])) $HTTP_SERVER_VARS['HTTP_REFERER'] = '';
$referer_url = $HTTP_SERVER_VARS['HTTP_REFERER'];

// Sprache, die per POST kommt, fuer GET bereitstellen.
if (isset($HTTP_POST_VARS['language']) && !isset($HTTP_GET_VARS['language'])) {
  $HTTP_GET_VARS['language'] = $HTTP_POST_VARS['language'];
}
if (isset($_POST['language']) && !isset($_GET['language'])) {
  $_GET['language'] = $_POST['language'];
}

// Waehrung, die per POST kommt, fuer GET bereitstellen.
if (isset($HTTP_POST_VARS['currency']) && !isset($HTTP_GET_VARS['currency'])) {
  $HTTP_GET_VARS['currency'] = $HTTP_POST_VARS['currency'];
}
if (isset($_POST['currency']) && !isset($_GET['currency'])) {
  $_GET['currency'] = $_POST['currency'];
}

// osCommerce-Konstanten und Funktionen laden
// Warnmeldungen dabei abschalten, weil viele osCommerce-Implementierungen sonst nur noch Fehler produzieren.
$old_elmar_error_reporting = elmar_error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

if (!defined('ELMAR_RUNS_ON')) define('ELMAR_RUNS_ON', 'osCommerce 2.2-MS2');

if (ELMAR_RUNS_ON == 'osc2nuke') {
	require_once("config.php");
	require_once("db/db.php");
	$application_top = 'modules/catalog/includes/application_top.php';
} else {
	$application_top = 'includes/application_top.php';
}

if (!@include($application_top)) {
  echo '<p style="color:white;background-color:red;margin:10px;padding:10px;font-weight:bold">Die Datei <code>'.$application_top.'</code> kann nicht ge&ouml;ffnet werden.<br><br>Vermutlich haben Sie das Elm@r-Modul nicht im Wurzelverzeichnis des Shops (<code>catalog</code>-Verzeichnis in der osCommerce-Defaultinstallation) installiert, siehe auch <a href="'.ELMAR_PATH.'readme.html#Installation">readme.html</a>.</p>';
  exit;
}

// Falls die Einstellung in application_top.php geaendert wurde.
elmar_error_reporting($old_elmar_error_reporting);

// Hacks fuer spezielle Shopsysteme wie osCommerce 2.2MS3, xt:Commerce, Zen Cart einbinden
if (!function_exists('tep_db_query')) {
  if (function_exists('xtc_db_query')) {
    require(ELMAR_PATH.'xtc.inc.php');
  } else if (function_exists('olc_db_query')) {
    require(ELMAR_PATH.'olc.inc.php');
  } else if (function_exists('zen_exit')) {
    require(ELMAR_PATH.'zen.inc.php');
    define('LINK_AMP_BUG', true);
  } else {
    $errmsg[] = 'Die Datenbankfunktionen sind nicht aufrufbar. Bitte melden, damit das Modul angepasst werden kann.';
  }
} else if (isset($osC_Database)) {
  require(ELMAR_PATH.'osc.inc.php');
}

// ******************************************
if (!defined('PHP_DATE_TIME_FORMAT')) define('PHP_DATE_TIME_FORMAT', 'd.m.Y H:i:s'); // siehe german.php von osCommerce

// Defaultwerte fuer Konstanten in elmar_config.inc.php setzen, damit fehlende Werte nach Updates keinen Aerger machen.
// Die Reihenfolge ist relevant!
if (!defined('ELMAR_SHOP_ROOT_DIR')) {
  if (ELMAR_RUNS_ON == 'osc2nuke')
	  define('ELMAR_SHOP_ROOT_DIR', HTTP_SERVER);
	else
	  define('ELMAR_SHOP_ROOT_DIR', HTTP_SERVER.DIR_WS_CATALOG);
}
if (!defined('MAX_PRODUCT_CATEGORIES')) define('MAX_PRODUCT_CATEGORIES', 1);
if (!defined('ELMAR_PRODUCT_DESCRIPTION_MAX_LENGTH')) define('ELMAR_PRODUCT_DESCRIPTION_MAX_LENGTH', 0);
if (!defined('IMAGE_PATH')) define('IMAGE_PATH', ELMAR_SHOP_ROOT_DIR.DIR_WS_IMAGES);  // Pfad zu Produktbildern
if (!defined('ELMAR_PROD_IMAGE_CALCULATE_SIZE')) define('ELMAR_PROD_IMAGE_CALCULATE_SIZE', false);
if (!defined('ELMAR_PROD_IMAGE_WIDTH')) define('ELMAR_PROD_IMAGE_WIDTH', '');
if (!defined('ELMAR_PROD_IMAGE_HEIGHT')) define('ELMAR_PROD_IMAGE_HEIGHT', '');
if (!defined('PROD_DEFAULT_LANGUAGE') && defined('DEFAULT_LANGUAGE')) define('PROD_DEFAULT_LANGUAGE', DEFAULT_LANGUAGE);
if (!defined('PROD_DEFAULT_CURRENCY') && defined('DEFAULT_CURRENCY')) define('PROD_DEFAULT_CURRENCY', DEFAULT_CURRENCY);
if (!defined('NUR_POSITIVE_ANZAHL')) define('NUR_POSITIVE_ANZAHL', FALSE);
if (!defined('NUR_MIT_PRODUKTBESCHREIBUNG')) define('NUR_MIT_PRODUKTBESCHREIBUNG', FALSE);
if (!defined('LIEFERBARKEIT_FELDNAME')) define('LIEFERBARKEIT_FELDNAME', 'products_status');
if (!defined('ELMAR_MODULE_HTML_ENTITY_REPLACE_CHAR')) define('ELMAR_MODULE_HTML_ENTITY_REPLACE_CHAR', '*');
if (!defined('DIR_FS_CATALOG_IMAGES')) define('DIR_FS_CATALOG_IMAGES', DIR_FS_CATALOG.'images/');
if (!defined('PRODUCTFILE')) define('PRODUCTFILE', $productfilenames['']);  // Name der Standardproduktdatei
if (!defined('ELMAR_ORDER_BY_VIEWED')) define('ELMAR_ORDER_BY_VIEWED', true);
if (!defined('NUR_POSITIVER_PREIS')) define('NUR_POSITIVER_PREIS', TRUE);
if (!defined('ELMAR_PRODUCT_OPTIONS')) define('ELMAR_PRODUCT_OPTIONS', true);
if (!defined('ELMAR_FSK_18')) define('ELMAR_FSK_18', false);
if (!defined('ELMAR_SEO_URLS')) define('ELMAR_SEO_URLS', false);
if (!defined('ELMAR_NEW_SHOPINFO_XML')) define('ELMAR_NEW_SHOPINFO_XML', false);
if (!defined('ELMAR_PRODUCTS_DESCRIPTION_FIELD')) define('ELMAR_PRODUCTS_DESCRIPTION_FIELD', 'products_description');

// URL fuer Produktseiten
if (!defined('PRODUCTINFOPAGE') && (!defined('ELMAR_SEO_URLS') || !ELMAR_SEO_URLS)) {
  define('PRODUCTINFOPAGE', tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=', 'NONSSL', false));
  // entspricht i.W. HTTP_SERVER.DIR_WS_CATALOG.FILENAME_PRODUCT_INFO.'?products_id=' bzw. '/products_id/'
}

// EOL = Zeilenende fuer HTML- und Text-Protokolldateien
// Passend zum System einstellen
if (ELMAR_ON_WINDOWS)
  define('EOL', "\r\n");  // Zeilenende fuer HTML- und Text-Protokolldateien
else  // Unix usw. $OSTYPE
  define('EOL', "\n");

if (!defined('DEFAULT_LINEEND')) define('DEFAULT_LINEEND', EOL);

define('MODUL_VERSION', '3');
define('MODUL_SUBVERSION', '60');
define('POWEREDBY', 'Elm@r-osCommerce-Modul/'.MODUL_VERSION.'.'.MODUL_SUBVERSION);

define('CONFIG', ELMAR_PATH.'config.inc.php');

// Zum Testen localhost benutzen.
define('ELMAR_URL', ELMAR_DEBUG ? 'http://localhost:8080/elmar/' : 'http://projekt.wifo.uni-mannheim.de/elmar/');
define('ELMAR_SCHEMA_BASE_URL', ELMAR_DEBUG ? 'http://localhost:8888/schema/' : 'http://kuhlins.de/elmar/schema/');

define('ELMAR_REGISTER_URL', ELMAR_URL.'register');
define('ELMAR_SERVICE_URL', ELMAR_URL.'service');
define('ELMAR_SHOPINFO_URL', ELMAR_URL.'shopinfo');

if (!file_exists(CONFIG) || filesize(CONFIG) == 0) {
  $configs = new Config;
  if ($configs->save() != 'OK')
    trigger_error('Die Konfigurationsdatei "'.CONFIG.'" existiert nicht bzw. ist leer und kann aufgrund fehlender Schreibrechte f&uuml;r das Modul nicht erzeugt werden. Weitere Informationen stehen in der <a href="'.ELMAR_PATH.'readme.html#Schreibrechte">Readme</a>.', E_USER_ERROR);
}

require(CONFIG);
$can_write = CAN_WRITE;
if (!$can_write) {
  $configs = new Config;
  $configs->set('CAN_WRITE', TRUE);
  $can_write = ($configs->save() == 'OK');
}

define('NO_LOG_VALUE', (LOGFORMAT == 'HTML') ? '&nbsp;' : '-');

define('LOG_DIRECTORY', 'logs/');

define('ERROR_LOG_NAME', LOG_DIRECTORY.'error.log');
define('ERROR_LOG_HTML_NAME', LOG_DIRECTORY.'error.html');
define('REQUEST_LOG_NAME', LOG_DIRECTORY.'request.log');
define('REQUEST_LOG_HTML_NAME', LOG_DIRECTORY.'request.html');
define('PRODUCTS_LOG_NAME', LOG_DIRECTORY.'products.log');
define('PRODUCTS_LOG_HTML_NAME', LOG_DIRECTORY.'products.html');

define('ERROR_LOG', ELMAR_PATH.ERROR_LOG_NAME);
define('ERROR_LOG_HTML', ELMAR_PATH.ERROR_LOG_HTML_NAME);
define('REQUEST_LOG', ELMAR_PATH.REQUEST_LOG_NAME);
define('REQUEST_LOG_HTML', ELMAR_PATH.REQUEST_LOG_HTML_NAME);
define('PRODUCTS_LOG', ELMAR_PATH.PRODUCTS_LOG_NAME);
define('PRODUCTS_LOG_HTML', ELMAR_PATH.PRODUCTS_LOG_HTML_NAME);

// Spalten der Produktdatei (angepasst an die ueblichen Bezeichnungen von Kelkoo, Pangora und Froogle).
$spalten = array('productid', 'name', 'brand', 'offerid', 'category', 'description', 'price', 'image', 'url', 'availability', 'shipping', 'special', 'expirationdate', 'oldprice');
if (ELMAR_PROD_IMAGE_CALCULATE_SIZE) {
  $spalten[] = 'image_width';
  $spalten[] = 'image_height';
}
if (defined('ELMAR_PRODUCTS_EAN_FIELD')) {
  $spalten[] = 'ean';
}
if (defined('ELMAR_PRODUCTS_ISBN_FIELD')) {
  $spalten[] = 'isbn';
}

// Bis zur Version 3.10 des Elm@r-Moduls wurden die folgenden Spaltenbezeichnungen verwendet:
// $spalten = array('Produkt_ID', 'Produkt_Name', 'Hersteller', 'Modell', 'Kategorie', 'Beschreibung', 'Preis', 'ImageLink', 'Detailseite', 'Lieferzeit', 'Versandkosten', 'Sonderangebot');
// Im XML-Schema fuer die Echtzeitabfragen werden folgende Bezeichnungen verwendet:
// $spalten = array('privateid', 'name', 'brand', 'offerid', 'type', 'longdescription', 'price', 'pictureurl', 'url', 'deliverable', 'deliverydetails', 'specialdiscount');

if (empty($currency)) sk_set_currency();

// Umrechnungskurs
$currency_rate = (isset($currencies) && is_object($currencies) && method_exists($currencies, 'is_set') && $currencies->is_set($currency)) ? $currencies->get_value($currency) : 1;
# Wenn Fehler bei aelteren osCommerce-Versionen auftreten, ersetzen durch: $currency_rate = 1;

// Sprachcode und -id setzen.
if (!empty($languages_id)) {
  // Normalerweise setzt osCommerce $languages_id in application_top,
  // dann ermitteln wir hier den passenden Sprachcode.
  $language_query = tep_db_query('select code from '.TABLE_LANGUAGES.' where languages_id='.(int)$languages_id);
  if ($language_row = tep_db_fetch_array($language_query)) {
    // Der Sprachcode muss gefunden werden.
    $language_code = $language_row['code'];
  } else {
    sk_set_language();
  }
  tep_db_free_result($language_query);
} else if (!empty($language_code)) {
  // Wenn vorhanden, dann als Request-Parameter fuer das Elm@r-Modul.
  // Hier wird die passende Sprach-ID ermittelt.
  $language_query = tep_db_query('select languages_id from '.TABLE_LANGUAGES." where code='".$language_code."'");
  if ($language_row = tep_db_fetch_array($language_query)) {
    $languages_id = $language_row['languages_id'];
  } else {
    sk_set_language();
  }
  tep_db_free_result($language_query);
} else {
  // Fehlen beide Werte, werden Defaults gesetzt.
  sk_set_language();
}

#######################################################################
// Daten fuer die Shopdatei
define('SHOPINFO_XML', 'shopinfo.xml');

$siu = NULL;
// URL fuer shopinfo.xml schon gesetzt?
if (defined('SHOPINFO_XML_URL') && SHOPINFO_XML_URL != '') {
  $siu = SHOPINFO_XML_URL;
}

$sif = NULL;
// Pfad fuer shopinfo.xml schon gesetzt?
if (defined('SHOPINFO_XML_FILE') && SHOPINFO_XML_FILE != '') {
  $sif = SHOPINFO_XML_FILE;
  //try_shopinfo($sif, $siu);
} else {
  // Versuchen, shopinfo.xml im Stammverzeichnis des Webservers anzusiedeln.
  $sif = realpath(stripslashes($_SERVER['DOCUMENT_ROOT'])).$PATH_SEPARATOR.SHOPINFO_XML;
  $siu = HTTP_SERVER.'/'.SHOPINFO_XML;
  if (!try_shopinfo($sif, $siu)) {
    // Versuchen, shopinfo.xml im catalog-Verzeichnis von osCommerce anzusiedeln.
    $sif = DIR_FS_CATALOG.SHOPINFO_XML;
    $siu = ELMAR_SHOP_ROOT_DIR.SHOPINFO_XML;
    if (!try_shopinfo($sif, $siu)) {
      // Klappt auch nicht - was nun?
      if (isset($errmsg)) {
        $errmsg[] = 'Die Shopdatei <code>shopinfo.xml</code> konnte weder im Root-Verzeichnis des Webservers <code>'.$_SERVER['DOCUMENT_ROOT'].'</code> noch im <code>catalog</code>-Verzeichnis von osCommerce <code>'.DIR_FS_CATALOG.'</code> abgelegt werden. Weitere Informationen bietet der Men&uuml;punkt &quot;Shopdatei&quot;.';
      }
    }
  }
}

define('DIR_WS_SHOPINFO_XML', $siu);  // DIR_WS_* = Webserver directories (virtual/URL)
define('DIR_FS_SHOPINFO_XML', $sif);  // DIR_FS_* = Filesystem directories (local/physical)

#######################################################################
class Config {
  var $items;

  function Config() {
    if (file_exists(CONFIG)) {
      $this->read();
    } else {
      // Default-Werte eintragen
      $this->items = array();
      $this->set('ELMAR_MODULE_ONE_TIME_INSTALL', FALSE);
      $this->set('WRITE_PRODUCTFILE', (productAnz() > 1000) && check_writeable(PRODUCTFILE));
      $this->set('WRITE_REQUESTLOG', FALSE);
      $this->set('WRITE_ERRORLOG', FALSE);
      $this->set('WRITE_PRODUCTLOG', FALSE);
      $this->set('LOGFORMAT', 'TXT');
      $this->set('MD5_CHECKSUM', '');
      $this->set('REGISTERED', FALSE);
      $this->set('CAN_WRITE', TRUE);
      $this->set('SHOPINFO_XML_URL', '');
      $this->set('SHOPINFO_XML_FILE', '');
      $this->set('ELMAR_PASSWORD', '');
    }
  }

  function read() {
    $this->items = array();
    $lines = file(CONFIG);
    // Die ersten beiden und die letzte Zeile ignorieren.
    $n = count($lines) - 1;
    for ($i = 2; $i < $n; ++$i) {
      $line = $lines[$i];
      if (ereg("define\('([^']+)', '([^']*)'\);", $line, $regs)) {
        // Wert in '...', findet auch ''
        $this->items[$regs[1]] = (($regs[2] == '') ? '' : $regs[2]);
      } else if (ereg("define\('([^']+)', ([^\)]+)\);", $line, $regs)) {
        // Wert ohne '...' wie TRUE/FALSE oder 1, 2, 3, ...
        $x = trim($regs[2]);
        if ($x == 'TRUE')
          $this->items[$regs[1]] = TRUE;
        else if ($x == 'FALSE')
          $this->items[$regs[1]] = FALSE;
        else if (is_numeric($x))
          $this->items[$regs[1]] = (int) $x;
        else
          $this->items[$regs[1]] = $x;
      } else {
        trigger_error("Oops, keine Konstante in Zeile $i der Konfigurationsdatei gefunden: $line");
      }
    }
  }

  function save() {
    $msg = 'OK';
    $now = date(PHP_DATE_TIME_FORMAT);

    $lines = array();
    $lines[] = "<?php\n";
    $lines[] = "// Automatisch generiert am: $now\n";
    foreach ($this->items as $key => $value) {
      if (is_int($value)) {
        $lines[] = "define('$key', $value);\n";
      } else if (is_bool($value)) {
        $lines[] = "define('$key', ".($value ? 'TRUE' : 'FALSE').");\n";
      } else {
        $lines[] = "define('$key', '$value');\n";
      }
    }
    $lines[] = '?'.'>';

    $fh = @fopen(CONFIG, 'wb+');
    if (!$fh) {
      $msg = 'Kann die Datei '.CONFIG.' nicht zum Schreiben &ouml;ffnen!';
      $ok = FALSE;
    } else {
      flock($fh, LOCK_EX);
      $n = @fwrite($fh, implode('', $lines));
      if (!$n) {
        $msg = 'Keine Bytes in die Datei '.CONFIG.' geschrieben!';
        $ok = FALSE;
      }
      flock($fh, LOCK_UN);
      $ret = @fclose($fh);
      if (!$ret)
        $msg = 'Konnte die Datei '.CONFIG.' nicht schlie&szlig;en!';
    }
    return $msg;
  }

  function change($key, $value) {
    $old = $this->items[$key];
    $this->items[$key] = $value;
    return $old != $value;
  }

  function set($key, $value) {
    $this->items[$key] = $value;
  }

  function get($key) {
    return $this->items[$key];
  }

  function show() {
    print_r($this->items);
  }
}

/**
 * Daten f&uuml;r die shopinfo.xml eintragen
 * @param string Dateiname der shopinfo.xml inkl. Pfad
 * @param string URL der shopinfo.xml
 */
function set_shopinfo($sif, $siu, $md5) {
  $configs = new Config;
  $configs->set('SHOPINFO_XML_FILE', $sif);
  $configs->set('SHOPINFO_XML_URL', $siu);
  $configs->set('MD5_CHECKSUM', !empty($md5) ? $md5 : '');
  $configs->save();
}

/**
 * Setzt die MD5 Checksumme der Shopdatei in config.inc.php
 * @param string MD5-Checksumme
 */
function set_config_md5($md5_string) {
  $configs = new Config;
  $configs->set('MD5_CHECKSUM', !empty($md5_string) ? $md5_string : '');
  $configs->save();
}

/**
 * Prueft, ob eine Datei geschrieben werden kann.
 * Liefert false, wenn Datei und Verzeichnis nicht existieren.
 */
function check_writeable($filename) {
  if (file_exists($filename))
    return is_writeable($filename);
  return is_writeable(dirname($filename));
/*
  // Eine nicht existierende Datei wird durch fopen erzeugt, sofern sie geschrieben werden kann!
  $check = @fopen($filename, 'a');  // 'a' um zu verhindern, dass der Inhalt der Datei geloescht wird.
  if ($check) {
    @fclose($check);
    return TRUE;
  }
  return FALSE;
*/
}

/**
 * Ueberprueft, ob die Shopdatei manuell geaendert wurde.
 * Falls nicht, kann Sie mit aktuellen Daten ueberschrieben werden.
 * Liefert TRUE, wenn der Shopbetreiber die shopinfo.xml geaendert hat.
 */
function md5_check($sif) {
  if (!file_exists($sif) || filesize($sif) == 0 || !check_writeable($sif))
    return TRUE;

  $fh = @fopen($sif, 'rb');
  if (!$fh) return FALSE;

  flock($fh, LOCK_SH);
  $content = fread($fh, filesize($sif));
  flock($fh, LOCK_UN);
  fclose($fh);

  $md5_old = md5($content);
  if ((MD5_CHECKSUM == '') || (MD5_CHECKSUM == $md5_old)) {
    // Datei wurde nicht geaendert, kann also aktualisiert werden!
    $content = generate_shopinfo();
    $md5_new = md5($content);
    if ($md5_old != $md5_new) {
        // Aufgrund neuer Daten hat die generierte Datei neuen Inhalt und muss gespeichert werden.
        $fh = @fopen($sif, 'wb+');
        if ($fh) {
          flock($fh, LOCK_EX);
          fwrite($fh, $content);
          flock($fh, LOCK_UN);
          fclose($fh);
          set_config_md5($md5_new);
        }
    }
    return FALSE;
  }
  return TRUE;
}

/**
 * Setzt die Konstante fuer die Erinnerung, dass der Shop noch nicht unter Elm@r
 * registriert wurde.
 * @param boolean Ist der Shop registriert ?
 */
function reminder_const_check($shopregister) {
  $configs = new Config;
  $configs->set('REGISTERED', $shopregister);
  $configs->save();
}

#######################################################################

function elmar_error_reporting($level) {
  global $elmar_error_reporting;
  $old_elmar_error_reporting = $elmar_error_reporting;
  error_reporting($elmar_error_reporting = $level);
  return $old_elmar_error_reporting;
}

/**
 * Handelt auftauchende Fehler. Diese werden auf dem Bildschirm ausgegeben und zusaetzlich,
 * wenn entsprechend eingestellt, in einer Datei aufgezeichnet.
 * @param string Errorname
 * @param string Errorbeschreibung
 * @param string Name der Datei, in der der Fehler auftrat
 * @param int Zeile, in der der Fehler auftrat
 * @param array Kopie der Symboltabele, die zu dem Zeitpunk aktuell war, als der Fehler auftrat
 */
function elmar_handle_error($error, $error_string, $filename, $line, $symbols) {
  global $elmar_error_reporting, $elmar_error_msg;

  $errortype = array (
    E_ERROR           => 'Error',
    E_WARNING         => 'Warning',
    E_PARSE           => 'Parsing Error',
    E_NOTICE          => 'Notice',
    E_CORE_ERROR      => 'Core Error',
    E_CORE_WARNING    => 'Core Warning',
    E_COMPILE_ERROR   => 'Compile Error',
    E_COMPILE_WARNING => 'Compile Warning',
    E_USER_ERROR      => 'User Error',
    E_USER_WARNING    => 'User Warning',
    E_USER_NOTICE     => 'User Notice'
  );

  if (defined('E_STRICT')) $errortype[E_STRICT] = 'Strict';  // E_STRICT erst ab PHP5

  $elmar_error_msg[] = array('error' => $error, 'errortype' => $errortype[$error], 'error_string' => $error_string, 'filename' => $filename, 'line' => $line);

  if (($elmar_error_reporting & $error) == 0) {
    return;
  }

  restore_error_handler();
  writeErrors($errortype[$error], $error_string, $filename, $line);
  display_error($error, $errortype[$error], $error_string, $filename, $line, $symbols);
  set_error_handler('elmar_handle_error');

  if ($error == E_ERROR || $error == E_PARSE || $error == E_CORE_ERROR || $error == E_COMPILE_ERROR || $error == E_USER_ERROR) {
    exit;
  }
}

/**
 * Gibt eine Fehlermeldung aus.
 * @param string Errorname
 * @param string Errorbeschreibung
 * @param string Name der Datei, in der der Fehler auftrat
 * @param int Zeile, in der der Fehler auftrat
 * @param array Kopie der Symboltabele, die zu dem Zeitpunk aktuell war, als der Fehler auftrat
 */
function display_error($error, $errortype, $error_string, $filename, $line, $symbols=NULL) {
  if ($error == E_ERROR || $error == E_PARSE || $error == E_CORE_ERROR || $error == E_COMPILE_ERROR || $error == E_USER_ERROR) {
    $style = 'background-color:white;color:red;border:2px solid red';
  } else {
    $style = 'background-color:white;color:blue;border:1px solid blue';
  }
  echo "\n\n<p style='$style'><big><b>$errortype</b></big> in Datei <b><code>$filename</code></b> in Zeile <b>$line</b>.<br>$error_string</p>\n\n";
/*
  if (ELMAR_DEBUG && isset($symbols)) {
    echo "<pre>";
    print_r($symbols);
    echo "</pre>\n";
  }
*/
}

#######################################################################

function emailOk() {
  return STORE_OWNER_EMAIL_ADDRESS != 'root@localhost';
}

function shopNameOk() {
  return STORE_NAME != 'osCommerce';
}

// Falls der Shopname noch der Default-Wert 'osCommerce' ist, liefert die Funktion stattdessen den Hostname.
function shopNameOrHost() {
  if (shopNameOk())
     return STORE_NAME;
  $shoparray = parse_url(HTTP_SERVER);
  return $shoparray['host'];
}

// Gibt ein Feld mit den Mappings fuer die shopinfo.xml Datei zurueck.
function mapArray($type, $column, $columnName) {
  return array("column" => $column, "columnName" => $columnName, "type" => $type);
}

// Liefert die Anzahl der Produktbeschreibungen, die laenger als $maxlen sind.
function countLongDescriptions($maxlen) {
  global $languages_id;
  $sql = 'SELECT COUNT(*) AS count FROM '.TABLE_PRODUCTS_DESCRIPTION.' WHERE language_id='.(int)$languages_id.' AND CHAR_LENGTH(products_description) > '.$maxlen;
  $query = tep_db_query($sql);
  $res = tep_db_fetch_array($query);
  $count = $res['count'];
  tep_db_free_result($query);
  return $count;
}

// Liefert die Anzahl der Produktdatensaetze
function productAnz() {
  $sql = 'SELECT COUNT(*) AS count FROM '.TABLE_PRODUCTS;
  if (NUR_AB_LAGER || NUR_POSITIVE_ANZAHL) {
    $sql .= ' WHERE';
    if (NUR_AB_LAGER) {
      $sql .= ' products_status > 0';
      if (NUR_POSITIVE_ANZAHL) $sql .= ' AND';
    }
    if (NUR_POSITIVE_ANZAHL) $sql .= ' products_quantity > 0';
  }
  $products_query = tep_db_query($sql);
  $products = tep_db_fetch_array($products_query);
  $count = $products['count'];
  tep_db_free_result($products_query);
  return $count;
}

// Produktdateizugriff für die shopinfo.xml
function offlineRequest(&$requests) {
  global $spalten;
	$offlineRequest = & $requests->addChild("OfflineRequest");
		$updateMethods = & $offlineRequest->addChild("UpdateMethods");
			//$email = & $updateMethods->addChild("Email");
			//$ftp = & $updateMethods->addChild("Ftp");
			//$manual = & $updateMethods->addChild("Manual");
			$directDownload = & $updateMethods->addChild("DirectDownload", NULL, array("day" => "daily", "from" => "0", "to" => "2400"));
		$logFormat = & $offlineRequest->addChild("Format");
			$tabular = & $logFormat->addChild("Tabular");
				$csv = & $tabular->addChild("CSV");
					$urltocsv = ELMAR_SHOP_ROOT_DIR.'elmar_products.php';
					$csvUrl = & $csv->addChild("Url", $urltocsv);
					if (defined('DEFAULT_QUOTE'))
						$titel = DEFAULT_QUOTE.implode(DEFAULT_QUOTE.DEFAULT_DELIMITER.DEFAULT_QUOTE, $spalten).DEFAULT_QUOTE;
					else
						$titel = implode(DEFAULT_DELIMITER, $spalten);
					$headerarray = array("columns" => count($spalten));
					#$header= & $csv->addChild("Header", $titel, $headerarray);
					$header= & $csv->addChild("Header", $titel, $headerarray, null, true);  // CDATA
					$specialarray = array("delimiter" => (DEFAULT_DELIMITER == "\t" ? '[tab]' : DEFAULT_DELIMITER),
																"lineend" => (DEFAULT_LINEEND=="\n" ? '\n' : (DEFAULT_LINEEND=="\r" ? '\r' : '\r\n')));
					if (defined('DEFAULT_ESCAPE')) $specialarray["escaped"] = (DEFAULT_ESCAPE == '"' ? '&quot;' : DEFAULT_ESCAPE);
					if (defined('DEFAULT_QUOTE')) $specialarray["quoted"] = (DEFAULT_QUOTE == '"' ? '&quot;' : DEFAULT_QUOTE);
					$specialCharacters= & $csv->addChild("SpecialCharacters", NULL, $specialarray);
				$mappings = & $tabular->addChild("Mappings");
					$map1 = mapArray('privateid', '1', $spalten[0]);
					$mapping1 = & $mappings->addChild("Mapping", NULL, $map1);
					$map2 = mapArray('name', '2', $spalten[1]);
					$mapping2 = & $mappings->addChild("Mapping", NULL, $map2);
					$map3 = mapArray('brand', '3', $spalten[2]);
					$mapping3 = & $mappings->addChild("Mapping", NULL, $map3);
					// $map4 = mapArray('shortdescription','4', $spalten[3]);
					// $mapping4 = & $mappings->addChild("Mapping", NULL, $map4);
					$map5 = mapArray('type', '5', $spalten[4]);
					$mapping5 = & $mappings->addChild("Mapping", NULL, $map5);
					$map6 = mapArray('longdescription', '6', $spalten[5]);
					$mapping6 = & $mappings->addChild("Mapping", NULL, $map6);
					$map7 = mapArray('price', '7', $spalten[6]);
					$mapping7 = & $mappings->addChild("Mapping", NULL, $map7);
					$map8 = mapArray('pictureurl', '8', $spalten[7]);
					$mapping8 = & $mappings->addChild("Mapping", NULL, $map8);
					$map9 = mapArray('url', '9', $spalten[8]);
					$mapping9 = & $mappings->addChild("Mapping", NULL, $map9);
					$map10 = mapArray('deliverable', '10', $spalten[9]);
					$mapping10 = & $mappings->addChild("Mapping", NULL, $map10);
					$map11 = mapArray('deliverydetails', '11', $spalten[10]);
					$mapping11 = & $mappings->addChild("Mapping", NULL, $map11);
					$map12 = mapArray('specialdiscount', '12', $spalten[11]);
					$mapping12 = & $mappings->addChild("Mapping", NULL, $map12);
	return $offlineRequest;
}

// Erzeugt die shopinfo.xml Datei
function generate_shopinfo() {
  global $languages_id, $language_code, $currency, $currency_rate;

  // Alle Includes hier, wegen der Pfadangabe. Reihenfolge ist relevant!
  require(ELMAR_PATH.'tools/pear.php');
  require(ELMAR_PATH.'tools/node.php');
  require(ELMAR_PATH.'tools/parser.php');
  require(ELMAR_PATH.'tools/tree.php');

  $attributes = '1.0" encoding="ISO-8859-1';
  $tree = new XML_Tree(NULL, $attributes);

	if (ELMAR_NEW_SHOPINFO_XML) {
		$XMLarray = array('xmlns' => 'http://elektronischer-markt.de/schema/shopinfo-2.0',
											'xmlns:c' => 'http://elektronischer-markt.de/schema/categories-2.0',
											'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
											'xsi:schemaLocation' => 'http://elektronischer-markt.de/schema/shopinfo-2.0 '.ELMAR_SCHEMA_BASE_URL.'shopinfo-2.0.xsd',
											'version' => '2.0');
	  $root = & $tree->addRoot('Shop', NULL , $XMLarray);
	} else {
		$XMLarray = array('xmlns:osp' => 'http://elektronischer-markt.de/schema',
											'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
											'xsi:schemaLocation' => 'http://elektronischer-markt.de/schema '.ELMAR_SCHEMA_BASE_URL.'shop.xsd');
	  $root = & $tree->addRoot('osp:Shop', NULL , $XMLarray);
	}

  $common = & $root->addChild("Common");
  $xml_version = & $common->addChild("Version", ELMAR_NEW_SHOPINFO_XML ? '2.0' : '1.1');
  $xml_language = & $common->addChild("Language", $language_code);
  $xml_currency = & $common->addChild("Currency", $currency);
  if (ELMAR_NEW_SHOPINFO_XML)
    $xml_generator = & $common->addChild('Generator',
      'Elm@r-Modul osCommerce/'.MODUL_VERSION.'.'.MODUL_SUBVERSION.' (http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce)');

  $name = & $root->addChild("Name", shopNameOrHost());

  $shopUrl = ELMAR_SHOP_ROOT_DIR; //tep_href_link('index.php', '', 'NONSSL', false);
  $url = & $root->addChild("Url", $shopUrl);

  $requests = & $root->addChild("Requests");

    // Die Parameter fuer die Echtzeitanfrage, siehe elmar_request.php
    $requestUrl = ELMAR_SHOP_ROOT_DIR.'elmar_request.php';  // Url zur Echtzeitabfrage

    $onlineRequest = & $requests->addChild("OnlineRequest", Null, array("method" => "GET POST TRACE"));
      $processor = & $onlineRequest->addChild("Processor", $requestUrl);
      $paramBrand= & $onlineRequest->addChild("ParamBrand", 'p_brand');
      $paramProduct = & $onlineRequest->addChild("ParamProduct", 'p_product');
      $paramDescription = & $onlineRequest->addChild("ParamDescription", 'p_desc');
			if (defined('ELMAR_PRODUCTS_EAN_FIELD')) {
				$paramEan = & $onlineRequest->addChild("ParamID", 'p_ean', array("type" => "EAN"));
			}
			if (defined('ELMAR_PRODUCTS_ISBN_FIELD')) {
				$paramIsbn = & $onlineRequest->addChild("ParamID", 'p_isbn', array("type" => "ISBN"));
			}
			if (ELMAR_NEW_SHOPINFO_XML) {
				$paramId = & $onlineRequest->addChild("ParamID", 'p_id', array("type" => "ID"));
			}
      $paramQuickSearch = & $onlineRequest->addChild("ParamQuickSearch", 'p_qs');
      $paramPriceBounds = & $onlineRequest->addChild("ParamPriceBounds");
        $lowerPrice = & $paramPriceBounds->addChild("LowerPrice", 'p_low');
        $upperPrice = & $paramPriceBounds->addChild("UpperPrice", 'p_high');
      $paramSize = & $onlineRequest->addChild("ParamSize", 'p_size');
      $paramIP = & $onlineRequest->addChild("ParamIP", 'p_ip');

    $offlineRequest = & offlineRequest($requests);

	if (ELMAR_NEW_SHOPINFO_XML) {
    $affiliateRequest = & $requests->addChild('AffiliateRequest', NULL, array('method' => 'GET POST TRACE'));
    	$processor = & $affiliateRequest->addChild('Processor', ELMAR_SHOP_ROOT_DIR.'elmar_affiliate.php');
    	$paramName = & $affiliateRequest->addChild('ParamName', 'name');
	}

  /*
  $interface = & $root->addChild("Interface");
      $positionLimit = & $interface->addChild("PositionLimit");
  */

  if (defined('STORE_LOGO') && file_exists(DIR_FS_CATALOG.DIR_WS_IMAGES.STORE_LOGO))
    $logo = & $root->addChild("Logo", IMAGE_PATH.STORE_LOGO);

  /*
  $address = & $root->addChild("Adress");
      $company= & $address->addChild("Company");
      $street = & $address->addChild("Street");
      $city = & $address->addChild("City");
  */

  if (emailOk()) {
    $contact = & $root->addChild("Contact");
        $publicMailAddress = & $contact->addChild("PublicMailAddress", STORE_OWNER_EMAIL_ADDRESS);
        $privateMailAddress = & $contact->addChild("PrivateMailAddress", STORE_OWNER_EMAIL_ADDRESS);
  }
  /*
  $orderPhone = & $contact->addChild("OrderPhone");
      $number= & $orderPhone->addChild("Number");
      $costPerMinute= & $orderPhone->addChild("CostPerMinute");
  $orderFax= & $contact->addChild("OrderFax");
      $number = & $orderFax->addChild("Number");
      $costPerMinute= & $orderFax->addChild("CostPerMinute");
  $hotline = & $contact->addChild("Hotline");
  */

  $prodSum = productAnz();
  $categories = & $root->addChild("Categories");
    if ($prodSum > 0)
      $totalProductCount = & $categories->addChild("TotalProductCount", $prodSum);

		$ns = ELMAR_NEW_SHOPINFO_XML ? 'c:' : '';
		$attrib = ELMAR_NEW_SHOPINFO_XML ? array('lang' => $language_code) : NULL;
		$mapOther = $language_code=='de' ? 'Sonstiges' : 'Other';

    // Die Produktkategorien der ersten Ebene schreiben. Durch "group by" Doppelte herauswerfen.
    $categories_query = tep_db_query('select c.categories_id, cd.categories_name from '.TABLE_CATEGORIES.' c left join '.TABLE_CATEGORIES_DESCRIPTION.' cd using(categories_id) where c.parent_id=0 and cd.language_id='.(int)$languages_id.' group by cd.categories_name');
    if (tep_db_num_rows($categories_query)) {
      while ($category = tep_db_fetch_array($categories_query)) {
        $categories_name = trim($category['categories_name']);
        if ($categories_name != '') {
		      $item = & $categories->addChild("Item", NULL, $attrib);
            $name= & $item->addChild($ns."Name", $categories_name);
            if (function_exists('tep_count_products_in_category') && ($cpic = tep_count_products_in_category($category['categories_id']))) {
              $productCount = & $item->addChild($ns."ProductCount", $cpic);
            }
            $mapping = & $item->addChild($ns."Mapping", KategorieAnpassen($category['categories_name'], $mapOther));
        }
      }
    } else {
      $item = & $categories->addChild("Item", NULL, $attrib);
        $name= & $item->addChild($ns."Name", $mapOther);
        if ($prodSum > 0)
          $productCount = & $item->addChild($ns."ProductCount", $prodSum);
        $mapping = & $item->addChild($ns."Mapping", $mapOther);
    }

  $lastschriftverfahren = (defined('MODULE_PAYMENT_BANKTRANSFER_STATUS') && (MODULE_PAYMENT_BANKTRANSFER_STATUS == 'True')) ? true : false;
  $nachnahme = (defined('MODULE_PAYMENT_COD_STATUS') && (MODULE_PAYMENT_COD_STATUS == 'True')) ? true : false;
  $paypal = (defined('MODULE_PAYMENT_PAYPAL_STATUS') && (MODULE_PAYMENT_PAYPAL_STATUS == 'True')) ? true : false;
  $rechnung = (defined('MODULE_PAYMENT_INVOICE_STATUS') && (MODULE_PAYMENT_INVOICE_STATUS == 'True')) ? true : false;
  $vorkasse = (defined('MODULE_PAYMENT_MONEYORDER_STATUS') && (MODULE_PAYMENT_MONEYORDER_STATUS == 'True')) ? true : false;

  #$barzahlung = (defined('MODULE_PAYMENT_CASH_STATUS') && (MODULE_PAYMENT_CASH_STATUS == 'True')) ? true : false;
  #e-cash (elektronisches Zahlungsmittel); money transfer (Ueberweisung); cheque (Scheck)

  if ($nachnahme || $paypal || $lastschriftverfahren || $rechnung || $vorkasse) {
    $payment = & $root->addChild("Payment");
    if ($nachnahme) {
      $item = & $payment->addChild("Item");
        $name = & $item->addChild("Name", 'on delivery');  // Nachnahme
        //$surcharge = & $item->addChild("Surcharge");
        //$maxSurcharge = & $item->addChild("MaxSurcharge");
        //$relativeSurcharge = & $item->addChild("RelativeSurcharge");
    }
    if ($paypal) {
      $item = & $payment->addChild("Item");
        $name = & $item->addChild("Name", 'paypal');  // PayPal
    }
    if ($lastschriftverfahren) {
      $item = & $payment->addChild("Item");
        $name = & $item->addChild("Name", 'debit');  // Bankeinzug/Lastschrift
    }
    if ($rechnung) {
      $item = & $payment->addChild("Item");
        $name = & $item->addChild("Name", 'invoice');  // Rechnung
    }
    if ($vorkasse) {
      $item = & $payment->addChild("Item");
        $name = & $item->addChild("Name", 'pre-payment');  // Vorauszahlung
    }
  }

  $free_shipping = (defined('MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING') && MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING == 'true') ? true : false;
  $shipping_flat_status = (defined('MODULE_SHIPPING_FLAT_STATUS') && MODULE_SHIPPING_FLAT_STATUS == 'True') ? true : false;
  if ($free_shipping || $shipping_flat_status) {
    $forwardExpenses = & $root->addChild("ForwardExpenses");
    if ($shipping_flat_status) {
      if (DISPLAY_PRICE_WITH_TAX == 'true') {
        $shipping_flat_cost = tep_add_tax(MODULE_SHIPPING_FLAT_COST, tep_get_tax_rate(MODULE_SHIPPING_FLAT_TAX_CLASS, STORE_COUNTRY, MODULE_SHIPPING_FLAT_ZONE));
      } else {
        $shipping_flat_cost = MODULE_SHIPPING_FLAT_COST;
      }
      $flatRate = & $forwardExpenses->addChild("FlatRate", number_format($shipping_flat_cost * $currency_rate, 2));
    }
    if ($free_shipping) {
      $upperBound = & $forwardExpenses->addChild("UpperBound", number_format(MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING_OVER * $currency_rate, 2));
    }
  }

  /*
  $features = & $root->addChild("Features");
      $installment = & $features->addChild("Installment");
      $orderTracking = & $features->addChild("OrderTracking");
      $deliverTracking = & $features->addChild("DeliverTRacking");
      $installationAssistance = & $features->addChild("InstallationAssistance");
      $repairService = & $features->addChild("RepairService");
      $careAfterPurchase = & $features->addChild("CareAfterPurchase");
      $giftService = & $features->addChild("GiftService");
  */

  $technology = & $root->addChild("Technology");
      if (ENABLE_SSL) $ssl = & $technology->addChild("SSL");
      $search = & $technology->addChild("Search");
      // $set = & $technology->addChild("SET");

  if (defined('FILENAME_CONDITIONS')) {
    $termAndConditions = & $root->addChild("TermsAndConditions");
      $url = & $termAndConditions->addChild("Url", tep_href_link(FILENAME_CONDITIONS, '', 'NONSSL', false));
      // $return = & $termAndConditions->addChild("Return");
  }

  /*
  $specialDiscount = & $root->addChild("SpecialDiscount");
      $description = & $specialDiscount->addChild("Description");
      $url = & $specialDiscount->addChild("Url");
  $certifications= & $root->addChild("Certifications");
      $item = & $certifications->addChild("Item");
  $self_Discription = & $root->addChild("Self-Discription");
  */

  $content = $tree->get();
  $content = str_replace('&apos;', '\'', $content);  // ersetzen von &apos;
  $content = str_replace('&#124;', '|', $content);  // ersetzen von &#124;
  return $content;
}

#######################################################################
/**
 * Protokoliert die Anfragen nach der Produktdatei
 * @param boolean Wurde die Produktdatei neu erzeugt?
 */
function productLog($erzeugt = FALSE) {
  global $languages_id, $language_code, $currency, $currency_rate,
         $productfiletype, $force, $quote, $escape, $delimiter, $lineend,
         $db_part, $limit, $use_prod_cat_idx, $ignored_products, $bytes;

  if (!WRITE_PRODUCTLOG)
    return;  // keine Protokollierung

  if (LOGFORMAT == 'HTML') {
    $log_quote = empty($quote) ? '&nbsp;' : htmlentities($quote);
    $log_escape = empty($escape) ? '&nbsp;' : htmlentities($escape);
    $log_delimiter = ($delimiter == "\t") ? 'TAB' : htmlentities($delimiter);
  } else {
    $log_quote = $quote;
    $log_escape = $escape;
    $log_delimiter = ($delimiter == "\t" ? 'TAB' : $delimiter);
  }

  if ($lineend == "\r\n")
    $log_lineend = 'CRLF';
  else if ($lineend == "\n")
    $log_lineend = 'LF';
  else if ($lineend == "\r")
    $log_lineend = 'CR';
  else  // Sollte nicht passieren!
    $log_lineend = '???';

  $now = date(PHP_DATE_TIME_FORMAT);
  $erz = $erzeugt ? ((!empty($productfiletype) ? $productfiletype : ($force ? 'Forced' : 'Ja'))
                     . ($db_part ? '/'.$db_part : '')
                     . ($use_prod_cat_idx ? '+' : '')
                     . ($limit!=0x7FFFFFFF ? ' ['.$limit.']' : '')
                     . ($ignored_products > 0 ? ' ~'.$ignored_products : '')
                    )
                  : ($_SERVER['REQUEST_METHOD'] == 'HEAD' ? 'HEAD' : 'Nein');

  $referrer = empty($_SERVER['HTTP_REFERER']) ? NO_LOG_VALUE : $_SERVER['HTTP_REFERER'];
  $user_agent = empty($_SERVER['HTTP_USER_AGENT']) ? NO_LOG_VALUE : $_SERVER['HTTP_USER_AGENT'];
  $from = empty($_SERVER['HTTP_FROM']) ? NO_LOG_VALUE : $_SERVER['HTTP_FROM'];
  $remote_addr = empty($_SERVER['REMOTE_ADDR']) ? NO_LOG_VALUE : $_SERVER['REMOTE_ADDR'];

  if (LOGFORMAT == 'HTML') {
    $fn = PRODUCTS_LOG_HTML;
    if ($referrer != NO_LOG_VALUE) {
      $referrer = htmlspecialchars($referrer);
      $referrer = '<a href="'.$referrer.'">'.$referrer.'</a>';
    }
    $content = '<tr><td>'.$now.'</td><td align="center">'.$erz.'</td><td align="center">'.$log_delimiter.'</td><td align="center">'.$log_escape.'</td><td align="center">'.$log_quote.'</td><td align="center">'.$log_lineend.'</td><td align="center">'.$languages_id.' '.$language_code.'</td><td align="center">'.$currency.' '.$currency_rate.'</td><td nowrap>'.$referrer.'</td><td nowrap>'.$user_agent.'</td><td nowrap>'.$from.'</td><td nowrap>'.$remote_addr.'</td><td align="right">'.$bytes.'</td>';
    if (function_exists('memory_get_usage')) $content .= '<td align="right">'.number_format(memory_get_usage()).'</td>';
    $content .= '</tr>'.EOL;
  } else {  // LOGFORMAT == 'TXT'
    $fn = PRODUCTS_LOG;
    $content = $now.LOG_DELIMITER.$erz.LOG_DELIMITER.$log_delimiter.LOG_DELIMITER.$log_escape.LOG_DELIMITER.$log_quote.LOG_DELIMITER.$log_lineend.LOG_DELIMITER.$languages_id.' '.$language_code.LOG_DELIMITER.$currency.' '.$currency_rate.LOG_DELIMITER.$referrer.LOG_DELIMITER.$user_agent.LOG_DELIMITER.$from.LOG_DELIMITER.$remote_addr.LOG_DELIMITER.$bytes;
    if (function_exists('memory_get_usage')) $content .= LOG_DELIMITER.number_format(memory_get_usage());
    $content .= EOL;
  }

  $header = !file_exists($fn) || (filesize($fn) == 0);
  $fh = @fopen($fn, 'ab');
  if (!$fh) {
    error_log(date(PHP_DATE_TIME_FORMAT).' Warnung Elm@r-Modul: Kann die Datei '.$fn.' nicht zum Schreiben oeffnen!', 0);
  } else {
    flock($fh, LOCK_EX);
    if ($header == TRUE) {
      if (LOGFORMAT == 'HTML') {
        $title = "<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">\n<html>\n<head>\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=".(defined('CHARSET') ? CHARSET : 'iso-8859-1')."\">\n<link rel=\"stylesheet\" type=\"text/css\" href=\"elmar/logs/log.css\">\n<title>Produktdateianfragen</title>\n</head>\n<body>\n<table border=\"1\" cellpadding=\"5\" cellspacing=\"0\" summary=\"Produktdateianfragen\">\n<tr><th>Zeitpunkt</th><th>Neuerzeugung</th><th>delimiter</th><th>escape</th><th>quote</th><th>lineend</th><th>Lang</th><th>Currency</th><th>REFERER</th><th>USER_AGENT</th><th>FROM</th><th>RequestIP</th><th>Bytes</th>";
				if (function_exists('memory_get_usage')) $title .= '<th>RAM</th>';
				$title .= '</tr>'.EOL;
      } else {  // LOGFORMAT == 'TXT'
        $title = 'Zeitpunkt'.LOG_DELIMITER.'Neuerzeugung'.LOG_DELIMITER.'delimiter'.LOG_DELIMITER.'escape'.LOG_DELIMITER.'quote'.LOG_DELIMITER.'lineend'.LOG_DELIMITER.'Lang'.LOG_DELIMITER.'Currency'.LOG_DELIMITER.'REFERER'.LOG_DELIMITER.'USER_AGENT'.LOG_DELIMITER.'FROM'.LOG_DELIMITER.'RequestIP'.LOG_DELIMITER.'Bytes';
				if (function_exists('memory_get_usage')) $title .= LOG_DELIMITER.'RAM';
				$title .= EOL;
      }
      fwrite($fh, $title);
    }
    fwrite($fh, $content);
    flock($fh, LOCK_UN);
    fclose($fh);
  }
}

/**
 * Protokolliert Fehler in einer Datei.
 * @param string Error
 * @param string Errorbeschreibung
 * @param string Name der Datei, in der der Fehler auftrat
 * @param int Zeile, in der der Fehler auftrat
 */
function writeErrors($error, $error_string, $filename, $line) {
  if (!defined('WRITE_ERRORLOG') || !WRITE_ERRORLOG || !defined('LOGFORMAT'))
    return;  // keine Protokollierung

  if (!defined('PHP_DATE_TIME_FORMAT')) define('PHP_DATE_TIME_FORMAT', 'd.m.Y H:i:s'); // siehe german.php von osCommerce

  $now = date(PHP_DATE_TIME_FORMAT);
  if (LOGFORMAT == 'HTML') {
    $fn = ERROR_LOG_HTML;
    $content = '<tr><td nowrap>'.$now.'</td><td nowrap>'.$error.'</td><td nowrap>'.$filename.'</td><td align="center">'.$line.'</td><td nowrap>'.$error_string.'</td></tr>'.EOL;
  } else {  // LOGFORMAT == 'TXT'
    $fn = ERROR_LOG;
    $content = $now.LOG_DELIMITER.$filename.LOG_DELIMITER.$line.LOG_DELIMITER.$error_string.EOL;
  }

  clearstatcache();
  $header = !file_exists($fn) || (filesize($fn) == 0);
  $fh = @fopen($fn, 'ab');
  if (!$fh) {
    static $cnt = 0;  // Aufrufe zaehlen und nur beim ersten ins error_log des Webservers schreiben
    if ($cnt++ == 0)
      error_log(date(PHP_DATE_TIME_FORMAT).' Warnung Elm@r-Modul: Kann die Datei '.$fn.' nicht zum Schreiben oeffnen!', 0);
  } else {
    flock($fh, LOCK_EX);
    if ($header == TRUE) {
      if (LOGFORMAT == 'HTML') {
        $title = "<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">\n<html>\n<head>\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=".(defined('CHARSET') ? CHARSET : 'iso-8859-1')."\">\n<link rel=\"stylesheet\" type=\"text/css\" href=\"elmar/logs/log.css\">\n<title>Fehlermeldungen</title>\n</head>\n<body>\n<table border=\"1\" cellpadding=\"5\" cellspacing=\"0\" summary=\"Fehlermeldungen\">\n<tr><th>Zeitpunkt</th><th>Fehlerart</th><th>Dateiname</th><th>Zeile</th><th>Fehlermeldung</th></tr>".EOL;
      } else {  // LOGFORMAT == 'TXT'
        $title = 'Zeitpunkt'.LOG_DELIMITER.'Dateiname'.LOG_DELIMITER.'Zeile'.LOG_DELIMITER.'Fehlermeldung'.EOL;
      }
      fwrite($fh, $title);
    }
    fwrite($fh, $content);
    flock($fh, LOCK_UN);
    fclose($fh);
  }
  // Alternativ: error_log($content, 3, $fn);
}

function try_shopinfo($sif, $siu) {
  // Wenn noch keine shopinfo.xml existiert, eine anlegen und entsprechende Konstanten setzen.
  if (!file_exists($sif) || filesize($sif) == 0) {
    $fh = @fopen($sif, 'wb');
    if ($fh) {
      flock($fh, LOCK_EX);
      $content = generate_shopinfo();
      fwrite($fh, $content);
      flock($fh, LOCK_UN);
      fclose($fh);

      set_shopinfo($sif, $siu, md5($content));
      return TRUE;
    }
    return FALSE;
  }
  return TRUE;
}

function check_url($url) {
  if (empty($url))
    return FALSE;

  $fh = @fopen($url, 'r');
  if (!$fh) {
    $r = FALSE;
  } else {
    //$buf = fgets($fh);
    //echo htmlentities($buf)."\n";
    //echo (feof($fh) ? 'EOF' : 'not EOF')."\n";
    $r = TRUE;
    fclose($fh);
  }
  return $r;
}

function getMemUsage() {
	if (substr(PHP_OS, 0, 3) == 'WIN') {
  	$output = array();
		exec('tasklist /FI "PID eq ' . getmypid() . '" /FO LIST', $output);
		return substr($output[5], strpos($output[5], ':') + 1);
	}
	if (function_exists('memory_get_usage')) {
	  return memory_get_usage();
	}
	return FALSE;
}

// Der Wert fuer $products_id wird intern ermittelt und kommt nicht von aussen!
function sk_generate_category_path($products_id) {
  // angepasst aus admin/categories.php
  $product_categories_string = '';
  $product_categories = tep_generate_category_path($products_id, 'product');
  for ($i = 0, $n = min(MAX_PRODUCT_CATEGORIES, sizeof($product_categories)); $i < $n; $i++) {
    // Alle Kategorieblaetter, denen das Produkt zugeordnet ist.
    $category_path = '';
    for ($j = 0, $k = sizeof($product_categories[$i]); $j < $k; $j++) {
      // Alle Oberkategorien, unter denen das Kategorieblatt steht.
      $category_path .= $product_categories[$i][$j]['text'] . '|';
      # $product_categories[$i][$j]['id'] liefert die Produktkategorie-ID
    }
    $category_path = substr($category_path, 0, -1);
    $product_categories_string .= $category_path . '; ';
    # $product_categories[$i][$k-1]['id'] liefert die ID des Kategorieblatts.
  }
  $product_categories_string = substr($product_categories_string, 0, -2);

  return $product_categories_string;
}

// Kopiert aus admin/includes/functions/general.php
function tep_generate_category_path($id, $from = 'category', $categories_array = '', $index = 0) {
  global $languages_id;

  if (!is_array($categories_array)) $categories_array = array();

  if ($from == 'product') {
    $categories_query = tep_db_query("select categories_id from " . TABLE_PRODUCTS_TO_CATEGORIES . " where products_id = '" . (int)$id . "'");
    while ($categories = tep_db_fetch_array($categories_query)) {
      if ($categories['categories_id'] == '0') {
        $categories_array[$index][] = array('id' => '0', 'text' => 'Top');  // eigentlich TEXT_TOP statt 'Top'
      } else {
        $category_query = tep_db_query("select cd.categories_name, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.categories_id = '" . (int)$categories['categories_id'] . "' and c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "'");
        $category = tep_db_fetch_array($category_query);
        $categories_array[$index][] = array('id' => $categories['categories_id'], 'text' => $category['categories_name']);
        if ( (tep_not_null($category['parent_id'])) && ($category['parent_id'] != '0') )
          $categories_array = tep_generate_category_path($category['parent_id'], 'category', $categories_array, $index);
        $categories_array[$index] = array_reverse($categories_array[$index]);
      }
      $index++;
    }
  } elseif ($from == 'category') {
    $category_query = tep_db_query("select cd.categories_name, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.categories_id = '" . (int)$id . "' and c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "'");
    $category = tep_db_fetch_array($category_query);
    $categories_array[$index][] = array('id' => $id, 'text' => $category['categories_name']);
    if ( (tep_not_null($category['parent_id'])) && ($category['parent_id'] != '0') )
      $categories_array = tep_generate_category_path($category['parent_id'], 'category', $categories_array, $index);
  }

  return $categories_array;
}

function KategorieAnpassen($cat, $cat_default='') {
  global $categorytable;  // siehe elmar_config.inc.php
  if (isset($categorytable[$cat]))
    return $categorytable[$cat];
  return $cat_default != '' ? $cat_default : $cat;
}

$html_translation = array_flip(get_html_translation_table(HTML_ENTITIES));
$html_translation['’'] = '\'';
$html_translation['´'] = '\'';
$html_translation['`'] = '\'';
if (isset($elmar_html_translation) && is_array($elmar_html_translation))
  $html_translation = array_merge($html_translation, $elmar_html_translation);

// HTML-Tags und Entities entfernen
function sk_strip_tags_and_entities($s) {
  global $html_translation;

  $s = preg_replace('/<(br\/?|\/p|p)>/i', ' ', $s);  // Texte mit Leerzeichen trennen. Koennte fuer weitere HTML-Tags sinnvoll sein.

  $s = strip_tags(trim($s));
  $s = strtr($s, $html_translation);

  // HTML-Entities fuer ASCII-Zeichen bis 255 durch das entsprechende chr-Zeichen ersetzen
  $s = preg_replace('/&#(\\d{1,2}|1\\d{2}|2[0-4]\\d|25[0-5]);/e', "chr(\\1)", $s);

  // HTML-Entities fuer ASCII-Zeichen bis 0xFF durch das entsprechende chr-Zeichen ersetzen
  $s = preg_replace('/&#x([0-9a-f]{1,2});/ie', "chr(0x\\1)", $s);

  // Alle anderen HTML-Entities ueber 255 (Unicode) wie &#x12A9; oder &#8482; ersetzen bzw. entfernen.
  $s = preg_replace('/&#(\\d+|x[0-9a-f]+);/i', ELMAR_MODULE_HTML_ENTITY_REPLACE_CHAR, $s);

  // White-space wie mehrfache Leerzeichen, Zeilenumbrueche usw. durch ein Leerzeichen ersetzen
  $s = preg_replace('/\\s+/', ' ', $s);
  return $s;
}

// Unterstuetzung fuer "Product Extra Fields"
// http://www.oscommerce.com/community/contributions,2202/
// Ein Beitrag von Giuseppe Costa.
function get_product_extra_fields($pid) {
  $products_description_extra = '';
  $products_extra_fields_query = tep_db_query('SELECT pef.*, ptf.* FROM '.TABLE_PRODUCTS_EXTRA_FIELDS.' pef, '.TABLE_PRODUCTS_TO_PRODUCTS_EXTRA_FIELDS.' ptf WHERE ptf.products_id = '.$pid.' AND pef.products_extra_fields_status = 1 ORDER BY products_extra_fields_order');
  while ($products_extra_fields = tep_db_fetch_array($products_extra_fields_query)) {
    $extra_product_field[$products_extra_fields['products_extra_fields_id']] = $products_extra_fields['products_extra_fields_value'];
  }
  $extra_fields_query = tep_db_query('SELECT * FROM '.TABLE_PRODUCTS_EXTRA_FIELDS.' WHERE products_extra_fields_status = 1 ORDER BY products_extra_fields_order');
  while ($extra_fields = tep_db_fetch_array($extra_fields_query)) {
    if ($extra_product_field[$extra_fields['products_extra_fields_id']] != '') {
      $products_description_extra .= $extra_fields['products_extra_fields_name'].': '.$extra_product_field[$extra_fields['products_extra_fields_id']]."\n";
    }
  }
  unset($extra_product_field);
  unset($extra_fields);
  return $products_description_extra;
}

function get_language_codes() {
  // Sprachcodes
  $language_codes = array();
  $language_codes_query = tep_db_query('select code from '.TABLE_LANGUAGES.' order by code');
  while ($language_codes_row = tep_db_fetch_array($language_codes_query)) {
    $language_codes[] = $language_codes_row['code'];
  }
  return $language_codes;
}

function get_currency_codes() {
  // Waehrungscodes
  $currency_codes = array();
  $currency_codes_query = tep_db_query('select code from '.TABLE_CURRENCIES.' order by code');
  while ($currency_codes_row = tep_db_fetch_array($currency_codes_query)) {
    $currency_codes[] = $currency_codes_row['code'];
  }
  return $currency_codes;
}

function sk_set_currency() {
  global $currency;
  $currency_codes = get_currency_codes();
  if (count($currency_codes) == 1) {
    // Wenn nur eine Waehrung definiert ist, benutzen wir diese.
    $currency = $currency_codes[0];
  } else if (!defined('PROD_DEFAULT_CURRENCY')) {
    trigger_error('Bitte setzen Sie in der Datei elmar_config.inc.php die Konstante PROD_DEFAULT_CURRENCY auf das in Ihrem Shop verwendete Waehrungskuerzel.', E_USER_ERROR);
  } else {
    $currency = PROD_DEFAULT_CURRENCY;
  }
}

function sk_set_language() {
  global $languages_id, $language_code;
  $language_query = tep_db_query('select languages_id, code from '.TABLE_LANGUAGES);
  if (tep_db_num_rows($language_query) == 1 && $language_row = tep_db_fetch_array($language_query)) {
    // Wenn nur eine Sprache definiert ist, benutzen wir diese.
    $languages_id = $language_row['languages_id'];
    $language_code = $language_row['code'];
  } else if (!defined('PROD_DEFAULT_LANGUAGE_ID')) {
    trigger_error('Bitte setzen Sie in der Datei elmar_config.inc.php die Konstante PROD_DEFAULT_LANGUAGE_ID auf die in Ihrem Shop verwendete Sprach-ID.', E_USER_ERROR);
  } else if (!defined('PROD_DEFAULT_LANGUAGE')) {
    trigger_error('Bitte setzen Sie in der Datei elmar_config.inc.php die Konstante PROD_DEFAULT_LANGUAGE auf den in Ihrem Shop verwendeten Sprachcode.', E_USER_ERROR);
  } else {
    $languages_id = PROD_DEFAULT_LANGUAGE_ID;
    $language_code = PROD_DEFAULT_LANGUAGE;
  }
  tep_db_free_result($language_query);
}

?>