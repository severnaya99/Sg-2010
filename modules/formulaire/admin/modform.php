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
* This is the file where the form can be managed
*
* @copyright	The XOOPS project http://www.xoops.org/
* @license    http://www.fsf.org/copyleft/gpl.html GNU public license
* @author     Philou <philou@xoops.org>
* @since      3.0
* @version		$Id: $
* @package 		Formulaire

*/
include_once("admin_header.php");

if ( file_exists("../language/".$xoopsConfig['language']."/modinfo.php") ) {
	include "../language/".$xoopsConfig['language']."/modinfo.php";
}
else {
	include "../language/english/modinfo.php";
}


if ( file_exists("../language/".$xoopsConfig['language']."/main.php") ) {
	include "../language/".$xoopsConfig['language']."/main.php";
} else {
	include "../language/english/main.php";
}

if(!isset($_POST['op'])){
	$op = isset ($_GET['op']) ? $_GET['op'] : 'main';
}else {
	$op = $_POST['op'];
}
if(!isset($_POST['id'])){
	$id = isset ($_GET['id']) ? $_GET['id'] : '0';
}else {
	$id = $_POST['id'];
}

// Include the perms class
include_once XOOPS_ROOT_PATH.'/class/xoopsform/grouppermform.php';

// get the module id
$module_id = $xoopsModule->getVar('mid'); 

$n = 0;
$m = 0;

// Include the functions
include "../include/functions.php";
include_once XOOPS_ROOT_PATH."/class/xoopstree.php";
include_once XOOPS_ROOT_PATH."/class/xoopslists.php";
include_once XOOPS_ROOT_PATH."/include/xoopscodes.php";
include_once XOOPS_ROOT_PATH."/class/module.errorhandler.php";
xoops_cp_header();

$myts =& MyTextSanitizer::getInstance();
$eh = new ErrorHandler;

global $title2, $op, $data, $status;

//Select the forms
	$db =& Database::getInstance();
	$sql="SELECT distinct desc_form, id_form FROM ".$xoopsDB->prefix("form_id");
	$res = $db->query($sql);

if ( $res ) {
  while ( $row = $db->fetchRow( $res ) ) {
    $data[$row[1]] = $row[0];
								// select only actives forms
                $result = $db->query("SELECT status FROM ".$xoopsDB->prefix("form_menu")." WHERE menuid=".$row[1]);
		if ($result) {
		while ( $r = $db->fetchRow( $result ) ) {
			$status[$row[1]] = $r[0];
			}
		}
	}
}

// table with the legend
echo '<DIV id="help" style="visibility:hidden;position:absolute;z-index:1000;top:-100"></DIV>';
echo "<script src='../main15.js' type='text/javascript'></script>";
echo '<SCRIPT language="JavaScript1.2"  type="text/javascript">
Text[4]=["'._AM_REN.'","'._AM_REN_TEXT.'"]
Text[5]=["'._AM_SUP.'","'._AM_SUP_TEXT.'"]
Text[6]=["'._AM_MODIF.'","'._AM_MODIF_TEXT.'"]
Text[7]=["'._AM_LISTE.'","'._AM_LISTE_TEXT.'"]
Text[8]=["'._AM_DEST.'","'._AM_DEST_TEXT.'"]
Text[9]=["'._AM_SEE_FORM.'","'._AM_SEE_FORM_TEXT.'"]
Text[10]=["'._AM_CHANGE_STATUS.'","'._AM_CHANGE_STATUS_TEXT.'"]
Text[11]=["'._AM_EXPORT.'","'._AM_EXPORT_TEXT.'"]
Text[12]=["'._AM_CLONE.'","'._AM_CLONE_TEXT.'"]

Style[1]=["white","#F6B542","","","",,"black","#FFFFFF","","","",,,,2,"#F6C063",2,,,,,"",1,,,]

var TipId="help"
var FiltersEnabled = 0 // [for IE5.5+] if your not going to use transitions or filters in any of the tips set this to zero.
mig_clay()

