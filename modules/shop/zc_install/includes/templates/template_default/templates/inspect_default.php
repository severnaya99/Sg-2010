<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
// $Id: inspect_default.php 1315 2005-05-06 18:59:12Z drbyte $
//
?>
<h1>:: <?php echo TEXT_PAGE_HEADING; ?></h1>
<p><?php echo TEXT_MAIN; ?></p>
<?php
  if ($zc_install->error) require(DIR_WS_INSTALL_TEMPLATE . 'templates/display_errors.php');
?>
<form method="post" action="index.php?main_page=inspect<?php if (isset($_GET['language'])) { echo '&language=' . $_GET['language']; } ?>">

<?php if ($zen_cart_previous_version_installed == true) { ?>
<fieldset>
<legend><strong><?php echo UPGRADE_DETECTION; ?></strong></legend>
<div class="section"><br />
 <strong><?php echo LABEL_PREVIOUS_INSTALL_FOUND; ?></strong><br />
 <?php echo $zdb_version_message; ?>
 </div></fieldset>
 <br />
<?php } ?>
<fieldset>
<legend><strong><?php echo SYSTEM_INSPECTION_RESULTS; ?></strong></legend>
<div class="section"><ul class="inspect-list">
<?php foreach ($status_check as $val) { ?>
   <li class='<?php echo $val['Class']; ?>'><strong><?php echo $val['Title']; ?></strong> = <?php echo $val['Status']; ?>
<?php if ($val['HelpURL']!='' && ($val['Class'] == 'FAIL' || $val['Class'] == 'WARN') ) {
    echo '&nbsp; ' . '<a class="nowrap" href="javascript:popupWindow(\'popup_help_screen.php?error_code=' . $val['HelpURL'] . '\')"> ';
//    echo (zen_not_null($val['HelpLabel'])) ? $val['HelpLabel'] : LABEL_EXPLAIN ;
    echo LABEL_EXPLAIN ;
    echo '</a>';
    } ?>
</li><br />
<?php } //end foreach?>

<!--
<br />
 <li><strong><?php //echo LABEL_PHP_MODULES; ?></strong><br/>
   <ul>
   <?php //foreach($php_extensions as $module) { echo '<li>' . $module .'</li><br />'; } ?>
   </ul></li>
-->
</ul>
<br /><a class="button" href="javascript:popupWindowLrg('includes/phpinfo.php')"><?php echo VIEW_PHP_INFO_LINK_TEXT; ?></a>
</div>
</fieldset>

<fieldset>
<legend><strong><?php echo OTHER_INFORMATION; ?></strong></legend>
<div class="section"><?php echo OTHER_INFORMATION_DESCRIPTION; ?><ul class="inspect-list">
<?php foreach ($status_check2 as $val) { ?>
   <li class='<?php echo $val['Class']; ?>'><strong><?php echo $val['Title']; ?></strong> = <?php echo $val['Status']; ?>
<?php if ($val['HelpURL']!='' && ($val['Class'] == 'FAIL' || $val['Class'] == 'WARN') ) {
    echo '&nbsp; ' . '<a class="nowrap" href="javascript:popupWindow(\'popup_help_screen.php?error_code=' . $val['HelpURL'] . '\')"> ';
//    echo (zen_not_null($val['HelpLabel'])) ? $val['HelpLabel'] : LABEL_EXPLAIN ;
    echo LABEL_EXPLAIN ;
    echo '</a>';
    } ?>
</li><br />
<?php } //end foreach?>
</ul>
</div>
</fieldset>

<fieldset>
<legend><strong><?php echo LABEL_FOLDER_PERMISSIONS; ?></strong></legend>
<div class='section'>
<?php echo LABEL_WRITABLE_FOLDER_INFO; ?>
<ul class="inspect-list">
<?php foreach ($file_status as $val) { ?>
   <li class='<?php echo $val['class']; ?>'><strong><?php echo $val['file']; ?></strong> = 
   <?php echo $val['exists'] . $val['writable']; ?>
   </li><br />
<?php } //end foreach?>
<br />
<?php foreach ($folder_status as $val) { ?>
   <li class='<?php echo $val['class']; ?>'><strong><?php echo $val['folder']; ?></strong> = 
   <?php echo $val['writable']; ?>
   <?php echo ($val['writable']==UNWRITABLE)?'&nbsp;&nbsp;(chmod '.$val['chmod'] . ')' : ''; ?>
   </li><br />
<?php } //end foreach?>
</ul>
</div>
</fieldset>

<input type="submit" name="submit" class="button" tabindex = "8" value="<?php echo INSTALL_BUTTON; ?>" />
<?php if ($zen_cart_previous_version_installed == true) { ?>
<input type="submit" name="upgrade" class="button" tabindex = "9" value="<?php echo UPGRADE_BUTTON; ?>" />
<?php } ?>
<?php if ($zen_cart_allow_database_upgrade == true) { ?>
<input type="submit" name="db_upgrade" class="button" tabindex = "10" value="<?php echo DB_UPGRADE_BUTTON; ?>" />
<?php } ?>
<input type="submit" name="refresh" class="button" tabindex = "11" value="<?php echo REFRESH_BUTTON; ?>" />
</form>
