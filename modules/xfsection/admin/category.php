<?php
// $Id: category.php,v 1.5 2006/03/25 05:32:08 ohwada Exp $

// 2006-03-25 K.OHWADA
// BUG 8207: cannot edit category

// 2006-03-17 K.OHWADA
// dont use foreach($HTTP_POST_VARS as $k => $v)
// $HTTP_POST_VARS   -> $_POST
// $HTTP_GET_VARS    -> $_GET
// $HTTP_SERVER_VARS -> $_SERVER

// 2005-06-20 K.OHWADA
// supress notice : Undefined index: editaccess

// 2005-06-14 K.OHWADA
// BUG 9370: cannot make new category

// 2004/05/22 K.OHWADA
// Section Image can't display

// 2004/02/28 K.OHWADA
// add adminmenu flag
// multi langauge
//   Also copy articles -> _AM_DUPLICATE_ARTICLES
// bug fix: 
//   can't copy articles at the duplicate of a category
//   update the same article, instead of creating new article 
//   create sub category two or more times

// Update: 14/05/2003, Skalpa Keo: Added 'Duplicate section' functionnality

include("admin_header.php");
include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/class/wfscategory.php");
include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/class/wfsarticle.php");
include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/include/groupaccess.php");
include_once XOOPS_ROOT_PATH."/class/xoopslists.php";

function sectionheader() {
	echo "<div><h4>"._AM_SECTIONMANAGE."</h4></div>";

// add adminmenu flag
//	adminmenu();
	global $wfsAdminMenu;
	if ($wfsAdminMenu) adminmenu();
}