</SCRIPT>';

/******************* List of the forms *******************/

if( $op != 'addform' && $op != 'modform' && $op != 'renform' && $op != 'delform' && $op != 'showform' && $op != 'permform') {
	form_adminMenu(2, _AM_INDEX);
	if (!$data) echo "<br><div style='color: red; font-weight: bold; text-decoration: blink ; font-size: x-large; text-align:center'>"._AM_NOFORM."</div>";
	if ($data) {
    	form_collapsableBar('toptable','toptableicon');
    	echo "<img id='toptableicon' src=" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/images/close12.gif alt='' /></a>&nbsp;"._FORM_ICO."</h3>";
    	echo "<div id='toptable'>";
		echo "
			<fieldset>
			<li><img src='../images/dupliquer.gif' height='15' width='15'> : <b>"._AM_CLONE."</b> "._AM_CLONE_TEXT."
			<li><img src='../images/editdelete.gif' height='15' width='15'> : <b>"._AM_SUP."</b> "._AM_SUP_TEXT."
			<li><img src='../images/kedit.gif' height='15' width='15'> : <b>"._AM_MODIF."</b> "._AM_MODIF_TEXT."
			<li><img src='../images/kfind.gif' height='15' width='15'> : <b>"._AM_LISTE."</b> "._AM_LISTE_TEXT."
			<li><img src='../images/params.gif' height='15' width='15'> : <b>"._AM_DEST."</b> "._AM_DEST_TEXT."
			<li><img src='../images/export.gif' height='15' width='15'> : <b>"._AM_EXPORT."</b> "._AM_EXPORT_TEXT."
			<li><img src='../images/form.gif' height='15' width='15'> : <b>"._AM_SEE_FORM."</b> "._AM_SEE_FORM_TEXT."
			<li><img src='../images/on.gif' height='15' width='15'> : <b>"._AM_CHANGE_STATUS."</b> "._AM_CHANGE_STATUS_ACTIVE."
			<li><img src='../images/off.gif' height='15' width='15'> : <b>"._AM_CHANGE_STATUS."</b> "._AM_CHANGE_STATUS_DESACTIVE."
			</fieldset></div>";
		echo '<br><br><table class="outer" width="100%">
			<th><center>'._AM_FORMUL.'</center></th>
			<th colspan="7"><center>'._FORM_ACT.'</center></th>
			<th><center>'._AM_STAT.'</center></th>';
		foreach($data as $id => $titre) {
   			$titre = $myts->displayTarea($titre);
   			echo '<tr><td class="head" ALIGN="center" width="30%">'.$titre.'</td>';
   			echo '<td class="odd" align="center"><A HREF="modform.php?id='.$id.'&op=cloneform">	<img src="../images/dupliquer.gif" alt=""  onMouseOver="stm(Text[12],Style[1])" onMouseOut="htm()">  </a></td>';
   			echo '<td class="odd" align="center"><A HREF="modform.php?id='.$id.'&op=delform">	<img src="../images/editdelete.gif" alt=""  onMouseOver="stm(Text[5],Style[1])" onMouseOut="htm()">  </a></td>';
   			echo '<td class="odd" align="center"><A HREF="modform.php?id='.$id.'&op=modform">  <img src="../images/kedit.gif" alt=""  onMouseOver="stm(Text[6],Style[1])" onMouseOut="htm()">  </a></td>';
   			echo '<td class="odd" align="center"><A HREF="modform.php?id='.$id.'&op=showform">  <img src="../images/kfind.gif" alt=""  onMouseOver="stm(Text[7],Style[1])" onMouseOut="htm()">  </a></td>';
   			echo '<td class="odd" align="center"><A HREF="mailindex.php?id='.$id.'">			<img src="../images/params.gif" alt=""  onMouseOver="stm(Text[8],Style[1])" onMouseOut="htm()">  </a></td>';
   			echo '<td class="odd" align="center"><A HREF="export.php?id='.$id.'"><img src="../images/export.gif" alt="" onMouseOver="stm(Text[11],Style[1])" onMouseOut="htm()"></a></td>';
   			echo '<td class="odd" align="center"><A HREF="../formulaire.php?id='.$id.'"><img src="../images/form.gif" alt="" onMouseOver="stm(Text[9],Style[1])" onMouseOut="htm()"></a></td>';
   			if ($status[$id] == 1) {
				echo '<td class="odd" width="5%"><center><a href="active.php?id='.$id.'&status='.$status[$id].'&url=modform.php"><img src="../images/on.gif" alt="" onMouseOver="stm(Text[10],Style[1])" onMouseOut="htm()"></a></td>';
			} else {
				echo '<td class="odd" width="5%"><center><a href="active.php?id='.$id.'&status='.$status[$id].'&url=modform.php"><img src="../images/off.gif" alt="" onMouseOver="stm(Text[10],Style[1])" onMouseOut="htm()"></a></td>';
			}
		}
		echo '</tr></table>';
	}
}


