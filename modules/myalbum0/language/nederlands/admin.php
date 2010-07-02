<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_AM_LOADED' ) ) {




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
define( "_ALBM_INDEX_BLOCKSADMIN" , "myAlbum-P blocks admin" ) ;

// Admission
define( "_AM_TH_SUBMITTER" , "Toegevoegd door" ) ;
define( "_AM_TH_TITLE" , "Titel" ) ;
define( "_AM_TH_DESCRIPTION" , "Beschrijving" ) ;
define( "_AM_TH_CATEGORIES" , "Categorie" ) ;

// Module Checker
define( "_AM_H3_FMT_MODULECHECKER" , "myAlbum-P checker" ) ;
define( "_AM_H4_ENVIRONMENT" , "Controle omgeving" ) ;
define( "_AM_MB_PHPDIRECTIVE" , "PHP richtlijn" ) ;
define( "_AM_MB_BOTHOK" , "beide ok" ) ;
define( "_AM_MB_NEEDON" , "moet aan" ) ;


define( "_AM_H4_TABLE" , "Controle van tabellen" ) ;
define( "_AM_MB_PHOTOSTABLE" , "Foto's tabel" ) ;
define( "_AM_MB_DESCRIPTIONTABLE" , "Beschrijvingen tabel" ) ;
define( "_AM_MB_CATEGORIESTABLE" , "Categoriën tabel" ) ;
define( "_AM_MB_VOTEDATATABLE" , "Waarderings-data tabel" ) ;
define( "_AM_MB_COMMENTSTABLE" , "Commentaar tabel" ) ;
define( "_AM_MB_NUMBEROFPHOTOS" , "Aantal foto's" ) ;
define( "_AM_MB_NUMBEROFDESCRIPTIONS" , "Aantal beschrijvingen" ) ;
define( "_AM_MB_NUMBEROFCATEGORIES" , "Aantal categoriën" ) ;
define( "_AM_MB_NUMBEROFVOTEDATA" , "Aantal waarderingen" ) ;
define( "_AM_MB_NUMBEROFCOMMENTS" , "Aantal commentaren" ) ;


define( "_AM_H4_CONFIG" , "Configuratie-controle" ) ;
define( "_AM_MB_PIPEFORIMAGES" , "Pipe voor afbeeldingen" ) ;
define( "_AM_MB_DIRECTORYFORPHOTOS" , "Foto's directory" ) ;
define( "_AM_MB_DIRECTORYFORTHUMBS" , "Thumbnail directory" ) ;
define( "_AM_ERR_LASTCHAR" , "Fout: het laatste teken mag geen '/' zijn" ) ;
define( "_AM_ERR_FIRSTCHAR" , "Fout: het eerste teken moet een '/' zijn" ) ;
define( "_AM_ERR_PERMISSION" , "Fout: maak eerst deze directory aan via FTP of shell en chmod deze daarna 777." ) ;
define( "_AM_ERR_NOTDIRECTORY" , "Fout: dit is geen directory." ) ;
define( "_AM_ERR_READORWRITE" , "Fout: geen lees- en schrijfpermissies op deze directory. Verander de permissies voor de directory in 777." ) ;
define( "_AM_ERR_SAMEDIR" , "Fout: het pad voor foto's en thumbnails mag niet hetzelfde zijn" ) ;
define( "_AM_LNK_CHECKGD2" , "Check of 'GD2' juist werkt onder de GD library die gebundeld is met PHP" ) ;
define( "_AM_MB_CHECKGD2" , "Als de link hiervandaan niet juist wordt weergegeven, werkt GD in truecolor mode niet." ) ;
define( "_AM_MB_GD2SUCCESS" , "Succes!<br />Misschien kunt u GD2 (truecolor) gebruiken." ) ;


define( "_AM_H4_PHOTOLINK" , "Foto's & thumbnails link controle" ) ;
define( "_AM_MB_NOWCHECKING" , "Controleren ." ) ;
define( "_AM_FMT_PHOTONOTREADABLE" , "een foto (%s) is niet leesbaar." ) ;
define( "_AM_FMT_THUMBNOTREADABLE" , "een thumbnail (%s) is niet leesbaar." ) ;
define( "_AM_FMT_NUMBEROFDEADPHOTOS" , "Er zijn %s 'defekte' fotobestanden gevonden." ) ;
define( "_AM_FMT_NUMBEROFDEADTHUMBS" , "Er moeten %s thumbnails hersteld worden." ) ;
define( "_AM_FMT_NUMBEROFREMOVEDTMPS" , "%s garbage files have been removed." ) ;
define( "_AM_LINK_REDOTHUMBS" , "thumbnails herstellen" ) ;
define( "_AM_LINK_TABLEMAINTENANCE" , "tabellen onderhouden" ) ;



// Redo Thumbnail
define( "_AM_H3_FMT_RECORDMAINTENANCE" , "myAlbum-P foto onderhoud" ) ;

define( "_AM_FMT_CHECKING" , "controleren %s ..." ) ;

define( "_AM_FORM_RECORDMAINTENANCE" , "onderhoud van foto's (zoals herstellen thumbnails etc.)" ) ;

define( "_AM_MB_FAILEDREADING" , "lezen mislukt." ) ;
define( "_AM_MB_CREATEDTHUMBS" , "thumbnail gemaakt." ) ;
define( "_AM_MB_BIGTHUMBS" , "thumbnail maken mislukt. gekopiëerd." ) ;
define( "_AM_MB_SKIPPED" , "overgeslagen." ) ;
define( "_AM_MB_SIZEREPAIRED" , "(afmetingen-gegevens in record hersteld.)" ) ;
define( "_AM_MB_RECREMOVED" , "dit record is verwijderd." ) ;
define( "_AM_MB_PHOTONOTEXISTS" , "foto bestaat niet." ) ;
define( "_AM_MB_PHOTORESIZED" , "foto is geschaald." ) ;

define( "_AM_TEXT_RECORDFORSTARTING" , "recordnummer start met" ) ;
define( "_AM_TEXT_NUMBERATATIME" , "aantal ineens verwerkte records" ) ;
define( "_AM_LABEL_DESCNUMBERATATIME" , "Een te groot aantal kan tot een server-timeout leiden." ) ;

define( "_AM_RADIO_FORCEREDO" , "thumbnail verplicht herstellen" ) ;
define( "_AM_RADIO_REMOVEREC" , "verwijder records zonder foto" ) ;
define( "_AM_RADIO_RESIZE" , "schaal grotere foto's dan is toegestaan in uw huidige instellingen" ) ;

define( "_AM_MB_FINISHED" , "voltooid" ) ;
define( "_AM_LINK_RESTART" , "herstart" ) ;
define( "_AM_SUBMIT_NEXT" , "volgende" ) ;



// Batch Register
define( "_AM_H3_FMT_BATCHREGISTER" , "myAlbum-P batch registratie" ) ;


// GroupPerm Global
define( "_AM_ALBM_GROUPPERM_GLOBAL" , "Globale permissies" ) ;
define( "_AM_ALBM_GROUPPERM_GLOBALDESC" , "Configureer groups-permissies voor deze gehele module" ) ;
define( "_AM_ALBM_GPERMUPDATED" , "Permissies zijn succesvol gewijzigd" ) ;

}

?>