function editCategoryForm($id=0) {

//      global $xoopsConfig, $wfsConfig, $modify, $xoopsUser;
		global $xoopsConfig, $wfsConfig, $xoopsUser;

		$modify = 0;
		if ( isset($_POST['modify']) )
		{
			$modify = intval($_POST['modify']);
		}

		$xt = new WfsCategory($id);        

		if (!isset($xt->imgurl)) $xt->imgurl = 'blank.gif';
		include_once XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
		
		if ($id) {
			$sform = new XoopsThemeForm(_AM_MODIFYCATEGORY, "op", xoops_getenv('PHP_SELF'));
		} else {
			$sform = new XoopsThemeForm(_AM_ADDMCATEGORY, "op", xoops_getenv('PHP_SELF'));
		}
		
		//if ( $xoopsUser->uid() == 1 ) {
		//	if ($modify) {
		//		$sform->addElement(new XoopsFormSelectGroup(_WFS_GROUPPROMPT, 'editaccess', true, getGroupIda($xt->editaccess), 5, true));
		//	}else{
		//		$sform->addElement(new XoopsFormSelectGroup(_WFS_GROUPPROMPT, 'editaccess', true, true, 5, true));
		//	}
		//}
		
		if ($modify) {
			$sform->addElement(new XoopsFormSelectGroup(_WFS_GROUPPROMPT, 'groupid', true, getGroupIda($xt->groupid), 5, true));
		}else{
			$sform->addElement(new XoopsFormSelectGroup(_WFS_GROUPPROMPT, 'groupid', true, true, 5, true));
		}
		if (!$modify) $xt->orders = '1';
		$sform->addElement(new XoopsFormText(_AM_CATEGORYWEIGHT, 'orders', 10, 80, $xt->orders), false);
		$sform->addElement(new XoopsFormText(_AM_CATEGORYNAME, 'title', 50, 80, $xt->title()), true);
		
		ob_start();
		$sform->addElement(new XoopsFormHidden('pid', 0));
		if ($id) {
			$xt->makeSelBox(1, $xt->pid(), "pid");
		}else{
			$xt->makeSelBox(1, 0, "pid");
		}
		if ($id) {
			$sform->addElement(new XoopsFormLabel(_AM_MOVETO, ob_get_contents()));
		}else{
			$sform->addElement(new XoopsFormLabel(_AM_IN, ob_get_contents()));
		}
		
		ob_end_clean();
		
		$graph_array =& XoopsLists::getImgListAsArray(XOOPS_ROOT_PATH."/".$wfsConfig['sgraphicspath']);
		$indeximage_select = new XoopsFormSelect('', 'indeximage', $xt->imgurl);
		$indeximage_select->addOptionArray($graph_array);

// Section Image can't display
//		$indeximage_select->setExtra("onchange='showImgSelected(\"image\", \"indeximage\", \"".$wfsConfig['sgraphicspath']."\", \"\")'");
$xoops_url = $xoopsConfig['xoops_url'];
$indeximage_select->setExtra("onchange='showImgSelected(\"image\",\"indeximage\", \"".$wfsConfig['sgraphicspath']."\",\"\", \"$xoops_url\")'");

		$indeximage_tray = new XoopsFormElementTray(_AM_CATEGORYIMG, '&nbsp;');
		$indeximage_tray->addElement($indeximage_select);
		$indeximage_tray->addElement(new XoopsFormLabel('', "<br /><br /><img src='".$xoopsConfig['xoops_url']."/". $wfsConfig['sgraphicspath']."/".$xt->imgurl."' name='image' id='image' alt='' />" ));
		$sform->addElement($indeximage_tray);

		if (!isset($xt->displayimg)) $xt->displayimg = '0';		
		$submenus_radio = new XoopsFormRadioYN(_AM_SHOWCATEGORYIMG, 'displayimg', $xt->displayimg, ' Yes', ' No');
		$sform->addElement($submenus_radio);
		
		$sform->addElement(new XoopsFormTextArea(_AM_CATEGORYDESC, 'description', $xt->description("E")), false);
		$sform->addElement(new XoopsFormDhtmlTextArea(_WFS_CATEGORYHEAD, 'catdescription', $xt->catdescription("E"), 10, 60), false);
		$sform->addElement(new XoopsFormTextArea(_WFS_CATEGORYFOOT, 'catfooter', $xt->catfooter("E"), 10, 60), false);

		$button_tray = new XoopsFormElementTray('','');
		if ($id) {
			$button_tray->addElement(new XoopsFormHidden('id', $id));
			$button_tray->addElement(new XoopsFormButton('', 'save', _AM_SAVECHANGE, 'submit'));
			$button_tray->addElement(new XoopsFormButton('', 'delete', _AM_DEL, 'submit'));
		} else {
			$button_tray->addElement(new XoopsFormButton('', 'save', _AM_ADD, 'submit'));
		}
		$sform->addElement($button_tray);
		$sform->display();
		
}

function duplicateSection($cat, $targetid, $newtitle='', $recurse=false, $dupcontent=false) {
	$sourceid = $cat->id;

// bug fix: create sub category two or more times
//	$category_arr = $cat->getAllChild();
	$category_arr = $cat->getFirstChild();

	$cat->setPid($targetid);
	if (!empty($newtitle)) {
		$cat->setTitle($newtitle);
	}
	$cat->id = 0;				// Clear object id, so store() will create a new category
	$cat->store();				// Duplicate section
	if ($cat->id == 0) {
		$cat->id = $cat->db->getInsertId();
	}

	if ($dupcontent) {
		// Also duplicate each story in this section
		$article_arr = WfsArticle::getByCategory($sourceid);
			foreach($article_arr as $eacharticle){
			$eacharticle->setCategoryid($cat->id);	// move (copy) to newly created category

// create new article when storing
// bug fix: update the same article, instead of creating new article 
//			$eacharticle->articleid = 0;
			unset($eacharticle->articleid);

			$eacharticle->store();
		}
	}
	if ($recurse) {
		// Duplicate every sub-section to newly created one
		foreach ($category_arr as $subcat) {
			duplicateSection($subcat, $cat->id, '', true, $dupcontent);
		}
	}
}

//Start of section management

