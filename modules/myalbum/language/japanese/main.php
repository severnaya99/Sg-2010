<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MB_LOADED' ) ) {

define( 'MYALBUM_MB_LOADED' , 1 ) ;

//%%%%%%		Module Name 'myAlbum-P'		%%%%%

// New in myAlbum-P

// only "Y/m/d" , "d M Y" , "M d Y" can be interpreted
define( "_ALBM_DTFMT_YMDHI" , "Y/m/d H:i" ) ;

define( "_ALBM_NEXT_BUTTON" , "����" ) ;
define( "_ALBM_REDOLOOPDONE" , "��λ" ) ;

define( "_ALBM_BTN_SELECTALL" , "������" ) ;
define( "_ALBM_BTN_SELECTNONE" , "������" ) ;
define( "_ALBM_BTN_SELECTRVS" , "����ȿž" ) ;

define( "_ALBM_FMT_PHOTONUM" , "%s ��" ) ;

define( "_ALBM_AM_ADMISSION" , "�����ξ�ǧ" ) ;
define( "_ALBM_AM_ADMITTING" , "������ǧ���ޤ���" ) ;
define( "_ALBM_AM_LABEL_ADMIT" , "�����å�����������ǧ����" ) ;
define( "_ALBM_AM_BUTTON_ADMIT" , "��ǧ" ) ;
define( "_ALBM_AM_BUTTON_EXTRACT" , "���" ) ;

define( "_ALBM_AM_PHOTOMANAGER" , "�����δ���" ) ;
define( "_ALBM_AM_PHOTONAVINFO" , "%s �֡� %s �֤�ɽ�� (�� %s ��)" ) ;
define( "_ALBM_AM_LABEL_REMOVE" , "�����å�����������������" ) ;
define( "_ALBM_AM_BUTTON_REMOVE" , "���" ) ;
define( "_ALBM_AM_JS_REMOVECONFIRM" , "������Ƥ�����Ǥ���" ) ;
define( "_ALBM_AM_LABEL_MOVE" , "�����å������������ư����" ) ;
define( "_ALBM_AM_BUTTON_MOVE" , "��ư" ) ;
define( "_ALBM_AM_BUTTON_UPDATE" , "�ѹ�" ) ;
define( "_ALBM_AM_DEADLINKMAINPHOTO" , "�ᥤ�������¸�ߤ��ޤ���" ) ;

define( "_ALBM_RADIO_ROTATETITLE" , "������ž" ) ;
define( "_ALBM_RADIO_ROTATE0" , "��ž���ʤ�" ) ;
define( "_ALBM_RADIO_ROTATE90" , "����90�ٲ�ž" ) ;
define( "_ALBM_RADIO_ROTATE180" , "180�ٲ�ž" ) ;
define( "_ALBM_RADIO_ROTATE270" , "����90�ٲ�ž" ) ;


// New MyAlbum 1.0.1 (and 1.2.0)
define("_ALBM_MOREPHOTOS","%s ����β������ä�!");
define("_ALBM_REDOTHUMBS","����ͥ���κƹ���(<a href='redothumbs.php'>�ƥ�������</a>)");
define("_ALBM_REDOTHUMBS2","����ͥ���κƹ���");
define("_ALBM_REDOTHUMBSINFO","�礭�ʿ��ͤ����Ϥ���ȥ����С������ॢ���Ȥθ����ˤʤ�ޤ���");
define("_ALBM_REDOTHUMBSNUMBER","���٤˽������륵��͡���ο�");
define("_ALBM_REDOING","�ƹ��ۤ��ޤ���: ");
define("_ALBM_BACK","���");
define("_ALBM_ADDPHOTO","�������ɲ�");


