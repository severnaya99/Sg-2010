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
// $Id: display_errors.php 290 2004-09-15 19:48:26Z wilt $
//
?><fieldset>
<legend><?php echo TEXT_ERROR_WARNING; ?></legend>
  <div id="error">
<ul>
<?php
  foreach ($zc_install->error_array as $za_errors ) {
    echo '<li class="FAIL">' . $za_errors['text'] . '<a href="javascript:popupWindow(\'popup_help_screen.php?error_code=' . $za_errors['code'] . '\')"> ' . TEXT_HELP_LINK . '</a></li>';
  }
?>
</ul>
  </div>
</fieldset>
  
<br /><br />