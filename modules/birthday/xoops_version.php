<?php

$modversion['name'] = _MI_BD_TITRE;
$modversion['version'] = 1.02;
$modversion['description'] = _MI_BD_DESC;
$modversion['author'] = "Sultan El Turrah<br />http://www.theclubbing.com<br /> Sur base du travail de Lmaix <br />http://www.bahut.com";
$modversion['credits'] = "The XOOPS Project";
$modversion['help'] = "Readme.txt";
$modversion['license'] = "GPL see LICENSE";
$modversion['official'] = 0;
$modversion['image'] = "images/birthday_slogo2.png";
$modversion['dirname'] = "birthday";

// Blocks
$modversion['blocks'][1]['file'] = "b_birthday.php";
$modversion['blocks'][1]['name'] = _MI_BD_TITRE;
$modversion['blocks'][1]['description'] = _MI_BD_DESC;
$modversion['blocks'][1]['show_func'] = "b_birthday_show";

// Menu
$modversion['hasMain'] = 1;

// SQL
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['tables'][0] = "users_birthday";
?>
