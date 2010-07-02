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
define("_AM_PATH_MANAGEMENT","Administración de «Rutas»");
define("_AM_LIST_BROKEN",'Listado de Anexos Rotos');

//%%%%%%        Admin Module Name  Articles         %%%%%
define("_AM_DBUPDATED","Base de Datos Actualizaca con Éxito!");
define("_AM_STORYID","Id.");
define("_AM_TITLE","Título");
define("_AM_SUMMARY","Resumen"); // By da: Not used?
define("_AM_CATEGORY","Section Name");  // By da: Not used? //****** 
define("_AM_CATEGORY2","Modify this Category:");  // By da: Not used? //******
define("_AM_POSTER","Publicado por");
define("_AM_SUBMITTED2","Fecha del envío");
define("_AM_NOSHOWART2","No Mostrar"); // By da: Not used?
define("_AM_ACTION","Acción");
define("_AM_EDIT","Editar");
define("_AM_DELETE","Eliminar");
define("_AM_LAST10ARTS","Artículos Publicados"); // By da: Not used?
define("_AM_PUBLISHED","Fecha de Publicación");
define("_AM_PUBLISHEDON","Fecha de Publicación"); 
define("_AM_GO","Enviar"); // By da: Not used?
define("_AM_EDITARTICLE","Editar Artículo");
define("_AM_POSTNEWARTICLE","Editar Artículo");
define("_AM_RUSUREDEL","¿Está seguro de querer eliminar este Artículo y sus Comentarios?");
define("_AM_YES","Si");
define("_AM_NO","No");
define("_AM_ALLOWEDHTML","HTML Permitido:"); // By da: Not used?
define("_AM_DISAMILEY","Deshabilitar Caritas"); // By da: Not used?
define("_AM_DISHTML","Disable HTML"); // By da: Not used?
define("_AM_PREVIEW","Vista Previa"); // By da: Not used?
define("_AM_SAVE","Guardar"); // By da: Not used?
define("_AM_ADD","Adicionar");
define("_AM_SMILIE","Adicionar una Carita al Artículo");
define("_AM_EXGRAPHIC","Adicionar una imagen externa al Artículo"); // By da: Not used?
define("_AM_GRAPHIC","Adicionar imagen interna (local) al Artículo");
define("_AM_FILESHOWDESCRIPT","Upload file Description");  // By da: Not used? //new
define("_AM_ARTICLEMANAGEMENT","Administración de «Artículos»");
define("_AM_ARTICLEMANAGEMENTLINKS","Administración de «Hipervínculos»"); // By da: Not used?
define("_AM_ARTICLEPREVIEW","Vista previa del Artículo");
define("_AM_ADDMCATEGORY","Crear una Sección");
define("_AM_CATEGORYNAME","Nombre de la Sección");
define("_AM_CATEGORYTAKEMETO","Pulse aqui para crear una nueva Sección.");
define("_AM_NOCATEGORY","ERROR - No se han creado Secciones.");
define("_AM_MAX40CHAR","(máx: 40 caracteres)"); // By da: Not used?
define("_AM_CATEGORYIMG","Imagen de Sección");
define("_AM_IMGNAEXLOC","Nombre de la Imagen + extensión localizada en %s"); // By da: Not used?
define("_AM_IN","<b>Crear dentro de la Sección</b> <br />(Si deja en blanco se asume como Sección principal, de lo contrario será una Sub-Sección)");
define("_AM_MOVETO","<b>Mover a la Sección</b> (Si deja en blanco, no se mueve la Sección)");
define("_AM_MODIFYCATEGORY","Modificar Sección");
define("_AM_MODIFY","Modificar");
define("_AM_PARENTCATEGORY","Sección superior"); // By da: Not used?
define("_AM_SAVECHANGE","Guardar cambios");
define("_AM_DEL","Eliminar");
define("_AM_CANCEL","Cancelar");
define("_AM_WAYSYWTDTTAL","ADVERTENCIA: ¿Está seguro de querer eliminar esta Sección con sus respectivos Artículos y Comentarios?");
// Added in Beta6
define("_AM_CATEGORYSMNGR","Administración de «Secciones»");
define("_AM_PEARTICLES","Nuevo Artículo");
define("_AM_GENERALCONF","Configuración General");

