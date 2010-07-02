<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: login.php 64 2005-12-19 18:07:20Z Michael $
*/

if (@include_once('checkstart.inc.php')) checkstart(basename('index.php'));

$elmar_password_time = isset($_REQUEST['elmar_password_time']) ? $_REQUEST['elmar_password_time'] : 0;

if (isset($_REQUEST['elmar_password_input'])) {
?>
  <h1 class="error">Fehler</h1>
  <div class="errorCell">
  <p>Das eingegebene Passwort stimmt nicht.</p>
  </div>
<?php } ?>

<SCRIPT TYPE="text/javascript" SRC="<?php echo ELMAR_PATH; ?>check.js"></SCRIPT>

<h1>Login</h1>
<div class="middleCell">
<p>
  Bitte mit dem Passwort einloggen, das in der Datei <code>config.inc.php</code> eingetragen ist.
  Weitere Informationen (u.&nbsp;a. wie man den Passwortschutz abschaltet) finden Sie in der <a href="<?php echo ELMAR_PATH; ?>readme.html#elmar_password">Readme</a>.
</p>
<p>
  Es wird versucht, das Passwort in einem Cookie zu speichern. Sie k&ouml;nnen vorgeben, wie lange dieses Cookie g&uuml;ltig sein soll. Gr&ouml;&szlig;ere Zeitr&auml;ume sind bequemer, bergen aber auch ein gr&ouml;&szlig;eres Risiko (insbesondere nicht f&uuml;r Internet-Caf&eacute;s zu empfehlen). Falls Cookies im Browser abgeschaltet sind, muss man sich f&uuml;r jede Seite neu legitimieren.
</p>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="form" method="POST" onSubmit="return check_passwordform(this);">
<?php if (isset($_REQUEST['file'])) { ?>
  <input type="hidden" name="file" value="<?php echo $_REQUEST['file']; ?>">
<?php } ?>
  <table border="0" cellpadding="3" cellspacing="6" summary="Login">
    <tr>
      <th>Passwort:</th>
      <td><input type="password" name="elmar_password_input" size="20" value=""></td>
    </tr>
    <tr>
      <th>Cookie merken f&uuml;r:</th>
      <td>
        <select name="elmar_password_time">
          <option value="0" <?php if ($elmar_password_time==0) echo 'selected'; ?>>die Sitzung</option>
          <option value="3600" <?php if ($elmar_password_time==3600) echo 'selected'; ?>>Stunde</option>
          <option value="86400" <?php if ($elmar_password_time==86400) echo 'selected'; ?>>Tag</option>
          <option value="604800" <?php if ($elmar_password_time==604800) echo 'selected'; ?>>Woche</option>
          <option value="2419200" <?php if ($elmar_password_time==2419200) echo 'selected'; ?>>Monat</option>
          <option value="29030400" <?php if ($elmar_password_time==29030400) echo 'selected'; ?>>Jahr</option>
          <option value="290304000" <?php if ($elmar_password_time==290304000) echo 'selected'; ?>>Zehn Jahre</option>
        </select>
      </td>
    </tr>
    <tr>
      <th>&nbsp;</th>
      <td><input type="SUBMIT" value=" OK "> &nbsp; <input type="Reset"></td>
      </tr>
  </table>
</form>
</div>

