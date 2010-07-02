<?php
/**
 * $Id: popup_image.php 149 2006-01-27 13:31:07Z Michael $
 * osCommerce, Open Source E-Commerce Solutions
 * http://www.oscommerce.com
 * Copyright (c) 2003 osCommerce
 * Released under the GNU General Public License
 * adapted 2005 for xoops 2.0.x by FlinkUX e.K. <http://www.flinkux.de>
 * (c) 2005  Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @package xosC
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
**/

  require('includes/application_top.php');
  include(DIR_WS_CLASSES.'product.php');
  $navigation->remove_current_page();
  $sproduct= new product((int)$HTTP_GET_VARS['pID']);
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo $sproduct->get_name() ?></title>
<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
<script language="javascript"><!--
var i=0;
function resize() {
  if (navigator.appName == 'Netscape') i=40;
  if (document.images[0]) window.resizeTo(document.images[0].width +40, document.images[0].height+80);
  self.focus();
}
//--></script>
</head>
<body onLoad="resize();">
<table><tr align="center" valign="middle"><td  valign="middle" align="center">
<?php echo tep_image($sproduct->get_image_path() . $sproduct->get_image(), $sproduct->get_name()); ?>
</td> </tr></table>
</body>
</html>
<?php require('includes/application_bottom.php'); ?>
