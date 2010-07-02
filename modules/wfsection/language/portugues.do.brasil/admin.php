<?php
//%%%%%%        Admin Module Name  Articles         %%%%%
define("_AM_DBUPDATED","Database Updated Successfully!");
define("_AM_STORYID","ID");
define("_AM_TITLE","Title");
define("_AM_SUMMARY","Summary");
define("_AM_CATEGORY","Section Name"); //******
define("_AM_CATEGORY2","Modify this Category:"); //******
define("_AM_POSTER","Author");
define("_AM_SUBMITTED2","Submission Date");
define("_AM_NOSHOWART2","No Show");
define("_AM_ACTION","Action");
define("_AM_EDIT","Edit");
define("_AM_DELETE","Delete");
define("_AM_LAST10ARTS","Published Articles");
define("_AM_PUBLISHED","Published Date");
define("_AM_PUBLISHEDON","Publication Date"); 
define("_AM_GO","submit");
define("_AM_EDITARTICLE","Edit Article");
define("_AM_POSTNEWARTICLE","Edit Article");
define("_AM_RUSUREDEL","Are you sure you want to delete this article and all its comments?");
define("_AM_YES","Yes");
define("_AM_NO","No");
define("_AM_ALLOWEDHTML","Allowed HTML:");
define("_AM_DISAMILEY","Disable Smiley");
define("_AM_DISHTML","Disable HTML");
define("_AM_PREVIEW","Preview");
define("_AM_SAVE","Save");
define("_AM_ADD","Add");
define("_AM_SMILIE","Add Smilie to Article");
define("_AM_EXGRAPHIC","Add Ext Graphic to Article");
define("_AM_GRAPHIC","Add local Graphic to Article");
define("_AM_FILESHOWDESCRIPT","Upload file Description"); //new
define("_AM_ARTICLEMANAGEMENT","Article Management");
define("_AM_ARTICLEMANAGEMENTLINKS","Article Management Links");
define("_AM_ARTICLEPREVIEW","Article Preview");
define("_AM_ADDMCATEGORY","Create New Section");
define("_AM_CATEGORYNAME","Section Name");
define("_AM_CATEGORYTAKEMETO","Click here to create a new category.");
define("_AM_NOCATEGORY","ERROR - No Categories created.");
define("_AM_MAX40CHAR","(max: 40 characters)");
define("_AM_CATEGORYIMG","Section Image");
define("_AM_IMGNAEXLOC","image name + extension located in %s");
define("_AM_IN","<b>Create in Section</b> <br />(Blank: Main Section, else as Sub-Section)");
define("_AM_MOVETO","<b>Move to Section</b> (Blank: Do not move section)");
define("_AM_MODIFYCATEGORY","Modify Section");
define("_AM_MODIFY","Modify");
define("_AM_PARENTCATEGORY","Parent Section");
define("_AM_SAVECHANGE","Save Changes");
define("_AM_DEL","Delete");
define("_AM_CANCEL","Cancel");
define("_AM_WAYSYWTDTTAL","WARNING: Are you sure you want to delete this Section and ALL its Stories and Comments?");
// Added in Beta6
define("_AM_CATEGORYSMNGR","Sections Manager");
define("_AM_PEARTICLES","Create new Article");
define("_AM_GENERALCONF","General Configuration");

// WFSECTION
define("_AM_UPDATEFAIL","Update failed.");
define("_AM_EDITFILE","Edit attached file");
define("_AM_CATEGORYDESC","Category Byline text");
define("_AM_FILESBASEPATH","Set Directory for attached files:");
define("_AM_AGRAPHICPATH","Set Directory for 'Articles' graphics/pictures:");
define("_AM_SGRAPHICPATH","Set Directory for 'Section' graphics/pictures:");
define("_AM_SMILIECPATH","Set Directory for Smilies:");
define("_AM_HTMLCPATH","Set Directory for HTML Files:");
define("_AM_FILEUPLOADSPATH","Attached Files: ");
define("_AM_FILEUPLOADSTEMPPATH","Attached Temp: ");
define("_AM_ARTICLESFILEPATH","Article Images: ");
define("_AM_SECTIONFILEPATH","Section Images: ");
define("_AM_SMILIEFILEPATH","Smilie Images: ");
define("_AM_HTMLFILEPATH","HTML Files: ");
define("_AM_UPLOADCONFIGFILE","Upload Config file: ");
define("_AM_ARTICLESAPAGE","Number of articles to display per page:");
define("_AM_ARTICLESAPAGE2","Number of articles to display on each page before page navigation is shown:");
define("_AM_NOIMG","No Image");
define("_AM_PIDINVALID","The Parent Section is invalid.");
define("_AM_NOTITLE","There is no title. A Title is required.");
define("_AM_FILEDEL","WARNING: Are you sure you want to delete this File?");
define("_AM_AFERTSETCATE","After adding Sections, you can add articles.");
define("_AM_IMGUPLOAD","Upload Section Image");
define("_AM_IMGUPLOAD2","Current image folder is ");
define("_AM_IMGNAME","File Name (Blank: Same as original (uploaded) file name)");
define("_AM_UPLOADED","Uploaded!");
define("_AM_ISNOTWRITABLE","is not writable!");
define("_AM_UPLOADFAIL","WARNING: This upload failed. Reason:");
define("_AM_NOTALLOWEDMINETYPE","You are not permitted to upload this type of file.");
define("_AM_FILETOOBIG","File Size larger than permitted upload size!");

