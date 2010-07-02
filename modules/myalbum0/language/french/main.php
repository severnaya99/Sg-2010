<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MB_LOADED' ) ) {



// Appended by Xoops Language Checker -GIJOE- in 2004-10-04 16:06:33
define('_ALBM_LIDASC','Record Number (Bigger is latter)');
define('_ALBM_LIDDESC','Record Number (Smaller is latter)');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-17 18:42:55
define('_ALBM_BTN_SELECTALL','Select All');
define('_ALBM_BTN_SELECTNONE','Select None');
define('_ALBM_BTN_SELECTRVS','Select Reverse');
define('_ALBM_FMT_PHOTONUM','%s every a page');
define('_ALBM_AM_BUTTON_UPDATE','Modify');
define('_ALBM_NOIMAGESPECIFIED','Error: No photo is uploaded');
define('_ALBM_FILEREADERROR','Error: Photos are not readable.');
define('_ALBM_DIRECTCATSEL','SELECT A CATEGORY');

define( 'MYALBUM_MB_LOADED' , 1 ) ;

//%%%%%%		Module Name 'MyAlbum-P'		%%%%%

// New in MyAlbum-p

// only "Y/m/d" , "d M Y" , "M d Y" can be interpreted
define( "_ALBM_DTFMT_YMDHI" , "d M Y H:i" ) ;

define( "_ALBM_NEXT_BUTTON" , "Suivant" ) ;
define( "_ALBM_REDOLOOPDONE" , "Fait." ) ;

define( "_ALBM_AM_ADMISSION" , "Accepter Photos" ) ;
define( "_ALBM_AM_ADMITTING" , "Photo(s)acceptée(s)" ) ;
define( "_ALBM_AM_LABEL_ADMIT" , "Accepter les photos que vous avez selectionne" ) ;
define( "_ALBM_AM_BUTTON_ADMIT" , "Accepter" ) ;
define( "_ALBM_AM_BUTTON_EXTRACT" , "Extraire" ) ;

define( "_ALBM_AM_PHOTOMANAGER" , "Gestionnaire de photo" ) ;
define( "_ALBM_AM_PHOTONAVINFO" , "Photo No. %s-%s (out of %s photos hit)" ) ;
define( "_ALBM_AM_LABEL_REMOVE" , "Supprimer les photos selectionnées" ) ;
define( "_ALBM_AM_BUTTON_REMOVE" , "Retirer!" ) ;
define( "_ALBM_AM_JS_REMOVECONFIRM" , "Retirer OK?" ) ;
define( "_ALBM_AM_LABEL_MOVE" , "Changer la catégorie des photos selectionnées" ) ;
define( "_ALBM_AM_BUTTON_MOVE" , "Deplacer" ) ;
define( "_ALBM_AM_DEADLINKMAINPHOTO" , "L'image principale n'existent pas" ) ;

define( "_ALBM_RADIO_ROTATETITLE" , "Image rotation" ) ;
define( "_ALBM_RADIO_ROTATE0" , "Pas de rotation" ) ;
define( "_ALBM_RADIO_ROTATE90" , "Rotation à droite" ) ;
define( "_ALBM_RADIO_ROTATE180" , "Rotation de 180 degres" ) ;
define( "_ALBM_RADIO_ROTATE270" , "Rotation à gauche" ) ;


// New MyAlbum 1.0.1 (and 1.2.0)
define("_ALBM_MOREPHOTOS","D'autres photos de %s");
define("_ALBM_REDOTHUMBS","Reconstruction des miniatures (<a href='redothumbs.php'>Lancer</a>)");
define("_ALBM_REDOTHUMBS2","Reconstruction des miniatures");
define("_ALBM_REDOTHUMBSINFO","Trop d'images peuvent entraîner le non-traitement de l'opération");
define("_ALBM_REDOTHUMBSNUMBER","Nombre de miniature en ce moment");
define("_ALBM_REDOING","Reconstruite : ");
define("_ALBM_NEXT","Prochain");
define("_ALBM_BACK","Retour");
define("_ALBM_ADDPHOTO","Ajouter une photo");


// New MyAlbum 1.0.0
define("_ALBM_PHOTOBATCHUPLOAD","Photo déjà présente sur le serveur");
define("_ALBM_PHOTOUPLOAD","Photo chargée");
define("_ALBM_PHOTOEDITUPLOAD","La photo a été édité et Re-téléchargée ");
define("_ALBM_MAXPIXEL","Taille maximale en pixel");
define("_ALBM_MAXSIZE","Taille maximale du fichier");
define("_ALBM_PHOTOTITLE","Titre");
define("_ALBM_PHOTOPATH","chemin");
define("_ALBM_TEXT_DIRECTORY","Repertoire");
define("_ALBM_DESC_PHOTOPATH","Taper le chemin complet du repertoire contenant les photos à enregistrer");
define("_ALBM_MES_INVALIDDIRECTORY","Un répertoire invalide a été proposé.");
define("_ALBM_MES_BATCHDONE","%s photo(s) sont enregistrées.");
define("_ALBM_MES_BATCHNONE","Pas de photo détectées dans ce repertoire.");
define("_ALBM_PHOTODESC","Description");
define("_ALBM_PHOTOCAT","Categorie");
define("_ALBM_SELECTFILE","Selectionner la photo");
define("_ALBM_FILEERROR","Pas non envoyée ou photo trop grande");

