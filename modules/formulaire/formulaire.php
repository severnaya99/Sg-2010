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

include 'header.php';
include_once XOOPS_ROOT_PATH.'/class/mail/phpmailer/class.phpmailer.php';
include_once XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
// If security image is installed .. include the class
if (file_exists (XOOPS_ROOT_PATH."/class/xoopsform/securityimage.php")) {
  include_once XOOPS_ROOT_PATH.'/class/xoopsform/securityimage.php';
} elseif (file_exists (XOOPS_ROOT_PATH."/frameworks/captcha/formcaptcha.php")) {
  include_once XOOPS_ROOT_PATH.'/Frameworks/captcha/formcaptcha.php';
	$framework = true;
}

if ( file_exists("language/".$xoopsConfig['language']."/modinfo.php") ) {
	include "language/".$xoopsConfig['language']."/modinfo.php";
}
else {
	include "language/english/modinfo.php";
}

include("xoops_version.php");

$destname = '';

global $xoopsDB, $myts, $xoopsUser, $xoopsModule, $xoopsTpl, $xoopsConfig, $destname, $allowed_mimetypes, $permittedtypes;

/**
 * Gestion de l'upload
 */ 
function formulaire_upload($indice, $dstpath, $destname, $permittedtypes, $maxUploadSize)
{
//	global $destname;
	//$permittedtypes = array("image/gif","image/pjpeg","image/jpeg","image/x-png") ;	
	
	$permittedtypes = $allowed_mimetypes;
	
	if(isset($_POST['xoops_upload_file'])) {
		include_once XOOPS_ROOT_PATH.'/class/uploader.php';
		if(isset($_FILES[$_POST['xoops_upload_file'][$indice]])) {
			$fldname = $_FILES[$_POST['xoops_upload_file'][$indice]];
			$fldname = (get_magic_quotes_gpc()) ? stripslashes($fldname['name']) : $fldname['name'];
			if(xoops_trim($fldname != '')) {
				$uploader = new XoopsMediaUploader($dstpath, $permittedtypes, $maxUploadSize);
				if ($uploader->fetchMedia($_POST['xoops_upload_file'][$indice])) {
					if ($uploader->upload()) {
						return true;
					} else {
						echo _ERRORS.' '.$uploader->getErrors();
						echo "indice :".$indice
						."<br> dstpath :".$dstpath
						."<br> destname :".$destname." - ".$uploadDestName
						."<br> permittedtypes :".$permittedtypes[0]."-".$permittedtypes[1]."-".$permittedtypes[2]."-".$permittedtypes[3]
						."<br>Max upload file:".$maxUploadSize;
            exit;
					}
				} else {
					echo $uploader->getErrors();
				}
			}
		}
	}
	return false;
}

$myts =& MyTextSanitizer::getInstance();
$menuid=0;
$block = array();
$groupuser = array();

if(!isset($_POST['id'])){
	$id = isset ($_GET['id']) ? intval($_GET['id']) : 0;
} else {
	$id = intval($_POST['id']);
}

if(!isset($_POST['qcm'])){
	$qcm = isset ($_GET['qcm']) ? intval($_GET['qcm']) : 0;
} else {
	$qcm = intval($_POST['qcm']);
}
//check if the curent user has the right to see the form

    $groups = is_object( $xoopsUser ) ? $xoopsUser -> getGroups() : XOOPS_GROUP_ANONYMOUS;
    $gperm_handler = &xoops_gethandler( 'groupperm' );

		$module_handler =& xoops_gethandler('module');
		$formulaireModule =& $module_handler->getByDirname('formulaire');

		if ( $gperm_handler -> checkRight( 'Droits des categories', $id, $groups, $formulaireModule->getVar('mid') ) ) {} 
		else 
		{			redirect_header(XOOPS_URL,1,"NOPERM");
}

//
if(!isset($num_id)){ $num_id=0;}
if(!isset($path)){ $path="";}
if(!isset($form2)){ $form2="";}
$position=0;


$sql=sprintf("SELECT desc_form,admin,groupe,email,expe, url, help, send, msend, msub, mip, mnav, cod, save, onlyone, image, nbjours, afftit, affimg, ordre, qcm, affres, affrep FROM ".$xoopsDB->prefix("form_id")." WHERE id_form='%d'",$id);
$res = $xoopsDB->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.$xoopsDB->error());

