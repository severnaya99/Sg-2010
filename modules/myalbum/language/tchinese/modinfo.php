<?php
// Module Info

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MI_LOADED' ) ) {

define( 'MYALBUM_MI_LOADED' , 1 ) ;

// The name of this module
define("_ALBM_MYALBUM_NAME","�q�l��ï");

// A brief description of this module
define("_ALBM_MYALBUM_DESC","�إ߬ۤ�ï�H�K�Τ�i�H �j�M/�o�G/���� ���ɦU�جۤ�");

//slideshow
define( "_ALBM_CFG_lINTERVAL" , "�Ы��w�q�Ϫ���ܤ����覡�C" ) ;
define( "_ALBM_CFG_DESClINTERVAL" , "�q�Ϯɹ��ɤ������ɶ��A�w�]�O�]5000=5��^" ) ;
define( "_ALBM_CFG_TRANSITION" , "���w�q�Ϫ������覡�C" ) ;
define( "_ALBM_CFG_DESCTRANSITION" , "�i�H���w�q�Ϫ������]transition�^�w�]�ȬO�u23�v�H�����w" ) ;
//slideshow end
//slideshow
define( "_ALBM_OPT_TRANSITION0" , "�|���]�V�����^" ) ;
define( "_ALBM_OPT_TRANSITION1" , "�|���]���~���^" ) ;
define( "_ALBM_OPT_TRANSITION2" , "��Ρ]�V�����^" ) ;
define( "_ALBM_OPT_TRANSITION3" , "��Ρ]���~���^" ) ;
define( "_ALBM_OPT_TRANSITION4" , "�ѤU���W" ) ;
define( "_ALBM_OPT_TRANSITION5" , "�ѤW���U" ) ;
define( "_ALBM_OPT_TRANSITION6" , "�ѥ��V�k" ) ;
define( "_ALBM_OPT_TRANSITION7" , "�ѥk�V��" ) ;
define( "_ALBM_OPT_TRANSITION8" , "�ʸ������]�a�^" ) ;
define( "_ALBM_OPT_TRANSITION9" , "�ʸ������]��^" ) ;
define( "_ALBM_OPT_TRANSITION10" , "���l�Ҧ��]��^" ) ;
define( "_ALBM_OPT_TRANSITION11" , "���l�Ҧ��]�a�^" ) ;
define( "_ALBM_OPT_TRANSITION12" , "�I�������{�Ҧ�" ) ;
define( "_ALBM_OPT_TRANSITION13" , "�Ѩⰼ�]���k�V�����^" ) ;
define( "_ALBM_OPT_TRANSITION14" , "�Ѩⰼ�]���������k�^" ) ;
define( "_ALBM_OPT_TRANSITION15" , "�Ѩⰼ�]�W�U�������^" ) ;
define( "_ALBM_OPT_TRANSITION16" , "�Ѩⰼ�]�����V�W�U�^" ) ;
define( "_ALBM_OPT_TRANSITION17" , "�ר����]�k�W�V���U�^" ) ;
define( "_ALBM_OPT_TRANSITION18" , "�ר����]�k�U�����W�^" ) ;
define( "_ALBM_OPT_TRANSITION19" , "�ר����]���W���k�U�^" ) ;
define( "_ALBM_OPT_TRANSITION20" , "�ר����]���U�V�k�W�^" ) ;
define( "_ALBM_OPT_TRANSITION21" , "�H���u���]��^" ) ;
define( "_ALBM_OPT_TRANSITION22" , "�H���u���]�a�^" ) ;
define( "_ALBM_OPT_TRANSITION23" , "�H��" ) ;
//slideshow end

// Names of blocks for this module (Not all module has blocks)
define("_ALBM_BNAME_RECENT","�̷s�ۤ�");
define("_ALBM_BNAME_HITS","�����ۤ�");
define("_ALBM_BNAME_RANDOM","�H���ۤ�");
define("_ALBM_BNAME_RECENT_P","�s�i�ۤ��Y��");
define("_ALBM_BNAME_HITS_P","�����ۤ��Y��");

