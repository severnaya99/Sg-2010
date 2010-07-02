<?php
/**
 * $Id: search.php 57 2005-12-15 14:39:09Z Michael $
 * osCommerce, Open Source E-Commerce Solutions
 * http://www.oscommerce.com
 * Copyright (c) 2003 osCommerce
 * Released under the GNU General Public License
 * adapted 2005 for xoops by FlinkUX <http://www.flinkux.de>
 * @package xosC
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
*/
function show_search() {
  global $xoopsDB,$xoopsConfig,$xoopsTpl,$xoopsConfig;

  include_once XOOPS_ROOT_PATH."/modules/osC/includes/configure.php";
  include_once XOOPS_ROOT_PATH."/modules/osC/includes/database_tables.php";
  include_once XOOPS_ROOT_PATH."/modules/osC/includes/filenames.php";
  include_once XOOPS_ROOT_PATH."/modules/osC/includes/functions/database.php";
  include_once XOOPS_ROOT_PATH."/modules/osC/includes/functions/sessions.php";
  include_once XOOPS_ROOT_PATH."/modules/osC/includes/functions/general.php";
  include_once XOOPS_ROOT_PATH."/modules/osC/includes/functions/html_output.php";
  include_once XOOPS_ROOT_PATH."/modules/osC/includes/classes/boxes.php";

  $info_box_contents = array();
  $info_box_contents[] = array('text' => BOX_HEADING_SEARCH);

  new infoBoxHeading($info_box_contents, false, false);

  $info_box_contents = array();
  $info_box_contents[] = array('form' => tep_draw_form('quick_find', tep_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', 'NONSSL', false), 'get'),
                               'align' => 'center',
                               'text' => tep_draw_input_field('keywords', '', 'size="10" maxlength="30" style="width: ' . (BOX_WIDTH-30) . 'px"') . '&nbsp;' . tep_hide_session_id() . tep_image_submit('button_quick_find.gif', BOX_HEADING_SEARCH) . '<br>' . BOX_SEARCH_TEXT . '<br><a href="' . tep_href_link(FILENAME_ADVANCED_SEARCH) . '"><b>' . BOX_SEARCH_ADVANCED_SEARCH . '</b></a>');

 $block =  new infoBox($info_box_contents);
 return $block->content;
}
