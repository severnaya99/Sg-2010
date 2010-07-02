<?php

//Pantallainicial de selección de galeria
function seleccionarcarpetamodulopro($Superior, $numberofimages){
global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;
Global $XoopsLayerUse;
Global $XoopsLayerString ;
$XoopsLayerUse= 1;
include_once(XOOPS_ROOT_PATH . "/"."class/module.textsanitizer.php");
//cut 1
if (! $Superior){
	$consulta2 = "SELECT Bienvenida FROM " .$xoopsDB->prefix("uskolag_master"). "";
	$myts = new MyTextSanitizer;
	if(!$result = $xoopsDB->query($consulta2))error_die("Problems");
	while($tbCarpeta = $xoopsDB->fetchArray($result)){
		$comentario = $tbCarpeta['Bienvenida'];
	}
	echo $comentario. "<br><br>";
	echo "<table align=center><tr><td>";
}else{
	echo "<center>";
}

$consultaInicial = "SELECT BloquesAleatorios, SoloImagenes, numerocolumnas FROM " .$xoopsDB->prefix("uskolag_master"). "";

	$myts = new MyTextSanitizer;

	if(!$result = $xoopsDB->query($consultaInicial))
	error_die("Problems");


while($tbCarpeta = $xoopsDB->fetchArray($result)){
	$masximages = $tbCarpeta['numerocolumnas'];
}
//cut 1
$consulta2 = "SELECT ID, Carpeta, Imagen, Descripcion, Aleatorio, Bloque, MCatalogos, AnchoBloque, AltoBloque, AnchoImagenes, AltoImagenes, FotosAncho, FotosAlto, EnviarFicheros, EnviarComentarios, EnviarVotaciones, EnviarEnlaces, NecesarioRegistrar, InicioDescargas, FinDescargas, InicioEnlaces, FinEnlaces, Anterior, Siguiente, InicioEncabezado, FinEncabezado, InicioPie, FinPie, InicioEncabezadoComentario, FinEncabezadoComentario, InicioComentario, FinComentario, BloquearImagenesSubidas, BloquearComentarios, InicioFoto, FinFoto, InicioMarcoFoto, FinMarcoFoto, AleatorioListado, FotoDescripcion, NombreFotoCarpeta, NombreFotoCarpetaSuperior, UsarBordes, BordesTema, BordeImagenPequenoIzquierda, BordeImagenPequenoDerecha, BordeImagenPequenoArriba, BordeImagenPequenoAbajo, UsarBordesGaleria, NombreFrameStyleGaleria   FROM " .$xoopsDB->prefix("uskolag_carpeta"). "";

$myts = new MyTextSanitizer;
if(!$result = $xoopsDB->query($consulta2)) error_die("Problems");

$imagenumber = 0;
while($tbCarpeta = $xoopsDB->fetchArray($result)){
	$PF = "";
	$PFIMAGE = "";
	$PFStyle= "";
	$PFStyleImage = "";

	if ($tbCarpeta['UsarBordesGaleria']){

		if ($tbCarpeta['BordesTema']){
			if (file_exists(XOOPS_ROOT_PATH . "/" . "/themes/" . getTheme() . "/".  $tbCarpeta['NombreFrameStyleGaleria'] . "/images/small/" . "size.php")){
				require (XOOPS_ROOT_PATH . "/"  . "/themes/" . getTheme() .  "/" .  $tbCarpeta['NombreFrameStyleGaleria'] . "/images/small/" . "size.php") ;
				$rutaGrande= XOOPS_URL . "/themes/" . getTheme() . "/" . $tbCarpeta['NombreFrameStyleGaleria']  . "/images/small/";
			}else{
				if (file_exists(XOOPS_ROOT_PATH . "/" . "/themes/" . getTheme() . "/images/small/" . "size.php")){
					require (XOOPS_ROOT_PATH . "/"  . "/themes/" . getTheme() . "/images/small/" . "size.php") ;
					$rutaGrande= XOOPS_URL . "/themes/" . getTheme() . "/images/small/";
				}else{
					include_once (XOOPS_ROOT_PATH . "/"  . "/modules/uskolaxgallery/icons/" . $tbCarpeta['NombreFrameStyleGaleria'] . "/small/" . "size.php") ;
					$rutaGrande= XOOPS_URL . "/modules/uskolaxgallery/icons/" . $tbCarpeta['NombreFrameStyleGaleria'] . "/small/";
				}
			}
		}else{
			if (file_exists(XOOPS_ROOT_PATH . "/" . "/themes/" . getTheme() . "/".  $tbCarpeta['NombreFrameStyleGaleria'] . "/images/small/" . "size.php")){
				require(XOOPS_ROOT_PATH . "/" . "/themes/" . getTheme() .  "/" .  $tbCarpeta['NombreFrameStyleGaleria'] . "/images/small/" . "size.php") ;
				$rutaGrande= XOOPS_URL . "/themes/" . getTheme() . "/" . $tbCarpeta['NombreFrameStyleGaleria']  . "/images/small/";
			}else{
				if (file_exists(XOOPS_ROOT_PATH . "/" . "/modules/uskolaxgallery/icons/" . $tbCarpeta['NombreFrameStyleGaleria'] . "/small/" . "size.php")){
					require (XOOPS_ROOT_PATH . "/"  . "/modules/uskolaxgallery/icons/" . $tbCarpeta['NombreFrameStyleGaleria'] . "/small/" . "size.php") ;
					$rutaGrande= XOOPS_URL . "/modules/uskolaxgallery/icons/" . $tbCarpeta['NombreFrameStyleGaleria'] . "/small/";
				}else{
					include_once(XOOPS_ROOT_PATH . "/" . "/themes/" . getTheme() . "/images/small/" . "size.php") ;
				$rutaGrande= XOOPS_URL . "/themes/" . getTheme() . "/images/small/";
				}
			}
		}
		$TBordeImagenGrandeIzquierdaArriba = "<td background=" . $rutaGrande . "top_left_corner.gif" . " width=" . $BloqueLeft . " height=" . $BloqueTop . "></td>";
		$TBordeImagenGrandeIzquierdaCentro = "<td background=" . $rutaGrande . "left.gif" . " width=" . $BloqueLeft . "></td>";
		$TBordeImagenGrandeIzquierdaAbajo = "<td background=" . $rutaGrande . "bottom_left_corner.gif" . " width=" . $BloqueLeft . " height=" . $BloqueBottom . "></td>";
		$TBordeImagenGrandeCentroArriba = "<td background=" . $rutaGrande . "top.gif" . " height=" . $BloqueTop .  "></td>";
		$TBordeImagenGrandeCentroAbajo = "<td background=" . $rutaGrande . "bottom.gif" .  " height=" . $BloqueBottom . "></td>";
		$TBordeImagenGrandeDerechaArriba = "<td background=" . $rutaGrande . "top_right_corner.gif" ." width=" . $BloqueRight . " height=" . $BloqueTop .	"></td>";
		$TBordeImagenGrandeDerechaCentro = "<td background=" . $rutaGrande . "right.gif" . " width=" . $BloqueRight . "></td>";
		$TBordeImagenGrandeDerechaAbajo = "<td background=" . $rutaGrande . "bottom_right_corner.gif" . " width=" . $BloqueRight . " height=" . $BloqueBottom . "></td>";
		$USKOLAGALERYANEXT = "<img src=\"" . $rutaGrande . "next.gif" . "\">";
		$USKOLAGALERYAPREVIOUS = "<img src=\"" . $rutaGrande . "previous.gif" . "\">";
		$PF = $PFStyle;
		$PFIMAGE = $rutaGrande . $PFStyleImage;
	}else{
		$TBordeImagenGrandeIzquierdaArriba = "<td></td>";
		$TBordeImagenGrandeIzquierdaCentro = "<td></td>";
		$TBordeImagenGrandeIzquierdaAbajo = "<td></td>";
		$TBordeImagenGrandeCentroArriba = "<td></td>";
		$TBordeImagenGrandeCentroAbajo = "<td></td>";
		$TBordeImagenGrandeDerechaArriba = "<td></td>";
		$TBordeImagenGrandeDerechaCentro = "<td></td>";
		$TBordeImagenGrandeDerechaAbajo = "<td></td>";
	}
	if (! $Superior){
		 echo "<br><center>";
	}
	 $totalficheros = Get_Image_listPro('images/' . $tbCarpeta['Carpeta'] . '/small/');
	 $numeroficheros = count($totalficheros);
	 $imagenrandom = rand (0, $numeroficheros -1);
	 if (! $Superior ){
			 echo $tbCarpeta['InicioMarcoFoto'];
			 $foto = trim($totalficheros[$imagenrandom]);
			 if (strlen($tbCarpeta['NombreFotoCarpeta']) > 0 ) {
				 echo "<img src=\"icons/" . $tbCarpeta['NombreFotoCarpeta'] . " \"><br>"; 
			 }else{
				 echo $tbCarpeta['Descripcion'];
			 }
			 echo $tbCarpeta['InicioFoto'];
			 if (! $PF){
				 if ($numeroficheros > 0 && $tbCarpeta['Aleatorio']) {
					 $foto = trim($totalficheros[$imagenrandom]);
					 echo  "<table cellpadding=0 cellspacing=0><tr>";
					 echo $TBordeImagenGrandeIzquierdaArriba ;
					 echo $TBordeImagenGrandeCentroArriba ;
					 echo $TBordeImagenGrandeDerechaArriba ;
					 echo "</tr><tr>";
					 echo $TBordeImagenGrandeIzquierdaCentro ;
					 echo "<td><a href=\"" . XOOPS_URL  . "/modules/uskolaxgallery/index.php?carpeta=" . $tbCarpeta['Carpeta'] . "\"><img src=\"".  XOOPS_URL 	. "/modules/uskolaxgallery/images/" . $tbCarpeta['Carpeta'] . "/small/" . CorrigeModuloPro($foto) . "\" width="; 
				 }
				 else{
					 echo $tbCarpeta['InicioFoto'];
					 echo "<table cellpadding=0 cellspacing=0><tr>";
					 echo $TBordeImagenGrandeIzquierdaArriba ;
					 echo $TBordeImagenGrandeCentroArriba ;
					 echo $TBordeImagenGrandeDerechaArriba ;
					 echo "</tr><tr>";
					 echo $TBordeImagenGrandeIzquierdaCentro ;
					 echo "<td>";
					 echo "<a href=\"index.php?carpeta=" . $tbCarpeta['Carpeta']  . "\"><img src=\"images/" . $tbCarpeta['Carpeta'] . "/small/" . CorrigeModuloPro($foto) . "\" width="; 
				 }	
				echo $tbCarpeta['AnchoBloque']; 
				echo " alt=\"" . $tbCarpeta['Descripcion']  . "\" border=0></img></a></td>"; 
				echo $TBordeImagenGrandeDerechaCentro ;
				echo "</tr><tr>";
				echo $TBordeImagenGrandeIzquierdaAbajo ;
				echo $TBordeImagenGrandeCentroAbajo ;
				echo $TBordeImagenGrandeDerechaAbajo ;
				echo "</tr></table>";
				echo  "<br>";
				echo " ("  . $numeroficheros . ") " . _MI_USKOLAXGALLERY_FOTOS . "<br><br>" ; 
				echo $FFinMarcoFoto;
					$imagenumber =  $imagenumber + 1;
					if ($imagenumber < $masximages){
						echo "</td><td>";
					}else{
						$imagenumber =  0;
						echo "</td></tr><tr><td>";
					}

			 }else{
				$foto = trim($totalficheros[$imagenrandom]);
				echo "<table background=";
				echo  "\"images/" . $tbCarpeta['Carpeta'] . "/small/" . CorrigeModuloPro($foto);
				echo  "\" width=" . $tbCarpeta['AnchoBloque'] . " border=0" . " cellpadding=0 cellspacing=0 >"; 
				echo "<tr><td><a href=\"index.php?carpeta=" . $tbCarpeta['Carpeta'] . "\">"; 
				echo "<img src=$PFIMAGE width=" . $tbCarpeta['AnchoBloque'] . " border=0 alt=\"Click for Larger Image\"></a></td></tr></table>";		
			}
	} else{
		//Vamos a meterle el xoopslayermenu
		if ($father <> 2) $father = 1;
		if ($father<>2){
			$father = 2;
			$consultapadre = "SELECT id, description FROM " .$xoopsDB->prefix("uskolag_father");
			if(!$resultpadre = $xoopsDB->query($consultapadre)) error_die("Problems");
			while($tbPadres = $xoopsDB->fetchArray($resultpadre)){
				$LayerText =  ".." . $tbPadres['description'];
				$XoopsLayerString [] = $LayerText . "<br>" ;			
				$consultapadregaleria = "SELECT father_id, gallery_id FROM " .$xoopsDB->prefix("uskolag_father_gallery"). " where father_id=" . $tbPadres['id'];
				if(!$resultpadregaleria = $xoopsDB->query($consultapadregaleria)) error_die("Problems");
				while($tbPadresGaleria = $xoopsDB->fetchArray($resultpadregaleria)){
					$consultacarpetagaleria = "SELECT ID, Carpeta, Descripcion FROM " . $xoopsDB->prefix("uskolag_carpeta"). " where ID=" . $tbPadresGaleria['gallery_id'];
					if(!$resultcarpetagaleria = $xoopsDB->query($consultacarpetagaleria)) error_die("Problems");
					while($tbcarpetasgaleria = $xoopsDB->fetchArray($resultcarpetagaleria)){
					$LayerText =  "..." . $tbcarpetasgaleria['Descripcion'];
						$XoopsLayerString [] = $LayerText . "|" . "index.php?carpeta=" . $tbcarpetasgaleria['Carpeta'] ;			
						EstructuraGaleria($tbcarpetasgaleria['ID'], ".", $tbcarpetasgaleria['Carpeta']);
					}
				}
			}
		}
		$LayerText = "";
		if (strlen($tbCarpeta['NombreFotoCarpetaSuperior']) > 0 ) {
			$LayerText =  ".." . "<img src=icons/" . $tbCarpeta['NombreFotoCarpetaSuperior'] . ">" ;
		 }else{
			$LayerText =  ".." . $tbCarpeta['Descripcion'];
		 }
		$LayerText .= " ("  . $numeroficheros . ") " . _MI_USKOLAXGALLERY_FOTOS . "<br>"; 
		$XoopsLayerString [] = $LayerText . "|" . "index.php?carpeta=" . $tbCarpeta['Carpeta'];
		EstructuraGaleria($tbCarpeta['ID'], "", $tbCarpeta['Carpeta']);
	 }
}

if ( $Superior){
	echo "<td>";
	include_once (XOOPS_ROOT_PATH . "/" ."class/template.inc.php3");
	include_once (XOOPS_ROOT_PATH . "/" ."class/layersmenu.inc.php3");
	$mid = new phplm(" &middot;&middot;&middot;&gt;");
	$phplmwwwroot = XOOPS_URL . "/include/" ;
	$mid->newmenu("hormenu1", "", 1);
	$mid->printheader($phplmwwwroot);
	$mid->printfirstlevelmenu("hormenu1");
	$mid->printfooter(); 
	echo "</tr><tr>";
}else{
echo "</td></tr></table>";
}
}


