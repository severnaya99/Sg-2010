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

include("admin_header.php");
global $xoopsDB, $xoopsConfig;
$myts =& MyTextSanitizer::getInstance();

if ( file_exists("../language/".$xoopsConfig['language']."/modinfo.php") ) {
	include "../language/".$xoopsConfig['language']."/modinfo.php";
} 
else {
	include "../language/english/modinfo.php";
}


if( is_dir(FORMULAIRE_ROOT_PATH."/language/".$xoopsConfig['language']."/mail_template") ){
	$template_dir = FORMULAIRE_ROOT_PATH."/language/".$xoopsConfig['language']."/mail_template";
}else{
	$template_dir = FORMULAIRE_ROOT_PATH."/language/english/mail_template";
}
if ( file_exists("../language/".$xoopsConfig['language']."/main.php") ) {
	include "../language/".$xoopsConfig['language']."/main.php";
} else {
	include "../language/english/main.php";
}

include "../include/functions.php";

xoops_cp_header();
form_adminMenu(7, _AM_CSV);

if(!isset($_POST['form'])){
	$form = isset ($_GET['form']) ? $_GET['form'] : '1';
}else {
	$form = $_POST['form'];
}
if(!isset($_POST['req'])){
	$req = isset ($_GET['req']) ? $_GET['req'] : '';
}else {
	$req = $_POST['req'];
}

if(!isset($_POST['id'])){
	$id = isset ($_GET['id']) ? $_GET['id'] : '';
}else {
	$id = $_POST['id'];
}

if(!isset($_POST['op'])){
	$op = isset ($_GET['op']) ? $_GET['op'] : '';
}else {
	$op = $_POST['op'];
}

if (empty($id) && file_exists("../../../uploads/formulaire/form.csv") ) {
	unlink("../../../uploads/formulaire/form.csv");
	} 
	
echo '<DIV id="help" style="visibility:hidden;position:absolute;z-index:1000;top:-100"></DIV>';
echo "<script src='../main15.js' type='text/javascript'></script>";
echo '<SCRIPT language="JavaScript1.2"  type="text/javascript">
Text[1]=["'._AM_SAVE_AS.'","'._AM_SAVE_AS_TEXT.'"]

Style[1]=["white","#F6B542","","","",,"black","#FFFFFF","","","",,,,2,"#F6C063",2,,,,,"",1,,,]

var TipId="help"
var FiltersEnabled = 0 // [for IE5.5+] if your not going to use transitions or filters in any of the tips set this to zero.
mig_clay()

</SCRIPT>';

if (!empty($id) && empty($op)) {
	/************* Building file *************/
	$req = array();
	$req[] = array();
	$tmp0 = $tmp1 = 0;
	$sql = "SELECT * FROM " . $xoopsDB->prefix("form_form")." WHERE id_form=".$id;
	$result = $xoopsDB->query($sql) or die("Requete SQL ligne 53");
	if ($result) {
		while ($row = $xoopsDB->fetchArray($result)) {
	       		$req[$row["ele_id"]][0] = $row["id_form"];
	       		$req[$row["ele_id"]][1] = $row["id_req"];
	       		$req[$row["ele_id"]][2] = $row["ele_type"];
	       		$req[$row["ele_id"]][3] = $row["ele_caption"];
	       		$req[$row["ele_id"]][4] = $row["ele_value"];
	       		$req[$row["ele_id"]][5] = $row["uid"];
	       		$req[$row["ele_id"]][6] = $row["date"];
	       		$row["ele_id"] = $row["id_req"];
          	}
	}
	$fp = fopen ("../../../uploads/formulaire/form.csv", "w") or die ("Fichier non créé");

	$msg = 'Formulaire;Requete;Titre;;;;Valeur
';

	foreach ($req as $ele_id => $v) {
		if ($tmp0 == $v[0] && $tmp1 == $v[1])
			$msg .= ';;'.$v[3].';;;;'.$v[4].'
';
		else if ($v[3] != null)
			$msg .= '
'.$v[0].';'.$v[1].';'.$v[3].';;;;'.$v[4].'
';
		$tmp0 = $v[0];
		$tmp1 = $v[1];
	}

	fwrite ($fp, $msg) or die("Fichier non écrit");
	fclose ($fp) or die ("fichier non fermé");

	echo '<script language="JavaScript">
 	document.window.location("../../../uploads/formulaire/form.csv");
	</script>';
	echo '<META HTTP-EQUIV="refresh" CONTENT="5; URL="../../../uploads/formulaire/form.csv">';

	redirect_header("export.php?op=1&id=".$id, 2, _FORM_EXP_CREE);
}
else if (empty($id) && empty($op)){
	$db =& Database::getInstance();
	$sql="SELECT distinct desc_form, id_form FROM ".$xoopsDB->prefix("form_id");
	$res = $db->query($sql);

if ( $res ) {
  while ( $row = $db->fetchRow( $res ) ) {
    $data[$row[1]] = $row[0];
 	}	
}

	echo "<table class='outer' width='100%'><td><img src='../images/attention.gif'> "._AM_EXCSV."</td></table>";

	echo '
	<br /><br /><table class="outer" width="100%">

	<th>'._AM_FORMUL.'</th>';
	
	foreach($data as $id => $titre) {
	$titre = $myts->displayTarea($titre);

	   echo '<tr><td class="head" ALIGN=center><a href="export.php?id='.$id.'">'.$titre.'</a></td></tr>';
	}
	echo '</table>';
	
}
else if (!empty($id) && $op=='1'){
	$db =& Database::getInstance();
	$sql="SELECT distinct desc_form, id_form FROM ".$xoopsDB->prefix("form_id");
	$res = $db->query($sql);

$idex = $id;

if ( $res ) {
  while ( $row = $db->fetchRow( $res ) ) {
    $data[$row[1]] = $row[0];
 	}	
}
	echo "<table class='outer' width='100%'><td><img src='../images/attention.gif'> "._AM_EXCSV."</td></table>";
	echo '
	<br /><br /><table class="outer" width="100%">

	<th colspan="2">'._AM_FORMUL.'</th>';
	
	foreach($data as $id => $titre) {
	$titre = $myts->displayTarea($titre);
	   if ($idex == $id){  
/*
	   echo '<tr><td class="head" ALIGN=center><a href="export.php?id='.$id.'">'.$titre.'</a></td><td class="head" ALIGN=center width="5%"><a href="../../../uploads/formulaire/form.csv" target="_blank"><img src="../images/xls.gif" alt="" onMouseOver="stm(Text[1],Style[1])" onMouseOut="htm()"></a></td></tr>';
*/

ob_clean();
$data = file_get_contents("../../../uploads/formulaire/form.csv");
header("Content-Type:text/comma-separated-values");
header("Content-Disposition:attachment; filename=form.csv");
echo $data;

	redirect_header("export.php", 1, "");

	}
	else {
	   echo '<tr><td class="head" ALIGN=center><a href="export.php?id='.$id.'">'.$titre.'</a></td><td class="head" width="5%"></td></tr>';
	}
}
	echo '</table>';
}

include 'footer.php';
    xoops_cp_footer();

?>