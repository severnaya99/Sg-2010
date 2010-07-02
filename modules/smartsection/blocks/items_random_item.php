<?php

/**
* $Id: items_random_item.php 331 2007-12-23 16:01:11Z malanciault $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/
if (!defined("XOOPS_ROOT_PATH")) {
die("XOOPS root path not defined");
}

function smartsection_items_random_item_show($options)
{
	include_once(XOOPS_ROOT_PATH."/modules/smartsection/include/common.php");

    $block = array();
	$smartsection_item_handler =& smartsection_gethandler('item');
    // creating the ITEM object
    $itemsObj = $smartsection_item_handler->getRandomItem('summary', array(_SSECTION_STATUS_PUBLISHED));

    if ($itemsObj) {
       	$block['content'] = $itemsObj->summary();
       	$block['id'] = $itemsObj->itemid();
       	$block['url'] = $itemsObj->getItemUrl();
       	$block['lang_fullitem'] = _MB_SSECTION_FULLITEM;
    }

    return $block;
}

?>