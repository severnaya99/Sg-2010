<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MB_LOADED' ) ) {



// Appended by Xoops Language Checker -GIJOE- in 2005-08-31 15:23:35
define('_ALBM_STORETIMESTAMP','Don\'t touch timestamp');
define('_ALBM_TELLAFRIEND','Tell a friend');
define('_ALBM_SUBJECT4TAF','A photo for you!');

// Appended by Xoops Language Checker -GIJOE- in 2004-10-04 16:06:32
define('_ALBM_LIDASC','Record Number (Bigger is latter)');
define('_ALBM_LIDDESC','Record Number (Smaller is latter)');

define( 'MYALBUM_MB_LOADED' , 1 ) ;

//%%%%%%		Module Name 'myAlbum-P'		%%%%%

// New in myAlbum-P

// only "Y/m/d" , "d M Y" , "M d Y" can be interpreted
define( "_ALBM_DTFMT_YMDHI" , "Y/m/d H:i" ) ;

define( "_ALBM_NEXT_BUTTON" , "��һ��" ) ;
define( "_ALBM_REDOLOOPDONE" , "�ؽ�����ͼ���" ) ;

define("_ALBM_BTN_SELECTALL","ȫѡ");
define("_ALBM_BTN_SELECTNONE","���");
define("_ALBM_BTN_SELECTRVS","����ѡ��");

define("_ALBM_FMT_PHOTONUM","ÿҳ%s��");

define( "_ALBM_AM_ADMISSION" , "���ͼƬ" ) ;
define( "_ALBM_AM_ADMITTING" , "�����ͼƬ" ) ;
define( "_ALBM_AM_LABEL_ADMIT" , "�������ѡȡ��ͼƬ" ) ;
define( "_ALBM_AM_BUTTON_ADMIT" , "���" ) ;
define( "_ALBM_AM_BUTTON_EXTRACT" , "ѡȡ" ) ;

define( "_ALBM_AM_PHOTOMANAGER" , "ͼƬ����ϵͳ" ) ;
define( "_ALBM_AM_PHOTONAVINFO" , "ͼƬ��� %s-%s (�ܹ��� %s ��ͼƬ)" ) ;
define( "_ALBM_AM_LABEL_REMOVE" , "ɾ������ѡ���ͼƬ-->" ) ;
define( "_ALBM_AM_BUTTON_REMOVE" , "ɾ��" ) ;
define( "_ALBM_AM_JS_REMOVECONFIRM" , "ȷ��Ҫɾ����?" ) ;
define( "_ALBM_AM_LABEL_MOVE" , "������ѡ���ͼƬת�Ƶ���" ) ;
define( "_ALBM_AM_BUTTON_MOVE" , "ת��" ) ;
define("_ALBM_AM_BUTTON_UPDATE","�޸�");
define( "_ALBM_AM_DEADLINKMAINPHOTO" , "ԭʼͼ������" ) ;

define( "_ALBM_RADIO_ROTATETITLE" , "��תͼƬ" ) ;
define( "_ALBM_RADIO_ROTATE0" , "����ת" ) ;
define( "_ALBM_RADIO_ROTATE90" , "����ת" ) ;
define( "_ALBM_RADIO_ROTATE180" , "��ת180��" ) ;
define( "_ALBM_RADIO_ROTATE270" , "����ת" ) ;


// New MyAlbum 1.0.1 (and 1.2.0)
define("_ALBM_MOREPHOTOS","��%s�ϴ�����ͼƬ");
define("_ALBM_REDOTHUMBS","�ؽ�����ͼ (<a href='redothumbs.php'>����</a>)");
define("_ALBM_REDOTHUMBSINFO","һ��ִ��̫������ͼƬ����ͼ�ؽ������ܵ��·��������ᳬʱ����С�ģ�");
define("_ALBM_REDOTHUMBSNUMBER","ÿ��ִ���ؽ�����ͼ����");
define("_ALBM_REDOING","�����ؽ�����ͼ��");
define("_ALBM_BACK","������һ��");
define("_ALBM_ADDPHOTO","����ͼƬ");


