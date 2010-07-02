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

define("_MB_SSECTION_ALLCAT", "Όλες οι κατηγορίες");
define("_MB_SSECTION_AUTO_LAST_ITEMS", "Να εμφανίζονται αυτόματα τα τελευταία αντικείμενα?");
define("_MB_SSECTION_CATEGORY", "Κατηγορία");
define("_MB_SSECTION_CHARS", "Μήκος του τίτλου");
define("_MB_SSECTION_COMMENTS", "Σχόλια");
define("_MB_SSECTION_DATE", "Ημερομηνία δημοσίευσης");
define("_MB_SSECTION_DISP", "Εμφάνιση");
define("_MB_SSECTION_DISPLAY_CATEGORY", "Εμφάνιση του τίτλου της κατηγορίας;");
define("_MB_SSECTION_DISPLAY_COMMENTS", "Εμφάνιση του αριθμού των σχολίων;");
define("_MB_SSECTION_DISPLAY_TYPE", "Τύπος εμφάνισης : ");
define("_MB_SSECTION_DISPLAY_TYPE_BLOCK", "Κάθε αντικείμενο να είναι block");
define("_MB_SSECTION_DISPLAY_TYPE_BULLET", "Κάθε αντικείμενο να είναι κουκκίδα");
define("_MB_SSECTION_DISPLAY_WHO_AND_WHEN", "Εμφάνιση του αποστολέα και της ημερομηνίας;");
define("_MB_SSECTION_FULLITEM", "Διαβάστε όλο το άρθρο");
define("_MB_SSECTION_HITS", "Αριθμός εμφανίσεων");
define("_MB_SSECTION_ITEMS", "Άρθρα");
define("_MB_SSECTION_LAST_ITEMS_COUNT", "Αν ναι, πόσα αντικείμενα να εμφανίζονται;");
define("_MB_SSECTION_LENGTH", " χαρακτήρες");
define("_MB_SSECTION_ORDER", "Σειρά εμφάνισης");
define("_MB_SSECTION_POSTEDBY", "Δημοσιεύτηκε από τον");
define("_MB_SSECTION_READMORE", "Διαβάστε περισσότερα...");
define("_MB_SSECTION_READS", "αναγνώσεις");
define("_MB_SSECTION_SELECT_ITEMS", "Αν όχι, επιλέξτε ποια άρθρα να εμφανίζονται :");
define("_MB_SSECTION_SELECTCAT", "Εμφάνιση των άρθρων της κατηγορίας :");
define("_MB_SSECTION_VISITITEM", "Επισκευθείτε τον");
define("_MB_SSECTION_WEIGHT", "Εμφάνιση κατά βάρος");
define("_MB_SSECTION_WHO_WHEN", "Δημοσιεύτηκε από τον %s στις %s");
?>