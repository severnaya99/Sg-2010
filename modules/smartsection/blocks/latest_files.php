<?php

/**
* $Id: latest_files.php 331 2007-12-23 16:01:11Z malanciault $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/
if (!defined("XOOPS_ROOT_PATH")) {
die("XOOPS root path not defined");
}

function smartsection_latest_files_show ($options)
{
	include_once(XOOPS_ROOT_PATH."/modules/smartsection/include/common.php");

	/**
	 * $options[0] : Sort order - datesub | counter
	 * $options[1] : Number of files to display
	 * $oprions[2] : bool TRUE to link to the file download, FALSE to link to the article
	 */

	$block = array();

	$sort = $options[0];
	$order = smartsection_getOrderBy($sort);
	$limit = $options[1];
	$directDownload = $options[2];

	$smartsection_file_handler =& smartsection_gethandler('file', 'smartsection');

	// creating the files objects
	$filesObj = $smartsection_file_handler->getAllFiles(0, _SSECTION_STATUS_FILE_ACTIVE, $limit, 0, $sort, $order);
	foreach ($filesObj as $fileObj) {
        $aFile = array();
        $aFile['link'] = $directDownload ? $fileObj->getFileLink() : $fileObj->getItemLink();
        if ($sort == "datesub") {
            $aFile['new'] = $fileObj->datesub();
        } elseif ($sort == "counter") {
            $aFile['new'] = $fileObj->counter();
        } elseif ($sort == "weight") {
            $aFile['new'] = $fileObj->weight();
        }
		$block['files'][] = $aFile;
	}

	return $block;
}

function smartsection_latest_files_edit($options)
{
	include_once(XOOPS_ROOT_PATH."/modules/smartsection/include/functions.php");

    $form = "" . _MB_SSECTION_ORDER . "&nbsp;<select name='options[]'>";

    $form .= "<option value='datesub'";
    if ($options[0] == "datesub") {
        $form .= " selected='selected'";
    }
    $form .= ">" . _MB_SSECTION_DATE . "</option>\n";

    $form .= "<option value='counter'";
    if ($options[0] == "counter") {
        $form .= " selected='selected'";
    }
    $form .= ">" . _MB_SSECTION_HITS . "</option>\n";

    $form .= "</select>\n";

    $form .= "&nbsp;" . _MB_SSECTION_DISP . "&nbsp;<input type='text' name='options[]' value='" . $options[1] . "' />&nbsp;" . _MB_SSECTION_FILES . "";

	$yesChecked = $options[2] == true ? "checked='checked'" : '';
	$noChecked = $options[2] == false ? "checked='checked'" : '';

	$form .= "<br />" . _MB_SSECTION_DIRECTDOWNLOAD . "&nbsp;<input name='options[2]' value='1' type='radio' $yesChecked/>&nbsp;" . _YES . "<input name='options[2]' value='0' type='radio' $noChecked/>" . _NO;
    return $form;
}

?>