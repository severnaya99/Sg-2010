<?php
// $Id: main.php,v 1.2 2005/06/20 15:03:23 ohwada Exp $

// 2004/03/27 K.OHWADA
// add submit modify

// 2004/02/26 K.OHWADA
// �¤ӽ�����ܸ������ѹ�

// 2004/01/29 herve & K.OHWADA
// multi language
//   add _WFS_ERROR_IMAGE

// 2003/11/21 K.OHWADA
// article.php
//  _WFS_ARTCLE_MORE

// 2003/09/23 K.OHWADA
// view and edit for pure html file
//   add _WFS_DISBR, _WFS_ENAAMP

//%%%%%%
define("_WFS_PRINTER","�����ѥڡ���");
define("_WFS_COMMENTS","�����ȡ�");
define("_WFS_PREVPAGE","���Υڡ���");
define("_WFS_NEXTPAGE","���Υڡ���");
//define("_WFS_RETURNTOP","<< Return to Top");

//%%%%%%

define("_WFS_TOP","�ȥå�");
define("_WFS_POSTERC","��Ƽ�:");
define("_WFS_DATEC","����:");
define("_WFS_EDITNOTALLOWED","���Υ����Ȥ��Խ����븢�¤�����ޤ���");
define("_WFS_ANONNOTALLOWED","�����Ȥ���ƤǤ��ޤ���");
define("_WFS_THANKSFORPOST","��Ƥ��꤬�Ȥ��������ޤ���"); //submission of news comments
define("_WFS_DELNOTALLOWED","���Υ����Ȥ������븢�¤�����ޤ���");
define("_WFS_AREUSUREDEL","�����ˤ��Υ����Ȥ����Ƥ��ֿ��������ޤ�����");
define("_WFS_YES","�Ϥ�");
define("_WFS_NO","������");
define("_PL_COMMENTSDEL","�����Ȥ�����˺������ޤ���");

//%%%%%%

define("_WFS_TITLE","�����ȥ�");
define("_WFS_CATEGORY","���ƥ���");
define("_WFS_HTMLISFINE","HTML���ѤǤ��ޤ���URL��HTML������ξ��������å����Ʋ�����");
define("_WFS_ALLOWEDHTML","���Ĥ��줿HTML:");
define("_WFS_DISABLESMILEY","�饢���������ɽ��");
define("_WFS_DISABLEHTML","HTML����ɽ��");
define("_WFS_POST","����");
define("_WFS_PREVIEW","�ץ�ӥ塼");
define("_WFS_GO","���");

//%%%%%%
define("_WFS_ARTICLES","����");
define("_WFS_VIEWS","������: %s"); //********* Updated ************
define("_WFS_DATE","����: "); //********* Updated ************
define("_WFS_WRITTEN","�ǽ���������: "); //********* Updated ************
define("_WFS_PRINTERFRIENDLY","�����ѥڡ���");

define("_WFS_TOPICC","���ƥ���:");
define("_WFS_URL","URL:");
define("_WFS_NOSTORY","���򤵤줿������¸�ߤ��ޤ���");
define("_WFS_RETURN2INDEX","���ƥ���ΰ��������");
define("_WFS_BACK2CAT","���ƥ�������");
define("_WFS_BACK2","���");
//%%%%%%	File Name print.php 	%%%%%

define("_WFS_URLFORSTORY","�ܵ�����URL��:");

// %s represents your site name
define("_WFS_THISCOMESFROM","�ܵ����� %s ����Ƥ��줿��ΤǤ�");

/////// wfsection
define("_WFS_CATEGORYS","���ƥ���");
define("_WFS_POSTS","����");
define("_WFS_PUBLISHED","�ǿ�����");
define("_WFS_WELCOME","%s ���ƥ���");

define("_WFS_ARTICLE","����");
define("_WFS_AUTHER","��ɮ��: "); //********* Updated ************
define("_WFS_AUTH","��ɮ��"); //updated
define("_WFS_CAUTH","<b>��ɮ��̾</b> (����ˤ���ȸ��μ�ɮ��̾�ˤʤ�ޤ�)"); //updated
define("_WFS_LASTUPDATE","����");

