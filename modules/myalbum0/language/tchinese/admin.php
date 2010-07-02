<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_AM_LOADED' ) ) {




// Appended by Xoops Language Checker -GIJOE- in 2004-05-17 18:42:55
define('_AM_TH_DATE','Last update');
define('_AM_TH_BATCHUPDATE','Update checked photos collectively');
define('_AM_OPT_NOCHANGE','- NO CHANGE -');
define('_AM_JS_UPDATECONFIRM','The checked items will be updated. OK?');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-05 15:14:38
define('_AM_H3_FMT_CATEGORIES','Categories Manager (%s)');
define('_AM_CAT_TH_TITLE','Name');
define('_AM_CAT_TH_PHOTOS','Images');
define('_AM_CAT_TH_OPERATION','Operation');
define('_AM_CAT_TH_IMAGE','Banner');
define('_AM_CAT_TH_PARENT','Parent');
define('_AM_CAT_TH_IMGURL','URL of Banner');
define('_AM_CAT_MENU_NEW','Creating a category');
define('_AM_CAT_MENU_EDIT','Editing a category');
define('_AM_CAT_INSERTED','A category is added');
define('_AM_CAT_UPDATED','The category is modified');
define('_AM_CAT_BTN_BATCH','Apply');
define('_AM_CAT_LINK_MAKETOPCAT','Create a new category on top');
define('_AM_CAT_LINK_ADDPHOTOS','Add a image into this category');
define('_AM_CAT_LINK_EDIT','Edit this category');
define('_AM_CAT_LINK_MAKESUBCAT','Create a new category under this category');
define('_AM_CAT_FMT_NEEDADMISSION','%s images are needed the admission');
define('_AM_CAT_FMT_CATDELCONFIRM','%s will be deleted with its sub-categories, images, comments. Are you OK?');
define('_AM_H3_FMT_ADMISSION','Admitting images (%s)');
define('_AM_H3_FMT_PHOTOMANAGER','Photo Manager (%s)');
define('_AM_H3_FMT_IMPORTTO','Importing images from another modules to %s');
define('_AM_H3_FMT_EXPORTTO','Exporting images from %s to another modules');
define('_AM_FMT_EXPORTTOIMAGEMANAGER','Exporting to image manager in XOOPS');
define('_AM_FMT_EXPORTIMSRCCAT','Source');
define('_AM_FMT_EXPORTIMDSTCAT','Destination');
define('_AM_CB_EXPORTRECURSIVELY','with images in its subcategories');
define('_AM_CB_EXPORTTHUMB','Export thumbnails instead of main images');
define('_AM_MB_EXPORTCONFIRM','Do export. OK?');
define('_AM_FMT_EXPORTSUCCESS','You have exported %s images');

// Appended by Xoops Language Checker -GIJOE- in 2004-04-07 15:04:25
define('_AM_ALBM_IMPORT','Importing images from another modules');
define('_AM_FMT_IMPORTTO','Import into %s ');
define('_AM_FMT_IMPORTFROMMYALBUMP','Importing from "%s" as module type of myAlbum-P');
define('_AM_FMT_IMPORTFROMIMAGEMANAGER','Importing from image manager in XOOPS');
define('_AM_CB_IMPORTRECURSIVELY','Importing sub-categories recursively');
define('_AM_RADIO_IMPORTCOPY','Copy images (comments will not be copied');
define('_AM_RADIO_IMPORTMOVE','Move images (comments will be succeeded)');
define('_AM_MB_IMPORTCONFIRM','Do import ?');
define('_AM_FMT_IMPORTSUCCESS','You have imported %s images');

define( 'MYALBUM_AM_LOADED' , 1 ) ;

// Module Checker
define( "_AM_H3_FMT_MODULECHECKER" , "myAlbum-P �t�δ��խ�" ) ;

define( "_AM_H4_ENVIRONMENT" , "�ϥ����Ҵ���" ) ;
define( "_AM_MB_PHPDIRECTIVE" , "PHP ���O" ) ;
define( "_AM_MB_BOTHOK" , "both ok" ) ;
define( "_AM_MB_NEEDON" , "need on" ) ;

define( "_AM_H4_TABLE" , "�ۤ���ƪ��˵�" ) ;
define( "_AM_MB_PHOTOSTABLE" , "�ۤ���ƪ�" ) ;
define( "_AM_MB_DESCRIPTIONTABLE" , "�y�z��ƪ�" ) ;
define( "_AM_MB_CATEGORIESTABLE" , "���O��ƪ�" ) ;
define( "_AM_MB_VOTEDATATABLE" , "���׸�ƪ�" ) ;
define( "_AM_MB_COMMENTSTABLE" , "������ƪ�" ) ;
define( "_AM_MB_NUMBEROFPHOTOS" , "�ۤ�����" ) ;
define( "_AM_MB_NUMBEROFDESCRIPTIONS" , "�y�z����" ) ;
define( "_AM_MB_NUMBEROFCATEGORIES" , "���O����" ) ;
define( "_AM_MB_NUMBEROFVOTEDATA" , "���׵���" ) ;
define( "_AM_MB_NUMBEROFCOMMENTS" , "��������" ) ;