/**
* This function add the form in the database
*
* @param varchar $desc_form		title of the form
* @param varchar $admin  		  value 1 if the admin must receive the form (and no one)
* @param varchar $groupe  		number of the group who must receive the form (blank if any)
* @param varchar $email  		  email address to send the filed form
* @param varchar $expe  		  value 1 if the sender must receive the form
*
* @todo checkEmail($email,$antispam = false) better than actual regular expression
* @todo change the way to manage the ' in the title of the form

*/
function addform()
{
	global $xoopsDB, $_POST, $myts, $eh;
	$data[$title] = $myts->makeTboxData4Save($_POST["desc_form"]);
	$admin = $myts->makeTboxData4Save($_POST["admin"]);
	$groupe = $myts->makeTboxData4Save($_POST["groupe"]);
	$email = $myts->makeTboxData4Save($_POST["email"]);
	$expe = $myts->makeTboxData4Save($_POST["expe"]);
	if (empty($data[$title])) {
		redirect_header("modform.php", 2, _MD_ERRORTITLE);
	}
	if((!empty($email)) && (!eregi("^[_a-z0-9.-]+@[a-z0-9.-]{2,}[.][a-z]{2,3}$",$email))){
		redirect_header("modform.php", 2, _MD_ERROREMAIL);
	}
	if (empty($email) && empty($admin) && $groupe=="0" && empty($expe)) {
		redirect_header("modform.php", 2, _MD_ERRORMAIL);
	}
	$data[$title] = stripslashes($data[$title]);
	$data[$title] = eregi_replace ("'", "`", $data[$title]);
	$data[$title] = eregi_replace ('"', "`", $data[$title]);
	$data[$title] = eregi_replace ('&', "_", $data[$title]);

	$sql = sprintf("INSERT INTO %s (desc_form, admin, groupe, email, expe) VALUES ('%s', '%s', '%s', '%s', '%s')", $xoopsDB->prefix("form_id"), $data[$title], $admin, $groupe, $email, $expe);
	$xoopsDB->queryF($sql) or $eh->show("error : cannot insert the form in the form_id table (modform.php / addform())");

	$sql2 = sprintf("INSERT INTO %s (itemname,itemurl) VALUES ('%s', '%s')", $xoopsDB->prefix("form_menu"), $title, XOOPS_URL.'/modules/'.$modversion["dirname"].'/formulaire.php?title='.$data[$title].'');
	$xoopsDB->queryF($sql2) or $eh->show("error : cannot insert values in the form_menu table (modform.php / addform())");

		$url = "index.php?id=$id";
		Header("Location: $url");

}

