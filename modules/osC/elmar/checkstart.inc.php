<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: checkstart.inc.php 64 2005-12-19 18:07:20Z Michael $
*/

function checkstart($filename) {
  if (!defined('ELMAR_PATH')) {
    if (file_exists('../elmar_start.php'))
      header('Location: ../elmar_start.php?file='.$filename);
  ?>
    <h1>Fehler</h1>
    <p>Die Dateien des Moduls m&uuml;ssen &uuml;ber die Startdatei <code>elmar_start.php</code> aufgerufen werden.</p>
  <?php
    if (file_exists('../elmar_start.php')) {
      echo '<p>Hier geht\'s <a href="../elmar_start.php?file='.$filename.'">weiter</a>.</p>';
    } else {
      echo '<p>Da Sie die Startdatei anscheinend umbenannt haben, m&uuml;ssen Sie den neuen Namen angeben:</p>';
      echo '<p><b><code>http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].dirname(dirname($_SERVER['PHP_SELF']))
           .'/<span style="color:red">elmar_start</span>.php?file='.$filename.'</code></b></p>';

      /*
      // Das Startskript automatisch zu suchen, hebelt den Schutz durch Umbenennen aus.
      flush();
      if ($handle = opendir('..')) {
        while (FALSE !== ($direntry = readdir($handle))) {
          $direntry = '../'.$direntry;
          if (is_file($direntry) && substr($direntry, -4)=='.php' && is_readable($direntry)) {
            if ($fh = fopen($direntry, 'rb')) {
              $contents = fread($fh, 2000);
              fclose($fh);
              if (preg_match('/define\(\'ELMAR_START\'/', $contents)) {
                echo '<p>Vermutlich ist dies die richtige URL: <a href="'.$direntry.'?file='.$filename.'">http://'
                  .$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].dirname(dirname($_SERVER['PHP_SELF'])).'/'.basename($direntry).'?file='.$filename.'</a><p>';
                break;
              }
            }
          }
        }
        closedir($handle);
      }
      */
    }
    exit;
  }
}
?>