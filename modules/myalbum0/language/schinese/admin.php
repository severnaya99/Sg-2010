<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_AM_LOADED' ) ) {

define( 'MYALBUM_AM_LOADED' , 1 ) ;

// Index (Categories)
define("_AM_H3_FMT_CATEGORIES","分类管理 (%s)");
define("_AM_CAT_TH_TITLE","标题");
define("_AM_CAT_TH_PHOTOS","图片");
define("_AM_CAT_TH_OPERATION","操作");
define("_AM_CAT_TH_IMAGE","Banner");
define("_AM_CAT_TH_PARENT","上层分类");
define("_AM_CAT_TH_IMGURL","Banner的网址");
define("_AM_CAT_MENU_NEW","生成分类");
define("_AM_CAT_MENU_EDIT","编辑分类");
define("_AM_CAT_INSERTED","分类已添加");
define("_AM_CAT_UPDATED","该分类已修改");
define("_AM_CAT_BTN_BATCH","执行");
define("_AM_CAT_LINK_MAKETOPCAT","生成一个顶层分类");
define("_AM_CAT_LINK_ADDPHOTOS","往该分类中添加一张图片");
define("_AM_CAT_LINK_EDIT","编辑该分类");
define("_AM_CAT_LINK_MAKESUBCAT","在该分类下建立一个新的分类");
define("_AM_CAT_FMT_NEEDADMISSION","%s 张图片需要接受");
define("_AM_CAT_FMT_CATDELCONFIRM","%s 及其下属分类、图片、评论都将被删除。确定?");


// Admission
define("_AM_H3_FMT_ADMISSION","接受图片 (%s)");
define("_AM_TH_SUBMITTER","提交");
define("_AM_TH_TITLE","标题");
define("_AM_TH_DESCRIPTION","描述");
define("_AM_TH_CATEGORIES","分类");
define("_AM_TH_DATE","上次更新");


// Photo Manager
define("_AM_H3_FMT_PHOTOMANAGER","图片管理 (%s)");
define("_AM_TH_BATCHUPDATE","批量更新检查过的照片");
define("_AM_OPT_NOCHANGE","- 无变化 -");
define("_AM_JS_UPDATECONFIRM","检查过的内容将被更新. 确定?");


// Module Checker
define( "_AM_H3_FMT_MODULECHECKER" , "myAlbum-P 检测" ) ;

define( "_AM_H4_ENVIRONMENT" , "环境变量检测" ) ;
define( "_AM_MB_PHPDIRECTIVE" , "PHP 检测" ) ;
define( "_AM_MB_BOTHOK" , "都成功通过检测" ) ;
define( "_AM_MB_NEEDON" , "需要设置为ON" ) ;


define( "_AM_H4_TABLE" , "数据库 table" ) ;
define( "_AM_MB_PHOTOSTABLE" , "Photos table" ) ;
define( "_AM_MB_DESCRIPTIONTABLE" , "Descriptions table" ) ;
define( "_AM_MB_CATEGORIESTABLE" , "Categories table" ) ;
define( "_AM_MB_VOTEDATATABLE" , "Votedata table" ) ;
define( "_AM_MB_COMMENTSTABLE" , "Comments table" ) ;
define( "_AM_MB_NUMBEROFPHOTOS" , "图片数目" ) ;
define( "_AM_MB_NUMBEROFDESCRIPTIONS" , "Descriptions 数目" ) ;
define( "_AM_MB_NUMBEROFCATEGORIES" , "Categories 数目" ) ;
define( "_AM_MB_NUMBEROFVOTEDATA" , "Votedata 数目" ) ;
define( "_AM_MB_NUMBEROFCOMMENTS" , "Comments 数目" ) ;


define( "_AM_H4_CONFIG" , "检测设置" ) ;
define( "_AM_MB_PIPEFORIMAGES" , "图片Pipe" ) ;
define( "_AM_MB_DIRECTORYFORPHOTOS" , "图片目录" ) ;
define( "_AM_MB_DIRECTORYFORTHUMBS" , "缩略图目录" ) ;
define( "_AM_ERR_LASTCHAR" , "错误: 最后不加 '/'" ) ;
define( "_AM_ERR_FIRSTCHAR" , "错误: 应该以'/'开头" ) ;
define( "_AM_ERR_PERMISSION" , "错误: 首先要建立这个目录并将属性设为777." ) ;
define( "_AM_ERR_NOTDIRECTORY" , "错误: 不是有效目录." ) ;
define( "_AM_ERR_READORWRITE" , "错误: 该目录不可读写. 需要将目录属性设为 777." ) ;
define( "_AM_ERR_SAMEDIR" , "错误: 图片目录不能与所略图目录相同" ) ;
define( "_AM_LNK_CHECKGD2" , "检查 'GD2' 是否正常工作" ) ;
define( "_AM_MB_CHECKGD2" , "如果该链接的页面不能正常显示，就不要启用GD的 truecolor 模式." ) ;
define( "_AM_MB_GD2SUCCESS" , "成功!<br />你可以使用 GD2 (truecolor)." ) ;


