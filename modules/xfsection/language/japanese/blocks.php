<?php
// $Id: blocks.php,v 1.2 2005/06/20 15:03:23 ohwada Exp $

// 2004/07/01 K.OHWADA
// WFsection 2.01 対応
// 念のため、WFS -> XFS とした

// 2003/10/11 K.OHWADA
// multiple install of same module

// multiple install of same module
if ( !defined("_XFS_BLOCKS_PHP") ) 
{
define("_XFS_BLOCKS_PHP",1);

// Blocks
define("_MB_XFS_NOTYET","本日の重要な記事はありません");
define("_MB_XFS_TMRSI","本日もっとも良く読まれた記事:");
define("_MB_XFS_ORDER","表示順");
define("_MB_XFS_DATE","日付");
define("_MB_XFS_HITS","ヒット");
define("_MB_XFS_DISP","表示");
define("_MB_XFS_ARTCLS","記事");
define("_MB_XFS_CHARS","タイトルの長さ");
define("_MB_XFS_LENGTH","文字数");
define("_MB_XFS_TITLE","タイトル");
define("_MB_XFS_ARTICLEID","記事ID");
}

// translated into Japanse by HAL
// based on WF-Section V1.0 english/blocks.php 25/06/2003
// http://www.adslnet.org/
?>