Function EstructuraGaleria($GaleriaID, $AñadirNivel="", $nombrecarpeta){
global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;
Global $XoopsLayerUse;
Global $XoopsLayerString;
$consultacatalogo = "SELECT catalogo, carpeta, nombre FROM " .$xoopsDB->prefix("uskolag_catalogo"). " where carpeta=" . $GaleriaID;

if(!$resultcatalogo = $xoopsDB->query($consultacatalogo ))error_die("Problems");
while($tbCatalogo = $xoopsDB->fetchArray($resultcatalogo)){
	$consultafotos = "SELECT catalogo, foto FROM " .$xoopsDB->prefix("uskolag_catalogo_foto"). " where catalogo=" . $tbCatalogo['catalogo'];
	if(!$resultcatalogofoto = $xoopsDB->query($consultafotos ))
	error_die("Problems");
	$num_rows = $xoopsDB->getRowsNum($resultcatalogofoto);						
	$LayerText =  "..." . $AñadirNivel . $tbCatalogo['nombre'];
	$LayerText .= " ("  . $num_rows . ") " . _MI_USKOLAXGALLERY_FOTOS . "<br>"; 
	$XoopsLayerString [] = $LayerText . "|" . "index.php?carpeta=" . $nombrecarpeta . "&subcarpeta=" . $tbCatalogo['catalogo'];
}
}

?>
