<?php
$modversion['name'] = ''._NOCOMMENTS_MODULE_NAME.'';
$modversion['version'] = 1.00;
$modversion['description'] = ''._NOCOMMENTS_MODULEDESC.'';
$modversion['author'] = ''._NOCOMMENTS_AUTHOR.'';
$modversion['credits'] = "";
$modversion['help'] = "";
$modversion['license'] = "GPL see LICENSE";
$modversion['official'] = 0;
$modversion['image'] = "img/nocomments.gif";
$modversion['dirname'] = "nocomments";
// Admin things
$modversion['hasAdmin'] = 0;
// Menu/Sub Menu
$modversion['hasMain'] = 1;



//*****************ADD TO YOUR MODULE TO GET COMMENTS*************************

// Comments
$modversion['hasComments'] = 1;
// name of the unique identifier of an article in the database
$modversion['comments']['itemName'] = 'com_itemid';
// the file that will show the article individually
$modversion['comments']['pageName'] = 'index.php';
// The hack id for comments
$modversion['config'][] = array(
	'name' 			=> 'hackcomid',
	'title' 		=> '',
	'description' 	=> '',
	'formtype' 		=> '',
	'valuetype' 	=> 'int',
	'default' 		=> '9999');
	
//*********************COMMENTS END*************************************