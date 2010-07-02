<?php
// $Id: xoops_version.php,v 1.15 2006/03/28 08:47:35 mcleines Exp $
//  ------------------------------------------------------------------------ //
//                    xcGal 2.0 - XOOPS Gallery Modul                        //
//  ------------------------------------------------------------------------ //
//  Based on      xcGallery 1.1 RC1 - XOOPS Gallery Modul                    //
//                    Copyright (c) 2003 Derya Kiran                         //
//  ------------------------------------------------------------------------ //
//  Based on Coppermine Photo Gallery 1.10 http://coppermine.sourceforge.net///
//                      developed by Grégory DEMAR                           //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
$modversion['name'] = 'xcGallery';
$modversion['version'] = '2.03';
$modversion['description'] = 'Gallery module for Xoops 2.2 and higher based on xcgal 1.1 RC what is based on Coppermine 1.10 &copy; Grégory DEMAR (http://coppermine.sourceforge.net)';
$modversion['credits'] = "http://dev.xoops.org";
$modversion['author'] = "Vers. 1.1: Derya Kiran, edited for Xoops 2.2 by mcleines";
$modversion['help'] = "top.html";
$modversion['license'] = "GPL see LICENSE";
$modversion['official'] = 1;
$modversion['image'] = "images/slogo.png";
$modversion['dirname'] = "xcgal";

//Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

// Menu
$modversion['hasMain'] = 1;
//search
$modversion['hasSearch'] = 1;
$modversion['search']['file'] = "include/search.php";
$modversion['search']['func'] = "xcgal_search";
//DB
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";

$modversion['tables'][0] = "xcgal_albums";
$modversion['tables'][1] = "xcgal_categories";
$modversion['tables'][2] = "xcgal_pictures";
$modversion['tables'][3] = "xcgal_usergroups";
$modversion['tables'][4] = "xcgal_votes";
$modversion['tables'][5] = "xcgal_ecard";

// Blocks
$modversion['blocks'][1]['file'] = "xcgal_blocks.php";
$modversion['blocks'][1]['name'] = _MI_XCGAL_SCROLL;
$modversion['blocks'][1]['description'] = "Scrolling Thumbnails";
$modversion['blocks'][1]['show_func'] = "xcgal_block_func";
$modversion['blocks'][1]['edit_func'] = "xcgal_block_edit";
$modversion['blocks'][1]['options'] = "1|1|1|100|1|5";
$modversion['blocks'][1]['template'] = 'xcgal_block_scroll.html';

$modversion['blocks'][2]['file'] = "xcgal_blocks.php";
$modversion['blocks'][2]['name'] = _MI_XCGAL_CATMENU;
$modversion['blocks'][2]['description'] = "xcGallery categorie menu";
$modversion['blocks'][2]['show_func'] = "xcgal_catmenu_block_func";
$modversion['blocks'][2]['template'] = 'xcgal_block_catmenu.html';

$modversion['blocks'][3]['file'] = "xcgal_blocks.php";
$modversion['blocks'][3]['name'] = _MI_XCGAL_STATIC;
$modversion['blocks'][3]['description'] = "Static Thumbnails";
$modversion['blocks'][3]['show_func'] = "xcgal_block_func";
$modversion['blocks'][3]['edit_func'] = "xcgal_block_edit";
$modversion['blocks'][3]['options'] = "2|4|2|0|1|5";
$modversion['blocks'][3]['template'] = 'xcgal_block_static.html';

$modversion['blocks'][4]['file'] = "xcgal_blocks.php";
$modversion['blocks'][4]['name'] = _MI_XCGAL_METAALB;
$modversion['blocks'][4]['description'] = "Meta Albums";
$modversion['blocks'][4]['show_func'] = "xcgal_block_meta_func";
$modversion['blocks'][4]['edit_func'] = "xcgal_block_meta_edit";
$modversion['blocks'][4]['options'] = "lastup,1/mostsend,1/topn,1|4|1";
$modversion['blocks'][4]['template'] = 'xcgal_block_meta.html';


