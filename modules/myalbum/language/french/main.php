<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MB_LOADED' ) ) {

define( 'MYALBUM_MB_LOADED' , 1 ) ;

//%%%%%%		Module Name 'myAlbum-P'		%%%%%

// New in myAlbum-P

// only "Y/m/d" , "d M Y" , "M d Y" can be interpreted
define( "_ALBM_DTFMT_YMDHI" , "d/M/Y H:i" ) ;

define( "_ALBM_NEXT_BUTTON" , "Suite" ) ;
define( "_ALBM_REDOLOOPDONE" , "Termin&eacute;." ) ;

define( "_ALBM_BTN_SELECTALL" , "Tout s&eacute;lectionner" ) ;
define( "_ALBM_BTN_SELECTNONE" , "Ne rien s&eacute;lectionner" ) ;
define( "_ALBM_BTN_SELECTRVS" , "Inversion de la s&eacute;lection" ) ;

define( "_ALBM_FMT_PHOTONUM" , "%s par page" ) ;

define( "_ALBM_AM_ADMISSION" , "Photos soumises" ) ;
define( "_ALBM_AM_ADMITTING" , "Photos soumises" ) ;
define( "_ALBM_AM_LABEL_ADMIT" , "Approuver les photos soumises" ) ;
define( "_ALBM_AM_BUTTON_ADMIT" , "Approuver" ) ;
define( "_ALBM_AM_BUTTON_EXTRACT" , "extraire" ) ;

define( "_ALBM_AM_PHOTOMANAGER" , "Gestionnaire de photos") ;
define( "_ALBM_AM_PHOTONAVINFO" , "Photo N°. %s-%s (sur %s photos)" ) ;
define( "_ALBM_AM_LABEL_REMOVE" , "Supprimer les photos s&eacute;lectionn&eacute;es" ) ;
define( "_ALBM_AM_BUTTON_REMOVE" , "Supprimer" ) ;
define( "_ALBM_AM_JS_REMOVECONFIRM" , "Vous confirmez ?" ) ;
define( "_ALBM_AM_LABEL_MOVE" , "Changer la cat&eacute;gorie des images s&eacute;lectionn&eacute;es" ) ;
define( "_ALBM_AM_BUTTON_MOVE" , "D&eacute;placer" ) ;
define( "_ALBM_AM_BUTTON_UPDATE" , "Modifier" ) ;
define( "_ALBM_AM_DEADLINKMAINPHOTO" , "L'image n'existe pas" ) ;

define( "_ALBM_RADIO_ROTATETITLE" , "Rotation de l'image" ) ;
define( "_ALBM_RADIO_ROTATE0" , "ne rien faire" ) ;
define( "_ALBM_RADIO_ROTATE90" , "vers la droite" ) ;
define( "_ALBM_RADIO_ROTATE180" , "de 180 degr&eacute;s" ) ;
define( "_ALBM_RADIO_ROTATE270" , "vers la gauche" ) ;


// New MyAlbum 1.0.1 (and 1.2.0)
define("_ALBM_MOREPHOTOS","D'autres photos de %s");
define("_ALBM_REDOTHUMBS","R&eacute;g&eacute;n&eacute;rer les vignettes (<a href='redothumbs.php'>lancer</a>)");
define("_ALBM_REDOTHUMBSINFO","Un nombre trop important peut conduire &agrave; une perte de connexion.");
define("_ALBM_REDOTHUMBSNUMBER","Nombre de vignettes &agrave; chaque fois");
define("_ALBM_REDOING","refaire : ");
define("_ALBM_BACK","Retourner");
define("_ALBM_ADDPHOTO","Ajouter une photo");


