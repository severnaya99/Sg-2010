<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MB_LOADED' ) ) {



// Appended by Xoops Language Checker -GIJOE- in 2004-10-04 16:06:32
define('_ALBM_LIDASC','Record Number (Bigger is latter)');
define('_ALBM_LIDDESC','Record Number (Smaller is latter)');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-17 18:42:55
define('_ALBM_BTN_SELECTALL','Select All');
define('_ALBM_BTN_SELECTNONE','Select None');
define('_ALBM_BTN_SELECTRVS','Select Reverse');
define('_ALBM_FMT_PHOTONUM','%s every a page');
define('_ALBM_AM_BUTTON_UPDATE','Modify');
define('_ALBM_NOIMAGESPECIFIED','Error: No photo is uploaded');
define('_ALBM_FILEREADERROR','Error: Photos are not readable.');
define('_ALBM_DIRECTCATSEL','SELECT A CATEGORY');

define( 'MYALBUM_MB_LOADED' , 1 ) ;

//%%%%%%		Module Name 'MyAlbum-P'		%%%%%

// New in MyAlbum-p

// only "Y/m/d" , "d M Y" , "M d Y" can be interpreted
define( "_ALBM_DTFMT_YMDHI" , "d M Y H:i" ) ;

define( "_ALBM_NEXT_BUTTON" , "下一步" ) ;
define( "_ALBM_REDOLOOPDONE" , "重建縮圖完成" ) ;

define( "_ALBM_AM_ADMISSION" , "審核相片" ) ;
define( "_ALBM_AM_ADMITTING" , "已審核相片" ) ;
define( "_ALBM_AM_LABEL_ADMIT" , "審核你所選取的相片" ) ;
define( "_ALBM_AM_BUTTON_ADMIT" , "審核" ) ;
define( "_ALBM_AM_BUTTON_EXTRACT" , "選取" ) ;

define( "_ALBM_AM_PHOTOMANAGER" , "相片管理系統" ) ;
define( "_ALBM_AM_PHOTONAVINFO" , "相片編號 %s-%s (總共有 %s 張相片)" ) ;
define( "_ALBM_AM_LABEL_REMOVE" , "刪除您所勾選的相片-->" ) ;
define( "_ALBM_AM_BUTTON_REMOVE" , "刪除" ) ;
define( "_ALBM_AM_JS_REMOVECONFIRM" , "確定要刪除嗎?" ) ;
define( "_ALBM_AM_LABEL_MOVE" , "將您所勾選的相片變更分類移轉到：" ) ;
define( "_ALBM_AM_BUTTON_MOVE" , "移轉" ) ;
define( "_ALBM_AM_DEADLINKMAINPHOTO" , "主圖檔並不存在" ) ;

define( "_ALBM_RADIO_ROTATETITLE" , "旋轉圖片" ) ;
define( "_ALBM_RADIO_ROTATE0" , "不旋轉" ) ;
define( "_ALBM_RADIO_ROTATE90" , "向右轉" ) ;
define( "_ALBM_RADIO_ROTATE180" , "旋轉180度" ) ;
define( "_ALBM_RADIO_ROTATE270" , "向左轉" ) ;


// New MyAlbum 1.0.1 (and 1.2.0)
define("_ALBM_MOREPHOTOS","從%s上傳更多相片");
define("_ALBM_REDOTHUMBS","重建縮圖 (<a href='redothumbs.php'>重來</a>)");
define("_ALBM_REDOTHUMBS2","重建縮圖");
define("_ALBM_REDOTHUMBSINFO","注意：一次執行重建縮圖筆數過多，可能導致伺服器連結逾時而失敗，請小心！");
define("_ALBM_REDOTHUMBSNUMBER","每次執行重建縮圖的筆數");
define("_ALBM_REDOING","重建縮圖中：");
define("_ALBM_BACK","返回上一步");
define("_ALBM_ADDPHOTO","新增相片");

// New MyAlbum 1.0.0
define("_ALBM_PHOTOBATCHUPLOAD","登錄已上傳到伺服器中的照片");
define("_ALBM_PHOTOUPLOAD","上傳相片");
define("_ALBM_PHOTOEDITUPLOAD","編修相片並重新上傳");
define("_ALBM_MAXPIXEL","最大尺寸 (單位:pixel)");
define("_ALBM_MAXSIZE","最大檔案大小");
define("_ALBM_PHOTOTITLE","主題");
define("_ALBM_PHOTOPATH","路徑");
define("_ALBM_TEXT_DIRECTORY","目錄");
define("_ALBM_DESC_PHOTOPATH","請輸入要登錄的相片其所在伺服器的完整路徑（絕對路徑）");
define("_ALBM_MES_INVALIDDIRECTORY","指定的目錄是無效的.");
define("_ALBM_MES_BATCHDONE","%s 張相片已經登錄.");
define("_ALBM_MES_BATCHNONE","在該目錄裡並未發現相片存在.");
define("_ALBM_PHOTODESC","描述");
define("_ALBM_PHOTOCAT","分類");
define("_ALBM_SELECTFILE","選擇相片");
define("_ALBM_FILEERROR","沒有任何相片被上傳（相片尺寸太大？）");

