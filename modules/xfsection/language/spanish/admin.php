<?php
// 2004/03/01 DACEVEDO 
//   Spanish Translation ES-CO v0.2

// 2004/02/28 K.OHWADA
// admin menu same as popup menu
//   add _AM_PATH_MANAGEMENT  _AM_LIST_BROKEN
// multi langauge
//   add _AM_DUPLICATE_ARTICLES
// unify a article menu and a title

// 2004/02/20 DACEVEDO 
//   Spanish Translation ES-CO v0.1

// 2003/11/21 K.OHWADA
// rename WFsection to XFsection
// add menu: bulk import

// admin menu same as popup menu
define("_AM_PREFERENCE",'Preferencias');
define("_AM_PATH_MANAGEMENT","Administraci�n de �Rutas�");
define("_AM_LIST_BROKEN",'Listado de Anexos Rotos');

//%%%%%%        Admin Module Name  Articles         %%%%%
define("_AM_DBUPDATED","Base de Datos Actualizaca con �xito!");
define("_AM_STORYID","Id.");
define("_AM_TITLE","T�tulo");
define("_AM_SUMMARY","Resumen"); // By da: Not used?
define("_AM_CATEGORY","Section Name");  // By da: Not used? //****** 
define("_AM_CATEGORY2","Modify this Category:");  // By da: Not used? //******
define("_AM_POSTER","Publicado por");
define("_AM_SUBMITTED2","Fecha del env�o");
define("_AM_NOSHOWART2","No Mostrar"); // By da: Not used?
define("_AM_ACTION","Acci�n");
define("_AM_EDIT","Editar");
define("_AM_DELETE","Eliminar");
define("_AM_LAST10ARTS","Art�culos Publicados"); // By da: Not used?
define("_AM_PUBLISHED","Fecha de Publicaci�n");
define("_AM_PUBLISHEDON","Fecha de Publicaci�n"); 
define("_AM_GO","Enviar"); // By da: Not used?
define("_AM_EDITARTICLE","Editar Art�culo");
define("_AM_POSTNEWARTICLE","Editar Art�culo");
define("_AM_RUSUREDEL","�Est� seguro de querer eliminar este Art�culo y sus Comentarios?");
define("_AM_YES","Si");
define("_AM_NO","No");
define("_AM_ALLOWEDHTML","HTML Permitido:"); // By da: Not used?
define("_AM_DISAMILEY","Deshabilitar Caritas"); // By da: Not used?
define("_AM_DISHTML","Disable HTML"); // By da: Not used?
define("_AM_PREVIEW","Vista Previa"); // By da: Not used?
define("_AM_SAVE","Guardar"); // By da: Not used?
define("_AM_ADD","Adicionar");
define("_AM_SMILIE","Adicionar una Carita al Art�culo");
define("_AM_EXGRAPHIC","Adicionar una imagen externa al Art�culo"); // By da: Not used?
define("_AM_GRAPHIC","Adicionar imagen interna (local) al Art�culo");
define("_AM_FILESHOWDESCRIPT","Upload file Description");  // By da: Not used? //new
define("_AM_ARTICLEMANAGEMENT","Administraci�n de �Art�culos�");
define("_AM_ARTICLEMANAGEMENTLINKS","Administraci�n de �Hiperv�nculos�"); // By da: Not used?
define("_AM_ARTICLEPREVIEW","Vista previa del Art�culo");
define("_AM_ADDMCATEGORY","Crear una Secci�n");
define("_AM_CATEGORYNAME","Nombre de la Secci�n");
define("_AM_CATEGORYTAKEMETO","Pulse aqui para crear una nueva Secci�n.");
define("_AM_NOCATEGORY","ERROR - No se han creado Secciones.");
define("_AM_MAX40CHAR","(m�x: 40 caracteres)"); // By da: Not used?
define("_AM_CATEGORYIMG","Imagen de Secci�n");
define("_AM_IMGNAEXLOC","Nombre de la Imagen + extensi�n localizada en %s"); // By da: Not used?
define("_AM_IN","<b>Crear dentro de la Secci�n</b> <br />(Si deja en blanco se asume como Secci�n principal, de lo contrario ser� una Sub-Secci�n)");
define("_AM_MOVETO","<b>Mover a la Secci�n</b> (Si deja en blanco, no se mueve la Secci�n)");
define("_AM_MODIFYCATEGORY","Modificar Secci�n");
define("_AM_MODIFY","Modificar");
define("_AM_PARENTCATEGORY","Secci�n superior"); // By da: Not used?
define("_AM_SAVECHANGE","Guardar cambios");
define("_AM_DEL","Eliminar");
define("_AM_CANCEL","Cancelar");
define("_AM_WAYSYWTDTTAL","ADVERTENCIA: �Est� seguro de querer eliminar esta Secci�n con sus respectivos Art�culos y Comentarios?");
// Added in Beta6
define("_AM_CATEGORYSMNGR","Administraci�n de �Secciones�");
define("_AM_PEARTICLES","Nuevo Art�culo");
define("_AM_GENERALCONF","Configuraci�n General");

