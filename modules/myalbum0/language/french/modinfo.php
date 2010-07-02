<?php
// Module Info

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MI_LOADED' ) ) {






// Appended by Xoops Language Checker -GIJOE- in 2004-10-04 16:06:33
define('_ALBM_CFG_DEFAULTORDER','Default order in category\'s view');

// Appended by Xoops Language Checker -GIJOE- in 2004-06-24 17:58:59
define('_ALBM_CFG_USESITEIMG','Use [siteimg] in ImageManager Integration');
define('_ALBM_CFG_DESCUSESITEIMG','The Integrated Image Manager input [siteimg] instead of [img].<br />You have to hack module.textsanitizer.php or each modules to enable tag of [siteimg]');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-19 13:56:06
define('_ALBM_CFG_MIDDLEPIXEL','Max image size in single view');
define('_ALBM_CFG_DESCMIDDLEPIXEL','Specify (width)x(height)<br />eg) 480x480');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-17 18:42:55
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
define("_ALBM_MYALBUM_NAME","MyAlbum");

// A brief description of this module
define("_ALBM_MYALBUM_DESC","Crée une section de photos où les utilisateurs peuvent chercher/soumettre/noter des photos.");

// Names of blocks for this module (Not all module has blocks)
define("_ALBM_BNAME_RECENT","Photos récentes");
define("_ALBM_BNAME_HITS","Top Photos");
define("_ALBM_BNAME_RANDOM","Choisissez une photo");

// Config Items
define( "_ALBM_CFG_PHOTOSPATH" , "Chemin pour les photos" ) ;
define( "_ALBM_CFG_DESCPHOTOSPATH" , "chemin ou est installé XOOPS.<br />(le premier caractere doit être '/'. Le dernier caractère ne doit pas être '/'.)<br />Les permissions de ce repertoire sont 777 or 707 sur unix." ) ;
define( "_ALBM_CFG_THUMBSPATH" , "chemin pour les vignettes" ) ;
define( "_ALBM_CFG_DESCTHUMBSPATH" , "Pareil à 'Chemin de photos'." ) ;
define( "_ALBM_CFG_USEIMAGICK" , "Utiliser ImageMagick pour traiter les photos" ) ;
define( "_ALBM_CFG_DESCIMAGICK" , "Impossible de 'redimensionner', 'faire pivoter la photo' ou 'créer des vignettes' avec GD.<br />You'd better use ImageMagick if you can." ) ;
define( "_ALBM_CFG_IMAGICKPATH" , "Chemin de ImageMagick" ) ;
define( "_ALBM_CFG_DESCIMAGICKPATH" , "le chemin complet pour 'convertir'<br />(Le dernier caractère ne peut pas être '/'.)" ) ;
define( "_ALBM_CFG_POPULAR" , "Hits pour être populaire" ) ;
define( "_ALBM_CFG_NEWDAYS" , "Nombre de jour ou la photo est affichée 'Nouveauté'&'Mise à jour'" ) ;
define( "_ALBM_CFG_NEWPHOTOS" , "Nombre de nouvelles photos sur la Page principale" ) ;
define( "_ALBM_CFG_PERPAGE" , "Nombre de photos affichées par page" ) ;
define( "_ALBM_CFG_MAKETHUMB" , "Créer les vignettes" ) ;
define( "_ALBM_CFG_THUMBWIDTH" , "Largeur des vignettes" ) ;
define( "_ALBM_CFG_DESCMAKETHUMB" , "Quand vous changez 'Non' en 'Oui', 'recréer des meilleures vignettes''." ) ;
define( "_ALBM_CFG_WIDTH" , "Largeur maximale de la photo" ) ;
define( "_ALBM_CFG_DESCWIDTH" , "Si vous utilisez ImageMagick, Cela signifie la taille pour la redimensionner.<br />Sinon, cela signifie la taille de la largeur." ) ;
define( "_ALBM_CFG_HEIGHT" , "Hauteur maximale de la photo" ) ;
define( "_ALBM_CFG_DESCHEIGHT" , "Pareil que 'Largeur maximale de la photo'." ) ;
define( "_ALBM_CFG_FSIZE" , "Taille maximale du fichier" ) ;
define( "_ALBM_CFG_DESCFSIZE" , "La taille limite des fichiers uploader." ) ;
define( "_ALBM_CFG_NEEDADMIT" , "Necessite un validation" ) ;
define( "_ALBM_CFG_ADDPOSTS" , "Ajout au nombre d'envoi de l'utilisateur des photos soumises." ) ;
define( "_ALBM_CFG_DESCADDPOSTS" , "Normallement, 0 ou 1. En-dessous de 0 signifie 0" ) ;

