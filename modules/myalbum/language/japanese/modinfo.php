<?php
// Module Info

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MI_LOADED' ) ) {

define( 'MYALBUM_MI_LOADED' , 1 ) ;

// The name of this module
define("_ALBM_MYALBUM_NAME","�ޥ�����Х�");

// A brief description of this module
define("_ALBM_MYALBUM_DESC","��������ơ���󥯤���¾�ε�ǽ����Ĳ�����������������");

// Names of blocks for this module (Not all module has blocks)
define("_ALBM_BNAME_RECENT","�Ƕ�β���");
define("_ALBM_BNAME_HITS","�͵�����");
define("_ALBM_BNAME_RANDOM","�ԥå����åײ���");
define("_ALBM_BNAME_RECENT_P","�Ƕ�β���(������)");
define("_ALBM_BNAME_HITS_P","�͵�����(������)");

// Config Items
define( "_ALBM_CFG_PHOTOSPATH" , "�����ե��������¸��ǥ��쥯�ȥ�" ) ;
define( "_ALBM_CFG_DESCPHOTOSPATH" , "XOOPS���󥹥ȡ����褫��Υѥ������ʺǽ��'/'��ɬ�ס��Ǹ��'/'�����ס�<br />Unix�ǤϤ��Υǥ��쥯�ȥ�ؤν��°����ON�ˤ��Ʋ�����" ) ;
define( "_ALBM_CFG_THUMBSPATH" , "����ͥ���ե��������¸��ǥ��쥯�ȥ�" ) ;
define( "_ALBM_CFG_DESCTHUMBSPATH" , "�ֲ����ե��������¸��ǥ��쥯�ȥ�פ�Ʊ���Ǥ�" ) ;
// define( "_ALBM_CFG_USEIMAGICK" , "����������ImageMagick��Ȥ�" ) ;
// define( "_ALBM_CFG_DESCIMAGICK" , "�Ȥ�ʤ����ϡ��ᥤ�������Ĵ���ϵ�ǽ����������ͥ����������GD��Ȥ��ޤ���<br />��ǽ�Ǥ����ImageMagick�λ��Ѥ������Ǥ�" ) ;
define( "_ALBM_CFG_IMAGINGPIPE" , "����������Ԥ碌��ѥå���������" ) ;
define( "_ALBM_CFG_DESCIMAGINGPIPE" , "�ۤȤ�ɤ�PHP�Ķ���ɸ��Ū�����Ѳ�ǽ�ʤΤ�GD�Ǥ�����ǽŪ������ޤ�<br />��ǽ�Ǥ����ImageMagick��NetPBM�λ��Ѥ򤪴��ᤷ�ޤ�" ) ;
define( "_ALBM_CFG_FORCEGD2" , "����GD2�⡼��" ) ;
define( "_ALBM_CFG_DESCFORCEGD2" , "����Ū��GD2�⡼�ɤ�ư����ޤ�<br />������PHP�Ǥ϶���GD2�⡼�ɤǥ���ͥ�������˼��Ԥ��ޤ�<br />���������ѥå������Ȥ���GD�����򤷤����Τ߰�̣������ޤ�" ) ;
define( "_ALBM_CFG_IMAGICKPATH" , "ImageMagick�μ¹ԥѥ�" ) ;
define( "_ALBM_CFG_DESCIMAGICKPATH" , "convert��¸�ߤ���ǥ��쥯�ȥ��ե�ѥ��ǻ��ꤷ�ޤ���������Ǥ��ޤ��Ԥ����Ȥ�¿���Ǥ��礦��<br />���������ѥå������Ȥ���ImageMagick�����򤷤����Τ߰�̣������ޤ�" ) ;
define( "_ALBM_CFG_NETPBMPATH" , "NetPBM�μ¹ԥѥ�" ) ;
define( "_ALBM_CFG_DESCNETPBMPATH" , "pnmscale����¸�ߤ���ǥ��쥯�ȥ��ե�ѥ��ǻ��ꤷ�ޤ���������Ǥ��ޤ��Ԥ����Ȥ�¿���Ǥ��礦��<br />���������ѥå������Ȥ���NetPBM�����򤷤����Τ߰�̣������ޤ�" ) ;
define( "_ALBM_CFG_POPULAR" , "'POP'�������󤬤Ĥ������ɬ�פʥҥåȿ�" ) ;
define( "_ALBM_CFG_NEWDAYS" , "'new'��'update'��������ɽ�����������" ) ;
define( "_ALBM_CFG_NEWPHOTOS" , "�ȥåץڡ����ǿ��������Ȥ���ɽ�������" ) ;
define( "_ALBM_CFG_DEFAULTORDER" , "���ƥ���ɽ���ǤΥǥե����ɽ����" ) ;
define( "_ALBM_CFG_PERPAGE" , "1�ڡ�����ɽ������������" ) ;
define( "_ALBM_CFG_DESCPERPAGE" , "�����ǽ�ʿ����� | �Ƕ��ڤäƲ�����<br />��: 10|20|50|100" ) ;
define( "_ALBM_CFG_ALLOWNOIMAGE" , "�����Τʤ���Ƥ���Ĥ���" ) ;
define( "_ALBM_CFG_MAKETHUMB" , "����ͥ�����������" ) ;
define( "_ALBM_CFG_DESCMAKETHUMB" , "���������ʤ��פ������������פ��ѹ��������ˤϡ��֥���ͥ���κƹ��ۡפ�ɬ�פǤ���" ) ;
//define( "_ALBM_CFG_THUMBWIDTH" , "����ͥ����������" ) ;
//define( "_ALBM_CFG_DESCTHUMBWIDTH" , "��������륵��ͥ�������ι⤵�ϡ������鼫ư�׻�����ޤ�" ) ;
define( "_ALBM_CFG_THUMBSIZE" , "����ͥ������������(pixel)" ) ;
define( "_ALBM_CFG_THUMBRULE" , "����ͥ�������ˡ§" ) ;
define( "_ALBM_CFG_WIDTH" , "���������" ) ;
define( "_ALBM_CFG_DESCWIDTH" , "�������åץ��ɻ��˼�ưĴ�������ᥤ������κ�������<br />GD�⡼�ɤ�TrueColor�򰷤��ʤ����ˤ�ñ�ʤ륵��������" ) ;
define( "_ALBM_CFG_HEIGHT" , "���������" ) ;
define( "_ALBM_CFG_DESCHEIGHT" , "��������Ʊ����̣�Ǥ�" ) ;
define( "_ALBM_CFG_FSIZE" , "����ե����륵����" ) ;
define( "_ALBM_CFG_DESCFSIZE" , "���åץ��ɻ��Υե����륵��������(byte)" ) ;
define( "_ALBM_CFG_MIDDLEPIXEL" , "���󥰥�ӥ塼�Ǥκ������������" ) ;
define( "_ALBM_CFG_DESCMIDDLEPIXEL" , "��x�⤵ �ǻ��ꤷ�ޤ���<br />���� 480x480��" ) ;
define( "_ALBM_CFG_ADDPOSTS" , "�̿�����Ƥ������˥�����ȥ��åפ������ƿ�" ) ;
define( "_ALBM_CFG_DESCADDPOSTS" , "�ＱŪ�ˤ�0��1�Ǥ�������ͤ�0�ȸ��ʤ���ޤ�" ) ;
define( "_ALBM_CFG_CATONSUBMENU" , "���֥�˥塼�ؤΥȥåץ��ƥ��꡼����Ͽ" ) ;
define( "_ALBM_CFG_NAMEORUNAME" , "��Ƽ�̾��ɽ��" ) ;
define( "_ALBM_CFG_DESCNAMEORUNAME" , "������̾���ϥ�ɥ�̾�����򤷤Ʋ�����" ) ;define( "_ALBM_CFG_VIEWCATTYPE" , "����ɽ����ɽ��������" ) ;
define( "_ALBM_CFG_COLSOFTABLEVIEW" , "�ơ��֥�ɽ�����Υ�����" ) ;
define( "_ALBM_CFG_ALLOWEDEXTS" , "���åץ��ɵ��Ĥ���ե������ĥ��" ) ;
define( "_ALBM_CFG_DESCALLOWEDEXTS" , "�ե�����γ�ĥ�Ҥ�jpg|jpeg|gif|png �Τ褦�ˡ�'|' �Ƕ��ڤä����Ϥ��Ʋ�������<br />���٤ƾ�ʸ���ǻ��ꤷ���ԥꥪ�ɤ���������ʤ��ǲ�������<br />��̣��Ƚ�äƤ������ʳ��ϡ�php��phtml�ʤɤ��ɲä��ʤ��ǲ�����" ) ;
define( "_ALBM_CFG_ALLOWEDMIME" , "���åץ��ɵ��Ĥ���MIME������" ) ;
define( "_ALBM_CFG_DESCALLOWEDMIME" , "MIME�����פ�image/gif|image/jpeg|image/png �Τ褦�ˡ�'|' �Ƕ��ڤä����Ϥ��Ʋ�������<br />MIME�����פˤ������å���Ԥ�ʤ����ˤϡ����������ˤ��ޤ�" ) ;
define( "_ALBM_CFG_USESITEIMG" , "���᡼���ޥ͡���������Ǥ�[siteimg]����" ) ;
define( "_ALBM_CFG_DESCUSESITEIMG" , "���᡼���ޥ͡���������ǡ�[img]�����������[siteimg]��������������褦�ˤʤ�ޤ���<br />���ѥ⥸�塼��¦��[siteimg]������ͭ���˵�ǽ����褦�ˤʤäƤ���ɬ�פ�����ޤ�" ) ;

