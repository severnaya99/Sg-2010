<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: elmar_start.php 120 2006-01-21 16:15:48Z Michael $
*/

if (FALSE) { ?>
  <p><strong style="color:red">ACHTUNG: Die PHP-Dateien m&uuml;ssen auf einem Webserver abgelegt werden, der PHP unterst&uuml;tzt, sonst sehen Sie nur den PHP-Programmcode und k&ouml;nnen nichts damit anfangen.</strong></p>
<?php }

error_reporting(E_ALL);

// Wenn die Datei elmar_config.inc.php nicht gefunden wird, wurde evtl. das Update statt der Vollversion installiert.
// Falls die Datei nicht lesbar ist, die Leserechte fuer alle (chmod a+r), den Eigentuemer (chown) und die Gruppe (chgrp) pruefen.
if (!include('elmar_config.inc.php')) {
  sk_fileinfo('elmar_config.inc.php');
  exit;
}

if (!is_dir(ELMAR_PATH)) { ?>
  <p><strong style="color:red">Das Verzeichnis <code><?php echo ELMAR_PATH; ?></code> existiert nicht.</strong><br> Bitte &uuml;berpr&uuml;fen Sie die Einstellung der Konstante <strong><code style="color:red">ELMAR_PATH</code></strong> in der Datei <strong><code style="color:red">elmar_config.inc.php</code></strong>.</p>
<?php
  if ($handle = opendir('.')) {
    while (FALSE !== ($direntry = readdir($handle))) {
      if (is_dir($direntry)) {
        if (file_exists($direntry.'/elmar.inc.php')) {
          echo "<p>Vermutlich ist die Zeile</p><pre>  define('ELMAR_PATH', '".ELMAR_PATH."');</pre><p>durch folgende Zeile zu ersetzen:</p><pre><strong>  define('ELMAR_PATH', '$direntry/');</strong></pre>";
          break;
        }
      }
    }
    closedir($handle);
  }
  exit;
}

define('ELMAR_START', $_SERVER['PHP_SELF'].'?file=');
$errmsg = array();

// Falls die Datei nicht lesbar ist, die Leserechte fuer alle (chmod a+r), den Eigentuemer (chown) und die Gruppe (chgrp) pruefen.
if (!include(ELMAR_PATH.'elmar.inc.php')) {
  sk_fileinfo(ELMAR_PATH.'elmar.inc.php');
  exit;
}

$output_compression = (GZIP_COMPRESSION != 'true') && defined('ELMAR_OUTPUT_COMPRESSION') && ELMAR_OUTPUT_COMPRESSION;
if ($output_compression) ob_start('ob_gzhandler');

// Pruefen, ob Startskript und elmar.inc.php dieselbe Modulversion beinhalten.
if (!defined('MODUL_VERSION') || MODUL_VERSION != '3' ||
    !defined('MODUL_SUBVERSION') || MODUL_SUBVERSION != '60') {
  $errmsg[] = 'Das Startskript <code>'.realpath('elmar_start.php').'</code> geh&ouml;rt zu einer anderen Version des Moduls als die Datei <code>'.realpath(ELMAR_PATH.'elmar.inc.php').'</code>. ';
  if (ELMAR_PATH != 'elmar/' && file_exists('elmar/elmar.inc.php')) {
    $errmsg[sizeof($errmsg)-1] .= 'Vermutlich wurde das <code>elmar</code>-Verzeichnis umbenannt und ein Update installiert. In diesem Fall ist in der Datei <code>'.realpath('elmar_config.inc.php')."</code> die Zeile<br> <code>define('ELMAR_PATH', '".ELMAR_PATH."');</code> <br>durch folgende Zeile zu ersetzen:<br> <code><strong>define('ELMAR_PATH', 'elmar/');</strong></code>";
  } else {
    $errmsg[sizeof($errmsg)-1] .= 'Bitte pr&uuml;fen Sie Ihre Installation des Elm@r-Moduls.';
  }
}

