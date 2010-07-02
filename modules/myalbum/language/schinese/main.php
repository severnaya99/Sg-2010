<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MB_LOADED' ) ) {



// Appended by Xoops Language Checker -GIJOE- in 2005-08-31 15:23:35
define('_ALBM_STORETIMESTAMP','Don\'t touch timestamp');
define('_ALBM_TELLAFRIEND','Tell a friend');
define('_ALBM_SUBJECT4TAF','A photo for you!');

// Appended by Xoops Language Checker -GIJOE- in 2004-10-04 16:06:32
define('_ALBM_LIDASC','Record Number (Bigger is latter)');
define('_ALBM_LIDDESC','Record Number (Smaller is latter)');

define( 'MYALBUM_MB_LOADED' , 1 ) ;

//%%%%%%		Module Name 'myAlbum-P'		%%%%%

// New in myAlbum-P

// only "Y/m/d" , "d M Y" , "M d Y" can be interpreted
define( "_ALBM_DTFMT_YMDHI" , "Y/m/d H:i" ) ;

define( "_ALBM_NEXT_BUTTON" , "下一步" ) ;
define( "_ALBM_REDOLOOPDONE" , "重建缩略图完成" ) ;

define("_ALBM_BTN_SELECTALL","全选");
define("_ALBM_BTN_SELECTNONE","清空");
define("_ALBM_BTN_SELECTRVS","反向选择");

define("_ALBM_FMT_PHOTONUM","每页%s张");

define( "_ALBM_AM_ADMISSION" , "审核图片" ) ;
define( "_ALBM_AM_ADMITTING" , "已审核图片" ) ;
define( "_ALBM_AM_LABEL_ADMIT" , "审核你所选取的图片" ) ;
define( "_ALBM_AM_BUTTON_ADMIT" , "审核" ) ;
define( "_ALBM_AM_BUTTON_EXTRACT" , "选取" ) ;

define( "_ALBM_AM_PHOTOMANAGER" , "图片管理系统" ) ;
define( "_ALBM_AM_PHOTONAVINFO" , "图片编号 %s-%s (总共有 %s 张图片)" ) ;
define( "_ALBM_AM_LABEL_REMOVE" , "删除您所选择的图片-->" ) ;
define( "_ALBM_AM_BUTTON_REMOVE" , "删除" ) ;
define( "_ALBM_AM_JS_REMOVECONFIRM" , "确定要删除吗?" ) ;
define( "_ALBM_AM_LABEL_MOVE" , "将您所选择的图片转移到：" ) ;
define( "_ALBM_AM_BUTTON_MOVE" , "转移" ) ;
define("_ALBM_AM_BUTTON_UPDATE","修改");
define( "_ALBM_AM_DEADLINKMAINPHOTO" , "原始图不存在" ) ;

define( "_ALBM_RADIO_ROTATETITLE" , "旋转图片" ) ;
define( "_ALBM_RADIO_ROTATE0" , "不旋转" ) ;
define( "_ALBM_RADIO_ROTATE90" , "向右转" ) ;
define( "_ALBM_RADIO_ROTATE180" , "旋转180度" ) ;
define( "_ALBM_RADIO_ROTATE270" , "向左转" ) ;


// New MyAlbum 1.0.1 (and 1.2.0)
define("_ALBM_MOREPHOTOS","从%s上传更多图片");
define("_ALBM_REDOTHUMBS","重建缩略图 (<a href='redothumbs.php'>重来</a>)");
define("_ALBM_REDOTHUMBSINFO","一次执行太大量的图片缩略图重建，可能导致服务器连结超时，请小心！");
define("_ALBM_REDOTHUMBSNUMBER","每次执行重建缩略图数量");
define("_ALBM_REDOING","正在重建缩略图：");
define("_ALBM_BACK","返回上一步");
define("_ALBM_ADDPHOTO","新增图片");


// New MyAlbum 1.0.0
define("_ALBM_PHOTOBATCHUPLOAD","登记已上传到服务器中的图片");
define("_ALBM_PHOTOUPLOAD","上传图片");
define("_ALBM_PHOTOEDITUPLOAD","编辑图片并重新上传");
define("_ALBM_MAXPIXEL","最大尺寸 (单位:pixel)");
define("_ALBM_MAXSIZE","最大图片文件大小");
define("_ALBM_PHOTOTITLE","主题");
define("_ALBM_PHOTOPATH","路径");
define("_ALBM_TEXT_DIRECTORY","目录");
define("_ALBM_DESC_PHOTOPATH","请输入要登记的图片所在的完整路径");
define("_ALBM_MES_INVALIDDIRECTORY","指定的目录无效.");
define("_ALBM_MES_BATCHDONE","%s 张图片已经登记.");
define("_ALBM_MES_BATCHNONE","在该目录里未发现图片.");
define("_ALBM_PHOTODESC","描述");
define("_ALBM_PHOTOCAT","分类");
define("_ALBM_SELECTFILE","选择图片");
define("_ALBM_NOIMAGESPECIFIED","错误: 没有图片被上传");
define("_ALBM_FILEERROR","没有任何图片被上传（图片尺寸太大？）");
define("_ALBM_FILEREADERROR","错误: 图片不可读.");

