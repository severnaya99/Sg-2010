<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MB_LOADED' ) ) {




// Appended by Xoops Language Checker -GIJOE- in 2005-08-31 15:23:35
define('_ALBM_STORETIMESTAMP','Don\'t touch timestamp');
define('_ALBM_TELLAFRIEND','Tell a friend');
define('_ALBM_SUBJECT4TAF','A photo for you!');

// Appended by Xoops Language Checker -GIJOE- in 2004-10-04 16:06:31
define('_ALBM_LIDASC','Record Number (Bigger is latter)');
define('_ALBM_LIDDESC','Record Number (Smaller is latter)');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-17 18:42:54
define('_ALBM_BTN_SELECTALL','Select All');
define('_ALBM_BTN_SELECTNONE','Select None');
define('_ALBM_BTN_SELECTRVS','Select Reverse');
define('_ALBM_FMT_PHOTONUM','%s every a page');
define('_ALBM_AM_BUTTON_UPDATE','Modify');
define('_ALBM_NOIMAGESPECIFIED','Error: No photo is uploaded');
define('_ALBM_FILEREADERROR','Error: Photos are not readable.');
define('_ALBM_DIRECTCATSEL','SELECT A CATEGORY');

define( 'MYALBUM_MB_LOADED' , 1 ) ;

//%%%%%%		Module Name 'MyAlbum-P'		%%%%%

// New in MyAlbum-p

// only "Y/m/d" , "d M Y" , "M d Y" can be interpreted
define( "_ALBM_DTFMT_YMDHI" , "d M Y H:i" ) ;

define( "_ALBM_NEXT_BUTTON" , "Siguiente" ) ;
define( "_ALBM_REDOLOOPDONE" , "Hecho." ) ;

define( "_ALBM_AM_ADMISSION" , "Admitir fotos" ) ;
define( "_ALBM_AM_ADMITTING" , "Foto(s) admitida(s)" ) ;
define( "_ALBM_AM_LABEL_ADMIT" , "Aceptar las fotos que marcaste" ) ;
define( "_ALBM_AM_BUTTON_ADMIT" , "Aceptar" ) ;
define( "_ALBM_AM_BUTTON_EXTRACT" , "extraer" ) ;

define( "_ALBM_AM_PHOTOMANAGER" , "Administrador de fotos" ) ;
define( "_ALBM_AM_LABEL_REMOVE" , "Borrar las fotos marcadas" ) ;
define( "_ALBM_AM_BUTTON_REMOVE" , "Ž¡Borrar!" ) ;
define( "_ALBM_AM_JS_REMOVECONFIRM" , "Ž¿Borrar?" ) ;
define( "_ALBM_AM_DEADLINKMAINPHOTO" , "La foto principal no existe" ) ;

define( "_ALBM_RADIO_ROTATETITLE" , "Rotaci…Ï de foto" ) ;
define( "_ALBM_RADIO_ROTATE0" , "no girar" ) ;
define( "_ALBM_RADIO_ROTATE90" , "girar a la derecha" ) ;
define( "_ALBM_RADIO_ROTATE180" , "girar 180 grados" ) ;
define( "_ALBM_RADIO_ROTATE270" , "girar a la izquierda" ) ;


// New MyAlbum 1.0.1 (and 1.2.0)
define("_ALBM_MOREPHOTOS","MáÔ fotos de %s");
define("_ALBM_REDOTHUMBS","Reconstruir miniaturas (<a href='redothumbs.php'>Actualizar</a>)");
define("_ALBM_REDOTHUMBS2","Reconstruir miniaturas");
define("_ALBM_REDOTHUMBSINFO","Un n“Îero muy alto agotará el tiempo de espera del servidor.");
define("_ALBM_REDOTHUMBSNUMBER","N“Îero de miniaturas a la vez");
define("_ALBM_REDOING","Reconstruyendo: ");
define("_ALBM_BACK","Regresar");
define("_ALBM_ADDPHOTO","AÂdir foto");


