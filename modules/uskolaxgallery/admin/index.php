<?php
/*
   Galeria. -Modulo y bloque para ver imagenes en pantalla.

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
error_reporting(E_ALL);
include_once("admin_header.php");


foreach($_GET as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   eval($asignacion); 
} 

foreach($_POST as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   eval($asignacion); 
} 

/*
if (isset($_POST['carpeta'])){
	$carpeta = trim($_POST['carpeta']);
}else if (isset($_GET['carpeta'])){
	$carpeta = trim($_GET['carpeta']);
}
*/

include_once(XOOPS_ROOT_PATH . "/"."include/cp_functions.php");
include_once(XOOPS_ROOT_PATH . "/"."class/module.textsanitizer.php");
include_once(XOOPS_ROOT_PATH . "/"."class/xoopsmodule.php");

global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;
xoops_cp_header();

Function isPost(){
	if (xoops_getenv('REQUEST_METHOD')=="POST"){
		return 1;
	}else{
		return 0;
	}
}
//$xoopsModule->printAdminMenu();

$admintest = 0;

include_once(XOOPS_ROOT_PATH . "/"."include/xoopshelp.php");

$Xoopsi = new XoopsHelp;
$Xoopsi->XoopsHelpLayer(110, 80, "hola", false);
echo $Xoopsi->HelpJavascript;



include_once("workfiles.php");
include_once("editargaleria.php");
include_once("mostrargaleria.php");
include_once("creareliminargaleria.php");
include_once("fotos.php");
include_once("getpicture.php");
include_once("comentarios.php");
include_once("temas.php");
include_once("bienvenida.php");
include_once("bloques.php");
include_once("subgalerias.php");
include_once("inicial.php");
include_once("creareliminarcategoria.php");


Function CorrigeAdminPro($Foto){
$Foto = rawurlencode($Foto);	
return $Foto;
}

Function Codifica($cadena){
$cadena = str_replace("<", "&lt;", $cadena);
$cadena = str_replace('"', "&quot;", $cadena);
$cadena = str_replace(">", "&gt;", $cadena);
return $cadena;
}

function EscribeAdminvacio($fichero, $carpeta)
{
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
$result = $xoopsDB->query($consultaVacio2);
}

function Set_pictAdminVisits($ID, $fichero, $carpeta, $descripcion, $visitas, $fecha, $comentarios, $enviadopor, $votos, $clasificacion,$ano, $mes, $dia, $fotode, $title, $keywords )
{
	global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;
	$fichero = urldecode($fichero);
	$query = "update ".$xoopsDB->prefix("uskolag_imagenes")." set Carpeta='$carpeta', Fichero='$fichero', Descripcion='$descripcion', Visitas='$visitas', Comentarios='$comentarios', EnviadoPor='$enviadopor', Votos='$votos', Clasificacion='$clasificacion', ano='$ano', mes='$mes', dia='$dia', fotode='$fotode', Title='$title', Keywords='$keywords' where ID=".$ID."";
	$xoopsDB->query($query) ;
}


Function Install(){
	global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;
	echo "<form name=\"form1\" method=\"post\" action=\"index.php?op=Instalar\">";
	echo "<input type=\"submit\" name=\"Submit\" value=\"" . _AM_USKOLAXGALLERY_INSTALAR . "\">";
	echo "</form>";		
}


Function UnInstall(){
	global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;
	echo "<form name=\"form1\" method=\"post\" action=\"index.php?op=DesInstalar\">";
	echo "<input type=\"submit\" name=\"Submit\" value=\"" . _AM_USKOLAXGALLERY_DESINSTALAR . "\">";
	echo "</form>";		
}

		
Function CorrigeGuardarTema($valor){
$valor =  str_replace('\"','"',$valor);
$valor = str_replace("\'","'",$valor);
return $valor;
}


Function PreparaAyuda($text, $idHelp){
	global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;
	include_once(XOOPS_ROOT_PATH . "/"."include/xoopshelp.php");

	$Xoopsi = new XoopsHelp;
	
	$Xoopsi->XoopsHelpText($text, $idHelp);
	return $Xoopsi->HelpValue;
}

Function BotonAyuda($texto, $idHelp){
	global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;
	include_once(XOOPS_ROOT_PATH . "/"."include/xoopshelp.php");

	$Xoopsi = new XoopsHelp;
	
	$Xoopsi->XoopsHelpButton($texto, $idHelp);
	return $Xoopsi->HelpButton;
}



EditarGaleria();