define("_ALBM_BATCHBLANK","将主题留空将以原文件名称为主题");
define("_ALBM_DELETEPHOTO","删除图片?");
define("_ALBM_VALIDPHOTO","确认发布");
define("_ALBM_PHOTODEL","删除图片?");
define("_ALBM_DELETINGPHOTO","图片删除中，请稍侯...");
define("_ALBM_MOVINGPHOTO","图片转移中，请稍侯...");

define("_ALBM_POSTERC","张贴者：");
define("_ALBM_DATEC","日期: ");
define("_ALBM_EDITNOTALLOWED","抱歉！您无权修改这则评论！");
define("_ALBM_ANONNOTALLOWED","抱歉！访客不能发表评论。");
define("_ALBM_THANKSFORPOST","感谢您的评论！");
define("_ALBM_DELNOTALLOWED","抱歉！您无权删除这则评论！");
define("_ALBM_GOBACK","退回上一步");
define("_ALBM_AREYOUSURE","您确定要删除这则评论及与其相关的回复吗？");
define("_ALBM_COMMENTSDEL","您选取的评论已经成功的删除了！");

// End New

define("_ALBM_THANKSFORINFO","感谢您的来函，我们将会尽快回复！");
define("_ALBM_BACKTOTOP","回到第一张图片");
define("_ALBM_THANKSFORHELP","感谢您协助维持这个目录的完整性。");
define("_ALBM_FORSECURITY","基于安全理由，系统将暂时记录您的用户名和IP。");

define("_ALBM_MATCH","符合");
define("_ALBM_ALL","全部");
define("_ALBM_ANY","任何");
define("_ALBM_NAME","名称");
define("_ALBM_DESCRIPTION","描述");

define("_ALBM_MAIN","回到首页");
define("_ALBM_NEW","新建");
define("_ALBM_UPDATED","更新");
define("_ALBM_POPULAR","热门");
define("_ALBM_TOPRATED","最高评分");

define("_ALBM_POPULARITYLTOM","点击数 (由低至高)");
define("_ALBM_POPULARITYMTOL","点击数 (由高至低)");
define("_ALBM_TITLEATOZ","主题 (A to Z)");
define("_ALBM_TITLEZTOA","主题 (Z to A)");
define("_ALBM_DATEOLD","日期 (由旧到新)");
define("_ALBM_DATENEW","日期 (由新到旧)");
define("_ALBM_RATINGLTOH","评分 (由低至高)");
define("_ALBM_RATINGHTOL","评分 (由高至低)");

define("_ALBM_NOSHOTS","没有缩略图");
define("_ALBM_EDITTHISPHOTO","编辑这张图片");

define("_ALBM_DESCRIPTIONC","描述：");
define("_ALBM_EMAILC","Email：");
define("_ALBM_CATEGORYC","分类：");
define("_ALBM_SUBCATEGORY","子类：");
define("_ALBM_LASTUPDATEC","最后更新：");
define("_ALBM_HITSC","点击数：");
define("_ALBM_RATINGC","评分：");
define("_ALBM_ONEVOTE","一人给予评分");
define("_ALBM_NUMVOTES","%s 人给予评分");
define("_ALBM_ONEPOST","一个评论");
define("_ALBM_NUMPOSTS","%s 个评论");
define("_ALBM_COMMENTSC","评论：");
define("_ALBM_RATETHISPHOTO","给本图评分");
define("_ALBM_MODIFY","编辑");
define("_ALBM_VSCOMMENTS","阅览/发表评论");

define("_ALBM_DIRECTCATSEL","选择一个分类");
define("_ALBM_THEREARE","目前有 <b>%s</b> 张图片在我们的资料库中，您可以 ");
define("_ALBM_LATESTLIST","新进图片列表");

define("_ALBM_VOTEAPPRE","感谢您的评分。");
define("_ALBM_THANKURATE","感谢您花费宝贵的时间在%s 为本图片评分。");
define("_ALBM_VOTEONCE","请勿针对同一图片重复评分。");
define("_ALBM_RATINGSCALE","评分标准由２-９，数字愈高代表愈好。");
define("_ALBM_BEOBJECTIVE","请客观评分，同一图片得到最低及最高分时，评分就没有意义了。");
define("_ALBM_DONOTVOTE","请不要对自己所发布的图片评分。");
define("_ALBM_RATEIT","确定");