/**
* This function clone a form
*
* @param varchar $id	id of the original form
*
*/
function cloneform()
{
	global $xoopsDB, $_POST, $myts, $eh, $id, $xoopsmodule;
	if (empty($id)) {
				redirect_header("modform.php", 2, "ID VIDE");
	}

// add the head original value in the table form_id
$sql=sprintf("SELECT * FROM ".$xoopsDB->prefix("form_id")." WHERE id_form='%s'",$id);
$res = $xoopsDB->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.$xoopsDB->error().' <br> cannot read the original form in the form_id table (modform.php / cloneform())');
if ($res)
{
	while ($row= $xoopsDB->fetchArray($res))
	{
  $title = $myts->makeTboxData4Save($row['desc_form']);
  $admin = $myts->makeTboxData4Save($row['admin']);
  $groupe = $myts->makeTboxData4Save($row['groupe']);
  $email = $myts->makeTboxData4Save($row['email']);
  $expe = $myts->makeTboxData4Save($row['expe']);
	$url = $myts->makeTboxData4Save($row['url']);
	$help = $myts->makeTboxData4Save($row['help']);
	$send = $myts->makeTboxData4Save($row['send']);
	$msend = $myts->makeTboxData4Save($row['msend']);
	$msub = $myts->makeTboxData4Save($row['msub']);
	$mip = $myts->makeTboxData4Save($row['mip']);
	$mnav = $myts->makeTboxData4Save($row['mnav']);
	$cod = $myts->makeTboxData4Save($row['cod']);
	$save = $myts->makeTboxData4Save($row['save']);
	$onlyone = $myts->makeTboxData4Save($row['onlyone']);
	$image = $myts->makeTboxData4Save($row['image']);
	$nbjours = $row['nbjours'];
	$afftit = $myts->makeTboxData4Save($row['afftit']);
	$affimg = $myts->makeTboxData4Save($row['affimg']);
	$ordre = $row['ordre'];
	$qcm = $myts->makeTboxData4Save($row['qcm']);
	$affres = $myts->makeTboxData4Save($row['affres']);
	$affrep = $myts->makeTboxData4Save($row['affrep']);
  $idd = $id + 1;
}

	$sql = sprintf("INSERT INTO %s (id_form, desc_form, admin, groupe, email, expe, url, help, send, msend, msub, mip, mnav, cod, save, onlyone, image, nbjours, afftit, affimg, ordre, qcm, affres, affrep) VALUES (%u, '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", $xoopsDB->prefix("form_id"), $idd, $title, $admin, $groupe, $email, $expe, $url, $help, $send, $msend, $msub, $mip, $mnav, $cod, $save, $onlyone, $image, $nbjours, $afftit, $affimg, $ordre, $qcm, $affres, $affrep);

	$xoopsDB->queryF($sql) or die('Erreur insertion : <br />' . $sql . '<br />'); 
}

// add the body original values in the table form
$sql= "SELECT * FROM ".$xoopsDB->prefix("form")." WHERE id_form=$id";
$res = $xoopsDB->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.$xoopsDB->error().' <br> cannot read the original form in the form_id table (modform.php / cloneform())');
if ($res)
{
	while ($row= $xoopsDB->fetchArray($res))
	{
  $id_form = $idd;
  $ele_type = $row['ele_type'];
  $ele_caption = $row['ele_caption'];
  $ele_order = $row['ele_order'];
	$ele_req = $row['ele_req'];
	$ele_value = $row['ele_value'];
	$ele_display = $row['ele_display'];

	$ele_caption = addslashes($ele_caption);
	$ele_value = addslashes($ele_value);


	$sql = sprintf("INSERT INTO ".$xoopsDB->prefix('form')." (id_form, ele_type, ele_caption, ele_order, ele_req, ele_value, ele_display) VALUES (%u,'%s','%s',%u, %u, '%s',%u )",
	$id_form, $ele_type,$ele_caption, $ele_order, $ele_req, $ele_value, $ele_display );
	
	$xoopsDB->queryF($sql) or die('Erreur insertion : <br />' . $sql . '<br />'); 
}
}

// add the original value in the table form_menu

