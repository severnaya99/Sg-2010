<?php
// Module Info

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MI_LOADED' ) ) {



// Appended by Xoops Language Checker -GIJOE- in 2006-05-26 06:00:52
define('_ALBM_MYALBUM_ADMENU_MYTPLSADMIN','Templates');

// Appended by Xoops Language Checker -GIJOE- in 2004-10-04 16:06:32
define('_ALBM_CFG_DEFAULTORDER','Default order in category\'s view');

define( 'MYALBUM_MI_LOADED' , 1 ) ;

// The name of this module
define("_ALBM_MYALBUM_NAME","电子相册");

// A brief description of this module
define("_ALBM_MYALBUM_DESC","建立相册以便用户可以 搜寻/发布/评论 分享各种图片。");

// Names of blocks for this module (Not all module has blocks)
define("_ALBM_BNAME_RECENT","最新图片");
define("_ALBM_BNAME_HITS","热门图片");
define("_ALBM_BNAME_RANDOM","随机图片");
define('_ALBM_BNAME_RECENT_P','最新图片(缩略图 )');
define('_ALBM_BNAME_HITS_P','热门图片(缩略图 )');

// Config Items
define( "_ALBM_CFG_PHOTOSPATH" , "图片存放的路径" ) ;
define( "_ALBM_CFG_DESCPHOTOSPATH" , "路径应该存在于XOOPS系统目录里.<br />(路径名称应该以 '/'开始. 而且不以 '/' 结尾.)<br />存放图片的目录权限属性在 UNIX 系统设为777或707." ) ;
define( "_ALBM_CFG_THUMBSPATH" , "缩略图存放的路径" ) ;
define( "_ALBM_CFG_DESCTHUMBSPATH" , "路径应该存在于XOOPS系统目录里.<br />(路径名称应该以 '/'开始. 而且不以 '/' 结尾.)<br />而存放缩略图的目录权限属性在 UNIX 系统设为777或707." ) ;
//define( "_ALBM_CFG_USEIMAGICK" , "使用 ImageMagick 来建立缩略图：" ) ;
//define( "_ALBM_CFG_DESCIMAGICK" , "是(否)使用 GD. (GD将无法更改与旋转图片)<br />所以请尽可能使用 ImageMagick。" ) ;
define('_ALBM_CFG_IMAGINGPIPE','处理图片的软件包');
define('_ALBM_CFG_DESCIMAGINGPIPE','几乎所有 PHP 环境都可使用GD. 但是GD从功能上来讲不如其他两种图形库.<br />尽可能使用 ImageMagick 或 NetPBM.');
define('_ALBM_CFG_FORCEGD2','强制 GD2 转换');
define('_ALBM_CFG_DESCFORCEGD2','即使GD是与PHP绑定的版本，也将强制进行GD 2转换.<br />某些PHP无法在GD2下正常生成缩略图<br />该设置只在GD下起作用');
define( "_ALBM_CFG_IMAGICKPATH" , "ImageMagick 的路径" ) ;
define( "_ALBM_CFG_DESCIMAGICKPATH" , "完整的路径<br />(路径名称请勿以 '/' 结尾.)" ) ;
define('_ALBM_CFG_NETPBMPATH','NetPBM 的路径');
define('_ALBM_CFG_DESCNETPBMPATH','\'pnmscale\'等的完整路径.<br />(请勿以 \'/\' 结尾.)<br />该设置只在 NetPBM 下起作用');
define( "_ALBM_CFG_POPULAR" , "点击超过几次才能成为热门图片：" ) ;
define( "_ALBM_CFG_NEWDAYS" , "'新'和&'更新'间隔时间" ) ;
define( "_ALBM_CFG_NEWPHOTOS" , "首页显示最新图片的数量：" ) ;
define( "_ALBM_CFG_PERPAGE" , "每页显示几张图片：" ) ;
define('_ALBM_CFG_DESCPERPAGE','输入可选的数目，以 \'|\' 相隔<br />如) 10|20|50|100');
define('_ALBM_CFG_ALLOWNOIMAGE','允许提交非图片文件');
define( "_ALBM_CFG_MAKETHUMB" , "建立缩略图：" ) ;
define( "_ALBM_CFG_DESCMAKETHUMB" , "当您将 '否' 改为 '是',您最好重新执行 '重建缩略图'." ) ;
//define( "_ALBM_CFG_THUMBWIDTH" , "缩略图宽度：" ) ;
//define('_ALBM_CFG_DESCTHUMBWIDTH','The height of thumbs will be decided from the width automatically.');
define('_ALBM_CFG_THUMBSIZE','缩略图尺寸 (pixel)');
define('_ALBM_CFG_THUMBRULE','建立缩略图的计算规则');
define( "_ALBM_CFG_WIDTH" , "图片最大宽度：" ) ;
define( "_ALBM_CFG_DESCWIDTH" , "如果您使用ImageMagick,则代表宽度大小将会重新设定.<br />如果不是使用ImageMagick, 则代表这是宽度限制." ) ;
define( "_ALBM_CFG_HEIGHT" , "图片最大高度：" ) ;
define( "_ALBM_CFG_DESCHEIGHT" , "如果您使用ImageMagick,则代表高度大小将会重新设定.<br />如果不是使用ImageMagick, 则代表这是高度限制." ) ;
define( "_ALBM_CFG_FSIZE" , "最大允许文件大小：" ) ;
define( "_ALBM_CFG_DESCFSIZE" , "限制上传图片文件的大小." ) ;
define('_ALBM_CFG_MIDDLEPIXEL','图片显示中图片的最大尺寸');
define('_ALBM_CFG_DESCMIDDLEPIXEL','设定 (宽)x(高)<br /如) 480x480');
define( "_ALBM_CFG_ADDPOSTS" , "当会员发布一张图片后,会员发表数所要增加为：" ) ;
define( "_ALBM_CFG_DESCADDPOSTS" , "一般设为：0 或 1.（低于0为0）" ) ;
define('_ALBM_CFG_CATONSUBMENU','将顶层分类列在子菜单中');
define('_ALBM_CFG_NAMEORUNAME','显示的发表者');
define('_ALBM_CFG_DESCNAMEORUNAME','选择显示哪种名字');
define( "_ALBM_CFG_VIEWCATTYPE" , "分类查看方式" ) ;
define('_ALBM_CFG_COLSOFTABLEVIEW','选择显示的列数');
define('_ALBM_CFG_ALLOWEDEXTS','允许上传的文件扩展名');
define('_ALBM_CFG_DESCALLOWEDEXTS','输入允许的扩展名，以 \'|\' 相隔. (比如 \'jpg|jpeg|gif|png\') .<br />必须均为小写英文字母或数字. 不能插入空格等');
define('_ALBM_CFG_ALLOWEDMIME','可被上传的MIME类型');
define('_ALBM_CFG_DESCALLOWEDMIME','输入可被上传的MIME类型，以 \'|\' 相隔. (比如 \'image/gif|image/jpeg|image/png\')<br />如果希望检查MIME类型, 此处需留空');
define('_ALBM_CFG_USESITEIMG','在xoops图片管理中使用 [siteimg]');
define('_ALBM_CFG_DESCUSESITEIMG','xoops图片管理将使用 [siteimg] 而不是原来的 [img].<br />为了使用 [siteimg]，你必须修改 module.textsanitizer.php 和相关模块');

