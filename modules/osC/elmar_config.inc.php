<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: elmar_config.inc.php 75 2006-01-21 16:13:58Z Michael $

  Konfiguration des Elm@r-Moduls:
  Sie koennen Einstellungen des Moduls an lokale Gegebenheiten anpassen.

  *************************** A C H T U N G ***************************
  ***                                                               ***
  *** Diese Datei NICHT mit dem osCommerce-Dateimanager bearbeiten! ***
  ***                                                               ***
  ***    Ein Fehler im Dateimanager (entfernt Backslash-Zeichen)    ***
  ***  fuehrt sonst zu fehlerhaften Produktdateien (siehe Readme).  ***
  ***                                                               ***
  *********************************************************************
*/
error_reporting(E_ALL);

#define('ELMAR_NEW_SHOPINFO_XML', true);  ### TEST TEST TEST

// Um Fehler schnell erkennen zu koennen, sollten saemtliche Fehlermeldungen aktiviert werden (E_ALL).
// Leider quittieren einige osCommerce-Implementierungen dies mit einem Haufen Fehlermeldungen.
// Arbeiten laesst sich mit so einem System nur, wenn zumindest Warnmeldungen unterdrueckt werden,
// was der Einstellung (E_ALL & ~E_WARNING & ~E_NOTICE) entspricht.
// Saemtliche Meldungen koennen mit 0 unterdrueckt werden. Dies ist i.A. jedoch nicht zu empfehlen.
// Defaultwert: E_ALL & ~E_WARNING & ~E_NOTICE
define('ELMAR_ERROR_REPORTING', E_ALL & ~E_WARNING & ~E_NOTICE);
#define('ELMAR_ERROR_REPORTING', E_ALL);
#define('ELMAR_ERROR_REPORTING', 0);  // Keine Meldungen

// Warnen, wenn kein Passwort fuer die Startdatei gesetzt wurde (siehe readme.html).
// WICHTIG: Stellen Sie Ihr Passwort mit der Konstanten ELMAR_PASSWORD in der Datei elmar/config.inc.php ein!
// Defaultwert: TRUE
define('WARN_ELMAR_PASSWORD', TRUE);

// Sollen Systeminformationen ueber das Webinterface des Elm@r-Moduls abrufbar sein?
// Die Systeminformationen sind sehr hilfreich bei der Fehlersuche.
// Sie stellen allerdings ein potenzielles Sicherheitsrisiko dar,
// weil Angreifer so unter Umstaenden wertvolle Informationen erhalten.
// Sofern ein Passwort gesetzt ist (siehe Konstante ELMAR_PASSWORD in der Datei elmar/config.inc.php),
// kann man von aussen nicht auf die Systeminformationen zugreifen.
// Defaultwert: TRUE
define('ELMAR_SYSINFO', TRUE);
#define('ELMAR_SYSINFO', FALSE);

// Im Zusammenhang mit dem Passwortmechanismus BASIC Authorization per Browser benutzen (TRUE),
// sonst (FALSE) werden Cookies eingesetzt.
// TRUE funktioniert mit Apache 2. Bei anderen Webservern werden Cookies benutzt.
// Defaultwert: TRUE
define('ELMAR_USE_PHP_AUTH', TRUE);
#define('ELMAR_USE_PHP_AUTH', FALSE);

// Der Pfad, in dem sich die Dateien des Elm@r-Moduls befinden.
// Falls der Passwortschutz wider Erwarten nicht funktionieren sollte,
// koennen Sie das Elm@r-Startskript (elmar_start.php) und das Verzeichnis elmar umbenennen,
// damit von aussen nicht mehr darauf zugegriffen werden kann.
// ACHTUNG: Spaetere Updates kopieren neue Dateien wieder in das Verzeichnis 'elmar',
// ******** sodass die neuen Dateien ggf. von Ihnen in das hier angegebene Verzeichnis zu verschieben sind!
// Defaultwert: 'elmar/'
define('ELMAR_PATH', 'elmar/');

// URL für das Hauptverzeichnis des Shops.
// Wenn der Wert nicht gesetzt ist, wird die Standardeinstellung für osCommerce angenommen;
// dies entspricht HTTP_SERVER.DIR_WS_CATALOG.
// Achtung: Slash / am Ende nicht vergessen! Keinen Dateinamen angeben.
// Defaultwert: nicht gesetzt
#define('ELMAR_SHOP_ROOT_DIR', 'http://www.example.com/catalog/');

// Gibt das Shop-System an, unter dem das Elm@r-Modul läuft.
// Der Defaultwert ist 'osCommerce 2.2-MS2' entsprechend dem Wert der osCommerce-Konstanten PROJECT_VERSION.
// Für alle von osCommerce abgeleiteten Shop-Systeme, die sich gegenüber dem Elm@r-Modul genauso verhalten,
// benutzen denselben Wert. Andere Shop-Systeme, die spezielle Anpassungen benötigen, sind hier aufzuführen.
// Defaultwert: 'osCommerce 2.2-MS2'
// Weitere Werte: 'osc2nuke' für osCommerce unter PHP Nuke
define('ELMAR_RUNS_ON', 'osCommerce 2.2-MS2');
#define('ELMAR_RUNS_ON', 'osc2nuke');