if($op2){
	if (! isPost()){
	redirect_header("index.php",3, _AM_USKOLAXGALLERY_WARNING );
	exit;
	}
	GuardarTema ($ID, $Carpeta, $Imagen, $Descripcion, $Aleatorio, $Bloque, $MCatalogos, $AnchoBloque, $AltoBloque, $AnchoImagenes, $AltoImagenes, $FotosAncho, $FotosAlto, $EnviarFicheros, $EnviarComentarios, $EnviarVotaciones, $EnviarEnlaces, $NecesarioRegistrar, $InicioDescargas, $FinDescargas, $InicioEnlaces, $FinEnlaces, $Anterior, $Siguiente, $InicioEncabezado, $FinEncabezado, $InicioPie, $FinPie, $InicioEncabezadoComentario, $FinEncabezadoComentario, $InicioComentario, $FinComentario, $BloquearImagenesSubidas, $BloquearComentarios, $InicioFoto, $FinFoto, $InicioFotoGrande, $FinFotoGrande, $InicioMarcoFoto, $FinMarcoFoto, $VerVisitas, $VerFecha, $TemaCargado, $FotoDescripcion, $UsarGraficoEnNombre, $AleatorioListado, $PermitirImprimir, $PermitirMail, $NombreFotoCarpeta, $NombreFotoCarpetaSuperior, $BordeImagenIzquierda, $BordeImagenDerecha, $BordeImagenArriba, $BordeImagenAbajo, $UsarBordes, $BordesTema, $BordeImagenPequenoIzquierda, $BordeImagenPequenoDerecha, $BordeImagenPequenoArriba, $BordeImagenPequenoAbajo, $BordeImagenGrandeIzquierdaArriba, $BordeImagenGrandeIzquierdaCentro, $BordeImagenGrandeIzquierdaAbajo, $BordeImagenGrandeCentroArriba, $BordeImagenGrandeCentroAbajo, $BordeImagenGrandeDerechaArriba, $BordeImagenGrandeDerechaCentro, $BordeImagenGrandeDerechaAbajo, $SobreFoto, $BajoFoto, $UsarBordesBloque, $UsarBordesGaleria, $UsarBordesImagenGrande, $NombreFrameStyleBlock, $NombreFrameStyleGaleria, $NombreFrameStyleImagenGrande,$TamanoMaximoFichero, $ForzarDescripcion, $ForzarTamano, $EspaciadoVertical, $EspaciadoHorizontal, $Espaciado, $ColorFondo, $ColorFondo1, $ColorFondo2, $ColorFondo3, $ColorFondo4, $EspaciadoInterno);
	redirect_header("index.php?op=ConfigurarGaleria",3,_AM_USKOLAXGALLERY_GUARDARTEMA);
	break;

}
else{
	if($op3){
		if (! isPost()){
		redirect_header("index.php",3, _AM_USKOLAXGALLERY_WARNING );
		exit;
		}
		CargarTema($ID, $TemaCargar);
		redirect_header("index.php?op=ConfigurarGaleria",3,_AM_USKOLAXGALLERY_CARGARTEMA);
	break;

	}else{

		switch($op) {
			case "CrearCategoria";
				if (! isPost()){
					redirect_header("index.php",3, _AM_USKOLAXGALLERY_WARNING );
					exit;
				}
				CrearCategoria($Categoria);
				redirect_header("index.php?op=cargaID&vergalleryid=" . $Galeria ,3,  _AM_USKOLAXGALLERY_ACTUALIZANDO );

//				redirect_header("index.php?op=Agrupaciones",3, _AM_USKOLAXGALLERY_ACTUALIZANDO );
				break;
			case "EliminaCategoria";
				if (! isPost()){
					redirect_header("index.php",3, _AM_USKOLAXGALLERY_WARNING );
					exit;
				}
				EliminaCategoria(intval($idCategoria));
				redirect_header("index.php?op=cargaID&vergalleryid=" . $Galeria ,3,  _AM_USKOLAXGALLERY_ACTUALIZANDO );

//				redirect_header("index.php?op=Agrupaciones",3, _AM_USKOLAXGALLERY_ACTUALIZANDO );
				break;
			case "ActualizarCategorias";
				if (! isPost()){
					redirect_header("index.php",3, _AM_USKOLAXGALLERY_WARNING );
					exit;
				}
				ActualizarCatalogos($Galeria,$storage1,$storage2);
				redirect_header("index.php?op=Agrupaciones",3, _AM_USKOLAXGALLERY_ACTUALIZANDO );
				break;
			case "Agrupaciones";
				AnadirCategoria();
				EliminarCategoria();
				break;
			case "InsertarSubgaleriasFoto";
				if (! isPost()){
					redirect_header("index.php",3, _AM_USKOLAXGALLERY_WARNING );
					exit;
				}
				AnadirSubgaleriaFoto(intval($idSubgaleria), $foto);
				redirect_header("index.php?op=MostrarCarpeta&carpeta=" . $carpetaName . "&inicio=" . $foto ,3, _AM_USKOLAXGALLERY_ACTUALIZANDO );
				break;
			case "EliminarSubgaleriasFoto";
				if (! isPost()){
				redirect_header("index.php",3, _AM_USKOLAXGALLERY_WARNING );
				exit;
				}
				EliminarSubgaleriaFoto(intval($idSubgaleria), $foto);
				redirect_header("index.php?op=MostrarCarpeta&carpeta=" . $carpetaName . "&inicio=" . $foto,3, _AM_USKOLAXGALLERY_ACTUALIZANDO );
				break;
			case "InsertarSubgalerias";
				if (! isPost()){
				redirect_header("index.php",3, _AM_USKOLAXGALLERY_WARNING );
				exit;
				}
				AnadirSubgaleria($GaleriaActual, $Subgaleria);
				redirect_header("index.php?op=cargaID&vergalleryid=" . $GaleriaActual ,3,  _AM_USKOLAXGALLERY_ACTUALIZANDO );
				break;
			case "EliminarSubgaleria";
				if (! isPost()){
				redirect_header("index.php",3, _AM_USKOLAXGALLERY_WARNING );
				exit;
				}
				EliminarSubgaleria(intval($idSubgaleria));
				redirect_header("index.php?op=cargaID&vergalleryid=" . $GaleriaActual,3, _AM_USKOLAXGALLERY_ACTUALIZANDO );
				break;
			case "Install";
				Install();
				break;
			case "UnInstall";
				UnInstall();
				break;
			case "BloquesAleatorios";
				MostrarCarpetasBloquesAleatorios();
				break;
			case "ActualizarBloques";
				if (! isPost()){
				redirect_header("index.php",3, _AM_USKOLAXGALLERY_WARNING );
				exit;
				}
				ActualizarBloques($BloquesAleatorios, $SoloImagenes);
				redirect_header("index.php",3, _AM_USKOLAXGALLERY_ACTUALIZANDO );
				break;
			case "CarpetasInicio";
				MostrarCarpetasInicio();
				break;
			case "ActualizarCarpetasInicio";
				if (! isPost()){
				redirect_header("index.php",3, _AM_USKOLAXGALLERY_WARNING );
				exit;
				}
				ActualizarCarpetasInicio($CarpetasFila);
				redirect_header("index.php",3, _AM_USKOLAXGALLERY_ACTUALIZANDO );
				break;

			case "ActualizarBienvenida";
				if (! isPost()){
				redirect_header("index.php",3, _AM_USKOLAXGALLERY_WARNING );
				exit;
				}
				ActualizarBienvenida($Bienvenida);
				redirect_header("index.php",3, _AM_USKOLAXGALLERY_ACTUALIZANDO );
				break;
			case "MostrarBienvenida";
				MostrarBienvenida();
				break;
			case "cargaID";
				if (! isPost()){
					redirect_header("index.php",3, _AM_USKOLAXGALLERY_WARNING );
					exit;
				}
				if (!$vergalleryid) $vergalleryid = 0;
				MostrarCarpetas(intval($vergalleryid));
				break;
			case "ActualizarComentario":
				if (! isPost()){
				redirect_header("index.php",3, _AM_USKOLAXGALLERY_WARNING );
				exit;
				}
				ActualizarComentario($ID, $Usuario, $Comentario);
				redirect_header("index.php?op=MostrarFoto&carpeta=" . $carpeta . "&inicio=" . $inicio . "&foto=" . $fichero ,3, _AM_USKOLAXGALLERY_ACTUALIZANDO) ;
				break;
			case "EliminarComentario":
				if (! isPost()){
					redirect_header("index.php",3, _AM_USKOLAXGALLERY_WARNING );
					exit;
				}
				EliminarComentario($ID, $carpeta, $fichero);
				redirect_header("index.php?op=MostrarFoto&carpeta=" . $carpeta . "&inicio=" . $inicio . "&foto=" . $fichero ,3, _AM_USKOLAXGALLERY_ACTUALIZANDO) ;
				break;
			case "MostrarFoto":
				MostrarAdminFoto($carpeta, $inicio, $foto);
				break;
			case "Actualizar":
				if (! isPost()){
					redirect_header("index.php",3, _AM_USKOLAXGALLERY_WARNING );
					exit;
				$fechacompuesta = $ano  . $mes . $dia;

				Set_pictAdminVisits($ID, $fichero, $carpeta, $descripcion, $visitas, $fechacompuesta, $comentarios, $enviadopor, $votos, $clasificacion, $ano, $mes, $dia, $fotode, $title, $keywords);
				}
				redirect_header("index.php?op=seleccionarfoto&carpeta=" . $carpeta . "&inicio=" . $inicio,3, _AM_USKOLAXGALLERY_ACTUALIZANDO) ;
				break;
			case "EliminarFoto":
				if (! isPost()){
					redirect_header("index.php",3, _AM_USKOLAXGALLERY_WARNING );
					exit;
				}
				EliminarFoto($ID, $fichero, $carpeta);
				redirect_header("index.php?op=seleccionarfoto&carpeta=" . $carpeta . "&inicio=" . $inicio,3, _AM_USKOLAXGALLERY_ELIMINANDO);
				break;
			case "MostrarCarpeta":
				SeleccionarAdminFoto($carpeta, $inicio);
				break;
			case "ConfigurarGaleria":
				MostrarCarpetas(0);
				break;
			case "GuardarGaleria":
				if (! isPost()){
					redirect_header("index.php",3, _AM_USKOLAXGALLERY_WARNING );
					exit;
				}
				include_once("guardargalerias.php");
				GuardarGalerias($ID, $Carpeta, $Imagen, $Descripcion, $Aleatorio, $Bloque, $MCatalogos, $AnchoBloque, $AltoBloque, $AnchoImagenes, $AltoImagenes, $FotosAncho, $FotosAlto, $EnviarFicheros, $EnviarComentarios, $EnviarVotaciones, $EnviarEnlaces, $NecesarioRegistrar, $InicioDescargas, $FinDescargas, $InicioEnlaces, $FinEnlaces, $Anterior, $Siguiente, $InicioEncabezado, $FinEncabezado, $InicioPie, $FinPie, $InicioEncabezadoComentario, $FinEncabezadoComentario, $InicioComentario, $FinComentario, $BloquearImagenesSubidas, $BloquearComentarios, $InicioFoto, $FinFoto, $InicioFotoGrande, $FinFotoGrande, $InicioMarcoFoto, $FinMarcoFoto, $VerVisitas, $VerFecha, $TemaCargado, $FotoDescripcion, $UsarGraficoEnNombre, $AleatorioListado, $PermitirImprimir, $PermitirMail, $NombreFotoCarpeta, $NombreFotoCarpetaSuperior, $BordeImagenIzquierda, $BordeImagenDerecha, $BordeImagenArriba, $BordeImagenAbajo, $UsarBordes, $BordesTema, $BordeImagenPequenoIzquierda, $BordeImagenPequenoDerecha, $BordeImagenPequenoArriba, $BordeImagenPequenoAbajo, $BordeImagenGrandeIzquierdaArriba, $BordeImagenGrandeIzquierdaCentro, $BordeImagenGrandeIzquierdaAbajo, $BordeImagenGrandeCentroArriba, $BordeImagenGrandeCentroAbajo, $BordeImagenGrandeDerechaArriba, $BordeImagenGrandeDerechaCentro, $BordeImagenGrandeDerechaAbajo,$SobreFoto, $BajoFoto, $UsarBordesBloque, $UsarBordesGaleria, $UsarBordesImagenGrande, $NombreFrameStyleBlock, $NombreFrameStyleGaleria, $NombreFrameStyleImagenGrande, $TamanoMaximoFichero, $ForzarDescripcion, $ForzarTamano, $EspaciadoVertical, $EspaciadoHorizontal, $Espaciado, $ColorFondo, $ColorFondo1, $ColorFondo2, $ColorFondo3, $ColorFondo4, $EspaciadoInterno);
				redirect_header("index.php?op=ConfigurarGaleria",3,_AM_USKOLAXGALLERY_GUARDARCAMBIOSGALERIA);
				break;

			case "ModificarFotos":
				ModificarFotos();
				break;
			case "AnadirGaleria":
				AnadirGaleria();
				break;
			case "CrearGaleria";
				if (! isPost()){
				redirect_header("index.php",3, _AM_USKOLAXGALLERY_WARNING );
				exit;
				}				
				CrearGaleria($Carpeta, $DescripcionCarpeta);
				redirect_header("index.php?op=seleccionarfoto&carpeta=" . $carpeta . "&inicio=" . $inicio,3, _AM_USKOLAXGALLERY_ACTUALIZANDO) ;
				break;
			case "EliminaGaleria";
				if (! isPost()){
					redirect_header("index.php",3, _AM_USKOLAXGALLERY_WARNING );
			
					exit;
				}
				EliminaGaleria($ID);
				redirect_header("index.php?op=ConfigurarGaleria",3,_AM_USKOLAXGALLERY_ELIMINARGALERIA);
				break;
			Case "EliminarGaleria";
				EliminarGaleria();
				break;
			Case "Instalar";
				if (! isPost()){
					redirect_header("index.php",3, _AM_USKOLAXGALLERY_WARNING );
					exit;
				}
				include_once("instalar.php");
				Instalar();
				break;

			Case "DesInstalar";
				if (! isPost()){
					redirect_header("index.php",3, _AM_USKOLAXGALLERY_WARNING );
					exit;
				}
				include_once("desinstalar.php");
				DesInstalar();
				break;

			default:
				break;
		}
	}
}

OpenTable();

CloseTable();
xoops_cp_footer();
?>
