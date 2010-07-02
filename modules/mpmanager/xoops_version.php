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

if (!defined("XOOPS_ROOT_PATH")) {
 	die("XOOPS root path not defined");
}

$modversion['name'] = _MI_MP_NAME;
$modversion['version'] = 2.75;
$modversion['description'] = _MI_MP_DESC;
$modversion['author'] = 'TDM';
$modversion['credits'] = 'http://tdmxoops.net';
$modversion['help'] = '';
$modversion['license'] = 'GPL see LICENSE';
$modversion['official'] = 0;
$modversion['image'] = 'images/mp_logo.png';
$modversion['dirname'] = 'mpmanager';
$modversion['iconsmall'] = "images/module_small.png";
$modversion['iconbig'] = "images/module_big.png";

//about
$modversion['demo_site_url'] = "http://www.tdmxoops.net/";
$modversion['demo_site_name'] = "TDM";
$modversion["module_website_url"] = "http://www.tdmxoops.net/";
$modversion["module_website_name"] = "TDM";

$modversion["release"] = "09-06-2009";
$modversion["module_status"] = "Release";
//

$modversion['sqlfile']['mysql'] = "sql/mysql.sql";

$modversion['tables'][0] = "priv_msgscat";
$modversion['tables'][1] = "priv_msgscont";
$modversion['tables'][2] = "priv_msgsopt";
$modversion['tables'][3] = "priv_msgsup";

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';

$modversion['author_website_url'] = "http://tdmxoops.net";
$modversion['author_website_name'] = "TDM";
$modversion['author_email'] = "none";
$modversion['status_version'] = "2.75";
$modversion['status'] = "Final";

//admin config
$modversion['config'][1]['name'] = 'maxalert';
$modversion['config'][1]['title'] = '_PM_FALALERT';
$modversion['config'][1]['description'] = '_PM_FALALERTCOM';
$modversion['config'][1]['formtype'] = 'textbox';
$modversion['config'][1]['valuetype'] = 'int';
$modversion['config'][1]['default'] = '10485760';

$modversion['config'][2]['name'] = 'optimise';
$modversion['config'][2]['title'] = '_PM_FALOPT';
$modversion['config'][2]['description'] = '_PM_FALOPTCOM';
$modversion['config'][2]['formtype'] = 'yesno';
$modversion['config'][2]['valuetype'] = 'int';
$modversion['config'][2]['default'] = '0';

$modversion['config'][3]['name'] = 'senduser';
$modversion['config'][3]['title'] = '_PM_SENDUSER';
$modversion['config'][3]['description'] = "";
$modversion['config'][3]['formtype'] = 'textbox';
$modversion['config'][3]['valuetype'] = 'int';
$modversion['config'][3]['default'] = '3';

$modversion['config'][4]['name'] = 'maxuser';
$modversion['config'][4]['title'] = '_PM_USEALERT';
$modversion['config'][4]['description'] = "";
$modversion['config'][4]['formtype'] = 'textbox';
$modversion['config'][4]['valuetype'] = 'int';
$modversion['config'][4]['default'] = '500';

$modversion['config'][5]['name'] = 'maxfile';
$modversion['config'][5]['title'] = '_PM_FILEMAX';
$modversion['config'][5]['description'] = "";
$modversion['config'][5]['formtype'] = 'textbox';
$modversion['config'][5]['valuetype'] = 'int';
$modversion['config'][5]['default'] = '10';

$modversion['config'][6]['name'] = 'newmsg';
$modversion['config'][6]['title'] = '_PM_NEWMSG';
$modversion['config'][6]['description'] = "";
$modversion['config'][6]['formtype'] = 'select';
$modversion['config'][6]['valuetype'] = 'text';
$modversion['config'][6]['default'] = 'none';
$modversion['config'][6]['options'] = array( _PM_NONE => 'none', _PM_POPUP => 'popup', _PM_IMAGE => 'image', _PM_ANIM => 'anim', _PM_SON => 'son' );

