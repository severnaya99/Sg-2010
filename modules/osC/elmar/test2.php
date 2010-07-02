<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: test2.php 64 2005-12-19 18:07:20Z Michael $
*/

if (@include_once('checkstart.inc.php')) checkstart(basename($_SERVER['PHP_SELF']));
?>

<h1>Echtzeitabfrageschnittstelle testen</h1>
<div class="middleCell">

  <p>Um zu testen, ob die Produktdaten per <strong>Echtzeitabfrageschnittstelle</strong> abrufbar sind, k&ouml;nnen Sie das folgende Testformular benutzen. Die Antwort ist ein XML-Dokument, welches der Browser u.&nbsp;U. nicht korrekt anzeigt. Weitere Informationen zu Echtzeitabfragen finden Sie <a href="<?php echo ELMAR_URL; ?>nav?dest=impl.productdata.livequery.index" target="_blank">hier</a>.</p>

<FORM ACTION="elmar_request.php" target="_blank" METHOD="POST">
<INPUT TYPE="hidden" NAME="p_ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">

<TABLE align="center" cellpadding="5" cellspacing="0" border="0" summary="Suchformular">

<TR class="row1"><td>1.</td><TD ALIGN="right">Schnellsuche:</TD>
  <TD><INPUT TYPE="text" NAME="p_qs" value="" size="30"></TD></TR>

<TR class="row2"><td>2.</td><TD ALIGN="right">Artikelnummer:</TD>
  <TD><INPUT TYPE="text" NAME="p_id" value="" size="30"></TD></TR>

<?php if (defined('ELMAR_PRODUCTS_EAN_FIELD')) { ?>
<TR class="row2"><td>&nbsp;</td><TD ALIGN="right">EAN:</TD>
  <TD><INPUT TYPE="text" NAME="p_ean" value="" size="30"></TD></TR>
<?php } ?>

<?php if (defined('ELMAR_PRODUCTS_ISBN_FIELD')) { ?>
<TR class="row2"><td>&nbsp;</td><TD ALIGN="right">ISBN:</TD>
  <TD><INPUT TYPE="text" NAME="p_isbn" value="" size="30"></TD></TR>
<?php } ?>

<TR class="row1"><td>3.</td><TD ALIGN="right">Herstellername:</TD>
  <TD><INPUT TYPE="text" NAME="p_brand" value="" size="30"></TD></TR>

<TR class="row1"><td>&nbsp;</td><TD ALIGN="right">Produktbezeichnung:</TD>
  <TD><INPUT TYPE="text" NAME="p_product" value="" size="30"></TD></TR>

<TR class="row1"><td>&nbsp;</td><TD ALIGN="right">Produktbeschreibung:</TD>
  <TD><INPUT TYPE="text" NAME="p_desc" value="" size="30"></TD></TR>

<TR class="row1"><td>&nbsp;</td><TD ALIGN="right">Untere Preisgrenze:</TD>
  <TD><INPUT TYPE="text" NAME="p_low" value="" size="10"></TD></TR>

<TR class="row1"><td>&nbsp;</td><TD ALIGN="right">Obere Preisgrenze:</TD>
  <TD><INPUT TYPE="text" NAME="p_high" value="" size="10"></TD></TR>

<TR class="row2"><td>4.</td><TD ALIGN="right">Maximale Antworten:</TD>
  <TD><INPUT TYPE="text" NAME="p_size" value="" size="10"></TD></TR>

<?php
  // Auswahl der Sprache nur, wenn auch mehrere zur Auswahl stehen.
  $language_codes = get_language_codes();
  $language_codes_size = sizeof($language_codes);
  if ($language_codes_size > 1) {
?>
  <TR class="row1"><td>&nbsp;</td><TD ALIGN="right">Sprache:</TD>
    <TD>
      <select size="1" name="language">
      <?php
        for ($i=0; $i<$language_codes_size; ++$i) {  // entspricht PHP4: foreach($language_codes as $code)
          echo '<option value="'.$language_codes[$i].'"'.($language_codes[$i]==$language_code ? ' selected' : '').'>'.$language_codes[$i].'</option>';
        }
      ?>
      </select>
    </TD>
  </TR>
<?php } else { ?>
  <input type="hidden" name="language" value="<?php echo $language_codes[0]; ?>">
<?php } ?>

<?php
  // Auswahl der Waehrung nur, wenn auch mehrere zur Auswahl stehen.
  $currency_codes = get_currency_codes();
  $currency_codes_size = sizeof($currency_codes);
  if ($currency_codes_size > 1) {
?>
  <TR class="row1"><td>&nbsp;</td><TD ALIGN="right">W&auml;hrung:</TD>
    <TD>
      <select size="1" name="currency">
      <?php
        for ($i=0; $i<$currency_codes_size; ++$i) {  // entspricht PHP4: foreach($currency_codes as $code)
          echo '<option value="'.$currency_codes[$i].'"'.($currency_codes[$i]==$currency ? ' selected' : '').'>'.$currency_codes[$i].'</option>';
        }
      ?>
      </select>
    </TD>
  </TR>
<?php } else { ?>
  <input type="hidden" name="currency" value="<?php echo $currency_codes[0]; ?>">
<?php } ?>

<TR class="row1"><td>&nbsp;</td><TD ALIGN="right">Testanfrage (TRACE):</TD>
  <TD><INPUT TYPE="checkbox" NAME="trace" value="on"></TD></TR>

<TR>
  <TD colspan="3" align="center"><INPUT TYPE="submit" value=" Suchen ">
  <INPUT TYPE="reset"></TD></TR>

</TABLE>
</FORM>

<ul>
<li><p>Eine <a href="<?php echo ELMAR_URL; ?>nav?dest=impl.productdata.livequery.query#DokuParameter" target="_blank">detaillierte Beschreibung</a> der Eingabefelder befindet sich auf der Elm@r-Website.
<li><p>Gesucht wird entweder mittels Schnellsuche (1.), Nummern (2.) oder mit mehreren Eingabefeldern (3.).
<li><p>Durch Leertaste getrennte W&ouml;rter in den Feldern <EM>Schnellsuche</EM>, <EM>Herstellername</EM>, <EM>Produktbezeichnung</EM> und <EM>Produktbeschreibung</EM> werden bei der Suche mit UND verkn&uuml;pft,
d.&nbsp;h., alle Bestandteile m&uuml;ssen enthalten sein. Gro&szlig;-/Kleinschreibung spielt keine Rolle.
<li><p>Die Sucheinstellungen unter (4.) sind sowohl mit (1.) als auch (2.) und (3.) kombinierbar.
</ul>

</div>