// Soll include/application_bottom.php von osCommerce eingebunden werden?
// Zeit z.B. die Parse-Time an, bringt sonst aber i.d.R. nicht viel.
// Defaultwert: FALSE
define('ELMAR_MODUL_INCLUDE_APPLICATION_BOTTOM', FALSE);
#define('ELMAR_MODUL_INCLUDE_APPLICATION_BOTTOM', TRUE);

// Warnen, wenn das elmar-Verzeichnis noch nicht umbenannt wurde (siehe readme.html).
// Defaultwert: FALSE
define('WARN_ELMAR_RENAME', FALSE);

// Warnen, wenn das Startskript elmar_start.php noch nicht umbenannt wurde (siehe readme.html).
// Defaultwert: FALSE
define('WARN_ELMAR_START_RENAME', FALSE);

// Welche Produkte werden in die Produktdatei geschrieben und bei Echtzeitabfragen geliefert?
// TRUE => Nur Produkte, die als "vorraetig" markiert sind, beruecksichtigen.
// FALSE => Alle Produkte beruecksichtigen.
// Defaultwert: TRUE
define('NUR_AB_LAGER', TRUE);

// Welche Produkte werden in die Produktdatei geschrieben und bei Echtzeitabfragen geliefert?
// TRUE => Nur Produkte, die mit einer Anzahl groesser als 0 vermerkt sind, beruecksichtigen.
// FALSE => Alle Produkte beruecksichtigen.
// Defaultwert: FALSE
define('NUR_POSITIVE_ANZAHL', FALSE);

// Sollen fuer Produktdateien nur Produkte mit Beschreibung beruecksichtigt werden?
// TRUE => Nur Produkte, die mit products_description.products_description <> '' beruecksichtigen.
// FALSE => Alle Produkte beruecksichtigen.
// Defaultwert: FALSE
define('NUR_MIT_PRODUKTBESCHREIBUNG', FALSE);

// Produkte nur beruecksichtigen, wenn ihr Preis positiv, d.h. groesser als 0 ist.
// Defaultwert: TRUE
define('NUR_POSITIVER_PREIS', TRUE);

// Welches Feld (Spalte) der Produkttabelle soll zur Bestimmung der Lieferbarkeit benutzt werden?
// Entweder products_status (Produktstatus mit den Werten "auf Lager" oder "nicht vorraetig")
// oder products_quantity (Artikelanzahl bzw. Menge mit positiven Zahlen ab 0).
// Defaultwert: products_status
define('LIEFERBARKEIT_FELDNAME', 'products_status');
#define('LIEFERBARKEIT_FELDNAME', 'products_quantity');

// Sofern vorhanden, lassen sich hier die Namen für die Datenbankfelder, die die EAN und die ISBN enthalten, einstellen.
// Tipp: Nutzen Sie das Datenbankfeld products_model ("Artikel-Nr.") für die EAN. Das Feld muss dazu allerdings mindestens
// 13 Zeichen umfassen (statt per Default 12).
// Es lassen sich auch beliebige osCommerce-Module zur Verwaltung der EAN und/oder ISBN einsetzen.
// Ein passendes Modul dafür ist z.B. "Add UPC numbers, SKUs, ISBN/ISSN, etc":
// http://www.oscommerce.com/community/contributions,126
// Um Produktdateien für Amazon Market Place zu erzeugen, muss ELMAR_PRODUCTS_EAN_FIELD gesetzt werden!
// Defaultwert: nicht gesetzt
#define('ELMAR_PRODUCTS_EAN_FIELD', 'products_model');
#define('ELMAR_PRODUCTS_EAN_FIELD', 'products_ean');
#define('ELMAR_PRODUCTS_ISBN_FIELD', 'products_isbn');

// Der Name für das Datenbankfeld, das als Produktbeschreibung verwendet werden soll, lässt sich einstellen.
// So lassen sich osCommerce-Module verwenden, um zusätzlich zur ausführlichen Produktbeschreibung (products_description)
// eine Kurzbeschreibung in Produktdateien einzusetzen.
// Ein passendes Modul dafür ist z.B. "Products Short Description": http://www.oscommerce.com/community/contributions,3123
// In dem Fall wäre 'short_desc' hier als Wert einzusetzen.
// Defaultwert: 'products_description'
define('ELMAR_PRODUCTS_DESCRIPTION_FIELD', 'products_description');
#define('ELMAR_PRODUCTS_DESCRIPTION_FIELD', 'short_desc');

// Soll die fortlaufende 'products_id' als Artikelnummer verwendet werden?
// TRUE  => ja
// FALSE => nein; stattdessen wird das Feld 'products_model' als Artikelnummer verwendet.
//          In diesem Fall muss der Shopbetreiber dafuer sorgen, dass products_model eindeutig ist!
// Defaultwert: TRUE
define('PROD_ID_IST_ARTIKELNUMMER', TRUE);

