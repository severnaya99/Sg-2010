<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: menu.inc.php 64 2005-12-19 18:07:20Z Michael $
*/

#if (@include_once('checkstart.inc.php')) checkstart(basename('index.php'));

$menuitems = array();

if (!$elmar_password_ok || $logout) {
  // Wenn das Passwort nicht stimmt, die Login-Seite ohne Menuepunkte anzeigen.
  define('PAGETITLE', 'Login');
} else {
  $menuitems[] = array( 'index.php', 'Startseite', '&Uuml;bersicht' );
  $menuitems[] = array( 'shop.php', 'Shopdatei ansehen, &auml;ndern und pr&uuml;fen', 'Shopdatei' );
  $menuitems[] = array( 'reg.php', 'Shop bei Elm@r registrieren', 'Registrierung' );
  if ($can_write) {
    $menuitems[] = array( 'setup.php', 'Einstellungen f&uuml;r das Modul vornehmen', 'Einstellungen' );
    $menuitems[] = array( 'logs.php', 'Protokolldateien ansehen', 'Protokolle' );
    $menuitems[] = array( 'backup.php', 'Einstellungen und Dateien sichern', 'Backup' );
  }
  $menuitems[] = array( 'test1.php', 'Testen des Zugriffs auf die Produktdatei', 'Testen 1' );
  $menuitems[] = array( 'test2.php', 'Testen des Zugriffs per Echtzeitschnittstelle', 'Testen 2' );
  $menuitems[] = array( 'prodfiles.php', 'Generierung von Produktdateien f&uuml;r Preisvergleichsdienste', 'Produktdateien' );
  $menuitems[] = array( 'update.php', 'Pr&uuml;fen, ob eine neuere Version des Moduls existiert', 'Update' );
  $menuitems[] = array( 'feedback.php', 'Anregungen, Verbesserungsvorschl&auml;ge, Kritik und Lob', 'Feedback' );

  if (defined('ELMAR_SYSINFO') && ELMAR_SYSINFO)
    $menuitems[] = array( 'sysinfo.php', 'Systeminformationen', 'System' );

  if (defined('ELMAR_PASSWORD') && ELMAR_PASSWORD!=''
      && ((defined('ELMAR_USE_PHP_AUTH') && !ELMAR_USE_PHP_AUTH) || !isset($_SERVER['PHP_AUTH_PW']))
      && (isset($_COOKIE['elmar_password']) || isset($_REQUEST['elmar_password_input'])))
    $menuitems[] = array( 'logout.php', 'Abmelden', 'Abmelden' );

  if (THISPAGE == 'letter.php') {
    define('PAGETITLE', 'Musterbrief');
    $idx = ($can_write ? 8 : 5);
  } else if (THISPAGE == 'install.php') {
    define('PAGETITLE', 'Installation');
    $idx = ($can_write ? 8 : 5);
  } else {
    $n = sizeof($menuitems);
    for ($idx = 0; $idx < $n && $menuitems[$idx][0] != THISPAGE; ++$idx) ;
    if ($idx >= $n) {
      if (THISPAGE == 'sysinfo.php' && (!defined('ELMAR_SYSINFO') || !ELMAR_SYSINFO)) {
        trigger_error('<br>Die Seite mit den Systeminformationen "<code>'.THISPAGE.'</code>" kann nur aufgerufen werden, wenn die Konstante <code>ELMAR_SYSINFO</code> in der Datei <code>elmar_config.inc.php</code> den Wert <code>TRUE</code> hat.', E_USER_ERROR);
      } else {
        trigger_error('<br>Die Seite "<strong>'.THISPAGE.'</strong>" geh&ouml;rt entweder nicht zum Elm@r-Modul oder kann aufgrund fehlender Schreibrechte f&uuml;r das Modul nicht sinnvoll aufgerufen werden (siehe <a href="'.ELMAR_PATH.'readme.html#Schreibrechte">Readme</a>).<br>', E_USER_ERROR);
      }
    }

    define('PAGETITLE', $menuitems[$idx][2]);
  }
}

