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
class GenobioSibblings extends XoopsObject
{

    function GenobioSibblings($fid = null)
    {
        $this->initVar('sibblings_id', XOBJ_DTYPE_INT, null, false);
        $this->initVar('members_group', XOBJ_DTYPE_ARRAY, null, true);		
        $this->initVar('nickname', XOBJ_DTYPE_TXTBOX, null, true, 255);		
        $this->initVar('bio', XOBJ_DTYPE_OTHER, null, true);		
        $this->initVar('history', XOBJ_DTYPE_OTHER, null, true);		
        $this->initVar('activities', XOBJ_DTYPE_OTHER, null, true);										
        $this->initVar('toys', XOBJ_DTYPE_OTHER, null, true);												
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
class GenobioSibblingsHandler extends XoopsPersistableObjectHandler
{
    function __construct(&$db) 
    {
        parent::__construct($db, "genobio_sibblings", 'GenobioSibblings', "sibblings_id", "nickname");
    }
	
}
?>