// wfsarticle.php

define("_WFS_MAINTEXT","�ƥ�����");
//_WFS_ALLOWEDHTML
define("_WFS_DISAMILEY","�饢���������ɽ��");
define("_WFS_DISHTML","HTML����ɽ��");

//_WFS_PREVIEW
define("_WFS_SAVE","��¸");
//_WFS_GO

// themenews.php
define("_WFS_POSTEDBY","��Ƽԡ�");
define("_WFS_ON","On");
define("_WFS_READS","�ҥå�");
define("_WFS_FILEUPLOAD","ź�եե�����Υ��åץ���");
define("_WFS_FILESHOWNAME","ź�եե�����Υ����ȥ�");
define("_WFS_ATTACHEDFILES","ź�եե�������Խ�");
define("_WFS_NOFILE","�ե����뤬����ޤ���");
define("_WFS_AFTERREGED","�����������ˤϥե������ź�դǤ��ޤ��󡣵������������¸�������ź�եե�������ɲä��Ʋ�����");
define("_WFS_FILES","�ե�����");
define("_WFS_COMMENTSNUM","������");
define("_WFS_CATEGORYDESC","����");
define("_WFS_CATEGORYHEAD","���ƥ���ڡ����Υإå�<br /><br />���ʤ��Υ��ƥ���ξ�����HTML�⤷���ϥƥ����Ȥ�ɽ������ޤ�");
define("_WFS_CATEGORYFOOT","���ƥ���ڡ����Υեå�<br /><br />���ʤ��Υ��ƥ���β�����HTML�⤷���ϥƥ����Ȥ�ɽ������ޤ�");
define("_WFS_FILEID","�ե�����ID");
define("_WFS_FILEREALNAME","��¸���Υե�����̾");
define("_WFS_FILETEXT","������ʸ����");
define("_WFS_ARTICLEID","����ID");
define("_WFS_EXT","��ĥ��");
define("_WFS_MINETYPE","MINE������");
define("_WFS_UPDATEDATE","�ǽ���������");
define("_WFS_DEL","���");
define("_WFS_CANCEL","����󥻥�");
define("_WFS_IMGADD","�ɲ�");
define("_WFS_UPLOAD","���åץ���");
define("_WFS_LINKURL","��󥯤���URL");
define("_WFS_LINKURLNAME","�嵭URL������̾");
define("_WFS_SUMMARY","����");
define("_WFS_LINK","���");
define("_WFS_NOTREADFILE","�ե����뤬�ɤ�ޤ���");
define("_WFS_DOWNLOADNAME","��������ɻ��Υե�����̾");
define("_WFS_PAGEBREAK","���ڡ�������: [pagebreak]");

