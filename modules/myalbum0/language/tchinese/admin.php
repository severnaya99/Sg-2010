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
define( "_AM_H3_FMT_MODULECHECKER" , "myAlbum-P 系統測試員" ) ;

define( "_AM_H4_ENVIRONMENT" , "使用環境測試" ) ;
define( "_AM_MB_PHPDIRECTIVE" , "PHP 指令" ) ;
define( "_AM_MB_BOTHOK" , "both ok" ) ;
define( "_AM_MB_NEEDON" , "need on" ) ;

define( "_AM_H4_TABLE" , "相片資料表檢視" ) ;
define( "_AM_MB_PHOTOSTABLE" , "相片資料表" ) ;
define( "_AM_MB_DESCRIPTIONTABLE" , "描述資料表" ) ;
define( "_AM_MB_CATEGORIESTABLE" , "類別資料表" ) ;
define( "_AM_MB_VOTEDATATABLE" , "評論資料表" ) ;
define( "_AM_MB_COMMENTSTABLE" , "說明資料表" ) ;
define( "_AM_MB_NUMBEROFPHOTOS" , "相片筆數" ) ;
define( "_AM_MB_NUMBEROFDESCRIPTIONS" , "描述筆數" ) ;
define( "_AM_MB_NUMBEROFCATEGORIES" , "類別筆數" ) ;
define( "_AM_MB_NUMBEROFVOTEDATA" , "評論筆數" ) ;
define( "_AM_MB_NUMBEROFCOMMENTS" , "說明筆數" ) ;

define( "_AM_H4_CONFIG" , "外掛縮圖程式測試" ) ;
define( "_AM_MB_PIPEFORIMAGES" , "影像傳輸管道" ) ;
define( "_AM_MB_DIRECTORYFORPHOTOS" , "相片目錄路徑" ) ;
define( "_AM_MB_DIRECTORYFORTHUMBS" , "縮圖目錄路徑" ) ;
define( "_AM_ERR_LASTCHAR" , "錯誤：設定錯誤，路徑不可用'/'結尾" ) ;
define( "_AM_ERR_FIRSTCHAR" , "錯誤：設定錯誤，路徑要用'/'開頭" ) ;
define( "_AM_ERR_PERMISSION" , "錯誤：首先建立並設定 ftp 目錄存取權限為 777." ) ;
define( "_AM_ERR_NOTDIRECTORY" , "錯誤：這並不是目錄." ) ;
define( "_AM_ERR_READORWRITE" , "錯誤：目錄存取權限為限制存取. 請開放目錄權限為 777." ) ;
define( "_AM_ERR_SAMEDIR" , "錯誤：相片路徑與縮圖路徑不可以同名" ) ;
define( "_AM_LNK_CHECKGD2" , "檢測附帶於PHP的縮圖程式 'GD2' 在此環境下是否可以正確執行" ) ;
define( "_AM_MB_CHECKGD2" , "假如連結頁面顯示不正確，您應該放棄使用 GD2 縮圖程式的 truecolor 模式." ) ;
define( "_AM_MB_GD2SUCCESS" , "成功！<br />在此環境下，也許您可以使用 GD2 縮圖程式（truecolor）." ) ;

define( "_AM_H4_PHOTOLINK" , "相片 & 縮圖連結測試" ) ;
define( "_AM_MB_NOWCHECKING" , "現在，測試中..." ) ;
define( "_AM_FMT_PHOTONOTREADABLE" , "主相片檔 (%s) 無法讀取." ) ;
define( "_AM_FMT_THUMBNOTREADABLE" , "縮圖相片檔 (%s) 無法讀取." ) ;
define( "_AM_FMT_NUMBEROFDEADPHOTOS" , "發現 %s 無效相片檔影." ) ;
define( "_AM_FMT_NUMBEROFDEADTHUMBS" , "%s 縮圖需要再次重建." ) ;
define( "_AM_FMT_NUMBEROFREMOVEDTMPS" , "%s garbage files have been removed." ) ;
define( "_AM_LINK_REDOTHUMBS" , "重建縮圖" ) ;
define( "_AM_LINK_TABLEMAINTENANCE" , "資料表維護" ) ;

// Redo Thumbnail
define( "_AM_H3_FMT_RECORDMAINTENANCE" , "myAlbum-P 相片維護作業" ) ;

define( "_AM_FMT_CHECKING" , "  %s  縮圖檢測進行中..." ) ;

define( "_AM_FORM_RECORDMAINTENANCE" , "相片維護作業包括縮圖重建作業等." ) ;

define( "_AM_MB_FAILEDREADING" , "讀取失敗." ) ;
define( "_AM_MB_CREATEDTHUMBS" , "縮圖已建立." ) ;
define( "_AM_MB_BIGTHUMBS" , "縮圖建立失敗." ) ;
define( "_AM_MB_SKIPPED" , "（縮圖已經存在）略過..." ) ;
define( "_AM_MB_SIZEREPAIRED" , "(修正該筆記錄大小.)" ) ;
define( "_AM_MB_RECREMOVED" , "該筆記錄已經移除." ) ;
define( "_AM_MB_PHOTONOTEXISTS" , "主相片並不存在." ) ;
define( "_AM_MB_PHOTORESIZED" , "主相片已經重設大小." ) ;

define( "_AM_TEXT_RECORDFORSTARTING" , "縮圖編號開始於" ) ;
define( "_AM_TEXT_NUMBERATATIME" , "每次執行重建縮圖的筆數" ) ;
define( "_AM_LABEL_DESCNUMBERATATIME" , "注意：一次執行重建縮圖筆數過多，可能導致伺服器連結逾時而失敗，請小心！" ) ;

define( "_AM_RADIO_FORCEREDO" , "強制重建縮圖（即使縮圖已經存在）" ) ;
define( "_AM_RADIO_REMOVEREC" , "移除無法連結縮圖的相片記錄" ) ;
define( "_AM_RADIO_RESIZE" , "將過大尺寸的相片依據電子相簿所設定之長寬限制，重設大小尺寸" ) ;

define( "_AM_MB_FINISHED" , "完成" ) ;
define( "_AM_LINK_RESTART" , "重置" ) ;
define( "_AM_SUBMIT_NEXT" , "執行" ) ;

// Batch Register
define( "_AM_H3_FMT_BATCHREGISTER" , "myAlbum-P 相片批次上傳作業" ) ;


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