// New MyAlbum 1.0.0
define("_ALBM_PHOTOBATCHUPLOAD","�����Ф˥��åץ��ɺѥե�����ΰ����Ͽ");
define("_ALBM_PHOTOUPLOAD","�������åץ���");
define("_ALBM_PHOTOEDITUPLOAD","�������Խ����ƥ��åץ���");
define("_ALBM_MAXPIXEL","���������");
define("_ALBM_MAXSIZE","���������(byte)");
define("_ALBM_PHOTOTITLE","�����ȥ�");
define("_ALBM_PHOTOPATH","Path:");
define("_ALBM_TEXT_DIRECTORY","�ǥ��쥯�ȥ�");
define("_ALBM_DESC_PHOTOPATH","�����δޤޤ��ǥ��쥯�ȥ�����Хѥ��ǻ��ꤷ�Ʋ�����");
define("_ALBM_MES_INVALIDDIRECTORY","���ꤵ�줿�ǥ��쥯�ȥ꤫��������ɤ߽Ф��ޤ���");
define("_ALBM_MES_BATCHDONE","%s ��β�������Ͽ���ޤ���");
define("_ALBM_MES_BATCHNONE","���ꤵ�줿�ǥ��쥯�ȥ�˲����ե����뤬�ߤĤ���ޤ���Ǥ���");
define("_ALBM_PHOTODESC","����");
define("_ALBM_PHOTOCAT","���ƥ���");
define("_ALBM_SELECTFILE","��������");
define("_ALBM_NOIMAGESPECIFIED","����̤���򡧥��åץ��ɤ��٤������ե���������򤷤Ʋ�������");
define("_ALBM_FILEERROR","�������åץ��ɤ˼��ԡ������ե����뤬���Ĥ���ʤ����������¤�ۤ��Ƥޤ���");
define("_ALBM_FILEREADERROR","�����ɹ����ԡ��ʤ�餫����ͳ�ǥ��åץ��ɤ��줿�����ե�������ɤ߽Ф��ޤ���");

define("_ALBM_BATCHBLANK","�����ȥ��������ˤ�����硢�ե�����̾�򥿥��ȥ�Ȥ��ޤ�");
define("_ALBM_DELETEPHOTO","���?");
define("_ALBM_VALIDPHOTO","��ǧ");
define("_ALBM_PHOTODEL","�������?");
define("_ALBM_DELETINGPHOTO","������ޤ���");
define("_ALBM_MOVINGPHOTO","��ư���ޤ���");

define("_ALBM_STORETIMESTAMP","�������ѹ����ʤ�");

define("_ALBM_POSTERC","���: ");
define("_ALBM_DATEC","����: ");
define("_ALBM_EDITNOTALLOWED","�����Ȥ��Խ����븢�¤�����ޤ���");
define("_ALBM_ANONNOTALLOWED","ƿ̾�桼������ƤǤ��ޤ���");
define("_ALBM_THANKSFORPOST","�����ͭ���񤦤������ޤ���");
define("_ALBM_DELNOTALLOWED","�����Ȥ������븢�¤�����ޤ���!");
define("_ALBM_GOBACK","���");
define("_ALBM_AREYOUSURE","���Υ����ȤȤ��β��������Ȥ�����������Ǥ�����");
define("_ALBM_COMMENTSDEL","�����Ⱥ����λ��");

// End New

define("_ALBM_THANKSFORINFO","�����ĺ���������θ����ϤǤ�������᤯��Ƥ���ޤ���");
define("_ALBM_BACKTOTOP","�ǽ�β��������");
define("_ALBM_THANKSFORHELP","������ͭ�񤦤������ޤ���");
define("_ALBM_FORSECURITY","�������ƥ��δ������餢�ʤ���IP���ɥ쥹����Ū����¸���ޤ���");

define("_ALBM_MATCH","����");
define("_ALBM_ALL","����");
define("_ALBM_ANY","�ɤ�Ǥ�");
define("_ALBM_NAME","̾��");
define("_ALBM_DESCRIPTION","����");

define("_ALBM_MAIN","����Х�ȥå�");
define("_ALBM_NEW","����");
define("_ALBM_UPDATED","����");
define("_ALBM_POPULAR","��ҥå�");
define("_ALBM_TOPRATED","��ɾ��");

