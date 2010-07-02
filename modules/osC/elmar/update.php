<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: update.php 64 2005-12-19 18:07:20Z Michael $
*/

if (@include_once('checkstart.inc.php')) checkstart(basename($_SERVER['PHP_SELF']));
$modul_url = ELMAR_URL.'nav/osCommerce';
?>

<h1>Update</h1>
<div class="middleCell">

<?php
if (isset($_REQUEST['action']) && $_REQUEST['action']=='check') {
  define('UPDATE_URL', ELMAR_DEBUG ? 'http://localhost:8888/elmarmodul.txt' : 'http://projekt.wifo.uni-mannheim.de/~kuhlins/elmarmodul.txt');

  $modul_version = (int) MODUL_VERSION;
  $modul_subversion = (int) MODUL_SUBVERSION;

  if (!ini_get('allow_url_fopen')) {
    echo '<p class="error">Die Datei mit den Update-Informationen kann nicht geladen werden, weil <code>allow_url_fopen</code> deaktiviert ist.</p>';
    echo '<p>Sie haben Version <strong>'.$modul_version.'.'.$modul_subversion.'</strong>. Bitte schauen Sie selbst nach, ob eine neuere Version des Moduls verf&uuml;gbar ist:<br><br><a href="'.$modul_url.'" target="_blank">'.$modul_url.'</a></p>';
  } else {
    $mod = sk_parse_ini_file(UPDATE_URL);
    if (!$mod) {
      echo '<p class="error">Die Datei mit den Update-Informationen konnte nicht geladen werden:<br>'.UPDATE_URL.'</p>';
      echo '<p>Sie haben Version <strong>'.$modul_version.'.'.$modul_subversion.'</strong>. Bitte schauen Sie selbst nach, ob eine neuere Version des Moduls verf&uuml;gbar ist:<br><br><a href="'.$modul_url.'" target="_blank">'.$modul_url.'</a></p>';
    } else {
      if (count($mod) < 4) {
        echo '<p class="error">Die Datei mit den Update-Informationen hat nicht das erwartet Format:<br>'.UPDATE_URL.'</p>';
        echo '<p>Sie haben Version <strong>'.$modul_version.'.'.$modul_subversion.'</strong>. Bitte schauen Sie selbst nach, ob eine neuere Version des Moduls verf&uuml;gbar ist:<br><br><a href="'.$modul_url.'" target="_blank">'.$modul_url.'</a></p>';
      } else {
        $update_version = (int) $mod['version'];
        $update_subversion = (int) $mod['subversion'];
        if ($update_version > $modul_version || ($update_version == $modul_version && $update_subversion > $modul_subversion)) {
          echo '<p>Eine neuere Version des Moduls (<strong>'.$update_version.'.'.$update_subversion.'</strong>) steht unter <a href="'.$modul_url.'" target="_blank">'.$modul_url.'</a> zum Download bereit! Hier finden Sie die <a href="http://projekt.wifo.uni-mannheim.de/~kuhlins/elmar/history.html">Versionshistorie</a> mit den &Auml;nderungen und Neuerungen.</p><p>Bitte beachten Sie die <a href="'.ELMAR_PATH.'readme.html#Update">Hinweise zur Installation</a>.</p>';
        } else {
          echo '<p>Sie haben bereits die aktuelle Version des Moduls!</p>';
        }
        if (ELMAR_DEBUG && ($update_version < $modul_version || ($update_version == $modul_version && $update_subversion < $modul_subversion)))
          echo '<p class="error">ACHTUNG: Unter '.UPDATE_URL.' steht eine veraltete Datei!</p>';
      }
      if (ELMAR_DEBUG) {
        echo '</div><h1>Debug-Info</h1><div class="middleCell"><pre>';
        print_r($mod);
        echo '</pre>';
      }
    }
  }
} else {
?>
  <p>
    Mit dem folgenden Button k&ouml;nnen Sie pr&uuml;fen, ob eine neuere Version des Moduls zum Download bereitsteht.
    Dazu wird eine Anfrage nach der aktuellen Versionsnummer an den Elm@r-Server geschickt.
    (Es wird <strong>kein</strong> automatischer Download und auch keine automatische Installation vorgenommen.)
  </p>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
    <input type="hidden" name="file" value="<?php echo THISPAGE; ?>">
    <input type="hidden" name="action" value="check">
    <p>
      <input type="submit" value="Versionspr&uuml;fung" title="Pr&uuml;fen, ob eine neuere Version existiert.">
    </p>
  </form>
  <p>Oder Sie gehen selbst zur Modulseite: <a href="<?php echo $modul_url; ?>" target="_blank"><?php echo $modul_url; ?></a></p>
<?php
}

function sk_parse_ini_file($url) {
  if ((int) PHP_VERSION >= 5) {
    // Erst PHP5 kann URLs mit parse_ini_file oeffnen.
    return parse_ini_file($url);
  }
  $a = @file($url);
  if (!$a) {
    return FALSE;
  }
  $mod = array();
  foreach($a as $v) {
    $v = trim($v);
    $pos = strpos($v, '=');
    if ($v[0] != '#' && $pos !== FALSE) {
      // Keine Kommentarzeile mit # am Anfang und wenigstens ein Gleichheitszeichen.
      $key = trim(substr($v, 0, $pos));
      $value = trim(substr($v, $pos + 1));
      if ($value[0] == '"' && $value[strlen($value) - 1] == '"')
        $value = substr($value, 1, strlen($value) - 2);
      $mod[$key] = $value;
    }
  }
  return $mod;
}
?>

</div>
