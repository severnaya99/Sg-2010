<?php
// Module Info

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MI_LOADED' ) ) {






// Appended by Xoops Language Checker -GIJOE- in 2004-10-04 16:06:33
define('_ALBM_CFG_DEFAULTORDER','Default order in category\'s view');

// Appended by Xoops Language Checker -GIJOE- in 2004-06-24 17:59:00
define('_ALBM_CFG_USESITEIMG','Use [siteimg] in ImageManager Integration');
define('_ALBM_CFG_DESCUSESITEIMG','The Integrated Image Manager input [siteimg] instead of [img].<br />You have to hack module.textsanitizer.php or each modules to enable tag of [siteimg]');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-19 13:56:06
define('_ALBM_CFG_MIDDLEPIXEL','Max image size in single view');
define('_ALBM_CFG_DESCMIDDLEPIXEL','Specify (width)x(height)<br />eg) 480x480');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-17 18:42:56
define('_ALBM_CFG_DESCPERPAGE','Input selectable numbers separated with \'|\'<br />eg) 10|20|50|100');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-05 15:14:39
define('_ALBM_CFG_ALLOWNOIMAGE','Allows a sumbit without images');
define('_ALBM_CFG_ALLOWEDEXTS','File extensions can be uploaded');
define('_ALBM_CFG_DESCALLOWEDEXTS','Input extensions with separator \'|\'. (eg \'jpg|jpeg|gif|png\') .<br />All character must be small. Don\'t insert periods or spaces');
define('_ALBM_CFG_ALLOWEDMIME','MIME Types can be uploaded');
define('_ALBM_CFG_DESCALLOWEDMIME','Input MIME Types with separator \'|\'. (eg \'image/gif|image/jpeg|image/png\')<br />If you want to be checked by MIME Type, be blank here');
define('_ALBM_MYALBUM_ADMENU_IMPORT','Import Images');
define('_ALBM_MYALBUM_ADMENU_EXPORT','Export Images');
define('_ALBM_MYALBUM_ADMENU_MYBLOCKSADMIN','Blocks&Groups Admin');

define( 'MYALBUM_MI_LOADED' , 1 ) ;

// The name of this module
define("_ALBM_MYALBUM_NAME","Fotoalbum");

// A brief description of this module
define("_ALBM_MYALBUM_DESC","Maakt een Foto's sectie waar bezoekers foto's kunnen zoeken/toevoegen/waarderen.");

// Names of blocks for this module (Not all module has blocks)
define("_ALBM_BNAME_RECENT","Recente foto's");
define("_ALBM_BNAME_HITS","Top foto's");
define("_ALBM_BNAME_RANDOM","Willekeurige foto");
define("_ALBM_BNAME_RECENT_P","Recente foto's met thumbnails");
define("_ALBM_BNAME_HITS_P","Top foto's met thumbnails");

// Config Items
define( "_ALBM_CFG_PHOTOSPATH" , "Pad naar de foto's" ) ;
define( "_ALBM_CFG_DESCPHOTOSPATH" , "Pad vanuit de directory waar XOOPS geïnstalleerd is.<br />(Het eerste teken moet een '/' zijn. Het laatste teken mag geen '/' zijn.)<br />De permissies van deze directory zijn 777 of 707 in unix." ) ;
define( "_ALBM_CFG_THUMBSPATH" , "Pad naar de thumbnails" ) ;
define( "_ALBM_CFG_DESCTHUMBSPATH" , "Hetzelfde als 'Pad naar de foto's'." ) ;
//define( "_ALBM_CFG_USEIMAGICK" , "Bewerk foto's met ImageMagick" ) ;
//define( "_ALBM_CFG_DESCIMAGICK" , "Zonder ImageMagick werkt het draaien of schalen van de foto mogelijk niet, thumbnails worden gemaakt met GD.<br />ImageMagick heeft de voorkeur." ) ;
define( "_ALBM_CFG_IMAGINGPIPE" , "Pakket om foto's te bewerken" ) ;
define( "_ALBM_CFG_DESCIMAGINGPIPE" , "Bijna alle PHP versies gebruiken GD. Maar GD is qua functies inferieur aan de andere 2 pakketten.<br />We adviseren het gebruik van ImageMagick of NetPBM." ) ;
define( "_ALBM_CFG_FORCEGD2" , "Forceer GD2 conversie" ) ;
define( "_ALBM_CFG_DESCFORCEGD2" , "Zelfs al is GD gebundeld met PHP, het forceert GD2(truecolor) conversie.<br />In sommige PHP connfiguraties kunnen geen thumbnails<br />in GD2 gemaakt wordebn. Deze optie is alleen belangrijk als u GD gebruikt." ) ;
define( "_ALBM_CFG_IMAGICKPATH" , "Pad naar ImageMagick" ) ;
define( "_ALBM_CFG_DESCIMAGICKPATH" , "Volledige pad naar 'convert'<br />(Het laatste teken mag geen '/' zijn.)<br />Deze optie is alleen belangrijk als u ImageMagick gebruikt." ) ;
define( "_ALBM_CFG_NETPBMPATH" , "Pad naar NetPBM" ) ;
define( "_ALBM_CFG_DESCNETPBMPATH" , "Volledige pad naar 'pnmscale' etc.<br />(Het laatste teken mag geen '/' zijn.)<br />Deze optie is alleen belangrijk als u NetPBM gebruikt." ) ;
define( "_ALBM_CFG_POPULAR" , "Hits om populair te zijn" ) ;
define( "_ALBM_CFG_NEWDAYS" , "Aantal dagen dat 'new' & 'update' pictogrammen getoond worden" ) ;
define( "_ALBM_CFG_NEWPHOTOS" , "Aantal nieuwe foto's op hoofdpagina" ) ;
define( "_ALBM_CFG_PERPAGE" , "Getoonde foto's per pagina" ) ;
define( "_ALBM_CFG_MAKETHUMB" , "Creëer thumbnail" ) ;
define( "_ALBM_CFG_DESCMAKETHUMB" , "Als u deze optie wijzigt, moet u de thumbnails herstellen." ) ;
//define( "_ALBM_CFG_THUMBWIDTH" , "Thumbnail breedte" ) ;
//define( "_ALBM_CFG_DESCTHUMBWIDTH" , "De hoogte van de thumbnails wordt automatisch afgeleid van de breedte." ) ;
define( "_ALBM_CFG_THUMBSIZE" , "Thumbnail grootte (pixels)" ) ;
define( "_ALBM_CFG_THUMBRULE" , "Regels voor het maken van thumbnails" ) ;
define( "_ALBM_CFG_WIDTH" , "Max foto breedte" ) ;
define( "_ALBM_CFG_DESCWIDTH" , "Dit is de breedte waarboven de foto geschaald wordt.<br />Als u GD zonder truecolor gebruikt, is dit de maximum breedte." ) ;
define( "_ALBM_CFG_HEIGHT" , "Max foto hoogte" ) ;
define( "_ALBM_CFG_DESCHEIGHT" , "Hiervoor geldt hetzelfde als de breedte." ) ;
define( "_ALBM_CFG_FSIZE" , "Max bestandsgrootte" ) ;
define( "_ALBM_CFG_DESCFSIZE" , "De maximum grootte van het te uploaden bestand." ) ;
// define( "_ALBM_CFG_NEEDADMIT" , "Controle noodzakelijk" ) ;
define( "_ALBM_CFG_ADDPOSTS" , "Het getal 'User's posts' verhogen wanneer een foto wordt gepost" ) ;
define( "_ALBM_CFG_DESCADDPOSTS" , "Normaal is dit 0 of 1." ) ;

