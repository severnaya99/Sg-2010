<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2004 The zen-cart developers                           |
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
// $Id: popup_help_screen.php 290 2004-09-15 19:48:26Z wilt $
//

  require('includes/application_top.php');
  require('includes/languages/' . $language . '.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>" /> 
<title><?php echo META_TAG_TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/templates/template_default/css/stylesheet.css">
</head>
<body id="popup"></body>
<div id="popup_header">
<h1>
<?php
  echo POPUP_ERROR_HEADING;
  echo '<br /><br />';
?>
</h1>
</div>
<div id="popup_content">
<?php
  echo POPUP_ERROR_TEXT;
  echo '<br /><br />';
?>
</div>
<?php
  echo '<center>' . '<a href="javascript:window.close()">' . TEXT_CLOSE_WINDOW . '</a></center>';
?>
</body>
</html>