// WFSECTION
define("_AM_UPDATEFAIL","La actualizaci�n fall�.");
define("_AM_EDITFILE","Editar Archivo Anexo");
define("_AM_CATEGORYDESC","Texto de la Secci�n");
define("_AM_FILESBASEPATH","Especifique el Directorio para los Archivos Anexos:");
define("_AM_AGRAPHICPATH","Especifique el Directorio para las Im�genes de Art�culos:");
define("_AM_SGRAPHICPATH","Especifique el Directorio para las Im�genes de Secciones:");
define("_AM_SMILIECPATH","Especifique el Directorio para las Caritas:");
define("_AM_HTMLCPATH","Especifique el Directorio para los Archivos HTML:");
define("_AM_FILEUPLOADSPATH","Archivos Anexos: ");
define("_AM_FILEUPLOADSTEMPPATH","Archivos Anexos Temporales: ");
define("_AM_ARTICLESFILEPATH","Im�genes de los Art�culos: ");
define("_AM_SECTIONFILEPATH","Im�genes de las Secciones: ");
define("_AM_SMILIEFILEPATH","Im�genes de las Caritas: ");
define("_AM_HTMLFILEPATH","Archivos HTML: ");
define("_AM_UPLOADCONFIGFILE","Carga del Archivo de Configuraci�n: "); // By da: Not used?
define("_AM_ARTICLESAPAGE","N�mero de Art�culos a mostar por p�gina:");
define("_AM_ARTICLESAPAGE2","N�mero de Art�culos a mostar por p�gina antes de que se muestre la navegaci�n:"); // By da: Not used?
define("_AM_NOIMG","Sin Imagen"); // By da: Not used?
define("_AM_PIDINVALID","La Secci�n superior es inv�lida."); // By da: Not used?
define("_AM_NOTITLE","No ha especificado un T�tulo. El T�tulo es requerido.");
define("_AM_FILEDEL","ADVERTENCIA: �Est� segurdo de querer eliminar este Archivo?");
define("_AM_AFERTSETCATE","Puede adicionar Art�culos despu�s de crear la Secci�n."); // By da: Not used?
define("_AM_IMGUPLOAD","Cargar Imagen de Secci�n"); // By da: Not used?
define("_AM_IMGUPLOAD2","El Directorio de Im�genes actual es: "); // By da: Not used?
define("_AM_IMGNAME","Nombre del Archivo (Si deja en blanco se asume el nombre original del Archivo cargado)");
define("_AM_UPLOADED","Archivo Cargado con �xito!");
define("_AM_ISNOTWRITABLE","no tiene permisos de escritura!");
define("_AM_UPLOADFAIL","ADVERTENCIA: Fall� la carga de este Archivo. Motivo:");
define("_AM_NOTALLOWEDMINETYPE","No tiene permitido cargar este tipo de Archivo.");
define("_AM_FILETOOBIG","El tama�o del Archivo supera el l�mite permitido!");

define("_AM_CATEGORYMENU","Configuraci�n del �ndice de Secciones");
define("_AM_ARTICLE2MENU","Configuraci�n del �ndice del Art�culo"); // By da: Not used?
define("_AM_ARTICLEPAGEMENU","Configuraci�n de la P�gina del Art�culo");
define("_AM_BLOCKMENU","Configuraci�n de Bloques");
define("_AM_ADMINEDITMENU","Configuraci�n General de Art�culos");
define("_AM_ADMINCONFIGMENU","Configuraci�n Administrativa");

define("_AM_ARTIMGUPLOAD","Cargar Imagen"); // By da: Not used?
define("_AM_TOPPAGETYPE","�Mostrar los hiperv�nculos a los Art�culos en lugar de el n�mero de consultas?");
define("_AM_SHOWCATPIC","�Mostrar la imagen de Secci�n en el �ndice Principal?");
define("_AM_WYSIWYG","�Usar el editor WYSIWYG en lugar del editor de Xoops?");
define("_AM_SHOWCOMMENTS","�Activar los Comentarios de los usuarios para los Art�culos?");
define("_AM_SUBMITTED","Art�culos enviados por el usuario");  // By da: Not used? //added

