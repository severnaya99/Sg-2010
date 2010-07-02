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
include "../include/functions.php";

if ( file_exists("../language/".$xoopsConfig['language']."/modinfo.php") ) {
	include "../language/".$xoopsConfig['language']."/modinfo.php";
} 
else {
	include "../language/english/modinfo.php";
}

function MyMenuAdmin() {
        global $xoopsDB, $xoopsConfig, $xoopsModule;
        xoops_cp_header();
form_adminMenu(6, _AM_INDEX);

function modify()
{
        global $xoopsDB, $xoopsConfig, $xoopsModule;

    form_collapsableBar('toptable', 'toptableicon');
 
echo '<DIV id="help" style="visibility:hidden;position:absolute;z-index:1000;top:-100"></DIV>';
echo "<script src='../main15.js' type='text/javascript'></script>";
echo '<SCRIPT language="JavaScript1.2"  type="text/javascript">
Text[10]=["'._AM_CHANGE_STATUS.'","'._AM_CHANGE_STATUS_TEXT.'"]
Text[11]=["'._AM_EDIT_MENU.'","'._AM_EDIT_MENU_TEXT.'"]

Style[1]=["white","#F6B542","","","",,"black","#FFFFFF","","","",,,,2,"#F6C063",2,,,,,"",1,,,]

var TipId="help"
var FiltersEnabled = 0 // [for IE5.5+] if your not going to use transitions or filters in any of the tips set this to zero.
mig_clay()

</SCRIPT>'; 
 
    echo "<img id='toptableicon' src=" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/images/close12.gif alt='' /></a>&nbsp;"._AM_MENUMODIFY."</h3>";
    echo "<div id='toptable'>";

	echo "	<table class='outer' cellspacing='1' width='100%'>
		<th colspan='4'>"._AM_CHANGEMENUITEM."</th>

        <form action='menu_index.php' method='post'>
        <table border='0' cellpadding='0' cellspacing='0' valign='top' width='100%'>
        <tr>
        <td>
                <table width='100%' border='0' cellpadding='4' cellspacing='1'>
                <tr class='head'>
                <td width='30'><b>"._AM_POS_SHORT."</b></td>
                <td><b>"._AM_ITEMNAME."</b></td>
                <td><b>"._AM_INDENT_SHORT."</b></td>
                <td><b>"._AM_MARGIN_TOPSHORT."</b></td>
                <td><b>"._AM_MARGIN_BOTTOMSHORT."</b></td>
                <td><b>"._AM_ITEMURL."</b></td>";
                echo "
                <td><b>"._AM_STATUS."</b></td>
                <td><b>"._AM_ACTION."</b></td>";
                $result = $xoopsDB->query("SELECT menuid, position, itemname, indent, margintop, marginbottom, itemurl, bold, status FROM ".$xoopsDB->prefix("form_menu")." ORDER BY position");
                $myts =& MyTextSanitizer::getInstance();
                while ( list($menuid, $position, $itemname, $indent, $margintop, $marginbottom, $itemurl, $bold, $status) = $xoopsDB->fetchRow($result) ) {
                        $itemname = $myts->makeTboxData4Show($itemname);
                        $itemurl = $myts->makeTboxData4Show($itemurl);
                        if ($position != 0) {
                        echo "<tr class='odd'><td align='center' title='".$position."'><a href=menu_index.php?id=".$menuid."&pos=".$position."&op=ele_up><img src=".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/up.gif /></a>&nbsp;"; }
                        else echo "<tr class='odd'><td align='center' title='".$position."'>";
			echo "<a href=menu_index.php?id=".$menuid."&pos=".$position."&op=ele_down><img src=".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/down.gif /></a></td>";

                        if ($bold == 1) {
                                 echo "<td><b>$itemname</b></td>";
                        } else {
                                 echo "<td>$itemname</td>";
                        }
                        echo "<td>$indent px</td>";
                        echo "<td>$margintop px</td>";
                        echo "<td>$marginbottom px</td>";
                        echo "<td><a href=".$itemurl.">$itemurl</a></td>";

       	   if ($status == 1)
	   {
	   echo '<td class="odd" width="5%"><center><a href="active.php?id='.$menuid.'&status='.$status.'&url=menu_index.php"><img src="../images/on.gif" alt="" onMouseOver="stm(Text[10],Style[1])" onMouseOut="htm()"></a></td>';
	   }	
	   else echo '<td class="odd" width="5%"><center><a href="active.php?id='.$menuid.'&status='.$status.'&url=menu_index.php"><img src="../images/off.gif" alt="" onMouseOver="stm(Text[10],Style[1])" onMouseOut="htm()"></a></td>';

                echo "<td align='center'><a href='menu_index.php?op=MyMenuEdit&amp;menuid=$menuid'><img src=".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/edit.gif alt='' onMouseOver='stm(Text[11],Style[1])' onMouseOut='htm()' /></a></td>
                </tr>";
                }
                echo "</table>
        </td>
        </tr>
        </table>
        </form>
";
	echo "</div>";
}

modify();
}
function MyMenuEdit($menuid) {
        global $xoopsDB, $xoopsConfig, $xoopsModule;
        xoops_cp_header();
form_adminMenu(6, _AM_INDEX);

function modify()
{
        global $xoopsDB, $xoopsConfig, $xoopsModule;

    form_collapsableBar('toptable', 'toptableicon');

echo '<DIV id="help" style="visibility:hidden;position:absolute;z-index:1000;top:-100"></DIV>';
echo "<script src='../main15.js' type='text/javascript'></script>";
echo '<SCRIPT language="JavaScript1.2"  type="text/javascript">
Text[10]=["'._AM_CHANGE_STATUS.'","'._AM_CHANGE_STATUS_TEXT.'"]
Text[11]=["'._AM_EDIT_MENU.'","'._AM_EDIT_MENU_TEXT.'"]

Style[1]=["white","#F6B542","","","",,"black","#FFFFFF","","","",,,,2,"#F6C063",2,,,,,"",1,,,]

var TipId="help"
var FiltersEnabled = 0 // [for IE5.5+] if your not going to use transitions or filters in any of the tips set this to zero.
mig_clay()

</SCRIPT>'; 

    echo "<img id='toptableicon' src=" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/images/close12.gif alt='' /></a>&nbsp;"._AM_MENUMODIFY."</h3>";
    echo "<div id='toptable'>";
//    echo "<span style=\"color: #567; margin: 3px 0 12px 0; font-size: small; display: block; \">" . _AM_BLOCKSTXT . "</span>";

	echo "	<table class='outer' cellspacing='1' width='100%'>
		<th colspan='4'>"._AM_CHANGEMENUITEM."</th>

        <form action='menu_index.php' method='post'>
        <table border='0' cellpadding='0' cellspacing='0' valign='top' width='100%'>
        <tr>
        <td>
                <table width='100%' border='0' cellpadding='4' cellspacing='1'>
                <tr class='head'>
                <td width='30'><b>"._AM_POS_SHORT."</b></td>
                <td><b>"._AM_ITEMNAME."</b></td>
                <td><b>"._AM_INDENT_SHORT."</b></td>
                <td><b>"._AM_MARGIN_TOPSHORT."</b></td>
                <td><b>"._AM_MARGIN_BOTTOMSHORT."</b></td>
                <td><b>"._AM_ITEMURL."</b></td>";
                echo "
                <td><b>"._AM_STATUS."</b></td>
                <td><b>"._AM_ACTION."</b></td>";
                $result = $xoopsDB->query("SELECT menuid, position, itemname, indent, margintop, marginbottom, itemurl, bold, status FROM ".$xoopsDB->prefix("form_menu")." ORDER BY position");
                $myts =& MyTextSanitizer::getInstance();
                while ( list($menuid, $position, $itemname, $indent, $margintop, $marginbottom, $itemurl, $bold, $status) = $xoopsDB->fetchRow($result) ) {
                        $itemname = $myts->makeTboxData4Show($itemname);
                        $itemurl = $myts->makeTboxData4Show($itemurl);
                        if ($position != 0) {
                        echo "<tr class='odd'><td align='center'><a href=menu_index.php?id=".$menuid."&pos=".$position."&op=ele_up><img src=".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/up.gif /></a>&nbsp;"; }
                        else echo "<tr class='odd'><td align='center'>";
			echo "<a href=menu_index.php?id=".$menuid."&pos=".$position."&op=ele_down><img src=".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/down.gif /></a></td>";

                        if ($bold == 1) {
                                 echo "<td><b>$itemname</b></td>";
                        } else {
                                 echo "<td>$itemname</td>";
                        }
                        echo "<td>$indent px</td>";
                        echo "<td>$margintop px</td>";
                        echo "<td>$marginbottom px</td>";
                        echo "<td><a href=".$itemurl.">$itemurl</a></td>";

       	   if ($status == 1)
	   {
	   echo '<td class="odd" width="5%"><center><a href="active.php?id='.$menuid.'&status='.$status.'&url=menu_index.php"><img src="../images/on.gif" alt="" onMouseOver="stm(Text[10],Style[1])" onMouseOut="htm()"></a></td>';
	   }	
	   else echo '<td class="odd" width="5%"><center><a href="active.php?id='.$menuid.'&status='.$status.'&url=menu_index.php"><img src="../images/off.gif" alt="" onMouseOver="stm(Text[10],Style[1])" onMouseOut="htm()"></a></td>';

                echo "<td align='center'><a href='menu_index.php?op=MyMenuEdit&amp;menuid=$menuid'><img src=".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/edit.gif  alt='' onMouseOver='stm(Text[11],Style[1])' onMouseOut='htm()'/></a></td>
                </tr>";
                }
                echo "</table>
        </td>
        </tr>
        </table>
        </form><br /><br />";
	echo "</div>";
}

function edit($menuid) {

        global $xoopsDB, $xoopsConfig, $xoopsModule;
    form_collapsableBar('bottomtable', 'bottomtableicon');
    echo "<img id='bottomtableicon' src=" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/images/close12.gif alt='' /></a>&nbsp;"._AM_MENUEDIT."</h3>";
    echo "<div id='bottomtable'>";

        $result = $xoopsDB->query("SELECT position, itemname, indent, margintop, marginbottom, itemurl, bold, status FROM ".$xoopsDB->prefix("form_menu")." WHERE menuid=$menuid");
        list($xposition, $itemname, $indent, $margintop, $marginbottom, $itemurl, $bold, $status) = $xoopsDB->fetchRow($result);
        $myts =& MyTextSanitizer::getInstance();
        $itemname  = $myts->makeTboxData4Edit($itemname);
        $itemurl   = $myts->makeTboxData4Edit($itemurl);
        
	echo "	<table class='outer' cellspacing='1' width='100%'>
		<th colspan='4'>"._AM_EDITMENUITEM."</th>

        <form action='menu_index.php' method='post'>
        <input type='hidden' name='menuid' value='$menuid' />
        <table border='0' cellpadding='0' cellspacing='0' valign='top' width='100%'>
        <tr>
        <td>
                <table width='100%' border='0' cellpadding='4' cellspacing='1'>
                <tr>
                <td class='head'><b>"._AM_POS."</b></td>
                <td class='odd'><input type='text' name='xposition' size='4' maxlength='4' value='$xposition' />&nbsp&nbsp&nbsp(0000-9999)</td>
                </tr>
                <tr>
                <td class='head'><b>"._AM_ITEMNAME."</b></td>
                <td class='odd'><input type='text' name='itemname' size='50' maxlength='60' value='$itemname' /></td>
                </tr>
                <tr>
                <td class='head'><b>"._AM_INDENT."</b></td>
                <td class='odd'><input type='text' name='indent' size='12' maxlength='12' value='$indent' /> px</td>
                </tr>
                <tr>
                <td class='head'><b>"._AM_FONT."</b></td>
                <td class='odd'>";
                if( $bold == 1 ) {
                       $checked_bold = "checked";  $checked_normal = "";
        } else {
                       $checked_normal = "checked";$checked_bold = "";
               }
                echo "
                <input type='radio' $checked_normal name='bold' value='0'>"._AM_NORMAL."
                <input type='radio' $checked_bold   name='bold' value='1'>"._AM_BOLD."
                </td>
                </tr>
		<tr>
                <td class='head'><b>"._AM_ITEMURL."</b></td>
                <td class='odd'><input type='text' name='itemurl' size='65' maxlength='255' value='$itemurl' /></td>
                </tr>
                <tr>
                <td class='head'><b>"._AM_MARGINTOP."</b></td>
                <td class='odd'><input type='text' name='margintop' size='12' maxlength='12' value='$margintop' /> px</td>
                </tr>
                <tr>
                <td class='head'><b>"._AM_MARGINBOTTOM."</b></td>
                <td class='odd'><input type='text' name='marginbottom' size='12' maxlength='12' value='$marginbottom' /> px</td>
                </tr>";
                echo "
                <tr>
                <td class='head'><b>"._AM_STATUS."</b></td>
                <td class='odd'>";
                if( $status == 1 ) {
                           $checked_active   = "checked";$checked_inactive = "";
               } else {
                           $checked_inactive = "checked";$checked_active   = "";
                      }
                echo "
                <input type='radio' $checked_active   name='status' value='1'>"._AM_ACTIVE."
                <input type='radio' $checked_inactive name='status' value='0'>"._AM_INACTIVE."
                </td>
                </tr>

                <tr>
                <td class='head'>&nbsp;</td>
                <td class='odd'><input type='hidden' name='fct' value='mymenu' /><input type='hidden' name='op' value='MyMenuSave' /><input type='submit' value='"._AM_SAVECHANG."' /></td>
                </tr>
                </table>
        </td>
        </tr>
        </table>

        </form>";
}
modify();
edit($menuid);
}
function MyMenuSave($menuid, $xposition, $itemname, $indent, $margintop, $marginbottom, $itemurl, $bold, $status) {
        global $xoopsDB;
        $myts =& MyTextSanitizer::getInstance();
   		 	$itemname  = $myts->makeTboxData4Save(trim($itemname));
    		$itemurl   = $myts->makeTboxData4Save(trim($itemurl));
if ($indent == '') {$indent = 0;}
if ($margintop == '') {$margintop = 0;}
if ($marginbottom == '') {$marginbottom = 0;}

        $xoopsDB->query("UPDATE ".$xoopsDB->prefix("form_menu")." SET position=$xposition, itemname='$itemname', indent='$indent', margintop='$margintop', marginbottom='$marginbottom', itemurl='$itemurl', bold=$bold, status=$status WHERE menuid=$menuid");

		$url = "menu_index.php?op=MyMenuAdmin";
		Header("Location: $url");

        exit();
}

function MyMenuAdd($xposition, $itemname, $indent, $margintop, $marginbottom, $itemurl, $bold, $status) {
        global $xoopsDB;
        $myts =& MyTextSanitizer::getInstance();
    		$itemname  = $myts->makeTboxData4Save(trim($itemname));
    		$itemurl   = $myts->makeTboxData4Save(trim($itemurl));
        $newid = $xoopsDB->genId($xoopsDB->prefix("form_menu")."_menuid_seq");
        
    		$xoopsDB->query("INSERT INTO ".$xoopsDB->prefix("form_menu")." (menuid, position, itemname, indent, margintop, marginbottom, itemurl, bold, status) VALUES ('$newid', '$xposition', '$itemname', '$indent', '$margintop', '$marginbottom', '$itemurl', '$bold', '0', '$mainmenu', '$status')");

		$url = "menu_index.php?op=MyMenuAdmin";
		Header("Location: $url");
		
    exit();
}

function ele_up($id, $pos)
{
	global $xoopsDB, $_POST, $eh;

	$pos2 = $pos -1;

	$sql = sprintf("UPDATE %s SET position='%s' WHERE menuid='%s'",$xoopsDB->prefix("form_menu"),$pos2,$id);
	$xoopsDB->queryF($sql) or $eh->show("error");
	$url = "menu_index.php";
	Header("Location: $url");
}

function ele_down($id, $pos)
{
	global $xoopsDB, $_POST, $eh;

	$pos2 = $pos +1;

	$sql = sprintf("UPDATE %s SET position='%s' WHERE menuid='%s'",$xoopsDB->prefix("form_menu"),$pos2,$id);
	$xoopsDB->queryF($sql) or $eh->show("error");
	$url = "menu_index.php";
	Header("Location: $url");
}
 
 if (!ini_get("register_globals")){
   foreach ($_REQUEST as $k=>$v){
       if (!isset($GLOBALS[$k])){
           ${$k}=$v;
       }
   }
}
 
if (!isset($op)) {
    $op = '';
}

if (isset($_POST))
{
    foreach ($_POST as $k => $v)
    {
        $$k = $v;
    } 
} 

if (isset($_GET))
{
    foreach ($_GET as $k => $v)
    {
        $$k = $v;
    } 
}

switch($op) {
        case "MyMenuAdd":
                MyMenuAdd($xposition, $itemname, $indent, $margintop, $marginbottom, $itemurl, $bold, $status);
                break;
        case "MyMenuSave":
                MyMenuSave($menuid, $xposition, $itemname, $indent, $margintop, $marginbottom, $itemurl, $bold, $status);
                break;
        case "MyMenuAdmin":
                MyMenuAdmin();
                break;
        case "MyMenuEdit":
                MyMenuEdit($menuid);
                break;
        case "ele_up":
                ele_up($id, $pos);
                break;
        case "ele_down":
                ele_down($id, $pos);
                break;
        default:
                MyMenuAdmin();
                break;
}

include 'footer.php';
xoops_cp_footer();
?>