<?php
// $Id: admin.php,v 1.2 2006/01/04 09:58:26 ohwada Exp $

// 2004/03/27 K.OHWADA
// error message
//   _AM_DIR_NOT_WRITABLE
//   _AM_EDIT_ARTICLE_RETURN
// copy mode
//   _AM_COPY_ARTICLE_EXPLANE
// multi language in reorder.php
//   _AM_CATEGORY_REORDERED
//   _AM_ARTICLE_REORDERED
//   _AM_CATEGORY_REORDER_RETURN

// 2004/02/28 K.OHWADA
// admin menu same as popup menu
//   add _AM_PATH_MANAGEMENT  _AM_LIST_BROKEN
// multi langauge
//   add _AM_DUPLICATE_ARTICLES
// unify a article menu and a title

// 2003/11/21 K.OHWADA
// rename WFsection to XFsection
// add menu: bulk import

// admin menu same as popup menu
define("_AM_PREFERENCE",'系統基本設定');
define("_AM_PATH_MANAGEMENT","路徑管理");
define("_AM_LIST_BROKEN",'列出失效下載');

//%%%%%%        Admin Module Name  Articles         %%%%%
define("_AM_DBUPDATED","資料庫已更新!");
define("_AM_STORYID","ID");
define("_AM_TITLE","標題");
define("_AM_SUMMARY","摘要");
define("_AM_CATEGORY","類別名稱"); //******
define("_AM_CATEGORY2","修改此類別:"); //******
define("_AM_POSTER","作者");
define("_AM_SUBMITTED2","建檔日期");
define("_AM_NOSHOWART2","不顯示");
define("_AM_ACTION","動作");
define("_AM_EDIT","編輯");
define("_AM_DELETE","刪除");
define("_AM_LAST10ARTS","現有文章");
define("_AM_PUBLISHED","登錄日期");
define("_AM_PUBLISHEDON","發行日期"); 
define("_AM_GO","送出");
define("_AM_EDITARTICLE","編輯文章");
define("_AM_POSTNEWARTICLE","編輯文章");
define("_AM_RUSUREDEL","你確定要刪除這篇文章與其評論內容?");
define("_AM_YES","是");
define("_AM_NO","否");
define("_AM_ALLOWEDHTML","可用HTML:");
define("_AM_DISAMILEY","不顯示表情圖");
define("_AM_DISHTML","停用HTML");
define("_AM_PREVIEW","預覽");
define("_AM_SAVE","儲存");
define("_AM_ADD","新增");
define("_AM_SMILIE","增加表情圖到文章中");
define("_AM_EXGRAPHIC","增加額外圖片到文章中");
define("_AM_GRAPHIC","增加用戶端圖片到文章中");
define("_AM_FILESHOWDESCRIPT","上傳檔案說明"); //new
define("_AM_ARTICLEMANAGEMENT","文章管理");
define("_AM_ARTICLEMANAGEMENTLINKS","文章管理連結");
define("_AM_ARTICLEPREVIEW","文章預覽");
define("_AM_ADDMCATEGORY","建立新類別");
define("_AM_CATEGORYNAME","類別名稱");
define("_AM_CATEGORYTAKEMETO","按這裡建立新類別.");
define("_AM_NOCATEGORY","錯誤 - 尚未建立類別.");
define("_AM_MAX40CHAR","(最多: 40 字元)");
define("_AM_CATEGORYIMG","類別圖片");
define("_AM_IMGNAEXLOC","圖片名稱 + 副檔名 放置在 %s");
define("_AM_IN","<b>建立類別</b> <br />(空白: 主分類, 其餘為次分類)");
define("_AM_MOVETO","<b>搬移類別</b> (空白: 不要搬動類別)");
define("_AM_MODIFYCATEGORY","修改類別");
define("_AM_MODIFY","修改");
define("_AM_PARENTCATEGORY","上一層類別");
define("_AM_SAVECHANGE","儲存變更");
define("_AM_DEL","刪除");
define("_AM_CANCEL","取消");
define("_AM_WAYSYWTDTTAL","警告: 你確定要刪除此類別內之所有的文章及評論嗎?");
//new
define("_AM_ARTICLEMANAGEMENT","文章管理");
define("_AM_ARTICLEMANAGEMENTLINKS","文章連結管理");
define("_AM_ARTICLEPREVIEW","預覽文章");
define("_AM_ADDMCATEGORY","Create New Section");
define("_AM_CATEGORYNAME","Section Name");
define("_AM_CATEGORYTAKEMETO","按這裡建立新類別.");
define("_AM_NOCATEGORY","錯誤 - 沒有類別被建立.");
define("_AM_MAX40CHAR","(最大: 40 字元)");
define("_AM_CATEGORYIMG","Section Image");
define("_AM_IMGNAEXLOC","image name + extension located in %s");
define("_AM_IN","<b>Create in Section</b> <br />(Blank: Main Section, else as Sub-Section)");
define("_AM_MOVETO","<b>Move to Section</b> (Blank: Do not move section)");
define("_AM_MODIFYCATEGORY","Modify Section");
define("_AM_MODIFY","Modify");
define("_AM_PARENTCATEGORY","Parent Section");
define("_AM_SAVECHANGE","儲存變更");
define("_AM_DEL","刪除");
define("_AM_CANCEL","取消");
define("_AM_WAYSYWTDTTAL","警告: Are you sure you want to delete this Section and ALL its Stories and Comments?");
// Added in Beta6
define("_AM_CATEGORYSMNGR","類別管理員");
define("_AM_PEARTICLES","建立新文章");
define("_AM_GENERALCONF","一般設定");

