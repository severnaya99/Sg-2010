<?php
// $Id: main.php,v 1.2 2006/01/04 09:47:02 ohwada Exp $
// 2004/03/27 K.OHWADA
// add submit modify

// 2004/01/29 herve 
// multi language
// add _WFS_ERROR_IMAGE

// 2003/11/21 K.OHWADA
// view and edit for pure html file
// add _WFS_DISBR, _WFS_ENAAMP
// article.php
// _WFS_ARTCLE_MORE

//%%%%%%
define("_WFS_PRINTER","Version imprimable");
define("_WFS_COMMENTS","Commentaires ?");
define("_WFS_PREVPAGE","Page pr&eacute;c&eacute;dente");
define("_WFS_NEXTPAGE","Page suivante");
//define("_WFS_RETURNTOP","<< Retourner au d&eacute;but");

//%%%%%%

define("_WFS_TOP","Top");
define("_WFS_POSTERC","Auteur :");
define("_WFS_DATEC","Date:");
define("_WFS_EDITNOTALLOWED","Vous n'avez pas le droit d'&eacute;diter ce commentaire !");
define("_WFS_ANONNOTALLOWED","Les Anonymes ne sont pas autoris&eacute;s &agrave; poster.");
define("_WFS_THANKSFORPOST","Merci de votre soumission !"); //submission of news comments
define("_WFS_DELNOTALLOWED","Vous n'&ecirc;tes pas autoris&eacute; &agrave; supprimer ce commentaire !");
define("_WFS_AREUSUREDEL","Etes vous certain de vouloir supprimer ce commentaire et ceux qui lui sont attach&eacute;s ?");
define("_WFS_YES","Oui");
define("_WFS_NO","Non");
define("_PL_COMMENTSDEL","Commentaire(s) supprim&eacute;(s) !");

//%%%%%%

define("_WFS_TITLE","Titre");
define("_WFS_CATEGORY","Section");
define("_WFS_HTMLISFINE","le HTML est autoris&eacute;, mais v&eacute;rifiez les URLs et les tags HTML !");
define("_WFS_ALLOWEDHTML","HTML autoris&eacute; :");
define("_WFS_DISABLESMILEY","D&eacute;sactiver les smilies");
define("_WFS_DISABLEHTML","D&eacute;sactiver le html");
define("_WFS_POST","Poster");
define("_WFS_PREVIEW","Aperçu");
define("_WFS_GO","Soumettre");

//%%%%%%
define("_WFS_ARTICLES","Articles");
define("_WFS_VIEWS","Lu %s fois "); //********* Updated ************
define("_WFS_DATE","Date : "); //********* Updated ************
define("_WFS_WRITTEN","Ecrit : "); //********* Updated ************
define("_WFS_PRINTERFRIENDLY","Version imprimable");

define("_WFS_TOPICC","Section:");
define("_WFS_URL","Lien :");
define("_WFS_NOSTORY","D&eacute;sol&eacute;. L'article s&eacute;lectionn&eacute; n'existe pas.");
define("_WFS_RETURN2INDEX","Retourner &agrave; l'index principal");
define("_WFS_BACK2CAT","Retourner &agrave; la cat&eacute;gorie");
define("_WFS_BACK2","Retour");
//%%%%%% File Name print.php %%%%%

define("_WFS_URLFORSTORY","L'adresse de cet article est :");

// %s represents your site name
define("_WFS_THISCOMESFROM","Cet article provient de %s");

/////// wfsection
define("_WFS_CATEGORYS","Section");
define("_WFS_POSTS","Articles");
define("_WFS_PUBLISHED","Derniers articles");
define("_WFS_WELCOME","%s, salon de lecture");

define("_WFS_ARTICLE","Article");
define("_WFS_AUTHER","Auteur : "); //********* Updated ************
define("_WFS_AUTH","Auteur"); //updated
define("_WFS_CAUTH","<b>Nom de l'auteur</b> (Laisser &agrave; blanc pour avoir le nom original)"); //updated
define("_WFS_LASTUPDATE","Mis &agrave; jour");

// wfsarticle.php

