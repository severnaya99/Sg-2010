<?php

if ( !defined( 'XOOPS_ROOT_PATH' ) )	return;

include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

class SmartsectionForm_EditCategory extends XoopsThemeForm {
	
	var $targetObject = null;
	
	var $subCatsCount = 4;
	
	var $userGroups = array();
	
	function SmartsectionForm_EditCategory( &$target, $subCatsCount = 4 ) {
		$this->targetObject =& $target;
		$this->subCatsCount = $subCatsCount;

		$member_handler =& xoops_gethandler('member');
		$this->userGroups = $member_handler->getGroupList();
		
		$this->XoopsThemeForm( _AM_SSECTION_CATEGORY, "op", xoops_getenv('PHP_SELF') );
		$this->setExtra('enctype="multipart/form-data"');

		$this->createElements();
		$this->createButtons();
	}
	
	function createElements() {
		global $xoopsDB;
		
		$mytree = new XoopsTree( $xoopsDB -> prefix( "smartsection_categories" ), "categoryid", "parentid" );
		// Parent Category
		ob_start();
		$mytree -> makeMySelBox( "name", "weight", $this->targetObject->parentid(), 1, 'parentid' );
		//makeMySelBox($title,$order="",$preset_id=0, $none=0, $sel_name="", $onchange="")
		$this -> addElement( new XoopsFormLabel( _AM_SSECTION_PARENT_CATEGORY_EXP, ob_get_contents() ) );
		ob_end_clean();

		
		// Name
		$this->addElement( new XoopsFormText(_AM_SSECTION_CATEGORY, 'name', 50, 255, $this->targetObject->name('e')), true);
		
		// Description
		$this->addElement( new XoopsFormTextArea(_AM_SSECTION_COLDESCRIPT, 'description', $this->targetObject->description('e'), 7, 60));
		
		if (SMARTSECTION_LEVEL > 0 ) {
			// Header
			$text_header = smartsection_getEditor(_AM_SSECTION_CATEGORY_HEADER, 'header', $this->targetObject->header('e'));
			$text_header->setDescription(_AM_SSECTION_CATEGORY_HEADER_DSC);
			$this->addElement($text_header);
		}
		
		// IMAGE
		$image_array = XoopsLists :: getImgListAsArray( smartsection_getImageDir('category') );
		$image_select = new XoopsFormSelect( '', 'image', $this->targetObject->image() );
		//$image_select -> addOption ('-1', '---------------');
		$image_select -> addOptionArray( $image_array );
		$image_select -> setExtra( "onchange='showImgSelected(\"image3\", \"image\", \"" . 'uploads/smartsection/images/category/' . "\", \"\", \"" . XOOPS_URL . "\")'" );
		$image_tray = new XoopsFormElementTray( _AM_SSECTION_IMAGE, '&nbsp;' );
		$image_tray -> addElement( $image_select );
		$image_tray -> addElement( new XoopsFormLabel( '', "<br /><br /><img src='" . smartsection_getImageDir('category', false) .$this->targetObject->image() . "' name='image3' id='image3' alt='' />" ) );
		$image_tray->setDescription(_AM_SSECTION_IMAGE_DSC);
		$this -> addElement( $image_tray );	
		// IMAGE UPLOAD
		$max_size = 5000000;
		$file_box = new XoopsFormFile(_AM_SSECTION_IMAGE_UPLOAD, "image_file", $max_size);
		$file_box->setExtra( "size ='45'") ;
		$file_box->setDescription(_AM_SSECTION_IMAGE_UPLOAD_DSC);
		$this->addElement($file_box);

		if (SMARTSECTION_LEVEL > 0 ) {
			// Short url
			$text_short_url = new XoopsFormText(_AM_SSECTION_CATEGORY_SHORT_URL, 'short_url', 50, 255, $this->targetObject->short_url('e'));
			$text_short_url->setDescription(_AM_SSECTION_CATEGORY_SHORT_URL_DSC);
			$this->addElement($text_short_url);
			
			// Meta Keywords
			$text_meta_keywords = new XoopsFormTextArea(_AM_SSECTION_CATEGORY_META_KEYWORDS, 'meta_keywords', $this->targetObject->meta_keywords('e'), 7, 60);
			$text_meta_keywords->setDescription(_AM_SSECTION_CATEGORY_META_KEYWORDS_DSC);
			$this->addElement($text_meta_keywords);	
			
			// Meta Description
			$text_meta_description = new XoopsFormTextArea(_AM_SSECTION_CATEGORY_META_DESCRIPTION, 'meta_description', $this->targetObject->meta_description('e'), 7, 60);
			$text_meta_description->setDescription(_AM_SSECTION_CATEGORY_META_DESCRIPTION_DSC);
			$this->addElement($text_meta_description);				
		}
			
		// Weight
		$this->addElement(new XoopsFormText(_AM_SSECTION_COLPOSIT, 'weight', 4, 4, $this->targetObject->weight()));

		if (SMARTSECTION_LEVEL > 0 ) {
			// Added by skalpa: custom template support
			$this->addElement( new XoopsFormText( "Custom template", 'template', 50, 255, $this->targetObject->template('e')), false);	
		}

		// READ PERMISSIONS	
		$groups_read_checkbox = new XoopsFormCheckBox(_AM_SSECTION_PERMISSIONS_CAT_READ, 'groups_read[]', $this->targetObject->getGroups_read());
		foreach ( $this->userGroups as $group_id=>$group_name ) {
			if ($group_id != XOOPS_GROUP_ADMIN) {
				$groups_read_checkbox->addOption($group_id, $group_name);
			}
		}
		$this->addElement($groups_read_checkbox);
		// Apply permissions on all items
		$apply = isset($_POST['applyall']) ? intval($_POST['applyall']) : 0 ;
		
		$addapplyall_radio = new XoopsFormRadioYN(_AM_SSECTION_PERMISSIONS_APPLY_ON_ITEMS, 'applyall', $apply, ' ' . _AM_SSECTION_YES . '', ' ' . _AM_SSECTION_NO . '');
		$this->addElement($addapplyall_radio);


		// SUBMIT PERMISSIONS
		$groups_submit_checkbox = new XoopsFormCheckBox(_AM_SSECTION_PERMISSIONS_CAT_SUBMIT, 'groups_submit[]', $this->targetObject->getGroups_submit());
		$groups_submit_checkbox->setDescription(_AM_SSECTION_PERMISSIONS_CAT_SUBMIT_DSC);
		foreach ( $this->userGroups as $group_id => $group_name) {
			if ($group_id != XOOPS_GROUP_ADMIN) {
				$groups_submit_checkbox->addOption($group_id, $group_name);
			}
		}
		$this->addElement($groups_submit_checkbox);
					
		if (SMARTSECTION_LEVEL > 0 ) {
			// Added by fx2024
			// sub Categories	
			$cat_tray = new XoopsFormElementTray(_AM_SSECTION_SCATEGORYNAME, '<br /><br />');
			for( $i = 0; $i < $this->subCatsCount; $i++ ) {
				if ($i<(isset($_POST['scname']) ? sizeof($_POST['scname']) : 0 )){
					 $subname = isset($_POST['scname']) ? $_POST['scname'][$i] : '' ;
				}
				else{
					$subname = '';
				}
				$cat_tray->addElement(new XoopsFormText('' , 'scname['.$i.']', 50, 255,$subname), true);
			
			}		
			$t = new XoopsFormText('', 'nb_subcats', 3, 2);
			$l = new XoopsFormLabel('', sprintf(_AM_SSECTION_ADD_OPT, $t->render()));
			$b = new XoopsFormButton('', 'submit', _AM_SSECTION_ADD_OPT_SUBMIT, 'submit');
			if ( !$this->targetObject->categoryid() ) {
				$b->setExtra('onclick="this.form.elements.op.value=\'addsubcats\'"');
			} else {
				$b->setExtra('onclick="this.form.elements.op.value=\'mod\'"');
			}
			$r = new XoopsFormElementTray('');
			$r->addElement($l);
			$r->addElement($b);
			$cat_tray->addElement($r);
			$this->addElement($cat_tray);
			//End of fx2024 code
		}
		/*
		$module_id = $xoopsModule->getVar('mid');	
		$gperm_handler = &xoops_gethandler('groupperm');
		$mod_perms = $gperm_handler->getGroupIds('category_moderation', $categoryid, $module_id);
		
		$moderators_select = new XoopsFormSelect('', 'moderators', $moderators, 5, true);
		$moderators_tray->addElement($moderators_select);
		
		$butt_mngmods = new XoopsFormButton('', '', 'Manage mods', 'button');
		$butt_mngmods->setExtra('onclick="javascript:small_window(\'pop.php\', 370, 350);"');
		$moderators_tray->addElement($butt_mngmods);
		
		$butt_delmod = new XoopsFormButton('', '', 'Delete mod', 'button');
		$butt_delmod->setExtra('onclick="javascript:deleteSelectedItemsFromList(this.form.elements[\'moderators[]\']);"');
		$moderators_tray->addElement($butt_delmod);
		
		$this->addElement($moderators_tray);
		*/
		$this->addElement( new XoopsFormHidden( 'categoryid', $this->targetObject->categoryid() ) );
		//$parentid = $this->targetObject->parentid('s');
		//$this -> addElement( new XoopsFormHidden( 'parentid', $parentid ) );
		$this->addElement( new XoopsFormHidden( 'nb_sub_yet', $this->subCatsCount ) );
	}	
	
