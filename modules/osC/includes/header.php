<?php
/*
  $Id: header.php 38 2005-11-14 16:35:43Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

// check if the 'install' directory exists, and warn of its existence
  if (WARN_INSTALL_EXISTENCE == 'true') {
    if (file_exists(dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/install')) {
      $messageStack->add('header', WARNING_INSTALL_DIRECTORY_EXISTS, 'warning');
    }
  }

// check if the configure.php file is writeable
  if (WARN_CONFIG_WRITEABLE == 'true') {
    if ( (file_exists(dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/includes/configure.php')) && (is_writeable(dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/includes/configure.php')) ) {
      $messageStack->add('header', WARNING_CONFIG_FILE_WRITEABLE, 'warning');
    }
  }



  if ( (WARN_DOWNLOAD_DIRECTORY_NOT_READABLE == 'true') && (DOWNLOAD_ENABLED == 'true') ) {
    if (!is_dir(DIR_FS_DOWNLOAD)) {
      $messageStack->add('header', WARNING_DOWNLOAD_DIRECTORY_NON_EXISTENT, 'warning');
    }
  }

  if ($messageStack->size('header') > 0) {
    $xoopsTpl->assign("message",1);
	$xoopsTpl->assign("messagetext",$messageStack->output('header'));
  }

  $xoopsTpl->assign("trail",$breadcrumb->trail(' &raquo; '));
  if (tep_session_is_registered('customer_id')) { 
    $xoopsTpl->assign("slogoff",1);
   $xoopsTpl->assign("logoff",tep_href_link(FILENAME_LOGOFF, '', 'SSL'));
  }
  $xoopsTpl->assign("account",tep_href_link(FILENAME_ACCOUNT, '', 'SSL'));
  $xoopsTpl->assign("shopping_cart",tep_href_link(FILENAME_SHOPPING_CART));
  $xoopsTpl->assign("checkout_shipping",tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'));
  if (isset($HTTP_GET_VARS['error_message']) && tep_not_null($HTTP_GET_VARS['error_message'])) {
	$xoopsTpl->assign("serror",1);
	$xoopsTpl->assign("errortext",htmlspecialchars(urldecode($HTTP_GET_VARS['error_message'])));
  }

  if (isset($HTTP_GET_VARS['info_message']) && tep_not_null($HTTP_GET_VARS['info_message'])) {
   $xoopsTpl->assign("sinfo",1);
   $xoopsTpl->assign("infotext",htmlspecialchars($HTTP_GET_VARS['info_message']));
  }
?>