// Templates
$modversion['templates'][1]['file'] = 'xcgal_header.html';
$modversion['templates'][1]['description'] = '';
$modversion['templates'][2]['file'] = 'xcgal_footer.html';
$modversion['templates'][2]['description'] = '';
$modversion['templates'][3]['file'] = 'xcgal_index.html';
$modversion['templates'][3]['description'] = '';
$modversion['templates'][4]['file'] = 'xcgal_modifyalb.html';
$modversion['templates'][4]['description'] = '';
$modversion['templates'][5]['file'] = 'xcgal_editpics.html';
$modversion['templates'][5]['description'] = '';
$modversion['templates'][6]['file'] = 'xcgal_delete.html';
$modversion['templates'][6]['description'] = '';
$modversion['templates'][7]['file'] = 'xcgal_fullsize.html';
$modversion['templates'][7]['description'] = '';
$modversion['templates'][8]['file'] = 'xcgal_slideshow.html';
$modversion['templates'][8]['description'] = '';
$modversion['templates'][9]['file'] = 'xcgal_upload.html';
$modversion['templates'][9]['description'] = '';
$modversion['templates'][10]['file'] = 'xcgal_albmgr.html';
$modversion['templates'][10]['description'] = '';
$modversion['templates'][11]['file'] = 'xcgal_display.html';
$modversion['templates'][11]['description'] = '';
$modversion['templates'][12]['file'] = 'xcgal_ecard.html';
$modversion['templates'][12]['description'] = '';
$modversion['templates'][13]['file'] = 'xcgal_search.html';
$modversion['templates'][13]['description'] = '';
$modversion['templates'][14]['file'] = 'xcgal_thumb.html';
$modversion['templates'][14]['description'] = '';
$modversion['templates'][15]['file'] = 'xcgal_discard.html';
$modversion['templates'][15]['description'] = '';
$modversion['templates'][16]['file'] = 'xcgal_uploadmore.html';
$modversion['templates'][16]['description'] = '';

//$modversion['templates'][1]['file'] = 'coppermine.html';
$modversion['hasComments'] = 1;
$modversion['comments']['itemName'] = 'pid';
$modversion['comments']['pageName'] = 'displayimage.php';

$modversion['config'][1]['name'] = 'anosee';
$modversion['config'][1]['title'] = '_MI_ANONSEE';
$modversion['config'][1]['description'] = '';
$modversion['config'][1]['formtype'] = 'yesno';
$modversion['config'][1]['valuetype'] = 'int';
$modversion['config'][1]['default'] = 1;

$modversion['config'][2]['name'] = 'subcat_level';
$modversion['config'][2]['title'] = '_MI_SUBCAT_LEVEL';
$modversion['config'][2]['description'] = '';
$modversion['config'][2]['formtype'] = 'textbox';
$modversion['config'][2]['valuetype'] = 'int';
$modversion['config'][2]['default'] = 2;

$modversion['config'][3]['name'] = 'albums_per_page';
$modversion['config'][3]['title'] = '_MI_ALB_PER_PAGE';
$modversion['config'][3]['description'] = '';
$modversion['config'][3]['formtype'] = 'textbox';
$modversion['config'][3]['valuetype'] = 'int';
$modversion['config'][3]['default'] = 12;

$modversion['config'][4]['name'] = 'album_list_cols';
$modversion['config'][4]['title'] = '_MI_ALB_LIST_COLS';
$modversion['config'][4]['description'] = '';
$modversion['config'][4]['formtype'] = 'textbox';
$modversion['config'][4]['valuetype'] = 'int';
$modversion['config'][4]['default'] = 2;

$modversion['config'][5]['name'] = 'alb_list_thumb_size';
$modversion['config'][5]['title'] = '_MI_ALB_THUMB_SIZE';
$modversion['config'][5]['description'] = '';
$modversion['config'][5]['formtype'] = 'textbox';
$modversion['config'][5]['valuetype'] = 'int';
$modversion['config'][5]['default'] = 50;

$modversion['config'][6]['name'] = 'main_page_layout';
$modversion['config'][6]['title'] = '_MI_MAIN_LAYOUT';
$modversion['config'][6]['description'] = '';
$modversion['config'][6]['formtype'] = 'textbox';
$modversion['config'][6]['valuetype'] = 'text';
$modversion['config'][6]['default'] = 'catlist/alblist/random,2/lastup,2';

