<?php


Function MostrarCarpetasBloquesAleatorios(){
	global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;

	$consulta2 = "SELECT BloquesAleatorios, SoloImagenes FROM " .$xoopsDB->prefix("uskolag_master");
	$myts = new MyTextSanitizer;
	$result2 = $xoopsDB->query($consulta2);
	echo "<form name=\"form1\" method=\"post\" action=\"index.php?op=ActualizarBloques\">";
	while($tbCarpeta2 = $xoopsDB->fetchArray($result2)){
		echo _AM_USKOLAXGALLERY_GALERIABLOQUESALEATORIOS .  "<br><input type=\"text\" name=\"BloquesAleatorios\" value=\"" . $tbCarpeta2['BloquesAleatorios'] .  "\"><br>";
		echo "<br>";
		echo  "<input type=\"checkbox\" name=\"SoloImagenes\" value=\"1\"";
		if ($tbCarpeta2['SoloImagenes']){
			echo " checked";
		}
		echo ">". _AM_USKOLAXGALLERY_FORZARDESCRIPCION . "<br>" ;
	
		echo "<br>";
		echo "<input type=\"submit\" name=\"Submit\" value=\"" . _AM_USKOLAXGALLERY_ENVIAR . "\">";
		echo "<br>";

		echo "</td><tr><td>";
	}
	echo "</form>";		
}

Function ActualizarBloques($BloquesAleatorios, $SoloImagenes){
	global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;
	$query = "update " . $xoopsDB->prefix("uskolag_master") . " set BloquesAleatorios ='$BloquesAleatorios',  SoloImagenes='$SoloImagenes'" . " WHERE " . 

	$xoopsDB->prefix("uskolag_master") . ".ID=" . 0  . "";
	$xoopsDB->query($query) ;
}




?>