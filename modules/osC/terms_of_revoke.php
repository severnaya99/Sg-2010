<?php
/**
 * $Id: terms_of_revoke.php 106 2006-01-21 16:15:18Z Michael $
 * xosC - eCommerce for xoops
 * @package xosC
 * @author Michael Hammelmann
 * @version 1
 * Copyright (c) 2003 osCommerce
 * Released under the GNU General Public License
 * adapted 2005 for xoops 2.0.x by FlinkUX e.K. <http://www.flinkux.de>
 * (c) 2005  Michael Hammelmann <michael.hammelmann@flinkux.de>
**/

  include("includes/application_top.php");
  $xoopsOption['template_main'] = 'terms_of_revoke.html';
  include XOOPS_ROOT_PATH.'/header.php';
  $xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" />');
  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_TERMS_OF_REVOKE);
  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_TERMS_OF_REVOKE));
  include("includes/header.php");
  $back=count($navigation->path)-2;
  if($back < 0) $back=0;
  $xoopsTpl->assign("nav_link",tep_href_link($navigation->path[$back]['page'], tep_array_to_string($navigation->path[$back]['get'], array('action')), $navigation->path[$back]['mode']));
  $xoopsTpl->assign("img_continue",tep_image_button('button_continue_shopping.gif', IMAGE_BUTTON_CONTINUE_SHOPPING));
  include_once XOOPS_ROOT_PATH.'/footer.php';
  include("includes/application_bottom.php");
?>
