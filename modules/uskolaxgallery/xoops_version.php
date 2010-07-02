<?php
$modversion['name'] = _MI_USKOLAXGALLERY_NAME;
$modversion['version'] = 1.27;
$modversion['description'] = _MI_USKOLAXGALLERY_DESC;
$modversion['credits'] = "Aitor Uskola<br>( http://www.uskola.com/ )";
$modversion['author'] = "Aitor Uskola http://www.uskola.com/, Carol Hess and Sergio Kohl " ;
$modversion['help'] = "../modules/uskolaxgallery/uskolaxgallery.html";
$modversion['license'] = "GPL see LICENSE";
$modversion['official'] = 1;
$modversion['image'] = "galeria.jpg";
$modversion['dirname'] = "uskolaxgallery";

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";

// Blocks
$modversion['blocks'][1]['file'] = "gallery.php";
$modversion['blocks'][1]['name'] =_MI_USKOLAXGALLERY_NAME;
$modversion['blocks'][1]['description'] = _MB_USKOLAXGALLERY_DESC;
$modversion['blocks'][1]['show_func'] = "b_uskolaxgallery_show";

// Menu
$modversion['hasMain'] = 1;
/*$modversion['sub'][1]['name'] = "enviarficheros";
$modversion['sub'][1]['url'] = "submit.php";
*/
// Search
$modversion['hasSearch'] = 1;
$modversion['search']['file'] = "include/search.inc.php";
$modversion['search']['func'] = "galeria_search";

?>