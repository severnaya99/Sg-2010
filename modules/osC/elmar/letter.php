<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: letter.php 64 2005-12-19 18:07:20Z Michael $
*/

if (@include_once('checkstart.inc.php')) checkstart(basename($_SERVER['PHP_SELF']));

if (!isset($to)) $to='';
if (!isset($subject)) $subject = 'Unterstuetzen Sie den shopinfo.xml-Standard';
if (!isset($name)) $name = STORE_OWNER;
if (!isset($mail)) $mail = STORE_OWNER_EMAIL_ADDRESS;
if (!isset($text)) {
  $text = "Sehr geehrte Damen und Herren,\n\nwir bereiten unsere Shop- und Produktdaten gemaess dem shopinfo.xml-Standard auf. Unsere Shopdatei ist unter\n\n  ".DIR_WS_SHOPINFO_XML."\n\nabrufbar. Den Aufbau sowie die URL unserer Produktdatei\n(".ELMAR_SHOP_ROOT_DIR."elmar_products.php) koennen Sie der Shopdatei entnehmen. Informationen zum Standard finden Sie unter: http://projekt.wifo.uni-mannheim.de/elmar/nav/standard\n\nWir wuerden uns sehr freuen, wenn Sie unseren Shop mithilfe der shopinfo.xml-Datei aufnehmen koennten. Notfalls erstellen wir aber auch eine spezielle Produktdatei fuer Sie. Bitte teilen Sie uns mit, welches Format Sie benoetigen.\n\nMit freundlichen Gruessen,\n$name\n".STORE_NAME."\n".ELMAR_SHOP_ROOT_DIR."\n$mail\n";
}

if (SEND_EMAILS != 'true')
  $email = $to;

$isForm = isset($_REQUEST['isForm']);
if ($isForm) {
  $message = $text;
  $omail = new email(array('X-Mailer: osCommerce Mailer'));
  $omail->text = $message;
  $omail->build_message();
  if ($omail->send('', $to, $name, $mail, $subject)) {
    $msg = '<strong style="color:green">Vielen Dank, die E-Mail wurde an '.$to.' verschickt.</strong>';
    if (isset($bcc))
      $omail->send('Elm@r', 'stefan@kuhlins.de', $name, $mail, $subject.': '.$to);
  } else {
    $msg = '<strong style="color:red">Oops, die E-Mail konnte nicht verschickt werden.<br>Bitte dr&uuml;cken Sie den Button nochmals, um es per E-Mail-Programm zu schicken.</strong>';
    $email = $to;
  }
}

if (!empty($msg)) {
?>
  <h1>Status</h1>
  <div class="middleCell">
  <p><?php echo $msg; ?></p>
  </div>
<?php } ?>

<SCRIPT TYPE="text/javascript" SRC="<?php echo ELMAR_PATH; ?>check.js"></SCRIPT>

<h1>Musterbrief</h1>
<div class="middleCell">
<p>Bitte passen Sie den folgenden Musterbrief an und schicken Sie ihn an Preisvergleichsdienste, f&uuml;r die Sie Produktdateien in speziellen Formaten aufbereiten m&uuml;ssen. Wenn alle den <CODE>shopinfo.xml</CODE>-Standard unterst&uuml;tzen, sparen Sie Zeit und Geld, weil Sie sich nicht mehr mit verschiedenen Produktdateien herumplagen m&uuml;ssen. Verbesserungsvorschl&auml;ge zum <CODE>shopinfo.xml</CODE>-Standard sind willkommen: als <a href="mailto:stefan@kuhlins.de?subject=Standard">E-Mail</a> oder im <a href="http://projekt.wifo.uni-mannheim.de/forum/viewforum.php?f=7" target="_blank">Diskussionsforum</a>.
</p>
<form action="<?php echo !empty($email) ? "mailto:$email?subject=$subject" : $_SERVER['PHP_SELF']; ?>" name="form" method="GET" onSubmit="return check_letterform(this);">
  <input type="hidden" name="file" value="<?php echo THISPAGE; ?>">
  <input type="hidden" name="isForm" value="yes">
  <table border="0" cellpadding="3" cellspacing="6" summary="Brief">
    <tr>
      <th align="right">Dienst:</th>
      <td>
        <input type="radio" name="pvd" onclick="document.form.to.value='post@HardwareSchotte.de'">Hardwareschotte &nbsp;
        <input type="radio" name="pvd" onclick="document.form.to.value='info@kelkoo.de'">Kelkoo &nbsp;
        <input type="radio" name="pvd" onclick="document.form.to.value='information@pangora.com'">Pangora &nbsp;
        <input type="radio" name="pvd" onclick="document.form.to.value='Kundensupport@shopping.com'">Shopping.com
      </td>
    </tr>
    <tr><th align="right" valign="top">An:</th><td><input type="text" name="to" size="50" value="<?php echo $to; ?>" onchange="no_radios(form)"><br><span class="tiny">Die E-Mail-Adresse des Preisvergleichsdienstes.</span></td></tr>
    <tr><th align="right">Betreff:</th><td><input type="text" name="subject" size="50" value="<?php echo $subject; ?>"></td></tr>
    <tr valign="top"><th align="right">Nachricht:</th><td><textarea cols="70" rows="22" name="text"><?php echo $text; ?></textarea></td></tr>
    <tr><th align="right" valign="top">Absender:</th><td><input type="text" name="name" size="50" value="<?php echo $name; ?>"><br><span class="tiny">Der Name des Absenders.</span></td></tr>
    <tr><th align="right" valign="top">E-Mail:</th><td><input type="text" name="mail" size="50" value="<?php echo $mail; ?>"><br><span class="tiny">Die E-Mail-Adresse des Absenders.</span></td></tr>
    <tr><th align="right">CC:</th><td><input type="checkbox" name="bcc" <?php if (isset($bcc)) echo 'checked'; ?>> Zur Info eine Kopie auch an Elm@r schicken.</td></tr>
    <tr valign="top"><th>&nbsp;</th><td><input type="SUBMIT" value="<?php echo !empty($email) ? 'Per E-Mail-Programm senden' : 'Abschicken'; ?>"> &nbsp; <input type="Reset"></td></tr>
  </table>
</form>
</div>