// WFSECTION
define("_AM_UPDATEFAIL","La actualización falló.");
define("_AM_EDITFILE","Editar Archivo Anexo");
define("_AM_CATEGORYDESC","Texto de la Sección");
define("_AM_FILESBASEPATH","Especifique el Directorio para los Archivos Anexos:");
define("_AM_AGRAPHICPATH","Especifique el Directorio para las Imágenes de Artículos:");
define("_AM_SGRAPHICPATH","Especifique el Directorio para las Imágenes de Secciones:");
define("_AM_SMILIECPATH","Especifique el Directorio para las Caritas:");
define("_AM_HTMLCPATH","Especifique el Directorio para los Archivos HTML:");
define("_AM_FILEUPLOADSPATH","Archivos Anexos: ");
define("_AM_FILEUPLOADSTEMPPATH","Archivos Anexos Temporales: ");
define("_AM_ARTICLESFILEPATH","Imágenes de los Artículos: ");
define("_AM_SECTIONFILEPATH","Imágenes de las Secciones: ");
define("_AM_SMILIEFILEPATH","Imágenes de las Caritas: ");
define("_AM_HTMLFILEPATH","Archivos HTML: ");
define("_AM_UPLOADCONFIGFILE","Carga del Archivo de Configuración: "); // By da: Not used?
define("_AM_ARTICLESAPAGE","Número de Artículos a mostar por página:");
define("_AM_ARTICLESAPAGE2","Número de Artículos a mostar por página antes de que se muestre la navegación:"); // By da: Not used?
define("_AM_NOIMG","Sin Imagen"); // By da: Not used?
define("_AM_PIDINVALID","La Sección superior es inválida."); // By da: Not used?
define("_AM_NOTITLE","No ha especificado un Título. El Título es requerido.");
define("_AM_FILEDEL","ADVERTENCIA: ¿Está segurdo de querer eliminar este Archivo?");
define("_AM_AFERTSETCATE","Puede adicionar Artículos después de crear la Sección."); // By da: Not used?
define("_AM_IMGUPLOAD","Cargar Imagen de Sección"); // By da: Not used?
define("_AM_IMGUPLOAD2","El Directorio de Imágenes actual es: "); // By da: Not used?
define("_AM_IMGNAME","Nombre del Archivo (Si deja en blanco se asume el nombre original del Archivo cargado)");
define("_AM_UPLOADED","Archivo Cargado con Éxito!");
define("_AM_ISNOTWRITABLE","no tiene permisos de escritura!");
define("_AM_UPLOADFAIL","ADVERTENCIA: Falló la carga de este Archivo. Motivo:");
define("_AM_NOTALLOWEDMINETYPE","No tiene permitido cargar este tipo de Archivo.");
define("_AM_FILETOOBIG","El tamaño del Archivo supera el límite permitido!");

define("_AM_CATEGORYMENU","Configuración del Índice de Secciones");
define("_AM_ARTICLE2MENU","Configuración del Índice del Artículo"); // By da: Not used?
define("_AM_ARTICLEPAGEMENU","Configuración de la Página del Artículo");
define("_AM_BLOCKMENU","Configuración de Bloques");
define("_AM_ADMINEDITMENU","Configuración General de Artículos");
define("_AM_ADMINCONFIGMENU","Configuración Administrativa");

