<?php
/**
 * Tag management
 *
 * @copyright	The XOOPS project http://www.xoops.org/
 * @license		http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author		Taiwen Jiang (phppp or D.J.) <php_pp@hotmail.com>
 * @since		1.00
 * @version		$Id$
 * @package		module::tag
 */

if (!defined('XOOPS_ROOT_PATH')){ exit(); }
include XOOPS_ROOT_PATH . "/modules/tag/include/vars.php";
include_once(XOOPS_ROOT_PATH . "/modules/tag/include/functions.php");

if(function_exists("xoops_load_lang_file")){
	xoops_load_lang_file("blocks", "tag");
}else{
	$path = XOOPS_ROOT_PATH . "/modules/tag/language";
	$language = preg_replace("/[^a-z0-9_\-]/i", "", $GLOBALS['xoopsConfig']['language']);
	if ( !@include_once( "{$path}/{$language}/blocks.php" ) )  {
		$ret = @include_once( "{$path}/english/blocks.php" );
	}
}

/**#@+
 * Function to display tag cloud
 *
 * Developer guide:
 * <ul>
 *	<li>Build your tag_block_cloud_show function, for example newbb_block_tag_cloud_show;</li>
 *	<li>Call the tag_block_cloud_show in your defined block function:<br />
 *		<code>
 *			function newbb_block_tag_cloud_show($options) {
 *				$catid		= $options[4];	// Not used by newbb, Only for demonstration 
 *				if(!@include_once XOOPS_ROOT_PATH."/modules/tag/blocks/block.php"){
 *					return null; 
 *				} 
 *				$block_content = tag_block_cloud_show($options, "newbb", $catid);
 *				return $block_content;
 *			}
 *		</code>
 *	</li>
 *	<li>Build your tag_block_cloud_edit function, for example newbb_block_tag_cloud_edit;</li>
 *	<li>Call the tag_block_cloud_edit in your defined block function:<br />
 *		<code>
 *			function newbb_block_tag_cloud_edit($options) {
 *				if(!@include_once XOOPS_ROOT_PATH."/modules/tag/blocks/block.php"){
 *					return null; 
 *				} 
 *				$form = tag_block_cloud_edit($options);
 *				$form .= $CODE_FOR_GET_CATID;	// Not used by newbb, Only for demonstration 
 *				return $form;
 *			}
 *		</code>
 *	</li>
 *	<li>Create your tag_block_cloud template, for example newbb_block_tag_cloud.html;</li>
 *	<li>Include tag_block_cloud template in your created block template:<br />
 *		<code>
 *			<{include file="db:tag_block_cloud.html"}>
 *		</code>
 *	</li>
 * </ul>
 *
 * {@link TagTag} 
 *
 * @param	array 	$options:  
 *					$options[0] - number of tags to display
 *					$options[1] - time duration, in days, 0 for all the time
 *					$options[2] - max font size (px or %)
 *					$options[3] - min font size (px or %)
 */
