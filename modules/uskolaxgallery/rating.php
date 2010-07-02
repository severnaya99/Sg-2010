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



include("../../mainfile.php");
include("../../header.php");

global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;

include("header.php");
OpenTable();

//esta siempre disponible
include_once("generico.php");
//para optimizar.




if ($ponercomentario != ""){
	redirect_header("index.php?carpeta=" . $carpeta . "&foto=" . $foto . "&inicio=" . $inicio . "",3,_MI_USKOLAXGALLERY_GRACIASCOMENTARIO);
	echo "</body></html>";
	include_once("setinfo.php");
	Set_pictModuloVisits($foto, $carpeta, "comentarios", $ponercomentario);

}else{
	if ($MenuVoto != ""){
		redirect_header("index.php?carpeta=" . $carpeta . "&foto=" . $foto . "&inicio=" . $inicio . "",3,_MI_USKOLAXGALLERY_GRACIASVOTACION);
		include_once("setinfo.php");
		Set_pictModuloVisits($foto, $carpeta, "votos", intval($MenuVoto));
	}else{
		if ($nombrefoto != ""){
			redirect_header("index.php?carpeta=" . $carpeta . "&inicio=" . $inicio . "",3,_MI_USKOLAXGALLERY_GRACIASFICHERO);
			include_once("upload.php");
			SubirModuloFoto(urldecode($carpeta), $inicio, $nombrefoto, $HTTP_POST_FILES[nombrefoto][name], $descripcionupload, $FotoDe, $title, $keywords);
		}else{
			if ($carpeta == "" ){
				include_once("seleccionargaleria.php");
				seleccionarcarpetamodulopro();
		   }else {
				if ($foto == "" ){
					include_once("seleccionarpequeno.php");
					include_once("description.php");

					if ($inicio){
						SeleccionarModuloFoto($carpeta,$inicio, $subcarpeta);
					}
					else{
						SeleccionarModuloFoto($carpeta,0, $subcarpeta);
					}			
				}
				else{
					include_once("seleccionargrande.php");
					include_once("setinfo.php");
					MostrarModuloFoto($carpeta, $inicio, $foto, $subcarpeta);
					Set_pictModuloVisits($foto, $carpeta, "visitas", 1);
				}
		   }

		}
	}
}

include_once(XOOPS_ROOT_PATH . "/"."class/xoopsrating2.php");
//$XoopsR1 = new XoopsRating2;
//$XoopsR1->XoopsRatingInfo("xoops_rate","ID", "2", "864000", 10, "1", "10", "10", "icons/on.gif", "icons/off.gif", "galeria", "1",$rating);

$XoopsR2 = new XoopsRating2;

$XoopsR2->XoopsRatingInfo("xoops_rate","ID", "2", "864000", 20, "1", "10", "10", XOOPS_ROOT_PATH . "/" . "modules/uskolaxgallery/icons/on.gif", XOOPS_ROOT_PATH . "/" . "modules/uskolaxgallery/icons/off.gif", "galeria", "1",$rating);
echo $XoopsR2->CodeStart;
echo $XoopsR2->codevalue;
echo "<br>puntos" . $XoopsR2->point . "<br>";
echo "votos" . $XoopsR2->votes . "<br>";
echo "valor" . $XoopsR2->value . "<br>";
echo $XoopsR2->returncode;
echo '<input type="submit" value="OK">';
echo "</form>";
echo $XoopsR2->returnimage;

CloseTable();

include("../../footer.php");
?>

