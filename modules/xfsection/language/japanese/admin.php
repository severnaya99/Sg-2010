<?php
// $Id: admin.php,v 1.2 2005/06/20 15:03:23 ohwada Exp $

// 2004/04/04 K.OHWADA
// _AM_PREFERENCE ���ʤ�

// 2004/03/27 K.OHWADA
// multi language in reorder.php
//   _AM_CATEGORY_REORDERED
//   _AM_ARTICLE_REORDERED
//   _AM_CATEGORY_REORDER_RETURN
// copy mode
// _AM_COPY_ARTICLE_EXPLANE

// 2004/02/28 K.OHWADA
// admin menu same as popup menu
//   ���� _AM_PATH_MANAGEMENT  _AM_LIST_BROKEN
// multi langauge
//   ���� _AM_DUPLICATE_ARTICLES
// ��˥塼�ȥ����ȥ����פ�����
// �������

// 2003/11/26 K.OHWADA
// �������

// 2003/11/21 K.OHWADA
// import.php �Ѹ��б�

// 2003/09/23 K.OHWADA
// rename WF��������� to XF���������
// add menu: bulk import

// admin menu same as popup menu
define("_AM_PREFERENCE",'�⥸�塼������');
define("_AM_PATH_MANAGEMENT","�ѥ�����");
define("_AM_LIST_BROKEN",'��»�ե��������');

//%%%%%%        Admin Module Name  Articles         %%%%%
define("_AM_DBUPDATED","�ǡ����١���������˹�������ޤ���");
define("_AM_STORYID","ID");
define("_AM_TITLE","�����ȥ�");
define("_AM_SUMMARY","����");
define("_AM_CATEGORY","���ƥ���̾"); //******
define("_AM_CATEGORY2","���Υ��ƥ��꡼���Խ�:"); //******
define("_AM_POSTER","��ɮ��");
define("_AM_SUBMITTED2","�������");
define("_AM_NOSHOWART2","��ɽ��");
define("_AM_ACTION","��ư");
define("_AM_EDIT","�Խ�");
define("_AM_DELETE","���");
define("_AM_LAST10ARTS","ȯ�ԺѤߵ���");
define("_AM_PUBLISHED","ȯ������");
define("_AM_PUBLISHEDON","ȯ������");
define("_AM_GO","���");
define("_AM_EDITARTICLE","�������Խ�");
define("_AM_POSTNEWARTICLE","�������������ɲ�");
define("_AM_RUSUREDEL","�����ˤ��ε��������ƤΥ����Ȥ������ޤ�����");
define("_AM_YES","�Ϥ�");
define("_AM_NO","������");
define("_AM_ALLOWEDHTML","HTML�����:");
define("_AM_DISAMILEY","�饢�������̵��");
define("_AM_DISHTML","HTML��̵��");
define("_AM_PREVIEW","�ץ�ӥ塼");
define("_AM_SAVE","��¸");
define("_AM_ADD","�ɲ�");
define("_AM_SMILIE","�����˴饢��������ɲ�");
define("_AM_EXGRAPHIC","�����˳����������ɲ�");
define("_AM_GRAPHIC","�����˥�����β������ɲ�");
define("_AM_FILESHOWDESCRIPT","�ե����륢�åץ��ɾܺ�");
define("_AM_ARTICLEMANAGEMENT","��������");
define("_AM_ARTICLEMANAGEMENTLINKS","���������Υ��");
define("_AM_ARTICLEPREVIEW","�����Υץ�ӥ塼");
define("_AM_ADDMCATEGORY","�ᥤ�󥫥ƥ�����ɲ�");
define("_AM_CATEGORYNAME","���ƥ���̾");
define("_AM_CATEGORYTAKEMETO","�����򥯥�å�����ȿ��������ƥ��������Ǥ��ޤ�");
define("_AM_NOCATEGORY","���顼 - ���ƥ��꡼�Ϻ�������ޤ���Ǥ���");
define("_AM_MAX40CHAR","(����:Ⱦ��40ʸ��)");
define("_AM_CATEGORYIMG","���ƥ���Υ��᡼��");
define("_AM_IMGNAEXLOC","%s �˳�����Ƥ�줿���᡼���ե�����̾�ܳ�ĥ��");
define("_AM_IN","<b>���ƥ������˺���</b><br /> (����: �ᥤ�󥫥ƥ���, ����ʳ��ϥ��֥��ƥ���Ȥ���)");
define("_AM_MOVETO","<b>�̥��ƥ���˰�ư</b> (����:���ƥ�����ư���ʤ�)");
define("_AM_MODIFYCATEGORY","���ƥ�����Խ�");
define("_AM_MODIFY","�Խ�");
define("_AM_PARENTCATEGORY","�ƥ��ƥ���");
define("_AM_SAVECHANGE","�ѹ�����¸");
define("_AM_DEL","���");
define("_AM_CANCEL","����󥻥�");
define("_AM_WAYSYWTDTTAL","���: ���Υ��ƥ�������Ƥε����������Ȥ������ޤ�����");
// Added in Beta6

//define("_AM_CATEGORYSMNGR","���ƥ���ޥ͡�����");
define("_AM_CATEGORYSMNGR","���ƥ������");

