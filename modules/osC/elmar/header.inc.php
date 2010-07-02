<?php
/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: header.inc.php 64 2005-12-19 18:07:20Z Michael $
*/

#if (@include_once('checkstart.inc.php')) checkstart(basename('index.php'));
?>
<!-- header_begin -->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo defined('HTML_PARAMS') ? HTML_PARAMS : 'dir="ltr" lang="de"'; ?>>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=<?php echo defined('CHARSET') ? CHARSET : 'iso-8859-1'; ?>">
  <meta name="robots" content="noindex">
  <title><?php echo TITLE; ?>: Elm@r-<?php echo PAGETITLE; ?></title>
  <link rel="stylesheet" type="text/css" href="<?php echo ELMAR_PATH; ?>elmar.css">
<?php if (THISPAGE == 'sysinfo.php') { ?>
  <link rel="stylesheet" type="text/css" href="<?php echo ELMAR_PATH; ?>sysinfo.css">
<?php } ?>
</head>
<body>
<?php for ($e = 0, $n = sizeof($errmsg); $e < $n; ++$e) { ?>
  <p style="color:white;background-color:red;font-weight:bold;margin:0pt;padding:5pt;border-bottom:1px black solid"><u>Fehler:</u> <?php echo $errmsg[$e]; ?></p>
<?php } ?>
<?php if (!empty($warning)) { ?>
  <p style="color:black;background-color:#FF9900;font-weight:bold;margin:0pt;padding:5pt;border-bottom:1px black solid"><u>Warnung:</u> <?php echo $warning; ?></p>
<?php } ?>
<?php if (WARN_ELMAR_PASSWORD && (!defined('ELMAR_PASSWORD') || ELMAR_PASSWORD=='')) { ?>
  <p style="color:black;background-color:#FF9900;font-weight:bold;margin:0pt;padding:5pt;border-bottom:1px black solid"><u>Warnung:</u> Kein Passwort gesetzt! Weitere Informationen dazu finden Sie in der <a href="<?php echo ELMAR_PATH; ?>readme.html#elmar_password">Readme</a>.</p>
<?php } ?>
<?php if (WARN_ELMAR_RENAME && is_dir('elmar')) { ?>
  <p style="color:black;background-color:#FF9900;font-weight:bold;margin:0pt;padding:5pt;border-bottom:1px black solid"><u>Warnung:</u> Das <CODE>elmar</CODE>-Verzeichnis wurde noch nicht umbenannt. Weitere Informationen dazu finden Sie in der <a href="<?php echo ELMAR_PATH; ?>readme.html#umbenennen">Readme</a>.</p>
<?php } ?>
<?php if (WARN_ELMAR_START_RENAME && basename($_SERVER['PHP_SELF']) == 'elmar_start.php') { ?>
  <p style="color:black;background-color:#FF9900;font-weight:bold;margin:0pt;padding:5pt;border-bottom:1px black solid"><u>Warnung:</u> Das Startskript <CODE>elmar_start.php</CODE> wurde noch nicht umbenannt. Weitere Informationen dazu finden Sie in der <a href="<?php echo ELMAR_PATH; ?>readme.html#umbenennen">Readme</a>.</p>
<?php } ?>
<table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#6b7da6" summary="Layout Kopf">
<tr>
  <td width="210" bgcolor="#FFFFFF"><img src="<?php echo ELMAR_PATH; ?>img/oscommerce.gif" border="0" alt="osCommerce" title="osCommerce" width="204" height="50"></td>
  <td>
    <div style="color:#eaeeff;background-color:#6b7da6;padding-top:10px;padding-bottom:0px;padding-left:50px;padding-right:10px">
      <div style="font-weight:bold; width:100%; filter:Shadow(color=#303030, direction=135)">
        <h1 style="text-align:center;font-size:22px;color:#eaeeff;margin:0px;padding:1px;">
          Elm<span style="color:red">@</span>r - <?php echo PAGETITLE."\n"; ?>
        </h1>
      </div>
    </div>
  </td>
</tr>
<tr>
  <td colspan="2" bgcolor="#2a5580">&nbsp;</td>
</tr>
</table>

<table id="page" border="0" cellpadding="0" cellspacing="0"  bgcolor="#2a5580" width="100%" summary="Layout Seite">
  <tr>
    <td valign="top">
<?php printmenu(); ?>
    </td>
    <td valign="top" bgcolor="#FFF8DC" width="99%">
      <div class="middle">
<!-- header_end -->
