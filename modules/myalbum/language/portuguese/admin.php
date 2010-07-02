<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_AM_LOADED' ) ) {





// Appended by Xoops Language Checker -GIJOE- in 2007-08-24 18:18:03
define('_MD_A_MYMENU_MYTPLSADMIN','Templates');
define('_MD_A_MYMENU_MYBLOCKSADMIN','Blocks/Permissions');
define('_MD_A_MYMENU_MYPREFERENCES','Preferences');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-17 18:42:56
define('_AM_TH_DATE','Last update');
define('_AM_TH_BATCHUPDATE','Update checked photos collectively');
define('_AM_OPT_NOCHANGE','- NO CHANGE -');
define('_AM_JS_UPDATECONFIRM','The checked items will be updated. OK?');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-05 15:14:39
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

// Appended by Xoops Language Checker -GIJOE- in 2004-04-07 15:04:26
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

// Index (Top of Admin)
define( "_ALBM_INDEX_BLOCKSADMIN" , "Adminstra��o" ) ;

// Admission
define( "_AM_TH_SUBMITTER" , "Enviado por" ) ;
define( "_AM_TH_TITLE" , "T��ulo" ) ;
define( "_AM_TH_DESCRIPTION" , "Descri��o" ) ;
define( "_AM_TH_CATEGORIES" , "Categoria" ) ;

// Module Checker
define( "_AM_H3_FMT_MODULECHECKER" , "verificador" ) ;

define( "_AM_H4_ENVIRONMENT" , "verifica��o de ambiente" ) ;
define( "_AM_MB_PHPDIRECTIVE" , "Diretiva PHP" ) ;
define( "_AM_MB_BOTHOK" , "ambos ok" ) ;
define( "_AM_MB_NEEDON" , "necessita ativa��o" ) ;


define( "_AM_H4_TABLE" , "Verfica��o de tabela" ) ;
define( "_AM_MB_PHOTOSTABLE" , "Tabela de fotos" ) ;
define( "_AM_MB_DESCRIPTIONTABLE" , "Tabela de descri��o" ) ;
define( "_AM_MB_CATEGORIESTABLE" , "Tabela de categorias" ) ;
define( "_AM_MB_VOTEDATATABLE" , "Tabela de vota��o" ) ;
define( "_AM_MB_COMMENTSTABLE" , "Tabela de coment��ios" ) ;
define( "_AM_MB_NUMBEROFPHOTOS" , "N��ero de fotos" ) ;
define( "_AM_MB_NUMBEROFDESCRIPTIONS" , "N��ero de Descri��es" ) ;
define( "_AM_MB_NUMBEROFCATEGORIES" , "N��ero de Categorias" ) ;
define( "_AM_MB_NUMBEROFVOTEDATA" , "N��ero de vota��es" ) ;
define( "_AM_MB_NUMBEROFCOMMENTS" , "N��ero de coment��ios" ) ;


define( "_AM_H4_CONFIG" , "verifica��o de configura��o" ) ;
define( "_AM_MB_PIPEFORIMAGES" , "Dutos para imagens" ) ;
define( "_AM_MB_DIRECTORYFORPHOTOS" , "Diret��io de Fotos" ) ;
define( "_AM_MB_DIRECTORYFORTHUMBS" , "Diret��io de Thumbnails" ) ;
define( "_AM_ERR_LASTCHAR" , "Erro: O ��ltimo caracter n�� pode ser '/'" ) ;
define( "_AM_ERR_FIRSTCHAR" , "Erro: O Primeiro caracter deve ser '/'" ) ;
define( "_AM_ERR_PERMISSION" , "Erro: Primeiro crie e ajuste permiss�� para 777 este diret��io via ftp ou shell." ) ;
define( "_AM_ERR_NOTDIRECTORY" , "Erro: Isto n�� � um diret��io." ) ;
define( "_AM_ERR_READORWRITE" , "Erro: Este diret��io n�� tem permiss�� de escrita e(ou) leitura. Voc� deve alterar a permiss�� desse diret��io para 777." ) ;
define( "_AM_ERR_SAMEDIR" , "Erro: O caminho das fotos deve ser diferente do caminho dos thumbnails" ) ;
define( "_AM_LNK_CHECKGD2" , "Verifique se o GD2 est� corretamente compilado na vers�� de seu PHP" ) ;
define( "_AM_MB_CHECKGD2" , "Se a p��ina ligada daqui n�� estiver sendo visualizada corretamente, verifique se seu GD est� funcionando em modo truecolor." ) ;
define( "_AM_MB_GD2SUCCESS" , "Parab��s!<br />voc� pode utilizar D2 em modo truecolor neste ambiente." ) ;


