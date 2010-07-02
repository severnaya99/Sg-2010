<?php
// $Id: admin.php,v 1.2 2006/01/04 09:47:01 ohwada Exp $
// 2004/03/27 K.OHWADA
// error message
// _AM_DIR_NOT_WRITABLE
// _AM_EDIT_ARTICLE_RETURN
// copy mode
// _AM_COPY_ARTICLE_EXPLANE
// multi language in reorder.php
// _AM_CATEGORY_REORDERED
// _AM_ARTICLE_REORDERED
// _AM_CATEGORY_REORDER_RETURN

// 2004/02/28 K.OHWADA
// admin menu same as popup menu
// add _AM_PATH_MANAGEMENT _AM_LIST_BROKEN
// multi langauge
// add _AM_DUPLICATE_ARTICLES
// unify a article menu and a title

// 2003/11/21 K.OHWADA
// rename WFsection to XFsection
// add menu: bulk import

// admin menu same as popup menu
define("_AM_PREFERENCE",'Pr&eacute;f&eacute;rences');
define("_AM_PATH_MANAGEMENT","Gestion des R&eacute;pertoires");
define("_AM_LIST_BROKEN",'Liste des Liens Bris&eacute;s de T&eacute;l&eacute;chargement');

//%%%%%% Admin Module Name Articles %%%%%
define("_AM_DBUPDATED","Base de donn&eacute;es mise &agrave; jour avec succ&egrave;s !");
define("_AM_STORYID","N°");
define("_AM_TITLE","Titre");
define("_AM_SUMMARY","R&eacute;sum&eacute;");
define("_AM_CATEGORY","Nom de la Section"); //******
define("_AM_CATEGORY2","Modifier cette Cat&eacute;gorie :"); //******
define("_AM_POSTER","Auteur");
define("_AM_SUBMITTED2","Date de soumission");
define("_AM_NOSHOWART2","Pas d'affichage");
define("_AM_ACTION","Action");
define("_AM_EDIT","Editer");
define("_AM_DELETE","Supprimer");
define("_AM_LAST10ARTS","Articles publi&eacute;s");
define("_AM_PUBLISHED","Date de publication");
define("_AM_PUBLISHEDON","Publi&eacute; le");
define("_AM_GO","soumettre");
define("_AM_EDITARTICLE","Editer article");
define("_AM_POSTNEWARTICLE","Nouvel article");
define("_AM_RUSUREDEL","Etes-vous certain de vouloir supprimer cet article et tous les commentaires attach&eacute;s ?");
define("_AM_YES"," Oui");
define("_AM_NO"," Non");
define("_AM_ALLOWEDHTML","HTML autoris&eacute; :");
define("_AM_DISAMILEY","D&eacute;sactiver les smileys");
define("_AM_DISHTML","D&eacute;sactiver le HTML");
define("_AM_PREVIEW","Aperçu");
define("_AM_SAVE","Sauver");
define("_AM_ADD","Ajouter");
define("_AM_SMILIE","Ajouter des smiley &agrave; l'article");
define("_AM_EXGRAPHIC","Ajouter des graphiques externes &agrave; l'article");
define("_AM_GRAPHIC","Ajouter des graphiques locaux &agrave; l'article");
define("_AM_FILESHOWDESCRIPT","T&eacute;l&eacute;chargement de la description des fichiers"); //new
define("_AM_ARTICLEMANAGEMENT","Gestion des articles");
define("_AM_ARTICLEMANAGEMENTLINKS","Gestion des liens article");
define("_AM_ARTICLEPREVIEW","Aperçu article");
define("_AM_ADDMCATEGORY","Cr&eacute;er une nouvelle section");
define("_AM_CATEGORYNAME","Nom de la section");
define("_AM_CATEGORYTAKEMETO","Cliquer ici pour cr&eacute;er une nouvelle cat&eacute;gorie.");
define("_AM_NOCATEGORY","ERREUR - Pas de cat&eacute;gorie cr&eacute;&eacute;e.");
define("_AM_MAX40CHAR","(maxi : 40 caract&egrave;res)");
define("_AM_CATEGORYIMG","Image de la section");
define("_AM_IMGNAEXLOC","nom image + extension situ&eacute;e dans %s");
define("_AM_IN","<b>Cr&eacute;er dans la section</b><br> (Blanc : Section principale, sinon en tant que sous-section)");
define("_AM_MOVETO","<b>D&eacute;placer vers la section</b> (Blanc: Ne d&eacute;place pas la section)");
define("_AM_MODIFYCATEGORY","Modifier Section");
define("_AM_MODIFY","Modifier");
define("_AM_PARENTCATEGORY","Section parente");
define("_AM_SAVECHANGE","Enregistrer les changements");
define("_AM_DEL","Supprimer");
define("_AM_CANCEL","Annuler");
define("_AM_WAYSYWTDTTAL","ATTENTION : Etes-vous certain de vouloir supprimer cette section et tous les articles et commentaires associ&eacute;s ?");
// Added in Beta6
define("_AM_CATEGORYSMNGR","Gestion des sections");
define("_AM_PEARTICLES","Cr&eacute;er un Article");
define("_AM_GENERALCONF","Configuration G&eacute;n&eacute;rale");

