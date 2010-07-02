<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_AM_LOADED' ) ) {





// Appended by Xoops Language Checker -GIJOE- in 2007-08-24 18:18:02
define('_MD_A_MYMENU_MYTPLSADMIN','Templates');
define('_MD_A_MYMENU_MYBLOCKSADMIN','Blocks/Permissions');
define('_MD_A_MYMENU_MYPREFERENCES','Preferences');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-17 18:42:55
define('_AM_TH_DATE','Uppdaterad senast');
define('_AM_TH_BATCHUPDATE','Uppdatera markerade foto tillsammans');
define('_AM_OPT_NOCHANGE','- Ingen �ndring -');
define('_AM_JS_UPDATECONFIRM','De markerade bilderna kommer att uppdateras. OK?');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-05 15:14:39
define('_AM_H3_FMT_CATEGORIES','Kategori Administration (%s)');
define('_AM_CAT_TH_TITLE','Namn');
define('_AM_CAT_TH_PHOTOS','Bilder');
define('_AM_CAT_TH_OPERATION','Atg�rd');
define('_AM_CAT_TH_IMAGE','Banner');
define('_AM_CAT_TH_PARENT','�verordnad kategori');
define('_AM_CAT_TH_IMGURL','S�kv�g till Banner');
define('_AM_CAT_MENU_NEW','Skapa en kategori');
define('_AM_CAT_MENU_EDIT','Editera en kategori');
define('_AM_CAT_INSERTED','En kategori har lagts till');
define('_AM_CAT_UPDATED','Kategorin har �ndrats');
define('_AM_CAT_BTN_BATCH','Godk�nn');
define('_AM_CAT_LINK_MAKETOPCAT','Skapa en ny kategori under Index');
define('_AM_CAT_LINK_ADDPHOTOS','L�gg till en bild i denna kategori');
define('_AM_CAT_LINK_EDIT','Editera denna kategori');
define('_AM_CAT_LINK_MAKESUBCAT','Skapa en ny kategori under denna kategori');
define('_AM_CAT_FMT_NEEDADMISSION','%s bilder som kr�ver granskning');
define('_AM_CAT_FMT_CATDELCONFIRM','%s kommer att raderas tillsammans med underkategorier, bilder, kommentarer. �r detta OK?');
define('_AM_H3_FMT_ADMISSION','Granska inskickade bilder (%s)');
define('_AM_H3_FMT_PHOTOMANAGER','Foto Administration (%s)');
define('_AM_H3_FMT_IMPORTTO','Importerar bilder fr�n andra moduler till %s');
define('_AM_H3_FMT_EXPORTTO','Exporterar bilder fr�n %s till andra moduler');
define('_AM_FMT_EXPORTTOIMAGEMANAGER','Exporterar till image manager i XOOPS');
define('_AM_FMT_EXPORTIMSRCCAT','K�lla');
define('_AM_FMT_EXPORTIMDSTCAT','Destination');
define('_AM_CB_EXPORTRECURSIVELY','med bilder i underkategorierna');
define('_AM_CB_EXPORTTHUMB','Exportera miniatyrer ist�llet f�r huvudbilden');
define('_AM_MB_EXPORTCONFIRM','Genomf�r exportering. OK?');
define('_AM_FMT_EXPORTSUCCESS','Ni har exporterat %s bilder');

// Appended by Xoops Language Checker -GIJOE- in 2004-04-07 15:04:25
define('_AM_ALBM_IMPORT','Importerar bilder fr�n andra moduler');
define('_AM_FMT_IMPORTTO','Importera i %s ');
define('_AM_FMT_IMPORTFROMMYALBUMP','Importerar fr�n "%s" myAlbum-P');
define('_AM_FMT_IMPORTFROMIMAGEMANAGER','Importerar fr�n image manager i XOOPS');
define('_AM_CB_IMPORTRECURSIVELY','Importerar inklusive underkategorier');
define('_AM_RADIO_IMPORTCOPY','Kopiera bilder (kommentarer kopieras inte');
define('_AM_RADIO_IMPORTMOVE','Flytta bilder (kommentarer f�ljer med)');
define('_AM_MB_IMPORTCONFIRM','Genomf�r import?');
define('_AM_FMT_IMPORTSUCCESS','Ni har importerat %s bilder');