define( "_AM_H4_CONFIG" , "�~���Y�ϵ{������" ) ;
define( "_AM_MB_PIPEFORIMAGES" , "�v���ǿ�޹D" ) ;
define( "_AM_MB_DIRECTORYFORPHOTOS" , "�ۤ��ؿ����|" ) ;
define( "_AM_MB_DIRECTORYFORTHUMBS" , "�Y�ϥؿ����|" ) ;
define( "_AM_ERR_LASTCHAR" , "���~�G�]�w���~�A���|���i��'/'����" ) ;
define( "_AM_ERR_FIRSTCHAR" , "���~�G�]�w���~�A���|�n��'/'�}�Y" ) ;
define( "_AM_ERR_PERMISSION" , "���~�G�����إߨó]�w ftp �ؿ��s���v���� 777." ) ;
define( "_AM_ERR_NOTDIRECTORY" , "���~�G�o�ä��O�ؿ�." ) ;
define( "_AM_ERR_READORWRITE" , "���~�G�ؿ��s���v��������s��. �ж}��ؿ��v���� 777." ) ;
define( "_AM_ERR_SAMEDIR" , "���~�G�ۤ����|�P�Y�ϸ��|���i�H�P�W" ) ;
define( "_AM_LNK_CHECKGD2" , "�˴����a��PHP���Y�ϵ{�� 'GD2' �b�����ҤU�O�_�i�H���T����" ) ;
define( "_AM_MB_CHECKGD2" , "���p�s��������ܤ����T�A�z���ө��ϥ� GD2 �Y�ϵ{���� truecolor �Ҧ�." ) ;
define( "_AM_MB_GD2SUCCESS" , "���\�I<br />�b�����ҤU�A�]�\�z�i�H�ϥ� GD2 �Y�ϵ{���]truecolor�^." ) ;

define( "_AM_H4_PHOTOLINK" , "�ۤ� & �Y�ϳs������" ) ;
define( "_AM_MB_NOWCHECKING" , "�{�b�A���դ�..." ) ;
define( "_AM_FMT_PHOTONOTREADABLE" , "�D�ۤ��� (%s) �L�kŪ��." ) ;
define( "_AM_FMT_THUMBNOTREADABLE" , "�Y�Ϭۤ��� (%s) �L�kŪ��." ) ;
define( "_AM_FMT_NUMBEROFDEADPHOTOS" , "�o�{ %s �L�Ĭۤ��ɼv." ) ;
define( "_AM_FMT_NUMBEROFDEADTHUMBS" , "%s �Y�ϻݭn�A������." ) ;
define( "_AM_FMT_NUMBEROFREMOVEDTMPS" , "%s garbage files have been removed." ) ;
define( "_AM_LINK_REDOTHUMBS" , "�����Y��" ) ;
define( "_AM_LINK_TABLEMAINTENANCE" , "��ƪ���@" ) ;

// Redo Thumbnail
define( "_AM_H3_FMT_RECORDMAINTENANCE" , "myAlbum-P �ۤ����@�@�~" ) ;

define( "_AM_FMT_CHECKING" , "  %s  �Y���˴��i�椤..." ) ;

define( "_AM_FORM_RECORDMAINTENANCE" , "�ۤ����@�@�~�]�A�Y�ϭ��ا@�~��." ) ;

define( "_AM_MB_FAILEDREADING" , "Ū������." ) ;
define( "_AM_MB_CREATEDTHUMBS" , "�Y�Ϥw�إ�." ) ;
define( "_AM_MB_BIGTHUMBS" , "�Y�ϫإߥ���." ) ;
define( "_AM_MB_SKIPPED" , "�]�Y�Ϥw�g�s�b�^���L..." ) ;
define( "_AM_MB_SIZEREPAIRED" , "(�ץ��ӵ��O���j�p.)" ) ;
define( "_AM_MB_RECREMOVED" , "�ӵ��O���w�g����." ) ;
define( "_AM_MB_PHOTONOTEXISTS" , "�D�ۤ��ä��s�b." ) ;
define( "_AM_MB_PHOTORESIZED" , "�D�ۤ��w�g���]�j�p." ) ;

define( "_AM_TEXT_RECORDFORSTARTING" , "�Y�Ͻs���}�l��" ) ;
define( "_AM_TEXT_NUMBERATATIME" , "�C�����歫���Y�Ϫ�����" ) ;
define( "_AM_LABEL_DESCNUMBERATATIME" , "�`�N�G�@�����歫���Y�ϵ��ƹL�h�A�i��ɭP���A���s���O�ɦӥ��ѡA�Фp�ߡI" ) ;

define( "_AM_RADIO_FORCEREDO" , "�j����Y�ϡ]�Y���Y�Ϥw�g�s�b�^" ) ;
define( "_AM_RADIO_REMOVEREC" , "�����L�k�s���Y�Ϫ��ۤ��O��" ) ;
define( "_AM_RADIO_RESIZE" , "�N�L�j�ؤo���ۤ��̾ڹq�l��ï�ҳ]�w�����e����A���]�j�p�ؤo" ) ;

define( "_AM_MB_FINISHED" , "����" ) ;
define( "_AM_LINK_RESTART" , "���m" ) ;
define( "_AM_SUBMIT_NEXT" , "����" ) ;

// Batch Register
define( "_AM_H3_FMT_BATCHREGISTER" , "myAlbum-P �ۤ��妸�W�ǧ@�~" ) ;


?><?php
// Appended by Xoops Language Checker -GIJOE- in 2003-12-03 15:27:10
define('_ALBM_INDEX_BLOCKSADMIN','myAlbum-P blocks admin');
?><?php
// Appended by Xoops Language Checker -GIJOE- in 2004-01-27 15:37:03
define('_AM_TH_SUBMITTER','Submitter');
define('_AM_TH_TITLE','Title');
define('_AM_TH_DESCRIPTION','Description');
define('_AM_TH_CATEGORIES','Category');
define('_AM_ALBM_GROUPPERM_GLOBAL','Global Permissions');
define('_AM_ALBM_GROUPPERM_GLOBALDESC','Configure group\'s priviledges about whole of this module');
define('_AM_ALBM_GPERMUPDATED','Permissions have been changed successfully');

}

?>
