<?php
// $Id: main.php,v 1.2 2006/01/04 09:58:26 ohwada Exp $

// 2004/03/27 K.OHWADA
// add submit modify

// 2004/01/29 herve 
// multi language
//   add _WFS_ERROR_IMAGE

// 2003/11/21 K.OHWADA
// view and edit for pure html file
//   add _WFS_DISBR, _WFS_ENAAMP
// article.php
//  _WFS_ARTCLE_MORE

//%%%%%%
define("_WFS_PRINTER","�C�L����");
define("_WFS_COMMENTS","���ܭn��?");
define("_WFS_PREVPAGE","�W�@��");
define("_WFS_NEXTPAGE","�U�@��");
//define("_WFS_RETURNTOP","<< �^��̫e");

//%%%%%%

define("_WFS_TOP","�ؿ�");
define("_WFS_POSTERC","�o���:");
define("_WFS_DATEC","���:");
define("_WFS_EDITNOTALLOWED","�A���i�H�s�覹����!");
define("_WFS_ANONNOTALLOWED","�D���U�|�����i�H�o��.");
define("_WFS_THANKSFORPOST","���±z���Ѫ��峹!"); //submission of news comments
define("_WFS_DELNOTALLOWED","�A���i�H�R��������!");
define("_WFS_AREUSUREDEL","�A�T�w�n�R���o�ӵ��פΥL���U��l���^�ж�?");
define("_WFS_YES","�O");
define("_WFS_NO","�_");
define("_PL_COMMENTSDEL","���פw�g�R��!");

//%%%%%%

define("_WFS_TITLE","���D");
define("_WFS_CATEGORY","���O");
define("_WFS_HTMLISFINE","�i�ϥ�HTML, ���O�n�A�T�{�@�UURL�MHTML������!");
define("_WFS_ALLOWEDHTML","�i��HTML:");
define("_WFS_DISABLESMILEY","���i�Ϊ���");
define("_WFS_DISABLEHTML","���i��HTML");
define("_WFS_POST","�o��");
define("_WFS_PREVIEW","�w��");
define("_WFS_GO","�e�X");

//%%%%%%
define("_WFS_ARTICLES","�峹");
define("_WFS_VIEWS","Ū�L %s �� "); //********* Updated ************
define("_WFS_DATE","���: "); //********* Updated ************
define("_WFS_WRITTEN","�@��: "); //********* Updated ************
define("_WFS_PRINTERFRIENDLY","�C�L����");

define("_WFS_TOPICC","���O:");
define("_WFS_URL","URL:");
define("_WFS_NOSTORY","��ܪ��峹���s�b.");
define("_WFS_RETURN2INDEX","��^�D����");
define("_WFS_BACK2CAT","��^���O");
define("_WFS_BACK2","��^");
//%%%%%%	File Name print.php 	%%%%%

define("_WFS_URLFORSTORY","���峹��URL:");

// %s represents your site name
define("_WFS_THISCOMESFROM","���峹�Ӧ۩� %s");

/////// wfsection
define("_WFS_CATEGORYS","���O");
define("_WFS_POSTS","�峹");
define("_WFS_PUBLISHED","�̷s�峹");
define("_WFS_WELCOME","%s �\����");

define("_WFS_ARTICLE","�峹");
define("_WFS_AUTHER","�@��: "); //********* Updated ************
define("_WFS_AUTH","�@��"); //updated
define("_WFS_CAUTH","<b>�@�̩m�W</b> (�ť�: ��@�̦W)"); //updated
define("_WFS_LASTUPDATE","�w��s");

// wfsarticle.php

define("_WFS_MAINTEXT"," �峹���e");
//_WFS_ALLOWEDHTML
define("_WFS_DISAMILEY","���ϥΪ���");
define("_WFS_DISHTML","���ϥ�HTML");
//_WFS_PREVIEW
define("_WFS_SAVE","�x�s");
//_WFS_GO