// WFSECTION
define("_AM_UPDATEFAIL","Echec de la mise &agrave; jour.");
define("_AM_EDITFILE","Editer le fichier attach&eacute;");
define("_AM_CATEGORYDESC","Description cat&eacute;gorie");
define("_AM_FILESBASEPATH","D&eacute;finir le r&eacute;pertoire pour les fichiers attach&eacute;s :");
define("_AM_AGRAPHICPATH","D&eacute;finir le r&eacute;pertoire pour les graphiques/images des 'Articles' :");
define("_AM_SGRAPHICPATH","D&eacute;finir le r&eacute;pertoire pour les graphiques/images des 'Sections' :");
define("_AM_SMILIECPATH","D&eacute;finir le r&eacute;pertoire pour les Smileys :");
define("_AM_HTMLCPATH","D&eacute;finir le r&eacute;pertoire pour les fichiers HTML :");
define("_AM_FILEUPLOADSPATH","Fichiers attach&eacute;s : ");
define("_AM_FILEUPLOADSTEMPPATH","Temp attach&eacute; : ");
define("_AM_ARTICLESFILEPATH","Images des Articles : ");
define("_AM_SECTIONFILEPATH","Images des Sections : ");
define("_AM_SMILIEFILEPATH","Images 'Smiley' : ");
define("_AM_HTMLFILEPATH","Fichiers HTML : ");
define("_AM_UPLOADCONFIGFILE","mise &agrave; jour du fichier de configuration : ");
define("_AM_ARTICLESAPAGE","Nombre d'articles par page :");
define("_AM_ARTICLESAPAGE2","Nombre d'articles &agrave; afficher sur chaque page avant que la boite de navigation soit affich&eacute;e :");
define("_AM_NOIMG","Pas d'image");
define("_AM_PIDINVALID","La section parente est invalide.");
define("_AM_NOTITLE","Il n'y a pas de titre. (Champ obligatoire).");
define("_AM_FILEDEL","ATTENTION : Etes-vous certain de vouloir supprimer ce fichier ?");
define("_AM_AFERTSETCATE","Apr&egrave;s avoir ajout&eacute; des Sections vous pourrez ajouter des articles.");
define("_AM_IMGUPLOAD","Envoyer l'image de la section");
define("_AM_IMGUPLOAD2","le dossier actuel des images est ");
define("_AM_IMGNAME","Nom du fichier (Blanc : m&ecirc;me nom que le fichier original)");
define("_AM_UPLOADED","Envoy&eacute; !");
define("_AM_ISNOTWRITABLE","est en lecture seule !");
define("_AM_UPLOADFAIL","ATTENTION : &eacute;chec de l'envoi. Cause : ");
define("_AM_NOTALLOWEDMINETYPE","Vous n'avez pas le droit d'envoyer ce type de fichier.");
define("_AM_FILETOOBIG","La taille du fichier est plus grande que la taille autoris&eacute;e !");

define("_AM_CATEGORYMENU","Configuration des Sections");
define("_AM_ARTICLE2MENU","Configuration des Articles");
define("_AM_ARTICLEPAGEMENU","Page de configuration des Articles");
define("_AM_BLOCKMENU","Configuration des Blocs");
define("_AM_ADMINEDITMENU","Configuration g&eacute;n&eacute;rale des Articles");
define("_AM_ADMINCONFIGMENU","Configuration de l'administration");

define("_AM_ARTIMGUPLOAD","Envoi Image");
define("_AM_TOPPAGETYPE","Afficher les liens vers les articles au lieu du compteur ?");
define("_AM_SHOWCATPIC","Afficher l'image des sections dans l'index des cat&eacute;gories ?");
define("_AM_WYSIWYG","Utiliser l'&eacute;diteur WYSIWYG plut&ocirc;t que l'&eacute;diteur de Xoops ?");
define("_AM_SHOWCOMMENTS","Afficher les commentaires des utilisateurs sur la page des articles ?");
define("_AM_SUBMITTED","Articles soumis par l'utilisateur"); //added