// Config Items
define("_ALBM_CFG_PHOTOSPATH","�ۤ��s�񪺸��|");
define("_ALBM_CFG_DESCPHOTOSPATH","���|���Ӧs�b�w�˨� XOOPS �t�Ϊ��ؿ��̡C<br />(���|�W�����ӥH '/'�}�l�A�ӥB���i�H '/' �����C)<br />�Ӧs��ۤ����ؿ��v���ݩʦb UNIX �t�γ]�� 777 �� 707�C");
define("_ALBM_CFG_THUMBSPATH","�Y�Ϧs�񪺸��|");
define("_ALBM_CFG_DESCTHUMBSPATH","���|���Ӧs�b�w�˨� XOOPS �t�Ϊ��ؿ��̡C<br />(���|�W�����ӥH '/'�}�l�A�ӥB���i�H '/' �����C)<br />�Ӧs��ۤ����ؿ��v���ݩʦb UNIX �t�γ]�� 777 �� 707�C.");
//define("_ALBM_CFG_USEIMAGICK","�ϥ� ImageMagick �ӳB�z����");
//define("_ALBM_CFG_DESCIMAGICK","��(�_)��ܨϥ� GD �C(�N�L�k�ܧ�P����ۤ�)<br />�ҥH�кɥi��ϥ� ImageMagick�C");
define("_ALBM_CFG_IMAGINGPIPE","�ۤ��B�z�M��");
define("_ALBM_CFG_DESCIMAGINGPIPE","�X�G PHP ���ү�ϥ� GD �A���O GD ���\��C��t�~�G�ӮM��C<br />�p�G�i�H�A�z�̦n�ϥ� ImageMagick �Ϊ� NetPBM�C");
define("_ALBM_CFG_FORCEGD2","�j��ϥ� GD2 �ഫ");
define("_ALBM_CFG_DESCFORCEGD2","�Y�� PHP ���]�� GD �����O�j�� GD2 (���m) �ഫ�C<br />���� PHP �]�w�� GD2 �إ��Y�ϥ��ѡC<br />�o�ӳ]�w�u���b�ϥ� GD �O���N�q���C");
define("_ALBM_CFG_IMAGICKPATH","ImageMagick �����|");
define("_ALBM_CFG_DESCIMAGICKPATH","'convert' ��������|�C<br />(���|�W�ٽФťH '/' �����C)<br />�o�ӳ]�w�u���b�ϥ� ImageMagick �O���N�q���C");
define("_ALBM_CFG_NETPBMPATH","NetPBM �����|");
define("_ALBM_CFG_DESCNETPBMPATH","\'pnmscale\' ��������|�C<br />(���|�W�ٽФťH \'/\' �����C)<br />�o�ӳ]�w�u���b�ϥ� NetPBM �O���N�q���C");
define("_ALBM_CFG_POPULAR","���������ۤ����I�\����");
define("_ALBM_CFG_NEWDAYS","�Хܬ�'�s'&'��s'�ϼЪ����j���");
define("_ALBM_CFG_NEWPHOTOS","�����i�ܷs�i�ۤ����ƶq�G");
define("_ALBM_CFG_DEFAULTORDER","�w�]�������ۤ��i�ܶ���");
define("_ALBM_CFG_PERPAGE","�C���i�ܴX�i�ۤ��G");
define("_ALBM_CFG_DESCPERPAGE","��J�ﶵ�Ʀr�åH \'|\' �Ӥ��j�C(�Ҧp�G 10|20|50|100)");
define("_ALBM_CFG_ALLOWNOIMAGE","���\�S���ۤ�������");
define("_ALBM_CFG_MAKETHUMB","�إ��Y�ϡG");
define("_ALBM_CFG_DESCMAKETHUMB","��z�N '�_' �אּ '�O'�A�z�̦n���s���� '�����Y��'�C");
//define("_ALBM_CFG_THUMBWIDTH","�Y�ϼe�סG");
//define("_ALBM_CFG_DESCTHUMBWIDTH","�Y�Ϫ����׷|�̾ڼe�ת��]�w�Ȧ۰ʧ���.");
define("_ALBM_CFG_THUMBSIZE","�Y�Ϫ��ؤo (pixel)");
define("_ALBM_CFG_THUMBRULE","�Y�ϫإߪ��p��W�h");
define("_ALBM_CFG_WIDTH","�ۤ��̤j�e�סG");
define("_ALBM_CFG_DESCWIDTH","�p�G�z�ϥ� ImageMagick �A�h�N��e�פj�p�N�|���s�]�w�C<br />�p�G���O�ϥ� ImageMagick�A�h�N��o�O�e�׭���C");
define("_ALBM_CFG_HEIGHT","�ۤ��̤j���סG");
define("_ALBM_CFG_DESCHEIGHT","�p�G�z�ϥ� ImageMagick �A�h�N���פj�p�N�|���s�]�w�C<br />�p�G���O�ϥ� ImageMagick �A�h�N��o�O���׭���C");
define("_ALBM_CFG_FSIZE","�̤j�ɮפj�p�G");
define("_ALBM_CFG_DESCFSIZE","����W�Ǭۤ��ɮפ��j�p (byte)�C<br />1048576 byte = 1 MB");
define("_ALBM_CFG_MIDDLEPIXEL","��i�i�ܬۤ����̤j�ؤo");
define("_ALBM_CFG_DESCMIDDLEPIXEL","���w (�e)x(��)<br />�Ҧp�G480x480");
define("_ALBM_CFG_ADDPOSTS","��|���o�G�@�i�Ӥ���,�|���o��Ʃҭn�K�[�Ƭ��G");
define("_ALBM_CFG_DESCADDPOSTS","�@��]���G0 �� 1 (�C��0�N��0)");
define("_ALBM_CFG_CATONSUBMENU","��ܥD�����󦸿��");
define("_ALBM_CFG_NAMEORUNAME","��ܱi�K�̪��W��");
define("_ALBM_CFG_DESCNAMEORUNAME","�����ܡu�u��m�W�v�Ρu�b���v");
define("_ALBM_CFG_VIEWCATTYPE","��������ܬۤ�������");
define("_ALBM_CFG_COLSOFTABLEVIEW","�Y�Ϧ���ܪ�����");
define("_ALBM_CFG_ALLOWEDEXTS","���\�W�Ǫ����ɦW");
define("_ALBM_CFG_DESCALLOWEDEXTS","��J���ɦW�åH \'|\' ���j�C(�Ҧp�G\'jpg|jpeg|gif|png\')<br />�r�����������O�p�g�A���n���J�y��(.)�Ϊť���C");
define("_ALBM_CFG_ALLOWEDMIME","���\�W�Ǫ� MIME ����");
define("_ALBM_CFG_DESCALLOWEDMIME","��J MIME �����åH \'|\' ���j�C(�Ҧp�G\'image/gif|image/jpeg|image/png\')<br />�b�o�̪ťծɡA�N��z�Q MIME �����ˬd�C");
define("_ALBM_CFG_USESITEIMG","�ϥ� [siteimg] �b�Ϯ׺޲z������X");
define("_ALBM_CFG_DESCUSESITEIMG","�Ϯ׺޲z������X���H [siteimg] ���N [img]�C<br />�p�S���z���� HACK module.textsanitizer.php �ҥ� [siteimg] ���ҡC<br />XOOPS�зǹw�]�õL�����C");

