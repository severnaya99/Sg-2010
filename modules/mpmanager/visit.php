<?php
// ------------------------------------------------------------------------- //
//                       XOOPS - Module MP Manager                           //
//                       <http://www.xoops.org/>                             //
// ------------------------------------------------------------------------- //
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
// ------------------------------------------------------------------------- // 
//                 Votre nouveau systeme de messagerie priver                //
//                                                                           //
//                               "MP"                                        //
//                                                                           //
//                       http://lexode.info/mods                             //
//                                                                           //
//                                                                           //
//---------------------------------------------------------------------------//

include "../../mainfile.php";
require_once ("include/functions.php");
$fileup = !empty($_GET['fileup']) ? $_GET['fileup'] : "";
global $xoopsUser, $xoopsModuleConfig;

if (empty($fileup) ) {
	redirect_header("javascript:history.go(-1)",1, _MP_ERREURDL);
	exit;
	}
	
$uid = $xoopsUser->getVar('uid');
if (empty($uid) ) {
	redirect_header("javascript:history.go(-1)",1, _PM_USERNOEXIST);
	exit;
	}
	


	$path = XOOPS_ROOT_PATH . "/modules/".$xoopsModule->dirname()."/upload/".$fileup."";
	$fp = fopen($path , "rb");
	//Si on arrive à lire le fichier on continue
	if ($fp) { 
		$fileName = basename ($path);
		if(ereg(".zip", $fileName)) $fileType = "application/x-zip-compressed";
		elseif(ereg(".rar", $fileName)) $fileType = "application/x-rar-compressed";
		else $fileType = "application/octet-stream";
		
		$fileLength = filesize($path);

		Header("Cache-control: private");
		Header("Pragma: no-cache");
		Header("Content-Type: $fileType");
		Header("Content-Transfer-Encoding: binary");
		Header("Content-Length: $fileLength");
		Header("Accept-Ranges: bytes");
		Header('Content-Disposition: attachment; filename="'.$fileName.'"');
		Header("Connection: close");
		
		while(!feof($fp)) {
			echo fread($fp, 4096);
		}
		fclose($fp);
	}
	//Sinon erreur : 
	else {
	redirect_header("javascript:history.go(-1)",1, _MP_ERREURDL);
	}

exit();

?>