// New MyAlbum 1.0.0
define("_ALBM_PHOTOBATCHUPLOAD","Approuver les photos pr&eacute;sentes sur le serveur");
define("_ALBM_PHOTOUPLOAD","T&eacute;l&eacute;chargement de photos");
define("_ALBM_PHOTOEDITUPLOAD","Photo &eacute;dit&eacute;e et ret&eacute;l&eacute;charg&eacute;e");
define("_ALBM_MAXPIXEL","Taille maximale en pixels");
define("_ALBM_MAXSIZE","Taille maximale du fichier (en octets)");
define("_ALBM_PHOTOTITLE","Titre");
define("_ALBM_PHOTOPATH","Chemin");
define("_ALBM_TEXT_DIRECTORY","R&eacute;pertoire");
define("_ALBM_DESC_PHOTOPATH","Entrer le chemin complet du r&eacute;pertoire des images &agrave; enregistrer");
define("_ALBM_MES_INVALIDDIRECTORY","R&eacute;pertoire sp&eacute;cifi&eacute; invalide.");
define("_ALBM_MES_BATCHDONE","%s photo(s) enregistr&eacute;e(s).");
define("_ALBM_MES_BATCHNONE","Aucune photo d&eacute;tect&eacute;e dans le r&eacute;pertoire.");
define("_ALBM_PHOTODESC","Description");
define("_ALBM_PHOTOCAT","Cat&eacute;gorie");
define("_ALBM_SELECTFILE","Choisir une photo");
define("_ALBM_NOIMAGESPECIFIED","Erreur : aucune photo n'a &eacute;t&eacute; t&eacute;l&eacute;charg&eacute;e");
define("_ALBM_FILEERROR","Erreur : les photos sont trop grosses ou il y a un probl&egrave;me avec la configuration");
define("_ALBM_FILEREADERROR","Erreur : impossible de lire les photos.");

define("_ALBM_BATCHBLANK","Laisser le titre &agrave; blanc pour utiliser le nom du fichier comme titre");
define("_ALBM_DELETEPHOTO","Supprimer ?");
define("_ALBM_VALIDPHOTO","Valider");
define("_ALBM_PHOTODEL","Supprimer la photo ?");
define("_ALBM_DELETINGPHOTO","Supression en cours de la photo");
define("_ALBM_MOVINGPHOTO","D&eacute;placer la photo");

define("_ALBM_STORETIMESTAMP","Ne pas modifier l'horodatage");

define("_ALBM_POSTERC","Auteur : ");
define("_ALBM_DATEC","Date : ");
define("_ALBM_EDITNOTALLOWED","Vous n'avez pas le droit d'&eacute;diter ce commentaire");
define("_ALBM_ANONNOTALLOWED","Les utilisateurs anonymes ne peuvent pas poster de photos.");
define("_ALBM_THANKSFORPOST","Merci pour votre contribution !");
define("_ALBM_DELNOTALLOWED","Vous n'&ecirc;tes pas autoris&eacute; &agrave; supprimer ce commentaire");
define("_ALBM_GOBACK","Revenir en arri&egrave;re");
define("_ALBM_AREYOUSURE","Etes vous certain de vouloir supprimer ce commentaire et les commentaires qui y sont rattach&eacute;s ?");
define("_ALBM_COMMENTSDEL","Commentaire(s) supprim&eacute; avec succ&egrave;s");

// End New

define("_ALBM_THANKSFORINFO","Merci pour les informations. Nous regarderons votre contribution rapidement.");
define("_ALBM_BACKTOTOP","Revenir au top des photos");
define("_ALBM_THANKSFORHELP","Merci pour votre aide &agrave; maintenir l'int&eacute;grit&eacute; de ce r&eacute;pertoire.");
define("_ALBM_FORSECURITY","Pour des raisons de s&eacute;curit&eacute; votre adresse IP est temporairement enregistr&eacute;e.");

define("_ALBM_MATCH","Correspondance");
define("_ALBM_ALL","Tous");
define("_ALBM_ANY","N'Importe lequel");
define("_ALBM_NAME","Nom");
define("_ALBM_DESCRIPTION","Description");

define("_ALBM_MAIN","Principal");
define("_ALBM_NEW","Nouveau");
define("_ALBM_UPDATED","Mis &agrave; jour");
define("_ALBM_POPULAR","Populaire");
define("_ALBM_TOPRATED","Mieux not&eacute;s");