$modversion['config'][7]['name'] = 'useralert';
$modversion['config'][7]['title'] = '_PM_ALERTBOITE';
$modversion['config'][7]['description'] = '_PM_COMALERTBOITE';
$modversion['config'][7]['formtype'] = 'yesno';
$modversion['config'][7]['valuetype'] = 'int';
$modversion['config'][7]['default'] = '0';

$modversion['config'][8]['name'] = 'cssbtext';
$modversion['config'][8]['title'] = '_PM_CSSBTEXT';
$modversion['config'][8]['description'] = "";
$modversion['config'][8]['formtype'] = 'textbox';
$modversion['config'][8]['valuetype'] = 'text';
$modversion['config'][8]['default'] = '#FF0000';

$modversion['config'][9]['name'] = 'notification';
$modversion['config'][9]['title'] = '_PM_NOTIF';
$modversion['config'][9]['description'] = '_PM_DESC_NOTIF';
$modversion['config'][9]['formtype'] = 'yesno';
$modversion['config'][9]['valuetype'] = 'int';
$modversion['config'][9]['default'] = '0';

$modversion['config'][10]['name'] = 'temail';
$modversion['config'][10]['title'] = '_PM_CORP_NOTIF';
$modversion['config'][10]['description'] = '_PM_CORP_DESC';
$modversion['config'][10]['formtype'] = 'textarea';
$modversion['config'][10]['valuetype'] = 'text';
$modversion['config'][10]['default'] = _MP_NOTIF_MAIL;

$modversion['config'][11]['name'] = 'wysiwyg';
$modversion['config'][11]['title'] = '_MP_WYSIWYG';
$modversion['config'][11]['description'] = '_MP_WYSIWYG_DESC';
$modversion['config'][11]['formtype'] = 'select_multi';
$modversion['config'][11]['valuetype'] = 'array';
$modversion['config'][11]['options'] = array('Compact' => 1,'DHTML' => 2, 'htmlarea' => 3, 'Koivi' => 4, 'TinyEditor' => 5, 'Inbetween' => 6 , 'spaw' => 7, 'FCK' => 8);
$modversion['config'][11]['default'] = '2';

$modversion['config'][12]['name'] = 'html';
$modversion['config'][12]['title'] = '_MP_AUTOHTML';
$modversion['config'][12]['description'] = '_MP_AUTOHTML_DESC';
$modversion['config'][12]['formtype'] = 'yesno';
$modversion['config'][12]['valuetype'] = 'int';
$modversion['config'][12]['default'] = '0';


$modversion['config'][13]['name'] = 'auto_mp';
$modversion['config'][13]['title'] = '_MP_AUTO';
$modversion['config'][13]['description'] = '_MP_AUTO_DESC';
$modversion['config'][13]['formtype'] = 'yesno';
$modversion['config'][13]['valuetype'] = 'int';
$modversion['config'][13]['default'] = '0';

$modversion['config'][14]['name'] = 'auto_suject';
$modversion['config'][14]['title'] = '_MP_AUTO_SUBJECT';
$modversion['config'][14]['description'] = "";
$modversion['config'][14]['formtype'] = 'textbox';
$modversion['config'][14]['valuetype'] = 'text';
$modversion['config'][14]['default'] = _MP_AUTO_MAILS;

$modversion['config'][15]['name'] = 'auto_text';
$modversion['config'][15]['title'] = '_MP_AUTO_TEXT';
$modversion['config'][15]['description'] = '_PM_CORP_DESC';
$modversion['config'][15]['formtype'] = 'textarea';
$modversion['config'][15]['valuetype'] = 'text';
$modversion['config'][15]['default'] = _MP_AUTO_MAIL;