// New MyAlbum 1.0.0
define("_ALBM_PHOTOBATCHUPLOAD","Subir fotos en lote");
define("_ALBM_PHOTOUPLOAD","Subir fotos");
define("_ALBM_PHOTOEDITUPLOAD","Editar y re-subir foto");
define("_ALBM_MAXPIXEL","TamaÐ máÙimo (pixels)");
define("_ALBM_MAXSIZE","TamaÐ máÙimo (archivo)");
define("_ALBM_PHOTOTITLE","TùÕulo");
define("_ALBM_PHOTOPATH","Ruta");
define("_ALBM_TEXT_DIRECTORY","Directory");
define("_ALBM_DESC_PHOTOPATH","Type the full path of the directory including photos to be registered");
define("_ALBM_MES_INVALIDDIRECTORY","Invalid directory is specified.");
define("_ALBM_MES_BATCHDONE","%s photo(s) has registered.");
define("_ALBM_MES_BATCHNONE","No photo was detected in the directory.");
define("_ALBM_PHOTODESC","Descripci…Ï");
define("_ALBM_PHOTOCAT","CategorùÂ");
define("_ALBM_SELECTFILE","Seleccionar foto");
define("_ALBM_FILEERROR","Foto no subida o demasiado grande");

define("_ALBM_BATCHBLANK","Deja el tùÕulo en blanco para usar el nombre del archivo como tùÕulo");
define("_ALBM_DELETEPHOTO","Ž¿Borrar?");
define("_ALBM_VALIDPHOTO","Validar");
define("_ALBM_PHOTODEL","Ž¿Borrar foto?");
define("_ALBM_DELETINGPHOTO","Borrando foto");

define("_ALBM_POSTERC","Remitente: ");
define("_ALBM_DATEC","Fecha: ");
define("_ALBM_EDITNOTALLOWED","Ž¡No tienes privilegios para editar este comentario!");
define("_ALBM_ANONNOTALLOWED","No permitimos publicar a los usuarios an…Ïimos.");
define("_ALBM_THANKSFORPOST","Ž¡Gracias por tu envùÐ!");
define("_ALBM_DELNOTALLOWED","Ž¡No tienes privilegios para borrar este comentario!");
define("_ALBM_GOBACK","Regresar");
define("_ALBM_AREYOUSURE","Ž¿EstáÔ seguro de querer borrar este comentario y todos sus descendientes?");
define("_ALBM_COMMENTSDEL","Ž¡Comentario(s) borrado(s) correctamente!");

// End New

define("_ALBM_THANKSFORINFO","Gracias por la informaci…Ï. Revisaremos tu petici…Ï lo antes posible.");
define("_ALBM_BACKTOTOP","Volver arriba");
define("_ALBM_THANKSFORHELP","Gracias por ayudarnos a mantener la integridad de este directorio.");
define("_ALBM_FORSECURITY","Por razones de seguridad tambiñÏ almacenaremos temporalmente tu nombre de usuario y tu direcci…Ï IP.");

define("_ALBM_MATCH","Correspondencia");
define("_ALBM_ALL","Todas");
define("_ALBM_ANY","Cualquiera");
define("_ALBM_NAME","Nombre");
define("_ALBM_DESCRIPTION","Descripci…Ï");

define("_ALBM_MAIN","Principal");
define("_ALBM_POPULAR","Populares");
define("_ALBM_TOPRATED","Mejor calificadas");

define("_ALBM_POPULARITYLTOM","Popularidad (De menos a máÔ hits)");
define("_ALBM_POPULARITYMTOL","Popularidad (De máÔ a menos hits)");
define("_ALBM_TITLEATOZ","TùÕulo (A -> Z)");
define("_ALBM_TITLEZTOA","TùÕulo (Z -> A)");
define("_ALBM_DATEOLD","Fecha (Primero las máÔ viejas)");
define("_ALBM_DATENEW","Fecha (Primero las máÔ nuevas)");
define("_ALBM_RATINGLTOH","Calificaci…Ï (De menos a máÔ puntos)");
define("_ALBM_RATINGHTOL","Calificaci…Ï (De máÔ a menos puntos)");

