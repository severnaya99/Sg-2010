<?php

Function Agrupaciones(){
global $xoopsConfig, $xoopsDB, $xoopsModule;
	echo _AM_USKOLAXGALLERY_ANADIRCATEGORIA;
	echo _AM_USKOLAXGALLERY_ELIMINARCATEGORIA;

}


Function ActualizarCatalogos($galeria, $Inactivas, $Activas){
global $xoopsConfig, $xoopsDB, $xoopsModule; $xoopsTheme;
$Inactivas = explode(",", $Inactivas);
$Activas = explode(",", $Activas);
$ContadorInactivas = count($Inactivas) -1;
$ContadorActivas = count($Activas) -1;
for ($i = 0; $i < ($ContadorInactivas); $i++) {
	$consulta =  "DELETE FROM ". $xoopsDB->prefix("uskolag_father_gallery") . " WHERE father_id=" . $Inactivas[$i]. " AND gallery_id=" . $galeria;
	$result = $xoopsDB->queryf($consulta);
}

for ($i = 0; $i < ($ContadorActivas); $i++) {
	$consulta =  "INSERT INTO ". $xoopsDB->prefix("uskolag_father_gallery") . "(father_id, gallery_id) VALUES (" . $Activas[$i] . ",". $galeria .")";
	$result = $xoopsDB->queryf($consulta);

}

echo "Galeria:" . $galeria . "<br>";

echo "Activas:" . $ContadorInactivas . "-" . $ContadorActivas . "<br>";

}



