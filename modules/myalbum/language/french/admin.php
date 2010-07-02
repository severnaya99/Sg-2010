<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_AM_LOADED' ) ) {


// Appended by Xoops Language Checker -GIJOE- in 2007-08-24 18:18:03
define('_MD_A_MYMENU_MYTPLSADMIN','Templates');
define('_MD_A_MYMENU_MYBLOCKSADMIN','Blocks/Permissions');
define('_MD_A_MYMENU_MYPREFERENCES','Preferences');

define( 'MYALBUM_AM_LOADED' , 1 ) ;

// Index (Categories)
define( "_AM_H3_FMT_CATEGORIES" , "Gestionnaire de cat&eacute;gories (%s)" ) ;
define( "_AM_CAT_TH_TITLE" , "Nom" ) ;
define( "_AM_CAT_TH_PHOTOS" , "Images" ) ;
define( "_AM_CAT_TH_OPERATION" , "Op&eacute;ration" ) ;
define( "_AM_CAT_TH_IMAGE" , "Banni&egrave;re" ) ;
define( "_AM_CAT_TH_PARENT" , "Parent" ) ;
define( "_AM_CAT_TH_IMGURL" , "URL de la banni&egrave;re" ) ;
define( "_AM_CAT_MENU_NEW" , "Cr&eacute;ation d'une cat&eacute;gorie" ) ;
define( "_AM_CAT_MENU_EDIT" , "Edition d'une cat&eacute;gorie" ) ;
define( "_AM_CAT_INSERTED" , "Une cat&eacute;gorie a &eacute;t&eacute; ajout&eacute;e" ) ;
define( "_AM_CAT_UPDATED" , "La cat&eacute;gorie est modifi&eacute;e" ) ;
define( "_AM_CAT_BTN_BATCH" , "Appliquer" ) ;
define( "_AM_CAT_LINK_MAKETOPCAT" , "Cr&eacute;er une nouvelle cat&eacute;gorie principale " ) ;
define( "_AM_CAT_LINK_ADDPHOTOS" , "Ajouter une image &agrave; cette cat&eacute;gorie" ) ;
define( "_AM_CAT_LINK_EDIT" , "Editer cette cat&eacute;gorie" ) ;
define( "_AM_CAT_LINK_MAKESUBCAT" , "Cr&eacute;er une nouvelle cat&eacute;gorie sous cette cat&eacute;gorie" ) ;
define( "_AM_CAT_FMT_NEEDADMISSION" , "%s images sont en attente de validation" ) ;
define( "_AM_CAT_FMT_CATDELCONFIRM" , "%s seront supprim&eacute;es avec ses sous-cat&eacute;gories, images et commentaires. Etes vous d'accord ?" ) ;


// Admission
define( "_AM_H3_FMT_ADMISSION" , "Images en attente (%s)" ) ;
define( "_AM_TH_SUBMITTER" , "Auteur" ) ;
define( "_AM_TH_TITLE" , "Titre" ) ;
define( "_AM_TH_DESCRIPTION" , "Description" ) ;
define( "_AM_TH_CATEGORIES" , "Cat&eacute;gorie" ) ;
define( "_AM_TH_DATE" , "Derni&egrave;re mise &agrave; jour" ) ;


// Photo Manager
define( "_AM_H3_FMT_PHOTOMANAGER" , "Gestionnaire d'images (%s)" ) ;
define( "_AM_TH_BATCHUPDATE" , "Mettre &agrave; jour collectivement les images s&eacute;lectionn&eacute;es" ) ;
define( "_AM_OPT_NOCHANGE" , "- PAS DE CHANGEMENT -" ) ;
define( "_AM_JS_UPDATECONFIRM" , "Les &eacute;l&eacute;ments s&eacute;lectionn&eacute;s seront mis &agrave; jour. OK ?" ) ;


// Module Checker
define( "_AM_H3_FMT_MODULECHECKER" , "V&eacute;rificateur myAlbum-P (%s)" ) ;

define( "_AM_H4_ENVIRONMENT" , "Control de l'environment" ) ;
define( "_AM_MB_PHPDIRECTIVE" , "directive PHP" ) ;
define( "_AM_MB_BOTHOK" , "tous les deux sont bons" ) ;
define( "_AM_MB_NEEDON" , "doivent &ecirc;tre sur ON") ;