define("_AM_PEARTICLES","���������κ���");
define("_AM_GENERALCONF","��������");

// WFSECTION
define("_AM_UPDATEFAIL","�����˼��Ԥ��ޤ���");
define("_AM_EDITFILE","ź�եե�������Խ�");
define("_AM_CATEGORYDESC","���ƥ��꡼���յ�����ƥ�����");
define("_AM_FILESBASEPATH","ź�եե�����Υǥ��쥯�ȥ�:");
define("_AM_AGRAPHICPATH","�����β����ե�����Υǥ��쥯�ȥ�:");
define("_AM_SGRAPHICPATH","���ƥ���β����ե�����Υǥ��쥯�ȥ�:");
define("_AM_SMILIECPATH","�饢������Υǥ��쥯�ȥ�:");
define("_AM_HTMLCPATH","HTML�ե�����Υǥ��쥯�ȥ�:");
define("_AM_FILEUPLOADSPATH","ź�եե�����: ");
define("_AM_FILEUPLOADSTEMPPATH","ź�դΰ����¸: ");
define("_AM_ARTICLESFILEPATH","�����Υ��᡼��: ");
define("_AM_SECTIONFILEPATH","���ƥ���Υ��᡼��: ");
define("_AM_SMILIEFILEPATH","�饢������Υ��᡼��: ");
define("_AM_HTMLFILEPATH","HTML�ե�����: ");
define("_AM_UPLOADCONFIGFILE","����ե�����Υ��åץ���: ");
define("_AM_ARTICLESAPAGE","��ڡ�����ɽ�����뵭����");
define("_AM_ARTICLESAPAGE2","�ڡ����ʥӥ�������ɽ����������ˤ��줾��Υڡ�����ɽ������뵭����");
define("_AM_NOIMG","���᡼��������ޤ���");
define("_AM_PIDINVALID","�ƥ��ƥ��꤬�����Ǥ�");
define("_AM_NOTITLE","�����ȥ�̵��");
define("_AM_FILEDEL","���: �����ˤ��Υե�����������ޤ�����");
define("_AM_AFERTSETCATE","���ƥ�����ɲø塢�������ɲäǤ��ޤ�");
define("_AM_IMGUPLOAD","���ƥ���Υ��᡼���Υ��åץ���");
define("_AM_IMGUPLOAD2","���ߤΥ��᡼���ե������");
define("_AM_IMGNAME","�ե�����̾ (�֥��: ���ꥸ�ʥ�Υե�����̾�Ȱ��");
define("_AM_UPLOADED","���åץ��ɤ���ޤ���");
define("_AM_ISNOTWRITABLE","�Ͻ񤭹��߲ĤǤϤ���ޤ���");
define("_AM_UPLOADFAIL","���åץ��ɼ���");
define("_AM_NOTALLOWEDMINETYPE","���μ���Υե�����ϥ��åץ��ɤǤ��ޤ���");
define("_AM_FILETOOBIG","�ե����륵�������礭�����ޤ�");

define("_AM_CATEGORYMENU","���ƥ��꡼���Ф�����");
define("_AM_ARTICLE2MENU","�������Ф�����");
define("_AM_ARTICLEPAGEMENU","�����ڡ�������");
define("_AM_BLOCKMENU","�֥�å�����");
define("_AM_ADMINEDITMENU","������������");
define("_AM_ADMINCONFIGMENU","��������");

define("_AM_ARTIMGUPLOAD","���᡼���Υ��åץ���");
define("_AM_TOPPAGETYPE","����ɽ�����������˵����ؤΥ�󥯤�ɽ�����롩");
define("_AM_SHOWCATPIC","�ᥤ���˥塼�Υڡ����˥��ƥ���Υ��᡼����ɽ������");
define("_AM_WYSIWYG","���ꥸ�ʥ�Υ��ǥ������������WYSIWYG���ǥ���");
define("_AM_SHOWCOMMENTS","�����Υڡ����˥桼���Υ����Ȥ�ɽ�����ޤ�����");
define("_AM_SUBMITTED","�桼������Ƥ�������"); //added

