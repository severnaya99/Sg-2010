<?php
// $Id: xfblock_groupaccess.php,v 1.1 2005/06/24 09:20:08 ohwada Exp $

// 2005-06-20 K.OHWADA
// xfs -> xfblock

// 2004/07/01 K.OHWADA
// this file is same as groupsaccess.php
// change function name xxx to xfs_xxx
// for avoiding to collide with WFsection.
// block function read twice groupaccess.php.

// 2004/02/26 K.OHWADA
// bug fix : php script has not closed

// 2003/10/11 K.OHWADA
// multiple install of same module

// Original Author: Halfdead
// Update Author: Catzwolf
// 				  Danielblues 

/* -----------------------------------------------------------------------------------------
Useage:
See included Docs
------------------------------------------------------------------------------------------*/

// multiple install of same module
//if ( !defined("_WFS_GROUPACCESS_PHP") ) { define("_WFS_GROUPACCESS_PHP",1); }

// xfs -> xfblock
//function xfs_listGroups($grps="-1") {
function xfblock_listGroups($grps="-1") {

global $xoopsDB, $myts;

$result = $xoopsDB->queryF("SELECT groupid, name FROM ".$xoopsDB->prefix('groups')." ORDER BY name DESC");
	
	if (!is_array($grps)) {
		$grps = explode(" ", $grps);
	}

$grouplist = "<select name='groupid[]' size='5' multiple='multiple'>";
	
	while (list($groupid, $name) = $xoopsDB->fetchRow($result)) {
		$grouplist .= "<option value='$groupid'";
	
		if (@in_array($groupid , $grps) || @in_array("-1", $grps)) {
			$grouplist .= " selected='selected'";
		}

		$grouplist .= " />".$myts->makeTboxData4Show($name)."</option>";
	}
$grouplist .= "</select>";
echo $grouplist;
}

/* 
checkAccess()

See docs for usage
*/

// xfs -> xfblock
//function xfs_checkAccess($grps) {
function xfblock_checkAccess($grps) {

global $xoopsUser, $xoopsModule;

$groupid = is_object($xoopsUser) ? $xoopsUser->getGroups() : array(XOOPS_GROUP_ANONYMOUS);

$grps = explode(" ", $grps);
   
   if ( $xoopsUser && $xoopsUser->isAdmin() ) {
	 return 1;

   } else {
		for ($i=0; $i<count($grps); $i++) {
			if (@in_array($grps[$i], $groupid)) {
				return 1;
			} 
		}
	}
return 0;

}
/* 
saveAccess()

See docs for usage
*/

// xfs -> xfblock
//function xfs_saveAccess($grps) {
function xfblock_saveAccess($grps) {

	if ( is_array($grps) ) { $grps = implode(" ", $grps); }
	return($grps);
}

function xfs_getGroupIda($grps) {
	
	$ret = array();	

	if (!is_array($grps)) {
		$ret = explode(" ", $grps);
	}
	
return $ret;
}

// bug fix : php script has not closed
?>