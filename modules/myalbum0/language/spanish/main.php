<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MB_LOADED' ) ) {



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
define( "_ALBM_AM_BUTTON_REMOVE" , "�Borrar!" ) ;
define( "_ALBM_AM_JS_REMOVECONFIRM" , "�Borrar?" ) ;
define( "_ALBM_AM_DEADLINKMAINPHOTO" , "La foto principal no existe" ) ;

define( "_ALBM_RADIO_ROTATETITLE" , "Rotaci�n de foto" ) ;
define( "_ALBM_RADIO_ROTATE0" , "no girar" ) ;
define( "_ALBM_RADIO_ROTATE90" , "girar a la derecha" ) ;
define( "_ALBM_RADIO_ROTATE180" , "girar 180 grados" ) ;
define( "_ALBM_RADIO_ROTATE270" , "girar a la izquierda" ) ;


// New MyAlbum 1.0.1 (and 1.2.0)
define("_ALBM_MOREPHOTOS","M�s fotos de %s");
define("_ALBM_REDOTHUMBS","Reconstruir miniaturas (<a href='redothumbs.php'>Actualizar</a>)");
define("_ALBM_REDOTHUMBS2","Reconstruir miniaturas");
define("_ALBM_REDOTHUMBSINFO","Un n�mero muy alto agotar� el tiempo de espera del servidor.");
define("_ALBM_REDOTHUMBSNUMBER","N�mero de miniaturas a la vez");
define("_ALBM_REDOING","Reconstruyendo: ");
define("_ALBM_BACK","Regresar");
define("_ALBM_ADDPHOTO","A�adir foto");


// New MyAlbum 1.0.0
define("_ALBM_PHOTOBATCHUPLOAD","Subir fotos en lote");
define("_ALBM_PHOTOUPLOAD","Subir fotos");
define("_ALBM_PHOTOEDITUPLOAD","Editar y re-subir foto");
define("_ALBM_MAXPIXEL","Tama�o m�ximo (pixels)");
define("_ALBM_MAXSIZE","Tama�o m�ximo (archivo)");
define("_ALBM_PHOTOTITLE","T�tulo");
define("_ALBM_PHOTOPATH","Ruta");
define("_ALBM_TEXT_DIRECTORY","Directory");
define("_ALBM_DESC_PHOTOPATH","Type the full path of the directory including photos to be registered");
define("_ALBM_MES_INVALIDDIRECTORY","Invalid directory is specified.");
define("_ALBM_MES_BATCHDONE","%s photo(s) has registered.");
define("_ALBM_MES_BATCHNONE","No photo was detected in the directory.");
define("_ALBM_PHOTODESC","Descripci�n");
define("_ALBM_PHOTOCAT","Categor�a");
define("_ALBM_SELECTFILE","Seleccionar foto");
define("_ALBM_FILEERROR","Foto no subida o demasiado grande");

define("_ALBM_BATCHBLANK","Deja el t�tulo en blanco para usar el nombre del archivo como t�tulo");
define("_ALBM_DELETEPHOTO","�Borrar?");
define("_ALBM_VALIDPHOTO","Validar");
define("_ALBM_PHOTODEL","�Borrar foto?");
define("_ALBM_DELETINGPHOTO","Borrando foto");

define("_ALBM_POSTERC","Remitente: ");
define("_ALBM_DATEC","Fecha: ");
define("_ALBM_EDITNOTALLOWED","�No tienes privilegios para editar este comentario!");
define("_ALBM_ANONNOTALLOWED","No permitimos publicar a los usuarios an�nimos.");
define("_ALBM_THANKSFORPOST","�Gracias por tu env�o!");
define("_ALBM_DELNOTALLOWED","�No tienes privilegios para borrar este comentario!");
define("_ALBM_GOBACK","Regresar");
define("_ALBM_AREYOUSURE","�Est�s seguro de querer borrar este comentario y todos sus descendientes?");
define("_ALBM_COMMENTSDEL","�Comentario(s) borrado(s) correctamente!");

// End New

define("_ALBM_THANKSFORINFO","Gracias por la informaci�n. Revisaremos tu petici�n lo antes posible.");
define("_ALBM_BACKTOTOP","Volver arriba");
define("_ALBM_THANKSFORHELP","Gracias por ayudarnos a mantener la integridad de este directorio.");
define("_ALBM_FORSECURITY","Por razones de seguridad tambi�n almacenaremos temporalmente tu nombre de usuario y tu direcci�n IP.");

