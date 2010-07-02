<?php 
defined('XOOPS_ROOT_PATH') or die('Restricted access');
// *****************Change:  nocommentsCorePreload to your module name. Eg.: mymoduleCorePreload********************
class nocommentsCorePreload extends XoopsPreloadItem{

    function eventCoreHeaderAddmeta(){
	global $xoTheme;
	$module_handler =& xoops_gethandler('module');
	//******************** CHANGE FOLDER NAME TO YOUR MODULE **************************
	$module = $module_handler->getByDirname('nocomments');
	$config_handler =& xoops_gethandler('config');
	
		$xoTheme->addScript('browse.php?Frameworks/jquery/jquery.js');	
		$xoops_url= XOOPS_URL;
		
$script= "
var nocomments = jQuery.noConflict();
var meta;
if (document.getElementsByTagName) {
meta = document.getElementsByTagName('meta')[0];
if (meta) {
meta.name = 'Author';
meta.content = 'Kibo';
}
}
";

//******************** CHANGE FOLDER NAME TO YOUR MODULE **************************

	$xoTheme->addScript('','',$script);
	$xoTheme->addScript(XOOPS_URL.'/modules/nocomments/js/nocomments_toogle.js');
	$xoTheme->addScript(XOOPS_URL.'/modules/nocomments/js/nocomments_toogle2.js');
    }

}
?>