// WFSECTION
define("_AM_UPDATEFAIL","更新失敗.");
define("_AM_EDITFILE","編輯附加檔案");
define("_AM_CATEGORYDESC","類別說明文字");
define("_AM_FILESBASEPATH","設定附加檔路徑:");
define("_AM_AGRAPHICPATH","設定給文章用的圖片路徑:");
define("_AM_SGRAPHICPATH","設定給類別用的圖片路徑:");
define("_AM_SMILIECPATH","設定給表情圖的路徑:");
define("_AM_HTMLCPATH","設定給HTML檔的路徑:");
define("_AM_FILEUPLOADSPATH","附加檔案路徑: ");
define("_AM_FILEUPLOADSTEMPPATH","臨時附加檔路徑: ");
define("_AM_ARTICLESFILEPATH","文章圖片路徑: ");
define("_AM_SECTIONFILEPATH","類別圖片路徑: ");
define("_AM_SMILIEFILEPATH","表情圖路徑: ");
define("_AM_HTMLFILEPATH","HTML檔路徑: ");
define("_AM_UPLOADCONFIGFILE","上傳設定檔: ");
define("_AM_ARTICLESAPAGE","每頁顯示文章數目:");
define("_AM_ARTICLESAPAGE2","在引導頁面前每頁顯示文章數目:");
define("_AM_NOIMG","無圖片");
define("_AM_PIDINVALID","上一層類別不正確.");
define("_AM_NOTITLE","標題內無資料.");
define("_AM_FILEDEL","警告: 你確定要刪除這個檔案嗎?");
define("_AM_AFERTSETCATE","在增加類別後你就可以加入文章.");
define("_AM_IMGUPLOAD","上傳類別圖片");
define("_AM_IMGUPLOAD2","目前圖片路徑在 ");
define("_AM_IMGNAME","檔名 (空白: 同原來已傳檔案之檔名)");
define("_AM_UPLOADED","已傳完!");
define("_AM_ISNOTWRITABLE","不能夠寫入!");
define("_AM_UPLOADFAIL","警告: 上傳失敗. 原因:");
define("_AM_NOTALLOWEDMINETYPE","不可上傳非限訂的類型檔案.");
define("_AM_FILETOOBIG","檔案大小大於限訂的範圍!");

define("_AM_CATEGORYMENU","分類索引設定");
define("_AM_ARTICLE2MENU","文章索引設定");
define("_AM_ARTICLEPAGEMENU","文章頁面設定");
define("_AM_BLOCKMENU","區塊設定");
define("_AM_ADMINEDITMENU","一般文章設定");
define("_AM_ADMINCONFIGMENU","管理者設定");

