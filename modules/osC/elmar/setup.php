<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: setup.php 64 2005-12-19 18:07:20Z Michael $
*/

if (@include_once('checkstart.inc.php')) checkstart(basename($_SERVER['PHP_SELF']));

$changes = 0;
$isForm = !empty($_REQUEST['isForm']);
if ($isForm) {
  // Wenn eine Checkbox nicht angekreuzt wird, liefert isset($_REQUEST['box']) FALSE.
  // Durch das HTML-Formular gilt ausserdem: $_REQUEST['box']=='yes'
  // (Nur bei direktem Aufruf koennte $_REQUEST['box']!='yes' sein.)
  $productFile = isset($_REQUEST['productFile']);
  $productLog = isset($_REQUEST['productLog']);
  $requestLog = isset($_REQUEST['requestLog']);
  $errorLog = isset($_REQUEST['errorLog']);
  $logFormat = ((isset($_REQUEST['logFormat']) and $_REQUEST['logFormat'] == 'HTML') ? 'HTML' : 'TXT');

  $configs = new Config;

  if (WRITE_PRODUCTLOG != $productLog) {
    $configs->set('WRITE_PRODUCTLOG', $productLog);
    ++$changes;
  }

  if (WRITE_REQUESTLOG != $requestLog) {
    $configs->set('WRITE_REQUESTLOG', $requestLog);
    ++$changes;
  }

  if (WRITE_ERRORLOG != $errorLog) {
    $configs->set('WRITE_ERRORLOG', $errorLog);
    ++$changes;
  }

  if (WRITE_PRODUCTFILE != $productFile) {
    $configs->set('WRITE_PRODUCTFILE', $productFile);
    ++$changes;
  }

  if (LOGFORMAT != $logFormat) {
    $configs->set('LOGFORMAT', $logFormat);
    ++$changes;
  }

  if ($changes > 0)
      $msg = $configs->save();

} else {
  $errorLog = WRITE_ERRORLOG;
  $productFile = WRITE_PRODUCTFILE;
  $productLog = WRITE_PRODUCTLOG;
  $requestLog = WRITE_REQUESTLOG;
  $logFormat = LOGFORMAT;
}

clearstatcache();

if ($logFormat == 'HTML') {
  $warn_error_log = !check_writeable(ERROR_LOG_HTML);
  $warn_request_log = !check_writeable(REQUEST_LOG_HTML);
  $warn_products_log = !check_writeable(PRODUCTS_LOG_HTML);
} else {
  $warn_error_log = !check_writeable(ERROR_LOG);
  $warn_request_log = !check_writeable(REQUEST_LOG);
  $warn_products_log = !check_writeable(PRODUCTS_LOG);
}

?>

<h1>Einstellungen f&uuml;r das Elm@r-Modul</h1>
<div class="middleCell">