// URL fuer spezielle Produktseiten, an die die Produkt-ID angehaengt wird.
// (Funktioniert also nur, wenn nach der Produkt-ID nichts mehr kommt.)
// Wenn der Wert hier nicht gesetzt wird, werden Links per osCommerce gebildet,
// was gemaess SEARCH_ENGINE_FRIENDLY_URLS auch suchmaschinenfreundliche URLs einschliesst.
// Wenn ELMAR_SEO_URLS aktiv ist (s.u.), hat PRODUCTINFOPAGE keine Funktion.
// Defaultwert: nicht gesetzt
#define('PRODUCTINFOPAGE', 'http://www.example.com/catalog/product_info.php?products_id=');

// Suchmaschinenfreundliche URLs auf Produktseiten, die mittels tep_href_link gebildet werden.
// Alle SEO-Contribs, die mit tep_href_link arbeiten, koennen so eingesetzt werden.
// Defaultwert: nicht gesetzt
#define('ELMAR_SEO_URLS', true);

// Wenn im Shop fuer Produkte, zu denen kein Bild vorliegt, eine spezielle Grafikdatei in der Art
// keinbild.gif angezeigt wird und dieses "Bild" nicht in der Produktdatei stehen soll,
// dies wird bspw. von Froogle gewuenscht, dann kann man hier den Namen der Datei angeben.
// Defaultwert: nicht gesetzt
#define('NO_IMAGE_NAME', 'keinbild.gif');

// Groesse von Produktbildern bestimmen und zusammen mit der Bild-URL angeben.
// Dadurch sind Portale in der Lage, die Bilder verzerrungsfrei zu skalieren und darzustellen.
// Die betreffenden Bilddateien muessen zur Groessenbestimmung geoeffnet werden,
// was entsprechend Performance kostet. Wenn alle Produktbilder gleich gross sind,
// sollten die Werte fuer ELMAR_PROD_IMAGE_WIDTH und ELMAR_PROD_IMAGE_HEIGHT gesetzt werden.
// Defaultwert: false
define('ELMAR_PROD_IMAGE_CALCULATE_SIZE', false);
#define('ELMAR_PROD_IMAGE_CALCULATE_SIZE', true);

// Wenn alle Produktbilder gleich gross sind, sollten Breite und Hoehe der Bilder in Pixeln hier
// eingetragen werden.
// Defaultwert: nicht gesetzt
#define('ELMAR_PROD_IMAGE_WIDTH', 100);
#define('ELMAR_PROD_IMAGE_HEIGHT', 80);

// Pfad zu Produktbildern
// Wenn der Wert hier nicht gesetzt wird, gilt die osCommerce-Einstellung
// (HTTP_SERVER.DIR_WS_CATALOG.DIR_WS_IMAGES).
// Defaultwert: nicht gesetzt
#define('IMAGE_PATH', 'http://www.example.com/catalog/images/');

// Pfad zu kleinen Produktbildern, so genannten Thumbnails, fuer Echtzeitabfragen
// Wenn der Wert hier nicht gesetzt wird, werden keine Informationen ueber Thumbnails beruecksichtigt.
// Defaultwert: nicht gesetzt
#define('THUMBNAIL_PATH', 'http://www.example.com/catalog/thumbs/');

// Betrag fuer die Angabe der Versandkosten von Produkten, die weder frei noch pauschal abgerechnet werden.
// (Das heisst, MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING und MODULE_SHIPPING_FLAT_STATUS sind beide FALSE.)
// Interpretation als Mindest-Versandkosten, die auch hoeher sein koennen, also "Versandkosten ab ..."
// Angabe in der Default-Waehrung inklusive Steuern!
// Der Wert 6.70 wird bspw. als "Versandkosten ab 6,70 EUR" interpretiert, wenn Euro die Default-Waehrung ist.
// Geben Sie '0.00' für versandkostenfrei an.
// Fuer Kelkoo muss ein Wert eingetragen werden!
// Defaultwert keine Angabe: ''
define('VERSANDKOSTEN_AB', '');

// Kompression der Ausgabe, sofern der anfragende Client dies unterstuetzt,
// also z.B. "Accept-Encoding: gzip" sendet.
// Dies verringert die Anzahl der zu uebertragenden Bytes erheblich.
// Kostet im Gegenzug aber Rechenzeit auf dem Server (und beim Client).
// Sollte nicht aktiviert werden, wenn der Webserver Ausgaben on-the-fly komprimiert
// oder wenn die Komprimierung von PHP (in der php.ini) aktiviert ist:
// zlib.output_compression=Off, output_buffering=Off, output_handler=
// Defaultwert: false
define('ELMAR_OUTPUT_COMPRESSION', false);
#define('ELMAR_OUTPUT_COMPRESSION', true);