define("_ALBM_POPULARITYLTOM","�ҥåȿ� (�㢪��)");
define("_ALBM_POPULARITYMTOL","�ҥåȿ� (�⢪��)");
define("_ALBM_TITLEATOZ","�����ȥ� (A �� Z)");
define("_ALBM_TITLEZTOA","�����ȥ� (Z �� A)");
define("_ALBM_DATEOLD","���� (�좪��)");
define("_ALBM_DATENEW","���� (������)");
define("_ALBM_RATINGLTOH","ɾ�� (�㢪��)");
define("_ALBM_RATINGHTOL","ɾ�� (�⢪��)");
define("_ALBM_LIDASC","�쥳�����ֹ澺��");
define("_ALBM_LIDDESC","�쥳�����ֹ�߽�");

define("_ALBM_NOSHOTS","����ͥ���ʤ�");
define("_ALBM_EDITTHISPHOTO","���β������Խ�");

define("_ALBM_DESCRIPTIONC","����");
define("_ALBM_EMAILC","Email");
define("_ALBM_CATEGORYC","���ƥ���");
define("_ALBM_LASTUPDATEC","���󹹿�");
define("_ALBM_TELLAFRIEND","ͧ�ͤ��Τ餻��");
define("_ALBM_SUBJECT4TAF","���򤤼̿��򸫤Ĥ��ޤ���");
define("_ALBM_HITSC","�ҥåȿ�");
define("_ALBM_RATINGC","ɾ��");
define("_ALBM_ONEVOTE","��ɼ�� 1");
define("_ALBM_NUMVOTES","��ɼ�� %s");
define("_ALBM_ONEPOST","�����ȿ�");
define("_ALBM_NUMPOSTS","�����ȿ� %s");
define("_ALBM_COMMENTSC","�����ȿ�");
define("_ALBM_RATETHISPHOTO","��ɼ����");
define("_ALBM_MODIFY","�ѹ�");
define("_ALBM_VSCOMMENTS","�����Ȥ򸫤�/����");

define("_ALBM_DIRECTCATSEL","���ƥ�������");
define("_ALBM_THEREARE","�ǡ����١����ˤ�������� <b>%s</b> ��Ǥ�");
define("_ALBM_LATESTLIST","�ǿ��ꥹ��");

define("_ALBM_VOTEAPPRE","��ɼ������դ��ޤ���");
define("_ALBM_THANKURATE","�������� %s �ؤΤ���ɼ�����꤬�Ȥ��������ޤ���");
define("_ALBM_VOTEONCE","Ʊ������ؤ���ɼ�ϰ��٤����ˤ��ꤤ���ޤ���");
define("_ALBM_RATINGSCALE","ɾ���� 1 ���� 10 �ޤǤǤ��� 1 �����㡢 10 ���ǹ�");
define("_ALBM_BEOBJECTIVE","�Ҵ�Ū��ɾ���򤪴ꤤ���ޤ���������1��10�Τߤ��Ƚ���դ��ΰ�̣������ޤ���");
define("_ALBM_DONOTVOTE","��ʬ����Ͽ������������ɼ�Ǥ��ޤ���");
define("_ALBM_RATEIT","��ɼ����!");

define("_ALBM_RECEIVED","��������Ͽ���ޤ����������ͭ�񤦤������ޤ���");
define("_ALBM_ALLPENDING","���٤Ƥ���Ʋ����ϳ�ǧ�Τ��Ჾ��Ͽ�Ȥʤ�ޤ���");

define("_ALBM_RANK","���");
define("_ALBM_CATEGORY","���ƥ���");
define("_ALBM_SUBCATEGORY","���֥��ƥ���");
define("_ALBM_HITS","�ҥå�");
define("_ALBM_RATING","ɾ��");
define("_ALBM_VOTE","��ɼ");
define("_ALBM_TOP10","%s �Υȥå�10"); // %s �ϥ��ƥ���Υ����ȥ�

define("_ALBM_SORTBY","�¤��ؤ�:");
define("_ALBM_TITLE","�����ȥ�");
define("_ALBM_DATE","����");
define("_ALBM_POPULARITY","�ҥåȿ�");
define("_ALBM_CURSORTEDBY","���ߤ��¤ӽ�: %s");
define("_ALBM_FOUNDIN","���Ĥ��ä��ΤϤ���:");
define("_ALBM_PREVIOUS","��");
define("_ALBM_NEXT","��");
define("_ALBM_NOMATCH","����������ޤ���");

