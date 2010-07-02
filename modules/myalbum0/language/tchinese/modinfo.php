<?php
// Module Info

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MI_LOADED' ) ) {






// Appended by Xoops Language Checker -GIJOE- in 2004-10-04 16:06:32
define('_ALBM_CFG_DEFAULTORDER','Default order in category\'s view');

// Appended by Xoops Language Checker -GIJOE- in 2004-06-24 17:58:58
define('_ALBM_CFG_USESITEIMG','Use [siteimg] in ImageManager Integration');
define('_ALBM_CFG_DESCUSESITEIMG','The Integrated Image Manager input [siteimg] instead of [img].<br />You have to hack module.textsanitizer.php or each modules to enable tag of [siteimg]');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-19 13:56:05
define('_ALBM_CFG_MIDDLEPIXEL','Max image size in single view');
define('_ALBM_CFG_DESCMIDDLEPIXEL','Specify (width)x(height)<br />eg) 480x480');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-17 18:42:55
define('_ALBM_CFG_DESCPERPAGE','Input selectable numbers separated with \'|\'<br />eg) 10|20|50|100');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-05 15:14:38
define('_ALBM_CFG_ALLOWNOIMAGE','Allows a sumbit without images');
define('_ALBM_CFG_ALLOWEDEXTS','File extensions can be uploaded');
define('_ALBM_CFG_DESCALLOWEDEXTS','Input extensions with separator \'|\'. (eg \'jpg|jpeg|gif|png\') .<br />All character must be small. Don\'t insert periods or spaces');
define('_ALBM_CFG_ALLOWEDMIME','MIME Types can be uploaded');
define('_ALBM_CFG_DESCALLOWEDMIME','Input MIME Types with separator \'|\'. (eg \'image/gif|image/jpeg|image/png\')<br />If you want to be checked by MIME Type, be blank here');
define('_ALBM_MYALBUM_ADMENU_IMPORT','Import Images');
define('_ALBM_MYALBUM_ADMENU_EXPORT','Export Images');
define('_ALBM_MYALBUM_ADMENU_MYBLOCKSADMIN','Blocks&Groups Admin');

define( 'MYALBUM_MI_LOADED' , 1 ) ;

// The name of this module
define("_ALBM_MYALBUM_NAME","電子相簿");

// A brief description of this module
define("_ALBM_MYALBUM_DESC","建立相片簿以便用戶可以 搜尋/發佈/評論 分享各種相片,xoobs中文化。");

// Names of blocks for this module (Not all module has blocks)
define("_ALBM_BNAME_RECENT","最新相片");
define("_ALBM_BNAME_HITS","熱門相片");
define("_ALBM_BNAME_RANDOM","電子相簿");

// Config Items
define( "_ALBM_CFG_PHOTOSPATH" , "相片存放的路徑" ) ;
define( "_ALBM_CFG_DESCPHOTOSPATH" , "路徑應該存在安裝到XOOPS系統的目錄裡.<br />(路徑名稱應該以 '/'開始. 而且不可以 '/' 結尾.)<br />而存放相片的目錄權限屬性在 UNIX 系統設為777或707." ) ;
define( "_ALBM_CFG_THUMBSPATH" , "縮圖存放的路徑" ) ;
define( "_ALBM_CFG_DESCTHUMBSPATH" , "路徑應該存在安裝到XOOPS系統的目錄裡.<br />(路徑名稱應該以 '/'開始. 而且不可以 '/' 結尾.)<br />而存放相片的目錄權限屬性在 UNIX 系統設為777或707." ) ;
define( "_ALBM_CFG_USEIMAGICK" , "使用 ImageMagick 來建立縮圖：" ) ;
define( "_ALBM_CFG_DESCIMAGICK" , "選(否)表示使用 GD. (將無法變更與旋轉相片)<br />所以請盡可能使用 ImageMagick。" ) ;
define( "_ALBM_CFG_IMAGICKPATH" , "ImageMagick 的路徑：" ) ;
define( "_ALBM_CFG_DESCIMAGICKPATH" , "完整的路徑<br />(路徑名稱請勿以 '/' 結尾.)" ) ;
define( "_ALBM_CFG_POPULAR" , "點閱超過幾次才能成為熱門相片：" ) ;
define( "_ALBM_CFG_NEWDAYS" , "標示為'新'&'更新'圖標的間隔日期" ) ;
define( "_ALBM_CFG_NEWPHOTOS" , "首頁展示新進相片的數量：" ) ;
define( "_ALBM_CFG_PERPAGE" , "每頁展示幾張相片：" ) ;
define( "_ALBM_CFG_MAKETHUMB" , "建立縮圖：" ) ;
define( "_ALBM_CFG_THUMBWIDTH" , "縮圖寬度：" ) ;
define( "_ALBM_CFG_DESCMAKETHUMB" , "當您將 '否' 改為 '是',您最好重新執行 '重建縮圖'." ) ;
define( "_ALBM_CFG_WIDTH" , "相片最大寬度：" ) ;
define( "_ALBM_CFG_DESCWIDTH" , "如果您使用ImageMagick,則代表寬度大小將會重新設定.<br />如果不是使用ImageMagick, 則代表這是寬度限制." ) ;
define( "_ALBM_CFG_HEIGHT" , "相片最大高度：" ) ;
define( "_ALBM_CFG_DESCHEIGHT" , "如果您使用ImageMagick,則代表高度大小將會重新設定.<br />如果不是使用ImageMagick, 則代表這是高度限制." ) ;
define( "_ALBM_CFG_FSIZE" , "最大檔案大小：" ) ;
define( "_ALBM_CFG_DESCFSIZE" , "限制上傳相片檔案之大小." ) ;
define( "_ALBM_CFG_NEEDADMIT" , "所有新相片需經審核後才允許發佈：" ) ;
define( "_ALBM_CFG_ADDPOSTS" , "當會員發佈一張照片後,會員發表數所要添加數為：" ) ;
define( "_ALBM_CFG_DESCADDPOSTS" , "一般設為：0 或 1.（低於0代表0）" ) ;

