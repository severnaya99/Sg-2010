<?php
/**
 * Tag management for XOOPS
 *
 * @copyright	The XOOPS project http://www.xoops.org/
 * @license		http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author		Taiwen Jiang (phppp or D.J.) <php_pp@hotmail.com>
 * @since		1.00
 * @version		$Id$
 * @package		module::tag
 */

include("../../../include/cp_header.php");
require XOOPS_ROOT_PATH."/modules/".$xoopsModule->getVar("dirname")."/include/vars.php";
require_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->getVar("dirname")."/include/functions.php");
include_once(XOOPS_ROOT_PATH."/Frameworks/art/functions.admin.php");

// include the default language file for the admin interface
if(!@include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->getVar("dirname")."/language/" . $xoopsConfig['language'] . "/main.php")){
    include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->getVar("dirname")."/language/english/main.php");
}

$myts =& MyTextSanitizer::getInstance();
?>