Function MostrarCarpetas($NumeroCarpeta){

global $xoopsConfig, $xoopsDB, $xoopsModule; $xoopsTheme;

$consulta = "SELECT ID, Carpeta, Imagen, Descripcion, Aleatorio, Bloque, MCatalogos, AnchoBloque, AltoBloque, AnchoImagenes, AltoImagenes, FotosAncho, FotosAlto, EnviarFicheros, EnviarComentarios, EnviarVotaciones, EnviarEnlaces, NecesarioRegistrar, InicioDescargas, FinDescargas, InicioEnlaces, FinEnlaces, Anterior, Siguiente, InicioEncabezado, FinEncabezado, InicioPie, FinPie, InicioEncabezadoComentario, FinEncabezadoComentario,  InicioComentario, FinComentario, BloquearImagenesSubidas, BloquearComentarios, InicioFoto, FinFoto, InicioFotoGrande, FinFotoGrande, InicioMarcoFoto, FinMarcoFoto, VerVisitas, VerFecha, TemaCargado, FotoDescripcion, UsarGraficoEnNombre, AleatorioListado, PermitirImprimir, PermitirMail, NombreFotoCarpeta,  NombreFotoCarpetaSuperior , BordeImagenIzquierda, BordeImagenDerecha, BordeImagenArriba, BordeImagenAbajo, UsarBordes, BordesTema, BordeImagenPequenoIzquierda, BordeImagenPequenoDerecha, BordeImagenPequenoArriba, BordeImagenPequenoAbajo, BordeImagenGrandeIzquierdaArriba, BordeImagenGrandeIzquierdaCentro, BordeImagenGrandeIzquierdaAbajo, BordeImagenGrandeCentroArriba, BordeImagenGrandeCentroAbajo, BordeImagenGrandeDerechaArriba, BordeImagenGrandeDerechaCentro, BordeImagenGrandeDerechaAbajo, EspaciadoInterno FROM " .$xoopsDB->prefix("uskolag_carpeta"). "";

	$myts = new MyTextSanitizer;

	$result = $xoopsDB->query($consulta);

	echo "<form name=\"formID\" method=\"post\" action=\"index.php?op=cargaID\">";
	echo "<table width=100% cellspacing=0 cellpadding=0><tr><td><br></td></tr><tr><td>" . _AM_USKOLAXGALLERY_IRA ;
	echo "<select name=\"vergalleryid\">";

$QID = "";
$Seleccionado = false;

while($tbCarpeta = $xoopsDB->fetchArray($result)){
	if (! $Seleccionado){
	echo "<option selected>" . $tbCarpeta['ID'] . "- " . $tbCarpeta['Descripcion'] . "</option>";
	}else{
	echo "<option>" . $tbCarpeta['ID'] . "- " . $tbCarpeta['Descripcion'] . "</option>";
	}
	if ($tbCarpeta['ID'] == $NumeroCarpeta){
	$Seleccionado = true;
	}
}

	 echo "</select><input type=\"submit\" name=\"CambiarID\" value=\"" . _AM_USKOLAXGALLERY_CARGAR . "\">";
	 echo "</td></tr><tr><td><br></td></tr></table>";
	 echo "</form>";

		echo "<br>";
		echo "<hr>";
		echo "<br>";


if ($NumeroCarpeta){
	$QID = $NumeroCarpeta  ;
}

$QID = intval($QID);

$consulta = "SELECT ID, Carpeta, Imagen, Descripcion, Aleatorio, Bloque, MCatalogos, AnchoBloque, AltoBloque, AnchoImagenes, AltoImagenes, FotosAncho, FotosAlto, EnviarFicheros, EnviarComentarios, EnviarVotaciones, EnviarEnlaces, NecesarioRegistrar, InicioDescargas, FinDescargas, InicioEnlaces, FinEnlaces, Anterior, Siguiente, InicioEncabezado, FinEncabezado, InicioPie, FinPie, BloquearImagenesSubidas, BloquearComentarios, InicioFoto, FinFoto, InicioFotoGrande, FinFotoGrande, InicioMarcoFoto, FinMarcoFoto, VerVisitas, VerFecha, TemaCargado, FotoDescripcion, UsarGraficoEnNombre, AleatorioListado, PermitirImprimir, PermitirMail, NombreFotoCarpeta,  NombreFotoCarpetaSuperior , BordeImagenIzquierda, BordeImagenDerecha, BordeImagenArriba, BordeImagenAbajo, UsarBordes, BordesTema, BordeImagenPequenoIzquierda, BordeImagenPequenoDerecha, BordeImagenPequenoArriba, BordeImagenPequenoAbajo, BordeImagenGrandeIzquierdaArriba, BordeImagenGrandeIzquierdaCentro, BordeImagenGrandeIzquierdaAbajo, BordeImagenGrandeCentroArriba, BordeImagenGrandeCentroAbajo, BordeImagenGrandeDerechaArriba, BordeImagenGrandeDerechaCentro, BordeImagenGrandeDerechaAbajo, SobreFoto, BajoFoto, UsarBordesBloque, UsarBordesGaleria, UsarBordesImagenGrande, NombreFrameStyleBlock, NombreFrameStyleGaleria, NombreFrameStyleImagenGrande, TamanoMaximoFichero, ForzarDescripcion, ForzarTamano, EspaciadoVertical, EspaciadoHorizontal, Espaciado, ColorFondo, ColorFondo1, ColorFondo2, ColorFondo3, ColorFondo4, EspaciadoInterno FROM " .$xoopsDB->prefix("uskolag_carpeta"). " Where ID=" . $QID;



$result = $xoopsDB->query($consulta);

//tabla Gallery info

	echo "<table width=100% cellspacing=0 cellpadding=0>";
	while($tbCarpeta = $xoopsDB->fetchArray($result)){

	echo "<tr>";
		echo "<td>";

		echo "<form name=\"c" . $tbCarpeta['ID'] . "\" method=\"post\" action=\"index.php\">";
		echo "<input type=\"hidden\" name=\"op\" value=\"GuardarGaleria\">";
		echo "<table width=100% cellspacing=3 cellpadding=3> <tr>";
		echo "<td colspan=7>";
		echo "<table width=100% cellspacing=3 cellpadding=3><tr><td>";
		echo "<div align=\"center\"><h1><b><i>";
		echo PreparaAyuda("<h1>" . "<img src=\"icons/GalleryInfo.gif\">" .  _AM_USKOLAXGALLERY_INFO . "</h1>", _HELP_USKOLAXGALLERY_INFO). "</i></b></h1></div>";
		echo "</td><td>";
		echo "<div align=\"right\">"  . BotonAyuda("<img src=\"icons/help.gif\">", _HELP_USKOLAXGALLERY_HELP) . "</div>";
		echo "</table>";
		echo "</td></tr>";
		echo "<tr><td colspan=7>";
		echo "<table width=100% cellspacing=3 cellpadding=3><tr><td>";
	    echo "<td colspan=4 height=20>" . PreparaAyuda("ID: " . $tbCarpeta['ID'], _HELP_USKOLAXGALLERY_ID)  . "</td>";
		echo "<input type=\"hidden\" name=\"ID\" Value=\"" . $tbCarpeta['ID'] . "\"><td colspan=3><div align=\"right\">" .  PreparaAyuda("<a href=\"#themes\">" . " -> " . _AM_USKOLAXGALLERY_PROBARTEMAS . " <- " . "</a></div></td>", _HELP_USKOLAXGALLERY_PROBARTEMAS) ;
		echo "</tr>";
		echo "</table>";
		echo "<br>";
		echo "<table cellspacing=3 cellpadding=3 align=\"left\"><tr align=\"left\"><td align=\"left\">";
		echo  PreparaAyuda(_AM_USKOLAXGALLERY_NOMBRECARPETA , _HELP_USKOLAXGALLERY_NOMBRECARPETA);
		echo "</td><td>";
		echo  PreparaAyuda("<input type=\"text\" name=\"Carpeta\" value=\"". $tbCarpeta['Carpeta']."\" size=\"40\">" , _HELP_USKOLAXGALLERY_NOMBRECARPETA);
		echo "</td></tr><tr><td>";

		echo PreparaAyuda(_AM_USKOLAXGALLERY_FOTODESC,_HELP_USKOLAXGALLERY_FOTODESC);
		echo "</td><td>";

		echo PreparaAyuda("<input type=\"text\" name=\"Descripcion\" value=\"". $tbCarpeta['Descripcion']. "\" size=\"40\">",_HELP_USKOLAXGALLERY_FOTODESC);

		echo "</td></tr><tr><td>";

		echo PreparaAyuda(_AM_USKOLAXGALLERY_GRANDE,_HELP_USKOLAXGALLERY_GRANDE);
		echo "</td><td>";

		echo PreparaAyuda("<input type=\"text\" name=\"NombreFotoCarpeta\" value=\"". Codifica($tbCarpeta['NombreFotoCarpeta']) . "\" size=\"40\">",_HELP_USKOLAXGALLERY_GRANDE);
		echo "</td></tr><tr><td>";

		echo PreparaAyuda(_AM_USKOLAXGALLERY_FOTOPEQUENA ,_HELP_USKOLAXGALLERY_FOTOPEQUENA);
		echo "</td><td>";

		echo PreparaAyuda("<input type=\"text\" name=\"NombreFotoCarpetaSuperior\" value=\"". Codifica($tbCarpeta['NombreFotoCarpetaSuperior']) . "\" size=\"40\">",_HELP_USKOLAXGALLERY_FOTOPEQUENA);
		echo "</td></tr><tr><td>";


		echo "</td></td>";
		echo "</table>";
		echo "</td></tr>";
		echo "<tr><td>";

		echo "<br>";

		echo "<table cellspacing=3 cellpadding=3><tr><td>";
		echo PreparaAyuda(_AM_USKOLAXGALLERY_PERMITIRENVIOSDE, _HELP_USKOLAXGALLERY_PERMITIRENVIOSDE);

		echo "</td><td>";
		if ($tbCarpeta['EnviarComentarios']){
			echo  PreparaAyuda("<input type=\"checkbox\" name=\"EnviarComentarios\" value=\"1\"" ." checked" . ">" . _AM_USKOLAXGALLERY_PERMITIDOSUBIRCOMENTARIOS, _HELP_USKOLAXGALLERY_PERMITIDOSUBIRCOMENTARIOS);
		}else{
			echo  PreparaAyuda("<input type=\"checkbox\" name=\"EnviarComentarios\" value=\"1\"" . ">" . _AM_USKOLAXGALLERY_PERMITIDOSUBIRCOMENTARIOS , _HELP_USKOLAXGALLERY_PERMITIDOSUBIRCOMENTARIOS);
		}

		echo "</td><td>";
		if ($tbCarpeta['EnviarVotaciones']){
			echo  PreparaAyuda("<input type=\"checkbox\" name=\"EnviarVotaciones\" value=\"1\"" ." checked" . ">" . _AM_USKOLAXGALLERY_PERMITIDOSUBIRVOTACIONES, _HELP_USKOLAXGALLERY_PERMITIDOSUBIRVOTACIONES);
		}else{
			echo  PreparaAyuda("<input type=\"checkbox\" name=\"EnviarVotaciones\" value=\"1\"" . ">" . _AM_USKOLAXGALLERY_PERMITIDOSUBIRVOTACIONES , _HELP_USKOLAXGALLERY_PERMITIDOSUBIRVOTACIONES);
		}
		echo "</td></tr><tr><td>&nbsp;</td><td>";

		if ($tbCarpeta['EnviarFicheros']){
			echo  PreparaAyuda("<input type=\"checkbox\" name=\"EnviarFicheros\" value=\"1\"" ." checked" . ">" . _AM_USKOLAXGALLERY_PERMITIDOSUBIRFICHEROS, _HELP_USKOLAXGALLERY_PERMITIDOSUBIRFICHEROS);
		}else{
			echo  PreparaAyuda("<input type=\"checkbox\" name=\"EnviarFicheros\" value=\"1\"" . ">" . _AM_USKOLAXGALLERY_PERMITIDOSUBIRFICHEROS, _HELP_USKOLAXGALLERY_PERMITIDOSUBIRFICHEROS);
		}
		echo "</td><td>";

		echo PreparaAyuda( _AM_USKOLAXGALLERY_TAMANOMAXIMO. "<input type=\"text\" name=\"TamanoMaximoFichero\" value=\"" . Codifica($tbCarpeta['TamanoMaximoFichero']) . "\" size=\"7\">", _HELP_USKOLAXGALLERY_TAMANOMAXIMO);

		echo "</td></tr><tr><td>";
		echo PreparaAyuda(_AM_USKOLAXGALLERY_VISUALIZAR, _HELP_USKOLAXGALLERY_VISUALIZAR);

		echo "</td><td>";
		if ($tbCarpeta['VerVisitas']){
			echo  PreparaAyuda("<input type=\"checkbox\" name=\"VerVisitas\" value=\"1\"" ." checked" . ">" . _AM_USKOLAXGALLERY_PERMITIDOVERVISITAS, _HELP_USKOLAXGALLERY_PERMITIDOVERVISITAS);
		}else{
			echo  PreparaAyuda("<input type=\"checkbox\" name=\"VerVisitas\" value=\"1\"" . ">" . _AM_USKOLAXGALLERY_PERMITIDOVERVISITAS, _HELP_USKOLAXGALLERY_PERMITIDOVERVISITAS);
		}


		echo "</td><td>";
		if ($tbCarpeta['VerFecha']){
			echo  PreparaAyuda("<input type=\"checkbox\" name=\"VerFecha\" value=\"1\"" ." checked" . ">" . _AM_USKOLAXGALLERY_PERMITIDOVERFECHA, _HELP_USKOLAXGALLERY_PERMITIDOVERFECHA);
		}else{
			echo  PreparaAyuda("<input type=\"checkbox\" name=\"VerFecha\" value=\"1\"" . ">" . _AM_USKOLAXGALLERY_PERMITIDOVERFECHA, _HELP_USKOLAXGALLERY_PERMITIDOVERFECHA);
		}


		echo "</td></tr>";
		echo "</table>";

		echo "</td></tr>";
		echo "<tr><td>";

		echo "<table cellspacing=3 cellpadding=3><tr><td>";

		if ($tbCarpeta['BordesTema']){
			echo  PreparaAyuda("<input type=\"checkbox\" name=\"BordesTema\" value=\"1\"" ." checked" . ">" . _AM_USKOLAXGALLERY_VERXOOPSTEMA, _HELP_USKOLAXGALLERY_VERXOOPSTEMA);
		}else{
			echo  PreparaAyuda("<input type=\"checkbox\" name=\"BordesTema\" value=\"1\"" . ">" . _AM_USKOLAXGALLERY_VERXOOPSTEMA, _HELP_USKOLAXGALLERY_VERXOOPSTEMA);
		}

		echo "</td></tr><tr><td>";

		echo PreparaAyuda("<input type=\"submit\" name=\"GuardarCarpeta\" value=\"" . _AM_USKOLAXGALLERY_GUARDARCAMBIOSGALERIA ."\">", _HELP_USKOLAXGALLERY_GUARDARCAMBIOSGALERIA);
		echo "</td></tr>";
		echo "</table>";

	echo "</table>";

		echo "<br>";
		echo "<hr>";
		echo "<br>";



//tabla Imagen Grande

	echo "<table width=100% cellspacing=3 cellpadding=3> <tr>";
	echo "<td colspan=4>";

	echo "<div align=\"center\">" .  PreparaAyuda("<h1><img src=\"icons/LargePhoto.gif\">"  . _AM_USKOLAXGALLERY_LARGEPHOTOPRESENTATION . "</h1>" , _HELP_USKOLAXGALLERY_LARGEPHOTOPRESENTATION);
	echo "</div>";
	echo "</td><td>";
	echo "<div align=\"right\">" . BotonAyuda("<img src=\"icons/help.gif\">", _HELP_USKOLAXGALLERY_HELP) . "</div>";
	echo "</td></tr><tr>";
	echo "<td>";

	echo "<table cellspacing=3 cellpadding=3> <tr>";


	echo "<td colspan=2>";

	echo "</td></tr><tr><td coolspan=2 align=\"left\">";
	echo PreparaAyuda(_AM_USKOLAXGALLERY_BORDEIMAGENGRANDESHOWDESCRIPTION, _HELP_USKOLAXGALLERY_BORDEIMAGENGRANDESHOWDESCRIPTION);
	echo "</td><td>";

	if ($tbCarpeta['SobreFoto']){
		echo  PreparaAyuda("<input type=\"checkbox\" name=\"SobreFoto\" value=\"1\"" ." checked" . ">" . _AM_USKOLAXGALLERY_SOBREFOTO, _HELP_USKOLAXGALLERY_SOBREFOTO);
	}else{
		echo  PreparaAyuda("<input type=\"checkbox\" name=\"SobreFoto\" value=\"1\"" . ">" . _AM_USKOLAXGALLERY_SOBREFOTO, _HELP_USKOLAXGALLERY_SOBREFOTO);
	}


	echo "</td><td>";

	if ($tbCarpeta['BajoFoto']){
		echo  PreparaAyuda("<input type=\"checkbox\" name=\"BajoFoto\" value=\"1\"" ." checked" . ">" . _AM_USKOLAXGALLERY_BAJOFOTO, _HELP_USKOLAXGALLERY_BAJOFOTO);
	}else{
		echo  PreparaAyuda("<input type=\"checkbox\" name=\"BajoFoto\" value=\"1\"" . ">" . _AM_USKOLAXGALLERY_BAJOFOTO, _HELP_USKOLAXGALLERY_BAJOFOTO);
	}

	echo "</td></tr><tr><td coolspan=2 align=\"left\">";

	if ($tbCarpeta['UsarBordesImagenGrande']){
		echo  PreparaAyuda("<input type=\"checkbox\" name=\"UsarBordesImagenGrande\" value=\"1\"" ." checked" . ">" . _AM_USKOLAXGALLERY_USARBORDES, _HELP_USKOLAXGALLERY_USARBORDES);
	}else{
		echo  PreparaAyuda("<input type=\"checkbox\" name=\"UsarBordesImagenGrande\" value=\"1\"" . ">" . _AM_USKOLAXGALLERY_USARBORDES, _HELP_USKOLAXGALLERY_USARBORDES);
	}

	echo "</td><td>";


	$totalficherosImagenesGrandes = Get_Image_listdir(XOOPS_ROOT_PATH . "/" . "/modules/uskolaxgallery/icons/");
	$numeroficherosImagenesGrandes = count($totalficherosImagenesGrandes);

	$prueba="";
		$prueba= "<select name=\"NombreFrameStyleImagenGrande\">";
		for ($i = 0; $i < ($numeroficherosImagenesGrandes); $i++) {

			$ficheroImagenGrande  = $totalficherosImagenesGrandes[$i];
			$prueba .= "<option";
			if ($ficheroImagenGrande == $tbCarpeta['NombreFrameStyleImagenGrande']){
			$prueba .= " selected";
			}
			$prueba .= ">" . $ficheroImagenGrande. "</option>";
		}
		$prueba .= "</select>";
	echo  PreparaAyuda($prueba, _HELP_USKOLAXGALLERY_SELECTEDTHEME);

	echo "</td></tr><tr>";
	echo "<td>";

	echo PreparaAyuda("<input type=\"submit\" name=\"GuardarCarpeta\" value=\"" . _AM_USKOLAXGALLERY_GUARDARCAMBIOSGALERIA ."\">", _HELP_USKOLAXGALLERY_GUARDARCAMBIOSGALERIA);

	echo "</td></tr>";
	echo "</table>";
	echo "</table>";



if ($NumeroCarpeta){
	$QID = $NumeroCarpeta  ;
}



		echo "<br>";
		echo "<hr>";
		echo "<br>";


	//tabla imagenes thumbnail.
	//Aqui me he parado.

	echo "<table width=100% cellspacing=3 cellpadding=3> <tr>";
	echo "<td colspan=4>";

	echo "<div align=\"center\">". PreparaAyuda("<h1>"  .  "<img src=\"icons/Thumbnails.gif\">" ._AM_USKOLAXGALLERY_BORDEIMAGENGRANDETHUMBPRESENT . "</h1>", _HELP_USKOLAXGALLERY_BORDEIMAGENGRANDETHUMBPRESENT). "</div>";
	echo "</td><td>";
	echo "<div align=\"right\">" . BotonAyuda("<img src=\"icons/help.gif\">",_HELP_USKOLAXGALLERY_HELP) . "</div>";
	echo "</td></tr><tr>";
	echo "</table>";
	echo "<br>";
	echo "<table cellspacing=3 cellpadding=3> <tr>";

//	echo "<td colspan=4><h3>";
//	echo _AM_USKOLAXGALLERY_TEXTOTHUMBNAIL;
//	echo "</h3></div></td></tr><tr>
	echo "</td><td align=center>";
	echo PreparaAyuda(_AM_USKOLAXGALLERY_ANCHO, _HELP_USKOLAXGALLERY_ANCHO);
	echo "</td><td align=center>";
	echo PreparaAyuda(_AM_USKOLAXGALLERY_ALTO, _HELP_USKOLAXGALLERY_ALTO);
	echo "</td><td align=center>";
	echo PreparaAyuda(_AM_USKOLAXGALLERY_IZQUIERDADERECHA, _HELP_USKOLAXGALLERY_IZQUIERDADERECHA);
	echo "</td><td align=center>";
	echo PreparaAyuda(_AM_USKOLAXGALLERY_ARRIBAABAJO, _HELP_USKOLAXGALLERY_ARRIBAABAJO);
	echo "</td></tr>";
	echo "<tr>";
	echo "</td><td align=center>";
	echo PreparaAyuda("<input type=\"text\" name=\"AnchoImagenes\" value=\"". $tbCarpeta['AnchoImagenes']. "\">", _HELP_USKOLAXGALLERY_ANCHO);
	echo "</td><td align=center>";
	echo PreparaAyuda("<input type=\"text\" name=\"AltoImagenes\" value=\"". $tbCarpeta['AltoImagenes']. "\">", _HELP_USKOLAXGALLERY_ALTO);
	echo "</td><td align=center>";
	echo PreparaAyuda("<input type=\"text\" name=\"FotosAncho\" value=\"". $tbCarpeta['FotosAncho']. "\">", _HELP_USKOLAXGALLERY_IZQUIERDADERECHA);
	echo "</td><td align=center>";
	echo PreparaAyuda("<input type=\"text\" name=\"FotosAlto\" value=\"". $tbCarpeta['FotosAlto']. "\">", _HELP_USKOLAXGALLERY_ARRIBAABAJO);
	echo "</td></tr><tr>";

	echo "<td align=center>";
	echo PreparaAyuda(_AM_USKOLAXGALLERY_ESPACIADOHORIZONTAL, _HELP_USKOLAXGALLERY_ESPACIADOHORIZONTAL);
	echo "</td><td align=center>";
	echo PreparaAyuda(_AM_USKOLAXGALLERY_ESPACIADOVERTICAL, _HELP_USKOLAXGALLERY_ESPACIADOVERTICAL);
	echo "</td><td align=center>";
	echo PreparaAyuda(_AM_USKOLAXGALLERY_ESPACIADO, _HELP_USKOLAXGALLERY_ESPACIADO);
//	echo "</td><td align=center>";
//	echo PreparaAyuda(_AM_USKOLAXGALLERY_COLORFONDO, _HELP_USKOLAXGALLERY_COLORFONDO);
	echo "</td></tr>";
	echo "<tr>";
	echo "<td align=center>";
	echo PreparaAyuda("<input type=\"text\" name=\"EspaciadoHorizontal\" value=\"". $tbCarpeta['EspaciadoHorizontal']. "\">", _HELP_USKOLAXGALLERY_ESPACIADOHORIZONTAL);
	echo "</td><td align=center>";
	echo PreparaAyuda("<input type=\"text\" name=\"EspaciadoVertical\" value=\"". $tbCarpeta['EspaciadoVertical']. "\">", _HELP_USKOLAXGALLERY_ESPACIADOVERTICAL);
	echo "</td><td align=center>";
	echo PreparaAyuda("<input type=\"text\" name=\"Espaciado\" value=\"". $tbCarpeta['Espaciado']. "\">", _HELP_USKOLAXGALLERY_ESPACIADO);
//	echo "</td><td align=center>";
//	echo PreparaAyuda("<input type=\"text\" name=\"ColorFondo\" value=\"". $tbCarpeta['ColorFondo']. "\">", _HELP_USKOLAXGALLERY_COLORFONDO);
	echo "</td></tr>";
	echo "</table>";
	echo "<br>";

	echo "</td></tr><tr>";
	echo "<td>";


	echo "<table cellspacing=3 cellpadding=3>";
// webby Mattes

	echo "<tr><td colspan=2 align=center><b>";
	echo PreparaAyuda(_AM_USKOLAXGALLERY_THUMBNAILPICTUREMATTES, _HELP_USKOLAXGALLERY_THUMBNAILPICTUREMATTES);
	echo "</b></td></tr>\n";


	echo "<tr><td align=center>";
	echo PreparaAyuda(_AM_USKOLAXGALLERY_COLORFONDO1, _HELP_USKOLAXGALLERY_COLORFONDO1) . "<br>";
	echo PreparaAyuda("<input type=\"text\" name=\"ColorFondo1\" value=\"". $tbCarpeta['ColorFondo1']. "\"></td><td align=center>", _HELP_USKOLAXGALLERY_COLORFONDO1);

	echo PreparaAyuda(_AM_USKOLAXGALLERY_COLORFONDO2, _HELP_USKOLAXGALLERY_COLORFONDO2) . "<br>";
	echo PreparaAyuda("<input type=\"text\" name=\"ColorFondo2\" value=\"". $tbCarpeta['ColorFondo2']. "\">", _HELP_USKOLAXGALLERY_COLORFONDO2);
	echo "</td>\n";
	echo "</tr><tr>";
	echo "<td colspan=2 align=center> ";
	echo "	<table bordercolor=black cellpadding=4>
		<tr>
			<td align=center><b>" ._AM_USKOLAXGALLERY_COORDINATING;
		$currenttheme = getTheme();
		echo $currenttheme;
		echo _AM_USKOLAXGALLERY_THEMECOLORHELP ."</td></tr><tr ><td bgcolor=FFFFFF>";
		echo "
			<table cellpadding=4 cellspacing=2>
			<tr>
			<td class=bg1 width=60 height=50 align=center valign=absmiddle><font face=\"monotype corsiva,verdana\"><big>1</td>
			<td class=bg2 width=60 height=50 align=center valign=absmiddle><font face=\"monotype corsiva,verdana\"><big>2</td>
			<td class=bg3 width=60 height=50 align=center valign=absmiddle><font face=\"monotype corsiva,verdana\"><big>3</td>
			<td class=bg4 width=60 height=50 align=center valign=absmiddle><font face=\"monotype corsiva,verdana\"><big>4</td>
			<td class=bg5 width=60 height=50 align=center valign=absmiddle><font face=\"monotype corsiva,verdana\"><big>5</td>
			<td class=bg6 width=60 height=50 align=center valign=absmiddle><font face=\"monotype corsiva,verdana\"><big>6</td>
			</tr>
			</table>
			</td>
		</tr>
		</table>\n";
		echo "</td>";

// end webby


	echo "</tr><tr>";
	echo "<td>";
	echo "<table cellspacing=3 cellpadding=3> <tr>";

	echo "<tr>";


	echo "<td colspan=4>";

	if ($tbCarpeta['ForzarDescripcion']){
		echo  PreparaAyuda("<input type=\"checkbox\" name=\"ForzarDescripcion\" value=\"1\"" ." checked" . ">" . _AM_USKOLAXGALLERY_FORZARDESCRIPCION, _HELP_USKOLAXGALLERY_FORZARDESCRIPCION);
	}else{
		echo  PreparaAyuda("<input type=\"checkbox\" name=\"ForzarDescripcion\" value=\"1\"" . ">" . _AM_USKOLAXGALLERY_FORZARDESCRIPCION, _HELP_USKOLAXGALLERY_FORZARDESCRIPCION);
	}

	echo "</td><td>";

	if ($tbCarpeta['ForzarTamano']){
		echo  PreparaAyuda("<input type=\"checkbox\" name=\"ForzarTamano\" value=\"1\"" ." checked" . ">" . _AM_USKOLAXGALLERY_FORZARTAMANO, _HELP_USKOLAXGALLERY_FORZARTAMANO);
	}else{
		echo  PreparaAyuda("<input type=\"checkbox\" name=\"ForzarTamano\" value=\"1\"" . ">" . _AM_USKOLAXGALLERY_FORZARTAMANO, _HELP_USKOLAXGALLERY_FORZARTAMANO);
	}


	ECHO "</td></tr>";
	echo "</table>";
	echo "<br>";
// Picture Frames
	echo "<table width=100% cellspacing=3 cellpadding=3> <tr>";
	echo "<td colspan=4>";

	if ($tbCarpeta['UsarBordesGaleria']){
		echo  PreparaAyuda("<input type=\"checkbox\" name=\"UsarBordesGaleria\" value=\"1\"" ." checked" . ">" . _AM_USKOLAXGALLERY_USARBORDES, _HELP_USKOLAXGALLERY_USARBORDES);
	}else{
		echo  PreparaAyuda("<input type=\"checkbox\" name=\"UsarBordesGaleria\" value=\"1\"" . ">" . _AM_USKOLAXGALLERY_USARBORDES, _HELP_USKOLAXGALLERY_USARBORDES);
	}

	echo "</td><td>";

	$totalficherosImagenesGrandes = Get_Image_listdir(XOOPS_ROOT_PATH . "/" . "/modules/uskolaxgallery/icons/");
	$numeroficherosImagenesGrandes = count($totalficherosImagenesGrandes);

	$prueba="";
		$prueba= "<select name=\"NombreFrameStyleGaleria\">";
	for ($i = 0; $i < ($numeroficherosImagenesGrandes); $i++) {
		$ficheroImagenGrande  = $totalficherosImagenesGrandes[$i];
			$prueba .= "<option";
		if ($ficheroImagenGrande == $tbCarpeta['NombreFrameStyleGaleria']){
			$prueba .= " selected";
			}
			$prueba .= ">" . $ficheroImagenGrande. "</option>";
		}
		$prueba .= "</select>";
	echo  PreparaAyuda($prueba, _HELP_USKOLAXGALLERY_SELECTEDTHEME);
	echo "</td>";
	echo "</tr><tr><td>";
	echo PreparaAyuda("<input type=\"submit\" name=\"GuardarCarpeta\" value=\"" . _AM_USKOLAXGALLERY_GUARDARCAMBIOSGALERIA ."\">", _HELP_USKOLAXGALLERY_GUARDARCAMBIOSGALERIA);
	echo "</td></tr>";
	echo "</table>";
	echo "</td></tr>";

	echo "<tr><td colspan=4>\n";
	echo "</table>";
	echo "</td></tr>\n";
// end Mattes

	echo "</table>";

	echo "<br>";
//	echo "<hr>";
	echo "<br>";

//tabla Imagenes block

	echo "<table  width=100% cellspacing=3 cellpadding=3> <tr>";
	echo "<td colspan=4>";
	echo "<hr>";

	echo "<table width=100% cellspacing=3 cellpadding=3> <tr>";
	echo "<td align=\"center\">";

	echo  PreparaAyuda("<h1>" .  "<img src=\"icons/BlockPhoto.gif\">"  . _AM_USKOLAXGALLERY_PRESENTACIONBLOQUE . "</h1>" , _HELP_USKOLAXGALLERY_PRESENTACIONBLOQUE) ;
	echo "</td><td align=\"right\">";
	echo BotonAyuda("<img src=\"icons/help.gif\">", _HELP_USKOLAXGALLERY_HELP);
	echo "</td></tr>";
	echo "</table>";
	echo "<br>";
	echo "</td></tr>\n";
	echo "<tr>\n";
	echo "<td align=\"center\">";
	echo "<table cellspacing=3 cellpadding=3> <tr>";
	echo "<td align=\"center\">";

	echo  PreparaAyuda(_AM_USKOLAXGALLERY_ANCHO, _HELP_USKOLAXGALLERY_ANCHOBLOQUE) ;
	echo "</td><td align=\"center\">";
	echo PreparaAyuda(_AM_USKOLAXGALLERY_ALTO, _HELP_USKOLAXGALLERY_ALTOBLOQUE) ;
	echo "</td></tr>";
	echo "<tr>";
	echo "<td align=\"center\">";
	echo PreparaAyuda("<input type=\"text\" name=\"AnchoBloque\" value=\"". $tbCarpeta['AnchoBloque']. "\">", _HELP_USKOLAXGALLERY_ANCHOBLOQUE) ;
	echo "</td><td align=\"center\">";
	echo PreparaAyuda("<input type=\"text\" name=\"AltoBloque\" value=\"". $tbCarpeta['AltoBloque']. "\">", _HELP_USKOLAXGALLERY_ALTOBLOQUE) ;
	echo "</td></tr>";
	echo "</table>";
	echo "</td></tr>";

	echo "<tr><td>";

	echo "<table cellspacing=3 cellpadding=3> <tr>";
	echo "<td>\n";

	if ($tbCarpeta['Bloque']){
		echo  PreparaAyuda("<input type=\"checkbox\" name=\"Bloque\" value=\"1\"" ." checked" . ">" . _AM_USKOLAXGALLERY_MOSTRARENBLOQUE, _HELP_USKOLAXGALLERY_MOSTRARENBLOQUE);
	}else{
		echo  PreparaAyuda("<input type=\"checkbox\" name=\"Bloque\" value=\"1\"" . ">" . _AM_USKOLAXGALLERY_MOSTRARENBLOQUE, _HELP_USKOLAXGALLERY_MOSTRARENBLOQUE);
	}

	echo "</td></tr>";
	echo "</table>";
	echo "</td></tr>";

	echo "<tr><td>";

	echo "<table cellspacing=3 cellpadding=3> <tr>";

	echo "<td>";

	echo PreparaAyuda(_AM_USKOLAXGALLERY_FOTOREPRESENTACION . " (" . XOOPS_ROOT_PATH . "/"  . " modules/uskolaxgallery/images/" . $tbCarpeta['Carpeta']  ."/)", _HELP_USKOLAXGALLERY_FOTOREPRESENTACION);
	echo "</td></tr>";
	echo "</table>";
	echo "</td></tr>";
	echo "<tr><td>";
	echo "<table cellspacing=3 cellpadding=3> <tr><td>";
	if (! $tbCarpeta['Aleatorio']){
	echo "<img name=\"representacion\" width=\"100\" src=\"" . XOOPS_URL . "/modules/uskolaxgallery/images/" .  $tbCarpeta['Imagen'] . "\"  >";
	}
	echo "</td></tr>";
	echo "<tr><td>";


	echo PreparaAyuda("<input type=\"text\" name=\"Imagen\" value=\"". $tbCarpeta['Imagen'] . "\">", _HELP_USKOLAXGALLERY_FOTOREPRESENTACION);
		echo "</td><td>";

	echo PreparaAyuda("-Or-", _HELP_USKOLAXGALLERY_FOTOREPRESENTACION);
		echo "</td><td>";

	if ($tbCarpeta['Aleatorio']){
		echo  PreparaAyuda("<input type=\"checkbox\" name=\"Aleatorio\" value=\"1\"" ." checked" . ">" . _AM_USKOLAXGALLERY_FOTOALEATORIACARPETA, _HELP_USKOLAXGALLERY_FOTOALEATORIACARPETA);
	}else{
		echo  PreparaAyuda("<input type=\"checkbox\" name=\"Aleatorio\" value=\"1\"" . ">" . _AM_USKOLAXGALLERY_FOTOALEATORIACARPETA, _HELP_USKOLAXGALLERY_FOTOALEATORIACARPETA);
	}
	echo "</td></tr></table>";

	echo "</td></tr><tr><td>";
	echo "<table cellspacing=3 cellpadding=3> <tr><td>";

	if ($tbCarpeta['AleatorioListado']){
		echo  PreparaAyuda("<input type=\"checkbox\" name=\"AleatorioListado\" value=\"1\"" ." checked" . ">" . _AM_USKOLAXGALLERY_ALEATORIOLISTADO, _HELP_USKOLAXGALLERY_ALEATORIOLISTADO);
	}else{
		echo  PreparaAyuda("<input type=\"checkbox\" name=\"AleatorioListado\" value=\"1\"" . ">" . _AM_USKOLAXGALLERY_ALEATORIOLISTADO, _HELP_USKOLAXGALLERY_ALEATORIOLISTADO);
	}


	echo "</td></tr>";
	echo "</table>";
	echo "</td></tr>";
	echo "<tr><td>";

	echo "<table cellspacing=3 cellpadding=3> <tr>";
	echo "<td colspan=4>";
	echo "</td><tr><td colspan=4>";

	if ($tbCarpeta['UsarBordesBloque']){
		echo  PreparaAyuda("<input type=\"checkbox\" name=\"UsarBordesBloque\" value=\"1\"" ." checked" . ">" . _AM_USKOLAXGALLERY_USARBORDES, _HELP_USKOLAXGALLERY_USARBORDES);
	}else{
		echo  PreparaAyuda("<input type=\"checkbox\" name=\"UsarBordesBloque\" value=\"1\"" . ">" . _AM_USKOLAXGALLERY_USARBORDES, _HELP_USKOLAXGALLERY_USARBORDES);
	}

	echo "</td><td>";

	$totalficherosImagenesGrandes = Get_Image_listdir(XOOPS_ROOT_PATH . "/" . "/modules/uskolaxgallery/icons/");
	$numeroficherosImagenesGrandes = count($totalficherosImagenesGrandes);

	$prueba="";
		$prueba= "<select name=\"NombreFrameStyleBlock\">";
	for ($i = 0; $i < ($numeroficherosImagenesGrandes); $i++) {
		$ficheroImagenGrande  = $totalficherosImagenesGrandes[$i];
			$prueba .= "<option";
		if ($ficheroImagenGrande == $tbCarpeta['NombreFrameStyleBlock']){
			$prueba .= " selected";
			}
			$prueba .= ">" . $ficheroImagenGrande. "</option>";
		}
		$prueba .= "</select>";
	echo PreparaAyuda($prueba, _HELP_USKOLAXGALLERY_SELECTEDTHEME);
	echo "</td>";
	echo "</tr><tr><td>";
	echo PreparaAyuda("<input type=\"submit\" name=\"GuardarCarpeta\" value=\"" . _AM_USKOLAXGALLERY_GUARDARCAMBIOSGALERIA ."\">", _HELP_USKOLAXGALLERY_GUARDARCAMBIOSGALERIA);
	echo "</td></tr>";

	echo "</table>";
	echo "</td></tr>";
	echo "<br>";
	echo "<br>";
	echo "<tr><td>";
	echo "<br><hr><br>";

	echo "<table width=100% cellspacing=3 cellpadding=3> <tr>";
	echo "<td align=\"center\">";
	echo  PreparaAyuda("<h1><img src=\"icons/GaleriaStylesheet.gif\">"  . _AM_USKOLAXGALLERY_TEMASGALERIA . "</h1>", _HELP_USKOLAXGALLERY_TEMASGALERIA);
	echo "</td><td>";
	echo "<div align=\"right\">" . BotonAyuda("<img src=\"icons/help.gif\">", _HELP_USKOLAXGALLERY_HELP). "</div>";
	echo "</td></tr><tr><td align=\"center\"><h3>";

	echo  PreparaAyuda(_AM_USKOLAXGALLERY_BORDEIMAGENPARAMETERS, _HELP_USKOLAXGALLERY_TEMASGALERIA);
	echo "</h3></td>";

	echo "</tr>";

	echo "<tr><td>";

	 $totalficherosTemas = Get_Image_listProPhp(XOOPS_ROOT_PATH . "/" . "/modules/uskolaxgallery/admin/temas/");
	 $numeroficherosTemas = count($totalficherosTemas);
	echo "<table cellspacing=3 cellpadding=3> <tr>";
	echo "<td>";
		echo PreparaAyuda(_AM_USKOLAXGALLERY_TEMASDISPONIBLES, _HELP_USKOLAXGALLERY_TEMASDISPONIBLES);
			echo "</td><td>";

		$prueba="";


		$prueba.= "<select name=\"TemaCargar\">";
		for ($i = 0; $i < ($numeroficherosTemas); $i++) {
			$ficherotema  = $totalficherosTemas[$i];
			$ficherotema = substr($ficherotema,0,strlen($ficherotema)-4);

			$prueba .= "<option";
			if ($ficherotema == $tbCarpeta['TemaCargado']){
			$prueba .= " selected";
			}
			$prueba .= ">" . $ficherotema. "</option>";
		}
		$prueba .= "</select>";
		echo PreparaAyuda($prueba, _HELP_USKOLAXGALLERY_TEMASDISPONIBLES);
		echo "</td><td>";
		echo PreparaAyuda("<input type=\"submit\" name=\"op3\" value=\"" . _AM_USKOLAXGALLERY_CARGARTEMA . "\" action=index.php?op2=" . $id. ">", _HELP_USKOLAXGALLERY_TEMASDISPONIBLES);
		echo "</td></tr><tr><td>";
		echo PreparaAyuda(_AM_USKOLAXGALLERY_NOMBRETEMA, _HELP_USKOLAXGALLERY_NOMBRETEMA);
		echo "</td><td>";
		echo PreparaAyuda( "<input type=\"text\" name=\"TemaCargado\" Value=\"" . $tbCarpeta['TemaCargado'] . "\">", _HELP_USKOLAXGALLERY_NOMBRETEMA);
		echo "</td><td>";
		echo PreparaAyuda("<input type=\"submit\" name=\"op2\" value=\"" . _AM_USKOLAXGALLERY_GUARDARTEMA . "\" action=index.php?op3=" . $id. ">", _HELP_USKOLAXGALLERY_GUARDARTEMA);

		echo "</td><td>";
		echo "<a name=\"themes\"></a>";

		echo "</td></tr>";
	echo "</table>";
	echo "<br>";
	echo "</table>";
	echo "</form>";

		echo "<br>";
		echo "<hr>";
		echo "<br>";


	echo "<table width=100% cellspacing=3 cellpadding=3> <tr>";
	echo "<td colspan=2>";

		echo PreparaAyuda("<h1>" . _AM_USKOLAXGALLERY_SUBGALERIAS . "</h1>", _HELP_USKOLAXGALLERY_SUBGALERIAS);
		echo "</td></tr><tr><td>";
		echo "<form name=\"Subgaleria\" method=\"post\" action=\"index.php?op=InsertarSubgalerias\">";

		echo PreparaAyuda(_AM_USKOLAXGALLERY_ANADIRSUBGALERIAS, _HELP_USKOLAXGALLERY_ANADIRSUBGALERIAS);
		echo "<br>";
		echo "<input type=\"hidden\" name=\"GaleriaActual\" Value=\"" . $tbCarpeta['ID'] . "\">";

		echo PreparaAyuda("<input type=\"text\" name=\"Subgaleria\" size=\"30\">",_HELP_USKOLAXGALLERY_ANADIRSUBGALERIAS);
		echo "<br>";
		echo PreparaAyuda("<input type=\"submit\" name=\"AnadirSubgaleria\" value=\"" . _AM_USKOLAXGALLERY_ANADIRSUBGALERIAS ."\">", _HELP_USKOLAXGALLERY_ANADIRSUBGALERIAS);
		 echo "</form>";

		echo "</td><td>";


		echo  PreparaAyuda(_AM_USKOLAXGALLERY_ELIMINARSUBGALERIAS, _HELP_USKOLAXGALLERY_ELIMINARSUBGALERIAS);
		echo "<br>";
		$ConsultaSubgalerias = "SELECT catalogo, carpeta, nombre FROM " .$xoopsDB->prefix("uskolag_catalogo"). " Where carpeta=" . $NumeroCarpeta;
		$resultSubgalerias = $xoopsDB->query($ConsultaSubgalerias);
		echo "<form name=\"EliminarSubgaleria\" method=\"post\" action=\"index.php?op=EliminarSubgaleria\">";
		echo "<div align=center><select name=\"idSubgaleria\">";
			while($tbSubgalerias = $xoopsDB->fetchArray($resultSubgalerias)){
				echo "<option>" . $tbSubgalerias['catalogo'] . "- " . $tbSubgalerias['nombre'] . "</option>";
			}
		 echo "</select></div>";
		 echo "<br>";
		echo PreparaAyuda("<input type=\"submit\" name=\"EliminarSubgaleria\" value=\"" . _AM_USKOLAXGALLERY_ELIMINARSUBGALERIAS ."\">", _HELP_USKOLAXGALLERY_ELIMINARSUBGALERIAS);


		 echo "</form>";

		 echo "</td></tr></table>";


		echo "<br>";
		echo "<hr>";
		echo "<br>";


		echo "<table width=100% cellspacing=3 cellpadding=3> <tr>";
		echo "<td>";
		echo  PreparaAyuda("<h1>" ._AM_USKOLAXGALLERY_CATEGORIAS . "</h1>", _HELP_USKOLAXGALLERY_CATEGORIAS);

		include_once(XOOPS_ROOT_PATH . "/"."include/xoopstwolists.php");
		$Twolist= new XoopsListScripts;

		 echo "</td></tr></table>";
		$Twolist ->InsertFormName("rep");
		$Twolist ->InsertList1Name("lista1");
		$Twolist ->InsertList2Name("lista2");

		$Twolist ->InsertHidden1Name("storage1");
		$Twolist ->InsertHidden2Name("storage2");
		$Twolist ->InsertHidden3Name("storage3");
		$Twolist ->InsertHidden4Name("storage4");

		$Twolist ->PrepareListJavascript();

		echo '<form name="rep" method="post" action="index.php?op=ActualizarCategorias"><table><tr><td>';
		echo "<input type=\"hidden\" name=\"Galeria\" Value=\"" . $tbCarpeta['ID'] . "\">";
		$Twolist ->InsertHiddenFields();
		echo "</td><td>";

		$ConsultaSubgalerias = "SELECT id, description FROM " .$xoopsDB->prefix("uskolag_father"). "" ;
		$resultSubgalerias = $xoopsDB->query($ConsultaSubgalerias);

			while($tbSubgalerias = $xoopsDB->fetchArray($resultSubgalerias)){
				$ConsultaSeleccionadas = "SELECT father_id, gallery_id FROM " .$xoopsDB->prefix("uskolag_father_gallery"). " Where father_id=" . $tbSubgalerias['id'] . " AND gallery_id=" .$tbCarpeta['ID'];
				$resultSubgalerias2 = $xoopsDB->query($ConsultaSeleccionadas);
				$encontradarelacion = false;
					while($tbSubgalerias2 = $xoopsDB->fetchArray($resultSubgalerias2)){
						$encontradarelacion = true;
					}
				if ($encontradarelacion){

					$Twolist ->InsertList2Values($tbSubgalerias['id'], $tbSubgalerias['description']);
				}else{
					$Twolist ->InsertList1Values($tbSubgalerias['id'], $tbSubgalerias['description']);
				}
			}
		 echo "</select>";

		echo  PreparaAyuda(_AM_USKOLAXGALLERY_CATEGORIASNOSELECCIONADAS, _HELP_USKOLAXGALLERY_CATEGORIASNOSELECCIONADAS);
		$Twolist ->InsertFirstList(200);
		echo "</td><td><div align=center>";
		$Twolist ->InsertButtonsList(_AM_USKOLAXGALLERY_ACTIVARCATEGORIA, _AM_USKOLAXGALLERY_DESACTIVARCATEGORIA, _AM_USKOLAXGALLERY_ENVIAR);
		echo "</div>";
		echo "</td><td>";
		echo  PreparaAyuda(_AM_USKOLAXGALLERY_CATEGORIASSELECCIONADAS, _HELP_USKOLAXGALLERY_CATEGORIASSELECCIONADAS);
		$Twolist ->InsertSecondList(200);
		echo "</form></td></tr>";

		echo "</table>";


	 }
				echo "</table>";

}




?>
