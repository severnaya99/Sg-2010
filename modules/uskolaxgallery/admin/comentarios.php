<?php


Function ActualizarComentario($ID, $Usuario, $Comentario){
	global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;
	$query = "update ".$xoopsDB->prefix("uskolag_comentarios")." set Usuario='$Usuario', Comentario='$Comentario'" . " WHERE " . $xoopsDB->prefix("uskolag_comentarios"). ".ID=" .$ID  . "";
	$xoopsDB->query($query) ;
}

Function EliminarComentario($ID, $carpeta, $fichero){
global $xoopsConfig, $xoopsDB, $xoopsModule;
$consulta2 =  "DELETE FROM ". $xoopsDB->prefix("uskolag_comentarios") . " WHERE " . $xoopsDB->prefix("uskolag_comentarios"). ".ID=" .$ID  . "";

$result = $xoopsDB->query($consulta2);

$consulta2 = "SELECT ID, Carpeta, Fichero, Comentarios FROM " .$xoopsDB->prefix("uskolag_imagenes") . " Where Carpeta like '" . $carpeta . "'";

$myts = new MyTextSanitizer;

$result2 = $xoopsDB->query($consulta2);

$consultaComentarios = "SELECT ID, Carpeta, Fichero, Comentarios FROM " .$xoopsDB->prefix("uskolag_imagenes") . " Where (Carpeta like '" . $carpeta . "' AND Fichero like '" . $fichero . "')";

	$myts = new MyTextSanitizer;
	$result = $xoopsDB->query($consultaComentarios);
	while($tbconsultaComentarios = $xoopsDB->fetchArray($result)){
		$comentarios = $tbconsultaComentarios['Comentarios'];
		$IDComentario= $tbconsultaComentarios['ID'];
	}
	$comentarios = $comentarios - 1;

	$query = "update ".$xoopsDB->prefix("uskolag_imagenes")." Comentarios='$Comentario'" . " WHERE " . $xoopsDB->prefix("uskolag_imagenes"). ".ID=" . $IDComentario . "";

}



?>