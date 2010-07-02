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
// $Id: navigation.php 290 2004-09-15 19:48:26Z wilt $
//
?>
<ul>
  <li id="welcome">Welcome</li>
  <li id="license">License</li>
  <li id="inspect">Prerequisites</li>
  <li id="system">System Setup</li>
  <li id="phpbb">phpBB Setup</li>
  <li id="database">Database Setup</li>
<?php if ($is_upgradable || $is_upgrade) { ?>
  <li id="databaseupg">Database Upgrade</li>
<?php } ?>
  <li id="store">Store Setup</li>
  <li id="admin">Admin Setup</li>
  <li id="finish">Finished</li>
</ul>