define("_AM_ARTIMGUPLOAD","Cargar Imagen"); // By da: Not used?
define("_AM_TOPPAGETYPE","¿Mostrar los hipervínculos a los Artículos en lugar de el número de consultas?");
define("_AM_SHOWCATPIC","¿Mostrar la imagen de Sección en el Índice Principal?");
define("_AM_WYSIWYG","¿Usar el editor WYSIWYG en lugar del editor de Xoops?");
define("_AM_SHOWCOMMENTS","¿Activar los Comentarios de los usuarios para los Artículos?");
define("_AM_SUBMITTED","Artículos enviados por el usuario");  // By da: Not used? //added

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
define("_AM_ALLTXT","<h4>Administración de Artículos</h4></div><div>En la <b>Administración de Artículos</b> puede editar, eliminar o renombrar cualquier Artículo. De este modo podrá ver todos los Artículos registrados en la Base de Datos.<br /><br />"); //added
define("_AM_PUBLISHEDTXT","<h4>Administración de la Publicación de Artículos</h4></div><div>La <b>Administración de la Publicación de Artículos</b> le mostrará todos los Artículos que han sido publicados (Aprobados por el Administrador).<br /><br />Estos son todos los Artículos que aparecen en el Índice Principal de XF-Sections (Incluyendo los que son controlados con permisos de grupo).<br /><br />"); //added
define("_AM_SUBMITTEDTXT","<h4>Administración de Envíos de Artículos</h4></div><div>La <b>Administración de Envíos de Artículos</b> le mostrará todos los Artículos enviados por los usuarios del sitio web y le permitirá moderar su participación.<br /><br />Para aprobar un Artículo, pulse sobre <b>Editar</b> y luego sobre Aprobar. El Artículo propuesto quedará oficialmente aprobado y publicado.<br /><br />"); //added
define("_AM_ONLINETXT","<h4>Administración de Artículos Activos</h4></div><div>La <b>Administración de Artículos Activos</b> le mostrará todos los artículos a los que se les haya especificado estado «Activo» .<br /><br />Para cambiar el estado de un Artículo, pulse sobre <b>Editar</b> y pulse sobre la casilla de verificación <b>Activo</b>.<br /><br />"); //added
define("_AM_OFFLINETXT","<h4>Administración de Artículos Inactivos</h4></div><div>La <b>Administración de Artículos Inactivos</b> le mostrará todos los artículos a los que se les haya especificado estado «Inactivo» .<br /><br />Para cambiar el estado de un Artículo, pulse sobre <b>Editar</b> y pulse sobre la casilla de verificación <b>Inactivo</b>.<br /><br />"); //added 
define("_AM_EXPIREDTXT","<h4>Administración de Artículos Expirados</h4></div><div>La <b>Administración de Artículos Expirados</b> le mostrará todos los artículos que hayan «Expirado» .<br /><br />Para reiniciar la fecha de expiración del Artículo, pulse sobre <b>Editar</b> y espeficique la fecha/hora de expiración.<br /><br />"); //added 
define("_AM_AUTOEXPIRETXT","<h4>Administración de Artículos de Expiración Automática</h4></div><div>La <b>Administración de Artículos de Expiración Automática</b> le mostrará todos los Artículos cuya expiración haya sido programada en cierta fecha.<br /><br />Para reiniciar la fecha de expiración pulse sobre <b>Editar</b> y espeficique la fecha/hora de expiración.<br /><br />"); //added
define("_AM_AUTOTXT","<h4>Administración de la Publicación Automática</h4></div><div>La <b>Administración de la Publicación Automática</b> le mostrará todos los Artículos cuya publiación hayan sido programada para una fecha futura.<br /><br />Para cambiar la fecha de publicación, pulse sobre <b>Editar</b> y espeficique la fecha/hora de la publicación.<br /><br />"); //added
define("_AM_NOSHOWTXT","<h4>Artículo sin Índice</h4></div><div>Los <b>Artículos sin Índice</b> Son un tipo especial de Artículos. A diferencia de los Artículos normales, estos Artículos no se muesrtan en el Índice Principal, sino que serán mostrados unicamente en el Bloque «Secciones de XF-Section».<br /><br />Utilizando Artículos sin Índice conjuntamente con páginas HTML y la opción «Sin META Información» puede mostrar sólo lo que necesite. &nbsp;&nbsp;Por ejemplo, podría ser un Aviso de Privacidad, entre otro tipo de páginas.<br /><br />El resto de opciones también controlan a este tipo de Artículos comos el estado, la publicación, la expiración, ...<br /><br />"); //added