$modversion['config'][16]['name'] = 'mimetypes';
$modversion['config'][16]['title'] = '_MP_OPMIMETYPE';
$modversion['config'][16]['description'] = "";
$modversion['config'][16]['formtype'] = 'select_multi';
$modversion['config'][16]['valuetype'] = 'array';
$modversion['config'][16]['default'] = array('doc','gif', 'jpeg', 'png');
$modversion['config'][16]['options'] = array(
            "bmp" => "image/bmp",
            "gif" => "image/gif",
			"ico" => "image/icon",
            "ief" => "image/ief",
            "jpeg" => "image/pjpeg",
            "jpeg" => "image/jpeg",
            "jpg" => "image/jpeg",
            "jpe" => "image/jpeg",
            "png" => "image/x-png",
            "tiff" => "image/tiff",
            "tif" => "image/tif",
			"wbmp" => "image/vnd.wap.wbmp",
			
			
			"ace" => "application/x-ace-compressed",
			"ai" => "application/postscript",
			"aif" => "audio/x-aiff",
			"aifc" => "audio/x-aiff",
			"aiff" => "audio/x-aiff",
			"asc" => "text/plain",
			"asf" => "video/x-ms-asf",
            "asx" => "audio/x-ms-wax",
			"au" => "audio/basic",
			"avi" => "video/x-msvideo",
			"bcpio" => "application/x-bcpio",
			"bin" => "application/octet-stream",
			"cdf" => "application/x-netcdf",
			"class" => "application/octet-stream",
			"cpio" => "application/x-cpio",
			"cpt" => "application/mac-compactpro",
			"csh" => "application/x-csh",
			"css" => "text/css",
			"dll" => "application/octet-stream",
			"dir" => "application/x-director",
			"djvu" => "image/vnd.djvu",
            "djv" => "image/vnd.djvu",
			"dms" => "application/octet-stream",
			"doc" => "application/msword",
			"dcr" => "application/x-director",
			"dvi" => "application/x-dvi",
			"dxr" => "application/x-director",
			"eps" => "application/postscript",
			"etx" => "text/x-setext",
			"exe" => "application/octet-stream",
			"ez" => "application/andrew-inset",
            "gtar" => "application/x-gtar",
			"hdf" => "application/x-hdf",
			"hqx" => "application/mac-binhex40",
			"htm" => "text/html",
			"html" => "text/html",
			"ice" => "x-conference-xcooltalk",
			"iges" => "model/iges",
			"igs" => "model/iges",
            "js" => "application/x-javascript",
			"kar" => "audio/midi",
			"latex" => "application/x-latex",
			"lha" => "application/octet-stream",
			"Log" => "text/plain",
            "log" => "text/plain",
            "lzh" => "application/octet-stream",
			"man" => "application/x-troff-man",
			"me" => "application/x-troff-me",
			"mesh" => "model/mesh",
			"msh" => "model/mesh",
			"mid" => "audio/midi",
			"midi" => "audio/midi",
			"mov" => "video/quicktime",
			"movie" => "video/x-sgi-movie",
            "mxu" => "video/vnd.mpegurl",
			"mpe" => "video/mpeg",
			"mpeg" => "video/mpeg",
            "mpg" => "video/mpeg",
			"mpga" => "audio/mpeg",
			"mp2" => "audio/mpeg",
			"mp3" => "audio/mpeg",
			"ms" => "application/x-troff-ms",
			"m3u" => "audio/x-mpegurl",
			"nc" => "application/x-netcdf",
            "oda" => "application/oda",
			"pbm" => "image/x-portable-bitmap",
			"pdb" => "chemical/x-pdb",
			"pgm" => "image/x-portable-graymap",
			"pnm" => "image/x-portable-anymap",
            "ppm" => "image/x-portable-pixmap",
            "pdf" => "application/pdf",
			"pgn" => "application/x-chess-pgn",
			"php" => "text/php",
            "php3" => "text/php3",
            "ps" => "application/postscript",
			"qt" => "video/quicktime",
			"roff" => "application/x-troff",
			"sgm" => "text/sgml",
            "sgml" => "text/sgml",
			"sh" => "application/x-sh",
			"shar" => "application/x-shar",
			"skd" => "application/x-koan",
			"skm" => "application/x-koan",
			"skp" => "application/x-koan",
			"skt" => "application/x-koan",
			"silo" => "model/mesh",
			"sit" => "application/x-stuffit",
			"smi" => "application/smil",
			"smil" => "application/smil",
			"snd" => "audio/basic",
			"so" => "application/octet-stream",
			"spl" => "application/x-futuresplash",
			"src" => "application/x-wais-source",
			"sv4cpio" => "application/x-sv4cpio",
			"sv4crc" => "application/x-sv4crc",
			"swf" => "application/x-shockwave-flash",
			"ra" => "audio/x-realaudio",
			"ram" => "audio/x-pn-realaudio",
			"rar" => "application/x-rar-compressed",
			"ras" => "image/x-cmu-raster",
			"rgb" => "image/x-rgb",
			"rm" => "audio/x-pn-realaudio",
			"rpm" => "audio/x-pn-realaudio-plugin",
			"rtf" => "text/rtf",
            "rtx" => "text/richtext",
			"t" => "application/x-troff",
			"tar" => "application/x-tar",
			"tar.gz" => "application/x-gzip",
            "tcl" => "application/x-tcl",
            "tex" => "application/x-tex",
            "texinfo" => "application/x-texinfo",
            "texi" => "application/x-texinfo",
           	"tr" => "application/x-troff",
			"tsv" => "text/tab-seperated-values",
			"txt" => "text/plain",
			"ustar" => "application/x-ustar",
            "vcd" => "application/x-cdlink",
			"vrml" => "model/vrml",
            "wav" => "audio/x-wav",
			"wax" => "audio/x-windows-media",
			"wbxml" => "application/vnd.wap.wbxml",
			"wma" => "audio/x-ms-wma",
			"wm" => "video/x-ms-wm", 
			"wmd" => "application/x-ms-wmd",
			"wml" => "text/vnd.wap.wml",
			"wmlc" => "application/vnd.wap.wmlc",
			"wmls" => "text/vnd.wap.wmlscript",
            "wmlsc" => "application/vnd.wap.wmlscriptc",
			"wmx" => "video/x-ms-wmx",
			"wmv" => "video/x-ms-wmv",
			"wmz" => "application/x-ms-wmz",
			"wrl" => "model/vrml",
            "wvx" => "video/x-ms-wvx",
			"xbm" => "image/x-xbitmap",
            "xpm" => "image/x-xpixmap",
            "xht" => "application/xhtml+xml",
			"xhtml" => "application/xhtml+xml",
			"XM" => "audio/fasttracker",
			"xml" => "text/xml",
			"xsl" => "text/xml",
			//"xls" => "application/excel",
            "xls" => "application/vnd.ms-excel",
			"xwd" => "image/x-windowdump",
			"xyz" => "chemical/x-xyz",
            "zip" => "application/zip",
            "Zip" => "application/zip", 
            "unknown" => "application/octet-stream");

