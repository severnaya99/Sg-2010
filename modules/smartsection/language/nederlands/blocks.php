<?php

/**
* $Id: blocks.php 331 2007-12-23 16:01:11Z malanciault $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Dutch translation: Maurits Lamers <maurits@weidestraat.nl>
* License: GNU
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

define("_MB_SSECTION_ALLCAT", "Alle categorieën");
define("_MB_SSECTION_AUTO_LAST_ITEMS", "Automatisch laten zien van meest recente item(s)?");
define("_MB_SSECTION_CATEGORY", "Categorie");
define("_MB_SSECTION_CHARS", "Lengte van de titel");
define("_MB_SSECTION_COMMENTS", "Commentaar");
define("_MB_SSECTION_DATE", "Datum van Publicatie");
define("_MB_SSECTION_DISP", "Weergave");
define("_MB_SSECTION_DISPLAY_CATEGORY", "Categorienaam laten zien?");
define("_MB_SSECTION_DISPLAY_COMMENTS", "Hoeveelheid commentaar laten zien?");
define("_MB_SSECTION_DISPLAY_TYPE", "Weergave-type :");
define("_MB_SSECTION_DISPLAY_TYPE_BLOCK", "Elk item is een blok");
define("_MB_SSECTION_DISPLAY_TYPE_BULLET", "Elk item is een lijst item (bullet)");
define("_MB_SSECTION_DISPLAY_WHO_AND_WHEN", "De afzender en datum laten zien?");
define("_MB_SSECTION_FULLITEM", "Het hele artikel lezen");
define("_MB_SSECTION_HITS", "Aantal keer gelezen (Number of hits)");
define("_MB_SSECTION_ITEMS", "Artikelen");
define("_MB_SSECTION_LAST_ITEMS_COUNT", "Indien ja, hoeveel items weergeven?");
define("_MB_SSECTION_LENGTH", " karakters");
define("_MB_SSECTION_ORDER", "Weergavevolgorde");
define("_MB_SSECTION_POSTEDBY", "Gepubliceerd door");
define("_MB_SSECTION_READMORE", "Lees meer...");
define("_MB_SSECTION_READS", "keer gelezen");
define("_MB_SSECTION_SELECT_ITEMS", "Indien nee, kies de artikelen om te laten zien :");
define("_MB_SSECTION_SELECTCAT", "Laat de artikelen zien van :");
define("_MB_SSECTION_VISITITEM", "Bezoek de");
define("_MB_SSECTION_WEIGHT", "Sorteer op gewicht");
define("_MB_SSECTION_WHO_WHEN", "Gepubliceerd door %s op %s");

//bd tree block hack
define("_MB_SSECTION_LEVELS", "niveau's");
define("_MB_SSECTION_CURRENTCATEGORY", "Huidige Categorie");
define("_MB_SSECTION_ASC", "Opl");
define("_MB_SSECTION_DESC", "Afl");
define("_MB_SSECTION_SHOWITEMS", "Toon Items");
//--/bd
?>
