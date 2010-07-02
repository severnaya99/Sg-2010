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

include("../../mainfile.php");
include(XOOPS_ROOT_PATH."/header.php");
$ModName = "stexmeteo";

global $xoopsConfig, $xoopsTheme, $HTTP_POST_VARS;

echo "
<p>
<table border='0' cellpadding='0' cellspacing='0' align='center' width='100%'>
	<tr class='bg2'>
		<td class='bg2'>
			
			<table border='0' cellpadding='7' cellspacing='1' width='100%'>
				<tr class='bg2'>
					<td class='bg3'><font size='2'><b>"._MI_STEXMETEO_SIT."</b></font>
					</td>
				</tr>
			</table>
			
			<table border='0' cellpadding='4' cellspacing='1' align='center' width='100%'>
				<tr class='bg2'>
					<td class='bg1'><div align='center'><img src='http://www.ilmeteo.it/italy4.gif'></div></td>
					<td class='bg1'><div align='center'><img src='http://www.ilmeteo.it/italy3.gif'></div></td>
				</tr>
				<tr class='bg2'>
					<td class='bg1'><div align='center'><img src='http://www.ilmeteo.it/italy2.gif'></div></td>
					<td class='bg1'><div align='center'><img src='http://www.ilmeteo.it/italy1.gif'></div></td>
				</tr>
			</table>
			
			<table border='0' cellpadding='4' cellspacing='1' align='center' width='100%'>
				<tr class='bg2'>
					<td class='bg1'><button class='button' type='button' onClick=location.href='".XOOPS_URL."/modules/stexmeteo/index.php'>"._MI_STEXMETEO_TURN."</button>
					</td>
				</tr>
			</table>
			
			<table border='0' cellpadding='4' cellspacing='1' align='center' width='100%'>
		    	<tr class='bg2'>
					<td class='bg2'></td>
				</tr>	
			</table>
		
		</td>
	</tr>	
</table>

<table border='0' width='100%'>
	<tr>
		<td><div align='right'><b>"._MI_STEXMETEO_SPONSOREDBY."<a href='http://www.ilmeteo.it'><img width='140' src='".XOOPS_URL."/modules/stexmeteo/images/ilmeteo.gif'></a></b></div>
		</td>
	</tr>
	<tr>
		<td><div style='text-align:right; margin:2px; padding:2px;'><b><i>"._MI_STEXMETEO_NAME." 1.0</i></b> - created by <a href='http://ste.altervista.org'>Stefano</a></div>
		</td>
	</tr>
</table>";

include(XOOPS_ROOT_PATH."/footer.php");
?>