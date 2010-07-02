<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_AM_LOADED' ) ) {


// Appended by Xoops Language Checker -GIJOE- in 2007-08-24 18:18:04
define('_MD_A_MYMENU_MYTPLSADMIN','Templates');
define('_MD_A_MYMENU_MYBLOCKSADMIN','Blocks/Permissions');
define('_MD_A_MYMENU_MYPREFERENCES','Preferences');

define( 'MYALBUM_AM_LOADED' , 1 ) ;

// Index (Categories)
define("_AM_H3_FMT_CATEGORIES","分類管理員 (%s)");
define("_AM_CAT_TH_TITLE","分類名稱");
define("_AM_CAT_TH_PHOTOS","相片數");
define("_AM_CAT_TH_OPERATION","編修/新增/刪除");
define("_AM_CAT_TH_IMAGE","橫幅");
define("_AM_CAT_TH_PARENT","上層分類");
define("_AM_CAT_TH_IMGURL","橫幅路徑");
define("_AM_CAT_MENU_NEW","新增分類");
define("_AM_CAT_MENU_EDIT","編修分類");
define("_AM_CAT_INSERTED","一個分類已被新增");
define("_AM_CAT_UPDATED","此分類已被變更");
define("_AM_CAT_BTN_BATCH","套用");
define("_AM_CAT_LINK_MAKETOPCAT","新增主分類");
define("_AM_CAT_LINK_ADDPHOTOS","新增相片到此分類");
define("_AM_CAT_LINK_EDIT","編修此分類");
define("_AM_CAT_LINK_MAKESUBCAT","在此分類下，新增次分類");
define("_AM_CAT_FMT_NEEDADMISSION","%s 相片需要通過審核");
define("_AM_CAT_FMT_CATDELCONFIRM","%s 中的次分類、相片、評論將都會被刪除，您確定嗎？");


// Admission
define("_AM_H3_FMT_ADMISSION","審核上傳相片 (%s)");
define("_AM_TH_SUBMITTER","張貼者");
define("_AM_TH_TITLE","主題");
define("_AM_TH_DESCRIPTION","描述");
define("_AM_TH_CATEGORIES","分類");
define("_AM_TH_DATE","最後更新時間");


// Photo Manager
define("_AM_H3_FMT_PHOTOMANAGER","相片管理員 (%s)");
define("_AM_TH_BATCHUPDATE","更新您所勾選的相片");
define("_AM_OPT_NOCHANGE","- 不更改 -");
define("_AM_JS_UPDATECONFIRM","確定這些檢查的項目將被更新？");


// Module Checker
define("_AM_H3_FMT_MODULECHECKER","myAlbum-P 系統檢查員 (%s)");

define("_AM_H4_ENVIRONMENT","使用環境檢查");
define("_AM_MB_PHPDIRECTIVE","PHP 指令");
define("_AM_MB_BOTHOK","on 或 off 都可以");
define("_AM_MB_NEEDON","必須是 on");


define("_AM_H4_TABLE","資料表檢查");
define("_AM_MB_PHOTOSTABLE","相片資料表");
define("_AM_MB_DESCRIPTIONTABLE","描述資料表");
define("_AM_MB_CATEGORIESTABLE","類別資料表");
define("_AM_MB_VOTEDATATABLE","評分資料表");
define("_AM_MB_COMMENTSTABLE","評論資料表");
define("_AM_MB_NUMBEROFPHOTOS","相片筆數");
define("_AM_MB_NUMBEROFDESCRIPTIONS","描述筆數");
define("_AM_MB_NUMBEROFCATEGORIES","類別筆數");
define("_AM_MB_NUMBEROFVOTEDATA","投票筆數");
define("_AM_MB_NUMBEROFCOMMENTS","評論筆數");


define("_AM_H4_CONFIG","組態檢查");
define("_AM_MB_PIPEFORIMAGES","影像傳輸管道");
define("_AM_MB_DIRECTORYFORPHOTOS","相片目錄路徑");
define("_AM_MB_DIRECTORYFORTHUMBS","縮圖目錄路");
define("_AM_ERR_LASTCHAR","錯誤：設定錯誤，路徑不可用'/'結尾");
define("_AM_ERR_FIRSTCHAR","錯誤：設定錯誤，路徑要用'/'開頭");
define("_AM_ERR_PERMISSION","錯誤：首先建立並設定 ftp 目錄存取權限為 777。");
define("_AM_ERR_NOTDIRECTORY","錯誤：這並不是目錄！");
define("_AM_ERR_READORWRITE","錯誤：目錄存取權限為限制存取。 請開放目錄權限為 777。");
define("_AM_ERR_SAMEDIR","錯誤：相片路徑與縮圖路徑不可以同名");
define("_AM_LNK_CHECKGD2","檢測附帶於 PHP 的縮圖程式 'GD2' 在此環境下是否可以正確執行");
define("_AM_MB_CHECKGD2","假如連結頁面顯示不正確，您應該放棄使用 GD2 縮圖程式的全彩模式。");
define("_AM_MB_GD2SUCCESS","成功！<br />在此環境下，也許您可以使用 GD2 縮圖程式（truecolor）。");


