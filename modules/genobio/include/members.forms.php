<?php

	function edit_members_form()
	{
	
		if (isset($_REQUEST['id']))
		{
			$id = intval($_REQUEST['id']);				
			$membershandler = xoops_getmodulehandler('members','genobio');
			$members = $membershandler->get($id);	
			$category_id = $members->getVar('category_id');
			$uid = $members->getVar('uid');
			$domain = $members->getVar('domain');
			$domains = $members->getVar('domains');
			$display_name = $members->getVar('display_name');
			$display_picture = $members->getVar('display_picture');			
			$member_sex = $members->getVar('member_sex');						
			$title = 'Edit Members Item';
		} else {
			$category_id = 0;
			$uid = 0;
			$domain = urlencode(XOOPS_URL);
			$domains = array(0=>urlencode(XOOPS_URL));
			$display_name = '';
			$display_picture = 'current_photo';
			$title = 'New Members Item';
		}
		
		$form = new XoopsThemeForm($title, "edititem", "", "post");

		$form->addElement(new XoopsFormText(_GB_AM_DISPLAYNAME, "display_name", 35, 128, $display_name));
		$form->addElement(new GenobioFormSelectSex(_GB_AM_SEX, "member_sex", $member_sex, 1, false));		
		$form->addElement(new GenobioFormSelectDisplayPicture(_GB_AM_DISPLAYPICTURE, "display_picture", $display_picture, 1, false));		
		$form->addElement(new GenobioFormSelectCategory(_GB_AM_CATEGORY, "category_id", $category_id, 1, false));
		$form->addElement(new XoopsFormSelectUser(_GB_AM_USERNAME, "uid", true, $uid, 1, false));
		if (class_exists('XoopsFormSelectDomains')) {
			$form->addElement(new XoopsFormSelectDomains(_GB_AM_PERSONALDOMAIN, "domain", $domain, 1, false));
			$form->addElement(new XoopsFormSelectDomains(_GB_AM_ASSOCIATEDDOMAIN, "domains", $domains, 8, true));
		} else {
			$form->addElement(new XoopsFormHidden("domain", $domain));				
			foreach($domains as $key => $value)
				$form->addElement(new XoopsFormHidden("domains[".$key.']', $value));				
		}

		$form->addElement(new XoopsFormHidden("id", $id));
		$form->addElement(new XoopsFormHidden("op", "members"));		
		$form->addElement(new XoopsFormHidden("fct", "save"));		
		$form->addElement(new XoopsFormButton('', 'contents_submit', _SUBMIT, "submit"));

		echo $form->render();

	}
	
	function sel_members_form()
	{
	
		$form = new XoopsThemeForm('Current Members', "current", "", "post");

		$membershandler = xoops_getmodulehandler('members','genobio');
		$criteria = new Criteria('1', 1);
		$members = $membershandler->getObjects($criteria);	
		$element = array();
		foreach($members as $key => $item)
		{
			$element[$key] = new XoopsFormElementTray('Item '.$item->getVar('member_id').':');
			$element[$key]->setDescription('<a href="'.urldecode($item->getVar('domain')).'/modules/genobio/?op=profile&id='.$item->getVar('member_id').'">View Profile</a>');
			$element[$key]->addElement(new XoopsFormLabel('', '<a href="index.php?op=members&fct=edit&id='.$item->getVar('member_id').'">Edit</a>&nbsp;<a href="index.php?op=profiles&id='.$item->getVar('member_id').'">Bio Profile</a>&nbsp;<a href="index.php?op=members&fct=delete&id='.$item->getVar('member_id').'">Delete</a>'));
			$element[$key]->addElement(new XoopsFormLabel('Display Name:', ''.$item->getVar('display_name').''));			
			$element[$key]->addElement(new XoopsFormLabel('Domain:', urldecode($item->getVar('domain'))));
			$form->addElement($element[$key]);
		}
		$form->display();
		
	}
		
?>