define("_WFS_MAINTEXT"," Texte de l'Article");
//_WFS_ALLOWEDHTML
define("_WFS_DISAMILEY","D&eacute;sactiver les smiley");
define("_WFS_DISHTML","D&eacute;sactiver le HTML");
//_WFS_PREVIEW
define("_WFS_SAVE","Enregistrer");
//_WFS_GO

// themenews.php
define("_WFS_POSTEDBY","Par");
define("_WFS_ON","Sur");
define("_WFS_READS","Visites");
define("_WFS_FILEUPLOAD","Envoi de fichier attach&eacute;");
define("_WFS_FILESHOWNAME","Titre du fichier attach&eacute;");
define("_WFS_ATTACHEDFILES","Editer le fichier attach&eacute;");
define("_WFS_NOFILE","Il n'y a pas de 'fichier' attach&eacute; &agrave; cet article.");
define("_WFS_AFTERREGED","Les fichiers ne peuvent pas &ecirc;tre attach&eacute;s &agrave; un article vide. <br />Merci de cr&eacute;er un article, enregistrez et revenez pour attacher des fichiers.");
define("_WFS_FILES","Fichier");
define("_WFS_COMMENTSNUM","Commentaire");
define("_WFS_CATEGORYDESC","Description");
define("_WFS_CATEGORYHEAD","Ent&ecirc;te de page des cat&eacute;gories. Ce texte (ou HTML) appara&icirc;tra dans l'ent&ecirc;te des cat&eacute;gories.");
define("_WFS_CATEGORYFOOT","Pied de page des cat&eacute;gories. Ce texte (ou HTML) appara&icirc;tra dans le bas des cat&eacute;gories.");
define("_WFS_FILEID","N° Fichier");
define("_WFS_FILEREALNAME","Nom du fichier une fois stock&eacute;");
define("_WFS_FILETEXT","Texte pour la recherche");
define("_WFS_ARTICLEID","Article N°");
define("_WFS_EXT","Extension");
define("_WFS_MINETYPE","Type Mine");
define("_WFS_UPDATEDATE","Derni&egrave;re mise &agrave; jour");
define("_WFS_DEL","Supprimer");
define("_WFS_CANCEL","Annuler");
define("_WFS_IMGADD","Ajouter");
define("_WFS_UPLOAD","Envoyer");
define("_WFS_LINKURL","Adresse du lien : ");
define("_WFS_LINKURLNAME","Surnom pour l'URL ci-dessus");
define("_WFS_SUMMARY","R&eacute;sum&eacute;");
define("_WFS_LINK","Lien");
define("_WFS_NOTREADFILE","Impossible de lire le fichier !");
define("_WFS_DOWNLOADNAME","Nom du fichier une fois t&eacute;l&eacute;charg&eacute;");
define("_WFS_PAGEBREAK","Pages d&eacute;limit&eacute;e par : [pagebreak]");