// New MyAlbum 1.0.0
define("_ALBM_PHOTOBATCHUPLOAD","�Ǽ����ϴ����������е�ͼƬ");
define("_ALBM_PHOTOUPLOAD","�ϴ�ͼƬ");
define("_ALBM_PHOTOEDITUPLOAD","�༭ͼƬ�������ϴ�");
define("_ALBM_MAXPIXEL","���ߴ� (��λ:pixel)");
define("_ALBM_MAXSIZE","���ͼƬ�ļ���С");
define("_ALBM_PHOTOTITLE","����");
define("_ALBM_PHOTOPATH","·��");
define("_ALBM_TEXT_DIRECTORY","Ŀ¼");
define("_ALBM_DESC_PHOTOPATH","������Ҫ�Ǽǵ�ͼƬ���ڵ�����·��");
define("_ALBM_MES_INVALIDDIRECTORY","ָ����Ŀ¼��Ч.");
define("_ALBM_MES_BATCHDONE","%s ��ͼƬ�Ѿ��Ǽ�.");
define("_ALBM_MES_BATCHNONE","�ڸ�Ŀ¼��δ����ͼƬ.");
define("_ALBM_PHOTODESC","����");
define("_ALBM_PHOTOCAT","����");
define("_ALBM_SELECTFILE","ѡ��ͼƬ");
define("_ALBM_NOIMAGESPECIFIED","����: û��ͼƬ���ϴ�");
define("_ALBM_FILEERROR","û���κ�ͼƬ���ϴ���ͼƬ�ߴ�̫�󣿣�");
define("_ALBM_FILEREADERROR","����: ͼƬ���ɶ�.");

define("_ALBM_BATCHBLANK","���������ս���ԭ�ļ�����Ϊ����");
define("_ALBM_DELETEPHOTO","ɾ��ͼƬ?");
define("_ALBM_VALIDPHOTO","ȷ�Ϸ���");
define("_ALBM_PHOTODEL","ɾ��ͼƬ?");
define("_ALBM_DELETINGPHOTO","ͼƬɾ���У����Ժ�...");
define("_ALBM_MOVINGPHOTO","ͼƬת���У����Ժ�...");

define("_ALBM_POSTERC","�����ߣ�");
define("_ALBM_DATEC","����: ");
define("_ALBM_EDITNOTALLOWED","��Ǹ������Ȩ�޸��������ۣ�");
define("_ALBM_ANONNOTALLOWED","��Ǹ���ÿͲ��ܷ������ۡ�");
define("_ALBM_THANKSFORPOST","��л�������ۣ�");
define("_ALBM_DELNOTALLOWED","��Ǹ������Ȩɾ���������ۣ�");
define("_ALBM_GOBACK","�˻���һ��");
define("_ALBM_AREYOUSURE","��ȷ��Ҫɾ���������ۼ�������صĻظ���");
define("_ALBM_COMMENTSDEL","��ѡȡ�������Ѿ��ɹ���ɾ���ˣ�");

// End New

define("_ALBM_THANKSFORINFO","��л�������������ǽ��ᾡ��ظ���");
define("_ALBM_BACKTOTOP","�ص���һ��ͼƬ");
define("_ALBM_THANKSFORHELP","��л��Э��ά�����Ŀ¼�������ԡ�");
define("_ALBM_FORSECURITY","���ڰ�ȫ���ɣ�ϵͳ����ʱ��¼�����û�����IP��");

define("_ALBM_MATCH","����");
define("_ALBM_ALL","ȫ��");
define("_ALBM_ANY","�κ�");
define("_ALBM_NAME","����");
define("_ALBM_DESCRIPTION","����");