define("_ALBM_BATCHBLANK","將主題留空會直接以原檔案名稱為主題");
define("_ALBM_DELETEPHOTO","刪除相片?");
define("_ALBM_VALIDPHOTO","確認發布");
define("_ALBM_PHOTODEL","刪除相片?");
define("_ALBM_DELETINGPHOTO","相片刪除中，請稍侯...");
define("_ALBM_MOVINGPHOTO","相片移轉變更中，請稍侯...");

define("_ALBM_POSTERC","張貼者：");
define("_ALBM_DATEC","日期: ");
define("_ALBM_EDITNOTALLOWED","抱歉！您無權修改這則評論！");
define("_ALBM_ANONNOTALLOWED","抱歉！訪客不能發表評論。");
define("_ALBM_THANKSFORPOST","感謝您的發表！");
define("_ALBM_DELNOTALLOWED","抱歉！您無權刪除這則評論！");
define("_ALBM_GOBACK","退回上一步");
define("_ALBM_AREYOUSURE","您確定要刪除這則評論及與其相關的回覆評論嗎？");
define("_ALBM_COMMENTSDEL","您選取的評論已經成功的刪除了！");

// End New

define("_ALBM_THANKSFORINFO","感謝您的來函，我們將會儘快回覆！");
define("_ALBM_BACKTOTOP","回到第一張相片");
define("_ALBM_THANKSFORHELP","感謝您協助維持這個目錄的完整性。");
define("_ALBM_FORSECURITY","基於安全理由，系統將暫時記錄您的用戶名和IP位址。");

define("_ALBM_MATCH","符合");
define("_ALBM_ALL","全部");
define("_ALBM_ANY","任何");
define("_ALBM_NAME","名稱");
define("_ALBM_DESCRIPTION","描述");

define("_ALBM_MAIN","回到主畫面");
define("_ALBM_POPULAR","最熱門的");
define("_ALBM_TOPRATED","最高評分的");

define("_ALBM_POPULARITYLTOM","點閱數 (由低至高)");
define("_ALBM_POPULARITYMTOL","點閱數 (由高至低)");
define("_ALBM_TITLEATOZ","主題 (A to Z)");
define("_ALBM_TITLEZTOA","主題 (Z to A)");
define("_ALBM_DATEOLD","日期 (由舊到新)");
define("_ALBM_DATENEW","日期 (由新到舊)");
define("_ALBM_RATINGLTOH","評分 (由低至高)");
define("_ALBM_RATINGHTOL","評分 (由高至低)");

define("_ALBM_NOSHOTS","沒有縮圖");
define("_ALBM_EDITTHISPHOTO","編修這張相片");

define("_ALBM_DESCRIPTIONC","描述：");
define("_ALBM_EMAILC","Email：");
define("_ALBM_CATEGORYC","分類：");
define("_ALBM_SUBCATEGORY","次分類：");
define("_ALBM_LASTUPDATEC","最後更新：");
define("_ALBM_HITSC","點閱數：");
define("_ALBM_RATINGC","評分：");
define("_ALBM_ONEVOTE","1 給予評分");
define("_ALBM_NUMVOTES","%s 給予評分");
define("_ALBM_ONEPOST","1 評論");
define("_ALBM_NUMPOSTS","%s 評論");
define("_ALBM_COMMENTSC","評論：");
define("_ALBM_RATETHISPHOTO","給予本圖評分");
define("_ALBM_MODIFY","編修");
define("_ALBM_VSCOMMENTS","閱覽/發表評論");

define("_ALBM_THEREARE","目前有 <b>%s</b> 張相片在我們的資料庫中，您可以 ");
define("_ALBM_LATESTLIST","新進相片列表");

define("_ALBM_VOTEAPPRE","感謝您的評分。");
define("_ALBM_THANKURATE","感謝您花費寶貴的時間在%s 為本相片評分。");
define("_ALBM_VOTEONCE","請勿針對同一相片重複評分。");
define("_ALBM_RATINGSCALE","評分標準由1-10，數字愈高代表愈好。");
define("_ALBM_BEOBJECTIVE","請客觀評分，同一相片得到最低及最高分時，評分就沒有意義了。");
define("_ALBM_DONOTVOTE","請不要針對自己所發佈的相片評分。");
define("_ALBM_RATEIT","送出評分");

