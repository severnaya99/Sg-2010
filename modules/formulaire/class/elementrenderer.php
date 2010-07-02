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

class FormulaireElementRenderer{
	var $_ele;

	function FormulaireElementRenderer(&$element){
		$this->_ele =& $element;
	}

	function constructElement($form_ele_id, $admin=false, $qcm){
		global $xoopsUser, $xoopsModuleConfig, $separ, $myts;
		$myts =& MyTextSanitizer::getInstance();
		$id_form = $this->_ele->getVar('id_form');
		$ele_caption = $this->_ele->getVar('ele_caption', 'e');
		$ele_caption = preg_replace('/\{null\}/', '', $ele_caption);
		$ele_caption = stripslashes($ele_caption);
		$ele_value = $this->_ele->getVar('ele_value');
		$e = $this->_ele->getVar('ele_type');

	// required elements have a '*' after the text
	$req = intval( $this->_ele->getVar('ele_req'));
	if ($req) $ele_caption = $ele_caption.' *';

  $ele_caption = $myts->displayTarea($ele_caption);

		switch ($e){
			case 'text':
				$ele_value[2] = eregi_replace ("�", "'", $ele_value[2]);
				$ele_value[2] = stripslashes($ele_value[2]);
        			$ele_value[2] = $myts->displayTarea($ele_value[2]);
				if( !is_object($xoopsUser) ){
					$ele_value[2] = preg_replace('/\{NAME\}/', '', $ele_value[2]);
					$ele_value[2] = preg_replace('/\{name\}/', '', $ele_value[2]);
					$ele_value[2] = preg_replace('/\{UNAME\}/', '', $ele_value[2]);
					$ele_value[2] = preg_replace('/\{uname\}/', '', $ele_value[2]);
					$ele_value[2] = preg_replace('/\{EMAIL\}/', '', $ele_value[2]);
					$ele_value[2] = preg_replace('/\{email\}/', '', $ele_value[2]);
					$ele_value[2] = preg_replace('/\{MAIL\}/', '', $ele_value[2]);
					$ele_value[2] = preg_replace('/\{mail\}/', '', $ele_value[2]);
					$ele_value[2] = preg_replace('/\{DATE\}/', '', $ele_value[2]);
				}elseif( !$admin ){
					$ele_value[2] = preg_replace('/\{NAME\}/', $xoopsUser->getVar('name', 'e'), $ele_value[2]);
					$ele_value[2] = preg_replace('/\{name\}/', $xoopsUser->getVar('name', 'e'), $ele_value[2]);
					$ele_value[2] = preg_replace('/\{UNAME\}/', $xoopsUser->getVar('uname', 'e'), $ele_value[2]);
					$ele_value[2] = preg_replace('/\{uname\}/', $xoopsUser->getVar('uname', 'e'), $ele_value[2]);
					$ele_value[2] = preg_replace('/\{MAIL\}/', $xoopsUser->getVar('email', 'e'), $ele_value[2]);
					$ele_value[2] = preg_replace('/\{mail\}/', $xoopsUser->getVar('email', 'e'), $ele_value[2]);
					$ele_value[2] = preg_replace('/\{EMAIL\}/', $xoopsUser->getVar('email', 'e'), $ele_value[2]);
					$ele_value[2] = preg_replace('/\{email\}/', $xoopsUser->getVar('email', 'e'), $ele_value[2]);
					$ele_value[2] = preg_replace('/\{DATE\}/', date("d-m-Y"), $ele_value[2]);
				}

					$form_ele = new XoopsFormText(
					$ele_caption,
					$form_ele_id,
					$ele_value[0],	//	box width
					$ele_value[1],	//	max width
					stripslashes($ele_value[2])	  //	default value
				);
			break;

			case 'textarea':
					$ele_value[0] = stripslashes($ele_value[0]);
        	$ele_value[0] = $myts->displayTarea($ele_value[0]);

					$form_ele = new XoopsFormTextArea(
					$ele_caption,
					$form_ele_id,
					$ele_value[0],	//	default value
					$ele_value[1],	//	rows
					$ele_value[2]	  //	cols
				);
			break;
			case 'areamodif':
				$ele_value[0] =  stripslashes($ele_value[0]);
        $ele_value[0] = $myts->displayTarea($ele_value[0]);
				$form_ele = new XoopsFormLabel(
					$ele_caption,
					$ele_value[0]
				);
			break;

			case 'select':
				$selected = array();
				$options = array();
				$opt_count = 1;

				while( $i = each($ele_value[2]) ){
					$options[$opt_count] = $myts->stripSlashesGPC($i['key']);
					if( $i['value'] > 0 ){
						$selected[] = $opt_count;
					}
				$opt_count++;
				}
				if ($qcm == '1') {
				$form_ele = new XoopsFormSelect(
					$ele_caption,
					$form_ele_id,
					'',
					$ele_value[0],	//	size
					$ele_value[1]	  //	multiple
				);}
				else {
				$form_ele = new XoopsFormSelect(
					$ele_caption,
					$form_ele_id,
					$selected,
					$ele_value[0],	//	size
					$ele_value[1]	  //	multiple
				);}
				if( $ele_value[1] ){
					$this->_ele->setVar('ele_req', 0);
				}
				$form_ele->addOptionArray($options);
			break;

			case 'checkbox':
				$selected = array();
				$options = array();
				$opt_count = 1;
				while( $i = each($ele_value) ){
					$options[$opt_count] = $myts->stripSlashesGPC($i['key']);
					if( $i['value'] > 0 ){
						$selected[] = $opt_count;
					}
					$opt_count++;
				}
				switch($xoopsModuleConfig['delimeter']){
					case 'br':
						$form_ele = new XoopsFormElementTray($ele_caption, '<br />');
						while( $o = each($options) ){
							if ($qcm == '1') {
							$t =& new XoopsFormCheckBox(
								'',
								$form_ele_id.'[]'
							);}
							else {
							$t =& new XoopsFormCheckBox(
								'',
								$form_ele_id.'[]',
								$selected
							); }
							$t->addOption($o['key'], $o['value']);
							$form_ele->addElement($t);
						}
					break;
					default:
						if ($qcm == '1') {
						$form_ele = new XoopsFormCheckBox(
							$ele_caption,
							$form_ele_id
						); }
						else {
						$form_ele = new XoopsFormCheckBox(
							$ele_caption,
							$form_ele_id,
							$selected
						); }
						$form_ele->addOptionArray($options);
					break;
				}
			break;

			case 'mail':
				$selected = array();
				$options = array();
				$opt_count = 1;
				while( $i = each($ele_value) ){
					$options[$opt_count] = $myts->stripSlashesGPC($i['key']);
					if( $i['value'] > 0 ){
						$selected[] = $opt_count;
					}
					$opt_count++;
				}
						$form_ele = new XoopsFormElementTray($ele_caption, '<br />');
						while( $o = each($options) ){
							$t =& new XoopsFormCheckBox(
								'',
								$form_ele_id.'[]',
								$selected
							);
							$o['value'] = split(" - ",$o['value']);
							$t->addOption($o['key'], $o['value'][0]);
							$form_ele->addElement($t);
				}
			break;

			case 'mailunique':
			case 'radio':
			case 'yn':
				$selected = '';
				$options = array();
				$opt_count = 1;
				while( $i = each($ele_value) ){
					switch ($e){
						case 'radio':
							$options[$opt_count] = $myts->stripSlashesGPC($i['key']);
             	$options[$opt_count] = $myts->displayTarea($options[$opt_count]);
						break;
						case 'mailunique':
 							$options[$opt_count] = $myts->stripSlashesGPC($i['key']);
							$options[$opt_count] = split(" - ",$options[$opt_count]);
             	$options[$opt_count] = $myts->displayTarea($options[$opt_count][0]);
						break;
						case 'yn':
							$options[$opt_count] = constant($i['key']);
							$options[$opt_count] = $myts->stripSlashesGPC($options[$opt_count]);
						break;
					}
					if( $i['value'] > 0 ){
						$selected = $opt_count;
					}
					$opt_count++;
				}
				switch($xoopsModuleConfig['delimeter']){
					case 'br':
						$form_ele = new XoopsFormElementTray($ele_caption, '<br />');
						while( $o = each($options) ){
							if ($qcm == '1') {
							$t =& new XoopsFormRadio(
								'',
								$form_ele_id
							);}
							else {
							$t =& new XoopsFormRadio(
								'',
								$form_ele_id,
								$selected
							);}
							$t->addOption($o['key'], $o['value']);
							$form_ele->addElement($t);
						}
					break;
					default:
						if ($qcm == '1') {
						$form_ele = new XoopsFormRadio(
							$ele_caption,
							$form_ele_id
						);}
						else {
						$form_ele = new XoopsFormRadio(
							$ele_caption,
							$form_ele_id,
							$selected
						);}
						$form_ele->addOptionArray($options);
					break;
				}
			break;
			case 'date':
  				$form_ele = new XoopsFormTextDateSelect (
					$ele_caption,
					$form_ele_id,
					15,
					strtotime($ele_value[0])
				);
			break;
			case 'sep':
				$ele_value[0]=eregi_replace('@font','',$ele_value[0]);
				$ele_value[0] = $myts->xoopsCodeDecode($ele_value[0]);
				$form_ele = new XoopsFormLabel(
					$ele_caption,
					$ele_value[0]
				);
			break;
			case 'upload':

				$form_ele = new XoopsFormElementTray($ele_caption,'');
				$form_ele->addElement(new XoopsFormFile ('',$form_ele_id,$ele_value[1]));
				$pds = $ele_value[1]/1024;
				$form_ele->addElement(new XoopsFormLabel('&nbsp;&nbsp;&nbsp;'.$pds.' ko max.',''));

			break;
			default:
				return false;
			break;
		}
		return $form_ele;
	}

}
?>