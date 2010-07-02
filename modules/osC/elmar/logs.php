<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: logs.php 64 2005-12-19 18:07:20Z Michael $
*/

if (@include_once('checkstart.inc.php')) checkstart(basename($_SERVER['PHP_SELF']));

$logfiles = array(
  array(ERROR_LOG, 'Fehlerprotokoll', 'Fehlerprotokoll', ERROR_LOG_NAME),
  array(ERROR_LOG_HTML, 'Fehlerprotokoll', 'Fehlerprotokoll (HTML)', ERROR_LOG_HTML_NAME),
  array(REQUEST_LOG, 'Zugriffsprotokoll f&uuml;r Echtzeitanfragen', 'Echtzeitanfragen', REQUEST_LOG_NAME),
  array(REQUEST_LOG_HTML, 'Zugriffsprotokoll f&uuml;r Echtzeitanfragen', 'Echtzeitanfragen (HTML)', REQUEST_LOG_HTML_NAME),
  array(PRODUCTS_LOG, 'Zugriffsprotokoll f&uuml;r Produktdateianfragen', 'Produktdateianfragen', PRODUCTS_LOG_NAME),
  array(PRODUCTS_LOG_HTML, 'Zugriffsprotokoll f&uuml;r Produktdateianfragen', 'Produktdateianfragen (HTML)', PRODUCTS_LOG_HTML_NAME),
);

$isForm = isset($_REQUEST['isForm']);
if ($isForm) {
  $ok = true;
  for ($i=0, $n=sizeof($logfiles); $i<$n; $i++) {  // entspricht PHP4: foreach($logfiles as $file)
    $fn = $logfiles[$i][0];
    if (file_exists($fn) && filesize($fn) > 0) {
      $fh = @fopen($fn, 'wb');
      if (!$fh) {
        $ok = false;
        $msg .= '<span class="error">Fehler: Protokolldatei "'.$fn.'" kann nicht ge&ouml;ffnet werden!</span><br>';
        error_log(date(PHP_DATE_TIME_FORMAT).' Warnung Elm@r-Modul: Kann die Datei '.$fn.' nicht zum Schreiben oeffnen!', 0);
      } else {
        fclose($fh);
      }
    }
  }
  if ($ok) {
    $msg = '<span class="ok">OK, Protokolldateien wurden geleert.</span>';
  }
}

$nichts = TRUE;
for ($i=0, $n=sizeof($logfiles); $i<$n; $i++) {  // entspricht PHP4: foreach($logfiles as $file)
  $fn = $logfiles[$i][0];
  if (file_exists($fn) && filesize($fn) > 0) {
    $nichts = FALSE;
  }
}

if (!empty($msg)) {
?>
  <h1>Status</h1>
  <div class="middleCell">
  <p><?php echo $msg; ?></p>
  </div>
<?php } ?>

<h1>Protokolle</h1>
<div class="middleCell">

<?php
  if ($nichts) {
    if ((WRITE_REQUESTLOG) && (!WRITE_ERRORLOG) && (!WRITE_PRODUCTLOG)) {
?>
      <p>Unter <a href="<?php echo ELMAR_START; ?>setup.php">Einstellungen</a> wurde die Protokollierung von Fehlermeldungen und Zugriffen auf Produktdaten nicht aktiviert.</p>
<?php
    } else {
      if ($isForm) {
?>
        <p>Die Protokolldateien sind leer.</p>
<?php
      } else {
?>
        <p>Die Protokolldateien wurden noch nicht angelegt bzw. sind leer, weil es noch nichts zu protokollieren gab.</p>
<?php
      }
    }
  } else {
?>
  <p>
    Hier k&ouml;nnen Sie sich die Protokolldateien ansehen, die in Abh&auml;ngigkeit von den unter <a href="<?php echo ELMAR_START; ?>setup.php">Einstellungen</a> gemachten Angaben Zugriffe auf ihre Produktdaten aufzeichnen.
    Die Dateinamen beziehen sich auf das Verzeichnis
    <code><?php echo stripslashes(dirname($_SERVER['SCRIPT_FILENAME'])); ?></code>.
  </p>
  <table border="0" cellspacing="3" cellpadding="6" summary="Protokolldateien">
    <?php
    for ($i=0, $n=sizeof($logfiles); $i<$n; $i++) {  // entspricht PHP4: foreach($logfiles as $file)
      $file = $logfiles[$i];
      if (file_exists($file[0]) && filesize($file[0]) > 0) {
?>
        <tr>
          <td><a href="<?php echo ELMAR_START.$file[3]; ?>" target="_blank" title="<?php echo $file[1]; ?> ansehen"><?php echo $file[2]; ?></a></td>
          <td><code><?php echo $file[0]; ?></code></td>
          <td align="right"><code><?php echo number_format(filesize($file[0]), 0, ',', '.'); ?>&nbsp;Bytes</code></td>
          <td<?php if (time() - filemtime($file[0]) < 60*60*24) echo ' style="color:red"'; ?>><code><?php echo date(PHP_DATE_TIME_FORMAT, filemtime($file[0])); ?></code></td>
        </tr>
<?php
      }
    }
    ?>
  </table>
</div>

<h1>Protokolldateien leeren</h1>
<div class="middleCell">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onSubmit="return confirm('M&ouml;chten Sie wirklich die Protokolldateien l&ouml;schen?');">
  <input type="hidden" name="file" value="<?php echo THISPAGE; ?>">
  <input type="hidden" name="isForm" value="yes">
  <p>
    Falls die Protokolldateien zu gro&szlig; werden, k&ouml;nnen Sie sie hier leeren, d.&nbsp;h. auf 0&nbsp;Bytes zur&uuml;cksetzen.
  </p>
  <p>
    <input type="submit" value="Protokolldateien leeren">
  </p>
</form>

<?php } ?>

</div>
