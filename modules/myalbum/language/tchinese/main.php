<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MB_LOADED' ) ) {

define( 'MYALBUM_MB_LOADED' , 1 ) ;

//%%%%%%		Module Name 'myAlbum-P'		%%%%%

// New in myAlbum-P

// only "Y/m/d","d M Y","M d Y" can be interpreted
define("_ALBM_DTFMT_YMDHI","d M Y H:i");

define("_ALBM_NEXT_BUTTON","�U�@�B");
define("_ALBM_REDOLOOPDONE","�����Y�ϧ���");

define("_ALBM_BTN_SELECTALL","����");
define("_ALBM_BTN_SELECTNONE","������");
define("_ALBM_BTN_SELECTRVS","�ϦV���");

define("_ALBM_FMT_PHOTONUM","�C�� %s �i");

define("_ALBM_AM_ADMISSION","�f�֬ۤ�");
define("_ALBM_AM_ADMITTING","�w�f�֬ۤ�");
define("_ALBM_AM_LABEL_ADMIT","�f�֧A�ҿ�����ۤ�");
define("_ALBM_AM_BUTTON_ADMIT","�f��");
define("_ALBM_AM_BUTTON_EXTRACT","���");

define("_ALBM_AM_PHOTOMANAGER","�ۤ��޲z�t��");
define("_ALBM_AM_PHOTONAVINFO","�ۤ��s�� %s-%s (�`�@�� %s �i�ۤ�)");
define("_ALBM_AM_LABEL_REMOVE","�R���z�ҤĿ諸�ۤ�-->");
define("_ALBM_AM_BUTTON_REMOVE","�R��");
define("_ALBM_AM_JS_REMOVECONFIRM","�T�w�n�R����?");
define("_ALBM_AM_LABEL_MOVE","�N�z�ҤĿ諸�ۤ��ܧ���������G");
define("_ALBM_AM_BUTTON_MOVE","����");
define("_ALBM_AM_BUTTON_UPDATE","�ܧ�");
define("_ALBM_AM_DEADLINKMAINPHOTO","�D���ɨä��s�b");

define("_ALBM_RADIO_ROTATETITLE","����Ϥ�");
define("_ALBM_RADIO_ROTATE0","������");
define("_ALBM_RADIO_ROTATE90","�V�k��");
define("_ALBM_RADIO_ROTATE180","���� 180 ��");
define("_ALBM_RADIO_ROTATE270","�V����");


// New MyAlbum 1.0.1 (and 1.2.0)
define("_ALBM_MOREPHOTOS","�q%s�W�ǧ�h�ۤ�");
define("_ALBM_REDOTHUMBS","�����Y�� (<a href='redothumbs.php'>����</a>)");
define("_ALBM_REDOTHUMBSINFO","�`�N�G�@�����歫���Y�ϵ��ƹL�h�A�i��ɭP���A���s���O�ɦӥ��ѡA�Фp�ߡI");
define("_ALBM_REDOTHUMBSNUMBER","�C�����歫���Y�Ϫ�����");
define("_ALBM_REDOING","�����Y�Ϥ��G");
define("_ALBM_BACK","��^�W�@�B");
define("_ALBM_ADDPHOTO","�s�W�ۤ�");


// New MyAlbum 1.0.0
define("_ALBM_PHOTOBATCHUPLOAD","�n���w�W�Ǩ���A�������Ӥ�");
define("_ALBM_PHOTOUPLOAD","�W�Ǭۤ�");
define("_ALBM_PHOTOEDITUPLOAD","�s�׬ۤ��í��s�W��");
define("_ALBM_MAXPIXEL","�̤j�ؤo (���Gpixel)");
define("_ALBM_MAXSIZE","�̤j�ɮפj�p (���Gbyte)<br />1048576 byte = 1 MB");
define("_ALBM_PHOTOTITLE","�D�D");
define("_ALBM_PHOTOPATH","���|");
define("_ALBM_TEXT_DIRECTORY","�ؿ�");
define("_ALBM_DESC_PHOTOPATH","�п�J�n�n�����ۤ���Ҧb���A����������|�]������|�^");
define("_ALBM_MES_INVALIDDIRECTORY","���w���ؿ��O�L�Ī�.");
define("_ALBM_MES_BATCHDONE","%s �i�ۤ��w�g�n��.");
define("_ALBM_MES_BATCHNONE","�b�ӥؿ��̨å��o�{�ۤ��s�b.");
define("_ALBM_PHOTODESC","�y�z");
define("_ALBM_PHOTOCAT","����");
define("_ALBM_SELECTFILE","��ܬۤ�");
define("_ALBM_NOIMAGESPECIFIED","���~: �S���Ӥ��Q�W��");
define("_ALBM_FILEERROR","�S������ۤ��Q�W�ǡ]�ۤ��ؤo�Ӥj�H�^");
define("_ALBM_FILEREADERROR","���~: �Ӥ��L�kŪ��.");