// Sub menu titles
define("_ALBM_TEXT_SMNAME1","Soumettre");
define("_ALBM_TEXT_SMNAME2","Populaire");
define("_ALBM_TEXT_SMNAME3","Top Votes");
define("_ALBM_TEXT_SMNAME4","Mes Photos");

// Names of admin menu items
define("_ALBM_MYALBUM_ADMENU0","Photos soumises");
define("_ALBM_MYALBUM_ADMENU1","Gestionnaire de photos");
define("_ALBM_MYALBUM_ADMENU2","Ajouter/Editer Categories");
define("_ALBM_MYALBUM_ADMENU3","Contrôle de module");
define("_ALBM_MYALBUM_ADMENU4","téléchargement groupés");
define("_ALBM_MYALBUM_ADMENU5","Recréer les vignettes");

?><?php
// Appended by Xoops Language Checker -GIJOE- in 2003-10-21 17:48:33
define('_ALBM_CFG_DESCTHUMBWIDTH','The height of thumbs will be decided from the width automatically.');
?><?php
// Appended by Xoops Language Checker -GIJOE- in 2003-11-27 10:43:20
define('_ALBM_CFG_IMAGINGPIPE','Package treating images');
define('_ALBM_CFG_DESCIMAGINGPIPE','Almost PHP environment can use GD. But GD is functionally inferior than another 2 packages.<br />You\'d better use ImageMagick or NetPBM if you can.');
define('_ALBM_CFG_FORCEGD2','Force GD2 conversion');
define('_ALBM_CFG_DESCFORCEGD2','Even if the GD is bundled version of PHP, it force GD2(truecolor) conversion.<br />Some configured PHP fails to create thumbnails in GD2<br />This configuration is significant only under using GD');
define('_ALBM_CFG_NETPBMPATH','Path of NetPBM');
define('_ALBM_CFG_DESCNETPBMPATH','The full path to \'pnmscale\' etc.<br />(The last character should not be \'/\'.)<br />This configuration is significant only under using NetPBM');
define('_ALBM_CFG_THUMBSIZE','Size of thumbnails (pixel)');
define('_ALBM_CFG_THUMBRULE','Calc rule for building thumbnails');
define('_ALBM_CFG_CATONSUBMENU','Register top categories into submenu');
define('_ALBM_CFG_NAMEORUNAME','Poster name displayed');
define('_ALBM_CFG_DESCNAMEORUNAME','Select which \'name\' is displayed');
define('_ALBM_OPT_USENAME','Handle Name');
define('_ALBM_OPT_USEUNAME','Login Name');
define('_ALBUM_OPT_CALCFROMWIDTH','width:specified  height:auto');
define('_ALBUM_OPT_CALCFROMHEIGHT','width:auto  width:specified');
define('_ALBUM_OPT_CALCWHINSIDEBOX','put in specified size squre');
?><?php
// Appended by Xoops Language Checker -GIJOE- in 2003-12-03 16:33:03
define('_ALBM_BNAME_RECENT_P','Recent Photos with thumbs');
define('_ALBM_BNAME_HITS_P','Top Photos with thumbs');
?><?php
// Appended by Xoops Language Checker -GIJOE- in 2004-01-27 15:37:03
define('_ALBM_CFG_VIEWCATTYPE','Type of view in category');
define('_ALBM_CFG_COLSOFTABLEVIEW','Number of columns in table view');
define('_ALBM_OPT_VIEWLIST','List View');
define('_ALBM_OPT_VIEWTABLE','Table View');
define('_ALBM_MYALBUM_ADMENU_GPERM','Global Permissions');
define('_MI_MYALBUM_GLOBAL_NOTIFY','Global');
define('_MI_MYALBUM_GLOBAL_NOTIFYDSC','Global notification options with myAlbum-P');
define('_MI_MYALBUM_CATEGORY_NOTIFY','Category');
define('_MI_MYALBUM_CATEGORY_NOTIFYDSC','Notification options that apply to the current photo category');
define('_MI_MYALBUM_PHOTO_NOTIFY','Photo');
define('_MI_MYALBUM_PHOTO_NOTIFYDSC','Notification options that apply to the current photo');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFY','New Photo');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYCAP','Notify me when any new photo is posted');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYDSC','Receive notification when any new photo is posted');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYSBJ','[{X_SITENAME}] {X_MODULE}: auto-notify : New photo');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFY','New Photo');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYCAP','Notify me when a new photo is posted to the current category');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYDSC','Receive notification when a new photo is posted to the current category');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYSBJ','[{X_SITENAME}] {X_MODULE}: auto-notify : New photo');

}

?>
