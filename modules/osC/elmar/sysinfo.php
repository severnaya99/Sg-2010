<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: sysinfo.php 64 2005-12-19 18:07:20Z Michael $
*/

if (@include_once('checkstart.inc.php')) checkstart(basename($_SERVER['PHP_SELF']));
?>

<h1>Systeminformationen</h1>
<div class="middleCell" style="width:600px">
<p>Die aufgef&uuml;hrten Werte werden in der Konfigurationsdatei <code>php.ini</code> vom Adminstrator des Webservers eingestellt. Unter Umst&auml;nden f&uuml;hren einige Einstellungen zu Beschr&auml;nkungen in der Funktionalit&auml;t des Elm@r-Moduls. Wenn der Webadmin nicht bereit ist, die Einstellungen zu &auml;ndern, m&uuml;ssen Sie mit diesen Beschr&auml;nkungen leider leben. Soweit das technisch m&ouml;glich ist, versucht das Elm@r-Modul die Probleme auf Kosten des Komforts zu umgehen.</p>

<dl>
<?php if (ini_get('safe_mode')) { ?>
  <dt><span class="error"><code>safe_mode</code> ist aktiv.</span></dt>
  <dd>Das Elm@r-Modul kann u.&nbsp;a. die Ausf&uuml;hrungszeit seiner PHP-Skripten nicht verl&auml;ngern, sofern dies bei gro&szlig;en Produktdateien erforderlich sein sollte.</dd>
<?php } ?>

<?php
  $max_execution_time = (int) ini_get('max_execution_time');
  if ($max_execution_time) {
		$productAnz = productAnz();
?>
    <dt><span class="error"><code>max_execution_time</code> ist <?php echo $max_execution_time; ?>.</span></dt>
    <dd>Die maximale Laufzeit f&uuml;r PHP-Skripte betr&auml;gt also <?php echo $max_execution_time; ?>&nbsp;Sekunden.
<?php if ($max_execution_time <= (1 + $productAnz/DB_STEP) * DB_SLEEP) { ?>
    Das k&ouml;nnte zur Erzeugung gro&szlig;er Produktdateien zu kurz sein.
    Falls Timeout-Probleme wie leere oder abgeschnittene Produktdateien auftreten,
    versuchen Sie die Werte f&uuml;r <code>DB_STEP</code> und <code>DB_SLEEP</code> in <code>elmar_config.inc.php</code> anzupassen.
    Wenn das nicht hilft, probieren Sie, Produktdateien in mehreren Schritten zu generieren.
<?php } ?>
    </dd>
<?php } ?>

<?php
  #if (function_exists('memory_get_usage')) {
  $memory_limit = ini_get('memory_limit');  // z.B. '8M'
  if ($memory_limit) {
?>
    <dt><span class="error"><code>memory_limit</code> ist <?php echo $memory_limit; ?>.</span></dt>
    <dd>Maximal stehen einem PHP-Skript also <?php echo $memory_limit; ?>&nbsp;Bytes an Hauptspeicher zur Verfügung.
    Das k&ouml;nnte zur Erzeugung gro&szlig;er Produktdateien zu wenig sein.
    Falls Probleme wie Abbrüche beim Erzeugen von umfangreichen Produktdateien auftreten,
    versuchen Sie den Wert f&uuml;r <code>DB_STEP</code> in <code>elmar_config.inc.php</code> zu reduzieren
    und Produktdateien in mehreren Schritten zu generieren.
    </dd>
<?php } ?>

<?php if (!ini_get('allow_url_fopen')) { ?>
  <dt><span class="error"><code>allow_url_fopen</code> ist nicht aktiv.</span></dt>
  <dd>Das Elm@r-Modul kann gro&szlig;e Produktdateien nicht in mehreren Schritten generieren, um die Beschr&auml;nkung der maximalen Ausf&uuml;hrungszeit f&uuml;r PHP-Skripte zu umgehen. Au&szlig;erdem kann nicht per Knopfdruck gepr&uuml;ft werden, ob eine neue Version des Elm@r-Moduls zum Download bereitsteht.</dd>
<?php } ?>

<?php if (!function_exists('ftp_connect')) { ?>
  <dt><span class="error">Die Funktion <code>ftp_connect</code> existiert nicht.</span></dt>
  <dd>Das Elm@r-Modul kann keine Produktdateien automatisch per FTP auf Portal-Server hochladen.</dd>
<?php } ?>

</dl>
</div>

<h1>Konfiguration des Shop-Systems</h1>
<div class="middleCell" style="width:600px">
<p>Die folgenden Konstanten des Shop-Systems nutzt das Elm@r-Modul. Die Einstellungen werden üblicherweise in der Datei <code>include/configure.php</code> vorgenommen.</p>
<table class="b" summary="Konfiguration des Shop-Systems" cellpadding="5" cellspacing="0" border="0">
<tr class="row1"><th class="b">HTTP_SERVER</th><td class="b"><?php echo HTTP_SERVER; ?></td></tr>
<tr class="row2"><th class="b">DIR_FS_CATALOG</th><td class="b"><?php echo DIR_FS_CATALOG; ?></td></tr>
<tr class="row1"><th class="b">DIR_WS_CATALOG</th><td class="b"><?php echo DIR_WS_CATALOG; ?></td></tr>
<tr class="row2"><th class="b">DIR_WS_IMAGES</th><td class="b"><?php echo DIR_WS_IMAGES; ?></td></tr>
<tr class="row1"><th class="b">IMAGE_PATH</th><td class="b"><?php echo IMAGE_PATH; ?></td></tr>
<tr class="row2"><th class="b">STORE_LOGO</th><td class="b"><?php echo defined('STORE_LOGO') ? STORE_LOGO : '---'; ?></td></tr>
</table>

<?php if (substr(DIR_FS_CATALOG, -1) != '/') { ?>
Warnung: Der Slash fehlt am Ende bei <code>DIR_FS_CATALOG</code> in <code>includes/configure.php</code> von osCommerce.
<?php } ?>

</div>


<?php
  ob_start();
  phpinfo(INFO_GENERAL | INFO_CONFIGURATION | INFO_MODULES | INFO_ENVIRONMENT | INFO_VARIABLES);
  $php_info = ob_get_contents();
  ob_end_clean();

  $p = strpos($php_info, '<body>');
  if ($p !== false) {
    $php_info = substr($php_info, $p + 6);
  }

  $p = strpos($php_info, '</body>');
  if ($p !== false) {
    $php_info = substr($php_info, 0, $p);
  }

  echo $php_info;
?>
