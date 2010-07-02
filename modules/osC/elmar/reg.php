<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: reg.php 64 2005-12-19 18:07:20Z Michael $
*/

if (@include_once('checkstart.inc.php')) checkstart(basename($_SERVER['PHP_SELF']));

// Pruefen, ob der Shop schon bei Elm@r registriert ist.
$is_reg = (REGISTERED ? 'yes' : 'no');
$errormsg = '';
if ($is_reg == 'no') {
  if (!ini_get('allow_url_fopen')) {
    $is_reg = 'allow_url_fopen';
  } else {
    $shopName = shopNameOrHost();
    $register_url = ELMAR_SERVICE_URL.'?action=isShopRegistered&name='.urlencode($shopName);
    @ini_set('default_socket_timeout', 10);
    $lines = @file($register_url);
    if (!$lines) {
      $is_reg = 'Error';
      $errormsg .= "\n\n".'Es konnte keine Verbindung mit der Elm@r-Website hergestellt werden, um zu pr&uuml;fen, ob der Shop schon registriert ist. Bitte versuchen Sie es sp&auml;ter nochmals.'."\n\nURL: ".htmlspecialchars($register_url);
    } else {
      $s = chop($lines[0]);
      if (is_numeric($s)) {  // Elm@r liefert die Shop-ID fuer registrierte Shops
        $is_reg = 'yes';
        $shopid = $s;
        reminder_const_check(true);
      } elseif ($s == 'locked') {
        $is_reg = 'locked';
      } elseif ($s != 'no') {
        // Antwort von Elm@r ist eine Fehlermeldung.
        $is_reg = 'Error';
        for ($i=0, $n=sizeof($lines); $i<$n; $i++) {  // entspricht PHP4: foreach ($lines as $line_num => $line)
          $line = $lines[$i];
          $errormsg .= "\n".htmlspecialchars($line);
        }
      }
    }
    if ($is_reg != 'yes') {
      md5_check(DIR_FS_SHOPINFO_XML);
    }
  }
}
?>
<SCRIPT TYPE="text/javascript" SRC="<?php echo ELMAR_PATH; ?>check.js"></SCRIPT>

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
      Sie sollten Ihren Shop erst registrieren, wenn der Shopname korrekt ist.
    </p>
  <?php } ?>
</div>
<?php } ?>