if ($res) {
	while ($row= $xoopsDB->fetchArray($res)) {
		$title = $row['desc_form'];
		$title = $myts->displayTarea($title,1);
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

if ($onlyone == '1') {
	if (is_object($xoopsUser)) {
		$tab= $xoopsUser->getGroups();
		if ($tab[0] != 1) {
			$sql=sprintf("SELECT id_req,MAX(time) FROM ".$xoopsDB->prefix("form_form")." WHERE id_form=".$id." and uid=".$xoopsUser->getVar("uid")." and ip='".xoops_getenv('REMOTE_ADDR')."' GROUP BY time");
			$res = $xoopsDB->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.$xoopsDB->error());
			if ($res) {
				while ($row= $xoopsDB->fetchArray($res)) {
					$id_req2 = $row['id_req'];
					$time2 = $row['MAX(time)'];
				}
			}
			if (!empty($time2)) {
				if ($nbjours != 0) {
					if (((mktime(0 , 0 , 0 , date("m") , date("d") , date("Y")) - strtotime($time2))/86400) < $nbjours) {
						 $jours = ($nbjours - ((mktime(0 , 0 , 0 , date("m") , date("d") , date("Y")) - strtotime($time2))/86400));
						 redirect_header(XOOPS_URL,1,_FORMULAIRE_WAIT1.$jours._FORMULAIRE_WAIT2);
					}
				} else {
					if (!empty($id_req2)) {
						redirect_header(XOOPS_URL,1,_FORMULAIRE_ONLYONE);
 	 	 			}
				}
			}
		}
	} else {
		$sql=sprintf("SELECT id_req,MAX(time) FROM ".$xoopsDB->prefix("form_form")." WHERE id_form=".$id." and uid=0 and ip='".xoops_getenv('REMOTE_ADDR')."'  GROUP BY time");
		$res = $xoopsDB->query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.$xoopsDB->error());
		if ($res) {
			while ($row= $xoopsDB->fetchArray($res)) {
				$id_req2 = $row['id_req'];
				$time2 = $row['MAX(time)'];
			}
		}
		if (!empty($time2)) {
			if ($nbjours != 0) {
				if (((mktime(0 , 0 , 0 , date("m") , date("d") , date("Y")) - strtotime($time2))/86400) < $nbjours) {
					 $jours = ($nbjours - ((mktime(0 , 0 , 0 , date("m") , date("d") , date("Y")) - strtotime($time2))/86400));
					 redirect_header(XOOPS_URL,1,_FORMULAIRE_WAIT1.$jours._FORMULAIRE_WAIT2);
				}
			} else {
				if (!empty($id_req2)) {
					redirect_header(XOOPS_URL,1,_FORMULAIRE_ONLYONE);
				}
   			}
   		}
	}
}

$result_form = $xoopsDB->query("SELECT margintop, marginbottom, itemurl, status FROM ".$xoopsDB->prefix("form_menu")." WHERE menuid=".$id);

$res_mod = $xoopsDB->query("SELECT mid FROM ".$xoopsDB->prefix("modules")." WHERE dirname='".$xoopsModule->getVar('dirname')."'");
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

if ($ordre=='tit') {
	if ($afftit=='1') {
		$form2 = "<center><font size=4>".$title."</font></center>";
	} else {
		$form2 = '';
	}
	if ($affimg=='1') {
		$form2 .= "<br /><center><img src=".XOOPS_URL."/uploads/formulaire/imgform/".$image."></center><br />";
	} else {
		$form2 .= '';
	}
} else if ($ordre=='img') {
	if ($affimg=='1') {
		$form2 = "<center><img src=".XOOPS_URL."/uploads/formulaire/imgform/".$image."></center>";
	} else {
		$form2 = '';
	}
	if ($afftit=='1') {
		$form2 .= "<br /><center><font size=4>".$title."</font></center><br />";
	} else {
		$form2 .= '';
	}
}
include_once(XOOPS_ROOT_PATH . "/modules/".$modversion['dirname']."/upload_FA.php");

