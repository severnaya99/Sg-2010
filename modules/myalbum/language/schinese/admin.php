<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_AM_LOADED' ) ) {


// Appended by Xoops Language Checker -GIJOE- in 2007-08-24 18:18:02
define('_MD_A_MYMENU_MYTPLSADMIN','Templates');
define('_MD_A_MYMENU_MYBLOCKSADMIN','Blocks/Permissions');
define('_MD_A_MYMENU_MYPREFERENCES','Preferences');

define( 'MYALBUM_AM_LOADED' , 1 ) ;

// Index (Categories)
define("_AM_H3_FMT_CATEGORIES","������� (%s)");
define("_AM_CAT_TH_TITLE","����");
define("_AM_CAT_TH_PHOTOS","ͼƬ");
define("_AM_CAT_TH_OPERATION","����");
define("_AM_CAT_TH_IMAGE","Banner");
define("_AM_CAT_TH_PARENT","�ϲ����");
define("_AM_CAT_TH_IMGURL","Banner����ַ");
define("_AM_CAT_MENU_NEW","���ɷ���");
define("_AM_CAT_MENU_EDIT","�༭����");
define("_AM_CAT_INSERTED","���������");
define("_AM_CAT_UPDATED","�÷������޸�");
define("_AM_CAT_BTN_BATCH","ִ��");
define("_AM_CAT_LINK_MAKETOPCAT","����һ���������");
define("_AM_CAT_LINK_ADDPHOTOS","���÷��������һ��ͼƬ");
define("_AM_CAT_LINK_EDIT","�༭�÷���");
define("_AM_CAT_LINK_MAKESUBCAT","�ڸ÷����½���һ���µķ���");
define("_AM_CAT_FMT_NEEDADMISSION","%s ��ͼƬ��Ҫ����");
define("_AM_CAT_FMT_CATDELCONFIRM","%s �����������ࡢͼƬ�����۶�����ɾ����ȷ��?");


// Admission
define("_AM_H3_FMT_ADMISSION","����ͼƬ (%s)");
define("_AM_TH_SUBMITTER","�ύ");
define("_AM_TH_TITLE","����");
define("_AM_TH_DESCRIPTION","����");
define("_AM_TH_CATEGORIES","����");
define("_AM_TH_DATE","�ϴθ���");


// Photo Manager
define("_AM_H3_FMT_PHOTOMANAGER","ͼƬ���� (%s)");
define("_AM_TH_BATCHUPDATE","�������¼�������Ƭ");
define("_AM_OPT_NOCHANGE","- �ޱ仯 -");
define("_AM_JS_UPDATECONFIRM","���������ݽ�������. ȷ��?");


// Module Checker
define( "_AM_H3_FMT_MODULECHECKER" , "myAlbum-P ���" ) ;

define( "_AM_H4_ENVIRONMENT" , "�����������" ) ;
define( "_AM_MB_PHPDIRECTIVE" , "PHP ���" ) ;
define( "_AM_MB_BOTHOK" , "���ɹ�ͨ�����" ) ;
define( "_AM_MB_NEEDON" , "��Ҫ����ΪON" ) ;


define( "_AM_H4_TABLE" , "���ݿ� table" ) ;
define( "_AM_MB_PHOTOSTABLE" , "Photos table" ) ;
define( "_AM_MB_DESCRIPTIONTABLE" , "Descriptions table" ) ;
define( "_AM_MB_CATEGORIESTABLE" , "Categories table" ) ;
define( "_AM_MB_VOTEDATATABLE" , "Votedata table" ) ;
define( "_AM_MB_COMMENTSTABLE" , "Comments table" ) ;
define( "_AM_MB_NUMBEROFPHOTOS" , "ͼƬ��Ŀ" ) ;
define( "_AM_MB_NUMBEROFDESCRIPTIONS" , "Descriptions ��Ŀ" ) ;
define( "_AM_MB_NUMBEROFCATEGORIES" , "Categories ��Ŀ" ) ;
define( "_AM_MB_NUMBEROFVOTEDATA" , "Votedata ��Ŀ" ) ;
define( "_AM_MB_NUMBEROFCOMMENTS" , "Comments ��Ŀ" ) ;


define( "_AM_H4_CONFIG" , "�������" ) ;
define( "_AM_MB_PIPEFORIMAGES" , "ͼƬPipe" ) ;
define( "_AM_MB_DIRECTORYFORPHOTOS" , "ͼƬĿ¼" ) ;
define( "_AM_MB_DIRECTORYFORTHUMBS" , "����ͼĿ¼" ) ;
define( "_AM_ERR_LASTCHAR" , "����: ��󲻼� '/'" ) ;
define( "_AM_ERR_FIRSTCHAR" , "����: Ӧ����'/'��ͷ" ) ;
define( "_AM_ERR_PERMISSION" , "����: ����Ҫ�������Ŀ¼����������Ϊ777." ) ;
define( "_AM_ERR_NOTDIRECTORY" , "����: ������ЧĿ¼." ) ;
define( "_AM_ERR_READORWRITE" , "����: ��Ŀ¼���ɶ�д. ��Ҫ��Ŀ¼������Ϊ 777." ) ;
define( "_AM_ERR_SAMEDIR" , "����: ͼƬĿ¼����������ͼĿ¼��ͬ" ) ;
define( "_AM_LNK_CHECKGD2" , "��� 'GD2' �Ƿ���������" ) ;
define( "_AM_MB_CHECKGD2" , "��������ӵ�ҳ�治��������ʾ���Ͳ�Ҫ����GD�� truecolor ģʽ." ) ;
define( "_AM_MB_GD2SUCCESS" , "�ɹ�!<br />�����ʹ�� GD2 (truecolor)." ) ;


