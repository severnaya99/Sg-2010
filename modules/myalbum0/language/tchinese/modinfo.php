<?php
// Module Info

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MI_LOADED' ) ) {






// Appended by Xoops Language Checker -GIJOE- in 2004-10-04 16:06:32
define('_ALBM_CFG_DEFAULTORDER','Default order in category\'s view');

// Appended by Xoops Language Checker -GIJOE- in 2004-06-24 17:58:58
define('_ALBM_CFG_USESITEIMG','Use [siteimg] in ImageManager Integration');
define('_ALBM_CFG_DESCUSESITEIMG','The Integrated Image Manager input [siteimg] instead of [img].<br />You have to hack module.textsanitizer.php or each modules to enable tag of [siteimg]');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-19 13:56:05
define('_ALBM_CFG_MIDDLEPIXEL','Max image size in single view');
define('_ALBM_CFG_DESCMIDDLEPIXEL','Specify (width)x(height)<br />eg) 480x480');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-17 18:42:55
define('_ALBM_CFG_DESCPERPAGE','Input selectable numbers separated with \'|\'<br />eg) 10|20|50|100');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-05 15:14:38
define('_ALBM_CFG_ALLOWNOIMAGE','Allows a sumbit without images');
define('_ALBM_CFG_ALLOWEDEXTS','File extensions can be uploaded');
define('_ALBM_CFG_DESCALLOWEDEXTS','Input extensions with separator \'|\'. (eg \'jpg|jpeg|gif|png\') .<br />All character must be small. Don\'t insert periods or spaces');
define('_ALBM_CFG_ALLOWEDMIME','MIME Types can be uploaded');
define('_ALBM_CFG_DESCALLOWEDMIME','Input MIME Types with separator \'|\'. (eg \'image/gif|image/jpeg|image/png\')<br />If you want to be checked by MIME Type, be blank here');
define('_ALBM_MYALBUM_ADMENU_IMPORT','Import Images');
define('_ALBM_MYALBUM_ADMENU_EXPORT','Export Images');
define('_ALBM_MYALBUM_ADMENU_MYBLOCKSADMIN','Blocks&Groups Admin');

define( 'MYALBUM_MI_LOADED' , 1 ) ;

// The name of this module
define("_ALBM_MYALBUM_NAME","�q�l��ï");

// A brief description of this module
define("_ALBM_MYALBUM_DESC","�إ߬ۤ�ï�H�K�Τ�i�H �j�M/�o�G/���� ���ɦU�جۤ�,xoobs����ơC");

// Names of blocks for this module (Not all module has blocks)
define("_ALBM_BNAME_RECENT","�̷s�ۤ�");
define("_ALBM_BNAME_HITS","�����ۤ�");
define("_ALBM_BNAME_RANDOM","�q�l��ï");

// Config Items
define( "_ALBM_CFG_PHOTOSPATH" , "�ۤ��s�񪺸��|" ) ;
define( "_ALBM_CFG_DESCPHOTOSPATH" , "���|���Ӧs�b�w�˨�XOOPS�t�Ϊ��ؿ���.<br />(���|�W�����ӥH '/'�}�l. �ӥB���i�H '/' ����.)<br />�Ӧs��ۤ����ؿ��v���ݩʦb UNIX �t�γ]��777��707." ) ;
define( "_ALBM_CFG_THUMBSPATH" , "�Y�Ϧs�񪺸��|" ) ;
define( "_ALBM_CFG_DESCTHUMBSPATH" , "���|���Ӧs�b�w�˨�XOOPS�t�Ϊ��ؿ���.<br />(���|�W�����ӥH '/'�}�l. �ӥB���i�H '/' ����.)<br />�Ӧs��ۤ����ؿ��v���ݩʦb UNIX �t�γ]��777��707." ) ;
define( "_ALBM_CFG_USEIMAGICK" , "�ϥ� ImageMagick �ӫإ��Y�ϡG" ) ;
define( "_ALBM_CFG_DESCIMAGICK" , "��(�_)��ܨϥ� GD. (�N�L�k�ܧ�P����ۤ�)<br />�ҥH�кɥi��ϥ� ImageMagick�C" ) ;
define( "_ALBM_CFG_IMAGICKPATH" , "ImageMagick �����|�G" ) ;
define( "_ALBM_CFG_DESCIMAGICKPATH" , "���㪺���|<br />(���|�W�ٽФťH '/' ����.)" ) ;
define( "_ALBM_CFG_POPULAR" , "�I�\�W�L�X���~�ন�������ۤ��G" ) ;
define( "_ALBM_CFG_NEWDAYS" , "�Хܬ�'�s'&'��s'�ϼЪ����j���" ) ;
define( "_ALBM_CFG_NEWPHOTOS" , "�����i�ܷs�i�ۤ����ƶq�G" ) ;
define( "_ALBM_CFG_PERPAGE" , "�C���i�ܴX�i�ۤ��G" ) ;
define( "_ALBM_CFG_MAKETHUMB" , "�إ��Y�ϡG" ) ;
define( "_ALBM_CFG_THUMBWIDTH" , "�Y�ϼe�סG" ) ;
define( "_ALBM_CFG_DESCMAKETHUMB" , "��z�N '�_' �אּ '�O',�z�̦n���s���� '�����Y��'." ) ;
define( "_ALBM_CFG_WIDTH" , "�ۤ��̤j�e�סG" ) ;
define( "_ALBM_CFG_DESCWIDTH" , "�p�G�z�ϥ�ImageMagick,�h�N��e�פj�p�N�|���s�]�w.<br />�p�G���O�ϥ�ImageMagick, �h�N��o�O�e�׭���." ) ;
define( "_ALBM_CFG_HEIGHT" , "�ۤ��̤j���סG" ) ;
define( "_ALBM_CFG_DESCHEIGHT" , "�p�G�z�ϥ�ImageMagick,�h�N���פj�p�N�|���s�]�w.<br />�p�G���O�ϥ�ImageMagick, �h�N��o�O���׭���." ) ;
define( "_ALBM_CFG_FSIZE" , "�̤j�ɮפj�p�G" ) ;
define( "_ALBM_CFG_DESCFSIZE" , "����W�Ǭۤ��ɮפ��j�p." ) ;
define( "_ALBM_CFG_NEEDADMIT" , "�Ҧ��s�ۤ��ݸg�f�֫�~���\�o�G�G" ) ;
define( "_ALBM_CFG_ADDPOSTS" , "��|���o�G�@�i�Ӥ���,�|���o��Ʃҭn�K�[�Ƭ��G" ) ;
define( "_ALBM_CFG_DESCADDPOSTS" , "�@��]���G0 �� 1.�]�C��0�N��0�^" ) ;

