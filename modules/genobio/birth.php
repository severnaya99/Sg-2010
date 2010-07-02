<?php

	include ('../../mainfile.php');
	error_reporting(E_ALL);
	
	switch ($_REQUEST['op']) {
	default:
	
		if (strtotime($_REQUEST['date'])==0){
			redirect_header('index.php', 2, _GB_NODATE);
			exit(0);
		}
		
	    $xoopsOption['template_main'] = 'genobio_birth.html';
		include XOOPS_ROOT_PATH . '/header.php';
								
		$xoTheme->addStylesheet(XOOPS_URL."/modules/genobio/templates/genobio_style.css");
		$profileshandler = xoops_getmodulehandler('profiles', 'genobio');
		$membershandler = xoops_getmodulehandler('members', 'genobio');
		
		$sql = "SELECT member_id FROM ".$GLOBALS['xoopsDB']->prefix('genobio_members_profiles')." WHERE `dob` = DATE('".$_REQUEST['date']."')";
		$question = $GLOBALS['xoopsDB']->query($sql);
		
		if (!$question)	
		foreach($GLOBALS['xoopsDB']->fetchArray($question) as $key => $profmum)
		{
			$mums = $profileshandler->get($profmum->getVar('member_id'));
			if (is_object($mums)) {
				$mothers[$mums->getVar('member_mother_id')]['url'] = urldecode($mums->getVar('domain')).'/modules/genobio/?op=profile&id='.$mums->getVar('member_mother_id');
				$mothers[$mums->getVar('member_mother_id')]['dob'] = date(_SHORTDATESTRING, strtotime($mums->getVar('dob')));
				$mothers[$mums->getVar('member_mother_id')]['children'][$mums->getVar('member_id')]['url'] = urldecode($mums->getVar('domain')).'/modules/genobio/?op=profile&id='.$mums->getVar('member_id');
				$mothers[$mums->getVar('member_mother_id')]['children'][$mums->getVar('member_id')]['dob'] = date(_SHORTDATESTRING, strtotime($mums->getVar('dob')));
				$mum = $membershandler->get($mums->getVar('member_mother_id'));
				$mothers[$mums->getVar('member_mother_id')]['name'] = $mums->getVar('display_name');
				$child = $membershandler->get($mums->getVar('member_id'));
				$mothers[$mums->getVar('member_mother_id')]['children'][$mums->getVar('member_id')]['name'] = $child->getVar('display_name');
			}			
		}
		else {
			redirect_header('index.php', 2, _GB_NOMOTHERSFOUND);
			exit(0);
		}	
			
		if (count($mothers)==0){
			redirect_header('index.php', 2, _GB_NOMOTHERSFOUND);
			exit(0);
		}
		
		$GLOBALS['xoopsTpl']->assign('mothers', $mothers);
		
		include XOOPS_ROOT_PATH . '/header.php';
	}
?>