define("_AM_BLOCKCONF","Configuración de Bloques"); // By da: Not used?
define("_AM_TITLE1","Nombre del Bloque del Menú Principal:"); // By da: Not used?
define("_AM_TITLE4","Nombre del Bloque de Artículos Recientes:"); // By da: Not used?
define("_AM_TITLE5","Nombre del Bloque de Artículos Más Leídos:"); // By da: Not used?
define("_AM_ORDER","Texto de «Orden» Alternativo:"); // By da: Not used?
define("_AM_DATE","Texto de «Fecha» Alternativo:"); // By da: Not used?
define("_AM_HITS","Texto de «Consulta» Alternativo:"); // By da: Not used?
define("_AM_DISP","Texto de «Visible» Alternativo:"); // By da: Not used?
define("_AM_ARTCLS","Nombre del Bloque «Artículos»"); // By da: Not used?
define("_AM_MENU_LINKS","<b>Administración de XF-Sections</b>");
define("_AM_BAN","Sancionar al usuario"); // By da: Not used?
//New to version 0.9.2
define("_AM_CMODHEADER","Verificación de Permisos de Archivo");

// WF -> XF
define("_AM_CMODERRORINFO","Verifica que Archivos y Directorios tengan permisos de escritura.<br/><br/>XF-Section tratará de utilizar CHMOD en los Directorios utilizados. En caso de que los permisos no sean los adecuados, se mostrará un error.");

define("_AM_FILEPATH","Configuración de Carga de Archivos e Imágenes");

// WF -> XF
define("_AM_FILEPATHWARNING","Configuración de las Rutas de los directorios utilizados por XF-Section. Un mensaje de advertencia le indicará si la ruta no es correcta.<br/><br/> Si las deja en blanco, XF-Section usará las Rutas predeterminadas.<br/><br/>");
define("_AM_FILEUSEPATH","Cambiar la Ruta de usuario");
define("_AM_PATHEXIST","La Ruta ya existe!");
define("_AM_PATHNOTEXIST","La Ruta no existe! Por favor verifíquela!");
define("_AM_USERPATH","Ruta definida por el usuario"); // By da: Not used?
define("_AM_SHOWSELIMAGE","Vista previa de la Imágen seleccionada: ");  // By da: Not used? //******* Updated *******
define("_AM_SHOWSUBMENU","¿Mostrar los submenús de la Secciones?");
define("_AM_MENUS","Configuración del Índice de Secciones");
define("_AM_DEFAULTPATH","Ruta predeterminada en uso"); // By da: Not used?
define("_AM_SCROLLINGBLOCK","¿Utilizar desplazamiento en el Bloque de Artículos Recientes? (Obsoleto en esta versión)");
define("_AM_BLOCKHEIGHT","Especificar la Altura del desplazamiento Bloque");
define("_AM_DEFAULT"," Predeterminado"); // By da: Not used?
define("_AM_BLOCKAMOUNT","¿Número de líneas de desplazamiento?");
define("_AM_BLOCKDELAY","Desplazamiento del Bloque por línea");
define("_AM_LASTART","Número de Artículos nuevos a mostrar en el área administrativa: ");
define("_AM_NUMUPLOADS","Número de Archivos a Cargar al tiempo");

// WF -> XF
define("_AM_WEBMASTONLY","¿Solamente el Administrador tiene permiso para modificar la configuración de XF-Section?");

define("_AM_DEFAULTS","¿Reiniciar todas las configuraciones a los ajuestes predeterminados?");

define("_AM_NOCMODERROR","( correcto )"); // By da: Not used?
define("_AM_CMODERROR","( Permisos incorrectos o el Directorio no existe! )");

// WF -> XF
define("_AM_REVERTED","La configuración de XF-Section ha sido restaurada a sus valores predeterminados");

define("_AM_GROUPPROMPT","Permitir el Acceso a los siguientes grupos:");
define("_AM_NOVIEWPERMISSION","No tiene permiso para ver esta área."); // By da: Not used?
define("_AM_FILE","Archivo: "); // By da: Not used?
define("_AM_NOMAINTEXT","ERROR: No se encontró Texto/HTML en su Artículo! Un Artículo no puede estar vacío.");
define("_AM_DIR","Directorio: "); // By da: Not used?
define("_AM_MISC","Ajustes Varios"); // By da: Not used?

