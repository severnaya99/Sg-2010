<?php
function DesInstalar(){

global $xoopsConfig, $xoopsDB, $xoopsModule;
$Consulta = "DROP TABLE IF EXISTS " . $xoopsDB->prefix("uskolag_carpeta");

	if ($result = $xoopsDB->query($Consulta)){
		echo "1.- " . "Drop " . " " . $xoopsDB->prefix("uskolag_carpeta") . " <br>";
	}else{
		echo "1.- " .  "Error " . " " . $xoopsDB->prefix("uskolag_carpeta") . " <br>";
	}

$Consulta = "DROP TABLE IF EXISTS " . $xoopsDB->prefix("uskolag_comentarios");

	if ($result = $xoopsDB->query($Consulta)){
		echo "2.- " . "Drop " . " " . $xoopsDB->prefix("uskolag_comentarios") . " <br>";
	}else{
		echo "2.- " .  "Error " . " " . $xoopsDB->prefix("uskolag_comentarios") . " <br>";
	}

$Consulta = "DROP TABLE IF EXISTS ". $xoopsDB->prefix("uskolag_imagenes");

	if ($result = $xoopsDB->query($Consulta)){
		echo "3.- " . "Drop " . " " . $xoopsDB->prefix("uskolag_imagenes") . " <br>";
	}else{
		echo "3.- " .  "Error " . " " . $xoopsDB->prefix("uskolag_imagenes") . " <br>";
	}


$Consulta = "DROP TABLE IF EXISTS " . $xoopsDB->prefix("uskolag_master");

	if ($result = $xoopsDB->query($Consulta)){
		echo "4.- " . "Drop " . " " . $xoopsDB->prefix("uskolag_master") . " <br>";
	}else{
		echo "4.- " .  "Error " . " " . $xoopsDB->prefix("uskolag_master") . " <br>";
	}

$Consulta = "DROP TABLE IF EXISTS " . $xoopsDB->prefix("uskolag_catalogo_foto");

	if ($result = $xoopsDB->query($Consulta)){
		echo "5.- " . "Drop " . " " . $xoopsDB->prefix("uskolag_catalogo_foto") . " <br>";
	}else{
		echo "5.- " .  "Error " . " " . $xoopsDB->prefix("uskolag_catalogo_foto") . " <br>";
	}

$Consulta = "DROP TABLE IF EXISTS " . $xoopsDB->prefix("uskolag_catalogo");

	if ($result = $xoopsDB->query($Consulta)){
		echo "6.- " . "Drop " . " " . $xoopsDB->prefix("uskolag_catalogo") . " <br>";
	}else{
		echo "6.- " .  "Error " . " " . $xoopsDB->prefix("uskolag_catalogo") . " <br>";
	}


$Consulta = "DROP TABLE IF EXISTS " . $xoopsDB->prefix("uskolag_father");

	if ($result = $xoopsDB->query($Consulta)){
		echo "7.- " . "Drop " . " " . $xoopsDB->prefix("uskolag_father") . " <br>";
	}else{
		echo "7.- " .  "Error " . " " . $xoopsDB->prefix("uskolag_father") . " <br>";
	}

$Consulta = "DROP TABLE IF EXISTS " . $xoopsDB->prefix("uskolag_father_gallery");

	if ($result = $xoopsDB->query($Consulta)){
		echo "8.- " . "Drop " . " " . $xoopsDB->prefix("uskolag_father_gallery") . " <br>";
	}else{
		echo "8.- " .  "Error " . " " . $xoopsDB->prefix("uskolag_father_gallery") . " <br>";
	}

}

?>