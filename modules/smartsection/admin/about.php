<?php

/**
* $Id: about.php 3441 2008-07-05 11:44:44Z malanciault $
* Module: SmartPartner
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/
//
include_once("admin_header.php");

include_once(SMARTOBJECT_ROOT_PATH . "class/smartobjectabout.php");
smart_loadCommonLanguageFile();

$aboutObj = new SmartobjectAbout();
$aboutObj->render();


?>