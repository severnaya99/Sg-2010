<?php
	include ('../../mainfile.php');

	if( is_file(XOOPS_ROOT_PATH."/modules/genobio/language/".$GLOBALS['xoopsConfig']['language']."/main.php") ){
		include_once XOOPS_ROOT_PATH."/modules/genobio/language/".$GLOBALS['xoopsConfig']['language']."/main.php";
	}else{
		include_once XOOPS_ROOT_PATH."/modules/genobio/language/english/main.php";
	}	
	
	switch ($_REQUEST['op']) {
	case "profile":
	
		if (intval($_REQUEST['id'])==0){
			redirect_header('index.php', 2, _GB_NOID);
			exit(0);
		}
			
	    $xoopsOption['template_main'] = 'genobio_member.html';
		include XOOPS_ROOT_PATH . '/header.php';
								
		$xoTheme->addStylesheet(XOOPS_URL."/modules/genobio/templates/genobio_style.css");

		$memberhandler = xoops_getmodulehandler('members', 'genobio');
		$profileshandler = xoops_getmodulehandler('profiles', 'genobio');
		$sibblingshandler = xoops_getmodulehandler('sibblings', 'genobio');

		$member = $memberhandler->get($_REQUEST['id']);
		$profile = $profileshandler->get($_REQUEST['id']);
	
		$GLOBALS['xoopsTpl']->assign('display_name', $member->getVar('display_name'));
		$GLOBALS['xoopsTpl']->assign('display_image', XOOPS_URL.$profile->getVar($member->getVar('display_picture')));
		
		$photos = array('baby_photo' => 'Baby Photo',
						'midlife_photo' => 'Midlife Photo',
						'elderly_photo' => 'Elderly Photo',
						'current_photo' => 'Current Photo');
		
		foreach($photos as $key => $photo) {
			if ($key != $member->getVar('display_picture'))
				if($profile->getVar($key)!='/modules/genobio/images/no-default-picture.png')
					$GLOBALS['xoopsTpl']->append('images', array(	'url' => XOOPS_URL.$profile->getVar($key),
																	'alt' => $photo));
		}
		
		$module_handler = xoops_gethandler('module');
		$xoopsModule = $module_handler->getByDirname('genobio');
		
		$GLOBALS['xoopsTpl']->assign('xoops_pagetitle', $member->getVar('display_name') . ' : ' . $xoopsModule->name());		
		
		$father = $memberhandler->get($profile->getVar('member_father_id'));
		if (is_object($father)) {
			$GLOBALS['xoopsTpl']->assign('father_url', urldecode($father->getVar('domain')).'/modules/genobio/?op=profile&id='.$father->getVar('member_id'));
			$GLOBALS['xoopsTpl']->assign('father_name', $father->getVar('display_name'));
		}
		
		$mother = $memberhandler->get($profile->getVar('member_mother_id'));
		if (is_object($mother)) {
			$GLOBALS['xoopsTpl']->assign('mother_url', urldecode($mother->getVar('domain')).'/modules/genobio/?op=profile&id='.$mother->getVar('member_id'));
			$GLOBALS['xoopsTpl']->assign('mother_name', $mother->getVar('display_name'));
		}
		
		$partner = $memberhandler->get($profile->getVar('member_partner_id'));
		if (is_object($partner)) {
			$GLOBALS['xoopsTpl']->assign('partner_url', urldecode($partner->getVar('domain')).'/modules/genobio/?op=profile&id='.$partner->getVar('member_id'));
			$GLOBALS['xoopsTpl']->assign('partner_name', $partner->getVar('display_name'));
		}
		
		if ($profile->getVar('member_siblings_id')!=0)
		$sibblings = $sibblingshandler->get($profile->getVar('member_siblings_id'));
		if (is_object($sibblings)) {
			$criteria = new Criteria('member_id', '("'.implode('", "', $sibblings->getVar('members_group')).'")', 'IN');
			$member_sibblings = $memberhandler->getObjects($criteria);
			foreach($member_sibblings as $sibbling) {
				$sex = $sibbling->getVar('member_sex');
				$sibbling_buf['relationship'] = ($sex=='male')?'Brother':'Sister';
				$sibbling_buf['url'] = urldecode($sibbling->getVar('domain')).'/modules/genobio/?op=profile&id='.$sibbling->getVar('member_id');
				$sibbling_buf['name'] = $sibbling->getVar('display_name');
				$GLOBALS['xoopsTpl']->append('sibblings', $sibbling_buf);
			}
		}		
		
		$GLOBALS['xoopsTpl']->assign('nickname', $profile->getVar('nickname'));
		$GLOBALS['xoopsTpl']->assign('dob', $profile->getVar('dob'));
		$GLOBALS['xoopsTpl']->assign('dod', $profile->getVar('dod'));
		$GLOBALS['xoopsTpl']->assign('anniversary', $profile->getVar('anniversary'));
		$GLOBALS['xoopsTpl']->assign('height', $profile->getVar('height'));
		$GLOBALS['xoopsTpl']->assign('weight', $profile->getVar('weight'));
		$GLOBALS['xoopsTpl']->assign('colour_hair', $profile->getVar('colour_hair'));
		$GLOBALS['xoopsTpl']->assign('colour_eyes', $profile->getVar('colour_eyes'));
		$GLOBALS['xoopsTpl']->assign('bio', $profile->getVar('bio'));
		$GLOBALS['xoopsTpl']->assign('history', $profile->getVar('history'));
		$GLOBALS['xoopsTpl']->assign('education', $profile->getVar('education'));
		$GLOBALS['xoopsTpl']->assign('fellowship', $profile->getVar('fellowship'));
		$GLOBALS['xoopsTpl']->assign('earlyhistory', $profile->getVar('earlyhistory'));
		$GLOBALS['xoopsTpl']->assign('medical', $profile->getVar('medical'));
		$GLOBALS['xoopsTpl']->assign('achivements', $profile->getVar('achivements'));
		$GLOBALS['xoopsTpl']->assign('contributations', $profile->getVar('contributations'));
		$GLOBALS['xoopsTpl']->assign('awards', $profile->getVar('awards'));
		$GLOBALS['xoopsTpl']->assign('media', $profile->getVar('media'));
		$GLOBALS['xoopsTpl']->assign('publications', $profile->getVar('publications'));
		$GLOBALS['xoopsTpl']->assign('jobs', $profile->getVar('jobs'));
		$GLOBALS['xoopsTpl']->assign('spirtual', $profile->getVar('spirtual'));
		$GLOBALS['xoopsTpl']->assign('hates', $profile->getVar('hates'));
		$GLOBALS['xoopsTpl']->assign('likes', $profile->getVar('likes'));
		$GLOBALS['xoopsTpl']->assign('music', $profile->getVar('music'));
		$GLOBALS['xoopsTpl']->assign('thearts', $profile->getVar('thearts'));
		$GLOBALS['xoopsTpl']->assign('other', $profile->getVar('other'));
																									
	
		include XOOPS_ROOT_PATH . '/include/comment_view.php';

		include XOOPS_ROOT_PATH . '/footer.php';		
		break;
	default:
	
	    $xoopsOption['template_main'] = 'genobio_index.html';
		include XOOPS_ROOT_PATH . '/header.php';
								
		$xoTheme->addStylesheet(XOOPS_URL."/modules/genobio/templates/genobio_style.css");
		
		$memberhandler = xoops_getmodulehandler('members', 'genobio');
		$profileshandler = xoops_getmodulehandler('profiles', 'genobio');
		
		$criteria = new Criteria('domains', '%"'.urlencode(XOOPS_URL).'"%', "LIKE");
		
		include_once XOOPS_ROOT_PATH.'/class/pagenav.php';
		$limit = isset($_REQUEST['limit'])?intval($_REQUEST['limit']):6;
		$start = isset($_REQUEST['start'])?intval($_REQUEST['start']):0;
		$total = $memberhandler->getCount($criteria);
		$nav = new XoopsPageNav($total, $limit, $start, 'start', 'limit='.$limit);
		$GLOBALS['xoopsTpl']->assign('pagenav', $nav->renderNav());
		$crtieria = new CriteriaCompo($criteria);
		$crtieria->setOrder('display_name');
		$crtieria->setStart($start);
		$crtieria->setLimit($limit);
		$members = $memberhandler->getObjects($crtieria, $start, $limit);
		foreach($members as $member) {
			$profile = $profileshandler->get($member->getVar('member_id'));							
			$GLOBALS['xoopsTpl']->append('people', 
				array(	'display_name' => $member->getVar('display_name'),
				 		'profile_url' => urldecode($member->getVar('domain')).'/modules/genobio/?op=profile&id='.$member->getVar('member_id'),
						'display_image' => XOOPS_URL.$profile->getVar($member->getVar('display_picture'))));
		}

		include XOOPS_ROOT_PATH . '/footer.php';
	}

	    



?>