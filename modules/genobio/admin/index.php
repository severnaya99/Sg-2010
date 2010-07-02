<?php
	
	include('../../../mainfile.php');
	include('../../../include/cp_functions.php');
	include('../include/functions.php');	
	include('../include/forms.php');
	
	if( is_file(XOOPS_ROOT_PATH."/modules/genobio/language/".$GLOBALS['xoopsConfig']['language']."/admin.php") ){
		include_once XOOPS_ROOT_PATH."/modules/genobio/language/".$GLOBALS['xoopsConfig']['language']."/admin.php";
	}else{
		include_once XOOPS_ROOT_PATH."/modules/genobio/language/english/admin.php";
	}
		
	xoops_cp_header();
	
	switch($_REQUEST['op']) {
	case "members":	
	
		switch ($_REQUEST['fct'])
		{
			case "edit":
				adminMenu(3);
				edit_members_form();
				break;
			case "new":
				adminMenu(6);
				edit_members_form();
				break;
			case "delete":
				$id = intval($_REQUEST['id']);				
				$membershandler = xoops_getmodulehandler('members','genobio');
				$member = $membershandler->get($id);	
				if ($membershandler->delete($member))			
					redirect_header('index.php', 3, 'Member Item Delete Successfully');
				else
					redirect_header('index.php', 3, 'Member Item Delete Unsuccessfully');
				break;
				exit;
			case "save":
	
				$id = intval($_REQUEST['id']);				
				$membershandler = xoops_getmodulehandler('members','genobio');
				if ($id>0)
					$member = $membershandler->get($id);	
				else
					$member = $membershandler->create();	
	
				$member->setVar('category_id', intval($_REQUEST['category_id']));
				$member->setVar('uid', intval($_REQUEST['uid']));			
				$member->setVar('domain', $_REQUEST['domain']);
				$member->setVar('domains', $_REQUEST['domains']);			
				$member->setVar('display_name', $_REQUEST['display_name']);
				$member->setVar('display_picture', $_REQUEST['display_picture']);
				$member->setVar('member_sex', $_REQUEST['member_sex']);			

				if ($membershandler->insert($member))	{
					if ($id == 0) {
						$profilesshandler = xoops_getmodulehandler('profiles','genobio');
						$profile = $profilesshandler->create();
						$profile->setVar('member_id', $member->getVar('member_id'));
						$profile->setVar('nickname', $_REQUEST['display_name']);
						@$profilesshandler->insert($profile);
						redirect_header('index.php', 3, 'New Member Item Created Successfully');						
						exit(0);
					}	
						
					redirect_header('index.php', 3, 'Member Item Updated Successfully');
				} else {
					redirect_header('index.php', 3, 'Member Item Updated Unsuccessfully');
				}
				exit;
				break;
			default:
				adminMenu(3);
				sel_members_form();
				
		}
		break;
	case "sibblings":	
	
		switch ($_REQUEST['fct'])
		{
			case "edit":
				adminMenu(2);
				edit_sibblings_form();
				break;
			case "new":
				adminMenu(5);
				edit_sibblings_form();
				break;
			case "delete":
				$id = intval($_REQUEST['id']);				
				$sibblingshandler = xoops_getmodulehandler('sibblings','genobio');
				$sibblings = $sibblingshandler->get($id);	
				if ($sibblingshandler->delete($sibblings))			
					redirect_header('index.php', 3, 'Sibblings Item Delete Successfully');
				else
					redirect_header('index.php', 3, 'Sibblings Item Delete Unsuccessfully');
				break;
				exit;
			case "save":
	
				$id = intval($_REQUEST['id']);				
				$sibblingshandler = xoops_getmodulehandler('sibblings','genobio');
				if ($id>0)
					$sibblings = $sibblingshandler->get($id);	
				else
					$sibblings = $sibblingshandler->create();	
	
				$sibblings->setVar('members_group', $_REQUEST['members_group']);
				$sibblings->setVar('nickname', $_REQUEST['nickname']);			
				$sibblings->setVar('bio', $_REQUEST['bio']);			
				$sibblings->setVar('history', $_REQUEST['history']);			
				$sibblings->setVar('activities', $_REQUEST['activities']);															
				$sibblings->setVar('toys', $_REQUEST['toys']);
				
				if ($sibblingshandler->insert($sibblings))	{
					$profileshandler = xoops_getmodulehandler('profiles','genobio');
					foreach($_REQUEST['members_group'] as $key => $id) {
						$profile = $profileshandler->get($id);
						$profile->setVar('member_siblings_id', $sibblings->getVar('sibblings_id'));
						@$profileshandler->insert($profile);
					}
					redirect_header('index.php', 3, 'Sibblings Item Updated Successfully');
				} else
					redirect_header('index.php', 3, 'Sibblings Item Updated Unsuccessfully');
					
				exit;
				break;
			default:
				adminMenu(2);
				sel_sibblings_form();
				
		}
		break;
	case "categories":	
	
		switch ($_REQUEST['fct'])
		{
			case "edit":
				adminMenu(4);
				edit_categories_form();
				break;
			case "new":
				adminMenu(7);
				edit_categories_form();
				break;
			case "delete":
				$id = intval($_REQUEST['id']);				
				$categorieshandler = xoops_getmodulehandler('categories','genobio');
				$categories = $categorieshandler->get($id);	
				if ($categorieshandler->delete($categories))			
					redirect_header('index.php', 3, 'Category Item Delete Successfully');
				else
					redirect_header('index.php', 3, 'Category Item Delete Unsuccessfully');
				break;
				exit;
			case "save":
	
				$id = intval($_REQUEST['id']);				
				$categorieshandler = xoops_getmodulehandler('categories','genobio');
				if ($id>0)
					$categories = $categorieshandler->get($id);	
				else
					$categories = $categorieshandler->create();	
	
				$categories->setVar('category_name', $_REQUEST['category_name']);

				if ($categorieshandler->insert($categories))			
					redirect_header('index.php', 3, 'Category Item Updated Successfully');
				else
					redirect_header('index.php', 3, 'Category Item Updated Unsuccessfully');
					
				exit;
				break;
			default:
				adminMenu(4);
				sel_categories_form();
				
		}
		break;
	case "profiles":	
	
		switch ($_REQUEST['fct'])
		{
			default:
				adminMenu(2);
				edit_profiles_form();
				break;

			case "save":			
							
				$id = intval($_REQUEST['id']);				
				$profileshandler = xoops_getmodulehandler('profiles','genobio');
				if ($id>0)
					$profile = $profileshandler->get($id);	
				else
					redirect_header('index.php', 2, _GB_NOID);	
	
				$profile->setVar('member_father_id', $_REQUEST['member_father_id']);
				$profile->setVar('member_mother_id', $_REQUEST['member_mother_id']);
				$profile->setVar('member_siblings_id', $_REQUEST['member_siblings_id']);
				$profile->setVar('member_partner_id', $_REQUEST['member_partner_id']);
				$profile->setVar('nickname', $_REQUEST['nickname']);
				$profile->setVar('dob', $_REQUEST['dob']);
				$profile->setVar('dod', $_REQUEST['dod']);
				$profile->setVar('anniversary', $_REQUEST['anniversary']);
				$profile->setVar('dob_unix', strtotime($_REQUEST['dob']));
				$profile->setVar('dod_unix', strtotime($_REQUEST['dod']));
				$profile->setVar('anniversary_unix', strtotime($_REQUEST['anniversary']));				
				$profile->setVar('height', $_REQUEST['height']);
				$profile->setVar('weight', $_REQUEST['weight']);
				$profile->setVar('colour_hair', $_REQUEST['colour_hair']);
				$profile->setVar('colour_eyes', $_REQUEST['colour_eyes']);				
				$profile->setVar('bio', $_REQUEST['bio']);
				$profile->setVar('history', $_REQUEST['history']);
				$profile->setVar('education', $_REQUEST['education']);
				$profile->setVar('fellowship', $_REQUEST['fellowship']);
				$profile->setVar('earlyhistory', $_REQUEST['earlyhistory']);
				$profile->setVar('medical', $_REQUEST['medical']);
				$profile->setVar('achivements', $_REQUEST['achivements']);
				$profile->setVar('contributations', $_REQUEST['contributations']);
				$profile->setVar('awards', $_REQUEST['awards']);
				$profile->setVar('media', $_REQUEST['media']);
				$profile->setVar('publications', $_REQUEST['publications']);
				$profile->setVar('jobs', $_REQUEST['jobs']);
				$profile->setVar('spirtual', $_REQUEST['spirtual']);
				$profile->setVar('hates', $_REQUEST['hates']);
				$profile->setVar('likes', $_REQUEST['likes']);
				$profile->setVar('music', $_REQUEST['music']);
				$profile->setVar('thearts', $_REQUEST['thearts']);
				$profile->setVar('other', $_REQUEST['other']);
				@$profile->setDirty();
				
				if ($profileshandler->insert($profile, true))	{	
					
					if (count($profile->getErrors())>0) {
						redirect_header('index.php?op=profiles&id='.$profile->getVar('member_id'), 3, 'The following form items are required.<br /><br />'.implode("<br />",$profile->getErrors()));
						exit(0);
					}				
					
					@$profile->setDirty();
					$allowedMimeTypes = array('image/jpeg','image/gif','image/png','image/pjpeg','image/x-png',);										
					$fupload = genobio_uploading('uploads/genobio', $allowedMimeTypes, "index.php?op=profiles&id=".$_REQUEST['id'], 0);
					$baby_photo = $fupload['path'];
					$fupload = genobio_uploading('uploads/genobio', $allowedMimeTypes, "index.php?op=profiles&id=".$_REQUEST['id'], 1);
					$midlife_photo = $fupload['path'];
					$fupload = genobio_uploading('uploads/genobio', $allowedMimeTypes, "index.php?op=profiles&id=".$_REQUEST['id'], 2);
					$elderly_photo = $fupload['path'];
					$fupload = genobio_uploading('uploads/genobio', $allowedMimeTypes, "index.php?op=profiles&id=".$_REQUEST['id'], 3);
					$current_photo = $fupload['path'];
					
					if (file_exists(XOOPS_ROOT_PATH.$baby_photo))
						$profile->setVar('baby_photo', $baby_photo);
					if (file_exists(XOOPS_ROOT_PATH.$midlife_photo))					
						$profile->setVar('midlife_photo', $midlife_photo);
					if (file_exists(XOOPS_ROOT_PATH.$elderly_photo))
						$profile->setVar('elderly_photo', $elderly_photo);
					if (file_exists(XOOPS_ROOT_PATH.$current_photo))				
						$profile->setVar('current_photo', $current_photo);

					if ($profileshandler->insert($profile, true))
						redirect_header('index.php?op=profiles&id='.$profile->getVar('member_id'), 3, 'Profile Item Updated Successfully');
					else
						redirect_header('index.php?op=profiles&id='.$profile->getVar('member_id'), 3, 'Profile Item Updated Unsuccessfully');
				} else
					redirect_header('index.php', 3, 'Profile Item Updated Unsuccessfully');
					
				exit;
				break;
				
		}
		break;
	default:

		adminMenu(0);
		sel_categories_form();
		sel_sibblings_form();
		sel_members_form();
		
	}
	
	footer_adminMenu();
	xoops_cp_footer();
?>