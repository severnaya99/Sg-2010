<?php
/*
	Das Elm@r-Modul fuer osCommerce
	Unterstuetzung des shopinfo.xml-Standards
	http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
	Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
	Released under the GNU General Public License
	$Id: elmar_affiliate.php 112 2006-01-21 16:15:32Z Michael $

	Dieses Skript kann nicht im elmar-Verzeichnis stehen, weil das Verzeichnis fuer Zugriffe von aussen gesperrt wird!
	Aufruf mit dem Domainnamen des Partners als Parameter name, z.B. http://www.example.com/elmar_affiliate.php?name=pangora.de
*/

ob_start();  // Unerwuenschte Ausgaben puffern, damit vor dem XML-Dokument nichts steht.

require('elmar_config.inc.php');
require(ELMAR_PATH.'elmar.inc.php');

if (headers_sent($filename, $linenum)) {
	ob_end_flush();
	exit('HTTP-Header wurden bereits gesendet von der Datei '.$filename.' Zeile '.$linenum
			 .".\nEs muss ein Fehler aufgetreten sein, der erst zu beheben ist, bevor dieses Affiliate-Skript ordnungsgemaess laeuft.\n"
			 .'(Abbruch in Datei '.__FILE__.' Zeile '.__LINE__.'.)');
}

if (defined('POWEREDBY')) header('X-Powered-By: '.POWEREDBY, FALSE);
header('Content-Type: text/xml');

// Alle Includes hier, wegen der Pfadangabe. Reihenfolge ist relevant!
require(ELMAR_PATH.'tools/pear.php');
require(ELMAR_PATH.'tools/node.php');
require(ELMAR_PATH.'tools/parser.php');
require(ELMAR_PATH.'tools/tree.php');

$attributes = '1.0" encoding="ISO-8859-1';
$tree = new XML_Tree(NULL, $attributes);
$XMLarray = array('xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
									'xmlns' => 'http://elektronischer-markt.de/schema/affiliate-1.0',
									'xsi:schemaLocation' => 'http://elektronischer-markt.de/schema/affiliate-1.0 '.ELMAR_SCHEMA_BASE_URL.'affiliate-1.0.xsd',
									'version' => '1.0');

$root = & $tree->addRoot("affiliate", NULL , $XMLarray);