define("_AM_ARTIMGUPLOAD","上傳圖片");
define("_AM_TOPPAGETYPE","顯示連結到文章來取代文章計算?");
define("_AM_SHOWCATPIC","顯示類別圖片在分類索引中?");
define("_AM_WYSIWYG","使用 WYSIWYG 編輯器取代系統預設編輯器?");
define("_AM_SHOWCOMMENTS","在文章頁面顯示用戶評論?");
define("_AM_SUBMITTED","用戶提供文章"); //added
define("_AM_ALLTXT","<h4>文章管理</h4></div><div>利用<b>文章管理</b>你可以編輯,刪除或更改任何文章名稱. 這個模式會顯示在資料庫中的每個文章.<br /><br />"); //added

// WF -> XF
define("_AM_PUBLISHEDTXT","<h4>文章發佈管理</h4></div><div><b>文章發佈管理</b>會顯示出所有已發佈的文章(由管理者核准).<br /><br />這些文章會在索引頁中列出在各分類裡面(包含所有授權群組).<br /><br />"); //added
define("_AM_SUBMITTEDTXT","<h4>提供文章管理</h4></div><div><b>提供文章管理</b>會顯示出由會員提供的文章給你審核.<br /><br />要核准文章,請按<b>編輯</b>,再點選<b>核准</b>的勾選並儲存文章.提供來的文章就可以發佈.<br /><br />"); //added
define("_AM_ONLINETXT","<h4>線上文章管理</h4></div><div><b>線上文章管理</b>會顯示所有的文章其狀態被設為<b>上線</b>.<br /><br />要更改文章的狀態,按下<b>編輯</b>再點選<b>上線</b>的勾選.<br /><br />"); //added
define("_AM_OFFLINETXT","<h4>離線文章管理</h4></div><div><b>離線文章管理</b>會顯示所有的文章其狀態被設為<b>離線</b>.<br /><br />要更改文章的狀態,按下<b>編輯</b>再點選<b>上線</b>的勾選.<br /><br />"); //added
define("_AM_EXPIREDTXT","<h4>過期文章管理</h4></div><div><b>過期文章管理</b>會顯示所有已過期的文章.<br /><br />你可以按<b>編輯</b>後再按<b>設定期限</b>的設定,很容易的來重設過期時間.<br /><br />"); //added
define("_AM_AUTOEXPIRETXT","<h4>自動文章過期管理</h4></div><div><b>自動文章過期管理</b>會顯示所有有設期限的文章.<br /><br />你可以按<b>編輯</b>後再按<b>設定期限</b>來更改過期時間.<br /><br />"); //added
define("_AM_AUTOTXT","<h4>自動發佈文章管理</h4></div><div><b>自動發佈文章管理</b>會顯示有設預定發佈時間的所有文章.<br /><br />你可以按<b>編輯</b>後再按<b>設定發佈時間</b>來更改發佈的時間.<br /><br />"); //added

// WF -> XF
define("_AM_NOSHOWTXT","<h4>隱藏式文章</h4></div><div><b>隱藏式文章</b>這是特別型式的文章,不像一般的文章會到索引頁中且不是用這個方法來看.&nbsp;&nbsp; 這些文章只會在`分類文章選單區塊`下會顯示.<br /><br />利用這個選項配合HTML網頁與`不顯示資訊`(在編輯文章頁中)你可以依你想要的來顯示. &nbsp;&nbsp;例如你可以作一個`隱私權告示頁`等等.<br /><br />在這個型式下也可使用所有其它選項像發佈,期限,上線離線.<br /><br />"); //added

define("_AM_BLOCKCONF","區塊設定");
define("_AM_TITLE1","主選單區塊名稱:");
define("_AM_TITLE4","新進文章區塊名稱:");
define("_AM_TITLE5","熱門文章區塊名稱:");
define("_AM_ORDER","'順序'的額外說明文字:");
define("_AM_DATE","'日期'的額外說明文字:");
define("_AM_HITS","'閱讀'的額外說明文字:");
define("_AM_DISP","'顯示'的額外說明文字:");
define("_AM_ARTCLS","文章區塊名稱");
define("_AM_MENU_LINKS","<b>選單管理連結</b>");
define("_AM_BAN","禁止會員");
//New to version 0.9.2
define("_AM_CMODHEADER","檔案權限檢查");

