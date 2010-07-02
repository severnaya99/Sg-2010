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

// plugin guide:
/* 
 * Add customized configs, variables or functions
 */
$customConfig = array();

/* 
 * Due to the difference of word boundary for different languages, delimiters also depend on languages
 * You need specify all possbile deimiters:
 * IF $GLOBALS["tag_delimiter"] IS SET IN /modules/tag/language/mylanguage/main.php, TAKE IT
 * ELSE IF $customConfig["tag_delimiter"] IS SET BELOW, TAKE IT
 * ELSE TAKE (",", ";", " ", "|")
 *
 * Tips:
 * For English sites, you can set as array(",", ";", " ", "|")
 * For Chinese sites, you can set as array(",", ";", " ", "|", "гм")
 *
 * TODO: there shall be an option for admin to choose a category to store subcategories and articles
 */
$customConfig["tag_delimiter"] = array(",", " ", "|", ";");

$customConfig["limit_tag"]	= 100;
$customConfig["font_max"]	= 150;
$customConfig["font_min"]	= 80;

return $customConfig;
?>