define("_ALBM_MATCH","Correspondencia");
define("_ALBM_ALL","Todas");
define("_ALBM_ANY","Cualquiera");
define("_ALBM_NAME","Nombre");
define("_ALBM_DESCRIPTION","Descripci�n");

define("_ALBM_MAIN","Principal");
define("_ALBM_POPULAR","Populares");
define("_ALBM_TOPRATED","Mejor calificadas");

define("_ALBM_POPULARITYLTOM","Popularidad (De menos a m�s hits)");
define("_ALBM_POPULARITYMTOL","Popularidad (De m�s a menos hits)");
define("_ALBM_TITLEATOZ","T�tulo (A -> Z)");
define("_ALBM_TITLEZTOA","T�tulo (Z -> A)");
define("_ALBM_DATEOLD","Fecha (Primero las m�s viejas)");
define("_ALBM_DATENEW","Fecha (Primero las m�s nuevas)");
define("_ALBM_RATINGLTOH","Calificaci�n (De menos a m�s puntos)");
define("_ALBM_RATINGHTOL","Calificaci�n (De m�s a menos puntos)");

define("_ALBM_NOSHOTS","No hay tomas de pantalla disponibles");
define("_ALBM_EDITTHISPHOTO","Editar esta foto");

define("_ALBM_DESCRIPTIONC","Descripci�n: ");
define("_ALBM_EMAILC","E-mail: ");
define("_ALBM_CATEGORYC","Categor�a: ");
define("_ALBM_SUBCATEGORY","Subcategor�as: ");
define("_ALBM_LASTUPDATEC","�ltima actualizaci�n: ");
define("_ALBM_HITSC","Hits: ");
define("_ALBM_RATINGC","Calificaci�n: ");
define("_ALBM_ONEVOTE","1 voto");
define("_ALBM_NUMVOTES","%s votos");
define("_ALBM_ONEPOST","1 env�o");
define("_ALBM_NUMPOSTS","%s env�os");
define("_ALBM_COMMENTSC","Comentarios: ");
define("_ALBM_RATETHISPHOTO","Califica esta foto");
define("_ALBM_MODIFY","Modificar");
define("_ALBM_VSCOMMENTS","Ver/enviar comentarios");

define("_ALBM_THEREARE","Tenemos <b>%s</b> fotos en nuestro acervo.");
define("_ALBM_LATESTLIST","Las im�genes m�s recientes");

define("_ALBM_VOTEAPPRE","Agradecemos tu voto.");
define("_ALBM_THANKURATE","Gracias por tomarte el tiempo de calificar una foto en %s.");
define("_ALBM_VOTEONCE","Por favor no votes m�s de una vez por el mismo recurso.");
define("_ALBM_RATINGSCALE","La escala es de 1 a 10, donde 1 significa 'muy mal' y 10 significa 'excelente'.");
define("_ALBM_BEOBJECTIVE","Por favor s� objetivo. Si todos reciben un 1 � un 10, de poco nos sirve la calificaci�n.");
define("_ALBM_DONOTVOTE","No votes por tu propio recurso.");
define("_ALBM_RATEIT","�Calif�calo!");

define("_ALBM_RECEIVED","Hemos recibido tu foto. �Gracias!");
define("_ALBM_ALLPENDING","Todas las fotos pasan por un proceso de autorizaci�n antes de publicarse.");

define("_ALBM_RANK","Rango");
define("_ALBM_CATEGORY","Categor�a");
define("_ALBM_HITS","Hits");
define("_ALBM_RATING","Calificaci�n");
define("_ALBM_VOTE","Vota");
define("_ALBM_TOP10","Las mejores 10 en la categor�a %s"); // %s is a photo category title

define("_ALBM_SORTBY","Ordenar por:");
define("_ALBM_TITLE","T�tulo");
define("_ALBM_DATE","Fecha");
define("_ALBM_POPULARITY","Popularidad");
define("_ALBM_CURSORTEDBY","Actualmente est�n ordenadas por: %s");
define("_ALBM_FOUNDIN","Hallada en:");
define("_ALBM_PREVIOUS","Anterior");
define("_ALBM_NEXT","Siguiente");
define("_ALBM_NOMATCH","No hubo resultados para tu b�squeda");

define("_ALBM_CATEGORIES","Categor�as");