$sql=sprintf("SELECT * FROM ".$xoopsDB->prefix("form_menu")." WHERE menuid='%s'",$id);
$res = $xoopsDB->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.$xoopsDB->error().' <br> cannot read the original form in the form_menu table (modform.php / cloneform())');
if ($res)
{
	while ($row= $xoopsDB->fetchArray($res))
	{
	$position = $row['position'];
	$indent = $row['indent'];
	$itemname = $myts->makeTboxData4Save($row['itemname']);
	$margintop = $myts->makeTboxData4Save($row['margintop']);
	$marginbottom = $myts->makeTboxData4Save($row['marginbottom']);
	$bold = $row['bold'];
	$status = 1;
  $idd = $id+1;
	$itemurl = XOOPS_URL.'/modules/formulaire/formulaire.php?title='.$idd.'';
}

	$sql2 = sprintf("INSERT INTO %s (menuid, position, indent, itemname, margintop, marginbottom, itemurl, bold, status) VALUES (%u, %u, %u, '%s', '%s', '%s', '%s', %u, %u)", $xoopsDB->prefix("form_menu"), $idd, $position, $indent, $itemname, $margintop, $marginbottom, $itemurl, $bold, $status);
echo $sql2;
	$xoopsDB->queryF($sql2) or $eh->show("error : cannot insert values in the form_menu table (modform.php / cloneform())");

}

		$url = "modform.php";
		Header("Location: $url");
}


/**
* This function rename the form in the database
*
* @param string $op 		type of action : renform
* @param int    $id		  id of the form
* @param string $title  old title to replace
* @param string $title2 new title
*
* @todo change the way to manage the ' in the title of the form

*/
function renform()
{
	global $xoopsDB, $_POST, $myts, $eh, $title, $title2, $data;
	$title2 = $myts->makeTboxData4Save($_POST["title2"]);

	if (empty($id)) {
		redirect_header("modform.php", 2, _MD_ERRORTITLE);
	}
	$title2 = stripslashes($title2);
	$title2 = eregi_replace ("'", "`", $title2);
	$title2 = eregi_replace ('"', "`", $title2);
	$title2 = eregi_replace ('&', "_", $title2);

	$sql = sprintf("UPDATE %s SET desc_form='%s' WHERE id_form='%s'", $xoopsDB->prefix("form_id"), $title2, $id);
	$xoopsDB->queryF($sql) or $eh->show("error : cannot rename the form in the form_id table (modform.php / renform())");

	$sql2 = sprintf("UPDATE %s SET itemname='%s',itemurl='%s' WHERE menuid='%s'", $xoopsDB->prefix("form_menu"), $title2, XOOPS_URL.'/modules/'.$modversion["dirname"].'/formulaire.php?id='.$id, $id);
	$xoopsDB->query($sql2) or $eh->show("error : cannot rename the form in the form_menu table (modform.php / renform())");

		$url = "modform.php";
		Header("Location: $url");

}

/**
* This function........ I don't remember the goal of this function !!!!!!
* @param string $op type of action : modform

*/
function modform()
{
	global $xoopsDB, $_POST, $myts, $eh, $title, $data, $id;

	if (empty($id)) {
		redirect_header("modform.php", 2, _MD_ERRORTITLE);
	}
	$url = "index.php?id=$id";
 	redirect_header($url,0,'');

}

