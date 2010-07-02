<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_AM_LOADED' ) ) {




// Appended by Xoops Language Checker -GIJOE- in 2004-05-17 18:42:55
define('_AM_TH_DATE','Uppdaterad senast');
define('_AM_TH_BATCHUPDATE','Uppdatera markerade foto tillsammans');
define('_AM_OPT_NOCHANGE','- Ingen ändring -');
define('_AM_JS_UPDATECONFIRM','De markerade bilderna kommer att uppdateras. OK?');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-05 15:14:39
define('_AM_H3_FMT_CATEGORIES','Kategori Administration (%s)');
define('_AM_CAT_TH_TITLE','Namn');
define('_AM_CAT_TH_PHOTOS','Bilder');
define('_AM_CAT_TH_OPERATION','Atgärd');
define('_AM_CAT_TH_IMAGE','Banner');
define('_AM_CAT_TH_PARENT','Överordnad kategori');
define('_AM_CAT_TH_IMGURL','Sökväg till Banner');
define('_AM_CAT_MENU_NEW','Skapa en kategori');
define('_AM_CAT_MENU_EDIT','Editera en kategori');
define('_AM_CAT_INSERTED','En kategori har lagts till');
define('_AM_CAT_UPDATED','Kategorin har ändrats');
define('_AM_CAT_BTN_BATCH','Godkänn');
define('_AM_CAT_LINK_MAKETOPCAT','Skapa en ny kategori under Index');
define('_AM_CAT_LINK_ADDPHOTOS','Lägg till en bild i denna kategori');
define('_AM_CAT_LINK_EDIT','Editera denna kategori');
define('_AM_CAT_LINK_MAKESUBCAT','Skapa en ny kategori under denna kategori');
define('_AM_CAT_FMT_NEEDADMISSION','%s bilder som kräver granskning');
define('_AM_CAT_FMT_CATDELCONFIRM','%s kommer att raderas tillsammans med underkategorier, bilder, kommentarer. Är detta OK?');
define('_AM_H3_FMT_ADMISSION','Granska inskickade bilder (%s)');
define('_AM_H3_FMT_PHOTOMANAGER','Foto Administration (%s)');
define('_AM_H3_FMT_IMPORTTO','Importerar bilder från andra moduler till %s');
define('_AM_H3_FMT_EXPORTTO','Exporterar bilder från %s till andra moduler');
define('_AM_FMT_EXPORTTOIMAGEMANAGER','Exporterar till image manager i XOOPS');
define('_AM_FMT_EXPORTIMSRCCAT','Källa');
define('_AM_FMT_EXPORTIMDSTCAT','Destination');
define('_AM_CB_EXPORTRECURSIVELY','med bilder i underkategorierna');
define('_AM_CB_EXPORTTHUMB','Exportera miniatyrer istället för huvudbilden');
define('_AM_MB_EXPORTCONFIRM','Genomför exportering. OK?');
define('_AM_FMT_EXPORTSUCCESS','Ni har exporterat %s bilder');

// Appended by Xoops Language Checker -GIJOE- in 2004-04-07 15:04:25
define('_AM_ALBM_IMPORT','Importerar bilder från andra moduler');
define('_AM_FMT_IMPORTTO','Importera i %s ');
define('_AM_FMT_IMPORTFROMMYALBUMP','Importerar från "%s" myAlbum-P');
define('_AM_FMT_IMPORTFROMIMAGEMANAGER','Importerar från image manager i XOOPS');
define('_AM_CB_IMPORTRECURSIVELY','Importerar inklusive underkategorier');
define('_AM_RADIO_IMPORTCOPY','Kopiera bilder (kommentarer kopieras inte');
define('_AM_RADIO_IMPORTMOVE','Flytta bilder (kommentarer följer med)');
define('_AM_MB_IMPORTCONFIRM','Genomför import?');
define('_AM_FMT_IMPORTSUCCESS','Ni har importerat %s bilder');

define( 'MYALBUM_AM_LOADED' , 1 ) ;

// Index (Top of Admin)
define( "_ALBM_INDEX_BLOCKSADMIN" , "myAlbum-P blocks admin" ) ;

// Module Checker
define( "_AM_H3_FMT_MODULECHECKER" , "myAlbum-P miljökontroll" ) ;

define( "_AM_H4_ENVIRONMENT" , "Kontroll av datormiljön" ) ;
define( "_AM_MB_PHPDIRECTIVE" , "PHP directive" ) ;
define( "_AM_MB_BOTHOK" , "Båda ok" ) ;
define( "_AM_MB_NEEDON" , "Måste vara på" ) ;


define( "_AM_H4_TABLE" , "Tabell Kontroll" ) ;
define( "_AM_MB_PHOTOSTABLE" , "Foto tabell" ) ;
define( "_AM_MB_DESCRIPTIONTABLE" , "Beskrivnings tabell" ) ;
define( "_AM_MB_CATEGORIESTABLE" , "Kategori tabell" ) ;
define( "_AM_MB_VOTEDATATABLE" , "Röstdata tabell" ) ;
define( "_AM_MB_COMMENTSTABLE" , "Kommentar tabell" ) ;
define( "_AM_MB_NUMBEROFPHOTOS" , "Antal Foton" ) ;
define( "_AM_MB_NUMBEROFDESCRIPTIONS" , "Antal Beskrivningar" ) ;
define( "_AM_MB_NUMBEROFCATEGORIES" , "Antal Kategorier" ) ;
define( "_AM_MB_NUMBEROFVOTEDATA" , "Antal Röstdata" ) ;
define( "_AM_MB_NUMBEROFCOMMENTS" , "Antal Kommentarer" ) ;


