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

include_once "../include/functions.php";

$myts =& MyTextSanitizer::getInstance();

if ( file_exists("../language/".$xoopsConfig['language']."/main.php") ) {
	include "../language/".$xoopsConfig['language']."/main.php";
} else {
	include "../language/english/main.php";
}

if ( file_exists("../language/".$xoopsConfig['language']."/modinfo.php") ) {
	include "../language/".$xoopsConfig['language']."/modinfo.php";
}
else {
	include "../language/english/modinfo.php";
}

global $xoopsDB, $xoopsConfig;

if( is_dir(FORMULAIRE_ROOT_PATH."/language/".$xoopsConfig['language']."/mail_template") ){
	$template_dir = FORMULAIRE_ROOT_PATH."/language/".$xoopsConfig['language']."/mail_template";
}else{
	$template_dir = FORMULAIRE_ROOT_PATH."/language/english/mail_template";
}
        xoops_cp_header();
form_adminMenu(3, _AM_FORMS);
if(!isset($_POST['form'])){
	$id = isset ($_GET['id']) ? $_GET['id'] : '0';
}else {
	$id = $_POST['id'];
}
if(!isset($_POST['req'])){
	$req = isset ($_GET['req']) ? $_GET['req'] : '';
}else {
	$req = $_POST['req'];
}
if(!isset($_POST['op'])){
	$op = isset ($_GET['op']) ? $_GET['op'] : '';
}else {
	$op = $_POST['op'];
}

if(!isset($_POST['ordre'])){
	$ordre = isset ($_GET['ordre']) ? $_GET['ordre'] : '';
}else {
	$ordre = $_POST['ordre'];
}

echo '<DIV id="help" style="visibility:hidden;position:absolute;z-index:1000;top:-100"></DIV>';
echo "<script src='../main15.js' type='text/javascript'></script>";
echo '<SCRIPT language="JavaScript1.2"  type="text/javascript">
Text[1]=["'._AM_SUP.'","'._AM_SUP_ONE.'"]
Text[2]=["'._AM_SUP.'","'._AM_SUP_ALL.'"]
Text[3]=["'._AM_STATIS.'","'._AM_STAT_TEXT.'"]

Style[1]=["white","#F6B542","","","",,"black","#FFFFFF","","","",,,,2,"#F6C063",2,,,,,"",1,,,]

var TipId="help"
var FiltersEnabled = 0 // [for IE5.5+] if your not going to use transitions or filters in any of the tips set this to zero.
mig_clay()

</SCRIPT>';

/************* Affichage de tous les enregistrements *************/

