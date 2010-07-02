<?php

function Get_pictModuloDescripcion($fichero, $carpeta, $solocomentarios, $solodescripcion, $EscribeDescripcion){
global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;
$consultaDescripcion = "SELECT ID, Carpeta, Fichero, Descripcion, Visitas, Fecha, Comentarios, EnviadoPor, Votos, Clasificacion, ano, mes, dia, Title FROM " .$xoopsDB->prefix("uskolag_imagenes") . " Where (Carpeta like '" . $carpeta . "' AND Fichero like '" . $fichero . "')";
$resultDescripcion = $xoopsDB->query($consultaDescripcion);
$encontrado = false;
while($tbCarpetaGetDescripcion = $xoopsDB->fetchArray($resultDescripcion)){
	$encontrado = true;
	$descripcion = $tbCarpetaGetDescripcion['Title'];
	$visitas = $tbCarpetaGetDescripcion['Visitas'];
	$fecha = $tbCarpetaGetDescripcion['dia'] . "/" . $tbCarpetaGetDescripcion['mes'] . "/" .  $tbCarpetaGetDescripcion['ano'] ;
	$enviadopor = $tbCarpetaGetDescripcion['EnviadoPor'];
	$votos = $tbCarpetaGetDescripcion['Votos'];
	$clasificacion = $tbCarpetaGetDescripcion['Clasificacion'];
	$comentarios = $tbCarpetaGetDescripcion['Comentarios'];
}

if (! $encontrado){
EscribeModulovacio($fichero, $carpeta);
$consultaDescripcion = "SELECT ID, Carpeta, Fichero, Descripcion, Visitas, Fecha, Comentarios, EnviadoPor, Votos, Clasificacion, ano, mes, dia FROM " .$xoopsDB->prefix("uskolag_imagenes") . " Where (Carpeta like '" . $carpeta . "' AND Fichero like '" . $fichero . "')";
$resultDescripcion = $xoopsDB->query($consultaDescripcion);
	while($tbCarpetaGetDescripcion = $xoopsDB->fetchArray($resultDescripcion)){
		$descripcion = $tbCarpetaGetDescripcion['Descripcion'];
		$visitas = $tbCarpetaGetDescripcion['Visitas'];
		$fecha = $tbCarpetaGetDescripcion['dia'] . "/" . $tbCarpetaGetDescripcion['mes'] . "/" .  $tbCarpetaGetDescripcion['ano'] ;
		$enviadopor = $tbCarpetaGetDescripcion['EnviadoPor'];
		$votos = $tbCarpetaGetDescripcion['Votos'];
		$clasificacion = $tbCarpetaGetDescripcion['Clasificacion'];
		$comentarios = $tbCarpetaGetDescripcion['Comentarios'];
	}
}
	
if ($solodescripcion){
	if ($EscribeDescripcion){
		if (strlen($descripcion) > 0){
		echo  "<b><i><u>" .  _MI_USKOLAXGALLERY_FOTODESC . "</u></i></b><br>";
		}
	}
	echo  $descripcion . "<br>";
	} 
	else{
		$consultaOpciones = "SELECT ID, Carpeta, Imagen, Descripcion, Aleatorio, Bloque, MCatalogos, AnchoBloque, AltoBloque, AnchoImagenes, AltoImagenes, FotosAncho, FotosAlto, Anterior, Siguiente, InicioEncabezadoComentario, FinEncabezadoComentario, InicioComentario, FinComentario, EnviarComentarios, EnviarVotaciones, EnviarFicheros, VerVisitas, VerFecha FROM " .$xoopsDB->prefix("uskolag_carpeta") . " Where Carpeta like '" . $carpeta . "'";
		$resultOpciones = $xoopsDB->query($consultaOpciones);
		while($tbCarpetaOpciones = $xoopsDB->fetchArray($resultOpciones)){
			echo "<BR>";
			if ($tbCarpetaOpciones['VerVisitas']){
			echo _MI_USKOLAXGALLERY_VISITAS . $visitas . "<br>";
			}
			if ($tbCarpetaOpciones['VerFecha']){
			echo _MI_USKOLAXGALLERY_FECHA .   $fecha . "<br>";
			}
			if ($tbCarpetaOpciones['EnviarFicheros']){
			echo _MI_USKOLAXGALLERY_ENVIADOPOR .   $enviadopor . "<br>";
			}
			if ($tbCarpetaOpciones['EnviarVotaciones']){
			echo _MI_USKOLAXGALLERY_VOTOS .   $votos . "<br>";
			echo _MI_USKOLAXGALLERY_CLASIFICACION .  intval($clasificacion / $votos) . "<br>";
			}
			if ($tbCarpetaOpciones['EnviarVotaciones']){
			echo _MI_USKOLAXGALLERY_COMENTARIOS . $comentarios;
			}
		}
	}
}


?>