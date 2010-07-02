<?php
<?php
// $Id: modinfo.php,v 1.2 2006/01/04 09:58:26 ohwada Exp $

// 2004/07/01 K.OHWADA
// WFsection 2.01 correspondence 
// rename WFS to XFS, since menu name had been change

// 2003/11/21 K.OHWADA
// multiple install of same module
// rename WFS -> XFS
// rename WF-Section to XF-Section
// add menu: bulk import

// Module Info

// The name of this module
// WF -> XF
define('_MI_XFS_NAME', '文章分類');

// A brief description of this module
// WF -> XF
define('_MI_XFS_DESC','建立文章在自訂類別中,也可上傳檔案在文章中');

// Names of blocks for this module (Not all module has blocks)
// WF -> XF
define('_MI_XFS_BNAME','最新的文章');
define('_MI_XFS_BNAME_MENU','文章選單');
define('_MI_XFS_TOPICS','文章主題');
define('_MI_XFS_BNAME3','重大文章');
define('_MI_XFS_BNAME4','熱門文章');
define('_MI_XFS_BNAME5','最新文章');
define('_MI_XFS_BNAME6','文章下載');
define('_MI_XFS_BNAME_ARTMENU','文章連結');

// Sub menus in main menu block
define('_MI_XFS_SUBMIT','提供文章');
define('_MI_XFS_POPULAR','熱門');
define('_MI_XFS_RATEFILE','評分');

// rename WFS to XFS
// multiple install of same module
if ( !defined("_WFS_MODINFO_PHP") ) 
{
define("_WFS_MODINFO_PHP",1);

// Names of admin menu items
define('_MI_WFS_ADMENU1','設定');
define('_MI_WFS_ADMENU2','索引頁管理');
define('_MI_WFS_ADMENU3','路徑管理');
define('_MI_WFS_ADMENU4','類別管理');
define('_MI_WFS_ADMENU5','文章管理');
define('_MI_WFS_ADMENU6','-- 建立新文章');
define('_MI_WFS_ADMENU7','檔案管理');
define('_MI_WFS_ADMENU8','列出不正常下載表');
define('_MI_WFS_ADMENU9','列出提供的文章');
define('_MI_WFS_ADMENU10','順序管理');
define('_MI_WFS_ADMENU11','文章下載');

// add menu: bulk import
define('_MI_WFS_ADMENU12','大量匯入HTML檔');
}

?>