//new version 0.9.2
define("_WFS_MAININDEX","���ƥ���ΰ���");
define("_WFS_NOVIEWPERMISSION","���Υ��ꥢ�򸫤븢�¤�����ޤ���");
define("_WFS_WEBLINK","���:");
define("_WFS_VOTEAPPRE","��ɼ���꤬�Ȥ��������ޤ�");
define("_WFS_THANKYOU","%s �ؤθ���ɼ���꤬�Ȥ��������ޤ���"); // %s is your site name
define("_WFS_VOTEFROMYOU","��ʬ���Ȥ���ɼ�ϱ����Ԥ��ɤΥե�������������ɤ������ɤ�����Ω���ޤ�");
define("_WFS_VOTEONCE","�����Ʊ����꤫����ɼ���ʤ��ǲ�����");
define("_WFS_RATINGSCALE","�ϰϤ�1��10��10���ǹ�ɾ���Ǥ�");
define("_WFS_BEOBJECTIVE","�Ҵ�Ū��ɾ�����Ʋ����������Ƥοͤ�1�⤷����10��ɾ���򸫤���ɾ���ϰ�̣��̵���ʤäƤ��ޤ��ޤ�");
define("_WFS_DONOTVOTE","��ʬ���Ȥ���ɼ���ʤ��ǲ�����");
define("_WFS_RATEIT","ɾ������");
define("_WFS_DESCRIPTIONC","����: ");
define("_WFS_EMAILC","Email: ");
define("_WFS_CATEGORYC","���ƥ���: ");
define("_WFS_LASTUPDATEC","�ǽ�������: ");
define("_WFS_DLNOW","��������ɤϤ�����");
define("_WFS_VERSION","�С������");
define("_WFS_SUBMITDATE","�������");
define("_WFS_DLTIMES","%s ���������ɤ���ޤ���");
define("_WFS_FILESIZE","�ե����륵����");
define("_WFS_SUPPORTEDPLAT","���Ѳ�ǽ��OS/���ե���");
define("_WFS_HOMEPAGE","�ۡ���ڡ���");
define("_WFS_HITSC","�ҥå�: ");
define("_WFS_RATINGC","ɾ��: ");
define("_WFS_ONEVOTE","1 �����ɼ");
define("_WFS_NUMVOTES","%s �����ɼ");
define("_WFS_ONEPOST","1 ������");
define("_WFS_NUMPOSTS","%s ������");
define("_WFS_COMMENTSC","������: ");
define("_WFS_RATETHISFILE","���Υե������ɾ��");
define("_WFS_MODIFY","�Խ�");
define("_WFS_TELLAFRIEND","ͧã�˶�����");
define("_WFS_VSCOMMENTS","�����Ȥα���/���");
define("_WFS_EDIT","�Խ�");
define("_WFS_SUBMIT","���");
define("_WFS_BYTES","�Х���");
define("_WFS_ALREADYREPORTED","�ܷ���Ф���ե�������»�����Ϥ��Ǥˤʤ���Ƥ��ޤ�");
define("_WFS_MUSTREGFIRST","����ư���¹Ԥ��븢�¤�����ޤ���<br>��Ͽ�ޤ��ϥ������¹Ԥ��Ʋ�����");
define("_WFS_NORATING","����ɾ���Ϥ���ޤ���");
define("_WFS_CANTVOTEOWN","��Ƥ�����꤫�����ɼ�Ͻ���ޤ���<br>���Ƥ���ɼ��̵�뤵���ɾ������ޤ�");
define("_WFS_RANK","���");
define("_WFS_HITS","�ҥå�"); //updated
define("_WFS_RATING","ɾ��");
define("_WFS_VOTE","��ɼ");
define("_WFS_TOP10","%s �ȥå�10"); // %s is a review category name
define("_WFS_CATEGORIES","���ƥ���");
define("_WFS_THANKSFORHELP","�ܥǥ��쥯�ȥ���������ΰݻ��ˤ�����ĺ�����꤬�Ȥ��������ޤ�");
define("_WFS_FORSECURITY","�������ƥ������ͳ���餢�ʤ���IP���ɥ쥹�ȥ桼��̾�ϵ�Ͽ����ޤ�");
define("_WFS_NUMBYTES","%s �Х���");
define("_WFS_TIMES"," ��");
define("_WFS_DOWNLOADS","��������� ");
define("_WFS_FILETYPE","�ե����륿����: ");
define("_WFS_GROUPPROMPT","���Υ��롼�פ˥�����������Ĥ���:");
define("_WFS_REPORTBROKEN","�ե�������»�����");
define("_WFS_IMGNAME","�ե�����̾ (�֥��: ���ꥸ�ʥ�Υե�����̾�Ȱ��)");
define("_WFS_POSTNEWARTICLE","���������");
define("_WFS_SMILIE","�����˴饢��������ɲ�");
define("_WFS_EXGRAPHIC","�����β����򵭻����ɲ�");
define("_WFS_GRAPHIC","������β����򵭻����ɲ�");
define("_WFS_NOIMG","���᡼��̵��");
define("_WFS_ARTIMGUPLOAD","���᡼���Υ��åץ���");
define("_WFS_POPULAR","�͵�");
define("_WFS_RATEFILE","ɾ��");
define("_WFS_COMMENT","������");
define("_WFS_RATED","ɾ��");
define("_WFS_SUBMIT1","���");
define("_WFS_VOTES","��ɼ");
define("_WFS_SORTBY1","�¤ӽ�:");
define("_WFS_TITLE1","�����ȥ�");