define( "_AM_H4_PHOTOLINK" , "ͼƬ������ͼ���Ӽ��" ) ;
define( "_AM_MB_NOWCHECKING" , "��ʼ��� ." ) ;
define( "_AM_FMT_PHOTONOTREADABLE" , "ԭʼͼƬ (%s) ���ɶ�." ) ;
define( "_AM_FMT_THUMBNOTREADABLE" , "����ͼ (%s) ���ɶ�." ) ;
define( "_AM_FMT_NUMBEROFDEADPHOTOS" , "������ЧͼƬ�ļ�%s." ) ;
define( "_AM_FMT_NUMBEROFDEADTHUMBS" , "����ͼ%s��Ҫ�ؽ�." ) ;
define( "_AM_FMT_NUMBEROFREMOVEDTMPS" , "�����ļ�%s�ѱ�ɾ��." ) ;
define( "_AM_LINK_REDOTHUMBS" , "�ؽ�����ͼ" ) ;
define( "_AM_LINK_TABLEMAINTENANCE" , "ά�����ݱ�" ) ;



// Redo Thumbnail
define( "_AM_H3_FMT_RECORDMAINTENANCE" , "myAlbum ͼƬά��" ) ;

define( "_AM_FMT_CHECKING" , "��� %s ..." ) ;

define( "_AM_FORM_RECORDMAINTENANCE" , "ͼƬά����������±������ͼ��." ) ;

define( "_AM_MB_FAILEDREADING" , "�޷���ȡ." ) ;
define( "_AM_MB_CREATEDTHUMBS" , "���ɵ�����ͼ." ) ;
define( "_AM_MB_BIGTHUMBS" , "�޷���������ͼ. �ѿ���." ) ;
define( "_AM_MB_SKIPPED" , "�Թ�." ) ;
define( "_AM_MB_SIZEREPAIRED" , "(�����ü�¼��size��.)" ) ;
define( "_AM_MB_RECREMOVED" , "�ü�¼�ѱ�ɾ��." ) ;
define( "_AM_MB_PHOTONOTEXISTS" , "ԭʼͼƬ������." ) ;
define( "_AM_MB_PHOTORESIZED" , "ԭʼͼƬ�ѱ�resized." ) ;

define( "_AM_TEXT_RECORDFORSTARTING" , "��¼����ʼ��" ) ;
define( "_AM_TEXT_NUMBERATATIME" , "ÿ�δ���ļ�¼��" ) ;
define( "_AM_LABEL_DESCNUMBERATATIME" , "����̫�󽫵��·���������ʱ." ) ;

define( "_AM_RADIO_FORCEREDO" , "��ʹ�Ѵ�������ͼҲҪǿ���ؽ�" ) ;
define( "_AM_RADIO_REMOVEREC" , "ɾ��û��ͼƬ�����ӵļ�¼" ) ;
define( "_AM_RADIO_RESIZE" , "resize ����Ŀǰ�趨�ĳߴ��ͼƬ" ) ;

define( "_AM_MB_FINISHED" , "���" ) ;
define( "_AM_LINK_RESTART" , "���¿�ʼ" ) ;
define( "_AM_SUBMIT_NEXT" , "��һ��" ) ;



// Batch Register
define( "_AM_H3_FMT_BATCHREGISTER" , "myAlbum ������" ) ;


// GroupPerm Global
define("_AM_ALBM_GROUPPERM_GLOBAL","Ȩ���趨");
define("_AM_ALBM_GROUPPERM_GLOBALDESC","�趨Ⱥ����ڱ�ģ���Ȩ��");
define("_AM_ALBM_GPERMUPDATED","Ȩ���ѳɹ�����");


// Import
define("_AM_H3_FMT_IMPORTTO","������ģ�鵼��ͼƬ�� %s");
define("_AM_FMT_IMPORTFROMMYALBUMP","��myAlbumģ������ʹ� %s ����");
define("_AM_FMT_IMPORTFROMIMAGEMANAGER","��XOOPS��ͼƬ������");
define("_AM_CB_IMPORTRECURSIVELY","�ݹ鵼���²����");
define("_AM_RADIO_IMPORTCOPY","����ͼƬ (����������)");
define("_AM_RADIO_IMPORTMOVE","ת��ͼƬ (���۽�������)");
define("_AM_MB_IMPORTCONFIRM","ִ�е��� ?");
define("_AM_FMT_IMPORTSUCCESS","���Ѿ����� %s ��ͼƬ");


// Export
define("_AM_H3_FMT_EXPORTTO","�� %s ����ͼƬ������ģ��");
define("_AM_FMT_EXPORTTOIMAGEMANAGER","����ͼƬ�� XOOPS ��ͼƬ����");
define("_AM_FMT_EXPORTIMSRCCAT","��Դ");
define("_AM_FMT_EXPORTIMDSTCAT","Ŀ�ĵ�");
define("_AM_CB_EXPORTRECURSIVELY","�����²�����е�ͼƬ");
define("_AM_CB_EXPORTTHUMB","��������ͼ������ԭʼͼƬ");
define("_AM_MB_EXPORTCONFIRM","����. ȷ��?");
define("_AM_FMT_EXPORTSUCCESS","�Ѿ��ɹ����� %s ��ͼƬ");


}

//////////////////////////////////////////////////////////////////////////////////////////
// �ü������ĺ����� D.J. (phppp at xoops.org) Ϊ xoops.org.cn ���
// ����������κ��йغ��������⣬����ϵ xoops.org.cn
// The Simplified Chinese pack was made by D.J. (phppp at xoops.org) for xoops.org.cn
// You are appreciated to report any inappropriate translation to xoops.org.cn
//////////////////////////////////////////////////////////////////////////////////////////
?>