<?php
// Module Info

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MI_LOADED' ) ) {







// Appended by Xoops Language Checker -GIJOE- in 2006-05-26 06:00:52
define('_ALBM_MYALBUM_ADMENU_MYTPLSADMIN','Templates');

// Appended by Xoops Language Checker -GIJOE- in 2004-10-04 16:06:33
define('_ALBM_CFG_DEFAULTORDER','Default order in category\'s view');

// Appended by Xoops Language Checker -GIJOE- in 2004-06-24 17:58:59
define('_ALBM_CFG_USESITEIMG','Anv�nd [siteimg] vid ImageManager Integration');
define('_ALBM_CFG_DESCUSESITEIMG','Integrated Image Manager input [siteimg] ist�llet f�r [img].<br />Ni m�ste modifiera module.textsanitizer.php eller varje modul f�r att aktivera [siteimg] taggen.');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-19 13:56:06
define('_ALBM_CFG_MIDDLEPIXEL','Max bild storlek vid visning av bilder en och en.');
define('_ALBM_CFG_DESCMIDDLEPIXEL','Specificera (breddxh�jd) t.ex. 480x480');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-17 18:42:55
define('_ALBM_CFG_DESCPERPAGE','Ange valbara nummer separerade med \'|\' t.ex.) 10|20|50|100');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-05 15:14:38
define('_ALBM_CFG_ALLOWNOIMAGE','Till�ts inskickade utan bilder');
define('_ALBM_CFG_ALLOWEDEXTS','Filtyper som kan laddas upp');
define('_ALBM_CFG_DESCALLOWEDEXTS','Ange fil�ndelser med avgr�nsare \'|\'. (t.ex. \'jpg|jpeg|gif|png\').<br />Alla tecken m�ste vara skrivna i sm� bokst�ver. Ange inga punkter eller mellanrum');
define('_ALBM_CFG_ALLOWEDMIME','MIME Typer som kan laddas upp');
define('_ALBM_CFG_DESCALLOWEDMIME','Ange MIME Typer med avgr�nsare \'|\'. (t.ex. \'image/gif|image/jpeg|image/png\')<br />Om Ni inte vill att filen skall kontrolleras mot MIME Typ, l�mna f�ltet blankt.');
define('_ALBM_MYALBUM_ADMENU_IMPORT','Importera Bilder');
define('_ALBM_MYALBUM_ADMENU_EXPORT','Exportera Bilder');
define('_ALBM_MYALBUM_ADMENU_MYBLOCKSADMIN','Block&Grupp Administration');

define( 'MYALBUM_MI_LOADED' , 1 ) ;

// The name of this module
define("_ALBM_MYALBUM_NAME","MyAlbum");

// A brief description of this module
define("_ALBM_MYALBUM_DESC","Skapar ett fotoalbum d�r anv�ndare kan s�ka/l�gga till/bed�mma olika foto.");

// Names of blocks for this module (Not all module has blocks)
define("_ALBM_BNAME_RECENT","Nyinkommna Foto");
define("_ALBM_BNAME_HITS","Topplacerade Foto");
define("_ALBM_BNAME_RANDOM","Slumpvalt Foto");
define("_ALBM_BNAME_RECENT_P","Nyinkommna Foto med Miniatyrer");
define("_ALBM_BNAME_HITS_P","Topplacerade Foto med Miniatyrer");

