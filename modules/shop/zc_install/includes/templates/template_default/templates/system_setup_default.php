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
// $Id: system_setup_default.php 290 2004-09-15 19:48:26Z wilt $
//
?>
<h1>:: <?php echo TEXT_PAGE_HEADING; ?></h1>
<p><?php echo TEXT_MAIN; ?></p>
<?php
  if ($zc_install->error) require(DIR_WS_INSTALL_TEMPLATE . 'templates/display_errors.php');
?>

    <form method="post" action="index.php?main_page=system_setup<?php if (isset($_GET['language'])) { echo '&language=' . $_GET['language']; } ?>&sql_cache=<?php echo $_GET['sql_cache']; ?>&is_upgrade=<?php echo $_GET['is_upgrade']; ?>">
	  <fieldset>
	  <legend><?php echo SERVER_SETTINGS; ?></legend>
		<div class="section">
		  <input type="text" id="physical_path" name="physical_path" tabindex = "1" value="<?php echo PHYSICAL_PATH_VALUE; ?>" size="50" />
		  <label for="physical_path"><?php echo PHYSICAL_PATH; ?></label>
		  <p><?php echo PHYSICAL_PATH_INSTRUCTION . '<a href="javascript:popupWindow(\'popup_help_screen.php?error_code=4\')"> ' . TEXT_HELP_LINK . '</a>'; ?></p>
		</div>
		<div class="section">
		  <input type="text" id="virtual_http_path" name="virtual_http_path" name="physical_path" tabindex = "2" value="<?php echo VIRTUAL_HTTP_PATH_VALUE; ?>" size="50" />
		  <label for="virtual_http_path"><?php echo VIRTUAL_HTTP_PATH; ?></label>
		  <p><?php echo VIRTUAL_HTTP_PATH_INSTRUCTION . '<a href="javascript:popupWindow(\'popup_help_screen.php?error_code=5\')"> ' . TEXT_HELP_LINK . '</a>'; ?></p>
		</div>

		<div class="section">
		  <input type="text" id="virtual_https_server" name="virtual_https_server" name="physical_path" tabindex = "3" value="<?php echo VIRTUAL_HTTPS_SERVER_VALUE; ?>" size="50" />
		  <label for="virtual_https_server"><?php echo VIRTUAL_HTTPS_SERVER; ?></label>
		  <p><?php echo VIRTUAL_HTTPS_SERVER_INSTRUCTION . '<a href="javascript:popupWindow(\'popup_help_screen.php?error_code=6\')"> ' . TEXT_HELP_LINK . '</a>'; ?></p>
		</div>

		<div class="section">
		  <input type="text" id="virtual_https_path" name="virtual_https_path" name="physical_path" tabindex = "4" value="<?php echo VIRTUAL_HTTPS_PATH_VALUE; ?>" size="50" />
		  <label for="virtual_https_path"><?php echo VIRTUAL_HTTPS_PATH; ?></label>
		  <p><?php echo VIRTUAL_HTTPS_PATH_INSTRUCTION . '<a href="javascript:popupWindow(\'popup_help_screen.php?error_code=7\')"> ' . TEXT_HELP_LINK . '</a>'; ?></p>
		</div>
	  
		<div class="section">
		  <div class="input">
		    <input type="radio" name="enable_ssl" id="enable_ssl_yes" name="enable_ssl" tabindex = "6" value="true" <?php echo ENABLE_SSL_TRUE; ?>/>
		    <label for="enable_ssl_yes"><?php echo YES; ?></label>
		    <input type="radio" name="enable_ssl" id="enable_ssl_no" name="enable_ssl" tabindex = "7" value="false" <?php echo ENABLE_SSL_FALSE; ?>/>
		    <label for="enable_ssl_no"><?php echo NO; ?></label>
		  </div>
		  <span class="label"><?php echo ENABLE_SSL; ?></span>
		  <p><?php echo ENABLE_SSL_INSTRUCTION . '<a href="javascript:popupWindow(\'popup_help_screen.php?error_code=8\')"> ' . TEXT_HELP_LINK . '</a>'; ?></p>
		</div>
		<div class="section">
		  <div class="input">
		    <input type="radio" name="enable_ssl_admin" id="enable_ssl_admin_yes" name="enable_ssl_admin" tabindex = "8" value="true" <?php echo ENABLE_SSL_TRUE; ?>/>
		    <label for="enable_ssl_admin_yes"><?php echo YES; ?></label>
		    <input type="radio" name="enable_ssl_admin" id="enable_ssl_admin_no" name="enable_ssl_admin" tabindex = "9" value="false" <?php echo ENABLE_SSL_FALSE; ?>/>
		    <label for="enable_ssl_admin_no"><?php echo NO; ?></label>
		  </div>
		  <span class="label"><?php echo ENABLE_SSL_ADMIN; ?></span>
		  <p><?php echo ENABLE_SSL_ADMIN_INSTRUCTION . '<a href="javascript:popupWindow(\'popup_help_screen.php?error_code=8\')"> ' . TEXT_HELP_LINK . '</a>'; ?></p>
		</div>
          
	  </fieldset>
	  <input type="submit" name="submit" class="button" tabindex = "10" value="<?php echo SAVE_SYSTEM_SETTINGS; ?>" />
    </form>