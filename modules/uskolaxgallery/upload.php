<?php

function SubirModuloFoto($carpeta, $inicio, $nombrefoto, $nombredestino, $descripcionupload, $FotoDe, $title, $keywords){
global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;

$nombredestino = strtolower(basename( $nombredestino)) ;

if (substr($nombredestino, -3)== "gif"){
	$nombredestino = basename( $nombredestino, ".gif");
	$extension = ".gif";
}
if (substr($nombredestino, -3)== "jpg"){
	$nombredestino = basename( $nombredestino, ".jpg");
	$extension = ".jpg";
}
if (substr($nombredestino, -3)== "png"){
	$nombredestino = basename( $nombredestino, ".png");
	$extension = ".png";
}
$consulta = "SELECT ID, Carpeta, Imagen, Descripcion, Aleatorio, Bloque, MCatalogos, AnchoBloque, AltoBloque, AnchoImagenes, AltoImagenes, FotosAncho, FotosAlto, EnviarFicheros, EnviarComentarios, EnviarVotaciones, EnviarEnlaces, NecesarioRegistrar, InicioDescargas, FinDescargas, InicioEnlaces, FinEnlaces, Anterior, Siguiente, InicioEncabezado, FinEncabezado, InicioPie, FinPie, InicioEncabezadoComentario, FinEncabezadoComentario, InicioComentario, FinComentario, BloquearImagenesSubidas, BloquearComentarios, TamanoMaximoFichero FROM " .$xoopsDB->prefix("uskolag_carpeta") . " Where Carpeta like '" . $carpeta . "'";

$myts = new MyTextSanitizer;
$result2 = $xoopsDB->query($consulta);
while($tbCarpeta2 = $xoopsDB->fetchArray($result2)){
	$PERMITIRENVIARFICHEROS = $tbCarpeta2['EnviarFicheros'];
	$BloquearImagenesSubidas = $tbCarpeta2['BloquearImagenesSubidas'];
	$TamañoMaximoFichero= $tbCarpeta2['TamanoMaximoFichero'];
}
if (! $PERMITIRENVIARFICHEROS){
	echo _MI_USKOLAXGALLERY_PROHIBIDOSUBIRFICHEROS;
	exit;
}
if ($TamañoMaximoFichero){
	if ($TamañoMaximoFichero < filesize($nombrefoto)){
	echo "<h1>" . _MI_USKOLAXGALLERY_TAMANOMAXIMOEXCEDIDO . $TamañoMaximoFichero . "</h1>";
	exit;
	}
}

if (file_exists("images/" . $carpeta . "/small/" . $nombredestino . $extension) ) {
	die( _MI_USKOLAXGALLERY_ERROREXISTE );
}
if ($nombrefoto != "") {
	$consulta = "SELECT ID FROM " .$xoopsDB->prefix("uskolag_imagenes"). "" ;
	$myts = new MyTextSanitizer;
	$result = $xoopsDB->query($consulta);
	$NumeroFotoAnadir = 0;
	while($tbimagen = $xoopsDB->fetchArray($result)){
		$NumeroFotoAnadir =  $tbimagen['ID'];
	}
	$NumeroFotoAnadir = $NumeroFotoAnadir + 1;
	if ($xoopsUser == ""){
		$enviadopor = "Invitado";
	}else{
		$enviadopor = "". $xoopsUser->uname();
	}
	$NombreDeFotoSubir = $nombredestino . $extension;
	$fechagrabar = date("Ymd");
	$diagrabar = date("d");
	$mesgrabar = date("m");
	$anograbar = date("Y");
	if(	$BloquearImagenesSubidas){
		copy($nombrefoto , "images/" . "bloqueadas/" .  $numerofotoanadir . $extension) or die(_MI_USKOLAXGALLERY_ERRORFICHEROGRANDE);
		$consulta = "INSERT INTO ". $xoopsDB->prefix("uskolag_imagenes") . " (ID, Carpeta, Fichero, Descripcion, Visitas, Fecha, Comentarios, EnviadoPor, Votos, Clasificacion, ano, mes, dia, Enlace, Descarga, Bloqueado, FotoDe, Title, Keywords) VALUES ('$NumeroFotoAnadir','$carpeta','$NombreDeFotoSubir', '$descripcionupload', '0', '$fechagrabar', '0', '$enviadopor','0','0','$anograbar','$mesgrabar', '$diagrabar', '$Enlace', '$Descarga', '1', '$FotoDe', '$title', '$keywords')";
		$result = $xoopsDB->query($consulta);
		if (! $result) die("error");
		exit;
	}else{
		copy($nombrefoto , "images/" . $carpeta . "/big/". $nombredestino . $extension) or die(_MI_USKOLAXGALLERY_ERRORFICHEROGRANDE . $nombrefoto . "images/" . $carpeta . "/big/");
		$consulta = "INSERT INTO ". $xoopsDB->prefix("uskolag_imagenes") . " (ID, Carpeta, Fichero, Descripcion, Visitas, Fecha, Comentarios, EnviadoPor, Votos, Clasificacion, ano, mes, dia, Enlace, Descarga, Bloqueado, FotoDe, Title, Keywords) VALUES ('$NumeroFotoAnadir','$carpeta','$NombreDeFotoSubir', '$descripcionupload', '0', '$fechagrabar', '0', '$enviadopor','0','0','$anograbar','$mesgrabar', '$diagrabar', '$Enlace', '$Descarga', '1', '$FotoDe', '$title', '$keywords')";
		$result = $xoopsDB->query($consulta);
		if (! $result) die("error subir imagen");
	}
} else {
       die(_MI_USKOLAXGALLERY_ERRORNOFICHERO);
	   exit;
}

switch ($extension){
	case ".gif":
	break;
	case ".jpg":
	break;
	case ".png":
	break;
	default:
		die(_MI_USKOLAXGALLERY_ERROREXTENSION ." - " . $extension . " - " . $nombredestino);
	exit;
}

if ($nombredestino != "") {
	comprimirfoto($carpeta, $nombredestino, $extension);
} else {
    die(_MI_USKOLAXGALLERY_ERRORNOFICHERO);
}

if (stristr($nombredestino , "..")) {
	die(_MI_USKOLAXGALLERY_ERRORNOMBREFICHERO);
} 
if (stristr($nombredestino , "/")) {
	die(_MI_USKOLAXGALLERY_ERRORNOMBREFICHERO);
} else {
	comprimirfoto($carpeta, $nombredestino, $extension, $BloquearImagenesSubidas);
}
	Set_pictModuloVisits($nombredestino . $extension, $carpeta, "publicadopor", $FotoDe);
	Set_pictModuloVisits($nombredestino . $extension, $carpeta, "descripcion", $descripcionupload);
}