define( "_AM_H4_PHOTOLINK" , "Fotos & Verificador de link de thumbs" ) ;
define( "_AM_MB_NOWCHECKING" , "Verificando ." ) ;
define( "_AM_FMT_PHOTONOTREADABLE" , "a foto (%s) n�� � pode ser lida.." ) ;
define( "_AM_FMT_THUMBNOTREADABLE" , "o thumbnail (%s) n�� pode ser lido." ) ;
define( "_AM_FMT_NUMBEROFDEADPHOTOS" , "%s de fotos mortas foram encontradas." ) ;
define( "_AM_FMT_NUMBEROFDEADTHUMBS" , "%s de thumbnails devem ser reconstru��os." ) ;
define( "_AM_FMT_NUMBEROFREMOVEDTMPS" , "%s garbage files have been removed." ) ;
define( "_AM_LINK_REDOTHUMBS" , "reconstruir thumbnails" ) ;
define( "_AM_LINK_TABLEMAINTENANCE" , "tabelas de manuten��o" ) ;



// Redo Thumbnail
define( "_AM_H3_FMT_RECORDMAINTENANCE" , "manuten��o de fotos" ) ;

define( "_AM_FMT_CHECKING" , "verificando %s ..." ) ;

define( "_AM_FORM_RECORDMAINTENANCE" , "manuten��o de fotos como refazer thumbnails etc." ) ;

define( "_AM_MB_FAILEDREADING" , "falha na leitura." ) ;
define( "_AM_MB_CREATEDTHUMBS" , "thumbnail criado." ) ;
define( "_AM_MB_BIGTHUMBS" , "falha na cria��o de thumbnail. copiado." ) ;
define( "_AM_MB_SKIPPED" , "n�� verificado." ) ;
define( "_AM_MB_SIZEREPAIRED" , "(campos reparados.)" ) ;
define( "_AM_MB_RECREMOVED" , "registro removido." ) ;
define( "_AM_MB_PHOTONOTEXISTS" , "foto geral n�� existe." ) ;
define( "_AM_MB_PHOTORESIZED" , "foto geral foi redimensionada." ) ;

define( "_AM_TEXT_RECORDFORSTARTING" , "n��ero de registros come��ndo com" ) ;
define( "_AM_TEXT_NUMBERATATIME" , "n��ero de registros processados por vez" ) ;
define( "_AM_LABEL_DESCNUMBERATATIME" , "N��ero muito grande. Pode ultrapassar o tempo limite." ) ;

define( "_AM_RADIO_FORCEREDO" , "for��r cria��o sempre que um thumbnail existir" ) ;
define( "_AM_RADIO_REMOVEREC" , "remove registros n�� linkados" ) ;
define( "_AM_RADIO_RESIZE" , "redimensionar fotos grandes maior que o especificado nas prefer��cias" ) ;

define( "_AM_MB_FINISHED" , "finalizado" ) ;
define( "_AM_LINK_RESTART" , "recome��r" ) ;
define( "_AM_SUBMIT_NEXT" , "pr��imo" ) ;



// Batch Register
define( "_AM_H3_FMT_BATCHREGISTER" , "registro" ) ;


// GroupPerm Global
define( "_AM_ALBM_GROUPPERM_GLOBAL" , "Permiss��s gerais" ) ;
define( "_AM_ALBM_GROUPPERM_GLOBALDESC" , "Configura privil��ios do grupo deste m��ulo" ) ;
define( "_AM_ALBM_GPERMUPDATED" , "Permiss��s foram alteradas com sucesso" ) ;

}

?>
