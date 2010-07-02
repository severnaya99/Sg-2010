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

include 'header.php';
//include_once XOOPS_ROOT_PATH.'/class/mail/phpmailer/class.phpmailer.php';
//include_once XOOPS_ROOT_PATH.'/class/xoopsform/form.php';

//include_once 'include/functions.php';

$xoopsOption['template_main'] = 'formulaire_index.html';
include_once XOOPS_ROOT_PATH.'/header.php';

$perm_name = 'Droits des categories';

$groups = is_object( $xoopsUser ) ? $xoopsUser -> getGroups() : XOOPS_GROUP_ANONYMOUS;
$gperm_handler = &xoops_gethandler( 'groupperm' );

$module_handler =& xoops_gethandler('module');
$formulaireModule =& $module_handler->getByDirname('formulaire');

$myts =& MyTextSanitizer::getInstance();

$form = array();
$qcm = array();

$sql = "SELECT f.* , m.* FROM " . $xoopsDB->prefix("form_id") . " f LEFT JOIN " . $xoopsDB->prefix("form_menu") . " m on f.id_form = m.menuid WHERE m.status =1 ORDER BY m.position";
$res = $xoopsDB->query($sql);
while ( $row= $xoopsDB->fetchArray($res) ) {
	if ( $gperm_handler -> checkRight( $perm_name, $row['id_form'], $groups, $formulaireModule->getVar('mid') ) ) {

		$temp = array();
		$temp['id_form'] = $row['id_form'];
		$temp['title'] = $myts->displayTarea( str_replace("<br />","", $row['desc_form']), 1 );
		$temp['help'] = $myts->displayTarea( $row['help'] );

		$temp['indent'] = $row['indent'];
		$temp['margintop'] = $row['margintop'];
		$temp['marginbottom'] = $row['marginbottom'];
		$temp['itemurl'] = $row['itemurl'];
    $temp['itemurl'] = XOOPS_URL . "/modules/" . $xoopsModule->getVar('dirname') . "/formulaire.php?id=" . $row['id_form'];
		$temp['bold'] = $row['bold'];


		if (empty($row['qcm'])) {
			$form[] = $temp;
	    } elseif ($row['qcm']="1") {
			$qcm[] = $temp;
	    }
    }
}

$xoopsTpl->assign( 'form_title', _AM_FORMUL );
$xoopsTpl->assign( 'form_form', $form );

$xoopsTpl->assign( 'qcm_title' , _FORM_QCM );
$xoopsTpl->assign( 'qcm_qcm' , $qcm );

$xoopsTpl->assign( 'admin_module' , 0 );
$block['admin_module'] = 0;
if ( $xoopsUser ){
	if ( $xoopsUser->isAdmin($formulaireModule) ) {
		$xoopsTpl->assign( 'admin_module' , 1 );
	}
}

include_once XOOPS_ROOT_PATH.'/footer.php';

?>