<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: backup.php 64 2005-12-19 18:07:20Z Michael $
*/

if (@include_once('checkstart.inc.php')) checkstart(basename($_SERVER['PHP_SELF']));

require(ELMAR_PATH.'backup.inc.php');

md5_check(DIR_FS_SHOPINFO_XML);

$doZip = function_exists('gzcompress');

?>
<SCRIPT TYPE="text/javascript" SRC="<?php echo ELMAR_PATH; ?>check.js"></SCRIPT>

<h1>Backup</h1>
<div class="middleCell">
  <p>
<?php if ($doZip) { ?>
    Bitte w&auml;hlen Sie aus, welche Dateien gesichert werden sollen.
    Dateien, die gr&ouml;&szlig;er als <?php echo MAX_FILE_SIZE_TEXT; ?> sind, werden auf diese Weise nicht gesichert.
<?php } else { ?>
    Die folgenden Dateien sollten regelm&auml;&szlig;ig gesichert werden.
<?php } ?>
    Die Dateinamen beziehen sich auf das Verzeichnis
    <code><?php echo BASEDIR; ?></code>.
  </p>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="form" method="POST" onSubmit="return check_backupform(this);">
    <input type="hidden" name="file" value="backupfile.php">
    <table border="0" cellpadding="3" cellspacing="6" summary="Zu sichernde Dateien">
<?php
for ($i=0, $n=sizeof($files); $i<$n; $i++) {  // entspricht PHP4: foreach($files as $file)
    $file = $files[$i];
    if ($file->exists() && $file->size() > 0) {
?>
      <tr valign=top>
        <td>
          <?php if ($file->check()) { ?>
          <input type="checkbox" name="<?php echo $file->varname(); ?>" value="yes" <?php if ($file->checked()) echo 'checked="checked"'; ?>>
          <?php } else { echo '&nbsp;'; } ?>
        </td>
        <td><STRONG><?php echo $file->text(); ?></STRONG></td>
        <td><code><?php echo $file->path().$file->name(); ?></code></td>
        <td><?php echo $file->time(); ?></td>
        <td align="right"><?php echo number_format($file->size(), 0, ',', '.'); ?>&nbsp;Bytes</td>
<?php if ($doZip) { ?>
        <td><?php echo !$file->check() ? '<span style="color:red">Zu gro&szlig;!</span>' : '&nbsp;'; ?></td>
<?php } ?>
      </tr>
<?php
    }
}
?>
    </table>
<?php if ($doZip) { ?>
    <p>Dr&uuml;cken Sie bitte den Backup-Button, um ein Backup Ihrer Dateien f&uuml;r das Elm@r-Modul in Form einer ZIP-Datei zum Download zu erzeugen.</p>
    <p>
      <script type="text/javascript">
      <!--
        document.writeln('<input type="button" value="Alle" title="Alles ausw&auml;hlen" onclick="all_checkboxes(form);"> &nbsp;');
        document.writeln('<input type="button" value="Keine" title="Nichts ausw&auml;hlen" onclick="no_checkboxes(form);"> &nbsp;');
      //-->
      </script>
      <input type=submit name="BackupButton" value="Backup" title="Komprimierte Backupdatei erzeugen">
    </p>
<?php } ?>
  </form>
  <?php if (isset($status) && $status == 'error') { ?>
    <p><font color="#FF0000">Bitte w&auml;hlen Sie mindestens eine Datei aus, die gesichert werden soll.</font></p>
  <?php } ?>
</div>
