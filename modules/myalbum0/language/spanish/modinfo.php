<?php
// Module Info

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MI_LOADED' ) ) {






// Appended by Xoops Language Checker -GIJOE- in 2004-10-04 16:06:31
define('_ALBM_CFG_DEFAULTORDER','Default order in category\'s view');

// Appended by Xoops Language Checker -GIJOE- in 2004-06-24 17:58:58
define('_ALBM_CFG_USESITEIMG','Use [siteimg] in ImageManager Integration');
define('_ALBM_CFG_DESCUSESITEIMG','The Integrated Image Manager input [siteimg] instead of [img].<br />You have to hack module.textsanitizer.php or each modules to enable tag of [siteimg]');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-19 13:56:05
define('_ALBM_CFG_MIDDLEPIXEL','Max image size in single view');
define('_ALBM_CFG_DESCMIDDLEPIXEL','Specify (width)x(height)<br />eg) 480x480');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-17 18:42:54
define('_ALBM_CFG_DESCPERPAGE','Input selectable numbers separated with \'|\'<br />eg) 10|20|50|100');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-05 15:14:37
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
define("_ALBM_MYALBUM_NAME","�lbum de fotos");

// A brief description of this module
define("_ALBM_MYALBUM_DESC","Crea una secci�n de fotos donde los usuarios pueden buscar/enviar/calificar varias fotos.");

// Names of blocks for this module (Not all module has blocks)
define("_ALBM_BNAME_RECENT","Fotos recientes");
define("_ALBM_BNAME_HITS","Las mejores fotos");
define("_ALBM_BNAME_RANDOM","Foto al azar");

// Config Items
define( "_ALBM_CFG_PHOTOSPATH" , "Ruta a las fotos" ) ;
define( "_ALBM_CFG_DESCPHOTOSPATH" , "Ruta a partir del directorio de XOOPS.<br />(El primer car�cter debe ser '/'. El �ltimo car�cter NO debe ser '/'.)<br />En UNIX, los permisos de este directorio deben ser 777 � 707." ) ;
define( "_ALBM_CFG_THUMBSPATH" , "Ruta a las miniaturas" ) ;
define( "_ALBM_CFG_DESCTHUMBSPATH" , "Lo mismo que para 'Ruta a las fotos'." ) ;
define( "_ALBM_CFG_USEIMAGICK" , "Usar ImageMagick para construir miniaturas" ) ;
define( "_ALBM_CFG_DESCIMAGICK" , "No usar ImageMagick significa que las redimensiones o rotaciones de la foto principal no funcionar�n, y las miniaturas las har� GD. Es mejor que uses ImageMagick, si puedes" ) ;
define( "_ALBM_CFG_IMAGICKPATH" , "Ruta hacia ImageMagick" ) ;
define( "_ALBM_CFG_DESCIMAGICKPATH" , "La ruta completa hasta 'convert'<br />(El �ltimo car�cter NO debe ser '/'.)" ) ;
define( "_ALBM_CFG_POPULAR" , "Hits para ser popular" ) ;
define( "_ALBM_CFG_NEWDAYS" , "D�as entre la aparici�n del icono 'new' & 'update'" ) ;
define( "_ALBM_CFG_NEWPHOTOS" , "N�mero de fotos que aparecen como Nuevas en la p�gina inicial" ) ;
define( "_ALBM_CFG_PERPAGE" , "Fotos mostradas en cada p�gina" ) ;
define( "_ALBM_CFG_MAKETHUMB" , "Crear miniatura" ) ;
define( "_ALBM_CFG_THUMBWIDTH" , "Anchura de la miniatura" ) ;
define( "_ALBM_CFG_DESCMAKETHUMB" , "Cuando cambias 'No' a 'S�', vale m�s que luego apliques 'Reconstruir miniaturas'." ) ;
define( "_ALBM_CFG_WIDTH" , "Anchura m�xima de la foto" ) ;
define( "_ALBM_CFG_DESCWIDTH" , "Si usas ImageMagick, esto significa la anchura a la que se redimensionar�.<br />Si no es as�, significa el l�mite de anchura." ) ;
define( "_ALBM_CFG_HEIGHT" , "Altura m�xima de la foto" ) ;
define( "_ALBM_CFG_DESCHEIGHT" , "Lo mismo que para 'Anchura m�xima de la foto'." ) ;
define( "_ALBM_CFG_FSIZE" , "Tama�o m�ximo del archivo" ) ;
define( "_ALBM_CFG_DESCFSIZE" , "El l�mite del tama�o que debe tener el archivo a subir." ) ;
define( "_ALBM_CFG_NEEDADMIT" , "Requieres registro para subir fotos" ) ;
define( "_ALBM_CFG_ADDPOSTS" , "N�mero que se agrega a env�os del usuario cuando se publica una foto." ) ;
define( "_ALBM_CFG_DESCADDPOSTS" , "Normalmente, 0 � 1. Menos de 0 significa 0" ) ;