define("_ALBM_OPT_USENAME","�u��m�W");
define("_ALBM_OPT_USEUNAME","�b��");

define("_ALBUM_OPT_CALCFROMWIDTH","�e��:���w �F ����:�۰�");
define("_ALBUM_OPT_CALCFROMHEIGHT","�e��:�۰� �F ����:���w");
define("_ALBUM_OPT_CALCWHINSIDEBOX","�L�ת��e�A�H���j�Ȥ@��۰ʽվ�");

define("_ALBM_OPT_VIEWLIST","�ԦC�����");
define("_ALBM_OPT_VIEWTABLE","�Y�Ϧ����");


// Sub menu titles
define("_ALBM_TEXT_SMNAME1","�W�Ǭۤ�");
define("_ALBM_TEXT_SMNAME2","�����ۤ�");
define("_ALBM_TEXT_SMNAME3","�u��ۤ�");
define("_ALBM_TEXT_SMNAME4","�ڪ��ۤ�");

// Names of admin menu items
define("_ALBM_MYALBUM_ADMENU0","�f�֤W�Ǭۤ�");
define("_ALBM_MYALBUM_ADMENU1","�ۤ��޲z");
define("_ALBM_MYALBUM_ADMENU2","�s��/�s�W/�R�� �ۤ�����");
define("_ALBM_MYALBUM_ADMENU_GPERM","�v���޲z");
define("_ALBM_MYALBUM_ADMENU3","�ˬd�պA�P���ҳ]�w");
define("_ALBM_MYALBUM_ADMENU4","�ۤ��妸�W��");
define("_ALBM_MYALBUM_ADMENU5","�����Y��");
define("_ALBM_MYALBUM_ADMENU_IMPORT","�פJ�ۤ�");
define("_ALBM_MYALBUM_ADMENU_EXPORT","�ץX�ۤ�");
define("_ALBM_MYALBUM_ADMENU_MYBLOCKSADMIN","�϶��θs�պ޲z");
define("_ALBM_MYALBUM_ADMENU_MYTPLSADMIN","�˪O�޲z");


// Text for notifications
define("_MI_MYALBUM_GLOBAL_NOTIFY","����q������");
define("_MI_MYALBUM_GLOBAL_NOTIFYDSC","myAlbum-P ����q������");
define("_MI_MYALBUM_CATEGORY_NOTIFY","�ۤ������q������");
define("_MI_MYALBUM_CATEGORY_NOTIFYDSC","�f�֥ثe�ۤ��������q������");
define("_MI_MYALBUM_PHOTO_NOTIFY","�ۤ��q������");
define("_MI_MYALBUM_PHOTO_NOTIFYDSC","�f�֥ثe�ۤ����q������");

define("_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFY","�s�ۤ�");
define("_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYCAP","���s�ۤ��i�K�ɳq����");
define("_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYDSC","���s�ۤ��i�K�ɦ���q��.");
define("_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYSBJ","[{X_SITENAME}] {X_MODULE}: �۰ʳq�� : �s�ۤ�");

define("_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFY","�s�ۤ�");
define("_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYCAP","���s�ۤ��i�K�b�ثe�������ɳq����");
define("_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYDSC","���s�ۤ��i�K�b�ثe�������ɦ���q��");
define("_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYSBJ","[{X_SITENAME}] {X_MODULE}: �۰ʳq�� : �s�ۤ�");

}

?>