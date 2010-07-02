<?php
/**
 * $Id: categories.php 57 2005-12-15 14:39:09Z Michael $

 * osCommerce, Open Source E-Commerce Solutions
 * http://www.oscommerce.com

 * Copyright (c) 2003 osCommerce

 * Released under the GNU General Public License

 * adapted 2005 for xoops 2.0.x by FlinkUX e.K. <http://www.flinkux.de>
  
 * (c) 2005  Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @package xosC
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
**/


  function tep_show_category($tmp_counter,$cat_string,$tmp_tree,$cPath_array) {

  $tree=$tmp_tree;
  $counter=$tmp_counter;   
  $categories_string="";

    for ($i=0; $i<$tree[$counter]['level']; $i++) {
      $categories_string .= "&nbsp;&nbsp;";
    }

    $categories_string .= '<a href="';

    if ($tree[$counter]['parent'] == 0) {
      $cPath_new = 'cPath=' . $counter;
    } else {
      $cPath_new = 'cPath=' . $tree[$counter]['path'];
    }

    $categories_string .= tep_href_link(FILENAME_DEFAULT, $cPath_new) . '">';

    if (isset($cPath_array) && in_array($counter, $cPath_array)) {
      $categories_string .= '<b>';
    }

// display category name
    $categories_string .= $tree[$counter]['name'];

    if (isset($cPath_array) && in_array($counter, $cPath_array)) {
      $categories_string .= '</b>';
    }

    if (tep_has_category_subcategories($counter)) {
      $categories_string .= '-&gt;';
    }

    $categories_string .= '</a>';

    if (SHOW_COUNTS == 'true') {
      $products_in_category = tep_count_products_in_category($counter);
      if ($products_in_category > 0) {
        $categories_string .= '&nbsp;(' . $products_in_category . ')';
      }
    }

    $categories_string .= '<br>';

    if ($tree[$counter]['next_id'] != false) {
	// $categories_string.="tep_show_category(".$tree[$counter]['next_id'].",".$categories_string.",".$tree.",".$cPath_array.")";
      $categories_string.=tep_show_category($tree[$counter]['next_id'],$categories_string,$tree,$cPath_array);
    }
	return $categories_string;
  }


  function show_categories($options) {
  global $xoopsDB,$xoopsConfig,$xoopsTpl,$xoopsConfig;

  include_once XOOPS_ROOT_PATH."/modules/osC/includes/configure.php";
  include_once XOOPS_ROOT_PATH."/modules/osC/includes/database_tables.php";
  include_once XOOPS_ROOT_PATH."/modules/osC/includes/filenames.php";
  include_once XOOPS_ROOT_PATH."/modules/osC/includes/functions/database.php";
  include_once XOOPS_ROOT_PATH."/modules/osC/includes/functions/sessions.php";
  include_once XOOPS_ROOT_PATH."/modules/osC/includes/functions/general.php";
  include_once XOOPS_ROOT_PATH."/modules/osC/includes/functions/html_output.php";
  include_once XOOPS_ROOT_PATH."/modules/osC/includes/classes/boxes.php";

   $cPath ='';
   $cPath_array = array();
  
  $categories_string="";

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
  $info_box_contents = array();
  $info_box_contents[] = array('text' => BOX_HEADING_CATEGORIES);

 // $cat_list_head = new infoBoxHeading($info_box_contents, true, false);
 // $categories_string = $cat_list_head->content;
 // $categories_string = '';
  $tree = array();

  $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '0' and c.categories_status = 1 and c.categories_id = cd.categories_id and cd.language_id='" . (int)$languages_id ."' order by sort_order, cd.categories_name");

  while ($categories = tep_db_fetch_array($categories_query))  {
    $tree[$categories['categories_id']] = array('name' => $categories['categories_name'],
                                                'parent' => $categories['parent_id'],
                                                'level' => 0,
                                                'path' => $categories['categories_id'],
                                                'next_id' => false);

    if (isset($parent_id)) {
      $tree[$parent_id]['next_id'] = $categories['categories_id'];
    }

    $parent_id = $categories['categories_id'];

    if (!isset($first_element)) {
      $first_element = $categories['categories_id'];
    }
  }
   $cPath=isset($_GET['cPath']) ? $_GET['cPath'] : '';
  if (tep_not_null($cPath)) {
    $cPath_array = tep_parse_category_path($cPath);
    $cPath = implode('_', $cPath_array);
    $current_category_id = $cPath_array[(sizeof($cPath_array)-1)];
  } else {
    $current_category_id = 0;
  }
  //------------------------
  if (tep_not_null($cPath)) {
    $new_path = '';
    reset($cPath_array);
    while (list($key, $value) = each($cPath_array)) {
      unset($parent_id);
      unset($first_id);
      $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . (int)$value . "' and c.categories_status = 1 and c.categories_id = cd.categories_id and cd.language_id='" . (int)$languages_id ."' order by sort_order, cd.categories_name");
      if (tep_db_num_rows($categories_query)) {
        $new_path .= $value;
        while ($row = tep_db_fetch_array($categories_query)) {
          $tree[$row['categories_id']] = array('name' => $row['categories_name'],
                                               'parent' => $row['parent_id'],
                                               'level' => $key+1,
                                               'path' => $new_path . '_' . $row['categories_id'],
                                               'next_id' => false);

          if (isset($parent_id)) {
            $tree[$parent_id]['next_id'] = $row['categories_id'];
          }

          $parent_id = $row['categories_id'];

          if (!isset($first_id)) {
            $first_id = $row['categories_id'];
          }

          $last_id = $row['categories_id'];
        }
        $tree[$last_id]['next_id'] = $tree[$value]['next_id'];
        $tree[$value]['next_id'] = $first_id;
        $new_path .= '_';
      } else {
        break;
      }
    }
  }
  $categories_string=tep_show_category($first_element,$categories_string,$tree,$cPath_array); 

  $info_box_contents = array();
  $info_box_contents[] = array('text' => $categories_string);

  $cat_list=new infoBox($info_box_contents);
 // print_r($tree);
//  $xoopsTpl->assign("cat_list",$cat_list->content);

  return $cat_list->content;
 }
?>
