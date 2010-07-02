<?php
###############################################################################
##             Formulaire - Information submitting module for XOOPS          ##
##                    Copyright (c) 2005 philou@xoops.org                  ##
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

include_once("admin_header.php");

include_once "../include/functions.php";

xoops_cp_header();

form_adminMenu(0, _AM_INDEX);

if ( file_exists("../language/".$xoopsConfig['language']."/modinfo.php") ) {
	include "../language/".$xoopsConfig['language']."/modinfo.php";
} 
else {
	include "../language/english/modinfo.php";
}

if ( file_exists("../language/".$xoopsConfig['language']."/helpdoc.php") ) {
	include "../language/".$xoopsConfig['language']."/helpdoc.php";
} else {
	include "../language/english/helpdoc.php";
}

if ( file_exists("../language/".$xoopsConfig['language']."/main.php") ) {
	include "../language/".$xoopsConfig['language']."/main.php";
} else {
	include "../language/english/main.php";
}

if(!isset($_POST['op'])){
	$op = isset ($_GET['op']) ? $_GET['op'] : '';
}else {
	$op = $_POST['op'];
}

if ($op != 1)
{
		echo "<br /><font size='2' color='#900'><u><b>"._DOC_PRE_INSTALL."</b></u></font><br /><br />"._DOC_PRE;

	echo "<br /><br />
		<fieldset><legend style='font-weight: bold; color: #900;'>" . _AM_FORM_DOWN_IMAGEINFO . "</legend>\n
		<div style='padding: 8px;'>\n
		
				<div>" . _AM_FORM_DOWN_APACHE . "</div>\n
		";

    $safemode = (ini_get('safe_mode')) ? _AM_FORM_DOWN_ON . _AM_FORM_DOWN_SAFEMODEPROBLEMS : _AM_FORM_DOWN_OFF;
    $registerglobals = (ini_get('register_globals') == '') ? _AM_FORM_DOWN_OFF : _AM_FORM_DOWN_ON;
	$downloads = (ini_get('file_uploads')) ? _AM_FORM_DOWN_ON : _AM_FORM_DOWN_OFF;

// print_r($_SERVER); // pour recuperer en vrac toutes les variables disponibles sur le serveur

echo $_SERVER[SERVER_SIGNATURE];

echo "<li>" . _AM_FORM_DOWN_CHARSET ."<b>". $_SERVER[HTTP_ACCEPT_CHARSET] ."</b>";

echo "<br /><br />";
echo "<div>" . _AM_FORM_DOWN_SPHPINI . "</div>\n";
 
    $charset = (ini_get('HTTP_ACCEPT_CHARSET') == '') ? _AM_FORM_DOWN_OFF : _AM_FORM_DOWN_ON;

    $gdlib = (function_exists('gd_info')) ? _AM_FORM_DOWN_GDON : _AM_FORM_DOWN_GDOFF;
	echo "<li>" . _AM_FORM_DOWN_GDLIBSTATUS . $gdlib;
    if (function_exists('gd_info'))
    {
        if (true == $gdlib = gd_info())
        {
            echo "<li>" . _AM_FORM_DOWN_GDLIBVERSION . "<b>" . $gdlib['GD Version'] . "</b>";
        } 
    } 
	echo "<br /><br />\n\n";
	echo "<li>" . _AM_FORM_DOWN_SAFEMODESTATUS . $safemode;
    echo "<li>" . _AM_FORM_DOWN_REGISTERGLOBALS . $registerglobals;
	echo "<li>" . _AM_FORM_DOWN_SERVERUPLOADSTATUS . $downloads;
    echo "<li>" . _AM_FORM_DOWN_MAXUPLOADSIZE . " <b>" . ini_get('upload_max_filesize') . "</b>\n";
    echo "<li>" . _AM_FORM_DOWN_MAXPOSTSIZE . " <b>" . ini_get('post_max_size') . "</b>\n";
	echo "</div>";
	echo "</fieldset><br />";

	echo "<a href='serv.php?op=1'>&nbsp;"._AM_DEBUG_MODE."</a>";

}
else if ($op == 1)
{
		$sql = sprintf("SELECT conf_value FROM ".$xoopsDB->prefix('config')." where conf_name='debug_mode'");
    $res = $xoopsDB->query($sql);
		if ( $res ) {
	  while ( $row = $xoopsDB->fetchArray($res)) {
	    $val = $row['conf_value'];
	  	}
	  }
		if ($val == 1) {$value=0;}
		else if ($val == 0) {$value=1;}
		
		$sql = sprintf("UPDATE %s SET conf_value='%s' WHERE conf_name='debug_mode'", $xoopsDB->prefix("config"), $value);
	  $xoopsDB->queryF($sql); 
		
		$url = "serv.php";
		Header("Location: $url");
}

include 'footer.php';
    xoops_cp_footer();

?>
