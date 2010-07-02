<?php


Function Instalar(){

global $xoopsConfig, $xoopsDB, $xoopsModule;

//Nota Cambio de TemaImagenPequeña -> a TemaImagenPequena
$Consulta = "CREATE TABLE " . $xoopsDB->prefix("uskolag_carpeta"). "( ID bigint(20) NOT NULL default '0', Carpeta char(100) default NULL, Imagen char(50) default NULL, Descripcion char(250) default NULL, Aleatorio int(11) default NULL, Bloque int(11) default NULL, MCatalogos int(11) default NULL, AnchoBloque int(11) default NULL, AltoBloque int(11) default NULL, AnchoImagenes int(11) default NULL, AltoImagenes int(11) default NULL, FotosAncho int(11) default NULL, FotosAlto int(11) default NULL, EnviarFicheros int(11) default NULL, EnviarComentarios int(11) default NULL, EnviarVotaciones int(11) default NULL, EnviarEnlaces int(11) default NULL,   NecesarioRegistrar char(100) default NULL, InicioDescargas char(250) default NULL, FinDescargas char(250) default NULL,  InicioEnlaces char(250) default NULL, FinEnlaces char(250) default NULL, Anterior char(100) default NULL, Siguiente char(100) default NULL, InicioEncabezado char(250) default NULL, FinEncabezado char(250) default NULL, InicioPie char(250) default NULL,   FinPie char(250) default NULL, BloquearComentarios int(11) default NULL, BloquearImagenesSubidas int(11) default NULL,  InicioEncabezadoComentario char(250) default NULL, FinEncabezadoComentario char(250) default NULL, InicioComentario char(250) default NULL, FinComentario char(250) default NULL, InicioDetallesFoto char(250) default NULL, FinDetallesFoto char(250) default NULL, InicioFoto char(250) default NULL, FinFoto char(250) default NULL, InicioMarcoFoto char(250) default NULL, FinMarcoFoto char(250) default NULL, InicioFotoGrande char(250) default NULL, FinFotoGrande char(250) default NULL, AleatorioListado int(11) default NULL, UsarGraficoEnNombre int(11) default NULL, FotoDescripcion char(250) default NULL, VerVisitas int(11) default NULL, VerFecha int(11) default NULL, TemaCargado char(250) default NULL, PermitirImprimir int(11) default NULL, PermitirMail int(11) default NULL, NombreFotoCarpeta char(250) default NULL, NombreFotoCarpetaSuperior char(250) default NULL, BordeImagenIzquierda char(250) default NULL, BordeImagenDerecha char(250) default NULL, BordeImagenArriba char(250) default NULL, BordeImagenAbajo char(250) default NULL, UsarBordes int(11) default NULL, BordesTema int(11) default NULL, BordeImagenPequenoIzquierda char(250) default NULL, BordeImagenPequenoDerecha char(250) default NULL, BordeImagenPequenoArriba char(250) default NULL,   BordeImagenPequenoAbajo char(250) default NULL, BordeImagenGrandeIzquierdaArriba char(250) default NULL,  BordeImagenGrandeIzquierdaCentro char(250) default NULL, BordeImagenGrandeIzquierdaAbajo char(250) default NULL,  BordeImagenGrandeCentroArriba char(250) default NULL, BordeImagenGrandeCentroAbajo char(250) default NULL,  BordeImagenGrandeDerechaArriba char(250) default NULL, BordeImagenGrandeDerechaCentro char(250) default NULL,  BordeImagenGrandeDerechaAbajo char(250) default NULL, ImagenGrandeTipo char(250) default NULL, TemaImagenGrande char(250) default NULL, TemaImagenPequena char(250) default NULL, SobreFoto tinyint(4) NOT NULL default '0', BajoFoto tinyint(4) NOT NULL default '0', UsarBordesBloque tinyint(4) NOT NULL default '0', UsarBordesGaleria tinyint(4) NOT NULL default '0', UsarBordesImagenGrande tinyint(4) NOT NULL default '0', NombreFrameStyleBlock char(250) NOT NULL default '0', NombreFrameStyleGaleria char(250) NOT NULL default '0', NombreFrameStyleImagenGrande char(250) NOT NULL default '0', TamanoMaximoFichero int(11) NOT NULL default '0',   ForzarDescripcion tinyint(4) NOT NULL default '0', ForzarTamano tinyint(4) NOT NULL default '0', ColorFondo char(11) default NULL, ColorFondo1 char(11) default NULL, ColorFondo2 char(11) default NULL, ColorFondo3 char(11) default NULL, ColorFondo4 char(11) default NULL, EspaciadoHorizontal tinyint(4) NOT NULL default '0', Espaciado tinyint(4) NOT NULL default '0', EspaciadoVertical tinyint(4) NOT NULL default '0', EspaciadoInterno tinyint(11) default NULL, PRIMARY KEY (ID)) TYPE=MyISAM;";



	if ($result = $xoopsDB->query($Consulta)){
		echo "1.- " . _AM_USKOLAXGALLERY_BIENCREARTABLA . " " . $xoopsDB->prefix("uskolag_carpeta") . " <br>";
	}else{
		echo "1.- " .  _AM_USKOLAXGALLERY_ERRORCREARTABLA . " " . $xoopsDB->prefix("uskolag_carpeta") . " <br>";
	}


$Consulta = "CREATE TABLE " . $xoopsDB->prefix("uskolag_imagenes") . "(  ID bigint(20) NOT NULL default '0',Carpeta char(100) default NULL, Fichero char(250) default NULL, Descripcion text default NULL, Visitas bigint(20) default NULL, Fecha timestamp(8) NOT NULL, Comentarios bigint(20) default NULL, EnviadoPor char(100) default NULL, Votos bigint(20) default NULL, Clasificacion bigint(20) default NULL, ano char(4) default NULL, mes char(2) default NULL, dia char(2) default NULL, Enlace char(100) default NULL, Descarga char(100) default NULL, FotoDe char(250) default NULL, Bloqueado int(11) default NULL, Title char(150) default NULL, Keywords char(250) default NULL, PRIMARY KEY (ID)) TYPE=MyISAM;";

	if ($result = $xoopsDB->query($Consulta)){
		echo "2.- " . _AM_USKOLAXGALLERY_BIENCREARTABLA . " " . $xoopsDB->prefix("uskolag_imagenes") . " <br>";
	}else{
		echo "2.- " .  _AM_USKOLAXGALLERY_ERRORCREARTABLA . " " . $xoopsDB->prefix("uskolag_imagenes") . " <br>";
	}



$Consulta = "CREATE TABLE " . $xoopsDB->prefix("uskolag_comentarios"). "( ID bigint(20) NOT NULL default '0', Carpeta varchar(100) default NULL, Fichero varchar(100) default NULL, Usuario varchar(250) default NULL, Comentario longtext, Verificado int(11) default NULL, EsperandoVerificacion int(11) default NULL, PRIMARY KEY  (ID)) TYPE=MyISAM;";

	if ($result = $xoopsDB->query($Consulta)){
		echo "3.- " . _AM_USKOLAXGALLERY_BIENCREARTABLA . " " . $xoopsDB->prefix("uskolag_comentarios") . " <br>";
	}else{
		echo "3.- " .  _AM_USKOLAXGALLERY_ERRORCREARTABLA . " " .  $xoopsDB->prefix("uskolag_comentarios") . " <br>";
	}
//echo _AM_USKOLAXGALLERY_PERMISOS;

	CHMOD (XOOPS_ROOT_PATH . "/" ."modules/uskolaxgallery/images", 0777);


$Consulta = "CREATE TABLE " . $xoopsDB->prefix("uskolag_master") . "(  ID bigint(20) NOT NULL default '0', Bienvenida text NOT NULL, BloquesAleatorios tinyint(4) NOT NULL default '0', Campo4 tinyint(4) NOT NULL default '0', SoloImagenes tinyint(4) NOT NULL default '0',  PRIMARY KEY (ID)) TYPE=MyISAM;";

	if ($result = $xoopsDB->query($Consulta)){
		echo "4.- " . _AM_USKOLAXGALLERY_BIENCREARTABLA . " " . $xoopsDB->prefix("uskolag_master") . " <br>";
	}else{
		echo "4.- " .  _AM_USKOLAXGALLERY_ERRORCREARTABLA . " " . $xoopsDB->prefix("uskolag_master") . " <br>";
	}



$Consulta = "INSERT INTO " . $xoopsDB->prefix("uskolag_master") . " VALUES (0, '<div align=\"center\"><h3><br><img src=\"GaleriaWelcomeBanner.jpg\"></h3></div>\r\nAll of the galleries listed below contain unique presentations of the finest images! Please feel free to browse the galleries (Click to select!) Some galleries may provide you with the opportunity vote for your favorites, comment, and contribute your own images! Please feel free to <a href=../contact/index.php>Contact Us</a> with your feedback!\r\n\'<P>The Staff<br>\r\n<font size=1>Webmasters: Update this message in the Galeria Admin page, \"Update Welcome Message\"</font><br><br>', 3, 0, 0);";


// to translate

	if ($result = $xoopsDB->query($Consulta)){
		echo _AM_USKOLAXGALLERY_DEFAULTVALUESOK . " <br>";
	}else{
		echo _AM_USKOLAXGALLERY_DEFAULTVALUESERROR . " <br>";
	}

$Consulta = "CREATE TABLE " . $xoopsDB->prefix("uskolag_catalogo"). "( catalogo bigint(20) NOT NULL default '0', carpeta bigint(20) NOT NULL default '0', nombre varchar(250) default NULL) TYPE=MyISAM;";

	if ($result = $xoopsDB->query($Consulta)){
		echo "5.- " . _AM_USKOLAXGALLERY_BIENCREARTABLA . " " . $xoopsDB->prefix("uskolag_catalogo") . " <br>";
	}else{
		echo "5.- " .  _AM_USKOLAXGALLERY_ERRORCREARTABLA . " " .  $xoopsDB->prefix("uskolag_catalogo") . " <br>";
	}
//echo _AM_USKOLAXGALLERY_PERMISOS;

$Consulta = "CREATE TABLE " . $xoopsDB->prefix("uskolag_catalogo_foto"). "( catalogo bigint(20) NOT NULL default '0',
  foto bigint(20) NOT NULL default '0') TYPE=MyISAM;";

	if ($result = $xoopsDB->query($Consulta)){
		echo "6.- " . _AM_USKOLAXGALLERY_BIENCREARTABLA . " " . $xoopsDB->prefix("uskolag_catalogo_foto") . " <br>";
	}else{
		echo "6.- " .  _AM_USKOLAXGALLERY_ERRORCREARTABLA . " " .  $xoopsDB->prefix("uskolag_catalogo_foto") . " <br>";
	}