$modversion['config'][7]['name'] = 'thumbcols';
$modversion['config'][7]['title'] = '_MI_THUMBCOLS';
$modversion['config'][7]['description'] = '';
$modversion['config'][7]['formtype'] = 'textbox';
$modversion['config'][7]['valuetype'] = 'int';
$modversion['config'][7]['default'] = 4;

$modversion['config'][8]['name'] = 'thumbrows';
$modversion['config'][8]['title'] = '_MI_THUMBROWS';
$modversion['config'][8]['description'] = '';
$modversion['config'][8]['formtype'] = 'textbox';
$modversion['config'][8]['valuetype'] = 'int';
$modversion['config'][8]['default'] = 3;

$modversion['config'][9]['name'] = 'max_tabs';
$modversion['config'][9]['title'] = '_MI_MAX_TABS';
$modversion['config'][9]['description'] = '';
$modversion['config'][9]['formtype'] = 'textbox';
$modversion['config'][9]['valuetype'] = 'int';
$modversion['config'][9]['default'] = 12;

$modversion['config'][10]['name'] = 'caption_in_thumbview';
$modversion['config'][10]['title'] = '_MI_TEXT_THUMBVIEW';
$modversion['config'][10]['description'] = '';
$modversion['config'][10]['formtype'] = 'yesno';
$modversion['config'][10]['valuetype'] = 'int';
$modversion['config'][10]['default'] = 0;

$modversion['config'][11]['name'] = 'display_comment_count';
$modversion['config'][11]['title'] = '_MI_COM_COUNT';
$modversion['config'][11]['description'] = '';
$modversion['config'][11]['formtype'] = 'yesno';
$modversion['config'][11]['valuetype'] = 'int';
$modversion['config'][11]['default'] = 1;

$modversion['config'][12]['name'] = 'default_sort_order';
$modversion['config'][12]['title'] = '_MI_DEF_SORT';
$modversion['config'][12]['description'] = '';
$modversion['config'][12]['formtype'] = 'select';
$modversion['config'][12]['valuetype'] = 'text';
$modversion['config'][12]['default'] = 'na';
$modversion['config'][12]['options'] = array('_MI_SORT_NA' => 'na', '_MI_SORT_ND' => 'nd' ,  '_MI_SORT_DA' => 'da' , '_MI_SORT_DD' => 'dd');

$modversion['config'][13]['name'] = 'min_votes_for_rating';
$modversion['config'][13]['title'] = '_MI_MIN_VOTES';
$modversion['config'][13]['description'] = '';
$modversion['config'][13]['formtype'] = 'textbox';
$modversion['config'][13]['valuetype'] = 'int';
$modversion['config'][13]['default'] = 1;

$modversion['config'][14]['name'] = 'display_pic_info';
$modversion['config'][14]['title'] = '_MI_DIS_PICINFO';
$modversion['config'][14]['description'] = '';
$modversion['config'][14]['formtype'] = 'yesno';
$modversion['config'][14]['valuetype'] = 'int';
$modversion['config'][14]['default'] = 1;

$modversion['config'][15]['name'] = 'jpeg_qual';
$modversion['config'][15]['title'] = '_MI_JPG_QUAL';
$modversion['config'][15]['description'] = '';
$modversion['config'][15]['formtype'] = 'textbox';
$modversion['config'][15]['valuetype'] = 'int';
$modversion['config'][15]['default'] = 80;

$modversion['config'][16]['name'] = 'thumb_width';
$modversion['config'][16]['title'] = '_MI_THUMB_WIDTH';
$modversion['config'][16]['description'] = '';
$modversion['config'][16]['formtype'] = 'textbox';
$modversion['config'][16]['valuetype'] = 'int';
$modversion['config'][16]['default'] = 100;

$modversion['config'][17]['name'] = 'make_intermediate';
$modversion['config'][17]['title'] = '_MI_MAKE_INTERM';
$modversion['config'][17]['description'] = '';
$modversion['config'][17]['formtype'] = 'yesno';
$modversion['config'][17]['valuetype'] = 'int';
$modversion['config'][17]['default'] = 1;