define("_ALBM_RECEIVED","我们已经收到您上传的图片，感谢您！");
define("_ALBM_ALLPENDING","所有图片与评论均需经过审核后才会被张贴出来。");

define("_ALBM_RANK","等级");
define("_ALBM_CATEGORY","分类");
define("_ALBM_HITS","点阅数");
define("_ALBM_RATING","评分");
define("_ALBM_VOTE","给予评分");
define("_ALBM_TOP10","%s 十大"); // %s is a photo category title

define("_ALBM_SORTBY","排序方式：");
define("_ALBM_TITLE","主题");
define("_ALBM_DATE","日期");
define("_ALBM_POPULARITY","热门的");
define("_ALBM_CURSORTEDBY","图片目前以 %s 排序");
define("_ALBM_FOUNDIN","找到：");
define("_ALBM_PREVIOUS","上一张");
define("_ALBM_NEXT","下一张");
define("_ALBM_NOMATCH","并未发现任何符合查询条件的结果。");

define("_ALBM_CATEGORIES","分类");

define("_ALBM_SUBMIT","提交");
define("_ALBM_CANCEL","取消");

define("_ALBM_MUSTREGFIRST","对不起！访客没有执行本项目的权力。<br>请先注册登入！");
define("_ALBM_MUSTADDCATFIRST","对不起！您并未建立任何分类。<br>请先建立分类！");
define("_ALBM_NORATING","尚未选取任何评分。");
define("_ALBM_CANTVOTEOWN","您不能针对自己所发布的图片评分。<br>所有评分将被记录和确认。");
define("_ALBM_VOTEONCE2","所有图片只能被评分一次。<br>所有评分将被记录和确认。");

//%%%%%%	Module Name 'MyAlbum' (Admin)	  %%%%%

define("_ALBM_PHOTOSWAITING","待审图片");
define("_ALBM_PHOTOMANAGER","图片管理/删除");
define("_ALBM_CATEDIT","新增/修改/删除 图片分类");
define("_ALBM_GROUPPERM_GLOBAL","权限设定");
define("_ALBM_CHECKCONFIGS","查核图片模块资料库");
define("_ALBM_BATCHUPLOAD","图片批次上传");
define("_ALBM_GENERALSET","电子相册一般设定");
define("_ALBM_REDOTHUMBS2","重新生成缩略图");

define("_ALBM_SUBMITTER","张贴者：");
define("_ALBM_DELETE","删除");
define("_ALBM_NOSUBMITTED","无新发表图片.");
define("_ALBM_ADDMAIN","新增一个主分类");
define("_ALBM_IMGURL","图片网址 (选择性功能/任意高度的图片，都会被重设为50)：");
define("_ALBM_ADD","新增");
define("_ALBM_ADDSUB","新增一个次分类");
define("_ALBM_IN","在");
define("_ALBM_MODCAT","修改分类");
define("_ALBM_DBUPDATED","资料库更新成功！");
define("_ALBM_MODREQDELETED","修改申请已经删除。");
define("_ALBM_IMGURLMAIN","图片网址 (可选，任何高度的图片都会被重设为50)：");
define("_ALBM_PARENT","上层分类：");
define("_ALBM_SAVE","保存修改");
define("_ALBM_CATDELETED","分类已删除。");
define("_ALBM_CATDEL_WARNING","警告！您确定要删除此分类及包含于其中的图片和评论吗？");
define("_ALBM_YES","是");
define("_ALBM_NO","否");
define("_ALBM_NEWCATADDED","新的分类已成功添加!");
define("_ALBM_ERROREXIST","错误！您发表的图片已经存在于资料库中！");
define("_ALBM_ERRORTITLE","错误！您必须输入主题！");
define("_ALBM_ERRORDESC","错误！您必须输入描述！");
define("_ALBM_WEAPPROVED","我们已认可您发布图片所连结的资料库。");
define("_ALBM_THANKSSUBMIT","感谢您的发表！");
define("_ALBM_CONFUPDATED","分类新增完成！");

}

//////////////////////////////////////////////////////////////////////////////////////////
// 该简体中文汉化由 D.J. (phppp at xoops.org) 为 xoops.org.cn 完成
// 如果您发现任何有关汉化的问题，请联系 xoops.org.cn
// The Simplified Chinese pack was made by D.J. (phppp at xoops.org) for xoops.org.cn
// You are appreciated to report any inappropriate translation to xoops.org.cn
//////////////////////////////////////////////////////////////////////////////////////////
?>