//define("_AM_ALLTXT","<h4>��������</h4></div><div><b>��������</b>�Ǥϵ������Խ��������̾�����ѹ����Ǥ��ޤ����ܵ�ǽ�ϥǡ����١���������Ƥε�����ɽ������ޤ���<br /><br />"); //added
// WF -> XF
//define("_AM_PUBLISHEDTXT","<h4>����ȯ�Դ���</h4></div><div><b>����ȯ�Դ���</b>�Ǥϡʴ����Ԥˤ�äƾ�ǧ�����ȯ�Ԥ��줿���Ƥε�����ɽ������ޤ�<br /><br />������ɽ������뵭���� XF��������� �Υᥤ���˥塼�Υ��ƥ��꡼�����������ɽ������ޤ����ʥ��롼�ץ��������ˤ����椵�줿���Ƥε�����ޤ��<br /><br />"); //added
//define("_AM_SUBMITTEDTXT","<h4>������д���</h4></div><div><b>������д���</b>�Ǥϡ����ʤ��Υ����Ȥ���Ф��줿���Ƥε�����ɽ�������Խ��Ǥ��ޤ���<br /><br />��ǧ����ˤ�<b>�Խ�</b>�򥯥�å���<b>��ǧ</b>�����å��ܥå����˥����å�������Ƶ�������¸���Ʋ���������кѤߵ�����ȯ�Ԥ���ޤ���<br /><br />"); //added
//define("_AM_ONLINETXT","<h4>����ɽ������</h4></div><div><b>����ɽ������</b>�Ǥϡ�online�פ����ꤵ�줿���Ƥε�����ɽ������ޤ���<br /><br />�����Υ��ơ��������ѹ�����ˤ��Խ��򥯥�å�����online�ץ����å��ܥå������ѹ����Ʋ�������<br /><br />"); //added
//define("_AM_OFFLINETXT","<h4>������ɽ������</h4></div><div><b>������ɽ������</b>�Ǥϡ�offline�פ����ꤵ�줿���Ƥε�����ɽ������ޤ���<br /><br />�����Υ��ơ��������ѹ�����ˤ��Խ��򥯥�å�����online�ץ����å��ܥå������ѹ����Ʋ�������<br /><br />"); //added
//define("_AM_EXPIREDTXT","<h4>������������</h4></div><div><b>������������</b>�Ǥϼ����������Ƥε�����ɽ������ޤ�<br /><br /><b>�Խ�</b>��󥯤򥯥�å���<b>������������ꤹ��</b>������ѹ����뤳�ȤǴ�ñ�˼������������Ǥ��ޤ�"); //added
//define("_AM_AUTOEXPIRETXT","<h4>������ư��������</h4></div><div><b>������ư���������Ǥ�</b>�������դǼ�������褦�����ꤷ�����Ƥε�����ɽ������ޤ�<br /><br /><b>�Խ�</b>��󥯤򥯥�å���<b>������������ꤹ��</b>������ѹ����뤳�ȤǴ�ñ�˼������������Ǥ��ޤ�"); //added
//define("_AM_AUTOTXT","<h4>������ưȯ�Դ���</h4></div><div><b>������ưȯ�Դ����Ǥ�</b>�����դ�ȯ�Ԥ���褦�����ꤷ�����Ƥε�����ɽ������ޤ�<br /><br /><b>�Խ�</b>��󥯤򥯥�å���'ȯ����������ꤹ��'������ѹ����뤳�Ȥ�����Ǥ��ޤ�"); //added
// WF -> XF
//define("_AM_NOSHOWTXT","<h4>������ɽ������</h4></div><div><b>������ɽ������</b>�ϵ��������̤�°�����̾�ε����Ȥϰ㤤�������Υȥåץڡ�����ɽ�����줺�����ɤ����Ǥ��ޤ��󡣤������� XF��������� �Υ�˥塼�֥�å���ɽ������ޤ���<br /><br />HTML�ڡ����ǤΤ��Υ��ץ����ȡ־������ɽ���סʵ����Խ��ڡ����Υ��ץ����ˤ���Ѥ��ơ����ʤ���ɽ����������Τ�ɽ���Ǥ��ޤ����㤨�С��ץ饤�Х����˴ؤ�������������ѤǤ��ޤ���<br /><br />����¾�Υ��ץ���������Ʊ���˻��ѤǤ��ޤ�����ȯ�ԡ�������ɽ������ɽ���ʤɡ�<br /><br />"); //added

