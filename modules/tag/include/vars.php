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

if(!defined("TAG_INI")) define("TAG_INI",1);

include_once(XOOPS_ROOT_PATH."/Frameworks/art/functions.ini.php");
require_once(XOOPS_ROOT_PATH."/modules/tag/include/functions.ini.php");

// include customized variables
if( is_object($GLOBALS["xoopsModule"]) && "tag" == $GLOBALS["xoopsModule"]->getVar("dirname", "n") ) {
	$GLOBALS["xoopsModuleConfig"] = tag_load_config();
}

load_object();
?>