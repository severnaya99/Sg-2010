<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: elmar_shopinfo.php 89 2006-01-21 16:14:34Z Michael $
*/

ob_start();  // Unerwuenschte Ausgaben puffern, damit vor dem XML-Dokument nichts steht.

require('elmar_config.inc.php');
require(ELMAR_PATH.'elmar.inc.php');

if (headers_sent($filename, $linenum)) {
	ob_end_flush();
  exit('HTTP-Header wurden bereits gesendet von der Datei '.$filename.' Zeile '.$linenum
       .".\nEs muss ein Fehler aufgetreten sein, der erst zu beheben ist, bevor die Shopdatei ordnungsgemaess erzeugt werden kann.\n"
       .'(Abbruch in Datei '.__FILE__.' Zeile '.__LINE__.'.)');
}

if (defined('POWEREDBY')) header('X-Powered-By: '.POWEREDBY, FALSE);

// Dieses Skript wird nur benoetigt, wenn keine shopinfo.xml existiert bzw. geschrieben werden kann.
// Das Skript kann nicht im elmar-Verzeichnis stehen, weil das Verzeichnis fuer Zugriffe von aussen gesperrt wird!

$force = isset($_REQUEST['force']) && $_REQUEST['force'] == 'yes';

if (!$force && defined('DIR_WS_SHOPINFO_XML') && DIR_WS_SHOPINFO_XML != ''
    && defined('DIR_FS_SHOPINFO_XML') && DIR_FS_SHOPINFO_XML != '' && file_exists(DIR_FS_SHOPINFO_XML)) {
  // Sobald eine shopinfo.xml existiert bzw. der Shop bei Elm@r registriert ist,
  // Umleitung auf die vorhandene Shopdatei.
	ob_end_clean();
  header('Location: '.DIR_WS_SHOPINFO_XML);
  exit;
}

header('Content-Type: text/xml');
header('Content-Disposition: attachment; filename='.SHOPINFO_XML);
if (isset($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') > 0) {
  // Fuer den Internet Explorer werden die beiden folgenden Header benoetigt.
  header('Pragma: public');
  header('Cache-Control: public');
}

ob_end_clean();  // Falls schon Zeichen geschrieben wurden, diese verwerfen, damit nur das XML-Dokument geschrieben wird.

echo generate_shopinfo();
?>