<?php
// ------------------------------------------------------------------------- //
//                             stEX-Meteo 1.00                               //
//                      <http://ste.altervista.org/>                         //
// ------------------------------------------------------------------------- //
//                              E-XOOPPORT                                   //
//                      <http://www.e-xoopport.it/>                          //
// ------------------------------------------------------------------------- //
//                                                                           //
// Original Author: Stefano Murgia                                           //
// Author Website : http://ste.altervista.org/                               //
// License Type   : GPL:                                                     //
//                                                                           //
//                ----------------------------------------                   //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//                ----------------------------------------                   //
//                                                                           //
//                 Copyright (C) June 2004  Stefano Murgia                   //
// ------------------------------------------------------------------------- //

function b_stexmeteo_show() {
global $xoopsConfig, $xoopsTheme;
 include (XOOPS_ROOT_PATH."/modules/stexmeteo/cache/config.php");
	$block = array();
	$block['title'] = _MB_STEXMETEO_BNAME;
	

$block['content'] .=  "<div align='center'><font size='1'>"._MB_STEXMETEO_SIT."</font></div>";


if($countconfig['SHOW_IMAGES'] == 1){
$block['content'] .=  "<table width='100%'>" ;
$block['content'] .=  "<tr><td><div align='center'><a href='".XOOPS_URL."/modules/stexmeteo/index.php'><img width='140' src='http://www.ilmeteo.it/italy1.gif'></div></td></tr></table>";

}
$block['content'] .=  "<table>";
$block['content'] .=  "<div align='center'><font size='1'>"._MB_STEXMETEO_PROVSEL."</font></div>
				
<table align='center'>
<tr><form name='city' method='post' action='".XOOPS_URL."/modules/stexmeteo/meteo.php'>
<div align='center'><select size='1' name='citta_input' style='font-size: 10px;'>
<option value='Agrigento'>Agrigento</option>
<option value='Alessandria'>Alessandria</option>
<option value='Ancona'>Ancona</option>
<option value='Aosta'>Aosta</option>
<option value='Arezzo'>Arezzo</option>
<option value='Ascoli Piceno'>Ascoli Piceno</option>
<option value='Asti'>Asti</option>
<option value='Avellino'>Avellino</option>
<option value='Bari'>Bari</option>
<option value='Belluno'>Belluno</option>
<option value='Benevento'>Benevento</option>
<option value='Bergamo'>Bergamo</option>
<option value='Biella'>Biella</option>
<option value='Bologna'>Bologna</option>
<option value='Bolzano'>Bolzano</option>
<option value='Bormio'>Bormio</option>
<option value='Brescia'>Brescia</option>
<option value='Brindisi'>Brindisi</option>
<option value='Cagliari'>Cagliari</option>
<option value='Caltanissetta'>Caltanissetta</option>
<option value='Campobasso'>Campobasso</option>
<option value='Caserta'>Caserta</option>
<option value='Catania'>Catania</option>
<option value='Catanzaro'>Catanzaro</option>
<option value='Chieti'>Chieti</option>
<option value='Como'>Como</option>
<option value='Cosenza'>Cosenza</option>
<option value='Cremona'>Cremona</option>
<option value='Crotone'>Crotone</option>
<option value='Cuneo'>Cuneo</option>
<option value='Enna'>Enna</option>
<option value='Ferrara'>Ferrara</option>
<option value='Firenze'>Firenze</option>
<option value='Foggia'>Foggia</option>
<option value='Forli'>Forli</option>
<option value='Frosinone'>Frosinone</option>
<option value='Genova'>Genova</option>
<option value='Gorizia'>Gorizia</option>
<option value='Grosseto'>Grosseto</option>
<option value='Imperia'>Imperia</option>
<option value='Isernia'>Isernia</option>
<option value='La Spezia'>La Spezia</option>
<option value='LAquila'>L'Aquila</option>
<option value='Latina'>Latina</option>
<option value='Lecce'>Lecce</option>
<option value='Lecco'>Lecco</option>
<option value='Livorno'>Livorno</option>
<option value='Lodi'>Lodi</option>
<option value='Lucca'>Lucca</option>
<option value='Macerata'>Macerata</option>
<option value='Mantova'>Mantova</option>
<option value='Massa'>Massa</option>
<option value='Matera'>Matera</option>
<option value='Messina'>Messina</option>
<option value='Milano'>Milano</option>
<option value='Modena'>Modena</option>
<option value='Napoli'>Napoli</option>
<option value='Novara'>Novara</option>
<option value='Nuoro'>Nuoro</option>
<option value='Oristano'>Oristano</option>
<option value='Padova'>Padova</option>
<option value='Palermo'>Palermo</option>
<option value='Parma'>Parma</option>
<option value='Pavia'>Pavia</option>
<option value='Perugia'>Perugia</option>
<option value='Pesaro'>Pesaro</option>
<option value='Pescara'>Pescara</option>
<option value='Piacenza'>Piacenza</option>
<option value='Pisa'>Pisa</option>
<option value='Pistoia'>Pistoia</option>
<option value='Pordenone'>Pordenone</option>
<option value='Potenza'>Potenza</option>
<option value='Prato'>Prato</option>
<option value='Ragusa'>Ragusa</option>
<option value='Ravenna'>Ravenna</option>
<option value='Reggio Calabria'>Reggio Calabria</option>
<option value='Reggio Emilia'>Reggio Emilia</option>
<option value='Rieti'>Rieti</option>
<option value='Rimini'>Rimini</option>
<option value='Roma'>Roma</option>
<option value='Rovigo'>Rovigo</option>
<option value='Salerno'>Salerno</option>
<option value='S.Marino500m'>S.Marino500m</option>
<option value='Sassari'>Sassari</option>
<option value='Savona'>Savona</option>
<option value='Siena'>Siena</option>
<option value='Siracusa'>Siracusa</option>
<option value='Sondrio'>Sondrio</option>
<option value='Taranto'>Taranto</option>
<option value='Teramo'>Teramo</option>
<option value='Terni'>Terni</option>
<option value='Torino'>Torino</option>
<option value='Trapani'>Trapani</option>
<option value='Trento'>Trento</option>
<option value='Treviso'>Treviso</option>
<option value='Trieste'>Trieste</option>
<option value='Udine'>Udine</option>
<option value='Urbino'>Urbino</option>
<option value='Varese'>Varese</option>
<option value='Venezia'>Venezia</option>
<option value='Verbania'>Verbania</option>
<option value='Vercelli'>Vercelli</option>
<option value='Verona'>Verona</option>
<option value='Vibo Valentia'>Vibo Valentia</option>
<option value='Vicenza'>Vicenza</option>
<option value='Viterbo'>Viterbo</option>
</select>
<input type='submit' value='"._MB_STEXMETEO_GO."' class='button'></form>				
</div>
</tr>
</table>
";
return $block; 
} 
?>