define("_ALBM_BATCHBLANK","Laisser le titre blanc pour utiliser le nom de la photo");
define("_ALBM_DELETEPHOTO","Supprimer?");
define("_ALBM_VALIDPHOTO","Valider");
define("_ALBM_PHOTODEL","supprimer la photo?");
define("_ALBM_DELETINGPHOTO","Effacer la photo");
define("_ALBM_MOVINGPHOTO","Déplacer la photo");

define("_ALBM_POSTERC","Expéditeur: ");
define("_ALBM_DATEC","Date: ");
define("_ALBM_EDITNOTALLOWED","Vous n'êtes pas autorisé à modifier ce commentaire!");
define("_ALBM_ANONNOTALLOWED","Les utilisateurs anonymes ne sont pas autorisés à poster.");
define("_ALBM_THANKSFORPOST","Merci pour votre soumission!");
define("_ALBM_DELNOTALLOWED","Vous n'êtes pas autorisé à supprimer ce commentaire!");
define("_ALBM_GOBACK","Retour");
define("_ALBM_AREYOUSURE","Etes-vous sûr que vous voulez supprimer ce commentaire et tous ses descendants?");
define("_ALBM_COMMENTSDEL","Commentaire(s) supprimé(s) avec succès!");

// End New

define("_ALBM_THANKSFORINFO","Merci pour votre information. Nous examinerons votre requête très rapidement.");
define("_ALBM_BACKTOTOP","Retour au Top des photos");
define("_ALBM_THANKSFORHELP","Merci de nous aider à maintenir l'intégrité de cet album.");
define("_ALBM_FORSECURITY","Pour des raisons de sécurité, votre nom et votre adresse IP vont être temporairement mémorisés.");

define("_ALBM_MATCH","Correspondance");
define("_ALBM_ALL","Tout");
define("_ALBM_ANY","N'Importe lequel");
define("_ALBM_NAME","Nom");
define("_ALBM_DESCRIPTION","Description");

define("_ALBM_MAIN","Principal");
define("_ALBM_POPULAR","Populaires");
define("_ALBM_TOPRATED","Meilleur score");

define("_ALBM_POPULARITYLTOM","Popularité (De la moins vue à la plus vue)");
define("_ALBM_POPULARITYMTOL","Popularité (De la plus vue à la moins vue)");
define("_ALBM_TITLEATOZ","Titre (A to Z)");
define("_ALBM_TITLEZTOA","Titre (Z to A)");
define("_ALBM_DATEOLD","Date (De la plus ancienne à la plus récente)");
define("_ALBM_DATENEW","Date (De la plus récente à la plus ancienne)");
define("_ALBM_RATINGLTOH","Classement (du moins coté au plus coté)");
define("_ALBM_RATINGHTOL","Classement (du plus coté au moins coté) ");

define("_ALBM_NOSHOTS","Pas de vignette disponible");
define("_ALBM_EDITTHISPHOTO","Editer cette Photo");

define("_ALBM_DESCRIPTIONC","Description: ");
define("_ALBM_EMAILC","Email: ");
define("_ALBM_CATEGORYC","Categorie: ");
define("_ALBM_SUBCATEGORY","Sous-categories: ");
define("_ALBM_LASTUPDATEC","Dernière mise à jour: ");
define("_ALBM_HITSC","Affichages: ");
define("_ALBM_RATINGC","Score: ");
define("_ALBM_ONEVOTE","1 vote");
define("_ALBM_NUMVOTES","%s votes");
define("_ALBM_ONEPOST","1 commentaire");
define("_ALBM_NUMPOSTS","%s commentaires");
define("_ALBM_COMMENTSC","Commentaires: ");
define("_ALBM_RATETHISPHOTO","Voter pour cette Photo");
define("_ALBM_MODIFY","Modifier");
define("_ALBM_VSCOMMENTS","Voir/Envoyer commenaires");

define("_ALBM_THEREARE","Il y a <b>%s</b> Photos dans notre Base de Données, <a href='submit.php'>ajouter une nouvelle photo</a>.");
define("_ALBM_LATESTLIST","Dernières listes");

define("_ALBM_VOTEAPPRE","Votre vote est apprécié.");
define("_ALBM_THANKURATE","Merci d'avoir pris le temps de coter une photo sur ce site %s.");
define("_ALBM_VOTEONCE","S'il vous plaît, ne votez pas deux fois pour la même ressource.");
define("_ALBM_RATINGSCALE","L'échelle est 1 à 10, 1 étant lamentable, 10 excellent.");
define("_ALBM_BEOBJECTIVE","Soyez objectif, si chaque ressource reçoit un 1 ou un 10, les cotes n'auront aucun sens.");
define("_ALBM_DONOTVOTE","Ne votez pas pour vos propres ressources.");
define("_ALBM_RATEIT","Donnez une cote!");

