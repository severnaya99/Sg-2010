<?php
// $Id: admin.php,v 1.2 2006/01/04 09:58:26 ohwada Exp $

// 2004/03/27 K.OHWADA
// error message
//   _AM_DIR_NOT_WRITABLE
//   _AM_EDIT_ARTICLE_RETURN
// copy mode
//   _AM_COPY_ARTICLE_EXPLANE
// multi language in reorder.php
//   _AM_CATEGORY_REORDERED
//   _AM_ARTICLE_REORDERED
//   _AM_CATEGORY_REORDER_RETURN

// 2004/02/28 K.OHWADA
// admin menu same as popup menu
//   add _AM_PATH_MANAGEMENT  _AM_LIST_BROKEN
// multi langauge
//   add _AM_DUPLICATE_ARTICLES
// unify a article menu and a title

// 2003/11/21 K.OHWADA
// rename WFsection to XFsection
// add menu: bulk import

// admin menu same as popup menu
define("_AM_PREFERENCE",'�t�ΰ򥻳]�w');
define("_AM_PATH_MANAGEMENT","���|�޲z");
define("_AM_LIST_BROKEN",'�C�X���ĤU��');

//%%%%%%        Admin Module Name  Articles         %%%%%
define("_AM_DBUPDATED","��Ʈw�w��s!");
define("_AM_STORYID","ID");
define("_AM_TITLE","���D");
define("_AM_SUMMARY","�K�n");
define("_AM_CATEGORY","���O�W��"); //******
define("_AM_CATEGORY2","�ק惡���O:"); //******
define("_AM_POSTER","�@��");
define("_AM_SUBMITTED2","���ɤ��");
define("_AM_NOSHOWART2","�����");
define("_AM_ACTION","�ʧ@");
define("_AM_EDIT","�s��");
define("_AM_DELETE","�R��");
define("_AM_LAST10ARTS","�{���峹");
define("_AM_PUBLISHED","�n�����");
define("_AM_PUBLISHEDON","�o����"); 
define("_AM_GO","�e�X");
define("_AM_EDITARTICLE","�s��峹");
define("_AM_POSTNEWARTICLE","�s��峹");
define("_AM_RUSUREDEL","�A�T�w�n�R���o�g�峹�P����פ��e?");
define("_AM_YES","�O");
define("_AM_NO","�_");
define("_AM_ALLOWEDHTML","�i��HTML:");
define("_AM_DISAMILEY","����ܪ���");
define("_AM_DISHTML","����HTML");
define("_AM_PREVIEW","�w��");
define("_AM_SAVE","�x�s");
define("_AM_ADD","�s�W");
define("_AM_SMILIE","�W�[���Ϩ�峹��");
define("_AM_EXGRAPHIC","�W�[�B�~�Ϥ���峹��");
define("_AM_GRAPHIC","�W�[�Τ�ݹϤ���峹��");
define("_AM_FILESHOWDESCRIPT","�W���ɮ׻���"); //new
define("_AM_ARTICLEMANAGEMENT","�峹�޲z");
define("_AM_ARTICLEMANAGEMENTLINKS","�峹�޲z�s��");
define("_AM_ARTICLEPREVIEW","�峹�w��");
define("_AM_ADDMCATEGORY","�إ߷s���O");
define("_AM_CATEGORYNAME","���O�W��");
define("_AM_CATEGORYTAKEMETO","���o�̫إ߷s���O.");
define("_AM_NOCATEGORY","���~ - �|���إ����O.");
define("_AM_MAX40CHAR","(�̦h: 40 �r��)");
define("_AM_CATEGORYIMG","���O�Ϥ�");
define("_AM_IMGNAEXLOC","�Ϥ��W�� + ���ɦW ��m�b %s");
define("_AM_IN","<b>�إ����O</b> <br />(�ť�: �D����, ��l��������)");
define("_AM_MOVETO","<b>�h�����O</b> (�ť�: ���n�h�����O)");
define("_AM_MODIFYCATEGORY","�ק����O");
define("_AM_MODIFY","�ק�");
define("_AM_PARENTCATEGORY","�W�@�h���O");
define("_AM_SAVECHANGE","�x�s�ܧ�");
define("_AM_DEL","�R��");
define("_AM_CANCEL","����");
define("_AM_WAYSYWTDTTAL","ĵ�i: �A�T�w�n�R�������O�����Ҧ����峹�ε��׶�?");
//new
define("_AM_ARTICLEMANAGEMENT","�峹�޲z");
define("_AM_ARTICLEMANAGEMENTLINKS","�峹�s���޲z");
define("_AM_ARTICLEPREVIEW","�w���峹");
define("_AM_ADDMCATEGORY","Create New Section");
define("_AM_CATEGORYNAME","Section Name");
define("_AM_CATEGORYTAKEMETO","���o�̫إ߷s���O.");
define("_AM_NOCATEGORY","���~ - �S�����O�Q�إ�.");
define("_AM_MAX40CHAR","(�̤j: 40 �r��)");
define("_AM_CATEGORYIMG","Section Image");
define("_AM_IMGNAEXLOC","image name + extension located in %s");
define("_AM_IN","<b>Create in Section</b> <br />(Blank: Main Section, else as Sub-Section)");
define("_AM_MOVETO","<b>Move to Section</b> (Blank: Do not move section)");
define("_AM_MODIFYCATEGORY","Modify Section");
define("_AM_MODIFY","Modify");
define("_AM_PARENTCATEGORY","Parent Section");
define("_AM_SAVECHANGE","�x�s�ܧ�");
define("_AM_DEL","�R��");
define("_AM_CANCEL","����");
define("_AM_WAYSYWTDTTAL","ĵ�i: Are you sure you want to delete this Section and ALL its Stories and Comments?");
// Added in Beta6
define("_AM_CATEGORYSMNGR","���O�޲z��");
define("_AM_PEARTICLES","�إ߷s�峹");
define("_AM_GENERALCONF","�@��]�w");

