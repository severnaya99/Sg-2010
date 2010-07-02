<?php
// $Id: update.php 2 2005-11-02 18:23:29Z skalpa $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
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
// Author: Kazumi Ono (AKA onokazu)                                          //
// URL: http://www.myweb.ne.jp/, http://www.xoops.org/, http://jp.xoops.org/ //
// Project: The XOOPS Project                                                //
// ------------------------------------------------------------------------- //

function xoops_module_update_genobio(&$module) {

	@$GLOBALS['xoopsDB']->queryF('ALTER TABLE `'.$GLOBALS['xoopsDB']->prefix('genobio_members_profiles').'` ADD `dob_unix` INT( 12 ) NOT NULL DEFAULT '0' AFTER `anniversary` , ADD `dod_unix` INT( 12 ) NOT NULL AFTER `dob_unix` , ADD `anniversary_unix` INT( 12 ) NOT NULL AFTER `dod_unix`');
	@$GLOBALS['xoopsDB']->queryF('update `'.$GLOBALS['xoopsDB']->prefix('genobio_members_profiles').'` SET `dob_unix` = UNIX_TIMESTAMP(`dod`)');
	@$GLOBALS['xoopsDB']->queryF('update `'.$GLOBALS['xoopsDB']->prefix('genobio_members_profiles').'` SET `anniversary_unix` = UNIX_TIMESTAMP(`anniversary`)');
	@$GLOBALS['xoopsDB']->queryF('update `'.$GLOBALS['xoopsDB']->prefix('genobio_members_profiles').'` SET `dod_unix` = UNIX_TIMESTAMP(`dod`)');
	
	return true;
}
?>