// Sub menu titles
define("_ALBM_TEXT_SMNAME1","上傳相片");
define("_ALBM_TEXT_SMNAME2","熱門相片");
define("_ALBM_TEXT_SMNAME3","優質相片");
define("_ALBM_TEXT_SMNAME4","我的相片");

// Names of admin menu items
define("_ALBM_MYALBUM_ADMENU0","審核上傳相片");
define("_ALBM_MYALBUM_ADMENU1","相片管理/刪除");
define("_ALBM_MYALBUM_ADMENU2","新增/修改/刪除 相片分類");
define("_ALBM_MYALBUM_ADMENU3","查核相片模組資料庫");
define("_ALBM_MYALBUM_ADMENU4","相片批次上傳");
define("_ALBM_MYALBUM_ADMENU5","重建縮圖");

?><?php
// Appended by Xoops Language Checker -GIJOE- in 2003-10-21 17:48:33
define('_ALBM_CFG_DESCTHUMBWIDTH','縮圖的高度會依據寬度的設定值自動完成.');
?><?php
// Appended by Xoops Language Checker -GIJOE- in 2003-11-27 10:43:20
define('_ALBM_CFG_IMAGINGPIPE','Package treating images');
define('_ALBM_CFG_DESCIMAGINGPIPE','Almost PHP environment can use GD. But GD is functionally inferior than another 2 packages.<br />You\'d better use ImageMagick or NetPBM if you can.');
define('_ALBM_CFG_FORCEGD2','Force GD2 conversion');
define('_ALBM_CFG_DESCFORCEGD2','Even if the GD is bundled version of PHP, it force GD2(truecolor) conversion.<br />Some configured PHP fails to create thumbnails in GD2<br />This configuration is significant only under using GD');
define('_ALBM_CFG_NETPBMPATH','Path of NetPBM');
define('_ALBM_CFG_DESCNETPBMPATH','The full path to \'pnmscale\' etc.<br />(The last character should not be \'/\'.)<br />This configuration is significant only under using NetPBM');
define('_ALBM_CFG_THUMBSIZE','Size of thumbnails (pixel)');
define('_ALBM_CFG_THUMBRULE','Calc rule for building thumbnails');
define('_ALBM_CFG_CATONSUBMENU','Register top categories into submenu');
define('_ALBM_CFG_NAMEORUNAME','Poster name displayed');
define('_ALBM_CFG_DESCNAMEORUNAME','Select which \'name\' is displayed');
define('_ALBM_OPT_USENAME','Handle Name');
define('_ALBM_OPT_USEUNAME','Login Name');
define('_ALBUM_OPT_CALCFROMWIDTH','width:specified  height:auto');
define('_ALBUM_OPT_CALCFROMHEIGHT','width:auto  width:specified');
define('_ALBUM_OPT_CALCWHINSIDEBOX','put in specified size squre');
?><?php
// Appended by Xoops Language Checker -GIJOE- in 2003-12-03 16:33:03
define('_ALBM_BNAME_RECENT_P','Recent Photos with thumbs');
define('_ALBM_BNAME_HITS_P','Top Photos with thumbs');
?><?php
// Appended by Xoops Language Checker -GIJOE- in 2004-01-27 15:37:02
define('_ALBM_CFG_VIEWCATTYPE','Type of view in category');
define('_ALBM_CFG_COLSOFTABLEVIEW','Number of columns in table view');
define('_ALBM_OPT_VIEWLIST','List View');
define('_ALBM_OPT_VIEWTABLE','Table View');
define('_ALBM_MYALBUM_ADMENU_GPERM','Global Permissions');
define('_MI_MYALBUM_GLOBAL_NOTIFY','Global');
define('_MI_MYALBUM_GLOBAL_NOTIFYDSC','Global notification options with myAlbum-P');
define('_MI_MYALBUM_CATEGORY_NOTIFY','Category');
define('_MI_MYALBUM_CATEGORY_NOTIFYDSC','Notification options that apply to the current photo category');
define('_MI_MYALBUM_PHOTO_NOTIFY','Photo');
define('_MI_MYALBUM_PHOTO_NOTIFYDSC','Notification options that apply to the current photo');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFY','New Photo');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYCAP','Notify me when any new photo is posted');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYDSC','Receive notification when any new photo is posted');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYSBJ','[{X_SITENAME}] {X_MODULE}: auto-notify : New photo');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFY','New Photo');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYCAP','Notify me when a new photo is posted to the current category');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYDSC','Receive notification when a new photo is posted to the current category');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYSBJ','[{X_SITENAME}] {X_MODULE}: auto-notify : New photo');

}

?>
