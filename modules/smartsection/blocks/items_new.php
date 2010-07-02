<?php

/**
* $Id: items_new.php 1449 2008-04-06 05:10:14Z malanciault $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/
if (!defined("XOOPS_ROOT_PATH")) {
die("XOOPS root path not defined");
}

function smartsection_items_new_show ($options)
{
	include_once(XOOPS_ROOT_PATH."/modules/smartsection/include/common.php");

	$selectedcatids = explode(',', $options[0]);
	
	$block = array();
	if (in_array(0, $selectedcatids)) {
		$allcats = true;
	} else {
		$allcats = false;
	}

	$sort = $options[1];
	$order = smartsection_getOrderBy($sort);
	$limit = $options[2];

	$smartsection_item_handler =& smartsection_gethandler('item');

	// creating the ITEM objects that belong to the selected category
	if ($allcats) {
		$criteria=null;
	} else {
		$criteria = new CriteriaCompo();
		$criteria->add(new Criteria('categoryid', '(' . $options[0] . ')', 'IN'));
	}	
	$itemsObj = $smartsection_item_handler->getItems($limit, $start, array(_SSECTION_STATUS_PUBLISHED), -1, $sort, $order, '', true, $criteria, true);
	
	$totalitems = count($itemsObj);
	if ($itemsObj) {
		for ( $i = 0; $i < $totalitems; $i++ ) {
            $newitems = array();
            $newitems['link'] = $itemsObj[$i]->getItemLink(false, isset($options[3]) ? $options[3] : 65);
            $newitems['id'] = $itemsObj[$i]->itemid();
            $newitems['title'] = $itemsObj[$i]->title();
            if ($sort == "datesub") {
                $newitems['new'] = $itemsObj[$i]->datesub();
            } elseif ($sort == "counter") {
                $newitems['new'] = $itemsObj[$i]->counter();
            } elseif ($sort == "weight") {
                $newitems['new'] = $itemsObj[$i]->weight();
            }

			$block['newitems'][] = $newitems;
		}
	}

	return $block;
}

function smartsection_items_new_edit($options)
{
    global $xoopsDB, $xoopsModule, $xoopsUser;
	include_once(XOOPS_ROOT_PATH."/modules/smartsection/include/functions.php");

	$form .= '
	<table>
		<tr>
			<td style="vertical-align: top; width: 150px;">' . _MB_SSECTION_SELECTCAT . '</td>';
	$form .= '<td>';
	$form .= smartsection_createCategorySelect($options[0]) . '</td>';
		
    $form .= "<tr><td>" . _MB_SSECTION_ORDER . "</td>";
    $form .= "<td><select name='options[]'>";

    $form .= "<option value='datesub'";
    if ($options[1] == "datesub") {
        $form .= " selected='selected'";
    }
    $form .= ">" . _MB_SSECTION_DATE . "</option>";

    $form .= "<option value='counter'";
    if ($options[1] == "counter") {
        $form .= " selected='selected'";
    }
    $form .= ">" . _MB_SSECTION_HITS . "</option>";

    $form .= "<option value='weight'";
    if ($options[1] == "weight") {
        $form .= " selected='selected'";
    }
    $form .= ">" . _MB_SSECTION_WEIGHT . "</option>";

    $form .= "</select></td>";

    $form .= "</tr><tr><td>" . _MB_SSECTION_DISP . "</td><td><input type='text' name='options[]' value='" . $options[2] . "' />&nbsp;" . _MB_SSECTION_ITEMS . "</td></tr>";
    $form .= "<tr><td>" . _MB_SSECTION_CHARS . "</td><td><input type='text' name='options[]' value='" . $options[3] . "' />&nbsp;chars</td></tr>";
	$form .= "</table>";
    return $form;
}

?>