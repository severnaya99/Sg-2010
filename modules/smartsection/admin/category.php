<?php

/**
* $Id: category.php 1429 2008-04-05 02:00:06Z malanciault $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

include_once("admin_header.php");

global $smartsection_category_handler;

$op = '';

if (isset($_GET['op'])) $op = $_GET['op'];
if (isset($_POST['op'])) $op = $_POST['op'];

// Where do we start ?
$startcategory = isset($_GET['startcategory']) ? intval($_GET['startcategory']) : 0;

function displayCategory($categoryObj, $level = 0)
{
	global $xoopsModule, $smartsection_category_handler;
	$description = $categoryObj->description();
	if (!XOOPS_USE_MULTIBYTES) {
		if (strlen($description) >= 100) {
			$description = substr($description, 0, (100 -1)) . "...";
		}
	}
	$modify = "<a href='category.php?op=mod&categoryid=" . $categoryObj->categoryid() ."&parentid=".$categoryObj->parentid(). "'><img src='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/images/icon/edit.gif' title='" . _AM_SSECTION_EDITCOL . "' alt='" . _AM_SSECTION_EDITCOL . "' /></a>";
	$delete = "<a href='category.php?op=del&categoryid=" . $categoryObj->categoryid() . "'><img src='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/images/icon/delete.gif' title='" . _AM_SSECTION_DELETECOL . "' alt='" . _AM_SSECTION_DELETECOL . "' /></a>";

	$spaces = '';
	for ( $j = 0; $j < $level; $j++ ) {
		$spaces .= '&nbsp;&nbsp;&nbsp;';
	}

	echo "<tr>";
	echo "<td class='even' align='lefet'>" . $spaces . "<a href='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/category.php?categoryid=" . $categoryObj->categoryid() . "'><img src='" . XOOPS_URL . "/modules/smartsection/images/icon/subcat.gif' alt='' />&nbsp;" . $categoryObj->name() . "</a></td>";
	echo "<td class='even' align='center'>" . $categoryObj->weight() . "</td>";
	echo "<td class='even' align='center'> $modify $delete </td>";
	echo "</tr>";
	$subCategoriesObj = $smartsection_category_handler->getCategories(0, 0, $categoryObj->categoryid());
	if (count($subCategoriesObj) > 0) {
		$level++;
		foreach ( $subCategoriesObj as $key => $thiscat ) {
			displayCategory($thiscat, $level);
		}
	}
	unset($categoryObj);
}

function editcat($showmenu = false, $categoryid = 0, $nb_subcats=4, $categoryObj=null)
{
	global $xoopsDB, $smartsection_category_handler, $xoopsUser, $myts, $xoopsConfig, $xoopsModuleConfig, $xoopsModule;

	include_once XOOPS_ROOT_PATH . '/modules/smartsection/class/form-editcategory.php';

	// if there is a parameter, and the id exists, retrieve data: we're editing a category
	if ($categoryid != 0) {
		// Creating the category object for the selected category
		$categoryObj = $smartsection_category_handler->get($categoryid);
		if ($categoryObj->notLoaded()) {
			redirect_header("category.php", 1, _AM_SSECTION_NOCOLTOEDIT);
			exit();
		}
	} else {
		if (!$categoryObj) {
			$categoryObj = $smartsection_category_handler->create();
		}
	}

	if ( $categoryid != 0 ) {
		if ($showmenu) {
			smartsection_adminMenu(1, _AM_SSECTION_CATEGORIES . " > " . _AM_SSECTION_EDITING);
		}
		echo "<br />\n";
		smartsection_collapsableBar('edittable', 'edittableicon', _AM_SSECTION_EDITCOL, _AM_SSECTION_CATEGORY_EDIT_INFO);
	} else {
		if ($showmenu) {
			smartsection_adminMenu(1, _AM_SSECTION_CATEGORIES . " > " . _AM_SSECTION_CREATINGNEW);
		}
		//echo "<br />\n";
		smartsection_collapsableBar('createtable', 'createtableicon', _AM_SSECTION_CATEGORY_CREATE, _AM_SSECTION_CATEGORY_CREATE_INFO);
	}

	$sform =& new SmartsectionForm_EditCategory( $categoryObj, $nb_subcats );

	if ( !$categoryid ) {
		$sform->display();
		smartsection_close_collapsable('createtable', 'createtableicon');
	} else {
		$sform->display();
		smartsection_close_collapsable('edittable', 'edittableicon');
	}

	//Added by fx2024
	if ($categoryid) {
		include_once XOOPS_ROOT_PATH . "/modules/smartsection/include/displaysubcats.php";
		include_once XOOPS_ROOT_PATH . "/modules/smartsection/include/displayitems.php";
	}
	//end of fx2024 code
}

switch ($op) {

	case "del":

	include("category-delete.php");
	break;

	case "mod":

	$categoryid = isset($_GET['categoryid']) ? intval($_GET['categoryid']) : 0 ;
	//Added by fx2024

	$nb_subcats = isset($_POST['nb_subcats']) ? intval($_POST['nb_subcats']) : 0;
	$nb_subcats = $nb_subcats + (isset($_POST['nb_sub_yet']) ? intval($_POST['nb_sub_yet']) : 4);
		if($categoryid ==0){
		$categoryid = isset($_POST['categoryid']) ? intval($_POST['categoryid']) : 0 ;
	}
	//end of fx2024 code

	smartsection_xoops_cp_header();

	editcat(true, $categoryid,$nb_subcats);
	break;

	case "addcategory":
	global $_POST, $xoopsUser, $xoopsUser, $xoopsConfig, $xoopsDB, $xoopsModule, $xoopsModuleConfig, $modify, $myts, $categoryid;

	$categoryid = (isset($_POST['categoryid'])) ? intval($_POST['categoryid']) : 0;
	$parentid = (isset($_POST['parentid'])) ? intval($_POST['parentid']) : 0;

	if ($categoryid != 0) {
		$categoryObj = $smartsection_category_handler->get($categoryid);
	} else {
		$categoryObj = $smartsection_category_handler->create();
	}

	// Uploading the image, if any
	// Retreive the filename to be uploaded
	if (isset ($_FILES['image_file']['name']) && $_FILES['image_file']['name'] != "" ) {
		$filename = $_POST["xoops_upload_file"][0] ;
		if( !empty( $filename ) || $filename != "" ) {
			global $xoopsModuleConfig;

			// TODO : implement smartsection mimetype management
			$max_size = $xoopsModuleConfig['maximum_filesize'];
			$max_imgwidth = $xoopsModuleConfig['maximum_image_width'];
			$max_imgheight = $xoopsModuleConfig['maximum_image_height'];
			$allowed_mimetypes = smartsection_getAllowedImagesTypes();

			include_once(XOOPS_ROOT_PATH."/class/uploader.php");

			if( $_FILES[$filename]['tmp_name'] == "" || ! is_readable( $_FILES[$filename]['tmp_name'] ) ) {
				redirect_header( 'javascript:history.go(-1)' , 2, _AM_SSECTION_FILEUPLOAD_ERROR ) ;
				exit ;
			}

			$uploader = new XoopsMediaUploader(smartsection_getImageDir('category'), $allowed_mimetypes, $max_size, $max_imgwidth, $max_imgheight);

			if( $uploader->fetchMedia( $filename ) && $uploader->upload() ) {

				$categoryObj->setVar('image', $uploader->getSavedFileName());

			} else {
				redirect_header( 'javascript:history.go(-1)' , 2, _AM_SSECTION_FILEUPLOAD_ERROR . $uploader->getErrors() ) ;
				exit ;
			}
		}
	} else {
		if (isset($_POST['image'])){
			$categoryObj->setVar('image', $_POST['image']);
		}
	}
	$categoryObj->setVar('parentid', (isset($_POST['parentid'])) ? intval($_POST['parentid']) : 0);

	$applyall = (isset($_POST['applyall'])) ? intval($_POST['applyall']) : 0;
	$categoryObj->setVar('weight', (isset($_POST['weight'])) ? intval($_POST['weight']) : 1);

	// Groups and permissions
	if(isset($_POST['groups_read'])){
		$categoryObj->setGroups_read($_POST['groups_read']);
	}
	else{
		$categoryObj->setGroups_read();
	}
	$grpread = (isset($_POST['groups_read']) ? $_POST['groups_read'] : array());

	if(isset($_POST['groups_submit'])){
		$categoryObj->setGroups_submit($_POST['groups_submit']);
	}
	else{
		$categoryObj->setGroups_submit();
	}
	$grpsubmit = (isset($_POST['groups_submit']) ? $_POST['groups_submit'] : array());

	$categoryObj->setVar('name', $_POST['name']);

	//Added by skalpa: custom template support
	if (isset($_POST['template'])) {
		$categoryObj->setVar('template', $_POST['template'] );
	}

	if (isset($_POST['meta_description'])) {
		$categoryObj->setVar('meta_description', $_POST['meta_description'] );
	}
	if (isset($_POST['meta_keywords'])) {
		$categoryObj->setVar('meta_keywords', $_POST['meta_keywords'] );
	}
	if (isset($_POST['short_url'])) {
		$categoryObj->setVar('short_url', $_POST['short_url'] );
	}

	$categoryObj->setVar('description', $_POST['description']);

	if (isset($_POST['header'])) {
		$categoryObj->setVar('header', $_POST['header'] );
	}

	if ($categoryObj->isNew()) {
		$redirect_msg = _AM_SSECTION_CATCREATED;
		$redirect_to = 'category.php?op=mod';
	} else {
		$redirect_msg = _AM_SSECTION_COLMODIFIED;
		$redirect_to = 'category.php';
	}

	if ( !$categoryObj->store() ) {
		redirect_header("javascript:history.go(-1)", 3, _AM_SSECTION_CATEGORY_SAVE_ERROR . smartsection_formatErrors($categoryObj->getErrors()));
		exit;
	}
	// TODO : put this function in the category class
	smartsection_saveCategory_Permissions($categoryObj->getGroups_read(), $categoryObj->categoryid(), 'category_read');
	smartsection_saveCategory_Permissions($categoryObj->getGroups_submit(), $categoryObj->categoryid(), 'item_submit');
	//smartsection_saveCategory_Permissions($groups_admin, $categoriesObj->categoryid(), 'category_admin');


	if ($applyall) {
		// TODO : put this function in the category class
		smartsection_overrideItemsPermissions($categoryObj->getGroups_read(), $categoryObj->categoryid());
	}
//Added by fx2024
	$parentCat = $categoryObj->categoryid();

	for($i=0;$i<sizeof($_POST['scname']);$i++) {

		if($_POST['scname'][$i]!=''){
		$categoryObj = $smartsection_category_handler->create();
		$categoryObj->setVar('name', $_POST['scname'][$i]);
		$categoryObj->setVar('parentid', $parentCat);
		$categoryObj->setGroups_read($grpread);
		$categoryObj->setGroups_submit($grpsubmit);

			if ( !$categoryObj->store() ) {
				redirect_header("javascript:history.go(-1)", 3, _AM_SSECTION_SUBCATEGORY_SAVE_ERROR . smartsection_formatErrors($categoryObj->getErrors()));
				exit;
			}
			// TODO : put this function in the category class
			smartsection_saveCategory_Permissions($categoryObj->getGroups_read(), $categoryObj->categoryid(), 'category_read');
			smartsection_saveCategory_Permissions($categoryObj->getGroups_submit(), $categoryObj->categoryid(), 'item_submit');
			//smartsection_saveCategory_Permissions($groups_admin, $categoriesObj->categoryid(), 'category_admin');


			if ($applyall) {
				// TODO : put this function in the category class
				smartsection_overrideItemsPermissions($categoryObj->getGroups_read(), $categoryObj->categoryid());
			}

		}
	}

//end of fx2024 code
	redirect_header($redirect_to, 2, $redirect_msg);

	exit();
	break;

//Added by fx2024

	 case "addsubcats":

     $categoryid = 0;
     $nb_subcats = intval($_POST['nb_subcats'])+ $_POST['nb_sub_yet'];

     smartsection_xoops_cp_header();

	 $categoryObj =& $smartsection_category_handler->create();
	 $categoryObj->setVar('name', $_POST['name']);
	 $categoryObj->setVar('description', $_POST['description']);
	 $categoryObj->setVar('weight', $_POST['weight']);
	 $categoryObj->setGroups_read(isset($_POST['groups_read']) ? $_POST['groups_read'] : array());
	 if (isset($parentCat)){
	 	$categoryObj->setVar('parentid', $parentCat);
	 }


	 editcat(true, $categoryid, $nb_subcats, $categoryObj);
	 exit();

     break;
//end of fx2024 code

	case "cancel":
	redirect_header("category.php", 1, sprintf(_AM_SSECTION_BACK2IDX, ''));
	exit();

	case "default":
	default:

	smartsection_xoops_cp_header();

	smartsection_adminMenu(1, _AM_SSECTION_CATEGORIES);

	echo "<br />\n";
	echo "<form><div style=\"margin-bottom: 12px;\">";
	echo "<input type='button' name='button' onclick=\"location='category.php?op=mod'\" value='" . _AM_SSECTION_CATEGORY_CREATE . "'>&nbsp;&nbsp;";
	//echo "<input type='button' name='button' onclick=\"location='item.php?op=mod'\" value='" . _AM_SSECTION_CREATEITEM . "'>&nbsp;&nbsp;";
	echo "</div></form>";

	// Creating the objects for top categories
	$categoriesObj = $smartsection_category_handler->getCategories($xoopsModuleConfig['perpage'], $startcategory, 0);

	smartsection_collapsableBar('createdcategories', 'createdcategoriesicon', _AM_SSECTION_CATEGORIES_TITLE, _AM_SSECTION_CATEGORIES_DSC);

	echo "<table width='100%' cellspacing=1 cellpadding=3 border=0 class = outer>";
	echo "<tr>";
	echo "<td class='bg3' align='left'><b>" . _AM_SSECTION_ITEMCATEGORYNAME . "</b></td>";
	echo "<td width='60' class='bg3' width='65' align='center'><b>" . _AM_SSECTION_WEIGHT . "</b></td>";
	echo "<td width='60' class='bg3' align='center'><b>" . _AM_SSECTION_ACTION . "</b></td>";
	echo "</tr>";
	$totalCategories = $smartsection_category_handler->getCategoriesCount(0);
	if (count($categoriesObj) > 0) {
		foreach ( $categoriesObj as $key => $thiscat) {
			displayCategory($thiscat);
		}
	} else {
		echo "<tr>";
		echo "<td class='head' align='center' colspan= '7'>" . _AM_SSECTION_NOCAT . "</td>";
		echo "</tr>";
		$categoryid = '0';
	}
	echo "</table>\n";
	include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
	$pagenav = new XoopsPageNav($totalCategories, $xoopsModuleConfig['perpage'], $startcategory, 'startcategory');
	echo '<div style="text-align:right;">' . $pagenav->renderNav() . '</div>';
	echo "<br />";
	smartsection_close_collapsable('createdcategories', 'createdcategoriesicon');
	echo "<br>";
	//editcat(false);
	break;
}

smart_xoops_cp_footer();
?>