// themenews.php
define("_WFS_POSTEDBY","��");
define("_WFS_ON","�b");
define("_WFS_READS","��");
define("_WFS_FILEUPLOAD","�W�Ǫ��[��");
define("_WFS_FILESHOWNAME","���[�ɻ���");
define("_WFS_ATTACHEDFILES","�s����[��");
define("_WFS_NOFILE","���峹���S�����[�ɮ�.");
define("_WFS_AFTERREGED","����N�ɮת��[��Ū��峹��. <br />�Ыإ߷s���峹, �x�s��A��^�ӥ[�W�A���ɮ�.");
define("_WFS_FILES","�ɮ�");
define("_WFS_COMMENTSNUM","����");
define("_WFS_CATEGORYDESC","����");
define("_WFS_CATEGORYHEAD","����������r.<br /><br />�o�qHTML�Τ�r�|�b�A�����O�W�����.");
define("_WFS_CATEGORYFOOT","����������r.<br /><br />�o�qHTML�Τ�r�|�b�A�����O�U�����.");
define("_WFS_FILEID","�ɮ�ID");
define("_WFS_FILEREALNAME","�w�s�J���ɦW");
define("_WFS_FILETEXT","�j�M��r");
define("_WFS_ARTICLEID","�峹ID");
define("_WFS_EXT","���ɦW");
define("_WFS_MINETYPE","Mine����");
define("_WFS_UPDATEDATE","�̫��s");
define("_WFS_DEL","�R��");
define("_WFS_CANCEL","����");
define("_WFS_IMGADD","�W�[");
define("_WFS_UPLOAD","�W��");
define("_WFS_LINKURL","URL�s��");
define("_WFS_LINKURLNAME","�W��URL����W");
define("_WFS_SUMMARY","�K�n");
define("_WFS_LINK","�s��");
define("_WFS_NOTREADFILE","�L�kŪ�����ɮ�!");
define("_WFS_DOWNLOADNAME","�U���ɪ��ɦW");
define("_WFS_PAGEBREAK","�����ɽu��: [pagebreak]");

