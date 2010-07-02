<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: shop.php 64 2005-12-19 18:07:20Z Michael $
*/

if (@include_once('checkstart.inc.php')) checkstart(basename($_SERVER['PHP_SELF']));
?>

<SCRIPT TYPE="text/javascript" SRC="<?php echo ELMAR_PATH; ?>check.js"></SCRIPT>

<?php
#clearstatcache();
$reload = FALSE;
$shopinfo_changed = FALSE;
if (isset($_REQUEST['change_shopinfo']) && $_REQUEST['change_shopinfo']=='yes') {
  $shopinfo_url = $_REQUEST['shopinfo_url'];
  $shopinfo_path = stripslashes($_REQUEST['shopinfo_path']);
  if (is_dir($shopinfo_path)) {
    $shopinfo_path .= SHOPINFO_XML;
  }
  if (!file_exists($shopinfo_path)) {
    $change_shopinfo = '<font color="red">Die Shopdatei <code>'.$shopinfo_path.'</code> wurde nicht gefunden.</font>';
  } else if (ini_get('allow_url_fopen') && !check_url($shopinfo_url)) {
    $change_shopinfo = '<font color="red">Die URL der Shopdatei <code>'.$shopinfo_url.'</code> konnte nicht ge&ouml;ffnet werden.</font>';
  } else {
    $changes = 0;
    $configs = new Config;
    if (SHOPINFO_XML_FILE != $shopinfo_path) {
      $configs->set('SHOPINFO_XML_FILE', $shopinfo_path);
      ++$changes;
    }
    if (SHOPINFO_XML_URL != $shopinfo_url) {
      $configs->set('SHOPINFO_XML_URL', $shopinfo_url);
      ++$changes;
    }
    if ($changes > 0) {
      $msg = $configs->save();
      if ($msg != 'OK') {
        $change_shopinfo = '<font color="red">Die neuen Daten f&uuml;r die Shopdatei konnten nicht gespeichert werden:<br>'. $msg.'</font>';
      } else {
        // Die neuen Daten sind nun gespeichert, werden aber erst beim n&auml;chsten Mal eingelesen:
        // Deshalb Reload der Seite!
        $reload = TRUE;
?>
        <h1 class="ok">Daten wurden gespeichert</h1>
        <div class="okCell">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
          <input type="hidden" name="file" value="<?php echo THISPAGE; ?>">
          <p class="ok">OK, die neuen Daten f&uuml;r die Shopdatei wurden gespeichert.</p>
<?php if (!ini_get('allow_url_fopen')) { ?>
          <p>Klicken Sie hier zum <a href="<?php echo $shopinfo_url; ?>" target="_blank">Pr&uuml;fen der URL der Shopdatei</a>.</p>
<?php } ?>
          <table border="0" cellspacing="3" cellpadding="3" summary="Daten der Shopdatei">
            <tr class="row1"><th>Pfad der Shopdatei:</th><td><code><?php echo $shopinfo_path; ?></code></td></tr>
            <tr class="row1"><th>URL der Shopdatei:</th><td><code><?php echo $shopinfo_url; ?></code></td></tr>
            <tr><td>&nbsp;</td><td><input type=submit value="Weiter"></td></tr>
          </table>
        </form>
        </div>
<?php
      }
    } else {
      $change_shopinfo = '<font color="red">Die Parameter waren schon wie gew&uuml;nscht eingestellt.</font>';
    }
  }
} else {
  $shopinfo_changed = md5_check(DIR_FS_SHOPINFO_XML);
}
?>

