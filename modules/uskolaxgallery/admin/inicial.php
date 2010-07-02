<?php


Function MostrarCarpetasInicio(){
	global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;

	$consulta2 = "SELECT numerocolumnas FROM " .$xoopsDB->prefix("uskolag_master");
	$myts = new MyTextSanitizer;
	$result2 = $xoopsDB->query($consulta2);
	echo "<form name=\"form1\" method=\"post\" action=\"index.php?op=ActualizarCarpetasInicio\">";
	while($tbCarpeta2 = $xoopsDB->fetchArray($result2)){
		echo _AM_USKOLAXGALLERY_INICIOCARPETASFILA .  "<br><input type=\"text\" name=\"CarpetasFila\" value=\"" . $tbCarpeta2['numerocolumnas'] .  "\"><br>";
		echo "<br>";
	
		echo "<br>";
		echo "<input type=\"submit\" name=\"Submit\" value=\"" . _AM_USKOLAXGALLERY_ENVIAR . "\">";
		echo "<br>";

		echo "</td><tr><td>";
	}
	echo "</form>";		
}

Function ActualizarCarpetasInicio($numerocolumnas){
	global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;
	$query = "update " . $xoopsDB->prefix("uskolag_master") . " set numerocolumnas='$numerocolumnas'" . " WHERE " . 
	$xoopsDB->prefix("uskolag_master") . ".ID=" . 0  . "";
	$result2 = $xoopsDB->queryf($query);
	
}




?>