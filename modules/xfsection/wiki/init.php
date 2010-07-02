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
// �ץ����ե������ɤ߹���
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
// �ǡ����γ�Ǽ�ǥ��쥯�ȥ�
define('DATA_DIR','');
/////////////////////////////////////////////////
// �ץ饰����ե������Ǽ��ǥ��쥯�ȥ�
define('PLUGIN_DIR','');

/////////////////////////////////////////////////
// ������� (�����Х��ѿ�)
// �����Ф�������ѿ�
$vars = array();
// ����
$foot_explain = array();
// ��Ϣ����ڡ���
$related = array();

/////////////////////////////////////////////////
// �������($WikiName,$BracketName�ʤ�)
// $WikiName = '[A-Z][a-z]+(?:[A-Z][a-z]+)+';
// $WikiName = '\b[A-Z][a-z]+(?:[A-Z][a-z]+)+\b';
// $WikiName = '(?<![[:alnum:]])(?:[[:upper:]][[:lower:]]+){2,}(?![[:alnum:]])';
// $WikiName = '(?<!\w)(?:[A-Z][a-z]+){2,}(?!\w)';
// BugTrack/304�����н�
$WikiName = '(?:[A-Z][a-z]+){2,}(?!\w)';
// $BracketName = ':?[^\s\]#&<>":]+:?';
$BracketName = '(?!\s):?[^\r\n\t\f\[\]<>#&":]+:?(?<!\s)';
// InterWiki
$InterWikiName = "(\[\[)?((?:(?!\s|:|\]\]).)+):(.+)(?(1)\]\])";
// ���
$NotePattern = '/\(\(((?:(?>(?:(?!\(\()(?!\)\)(?:[^\)]|$)).)+)|(?R))*)\)\)/ex';

// ���λ��ȥѥ����󤪤�ӥ����ƥ�ǻ��Ѥ���ѥ������$line_rules�˲ä���
$line_rules = array();


/////////////////////////////////////////////////
// PukiWiki - Yet another WikiWikiWeb clone.
//
// $Id: init.php,v 1.2 2005/06/20 15:03:23 ohwada Exp $
//
// PukiWiki setting file

/////////////////////////////////////////////////
// index.php �ʤɤ��ѹ��������Υ�����ץ�̾������
// �Ȥ������ꤷ�ʤ��Ƥ�����ʤ�
$script = XOOPS_URL.'/modules/'.$xoopsModule->dirname().'/article.php?title=';

/////////////////////////////////////////////////
// �ȥåץڡ�����̾��
//$defaultpage = 'FrontPage';
$defaultpage = '';

/////////////////////////////////////////////////
// InterWikiName�ڡ�����̾��
//$interwiki = 'InterWikiName';
$interwiki = '';

/////////////////////////////////////////////////
// WikiName��*̵����*����
$nowikiname = 0;

/////////////////////////////////////////////////
// AutoLink��ͭ���ˤ�����ϡ�AutoLink�оݤȤʤ�
// �ڡ���̾�κ�û�Х��ȿ������
// AutoLink��̵���ˤ������0
$autolink = 0;


/////////////////////////////////////////////////
// PukiWiki - Yet another WikiWikiWeb clone.
//
// $Id: init.php,v 1.2 2005/06/20 15:03:23 ohwada Exp $
//
// PukiWiki setting file (user agent:default)

/////////////////////////////////////////////////
// WikiName,BracketName�˷в���֤��ղä���
$show_passage = 0;

/////////////////////////////////////////////////
// ���ɽ���򥳥�ѥ��Ȥˤ���
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