//define("_AM_ALLTXT","<h4>Article Management</h4></div><div>With <b>Article Management</b> you can edit, delete or rename any article. This mode will show every article within the database.<br /><br />"); //added
// WF -> XF
//define("_AM_PUBLISHEDTXT","<h4>Article Published Management</h4></div><div><b>Article Published Management</b> will show all articles that have been published (Approved by Webmaster).<br /><br />These are all the articles that will be shown in category listing of the XF-Section index page (including all those controlled by groupaccess).<br /><br />"); //added
//define("_AM_SUBMITTEDTXT","<h4>Article Submission Management</h4></div><div><b>Article Submission management</b> will show all articles submitted by your website users and allow you to moderate them.<br /><br />To approve an article, click on <b>Edit</b> link, then highlight the <b>Approve</b> checkbox and the save the article. The submitted article will then be published.<br /><br />"); //added
//define("_AM_ONLINETXT","<h4>Article Online Management</h4></div><div><b>Article Online Management</b> will show all articles which status has been set to 'online'.<br /><br />To change the status of an article, click on the <b>Edit</b> link and highlight the <b>online</b> checkbox off/on.<br /><br />"); //added
//define("_AM_OFFLINETXT","<h4>Article Offline Management</h4></div><div><b>Article Offline Management</b> will show all articles which status has been set to <b>offline</b>.<br /><br />To change the status of an article, click on the <b>Edit</b> link and highlight the <b>online</b> checkbox off/on.<br /><br />"); //added
//define("_AM_EXPIREDTXT","<h4>Article Expired Management</h4></div><div><b>Article Expired Management</b> will show all articles that have expired.<br /><br />You can easily reset the expire date by clicking on <b>Edit</b> link and by changing the <b>Set the date/time of expiration</b> setting.<br /><br />"); //added
//define("_AM_AUTOEXPIRETXT","<h4>Article Auto Expired Management</h4></div><div><b>Article Auto Expired Management</b> will show all articles that have been set to expire on a certain date.<br /><br />You can reset the expire date by clicking on <b>Edit</b> link and changing the <b>Set the date/time of expiration</b> setting.<br /><br />"); //added
//define("_AM_AUTOTXT","<h4>Article Auto Management</h4></div><div><b>Article Auto Publish Management</b> will show all articles that have been set to publish at a future date.<br /><br />This setting can be changed by clicking on the <b>edit</b> link and changing the 'Set the date/time of publish' setting.<br /><br />"); //added
// WF -> XF
//define("_AM_NOSHOWTXT","<h4>No Show Article</h4></div><div><b>No Show Article</b> The are a special type of article, unlike your normal articles these will not show up in article index pages and will not be seen that way.&nbsp;&nbsp; Instead, these article will only show in the `XF-Section Menu block`.<br /><br />Using this option with HTML Pages and `No Display info` (Option on the edit article page) you can show just what you want. &nbsp;&nbsp;An example of this would be a `privacy notice` page etc.<br /><br />All other options control these types of articles also. i.e. published, expired, online/offline.<br /><br />"); //added

