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
define('_MI_XFS_NAME', '�峹����');

// A brief description of this module
// WF -> XF
define('_MI_XFS_DESC','�إߤ峹�b�ۭq���O��,�]�i�W���ɮצb�峹��');

// Names of blocks for this module (Not all module has blocks)
// WF -> XF
define('_MI_XFS_BNAME','�̷s���峹');
define('_MI_XFS_BNAME_MENU','�峹���');
define('_MI_XFS_TOPICS','�峹�D�D');
define('_MI_XFS_BNAME3','���j�峹');
define('_MI_XFS_BNAME4','�����峹');
define('_MI_XFS_BNAME5','�̷s�峹');
define('_MI_XFS_BNAME6','�峹�U��');
define('_MI_XFS_BNAME_ARTMENU','�峹�s��');

// Sub menus in main menu block
define('_MI_XFS_SUBMIT','���Ѥ峹');
define('_MI_XFS_POPULAR','����');
define('_MI_XFS_RATEFILE','����');

// rename WFS to XFS
// multiple install of same module
if ( !defined("_WFS_MODINFO_PHP") ) 
{
define("_WFS_MODINFO_PHP",1);

// Names of admin menu items
define('_MI_WFS_ADMENU1','�]�w');
define('_MI_WFS_ADMENU2','���ޭ��޲z');
define('_MI_WFS_ADMENU3','���|�޲z');
define('_MI_WFS_ADMENU4','���O�޲z');
define('_MI_WFS_ADMENU5','�峹�޲z');
define('_MI_WFS_ADMENU6','-- �إ߷s�峹');
define('_MI_WFS_ADMENU7','�ɮ׺޲z');
define('_MI_WFS_ADMENU8','�C�X�����`�U����');
define('_MI_WFS_ADMENU9','�C�X���Ѫ��峹');
define('_MI_WFS_ADMENU10','���Ǻ޲z');
define('_MI_WFS_ADMENU11','�峹�U��');

// add menu: bulk import
define('_MI_WFS_ADMENU12','�j�q�פJHTML��');
}

?>