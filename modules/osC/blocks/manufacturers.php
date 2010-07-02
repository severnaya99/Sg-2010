<?php
/**
 * $Id: manufacturers.php 63 2005-12-16 21:41:48Z Michael $
 * osCommerce, Open Source E-Commerce Solutions
 * http://www.oscommerce.com
 * Copyright (c) 2003 osCommerce
 * Released under the GNU General Public License
 * adapted 2005 for xoops by FlinkUX <http://www.flinkux.de>
 * @package xosC
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
*/

function show_manufacturers() {
  global $xoopsDB,$xoopsConfig,$xoopsTpl,$xoopsConfig;

  include_once XOOPS_ROOT_PATH."/modules/osC/includes/configure.php";
  include_once XOOPS_ROOT_PATH."/modules/osC/includes/database_tables.php";
  include_once XOOPS_ROOT_PATH."/modules/osC/includes/filenames.php";
  include_once XOOPS_ROOT_PATH."/modules/osC/includes/functions/database.php";
  include_once XOOPS_ROOT_PATH."/modules/osC/includes/functions/sessions.php";
  include_once XOOPS_ROOT_PATH."/modules/osC/includes/functions/general.php";
  include_once XOOPS_ROOT_PATH."/modules/osC/includes/functions/html_output.php";
  include_once XOOPS_ROOT_PATH."/modules/osC/includes/classes/boxes.php";
  if(!defined('XBLOCK_CONFIG')) {
    $configuration_query = tep_db_query('select configuration_key as cfgKey, configuration_value as cfgValue from ' . TABLE_CONFIGURATION);
    while ($configuration = tep_db_fetch_array($configuration_query)) {
      define($configuration['cfgKey'], $configuration['cfgValue']);
    }
    define('XBLOCK_CONFIG',"1");
  }

  $manufacturers_query = tep_db_query("select manufacturers_id, manufacturers_name from " . TABLE_MANUFACTURERS . " order by manufacturers_name");
  if ($number_of_rows = tep_db_num_rows($manufacturers_query)) {
    $info_box_contents = array();
    $info_box_contents[] = array('text' => BOX_HEADING_MANUFACTURERS);

    new infoBoxHeading($info_box_contents, false, false);

    if ($number_of_rows <= MAX_DISPLAY_MANUFACTURERS_IN_A_LIST) {
// Display a list
      $manufacturers_list = '';
      while ($manufacturers = tep_db_fetch_array($manufacturers_query)) {
        $manufacturers_name = ((strlen($manufacturers['manufacturers_name']) > MAX_DISPLAY_MANUFACTURER_NAME_LEN) ? substr($manufacturers['manufacturers_name'], 0, MAX_DISPLAY_MANUFACTURER_NAME_LEN) . '..' : $manufacturers['manufacturers_name']);
        if (isset($HTTP_GET_VARS['manufacturers_id']) && ($HTTP_GET_VARS['manufacturers_id'] == $manufacturers['manufacturers_id'])) $manufacturers_name = '<b>' . $manufacturers_name .'</b>';
        $manufacturers_list .= '<a href="' . tep_href_link(FILENAME_DEFAULT, 'manufacturers_id=' . $manufacturers['manufacturers_id']) . '">' . $manufacturers_name . '</a><br>';
      }

      $manufacturers_list = substr($manufacturers_list, 0, -4);

      $info_box_contents = array();
      $info_box_contents[] = array('text' => $manufacturers_list);
    } else {
// Display a drop-down
      $manufacturers_array = array();
      if (MAX_MANUFACTURERS_LIST < 2) {
        $manufacturers_array[] = array('id' => '', 'text' => PULL_DOWN_DEFAULT);
      }

      while ($manufacturers = tep_db_fetch_array($manufacturers_query)) {
        $manufacturers_name = ((strlen($manufacturers['manufacturers_name']) > MAX_DISPLAY_MANUFACTURER_NAME_LEN) ? substr($manufacturers['manufacturers_name'], 0, MAX_DISPLAY_MANUFACTURER_NAME_LEN) . '..' : $manufacturers['manufacturers_name']);
        $manufacturers_array[] = array('id' => $manufacturers['manufacturers_id'],
                                       'text' => $manufacturers_name);
      }

      $info_box_contents = array();
      $info_box_contents[] = array('form' => tep_draw_form('manufacturers', tep_href_link(FILENAME_DEFAULT, '', 'NONSSL', false), 'get'),
                                   'text' => tep_draw_pull_down_menu('manufacturers_id', $manufacturers_array, (isset($HTTP_GET_VARS['manufacturers_id']) ? $HTTP_GET_VARS['manufacturers_id'] : ''), 'onChange="this.form.submit();" size="' . MAX_MANUFACTURERS_LIST . '" style="width: 100%"') . tep_hide_session_id());
    }

    $block = new infoBox($info_box_contents);
  }
  return $block->content;
}
?>
