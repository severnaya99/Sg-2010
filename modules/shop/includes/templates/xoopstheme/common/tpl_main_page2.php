<?php

  function saveblock($name, $title, $content) {
	global $xoopsConfig;
	/*$block = '<div class="blockTitle">'.$title.'</div>';
	$block .= '<div class="blockContent">'.$content.'</div>';*/
		
	$block = '<?php $title="'.addslashes($title).'";';
	$block .= '$content="'.addslashes($content).'"; ?>';

	$file = XOOPS_ROOT_PATH . "/modules/shop/blocks/cache/".$xoopsConfig["language"]."/".$name;
	
	$fp = fopen($file, "w");
	fwrite($fp,$block);
	fclose($fp);

  }


  $header_template = 'tpl_header.php';
  $footer_template = 'tpl_footer.php';
  $left_column_file = 'column_left.php';
  $right_column_file = 'column_right.php';
  $body_id = str_replace('_', '', $_GET['main_page']);


   $flag_disable_header = true;
   $flag_disable_footer = true;

?>
<table border="0" cellspacing="0" cellpadding="0">
<tr>


<td valign="top" id="leftcolumn">
<?php $column_box_default='tpl_box_default_left.php'; 
  
  $sideboxes = Array("whats_new.php","categories.php","currencies.php","document_categories.php","featured.php","information.php","specials.php","reviews.php","more_information.php","manufacturer_info.php","manufacturers.php","best_sellers.php","banner_box_all.php","banner_box.php","banner_box2.php");
  
  for($sd=0;$sd<count($sideboxes);$sd++) {
	include ("includes/modules/sideboxes/".$sideboxes[$sd]);
    saveblock($sideboxes[$sd], $title, $content);
  }

    
  
  

?>
<td valign="top" class="centercolumn">
<?php 

$modulesmo = Array(FILENAME_FEATURED_PRODUCTS_MODULE,FILENAME_SPECIALS_INDEX,FILENAME_NEW_PRODUCTS,FILENAME_UPCOMING_PRODUCTS);
  
  for($mo=0;$mo<count($modulesmo);$mo++) {
	$lcontents = '';$title='';
	include(DIR_WS_MODULES . zen_get_module_directory($modulesmo[$mo]));
    saveblock($modulesmo[$mo], $title, $lcontents);
  }
  
  $categories_query = "select c.categories_id, cd.categories_name, c.categories_image, c.parent_id
                           from   " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd
                           where      c.parent_id = '" . (int)$current_category_id . "'
                           and        c.categories_id = cd.categories_id
                           and        cd.language_id = '" . (int)$_SESSION['languages_id'] . "'
                           and        c.categories_status= '1'
                           order by   sort_order, cd.categories_name";

  $categories = $db->Execute($categories_query);
  $number_of_categories = $categories->RecordCount();
  $new_products_category_id = $current_category_id;

echo "<table>";
require(DIR_WS_MODULES . 'pages/index/category_row.php');
echo "</table>";
saveblock("category_row.php", "category_row.php", "<table>".$contents."</table>");

?></td>
</td>
</tr>
</table>
<?php include(DIR_WS_MODULES . 'footer.php'); ?>
</body>