//new version 0.9.2
define("_WFS_MAININDEX","Index principal");
define("_WFS_NOVIEWPERMISSION","D&eacute;sol&eacute; ! Vous n'avez pas la permission de voir cette zone.");
define("_WFS_WEBLINK","LIEN :");
define("_WFS_VOTEAPPRE","Merci d'avoir vot&eacute;.");
define("_WFS_THANKYOU","Merci de prendre le temps de voter pour %s"); // %s is your site name
define("_WFS_VOTEFROMYOU","Entr&eacute;e pour aider les utilisateurs &agrave; choisir quel fichier t&eacute;l&eacute;charger.");
define("_WFS_VOTEONCE","Merci de ne voter qu'une fois pour une m&ecirc;me source.");
define("_WFS_RATINGSCALE","L'&eacute;chelle va de 1 &agrave; 10, où 1 est mauvais et 10 excellent.");
define("_WFS_BEOBJECTIVE","Merci d'&ecirc;tre objectif, s'il n'y a que des 1 ou des 10, le vote ne sera pas tr&egrave;s utile.");
define("_WFS_DONOTVOTE","Ne pas voter pour sa propre source.");
define("_WFS_RATEIT","Evaluer !");
define("_WFS_DESCRIPTIONC","Description : ");
define("_WFS_EMAILC","Email : ");
define("_WFS_CATEGORYC","Cat&eacute;gorie : ");
define("_WFS_LASTUPDATEC","Derni&egrave;re mise &agrave; jour : ");
define("_WFS_DLNOW","T&eacute;l&eacute;charger maintenant !");
define("_WFS_VERSION","Version");
define("_WFS_SUBMITDATE","Date de soumission");
define("_WFS_DLTIMES","t&eacute;l&eacute;charg&eacute; %s fois");
define("_WFS_FILESIZE","Taille du fichier");
define("_WFS_SUPPORTEDPLAT","Plateformes support&eacute;es");
define("_WFS_HOMEPAGE","Page d'accueil");
define("_WFS_HITSC","Visites : ");
define("_WFS_RATINGC","Evaluation : ");
define("_WFS_ONEVOTE","1 vote");
define("_WFS_NUMVOTES","%s votes");
define("_WFS_ONEPOST","1 post");
define("_WFS_NUMPOSTS","%s votes");
define("_WFS_COMMENTSC","Commentaires : ");
define("_WFS_RATETHISFILE","&eacute;valuer cet article");
define("_WFS_MODIFY","Modifier");
define("_WFS_TELLAFRIEND","en parler &agrave; un ami");
define("_WFS_VSCOMMENTS","Voir / Envoyer des commentaires");
define("_WFS_EDIT","Editer");
define("_WFS_SUBMIT","Soumettre");
define("_WFS_BYTES","Octets");
define("_WFS_ALREADYREPORTED","Vous avez d&eacute;j&agrave; envoy&eacute; un rapport de lien bris&eacute; pour cet &eacute;l&eacute;ment.");
define("_WFS_MUSTREGFIRST","D&eacute;sol&eacute;, vous n'&ecirc;tes pas autoris&eacute; &agrave; effectuer cette action.<br>Merci de vous enregistrer avant !");
define("_WFS_NORATING","Pas d'&eacute;valuation selectionn&eacute;e.");
define("_WFS_CANTVOTEOWN","Vous ne pouvez pas voter pour une ressource que vous avez soumise.<br>Tous les votes sont v&eacute;rifi&eacute;s.");
define("_WFS_RANK","Rang");
define("_WFS_HITS","Visites"); //updated
define("_WFS_RATING","&eacute;valuation");
define("_WFS_VOTE","Vote");
define("_WFS_TOP10","%s Top 10"); // %s is a review category name
define("_WFS_CATEGORIES","Cat&eacute;gories");
define("_WFS_THANKSFORHELP","Merci de nous aider &agrave; maintenir l'int&eacute;grit&eacute; de ce r&eacute;pertoire.");
define("_WFS_FORSECURITY","Pour des raisons de s&eacute;curit&eacute; votre nom et votre adresse IP seront temporairement enregistr&eacute;s.");
define("_WFS_NUMBYTES","%s octets");
define("_WFS_TIMES"," fois");
define("_WFS_DOWNLOADS","T&eacute;l&eacute;chargements pour ");
define("_WFS_FILETYPE","Type de fichier : ");
define("_WFS_GROUPPROMPT","Donne aux groupes suivants les droits d'acc&egrave;s :");
define("_WFS_REPORTBROKEN","Rapport de fichier bris&eacute;");
define("_WFS_IMGNAME","Nom du fichier (Blanc : Identique &agrave; l'original)");
define("_WFS_POSTNEWARTICLE","Soumettre article");
define("_WFS_SMILIE","Ajouter un smiley &agrave; l'article");
define("_WFS_EXGRAPHIC","Ajouter un graphique externe &agrave; l'article");
define("_WFS_GRAPHIC","Ajouter un graphique local &agrave; l'article");
define("_WFS_NOIMG","Pas d'image");
define("_WFS_ARTIMGUPLOAD","Envoi d'image");
define("_WFS_POPULAR","Populaire");
define("_WFS_RATEFILE","&eacute;valuer");
define("_WFS_COMMENT","Commentaires");
define("_WFS_RATED","&eacute;valu&eacute;");
define("_WFS_SUBMIT1","Soumis");
define("_WFS_VOTES","Votes");
define("_WFS_SORTBY1","Trier par :");
define("_WFS_TITLE1","Titre");
define("_WFS_DATE1","Date");
define("_WFS_ARTICLEID1","Article N°");
define("_WFS_POPULARITY1","Popularit&eacute;");
define("_WFS_CURSORTBY1","les articles sont actuellement tri&eacute;s par : %s");
define("_WFS_RATING1","&eacute;valuation");
define("_WFS_NOTIFYPUBLISH","Notification par Email une fois publi&eacute;");
define("_WFS_POPULARITYLTOM","Popularit&eacute; (en croissant du nombre des visites)");
define("_WFS_POPULARITYMTOL","Popularit&eacute; (en d&eacute;croissant du nombre de visites)");
define("_WFS_ARTICLEIDLTOM","Article N° (1 &agrave; 9)");
define("_WFS_ARTICLEIDMTOL","Article N° (9 &agrave; 1)");
define("_WFS_TITLEZTOA","Titre (Z &agrave; A)");
define("_WFS_TITLEATOZ","Titre (A &agrave; Z)");
define("_WFS_DATEOLD","Date (Anciens en premier)");
define("_WFS_DATENEW","Date (Nouveaux en premier)");
define("_WFS_RATINGLTOH","&eacute;valuation (en croissant du Score)");
define("_WFS_RATINGHTOL","&eacute;valuation (en d&eacute;croissant du Score)");
define("_WFS_SUBMITLTOH","Soumission (Anciens en premier)");
define("_WFS_SUBMITHTOL","Soumission (Nouveaux en premier)");
define("_WFS_WEIGHT","Poids");
define("_WFS_NOTITLE","ERREUR : Pas de titre - Merci de retourner &agrave; la page pr&eacute;c&eacute;dente et de donner un titre &agrave; votre article");
define("_WFS_NOMAINTEXT","ERREUR : Pas de texte - Merci de retourner &agrave; la page pr&eacute;c&eacute;dente et de rentrer un texte");
define("_WFS_RATINGA","Article &eacute;valu&eacute; : %s");
define("_WFS_HTMLPAGE","Fichier HTML </b>(Cela ignorera le contenu de l'&eacute;diteur de texte)");
define("_WFS_DBUPDATED","Merci pour votre soumission.");
define("_WFS_INTFILEAT","Va voir cet article sur %s");
define("_WFS_INTFILEFOUND","Il y a içi un article int&eacute;ressant que j'ai trouv&eacute; sur %s");
define("_WFS_DESCRIPTION","Description du fichier");
define("_WFS_ARTICLEADDIT","Compl&eacute;ments d'article");
define("_WFS_ARTICLELINK","Lien vers l'article");
define("_WFS_MISCSETTINGS","Autres r&eacute;glages pour l'article");
define("_WFS_FILEDESCRIPT","Description du fichier");
define("_WFS_ATTACHEDFILESTXT","<b>Envoi de fichier</b><br/><br />Cela affiche la liste des fichiers qui sont attach&eacute;s &agrave; l'article actuel. Vous pouvez &eacute;diter le fichier attach&eacute; en cliquant sur le lien d'&eacute;dition.<br /><br />Les fichiers ne peuvent &ecirc;tre attach&eacute;s &agrave; un article que lorsque vous '&eacute;ditez' un article sauvegard&eacute;.");
define("_WFS_DOWNLOAD","Envoyer le fichier attach&eacute;");
define("_WFS_PUBLISHEDHOME","Publi&eacute;");
define("_WFS_ARTSIZE","Taille %s");
define("_WFS_DISCLAIMER","<b>Responsabilit&eacute; :</b> Ce site ne peut &ecirc;tre tenu pour responsable ou &ecirc;tre poursuivi pour les commentaires soumis par les utilisateurs.");
define("_WFS_ONLYREGISTEREDUSERS","Seuls les utilisateurs enregistr&eacute;s peuvent envoyer un rapport de t&eacute;l&eacute;chargement bris&eacute; !");
define("_WFS_THANKSFORINFO","Merci pour cette information. Nous examinons votre requ&egrave;te le plus vite possible.");
define("_WFS_FILEPERMISSION","Permissions pour le fichier");
define("_WFS_DOWNLOADED","t&eacute;l&eacute;charg&eacute;");
define("_WFS_DOWNLOADSIZE","Taille du fichier lors du t&eacute;l&eacute;chargement");
define("_WFS_LASTACCESS","Dernier acc&egrave;s sur le serveur");
define("_WFS_LASTUPDATED","Derni&egrave;re mise &agrave; jour");
define("_WFS_ERRORCHECK","Les fichiers existent ?");
define("_AM_FILEATTACHED","Fichiers attach&eacute;s &agrave; l'article ?");
define("_WFS_NODESCRIPT","Pas de description pour le fichier.");
define("_WFS_UPLOADED","Envoy&eacute; : ");
define("_WFS_FILEMIMETYPE","Type Mime du fichier");

