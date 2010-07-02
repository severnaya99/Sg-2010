<?php

/*
   USKOLAxGALLERY. -Modulo y bloque para ver imagenes en pantalla.

   Copyright (C) 2002 Aitor Uskola
   aitor@uskola.com
   www.uskola.com

   Developed by Aitor Uskola and Carol Hess

   This program is free software; you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation; either version 2 of the License, or
   (at your option) any later version.

   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with this program; if not, write to the Free Software
   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

function Get_Image_listPro2($dir) {
if(!$dir) {
  $dir = ".";
}
$file_array = array();
$dir_handle = opendir($dir);
$a = 0;
while($file = readdir($dir_handle)) {
if((preg_match('/.jpg/i',$file)) || // can add more here
   (preg_match('/.png/i',$file)) || // or take some away
   (preg_match('/.gif/i',$file)) ||
   (preg_match('/.jpeg/i',$file)))  {

	   $file_array[$a] = $file;
	   $a++;
	}
}
return $file_array;
}



Function NumeroBloques2($NumerodeCarpetas){

global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;

$InformacionBloques = array();
$ArrayDevolucion = array();

$consulta = "SELECT ID, Carpeta, Imagen, Descripcion, Aleatorio, Bloque, MCatalogos, AnchoBloque, AltoBloque, AnchoImagenes, AltoImagenes, FotosAncho, FotosAlto, EnviarFicheros, EnviarComentarios, EnviarVotaciones, EnviarEnlaces, NecesarioRegistrar, InicioDescargas, FinDescargas, InicioEnlaces, FinEnlaces, Anterior, Siguiente, InicioEncabezado, FinEncabezado, InicioPie, FinPie, InicioEncabezadoComentario, FinEncabezadoComentario, InicioComentario, FinComentario, BloquearImagenesSubidas, BloquearComentarios, InicioFoto, FinFoto, InicioMarcoFoto, FinMarcoFoto, AleatorioListado, FotoDescripcion, NombreFotoCarpeta, NombreFotoCarpetaSuperior, BordeImagenIzquierda, BordeImagenDerecha, BordeImagenArriba, BordeImagenAbajo, UsarBordes, BordesTema, UsarBordesBloque, NombreFrameStyleBlock FROM " .$xoopsDB->prefix("uskolag_carpeta"). " Where Bloque=1";


$myts = new MyTextSanitizer;
$result = $xoopsDB->query($consulta);


while($tbCarpeta = $xoopsDB->fetchArray($result)){
	$InformacionBloques[]= $tbCarpeta['Carpeta'];

}



if (mysql_num_rows($result) <= $NumerodeCarpetas){
return $InformacionBloques;
exit;
}

$NumeroCarpetas = 0;
$TotalCapetas = count($InformacionBloques) -1;
while ($NumerodeCarpetas > $NumeroCarpetas) {
$FicheroRandom = rand (0, $TotalCapetas);
	if(! in_array($InformacionBloques[$FicheroRandom],$ArrayDevolucion)){
		$ArrayDevolucion[] = $InformacionBloques[$FicheroRandom];
		$NumeroCarpetas = $NumeroCarpetas +1;
	}
}

return $ArrayDevolucion;
}



Function ReCorrigeProBloque($Foto){
	$Foto = rawurlencode($Foto);
	return $Foto;
}


Function PictureStart($UsarBordes, $BordesTema, $ImagenArriba, $ImagenIzquierda, $ImagenDerecha, $ImagenAbajo){
global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;

$CadenaBorde = "";

	if ($UsarBordes){
		$CadenaBorde .= "<table cellpadding=\"0\" cellspacing=\"0\"><tr colspan=3><td>";
		if ($BordesTema){
			$CadenaBorde .= "<img src=\"" . XOOPS_URL . "/themes/" . getTheme() . "/images/" . $ImagenArriba . " \">";
		}else{
			$CadenaBorde .= "<img src=\"" .  $xoopsConfig['xoops_url'] . "/modules/uskolaxgallery/icons/" . $ImagenArriba . "\">" ;
		}
		$CadenaBorde .= "</td></tr><tr><td>";
		if ($BordesTema){
			$CadenaBorde .= "<img src=\"" . XOOPS_URL . "/themes/" . getTheme() . "/images/" . $ImagenIzquierda . "\">";
		}else{
			$CadenaBorde .= "<img src=\"" .  $xoopsConfig['xoops_url'] . "/		modules/uskolaxgallery/icons/"  . $ImagenIzquierda . "\">" ;
		}
		$CadenaBorde .= "";
	}

Return $CadenaBorde;
}



Function PictureEnd($UsarBordes, $BordesTema, $ImagenArriba, $ImagenIzquierda, $ImagenDerecha, $ImagenAbajo){
global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;

$CadenaBorde = "";


	if ($UsarBordes){
		$CadenaBorde .= "";
		if ($BordesTema){
			$CadenaBorde .= "<img src=\"" . XOOPS_URL . "/themes/" . getTheme() . "/images/" . $ImagenDerecha . "\">";
		}else{
			$CadenaBorde .= "<img src=\"" .  $xoopsConfig['xoops_url'] . "/		modules/uskolaxgallery/icons/" . $ImagenDerecha . "\">" ;
		}
		$CadenaBorde .= "</td></tr><tr colspan=3><td>";
		if ($BordesTema){
			$CadenaBorde .= "<img src=\"" . XOOPS_URL . "/themes/" . getTheme() . "/images/" . $ImagenAbajo . "\">";
		}else{
			$CadenaBorde .= "<img src=\"" .  $xoopsConfig['xoops_url'] . "/		modules/uskolaxgallery/icons/". $ImagenAbajo . "\">" ;
		}
		$CadenaBorde .= "</td></tr></table>";
	}


Return $CadenaBorde;
}





Function b_uskolaxgallery_show(){
global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;

$BloqueIniciado = 0;

$consulta2 = "SELECT BloquesAleatorios, SoloImagenes FROM " .$xoopsDB->prefix("uskolag_master"). "";

	$myts = new MyTextSanitizer;

	if(!$result = $xoopsDB->query($consulta2))
	error_die("Problems");


while($tbCarpeta = $xoopsDB->fetchArray($result)){
	$RANDOMCARPETAS = $tbCarpeta['BloquesAleatorios'];
	$SoloImagen = $tbCarpeta['SoloImagenes'];
}



	$block = array();
	$block['title'] = _MB_USKOLAXGALLERY_NAME;
	$block['content'] = "<div align=\"left\">";


$consulta = "SELECT ID, Carpeta, Imagen, Descripcion, Aleatorio, Bloque, MCatalogos, AnchoBloque, AltoBloque, AnchoImagenes, AltoImagenes, FotosAncho, FotosAlto, EnviarFicheros, EnviarComentarios, EnviarVotaciones, EnviarEnlaces, NecesarioRegistrar, InicioDescargas, FinDescargas, InicioEnlaces, FinEnlaces, Anterior, Siguiente, InicioEncabezado, FinEncabezado, InicioPie, FinPie, InicioEncabezadoComentario, FinEncabezadoComentario, InicioComentario, FinComentario, BloquearImagenesSubidas, BloquearComentarios, InicioFoto, FinFoto, InicioMarcoFoto, FinMarcoFoto, AleatorioListado, FotoDescripcion, NombreFotoCarpeta, NombreFotoCarpetaSuperior, BordeImagenIzquierda, BordeImagenDerecha, BordeImagenArriba, BordeImagenAbajo, UsarBordes, BordesTema, NombreFrameStyleBlock, UsarBordesBloque FROM " .$xoopsDB->prefix("uskolag_carpeta"). " Where Bloque=1";


if ($RANDOMCARPETAS > 0){
$BloquesComprobar = array();
$BloquesComprobar = NumeroBloques2($RANDOMCARPETAS);
}

$myts = new MyTextSanitizer;
$result = $xoopsDB->query($consulta);
//$RANDOMCARPETAS = 0;

while($tbCarpeta = $xoopsDB->fetchArray($result)){
$NombreFotoCarpeta =  $tbCarpeta['NombreFotoCarpetaSuperior'];
$longitudNombreCarpeta =  strlen($NombreFotoCarpeta);
$iniciotabla = $tbCarpeta['InicioFoto'];
$fintabla = $tbCarpeta['FinFoto'];
$aleatoriolistado = $tbCarpeta['AleatorioListado'];
$PFStyle=0;
$PFIMAGE = "";

	if ($tbCarpeta['UsarBordesBloque']){

		if ($tbCarpeta['BordesTema']){
			if (file_exists(XOOPS_ROOT_PATH . "/" . "/themes/" . getTheme() . "/".  $tbCarpeta['NombreFrameStyleBlock'] . "/images/small/" . "size.php")){

			include (XOOPS_ROOT_PATH . "/"  . "/themes/" . getTheme() .  "/" .  $tbCarpeta['NombreFrameStyleBlock'] . "/images/small/" . "size.php") ;
			$rutaGrande= XOOPS_URL . "/themes/" . getTheme() . "/" . $tbCarpeta['NombreFrameStyleBlock']  . "/images/small/";
			}

			else{

			if (file_exists(XOOPS_ROOT_PATH . "/" . "/themes/" . getTheme() . "/images/small/" . "size.php")){
			include (XOOPS_ROOT_PATH . "/"  . "/themes/" . getTheme() . "/images/small/" . "size.php") ;
			$rutaGrande= XOOPS_URL . "/themes/" . getTheme() . "/images/small/";

			}
			else{
			include (XOOPS_ROOT_PATH . "/"  . "/modules/uskolaxgallery/icons/" . $tbCarpeta['NombreFrameStyleBlock'] . "/small/" . "size.php") ;
			$rutaGrande= XOOPS_URL . "/modules/uskolaxgallery/icons/" . $tbCarpeta['NombreFrameStyleBlock'] . "/small/";

			}
			}

		}else{
			if (file_exists(XOOPS_ROOT_PATH . "/" . "/themes/" . getTheme() . "/".  $tbCarpeta['NombreFrameStyleBlock'] . "/images/small/" . "size.php")){
			include (XOOPS_ROOT_PATH . "/"  . "/themes/" . getTheme() .  "/" .  $tbCarpeta['NombreFrameStyleBlock'] . "/images/small/" . "size.php") ;
			$rutaGrande= XOOPS_URL . "/themes/" . getTheme() . "/" . $tbCarpeta['NombreFrameStyleBlock']  . "/images/small/";
			}else{
			if (file_exists(XOOPS_ROOT_PATH . "/" . "/modules/uskolaxgallery/icons/" . $tbCarpeta['NombreFrameStyleBlock'] . "/small/" . "size.php")){
			include (XOOPS_ROOT_PATH . "/"  . "/modules/uskolaxgallery/icons/" . $tbCarpeta['NombreFrameStyleBlock'] . "/small/" . "size.php") ;
			$rutaGrande= XOOPS_URL . "/modules/uskolaxgallery/icons/" . $tbCarpeta['NombreFrameStyleBlock'] . "/small/";
			}
			else{
			include (XOOPS_ROOT_PATH . "/"  . "/themes/" . getTheme() . "/images/small/" . "size.php") ;
			$rutaGrande= XOOPS_URL . "/themes/" . getTheme() . "/images/small/";
			}
			}
		}

			$TBordeImagenGrandeIzquierdaArriba = "<td background=" . $rutaGrande . "top_left_corner.gif" . " width=\"" . $BloqueLeft . "\" height=\"" . $BloqueTop . "\"></td>";
			$TBordeImagenGrandeIzquierdaCentro = "<td background=" . $rutaGrande . "left.gif" . " width=\"" . $BloqueLeft . "\"></td>";
			$TBordeImagenGrandeIzquierdaAbajo = "<td background=" . $rutaGrande . "bottom_left_corner.gif" . " width=\"" . $BloqueLeft . "\" height=\"" . $BloqueBottom . "\"></td>";
			$TBordeImagenGrandeCentroArriba = "<td background=" . $rutaGrande . "top.gif" . " height=" . $BloqueTop .  "></td>";
			$TBordeImagenGrandeCentroAbajo = "<td background=" . $rutaGrande . "bottom.gif" .  " height=" . $BloqueBottom . "></td>";
			$TBordeImagenGrandeDerechaArriba = "<td background=" . $rutaGrande . "top_right_corner.gif" ." width=\"" . $BloqueRight . "\" height=\"" . $BloqueTop .	"\"></td>";
			$TBordeImagenGrandeDerechaCentro = "<td background=" . $rutaGrande . "right.gif" . " width=\"" . $BloqueRight . "\"></td>";
			$TBordeImagenGrandeDerechaAbajo = "<td background=" . $rutaGrande . "bottom_right_corner.gif" . " width=\"" . $BloqueRight . "\" height=\"" . $BloqueBottom . "\"></td>";
			$USKOLAGALERYANEXT = "<img src=\"" . $rutaGrande . "next.gif" . "\">";
			$USKOLAGALERYAPREVIOUS = "<img src=\"" . $rutaGrande . "previous.gif" . "\">";
			$PF = $PFStyle;
			$PFIMAGE = $rutaGrande . $PFStyleImage;

	}else{
			$TBordeImagenGrandeIzquierdaArriba = "<tr><td></td>";
			$TBordeImagenGrandeIzquierdaCentro = "<td></td>";
			$TBordeImagenGrandeIzquierdaAbajo = "<td></td>";
			$TBordeImagenGrandeCentroArriba = "<td></td>";
			$TBordeImagenGrandeCentroAbajo = "<td></td>";
			$TBordeImagenGrandeDerechaArriba = "<td></td>";
			$TBordeImagenGrandeDerechaCentro = "<td></td>";
			$TBordeImagenGrandeDerechaAbajo = "<td></td>";

	}


		if (! ($RANDOMCARPETAS > 0)){
					 $totalficheros = Get_Image_listPro2(XOOPS_ROOT_PATH . "/" . 'modules/uskolaxgallery/images/' . $tbCarpeta['Carpeta'] . '/small/');
					 $numeroficheros = count($totalficheros);
					 $imagenrandom = rand (0, $numeroficheros -1);
					 if (! $SoloImagen){
						 $block['content'] .= "<br><center>";
						 if ($longitudNombreCarpeta >0) {
							 $block['content'] .= "<img src=\"" . XOOPS_URL . "/modules/uskolaxgallery/icons/" . $tbCarpeta['NombreFotoCarpetaSuperior'] . " \"><br>";
						 }else{
							 $block['content'] .= $tbCarpeta['Descripcion'] . "<br>";
						 }
					}

					 if ($numeroficheros > 0 && $tbCarpeta['Aleatorio']) {
						 $foto = trim($totalficheros[$imagenrandom]);
							 if (! $PF){

								$block['content'] .=  "<table cellpadding='0' cellspacing='0'><tr>";
								$block['content'] .= $TBordeImagenGrandeIzquierdaArriba ;
								$block['content'] .= $TBordeImagenGrandeCentroArriba ;
								$block['content'] .= $TBordeImagenGrandeDerechaArriba ;
								$block['content'] .= "</tr><tr>";
								$block['content'] .= $TBordeImagenGrandeIzquierdaCentro ;

								 $block['content'] .= "<td><a href=\"" . XOOPS_URL  . "/modules/uskolaxgallery/index.php?carpeta=" . $tbCarpeta['Carpeta'] . "&inicio=$imagenrandom" . "&foto=" . $foto . "\"><img src=\"".  XOOPS_URL 	. "/modules/uskolaxgallery/images/" . $tbCarpeta['Carpeta'] . "/small/" . ReCorrigeProBloque($foto) . "\" width=";
							 }else{
								 $block['content'] .= "<table background=";
								 $block['content'] .=  "" .  $xoopsConfig['xoops_url'] 	. "/modules/uskolaxgallery/images/" . $tbCarpeta['Carpeta'] . "/small/" . ReCorrigeProBloque($foto) . " width=" . $tbCarpeta['AnchoBloque'] ;
								 $block['content'] .= " height=\"";
								 $block['content'] .= $tbCarpeta['AltoBloque'];
								 $block['content'] .= "\" cellpadding='0' cellspacing='0' >";
								 $block['content'] .= "<tr><td>";

								 $block['content'] .= "<a href=\"" . XOOPS_URL  . "/modules/uskolaxgallery/index.php?carpeta=" . $tbCarpeta['Carpeta'] . "&inicio=$imagenrandom" . "&foto=" . $foto . "\">";
								 $block['content'] .= "<img src=" . $PFIMAGE . " width=\"";
								 $block['content'] .= $tbCarpeta['AnchoBloque'];
								 $block['content'] .= "\" height=\"";
								 $block['content'] .= $tbCarpeta['AltoBloque'];
								 $block['content'] .= "\" alt=\"" . $descripcion  . "\" border='0'></img></a></td></tr>";
								 $block['content'] .= "</table>";
							 }
					 }else{
							 if (! $PF){
									 $block['content'] .= $tbCarpeta['InicioFoto'];
									 $block['content'] .=  "<table cellpadding='0' cellspacing='0'><tr>";
									 $block['content'] .= $TBordeImagenGrandeIzquierdaArriba ;
									 $block['content'] .= $TBordeImagenGrandeCentroArriba ;
									 $block['content'] .= $TBordeImagenGrandeDerechaArriba ;
									 $block['content'] .= "</tr><tr>";
									 $block['content'] .= $TBordeImagenGrandeIzquierdaCentro ;
									 $block['content'] .= "<td><a href=\""  .	$xoopsConfig['xoops_url']  	. "/modules/uskolaxgallery/index.php?carpeta=" . $Carpetapro . "\"><img src=\""  .  XOOPS_URL  	. "/modules/uskolaxgallery/images/"  . ReCorrigeProBloque($tbCarpeta['Imagen']) . "\" width=\"";
							 }else{ //aqui hay fallo
									 $block['content'] .= "<table background=";
									 $block['content'] .=  "" .   XOOPS_URL  	. "/modules/uskolaxgallery/images/"  . ReCorrigeProBloque($tbCarpeta['Imagen']) . " width=\"" . $tbCarpeta['AnchoBloque'] ;
									 $block['content'] .= "\" height=\"";
									 $block['content'] .= $tbCarpeta['AltoBloque'];
									 $block['content'] .= "\" cellpadding='0' cellspacing='0' >";
									 $block['content'] .= "<tr><td>";
									 $block['content'] .= "<a href=\""  .	$xoopsConfig['xoops_url']  	. "/modules/uskolaxgallery/index.php?carpeta=" . $Carpetapro  . "\">";
									 $block['content'] .= "<img src=" . $PFIMAGE . " width=\"";
									 $block['content'] .= $tbCarpeta['AnchoBloque'];
									 $block['content'] .= "\" height=\"";
									 $block['content'] .= $tbCarpeta['AltoBloque'];
									 $block['content'] .= "\" alt=\"" . $descripcion  . "\" border='0'></img></a></td></tr>";
									 $block['content'] .= "</table>";
							 }

					 }
				 if (! $PF){

					 $block['content'] .= $tbCarpeta['AnchoBloque'];
					 $block['content'] .= "\" height=\"";
					 $block['content'] .= $tbCarpeta['AltoBloque'];
					 $block['content'] .= "\" alt=\"" . $descripcion  . "\" border='0'></img></a></td>";

					 $block['content'] .= $TBordeImagenGrandeDerechaCentro ;

					 $block['content'] .= "</tr><tr>";
					 $block['content'] .= $TBordeImagenGrandeIzquierdaAbajo ;
					 $block['content'] .= $TBordeImagenGrandeCentroAbajo ;
					 $block['content'] .= $TBordeImagenGrandeDerechaAbajo ;
					 $block['content'] .= "</tr></table>";
				 }

					if ($BloqueIniciado){
					 echo  "<br>";
					}
					$BloqueIniciado = 1;

					 $block['content'] .= " ("  . $numeroficheros . ") " . _MB_USKOLAXGALLERY_FOTOS . "<br><br>" ;
		}else{
					if (in_array($tbCarpeta['Carpeta'] , $BloquesComprobar) ){
					 $totalficheros = Get_Image_listPro2(XOOPS_ROOT_PATH . "/" . 'modules/uskolaxgallery/images/' .
					 $tbCarpeta['Carpeta']  . '/small/');
				 	 $numeroficheros = count($totalficheros);
					 if ($numeroficheros > 0 ){
						 if ($numeroficheros > 0 && $tbCarpeta['Aleatorio']) {
								 $imagenrandom = rand (0, $numeroficheros -1);
								 $foto = trim($totalficheros[$imagenrandom]);
							 if (! $SoloImagen){
								 $block['content'] .= "<br><center>";
								 if ($longitudNombreCarpeta >0) {
									 $block['content'] .= "<img src=\"" . XOOPS_URL . "/modules/uskolaxgallery/icons/" . $tbCarpeta['NombreFotoCarpetaSuperior'] . " \"><br>";
								 }else{
									 $block['content'] .= $tbCarpeta['Descripcion'] . "<br>";
								 }
							 }
							 if (! $PF){
								$block['content'] .=  "<table cellpadding='0' cellspacing='0'>";
								$block['content'] .= $TBordeImagenGrandeIzquierdaArriba ;
								$block['content'] .= $TBordeImagenGrandeCentroArriba ;
								$block['content'] .= $TBordeImagenGrandeDerechaArriba ;
								$block['content'] .= "</tr><tr>";
								$block['content'] .= $TBordeImagenGrandeIzquierdaCentro ;
								if ($aleatoriolistado){
									 $block['content'] .= "<td><a href=\""  .	$xoopsConfig['xoops_url']  	. "/modules/uskolaxgallery/index.php?carpeta=" . $tbCarpeta['Carpeta'] . "\"><img src=\"".  XOOPS_URL 	. "/modules/uskolaxgallery/images/" . $tbCarpeta['Carpeta']  . "/small/" . ReCorrigeProBloque($foto) . "\" width=\"";
								}else{
									 $block['content'] .= "<td><a href=\"" . XOOPS_URL  . "/modules/uskolaxgallery/index.php?carpeta=" .  $tbCarpeta['Carpeta'] . "&inicio=$imagenrandom" . "&foto=" . $foto . "\"><img src=\"".  XOOPS_URL 	. "/modules/uskolaxgallery/images/" . $tbCarpeta['Carpeta']  . "/small/" . ReCorrigeProBloque($foto) . "\" width=\"";
								}
							 }else{
								if ($aleatoriolistado){
									 $block['content'] .= "<table background=";
									 $block['content'] .=  "" .   XOOPS_URL 	. "/modules/uskolaxgallery/images/" . $tbCarpeta['Carpeta']  . "/small/" . ReCorrigeProBloque($foto) . " width=\"" . $tbCarpeta['AnchoBloque'] ;
									 $block['content'] .= "\" height=\"";
									 $block['content'] .= $tbCarpeta['AltoBloque'];
									 $block['content'] .= "\" cellpadding='0' cellspacing='0' >";
									 $block['content'] .= "<tr><td>";
								}else{
									 $block['content'] .= "<table background=";
									 $block['content'] .=  "" .   XOOPS_URL 	. "/modules/uskolaxgallery/images/" . $tbCarpeta['Carpeta']  . "/small/" . ReCorrigeProBloque($foto) . " width=\"" . $tbCarpeta['AnchoBloque'] ;
									 $block['content'] .= "\" height=\"";
									 $block['content'] .= $tbCarpeta['AltoBloque'];
									 $block['content'] .= "\" cellpadding='0' cellspacing='0' >";
									 $block['content'] .= "<tr><td>";
								}



								if ($aleatoriolistado){
									 $block['content'] .= "<a href=\""  .	$xoopsConfig['xoops_url']  	. "/modules/uskolaxgallery/index.php?carpeta=" . $tbCarpeta['Carpeta'] . "\">";
								}else{
									 $block['content'] .= "<a href=\"" . XOOPS_URL  . "/modules/uskolaxgallery/index.php?carpeta=" .  $tbCarpeta['Carpeta'] . "&inicio=$imagenrandom" . "&foto=" . $foto . "\">";
								}
								 $block['content'] .= "<img src=" . $PFIMAGE . " width=\"";
								 $block['content'] .= $tbCarpeta['AnchoBloque'];
								 $block['content'] .= "\" height=\"";
								 $block['content'] .= $tbCarpeta['AltoBloque'];
								 $block['content'] .= "\" alt=\"" . $descripcion  . "\" border='0'></img></a></td></tr>";
								 $block['content'] .= "</table>";

							 }
						}
						 else{

							 if (! $SoloImagen){
								 if ($longitudNombreCarpeta >0) {
									 $block['content'] .= "<img src=\"" . XOOPS_URL . "/modules/uskolaxgallery/icons/" . $tbCarpeta['NombreFotoCarpetaSuperior'] . " \"><br>";
								 }else{
									 $block['content'] .= $tbCarpeta['Descripcion'] . "<br>";
								 }
							 }
							 if (! $PF){

								$block['content'] .=  "<table cellpadding='0' cellspacing='0'><tr>";
								$block['content'] .= $TBordeImagenGrandeIzquierdaArriba ;
								$block['content'] .= $TBordeImagenGrandeCentroArriba ;
								$block['content'] .= $TBordeImagenGrandeDerechaArriba ;
								$block['content'] .= "</tr><tr>";
								$block['content'] .= $TBordeImagenGrandeIzquierdaCentro ;

								 $block['content'] .= "<td><a href=\""  .	$xoopsConfig['xoops_url']  	. "/modules/uskolaxgallery/index.php?carpeta=" . $tbCarpeta['Carpeta'] . "\"><img src=\""  .  XOOPS_URL  	. "/modules/uskolaxgallery/images/"  . ReCorrigeProBloque($tbCarpeta['Imagen']) . "\" width=\"";
							 }else{

								 $block['content'] .= "<table background=";
								 $block['content'] .=  "" .   XOOPS_URL  	. "/modules/uskolaxgallery/images/"  . ReCorrigeProBloque($tbCarpeta['Imagen']) . " width=\"" . $tbCarpeta['AnchoBloque'] ;
								 $block['content'] .= "\" height=\"";
								 $block['content'] .= $tbCarpeta['AltoBloque'];
								 $block['content'] .= "\" cellpadding='0' cellspacing='0' >";
								 $block['content'] .= "<tr><td>";
								 $block['content'] .= "<a href=\"" . XOOPS_URL  	. "/modules/uskolaxgallery/index.php?carpeta=" . $tbCarpeta['Carpeta']  . "\">";
								 $block['content'] .= "<img src=" . $PFIMAGE . " width=\"";
								 $block['content'] .= $tbCarpeta['AnchoBloque'];
								 $block['content'] .= "\" height=\"";
								 $block['content'] .= $tbCarpeta['AltoBloque'];
								 $block['content'] .= "\" alt=\"" . $descripcion  . "\" border='0'></img></a></td></tr>";
								 $block['content'] .= "</table>";



							 }

						 }
							 if (! $PF){

								$block['content'] .= $tbCarpeta['AnchoBloque'];
								$block['content'] .= "\" height=\"";
								$block['content'] .= $tbCarpeta['AltoBloque'];
								$block['content'] .= "\" alt=\"" . $descripcion  . "\" border='0'></img></a></td>";
								$block['content'] .= $TBordeImagenGrandeDerechaCentro ;

								$block['content'] .= "</tr><tr>";
								$block['content'] .= $TBordeImagenGrandeIzquierdaAbajo ;
								$block['content'] .= $TBordeImagenGrandeCentroAbajo ;
								$block['content'] .= $TBordeImagenGrandeDerechaAbajo ;
								$block['content'] .= "</tr></table>";
							 }

					if (! $SoloImagen){
						$block['content'] .= "<br> ("  . $numeroficheros . ") " . _MB_USKOLAXGALLERY_FOTOS . "<br><br>" ;
					}
				 $block['content'] .= "";

					}
				}

		}


}


$block['content'] .= "</div>";
					if ($BloqueIniciado){
					 echo  "<br>";
					}
					$BloqueIniciado = 1;

return $block;

}

?>