// WF -> XF
define("_AM_CMODERRORINFO","檢查目錄及檔案是否為可寫入的權限.<br/><br/>分類文章模組會CHMOD使用的路徑. 若寫入的權限不正確時會出現錯誤訊息告知.");

define("_AM_FILEPATH","圖片名上傳設定");

// WF -> XF
define("_AM_FILEPATHWARNING","設定給分類文章使用的路徑. 若填入的路徑不正確時會出現警告訊息.<br/><br/>若你要使用原始預設的路徑就請不用填.<br/><br/>");

define("_AM_FILEUSEPATH","改變自訂路徑");
define("_AM_PATHEXIST","路徑存在!");
define("_AM_PATHNOTEXIST","路徑不存在!請重新檢查!");
define("_AM_USERPATH","自訂路徑");
define("_AM_SHOWSELIMAGE","顯示目前選到的圖片: "); //******* Updated *******
define("_AM_SHOWSUBMENU","顯示次選單在每個分類下嗎?");
define("_AM_MENUS","主索引設定");
define("_AM_DEFAULTPATH","使用的預設路徑");
define("_AM_SCROLLINGBLOCK","使用捲軸在新進文章區塊嗎?(此版本不使用!)");
define("_AM_BLOCKHEIGHT","設定捲軸區塊高度?");
define("_AM_DEFAULT"," 預設");
define("_AM_BLOCKAMOUNT","捲軸使用行數?");
define("_AM_BLOCKDELAY","捲動區塊間格時間(每行)");
define("_AM_LASTART","在管理區中顯示多少新文章: ");
define("_AM_NUMUPLOADS","一次上傳可有多少檔案?");

// WF -> XF
define("_AM_WEBMASTONLY","只有管理者可以改變分類文章的設定嗎?");

define("_AM_DEFAULTS","將所有設定都恢復成預設?");

define("_AM_NOCMODERROR","( 正確 )");
define("_AM_CMODERROR","( 權限錯誤或路徑不存在! )");

// WF -> XF
define("_AM_REVERTED","分類文章已還原其預定值");

define("_AM_GROUPPROMPT","授權管理的群組為:");
define("_AM_NOVIEWPERMISSION","抱歉!你沒有使用本區的權限.");
define("_AM_FILE","檔案: ");
define("_AM_NOMAINTEXT","錯誤: 在文章中沒有文字或HTML! 文章中不能是空的!");
define("_AM_DIR","目錄: ");
define("_AM_MISC","其它設定");

define("_AM_ISNOTWRITABLE2"," 不存在主機上! 請更改到正確的路徑! ");
define("_AM_CANNOTMODIFY"," 無正確路徑前不能修改! ");
define("_AM_PATH","路徑: ");

define("_AM_CMODHEADER2","檔案檢查");
define("_AM_ARTICLEMENU","文章索引設定");
define("_AM_APPROVE","核准");
define("_AM_MOVETOTOP","將本文章移到最前");
define("_AM_CHANGEDATETIME","改變發佈時間");
define("_AM_NOWSETTIME","發佈時間設為: %s"); // %s is datetime for publication
define("_AM_CURRENTTIME","現在的時間為: %s");  // %s is the current datetime
define("_AM_SETDATETIME","設定發佈時間");
define("_AM_MONTHC","月:");
define("_AM_DAYC","日:");
define("_AM_YEARC","年:");
define("_AM_TIMEC","時間:");
define("_AM_AUTOAPPROVE","要自動核准會員提供的文章嗎?");

// WF -> XF
define("_AM_DEFAULTTIME","分類文章使用時間欄:");
define("_AM_TURNOFFLINE","隱藏分類文章? (只有管理者可以使用)");