if( empty($_POST['submit']) ) {
	$j = 0;

	include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
	include_once XOOPS_ROOT_PATH.'/header.php';
	$criteria = new Criteria('ele_display', 1);
	$criteria->setSort('ele_order');
	$criteria->setOrder('ASC');
	$elements =& $formulaire_mgr->getObjects2($criteria,$id);

  if ($qcm == '1') {
		$urlsuite = XOOPS_URL.'/modules/'.$modversion["dirname"].'/formulaire.php?id='.$id.'&qcm=1';
	} else {
		$urlsuite = XOOPS_URL.'/modules/'.$modversion["dirname"].'/formulaire.php?id='.$id.'&qcm=0';
	}

	$form = new XoopsThemeForm($form2, $modversion["dirname"], $urlsuite);

	$form->setExtra("enctype='multipart/form-data'") ; // impératif !
	include_once(XOOPS_ROOT_PATH . "/class/uploader.php");
	if (!empty($_POST['event_id']) && !empty($_POST['event_title'])) { // aus pical kommend
	  $picalid = new XoopsFormHidden('pical_eventid', intval($_POST['event_id']));
	  $form->addElement ($picalid);
		$picalid2 = new XoopsFormHidden('pical_eventtext', trim($_POST['event_title']));
	  $form->addElement ($picalid2);
		$picaltext = new XoopsFormLabel("",trim($_POST['event_title']));
		$form->addElement ($picaltext);
	}

	$count = 0;
	$tabval = array();
	foreach( $elements as $i ) {
		$ele_value = $i->getVar('ele_value');

		if (isset ($ele_value[0])) {
			$ele_value[0] = eregi_replace("'", "`", $ele_value[0]);
			$ele_value[0] = stripslashes($ele_value[0]);
		}
		if ($qcm == '1') {
			if ($i->getVar('ele_type') == 'select') {
				$opt_count=0;
				$tabval[$j] = '';
				while( $k = each($ele_value[2]) ){
					$options[$opt_count] = $myts->stripSlashesGPC($k['key']);
					if( $k['value'] > 0 ){
						$tabval[$j] .= ":".$k['key'];
					}
					$opt_count++;
				}
			} else if ($i->getVar('ele_type') == 'checkbox') {
				$opt_count=0;
				$tabval[$j] = '';
				while( $k = each($ele_value) ){
					$options[$opt_count] = $myts->stripSlashesGPC($k['key']);
					if( $k['value'] > 0 ){
						$tabval[$j] .= ":".$k['key'];
					}
					$opt_count++;
				}
			} else if ($i->getVar('ele_type') == 'yn') {
				$opt_count=0;
				$tabval[$j] = '';
				while( $k = each($ele_value) ){
					$options[$opt_count] = constant($k['key']);
					$options[$opt_count] = $myts->stripSlashesGPC($options[$opt_count]);
					if( $k['value'] > 0 ){
						if ($k['key'] == '_YES') {
							$tabval[$j] = 1;
                        } else if ($k['key'] == '_NO') {
							$tabval[$j] = 2;
                        }
					}
					$opt_count++;
				}
			} else if ($i->getVar('ele_type') == 'radio') {
				$opt_count=0;
				$tabval[$j] = '';
				while( $k = each($ele_value) ){
					$options[$opt_count] = $myts->stripSlashesGPC($k['key']);
      				$options[$opt_count] = $myts->displayTarea($options[$opt_count]);
					if( $k['value'] > 0 ){
						$tabval[$j] .= $k['key'];
					}
					$opt_count++;
				}
			}
            $j++;
		}

		//compatibility php 4.4
		unset($form_ele);

		$renderer = new FormulaireElementRenderer($i);
		if ($qcm == '1') {
			$form_ele =& $renderer->constructElement('ele_'.$i->getVar('ele_id'),'','1');
		} else {
        	$form_ele = $renderer->constructElement('ele_'.$i->getVar('ele_id'),'','0');
        }

		if ($i->getVar('ele_type') == 'sep') {
			$ele_value[0] = eregi_replace('@font','',$ele_value[0]);
			$ele_value = split ('<*>', $ele_value[0]);
			foreach ($ele_value as $t){
				if (strpos($t, '<')!=false) {
					$ele_value[0] = $t;
                }
            }
			$ele_value = split ('</', $ele_value[0]);

			$hid = new XoopsFormHidden('ele_'.$i->getVar('ele_id'), $ele_value[0]);
			$form->addElement ($hid);

		}
		if ($i->getVar('ele_type') == 'areamodif'){
			$hid2 = new XoopsFormHidden('ele_'.$i->getVar('ele_id'), $ele_value[0]);
			$form->addElement ($hid2);
		}

        if ($i->getVar('ele_type') == 'upload'){
			$hid3 = new XoopsFormHidden($ele_value[1], $ele_value[1]);
			$form->addElement ($hid3);
		}

        $req = intval($i->getVar('ele_req'));
		$form->addElement($form_ele, $req);
		$count++;
		unset($hidden);
	}

    if ($qcm == '1') {
		$tabtemp=implode("_", $tabval);
		$testtabtemp = new XoopsFormHidden('tab',$tabtemp);
		$form -> addElement($testtabtemp);
	}

	$form->addElement (new XoopsFormHidden ('counter', $count));

    if ($elements) {
    	$send = $myts->displayTarea($send);

		// SecurityImage by DuGris
		if (defined('SECURITYIMAGE_INCLUDED')) {
    		$security_image = new SecurityImage( _SECURITYIMAGE_GETCODE );
			if ($security_image->render()) {
        		$form->addElement($security_image, true);
			}
    } elseif(!empty($framework)) {
		  $form->addElement(new XoopsFormCaptcha('', 'xoopscaptcha', true, 4, 12, 12, 0,0),true);
		}
	  // SecurityImage by DuGris

		$form->addElement(new XoopsFormButton('', 'submit', $send, 'submit'));
		$form->display();
		echo "<div>"._AM_WARN."</div>";
	} else {
		echo "<table class='outer' width='100%'><th><center><font size='4'>".$title."</font></center></th></table><div style='color: red; font-weight: bold; text-decoration: blink; font-size: x-large; text-align:center'>"._AM_NOELE."</div>";
	}
	include_once XOOPS_ROOT_PATH.'/footer.php';
} else {

	// SecurityImage by DuGris
    include_once(XOOPS_ROOT_PATH . "/class/xoopsformloader.php");
    if ( defined('SECURITYIMAGE_INCLUDED') && !SecurityImage::CheckSecurityImage() ) {
    	$redirect = XOOPS_URL . "/modules/" . $modversion["dirname"] . "/formulaire.php?id=" . $_GET['id'] . "&qcm=" . $_GET['qcm'];
        redirect_header( $redirect , 2, _SECURITYIMAGE_ERROR ) ;
        exit();
		} elseif(!empty($framework)) {
		  include_once XOOPS_ROOT_PATH.'/Frameworks/captcha/captcha.php';
			$security = new XoopsCaptcha();
		  if (!$security->verify(true)) {
			  if (!empty($_POST['pical_eventid'])) {
				  $redirect = XOOPS_URL . "/modules/piCal/?event_id=".intval($_POST['pical_eventid']);
				} else {
				  $redirect = XOOPS_URL . "/modules/" . $modversion["dirname"] . "/formulaire.php?id=" . $_GET['id'] . "&qcm=" . $_GET['qcm'];
				}
        redirect_header( $redirect , 2, XOOPS_CAPTCHA_INVALID_CODE ) ;
        exit();
			}
    }
    // SecurityImage by DuGris
	

	if ($qcm == '1') {
		$h = 0;
		$tabtemp = $myts->makeTboxData4Save($_POST["tab"]);
		$tabval = array();
		$tabval = explode("_", $tabtemp);
	}
	$msg = "";
	$i=0;
	unset($_POST['submit']);
	foreach( $_POST as $k => $v ){
		if( preg_match('/ele_/', $k)){
			$n = explode("_", $k);
			$ele[$n[1]] = $v;
			$ide[$n[1]] = $n[1];
		}
		if($k == 'xoops_upload_file'){
			$tmp = $k;
			$k = $v[0];
			$v = $tmp;
			$n = explode("_", $k);
			$ele[$n[1]] = $v;
			$ide[$n[1]] = $n[1];
		}
	}
	
  
	$sql = $xoopsDB->query("SELECT id_req from " . $xoopsDB->prefix("form_form")." order by id_req DESC");
	list($id_req) = $xoopsDB->fetchRow($sql);
	if ($id_req == 0) {
    	$num_id = 1;
    } else if (
    	$num_id <= $id_req
    )
    $num_id = $id_req + 1;

	$up = array();
	$value = null;
	$nbok = 0;
	$nbtot = 0;
	$mailing = '';
	
	if (!empty($_POST['pical_eventid'])) {
	  $msg.= "<table border=1 bordercolordark=black bordercolorlight=#C0C0C0 width=500><tr><td bgcolor='#6C87B0'><b><I><font color='white'>&nbsp;&nbsp;piCal-Event :</font></I></b></td></tr><tr><td bgcolor='#efefef'>&nbsp;&nbsp;";
		$msg.= XOOPS_URL."/modules/piCal/?event_id=".intval($_POST['pical_eventid'])."<br />";
		$msg.= trim($_POST['pical_eventtext'])."<br /></td></table><br />";		
	}

	foreach( $ide as $i ){
		$element =& $formulaire_mgr->get($i);
		if( !empty($ele[$i]) ) {
			$id_form = $element->getVar('id');
			$ele_id = $element->getVar('ele_id');
			$ele_type = $element->getVar('ele_type');
			$ele_value = $element->getVar('ele_value');
			$ele_caption = $element->getVar('ele_caption');
			$ele_caption = stripslashes($ele_caption);
			$ele_caption = eregi_replace ("&#039;", "`", $ele_caption);
			$ele_caption = eregi_replace ("&quot;", "`", $ele_caption);

			switch($ele_type){
				case 'text':
					$msg.= "<table border=1 bordercolordark=black bordercolorlight=#C0C0C0 width=500><tr><td bgcolor='#6C87B0'><b><I><font color='white'>&nbsp;&nbsp;".$ele_caption."</font></I></b></td></tr><tr><td bgcolor='#efefef'>&nbsp;&nbsp;";
					$msg.= $myts->stripSlashesGPC($ele[$i])."<br /></td></table><br />";
					$value = $ele[$i];
				break;
				case 'textarea':
					$msg.= "<table border=1 bordercolordark=black bordercolorlight=#C0C0C0 width=500><tr><td bgcolor='#6C87B0'><b><I><font color='white'>&nbsp;&nbsp;".$ele_caption."</font></I></b></td></tr><tr><td bgcolor='#efefef'>&nbsp;&nbsp;";
					$msg.= $myts->stripSlashesGPC($ele[$i])."<br /></td></table><br />";
					$value = $ele[$i];
				break;

				case 'radio':
					$msg.= "<table border=1 bordercolordark=black bordercolorlight=#C0C0C0 width=500><tr><td bgcolor='#6C87B0'><b><I><font color='white'>&nbsp;&nbsp;".$ele_caption."</font></I></b></td></tr><tr><td bgcolor='#efefef'>&nbsp;&nbsp;";
					$value = '';
					$opt_count = 1;
					while( $v = each($ele_value) ){
						if( $opt_count == $ele[$i] ){
							$msg.= $myts->stripSlashesGPC($v['key']).'<br />';
							$value = $v['key'];
						}
						$opt_count++;
					}
					if ($qcm == '1') {
						if ($affrep == '1') {
							$msg .= "<br /><b>&nbsp;&nbsp;"._ANSWERS."</b><br />&nbsp;&nbsp;";
							$msg .= $myts->stripSlashesGPC($tabval[$h]);
						}
					}
		 			$msg.= $myts->stripSlashesGPC("</td></table><br />");
				break;

				case 'yn':
					$msg.= "<table border=1 bordercolordark=black bordercolorlight=#C0C0C0 width=500><tr><td bgcolor='#6C87B0'><b><I><font color='white'>&nbsp;&nbsp;".$ele_caption."</font></I></b></td></tr><tr><td bgcolor='#efefef'>&nbsp;&nbsp;";
					$v = ($ele[$i]==2) ? _NO : _YES;
					$msg.= $myts->stripSlashesGPC($v)."<br />";
					if ($qcm == '1') {
						if ($affrep == '1') {
							$msg .= "<br /><b>&nbsp;&nbsp;"._ANSWERS."</b><br />&nbsp;&nbsp;";
							if ($tabval[$h] == '1') {
							$msg .= $myts->stripSlashesGPC(_YES);}
							else if ($tabval[$h] == '2') {
							$msg .= $myts->stripSlashesGPC(_NO);}
						}
					}
					$msg.= "</td></table><br />";
					$value = $ele[$i];
				break;

				case 'checkbox':
					$msg.= "<table border=1 bordercolordark=black bordercolorlight=#C0C0C0 width=500><tr><td bgcolor='#6C87B0'><b><I><font color='white'>&nbsp;&nbsp;".$ele_caption."</font></I></b></td></tr><tr><td bgcolor='#efefef'>&nbsp;&nbsp;";
					$value = '';
					$opt_count = 1;
					while( $v = each($ele_value) ){
						if( is_array($ele[$i]) ){
							if( in_array($opt_count, $ele[$i]) ){
								$msg.= $myts->stripSlashesGPC($v['key']).'<br />';
								$value = $value.':'.$v['key'];
							}
							$opt_count++;
						}else{
							if( !empty($ele[$i]) ){
								$msg.= $myts->stripSlashesGPC($v['key']).'<br />';
								$value = $v['key'];
							}
						}
					}
					if ($qcm == '1') {
						if ($affrep == '1') {
							$msg .= "<br /><b>&nbsp;&nbsp;"._ANSWERS."</b>";
							$rep= split(':', $tabval[$h]);
							foreach( $rep as $w ){
								$msg.= '&nbsp;&nbsp;'.$myts->stripSlashesGPC($w).'<br />';
							}
						}
					}
					$msg.= $myts->stripSlashesGPC("</td></table><br />");
				break;

				case 'mail':
					$msg.= "<table border=1 bordercolordark=black bordercolorlight=#C0C0C0 width=500><tr><td bgcolor='#6C87B0'><b><I><font color='white'>&nbsp;&nbsp;".$ele_caption."</font></I></b></td></tr><tr><td bgcolor='#efefef'>";
					$mailing = '';
					$value = '';
					$opt_count = 1;
					while( $v = each($ele_value) ){
						if( is_array($ele[$i]) ){
							if( in_array($opt_count, $ele[$i]) ){
								$v['key'] = split(" - ", $v['key']);
								$msg.= $myts->stripSlashesGPC('<li>'.$v['key'][0]).'</li>';
								$mailing = $mailing.$v['key'][1].';';
							}
							$opt_count++;
						}else{
							if( !empty($ele[$i]) ){
								$v['key'] = split(" - ", $v['key']);
								$msg.= $myts->stripSlashesGPC('<li>'.$v['key'][0]).'</li>';
								$mailing = $v['key'][1];
							}
						}
					}
					$value = $mailing;
					$msg.= $myts->stripSlashesGPC("</td></table><br />");
				break;

				case 'mailunique':
					$msg.= "<table border=1 bordercolordark=black bordercolorlight=#C0C0C0 width=500><tr><td bgcolor='#6C87B0'><b><I><font color='white'>&nbsp;&nbsp;".$ele_caption."</font></I></b></td></tr><tr><td bgcolor='#efefef'>";
					$mailing = '';
					$value = '';
					$opt_count = 1;
					while( $v = each($ele_value) ){
						if( is_array($ele[$i]) ){
							if( in_array($opt_count, $ele[$i]) ){
								$v['key'] = split(" - ", $v['key']);
								$msg.= $myts->stripSlashesGPC('<li>'.$v['key'][0]).'</li>';
								$mailing = $mailing.$v['key'][1].';';
							}
							$opt_count++;
						}else{
							if( !empty($ele[$i]) ){
								$v['key'] = split(" - ", $v['key']);
								$msg.= $myts->stripSlashesGPC('<li>'.$v['key'][0]).'</li>';
								$mailing = $v['key'][1];
							}
						}
					}
					$value = $mailing;
					$msg.= $myts->stripSlashesGPC("</td></table><br />");
				break;

				case 'select':
					$msg.= "<table border=1 bordercolordark=black bordercolorlight=#C0C0C0 width=500><tr><td bgcolor='#6C87B0'><b><I><font color='white'>&nbsp;&nbsp;".$ele_caption."</font></I></b></td></tr><tr><td bgcolor='#efefef'>&nbsp;&nbsp;";
					$value = '';

				$opt_count = 1;
				if( is_array($ele[$i]) ){
					while( $v = each($ele_value[2]) ){
						if( in_array($opt_count, $ele[$i]) ){
								$msg.= $myts->stripSlashesGPC($v['key']).'<br />';
								$value = $value.':'.$v['key'];
						}
						$opt_count++;
					}
				}else{
					while( $j = each($ele_value[2]) ){
						if( $opt_count == $ele[$i] ){
									$msg.= $myts->stripSlashesGPC($j['key']).'<br />';
									$value = ':'.$j['key'];
						}
						$opt_count++;
					}
				}

                if ($qcm == '1') {
					if ($affrep == '1') {
						$msg .= "<br /><b>&nbsp;&nbsp;"._ANSWERS."</b>";
						$rep= split(':', $tabval[$h]);
						foreach( $rep as $w ){
							$msg.= '&nbsp;&nbsp;'.$myts->stripSlashesGPC($w).'<br />';
						}
					}
				}
				$msg.= $myts->stripSlashesGPC("</td></table><br />");
				break;

                case 'areamodif':
					$value = $ele[$i];
				break;

                case 'date':
					$msg.= "<table border=1 bordercolordark=black bordercolorlight=#C0C0C0 width=500><tr><td bgcolor='#6C87B0'><b><I><font color='white'>&nbsp;&nbsp;".$ele_caption."</font></I></b></td></tr><tr><td bgcolor='#efefef'>&nbsp;&nbsp;";
					$msg.= $myts->stripSlashesGPC($ele[$i])."<br /></td></table><br />";
					$value = ''.$ele[$i];
				break;

                case 'sep':
					$value = $myts->stripSlashesGPC($ele[$i]);
				break;

                case 'upload':
					$msg.= "<table border=1 bordercolordark=black bordercolorlight=#C0C0C0 width=500><tr><td bgcolor='#6C87B0'><b><I><font color='white'>&nbsp;&nbsp;".$ele_caption."</font></I></b></td></tr><tr><td bgcolor='#efefef'>&nbsp;&nbsp;";

                    /************* UPLOAD *************/
					$img_dir = XOOPS_ROOT_PATH . "/uploads/".$modversion['dirname'] ;
					$allowed_mimetypes = array();
					foreach ($ele_value[2] as $v) {
//                    	$allowed_mimetypes[] = 'image/'.$v[1];
                    	$allowed_mimetypes[] = $v[1];
					}
					// allowed mime types : pdf, doc, txt, gif, mpeg, jpeg, rar, zip

					$max_imgsize = $ele_value[1];
					$max_imgwidth = 12000;
					$max_imgheight = 12000;

foreach ($_POST["xoops_upload_file"] as $indiceUpload => $fichier)
{
	if( !empty( $fichier ) || $fichier != "") {
		
		// teste si aucun fichier n'a été joint
		if($_FILES[$fichier]['error'] == '2' || $_FILES[$fichier]['error'] == '1') {
			$error = sprintf(_FORMULAIRE_MSG_BIG, $xoopsConfig['sitename'])._FORMULAIRE_MSG_THANK;
			redirect_header(XOOPS_URL."/modules/".$modversion['dirname']."/formulaire.php?id=".$id, 3, $error);
		}
		if(filesize($_FILES[$fichier]['tmp_name']) ==null) {
			$value = $path = '';
			$filename = '';
			$msg.= $filename.'</TD></table><br />';
			break;
		}

		if($_FILES[$fichier]['size'] > $max_imgsize) {
			$error = sprintf(_FORMULAIRE_MSG_UNSENT.$max_imgsize.' octets', $xoopsConfig['sitename'])._FORMULAIRE_MSG_THANK;
			redirect_header(XOOPS_URL."/modules/".$modversion['dirname']."/formulaire.php?id=".$id, 3, $error);
		}

		// teste si le fichier a été uploadé dans le répertoire temporaire:
		if( ! is_readable( $_FILES[$fichier]['tmp_name'])  || $_FILES[$fichier]['tmp_name'] == "" ) {
			$path = '';
			$filename = '';
			$error = sprintf(_FORMULAIRE_MSG_UNSENT.$max_imgsize.' octets', $xoopsConfig['sitename'])._FORMULAIRE_MSG_THANK;
			redirect_header(XOOPS_URL."/modules/".$modversion['dirname']."/formulaire.php?id=".$id, 3, $error);
		}

		//$indice, $dstpath, $destname, $permittedtypes, $maxUploadSize)
		$uploadDestPath = XOOPS_UPLOAD_PATH.'/'.$modversion['dirname'].'/imgform';
		$uploadDestName = $fichier;
		$uploadMimeTypes = $allowed_mimetypes;
		$uploadUploadSize = $max_imgsize;
		if(formulaire_upload($indiceUpload, $uploadDestPath, $uploadDestName, $uploadMimeTypes, $uploadUploadSize)) {
			$msg.= $destname.'</TD></table><br />';			
		}		
	} else {
		$value = $path = '';
		$filename = '';
		$msg.= $filename.'</TD></table><br />';
	}
}
				break;

                default:
				break;
			}

			if( is_object($xoopsUser) ) {
		  		$uid = $xoopsUser->getVar("uid");
			} else {
				$uid =0;
			}

            if ($qcm == '1') {
				if ($ele_type == 'select' || $ele_type == 'checkbox' || $ele_type == 'radio' || $ele_type == 'yn') {
					if ($value == $tabval[$h]) {
						$nbok++;
					}
					$nbtot++;
				}
			}

			if ($save == 1) {
				$date = date ("Y-m-d");
				$value = str_replace(":","",$value);

				$value = addslashes ($value);
				if ($qcm == '1') {
					if ($ele_type == 'select' || $ele_type == 'checkbox' || $ele_type == 'radio' || $ele_type == 'yn') {
						$sql="INSERT INTO ".$xoopsDB->prefix("form_form")." (id_form, id_req, ele_id, ele_type, ele_caption, ele_value, uid, date, ip, rep, nbrep, nbtot, pos) VALUES (\"$id\", \"$num_id\", \"\", \"$ele_type\", \"$ele_caption\", \"$value\", \"$uid\", \"$date\", \"".xoops_getenv('REMOTE_ADDR')."\", \"$tabval[$h]\", \"$nbok\", \"$nbtot\", \"$position\")";
						$position++;
					} else {
            $sql="INSERT INTO ".$xoopsDB->prefix("form_form")." (id_form, id_req, ele_id, ele_type, ele_caption, ele_value, uid, date, ip, pos) VALUES (\"$id\", \"$num_id\", \"\", \"$ele_type\", \"$ele_caption\", \"$value\", \"$uid\", \"$date\", \"".xoops_getenv('REMOTE_ADDR')."\", \"$position\")";
						$position++;
					}
				} else {
					$sql="INSERT INTO ".$xoopsDB->prefix("form_form")." (id_form, id_req, ele_id, ele_type, ele_caption, ele_value, uid, date, ip, pos) VALUES (\"$id\", \"$num_id\", \"\", \"$ele_type\", \"$ele_caption\", \"$value\", \"$uid\", \"$date\", \"".xoops_getenv('REMOTE_ADDR')."\", \"$position\")";
					$position++;
				}
				$result = $xoopsDB->query($sql);

        if ($result == false) {
					die('Erreur insertion : <br />' . $sql . '<br />');
				}
				if (!empty($_POST['pical_eventid']) && empty($pical_insert)) {
				  $sql="INSERT INTO ".$xoopsDB->prefix("form_form")." (id_form, id_req, ele_id, ele_type, ele_caption, ele_value, uid, date, ip, pos) VALUES (\"$id\", \"$num_id\", \"\", \"text\", \"piCal-Event\", \"<a href='".XOOPS_URL."/modules/piCal/?event_id=".trim($_POST['pical_eventid'])."'>".(trim($_POST['pical_eventtext']) ? addslashes($_POST['pical_eventtext']): "EVENT")."</a>\", \"$uid\", \"$date\", \"".xoops_getenv('REMOTE_ADDR')."\", \"$position\")";
		      $result = $xoopsDB->query($sql);	
					$position++;
					$picalinsert=true;		
	      }
			}

            if ($qcm == '1') {
				if ($ele_type == 'select' || $ele_type == 'checkbox' || $ele_type == 'radio' || $ele_type == 'yn') {
					$h++;
				}
			}
		}
	}
	$msg = nl2br($msg);
	

	if( is_dir(FORMULAIRE_ROOT_PATH."/language/".$xoopsConfig['language']."/mail_template") ){
		$template_dir = FORMULAIRE_ROOT_PATH."/language/".$xoopsConfig['language']."/mail_template";
	} else {
		$template_dir = FORMULAIRE_ROOT_PATH."/language/english/mail_template";
	}

	$xoopsMailer =&getMailer();
	$xoopsMailer->multimailer->isHTML(true);
	$xoopsMailer->setTemplateDir($template_dir);
	$xoopsMailer->setTemplate('formulaire.tpl');
	$xoopsMailer->setSubject(_FORMULAIRE_MSG_SUBJECT._FORMULAIRE_MSG_FORM.$title);

	if ($qcm=='1'){
		if ($affres == '1') {
			$nb_ans = "<table border=1 bordercolordark=black bordercolorlight=#C0C0C0 width=500><tr><td bgcolor='#6C87B0'><b><I><font color='white'>&nbsp;&nbsp;"._FORM_NBANSWER."</I></b>  ".$nbok." / ".$nbtot."</font></td></table><br />";
			$xoopsMailer->assign("NBANS", $nb_ans);
		} else {
			$xoopsMailer->assign("NBANS", '');
		}
	} else {
		$xoopsMailer->assign("NBANS", '');
	}

	if( is_object($xoopsUser) ) {
		$xoopsMailer->setFromEmail($xoopsUser->getVar("email"));
	}

	$xoopsMailer->assign("MSG", $msg);
	$xoopsMailer->assign("TITLE", $title);

	foreach ($up as $k => $v ) {
		$path = $k;
		$filename = $v;
		if ($xoopsMailer->multimailer->AddAttachment($path,$filename,"base64","application/octet-stream")) {
        } else {
        	echo $xoopsMailer->getErrors();
        }
	}

	$xoopsMailer->useMail();

	if ($mailing != '') {
		$rec = split(";",$mailing);
		foreach ($rec as $k) {
			$xoopsMailer->setToEmails($k);
        }
	} else {
		if( $expe == 1 && is_object($xoopsUser)){
			$email_expe   = $xoopsUser->getVar("email");
			$xoopsMailer->setToEmails($email_expe);
		}

		if( $admin == 1 ){
			$xoopsMailer->setToEmails($xoopsConfig['adminmail']);
		} else {

//230207
      $multimail = explode(";",$email);
      foreach ($multimail as $i){
 			$xoopsMailer->setToEmails($multimail[$i]);
      }

//			
//			$xoopsMailer->setToEmails($email);

			if (!empty($groupe) && ($groupe != "0")){
				$sql=sprintf("SELECT name FROM ".$xoopsDB->prefix("groups")." WHERE groupid='%s'",$groupe);
				$res = $xoopsDB->query( $sql ) or die('Erreur SQL !<br />'.$sql.'<br />'.$xoopsDB->error());
				if ( $res ) {
				  	while ( $row = $xoopsDB->fetchRow($res) ) {
				    	$gr = $row[0];
	  				}
				}
			}

			$sqlstr = "SELECT $xoopsDB->prefix" . "_users.uname AS UserName, $xoopsDB->prefix" . "_users.email AS UserEmail, $xoopsDB->prefix" . "_users.uid AS UserID FROM
					".$xoopsDB->prefix("groups").", ".$xoopsDB->prefix("groups_users_link").", ".$xoopsDB->prefix("users")." WHERE $xoopsDB->prefix" . "_users.uid = $xoopsDB->prefix" . "_groups_users_link.uid
					AND $xoopsDB->prefix" . "_groups_users_link.groupid = $xoopsDB->prefix" . "_groups.groupid AND $xoopsDB->prefix" . "_groups.groupid = $groupe";

			$res = $xoopsDB->query($sqlstr);
			while (list($UserName,$UserEmail,$UserID) = $xoopsDB->fetchRow($res)) {
				$xoopsMailer->setToEmails($UserEmail);
			}
		}
	}
	$send_mail="";

	if ($msub == 1 || $mip == 1 || $mnav == 1) {
		$send_mail = "<fieldset>";
	}

	if ($msub == 1) {
		if( is_object($xoopsUser) ){
			$send_mail = $send_mail."<b>"._MAIL_SUB."</b><a href=".XOOPS_URL."/userinfo.php?uid=".$xoopsUser->getVar("uid").">".$xoopsUser->getVar("uname")."</a><br />";
		}else{
			$send_mail = $send_mail."<b>"._MAIL_SUB."</b>".$xoopsConfig['anonymous']."<br />";
		}
	}

	if ($mip == 1) {
		$send_mail = $send_mail."<b>"._MAIL_IP."</b>".xoops_getenv('REMOTE_ADDR')."<br />";
	}

	if ($mnav == 1) {
		$send_mail = $send_mail."<b>"._MAIL_NAV."</b>".xoops_getenv('HTTP_USER_AGENT')."<br />";
	}

    if ($msub == 1 || $mip == 1 || $mnav == 1) {
		$send_mail .= "</fieldset>";
	}

	$xoopsMailer->assign("SENDMAIL", $send_mail);
  $xoopsMailer->charSet = $cod;
  $xoopsMailer->send();
	$sent = sprintf(_FORMULAIRE_MSG_SENT, $xoopsConfig['sitename'])._FORMULAIRE_MSG_THANK;

// If you want to keep the uploaded files in the folder /upload/formulaire/imgform you can comment the following code but IT'S VERY DANGEROUS FOR THE SECURITY. 

// delete the content of the folder.
$dir = opendir($uploadDestPath);
	while($file = readdir($dir)) {
		if($file!=in_array($file, array(".","..")))
		{
			unlink("$uploadDestPath/$file");
	  }
	}
	closedir($dir); 
	
// end of deletion

	unset ($up);
	redirect_header($url, 0, $sent);
}

?>