// WFSECTION
define("_AM_UPDATEFAIL","��s����.");
define("_AM_EDITFILE","�s����[�ɮ�");
define("_AM_CATEGORYDESC","���O������r");
define("_AM_FILESBASEPATH","�]�w���[�ɸ��|:");
define("_AM_AGRAPHICPATH","�]�w���峹�Ϊ��Ϥ����|:");
define("_AM_SGRAPHICPATH","�]�w�����O�Ϊ��Ϥ����|:");
define("_AM_SMILIECPATH","�]�w�����Ϫ����|:");
define("_AM_HTMLCPATH","�]�w��HTML�ɪ����|:");
define("_AM_FILEUPLOADSPATH","���[�ɮ׸��|: ");
define("_AM_FILEUPLOADSTEMPPATH","�{�ɪ��[�ɸ��|: ");
define("_AM_ARTICLESFILEPATH","�峹�Ϥ����|: ");
define("_AM_SECTIONFILEPATH","���O�Ϥ����|: ");
define("_AM_SMILIEFILEPATH","���ϸ��|: ");
define("_AM_HTMLFILEPATH","HTML�ɸ��|: ");
define("_AM_UPLOADCONFIGFILE","�W�ǳ]�w��: ");
define("_AM_ARTICLESAPAGE","�C����ܤ峹�ƥ�:");
define("_AM_ARTICLESAPAGE2","�b�޾ɭ����e�C����ܤ峹�ƥ�:");
define("_AM_NOIMG","�L�Ϥ�");
define("_AM_PIDINVALID","�W�@�h���O�����T.");
define("_AM_NOTITLE","���D���L���.");
define("_AM_FILEDEL","ĵ�i: �A�T�w�n�R���o���ɮ׶�?");
define("_AM_AFERTSETCATE","�b�W�[���O��A�N�i�H�[�J�峹.");
define("_AM_IMGUPLOAD","�W�����O�Ϥ�");
define("_AM_IMGUPLOAD2","�ثe�Ϥ����|�b ");
define("_AM_IMGNAME","�ɦW (�ť�: �P��Ӥw���ɮפ��ɦW)");
define("_AM_UPLOADED","�w�ǧ�!");
define("_AM_ISNOTWRITABLE","������g�J!");
define("_AM_UPLOADFAIL","ĵ�i: �W�ǥ���. ��]:");
define("_AM_NOTALLOWEDMINETYPE","���i�W�ǫD���q�������ɮ�.");
define("_AM_FILETOOBIG","�ɮפj�p�j�󭭭q���d��!");

