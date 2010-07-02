<?php
// $Id: perm.php,v 1.3 2005/08/25 19:19:49 zoullou Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
// ------------------------------------------------------------------------- //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //

include '../../../include/cp_header.php';
include_once XOOPS_ROOT_PATH.'/class/xoopsform/grouppermform.php';
include 'function.php';

if(isset($_POST['step'])) {
	$step = $_POST['step'];
} else {
	$step = 'default';
}

$module_id = $xoopsModule->getVar('mid');

switch($step) {

	case 'enreg':

		$gpermHandler = xoops_gethandler('groupperm');

		// Delete old public mask
		$criteria = new CriteriaCompo();
		$criteria->add(new Criteria('gperm_name','extcal_perm_mask'));
		$criteria->add(new Criteria('gperm_modid',$module_id));
		$gpermHandler->deleteAll($criteria);

		foreach($_POST['perms']['extcal_perm_mask']['group'] as $groupId => $perms) {
			foreach(array_keys($perms) as $perm) {
				$gpermHandler->addRight('extcal_perm_mask', $perm, $groupId, $module_id);
			}
		}

		redirect_header("perm.php", 3, _AM_EXTCAL_PERM_MASK_UPDATED);

		break;

	case 'default':
	default:

		xoops_cp_header();
		adminMenu(4);

		$member_handler =& xoops_gethandler('member');
		$gperm_handler =& xoops_gethandler('groupperm');

		// Retriving the group list
		$glist =& $member_handler->getGroupList();

		// Retriving Public category permission mask
		$viewGroup = $gperm_handler->getGroupIds('extcal_perm_mask', 1, $module_id);
		$submitGroup = $gperm_handler->getGroupIds('extcal_perm_mask', 2, $module_id);
		$autoApproveGroup = $gperm_handler->getGroupIds('extcal_perm_mask', 4, $module_id);

		function getChecked($array,$v) {
			if(in_array($v,$array)) {
				return ' checked="checked"';
			} else {
				return '';
			}
		}

		echo '<script type="text/javascript" src="../include/admin.js"></script>';

		/**
		 * Public category permission mask
		 */
		echo '<fieldset id="defaultBookmark"><legend><a href="#defaultBookmark" style="font-weight:bold; color:#990000;" onClick="toggle(\'default\'); toggleIcon(\'defaultIcon\');"><img id="defaultIcon" src="../images/minus.gif" />&nbsp;'._AM_EXTCAL_PUBLIC_PERM_MASK.'</a></legend><div id="default">';
		echo '<fieldset><legend style="font-weight:bold; color:#0A3760;">'._AM_EXTCAL_INFORMATION.'</legend>';
		echo _AM_EXTCAL_PUBLIC_PERM_MASK_INFO;
		echo '</fieldset><br />';
		echo '<table class="outer" style="width:100%;">';
		echo '<form method="post" action="perm.php">';
		echo '<tr>';
		echo '<th colspan="8" style="text-align:center;">'._AM_EXTCAL_PUBLIC_PERM_MASK.'</th>';
		echo '</tr>';
		echo '<tr>';
		echo '<td class="head" style="text-align:center;">'._AM_EXTCAL_GROUP_NAME.'</td>';
		echo '<td class="head" style="text-align:center;">'._AM_EXTCAL_CAN_VIEW.'</td>';
		echo '<td class="head" style="text-align:center;">'._AM_EXTCAL_CAN_SUBMIT.'</td>';
		echo '<td class="head" style="text-align:center;">'._AM_EXTCAL_AUTO_APPROVE.'</td>';
		echo '</tr>';
		$i = 0;
		foreach ($glist as $k => $v) {
			$style = ($i++%2 == 0) ? "odd" : "even" ;
			echo '<tr>';
			echo '<td class="'.$style.'">'.$v.'</td>';
			echo '<td class="'.$style.'" style="text-align:center;"><input name="perms[extcal_perm_mask][group]['.$k.'][1]" type="checkbox"'.getChecked($viewGroup,$k).' /></td>';
			echo '<td class="'.$style.'" style="text-align:center;"><input name="perms[extcal_perm_mask][group]['.$k.'][2]" type="checkbox"'.getChecked($submitGroup,$k).' /></td>';
			echo '<td class="'.$style.'" style="text-align:center;"><input name="perms[extcal_perm_mask][group]['.$k.'][4]" type="checkbox"'.getChecked($autoApproveGroup,$k).' /></td>';
			echo '</tr>';
		}
		echo '<input type="hidden" name="type" value="public" />';
		echo '<input type="hidden" name="step" value="enreg" />';
		echo '<tr><td colspan="8" style="text-align:center;" class="head"><input type="submit" value="'._SUBMIT.'" /></td></tr></form>';
		echo '</table><br />';

		echo '</div></fieldset><br />';

		// Retriving category list for Group perm form
		$catHandler = xoops_getmodulehandler('cat', 'extcal');
		$cats = $catHandler->getAllCat($xoopsUser, 'all');

		/**
		 * Access Form
		 */
		$title_of_form = _AM_EXTCAL_VIEW_PERMISSION;
		$perm_name = 'extcal_cat_view';
		$perm_desc = _AM_EXTCAL_VIEW_PERMISSION_DESC;
		$form = new XoopsGroupPermForm($title_of_form, $module_id, $perm_name, $perm_desc, 'admin/perm.php');
		foreach ($cats as $cat) {
			$form->addItem($cat->getVar('cat_id'), $cat->getVar('cat_name'));
		}

		echo '<fieldset id="'.$perm_name.'Bookmark"><legend><a href="#'.$perm_name.'Bookmark" style="font-weight:bold; color:#990000;" onClick="toggle(\''.$perm_name.'\'); toggleIcon(\''.$perm_name.'Icon\');"><img id="'.$perm_name.'Icon" src="../images/minus.gif" />&nbsp;'.$title_of_form.'</a></legend><div id="'.$perm_name.'">';
		echo '<fieldset><legend style="font-weight:bold; color:#0A3760;">'._AM_EXTCAL_INFORMATION.'</legend>';
		echo $perm_desc;
		echo '</fieldset>';
		echo $form->render().'<br />';
		echo '</div></fieldset><br />';


		/**
		 * Submit form
		 */
		$title_of_form = _AM_EXTCAL_SUBMIT_PERMISSION;
		$perm_name = 'extcal_cat_submit';
		$perm_desc = _AM_EXTCAL_SUBMIT_PERMISSION_DESC;
		$form = new XoopsGroupPermForm($title_of_form, $module_id, $perm_name, $perm_desc, 'admin/perm.php');
		foreach ($cats as $cat) {
			$form->addItem($cat->getVar('cat_id'), $cat->getVar('cat_name'));
		}

		echo '<fieldset id="'.$perm_name.'Bookmark"><legend><a href="#'.$perm_name.'Bookmark" style="font-weight:bold; color:#990000;" onClick="toggle(\''.$perm_name.'\'); toggleIcon(\''.$perm_name.'Icon\');"><img id="'.$perm_name.'Icon" src="../images/minus.gif" />&nbsp;'.$title_of_form.'</a></legend><div id="'.$perm_name.'">';
		echo '<fieldset><legend style="font-weight:bold; color:#0A3760;">'._AM_EXTCAL_INFORMATION.'</legend>';
		echo $perm_desc;
		echo '</fieldset>';
		echo $form->render().'<br />';
		echo '</div></fieldset><br />';


		/**
		 * Auto Approve form
		 */
		$title_of_form = _AM_EXTCAL_AUTOAPPROVE_PERMISSION;
		$perm_name = 'extcal_cat_autoapprove';
		$perm_desc = _AM_EXTCAL_AUTOAPPROVE_PERMISSION_DESC;
		$form = new XoopsGroupPermForm($title_of_form, $module_id, $perm_name, $perm_desc, 'admin/perm.php');
		foreach ($cats as $cat) {
			$form->addItem($cat->getVar('cat_id'), $cat->getVar('cat_name'));
		}

		echo '<fieldset id="'.$perm_name.'Bookmark"><legend><a href="#'.$perm_name.'Bookmark" style="font-weight:bold; color:#990000;" onClick="toggle(\''.$perm_name.'\'); toggleIcon(\''.$perm_name.'Icon\');"><img id="'.$perm_name.'Icon" src="../images/minus.gif" />&nbsp;'.$title_of_form.'</a></legend><div id="'.$perm_name.'">';
		echo '<fieldset><legend style="font-weight:bold; color:#0A3760;">'._AM_EXTCAL_INFORMATION.'</legend>';
		echo $perm_desc;
		echo '</fieldset>';
		echo $form->render().'<br />';
		echo '</div></fieldset><br />';


		/**
		 * Script to auto colapse form at page load
		 */
		echo '<script type="text/javascript">';
		echo 'toggle(\'extcal_cat_view\'); toggleIcon (\'extcal_cat_viewIcon\');';
		echo 'toggle(\'extcal_cat_submit\'); toggleIcon (\'extcal_cat_submitIcon\');';
		echo 'toggle(\'extcal_cat_autoapprove\'); toggleIcon (\'extcal_cat_autoapproveIcon\');';
		echo '</script>';

		xoops_cp_footer();

		break;

}

?>