define( 'MYALBUM_AM_LOADED' , 1 ) ;

// Index (Top of Admin)
define( "_ALBM_INDEX_BLOCKSADMIN" , "myAlbum-P blocks admin" ) ;

// Module Checker
define( "_AM_H3_FMT_MODULECHECKER" , "myAlbum-P milj�kontroll" ) ;

define( "_AM_H4_ENVIRONMENT" , "Kontroll av datormilj�n" ) ;
define( "_AM_MB_PHPDIRECTIVE" , "PHP directive" ) ;
define( "_AM_MB_BOTHOK" , "B�da ok" ) ;
define( "_AM_MB_NEEDON" , "M�ste vara p�" ) ;


define( "_AM_H4_TABLE" , "Tabell Kontroll" ) ;
define( "_AM_MB_PHOTOSTABLE" , "Foto tabell" ) ;
define( "_AM_MB_DESCRIPTIONTABLE" , "Beskrivnings tabell" ) ;
define( "_AM_MB_CATEGORIESTABLE" , "Kategori tabell" ) ;
define( "_AM_MB_VOTEDATATABLE" , "R�stdata tabell" ) ;
define( "_AM_MB_COMMENTSTABLE" , "Kommentar tabell" ) ;
define( "_AM_MB_NUMBEROFPHOTOS" , "Antal Foton" ) ;
define( "_AM_MB_NUMBEROFDESCRIPTIONS" , "Antal Beskrivningar" ) ;
define( "_AM_MB_NUMBEROFCATEGORIES" , "Antal Kategorier" ) ;
define( "_AM_MB_NUMBEROFVOTEDATA" , "Antal R�stdata" ) ;
define( "_AM_MB_NUMBEROFCOMMENTS" , "Antal Kommentarer" ) ;


define( "_AM_H4_CONFIG" , "Konfigurations Kontroll" ) ;
define( "_AM_MB_PIPEFORIMAGES" , "Pipe f�r bilder" ) ;
define( "_AM_MB_DIRECTORYFORPHOTOS" , "Katalog f�r foto" ) ;
define( "_AM_MB_DIRECTORYFORTHUMBS" , "Katalog f�r Miniatyrer" ) ;
define( "_AM_ERR_LASTCHAR" , "FEL: Sista tecknet skall INTE vara '/'" ) ;
define( "_AM_ERR_FIRSTCHAR" , "FEL: F�rsta tecknet SKALL vara '/'" ) ;
define( "_AM_ERR_PERMISSION" , "FEL: Skapa (och chmod 777) detta katalog f�rst via ftp eller shell-access." ) ;
define( "_AM_ERR_NOTDIRECTORY" , "FEL: Detta �r inte en katalog." ) ;
define( "_AM_ERR_READORWRITE" , "FEL: Denna katalog �r inte skriv eller l�sbar. Ni m�ste �ndra r�ttigheterna p� katalogen till 777." ) ;
define( "_AM_ERR_SAMEDIR" , "FEL: Foto s�kv�gen skall inte vara samma som till miniatyrer" ) ;
define( "_AM_LNK_CHECKGD2" , "Kontrollera att 'GD2' fungerar korrekt under din GD levererad tillsammans med PHP" ) ;
define( "_AM_MB_CHECKGD2" , "Om den l�nkade sidan inte visas korrekt kan Ni nog inte anv�nda GD i truecolor mode." ) ;
define( "_AM_MB_GD2SUCCESS" , "Det lyckades!<br />Kanske kan Ni anv�nda GD2 (truecolor) i denna milj�n." ) ;


