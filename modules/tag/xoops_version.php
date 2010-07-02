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

$modversion["name"]			= TAG_MI_NAME;
$modversion["version"]		= 1.60;
$modversion["description"]	= TAG_MI_DESC;
$modversion["image"]		= "images/logo.gif";
$modversion["dirname"]		= "tag";
$modversion["author"]		= "Taiwen Jiang (D.J. or phppp, http://www.xoops.org, http://xoops.org.cn)";

// database tables
$modversion["sqlfile"]["mysql"] = "sql/mysql.sql";
$modversion["tables"] = array(
	"tag_tag",
	"tag_link",
	"tag_stats",
);

// Admin things
$modversion["hasAdmin"] = 1;
$modversion["adminindex"] = "admin/index.php";
$modversion["adminmenu"] = "admin/menu.php";

// Menu
$modversion["hasMain"] = 1;

$modversion["onInstall"] = "include/action.module.php";
$modversion["onUpdate"] = "include/action.module.php";

// Use smarty
$modversion["use_smarty"] = 1;

/**
* Templates
*/
$modversion['templates']	= array();
$modversion['templates'][1]	= array(
	'file'			=> 'tag_index.html',
	'description'	=> 'Index page of tag module'
	);
$modversion['templates'][]	= array(
	'file'			=> 'tag_list.html',
	'description'	=> 'List of tags'
	);
$modversion['templates'][]	= array(
	'file'			=> 'tag_view.html',
	'description'	=> 'Links of a tag'
	);
$modversion['templates'][]	= array(
	'file'			=> 'tag_bar.html',
	'description'	=> 'Tag list in an item'
	);

// Blocks
$modversion['blocks']	= array();

/*
 * $options:  
 *					$options[0] - number of tags to display
 *					$options[1] - max font size (px or %)
 *					$options[2] - min font size (px or %)
 */
$modversion["blocks"][1]	= array(
	"file"			=> "block.php",
	"name"			=> TAG_MI_BLOCK_CLOUD,
	"description"	=> TAG_MI_BLOCK_CLOUD_DESC,
	"show_func"		=> "tag_block_cloud_show",
	"edit_func"		=> "tag_block_cloud_edit",
	"options"		=> "100|0|150|80",
	"template"		=> "tag_block_cloud.html",
	);

/*
 * $options:  
 *					$options[0] - number of tags to display
 *					$options[1] - time duration, in days, 0 for all the time
 *					$options[2] - sort: a - alphabet; c - count; t - time
 */
$modversion["blocks"][]	= array(
	"file"			=> "block.php",
	"name"			=> TAG_MI_BLOCK_TOP,
	"description"	=> TAG_MI_BLOCK_TOP_DESC,
	"show_func"		=> "tag_block_top_show",
	"edit_func"		=> "tag_block_top_edit",
	"options"		=> "50|30|a",
	"template"		=> "tag_block_top.html",
	);

// Search
$modversion["hasSearch"] = 1;
$modversion['search']['file'] = "include/search.inc.php";
$modversion['search']['func'] = "tag_search";

// Comments
$modversion["hasComments"] = 0;

// Configs
$modversion["config"] = array();
	
$modversion["config"][1] = array(
	"name" 			=> "do_urw",
	"title" 		=> "TAG_MI_DOURLREWRITE",
	"description" 	=> "TAG_MI_DOURLREWRITE_DESC",
	"formtype" 		=> "yesno",
	"valuetype" 	=> "int",
	"default" 		=> in_array(php_sapi_name(), array("apache", "apache2handler")),
	);

$modversion["config"][] = array(
	"name" 			=> "items_perpage",
	"title" 		=> "TAG_MI_ITEMSPERPAGE",
	"description" 	=> "TAG_MI_ITEMSPERPAGE_DESC",
	"formtype" 		=> "textbox",
	"valuetype" 	=> "int",
	"default" 		=> 10
	);


// Notification

$modversion["hasNotification"] = 0;
$modversion["notification"] = array();
?>