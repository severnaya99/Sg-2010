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
// $Id: tpl_header.php 1602 2005-07-18 05:01:59Z drbyte $
//

  // this file can be copied to /templates/your_template_dir/pagename
  // example: to override the privacy page
  // make a directory /templates/my_template/privacy
  // copy /templates/templates_defaults/common/tpl_header.php to /templates/my_template/privacy/tpl_header.php
  // to override the global settings and turn off the header un-comment the following line:

  // $flag_disable_header = true;

?>
    <table class="centershop" border="0" cellspacing="0" cellpadding="0">
<?php
if (!$flag_disable_header) {
?>
<?php
  if ($banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET1)) {
    if ($banner->RecordCount() > 0) {
?>
      <tr>
        <td align="center"><div class="banners"><?php echo zen_display_banner('static', $banner); ?></div></td>
      </tr>
<?php
    }
  }
?>
      <tr><td>
        <table border="0" cellspacing="0" cellpadding="0" class="headerNavigation" align="center">
          <tr class="headerNavigation">
            <td align="left" valign="top" width="33%" class="headerNavigation">
              <a href="<?php echo zen_href_link(FILENAME_DEFAULT, '', 'NONSSL'); ?>"><?php echo HEADER_TITLE_CATALOG; ?></a>&nbsp;|&nbsp;
<?php if ($_SESSION['customer_id']) { ?>
              <a href="<?php echo zen_href_link(FILENAME_LOGOFF, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGOFF; ?></a>&nbsp;|&nbsp;
              <a href="<?php echo zen_href_link(FILENAME_ACCOUNT, '', 'SSL'); ?>"><?php echo HEADER_TITLE_MY_ACCOUNT; ?></a>
<?php
      } else {
        if (STORE_STATUS == '0') {
?>
              <a href="<?php echo zen_href_link(FILENAME_LOGIN, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGIN; ?></a>
<?php } } ?>
            </td>
            <td align="center" width="25%"><?php require(DIR_WS_MODULES . 'sideboxes/' . 'search_header.php'); ?></td>
            <td class="headerNavigation" align="right" valign="top" width="33%">
<?php if ($_SESSION['cart']->count_contents() != 0) { ?>
              <a href="<?php echo zen_href_link(FILENAME_SHOPPING_CART, '', 'NONSSL'); ?>"><?php echo HEADER_TITLE_CART_CONTENTS; ?></a>&nbsp;|&nbsp;<a href="<?php echo zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'); ?>"><?php echo HEADER_TITLE_CHECKOUT; ?>&raquo;</a>
<?php }?>
            </td>
          </tr>
        </table>
        <table border="0" width="100%" cellspacing="0" cellpadding="0" class="header">
          <tr><!-- All HEADER_ definitions in the columns below are defined in includes/languages/english.php //-->
            <td valign="middle" height="<?php echo HEADER_LOGO_HEIGHT; ?>" width="<?php echo HEADER_LOGO_WIDTH; ?>">
<?php echo '<a href="' . zen_href_link(FILENAME_DEFAULT) . '">' . zen_image($template->get_template_dir(HEADER_LOGO_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . HEADER_LOGO_IMAGE, HEADER_ALT_TEXT) . '</a>'; ?>
            </td>
            <td align="center" valign="top">
<?php
              if (HEADER_SALES_TEXT != '') {
                echo HEADER_SALES_TEXT;
              }
              if ($banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET2)) {
                if ($banner->RecordCount() > 0) {
                  echo zen_display_banner('static', $banner);
                }
              }
?>
            </td>
          </tr>
        </table>
<?php
  if (isset($_GET['error_message']) && zen_not_null($_GET['error_message'])) {
?>
        <table border="0" width="100%" cellspacing="0" cellpadding="2">
          <tr class="headerError">
            <td class="headerError"><?php echo htmlspecialchars(urldecode($_GET['error_message'])); ?></td>
          </tr>
        </table>
<?php
  }
  if (isset($_GET['info_message']) && zen_not_null($_GET['info_message'])) {
?>
        <table border="0" width="100%" cellspacing="0" cellpadding="2">
          <tr class="headerInfo">
            <td class="headerInfo"><?php echo htmlspecialchars($_GET['info_message']); ?></td>
          </tr>
        </table>
<?php
  }
?>
<?php
} else {
?>
    <tr><td>
<?php
}
?>
<?php
// set to 1 for ON or 0 for OFF
//define('CATEGORIES_TABS_STATUS','0');  //  --- this moved to "configuration" table in database
define('FILENAME_CATEGORIES_TABS','categories_tabs.php');
if (CATEGORIES_TABS_STATUS == '1') {
  include(DIR_WS_MODULES . zen_get_module_directory(FILENAME_CATEGORIES_TABS));
}
?>