$modversion['config'][18]['name'] = 'picture_width';
$modversion['config'][18]['title'] = '_MI_PICTURE_WIDTH';
$modversion['config'][18]['description'] = '';
$modversion['config'][18]['formtype'] = 'textbox';
$modversion['config'][18]['valuetype'] = 'int';
$modversion['config'][18]['default'] = 400;

$modversion['config'][19]['name'] = 'max_upl_size';
$modversion['config'][19]['title'] = '_MI_MAX_UPL_SIZE';
$modversion['config'][19]['description'] = '';
$modversion['config'][19]['formtype'] = 'textbox';
$modversion['config'][19]['valuetype'] = 'int';
$modversion['config'][19]['default'] = 1024;

$modversion['config'][20]['name'] = 'max_upl_width_height';
$modversion['config'][20]['title'] = '_MI_MAX_UPL_WIDTH';
$modversion['config'][20]['description'] = '';
$modversion['config'][20]['formtype'] = 'textbox';
$modversion['config'][20]['valuetype'] = 'int';
$modversion['config'][20]['default'] = 2048;

$modversion['config'][21]['name'] = 'allow_private_albums';
$modversion['config'][21]['title'] = '_MI_ALLOW_PRIVATE';
$modversion['config'][21]['description'] = '';
$modversion['config'][21]['formtype'] = 'yesno';
$modversion['config'][21]['valuetype'] = 'int';
$modversion['config'][21]['default'] = 1;

$modversion['config'][22]['name'] = 'user_field1_name';
$modversion['config'][22]['title'] = '_MI_UF_NAME1';
$modversion['config'][22]['description'] = '';
$modversion['config'][22]['formtype'] = 'textbox';
$modversion['config'][22]['valuetype'] = 'text';
$modversion['config'][22]['default'] = '';

$modversion['config'][23]['name'] = 'user_field2_name';
$modversion['config'][23]['title'] = '_MI_UF_NAME4';
$modversion['config'][23]['description'] = '';
$modversion['config'][23]['formtype'] = 'textbox';
$modversion['config'][23]['valuetype'] = 'text';
$modversion['config'][23]['default'] = '';

$modversion['config'][24]['name'] = 'user_field3_name';
$modversion['config'][24]['title'] = '_MI_UF_NAME3';
$modversion['config'][24]['description'] = '';
$modversion['config'][24]['formtype'] = 'textbox';
$modversion['config'][24]['valuetype'] = 'text';
$modversion['config'][24]['default'] = '';

$modversion['config'][25]['name'] = 'user_field4_name';
$modversion['config'][25]['title'] = '_MI_UF_NAME4';
$modversion['config'][25]['description'] = '';
$modversion['config'][25]['formtype'] = 'textbox';
$modversion['config'][25]['valuetype'] = 'text';
$modversion['config'][25]['default'] = '';

$modversion['config'][26]['name'] = 'forbidden_fname_char';
$modversion['config'][26]['title'] = '_MI_FORB_FNAME';
$modversion['config'][26]['description'] = '';
$modversion['config'][26]['formtype'] = 'textbox';
$modversion['config'][26]['valuetype'] = 'text';
$modversion['config'][26]['default'] = "$/\:*?\"'<>|`";

$modversion['config'][27]['name'] = 'allowed_file_extensions';
$modversion['config'][27]['title'] = '_MI_FILE_EXT';
$modversion['config'][27]['description'] = '';
$modversion['config'][27]['formtype'] = 'textbox';
$modversion['config'][27]['valuetype'] = 'text';
$modversion['config'][27]['default'] = 'GIF/PNG/JPG/JPEG/TIF/TIFF/AVI/MP3';

$modversion['config'][28]['name'] = 'thumb_method';
$modversion['config'][28]['title'] = '_MI_THUMB_METHOD';
$modversion['config'][28]['description'] = '';
$modversion['config'][28]['formtype'] = 'select';
$modversion['config'][28]['valuetype'] = 'text';
$modversion['config'][28]['default'] = 'gd2';
$modversion['config'][28]['options'] = array( 'Image Magick' => 'im', 'Netpbm' => 'net', 'GD version 1.x' => 'gd1', 'GD version 2.x' => 'gd2');

