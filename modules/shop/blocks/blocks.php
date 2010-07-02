<?php

function b_shop_blocks($options) {
	global $block, $xoopsConfig;
	$block = array();

	if($options[0]=="Shopping Cart") {
		$content = $_SESSION["zenblocks"]["Shopping Cart"];
		
	} else {
		include XOOPS_ROOT_PATH . "/modules/shop/blocks/cache/".$xoopsConfig["language"]."/".$options[0];
	}

	if(!$content) return '';

	$block['title']=stripslashes($title);
	$block['content']= stripslashes($content);
	return $block;
}

function b_shop_blocks_edit($options)  {
	
	$sideboxes = Array("Shopping Cart","whats_new.php","categories.php","currencies.php","document_categories.php","featured.php","information.php","specials.php","reviews.php","more_information.php","manufacturer_info.php","manufacturers.php","best_sellers.php","banner_box_all.php","banner_box.php","banner_box2.php", //Center Blocks
	"category_row.php","new_products.php","featured_products.php","specials_index.php","upcoming_products.php");
	
	;

	$form = "Zen Cart Block:"."&nbsp;<select name='options[]'>
	<optgroup label='Left Blocks'>
	";
    
	for($sd=0;$sd<count($sideboxes);$sd++) {
		if($sd==16) $form.="<optgroup label='Center Blocks'>";
		$form .= "<option value='".$sideboxes[$sd]."'";
		if ( $options[0] == $sideboxes[$sd] ) {
			$form .= " selected='selected'";
		}
		$form .= ">".$sideboxes[$sd]."</option>\n";
	}
	$form .= "</select>\n";
	
	return $form;
}

?>