// ��˥塼�ȥ����ȥ����פ�����
define("_AM_ALLTXT","<b>��������</b>�Ǥϵ������Խ��������̾�����ѹ����Ǥ��ޤ����ܵ�ǽ�ϥǡ����١���������Ƥε�����ɽ������ޤ���<br /><br />"); //added
define("_AM_PUBLISHEDTXT","<b>ȯ�ԺѤߵ�������</b>�Ǥϡʴ����Ԥˤ�äƾ�ǧ�����ȯ�Ԥ��줿���Ƥε�����ɽ������ޤ�<br /><br />������ɽ������뵭���� XF��������� �Υᥤ���˥塼�Υ��ƥ��꡼�����������ɽ������ޤ����ʥ��롼�ץ��������ˤ����椵�줿���Ƥε�����ޤ��<br /><br />"); //added
define("_AM_SUBMITTEDTXT","<b>��ǧ�Ԥ���������</b>�Ǥϡ����ʤ��Υ����Ȥ���Ф��줿���Ƥε�����ɽ�������Խ��Ǥ��ޤ���<br /><br />��ǧ����ˤ�<b>�Խ�</b>�򥯥�å���<b>��ǧ</b>�����å��ܥå����˥����å�������Ƶ�������¸���Ʋ���������кѤߵ�����ȯ�Ԥ���ޤ���<br /><br />"); //added
define("_AM_ONLINETXT","<b>ɽ����������</b>�Ǥϡ�online�פ����ꤵ�줿���Ƥε�����ɽ������ޤ���<br /><br />�����Υ��ơ��������ѹ�����ˤ��Խ��򥯥�å�����online�ץ����å��ܥå������ѹ����Ʋ�������<br /><br />"); //added
define("_AM_OFFLINETXT","<b>��ɽ����������</b>�Ǥϡ�offline�פ����ꤵ�줿���Ƥε�����ɽ������ޤ���<br /><br />�����Υ��ơ��������ѹ�����ˤ��Խ��򥯥�å�����online�ץ����å��ܥå������ѹ����Ʋ�������<br /><br />"); //added
define("_AM_EXPIREDTXT","<b>������������</b>�Ǥϼ����������Ƥε�����ɽ������ޤ�<br /><br /><b>�Խ�</b>��󥯤򥯥�å���<b>������������ꤹ��</b>������ѹ����뤳�ȤǴ�ñ�˼������������Ǥ��ޤ�"); //added
define("_AM_AUTOEXPIRETXT","<b>��ư������������</b>�ǤϤ������դǼ�������褦�����ꤷ�����Ƥε�����ɽ������ޤ�<br /><br /><b>�Խ�</b>��󥯤򥯥�å���<b>������������ꤹ��</b>������ѹ����뤳�ȤǴ�ñ�˼������������Ǥ��ޤ�"); //added
define("_AM_AUTOTXT","<b>��ưȯ�Ե�������</b>�Ǥ������դ�ȯ�Ԥ���褦�����ꤷ�����Ƥε�����ɽ������ޤ�<br /><br /><b>�Խ�</b>��󥯤򥯥�å���'ȯ����������ꤹ��'������ѹ����뤳�Ȥ�����Ǥ��ޤ�"); //added
define("_AM_NOSHOWTXT","<b>������ɽ����������</b>�ϵ��������̤�°�����̾�ε����Ȥϰ㤤�������Υȥåץڡ�����ɽ�����줺�����ɤ����Ǥ��ޤ��󡣤������� XF��������� �Υ�˥塼�֥�å���ɽ������ޤ���<br /><br />HTML�ڡ����ǤΤ��Υ��ץ����ȡ־������ɽ���סʵ����Խ��ڡ����Υ��ץ����ˤ���Ѥ��ơ����ʤ���ɽ����������Τ�ɽ���Ǥ��ޤ����㤨�С��ץ饤�Х����˴ؤ�������������ѤǤ��ޤ���<br /><br />����¾�Υ��ץ���������Ʊ���˻��ѤǤ��ޤ�����ȯ�ԡ�������ɽ������ɽ���ʤɡ�<br /><br />"); //added

define("_AM_BLOCKCONF","�֥�å�����");
define("_AM_TITLE1","�ᥤ���˥塼�Υ֥�å�̾:");
define("_AM_TITLE4","�Ƕ�ε����Υ֥�å�̾:");
define("_AM_TITLE5","�͵������Υ֥�å�̾:");
define("_AM_ORDER","�ֽ�פ�����Υƥ�����:");
define("_AM_DATE","�����աפ�����Υƥ�����:");
define("_AM_HITS","�֥ҥåȡפ�����Υƥ�����:");
define("_AM_DISP","��ɽ���פ�����Υƥ�����:");
define("_AM_ARTCLS","�����֥�å�̾");
define("_AM_MENU_LINKS","<b>��˥塼�����Υ��</b>");
define("_AM_BAN","�ػߥ桼��");
//New to version 0.9.2
define("_AM_CMODHEADER","File Permission Check");

// WF -> XF
define("_AM_CMODERRORINFO","�ǥ��쥯�ȥ�ȥե����뤬Ŭ�ڤ˽񤭹��߲ĤˤʤäƤ��뤫�����å����ޤ���<br/><br/> XF��������� �ϲ����Υե�����ȥǥ��쥯�ȥ���Ф���CHMOD���߽񤭹���°�����������ʤ����ˤϥ��顼��ɽ�����ޤ�");

define("_AM_FILEPATH","���᡼���ȥ��åץ��ɤ�����");

// WF -> XF
define("_AM_FILEPATHWARNING","�ǥ��쥯�ȥ�Υѥ�����򤷤ޤ��� XF��������� �Ϥ��ʤ������Ϥ����ѥ����������ʤ����ٹ������ޤ���<br/><br/>����ˤ���ȥǥե���ȤΥѥ������Ѥ���ޤ�<br/><br/>");

define("_AM_FILEUSEPATH","�桼���Υѥ����ѹ�");
define("_AM_PATHEXIST","�ѥ���¸�ߤ��ޤ�");
define("_AM_PATHNOTEXIST","�ѥ���¸�ߤ��ޤ��󡢳�ǧ���Ʋ�����");
define("_AM_USERPATH","�桼������ѥ�");
define("_AM_SHOWSELIMAGE","�������򤵤�Ƥ��륤�᡼����ɽ��: "); //******* Updated *******
define("_AM_SHOWSUBMENU","���ƥ���ΰ����ڡ����˥��֥�˥塼��ɽ�����롩");
define("_AM_MENUS","���ƥ���ΰ�������");
define("_AM_DEFAULTPATH","�ǥե���ȤΥѥ��ϻ��Ѥ���Ƥ��ޤ�");
define("_AM_SCROLLINGBLOCK","�Ƕ�ε����Υ֥�å��ǥ������뤵���롩");
define("_AM_BLOCKHEIGHT","�������뤵����֥�å��ι⤵");
define("_AM_DEFAULT"," �ǥե����");
define("_AM_BLOCKAMOUNT","�������뤵����Կ���");
define("_AM_BLOCKDELAY","�������뤵����֥�å��ΰ�Ԥ�������ٱ�");
define("_AM_LASTART","�������̤�ɽ�����뿷����������: ");
define("_AM_NUMUPLOADS","���˥��åץ��ɤ���ե��������");