$modversion['config'][29]['name'] = 'impath';
$modversion['config'][29]['title'] = '_MI_IMPATH';
$modversion['config'][29]['description'] = '';
$modversion['config'][29]['formtype'] = 'textbox';
$modversion['config'][29]['valuetype'] = 'text';
$modversion['config'][29]['default'] = '';

$modversion['config'][30]['name'] = 'allowed_img_types';
$modversion['config'][30]['title'] = '_MI_ALLOW_IMG_TYPES';
$modversion['config'][30]['description'] = '';
$modversion['config'][30]['formtype'] = 'textbox';
$modversion['config'][30]['valuetype'] = 'text';
$modversion['config'][30]['default'] = 'JPG/GIF/PNG/TIFF';

$modversion['config'][31]['name'] = 'im_options';
$modversion['config'][31]['title'] = '_MI_IM_OPTIONS';
$modversion['config'][31]['description'] = '';
$modversion['config'][31]['formtype'] = 'textbox';
$modversion['config'][31]['valuetype'] = 'text';
$modversion['config'][31]['default'] = '-antialias';

$modversion['config'][32]['name'] = 'read_exif_data';
$modversion['config'][32]['title'] = '_MI_READ_EXIF';
$modversion['config'][32]['description'] = '';
$modversion['config'][32]['formtype'] = 'yesno';
$modversion['config'][32]['valuetype'] = 'int';
$modversion['config'][32]['default'] = 0;

$modversion['config'][33]['name'] = 'fullpath';
$modversion['config'][33]['title'] = '_MI_FULLPATH';
$modversion['config'][33]['description'] = '';
$modversion['config'][33]['formtype'] = 'textbox';
$modversion['config'][33]['valuetype'] = 'text';
$modversion['config'][33]['default'] = 'albums/';

$modversion['config'][34]['name'] = 'userpics';
$modversion['config'][34]['title'] = '_MI_USERPICS';
$modversion['config'][34]['description'] = '';
$modversion['config'][34]['formtype'] = 'textbox';
$modversion['config'][34]['valuetype'] = 'text';
$modversion['config'][34]['default'] = 'userpics/';

$modversion['config'][35]['name'] = 'normal_pfx';
$modversion['config'][35]['title'] = '_MI_NORMAL_PFX';
$modversion['config'][35]['description'] = '';
$modversion['config'][35]['formtype'] = 'textbox';
$modversion['config'][35]['valuetype'] = 'text';
$modversion['config'][35]['default'] = 'normal_';

$modversion['config'][36]['name'] = 'thumb_pfx';
$modversion['config'][36]['title'] = '_MI_THUMB_PFX';
$modversion['config'][36]['description'] = '';
$modversion['config'][36]['formtype'] = 'textbox';
$modversion['config'][36]['valuetype'] = 'text';
$modversion['config'][36]['default'] = 'thumb_';

$modversion['config'][37]['name'] = 'default_dir_mode';
$modversion['config'][37]['title'] = '_MI_DIR_MODE';
$modversion['config'][37]['description'] = '';
$modversion['config'][37]['formtype'] = 'textbox';
$modversion['config'][37]['valuetype'] = 'text';
$modversion['config'][37]['default'] = '0755';

$modversion['config'][38]['name'] = 'default_file_mode';
$modversion['config'][38]['title'] = '_MI_PIC_MODE';
$modversion['config'][38]['description'] = '';
$modversion['config'][38]['formtype'] = 'textbox';
$modversion['config'][38]['valuetype'] = 'text';
$modversion['config'][38]['default'] = '0644';

$modversion['config'][39]['name'] = 'cookie_name';
$modversion['config'][39]['title'] = '_MI_COOKIE_NAME';
$modversion['config'][39]['description'] = '';
$modversion['config'][39]['formtype'] = 'textbox';
$modversion['config'][39]['valuetype'] = 'text';
$modversion['config'][39]['default'] = 'xcgal';