define("_AM_CATEGORYMENU","Category Index Configuration");
define("_AM_ARTICLE2MENU","Article Index Configuration");
define("_AM_ARTICLEPAGEMENU","Article Page Configuration");
define("_AM_BLOCKMENU","Blocks Configuration");
define("_AM_ADMINEDITMENU","Article General Configuration");
define("_AM_ADMINCONFIGMENU","Admin Configuration");

define("_AM_ARTIMGUPLOAD","Upload Image");
define("_AM_TOPPAGETYPE","Show links to Articles instead of Article count?");
define("_AM_SHOWCATPIC","Display Section image in category index?");
define("_AM_WYSIWYG","Use WYSIWYG Editor rather than Xoops editor?");
define("_AM_SHOWCOMMENTS","Display user comments on article page?");
define("_AM_SUBMITTED","User submitted articles"); //added
define("_AM_ALLTXT","<h4>Article Management</h4></div><div>With <b>Article Management</b> you can edit, delete or rename any article. This mode will show every article within the database.<br /><br />"); //added
define("_AM_PUBLISHEDTXT","<h4>Article Published Management</h4></div><div><b>Article Published Management</b> will show all articles that have been published (Approved by Webmaster).<br /><br />These are all the articles that will be shown in category listing of the WF-Section index page (including all those controlled by groupaccess).<br /><br />"); //added
define("_AM_SUBMITTEDTXT","<h4>Article Submission Management</h4></div><div><b>Article Submission management</b> will show all articles submitted by your website users and allow you to moderate them.<br /><br />To approve an article, click on <b>Edit</b> link, then highlight the <b>Approve</b> checkbox and the save the article. The submitted article will then be published.<br /><br />"); //added
define("_AM_ONLINETXT","<h4>Article Online Management</h4></div><div><b>Article Online Management</b> will show all articles which status has been set to 'online'.<br /><br />To change the status of an article, click on the <b>Edit</b> link and highlight the <b>online</b> checkbox off/on.<br /><br />"); //added
define("_AM_OFFLINETXT","<h4>Article Offline Management</h4></div><div><b>Article Offline Management</b> will show all articles which status has been set to <b>offline</b>.<br /><br />To change the status of an article, click on the <b>Edit</b> link and highlight the <b>online</b> checkbox off/on.<br /><br />"); //added
define("_AM_EXPIREDTXT","<h4>Article Expired Management</h4></div><div><b>Article Expired Management</b> will show all articles that have expired.<br /><br />You can easily reset the expire date by clicking on <b>Edit</b> link and by changing the <b>Set the date/time of expiration</b> setting.<br /><br />"); //added
define("_AM_AUTOEXPIRETXT","<h4>Article Auto Expired Management</h4></div><div><b>Article Auto Expired Management</b> will show all articles that have been set to expire on a certain date.<br /><br />You can reset the expire date by clicking on <b>Edit</b> link and changing the <b>Set the date/time of expiration</b> setting.<br /><br />"); //added
define("_AM_AUTOTXT","<h4>Article Auto Management</h4></div><div><b>Article Auto Publish Management</b> will show all articles that have been set to publish at a future date.<br /><br />This setting can be changed by clicking on the <b>edit</b> link and changing the 'Set the date/time of publish' setting.<br /><br />"); //added
define("_AM_NOSHOWTXT","<h4>No Show Article</h4></div><div><b>No Show Article</b> The are a special type of article, unlike your normal articles these will not show up in article index pages and will not be seen that way.&nbsp;&nbsp; Instead, these article will only show in the `WF-Section Menu block`.<br /><br />Using this option with HTML Pages and `No Display info` (Option on the edit article page) you can show just what you want. &nbsp;&nbsp;An example of this would be a `privacy notice` page etc.<br /><br />All other options control these types of articles also. i.e. published, expired, online/offline.<br /><br />"); //added
define("_AM_BLOCKCONF","Block Configuration");
define("_AM_TITLE1","Name of the Main Menu block:");
define("_AM_TITLE4","Name of the Recent Articles block:");
define("_AM_TITLE5","Name of the top articles block:");
define("_AM_ORDER","Alternative 'Order' text:");
define("_AM_DATE","Alternative 'Date' text:");
define("_AM_HITS","Alternative 'Hits' text:");
define("_AM_DISP","Alternative 'Display' text:");
define("_AM_ARTCLS","Name of the Articles Block");
define("_AM_MENU_LINKS","<b>Menu Management Links</b>");
define("_AM_BAN","Ban User");
//New to version 0.9.2
define("_AM_CMODHEADER","File Permission Check");
define("_AM_CMODERRORINFO","Checks directories and files for proper writable permissions.<br/><br/>Wf-Section will try to CHMOD the directories used. An error message will be shown if the write permissions are not correct.");
define("_AM_FILEPATH","Images and upload Config");
define("_AM_FILEPATHWARNING","Sets the path for directories used by WF-Section.  A warning will be given if a path used is incorrect.<br/><br/>Leave a field empty if you wish WF-Section to use the default path/s.<br/><br/>");
define("_AM_FILEUSEPATH","Change user Path");
define("_AM_PATHEXIST","Path exists!");
define("_AM_PATHNOTEXIST","Path does not exist! Please check this!");
define("_AM_USERPATH","User defined path");
define("_AM_SHOWSELIMAGE","Showing current Selected Image: "); //******* Updated *******
define("_AM_SHOWSUBMENU","Display submenus for each category?");
define("_AM_MENUS","Main Index Configurations");
define("_AM_DEFAULTPATH","Default path used");
define("_AM_SCROLLINGBLOCK","Use scrolling in recent article block? (Obsolete in this version!)");
define("_AM_BLOCKHEIGHT","Set scrolling Block height?");
define("_AM_DEFAULT"," Default");
define("_AM_BLOCKAMOUNT","Number of lines to scroll?");
define("_AM_BLOCKDELAY","Scrolling Block Delay (Per line)");
define("_AM_LASTART","Number of new Articles to display in admin area: ");
define("_AM_NUMUPLOADS","Number of Files to Upload at one time?");
define("_AM_WEBMASTONLY","Only Webmaster can change WF-Section Configuration?");
define("_AM_DEFAULTS","Reset all config to default settings?");

