<?php
// Module Info

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MI_LOADED' ) ) {



// Appended by Xoops Language Checker -GIJOE- in 2006-05-26 06:00:52
define('_ALBM_MYALBUM_ADMENU_MYTPLSADMIN','Templates');

// Appended by Xoops Language Checker -GIJOE- in 2004-10-04 16:06:32
define('_ALBM_CFG_DEFAULTORDER','Default order in category\'s view');

define( 'MYALBUM_MI_LOADED' , 1 ) ;

// The name of this module
define("_ALBM_MYALBUM_NAME","�������");

// A brief description of this module
define("_ALBM_MYALBUM_DESC","��������Ա��û����� ��Ѱ/����/���� �������ͼƬ��");

// Names of blocks for this module (Not all module has blocks)
define("_ALBM_BNAME_RECENT","����ͼƬ");
define("_ALBM_BNAME_HITS","����ͼƬ");
define("_ALBM_BNAME_RANDOM","���ͼƬ");
define('_ALBM_BNAME_RECENT_P','����ͼƬ(����ͼ )');
define('_ALBM_BNAME_HITS_P','����ͼƬ(����ͼ )');

// Config Items
define( "_ALBM_CFG_PHOTOSPATH" , "ͼƬ��ŵ�·��" ) ;
define( "_ALBM_CFG_DESCPHOTOSPATH" , "·��Ӧ�ô�����XOOPSϵͳĿ¼��.<br />(·������Ӧ���� '/'��ʼ. ���Ҳ��� '/' ��β.)<br />���ͼƬ��Ŀ¼Ȩ�������� UNIX ϵͳ��Ϊ777��707." ) ;
define( "_ALBM_CFG_THUMBSPATH" , "����ͼ��ŵ�·��" ) ;
define( "_ALBM_CFG_DESCTHUMBSPATH" , "·��Ӧ�ô�����XOOPSϵͳĿ¼��.<br />(·������Ӧ���� '/'��ʼ. ���Ҳ��� '/' ��β.)<br />���������ͼ��Ŀ¼Ȩ�������� UNIX ϵͳ��Ϊ777��707." ) ;
//define( "_ALBM_CFG_USEIMAGICK" , "ʹ�� ImageMagick ����������ͼ��" ) ;
//define( "_ALBM_CFG_DESCIMAGICK" , "��(��)ʹ�� GD. (GD���޷���������תͼƬ)<br />�����뾡����ʹ�� ImageMagick��" ) ;
define('_ALBM_CFG_IMAGINGPIPE','����ͼƬ�������');
define('_ALBM_CFG_DESCIMAGINGPIPE','�������� PHP ��������ʹ��GD. ����GD�ӹ���������������������ͼ�ο�.<br />������ʹ�� ImageMagick �� NetPBM.');
define('_ALBM_CFG_FORCEGD2','ǿ�� GD2 ת��');
define('_ALBM_CFG_DESCFORCEGD2','��ʹGD����PHP�󶨵İ汾��Ҳ��ǿ�ƽ���GD 2ת��.<br />ĳЩPHP�޷���GD2��������������ͼ<br />������ֻ��GD��������');
define( "_ALBM_CFG_IMAGICKPATH" , "ImageMagick ��·��" ) ;
define( "_ALBM_CFG_DESCIMAGICKPATH" , "������·��<br />(·������������ '/' ��β.)" ) ;
define('_ALBM_CFG_NETPBMPATH','NetPBM ��·��');
define('_ALBM_CFG_DESCNETPBMPATH','\'pnmscale\'�ȵ�����·��.<br />(������ \'/\' ��β.)<br />������ֻ�� NetPBM ��������');
define( "_ALBM_CFG_POPULAR" , "����������β��ܳ�Ϊ����ͼƬ��" ) ;
define( "_ALBM_CFG_NEWDAYS" , "'��'��&'����'���ʱ��" ) ;
define( "_ALBM_CFG_NEWPHOTOS" , "��ҳ��ʾ����ͼƬ��������" ) ;
define( "_ALBM_CFG_PERPAGE" , "ÿҳ��ʾ����ͼƬ��" ) ;
define('_ALBM_CFG_DESCPERPAGE','�����ѡ����Ŀ���� \'|\' ���<br />��) 10|20|50|100');
define('_ALBM_CFG_ALLOWNOIMAGE','�����ύ��ͼƬ�ļ�');
define( "_ALBM_CFG_MAKETHUMB" , "��������ͼ��" ) ;
define( "_ALBM_CFG_DESCMAKETHUMB" , "������ '��' ��Ϊ '��',���������ִ�� '�ؽ�����ͼ'." ) ;
//define( "_ALBM_CFG_THUMBWIDTH" , "����ͼ��ȣ�" ) ;
//define('_ALBM_CFG_DESCTHUMBWIDTH','The height of thumbs will be decided from the width automatically.');
define('_ALBM_CFG_THUMBSIZE','����ͼ�ߴ� (pixel)');
define('_ALBM_CFG_THUMBRULE','��������ͼ�ļ������');
define( "_ALBM_CFG_WIDTH" , "ͼƬ����ȣ�" ) ;
define( "_ALBM_CFG_DESCWIDTH" , "�����ʹ��ImageMagick,������ȴ�С���������趨.<br />�������ʹ��ImageMagick, ��������ǿ������." ) ;
define( "_ALBM_CFG_HEIGHT" , "ͼƬ���߶ȣ�" ) ;
define( "_ALBM_CFG_DESCHEIGHT" , "�����ʹ��ImageMagick,�����߶ȴ�С���������趨.<br />�������ʹ��ImageMagick, ��������Ǹ߶�����." ) ;
define( "_ALBM_CFG_FSIZE" , "��������ļ���С��" ) ;
define( "_ALBM_CFG_DESCFSIZE" , "�����ϴ�ͼƬ�ļ��Ĵ�С." ) ;
define('_ALBM_CFG_MIDDLEPIXEL','ͼƬ��ʾ��ͼƬ�����ߴ�');
define('_ALBM_CFG_DESCMIDDLEPIXEL','�趨 (��)x(��)<br /��) 480x480');
define( "_ALBM_CFG_ADDPOSTS" , "����Ա����һ��ͼƬ��,��Ա��������Ҫ����Ϊ��" ) ;
define( "_ALBM_CFG_DESCADDPOSTS" , "һ����Ϊ��0 �� 1.������0Ϊ0��" ) ;
define('_ALBM_CFG_CATONSUBMENU','��������������Ӳ˵���');
define('_ALBM_CFG_NAMEORUNAME','��ʾ�ķ�����');
define('_ALBM_CFG_DESCNAMEORUNAME','ѡ����ʾ��������');
define( "_ALBM_CFG_VIEWCATTYPE" , "����鿴��ʽ" ) ;
define('_ALBM_CFG_COLSOFTABLEVIEW','ѡ����ʾ������');
define('_ALBM_CFG_ALLOWEDEXTS','�����ϴ����ļ���չ��');
define('_ALBM_CFG_DESCALLOWEDEXTS','�����������չ������ \'|\' ���. (���� \'jpg|jpeg|gif|png\') .<br />�����ΪСдӢ����ĸ������. ���ܲ���ո��');
define('_ALBM_CFG_ALLOWEDMIME','�ɱ��ϴ���MIME����');
define('_ALBM_CFG_DESCALLOWEDMIME','����ɱ��ϴ���MIME���ͣ��� \'|\' ���. (���� \'image/gif|image/jpeg|image/png\')<br />���ϣ�����MIME����, �˴�������');
define('_ALBM_CFG_USESITEIMG','��xoopsͼƬ������ʹ�� [siteimg]');
define('_ALBM_CFG_DESCUSESITEIMG','xoopsͼƬ����ʹ�� [siteimg] ������ԭ���� [img].<br />Ϊ��ʹ�� [siteimg]��������޸� module.textsanitizer.php �����ģ��');

