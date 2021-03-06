<?php
// $Id: groupaccess.php,v 1.2 2005/06/20 15:03:23 ohwada Exp $

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
if ( !defined("_WFS_GROUPACCESS_PHP") ) { define("_WFS_GROUPACCESS_PHP",1); }

function listGroups($grps="-1") {
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
function checkAccess($grps) {

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

function saveAccess($grps) {

	if ( is_array($grps) ) { $grps = implode(" ", $grps); }
	return($grps);
}

function getGroupIda($grps) {
	
	$ret = array();	

	if (!is_array($grps)) {
		$ret = explode(" ", $grps);
	}
	
return $ret;
}

// bug fix : php script has not closed
?>