define("_ALBM_CATEGORIES","���ƥ���");

define("_ALBM_SUBMIT","���");
define("_ALBM_CANCEL","����󥻥�");

define("_ALBM_MUSTREGFIRST","����������ޤ��󤬥����������¤�����ޤ���<br>��Ͽ���뤫���������ˤ��ꤤ���ޤ���");
define("_ALBM_MUSTADDCATFIRST","�ɲä��뤿��ˤϥ��ƥ��꤬ɬ�פǤ���<br>�ޤ����ƥ����������Ʋ�������");
define("_ALBM_NORATING","ɾ�������򤵤�Ƥޤ���");
define("_ALBM_CANTVOTEOWN","��ʬ����Ʋ����ˤ���ɼ�Ǥ��ޤ���<br>��ɼ�ˤ������ܤ��̤��ޤ�");
define("_ALBM_VOTEONCE2","��������ؤ���ɼ�ϰ��٤����ˤ��ꤤ���ޤ���<br>��ɼ�ˤϤ��٤��ܤ��̤��ޤ���");

//%%%%%%	Module Name 'MyAlbum' (Admin)	  %%%%%

define("_ALBM_PHOTOSWAITING","��Ƥ��줿�����ξ�ǧ: ��ǧ�Բ�����");
define("_ALBM_PHOTOMANAGER","��������");
define("_ALBM_CATEDIT","���ƥ�����ɲá��Խ�");
define("_ALBM_GROUPPERM_GLOBAL","�ƥ��롼�פθ���");
define("_ALBM_CHECKCONFIGS","�⥸�塼��ξ��֥����å�");
define("_ALBM_BATCHUPLOAD","���������Ͽ");
define("_ALBM_GENERALSET","��������");

define("_ALBM_SUBMITTER","��Ƽ�");
define("_ALBM_DELETE","���");
define("_ALBM_NOSUBMITTED","��������Ʋ����Ϥ���ޤ���");
define("_ALBM_ADDMAIN","�ȥåץ��ƥ�����ɲ�");
define("_ALBM_IMGURL","������URL (�����ι⤵�Ϥ��餫����50pixel��): ");
define("_ALBM_ADD","�ɲ�");
define("_ALBM_ADDSUB","���֥��ƥ�����ɲ�");
define("_ALBM_IN","");
define("_ALBM_MODCAT","���ƥ����ѹ�");
define("_ALBM_DBUPDATED","�ǡ����١�������������!");
define("_ALBM_MODREQDELETED","�ѹ���������");
define("_ALBM_IMGURLMAIN","����URL (�����ι⤵�Ϥ��餫����50pixel��): ");
define("_ALBM_PARENT","�ƥ��ƥ���:");
define("_ALBM_SAVE","�ѹ�����¸");
define("_ALBM_CATDELETED","���ƥ���ξõλ");
define("_ALBM_CATDEL_WARNING","���ƥ����Ʊ���ˤ����˴ޤޤ���������ӥ����Ȥ����ƺ������ޤ���������Ǥ�����");
define("_ALBM_YES","�Ϥ�");
define("_ALBM_NO","������");
define("_ALBM_NEWCATADDED","�����ƥ����ɲä�����!");
define("_ALBM_ERROREXIST","���顼: �󶡤��������Ϥ��Ǥ˥ǡ����١�����¸�ߤ��ޤ���");
define("_ALBM_ERRORTITLE","���顼: �����ȥ뤬ɬ�פǤ�!");
define("_ALBM_ERRORDESC","���顼: ������ɬ�פǤ�!");
define("_ALBM_WEAPPROVED","�����ǡ����١����ؤΥ��������ǧ���ޤ�����");
define("_ALBM_THANKSSUBMIT","�����ͭ���񤦤������ޤ���");
define("_ALBM_CONFUPDATED","����򹹿����ޤ�����");

}

?>
