<?php
// ------------------------------------------------------------------------- //
//                XOOPS - PHP Content Management System                      //
//                       <http://www.xoops.org/>                             //
// ------------------------------------------------------------------------- //
// Based on:								     //
// myPHPNUKE Web Portal System - http://myphpnuke.com/	  		     //
// PHP-NUKE Web Portal System - http://phpnuke.org/	  		     //
// Thatware - http://thatware.org/					     //
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
include_once(XOOPS_ROOT_PATH."/class/module.errorhandler.php");
include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/include/functions.php");

$myts =& MyTextSanitizer::getInstance(); // MyTextSanitizer object

foreach ($HTTP_POST_VARS as $k => $v) {
	${$k} = $v;
}

foreach ($HTTP_GET_VARS as $k => $v) {
	${$k} = $v;
}

include XOOPS_ROOT_PATH."/header.php";

if($HTTP_POST_VARS['submit']) {
	$eh = new ErrorHandler; //ErrorHandler object
	if(!$xoopsUser){
		$ratinguser = 0;
	}else{
		$ratinguser = $xoopsUser->uid();
	}
    	//Make sure only 1 anonymous from an IP in a single day.
    	$anonwaitdays = 1;
    	$ip = getenv("REMOTE_ADDR");
		$lid = $HTTP_POST_VARS['lid'];
		$rating = $HTTP_POST_VARS['rating'];
    	// Check if Rating is Null
    	if ($rating=="--") {
    		redirect_header("ratefile.php?lid=".$lid."",4,_WFS_NORATING);
		exit();
    	}

    	// Check if Download POSTER is voting (UNLESS Anonymous users allowed to post)
        if ($ratinguser != 0) {
                $result=$xoopsDB->query("SELECT uid FROM ".$xoopsDB->prefix("wfs_article")." WHERE articleid=$lid");
                while(list($ratinguserDB)=$xoopsDB->fetchRow($result)) {
                        if ($ratinguserDB==$ratinguser) {
                                redirect_header("index.php",4,_WFS_CANTVOTEOWN);
				exit();
                        }
                }

            // Check if REG user is trying to vote twice.
                $result=$xoopsDB->query("SELECT ratinguser FROM ".$xoopsDB->prefix("wfs_votedata")." WHERE lid=$lid");
                while(list($ratinguserDB)=$xoopsDB->fetchRow($result)) {
                        if ($ratinguserDB==$ratinguser) {
                                redirect_header("index.php",4,_WFS_VOTEONCE);
				exit();
                        }
                }
	}
             // Check if ANONYMOUS user is trying to vote more than once per day.
	if ($ratinguser==0){
       	$yesterday = (time()-(86400 * $anonwaitdays));
		$result=$xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("wfs_votedata")." WHERE lid=$lid AND ratinguser=0 AND ratinghostname = '$ip'  AND ratingtimestamp > $yesterday");
        list($anonvotecount) = $xoopsDB->fetchRow($result);
        if ($anonvotecount >= 1) {
        	redirect_header("index.php",4,_WFS_VOTEONCE);
			exit();
        }
	}

        //All is well.  Add to Line Item Rate to DB.
	$newid = $xoopsDB->genId($xoopsDB->prefix("wfs_votedata")."_ratingid_seq");
	$datetime = time();
    $xoopsDB->query("INSERT INTO ".$xoopsDB->prefix("wfs_votedata")." (ratingid, lid, ratinguser, rating, ratinghostname, ratingtimestamp) VALUES ($newid, $lid, $ratinguser, $rating, '$ip', $datetime)");
    
	//All is well.  Calculate Score & Add to Summary (for quick retrieval & sorting) to DB.
    updaterating($lid);
	$ratemessage = _WFS_VOTEAPPRE."<br>".sprintf(_WFS_THANKYOU,$xoopsConfig['sitename']);
	redirect_header("index.php",4,$ratemessage);
	exit();
} else {
	include XOOPS_ROOT_PATH."/header.php";

	echo"<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class=\"odd\">";
    indexmainheader();
    $result=$xoopsDB->query("SELECT title FROM ".$xoopsDB->prefix("wfs_article")." WHERE articleid=$lid");
	list($title) = $xoopsDB->fetchRow($result);
	$title = $myts->makeTboxData4Show($title);
    	echo "
    	<hr />
		<table border=0 cellpadding=1 cellspacing=0 width=\"80%\"><tr><td>
    	<h4>$title</h4>
    	<UL>
     	<LI>"._WFS_VOTEONCE."
     	<LI>"._WFS_RATINGSCALE."
     	<LI>"._WFS_BEOBJECTIVE."
     	<LI>"._WFS_DONOTVOTE."";
    	echo "
     	</UL>
     	</td></tr>
     	<tr><td align=\"center\">
     	<form method=\"POST\" action=\"ratefile.php\">
     	<input type=\"hidden\" name=\"lid\" value=\"$lid\">
     	<select name=\"rating\">
		<option>--</option>";
     	for($i=10;$i>0;$i--){
		echo "<option value=\"".$i."\">".$i."</option>\n";
	}
     	echo "</select><br><br><input type=\"submit\" name=\"submit\" value=\""._WFS_RATEIT."\"\n>";
		echo "&nbsp;<input type=\"button\" value=\""._WFS_CANCEL."\" onclick=\"javascript:history.go(-1)\">\n";
    	echo "</form></td></tr></table>";
    	echo"</td></tr></table>";

}
include 'footer.php';
?>