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

if ( file_exists("../language/".$xoopsConfig['language']."/modinfo.php") ) {
	include "../language/".$xoopsConfig['language']."/modinfo.php";
} 
else {
	include "../language/english/modinfo.php";
}

if(!isset($_POST['id'])){
	$id = isset ($_GET['id']) ? $_GET['id'] : '';
}else {
	$id = $_POST['id'];
}
if(!isset($_POST['ele_id'])){
	$ele_id = isset ($_GET['ele_id']) ? $_GET['ele_id'] : '';
}else {
	$ele_id = $_POST['ele_id'];
}
if(!isset($_POST['ele_type'])){
	$ele_type = isset ($_GET['ele_type']) ? $_GET['ele_type'] : '';
}else {
	$ele_type = $_POST['ele_type'];
}

if(!isset($clone)){ $clone="";}
if(!isset($req)){ $req="";}
if(!isset($text)){ $text="";}
if(!isset($_POST['submit'])){ $_POST['submit']="";}

$sql=sprintf("SELECT desc_form FROM ".$xoopsDB->prefix("form_id")." WHERE id_form='%s'",$id);
$res = $xoopsDB->query($sql) or die('Erreur SQL !<br />'.$requete.'<br />'.$xoopsDB->error());

if ($res) {
  while ( $row = $xoopsDB->fetchRow($res)) {
    $title = $row[0];
  }
}

if( !empty($_POST) ){
	foreach( $_POST as $k => $v ){
		${$k} = $v;
	}
}elseif( !empty($_GET) ){
	foreach( $_GET as $k => $v ){
		${$k} = $v;
	}
}

$ele_id = !empty($ele_id) ? intval($ele_id) : 0;
$myts =& MyTextSanitizer::getInstance();

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

if( $_POST['submit'] == _AM_ELE_ADD_OPT_SUBMIT && intval($_POST['addopt']) > 0 ){
	$op = 'edit';
}

	if ($ele_type == "text")
	{	$name = _AM_ELE_TEXT;
	} elseif  ($ele_type == "textarea")
	{	$name = _AM_ELE_TAREA;
	} elseif  ($ele_type == "areamodif")
	{	$name = _AM_ELE_MODIF;
	} elseif  ($ele_type == "select")
	{	$name = _AM_ELE_SELECT;
	} elseif  ($ele_type == "checkbox")
	{	$name = _AM_ELE_CHECK;
	} elseif  ($ele_type == "radio")
	{	$name = _AM_ELE_RADIO;
	} elseif  ($ele_type == "yn")
	{	$name = _AM_ELE_YN;
	} elseif  ($ele_type == "date")
	{	$name = _AM_ELE_DATE;
	} elseif  ($ele_type == "sep")
	{	$name = _AM_ELE_SEP;
	} elseif  ($ele_type == "upload")
	{	$name = _AM_ELE_UPLOAD;
	} elseif  ($ele_type == "mail")
	{	$name = _AM_ELE_MAIL;
	} elseif  ($ele_type == "mailunique")
	{	$name = _AM_ELE_MAIL;
	}

