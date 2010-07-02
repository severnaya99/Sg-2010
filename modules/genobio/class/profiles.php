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
class GenobioProfiles extends XoopsObject
{

    function GenobioProfiles($fid = null)
    {
        $this->initVar('member_id', XOBJ_DTYPE_INT, null, false);
        $this->initVar('member_father_id', XOBJ_DTYPE_INT, null, false);		
		$this->initVar('member_mother_id', XOBJ_DTYPE_INT, null, false);	
        $this->initVar('member_siblings_id', XOBJ_DTYPE_INT, null, false);		
		$this->initVar('member_partner_id', XOBJ_DTYPE_INT, null, false);	
		$this->initVar('nickname', XOBJ_DTYPE_TXTBOX, null, true, 128);
		$this->initVar('dob', XOBJ_DTYPE_TXTBOX, null, false, 10);
		$this->initVar('dod', XOBJ_DTYPE_TXTBOX, null, false, 10);
		$this->initVar('anniversary', XOBJ_DTYPE_TXTBOX, null, false, 10);
		$this->initVar('dob_unix', XOBJ_DTYPE_INT, null, false);
		$this->initVar('dod_unix', XOBJ_DTYPE_INT, null, false);
		$this->initVar('anniversary_unix', XOBJ_DTYPE_INT, null, false);
		$this->initVar('height', XOBJ_DTYPE_TXTBOX, null, false, 20);
		$this->initVar('weight', XOBJ_DTYPE_TXTBOX, null, false, 20);
		$this->initVar('colour_hair', XOBJ_DTYPE_TXTBOX, null, false, 50);
		$this->initVar('colour_eyes', XOBJ_DTYPE_TXTBOX, null, false, 50);
		$this->initVar('baby_photo', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('midlife_photo', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('elderly_photo', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('current_photo', XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar('user_quote_id', XOBJ_DTYPE_INT, null, false);
		$this->initVar('album_submission_id', XOBJ_DTYPE_INT, null, false);
		$this->initVar('bio', XOBJ_DTYPE_OTHER, null, false);
		$this->initVar('history', XOBJ_DTYPE_OTHER, null, false);
		$this->initVar('education', XOBJ_DTYPE_OTHER, null, false);
		$this->initVar('fellowship', XOBJ_DTYPE_OTHER, null, false);
		$this->initVar('earlyhistory', XOBJ_DTYPE_OTHER, null, false);
		$this->initVar('medical', XOBJ_DTYPE_OTHER, null, false);
		$this->initVar('achivements', XOBJ_DTYPE_OTHER, null, false);
		$this->initVar('contributations', XOBJ_DTYPE_OTHER, null, false);
		$this->initVar('awards', XOBJ_DTYPE_OTHER, null, false);
		$this->initVar('media', XOBJ_DTYPE_OTHER, null, false);																
		$this->initVar('publications', XOBJ_DTYPE_OTHER, null, false);
		$this->initVar('jobs', XOBJ_DTYPE_OTHER, null, false);
		$this->initVar('spirtual', XOBJ_DTYPE_OTHER, null, false);
		$this->initVar('hates', XOBJ_DTYPE_OTHER, null, false);																		
		$this->initVar('likes', XOBJ_DTYPE_OTHER, null, false);																		
		$this->initVar('music', XOBJ_DTYPE_OTHER, null, false);																		
		$this->initVar('thearts', XOBJ_DTYPE_OTHER, null, false);																		
		$this->initVar('other', XOBJ_DTYPE_OTHER, null, false);																										
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
class GenobioProfilesHandler extends XoopsPersistableObjectHandler
{
    function __construct(&$db) 
    {
        parent::__construct($db, "genobio_members_profiles", 'GenobioProfiles', "member_id", "nickname");
    }
	
}
?>
