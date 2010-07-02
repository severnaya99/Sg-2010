<?php
if (!defined('XOOPS_ROOT_PATH')) {
	exit();
}
/**
 * Class for Scroller
 * @author Simon Roberts (simon@chronolabs.org.au)
 * @copyright copyright (c) 2000-2009 XOOPS.org
 * @package kernel
 */
class GenobioCategories extends XoopsObject
{

    function GenobioCategories($fid = null)
    {
        $this->initVar('category_id', XOBJ_DTYPE_INT, null, false);
        $this->initVar('category_name', XOBJ_DTYPE_TXTBOX, null, true, 128);		
    }

}


/**
* XOOPS Scroller handler class.
* This class is responsible for providing data access mechanisms to the data source
* of XOOPS user class objects.
*
* @author  Simon Roberts <simon@chronolabs.org.au>
* @package kernel
*/
class GenobioCategoriesHandler extends XoopsPersistableObjectHandler
{
    function __construct(&$db) 
    {
        parent::__construct($db, "genobio_categories", 'GenobioCategories', "category_id", "category_name");
    }
	
}
?>