define("_AM_NOCMODERROR","( correct )");
define("_AM_CMODERROR","( Incorrect Permissions or Directory does not exist! )");
define("_AM_REVERTED","WF-Section config restored to their defaults");
define("_AM_GROUPPROMPT","Allow Access to the following groups:");
define("_AM_NOVIEWPERMISSION","Sorry! You do not have permission to view this area.");
define("_AM_FILE","File: ");
define("_AM_NOMAINTEXT","ERROR: There is no Text/Html in your article! Article cannot be empty!");
define("_AM_DIR","Directory: ");
define("_AM_MISC","MISC Settings");

define("_AM_ISNOTWRITABLE2"," does not exist on the server! Please change this to a valid path! ");
define("_AM_CANNOTMODIFY"," Cannot modify this without giving a valid path! ");
define("_AM_PATH","Path: ");

define("_AM_CMODHEADER2","File Check");
define("_AM_ARTICLEMENU","Article Index Configuration");
define("_AM_APPROVE","Approve");
define("_AM_MOVETOTOP","Move this story to top");
define("_AM_CHANGEDATETIME","Change the date/time for publication");
define("_AM_NOWSETTIME","Publish date set for: %s"); // %s is datetime for publication
define("_AM_CURRENTTIME","Current time is: %s");  // %s is the current datetime
define("_AM_SETDATETIME","Set the date/time for publication");
define("_AM_MONTHC","Month:");
define("_AM_DAYC","Day:");
define("_AM_YEARC","Year:");
define("_AM_TIMEC","Time:");
define("_AM_AUTOAPPROVE","Auto approve submitted articles?");
define("_AM_DEFAULTTIME","Timestamp to be used for WF-Section:");
define("_AM_TURNOFFLINE","Hide WF-Section? (Only admin can access WF-Section)");
define("_AM_SHOWMARTICLES","Display Article column?");
define("_AM_SHOWMUPDATED","Display updated column?");
define("_AM_SHORTCATTITLE","Auto shorten category title?");
define("_AM_SHOWAUTHOR","Display Author name column?");
define("_AM_SHOWCOMMENTS2","Display comments count column?");
define("_AM_SHOWFILE","Display file count column?");
define("_AM_SHOWRATED","Display rated count column?");
define("_AM_SHOWVOTES","Display votes count column?");
define("_AM_SHOWPUBLISHED","Display published date column?");
define("_AM_SHOWHITS","Display hits count column?");
define("_AM_SHORTARTTITLE","Auto shorten article title?");
define("_AM_OFFLINE","<b>Hide Article</b> (Article status will be offline and not available to view.)");
define("_AM_BROKENREPORTS","Broken File Reports");
define("_AM_NOBROKEN","No reported broken files.");
define("_AM_IGNORE","Ignore");
define("_AM_FILEDELETED","File Deleted.");
define("_AM_BROKENDELETED","Broken file report deleted.");
define("_AM_IGNOREDESC","Ignore (Ignores the report and only deletes the <b>broken file report</b>)");
define("_AM_DELETEDESC","Delete (Deletes <b>the reported download data</b> and <b>broken file reports</b> for the file.)");
define("_AM_REPORTER","Report Sender");
define("_AM_FILETITLE","Download Title: ");
define("_AM_DLCONF","WF Section Downloads Configuration");
define("_AM_FILEDESCRIPT","Filename Description");
define("_AM_STATUS","Status");
define("_AM_UPLOAD","Upload");
define("_AM_NOTIFYPUBLISH","Email notification when published");
define("_AM_VIEWHTML","EditHTML");
define("_AM_VIEWWAYSIWIG","EditWYSIWYG");
define("_AM_CATEGORYT","Category");
define("_AM_ACCESS","Access");
define("_AM_PAGE","Page");
define("_AM_ARTICLEMANAGE","Article Management");
define("_AM_WEIGHTMANAGE","Weight Management");
define("_AM_UPLOADMAN","Upload Management");
define("_AM_NOADMINRIGHTS","Sorry, only the Webmaster can change WF-Section's configuration");
define("_AM_FILECount","File Count");
define("_AM_ALLARTICLES","List all Articles");
define("_AM_PUBLARTICLES","List Published Articles");
define("_AM_SUBLARTICLES","List Submitted Articles");
define("_AM_ONLINARTICLES","List Online Articles");
define("_AM_OFFLIARTICLES","List Offline Articles");
define("_AM_EXPIREDARTICLES","List Expired Articles");
define("_AM_AUTOEXPIREARTICLES","List Auto Expire Articles");
define("_AM_AUTOARTICLES","List Auto Publish Articles");
define("_AM_NOSHOWARTICLES","List No Show Articles");
define("_NOADMINRIGHTS2","Only the Webmaster can change this configuration setting");
define("_AM_CANNOTHAVECATTHERE","ERROR: This category cannot be a child of itself!!");
define("_AM_SECTIONMANAGE","Section Management");
define("_AM_SECTIONMANAGELINK","Section Management Links");
define("_AM_FILEID","File");
define("_AM_FILEICON","Icon");
define("_AM_FILESTORE","Stored As");
define("_AM_REALFILENAME","Real Name");
define("_AM_USERFILENAME","User Name");
define("_AM_FILEMIMETYPE","File Type");
define("_AM_FILESIZE","File Size");
define("_AM_FDCOUNTER","Counter");
define("_AM_EXPARTS","Expired Articles");
define("_AM_EXPIRED","Auto Expire Date");
define("_AM_CREATED","Created Date");
define("_AM_CHANGEEXPDATETIME","Change the date/time of expiration");
define("_AM_SETEXPDATETIME","Set the date/time of expiration");
define("_AM_NOWSETEXPTIME","Article Expiration date set for : %s");
define("_AM_ANONPOST","Allow anonymous users to post new articles?");
define("_AM_NOTIFYSUBMIT","Send e-mail to Webmaster upon new submission?");
define("_AM_SECTIONIMAGE","Main Index Image");
define("_AM_SECTIONHEAD","Main Index Header");
define("_AM_SECTIONFOOT","Main Index Footer");
define("_AM_SHOWVOTESINART","Allow users to vote for an article?");
define("_AM_SHOWREALNAME","Display user's real name for author name? (Will return username if real name not set)");
define("_AM_SHOWCATEGORYIMG","Display the above image in its section?");
define("_AM_EDITSERVERFILE","Edit Server file");
define("_AM_CURRENTFILENAME","Current Filename: ");
define("_AM_CURRENTFILESIZE","File size: ");
define("_AM_UPLOADFOLD","Upload Folder: ");
define("_AM_UPLOADPATH","Path: ");
define("_AM_FREEDISKSPACE","Free diskspace:");   
define("_AM_RENAMETHIS","Rename this file?");
define("_AM_RENAMEFILE","Rename file");
define("_AM_SHOWSUMMARY","Display Summary Column?"); 
define("_AM_SHOWICON","Display 'Popular and updated' icons?");
define("_AM_INDEXHEADING","Main Index Heading"); 
define("_AM_EXTERNALARTICLE","External Article </b> This will override Text editor and HTML File"); 

