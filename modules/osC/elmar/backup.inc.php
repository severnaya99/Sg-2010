<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: backup.inc.php 64 2005-12-19 18:07:20Z Michael $
*/

#if (@include_once('checkstart.inc.php')) checkstart(basename('backup.php'));

define('BASEDIR', stripslashes(dirname($_SERVER['SCRIPT_FILENAME'])));

class BackupItem {
  #TODO Bei PHP 5 private statt var verwenden.
  var $path;        // Pfad relativ zum elmar-Verzeichnis
  var $name;        // Name der Datei, die gesichert werden soll
  var $paramcheck;  // TRUE, wenn der zugeh&ouml;rige Parameter gesetzt ist
  var $varname;     // Name das zugeh&ouml;rigen Formularfeldes
  var $checked;     // TRUE, wenn die Datei per Vorgabe gesichert werden soll
  var $text;        // Text, der zur Checkbox angezeigt wird
  var $fullname;    // Pfad und Dateiname

  function BackupItem($path, $name, $paramcheck, $varname, $checked, $text) {
      $this->path = $path;
      $this->name = $name;
      $this->paramcheck = $paramcheck;
      $this->varname = $varname;
      $this->checked = $checked;
      $this->text = $text;
      $this->fullname = $this->path.$this->name;
  }

  function path() {
    return $this->path;
  }

  function name() {
    return $this->name;
  }

  function varname() {
    return $this->varname;
  }

  function checked() {
    return $this->checked;
  }

  function text() {
    return $this->text;
  }

  function exists() {
    return file_exists($this->fullname);
  }

  function size() {
    return filesize($this->fullname);
  }

  function time() {
    return date(PHP_DATE_TIME_FORMAT, filemtime($this->fullname));
  }

  function check() {
    return filesize($this->fullname) <= MAX_FILE_SIZE;
  }
}

$dirshopinfo = dirname(DIR_FS_SHOPINFO_XML);
if (strpos($dirshopinfo, BASEDIR) === FALSE)
  $dirshopinfo .= $PATH_SEPARATOR;
else
  $dirshopinfo = '';

$files = array(
  new BackupItem($dirshopinfo, basename(DIR_FS_SHOPINFO_XML), isset($_REQUEST['Shopdatei']), 'Shopdatei', TRUE, 'Shopdatei'),
  new BackupItem('', PRODUCTFILE, isset($_REQUEST['Produktdatei']), 'Produktdatei', FALSE, 'Produktdatei'),
  new BackupItem('', 'elmar_config.inc.php', TRUE, 'Konfigurationsdatei', TRUE, 'Konfiguarationsdatei'),
  new BackupItem('', CONFIG, isset($_REQUEST['Config']), 'Config', TRUE, 'Shop-Konfigurationsdatei'),
  new BackupItem('', ERROR_LOG, isset($_REQUEST['Errorlog']), 'Errorlog', FALSE, 'Fehlermeldungen (Text)'),
  new BackupItem('', ERROR_LOG_HTML, isset($_REQUEST['ErrorHTML']), 'ErrorHTML', FALSE, 'Fehlermeldungen (HTML)'),
  new BackupItem('', REQUEST_LOG, isset($_REQUEST['Requestlog']), 'Requestlog', FALSE, 'Echtzeitanfragen (Text)'),
  new BackupItem('', REQUEST_LOG_HTML, isset($_REQUEST['RequestHTML']), 'RequestHTML', FALSE, 'Echtzeitanfragen (HTML)'),
  new BackupItem('', PRODUCTS_LOG, isset($_REQUEST['Productlog']), 'Productlog', FALSE, 'Produktdateizugriffe (Text)'),
  new BackupItem('', PRODUCTS_LOG_HTML, isset($_REQUEST['ProductHTML']), 'ProductHTML', FALSE, 'Produktdateizugriffe (HTML)')
);

?>