//define("_WFS_DATE1","����");
define("_WFS_DATE1","��������");

define("_WFS_ARTICLEID1","����ID");
define("_WFS_POPULARITY1","�͵�");
define("_WFS_CURSORTBY1","�����ϸ��� %s �ǥ����Ȥ���Ƥ��ޤ�");
define("_WFS_RATING1","ɾ��");
define("_WFS_NOTIFYPUBLISH","ȯ�Ի���Email�����Τ������");
define("_WFS_POPULARITYLTOM","�͵��� (�͵����㤤��Τ���)");
define("_WFS_POPULARITYMTOL","�͵��� (�͵��ι⤤��Τ���)");
define("_WFS_ARTICLEIDLTOM","����ID�� (����)");
define("_WFS_ARTICLEIDMTOL","����ID�� (�߽�)");
define("_WFS_TITLEZTOA","�����ȥ�� (�߽�)");
define("_WFS_TITLEATOZ","�����ȥ�� (����)");

//define("_WFS_DATEOLD","���ս� (�������դθŤ���Τ���)");
//define("_WFS_DATENEW","���ս� (�������դο�������Τ���)");
define("_WFS_DATEOLD","�������ս� (�������դθŤ���Τ���)");
define("_WFS_DATENEW","�������ս� (�������դο�������Τ���)");

define("_WFS_RATINGLTOH","ɾ���� (��ɾ������)");
define("_WFS_RATINGHTOL","ɾ���� (��ɾ������)");
define("_WFS_SUBMITLTOH","��ƽ� (�Ť���Τ���)");
define("_WFS_SUBMITHTOL","��ƽ� (��������Τ���)");
define("_WFS_WEIGHT","��������");
define("_WFS_NOTITLE","���顼: �����ȥ뤬����ޤ�����äƵ����Υ����ȥ�����Ϥ��Ʋ�����");
define("_WFS_NOMAINTEXT","���顼: ��ʸ������ޤ�����äƵ�������ʸ�����Ϥ��Ʋ�����");
define("_WFS_RATINGA","ɾ�����줿����: %s");
define("_WFS_HTMLPAGE","HTML�ե�����</b>(�ƥ����ȤϾ�񤭤���ޤ�)");
define("_WFS_DBUPDATED","��Ƥ��꤬�Ȥ��������ޤ���");
define("_WFS_INTFILEAT","%s ���ܵ����˴ؤ�������񤫤�Ƥ��ޤ�");
define("_WFS_INTFILEFOUND","%s �˶�̣�������������Ĥ���ޤ���");
define("_WFS_DESCRIPTION","�ե����������");
define("_WFS_ARTICLEADDIT","�������ɲ�");
define("_WFS_ARTICLELINK","������URL�Υ��");
define("_WFS_MISCSETTINGS","����¾��������");
define("_WFS_FILEDESCRIPT","�ե����������");
define("_WFS_ATTACHEDFILESTXT","<b>�ե����륢�åץ���</b><br/><br />���ߤε�����ź�դ���ե����������ɽ�����ޤ����Խ���󥯤򥯥�å����뤳�Ȥ�ź�եե�������Խ��Ǥ��ޤ���<br /><br />��¸�Ѥߵ�������Խ��פ���������ե������ź�դǤ��ޤ���");
define("_WFS_DOWNLOAD","ź�եե�����Υ��åץ���");
define("_WFS_PUBLISHEDHOME","ȯ������");

//define("_WFS_ARTSIZE","�������� %s �Х���");
define("_WFS_ARTSIZE","�������� %s");