define( "_ALBM_CFG_CATONSUBMENU" , "Hoofdcategoriën registreren in submenu" ) ;
define( "_ALBM_CFG_NAMEORUNAME" , "Naam poster weergeven" ) ;
define( "_ALBM_CFG_DESCNAMEORUNAME" , "Kies welke 'naam' wordt getoond" ) ;
define( "_ALBM_CFG_VIEWCATTYPE" , "Weergave in categorie" ) ;
define( "_ALBM_CFG_COLSOFTABLEVIEW" , "Aantal kolommen in tabel-weergave" ) ;

define( "_ALBM_OPT_USENAME" , "Handle" ) ;
define( "_ALBM_OPT_USEUNAME" , "Login" ) ;

define( "_ALBUM_OPT_CALCFROMWIDTH" , "breedte:opgegeven  hoogte:auto" ) ;
define( "_ALBUM_OPT_CALCFROMHEIGHT" , "breedte:auto  hoogte:opgegeven" ) ;
define( "_ALBUM_OPT_CALCWHINSIDEBOX" , "opgegeven vorm" ) ;

define( "_ALBM_OPT_VIEWLIST" , "Lijst-weergave" ) ;
define( "_ALBM_OPT_VIEWTABLE" , "Tabel-weergave" ) ;


// Sub menu titles
define("_ALBM_TEXT_SMNAME1","Versturen");
define("_ALBM_TEXT_SMNAME2","Populair");
define("_ALBM_TEXT_SMNAME3","Top Noteringen");
define("_ALBM_TEXT_SMNAME4","Mijn foto's");

// Names of admin menu items
define("_ALBM_MYALBUM_ADMENU0","Toegevoegde foto's");
define("_ALBM_MYALBUM_ADMENU1","Foto management");
define("_ALBM_MYALBUM_ADMENU2","Categoriën toevoegen/bewerken");
define("_ALBM_MYALBUM_ADMENU_GPERM","Globale permissies");
define("_ALBM_MYALBUM_ADMENU3","Check Configuratie");
define("_ALBM_MYALBUM_ADMENU4","Batch registratie");
define("_ALBM_MYALBUM_ADMENU5","Herstel thumbnails");


// Text for notifications
define('_MI_MYALBUM_GLOBAL_NOTIFY', 'Globaal');
define('_MI_MYALBUM_GLOBAL_NOTIFYDSC', 'Globale notificatie instellingen voor myAlbum-P');
define('_MI_MYALBUM_CATEGORY_NOTIFY', 'Categorie');
define('_MI_MYALBUM_CATEGORY_NOTIFYDSC', 'Notificatie instellingen voor de huidige categorie');
define('_MI_MYALBUM_PHOTO_NOTIFY', 'Foto');
define('_MI_MYALBUM_PHOTO_NOTIFYDSC', 'Notificatie instellingen voor de huidige foto');

define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFY', 'Nieuwe foto');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYCAP', 'Laat me weten wanneer er een nieuwe foto is gepost');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYDSC', 'Ontvang een bericht als er een nieuwe foto gepost is');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE}: auto-notificatie : Nieuwe foto');

define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFY', 'Nieuwe foto');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYCAP', 'Laat me weten als er een nieuwe foto in de huidige categorie is gepost');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYDSC', 'Ontvang een notificatie als er een nieuwe foto in de huidige categorie is gepost');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE}: auto-notificatie : Nieuwe foto');

}

?>