//new version 0.9.2
define("_WFS_MAININDEX","�D����");
define("_WFS_NOVIEWPERMISSION","�ܩ�p! �A�S���[�ݳo�̪��v��.");
define("_WFS_WEBLINK","�s��:");
define("_WFS_VOTEAPPRE","�P�±z������.");
define("_WFS_THANKYOU","���±z�b%s���ΧA���ɶ�"); // %s is your site name
define("_WFS_VOTEFROMYOU","�z���������Q���L�Τ�M�w�ɮפU�����i���.");
define("_WFS_VOTEONCE","�Ф��n��P�@��峹�A���@������.");
define("_WFS_RATINGSCALE","���Ƥ���1��10, �̧C��1,�̰���10.");
define("_WFS_BEOBJECTIVE","�Ы��[����,�Y�C�ӤH����1��10,���o�ӰѦҴN�S���γB�F.");
define("_WFS_DONOTVOTE","�Ф��n��ۤv���峹����.");
define("_WFS_RATEIT","������!");
define("_WFS_DESCRIPTIONC","����: ");
define("_WFS_EMAILC","Email: ");
define("_WFS_CATEGORYC","����: ");
define("_WFS_LASTUPDATEC","�̫��s: ");
define("_WFS_DLNOW","���W�U��!");
define("_WFS_VERSION","����");
define("_WFS_SUBMITDATE","���Ѥ��");
define("_WFS_DLTIMES","�w�U�� %s ��");
define("_WFS_FILESIZE","�ɮפj�p");
define("_WFS_SUPPORTEDPLAT","�䴩���x");
define("_WFS_HOMEPAGE","����");
define("_WFS_HITSC","�U����: ");
define("_WFS_RATINGC","����: ");
define("_WFS_ONEVOTE","1 �H����");
define("_WFS_NUMVOTES","%s �H����");
define("_WFS_ONEPOST","1 �ӵ���");
define("_WFS_NUMPOSTS","%s �ӵ���");
define("_WFS_COMMENTSC","����s: ");
define("_WFS_RATETHISFILE","�����峹����");
define("_WFS_MODIFY","�ק�");
define("_WFS_TELLAFRIEND","��i�B��");
define("_WFS_VSCOMMENTS","��/�e�X����");
define("_WFS_EDIT","�s��");
define("_WFS_SUBMIT","�e�X");
define("_WFS_BYTES","Bytes");
define("_WFS_ALREADYREPORTED","�z�w�e�X���峹�����~�^��.");
define("_WFS_MUSTREGFIRST","��p, �A�����v�@�o�Ӱʧ@.<br>�е��U�Υ��n�J����!");
define("_WFS_NORATING","����ܤ���.");
define("_WFS_CANTVOTEOWN","�A���i�H��A���峹�i�����.<br>�Ҧ��������w�O��.");
define("_WFS_RANK","�Ʀ�");
define("_WFS_HITS","�H��"); //updated
define("_WFS_RATING","����");
define("_WFS_VOTE","����");
define("_WFS_TOP10","%s���O�e10�W"); // %s is a review category name
define("_WFS_CATEGORIES","���O");
define("_WFS_THANKSFORHELP","���±z���U�ڭ̺��@�ؿ��������.");
define("_WFS_FORSECURITY","���w���Ҷq,�A���b����IP��}�]�ȮɳQ�O���U��.");
define("_WFS_NUMBYTES","%s bytes");
define("_WFS_TIMES"," ��");
define("_WFS_DOWNLOADS","�U�� ");
define("_WFS_FILETYPE","�ɮ׫���: ");
define("_WFS_GROUPPROMPT","�U�C�s�եi�H�i�J:");
define("_WFS_REPORTBROKEN","�^�����~�ɮ�");
define("_WFS_IMGNAME","�ɦW (�ť�: �P�w�W�Ǥ��ɦW)");
define("_WFS_POSTNEWARTICLE","���Ѥ峹");
define("_WFS_SMILIE","�W�[���Ϩ�峹��");
define("_WFS_EXGRAPHIC","�W�[�~���Ϥ���峹��");
define("_WFS_GRAPHIC","�W�[�Τ�ݹϤ���峹��");
define("_WFS_NOIMG","�L�Ϥ�");
define("_WFS_ARTIMGUPLOAD","�W�ǹϤ�");
define("_WFS_POPULAR","���H��");
define("_WFS_RATEFILE","�j�n��");
define("_WFS_COMMENT","����");
define("_WFS_RATED","����");
define("_WFS_SUBMIT1","�w�e�X");
define("_WFS_VOTES","�H����");
define("_WFS_SORTBY1","�ƧǱ���:");
define("_WFS_TITLE1","���D");
define("_WFS_DATE1","���");
define("_WFS_ARTICLEID1","�峹ID");
define("_WFS_POPULARITY1","�H�����");
define("_WFS_CURSORTBY1","�峹�{�b�ƧǱ���: %s");
define("_WFS_RATING1","����");
define("_WFS_NOTIFYPUBLISH","��o���H�XEmail�q��");
define("_WFS_POPULARITYLTOM","�H����� (�֨�h)");
define("_WFS_POPULARITYMTOL","�H����� (�h���)");
define("_WFS_ARTICLEIDLTOM","�峹ID (�p��j)");
define("_WFS_ARTICLEIDMTOL","�峹ID (�j��p)");
define("_WFS_TITLEZTOA","���D (Z��A)");
define("_WFS_TITLEATOZ","���D (A��Z)");
define("_WFS_DATEOLD","��� (�¦b�e)");
define("_WFS_DATENEW","��� (�s�b�e)");
define("_WFS_RATINGLTOH","������ (�C�찪)");
define("_WFS_RATINGHTOL","������ (����C)");
define("_WFS_SUBMITLTOH","���� (�¦b�e)");
define("_WFS_SUBMITHTOL","���� (�s�b�e)");
define("_WFS_WEIGHT","����");
define("_WFS_NOTITLE","���~: �L���D - �Ъ�^��J�z�峹�����D");
define("_WFS_NOMAINTEXT","���~: �L�D�n���� - �Ъ�^��J�z�峹������");
define("_WFS_RATINGA","�峹����: %s");
define("_WFS_HTMLPAGE","HTML�� </b>(�N���z�|��r�s�边)");
define("_WFS_DBUPDATED","���§A������.");
define("_WFS_INTFILEAT","�֨� %s �ݬݤ峹");
define("_WFS_INTFILEFOUND","�ڵo�{�b %s ���g���Ϊ��峹");
define("_WFS_DESCRIPTION","�ɮ׻���");
define("_WFS_ARTICLEADDIT","�峹�B�~��T");
define("_WFS_ARTICLELINK","�峹URL�s��");
define("_WFS_MISCSETTINGS","�䥦�峹�]�w");
define("_WFS_FILEDESCRIPT","�ɮ׻���");
define("_WFS_ATTACHEDFILESTXT","<b>�ɮפW��</b><br/><br />�C�X�{�b�Ҧ��峹�������[�ɪ��峹�X��. �A�i�H���U�s��ӽs��C�Ӫ��[��.<br /><br />��A�s��w�s�ɪ��峹���ɮץu�i�H���[�b�Ӥ峹��.");
define("_WFS_DOWNLOAD","�W�Ǫ��[��");
define("_WFS_PUBLISHEDHOME","�w�o�G");
define("_WFS_ARTSIZE","�j�p %s");
define("_WFS_DISCLAIMER","<b>�ŧi:</b> �����N�������|�������׭t�d.");
define("_WFS_ONLYREGISTEREDUSERS","�u�����U�|���i�H�^�����~���ɮ�!");
define("_WFS_THANKSFORINFO","���§A����T. �ڭ̷|���ֳB�z.");
define("_WFS_FILEPERMISSION","�ɮ��v��");
define("_WFS_DOWNLOADED","�U������");
define("_WFS_DOWNLOADSIZE","�U���ɪ��ɮפj�p");
define("_WFS_LASTACCESS","�W���ϥΥD��");
define("_WFS_LASTUPDATED","�̪��s");
define("_WFS_ERRORCHECK","�ɮצs�b��?");
define("_AM_FILEATTACHED","�ɮצ����[��峹��?");
define("_WFS_NODESCRIPT","�L�ɮ׻���.");
define("_WFS_UPLOADED","�w�W��: ");
define("_WFS_FILEMIMETYPE","�ɮ�Mime����");