function tag_block_cloud_show( $options, $dirname = "", $catid = 0 )
{
    global $xoopsDB;

    if(empty($dirname)){
	    $modid = 0;
    }elseif(isset($GLOBALS["xoopsModule"]) && is_object($GLOBALS["xoopsModule"]) && $GLOBALS["xoopsModule"]->getVar("dirname") == $dirname){
	    $modid = $GLOBALS["xoopsModule"]->getVar("mid");
    }else{
		$module_handler =& xoops_gethandler("module");
		$module = $module_handler->getByDirname($dirname);
	    $modid = $module->getVar("mid");
    }
    
	$block = array();
	$tag_handler =& xoops_getmodulehandler("tag", "tag");
	tag_define_url_delimiter();
	
	$criteria = new CriteriaCompo();
	$criteria->setSort("count");
	$criteria->setOrder("DESC");
	$criteria->setLimit($options[0]);
	$criteria->add( new Criteria("o.tag_status", 0) );
	if(!empty($modid)){
		$criteria->add( new Criteria("l.tag_modid", $modid) );
		if($catid >= 0){
			$criteria->add( new Criteria("l.tag_catid", $catid) );
		}
	}
	if(!$tags = $tag_handler->getByLimit($criteria, empty($options[1]))){
		return $block;
	}
	
	$count_max = 0;
	$count_min = 0;
	$tags_term = array();
	foreach(array_keys($tags) as $key){
		if($tags[$key]["count"] > $count_max) $count_max = $tags[$key]["count"];
		if($tags[$key]["count"] < $count_min || $count_min == 0) $count_min = $tags[$key]["count"];
		$tags_term[] = strtolower($tags[$key]["term"]);
	}
	$count_interval = $count_max - $count_min;
	
	$font_max = $options[2];
	$font_min = $options[3];
	$font_ratio = ($count_interval) ? ($font_max - $font_min) / $count_interval : 1;
	array_multisort($tags_term, SORT_ASC, $tags);
	
	$tags_data = array();
	foreach(array_keys($tags) as $key) {
		$tags_data[] = array(
						"id"	=> $tags[$key]["id"],
						"level"	=> ($count_interval) ? ($tags[$key]["count"] - $count_min) * $font_ratio + $font_min : 100,
						"term"	=> $tags[$key]["term"],
						"count"	=> $tags[$key]["count"],
						);
	}
	unset($tags, $tags_term);
	
	$block["tags"] =& $tags_data;
	$block["tag_dirname"] = "tag";
	if(!empty($modid)){
		$module_handler =& xoops_gethandler('module');
		if($module_obj =& $module_handler->get($modid)){
			$block["tag_dirname"] = $module_obj->getVar("dirname");
		}
	}
    return $block;
}

function tag_block_cloud_edit($options)
{
    $form  =	TAG_MB_ITEMS.":&nbsp;&nbsp;<input type=\"text\" name=\"options[0]\" value=\"" . $options[0] . "\" /><br />";
    $form .=	TAG_MB_TIME_DURATION.":&nbsp;&nbsp;<input type=\"text\" name=\"options[1]\" value=\"" . $options[1] . "\" /><br />";
    $form .=	TAG_MB_FONTSIZE_MAX.":&nbsp;&nbsp;<input type=\"text\" name=\"options[2]\" value=\"" . $options[2] . "\" /><br />";
    $form .=	TAG_MB_FONTSIZE_MIN.":&nbsp;&nbsp;<input type=\"text\" name=\"options[3]\" value=\"" . $options[3] . "\" /><br />";
    
    return $form;
}


/**#@+
 * Function to display top tag list
 *
 * Developer guide:
 * <ul>
 *	<li>Build your tag_block_top_show function, for example newbb_block_tag_top_show;</li>
 *	<li>Call the tag_block_top_show in your defined block function:<br />
 *		<code>
 *			function newbb_block_tag_top_show($options) {
 *				$catid		= $options[3];	// Not used by newbb, Only for demonstration 
 *				if(!@include_once XOOPS_ROOT_PATH."/modules/tag/blocks/block.php"){
 *					return null; 
 *				}
 *				$block_content = tag_block_top_show($options, "newbb", $catid);
 *				return $block_content;
 *			}
 *		</code>
 *	</li>
 *	<li>Build your tag_block_top_edit function, for example newbb_block_tag_top_edit;</li>
 *	<li>Call the tag_block_top_edit in your defined block function:<br />
 *		<code>
 *			function newbb_block_tag_top_edit($options) {
 *				if(!@include_once XOOPS_ROOT_PATH."/modules/tag/blocks/block.php"){
 *					return null; 
 *				} 
 *				$form = tag_block_cloud_edit($options);
 *				$form .= $CODE_FOR_GET_CATID;	// Not used by newbb, Only for demonstration 
 *				return $form;
 *			}
 *		</code>
 *	</li>
 *	<li>Create your tag_block_top template, for example newbb_block_tag_top.html;</li>
 *	<li>Include tag_block_top template in your created block template:<br />
 *		<code>
 *			<{include file="db:tag_block_top.html"}>
 *		</code>
 *	</li>
 * </ul>
 *
 * {@link TagTag} 
 *
 * @param	array 	$options:  
 *					$options[0] - number of tags to display
 *					$options[1] - time duration, in days, 0 for all the time
 *					$options[2] - sort: a - alphabet; c - count; t - time
 */