// unify a article menu and a title
define("_AM_ALLTXT","<h4>Administraci�n de Art�culos</h4></div><div>En la <b>Administraci�n de Art�culos</b> puede editar, eliminar o renombrar cualquier Art�culo. De este modo podr� ver todos los Art�culos registrados en la Base de Datos.<br /><br />"); //added
define("_AM_PUBLISHEDTXT","<h4>Administraci�n de la Publicaci�n de Art�culos</h4></div><div>La <b>Administraci�n de la Publicaci�n de Art�culos</b> le mostrar� todos los Art�culos que han sido publicados (Aprobados por el Administrador).<br /><br />Estos son todos los Art�culos que aparecen en el �ndice Principal de XF-Sections (Incluyendo los que son controlados con permisos de grupo).<br /><br />"); //added
define("_AM_SUBMITTEDTXT","<h4>Administraci�n de Env�os de Art�culos</h4></div><div>La <b>Administraci�n de Env�os de Art�culos</b> le mostrar� todos los Art�culos enviados por los usuarios del sitio web y le permitir� moderar su participaci�n.<br /><br />Para aprobar un Art�culo, pulse sobre <b>Editar</b> y luego sobre Aprobar. El Art�culo propuesto quedar� oficialmente aprobado y publicado.<br /><br />"); //added
define("_AM_ONLINETXT","<h4>Administraci�n de Art�culos Activos</h4></div><div>La <b>Administraci�n de Art�culos Activos</b> le mostrar� todos los art�culos a los que se les haya especificado estado �Activo� .<br /><br />Para cambiar el estado de un Art�culo, pulse sobre <b>Editar</b> y pulse sobre la casilla de verificaci�n <b>Activo</b>.<br /><br />"); //added
define("_AM_OFFLINETXT","<h4>Administraci�n de Art�culos Inactivos</h4></div><div>La <b>Administraci�n de Art�culos Inactivos</b> le mostrar� todos los art�culos a los que se les haya especificado estado �Inactivo� .<br /><br />Para cambiar el estado de un Art�culo, pulse sobre <b>Editar</b> y pulse sobre la casilla de verificaci�n <b>Inactivo</b>.<br /><br />"); //added 
define("_AM_EXPIREDTXT","<h4>Administraci�n de Art�culos Expirados</h4></div><div>La <b>Administraci�n de Art�culos Expirados</b> le mostrar� todos los art�culos que hayan �Expirado� .<br /><br />Para reiniciar la fecha de expiraci�n del Art�culo, pulse sobre <b>Editar</b> y espeficique la fecha/hora de expiraci�n.<br /><br />"); //added 
define("_AM_AUTOEXPIRETXT","<h4>Administraci�n de Art�culos de Expiraci�n Autom�tica</h4></div><div>La <b>Administraci�n de Art�culos de Expiraci�n Autom�tica</b> le mostrar� todos los Art�culos cuya expiraci�n haya sido programada en cierta fecha.<br /><br />Para reiniciar la fecha de expiraci�n pulse sobre <b>Editar</b> y espeficique la fecha/hora de expiraci�n.<br /><br />"); //added
define("_AM_AUTOTXT","<h4>Administraci�n de la Publicaci�n Autom�tica</h4></div><div>La <b>Administraci�n de la Publicaci�n Autom�tica</b> le mostrar� todos los Art�culos cuya publiaci�n hayan sido programada para una fecha futura.<br /><br />Para cambiar la fecha de publicaci�n, pulse sobre <b>Editar</b> y espeficique la fecha/hora de la publicaci�n.<br /><br />"); //added
define("_AM_NOSHOWTXT","<h4>Art�culo sin �ndice</h4></div><div>Los <b>Art�culos sin �ndice</b> Son un tipo especial de Art�culos. A diferencia de los Art�culos normales, estos Art�culos no se muesrtan en el �ndice Principal, sino que ser�n mostrados unicamente en el Bloque �Secciones de XF-Section�.<br /><br />Utilizando Art�culos sin �ndice conjuntamente con p�ginas HTML y la opci�n �Sin META Informaci�n� puede mostrar s�lo lo que necesite. &nbsp;&nbsp;Por ejemplo, podr�a ser un Aviso de Privacidad, entre otro tipo de p�ginas.<br /><br />El resto de opciones tambi�n controlan a este tipo de Art�culos comos el estado, la publicaci�n, la expiraci�n, ...<br /><br />"); //added

define("_AM_BLOCKCONF","Configuraci�n de Bloques"); // By da: Not used?
define("_AM_TITLE1","Nombre del Bloque del Men� Principal:"); // By da: Not used?
define("_AM_TITLE4","Nombre del Bloque de Art�culos Recientes:"); // By da: Not used?
define("_AM_TITLE5","Nombre del Bloque de Art�culos M�s Le�dos:"); // By da: Not used?
define("_AM_ORDER","Texto de �Orden� Alternativo:"); // By da: Not used?
define("_AM_DATE","Texto de �Fecha� Alternativo:"); // By da: Not used?
define("_AM_HITS","Texto de �Consulta� Alternativo:"); // By da: Not used?
define("_AM_DISP","Texto de �Visible� Alternativo:"); // By da: Not used?
define("_AM_ARTCLS","Nombre del Bloque �Art�culos�"); // By da: Not used?
define("_AM_MENU_LINKS","<b>Administraci�n de XF-Sections</b>");
define("_AM_BAN","Sancionar al usuario"); // By da: Not used?
//New to version 0.9.2
define("_AM_CMODHEADER","Verificaci�n de Permisos de Archivo");

// WF -> XF
define("_AM_CMODERRORINFO","Verifica que Archivos y Directorios tengan permisos de escritura.<br/><br/>XF-Section tratar� de utilizar CHMOD en los Directorios utilizados. En caso de que los permisos no sean los adecuados, se mostrar� un error.");

define("_AM_FILEPATH","Configuraci�n de Carga de Archivos e Im�genes");

// WF -> XF
define("_AM_FILEPATHWARNING","Configuraci�n de las Rutas de los directorios utilizados por XF-Section. Un mensaje de advertencia le indicar� si la ruta no es correcta.<br/><br/> Si las deja en blanco, XF-Section usar� las Rutas predeterminadas.<br/><br/>");
define("_AM_FILEUSEPATH","Cambiar la Ruta de usuario");
define("_AM_PATHEXIST","La Ruta ya existe!");
define("_AM_PATHNOTEXIST","La Ruta no existe! Por favor verif�quela!");
define("_AM_USERPATH","Ruta definida por el usuario"); // By da: Not used?
define("_AM_SHOWSELIMAGE","Vista previa de la Im�gen seleccionada: ");  // By da: Not used? //******* Updated *******
define("_AM_SHOWSUBMENU","�Mostrar los submen�s de la Secciones?");
define("_AM_MENUS","Configuraci�n del �ndice de Secciones");
define("_AM_DEFAULTPATH","Ruta predeterminada en uso"); // By da: Not used?
define("_AM_SCROLLINGBLOCK","�Utilizar desplazamiento en el Bloque de Art�culos Recientes? (Obsoleto en esta versi�n)");
define("_AM_BLOCKHEIGHT","Especificar la Altura del desplazamiento Bloque");
define("_AM_DEFAULT"," Predeterminado"); // By da: Not used?
define("_AM_BLOCKAMOUNT","�N�mero de l�neas de desplazamiento?");
define("_AM_BLOCKDELAY","Desplazamiento del Bloque por l�nea");
define("_AM_LASTART","N�mero de Art�culos nuevos a mostrar en el �rea administrativa: ");
define("_AM_NUMUPLOADS","N�mero de Archivos a Cargar al tiempo");

