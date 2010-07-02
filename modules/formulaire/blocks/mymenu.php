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

function block_FORMULAIREMENU_menu() {

global $xoopsDB, $myts, $xoopsUser, $xoopsModule, $xoopsTpl, $xoopsConfig;

$myts =& MyTextSanitizer::getInstance();
$menuid=0;
$block = array();
$groupuser = array();

if(!isset($block['content'])){ $block['content']="";}

    
$module_handler =& xoops_gethandler('module');     
$formulaireModule =& $module_handler->getByDirname('formulaire');
if ( $xoopsUser ){
		if ( $xoopsUser->isAdmin($formulaireModule) ) {
 				$block['content'].= "<a href=".XOOPS_URL."/modules/formulaire/admin/modform.php><img src='".XOOPS_URL."/modules/formulaire/images/key.gif'></a>";
				}
}

//03/04/2006
//Probleme de tri en fonction de l'ordre defini dans le menu
//Ajout de la jointure avec la table menu qui contient les positions 
$sql=sprintf("SELECT id_form,desc_form,admin,groupe,email,expe,url,help,send,msend,msub,mip,mnav,cod FROM ".$xoopsDB->prefix("form_id")." INNER JOIN ".$xoopsDB->prefix("form_menu")." ON ".$xoopsDB->prefix("form_id").".id_form = ".$xoopsDB->prefix("form_menu").".menuid WHERE qcm = 0 order by ".$xoopsDB->prefix("form_menu").".position");

$res = $xoopsDB->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.$xoopsDB->error());
if ($res)
{
	while ($row= $xoopsDB->fetchArray($res))
	{
	$id_form = $row['id_form'];
    	$admin = $row['admin'];
    	$groupe = $row['groupe'];
    	$email = $row['email'];
    	$expe = $row['expe'];
        $title = $myts->makeTboxData4Show($row['desc_form']);
	$url = $row['url'];
	$help = $row['help'];
	$help = $myts->displayTarea($help);
	$send = $row['send'];
	$msend = $row['msend'];
	$msub = $row['msub'];
	$mip = $row['mip'];
	$mnav = $row['mnav'];
	$cod = $row['cod'];

//  	}
//}
$result_form = $xoopsDB->query("SELECT menuid, indent, margintop, marginbottom, itemurl, bold, status FROM ".$xoopsDB->prefix("form_menu")." WHERE menuid=".$id_form." ORDER BY position");

//attention, changer le dirname suivant en cas de renommage du module
//warning, change the following dirname if you change the module's name
$res_mod = $xoopsDB->query("SELECT mid FROM ".$xoopsDB->prefix("modules")." WHERE dirname='formulaire'");
if ($res_mod) {
	while ($row = $xoopsDB->fetchRow($res_mod))
		$module_id = $row[0];
}

$perm_name = 'Permission des catégories';
if (is_object($xoopsUser)) {
	$uid = $xoopsUser->getVar("uid");
} else {
	$groupuser[0] = 3;
	$uid=XOOPS_GROUP_ANONYMOUS;
}

$res_gp = $xoopsDB->query("SELECT groupid FROM ".$xoopsDB->prefix("groups_users_link")." WHERE uid= ".$uid);
if ( $res_gp ) {
  while ( $row = $xoopsDB->fetchRow($res_gp)) {
	$groupuser[] = $row[0];
  }
}

$gperm_handler =& xoops_gethandler('groupperm');

if ($result_form) {
	while ($row =$xoopsDB->fetchRow($result_form)) {
		$menuid = $row[0];
		$indent = $row[1];
		$margintop = $row[2];
		$marginbottom = $row[3];
		$itemurl = $row[4];
		$bold = $row[5];
		$status = $row[6];
	}
}
else
{
	$status = 0;
}

if ( $status == 1 ) {
	$groupid = array();
        $res2 = $xoopsDB->query("SELECT gperm_groupid,gperm_itemid FROM ".$xoopsDB->prefix("group_permission")." WHERE gperm_itemid= ".$menuid." AND gperm_modid=".$module_id);
	if ( $res2 ) {
	  while ( $row = $xoopsDB->fetchRow($res2 ) ) {
		$groupid[] = $row[0];
	  }
	}

$block['content'] .="<style type='text/css'>

#dhtmltooltip{
position: absolute;
width: 150px;
border: 2px solid black;
padding: 2px;
background-color: lightyellow;
visibility: hidden;
z-index: 100;
/*Remove below line to remove shadow. Below line should always appear last within this CSS*/
filter: progid:DXImageTransform.Microsoft.Shadow(color=gray,direction=135);
}

</style>
";


$block['content'] .='<div id="dhtmltooltip"></div>

<script type="text/javascript">

/***********************************************
* Cool DHTML tooltip script- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

var offsetxpoint=-60 //Customize x offset of tooltip
var offsetypoint=20 //Customize y offset of tooltip
var ie=document.all
var ns6=document.getElementById && !document.all
var enabletip=false
if (ie||ns6)
var tipobj=document.all? document.all["dhtmltooltip"] : document.getElementById? document.getElementById("dhtmltooltip") : ""

function ietruebody(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function ddrivetip(thetext, thecolor, thewidth){
if (ns6||ie){
if (typeof thewidth!="undefined") tipobj.style.width=thewidth+"px"
if (typeof thecolor!="undefined" && thecolor!="") tipobj.style.backgroundColor=thecolor
tipobj.innerHTML=thetext
enabletip=true
return false
}
}

function positiontip(e){
if (enabletip){
var curX=(ns6)?e.pageX : event.x+ietruebody().scrollLeft;
var curY=(ns6)?e.pageY : event.y+ietruebody().scrollTop;
//Find out how close the mouse is to the corner of the window
var rightedge=ie&&!window.opera? ietruebody().clientWidth-event.clientX-offsetxpoint : window.innerWidth-e.clientX-offsetxpoint-20
var bottomedge=ie&&!window.opera? ietruebody().clientHeight-event.clientY-offsetypoint : window.innerHeight-e.clientY-offsetypoint-20

var leftedge=(offsetxpoint<0)? offsetxpoint*(-1) : -1000

//if the horizontal distance isnt enough to accomodate the width of the context menu
if (rightedge<tipobj.offsetWidth)
//move the horizontal position of the menu to the left by its width
tipobj.style.left=ie? ietruebody().scrollLeft+event.clientX-tipobj.offsetWidth+"px" : window.pageXOffset+e.clientX-tipobj.offsetWidth+"px"
else if (curX<leftedge)
tipobj.style.left="5px"
else
//position the horizontal position of the menu where the mouse is positioned
tipobj.style.left=curX+offsetxpoint+"px"

//same concept with the vertical position
if (bottomedge<tipobj.offsetHeight)
tipobj.style.top=ie? ietruebody().scrollTop+event.clientY-tipobj.offsetHeight-offsetypoint+"px" : window.pageYOffset+e.clientY-tipobj.offsetHeight-offsetypoint+"px"
else
tipobj.style.top=curY+offsetypoint+"px"
tipobj.style.visibility="visible"
}
}

function hideddrivetip(){
if (ns6||ie){
enabletip=false
tipobj.style.visibility="hidden"
tipobj.style.left="-1000px"
tipobj.style.backgroundColor=""
tipobj.style.width=""
}
}

document.onmousemove=positiontip

</script>';

	$block['content'] .= "<ul>";

    $display = 0;
	$perm_itemid = $menuid; //intval($_GET['category_id']);
        foreach ($groupid as $gr){
               	if ( in_array ($gr, $groupuser) && $display != 1) {
			if (!empty($help))
				{
	                		if ($bold == 1)
	                		$block['content'] .= "<table cellspacing='0' border='0'><div style='margin-left: ".$indent."px; margin-right: 0px; margin-top:".$margintop."px; margin-bottom:".$marginbottom."px; '><LI><a style='font-weight: bold' href='$itemurl' alt='' onMouseOver=\"ddrivetip('$help')\"; onMouseOut=\"hideddrivetip()\">".$title."</a></LI></table>";
	                		else
	                		$block['content'] .= "<table cellspacing='0' border='0'><div style='margin-left: ".$indent."px; margin-right: 0px; margin-top:".$margintop."px; margin-bottom:".$marginbottom."px; '><LI><a style='font-weight: normal' href='$itemurl' alt='' onMouseover=\"ddrivetip('$help')\"; onMouseout=\"hideddrivetip()\">".$title."</a></LI></table>";
				}
	         	else {	if ($bold == 1)
	                		$block['content'] .= "<table cellspacing='0' border='0'><div style='margin-left: ".$indent."px; margin-right: 0px; margin-top:".$margintop."px; margin-bottom:".$marginbottom."px; '><LI><a style='font-weight: bold' href='$itemurl'>".$title."</a></LI></table>";
	                		else
	                		$block['content'] .= "<table cellspacing='0' border='0'><div style='margin-left: ".$indent."px; margin-right: 0px; margin-top:".$margintop."px; margin-bottom:".$marginbottom."px; '><LI><a style='font-weight: normal' href='$itemurl'>".$title."</a></LI></table>";
			     }	
	                		$display = 1;
               	}
               //	else redirect_header(XOOPS_URL."/modules/formulaire/index.php", 1, "pas la permission !!!");
        }
        $block['content'] .= "</ul>";
    }
}
}
	return $block;
}

function block_QCMMENU_menu() {

//function block_FORMULAIREMENU_menu() {
global $xoopsDB, $myts, $xoopsUser, $xoopsModule, $xoopsTpl, $xoopsConfig;

$myts =& MyTextSanitizer::getInstance();
$menuid=0;
$block = array();
$groupuser = array();

if(!isset($block['content'])){ $block['content']="";}

    
$module_handler =& xoops_gethandler('module');     
$formulaireModule =& $module_handler->getByDirname('formulaire');
if ( $xoopsUser ){
		if ( $xoopsUser->isAdmin($formulaireModule) ) {
 				$block['content'].= "<a href=".XOOPS_URL."/modules/formulaire/admin/modform.php><img src='".XOOPS_URL."/modules/formulaire/images/key.gif'></a>";
				}
}

//03/04/2006
//Probleme de tri en fonction de l'ordre defini dans le menu
//Ajout de la jointure avec la table menu qui contient les positions 
$sql=sprintf("SELECT id_form,desc_form,admin,groupe,email,expe,url,help,send,msend,msub,mip,mnav,cod FROM ".$xoopsDB->prefix("form_id")." INNER JOIN ".$xoopsDB->prefix("form_menu")." ON ".$xoopsDB->prefix("form_id").".id_form = ".$xoopsDB->prefix("form_menu").".menuid WHERE qcm = 1 order by ".$xoopsDB->prefix("form_menu").".position");
$res = $xoopsDB->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.$xoopsDB->error());
if ($res)
{
	while ($row= $xoopsDB->fetchArray($res))
	{
	$id_form = $row['id_form'];
    	$admin = $row['admin'];
    	$groupe = $row['groupe'];
    	$email = $row['email'];
    	$expe = $row['expe'];
        $title = $myts->makeTboxData4Show($row['desc_form']);
	$url = $row['url'];
	$help = $row['help'];
	$help = $myts->displayTarea($help);
	$send = $row['send'];
	$msend = $row['msend'];
	$msub = $row['msub'];
	$mip = $row['mip'];
	$mnav = $row['mnav'];
	$cod = $row['cod'];

//  	}
//}
$result_form = $xoopsDB->query("SELECT menuid, indent, margintop, marginbottom, itemurl, bold, status FROM ".$xoopsDB->prefix("form_menu")." WHERE menuid=".$id_form." ORDER BY position");

//attention, changer le dirname suivant en cas de renommage du module
//warning, change the following dirname if you change the module's name
$res_mod = $xoopsDB->query("SELECT mid FROM ".$xoopsDB->prefix("modules")." WHERE dirname='formulaire'");
if ($res_mod) {
	while ($row = $xoopsDB->fetchRow($res_mod))
		$module_id = $row[0];
}

$perm_name = 'Permission des catégories';
if (is_object($xoopsUser)) {
	$uid = $xoopsUser->getVar("uid");
} else {
	$groupuser[0] = 3;
	$uid=XOOPS_GROUP_ANONYMOUS;
}

$res_gp = $xoopsDB->query("SELECT groupid FROM ".$xoopsDB->prefix("groups_users_link")." WHERE uid= ".$uid);
if ( $res_gp ) {
  while ( $row = $xoopsDB->fetchRow($res_gp)) {
	$groupuser[] = $row[0];
  }
}

$gperm_handler =& xoops_gethandler('groupperm');

if ($result_form) {
	while ($row =$xoopsDB->fetchRow($result_form)) {
		$menuid = $row[0];
		$indent = $row[1];
		$margintop = $row[2];
		$marginbottom = $row[3];
		$itemurl = $row[4];
		$bold = $row[5];
		$status = $row[6];
	}
}
else
{
	$status = 0;
}

if ( $status == 1 ) {
	$groupid = array();
        $res2 = $xoopsDB->query("SELECT gperm_groupid,gperm_itemid FROM ".$xoopsDB->prefix("group_permission")." WHERE gperm_itemid= ".$menuid." AND gperm_modid=".$module_id);
	if ( $res2 ) {
	  while ( $row = $xoopsDB->fetchRow($res2 ) ) {
		$groupid[] = $row[0];
	  }
	}

$block['content'] .="<style type='text/css'>

#dhtmltooltip{
position: absolute;
width: 150px;
border: 2px solid black;
padding: 2px;
background-color: lightyellow;
visibility: hidden;
z-index: 100;
/*Remove below line to remove shadow. Below line should always appear last within this CSS*/
filter: progid:DXImageTransform.Microsoft.Shadow(color=gray,direction=135);
}

</style>
";


$block['content'] .='<div id="dhtmltooltip"></div>

<script type="text/javascript">

/***********************************************
* Cool DHTML tooltip script- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

var offsetxpoint=-60 //Customize x offset of tooltip
var offsetypoint=20 //Customize y offset of tooltip
var ie=document.all
var ns6=document.getElementById && !document.all
var enabletip=false
if (ie||ns6)
var tipobj=document.all? document.all["dhtmltooltip"] : document.getElementById? document.getElementById("dhtmltooltip") : ""

function ietruebody(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function ddrivetip(thetext, thecolor, thewidth){
if (ns6||ie){
if (typeof thewidth!="undefined") tipobj.style.width=thewidth+"px"
if (typeof thecolor!="undefined" && thecolor!="") tipobj.style.backgroundColor=thecolor
tipobj.innerHTML=thetext
enabletip=true
return false
}
}

function positiontip(e){
if (enabletip){
var curX=(ns6)?e.pageX : event.x+ietruebody().scrollLeft;
var curY=(ns6)?e.pageY : event.y+ietruebody().scrollTop;
//Find out how close the mouse is to the corner of the window
var rightedge=ie&&!window.opera? ietruebody().clientWidth-event.clientX-offsetxpoint : window.innerWidth-e.clientX-offsetxpoint-20
var bottomedge=ie&&!window.opera? ietruebody().clientHeight-event.clientY-offsetypoint : window.innerHeight-e.clientY-offsetypoint-20

var leftedge=(offsetxpoint<0)? offsetxpoint*(-1) : -1000

//if the horizontal distance isnt enough to accomodate the width of the context menu
if (rightedge<tipobj.offsetWidth)
//move the horizontal position of the menu to the left by its width
tipobj.style.left=ie? ietruebody().scrollLeft+event.clientX-tipobj.offsetWidth+"px" : window.pageXOffset+e.clientX-tipobj.offsetWidth+"px"
else if (curX<leftedge)
tipobj.style.left="5px"
else
//position the horizontal position of the menu where the mouse is positioned
tipobj.style.left=curX+offsetxpoint+"px"

//same concept with the vertical position
if (bottomedge<tipobj.offsetHeight)
tipobj.style.top=ie? ietruebody().scrollTop+event.clientY-tipobj.offsetHeight-offsetypoint+"px" : window.pageYOffset+e.clientY-tipobj.offsetHeight-offsetypoint+"px"
else
tipobj.style.top=curY+offsetypoint+"px"
tipobj.style.visibility="visible"
}
}

function hideddrivetip(){
if (ns6||ie){
enabletip=false
tipobj.style.visibility="hidden"
tipobj.style.left="-1000px"
tipobj.style.backgroundColor=""
tipobj.style.width=""
}
}

document.onmousemove=positiontip

</script>';

	$block['content'] .= "<ul>";

    $display = 0;
	$perm_itemid = $menuid; //intval($_GET['category_id']);
        foreach ($groupid as $gr){
               	if ( in_array ($gr, $groupuser) && $display != 1) {
			if (!empty($help))
				{
	                		if ($bold == 1)
	                		$block['content'] .= "<table cellspacing='0' border='0'><div style='margin-left: ".$indent."px; margin-right: 0px; margin-top:".$margintop."px; margin-bottom:".$marginbottom."px; '><LI><a style='font-weight: bold' href='$itemurl' alt='' onMouseOver=\"ddrivetip('$help')\"; onMouseOut=\"hideddrivetip()\">".$title."</a></LI></table>";
	                		else
	                		$block['content'] .= "<table cellspacing='0' border='0'><div style='margin-left: ".$indent."px; margin-right: 0px; margin-top:".$margintop."px; margin-bottom:".$marginbottom."px; '><LI><a style='font-weight: normal' href='$itemurl' alt='' onMouseover=\"ddrivetip('$help')\"; onMouseout=\"hideddrivetip()\">".$title."</a></LI></table>";
				}
	         	else {	if ($bold == 1)
	                		$block['content'] .= "<table cellspacing='0' border='0'><div style='margin-left: ".$indent."px; margin-right: 0px; margin-top:".$margintop."px; margin-bottom:".$marginbottom."px; '><LI><a style='font-weight: bold' href='$itemurl'>".$title."</a></LI></table>";
	                		else
	                		$block['content'] .= "<table cellspacing='0' border='0'><div style='margin-left: ".$indent."px; margin-right: 0px; margin-top:".$margintop."px; margin-bottom:".$marginbottom."px; '><LI><a style='font-weight: normal' href='$itemurl'>".$title."</a></LI></table>";
			     }	
	                		$display = 1;
               	}
               //	else redirect_header(XOOPS_URL."/modules/formulaire/index.php", 1, "pas la permission !!!");
        }
        $block['content'] .= "</ul>";
    }
}
}
	return $block;
}

?>