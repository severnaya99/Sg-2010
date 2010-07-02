<?php
// $Id: main.php,v 1.2 2006/01/04 09:58:26 ohwada Exp $

// 2004/03/27 K.OHWADA
// add submit modify

// 2004/01/29 herve 
// multi language
//   add _WFS_ERROR_IMAGE

// 2003/11/21 K.OHWADA
// view and edit for pure html file
//   add _WFS_DISBR, _WFS_ENAAMP
// article.php
//  _WFS_ARTCLE_MORE

//%%%%%%
define("_WFS_PRINTER","列印本頁");
define("_WFS_COMMENTS","有話要說?");
define("_WFS_PREVPAGE","上一頁");
define("_WFS_NEXTPAGE","下一頁");
//define("_WFS_RETURNTOP","<< 回到最前");

//%%%%%%

define("_WFS_TOP","目錄");
define("_WFS_POSTERC","發表者:");
define("_WFS_DATEC","日期:");
define("_WFS_EDITNOTALLOWED","你不可以編輯此評論!");
define("_WFS_ANONNOTALLOWED","非註冊會員不可以發表.");
define("_WFS_THANKSFORPOST","謝謝您提供的文章!"); //submission of news comments
define("_WFS_DELNOTALLOWED","你不可以刪除此評論!");
define("_WFS_AREUSUREDEL","你確定要刪除這個評論及他之下其餘的回覆嗎?");
define("_WFS_YES","是");
define("_WFS_NO","否");
define("_PL_COMMENTSDEL","評論已經刪除!");

//%%%%%%

define("_WFS_TITLE","標題");
define("_WFS_CATEGORY","類別");
define("_WFS_HTMLISFINE","可使用HTML, 但是要再確認一下URL和HTML的標籤!");
define("_WFS_ALLOWEDHTML","可用HTML:");
define("_WFS_DISABLESMILEY","不可用表情圖");
define("_WFS_DISABLEHTML","不可用HTML");
define("_WFS_POST","發表");
define("_WFS_PREVIEW","預覽");
define("_WFS_GO","送出");

//%%%%%%
define("_WFS_ARTICLES","文章");
define("_WFS_VIEWS","讀過 %s 次 "); //********* Updated ************
define("_WFS_DATE","日期: "); //********* Updated ************
define("_WFS_WRITTEN","作者: "); //********* Updated ************
define("_WFS_PRINTERFRIENDLY","列印本頁");

define("_WFS_TOPICC","類別:");
define("_WFS_URL","URL:");
define("_WFS_NOSTORY","選擇的文章不存在.");
define("_WFS_RETURN2INDEX","返回主索引");
define("_WFS_BACK2CAT","返回類別");
define("_WFS_BACK2","返回");
//%%%%%%	File Name print.php 	%%%%%

define("_WFS_URLFORSTORY","本文章的URL:");

// %s represents your site name
define("_WFS_THISCOMESFROM","本文章來自於 %s");

/////// wfsection
define("_WFS_CATEGORYS","類別");
define("_WFS_POSTS","文章");
define("_WFS_PUBLISHED","最新文章");
define("_WFS_WELCOME","%s 閱覽室");

define("_WFS_ARTICLE","文章");
define("_WFS_AUTHER","作者: "); //********* Updated ************
define("_WFS_AUTH","作者"); //updated
define("_WFS_CAUTH","<b>作者姓名</b> (空白: 原作者名)"); //updated
define("_WFS_LASTUPDATE","已更新");

// wfsarticle.php

define("_WFS_MAINTEXT"," 文章內容");
//_WFS_ALLOWEDHTML
define("_WFS_DISAMILEY","不使用表情圖");
define("_WFS_DISHTML","不使用HTML");
//_WFS_PREVIEW
define("_WFS_SAVE","儲存");
//_WFS_GO