$elmar_password_ok = true;
$logout = isset($_REQUEST['file']) && $_REQUEST['file']=='logout.php';
if ($logout) {
  if (!headers_sent()) setcookie('elmar_password', '', 0);
} else {
  if (defined('ELMAR_PASSWORD') && ELMAR_PASSWORD!='') {
    $php_sapi_name = php_sapi_name();
    if ((!defined('ELMAR_USE_PHP_AUTH') || ELMAR_USE_PHP_AUTH) && $php_sapi_name == 'apache2handler') {
      // PHP-Authorization funktioniert leider nicht mit allen Web-Servern, deshalb schauen, ob es geht.
      // ja:   apache2handler = Apache/2.0.49
      // nein: isapi = Microsoft-IIS/5.1
      // PHP läuft bei 1&1 WebHosting als CGI. Damit funktioniert eine Authentifizierung per Script nicht.
      if (!isset($_SERVER['PHP_AUTH_PW']) || $_SERVER['PHP_AUTH_PW'] != ELMAR_PASSWORD) {
        // Kein Passwort oder falsch.

        if (headers_sent($filename, $linenum))
          exit('<p style="color:white;background-color:red;margin:10px;padding:10px;font-weight:bold">HTTP-Header wurden bereits gesendet von der Datei <code>'.$filename.'</code> Zeile <code>'.$linenum
               ."</code>.<br>\nEs muss ein Fehler aufgetreten sein, der erst zu beheben ist, bevor das Startskript ordnungsgem&auml;&szlig; ausgef&uuml;hrt werden kann.<br>\n"
               .'(Abbruch in Datei <code>'.__FILE__.'</code> Zeile <code>'.__LINE__.'</code>.)</p>');

        header('HTTP/1.0 401 Authorization Required');
        header('WWW-Authenticate: Basic realm="Elm@r-Modul"');
  ?>
        <html><head><title>401 Authorization Required</title></head><body>
        <h1>401 Authorization Required</h1>
        <p>Bitte mit dem Passwort einloggen, das in der Datei <code>config.inc.php</code> eingetragen ist. (Der Name spielt f&uuml;r das Login keine Rolle.)</p>
        <p>Siehe auch <a href="<?php echo ELMAR_PATH; ?>readme.html#elmar_password">readme.html</a>.</p>
        </body></html>
  <?php
        exit;
      }
    } else {
      // Wenn PHP-Authorization nicht geht, per Cookie einloggen.
      // Eine Loesung per Session funktioniert anscheinend nicht mit osCommerce :-(
      // Steht das Passwort im Cookie und stimmt es? (Use $HTTP_COOKIE_VARS with PHP 4.1 or less.)
      $elmar_password_ok = isset($_COOKIE['elmar_password']) && $_COOKIE['elmar_password'] == sha1(ELMAR_PASSWORD);
      if (!$elmar_password_ok) {
        // Passwort ist im Cookie nicht vorhanden oder falsch
        $elmar_password_ok = isset($_REQUEST['elmar_password_input']) && $_REQUEST['elmar_password_input'] == ELMAR_PASSWORD;
        if ($elmar_password_ok) {
          // Das Passwort wurde korrekt ins Login-Formular eingegeben.
          if (isset($_REQUEST['elmar_password_time']) && $_REQUEST['elmar_password_time'] != 0)
            setcookie('elmar_password', sha1($_REQUEST['elmar_password_input']), time() + $_REQUEST['elmar_password_time']);
          else
            setcookie('elmar_password', sha1($_REQUEST['elmar_password_input']));  // fuer die Sitzung
        }
      }
  /*  Eintragen des Passworts in die Session funktioniert leider nicht zuverlaessig.
      $elmar_password_ok = isset($_SESSION['elmar_password']) && $_SESSION['elmar_password'] == sha1(ELMAR_PASSWORD);
      if (!$elmar_password_ok) {
        // Passwort in der Session nicht vorhanden oder falsch
        $elmar_password_ok = isset($_REQUEST['elmar_password_input']) && $_REQUEST['elmar_password_input'] == ELMAR_PASSWORD;
        if ($elmar_password_ok) {
          // Das Passwort korrekt ins Login-Formular eingegeben.
          $_SESSION['elmar_password'] = sha1($_REQUEST['elmar_password_input']);
        }
      }
  */
    }
  }
}