// Beschraenkung der Produktbeschreibungen auf eine bestimmte Laenge, z.B. 100 Zeichen.
// Ist der Text fuer die Produktbeschreibung laenger, wird er abgeschnitten und
// die letzten drei Zeichen werden durch ... ersetzt.
// Sofern viele ausfuehrliche Produktbeschreibungen vorhanden sind,
// verringert sich das Volumen der zu uebertragenden Daten.
// Ausserdem kann man so verhindern, dass Preisvergleichsdienste die Beschreibungen
// "missbrauchen", um ihr Suchmaschinenranking zu verbessern.
// Defaultwert: 0 fuer keine Beschraenkung
define('ELMAR_PRODUCT_DESCRIPTION_MAX_LENGTH', 0);

// HTML-Entities wie &#8482; (2-Byte Unicode-Zeichen) werden in Texten wie Produktbeschreibungen
// durch das hier angegebene Zeichen ersetzt (z.B. '*') bzw. entfernt ('').
// Defaultwert: '*'
define('ELMAR_MODULE_HTML_ENTITY_REPLACE_CHAR', '*');
#define('ELMAR_MODULE_HTML_ENTITY_REPLACE_CHAR', '');

// Wenn die FSK18 Contribution (http://www.oscommerce.com/community/contributions,2567)
// installiert ist, koennen Produkte, die nur fuer Erwachsene gedacht sind, aus den
// Produktdateien herausgehalten werden (true).
// Sonst werden alle Produkte beruecksichtigt (false).
// Defaultwert: false = alle Produkte beruecksichtigen
define('ELMAR_FSK_18', false);
#define('ELMAR_FSK_18', true);


//*******************************
// Antworten auf Echtzeitanfragen
//*******************************

// Maximale Anzahl von Ergebnissen bei Echtzeitanfragen
// Verhindert, dass bei unspezifischen Anfragen bspw. nach 'video' die halbe Datenbank geliefert wird.
// Defaultwert: 10
define('MAX_ITEMS', 10);

// Lieferzeit fuer Produkte, die "ab Lager" geliefert werden.
// Wert im Format PnD angeben, wobei n fuer die Anzahl der Werktage steht.
// Defaultwert ein Werktag: 'P1D'
define('LIEFERZEIT_AB_LAGER', 'P1D');


//*****************************
// Erstellung der Produktdatei
//*****************************

// Bei Kelkoo gibt zwei Arten von Partnerschaften. Die Erste ist kostenlos, aber eingeschraenkt
// (d.h. nur wenige Spalten mit gekuerzten Inhalten, nur eine bestimmte Anzahl von Produkten bzw. Clicks,
// umstaendlicher Upload der Produktdatei per FTP usw.).
// Die Zweite ist entsprechend kostenpflichtig, aber dafuer ohne die genannten Beschraenkungen.
// Fuer Details wenden Sie sich bitte direkt an Kelkoo.
// Defaultwert: 0 fuer kostenlose Kelkoo-Partnerschaft
// Alternative: 1 fuer kostenpflichtige Praemiumpartnerschaft
define('ELMAR_KELKOO_FORMAT', 0);
#define('ELMAR_KELKOO_FORMAT', 1);

// Bei der kostenlosen Kelkoo-Partnerschaft wird angeblich nur eine Produktkurzbeschreibung akzeptiert.
// Laengere oder abgeschnittene Produktbeschreibungen koennen zur Ablehnung der Produktdatei fuehren.
// Wenn die folgende Konstante gesetzt ist, ignoriert das Elm@r-Modul Produkte mit zu langer Beschreibung.
// (Kommentieren Sie die Zeile durch Voranstellen von # aus, um alle Produkte in die Produktdatei zu schreiben.)
// Defaultwert: 159
#define('ELMAR_KELKOO_MAX_DESCRIPTION_LENGTH', 159);

// Bei Kelkoo werden derzeit nur bis zu 5.000 Produktdatensaetze kostenfrei aufgenommen.
// Um die Anzahl der Produktdatensaetze fuer Kelkoo zu limitieren,
// gibt es ein entsprechendes Eingabefeld, das erscheint,
// wenn der Shop mehr als KELKOO_LIMIT Produkte hat.
// Defaultwert: 5000
define('KELKOO_LIMIT', 5000);

// Falls die Anzahl der Produkte limitiert ist, sollten die meistbesuchten Produkte zuerst beruecksichtigt werden.
// Defaultwert: true
define('ELMAR_ORDER_BY_VIEWED', true);

// Produktdateien für Amazon Market Place erzeugen, siehe:
// http://www.amazon.de/ -> Hilfe -> Verkaufen bei Amazon.de -> Großanbieter
// In welche Länder versenden Sie?
// - 7 = Nur innerhalb Deutschlands
// - 8 = EU-weit
// - 9 = Europaweit
// - 10 = Weltweit
// Defaultwert: 7
define('AMAZON_SHIP_INTERNATIONALLY', 7);

// Preise für Amazon Market Place pauschal anpassen mit der Formel: Preis = Preis * Faktor
// Zum Beispiel 1.15 für eine 15%-ige Erhöhung.
// Defaultwert: 1.0 (d.h. keine Preisänderung)
define('AMAZON_PRICE_FACTOR', 1.0);

