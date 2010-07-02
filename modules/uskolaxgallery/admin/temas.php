<?php


Function GuardarTema($ID, $Carpeta, $Imagen, $Descripcion, $Aleatorio, $Bloque, $MCatalogos, $AnchoBloque, $AltoBloque, $AnchoImagenes, $AltoImagenes,  $FotosAncho, $FotosAlto, $EnviarFicheros, $EnviarComentarios, $EnviarVotaciones, $EnviarEnlaces, $NecesarioRegistrar, $InicioDescargas, $FinDescargas, $InicioEnlaces, $FinEnlaces, $Anterior, $Siguiente, $InicioEncabezado, $FinEncabezado, $InicioPie, $FinPie, $InicioEncabezadoComentario, $FinEncabezadoComentario, $InicioComentario, $FinComentario, $BloquearImagenesSubidas, $BloquearComentarios, $InicioFoto, $FinFoto, $InicioFotoGrande, $FinFotoGrande, $InicioMarcoFoto, $FinMarcoFoto, $VerVisitas, $VerFecha, $TemaCargado, $FotoDescripcion, $UsarGraficoEnNombre, $AleatorioListado, $PermitirImprimir, $PermitirMail, $NombreFotoCarpeta, $NombreFotoCarpetaSuperior, $BordeImagenIzquierda, $BordeImagenDerecha, $BordeImagenArriba, $BordeImagenAbajo, $UsarBordes, $BordesTema, $BordeImagenPequenoIzquierda, $BordeImagenPequenoDerecha, $BordeImagenPequenoArriba, $BordeImagenPequenoAbajo, $BordeImagenGrandeIzquierdaArriba, $BordeImagenGrandeIzquierdaCentro, $BordeImagenGrandeIzquierdaAbajo, $BordeImagenGrandeCentroArriba, $BordeImagenGrandeCentroAbajo, $BordeImagenGrandeDerechaArriba, $BordeImagenGrandeDerechaCentro, $BordeImagenGrandeDerechaAbajo, $SobreFoto, $BajoFoto, $UsarBordesBloque, $UsarBordesGaleria, $UsarBordesImagenGrande, $NombreFrameStyleBlock, $NombreFrameStyleGaleria, $NombreFrameStyleImagenGrande, $TamanoMaximoFichero, $ForzarDescripcion, $ForzarTamano, $EspaciadoVertical, $EspaciadoHorizontal, $Espaciado, $ColorFondo, $ColorFondo1, $ColorFondo2, $ColorFondo3, $ColorFondo4, $EspaciadoInterno){


	global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;
	if ($fp2=fopen( XOOPS_ROOT_PATH . "/"  . "/modules/uskolaxgallery/admin/temas/" . $TemaCargado . ".php", "w" )) {
		fwrite ($fp2, "<?php \n");
		fwrite ($fp2, "$" . "TAleatorio= \"" . $Aleatorio . "\";" . "\n");
		fwrite ($fp2, "$" . "TBloque= \"" . $Bloque. "\";" . "\n");
	    fwrite ($fp2, "$" . "TMCatalogos= \"" . $MCatalogos . "\";" . "\n");
	    fwrite ($fp2, "$" . "TAnchoBloque= \"" . $AnchoBloque . "\";" . "\n");
	    fwrite ($fp2, "$" . "TAltoBloque= \"" . $AltoBloque . "\";" . "\n");
	    fwrite ($fp2, "$" . "TAnchoImagenes= \"" . $AnchoImagenes . "\";" . "\n");		
	    fwrite ($fp2, "$" . "TAltoImagenes= \"" . $AltoImagenes . "\";" . "\n");		
		fwrite ($fp2, "$" . "TFotosAncho= \"" . $FotosAncho . "\";" . "\n");		
	    fwrite ($fp2, "$" . "TFotosAlto= \"" . $FotosAlto . "\";" . "\n");		
	    fwrite ($fp2, "$" . "TEnviarFicheros= \"" . $EnviarFicheros . "\";" . "\n");
	    fwrite ($fp2, "$" . "TEnviarComentarios= \"" . $EnviarComentarios . "\";" . "\n");
	    fwrite ($fp2, "$" . "TEnviarVotaciones= \"" . $EnviarVotaciones . "\";" . "\n");
	    fwrite ($fp2, "$" . "TEnviarEnlaces= \"" . $EnviarEnlaces . "\";" . "\n");
	    fwrite ($fp2, "$" . "TNecesarioRegistrar= \"" . $NecesarioRegistrar . "\";" . "\n");
	    fwrite ($fp2, "$" . "TInicioDescargas= \"" . $InicioDescargas . "\";" . "\n");
	    fwrite ($fp2, "$" . "TFinDescargas= \"" . $FinDescargas . "\";" . "\n");
	    fwrite ($fp2, "$" . "TInicioEnlaces= \"" . $InicioEnlaces . "\";" . "\n");
	    fwrite ($fp2, "$" . "TFinEnlaces= \"" . $FinEnlaces . "\";" . "\n");
	    fwrite ($fp2, "$" . "TAnterior= \"" . $Anterior . "\";" . "\n");
	    fwrite ($fp2, "$" . "TSiguiente= \"" . $Siguiente . "\";" . "\n");
	    fwrite ($fp2, "$" . "TInicioEncabezado= \"" . $InicioEncabezado . "\";" . "\n");
	    fwrite ($fp2, "$" . "TFinEncabezado= \"" . $FinEncabezado . "\";" . "\n");
	    fwrite ($fp2, "$" . "TInicioPie= \"" . $InicioPie . "\";" . "\n");
	    fwrite ($fp2, "$" . "TFinPie= \"" . $FinPie . "\";" . "\n");
	    fwrite ($fp2, "$" . "TInicioEncabezadoComentario= \"" . $InicioEncabezadoComentario . "\";" . "\n");
	    fwrite ($fp2, "$" . "TFinEncabezadoComentario= \"" . $FinEncabezadoComentario . "\";" . "\n");
	    fwrite ($fp2, "$" . "TInicioComentario= \"" . $InicioComentario . "\";" . "\n");
	    fwrite ($fp2, "$" . "TFinComentario= \"" . $FinComentario . "\";" . "\n");
	    fwrite ($fp2, "$" . "TBloquearImagenesSubidas= \"" . $BloquearImagenesSubidas . "\";" . "\n");
	    fwrite ($fp2, "$" . "TBloquearComentarios= \"" . $BloquearComentarios . "\";" . "\n");
	    fwrite ($fp2, "$" . "TInicioFoto= \"" . $InicioFoto . "\";" . "\n");
	    fwrite ($fp2, "$" . "TFinFoto= \"" . $FinFoto . "\";" . "\n");
	    fwrite ($fp2, "$" . "TInicioFotoGrande= \"" . $InicioFotoGrande . "\";" . "\n");
	    fwrite ($fp2, "$" . "TFinFotoGrande= \"" . $FinFotoGrande . "\";" . "\n");
	    fwrite ($fp2, "$" . "TInicioMarcoFoto= \"" . $InicioMarcoFoto . "\";" . "\n");
	    fwrite ($fp2, "$" . "TFinMarcoFoto= \"" . $FinMarcoFoto . "\";" . "\n");
	    fwrite ($fp2, "$" . "TVerVisitas= \"" . $VerVisitas . "\";" . "\n");
	    fwrite ($fp2, "$" . "TVerFecha= \"" . $VerFecha . "\";" . "\n");
	    fwrite ($fp2, "$" . "TTemaCargado= \"" . $TemaCargado . "\";" . "\n");
	    fwrite ($fp2, "$" . "TFotoDescripcion= \"" . $FotoDescripcion . "\";" . "\n");
	    fwrite ($fp2, "$" . "TUsarGraficoEnNombre= \"" . $UsarGraficoEnNombre . "\";" . "\n");
	    fwrite ($fp2, "$" . "TAleatorioListado= \"" . $AleatorioListado . "\";" . "\n");
	    fwrite ($fp2, "$" . "TPermitirImprimir= \"" . $PermitirImprimir . "\";" . "\n");
	    fwrite ($fp2, "$" . "TPermitirMail= \"" . $PermitirMail . "\";" . "\n");
	    fwrite ($fp2, "$" . "TNombreFotoCarpeta= \"" . $NombreFotoCarpeta . "\";" . "\n");
	    fwrite ($fp2, "$" . "TNombreFotoCarpetaSuperior= \"" . $NombreFotoCarpetaSuperior . "\";" . "\n");
	    fwrite ($fp2, "$" . "TBordeImagenIzquierda= \"" . $BordeImagenIzquierda . "\";" . "\n");
	    fwrite ($fp2, "$" . "TBordeImagenDerecha= \"" . $BordeImagenDerecha . "\";" . "\n");
	    fwrite ($fp2, "$" . "TBordeImagenArriba= \"" . $BordeImagenArriba . "\";" . "\n");
		fwrite ($fp2, "$" . "TBordeImagenAbajo= \"" . $BordeImagenAbajo . "\";" . "\n");
		fwrite ($fp2, "$" . "TUsarBordes= \"" . $UsarBordes . "\";" . "\n");
		fwrite ($fp2, "$" . "TBordesTema= \"" . $BordesTema . "\";" . "\n");
		fwrite ($fp2, "$" . "TBordeImagenPequenoIzquierda= \"" . $BordeImagenPequenoIzquierda . "\";" . "\n");
		fwrite ($fp2, "$" . "TBordeImagenPequenoDerecha= \"" . $BordeImagenPequenoDerecha . "\";" . "\n");
		fwrite ($fp2, "$" . "TBordeImagenPequenoArriba= \"" . $BordeImagenPequenoArriba . "\";" . "\n");
		fwrite ($fp2, "$" . "TBordeImagenPequenoAbajo= \"" . $BordeImagenPequenoAbajo . "\";" . "\n");
		fwrite ($fp2, "$" . "TBordeImagenGrandeIzquierdaArriba= \"" . $BordeImagenGrandeIzquierdaArriba . "\";" . "\n");
		fwrite ($fp2, "$" . "TBordeImagenGrandeIzquierdaCentro= \"" . $BordeImagenGrandeIzquierdaCentro . "\";" . "\n");
		fwrite ($fp2, "$" . "TBordeImagenGrandeIzquierdaAbajo= \"" . $BordeImagenGrandeIzquierdaAbajo . "\";" . "\n");
		fwrite ($fp2, "$" . "TBordeImagenGrandeCentroArriba= \"" . $BordeImagenGrandeCentroArriba . "\";" . "\n");
		fwrite ($fp2, "$" . "TBordeImagenGrandeCentroAbajo= \"" . $BordeImagenGrandeCentroAbajo . "\";" . "\n");
		fwrite ($fp2, "$" . "TBordeImagenGrandeDerechaArriba= \"" . $BordeImagenGrandeDerechaArriba . "\";" . "\n");
		fwrite ($fp2, "$" . "TBordeImagenGrandeDerechaCentro= \"" . $BordeImagenGrandeDerechaCentro . "\";" . "\n");
		fwrite ($fp2, "$" . "TBordeImagenGrandeDerechaAbajo= \"" . $BordeImagenGrandeDerechaAbajo . "\";" . "\n");
		fwrite ($fp2, "$" . "TSobreFoto= \"" . $SobreFoto . "\";" . "\n");
		fwrite ($fp2, "$" . "TBajoFoto= \"" . $BajoFoto . "\";" . "\n");
		fwrite ($fp2, "$" . "TUsarBordesBloque= \"" . $UsarBordesBloque . "\";" . "\n");
		fwrite ($fp2, "$" . "TUsarBordesGaleria= \"" . $UsarBordesGaleria. "\";" . "\n");
		fwrite ($fp2, "$" . "TUsarBordesImagenGrande= \"" . $UsarBordesImagenGrande . "\";" . "\n");
		fwrite ($fp2, "$" . "TNombreFrameStyleBlock= \"" . $NombreFrameStyleBlock . "\";" . "\n");
		fwrite ($fp2, "$" . "TNombreFrameStyleGaleria= \"" . $NombreFrameStyleGaleria . "\";" . "\n");
		fwrite ($fp2, "$" . "TNombreFrameStyleImagenGrande= \"" . $NombreFrameStyleImagenGrande . "\";" . "\n");
		fwrite ($fp2, "$" . "TTamanoMaximoFichero= \"" . $TamanoMaximoFichero . "\";" . "\n");
		fwrite ($fp2, "$" . "TForzarDescripcion= \"" . $ForzarDescripcion. "\";" . "\n");
		fwrite ($fp2, "$" . "TForzarTamano= \"" . $ForzarTamano . "\";" . "\n");
		fwrite ($fp2, "$" . "TEspaciadoVertical= \"" . $EspaciadoVertical . "\";" . "\n");
		fwrite ($fp2, "$" . "TEspaciadoHorizontal= \"" . $EspaciadoHorizontal . "\";" . "\n");
		fwrite ($fp2, "$" . "TEspaciado= \"" . $Espaciado . "\";" . "\n");
		fwrite ($fp2, "$" . "TColorFondo= \"" . $ColorFondo . "\";" . "\n");
		fwrite ($fp2, "$" . "TColorFondo1= \"" . $ColorFondo1 . "\";" . "\n");
		fwrite ($fp2, "$" . "TColorFondo2= \"" . $ColorFondo2 . "\";" . "\n");
		fwrite ($fp2, "$" . "TColorFondo3= \"" . $ColorFondo3 . "\";" . "\n");
		fwrite ($fp2, "$" . "TColorFondo4= \"" . $ColorFondo4 . "\";" . "\n");
		fwrite ($fp2, "$" . "TEspaciadoInterno= \"" . $EspaciadoInterno . "\";" . "\n");

		fwrite ($fp2, "?" . ">\n");

		fclose ($fp2);


	}


}

