$Id: readme.txt,v 1.11 2006/06/21 17:24:32 ohwada Exp $

=================================================
Version: 1.12
Date:    2006-06-21
Author:  Kenichi OHWADA
URL:     http://linux2.ohwada.net/
Email:   webmaster@ohwada.net
=================================================

It is the upper compatible module of wfsection 1.01.
The module name was changed in order to avoid confusion with wfsection.
You can chnage a module name to your favorite name easily.

In Nov 2005, WF Project is dispersed.
wfsection module is stopped to distribute . 

In this version, the development of XFsection is finished. 
Henceforth, XFsection will support to maintenance only important bugs.
XFsection will not support correspondence to PHP5, and etc.

We recommend you use the new section module like SmartSection.


* The contents of change
1. bug fix
(1) 8207: cannot edit category
http://sourceforge.jp/tracker/index.php?func=detail&aid=8207&group_id=1559&atid=5843

(2) 8243: cannot change the number of articles 
http://sourceforge.jp/tracker/index.php?func=detail&aid=8243&group_id=1559&atid=5843

(3) 8482: HTML grammer error in index.php 
http://sourceforge.jp/tracker/index.php?func=detail&aid=8482&group_id=1559&atid=5843

(4) 8569: cannot print page
http://sourceforge.jp/tracker/index.php?func=detail&aid=8569&group_id=1559&atid=5843

2. Added labguage pack
- italian

* changed files
- index.php
- print.php
- admin/category.php


=================================================
Version: 1.11
Date:    2006-03-20
=================================================

It is the upper compatible module of wfsection 1.01.
The module name was changed in order to avoid confusion with wfsection.
You can chnage a module name to your favorite name easily.

Now, WF Project is dispersed.
wfsection is stopped to distribute . 

* The contents of change
There are bug fix altogether.
No additional functional.

1．Security 
delete code "foreach ($HTTP_GET_VARS as $k => $v)"
http://sourceforge.jp/tracker/index.php?func=detail&aid=8184&group_id=1559&atid=5843

2．corresponding to PHP5
(1) Fatal error: Cannot re-assign $this in include/functions.php
http://sourceforge.jp/tracker/index.php?func=detail&aid=8185&group_id=1559&atid=5843
http://linux.ohwada.jp/modules/newbb/viewtopic.php?topic_id=420&forum=3

(2) Fatal error: Cannot redeclare class wfsfiles
https://sourceforge.jp/tracker/index.php?func=detail&aid=8188&group_id=1559&atid=5843
http://xoopscube.jp/modules/xhnewbb/viewtopic.php?topic_id=1006

(3) register_long_arrays = Off 
replae $HTTP_*_VARS

3．page number is displayed too many
http://sourceforge.jp/tracker/index.php?func=detail&aid=8186&group_id=1559&atid=5843
http://linux.ohwada.jp/modules/newbb/viewtopic.php?topic_id=414&forum=3

4. change language pack
- french


* changed files
Since I changed many files, it may be degraded. 
- article.php
- brokenfile.php
- download.php
- index.php
- modify.php
- print.php
- ratefile.php
- submit.php
- topten.php
- xoops_version.php
- admin/allarticles.php
- admin/brokendown.php
- admin/category.php
- admin/config.php
- admin/duplicate.php
- admin/filemanager.php
- admin/index.php
- admin/pathconfig.php
- admin/reorder.php
- admin/sectiontxt.php
- admin/wfsfilesshow.php
- class/uploadfile.php
- class/wfsarticle.php
- class/wfsfiles.php
- include/functions.php
- include/pdedit.php
- include/storyform.inc.php
- include/wysiwygeditor.php


=================================================
Version: 1.10
Date:    2005-11-20
=================================================

It is the upper compatible module of wfsection 1.01.
The module name was changed in order to avoid confusion with wfsection.
You can chnage a module name to your favorite name easily.

Please look at the following about wfsection.
http://www.wf-projects.com/

* The contents of change
There are bug fix altogether.
No additional functional.