define("_AM_CATEGORYMENU","�������޳]�w");
define("_AM_ARTICLE2MENU","�峹���޳]�w");
define("_AM_ARTICLEPAGEMENU","�峹�����]�w");
define("_AM_BLOCKMENU","�϶��]�w");
define("_AM_ADMINEDITMENU","�@��峹�]�w");
define("_AM_ADMINCONFIGMENU","�޲z�̳]�w");

define("_AM_ARTIMGUPLOAD","�W�ǹϤ�");
define("_AM_TOPPAGETYPE","��ܳs����峹�Ө��N�峹�p��?");
define("_AM_SHOWCATPIC","������O�Ϥ��b�������ޤ�?");
define("_AM_WYSIWYG","�ϥ� WYSIWYG �s�边���N�t�ιw�]�s�边?");
define("_AM_SHOWCOMMENTS","�b�峹������ܥΤ����?");
define("_AM_SUBMITTED","�Τᴣ�Ѥ峹"); //added
define("_AM_ALLTXT","<h4>�峹�޲z</h4></div><div>�Q��<b>�峹�޲z</b>�A�i�H�s��,�R���Χ�����峹�W��. �o�ӼҦ��|��ܦb��Ʈw�����C�Ӥ峹.<br /><br />"); //added

// WF -> XF
define("_AM_PUBLISHEDTXT","<h4>�峹�o�G�޲z</h4></div><div><b>�峹�o�G�޲z</b>�|��ܥX�Ҧ��w�o�G���峹(�Ѻ޲z�̮֭�).<br /><br />�o�Ǥ峹�|�b���ޭ����C�X�b�U�����̭�(�]�t�Ҧ����v�s��).<br /><br />"); //added
define("_AM_SUBMITTEDTXT","<h4>���Ѥ峹�޲z</h4></div><div><b>���Ѥ峹�޲z</b>�|��ܥX�ѷ|�����Ѫ��峹���A�f��.<br /><br />�n�֭�峹,�Ы�<b>�s��</b>,�A�I��<b>�֭�</b>���Ŀ���x�s�峹.���ѨӪ��峹�N�i�H�o�G.<br /><br />"); //added
define("_AM_ONLINETXT","<h4>�u�W�峹�޲z</h4></div><div><b>�u�W�峹�޲z</b>�|��ܩҦ����峹�䪬�A�Q�]��<b>�W�u</b>.<br /><br />�n���峹�����A,���U<b>�s��</b>�A�I��<b>�W�u</b>���Ŀ�.<br /><br />"); //added
define("_AM_OFFLINETXT","<h4>���u�峹�޲z</h4></div><div><b>���u�峹�޲z</b>�|��ܩҦ����峹�䪬�A�Q�]��<b>���u</b>.<br /><br />�n���峹�����A,���U<b>�s��</b>�A�I��<b>�W�u</b>���Ŀ�.<br /><br />"); //added
define("_AM_EXPIREDTXT","<h4>�L���峹�޲z</h4></div><div><b>�L���峹�޲z</b>�|��ܩҦ��w�L�����峹.<br /><br />�A�i�H��<b>�s��</b>��A��<b>�]�w����</b>���]�w,�ܮe�����ӭ��]�L���ɶ�.<br /><br />"); //added
define("_AM_AUTOEXPIRETXT","<h4>�۰ʤ峹�L���޲z</h4></div><div><b>�۰ʤ峹�L���޲z</b>�|��ܩҦ����]�������峹.<br /><br />�A�i�H��<b>�s��</b>��A��<b>�]�w����</b>�ӧ��L���ɶ�.<br /><br />"); //added
define("_AM_AUTOTXT","<h4>�۰ʵo�G�峹�޲z</h4></div><div><b>�۰ʵo�G�峹�޲z</b>�|��ܦ��]�w�w�o�G�ɶ����Ҧ��峹.<br /><br />�A�i�H��<b>�s��</b>��A��<b>�]�w�o�G�ɶ�</b>�ӧ��o�G���ɶ�.<br /><br />"); //added