if ($id == '0' && $req == null && $op == null)
{
	$sql="SELECT distinct desc_form, id_form, qcm FROM ".$xoopsDB->prefix("form_id");
	$res = $xoopsDB->query($sql);
$nbq=0;

if ( $res ) {
  while ( $row = $xoopsDB->fetchRow( $res ) ) {
    $data[$row[1]] = $row[0];
    $qcm[$nbq] = $row[2];
    $nbq++;
	}
}
$nbe = 0;
$maxrep = array();
$ij = 0;
$somme = 0;
$nbq=0;

	echo '
	<table class="outer" width="100%">

	<th colspan="4">'._AM_FORMUL.'</th>';

	foreach($data as $id => $titre) {
		$compte=$xoopsDB->query("SELECT COUNT(DISTINCT id_req) FROM ".$xoopsDB->prefix("form_form")." WHERE id_form=".$id);
		list($compte_form) = $xoopsDB->fetchRow($compte);

	if ($qcm[$nbq] == '1') {
	$sql3="SELECT MAX(nbrep), MAX(nbtot) FROM ".$xoopsDB->prefix("form_form")." WHERE id_form=".$id." GROUP BY id_req";
	$res3 = $xoopsDB->query($sql3) or die('Erreur SQL consult.php ligne 93<br />'.$sql3.'<br />'.$xoopsDB->error());

	if ( $res3 ) {
  		while ( $row = $xoopsDB->fetchArray($res3)) {
			$nbe++;
			$maxrep[$nbe] = $row['MAX(nbrep)'];
			$nbtot = $row['MAX(nbtot)'];
  		}
	}

	for ($ij=1;$ij<=$nbe;$ij++){
		$somme = $somme + $maxrep[$ij];
	}

        $titre = $myts->displayTarea($titre);

if ($nbe > 0) {
	$moyenne = $somme / $nbe;
	   echo '<tr><td class="head"><a href="modform.php?id='.$id.'&op=showform">'.$titre.'&nbsp;&nbsp;('.$compte_form.')</td><td class="head" width="15%">&nbsp;&nbsp;('._AM_AVG.$moyenne.' / '.$nbtot.')</a></td><td class="head" align="center" width="15%"><a href="stat.php?id='.$id.'"><img src="../images/stats.gif" alt="" onMouseOver="stm(Text[3],Style[1])" onMouseOut="htm()" width="30"></a></td><td class="head" align="center" width="15%"><a href="consult.php?id='.$id.'&op=supall"><img src="../images/poubelle.gif" alt="" onMouseOver="stm(Text[2],Style[1])" onMouseOut="htm()"></a></td></tr>';
		}
else {
	   echo '<tr><td class="head"><a href="modform.php?id='.$id.'&op=showform">'.$titre.'&nbsp;&nbsp;('.$compte_form.')</td><td class="head" width="15%">&nbsp;&nbsp;('._AM_AVG.' - )</a></td><td class="head" align="center" width="15%"><a href="stat.php?id='.$id.'"><img src="../images/stats.gif" alt="" onMouseOver="stm(Text[3],Style[1])" onMouseOut="htm()" width="30"></a></td><td class="head" align="center" width="15%"><a href="consult.php?id='.$id.'&op=supall"><img src="../images/poubelle.gif" alt="" onMouseOver="stm(Text[2],Style[1])" onMouseOut="htm()"></a></td></tr>';
}
	}
	else {
	   echo '<tr><td class="head" colspan="2"><a href="modform.php?id='.$id.'&op=showform">'.$titre.'&nbsp;&nbsp;('.$compte_form.')</a></td><td class="head" align="center" width="15%"><a href="stat.php?id='.$id.'"><img src="../images/stats.gif" alt="" onMouseOver="stm(Text[3],Style[1])" onMouseOut="htm()" width="30"></a></td><td class="head" align="center" width="15%"><a href="consult.php?id='.$id.'&op=supall"><img src="../images/poubelle.gif" alt="" onMouseOver="stm(Text[2],Style[1])" onMouseOut="htm()"></a></td></tr>';
		}
	$nbq++;
	}
	echo '</table>';
}

else if ($req == null && $op== null) {
	$req = array();
	$date = array();
	$desc_form = array();

if (empty($ordre)){
	$sql = "SELECT id_req, uid, date FROM " . $xoopsDB->prefix("form_form") . " WHERE id_form= ".$id." GROUP BY id_req" ;
}
else if ($ordre == 'dat'){
	$sql = "SELECT id_req, uid, date FROM " . $xoopsDB->prefix("form_form") . " WHERE id_form= ".$id." ORDER BY date" ;
}
else if ($ordre == 'use'){
	$sql = "SELECT id_req, uid, date FROM " . $xoopsDB->prefix("form_form") . " WHERE id_form= ".$id." ORDER BY uid" ;
}

	$result = $xoopsDB->query($sql) or die("Requete SQL ligne 52");
	if ($result) {
		while ($row = $xoopsDB->fetchArray($result)) {
	       		$req[$row["id_req"]] = $row["uid"];
          		$date[$row["id_req"]] = $row["date"];
          	}
	}

	//Selection du nom du formulaire
	$sql = "SELECT desc_form, qcm FROM " . $xoopsDB->prefix("form_id") . " WHERE id_form=".$id;
	$result = $xoopsDB->query($sql) or die("Requete SQL ligne 59");
	if ($result) {
		while ($row = $xoopsDB->fetchArray($result)){
//		$desc_form[] = $row['desc_form'];
		$desc_form = $row['desc_form'];
	        $desc_form = $myts->displayTarea($desc_form);
		$qcm = $row['qcm'];
			}
	}
	//$desc_form = $desc_form[0];

	foreach ($date as $idd => $d) {
		$a = substr ($d, 0, 4);
		$m = substr ($d, 5, 2);
		$j = substr ($d, 8, 2);
		$date[$idd] = $j.'/'.$m.'/'.$a;
	}


if ($qcm == '1') {
	echo '<table class="outer" cellspacing="1" width="100%"><th colspan="3">'.$desc_form.'</th>';
	echo '<tr><td class="odd" colspan="3">'._AM_CLASS_BY.'<a href="consult.php?id='.$id.'">'._AM_CLASS_NONE.'</a><a href="consult.php?id='.$id.'&ordre=dat">'._AM_CLASS_DATE.'</a><a href="consult.php?id='.$id.'&ordre=use">'._AM_CLASS_USER.'</a></td></tr>';
}
else {
	echo '<table class="outer" cellspacing="1" width="100%"><th colspan="2">'.$desc_form.'</th>';
	echo '<tr><td class="odd" colspan="2">'._AM_CLASS_BY.'<a href="consult.php?id='.$id.'">'._AM_CLASS_NONE.'</a><a href="consult.php?id='.$id.'&ordre=dat">'._AM_CLASS_DATE.'</a><a href="consult.php?id='.$id.'&ordre=use">'._AM_CLASS_USER.'</a></td></tr>';
}
	foreach ($req as $id_req => $uid) {
	$sql3= "SELECT MAX(nbrep), MAX(nbtot) FROM ".$xoopsDB->prefix("form_form")." WHERE id_form=".$id." and id_req=".$id_req." GROUP BY id_req";
	$res3 = $xoopsDB->query($sql3) or die('Erreur SQL consult.php ligne 93<br />'.$sql3.'<br />'.$xoopsDB->error());

	if ( $res3 ) {
  		while ( $row = $xoopsDB->fetchArray($res3)) {
			$nbrep = $row['MAX(nbrep)'];
			$nbtot = $row['MAX(nbtot)'];
  		}
	}
	if ($qcm == '1') {
		echo '<tr><td class="even"><li><a href="consult.php?id='.$id.'&req='.$id_req.'">'._AM_FORM_REQ.XoopsUser::getUnameFromId($uid)." le ".$date[$id_req].'</a></td><td class="even" align="center"><b>'.$nbrep.' / '.$nbtot.'</b><td class="even" align="center"><a href="consult.php?id='.$id.'&req='.$id_req.'&op=sup"><img src="../images/delete.gif" alt="" onMouseOver="stm(Text[1],Style[1])" onMouseOut="htm()"></a></td></tr>';
		}
		else {
		echo '<tr><td class="even"><li><a href="consult.php?id='.$id.'&req='.$id_req.'">'._AM_FORM_REQ.XoopsUser::getUnameFromId($uid)." le ".$date[$id_req].'</a></td><td class="even" align="center"><a href="consult.php?id='.$id.'&req='.$id_req.'&op=sup"><img src="../images/delete.gif" alt="" onMouseOver="stm(Text[1],Style[1])" onMouseOut="htm()"></a></td></tr>';
		}
	}
	echo '</table>';
}

		/************************** Affichage d'un enregistrement sélectionné **************************/
