<?php
define("_FORMULAIRE_FORM_TITLE","Contactez nous en remplissant ce formulaire.");
//define("_FORMULAIRE_MSG_SUBJECT",$xoopsConfig['sitename'].' - Contact Us Form');
define("_FORMULAIRE_MSG_SUBJECT", '['.$xoopsConfig['sitename'].'] -');
define("_FORMULAIRE_MSG_FORM", ' Formulaire : ');
define("_FORMULAIRE_MSG_SENT","Votre message a �t� envoy�.");
define("_FORMULAIRE_MSG_THANK","<br />Merci pour vos commentaires.");
define("_FORMULAIRE_MSG_SUP","<br /> Attention les enregistrements de ce formulaire ont �t� supprim�s");
define("_FORMULAIRE_MSG_UNSENT","Veuillez joindre un fichier de taille inf�rieure � ");
define("_FORMULAIRE_MSG_BIG","Le fichier � joindre est trop gros pour �tre envoy�.");
define("_FORMULAIRE_MSG_UNTYPE","Vous ne pouvez pas joindre de fichier de ce type.<br />Les types autoris�s sont : ");

define("_FORMULAIRE_NEWFORMADDED","Nouveau formulaire ajout� avec succ�s!");
define("_FORMULAIRE_FORMMOD","Titre de formulaire modifi� avec succ�s!");
define("_FORMULAIRE_FORMDEL","Formulaire effac� avec succ�s!");
define("_FORMULAIRE_FORMCHARG","Chargement du formulaire");
define("_FORMULAIRE_FORMCREA","Formulaire cr�� avec succ�s!");

define("_FORMULAIRE_NOTSHOW","Le formulaire ");
define("_FORMULAIRE_NOTSHOW2"," ne contient pas de requ�tes enregistr�es.");
define("_FORMULAIRE_FORMSHOW","R�sultats du formulaire : ");
define("_FORMULAIRE_FORMTITRE","Param�tres d'envoi du formulaire modifi�s avec succ�s");

define("_FORMULAIRE_ONLYONE","Vous avez d&eacute;j&agrave; envoy&eacute; ce formulaire");

define("_MD_ERRORTITLE","Erreur ! Vous n'avez pas rentr� de titre de formulaire !!!!");
define("_MD_ERROREMAIL","Erreur ! L'adresse e-mail n'est pas valide !!!!");
define("_MD_ERRORMAIL","Erreur ! Vous n'avez pas rentr� de destinataire pour le formulaire !!!!");
define("_ERROR_PERM","Vous n'avez pas le droit d'acc�der � ce formulaire");

define("_FORM_ACT","Action");
define("_FORM_CREAT","Cr�er un nouveau formulaire");
define("_FORM_MOD","Modifier le formulaire");
define("_FORM_RENOM","Renommer");
define("_FORM_RENOM_IMG","<img src='../images/attach.gif'>");
define("_FORM_SUP", "Supprimer");
define("_FORM_ADD","Param�tres d'envoi");
define("_FORM_SHOW","Consulter les r�sultats");
define("_FORM_MODIF","Modifier");
define("_FORM_TITLE","Titre du formulaire");
define("_FORM_DESC","Description du formulaire : ");
define("_FORM_ICO","Description des icones");
define("_FORM_DISPLAY","Afficher");
define("_FORM_ORDER","Premier &eacute;l&eacute;ment affich&eacute;");
define("_FORM_DTIT","titre");
define("_FORM_DIMG","image");
define("_FORM_IMAGE","Image du formulaire");
define("_FORM_EMAIL","Adresse E-mail");
define("_FORM_ADMIN","Envoyer uniquement � l'admin du site");
define("_FORM_EXPE","Recevoir le formulaire rempli");
define("_FORM_URL","Url de retour apr�s l'envoi du formulaire <br /> (par defaut : XOOPS_URL)");
define("_FORM_HELP","Bulle d'aide pour ce formulaire <br /><br /> (HTML autoris�)");
define("_FORM_SEND","Texte pour le bouton d'envoi <br /> (par defaut : Envoyer)");
define("_FORM_ELESEND","El&eacute;ments &agrave; envoyer dans les mails");

define("_FORM_TABELE_SEND","Envoy&eacute; &agrave; :"); 
define("_FORM_TABELE_SUB","Soumis par :"); 
define("_FORM_TABELE_IP", "Adresse IP :"); 
define("_FORM_TABELE_NAV","Navigateur :"); 

define("_FORM_NBANSWER","Nombre de bonnes r&eacute;ponses : ");

define("_FORM_SAVE_SEND", "Enregistrer les envois des formulaires"); 
define("_FORM_ONLYONE_SEND", "Seulement un envoi par utilisateur"); 
define("_FORM_NBDAYS","jours d'intervalle entre deux envois (si 0, un seul envoi possible)");
define("_FORMULAIRE_WAIT1","Vous devez encore attendre ");
define("_FORMULAIRE_WAIT2"," jour(s) pour pouvoir renvoyer ce formulaire");