define("_ALBM_BATCHBLANK","�N�D�D�d�ŷ|�����H���ɮצW�٬��D�D");
define("_ALBM_DELETEPHOTO","�R���ۤ�?");
define("_ALBM_VALIDPHOTO","�o�G");
define("_ALBM_PHOTODEL","�R���ۤ�?");
define("_ALBM_DELETINGPHOTO","�ۤ��R�����A�еy�J...");
define("_ALBM_MOVINGPHOTO","�ۤ����ʤ��A�еy�J...");

define("_ALBM_STORETIMESTAMP","�Ф��n�ܧ� timestamp");

define("_ALBM_POSTERC","�i�K�̡G");
define("_ALBM_DATEC","����G");
define("_ALBM_EDITNOTALLOWED","��p�I�z�L�v�ק�o�h���סC");
define("_ALBM_ANONNOTALLOWED","��p�I�X�Ȥ���o����סC");
define("_ALBM_THANKSFORPOST","�P�±z���o��I");
define("_ALBM_DELNOTALLOWED","��p�I�z�L�v�R���o�h���סI");
define("_ALBM_GOBACK","��^�W�@�B");
define("_ALBM_AREYOUSURE","�z�T�w�n�R���o�h���פλP��������^�е��׶ܡH");
define("_ALBM_COMMENTSDEL","�z��������פw�g���\���R���F�I");

// End New

define("_ALBM_THANKSFORINFO","�P�±z���Ө�A�ڭ̱N�|���֦^�СI");
define("_ALBM_BACKTOTOP","�^��Ĥ@�i�ۤ�");
define("_ALBM_THANKSFORHELP","�P�±z��U�����o�ӥؿ�������ʡC");
define("_ALBM_FORSECURITY","���w���z�ѡA�t�αN�ȮɰO���z���Τ�W�MIP��}�C");

define("_ALBM_MATCH","�ŦX");
define("_ALBM_ALL","����");
define("_ALBM_ANY","����");
define("_ALBM_NAME","�W��");
define("_ALBM_DESCRIPTION","�y�z");

define("_ALBM_MAIN","�^��D�e��");
define("_ALBM_NEW","�s�i�ۤ�");
define("_ALBM_UPDATED","�̪��s");
define("_ALBM_POPULAR","�̼�����");
define("_ALBM_TOPRATED","�̰�������");

define("_ALBM_POPULARITYLTOM","�I�\�� (�ѧC�ܰ�)");
define("_ALBM_POPULARITYMTOL","�I�\�� (�Ѱ��ܧC)");
define("_ALBM_TITLEATOZ","�D�D (A to Z)");
define("_ALBM_TITLEZTOA","�D�D (Z to A)");
define("_ALBM_DATEOLD","��� (���¨�s)");
define("_ALBM_DATENEW","��� (�ѷs����)");
define("_ALBM_RATINGLTOH","���� (�ѧC�ܰ�)");
define("_ALBM_RATINGHTOL","���� (�Ѱ��ܧC)");
define("_ALBM_LIDASC","�����s�� (�Ѥp�ܤj)");
define("_ALBM_LIDDESC","�����s�� (�Ѥj�ܤp)");

define("_ALBM_NOSHOTS","�S���Y��");
define("_ALBM_EDITTHISPHOTO","�s�׳o�i�ۤ�");

define("_ALBM_DESCRIPTIONC","�y�z�G");
define("_ALBM_EMAILC","Email�G");
define("_ALBM_CATEGORYC","�����G");
define("_ALBM_SUBCATEGORY","�������G");
define("_ALBM_LASTUPDATEC","�̫��s�G");
define("_ALBM_TELLAFRIEND","Tell a friend");
define("_ALBM_SUBJECT4TAF","A photo for you!");
define("_ALBM_HITSC","�I�\�ơG");
define("_ALBM_RATINGC","�����G");
define("_ALBM_ONEVOTE","1 ��������");
define("_ALBM_NUMVOTES","%s ��������");
define("_ALBM_ONEPOST","1 ����");
define("_ALBM_NUMPOSTS","%s ����");
define("_ALBM_COMMENTSC","���סG");
define("_ALBM_RATETHISPHOTO","�������ϵ���");
define("_ALBM_MODIFY","�s��");
define("_ALBM_VSCOMMENTS","�\��/�o�����");

define("_ALBM_DIRECTCATSEL","��ܤ���");
define("_ALBM_THEREARE","�ثe�� <b>%s</b> �i�ۤ��b�ڭ̪���Ʈw���A�z�i�H ");
define("_ALBM_LATESTLIST","�s�i�ۤ��C��");

define("_ALBM_VOTEAPPRE","�P�±z�������C");
define("_ALBM_THANKURATE","�P�±z��O�_�Q���ɶ��b%s �����ۤ������C");
define("_ALBM_VOTEONCE","�ФŰw��P�@�ۤ����Ƶ����C");
define("_ALBM_RATINGSCALE","�����зǥ� 1-10 �A�Ʀr�U���N��U�n�C");
define("_ALBM_BEOBJECTIVE","�Ы��[�����A�P�@�ۤ��o��̧C�γ̰����ɡA�����N�S���N�q�F�C");
define("_ALBM_DONOTVOTE","�Ф��n�w��ۤv�ҵo�G���ۤ������C");
define("_ALBM_RATEIT","�e�X����");

