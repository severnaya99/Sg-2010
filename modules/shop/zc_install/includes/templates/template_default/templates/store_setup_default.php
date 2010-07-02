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
// $Id: store_setup_default.php 746 2004-12-09 06:04:14Z ajeh $
//
?>
<h1>:: <?php echo TEXT_PAGE_HEADING; ?></h1>
<p><?php echo TEXT_MAIN; ?></p>
<?php
  if ($zc_install->error) require(DIR_WS_INSTALL_TEMPLATE . 'templates/display_errors.php');
?>

    <form method="post" action="index.php?main_page=store_setup&language=<?php echo $language; ?>">
	  <fieldset>
	  <legend><?php echo STORE_INFORMATION; ?></legend>
		<div class="section">
		  <input type="text" id="store_name" name="store_name" tabindex="1" size="35" value="<?php echo STORE_NAME_VALUE; ?>" />
		  <label for="store_name"><?php echo STORE_NAME; ?></label>
		  <p><?php echo STORE_NAME_INSTRUCTION . '<a href="javascript:popupWindow(\'popup_help_screen.php?error_code=37\')"> ' . TEXT_HELP_LINK . '</a>'; ?></p>
		</div>
		<div class="section">
		  <input type="text" id="store_owner" name="store_owner" tabindex="2" size="35" value="<?php echo STORE_OWNER_VALUE; ?>" />
		  <label for="store_owner"><?php echo STORE_OWNER; ?></label>
		  <p><?php echo STORE_OWNER_INSTRUCTION . '<a href="javascript:popupWindow(\'popup_help_screen.php?error_code=38\')"> ' . TEXT_HELP_LINK . '</a>'; ?></p>
		</div>
		<div class="section">
		  <input type="text" id="store_owner_email" name="store_owner_email" tabindex="3"  size="30" value="<?php echo STORE_OWNER_EMAIL_VALUE; ?>" />
		  <label for="store_owner_email"><?php echo STORE_OWNER_EMAIL; ?></label>
		  <p><?php echo STORE_OWNER_EMAIL_INSTRUCTION . '<a href="javascript:popupWindow(\'popup_help_screen.php?error_code=39\')"> ' . TEXT_HELP_LINK . '</a>'; ?></p>
		</div>
		<div class="section">
		  <select id="store-country" name="store_country" tabindex="4">
<?php echo $country_string; ?>
		  </select>
	      <label for="store_country"><?php echo STORE_COUNTRY; ?></label>
		  <p><?php echo STORE_COUNTRY_INSTRUCTION . '<a href="javascript:popupWindow(\'popup_help_screen.php?error_code=40\')"> ' . TEXT_HELP_LINK . '</a>'; ?></p>
		</div>
		<div class="section">
		  <select id="store_zone" name="store_zone" tabindex="5" >
<?php echo $zone_string; ?>
		  </select>
	      <label for="store_zone"><?php echo STORE_ZONE; ?></label>
		  <p><?php echo STORE_ZONE_INSTRUCTION . '<a href="javascript:popupWindow(\'popup_help_screen.php?error_code=41\')"> ' . TEXT_HELP_LINK . '</a>'; ?></p>
		</div>
        <div class="section">
		  <textarea rows="4" cols="20" id="store_address" tabindex="6" name="store_address"><?php echo STORE_ADDRESS_VALUE; ?></textarea>
		  <label for="store_address"><?php echo STORE_ADDRESS; ?></label>
		  <p><?php echo STORE_ADDRESS_INSTRUCTION . '<a href="javascript:popupWindow(\'popup_help_screen.php?error_code=42\')"> ' . TEXT_HELP_LINK . '</a>'; ?></p>
		</div>
		<div class="section">
		  <select id="store_default_language" tabindex="7" name="store_default_language">
<?php echo $language_string; ?>
		  </select>
	      <label for="store_default_language"><?php echo STORE_DEFAULT_LANGUAGE; ?></label>
		  <p><?php echo STORE_DEFAULT_LANGUAGE_INSTRUCTION . '<a href="javascript:popupWindow(\'popup_help_screen.php?error_code=43\')"> ' . TEXT_HELP_LINK . '</a>'; ?></p>
		</div>
    	<div class="section">
		  <select id="store_default_currency" tabindex="8" name="store_default_currency">
<?php echo $currency_string; ?>
		  </select>
	      <label for="store_default_currency"><?php echo STORE_DEFAULT_CURRENCY; ?></label>
		  <p><?php echo STORE_DEFAULT_CURRENCY_INSTRUCTION . '<a href="javascript:popupWindow(\'popup_help_screen.php?error_code=44\')"> ' . TEXT_HELP_LINK . '</a>'; ?></p>
		</div>
	  </fieldset>
	  <fieldset>
	    <legend><?php echo DEMO_INFORMATION; ?></legend>
		<div class="section">
		  <div class="input">
		    <input type="radio" name="demo_install" id="demo_install_yes" tabindex="9" value="true" <?php echo DEMO_INSTALL_TRUE; ?>/>
		    <label for="demo_install_yes"><?php echo YES; ?></label>
		    <input type="radio" name="demo_install" id="demo_install_no" tabindex="9" value="false" <?php echo DEMO_INSTALL_FALSE; ?>/>
		    <label for="demo_install_no"><?php echo NO; ?></label>
		  </div>
		  <span class="label"><?php echo DEMO_INSTALL; ?></span>
		  <p><?php echo DEMO_INSTALL_INSTRUCTION . '<a href="javascript:popupWindow(\'popup_help_screen.php?error_code=45\')"> ' . TEXT_HELP_LINK . '</a>'; ?></p>
		</div>
	  </fieldset>
	  <input type="submit" name="submit" class="button" tabindex="15" value="<?php echo SAVE_STORE_SETTINGS; ?>" />
    </form>