define("_ANSWERS","R&eacute;ponse(s)");

define("_FORM_QCM","QCM");
define("_FORM_AFFRE","Afficher dans le mail (si QCM)");
define("_FORM_AFFRES"," R&eacute;sultat du QCM");
define("_FORM_AFFREP"," R&eacute;ponses aux questions");
define("_FORM_COD","Codage pour l'envoi des mails");
define("_FORM_GROUP","Envoyer au groupe");
define("_FORM_DELTITLE","Titre du formulaire � effacer : ");
define("_FORM_NEW","Nouveau formulaire");
define("_FORM_NOM","Entrer le nouveau nom du formulaire");
define("_FORM_OPT","Options");
define("_FORM_MENU","Consulter le menu");
define("_FORM_PREF","Consulter les pr�f�rences");
define("_AM_FORMUL","Formulaires");
define("_AM_STAT","Statut");
define("_FORM_EXPORT","Exporter au format CSV");
define("_FORM_ALT_EXPORT","Exporter");
define("_FORM_DROIT","Groupes autoris�s � utiliser ce formulaire");
define("_FORM_MODPERM","Modifier les permissions d'acc�s aux formulaires");
define("_FORM_PERM","Permissions");
define("_AM_FORM","Formulaire : ");

define("_AM_EXCSV","Enregistrement dans le fichier www/uploads/form.csv des envois effectu&eacute;s pour le formulaire s&eacute;lectionn&eacute;.<br /> Le fichier est au format csv (donn&eacute;es s&eacute;par&eacute;es par des ';').");

define("_FORM_NO_GROUP","Aucun");

define("_AM_FORM_SELECT","S�lection du formulaire");
define("_MD_FILEERROR","Erreur d'envoi du fichier");

define("_FORM_EXP_CREE","Le fichier a �t� export� avec succ�s");

define("_AM_NOELE","Ce formulaire ne contient pas d'&eacute;l&eacute;ments");
define("_AM_NOSTAT","Il n'y a pas d'envois pour ce formulaire donc il n'y a pas de statistiques");
define("_AM_WARN","* : L'&eacute;l&eacute;ment est requis");

define("_AM_SAVECSV","Enregistrer le fichier form.csv");
define("_AM_BACKCSV","Revenir � la page d'accueil");

define("_MAIL_SEND","Envoy&eacute; &agrave; : ");
define("_MAIL_SUB","Soumis par : ");
define("_MAIL_NUM","  (Num&eacute;ro d'utilisateur : ");
define("_MAIL_IP","Adresse IP : ");
define("_MAIL_NAV","Navigateur utilis&eacute; : ");

define("_BUTTON_SEND","Envoyer");

define("_AM_FORM_DOWN_IMAGEINFO", "Statut du serveur");
define("_AM_FORM_DOWN_SPHPINI", "<b>Information issue du fichier PHP.ini:</b>");
define("_AM_FORM_DOWN_SAFEMODESTATUS", "Mode s�curis� : ");
define("_AM_FORM_DOWN_REGISTERGLOBALS", "Register Globals: ");
define("_AM_FORM_DOWN_SERVERUPLOADSTATUS", "Statut des chargements sur le serveur : ");
define("_AM_FORM_DOWN_MAXUPLOADSIZE", "Taille maximum autoris�e � charger : ");
define("_AM_FORM_DOWN_MAXPOSTSIZE", "Taille maximale du message autoris�e : ");
define("_AM_FORM_DOWN_SAFEMODEPROBLEMS", " (Ceci peut cr�er des probl�mes)");
define("_AM_FORM_DOWN_GDLIBSTATUS", "Support de la Biblioth�que GD : ");
define("_AM_FORM_DOWN_GDLIBVERSION", "Version de la biblioth�que GD: ");
define("_AM_FORM_DOWN_GDON", "<b>Activ�</b> (Miniatures disponibles)");
define("_AM_FORM_DOWN_GDOFF", "<b>D�sactiv�</b> (Pas de miniatures disponibles)");
define("_AM_FORM_DOWN_OFF", "<b>OFF</b>");
define("_AM_FORM_DOWN_ON", "<b>ON</b>");
define("_AM_FORM_DOWN_APACHE", "<b>Information issue de l'environnement :</b>");
define("_AM_FORM_DOWN_VERSION", "Version d'Apache utilis&eacute;e : ");
define("_AM_FORM_DOWN_CHARSET", "Jeux de caract&egrave;res autoris&eacute;s : ");

define("_AM_DEBUG_MODE","Ajouter/Enlever le mode debug PHP");

define("_AM_CLASS_BY","Classer par : ");
define("_AM_CLASS_NONE","Aucun, ");
define("_AM_CLASS_DATE","Date, ");
define("_AM_CLASS_USER","Utilisateur");
?>