１．typo &nbsp
http://sourceforge.jp/tracker/index.php?func=detail&aid=7443&group_id=1559&atid=5843


=================================================
Version: 1.09
Date:    2005-09-10
=================================================

* The contents of change
There are bug fix altogether.
No additional functional.

1. import.php dont work correctly in windows
http://linux.ohwada.jp/modules/newbb/viewtopic.php?topic_id=55&forum=3


=================================================
Version: 1.08
Date:    2005-06-20
=================================================

* The contents of change
There are bug fix altogether.
No additional functional.

1. Cannot use the table icon in WYSIWYG editor
http://linux.ohwada.jp/modules/newbb/viewtopic.php?topic_id=55&forum=3

The table icon was deleted as provisional measure. 

2. the HTML tag of header image is wrong. 
http://linux.ohwada.jp/modules/newbb/viewtopic.php?topic_id=75&forum=3

wrong use for indexmainheader()

3. redundant "Page" is displayed when use [pagebreak]
http://linux2.ohwada.net/modules/newbb/viewtopic.php?topic_id=50&forum=1

typo of space entity (& nbsp ;)

4. right block is not displayed in vote page 
http://linux.ohwada.jp/modules/newbb/viewtopic.php?topic_id=117&forum=3

include twice header.php

5. offline article is displayed
http://linux.ohwada.jp/modules/newbb/viewtopic.php?topic_id=174&forum=3

create the new function which check the showing property of an article. 

article.php?articleid=xx
print.php?articleid=xx
What's New module 

6. double link to an article 
http://jp.xoops.org/modules/newbb/viewtopic.php?topic_id=7854&forum=17

unnecessary link in iconLink() andd textLink() of wfsarticle.php

7. Double declare of class variable in wfsarticle.php
http://linux.ohwada.jp/modules/newbb/viewtopic.php?topic_id=212&forum=3

In PHP4, it is satisfactory. 
In PHP5, it cause fatal error. 

8. The link to category is wrong. 
http://linux.ohwada.jp/modules/newbb/viewtopic.php?topic_id=217&forum=3

The substitution of a character sequence was wrong. 

9. NEW icon is not displayed when not use mydownloads. 
http://linux2.ohwada.net/modules/newbb/viewtopic.php?topic_id=78&forum=1

XFsection have required icons.

10. cannnot create new category when use Xoops Protector 
http://jp.xoops.org/modules/newbb/viewtopic.php?topic_id=9370&forum=17

checke the existence of a POST variable. 

11. duplicated module does not work correctly
http://linux.ohwada.jp/modules/newbb/viewtopic.php?topic_id=123&forum=3

change a overlooking in block function. 
correspond to the What's New module. 
dont measures the affair in safe mode.

12. cannot deleted duplicated module. 
http://linux.ohwada.jp/modules/newbb/viewtopic.php?topic_id=194&forum=3

change permission to 777 after duplicating. 
you can delete module, but cannot overwrite file.
when overwriting, you delete file and add same file.

* Cautions *

When it coexists with WFsection 2.01/2.07, 
Please perform the following change. 

wfsection/xoops_version.php 
Before change 
-----
include_once WFS_ROOT_PATH . "/include/groupaccess.php";
include_once WFS_ROOT_PATH . "/class/wfsarticle.php";
-----

After change 
-----
if ( !function_exists('listgroups') )
{
	include_once WFS_ROOT_PATH . "/include/groupaccess.php";
}
if ( !class_exists('wfstree') )
{
	include_once WFS_ROOT_PATH . "/class/wfsarticle.php";
}
-----

* A mysterious phenomenon *

In "Weight Management" (reorder.php) of admin page,
Apache falls in the following environment. 
----
Windows XP SP1
Apache 1.3.33
PHP 5.0.4
---- 

It does not occure in PHP 4.3.10. 

* Added and Changed files
Added files :
images/newred.gif
images/update.gif
images/pop.gif