// Config Items
define( "_ALBM_CFG_PHOTOSPATH" , "S�kv�g till Fotona" ) ;
define( "_ALBM_CFG_DESCPHOTOSPATH" , "S�kv�g till katalogen som XOOPS �r installerad i.<br />(F�rsta tecknet m�ste vara '/'. Sista tecknet skall INTE vara  '/'.)<br />Denna katalogs r�ttigheter �r 777 eller 707 i unix." ) ;
define( "_ALBM_CFG_THUMBSPATH" , "S�kv�g till Miniatyrbilderna" ) ;
define( "_ALBM_CFG_DESCTHUMBSPATH" , "Samma som 'S�kv�g till Fotona'." ) ;
//define( "_ALBM_CFG_USEIMAGICK" , "Anv�nd ImageMagick f�r behandling av bilder" ) ;
//define( "_ALBM_CFG_DESCIMAGICK" , "Not use ImageMagick cause Not work resize or rotate the main photo, and make thumbnails by GD.<br />Det �r b�ttre att anv�nda ImageMagick om du kan." ) ;
define( "_ALBM_CFG_IMAGINGPIPE" , "Paket f�r bildbehandling" ) ;
define( "_ALBM_CFG_DESCIMAGINGPIPE" , "N�stan alla PHP installationer kan anv�nda GD. Men GD �r funktionellt underl�gsen de andra tv� paketen.<br />Det �r b�ttre att anv�nda ImageMagick eller NetPBM om du kan." ) ;
define( "_ALBM_CFG_FORCEGD2" , "Tvinga GD2 konvertering" ) ;
define( "_ALBM_CFG_DESCFORCEGD2" , "�ven om GD �r paketerad tillsammans med PHP och den anv�nder GD2(truecolor) konvertering.<br />Vissa PHP konfigurationer misslyckas att skapa miniatyrbilder i GD2<br />Denna inst�llning g�ller endast om man anv�nder GD" ) ;
define( "_ALBM_CFG_IMAGICKPATH" , "S�kv�g till ImageMagick" ) ;
define( "_ALBM_CFG_DESCIMAGICKPATH" , "Fullst�ndig s�kv�g till 'convert'<br />(Sista tecknet skall INTE vara '/'.)<br />Denna inst�llning g�ller endast om man anv�nder ImageMagick" ) ;
define( "_ALBM_CFG_NETPBMPATH" , "S�kv�g till NetPBM" ) ;
define( "_ALBM_CFG_DESCNETPBMPATH" , "Fullst�ndig s�kv�g till 'pnmscale' mm.<br />(Sista tecknet skall INTE vara '/'.)<br />Denna inst�llning g�ller endast om man anv�nder NetPBM" ) ;
define( "_ALBM_CFG_POPULAR" , "Tr�ffar f�r att bli Popul�r" ) ;
define( "_ALBM_CFG_NEWDAYS" , "Dagar mellan visning av iconer f�r 'new'&'update'" ) ;
define( "_ALBM_CFG_NEWPHOTOS" , "Antal Foto som Nya p� Top Page" ) ;
define( "_ALBM_CFG_PERPAGE" , "Visade Foto per sida" ) ;
define( "_ALBM_CFG_MAKETHUMB" , "G�r Miniatyr bild" ) ;
define( "_ALBM_CFG_DESCMAKETHUMB" , "N�r Ni �ndrar 'Nej' till 'Ja', �r det l�mpligt att 'G�ra om Miniatyrer'." ) ;
//define( "_ALBM_CFG_THUMBWIDTH" , "Bredd p� Miniatyrbild" ) ;
//define( "_ALBM_CFG_DESCTHUMBWIDTH" , "H�jden p� Miniatyrbilden avg�rs automatiskt utifr�n bredden." ) ;
define( "_ALBM_CFG_THUMBSIZE" , "Storlek p� Miniatyrer (pixel)" ) ;
define( "_ALBM_CFG_THUMBRULE" , "Ber�kningsregel f�r att g�ra miniatyrer" ) ;
define( "_ALBM_CFG_WIDTH" , "Max Foto bredd" ) ;
define( "_ALBM_CFG_DESCWIDTH" , "Detta inneb�r att fotots bredd kommer att f�r�ndras.<br />Om du anv�nder GD utan truecolor, inneb�r detta begr�nsning av bredden." ) ;
define( "_ALBM_CFG_HEIGHT" , "Max foto h�jd" ) ;
define( "_ALBM_CFG_DESCHEIGHT" , "Samma som 'Max foto bredd'." ) ;
define( "_ALBM_CFG_FSIZE" , "Max filstorlek" ) ;
define( "_ALBM_CFG_DESCFSIZE" , "Begr�nsning av storleken p� den uppladdade filen." ) ;
define( "_ALBM_CFG_NEEDADMIT" , "Beh�ver godk�nnande f�r nytt foto" ) ;
define( "_ALBM_CFG_ADDPOSTS" , "Det nummer som l�ggs till 'User's posts' vid publicering av ett foto." ) ;
define( "_ALBM_CFG_DESCADDPOSTS" , "Normalt, 0 eller 1. Mindre �r 0 betyder 0" ) ;

