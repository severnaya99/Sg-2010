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

include_once ("admin_header.php");
include_once '../include/functions.php';

$myts =& MyTextSanitizer::getInstance();

if ( file_exists("../language/".$xoopsConfig['language']."/modinfo.php") ) {
	include "../language/".$xoopsConfig['language']."/modinfo.php";
} 
else {
	include "../language/english/modinfo.php";
}

if(!isset($_POST['op'])){
	$op = isset ($_GET['op']) ? $_GET['op'] : '';
}else {
	$op = $_POST['op'];
}
if(!isset($_POST['id'])){
	$id = isset ($_GET['id']) ? $_GET['id'] : '';
}else {
	$id = $_POST['id'];
}


	$sql=sprintf("SELECT desc_form, qcm FROM ".$xoopsDB->prefix("form_id")." WHERE id_form='%s'",$id);
	$res = $xoopsDB->query ( $sql ) or die('Erreur SQL !<br />'.$requete.'<br />'.$xoopsDB->error());

if ( $res ) {
  while ( $row = $xoopsDB->fetchArray($res)) {
    $title = $row['desc_form'];
    $title = $myts->displayTarea($title);
    $qcm = $row['qcm'];
  }
}

if(!isset($_POST['op'])){ $_POST['op']=" ";}

if( $_POST['op'] != 'save' ){
	xoops_cp_header();

echo '<DIV id="help" style="visibility:hidden;position:absolute;z-index:1000;top:-100"></DIV>';
echo "<script src='../main15.js' type='text/javascript'></script>";
echo '<SCRIPT language="JavaScript1.2"  type="text/javascript">
Text[1]=["'._AM_ED.'","'._AM_ED_TEXT.'"]
Text[2]=["'._AM_CLO.'","'._AM_CLO_TEXT.'"]
Text[3]=["'._AM_SUPE.'","'._AM_SUPE_TEXT.'"]
Text[4]=["'._AM_SEE_FORM.'","'._AM_SEE_FORM_TEXT.'"]

Style[1]=["white","#F6B542","","","",,"black","#FFFFFF","","","",,,,2,"#F6C063",2,,,,,"",1,,,]

var TipId="help"
var FiltersEnabled = 0 // [for IE5.5+] if your not going to use transitions or filters in any of the tips set this to zero.
mig_clay()
</SCRIPT>';

form_adminMenu(2, _AM_FORMS);

	echo "<fieldset><legend style='font-weight: bold; color: green;'>" . _AM_MEG . "</legend>";
	if ($qcm == '1') {
		echo "<table cellspacing='1' width='100%'><div style='color: red; font-weight: bold;'><img src='../images/attention.gif'> "._AM_WQCM."</div></table>";
	}

		echo "<table cellspacing='1' width='100%'><div style='color: blue; font-weight: bold;'><img src='../images/attention.gif'> "._AM_WME."</div></table>";
	echo "	</fieldset>";		


	echo '
	<br />
	<form action="index.php?id='.$id.'" method="post">

	<table class="outer" cellspacing="1" width="100%">
	<th>'.$title.'</th>
	</table>';

	echo '<table class="outer" cellspacing="1" width="100%">
	<th><center>'._AM_ELE_CREATE.'</center></th>';
	if ($qcm != '1') {
	echo '<tr><td class="even"><li><a href="elements.php?id='.$id.'&op=edit&amp;ele_type=text">'._AM_ELE_TEXT.'</a></td></tr>
	<tr><td class="even"><li><a href="elements.php?id='.$id.'&op=edit&amp;ele_type=textarea">'._AM_ELE_TAREA.'</a></td></tr>';}
	echo '<tr><td class="even"><li><a href="elements.php?id='.$id.'&op=edit&amp;ele_type=areamodif">'._AM_ELE_MODIF.'</a></td></tr>
	<tr><td class="even"><li><a href="elements.php?id='.$id.'&op=edit&amp;ele_type=select">'._AM_ELE_SELECT.'</a></td></tr>
	<tr><td class="even"><li><a href="elements.php?id='.$id.'&op=edit&amp;ele_type=checkbox">'._AM_ELE_CHECK.'</a></td></tr>
	<tr><td class="even"><li><a href="elements.php?id='.$id.'&op=edit&amp;ele_type=radio">'._AM_ELE_RADIO.'</a></td></tr>
	<tr><td class="even"><li><a href="elements.php?id='.$id.'&op=edit&amp;ele_type=yn">'._AM_ELE_YN.'</a></td></tr>';
	if ($qcm != '1') {
	echo '<tr><td class="even"><li><a href="elements.php?id='.$id.'&op=edit&amp;ele_type=date">'._AM_ELE_DATE.'</a></td></tr>';}
	echo '<tr><td class="even"><li><a href="elements.php?id='.$id.'&op=edit&amp;ele_type=sep">'._AM_ELE_SEP.'</a></td></tr>';
	if ($qcm != '1') {
	echo '<tr><td class="even"><li><a href="elements.php?id='.$id.'&op=edit&amp;ele_type=upload">'._AM_ELE_UPLOAD.'</a></td></tr>';
	echo '<tr><td class="even"><li><a href="elements.php?id='.$id.'&op=edit&amp;ele_type=mail">'._AM_ELE_MAIL.'</a></td></tr>';
	echo '<tr><td class="even"><li><a href="elements.php?id='.$id.'&op=edit&amp;ele_type=mailunique">'._AM_ELE_MAILU.'</a></td></tr>';}
	echo '</table><br />';

	echo ' <table class="outer" cellspacing="1" width="100%">
		<tr>
			<th>'._AM_ELE_CAPTION2.'</th>
			<th>'._AM_ELE_DEFAULT.'</th>
			<th align="center">'._AM_ELE_REQ.'</th>
			<th colspan="2" align="center">'._AM_ELE_ORDER.'</th>
			<th align="center">'._AM_ELE_DISPLAY.'</th>
			<th colspan="3">&nbsp;</th>
		</tr>
	';
	$criteria = new Criteria(1,1);
	$criteria->setSort('ele_order');
	$criteria->setOrder('ASC');
	$elements =& $formulaire_mgr->getObjects($criteria,$id);

	foreach( $elements as $i ){
		$ide = $i->getVar('ele_id');
		$ele_value = $i->getVar('ele_value');
//		$ele_value[0] = stripslashes ($ele_value[0]);
		$renderer =& new FormulaireElementRenderer($i);
		$ele_value =& $renderer->constructElement('ele_value['.$ide.']', true, '0');
    $ele_type = $i->getVar('ele_type');
		$req = $i->getVar('ele_req');
		$check_req = new XoopsFormCheckBox('', 'ele_req['.$ide.']', $req);
		$check_req->addOption(1, ' ');
		if( $ele_type == 'checkbox' || $ele_type == 'radio' || $ele_type == 'yn' || $ele_type == 'select' || $ele_type == 'date' || $ele_type== 'areamodif' || $ele_type == 'upload' || $ele_type == 'areamodif' || $ele_type == 'sep'){
			$check_req->setExtra('disabled="disabled"');
		}

		$order = $i->getVar('ele_order');
		$text_order = new XoopsFormText('', 'ele_order['.$ide.']', 2, 2, $order);
		$display = $i->getVar('ele_display');
		$check_display = new XoopsFormCheckBox('', 'ele_display['.$ide.']', $display);
		$check_display->addOption(1, ' ');
		$hidden_id = new XoopsFormHidden('ele_id[]', $ide);
		if(is_array($ele_value))$ele_value[0] = addslashes ($ele_value[0]);

		echo '<tr>';
		echo '<td class="even">'.$i->getVar('ele_caption')."</td>\n";
		echo '<td class="even">'.$ele_value->render()."</td>\n";
		echo '<td class="even" align="center">'.$check_req->render()."</td>\n";
                        if ($order != 0) {
                        echo "<td class='even' align='center' title='".$order."'><a href=updown.php?id=".$id."&ide=".$ide."&pos=".$order."&op=ele_up><img src=".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/up.gif /></a>&nbsp;"; }
                        else echo "<td class='even' align='center' title='".$order."'>";
			echo "<a href=updown.php?id=".$id."&ide=".$ide."&pos=".$order."&op=ele_down><img src=".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/down.gif /></a></td><td class='even' align='center'>".$text_order->render()."</td>";
//					$order = $i->getVar('ele_order');
echo "</td>";
		echo '<td class="even" align="center">'.$check_display->render().$hidden_id->render()."</td>\n";
		echo '<td class="even" align="center"><a href="elements.php?id='.$id.'&op=edit&amp;ele_id='.$ide.'"><img src='.XOOPS_URL.'/modules/'.$xoopsModule->dirname().'/images/edit.gif alt="" onMouseOver="stm(Text[1],Style[1])" onMouseOut="htm()" /></a></td>';
		echo '<td class="even" align="center"><a href="elements.php?id='.$id.'&op=edit&amp;ele_id='.$ide.'&clone=1"><img src='.XOOPS_URL.'/modules/'.$xoopsModule->dirname().'/images/cloner.gif alt="" onMouseOver="stm(Text[2],Style[1])" onMouseOut="htm()"/></a></td>';
		echo '<td class="even" align="center"><a href="elements.php?id='.$id.'&op=delete&amp;ele_id='.$ide.'"><img src='.XOOPS_URL.'/modules/'.$xoopsModule->dirname().'/images/delete.gif alt="" onMouseOver="stm(Text[3],Style[1])" onMouseOut="htm()"/></a></td>';
		echo '</tr>';
	}

	$submit = new XoopsFormButton('', 'submit', _AM_REORD, 'submit');
	echo '
		<tr>
			<td class="foot" colspan="3"></td>
			<td class="foot" colspan="2" align="center">'.$submit->render().'</td>
			<td class="foot" colspan="4"></td>
		</tr>
	</table>
	';

	$hidden_op = new XoopsFormHidden('op', 'save');
	echo $hidden_op->render();
	echo '</form>';
}else{
        xoops_cp_header();
form_adminMenu(2, _AM_FORMS);
	extract($_POST);
	$error = '';
	foreach( $ele_id as $ide ){
		$element =& $formulaire_mgr->get($ide);
		$req = !empty($ele_req[$ide]) ? 1 : 0;
		$element->setVar('ele_req', $req);
		$order = !empty($ele_order[$ide]) ? intval($ele_order[$ide]) : 0;
		$element->setVar('ele_order', $order);
		$display = !empty($ele_display[$ide]) ? 1 : 0;
		$element->setVar('ele_display', $display);
		$type = $element->getVar('ele_type');
		$value = $element->getVar('ele_value');
		if ($type == 'areamodif') $ele_value = $element->getVar('ele_value');
		$ele_value[0] = eregi_replace("'", "`", $ele_value[0]);
		$ele_value[0] = stripslashes($ele_value[0]);

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

		switch($type){
			case 'text':
				$value[2] = $ele_value[$ide];
			break;
			case 'textarea':
				$value[0] = $ele_value[$ide];
			break;
			case 'select':
				$new_vars = array();
				$opt_count = 1;
				if( is_array($ele_value[$ide]) ){
					while( $j = each($value[2]) ){
						if( in_array($opt_count, $ele_value[$ide]) ){
							$new_vars[$j['key']] = 1;
						}else{
							$new_vars[$j['key']] = 0;
						}
					$opt_count++;
					}
				}else{
					if( count($value[2]) > 1 ){
						while( $j = each($value[2]) ){
							if( $opt_count == $ele_value[$ide] ){
								$new_vars[$j['key']] = 1;
							}else{
								$new_vars[$j['key']] = 0;
							}
						$opt_count++;
						}
					}else{
						while( $j = each($value[2]) ){
							if( !empty($ele_value[$ide]) ){
								$new_vars = array($j['key']=>1);
							}else{
								$new_vars = array($j['key']=>0);
							}
						}
					}
				}

				$value[2] = $new_vars;
			break;
			case 'checkbox':
				$new_vars = array();
				$opt_count = 1;
				if( is_array($ele_value[$ide]) ){
					while( $j = each($value) ){
						if( in_array($opt_count, $ele_value[$ide]) ){
							$new_vars[$j['key']] = 1;
						}else{
							$new_vars[$j['key']] = 0;
						}
					$opt_count++;
					}
				}else{
					if( count($value) > 1 ){
						while( $j = each($value) ){
							$new_vars[$j['key']] = 0;
						}
					}else{
						while( $j = each($value) ){
							if( !empty($ele_value[$ide]) ){
								$new_vars = array($j['key']=>1);
							}else{
								$new_vars = array($j['key']=>0);
							}
						}
					}
				}
				$value = $new_vars;
			break;
			case 'mail':
				$new_vars = array();
				$opt_count = 1;
				if( is_array($ele_value[$ide]) ){
					while( $j = each($value) ){
						if( in_array($opt_count, $ele_value[$ide]) ){
							$new_vars[$j['key']] = 1;
						}else{
							$new_vars[$j['key']] = 0;
						}
					$opt_count++;
					}
				}else{
					if( count($value) > 1 ){
						while( $j = each($value) ){
							$new_vars[$j['key']] = 0;
						}
					}else{
						while( $j = each($value) ){
							if( !empty($ele_value[$ide]) ){
								$new_vars = array($j['key']=>1);
							}else{
								$new_vars = array($j['key']=>0);
							}
						}
					}
				}
				$value = $new_vars;
			break;
			case 'radio':
			case 'yn':
				$new_vars = array();
				$i = 1;
				while( $j = each($value) ){
					if( $ele_value[$ide] == $i ){
						$new_vars[$j['key']] = 1;
					}else{
						$new_vars[$j['key']] = 0;
					}
					$i++;
				}
				$value = $new_vars;
			break;
			case 'date':
				$value[0] = $ele_value[$ide];
			break;
			case 'areamodif':
				$value[0] = $ele_value[0];
			break;
			case 'sep':
				$value[2] = $ele_value[$ide];
			break;
			case 'upload':
				$value[0] = $ele_value[$ide];
				$value[1] = $ele_value[$ide+1];
				$value[2] = $ele_value[$ide+2];
			break;
			default:
			break;
		}
		$element->setVar('ele_value', $value);
		$element->setVar('id_form', $id);
		if( !$formulaire_mgr->insert($element) ){
			$error .= $element->getHtmlErrors();
		}
	}
	if( empty($error) ){
		$url = "index.php?id=$id";
		Header("Location: $url");
	}else{
		xoops_cp_header();
		form_adminMenu(2, _AM_FORMS);
		echo $error;
	}
}
	echo '	<table class="outer" width="100%"><tr>
			<th><center>'._AM_SEE_FORM.'</center></th>
		</tr>
		<tr><td class="even"><center><a href="../formulaire.php?id='.$id.'" target="_blank"><img src="../images/formulaire.gif" alt="" onMouseOver="stm(Text[4],Style[1])" onMouseOut="htm()"></a></center></td></tr></table>';


include 'footer.php';

xoops_cp_footer();
?>