// WF -> XF
define("_AM_NOSHOWTXT","<h4>���æ��峹</h4></div><div><b>���æ��峹</b>�o�O�S�O�������峹,�����@�몺�峹�|����ޭ����B���O�γo�Ӥ�k�Ӭ�.&nbsp;&nbsp; �o�Ǥ峹�u�|�b`�����峹���϶�`�U�|���.<br /><br />�Q�γo�ӿﶵ�t�XHTML�����P`����ܸ�T`(�b�s��峹����)�A�i�H�̧A�Q�n�������. &nbsp;&nbsp;�Ҧp�A�i�H�@�@��`���p�v�i�ܭ�`����.<br /><br />�b�o�ӫ����U�]�i�ϥΩҦ��䥦�ﶵ���o�G,����,�W�u���u.<br /><br />"); //added

define("_AM_BLOCKCONF","�϶��]�w");
define("_AM_TITLE1","�D���϶��W��:");
define("_AM_TITLE4","�s�i�峹�϶��W��:");
define("_AM_TITLE5","�����峹�϶��W��:");
define("_AM_ORDER","'����'���B�~������r:");
define("_AM_DATE","'���'���B�~������r:");
define("_AM_HITS","'�\Ū'���B�~������r:");
define("_AM_DISP","'���'���B�~������r:");
define("_AM_ARTCLS","�峹�϶��W��");
define("_AM_MENU_LINKS","<b>���޲z�s��</b>");
define("_AM_BAN","�T��|��");
//New to version 0.9.2
define("_AM_CMODHEADER","�ɮ��v���ˬd");

// WF -> XF
define("_AM_CMODERRORINFO","�ˬd�ؿ����ɮ׬O�_���i�g�J���v��.<br/><br/>�����峹�Ҳշ|CHMOD�ϥΪ����|. �Y�g�J���v�������T�ɷ|�X�{���~�T���i��.");

define("_AM_FILEPATH","�Ϥ��W�W�ǳ]�w");

// WF -> XF
define("_AM_FILEPATHWARNING","�]�w�������峹�ϥΪ����|. �Y��J�����|�����T�ɷ|�X�{ĵ�i�T��.<br/><br/>�Y�A�n�ϥέ�l�w�]�����|�N�Ф��ζ�.<br/><br/>");

define("_AM_FILEUSEPATH","���ܦۭq���|");
define("_AM_PATHEXIST","���|�s�b!");
define("_AM_PATHNOTEXIST","���|���s�b!�Э��s�ˬd!");
define("_AM_USERPATH","�ۭq���|");
define("_AM_SHOWSELIMAGE","��ܥثe��쪺�Ϥ�: "); //******* Updated *******
define("_AM_SHOWSUBMENU","��ܦ����b�C�Ӥ����U��?");
define("_AM_MENUS","�D���޳]�w");
define("_AM_DEFAULTPATH","�ϥΪ��w�]���|");
define("_AM_SCROLLINGBLOCK","�ϥα��b�b�s�i�峹�϶���?(���������ϥ�!)");
define("_AM_BLOCKHEIGHT","�]�w���b�϶�����?");
define("_AM_DEFAULT"," �w�]");
define("_AM_BLOCKAMOUNT","���b�ϥΦ��?");
define("_AM_BLOCKDELAY","���ʰ϶�����ɶ�(�C��)");
define("_AM_LASTART","�b�޲z�Ϥ���ܦh�ַs�峹: ");
define("_AM_NUMUPLOADS","�@���W�ǥi���h���ɮ�?");

// WF -> XF
define("_AM_WEBMASTONLY","�u���޲z�̥i�H���ܤ����峹���]�w��?");

define("_AM_DEFAULTS","�N�Ҧ��]�w����_���w�]?");