// Namen fuer die Produktdateien beim Download per Browser (hier keine Verzeichnispfade angeben!)
$productfilenames = array(
  '' => 'products.csv',  // Name der Standardproduktdatei
  'amazon' => 'amazon.txt',
  'froogle' => 'froogle.txt',  // Am besten den Namen des Shops als Dateinamen verwenden!
  'hardwareschotte' => 'hardwareschotte.txt',
  'kelkoo' => 'kelkoo.txt',
  'pangora' => 'pangora.txt',
  'shopping' => 'shopping.txt',  // Am besten den Namen des Shops als Dateinamen verwenden!
  'webde' => 'webde.txt',
);

// Dateinamen (auch inklusive Pfad), unter denen die Produktdateien auf der Festplatte des eigenen Servers gespeichert
// werden sollen. Relative oder fehlende Pfade werden bzgl. DIR_FS_CATALOG aufgeloest, also relativ zum osCommerce
// catalog-Verzeichnis, in dem sich u.a. elmar_products.php befindet.
// Dies sind die Vorgabewerte fuer das Formular "Produktdateien erzeugen".
// Beispiel fuer einen relativen Pfad: 'export/products.csv'
// Das Verzeichnis - im Beispiel 'export' - muss existieren und PHP-Skripten Schreibrechte einraeumen.
// Geben Sie hier KEINE URLs, die mit http:// beginnen, ein!
// Ein absoluter Pfad ist z.B.: '/homepages/htdocs/products.csv'
define('PRODUCTFILE', 'products.csv');  // Standardproduktdatei, nur relativen Pfad zum catalog-Verzeichnis verwenden!
define('FILENAME_AMAZON', 'amazon.txt');
define('FILENAME_FROOGLE', 'froogle.txt');  // Am besten den Namen des Shops in den Dateinamen aufnehmen!
define('FILENAME_HARDWARESCHOTTE', 'hardwareschotte.txt');
define('FILENAME_KELKOO', 'kelkoo.txt');
define('FILENAME_PANGORA', 'pangora.txt');
define('FILENAME_SHOPPING', 'shopping.txt');  // Am besten den Namen des Shops in den Dateinamen aufnehmen!
define('FILENAME_WEBDE', 'webde.txt');

// Soll der Herstellername beruecksichtigt werden?
// Defaultwert: TRUE
define('MANUFACTURERS_NAME', TRUE);

// Standardsprache fuer die Produktdatei, die zwischengespeichert wird.
// Einer der Datensaetze von: SELECT code FROM languages;
// Sollte dem osCommerce-Konfigurationswert DEFAULT_LANGUAGE (z.B. 'de') entsprechen.
// Falls es nur eine Sprache gibt, bestimmt das Modul diese automatisch.
// Defaultwert: nicht gesetzt
#define('PROD_DEFAULT_LANGUAGE', 'en');  // Englisch
#define('PROD_DEFAULT_LANGUAGE', 'de');  // Deutsch

// ID der Standardsprache passend zu PROD_DEFAULT_LANGUAGE.
// Einer der Datensaetze von: SELECT id FROM languages;
// Falls es nur eine Sprache gibt, bestimmt das Modul diese automatisch.
// Defaultwert: nicht gesetzt
#define('PROD_DEFAULT_LANGUAGE_ID', 1);  // Englisch
#define('PROD_DEFAULT_LANGUAGE_ID', 2);  // Deutsch
#define('PROD_DEFAULT_LANGUAGE_ID', 43);  // Deutsch bei ZenCart

// Standardwaehrung fuer die Produktdatei, die zwischengespeichert wird.
// Einer der Codes von: SELECT code FROM currencies
// Sollte dem osCommerce-Konfigurationswert DEFAULT_CURRENCY (z.B. 'EUR') entsprechen.
// Defaultwert: nicht gesetzt
#define('PROD_DEFAULT_CURRENCY', 'EUR');

// Text fuer Produkte, die "ab Lager" geliefert werden
// Defaultwert: 'ab Lager'
define('LIEFERBARKEIT_AB_LAGER', 'ab Lager');

// Text fuer Produkte, die "nicht ab Lager" geliefert werden
// Defaultwert keine Angabe: ''
define('LIEFERBARKEIT_NICHT_AB_LAGER', '');

// Text fuer Produkte, die versandkostenfrei geliefert werden
// Defaultwert: 'versandkostenfrei'
define('VERSANDKOSTENFREI', 'versandkostenfrei');

// Gegebenenfalls vorhandene Produktvarianten (Options) am Ende der Produktbeschreibung aufzaehlen.
// Defaultwert: true
define('ELMAR_PRODUCT_OPTIONS', true);
#define('ELMAR_PRODUCT_OPTIONS', false);

// Zeitlicher Abstand in Sekunden, in dem die Produktdatei aktualisiert werden soll.
// 0 = Bei jedem Abruf.
// Defaultwert alle 12 Stunden: 12*60*60
define('UPDATEINTERVAL', 12*60*60);

