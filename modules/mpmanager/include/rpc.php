<?php
include("../../../mainfile.php");

if (!defined('XOOPS_ROOT_PATH')) {
	exit();
} 
/* MusS : Use XOOPS_ROOT_PATH for all include file */
include_once XOOPS_ROOT_PATH."/include/xoopscodes.php";
include_once XOOPS_ROOT_PATH.'/class/pagenav.php';
include_once XOOPS_ROOT_PATH.'/modules/mpmanager/class/priv_msgscont.php';
global $xoopsDB, $xoopsConfig, $xoopsUser, $xoopsModuleConfig;                      

if (empty($xoopsUser)) {
  redirect_header("".XOOPS_URL."/user.php",1,_PM_REGISTERNOW);	
} else {

$start = empty($_REQUEST['start'])?"0": intval($_REQUEST['start']);
//trouve la configuration module
$module_handler =& xoops_gethandler('module');
$xoopsModule =& $module_handler->getByDirname("mpmanager");
$xoopsModuleConfig =& $config_handler->getConfigsByCat(0, $xoopsModule->getVar('mid'));
//	
    //trouve les contacts
    $cont_handler  = & xoops_gethandler('priv_msgscont');
    $criteria = new CriteriaCompo(); 
    $criteria->add(new Criteria('ct_userid', $xoopsUser->getVar('uid'))); 
    $amount = $cont_handler->getCount($criteria); 
    
    $criteria->setStart($start);
    $criteria->setLimit("10");
    $pm_cont =& $cont_handler->getObjects($criteria);
		
      //   $query = $xoopsDB->query("SELECT ct_userid, ct_contact, ct_name, ct_uname FROM " . $xoopsDB->prefix("priv_msgscont") . " WHERE ct_userid = ".$xoopsUser->getVar('uid')."");
				if($pm_cont) {
				
				//while ($result=$xoopsDB->fetchArray($query)) {
                                $i = $start + 0;
                                foreach (array_keys($pm_cont) as $i) { 
				echo '<li style="list-style : none" onClick="fill(\''.$pm_cont[$i]->getVar('ct_uname').'\','.$pm_cont[$i]->getVar('ct_contact').', '.$xoopsModuleConfig['senduser'].');">'.$pm_cont[$i]->getVar('ct_uname').','.$pm_cont[$i]->getVar('ct_name').'</li>';
 $i++; 
	 	         		
}
 //echo  $pagenav;
$nbrpage1 = number_format($amount / 10);
$nbrpage = $nbrpage1 + 1;
echo ("<a href='###' onclick='lookupC(0);'> <<</a> :");

for ( $i = 1; $i <= $nbrpage; $i++ )
{
$debut = ((($i - 1) * 10) );
echo ("<a href='###' onclick='lookupC(".$debut.");' >".$i."</a>:</a>");
}
$mondebut = ((($nbrpage - 1) * 10));
echo ("<a href='###' onclick='lookupC(".$mondebut.");'> >></a>");
//

				} else {
					echo 'ERROR: There was a problem with the query.';
 echo $start;
				}

}


?>