define("_ALBM_RECEIVED","Nous avons reçu votre photo. Merci!");
define("_ALBM_ALLPENDING","Toutes les photos attendent d'abord d'être vérifiées.");

define("_ALBM_RANK","Rang");
define("_ALBM_CATEGORY","Categorie");
define("_ALBM_HITS","Affichages");
define("_ALBM_RATING","Score");
define("_ALBM_VOTE","Vote");
define("_ALBM_TOP10","%s Top 10"); // %s is a photo category title

define("_ALBM_SORTBY","classer par:");
define("_ALBM_TITLE","Titre");
define("_ALBM_DATE","Date");
define("_ALBM_POPULARITY","Popularité");
define("_ALBM_CURSORTEDBY","Les Photos sont actuellement classées par: %s");
define("_ALBM_FOUNDIN","Trouvé dans:");
define("_ALBM_PREVIOUS","Precedente");
define("_ALBM_NEXT","Suivante");
define("_ALBM_NOMATCH","Aucune correspondance pour votre recherche");

define("_ALBM_CATEGORIES","Categories");

define("_ALBM_SUBMIT","Soumettre");
define("_ALBM_CANCEL","Annuler");

define("_ALBM_MUSTREGFIRST","Désolé, vous n'êtes pas autorisé à effectuer cette opération.<br>Enregistrez-vous ou connectez-vous d'abord!");
define("_ALBM_MUSTADDCATFIRST","Désolé, vous n'avez pas encore de catégories.<br>Ajoutez d'abord une catégorie!");
define("_ALBM_NORATING","Aucun score sélectionné.");
define("_ALBM_CANTVOTEOWN","Vous ne pouvez pas voter pour une ressource que vous avez soumise.<br>Tous les votes sont enregistrés et passés en revue.");
define("_ALBM_VOTEONCE2","Ne votez pour une ressource qu'une seule fois.<br>Tous les votes sont enregistrés et passés en revue.");

//%%%%%%	Module Name 'MyAlbum' (Admin)	  %%%%%

define("_ALBM_PHOTOSWAITING","Photos en attente de validationn");
define("_ALBM_PHOTOMANAGER","Gestionnaire de photos");
define("_ALBM_CATEDIT","Ajouter, Modifier, et supprimer Categories");
define("_ALBM_CHECKCONFIGS","Contrôle de module");
define("_ALBM_BATCHUPLOAD","Téléchargement En lots");
define("_ALBM_GENERALSET","myAlbum-P Configuration générale");

define("_ALBM_SUBMITTER","Envoyé par");
define("_ALBM_DELETE","Supprimer");
define("_ALBM_NOSUBMITTED","Aucune nouvelle photo soumise.");
define("_ALBM_ADDMAIN","Ajouter une catégorie principale");
define("_ALBM_IMGURL","Image URL (Optionnel La hauteur de l'image sera réduite à 50): ");
define("_ALBM_ADD","Ajouter");
define("_ALBM_ADDSUB","Ajouter une SOUS-Catégorie");
define("_ALBM_IN","dans");
define("_ALBM_MODCAT","Modifier la Categorie");
define("_ALBM_DBUPDATED","Base de données mise à jour avec succés!");
define("_ALBM_MODREQDELETED","Demande de Modification Supprimée.");
define("_ALBM_IMGURLMAIN","Image URL (Optionnel et uniquement valide pour les catégories principales. La hauteur sera ramenée à 50): ");
define("_ALBM_PARENT","Catégorie parente:");
define("_ALBM_SAVE","Sauver Changements");
define("_ALBM_CATDELETED","Categorie supprimée.");
define("_ALBM_CATDEL_WARNING","AVERTISSEMENT: Etes vous sûr que vous vouler supprimer cette Catégorie et toutes ses photos et tous ses commentaires?");
define("_ALBM_YES","Oui");
define("_ALBM_NO","Non");
define("_ALBM_NEWCATADDED","Nouvelle Catégorie ajoutée avec succès");
define("_ALBM_ERROREXIST","ERREUR: La photo soumise est déjà dans la base de données!");
define("_ALBM_ERRORTITLE","ERREUR: Vous devez fournir un TITRE!");
define("_ALBM_ERRORDESC","ERREUR: Vous devez fournir une DESCRIPTION!");
define("_ALBM_WEAPPROVED","Nous avons approuvé votre soumission à notre base de photos.");
define("_ALBM_THANKSSUBMIT","Merci pour votre soumission!");
define("_ALBM_CONFUPDATED","Configuration mise à jour avec succès!");
?><?php
// Appended by Xoops Language Checker -GIJOE- in 2004-01-27 15:37:03
define('_ALBM_NEW','New');
define('_ALBM_UPDATED','Updated');
define('_ALBM_GROUPPERM_GLOBAL','Global Permissions');

}

?>