define("_AM_NOCMODERROR","( ���T )");
define("_AM_CMODERROR","( �v�����~�θ��|���s�b! )");

// WF -> XF
define("_AM_REVERTED","�����峹�w�٭��w�w��");

define("_AM_GROUPPROMPT","���v�޲z���s�լ�:");
define("_AM_NOVIEWPERMISSION","��p!�A�S���ϥΥ��Ϫ��v��.");
define("_AM_FILE","�ɮ�: ");
define("_AM_NOMAINTEXT","���~: �b�峹���S����r��HTML! �峹������O�Ū�!");
define("_AM_DIR","�ؿ�: ");
define("_AM_MISC","�䥦�]�w");

define("_AM_ISNOTWRITABLE2"," ���s�b�D���W! �Ч��쥿�T�����|! ");
define("_AM_CANNOTMODIFY"," �L���T���|�e����ק�! ");
define("_AM_PATH","���|: ");

define("_AM_CMODHEADER2","�ɮ��ˬd");
define("_AM_ARTICLEMENU","�峹���޳]�w");
define("_AM_APPROVE","�֭�");
define("_AM_MOVETOTOP","�N���峹����̫e");
define("_AM_CHANGEDATETIME","���ܵo�G�ɶ�");
define("_AM_NOWSETTIME","�o�G�ɶ��]��: %s"); // %s is datetime for publication
define("_AM_CURRENTTIME","�{�b���ɶ���: %s");  // %s is the current datetime
define("_AM_SETDATETIME","�]�w�o�G�ɶ�");
define("_AM_MONTHC","��:");
define("_AM_DAYC","��:");
define("_AM_YEARC","�~:");
define("_AM_TIMEC","�ɶ�:");
define("_AM_AUTOAPPROVE","�n�۰ʮ֭�|�����Ѫ��峹��?");

// WF -> XF
define("_AM_DEFAULTTIME","�����峹�ϥήɶ���:");
define("_AM_TURNOFFLINE","���ä����峹? (�u���޲z�̥i�H�ϥ�)");

define("_AM_SHOWMARTICLES","��ܤ峹�C��?");
define("_AM_SHOWMUPDATED","��ܧ�s������?");
define("_AM_SHORTCATTITLE","�۰��Y�u���O�W��?");
define("_AM_SHOWAUTHOR","��ܧ@�̩m�W���?");
define("_AM_SHOWCOMMENTS2","��ܵ��׽g�����?");
define("_AM_SHOWFILE","����ɮפU�������?");
define("_AM_SHOWRATED","��ܤ��ƭp�����?");
define("_AM_SHOWVOTES","��ܵ����H�����?");
define("_AM_SHOWPUBLISHED","��ܵo�G������?");
define("_AM_SHOWHITS","��ܾ\���������?");
define("_AM_SHORTARTTITLE","�۰��Y�u�峹�W��?");
define("_AM_OFFLINE","<b>���ä峹</b> (�峹���A�ݬ����u�B���|�Q�C�X.)");
define("_AM_BROKENREPORTS","�ɮ׿��~�^��");
define("_AM_NOBROKEN","�S�����~���ɮ�.");
define("_AM_IGNORE","����");
define("_AM_FILEDELETED","�ɮפw�R��.");
define("_AM_BROKENDELETED","�ɮ׿��~�^���w�R.");
define("_AM_IGNOREDESC","����(�����^���åu�R��<b>�^���O��</b>)");
define("_AM_DELETEDESC","�R��(�R���ɮפ���<b>�^�����U�����</b>��<b>�^���O��</b>.)");
define("_AM_REPORTER","�^����");
define("_AM_FILETITLE","�U���W��: ");

// WF -> XF
define("_AM_DLCONF","�����峹�U���]�w");

