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
 
if (!defined("XOOPS_ROOT_PATH")) {
	exit();
}

defined("FRAMEWORKS_ART_FUNCTIONS_INI") || include_once XOOPS_ROOT_PATH.'/Frameworks/art/functions.ini.php';
load_object();

/**
 * TagLink 
 * 
 * @author D.J. (phppp)
 * @copyright copyright &copy; Xoops Project
 * @package module::tag
 *
 * {@link ArtObject} 
 *
 */

class TagLink extends ArtObject
{
    /**
     * Constructor
     */
    function TagLink()
    {
	    $this->ArtObject("tag_link");
        $this->initVar("tl_id", 	XOBJ_DTYPE_INT, 	null, false);
        $this->initVar("tag_id", 	XOBJ_DTYPE_INT, 	0);
        $this->initVar("tag_modid", XOBJ_DTYPE_INT, 	0);
        $this->initVar("tag_catid", XOBJ_DTYPE_INT, 	0);
        $this->initVar("tag_itemid",XOBJ_DTYPE_INT, 	0);
        $this->initVar("tag_time", 	XOBJ_DTYPE_INT, 	0);
    }
}

/**
 * Tag link handler class.  
 * @package module::tag
 *
 * @author  D.J. (phppp)
 * @copyright copyright &copy; 2006 The XOOPS Project
 *
 * {@link ArtObjectHandler} 
 *
 */

class TagLinkHandler extends ArtObjectHandler
{
	var $table_stats;
	
	/**
	 * Constructor
	 *
	 * @param object $db reference to the {@link XoopsDatabase} object	 
	 **/
    function TagLinkHandler(&$db) {
        $this->ArtObjectHandler($db, "tag_link", "TagLink", "tl_id", "tag_itemid");
        $this->table_stats = $this->db->prefix("tag_stats");
    }
    
    /**
     * clean orphan links from database
     * 
     * @return 	bool	true on success
     */
    function cleanOrphan()
    {
	    return parent::cleanOrphan($this->db->prefix("tag_tag"), "tag_id");
    }
}
?>