// WF -> XF
define("_AM_WEBMASTONLY","�����ԤΤߤ� XF��������� �������ѹ�����ꤹ�롩");

define("_AM_DEFAULTS","���Ƥ������ǥե���Ȥ��᤹��");

define("_AM_NOCMODERROR","( ���� )");
define("_AM_CMODERROR","( �۾�/�ǥ��쥯�ȥ꤬����ޤ��� )");

// WF -> XF
define("_AM_REVERTED"," XF��������� �������ǥե���Ȥ��᤹");

define("_AM_GROUPPROMPT","�����Υ��롼�פ˥�����������Ĥ���:");
define("_AM_NOVIEWPERMISSION","���Υ��ꥢ�ؤΥ���������������ޤ���");
define("_AM_FILE","�ե�����: ");
define("_AM_NOMAINTEXT","���顼: ���ʤ��ε����ˤϥƥ�����/HTML������ޤ��󡣶��ε�������ƤǤ��ޤ���");
define("_AM_DIR","�ǥ��쥯�ȥ�: ");
define("_AM_MISC","����¾����");

define("_AM_ISNOTWRITABLE2"," �ϥ����Ф�¸�ߤ��ޤ����������ѥ����ѹ����Ʋ�����");
define("_AM_CANNOTMODIFY"," �������ѥ������ꤷ�ʤ����Խ��Ǥ��ޤ���");
define("_AM_PATH","�ѥ�: ");

define("_AM_CMODHEADER2","�ե���������å�");
define("_AM_ARTICLEMENU","�����κ�������");
define("_AM_APPROVE","��ǧ");
define("_AM_MOVETOTOP","�ܵ�������־�˰�ư");
define("_AM_CHANGEDATETIME","ȯ���������ѹ�");
define("_AM_NOWSETTIME","���� %s �����ꤵ��Ƥ��ޤ�"); // %s is datetime of publish
define("_AM_CURRENTTIME","%s �����ߤλ���Ǥ�");  // %s is the current datetime
define("_AM_SETDATETIME","���ꤹ��ȯ������");
define("_AM_MONTHC","��:");
define("_AM_DAYC","��:");
define("_AM_YEARC","ǯ:");
define("_AM_TIMEC","����:");
define("_AM_AUTOAPPROVE","������е�����ư��ǧ���롩");
define("_AM_DEFAULTTIME","�����ॹ�����");

// WF -> XF
define("_AM_TURNOFFLINE"," XF��������� �򱣤��ޤ����� (�����Ԥ����� XF��������� �˥��������Ǥ��ޤ�)");

define("_AM_SHOWMARTICLES","�������ɽ�����ޤ�����");
define("_AM_SHOWMUPDATED","�������ɽ�����ޤ�����");
define("_AM_SHORTCATTITLE","���ƥ��꡼�Υ����ȥ��ư�Ǿ�ά���ޤ�����");
define("_AM_SHOWAUTHOR","���������˼�ɮ�Ԥ����ɽ������");
define("_AM_SHOWCOMMENTS2","���������˥��������ɽ������");
define("_AM_SHOWFILE","����������ź�եե��������ɽ������");
define("_AM_SHOWRATED","���������˹�ɾ�����ɽ������");
define("_AM_SHOWVOTES","������������ɼ���ɽ������");
define("_AM_SHOWPUBLISHED","ȯ���������ɽ�����ޤ�����");
define("_AM_SHOWHITS","���������˥ҥå����ɽ������");
define("_AM_SHORTARTTITLE","�����Υ����ȥ��ư�Ǿ�ά���ޤ�����");
define("_AM_OFFLINE","<b>��������ɽ��</b> �����򸫤��ʤ����ޤ�");
define("_AM_BROKENREPORTS","��»�����ե���������");
define("_AM_NOBROKEN","��»�����ե��������𤵤�Ƥ��ޤ���");
define("_AM_IGNORE","̵��");
define("_AM_FILEDELETED","�ե�����Ϻ������ޤ���");
define("_AM_BROKENDELETED","�ե�������»���Ϻ������ޤ���");
define("_AM_IGNOREDESC","̵�� (����̵�뤷<b>�ե�������»���</b>�Τߺ��)");
define("_AM_DELETEDESC","��� (�ե�����˴ؤ��� <b>��𤵤줿��������ɥǡ���</b> �� <b>�ե�������»���</b> �κ��)");
define("_AM_REPORTER","�����Ԥ����");
define("_AM_FILETITLE","��������ɥ����ȥ�: ");

// WF -> XF
define("_AM_DLCONF","XF��������� �Υ������������");