define( "_AM_H4_PHOTOLINK" , "Foto & Miniatyr l�nk kontroll" ) ;
define( "_AM_MB_NOWCHECKING" , "Kontrollerar nu." ) ;
define( "_AM_FMT_PHOTONOTREADABLE" , "ett foto (%s) �r inte l�sbart." ) ;
define( "_AM_FMT_THUMBNOTREADABLE" , "en miniatyrbild (%s) �r inte l�sbar." ) ;
define( "_AM_FMT_NUMBEROFDEADPHOTOS" , "%s felaktiga foto filer har hittats." ) ;
define( "_AM_FMT_NUMBEROFDEADTHUMBS" , "%s miniatyrbilder b�r g�ras om." ) ;
define( "_AM_FMT_NUMBEROFREMOVEDTMPS" , "%s garbage files have been removed." ) ;
define( "_AM_LINK_REDOTHUMBS" , "g�r om miniatyrbilder" ) ;
define( "_AM_LINK_TABLEMAINTENANCE" , "underh�ll tabeller" ) ;



// Redo Thumbnail
define( "_AM_H3_FMT_RECORDMAINTENANCE" , "myAlbum-P foto underh�ll" ) ;

define( "_AM_FMT_CHECKING" , "kontrollerar %s ..." ) ;

define( "_AM_FORM_RECORDMAINTENANCE" , "Underh�ll av foto t.ex. g�ra om miniatyrer osv." ) ;

define( "_AM_MB_FAILEDREADING" , "l�sning misslyckades." ) ;
define( "_AM_MB_CREATEDTHUMBS" , "skapade en miniatyrbild." ) ;
define( "_AM_MB_BIGTHUMBS" , "misslyckades med att g�ra en miniatyrbilds kopia." ) ;
define( "_AM_MB_SKIPPED" , "hoppade �ver." ) ;
define( "_AM_MB_SIZEREPAIRED" , "(lagade storleken i denna record.)" ) ;
define( "_AM_MB_RECREMOVED" , "detta record har tagits bort." ) ;
define( "_AM_MB_PHOTONOTEXISTS" , "foto finns inte." ) ;
define( "_AM_MB_PHOTORESIZED" , "fotot har f�tt storleken �ndrad." ) ;

define( "_AM_TEXT_RECORDFORSTARTING" , "Record's nummer startar med" ) ;
define( "_AM_TEXT_NUMBERATATIME" , "Antal records behandlade p� en g�ng" ) ;
define( "_AM_LABEL_DESCNUMBERATATIME" , "F�r stort antal kan leda till server time out." ) ;

define( "_AM_RADIO_FORCEREDO" , "Tvinga nyskapande �ven om miniatyrbilder finns" ) ;
define( "_AM_RADIO_REMOVEREC" , "Ta bort records som inte �r l�nkade till ett foto" ) ;
define( "_AM_RADIO_RESIZE" , "F�rminska foto som �r st�rre �n definierat pixelv�rde i inst�llningarna" ) ;

define( "_AM_MB_FINISHED" , "f�rdig" ) ;
define( "_AM_LINK_RESTART" , "starta om" ) ;
define( "_AM_SUBMIT_NEXT" , "n�sta" ) ;



// Batch Register
define( "_AM_H3_FMT_BATCHREGISTER" , "myAlbum-P batch register" ) ;


?><?php
// Appended by Xoops Language Checker -GIJOE- in 2004-01-27 15:37:03
define('_AM_TH_SUBMITTER','Inl�mnare');
define('_AM_TH_TITLE','Titel');
define('_AM_TH_DESCRIPTION','Beskrivning');
define('_AM_TH_CATEGORIES','Kategori');
define('_AM_ALBM_GROUPPERM_GLOBAL','Globala R�ttigheter');
define('_AM_ALBM_GROUPPERM_GLOBALDESC','Konfigurera gruppers r�ttigheter i hela denna modulen');
define('_AM_ALBM_GPERMUPDATED','�ndringen av r�ttigheterna lyckades');

}

?>