// WF -> XF
define("_AM_WEBMASTONLY","�Solamente el Administrador tiene permiso para modificar la configuraci�n de XF-Section?");

define("_AM_DEFAULTS","�Reiniciar todas las configuraciones a los ajuestes predeterminados?");

define("_AM_NOCMODERROR","( correcto )"); // By da: Not used?
define("_AM_CMODERROR","( Permisos incorrectos o el Directorio no existe! )");

// WF -> XF
define("_AM_REVERTED","La configuraci�n de XF-Section ha sido restaurada a sus valores predeterminados");

define("_AM_GROUPPROMPT","Permitir el Acceso a los siguientes grupos:");
define("_AM_NOVIEWPERMISSION","No tiene permiso para ver esta �rea."); // By da: Not used?
define("_AM_FILE","Archivo: "); // By da: Not used?
define("_AM_NOMAINTEXT","ERROR: No se encontr� Texto/HTML en su Art�culo! Un Art�culo no puede estar vac�o.");
define("_AM_DIR","Directorio: "); // By da: Not used?
define("_AM_MISC","Ajustes Varios"); // By da: Not used?

define("_AM_ISNOTWRITABLE2"," no existe en el servidor! Por favor cambie a una ruta v�lida! "); // By da: Not used?
define("_AM_CANNOTMODIFY"," No es posible modificar sin especifivar una ruta v�lida! "); // By da: Not used?
define("_AM_PATH","Ruta: "); // By da: Not used?

define("_AM_CMODHEADER2","Verificaci�n de Archivo"); // By da: Not used?
define("_AM_ARTICLEMENU","Configuraci�n de �ndice del Art�culo");
define("_AM_APPROVE","Aprobar");
define("_AM_MOVETOTOP","Poner este Art�culo de primero");
define("_AM_CHANGEDATETIME","Cambiar la fecha/hora de la publiaci�n");
define("_AM_NOWSETTIME","Fecha de publiaci�n: %s"); // %s is datetime for publication
define("_AM_CURRENTTIME","Hora actual: %s");  // %s is the current datetime
define("_AM_SETDATETIME","Especificar la fecha/hora de la publicaci�n");
define("_AM_MONTHC","Mes:");
define("_AM_DAYC","D�a:");
define("_AM_YEARC","A�o:");
define("_AM_TIMEC","Hora:");
define("_AM_AUTOAPPROVE","�Auto aprobar los Art�culos Propuestos?");

// WF -> XF
define("_AM_DEFAULTTIME","�Timestamp� usado por XF-Section:");
define("_AM_TURNOFFLINE","�Ocultar XF-Section? (Solo los administradores pueden acceder)"); // By da: Not used?

define("_AM_SHOWMARTICLES","�Mostrar la columna de Art�culos?");
define("_AM_SHOWMUPDATED","�Mostrar la columna Actualizados?");
define("_AM_SHORTCATTITLE","�Recortar autom�ticamente el t�tulo de los Art�culos?");
define("_AM_SHOWAUTHOR","�Mostar la columna del nombre del autor?");
define("_AM_SHOWCOMMENTS2","�Mostrar la columna de n�mero de comentarios?");
define("_AM_SHOWFILE","�Mostrar la columna de n�mero de archivos?");
define("_AM_SHOWRATED","�Mostrar la columna de Calificaci�n?");
define("_AM_SHOWVOTES","�Mostrar la columna de Votos?");
define("_AM_SHOWPUBLISHED","�Mostrar la columna de fecha de publicaci�n?");
define("_AM_SHOWHITS","�Mostrar la columna de n�mero de consultas?");
define("_AM_SHORTARTTITLE","�Recortar atom�ticamente el t�tulo de los Art�culos?");
define("_AM_OFFLINE","<b>Ocultar Art�culo</b> (El estado del art�culo ser� Desactivado y no podr� ser visto.)");
define("_AM_BROKENREPORTS","Reportes de Hiperv�nculos de Archivos Rotos");
define("_AM_NOBROKEN","No se han reportado hiperv�nculos de Archivos rotos");
define("_AM_IGNORE","Ignorar");
define("_AM_FILEDELETED","Archivo eliminado.");
define("_AM_BROKENDELETED","Reporte de hiperv�nculos de archivos roto eliminado.");
define("_AM_IGNOREDESC","Ignorar (Ignora el reporte y solo elimina los <b>reportes de hiperv�nculos de archivos rotos</b>)");
define("_AM_DELETEDESC","Eliminar (Elimina <b>los datos de descarga reportados</b> y los<b>los reportes de hiperv�nculos de archivo rotos</b>.)");
define("_AM_REPORTER","Reporte enviado por");
define("_AM_FILETITLE","T�tulo de descarga: ");