define("_AM_FILEDESCRIPT","�ե�����̾�ξܺ�");
define("_AM_STATUS","���ơ�����");
define("_AM_UPLOAD","���åץ���");
define("_AM_NOTIFYPUBLISH","ȯ�Ի���Email�Ǥ�����");
define("_AM_VIEWHTML","HTML�Խ�");
define("_AM_VIEWWAYSIWIG","WYSIWYG�Խ�");
define("_AM_CATEGORYT","���ƥ���");
define("_AM_ACCESS","��������");
define("_AM_PAGE","�ڡ���");
define("_AM_ARTICLEMANAGE","��������");

//define("_AM_WEIGHTMANAGE","�������ȴ���");
//define("_AM_UPLOADMAN","���åץ��ɴ���");
define("_AM_WEIGHTMANAGE","���ƥ���ȵ����Υ������ȴ���");
define("_AM_UPLOADMAN","���åץ��ɥե��������");

// WF -> XF
define("_AM_NOADMINRIGHTS","�����ԤΤߤ� XF��������� ��������ѹ��Ǥ��ޤ�");

define("_AM_FILECount","�ե����륫�����");
define("_AM_ALLARTICLES","���Ƥε�������");
define("_AM_PUBLARTICLES","ȯ�ԺѤߵ�������");

//define("_AM_SUBLARTICLES","��ƺѤߵ�������");
define("_AM_SUBLARTICLES","��ǧ�Ԥ���������");

define("_AM_ONLINARTICLES","ɽ����������");
define("_AM_OFFLIARTICLES","��ɽ����������");
define("_AM_EXPIREDARTICLES","������������");
define("_AM_AUTOEXPIREARTICLES","��ư������������");
define("_AM_AUTOARTICLES","��ưȯ�Ե�������");
define("_AM_NOSHOWARTICLES","������ɽ����������");
define("_NOADMINRIGHTS2","�����ԤΤߤ���������ѹ��Ǥ��ޤ�");
define("_AM_CANNOTHAVECATTHERE","���顼: ���ƥ���ϼ�ʬ���ȤΥ��֥��ƥ���ˤϤʤ�ޤ���");
define("_AM_SECTIONMANAGE","���ƥ������");
define("_AM_SECTIONMANAGELINK","���ƥ�������Υ��");
define("_AM_FILEID","�ե�����");
define("_AM_FILEICON","��������");
define("_AM_FILESTORE","̾�����դ�����¸");
define("_AM_REALFILENAME","��¸���Υե�����̾");
define("_AM_USERFILENAME","��������ɻ��Υե�����̾");
define("_AM_FILEMIMETYPE","�ե����륿����");
define("_AM_FILESIZE","�ե����륵����");
define("_AM_FDCOUNTER","������");
define("_AM_EXPARTS","��������");
define("_AM_EXPIRED","��ư������");

//define("_AM_CREATED","���դκ���");
define("_AM_CREATED","��������");

define("_AM_CHANGEEXPDATETIME","�����������ѹ�����");
define("_AM_SETEXPDATETIME","������������ꤹ��");
define("_AM_NOWSETEXPTIME","%s �˵����μ����������ꤵ��Ƥ��ޤ�");
define("_AM_ANONPOST","�����Ȥ˵�������Ƥ���Ĥ��ޤ�����");
define("_AM_NOTIFYSUBMIT","������Ƥκݴ����Ԥ˥᡼����������ޤ�����");
define("_AM_SECTIONIMAGE","�ȥåץڡ����Υ��᡼��");
define("_AM_SECTIONHEAD","�ȥåץڡ����Υإå�");
define("_AM_SECTIONFOOT","�ȥåץڡ����Υեå�");
define("_AM_SHOWVOTESINART","�����ؤ���ɼ����Ĥ��ޤ�����");
define("_AM_SHOWREALNAME","��ɮ�Ԥ˥桼������̾��ɽ�����ޤ�����(��̾�����ꤵ��Ƥ��ʤ����ϥ桼��̾�����ꤵ��ޤ�)");
define("_AM_SHOWCATEGORYIMG","���ƥ�����Ǿ嵭���᡼����ɽ�����ޤ�����");
define("_AM_EDITSERVERFILE","�����ФΥե�������Խ�");
define("_AM_CURRENTFILENAME","���ߤΥե�����̾: ");
define("_AM_CURRENTFILESIZE","�ե����륵����: ");
define("_AM_UPLOADFOLD","���åץ��ɥե����: ");
define("_AM_UPLOADPATH","�ѥ�: ");
define("_AM_FREEDISKSPACE","��������:");
define("_AM_RENAMETHIS","�ե�����̾���ѹ����ޤ�����");
define("_AM_RENAMEFILE","�ե�����̾���ѹ�");
define("_AM_SHOWSUMMARY","�������ɽ�����ޤ�����");
define("_AM_SHOWICON","�͵��ȹ����Υ��������ɽ�����ޤ�����");
define("_AM_INDEXHEADING","�ȥåץڡ����Υإå�"); 
define("_AM_EXTERNALARTICLE","��������</b> �ƥ����Ȥ�HTML�ե�����Ͼ�񤭤���ޤ���"); 

