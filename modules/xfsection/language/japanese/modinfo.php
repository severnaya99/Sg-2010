<?php
// $Id: modinfo.php,v 1.2 2005/06/20 15:03:23 ohwada Exp $

// 2004/07/01 K.OHWADA
// WFsection 2.01 対応
// メニュー名が変更になっているので、WFS -> XFS とした

// 2004/07/01 K.OHWADA
// メニュー項目の日本語を一部変更

// 2004/02/27 K.OHWADA
// メニュー項目の日本語を一部変更

// 2003/10/11 K.OHWADA
// multiple install of same module
// rename WFS -> XFS
// rename WFセクション to XFセクション
// add menu: bulk import

// Module Info

// The name of this module
// WF -> XF
define('_MI_XFS_NAME', 'XFセクション');

// A brief description of this module
// WF -> XF
define('_MI_XFS_DESC','');

// Names of blocks for this module (Not all module has blocks)
// WF -> XF
define('_MI_XFS_BNAME','XFセクションの新着記事');
define('_MI_XFS_BNAME_MENU','XFセクション のメニュー');	
define('_MI_XFS_TOPICS','XFセクションのトピックス');
define('_MI_XFS_BNAME3','XFセクションの重要な記事');
define('_MI_XFS_BNAME4','XFセクションの良く読まれた記事');
define('_MI_XFS_BNAME5','XFセクションの新着記事');
define('_MI_XFS_BNAME6','XFセクションのダウンロード');	
define('_MI_XFS_BNAME_ARTMENU','XFセクションの記事リンク');

// Sub menus in main menu block
// WF -> XF
define('_MI_XFS_SUBMIT','記事の投稿');
define('_MI_XFS_POPULAR','人気の記事');
define('_MI_XFS_RATEFILE','高評価の記事');

// WFsection 2.01 対応
// WF -> XF
if ( !defined("_XFS_MODINFO_PHP") ) 
{
define("_XFS_MODINFO_PHP",1);

// Names of admin menu items
define('_MI_XFS_ADMENU1','一般設定');
define('_MI_XFS_ADMENU2','インデックスページ管理');
define('_MI_XFS_ADMENU3','パス管理');
define('_MI_XFS_ADMENU4','カテゴリ管理');
define('_MI_XFS_ADMENU5','記事管理');
define('_MI_XFS_ADMENU6','--新規記事の作成');
define('_MI_XFS_ADMENU7','アップロードファイル管理');
define('_MI_XFS_ADMENU8','ファイル破損一覧');
define('_MI_XFS_ADMENU9','承認待ち記事一覧');
define('_MI_XFS_ADMENU10','ウェート管理');
define('_MI_XFS_ADMENU11','添付ファイル管理');

// add menu: bulk import
define('_MI_XFS_ADMENU12','HTMLファイルの一括登録');
}

// translated into Japanse by HAL
// based on WF-Section V1.0 english/modinfo.php 25/06/2003
// http://www.adslnet.org/
?>