// add disbr, enaamp
define("_WFS_DISBR","Aucun changement dans br.");
define("_WFS_ENAAMP","Changer &amp; en &amp;amp; &agrave; l'heure de l'&eacute;dition.");

// article.php
define("_WFS_ARTCLE_MORE","Il y a deux Articles ou plus qui correspondent &agrave; ce titre.");
define("_WFS_REPORT_BREOKEN_DOWNLOAD","Rapport des liens bris&eacute;s de T&eacute;l&eacute;chargement");

// submit.php
define("_WFS_SUBMIT_FAIL","Echec lors de la Proposition.");
define("_WFS_BUT_SUBMIT_SUCCESS","Mais, cet Article a &eacute;t&eacute; propos&eacute;");
define("_WFS_SUBMITED_ARTICLE","Article propos&eacute;");
define("_WFS_UPLOAD_END","T&eacute;l&eacute;chargement!");
define("_WFS_UPLOAD_FAIL","Echec lors du T&eacute;l&eacute;chargement");
define("_WFS_UPLOAD_NON","Le Fichier &agrave; t&eacute;l&eacute;charger n'a pas &eacute;t&eacute; d&eacute;fini");
define("_WFS_UPLOAD_TOO_BIG","La taille du Fichier &agrave; T&eacute;l&eacute;charger est plus large que celle Authoris&eacute;e!\nLa Taille Max est %s B.");
define("_WFS_UPLOAD_NOT_ALLOWED_MINE_TYPE","Vous n'&ecirc;tes pas Authoris&eacute; &agrave; t&eacute;l&eacute;charger ce type de Fichier.");