if ($elmar_password_ok) {
  // Wenn ok, dann zur gewuenschten Seite gehen.
  if (empty($_REQUEST['file'])) {
    #$warning = 'Der Parameter mit dem Namen der aufzurufenden Datei fehlte.';
    define('THISPAGE', 'index.php');
  } else {
    $file = $_REQUEST['file'];
    if (!file_exists(ELMAR_PATH.$file)) {
      $errmsg[] = 'Die Datei <em>'.realpath(ELMAR_PATH).$PATH_SEPARATOR.$file.'</em> existiert nicht.';
      define('THISPAGE', 'index.php');
    } else {
      define('THISPAGE', $file);
    }
  }
} else {
  // Kein oder falsches Passwort, dann zum Login.
  define('THISPAGE', 'login.php');
}

// Produktdatei in mehreren Schritten mit entsprechenden Redirects erzeugen.
$db_part = (isset($_REQUEST['db_part']) && $_REQUEST['db_part'] > 0) ? (int)$_REQUEST['db_part'] : false;
if ($db_part && $db_part * DB_STEP < productAnz()) {
  // Das Formular in prodfiles.php muss mit GET abgeschickt werden,
  // damit hier die Umleitung auf die naechste Seite mittels REQUEST_URI klappt.
  $uri = ereg_replace('db_part=[0-9]+', 'db_part='.($db_part+1), $_SERVER['REQUEST_URI']);
  header('Location: '.$uri);
}

if (!defined('DEFAULT_DELIMITER')) {
  $errmsg[] = 'Das Trennzeichen f&uuml;r Produktdateien (<code>DEFAULT_DELIMITER</code>) ist in der Konfigurationsdatei <code>elmar_config.inc.php</code> nicht gesetzt.';
} else if (DEFAULT_DELIMITER == 't') {
  $errmsg[] = 'Das Trennzeichen f&uuml;r Produktdateien (<code>DEFAULT_DELIMITER</code>) in der Konfigurationsdatei <code>elmar_config.inc.php</code> ist ung&uuml;ltig. Wurde die Datei mit dem osCommerce-Dateimanager bearbeitet? Wenn ja, siehe <a href="readme.html#osfilemanager">Readme</a>. Vermutlich soll der Wert so gesetzt werden:<br><code>define(\'DEFAULT_DELIMITER\', &quot;\\t&quot;);</code>';
}

if (isset($_GET['elmar_debug_level'])) {
  $elmar_debug_level = $_GET['elmar_debug_level'];
  setcookie('elmar_debug_level', $elmar_debug_level, time()+60*60*24*365);  // ein Jahr
//$_SESSION['elmar_debug_level'] = $elmar_debug_level;  // funktioniert nicht :-(
//} else if (isset($_SESSION['elmar_debug_level'])) {
//  $elmar_debug_level = $_SESSION['elmar_debug_level'];
} else if (isset($_COOKIE['elmar_debug_level'])) {
  $elmar_debug_level = $_COOKIE['elmar_debug_level'];
} else if (defined('ELMAR_ERROR_REPORTING')) {
  $elmar_debug_level = ELMAR_ERROR_REPORTING==E_ALL ? 'all' : (ELMAR_ERROR_REPORTING==0 ? 'none' : 'error');
} else {
  $elmar_debug_level = 'error';
}

$textlog = preg_match('/logs\/[a-z]+\.log/', THISPAGE);
$htmllog = preg_match('/logs\/[a-z]+\.html/', THISPAGE);
$load_page_frame = (THISPAGE != 'backupfile.php' && THISPAGE != 'temp.php' && !$textlog && !$htmllog);