define("_ALBM_RECEIVED","我們已經收到您上傳的相片，感謝您！");
define("_ALBM_ALLPENDING","所有相片與評論均需經過審核後才會被張貼出來。");

define("_ALBM_RANK","等級");
define("_ALBM_CATEGORY","分類");
define("_ALBM_HITS","點閱數");
define("_ALBM_RATING","評分");
define("_ALBM_VOTE","給予評分");
define("_ALBM_TOP10","%s Top 10"); // %s is a photo category title

define("_ALBM_SORTBY","排序方式：");
define("_ALBM_TITLE","主題");
define("_ALBM_DATE","日期");
define("_ALBM_POPULARITY","熱門的");
define("_ALBM_CURSORTEDBY","相片目前以 %s 排序");
define("_ALBM_FOUNDIN","找到：");
define("_ALBM_PREVIOUS","上一張");
define("_ALBM_NEXT","下一張");
define("_ALBM_NOMATCH","並未發現任何符合查詢條件的結果。");

define("_ALBM_CATEGORIES","分類");

define("_ALBM_SUBMIT","提交");
define("_ALBM_CANCEL","取消");

define("_ALBM_MUSTREGFIRST","對不起！訪客沒有執行本項目的權力。<br>請先註冊或登入！");
define("_ALBM_MUSTADDCATFIRST","對不起！您並未建立任何分類。<br>請先建立分類！");
define("_ALBM_NORATING","尚未選取任何評分。");
define("_ALBM_CANTVOTEOWN","您不能針對自己所發佈的相片評分。<br>所有評分將被記錄和確認。");
define("_ALBM_VOTEONCE2","所有相片只能被評分一次。<br>所有評分將被記錄和確認。");

//%%%%%%	Module Name 'MyAlbum' (Admin)	  %%%%%

define("_ALBM_PHOTOSWAITING","待審相片");
define("_ALBM_PHOTOMANAGER","相片管理/刪除");
define("_ALBM_CATEDIT","新增/修改/刪除 相片分類");
define("_ALBM_CHECKCONFIGS","查核相片模組資料庫");
define("_ALBM_BATCHUPLOAD","相片批次上傳");
define("_ALBM_GENERALSET","電子相簿一般設定");

define("_ALBM_SUBMITTER","張貼者：");
define("_ALBM_DELETE","刪除");
define("_ALBM_MODCAT","修改分類");
define("_ALBM_DBUPDATED","資料庫更新成功！");
define("_ALBM_MODREQDELETED","修改申請已經刪除。");
define("_ALBM_DELETE","刪除");
define("_ALBM_NOSUBMITTED","無新發表相片.");
define("_ALBM_ADDMAIN","新增一個主分類");
define("_ALBM_IMGURL","圖片網址 (選擇性功能/任意高度的圖片，都會被重設為50)：");
define("_ALBM_ADD","新增");
define("_ALBM_ADDSUB","新增一個次分類");
define("_ALBM_IN","在");
define("_ALBM_IMGURLMAIN","圖片網址 (選擇性功能/只有對主目錄有效，任意高度的圖片，都會被重設為50)：");
define("_ALBM_PARENT","上層分類：");
define("_ALBM_SAVE","儲存修改");
define("_ALBM_CATDELETED","分類已刪除。");
define("_ALBM_CATDEL_WARNING","警告！您確定要刪除此分類及包含於其中的相片和評論嗎？");
define("_ALBM_YES","是");
define("_ALBM_NO","否");
define("_ALBM_ERROREXIST","錯誤！您發表的相片已經存在於資料庫中！");
define("_ALBM_ERRORTITLE","錯誤！您必須輸入主題！");
define("_ALBM_ERRORDESC","錯誤！您必須輸入描述！");
define("_ALBM_WEAPPROVED","我們已認可您發佈相片所連結的資料庫。");
define("_ALBM_THANKSSUBMIT","感謝您的發表！");
define("_ALBM_CONFUPDATED","分類新增完成！");
?>
<?php
// Appended by Xoops Language Checker -GIJOE- in 2003-10-21 17:48:33
define('_ALBM_NEWCATADDED','新的分類已經新增成功!');
?><?php
// Appended by Xoops Language Checker -GIJOE- in 2004-01-27 15:37:02
define('_ALBM_NEW','New');
define('_ALBM_UPDATED','Updated');
define('_ALBM_GROUPPERM_GLOBAL','Global Permissions');

}

?>
