<?php
// Module Info

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MI_LOADED' ) ) {







// Appended by Xoops Language Checker -GIJOE- in 2006-05-26 06:00:52
define('_ALBM_MYALBUM_ADMENU_MYTPLSADMIN','Templates');

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
define("_ALBM_MYALBUM_NAME","ŽÁlbum de fotos");

// A brief description of this module
define("_ALBM_MYALBUM_DESC","Crea una secci…Ï de fotos donde los usuarios pueden buscar/enviar/calificar varias fotos.");

// Names of blocks for this module (Not all module has blocks)
define("_ALBM_BNAME_RECENT","Fotos recientes");
define("_ALBM_BNAME_HITS","Las mejores fotos");
define("_ALBM_BNAME_RANDOM","Foto al azar");

// Config Items
define( "_ALBM_CFG_PHOTOSPATH" , "Ruta a las fotos" ) ;
define( "_ALBM_CFG_DESCPHOTOSPATH" , "Ruta a partir del directorio de XOOPS.<br />(El primer caráÄter debe ser '/'. El “Ítimo caráÄter NO debe ser '/'.)<br />En UNIX, los permisos de este directorio deben ser 777 ó 707." ) ;
define( "_ALBM_CFG_THUMBSPATH" , "Ruta a las miniaturas" ) ;
define( "_ALBM_CFG_DESCTHUMBSPATH" , "Lo mismo que para 'Ruta a las fotos'." ) ;
define( "_ALBM_CFG_USEIMAGICK" , "Usar ImageMagick para construir miniaturas" ) ;
define( "_ALBM_CFG_DESCIMAGICK" , "No usar ImageMagick significa que las redimensiones o rotaciones de la foto principal no funcionaráÏ, y las miniaturas las hará GD. Es mejor que uses ImageMagick, si puedes" ) ;
define( "_ALBM_CFG_IMAGICKPATH" , "Ruta hacia ImageMagick" ) ;
define( "_ALBM_CFG_DESCIMAGICKPATH" , "La ruta completa hasta 'convert'<br />(El “Ítimo caráÄter NO debe ser '/'.)" ) ;
define( "_ALBM_CFG_POPULAR" , "Hits para ser popular" ) ;
define( "_ALBM_CFG_NEWDAYS" , "DùÂs entre la aparici…Ï del icono 'new' & 'update'" ) ;
define( "_ALBM_CFG_NEWPHOTOS" , "N“Îero de fotos que aparecen como Nuevas en la páÈina inicial" ) ;
define( "_ALBM_CFG_PERPAGE" , "Fotos mostradas en cada páÈina" ) ;
define( "_ALBM_CFG_MAKETHUMB" , "Crear miniatura" ) ;
define( "_ALBM_CFG_THUMBWIDTH" , "Anchura de la miniatura" ) ;
define( "_ALBM_CFG_DESCMAKETHUMB" , "Cuando cambias 'No' a 'Sí', vale máÔ que luego apliques 'Reconstruir miniaturas'." ) ;
define( "_ALBM_CFG_WIDTH" , "Anchura máÙima de la foto" ) ;
define( "_ALBM_CFG_DESCWIDTH" , "Si usas ImageMagick, esto significa la anchura a la que se redimensionará.<br />Si no es así, significa el lùÎite de anchura." ) ;
define( "_ALBM_CFG_HEIGHT" , "Altura máÙima de la foto" ) ;
define( "_ALBM_CFG_DESCHEIGHT" , "Lo mismo que para 'Anchura máÙima de la foto'." ) ;
define( "_ALBM_CFG_FSIZE" , "TamaÐ máÙimo del archivo" ) ;
define( "_ALBM_CFG_DESCFSIZE" , "El lùÎite del tamaÐ que debe tener el archivo a subir." ) ;
define( "_ALBM_CFG_NEEDADMIT" , "Requieres registro para subir fotos" ) ;
define( "_ALBM_CFG_ADDPOSTS" , "N“Îero que se agrega a envùÐs del usuario cuando se publica una foto." ) ;
define( "_ALBM_CFG_DESCADDPOSTS" , "Normalmente, 0 ó 1. Menos de 0 significa 0" ) ;

// Sub menu titles
define("_ALBM_TEXT_SMNAME1","Enviar foto");
define("_ALBM_TEXT_SMNAME2","Las populares");
define("_ALBM_TEXT_SMNAME3","Las mejores");
define("_ALBM_TEXT_SMNAME4","Mis fotos");

// Names of admin menu items
define("_ALBM_MYALBUM_ADMENU0","Fotos por autorizar");
define("_ALBM_MYALBUM_ADMENU1","Manejo de fotos");
define("_ALBM_MYALBUM_ADMENU2","Agregar/editar categorùÂs");
define("_ALBM_MYALBUM_ADMENU3","Revisi…Ï del m…Åulo");
define("_ALBM_MYALBUM_ADMENU4","Subir en lotes");
define("_ALBM_MYALBUM_ADMENU5","Reconstruir miniaturas");