//define("_AM_ALLTXT","<h4>Gestion des Articles</h4></div><div>With <b>Gestion des Articles</b> Vous pouvez &eacute;diter, supprimer ou renommer les articles. Ce mode montrera chaque article de la base de donn&eacute;es..<br /><br />"); //added
// WF -> XF
//define("_AM_PUBLISHEDTXT","<h4>Gestion des Articles Publi&eacute;s</h4></div><div><b>Gestion des Articles Publi&eacute;s</b> Montrera tous les articles publi&eacute;s (Approuv&eacute;s par le Webmestre).<br /><br />Ce sont tous les articles qui seront montr&eacute;s dans la liste de cat&eacute;gorie de la page d'index de XF-Section (y compris ceux control&eacute;s par des groupes d'acc&egrave;s).<br /><br />"); //added
//define("_AM_SUBMITTEDTXT","<h4>Gestion de la soumission d'Article</h4></div><div>Montrera tous les articles soumis par les utilisateurs et vous permettra de les mod&eacute;rer.<br /><br />Pour approuver un article, Cliquer sur le lien <b>Editer</b>, ensuite cocher la case <b>Approuver</b> et sauver l'article. L'article sera ainsi publi&eacute;.<br /><br />"); //added
//define("_AM_ONLINETXT","<h4>Gestion des Articles publi&eacute;s</h4></div><div>Montrera tous les articles d&eacute;finis &agrave; 'publi&eacute;'.<br /><br />Pour changer le statut d'un article, cliquer sur le lien <b>Editer</b> et cocher la case <b>publi&eacute;</b> off/on.<br /><br />"); //added
//define("_AM_OFFLINETXT","<h4>Gestion des Articles non publi&eacute;s</h4></div><div>Montrera les articles dont le statut est <b>non publi&eacute;</b>.<br /><br />Pour changer le statut d'un article, cliquer sur le lien <b>Editer</b> et cocher la case <b>publi&eacute;</b> off/on.<br /><br />"); //added
//define("_AM_EXPIREDTXT","<h4>Gestion de l'expiration des articles</h4></div><div>Montrera les articles qui sont arriv&eacute;s &agrave; expiration.<br /><br />Vous pouvez changer la date d'expiration en cliquant sur le lien <b>Editer</b> et en changeant le r&egrave;glage <b>d&eacute;finition de la date et heure d'expiration</b>.<br /><br />"); //added
//define("_AM_AUTOEXPIRETXT","<h4>Gestion de l'auto-expiration des Articles</h4></div><div>Montrera tous les articles ou la date d'expiration est d&eacute;finie &agrave; une certaine date.<br /><br />Vous pouvez changer la date d'expiration en cliquant sur le lien <b>Editer</b> et en changeant le r&egrave;glage <b>d&eacute;finition de la date et heure d'expiration</b>.<br /><br />"); //added
//define("_AM_AUTOTXT","<h4>Gestion de l'Auto-publication des Articles</h4></div><div>Montrera tous les articles qui ont &eacute;t&eacute; d&eacute;fini pour une publication &agrave; une date future.<br /><br />Vous pouvez changer la date d'expiration en cliquant sur le lien <b>Editer</b> et en changeant le r&egrave;glage 'D&eacute;finition de la date/heure de publication'.<br /><br />"); //added
//define("_AM_NOSHOWTXT","<h4>Article cach&eacute;</h4></div><div>Il existe un type sp&eacute;cial d'article, &agrave; la diff&eacute;rence de vos articles normaux ceux-ci n'appara&icirc;tront pas en page d'index d'article et ne seront pas visibles.&nbsp;&nbsp; Au lieu de cela , ces articles ne seront visibles que dans le bloc `XF-Section Menu block`.<br /><br />En utilisant cette option avec les pages HTML et le `Ne pas afficher d'info` (Option sur la page d'&eacute;dition des articles) vous pouvez afficher juste ce que vous d&eacute;sirez. &nbsp;&nbsp;Un exemple serait une page de 'note priv&eacute;e' etc.<br /><br />Toutes les autres options de gestion des articles fonctionnent c'est &agrave; dire publi&eacute;s, expir&eacute;s, en ligne / hors ligne.<br /><br />"); //added