define("_AM_ISNOTWRITABLE2"," no existe en el servidor! Por favor cambie a una ruta válida! "); // By da: Not used?
define("_AM_CANNOTMODIFY"," No es posible modificar sin especifivar una ruta válida! "); // By da: Not used?
define("_AM_PATH","Ruta: "); // By da: Not used?

define("_AM_CMODHEADER2","Verificación de Archivo"); // By da: Not used?
define("_AM_ARTICLEMENU","Configuración de Índice del Artículo");
define("_AM_APPROVE","Aprobar");
define("_AM_MOVETOTOP","Poner este Artículo de primero");
define("_AM_CHANGEDATETIME","Cambiar la fecha/hora de la publiación");
define("_AM_NOWSETTIME","Fecha de publiación: %s"); // %s is datetime for publication
define("_AM_CURRENTTIME","Hora actual: %s");  // %s is the current datetime
define("_AM_SETDATETIME","Especificar la fecha/hora de la publicación");
define("_AM_MONTHC","Mes:");
define("_AM_DAYC","Día:");
define("_AM_YEARC","Año:");
define("_AM_TIMEC","Hora:");
define("_AM_AUTOAPPROVE","¿Auto aprobar los Artículos Propuestos?");

// WF -> XF
define("_AM_DEFAULTTIME","«Timestamp» usado por XF-Section:");
define("_AM_TURNOFFLINE","¿Ocultar XF-Section? (Solo los administradores pueden acceder)"); // By da: Not used?

define("_AM_SHOWMARTICLES","¿Mostrar la columna de Artículos?");
define("_AM_SHOWMUPDATED","¿Mostrar la columna Actualizados?");
define("_AM_SHORTCATTITLE","¿Recortar automáticamente el título de los Artículos?");
define("_AM_SHOWAUTHOR","¿Mostar la columna del nombre del autor?");
define("_AM_SHOWCOMMENTS2","¿Mostrar la columna de número de comentarios?");
define("_AM_SHOWFILE","¿Mostrar la columna de número de archivos?");
define("_AM_SHOWRATED","¿Mostrar la columna de Calificación?");
define("_AM_SHOWVOTES","¿Mostrar la columna de Votos?");
define("_AM_SHOWPUBLISHED","¿Mostrar la columna de fecha de publicación?");
define("_AM_SHOWHITS","¿Mostrar la columna de número de consultas?");
define("_AM_SHORTARTTITLE","¿Recortar atomáticamente el título de los Artículos?");
define("_AM_OFFLINE","<b>Ocultar Artículo</b> (El estado del artículo será Desactivado y no podrá ser visto.)");
define("_AM_BROKENREPORTS","Reportes de Hipervínculos de Archivos Rotos");
define("_AM_NOBROKEN","No se han reportado hipervínculos de Archivos rotos");
define("_AM_IGNORE","Ignorar");
define("_AM_FILEDELETED","Archivo eliminado.");
define("_AM_BROKENDELETED","Reporte de hipervínculos de archivos roto eliminado.");
define("_AM_IGNOREDESC","Ignorar (Ignora el reporte y solo elimina los <b>reportes de hipervínculos de archivos rotos</b>)");
define("_AM_DELETEDESC","Eliminar (Elimina <b>los datos de descarga reportados</b> y los<b>los reportes de hipervínculos de archivo rotos</b>.)");
define("_AM_REPORTER","Reporte enviado por");
define("_AM_FILETITLE","Título de descarga: ");

// WF -> XF
define("_AM_DLCONF","Configuración de Descargas de Archivos de XF-Section");

define("_AM_FILEDESCRIPT","Descripción del nombre de archivo"); // By da: Not used?
define("_AM_STATUS","Estado");
define("_AM_UPLOAD","Carga");
define("_AM_NOTIFYPUBLISH","Notificar por email una vez sea publicado"); // By da: Not used?
define("_AM_VIEWHTML","EditarHTML");
define("_AM_VIEWWAYSIWIG","EditarWYSIWYG");
define("_AM_CATEGORYT","Categoría");
define("_AM_ACCESS","Acceder"); // By da: Not used?
define("_AM_PAGE","Página"); // By da: Not used?
define("_AM_ARTICLEMANAGE","Administración de «Artículos»");
define("_AM_WEIGHTMANAGE","Administración de Peso");
define("_AM_UPLOADMAN","Administración de Cargas de Archivo");

