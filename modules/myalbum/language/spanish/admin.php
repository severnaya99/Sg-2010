<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_AM_LOADED' ) ) {





// Appended by Xoops Language Checker -GIJOE- in 2007-08-24 18:18:02
define('_MD_A_MYMENU_MYTPLSADMIN','Templates');
define('_MD_A_MYMENU_MYBLOCKSADMIN','Blocks/Permissions');
define('_MD_A_MYMENU_MYPREFERENCES','Preferences');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-17 18:42:54
define('_AM_TH_DATE','Last update');
define('_AM_TH_BATCHUPDATE','Update checked photos collectively');
define('_AM_OPT_NOCHANGE','- NO CHANGE -');
define('_AM_JS_UPDATECONFIRM','The checked items will be updated. OK?');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-05 15:14:37
define('_AM_H3_FMT_CATEGORIES','Categories Manager (%s)');
define('_AM_CAT_TH_TITLE','Name');
define('_AM_CAT_TH_PHOTOS','Images');
define('_AM_CAT_TH_OPERATION','Operation');
define('_AM_CAT_TH_IMAGE','Banner');
define('_AM_CAT_TH_PARENT','Parent');
define('_AM_CAT_TH_IMGURL','URL of Banner');
define('_AM_CAT_MENU_NEW','Creating a category');
define('_AM_CAT_MENU_EDIT','Editing a category');
define('_AM_CAT_INSERTED','A category is added');
define('_AM_CAT_UPDATED','The category is modified');
define('_AM_CAT_BTN_BATCH','Apply');
define('_AM_CAT_LINK_MAKETOPCAT','Create a new category on top');
define('_AM_CAT_LINK_ADDPHOTOS','Add a image into this category');
define('_AM_CAT_LINK_EDIT','Edit this category');
define('_AM_CAT_LINK_MAKESUBCAT','Create a new category under this category');
define('_AM_CAT_FMT_NEEDADMISSION','%s images are needed the admission');
define('_AM_CAT_FMT_CATDELCONFIRM','%s will be deleted with its sub-categories, images, comments. Are you OK?');
define('_AM_H3_FMT_ADMISSION','Admitting images (%s)');
define('_AM_H3_FMT_PHOTOMANAGER','Photo Manager (%s)');
define('_AM_H3_FMT_IMPORTTO','Importing images from another modules to %s');
define('_AM_H3_FMT_EXPORTTO','Exporting images from %s to another modules');
define('_AM_FMT_EXPORTTOIMAGEMANAGER','Exporting to image manager in XOOPS');
define('_AM_FMT_EXPORTIMSRCCAT','Source');
define('_AM_FMT_EXPORTIMDSTCAT','Destination');
define('_AM_CB_EXPORTRECURSIVELY','with images in its subcategories');
define('_AM_CB_EXPORTTHUMB','Export thumbnails instead of main images');
define('_AM_MB_EXPORTCONFIRM','Do export. OK?');
define('_AM_FMT_EXPORTSUCCESS','You have exported %s images');

// Appended by Xoops Language Checker -GIJOE- in 2004-04-07 15:04:24
define('_AM_ALBM_IMPORT','Importing images from another modules');
define('_AM_FMT_IMPORTTO','Import into %s ');
define('_AM_FMT_IMPORTFROMMYALBUMP','Importing from "%s" as module type of myAlbum-P');
define('_AM_FMT_IMPORTFROMIMAGEMANAGER','Importing from image manager in XOOPS');
define('_AM_CB_IMPORTRECURSIVELY','Importing sub-categories recursively');
define('_AM_RADIO_IMPORTCOPY','Copy images (comments will not be copied');
define('_AM_RADIO_IMPORTMOVE','Move images (comments will be succeeded)');
define('_AM_MB_IMPORTCONFIRM','Do import ?');
define('_AM_FMT_IMPORTSUCCESS','You have imported %s images');

define( 'MYALBUM_AM_LOADED' , 1 ) ;

// Module Checker
define( "_AM_H3_FMT_MODULECHECKER" , "comprobador myAlbum-P" ) ;

define( "_AM_H4_ENVIRONMENT" , "Comprobaci…Ï de Entorno" ) ;
define( "_AM_MB_PHPDIRECTIVE" , "Directivas PHP" ) ;
define( "_AM_MB_BOTHOK" , "Ambos ok" ) ;
define( "_AM_MB_NEEDON" , "necesarios" ) ;


define( "_AM_H4_TABLE" , "Comprobaci…Ï de Tablas" ) ;
define( "_AM_MB_PHOTOSTABLE" , "Tabla de Fotos" ) ;
define( "_AM_MB_DESCRIPTIONTABLE" , "Tabla de Descripciones" ) ;
define( "_AM_MB_CATEGORIESTABLE" , "Tabla de CategorùÂs" ) ;
define( "_AM_MB_VOTEDATATABLE" , "Tabla de Votaciones" ) ;
define( "_AM_MB_COMMENTSTABLE" , "Tabla de Comentarios" ) ;
define( "_AM_MB_NUMBEROFPHOTOS" , "N“Îero de Fotos" ) ;
define( "_AM_MB_NUMBEROFDESCRIPTIONS" , "N“Îero de Descripciones" ) ;
define( "_AM_MB_NUMBEROFCATEGORIES" , "N“Îero de CategorùÂs" ) ;
define( "_AM_MB_NUMBEROFVOTEDATA" , "N“Îero de Votaciones" ) ;
define( "_AM_MB_NUMBEROFCOMMENTS" , "N“Îero de Comentarios" ) ;


