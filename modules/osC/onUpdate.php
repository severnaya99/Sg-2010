<?php
/**
 * @package xosC
 * @subpackage install
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1 
 * Database changes for the releases
**/
function xoops_module_pre_update_osC($module,$module_version) {
 global $xoopsDB;
 echo "Version :".$module_version;
 if($module_version < 55 ) {
   echo "<br>Import new SQL for v0.55<br>";
   $module->modinfo['sqlfile']['mysql']= 'sql/upgrade_055.sql';
   $module->executeSQL();
 }
 if($module_version < 57 ) {
   echo "<br>Import new SQL for v0.57<br>";
   $module->modinfo['sqlfile']['mysql']= 'sql/upgrade_056.sql';
   $module->executeSQL();
 }
  if($module_version < 58 ) {
   echo "<br>Import new SQL for v0.58<br>";
   $module->modinfo['sqlfile']['mysql']= 'sql/upgrade_057.sql';
   $module->executeSQL();
 }
 if($module_version < 62 ) {
   echo "<br>Import new SQL for v0.62<br>";
   $xoopsDB->queryF("drop table if exists ".$xoopsDB->prefix('osc_countries'));
   $module->modinfo['sqlfile']['mysql']= 'sql/upgrade_062.sql';
   $module->executeSQL();
 }

 return true;
}

function xoops_module_uninstall_osC($module) {
 echo "Deinstallation";
 return true;
}
?>