define("_ALBM_NOSHOTS","No hay tomas de pantalla disponibles");
define("_ALBM_EDITTHISPHOTO","Editar esta foto");

define("_ALBM_DESCRIPTIONC","Descripci…Ï: ");
define("_ALBM_EMAILC","E-mail: ");
define("_ALBM_CATEGORYC","CategorùÂ: ");
define("_ALBM_SUBCATEGORY","SubcategorùÂs: ");
define("_ALBM_LASTUPDATEC","ŽÚltima actualizaci…Ï: ");
define("_ALBM_HITSC","Hits: ");
define("_ALBM_RATINGC","Calificaci…Ï: ");
define("_ALBM_ONEVOTE","1 voto");
define("_ALBM_NUMVOTES","%s votos");
define("_ALBM_ONEPOST","1 envùÐ");
define("_ALBM_NUMPOSTS","%s envùÐs");
define("_ALBM_COMMENTSC","Comentarios: ");
define("_ALBM_RATETHISPHOTO","Califica esta foto");
define("_ALBM_MODIFY","Modificar");
define("_ALBM_VSCOMMENTS","Ver/enviar comentarios");

define("_ALBM_THEREARE","Tenemos <b>%s</b> fotos en nuestro acervo.");
define("_ALBM_LATESTLIST","Las imáÈenes máÔ recientes");

define("_ALBM_VOTEAPPRE","Agradecemos tu voto.");
define("_ALBM_THANKURATE","Gracias por tomarte el tiempo de calificar una foto en %s.");
define("_ALBM_VOTEONCE","Por favor no votes máÔ de una vez por el mismo recurso.");
define("_ALBM_RATINGSCALE","La escala es de 1 a 10, donde 1 significa 'muy mal' y 10 significa 'excelente'.");
define("_ALBM_BEOBJECTIVE","Por favor sé objetivo. Si todos reciben un 1 ó un 10, de poco nos sirve la calificaci…Ï.");
define("_ALBM_DONOTVOTE","No votes por tu propio recurso.");
define("_ALBM_RATEIT","Ž¡CalifùÄalo!");

define("_ALBM_RECEIVED","Hemos recibido tu foto. Ž¡Gracias!");
define("_ALBM_ALLPENDING","Todas las fotos pasan por un proceso de autorizaci…Ï antes de publicarse.");

define("_ALBM_RANK","Rango");
define("_ALBM_CATEGORY","CategorùÂ");
define("_ALBM_HITS","Hits");
define("_ALBM_RATING","Calificaci…Ï");
define("_ALBM_VOTE","Vota");
define("_ALBM_TOP10","Las mejores 10 en la categorùÂ %s"); // %s is a photo category title

define("_ALBM_SORTBY","Ordenar por:");
define("_ALBM_TITLE","TùÕulo");
define("_ALBM_DATE","Fecha");
define("_ALBM_POPULARITY","Popularidad");
define("_ALBM_CURSORTEDBY","Actualmente estáÏ ordenadas por: %s");
define("_ALBM_FOUNDIN","Hallada en:");
define("_ALBM_PREVIOUS","Anterior");
define("_ALBM_NEXT","Siguiente");
define("_ALBM_NOMATCH","No hubo resultados para tu b“Ôqueda");

define("_ALBM_CATEGORIES","CategorùÂs");

define("_ALBM_SUBMIT","Enviar");
define("_ALBM_CANCEL","Cancelar");

define("_ALBM_MUSTREGFIRST","Lo sentimos, pero careces de privilegios para ejecutar esta acci…Ï.<br>Ž¡Por favor regùÔtrate en el sitio o fùÓmate con tus datos de usuario!");
define("_ALBM_MUSTADDCATFIRST","Lo sentimos, pero a“Ï no hay categorùÂs d…Ïde agregar fotos.<br>Ž¡Por favor crea primero una categorùÂ!");
define("_ALBM_NORATING","No elegiste una calificaci…Ï.");
define("_ALBM_CANTVOTEOWN","No puedes votar por el recurso que tú enviaste.<br>Registramos y revisamos todos los votos.");
define("_ALBM_VOTEONCE2","Vota por el recurso elegido una sola vez.<br>Registramos y revisamos todos los votos.");