define("_AM_FILEDESCRIPT","�ɮ׻���");
define("_AM_STATUS","���A");
define("_AM_UPLOAD","�W��");
define("_AM_NOTIFYPUBLISH","��o�G�ɵo�XEmail�q��");
define("_AM_VIEWHTML","HTML�s��");
define("_AM_VIEWWAYSIWIG","WYSIWYG�s��");
define("_AM_CATEGORYT","���O");
define("_AM_ACCESS","�ϥ�");
define("_AM_PAGE","��");
define("_AM_ARTICLEMANAGE","�峹�޲z");
define("_AM_WEIGHTMANAGE","���Ǻ޲z");
define("_AM_UPLOADMAN","�W�Ǻ޲z");

// WF -> XF
define("_AM_NOADMINRIGHTS","��p, �u���޲z�̤~�i�H���]�w");

define("_AM_FILECount","�ɮ׭p��");
define("_AM_ALLARTICLES","�C�X�Ҧ��峹");
define("_AM_PUBLARTICLES","�C�X�o�G���峹");
define("_AM_SUBLARTICLES","�C�X�|�����Ѫ��峹");
define("_AM_ONLINARTICLES","�C�X�W�u���峹");
define("_AM_OFFLIARTICLES","�C�X���u���峹");
define("_AM_EXPIREDARTICLES","�C�X�L�����峹");
define("_AM_AUTOEXPIREARTICLES","�C�X�|�۰ʨ�����峹");
define("_AM_AUTOARTICLES","�C�X�|�۰ʥZ�n���峹");
define("_AM_NOSHOWARTICLES","�C�X���æ����峹");
define("_NOADMINRIGHTS2","�u���޲z�̤~�i�H���]�w");
define("_AM_CANNOTHAVECATTHERE","���~: ���O���w������b�ۤv������!!");
define("_AM_SECTIONMANAGE","���O�޲z");
define("_AM_SECTIONMANAGELINK","���O�޲z�s��");
define("_AM_FILEID","�ɮ�");
define("_AM_FILEICON","�ϥ�");
define("_AM_FILESTORE","�s��");
define("_AM_REALFILENAME","�u��m�W");
define("_AM_USERFILENAME","�b��W��");
define("_AM_FILEMIMETYPE","�ɮ׺���");
define("_AM_FILESIZE","�ɮפj�p");
define("_AM_FDCOUNTER","�p�ƾ�");
define("_AM_EXPARTS","�L�����峹");
define("_AM_EXPIRED","�۰ʨ����");
define("_AM_CREATED","�إߤ��");
define("_AM_CHANGEEXPDATETIME","���ܨ���ɶ�");
define("_AM_SETEXPDATETIME","�]�w�L���ɶ�");
define("_AM_NOWSETEXPTIME","�峹�L���ɶ��]�� : %s");
define("_AM_ANONPOST","�����U�]�i�H���Ѥ峹��?");
define("_AM_NOTIFYSUBMIT","���s���峹���Ѯɭne-mail�޲z����?");
define("_AM_SECTIONIMAGE","�D���޹Ϥ�");
define("_AM_SECTIONHEAD","�D���ޭ�����r");
define("_AM_SECTIONFOOT","�D���ޭ�����r");
define("_AM_SHOWVOTESINART","���|�����峹������?");
define("_AM_SHOWREALNAME","��ܷ|���u��m�W�b�@�̦W��? (�Y�S���u��m�W�ɫh�αb���W��)");
define("_AM_SHOWCATEGORYIMG","��ܤW�����Ϥ��b�o�����O����?");
define("_AM_EDITSERVERFILE","�s��D���ɮ�");
define("_AM_CURRENTFILENAME","�ثe�ɦW: ");
define("_AM_CURRENTFILESIZE","�ɮפj�p: ");
define("_AM_UPLOADFOLD","�W�Ǹ��|: ");
define("_AM_UPLOADPATH","���|: ");
define("_AM_FREEDISKSPACE","�i�ΪŶ�:");   
define("_AM_RENAMETHIS","��惡�ɦW?");
define("_AM_RENAMEFILE","����ɦW");
define("_AM_SHOWSUMMARY","��ܺK�n���?"); 
define("_AM_SHOWICON","���'���H��'��'���s'���ϥܶ�?");
define("_AM_INDEXHEADING","�D���ޭ�����r"); 
define("_AM_EXTERNALARTICLE","�~���峹 </b>�o�|���ޤ�r�s�边��HTML��"); 

