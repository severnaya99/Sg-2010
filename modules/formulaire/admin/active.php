<?php
###############################################################################
##             Formulaire - Information submitting module for XOOPS          ##
##                    Copyright (c) 2005 philou@xoops.org                    ##
##                       <http://www.frxoops.org/>                           ##
###############################################################################
##                    XOOPS - PHP Content Management System                  ##
##                       Copyright (c) 2000 XOOPS.org                        ##
##                          <http://www.xoops.org/>                          ##
###############################################################################
##  This program is free software; you can redistribute it and/or modify     ##
##  it under the terms of the GNU General Public License as published by     ##
##  the Free Software Foundation; either version 2 of the License, or        ##
##  (at your option) any later version.                                      ##
##                                                                           ##
##  You may not change or alter any portion of this comment or credits       ##
##  of supporting developers from this source code or any supporting         ##
##  source code which is considered copyrighted (c) material of the          ##
##  original comment or credit authors.                                      ##
##                                                                           ##
##  This program is distributed in the hope that it will be useful,          ##
##  but WITHOUT ANY WARRANTY; without even the implied warranty of           ##
##  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            ##
##  GNU General Public License for more details.                             ##
##                                                                           ##
##  You should have received a copy of the GNU General Public License        ##
##  along with this program; if not, write to the Free Software              ##
##  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA ##
###############################################################################
##  URL: http://www.frxoops.org/                                             ##
##  Project: Formulaire                                                      ##
###############################################################################

/**
* This file change and store the status of the form
*
* @copyright	The XOOPS project http://www.xoops.org/
* @license      http://www.fsf.org/copyleft/gpl.html GNU public license
* @author       Philou <philou@xoops.org>
* @since        3.21
* @version		$Id: $
* @package 		Formulaire
* @param int    $id  		Number of the form (index of the table)
* @param int    $status Status of the form (0 idle, 1 active)
* @param string $url 		Target for the redirection after the update

*/

include("admin_header.php");
include_once XOOPS_ROOT_PATH."/class/module.errorhandler.php";

	global $xoopsDB, $_POST, $eh;

  $eh = new ErrorHandler;

// Catch the value
		if(!isset($_POST['id'])){
			$id = isset ($_GET['id']) ? $_GET['id'] : '0';
		}else {
			$id = $_POST['id'];
		}

		if(!isset($_POST['status'])){
			$status = isset ($_GET['status']) ? $_GET['status'] : '0';
		}else {
			$status = $_POST['status'];
		}

	if(!isset($_POST['url'])){
		$url = isset ($_GET['url']) ? $_GET['url'] : '0';
	}else {
		$url = $_POST['url'];
	}

if ($status==1) {$status=0;}
else {$status=1;}

// update the database
	$sql = sprintf("UPDATE %s SET status='%s' WHERE menuid='%s'",$xoopsDB->prefix("form_menu"),$status,$id);
	$xoopsDB->queryF($sql) or $eh->show("error");

	Header("Location: $url");
?>