define( "_AM_H4_TABLE" , "V&eacute;rification des tables" ) ;
define( "_AM_MB_PHOTOSTABLE" , "Table des photos" ) ;
define( "_AM_MB_DESCRIPTIONTABLE" , "Table des descriptions" ) ;
define( "_AM_MB_CATEGORIESTABLE" , "Table des cat&eacute;gories" ) ;
define( "_AM_MB_VOTEDATATABLE" , "Table des votes" ) ;
define( "_AM_MB_COMMENTSTABLE" , "Table des commentaires" ) ;
define( "_AM_MB_NUMBEROFPHOTOS" , "Nombre de photos" ) ;
define( "_AM_MB_NUMBEROFDESCRIPTIONS" , "Nombre de descriptions" ) ;
define( "_AM_MB_NUMBEROFCATEGORIES" , "Nombre de cat&eacute;gories" ) ;
define( "_AM_MB_NUMBEROFVOTEDATA" , "Nombre de votes" ) ;
define( "_AM_MB_NUMBEROFCOMMENTS" , "Nombre de commentaires" ) ;


define( "_AM_H4_CONFIG" , "V&eacute;rification de la configuration" ) ;
define( "_AM_MB_PIPEFORIMAGES" , "ImageMagick pipe" ) ;
define( "_AM_MB_DIRECTORYFORPHOTOS" , "R&eacute;pertoires des photos" ) ;
define( "_AM_MB_DIRECTORYFORTHUMBS" , "R&eacute;pertoire des vignettes" ) ;
define( "_AM_ERR_LASTCHAR" , "Erreur : le dernier caract&egrave;re devrait &ecirc;tre '/'" ) ;
define( "_AM_ERR_FIRSTCHAR" , "Erreur : le premier caract&egrave;re devrait &ecirc;tre '/'" ) ;
define( "_AM_ERR_PERMISSION" , "Erreur : commencez par cr&eacute;er le r&eacute;pertoire par ftp ou par le shell et appliquez lui les attributs (chmod) 777." ) ;
define( "_AM_ERR_NOTDIRECTORY" , "Erreur : ce n'est pas un r&eacute;pertoire." ) ;
define( "_AM_ERR_READORWRITE" , "Erreur : impossible de lire ou d'&eacute;crire dans ce r&eacute;pertoire. Vous devriez changer les permissions de ce r&eacute;pertoire en 777." ) ;
define( "_AM_ERR_SAMEDIR" , "Erreur : Le r&eacute;pertoire des photos ne doit pas &ecirc;tre le m&ecirc;me que celui des vignettes" ) ;
define( "_AM_LNK_CHECKGD2" , "V&eacute;rification 'GD2' fonctionne nativement correctement avec votre version de PHP" ) ;
define( "_AM_MB_CHECKGD2" , "Si la page list&eacute;e depuis celle l&agrave; ne s'affiche pas correctement, vous devriez abaadonner l'utilisation du mode truecolor de GD." ) ;
define( "_AM_MB_GD2SUCCESS" , "Bravo<br />Vous pouvez peut &ecirc;tre utiliser GD2 (truecolor) dans cet environnement." ) ;


define( "_AM_H4_PHOTOLINK" , "V&eacute;rification des photos & et vignettes" ) ;
define( "_AM_MB_NOWCHECKING" , "En cours de v&eacute;rification." ) ;
define( "_AM_FMT_PHOTONOTREADABLE" , "une photo (%s) n'est pas lisible." ) ;
define( "_AM_FMT_THUMBNOTREADABLE" , "une vignette (%s) n'est pas lisible." ) ;
define( "_AM_FMT_NUMBEROFDEADPHOTOS" , "%s photos mortes ont &eacute;t&eacute; trouv&eacute;es." ) ;
define( "_AM_FMT_NUMBEROFDEADTHUMBS" , "%s vignettes doivent &ecirc;tre reconstruites." ) ;
define( "_AM_FMT_NUMBEROFREMOVEDTMPS" , "%s fichiers temporaires ont &eacute;t&eacute; supprim&eacute;s." ) ;
define( "_AM_LINK_REDOTHUMBS" , "reconstruction des vignettes" ) ;
define( "_AM_LINK_TABLEMAINTENANCE" , "maintenance des tables" ) ;



// Redo Thumbnail
define( "_AM_H3_FMT_RECORDMAINTENANCE" , "maintenance de myAlbum-P (%s)" ) ;

define( "_AM_FMT_CHECKING" , "v&eacute;rification %s ..." ) ;

define( "_AM_FORM_RECORDMAINTENANCE" , "maintenance des photos comme la reg&eacute;n&eacute;ration des vignettes etc." ) ;

