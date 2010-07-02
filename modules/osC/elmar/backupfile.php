<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: backupfile.php 64 2005-12-19 18:07:20Z Michael $
*/

if (@include_once('checkstart.inc.php')) checkstart(basename('backup.php'));

require(ELMAR_PATH.'backup.inc.php');
require(ELMAR_PATH.'tools/zip.lib.php');
$zipfile = new zipfile;

$backupcounter = 0;
for ($i=0, $n=sizeof($files); $i<$n; $i++) {  // entspricht PHP4: foreach($files as $file)
  $file = $files[$i];
  $fn = $file->path.$file->name;
  if ($file->paramcheck && file_exists($fn)) {
    $fs = filesize($fn);
    if ($fs > MAX_FILE_SIZE) {
      error_log(date(PHP_DATE_TIME_FORMAT)." Elm@r-osCommerce-Modul: Die Datei $fn ist mit $fs Bytes zu gross fuer ein On-the-fly-Backup.", 0);
      //trigger_error("Die Datei $fn ist mit $fs Bytes zu gro&szlig; f&uuml;r ein On-the-fly-Backup.", E_USER_NOTICE);
    } else {
      $handle = fopen($fn, 'rb');
      $data = fread($handle, $fs);
      fclose($handle);
      $fn = $file->path().$file->name;
      $zipfile->addFile($data, $fn);
      ++$backupcounter;
    }
  }
}

if ($backupcounter == 0) {
  // Keine Datei im Backup, dann wieder das Backup-Formular laden
  $url = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].ELMAR_START.'backup.php&status=error';
  header('Location: '.$url);
  echo 'Es sind keine Dateien im Backup. Falls der Browser nicht automatisch die neue Seite aufruft, klicken Sie bitte <a href="'.$url.'">hier</a>.';
  exit;
}

if (headers_sent($filename, $linenum))
  exit('<p style="color:white;background-color:red;margin:10px;padding:10px;font-weight:bold">HTTP-Header wurden bereits gesendet von der Datei <code>'.$filename.'</code> Zeile <code>'.$linenum
       ."</code>.<br>\nEs muss ein Fehler aufgetreten sein, der erst zu beheben ist, bevor das Backup ordnungsgem&auml;&szlig; ausgef&uuml;hrt werden kann.<br>\n"
       .'(Abbruch in Datei <code>'.__FILE__.'</code> Zeile <code>'.__LINE__.'</code>.)</p>');

header('Content-Type: application/zip');
header('Content-Disposition: attachment; filename='.BACKUPFILENAME);
if (isset($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') > 0) {
  // Fuer den Internet Explorer werden die beiden folgenden Header benoetigt.
  header('Pragma: public');
  header('Cache-Control: public');
}

echo $zipfile->file();
?>