$Consulta = "CREATE TABLE " . $xoopsDB->prefix("uskolag_father"). "( id int(9) NOT NULL default '0',
  description char(250) NOT NULL default '') TYPE=MyISAM;";

	if ($result = $xoopsDB->query($Consulta)){
		echo "7.- " . _AM_USKOLAXGALLERY_BIENCREARTABLA . " " . $xoopsDB->prefix("uskolag_father") . " <br>";
	}else{
		echo "7.- " .  _AM_USKOLAXGALLERY_ERRORCREARTABLA . " " .  $xoopsDB->prefix("uskolag_father") . " <br>";
	}


$Consulta = "CREATE TABLE " . $xoopsDB->prefix("uskolag_father_gallery"). "( father_id int(9) NOT NULL default '0',
  gallery_id int(9) NOT NULL default '0') TYPE=MyISAM;";

	if ($result = $xoopsDB->query($Consulta)){
		echo "8.- " . _AM_USKOLAXGALLERY_BIENCREARTABLA . " " . $xoopsDB->prefix("uskolag_father_gallery") . " <br>";
	}else{
		echo "8.- " .  _AM_USKOLAXGALLERY_ERRORCREARTABLA . " " .  $xoopsDB->prefix("uskolag_father_gallery") . " <br>";
	}

$Consulta = "ALTER TABLE " . $xoopsDB->prefix("uskolag_master").  " ADD `numerocolumnas` TINYINT(4) NOT NULL DEFAULT '0'";

	if ($result = $xoopsDB->query($Consulta)){
		echo "9.- " . _AM_USKOLAXGALLERY_BIENCAMBIARTABLA . " " . $xoopsDB->prefix("uskolag_master") . " <br>";
	}else{
		echo "9.- " .  _AM_USKOLAXGALLERY_ERRORCAMBIARTABLA . " " .  $xoopsDB->prefix("uskolag_master") . " <br>";
	}


}





?>