// unify a article menu and a title
define("_AM_ALLTXT","With <b>Gestion des Articles</b> Vous pouvez &eacute;diter, supprimer ou renommer les articles. Ce mode montrera chaque article de la base de donn&eacute;es..<br /><br />"); //added
define("_AM_PUBLISHEDTXT","<b>Gestion des Articles Publi&eacute;s</b> Montrera tous les articles publi&eacute;s (Approuv&eacute;s par le Webmestre).<br /><br />Ce sont tous les articles qui seront montr&eacute;s dans la liste de cat&eacute;gorie de la page d'index de XF-Section (y compris ceux control&eacute;s par des groupes d'acc&eacute;s).<br /><br />"); //added
define("_AM_SUBMITTEDTXT","<b>Gestion de la soumission d'Article</b> Montrera tous les articles soumis par les utilisateurs et vous permettra de les mod&eacute;rer.<br /><br />Pour approuver un article, Cliquer sur le lien <b>Editer</b>, ensuite cocher la case <b>Approuver</b> et sauver l'article. L'article sera ainsi publi&eacute;.<br /><br />"); //added
define("_AM_ONLINETXT","<b>Gestion des Articles publi&eacute;s</b> Montrera tous les articles d&eacute;finis &agrave; 'publi&eacute;'.<br /><br />Pour changer le statut d'un article, cliquer sur le lien <b>Editer</b> et cocher la case <b>publi&eacute;</b> off/on.<br /><br />"); //added
define("_AM_OFFLINETXT","<b>Gestion des Articles non publi&eacute;s</b> Montrera les articles dont le statut est <b>non publi&eacute;</b>.<br /><br />Pour changer le statut d'un article, cliquer sur le lien <b>Editer</b> et cocher la case <b>publi&eacute;</b> off/on.<br /><br />"); //added
define("_AM_EXPIREDTXT","<b>Gestion de l'expiration des articles</b> Montrera les articles qui sont arriv&eacute;s &agrave; expiration.<br /><br />Vous pouvez changer la date d'expiration en cliquant sur le lien <b>Editer</b> et en changeant le r&eacute;glage <b>d&eacute;finition de la date et heure d'expiration</b> Param&ecirc;tres.<br /><br />"); //added
define("_AM_AUTOEXPIRETXT","<div><b>Gestion de l'auto-expiration des Articles</b> Montrera tous les articles ou la date d'expiration est d&eacute;finie &agrave; une certaine date.<br /><br />Vous pouvez changer la date d'expiration en cliquant sur le lien <b>Editer</b> et en changeant le r&eacute;glage <b>d&eacute;finition de la date et heure d'expiration</b> Param&ecirc;tres.<br /><br />"); //added
define("_AM_AUTOTXT","<b>Gestion de l'Auto-publication des Articles</b> Montrera tous les articles qui ont &eacute;t&eacute; d&eacute;finis pour une publication &agrave; une date future.<br /><br />Vous pouvez changer la date d'expiration en cliquant sur le lien <b>Editer</b> et en changeant le r&eacute;glage 'D&eacute;finition de la date/heure de publication' Param&ecirc;tres.<br /><br />"); //added
define("_AM_NOSHOWTXT","<b>Article cach&eacute;</b> Il existe un type sp&eacute;cial d'article, &agrave; la diff&eacute;rence de vos articles normaux ceux-ci n'appara&icirc;tront pas en page d'index d'article et ne seront pas visibles.&nbsp;&nbsp; Au lieu de cela , ces articles ne seront visibles que dans le bloc `XF-Section Menu block`.<br /><br />En utilisant cette option avec les pages HTML et le `Ne pas afficher d'info` (Option sur la page d'&eacute;dition des articles) vous pouvez afficher juste ce que vous d&eacute;sirez. &nbsp;&nbsp;Un exemple serait une page de 'note priv&eacute;e' etc.<br /><br />Toutes les autres options de gestion des articles fonctionnent c'est &agrave; dire publi&eacute;s, expir&eacute;s, en ligne / hors ligne.<br /><br />"); //added

define("_AM_BLOCKCONF","Configuration des Blocs");
define("_AM_TITLE1","Nom du bloc menu principal :");
define("_AM_TITLE4","Nom du bloc articles r&eacute;cents :");
define("_AM_TITLE5","Nom du bloc '&agrave; la une' :");
define("_AM_ORDER","Alternative au texte 'Ordre' :");
define("_AM_DATE","Alternative au texte 'Date' :");
define("_AM_HITS","Alternative au texte 'visites' :");
define("_AM_DISP","Alternative au texte 'Affichage' :");
define("_AM_ARTCLS","Nom du bloc des Articles");
define("_AM_MENU_LINKS","<b>Menu de gestion des liens</b>");
define("_AM_BAN","Bannir Utilisateur");
//New to version 0.9.2
define("_AM_CMODHEADER","Teste les permissions du fichier");

// WF -> XF
define("_AM_CMODERRORINFO","Teste les r&eacute;pertoires et fichier (pas de lecture seule).<br/><br/>Xf-Section va tenter de changer les droits sur les fichiers et r&eacute;pertoires ci-dessous. Si les droits sont incorrects un message d'erreur sera affich&eacute;.");

define("_AM_FILEPATH","Configuration Images et Envois");

// WF -> XF
define("_AM_FILEPATHWARNING","D&eacute;finit le chemin pour les r&eacute;pertoires, XF-Section vous pr&eacute;viendra si le chemin entr&eacute; est incorrect.<br/><br/>Laisser &agrave; blanc et XF-Section utilisera le chemin par d&eacute;faut/s.<br/><br/>");

define("_AM_FILEUSEPATH","Changer chemin utilisateur");
define("_AM_PATHEXIST","Le chemin existe !");
define("_AM_PATHNOTEXIST","Le chemin n'existe pas ! Merci de v&eacute;rifier !");
define("_AM_USERPATH","Chemin d&eacute;fini pour l'utilisateur");
define("_AM_SHOWSELIMAGE","Afficher l'image actuellement s&eacute;lectionn&eacute;e : "); //******* Updated *******
define("_AM_SHOWSUBMENU","Afficher les sous-menus pour chaque cat&eacute;gorie ?");
define("_AM_MENUS","Index principal de la configuration");
define("_AM_DEFAULTPATH","Chemin par d&eacute;faut utilis&eacute;");
define("_AM_SCROLLINGBLOCK","Utiliser le d&eacute;filement automatique dans le bloc des articles r&eacute;cents ? (Obsolete dans cette version !)");
define("_AM_BLOCKHEIGHT","D&eacute;finir la hauteur du d&eacute;filement de bloc ?");
define("_AM_DEFAULT"," D&eacute;faut");
define("_AM_BLOCKAMOUNT","Nombre de lignes &agrave; faire d&eacute;filer ?");
define("_AM_BLOCKDELAY","D&eacute;lai de d&eacute;filement par ligne");
define("_AM_LASTART","Nombre de nouveaux articles &agrave; afficher dans l'administration : ");
define("_AM_NUMUPLOADS","Nombre de fichiers qu'il est possible d'envoyer en une fois ?");