define("_ALBM_MAIN","�ص���ҳ");
define("_ALBM_NEW","�½�");
define("_ALBM_UPDATED","����");
define("_ALBM_POPULAR","����");
define("_ALBM_TOPRATED","�������");

define("_ALBM_POPULARITYLTOM","����� (�ɵ�����)");
define("_ALBM_POPULARITYMTOL","����� (�ɸ�����)");
define("_ALBM_TITLEATOZ","���� (A to Z)");
define("_ALBM_TITLEZTOA","���� (Z to A)");
define("_ALBM_DATEOLD","���� (�ɾɵ���)");
define("_ALBM_DATENEW","���� (���µ���)");
define("_ALBM_RATINGLTOH","���� (�ɵ�����)");
define("_ALBM_RATINGHTOL","���� (�ɸ�����)");

define("_ALBM_NOSHOTS","û������ͼ");
define("_ALBM_EDITTHISPHOTO","�༭����ͼƬ");

define("_ALBM_DESCRIPTIONC","������");
define("_ALBM_EMAILC","Email��");
define("_ALBM_CATEGORYC","���ࣺ");
define("_ALBM_SUBCATEGORY","���ࣺ");
define("_ALBM_LASTUPDATEC","�����£�");
define("_ALBM_HITSC","�������");
define("_ALBM_RATINGC","���֣�");
define("_ALBM_ONEVOTE","һ�˸�������");
define("_ALBM_NUMVOTES","%s �˸�������");
define("_ALBM_ONEPOST","һ������");
define("_ALBM_NUMPOSTS","%s ������");
define("_ALBM_COMMENTSC","���ۣ�");
define("_ALBM_RATETHISPHOTO","����ͼ����");
define("_ALBM_MODIFY","�༭");
define("_ALBM_VSCOMMENTS","����/��������");

define("_ALBM_DIRECTCATSEL","ѡ��һ������");
define("_ALBM_THEREARE","Ŀǰ�� <b>%s</b> ��ͼƬ�����ǵ����Ͽ��У������� ");
define("_ALBM_LATESTLIST","�½�ͼƬ�б�");

define("_ALBM_VOTEAPPRE","��л�������֡�");
define("_ALBM_THANKURATE","��л�����ѱ����ʱ����%s Ϊ��ͼƬ���֡�");
define("_ALBM_VOTEONCE","�������ͬһͼƬ�ظ����֡�");
define("_ALBM_RATINGSCALE","���ֱ�׼�ɣ�-�����������ߴ������á�");
define("_ALBM_BEOBJECTIVE","��͹����֣�ͬһͼƬ�õ���ͼ���߷�ʱ�����־�û�������ˡ�");
define("_ALBM_DONOTVOTE","�벻Ҫ���Լ���������ͼƬ���֡�");
define("_ALBM_RATEIT","ȷ��");

define("_ALBM_RECEIVED","�����Ѿ��յ����ϴ���ͼƬ����л����");
define("_ALBM_ALLPENDING","����ͼƬ�����۾��辭����˺�Żᱻ����������");

define("_ALBM_RANK","�ȼ�");
define("_ALBM_CATEGORY","����");
define("_ALBM_HITS","������");
define("_ALBM_RATING","����");
define("_ALBM_VOTE","��������");
define("_ALBM_TOP10","%s ʮ��"); // %s is a photo category title

define("_ALBM_SORTBY","����ʽ��");
define("_ALBM_TITLE","����");
define("_ALBM_DATE","����");
define("_ALBM_POPULARITY","���ŵ�");
define("_ALBM_CURSORTEDBY","ͼƬĿǰ�� %s ����");
define("_ALBM_FOUNDIN","�ҵ���");
define("_ALBM_PREVIOUS","��һ��");
define("_ALBM_NEXT","��һ��");
define("_ALBM_NOMATCH","��δ�����κη��ϲ�ѯ�����Ľ����");

define("_ALBM_CATEGORIES","����");