Changed files :
article.php
index.php
print.php
ratefile.php
admin/category.php
admin/duplicate.php
admin/filemanager.php
admin/index.php
admin/pathconfig.php
blocks/xfs_artmenu.php
blocks/xfs_bigstory.php
blocks/xfs_menu.php
blocks/xfs_new.php
blocks/xfs_newdown.php
blocks/xfs_top.php
blocks/xfs_topics.php
class/wfsarticle.php
include/data.inc.php
include/fucntions.php
include/wysiwygeditor.php

Change name files
class/xfs_wfstree.php       -> xfblock_wfstree.php
include/xfs_groupaccess.php -> xfblock_groupaccess.php

*** special thanks  *** 
the person who reported a bug
the person who wrote the correction code


=================================================
Version: 1.07
Date:    2004/07/14
=================================================

The contents of change
1. WFsection 2.01 correspondence 
XFsection is designed the minimum change from WFsection. 
Some function names and constant names isnot changed.
Since WFsection is having upgraded to 2.01,
it came to cause mismatching. 

1.1 Block function
WFsection and XFsection read thier groupaccess.php or wfstree.php.
And so function name is conflicted. 
It was coped that file name and function name are changed.

1.2 chnage lang pack
rename WFS to XFS, since menu name had been change

Added files :
include/xfs_functions.php
class/xfs_wfstree.php

Changed files :
admin/menu.php
blocks/xfs_artmenu.php
blocks/xfs_bigstory.php
blocks/xfs_menu.php
blocks/xfs_newdown.php
blocks/xfs_new.php
blocks/xfs_topics.php
blocks/xfs_top.php
language/english/modinfo.php
language/english/blocks.php
language/japanese/modinfo.php
language/japanese/blocks.php

2. add lang pack
- french

3. Bug Fix
3.1 original WFsection
admin/category.php
  "Section Image" can't display in the "Section Management" page

admin/sectiontxt.php
  apostrophe ' doesn't save in Index Page Management


*** special thanks ***
http://interagir.ch : french lang pack


=================================================
Version: 1.06-2
Date:    2004/04/22
Author:  Kenichi OHWADA
URL:     http://linux.ohwada.net/
Email:   linux@ohwada.net
=================================================
patch
(1) class/base_language.php
Downloads not working
add convert_download_filename

(2) topten.php
go back lines 20 -> 10

(3) article.php
tel a frined : index.php -> article.php


=================================================
Version: 1.06-1
Date:    2004/04/04
Author:  Kenichi OHWADA
URL:     http://linux.ohwada.net/
Email:   linux@ohwada.net
=================================================
patch
(1) language/japanese/admin.php
missing _AM_PREFERENCE

(2) admin/allartilces.php
forget to delete line 64
$scount = count(WfsArticle::getAllArticle($wfsConfig['lastart'], 0, 0, $dataselect));

(3) include/functions.php
indexmainheader: donot correspond surely p tag and div tag. 

(4) class/wfstree.php
getNicePathFromId： & -> &amp;


=================================================
Version: 1.06
Date:    2004/04/02
Author:  Kenichi OHWADA
URL:     http://linux.ohwada.net/
Email:   linux@ohwada.net
=================================================

It is the upper compatible module of wfsection.
The module name was changed in order to avoid confusion with wfsection.
You can chnage a module name to your favorite name easily.

Please look at the following about wfsection.
http://wfsections.xoops2.com/

The contents of change
1. User can upload files.

1.1 Set up.
Authority and file size by setting conf.php. 

1.2 Related changs. 
(1) The error code was added to the check result. 
(2) The mode which does not check MIME type was added. 
(3) Add MIME type : excle and powerpoint 

1.3  Add words to Lang pack
24 words (it omits since many)

Changed files :
conf.php
submit.php
modify.php
include/functions.php
include/storyform.inc.php
class/uploadfile.php
class/wfsarticle.php
class/mimetype.php
admin/index.php
admin/config.php
sql/xfsection.sql
language/english/main.php
language/japanese/main.php

2. Copy mode of article. 
Copy Article in admin menu. 
The original article is left. 
Atached files are not copied.

