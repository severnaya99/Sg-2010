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
// $Id: phpbb_setup_default.php 290 2004-09-15 19:48:26Z wilt $
//

?>
<h1>:: <?php echo TEXT_PAGE_HEADING; ?></h1>
<p><?php echo TEXT_MAIN; ?></p>
<?php
  if ($zc_install->error) require(DIR_WS_INSTALL_TEMPLATE . 'templates/display_errors.php');
?>

    <form method="post" action="index.php?main_page=phpbb_setup&physical_path=<?php echo $_GET['physical_path']; ?>&virtual_http_path=<?php echo $_GET['virtual_http_path']; ?>&virtual_https_path=<?php echo $_GET['virtual_https_path']; ?>&virtual_https_server=<?php echo $_GET['virtual_https_server']; ?>&enable_ssl=<?php echo $_GET['enable_ssl']; ?>&enable_ssl_admin=<?php echo $_GET['enable_ssl_admin']; ?>&sql_cache=<?php echo $_GET['sql_cache']; ?>&is_upgrade=<?php echo $_GET['is_upgrade']; ?>&use_phpbb=<?php echo $_POST['phpbb_use']; ?>">
	  <fieldset>
	  <legend><?php echo PHPBB_INFORMATION; ?></legend>

		<div class="section">
		  <div class="input">
		    <input type="radio" name="phpbb_use" id="phpbb_use_yes" tabindex="1" value="true" <?php echo PHPBB_USE_TRUE; ?>/>
		    <label for="phpbb_use_yes"><?php echo YES; ?></label>
		    <input type="radio" name="phpbb_use" id="phpbb_use_no" tabindex="2" value="false" <?php echo PHPBB_USE_FALSE; ?>/>
		    <label for="phpbb_use_no"><?php echo NO; ?></label>
		  </div>
		  <span class="label"><?php echo PHPBB_USE; ?></span>
		  <p><?php echo PHPBB_USE_INSTRUCTION. '<a href="javascript:popupWindow(\'popup_help_screen.php?error_code=64\')"> ' . TEXT_HELP_LINK . '</a>'; ?></p>
		</div>


		<div class="section">
		  <input type="text" id="phpbb_dir" name="phpbb_dir" tabindex="3" value="<?php echo PHPBB_DIR_VALUE; ?>" size="35" />
		  <label for="phpbb_dir"><?php echo PHPBB_DIR; ?></label>
		  <p><?php echo PHPBB_DIR_INSTRUCTION. '<a href="javascript:popupWindow(\'popup_help_screen.php?error_code=67\')"> ' . TEXT_HELP_LINK . '</a>'; ?></p>
		</div>
    </fieldset>
	  <input type="submit" name="submit" class="button" tabindex="4" value="<?php echo SAVE_PHPBB_SETTINGS; ?>" />
    </form>