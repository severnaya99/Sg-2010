<?php

/**
* $Id: blocks.php,v 1.11 2005/10/31 13:18:45 malanciault Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
* Translated by irxoops.org till 2.13 & updated and edited in 2.13 by stranger <www.impresscms.ir>
*/

/*global $xoopsConfig, $xoopsModule, $xoopsModuleConfig;
If (isset($xoopsModuleConfig) && isset($xoopsModule) && $xoopsModule->getVar('dirname') == 'smartsection') {
	$itemType = $xoopsModuleConfig['itemtype'];
} else {
	$hModule = &xoops_gethandler('module');
	$hModConfig = &xoops_gethandler('config');
	if ($smartsection_Module = &$hModule->getByDirname('smartsection')) {
		$module_id = $smartsection_Module->getVar('mid');
		$smartsection_Config = &$hModConfig->getConfigsByCat(0, $smartsection_Module->getVar('mid'));
		$itemType = $smartsection_Config['itemtype'];
	} else {
		$itemType = 'article';
	}	
}

include_once(XOOPS_ROOT_PATH . "/modules/smartsection/language/" . $xoopsConfig['language'] . "/plugin/" . $itemType . "/blocks.php");
*/
// Blocks

define("_MB_SSECTION_ALLCAT", "تمام بخش‌ها");
define("_MB_SSECTION_AUTO_LAST_ITEMS", "نمایش خودكار آخرین مقالات؟");
define("_MB_SSECTION_CATEGORY", "بخش");
define("_MB_SSECTION_CHARS", "طول عنوان");
define("_MB_SSECTION_COMMENTS", "توضیحات");
define("_MB_SSECTION_DATE", "تاریخ انتشار");
define("_MB_SSECTION_DISP", "نمایش");
define("_MB_SSECTION_DISPLAY_CATEGORY", "نمایش اسم بخش؟");
define("_MB_SSECTION_DISPLAY_COMMENTS", "نمایش تعداد نظر ها؟");
define("_MB_SSECTION_DISPLAY_TYPE", "نمایش نوع :");
define("_MB_SSECTION_DISPLAY_TYPE_BLOCK", "کدام قسمت مسدود است؟");
define("_MB_SSECTION_DISPLAY_TYPE_BULLET", "هر عنوان مانند یک گلوله است");
define("_MB_SSECTION_DISPLAY_WHO_AND_WHEN", "نمایش آگهی و تاریخ?");
define("_MB_SSECTION_FULLITEM", "خواندن متن کامل مقاله");
define("_MB_SSECTION_HITS", "تعداد بازدید ها");
define("_MB_SSECTION_ITEMS", "مقالات");
define("_MB_SSECTION_LAST_ITEMS_COUNT", "اگر بله, چند مقاله نمایش داده شود؟");
define("_MB_SSECTION_LENGTH", " ویژگیها");
define("_MB_SSECTION_ORDER", "نوع چینش نمایش");
define("_MB_SSECTION_POSTEDBY", "منتشر شده توسط");
define("_MB_SSECTION_READMORE", "ادامه دارد ...");
define("_MB_SSECTION_READS", "خوانده ها");
define("_MB_SSECTION_SELECT_ITEMS", "اگر نه، مقالاتی را كه باید نمایش داده شوند انتخاب كنید :");
define("_MB_SSECTION_SELECTCAT", "نمایش مقالات:");
define("_MB_SSECTION_VISITITEM", "دیدن کردن از");
define("_MB_SSECTION_WEIGHT", "لیست شده با وزن");
define("_MB_SSECTION_WHO_WHEN", "منتشر شده توسط %s در %s");
//bd tree block hack
define("_MB_SSECTION_LEVELS", "سطوح");
define("_MB_SSECTION_CURRENTCATEGORY", "شاخه فعلی");
define("_MB_SSECTION_ASC", "صعودی");
define("_MB_SSECTION_DESC", "نزولی");
define("_MB_SSECTION_SHOWITEMS", "موارد را نشان بده");
//--/bd

define("_MB_SSECTION_FILES", "پرونده ها");
define("_MB_SSECTION_DIRECTDOWNLOAD", "لینک مستقیم به پرونده ها به جای لینک به مقالات؟");
define("_MB_SSECTION_FROM", "انتخاب مقالات <br />از ");
define("_MB_SSECTION_UNTIL", "&nbsp;&nbsp;تا");
define("_MB_SSECTION_DATE_FORMAT", "نوع تاریخ باید بر اساس mm/dd/yyyy باشد");
define("_MB_SSECTION_ARTICLES_FROM_TO", "مقالات منتشر شده از تاریخ %s تا %s");
?>