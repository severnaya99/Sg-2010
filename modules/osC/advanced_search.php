<?php
/**
 * $Id: advanced_search.php 87 2006-01-21 16:14:30Z Michael $
 * osCommerce, Open Source E-Commerce Solutions
 * http://www.oscommerce.com
 * Copyright (c) 2003 osCommerce
 * Released under the GNU General Public License
 * adapted 2005 for xoops 2.2.x by FlinkUX e.K. <http://www.flinkux.de>
 * (c) 2005  Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @package xosC
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
**/

  require('includes/application_top.php');
  include(DIR_WS_CLASSES."product.php");
  $xoopsOption['template_main'] = 'advanced_search.html';
  include XOOPS_ROOT_PATH.'/header.php';
  $xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" />');

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_ADVANCED_SEARCH);

  $breadcrumb->add(NAVBAR_TITLE_1, tep_href_link(FILENAME_ADVANCED_SEARCH));

  $xoopsTpl->assign("search_form",tep_draw_form('advanced_search', tep_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', 'NONSSL', false), 'get', 'onSubmit="return check_form(this);"') . tep_hide_session_id());
  $xoopsTpl->assign("site_image", tep_image(DIR_WS_IMAGES . 'table_background_browse.gif', HEADING_TITLE_1, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT));
  $xoopsTpl->assign("seperator",tep_draw_separator('pixel_trans.gif', '100%', '10'));
  if ($messageStack->size('search') > 0) {
    $xoopsTpl->assign("message",1);
	$xoopsTpl->assign("messagetext",$messageStack->output('search'));
  }
  $info_box_contents = array();
  $info_box_contents[] = array('text' => HEADING_SEARCH_CRITERIA);

  $heading_box= new infoBoxHeading($info_box_contents, true, true);
  $xoopsTpl->assign("block_heading",$heading_box->content);
  $info_box_contents = array();
  $info_box_contents[] = array('text' => tep_draw_input_field('keywords', '', 'style="width: 100%"'));
  $info_box_contents[] = array('align' => 'right', 'text' => tep_draw_checkbox_field('search_in_description', '1') . ' ' . TEXT_SEARCH_IN_DESCRIPTION);

  $info_block = new infoBox($info_box_contents);
  $xoopsTpl->assign("block_info",$info_block->content);
  $xoopsTpl->assign("pop_link",tep_href_link(FILENAME_POPUP_SEARCH_HELP));
  $xoopsTpl->assign("bt_search",tep_image_submit('button_search.gif', IMAGE_BUTTON_SEARCH));
  $xoopsTpl->assign("categories_menu",tep_draw_pull_down_menu('categories_id', tep_get_categories(array(array('id' => '', 'text' => TEXT_ALL_CATEGORIES)))));
  $xoopsTpl->assign("subcat",tep_draw_checkbox_field('inc_subcat', '1', true));
  $xoopsTpl->assign("manufacturers_menu",tep_draw_pull_down_menu('manufacturers_id', tep_get_manufacturers(array(array('id' => '', 'text' => TEXT_ALL_MANUFACTURERS)))));
  $xoopsTpl->assign("pfrom", tep_draw_input_field('pfrom'));
  $xoopsTpl->assign("pto", tep_draw_input_field('pto'));
  $xoopsTpl->assign("dfrom",tep_draw_input_field('dfrom', DOB_FORMAT_STRING, 'onFocus="RemoveFormatString(this, \'' . DOB_FORMAT_STRING . '\')"'));
  $xoopsTpl->assign("dto",tep_draw_input_field('dto', DOB_FORMAT_STRING, 'onFocus="RemoveFormatString(this, \'' . DOB_FORMAT_STRING . '\')"'));

  include_once XOOPS_ROOT_PATH.'/footer.php';
  include("includes/application_bottom.php");
?>