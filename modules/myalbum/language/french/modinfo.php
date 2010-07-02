<?php
// Module Info

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MI_LOADED' ) ) {


// Appended by Xoops Language Checker -GIJOE- in 2006-05-26 06:00:52
define('_ALBM_MYALBUM_ADMENU_MYTPLSADMIN','Templates');

define( 'MYALBUM_MI_LOADED' , 1 ) ;

// The name of this module
define("_ALBM_MYALBUM_NAME","MyAlbum");

// A brief description of this module
define("_ALBM_MYALBUM_DESC","Cr&eacute;ation d'une gallerie photos où les utilisateurs peuvent chercher/soumettre et voter.");

// Names of blocks for this module (Not all module has blocks)
define("_ALBM_BNAME_RECENT","Photos r&eacute;centes");
define("_ALBM_BNAME_HITS","Top Photos");
define("_ALBM_BNAME_RANDOM","Photo al&eacute;atoire");
define("_ALBM_BNAME_RECENT_P","Photos r&eacute;centes avec vignette");
define("_ALBM_BNAME_HITS_P","Top Photos avec vignettes");

// Config Items
define( "_ALBM_CFG_PHOTOSPATH" , "Chemin vers les photos" ) ;
define( "_ALBM_CFG_DESCPHOTOSPATH" , "Chemin depuis le r&eacute;pertoire de Xoops.<br />(le premier caract&egrave;re doit &ecirc;tre '/'. Le dernier carac&egrave;re NE DOIT PAS ETRE '/'.)<br />Sous unix les permissions de ce r&eacute;petoire sont 777 ou 707." ) ;
define( "_ALBM_CFG_THUMBSPATH" , "Chemin des vignettes" ) ;
define( "_ALBM_CFG_DESCTHUMBSPATH" , "identique &agrave; 'Chemin vers les photos'." ) ;
//define( "_ALBM_CFG_USEIMAGICK" , "Use ImageMagick for treating images" ) ;
//define( "_ALBM_CFG_DESCIMAGICK" , "Not use ImageMagick cause Not work resize or rotate the main photo, and make thumbnails by GD.<br />You'd better use ImageMagick if you can." ) ;
define( "_ALBM_CFG_IMAGINGPIPE" , "Programme qui g&egrave;re les images" ) ;
define( "_ALBM_CFG_DESCIMAGINGPIPE" , "Presque tous les environnements PHP peuvent utiliser GD. Mais les fonctionnalit&eacute;s de GD sont inf&eacute;rieures aux deux autres programmes.<br />Si vous pouvez, utilisez ImageMagick ou NetPBM." ) ;
define( "_ALBM_CFG_FORCEGD2" , "Forcer la conversion GD2" ) ;
define( "_ALBM_CFG_DESCFORCEGD2" , "M&ecirc;me si vous utilisez la version de GD fournie avec PHP, cela force la conversion GD2(truecolor).<br />Quelques configuartions de PHP &eacute;chouent &agrave; cr&eacute;er des vignettes avec GD2<br />Cette configuration n'est significative que si vous utilisez GD" ) ;
define( "_ALBM_CFG_IMAGICKPATH" , "Chemin d'ImageMagick" ) ;
define( "_ALBM_CFG_DESCIMAGICKPATH" , "Le chemin complet vers 'convert' doit &ecirc;tre fournit, laissez &agrave; blanc dans la plupart des environnements.<br />Cette configuration n'est significative que si vous utilisez ImageMagick" ) ;
define( "_ALBM_CFG_NETPBMPATH" , "Chemin de NetPBM" ) ;
define( "_ALBM_CFG_DESCNETPBMPATH" , "Le chemin complet vers 'pnmscale' doit &ecirc;ter fournit, laissez &agrave; blanc dans la plupart des environnements.<br />Cette configuration n'est significative que si vous utilisez NetPBM" ) ;
define( "_ALBM_CFG_POPULAR" , "Nombre de fois où l'image est vue pour &ecirc;tre populaire" ) ;
define( "_ALBM_CFG_NEWDAYS" , "Nombre de jours durant lesquels l'image est marqu&eacute;e comme 'nouvelle' ou 'mise &agrave; jour'" ) ;
define( "_ALBM_CFG_NEWPHOTOS" , "Nombre de nouvelles photos sur la page d'accueil du module" ) ;
define( "_ALBM_CFG_DEFAULTORDER" , "Ordre par d&eacute;faut dans la vue par cat&eacute;gorie" ) ;
define( "_ALBM_CFG_PERPAGE" , "Photos visibles par page" ) ;
define( "_ALBM_CFG_DESCPERPAGE" , "Renrez les valeur du nombre d'images visibles par page s&eacute;par&eacute;es par '|'<br />Par exemple 10|20|50|100" ) ;
define( "_ALBM_CFG_ALLOWNOIMAGE" , "Permettre des soumissions sans image" ) ;
define( "_ALBM_CFG_MAKETHUMB" , "Cr&eacute;er les vignettes" ) ;
define( "_ALBM_CFG_DESCMAKETHUMB" , "Lorsque vous modifiez votre choix, vous devez reconstruire les vignettes." ) ;
//define( "_ALBM_CFG_THUMBWIDTH" , "Thumb Image Width" ) ;
//define( "_ALBM_CFG_DESCTHUMBWIDTH" , "The height of thumbs will be decided from the width automatically." ) ;
define( "_ALBM_CFG_THUMBSIZE" , "Taille des vignettes (en pixels)" ) ;
define( "_ALBM_CFG_THUMBRULE" , "R&egrave;gle de calcul pour la cr&eacute;ation des vignettes" ) ;
define( "_ALBM_CFG_WIDTH" , "Largeur maximale des photos" ) ;
define( "_ALBM_CFG_DESCWIDTH" , "C'est la largeur maximale dans laquelle les photos seront retaill&eacute;es.<br />Si vous utilisez GD sans truecolor, cela signifie la limite de la largeur." ) ;
define( "_ALBM_CFG_HEIGHT" , "Hauteur maximale des photos" ) ;
define( "_ALBM_CFG_DESCHEIGHT" , "Identique &agrave; 'Largeur maximale des photos'." ) ;
define( "_ALBM_CFG_FSIZE" , "Taille maximale des images (en octets)" ) ;
define( "_ALBM_CFG_DESCFSIZE" , "C'est la taille maximale des images que vous t&eacute;l&eacute;charger. (octets)" ) ;
define( "_ALBM_CFG_MIDDLEPIXEL" , "Taille maximale des images dans la vue photo" ) ;
define( "_ALBM_CFG_DESCMIDDLEPIXEL" , "sp&eacute;cifier (largeur)x(hauteur)<br />par exemple 480x480" ) ;
define( "_ALBM_CFG_ADDPOSTS" , "Incr&eacute;menter le compteur de posts de l'auteur durant la soumission d'une photo." ) ;
define( "_ALBM_CFG_DESCADDPOSTS" , "Normalement, 0 ou 1. Z&eacute;ro pour ne pas incr&eacute;menter" ) ;
define( "_ALBM_CFG_CATONSUBMENU" , "Enregistrer les cat&eacute;gories principales en tant que sous-menu du menu princpal de Xoops" ) ;
define( "_ALBM_CFG_NAMEORUNAME" , "Affichage du nom de l'auteur" ) ;
define( "_ALBM_CFG_DESCNAMEORUNAME" , "Choisisse quel 'nom' afficher" ) ;
define( "_ALBM_CFG_VIEWCATTYPE" , "Type de vue dans les cat&eacute;gories" ) ;
define( "_ALBM_CFG_COLSOFTABLEVIEW" , "Nombre de colonnes dans la vue en table" ) ;
define( "_ALBM_CFG_ALLOWEDEXTS" , "Extensions de fichiers qui peuvent &ecirc;tre t&eacute;l&eacute;charg&eacute;s vers le serveur" ) ;
define( "_ALBM_CFG_DESCALLOWEDEXTS" , "Entrez les extensions avec le s&eacute;parateur '|'. (par exemple 'jpg|jpeg|gif|png') .<br />Entrez les extensions en minuscules. N'ins&eacute;rez pas de point ni d'espace<br />N'utilisez jamais l'extension php ou phtml." ) ;
define( "_ALBM_CFG_ALLOWEDMIME" , "Types MIME pouvant &ecirc;tre t&eacute;l&eacute;charg&eacute;s" ) ;
define( "_ALBM_CFG_DESCALLOWEDMIME" , "Entrez les types MIME avec le s&eacute;parateur '|'. (par exemple 'image/gif|image/jpeg|image/png')<br />Si vous souhaitez &ecirc;tre control&eacute; par le type MIME laissez &agrave; blanc" ) ;
define( "_ALBM_CFG_USESITEIMG" , "Utiliser [siteimg] dans l'int&eacute;gration du gestionnaire d'images") ;
define( "_ALBM_CFG_DESCUSESITEIMG" , "Le gestionnaire d'images int&eacute;gr&eacute; utilisera [siteimg] au lieu de [img].<br />Vous devez modifier le fichier module.textsanitizer.php de chaque module pour permettre le tag [siteimg]" ) ;

