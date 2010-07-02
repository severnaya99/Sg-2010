<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: feedback.php 64 2005-12-19 18:07:20Z Michael $
*/

if (@include_once('checkstart.inc.php')) checkstart(basename($_SERVER['PHP_SELF']));

$rating = isset($_REQUEST['rating']) ? $_REQUEST['rating'] : '';
$text = isset($_REQUEST['text']) ? $_REQUEST['text'] : '';
$shop = isset($_REQUEST['shop']) ? $_REQUEST['shop'] : '';
$url = isset($_REQUEST['url']) ? $_REQUEST['url'] : '';
$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
$mail = isset($_REQUEST['mail']) ? $_REQUEST['mail'] : '';

$to = 'stefan@kuhlins.de';
$subject = 'Feedback Elm@r-Modul osCommerce v'.MODUL_VERSION.'.'.MODUL_SUBVERSION;
if (SEND_EMAILS != 'true' || !class_exists('email'))
  $email = $to;

$isForm = isset($_REQUEST['isForm']);
if ($isForm) {
  $message = 'Version:   '.MODUL_VERSION.'.'.MODUL_SUBVERSION."\r\nShop:      $shop\r\nURL:       $url\r\nName:      $name\r\nE-Mail:    $mail\r\nBewertung: $rating\r\nNachricht: $text\r\n";
  $omail = new email(array('X-Mailer: osCommerce Mailer'));
  $omail->text = $message;
  $omail->build_message();
  if ($omail->send('Stefan Kuhlins', $to, $name, $mail, $subject)) {
    $msg = '<strong style="color:green">Vielen Dank, Ihr Feedback wurde per E-Mail verschickt.</strong>';
  } else {
    $msg = '<strong style="color:red">Oops, Ihr Feedback konnte nicht automatisch per E-Mail verschickt werden.<br>Bitte dr&uuml;cken Sie den Button nochmals, um es per E-Mail-Programm zu schicken.</strong>';
    $email = $to;
  }
} else {
  $shop = STORE_NAME;
  $url = ELMAR_SHOP_ROOT_DIR;
  $name = STORE_OWNER;
  $mail = STORE_OWNER_EMAIL_ADDRESS;
}

if (!empty($msg)) {
?>
  <h1>Status</h1>
  <div class="middleCell">
  <p><?php echo $msg; ?></p>
  </div>
<?php } ?>

<SCRIPT TYPE="text/javascript" SRC="<?php echo ELMAR_PATH; ?>check.js"></SCRIPT>

<h1>Feedback</h1>
<div class="middleCell">
<p>Hier k&ouml;nnen Sie uns Anregungen, Verbesserungsvorschl&auml;ge, Kritik und Lob zum Elm@r-Modul f&uuml;r osCommerce mitteilen. Die Daten schickt uns dieses Skript per E-Mail. Auch wenn Sie die shopspezifischen Felder nicht ausf&uuml;llen, l&auml;sst sich anhand der Mail-Header meist zur&uuml;ckverfolgen, von wo die E-Mail verschickt wurde.</p>
<p>Nutzen Sie bitte auch das <a href="http://projekt.wifo.uni-mannheim.de/forum/viewforum.php?f=7" target="_blank">Diskussionsforum</a>.
</p>
<form action="<?php echo !empty($email) ? "mailto:$email?subject=".$subject : $_SERVER['PHP_SELF']; ?>" name="form" method="POST" onSubmit="return check_feedbackform(this);">
  <input type="hidden" name="file" value="<?php echo THISPAGE; ?>">
  <input type="hidden" name="isForm" value="yes">
  <table border="0" cellpadding="3" cellspacing="6" summary="Feedback">
    <tr valign="bottom">
      <th>Bewertung:</th>
      <td>
        <input type="radio" name="rating" title="sehr gut" value="1" <?php if ($rating==1) echo 'checked="checked"'; ?>><img src="<?php echo ELMAR_PATH; ?>img/rate1.gif" width="20" height="29" alt="++" title="sehr gut" onclick="form.rating[0].checked=true"> &nbsp; &nbsp;
        <input type="radio" name="rating" title="gut" value="2" <?php if ($rating==2) echo 'checked="checked"'; ?>><img src="<?php echo ELMAR_PATH; ?>img/rate2.gif" width="24" height="26" alt="+" title="gut" onclick="form.rating[1].checked=true"> &nbsp; &nbsp;
        <input type="radio" name="rating" title="befriedigend" value="3" <?php if ($rating==3) echo 'checked="checked"'; ?>><img src="<?php echo ELMAR_PATH; ?>img/rate3.gif" width="28" height="21" alt="=" title="befriedigend" onclick="form.rating[2].checked=true"> &nbsp; &nbsp;
        <input type="radio" name="rating" title="ausreichend" value="4" <?php if ($rating==4) echo 'checked="checked"'; ?>><img src="<?php echo ELMAR_PATH; ?>img/rate4.gif" width="25" height="24" alt="-" title="ausreichend" onclick="form.rating[3].checked=true"> &nbsp; &nbsp;
        <input type="radio" name="rating" title="mangelhaft" value="5" <?php if ($rating==5) echo 'checked="checked"'; ?>><img src="<?php echo ELMAR_PATH; ?>img/rate5.gif" width="21" height="28" alt="--" title="mangelhaft" onclick="form.rating[4].checked=true">
      </td>
    </tr>
    <tr valign="top"><th>Nachricht:</th><td><textarea cols="70" rows="20" name="text"><?php echo $text; ?></textarea></td></tr>
    <tr valign="top"><th>Shop:</th><td><input type="text" name="shop" size="50" value="<?php echo $shop; ?>"></td></tr>
    <tr valign="top"><th>Url:</th><td><input type="text" name="url" size="50" value="<?php echo $url; ?>"></td></tr>
    <tr valign="top"><th>Name:</th><td><input type="text" name="name" size="50" value="<?php echo $name; ?>"></td></tr>
    <tr valign="top"><th>E-Mail:</th><td><input type="text" name="mail" size="50" value="<?php echo $mail; ?>"></td></tr>
<?php if (!$isForm || !empty($email)) { ?>
    <tr valign="top"><th>&nbsp;</th><td><input type="SUBMIT" value="<?php echo !empty($email) ? 'Per E-Mail-Programm senden' : 'Abschicken'; ?>"> &nbsp; <input type="Reset"></td></tr>
<?php } ?>
  </table>
</form>
</div>

