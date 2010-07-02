<?php
// $Id: init.php,v 1.2 2005/06/20 15:03:23 ohwada Exp $

// 2004/02/26 K.OHWADA
// dummy for non multibyte environment

// 2002/11/21 K.OHWADA
// change for XFsection
// marge init.php, pukiwiki.php, pukiwiki.ini.php, default.ini.php, ja.lng

/////////////////////////////////////////////////
// pukiwiki.php - Yet another WikiWikiWeb clone.
//
// PukiWiki 1.4.* 
//  Copyright (C) 2002 by PukiWiki Developers Team
//  http://pukiwiki.org/
/////////////////////////////////////////////////

/////////////////////////////////////////////////
// プログラムファイル読み込み
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/wiki/make_link.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/wiki/func.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/wiki/file.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/wiki/plugin.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/wiki/html.php';

// dummy for non multibyte environment
if (!extension_loaded('mbstring') && !function_exists('mb_convert_encoding'))
{	include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/include/mb_dummy.php';	
}

/////////////////////////////////////////////////
// PukiWiki - Yet another WikiWikiWeb clone.
//
// $Id: init.php,v 1.2 2005/06/20 15:03:23 ohwada Exp $
//

/////////////////////////////////////////////////
// データの格納ディレクトリ
define('DATA_DIR','');
/////////////////////////////////////////////////
// プラグインファイル格納先ディレクトリ
define('PLUGIN_DIR','');

/////////////////////////////////////////////////
// 初期設定 (グローバル変数)
// サーバから来る変数
$vars = array();
// 脚注
$foot_explain = array();
// 関連するページ
$related = array();

/////////////////////////////////////////////////
// 初期設定($WikiName,$BracketNameなど)
// $WikiName = '[A-Z][a-z]+(?:[A-Z][a-z]+)+';
// $WikiName = '\b[A-Z][a-z]+(?:[A-Z][a-z]+)+\b';
// $WikiName = '(?<![[:alnum:]])(?:[[:upper:]][[:lower:]]+){2,}(?![[:alnum:]])';
// $WikiName = '(?<!\w)(?:[A-Z][a-z]+){2,}(?!\w)';
// BugTrack/304暫定対処
$WikiName = '(?:[A-Z][a-z]+){2,}(?!\w)';
// $BracketName = ':?[^\s\]#&<>":]+:?';
$BracketName = '(?!\s):?[^\r\n\t\f\[\]<>#&":]+:?(?<!\s)';
// InterWiki
$InterWikiName = "(\[\[)?((?:(?!\s|:|\]\]).)+):(.+)(?(1)\]\])";
// 注釈
$NotePattern = '/\(\(((?:(?>(?:(?!\(\()(?!\)\)(?:[^\)]|$)).)+)|(?R))*)\)\)/ex';

// 実体参照パターンおよびシステムで使用するパターンを$line_rulesに加える
$line_rules = array();


/////////////////////////////////////////////////
// PukiWiki - Yet another WikiWikiWeb clone.
//
// $Id: init.php,v 1.2 2005/06/20 15:03:23 ohwada Exp $
//
// PukiWiki setting file

/////////////////////////////////////////////////
// index.php などに変更した場合のスクリプト名の設定
// とくに設定しなくても問題なし
$script = XOOPS_URL.'/modules/'.$xoopsModule->dirname().'/article.php?title=';

/////////////////////////////////////////////////
// トップページの名前
//$defaultpage = 'FrontPage';
$defaultpage = '';

/////////////////////////////////////////////////
// InterWikiNameページの名前
//$interwiki = 'InterWikiName';
$interwiki = '';

/////////////////////////////////////////////////
// WikiNameを*無効に*する
$nowikiname = 0;

/////////////////////////////////////////////////
// AutoLinkを有効にする場合は、AutoLink対象となる
// ページ名の最短バイト数を指定
// AutoLinkを無効にする場合は0
$autolink = 0;


/////////////////////////////////////////////////
// PukiWiki - Yet another WikiWikiWeb clone.
//
// $Id: init.php,v 1.2 2005/06/20 15:03:23 ohwada Exp $
//
// PukiWiki setting file (user agent:default)

/////////////////////////////////////////////////
// WikiName,BracketNameに経過時間を付加する
$show_passage = 0;

/////////////////////////////////////////////////
// リンク表示をコンパクトにする
$link_compact = 0;


/////////////////////////////////////////////////
// PukiWiki - Yet another WikiWikiWeb clone.
//
// $Id: init.php,v 1.2 2005/06/20 15:03:23 ohwada Exp $
//
// PukiWiki message file (japanese)

///////////////////////////////////////
// symbols
$_symbol_noexists = '?';

?>