// WF -> XF
define("_AM_DLCONF","Configuraci�n de Descargas de Archivos de XF-Section");

define("_AM_FILEDESCRIPT","Descripci�n del nombre de archivo"); // By da: Not used?
define("_AM_STATUS","Estado");
define("_AM_UPLOAD","Carga");
define("_AM_NOTIFYPUBLISH","Notificar por email una vez sea publicado"); // By da: Not used?
define("_AM_VIEWHTML","EditarHTML");
define("_AM_VIEWWAYSIWIG","EditarWYSIWYG");
define("_AM_CATEGORYT","Categor�a");
define("_AM_ACCESS","Acceder"); // By da: Not used?
define("_AM_PAGE","P�gina"); // By da: Not used?
define("_AM_ARTICLEMANAGE","Administraci�n de �Art�culos�");
define("_AM_WEIGHTMANAGE","Administraci�n de Peso");
define("_AM_UPLOADMAN","Administraci�n de Cargas de Archivo");

// WF -> XF
define("_AM_NOADMINRIGHTS","La configuraci�n de XF-Section solo puede ser modificada por el Administrador");

define("_AM_FILECount","N�mero de Archivos"); // By da: Not used?
define("_AM_ALLARTICLES","Mostrar Todos los Art�culos");
define("_AM_PUBLARTICLES","Listado de Art�culos Publicados");
define("_AM_SUBLARTICLES","Listado de Art�culos Propuestos");
define("_AM_ONLINARTICLES","Listado de Art�culos Activos");
define("_AM_OFFLIARTICLES","Listado de Art�culos Inactivos");
define("_AM_EXPIREDARTICLES","Listado de Art�culos Expirados");
define("_AM_AUTOEXPIREARTICLES","Listado de Art�culos con Expiraci�n Autom�tica");
define("_AM_AUTOARTICLES","Listado de Art�culos con Publicaci�n Autom�tica");
define("_AM_NOSHOWARTICLES","Listado de Art�culos sin �ndice");
define("_NOADMINRIGHTS2","Estas opciones de configuraci�n solo pueden ser modificadas por el Administrador"); // By da: Not used?
define("_AM_CANNOTHAVECATTHERE","ERROR: Una categor�a no puede ser descendiente o hija de si misma!");
define("_AM_SECTIONMANAGE","Administraci�n de �Secciones�");
define("_AM_SECTIONMANAGELINK","Administraci�n de Hiperv�nculos de Secci�n"); // By da: Not used?
define("_AM_FILEID","Archivo");
define("_AM_FILEICON","�cono");
define("_AM_FILESTORE","Nombre Real");
define("_AM_REALFILENAME","Nombre");
define("_AM_USERFILENAME","Nombre para el Usuario");
define("_AM_FILEMIMETYPE","Tipo de Arvhivo");
define("_AM_FILESIZE","Tama�o del Archivo");
define("_AM_FDCOUNTER","N�mero de Consultas"); // By da: Not used?
define("_AM_EXPARTS","Art�culos Expirados");
define("_AM_EXPIRED","Fecha de Expiraci� Autom�tica");
define("_AM_CREATED","Fecha de Creaci�n");
define("_AM_CHANGEEXPDATETIME","Modificar la fecha/hora de expiraci�n");
define("_AM_SETEXPDATETIME","Especificar la fecha/hora de expiraci�n");
define("_AM_NOWSETEXPTIME","La expiraci�n del art�culo est� programada para: %s");
define("_AM_ANONPOST","�Permitir que los usuarios an�nimos propongan Art�culos?");
define("_AM_NOTIFYSUBMIT","�Notificar al Administrador por email siempre que se reciban art�culos propuestos?");
define("_AM_SECTIONIMAGE","Im�gen del �ndice Principal");
define("_AM_SECTIONHEAD","Encabezado del �ndice Principal");
define("_AM_SECTIONFOOT","Pie de P�gina del �ndice Principal");
define("_AM_SHOWVOTESINART","Permitir a los usuarios calificar los art�culos?");
define("_AM_SHOWREALNAME","�Mostrar el nombre completo del usuario en el campo de �Publicado por� ? (Si el nombre completo no se ha especificado, se mostrar� el nombre de la cuenta)");
define("_AM_SHOWCATEGORYIMG","�Mostrar la imagen superior en esta secci�n?");
define("_AM_EDITSERVERFILE","Editar el Arvhivo del Servidor");
define("_AM_CURRENTFILENAME","Nombre de Archivo Actual: ");
define("_AM_CURRENTFILESIZE","Tama�o del Archivo: ");
define("_AM_UPLOADFOLD","Directorio de Archivos Cargados: ");
define("_AM_UPLOADPATH","Ruta: ");
define("_AM_FREEDISKSPACE","Espacio en Disco libre:");   
define("_AM_RENAMETHIS","�Renombrar este archivo?"); // By da: Not used?
define("_AM_RENAMEFILE","Renombrar Archivo"); // By da: Not used?
define("_AM_SHOWSUMMARY","�Mostrar la Columna de Resumen?"); 
define("_AM_SHOWICON","Mostar los �conos de �popular� y �actualizado�?");
define("_AM_INDEXHEADING","Encabezado del �ndice Principal"); 
define("_AM_EXTERNALARTICLE","Art�culo Externo</b> Esto ignorar� el editor de texto enriquecido y el archivos HTML");  // By da: Not used?