define('_ALBM_OPT_USENAME','真实姓名');
define('_ALBM_OPT_USEUNAME','登陆名');

define('_ALBUM_OPT_CALCFROMWIDTH','宽度:指定  高度:自动');
define('_ALBUM_OPT_CALCFROMHEIGHT','宽度:自动  高度:指定');
define('_ALBUM_OPT_CALCWHINSIDEBOX','显示在指定的区域');

define('_ALBM_OPT_VIEWLIST','简单显示');
define('_ALBM_OPT_VIEWTABLE','列表显示');


// Sub menu titles
define("_ALBM_TEXT_SMNAME1","上传图片");
define("_ALBM_TEXT_SMNAME2","热门图片");
define("_ALBM_TEXT_SMNAME3","优质图片");
define("_ALBM_TEXT_SMNAME4","我的图片");

// Names of admin menu items
define("_ALBM_MYALBUM_ADMENU0","审核上传图片");
define("_ALBM_MYALBUM_ADMENU1","图片管理/删除");
define("_ALBM_MYALBUM_ADMENU2","新增/修改/删除 图片分类");
define('_ALBM_MYALBUM_ADMENU_GPERM','权限设定');
define("_ALBM_MYALBUM_ADMENU3","查核图片模组资料库");
define("_ALBM_MYALBUM_ADMENU4","图片批次上传");
define("_ALBM_MYALBUM_ADMENU5","重建缩略图");
define('_ALBM_MYALBUM_ADMENU_IMPORT','导入图片');
define('_ALBM_MYALBUM_ADMENU_EXPORT','导出图片');
define('_ALBM_MYALBUM_ADMENU_MYBLOCKSADMIN','显示区块和群组管理');


// Text for notifications
define('_MI_MYALBUM_GLOBAL_NOTIFY','全局');
define('_MI_MYALBUM_GLOBAL_NOTIFYDSC','相册的全局通知');
define('_MI_MYALBUM_CATEGORY_NOTIFY','分类');
define('_MI_MYALBUM_CATEGORY_NOTIFYDSC','当前图片分类通知选项');
define('_MI_MYALBUM_PHOTO_NOTIFY','图片');
define('_MI_MYALBUM_PHOTO_NOTIFYDSC','当前图片通知选项');

define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFY','新图片');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYCAP','当有任何新图片发布时通知我');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYDSC','当有任何新图片发布时收取通知');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYSBJ','[{X_SITENAME}] {X_MODULE}: 自动通知 : 新图片发布');

define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFY','新图片');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYCAP','当该分类中有新图片发布时通知我');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYDSC','当该分类中有新图片发布时收取通知');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYSBJ','[{X_SITENAME}] {X_MODULE}: 自动通知 : 新图片发布');

}


//////////////////////////////////////////////////////////////////////////////////////////
// 该简体中文汉化由 D.J. (phppp at xoops.org) 为 xoops.org.cn 完成
// 如果您发现任何有关汉化的问题，请联系 xoops.org.cn
// The Simplified Chinese pack was made by D.J. (phppp at xoops.org) for xoops.org.cn
// You are appreciated to report any inappropriate translation to xoops.org.cn
//////////////////////////////////////////////////////////////////////////////////////////
?>