$modversion['config'][17]['name'] = 'mimemax';
$modversion['config'][17]['title'] = '_MP_MIMEMAX';
$modversion['config'][17]['description'] = "";
$modversion['config'][17]['formtype'] = 'textbox';
$modversion['config'][17]['valuetype'] = 'int';
$modversion['config'][17]['default'] = '102400';

$modversion['config'][18]['name'] = 'upmax';
$modversion['config'][18]['title'] = '_MP_UPMAX';
$modversion['config'][18]['description'] = "";
$modversion['config'][18]['formtype'] = 'textbox';
$modversion['config'][18]['valuetype'] = 'int';
$modversion['config'][18]['default'] = '3';

$modversion['config'][19]['name'] = 'prunemessage';
$modversion['config'][19]['title'] = '_PM_AUTO_PRUNE';
$modversion['config'][19]['description'] = '_PM_PRUNE_DESC';
$modversion['config'][19]['formtype'] = 'textarea';
$modversion['config'][19]['valuetype'] = 'text';
$modversion['config'][19]['default'] = _MP_NOTIF_PRUNE;

$modversion['config'][20]['name'] = 'MPmaxtitle';
$modversion['config'][20]['title'] = '_MP_MAXTITLE';
$modversion['config'][20]['description'] = "";
$modversion['config'][20]['formtype'] = 'textbox';
$modversion['config'][20]['valuetype'] = 'int';
$modversion['config'][20]['default'] = '45';

//trouve le dernier membre
global $xoopsDB, $xoopsUser, $xoopsConfig, $xoopsModule, $xoopsModuleConfig;