if (!$elmar_password_ok || $load_page_frame) {
  if (preg_match('/^https?:\/\/(localhost|127\.0\.0\.1|10\.\d{1,3}.\d{1,3}\.\d{1,3}|192\.168\.\d{1,3}.\d{1,3})/', HTTP_SERVER) && !ELMAR_DEBUG) {
    $server = 'http://'.$_SERVER['SERVER_NAME'];
    if ($_SERVER['SERVER_PORT'] != '80')
      $server .= ':'.$_SERVER['SERVER_PORT'];
    if ($server != HTTP_SERVER) {
      $server = ' Statt \''.HTTP_SERVER.'\' m&uuml;sste dort vermutlich \''.$server.'\' stehen.';
    } else {
      $server = '';
    }
    $errmsg[] = 'Ihre Shop-Konfiguration enth&auml;lt einen Verweis auf eine &uuml;ber das Internet NICHT erreichbare Adresse. Bitte pr&uuml;fen Sie den Wert der Konstanten <code>HTTP_SERVER</code> (steht normalerweise in der Datei <code>includes/configure.php</code>).'.$server;
  }
  if (ELMAR_FSK_18 && !defined('FILENAME_FSK_18'))
    $warning = 'Produkte f&uuml;r Erwachsene sollen herausgefiltert werden (siehe <code>ELMAR_FSK_18</code> in der Konfigurationsdatei <code>elmar_config.inc.php</code>), aber die <em>FSK18 Contribution</em> scheint nicht installiert zu sein!';
  require(ELMAR_PATH.'menu.inc.php');
  require(ELMAR_PATH.'header.inc.php');
} else if ($textlog) {
  echo '<pre>';
}

require(ELMAR_PATH.THISPAGE);

if ($load_page_frame) {
  require(ELMAR_PATH.'footer.inc.php');
} else if ($htmllog) {
  echo "</table>\n</body>\n</html>\n";
} else if ($textlog) {
  echo '</pre>';
}

if (defined('ELMAR_MODUL_INCLUDE_APPLICATION_BOTTOM') && ELMAR_MODUL_INCLUDE_APPLICATION_BOTTOM) {
  # Koennte bei Template-Systemen Aerger machen, dann ELMAR_MODUL_INCLUDE_APPLICATION_BOTTOM auf false setzen
  # oder z.B. fuer STS sts_template.php einbinden: if (!defined('STS_START_CAPTURE')) ...
  require('includes/application_bottom.php');

  #Infos bei Zen Cart
  #if (isset($db) && is_object($db)) echo '<p align="center">Number of Queries: '.$db->queryCount().' - Query Time: '.$db->queryTime().'</p>';
}

if ($output_compression) ob_end_flush();

########################################

