<?php
###############################################################################
##             Formulaire - Information submitting module for XOOPS          ##
##                    Copyright (c) 2003 NS Tai (aka tuff)                   ##
##                       <http://www.brandycoke.com/>                        ##
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
##  Author of this file: Philou		                                     ##
##  URL: http://www.frxoops.org/                                             ##
##  Project: Formulaire                                                      ##
###############################################################################


//attention, changer les chemins suivant en cas de renommage du module
//warning, change the two following paths if you change the module's name

if( !defined("FORMULAIRE_URL") ){
	define("FORMULAIRE_URL", XOOPS_URL."/modules/formulaire/");
}
if( !defined("FORMULAIRE_ROOT_PATH") ){
	define("FORMULAIRE_ROOT_PATH", XOOPS_ROOT_PATH."/modules/formulaire/");
}
include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
$formulaire_mgr =& xoops_getmodulehandler('elements');
include_once FORMULAIRE_ROOT_PATH.'class/elementrenderer.php';
?>