define("_ALBM_POPULARITYLTOM","Popularit&eacute; (de la plus petite &agrave; la plus grande)");
define("_ALBM_POPULARITYMTOL","Popularit&eacute; (de la plus grande &agrave; la plus petite)");
define("_ALBM_TITLEATOZ","Titre (A &agrave; Z)");
define("_ALBM_TITLEZTOA","Titre (Z &agrave; A)");
define("_ALBM_DATEOLD","Date (les plus vieille d'abord)");
define("_ALBM_DATENEW","Date (les plus r&eacute;centes d'abord)");
define("_ALBM_RATINGLTOH","Notation (des plus bas aux meilleurs scores)");
define("_ALBM_RATINGHTOL","Notation (des plus hauts scores aux plus bas)");
define("_ALBM_LIDASC","Num&eacute;ro d'enregistrement (le plus gros en dernier)");
define("_ALBM_LIDDESC","Num&eacute;ro d'enregistrement (le plus petit en dernier)");

define("_ALBM_NOSHOTS","Pas de copie d'&eacute;cran disponible");
define("_ALBM_EDITTHISPHOTO","Editer cette photo");

define("_ALBM_DESCRIPTIONC","Description");
define("_ALBM_EMAILC","Email");
define("_ALBM_CATEGORYC","Cat&eacute;gorie");
define("_ALBM_SUBCATEGORY","Sous-cat&eacute;gorie");
define("_ALBM_LASTUPDATEC","Derni&egrave;re mise &agrave; jour");
define("_ALBM_TELLAFRIEND","Envoyer &agrave; un amis");
define("_ALBM_SUBJECT4TAF","Une photo pour toi!");
define("_ALBM_HITSC","Affichages");
define("_ALBM_RATINGC","Notation");
define("_ALBM_ONEVOTE","1 vote");
define("_ALBM_NUMVOTES","%s votes");
define("_ALBM_ONEPOST","1 post");
define("_ALBM_NUMPOSTS","%s posts");
define("_ALBM_COMMENTSC","Commentaires");
define("_ALBM_RATETHISPHOTO","Noter");
define("_ALBM_MODIFY","Modifier");
define("_ALBM_VSCOMMENTS","Voir/Envoyer un commentaire");

define("_ALBM_DIRECTCATSEL","Choisir une cat&eacute;gorie");
define("_ALBM_THEREARE","Il y a <b>%s</b> photos dans notre base de donn&eacute;es.");
define("_ALBM_LATESTLIST","Derni&egrave;res entr&eacute;es");

define("_ALBM_VOTEAPPRE","Votre vote est appr&eacute;ci&eacute;.");
define("_ALBM_THANKURATE","Merci d'avoir pris le temps de noter cette photo sur le site %s.");
define("_ALBM_VOTEONCE","Veuillez ne pas voter plusieurs fois pour la m&ecirc;me ressource.");
define("_ALBM_RATINGSCALE","L'&eacute;chelle va de 1 &agrave; 10, sachant que 1 est la plus basse note et 10 la meilleure.");
define("_ALBM_BEOBJECTIVE","Veuillez &ecirc;tre objectif, si tout le monde recoit des 1 ou des  10 les votes ne sont alors pas tr&egrave;s utiles.");
define("_ALBM_DONOTVOTE","Ne votez pas pour vos propres ressources.");
define("_ALBM_RATEIT","Noter");

define("_ALBM_RECEIVED","Nous avons recu votre photo, merci");
define("_ALBM_ALLPENDING","Toutes les photos envoy&eacute;es sont approuv&eacute;es.");

define("_ALBM_RANK","Rang");
define("_ALBM_CATEGORY","Cat&eacute;gorie");
define("_ALBM_HITS","Affichages");
define("_ALBM_RATING","Notation");
define("_ALBM_VOTE","Vote");
define("_ALBM_TOP10","%s Top 10"); // %s is a photo category title

define("_ALBM_SORTBY","Trier par :");
define("_ALBM_TITLE","Titre");
define("_ALBM_DATE","Date");
define("_ALBM_POPULARITY","Popularit&eacute;");
define("_ALBM_CURSORTEDBY","Les photos sont actuellement tri&eacute;es par : %s");
define("_ALBM_FOUNDIN","Trouv&eacute; dans :");
define("_ALBM_PREVIOUS","Pr&eacute;c&eacute;dent");
define("_ALBM_NEXT","Suivant");
define("_ALBM_NOMATCH","Aucun photo ne correspond &agrave; votre recherche");

