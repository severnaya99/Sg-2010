<?php
// $Id$
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
// ------------------------------------------------------------------------- //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //

function xoops_module_install_extcal(&$xoopsModule) {

	// Create eXtCal upload directory
	$dir = XOOPS_ROOT_PATH."/uploads/extcal";
	if(!is_dir($dir))
		mkdir($dir);

	// Copy index.html files on uploads folders
	$indexFile = XOOPS_ROOT_PATH."/modules/extcal/include/index.html";
	copy($indexFile, XOOPS_ROOT_PATH."/uploads/extcal/index.html");

	$module_id = $xoopsModule->getVar('mid');
	$gpermHandler =& xoops_gethandler('groupperm');
	$configHandler =& xoops_gethandler('config');

	/**
	 * Default public category permission mask
	 */

	// Access right
	$gpermHandler->addRight('extcal_perm_mask', 1, XOOPS_GROUP_ADMIN, $module_id);
	$gpermHandler->addRight('extcal_perm_mask', 1, XOOPS_GROUP_USERS, $module_id);
	$gpermHandler->addRight('extcal_perm_mask', 1, XOOPS_GROUP_ANONYMOUS, $module_id);

	// Can submit
	$gpermHandler->addRight('extcal_perm_mask', 2, XOOPS_GROUP_ADMIN, $module_id);

	// Auto approve
	$gpermHandler->addRight('extcal_perm_mask', 4, XOOPS_GROUP_ADMIN, $module_id);

	return true;
}

?>