// WF -> XF
define("_AM_WEBMASTONLY","N'autoriser que les Webmestres &agrave; modifier la configuration du module XF-Section ?");

define("_AM_DEFAULTS","Remettre tous les param&egrave;tres &agrave; leur valeur par d&eacute;faut?");

define("_AM_NOCMODERROR","( correct )");
define("_AM_CMODERROR","( Permissions incorrectes ou r&eacute;pertoire inexistant ! )");

// WF -> XF
define("_AM_REVERTED","Configuration par d&eacute;faut de XF-Section restaur&eacute;e");

define("_AM_GROUPPROMPT","Donne l'acc&egrave;s aux groupes suivants :");
define("_AM_NOVIEWPERMISSION","D&eacute;sol&eacute; ! Vous n'avez pas la permission de voir cette zone.");
define("_AM_FILE","Fichier : ");
define("_AM_NOMAINTEXT","ERREUR : il n'y a pas de Texte/Html dans votre article ! un Article ne peut pas &ecirc;tre vide !");
define("_AM_DIR","R&eacute;pertoire : ");
define("_AM_MISC","R&eacute;glages divers");

define("_AM_ISNOTWRITABLE2"," n'existe pas sur le serveur ! Merci de donner un chemin valide ! ");
define("_AM_CANNOTMODIFY"," Impossible de modifier sans donner un chemin valide ! ");
define("_AM_PATH","Chemin : ");

define("_AM_CMODHEADER2","Test Fichier");
define("_AM_ARTICLEMENU","Configuration des Articles");
define("_AM_APPROVE","Approuver");
define("_AM_MOVETOTOP","D&eacute;placer cet article &agrave; la une");
define("_AM_CHANGEDATETIME","Changer la date et l'heure de la publication");
define("_AM_NOWSETTIME","Date de publication d&eacute;finie au : %s"); // %s is datetime for publication
define("_AM_CURRENTTIME","L'heure actuelle est : %s"); // %s is the current datetime
define("_AM_SETDATETIME","D&eacute;finir la date et l'heure pour la publication");
define("_AM_MONTHC","Mois :");
define("_AM_DAYC","Jour :");
define("_AM_YEARC","Ann&eacute;e :");
define("_AM_TIMEC","Heure :");
define("_AM_AUTOAPPROVE","Approuver automatiquement les articles soumis ?");

// WF -> XF
define("_AM_DEFAULTTIME","Format de dates utilis&eacute; par le module :");
define("_AM_TURNOFFLINE","Cacher XF-Section? (Seuls les admin peuvent acc&eacute;der &agrave; XF-Section)");

define("_AM_SHOWMARTICLES","Afficher la colonne 'article' ?");
define("_AM_SHOWMUPDATED","Afficher la colonne 'mise &agrave; jour' ?");
define("_AM_SHORTCATTITLE","Auto r&eacute;duction du titre des cat&eacute;gories ?");
define("_AM_SHOWAUTHOR","Afficher la colonne 'Nom de l'auteur' ?");
define("_AM_SHOWCOMMENTS2","Afficher la colonne 'nombre de commentaires' ?");
define("_AM_SHOWFILE","Afficher la colonne 'nombre de fichiers' ?");
define("_AM_SHOWRATED","Afficher la colonne '&eacute;valuation' ?");
define("_AM_SHOWVOTES","Afficher la colonne 'nombre de votes' ?");
define("_AM_SHOWPUBLISHED","Afficher la colonne 'date de publication' ?");
define("_AM_SHOWHITS","Afficher la colonne 'Nombre de visites' ?");
define("_AM_SHORTARTTITLE","Auto r&eacute;duction du titre des articles ?");
define("_AM_OFFLINE","<b>Cacher Articles</b> (statut des Articles 'hors ligne' ou cach&eacute;.)");
define("_AM_BROKENREPORTS","Rapport de fichier bris&eacute;");
define("_AM_NOBROKEN","Pas de rapport de fichiers bris&eacute;.");
define("_AM_IGNORE","Ignorer");
define("_AM_FILEDELETED","Fichier supprim&eacute;.");
define("_AM_BROKENDELETED","Rapport de fichier bris&eacute; effac&eacute;.");
define("_AM_IGNOREDESC","Ignorer (supprimer le rapport seulement)");
define("_AM_DELETEDESC","Supprimer (Supprime <b>les donn&eacute;es du fichier &agrave; t&eacute;l&eacute;charger rapport&eacute;</b> et <b>le rapport du fichier bris&eacute;</b> pour le fichier.)");
define("_AM_REPORTER","Exp&eacute;diteur du rapport");
define("_AM_FILETITLE","Titre du t&eacute;l&eacute;chargement : ");
// WF -> XF
define("_AM_DLCONF","Configuration des t&eacute;l&eacute;chargements");