function sk_fileinfo($filename) {
  if (!file_exists($filename))
    echo "<p style='color:red'>Die Datei <b><code>$filename</code></b> existiert nicht! Wurden alle Dateien im richtigen Verzeichnis installiert?</p>";
  else {
    if (!is_readable($filename))
      echo "<p style='color:red'>Die Datei <b><code>$filename</code></b> existiert zwar, ist aber f&uuml;r dieses PHP-Skript nicht lesbar! Bitte kontrollieren Sie die Leserechte der Datei.</p>";
    else
      echo "\n<p style='color:red'>Die Datei <b><code>$filename</code></b> kann von diesem PHP-Skript leider nicht ge&ouml;ffnet werden! Bitte kontrollieren Sie die Leserechte der Datei.</p>\n";

    $sk_stat = stat($filename);

    if (substr(PHP_OS, 0, 3) != 'WIN' && ($sk_stat['mode'] & 0004) == 0)
      echo '<p style="color:red">Es besteht kein Leserecht f&uuml;r alle. Dieses k&ouml;nnen Sie mit <code>chmod a+r</code> setzen.</p>';

    if (function_exists('posix_getegid')) {
      if (posix_getegid() != $sk_stat['gid']) {
        $gid1 = posix_getgrgid($sk_stat['gid']);
        $gid2 = posix_getgrgid(posix_getegid());
        echo '<p>Andere Gruppe ('.$gid1['name'].' = '.$sk_stat['gid'].') als das PHP-Skript ('.$gid2['name'].' = '.posix_getegid().'). Evtl. mit <code>chgrp</code> &auml;ndern.</p>';
      } else {
        if (($sk_stat['mode'] & 0040) == 0)
          echo '<p style="color:red">Gleiche Gruppe wie das PHP-Skript, aber kein Leserecht f&uuml;r die Gruppe. Dieses k&ouml;nnen Sie mit <code>chmod g+r</code> setzen.</p>';
      }
    }

    if (function_exists('posix_geteuid')) {
      if (posix_geteuid() != $sk_stat['uid']) {
        $uid1 = posix_getpwuid($sk_stat['uid']);
        $uid2 = posix_getpwuid(posix_geteuid());
        echo '<p>Anderer User ('.$uid1['name'].' = '.$sk_stat['uid'].') als das PHP-Skript ('.$uid2['name'].' = '.posix_geteuid().'). Evtl. mit <code>chown</code> &auml;ndern.</p>';
      } else {
        if (($sk_stat['mode'] & 0400) == 0)
          echo '<p style="color:red">Gleicher User wie das PHP-Skript, aber kein Leserecht f&uuml;r den User. Dieses k&ouml;nnen Sie mit <code>chmod u+r</code> setzen.</p>';
      }
    }

    echo '<table border=1 cellspacing=1 cellpadding=3 summary="Dateieigenschaften">';
    if (substr(PHP_OS, 0, 3) != 'WIN') {
      echo '<tr><td align="right">Zugriffsrechte</td><td>'.substr(sprintf("%o", $sk_stat['mode']), -3).' = '.mfunGetPerms($sk_stat['mode']).'</td></tr>'."\n";
    }
    echo '<tr><td align="right">Dateigr&ouml;&szlig;e</td><td>'.number_format($sk_stat['size'], 0, ',', '.').' Bytes</td></tr>'."\n";
    echo '<tr><td align="right">Letzter Dateizugriff</td><td>'.date('d.m.Y H:i:s', $sk_stat['atime']).'</td></tr>'."\n";
    echo '<tr><td align="right">Letzte Datei&auml;nderung</td><td>'.date('d.m.Y H:i:s', $sk_stat['mtime']).'</td></tr>'."\n";
    echo '<tr><td align="right">Letzte &Auml;nderung der Dateieigenschaften</td><td>'.date('d.m.Y H:i:s', $sk_stat['ctime']).'</td></tr>'."\n";
    echo '</table>';
  }
}

function mfunGetPerms($in_Perms) {
/*
  if($in_Perms & 0x1000)     // FIFO pipe
    $sP = 'p';
  elseif($in_Perms & 0x2000) // Character special
    $sP = 'c';
  elseif($in_Perms & 0x4000) // Directory
    $sP = 'd';
  elseif($in_Perms & 0x6000) // Block special
    $sP = 'b';
  elseif($in_Perms & 0x8000) // Regular
    $sP = '&minus;';
  elseif($in_Perms & 0xA000) // Symbolic Link
    $sP = 'l';
  elseif($in_Perms & 0xC000) // Socket
    $sP = 's';
  else                       // UNKNOWN
    $sP = 'u';
*/
  $sP = '';
  // user
  $sP .= (($in_Perms & 0x0100) ? 'r' : '&minus;') .
         (($in_Perms & 0x0080) ? 'w' : '&minus;') .
         (($in_Perms & 0x0040) ? (($in_Perms & 0x0800) ? 's' : 'x' ) :
                                 (($in_Perms & 0x0800) ? 'S' : '&minus;'));

  // group
  $sP .= (($in_Perms & 0x0020) ? 'r' : '&minus;') .
         (($in_Perms & 0x0010) ? 'w' : '&minus;') .
         (($in_Perms & 0x0008) ? (($in_Perms & 0x0400) ? 's' : 'x' ) :
                                 (($in_Perms & 0x0400) ? 'S' : '&minus;'));

  // others
  $sP .= (($in_Perms & 0x0004) ? 'r' : '&minus;') .
         (($in_Perms & 0x0002) ? 'w' : '&minus;') .
         (($in_Perms & 0x0001) ? (($in_Perms & 0x0200) ? 't' : 'x' ) :
                                 (($in_Perms & 0x0200) ? 'T' : '&minus;'));
  return $sP;
};

?>