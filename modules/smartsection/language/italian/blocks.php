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

define("_MB_SSECTION_ALLCAT", "Tutte le categorie");
define("_MB_SSECTION_AUTO_LAST_ITEMS", "Mostra automaticamente l'ultimo - o gli ultimi - elementi?");
define("_MB_SSECTION_CATEGORY", "Categoria");
define("_MB_SSECTION_CHARS", "Lunghezza del titolo");
define("_MB_SSECTION_COMMENTS", "Commenti");
define("_MB_SSECTION_DATE", "Data di pubblicazione");
define("_MB_SSECTION_DISP", "Mostra");
define("_MB_SSECTION_DISPLAY_CATEGORY", "Mostra il nome della categoria?");
define("_MB_SSECTION_DISPLAY_COMMENTS", "Mostra il contatore dei commenti?");
define("_MB_SSECTION_DISPLAY_TYPE", "Modalità di visualizzazione:");
define("_MB_SSECTION_DISPLAY_TYPE_BLOCK", "Ogni elemento come blocco");
define("_MB_SSECTION_DISPLAY_TYPE_BULLET", "Ogni elemento come lista");
define("_MB_SSECTION_DISPLAY_WHO_AND_WHEN", "Mostra Autore e Data?");
define("_MB_SSECTION_FULLITEM", "Leggi l'articolo completo");
define("_MB_SSECTION_HITS", "Numero di letture");
define("_MB_SSECTION_ITEMS", "Articoli");
define("_MB_SSECTION_LAST_ITEMS_COUNT", "Se si, quanti?");
define("_MB_SSECTION_LENGTH", " caratteri");
define("_MB_SSECTION_ORDER", "Mostra ordine");
define("_MB_SSECTION_POSTEDBY", "Pubblicato da");
define("_MB_SSECTION_READMORE", "Leggi tutto..");
define("_MB_SSECTION_READS", "letture");
define("_MB_SSECTION_SELECT_ITEMS", "Se no, seleziona gli articoli da mostrare:");
define("_MB_SSECTION_SELECTCAT", "Mostra gli articoli di:");
define("_MB_SSECTION_VISITITEM", "Visita il");
define("_MB_SSECTION_WEIGHT", "Elenca in base al peso");
define("_MB_SSECTION_WHO_WHEN", "Pubblicato da %s il %s");
?>