Add word to Lang pack
  _AM_COPY_ARTICLE_EXPLANE

Changed files :
admin/index.php
class/wfsarticle.php
language/english/admin.php
language/japanese/admin.php

3. Performance Improvement 
In Article list, timeout will happen when there are many records.

Changed files :
admin/allartilces.php

4. dupicate module
Add form to specify a new module name etc. 

Changed files :
admin/depulicate.php (rename from rename.php)

5. Correspondence to Multi Languages 
5.1 add words to lang pack
  _WFS_REPORT_BREOKEN_DOWNLOAD
  _AM_CATEGORY_REORDERED
  _AM_ARTICLE_REORDERED
  _AM_CATEGORY_REORDER_RETURN

5.2 add language pack 
- polish
- spanish (update)

Changed files :
article.php
admin/wfsfilesshow.php
admin/reorder.php
language/english/main.php
language/english/admin.php
language/japanese/main.php
language/japanese/admin.php

6. Correspondence to Japanese Environment 
(1) The class of mulitl languages was added newly. 
(2) The class was used "tel a friend" 
(3) Conversion of a download file name

Added files :
class/base_language.php
/language/english/convert_language.php
/language/japanese/convert_language.php

Changed files :
article.php
download.php
include/functions.php


7. Bug Fix
7.1 original WFsection
article.php
  file descript can not show
  http://www.xoops.org/modules/newbb/viewtopic.php?topic_id=17181&forum=4

class/wfsarticle.php
  in preview, don't take over the values
       autoexpdat, autodate, movetotop, changeuser
  NOWSETTIME is wrong
  NOWSETEXPTIME is wrong
  unnecessary $num

class/wfsfiles.php
  warning comes out, since a full path name is not set up

class/uploadfile.php
  cannot change maxFilesize


*** special thanks ***
http://kompozytor.net : polish lang pack
dacevedo : spanish lang pack


=================================================
Version: 1.05
Date:    2004/02/28
=================================================

It is the upper compatible module of wfsection.
The module name was changed in order to avoid confusion with wfsection.
You can chnage a module name to your favorite name easily.

Please look at the following about wfsection.
http://wfsections.xoops2.com/

The contents of change
1. admin management
1.1  admin menu 
(1) The item of admin menu become the same as a popup menu.
  It seems that old MAC user will not display a popup menu correctly.

(2) all management display admin menu.

(3) add the mode which does not display an admin menu on the upper. 

(4) don't display admin menu after the 2nd page at article management.  

1.2  article management menu 
(1) The number of articles is displayed on article menu.
  It display in the red, when there is the waiting for approval of submitted article.

(2) unify a article menu and a title

(3) don't display admin menu after the 2nd page at article management.

1.3 the order of articles
  take over the order of articles to previos and next page, which setted up by the lower. 

1.4 add word to lang pack
 _AM_PATH_MANAGEMENT: Path Management
 _AM_LIST_BROKEN: List Broken downloads

Changed files :
conf.php
admin/index.php
admin/allartilces.php
admin/section.txt
admin/pathconfig.php
admin/brokendown.php
admin/reorder.php
admin/config.php
admin/filemanager.php
admin/wfsfileshow.php
admin/category.php
admin/import.php
include/functions.php
class/wfsarticle.php
language/english/admin.php
language/japanese/admin.php

2. Printing article
2.1 Check access authority same as displaying article. 

2.2 change a date from created time to published time same as displaying article.

2.3 change the image from fixation at "logo.gif" to Main Index Image set up by Index Page Management.

Changed files :
print.php

3. add the mode which inhibit to submit article.

Changed files :
submit.php
conf.php

4. Correspondence to Multi Languages 

4.1 Dummy of multibyte function for non multibyte environment. 

4.2 add word to lang pack
 _WFS_ERROR_IMAGE: Please check path/file for image
 _AM_DUPLICATE_ARTICLES: Also copy articles

4.3 add language pack 
- spanish
- traditional chinese

