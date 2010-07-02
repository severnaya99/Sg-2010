<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: test1.php 64 2005-12-19 18:07:20Z Michael $
*/

if (@include_once('checkstart.inc.php')) checkstart(basename($_SERVER['PHP_SELF']));

if (file_exists(PRODUCTFILE) && filesize(PRODUCTFILE) > 0) {
  $pdtext = '<a href="'.PRODUCTFILE.'" title="Download der Produktdatei">Produktdatei</a>';
} else {
  $pdtext = 'Produktdatei';
}
?>

<h1>Produktdatei testen</h1>
<div class="middleCell">

<p>Ihre <?php echo $pdtext; ?> k&ouml;nnen Sie hier downloaden und sich ansehen. Die Datei liegt im so genannten &quot;CSV-Format&quot; (<EM>comma separated values</EM>) vor und wird vom Browser u.&nbsp;U. nicht korrekt angezeigt. Weitere Informationen zu Produktdateien finden Sie <a href="<?php echo ELMAR_URL; ?>nav?dest=impl.productdata.productfile.index" target="_blank">hier</a>.</p>

<p class="comment">Die Darstellung der Produktdaten in <b>Microsoft Excel</b> ist leider nicht immer so, wie man das erwartet. Das Ergebnis sieht in Excel freundlicher aus, wenn man die erzeugte Datei zun&auml;chst auf der Platte speichert und dann in Excel mit <b>Daten -&gt; Externe Daten importieren -&gt; Daten importieren</b> die Datei einliest und dabei Angaben zum Format macht, z.&nbsp;B. <b>Trennzeichen: Tabulator</b> sowie <b>Texterkennungszeichen '</b>. Eventuell hilft auch hier im Formular die Einstellung Trennzeichen&nbsp;; und Zeichenkettenbegrenzer&nbsp;&quot; sowie Maskierungszeichen&nbsp;&quot;.
</p>

<FORM ACTION="elmar_products.php" METHOD="GET">
<TABLE align="center" cellpadding="3" cellspacing="1" summary="Produktdateiformular">
<TR class="row1">
  <TD ALIGN="right">Trennzeichen (<EM>delimiter</EM>):</TD>
  <TD><INPUT TYPE="text" NAME="delimiter" value="<?php echo DEFAULT_DELIMITER=="\t" ? '9' : DEFAULT_DELIMITER; ?>" size="3"> 9 = Tabulator</TD>
</TR>
<TR class="row1">
  <TD ALIGN="right">Zeichenkettenbegrenzer bzw. Texterkennungszeichen (<EM>quote</EM>):</TD>
  <TD><INPUT TYPE="text" NAME="quote" value="<?php if (defined('DEFAULT_QUOTE')) echo DEFAULT_QUOTE; ?>" size="3"></TD>
</TR>
<TR class="row1">
  <TD ALIGN="right">Maskierungszeichen (<EM>escape</EM>):</TD>
  <TD><INPUT TYPE="text" NAME="escape" value="<?php if (defined('DEFAULT_ESCAPE')) echo ord(DEFAULT_ESCAPE); ?>" size="3"> 92 = Backslash \</TD>
</TR>
<TR class="row1">
  <TD ALIGN="right">Zeilenendezeichen (<EM>lineend</EM>):</TD>
  <TD>
    <INPUT TYPE="radio" NAME="lineend" value="LF" <?php if (DEFAULT_LINEEND=="\n") echo 'checked'; ?>>LF &nbsp;
    <INPUT TYPE="radio" NAME="lineend" value="CR" <?php if (DEFAULT_LINEEND=="\r") echo 'checked'; ?>>CR &nbsp;
    <INPUT TYPE="radio" NAME="lineend" value="CRLF" <?php if (DEFAULT_LINEEND=="\r\n") echo 'checked'; ?>>CRLF
  </TD>
</TR>

