<?php
// ------------------------------------------------------------------------- //
//                             stEX-Meteo 1.00                               //
//                      <http://ste.altervista.org/>                         //
// ------------------------------------------------------------------------- //
//                              E-XOOPPORT                                   //
//                      <http://www.e-xoopport.it/>                          //
// ------------------------------------------------------------------------- //
//                                                                           //
// Original Author: Stefano Murgia                                           //
// Author Website : http://ste.altervista.org/                               //
// License Type   : GPL:                                                     //
//                                                                           //
//                ----------------------------------------                   //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//                ----------------------------------------                   //
//                                                                           //
//                 Copyright (C) June 2004  Stefano Murgia                   //
// ------------------------------------------------------------------------- //

global $xoopsConfig, $xoopsModule;
include("../../../mainfile.php");
include_once(XOOPS_ROOT_PATH."/class/xoopsmodule.php");
include(XOOPS_ROOT_PATH."/include/cp_functions.php");
if($xoopsUser){
        $xoopsModule = XoopsModule::getByDirname("stexmeteo");
        if ( !$xoopsUser->isAdmin($xoopsModule->mid()) ) {
                redirect_header(XOOPS_URL."/",3,_NOPERM);
                exit();
        }
} else {
        redirect_header(XOOPS_URL."/",3,_NOPERM);
        exit();
}
if ( file_exists("../language/".$xoopsConfig['language']."/main.php") ) {
        include("../language/".$xoopsConfig['language']."/main.php");
} else {
        include("../language/english/main.php");
};
xoops_cp_header();
$save = !empty($HTTP_POST_VARS['save']) ? $HTTP_POST_VARS['save'] : $HTTP_GET_VARS['save'];

if ($save == "countsave") {
global $HTTP_POST_VARS;
$content .= "<?php\n";
$content .= "\$countconfig['SHOW_IMAGES']      = ".intval($HTTP_POST_VARS['show_images']).";\n";
$content .= "?>";
$filename = "../cache/config.php";
if ( $file = fopen($filename, "w") ) {
        fwrite($file, $content);
        fclose($file);
        } else {
                redirect_header("index.php?op=newsConfig", 1, _NOTUPDATED);
                exit();
        }
}

include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/cache/config.php");
global  $xoopsTheme;
OpenTable();


$chk1 = ""; $chk0 = "";
($countconfig["SHOW_IMAGES"] == 1) ? $chk1 = " checked='checked'" : $chk0 = " checked='checked'";

echo"
<table>
	<tr>
		<td><b>"._MA_STEXMETEO_GENCONF."</b></td>
	</tr>
</table>	
<table>
	<form name='form1' method='post' action='index.php'>"._MA_STEXMETEO_SHOWIMG."
			<input type='radio' name='show_images' value='1' $chk1>"._MA_STEXMETEO_YES."
    		<input type='radio' name='show_images' value='0' $chk0>"._MA_STEXMETEO_NO."
	
	<tr>
		<td></td>
	</tr>
	<tr>
		<td align='right'><input type='hidden' name='save' value='countsave'>
						<input class'button' type='submit' value='"._MA_STEXMETEO_SAVE."'>
						<input class'button' type='button' value='"._MA_STEXMETEO_CANCEL."' onclick='javascript:history.go(-1)' >
			</form></td>
	</tr>
</table>";


CloseTable();

xoops_cp_footer();
?>