// added in WFS v1b6
define("_AM_POPULARITY", "�w���");
define("_AM_ARTICLESSORT", "�峹�ƦC����");
define("_AM_NAVTOOLTYPE", "�����u�����");
define("_AM_SELECTBOX", "��ܮ�");
define("_AM_SELECTSUBS", "��ܮػP������");
define("_AM_LINKEDPATH", "�w�s�����|");
define("_AM_LINKSANDSELECT", "�s���ο�ܮ�");
define("_AM_NONE", "�L");
define("_AM_CATEGORYWEIGHT", "���O����");
define("_AM_ARTICLEWEIGHT", "�峹����");
define("_AM_WEIGHT", "����");
define('_AM_DUPLICATECATEGORY','�ƻs����');

// add
define('_AM_DUPLICATE_ARTICLES','�]�ƻs�峹');

define('_AM_COPY', '�ƻs');
define('_AM_TO', '��');
define('_AM_NEWCATEGORYNAME', '�s�������W��');
define('_AM_DUPLICATE', '�ƻs');
define('_AM_DUPLICATEWSUBS', '�ƻs�P������');
define('_AM_ALLOWEDMIMETYPES', '�i�Ϊ�Mime����');
define('_AM_MODIFYFILE', '�ק�峹�ɮ�');
define('_AM_FILESTATS', '���[�ɪ��A');
define('_AM_FILESTAT', '�峹���ɮת��A: '); 
define('_AM_ERRORCHECK', '�ɮ��ˬd'); 
define('_AM_LASTACCESS', '�W�����'); 
define('_AM_DOWNLOADED', '�U������'); 
define('_AM_DOWNLOADSIZE', '�ɮפj�p');
define('_AM_UPLOADFILESIZE', '�̤j�W���ɮפj�p(KB) 1048576=1MB');
define('_AM_FILEMODE', '�ɮפW���v���]�w');
define('_AM_IMGHEIGHT', '�̤j�W�ǹϤ�����');
define('_AM_IMGWIDTH', '�̤j�W�ǹϤ��e��');
define('_AM_FILEPERMISSION', '�ɮ��v��');  
define('_AM_IMGESIZETOBIG', '�Ϥ������μe�פj�󭭩w���d��');
define('_AM_CATREORDERTEXT', '�A�i�H�b�o���s�ƦC�Ҧ�����������.<br />�D�������`�Ŧ�,���������L�ŤΦǦ�.�C�Ӥ����w�����ǱƦC.<br /><br />�n���s�ƧǤ峹���ܽЫ����O�W��,�̭������峹�N�|�C�X��.');  
define('_WFS_ATTACHFILE', '���[�ɮ�');  
define('_WFS_ATTACHFILEACCESS', '�ϥ��v���N�|�P�峹�ۦP.�A�i�H�b�s����[�ɮɧ��.');  
define('_AM_WFSFILESHOW', '�w���[�ɮ�');  
define('_AM_ATTACHEDFILE', '����ɮ�');  
define('_AM_ATTACHEDFILEM', '���[�ɮ׺޲z'); 
define('_AM_UPOADMANAGE', '�ɮ׺޲z'); 
define('_AM_CAREORDER', '���O�Τ峹����');
define('_AM_CAREORDER2', '�ƦC���O');
define('_AM_CAREORDER3', '�ƦC�峹');   

define('_AM_PICON', '��ܤ峹(��)�ϥ�?'); 

// WF -> XF
define('_AM_JUSTHTML', '<b>����ܸ�T</b> (���ﶵ�|����C�X�Ҧ��峹������T.���Ū�HTML�Τ�r.)');

define('_AM_NOSHOART', '<b>����ܤ峹</b> (�ϥΦ��ﶵ�i�H���b�D���ޤ��C�X�峹��.�u�|�b�峹�s����椤�~�|��ܥX��.)');
define('_AM_INDEXPAGECONFIG', '���ޭ��޲z');

