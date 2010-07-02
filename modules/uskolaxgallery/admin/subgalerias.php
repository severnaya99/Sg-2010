<?php

Function AnadirSubgaleria($GaleriaActual, $Subgaleria){

global $xoopsConfig, $xoopsDB, $xoopsModule;

$NumeroSubGaleriaAnadir = 0;
$consulta = "SELECT catalogo FROM " .$xoopsDB->prefix("uskolag_catalogo"). " ORDER BY catalogo";
$myts = new MyTextSanitizer;
$result = $xoopsDB->queryf($consulta);
while($tbSubgaleria = $xoopsDB->fetchArray($result)){
	$NumeroSubGaleriaAnadir =  $tbSubgaleria['catalogo'];
}
       
$NumeroSubGaleriaAnadir = $NumeroSubGaleriaAnadir + 1;
$consulta = "INSERT INTO " . $xoopsDB->prefix("uskolag_catalogo") . " (catalogo,carpeta, nombre) VALUES ('$NumeroSubGaleriaAnadir','$GaleriaActual','$Subgaleria')";
if($result = $xoopsDB->query($consulta)){
	echo $NumeroSubGaleriaAnadir . " - " . $GaleriaActual . " - " . $Subgaleria;
} else{
	echo _AM_USKOLAXGALLERY_ERRORINSERTANDO . $Subgaleria;
}

}


Function EliminarSubgaleria($idSubgaleria){
global $xoopsConfig, $xoopsDB, $xoopsModule;
$consulta =  "DELETE FROM ". $xoopsDB->prefix("uskolag_catalogo") . " WHERE " . $xoopsDB->prefix("uskolag_catalogo"). ".catalogo=" .$idSubgaleria;
$result = $xoopsDB->queryf($consulta);

$consulta =  "DELETE FROM ". $xoopsDB->prefix("uskolag_catalogo_foto") . " WHERE " . $xoopsDB->prefix("uskolag_catalogo_foto"). ".catalogo=" .$idSubgaleria;
$result = $xoopsDB->queryf($consulta);
}


Function AnadirSubgaleriaFoto($Subgaleria, $foto){

global $xoopsConfig, $xoopsDB, $xoopsModule;
$encontradarelacion = false;
$NumeroSubGaleriaAnadir = 0;
$consulta = "SELECT catalogo,foto FROM " .$xoopsDB->prefix("uskolag_catalogo_foto"). " WHERE " . $xoopsDB->prefix("uskolag_catalogo_foto"). ".catalogo=" .$idSubgaleria . " AND " . $xoopsDB->prefix("uskolag_catalogo_foto"). "foto=" . $idFoto;
	$result = $xoopsDB->queryF($consulta);
	while($tbSubgaleria = $xoopsDB->fetchArray($result)){
		$encontradarelacion = true;
	}
	if ($encontradarelacion){
		echo "Error";
	}else{
		$consulta = "INSERT INTO " . $xoopsDB->prefix("uskolag_catalogo_foto") . " (catalogo,foto) VALUES ('$Subgaleria','$foto')";
		if($result = $xoopsDB->query($consulta)){
			echo $Subgaleria . " - " . $foto;
		} else{
			echo _AM_USKOLAXGALLERY_ERRORINSERTANDO . $Subgaleria;
		}
	}
}

Function EliminarSubgaleriaFoto($idSubgaleria, $idFoto){
global $xoopsConfig, $xoopsDB, $xoopsModule;
$consulta =  "DELETE FROM ". $xoopsDB->prefix("uskolag_catalogo_foto") . " WHERE " . $xoopsDB->prefix("uskolag_catalogo_foto"). ".catalogo=" .$idSubgaleria . " AND foto=" . $idFoto;
$result = $xoopsDB->queryf($consulta);

}



?>