// WF -> XF
define("_AM_NOADMINRIGHTS","La configuración de XF-Section solo puede ser modificada por el Administrador");

define("_AM_FILECount","Número de Archivos"); // By da: Not used?
define("_AM_ALLARTICLES","Mostrar Todos los Artículos");
define("_AM_PUBLARTICLES","Listado de Artículos Publicados");
define("_AM_SUBLARTICLES","Listado de Artículos Propuestos");
define("_AM_ONLINARTICLES","Listado de Artículos Activos");
define("_AM_OFFLIARTICLES","Listado de Artículos Inactivos");
define("_AM_EXPIREDARTICLES","Listado de Artículos Expirados");
define("_AM_AUTOEXPIREARTICLES","Listado de Artículos con Expiración Automática");
define("_AM_AUTOARTICLES","Listado de Artículos con Publicación Automática");
define("_AM_NOSHOWARTICLES","Listado de Artículos sin Índice");
define("_NOADMINRIGHTS2","Estas opciones de configuración solo pueden ser modificadas por el Administrador"); // By da: Not used?
define("_AM_CANNOTHAVECATTHERE","ERROR: Una categoría no puede ser descendiente o hija de si misma!");
define("_AM_SECTIONMANAGE","Administración de «Secciones»");
define("_AM_SECTIONMANAGELINK","Administración de Hipervínculos de Sección"); // By da: Not used?
define("_AM_FILEID","Archivo");
define("_AM_FILEICON","Ícono");
define("_AM_FILESTORE","Nombre Real");
define("_AM_REALFILENAME","Nombre");
define("_AM_USERFILENAME","Nombre para el Usuario");
define("_AM_FILEMIMETYPE","Tipo de Arvhivo");
define("_AM_FILESIZE","Tamaño del Archivo");
define("_AM_FDCOUNTER","Número de Consultas"); // By da: Not used?
define("_AM_EXPARTS","Artículos Expirados");
define("_AM_EXPIRED","Fecha de Expiració Automática");
define("_AM_CREATED","Fecha de Creación");
define("_AM_CHANGEEXPDATETIME","Modificar la fecha/hora de expiración");
define("_AM_SETEXPDATETIME","Especificar la fecha/hora de expiración");
define("_AM_NOWSETEXPTIME","La expiración del artículo está programada para: %s");
define("_AM_ANONPOST","¿Permitir que los usuarios anónimos propongan Artículos?");
define("_AM_NOTIFYSUBMIT","¿Notificar al Administrador por email siempre que se reciban artículos propuestos?");
define("_AM_SECTIONIMAGE","Imágen del Índice Principal");
define("_AM_SECTIONHEAD","Encabezado del Índice Principal");
define("_AM_SECTIONFOOT","Pie de Página del Índice Principal");
define("_AM_SHOWVOTESINART","Permitir a los usuarios calificar los artículos?");
define("_AM_SHOWREALNAME","¿Mostrar el nombre completo del usuario en el campo de «Publicado por» ? (Si el nombre completo no se ha especificado, se mostrará el nombre de la cuenta)");
define("_AM_SHOWCATEGORYIMG","¿Mostrar la imagen superior en esta sección?");
define("_AM_EDITSERVERFILE","Editar el Arvhivo del Servidor");
define("_AM_CURRENTFILENAME","Nombre de Archivo Actual: ");
define("_AM_CURRENTFILESIZE","Tamaño del Archivo: ");
define("_AM_UPLOADFOLD","Directorio de Archivos Cargados: ");
define("_AM_UPLOADPATH","Ruta: ");
define("_AM_FREEDISKSPACE","Espacio en Disco libre:");   
define("_AM_RENAMETHIS","¿Renombrar este archivo?"); // By da: Not used?
define("_AM_RENAMEFILE","Renombrar Archivo"); // By da: Not used?
define("_AM_SHOWSUMMARY","¿Mostrar la Columna de Resumen?"); 
define("_AM_SHOWICON","Mostar los íconos de «popular» y «actualizado»?");
define("_AM_INDEXHEADING","Encabezado del Índice Principal"); 
define("_AM_EXTERNALARTICLE","Artículo Externo</b> Esto ignorará el editor de texto enriquecido y el archivos HTML");  // By da: Not used?