define("_ALBM_SUBMIT","Enviar");
define("_ALBM_CANCEL","Cancelar");

define("_ALBM_MUSTREGFIRST","Lo sentimos, pero careces de privilegios para ejecutar esta acci�n.<br>�Por favor reg�strate en el sitio o f�rmate con tus datos de usuario!");
define("_ALBM_MUSTADDCATFIRST","Lo sentimos, pero a�n no hay categor�as d�nde agregar fotos.<br>�Por favor crea primero una categor�a!");
define("_ALBM_NORATING","No elegiste una calificaci�n.");
define("_ALBM_CANTVOTEOWN","No puedes votar por el recurso que t� enviaste.<br>Registramos y revisamos todos los votos.");
define("_ALBM_VOTEONCE2","Vota por el recurso elegido una sola vez.<br>Registramos y revisamos todos los votos.");

//%%%%%%	Module Name 'MyAlbum' (Admin)	  %%%%%

define("_ALBM_PHOTOSWAITING","Fotos esperando autorizaci�n");
define("_ALBM_PHOTOMANAGER","Administraci�n de fotos");
define("_ALBM_CATEDIT","Agregar, modificar y borrar categor�as");
define("_ALBM_CHECKCONFIGS","Revisi�n del m�dulo");
define("_ALBM_BATCHUPLOAD","Subida en lotes");
define("_ALBM_GENERALSET","Par�metros generales del �lbum");

define("_ALBM_SUBMITTER","Remitente");
define("_ALBM_DELETE","Borrar");
define("_ALBM_NOSUBMITTED","No hay nuevos env�os.");
define("_ALBM_ADDMAIN","Agrega una categor�a de primer nivel [ra�z]");
define("_ALBM_IMGURL","URL de la foto (Esto es opcional. La imagen que pongas ser� redimensionada a 50 pixeles de altura): ");
define("_ALBM_ADD","Agregar");
define("_ALBM_ADDSUB","Agregar una subcategor�a");
define("_ALBM_IN","en la categor�a");
define("_ALBM_MODCAT","Modificar categor�a");
define("_ALBM_DBUPDATED","�La base de datos se actualiz� correctamente!");
define("_ALBM_MODREQDELETED","Solicitud de modificaci�n borrada.");
define("_ALBM_IMGURLMAIN","URL de la foto (Esto es opcional y s�lo aplica a categor�as de primer nivel. La altura de la imagen se redimensionar� a 50 pixeles): ");
define("_ALBM_PARENT","Categor�a padre:");
define("_ALBM_SAVE","Salvar cambios");
define("_ALBM_CATDELETED","Categor�a borrada.");
define("_ALBM_CATDEL_WARNING","ADVERTENCIA: �Est�s seguro de querer borrar esta categor�a, incluyendo todas sus fotos y los comentarios sobre ellas?");
define("_ALBM_YES","S�");
define("_ALBM_NO","No");
define("_ALBM_NEWCATADDED","�La nueva categor�a se agreg� correctamente!");
define("_ALBM_ERROREXIST","ERROR: �La foto que proporcionaste ya existe en nuestro acervo!");
define("_ALBM_ERRORTITLE","ERROR: �El t�tulo es requerido!");
define("_ALBM_ERRORDESC","ERROR: �La descripci�n es requerida!");
define("_ALBM_WEAPPROVED","Hemos aprobado la liga que enviaste a nuestro acervo de fotos.");
define("_ALBM_THANKSSUBMIT","�Gracias por tu env�o!");
define("_ALBM_CONFUPDATED","�La configuraci�n se actualiz� correctamente!");
?>
<?php
// Appended by Xoops Language Checker -GIJOE- in 2003-10-21 17:48:32
define('_ALBM_AM_PHOTONAVINFO','Photo N� %s-%s (de %s fotos escogidas)');
define('_ALBM_AM_LABEL_MOVE','Cambiar categor�a de las fotos escogidas');
define('_ALBM_AM_BUTTON_MOVE','Mover');
define('_ALBM_MOVINGPHOTO','Moviendo foto');
?><?php
// Appended by Xoops Language Checker -GIJOE- in 2004-01-27 15:37:02
define('_ALBM_NEW','Nueva');
define('_ALBM_UPDATED','Actualizada');
define('_ALBM_GROUPPERM_GLOBAL','Permisos Globales');

}

?>