Function CargarTema($ID, $TemaCargado){
	global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;
	include(XOOPS_ROOT_PATH . "/" . "/modules/uskolaxgallery/admin/temas/" . $TemaCargado . ".php");

	$query = "update ". $xoopsDB->prefix("uskolag_carpeta")." set Aleatorio='$TAleatorio', Bloque='$TBloque', MCatalogos='$TMCatalogos', AnchoBloque='$TAnchoBloque', AltoBloque='$TAltoBloque', AnchoImagenes='$TAnchoImagenes', AltoImagenes='$TAltoImagenes', FotosAncho='$TFotosAncho', FotosAlto='$TFotosAlto', EnviarFicheros='$TEnviarFicheros', EnviarComentarios='$TEnviarComentarios',  EnviarVotaciones='$TEnviarVotaciones', EnviarEnlaces='$TEnviarEnlaces', NecesarioRegistrar='$TNecesarioRegistrar', InicioDescargas='$TInicioDescargas', FinDescargas='$TFinDescargas', InicioEnlaces='$TInicioEnlaces',	FinEnlaces='$TFinEnlaces', Anterior='$TAnterior', Siguiente='$TSiguiente', InicioEncabezado='$TInicioEncabezado', FinEncabezado='$TFinEncabezado', InicioPie='$TInicioPie', FinPie='$TFinPie', InicioEncabezadoComentario='$TInicioEncabezadoComentario', FinEncabezadoComentario='$TFinEncabezadoComentario', InicioComentario='$TInicioComentario', FinComentario='$TFinComentario', BloquearImagenesSubidas='$TBloquearImagenesSubidas', BloquearComentarios='$TBloquearComentarios', InicioFoto='$TInicioFoto', FinFoto='$TFinFoto', InicioFotoGrande='$TInicioFotoGrande', FinFotoGrande='$TFinFotoGrande', InicioMarcoFoto='$TInicioMarcoFoto', FinMarcoFoto='$TFinMarcoFoto', VerVisitas='$TVerVisitas', VerFecha='$TVerFecha', TemaCargado='$TTemaCargado', FotoDescripcion='$TFotoDescripcion', UsarGraficoEnNombre='$TUsarGraficoEnNombre', AleatorioListado='$TAleatorioListado', PermitirImprimir='$TPermitirImprimir', PermitirMail='$TPermitirMail', BordeImagenIzquierda='$TBordeImagenIzquierda', BordeImagenDerecha='$TBordeImagenDerecha', BordeImagenArriba='$TBordeImagenArriba', BordeImagenAbajo='$TBordeImagenAbajo', UsarBordes='$TUsarBordes', BordesTema='$TBordesTema', BordeImagenPequenoIzquierda='$TBordeImagenPequenoIzquierda', BordeImagenPequenoDerecha='$TBordeImagenPequenoDerecha', BordeImagenPequenoArriba='$TBordeImagenPequenoArriba', BordeImagenPequenoAbajo='$TBordeImagenPequenoAbajo', BordeImagenGrandeIzquierdaArriba='$TBordeImagenGrandeIzquierdaArriba', BordeImagenGrandeIzquierdaCentro='$TBordeImagenGrandeIzquierdaCentro', BordeImagenGrandeIzquierdaAbajo='$TBordeImagenGrandeIzquierdaAbajo', BordeImagenGrandeCentroArriba='$TBordeImagenGrandeCentroArriba', BordeImagenGrandeCentroAbajo='$TBordeImagenGrandeCentroAbajo', BordeImagenGrandeDerechaArriba='$TBordeImagenGrandeDerechaArriba', BordeImagenGrandeDerechaCentro='$TBordeImagenGrandeDerechaCentro', BordeImagenGrandeDerechaAbajo='$TBordeImagenGrandeDerechaAbajo', SobreFoto='$TSobreFoto', BajoFoto='$TBajoFoto', UsarBordesBloque='$TUsarBordesBloque', UsarBordesGaleria='$TUsarBordesGaleria', UsarBordesImagenGrande='$TUsarBordesImagenGrande', NombreFrameStyleBlock='$TNombreFrameStyleBlock', NombreFrameStyleGaleria='$TNombreFrameStyleGaleria', NombreFrameStyleImagenGrande='$TNombreFrameStyleImagenGrande', TamanoMaximoFichero='$TTamanoMaximoFichero', ForzarDescripcion='$TForzarDescripcion', ForzarTamano='$TForzarTamano', EspaciadoVertical='$TEspaciadoVertical', EspaciadoHorizontal='$TEspaciadoHorizontal', Espaciado='$TEspaciado', ColorFondo='$TColorFondo', ColorFondo1='$TColorFondo1', ColorFondo2='$TColorFondo2', ColorFondo3='$TColorFondo3', ColorFondo4='$TColorFondo4', EspaciadoInterno='$TEspaciadoInterno' where ID=".$ID."";


   if(!$f_res = $xoopsDB->query($query))
     {
	die("Error <br />$sql");
     }

}



?>
