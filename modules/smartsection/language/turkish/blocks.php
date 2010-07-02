<?php

/**
* $Id: blocks.php 331 2007-12-23 16:01:11Z malanciault $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

/*global $xoopsConfig, $xoopsModule, $xoopsModuleConfig;
if (isset($xoopsModuleConfig) && isset($xoopsModule) && $xoopsModule->getVar('dirname') == 'smartsection') {
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

define("_MB_SSECTION_ALLCAT", "Bütün Kategoriler");
define("_MB_SSECTION_AUTO_LAST_ITEMS", "Son eklenenleri otomatik göster)?");
define("_MB_SSECTION_CATEGORY", "Kategori");
define("_MB_SSECTION_CHARS", "Baþlýk Uzunluðu");
define("_MB_SSECTION_COMMENTS", "Komutlar");
define("_MB_SSECTION_DATE", "Yayýnlama Tarihi");
define("_MB_SSECTION_DISP", "Display");
define("_MB_SSECTION_DISPLAY_CATEGORY", "Kategori Ýsmini Göster?");
define("_MB_SSECTION_DISPLAY_COMMENTS", "Display comment count?");
define("_MB_SSECTION_DISPLAY_TYPE", "Görünüm Tipi :");
define("_MB_SSECTION_DISPLAY_TYPE_BLOCK", "Herbiri bir kategoridir");
define("_MB_SSECTION_DISPLAY_TYPE_BULLET", "Each item is a bullet");
define("_MB_SSECTION_DISPLAY_WHO_AND_WHEN", "Afiþ ve Tarihi göster?");
define("_MB_SSECTION_FULLITEM", "Devamý...");
define("_MB_SSECTION_HITS", "Okunma Sayýsý");
define("_MB_SSECTION_ITEMS", "Makaleler");
define("_MB_SSECTION_LAST_ITEMS_COUNT", "'Evet' seçilirse, how many items to display?");
define("_MB_SSECTION_LENGTH", " karakterler");
define("_MB_SSECTION_ORDER", "Display order");
define("_MB_SSECTION_POSTEDBY", "Yayýnlayan");
define("_MB_SSECTION_READMORE", "Devamý...");
define("_MB_SSECTION_READS", "okumalar");
define("_MB_SSECTION_SELECT_ITEMS", "'Hayýr' seçilirse, select the articles to be displayed :");
define("_MB_SSECTION_SELECTCAT", "Display the articles of :");
define("_MB_SSECTION_VISITITEM", "Ziyaret et");
define("_MB_SSECTION_WEIGHT", "Liste geniþliði");
define("_MB_SSECTION_WHO_WHEN", "Yayýnlayan %s %s");
//bd tree block hack
define("_MB_SSECTION_LEVELS", "seviyeler");
define("_MB_SSECTION_CURRENTCATEGORY", "Mevcut Kategori");
define("_MB_SSECTION_ASC", "ASC");
define("_MB_SSECTION_DESC", "DESC");
define("_MB_SSECTION_SHOWITEMS", "Öðeleri Göster");
//--/bd
?>