// added in WFS v1b6
define("_AM_POPULARITY", "Popularidad");
define("_AM_ARTICLESSORT", "Orden de los Artículos");
define("_AM_NAVTOOLTYPE", "Tipo de herramienta de navegación");
define("_AM_SELECTBOX", "Menú de selección");
define("_AM_SELECTSUBS", "Menú de selección con las subsecciones");
define("_AM_LINKEDPATH", "Ruta de hipervínculos");
define("_AM_LINKSANDSELECT", "Menú de seleción e hipervínculos");
define("_AM_NONE", "Ninguno");
define("_AM_CATEGORYWEIGHT", "Peso de la Sección");
define("_AM_ARTICLEWEIGHT", "Peso del Artículo");
define("_AM_WEIGHT", "Peso");
define('_AM_DUPLICATECATEGORY','Duplicar sección');

// add
define('_AM_DUPLICATE_ARTICLES','Duplicar con Artículos');

define('_AM_COPY', 'Copiar');
define('_AM_TO', 'a');
define('_AM_NEWCATEGORYNAME', 'Nombre de la nueva Sección');
define('_AM_DUPLICATE', 'Duplicar');
define('_AM_DUPLICATEWSUBS', 'Duplicar con subsecciones');
define('_AM_ALLOWEDMIMETYPES', 'Tipos de Archivo MIME permitdos');
define('_AM_MODIFYFILE', 'Modificar Archivo del ArtículoModify Article File');
define('_AM_FILESTATS', 'Estado del Archivo Anexo');
define('_AM_FILESTAT', 'Asociado al Artículo: '); 
define('_AM_ERRORCHECK', 'Verificación de Archivo');  // By da: Not used?
define('_AM_LASTACCESS', 'Abierto por última vez');  // By da: Not used?
define('_AM_DOWNLOADED', 'Veces descargado');  // By da: Not used?
define('_AM_DOWNLOADSIZE', 'Tamaño del Archivo'); // By da: Not used?
define('_AM_UPLOADFILESIZE', 'Tamaño Máximo de Archivos Cargados (Tenga en cuenta que 1 Meg equivale a 1048576');
define('_AM_FILEMODE', 'Configuración de permisos de los archivos cargados');
define('_AM_IMGHEIGHT', 'Altura máxima de las imágenes cargadas');
define('_AM_IMGWIDTH', 'Longitud máxima de las imágenes cargadas');
define('_AM_FILEPERMISSION', 'Permisos de Archivo');   // By da: Not used?
define('_AM_IMGESIZETOBIG', 'El tamaño de la imágen (Altura o Longitud) excede el máximo permitido');
define('_AM_CATREORDERTEXT', 'Desde aqui puede reordenar las secciones<br /><br />Puede reordenar los artículos, pulsando sobre el título de la sección');  
define('_WFS_ATTACHFILE', 'Anexar Archivo');  
define('_WFS_ATTACHFILEACCESS', 'Los permisos de acceso al archivo predeterminados, serán los mismos que los del Artículo.  Dichos permisos se pueden modificar editando el archivo anexo.');  
define('_AM_WFSFILESHOW', 'Archivos Adjuntos');  
define('_AM_ATTACHEDFILE', 'Archivos');  
define('_AM_ATTACHEDFILEM', 'Administración de «Anexos»'); 
define('_AM_UPOADMANAGE', 'Administración de Archvos'); 
define('_AM_CAREORDER', 'Peso de Secciones y de Artículos');
define('_AM_CAREORDER2', 'Reordenar Secciones');
define('_AM_CAREORDER3', 'Reordenar Artículos');   

define('_AM_PICON', '¿Mostrar los Íconos del Artículo?'); 

// WF -> XF
define('_AM_JUSTHTML', '<b> Sin META Información</b> Esta opción muestra únicamente el contenido del Artículo sin encabezados y demás.');

