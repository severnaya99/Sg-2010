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

if ( file_exists("../language/".$xoopsConfig['language']."/modinfo.php") ) {
	include "../language/".$xoopsConfig['language']."/modinfo.php";
} 
else {
	include "../language/english/modinfo.php";
}

include('../xoops_version.php');

if ( file_exists("../language/".$xoopsConfig['language']."/main.php") ) {
	include "../language/".$xoopsConfig['language']."/main.php";
} else {
	include "../language/english/main.php";
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

if(!isset($_POST['op'])){ $_POST['op']=" ";}
if(!isset($email)){ $email="";}
if(!isset($nbjours)){ $nbjours=0;}
if(!isset($i)){ $i=0;}
if(!isset($help)){ $help="";}

if ( isset ($id)) {
	$sql=sprintf("SELECT desc_form,admin,groupe,email,expe,url,help,send,msend,msub,mip,mnav,cod,save,onlyone,image,nbjours,afftit,affimg,ordre,qcm, affres, affrep FROM ".$xoopsDB->prefix("form_id")." WHERE id_form='%s'",$id);
	$res = $xoopsDB->query($sql) or die('Erreur SQL !<br />'.$requete.'<br />'.$xoopsDB->error());

	if ( $res ) {
	  while ( $row = $xoopsDB->fetchArray($res)) {
	    $title = $row['desc_form'];
	    $admin = $row['admin'];
	    $groupe = $row['groupe'];
	    $email = $row['email'];
	    $expe = $row['expe'];
	    $url = $row['url'];
	    $help = $row['help'];
	    $send = $row['send'];
	    $msend = $row['msend'];
	    $msub = $row['msub'];
	    $mip = $row['mip'];
	    $mnav = $row['mnav'];
	    $cod = $row['cod'];
            $save = $row['save'];
            $onlyone = $row['onlyone'];
            $image = $row['image'];
            $nbjours = $row['nbjours'];
            $afftit = $row['afftit'];
            $affimg = $row['affimg'];
            $ordre = $row['ordre'];
            $qcm = $row['qcm'];
            $affres = $row['affres'];
            $affrep = $row['affrep'];
	  }
	}
}

$m = 0;
include "../include/functions.php";
include_once XOOPS_ROOT_PATH."/class/xoopstree.php";
include_once XOOPS_ROOT_PATH."/class/xoopslists.php";
include_once XOOPS_ROOT_PATH."/include/xoopscodes.php";
include_once XOOPS_ROOT_PATH."/class/module.errorhandler.php";

	xoops_cp_header();

$myts =& MyTextSanitizer::getInstance();
$eh = new ErrorHandler;


if( $op != 'upform' && $op != 'addform'){

	$sql="SELECT groupid,name FROM ".$xoopsDB->prefix("groups");
	$res = $xoopsDB->query( $sql );
	if ( $res ) {
	$tab[$m] = 0;
	$tab2[$m] = "";
	$m++;
	  while ( $row = $xoopsDB->fetchArray($res)) {
	    $tab[$m] = $row['groupid'];
	    $tab2[$m] = $row['name'];
	    $m++;
	  }
	}

	if ($id != '') {
form_adminMenu(2, _AM_FORMS);

	$title_form = new XoopsFormElementTray(_FORM_TITLE,'');
	$title_form->addElement(new XoopsFormText('','newtitle2',30,255,$title));
	if ($afftit == '1') {
	$titaff = new XoopsFormCheckBox("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"._FORM_DISPLAY,'afftit',1);
	$titaff->addOption(1,' ');
	}
	else {
	$titaff = new XoopsFormCheckBox("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"._FORM_DISPLAY,'afftit');
	$titaff->addOption(1,' ');
	}
	$title_form->addElement($titaff);

	$form = new XoopsThemeForm(_FORM_MOD.' '.$title,'update','mailindex.php?op=upform&id='.$id,'post'); 
	$form -> addElement($title_form);

	}
	else {
form_adminMenu(1, _AM_CREATE);

	$title_form = new XoopsFormElementTray(_FORM_TITLE,'');
	$title_form->addElement(new XoopsFormText('','newtitle',30,255,""));
	$titaff = new XoopsFormCheckBox("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"._FORM_DISPLAY,'afftit');
	$titaff->addOption(1,' ');
	$title_form->addElement($titaff);
	
	$form = new XoopsThemeForm(_FORM_CREAT,'create','mailindex.php?op=addform','post'); 
	$form -> addElement($title_form);
	}

	$image = new XoopsFormElementTray(_FORM_IMAGE,'');
	
	$images_array = XoopsLists :: getImgListAsArray( XOOPS_ROOT_PATH . "/uploads/formulaire/imgform" ); 
if ($id != '') {
	$imgsel = new XoopsFormSelect('', "image", $image);
}
else {
	$imgsel = new XoopsFormSelect('', "image");
}
	$imgsel->addOptionArray($images_array);

	$image->addElement($imgsel);

if ($id != '' && $affimg == '1') {
	$imgaff = new XoopsFormCheckBox("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"._FORM_DISPLAY,'affimg',1);
	$imgaff->addOption(1,' ');
	}
	else {
	$imgaff = new XoopsFormCheckBox("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"._FORM_DISPLAY,'affimg');
	$imgaff->addOption(1,' ');
	}
	$image->addElement($imgaff);

if ($id != '') {
  $ordre_form = new XoopsFormRadio(_FORM_ORDER,'ordre',$ordre);
}
else {
  $ordre_form = new XoopsFormRadio(_FORM_ORDER,'ordre','tit');
}
  $ordre_form -> addOption('tit',_FORM_DTIT);
  $ordre_form -> addOption('img',_FORM_DIMG);

	$email_form = new XoopsFormText(_FORM_EMAIL,'email',30,255,$email);

	$select_form_group_perm = new XoopsFormSelectGroup(_FORM_GROUP, 'groupe', true, $tab2[$i], 4, false);

for($i=0;$i<$m;$i++) {
if($id != '' && $tab[$i]==$groupe){
	$select_form_group_perm = new XoopsFormSelectGroup(_FORM_GROUP, 'groupe', true, $groupe, 4, false);
	}
}
	$select_form_group_perm->addOption(' ',_FORM_NO_GROUP);

if ($id != '' && $admin == '1') {
	$admin_form = new XoopsFormCheckBox(_FORM_ADMIN, 'admin',1);
	$admin_form -> addOption(1,' ');
	}
	else {
	$admin_form = new XoopsFormCheckBox(_FORM_ADMIN, 'admin');
	$admin_form -> addOption(1,' ');
	}

if ($id != '' && $expe == '1') {
	$expe_form = new XoopsFormCheckBox(_FORM_EXPE, 'expe',1);
	$expe_form -> addOption(1,' ');
	}
	else {
	$expe_form = new XoopsFormCheckBox(_FORM_EXPE, 'expe');
	$expe_form -> addOption(1,' ');
	}

if ($id == '') {
	$url = XOOPS_URL;
	}
	$url_form = new XoopsFormText(_FORM_URL,'url',70,255,$url);

	$help = str_replace ("<br />", "\r\n", $help);
	$help_form = new XoopsFormTextArea(_FORM_HELP,'help',$help,5,50);

if ($id == '') {
	$send = _BUTTON_SEND;
	}
	$send_form = new XoopsFormText(_FORM_SEND,'send',30,255,$send);

	$mail_form = new XoopsFormElementTray(_FORM_ELESEND,'');

/*if ($id != '' && $msend == '1') {
	$msend_form = new XoopsFormCheckBox(_FORM_TABELE_SEND,'msend',1);
	$msend_form -> addOption(1,' ');
	}
	else {
	$msend_form = new XoopsFormCheckBox(_FORM_TABELE_SEND, 'msend');
	$msend_form -> addOption(1,' ');
	}*/

if ($id != '' && $msub == '1') {
	$msub_form = new XoopsFormCheckBox(_FORM_TABELE_SUB,'msub',1);
	$msub_form -> addOption(1,' ');
	}
	else {
	$msub_form = new XoopsFormCheckBox(_FORM_TABELE_SUB, 'msub');
	$msub_form -> addOption(1,' ');
	}

if ($id != '' && $mip == '1') {
	$mip_form = new XoopsFormCheckBox('<br />'._FORM_TABELE_IP,'mip',1);
	$mip_form -> addOption(1,' ');
	}
	else {
	$mip_form = new XoopsFormCheckBox('<br />'._FORM_TABELE_IP, 'mip');
	$mip_form -> addOption(1,' ');
	}

if ($id != '' && $mnav == '1') {
	$mnav_form = new XoopsFormCheckBox('<br />'._FORM_TABELE_NAV,'mnav',1);
	$mnav_form -> addOption(1,' ');
	}
	else {
	$mnav_form = new XoopsFormCheckBox('<br />'._FORM_TABELE_NAV, 'mnav');
	$mnav_form -> addOption(1,' ');
	}

//	$mail_form->addElement($msend_form);
	$mail_form->addElement($msub_form);
	$mail_form->addElement($mip_form);
	$mail_form->addElement($mnav_form);

if ($id != '') {
	$cod_form = new XoopsFormSelect(_FORM_COD,'cod',$cod,1,false);
	}
	else {
	$cod_form = new XoopsFormSelect(_FORM_COD,'cod','ISO-8859-1',1,false);
	}
	$codes = array("ISO-8859-1"=>"ISO-8859-1","ISO-8859-15"=>"ISO-8859-15","UTF-8"=>"UTF-8","cp866"=>"cp866","cp1251"=>"cp1251","cp1252"=>"cp1252","KOI8-R"=>"KOI8-R","BIG5"=>"BIG5","GB2312"=>"GB2312","BIG5-HKSCS"=>"BIG5-HKSCS","Shift_JIS"=>"Shift_JIS","EUC-JP"=>"EUC-JP");
	$cod_form->addOptionArray($codes);
	
	if ($id != '' && $save == '1') {
	$save_form = new XoopsFormCheckBox(_FORM_SAVE_SEND,'save',1);
	$save_form -> addOption(1,' ');
	}
	else {
	$save_form = new XoopsFormCheckBox(_FORM_SAVE_SEND, 'save');
	$save_form -> addOption(1,' ');
	}

	$oo_form = new XoopsFormElementTray(_FORM_ONLYONE_SEND,'');

	if ($id != '' && $onlyone == '1') {
	$onlyone_form = new XoopsFormCheckBox('','onlyone',1);
	$onlyone_form -> addOption(1,' ');
	}
	else {
	$onlyone_form = new XoopsFormCheckBox('', 'onlyone');
	$onlyone_form -> addOption(1,' ');
	}

	$nbjours_form = new XoopsFormText('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;','nbjours',5,10,$nbjours);
	$textdays_form = new XoopsFormLabel('',_FORM_NBDAYS);
	
	$oo_form->addElement($onlyone_form);
	$oo_form->addElement($nbjours_form);
	$oo_form->addElement($textdays_form);

if ($id != '' && $qcm == '1') {
	$qcm_form = new XoopsFormCheckBox(_FORM_QCM, 'qcm',1);
	$qcm_form -> addOption(1,' ');
	}
	else {
	$qcm_form = new XoopsFormCheckBox(_FORM_QCM, 'qcm');
	$qcm_form -> addOption(1,' ');
	}

if ($id != '' && $affres == '1') {
	$affres_form = new XoopsFormCheckBox(_FORM_AFFRES, 'affres',1);
	$affres_form -> addOption(1,' ');
	}
	else {
	$affres_form = new XoopsFormCheckBox(_FORM_AFFRES, 'affres');
	$affres_form -> addOption(1,' ');
	}
	
if ($id != '' && $affrep == '1') {
	$affrep_form = new XoopsFormCheckBox(_FORM_AFFREP, 'affrep',1);
	$affrep_form -> addOption(1,' ');
	}
	else {
	$affrep_form = new XoopsFormCheckBox(_FORM_AFFREP, 'affrep');
	$affrep_form -> addOption(1,' ');
	}	

	$affre_form = new XoopsFormElementTray(_FORM_AFFRE,'');
	$affre_form -> addElement($affres_form);
	$affre_form -> addElement($affrep_form);
	
	$submit = new XoopsFormButton('', 'submit', _SUBMIT, 'submit');

/*	if ($id != '') {
		$hidden_op = new XoopsFormHidden('op', 'upform');
		echo $hidden_op->render();
	}*/

	$form -> addElement($image);
	$form -> addElement($ordre_form);
	$form -> addElement($qcm_form);
	$form -> addElement($affre_form);
	$form -> addElement($email_form);
	$form -> addElement($select_form_group_perm);
	$form -> addElement($admin_form);
	$form -> addElement($expe_form);
	$form -> addElement($url_form);
	$form -> addElement($help_form);
	$form -> addElement($send_form);
/*	$form -> addElement($msend_form);
	$form -> addElement($msub_form);
	$form -> addElement($mip_form);
	$form -> addElement($mnav_form);*/
	$form -> addElement($mail_form);
	$form -> addElement($cod_form);
	$form -> addElement($save_form);
	$form -> addElement($oo_form);
	$form -> addElement($submit);

$form->display();

}

function upform($id)
{
	global $xoopsDB, $_POST, $myts, $eh;
	$title2 = $myts->makeTboxData4Save($_POST["newtitle2"]);
	$admin = $myts->makeTboxData4Save($_POST["admin"]);
	$groupe = $myts->makeTboxData4Save($_POST["groupe"]);
	$email = $myts->makeTboxData4Save($_POST["email"]);
	$expe = $myts->makeTboxData4Save($_POST["expe"]);
	$url = $myts->makeTboxData4Save($_POST["url"]);
	$help = $myts->makeTboxData4Save($_POST["help"]);
	$send = $myts->makeTboxData4Save($_POST["send"]);
	$msend = $myts->makeTboxData4Save($_POST["msend"]);
	$msub = $myts->makeTboxData4Save($_POST["msub"]);
	$mip = $myts->makeTboxData4Save($_POST["mip"]);
	$mnav = $myts->makeTboxData4Save($_POST["mnav"]);
	$cod = $myts->makeTboxData4Save($_POST["cod"]);
	$save = $myts->makeTboxData4Save($_POST["save"]);
	$onlyone = $myts->makeTboxData4Save($_POST["onlyone"]);
	$image = $myts->makeTboxData4Save($_POST["image"]);
	$nbjours = $myts->makeTboxData4Save($_POST["nbjours"]);
	$afftit = $myts->makeTboxData4Save($_POST["afftit"]);
	$affimg = $myts->makeTboxData4Save($_POST["affimg"]);
	$ordre = $myts->makeTboxData4Save($_POST["ordre"]);
	$qcm = $myts->makeTboxData4Save($_POST["qcm"]);
	$affres = $myts->makeTboxData4Save($_POST["affres"]);
	$affrep = $myts->makeTboxData4Save($_POST["affrep"]);

//	if((!empty($email)) && (!eregi("^[_a-z0-9.-]+@[a-z0-9.-]{2,}[.][a-z]{2,4}$",$email))){
//		redirect_header("mailindex.php?id=$id", 2, _MD_ERROREMAIL);
//	}
	if (empty($email) && empty($admin) && $groupe=="0" && empty($expe)) {
		redirect_header("mailindex.php?id=$id", 2, _MD_ERRORMAIL);
	}

	if (empty($url)) {
		$url = XOOPS_URL;
	}
	
	if (empty($send)) {
		$send = _BUTTON_SEND;
	}

	if (empty($cod)) {
		$cod = "ISO-8859-1";
	}

	$help = stripslashes($help);
	$help = eregi_replace ("'", "&acute;", $help);
	$help = eregi_replace ('"', '&quot;', $help);
	$help = eregi_replace ('&', '&amp;', $help);
	$help = str_replace ("\r\n", "<br />", $help);

	$send = stripslashes($send);
	$send = eregi_replace ("'", "`", $send);
	$send = eregi_replace ('"', '``',  $send);
	$send = eregi_replace ('&', '&amp;',   $send);

	$title2 = stripslashes($title2);
	$title2 = eregi_replace ("'", "`", $title2);
	$title2 = eregi_replace ('"', "`", $title2);
	$title2 = eregi_replace ('&', "_", $title2);

	$sql = sprintf("UPDATE %s SET desc_form='%s', admin='%s', groupe='%s', email='%s', expe='%s', url='%s', help='%s', send='%s', msend='%s', msub='%s', mip='%s', mnav='%s', cod='%s', save='%s', onlyone='%s', image='%s', nbjours='%s', afftit='%s', affimg='%s', ordre='%s', qcm='%s', affres='%s', affrep='%s' WHERE id_form='%s'", $xoopsDB->prefix("form_id"), $title2, $admin, $groupe, $email, $expe, $url, $help, $send, $msend, $msub, $mip, $mnav, $cod, $save, $onlyone, $image, $nbjours, $afftit, $affimg, $ordre, $qcm, $affres, $affrep, $id);
	$xoopsDB->query($sql) or $eh->show("0013");

	$sql2 = sprintf("UPDATE %s SET itemname='%s' WHERE menuid='%s'", $xoopsDB->prefix("form_menu"), $title2, $id);
	$xoopsDB->query($sql2) or $eh->show("error insertion 2 dans renform");

		$urls = "modform.php";
		Header("Location: $urls");

//	redirect_header("modform.php",1,_FORMULAIRE_FORMTITRE);
}
function addform()
{
	global $xoopsDB, $_POST, $myts, $eh;
include('../xoops_version.php');
	$title = $myts->makeTboxData4Save($_POST["newtitle"]);
	$admin = $myts->makeTboxData4Save($_POST["admin"]);
	$groupe = $myts->makeTboxData4Save($_POST["groupe"]);
	$email = $myts->makeTboxData4Save($_POST["email"]);
	$expe = $myts->makeTboxData4Save($_POST["expe"]);
	$url = $myts->makeTboxData4Save($_POST["url"]);
	$help = $myts->makeTboxData4Save($_POST["help"]);
	$send = $myts->makeTboxData4Save($_POST["send"]);
	$msend = $myts->makeTboxData4Save($_POST["msend"]);
	$msub = $myts->makeTboxData4Save($_POST["msub"]);
	$mip = $myts->makeTboxData4Save($_POST["mip"]);
	$mnav = $myts->makeTboxData4Save($_POST["mnav"]);
	$cod = $myts->makeTboxData4Save($_POST["cod"]);
	$save = $myts->makeTboxData4Save($_POST["save"]);
	$onlyone = $myts->makeTboxData4Save($_POST["onlyone"]);
	$image = $myts->makeTboxData4Save($_POST["image"]);
	$nbjours = $myts->makeTboxData4Save($_POST["nbjours"]);
	$afftit = $myts->makeTboxData4Save($_POST["afftit"]);
	$affimg = $myts->makeTboxData4Save($_POST["affimg"]);
	$ordre = $myts->makeTboxData4Save($_POST["ordre"]);
	$qcm = $myts->makeTboxData4Save($_POST["qcm"]);
	$affres = $myts->makeTboxData4Save($_POST["affres"]);
	$affrep = $myts->makeTboxData4Save($_POST["affrep"]);
		
	if (empty($title)) {
		redirect_header("mailindex.php", 2, _MD_ERRORTITLE);
	}
	if((!empty($email)) && (!eregi("^[_a-z0-9.-]+@[a-z0-9.-]{2,}[.][a-z]{2,3}$",$email))){
		redirect_header("mailindex.php", 2, _MD_ERROREMAIL);
	}
	if (empty($email) && empty($admin) && $groupe=="0" && empty($expe)) {
		redirect_header("mailindex.php", 2, _MD_ERRORMAIL);
	}

	if (empty($url)) {
		$url = XOOPS_URL;
	}
	
	if (empty($send)) {
		$send = _BUTTON_SEND;
	}

	if (empty($cod)) {
		$cod = "ISO-8859-1";
	}

	$title = stripslashes($title);
	$title = eregi_replace ("'", "\'", $title);
	$title = eregi_replace ('"', '\"', $title);
	$title = eregi_replace ('&', '\&', $title);

	$help = stripslashes($help);

	$help = eregi_replace ("'", "&acute;", $help);
	$help = eregi_replace ('"', '&quot;',  $help);
	$help = eregi_replace ('&', '&amp;',   $help);
	$help = str_replace ("\r\n", "<br />",   $help);


	$send = stripslashes($send);
	$send = eregi_replace ("'", "`", 	$send);
	$send = eregi_replace ('"', '``',  	$send);
	$send = eregi_replace ('&', '&amp;',   	$send);


	$sql = sprintf("INSERT INTO %s (desc_form, admin, groupe, email, expe, url, help, send, msend, msub, mip, mnav, cod, save, onlyone, image, nbjours, afftit, affimg, ordre, qcm, affres, affrep) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", $xoopsDB->prefix("form_id"), $title, $admin, $groupe, $email, $expe, $url, $help, $send, $msend, $msub, $mip, $mnav, $cod, $save, $onlyone, $image, $nbjours, $afftit, $affimg, $ordre, $qcm, $affres, $affrep);
	$xoopsDB->queryF($sql) or $eh->show("error insertion 1 dans addform");

	$sql3 = $xoopsDB->query("SELECT id_form FROM ".$xoopsDB->prefix("form_id")." ORDER BY id_form ASC");
		if ($sql3) {
		while ( $r = $xoopsDB->fetchRow( $sql3 ) ) {
			$id = $r[0]; 
			}
		}

	$sql4 = $xoopsDB->query("SELECT MAX(position) from ".$xoopsDB->prefix("form_menu"));
	if ($sql4) {
		while ( $p = $xoopsDB->fetchRow( $sql4 ) ) {
			$pos = $p[0]; 
			}
		}
	if ($pos != '') $pos++;

	$sql2 = sprintf("INSERT INTO %s (itemname,itemurl,position) VALUES ('%s', '%s', '%s')", $xoopsDB->prefix("form_menu"), $title, XOOPS_URL.'/modules/'.$modversion["dirname"].'/index.php?id='.$id.'',$pos);
	$xoopsDB->queryF($sql2) or $eh->show("error insertion 2 dans addform");

		$urls = "modform.php";
		Header("Location: $urls");

//	redirect_header("modform.php",1,_FORMULAIRE_FORMCREA);
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

if(!isset($op)){$op=" ";}
switch ($op) {
case "upform":
	upform($id);
	break;
case "addform":
	addform();
	break;
}

include 'footer.php';
xoops_cp_footer();

?>




