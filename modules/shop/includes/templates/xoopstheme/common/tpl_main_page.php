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
// $Id: tpl_main_page.php 361 2004-09-29 03:36:09Z drbyte $
//

  $header_template = 'tpl_header.php';
  $footer_template = 'tpl_footer.php';
  $left_column_file = 'column_left.php';
  $right_column_file = 'column_right.php';
  $body_id = str_replace('_', '', $_GET['main_page']);

  // this file can be copied to /templates/your_template_dir/pagename
  // example: to override the privacy page
  // make a directory /templates/my_template/privacy
  // copy /templates/templates_defaults/common/tpl_main_page.php to /templates/my_template/privacy/tpl_main_page.php
  // to override the global settings and turn off columns un-comment the lines below for the correct column to turn off
  // to turn off the header and/or footer uncomment the lines below
  // Note: header can be disabled in the tpl_header.php
  // Note: footer can be disabled in the tpl_footer.php

   $flag_disable_header = true;
  // $flag_disable_left = true;
  // $flag_disable_right = true;
   $flag_disable_footer = true;

?>
<table border="0" cellspacing="0" cellpadding="0">
<tr>
<?php
if (COLUMN_LEFT_STATUS == 0 or (CUSTOMERS_APPROVAL == '1' and $_SESSION['customer_id'] == '')) {
   $flag_disable_left = true;
}

if (!$flag_disable_left) {
?>
<td valign="top" id="leftcolumn">
<?php require(DIR_WS_MODULES . 'column_left.php'); ?>
<br/><br/><br/>
<div style="vertical-align:bottom;" align="center"><a href="http://www.imaginacolombia.com"><img align="center" src="<?php echo XOOPS_URL . "/modules/shop/images/imaginalogo.gif"?>" alt="Colombia Diseño Web"/></a></div>
</td>
<?php
}
?>
<td valign="top" class="centercolumn"><?php require($body_code); ?></td>

<?php
if (COLUMN_RIGHT_STATUS == 0 or (CUSTOMERS_APPROVAL == '1' and $_SESSION['customer_id'] == '')) {
   $flag_disable_right = true;
}
if (!$flag_disable_right) {
?>

<td valign="top" id="rightcolumn">
<?php require(DIR_WS_MODULES . 'column_right.php'); ?>
<?php } ?>

</tr>
<?php
  if ($banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET4)) {
    if ($banner->RecordCount() > 0) {
?>
  <tr>
    <td align="center" colspan="3"><div class="banners"><?php echo zen_display_banner('static', $banner); ?></div>  </td>
  </tr>
<?php
    }
  }
?>
<?php require(DIR_WS_MODULES . 'footer.php'); ?>