$op = '';
if ( isset($_POST['save'] )) 
{
	$op = 'save';
}
elseif ( isset($_POST['delete']) ) 
{
	$op = 'delete';
}
// BUG 8207: cannot edit category
elseif ( isset($_POST['op']) ) 
{
	$op = $_POST['op'];
}
elseif (isset($_GET['op']))
{
	$op = $_GET['op'];
}

//global $xoopsDB, $myts, $groupid;
global $xoopsDB, $myts;

	switch($op){
    case "delete":
               	if ( $_GET['ok'] != 1 ) {
                        xoops_cp_header();
                        													
						echo"<table width='100%' border='0' cellpadding = '2' cellspacing='1' class = 'confirmMsg'><tr><td class='confirmMsg'>";
                        echo "<div class='confirmMsg'>";
                        echo "<h4>";
                        echo ""._AM_WAYSYWTDTTAL."</font></h4><br />";
                        echo "<table><tr><td>";
                        echo myTextForm("category.php?op=delete&id=".$_POST['id']."&ok=1", _AM_YES);
                        echo "</td><td>";
                        echo myTextForm("category.php?op=default", _AM_NO);
                        echo "</td></tr></table>";
                        echo "</div><br /><br />";
                        echo"</td></tr></table>";
                } else {
                        $xt = new WfsCategory($_GET['id']);
						//get all subtopics under the specified topic
                        $topic_arr = $xt->getAllChild();
                        array_push($topic_arr, $xt);
                        foreach($topic_arr as $eachtopic){
                                //get all stories in each topic
                                $article_arr = WfsArticle::getByCategory($eachtopic->id());
                                foreach($article_arr as $eacharticle){
                                        $eacharticle->delete();
                                }
                                //all stories for each topic is deleted, now delete the topic data
                                $eachtopic->delete();
                        }
                      	redirect_header("category.php?op=default",1,_AM_DELETE);
                        exit();
                }
                break;

        case "mod":
                xoops_cp_header();
               	$modify = 1;
				sectionheader();
				editCategoryForm($_POST['id']);
                break;

        case "save":
            //Error check cannot move section into same sect		

// BUG 9370: cannot make new category
			// if (($HTTP_POST_VARS['id']) == $HTTP_POST_VARS['pid']) {
			if ( isset($_POST['id']) && (($_POST['id']) == $_POST['pid']) ) 
			{
				redirect_header(xoops_getenv("PHP_SELF"),1,_AM_CANNOTHAVECATTHERE);
			}

			if (isset($_POST['id'])) {
    	        $xt = new WfsCategory($_POST['id']);
            } else {
                $xt = new WfsCategory();
            }
          				
			$xt->setDescription($_POST['description']);
			$xt->setcatdescription($_POST['catdescription']);
			$xt->setcatfooter($_POST['catfooter']);
 			$xt->setPid($_POST['pid']);
			$xt->setgroupid($_POST['groupid']);

// supress notice : Undefined index: editaccess
			if ( isset($_POST['editaccess']) )
			{
				$xt->seteditaccess($_POST['editaccess']);
			}

			$xt->setTitle($_POST['title']);

			$variable = trim($_POST['orders']);
			if (is_numeric($variable)) {
				$xt->setOrders($_POST['orders']);
			} else {
				redirect_header(xoops_getenv('PHP_SELF'),3,"Weight must be a number!");
			}
			
			if (isset($_POST['indeximage'])) {
				$xt->setImgurl($_POST['indeximage']);
    		} 
			
			if (isset($_POST['displayimg'])) {
				$xt->setDisplayimg($_POST['displayimg']);
			} else {
				$xt->setDisplayimg(0);
			}
			
			$xt->store();
            redirect_header("category.php?op=topicsmanager",1,_AM_DBUPDATED);
            exit();
            break;

				// -- Skalpa Keo 03/05/14: Duplicate Topic
		case "dup":
		case "dupsubs":
			$sourceid = intval($_POST['source']);
			$targetid = intval($_POST['target']);
			$xt = new WfsCategory($sourceid);

			// Quick & dirty code explanation:
			// TextSanitizer tests magic_quotes_gpc before escaping strings
			// problem is that most properties here don't come from GPC, and
			// won't be escaped automatically by PHP (except title)
			$is_magic = get_magic_quotes_gpc();
			$title = $is_magic ? stripslashes($_POST['title']) : $_POST['title'];
			$recurse= ($op == 'dupsubs') ? true : false;
			$dupcontent= intval($_POST['dupcontent']) ? true : false;
			ini_set('magic_quotes_gpc', '0');
			duplicateSection($xt, $targetid, $title, $recurse, $dupcontent);
			ini_set('magic_quotes_gpc', $is_magic);

            redirect_header("category.php?op=topicsmanager",1,_AM_DBUPDATED);
            exit();
            break;
			// -- Skalpa [/end]

        case "default":
        default:

        xoops_cp_header();
               	
				sectionheader();
							               
				if (WfsCategory::countByArticle() > 0) {
                	$xt = new WfsCategory();
                    // Modify Topic
                    include_once XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
					$mform = new XoopsThemeForm(_AM_MODIFYCATEGORY, "modify", xoops_getenv('PHP_SELF'));
					ob_start();
					$xt->makeSelBox(0);
					$mform->addElement(new XoopsFormLabel(_WFS_CATEGORY, ob_get_contents()));
					ob_end_clean();	
					$button_tray = new XoopsFormElementTray('','');
					
					$button_tray->addElement(new XoopsFormHidden('modify', '1' ));
					$button_tray->addElement(new XoopsFormHidden('op', 'mod' ));
					$button_tray->addElement(new XoopsFormButton('', '', _AM_MODIFY, 'submit'));
					$mform->addElement($button_tray);
					$mform->display();
					// -- Skalpa Keo 03/05/14: Duplicate Topic
					
					$dupform=new XoopsThemeForm(_AM_DUPLICATECATEGORY, "duplicate", xoops_getenv('PHP_SELF'));
					ob_start();
					$xt->makeSelBox(0, -1, 'source');
					echo "&nbsp;&nbsp;" . _AM_TO . "&nbsp;&nbsp;";
					$xt->makeSelBox(1, 0, 'target');
					$dupform->addElement(new XoopsFormLabel(_AM_COPY, ob_get_contents()));
					ob_end_clean();	
					$dupform->addElement(new XoopsFormText(_AM_NEWCATEGORYNAME, 'title', 50, 80, $xt->title()), true);

// multi langauge
//					$dupform->addElement(new XoopsFormRadioYN('Also copy articles', 'dupcontent', 0));
					$dupform->addElement(new XoopsFormRadioYN(_AM_DUPLICATE_ARTICLES, 'dupcontent', 0));

					$dup_tray = new XoopsFormElementTray('','');
					$dup_tray->addElement(new XoopsFormHidden('modify', '1' ));
					$dup_tray->addElement(new XoopsFormHidden('op', 'dup' ));
					$butt_dup=new XoopsFormButton('', '', _AM_DUPLICATE, 'submit');
					$butt_dupct=new XoopsFormButton('', '', _AM_DUPLICATEWSUBS, 'submit');
					$butt_dup->setExtra('onclick="this.form.elements.op.value=\'dup\'"');
					$butt_dupct->setExtra('onclick="this.form.elements.op.value=\'dupsubs\'"');
					$dup_tray->addElement($butt_dup);
					$dup_tray->addElement($butt_dupct);
					$dupform->addElement($dup_tray);
					$dupform->display();
					// -- Skalpa [/end]
				}
				
               	if (WfsCategory::countByArticle() == 0) {
                	$xt = new WfsCategory();
				}
					editCategoryForm();
				break;
}

wfsfooter();
xoops_cp_footer();

?>