// Sub menu titles
define("_ALBM_TEXT_SMNAME1","Enviar foto");
define("_ALBM_TEXT_SMNAME2","Las populares");
define("_ALBM_TEXT_SMNAME3","Las mejores");
define("_ALBM_TEXT_SMNAME4","Mis fotos");

// Names of admin menu items
define("_ALBM_MYALBUM_ADMENU0","Fotos por autorizar");
define("_ALBM_MYALBUM_ADMENU1","Manejo de fotos");
define("_ALBM_MYALBUM_ADMENU2","Agregar/editar categor�as");
define("_ALBM_MYALBUM_ADMENU3","Revisi�n del m�dulo");
define("_ALBM_MYALBUM_ADMENU4","Subir en lotes");
define("_ALBM_MYALBUM_ADMENU5","Reconstruir miniaturas");

?><?php
// Appended by Xoops Language Checker -GIJOE- in 2003-10-21 17:48:32
define('_ALBM_CFG_DESCTHUMBWIDTH','La altura de las miniaturas se decidir� autom�ticamente por su anchura.');
?><?php
// Appended by Xoops Language Checker -GIJOE- in 2003-11-27 10:43:19
define('_ALBM_CFG_IMAGINGPIPE','Package treating images');
define('_ALBM_CFG_DESCIMAGINGPIPE','Almost PHP environment can use GD. But GD is functionally inferior than another 2 packages.<br />You\'d better use ImageMagick or NetPBM if you can.');
define('_ALBM_CFG_FORCEGD2','Forzar conversi�n GD2');
define('_ALBM_CFG_DESCFORCEGD2','Incluso si GD es una versi�n inclu�da en su PHP, forzar� conversi�n a GD2(truecolor).<br />Algunas configuraciones PHP fallan al crear miniaturas en GD2<br />Esta configuraci�n es importante s�lo utilizando GD');
define('_ALBM_CFG_NETPBMPATH','Directorio de NetPBM');
define('_ALBM_CFG_DESCNETPBMPATH','El directorio completo a \'pnmscale\' etc.<br />(El �ltimo caracter no debe ser \'/\'.)<br />Esta configuraci�n es importante s�lo si usa NetPBM');
define('_ALBM_CFG_THUMBSIZE','Tama�o de miniaturas (pixel)');
define('_ALBM_CFG_THUMBRULE','Regla para creaci�n de miniaturas');
define('_ALBM_CFG_CATONSUBMENU','Registrar categor�as superiores en submen�s');
define('_ALBM_CFG_NAMEORUNAME','Se mostrar� el nombre del enviador');
define('_ALBM_CFG_DESCNAMEORUNAME','Seleccione qu� \'name\' se mostrar�');
define('_ALBM_OPT_USENAME','Nombre Real');
define('_ALBM_OPT_USEUNAME','Login');
define('_ALBUM_OPT_CALCFROMWIDTH','ancho:altura especificada:auto');
define('_ALBUM_OPT_CALCFROMHEIGHT','ancho:altura autom�tica:especificada');
define('_ALBUM_OPT_CALCWHINSIDEBOX','escriba el tama�o de cuadro especificado');
?><?php
// Appended by Xoops Language Checker -GIJOE- in 2003-12-03 16:33:03
define('_ALBM_BNAME_RECENT_P','Fotos Recientes con miniaturas');
define('_ALBM_BNAME_HITS_P','�ltimas Fotos con miniaturas');
?><?php
// Appended by Xoops Language Checker -GIJOE- in 2004-01-27 15:37:02
define('_ALBM_CFG_VIEWCATTYPE','Tipo de vista en categor�a');
define('_ALBM_CFG_COLSOFTABLEVIEW','N�mero de columnas en vista de tabla');
define('_ALBM_OPT_VIEWLIST','Ver Lista');
define('_ALBM_OPT_VIEWTABLE','Ver Tabla');
define('_ALBM_MYALBUM_ADMENU_GPERM','Permisos Globales');
define('_MI_MYALBUM_GLOBAL_NOTIFY','Global');
define('_MI_MYALBUM_GLOBAL_NOTIFYDSC','Opciones de notificaci�n globales con myAlbum-P');
define('_MI_MYALBUM_CATEGORY_NOTIFY','Categor�a');
define('_MI_MYALBUM_CATEGORY_NOTIFYDSC','Opciones de notificaci�n que se aplicar�n a la categor�a de Fotos Actual');
define('_MI_MYALBUM_PHOTO_NOTIFY','Foto');
define('_MI_MYALBUM_PHOTO_NOTIFYDSC','Opciones de Notificaci�n que se aplicar�n a la foto actual');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFY','Nueva Foto');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYCAP','Notificarme cuando se env�e una nueva foto');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYDSC','Recibir notificaci�n cuando cualquier nueva foto sea enviada');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYSBJ','[{X_SITENAME}] {X_MODULE}: auto-notify : Nueva Foto');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFY','Nueva Foto');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYCAP','Notificarme cuando se env�e una nueva foto a esta categor�a');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYDSC','Recibir notificaci�n cuando una nueva foto se env�e a la categor�a actual');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYSBJ','[{X_SITENAME}] {X_MODULE}: auto-notify : Nueva Foto');

}

?>