$modversion['config'][21]['name'] = 'auto_uid';
$modversion['config'][21]['title'] = '_MP_AUTO_MESS';
$modversion['config'][21]['description'] = "";
$modversion['config'][21]['formtype'] = 'hidden';
$modversion['config'][21]['valuetype'] = 'int';

$member_handler =& xoops_gethandler('member');
$criteria = new CriteriaCompo(); 
$criteria->setLimit('1');
$criteria->setSort('uid');
$criteria->setOrder('desc');
$finuser =& $member_handler->getUsers($criteria); 
foreach (array_keys($finuser) as $i) { 
$modversion['config'][21]['default'] = $finuser[$i]->getVar('uid');
}

//templates
$modversion['templates'][1]['file'] = 'mp_box.html';
$modversion['templates'][1]['description'] = "";
$modversion['templates'][2]['file'] = 'mp_msgbox.html';
$modversion['templates'][2]['description'] = "";
$modversion['templates'][3]['file'] = 'mp_subox.html';
$modversion['templates'][3]['description'] = "";
$modversion['templates'][4]['file'] = 'mp_viewbox.html';
$modversion['templates'][4]['description'] = "";
$modversion['templates'][5]['file'] = 'mp_contbox.html';
$modversion['templates'][5]['description'] = "";
$modversion['templates'][6]['file'] = 'mp_filebox.html';
$modversion['templates'][6]['description'] = "";
$modversion['templates'][7]['file'] = 'mp_optionbox.html';
$modversion['templates'][7]['description'] = "";
$modversion['templates'][8]['file'] = 'mp_index.html';
$modversion['templates'][8]['description'] = "";

//recherche
$modversion['hasSearch'] = 1;
$modversion['search']['file'] = "include/search.inc.php";
$modversion['search']['func'] = "mp_search";
// Menu
$modversion['hasMain'] = 1;

// Blocks
$modversion['blocks'][1]['file'] = "mp_new.php";
$modversion['blocks'][1]['name'] = _BL_MP_NEW;
$modversion['blocks'][1]['description'] = "";
$modversion['blocks'][1]['show_func'] = "b_mp_new_show";
$modversion['blocks'][1]['edit_func'] = "b_mp_new_edit";
$modversion['blocks'][1]['options'] = "10|150|1";
$modversion['blocks'][1]['template'] = 'mp_block_new.html';

$modversion['blocks'][2]['file'] = "mp_cont.php";
$modversion['blocks'][2]['name'] = _BL_MP_CONT;
$modversion['blocks'][2]['description'] = "";
$modversion['blocks'][2]['show_func'] = "b_mp_cont_show";
$modversion['blocks'][2]['edit_func'] = "b_mp_cont_edit";
$modversion['blocks'][2]['options'] = "1";
$modversion['blocks'][2]['template'] = 'mp_block_cont.html';

// User Profile
$modversion['hasProfile'] = 1;

$modversion['profile']['field'][1]['name'] = 'mpmanager_link';
$modversion['profile']['field'][1]['type'] = 'autotext';
$modversion['profile']['field'][1]['valuetype'] = XOBJ_DTYPE_TXTAREA;
$modversion['profile']['field'][1]['default'] = "<a href=\"javascript:openWithSelfMain('{X_URL}/pmlite.php?send2=1&to_userid={X_UID}', 'pmlite', 550, 450);\" title=\""._MP_MI_MESSAGE." {X_UNAME}\"><img src=\"{X_URL}/modules/mpmanager/images/pm.gif\" alt=\""._MP_MI_MESSAGE." {X_UNAME}\" /></a>";
$modversion['profile']['field'][1]['show'] = 1;
$modversion['profile']['field'][1]['title'] = _MP_MI_LINK_TITLE;
$modversion['profile']['field'][1]['edit'] = 0;
$modversion['profile']['field'][1]['description'] = _MP_MI_LINK_DESCRIPTION;
$modversion['profile']['field'][1]['required'] = 0;
$modversion['profile']['field'][1]['config'] = 0;
$modversion['profile']['field'][1]['options'] = array();

//install
$modversion['onInstall'] = 'include/install.php';
//update
$modversion['onUpdate'] = 'include/update.php';

?>