?><?php
// Appended by Xoops Language Checker -GIJOE- in 2003-10-21 17:48:32
define('_ALBM_CFG_DESCTHUMBWIDTH','La altura de las miniaturas se decidirá automáÕicamente por su anchura.');
?><?php
// Appended by Xoops Language Checker -GIJOE- in 2003-11-27 10:43:19
define('_ALBM_CFG_IMAGINGPIPE','Package treating images');
define('_ALBM_CFG_DESCIMAGINGPIPE','Almost PHP environment can use GD. But GD is functionally inferior than another 2 packages.<br />You\'d better use ImageMagick or NetPBM if you can.');
define('_ALBM_CFG_FORCEGD2','Forzar conversi…Ï GD2');
define('_ALBM_CFG_DESCFORCEGD2','Incluso si GD es una versi…Ï incluùÅa en su PHP, forzará conversi…Ï a GD2(truecolor).<br />Algunas configuraciones PHP fallan al crear miniaturas en GD2<br />Esta configuraci…Ï es importante s…Ío utilizando GD');
define('_ALBM_CFG_NETPBMPATH','Directorio de NetPBM');
define('_ALBM_CFG_DESCNETPBMPATH','El directorio completo a \'pnmscale\' etc.<br />(El “Ítimo caracter no debe ser \'/\'.)<br />Esta configuraci…Ï es importante s…Ío si usa NetPBM');
define('_ALBM_CFG_THUMBSIZE','TamaÐ de miniaturas (pixel)');
define('_ALBM_CFG_THUMBRULE','Regla para creaci…Ï de miniaturas');
define('_ALBM_CFG_CATONSUBMENU','Registrar categorùÂs superiores en submen“Ô');
define('_ALBM_CFG_NAMEORUNAME','Se mostrará el nombre del enviador');
define('_ALBM_CFG_DESCNAMEORUNAME','Seleccione qué \'name\' se mostrará');
define('_ALBM_OPT_USENAME','Nombre Real');
define('_ALBM_OPT_USEUNAME','Login');
define('_ALBUM_OPT_CALCFROMWIDTH','ancho:altura especificada:auto');
define('_ALBUM_OPT_CALCFROMHEIGHT','ancho:altura automáÕica:especificada');
define('_ALBUM_OPT_CALCWHINSIDEBOX','escriba el tamaÐ de cuadro especificado');
?><?php
// Appended by Xoops Language Checker -GIJOE- in 2003-12-03 16:33:03
define('_ALBM_BNAME_RECENT_P','Fotos Recientes con miniaturas');
define('_ALBM_BNAME_HITS_P','ŽÚltimas Fotos con miniaturas');
?><?php
// Appended by Xoops Language Checker -GIJOE- in 2004-01-27 15:37:02
define('_ALBM_CFG_VIEWCATTYPE','Tipo de vista en categorùÂ');
define('_ALBM_CFG_COLSOFTABLEVIEW','N“Îero de columnas en vista de tabla');
define('_ALBM_OPT_VIEWLIST','Ver Lista');
define('_ALBM_OPT_VIEWTABLE','Ver Tabla');
define('_ALBM_MYALBUM_ADMENU_GPERM','Permisos Globales');
define('_MI_MYALBUM_GLOBAL_NOTIFY','Global');
define('_MI_MYALBUM_GLOBAL_NOTIFYDSC','Opciones de notificaci…Ï globales con myAlbum-P');
define('_MI_MYALBUM_CATEGORY_NOTIFY','CategorùÂ');
define('_MI_MYALBUM_CATEGORY_NOTIFYDSC','Opciones de notificaci…Ï que se aplicaráÏ a la categorùÂ de Fotos Actual');
define('_MI_MYALBUM_PHOTO_NOTIFY','Foto');
define('_MI_MYALBUM_PHOTO_NOTIFYDSC','Opciones de Notificaci…Ï que se aplicaráÏ a la foto actual');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFY','Nueva Foto');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYCAP','Notificarme cuando se envùÆ una nueva foto');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYDSC','Recibir notificaci…Ï cuando cualquier nueva foto sea enviada');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYSBJ','[{X_SITENAME}] {X_MODULE}: auto-notify : Nueva Foto');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFY','Nueva Foto');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYCAP','Notificarme cuando se envùÆ una nueva foto a esta categorùÂ');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYDSC','Recibir notificaci…Ï cuando una nueva foto se envùÆ a la categorùÂ actual');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYSBJ','[{X_SITENAME}] {X_MODULE}: auto-notify : Nueva Foto');

}

?>