define( "_AM_H4_CONFIG" , "Konfigurations Kontroll" ) ;
define( "_AM_MB_PIPEFORIMAGES" , "Pipe för bilder" ) ;
define( "_AM_MB_DIRECTORYFORPHOTOS" , "Katalog för foto" ) ;
define( "_AM_MB_DIRECTORYFORTHUMBS" , "Katalog för Miniatyrer" ) ;
define( "_AM_ERR_LASTCHAR" , "FEL: Sista tecknet skall INTE vara '/'" ) ;
define( "_AM_ERR_FIRSTCHAR" , "FEL: Första tecknet SKALL vara '/'" ) ;
define( "_AM_ERR_PERMISSION" , "FEL: Skapa (och chmod 777) detta katalog först via ftp eller shell-access." ) ;
define( "_AM_ERR_NOTDIRECTORY" , "FEL: Detta är inte en katalog." ) ;
define( "_AM_ERR_READORWRITE" , "FEL: Denna katalog är inte skriv eller läsbar. Ni måste ändra rättigheterna på katalogen till 777." ) ;
define( "_AM_ERR_SAMEDIR" , "FEL: Foto sökvägen skall inte vara samma som till miniatyrer" ) ;
define( "_AM_LNK_CHECKGD2" , "Kontrollera att 'GD2' fungerar korrekt under din GD levererad tillsammans med PHP" ) ;
define( "_AM_MB_CHECKGD2" , "Om den länkade sidan inte visas korrekt kan Ni nog inte använda GD i truecolor mode." ) ;
define( "_AM_MB_GD2SUCCESS" , "Det lyckades!<br />Kanske kan Ni använda GD2 (truecolor) i denna miljön." ) ;


define( "_AM_H4_PHOTOLINK" , "Foto & Miniatyr länk kontroll" ) ;
define( "_AM_MB_NOWCHECKING" , "Kontrollerar nu." ) ;
define( "_AM_FMT_PHOTONOTREADABLE" , "ett foto (%s) är inte läsbart." ) ;
define( "_AM_FMT_THUMBNOTREADABLE" , "en miniatyrbild (%s) är inte läsbar." ) ;
define( "_AM_FMT_NUMBEROFDEADPHOTOS" , "%s felaktiga foto filer har hittats." ) ;
define( "_AM_FMT_NUMBEROFDEADTHUMBS" , "%s miniatyrbilder bör göras om." ) ;
define( "_AM_FMT_NUMBEROFREMOVEDTMPS" , "%s garbage files have been removed." ) ;
define( "_AM_LINK_REDOTHUMBS" , "gör om miniatyrbilder" ) ;
define( "_AM_LINK_TABLEMAINTENANCE" , "underhåll tabeller" ) ;



// Redo Thumbnail
define( "_AM_H3_FMT_RECORDMAINTENANCE" , "myAlbum-P foto underhåll" ) ;

define( "_AM_FMT_CHECKING" , "kontrollerar %s ..." ) ;

define( "_AM_FORM_RECORDMAINTENANCE" , "Underhåll av foto t.ex. göra om miniatyrer osv." ) ;

define( "_AM_MB_FAILEDREADING" , "läsning misslyckades." ) ;
define( "_AM_MB_CREATEDTHUMBS" , "skapade en miniatyrbild." ) ;
define( "_AM_MB_BIGTHUMBS" , "misslyckades med att göra en miniatyrbilds kopia." ) ;
define( "_AM_MB_SKIPPED" , "hoppade över." ) ;
define( "_AM_MB_SIZEREPAIRED" , "(lagade storleken i denna record.)" ) ;
define( "_AM_MB_RECREMOVED" , "detta record har tagits bort." ) ;
define( "_AM_MB_PHOTONOTEXISTS" , "foto finns inte." ) ;
define( "_AM_MB_PHOTORESIZED" , "fotot har fått storleken ändrad." ) ;

define( "_AM_TEXT_RECORDFORSTARTING" , "Record's nummer startar med" ) ;
define( "_AM_TEXT_NUMBERATATIME" , "Antal records behandlade på en gång" ) ;
define( "_AM_LABEL_DESCNUMBERATATIME" , "För stort antal kan leda till server time out." ) ;

define( "_AM_RADIO_FORCEREDO" , "Tvinga nyskapande även om miniatyrbilder finns" ) ;
define( "_AM_RADIO_REMOVEREC" , "Ta bort records som inte är länkade till ett foto" ) ;
define( "_AM_RADIO_RESIZE" , "Förminska foto som är större än definierat pixelvärde i inställningarna" ) ;

define( "_AM_MB_FINISHED" , "färdig" ) ;
define( "_AM_LINK_RESTART" , "starta om" ) ;
define( "_AM_SUBMIT_NEXT" , "nästa" ) ;



// Batch Register
define( "_AM_H3_FMT_BATCHREGISTER" , "myAlbum-P batch register" ) ;


?><?php
// Appended by Xoops Language Checker -GIJOE- in 2004-01-27 15:37:03
define('_AM_TH_SUBMITTER','Inlämnare');
define('_AM_TH_TITLE','Titel');
define('_AM_TH_DESCRIPTION','Beskrivning');
define('_AM_TH_CATEGORIES','Kategori');
define('_AM_ALBM_GROUPPERM_GLOBAL','Globala Rättigheter');
define('_AM_ALBM_GROUPPERM_GLOBALDESC','Konfigurera gruppers rättigheter i hela denna modulen');
define('_AM_ALBM_GPERMUPDATED','Ändringen av rättigheterna lyckades');

}

?>
