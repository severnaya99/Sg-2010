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
// $Id: index_default.php 290 2004-09-15 19:48:26Z wilt $
//
?>
<h1>:: <?php echo TEXT_PAGE_HEADING; ?></h1>
<p><?php echo TEXT_MAIN; ?></p>
<?php
  if ($zc_install->error) require(DIR_WS_INSTALL_TEMPLATE . 'templates/display_errors.php');
?>
<iframe src="includes/templates/template_default/templates/about_zencart.html"></iframe>
<form method="post" action="index.php?main_page=license<?php if (isset($_GET['language'])) { echo '&language=' . $_GET['language']; } ?>">
  <input type="submit" name="submit" class="button" value="<?php echo INSTALL; ?>" />
</form>