function tag_block_top_show( $options, $dirname = "", $catid = 0 )
{
    global $xoopsDB;

    if(empty($dirname)){
	    $modid = 0;
    }elseif(isset($GLOBALS["xoopsModule"]) && is_object($GLOBALS["xoopsModule"]) && $GLOBALS["xoopsModule"]->getVar("dirname") == $dirname){
	    $modid = $GLOBALS["xoopsModule"]->getVar("mid");
    }else{
		$module_handler =& xoops_gethandler("module");
		$module = $module_handler->getByDirname($dirname);
	    $modid = $module->getVar("mid");
    }

	$block = array();
	$tag_handler =& xoops_getmodulehandler("tag", "tag");
	tag_define_url_delimiter();
	
	$criteria = new CriteriaCompo();
	$sort = ($options[2] == "a" || $options[2] == "alphabet") ? "count" : $options[2];
	$criteria->setSort("count");
	$criteria->setOrder("DESC");
	$criteria->setLimit($options[0]);
	$criteria->add( new Criteria("o.tag_status", 0) );
	if(!empty($options[1])){
		$criteria->add( new Criteria("l.tag_time", time() - $options[1] * 24 * 3600, ">") );
	}
	if(!empty($modid)){
		$criteria->add( new Criteria("l.tag_modid", $modid) );
		if($catid >= 0){
			$criteria->add( new Criteria("l.tag_catid", $catid) );
		}
	}
	if(!$tags = $tag_handler->getByLimit($criteria, empty($options[1]))){
		return $block;
	}
	
	$count_max = 0;
	$count_min = 0;
	$tags_sort = array();
	foreach(array_keys($tags) as $key){
		if($tags[$key]["count"] > $count_max) $count_max = $tags[$key]["count"];
		if($tags[$key]["count"] < $count_min) $count_min = $tags[$key]["count"];
		if($options[2] == "a" || $options[2] == "alphabet"){
			$tags_sort[] = strtolower($tags[$key]["term"]);
		}
	}
	$count_interval = $count_max - $count_min;
	
	/*
	$font_max = $options[1];
	$font_min = $options[2];
	$font_ratio = ($count_interval) ? ($font_max - $font_min) / $count_interval : 1;
	*/
	if(!empty($tags_sort)) {
		array_multisort($tags_sort, SORT_ASC, $tags);
	}
	
	$tags_data = array();
	foreach(array_keys($tags) as $key) {
		$tags_data[] = array(
						"id"	=> $tags[$key]["id"],
						//"level"	=> ($tags[$key]["count"] - $count_min) * $font_ratio + $font_min,
						"term"	=> $tags[$key]["term"],
						"count"	=> $tags[$key]["count"],
						);
	}
	unset($tags, $tags_term);
	
	$block["tags"] =& $tags_data;
	$block["tag_dirname"] = "tag";
	if(!empty($modid)){
		$module_handler =& xoops_gethandler('module');
		if($module_obj =& $module_handler->get($modid)){
			$block["tag_dirname"] = $module_obj->getVar("dirname");
		}
	}
    return $block;
}

function tag_block_top_edit($options)
{
    $form  =	TAG_MB_ITEMS.":&nbsp;&nbsp;<input type=\"text\" name=\"options[0]\" value=\"" . $options[0] . "\" /><br />";
    $form .=	TAG_MB_TIME_DURATION.":&nbsp;&nbsp;<input type=\"text\" name=\"options[1]\" value=\"" . $options[1] . "\" /><br />";
    $form .=	TAG_MB_SORT.":&nbsp;&nbsp;<select name='options[2]'>";
			    $form .= 	"<option value='a'";
			    if($options[2] == "a") $form .= " selected='selected' ";
				    $form .= ">".TAG_MB_ALPHABET."</option>";
			    	$form .= "<option value='c'";
			    if($options[2] == "c") $form .= " selected='selected' ";
				    $form .= ">".TAG_MB_COUNT."</option>";
			    	$form .= "<option value='t'";
			    if($options[2] == "t") $form .= " selected='selected' ";
			    $form .= ">".TAG_MB_TIME."</option>";
		    	$form .= "</select>";
    
    return $form;
}

?>