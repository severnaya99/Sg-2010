<?php

/**
* $Id: header.php 331 2007-12-23 16:01:11Z malanciault $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

include_once "../../mainfile.php";

if( !defined("SMARTSECTION_DIRNAME") ){
	define("SMARTSECTION_DIRNAME", 'smartsection');
}

include_once XOOPS_ROOT_PATH.'/modules/' . SMARTSECTION_DIRNAME . '/include/common.php';

include_once XOOPS_ROOT_PATH."/class/pagenav.php";
$myts = MyTextSanitizer::getInstance();

?>