//%%%%%%	Module Name 'MyAlbum' (Admin)	  %%%%%

define("_ALBM_PHOTOSWAITING","Fotos esperando autorizaci…Ï");
define("_ALBM_PHOTOMANAGER","Administraci…Ï de fotos");
define("_ALBM_CATEDIT","Agregar, modificar y borrar categorùÂs");
define("_ALBM_CHECKCONFIGS","Revisi…Ï del m…Åulo");
define("_ALBM_BATCHUPLOAD","Subida en lotes");
define("_ALBM_GENERALSET","ParáÎetros generales del áÍbum");

define("_ALBM_SUBMITTER","Remitente");
define("_ALBM_DELETE","Borrar");
define("_ALBM_NOSUBMITTED","No hay nuevos envùÐs.");
define("_ALBM_ADDMAIN","Agrega una categorùÂ de primer nivel [raùÛ]");
define("_ALBM_IMGURL","URL de la foto (Esto es opcional. La imagen que pongas será redimensionada a 50 pixeles de altura): ");
define("_ALBM_ADD","Agregar");
define("_ALBM_ADDSUB","Agregar una subcategorùÂ");
define("_ALBM_IN","en la categorùÂ");
define("_ALBM_MODCAT","Modificar categorùÂ");
define("_ALBM_DBUPDATED","Ž¡La base de datos se actualizó correctamente!");
define("_ALBM_MODREQDELETED","Solicitud de modificaci…Ï borrada.");
define("_ALBM_IMGURLMAIN","URL de la foto (Esto es opcional y s…Ío aplica a categorùÂs de primer nivel. La altura de la imagen se redimensionará a 50 pixeles): ");
define("_ALBM_PARENT","CategorùÂ padre:");
define("_ALBM_SAVE","Salvar cambios");
define("_ALBM_CATDELETED","CategorùÂ borrada.");
define("_ALBM_CATDEL_WARNING","ADVERTENCIA: Ž¿EstáÔ seguro de querer borrar esta categorùÂ, incluyendo todas sus fotos y los comentarios sobre ellas?");
define("_ALBM_YES","Sí");
define("_ALBM_NO","No");
define("_ALBM_NEWCATADDED","Ž¡La nueva categorùÂ se agregó correctamente!");
define("_ALBM_ERROREXIST","ERROR: Ž¡La foto que proporcionaste ya existe en nuestro acervo!");
define("_ALBM_ERRORTITLE","ERROR: Ž¡El tùÕulo es requerido!");
define("_ALBM_ERRORDESC","ERROR: Ž¡La descripci…Ï es requerida!");
define("_ALBM_WEAPPROVED","Hemos aprobado la liga que enviaste a nuestro acervo de fotos.");
define("_ALBM_THANKSSUBMIT","Ž¡Gracias por tu envùÐ!");
define("_ALBM_CONFUPDATED","Ž¡La configuraci…Ï se actualizó correctamente!");
?>
<?php
// Appended by Xoops Language Checker -GIJOE- in 2003-10-21 17:48:32
define('_ALBM_AM_PHOTONAVINFO','Photo NŽº %s-%s (de %s fotos escogidas)');
define('_ALBM_AM_LABEL_MOVE','Cambiar categorùÂ de las fotos escogidas');
define('_ALBM_AM_BUTTON_MOVE','Mover');
define('_ALBM_MOVINGPHOTO','Moviendo foto');
?><?php
// Appended by Xoops Language Checker -GIJOE- in 2004-01-27 15:37:02
define('_ALBM_NEW','Nueva');
define('_ALBM_UPDATED','Actualizada');
define('_ALBM_GROUPPERM_GLOBAL','Permisos Globales');

}

?>