define("_WFS_DISCLAIMER","<b>����:</b>�ܥ����Ȥϥ桼���ˤ�ä���Ƥ��줿�����Ȥ˴ؤ��Ƥ�������Ǥ���ݾڤ⤤�����ޤ���");
define("_WFS_ONLYREGISTEREDUSERS","�ե�������»��������Ͽ�桼���Τ߽���ޤ�");
define("_WFS_THANKSFORINFO","���󤢤꤬�Ȥ��������ޤ����ޤ�ʤ����ʤ��Υꥯ�����Ȥ�Ĵ���������ޤ���");
define("_WFS_FILEPERMISSION","�ե�����Υ���������");
define("_WFS_DOWNLOADED","��������ɲ��");
define("_WFS_DOWNLOADSIZE","��������ɻ��Υե����륵����");
define("_WFS_LASTACCESS","�ǽ�����������");
define("_WFS_LASTUPDATED","�ǽ�������");
define("_WFS_ERRORCHECK","�ե������¸�ߤ��ޤ�����");
define("_AM_FILEATTACHED","�ե�����򵭻���ź�դ��ޤ�����");
define("_WFS_NODESCRIPT","�ե�����������Ϥ���ޤ���");
define("_WFS_UPLOADED","���åץ���: ");
define("_WFS_FILEMIMETYPE","�ե������MIME������");

// add disbr, enaamp
define("_WFS_DISBR","���Ԥ� br ���Ѵ����ʤ�");
define("_WFS_ENAAMP","�Խ����� &amp; �� &amp;amp; ���Ѵ�����");

// article.php
define("_WFS_ARTCLE_MORE","�������륿���ȥ�ε�����ʣ������ޤ�");
define("_WFS_REPORT_BREOKEN_DOWNLOAD","��»�����ե��������𤹤�");

// submit.php
define("_WFS_SUBMIT_FAIL","��������ƤǤ��ޤ���");
define("_WFS_BUT_SUBMIT_SUCCESS","�ʤ�����������Ƥ���ޤ���");
define("_WFS_SUBMITED_ARTICLE","��Ƥ��줿����");
define("_WFS_UPLOAD_END","�ե�����򥢥åץ��ɤ��ޤ���");
define("_WFS_UPLOAD_FAIL","�ե����뤬���åץ��ɤǤ��ޤ���");
define("_WFS_UPLOAD_NON","���åץ��ɡ��ե����뤬���ꤵ��Ƥ��ʤ�");
define("_WFS_UPLOAD_TOO_BIG","�ե����륵�������礭�����ޤ���\n����� %s B �Ǥ���");
define("_WFS_UPLOAD_NOT_ALLOWED_MINE_TYPE","���μ���Υե�����ϥ��åץ��ɤǤ��ޤ���");

// modify.php
define("_WFS_ARTICLE_BACK","���ε��������");
define("_WFS_MODIFY_TITLE","�������Խ�");
define("_WFS_MODIFY_END","�������Խ����ޤ���");
define("_WFS_MODIFY_FAIL","�������Խ��Ǥ��ޤ���");
define("_WFS_ACTION","���������");
define("_WFS_DELETE","���");
define("_WFS_FILE_DOWNLOADNAME","��������ɡ��ե�����̾");
define("_WFS_FILE_CHECK","�ե�����γ�ǧ");
define("_WFS_FILE_NOEXIST","¸�ߤ��ʤ�");
define("_WFS_FILE_NOFILE","�̾�ե�����Ǥʤ�");
define("_WFS_FILE_MODIFY_END","�ե�����򹹿����ޤ���");
define("_WFS_FILE_DELETE_COMFROM","���: �����ˤ��Υե�����������ޤ�����");
define("_WFS_FILE_DELETE_END","�ե�����������ޤ���");
define("_WFS_FILE_DELETE_FAIL","�ե���������Ǥ��ޤ���");

// multi language in index.php
define("_WFS_ERROR_IMAGE","���顼�� �����Υѥ��ȥե�����̾���ǧ���Ʋ�����");

// translated into Japanse by HAL
// based on WF-Section V1.0 english/main.php 17/06/2003
// http://www.adslnet.org/
?>