define( "_ALBM_OPT_USENAME" , "Nom complet" ) ;
define( "_ALBM_OPT_USEUNAME" , "Nom de connexion" ) ;

define( "_ALBUM_OPT_CALCFROMWIDTH" , "largeur:sp&eacute;cifi&eacute;e  hauteur:auto" ) ;
define( "_ALBUM_OPT_CALCFROMHEIGHT" , "largeur:auto  largeur:sp&eacute;cifi&eacute;e" ) ;
define( "_ALBUM_OPT_CALCWHINSIDEBOX" , "entrez la taille du carr&eacute;" ) ;

define( "_ALBM_OPT_VIEWLIST" , "Vue en liste") ;
define( "_ALBM_OPT_VIEWTABLE" , "Vue en table" ) ;


// Sub menu titles
define("_ALBM_TEXT_SMNAME1","Soumettre");
define("_ALBM_TEXT_SMNAME2","Populaire");
define("_ALBM_TEXT_SMNAME3","Mieux not&eacute;es");
define("_ALBM_TEXT_SMNAME4","Mes photos");

// Names of admin menu items
define("_ALBM_MYALBUM_ADMENU0","Soumettre des photos");
define("_ALBM_MYALBUM_ADMENU1","Gestionnaire de photos");
define("_ALBM_MYALBUM_ADMENU2","Ajouter/Editer les cat&eacute;gories");
define("_ALBM_MYALBUM_ADMENU_GPERM","Permissions globales");
define("_ALBM_MYALBUM_ADMENU3","V&eacute;rifier la configuration et l'environnement");
define("_ALBM_MYALBUM_ADMENU4","Soumission en mode batch");
define("_ALBM_MYALBUM_ADMENU5","Reg&eacute;n&eacute;ration des vignettes");
define("_ALBM_MYALBUM_ADMENU_IMPORT","Import d'images");
define("_ALBM_MYALBUM_ADMENU_EXPORT","Export d'images");
define("_ALBM_MYALBUM_ADMENU_MYBLOCKSADMIN","Gestion des blocs et des groupes");


