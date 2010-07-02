<?php


Function EditarGaleria(){
	global $xoopsDB, $xoopsConfig, $xoopsTheme, $xoopsUser;
	
// 3-column table
	echo "<table cellpadding=3 border=0 cellspacing=3 class=bg2 align=center>\n";
	echo "<tr>\n";

// column 1
	echo "<td valign=top>\n";
	echo "<table align=left valign=top  class=bg1 height=100% cellpadding=3 cellspacing=3 border=0>";
	echo " <tr><td colspan=2 valign=top class=bg4 height=35 align=center valign=middle>";
//	echo "		<i><font face=\"Verdana, Arial, Helvetica, sans-serif\">" ; 

	
	echo PreparaAyuda( _AM_USKOLAXGALLERY_GLOBALGALERIA,  _HELP_USKOLAXGALLERY_GLOBALGALERIA);
	echo "</td>\n";
	echo " </tr>\n";
	if (file_exists("install.php")) {
	   echo " <tr><td><a href=\"index.php?op=Install\">" . PreparaAyuda( "<img src=\"icons/InstallGaleria.gif\">" , _HELP_USKOLAXGALLERY_INSTALAR ) . "</a></td>\n";
	   echo "     <td>";
//	   echo "     <h3><i><font face=\"Verdana, Arial, Helvetica, sans-serif\">" ; 
	   echo "	<a href=\"index.php?op=Install\">" . PreparaAyuda(_AM_USKOLAXGALLERY_INSTALAR, _HELP_USKOLAXGALLERY_INSTALAR ) . "</a>";
	   echo "	</font></i></td>\n";
 	   echo "</tr>\n";
	   }
	echo "<tr><td>";
//	echo "	<h3><i><font face=\"Verdana, Arial, Helvetica, sans-serif\">" ; 
	echo "	<a href=\"index.php?op=BloquesAleatorios\">" . PreparaAyuda( "<img src=\"icons/RandomCarpetas.gif\">" , _HELP_USKOLAXGALLERY_GALERIABLOQUESALEATORIOS) . "</a>";
	echo "	</td>\n";
	echo "	<td><a href=\"index.php?op=BloquesAleatorios\">" . PreparaAyuda( _AM_USKOLAXGALLERY_GALERIABLOQUESALEATORIOS, _HELP_USKOLAXGALLERY_GALERIABLOQUESALEATORIOS) . "</a>";
	echo "	</font></i></td>";
	echo "</tr>\n";
	echo "<tr><td>";
//	echo "	<h3><i><font face=\"Verdana, Arial, Helvetica, sans-serif\">" ; 
	echo "	<a href=\"index.php?op=MostrarBienvenida\">" . PreparaAyuda( "<img src=\"icons/Welcome.gif\">" , _HELP_USKOLAXGALLERY_GALERIABIENVENIDO) . "</a>";
	echo "	</td>\n";
	echo "	<td><a href=\"index.php?op=MostrarBienvenida\">" . PreparaAyuda( _AM_USKOLAXGALLERY_GALERIABIENVENIDO, _HELP_USKOLAXGALLERY_GALERIABIENVENIDO) . "</a>";
	echo "   </font></i></td>\n";
	echo "</tr>\n";
	echo "<tr><td>";
	echo "<tr><td>";
//	echo "	<h3><i><font face=\"Verdana, Arial, Helvetica, sans-serif\">" ; 
	echo "	<a href=\"index.php?op=CarpetasInicio\">" . PreparaAyuda( "<img src=\"icons/Welcome.gif\">" , _HELP_USKOLAXGALLERY_GALERIASINICIAL) . "</a>";
	echo "	</td>\n";
	echo "	<td><a href=\"index.php?op=CarpetasInicio\">" . PreparaAyuda( _AM_USKOLAXGALLERY_GALERIASINICIAL, _HELP_USKOLAXGALLERY_GALERIASINICIAL) . "</a>";
	echo "   </font></i></td>\n";
	echo "</tr>\n";
	echo "<tr><td>";

	echo "	<a href=\"index.php?op=Agrupaciones\">" . PreparaAyuda( "<img src=\"icons/Welcome.gif\">" , _HELP_USKOLAXGALLERY_CATEGORIAS) . "</a>";
	echo "	</td>\n";
	echo "	<td><a href=\"index.php?op=Agrupaciones\">" . PreparaAyuda( _AM_USKOLAXGALLERY_AGRUPACIONES, _HELP_USKOLAXGALLERY_CATEGORIAS) . "</a>";
	echo "   </font></i></td>\n";
	echo "</tr>\n";


	if (file_exists("uninstall.php")) {
	   echo " <tr><td><a href=\"index.php?op=UnInstall\">" . PreparaAyuda( "<img src=\"icons/UninstallGaleria.gif\">" , _HELP_USKOLAXGALLERY_DESINSTALAR ) . "</a></td>\n";
	   echo "    <td>";
//	   echo "<h3><i><font face=\"Verdana, Arial, Helvetica, sans-serif\">"; 
	   echo "	<a href=\"index.php?op=UnInstall\">" . PreparaAyuda(_AM_USKOLAXGALLERY_DESINSTALAR, _HELP_USKOLAXGALLERY_DESINSTALAR ) . "</a>";
	   echo "	</font></i></td>\n";
	   echo "</tr>\n";
	   }
	echo "</table>\n";
	echo "</td>\n";

// column 2
	echo "<td valign=top width=33%>\n";
	echo "<table align=left valign=top  class=bg1 height=100% cellpadding=3 cellspacing=3 border=0>";
	echo " <tr><td colspan=2 valign=top class=bg4 height=35 align=center valign=middle>";
//	echo "	  <i><font face=\"Verdana, Arial, Helvetica, sans-serif\">" ; 
	echo PreparaAyuda( _AM_USKOLAXGALLERY_PARACADAGALERIA, _HELP_USKOLAXGALLERY_PARACADAGALERIA) ;
	echo "</td>\n";
	echo "</tr>\n";

	echo "<tr><td>";
//	echo "    <h3><i><font face=\"Verdana, Arial, Helvetica, sans-serif\">"; 
	echo "    <a href=\"index.php?op=AnadirGaleria\">" . PreparaAyuda( "<img src=\"icons/AddGallery.gif\">"  , _HELP_USKOLAXGALLERY_ANADIRGALERIA) . "</a>";
	echo "    </td>\n";
	echo "    <td><a href=\"index.php?op=AnadirGaleria\">" . PreparaAyuda( _AM_USKOLAXGALLERY_ANADIRGALERIA, _HELP_USKOLAXGALLERY_ANADIRGALERIA) . "</a>";
	echo "    </font></i></td>\n";
	echo "</tr>\n";

	echo "<tr><td>";
//	echo "    <h3><i><font face=\"Verdana, Arial, Helvetica, sans-serif\">"; 
	echo "    <a href=\"index.php?op=ConfigurarGaleria\">" . PreparaAyuda( "<img src=\"icons/GaleriaConfigure.gif\">"  , _HELP_USKOLAXGALLERY_CONFIGURARGALERIA) . "</a>";
	echo "    </td>\n";
	echo "    <td><a href=\"index.php?op=ConfigurarGaleria\">" . PreparaAyuda( _AM_USKOLAXGALLERY_CONFIGURARGALERIA, _HELP_USKOLAXGALLERY_CONFIGURARGALERIA) . "</a>";
	echo "    </font></i></td>\n";
	echo "</tr>\n";

	echo "<tr><td>";
//	echo "    <h3><i><font face=\"Verdana, Arial, Helvetica, sans-serif\">"; 
	echo "	  <a href=\"index.php?op=ModificarFotos\">" . PreparaAyuda( "<img src=\"icons/UpdatePhotos.gif\">"  , _HELP_USKOLAXGALLERY_MODIFICARFOTOS) . "</a>";
	echo "    </td>\n";
	echo "    <td><a href=\"index.php?op=ModificarFotos\">" . PreparaAyuda( _AM_USKOLAXGALLERY_MODIFICARFOTOS, _HELP_USKOLAXGALLERY_MODIFICARFOTOS) . "</a>";
	echo "    </font></i></td>\n";
	echo "</tr>\n";

	echo "<tr><td>";
//	echo "    <h3><i><font face=\"Verdana, Arial, Helvetica, sans-serif\">"; 
	echo "    <a href=\"index.php?op=EliminarGaleria\">" . PreparaAyuda( "<img src=\"icons/DeleteGallery.gif\">" , _HELP_USKOLAXGALLERY_ELIMINARGALERIA) . "</a>";
	echo "    </td>\n";
	echo "    <td><a href=\"index.php?op=EliminarGaleria\">" . PreparaAyuda( _AM_USKOLAXGALLERY_ELIMINARGALERIA, _HELP_USKOLAXGALLERY_ELIMINARGALERIA) . "</a>";
	echo "    </font></i></td>\n";
	echo "</tr>";
	echo "</table>";

	echo "</td>\n";

// column 3
	echo "<td valign=top width=33%>\n";
	echo "<table align=left valign=top class=bg1 height=100% cellpadding=3 cellspacing=3 border=0>";
	echo " <tr><td colspan=2 valign=top class=bg4 height=35 align=center valign=middle>";
//	echo "	  <i><font face=\"Verdana, Arial, Helvetica, sans-serif\">" ; 
	echo PreparaAyuda(_AM_USKOLAXGALLERY_BONUS, _HELP_USKOLAXGALLERY_BONUS);
	echo "</td>\n";
	echo "</tr>\n";

	echo "<tr><td valign=top>";
	echo BotonAyuda("<img src=\"icons/help.gif\">", _HELP_USKOLAXGALLERY_HELP);
	echo "</td>\n";
	echo "<td valign=absmiddle>";
	echo " "._AM_USKOLAXGALLERY_CLICKPOSTIE." ";
	echo "</td>\n";
	echo "</tr>\n";

	echo " <tr><td><a href=\"http://galeria.data-arts.com/modules/faq/\">" . PreparaAyuda( "<img src=\"icons/Tutorial.gif\">" , _HELP_USKOLAXGALLERY_MANUALMINUTO )	 . "</a></td>\n";
	echo "    <td>\n";
//	echo "<i><font face=\"Verdana, Arial, Helvetica, sans-serif\">"; 
	echo "    ". _AM_USKOLAXGALLERY_MANUALMINUTO . "";
	echo "    </font></i></td>\n";
	echo "</tr>\n";

	echo " <tr><td><a href=\"http://galeria.data-arts.com\">" . PreparaAyuda( "<img src=\"icons/PFS.gif\">" , _HELP_USKOLAXGALLERY_MASESTILOS ) . "</a></td>\n";
	echo "    <td>\n";
//	echo "<h3><i><font face=\"Verdana, Arial, Helvetica, sans-serif\">" ; 
	echo "    <a href=\"http://galeria.data-arts.com\" target=\"_blank\">" . PreparaAyuda(_AM_USKOLAXGALLERY_MASESTILOS, _HELP_USKOLAXGALLERY_MASESTILOS) . "</a>";
	echo "    </font></i></td>\n";
	echo "</tr>\n";
	echo "</table>\n";
	echo "</td>\n";

// end 3-column table
	echo "</tr>\n";
	echo "</table>\n";
	echo "<br>";
	echo "<hr>";
	echo "<br>";
}




?>