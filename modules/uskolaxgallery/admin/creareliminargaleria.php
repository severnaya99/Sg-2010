<?php


Function AnadirGaleria(){


	echo "<table>";

	echo "<tr>";
		echo "<td>";
		echo "<form name=\"c\" method=\"post\" action=\"index.php?op=CrearGaleria\">";

		echo "<input type=\"hidden\" name=\"ID\" Value=\"" . $tbCarpeta['ID'] . "\">";
		echo _AM_USKOLAXGALLERY_NOMBRECARPETA . "<br>" . "<input type=\"text\" name=\"Carpeta\" value=\"". $tbCarpeta['Carpeta']. "\">" ;
		echo "<br>";

		echo _AM_USKOLAXGALLERY_DESCRIPCIONCARPETA . "<br>" . "<input type=\"text\" name=\"DescripcionCarpeta\" value=\"". $tbCarpeta['Carpeta']. "\"><br><br>" ;
		echo "<input type=\"submit\" name=\"GuardarCarpeta\" value=\"" . _AM_USKOLAXGALLERY_GUARDARCAMBIOSGALERIA ."\">";
//	    echo "<input type=\"hidden\" name=\"op\" value=\"CrearGaleria\">";
		echo "</form>";

		echo "</td>";
	echo "</tr>";
	echo "</table>";
}




Function CrearGaleria($Carpeta, $DescripcionCarpeta){

global $xoopsConfig, $xoopsDB, $xoopsModule;

$NumeroGaleriaAnadir = 0;

$consulta = "SELECT ID FROM " .$xoopsDB->prefix("uskolag_carpeta"). "";
$myts = new MyTextSanitizer;
$result = $xoopsDB->query($consulta);
while($tbCarpeta = $xoopsDB->fetchArray($result)){
	$NumeroGaleriaAnadir =  $tbCarpeta['ID'];
}

mkdir (XOOPS_ROOT_PATH . "/"  . "modules/uskolaxgallery/images/" . $Carpeta, 0777);

if (! mkdir (XOOPS_ROOT_PATH . "/"  . "modules/uskolaxgallery/images/" . $Carpeta . "/big", 0777)){
	echo "Error " . XOOPS_ROOT_PATH . "/" . "modules/uskolaxgallery/images/" . $Carpeta . "/big <br>";
}
if (! mkdir (XOOPS_ROOT_PATH . "/"  . "modules/uskolaxgallery/images/" . $Carpeta . "/small", 0777)){
	echo "Error " . XOOPS_ROOT_PATH . "/" . "modules/uskolaxgallery/images/" . $Carpeta . "/small <br>";
}

chmod (XOOPS_ROOT_PATH . "/"  . "modules/uskolaxgallery/images/" . $Carpeta, 0777);
chmod (XOOPS_ROOT_PATH . "/"  . "modules/uskolaxgallery/images/" . $Carpeta . "/big", 0777);
chmod (XOOPS_ROOT_PATH . "/"  . "modules/uskolaxgallery/images/" . $Carpeta . "/small", 0777);


$NumeroGaleriaAnadir = $NumeroGaleriaAnadir + 1;
$consulta = "INSERT INTO " . $xoopsDB->prefix("uskolag_carpeta") . " (ID,Carpeta, Descripcion) VALUES ('$NumeroGaleriaAnadir','$Carpeta','$DescripcionCarpeta')";
if($result = $xoopsDB->query($consulta)){
	echo $NumeroGaleriaAnadir . " - " . $Carpeta . " - " . $DescripcionCarpeta;
} else{
	echo _AM_USKOLAXGALLERY_ERRORINSERTANDO . $NumeroGaleriaAnadir;
}
}

	



Function EliminaGaleria($ID){
global $xoopsConfig, $xoopsDB, $xoopsModule;
$consulta =  "DELETE FROM ". $xoopsDB->prefix("uskolag_carpeta") . " WHERE " . $xoopsDB->prefix("uskolag_carpeta"). ".ID=" .$ID;
echo $consulta;
$result = $xoopsDB->queryf($consulta);
echo "EliminaGaleria" . $ID;
}


Function EliminarGaleria(){
	echo "<table>";

	echo "<tr>";
		echo "<td>";
		
		echo "<form name=\"c\" method=\"post\" action=\"index.php?op=EliminaGaleria\">";

//		echo "<input type=\"hidden\" name=\"ID\" Value=\"" . $tbCarpeta['ID'] . "\">";
		echo _AM_USKOLAXGALLERY_ID . "<br>" . "<input type=\"text\" name=\"ID\" value=\"" . "\">" ;
		echo "<br>";
		echo "<input type=\"submit\" name=\"EliminaCarpeta\" value=\"" . _AM_USKOLAXGALLERY_ELIMINARGALERIA ."\">";
	    echo "<input type=\"hidden\" name=\"op\" value=\"EliminaGaleria\">";
		echo "</form>";

		echo "</td>";
	echo "</tr>";
	echo "</table>";

}

?>