// themenews.php
define("_WFS_POSTEDBY","由");
define("_WFS_ON","在");
define("_WFS_READS","次");
define("_WFS_FILEUPLOAD","上傳附加檔");
define("_WFS_FILESHOWNAME","附加檔說明");
define("_WFS_ATTACHEDFILES","編輯附加檔");
define("_WFS_NOFILE","本文章中沒有附加檔案.");
define("_WFS_AFTERREGED","不能將檔案附加到空的文章中. <br />請建立新的文章, 儲存後再返回來加上你的檔案.");
define("_WFS_FILES","檔案");
define("_WFS_COMMENTSNUM","評論");
define("_WFS_CATEGORYDESC","說明");
define("_WFS_CATEGORYHEAD","分類頁首文字.<br /><br />這段HTML或文字會在你的類別上面顯示.");
define("_WFS_CATEGORYFOOT","分類頁尾文字.<br /><br />這段HTML或文字會在你的類別下面顯示.");
define("_WFS_FILEID","檔案ID");
define("_WFS_FILEREALNAME","已存入之檔名");
define("_WFS_FILETEXT","搜尋文字");
define("_WFS_ARTICLEID","文章ID");
define("_WFS_EXT","附檔名");
define("_WFS_MINETYPE","Mine種類");
define("_WFS_UPDATEDATE","最後更新");
define("_WFS_DEL","刪除");
define("_WFS_CANCEL","取消");
define("_WFS_IMGADD","增加");
define("_WFS_UPLOAD","上傳");
define("_WFS_LINKURL","URL連結");
define("_WFS_LINKURLNAME","上方URL的虛名");
define("_WFS_SUMMARY","摘要");
define("_WFS_LINK","連結");
define("_WFS_NOTREADFILE","無法讀取此檔案!");
define("_WFS_DOWNLOADNAME","下載時的檔名");
define("_WFS_PAGEBREAK","頁面界線用: [pagebreak]");

