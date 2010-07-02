<?php


Function MostrarBienvenida(){
	global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;
	$consulta2 = "SELECT Bienvenida FROM " .$xoopsDB->prefix("uskolag_master");
	$myts = new MyTextSanitizer;
	$result2 = $xoopsDB->query($consulta2);
	echo "<form name=\"form1\" method=\"post\" action=\"index.php?op=ActualizarBienvenida\">";
	while($tbCarpeta2 = $xoopsDB->fetchArray($result2)){
	echo "<textarea name=\"Bienvenida\" cols=\"70\" rows=\"14\">" . $tbCarpeta2['Bienvenida'] . " </textarea><br>";
	echo "<input type=\"submit\" name=\"Submit\" value=\"" . _AM_USKOLAXGALLERY_ENVIAR . "\">";
	}
	echo "</form>";		
}

Function ActualizarBienvenida($Bienvenida){
	global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;
	$query = "update " . $xoopsDB->prefix("uskolag_master"). " set Bienvenida ='$Bienvenida'" . " WHERE " . $xoopsDB->prefix("uskolag_master") . ".ID=" . 0  . "";
	$xoopsDB->query($query) ;
}



?>