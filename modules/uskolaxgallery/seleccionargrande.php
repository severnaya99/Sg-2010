<?php


//Pantalla grande
function MostrarModuloFoto($carpeta, $inicio, $foto, $subcatalogo){

global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;

$consultaDescripcion = "SELECT ID, Carpeta, Fichero, Descripcion, Visitas, Fecha, Comentarios, EnviadoPor, Votos, Clasificacion, ano, mes, dia, FotoDe FROM " .$xoopsDB->prefix("uskolag_imagenes") . " Where (Carpeta like '" . $carpeta . "' AND Fichero like '" . $foto . "')";

$resultDescripcion = $xoopsDB->query($consultaDescripcion);
$encontrado = false;
while($tbCarpetaGetDescripcion = $xoopsDB->fetchArray($resultDescripcion)){
	$encontrado = true;
	$descripcion = $tbCarpetaGetDescripcion['Descripcion'];
	$visitas = $tbCarpetaGetDescripcion['Visitas'];
	$fecha = $tbCarpetaGetDescripcion['dia'] . "/" . $tbCarpetaGetDescripcion['mes'] . "/" .  $tbCarpetaGetDescripcion['ano'] ;
	$enviadopor = $tbCarpetaGetDescripcion['EnviadoPor'];
	$fotode = $tbCarpetaGetDescripcion['FotoDe'];
	$votos = $tbCarpetaGetDescripcion['Votos'];
	$clasificacion = $tbCarpetaGetDescripcion['Clasificacion'];
	$comentarios = $tbCarpetaGetDescripcion['Comentarios'];
}

$consulta2 = "SELECT ID, Carpeta, Imagen, Descripcion, Aleatorio, Bloque, MCatalogos, AnchoBloque, AltoBloque, AnchoImagenes, AltoImagenes, FotosAncho, FotosAlto, Anterior, Siguiente, InicioEncabezado, FinEncabezado, InicioPie, FinPie, InicioFoto, FinFoto, InicioMarcoFoto, FinMarcoFoto, InicioFotoGrande, FinFotoGrande, EnviarVotaciones, EnviarComentarios, EnviarFicheros, NombreFotoCarpeta, BordeImagenGrandeIzquierdaArriba, BordeImagenGrandeIzquierdaCentro, BordeImagenGrandeIzquierdaAbajo, BordeImagenGrandeCentroArriba, BordeImagenGrandeCentroAbajo, BordeImagenGrandeDerechaArriba, BordeImagenGrandeDerechaCentro, BordeImagenGrandeDerechaAbajo, UsarBordes, BordesTema, InicioEncabezadoComentario, FinEncabezadoComentario, UsarBordesImagenGrande, NombreFrameStyleImagenGrande, SobreFoto, BajoFoto, VerFecha FROM " .$xoopsDB->prefix("uskolag_carpeta") . " Where Carpeta like '" . $carpeta . "'";

$myts = new MyTextSanitizer;
$result2 = $xoopsDB->query($consulta2);
$Foto = urldecode($Foto);
$Foto = urlencode($Foto);
$TBordeImagenGrandeIzquierdaArriba = "";
$TBordeImagenGrandeIzquierdaCentro = "";
$TBordeImagenGrandeIzquierdaAbajo = "";
$TBordeImagenGrandeCentroArriba = "";
$TBordeImagenGrandeCentroAbajo = "";
$TBordeImagenGrandeDerechaArriba = "";
$TBordeImagenGrandeDerechaCentro = "";
$TBordeImagenGrandeDerechaAbajo = "";
$TComentarios = "";
$TEComentarios = "";

while($tbCarpeta2 = $xoopsDB->fetchArray($result2)){
	if (!$subcatalogo) {	
		$listadoimagenes = Get_Image_listPro('images/' . $carpeta . '/small/');
	}else{
		$consultafotos = "SELECT catalogo, foto FROM " .$xoopsDB->prefix("uskolag_catalogo_foto"). " where catalogo=" . $subcatalogo;
		if(!$resultcatalogo = $xoopsDB->query($consultafotos )) error_die("Problems");
		while($tbCatalogo = $xoopsDB->fetchArray($resultcatalogo)){
			$consultaNombre = "SELECT ID, Fichero FROM " .$xoopsDB->prefix("uskolag_imagenes") . " Where ID=" . $tbCatalogo['foto'];
			if(!$resultcatalogofoto = $xoopsDB->query($consultaNombre)) error_die("Problems");
			while($tbCatalogoImagen = $xoopsDB->fetchArray($resultcatalogofoto)){
				$listadoimagenes[] = $tbCatalogoImagen['Fichero'];
			}
		}
	}
	$PERMITIRENVIARVOTACIONES = $tbCarpeta2['EnviarVotaciones'];
	$PERMITIRENVIARCOMENTARIOS = $tbCarpeta2['EnviarComentarios'];
	$SobreFoto = $tbCarpeta2['SobreFoto'];
	$BajoFoto = $tbCarpeta2['BajoFoto'];
	$PERMITIDOVERFECHA = $tbCarpeta2['VerFecha'];
	if ($tbCarpeta2['UsarBordesImagenGrande']){
		if ($tbCarpeta2['BordesTema']){
			if (file_exists(XOOPS_ROOT_PATH . "/" . "/themes/" . getTheme() . "/".  $tbCarpeta2['NombreFrameStyleImagenGrande'] . "/images/big/" . "size.php")){
				include (XOOPS_ROOT_PATH . "/"  . "/themes/" . getTheme() .  "/" .  $tbCarpeta2['NombreFrameStyleImagenGrande'] . "/images/big/" . "size.php") ;
				$rutaGrande= XOOPS_URL . "/themes/" . getTheme() . "/" . $tbCarpeta2['NombreFrameStyleImagenGrande']  . "/images/big/";
			}
			else{
				if (file_exists(XOOPS_ROOT_PATH . "/" . "/themes/" . getTheme() . "/images/big/" . "size.php")){
					include (XOOPS_ROOT_PATH . "/"  . "/themes/" . getTheme() . "/images/big/" . "size.php") ;
					$rutaGrande= XOOPS_URL . "/themes/" . getTheme() . "/images/big/";
				}
				else{
					include (XOOPS_ROOT_PATH . "/"  . "/modules/uskolaxgallery/icons/" . $tbCarpeta2['NombreFrameStyleImagenGrande'] . "/big/" . "size.php") ;
					$rutaGrande= XOOPS_URL . "/modules/uskolaxgallery/icons/" . $tbCarpeta2['NombreFrameStyleImagenGrande'] . "/big/";
				}
			}
		}else{
			if (file_exists(XOOPS_ROOT_PATH . "/" . "/themes/" . getTheme() . "/".  $tbCarpeta2['NombreFrameStyleImagenGrande'] . "/images/big/" . "size.php")){
				include (XOOPS_ROOT_PATH . "/"  . "/themes/" . getTheme() .  "/" .  $tbCarpeta2['NombreFrameStyleImagenGrande'] . "/images/big/" . "size.php") ;
				$rutaGrande= XOOPS_URL . "/themes/" . getTheme() . "/" . $tbCarpeta2['NombreFrameStyleImagenGrande']  . "/images/big/";
			}
			else{
				if (file_exists(XOOPS_ROOT_PATH . "/" . "/modules/uskolaxgallery/icons/" . $tbCarpeta2['NombreFrameStyleImagenGrande'] . "/big/" . "size.php")){
				include (XOOPS_ROOT_PATH . "/"  . "/modules/uskolaxgallery/icons/" . $tbCarpeta2['NombreFrameStyleImagenGrande'] . "/big/" . "size.php") ;
				$rutaGrande= XOOPS_URL . "/modules/uskolaxgallery/icons/" . $tbCarpeta2['NombreFrameStyleImagenGrande'] . "/big/";
				}
				else{
					include (XOOPS_ROOT_PATH . "/"  . "/themes/" . getTheme() . "/images/big/" . "size.php") ;
					$rutaGrande= XOOPS_URL . "/themes/" . getTheme() . "/images/big/";
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
		$INICIOENCABEZADOCOMENTARIO = $FInicioEncabezadoComentario;
		$FINENCABEZADOCOMENTARIO = $FFinEncabezadoComentario;
		$INICIOCOMENTARIO = $FInicioComentario;
		$FINCOMENTARIO = $FFinComentario;
		$InicioFotoGrande = $FInicioFoto;
		$FinFotoGrande = $FFinFoto;
		$InicioEncabezado= $FInicioEncabezado ;
		$FinEncabezado= $FFinEncabezado ;
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
		$USKOLAGALERYANEXT = _MI_USKOLAXGALLERY_NEXT;
		$USKOLAGALERYAPREVIOUS = _MI_USKOLAXGALLERY_PREVIOUS;
	}

	$TIzquierda = "";
	if ($inicio > 0){
		$TIzquierda = "<a href=\"index.php?subcarpeta=" . $subcatalogo . "&carpeta=" . $carpeta . "&foto=" . CorrigeModuloPro($listadoimagenes[$inicio - 1]) . "&inicio=" . ($inicio - 1) . "\">"  . $USKOLAGALERYAPREVIOUS. "</a>";
	}
	 if (strlen($tbCarpeta2['NombreFotoCarpeta']) > 0 ) {
		 $TNombreEncabezado = "<a href=\"index.php?subcarpeta=" . $subcatalogo . "&carpeta=" . $carpeta . "\">" . "<img src=\"icons/" . $tbCarpeta2['NombreFotoCarpeta'] . " \"></a>"; 
	 }else{
		 $TNombreEncabezado  = "<a href=\"index.php?subcarpeta=" . $subcatalogo . "&carpeta=" . $carpeta . "\">" . $tbCarpeta2['Descripcion'] . "</a>";
	 }
	$TDerecha = "";
	if ($inicio < count($listadoimagenes)-1){
		$TDerecha =  "<a href=\"index.php?subcarpeta=" . $subcatalogo . "&carpeta=" . $carpeta .  "&foto=" . CorrigeModuloPro($listadoimagenes[$inicio + 1]) . "&inicio=" . ($inicio + 1) . "\">"  . $USKOLAGALERYANEXT . "</a>";
	}
	if (strlen($tbCarpeta2['NombreFotoCarpeta']) > 0 ) {
		 $TNombreEncabezado = "<a href=\"index.php?subcarpeta=" . $subcatalogo . "&carpeta=" . $carpeta . "\">" . "<img src=\"icons/" . $tbCarpeta2['NombreFotoCarpeta'] . " \"></a>"; 
	}else{
		 $TNombreEncabezado  = "<a href=\"index.php?subcarpeta=" . $subcatalogo . "&carpeta=" . $carpeta . "\">" . $tbCarpeta2['Descripcion'] . "</a>";
	}
	if (strlen($descripcionFoto) > 0 ){
		$TDescripcionFoto .= $InicioEncabezado;
	}
	if (strlen($tbCarpeta2['NombreFotoCarpeta']) > 0 ) {
		$TDescripcionFoto .= "<img src=\"icons/" . $tbCarpeta2['NombreFotoCarpeta'] . " \">"; 
	}else{
		$TDescripcionFoto .= $tbCarpeta2['Descripcion'];
	}
	$TDescripcionFoto .= $FinEncabezado;
	
	if (strlen($InicioFotoGrande) > 0){
		$TInicioImagen = $InicioFotoGrande;
	}
	$Foto = urldecode($Foto);
	$Foto = urlencode($Foto);
	$TImagen = 	"<td><a href=\"index.php?subcarpeta=" . $subcatalogo . "&carpeta=" . $carpeta . "&inicio=" . $inicio . "\">";
	if (is_file("leech.php")){
		$TImagen .= "<img src=\"leech.php\"></img></a></td>";
	}else{
		$TImagen .= "<img src=\"images/" .$carpeta . "/big/" . CorrigeModuloPro($foto) . "\"></img></a></td>";
	}

	if (strlen($FinFotoGrande) > 0){
		$TFinImagen = $FinFotoGrande;
	}
	$TVotaciones = "";
	if ($PERMITIRENVIARVOTACIONES){
		$TVotaciones .= "<form name=\"votacion\" method=\"post\" action=\"index.php?carpeta=" . $carpeta . "&foto=" . $listadoimagenes[$inicio]  . "&inicio=" . $inicio . "\">";
		$TVotaciones .=  "<input type=\"hidden\" name=\"carpeta\" value=" . $carpeta . ">";
		$TVotaciones .=  "<input type=\"hidden\" name=\"inicio\" value=" . $inicio . ">";
		$TVotaciones .=  "<input type=\"hidden\" name=\"foto\" value=" . CorrigeModuloPro($foto) . ">";
		$TVotaciones .=  "<br><b>&nbsp;&nbsp;&nbsp;&nbsp;" . _MI_USKOLAXGALLERY_PUNTUARFOTO . " &nbsp;&nbsp;&nbsp;&nbsp;</b>";
		$TVotaciones .=  "<select name=\"MenuVoto\">";
		$TVotaciones .=  "<option>0</option>";
		$TVotaciones .=  "<option>1</option>";
		$TVotaciones .=  "<option>2</option>";
		$TVotaciones .=  "<option>3</option>";
		$TVotaciones .=  "<option>4</option>";
		$TVotaciones .=  "<option>5</option>";
		$TVotaciones .=  "<option>6</option>";
		$TVotaciones .=  "<option>7</option>";
		$TVotaciones .=  "<option>8</option>";
		$TVotaciones .=  "<option>9</option>";
		$TVotaciones .=  "<option selected>10</option>";
		$TVotaciones .=  "</select><br>";
		$TVotaciones .=  "<br>&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"Submit\" value=\"" . _MI_USKOLAXGALLERY_ENVIARVOTACION . "\">";
		$TVotaciones .= "</form>";
	}
	if ($PERMITIRENVIARCOMENTARIOS){
		$TEComentarios = "<form name=\"coment\" method=\"post\" action=\"index.php?carpeta=" . $carpeta. "&foto=" . $listadoimagenes[$inicio] . "&inicio=" . $inicio . "\">";
		$TEComentarios .= "<input type=\"hidden\" name=\"carpeta\" value=" . $carpeta . ">";
		$TEComentarios .= "<input type=\"hidden\" name=\"inicio\" value=" . $inicio . ">";
		$TEComentarios .= "<input type=\"hidden\" name=\"foto\" value=" . CorrigeModuloPro($foto) . ">";
		$TEComentarios .= "<textarea name=\"ponercomentario\" cols=\"40\" rows=\"4\"></textarea>";
		$TEComentarios .= "<br>";
		$TEComentarios .= "<input type=\"submit\" name=\"Submit\" value=\"" . _MI_USKOLAXGALLERY_ENVIARCOMENTARIO . "\">";
		$TEComentarios .="</form>";
	}
	$consultaComentarios = "SELECT ID, Carpeta, Fichero, Usuario, Comentario, Verificado, EsperandoVerificacion FROM " .$xoopsDB->prefix("uskolag_comentarios") . " Where Carpeta like '" . $carpeta . "' And Fichero like'" . $foto . "'" . " And EsperandoVerificacion=0";
	$resultComentarios = $xoopsDB->query($consultaComentarios);
	while($tbCarpetaComentarios = $xoopsDB->fetchArray($resultComentarios)){
		IF ($INICIOENCABEZADOCOMENTARIO){
			$TComentarios .= $INICIOENCABEZADOCOMENTARIO;
		}
		else {
			$TComentarios .= "<tr class='bg3'><td valign=\"top\" colspan=\"2\">";
		}
		$TComentarios .=  "<b>" . $tbCarpetaComentarios['Usuario'] . _MI_USKOLAXGALLERY_ESCRIBIO . "</b>" . "</td></tr>";
		IF ($FINENCABEZADOCOMENTARIO){
			$TComentarios .=  $FINENCABEZADOCOMENTARIO;
		}
		IF ($INICIOCOMENTARIO){
			$TComentarios .= $INICIOCOMENTARIO;
		}
		else {
			$TComentarios .=  "<tr class=\"bg1\"><td valign=\"top\" colspan=\"2\">";;
		}
		$TComentarios .=  $tbCarpetaComentarios['Comentario'] ;
		IF ($FINCOMENTARIO){
			$TComentarios .=  $FINCOMENTARIO;
		}
		$TComentarios .=  "<br>";
		$TComentarios .= "</td></tr>";
	}
}
if (strlen($InicioFotoGrande) > 0){
	$TInicioImagen = $InicioFotoGrande;
}else{
	$TInicioImagen = "<table cellpadding=0 cellspacing=0 border=0 align=center><tr>";
}
if (strlen($FinFotoGrande) > 0){
	$TFinImagen = $FinFotoGrande;
}else{
	$TFinImagen = "</table>";
}
echo "<table cellpadding=0 cellspacing=0 width=100%><tr><td colspan=2 align=center>";
if ($InicioEncabezado){
	echo $InicioEncabezado;
}else{
	echo "<table align=center>";
}
echo $TNombreEncabezado ;
if ($FinEncabezado){
	echo $FinEncabezado;
}else{
	echo "</table>";
}
echo "<table cellpadding=0 cellspacing=0 align=center>";
echo "<table cellpadding=0 cellspacing=0 align=center>";
echo "<tr><td align=left width=50%>";
echo $TIzquierda;
echo "</td><td align=right width=50%>";
echo $TDerecha;
echo "</td></tr>";
if ($SobreFoto){
	echo "<tr><table cellpadding=0 cellspacing=0 align=center> <tr><td>"  . $descripcion . "</td></tr></table></tr>";
}else{
	echo "<tr><table cellpadding=0 cellspacing=0 align=center> <tr><td>"  .  "</td></tr></table></tr>";
}
echo "<tr>";
echo "<td colspan=2 align=center>";
echo $TInicioImagen;
echo "<tr>";
if (! $PF){
	echo $TBordeImagenGrandeIzquierdaArriba ;
	echo $TBordeImagenGrandeCentroArriba ;
	echo $TBordeImagenGrandeDerechaArriba ;
	echo "</tr><tr>";
	echo $TBordeImagenGrandeIzquierdaCentro ;
	echo $TImagen; 
	echo $TBordeImagenGrandeDerechaCentro ;
	echo "</tr><tr>";
	echo $TBordeImagenGrandeIzquierdaAbajo ;
	echo $TBordeImagenGrandeCentroAbajo ;
	echo $TBordeImagenGrandeDerechaAbajo ;
}else{
	$image_stats = GetImageSize("images/" .$carpeta . "/big/" . CorrigeModuloPro($foto)); 
	$PFS2_width = $image_stats[0]; 
	echo "<table background=\"images/" . $carpeta . "/big/" . CorrigeModuloPro($foto) . "\" cellpadding=0 cellspacing=0>";
	echo "<tr><td><a href=\"index.php?subcarpeta=" . $subcatalogo . "&carpeta=" . $carpeta . "&inicio=" . $inicio . "\">"; 
	echo "<img src=$PFIMAGE width=" . $PFS2_width . "border=0></a></td></tr>";
}
echo $TFinImagen ;
echo "</td></tr><tr><td align=left  valign=top><font class=caption>";
IF ($fotode){
	echo _MI_USKOLAXGALLERY_FOTODE . "&nbsp;";
	echo $fotode ;
}
echo "</font></td><td align=right valign=top>";
if ($enviadopor){
	echo _MI_USKOLAXGALLERY_ENVIADOPOR . $enviadopor;
}
echo "<br>";
IF ($PERMITIDOVERFECHA)	{
	echo $fecha;
}
echo "</td></tr><tr><td colspan=2 align=center><font class=bigcaption>";
if ($BajoFoto){
	echo "<tr><table> <tr><td>"  . $descripcion . "</td></tr></table></tr>";
}else{
	echo "<tr><table cellpadding=0 cellspacing=0 align=center> <tr><td>"  .  "</td></tr></table></tr>";
}
echo "</td>";
echo "</tr>";
if ($PERMITIRENVIARCOMENTARIOS){
	echo "<tr><td colspan=2 align=center>";
	echo $TComentarios;
	echo "<P><tr><td colspan=2 align=center>";
	echo $TEComentarios;
	echo "</td>";
	echo "</tr>";
}

if ($PERMITIRENVIARVOTACIONES){
  echo "<tr><td colspan=2 align=center>";
  echo _MI_USKOLAXGALLERY_VOTOS . $votos;
  echo "<P>";
  echo $TVotaciones;
  echo "</td></tr>";
}
// Webby
}


?>