define("_AM_FILEDESCRIPT","Description du nom de fichier");
define("_AM_STATUS","Statut");
define("_AM_UPLOAD","Envoi");
define("_AM_NOTIFYPUBLISH","Notification par Email lors de la publication");
define("_AM_VIEWHTML","HTML");
define("_AM_VIEWWAYSIWIG","WYSIWYG");
define("_AM_CATEGORYT","Cat&eacute;gorie");
define("_AM_ACCESS","Acc&egrave;s");
define("_AM_PAGE","Page");
define("_AM_ARTICLEMANAGE","Gestion des Articles");
define("_AM_WEIGHTMANAGE","Gestion ordre d'affichage");
define("_AM_UPLOADMAN","Gestionnaire de fichiers");

// WF -> XF
define("_AM_NOADMINRIGHTS","D&eacute;sol&eacute;, seuls les Webmestres peuvent changer la configuration de XF-Section");

define("_AM_FILECount","Nombre de fichiers");
define("_AM_ALLARTICLES","Lister tous les Articles");
define("_AM_PUBLARTICLES","Lister les Articles publi&eacute;s");
define("_AM_SUBLARTICLES","Lister les Articles soumis");
define("_AM_ONLINARTICLES","Lister les Articles 'en ligne'");
define("_AM_OFFLIARTICLES","Lister les Articles 'hors ligne'");
define("_AM_EXPIREDARTICLES","Lister les Articles expir&eacute;s");
define("_AM_AUTOEXPIREARTICLES","Lister les article en Auto-expiration");
define("_AM_AUTOARTICLES","Lister les articles Auto-publi&eacute;s");
define("_AM_NOSHOWARTICLES","Lister les articles cach&eacute;s");
define("_NOADMINRIGHTS2","Seuls les Webmasters peuvent changer ce param&egrave;tre de configuration");
define("_AM_CANNOTHAVECATTHERE","ERREUR : Cette cat&eacute;gorie ne peut &ecirc;tre fille d'elle-m&ecirc;me !!!");
define("_AM_SECTIONMANAGE","Gestion des Sections");
define("_AM_SECTIONMANAGELINK","Gestion des liens des Sections");
define("_AM_FILEID","Fichier");
define("_AM_FILEICON","Icone");
define("_AM_FILESTORE","Stock&eacute; en tant que");
define("_AM_REALFILENAME","Nom r&eacute;el");
define("_AM_USERFILENAME","Nom utilisateur");
define("_AM_FILEMIMETYPE","Type de fichier");
define("_AM_FILESIZE","Taille du fichier");
define("_AM_FDCOUNTER","Compteur");
define("_AM_EXPARTS","Articles expir&eacute;s");
define("_AM_EXPIRED","Date d'Auto-expiration");
define("_AM_CREATED","Date de cr&eacute;ation");
define("_AM_CHANGEEXPDATETIME","Changer la date et l'heure d'expiration");
define("_AM_SETEXPDATETIME","D&eacute;finir la date et l'heure d'expiration");
define("_AM_NOWSETEXPTIME","Date d'expiration de l'Article d&eacute;finie au : %s");
define("_AM_ANONPOST","Autoriser les utilisateurs anonymes &agrave; poster de nouveaux articles ?");
define("_AM_NOTIFYSUBMIT","Envoyer un e-mail au Webmestre &agrave; chaque nouvelle soumission ?");
define("_AM_SECTIONIMAGE","Index principal Image");
define("_AM_SECTIONHEAD","Index principal En-t&ecirc;te");
define("_AM_SECTIONFOOT","Index principal Pied de Page");
define("_AM_SHOWVOTESINART","Autoriser les utilisateurs &agrave; voter pour un article ?");
define("_AM_SHOWREALNAME","Afficher le nom r&eacute;el des utilisateurs comme nom d'auteur ? (retournera le surnom si le nom n'est pas renseign&eacute;)");
define("_AM_SHOWCATEGORYIMG","Afficher l'image de la section ?");
define("_AM_EDITSERVERFILE","Editer le fichier Serveur");
define("_AM_CURRENTFILENAME","Nom actuel du fichier : ");
define("_AM_CURRENTFILESIZE","Taille du fichier : ");
define("_AM_UPLOADFOLD","Envoi dossier : ");
define("_AM_UPLOADPATH","Chemin : ");
define("_AM_FREEDISKSPACE","Espace disque disponible :");
define("_AM_RENAMETHIS","Renommer ce fichier ?");
define("_AM_RENAMEFILE","Renomme fichier");
define("_AM_SHOWSUMMARY","Afficher la colonne de r&eacute;sum&eacute; ?");
define("_AM_SHOWICON","Afficher les icones 'Populaire' et 'mis &agrave; jour' ?");
define("_AM_INDEXHEADING","En-t&ecirc;te index principal");
define("_AM_EXTERNALARTICLE","Article Externe </b> Cela va remplacer le contenu de l'&eacute;diteur de texte et le fichier HTML");