// Sub menu titles
define("_ALBM_TEXT_SMNAME1","�W�Ǭۤ�");
define("_ALBM_TEXT_SMNAME2","�����ۤ�");
define("_ALBM_TEXT_SMNAME3","�u��ۤ�");
define("_ALBM_TEXT_SMNAME4","�ڪ��ۤ�");

// Names of admin menu items
define("_ALBM_MYALBUM_ADMENU0","�f�֤W�Ǭۤ�");
define("_ALBM_MYALBUM_ADMENU1","�ۤ��޲z/�R��");
define("_ALBM_MYALBUM_ADMENU2","�s�W/�ק�/�R�� �ۤ�����");
define("_ALBM_MYALBUM_ADMENU3","�d�֬ۤ��Ҳո�Ʈw");
define("_ALBM_MYALBUM_ADMENU4","�ۤ��妸�W��");
define("_ALBM_MYALBUM_ADMENU5","�����Y��");

?><?php
// Appended by Xoops Language Checker -GIJOE- in 2003-10-21 17:48:33
define('_ALBM_CFG_DESCTHUMBWIDTH','�Y�Ϫ����׷|�̾ڼe�ת��]�w�Ȧ۰ʧ���.');
?><?php
// Appended by Xoops Language Checker -GIJOE- in 2003-11-27 10:43:20
define('_ALBM_CFG_IMAGINGPIPE','Package treating images');
define('_ALBM_CFG_DESCIMAGINGPIPE','Almost PHP environment can use GD. But GD is functionally inferior than another 2 packages.<br />You\'d better use ImageMagick or NetPBM if you can.');
define('_ALBM_CFG_FORCEGD2','Force GD2 conversion');
define('_ALBM_CFG_DESCFORCEGD2','Even if the GD is bundled version of PHP, it force GD2(truecolor) conversion.<br />Some configured PHP fails to create thumbnails in GD2<br />This configuration is significant only under using GD');
define('_ALBM_CFG_NETPBMPATH','Path of NetPBM');
define('_ALBM_CFG_DESCNETPBMPATH','The full path to \'pnmscale\' etc.<br />(The last character should not be \'/\'.)<br />This configuration is significant only under using NetPBM');
define('_ALBM_CFG_THUMBSIZE','Size of thumbnails (pixel)');
define('_ALBM_CFG_THUMBRULE','Calc rule for building thumbnails');
define('_ALBM_CFG_CATONSUBMENU','Register top categories into submenu');
define('_ALBM_CFG_NAMEORUNAME','Poster name displayed');
define('_ALBM_CFG_DESCNAMEORUNAME','Select which \'name\' is displayed');
define('_ALBM_OPT_USENAME','Handle Name');
define('_ALBM_OPT_USEUNAME','Login Name');
define('_ALBUM_OPT_CALCFROMWIDTH','width:specified  height:auto');
define('_ALBUM_OPT_CALCFROMHEIGHT','width:auto  width:specified');
define('_ALBUM_OPT_CALCWHINSIDEBOX','put in specified size squre');
?><?php
// Appended by Xoops Language Checker -GIJOE- in 2003-12-03 16:33:03
define('_ALBM_BNAME_RECENT_P','Recent Photos with thumbs');
define('_ALBM_BNAME_HITS_P','Top Photos with thumbs');
?><?php
// Appended by Xoops Language Checker -GIJOE- in 2004-01-27 15:37:02
define('_ALBM_CFG_VIEWCATTYPE','Type of view in category');
define('_ALBM_CFG_COLSOFTABLEVIEW','Number of columns in table view');
define('_ALBM_OPT_VIEWLIST','List View');
define('_ALBM_OPT_VIEWTABLE','Table View');
define('_ALBM_MYALBUM_ADMENU_GPERM','Global Permissions');
define('_MI_MYALBUM_GLOBAL_NOTIFY','Global');
define('_MI_MYALBUM_GLOBAL_NOTIFYDSC','Global notification options with myAlbum-P');
define('_MI_MYALBUM_CATEGORY_NOTIFY','Category');
define('_MI_MYALBUM_CATEGORY_NOTIFYDSC','Notification options that apply to the current photo category');
define('_MI_MYALBUM_PHOTO_NOTIFY','Photo');
define('_MI_MYALBUM_PHOTO_NOTIFYDSC','Notification options that apply to the current photo');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFY','New Photo');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYCAP','Notify me when any new photo is posted');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYDSC','Receive notification when any new photo is posted');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYSBJ','[{X_SITENAME}] {X_MODULE}: auto-notify : New photo');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFY','New Photo');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYCAP','Notify me when a new photo is posted to the current category');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYDSC','Receive notification when a new photo is posted to the current category');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYSBJ','[{X_SITENAME}] {X_MODULE}: auto-notify : New photo');

}

?>
