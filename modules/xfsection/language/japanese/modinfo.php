<?php
// $Id: modinfo.php,v 1.2 2005/06/20 15:03:23 ohwada Exp $

// 2004/07/01 K.OHWADA
// WFsection 2.01 �б�
// ��˥塼̾���ѹ��ˤʤäƤ���Τǡ�WFS -> XFS �Ȥ���

// 2004/07/01 K.OHWADA
// ��˥塼���ܤ����ܸ������ѹ�

// 2004/02/27 K.OHWADA
// ��˥塼���ܤ����ܸ������ѹ�

// 2003/10/11 K.OHWADA
// multiple install of same module
// rename WFS -> XFS
// rename WF��������� to XF���������
// add menu: bulk import

// Module Info

// The name of this module
// WF -> XF
define('_MI_XFS_NAME', 'XF���������');

// A brief description of this module
// WF -> XF
define('_MI_XFS_DESC','');

// Names of blocks for this module (Not all module has blocks)
// WF -> XF
define('_MI_XFS_BNAME','XF���������ο��嵭��');
define('_MI_XFS_BNAME_MENU','XF��������� �Υ�˥塼');	
define('_MI_XFS_TOPICS','XF���������Υȥԥå���');
define('_MI_XFS_BNAME3','XF���������ν��פʵ���');
define('_MI_XFS_BNAME4','XF�����������ɤ��ɤޤ줿����');
define('_MI_XFS_BNAME5','XF���������ο��嵭��');
define('_MI_XFS_BNAME6','XF���������Υ��������');	
define('_MI_XFS_BNAME_ARTMENU','XF���������ε������');

// Sub menus in main menu block
// WF -> XF
define('_MI_XFS_SUBMIT','���������');
define('_MI_XFS_POPULAR','�͵��ε���');
define('_MI_XFS_RATEFILE','��ɾ���ε���');

// WFsection 2.01 �б�
// WF -> XF
if ( !defined("_XFS_MODINFO_PHP") ) 
{
define("_XFS_MODINFO_PHP",1);

// Names of admin menu items
define('_MI_XFS_ADMENU1','��������');
define('_MI_XFS_ADMENU2','����ǥå����ڡ�������');
define('_MI_XFS_ADMENU3','�ѥ�����');
define('_MI_XFS_ADMENU4','���ƥ������');
define('_MI_XFS_ADMENU5','��������');
define('_MI_XFS_ADMENU6','--���������κ���');
define('_MI_XFS_ADMENU7','���åץ��ɥե��������');
define('_MI_XFS_ADMENU8','�ե�������»����');
define('_MI_XFS_ADMENU9','��ǧ�Ԥ���������');
define('_MI_XFS_ADMENU10','�������ȴ���');
define('_MI_XFS_ADMENU11','ź�եե��������');

// add menu: bulk import
define('_MI_XFS_ADMENU12','HTML�ե�����ΰ����Ͽ');
}

// translated into Japanse by HAL
// based on WF-Section V1.0 english/modinfo.php 25/06/2003
// http://www.adslnet.org/
?>
