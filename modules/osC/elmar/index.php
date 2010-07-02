<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: index.php 64 2005-12-19 18:07:20Z Michael $
*/

if (@include_once('checkstart.inc.php')) checkstart(basename($_SERVER['PHP_SELF']));
?>

<?php if (FALSE) { ?>
  <strong style="color:red">ACHTUNG: Die PHP-Dateien m&uuml;ssen auf einem Webserver abgelegt werden, der PHP unterst&uuml;tzt, sonst sehen Sie nur den PHP-Programmcode und k&ouml;nnen nichts damit anfangen.</strong>
<?php } ?>

<h1>&Uuml;bersicht</h1>
<div class="middleCell">
  <p>
    Dies ist die Startseite des Elm@r-Moduls f&uuml;r osCommerce. Mithilfe dieses Moduls k&ouml;nnen Shop- und Produktdaten f&uuml;r verschiedene Internetdienstleister wie Shopverzeichnisse, Produktsuchmaschinen, Preisvergleichsdienste usw. auf einfache Weise gem&auml;&szlig; dem <code>shopinfo.xml</code>-Standard bereitgestellt werden. Weitere Informationen finden Sie zum <a href="http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce" target="_blank">Modul</a> und zum Standard unter <a href="http://elektronischer-markt.de/" target="_blank">http://elektronischer-markt.de/</a>. Nutzen Sie bitte auch das <a href="http://projekt.wifo.uni-mannheim.de/forum/viewforum.php?f=7" target="_blank">Diskussionsforum</a>.
  </p>
  <p>
    Bitte beachten Sie die Hinweise in der <a href="<?php echo ELMAR_PATH; ?>readme.html">Readme</a> und die <a href="<?php echo ELMAR_PATH; ?>history.html">Neuerungen</a> gegen&uuml;ber vorhergehenden Versionen des Elm@r-Moduls.
  </p>
</div>

<?php if (!defined('ELMAR_MODULE_ONE_TIME_INSTALL') || (int)ELMAR_MODULE_ONE_TIME_INSTALL < 100*MODUL_VERSION+MODUL_SUBVERSION) { ?>
<div style="background-color:#efefef;padding-bottom:1ex">
<h1>Einmalige Installation</h1>
<div class="middleCell">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
  <input type="hidden" name="file" value="install.php">
  <p>
    Beim ersten Start direkt nach der Installation oder einem Update sollten Sie den folgenden Button bet&auml;tigen, damit sich das Modul an Ihre Systemumgebung anpasst.
  </p>
  <p align="center">
    <input type="submit" value="Installation" title="Dr&uuml;cken Sie diesen Button nach der Installation bzw. einem Update" style="background-color:#FFB7B7;font-size:14px;font-weight:bold;padding:1px;border:1px black solid;">
  </p>
</form>
</div>
</div>
<?php } ?>

<h1>Erste Schritte</h1>
<div class="middleCell">
<ol>
<li><p>Nach der Installation sind zun&auml;chst die Shopdaten in der <a href="<?php echo ELMAR_START; ?>shop.php">Shopdatei</a> zu vervollst&auml;ndigen.

<li><p>Anschlie&szlig;end kann der Shop mithilfe der Shopdatei bei Elm@r kostenlos <a href="<?php echo ELMAR_START; ?>reg.php">registriert</a> werden.
<?php if (REGISTERED) { ?>
    <strong style="color:green">Ihr Shop ist anscheinend bereits bei Elm@r registriert.</strong>
<?php } ?>

<?php if ($can_write) { ?>
  <li><p>Dann sollte das Modul den eigenen W&uuml;nschen entsprechend <a href="<?php echo ELMAR_START; ?>setup.php">eingestellt</a> werden.
<?php } ?>

<li><p>Des Weiteren k&ouml;nnen
<?php if ($can_write) { ?>
  <a href="<?php echo ELMAR_START; ?>logs.php">Protokolldateien</a> angezeigt,
  ein <a href="<?php echo ELMAR_START; ?>backup.php">Backup</a> angefertigt und
<?php } ?>
  der Zugriff auf die <a href="<?php echo ELMAR_START; ?>test1.php">Standardproduktdatei</a> sowie die <a href="<?php echo ELMAR_START; ?>test2.php">Echtzeitschnittstelle</a> getestet werden. Au&szlig;erdem freuen wir uns &uuml;ber ein kurzes <a href="<?php echo ELMAR_START; ?>feedback.php">Feedback</a>. Von Zeit zu Zeit sollten Sie pr&uuml;fen, ob ein <a href="<?php echo ELMAR_START; ?>update.php">Update</a> verf&uuml;gbar ist.

