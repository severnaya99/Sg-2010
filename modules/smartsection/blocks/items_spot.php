<?php

/**
* $Id: items_spot.php 1565 2008-04-13 14:54:29Z malanciault $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/
if (!defined("XOOPS_ROOT_PATH")) {
die("XOOPS root path not defined");
}

function smartsection_items_spot_show($options)
{
	include_once(XOOPS_ROOT_PATH."/modules/smartsection/include/common.php");

	$opt_display_last = $options[0];
	$opt_items_count = $options[1];
	$opt_categoryid = $options[2];
	$sel_items = isset($options[3]) ? explode(',', $options[3]) : '';
	$opt_display_poster = $options[4];
	$opt_display_comment = $options[5];
	$opt_display_type = $options[6];

	if ($opt_categoryid == 0) {
		$opt_categoryid = -1;
	}

	$block = array();
	$smartsection_item_handler =& smartsection_gethandler('item');
	if ($opt_display_last == 1) {
		$itemsObj = $smartsection_item_handler->getAllPublished($opt_items_count, 0, $opt_categoryid, $sort='datesub', $order='DESC', 'summary');
		$i = 1;
		$itemsCount = count($itemsObj);

		if ($itemsObj) {
			foreach ($itemsObj as $key => $thisitem) {
				$item = array();
				$item = $thisitem->toArray();
				$item['who_when'] = sprintf(_MB_SSECTION_WHO_WHEN, $thisitem->posterName(), $thisitem->datesub());
				if ($i < $itemsCount) {
					$item['showline'] = true;
				} else {
					$item['showline'] = false;
				}
				$i++;
				$block['items'][] = $item;
			}
		}
	} else {
		$i = 1;
		$itemsCount = count($sel_items);
		foreach ($sel_items as $item_id) {
			$itemObj = new SmartsectionItem($item_id);
			if (!$itemObj->notLoaded() && $itemObj->checkPermission()) {
				$categoryObj = $itemObj->category();
				$item = array();
				$item = $itemObj->toArray();
				$item['who_when'] = sprintf(_MB_SSECTION_WHO_WHEN, $itemObj->posterName(), $itemObj->datesub());
				if ($i < $itemsCount) {
					$item['showline'] = true;
				} else {
					$item['showline'] = false;
				}
				$i++;
				$block['items'][] = $item;
			}
		}
	}

	if (isset($block['items']) && count($block['items'])==0) {
		return false;
	}

	$block['lang_reads'] = _MB_SSECTION_READS;
	$block['lang_comments'] = _MB_SSECTION_COMMENTS;
	$block['lang_readmore'] = _MB_SSECTION_READMORE;
	$block['display_whowhen_link'] = $opt_display_poster;
	$block['display_comment_link'] = $opt_display_comment;
	$block['display_type'] = $opt_display_type;

	return $block;
}

function smartsection_items_spot_edit($options)
{
	include_once XOOPS_ROOT_PATH . "/modules/smartsection/include/functions.php";

	$form  = "<table border='0'>";

	// Auto select last items
	$form .= "<tr><td>"._MB_SSECTION_AUTO_LAST_ITEMS."</td><td>";
	$chk   = "";
	if ($options[0] == 0) {
		$chk = " checked='checked'";
	}
	$form .= "<input type='radio' name='options[0]' value='0'".$chk." />"._NO."";
	$chk   = "";

	if ($options[0] == 1) {
		$chk = " checked='checked'";
	}
	$form .= "<input type='radio' name='options[0]' value='1'".$chk." />"._YES."</td></tr>";

	// Number of last items...
	$form .= "<tr><td>"._MB_SSECTION_LAST_ITEMS_COUNT."</td><td>";
	$form .= "<input type='text' name='options[1]' size='2' value='".$options[1]."' /></td></tr>";

	// Select 1 category
	$form .= "<tr><td>"._MB_SSECTION_SELECTCAT."</td><td>";
	$form .= "<select name='options[2]'> " . smartsection_createCategoryOptions($options[2]) . " /></td></tr>";

	// Items Select box
	// Creating the item handler object
	$criteria = new CriteriaCompo();
	$criteria->setSort('datesub');
	$criteria->setOrder('DESC');
	$itemsObj = $smartsection_item_handler->getSimpleItemsList($criteria);
	unset($criteria);

	if (empty($options[3]) || ($options[3] == 0)) {
		$sel_items = '0';
	} else {
		$sel_items = explode(',', $options[3]);
	}

	$form .= "<tr><td style='vertical-align: top;'>"._MB_SSECTION_SELECT_ITEMS."</td><td>";
	$form .= "<select size='10' name='options[3][]' multiple='multiple'>";

	if ($itemsObj) {
		foreach($itemsObj as $id => $title) {
			$sel = "";
			if ($sel_items == '0') {
				$sel = " selected='selected' ";
				$sel_items = '';
			} else {
				if ( !empty($sel_items) && ( in_array($id, $sel_items) )) {
					$sel = " selected='selected' ";
				}
			}
			$form .= "<option value='" . $id . "' ".$sel.">". $title ."</option>";
		}
	}

	$form .= "</select></td></tr>";

	// Display Who and When
	$form .= "<tr><td>"._MB_SSECTION_DISPLAY_WHO_AND_WHEN."</td><td>";
	$chk   = "";
	if ($options[4] == 0) {
		$chk = " checked='checked'";
	}
	$form .= "<input type='radio' name='options[4]' value='0'".$chk." />"._NO."";
	$chk   = "";
	if ($options[4] == 1) {
		$chk = " checked='checked'";
	}
	$form .= "<input type='radio' name='options[4]' value='1'".$chk." />"._YES."</td></tr>";

	// Display Comment(s)
	$form .= "<tr><td>"._MB_SSECTION_DISPLAY_COMMENTS."</td><td>";
	$chk   = "";
	if ($options[5] == 0) {
		$chk = " checked='checked'";
	}
	$form .= "<input type='radio' name='options[5]' value='0'".$chk." />"._NO."";
	$chk   = "";
	if ($options[5] == 1) {
		$chk = " checked='checked'";
	}
	$form .= "<input type='radio' name='options[5]' value='1'".$chk." />"._YES."</td></tr>";


	// Display type : block or bullets
	$form .= "<tr><td style='vertical-align: top;'>"._MB_SSECTION_DISPLAY_TYPE."</td><td>";
	$form .= "<select size='1' name='options[6]'>";

	$sel = "";
	if ($options[6] == 'block') {
		$sel = " selected='selected' ";
	}
	$form .= "<option value='block' ".$sel.">". _MB_SSECTION_DISPLAY_TYPE_BLOCK ."</option>";

	$sel = "";
	if ($options[6] == 'bullet') {
		$sel = " selected='selected' ";
	}
	$form .= "<option value='bullet' ".$sel.">". _MB_SSECTION_DISPLAY_TYPE_BULLET ."</option>";

	$form .= "</select></td></tr>";

	$form .= "</table>";
	return $form;
}
?>