// added in WFS v1b6
define("_AM_POPULARITY", "Popularity");
define("_AM_ARTICLESSORT", "Articles sort order");
define("_AM_NAVTOOLTYPE", "Type of navigation tool");
define("_AM_SELECTBOX", "Select box");
define("_AM_SELECTSUBS", "Select box with sub-sections");
define("_AM_LINKEDPATH", "Linked path");
define("_AM_LINKSANDSELECT", "Links and select box");
define("_AM_NONE", "None");
define("_AM_CATEGORYWEIGHT", "Section Weight");
define("_AM_ARTICLEWEIGHT", "Article Weight");
define("_AM_WEIGHT", "Weight");
define('_AM_DUPLICATECATEGORY','Duplicate Section');
define('_AM_COPY', 'Copy');
define('_AM_TO', 'to');
define('_AM_NEWCATEGORYNAME', 'New section name');
define('_AM_DUPLICATE', 'Duplicate');
define('_AM_DUPLICATEWSUBS', 'Duplicate with sub-sections');
define('_AM_ALLOWEDMIMETYPES', 'Allowed Mimetypes');
define('_AM_MODIFYFILE', 'Modify Article File');
define('_AM_FILESTATS', 'Attached File Stats');
define('_AM_FILESTAT', 'File Stats for article: '); 
define('_AM_ERRORCHECK', 'File check'); 
define('_AM_LASTACCESS', 'Last Accessed'); 
define('_AM_DOWNLOADED', 'Times Downloaded'); 
define('_AM_DOWNLOADSIZE', 'Filesize');
define('_AM_UPLOADFILESIZE', 'MAX Filesize Upload (KB) 1048576 = 1 Meg');
define('_AM_FILEMODE', 'File Upload Permission setting');
define('_AM_IMGHEIGHT', 'MAX upload Image Height');
define('_AM_IMGWIDTH', 'MAX Upload Image Width');
define('_AM_FILEPERMISSION', 'File Permissions');  
define('_AM_IMGESIZETOBIG', 'Image height/width larger than permitted sizes');
define('_AM_CATREORDERTEXT', 'You can re-order all categories from here.<br />Main categories are in dark blue, sub-categories are in a lighter blue and then grey. Each section is listed by their weight.<br /><br />To re-order articles, click on a category title and a list of its articles will be shown.');  
define('_WFS_ATTACHFILE', 'Attach file');  
define('_WFS_ATTACHFILEACCESS', 'Access permission will be the same as the article.  You can change this when editing the attached file.');  
define('_AM_WFSFILESHOW', 'Attached Files');  
define('_AM_ATTACHEDFILE', 'Showing Files');  
define('_AM_ATTACHEDFILEM', 'Attached File Management'); 
define('_AM_UPOADMANAGE', 'File Management'); 
define('_AM_CAREORDER', 'Category and Article Weight');
define('_AM_CAREORDER2', 'Re-Order Categories');
define('_AM_CAREORDER3', 'Re-Order Articles');   

define('_AM_PICON', 'Display Article (page) icons?'); 
define('_AM_JUSTHTML', '<b> No Display info</b> (This option will stop WF-Section from displaying all info in the article. Just a plain html page or text.)');
define('_AM_NOSHOART', '<b> No Show Article</b> (Using this option will prevent this article from being shown in the main index listing. Instead this article will only be shown in the article link menu block</b>.)');
define('_AM_INDEXPAGECONFIG', 'Index Page Management');
define('_AM_INDEXPAGECONFIGTXT', 'This allows you to change parts of the main index page of WF-Section.<br /><br />You can easily change the image logo, heading, header and footer text.');
define('_AM_VISITSUPPORT', 'Visit the WF-section website for information, updates and help on its usage.<br /> WF-Sections v1 B6 &copy; 2003 <a href="http://wfsections.xoops2.com/" target="_blank">WF-Sections</a>');
define('_AM_REORDERID', 'ID'); 
define('_AM_REORDERPID', 'PID'); 
define('_AM_REORDERTITLE', 'Title');
define('_AM_REORDERDESCRIPT', 'Description');
define('_AM_REORDERWEIGHT', 'Weight');
define('_AM_REORDERSUMMARY', 'Summary');

?>