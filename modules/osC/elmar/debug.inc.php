<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: debug.inc.php 64 2005-12-19 18:07:20Z Michael $
*/

#if (@include_once('checkstart.inc.php')) checkstart(basename('index.php'));
?>
<!-- debug_begin -->
<div align="center" style="background-color:#efefef">
<?php if (defined('STORE_NAME') && defined('STORE_OWNER_EMAIL_ADDRESS')) { ?>
  <p>
    Shopname: <em><?php echo STORE_NAME; ?></em>
    &nbsp; &bull; &nbsp;
    E-Mail: <em><?php echo STORE_OWNER_EMAIL_ADDRESS; ?></em>
  </p>
<?php } ?>

<p>
  URL der Shopdatei: <?php echo DIR_WS_SHOPINFO_XML; ?>
  &nbsp; &bull; &nbsp;
  Pfad der Shopdatei: <?php echo DIR_FS_SHOPINFO_XML; ?>
</p>

<?php if ($_SERVER['SERVER_NAME'] != 'localhost') { ?>
  <p>
    <a href="http://validator.w3.org/checklink?uri=<?php echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI']; ?>" target="_blank">Link Checker</a> &nbsp;
    <a href="http://validator.w3.org/check/referer" target="_blank">W3C HTML-Validator</a> &nbsp;
    <a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank">W3C CSS-Validator</a>
  </p>
<?php } ?>

<?php /* ?>
<table border="1" summary="Debug">
<tr bgcolor="#dedede"><th>Variable</th><th>Wert</th></tr>
<?php
$vars = get_defined_vars();
ksort($vars);
foreach($vars as $key => $value) {
  if ($key != 'vars' && $key != 'GLOBALS' && $key != 'HTTP_ENV_VARS' && $key != 'HTTP_SERVER_VARS' && $key != '_ENV') {  //  && $key != '_SERVER'
?>
  <tr><td valign="top"><?= $key ?></td><td>
    <?php
      if (is_object($value) || (is_array($value) && count($value) > 0)) {
    ?>
        <table border="1" summary="Debug">
        <tr bgcolor="#dedede"><th>Variable</th><th>Wert</th></tr>
    <?php
        if (is_array($value)) ksort($value);
        foreach($value as $key2 => $value2) {
          if ($key2 != 'vars' && $key != 'GLOBALS') {
    ?>
          <tr><td valign="top"><?= $key2 ?></td><td><?= htmlspecialchars(var_dump($value2), ENT_QUOTES) ?></td></tr>
    <?php
        } }
    ?>
        </table>
    <?php
      } else {
        echo htmlspecialchars(var_dump($value), ENT_QUOTES);
      }
    ?>
    <?=  ?>
  </td></tr>
<?php } } ?>
</table>

<table border="1" summary="Debug">
<tr bgcolor="#dedede"><th>Konstante</th><th>Wert</th></tr>
<?php
$constants = get_defined_constants();
ksort($constants);
foreach($constants as $key => $value) {
  if ($key != 'vars' && $key != 'GLOBALS' && $key != 'HTTP_ENV_VARS' && $key != 'HTTP_SERVER_VARS' && $key != '_ENV' && $key != '_SERVER') {
?>
  <tr><td valign="top"><?= $key ?></td><td>
    <?php
      if (is_object($value) || (is_array($value) && count($value) > 0)) {
    ?>
        <table border="1" summary="Debug">
        <tr bgcolor="#dedede"><th>Variable</th><th>Wert</th></tr>
    <?php
        if (is_array($value)) ksort($value);
        foreach($value as $key2 => $value2) {
          if ($key2 != 'vars' && $key != 'GLOBALS') {
    ?>
          <tr><td valign="top"><?= $key2 ?></td><td><?= htmlspecialchars(var_dump($value2), ENT_QUOTES) ?></td></tr>
    <?php
        } }
    ?>
        </table>
    <?php
      } else {
        echo htmlspecialchars(var_dump($value), ENT_QUOTES);
      }
    ?>
    <?=  ?>
  </td></tr>
<?php } } ?>
</table>

<?php */ ?>

</div>
<!-- debug_end -->