$modversion['config'][40]['name'] = 'cookie_path';
$modversion['config'][40]['title'] = '_MI_COOKIE_PATH';
$modversion['config'][40]['description'] = '';
$modversion['config'][40]['formtype'] = 'textbox';
$modversion['config'][40]['valuetype'] = 'text';
$modversion['config'][40]['default'] = '/';

$modversion['config'][41]['name'] = 'debug_mode';
$modversion['config'][41]['title'] = '_MI_DEBUG_MODE';
$modversion['config'][41]['description'] = '';
$modversion['config'][41]['formtype'] = 'yesno';
$modversion['config'][41]['valuetype'] = 'int';
$modversion['config'][41]['default'] = 0;

$modversion['config'][42]['name'] = 'ecards_more_pic_target';
$modversion['config'][42]['title'] = '_MI_ECRAD_SEE_MORE';
$modversion['config'][42]['description'] = '';
$modversion['config'][42]['formtype'] = 'textbox';
$modversion['config'][42]['valuetype'] = 'text';
$modversion['config'][42]['default'] = XOOPS_URL;

$modversion['config'][43]['name'] = 'ecards_type';
$modversion['config'][43]['title'] = '_MI_ECRAD_TYPE';
$modversion['config'][43]['description'] = '';
$modversion['config'][43]['formtype'] = 'select';
$modversion['config'][43]['valuetype'] = 'int';
$modversion['config'][43]['default'] = 1;
$modversion['config'][43]['options'] = array('_MI_TEXT_CARD' => 1, '_MI_HTML_CARD' => 2);

$modversion['config'][44]['name'] = 'ecards_per_hour';
$modversion['config'][44]['title'] = '_MI_ECRAD_PER_HOUR';
$modversion['config'][44]['description'] = '';
$modversion['config'][44]['formtype'] = 'textbox';
$modversion['config'][44]['valuetype'] = 'int';
$modversion['config'][44]['default'] = 5;

$modversion['config'][45]['name'] = 'ecards_saved_db';
$modversion['config'][45]['title'] = '_MI_ECRAD_SAVE';
$modversion['config'][45]['description'] = '';
$modversion['config'][45]['formtype'] = 'textbox';
$modversion['config'][45]['valuetype'] = 'int';
$modversion['config'][45]['default'] = 15;

$modversion['config'][46]['name'] = 'ecards_text';
$modversion['config'][46]['title'] = '_MI_ECRAD_TEXT';
$modversion['config'][46]['description'] = '_MI_ECRAD_TEXTDESC';
$modversion['config'][46]['formtype'] = 'textarea';
$modversion['config'][46]['valuetype'] = 'text';
$modversion['config'][46]['default'] = _MI_ECRAD_TEXT_VALUE;

$modversion['config'][47]['name'] = 'keep_votes_time';
$modversion['config'][47]['title'] = '_MI_KEEP_VOTES';
$modversion['config'][47]['description'] = '';
$modversion['config'][47]['formtype'] = 'textbox';
$modversion['config'][47]['valuetype'] = 'int';
$modversion['config'][47]['default'] = 30;

$modversion['config'][48]['name'] = 'search_thumb';
$modversion['config'][48]['title'] = '_MI_SEARCH_THUMB';
$modversion['config'][48]['description'] = '';
$modversion['config'][48]['formtype'] = 'yesno';
$modversion['config'][48]['valuetype'] = 'int';
$modversion['config'][48]['default'] = 0;

$modversion['config'][49]['name'] = 'watermarking';
$modversion['config'][49]['title'] = '_MI_WATERMARKING';
$modversion['config'][49]['description'] = '_MI_WATERMARK_TEXTDESC';
$modversion['config'][49]['formtype'] = 'yesno';
$modversion['config'][49]['valuetype'] = 'int';
$modversion['config'][49]['default'] = 0;

$modversion['config'][50]['name'] = 'batch_all';
$modversion['config'][50]['title'] = '_MI_BATCHSHOWALL';
$modversion['config'][50]['description'] = '_MI_BATCHSHOWALLDESC';
$modversion['config'][50]['formtype'] = 'yesno';
$modversion['config'][50]['valuetype'] = 'int';
$modversion['config'][50]['default'] = 1;
?>