//new version 0.9.2
define("_WFS_MAININDEX","主索引");
define("_WFS_NOVIEWPERMISSION","很抱歉! 你沒有觀看這裡的權限.");
define("_WFS_WEBLINK","連結:");
define("_WFS_VOTEAPPRE","感謝您的評分.");
define("_WFS_THANKYOU","謝謝您在%s佔用你的時間"); // %s is your site name
define("_WFS_VOTEFROMYOU","您的評分有利於其他用戶決定檔案下載的可能性.");
define("_WFS_VOTEONCE","請不要對同一件文章再評一次分數.");
define("_WFS_RATINGSCALE","分數介於1至10, 最低為1,最高為10.");
define("_WFS_BEOBJECTIVE","請客觀評分,若每個人都選1或10,那這個參考就沒有用處了.");
define("_WFS_DONOTVOTE","請不要對自己的文章評分.");
define("_WFS_RATEIT","給評分!");
define("_WFS_DESCRIPTIONC","說明: ");
define("_WFS_EMAILC","Email: ");
define("_WFS_CATEGORYC","分類: ");
define("_WFS_LASTUPDATEC","最後更新: ");
define("_WFS_DLNOW","馬上下載!");
define("_WFS_VERSION","版本");
define("_WFS_SUBMITDATE","提供日期");
define("_WFS_DLTIMES","已下載 %s 次");
define("_WFS_FILESIZE","檔案大小");
define("_WFS_SUPPORTEDPLAT","支援平台");
define("_WFS_HOMEPAGE","首頁");
define("_WFS_HITSC","下載數: ");
define("_WFS_RATINGC","評分: ");
define("_WFS_ONEVOTE","1 人給分");
define("_WFS_NUMVOTES","%s 人給分");
define("_WFS_ONEPOST","1 個評論");
define("_WFS_NUMPOSTS","%s 個評論");
define("_WFS_COMMENTSC","評論s: ");
define("_WFS_RATETHISFILE","給此文章評分");
define("_WFS_MODIFY","修改");
define("_WFS_TELLAFRIEND","轉告朋友");
define("_WFS_VSCOMMENTS","看/送出評論");
define("_WFS_EDIT","編輯");
define("_WFS_SUBMIT","送出");
define("_WFS_BYTES","Bytes");
define("_WFS_ALREADYREPORTED","您已送出此文章的錯誤回報.");
define("_WFS_MUSTREGFIRST","抱歉, 你未授權作這個動作.<br>請註冊或先登入本站!");
define("_WFS_NORATING","未選擇分數.");
define("_WFS_CANTVOTEOWN","你不可以對你的文章進行評分.<br>所有評分都已記錄.");
define("_WFS_RANK","排行");
define("_WFS_HITS","人次"); //updated
define("_WFS_RATING","評分");
define("_WFS_VOTE","給分");
define("_WFS_TOP10","%s類別前10名"); // %s is a review category name
define("_WFS_CATEGORIES","類別");
define("_WFS_THANKSFORHELP","謝謝您幫助我們維護目錄的完整性.");
define("_WFS_FORSECURITY","基於安全考量,你的帳號及IP位址也暫時被記錄下來.");
define("_WFS_NUMBYTES","%s bytes");
define("_WFS_TIMES"," 次");
define("_WFS_DOWNLOADS","下載 ");
define("_WFS_FILETYPE","檔案型式: ");
define("_WFS_GROUPPROMPT","下列群組可以進入:");
define("_WFS_REPORTBROKEN","回報錯誤檔案");
define("_WFS_IMGNAME","檔名 (空白: 同已上傳之檔名)");
define("_WFS_POSTNEWARTICLE","提供文章");
define("_WFS_SMILIE","增加表情圖到文章中");
define("_WFS_EXGRAPHIC","增加外部圖片到文章中");
define("_WFS_GRAPHIC","增加用戶端圖片到文章中");
define("_WFS_NOIMG","無圖片");
define("_WFS_ARTIMGUPLOAD","上傳圖片");
define("_WFS_POPULAR","高人氣");
define("_WFS_RATEFILE","大好評");
define("_WFS_COMMENT","評論");
define("_WFS_RATED","評分");
define("_WFS_SUBMIT1","已送出");
define("_WFS_VOTES","人給分");
define("_WFS_SORTBY1","排序條件:");
define("_WFS_TITLE1","標題");
define("_WFS_DATE1","日期");
define("_WFS_ARTICLEID1","文章ID");
define("_WFS_POPULARITY1","人氣指數");
define("_WFS_CURSORTBY1","文章現在排序條件: %s");
define("_WFS_RATING1","評分");
define("_WFS_NOTIFYPUBLISH","當發表後寄出Email通知");
define("_WFS_POPULARITYLTOM","人氣指數 (少到多)");
define("_WFS_POPULARITYMTOL","人氣指數 (多到少)");
define("_WFS_ARTICLEIDLTOM","文章ID (小到大)");
define("_WFS_ARTICLEIDMTOL","文章ID (大到小)");
define("_WFS_TITLEZTOA","標題 (Z到A)");
define("_WFS_TITLEATOZ","標題 (A到Z)");
define("_WFS_DATEOLD","日期 (舊在前)");
define("_WFS_DATENEW","日期 (新在前)");
define("_WFS_RATINGLTOH","評分數 (低到高)");
define("_WFS_RATINGHTOL","評分數 (高到低)");
define("_WFS_SUBMITLTOH","提供 (舊在前)");
define("_WFS_SUBMITHTOL","提供 (新在前)");
define("_WFS_WEIGHT","順序");
define("_WFS_NOTITLE","錯誤: 無標題 - 請返回輸入您文章的標題");
define("_WFS_NOMAINTEXT","錯誤: 無主要內文 - 請返回輸入您文章的內文");
define("_WFS_RATINGA","文章分數: %s");
define("_WFS_HTMLPAGE","HTML檔 </b>(將不理會文字編輯器)");
define("_WFS_DBUPDATED","謝謝你的提供.");
define("_WFS_INTFILEAT","快來 %s 看看文章");
define("_WFS_INTFILEFOUND","我發現在 %s 有篇有用的文章");
define("_WFS_DESCRIPTION","檔案說明");
define("_WFS_ARTICLEADDIT","文章額外資訊");
define("_WFS_ARTICLELINK","文章URL連結");
define("_WFS_MISCSETTINGS","其它文章設定");
define("_WFS_FILEDESCRIPT","檔案說明");
define("_WFS_ATTACHEDFILESTXT","<b>檔案上傳</b><br/><br />列出現在所有文章中有附加檔的文章出來. 你可以按下編輯來編輯每個附加檔.<br /><br />當你編輯已存檔的文章其檔案只可以附加在該文章內.");
define("_WFS_DOWNLOAD","上傳附加檔");
define("_WFS_PUBLISHEDHOME","已發佈");
define("_WFS_ARTSIZE","大小 %s");
define("_WFS_DISCLAIMER","<b>宣告:</b> 本站將不對任何會員的評論負責.");
define("_WFS_ONLYREGISTEREDUSERS","只有註冊會員可以回報錯誤的檔案!");
define("_WFS_THANKSFORINFO","謝謝你的資訊. 我們會儘快處理.");
define("_WFS_FILEPERMISSION","檔案權限");
define("_WFS_DOWNLOADED","下載次數");
define("_WFS_DOWNLOADSIZE","下載時的檔案大小");
define("_WFS_LASTACCESS","上次使用主機");
define("_WFS_LASTUPDATED","最近更新");
define("_WFS_ERRORCHECK","檔案存在嗎?");
define("_AM_FILEATTACHED","檔案有附加到文章嗎?");
define("_WFS_NODESCRIPT","無檔案說明.");
define("_WFS_UPLOADED","已上傳: ");
define("_WFS_FILEMIMETYPE","檔案Mime種類");