<li><p>F&uuml;r Kelkoo, Pangora usw. lassen sich <a href="<?php echo ELMAR_START; ?>prodfiles.php">Produktdateien</a> erzeugen.

</ol>
</div>

<?php if (!$can_write) { ?>
<h1>Schreibrechte</h1>
<div class="middleCell">
  <p>
    Das Modul l&auml;uft im &quot;Read/Only-Modus&quot;.
    Wenn Sie f&uuml;r die in der <a href="<?php echo ELMAR_PATH; ?>readme.html#Schreibrechte">readme.html</a> genannten Dateien Schreibrechte erteilen, kann das Modul noch mehr.
  </p>
</div>
<?php } ?>

<h1>F&ouml;rdern Sie Weiterentwicklung und Support des Elm@r-Moduls</h1>
<div class="middleCell">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
  <input type="hidden" name="cmd" value="_xclick">
  <input type="hidden" name="business" value="stefan@kuhlins.de">
  <input type="hidden" name="item_name" value="Support Elm@r-Modul f&uuml;r osCommerce">
  <input type="hidden" name="no_shipping" value="1">
  <input type="hidden" name="cn" value="Nachricht">
  <input type="hidden" name="currency_code" value="EUR">
  <input type="hidden" name="lc" value="DE">
  <p>
    <input style="margin-top:3px;margin-bottom:3px;margin-left:10px;margin-right:10px;width:80px;height:31px" align="left" type="image" src="<?php echo ELMAR_PATH; ?>img/paypal.gif" name="submit" alt="Spenden" title="F&ouml;rdern Sie die Weiterentwicklung des Elm@r-Moduls!">

    Sie k&ouml;nnen das Elm@r-Modul kostenlos nutzen. Ich w&uuml;rde mich aber freuen, wenn Sie die Arbeit daran finanziell unterst&uuml;tzen w&uuml;rden. Mit dem folgenden Button gelangen Sie zu einer Seite von <a href="https://www.paypal.com/de/refer/pal=stefan%40kuhlins.de" target="_blank">PayPal</a>, wo Sie mir auf elektronischem Wege schnell, einfach und sicher Geld &uuml;berweisen k&ouml;nnen. <EM>PayPal</EM> ist ein &quot;Institut f&uuml;r elektronisches Geld&quot; und geh&ouml;rt zu <em>eBay</em>. Falls Sie lieber auf einem anderen Weg bezahlen m&ouml;chten, nehmen Sie bitte Kontakt mit <a href="mailto:stefan@kuhlins.de?subject=Spende">mir</a> auf. <STRONG>Damit Sie das Geld steuerlich als Betriebsausgabe verbuchen k&ouml;nnen, leiste ich gerne Support im Zusammenhang mit dem Elm@r-Modul und stelle Ihnen eine Rechnung inkl. MwSt. aus.</STRONG>
  </p>
  <p>
    <a href="https://www.paypal.com/de/refer/pal=stefan%40kuhlins.de" target="_blank"><img src="<?php echo ELMAR_PATH; ?>img/paypal2.gif" align="left" hspace="10" width="88" height="33" border="0" alt="PayPal" title="Anmelden bei PayPal - schnell, einfach und kostenlos!"></a>

    M&ouml;chten auch Sie im Rahmen Ihres Online-Shops oder bei <EM>eBay</EM>-Auktionen Zahlungen &uuml;ber <a href="https://www.paypal.com/de/refer/pal=stefan%40kuhlins.de" target="_blank">PayPal</a> in Empfang nehmen? Wenn ja, melden Sie sich mit dem folgenden Button an - schnell, einfach und <STRONG>kostenlos</STRONG>!
  </p>
  <p>
    Interessieren Sie sich f&uuml;r von mir verfasste B&uuml;cher? Hier finden Sie <A HREF="http://www.amazon.de/exec/obidos/redirect?tag=stefankuhlins-21&amp;path=search-handle-url/index%3Dbooks-de%26field-author%3DKuhlins%252C%2520Stefan" target="_blank">meine B&uuml;cher bei Amazon</a>.
  </p>
</form>
</div>
