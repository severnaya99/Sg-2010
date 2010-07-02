<?php



Function ModificarFotos($Superior){

global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;

if (! $Superior){

}else{
echo "<center>";
}



$consulta = "SELECT ID, Carpeta, Imagen, Descripcion, Aleatorio, Bloque, MCatalogos, AnchoBloque, AltoBloque, AnchoImagenes, AltoImagenes, FotosAncho, FotosAlto, EnviarFicheros, EnviarComentarios, EnviarVotaciones, EnviarEnlaces, NecesarioRegistrar, InicioDescargas, FinDescargas, InicioEnlaces, FinEnlaces, Anterior, Siguiente, InicioEncabezado, FinEncabezado, InicioPie, FinPie, InicioEncabezadoComentario, FinEncabezadoComentario,  InicioComentario, FinComentario, BloquearImagenesSubidas, BloquearComentarios, InicioFoto, FinFoto, InicioFotoGrande, FinFotoGrande, InicioMarcoFoto, FinMarcoFoto, VerVisitas, VerFecha, TemaCargado, FotoDescripcion, UsarGraficoEnNombre, AleatorioListado, PermitirImprimir, PermitirMail, NombreFotoCarpeta, NombreFotoCarpetaSuperior FROM " .$xoopsDB->prefix("uskolag_carpeta"). "";


   if(!$result = $xoopsDB->queryf($consulta))
     {	
	die("Error <br />$sql");
     }


	$myts = new MyTextSanitizer;

	
	
while($tbCarpeta = $xoopsDB->fetchArray($result)){
	if (! $Superior){
	 echo "<br><center>";
	}
	 $totalficheros = Get_Image_listPro('../images/' . $tbCarpeta['Carpeta'] . '/small/');
	 $numeroficheros = count($totalficheros);
	 $imagenrandom = rand (0, $numeroficheros -1);
	 if (! $Superior){
		 if ($numeroficheros > 0 && $tbCarpeta['Aleatorio']){
		 $foto = trim($totalficheros[$imagenrandom]);
		 echo $tbCarpeta['Descripcion'] . " ("  . $numeroficheros . ") " . _MI_USKOLAXGALLERY_FOTOS . "<br>" ;       
		 echo "<a href=\"index.php?op=MostrarCarpeta&carpeta=" . $tbCarpeta['Carpeta'] . "&inicio=$imagenrandom" . "&foto=" . CorrigeAdminPro($foto) . "\"><img src=\"../images/" . $tbCarpeta['Carpeta'] . "/small/" . CorrigeAdminPro($foto) . "\" width="; 
		 }
		 else{
		 echo $tbCarpeta['Descripcion'] . " ("  . $numeroficheros . ") " . _MI_USKOLAXGALLERY_FOTOS . "<br>" ;       
		 echo "<a href=\"index.php?op=MostrarCarpeta&carpeta=" . $tbCarpeta['Carpeta'] . "\"><img src=\"../images/"  . CorrigeAdminPro($tbCarpeta['Imagen']) . "\" width="; 
		 }
		 echo $tbCarpeta['AnchoImagenes'];
		 echo " alt=\"" . $tbCarpeta['Descripcion']  . "\" border=0></img></a><br>";
		 echo  "</center>";
	 } else{
		 echo "<a href=\"index.php?op=MostrarCarpeta&carpeta=" . $tbCarpeta['Carpeta'] . "\"> " . $tbCarpeta['Descripcion'] . " ("  . $numeroficheros . ") " . _MI_USKOLAXGALLERY_FOTOS .  "</a>&nbsp&nbsp&nbsp&nbsp";
	 }
}

if (! $Superior){
	echo "</center>";
}
closedir($handle); 
}


