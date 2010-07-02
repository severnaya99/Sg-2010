<?php

/**
* $Id: date_to_date.php 331 2007-12-23 16:01:11Z malanciault $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/
if (!defined("XOOPS_ROOT_PATH")) {
die("XOOPS root path not defined");
}

function smartsection_date_to_date_show($options)
{
	include_once(XOOPS_ROOT_PATH."/modules/smartsection/include/common.php");

	$myts = &MyTextSanitizer::getInstance();

   	$smartModule =& smartsection_getModuleInfo();

	$block = array();
	$fromArray = explode('/', $options[0]);
	//month, day, year
	$fromStamp = mktime(0,0,0,$fromArray[0], $fromArray[1], $fromArray[2]);
	$untilArray = explode('/', $options[1]);
	$untilStamp = mktime(0,0,0,$untilArray[0], $untilArray[1], $untilArray[2]);

	$criteria = new CriteriaCompo();
	$criteria->add(new Criteria('datesub', $fromStamp, '>'));
	$criteria->add(new Criteria('datesub', $untilStamp, '<'));
	$criteria->setSort('datesub');
	$criteria->setOrder('DESC');



	$smartsection_item_handler =& smartsection_gethandler('item');
	// creating the ITEM objects that belong to the selected category
	$itemsObj = $smartsection_item_handler->getObjects($criteria);
	$totalItems = count($itemsObj);

	if ($itemsObj) {
		for ( $i = 0; $i < $totalItems; $i++ ) {

			$newItems['itemid'] = $itemsObj[$i]->itemid();
			$newItems['title'] = $itemsObj[$i]->title();
			$newItems['categoryname'] = $itemsObj[$i]->getCategoryName();
			$newItems['categoryid'] = $itemsObj[$i]->categoryid();
			$newItems['date'] = $itemsObj[$i]->datesub();
			$newItems['poster'] = xoops_getLinkedUnameFromId($itemsObj[$i]->uid());
			$newItems['itemlink'] = $itemsObj[$i]->getItemLink(false, isset($options[3]) ? $options[3] : 65);
			$newItems['categorylink'] = $itemsObj[$i]->getCategoryLink();

			$block['items'][] = $newItems;
		}

		$block['lang_title'] = _MB_SSECTION_ITEMS;
		$block['lang_category'] = _MB_SSECTION_CATEGORY;
		$block['lang_poster'] = _MB_SSECTION_POSTEDBY;
		$block['lang_date'] = _MB_SSECTION_DATE;
		$modulename = $myts->makeTboxData4Show($smartModule->getVar('name'));
		$block['lang_visitItem'] = _MB_SSECTION_VISITITEM . " " . $modulename;
		$block['lang_articles_from_to'] = sprintf(_MB_SSECTION_ARTICLES_FROM_TO, $options[0], $options[1]);
	}

	return $block;
}

function smartsection_date_to_date_edit($options)
{
	include_once(XOOPS_ROOT_PATH."/modules/smartsection/include/functions.php");
	$form =  _MB_SSECTION_FROM . "<input type='text' name='options[]' value='" . $options[0] . "' />&nbsp;<br />";
    $form .= _MB_SSECTION_UNTIL . "&nbsp;<input type='text' name='options[]' value='" . $options[1] . "' /><br/>"._MB_SSECTION_DATE_FORMAT;

return $form;
}

?>