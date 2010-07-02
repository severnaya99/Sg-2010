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

if (!defined('XOOPS_ROOT_PATH')){ exit(); }
defined("TAG_INI") || include dirname(__FILE__)."/vars.php";

function xoops_module_install_tag(&$module)
{
	return true;
}

function xoops_module_pre_install_tag(&$module)
{
	$mod_tables = $module->getInfo("tables");
	foreach($mod_tables as $table){
		$GLOBALS["xoopsDB"]->queryF("DROP TABLE IF EXISTS ".$GLOBALS["xoopsDB"]->prefix($table).";");
	}
	return true;
}

function xoops_module_pre_update_tag(&$module)
{
	return true;
}

function xoops_module_update_tag(&$module, $prev_version = null)
{
	load_functions("config");
	mod_clearConfg($module->getVar("dirname", "n"));
	
    if ($prev_version <= 150) {
        $GLOBALS['xoopsDB']->queryFromFile(XOOPS_ROOT_PATH."/modules/".$module->getVar("dirname")."/sql/mysql.150.sql");
    }
	
	/* Do some synchronization */
	mod_loadFunctions("recon", $module->getVar("dirname"));
	tag_synchronization();
	return true;
}
?>