// Blockgroesse, in der die Produktdatensaetze aus der Datenbank gelesen werden.
// Bei groesseren Werten werden weniger Pausen eingelegt, aber es wird mehr Hauptspeicher benoetigt.
// Wenn Timeouts auftreten, z.B. im Zusammenhang mit max_execution_time, den Wert nach unten anpassen.
// Der Wert muss groesser 0 sein.
// Defaultwert: 1000
define('DB_STEP', 1000);

// Wartezeit in Sekunden, die nach jedem Block eingelegt wird.
// 0 fuer keine. Geht schneller, belastet den Server aber mehr.
// Bei mehr als 1 koennen Timeouts beim abrufenden Dienst auftreten.
// Defaultwert: 1
define('DB_SLEEP', 1);

// Trennzeichen, das die einzelnen Spalten voneinander trennt.
// Defaultwert Tabulator: "\t"  (in Worten: Backslash und t)
define('DEFAULT_DELIMITER', "\t");

// Das Maskierungszeichen wird Zeichen vorangestellt, die sonst als Zeichenkettenbegrenzungs- oder Trennzeichen gelten.
// In den ersten Versionen des Moduls wurde Backslash verwendet: "\\"
// Defaultwert: nicht gesetzt
#define('DEFAULT_ESCAPE', "\\");

// Das Zeichenkettenbegrenzungzeichen schliesst die Inhalte der einzelnen Spalten ein.
// In den ersten Versionen des Moduls wurde ein einfaches Anfuehrungszeichen verwendet: "'"
// Defaultwert: nicht gesetzt
#define('DEFAULT_QUOTE', "'");
#define('DEFAULT_QUOTE', '"');

// Das Zeilenendezeichen beendet eine Zeile, in der ein Produktdatensatz steht.
// Defaultwert: Nicht gesetzt, damit es in Abhaengigkeit vom System bestimmt wird.
#define('DEFAULT_LINEEND', "\n");

// Bei Bedarf koennen nach dem folgenden Muster weitere Ersetzungen definiert werden,
// die in PHPs get_html_translation_table fehlen.
// Zum Beispiel &Omega; durch Omega ersetzen:
// $elmar_html_translation['&Omega;'] = 'Omega';
#$elmar_html_translation['™'] = 'TM';

// Mit dieser Konstanten koennen Sie festlegen, dass fopen statt fsockopen benutzt werden soll.
// Beim Erzeugen von grossen Produktdateien, die auf dem Server gespeichert werden, greift das Elm@r-Modul
// quasi auf sich selbst per URL zu. Wenn auf dem Server allow_url_fopen=off ist, funktioniert dies mit
// fopen jedoch nicht. Daher oeffnet das Modul die URL mit fsockopen. Sollte dies wider Erwarten nicht
// funktionieren, koennen Sie hier auf fopen umschalten.
// Defaultwert: false bzw. nicht gesetzt
#define('ELMAR_MODUL_USE_FOPEN_FOR_URL', true);

// Hier koennen Sie Linkparameter angeben, die an die URLs in der Produktdatei angehaengt werden.
// Wenn weitere Parameter vorhanden sind, benutzen Sie '&...', sonst '?...'.
// Je nach Produktdateityp (Parameter type bei elmar_products.php), User-Agent (HTTP-Header der Anfrage)
// oder IP-Adresse (u.U. gehören mehrere IPs zu einem Partner) ist ein anderer Wert einsetzbar.
// So laesst sich erkennen, von welcher Partner-Website Besucher kommen, die solche Links anklicken.
// Defaultwert: nicht gesetzt
#$partner_ids = array(
#  'kelkoo' => '&ref=1',
#  'froogle' => '&ref=2',
#  'hardwareschotte' => '&ref=3',
#  'pangora' => '&ref=4',
#  'shopping' => '&ref=7',
#  'amazon' => '&ref=8',
#  'webde' => '&ref=5',
#  'Elm@r/1.0 (http://elektronischer-markt.de/)' => '&ref=6',
#  '134.155.99.42' => '&ref=6',
#  'projekt.wifo.uni-mannheim.de' => '&ref=6',
#);

//**********************************************
// Einstellungen für elmar_affiliate.php
//
// Wenn mehrere Partner dieselbe Produktdatei abrufen, z.B. über elmar_products.php ohne Parameter,
// kann jeder Partner mithilfe von elmar_affiliate.php eine individuelle ID zur Präparierung
// der Produktseiten-Links erhalten. Diese ID wird dann bspw. an die Links angehängt, sodass
// sich auf Shopseite erkennen lässt, bei welchem Partner ein Besucher geklickt hat.
// Dieses Verfahren setzt die Kooperation der Partner zur Manipulation der Links voraus.
// (Um die Auswertung der Clicks kümmert sich das Elm@r-Modul NICHT. Hierfür gibt es andere Contribs.)
//**********************************************

// IDs für Affiliates.
// Alternativ kann TABLE_AFFILIATES genutzt werden, z.B. um IDs automatisch zu vergeben (AFFILIATES_AUTO_INSERT).
// Defaultwert: nicht gesetzt
#$affiliate_ids = array(
#	'elmar' => '1',
#	'froogle' => '2',
#	'hardwareschotte' => '3',
#	'kelkoo' => '4',
#	'pangora' => '5',
#	'shopping' => '6',
#	'webde' => '7',
#	'amazon' => '8',
#);