/**
* This function delete the form in the tables
*
* @param int    $id id of the form
* @param string $op type of action : delform
* @param string $ok validation

*/
function delform()
{
	global $xoopsDB, $_POST, $myts, $eh, $title, $data, $id;

    if (!isset($_POST['ok'])) {

form_adminMenu(2, _AM_FORMS);
	echo '
	<table class="outer" width="100%">
	<th><center>'._AM_DELETE.'</center></th>
	</table>';

        xoops_confirm(array( 'op' => 'delform', 'id' => $_GET['id'], 'ok' => 1), 'modform.php', _AM_DELETE_FORM );
	} else {
		$sql=sprintf("SELECT desc_form FROM ".$xoopsDB->prefix("form_id")." WHERE id_form='%s'",$id);
		$res = $xoopsDB->query ( $sql ) or die('Erreur SQL !<br>'.$requete.'<br>'.$XoopsDB->error());
		if ( $res ) {
  			while ( $row = $xoopsDB->fetchRow( $res ) ) {
    			$title = $row[0];
  			}
		}
		$sql = sprintf("DELETE FROM %s WHERE id_form = '%s'", $xoopsDB->prefix("form_id"), $id);
		$xoopsDB->queryF($sql) or $eh->show("error : cannot delete the form in the form_id table (modform.php / delform())");

		$sql = sprintf("DELETE FROM %s WHERE id_form = '%u'", $xoopsDB->prefix("form"), $id);
		$xoopsDB->queryF($sql) or $eh->show("error : cannot delete the form in the form table (modform.php / delform())");

		$sql = sprintf("DELETE FROM %s WHERE menuid = '%s'", $xoopsDB->prefix("form_menu"), $id);
		$xoopsDB->queryF($sql) or $eh->show("error : cannot delete the form in the form_menu table (modform.php / delform())");

		$sql = sprintf("DELETE FROM %s WHERE id_form = '%u'", $xoopsDB->prefix("form_form"), $id);
		$xoopsDB->queryF($sql) or $eh->show("error : cannot delete the form in the form_form table (modform.php / delform())");

		$perm_name = 'Permission des catégories';
		//xoops_groupperm_deletebymoditem ($module_id>$perm_name>$id_form) ;

		$url = "modform.php";
		Header("Location: $url");

	}
}

function showform()
{
	global $xoopsDB, $_POST, $myts, $eh, $title, $data, $id;
	if (empty($id)) {
		redirect_header("modform.php", 2, _MD_ERRORTITLE);
	}

	$sql = "SELECT count(*) FROM ".$xoopsDB->prefix("form_form")." WHERE id_form= ".$id;
	$res = $xoopsDB->query($sql);
	if ($res){
       		list($count) = $xoopsDB->fetchRow($res);
		if ($count == 0)
		{
		redirect_header("consult.php",2,_FORMULAIRE_NOTSHOW.$data[$title]._FORMULAIRE_NOTSHOW2);
		}
		else {
		$url = "consult.php?id=$id";
		Header("Location: $url");

		}
	}


}

function permform()
{
	global $xoopsDB, $xoopsModule;
	$module_id = $xoopsModule->getVar('mid');
$myts =& MyTextSanitizer::getInstance();

form_adminMenu(4, _AM_MODPERM);

	$sql="SELECT id_form,desc_form FROM ".$xoopsDB->prefix("form_id");
	$res = $xoopsDB->query($sql);
	if ( $res ) {
		$tab = array();
		while ( $row = $xoopsDB->fetchArray($res) ) {
		    $row['desc_form'] = $myts->displayTarea($row['desc_form']);
		    $tab[$row['id_form']] = $row['desc_form']." (".$row['id_form'].")";
		  }
	}
// !! ne pas tenter de coder en html les traductions de ces deux 'define' -> les permissions ne sont plus réaffichées.

	$title_of_form = _AM_TITPERM;
	$perm_name = _AM_CATPERM;
	$perm_desc = '';
	$form = new XoopsGroupPermForm('<table class="outer" cellspacing="1" width="100%"><th><font size="2">'.$title_of_form.'</font></th></table>', $module_id, $perm_name, $perm_desc);
	foreach($tab as $item_id => $item_name) {
		if($item_name != "") $form->addItem($item_id, $item_name);
	}
	echo $form->render();
}

switch ($op) {
case "addform":
	addform();
	break;
case "cloneform":
	cloneform();
	break;
case "renform":
	renform();
	break;
case "modform":
	modform();
	break;
case "delform":
	delform();
	break;
case "showform":
	showform();
	break;
case "permform":
	permform();
	break;
}

include 'footer.php';
    xoops_cp_footer();
?>