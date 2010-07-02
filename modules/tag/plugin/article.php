<?php
/**
 * Tag info
 *
 * @copyright	The XOOPS project http://www.xoops.org/
 * @license		http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author		Taiwen Jiang (phppp or D.J.) <php_pp@hotmail.com>
 * @since		1.00
 * @version		$Id$
 * @package		module::tag
 */
if (!defined('XOOPS_ROOT_PATH')){ exit(); }

/**
 * Get item fields:
 * title
 * content
 * time
 * link
 * uid
 * uname
 * tags
 *
 * @var		array	$items	associative array of items: [modid][catid][itemid]
 *
 * @return	boolean
 * 
 */
function article_tag_iteminfo(&$items)
{
	if(empty($items) || !is_array($items)){
		return false;
	}
	
	$items_id = array();
	foreach(array_keys($items) as $cat_id){
		// Some handling here to build the link upon catid
			// catid is not used in article, so just skip it
		foreach(array_keys($items[$cat_id]) as $item_id){
			// In article, the item_id is "art_id"
			$items_id[] = intval($item_id);
		}
	}
	$item_handler =& xoops_getmodulehandler("article", "article");
	$items_obj = $item_handler->getObjects(new Criteria("art_id", "(".implode(", ", $items_id).")", "IN"), true);
	
	foreach(array_keys($items) as $cat_id){
		foreach(array_keys($items[$cat_id]) as $item_id){
			$item_obj =& $items_obj[$item_id];
			$items[$cat_id][$item_id] = array(
				"title"		=> $item_obj->getVar("art_title"),
				"uid"		=> $item_obj->getVar("uid"),
				"link"		=> "view.article.php?article={$item_id}",
				"time"		=> $item_obj->getVar("art_time_publish"),
				"tags"		=> tag_parse_tag($item_obj->getVar("art_keywords", "n")),
				"content"	=> "",
				);
		}
	}
	unset($items_obj);	
}

/**
 * Remove orphan tag-item links
 *
 * @return	boolean
 * 
 */
function article_tag_synchronization($mid)
{
	$item_handler =& xoops_getmodulehandler("article", "article");
	$link_handler =& xoops_getmodulehandler("link", "tag");
        
	/* clear tag-item links */
	if($link_handler->mysql_major_version() >= 4):
    $sql =	"	DELETE FROM {$link_handler->table}".
    		"	WHERE ".
    		"		tag_modid = {$mid}".
    		"		AND ".
    		"		( tag_itemid NOT IN ".
    		"			( SELECT DISTINCT {$item_handler->keyName} ".
    		"				FROM {$item_handler->table} ".
    		"				WHERE {$item_handler->table}.art_time_publish > 0".
    		"			) ".
    		"		)";
    else:
    $sql = 	"	DELETE {$link_handler->table} FROM {$link_handler->table}".
    		"	LEFT JOIN {$item_handler->table} AS aa ON {$link_handler->table}.tag_itemid = aa.{$item_handler->keyName} ".
    		"	WHERE ".
    		"		tag_modid = {$mid}".
    		"		AND ".
    		"		( aa.{$item_handler->keyName} IS NULL".
    		"			OR aa.art_time_publish < 1".
    		"		)";
	endif;
    if (!$result = $link_handler->db->queryF($sql)) {
        //xoops_error($link_handler->db->error());
  	}
}
?>