<h1>Registrierung bei Elm@r</h1>
<div class="middleCell">
<?php if ($is_reg == 'yes') { ?>
  <p>
    <font color="green">Ihr Shop ist bereits bei Elm@r registriert.</font>
    <?php if (isset($shopid)) { ?>
       Die Shop-ID ist <a href="<?php echo ELMAR_URL.'nav?dest=info&amp;sid='.$shopid; ?>" target="_blank"><?php echo $shopid; ?></a>.
    <?php } else { ?>
       Hier geht's zur <a href="<?php echo ELMAR_URL.'nav?dest=search.shops'; ?>" target="_blank">Shop-Liste</a>.
    <?php } ?>
  </p>
<?php } else if ($is_reg == 'locked') { ?>
  <p>
    Ihr Shop ist bereits bei Elm@r registriert, aber noch nicht freigeschaltet.
    In der Regel werden neue Shops von den Elm@r-Administratoren innerhalb eines Werktages aktiviert.
  </p>
<?php
} else {
  if ($is_reg == 'allow_url_fopen') {
    echo '<p class="error">Es konnte nicht automatisch gepr&uuml;ft werden, ob Ihr Shop bei Elm@r registriert ist.</p>';
  }
  $shopinfo_exists = file_exists(DIR_FS_SHOPINFO_XML) && filesize(DIR_FS_SHOPINFO_XML) > 0;
  if ($shopinfo_exists) {
?>
  <p>
    Mit dem folgenden Button k&ouml;nnen Sie Ihren Shop <strong>kostenlos</strong>
    bei Elm@r registrieren. (Preisvergleichsdienste wie RockBottom, Idealo und ShopWahl finden Ihren Shop hier &uuml;brigens automatisch!)
    Es wird eine Seite ge&ouml;ffnet, auf der Sie alle
    notwendigen Informationen &uuml;ber Elm@r und die Registrierung finden. Dies ist ein
    einmaliger Vorgang.
  </p>

  <form action="<?php echo ELMAR_REGISTER_URL; ?>" method="GET" target="_blank">
    <input type="hidden" name="action" value="shops.register">
    <input type="hidden" name="url" value="<?php echo DIR_WS_SHOPINFO_XML; ?>">
    <input type="hidden" name="sendConfirmMail" value="on">
    <input type="hidden" name="createAccount" value="on">
    <p>
      <input type="submit" value="Bei Elm@r registrieren" title="Shop bei Elm@r anmelden">
    </p>
  </form>
<?php } else { ?>
  <p>
    <?php if (!file_exists(DIR_FS_SHOPINFO_XML)) { ?>
      Die Shopdatei <code>shopinfo.xml</code> steht nicht dort, wo sie dieses Modul erwartet
    <?php } else { ?>
      Die Shopdatei <code>shopinfo.xml</code> ist leer
      <!-- und schreibgesch&uuml;tzt, sodass dieses Modul sie nicht aktualisieren kann -->
    <?php } ?>
    (<a href="<?php echo DIR_WS_SHOPINFO_XML; ?>" target="_blank"><code><?php $rp = realpath(DIR_FS_SHOPINFO_XML); echo ($rp ? $rp : DIR_FS_SHOPINFO_XML); ?></code></a>).

    Sollten Sie die Shopdatei woanders gespeichert haben, geben Sie bitte die URL an und
    dr&uuml;cken Sie dann den Button, um zur Registrierung bei Elm@r zu gelangen.
    Falls Sie noch keine Shopdatei erstellt haben,
    rufen Sie bitte zuerst den Men&uuml;punkt <a href="<?php echo ELMAR_START; ?>shop.php">Shopdatei</a> auf.
  </p>

  <?php
    $shopdatei_url = HTTP_SERVER.'/'.SHOPINFO_XML;
    if (ini_get('allow_url_fopen')) {
      $fh = @fopen($shopdatei_url, 'r');
      if ($fh) {
        fclose($fh);
      } else {
        $shopdatei_url = HTTP_SERVER.'/ ... /'.SHOPINFO_XML;
      }
    } else {
      $shopdatei_url = HTTP_SERVER.'/ ... /'.SHOPINFO_XML;
    }
  ?>

  <form action="<?php echo ELMAR_REGISTER_URL; ?>" method="GET" target="_blank" onSubmit="return check_regform(this);">
    <input type="hidden" name="action" value="shops.register">
    <input type="hidden" name="sendConfirmMail" value="on">
    <input type="hidden" name="createAccount" value="on">
    <table border="0" summary="Formular">
      <tr><th>URL der Shopdatei:</th><td><input type="text" size="80" name="url" value="<?php echo $shopdatei_url; ?>"></td></tr>
      <tr><td>&nbsp;</td><td><input type="submit" value="Zur Registrierung" title="Shop bei Elm@r registrieren"></td></tr>
    </table>
  </form>
<?php
  }
}
?>
</div>

<?php if ($is_reg == 'Error' && !empty($errormsg)) { ?>
<h1 class="error">Fehlermeldung</h1>
<div class="errorCell">
  <p>
    Die automatische Pr&uuml;fung, ob der Shop bei Elm@r registriert ist, war nicht erfolgreich.
    Sie k&ouml;nnen den Vorgang wiederholen, indem Sie diese Seite neu laden.
    Sollte der Fehler wiederholt auftreten, informieren Sie uns bitte.
    Das Formular f&uuml;hrt Sie zur Feedback-Seite und setzt den angezeigten Text dort ein.
  </p>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="form" method="POST">
    <input type="hidden" name="file" value="feedback.php">
    <p><textarea cols='70' rows='20' name='text'>Fehlermeldung osCommerce-Modul:<?php echo $errormsg; ?></textarea></p>
    <p><input type="SUBMIT" value='Zum Feedback-Formular gehen'></p>
  </form>
</div>
<?php } ?>

