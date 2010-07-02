<?php
include("../../../mainfile.php");

if (!defined('XOOPS_ROOT_PATH')) {
	exit();
} 
/* MusS : Use XOOPS_ROOT_PATH for all include file */
include_once XOOPS_ROOT_PATH."/include/xoopscodes.php";
include_once XOOPS_ROOT_PATH.'/modules/mpmanager/class/priv_msgs.php';
global $xoopsDB, $xoopsConfig, $xoopsUser, $xoopsModuleConfig,  $myts;  
$myts = & MyTextSanitizer :: getInstance(); // MyTextSanitizer object                    

if (empty($xoopsUser)) {
  redirect_header("".XOOPS_URL."/user.php",1,_PM_REGISTERNOW);	
} else {

$start = empty($_REQUEST['start'])?"0": intval($_REQUEST['start']);

//trouve la configuration module
$module_handler =& xoops_gethandler('module');
$xoopsModule =& $module_handler->getByDirname("mpmanager");
$xoopsModuleConfig =& $config_handler->getConfigsByCat(0, $xoopsModule->getVar('mid'));
//	

    //trouve le message
    $cont_handler  = & xoops_gethandler('priv_msgs');
    $criteria = new CriteriaCompo(); 
    $criteria->add(new Criteria('to_userid', $xoopsUser->getVar('uid'))); 
    $criteria->add(new Criteria('msg_id', $start)); 
    $amount = $cont_handler->getCount($criteria); 
    
    //$criteria->setStart($start);
   // $criteria->setLimit("10");
    $pm_cont =& $cont_handler->getObjects($criteria);
		
if($pm_cont) {
$i = $start + 0;
foreach (array_keys($pm_cont) as $i) { 
echo '<li style="list-style : none"><br />'.$myts->displayTarea($myts->undoHtmlSpecialChars($pm_cont[$i]->getVar('msg_text')),$xoopsModuleConfig['html']).'</li>';
 $i++; 	 	         		
}

				} else {
					echo 'ERROR: There was a problem with the query.';
 echo $start;
				}

}


?>