define("_AM_SHOWMARTICLES","顯示文章列數?");
define("_AM_SHOWMUPDATED","顯示更新日期欄位?");
define("_AM_SHORTCATTITLE","自動縮短類別名稱?");
define("_AM_SHOWAUTHOR","顯示作者姓名欄位?");
define("_AM_SHOWCOMMENTS2","顯示評論篇數欄位?");
define("_AM_SHOWFILE","顯示檔案下載數欄位?");
define("_AM_SHOWRATED","顯示分數計算欄位?");
define("_AM_SHOWVOTES","顯示評分人數欄位?");
define("_AM_SHOWPUBLISHED","顯示發佈日期欄位?");
define("_AM_SHOWHITS","顯示閱覽次數欄位?");
define("_AM_SHORTARTTITLE","自動縮短文章名稱?");
define("_AM_OFFLINE","<b>隱藏文章</b> (文章狀態需為離線且不會被列出.)");
define("_AM_BROKENREPORTS","檔案錯誤回報");
define("_AM_NOBROKEN","沒有錯誤的檔案.");
define("_AM_IGNORE","忽略");
define("_AM_FILEDELETED","檔案已刪除.");
define("_AM_BROKENDELETED","檔案錯誤回報已刪.");
define("_AM_IGNOREDESC","忽略(忽略回報並只刪除<b>回報記錄</b>)");
define("_AM_DELETEDESC","刪除(刪除檔案中的<b>回報的下載資料</b>及<b>回報記錄</b>.)");
define("_AM_REPORTER","回報者");
define("_AM_FILETITLE","下載名稱: ");

// WF -> XF
define("_AM_DLCONF","分類文章下載設定");

define("_AM_FILEDESCRIPT","檔案說明");
define("_AM_STATUS","狀態");
define("_AM_UPLOAD","上傳");
define("_AM_NOTIFYPUBLISH","當發佈時發出Email通知");
define("_AM_VIEWHTML","HTML編輯");
define("_AM_VIEWWAYSIWIG","WYSIWYG編輯");
define("_AM_CATEGORYT","類別");
define("_AM_ACCESS","使用");
define("_AM_PAGE","頁");
define("_AM_ARTICLEMANAGE","文章管理");
define("_AM_WEIGHTMANAGE","順序管理");
define("_AM_UPLOADMAN","上傳管理");

// WF -> XF
define("_AM_NOADMINRIGHTS","抱歉, 只有管理者才可以更改設定");

define("_AM_FILECount","檔案計算");
define("_AM_ALLARTICLES","列出所有文章");
define("_AM_PUBLARTICLES","列出發佈的文章");
define("_AM_SUBLARTICLES","列出會員提供的文章");
define("_AM_ONLINARTICLES","列出上線的文章");
define("_AM_OFFLIARTICLES","列出離線的文章");
define("_AM_EXPIREDARTICLES","列出過期的文章");
define("_AM_AUTOEXPIREARTICLES","列出會自動到期的文章");
define("_AM_AUTOARTICLES","列出會自動刊登的文章");
define("_AM_NOSHOWARTICLES","列出隱藏式的文章");
define("_NOADMINRIGHTS2","只有管理者才可以更改設定");
define("_AM_CANNOTHAVECATTHERE","錯誤: 類別指定不能指在自己的分支!!");
define("_AM_SECTIONMANAGE","類別管理");
define("_AM_SECTIONMANAGELINK","類別管理連結");
define("_AM_FILEID","檔案");
define("_AM_FILEICON","圖示");
define("_AM_FILESTORE","存為");
define("_AM_REALFILENAME","真實姓名");
define("_AM_USERFILENAME","帳戶名稱");
define("_AM_FILEMIMETYPE","檔案種類");
define("_AM_FILESIZE","檔案大小");
define("_AM_FDCOUNTER","計數器");
define("_AM_EXPARTS","過期的文章");
define("_AM_EXPIRED","自動到期日");
define("_AM_CREATED","建立日期");
define("_AM_CHANGEEXPDATETIME","改變到期時間");
define("_AM_SETEXPDATETIME","設定過期時間");
define("_AM_NOWSETEXPTIME","文章過期時間設為 : %s");
define("_AM_ANONPOST","未註冊也可以提供文章嗎?");
define("_AM_NOTIFYSUBMIT","當有新的文章提供時要e-mail管理員嗎?");
define("_AM_SECTIONIMAGE","主索引圖片");
define("_AM_SECTIONHEAD","主索引頁首文字");
define("_AM_SECTIONFOOT","主索引頁尾文字");
define("_AM_SHOWVOTESINART","讓會員幫文章評分嗎?");
define("_AM_SHOWREALNAME","顯示會員真實姓名在作者名嗎? (若沒有真實姓名時則用帳號名稱)");
define("_AM_SHOWCATEGORYIMG","顯示上面的圖片在這個類別中嗎?");
define("_AM_EDITSERVERFILE","編輯主機檔案");
define("_AM_CURRENTFILENAME","目前檔名: ");
define("_AM_CURRENTFILESIZE","檔案大小: ");
define("_AM_UPLOADFOLD","上傳路徑: ");
define("_AM_UPLOADPATH","路徑: ");
define("_AM_FREEDISKSPACE","可用空間:");   
define("_AM_RENAMETHIS","更改此檔名?");
define("_AM_RENAMEFILE","更改檔名");
define("_AM_SHOWSUMMARY","顯示摘要欄位?"); 
define("_AM_SHOWICON","顯示'高人氣'及'剛更新'的圖示嗎?");
define("_AM_INDEXHEADING","主索引頁首文字"); 
define("_AM_EXTERNALARTICLE","外部文章 </b>這會不管文字編輯器及HTML檔"); 