function SeleccionarAdminFoto($carpeta, $inicio){

global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;



$consulta2 = "SELECT ID, Carpeta, Imagen, Descripcion, Aleatorio, Bloque, MCatalogos, AnchoBloque, AltoBloque, AnchoImagenes, AltoImagenes, FotosAncho, FotosAlto, Anterior, Siguiente FROM " .$xoopsDB->prefix("uskolag_carpeta") . " Where Carpeta like '" . $carpeta . "'";

	$myts = new MyTextSanitizer;

	$result2 = $xoopsDB->query($consulta2);
	
	ModificarFotos(1);
	
	while($tbCarpeta2 = $xoopsDB->fetchArray($result2)){
		echo  $USKOLAXGALLERIAHEADERSTART  . $tbCarpeta2['Descripcion'] . $USKOLAXGALLERYAHEADEREND;
		$FOTOSALTO = $tbCarpeta2['FotosAlto'];
		$FOTOSANCHO = $tbCarpeta2['FotosAncho'];
		$ANCHOCARPETA = $tbCarpeta2['AnchoImagenes'];
		$USKOLAXGALLERYANEXT = $tbCarpeta2['Siguiente'];
		$USKOLAXGALLERYAPREVIOUS = $tbCarpeta2['Anterior'];
		$CarpetaId = $tbCarpeta2['ID'];
	}

$consulta = "SELECT ID, Carpeta, Fichero, Descripcion, Visitas, Fecha, Comentarios, EnviadoPor, Votos, Clasificacion FROM " .$xoopsDB->prefix("uskolag_imagenes") . " Where Carpeta like '" . $carpeta . "'";

$result = $xoopsDB->query($consulta);


while($tbCarpeta = $xoopsDB->fetchArray($result)){

//echo "<h1>Lucas</h1>";


}

$categoriafoto = $inicio / ($FOTOSALTO * $FOTOSANCHO);
if ($categoriafoto != intval($categoriafoto)); 
	$categoriafoto = intval($categoriafoto) ;


$inicio = $categoriafoto * ($FOTOSALTO * $FOTOSANCHO);

$listadoimagenes = Get_Image_listPro('../images/' . $carpeta . '/small/');


echo "<table align=\"center\" width=\"" . ($FOTOSANCHO * ($anchocarpeta + 20)) . "\">";

	for ($contadoralto = 0; $contadoralto < $FOTOSALTO; $contadoralto++){
		echo "<tr>";
		for ($contadorancho = 0; $contadorancho < $FOTOSANCHO; $contadorancho++){
			if ($inicio	 < count($listadoimagenes)){
				echo "<td valign=\"top\">";
				echo "<a href=\"index.php?op=MostrarFoto&carpeta=" . $carpeta ."&foto=" . CorrigeAdminPro($listadoimagenes[$inicio]) . "&inicio=" . $inicio . "\">";
				echo "<img src=\"../images/" . $carpeta . "/small/" . CorrigeAdminPro($listadoimagenes[$inicio]);
				echo "\" width=\"" . $ANCHOCARPETA . "\"" . " alt=\"$listadoimagenes[$inicio]\""  .  ">"; 
				echo "</a><br>";
				Get_pictAdminDescripcion($listadoimagenes[$inicio], $carpeta);
				echo "<table align=\"left\" width=\"" . ($anchocarpeta) . "\"><br>";
				Get_pictAdminDescripcion($listadoimagenes[$inicio], $carpeta,"", 1,1);
				echo "</table>";
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

if ($categoriafoto != 0 ){
	$cadenadivisiones =  $cadenadivisiones . "<a href=\"index.php?op=MostrarCarpeta&carpeta=" . $carpeta . "&inicio=" . ($inicio -1 - ($FOTOSALTO * $FOTOSANCHO))  . "\">";   
	$cadenadivisiones =  $cadenadivisiones . $USKOLAXGALLERYAPREVIOUS;
	$cadenadivisiones =  $cadenadivisiones . "</a> ";
}

for ($contadordivisiones = 1; $contadordivisiones <= $numerodivisiones; $contadordivisiones++) {
    $cadenadivisiones =  $cadenadivisiones . "<a href=\"index.php?op=MostrarCarpeta&carpeta=" . $carpeta . "&inicio=" . (($contadordivisiones -1) * ($contadoralto * $contadorancho) +1) . "\">" .  $contadordivisiones . "</a> " ;
}

if ($categoriafoto < ($numerodivisiones -1) ){
	$cadenadivisiones =  $cadenadivisiones . "<a href=\"index.php?op=MostrarCarpeta&carpeta=" . $carpeta . "&inicio=" . ($inicio - 1 + ($FOTOSALTO * $FOTOSANCHO))  . "\">";   
	$cadenadivisiones =  $cadenadivisiones . $USKOLAXGALLERYANEXT;
	$cadenadivisiones =  $cadenadivisiones . "</a> ";
}

echo $USKOLAGALERIAFOOTSTART . $cadenadivisiones . $USKOLAXGALLERYAFOOTEND;

}




Function EliminarFoto($ID, $fichero, $carpeta){
global $xoopsConfig, $xoopsDB, $xoopsModule;
$fichero = urldecode($fichero);
$carpeta = urldecode($carpeta);
$consulta =  "DELETE FROM ". $xoopsDB->prefix("uskolag_carpeta") . " WHERE " . $xoopsDB->prefix("uskolag_imagenes"). ".ID=$ID";
$result = $xoopsDB->queryf($consulta);

$consulta2 =  "DELETE FROM ". $xoopsDB->prefix("uskolag_comentarios") . " WHERE " . $xoopsDB->prefix("uskolag_comentarios"). ".Carpeta=$carpeta AND " . $xoopsDB->prefix("uskolag_comentarios"). ".Fichero=$fichero";

$result = $xoopsDB->queryf($consulta2);

$consulta =  "DELETE FROM ". $xoopsDB->prefix("uskolag_catalogo_foto") . " WHERE " . $xoopsDB->prefix("uskolag_catalogo_foto"). ".foto=" . $ID;
$result = $xoopsDB->queryf($consulta);

unlink ("../images/" . $carpeta . "/small/" . $fichero) ;
unlink ("../images/" . $carpeta . "/big/" . $fichero) ;
}

function MostrarAdminFoto($carpeta, $inicio, $foto)
{
	global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;

	$consulta2 = "SELECT ID, Carpeta, Imagen, Descripcion, Aleatorio, Bloque, MCatalogos, AnchoBloque, AltoBloque, AnchoImagenes,  FotosAncho, FotosAlto, Anterior, Siguiente FROM " .$xoopsDB->prefix("uskolag_carpeta") . " Where Carpeta like '" . $carpeta . "'";

	$myts = new MyTextSanitizer;

	$result2 = $xoopsDB->query($consulta2);
	
	while($tbCarpeta2 = $xoopsDB->fetchArray($result2)){
	echo   "<h2><div align=center>" . $tbCarpeta2['Descripcion'] . "</div></H2>";
	$FOTOSALTO = $tbCarpeta2['FotosAlto'];
	$FOTOSANCHO = $tbCarpeta2['FotosAncho'];
	$ANCHOCARPETA = $tbCarpeta2['AnchoImagenes'];
	$USKOLAXGALLERYANEXT = $tbCarpeta2['Siguiente'];
	$USKOLAXGALLERYAPREVIOUS = $tbCarpeta2['Anterior'];
	}


	$Foto = urldecode($Foto);
	$Foto = urlencode($Foto);
	$listadoimagenes = Get_Image_listPro('../images/' . $carpeta . '/small/');

	echo "<table align=\"center\">";
	echo "<tr>"; 	
	echo "<div align=\"center\"><h2>";
//	echo Get_pictAdminDescripcion($foto, $carpeta,"", 1);
	echo "</h2></div>";
	echo "</tr><tr>";	
	echo "<td><div align=\"left\">";
//	echo "<a href=\"index.php?carpeta=" . $carpeta . "&inicio=" . ($inicio - 1) . "&foto=" . $listadoimagenes[$inicio - 1] . "\">"  . $USKOLAXGALLERYAPREVIOUS;
//	echo "</a></div></td>";
	echo "<td></td>";

	echo "<td><div align=\"right\">";
//	echo "<a href=\"index.php?carpeta=" . $carpeta . "&inicio=" . ($inicio + 1) . "&foto=" . CorrigeAdminPro($listadoimagenes[$inicio + 1]) . "\">"  . $USKOLAXGALLERYANEXT;
//	echo "</a></div></td>";
	echo "</tr>";
	echo "<tr><td colspan=\"3\">";
	echo "<br><div align=\"center\"><a href=\"index.php?op=MostrarCarpeta&carpeta=" . $carpeta . "&inicio=" . $inicio . "\">";
	echo "<img src=\"../images/" .$carpeta . "/big/" . CorrigeAdminPro($foto) . "\"></img></a></div>";
	echo "</td></tr>";
	echo "<tr><td valign=\"top\">";
	echo "</td><td valign=\"top\">";
	echo "<br><div align=\"left\">";
	Get_pictAdminDescripcion($foto, $carpeta, True);
	echo "</div></td></tr>";
	echo "</table>";
}




?>