define("_ALBM_RECEIVED","�ڭ̤w�g����z�W�Ǫ��ۤ��A�P�±z�I");
define("_ALBM_ALLPENDING","�Ҧ��ۤ��P���ק��ݸg�L�f�֫�~�|�Q�i�K�X�ӡC");

define("_ALBM_RANK","�ƦW");
define("_ALBM_CATEGORY","����");
define("_ALBM_HITS","�I�\��");
define("_ALBM_RATING","����");
define("_ALBM_VOTE","��������");
define("_ALBM_TOP10","%s �e�Q�W�����ۤ�"); // %s is a photo category title

define("_ALBM_SORTBY","�ƧǤ覡�G");
define("_ALBM_TITLE","�D�D");
define("_ALBM_DATE","���");
define("_ALBM_POPULARITY","������");
define("_ALBM_CURSORTEDBY","�ۤ��ثe�H %s �Ƨ�");
define("_ALBM_FOUNDIN","���G");
define("_ALBM_PREVIOUS","�W�@�i");
define("_ALBM_NEXT","�U�@�i");
define("_ALBM_NOMATCH","�å��o�{����ŦX�d�߱��󪺵��G�C");

define("_ALBM_CATEGORIES","����");

define("_ALBM_SUBMIT","�e�X");
define("_ALBM_CANCEL","����");

define("_ALBM_MUSTREGFIRST","�藍�_�I�X�ȨS�����楻���ت��v�O�C<br>�Х����U�εn�J�I");
define("_ALBM_MUSTADDCATFIRST","�藍�_�I�z�å��إߥ�������C<br>�Х��إߤ����I");
define("_ALBM_NORATING","�|�������������C");
define("_ALBM_CANTVOTEOWN","�z����w��ۤv�ҵo�G���ۤ������C<br>�Ҧ������N�Q�O���M�T�{�C");
define("_ALBM_VOTEONCE2","�Ҧ��ۤ��u��Q�����@���C<br>�Ҧ������N�Q�O���M�T�{�C");

//%%%%%%	Module Name 'MyAlbum' (Admin)	  %%%%%

define("_ALBM_PHOTOSWAITING","�ݼf�ۤ�");
define("_ALBM_PHOTOMANAGER","�ۤ��޲z/�R��");
define("_ALBM_CATEDIT","�s�W/�ק�/�R�� �ۤ�����");
define("_ALBM_GROUPPERM_GLOBAL","�����v��");
define("_ALBM_CHECKCONFIGS","�ˬd�պA�P���ҳ]�w");
define("_ALBM_BATCHUPLOAD","�ۤ��妸�W��");
define("_ALBM_GENERALSET","���n�]�w");
define("_ALBM_REDOTHUMBS2","�����Y��");

define("_ALBM_SUBMITTER","�i�K�̡G");
define("_ALBM_DELETE","�R��");
define("_ALBM_NOSUBMITTED","�L�s�o��ۤ�.");
define("_ALBM_ADDMAIN","�s�W�@�ӥD����");
define("_ALBM_IMGURL","�Ϥ����} (��ܩʥ\��/���N���ת��Ϥ��A���|�Q���]��50)�G");
define("_ALBM_ADD","�s�W");
define("_ALBM_ADDSUB","�s�W�@�Ӧ�����");
define("_ALBM_IN","�b");
define("_ALBM_MODCAT","�ק����");
define("_ALBM_DBUPDATED","��Ʈw��s���\�I");
define("_ALBM_MODREQDELETED","�ק�ӽФw�g�R���C");
define("_ALBM_IMGURLMAIN","�Ϥ����} (��ܩʥ\��/�u����D�ؿ����ġA���N���ת��Ϥ��A���|�Q���]��50)�G");
define("_ALBM_PARENT","�W�h�����G");
define("_ALBM_SAVE","�x�s�ק�");
define("_ALBM_CATDELETED","�����w�R���C");
define("_ALBM_CATDEL_WARNING","ĵ�i�I�z�T�w�n�R���������Υ]�t��䤤���ۤ��M���׶ܡH");
define("_ALBM_YES","�O");
define("_ALBM_NO","�_");
define("_ALBM_NEWCATADDED","�s�������w�g�s�W���\!");
define("_ALBM_ERROREXIST","���~�I�z�o���ۤ��w�g�s�b���Ʈw���I");
define("_ALBM_ERRORTITLE","���~�I�z������J�D�D�I");
define("_ALBM_ERRORDESC","���~�I�z������J�y�z�I");
define("_ALBM_WEAPPROVED","�ڭ̤w�{�i�z�o�G�ۤ��ҳs������Ʈw�C");
define("_ALBM_THANKSSUBMIT","�P�±z���o��I");
define("_ALBM_CONFUPDATED","�����s�W�����I");

}

?>