// added in WFS v1b6
define("_AM_POPULARITY", "歡迎度");
define("_AM_ARTICLESSORT", "文章排列順序");
define("_AM_NAVTOOLTYPE", "導覽工具種類");
define("_AM_SELECTBOX", "選擇框");
define("_AM_SELECTSUBS", "選擇框與次分類");
define("_AM_LINKEDPATH", "已連的路徑");
define("_AM_LINKSANDSELECT", "連結及選擇框");
define("_AM_NONE", "無");
define("_AM_CATEGORYWEIGHT", "類別順序");
define("_AM_ARTICLEWEIGHT", "文章順序");
define("_AM_WEIGHT", "順序");
define('_AM_DUPLICATECATEGORY','複製分類');

// add
define('_AM_DUPLICATE_ARTICLES','也複製文章');

define('_AM_COPY', '複製');
define('_AM_TO', '到');
define('_AM_NEWCATEGORYNAME', '新的分類名稱');
define('_AM_DUPLICATE', '複製');
define('_AM_DUPLICATEWSUBS', '複製與次分類');
define('_AM_ALLOWEDMIMETYPES', '可用的Mime種類');
define('_AM_MODIFYFILE', '修改文章檔案');
define('_AM_FILESTATS', '附加檔狀態');
define('_AM_FILESTAT', '文章的檔案狀態: '); 
define('_AM_ERRORCHECK', '檔案檢查'); 
define('_AM_LASTACCESS', '上次更動'); 
define('_AM_DOWNLOADED', '下載次數'); 
define('_AM_DOWNLOADSIZE', '檔案大小');
define('_AM_UPLOADFILESIZE', '最大上傳檔案大小(KB) 1048576=1MB');
define('_AM_FILEMODE', '檔案上傳權限設定');
define('_AM_IMGHEIGHT', '最大上傳圖片高度');
define('_AM_IMGWIDTH', '最大上傳圖片寬度');
define('_AM_FILEPERMISSION', '檔案權限');  
define('_AM_IMGESIZETOBIG', '圖片的長或寬度大於限定的範圍');
define('_AM_CATREORDERTEXT', '你可以在這重新排列所有分類的順序.<br />主分類為深藍色,次分類為淺藍及灰色.每個分類已按順序排列.<br /><br />要重新排序文章的話請按類別名稱,裡面有的文章就會列出來.');  
define('_WFS_ATTACHFILE', '附加檔案');  
define('_WFS_ATTACHFILEACCESS', '使用權限將會與文章相同.你可以在編輯附加檔時更改.');  
define('_AM_WFSFILESHOW', '已附加檔案');  
define('_AM_ATTACHEDFILE', '顯示檔案');  
define('_AM_ATTACHEDFILEM', '附加檔案管理'); 
define('_AM_UPOADMANAGE', '檔案管理'); 
define('_AM_CAREORDER', '類別及文章順序');
define('_AM_CAREORDER2', '排列類別');
define('_AM_CAREORDER3', '排列文章');   

define('_AM_PICON', '顯示文章(頁)圖示?'); 

