<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                               |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
// $Id: html_header.php 358 2004-09-28 23:30:32Z drbyte $
//
// TODO
// cvs block
// stylesheets

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>" />
<?php echo ($current_page=='database_upgrade' || $current_page == 'inspect') ? '<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">' : '' ; ?>
<?php echo ($current_page=='database_upgrade' || $current_page == 'inspect') ? '<META HTTP-EQUIV="EXPIRES" CONTENT="0">' : '' ; ?>
<?php echo ($current_page=='database_upgrade' || $current_page == 'inspect') ? '<META HTTP-EQUIV="Pragma" CONTENT="no-cache">' : '' ; ?>
<title><?php echo META_TAG_TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/templates/template_default/css/stylesheet.css">
<script language="javascript" type="text/javascript"><!--
function popupWindow(url) {
  window.open(url,'popupWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=450,height=280,screenX=150,screenY=150,top=150,left=150')
}
function popupWindowLrg(url) {
  window.open(url,'popupWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=700,height=500,screenX=50,screenY=50,top=50,left=50')
}
//--></script></head>