// added in WFS v1b6
define("_AM_POPULARITY", "Popularidad");
define("_AM_ARTICLESSORT", "Orden de los Art�culos");
define("_AM_NAVTOOLTYPE", "Tipo de herramienta de navegaci�n");
define("_AM_SELECTBOX", "Men� de selecci�n");
define("_AM_SELECTSUBS", "Men� de selecci�n con las subsecciones");
define("_AM_LINKEDPATH", "Ruta de hiperv�nculos");
define("_AM_LINKSANDSELECT", "Men� de seleci�n e hiperv�nculos");
define("_AM_NONE", "Ninguno");
define("_AM_CATEGORYWEIGHT", "Peso de la Secci�n");
define("_AM_ARTICLEWEIGHT", "Peso del Art�culo");
define("_AM_WEIGHT", "Peso");
define('_AM_DUPLICATECATEGORY','Duplicar secci�n');

// add
define('_AM_DUPLICATE_ARTICLES','Duplicar con Art�culos');

define('_AM_COPY', 'Copiar');
define('_AM_TO', 'a');
define('_AM_NEWCATEGORYNAME', 'Nombre de la nueva Secci�n');
define('_AM_DUPLICATE', 'Duplicar');
define('_AM_DUPLICATEWSUBS', 'Duplicar con subsecciones');
define('_AM_ALLOWEDMIMETYPES', 'Tipos de Archivo MIME permitdos');
define('_AM_MODIFYFILE', 'Modificar Archivo del Art�culoModify Article File');
define('_AM_FILESTATS', 'Estado del Archivo Anexo');
define('_AM_FILESTAT', 'Asociado al Art�culo: '); 
define('_AM_ERRORCHECK', 'Verificaci�n de Archivo');  // By da: Not used?
define('_AM_LASTACCESS', 'Abierto por �ltima vez');  // By da: Not used?
define('_AM_DOWNLOADED', 'Veces descargado');  // By da: Not used?
define('_AM_DOWNLOADSIZE', 'Tama�o del Archivo'); // By da: Not used?
define('_AM_UPLOADFILESIZE', 'Tama�o M�ximo de Archivos Cargados (Tenga en cuenta que 1 Meg equivale a 1048576');
define('_AM_FILEMODE', 'Configuraci�n de permisos de los archivos cargados');
define('_AM_IMGHEIGHT', 'Altura m�xima de las im�genes cargadas');
define('_AM_IMGWIDTH', 'Longitud m�xima de las im�genes cargadas');
define('_AM_FILEPERMISSION', 'Permisos de Archivo');   // By da: Not used?
define('_AM_IMGESIZETOBIG', 'El tama�o de la im�gen (Altura o Longitud) excede el m�ximo permitido');
define('_AM_CATREORDERTEXT', 'Desde aqui puede reordenar las secciones<br /><br />Puede reordenar los art�culos, pulsando sobre el t�tulo de la secci�n');  
define('_WFS_ATTACHFILE', 'Anexar Archivo');  
define('_WFS_ATTACHFILEACCESS', 'Los permisos de acceso al archivo predeterminados, ser�n los mismos que los del Art�culo.  Dichos permisos se pueden modificar editando el archivo anexo.');  
define('_AM_WFSFILESHOW', 'Archivos Adjuntos');  
define('_AM_ATTACHEDFILE', 'Archivos');  
define('_AM_ATTACHEDFILEM', 'Administraci�n de �Anexos�'); 
define('_AM_UPOADMANAGE', 'Administraci�n de Archvos'); 
define('_AM_CAREORDER', 'Peso de Secciones y de Art�culos');
define('_AM_CAREORDER2', 'Reordenar Secciones');
define('_AM_CAREORDER3', 'Reordenar Art�culos');   