// WF -> XF
define('_AM_JUSTHTML', '<b>不顯示資訊</b> (此選項會停止列出所有文章中的資訊.像空的HTML或文字.)');

define('_AM_NOSHOART', '<b>不顯示文章</b> (使用此選項可以不在主索引中列出文章來.只會在文章連結選單中才會顯示出來.)');
define('_AM_INDEXPAGECONFIG', '索引頁管理');

// WF -> XF
define('_AM_INDEXPAGECONFIGTXT', '這讓你更改分類文章的部份主索引.<br /><br />你可以很容易的將LOGO圖片及頁首頁尾的文字作改變.');
define('_AM_VISITSUPPORT', '本模組中文版由 conan@mail.ecenter.idv.tw 翻譯 1.08 版由 MaxDing 修改');

define('_AM_REORDERID', 'ID'); 
define('_AM_REORDERPID', 'PID'); 
define('_AM_REORDERTITLE', '標題');
define('_AM_REORDERDESCRIPT', '說明');
define('_AM_REORDERWEIGHT', '順序');
define('_AM_REORDERSUMMARY', '摘要');

// index.php
define("_AM_DIR_NOT_WRITABLE","資料夾不可寫入");
define("_AM_EDIT_ARTICLE_RETURN","回到文章編輯");

// copy mode in index.php
define("_AM_COPY_ARTICLE_EXPLANE","複製文章. The original article is left. 附加檔並未被複製.");

// multi language in reorder.php
define("_AM_CATEGORY_REORDERED","Categories have been re-ordered!");
define("_AM_ARTICLE_REORDERED","Articles have been re-ordered!");
define("_AM_CATEGORY_REORDER_RETURN","Return to Category re-order");

// *** add menu: bulk import ***
define("_AM_IMPORT", "大量匯入HTML檔");
define("_AM_IMPORT_DIRNAME", "目錄名或檔名");
define("_AM_IMPORT_HTMLPROC", "處理HTML檔");
define("_AM_IMPORT_EXTFILTER", "外部過濾程式名稱");

define("_AM_IMPORT_BODY", "只有BODY部份被拿掉");
define("_AM_IMPORT_INDEXHTML", "刪除index.html的連結檔案,有個相同檔在同個目錄或上層目錄下.");
define("_AM_IMPORT_LINK", "改變連結至標題 = 檔名");
define("_AM_IMPORT_IMAGE", "改變圖片的連結到圖片路徑. ");
define("_AM_IMPORT_ATMARK", "改變 @ 符號為 &amp;#064;");
define("_AM_IMPORT_TEXTPROC", "處理文字檔");
define("_AM_IMPORT_TEXTPRE", "用 &lt;pre&gt; &lt;/pre&gt; 來包著文字檔");
define("_AM_IMPORT_IMAGEPROC", "處理圖片檔");
define("_AM_IMPORT_IMAGEDIR", "圖片路徑名稱");
define("_AM_IMPORT_IMAGECOPY", "複製圖片檔到圖片的目錄下.");
define("_AM_IMPORT_TESTMODE", "測試模式");
define("_AM_IMPORT_TESTDB", "當你儲存時不存到資料庫請移除此勾選. ");
define("_AM_IMPORT_TESTEXEC", "測試");
define("_AM_IMPORT_TESTTEXT", "顯示文字");
define("_AM_IMPORT_EXPLANE", "由副檔名判斷檔案是什麼種類.<br>HTML檔為html或htm.<br>文字檔為txt.<br>圖片檔案為gif,jpg,jpeg,或png.<br>");
define("_AM_IMPORT_ERRDIREXI", "目錄或檔案不存在");
define("_AM_IMPORT_ERRFILEXI", "過濾程式不存在");
define("_AM_IMPORT_ERRFILEXEC", "過濾程式不能執行");
define("_AM_IMPORT_ERRNOCOPY", "沒有說明圖片複製");
define("_AM_IMPORT_ERRNOIMGDIR", "沒有說明圖片路徑");
define("_AM_IMPORT_ERRIMGDIREXI", "指定的圖片路徑不是個目錄");
define("_AM_IMPORT_ERRFILEEXI", "檔案不存在");

?>