<h1>Registrierung bei RockBottom</h1>
<div class="middleCell">
  <p>
    Mit dem folgenden Button k&ouml;nnen Sie Ihren Shop
    beim kommerziellen Preisvergleichsdienst <a href="http://www.rockbottom.de/" target="_blank">RockBottom</a> registrieren.
    Dies ist ein einmaliger Vorgang.
    Bitte beachten Sie, dass Sie mit der Anmeldung den <a href="http://www.rockbottom.de/static/ShopAnmelden.html" target="_blank">Nutzungsbedingungen</a> von RockBottom zustimmen m&uuml;ssen.
  </p>
  <form action="http://www.rockbottom.de/cgi-bin/linksubmission.perl" method="POST" target="_blank" onSubmit="return check_RockBottomForm(this);">
    <table summary="Anmeldung bei RockBottom" cellspacing="1" cellpadding="3" border="0">
    <tr>
      <th>URL Ihrer Shopdatei:</th>
      <td><input type="text" size="80" name="shopurl" value="<?php echo DIR_WS_SHOPINFO_XML; ?>"></td>
    </tr>
    <tr>
      <th>&nbsp;</th>
      <td><input type="checkbox" name="agb" value="yes">&nbsp;Ich habe die <a href="http://www.rockbottom.de/static/ShopAnmelden.html" target="_blank">Nutzungsbedingungen</a> von RockBottom gelesen und stimme zu.</td>
    </tr>
    <tr>
      <th>&nbsp;</th>
      <td><input type="submit" value="Shop bei RockBottom anmelden" title="URL der Shopdatei an RockBottom schicken"></td>
    </tr>
    </table>
  </form>
</div>

<h1>Registrierung bei idealo</h1>
<div class="middleCell">
  <p>
    Mit dem folgenden Button k&ouml;nnen Sie Ihren Shop
    beim kommerziellen Preisvergleichsdienst <a href="http://www.idealo.de/" target="_blank">idealo</a> registrieren.
    Dies ist ein einmaliger Vorgang.
    Hier finden Sie weitere <a href="http://www.idealo.de/kommunikation/shop_anmelden.php3" target="_blank">Informationen</a>.
  </p>
  <form action="http://elmar.idealo.de/shopinfoLink.pl" method="POST" target="_blank" onSubmit="return check_idealoForm(this);">
    <table summary="Anmeldung bei idealo" cellspacing="1" cellpadding="3" border="0">
    <tr>
      <th>URL Ihrer Shopdatei:</th>
      <td><input type="text" size="80" name="link" value="<?php echo DIR_WS_SHOPINFO_XML; ?>"></td>
    </tr>
    <tr>
      <th>&nbsp;</th>
      <td><input type="submit" value="Shop bei idealo anmelden" title="URL der Shopdatei an idealo schicken"></td>
    </tr>
    </table>
  </form>
</div>

<h1>Weitere Preisvergleichsdienste</h1>
<div class="middleCell">
  <p>
    Mithilfe des Elm@r-Moduls kann ein Shop prinzipiell bei allen Preisvergleichsdiensten automatisch angemeldet werden, die den <code>shopinfo.xml</code>-Standard unterst&uuml;tzen und daher zur Registrierung lediglich die URL der <code>shopinfo.xml</code>-Datei ben&ouml;tigen.
    Weitere Preisvergleichsdienste nehmen wir unter der Bedingung, dass Sie den <code>shopinfo.xml</code>-Standard unterst&uuml;tzen, hier gerne auf; <a href="mailto:stefan@kuhlins.de?subject=Preisvergleichsdienst%20Registrierung">E-Mail</a> gen&uuml;gt.
  </p>
</div>