function printmenu() {
  global $menuitems, $elmar_debug_level;
?>
<!-- menu_begin -->
<table id="menu" border="0" cellpadding="3" cellspacing="0" align="left" summary="Layout Men&uuml;">
<?php
  for ($i=0, $n=sizeof($menuitems); $i<$n; $i++) {  // entspricht PHP4: foreach($menuitems as $item)
    $item = $menuitems[$i];
    if (THISPAGE == $item[0])
      echo "<tr><td style=\"background-color:#FFF8DC\"><strong>$item[2]</strong></td></tr>\n";
    else
      echo '<tr><td><a class="submenu" href="'.ELMAR_START.$item[0]."\" title=\"$item[1]\">$item[2]</a></td></tr>\n";
  }

  echo "<tr><td align='center'>\n";
  navbuttons();
?>
</td></tr>
<tr><td>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank"><p>
  <input type="hidden" name="cmd" value="_xclick">
  <input type="hidden" name="business" value="stefan@kuhlins.de">
  <input type="hidden" name="item_name" value="Support Elm@r-Modul f&uuml;r osCommerce">
  <input type="hidden" name="no_shipping" value="1">
  <input type="hidden" name="cn" value="Nachricht">
  <input type="hidden" name="currency_code" value="EUR">
  <input type="hidden" name="lc" value="DE">
  <input style="margin-top:3px;margin-bottom:3px;margin-left:10px;margin-right:10px;width:80px;height:31px" type="image" src="<?php echo ELMAR_PATH; ?>img/paypal.gif" name="submit" alt="Spenden" title="F&ouml;rdern Sie die Weiterentwicklung des Elm@r-Moduls!"></p>
</form>
</td></tr>
<tr><td>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" name="formdebuglevel">
    <input type="hidden" name="file" value="<?php echo THISPAGE; ?>">
    <p align="center" style="color:white" title="Einstellen, ob alle, nur Fehlermeldungen oder keine Meldungen angezeigt werden. Benutzt Cookies.">
      Meldungen:
      <select name="elmar_debug_level" onChange="formdebuglevel.submit()">
        <option value="error" <?php if ($elmar_debug_level=='error') echo 'selected'; ?>>Fehler</option>
        <option value="all" <?php if ($elmar_debug_level=='all') echo 'selected'; ?>>Alle</option>
        <option value="none" <?php if ($elmar_debug_level=='none') echo 'selected'; ?>>Keine</option>
      </select>
      <noscript><input type="submit" value="OK" title="Einstellen, ob alle, nur Fehlermeldungen oder keine Meldungen angezeigt werden."></noscript>
    </p>
  </form>
</td></tr>
</table>
<!-- menu_end -->
<?php
}

function navbuttons() {
  global $menuitems;
  global $idx;
?>
<!-- navbuttons_begin -->
  <?php if ($idx > 0) { ?>
    <a href="<?php echo ELMAR_START.$menuitems[$idx-1][0]; ?>" title="<?php echo $menuitems[$idx-1][1]; ?>"><IMG SRC="<?php echo ELMAR_PATH; ?>img/zurueck.gif" HEIGHT=15 WIDTH=15 BORDER=0 ALT="Zur&uuml;ck" title="<?php echo $menuitems[$idx-1][1]; ?>"></a>
  <?php } else { ?>
    <IMG SRC="<?php echo ELMAR_PATH; ?>img/spacer.gif" HEIGHT=15 WIDTH=15 ALT="">
  <?php } ?>
  &nbsp;
  <?php if ($idx+1 < count($menuitems)) { ?>
    <a href="<?php echo ELMAR_START.$menuitems[$idx+1][0]; ?>" title="<?php echo $menuitems[$idx+1][1]; ?>"><IMG SRC="<?php echo ELMAR_PATH; ?>img/weiter.gif" HEIGHT=15 WIDTH=15 BORDER=0 ALT="Weiter" title="<?php echo $menuitems[$idx+1][1]; ?>"></a>
  <?php } else { ?>
    <IMG SRC="<?php echo ELMAR_PATH; ?>img/spacer.gif" HEIGHT=15 WIDTH=15 ALT="">
  <?php } ?>
<!-- navbuttons_end -->
<?php } ?>
