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
class GenobioMembers extends XoopsObject
{

    function GenobioMembers($fid = null)
    {
        $this->initVar('member_id', XOBJ_DTYPE_INT, null, false);
        $this->initVar('category_id', XOBJ_DTYPE_INT, null, false);		
		$this->initVar('uid', XOBJ_DTYPE_INT, null, false);	
		$this->initVar('domain', XOBJ_DTYPE_OTHER, null, false);		
		$this->initVar('domains', XOBJ_DTYPE_ARRAY, null, false);				
        $this->initVar('display_name', XOBJ_DTYPE_TXTBOX, null, true, 64);
		$this->initVar('display_picture', XOBJ_DTYPE_OTHER, null, true, 20);		
		$this->initVar('member_sex', XOBJ_DTYPE_OTHER, null, true, 10);				
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
class GenobioMembersHandler extends XoopsPersistableObjectHandler
{
    function __construct(&$db) 
    {
        parent::__construct($db, "genobio_member", 'GenobioMembers', "member_id", "display_name");
    }
	
}
?>