// fix by maxding
define("_MI_XFS_SUBMIT","提供文章");
define("_MI_XFS_POPULAR","人氣指數");
define("_MI_XFS_RATEFILE","文章評分");

// add disbr, enaamp
define("_WFS_DISBR","不要改變 New-line 到 br.");
define("_WFS_ENAAMP","改變 &amp; 為 &amp;amp; 在時間的編輯.");

// article.php
define("_WFS_ARTCLE_MORE","有兩則或更多的文章有對應的標題.");

// submit.php
define("_WFS_SUBMIT_FAIL","送出失敗.");
define("_WFS_BUT_SUBMIT_SUCCESS","但是, 此文章已送出");
define("_WFS_SUBMITED_ARTICLE","已送出文章");
define("_WFS_UPLOAD_END","已上傳!");
define("_WFS_UPLOAD_FAIL","上傳失敗");
define("_WFS_UPLOAD_NON","上傳檔案未設定");
define("_WFS_UPLOAD_TOO_BIG","檔案超過允許的大小!\n最大為 %s Bytes.");
define("_WFS_UPLOAD_NOT_ALLOWED_MINE_TYPE","你沒有權限上傳此類型檔案.");

// modify.php
define("_WFS_ARTICLE_BACK","回到文章");
define("_WFS_MODIFY_TITLE","編輯文章");
define("_WFS_MODIFY_END","已更新!");
define("_WFS_MODIFY_FAIL","更新失敗.");
define("_WFS_ACTION","執行");
define("_WFS_DELETE","刪除");
define("_WFS_FILE_DOWNLOADNAME","下載檔案名稱");
define("_WFS_FILE_CHECK","檢查檔案");
define("_WFS_FILE_NOEXIST","並未存在");
define("_WFS_FILE_NOFILE","非合格檔案");
define("_WFS_FILE_MODIFY_END","檔案已更新!");
define("_WFS_FILE_DELETE_COMFROM","警告: 你確定想要刪除這個檔案?");
define("_WFS_FILE_DELETE_END","已刪除!");
define("_WFS_FILE_DELETE_FAIL","刪除錯誤.");

// multi language in index.php
define("_WFS_ERROR_IMAGE","錯誤: 請檢查圖片路徑/檔案");

?>