<?php if (!$reload) { ?>

<?php if (!shopNameOk() || !emailOk()) { ?>
<h1 class="error">Achtung</h1>
<div class="errorCell">
  <p>
    Sie haben anscheinend noch
    <?php if (!shopNameOk() && !emailOk()) { ?>
      keinen <strong>Namen</strong> und keine <strong>E-Mail-Adresse</strong>
    <?php } elseif (!shopNameOk()) { ?>
      keinen <strong>Namen</strong>
    <?php } elseif (!emailOk()) { ?>
      keine <strong>E-Mail-Adresse</strong>
    <?php } ?>
    f&uuml;r Ihren osCommerce-Shop eingetragen.
    Dies k&ouml;nnen Sie in der <strong>Administrationssektion</strong> unter <strong>Konfiguration: My Store</strong> einstellen.
  </p>
  <?php if (!shopNameOk()) { ?>
    <p class="comment">
      Sie sollten die Shopdatei erst bearbeiten, wenn der Shopname korrekt ist.
    </p>
  <?php } ?>
</div>
<?php } ?>

<h1>Shopdatei</h1>
<div class="middleCell">
  <p>

<?php
  $shopinfo_exists = file_exists(DIR_FS_SHOPINFO_XML) && filesize(DIR_FS_SHOPINFO_XML) > 0;
  if ($shopinfo_exists) {
?>
    <?php if (!$shopinfo_changed) { ?>
      F&uuml;r Ihren Shop wurde bereits automatisch eine Shopdatei (<code><?php echo DIR_FS_SHOPINFO_XML; ?></code>) mit den Basisdaten dieses osCommerce-Shops erstellt.
      Obwohl diese Daten zur Anmeldung Ihres Shops bei Elm@r bereits ausreichen, empfehlen wir dringend,
      dass Sie die Daten vervollst&auml;ndigen, um Ihren Shop gegen&uuml;ber potenziellen Kunden bestm&ouml;glich zu pr&auml;sentieren.
      Mit dem folgenden Button werden Sie dazu zu einem HTML-Formular des elektronischen Marktes Elm@r gef&uuml;hrt.
      Nachdem Sie dort Ihre Eingaben gemacht haben, erhalten Sie eine neue Shopdatei, mit der Sie die alte &uuml;berschreiben.
      Bei Bedarf k&ouml;nnen Sie die Daten sp&auml;ter jederzeit aktualisieren.
    <?php } else { ?>
      Sie haben Ihre Shopdatei (<code><?php echo DIR_FS_SHOPINFO_XML; ?></code>) anscheinend schon einmal ge&auml;ndert.
      Zur Aktualisierung der Daten werden Sie mit dem folgenden Button zu einem HTML-Formular des elektronischen Marktes Elm@r gef&uuml;hrt.
    <?php } ?>
<?php
  } else {
    if (!file_exists(DIR_FS_SHOPINFO_XML)) {
?>
      <u>Hinweis:</u> Die Shopdatei <code><?php echo DIR_FS_SHOPINFO_XML; ?></code> existiert nicht. Es geht aber auch so.
<?php } else if (filesize(DIR_FS_SHOPINFO_XML) == 0) { ?>
      <u>Hinweis:</u> Die Shopdatei <code><?php echo DIR_FS_SHOPINFO_XML; ?></code> ist leer. Es geht aber auch so.
<?php } ?>
  </p>
  <p>
    Mit dem folgenden Button werden Sie zu einem HTML-Formular des elektronischen Marktes Elm@r gef&uuml;hrt. Nachdem Sie dort Ihre Eingaben gemacht haben, erhalten Sie eine neue Shopdatei, die auf Ihrem Webserver abzulegen ist. Bei Bedarf k&ouml;nnen Sie die Daten sp&auml;ter jederzeit aktualisieren.
<?php } ?>
    (Hier gibt es <a href="<?php echo ELMAR_URL; ?>nav?dest=impl.shopdata.index" target="_blank">Informationen zu Shopdateien</a>.)
  </p>
  <table summary="" cellspacing=0 cellpadding=0 border=0>
		<tr>
			<td>
				<form action="<?php echo ELMAR_SHOPINFO_URL; ?>" method="GET" target="_blank">
					<input type="hidden" name="exec" value="elmarmodul">
					<input type="hidden" name="url" value="<?php echo ($shopinfo_exists ? DIR_WS_SHOPINFO_XML : ELMAR_SHOP_ROOT_DIR.'elmar_shopinfo.php'); ?>">
					<p><input type=submit value="Shopdatei &auml;ndern" title="Shopdatei bearbeiten (ohne technische Details)"></p>
				</form>
			</td>
			<td>
				<form action="<?php echo ELMAR_SHOPINFO_URL; ?>" method="GET" target="_blank">
					<input type="hidden" name="exec" value="loadoldfile">
					<input type="hidden" name="url" value="<?php echo ($shopinfo_exists ? DIR_WS_SHOPINFO_XML : ELMAR_SHOP_ROOT_DIR.'elmar_shopinfo.php'); ?>">
					<p><input type=submit value="Expertenmodus" title="Shopdatei inkl. technischer Details bearbeiten"></p>
				</form>
			</td>
		</tr>
  </table>
  <p>Im &quot;Expertenmodus&quot; k&ouml;nnen Sie auch technische Details zur Produktdatei und zur Echtzeitschnittstelle einstellen. Dies ist nur in Ausnahmef&auml;llen notwendig.</p>
</div>

<?php if ($shopinfo_exists) { ?>
  <h1>Shopdatei ansehen</h1>
  <div class="middleCell">
    <p>Hier k&ouml;nnen Sie sich Ihre Shopdatei ansehen, die unter der URL <code><?php echo DIR_WS_SHOPINFO_XML; ?></code> erreichbar ist.

    <?php if (file_exists(DIR_FS_SHOPINFO_XML)) { ?>
      <br>Die Datei ist unter <code><?php echo DIR_FS_SHOPINFO_XML; ?></code> gespeichert.
    <?php } ?>

    </p>

    <form action="<?php echo DIR_WS_SHOPINFO_XML; ?>" target="_blank" method="GET">
      <p><input type=submit value="Shopdatei anzeigen" title="Shopdatei anzeigen"></p>
    </form>
  </div>

  <h1>Validierung</h1>
  <div class="middleCell">
    <p>Mit dem folgenden Button k&ouml;nnen Sie Ihre Shopdatei <code>shopinfo.xml</code> von Elm@r pr&uuml;fen lassen.
    Das ist z.&nbsp;B. sinnvoll, nachdem Sie die Shopdatei mit einem Texteditor ge&auml;ndert haben.</p>
    <form action="<?php echo ELMAR_SERVICE_URL; ?>" method="GET" target="_blank">
      <input type=hidden name="action" value="shopinfo">
      <input type=hidden name="url" value="<?php echo DIR_WS_SHOPINFO_XML; ?>">
      <p>
        <input type=submit value="Shopdatei pr&uuml;fen" title="Validierung der Shopdatei bei Elm@r">
      </p>
    </form>
  </div>
<?php } ?>

<h1>Ort der Shopdatei</h1>
<div class="middleCell">
<?php if (isset($change_shopinfo)) echo "<p><strong>$change_shopinfo</strong></p>\n"; ?>
  <p>Die Shopdatei <code>shopinfo.xml</code> sollte m&ouml;glichst im Stammverzeichnis des Webservers abgelegt werden. Falls dies nicht m&ouml;glich oder nicht gew&uuml;nscht ist, geht aber auch jeder andere Ort. Damit das Elm@r-Modul die richtige Shopdatei benutzt, geben Sie bitte gegebenenfalls den Ort Ihrer Shopdatei an. (Sie k&ouml;nnen die Daten auch direkt in die Datei <code><?php $rp = realpath(CONFIG); echo ($rp ?  $rp : CONFIG); ?></code> schreiben.)</p>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onSubmit="return check_shopform(this);">
    <input type="hidden" name="file" value="<?php echo THISPAGE; ?>">
    <input type="hidden" name="change_shopinfo" value="yes">
    <table border="0" cellspacing="3" cellpadding="3" summary="Daten der Shopdatei">
      <tr><td>Pfad der Shopdatei:</td><td><input type=text name="shopinfo_path" size="80" value="<?php echo !empty($shopinfo_path) ? $shopinfo_path : DIR_FS_SHOPINFO_XML; ?>"></td></tr>
      <tr><td>URL der Shopdatei:</td><td><input type=text name="shopinfo_url" size="80" value="<?php echo !empty($shopinfo_url) ? $shopinfo_url : DIR_WS_SHOPINFO_XML; ?>"></td></tr>
      <tr><td>&nbsp;</td><td><input type=submit value="Position der Shopdatei &auml;ndern"></td></tr>
    </table>
  </form>
</div>

<h1>Shopdatei nochmals erzeugen</h1>
<div class="middleCell">
  <p>
    Mit dem folgenden Button kann die initiale Shopdatei nochmals zum Download erzeugt werden.
    Diese Datei k&ouml;nnen Sie bei <a href="http://elektronischer-markt.de/" target="_blank">Elm@r</a>, dem elektronische Markt hochladen und &auml;ndern.
    Dies ist zum Beispiel praktisch, falls Ihre Shopdatei infolge unsachgem&auml;&szlig;er &Auml;nderungen unbrauchbar geworden ist.
    <?php if (file_exists(DIR_FS_SHOPINFO_XML)) { ?>
      <br>(Die Datei unter <code><?php echo DIR_FS_SHOPINFO_XML; ?></code> wird <STRONG>nicht</STRONG> automatisch &uuml;berschrieben.
      Falls Sie die vorhandene Shopdatei austauschen m&ouml;chten, k&ouml;nnen Sie gegebenenfalls die hier generierte Datei per FTP auf dem Webserver speichern.)
    <?php } ?>
  </p>
  <form action="elmar_shopinfo.php" method="GET">
    <input type="hidden" name="force" value="yes">
    <p><input type="submit" value="Shopdatei nochmals erzeugen"></p>
  </form>
</div>

<?php } /* if reload */ ?>