// modify.php
define("_WFS_ARTICLE_BACK","Retour &agrave; l'Article");
define("_WFS_MODIFY_TITLE","Editer l'Article");
define("_WFS_MODIFY_END","Mis &agrave; Jour!");
define("_WFS_MODIFY_FAIL","Echec lors de la Mise &agrave; Jour.");
define("_WFS_ACTION","Action");
define("_WFS_DELETE","Effacer");
define("_WFS_FILE_DOWNLOADNAME","Nom du Fichier &agrave; T&eacute;l&eacute;charger");
define("_WFS_FILE_CHECK","V&eacute;rification du Fichier");
define("_WFS_FILE_NOEXIST","N'existe pas");
define("_WFS_FILE_NOFILE","N'est pas dans un format authoris&eacute;");
define("_WFS_FILE_MODIFY_END","Fichier Mis &agrave; Jour!");
define("_WFS_FILE_DELETE_COMFROM","ATTENTION: Etes vous certain de d&eacute;sirer Effacer ce Fichier ?");
define("_WFS_FILE_DELETE_END","Effac&eacute;!");
define("_WFS_FILE_DELETE_FAIL","Echec lors de la Suppression.");

// multi language in index.php
define("_WFS_ERROR_IMAGE","ERROR: Veuillez v&eacute;rifier le R&eacute;pertoire/Fichier pour l'Image");

?>