// Name für die Datenbanktabelle zur Verwaltung der Partner-IDs.
// Die Tabelle wird bei der Installation ggf. durch install.php erzeugt.
// Defaultwert: nicht gesetzt, d.h. es wird keine Tabelle benutzt.
#define('TABLE_AFFILIATES', 'affiliates');

// Unbekannten Anfragern automatisch eine ID zuweisen (true) oder sie abweisen (false).
// Nur wirksam im Zusammenhang mit TABLE_AFFILIATES.
// Defaultwert: false
define('AFFILIATES_AUTO_INSERT', false);
#define('AFFILIATES_AUTO_INSERT', true);

// Zur Erkennung eines Partners beim Zugriff auf elmar_affiliate.php wird der Parameter 'name' genutzt.
// Zusätzlich können ggf. User-Agent, IP und Hostname ausgewertet werden (false)
// oder nicht, d.h. es wird nur der Namensparameter betrachtet (true).
// Defaultwert: false
define('AFFILIATES_EXCLUSIVE_NAME', false);
#define('AFFILIATES_EXCLUSIVE_NAME', true);

// Wenn Partner ihre ID an Produktseitenlinks anhängen sollen, geben Sie hier an,
// welcher Text dazu benutzt werden soll. Je nach Aufbau der Produktseitenlinks wird
// der ID-Parameter als '&aid=', '?aid=' oder '/aid/' angehängt.
// (Zum Einfügen der Partner-ID sind AFFILIATES_ID_FIND und AFFILIATES_ID_REPLACE gedacht.)
// Beispiel:
//   Produktseitenlink http://www.example.com/catalog/product_info.php?products_id=22
//   AFFILIATES_ID_APPEND enthält den Wert '&aid=' und der Partner hat die ID 5.
//   Resultierender Link: http://www.example.com/catalog/product_info.php?products_id=22&aid=5
// Defaultwert: nicht gesetzt
#define('AFFILIATES_ID_APPEND', '&aid=');
#define('AFFILIATES_ID_APPEND', '?aid=');
#define('AFFILIATES_ID_APPEND', '/aid/');

// Wenn Partner ihre ID in Produktseitenlinks einfügen sollen, geben Sie hier an,
// welcher Text (i.d.R. eine Dummy-ID) dazu wie zu ersetzen ist.
// (Zum Anhängen der Partner-ID ist AFFILIATES_ID_APPEND gedacht.)
// Beispiel:
//   Produktseitenlink http://www.example.com/catalog/product_info.php?aid=0&products_id=22
//   AFFILIATES_ID_FIND enthält den Wert 'aid=0',
//   AFFILIATES_ID_REPLACE enthält den Wert 'aid=' und der Partner hat die ID 5.
//   Resultierender Link: http://www.example.com/catalog/product_info.php?aid=5&products_id=22
// Defaultwert: nicht gesetzt
#define('AFFILIATES_ID_FIND', 'aid=0');
#define('AFFILIATES_ID_REPLACE', 'aid=');

// E-Mail-Adresse, die anfragenden Partnern mitgeteilt wird, damit diese sich bei Ihnen melden können,
// um eine ID zu erhalten.
// Entspricht z.B. dem Wert von STORE_OWNER_EMAIL_ADDRESS.
// Defaultwert: nicht gesetzt
#define('AFFILIATES_CONTACT_EMAIL', 'affiliates@example.com');

// HTML-Seite, auf die anfragende Partner verwiesen werden, um sich über Ihr Partnerprogramm zu erkundingen.
// Entspricht z.B. dem Wert von HTTP_SERVER.DIR_WS_CATALOG.'contact.html'
// Defaultwert: nicht gesetzt
#define('AFFILIATES_CONTACT_URL', 'http://www.example.com/catalog/affiliates.html');


//**********************************************
// Produktdatei auf den Froogle-FTP-Server laden
//**********************************************

// Benutzername und Passwort fuer den den Froogle-FTP-Server.
// Bevor Sie Ihre Produktdatei an Froogle senden koennen, benoetigen Sie einen FTP-Benutzernamen und ein Passwort.
// Diese sind nicht mit dem Nutzernamen und dem Passwort identisch, mit denen Sie sich im Froogle Haendler-Center anmelden.
// Um Ihr FTP-Passwort einzurichten, melden Sie sich im Haendler-Center an und klicken Sie auf "FTP-Informationen anzeigen".
// Defaultwerte: ''
define('FROOGLE_FTP_USER_NAME', '');
define('FROOGLE_FTP_USER_PASS', '');