define("_AM_H4_PHOTOLINK","相片 & 縮圖連結檢查");
define("_AM_MB_NOWCHECKING","正在檢查中…");
define("_AM_FMT_PHOTONOTREADABLE","主相片檔 (%s) 無法讀取。");
define("_AM_FMT_THUMBNOTREADABLE","縮圖相片檔 (%s) 無法讀取。");
define("_AM_FMT_NUMBEROFDEADPHOTOS","發現 %s 無效相片檔案。");
define("_AM_FMT_NUMBEROFDEADTHUMBS","%s 縮圖需要再次重建。");
define("_AM_FMT_NUMBEROFREMOVEDTMPS","%s 已經移除無法連結縮圖的相片。");
define("_AM_LINK_REDOTHUMBS","重建縮圖");
define("_AM_LINK_TABLEMAINTENANCE","維護資料表");



// Redo Thumbnail
define("_AM_H3_FMT_RECORDMAINTENANCE","myAlbum-P 相片維護 (%s)");

define("_AM_FMT_CHECKING","正在檢查 %s …");

define("_AM_FORM_RECORDMAINTENANCE","相片維護作業包括縮圖重建作業等。");

define("_AM_MB_FAILEDREADING","讀取失敗。");
define("_AM_MB_CREATEDTHUMBS","縮圖已建立。");
define("_AM_MB_BIGTHUMBS","縮圖建立失敗。");
define("_AM_MB_SKIPPED","略過(縮圖已存在)。");
define("_AM_MB_SIZEREPAIRED","(修正該筆記錄大小。)");
define("_AM_MB_RECREMOVED","該筆記錄已被移除。");
define("_AM_MB_PHOTONOTEXISTS","主相片並不存在。");
define("_AM_MB_PHOTORESIZED","主相片已經重設大小。");

define("_AM_TEXT_RECORDFORSTARTING","縮圖編號開始於");
define("_AM_TEXT_NUMBERATATIME","每次執行重建縮圖的筆數");
define("_AM_LABEL_DESCNUMBERATATIME","注意：一次執行重建縮圖筆數過多，可能導致伺服器連結逾時而失敗。");

define("_AM_RADIO_FORCEREDO","強制重建縮圖，即使縮圖已經存在。");
define("_AM_RADIO_REMOVEREC","移除無法連結縮圖的相片記錄");
define("_AM_RADIO_RESIZE","將過大尺寸的相片依據電子相簿所設定之長寬限制，重設大小尺寸");

define("_AM_MB_FINISHED","完成");
define("_AM_LINK_RESTART","重新開始");
define("_AM_SUBMIT_NEXT","下一個");



// Batch Register
define("_AM_H3_FMT_BATCHREGISTER","myAlbum-P 相片批次上傳作業 (%s)");


// GroupPerm Global
define("_AM_ALBM_GROUPPERM_GLOBAL","全域權限");
define("_AM_ALBM_GROUPPERM_GLOBALDESC","設定整個模組的群組權限");
define("_AM_ALBM_GPERMUPDATED","權限修改成功");


// Import
define("_AM_H3_FMT_IMPORTTO","從其他模組匯入相片到 %s");
define("_AM_FMT_IMPORTFROMMYALBUMP","從 %s 匯入到 myAlbum-P 模組");
define("_AM_FMT_IMPORTFROMIMAGEMANAGER","從 XOOPS 的圖檔管理員匯入相片");
define("_AM_CB_IMPORTRECURSIVELY","匯入時包含次分類");
define("_AM_RADIO_IMPORTCOPY","複製相片 (不會複製評論)");
define("_AM_RADIO_IMPORTMOVE","搬移相片 (且會搬移評論)");
define("_AM_MB_IMPORTCONFIRM","確定要匯入？");
define("_AM_FMT_IMPORTSUCCESS","您已經匯入了 %s 張相片");


// Export
define("_AM_H3_FMT_EXPORTTO","從 %s 匯出相片到其他模組");
define("_AM_FMT_EXPORTTOIMAGEMANAGER","匯出到 XOOPS 的圖檔管理員");
define("_AM_FMT_EXPORTIMSRCCAT","的圖檔");
define("_AM_FMT_EXPORTIMDSTCAT","內");
define("_AM_CB_EXPORTRECURSIVELY","和在次分類下的相片");
define("_AM_CB_EXPORTTHUMB","匯出縮圖代替主相片");
define("_AM_MB_EXPORTCONFIRM","確定要匯出嗎？");
define("_AM_FMT_EXPORTSUCCESS","您已經匯出 %s 張相片");


}

?>