define("_ALBM_SUBMIT","�ύ");
define("_ALBM_CANCEL","ȡ��");

define("_ALBM_MUSTREGFIRST","�Բ��𣡷ÿ�û��ִ�б���Ŀ��Ȩ����<br>����ע����룡");
define("_ALBM_MUSTADDCATFIRST","�Բ�������δ�����κη��ࡣ<br>���Ƚ������࣡");
define("_ALBM_NORATING","��δѡȡ�κ����֡�");
define("_ALBM_CANTVOTEOWN","����������Լ���������ͼƬ���֡�<br>�������ֽ�����¼��ȷ�ϡ�");
define("_ALBM_VOTEONCE2","����ͼƬֻ�ܱ�����һ�Ρ�<br>�������ֽ�����¼��ȷ�ϡ�");

//%%%%%%	Module Name 'MyAlbum' (Admin)	  %%%%%

define("_ALBM_PHOTOSWAITING","����ͼƬ");
define("_ALBM_PHOTOMANAGER","ͼƬ����/ɾ��");
define("_ALBM_CATEDIT","����/�޸�/ɾ�� ͼƬ����");
define("_ALBM_GROUPPERM_GLOBAL","Ȩ���趨");
define("_ALBM_CHECKCONFIGS","���ͼƬģ�����Ͽ�");
define("_ALBM_BATCHUPLOAD","ͼƬ�����ϴ�");
define("_ALBM_GENERALSET","�������һ���趨");
define("_ALBM_REDOTHUMBS2","������������ͼ");

define("_ALBM_SUBMITTER","�����ߣ�");
define("_ALBM_DELETE","ɾ��");
define("_ALBM_NOSUBMITTED","���·���ͼƬ.");
define("_ALBM_ADDMAIN","����һ��������");
define("_ALBM_IMGURL","ͼƬ��ַ (ѡ���Թ���/����߶ȵ�ͼƬ�����ᱻ����Ϊ50)��");
define("_ALBM_ADD","����");
define("_ALBM_ADDSUB","����һ���η���");
define("_ALBM_IN","��");
define("_ALBM_MODCAT","�޸ķ���");
define("_ALBM_DBUPDATED","���Ͽ���³ɹ���");
define("_ALBM_MODREQDELETED","�޸������Ѿ�ɾ����");
define("_ALBM_IMGURLMAIN","ͼƬ��ַ (��ѡ���κθ߶ȵ�ͼƬ���ᱻ����Ϊ50)��");
define("_ALBM_PARENT","�ϲ���ࣺ");
define("_ALBM_SAVE","�����޸�");
define("_ALBM_CATDELETED","������ɾ����");
define("_ALBM_CATDEL_WARNING","���棡��ȷ��Ҫɾ���˷��༰���������е�ͼƬ��������");
define("_ALBM_YES","��");
define("_ALBM_NO","��");
define("_ALBM_NEWCATADDED","�µķ����ѳɹ����!");
define("_ALBM_ERROREXIST","�����������ͼƬ�Ѿ����������Ͽ��У�");
define("_ALBM_ERRORTITLE","�����������������⣡");
define("_ALBM_ERRORDESC","��������������������");
define("_ALBM_WEAPPROVED","�������Ͽ�������ͼƬ����������Ͽ⡣");
define("_ALBM_THANKSSUBMIT","��л���ķ���");
define("_ALBM_CONFUPDATED","����������ɣ�");

}

//////////////////////////////////////////////////////////////////////////////////////////
// �ü������ĺ����� D.J. (phppp at xoops.org) Ϊ xoops.org.cn ���
// ����������κ��йغ��������⣬����ϵ xoops.org.cn
// The Simplified Chinese pack was made by D.J. (phppp at xoops.org) for xoops.org.cn
// You are appreciated to report any inappropriate translation to xoops.org.cn
//////////////////////////////////////////////////////////////////////////////////////////
?>