define( "_ALBM_OPT_USENAME" , "�ϥ�ɥ�̾" ) ;
define( "_ALBM_OPT_USEUNAME" , "������̾" ) ;

define( "_ALBUM_OPT_CALCFROMWIDTH" , "������ͤ����Ȥ��ơ��⤵��ư�׻�" ) ;
define( "_ALBUM_OPT_CALCFROMHEIGHT" , "������ͤ�⤵�Ȥ��ơ�����ư�׻�" ) ;
define( "_ALBUM_OPT_CALCWHINSIDEBOX" , "�����⤵���礭������������ͤˤʤ�褦��ư�׻�" ) ;

define( "_ALBM_OPT_VIEWLIST" , "����ʸ�եꥹ��ɽ��" ) ;
define( "_ALBM_OPT_VIEWTABLE" , "�ơ��֥�ɽ��" ) ;


// Sub menu titles
define("_ALBM_TEXT_SMNAME1","���");
define("_ALBM_TEXT_SMNAME2","��͵�");
define("_ALBM_TEXT_SMNAME3","�ȥåץ��");
define("_ALBM_TEXT_SMNAME4","��ʬ�����");

// Names of admin menu items
define("_ALBM_MYALBUM_ADMENU0","��Ƥ��줿�����ξ�ǧ");
define("_ALBM_MYALBUM_ADMENU1","��������");
define("_ALBM_MYALBUM_ADMENU2","���ƥ������");
define("_ALBM_MYALBUM_ADMENU_GPERM","�ƥ��롼�פθ���");
define("_ALBM_MYALBUM_ADMENU3","ư������å���");
define("_ALBM_MYALBUM_ADMENU4","���������Ͽ");
define("_ALBM_MYALBUM_ADMENU5","����ͥ���κƹ���");
define("_ALBM_MYALBUM_ADMENU_IMPORT","��������ݡ���");
define("_ALBM_MYALBUM_ADMENU_EXPORT","�����������ݡ���");
define("_ALBM_MYALBUM_ADMENU_MYBLOCKSADMIN","�֥�å���������������");
define("_ALBM_MYALBUM_ADMENU_MYTPLSADMIN","�ƥ�ץ졼�ȴ���");

