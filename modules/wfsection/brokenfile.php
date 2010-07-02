<?php
// ------------------------------------------------------------------------- //
//                XOOPS - PHP Content Management System                      //
//                       <http://www.xoops.org/>                             //
// ------------------------------------------------------------------------- //
// Based on:                                     //
// myPHPNUKE Web Portal System - http://myphpnuke.com/                   //
// PHP-NUKE Web Portal System - http://phpnuke.org/                   //
// Thatware - http://thatware.org/                         //
// ------------------------------------------------------------------------- //
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
// ------------------------------------------------------------------------- //
include("header.php");

foreach ($HTTP_POST_VARS as $k => $v) {
	${$k} = $v;
}

foreach ($HTTP_GET_VARS as $k => $v) {
	${$k} = $v;
}

$myts =& MyTextSanitizer::getInstance(); // MyTextSanitizer object

if ( $submit ) {
    if( !$xoopsUser ) {
  		redirect_header("index.php",2,_WFS_ONLYREGISTEREDUSERS);
        exit();
    } else {
        $sender = $xoopsUser->uid();
    }
    $ip = getenv("REMOTE_ADDR");
    if ( $sender != 0 ) {
        // Check if REG user is trying to report twice.
        $result=$xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("wfs_broken")." WHERE lid=$lid AND sender=$sender");
        list ($count)=$xoopsDB->fetchRow($result);
        if ( $count > 0 ) {
            redirect_header("index.php",2,_WFS_ALREADYREPORTED);
            exit();
        }
    }
    // Check if the sender is trying to vote more than once.
    $result=$xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("wfs_broken")." WHERE lid=$lid AND ip = '$ip'");
    list ($count)=$xoopsDB->fetchRow($result);
    if ( $count > 0 ) {
        redirect_header("index.php",2,_WFS_ALREADYREPORTED);
        exit();
    }
    $newid = $xoopsDB->genId($xoopsDB->prefix("wfs_broken")."_reportid_seq");
    $query = "INSERT INTO ".$xoopsDB->prefix("wfs_broken")." (reportid, lid, sender, ip) VALUES ($newid, $lid, $sender, '$ip')";
    $xoopsDB->query($query) or die("");
    redirect_header("index.php",2,_WFS_THANKSFORINFO);
    exit();
} else {
    $lid = $HTTP_GET_VARS['lid'];
	include(XOOPS_ROOT_PATH."/header.php");
    echo "<table width='100%' border='0' cellspacing='1' class='outer' ><tr><td class='odd' align='center'>";
    indexmainheader();
    echo "<div><h4>"._WFS_REPORTBROKEN."</h4><br /><br />";
    echo "<form action='brokenfile.php' method='post'>";
	echo "<input type='hidden' name='lid' value='$lid' />";
    echo _WFS_THANKSFORHELP;
    echo "<br>"._WFS_FORSECURITY."<br /><br />";
    echo "<input type='submit' name='submit' value='"._WFS_REPORTBROKEN."' />";
    echo "&nbsp;<input type='button' value='"._WFS_CANCEL."' onclick='javascript:history.go(-1)' />";
    echo "</form></div>";
    echo"</td></tr></table>";
}
include("footer.php");
?>