// WF -> XF
define('_AM_INDEXPAGECONFIGTXT', '�o���A�������峹�������D����.<br /><br />�A�i�H�ܮe�����NLOGO�Ϥ��έ�����������r�@����.');
define('_AM_VISITSUPPORT', '���Ҳդ��媩�� conan@mail.ecenter.idv.tw ½Ķ 1.08 ���� MaxDing �ק�');

define('_AM_REORDERID', 'ID'); 
define('_AM_REORDERPID', 'PID'); 
define('_AM_REORDERTITLE', '���D');
define('_AM_REORDERDESCRIPT', '����');
define('_AM_REORDERWEIGHT', '����');
define('_AM_REORDERSUMMARY', '�K�n');

// index.php
define("_AM_DIR_NOT_WRITABLE","��Ƨ����i�g�J");
define("_AM_EDIT_ARTICLE_RETURN","�^��峹�s��");

// copy mode in index.php
define("_AM_COPY_ARTICLE_EXPLANE","�ƻs�峹. The original article is left. ���[�ɨå��Q�ƻs.");

// multi language in reorder.php
define("_AM_CATEGORY_REORDERED","Categories have been re-ordered!");
define("_AM_ARTICLE_REORDERED","Articles have been re-ordered!");
define("_AM_CATEGORY_REORDER_RETURN","Return to Category re-order");

// *** add menu: bulk import ***
define("_AM_IMPORT", "�j�q�פJHTML��");
define("_AM_IMPORT_DIRNAME", "�ؿ��W���ɦW");
define("_AM_IMPORT_HTMLPROC", "�B�zHTML��");
define("_AM_IMPORT_EXTFILTER", "�~���L�o�{���W��");

define("_AM_IMPORT_BODY", "�u��BODY�����Q����");
define("_AM_IMPORT_INDEXHTML", "�R��index.html���s���ɮ�,���ӬۦP�ɦb�P�ӥؿ��ΤW�h�ؿ��U.");
define("_AM_IMPORT_LINK", "���ܳs���ܼ��D = �ɦW");
define("_AM_IMPORT_IMAGE", "���ܹϤ����s����Ϥ����|. ");
define("_AM_IMPORT_ATMARK", "���� @ �Ÿ��� &amp;#064;");
define("_AM_IMPORT_TEXTPROC", "�B�z��r��");
define("_AM_IMPORT_TEXTPRE", "�� &lt;pre&gt; &lt;/pre&gt; �ӥ]�ۤ�r��");
define("_AM_IMPORT_IMAGEPROC", "�B�z�Ϥ���");
define("_AM_IMPORT_IMAGEDIR", "�Ϥ����|�W��");
define("_AM_IMPORT_IMAGECOPY", "�ƻs�Ϥ��ɨ�Ϥ����ؿ��U.");
define("_AM_IMPORT_TESTMODE", "���ռҦ�");
define("_AM_IMPORT_TESTDB", "��A�x�s�ɤ��s���Ʈw�в������Ŀ�. ");
define("_AM_IMPORT_TESTEXEC", "����");
define("_AM_IMPORT_TESTTEXT", "��ܤ�r");
define("_AM_IMPORT_EXPLANE", "�Ѱ��ɦW�P�_�ɮ׬O�������.<br>HTML�ɬ�html��htm.<br>��r�ɬ�txt.<br>�Ϥ��ɮ׬�gif,jpg,jpeg,��png.<br>");
define("_AM_IMPORT_ERRDIREXI", "�ؿ����ɮפ��s�b");
define("_AM_IMPORT_ERRFILEXI", "�L�o�{�����s�b");
define("_AM_IMPORT_ERRFILEXEC", "�L�o�{���������");
define("_AM_IMPORT_ERRNOCOPY", "�S�������Ϥ��ƻs");
define("_AM_IMPORT_ERRNOIMGDIR", "�S�������Ϥ����|");
define("_AM_IMPORT_ERRIMGDIREXI", "���w���Ϥ����|���O�ӥؿ�");
define("_AM_IMPORT_ERRFILEEXI", "�ɮפ��s�b");

?>