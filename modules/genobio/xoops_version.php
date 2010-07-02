<?php
/* *********************************************/
/*                          	TAKEAWEB					*/
/*        	           http://www.takeaweb       			*/
/*       					       				*/
/*           		  Francesco Mulassano   				*/
/*            		  Alessandro Sturniolo     				*/
/*                  	        	  2009           				*/
/* ------------------------------------------------------------------*/
/*    	      XOOPS - PHP Content Management System    		*/
/*                  Copyright (c) 2000 XOOPS.org        		*/
/*                      <http://www.xoops.org/>          			*/
/* *********************************************/
if (!defined('XOOPS_ROOT_PATH')) {
	die('XOOPS root path not defined');
}
$modversion['dirname'] = basename(dirname(__FILE__));
$modversion['name'] = ucfirst(basename(dirname(__FILE__)));
$modversion['version']     = "0.13";
$modversion['releasedate'] = "Friday: 2009-06-26";
$modversion['status']      = "Alpha 1";
$modversion['description'] = _MI_GENOBIO_DESC;
$modversion['credits']     = "Wishcraft, Trabis, Runeher";
$modversion['author']      = "Wishcraft";
$modversion['help']        = "";
$modversion['license']     = "A small genological biographic wiki multisite profiler.";
$modversion['official']    = 0;
$modversion['image']       = "images/genobio_slogo.png";

$modversion['author_realname'] = "Simon Roberts";
$modversion['author_website_url'] = "http://www.chronolabs.org.au";
$modversion['author_website_name'] = "Chronolabs Australia";
$modversion['author_email'] = "simon@xoops.org";
$modversion['demo_site_url'] = "Chronolabs Australia";
$modversion['demo_site_name'] = "http://roberts.co.in/";
$modversion['support_site_url'] = "http://www.chronolabs.org.au/forums/viewforum.php?forum=32";
$modversion['support_site_name'] = "Chronolabs";
$modversion['submit_bug'] = "http://www.chronolabs.org.au/forums/viewforum.php?forum=32";
$modversion['submit_feature'] = "http://www.chronolabs.org.au/forums/viewforum.php?forum=32";
$modversion['usenet_group'] = "sci.chronolabs";
$modversion['maillist_announcements'] = "";
$modversion['maillist_bugs'] = "";
$modversion['maillist_features'] = "";
// Upgrade
$modversion['onUpgrade'] = "include/upgrade.php";

// Main
$modversion['hasMain'] = 1;

// Admin
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

// Mysql file
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";

// Tables created by sql file
$modversion['tables'][0] = "genobio_member";
$modversion['tables'][1] = "genobio_members_profiles";
$modversion['tables'][2] = "genobio_categories";
$modversion['tables'][3] = "genobio_sibblings";

// Templates
$i = 0;

$i++;
$modversion['templates'][$i]['file'] = 'genobio_index.html';
$modversion['templates'][$i]['description'] = 'Picture Profile Screen';

$i++;
$modversion['templates'][$i]['file'] = 'genobio_member.html';
$modversion['templates'][$i]['description'] = 'Member Picture Profile Screen';

$i++;
$modversion['templates'][$i]['file'] = 'genobio_birth.html';
$modversion['templates'][$i]['description'] = 'Birth Picture Booth';

$modversion['hasComments'] = 1;
$modversion['comments']['itemName'] = 'id';
$modversion['comments']['pageName'] = 'index.php';
$modversion['comments']['extraParams'] = array('op');

?>
