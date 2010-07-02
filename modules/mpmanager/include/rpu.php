<?php
include("../../../mainfile.php");

if (!defined('XOOPS_ROOT_PATH')) {
	exit();
} 
/* MusS : Use XOOPS_ROOT_PATH for all include file */
include_once XOOPS_ROOT_PATH."/include/xoopscodes.php";
global $xoopsDB, $xoopsConfig, $xoopsUser, $xoopsModuleConfig;                      

if (empty($xoopsUser)) {
  redirect_header("".XOOPS_URL."/user.php",1,_PM_REGISTERNOW);	
} else {

//trouve la configuration module
$module_handler =& xoops_gethandler('module');
$xoopsModule =& $module_handler->getByDirname("mpmanager");
$xoopsModuleConfig =& $config_handler->getConfigsByCat(0, $xoopsModule->getVar('mid'));
//	
$queryString = $_POST['queryString'];	

		if(isset($_POST['queryString'])) {
			$queryString = $_POST['queryString'];
                      
		
			if(strlen($queryString) >0) {
				
         $query = $xoopsDB->query("SELECT uid, name, uname FROM " . $xoopsDB->prefix("users") . " WHERE uname LIKE '$queryString%' or name LIKE '$queryString%'  LIMIT 5");
				if($query) {
				
	while ($result=$xoopsDB->fetchArray($query)) {
				echo '<li style="list-style : none" onClick="fill(\''.$result['uname'].'\','.$result['uid'].','.$xoopsModuleConfig['senduser'].');">'.$result['uname'].','.$result['name'].'</li>';
	         		}
				} else {
					echo 'ERROR: There was a problem with the query.';
				}
			} else {
				
			} 
		} else {
			echo 'erreur';
		}

}
?>