// Text for notifications
define('_MI_MYALBUM_GLOBAL_NOTIFY', '�⥸�塼������');
define('_MI_MYALBUM_GLOBAL_NOTIFYDSC', 'myAlbum-P�⥸�塼�����Τˤ��������Υ��ץ����');
define('_MI_MYALBUM_CATEGORY_NOTIFY', '���ƥ��꡼');
define('_MI_MYALBUM_CATEGORY_NOTIFYDSC', '������Υ��ƥ��꡼���Ф������Υ��ץ����');
define('_MI_MYALBUM_PHOTO_NOTIFY', '�̿�');
define('_MI_MYALBUM_PHOTO_NOTIFYDSC', 'ɽ����μ̿����Ф������Υ��ץ����');

define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFY', '�����̿���Ͽ');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYCAP', '�����˼̿�����Ͽ���줿�������Τ���');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYDSC', '�����˼̿�����Ͽ���줿�������Τ���');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE}: �����˼̿�����Ͽ����ޤ���');

define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFY', '���ƥ�����ο��̿���Ͽ');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYCAP', '���Υ��ƥ���˿����˼̿�����Ͽ���줿�������Τ���');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYDSC', '���Υ��ƥ���˿����˼̿�����Ͽ���줿�������Τ���');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE}: �����˼̿�����Ͽ����ޤ���');

}

?>