define('_ALBM_OPT_USENAME','��ʵ����');
define('_ALBM_OPT_USEUNAME','��½��');

define('_ALBUM_OPT_CALCFROMWIDTH','���:ָ��  �߶�:�Զ�');
define('_ALBUM_OPT_CALCFROMHEIGHT','���:�Զ�  �߶�:ָ��');
define('_ALBUM_OPT_CALCWHINSIDEBOX','��ʾ��ָ��������');

define('_ALBM_OPT_VIEWLIST','����ʾ');
define('_ALBM_OPT_VIEWTABLE','�б���ʾ');


// Sub menu titles
define("_ALBM_TEXT_SMNAME1","�ϴ�ͼƬ");
define("_ALBM_TEXT_SMNAME2","����ͼƬ");
define("_ALBM_TEXT_SMNAME3","����ͼƬ");
define("_ALBM_TEXT_SMNAME4","�ҵ�ͼƬ");

// Names of admin menu items
define("_ALBM_MYALBUM_ADMENU0","����ϴ�ͼƬ");
define("_ALBM_MYALBUM_ADMENU1","ͼƬ����/ɾ��");
define("_ALBM_MYALBUM_ADMENU2","����/�޸�/ɾ�� ͼƬ����");
define('_ALBM_MYALBUM_ADMENU_GPERM','Ȩ���趨');
define("_ALBM_MYALBUM_ADMENU3","���ͼƬģ�����Ͽ�");
define("_ALBM_MYALBUM_ADMENU4","ͼƬ�����ϴ�");
define("_ALBM_MYALBUM_ADMENU5","�ؽ�����ͼ");
define('_ALBM_MYALBUM_ADMENU_IMPORT','����ͼƬ');
define('_ALBM_MYALBUM_ADMENU_EXPORT','����ͼƬ');
define('_ALBM_MYALBUM_ADMENU_MYBLOCKSADMIN','��ʾ�����Ⱥ�����');