define('_AM_PICON', '�Mostrar los �conos del Art�culo?'); 

// WF -> XF
define('_AM_JUSTHTML', '<b> Sin META Informaci�n</b> Esta opci�n muestra �nicamente el contenido del Art�culo sin encabezados y dem�s.');

define('_AM_NOSHOART', '<b> Art�culo sin �ndice</b> Esta opci�n no muestra el art�culo en el �ndice de secci�n y s�lo ser� visible en el Bloque de   Men� de XF-Sections.');
define('_AM_INDEXPAGECONFIG', 'Administraci�n del ��ndice Principal�');

// WF -> XF
define('_AM_INDEXPAGECONFIGTXT', 'Aqui podr� modificar el �ndice Principal de XF-Sections.<br /><br />Puede cambiar encabezado, pie de p�gina, im�gen de secci�n.');
//define('_AM_VISITSUPPORT', 'Visite la p�gina de WF-Sections si requiere informaci�n, actualizaciones o ayuda..<br /> WF-Sections  &copy; 2003 <a href="http://wfsections.xoops2.com/" target="_blank">WF-Sections</a>');
define('_AM_VISITSUPPORT', '');

define('_AM_REORDERID', 'Id.'); 
define('_AM_REORDERPID', 'Pid.'); 
define('_AM_REORDERTITLE', 'T�tulo');
define('_AM_REORDERDESCRIPT', 'Descripci�n');
define('_AM_REORDERWEIGHT', 'Peso');
define('_AM_REORDERSUMMARY', 'Resumen');

// *** add menu: bulk import ***
define("_AM_IMPORT", "Importado por lotes de archivos HTML");
define("_AM_IMPORT_DIRNAME", "Nombre de Directorio o de Archivo");
define("_AM_IMPORT_HTMLPROC", "Procesamiento de Archivos HTML");
define("_AM_IMPORT_EXTFILTER", "Nombre del Programa Externo de Filros");

define("_AM_IMPORT_BODY", "Tomar solo el contenido del �BODY�");
define("_AM_IMPORT_INDEXHTML", "Eliminar los hiperv�nculos a index.html que hayan en el mismo directorio o en el directorio de nivel superior.");
define("_AM_IMPORT_LINK", "Modificar los hiperv�nulos al t�tulo como nombre del archivo [Change a link to a title = file name]");
define("_AM_IMPORT_IMAGE", "Modificar los hiperv�nculos de una imagen la la ruta de im�genes. [Chage a link of an image file into an image directory.] ");
define("_AM_IMPORT_ATMARK", "Reemplazar las @ por &amp;#064;");
define("_AM_IMPORT_TEXTPROC", "Procesar archivos de texto");
define("_AM_IMPORT_TEXTPRE", "Rodear archivos de texto con &lt;pre&gt; &lt;/pre&gt;");
define("_AM_IMPORT_IMAGEPROC", "Procesar archivos de imagen");
define("_AM_IMPORT_IMAGEDIR", "Nombre del directorio de im�genes");
define("_AM_IMPORT_IMAGECOPY", "Copiar los archivos de imagen al directorio de im�genes.");
define("_AM_IMPORT_TESTMODE", "Modo de pruebas");
define("_AM_IMPORT_TESTDB", "No almacenar en la Base de Datos. Desactive esta casita para almacenar.");
define("_AM_IMPORT_TESTEXEC", "Prueba");
define("_AM_IMPORT_TESTTEXT", "Mostrar Texto");
define("_AM_IMPORT_EXPLANE", "El tipo del archivo es determinado teniendo en cuenta la extensi�n.<br>Los archivos HTML tiene extensi�n .html o htm. <br>Los archivos de texto .txt. <br>Los archivo de imagenes .gif, .jpg, .jpeg, o .png.<br>");
define("_AM_IMPORT_ERRDIREXI", "El directorio o archivo no existe");
define("_AM_IMPORT_ERRFILEXI", "El programa de filtros no existe");
define("_AM_IMPORT_ERRFILEXEC", "El programa de filtros no es ejecutable");
define("_AM_IMPORT_ERRNOCOPY", "No se especific� la copia de im�genes [No specification of image copy]");
define("_AM_IMPORT_ERRNOIMGDIR", "No se especific� el directorio de im�genes [No specification of image directory]");
define("_AM_IMPORT_ERRIMGDIREXI", "El directorio de im�genes especificado no es un directorio");
define("_AM_IMPORT_ERRFILEEXI", "El archivo no existe");

?>
