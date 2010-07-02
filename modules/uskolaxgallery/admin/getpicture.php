<?php


function Get_pictAdminDescripcion($fichero, $carpeta, $solocomentarios, $solodescripcion, $EscribeDescripcion)
{
global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;
include("config-module.php");


$consulta2 = "SELECT ID, Carpeta, Imagen, Descripcion, Aleatorio, Bloque, MCatalogos, AnchoBloque, AltoBloque, AnchoImagenes, AltoImagenes, FotosAncho, FotosAlto, Anterior, Siguiente FROM " .$xoopsDB->prefix("uskolag_carpeta") . " Where Carpeta like '" . $carpeta . "'";

	$result2 = $xoopsDB->query($consulta2);
	
	while($tbCarpeta2 = $xoopsDB->fetchArray($result2)){
		$CarpetaId = $tbCarpeta2['ID'];
	}


$consultaDescripcion = "SELECT ID, Carpeta, Fichero, Descripcion, Visitas, Fecha, Comentarios, EnviadoPor, Votos, Clasificacion, ano, mes, dia, FotoDe, Title, Keywords FROM " .$xoopsDB->prefix("uskolag_imagenes") . " Where (Carpeta like '" . $carpeta . "' AND Fichero like '" . $fichero . "')";

$resultDescripcion = $xoopsDB->query($consultaDescripcion);

$encontrado = false;
while($tbCarpetaGetDescripcion = $xoopsDB->fetchArray($resultDescripcion)){
	$encontrado = true;
		$ID = $tbCarpetaGetDescripcion['ID'];
		$descripcion = $tbCarpetaGetDescripcion['Descripcion'];
		$visitas = $tbCarpetaGetDescripcion['Visitas'];
		$fecha = $tbCarpetaGetDescripcion['fecha']; 
		$ano= $tbCarpetaGetDescripcion['ano'];
		$mes = $tbCarpetaGetDescripcion['mes']; 
		$dia = $tbCarpetaGetDescripcion['dia']; 
		$enviadopor = $tbCarpetaGetDescripcion['EnviadoPor'];
		$fotode = $tbCarpetaGetDescripcion['FotoDe'];
		$votos = $tbCarpetaGetDescripcion['Votos'];
		$clasificacion = $tbCarpetaGetDescripcion['Clasificacion'];
		$comentarios = $tbCarpetaGetDescripcion['Comentarios'];
		$shortdescription = $tbCarpetaGetDescripcion['Title'];
		$keywords = $tbCarpetaGetDescripcion['Keywords'];

}

if (! $encontrado){
	EscribeAdminvacio($fichero, $carpeta);
	$consultaDescripcion = "SELECT ID, Carpeta, Fichero, Descripcion, Visitas, Fecha, Comentarios, EnviadoPor, Votos, Clasificacion, ano, mes, dia, Fotode, Title, Keywords FROM " .$xoopsDB->prefix("uskolag_imagenes") . " Where (Carpeta like '" . $carpeta . "' AND Fichero like '" . $fichero . "')";
	$resultDescripcion = $xoopsDB->query($consultaDescripcion);
	while($tbCarpetaGetDescripcion = $xoopsDB->fetchArray($resultDescripcion)){
		$ID = $tbCarpetaGetDescripcion['ID'];
		$descripcion = $tbCarpetaGetDescripcion['Descripcion'];
		$visitas = $tbCarpetaGetDescripcion['Visitas'];
		$fecha = $tbCarpetaGetDescripcion['fecha']; 
		$ano= $tbCarpetaGetDescripcion['ano'];
		$mes = $tbCarpetaGetDescripcion['mes']; 
		$dia = $tbCarpetaGetDescripcion['dia']; 
		$enviadopor = $tbCarpetaGetDescripcion['EnviadoPor'];
		$fotode = $tbCarpetaGetDescripcion['FotoDe'];
		$votos = $tbCarpetaGetDescripcion['Votos'];
		$clasificacion = $tbCarpetaGetDescripcion['Clasificacion'];
		$comentarios = $tbCarpetaGetDescripcion['Comentarios'];
		$keywords = $tbCarpetaGetDescripcion['Keywords'];
		$shortdescription= $keywords;

	}

}
	
if ($solocomentarios) {
	$consultaComentarios = "SELECT ID, Carpeta, Imagen, Descripcion, Aleatorio, Bloque, MCatalogos, AnchoBloque, AltoBloque, AnchoImagenes, FotosAncho, FotosAlto, Anterior, Siguiente, InicioEncabezadoComentario, FinEncabezadoComentario, InicioComentario, FinComentario FROM " .$xoopsDB->prefix("uskolag_carpeta") . " Where Carpeta like '" . $carpeta . "'";
	$myts = new MyTextSanitizer;

	$resultComentarios = $xoopsDB->query($consultaComentarios);
	
	while($tbCarpetaComentarios = $xoopsDB->fetchArray($resultComentarios)){
		$INICIOENCABEZADOCOMENTARIO = $tbCarpetaComentarios['InicioEncabezadoComentario'];
		$FINENCABEZADOCOMENTARIO = $tbCarpetaComentarios['FinEncabezadoComentario'];
		$INICIOCOMENTARIO = $tbCarpetaComentarios['InicioComentario'];
		$FINCOMENTARIO = $tbCarpetaComentarios['FinComentario'];
	}
	
	$consultaComentarios = "SELECT ID, Carpeta, Fichero, Usuario, Comentario, Verificado, EsperandoVerificacion FROM " .$xoopsDB->prefix("uskolag_comentarios") . " Where Carpeta like '" . $carpeta . "' And Fichero like'" . $fichero . "'";

	$resultComentarios = $xoopsDB->query($consultaComentarios);

	while($tbCarpetaComentarios = $xoopsDB->fetchArray($resultComentarios)){
//		echo "<tr><td valign=\"top\" colspan=\"3\">&nbsp;</td></tr>";
		echo "<form name=\"form" . $tbCarpetasComentarios['ID'] . "\" method=\"post\" action=\"index.php\">";
		echo "<input type=\"text\" name=\"Usuario\" size=\"85\" maxlength=\"100\" value=\"" . $tbCarpetaComentarios['Usuario'] . "\">";
		echo "<br>";
		echo "<textarea name=\"Comentario\" cols=\"80\" rows=\"5\">" . $tbCarpetaComentarios['Comentario'] . "</textarea>";
		echo "<input type=\"hidden\" name=\"ID\" value=\"" . $tbCarpetaComentarios['ID'] . "\">";
		echo "<input type=\"hidden\" name=\"carpeta\" value=\"" . $tbCarpetaComentarios['Carpeta'] . "\">";
		echo "<input type=\"hidden\" name=\"fichero\" value=\"" . $tbCarpetaComentarios['Fichero'] . "\">";
		echo "<input type=\"hidden\" name=\"inicio\" value=" . $inicio . ">";
		echo "<hr><br><input type=\"radio\" name=\"op\" value=\"EliminarComentario\"> " . _AM_USKOLAXGALLERY_ELIMINAR ;
		echo "<input type=\"radio\" name=\"op\" value=\"ActualizarComentario\" checked>" .  _AM_USKOLAXGALLERY_ACTUALIZAR . "<br><hr><br>";
		echo "<input type=\"submit\" name=\"Submit\" value=\"" . _AM_USKOLAXGALLERY_ENVIAR . "\">";
		echo "<br>" . "</form>" . "<hr>";
//		echo "</td></tr>";
	}
			
}else {
	if ($solodescripcion){
	
			echo "<hr>";
			echo "<form name=\"Subgaleria\" method=\"post\" action=\"index.php?op=InsertarSubgaleriasFoto&carpeta=" . $CarpetaId . "&foto=". $ID . "\">";
			echo _AM_USKOLAXGALLERY_ANADIRSUBGALERIAS;
			echo "<br>";
			$ConsultaSubgalerias = "SELECT catalogo, carpeta, nombre FROM " .$xoopsDB->prefix("uskolag_catalogo"). " Where carpeta=" . $CarpetaId;
			$resultSubgalerias = $xoopsDB->query($ConsultaSubgalerias);
			echo "<select name=\"idSubgaleria\">";
				while($tbSubgalerias = $xoopsDB->fetchArray($resultSubgalerias)){
					echo "<option>" . $tbSubgalerias['catalogo'] . "- " . $tbSubgalerias['nombre'] . "</option>";
				}
			 echo "</select>";
			echo "<input type=\"hidden\" name=\"carpetaName\" value=" . $carpeta . ">";
			echo "<input type=\"hidden\" name=\"fichero\" value=" . $fichero . ">";
			echo "<input type=\"hidden\" name=\"inicio\" value=" . $inicio . ">";
		
			echo "<br>";
			echo "<input type=\"submit\" name=\"AnadirSubgaleria\" value=\"" . _AM_USKOLAXGALLERY_ANADIRSUBGALERIAS ."\">";
			echo "</form>";


			echo "<form name=\"Subgaleria\" method=\"post\" action=\"index.php?op=EliminarSubgaleriasFoto&carpeta=" . $CarpetaId . "&foto=". $ID . "\">";
			echo _AM_USKOLAXGALLERY_ELIMINARSUBGALERIAS;
			echo "<br>";

			$ConsultaFotos = "SELECT catalogo, foto FROM " .$xoopsDB->prefix("uskolag_catalogo_foto"). " Where foto=" . $ID;
			$resultSubgaleriaFotos = $xoopsDB->query($ConsultaFotos);

			echo "<select name=\"idSubgaleria\">";
				while($tbSubgalerias2 = $xoopsDB->fetchArray($resultSubgaleriaFotos)){
				$ConsultaSubgalerias = "SELECT catalogo, carpeta, nombre FROM " .$xoopsDB->prefix("uskolag_catalogo"). " Where catalogo=" . $tbSubgalerias2['catalogo'];
				$resultSubgaleria = $xoopsDB->query($ConsultaSubgalerias);
					while($tbSubgalerias = $xoopsDB->fetchArray($resultSubgaleria)){
					echo "<option>" . $tbSubgalerias['catalogo'] . "- " . $tbSubgalerias['nombre'] . "</option>";
					}
				}
			 echo "</select>";

			echo "<br>";
			echo "<input type=\"hidden\" name=\"carpetaName\" value=" . $carpeta . ">";
			echo "<input type=\"hidden\" name=\"fichero\" value=" . $fichero . ">";
			echo "<input type=\"hidden\" name=\"inicio\" value=" . $inicio . ">";

			echo "<input type=\"submit\" name=\"EliminarSubgaleria\" value=\"" . _AM_USKOLAXGALLERY_ELIMINARSUBGALERIAS ."\">";
			echo "</form>";
			
			echo "<hr>";
			
			echo "<BR>";
			echo "<form name=\"CambiarFoto\" method=\"post\" action=\"index.php?op=GuardarFoto&carpeta=$carpeta&inicio=$inicio\">";
			echo "<input type=\"hidden\" name=\"ID\" value=" . $ID . ">";
			echo "<input type=\"hidden\" name=\"carpeta\" value=" . urlencode($carpeta) . ">";
			echo "<input type=\"hidden\" name=\"fichero\" value=" . urlencode($fichero) . ">";
			echo "<input type=\"hidden\" name=\"inicio\" value=" . $inicio . ">";
			echo _AM_USKOLAXGALLERY_FOTODESC . "<br><textarea name=\"descripcion\" rows=\"3\">" . trim($descripcion) . "</textarea>" . "<br>";

			echo _AM_USKOLAXGALLERY_FOTOTITLE . "<br><textarea name=\"title\" rows=\"3\">" . trim($shortdescription) . "</textarea>" . "<br>";

			echo _AM_USKOLAXGALLERY_KEYWORDS . "<br><textarea name=\"keywords\" rows=\"3\">" . trim($keywords) . "</textarea>" . "<br>";

			echo _AM_USKOLAXGALLERY_VISITAS . "<br><input type=\"text\" name=\"visitas\" value=\"" . trim($visitas) .  "\"> " . "<br>";
//			echo _AM_USKOLAXGALLERY_FECHA . "<br><input type=\"text\" name=\"fecha\" value=\"" . trim($fecha) .  "\"> " . "<br>"; 
			echo _AM_USKOLAXGALLERY_DIA . "<br><input type=\"text\" name=\"dia\" value=\"" . trim($dia) .  "\"> " . "<br>"; 
			echo _AM_USKOLAXGALLERY_MES . "<br><input type=\"text\" name=\"mes\" value=\"" . trim($mes) .  "\"> " . "<br>"; 
			echo _AM_USKOLAXGALLERY_ANO . "<br><input type=\"text\" name=\"ano\" value=\"" . trim($ano) .  "\"> " . "<br>"; 


			echo _AM_USKOLAXGALLERY_ENVIADOPOR .  "<br><input type=\"text\" name=\"enviadopor\" value=\"" . trim($enviadopor) .  "\">" . "<br>";
			echo _AM_USKOLAXGALLERY_FOTODE .  "<br><input type=\"text\" name=\"fotode\" value=\"" . trim($fotode) .  "\">" . "<br>";

			echo _AM_USKOLAXGALLERY_VOTOS .  "<br><input type=\"text\" name=\"votos\" value=\"" . trim(intval($votos)) .  "\">" . "<br>";
			echo _AM_USKOLAXGALLERY_CLASIFICACION .  "<br><input type=\"text\" name=\"clasificacion\" value=\"" . trim(intval($clasificacion)) . "\">" .   "<br>";

			echo _AM_USKOLAXGALLERY_COMENTARIOS . "<br><input type=\"text\" name=\"comentarios\" value=\"" . trim(intval($comentarios)) .  "\">" . "<br>";

			echo "<hr><br><input type=\"radio\" name=\"op\" value=\"EliminarFoto\"> " . _AM_USKOLAXGALLERY_ELIMINAR ;
			echo "<input type=\"radio\" name=\"op\" value=\"Actualizar\" checked>" .  _AM_USKOLAXGALLERY_ACTUALIZAR . "<br><hr><br>";
			echo "<input type=\"submit\" name=\"Submit\" value=\"" . _AM_USKOLAXGALLERY_ENVIAR . "\">";
			echo "</form>";		

	}
}}



?>