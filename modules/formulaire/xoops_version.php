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

$modversion['name'] = _MI_FORMULAIRE_NAME;
$modversion['version'] = 3.33;
$modversion['description'] = _MI_FORMULAIRE_DESC;
$modversion['author'] = "Philou";
$modversion['credits'] = "<a href=mailto:philou@xoops.org>philou</a>";
$modversion['help'] = "";
$modversion['license'] = "<a href='../docs/license.txt' target='_blank'>GPL see LICENSE</a>";
$modversion['official'] = 0;
$modversion['image'] = "images/formulaire_slogo.png";
$modversion['dirname'] = "formulaire";

$modversion['sqlfile']['mysql'] = "sql/mysql.sql";

if (!file_exists(XOOPS_ROOT_PATH."/uploads/formulaire"))
{
$chemin=XOOPS_ROOT_PATH.'/uploads/formulaire';
mkdir("$chemin",0777);
}
if (!file_exists(XOOPS_ROOT_PATH."/uploads/formulaire/imgform"))
{
$chemin=XOOPS_ROOT_PATH.'/uploads/formulaire/imgform';
mkdir("$chemin",0777);
}

// Tables created by sql file (without prefix!)
$modversion['tables'][0] = "form";
$modversion['tables'][1] = "form_id";
$modversion['tables'][2] = "form_menu";
$modversion['tables'][3] = "form_form";

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/modform.php";
$modversion['adminmenu'] = "admin/menu.php";

$modversion['support_site_url'] = "http://dev.xoops.org/modules/xfmod/project/?group_id=1105";
$modversion['support_site_name'] = "dev.xoops.org";

$modversion['developer_lead'] = "Fabien, Philou";
$modversion['credits_about'] = "Marcan, Hervé, Christian, Alain01, King76 <br /> <a href='http://www.brandycoke.com/' target='_blank'>Brandycoke NS Tai (aka tuff)</a><br />";
$modversion['credits_site'] = "http://www.frxoops.org";
$modversion['status_version'] = "Final";
$modversion['status'] = "Final";
$modversion['submit_bug'] = "http://dev.xoops.org/modules/xfmod/tracker/?func=add&group_id=1105&atid=561";
$modversion['submit_feature'] = "http://dev.xoops.org/modules/xfmod/tracker/?func=add&group_id=1105&atid=564";

$modversion['warning'] = _MI_WARNING_FINAL;

// Menu -- content in main menu block
$modversion['hasMain'] = 1;


// Templates
$modversion['templates'][1]['file'] = 'formulaire_index.html';
$modversion['templates'][1]['description'] = '';

//$modversion['templates'][2]['file'] = 'formulaire.html';
//$modversion['templates'][2]['description'] = '';

//	Module Configs
// $xoopsModuleConfig['t_width']
$modversion['config'][1]['name'] = 't_width';
$modversion['config'][1]['title'] = '_MI_FORMULAIRE_TEXT_WIDTH';
$modversion['config'][1]['description'] = '';
$modversion['config'][1]['formtype'] = 'textbox';
$modversion['config'][1]['valuetype'] = 'int';
$modversion['config'][1]['default'] = '30';

// $xoopsModuleConfig['t_max']
$modversion['config'][2]['name'] = 't_max';
$modversion['config'][2]['title'] = '_MI_FORMULAIRE_TEXT_MAX';
$modversion['config'][2]['description'] = '';
$modversion['config'][2]['formtype'] = 'textbox';
$modversion['config'][2]['valuetype'] = 'int';
$modversion['config'][2]['default'] = '255';

// $xoopsModuleConfig['ta_rows']
$modversion['config'][3]['name'] = 'ta_rows';
$modversion['config'][3]['title'] = '_MI_FORMULAIRE_TAREA_ROWS';
$modversion['config'][3]['description'] = '';
$modversion['config'][3]['formtype'] = 'textbox';
$modversion['config'][3]['valuetype'] = 'int';
$modversion['config'][3]['default'] = '5';

// $xoopsModuleConfig['ta_cols']
$modversion['config'][4]['name'] = 'ta_cols';
$modversion['config'][4]['title'] = '_MI_FORMULAIRE_TAREA_COLS';
$modversion['config'][4]['description'] = '';
$modversion['config'][4]['formtype'] = 'textbox';
$modversion['config'][4]['valuetype'] = 'int';
$modversion['config'][4]['default'] = '35';

// $xoopsModuleConfig['file_weight']
$modversion['config'][5]['name'] = 'file_weight';
$modversion['config'][5]['title'] = '_MI_FORMULAIRE_FILE_WEIGHT';
$modversion['config'][5]['description'] = '';
$modversion['config'][5]['formtype'] = 'textbox';
$modversion['config'][5]['valuetype'] = 'int';
$modversion['config'][5]['default'] = '200';

// $xoopsModuleConfig['delimeter']
$modversion['config'][6]['name'] = 'delimeter';
$modversion['config'][6]['title'] = '_MI_FORMULAIRE_DELIMETER';
$modversion['config'][6]['description'] = '';
$modversion['config'][6]['formtype'] = 'select';
$modversion['config'][6]['valuetype'] = 'text';
$modversion['config'][6]['default'] = 'space';
$modversion['config'][6]['options'] = array(_MI_FORMULAIRE_DELIMETER_SPACE=>'space', _MI_FORMULAIRE_DELIMETER_BR=>'br');

//bloc

$modversion['blocks'][3]['file'] = "formulaire_menu.php";
$modversion['blocks'][3]['name'] = "Liste des formulaires";
$modversion['blocks'][3]['description'] = "Liste des formulaires";
$modversion['blocks'][3]['show_func'] = "formulaire_menu_show";
$modversion['blocks'][3]['template'] = "formulaire_menu.html";

$modversion['blocks'][4]['file'] = "qcm_menu.php";
$modversion['blocks'][4]['name'] = "Liste des QCM";
$modversion['blocks'][4]['description'] = "Liste des QCM";
$modversion['blocks'][4]['show_func'] = "qcm_menu_show";
$modversion['blocks'][4]['template'] = "qcm_menu.html";
?>