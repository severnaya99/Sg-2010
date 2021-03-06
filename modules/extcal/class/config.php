<?php

if (!defined("XOOPS_ROOT_PATH")) {
	die("XOOPS root path not defined");
}

class ExtcalConfig {

	function &getHandler()
	{
		static $configHandler;
		if(!isset($configHandler[0])) {
			$configHandler[0] = new ExtcalConfig();
		}
		return $configHandler[0];
	}
	
	function getModuleConfig()
	{
		global $xoopsModule;
		static $moduleConfig;
		$dirname = (isset($xoopsModule) ? $xoopsModule->getVar('dirname') :'system');
		if($dirname == 'extcal') {
			$moduleConfig = $GLOBALS['xoopsModuleConfig'];
		} else {
			if(!isset($moduleConfig)) {
				$moduleHandler =& xoops_gethandler('module');
				$module = $moduleHandler->getByDirname('extcal');
				$config_handler =& xoops_gethandler('config');
				$moduleConfig = $config_handler->getConfigList($module->getVar("mid"));
			}
		}
		return $moduleConfig;
	}

}

?>
