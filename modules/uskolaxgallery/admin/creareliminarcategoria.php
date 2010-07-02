<?php

Function AnadirCategoria(){
	echo "<table>";
	echo "<tr>";
	echo "<td>";
	echo "<form name=\"c\" method=\"post\" action=\"index.php?op=CrearCategoria\">";
	echo PreparaAyuda(_AM_USKOLAXGALLERY_NOMBRECATEGORIA, _HELP_USKOLAXGALLERY_NOMBRECATEGORIA);
	echo "<br>" . "<input type=\"text\" name=\"Categoria\" value=\"". "\">" ;
	echo "<br>";
	echo "<input type=\"submit\" name=\"GuardarCategoria\" value=\"" . _AM_USKOLAXGALLERY_GUARDARCAMBIOSCATEGORIA ."\">";
	echo "</form>";
	echo "</td>";
	echo "</tr>";
	echo "</table>";
}


Function CrearCategoria($Categoria){
	global $xoopsConfig, $xoopsDB, $xoopsModule;
	$NumeroCategoriaAnadir = 0;
	$consulta = "SELECT id FROM " .$xoopsDB->prefix("uskolag_father"). "";
	$myts = new MyTextSanitizer;
	$result = $xoopsDB->query($consulta);
	while($tbCarpeta = $xoopsDB->fetchArray($result)){
		$NumeroCategoriaAnadir =  $tbCarpeta['id'];
	}
	$NumeroCategoriaAnadir = $NumeroCategoriaAnadir + 1;
	$consulta = "INSERT INTO " . $xoopsDB->prefix("uskolag_father") . " (id, description) VALUES ('$NumeroCategoriaAnadir','$Categoria')";
	if($result = $xoopsDB->query($consulta)){
		echo $NumeroCategoriaAnadir . " - "  . $Categoria;
	} else{
		echo _AM_USKOLAXGALLERY_ERRORINSERTANDO . $NumeroCategoriaAnadir . " - "  . $Categoria;
	}
}

Function EliminaCategoria($ID){
	global $xoopsConfig, $xoopsDB, $xoopsModule;
	$consulta =  "DELETE FROM ". $xoopsDB->prefix("uskolag_father") . " WHERE " . $xoopsDB->prefix("uskolag_father"). ".id=" .$ID;
	$result = $xoopsDB->queryf($consulta);
}

Function EliminarCategoria(){
	global $xoopsConfig, $xoopsDB, $xoopsModule;
	echo "<br>";
	echo "<table>";
	echo "<tr>";
	echo "<td>";
	echo PreparaAyuda(_AM_USKOLAXGALLERY_ELIMINARCATEGORIA, _HELP_USKOLAXGALLERY_ELIMINARCATEGORIA);
	echo "<br>";
	$ConsultaCategorias = "SELECT id, description FROM " .$xoopsDB->prefix("uskolag_father") . "";
	$resultCategorias = $xoopsDB->query($ConsultaCategorias);
	echo "<form name=\"EliminarCategoria\" method=\"post\" action=\"index.php?op=EliminaCategoria\">";
	echo "<div align=center><select name=\"idCategoria\">";
	while($tbCategorias = $xoopsDB->fetchArray($resultCategorias)){
		echo "<option>" . $tbCategorias['id'] . "- " . $tbCategorias['description'] . "</option>";
	}
	echo "</select></div>";
	echo "<br>";
	echo PreparaAyuda("<input type=\"submit\" name=\"EliminarCategorias\" value=\"" . _AM_USKOLAXGALLERY_ELIMINARCATEGORIA ."\">", _HELP_USKOLAXGALLERY_ELIMINARCATEGORIA);
	echo "</form>";
	echo "</td>";
	echo "</tr>";
	echo "</table>";
}

?>