<?php
if ($isForm) {
  if ($changes > 0) {
    if ($msg == 'OK')
      if ($changes == 1)
        echo '<p><font color="green">OK, eine Einstellung wurde ge&auml;ndert.</font></p>';
      else
        echo '<p><font color="green">OK, '.$changes.' Einstellungen wurden ge&auml;ndert.</font></p>';
    else
      echo '<p><font color="red">Es ist ein Fehler aufgetreten: '.$msg.'</font></p>';
  } else {
    echo '<p><font color="red">Die Parameter waren schon wie gew&uuml;nscht eingestellt.</font></p>';
  }
}
?>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <input type="hidden" name="file" value="<?php echo THISPAGE; ?>">
    <input type="hidden" name="isForm" value="yes">
    <table border="0" cellpadding="3" cellspacing="3" summary="Layout Formular">

      <tr valign=top>
        <td align=left class="main"><input type="checkbox" name="productFile" value="yes" <?php if ($productFile) echo 'checked'; ?>></td>
        <td><STRONG>Produktdatei speichern</STRONG> <?php if (productAnz() > 1000) echo '(wird empfohlen)'; ?></td>
      </tr>
      <tr><td>&nbsp;</td><td>
      Bitte stellen Sie ein, ob beim Abrufen von Produktdaten &uuml;ber die URL <a href="<?php echo ELMAR_SHOP_ROOT_DIR.'elmar_products.php'; ?>"><code><?php echo ELMAR_SHOP_ROOT_DIR.'elmar_products.php'; ?></code></a> automatisch die Produktdatei <code class="data"><?php echo DIR_FS_CATALOG.PRODUCTFILE; ?></code> erzeugt werden soll.
      Dies ist insbesondere dann sinnvoll, wenn der Server nicht der Schnellste ist, die Produktdaten sehr h&auml;ufig abgerufen werden oder der Shop sehr viele Produkte f&uuml;hrt. Anfragen an die URL werden dann gem&auml;&szlig; <CODE>UPDATEINTERVAL</CODE>-Einstellung f&uuml;r <?php echo UPDATEINTERVAL; ?>&nbsp;Sekunden (<?php echo number_format(UPDATEINTERVAL/3600, 1, ',', ''); ?>&nbsp;Stunden) effizient durch Weiterleitung auf die generierte Produktdatei beantwortet. Danach erfolgt automatisch eine Aktualisierung der Produktdatei beim Abruf. Solange alle Preisvergleichsdienste die obige URL benutzen, brauchen Sie sich also nicht mehr um die Aktualisierung der Produktdatei zu k&uuml;mmern!
      <?php if (!check_writeable(PRODUCTFILE)) { ?>
        <br><span style="color:red">Achtung:
        <?php if (file_exists(dirname(PRODUCTFILE))) { ?>
          F&uuml;r die Produktdatei <code><?php echo PRODUCTFILE; ?></code> fehlen Schreibrechte.
        <?php } else { ?>
          Das Verzeichnis <code><?php echo dirname(PRODUCTFILE); ?></code> f&uuml;r die Produktdatei existiert nicht.
        <?php } ?>
        </span> Sie sollten diese Option nur aktivieren, wenn das Elm@r-Modul die Produktdatei erstellen und &auml;ndern darf.
      <?php } ?>
      </td></tr>

      <tr valign=top>
        <td align=left class="main"><input type="checkbox" name="productLog" value="yes" <?php if ($productLog) echo 'checked'; ?>></td>
        <td><STRONG>Produktdateianfragen protokollieren</STRONG></td>
      </tr>
      <tr><td>&nbsp;</td><td>
      Wenn Sie sehen m&ouml;chten, wer mit welchen Parametern auf die Produktdatei zugreift, aktivieren Sie die Protokollierung von Produktdateianfragen.
      <?php if ($warn_products_log) { ?>
        <br><span style="color:red">Achtung: F&uuml;r die Protokolldatei <code><?php echo $logFormat == 'HTML' ? PRODUCTS_LOG_HTML : PRODUCTS_LOG; ?></code> fehlen Schreibrechte.</span>
        Sie sollten diese Option nur aktivieren, wenn das Elm@r-Modul die Protokolldatei erstellen und &auml;ndern darf.
      <?php } ?>
      </td></tr>

      <tr valign=top>
            <td align=left class="main"><input type="checkbox" name="requestLog" value="yes" <?php if ($requestLog) echo 'checked'; ?>></td>
            <td><STRONG>Echtzeitanfragen protokollieren</STRONG></td>
      </tr>
      <tr><td>&nbsp;</td><td>
      Wenn Sie sehen m&ouml;chten, wonach Kunden bei Preisvergleichsdiensten suchen, aktivieren Sie die Protokollierung von Echtzeitanfragen.
      <?php if ($warn_request_log) { ?>
        <br><span style="color:red">Achtung: F&uuml;r die Protokolldatei <code><?php echo $logFormat == 'HTML' ? REQUEST_LOG_HTML : REQUEST_LOG; ?></code> fehlen Schreibrechte.</span>
        Sie sollten diese Option nur aktivieren, wenn das Elm@r-Modul die Protokolldatei erstellen und &auml;ndern darf.
      <?php } ?>
      </td></tr>

      <tr valign=top>
        <td align=left class="main"><input type="checkbox" name="errorLog" value="yes" <?php if ($errorLog) echo'checked'; ?>></td>
        <td><STRONG>Fehlermeldungen protokollieren</STRONG> (wird empfohlen)</td>
      </tr>
      <tr><td>&nbsp;</td><td>
      Geben Sie an, ob etwaige Fehlermeldungen in einer Protokolldatei aufgezeichnet werden sollen.
      Dies ist nicht unbedingt notwendig, liefert aber unter Umst&auml;nden hilfreiche Informationen zur Fehlersuche.
      <?php if ($warn_error_log) { ?>
        <br><span style="color:red">Achtung: F&uuml;r die Protokolldatei <code><?php echo $logFormat == 'HTML' ? ERROR_LOG_HTML : ERROR_LOG; ?></code> fehlen Schreibrechte.</span>
        Sie sollten diese Option nur aktivieren, wenn das Elm@r-Modul die Protokolldatei erstellen und &auml;ndern darf.
      <?php } ?>
      </td></tr>

      <tr valign=top>
        <td colspan="2" align=left class="main">
        <STRONG>Format der Protokolldateien:</STRONG>
        <input type="radio" name="logFormat" value="TXT"  <?php if ($logFormat == 'TXT')  echo 'checked'; ?>>Text &nbsp;
        <input type="radio" name="logFormat" value="HTML" <?php if ($logFormat == 'HTML') echo 'checked'; ?>>HTML</td>
      </tr>

      <tr valign=top>
        <td colspan="2" align=left class="main"><input type="submit" value=" &nbsp; OK &nbsp; " title="Einstellungen vornehmen"></td>
      </tr>
    </table>
    <p>
      Sie k&ouml;nnen die Einstellungen jederzeit &auml;ndern, indem Sie diese Seite erneut aufrufen.
    </p>
  </form>
</div>