// Name der Produktdatei auf dem Froogle-FTP-Server.
// Ihre Produktdatei fuer Froogle muss immer unter demselben Namen an Froogle geschickt werden.
// Wenn Sie den Namen aendern, kann es passieren, dass die Datei nicht gefunden wird.
// Ihre Produkte erscheinen dann nicht in Froogle.
// Die Produktdatei fuer Froogle wird komprimiert (um Zeit beim Hochladen zu sparen), wenn der Dateiname auf '.zip' endet.
// Defaultwert: 'froogle.zip'
define('FROOGLE_FTP_FILE_NAME', 'froogle.zip');

// Wenn Fehler beim Uebertragen der Produktdatei zum Froogle-FTP-Server auftreten, sollte der passive FTP-Transfermodus aktiviert werden.
// Dies hilft insbesondere beim Einsatz von DSL und Firewalls.
// Beim passiven FTP-Transfermodus ist es nicht erforderlich, dass der lokale Computer (Ihr Computer) seine IP-Adresse kennt.
// Einige Netzwerkverbindungen koennen nur dann aufgebaut werden, wenn der passive Transfermodus aktiviert ist,
// andere erfordern, dass dieser Modus deaktiviert ist.
// Defaultwert: FALSE
define('FROOGLE_FTP_PASSIVE_MODE', FALSE);

// Froogle moechte, dass die Language-ID an Produktlinks angehaengt wird, damit Besucher unabhaengig von der
// Spracheinstellung im Browser immer eine bestimmte Produktseite zu sehen kriegen.
// Fuer deutsche Shops ist der Wert ggf. auf '&language=de' zu setzen.
// Defaultwert: nicht gesetzt
#define('FROOGLE_LANGUAGE_PARAM', '&language=de');


//********************************
// Erstellung der Protokolldateien
//********************************

// Spaltentrennzeichen fuer Text-Protokolldateien
// Defaultwert: "\t"
define('LOG_DELIMITER', "\t");


//********************************
// Erstellung von Backups
//********************************

// Der Name der erzeugten Backup-Dateien (muss URL-konform sein).
// Defaultwert: 'elmar_backup_'.date('Ymd').'.zip'
define('BACKUPFILENAME', 'elmar_backup_'.date('Ymd').'.zip');

// Wie gross duerfen Dateien hoechstens sein, damit sie noch ins Backup aufgenommen werden.
// Defaultwert 10 MB: 10000000
define('MAX_FILE_SIZE', 10000000);
define('MAX_FILE_SIZE_TEXT', '10&nbsp;MB');


//********************************
// Produktkategorien
//********************************

// Wie viele Kategorien sollen fuer Produkte, die mehreren Produktkategorien zugeordnet sind,
// ausgegeben werden? Normalerweise genuegt eine.
// Defaultwert: 1
define('MAX_PRODUCT_CATEGORIES', 1);

// Wenn Produkte mehreren Kategorien zugeordnet sind, kann man mit der folgenden Konstanten
// einstellen, ob eine bestimmte Ebene der Kategorien bei Produktnummer und -name beruecksichtigt werden soll.
// Bspw. kann Zubehoer so mehrfach in die Produktdatei geschrieben werden.
// Der Index beginnt bei 0 fuer die oberste Kategorie.
// Defaultwert: -1 fuer abgeschaltet
define('ELMAR_PRODUCT_CATEGORY_INDEX', -1);

// In der Regel ist dies zwar NICHT notwendig, aber Sie koennen die Produktkategorien
// Ihres Shops, die osCommerce verwaltet, denen von Elm@r zuordnen.
// Siehe: http://projekt.wifo.uni-mannheim.de/elmar/nav?dest=impl.shopdata.specification#category
// Default: Keine spezielle Zuordnung
#$categorytable = array(
#  // Shop-Kategorie => Elm@r-Kategorie
#  '' => 'Auto & Motorrad',
#  '' => 'Bekleidung',
#  '' => 'Bücher',
#  '' => 'Erotik',
#  '' => 'Essen & Trinken',
#  '' => 'Flüge & Reisen',
#  '' => 'Hardware',
#  '' => 'Haushalt',
#  '' => 'Garten & Landwirtschaft',
#  '' => 'Körperpflege & Kosmetik',
#  '' => 'Musik',
#  '' => 'Schmuck',
#  '' => 'Software',
#  '' => 'Sport & Freizeit',
#  '' => 'Spielwaren',
#  '' => 'Telekommunikation',
#  '' => 'Tiere',
#  '' => 'Unterhaltungs-Elektronik',
#  '' => 'DVD/Video',
#  '' => 'Foto & Optik',
#  '' => 'Bauen & Heimwerken',
#  '' => 'Gesundheit',
#  '' => 'Büroartikel',
#  '' => 'Sonstiges',
#);
#// Beispiel fuer die osCommerce-Standardkategorien der ersten Ebene
#$categorytable = array(
#  'Hardware' => 'Hardware',
#  'Software' => 'Software',
#  'DVD Filme' => 'DVD/Video',
#);
#// Bei der zweiten Ebene werden Kategorien zusammengesetzt, z.B. 'DVD Filme|Action' => 'DVD/Video'

// ******************************
//        A C H T U N G
// ******************************
// Hier am Dateiende duerfen keine Leerzeilen angehaengt werden!
?>