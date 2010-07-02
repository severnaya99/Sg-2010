<?php

###############################################################################
##             Formulaire - Information submitting module for XOOPS          ##
##                    Copyright (c) 2005 philou@xoops.org                  ##
##                       <http://www.frxoops.org/>                           ##
###############################################################################
##                    XOOPS - PHP Content Management System                  ##
##                       Copyright (c) 2000 XOOPS.org                        ##
##                          <http://www.xoops.org/>                          ##
###############################################################################
##  This program is free software; you can redistribute it and/or modify     ##
##  it under the terms of the GNU General Public License as published by     ##
##  the Free Software Foundation; either version 2 of the License, or        ##
##  (at your option) any later version.                                      ##
##                                                                           ##
##  You may not change or alter any portion of this comment or credits       ##
##  of supporting developers from this source code or any supporting         ##
##  source code which is considered copyrighted (c) material of the          ##
##  original comment or credit authors.                                      ##
##                                                                           ##
##  This program is distributed in the hope that it will be useful,          ##
##  but WITHOUT ANY WARRANTY; without even the implied warranty of           ##
##  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            ##
##  GNU General Public License for more details.                             ##
##                                                                           ##
##  You should have received a copy of the GNU General Public License        ##
##  along with this program; if not, write to the Free Software              ##
##  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA ##
###############################################################################
##  URL: http://www.frxoops.org/                                             ##
##  Project: Formulaire                                                      ##
###############################################################################
include '../../../include/cp_header.php';

if ( file_exists("../language/".$xoopsConfig['language']."/helpdoc.php") ) {
	include "../language/".$xoopsConfig['language']."/helpdoc.php";
} 
else {
	include "../language/english/helpdoc.php";
}

echo "
  <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
  <html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>
	<head>
	<meta http-equiv='content-type' content='text/html; charset=ISO-8859-1' />
	<meta http-equiv='content-language' content='en' />
	<title>Formulaire</title>
  <script src='stm31.js' type='text/javascript'></script></head>

</script>
</head>";
echo '
<body bgcolor="#FFFFFF" leftmargin="5" topmargin="5">
<script type="text/javascript" language="JavaScript1.2">
<!--
stm_bm(["menu6581",430,"","file:///C|/Program%20Files/SourceTec/Sothink%20DHTMLMenu/Resource/blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0],this);
stm_bp("p0",[0,4,0,0,3,3,0,0,100,"",-2,"",-2,50,2,1,"#999999","#FFFFFF","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"'._DOC_MENU_INSTALL.'","","",-1,-1,0,"help1.php","_self","","","","",0,0,0,"","",0,0,0,0,1,"#73a8b7",0,"#b3ccd3",0,"","",3,3,0,0,"#ffffff #ffffff #ffffff #ffffff","#ffffff #ffffff #ffffff #ffffff","#ffffff","#000000","italic bold 10pt \'Arial\',\'Verdana\'","italic bold 10pt \'Arial\',\'Verdana\'",0,0]);
stm_aix("p0i1","p0i0",[0,"'._DOC_MENU_CONFIG.'","","",-1,-1,0,"help2.php"]);
stm_bpx("p1","p0",[1,4,0,0,3,3,0,0]);
stm_aix("p1i0","p0i0",[0,"'._DOC_MENU_PREF.'","","",-1,-1,0,"help2.php#1","_self","","","","",0,0,0,"","",0,0,0,0,1,"#73a8b7",0,"#b3ccd3"]);
stm_aix("p1i1","p1i0",[0,"'._DOC_MENU_BLGR.'","","",-1,-1,0,"help2.php#2"]);
stm_ep();
stm_aix("p0i2","p0i1",[0,"'._DOC_MENU_GESFORM.'","","",-1,-1,0,"help3.php"]);
stm_bpx("p2","p1",[]);
stm_aix("p2i0","p1i1",[0,"'._DOC_MENU_CREATFORM.'","","",-1,-1,0,"help3.php#1"]);
stm_aix("p2i2","p1i1",[0,"'._DOC_MENU_SUPFORM.'","","",-1,-1,0,"help3.php#3"]);
stm_aix("p2i3","p1i1",[0,"'._DOC_MENU_MODFORM.'","","",-1,-1,0,"help3.php#4"]);
stm_aix("p2i4","p1i1",[0,"'._DOC_MENU_MODPFORM.'","","",-1,-1,0,"help3.php#5"]);
stm_aix("p2i5","p1i1",[0,"'._DOC_MENU_STAT.'","","",-1,-1,0,"help3.php#6"]);
stm_aix("p2i6","p1i1",[0,"'._DOC_MENU_PERM.'","","",-1,-1,0,"help3.php#7"]);
stm_aix("p2i7","p1i1",[0,"'._DOC_MENU_USER.'","","",-1,-1,0,"help3.php#8"]);
stm_ep();
stm_aix("p0i3","p0i0",[0,"'._DOC_MENU_CONS.'","","",-1,-1,0,"help4.php"]);
stm_bpx("p3","p1",[]);
stm_aix("p3i0","p1i0",[0,"'._DOC_MENU_CONS.'","","",-1,-1,0,"help4.php#1"]);
stm_aix("p3i1","p1i0",[0,"'._DOC_MENU_STATI.'","","",-1,-1,0,"help4.php#2"]);
stm_ep();
stm_aix("p0i4","p0i3",[0,"'._DOC_MENU_EXP.'","","",-1,-1,0,"help5.php"]);
stm_aix("p0i5","p0i3",[0,"'._DOC_MENU_MEN.'","","",-1,-1,0,"help6.php"]);
stm_aix("p0i6","p0i3",[0,"'._DOC_MENU_DIV.'","","",-1,-1,0,"help7.php"]);
stm_aix("p0i7","p0i3",[0,"'._DOC_MENU_REC.'","","",-1,-1,0,"help8.php"]);
stm_ep();
stm_em();
//-->
</script>';

echo "<br /><div style='color:blue; font-size:xx-large; font-weight:bold; text-align:center;'>"._DOC_MOD_RECO."</div><br /><br />";
echo "<div>"._DOC_RECO."</div><br /><br />";

echo "<div style='font-weight:bold; text-align:left;'><a href='help7.php'><img src='../images/gauche.gif' border='0'>"._DOC_MOD_DIV."</a></div></body>";
?>