not include following 4 words
 _AM_PATH_MANAGEMENT
 _AM_LIST_BROKEN
 _WFS_ERROR_IMAGE
 _AM_DUPLICATE_ARTICLES

Added files :
include/mb_dummy.php
language/tchinese/
language/spanish/

5. Bug Fix
5.1 original WFsection
index.php
  <TD> -- </TD> has not closed.

include/wysiwygeditor.php
  short_open_tag is used. 

include/groupsaccess.php
  php script has not closed. 

admin/reorder.php
  can't display ten or more articles at weight management. 

admin/category.php
class/wfsarticle.php
  can't copy articles at the duplicate of a category

class/wfstree.php
  an unnecessary code: $string

class/wfscategory.php
  constant parse error: orders

template/blocks/xfs_block.menu.html
  an excessive tag: </li>

5.2 peculiar to XFsection
admin/import.php
  double addslashes when magic_quotes_gpc is off 


*** special thanks ***
herve:    Bug fix, others 
cache:    Improvement of a admin management
dacevedo: spanish lang pack
Conan:    chinese lang pack


=================================================
Version: 1.04
Date:    2004/01/25
=================================================

The contents of change
1. permit the auther to modify article

Please change the following files when using it,
becouse it has come to be turned off by the default. 
33 line, conf.php

Added files :
modify.php

Changed files :
article.php
conf.php
include/storyform.inc.php

2. print error message if can't copy image file
Changed files :
admin/import.php

3. convert EUC-JP to SJIS at tel a frined
It is for Japanese environment.

Please change the following files when using it,
becouse it has come to be turned off by the default. 
37 line, conf.php

Changed files :
article.php
conf.php

4. Bug Fix
4.1 original WFsection
submit.php
  don't take over a category id to the preview 
  don't set url and urlname

index.php
  category description shows </ br> not line feed.

topten.php
  The article is displayed before publishing

admin/sectiontxt.php
  a picture will disappear, when select new picture

4.2 peculiar to XFsection
none

4.3 for Japanese environment
language/japanes/admin.php
  an erratum 

=================================================
Version: 1.03
Date:    2003/11/21
=================================================

The contents of change
1. support English language
Changed files :
article.php
language
  - japanese
      - admin.php
      - main.php
  - english
     - admin.php
     - main.php
     - blocks.php
     - modinfo.php

2. BracketName of PukiWiki is implemented.
Please change the following files when using it,
becouse it has come to be turned off by the default. 
22 line, conf.php
35 line, class/wfsarticle.php 

Please read wiki.txt.
Changed files : class/wfsarticle.php

3. Handling of existing pure HTML Files
Code convert Shift_JIS to EUC-JP.
Changed files : admin/import.php

4. Bug Fix
4.1 original WFsection
article.php
  file description can not show

4.2 peculiar to XFsection
xoops_version.php
  search don't work
admin/import.php
  title occure error in DB processing, whiche have an escape character.


=================================================
Version: 1.02
Date:    2003/10/11
=================================================

The contents of change
1. Handling of existing pure HTML Files
1.1 Taking in
import.php is added.
The files below the specified directory is collectively taken in on an article table.

1.2 Show and Edit
2 items are added to the article table.
(1) nobr : Not change New-line into br.
It is alike and does not change.
(2) enaamp : Change & into &amp; at the time of edit.

In HTML file, 
a HTML tag is enclosed by "<" and ">" like as "<tag>".
In order to display "<tag>", it is described as "&lt;tag&gt;".

About "<tag>", when editing in wfsection,
it is changed to "&lt;tag&gt;" in an edit box,
and it is displayed as "<tag>".
However, also about "&lt;tag&gt;",
it is changeed to "&lt;tag&gt;" in edit box,
and it is displayed as "<tag>".
As the result, both become unable to distinguish. 

In this time,
"&" is changed to "&amp;".
And so, about "<tag>",
it is changed to "&lt;tag&gt;" in an edit box,
and it is displayed as "<tag>".
About "&lt;tag&gt;",
it is changeed to "&amp;lt;tag&amp;gt;" in edit box,
and it is displayed as "&lt;tag&gt;".
And then, it becomes the same as that of the original HTML file. 