else if ($op == null){

$m=0;
//check if start page is defined

	$sql= "SELECT id_form,admin,groupe,email,expe,qcm FROM ".$xoopsDB->prefix("form_id")." WHERE id_form=".$id;
	$res = $xoopsDB->query($sql) or die('Erreur SQL consult.php ligne 90!<br />'.$sql.'<br />'.$xoopsDB->error());

	$sql2= "SELECT ele_caption, ele_value, ele_type, uid, rep FROM ".$xoopsDB->prefix("form_form")." WHERE id_form=".$id." AND id_req= ".$req." ORDER BY pos";
	$res2 = $xoopsDB->query($sql2) or die('Erreur SQL consult.php ligne 93<br />'.$sql2.'<br />'.$xoopsDB->error());

	$sql3= "SELECT MAX(nbrep), MAX(nbtot) FROM ".$xoopsDB->prefix("form_form")." WHERE id_form=".$id." AND id_req= ".$req." GROUP BY id_req";
	$res3 = $xoopsDB->query($sql3) or die('Erreur SQL consult.php ligne 93<br />'.$sql3.'<br />'.$xoopsDB->error());

if ( $res ) {
  while ( $row = $xoopsDB->fetchArray($res)) {
    $id_form = $row['id_form'];
    $admin = $row['admin'];
    $groupe = $row['groupe'];
    $email = $row['email'];
    $expe = $row['expe'];
    $qcm = $row['qcm'];
  }
}
$requete = array();
$type = array();
$reqrep = array();
$nb=0;

if ($res2) {
	while ($row = $xoopsDB->fetchArray($res2)) {
			$row['ele_value'] = nl2br ($row['ele_value']);
			$requete[$row['ele_caption']] = $row['ele_value'];
			$type[$row['ele_caption']] = $row['ele_type'];
			$uid = $row['uid'];
			$reqrep[$nb] = nl2br ($row['rep']);
			$nb++;
	}
}

if ( $res3 ) {
  while ( $row = $xoopsDB->fetchArray($res3)) {
			$nbrep = $row['MAX(nbrep)'];
			$nbtot = $row['MAX(nbtot)'];
  }
}

$uname_submitter = XoopsUser::getUnameFromId($uid);
$nb = 0;

$sql =  $xoopsDB->query("SELECT desc_form FROM " . $xoopsDB->prefix("form_id") . " WHERE id_form= ".$id);
$desc_form = $xoopsDB->fetchRow($sql);
$desc_form[0] = $myts->displayTarea($desc_form[0]);
if ($uid != 0){
	$sub = _AM_SUBMITBY.$uname_submitter." <a href=".XOOPS_URL."/userinfo.php?uid=".$uid."><img src='../images/profil.gif' width='3%'></a>";
	}
	else
	{
		$sub = "";
		}
$form2 = "<center><font size=3>"._AM_FORMU."</font></center>";

//foreach ($requete as $r) echo '<br />'.$r;

	echo '
	<form action="modform.php" method="post">
	<table class="outer" cellspacing="1" width="100%">
	<th>'._AM_REQ.$desc_form[0].$sub.'</th>
	</table>';

echo '<table class="outer" cellspacing="1" width="100%">';

foreach( $requete as $k => $v ){
	if (substr ($v, 0, 1) == ':') {
		$selected = array();
		$v = substr ($v, 1);
		$selected = split (':', $v);
		$v = implode (',', $selected);
	}
	foreach ($type as $tk => $t) {
		if ($t == 'yn' && $tk == $k){
			if ($v == '1') $v = _YES;
			if ($v == '2') $v = _NO;
	if ($qcm == '1') {
			if ($reqrep[$nb] == '1') $reqrep[$nb] = _YES;
			if ($reqrep[$nb] == '2') $reqrep[$nb] = _NO;
			}
		}
	}
		/*if ($t == 'date' && $tk == $k){
			$datea=substr($v, 0, 4);
			$datem=substr($v, 5, 2);
			$datej=substr($v, 8, 2);
			$v = $datej .'/' .$datem .'/' .$datea;
		}*/

	if ($qcm == '1') {
	if (substr ($reqrep[$nb], 0, 1) == ':') {
		$selected = array();
		$reqrep[$nb] = substr ($reqrep[$nb], 1);
		$selected = split (':', $reqrep[$nb]);
		$reqrep[$nb] = implode (',', $selected);
	}

if (!empty ($reqrep[$nb])) {
	if ($v == $reqrep[$nb])
	{
		$v = '<font color="green">'.$v.'</font>';
	}
	else {$v = '<font color="red">'.$v.'</font>';}
}
	}

	if ($qcm == '1') {
		echo '<tr><td class="even"><li>'.$k.'</td><td class="even">'.$v.'</td><td class="even"><font color="blue">'.$reqrep[$nb].'</font></td></tr>';
		$nb++;}
	else {
		echo '<tr><td class="even"><li>'.$k.'</td><td class="even">'.$v.'</td></tr>';
	}
}

if ($qcm == '1')
{
	echo '</table>&nbsp';
	echo '<table class="outer" cellspacing="1" width="100%"><tr><td class="even" width="50%"><b>'._AM_NBANSWER.'</b></td><td class="even">'.$nbrep." / ".$nbtot.'</td></tr>';
}
echo '</table>&nbsp;
	<table class="outer" cellspacing="1" width="100%">
	';
	echo '<td class="foot" colspan="7" align=center><a href="consult.php?id='.$id.'&req='.$req.'&op=sup"><img src="../images/delete.gif" alt="" onMouseOver="stm(Text[1],Style[1])" onMouseOut="htm()"></a></tr></table>';
	echo '</form>';
}
else if ($op == 'sup'){

//$sql159 =  $xoopsDB->query("DELETE FROM ".$xoopsDB->prefix('form_form')." WHERE id_form= ".$id." AND id_req=".$req) or die('Erreur SQL consult.php delete!');

		$sql123=sprintf("DELETE FROM %s WHERE id_form = %s AND id_req = %s", $xoopsDB->prefix("form_form"), $id, $req);
		echo "<br />".$sql123;
		//$sql8= "DELETE FROM ".$xoopsDB->prefix('form_form')." WHERE id_form = ".$id." AND id_req = ".$req;
		$xoopsDB->queryF($sql123) or die('Erreur SQL consult.php delete!');

		$url = "consult.php?id=$id";
        	Header("Location: $url");
}
else if ($op == 'supall'){
		$sql456=sprintf("DELETE FROM %s WHERE id_form = %s", $xoopsDB->prefix("form_form"), $id);
		echo "<br />".$sql456;
		$xoopsDB->queryF($sql456) or die('Erreur SQL consult.php delete!');

		$url = "consult.php";
        	Header("Location: $url");
}


include 'footer.php';
    xoops_cp_footer();

?>