define("_ALBM_CATEGORIES","Cat&eacute;gories");

define("_ALBM_SUBMIT","Soumettre");
define("_ALBM_CANCEL","Annuler");

define("_ALBM_MUSTREGFIRST","D&eacute;sol&eacute; mais vous n'avez pas la permission d'effectuer cette action.<br>Veuillez vous enregistrer ou vous connecter.");
define("_ALBM_MUSTADDCATFIRST","D&eacute;sol&eacute; mais il n'y a pas encore de cat&eacute;gorie dans laquelle ajouter des photos.<br />Commencez par cr&eacute;er une cat&eacute;gorie");
define("_ALBM_NORATING","Aucune note s&eacute;lectionn&eacute;e.");
define("_ALBM_CANTVOTEOWN","Vous ne pouvez pas voter pour vos ressources.<br />Tous les votes sont enregistr&eacute;s.");
define("_ALBM_VOTEONCE2","Merci de ne voter qu'une seule fois pour la m&ecirc;me ressource.<br />Tous les votes sont enregistr&eacute;s.");

//%%%%%%	Module Name 'MyAlbum' (Admin)	  %%%%%

define("_ALBM_PHOTOSWAITING","Photo(s) en attente de validation");
define("_ALBM_PHOTOMANAGER","Gestionnaire de photos");
define("_ALBM_CATEDIT","Ajouter, modifier et supprimer des cat&eacute;gories");
define("_ALBM_GROUPPERM_GLOBAL","Permissions globales");
define("_ALBM_CHECKCONFIGS","V&eacute;rifier la configuration et l'environnement");
define("_ALBM_BATCHUPLOAD","Enregistrement en mode batch");
define("_ALBM_GENERALSET","Pr&eacute;f&eacute;rences du module");
define("_ALBM_REDOTHUMBS2","Reconstruire les vignettes");

define("_ALBM_SUBMITTER","Envoy&eacute; par");
define("_ALBM_DELETE","Supprimer");
define("_ALBM_NOSUBMITTED","Aucune nouvelle photo.");
define("_ALBM_ADDMAIN","Ajouter une cat&eacute;gorie principale");
define("_ALBM_IMGURL","URL de l'image (Optionnel, la hauteur de l'image sera r&eacute;duite &agrave; 50) : ");
define("_ALBM_ADD","Ajouter");
define("_ALBM_ADDSUB","Ajouter une sous-cat&eacute;gorie");
define("_ALBM_IN","dans");
define("_ALBM_MODCAT","Modifier la cat&eacute;gorie");
define("_ALBM_DBUPDATED","Mise &agrave; jour de la base avec succ&egrave;s");
define("_ALBM_MODREQDELETED","Demande de modification supprim&eacute;e.");
define("_ALBM_IMGURLMAIN","URL de l'image (Optionel et uniquement valide pour les cat&eacute;gories principales. La hauteur de l'image sera r&eacute;duite &agrave; 50) : ");
define("_ALBM_PARENT","Cat&eacute;gorie m&egrave;re :");
define("_ALBM_SAVE","Enregistrer les changements");
define("_ALBM_CATDELETED","Cat&eacute;gorie supprim&eacute;e.");
define("_ALBM_CATDEL_WARNING","Attention : Etes-vous certain de vouloir supprimer cette cat&eacute;gorie et toutes ses photos et commentaires ?");
define("_ALBM_YES","Oui");
define("_ALBM_NO","Non");
define("_ALBM_NEWCATADDED","Nouvelle cat&eacute;gorie ajout&eacute;e avec succ&egrave;s");
define("_ALBM_ERROREXIST","Erreur : la photo est d&eacute;j&agrave; pr&eacute;sente dans la base");
define("_ALBM_ERRORTITLE","Erreur : vous devez entrer le titre");
define("_ALBM_ERRORDESC","Erreur : vous devez entrer la description");
define("_ALBM_WEAPPROVED","Nous avons approuv&eacute; la photo qui nous a &eacute;t&eacute; soumise");
define("_ALBM_THANKSSUBMIT","Merci de votre contribution");
define("_ALBM_CONFUPDATED","La configuration a &eacute;t&eacute; enregistr&eacute;e avec succ&egrave;s");

}

?>