define( "_AM_H4_CONFIG" , "Comprobaci…Ï de Configuraci…Ï" ) ;
define( "_AM_MB_PIPEFORIMAGES" , "Fotos en Masa" ) ;
define( "_AM_MB_DIRECTORYFORPHOTOS" , "Directorio de Fotos" ) ;
define( "_AM_MB_DIRECTORYFORTHUMBS" , "Directorio de Miniaturas" ) ;
define( "_AM_ERR_LASTCHAR" , "Error: El “Ítimo caracter no debe ser '/'" ) ;
define( "_AM_ERR_FIRSTCHAR" , "Error: El primer caracter no debe ser '/'" ) ;
define( "_AM_ERR_PERMISSION" , "Error: Primero crear y chmod 777 este directorio por ftp o shell." ) ;
define( "_AM_ERR_NOTDIRECTORY" , "Error: No es un directorio." ) ;
define( "_AM_ERR_READORWRITE" , "Error: El directorio no es escribible o no es legible. Debe cambiar los permisos del directorio a 777." ) ;
define( "_AM_ERR_SAMEDIR" , "Error: El Directorio de las Fotos no puede ser el mismo que el de las Miniaturas" ) ;
define( "_AM_LNK_CHECKGD2" , "Comprueba que 'GD2' trabaja correctamente bajo su configuraci…Ï de GD y PHP" ) ;
define( "_AM_MB_CHECKGD2" , "Si la páÈina enlazada desde aquí no se muestra correctamente,, deberùÂ hacer que GD trabaje en modo truecolor." ) ;
define( "_AM_MB_GD2SUCCESS" , "Ž¡Conseguido!<br />No obstante, Vd. puede usar GD2 (truecolor) en este entorno." ) ;


define( "_AM_H4_PHOTOLINK" , "Comprobaci…Ï de Enlaces de Fotos y Miniaturas" ) ;
define( "_AM_MB_NOWCHECKING" , "Ahora, comprobando ." ) ;
define( "_AM_FMT_PHOTONOTREADABLE" , "una foto principal (%s) no es legible." ) ;
define( "_AM_FMT_THUMBNOTREADABLE" , "una miniatura (%s) no es legible." ) ;
define( "_AM_FMT_NUMBEROFDEADPHOTOS" , "%s ficheros de foto sin enlace encontrados." ) ;
define( "_AM_FMT_NUMBEROFDEADTHUMBS" , "%s minuaturas deberùÂn reconstruirse." ) ;
define( "_AM_FMT_NUMBEROFREMOVEDTMPS" , "%s garbage files have been removed." ) ;
define( "_AM_LINK_REDOTHUMBS" , "reconstruir miniaturas" ) ;
define( "_AM_LINK_TABLEMAINTENANCE" , "mantenimiento de tablas" ) ;



// Redo Thumbnail
define( "_AM_H3_FMT_RECORDMAINTENANCE" , "Mantenimiento de Fotos myAlbum-P" ) ;

define( "_AM_FMT_CHECKING" , "comprobando %s ..." ) ;

define( "_AM_FORM_RECORDMAINTENANCE" , "mantenimiento de fotos, regeneraci…Ï de miniaturas etc." ) ;

define( "_AM_MB_FAILEDREADING" , "lectura fallida." ) ;
define( "_AM_MB_CREATEDTHUMBS" , "creada una miniatura." ) ;
define( "_AM_MB_BIGTHUMBS" , "creaci…Ï de miniatura fallida. copiada." ) ;
define( "_AM_MB_SKIPPED" , "saltada." ) ;
define( "_AM_MB_SIZEREPAIRED" , "(tamaÐ de campos del registro reparado.)" ) ;
define( "_AM_MB_RECREMOVED" , "este registro se ha eliminado." ) ;
define( "_AM_MB_PHOTONOTEXISTS" , "la foto principal no existe." ) ;
define( "_AM_MB_PHOTORESIZED" , "la foto principal ha sido cambiada de tamaÐ." ) ;

define( "_AM_TEXT_RECORDFORSTARTING" , "n“Îeros de registro comenzando por" ) ;
define( "_AM_TEXT_NUMBERATATIME" , "n“Îero de registros procesados hasta ahora" ) ;
define( "_AM_LABEL_DESCNUMBERATATIME" , "Un n“Îero demasiado grande puede hacer que el servidor tarde demasiado." ) ;

define( "_AM_RADIO_FORCEREDO" , "forzar recreaci…Ï incluso si la miniatura existe" ) ;
define( "_AM_RADIO_REMOVEREC" , "eliminar registros que no enlacen a una foto principal" ) ;
define( "_AM_RADIO_RESIZE" , "encojer fotos mayores que los pixels especificados en las preferencias actuales" ) ;

define( "_AM_MB_FINISHED" , "terminado" ) ;
define( "_AM_LINK_RESTART" , "recomenzar" ) ;
define( "_AM_SUBMIT_NEXT" , "siguiente" ) ;



// Batch Register
define( "_AM_H3_FMT_BATCHREGISTER" , "registrador myAlbum-P" ) ;


?><?php
// Appended by Xoops Language Checker -GIJOE- in 2003-12-03 15:27:10
define('_ALBM_INDEX_BLOCKSADMIN','Administrador de bloques myAlbum-P');
?><?php
// Appended by Xoops Language Checker -GIJOE- in 2004-01-27 15:37:02
define('_AM_TH_SUBMITTER','Enviador');
define('_AM_TH_TITLE','TùÕulo');
define('_AM_TH_DESCRIPTION','Descripci…Ï');
define('_AM_TH_CATEGORIES','CategorùÂ');
define('_AM_ALBM_GROUPPERM_GLOBAL','Permisos Globales');
define('_AM_ALBM_GROUPPERM_GLOBALDESC','Configurar privilegios de grupo sobre todo este m…Åulo');
define('_AM_ALBM_GPERMUPDATED','Los permisos se han cambiado correctamente');

}

?>