// Text for notifications
define('_MI_MYALBUM_GLOBAL_NOTIFY', 'Globale');
define('_MI_MYALBUM_GLOBAL_NOTIFYDSC', 'Notification globale de myAlbum-P');
define('_MI_MYALBUM_CATEGORY_NOTIFY', 'Categorie');
define('_MI_MYALBUM_CATEGORY_NOTIFYDSC', 'Options de notification qui s\'appliquent &agrave; la cat&eacute;gorie courante');
define('_MI_MYALBUM_PHOTO_NOTIFY', 'Photo');
define('_MI_MYALBUM_PHOTO_NOTIFYDSC', 'Options de notification qui s\'appliquent &agrave; la photo courante');

define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFY', 'Nouvelle photo');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYCAP', 'Notifiez moi lorsqu\'une nouvelle photo est post&eacute;e');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYDSC', 'Recevoir une notification lorsqu\'une nouvelle photo est post&eacute;e');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE}: auto-notification : Nouvelle photo');

define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFY', 'Nouvelle photo');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYCAP', 'Notifiez moi lorsqu\'une nouvelle photo est post&eacute;e dans la cat&eacute;gorie en cours');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYDSC', 'Recevoir une notification lorsqu\'une nouvelle photo est post&eacute;e dans la cat&eacute;gorie en cours');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE}: auto-notification : Nouvelle photo');

}

?>