// added in WFS v1b6
define("_AM_POPULARITY", "Popularit&eacute;");
define("_AM_ARTICLESSORT", "Ordre de tri des articles");
define("_AM_NAVTOOLTYPE", "Type d'outil de navigation");
define("_AM_SELECTBOX", "Boite de s&eacute;lection");
define("_AM_SELECTSUBS", "Boite de s&eacute;lection AVEC sous-sections");
define("_AM_LINKEDPATH", "Chemin li&eacute;");
define("_AM_LINKSANDSELECT", "Liens et boite de s&eacute;lection");
define("_AM_NONE", "Aucun");
define("_AM_CATEGORYWEIGHT", "Poids de la section");
define("_AM_ARTICLEWEIGHT", "Poids de l'article");
define("_AM_WEIGHT", "Poids");
define("_AM_DUPLICATECATEGORY","Dupliquer la section");

// add
define('_AM_DUPLICATE_ARTICLES','Dupliquer &eacute;galement les articles');
define("_AM_COPY", "Copier");
define("_AM_TO", "vers");
define("_AM_NEWCATEGORYNAME", "Nouveau nom de section");
define("_AM_DUPLICATE", "Dupliquer");
define("_AM_DUPLICATEWSUBS", "Dupliquer avec ses sous-sections");
define("_AM_ALLOWEDMIMETYPES", "Types Mime autoris&eacute;s");
define("_AM_MODIFYFILE", "Modifier le fichier Article");
define("_AM_FILESTATS", "fichier stats attach&eacute;");
define("_AM_FILESTAT", "Fichier Stats pour les articles : ");
define("_AM_ERRORCHECK", "Teste fichier");
define("_AM_LASTACCESS", "Dernier Acc&egrave;s");
define("_AM_DOWNLOADED", "T&eacute;l&eacute;charg&eacute;");
define("_AM_DOWNLOADSIZE", "Taille du fichier");
define("_AM_UPLOADFILESIZE", "Taille maximale des envois en Ko (1048576 = 1 M&eacute;ga)");
define("_AM_FILEMODE", "D&eacute;finir les permissions d'envoi de fichier");
define("_AM_IMGHEIGHT", "Hauteur maximale des images envoy&eacute;es");
define("_AM_IMGWIDTH", "Largeur maximale des images envoy&eacute;es");
define("_AM_FILEPERMISSION", "Permissions du fichier");
define("_AM_IMGESIZETOBIG", "Largeur / Hauteur de l'image sup&eacute;rieure au maxi autoris&eacute;");

define("_AM_CATREORDERTEXT", "Vous pouvez r&eacute;-ordonner toutes les cat&eacute;gories depuis cette page.<br />Les cat&eacute;gories principales sont en bleu fonc&eacute;, les sous-cat&eacute;gories sont en bleu plus clair et ensuite en gris. Chaque section est list&eacute;e par son poids.<br /><br />Pour r&eacute;-ordonner les articles, cliquer sur le titre d'une cat&eacute;gorie et la liste de ses articles sera affich&eacute;e.");
define("_WFS_ATTACHFILE", "Attacher fichier");
define("_WFS_ATTACHFILEACCESS", "Les permissions d'acc&egrave;s sont les m&ecirc;me que les articles. Vous pouvez les changer en &eacute;ditant le fichier attach&eacute;.");
define("_AM_WFSFILESHOW", "Fichiers Attach&eacute;s");
define("_AM_ATTACHEDFILE", "Afficher les fichiers");
define("_AM_ATTACHEDFILEM", "Gestion des fichiers attach&eacute;s");
define("_AM_UPOADMANAGE", "Gestion des envois");
define("_AM_CAREORDER", "Poids des Cat&eacute;gories et des Articles");
define("_AM_CAREORDER2", "R&eacute;-Ordonner les Cat&eacute;gories");
define("_AM_CAREORDER3", "R&eacute;-Ordonner les Articles");

define("_AM_PICON", "Afficher les icones d'article (page) ?"); 

// WF -> XF
define("_AM_JUSTHTML", "<b> Pas d'affichage d'information</b> (Cette option emp&ecirc;chera l'affichage des infos des articles. Juste une page de texte ou page HTML.)");

define("_AM_NOSHOART", "<b> Pas d'affichage des articles</b> (Utiliser cette option emp&ecirc;chera cet article d'&ecirc;tre affich&eacute; dans l'index principal. Au lieu de cela cet article sera seulement affich&eacute; dans le bloc de liens des articles</b>.)");
define("_AM_INDEXPAGECONFIG", "Gestion de la Page Index");

