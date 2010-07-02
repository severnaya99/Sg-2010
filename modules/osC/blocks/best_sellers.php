<?php
/*
  $Id: best_sellers.php 57 2005-12-15 14:39:09Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
function b_best_sellers() {
 global $current_catgeroy_id,$languages_id,$xoopsDB,$xoopsConfig;
 
 $block=array();
/*if(!defined("XOSC_BLOCK") && !defined("XOSC_CONFIG")) {
 define("XOSC_BLOCK",1);
 require_once(XOOPS_ROOT_PATH."/modules/osC/includes/application_top.php");
}
*/

// Config part
 require_once(XOOPS_ROOT_PATH."/modules/osC/includes/configure.php");
 require_once(XOOPS_ROOT_PATH."/modules/osC/includes/database_tables.php");
 require_once(XOOPS_ROOT_PATH."/modules/osC/includes/filenames.php");
 require_once(XOOPS_ROOT_PATH."/modules/osC/includes/functions/database.php");
 require_once(XOOPS_ROOT_PATH."/modules/osC/includes/functions/general.php");
 require_once(XOOPS_ROOT_PATH."/modules/osC/includes/functions/html_output.php");
 require_once(XOOPS_ROOT_PATH."/modules/osC/includes/classes/boxes.php");
 if(!defined('XBLOCK_CONFIG')) {
   $configuration_query = tep_db_query('select configuration_key as cfgKey, configuration_value as cfgValue from ' . TABLE_CONFIGURATION);
   while ($configuration = tep_db_fetch_array($configuration_query)) {
     define($configuration['cfgKey'], $configuration['cfgValue']);
   }
   define('XBLOCK_CONFIG',"1");
 }
  if(!isset($_SESSION['languages_id'])) {
    $lang_query="select languages_id from ".TABLE_LANGUAGES." where directory ='".$xoopsConfig['language']."'";
	$lang=tep_db_query($lang_query);
	$lang_id=tep_db_fetch_array($lang);
	$languages_id=$lang_id['languages_id'];
  }else {
    $languages_id=$_SESSION['languages_id'];
   }

// box part
  if (isset($current_category_id) && ($current_category_id > 0)) {
    $best_sellers_query = tep_db_query("select distinct p.products_id, pd.products_name from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c where p.products_status = '1' and p.products_ordered > 0 and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' and p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and '" . (int)$current_category_id . "' in (c.categories_id, c.parent_id) order by p.products_ordered desc, pd.products_name limit " . MAX_DISPLAY_BESTSELLERS);
  } else {
    $best_sellers_query = tep_db_query("select distinct p.products_id, pd.products_name from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_ordered > 0 and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by p.products_ordered desc, pd.products_name limit " . MAX_DISPLAY_BESTSELLERS);
  }
  if (tep_db_num_rows($best_sellers_query) >= MIN_DISPLAY_BESTSELLERS) {
 //   $info_box_contents = array();
 //   $info_box_contents[] = array('text' => BOX_HEADING_BESTSELLERS);

 //   new infoBoxHeading($info_box_contents, false, false);

    $rows = 0;
    $bestsellers_list = '<table border="0" width="100%" cellspacing="0" cellpadding="1">';
    while ($best_sellers = tep_db_fetch_array($best_sellers_query)) {
      $rows++;
      $bestsellers_list .= '<tr><td class="infoBoxContents" valign="top">' . tep_row_number_format($rows) . '.</td><td class="infoBoxContents"><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $best_sellers['products_id']) . '">' . $best_sellers['products_name'] . '</a></td></tr>';
    }
    $bestsellers_list .= '</table>';

    $info_box_contents = array();
    $info_box_contents[] = array('text' => $bestsellers_list);

    $block = new infoBox($info_box_contents);
   /// $block['content']=$tblock->content;
  }
  
 return $block->content;
 }
?>