define( "_AM_MB_FAILEDREADING" , "&eacute;chec de la lecture." ) ;
define( "_AM_MB_CREATEDTHUMBS" , "cr&eacute;ation des vignettes." ) ;
define( "_AM_MB_BIGTHUMBS" , "&eacute;chec durant la cr&eacute;ation d'une vignette." ) ;
define( "_AM_MB_SKIPPED" , "pass&eacute;." ) ;
define( "_AM_MB_SIZEREPAIRED" , "(dimensions de l'image r&eacute;par&eacute;es.)" ) ;
define( "_AM_MB_RECREMOVED" , "cet enregistrement a &eacute;t&eacute; supprim&eacute;." ) ;
define( "_AM_MB_PHOTONOTEXISTS" , "la photo principale n'existe pas." ) ;
define( "_AM_MB_PHOTORESIZED" , "la photo a &eacute;t&eacute; redimensionn&eacute;e." ) ;

define( "_AM_TEXT_RECORDFORSTARTING" , "d&eacute;but" ) ;
define( "_AM_TEXT_NUMBERATATIME" , "nombre d'enregistrement trait&eacute;s &agrave; la fois" ) ;
define( "_AM_LABEL_DESCNUMBERATATIME" , "Un nombre trop grand peut amener &agrave; une perte de connexion." ) ;

define( "_AM_RADIO_FORCEREDO" , "Forcer la reg&eacute;n&eacute;ration m&ecirc;me si les vignettes existent") ;
define( "_AM_RADIO_REMOVEREC" , "Supprimer les enregistrements qui ne sont pas li&eacute;s &agrave; une photo" ) ;
define( "_AM_RADIO_RESIZE" , "Redimensionner les images dont les dimensions sont plus importantes que celle pr&eacute;cis&eacute;es dans les pr&eacute;f&eacute;rences") ;

define( "_AM_MB_FINISHED" , "termin&eacute;" ) ;
define( "_AM_LINK_RESTART" , "d&eacute;marrage" ) ;
define( "_AM_SUBMIT_NEXT" , "suivant" ) ;



// Batch Register
define( "_AM_H3_FMT_BATCHREGISTER" , "enregistrement en mode batch de myAlbum-P (%s)" ) ;


// GroupPerm Global
define( "_AM_ALBM_GROUPPERM_GLOBAL" , "Permissions" ) ;
define( "_AM_ALBM_GROUPPERM_GLOBALDESC" , "configuration des privil&egrave;ges globaux dans le module" ) ;
define( "_AM_ALBM_GPERMUPDATED" , "Les permissions ont &eacute;t&eacute; modifi&eacute;es avec succ&egrave;s" ) ;


// Import
define( "_AM_H3_FMT_IMPORTTO" , 'Importer les images depuis un autre module vers %s' ) ;
define( "_AM_FMT_IMPORTFROMMYALBUMP" , 'Importation depuis le module "%s" ' ) ;
define( "_AM_FMT_IMPORTFROMIMAGEMANAGER" , 'Importation depuis le gestionnaire d\'images de Xoops' ) ;
define( "_AM_CB_IMPORTRECURSIVELY" , 'Importation r&eacute;cursive des sous-cat&eacute;gories' ) ;
define( "_AM_RADIO_IMPORTCOPY" , 'Copie des images (les commentaires ne seront pas copi&eacute;s)' ) ;
define( "_AM_RADIO_IMPORTMOVE" , 'D&eacute;placement des images (les comentaires seront d&eacute;plac&eacute;s)' ) ;
define( "_AM_MB_IMPORTCONFIRM" , 'Lancer l\'import ?' ) ;
define( "_AM_FMT_IMPORTSUCCESS" , 'Vous avez import&eacute; %s images' ) ;


// Export
define( "_AM_H3_FMT_EXPORTTO" , 'Export des images depuis %s vers un autre module' ) ;
define( "_AM_FMT_EXPORTTOIMAGEMANAGER" , 'Export vers le gestionnaire d\'images de Xoops' ) ;
define( "_AM_FMT_EXPORTIMSRCCAT" , 'Source' ) ;
define( "_AM_FMT_EXPORTIMDSTCAT" , 'Destination' ) ;
define( "_AM_CB_EXPORTRECURSIVELY" , 'avec les images dans les sous-cat&eacute;gories') ;
define( "_AM_CB_EXPORTTHUMB" , 'Exporter les vignettes au lieu des images' ) ;
define( "_AM_MB_EXPORTCONFIRM" , 'Lancer l\'export' ) ;
define( "_AM_FMT_EXPORTSUCCESS" , 'vous avez export&eacute; %s images' ) ;


}

?>