// Text for notifications
define('_MI_MYALBUM_GLOBAL_NOTIFY','ȫ��');
define('_MI_MYALBUM_GLOBAL_NOTIFYDSC','����ȫ��֪ͨ');
define('_MI_MYALBUM_CATEGORY_NOTIFY','����');
define('_MI_MYALBUM_CATEGORY_NOTIFYDSC','��ǰͼƬ����֪ͨѡ��');
define('_MI_MYALBUM_PHOTO_NOTIFY','ͼƬ');
define('_MI_MYALBUM_PHOTO_NOTIFYDSC','��ǰͼƬ֪ͨѡ��');

define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFY','��ͼƬ');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYCAP','�����κ���ͼƬ����ʱ֪ͨ��');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYDSC','�����κ���ͼƬ����ʱ��ȡ֪ͨ');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYSBJ','[{X_SITENAME}] {X_MODULE}: �Զ�֪ͨ : ��ͼƬ����');

define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFY','��ͼƬ');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYCAP','���÷���������ͼƬ����ʱ֪ͨ��');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYDSC','���÷���������ͼƬ����ʱ��ȡ֪ͨ');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYSBJ','[{X_SITENAME}] {X_MODULE}: �Զ�֪ͨ : ��ͼƬ����');

}


//////////////////////////////////////////////////////////////////////////////////////////
// �ü������ĺ����� D.J. (phppp at xoops.org) Ϊ xoops.org.cn ���
// ����������κ��йغ��������⣬����ϵ xoops.org.cn
// The Simplified Chinese pack was made by D.J. (phppp at xoops.org) for xoops.org.cn
// You are appreciated to report any inappropriate translation to xoops.org.cn
//////////////////////////////////////////////////////////////////////////////////////////
?>