// WF -> XF
define("_AM_INDEXPAGECONFIGTXT","Cela vous permet de changer une partie de la page d'index principale.<br /><br />Vous pouvez facilement changer le logo, l'en-t&ecirc;te, le texte de pied de page.");
//define("_AM_VISITSUPPORT", "Visitez le site web de WF-section pour des informations, mises &agrave; jour et aide.<br /> WF-Sections v1 B6 &copy; 2003 <a href=\"http://wfsections.xoops2.com/\" target=\"_blank\">WF-Sections</a>");
define("_AM_VISITSUPPORT", "");

define("_AM_REORDERID", "N°");
define("_AM_REORDERPID", "PID");
define("_AM_REORDERTITLE", "Titre");
define("_AM_REORDERDESCRIPT", "Description");
define("_AM_REORDERWEIGHT", "Poids");
define("_AM_REORDERSUMMARY", "R&eacute;sum&eacute;");

// index.php
define("_AM_DIR_NOT_WRITABLE","Le R&eacute;pertoire n'est pas Autoris&eacute; en Ecriture");
define("_AM_EDIT_ARTICLE_RETURN","Retourner &agrave; l'Edition de l'Article");

// copy mode in index.php
define("_AM_COPY_ARTICLE_EXPLANE","Copier L'Article. L'Article Original est laiss&eacute;. Les Fichiers attach&eacute;s ne sont pas copi&eacute;s.");

// multi language in reorder.php
define("_AM_CATEGORY_REORDERED","Les Cat&eacute;gories ont &eacute;t&agrave; R&eacute;ordonn&eacute;es!");
define("_AM_ARTICLE_REORDERED","Les Articles ont &eacute;t&eacute; R&eacute;ordonn&eacute;s!");
define("_AM_CATEGORY_REORDER_RETURN","Retourner au r&eacute;-ordonnancement des cat&eacute;gories");

// *** add menu: bulk import ***
define("_AM_IMPORT", "Importer un Fichier HTML");
define("_AM_IMPORT_DIRNAME", "Nom de R&eacute;pertoire ou de Fichier");
define("_AM_IMPORT_HTMLPROC", "Traitement des Fichiers HTML");
define("_AM_IMPORT_EXTFILTER", "Nom du Programme de Filtre Externe");

define("_AM_IMPORT_BODY", "Seul le Corps du Texte est extrait");
define("_AM_IMPORT_INDEXHTML", "Effacer un lien dans index.html, existe dans le m&ecirc;me r&eacute;pertoire ou dans un r&eacute;pertoire sup&eacute;rieur.");
define("_AM_IMPORT_LINK", "Changer un lien pour un titre = nom de fichier");
define("_AM_IMPORT_IMAGE", "Changer le lien d'un fichier d'image dans le r&eacute;pertoire des images. ");
define("_AM_IMPORT_ATMARK", "change @ to &amp;#064;");
define("_AM_IMPORT_TEXTPROC", "Traitement des Fichiers Texte");
define("_AM_IMPORT_TEXTPRE", "Surligner le Fichier Texte par &lt;pre&gt; &lt;/pre&gt;");
define("_AM_IMPORT_IMAGEPROC", "Traitement des Fichiers d'Images");
define("_AM_IMPORT_IMAGEDIR", "Nom du R&eacute;pertoire de l'Image");
define("_AM_IMPORT_IMAGECOPY", "Copier des Fichiers d'Images dans un R&eacute;pertoire d'Image.");
define("_AM_IMPORT_TESTMODE", "Mode Test");
define("_AM_IMPORT_TESTDB", "Pas enregistr&eacute; dans la BD. D&eacute;cochez quand vous enregistrez. ");
define("_AM_IMPORT_TESTEXEC", "Test");
define("_AM_IMPORT_TESTTEXT", "Affichage Texte");
define("_AM_IMPORT_EXPLANE", "Un jugement sur le type de fichier est effectu&eacute; &agrave; partir de l'extension.<br>Un fichier HTML a l'extension html ou htm.<br>Un fichier Texte a l'extension txt.<br>Un fichier Image a l'extension gif, jpg, jpeg, ou png.<br>");
define("_AM_IMPORT_ERRDIREXI", "Le r&eacute;pertoire ou le fichier n'existe pas");
define("_AM_IMPORT_ERRFILEXI", "Le programme filtre n'existe pas");
define("_AM_IMPORT_ERRFILEXEC", "Le programme filtre n'ewst pas ex&eacute;cutable");
define("_AM_IMPORT_ERRNOCOPY", "Pas de sp&eacute;cification de la copie image");
define("_AM_IMPORT_ERRNOIMGDIR", "Pas de sp&eacute;cification du r&eacute;pertoire image");
define("_AM_IMPORT_ERRIMGDIREXI", "Le r&eacute;pertoire image sp&eacute;cifi&eacute; n'est pas un r&eacute;pertoire");
define("_AM_IMPORT_ERRFILEEXI", "Le fichier n'existe pas");

?>