define( "_ALBM_CFG_CATONSUBMENU" , "Registrera Topp kategorier i undermeny" ) ;
define( "_ALBM_CFG_NAMEORUNAME" , "Publicistens namn visas" ) ;
define( "_ALBM_CFG_DESCNAMEORUNAME" , "V�lj vilket 'namn' som visas" ) ;
define( "_ALBM_OPT_USENAME" , "Riktigt Namn" ) ;
define( "_ALBM_OPT_USEUNAME" , "Alias Namn" ) ;

define( "_ALBUM_OPT_CALCFROMWIDTH" , "Bredd:specificerad  h�jd:automatisk" ) ;
define( "_ALBUM_OPT_CALCFROMHEIGHT" , "Bredd:automatisk  bredd:specificerad" ) ;
define( "_ALBUM_OPT_CALCWHINSIDEBOX" , "ange storlek i specificerad ruta" ) ;

// Sub menu titles
define("_ALBM_TEXT_SMNAME1","L�gg till");
define("_ALBM_TEXT_SMNAME2","Popul�ra");
define("_ALBM_TEXT_SMNAME3","Topplacerade");
define("_ALBM_TEXT_SMNAME4","Mina Foto");

// Names of admin menu items
define("_ALBM_MYALBUM_ADMENU0","Inskickade foto");
define("_ALBM_MYALBUM_ADMENU1","Foto Underh�ll");
define("_ALBM_MYALBUM_ADMENU2","L�gg till/Editera Kategorier");
define("_ALBM_MYALBUM_ADMENU3","Kontrollera Konf&Milj�");
define("_ALBM_MYALBUM_ADMENU4","Batch Registrering");
define("_ALBM_MYALBUM_ADMENU5","G�r om Miniatyrer");

?><?php
// Appended by Xoops Language Checker -GIJOE- in 2004-01-27 15:37:03
define('_ALBM_CFG_VIEWCATTYPE','Typ av vy i Kategorier');
define('_ALBM_CFG_COLSOFTABLEVIEW','Antal kolumner i tabell vyn');
define('_ALBM_OPT_VIEWLIST','List Vy');
define('_ALBM_OPT_VIEWTABLE','Tabell Vy');
define('_ALBM_MYALBUM_ADMENU_GPERM','Globala R�ttigheter');
define('_MI_MYALBUM_GLOBAL_NOTIFY','Globala');
define('_MI_MYALBUM_GLOBAL_NOTIFYDSC','Globala underr�ttelseval r�rande myAlbum-P');
define('_MI_MYALBUM_CATEGORY_NOTIFY','Kategori');
define('_MI_MYALBUM_CATEGORY_NOTIFYDSC','Underr�ttelseval som g�ller f�r denna fotokategori');
define('_MI_MYALBUM_PHOTO_NOTIFY','Foto');
define('_MI_MYALBUM_PHOTO_NOTIFYDSC','Underr�ttelseval som g�ller f�r detta foto');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFY','Nytt Foto');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYCAP','Underr�tta mig n�r n�got nytt foto har lagts till');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYDSC','Mottag underr�ttelse n�r n�got nytt foto har lagts till');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYSBJ','[{X_SITENAME}] {X_MODULE}: Automatisk underr�ttelse : Nytt foto');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFY','Nytt Foto');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYCAP','Underr�tta mig n�r n�got nytt foto har lagts till i denna kategori');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYDSC','Mottag underr�ttelse n�r n�got nytt foto har lagts till i denna kategori');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYSBJ','[{X_SITENAME}] {X_MODULE}: Automatisk underr�ttelse : Nytt foto');

}

?>