switch($op){
	case 'edit':
		xoops_cp_header();
		if( !empty($ele_id) ){
			$element =& $formulaire_mgr->get($ele_id);
			$ele_type = $element->getVar('ele_type');
			$form_title = $clone ? _AM_ELE_CREATE : sprintf(_AM_ELE_EDIT, $element->getVar('ele_caption'));
		}else{
			$element =& $formulaire_mgr->create();
			$form_title = _AM_ELE_CREATE.$name;
		}
		$form = new XoopsThemeForm($form_title, 'form_ele', 'elements.php?id='.$id.'');
		if( empty($addopt) ){
			$nb_fichier = 0;
			$ele_caption = $clone ? sprintf(_AM_COPIED, $element->getVar('ele_caption', 'f')) : $element->getVar('ele_caption', 'f');
			if ($ele_type=='sep' && empty($ele_id)) {
				$ele_caption = new XoopsFormText(_AM_ELE_CAPTION. _AM_ELE_CAPTION_DESC, 'ele_caption', 50, 255, '{null}'); }
			else if ($ele_type=='sep') {$ele_caption = new XoopsFormText(_AM_ELE_CAPTION. _AM_ELE_CAPTION_DESC, 'ele_caption', 50, 255, $ele_caption); }
			else { $ele_caption = new XoopsFormText(_AM_ELE_CAPTION, 'ele_caption', 50, 255, $ele_caption); }
			$value = $element->getVar('ele_value', 'f');
		}else{
			$ele_caption = $myts->makeTboxData4PreviewInForm($ele_caption);
			if ($ele_type=='sep') {
				$ele_caption = new XoopsFormText(_AM_ELE_CAPTION. _AM_ELE_CAPTION_DESC, 'ele_caption', 50, 255, '{null}'); }
			else { $ele_caption = new XoopsFormText(_AM_ELE_CAPTION, 'ele_caption', 50, 255, $ele_caption); }
		}

		$form->addElement($ele_caption, 1);

		switch($ele_type){
			case 'text':
				include 'ele_text.php';
				$req = true;
			break;
			case 'textarea':
				include 'ele_tarea.php';
				$req = true;
			break;
			case 'areamodif':
				include 'ele_modif.php';
			break;
			case 'select':
				include 'ele_select.php';
				$req = true;
			break;
			case 'checkbox':
				include 'ele_check.php';
			break;
			case 'radio':
				include 'ele_radio.php';
			break;
			case 'yn':
				include 'ele_yn.php';
			break;
			case 'date':
				include 'ele_date.php';
				$req = true;
			break;
			case 'sep':
				include 'ele_sep.php';
			break;
			case 'upload':
				include 'ele_upload.php';
			break;
			case 'mail':
				include 'ele_mail.php';
			break;
			case 'mailunique':
				include 'ele_mail_unique.php';
			break;
		}
		if( $req ){
			$ele_req = new XoopsFormCheckBox(_AM_ELE_REQ, 'ele_req', $element->getVar('ele_req'));
			$ele_req->addOption(1, ' ');
		}

		$form->addElement($ele_req);
		$display = !empty($ele_id) ? $element->getVar('ele_display') : 1;
		$ele_display = new XoopsFormCheckBox(_AM_ELE_DISPLAY, 'ele_display', $display);
		$ele_display->addOption(1, ' ');
		$form->addElement($ele_display);

		$order = !empty($ele_id) ? $element->getVar('ele_order') : 0;
		$ele_order = new XoopsFormText(_AM_ELE_ORDER, 'ele_order', 3, 2, $order);
		$form->addElement($ele_order);

		$submit = new XoopsFormButton('', 'submit', _AM_SAVE, 'submit');
		$cancel = new XoopsFormButton('', 'cancel', _CANCEL, 'button');
		$cancel->setExtra('onclick="javascript:history.go(-1);"');
		$tray = new XoopsFormElementTray('');
		$tray->addElement($submit);
		$tray->addElement($cancel);
		$form->addElement($tray);

		$hidden_op = new XoopsFormHidden('op', 'save');
		$hidden_type = new XoopsFormHidden('ele_type', $ele_type);
		$form->addElement($hidden_op);
		$form->addElement($hidden_type);
		if( !empty($ele_id) && !$clone ){
			$hidden_id = new XoopsFormHidden('ele_id', $ele_id);
			$form->addElement($hidden_id);
		}
		$form->display();

	break;
	case 'delete':
		if( empty($ele_id) ){
			redirect_header("index.php?id=$id", 0, _AM_ELE_SELECT_NONE);
		}
		if( empty($_POST['ok']) ){
			xoops_cp_header();
			xoops_confirm(array('op' => 'delete', 'ele_id' => $ele_id, 'ok' => 1), 'elements.php?id='.$id.'', _AM_ELE_CONFIRM_DELETE);
		}else{
			$element =& $formulaire_mgr->get($ele_id);
			$formulaire_mgr->delete($element);
		$url = "index.php?id=$id";
		Header("Location: $url");

		}
	break;
	case 'save':
		if( !empty($ele_id) ){
			$element =& $formulaire_mgr->get($ele_id);
		}else{
			$element =& $formulaire_mgr->create();
		}
		$element->setVar('ele_caption', $ele_caption);
		$req = !empty($ele_req) ? 1 : 0;
		$element->setVar('ele_req', $req);
		$order = empty($ele_order) ? 0 : intval($ele_order);
		$element->setVar('ele_order', $order);
		$display = !empty($ele_display) ? 1 : 0;
		$element->setVar('ele_display', $display);
		$element->setVar('ele_type', $ele_type);

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

		switch($ele_type){
			case 'text':
				$value = array();
				$value[] = !empty($ele_value[0]) ? intval($ele_value[0]) : $xoopsModuleConfig['t_width'];
				$value[] = !empty($ele_value[1]) ? intval($ele_value[1]) : $xoopsModuleConfig['t_max'];
				$value[] = $ele_value[2];
			break;
			case 'textarea':
				$value = array();
				$value[] = stripslashes($ele_value[0]);
				if( intval($ele_value[1]) != 0 ){
					$value[] = intval($ele_value[1]);
				}else{
					$value[] = $xoopsModuleConfig['ta_rows'];
				}
				if( intval($ele_value[2]) != 0 ){
					$value[] = intval($ele_value[2]);
				}else{
					$value[] = $xoopsModuleConfig['ta_cols'];
				}
			break;
			case 'areamodif':
				$value = array();
				$value[] = $ele_value[0];
				if( intval($ele_value[1]) != 0 ){
					$value[] = intval($ele_value[1]);
				}else{
					$value[] = $xoopsModuleConfig['ta_rows'];
				}
				if( intval($ele_value[2]) != 0 ){
					$value[] = intval($ele_value[2]);
				}else{
					$value[] = $xoopsModuleConfig['ta_cols'];
				}
			break;
			case 'checkbox':
				$value = array();
				while( $v = each($ele_value) ){
					if( !empty($v['value']) ){
						if( $checked[$v['key']] == 1 ){
							$check = 1;
						}else{
							$check = 0;
						}
						$value[$v['value']] = $check;
					}
				}
			break;
			case 'mail':
				$value = array();
				while( $v = each($ele_value) ){
					if( !empty($v['value']) ){
						if( $checked[$v['key']] == 1 ){
							$check = 1;
						}else{
							$check = 0;
						}
						$value[$v['value']] = $check;
					}
				}
			break;
			case 'mailunique':
				$value = array();
				while( $v = each($ele_value) ){
					if( !empty($v['value']) ){
						if( $checked == $v['key'] ){
							$value[$v['value']] = 1;
						}else{
							$value[$v['value']] = 0;
						}
					}
				}
			break;
			case 'radio':
				$value = array();
				while( $v = each($ele_value) ){
					if( !empty($v['value']) ){
						if( $checked == $v['key'] ){
							$value[$v['value']] = 1;
						}else{
							$value[$v['value']] = 0;
						}
					}
				}
			break;
			case 'yn':
				$value = array();
				if( $ele_value == '_NO' ){
					$value = array('_YES'=>0,'_NO'=>1);
				}else{
					$value = array('_YES'=>1,'_NO'=>0);
				}
			break;
			case 'date':
				$value = array();
				$value[] = $ele_value;
			break;
			case 'sep':
				$value = array();

				if (strstr($ele_value[0],'@font') != false){
					$a = explode("@font", $ele_value[0]);
					$ele_value[0] = $a[1];
				}
				$value[] = $ele_value[0];
				if( intval($ele_value[1]) != 0 ){
					$value[] = intval($ele_value[1]);
				}else{
					$value[] = $xoopsModuleConfig['ta_rows'];
				}
				if( intval($ele_value[2]) != 0 ){
					$value[] = intval($ele_value[2]);
				}else{
					$value[] = $xoopsModuleConfig['ta_cols'];
				}

				$value[0]='@font'.$value[0].'@font';

				$chval .= "<div style='";
				if ($option[0]=='centre') {$chval .= 'text-align:center;';}
				if ($option[0]=='souligne') {$chval .= 'text-decoration:underline;';}
				if ($option[0]=='italique') {$chval .= 'font-style:italic;';}
				if ($option[0]=='gras') {$chval .= 'font-weight:bold;';}
				if ($option[1]=='souligne') {$chval .= 'text-decoration:underline;';}
				if ($option[1]=='italique') {$chval .= 'font-style:italic;';}
				if ($option[1]=='gras') {$chval .= 'font-weight:bold;';}
				if ($option[2]=='italique') {$chval .= 'font-style:italic;';}
				if ($option[2]=='gras') {$chval .= 'font-weight:bold;';}
				if ($option[3]=='gras') {$chval .= 'font-weight:bold;';}

				if ($couleur) {$chval .= 'color:'.$couleur.';';}				
				$chval .= "'>".$value[0]."</div>";
				
				$value[0] = $chval;
				
//				$value[0] = '<font color='.$couleur.'>'.$value[0].'</font>';
			break;
			case 'select':
				$value = array();
				$value[0] = $ele_value[0]>1 ? intval($ele_value[0]) : 1;
				$value[1] = !empty($ele_value[1]) ? 1 : 0;
				$v2 = array();
				$multi_flag = 1;
				while( $v = each($ele_value[2]) ){
					if( !empty($v['value']) ){
						if( $value[1] == 1 || $multi_flag ){
							if( $checked[$v['key']] == 1 ){
								$check = 1;
								$multi_flag = 0;
							}else{
								$check = 0;
							}
						}else{
							$check = 0;
						}
						$v2[$v['value']] = $check;
					}
				}
				$value[2] = $v2;
			break;
			case 'upload':
				$value = array();
				$v2 = array();
				$value[] = $ele_value[0];
				$ele_value[1] = $ele_value[1] *1024;
				$value[] = $ele_value[1];
				while( $v = each($ele_value[2]) ){
					if( !empty($v) ) $v2[] = $v;
				}
				$value[] = $v2;
			break;
		}
		$element->setVar('ele_value', $value);
		$element->setVar('id_form', $id);
		if( !$formulaire_mgr->insert($element) ){
			xoops_cp_header();
			echo $element->getHtmlErrors();
		}else{
		$url = "index.php?id=$id";
		Header("Location: $url");
		}
	break;

}
include 'footer.php';
xoops_cp_footer();


function addOption($id1, $id2, $text, $type='check', $checked=null){
if(!isset($text)){ $text="";}
	$d = new XoopsFormText('', $id1, 40, 255, $text);
	if( $type == 'check' ){
		$c = new XoopsFormCheckBox('', $id2, $checked);
		$c->addOption(1, ' ');
	}
	else{
		$c = new XoopsFormRadio('', 'checked', $checked);
		$c->addOption($id2, ' ');
	}
	$t = new XoopsFormElementTray('');
	$t->addElement($c);
	$t->addElement($d);
	return $t;
}

function addOptionsTray(){
	$t = new XoopsFormText('', 'addopt', 3, 2);
	$l = new XoopsFormLabel('', sprintf(_AM_ELE_ADD_OPT, $t->render()));
	$b = new XoopsFormButton('', 'submit', _AM_ELE_ADD_OPT_SUBMIT, 'submit');
	$r = new XoopsFormElementTray('');
	$r->addElement($l);
	$r->addElement($b);
	return $r;
}
?>