if (!isset($_REQUEST['name']) || trim($_REQUEST['name'])=='') {
	$xml_error = & $root->addChild('error', '100');
	if (defined('AFFILIATES_CONTACT_EMAIL')) $email = & $root->addChild('email', AFFILIATES_CONTACT_EMAIL);
	if (defined('AFFILIATES_CONTACT_URL')) $url = & $root->addChild('url', htmlentities(AFFILIATES_CONTACT_URL));
	$description_de = & $root->addChild('description', 'Der Parameter name fehlt oder ist leer. Bitte geben Sie Ihren Domainnamen an.', array('lang' => 'de'));
	$description_en = & $root->addChild('description', 'Parameter name is missing or empty. Please specify your domain name.', array('lang' => 'en'));
} else {
	$name = $_REQUEST['name'];

	// Partner-ID zum Namen bestimmen
	$id = false;
	if (defined('TABLE_AFFILIATES')) {
		// Namen in der Datenbank suchen
		$sql = 'select id from '.TABLE_AFFILIATES.' where name=\''.mysql_escape_string($name).'\'';
		$rs = tep_db_query($sql);
		if ($res = tep_db_fetch_array($rs)) {
			$id = $res['id'];
		} else {
			// Namen nicht gefunden
			if (AFFILIATES_AUTO_INSERT) {
				// automatisch eine neue ID vergeben
				$sql = "INSERT INTO ".TABLE_AFFILIATES."(name, date, useragent, ip, host)
				  VALUES('".mysql_escape_string($name)."', NOW(), '".mysql_escape_string($_SERVER["HTTP_USER_AGENT"])."', '".
				  $_SERVER["REMOTE_ADDR"]."', '".gethostbyaddr($_SERVER["REMOTE_ADDR"])."')";
				$rs = tep_db_query($sql);
				$id = tep_db_insert_id();
			}
		}
	} else {
		// mit Tabelle (und ohne Datenbanktabelle)
		if (isset($affiliate_ids)) {
			if ($name != '' && isset($affiliate_ids[$name])) {
				$id = $affiliate_ids[$name];
			} else if (!AFFILIATES_EXCLUSIVE_NAME) {
				// weitere Identifikationsmöglichen prüfen
				if (isset($_SERVER['HTTP_USER_AGENT']) && isset($affiliate_ids[$_SERVER['HTTP_USER_AGENT']])) {
					$id = $affiliate_ids[$_SERVER['HTTP_USER_AGENT']];
				} else if (isset($_SERVER['REMOTE_ADDR']) && isset($affiliate_ids[$_SERVER['REMOTE_ADDR']])) {
					$id = $affiliate_ids[$_SERVER['REMOTE_ADDR']];
				} else if (isset($affiliate_ids[$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR'])])) {
					$id = $affiliate_ids[$hostname];
				}
			}
		}
	}

	if ($id) {
		if (defined('AFFILIATES_ID_APPEND')) {
			$append = & $root->addChild('append', AFFILIATES_ID_APPEND.$id, null, null, true);  // CDATA
			$description_de = & $root->addChild('description', 'Bitte hängen Sie an alle URLs unserer Produktdatei Ihre ID an, damit wir im Rahmen unseres Partnerprogramms Besucher von Ihrer Website idenfizieren und zählen können.', array('lang' => 'de'));
			$description_en = & $root->addChild('description', 'Please append your id to all URLs of our product file so that we can identify and count users from your website within the scope of our affiliate program.', array('lang' => 'en'));
		} else {
			$find = & $root->addChild('find', AFFILIATES_ID_FIND, null, null, true);  // CDATA
			$replace = & $root->addChild('replace', AFFILIATES_ID_REPLACE.$id, null, null, true);  // CDATA
			$description_de = & $root->addChild('description', 'Bitte ersetzen Sie in allen URLs unserer Produktdatei den genannten Text durch Ihre ID, damit wir im Rahmen unseres Partnerprogramms Besucher von Ihrer Website idenfizieren und zählen können.', array('lang' => 'de'));
			$description_en = & $root->addChild('description', 'Please replace in all URLs of our product file the mentioned text with your id so that we can identify and count users from your website within the scope of our affiliate program.', array('lang' => 'en'));
		}
	} else {
		$xml_error = & $root->addChild('error', '101');
		if (defined('AFFILIATES_CONTACT_EMAIL')) $email = & $root->addChild('email', AFFILIATES_CONTACT_EMAIL);
		if (defined('AFFILIATES_CONTACT_URL')) $url = & $root->addChild('url', htmlentities(AFFILIATES_CONTACT_URL));
		$description_de = & $root->addChild('description', 'Ihr Domainname ist bei uns noch nicht registriert. Bitte kontaktieren Sie uns.', array('lang' => 'de'));
		$description_en = & $root->addChild('description', 'We have not registered your domain name, yet. Please contact us.', array('lang' => 'en'));
	}
}

if (isset($_REQUEST['debug']) && $_REQUEST['debug']=='on') {
	$debug = & $root->addChild('debug');
	if (isset($name)) $debug->addChild('name', $name);
	if (isset($_SERVER['HTTP_USER_AGENT'])) $debug->addChild('user-agent', $_SERVER['HTTP_USER_AGENT']);
	if (isset($_SERVER['REMOTE_ADDR'])) {
		$debug->addChild('ip', $_SERVER['REMOTE_ADDR']);
		$debug->addChild('host', gethostbyaddr($_SERVER['REMOTE_ADDR']));
	}
	$ob_contents = trim(ob_get_contents());
	if (strlen($ob_contents) > 0) $debug->addChild('text', $ob_contents);
}

ob_end_clean();  // Falls schon Zeichen geschrieben wurden, diese verwerfen, damit nur das XML-Dokument geschrieben wird.

echo $tree->get();
?>