	function createButtons() {
		// Action buttons tray
		$button_tray = new XoopsFormElementTray('', '');	
		/*for ($i = 0; $i < sizeof($moderators); $i++) {
		$allmods[] = $moderators[$i];
		}	
		$hiddenmods = new XoopsFormHidden('allmods', $allmods);
		$button_tray->addElement($hiddenmods);
		*/
		$hidden = new XoopsFormHidden('op', 'addcategory');
		$button_tray->addElement($hidden);
		
		// No ID for category -- then it's new category, button says 'Create'
		if ( !$this->targetObject->categoryid() ) {
			$butt_create = new XoopsFormButton('', '', _AM_SSECTION_CREATE, 'submit');
			$butt_create->setExtra('onclick="this.form.elements.op.value=\'addcategory\'"');
			$button_tray->addElement($butt_create);
			
			$butt_clear = new XoopsFormButton('', '', _AM_SSECTION_CLEAR, 'reset');
			$button_tray->addElement($butt_clear);
			
			$butt_cancel = new XoopsFormButton('', '', _AM_SSECTION_CANCEL, 'button');
			$butt_cancel->setExtra('onclick="history.go(-1)"');
			$button_tray->addElement($butt_cancel);
			
			$this->addElement($button_tray);
		} else {
			// button says 'Update'
			$butt_create = new XoopsFormButton('', '', _AM_SSECTION_MODIFY, 'submit');
			$butt_create->setExtra('onclick="this.form.elements.op.value=\'addcategory\'"');
			$button_tray->addElement($butt_create);
			
			$butt_cancel = new XoopsFormButton('', '', _AM_SSECTION_CANCEL, 'button');
			$butt_cancel->setExtra('onclick="history.go(-1)"');
			$button_tray->addElement($butt_cancel);
	
			$this->addElement($button_tray);
		}
	}
	
	
	
}



?>