define( "_AM_H4_PHOTOLINK" , "图片和所略图链接检测" ) ;
define( "_AM_MB_NOWCHECKING" , "开始检测 ." ) ;
define( "_AM_FMT_PHOTONOTREADABLE" , "原始图片 (%s) 不可读." ) ;
define( "_AM_FMT_THUMBNOTREADABLE" , "缩略图 (%s) 不可读." ) ;
define( "_AM_FMT_NUMBEROFDEADPHOTOS" , "发现无效图片文件%s." ) ;
define( "_AM_FMT_NUMBEROFDEADTHUMBS" , "缩略图%s需要重建." ) ;
define( "_AM_FMT_NUMBEROFREMOVEDTMPS" , "无用文件%s已被删除." ) ;
define( "_AM_LINK_REDOTHUMBS" , "重建缩略图" ) ;
define( "_AM_LINK_TABLEMAINTENANCE" , "维护数据表" ) ;



// Redo Thumbnail
define( "_AM_H3_FMT_RECORDMAINTENANCE" , "myAlbum 图片维护" ) ;

define( "_AM_FMT_CHECKING" , "检测 %s ..." ) ;

define( "_AM_FORM_RECORDMAINTENANCE" , "图片维护，比如从新标记缩略图等." ) ;

define( "_AM_MB_FAILEDREADING" , "无法读取." ) ;
define( "_AM_MB_CREATEDTHUMBS" , "生成的缩略图." ) ;
define( "_AM_MB_BIGTHUMBS" , "无法生成缩略图. 已拷贝." ) ;
define( "_AM_MB_SKIPPED" , "略过." ) ;
define( "_AM_MB_SIZEREPAIRED" , "(修正该记录的size域.)" ) ;
define( "_AM_MB_RECREMOVED" , "该记录已被删除." ) ;
define( "_AM_MB_PHOTONOTEXISTS" , "原始图片不存在." ) ;
define( "_AM_MB_PHOTORESIZED" , "原始图片已被resized." ) ;

define( "_AM_TEXT_RECORDFORSTARTING" , "记录数开始于" ) ;
define( "_AM_TEXT_NUMBERATATIME" , "每次处理的记录数" ) ;
define( "_AM_LABEL_DESCNUMBERATATIME" , "数量太大将导致服务器处理超时." ) ;

define( "_AM_RADIO_FORCEREDO" , "即使已存在缩略图也要强制重建" ) ;
define( "_AM_RADIO_REMOVEREC" , "删除没有图片相链接的记录" ) ;
define( "_AM_RADIO_RESIZE" , "resize 大于目前设定的尺寸的图片" ) ;

define( "_AM_MB_FINISHED" , "完成" ) ;
define( "_AM_LINK_RESTART" , "重新开始" ) ;
define( "_AM_SUBMIT_NEXT" , "下一个" ) ;



// Batch Register
define( "_AM_H3_FMT_BATCHREGISTER" , "myAlbum 批处理" ) ;


// GroupPerm Global
define("_AM_ALBM_GROUPPERM_GLOBAL","权限设定");
define("_AM_ALBM_GROUPPERM_GLOBALDESC","设定群组关于本模块的权限");
define("_AM_ALBM_GPERMUPDATED","权限已成功更新");


// Import
define("_AM_H3_FMT_IMPORTTO","从其他模块导入图片到 %s");
define("_AM_FMT_IMPORTFROMMYALBUMP","以myAlbum模块的类型从 %s 导入");
define("_AM_FMT_IMPORTFROMIMAGEMANAGER","从XOOPS的图片管理导入");
define("_AM_CB_IMPORTRECURSIVELY","递归导入下层分类");
define("_AM_RADIO_IMPORTCOPY","拷贝图片 (不拷贝评论)");
define("_AM_RADIO_IMPORTMOVE","转移图片 (评论将被保存)");
define("_AM_MB_IMPORTCONFIRM","执行导入 ?");
define("_AM_FMT_IMPORTSUCCESS","你已经导入 %s 张图片");


// Export
define("_AM_H3_FMT_EXPORTTO","从 %s 导出图片到其他模块");
define("_AM_FMT_EXPORTTOIMAGEMANAGER","导出图片到 XOOPS 的图片管理");
define("_AM_FMT_EXPORTIMSRCCAT","来源");
define("_AM_FMT_EXPORTIMDSTCAT","目的地");
define("_AM_CB_EXPORTRECURSIVELY","及其下层分类中的图片");
define("_AM_CB_EXPORTTHUMB","导出所略图而不是原始图片");
define("_AM_MB_EXPORTCONFIRM","导出. 确定?");
define("_AM_FMT_EXPORTSUCCESS","已经成功导出 %s 张图片");


}

//////////////////////////////////////////////////////////////////////////////////////////
// 该简体中文汉化由 D.J. (phppp at xoops.org) 为 xoops.org.cn 完成
// 如果您发现任何有关汉化的问题，请联系 xoops.org.cn
// The Simplified Chinese pack was made by D.J. (phppp at xoops.org) for xoops.org.cn
// You are appreciated to report any inappropriate translation to xoops.org.cn
//////////////////////////////////////////////////////////////////////////////////////////
?>