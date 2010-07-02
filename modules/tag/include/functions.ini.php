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

/*

The functions loaded on initializtion
*/

if (!defined('XOOPS_ROOT_PATH')){ exit(); }
if (!defined('TAG_INI')){ exit(); }

if(!defined("TAG_FUNCTIONS_INI")):
define("TAG_FUNCTIONS_INI", 1);

function &tag_load_config()
{
	static $moduleConfig;
	if(isset($moduleConfig)){
		return $moduleConfig;
	}
	load_functions("config");
	$moduleConfig = mod_loadConfg("tag");
	
    return $moduleConfig;
}

function tag_define_url_delimiter()
{
	if(defined("URL_DELIMITER")){
		if(!in_array(URL_DELIMITER, array("?","/"))) die("Exit on security");
	}else{
		$moduleConfig = tag_load_config();
		if(empty($moduleConfig["do_urw"])){
			define("URL_DELIMITER", "?");
		}else{
			define("URL_DELIMITER", "/");
		}
	}
}

function tag_get_delimiter()
{
	if(!@include XOOPS_ROOT_PATH."/modules/tag/language/".$GLOBALS["xoopsConfig"]["language"]."/config.php") {
		@include XOOPS_ROOT_PATH."/modules/tag/language/english/config.php";
	}
	if(!empty($GLOBALS["tag_delimiter"])) return $GLOBALS["tag_delimiter"];
	$moduleConfig = tag_load_config();
	if(!empty($moduleConfig["tag_delimiter"])) return $moduleConfig["tag_delimiter"];
	return array(",", " ", "|", ";");
}

endif;
?>