<?php
  // Auswahl der Sprache nur, wenn auch mehrere zur Auswahl stehen.
  $language_codes = get_language_codes();
  $language_codes_size = sizeof($language_codes);
  if ($language_codes_size > 1) {
?>
  <TR class="row2"><TD ALIGN="right">Sprache (<EM>language</EM>):</TD>
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
  <TR class="row2"><TD ALIGN="right">W&auml;hrung (<EM>currency</EM>):</TD>
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

<?php if (WRITE_PRODUCTFILE) { ?>
<TR class="row1">
  <TD ALIGN="right">Nur f&uuml;r die Standardwerte: neu erzeugen (force):</TD>
  <TD><INPUT TYPE="checkbox" NAME="force" value="yes"></TD>
</TR>
<?php } ?>
<TR class="row1">
  <TD colspan="2" align="center">
    <INPUT TYPE="submit" value=" Produktdatei laden "> &nbsp; <INPUT TYPE="reset" value=" Standardwerte ">
  </TD>
</TR>
</TABLE>
</FORM>
</div>

<h1>Parameter</h1>
<div class="middleCell">

<p>Das Layout der Produktdatei kann mithilfe der folgenden Parameter gesteuert werden.</p>

<table class="b" border="0" cellspacing="0" cellpadding="3" summary="Parameter">
<tr class="row1"><th class="b"><code>delimiter</code></th><td class="b">Trennzeichen, das die einzelnen Spalten voneinander trennt.</td></tr>
<tr class="row2"><th class="b"><code>quote</code></th><td class="b">Zeichenkettenbegrenzungszeichen, dass am Anfang und Ende der einzelner Spalten steht, um diese zu begrenzen.</td></tr>
<tr class="row1"><th class="b"><code>escape</code></th><td class="b">Maskierungszeichen, das im Text auftretenden Trennzeichen bzw. Zeichenkettenbegrenzungszeichen vorangestellt wird.</td></tr>
<tr class="row2"><th class="b"><code>lineend</code></th><td class="b">Zeichen, welches das Zeilenende darstellt: <CODE>CRLF</CODE> (DOS), <CODE>LF</CODE> (Unix), <CODE>CR</CODE> (Mac)</td></tr>

<?php $r = 2; if ($language_codes_size > 1) { ?>
  <tr class="row<?php echo $r=3-$r; ?>"><th class="b"><code>language</code></th><td class="b">K&uuml;rzel f&uuml;r die Sprache, in der Produktbeschreibungen usw. verfasst sein sollen. Die Auswahlliste enth&auml;lt die in der osCommerce-Datenbank vermerkten Sprachen. Ohne Festlegung der Sprache wird <STRONG><?php echo PROD_DEFAULT_LANGUAGE ?></STRONG> benutzt. Die Sprache kann auch per Browser-Einstellung gesteuert werden (und zwar mit dem HTTP-Header <CODE>Accept-Language</CODE>).</td></tr>
<?php } ?>

<?php if ($currency_codes_size > 1) { ?>
  <tr class="row<?php echo $r=3-$r; ?>"><th class="b"><code>currency</code></th><td class="b">K&uuml;rzel f&uuml;r die W&auml;hrung, in der Produktpreise, Versandkosten usw. angegeben werden. Die Auswahlliste enth&auml;lt die in der osCommerce-Datenbank vermerkten W&auml;hrungen. Gegebenenfalls werden Betr&auml;ge umgerechnet. Ohne Festlegung der W&auml;hrung wird <STRONG><?php echo PROD_DEFAULT_CURRENCY ?></STRONG> benutzt.</td></tr>
<?php } ?>

<?php if (WRITE_PRODUCTFILE) { ?>
  <tr class="row<?php echo $r=3-$r; ?>"><th class="b"><code>force</code></th><td class="b"><code>force=yes</code> erzwingt das Erstellen einer aktuellen Produktdatei im Standardformat. Sonst wird je nach Einstellung eine fr&uuml;her gespeicherte Version geliefert. Der Parameter <code>force</code> ist nur als einziger Parameter sinnvoll einsetzbar.</td></tr>
<?php } ?>

<tr class="row<?php echo $r=3-$r; ?>"><th class="b"><code>type</code></th><td class="b">Der Typ bestimmt das Format der Produktdatei. Neben dem Standardformat bei fehlender Typangabe stehen zur Auswahl: <code>amazon</code>, <code>froogle</code>, <code>hardwareschotte</code>, <code>kelkoo</code>, <code>pangora</code>, <code>shopping</code> und <code>webde</code> (siehe <a href="<?php echo ELMAR_START; ?>prodfiles.php">Produktdateien</a>).
<br>Der Parameter <code>type</code> kann zusammen mit <code>language</code> und <code>currency</code> angegeben werden. Die anderen Parameter (<code>delimiter</code>, <code>quote</code>, <code>escape</code>, <code>lineend</code> und <code>force</code>) haben keinen Effekt im Zusammenhang mit <code>type</code>.</td></tr>
</table>

<?php if (WRITE_PRODUCTFILE) { ?>
  <p class="comment"><STRONG>Achtung:</STRONG> Damit das Layout der Produktdatei zur Beschreibung in der Shopdatei <code>shopinfo.xml</code> passt, wird nur beim Aufruf der URL <a href="<?php echo ELMAR_SHOP_ROOT_DIR.'elmar_products.php'; ?>"><code><?php echo ELMAR_SHOP_ROOT_DIR.'elmar_products.php'; ?></code></a> - ohne Angabe von Parametern, also mit den Standardeinstellungen - automatisch eine neue Produktdatei <code class="data"><?php echo DIR_FS_CATALOG.PRODUCTFILE; ?></code> gespeichert.</p>
<?php } ?>
</div>