// added in WFS v1b6
define("_AM_POPULARITY", "�͵�");
define("_AM_ARTICLESSORT", "����ɽ����");
define("_AM_NAVTOOLTYPE", "�ʥӥ��������ġ���μ���");
define("_AM_SELECTBOX", "�ץ�������˥塼");
define("_AM_SELECTSUBS", "���֥��ƥ����ޤ᤿�ץ�������˥塼");
define("_AM_LINKEDPATH", "���");
define("_AM_LINKSANDSELECT", "��󥯤ȥץ�������˥塼");
define("_AM_NONE", "̵��");
define("_AM_CATEGORYWEIGHT", "���ƥ���Υ�������");
define("_AM_ARTICLEWEIGHT", "�����Υ�������");
define("_AM_WEIGHT", "��������");
define("_AM_DUPLICATECATEGORY","���ƥ����ʣ��");

// add
define("_AM_DUPLICATE_ARTICLES","������ʣ������");

define("_AM_COPY", "���ԡ�");
define("_AM_TO", "�оݡ�");
define("_AM_NEWCATEGORYNAME", "���������ƥ���̾");
define("_AM_DUPLICATE", "ʣ��");
define("_AM_DUPLICATEWSUBS", "���֥��ƥ�����ߤ�ʣ��");
define("_AM_ALLOWEDMIMETYPES", "���ѤǤ���MIME������");
define("_AM_MODIFYFILE", "�����ե�������Խ�");
define("_AM_FILESTATS", "ź�եե��������");
define("_AM_FILESTAT", "�����Υե��������:"); 
define("_AM_ERRORCHECK", "�ե���������å�"); 
define("_AM_LASTACCESS", "�ǽ���������"); 
define("_AM_DOWNLOADED", "��������ɲ��"); 
define("_AM_DOWNLOADSIZE", "�ե����륵����");
define("_AM_UPLOADFILESIZE", "���åץ��ɤǤ������ե����륵����(KB) 1048576 B = 1 MB");
define("_AM_FILEMODE", "�ե����륢�åץ��ɤΥ�������������");
define("_AM_IMGHEIGHT", "���åץ��ɥ��᡼���κ���⤵");
define("_AM_IMGWIDTH", "���åץ��ɥ��᡼���κ�����");
define("_AM_FILEPERMISSION", "�ե����륢��������");  
define("_AM_IMGESIZETOBIG", "���¥������ʾ�Υ��᡼���⤵/��");
define("_AM_CATREORDERTEXT", "�����������ƤΥ��ƥ�����¤�ľ���ޤ���<br />�ᥤ�󥫥ƥ����ǻ���ġ����֥��ƥ����ø���Ĥȥ��졼�Ǥ������줾��Υ��ƥ���ϥ������Ȥˤ�ä�ɽ������ޤ���<br /><br />�������¤��ؤ���ˤϥ��ƥ���Υ����ȥ�򥯥�å�����ȵ����ΰ�����ɽ������ޤ���");  
define("_WFS_ATTACHFILE", "ź�եե�����");  
define("_WFS_ATTACHFILEACCESS", "�����������ϵ�����Ʊ���ˤʤ�ޤ���ź�եե�������Խ������ѹ��Ǥ��ޤ���");  
define("_AM_WFSFILESHOW", "ź�եե�����");  
define("_AM_ATTACHEDFILE", "�ե������ɽ��");  
define("_AM_ATTACHEDFILEM", "ź�եե��������"); 
define("_AM_UPOADMANAGE", "���åץ��ɴ���"); 
define("_AM_CAREORDER", "���ƥ���ȵ����Υ�������");
define("_AM_CAREORDER2", "���ƥ�����¤��ؤ�");
define("_AM_CAREORDER3", "�������¤��ؤ�");   

define("_AM_PICON", "�����ʥڡ����ˤΥ��������ɽ�����롩"); 

// WF -> XF
define("_AM_JUSTHTML", "<b> �������ɽ��</b> �ʤ��Υ��ץ����ϵ���������Ƥ� XF��������� �ξ����ɽ��������ñ���HTML��ƥ����Ȥ�ɽ������ʪ�Ǥ���");

define("_AM_NOSHOART", "<b> ������ɽ��</b> �ʤ��Υ��ץ����ˤ�äơ��ܵ������ȥåץڡ����ΰ�����ɽ������ʤ��ʤ�ޤ��������˥�˥塼�֥�å��ε�����󥯤Τߤ�ɽ������ޤ�����");
define("_AM_INDEXPAGECONFIG", "����ǥå����ڡ�������");

// WF -> XF
// �������
define("_AM_INDEXPAGECONFIGTXT", "������ XF��������� �Υ���ǥå����ڡ�����ʬ���ѹ��򤹤뤳�Ȥ��Ǥ��ޤ�<br /><br />��ñ�˥����᡼����إå���եå���ʸ�Ϥ��ѹ���������Ǥ��ޤ�");

// comment
//define("_AM_VISITSUPPORT", 'WF���������ξ���䥢�åץǡ��Ȥ������ˡ�Υإ�פ����ꤹ��ˤ�WF���������Υ����֥����Ȥ�ˬ��Ʋ�����<br /> WF-Sections v1 B6 &copy; 2003 <a href="http://wfsections.xoops2.com/" target="_blank">WF-Sections</a>');
define("_AM_VISITSUPPORT", '');