2. Link by Title
Usually, the specification is "article.php?articleid=1".
In addition, the specification "article.php?title=abc" is possible.

3. Bug Fix of original WFsection
index.php:
  can't jump at Path and local select box
submit.php.
  _WFS_THANKS isn't defined
topten.php.
  Top 10 in Popular isn't displayed
blocks/wfs_topics.php.
  uncomment groupaccess.php
  change xoops_wfs_categoryto to use xoopsDB->prefix

4. Make a change of a module name and a table name easy.
4.1 Definition File of Module Name and Table Name
The definition file conf.php is added.
So that a change part might decrease.
Many files were changed, so that this file might be referred to.

4.2 Install the two or more same modules.
Although the file in blocks directory has included include/groupaccess.php,
the same function name may be included two or more times,
and this may conflict. 
The simple evasion measure is added. 
However, since it is not perfect,
if there is a problem, please correct by each one. 

4.3 Change of File Name and Contents
The command rename.php is added.
Which changes a file name and the contents esay.

4.4 Change of Module Name and Table Name
wfsection -> xfsection 
wfs_xxx   -> xfs_xxx

Or [ degrade, since many files were changed ] 

=================================================
File list of added, deleted, changed
=================================================
1. Handling of existing pure HTML Files
2. Link by Title
3. Bug Fix of original WFsection

Added files :
readame_jp.txt
rename.php
conf.php
admin/import.php
images/xfs_slogo.gif

Deleted files :
wfsupdate.php

Changed files :
xoops_version.php
article.php
index.php
submit.php
topten.php
admin/menu.php
blocks/xfs_topics.php (wfs_topics.php)
class/wfsarticle.php
include/functions.php
sql/xfsection.sql｡ﾊwfsection.sql｡ﾋ
language/japanese/admin.php
language/japanese/main.php
language/japanese/modinfo.php

4. Make a change of a module name and a table name easy.
Added files :
rename.php

Changed files :
brokenfile.php
header.php
ratefile.php
admin/admin_header.php
admin/brokendown.php
admin/config.php
admin/pathconfig.php
admin/reorder.php
admin/sectiontxt.php
admin/wfsfilesshow.php
class/common.php
class/wfscategory.php
class/wfsfiles.php
class/wfstree.php
include/groupaccess.php
include/search.inc.php
blocks/xfs_artmenu.php
blocks/xfs_bigstory.php
blocks/xfs_menu.php
blocks/xfs_newdown.php
blocks/xfs_new.php
blocks/xfs_topics.php
blocks/xfs_top.php
language/japanese/blocks.php

Changed file name :
templates/xfsection_article.html (xfsection_article.html)
templates/xfsection_htmlart.html (xfsection_htmlart.html)
templates/xfsection_topten.html (wfsection_topten.html)
templates/blocks/xfs_block.artmenu.html (wfs_block.artmenu.html)
templates/blocks/xfs_block_bigstory.html (wfs_block_bigstory.html)
templates/blocks/xfs_block.menu.html (wfs_block.menu.html)
templates/blocks/xfs_block_newdown.html (wfs_block_newdown.html)
templates/blocks/xfs_block_new.html (wfs_block_new.html)
templates/blocks/xfs_block_top.html (wfs_block_top.html)
templates/blocks/xfs_block_topics.html (wfs_block_topics.html)

=================================================
The change method of a module name and a table name 
=================================================
(1) A directory name is changed into your favorite.
(2) Change rename.php.

(3) Excute rename.php.
The contents of processing are as follows. 

(a) The contents of the following file are changed. 
xoops_version.php
language/japanese/admin.php
language/japanese/modinfo.php

(b) The file name and contents of the following file are changed. 
all files in blocks derectory
all files in blocks templates
sql/xfsection.sql

(c) The file name of the following file are changed. 
images/xfs_slogo.gif