// fix by maxding
define("_MI_XFS_SUBMIT","���Ѥ峹");
define("_MI_XFS_POPULAR","�H�����");
define("_MI_XFS_RATEFILE","�峹����");

// add disbr, enaamp
define("_WFS_DISBR","���n���� New-line �� br.");
define("_WFS_ENAAMP","���� &amp; �� &amp;amp; �b�ɶ����s��.");

// article.php
define("_WFS_ARTCLE_MORE","����h�Χ�h���峹�����������D.");

// submit.php
define("_WFS_SUBMIT_FAIL","�e�X����.");
define("_WFS_BUT_SUBMIT_SUCCESS","���O, ���峹�w�e�X");
define("_WFS_SUBMITED_ARTICLE","�w�e�X�峹");
define("_WFS_UPLOAD_END","�w�W��!");
define("_WFS_UPLOAD_FAIL","�W�ǥ���");
define("_WFS_UPLOAD_NON","�W���ɮץ��]�w");
define("_WFS_UPLOAD_TOO_BIG","�ɮ׶W�L���\���j�p!\n�̤j�� %s Bytes.");
define("_WFS_UPLOAD_NOT_ALLOWED_MINE_TYPE","�A�S���v���W�Ǧ������ɮ�.");

// modify.php
define("_WFS_ARTICLE_BACK","�^��峹");
define("_WFS_MODIFY_TITLE","�s��峹");
define("_WFS_MODIFY_END","�w��s!");
define("_WFS_MODIFY_FAIL","��s����.");
define("_WFS_ACTION","����");
define("_WFS_DELETE","�R��");
define("_WFS_FILE_DOWNLOADNAME","�U���ɮצW��");
define("_WFS_FILE_CHECK","�ˬd�ɮ�");
define("_WFS_FILE_NOEXIST","�å��s�b");
define("_WFS_FILE_NOFILE","�D�X���ɮ�");
define("_WFS_FILE_MODIFY_END","�ɮפw��s!");
define("_WFS_FILE_DELETE_COMFROM","ĵ�i: �A�T�w�Q�n�R���o���ɮ�?");
define("_WFS_FILE_DELETE_END","�w�R��!");
define("_WFS_FILE_DELETE_FAIL","�R�����~.");

// multi language in index.php
define("_WFS_ERROR_IMAGE","���~: ���ˬd�Ϥ����|/�ɮ�");

?>