define("_AM_REORDERID", "ID"); 
define("_AM_REORDERPID", "PID"); 
define("_AM_REORDERTITLE", "�����ȥ�");
define("_AM_REORDERDESCRIPT", "����");
define("_AM_REORDERWEIGHT", "��������");
define("_AM_REORDERSUMMARY", "����");

// copy mode in index.php
define("_AM_COPY_ARTICLE_EXPLANE","���ε�����Ĥ��ƥ��ԡ����롣ź�եե�����ϥ��ԡ�����ʤ���");

// multi language in reorder.php
define("_AM_CATEGORY_REORDERED","���ƥ�����¤��ؤ�����ޤ���");
define("_AM_ARTICLE_REORDERED","�������¤��ؤ�����ޤ���");
define("_AM_CATEGORY_REORDER_RETURN","���ƥ�����¤��ؤ������");

// *** add menu: bulk import ***
define("_AM_IMPORT", "HTML�ե�����ΰ����Ͽ");
define("_AM_IMPORT_DIRNAME", "�ǥ��쥯�ȥ�̾ ���뤤�� �ե�����̾");
define("_AM_IMPORT_HTMLPROC", "HTML�ե�����ν���");
define("_AM_IMPORT_EXTFILTER", "�����ե��륿���ץ����̾");
define("_AM_IMPORT_CHARCONV", "ʸ�������ɤ��Ѵ�");
define("_AM_IMPORT_CHARNON", "�Ѵ����ʤ�");
define("_AM_IMPORT_CHARAUTO", "ʸ�������ɤ�ưǧ������SJIS�Ǥ���С�EUC-JP���Ѵ�����");
define("_AM_IMPORT_CHARFORCE", "ʸ�������ɤ�SJIS�Ȥߤʤ���EUC-JP���Ѵ�����");
define("_AM_IMPORT_BODY", "body�� �Τ��ڽФ�");
define("_AM_IMPORT_INDEXHTML", "Ʊ�������ľ�Υǥ��쥯�ȥ�� index.html �ؤΥ�󥯤�������");
define("_AM_IMPORT_LINK", "��󥯤򥿥��ȥ��ե�����̾���ѹ�����");
define("_AM_IMPORT_IMAGE", "���᡼�����ե�����Υ�󥯤򥤥᡼����Ǽ����ѹ�����");
define("_AM_IMPORT_ATMARK", "@ �� &amp;#064; ���ѹ�����");
define("_AM_IMPORT_TEXTPROC", "�ƥ����ȡ��ե�����ν���");
define("_AM_IMPORT_TEXTPRE", "�ƥ����ȡ��ե������ &lt;pre&gt; &lt;/pre&gt; �ǰϤ�");
define("_AM_IMPORT_IMAGEPROC", "���᡼�����ե�����ν���");
define("_AM_IMPORT_IMAGEDIR", "���᡼�����ե�����γ�Ǽ��Υǥ��쥯�ȥ�̾");
define("_AM_IMPORT_IMAGECOPY", "���᡼�����ե�������Ǽ��˥��ԡ�����");
define("_AM_IMPORT_TESTMODE", "�ƥ��ȡ��⡼��");
define("_AM_IMPORT_TESTDB", "DB�˳�Ǽ����ޤ��󡣳�Ǽ����Ȥ��ϥ����å���Ϥ����Ƥ���������");
define("_AM_IMPORT_TESTEXEC", "�ƥ��ȼ¹�");
define("_AM_IMPORT_TESTTEXT", "�ƥ����Ȥ�ɽ������");
define("_AM_IMPORT_EXPLANE", "�ե�����μ����Ƚ��ϡ���ĥ�ҤǹԤ��ޤ���<br>HTML�ե������Ƚ��ϡ�html,htm �Τ��Ť줫�Ǥ���<br>�ƥ����ȡ��ե������Ƚ��ϡ�txt �Ǥ���<br>���᡼�����ե�����ϡ�gif,jpg,jpeg,png �Τ��Ť줫�Ǥ���");
define("_AM_IMPORT_ERRDIREXI", "�ǥ��쥯�ȥꤢ�뤤�� �ե����뤬¸�ߤ��ʤ�");
define("_AM_IMPORT_ERRFILEXI", "�ե��륿���ץ���ब¸�ߤ��ʤ�");
define("_AM_IMPORT_ERRFILEXEC", "�ե��륿���ץ���ब�¹�°���Ǥʤ�");
define("_AM_IMPORT_ERRNOCOPY", "���᡼�����ե�������Ǽ��˥��ԡ�������꤬�ʤ�");
define("_AM_IMPORT_ERRNOIMGDIR", "���᡼�����ե�����γ�Ǽ��Υǥ��쥯�ȥ�̾�λ��꤬�ʤ�");
define("_AM_IMPORT_ERRIMGDIREXI", "���᡼�����ե�����γ�Ǽ�褬�ǥ��쥯�ȥ�Ǥʤ�");
define("_AM_IMPORT_ERRFILEEXI", "�ե����뤬¸�ߤ��ʤ�");

// translated into Japanse by HAL
// based on WF-Section V1.0 english/admin.php 19/06/2003
// http://www.adslnet.org/

// 
?>