function comprimirfoto($carpeta, $nombredestino, $extension, $BloquearImagenesSubidas){
global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;
$consulta2 = "SELECT ID, Carpeta, Imagen, Descripcion, Aleatorio, Bloque, MCatalogos, AnchoBloque, AltoBloque, AnchoImagenes, AltoImagenes, FotosAncho, FotosAlto, Anterior, Siguiente, InicioEncabezado, FinEncabezado, InicioPie, FinPie, InicioFoto, FinFoto, InicioMarcoFoto, FinMarcoFoto, EnviarFicheros, NombreFotoCarpeta, UsarBordes, BordesTema, BordeImagenPequenoIzquierda, BordeImagenPequenoDerecha, BordeImagenPequenoArriba, BordeImagenPequenoAbajo, UsarBordesGaleria, NombreFrameStyleGaleria, BloquearImagenesSubidas  FROM " .$xoopsDB->prefix("uskolag_carpeta") . " Where Carpeta like '" . $carpeta . "'";
$myts = new MyTextSanitizer;
$result2 = $xoopsDB->query($consulta2);
while($tbCarpeta2 = $xoopsDB->fetchArray($result2)){
	$BloquearImagenesSubidas = $tbCarpeta2['BloquearImagenesSubidas'];
	$ANCHOCARPETA= $tbCarpeta2['AnchoImagenes'];
}
switch ($extension){
	case ".gif":
		$imagefile = "images/" . $carpeta . "/big/". $nombredestino . $extension;
		$src_img = ImageCreateFromGif($imagefile);
		$image_stats = GetImageSize($imagefile); 
		$imagewidth = $image_stats[0]; 
		$imageheight = $image_stats[1]; 
		$new_w = $ANCHOCARPETA;
		$porcentaje =($imagewidth / $new_w	); 
		$new_h = round($imageheight / $porcentaje);
		$dst_img = ImageCreate($new_w,$new_h);
		imagecopyresized($dst_img,$src_img,0,0,0,0,$new_w,$new_h,imagesx($src_img),imagesy($src_img));
		ImageGif($dst_img, "images/" . $carpeta . "/small/" . $nombredestino . $extension);
	break;
	case ".jpg":
		$imagefile = "images/" . $carpeta . "/big/". $nombredestino . $extension;
		$image_stats = GetImageSize($imagefile); 
		$imagewidth = $image_stats[0]; 
		$imageheight = $image_stats[1]; 
		$new_w = $ANCHOCARPETA;
		$porcentaje = ($imagewidth / $new_w);
		$new_h = round($imageheight / $porcentaje);
		$src_img = imagecreatefromjpeg($imagefile);
		$dst_img = imagecreate($new_w,$new_h);
		imagecopyresized($dst_img,$src_img,0,0,0,0,$new_w,$new_h,imagesx($src_img),imagesy($src_img));
		imagejpeg($dst_img, "images/" . $carpeta . "/small/" . $nombredestino . $extension);
	break;
	
	case ".png":
		$imagefile = "images/" . $carpeta . "/big/". $nombredestino . $extension;
		$src_img = ImageCreateFrompng($imagefile);
		$image_stats = GetImageSize($imagefile); 
		$imagewidth = $image_stats[0]; 
		$imageheight = $image_stats[1]; 
		$new_w = $ANCHOCARPETA;
		$porcentaje =($imagewidth / $new_w	); 
		$new_h = round($imageheight / $porcentaje);
		$dst_img = imagecreate($new_w,$new_h);    
		imagecopyresized($dst_img,$src_img,0,0,0,0,$new_w,$new_h,imagesx($src_img),imagesy($src_img));
		Imagepng($dst_img, "images/" . $carpeta . "/small/" . $nombredestino . $extension);
	break;

	default:
		die(_MI_USKOLAXGALLERY_ERROREXTENSION);
	exit;
}

}


?>