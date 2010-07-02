<?php

function Set_pictModuloVisits($fichero, $carpeta, $cualcambiar, $valor)
{
$fichero = urldecode($fichero);
global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;

$consultaOpciones = "SELECT ID, Carpeta, Imagen, Descripcion, Aleatorio, Bloque, MCatalogos, AnchoBloque, AltoBloque, AnchoImagenes, AltoImagenes, FotosAncho, FotosAlto, Anterior, Siguiente, InicioEncabezadoComentario, FinEncabezadoComentario, InicioComentario, FinComentario, EnviarComentarios, EnviarVotaciones, EnviarFicheros, VerVisitas, VerFecha FROM " .$xoopsDB->prefix("uskolag_carpeta") . " Where Carpeta like '" . $carpeta . "'";
$resultOpciones = $xoopsDB->query($consultaOpciones);
while($tbCarpetaOpciones = $xoopsDB->fetchArray($resultOpciones)){
	$PERMITIRENVIARCOMENTARIOS = $tbCarpetaOpciones['EnviarComentarios'];
	$PERMITIRENVIARVOTACIONES = $tbCarpetaOpciones['EnviarVotaciones'];
}
$consultaDescripcion = "SELECT ID, Carpeta, Fichero, Descripcion, Visitas, Fecha, Comentarios, EnviadoPor, Votos, Clasificacion FROM " .$xoopsDB->prefix("uskolag_imagenes") . " Where (Carpeta like '" . $carpeta . "' AND Fichero like '" . $fichero . "')";

$resultDescripcion = $xoopsDB->query($consultaDescripcion);
$encontrado = false;
while($tbCarpetaGetDescripcion = $xoopsDB->fetchArray($resultDescripcion)){
	$encontrado = true;
	$ID = $tbCarpetaGetDescripcion['ID'];
	$descripcion = $tbCarpetaGetDescripcion['Descripcion'];
	$visitas = $tbCarpetaGetDescripcion['Visitas'];
	$fecha = $tbCarpetaGetDescripcion['dia'] . "/" . $tbCarpetaGetDescripcion['mes'] . "/" .  $tbCarpetaGetDescripcion['ano'] ;
	$enviadopor = $tbCarpetaGetDescripcion['EnviadoPor'];
	$votos = $tbCarpetaGetDescripcion['Votos'];
	$clasificacion = $tbCarpetaGetDescripcion['Clasificacion'];
	$comentarios = $tbCarpetaGetDescripcion['Comentarios'];
}

if (! $encontrado){
	EscribeModulovacio($fichero, $carpeta);
	$consultaDescripcion = "SELECT ID, Carpeta, Fichero, Descripcion, Visitas, Fecha, Comentarios, EnviadoPor, Votos, Clasificacion, ano, mes, dia, FotoDe FROM " .$xoopsDB->prefix("uskolag_imagenes") . " Where (Carpeta like '" . $carpeta . "' AND Fichero like '" . $fichero . "')";
	$resultDescripcion = $xoopsDB->query($consultaDescripcion);
	while($tbCarpetaGetDescripcion = $xoopsDB->fetchArray($resultDescripcion)){
		$ID = $tbCarpetaGetDescripcion['ID'];
		$descripcion = $tbCarpetaGetDescripcion['Descripcion'];
		$visitas = $tbCarpetaGetDescripcion['Visitas'];
		$fecha = $tbCarpetaGetDescripcion['dia'] . "/" . $tbCarpetaGetDescripcion['mes'] . "/" .  $tbCarpetaGetDescripcion['ano'] ;
		$enviadopor = $tbCarpetaGetDescripcion['EnviadoPor'];
		$votos = $tbCarpetaGetDescripcion['Votos'];
		$clasificacion = $tbCarpetaGetDescripcion['Clasificacion'];
		$comentarios = $tbCarpetaGetDescripcion['Comentarios'];
	}
}

switch ($cualcambiar) {
	case "descripcion":
		$descripcion = $valor;
		break;
	case "visitas":
		$visitas = $visitas + 1 ;
		break;
    case "comentarios":
		if (! $PERMITIRENVIARCOMENTARIOS){
			echo _MI_USKOLAXGALLERY_PROHIBIDOSUBIRCOMENTARIOS;
			exit;
		}
		$comentarios = intval($comentarios) + 1;
		$file2=fopen("images/" . $carpeta . "/comentarios/" . $fichero2 . "." . $comentarios,"w");
		if ($xoopsUser == ""){
			$uname = "Invitado";
		}else{
			$uname = "". $xoopsUser->uname();
		}
		$consultaContador = "SELECT ID FROM " .$xoopsDB->prefix("uskolag_comentarios") . "";
		$resultContador = $xoopsDB->query($consultaContador);

		$contador = 0;
		while($tbcontador = $xoopsDB->fetchArray($resultContador)){
			$contador = $tbcontador['ID']; 
		}
		$contador = $contador + 1;
		$consultaComentarios = "SELECT ID, Carpeta, BloquearComentarios FROM " .$xoopsDB->prefix("uskolag_carpeta") . " Where (Carpeta like '" . $carpeta . "')";
		$resultDescripcion = $xoopsDB->query($consultaComentarios);
		while($tbCarpetaComentarios = $xoopsDB->fetchArray($resultDescripcion)){
			$BloquearComentario = $tbCarpetaComentarios['BloquearComentarios'];
		}
		$consultaVacio2 = "INSERT INTO ". $xoopsDB->prefix("uskolag_comentarios") . " (ID, Carpeta, Fichero, Usuario, Comentario, Verificado, EsperandoVerificacion ) VALUES ('$contador','$carpeta','$fichero', '$uname', '$valor', '0', '$BloquearComentario')";
		$result = $xoopsDB->query($consultaVacio2);
		break;
	case "publicadopor":
		if ($xoopsUser == ""){
		$enviadopor = "Invitado";
		}else{
		$enviadopor = "". $xoopsUser->uname();
		}
		break;
	case "votos":
		if (! $PERMITIRENVIARVOTACIONES){
			echo _MI_USKOLAXGALLERY_PROHIBIDOSUBIRVOTACIONES;
			exit;
		}
		$votos = $votos +1;
		$clasificacion = $clasificacion + $valor;
		break;
}
$votos = intval(trim($votos));
$query = "update ".$xoopsDB->prefix("uskolag_imagenes")." set Carpeta='$carpeta', Fichero='$fichero', Visitas='$visitas', Comentarios='$comentarios', EnviadoPor='$enviadopor', Votos='$votos', Clasificacion='$clasificacion' where ID=".$ID."";
if ($cualcambiar == "visitas"){
	$xoopsDB->queryf($query) ;
}else{
	$xoopsDB->query($query) ;
}
}


?>