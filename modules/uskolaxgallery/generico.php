<?php

function Get_Image_listPro($dir) { 
if(!$dir) { 
  $dir = "."; 
} 
$file_array = array(); 
$dir_handle = opendir($dir); 
$a = 0; 
while($file = readdir($dir_handle)) {
	if((preg_match("/.jpg/i",$file)) || // can add more here 
	   (preg_match('/.png/i',$file)) || // or take some away 
	   (preg_match('/.gif/i',$file)) || 
	   (preg_match('/.jpeg/i',$file)))  
	{  $file_array[$a] = $file; 
	   $a++; } 
} 
return $file_array; 
} 


function CorrigeModuloPro($Foto){
	$Foto = rawurlencode($Foto);	
	return $Foto;
}


function EscribeModulovacio($fichero, $carpeta){
global $xoopsConfig, $xoopsDB, $xoopsModule;
$NumeroFotoAnadir = 0;
$fichero = urldecode($fichero);
$ConsultaVacio = "SELECT ID FROM " .$xoopsDB->prefix("uskolag_imagenes"). " Order by ID";
$myts = new MyTextSanitizer;
$result = $xoopsDB->query($ConsultaVacio);
while($tbFotoVacio = $xoopsDB->fetchArray($result)){
	$NumeroFotoAnadir =  $tbFotoVacio['ID'];
}
$NumeroFotoAnadir = $NumeroFotoAnadir + 1;
$fechagrabar = date("Ymd");
$diagrabar = date("d");
$mesgrabar = date("m");
$anograbar = date("Y");
$consultaVacio2 = "INSERT INTO ". $xoopsDB->prefix("uskolag_imagenes") . " (ID, Carpeta, Fichero, Descripcion, Visitas, Fecha, Comentarios, EnviadoPor, Votos, Clasificacion, ano, mes, dia) VALUES ('$NumeroFotoAnadir','$carpeta','$fichero', '', '0', '$fechagrabar', '0', '', '0', '0', '$anograbar', '$mesgrabar', '$diagrabar')";
$result = $xoopsDB->queryf($consultaVacio2);
}

?>