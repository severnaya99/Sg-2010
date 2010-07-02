<?php

	function edit_sibblings_form()
	{	
		if (isset($_REQUEST['id']))
		{
			$id = intval($_REQUEST['id']);				
			$sibblingshandler = xoops_getmodulehandler('sibblings','genobio');
			$sibbling = $sibblingshandler->get($id);	
			$sibblings_id = $sibbling->getVar('sibblings_id');
			$members_group = $sibbling->getVar('members_group');
			$nickname = $sibbling->getVar('nickname');
			$bio = $sibbling->getVar('bio');
			$history = $sibbling->getVar('history');
			$activities = $sibbling->getVar('activities');
			$toys = $sibbling->getVar('toys');			
			$title = 'Edit Sibblings Item';
		} else {
			$sibblings_id = 0;
			$members_group = array();
			$nickname = '';
			$bio = '';
			$history = '';
			$activities = '';
			$toys = '';			
			$title = 'New Sibblings Item';
		}
		
		$form = new XoopsThemeForm($title, "edititem", "", "post");

		$editor_config['editor'] = 'fckeditor';
		$editor_config['rows'] = 50;
		$editor_config['cols'] = 20;
		
		$form->addElement(new GenobioFormSelectMember(_GB_AM_MEMBERS, "members_group", $members_group, 10, true));
		$form->addElement(new XoopsFormText(_GB_AM_GROUPNICKNAME, "nickname", 35, 255, $nickname));
		$editor_config['value'] = $bio;
		$form->addElement(new XoopsFormEditor(_GB_AM_GROUPBIO, "bio", $editor_config));
		$editor_config['value'] = $history;
		$form->addElement(new XoopsFormEditor(_GB_AM_GROUPHISTORY, "history", $editor_config));
		$editor_config['value'] = $activities;
		$form->addElement(new XoopsFormEditor(_GB_AM_GROUPACTIVITIES, "activities", $editor_config));
		$editor_config['value'] = $toys;
		$form->addElement(new XoopsFormEditor(_GB_AM_GROUPTOYS, "toys", $editor_config));

		$form->addElement(new XoopsFormHidden("id", $id));
		$form->addElement(new XoopsFormHidden("op", "sibblings"));		
		$form->addElement(new XoopsFormHidden("fct", "save"));		
		$form->addElement(new XoopsFormButton('', 'contents_submit', _SUBMIT, "submit"));
		$form->display();
	}
	
	function sel_sibblings_form()
	{
	
		$form = new XoopsThemeForm('Current Sibblings', "current", "", "post");

		$sibblingshandler = xoops_getmodulehandler('sibblings','genobio');
		$sibblings = $sibblingshandler->getObjects($criteria);	
		$element = array();
		foreach($sibblings as $key => $item)
		{
			$element[$key] = new XoopsFormElementTray('Item '.$item->getVar('id').':');
			$element[$key]->addElement(new XoopsFormLabel('', '<a href="index.php?op=sibblings&fct=edit&id='.$item->getVar('sibblings_id').'">'._EDIT.'</a>&nbsp;<a href="index.php?index.php?op=sibblings&fct=delete&id='.$item->getVar('sibblings_id').'">'._DELETE.'</a>'));
			$element[$key]->addElement(new XoopsFormLabel(_GB_AM_NICKNAME, ''.$item->getVar('nickname').''));			
			$form->addElement($element[$key]);
		}
		$form->display();
	}
		
?>