<?php

include_once("seleccionargaleria.php");

//Pantalla Thumbnails
function SeleccionarModuloFoto($carpeta, $inicio, $subcatalogo)
{
global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;
$consulta2 = "SELECT ID, Carpeta, Imagen, Descripcion, Aleatorio, Bloque, MCatalogos, AnchoBloque, AltoBloque, AnchoImagenes, AltoImagenes, FotosAncho, FotosAlto, Anterior, Siguiente, InicioEncabezado, FinEncabezado, InicioPie, FinPie, InicioFoto, FinFoto, InicioMarcoFoto, FinMarcoFoto, EnviarFicheros, NombreFotoCarpeta, NombreFotoCarpetaSuperior, UsarBordes, BordesTema, BordeImagenPequenoIzquierda, BordeImagenPequenoDerecha, BordeImagenPequenoArriba, BordeImagenPequenoAbajo, UsarBordesGaleria, NombreFrameStyleGaleria, ForzarDescripcion, ForzarTamano, EspaciadoVertical, EspaciadoHorizontal, Espaciado, ColorFondo, ColorFondo1, ColorFondo2, ColorFondo3, ColorFondo4 FROM " .$xoopsDB->prefix("uskolag_carpeta") . " Where Carpeta like '" . $carpeta . "'";
$myts = new MyTextSanitizer;
$result2 = $xoopsDB->query($consulta2);
while($tbCarpeta2 = $xoopsDB->fetchArray($result2)){
	$PERMITIRENVIARFICHEROS = $tbCarpeta2['EnviarFicheros'];
	$UsarBordesPequeno = $tbCarpeta2['UsarBordes'];
	$BordesTemaPequeno = $tbCarpeta2['BordesTema'];
	$ANCHOCARPETA= $tbCarpeta2['AnchoImagenes'];
	$ALTOCARPETA = $tbCarpeta2['AltoImagenes'];
	$ForzarDescripcion = $tbCarpeta2['ForzarDescripcion'];
	$ForzarTamano = $tbCarpeta2['ForzarTamano'];
	$ColorFondo = $tbCarpeta2['ColorFondo'];
	$ColorFondo1 = $tbCarpeta2['ColorFondo1'];
	$ColorFondo2 = $tbCarpeta2['ColorFondo2'];
	$ColorFondo3 = $tbCarpeta2['ColorFondo3'];
	$ColorFondo4 = $tbCarpeta2['ColorFondo4'];
	$EspaciadoVertical = $tbCarpeta2['EspaciadoVertical'];
	$EspaciadoHorizontal = $tbCarpeta2['EspaciadoHorizontal'];
	$Espaciado = $tbCarpeta2['Espaciado'];
	$descripcionCarpeta = $tbCarpeta2['Descripcion'];

	$ValorColorFondo= "";
	if ($ColorFondo1==1){
		$ValorColorFondo= " class=bg1";
	}
	if ($ColorFondo1==2){
		$ValorColorFondo=" class=bg2";
	}
	if ($ColorFondo1==3){
		$ValorColorFondo=" class=bg3";
	}
	if ($ColorFondo1==4){
		$ValorColorFondo= " class=bg4";
	}
	if ($ColorFondo1==5){
		$ValorColorFondo= " class=bg5";
	}
	if ($ColorFondo1==6){
		$ValorColorFondo= " class=bg6";
	}
	if (! $ValorColorFondo){
		$ValorColorFondo = " " . $ColorFondo1;
	}
	if ($ColorFondo2){
		$AnchoMatte = " cellpadding=" . $ColorFondo2;
	}
	if ($ColorFondo2 == 0){
		$AnchoMatte = " cellpadding=" . "0";
	}
	$Espaciado =$ColorFondo2 * 2;
	$CadenaCarrete = "<table" .  $ValorColorFondo . $AnchoMatte . ">";
//	$CadenaCarrete ="<table bgcolor=pink cellpadding=20>";
	if ($tbCarpeta2['UsarBordesGaleria']){
		if ($tbCarpeta2['BordesTema']){
			if (file_exists(XOOPS_ROOT_PATH . "/" . "/themes/" . getTheme() . "/".  $tbCarpeta2['NombreFrameStyleGaleria'] . "/images/small/" . "size.php")){
				include (XOOPS_ROOT_PATH . "/"  . "/themes/" . getTheme() .  "/" .  $tbCarpeta2['NombreFrameStyleGaleria'] . "/images/small/" . "size.php") ;
				$rutaGrande= XOOPS_URL . "/themes/" . getTheme() . "/" . $tbCarpeta2['NombreFrameStyleGaleria']  . "/images/small/";
			}else{
				if (file_exists(XOOPS_ROOT_PATH . "/" . "/themes/" . getTheme() . "/images/small/" . "size.php")){
					include (XOOPS_ROOT_PATH . "/"  . "/themes/" . getTheme() . "/images/small/" . "size.php") ;
					$rutaGrande= XOOPS_URL . "/themes/" . getTheme() . "/images/small/";
				}
				else{
					include (XOOPS_ROOT_PATH . "/"  . "/modules/uskolaxgallery/icons/" . $tbCarpeta2['NombreFrameStyleGaleria'] . "/small/" . "size.php") ;
					$rutaGrande= XOOPS_URL . "/modules/uskolaxgallery/icons/" . $tbCarpeta2['NombreFrameStyleGaleria'] . "/small/";
				}
			}
		}else{
			if (file_exists(XOOPS_ROOT_PATH . "/" . "/themes/" . getTheme() . "/".  $tbCarpeta2['NombreFrameStyleGaleria'] . "/images/small/" . "size.php")){
				include (XOOPS_ROOT_PATH . "/"  . "/themes/" . getTheme() .  "/" .  $tbCarpeta2['NombreFrameStyleGaleria'] . "/images/small/" . "size.php") ;
				$rutaGrande= XOOPS_URL . "/themes/" . getTheme() . "/" . $tbCarpeta2['NombreFrameStyleGaleria']  . "/images/small/";
			}else{
				if (file_exists(XOOPS_ROOT_PATH . "/" . "/modules/uskolaxgallery/icons/" . $tbCarpeta2['NombreFrameStyleGaleria'] . "/small/" . "size.php")){
					include (XOOPS_ROOT_PATH . "/"  . "/modules/uskolaxgallery/icons/" . $tbCarpeta2['NombreFrameStyleGaleria'] . "/small/" . "size.php") ;
					$rutaGrande= XOOPS_URL . "/modules/uskolaxgallery/icons/" . $tbCarpeta2['NombreFrameStyleGaleria'] . "/small/";
				}
				else{
					include (XOOPS_ROOT_PATH . "/"  . "/themes/" . getTheme() . "/images/small/" . "size.php") ;
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
		$InicioEncabezado= $FInicioEncabezado;
		$FinEncabezado= $FFinEncabezado;
		$InicioFoto= $FInicioPie;
		$FinFoto= $FFinPie;
		$InicioMarcoFoto= $FInicioMarcoFoto;
		$FinMarcoFoto= $FFinMarcoFoto;
		$InicioPie= $FInicioPie;
		$FinPie= $FFinPie;
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
	$FOTOSALTO = $tbCarpeta2['FotosAlto'];
	$FOTOSANCHO = $tbCarpeta2['FotosAncho'];
	$NombreFotoCarpeta = $tbCarpeta2['NombreFotoCarpeta'];
	$NombreFotoCarpetaSuperior = $tbCarpeta2['NombreFotoCarpetaSuperior'];
	if ($InicioEncabezado){
		echo $InicioEncabezado;
	}else{
		echo "<table align=center>";
	}
	Global $XoopsLayerString ;
	if (strlen($NombreFotoCarpetaSuperior) > 0 ) {
		$XoopsLayerString [] =  ".<img src=icons/" . $NombreFotoCarpetaSuperior . ">"; 

	}else{
		$XoopsLayerString [] =  "." . $tbCarpeta2['Descripcion'] ;
	}
	seleccionarcarpetamodulopro(1, $tbCarpeta2['FotosAncho']);
	if ($FinEncabezado){
		echo $FinEncabezado;
	}else{
		echo "</table>";
	}
	echo "<br>";
}

$consulta = "SELECT ID, Carpeta, Fichero, Descripcion, Visitas, Fecha, Comentarios, EnviadoPor, Votos, Clasificacion, Title, Keywords FROM " .$xoopsDB->prefix("uskolag_imagenes") . " Where Carpeta like '" . $carpeta . "'";
$result = $xoopsDB->query($consulta);
$categoriafoto = $inicio / ($FOTOSALTO * $FOTOSANCHO);
if ($categoriafoto != intval($categoriafoto)); 
	$categoriafoto = intval($categoriafoto) ;
	$inicio = $categoriafoto * ($FOTOSALTO * $FOTOSANCHO);
	if (!$subcatalogo) {	
		$listadoimagenes = Get_Image_listPro('images/' . $carpeta . '/small/');
	}else{
		$consultafotos = "SELECT catalogo, foto FROM " .$xoopsDB->prefix("uskolag_catalogo_foto"). " where catalogo=" . $subcatalogo;
		if(!$resultcatalogo = $xoopsDB->query($consultafotos ))error_die("Problems");
		while($tbCatalogo = $xoopsDB->fetchArray($resultcatalogo)){
			$consultaNombre = "SELECT ID, Fichero FROM " .$xoopsDB->prefix("uskolag_imagenes") . " Where ID=" . $tbCatalogo['foto'];
			if(!$resultcatalogofoto = $xoopsDB->query($consultaNombre))	error_die("Problems");
			while($tbCatalogoImagen = $xoopsDB->fetchArray($resultcatalogofoto)){
				$listadoimagenes[] = $tbCatalogoImagen['Fichero'];
			}
		}
	}
	echo "<table align=\"center\" cellspacing=" . $EspaciadoVertical . " cellpadding=" . $EspaciadoHorizontal . " width=\"" . (($FOTOSANCHO ) * ($ANCHOCARPETA +	$BloqueLeft + $BloqueRight + $Espaciado +4 )) . "\">";
	for ($contadoralto = 0; $contadoralto < $FOTOSALTO; $contadoralto++){
		echo "<tr>";
		for ($contadorancho = 0; $contadorancho < $FOTOSANCHO; $contadorancho++){
			if ($inicio	 < count($listadoimagenes)){
				echo "<td valign=\"top\">";
				echo $InicioMarcoFoto;
				echo $InicioFoto;
				if (! $PF){
					echo "<table align=\"center\" cellspacing=0 cellpadding=0 width=\"" . (($ANCHOCARPETA +	$BloqueLeft + $BloqueRight + $Espaciado +4)) . "\" $ValorColorFondo><tr>";
					$TImagen= "<td $ValorColorFondo>";
					$TImagen .= $CadenaCarrete. "<tr><td $ValorColorFondo>";
					$TImagen .= "<a href=\"index.php?subcarpeta=" . $subcatalogo . "&carpeta=" . $carpeta ."&foto=" . CorrigeModuloPro($listadoimagenes[$inicio]) . "&inicio=" . $inicio . "\">";
					if (! $ForzarTamano){
						$TImagen .= "<img src=\"images/" . $carpeta . "/small/" . CorrigeModuloPro($listadoimagenes[$inicio]);
						$TImagen .= "\" width=\"" . $ANCHOCARPETA . "\" border=0" . " alt=\"$descripcionCarpeta\""  .  ">"; 
					}
					else{
						$TImagen .= "<img src=\"images/" . $carpeta . "/small/" . CorrigeModuloPro($listadoimagenes[$inicio]);
						$TImagen .= "\" width=\"" . $ANCHOCARPETA . "\" border=0" . " height=\"" . $ALTOCARPETA . "\"" . " alt=\"$descripcionCarpeta\""  .  ">"; 
					}
					$TImagen .= "</a>";
					$TImagen .= "</td></tr></table>";
					$TImagen .= "</td>";
					echo $TBordeImagenGrandeIzquierdaArriba . "\n" ;
					echo $TBordeImagenGrandeCentroArriba . "\n";
					echo $TBordeImagenGrandeDerechaArriba . "\n";
					echo "</tr><tr>". "\n";
					echo $TBordeImagenGrandeIzquierdaCentro . "\n";
					echo $TImagen. "\n" ; 
					echo $TBordeImagenGrandeDerechaCentro . "\n";
					echo "</tr><tr>" . "\n";
					echo $TBordeImagenGrandeIzquierdaAbajo . "\n";
					echo $TBordeImagenGrandeCentroAbajo . "\n";
					echo $TBordeImagenGrandeDerechaAbajo . "\n";
					echo "</tr></table>" . "\n";
				}else{
					echo "<table background=";
					echo  "images/" . $carpeta . "/small/" . CorrigeModuloPro($listadoimagenes[$inicio]);
					echo  " cellpadding=0 cellspacing=0 >"; 

					if (! $ForzarTamano){
						echo "<tr><td><a href=\"index.php?subcarpeta=" . $subcatalogo . "&carpeta=" . $carpeta ."&foto=" . CorrigeModuloPro($listadoimagenes[$inicio]) . "&inicio=" . $inicio . "\">"; 
						echo "<img src=$PFIMAGE width=" . $ANCHOCARPETA . " height=" . $ALTOCARPETA . "border=0 alt=\"Click for Larger Image\"></a></td></tr></table>";
					}else{
						echo "<tr><td><a href=\"index.php?subcarpeta=" . $subcatalogo . "&carpeta=" . $carpeta ."&foto=" . CorrigeModuloPro($listadoimagenes[$inicio]) . "&inicio=" . $inicio . "\">"; 
						echo "<img src=$PFIMAGE width=" . $ANCHOCARPETA	 . "border=0 alt=\"Click for Larger Image\"></a></td></tr></table>";
					}
				}
				echo $FinFoto;
				if (! $ForzarDescripcion){
					Get_pictModuloDescripcion($listadoimagenes[$inicio], $carpeta);
					echo "<table align=\"left\" width=\"" . ($anchocarpeta) . "\"><br>";
					Get_pictModuloDescripcion($listadoimagenes[$inicio], $carpeta,"", 1,1);
					echo "</table>";
				}
				echo $FinMarcoFoto;
				echo "</td>";
			}
		$inicio ++;
		}
	echo "<tr>";
	}
echo "</table>";

$numerodivisiones = (count($listadoimagenes) -1) / ($contadoralto * $contadorancho) ;
if ($numerodivisiones != intval($numerodivisiones)); 
	$numerodivisiones = intval($numerodivisiones)+1;
	$cadenadivisiones = "";
	$cadenaIzquierda = "";
	$cadenaDerecha = "";
if ($categoriafoto != 0 ){
	$cadenaIzquierda =  "<a href=\"index.php?subcarpeta=" . $subcatalogo . "&carpeta=" . $carpeta . "&inicio=" . ($inicio -1 - ($FOTOSALTO * $FOTOSANCHO))  . "\">";   
	$cadenaIzquierda =  $cadenaIzquierda . $USKOLAGALERYAPREVIOUS;
	$cadenaIzquierda =  $cadenaIzquierda . "</a> ";
}
for ($contadordivisiones = 1; $contadordivisiones <= $numerodivisiones; $contadordivisiones++) {
    $cadenadivisiones =  $cadenadivisiones . "<a href=\"index.php?subcarpeta=" . $subcatalogo . "&carpeta=" . $carpeta . "&inicio=" . (($contadordivisiones -1) * ($contadoralto * $contadorancho) +1) . "\">" .  $contadordivisiones . "</a> " ;
}
if ($categoriafoto < ($numerodivisiones -1) ){
	$cadenaDerecha  = "<a href=\"index.php?subcarpeta=" . $subcatalogo . "&carpeta=" . $carpeta . "&inicio=" . ($inicio - 1 + ($FOTOSALTO * $FOTOSANCHO))  . "\">";   
	$cadenaDerecha =  $cadenaDerecha . $USKOLAGALERYANEXT;
	$cadenaDerecha =  $cadenaDerecha . "</a> ";
}

echo "<br>";
echo "<table align=\"center\" width=100% >";
echo $InicioPie .$cadenaIzquierda  ;
echo $cadenadivisiones;
echo $cadenaDerecha .$FinPie;
echo "</td></tr></table>";
if ($PERMITIRENVIARFICHEROS){
	echo "<table name=\"vamos\" align=\"center\" align=\"center\" >";
	echo "<br>&nbsp;<br>";
	echo "<table><tr><td><table><tr><td>";
	echo "<a name=\"SubmitPhoto\"></a>";
	if ($ForzarTamano){
		echo "<img name=\"viwe\" width=" . $ANCHOCARPETA . " height=" . $ALTOCARPETA .  " src=\"images/spacer.gif\">";
	}else{
		echo "<img name=\"viwe\" width=" . $ANCHOCARPETA .  " src=\"images/spacer.gif\">";
	}
	echo "</td><td></td></tr></table></td><td>";
	echo "<div align=\"center\">" ._MI_USKOLAXGALLERY_ENVIARFOTO;
	echo "<form name=\"publicar\" method=POST action=index.php enctype=\"multipart/form-data\">";
	echo "<input type=\"file\" name=\"nombrefoto\" size=\"50\" onChange=\"viwe.src=nombrefoto.value\"><br>";
	echo "<input type=\"hidden\" name=\"carpeta\" value=" . CorrigeModuloPro($carpeta) . ">";
	echo "<input type=\"hidden\" name=\"inicio\" value=" . ($inicio + 1 - ($contadoralto * $contadorancho)) . ">";
	echo "<input type=\"hidden\" name=\"catalogo\" value=" . $subcatalogo . ">";
	echo "<br>" . _MI_USKOLAXGALLERY_FOTODE. "<br>";
	echo "<input type=\"text\" name=\"FotoDe\" size=\"67\" ><br>";
	echo "<br>" . _MI_USKOLAXGALLERY_FOTOTITLE . "<br>";
	echo "<textarea name=\"title\" rows=\"3\" cols=50>". "</textarea>" . "<br>";
	echo "<br>" . _MI_USKOLAXGALLERY_KEYWORDS . "<br>";
	echo "<textarea name=\"keywords\" rows=\"3\" cols=50>" . "</textarea>" . "<br>";
	echo "<br>" . _MI_USKOLAXGALLERY_FOTODESC . "<br>";
	echo "<br><textarea name=\"descripcionupload\" rows=5 cols=50></textarea><br>";
	echo "<br><br><input type=\"submit\" name=\"enviarfoto\" value=\"" . _MI_USKOLAXGALLERY_PUBLICARFOTO . "\"><br><br></div>"; 
	echo "</td></tr>";
	echo "</table>";
}
}

?>