define('_AM_NOSHOART', '<b> Artículo sin Índice</b> Esta opción no muestra el artículo en el índice de sección y sólo será visible en el Bloque de   Menú de XF-Sections.');
define('_AM_INDEXPAGECONFIG', 'Administración del «Índice Principal»');

// WF -> XF
define('_AM_INDEXPAGECONFIGTXT', 'Aqui podrá modificar el Índice Principal de XF-Sections.<br /><br />Puede cambiar encabezado, pie de página, imágen de sección.');
//define('_AM_VISITSUPPORT', 'Visite la página de WF-Sections si requiere información, actualizaciones o ayuda..<br /> WF-Sections  &copy; 2003 <a href="http://wfsections.xoops2.com/" target="_blank">WF-Sections</a>');
define('_AM_VISITSUPPORT', '');

define('_AM_REORDERID', 'Id.'); 
define('_AM_REORDERPID', 'Pid.'); 
define('_AM_REORDERTITLE', 'Título');
define('_AM_REORDERDESCRIPT', 'Descripción');
define('_AM_REORDERWEIGHT', 'Peso');
define('_AM_REORDERSUMMARY', 'Resumen');

// *** add menu: bulk import ***
define("_AM_IMPORT", "Importado por lotes de archivos HTML");
define("_AM_IMPORT_DIRNAME", "Nombre de Directorio o de Archivo");
define("_AM_IMPORT_HTMLPROC", "Procesamiento de Archivos HTML");
define("_AM_IMPORT_EXTFILTER", "Nombre del Programa Externo de Filros");

define("_AM_IMPORT_BODY", "Tomar solo el contenido del «BODY»");
define("_AM_IMPORT_INDEXHTML", "Eliminar los hipervínculos a index.html que hayan en el mismo directorio o en el directorio de nivel superior.");
define("_AM_IMPORT_LINK", "Modificar los hipervínulos al título como nombre del archivo [Change a link to a title = file name]");
define("_AM_IMPORT_IMAGE", "Modificar los hipervínculos de una imagen la la ruta de imágenes. [Chage a link of an image file into an image directory.] ");
define("_AM_IMPORT_ATMARK", "Reemplazar las @ por &amp;#064;");
define("_AM_IMPORT_TEXTPROC", "Procesar archivos de texto");
define("_AM_IMPORT_TEXTPRE", "Rodear archivos de texto con &lt;pre&gt; &lt;/pre&gt;");
define("_AM_IMPORT_IMAGEPROC", "Procesar archivos de imagen");
define("_AM_IMPORT_IMAGEDIR", "Nombre del directorio de imágenes");
define("_AM_IMPORT_IMAGECOPY", "Copiar los archivos de imagen al directorio de imágenes.");
define("_AM_IMPORT_TESTMODE", "Modo de pruebas");
define("_AM_IMPORT_TESTDB", "No almacenar en la Base de Datos. Desactive esta casita para almacenar.");
define("_AM_IMPORT_TESTEXEC", "Prueba");
define("_AM_IMPORT_TESTTEXT", "Mostrar Texto");
define("_AM_IMPORT_EXPLANE", "El tipo del archivo es determinado teniendo en cuenta la extensión.<br>Los archivos HTML tiene extensión .html o htm. <br>Los archivos de texto .txt. <br>Los archivo de imagenes .gif, .jpg, .jpeg, o .png.<br>");
define("_AM_IMPORT_ERRDIREXI", "El directorio o archivo no existe");
define("_AM_IMPORT_ERRFILEXI", "El programa de filtros no existe");
define("_AM_IMPORT_ERRFILEXEC", "El programa de filtros no es ejecutable");
define("_AM_IMPORT_ERRNOCOPY", "No se especificó la copia de imágenes [No specification of image copy]");
define("_AM_IMPORT_ERRNOIMGDIR", "No se especificó el directorio de imágenes [No specification of image directory]");
define("_AM_IMPORT_ERRIMGDIREXI", "El directorio de imágenes especificado no es un directorio");
define("_AM_IMPORT_ERRFILEEXI", "El archivo no existe");

?>
